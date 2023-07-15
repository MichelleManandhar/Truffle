<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\HttpException;

use app\components\Misc;
use app\components\Query;
use app\components\HelperMenuItem as HMenu;
use app\components\HelperMenuCategory as HMenuCat;
use app\components\HelperSettings as HSettings;
use app\components\HelperPrinter as HPrinter;

use app\models\Order;
use app\models\OrderItems;
use app\models\TempItems;
use app\models\TempOrderList;
use app\models\Kot;
use app\models\KotItems;
use app\models\MenuItem;
use app\models\User;
use app\models\Delivery;
use app\models\Random;

class DeliveryController extends Controller {

    public $to_group = array('admin', 'staff','floor_supervisor');

    /**
     * @inheritdoc
     */
    public function behaviors() 
    {
        return [];
    }

    public function beforeAction($action) 
    { 
        if ($action->id=='error')
             $this->layout ='error';

        $group[] = Yii::$app->params['user_role']['superadmin'];
        if (isset($this->to_group)) {
            foreach($this->to_group as $to):
                $group[] = Yii::$app->params['user_role'][$to];
            endforeach;
        }

        if (!isset(Yii::$app->session['eHhupx5UpkLZoXRP_cR1ozEVjY14zWOC0_user']) || Yii::$app->user->isGuest || !in_array(Yii::$app->session['eHhupx5UpkLZoXRP_cR1ozEVjY14zWOC0_user']->role, $group)) { 
            throw new HttpException(404, 'Page not found.');
        }

        if(!isset(Yii::$app->session['fiscal_year'])) {
            throw new HttpException(404, 'Page not found.');
        }else {
            $temp = explode(":",Yii::$app->session['fiscal_year']);
            $starting_fiscal_year_from_date = $temp[0];
            $starting_fiscal_year_to_date   = $temp[1];

            if ((date('Y-m-d') < $starting_fiscal_year_from_date) 
                    || ( date('Y-m-d') > date('Y-m-d', strtotime($starting_fiscal_year_to_date. ' + 11 days'))) )
            {
                throw new HttpException(404, 'Page not found.');
            }
        }

        return parent::beforeAction($action);
    }

    /**
     * @inheritdoc
     */
    public function actions() 
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
        ];
    }

	public function actionIndex() 
    {
        if (isset($_GET['did']) && $_GET['did'] != null && $_GET['did'] > 0) {
            Yii::$app->session['discount'] = false;
            Yii::$app->session['master-password'] = false;
            
            $delivery_id = (int) $_GET['did'];
            $delivery = Query::queryOne("SELECT * FROM delivery WHERE id = " . $delivery_id);

            if ($delivery != null) {

                $temp_items = Query::queryAll("SELECT t.*, m.id as item_id, m.slug , m.price, m.name , m.is_discountable, si.id as special_item_id, si.name as special_item_name, si.price as special_item_price 
                                                FROM temp_items as t
                                                LEFT JOIN menu_item as m ON m.id = t.item_id
                                                LEFT JOIN special_order_items as si ON si.id = t.item_id
                                                WHERE t.delivery_id = " . $delivery_id);

                $temp_order_list = Query::queryAll("SELECT t.*, m.id as item_id, m.slug , m.price, m.name, m.is_discountable, si.id as special_item_id, si.name as special_item_name, si.price as special_item_price 
                                                FROM temp_order_list as t
                                                LEFT JOIN menu_item as m ON m.id = t.item_id
                                                LEFT JOIN special_order_items as si ON si.id = t.item_id
                                                WHERE t.delivery_id = " . $delivery_id);

                Yii::$app->session['discount'] = false;
                Yii::$app->session['master-password'] = false;

                $settings = HSettings::getBasic("'name-in-bill', 'address-in-bill', 'phone-no-in-bill', 'pan-no-in-bill', 'thank-you-note-in-bill' , 'delivery-service-charge-rate'");
                
                $service_charge_rate = ($settings['delivery-service-charge-rate'] != null && $settings['delivery-service-charge-rate-is-active'] != '0') ? $settings['delivery-service-charge-rate'] : 0;
                $service_charge_rate_is_active = ($settings['delivery-service-charge-rate-is-active'] != null) ? $settings['delivery-service-charge-rate-is-active'] : 0;

                $user = User::findOne(Yii::$app->session['eHhupx5UpkLZoXRP_cR1ozEVjY14zWOC0_user']->id);

                $data = HMenu::getActiveMenuItems();
                $categories = Misc::model_to_list(HMenuCat::getActiveMenuCategories(), 'id', 'category');
                $items = [];
                foreach($data as $row) :
                    $items[$row['category_id']][$row['display_order']] = $row;
                endforeach;

                $max_inv = 1;
                $max_invoice = Query::queryOne('SELECT MAX(invoice_no) as max FROM `order`'); 
                if ($max_invoice['max'] != null) {
                    $max_inv += $max_invoice['max'];
                }

                $debtors = Query::queryAll('SELECT name, phone, credit_amount FROM debtors');

                $kot = Kot::find()->WHERE(['delivery_id' => $delivery_id])
                                    ->andWhere(['<>','status', 1])
                                    ->with('kotItemRelation')
                                    ->with('kotItemRelation.item')
                                    ->with('kotItemRelation.specialItem')
                                    ->all();

                $max_inv_break_down = 1;
                $max_invoice_break_down = Query::queryOne('SELECT MAX(invoice_no) as max FROM `break_down_receipt`'); 
                if ($max_invoice_break_down['max'] != null) {
                    $max_inv_break_down += $max_invoice_break_down['max'];
                }

                $break_down    = Query::queryAll('SELECT bd.*, d.name as debtor_name 
                                                    FROM `break_down_receipt` as bd
                                                    LEFT JOIN debtors as d ON d.id = bd.debtor_id
                                                    WHERE bd.delivery_id = ' . $delivery_id .
                                                    ' ORDER BY invoice_no');

                $break_down_sub_total = 0;
                $break_down_total['sub_total']              = 0;
                $break_down_total['service_charge_amount']  = 0;
                $break_down_total['discount_amount']        = 0;
                $break_down_total['total']                  = 0;
                foreach ($break_down as $b_down) {
                    $break_down_total['sub_total']              = $break_down_total['sub_total'] + $b_down['sub_total'];
                    $break_down_total['service_charge_amount']  = $break_down_total['service_charge_amount'] + $b_down['service_charge_amount'];
                    $break_down_total['discount_amount']        = $break_down_total['discount_amount'] + $b_down['discount_amount'];
                    $break_down_total['total']                  = $break_down_total['total'] + $b_down['total'];
                }

                $break_down_items   = Query::queryAll("SELECT bi.item_id, sum(bi.quantity) as quantity 
                                                        FROM `break_down_receipt` as br
                                                        LEFT JOIN `break_down_items` as bi ON br.id = bi.break_down_receipt_id
                                                        WHERE br.delivery_id = " . $delivery_id .
                                                        ' GROUP BY bi.item_id');

                $kot_bill_printers = HPrinter::getKotPrinters("'bill'");

                $delivery_charge_amount     = Query::queryOne("SELECT value FROM `random` WHERE field_name = 'delivery_charge_amount'");

                $all_category = HMenuCat::getMenuCategories();

                $delivery_charge_amount     = Query::queryOne("SELECT value FROM `random` WHERE field_name = 'delivery_charge_amount'");

                return $this->render('index', array(
                    'items'                         => $items,
                    'categories'                    => $categories,
                    'service_charge_rate'           => $service_charge_rate,
                    'service_charge_rate_is_active' => $service_charge_rate_is_active,
                    'max_inv'                       => $max_inv,
                    'user_name'                     => $user->name,
                    'discount_upto'                 => $user->discount_upto,
                    'settings'                      => $settings,
                    'debtors'                       => $debtors,
                    'temp_items'                    => $temp_items,
                    'temp_order_list'               => $temp_order_list,
                    'kot'                           => $kot,
                    'delivery'                     => $delivery,
                    'max_inv_break_down'            => $max_inv_break_down,
                    'break_down'                    => $break_down,
                    'break_down_total'              => $break_down_total,
                    'break_down_items'              => $break_down_items,
                    'kot_bill_printers'             => $kot_bill_printers,
                    'delivery_charge_amount'        => $delivery_charge_amount,
                    'all_category'                  => $all_category,
                    'delivery_charge_amount'        => $delivery_charge_amount
                ));
            }
        }else {
            throw new HttpException(404, 'Page not found.'); die;
        } 
    }

    /*public function actionVersionThree() 
    {
        if (isset($_GET['did']) && $_GET['did'] != null && $_GET['did'] > 0) {
            Yii::$app->session['discount'] = false;
            Yii::$app->session['master-password'] = false;
            
            $delivery_id = (int) $_GET['did'];
            $delivery = Query::queryOne("SELECT * FROM delivery WHERE id = " . $delivery_id);

            if ($delivery != null) {

                $temp_items = Query::queryAll("SELECT t.*, m.id as item_id, m.slug , m.price, m.name , si.id as special_item_id, si.name as special_item_name, si.price as special_item_price 
                                                FROM temp_items as t
                                                LEFT JOIN menu_item as m ON m.id = t.item_id
                                                LEFT JOIN special_order_items as si ON si.id = t.item_id
                                                WHERE t.delivery_id = " . $delivery_id);

                $temp_order_list = Query::queryAll("SELECT t.*, m.id as item_id, m.slug , m.price, m.name, si.id as special_item_id, si.name as special_item_name, si.price as special_item_price 
                                                FROM temp_order_list as t
                                                LEFT JOIN menu_item as m ON m.id = t.item_id
                                                LEFT JOIN special_order_items as si ON si.id = t.item_id
                                                WHERE t.delivery_id = " . $delivery_id);

                Yii::$app->session['discount'] = false;
                Yii::$app->session['master-password'] = false;

                $settings = HSettings::getBasic("'name-in-bill', 'address-in-bill', 'phone-no-in-bill', 'pan-no-in-bill', 'thank-you-note-in-bill' , 'delivery-service-charge-rate'");
            
                $service_charge_rate = ($settings['delivery-service-charge-rate'] != null && $settings['delivery-service-charge-rate-is-active'] != '0') ? $settings['delivery-service-charge-rate'] : 0;
                $service_charge_rate_is_active = ($settings['delivery-service-charge-rate-is-active'] != null) ? $settings['delivery-service-charge-rate-is-active'] : 0;

                $user = User::findOne(Yii::$app->session['eHhupx5UpkLZoXRP_cR1ozEVjY14zWOC0_user']->id);

                $data = HMenu::getActiveMenuItems();
                $categories = HMenuCat::getActiveMenuCategories();
                $items = [];
                foreach($data as $row) :
                    $items[$row['category_id']][$row['display_order']] = $row;
                endforeach; 

                $max_inv = 1;
                $max_invoice = Query::queryOne('SELECT MAX(invoice_no) as max FROM `order`'); 
                if ($max_invoice['max'] != null) {
                    $max_inv += $max_invoice['max'];
                }

                $debtors = Query::queryAll('SELECT name, phone, credit_amount FROM debtors');

                $kot = Kot::find()->WHERE(['delivery_id' => $delivery_id])
                                    ->andWhere(['<>','status', 1])
                                    ->with('kotItemRelation')
                                    ->with('kotItemRelation.item')
                                    ->with('kotItemRelation.specialItem')
                                    ->all();

                $max_inv_break_down = 1;
                $max_invoice_break_down = Query::queryOne('SELECT MAX(invoice_no) as max FROM `break_down_receipt`'); 
                if ($max_invoice_break_down['max'] != null) {
                    $max_inv_break_down += $max_invoice_break_down['max'];
                }

                $break_down    = Query::queryAll('SELECT bd.*, d.name as debtor_name 
                                                    FROM `break_down_receipt` as bd
                                                    LEFT JOIN debtors as d ON d.id = bd.debtor_id
                                                    WHERE bd.delivery_id = ' . $delivery_id .
                                                    ' ORDER BY invoice_no');

                $break_down_sub_total = 0;
                $break_down_total['sub_total']              = 0;
                $break_down_total['service_charge_amount']  = 0;
                $break_down_total['discount_amount']        = 0;
                $break_down_total['total']                  = 0;
                foreach ($break_down as $b_down) {
                    $break_down_total['sub_total']              = $break_down_total['sub_total'] + $b_down['sub_total'];
                    $break_down_total['service_charge_amount']  = $break_down_total['service_charge_amount'] + $b_down['service_charge_amount'];
                    $break_down_total['discount_amount']        = $break_down_total['discount_amount'] + $b_down['discount_amount'];
                    $break_down_total['total']                  = $break_down_total['total'] + $b_down['total'];
                }

                $break_down_items   = Query::queryAll("SELECT bi.item_id, sum(bi.quantity) as quantity 
                                                        FROM `break_down_receipt` as br
                                                        LEFT JOIN `break_down_items` as bi ON br.id = bi.break_down_receipt_id
                                                        WHERE br.delivery_id = " . $delivery_id .
                                                        ' GROUP BY bi.item_id, bi.type');

                $kot_bill_printers = HPrinter::getKotPrinters("'bill'");

                $delivery_charge_amount     = Query::queryOne("SELECT value FROM `random` WHERE field_name = 'delivery_charge_amount'");

                $all_category = HMenuCat::getMenuCategories();

                $delivery_charge_amount     = Query::queryOne("SELECT value FROM `random` WHERE field_name = 'delivery_charge_amount'");

                return $this->render('index', array(
                    'items'                         => $items,
                    'categories'                    => $categories,
                    'service_charge_rate'           => $service_charge_rate,
                    'service_charge_rate_is_active' => $service_charge_rate_is_active,
                    'max_inv'                       => $max_inv,
                    'user_name'                     => $user->name,
                    'discount_upto'                 => $user->discount_upto,
                    'settings'                      => $settings,
                    'debtors'                       => $debtors,
                    'temp_items'                    => $temp_items,
                    'temp_order_list'               => $temp_order_list,
                    'kot'                           => $kot,
                    'delivery'                      => $delivery,
                    'max_inv_break_down'            => $max_inv_break_down,
                    'break_down'                    => $break_down,
                    'break_down_total'              => $break_down_total,
                    'break_down_items'              => $break_down_items,
                    'kot_bill_printers'             => $kot_bill_printers,
                    'delivery_charge_amount'        => $delivery_charge_amount,
                    'all_category'                  => $all_category,
                    'delivery_charge_amount'        => $delivery_charge_amount
                ));
            }
        }else {
            throw new HttpException(404, 'Page not found.'); die;
        }    
    }*/

    public function actionList()
    {
        if(Yii::$app->request->isAjax){
            $delivery = Query::queryAll("SELECT * FROM delivery WHERE status != 1 AND is_confirmed = " . Yii::$app->params['delivery_confirmation']['done_nothing']." ORDER BY created_on DESC");
            echo json_encode(array('status' => 'true' , 'delivery' => $delivery)); die;
        }
        echo json_encode(false); die;
    }

    public function actionCancel()
    {
        $latest = Misc::getLatestDate();
        if($latest != '' &&  date('Y-m-d') < $latest['latest_date'] ) { 
            echo json_encode(false); die;
        } else {
            if(Yii::$app->request->isAjax && isset($_POST) && $_POST['delivery_id'] != ''){
                $delivery = Delivery::find()->WHERE(['id' => $_POST['delivery_id']])->one();
                $delivery->status = 1;
                if($delivery->update()){
                    echo json_encode(true); die;
                }
            }
            echo json_encode(false); die;
        }
    }

    public function actionConfirm()
    {
        $latest = Misc::getLatestDate();
        if($latest != '' &&  date('Y-m-d') < $latest['latest_date'] ) { 
            echo json_encode(false); die;
        } else {
            if(Yii::$app->request->isAjax && isset($_POST) && $_POST['delivery_id'] != ''){
                $delivery = Delivery::find()->WHERE(['id' => $_POST['delivery_id']])->one();
                $delivery->is_confirmed = Yii::$app->params['delivery_confirmation']['confirm'];
                if($delivery->update()){
                    echo json_encode(true); die;
                }
            }
            echo json_encode(false); die;
        }
    }

    public function actionCancelOrdered()
    {   
        $latest = Misc::getLatestDate();
        if($latest != '' &&  date('Y-m-d') < $latest['latest_date'] ) { 
            echo json_encode(false); die;
        } else {
            if(Yii::$app->request->isAjax && isset($_POST) && $_POST['delivery_id'] != ''){
                $delivery = Delivery::find()->WHERE(['id' => $_POST['delivery_id']])->one();
                $delivery->is_confirmed = Yii::$app->params['delivery_confirmation']['cancel'];
                if($delivery->update()){
                    echo json_encode(true); die;
                }
            }
            echo json_encode(false); die;
        }
    }

    public function actionTempOrder() 
    {
        $latest = Misc::getLatestDate();
        if($latest != '' &&  date('Y-m-d') < $latest['latest_date'] ) { 
            echo json_encode(false); die;
        } else {
            if(Yii::$app->request->isAjax && isset($_POST) && $_POST['item'] != '' && $_POST['delivery_id'] != ''){
                $item_id = Query::queryOne("SELECT id FROM `menu_item` WHERE `slug` = '" . $_POST['item'] . "'");
                $temp_item = TempItems::find()->WHERE(['item_id' => $item_id , 'delivery_id' => $_POST['delivery_id']])->one();
                if($temp_item != null){
                    $temp_item->quantity  = $temp_item->quantity + 1;
                    if($temp_item->update()){
                        echo json_encode(array('status'=> 'true' , 'temp_item_id' => $temp_item->id)); die;
                    }    
                }else{
                    $temp_item = new TempItems();
                    $temp_item->delivery_id= $_POST['delivery_id'];
                    $temp_item->item_id     = $item_id['id'];
                    $temp_item->quantity    = 1;
                    $temp_item->price       = $_POST['price'];
                    if($temp_item->save()){
                        echo json_encode(array('status'=> 'true' , 'temp_item_id' => $temp_item->id)); die;
                    }
                }
            }
            echo json_encode(false); die;
        }
    }

    public function actionUpdateTempOrderQuantity()
    {
        $latest = Misc::getLatestDate();
        if($latest != '' &&  date('Y-m-d') < $latest['latest_date'] ) { 
            echo json_encode(false); die;
        } else {
            if(Yii::$app->request->isAjax && isset($_POST) && isset($_POST['item']) && $_POST['item'] != '' && isset($_POST['delivery_id']) && $_POST['delivery_id'] != ''){
                $item_id = Query::queryOne("SELECT id FROM `menu_item` WHERE `slug` = '" . $_POST['item'] . "'");
                $temp_order = TempItems::find()->WHERE(['item_id' => $item_id , 'delivery_id' => $_POST['delivery_id']])->one();
                if($temp_order != null){
                    $temp_order->quantity = $_POST['quantity'];
                    if($temp_order->update()){
                        echo json_encode(array('status' => 'true' , 'quantity' => $temp_order->quantity)); die;
                    }
                }
            }
            echo json_encode(false); die;
        }
    }

    public function actionTempOrderList() 
    {
        $latest = Misc::getLatestDate();
        if($latest != '' &&  date('Y-m-d') < $latest['latest_date'] ) { 
            echo json_encode(false); die;
        } else {
            if(Yii::$app->request->isAjax && isset($_POST) && isset($_POST['item']) && $_POST['item'] != '' && isset($_POST['delivery_id']) && $_POST['delivery_id'] != '') {

                $item_id = Query::queryOne("SELECT id, price FROM `menu_item` WHERE `slug` = '" . $_POST['item'] . "'");

                $temp_order_list = TempOrderList::find()->WHERE(['item_id' => $item_id , 'delivery_id' => $_POST['delivery_id'], 'type' => Yii::$app->params['item_type']['regular'] ])->one();
                
                if($temp_order_list != null) {
                    $temp_order_list->quantity  = $temp_order_list->quantity + 1;
                    if($temp_order_list->update()){
                        echo json_encode(array('status'=> 'true' , 
                                            'temp_order_list_price' => $temp_order_list->price , 
                                            'temp_order_list_id' => $temp_order_list->id,
                                            'temp_order_list_item_id' => $temp_order_list->item_id , 
                                            'temp_order_list_type' => $temp_order_list->type)); die;
                    }    
                }else {
                    $temp_order_list = new TempOrderList();
                    $temp_order_list->delivery_id = $_POST['delivery_id'];
                    $temp_order_list->item_id   = $item_id['id'];
                    $temp_order_list->quantity  = 1;
                    $temp_order_list->price     = $item_id['price'];
                    $temp_order_list->type      = Yii::$app->params['item_type']['regular'];
                    if($temp_order_list->save()){
                        echo json_encode(array('status'=> 'true' , 
                                            'temp_order_list_price' => $temp_order_list->price , 
                                            'temp_order_list_id' => $temp_order_list->id,
                                            'temp_order_list_item_id' => $temp_order_list->item_id , 
                                            'temp_order_list_type' => $temp_order_list->type)); die;
                    }
                }
            }
            echo json_encode(false); die;
        }
    }

    public function actionSpecialTempOrderList() 
    {
        $latest = Misc::getLatestDate();
        if($latest != '' &&  date('Y-m-d') < $latest['latest_date'] ) { 
            echo json_encode(false); die;
        } else {
            if(Yii::$app->request->isAjax && isset($_POST) && $_POST['delivery_id'] != '') {

                foreach($_POST['item'] as $item):
                    $batch[] = [$_POST['delivery_id'], $item['id'], $item['quantity'], $item['price'], Yii::$app->params['item_type']['special']];
                endforeach;

                Query::batchInsert('temp_order_list', array('delivery_id', 'item_id', 'quantity', 'price', 'type'), $batch);

                echo json_encode(true); die;
            }
            echo json_encode(false); die;
        }
    }

    public function actionUpdateTempOrderListQuantity()
    {
        $latest = Misc::getLatestDate();
        if($latest != '' &&  date('Y-m-d') < $latest['latest_date'] ) { 
            echo json_encode(false); die;
        } else {
            if(Yii::$app->request->isAjax && isset($_POST) && isset($_POST['temp_order_list_id']) && $_POST['temp_order_list_id'] != '') {

                $temp_order_list = TempOrderList::find()->WHERE(['id' => $_POST['temp_order_list_id'] ])->one();
                if($temp_order_list != null){
                    $temp_order_list->quantity = $_POST['quantity'];
                    if($temp_order_list->update()){
                        echo json_encode(array('status' => 'true' , 'quantity' => $temp_order_list->quantity)); die;
                    }
                }
            }
            echo json_encode(false); die;
        }
    }

    public function actionRemoveTempOrderList() 
    {
        $latest = Misc::getLatestDate();
        if($latest != '' &&  date('Y-m-d') < $latest['latest_date'] ) { 
            echo json_encode(false); die;
        } else {
            if(Yii::$app->request->isAjax && isset($_POST) && $_POST['temp_order_list_id'] != null){
                Query::execute("DELETE FROM temp_order_list WHERE id = " . $_POST['temp_order_list_id']);
                echo json_encode(true); die;
            }
            echo json_encode(false); die;
        }
    }

    public function actionDeleteTempOrderList() 
    {
        $latest = Misc::getLatestDate();
        if($latest != '' &&  date('Y-m-d') < $latest['latest_date'] ) { 
            echo json_encode(false); die;
        } else {
            if(Yii::$app->request->isAjax && isset($_POST) && $_POST['delivery_id'] != null){
                Query::execute("DELETE FROM temp_order_list WHERE delivery_id = " . $_POST['delivery_id']);
                $kot_list = Kot::find()->WHERE(['id' => $_POST['kot_id']])
                                        ->with('kotItemRelation')
                                        ->with('kotItemRelation.item')
                                        ->with('kotItemRelation.specialItem')
                                        ->one();
                $kot = [];                   
                $kot['id'] = $kot_list['id'];
                $kot['table_id'] = $kot_list['table_id'];
                $kot['floor_id'] = $kot_list['floor_id'];
                $kot['delivery_id'] = $kot_list['delivery_id'];
                $kot['display_number'] = $kot_list['display_number'];
                $kot['created_on'] = $kot_list['created_on'];
                $j=0;
                foreach ($kot_list->kotItemRelation  as $kot_item) {
                    if($kot_item['type'] == Yii::$app->params['item_type']['regular']) {
                        $kot['item'][$j]['kot_item_id']  = $kot_item['id'];
                        $kot['item'][$j]['item_id']  = $kot_item['item']['id'];
                        $kot['item'][$j]['name']     = $kot_item['item']['name'];
                        $kot['item'][$j]['quantity'] = $kot_item['quantity'];
                        $kot['item'][$j]['price']    = $kot_item['price'];
                        $kot['item'][$j]['type']     = $kot_item['type'];
                        $j++;
                    }else {
                        $kot['item'][$j]['kot_item_id']  = $kot_item['id'];
                        $kot['item'][$j]['item_id']  = $kot_item['specialItem']['id'];
                        $kot['item'][$j]['name']     = 'Special-Item('.$kot_item['specialItem']['name'].')';
                        $kot['item'][$j]['quantity'] = $kot_item['quantity'];
                        $kot['item'][$j]['price']    = $kot_item['price'];
                        $kot['item'][$j]['type']     = $kot_item['type'];
                        $j++;
                    }
                }
                echo json_encode(array('status' => 'true' , 'kot' => $kot)); die;
            }
            echo json_encode(false); die;
        }
    }

    public function actionUpdateDelivery() 
    {
        $latest = Misc::getLatestDate();
        if($latest != '' &&  date('Y-m-d') < $latest['latest_date'] ) { 
            echo json_encode(false); die;
        } else {
            if(Yii::$app->request->isAjax && isset($_POST) && $_POST['delivery_id'] != null){
                $delivery = Delivery::find()->WHERE(['id' => $_POST['delivery_id']])->one();
                $delivery->$_POST['field'] = $_POST['value'];
                if($delivery->update()){
                    if($_POST['field']=='customer_phone'){
                        if($delivery->customer_phone!=''){
                            $customer = Query::queryOne("SELECT * FROM customer WHERE phone = ".$delivery->customer_phone."");
                            if($customer){
                                echo json_encode(array('status' => 'true' ,'exists'=>'true', 'data' => $_POST['value'],'customer'=>$customer)); die;    
                            }else{
                                echo json_encode(array('status' => 'true','exists'=>'false' , 'data' => $_POST['value'])); die;    
        
                            }
                        }
                    }
                    echo json_encode(array('status' => 'true' , 'data' => $_POST['value'])); die;    
                }else{
                    echo json_encode(array('status' => 'true' ,'exists'=>'false', 'data' => $_POST['value'])); die;    

                }
            }
            echo json_encode(false); die;
        }
    }

    public function actionSetting() 
    {
        $latest = Misc::getLatestDate();
        if($latest != '' &&  date('Y-m-d') < $latest['latest_date'] ) { 
            return $this->redirect(Yii::$app->request->baseUrl . '/date-fraud/');
        } else {
            $delivery_charge_amount     = Query::queryOne("SELECT value FROM `random` WHERE field_name = 'delivery_charge_amount'");
            return $this->render('setting', array('delivery_charge_amount' => $delivery_charge_amount));
        }
    }

    /*public function actionSetDeliveryCharge() 
    {
        $latest = Misc::getLatestDate();
        if($latest != '' &&  date('Y-m-d') < $latest['latest_date'] ) { 
            echo json_encode(false); die;
        } else {
            if(Yii::$app->request->isAjax && isset($_POST) && $_POST['delivery_charge_amount'] != null && $_POST['vat_status'] != null) {

                $ranA = Random::find()->WHERE(['field_name' => 'delivery_charge_amount'])->one();
                if($ranA != null){
                    $ranA->field_name = 'delivery_charge_amount';
                    $ranA->value      = $_POST['delivery_charge_amount'];
                    if( $ranA->update() ){
                        $status = true;
                    }else {
                        $status = true;
                    }
                }else {
                    $randomA = new Random();
                    $randomA->field_name = 'delivery_charge_amount';
                    $randomA->value      = $_POST['delivery_charge_amount'];
                    if($randomA->save()) {
                        $status = true;
                    }else {
                        $status = true;
                    }
                }

                $ranB = Random::find()->WHERE(['field_name' => 'delivery_charge_vat_status'])->one();
                if($ranB != null) {
                    $ranB->field_name = 'delivery_charge_vat_status';
                    $ranB->value      = $_POST['vat_status'];
                    if($ranB->update()) {
                        $status = true;
                    }else {
                        $status = true;
                    }
                }else {
                    $randomB = new Random();
                    $randomB->field_name = 'delivery_charge_vat_status';
                    $randomB->value      = $_POST['vat_status'];
                    if($randomB->save()) {
                        $status = true;
                    }else {
                        $status= true;
                    }
                }
                if($status == true) {
                    echo json_encode(true); die;
                }else {
                    echo json_encode(false); die;
                }
            }
            echo json_encode(false); die;
        }
    }*/

    public function actionSetDeliveryCharge() 
    {
        $latest = Misc::getLatestDate();
        if($latest != '' && date('Y-m-d') < $latest['latest_date'] ) { 
            echo json_encode(false); die;
        }else {
            if(Yii::$app->request->isAjax && isset($_POST) && $_POST['delivery_charge_amount'] != null) {

                $ranA = Random::find()->WHERE(['field_name' => 'delivery_charge_amount'])->one();
                if($ranA != null){
                    $ranA->field_name = 'delivery_charge_amount';
                    $ranA->value      = $_POST['delivery_charge_amount'];
                    if( $ranA->update() ){
                        $status = true;
                    }else {
                        $status = true;
                    }
                }else {
                    $randomA = new Random();
                    $randomA->field_name = 'delivery_charge_amount';
                    $randomA->value      = $_POST['delivery_charge_amount'];
                    if($randomA->save()) {
                        $status = true;
                    }else {
                        $status = true;
                    }
                }
                if($status == true) {
                    echo json_encode(true); die;
                }else {
                    echo json_encode(false); die;
                }
            }
            echo json_encode(false); die;
        }
    }
    public function actionCheckCustomer(){
        $customer = Query::queryOne("SELECT * FROM customer WHERE phone = ".$_POST['value']."");
        if($customer){
            echo json_encode(array('status' => 'true' ,'exists'=>'true', 'data' => $_POST['value'],'customer'=>$customer)); die;    
        }else{
            echo json_encode(array('status' => 'true','exists'=>'false' , 'data' => $_POST['value'])); die;    

        }  
    }
}