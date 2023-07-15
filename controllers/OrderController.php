<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\HttpException;

use app\components\Misc;
use app\components\Pdf;
use app\components\Query;
use app\components\Notify;
use app\components\UniqueUser;
use app\components\HelperTips as HTips;
use app\components\HelperMenuItem as HMenu;
use app\components\HelperMenuCategory as HMenuCat;
use app\components\HelperSettings as HSettings;
use app\components\HelperPrinter as HPrinter;
use app\components\Sync;
use app\components\HelperStock as HStock;
use app\components\HelperOccupy as HOccupy;
use app\components\HelperMember as HMember;

use app\models\Order;
use app\models\Customer;

use app\models\DuplicateBill;
use app\models\BreakDownReceipt;
use app\models\BreakDownItems;
use app\models\OrderItems;
use app\models\TempItems;
use app\models\TempOrderList;
use app\models\Kot;
use app\models\KotItems;
use app\models\MenuItem;
use app\models\Occupy;
use app\models\User;
use app\models\Retail;
use app\models\TakeAway;
use app\models\PickUp;
use app\models\Delivery;
use app\models\Foc;
use app\models\FocItems;
use app\models\Random;
use app\models\TableDetails;
use app\models\StockEntries;
use app\models\SpecialOrderItems;
use app\models\Member;
use app\models\MemberReport;

class OrderController extends Controller {

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

            if ($this->action->id !='today' && $this->action->id != 'invoice') 
            {
                if ((date('Y-m-d') < $starting_fiscal_year_from_date) 
                        || ( date('Y-m-d') > date('Y-m-d', strtotime($starting_fiscal_year_to_date. ' + 11 days'))) )
                {
                    throw new HttpException(404, 'Page not found.');
                }
            }
        }

        if ($this->action->id =='get-opening-balance' || $this->action->id == 'make-debtor-receipt') {
            Yii::$app->controller->enableCsrfValidation = false;
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

        if (isset($_GET['occid']) && $_GET['occid'] != null && $_GET['occid'] > 0) {
            Yii::$app->session['discount'] = false;
            Yii::$app->session['master-password'] = false;
            
            $occupy_id = (int) htmlspecialchars($_GET['occid'], ENT_QUOTES);
            $occupy = Query::queryOneSecure("SELECT * FROM occupy WHERE id = :id",[':id'=>$occupy_id]);

            if ($occupy != null) {

                $table = Query::queryOneSecure("SELECT t.table_name as name, s.name as section_name FROM `occupy` as o
                                        LEFT JOIN `table_details` as t ON t.id = o.table_id
                                        LEFT JOIN `floor` as s ON s.id = t.floor
                                        WHERE o.id = :id",[':id'=>$occupy_id]);

                $temp_items = Query::queryAllSecure("SELECT t.*, m.id as item_id, m.slug , m.price, m.name , m.is_discountable , si.id as special_item_id, si.name as special_item_name, si.price as special_item_price 
                                                FROM temp_items as t
                                                LEFT JOIN menu_item as m ON m.id = t.item_id
                                                LEFT JOIN special_order_items as si ON si.id = t.item_id
                                                WHERE t.occupy_id = :id",[':id'=>$occupy_id]);

                $temp_order_list = Query::queryAllSecure("SELECT t.*, m.id as item_id, m.slug , m.price, m.name, m.is_discountable, si.id as special_item_id, si.name as special_item_name, si.price as special_item_price 
                                                FROM temp_order_list as t
                                                LEFT JOIN menu_item as m ON m.id = t.item_id
                                                LEFT JOIN special_order_items as si ON si.id = t.item_id
                                                WHERE t.occupy_id = :id",[':id'=>$occupy_id]);

                $settings = HSettings::getBasic("'name-in-bill', 'address-in-bill', 'phone-no-in-bill', 'pan-no-in-bill', 'thank-you-note-in-bill', 'service-charge-rate'");
                
                $service_charge_rate = ($settings['service-charge-rate'] != null && $settings['service-charge-rate-is-active'] != '0') ? $settings['service-charge-rate'] : 0;
                $service_charge_rate_is_active = ($settings['service-charge-rate-is-active'] != null) ? $settings['service-charge-rate-is-active'] : 0;

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

                $kot    = Kot::find()->WHERE(['occupy_id' => $occupy_id])
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

                $break_down    = Query::queryAllSecure('SELECT bd.*, d.name as debtor_name 
                                                    FROM `break_down_receipt` as bd
                                                    LEFT JOIN debtors as d ON d.id = bd.debtor_id
                                                    WHERE bd.occupy_id = :occupy_id 
                                                    ORDER BY invoice_no',[':occupy_id'=>$occupy_id]);

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

                $break_down_items   = Query::queryAllSecure("SELECT bi.item_id, sum(bi.quantity) as quantity 
                                                        FROM `break_down_receipt` as br
                                                        LEFT JOIN `break_down_items` as bi ON br.id = bi.break_down_receipt_id
                                                        WHERE br.occupy_id = :occupy_id
                                                        GROUP BY bi.item_id, bi.type",[':occupy_id'=>$occupy_id]);

                $kot_bill_printers = HPrinter::getKotPrinters("'bill'");

                $all_category = HMenuCat::getMenuCategories();

                return $this->render('index', array(
                    'items'                         => $items,
                    'categories'                    => $categories,
                    'service_charge_rate'           => $service_charge_rate,
                    'service_charge_rate_is_active' => $service_charge_rate_is_active,
                    'max_inv'                       => $max_inv,
                    'max_inv_break_down'            => $max_inv_break_down,
                    'user_name'                     => $user->name,
                    'discount_upto'                 => $user->discount_upto,
                    'settings'                      => $settings,
                    'debtors'                       => $debtors,
                    'occupy'                        => $occupy,
                    'temp_items'                    => $temp_items,
                    'temp_order_list'               => $temp_order_list,
                    'kot'                           => $kot,
                    'break_down'                    => $break_down,
                    'break_down_total'              => $break_down_total,
                    'break_down_items'              => $break_down_items,
                    'kot_bill_printers'             => $kot_bill_printers,
                    'table'                         => $table,
                    'all_category'                  => $all_category
                    
                ));
            }
            else {
                throw new HttpException(404, 'Page not found.'); die;
            }
        }
        else {
            throw new HttpException(404, 'Page not found.'); die;
        }
    }

    /*public function actionVersionThree() 
    {
        if (isset($_GET['occid']) && $_GET['occid'] != null && $_GET['occid'] > 0) {

            Yii::$app->session['discount'] = false;
            Yii::$app->session['master-password'] = false;
            
            $occupy_id = (int) $_GET['occid'];
            $occupy = Query::queryOne("SELECT * FROM occupy WHERE id = " . $occupy_id);

            if ($occupy != null) {

                $table = Query::queryOne("SELECT t.table_name as name, s.name as section_name FROM `occupy` as o
                                        LEFT JOIN `table_details` as t ON t.id = o.table_id
                                        LEFT JOIN `floor` as s ON s.id = t.floor
                                        WHERE o.id = ".$occupy_id);

                $temp_items = Query::queryAll("SELECT t.*, m.id as item_id, m.slug , m.price, m.name , m.is_discountable, si.id as special_item_id, si.name as special_item_name, si.price as special_item_price 
                                                FROM temp_items as t
                                                LEFT JOIN menu_item as m ON m.id = t.item_id
                                                LEFT JOIN special_order_items as si ON si.id = t.item_id
                                                WHERE t.occupy_id = " . $occupy_id);

                $temp_order_list = Query::queryAll("SELECT t.*, m.id as item_id, m.slug , m.price, m.name, m.is_discountable, si.id as special_item_id, si.name as special_item_name, si.price as special_item_price 
                                                FROM temp_order_list as t
                                                LEFT JOIN menu_item as m ON m.id = t.item_id
                                                LEFT JOIN special_order_items as si ON si.id = t.item_id
                                                WHERE t.occupy_id = " . $occupy_id);

                $settings = HSettings::getBasic("'name-in-bill', 'address-in-bill', 'phone-no-in-bill', 'pan-no-in-bill', 'thank-you-note-in-bill', 'service-charge-rate'");
                
                $service_charge_rate = ($settings['service-charge-rate'] != null && $settings['service-charge-rate-is-active'] != '0') ? $settings['service-charge-rate'] : 0;
                $service_charge_rate_is_active = ($settings['service-charge-rate-is-active'] != null) ? $settings['service-charge-rate-is-active'] : 0;

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

                $kot    = Kot::find()->WHERE(['occupy_id' => $occupy_id])
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
                                                    WHERE bd.occupy_id = ' . $occupy_id .
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
                                                        WHERE br.occupy_id = " . $occupy_id .
                                                        ' GROUP BY bi.item_id, bi.type');

                $kot_bill_printers = HPrinter::getKotPrinters("'bill'");

                $all_category = HMenuCat::getMenuCategories();

                return $this->render('index', array(
                    'items'                         => $items,
                    'categories'                    => $categories,
                    'service_charge_rate'           => $service_charge_rate,
                    'service_charge_rate_is_active' => $service_charge_rate_is_active,
                    'max_inv'                       => $max_inv,
                    'max_inv_break_down'            => $max_inv_break_down,
                    'user_name'                     => $user->name,
                    'discount_upto'                 => $user->discount_upto,
                    'settings'                      => $settings,
                    'debtors'                       => $debtors,
                    'occupy'                        => $occupy,
                    'temp_items'                    => $temp_items,
                    'temp_order_list'               => $temp_order_list,
                    'kot'                           => $kot,
                    'break_down'                    => $break_down,
                    'break_down_total'              => $break_down_total,
                    'break_down_items'              => $break_down_items,
                    'kot_bill_printers'             => $kot_bill_printers,
                    'table'                         => $table,
                    'all_category'                  => $all_category
                ));
            }
            else {
                throw new HttpException(404, 'Page not found.'); die;
            }
        }
        else {
            throw new HttpException(404, 'Page not found.'); die;
        } 
    }*/

    public function actionAddSpecialItem()
    {
        if(Yii::$app->request->isAjax && isset($_POST)) {
            $model               = new SpecialOrderItems();
            $model->name         = htmlspecialchars(trim($_POST['name']), ENT_QUOTES);
            $model->price        = htmlspecialchars(trim($_POST['price']), ENT_QUOTES);
            $model->category_id  = htmlspecialchars(trim($_POST['category_id']), ENT_QUOTES);
            $model->description  = htmlspecialchars(trim($_POST['description']), ENT_QUOTES);
            $model->remarks      = htmlspecialchars(trim($_POST['remarks']), ENT_QUOTES);
            $model->created_on   = date('Y-m-d H:i:s');
            $model->created_by   = Yii::$app->session['eHhupx5UpkLZoXRP_cR1ozEVjY14zWOC0_user']->id;
            if($model->save()) {
                $sp_item = Query::queryOne("SELECT si.*, mc.category, mc.type as category_type
                                            FROM `special_order_items` AS si
                                            LEFT JOIN `menu_category` AS mc
                                                ON si.category_id = mc.id
                                            WHERE si.id = " . $model->id);
                echo json_encode(array('special_item' => $sp_item)); die;
            }
        }
        echo json_encode(false); die;
    }

    public function actionGetSpecialItem()
    {
        if(Yii::$app->request->isAjax) {
            $special_items  = Query::queryAll("SELECT si.*, mc.category, mc.type as category_type
                                            FROM `special_order_items` AS si
                                            LEFT JOIN `menu_category` AS mc
                                                ON si.category_id = mc.id
                                            ORDER BY si.id DESC");
            echo json_encode(array('special_items' => $special_items)); die;
        }
        echo json_encode(false); die;
    }

    public function actionEditableSpecialItem()
    {
        $latest = Misc::getLatestDate();
        if( $latest != '' && date('Y-m-d') < $latest['latest_date'] ) { 
            echo json_encode(array(
                            'status' => 'error', 
                            'display_value' => $_POST['old_value'],
                            'msg' => 'Sorry! Could not update special item at this time.'
                            )); die;
        } else {
            if (Yii::$app->request->isAjax && isset($_POST) && $_POST['pk'] != null && $_POST['name'] != null && $_POST['value'] != null) {

                $model = SpecialOrderItems::findOne($_POST['pk']);
                $model->$_POST['name'] = isset($_POST['value']) ? htmlspecialchars(trim($_POST['value']), ENT_QUOTES) : 0;
                if($model->update()) {
                    echo json_encode(array(
                                'status' => 'success', 
                                'display_value' => $_POST['value'], 
                                'msg' => 'Your Special Item has been updated.',
                                'special_item' => true,
                                'special_item_id' => $_POST['pk']
                                )); die;
                }
            }
            echo json_encode(array(
                            'status' => 'error', 
                            'display_value' => $_POST['old_value'],
                            'msg' => 'Sorry! Could not update special item at this time.'
                            )); die;
        }
    }

    public function actionCalculateCategorywiseTotal()
    {
        if (Yii::$app->request->isAjax && isset($_POST) && $_POST['items'] != '') {
            $temp_item_ids = [];
            $i=0;
            foreach ($_POST['items'] as $items) {
                $temp_item_ids[$i] = htmlspecialchars($items['id'],ENT_QUOTES);
                $i++;
            }
            $items_id = implode("','",$temp_item_ids);

            $categories = Query::queryAll("SELECT mc.id as category_id, mc.category as category_name , mi.id as item_id, mi.is_discountable
                                            FROM `menu_category` as mc 
                                            LEFT JOIN `menu_item` as mi 
                                                ON mi.category_id = mc.id 
                                            WHERE mi.id IN ('".$items_id."')
                                            ORDER BY mc.id");
            $new_categories = [];
            foreach ($categories as $cate) {
                $new_categories[$cate['category_id']]['category_id'] = $cate['category_id'];
                $new_categories[$cate['category_id']]['category_name'] = $cate['category_name'];
                foreach($_POST['items'] as $items) {
                    $new_categories[$cate['category_id']]['item_total'][] = '';
                    if($cate['item_id'] == $items['id'] && $cate['is_discountable'] == Yii::$app->params['is_discountable']['yes']) {
                        $new_categories[$cate['category_id']]['item_total'][] = $items['price'] * $items['quantity'];            
                    }
                }
            }
            echo json_encode(array('categories' => $new_categories , 
                                    'discount_upto' => Yii::$app->session['eHhupx5UpkLZoXRP_cR1ozEVjY14zWOC0_user']->discount_upto)); die;
        }
        echo json_encode(false); die;
    }
    //HEre
    public function actionMake() 
    {   

        $latest = Misc::getLatestDate();
        if( $latest != '' && date('Y-m-d') < $latest['latest_date'] ) { 
            echo json_encode(false); die;
        } else {
            if(Yii::$app->session['eHhupx5UpkLZoXRP_cR1ozEVjY14zWOC0_user']['role'] != Yii::$app->params['user_role']['floor_supervisor']) {
                if (Yii::$app->request->isAjax && isset($_POST) && isset($_POST['items']) && $_POST['items'] != '') {

                    if($_POST['tip_amount'] != 0){
                        HTips::addTips($_POST['tip_amount']);
                    }

                    $temp = explode(":",Yii::$app->session['fiscal_year']);
                    $starting_fiscal_year_from_date = $temp[0];
                    $starting_fiscal_year_to_date   = $temp[1];

                    $inv_start = date('y',strtotime($starting_fiscal_year_to_date ));

                    $max_inv = $inv_start.'-1';

                    $max_invoice = Query::queryOne("SELECT MAX(CAST(SUBSTRING(invoice_no, 4, length(invoice_no)-3) AS UNSIGNED)) as max FROM `order` WHERE DATE(created_on) >= '".$starting_fiscal_year_from_date."' AND DATE(created_on) <= '".$starting_fiscal_year_to_date."'"); 
                    
                    if ($max_invoice['max'] != null) {
                        $max_inv = $inv_start. '-' . ((string) ($max_invoice['max'] + 1));
                    }

                    $items = $_POST['items']; 
                    
                    if ($items != null) {
                        $sub_total = 0;
                        $discountable_sub_total = 0;
                        foreach($items as $item):
                            $qty = $item['quantity'];
                            $price = $item['price'];

                            if(isset($item['discountable']) && $item['discountable'] == Yii::$app->params['is_discountable']['yes']) {
                                $discountable_sub_total += $qty * $price;
                            }
                            $sub_total += $qty * $price;
                        endforeach;

                        $user = User::findOne(Yii::$app->session['eHhupx5UpkLZoXRP_cR1ozEVjY14zWOC0_user']->id);

                        $total = $sub_total;

                        /*codes if discount is calculated before service charge*/
                        $discount_rate = 0;
                        $discount_amount = 0;
                        if($_POST['total_discount_amount'] == 0){
                            if (Yii::$app->session['discount'] == true && isset($_POST['discount']) && $_POST['discount'] != '' && $_POST['discount'] > 0) {
                            
                                $upto = (Yii::$app->session['master-password'] == true) ? 100 : $user->discount_upto;
                                
                                if ($_POST['discount'] <= $upto) {
                                    $discount_rate = $_POST['discount'];
                                    $discount_amount = Misc::round_up(( $discount_rate / 100 ) * $discountable_sub_total, 2);
                                    $total = $sub_total - $discount_amount;
                                } 
                            }
                        }else {
                            $discount_amount    = $_POST['total_discount_amount'];
                            $discount_rate      = Misc::round_up(( $discount_amount / $discountable_sub_total ) * 100, 2);
                            $total = $sub_total - $discount_amount;
                        }

                        if($_POST['customer_pax'] != null) {
                            $new_customer_pax = $_POST['customer_pax'];
                        }elseif (array_key_exists('new_customer_pax', $_POST)) {
                            $new_customer_pax = $_POST['new_customer_pax'];
                        }else{
                            $new_customer_pax = 0;
                        }

                        if( $_POST['occupy_id'] != null){
                            $settings = HSettings::getBasic("'service-charge-rate'");
                            $service_charge_rate = ($settings['service-charge-rate'] != null) ? $settings['service-charge-rate'] : 0;
                            $service_charge_amount = 0;
                            if($settings['service-charge-rate-is-active'] != 0){
                                $service_charge_amount = ( $service_charge_rate * $total ) / 100; 
                                $total = $total + $service_charge_amount;
                            }

                            $occupy = Occupy::find()->WHERE(['id' => $_POST['occupy_id']])->one();
                            $occupy->customer_pax = $new_customer_pax;
                            $occupy->update();
                        }
                        elseif( $_POST['retail_id'] != null){
                            $settings = HSettings::getBasic("'retail-service-charge-rate'");
                            $service_charge_rate = ($settings['retail-service-charge-rate'] != null) ? $settings['retail-service-charge-rate'] : 0;
                            $service_charge_amount = 0;
                            if($settings['retail-service-charge-rate-is-active'] != 0){
                                $service_charge_amount = ( $service_charge_rate * $total ) / 100; 
                                $total = $total + $service_charge_amount;
                            }
                        }
                        elseif( $_POST['take_away_id'] != null){
                            $settings = HSettings::getBasic("'take-away-service-charge-rate'");
                            $service_charge_rate = ($settings['take-away-service-charge-rate'] != null) ? $settings['take-away-service-charge-rate'] : 0;
                            $service_charge_amount = 0;
                            if($settings['take-away-service-charge-rate-is-active'] != 0){
                                $service_charge_amount = ( $service_charge_rate * $total ) / 100; 
                                $total = $total + $service_charge_amount;
                            }
                        }
                        elseif( $_POST['pick_up_id'] != null){
                            $settings = HSettings::getBasic("'pick-up-service-charge-rate'");
                            $service_charge_rate = ($settings['pick-up-service-charge-rate'] != null) ? $settings['pick-up-service-charge-rate'] : 0;
                            $service_charge_amount = 0;
                            if($settings['pick-up-service-charge-rate-is-active'] != 0){
                                $service_charge_amount = ( $service_charge_rate * $total ) / 100; 
                                $total = $total + $service_charge_amount;
                            }
                        }
                        elseif( $_POST['delivery_id'] != null){
                            $settings = HSettings::getBasic("'delivery-service-charge-rate'");
                            $service_charge_rate = ($settings['delivery-service-charge-rate'] != null) ? $settings['delivery-service-charge-rate'] : 0;
                            $service_charge_amount = 0;
                            if($settings['delivery-service-charge-rate-is-active'] != 0){
                                $service_charge_amount = ( $service_charge_rate * $total ) / 100; 
                                $total = $total + $service_charge_amount;
                            }
                        }  
                        /*codes if discount is calculated before service charge*/

                        $temp_total     = Misc::round_up($total, 2);
                        $grand_total    = round($temp_total);
                        $round_value    = round(($grand_total - $temp_total) , 2);

                        $order                          = new Order();
                        $order->id                      = time();
                        $order->invoice_no              = $max_inv;
                        $order->occupy_id               = ($_POST['occupy_id'] != null) ? $_POST['occupy_id'] : 0;
                        $order->customer_name           = ($_POST['customer_name'] != null) ? htmlspecialchars(trim(ucwords($_POST['customer_name'])), ENT_QUOTES) : '';
                        $order->customer_pan            = ($_POST['customer_pan'] != null) ? htmlspecialchars(trim($_POST['customer_pan']), ENT_QUOTES) : '0';
                        // $order->customer_address        = ($_POST['customer_address'] != null) ? htmlspecialchars(trim($_POST['customer_address']), ENT_QUOTES) : '';
                        $order->customer_pax            = $new_customer_pax;
                        $order->customer_address         = (array_key_exists('customer_address', $_POST) && $_POST['customer_address'] != null) ? htmlspecialchars(trim($_POST['customer_address']), ENT_QUOTES) : '';
 
                        $order->customer_phone          = (array_key_exists('customer_phone', $_POST) && $_POST['customer_phone'] != null) ? htmlspecialchars(trim($_POST['customer_phone']), ENT_QUOTES) : '';
                        $order->table_id                = ($_POST['table_id'] != null) ? $_POST['table_id'] : 0;
                        $order->floor_id                = ($_POST['floor_id'] != null) ? $_POST['floor_id'] : 0;
                        $order->sub_total               = $sub_total;
                        $order->service_charge_rate     = $service_charge_rate;
                        $order->service_charge_amount   = $service_charge_amount;
                        $order->discount_rate           = $discount_rate;
                        $order->discount_amount         = $discount_amount;
                        $order->total                   = $grand_total;
                        $order->round_value             = $round_value;
                        $order->payable_total           = ($_POST['remaining_total'] != null) ? $_POST['remaining_total'] : 0;
                        $order->received_amount         = ($_POST['received_amount'] != null) ? $_POST['received_amount'] : $grand_total;
                        $order->change_amount           = ($_POST['change_amount'] != null) ? $_POST['change_amount'] : 0;
                        $order->payment_type            = ($_POST['payment_type'] != null) ? $_POST['payment_type'] : 0;
                        $order->created_on              = date('Y-m-d H:i:s');
                        $order->created_by              = Yii::$app->session['eHhupx5UpkLZoXRP_cR1ozEVjY14zWOC0_user']->id;
                        $order->member_id               = ($_POST['member_id'] != null) ? htmlspecialchars($_POST['member_id'], ENT_QUOTES) : 0;

                        $latest_threshold = Query::queryOne("SELECT id FROM `member_privillege_threshold` ORDER BY id DESC");
                        if($latest_threshold != null) {
                            $order->privillege_threshold_id = $latest_threshold['id'];
                        }

                        if( $_POST['occupy_id'] != null ) {
                            $order->type  = Yii::$app->params['order_type']['table_order'];
                        }elseif( $_POST['retail_id'] != null ) {
                            $order->type  = Yii::$app->params['order_type']['retail'];
                        }elseif( $_POST['take_away_id'] != null ) {
                            $order->type  = Yii::$app->params['order_type']['take_away'];
                        }elseif( $_POST['pick_up_id'] != null ) {
                            $order->type  = Yii::$app->params['order_type']['pick_up'];
                        }elseif( $_POST['delivery_id'] != null ) {
                            $order->type  = Yii::$app->params['order_type']['delivery'];
                        }elseif( $_POST['delivery_id'] != null ) {
                            $order->type  = Yii::$app->params['order_type']['delivery_charge'];
                        }


                        if ($order->save()) {
            // Change HERE Mangit
                            $is_customer=Query::queryOne("SELECT * FROM customer WHERE phone = '".$order->customer_phone."'");
                            if(!$is_customer){
                                $customer= new Customer();
                                if($order->customer_name!=''){
                                    $customer->name =$order->customer_name;
                                }else{
                                    $customer->name ='Cash Customer';
                                }
                                $customer->phone =$order->customer_phone;
                                $customer->save();

                            }else{
                                $customer= Customer::findOne($is_customer['id']);
                                if($order->customer_name!=''){
                                    $customer->name= $order->customer_name;
                                    $customer->update();
                                }

                            }
            // Change HERE Mangit

                            $order_id     = $order->id;
                            $order_inv    = $order->invoice_no;

                            /*codes to save the membership discount details*/
                            if($_POST['member_id'] != '') {
                                $items = $_POST['items']; 
                                foreach($items as $item):
                                    if($item['type'] == Yii::$app->params['item_type']['regular']) {
                                        $items_id[] = $item['item_id'];
                                    }
                                endforeach;
                                $item_ids = implode("','",$items_id);

                                $member_discount = Query::queryAll("SELECT md.discount_allowed, md.category_id, mc.category
                                                                FROM `member_discount` as md
                                                                LEFT JOIN `menu_category` as mc 
                                                                    ON mc.id = md.category_id");

                                foreach($member_discount as $mem_dis) {
                                    $discount_allowed_category_ids[] = $mem_dis['category_id'];
                                }
                                $category_ids = implode("','",$discount_allowed_category_ids);

                                $discount_allowed_category_detail = Query::queryAll("SELECT mc.id as category_id, mc.category, mi.id as item_id , mi.price, mi.is_discountable
                                                                    FROM `menu_category` as mc 
                                                                    LEFT JOIN `menu_item` as mi 
                                                                        ON mi.category_id = mc.id 
                                                                    WHERE mc.id IN ('".$category_ids."')
                                                                    AND mi.id IN ('".$item_ids."')");

                                $category_detail = '';
                                $i=0;

                                foreach ($member_discount as $mem_dis) { 
                                    $i++;
                                    $j=0;
                                    $category_detail[$i] = $mem_dis;
                                    foreach ($discount_allowed_category_detail as $dis) { 
                                        if($dis['category_id'] == $mem_dis['category_id']) {
                                            $category_detail[$i]['item'][$j]['item_id'] = $dis['item_id'];
                                            $category_detail[$i]['item'][$j]['price'] = $dis['price'];

                                            $j++;
                                        } 
                                    }
                                }

                                $member_report = new MemberReport();
                                $member_report->member_id = $_POST['member_id'];
                                $member_report->order_id   = $order_id;
                                $member_report->created_on = date('Y-m-d H:i:s');
                                $member_report->save();

                                $member_order_category_batch = '';

                                foreach($category_detail as $cate_detail):
                                    $discount_amount = 0;
                                    $total = 0;
                                    if(array_key_exists('item', $cate_detail)) :
                                        foreach ($cate_detail['item'] as $cate_item) :
                                            foreach($items as $item):
                                                if($item['type'] == Yii::$app->params['item_type']['regular'] && $cate_item['item_id'] == $item['item_id']) {

                                                    $discount_amount += ($cate_detail['discount_allowed'] / 100) * $cate_item['price'] * $item['quantity'];

                                                    $total += $cate_item['price'] * $item['quantity'];

                                                }
                                            endforeach;
                                        endforeach;
                                        $member_order_category_batch[] = [$member_report->id , $cate_detail['category_id'] , $cate_detail['discount_allowed'] , $discount_amount , $total];
                                    endif;
                                endforeach;

                                Query::batchInsert('member_order_category', array('member_report_id', 'category_id' , 'discount_rate' , 'discount_amount' , 'total'), $member_order_category_batch);
                            }
                            /*codes to save the membership discount details*/

                            if( $_POST['occupy_id'] != null){
                                HOccupy::setOccupied($_POST['occupy_id']);
                            }

                            /*to make cash receipt of final payment*/
                            if($_POST['payment_type'] == Yii::$app->params['payment_type']['cash'])
                            {
                                $max_bd_inv = 1;
                                $max_bd_invoice = Query::queryOne('SELECT MAX(invoice_no) as max FROM `break_down_receipt`'); 
                                if ($max_bd_invoice['max'] != null) {
                                    $max_bd_inv += $max_bd_invoice['max'];
                                }

                                $break_down                     = new BreakDownReceipt();
                                $break_down->invoice_no         = $max_bd_inv;
                                $break_down->order_id           = $order->id;
                                $break_down->customer_name      = $order->customer_name;
                                $break_down->sub_total             = $order->sub_total;
                                $break_down->service_charge_rate   = $order->service_charge_rate;
                                $break_down->service_charge_amount = $order->service_charge_amount;
                                $break_down->discount_rate         = $order->discount_rate;
                                $break_down->discount_amount       = $order->discount_amount;
                                $break_down->total                 = $order->payable_total;
                                $break_down->received_amount       = $order->received_amount;
                                $break_down->change_amount         = $order->change_amount;
                                $break_down->payment_type          = $order->payment_type;
                                $break_down->type               = Yii::$app->params['break_down_payment_type']['cash_receipt'];
                                $break_down->created_on         = date('Y-m-d H:i:s');
                                $break_down->created_by         = Yii::$app->session['eHhupx5UpkLZoXRP_cR1ozEVjY14zWOC0_user']->id;
                                $break_down->save();
                            }
                            /*to make cash receipt of final payment*/

                            $stock_item   = [];
                            foreach($items as $item):
                                $batch[] = [$order->id, $item['item_id'], $item['quantity'], $item['price'], $item['type']];
                                if($item['type'] == Yii::$app->params['item_type']['regular']) {
                                    $stock_item[$item['item_id']] = $item['quantity'];
                                }
                            endforeach;

                            Query::batchInsert('order_items', array('order_id', 'item_id', 'quantity', 'price','type'), $batch);

                            if($stock_item != null) {
                                HStock::addStockOut($stock_item);
                            }

                            Yii::$app->session['discount'] = false;
                            Yii::$app->session['master-password'] = false;

                            $order_type = '';

                            if( $_POST['occupy_id'] != null){
                                $order_type = 'occupy';
                            }
                            elseif( $_POST['retail_id'] != null){
                                $order_type = 'retail';
                            }
                            elseif( $_POST['take_away_id'] != null){
                                $order_type = 'take_away';
                            }
                            elseif( $_POST['pick_up_id'] != null){
                                $order_type = 'pick_up';
                            }
                            elseif( $_POST['delivery_id'] != null){
                                $order_type = 'delivery';
                            }

                            $data   = [];
                            $data1 = Query::queryOne("SELECT o.*, u.name as user_name 
                                                        FROM `order` AS o
                                                        LEFT JOIN `user` AS u
                                                            ON u.id = o.created_by
                                                        WHERE o.id = ".$order_id);

                            $data2 = Query::queryAll("SELECT oi.*, m.price, m.name, m.is_discountable, si.name as special_item_name, si.price as special_item_price  
                                                        FROM `order_items` as oi
                                                        LEFT JOIN `menu_item` as m ON m.id = oi.item_id
                                                        LEFT JOIN special_order_items as si ON si.id = oi.item_id
                                                        WHERE oi.order_id = " . $order_id); 
                            $data['order'] = $data1;
                            $data['items'] = $data2;
                            $printer = HPrinter::getPrinters("'bill'");
                            $this->PrintBill($printer['bill'], $data, $order_type);

                            $delivery_inv = '';
                            $delivery_charge_amount = 0;

                            if( $_POST['occupy_id'] != null){
                                $occupy = Occupy::find()->WHERE(['id' => $_POST['occupy_id']])->one();
                                if($occupy != null){
                                    if($occupy->status == 0){
                                        $occupy->status = 1;
                                    }else{
                                        $occupy->status = 0;
                                    }
                                    $occupy->update();
                                }

                                $field = 'occupy_id';
                                $value = $_POST['occupy_id'];

                                if(Yii::$app->session['eHhupx5UpkLZoXRP_cR1ozEVjY14zWOC0_user']->role != Yii::$app->params['user_role']['superadmin']) {
                                    $log = array(
                                        'action' => "Cash payment for table order has been made for the amount of Rs. " . $grand_total,
                                        'type' => "billing"
                                    );
                                    Notify::auditLog($log);
                                }
                            }
                            elseif( $_POST['retail_id'] != null){
                                $retail = Retail::find()->WHERE(['id' => $_POST['retail_id']])->one();
                                if($retail != null){
                                    if($retail->status == 0){
                                        $retail->status = 1;
                                    }else{
                                        $retail->status = 0;
                                    }
                                    $retail->update();
                                }

                                $field = 'retail_id';
                                $value = $_POST['retail_id'];

                                if(Yii::$app->session['eHhupx5UpkLZoXRP_cR1ozEVjY14zWOC0_user']->role != Yii::$app->params['user_role']['superadmin']) {
                                    $log = array(
                                        'action' => "Cash payment for retail order has been made for the amount of Rs. " . $grand_total,
                                        'type' => "billing"
                                    );
                                    Notify::auditLog($log);
                                }
                            }
                            elseif( $_POST['take_away_id'] != null){
                                $take_away = TakeAway::find()->WHERE(['id' => $_POST['take_away_id']])->one();
                                if($take_away != null){
                                    if($take_away->status == 0){
                                        $take_away->status = 1;
                                    }else{
                                        $take_away->status = 0;
                                    }
                                    $take_away->update();
                                }

                                $field = 'take_away_id';
                                $value = $_POST['take_away_id'];

                                if(Yii::$app->session['eHhupx5UpkLZoXRP_cR1ozEVjY14zWOC0_user']->role != Yii::$app->params['user_role']['superadmin']) {
                                    $log = array(
                                        'action' => "Cash payment for take away order has been made for the amount of Rs. " . $grand_total,
                                        'type' => "billing"
                                    );
                                    Notify::auditLog($log);
                                }
                            }
                            elseif( $_POST['pick_up_id'] != null){
                                $pick_up = PickUp::find()->WHERE(['id' => $_POST['pick_up_id']])->one();
                                if($pick_up != null){
                                    if($pick_up->status == 0){
                                        $pick_up->status = 1;
                                    }else{
                                        $pick_up->status = 0;
                                    }
                                    $pick_up->update();
                                }

                                $field = 'pick_up_id';
                                $value = $_POST['pick_up_id'];

                                if(Yii::$app->session['eHhupx5UpkLZoXRP_cR1ozEVjY14zWOC0_user']->role != Yii::$app->params['user_role']['superadmin']) {
                                    $log = array(
                                        'action' => "Cash payment for pick up order has been made for the amount of Rs. " . $grand_total,
                                        'type' => "billing"
                                    );
                                    Notify::auditLog($log);
                                }
                            }
                            elseif( $_POST['delivery_id'] != null){
                                $delivery = Delivery::find()->WHERE(['id' => $_POST['delivery_id']])->one();
                                if($delivery != null){
                                    if($delivery->status == 0){
                                        $delivery->status = 1;
                                    }else{
                                        $delivery->status = 0;
                                    }
                                    $delivery->update();
                                }

                                $field = 'delivery_id';
                                $value = $_POST['delivery_id'];

                                if(Yii::$app->session['eHhupx5UpkLZoXRP_cR1ozEVjY14zWOC0_user']->role != Yii::$app->params['user_role']['superadmin']) {
                                    $log = array(
                                        'action' => "Cash payment for delivery order has been made for the amount of Rs. " . $grand_total,
                                        'type' => "billing"
                                    );
                                    Notify::auditLog($log);
                                }

                                if($_POST['delivery_charge_amount'] != null) {
                                    $delivery_charge_amount = ($_POST['delivery_charge_amount'] != null) ? $_POST['delivery_charge_amount'] : 0;
                                    
                                    $temp = explode("-",$order_inv);
                                    $delivery_inv = $temp[0] . '-' . ($temp[1] + 1);

                                    $delivery_charge                         = new Order();
                                    $delivery_charge->id                     = time()+1;
                                    $delivery_charge->invoice_no             = $delivery_inv;
                                    $delivery_charge->customer_name          = ($_POST['customer_name'] != null) ? htmlspecialchars(trim(ucwords($_POST['customer_name'])), ENT_QUOTES) : '';
                                    $delivery_charge->customer_pan           = ($_POST['customer_pan'] != null) ? htmlspecialchars(trim($_POST['customer_pan']), ENT_QUOTES) : '0';
                                    $delivery_charge->customer_address       = ($_POST['customer_address'] != null) ? htmlspecialchars(trim(ucwords($_POST['customer_address'])), ENT_QUOTES) : '';
                                    $delivery_charge->customer_pax           = ($_POST['customer_pax'] != null) ? htmlspecialchars(trim(ucwords($_POST['customer_pax'])), ENT_QUOTES) : '0';
                                    $delivery_charge->table_id               = ($_POST['table_id'] != null) ? $_POST['table_id'] : '0';
                                    $delivery_charge->floor_id               = ($_POST['floor_id'] != null) ? $_POST['floor_id'] : '0';
                                    $delivery_charge->sub_total              = $delivery_charge_amount;
                                    $delivery_charge->total                  = $delivery_charge_amount;
                                    $delivery_charge->type                   = Yii::$app->params['order_type']['delivery_charge'];
                                    $delivery_charge->delivery_charge_against_inv = $order_inv;
                                    $delivery_charge->payment_type           = $_POST['payment_type'];
                                    $delivery_charge->created_on             = date('Y-m-d H:i:s');
                                    $delivery_charge->created_by             = Yii::$app->session['eHhupx5UpkLZoXRP_cR1ozEVjY14zWOC0_user']->id;
                                    
                                    if( $delivery_charge->save() ) {
                                        $delivery_charge_id = $delivery_charge->id;

                                        $data = Query::queryOne("SELECT o.*, u.name as user_name 
                                                                    FROM `order` AS o
                                                                    LEFT JOIN `user` AS u
                                                                        ON u.id = o.created_by
                                                                    WHERE o.id = ".$delivery_charge_id);
                                        
                                        $printer = HPrinter::getPrinters("'bill'");
                                        $this->PrintDeliveryCharge($printer['bill'], $data);

                                        $max_inv_break_down = 1;
                                        $max_invoice_bd = Query::queryOne('SELECT MAX(invoice_no) as max FROM `break_down_receipt`'); 
                                        if ($max_invoice_bd['max'] != null) {
                                            $max_inv_break_down += $max_invoice_bd['max'];
                                        }

                                        $break_down                     = new BreakDownReceipt();
                                        $break_down->invoice_no         = $max_inv_break_down;
                                        $break_down->order_id           = $delivery_charge_id;
                                        $break_down->occupy_id          = 0;
                                        $break_down->retail_id          = 0;
                                        $break_down->take_away_id       = 0;
                                        $break_down->pick_up_id          = 0;
                                        $break_down->delivery_id        = 0;
                                        $break_down->customer_name      = ($_POST['customer_name'] != null) ? htmlspecialchars(trim(ucwords($_POST['customer_name'])), ENT_QUOTES) : '';
                                        $break_down->sub_total          = $delivery_charge_amount;
                                        $break_down->total              = $delivery_charge_amount;
                                        $break_down->received_amount    = $delivery_charge_amount;
                                        $break_down->payment_type       = Yii::$app->params['payment_type']['cash'];
                                        $break_down->type               = Yii::$app->params['break_down_payment_type']['delivery_charge_cash_receipt'];
                                        $break_down->created_on         = date('Y-m-d H:i:s');
                                        $break_down->created_by         = Yii::$app->session['eHhupx5UpkLZoXRP_cR1ozEVjY14zWOC0_user']->id;

                                        $break_down->save();

                                        if(Yii::$app->session['eHhupx5UpkLZoXRP_cR1ozEVjY14zWOC0_user']->role != Yii::$app->params['user_role']['superadmin']) {
                                            $log = array(
                                                'action' => "Cash payment for delivery charge has been made for the amount of Rs. " . $delivery_charge_amount ,
                                                'type' => "billing"
                                            );
                                            Notify::auditLog($log);
                                        }
                                    }
                                }
                            }

                            Query::executeSecure('DELETE FROM `temp_items` WHERE '.$field.' = :value',[':value'=>$value]);

                            Query::executeSecure('UPDATE `kot` SET `status` = CASE
                                                                    WHEN status = '.Yii::$app->params['kot_status']['show'].' THEN 
                                                                        '.Yii::$app->params['kot_status']['hide'].'
                                                                    ELSE '.Yii::$app->params['kot_status']['return'].'
                                                                    END ,
                                                kitchen_status = 1 , order_id = '. $order_id .' , '.$field.' = 0 WHERE '.$field.' = :value',[':value'=>$value]);

                            Query::executeSecure("UPDATE `break_down_receipt` SET order_id = ". $order_id ." , ".$field." = 0 WHERE ".$field." = :value",[':value'=>$value]);

                            echo json_encode(['total' => $grand_total, 
                                                'order_id'          => $order_id,
                                                'order_type'        => $order_type,
                                                'invoice'           => $max_inv, 
                                                'date'              => $order->created_on,
                                                'customer_name'     => $_POST['customer_name'],
                                                'customer_pan'      => $_POST['customer_pan'],
                                                'customer_address'  => (array_key_exists('customer_address', $_POST) && $_POST['customer_address'] != null) ? htmlspecialchars(trim($_POST['customer_address']), ENT_QUOTES) : '',
                                                'customer_pax'      => $_POST['customer_pax'],
                                                'operator_name'     => Yii::$app->session['eHhupx5UpkLZoXRP_cR1ozEVjY14zWOC0_user']->name,
                                                'delivery_charge_inv' => $delivery_inv,
                                                'delivery_charge_amount' => $delivery_charge_amount
                                            ]); die;    
                            
                        }
                    } 
                }

                Yii::$app->session['discount'] = false;
                Yii::$app->session['master-password'] = false;
                echo json_encode(FALSE); die;
            }else {
                echo json_encode(FALSE); die;
            }
        }
    }

    // Change Here
    public function actionToday() 
    {   
        $condition = '  o.is_cancel = 0';
        $settings = HSettings::getBasic("'name-in-bill', 'address-in-bill', 'phone-no-in-bill', 'pan-no-in-bill', 'thank-you-note-in-bill', 'service-charge-rate'");
                
        $service_charge_rate = ($settings['service-charge-rate'] != null && $settings['service-charge-rate-is-active'] != '0') ? $settings['service-charge-rate'] : 0;
        $service_charge_rate_is_active = ($settings['service-charge-rate-is-active'] != null) ? $settings['service-charge-rate-is-active'] : 0;
        if(isset($_GET['client']) && $_GET['client'] != ''){
            $client = Query::queryOne("SELECT * FROM customer WHERE slug = '".$_GET['client']."'");
            if($client){
                $condition .= " AND o.customer_phone = '".$client['phone']."'";

            }

        }
        $data = Query::queryAll("SELECT o.*, u.name as user_name 
                                FROM `order` AS o
                                LEFT JOIN `user` AS u
                                    ON u.id = o.created_by
                                WHERE DATE(o.created_on) = '".date('Y-m-d')."'
                                    AND 
                                $condition ORDER BY created_on DESC");

        $new_data = '';
        if($data != null) {
            foreach ($data as $row) {
                $id[] = $row['id'];
            }
            $ids = implode(',', $id);
            
            $break_down = Query::queryAll("SELECT order_id, total, payment_type FROM `break_down_receipt` WHERE order_id IN ($ids)");

            foreach ($data as $row) {
                $row['cash_total'] = 0;
                $row['card_total'] = 0;
                $row['credit_total'] = 0;
                if($break_down != null) {
                    foreach ($break_down as $bd) {
                        if($row['id'] == $bd['order_id']) {
                            if($bd['payment_type'] == Yii::$app->params['payment_type']['cash']) {
                                $row['cash_total'] += $bd['total'];
                            }
                            elseif($bd['payment_type'] == Yii::$app->params['payment_type']['credit']) {
                                $row['credit_total'] += $bd['total'];
                            }
                            elseif($bd['payment_type'] == Yii::$app->params['payment_type']['card']) {
                                $row['card_total'] += $bd['total'];
                            }
                        }
                    }
                }
                $new_data[] = $row;
            }
        }   
        $client=Query::queryAll("SELECT *  FROM `customer` where phone IN(SELECT customer_phone  FROM `order` where DATE(created_on) = '".date('Y-m-d')."' )");

        return $this->render('today', array('data'                          => $new_data ,
                                            'settings'                      => $settings ,
                                            'service_charge_rate'           => $service_charge_rate ,
                                            'service_charge_rate_is_active' => $service_charge_rate_is_active,
                                            'client'                        =>$client));
    }

    public function actionInvoice() 
    {   
        $id = isset($_POST['id']) ? $_POST['id'] : null;
        $data = ''; $order = '';
        if ($id != null) {
            $temp = Order::findOne($id);
            $temp->duplicate_bill_count = $temp->duplicate_bill_count + 1;
            if ($temp->update()) {
                if($temp){
                    $order = Query::queryOneSecure("SELECT o.*, u.name as user_name 
                                        FROM `order` AS o
                                        LEFT JOIN `user` AS u
                                            ON u.id = o.created_by
                                        WHERE o.id = :id",[':id'=>$id]);
                    if ($order) {
                        $items = Query::queryAllSecure("SELECT oi.*, m.price, m.name, m.is_discountable, si.name as special_item_name, si.price as special_item_price  
                                                FROM `order_items` as oi
                                                LEFT JOIN `menu_item` as m ON m.id = oi.item_id
                                                LEFT JOIN special_order_items as si ON si.id = oi.item_id
                                                WHERE oi.order_id = :id",[':id'=>$id]); 

                        $data['order'] = $order;
                        $data['items'] = $items;
                        $printer = HPrinter::getPrinters("'bill'");
                        $this->PrintDuplicateBill($printer['bill'], $data);

                        $duplicate = new DuplicateBill();
                        $duplicate->order_id   = $data['order']['id'];
                        $duplicate->is_printed = 1;
                        $duplicate->created_on = date('Y-m-d H:i:s');
                        $duplicate->created_by = Yii::$app->session['eHhupx5UpkLZoXRP_cR1ozEVjY14zWOC0_user']->id;
                        $duplicate->save();

                        echo json_encode(array( 'order' => $order, 'data'  => $items )); die;
                    }    
                }
            }
            
        }
        echo json_encode(false); die;
    }

    public function actionTempOrder() 
    {
        $latest = Misc::getLatestDate();
        if($latest != '' &&  date('Y-m-d') < $latest['latest_date'] ) { 
            echo json_encode(false); die;
        } else {
            if(Yii::$app->request->isAjax && isset($_POST) && $_POST['item'] != '' && $_POST['occupy_id'] != '') {
                $item_id = Query::queryOneSecure("SELECT id FROM `menu_item` WHERE `slug` = :slug",[':slug'=>htmlspecialchars(trim($_POST['item']), ENT_QUOTES) ]);
                $temp_item = TempItems::find()->WHERE(['item_id' => $item_id , 'occupy_id' => $_POST['occupy_id'] , 'type' => Yii::$app->params['item_type']['regular'] ])->one();
                if($temp_item != null){
                    $temp_item->quantity  = $temp_item->quantity + 1;
                    if($temp_item->update()){
                        echo json_encode(array('status'=> 'true' , 'temp_item_id' => $temp_item->id)); die;
                    }    
                }else{
                    $temp_item = new TempItems();
                    $temp_item->occupy_id = $_POST['occupy_id'];
                    $temp_item->item_id   = $item_id['id'];
                    $temp_item->quantity  = 1;
                    $temp_item->price     = htmlspecialchars(trim($_POST['price']), ENT_QUOTES);
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
            if(Yii::$app->request->isAjax && isset($_POST) && isset($_POST['item']) && $_POST['item'] != '' && isset($_POST['occupy_id']) && $_POST['occupy_id'] != '') {
                $item_id = Query::queryOneSecure("SELECT id FROM `menu_item` WHERE `slug` = :slug",[':slug'=>htmlspecialchars(trim($_POST['item']), ENT_QUOTES)]);
                $temp_order = TempItems::find()->WHERE([ 'item_id' => $item_id , 'occupy_id' => $_POST['occupy_id'], 'type' => Yii::$app->params['item_type']['regular'] ])->one();
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
        if( $latest != '' && date('Y-m-d') < $latest['latest_date'] ) { 
            echo json_encode(false); die;
        } else {
            if(Yii::$app->request->isAjax && isset($_POST) && isset($_POST['item']) && $_POST['item'] != '' && isset($_POST['occupy_id']) && $_POST['occupy_id'] != '') {
                $item = Query::queryOneSecure("SELECT id, price, name, is_discountable FROM `menu_item` WHERE `slug` = :slug",[':slug'=>htmlspecialchars(trim($_POST['item']), ENT_QUOTES) ]);

                $temp_order_list = TempOrderList::find()->WHERE([ 'item_id' => $item['id'] , 'occupy_id' => $_POST['occupy_id'] , 'type' => Yii::$app->params['item_type']['regular'] ])->one();
                if($temp_order_list != null){
                    $temp_order_list->quantity  = $temp_order_list->quantity + 1;
                    if($temp_order_list->update()){
                        echo json_encode(array('status'=> 'true' , 
                                            'temp_order_list_price' => $temp_order_list->price , 
                                            'temp_order_list_id' => $temp_order_list->id,
                                            'temp_order_list_name' => $item['name'],
                                            'temp_order_list_item_id' => $temp_order_list->item_id , 
                                            'temp_order_list_type' => $temp_order_list->type)); die;
                    }    
                }else{
                    $temp_order_list = new TempOrderList();
                    $temp_order_list->occupy_id = $_POST['occupy_id'];
                    $temp_order_list->item_id   = $item['id'];
                    $temp_order_list->quantity  = 1;
                    $temp_order_list->price     = $item['price'];
                    $temp_order_list->type      = Yii::$app->params['item_type']['regular'];
                    if($temp_order_list->save()) {
                        echo json_encode(array('status'=> 'true' , 
                                            'temp_order_list_price' => $temp_order_list->price , 
                                            'temp_order_list_id' => $temp_order_list->id,
                                            'temp_order_list_name' => $item['name'],
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
        if(Yii::$app->request->isAjax && isset($_POST) && $_POST['occupy_id'] != '') {

            foreach($_POST['item'] as $item):
                $batch[] = [$_POST['occupy_id'], $item['id'], $item['quantity'], $item['price'], Yii::$app->params['item_type']['special']];
            endforeach;

            Query::batchInsert('temp_order_list', array('occupy_id', 'item_id', 'quantity', 'price', 'type'), $batch);

            echo json_encode(true); die;
        }
        echo json_encode(false); die;
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
        if( $latest != '' && date('Y-m-d') < $latest['latest_date'] ) { 
            echo json_encode(false); die;
        } else {
            if(Yii::$app->request->isAjax && isset($_POST) && $_POST['temp_order_list_id'] != null) {

                Query::executeSecure("DELETE FROM temp_order_list WHERE id = :id",[':id'=>$_POST['temp_order_list_id']]);
                echo json_encode(true); die;
            }
            echo json_encode(false); die;
        }
    }

    public function actionDeleteTempOrderList() 
    {
        $latest = Misc::getLatestDate();
        if( $latest != '' && date('Y-m-d') < $latest['latest_date'] ) { 
            echo json_encode(false); die;
        } else {
            if(Yii::$app->request->isAjax && isset($_POST) && $_POST['occupy_id'] != null) {
                Query::executeSecure("DELETE FROM temp_order_list WHERE occupy_id = :occupy_id",[':occupy_id'=>$_POST['occupy_id']]);
                $kot_list = Kot::find()->WHERE(['id' => $_POST['kot_id']])
                                        ->with('kotItemRelation')
                                        ->with('kotItemRelation.item')
                                        ->with('kotItemRelation.specialItem')
                                        ->one();
                if($kot_list != null) {
                    $kot = [];                   
                    $kot['id'] = $kot_list['id'];
                    $kot['table_id'] = $kot_list['table_id'];
                    $kot['floor_id'] = $kot_list['floor_id'];
                    $kot['occupy_id'] = $kot_list['occupy_id'];
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
            }
            echo json_encode(false); die;
        }
    }
// Change Here Mangit
    public function actionUpdateOccupy() 
    {

        $latest = Misc::getLatestDate();
        
        if( $latest != '' && date('Y-m-d') < $latest['latest_date'] ) { 
            echo json_encode(false); die;
        } else {
            if(Yii::$app->request->isAjax && isset($_POST) && $_POST['occupy_id'] != null) {
                $occupy = Occupy::find()->WHERE(['id' => $_POST['occupy_id']])->one();
                $occupy->$_POST['field'] = $_POST['value'];
                if($occupy->update()){
                    if($_POST['field']=='customer_phone'){
                        if($occupy->customer_phone!=''){
                            $customer = Query::queryOne("SELECT * FROM customer WHERE phone = ".$occupy->customer_phone."");
                            if($customer){
                                echo json_encode(array('status' => 'true' ,'exists'=>'true', 'data' => $_POST['value'],'customer'=>$customer)); die;    
                            }else{
                                echo json_encode(array('status' => 'true','exists'=>'false' , 'data' => $_POST['value'])); die;    
        
                            }
                        }

                    }
                    echo json_encode(array('status' => 'true','exists'=>'false' , 'data' => $_POST['value'])); die;    

                }else{
                    echo json_encode(array('status' => 'true' ,'exists'=>'false', 'data' => $_POST['value'])); die;    

                }
            }
            echo json_encode(false); die;
        }
    }

    public function actionAdvancePayment()
    {   
        $latest = Misc::getLatestDate();
        if($latest != '' &&  date('Y-m-d') < $latest['latest_date'] ) { 
            echo json_encode(false); die;
        } else {
            if (Yii::$app->request->isAjax && isset($_POST)) {
                
                $max_inv = 1;
                $max_invoice = Query::queryOne('SELECT MAX(invoice_no) as max FROM `break_down_receipt`'); 
                if ($max_invoice['max'] != null) {
                    $max_inv += $max_invoice['max'];
                }

                $break_down                     = new BreakDownReceipt();
                $break_down->invoice_no         = $max_inv;
                $break_down->order_id           = 0;
                $break_down->occupy_id          = ($_POST['occupy_id'] != null) ? $_POST['occupy_id'] : 0;
                $break_down->retail_id          = ($_POST['retail_id'] != null) ? $_POST['retail_id'] : 0;
                $break_down->take_away_id       = ($_POST['take_away_id'] != null) ? $_POST['take_away_id'] : 0;
                $break_down->pick_up_id         = ($_POST['pick_up_id'] != null) ? $_POST['pick_up_id'] : 0;
                $break_down->delivery_id        = ($_POST['delivery_id'] != null) ? $_POST['delivery_id'] : 0;
                $break_down->customer_name      = ($_POST['customer_name'] != null) ? htmlspecialchars(trim(ucwords($_POST['customer_name'])), ENT_QUOTES) : '';
                $break_down->total              = ($_POST['advance_paid'] != null) ? $_POST['advance_paid'] : 0;
                $break_down->received_amount    = ($_POST['received_amount'] != null) ? $_POST['received_amount'] : $_POST['advance_paid'];
                $break_down->change_amount      = ($_POST['change_amount'] != null) ?$_POST['change_amount'] : 0;
                $break_down->payment_type       = ($_POST['payment_type'] != null) ? $_POST['payment_type'] : 0;
                $break_down->type               = Yii::$app->params['break_down_payment_type']['advance'];
                $break_down->created_on         = date('Y-m-d H:i:s');
                $break_down->created_by         = Yii::$app->session['eHhupx5UpkLZoXRP_cR1ozEVjY14zWOC0_user']->id;

                if($break_down->save()){
                    if( $_POST['occupy_id'] != null){
                        HOccupy::setOccupied($_POST['occupy_id']);
                    }

                    $break_down_id = $break_down->id;
                    if(Yii::$app->session['eHhupx5UpkLZoXRP_cR1ozEVjY14zWOC0_user']->role != Yii::$app->params['user_role']['superadmin']) {
                        $log = array(
                            'action' => "Advance payment has been made for the amount of Rs. " . $_POST['advance_paid'],
                            'type' => "billing"
                        );
                        Notify::auditLog($log);
                    }

                    $data = Query::queryOneSecure("SELECT bd.*, u.name as user_name 
                                                FROM `break_down_receipt` as bd 
                                                LEFT JOIN `user` AS u ON u.id = bd.created_by
                                                WHERE bd.id = :id",[':id'=>$break_down_id]);
                    $printer = HPrinter::getPrinters("'bill'");
                    $this->PrintReceipt($printer['bill'], $data);

                    echo json_encode(['status'              => true, 
                                        'receipt_no'        => $max_inv, 
                                        'total_amount'      => $_POST['advance_paid'],
                                        'received_amount'   => $_POST['received_amount'],
                                        'change_amount'     => $_POST['change_amount'],
                                        'date'              => $break_down->created_on]);die;
                }
            }
            echo json_encode(FALSE);die;
        }
    }

    public function actionItemWisePayment() 
    {
        $latest = Misc::getLatestDate();
        if( $latest != '' && date('Y-m-d') < $latest['latest_date'] ) { 
            echo json_encode(false); die;
        } else {
            if (Yii::$app->request->isAjax && isset($_POST) && $_POST['items'] != '' && $_POST['total'] != 0) {
                
                if($_POST['tip_amount'] != 0){
                    HTips::addTips($_POST['tip_amount']);
                }

                $max_inv = 1;
                $max_invoice = Query::queryOne('SELECT MAX(invoice_no) as max FROM `break_down_receipt`'); 
                if ($max_invoice['max'] != null) {
                    $max_inv += $max_invoice['max'];
                }

                $items = $_POST['items']; 

                if ($items != null) {
                    $sub_total = 0;
                    foreach($items as $item):
                        $qty = $item['quantity'];
                        $price = $item['price'];
                        $sub_total += $qty * $price;
                    endforeach;

                    $user = User::findOne(Yii::$app->session['eHhupx5UpkLZoXRP_cR1ozEVjY14zWOC0_user']->id);

                    $total = $sub_total;

                    /*codes if discount is calculated before service charge*/
                    $discount_rate = 0;
                    $discount_amount = 0;

                    if (Yii::$app->session['discount'] == true && isset($_POST['discount']) && $_POST['discount'] != '' && $_POST['discount'] > 0) {
                        
                        $upto = (Yii::$app->session['master-password'] == true) ? 100 : $user->discount_upto;
                        
                        if ($_POST['discount'] <= $upto) {
                            $discount_rate = $_POST['discount'];
                            $discount_amount = Misc::round_up(( $discount_rate / 100 ) * $total, 2);
                            $total = $total - $discount_amount;
                        } 
                    }

                    if( $_POST['occupy_id'] != null){
                        $settings = HSettings::getBasic("'service-charge-rate'");
                        $service_charge_rate = ($settings['service-charge-rate'] != null) ? $settings['service-charge-rate'] : 0;
                        $service_charge_amount = 0;
                        if($settings['service-charge-rate-is-active'] != 0){
                            $service_charge_amount = ( $service_charge_rate * $total ) / 100; 
                            $total = $total + $service_charge_amount;
                        }
                    }
                    elseif( $_POST['retail_id'] != null){
                        $settings = HSettings::getBasic("'retail-service-charge-rate'");
                        $service_charge_rate = ($settings['retail-service-charge-rate'] != null) ? $settings['retail-service-charge-rate'] : 0;
                        $service_charge_amount = 0;
                        if($settings['retail-service-charge-rate-is-active'] != 0){
                            $service_charge_amount = ( $service_charge_rate * $total ) / 100; 
                            $total = $total + $service_charge_amount;
                        }
                    }
                    elseif( $_POST['take_away_id'] != null){
                        $settings = HSettings::getBasic("'take-away-service-charge-rate'");
                        $service_charge_rate = ($settings['take-away-service-charge-rate'] != null) ? $settings['take-away-service-charge-rate'] : 0;
                        $service_charge_amount = 0;
                        if($settings['take-away-service-charge-rate-is-active'] != 0){
                            $service_charge_amount = ( $service_charge_rate * $total ) / 100; 
                            $total = $total + $service_charge_amount;
                        }
                    }
                    elseif( $_POST['pick_up_id'] != null){
                        $settings = HSettings::getBasic("'pick-up-service-charge-rate'");
                        $service_charge_rate = ($settings['pick-up-service-charge-rate'] != null) ? $settings['pick-up-service-charge-rate'] : 0;
                        $service_charge_amount = 0;
                        if($settings['pick-up-service-charge-rate-is-active'] != 0){
                            $service_charge_amount = ( $service_charge_rate * $total ) / 100; 
                            $total = $total + $service_charge_amount;
                        }
                    }
                    elseif( $_POST['delivery_id'] != null){
                        $settings = HSettings::getBasic("'delivery-service-charge-rate'");
                        $service_charge_rate = ($settings['delivery-service-charge-rate'] != null) ? $settings['delivery-service-charge-rate'] : 0;
                        $service_charge_amount = 0;
                        if($settings['delivery-service-charge-rate-is-active'] != 0){
                            $service_charge_amount = ( $service_charge_rate * $total ) / 100; 
                            $total = $total + $service_charge_amount;
                        }
                    }  

                    /*codes if discount is calculated before service charge*/
                   
                    $temp_total     = Misc::round_up($total, 2);
                    $grand_total    = round($temp_total);
                    $round_value    = round(($grand_total - $temp_total) , 2);

                    $break_down                         = new BreakDownReceipt();
                    $break_down->invoice_no             = $max_inv;
                    $break_down->order_id               = 0;
                    $break_down->occupy_id              = ($_POST['occupy_id'] != null) ? $_POST['occupy_id'] : 0;
                    $break_down->retail_id              = ($_POST['retail_id'] != null) ? $_POST['retail_id'] : 0;
                    $break_down->take_away_id           = ($_POST['take_away_id'] != null) ? $_POST['take_away_id'] : 0;
                    $break_down->pick_up_id             = ($_POST['pick_up_id'] != null) ? $_POST['pick_up_id'] : 0;
                    $break_down->delivery_id            = ($_POST['delivery_id'] != null) ? $_POST['delivery_id'] : 0;
                    $break_down->customer_name          = ($_POST['customer_name'] != null) ? htmlspecialchars(trim(ucwords($_POST['customer_name'])), ENT_QUOTES) : '';
                    $break_down->sub_total              = $sub_total;
                    $break_down->service_charge_rate    = $service_charge_rate;
                    $break_down->service_charge_amount  = $service_charge_amount;
                    $break_down->discount_rate          = ($_POST['discount'] != null) ? $_POST['discount'] : 0;
                    $break_down->discount_amount        = ($_POST['discount_amount'] != null) ? $_POST['discount_amount'] : 0;
                    $break_down->total                  = $grand_total;
                    $break_down->round_value            = $round_value;
                    $break_down->received_amount        = ($_POST['received_amount'] != null) ? $_POST['received_amount'] : $grand_total;
                    $break_down->change_amount          = ($_POST['change_amount'] != null) ?$_POST['change_amount'] : 0;
                    $break_down->payment_type           = ($_POST['payment_type'] != null) ?$_POST['payment_type'] : 0;
                    $break_down->type                   = Yii::$app->params['break_down_payment_type']['item_wise'];
                    $break_down->created_on             = date('Y-m-d H:i:s');
                    $break_down->created_by             = Yii::$app->session['eHhupx5UpkLZoXRP_cR1ozEVjY14zWOC0_user']->id;

                    if($break_down->save()) {
                        if( $_POST['occupy_id'] != null){
                            HOccupy::setOccupied($_POST['occupy_id']);
                        }

                        $break_down_receipt_id = $break_down->id;
                        foreach($items as $item):
                            if($item['quantity'] > 0) {
                                $batch[] = [$break_down->id, $item['item_id'], $item['quantity'], $item['price'], $item['type']];
                           }
                        endforeach;

                        Query::batchInsert('break_down_items', array('break_down_receipt_id', 'item_id', 'quantity', 'price', 'type'), $batch);

                        Yii::$app->session['discount'] = false;
                        Yii::$app->session['master-password'] = false;

                        if($_POST['occupy_id'] != ''){
                            $field = 'occupy_id';
                            $value = $_POST['occupy_id'];
                        }
                        elseif($_POST['retail_id'] != ''){
                            $field = 'retail_id';
                            $value = $_POST['retail_id'];
                        }
                        elseif($_POST['take_away_id'] != ''){
                            $field = 'take_away_id';
                            $value = $_POST['take_away_id'];
                        }
                        elseif($_POST['pick_up_id'] != ''){
                            $field = 'pick_up_id';
                            $value = $_POST['pick_up_id'];
                        }
                        elseif($_POST['delivery_id'] != ''){
                            $field = 'delivery_id';
                            $value = $_POST['delivery_id'];
                        }

                        $break_down_amount = Query::queryOneSecure('SELECT sum(total) as total, sum(discount_amount) as total_discount FROM `break_down_receipt` WHERE ' . $field .' = :value',[':value'=>$value]);

                        $break_down_detail    = Query::queryAllSecure('SELECT bd.*, d.name as debtor_name 
                                                        FROM `break_down_receipt` as bd
                                                        LEFT JOIN debtors as d ON d.id = bd.debtor_id
                                                        WHERE bd.'.$field.' = :value
                                                        ORDER BY invoice_no',[':value'=>$value]);

                        if(Yii::$app->session['eHhupx5UpkLZoXRP_cR1ozEVjY14zWOC0_user']->role != Yii::$app->params['user_role']['superadmin']) {
                            $log = array(
                                'action' => "Item wise payment has been made for the amount of Rs. " . $grand_total,
                                'type' => "billing"
                            );
                            Notify::auditLog($log);
                        }

                        $data = Query::queryOneSecure("SELECT bd.*, u.name as user_name 
                                                FROM `break_down_receipt` as bd 
                                                LEFT JOIN `user` AS u ON u.id = bd.created_by
                                                WHERE bd.id = :id",[':id'=>$break_down_receipt_id]);
                        $printer = HPrinter::getPrinters("'bill'");
                        $this->PrintReceipt($printer['bill'], $data);

                        echo json_encode(['total'               => $grand_total, 
                                            'receipt_no'        => $max_inv, 
                                            'total_amount'      => $_POST['total'],
                                            'received_amount'   => $_POST['received_amount'],
                                            'change_amount'     => $_POST['change_amount'],
                                            'break_down'        => $break_down_detail,
                                            'break_down_amount' => $break_down_amount,
                                            'date'              => $break_down->created_on]); die; 
                    }
                }
            }
            echo json_encode(false); die;
        }
    }

    public function actionViewPartialPaymentDetail() 
    {   
        if (Yii::$app->request->isAjax && isset($_POST)) {

            if( $_POST['occupy_id'] != null){
                $field = 'occupy_id';
                $value = $_POST['occupy_id'];
            }
            elseif( $_POST['retail_id'] != null){
                $field = 'retail_id';
                $value = $_POST['retail_id'];
            }
            elseif( $_POST['take_away_id'] != null){
                $field = 'take_away_id';
                $value = $_POST['take_away_id'];
            }
            elseif( $_POST['pick_up_id'] != null){
                $field = 'pick_up_id';
                $value = $_POST['pick_up_id'];
            }
            elseif( $_POST['delivery_id'] != null){
                $field = 'delivery_id';
                $value = $_POST['delivery_id'];
            }

            $break_down = Query::queryAllSecure('SELECT bd.*, d.name as debtor_name 
                                                    FROM `break_down_receipt` as bd
                                                    LEFT JOIN debtors as d ON d.id = bd.debtor_id
                                                    WHERE bd.'.$field.' = :value
                                                    ORDER BY invoice_no',[':value'=>$value]);

            echo json_encode(array('status'         => true,
                                    'break_down'    => $break_down)); die;
        }
        echo json_encode(false); die;
    }

    public function actionGetOrderItem() 
    {
        if (Yii::$app->request->isAjax) {
           
            if (isset($_POST)) {

                if( $_POST['occupy_id'] != null){
                    $field = 'occupy_id';
                    $value = $_POST['occupy_id'];
                }
                elseif( $_POST['retail_id'] != null){
                    $field = 'retail_id';
                    $value = $_POST['retail_id'];
                }
                elseif( $_POST['take_away_id'] != null){
                    $field = 'take_away_id';
                    $value = $_POST['take_away_id'];
                }
                elseif( $_POST['pick_up_id'] != null){
                    $field = 'pick_up_id';
                    $value = $_POST['pick_up_id'];
                }
                elseif( $_POST['delivery_id'] != null){
                    $field = 'delivery_id';
                    $value = $_POST['delivery_id'];
                }

                $order_items        = Query::queryAllSecure("SELECT t.*, m.id as item_id, m.slug , m.price, m.name , m.is_discountable, si.id as special_item_id, si.name as special_item_name, si.price as special_item_price
                                                FROM temp_items as t
                                                LEFT JOIN menu_item as m ON m.id = t.item_id
                                                LEFT JOIN special_order_items as si ON si.id = t.item_id
                                                WHERE t.".$field." = :value",[':value'=>$value]);


                $break_down_items   = Query::queryAllSecure("SELECT bi.item_id, bi.type, sum(bi.quantity) as quantity 
                                                        FROM `break_down_receipt` as br
                                                        LEFT JOIN `break_down_items` as bi ON br.id = bi.break_down_receipt_id
                                                        WHERE br." . $field . " = :value
                                                        GROUP BY bi.item_id, bi.type",[':value'=>$value]);
                $quantity =[];
                foreach ($order_items as $o_item) :
                    
                    foreach ($break_down_items as $b_item) :
                        if ($o_item['type'] == $b_item['type'] && $o_item['item_id'] == $b_item['item_id']) :
                            
                            $quantity[$b_item['type']][$o_item['item_id']] = $o_item['quantity'] - $b_item['quantity']; 
                        endif;
                    endforeach;

                endforeach;
                
                if ($order_items) {
                    echo json_encode(array('status' => true , 'items' => $order_items, 'quantity' => $quantity)); die;
                }
            }
        }
        echo json_encode(false); die;
    }

    public function actionAddTips() 
    {
        $latest = Misc::getLatestDate();
        if( $latest != '' && date('Y-m-d') < $latest['latest_date'] ) { 
            echo json_encode(false); die;
        } else {
            if(Yii::$app->request->isAjax && isset($_POST) && $_POST['tip_amount'] != null) {
                if( HTips::addTips($_POST['tip_amount']) ) {

                    if(Yii::$app->session['eHhupx5UpkLZoXRP_cR1ozEVjY14zWOC0_user']->role != Yii::$app->params['user_role']['superadmin']) {
                        $log = array(
                            'action' => "Tip amount of Rs. " . $_POST['tip_amount'] . ' has been added' ,
                            'type' => "billing"
                        );
                        Notify::auditLog($log);
                    }
                    
                    echo json_encode(true); die;
                }
            }
            echo json_encode(false); die;
        }
    }

    public function actionCheckFocPassword()
    {
        if (Yii::$app->request->isAjax) {
            $settings = HSettings::getBasic("'foc-password'");

            $foc_password = ($settings['foc-password'] != null) ? $settings['foc-password'] : '';

            if ( $foc_password != null && $foc_password == $_POST['password'] ) {
                echo json_encode(TRUE); die;
            } else {
               echo json_encode(FALSE); die;
            }
        }
        echo json_encode(FALSE); die;
    }

    public function actionCreateFoc() 
    {
        $latest = Misc::getLatestDate();
        if( $latest != '' && date('Y-m-d') < $latest['latest_date'] ) { 
            echo json_encode(false); die;
        } else {
            if(Yii::$app->request->isAjax && isset($_POST) && $_POST['occupy_id'] != null) {

                $break_down = BreakDownReceipt::find()->WHERE(['occupy_id' => $_POST['occupy_id']])->one();
                if($break_down == null) {
                    $occupy = Occupy::findOne($_POST['occupy_id']);
                    if($occupy) {
                        $occupy->is_foc = Yii::$app->params['is_foc']['yes'];
                        if($occupy->update()) {
                            echo json_encode(true); die;
                        }
                    }
                }
            }
            echo json_encode(false); die;
        }
    }

    public function actionCancelFoc() 
    {
        $latest = Misc::getLatestDate();
        if( $latest != '' && date('Y-m-d') < $latest['latest_date'] ) { 
            echo json_encode(false); die;
        } else {
            if(Yii::$app->request->isAjax && isset($_POST) && $_POST['occupy_id'] != null) {
                $occupy = Occupy::findOne($_POST['occupy_id']);
                if($occupy) {
                    $occupy->is_foc = Yii::$app->params['is_foc']['no'];
                    if($occupy->update()) {
                        echo json_encode(true); die;
                    }
                }
            }
            echo json_encode(false); die;
        }
    }

    public function actionSaveFoc() 
    {
        $latest = Misc::getLatestDate();
        if( $latest != '' && date('Y-m-d') < $latest['latest_date'] ) { 
            echo json_encode(false); die;
        } else {
            if(Yii::$app->request->isAjax && isset($_POST) && $_POST['occupy_id'] != null) {
                $max_foc = 1;
                $max_foc_no = Query::queryOne('SELECT MAX(foc_no) as max FROM `foc`'); 
                if ($max_foc_no['max'] != null) {
                    $max_foc += $max_foc_no['max'];
                }
                if(array_key_exists('items', $_POST)) {
                    $items = $_POST['items']; 
                
                    if ($items != null) {
                        $sub_total = 0;
                        foreach($items as $item):
                            $qty = $item['quantity'];
                            $price = $item['price'];

                            $sub_total += $qty * $price;
                        endforeach;
                        
                        $foc                          = new Foc();
                        $foc->foc_no                  = $max_foc;
                        $foc->customer_name           = ($_POST['customer_name'] != null) ? htmlspecialchars(trim(ucwords($_POST['customer_name'])), ENT_QUOTES) : 'FOC Customer';
                        $foc->customer_pan            = ($_POST['customer_pan'] != null) ? htmlspecialchars(trim($_POST['customer_pan']), ENT_QUOTES) : '0';
                        $foc->customer_address        = ($_POST['customer_address'] != null) ? htmlspecialchars(trim($_POST['customer_address']), ENT_QUOTES) : '';
                        $foc->customer_pax            = ($_POST['customer_pax'] != null) ? htmlspecialchars(trim($_POST['customer_pax']), ENT_QUOTES) : '0';
                        $foc->table_id                = ($_POST['table_id'] != null) ? $_POST['table_id'] : 0;
                        $foc->floor_id                = ($_POST['floor_id'] != null) ? $_POST['floor_id'] : 0;
                        $foc->created_on              = date('Y-m-d H:i:s');
                        $foc->created_by              = Yii::$app->session['eHhupx5UpkLZoXRP_cR1ozEVjY14zWOC0_user']->id;
                        
                        if ($foc->save()) {
                            $foc_id = $foc->id;
                            $stock_item = [];
                            foreach($items as $item):
                                $batch[] = [$foc_id, $item['item_id'], $item['quantity'], $item['price'], $item['type']];
                                if($item['type'] == Yii::$app->params['item_type']['regular']) {
                                    $stock_item[$item['item_id']] = $item['quantity'];
                                }
                            endforeach;

                            Query::batchInsert('foc_items', array('foc_id', 'item_id', 'quantity', 'price', 'type'), $batch);
                            if($stock_item != null) {
                                HStock::addStockOut($stock_item);
                            }

                            Yii::$app->session['discount'] = false;
                            Yii::$app->session['master-password'] = false;

                            if( $_POST['occupy_id'] != null){
                                $occupy_id = $_POST['occupy_id'];
                                $occupy = Occupy::find()->WHERE(['id' => $occupy_id])->one();
                                if($occupy != null){
                                    if($occupy->status == 0){
                                        $occupy->status = 1;
                                        $occupy->is_foc = Yii::$app->params['is_foc']['no'];
                                    }else{
                                        $occupy->status = 0;
                                        $occupy->is_foc = Yii::$app->params['is_foc']['no'];
                                    }
                                    $occupy->update();
                                }

                                if(Yii::$app->session['eHhupx5UpkLZoXRP_cR1ozEVjY14zWOC0_user']->role != Yii::$app->params['user_role']['superadmin']) {
                                    $log = array(
                                        'action' => "FOC has been made",
                                        'type' => "billing"
                                    );
                                    Notify::auditLog($log);
                                }

                                Query::executeSecure('DELETE FROM `temp_items` WHERE occupy_id = :id',[':id'=>$occupy_id]);

                                Query::executeSecure('UPDATE `kot` SET  `status` = CASE
                                                                            WHEN status = '.Yii::$app->params['kot_status']['show'].' THEN 
                                                                                '.Yii::$app->params['kot_status']['hide'].'
                                                                            ELSE '.Yii::$app->params['kot_status']['return'].'
                                                                            END,
                                                    foc_id = '. $foc_id .' , occupy_id = 0 WHERE occupy_id = :id',[':id'=>$occupy_id]);

                                echo json_encode(true); die; 
                            }   
                        }
                    }
                }
            }
            echo json_encode(false); die;
        }
    }

    public function actionCancelOrder() 
    {
        $latest = Misc::getLatestDate();
        if( $latest != '' && date('Y-m-d') < $latest['latest_date'] ) { 
            echo json_encode(false); die;
        } else {
            if(Yii::$app->request->isAjax && isset($_POST) && $_POST['order_id'] != null) {
                $order = Order::findOne($_POST['order_id']);
                if($order) {
                    $order->is_cancel = 1;
                    $order->is_active = 1;
                    if($order->update()) {
                        $max_inv = 1;
                        $max_invoice = Query::queryOne('SELECT MAX(cancel_no) as max FROM `order`'); 
                        if ($max_invoice['max'] != null) {
                            $max_inv += $max_invoice['max'];
                        }

                        $cancel_order = new Order();
                        $cancel_order->id                   = time();
                        $cancel_order->cancel_no            = $max_inv;
                        $cancel_order->customer_name        = $order->customer_name;
                        $cancel_order->customer_pan         = $order->customer_pan;
                        $cancel_order->customer_address     = $order->customer_address;
                        $cancel_order->customer_pax         = $order->customer_pax;
                        $cancel_order->table_id             = $order->table_id;
                        $cancel_order->floor_id             = $order->floor_id;
                        $cancel_order->sub_total            = $order->sub_total;
                        $cancel_order->service_charge_rate  = $order->service_charge_rate;
                        $cancel_order->service_charge_amount= $order->service_charge_amount;
                        $cancel_order->discount_rate        = $order->discount_rate;
                        $cancel_order->discount_amount      = $order->discount_amount;
                        $cancel_order->total                = $order->total;
                        $cancel_order->round_value          = $order->round_value;
                        $cancel_order->payable_total        = $order->payable_total;
                        $cancel_order->received_amount      = $order->received_amount;
                        $cancel_order->change_amount        = $order->change_amount;
                        $cancel_order->payment_type         = $order->payment_type;
                        $cancel_order->created_on           = date('Y-m-d H:i:s');
                        $cancel_order->created_by           = Yii::$app->session['eHhupx5UpkLZoXRP_cR1ozEVjY14zWOC0_user']->id;
                        $cancel_order->type                 = $order->type;
                        $cancel_order->is_cancel            = 1;
                        $cancel_order->cancel_against_inv   = $order->invoice_no;
                        $cancel_order->cancelled_reason     = ($_POST['reason'] != null) ? htmlspecialchars(trim($_POST['reason']), ENT_QUOTES) : '';
                        if ($cancel_order->save()) {

                            $data   = [];
                            $cancel_data1 = Query::queryOneSecure("SELECT o.*, u.name as user_name 
                                                        FROM `order` AS o
                                                        LEFT JOIN `user` AS u
                                                            ON u.id = o.created_by
                                                        WHERE o.id = :id",[':id'=>$cancel_order->id]);

                            $cancel_data2 = Query::queryAllSecure("SELECT oi.*, m.price, m.name, m.is_discountable, si.name as special_item_name, si.price as special_item_price  
                                                        FROM `order_items` as oi
                                                        LEFT JOIN `menu_item` as m ON m.id = oi.item_id
                                                        LEFT JOIN special_order_items as si ON si.id = oi.item_id
                                                        WHERE oi.order_id = :id",[':id'=>$_POST['order_id']]); 

                            $data['order'] = $cancel_data1;
                            $data['items'] = $cancel_data2;
                            $printer = HPrinter::getPrinters("'bill'");
                            $this->PrintCancelBill($printer['bill'], $data);

                            if(Yii::$app->session['eHhupx5UpkLZoXRP_cR1ozEVjY14zWOC0_user']->role != Yii::$app->params['user_role']['superadmin']) {
                                $log = array(
                                    'action' => "Sales has been returned for the invoice number - " . $order->invoice_no,
                                    'type' => "billing"
                                );
                                Notify::auditLog($log);
                            }
                            echo json_encode(array( 'order' => $cancel_data1, 'data'  => $cancel_data2 )); die;
                        }
                    }
                }
            }
            echo json_encode(false); die;
        }
    }

    public function actionSplitBill()
    {
        if(isset($_GET) && $_GET['occid'] != null ) {
            $occupy_id = (int) $_GET['occid'];
            $occupy = Query::queryOneSecure("SELECT * FROM occupy WHERE id = :id",[':id'=>$occupy_id]);

            if($occupy != null) {

                $settings = HSettings::getBasic("'name-in-bill', 'address-in-bill', 'phone-no-in-bill', 'pan-no-in-bill', 'thank-you-note-in-bill', 'service-charge-rate'");
                
                $service_charge_rate = ($settings['service-charge-rate'] != null && $settings['service-charge-rate-is-active'] != '0') ? $settings['service-charge-rate'] : 0;
                $service_charge_rate_is_active = ($settings['service-charge-rate-is-active'] != null) ? $settings['service-charge-rate-is-active'] : 0;

                $user = User::findOne(Yii::$app->session['eHhupx5UpkLZoXRP_cR1ozEVjY14zWOC0_user']->id);

                $max_inv = 1;
                $max_invoice = Query::queryOne('SELECT MAX(invoice_no) as max FROM `order`'); 
                if ($max_invoice['max'] != null) {
                    $max_inv += $max_invoice['max'];
                }

                $order_items        = Query::queryAllSecure("SELECT t.*, m.id as item_id, m.slug , m.price, m.name , m.is_discountable, si.id as special_item_id, si.name as special_item_name, si.price as special_item_price
                                                FROM temp_items as t
                                                LEFT JOIN menu_item as m ON m.id = t.item_id
                                                LEFT JOIN special_order_items as si ON si.id = t.item_id
                                                WHERE t.occupy_id = :id",[':id'=>$_GET['occid']]);

                return $this->render('split-bill', 
                    array(
                            'max_inv'                       => $max_inv,
                            'settings'                      => $settings,
                            'user_name'                     => $user->name,
                            'occupy'                        => $occupy,
                            'order_items'                   => $order_items,
                            'service_charge_rate'           => $service_charge_rate,
                            'service_charge_rate_is_active' => $service_charge_rate_is_active
                        ));  

            }
        }
        else {
            throw new HttpException(404, 'Page not found.'); die;
        }
    }

    public function actionGetData()
    {
        if(Yii::$app->request->isAjax ) {

            $user = User::findOne(Yii::$app->session['eHhupx5UpkLZoXRP_cR1ozEVjY14zWOC0_user']->id);
            $settings                       = '';
            $service_charge_rate            = '';
            $service_charge_rate_is_active  = '';

            if( isset($_POST) && $_POST['occupy_id'] != null ) {
                $settings = HSettings::getBasic("'name-in-bill', 'address-in-bill', 'phone-no-in-bill', 'pan-no-in-bill', 'thank-you-note-in-bill', 'service-charge-rate'");
                
                $service_charge_rate = ($settings['service-charge-rate'] != null && $settings['service-charge-rate-is-active'] != '0') ? $settings['service-charge-rate'] : 0;
                $service_charge_rate_is_active = ($settings['service-charge-rate-is-active'] != null) ? $settings['service-charge-rate-is-active'] : 0; 
            }
            elseif( isset($_POST) && $_POST['retail_id'] != null ) {
                $settings = HSettings::getBasic("'name-in-bill', 'address-in-bill', 'phone-no-in-bill', 'pan-no-in-bill', 'thank-you-note-in-bill' , 'retail-service-charge-rate'");
                
                $service_charge_rate = ($settings['retail-service-charge-rate'] != null && $settings['retail-service-charge-rate-is-active'] != '0') ? $settings['retail-service-charge-rate'] : 0;
                $service_charge_rate_is_active = ($settings['retail-service-charge-rate-is-active'] != null) ? $settings['retail-service-charge-rate-is-active'] : 0;
            }
            elseif( isset($_POST) && $_POST['take_away_id'] != null ) {
                $settings = HSettings::getBasic("'name-in-bill', 'address-in-bill', 'phone-no-in-bill', 'pan-no-in-bill', 'thank-you-note-in-bill' , 'take-away-service-charge-rate'");
                
                $service_charge_rate = ($settings['take-away-service-charge-rate'] != null && $settings['take-away-service-charge-rate-is-active'] != '0') ? $settings['take-away-service-charge-rate'] : 0;
                $service_charge_rate_is_active = ($settings['take-away-service-charge-rate-is-active'] != null) ? $settings['take-away-service-charge-rate-is-active'] : 0;
            }
            elseif( isset($_POST) && $_POST['pick_up_id'] != null ) {
                $settings = HSettings::getBasic("'name-in-bill', 'address-in-bill', 'phone-no-in-bill', 'pan-no-in-bill', 'thank-you-note-in-bill' , 'pick-up-service-charge-rate'");
                
                $service_charge_rate = ($settings['pick-up-service-charge-rate'] != null && $settings['pick-up-service-charge-rate-is-active'] != '0') ? $settings['pick-up-service-charge-rate'] : 0;
                $service_charge_rate_is_active = ($settings['pick-up-service-charge-rate-is-active'] != null) ? $settings['pick-up-service-charge-rate-is-active'] : 0;
            }
            
            echo json_encode(array('status'                         => true, 
                                    'settings'                      => $settings,
                                    'user_name'                     => $user->name,
                                    'service_charge_rate'           => $service_charge_rate,
                                    'service_charge_rate_is_active' => $service_charge_rate_is_active)); 
            die;
        }

        echo json_encode(false); die;
    }
// Change Here Mangit
    public function actionMakeMultiple() 
    {  
        $latest = Misc::getLatestDate();
        if( $latest != '' && date('Y-m-d') < $latest['latest_date'] ) { 
            echo json_encode(false); die;
        } else {
            if (Yii::$app->request->isAjax && isset($_POST)) {
                $grand_total = 0;
                $i=0;
                foreach($_POST['data'] as $data) {
                    if(isset($data['items']) && $data['items'] != '') {
                        if($data['tip_amount'] != 0){
                            HTips::addTips($data['tip_amount']);
                        }

                        $temp = explode(":",Yii::$app->session['fiscal_year']);
                        $starting_fiscal_year_from_date = $temp[0];
                        $starting_fiscal_year_to_date   = $temp[1];

                        $inv_start = date('y',strtotime($starting_fiscal_year_to_date ));

                        $max_inv = $inv_start.'-1';

                        $max_invoice = Query::queryOne("SELECT MAX(CAST(SUBSTRING(invoice_no, 4, length(invoice_no)-3) AS UNSIGNED)) as max FROM `order` WHERE DATE(created_on) >= '".$starting_fiscal_year_from_date."' AND DATE(created_on) <= '".$starting_fiscal_year_to_date."'"); 
                        
                        if ($max_invoice['max'] != null) {
                            $max_inv = $inv_start. '-' . ((string) ($max_invoice['max'] + 1));
                        }


                        $items      = $data['items']; 
                        
                        if ($items != null) {
                            $sub_total = 0;
                            $discountable_sub_total = 0;
                            foreach($items as $item):
                                $qty    = $item['quantity'];
                                $price  = $item['price'];

                                if(isset($item['discountable']) && $item['discountable'] == Yii::$app->params['is_discountable']['yes']) {
                                    $discountable_sub_total += $qty * $price;
                                }
                                $sub_total += $qty * $price;
                            endforeach;

                            $user = User::findOne(Yii::$app->session['eHhupx5UpkLZoXRP_cR1ozEVjY14zWOC0_user']->id);

                            $total = $sub_total;

                            /*codes if discount is calculated before service charge*/
                            $discount_rate = 0;
                            $discount_amount = 0;
                            if (Yii::$app->session['discount'] == true && isset($_POST['discount']) && $_POST['discount'] != '' && $_POST['discount'] > 0) {
                            
                                $upto = (Yii::$app->session['master-password'] == true) ? 100 : $user->discount_upto;
                                
                                if ($_POST['discount'] <= $upto) {
                                    $discount_rate = $_POST['discount'];
                                    $discount_amount = Misc::round_up(( $discount_rate / 100 ) * $discountable_sub_total, 2);
                                    $total = $sub_total - $discount_amount;
                                } 
                            }

                            if( $_POST['occupy_id'] != null){
                                $settings = HSettings::getBasic("'service-charge-rate'");
                                $service_charge_rate = ($settings['service-charge-rate'] != null) ? $settings['service-charge-rate'] : 0;
                                $service_charge_amount = 0;
                                if($settings['service-charge-rate-is-active'] != 0){
                                    $service_charge_amount = ( $service_charge_rate * $total ) / 100; 
                                    $total = $total + $service_charge_amount;
                                }
                            }
                            elseif( $_POST['retail_id'] != null){
                                $settings = HSettings::getBasic("'retail-service-charge-rate'");
                                $service_charge_rate = ($settings['retail-service-charge-rate'] != null) ? $settings['retail-service-charge-rate'] : 0;
                                $service_charge_amount = 0;
                                if($settings['retail-service-charge-rate-is-active'] != 0){
                                    $service_charge_amount = ( $service_charge_rate * $total ) / 100; 
                                    $total = $total + $service_charge_amount;
                                }
                            }
                            elseif( $_POST['take_away_id'] != null){
                                $settings = HSettings::getBasic("'take-away-service-charge-rate'");
                                $service_charge_rate = ($settings['take-away-service-charge-rate'] != null) ? $settings['take-away-service-charge-rate'] : 0;
                                $service_charge_amount = 0;
                                if($settings['take-away-service-charge-rate-is-active'] != 0){
                                    $service_charge_amount = ( $service_charge_rate * $total ) / 100; 
                                    $total = $total + $service_charge_amount;
                                }
                            }
                            elseif( $_POST['pick_up_id'] != null){
                                $settings = HSettings::getBasic("'pick-up-service-charge-rate'");
                                $service_charge_rate = ($settings['pick-up-service-charge-rate'] != null) ? $settings['pick-up-service-charge-rate'] : 0;
                                $service_charge_amount = 0;
                                if($settings['pick-up-service-charge-rate-is-active'] != 0){
                                    $service_charge_amount = ( $service_charge_rate * $total ) / 100; 
                                    $total = $total + $service_charge_amount;
                                }
                            }
                            /*codes if discount is calculated before service charge*/

                            $temp_total     = Misc::round_up($total, 2);
                            $grand_total    = round($temp_total);
                            $round_value    = round(($grand_total - $temp_total) , 2);
                            
                            $order                          = new Order();
                            $order->id                      = time()+$i++;
                            $order->invoice_no              = $max_inv;
                            $order->occupy_id               = ($_POST['occupy_id'] != null) ? $_POST['occupy_id'] : 0;
                            
                            $order->customer_phone          = ($data['customer_phone'] != null) ? $data['customer_phone'] : '';
                            
                            $order->customer_name           = ($data['customer_name'] != null) ? htmlspecialchars(trim(ucwords($data['customer_name'])), ENT_QUOTES) : 'Cash Customer';
                            $order->customer_pan            = ($data['customer_pan'] != null) ? htmlspecialchars(trim($data['customer_pan']), ENT_QUOTES) : '0';
                            $order->customer_address        =(array_key_exists('customer_address', $data) && $data['customer_address'] != null) ? htmlspecialchars(trim($data['customer_address']), ENT_QUOTES) : '';
                            // $order->customer_address        = ($data['customer_address'] != null) ? htmlspecialchars(trim($data['customer_address']), ENT_QUOTES) : '';
                            $order->table_id                = ($_POST['table_id'] != null) ? $_POST['table_id'] : 0;
                            $order->floor_id                = ($_POST['floor_id'] != null) ? $_POST['floor_id'] : 0;
                            $order->sub_total               = $sub_total;
                            $order->service_charge_rate     = $service_charge_rate;
                            $order->service_charge_amount   = $service_charge_amount;
                            $order->discount_rate           = $discount_rate;
                            $order->discount_amount         = $discount_amount;
                            $order->total                   = $grand_total;
                            $order->round_value             = $round_value;
                            $order->payable_total           = $grand_total;
                            $order->received_amount         = ($data['received_amount'] != null) ? $data['received_amount'] : $grand_total;
                            $order->change_amount           = ($data['change_amount'] != null) ? $data['change_amount'] : 0;
                            $order->payment_type            = ($data['payment_type'] != null) ? $data['payment_type'] : 0;
                            $order->created_on              = date('Y-m-d H:i:s');
                            $order->created_by              = Yii::$app->session['eHhupx5UpkLZoXRP_cR1ozEVjY14zWOC0_user']->id;

                            if( $_POST['occupy_id'] != null ) {
                                $order_type = 'occupy';
                                $order->type  = Yii::$app->params['order_type']['table_order'];
                            }
                            elseif( $_POST['retail_id'] != null ) {
                                $order_type = 'retail';
                                $order->type  = Yii::$app->params['order_type']['retail'];
                            }
                            elseif( $_POST['take_away_id'] != null ) {
                                $order_type = 'take_away';
                                $order->type  = Yii::$app->params['order_type']['take_away'];
                            }
                            elseif( $_POST['pick_up_id'] != null ) {
                                $order_type = 'pick_up';
                                $order->type  = Yii::$app->params['order_type']['pick_up'];
                            }

                            if ($order->save()) {
                                //Create Customer by mangit
                                $is_customer=Query::queryOne("SELECT * FROM customer WHERE phone = '".$order->customer_phone."'");
                                if(!$is_customer){
                                    $customer= new Customer();
                                    if($order->customer_name!=''){
                                        $customer->name =$order->customer_name;
                                    }else{
                                        $customer->name ='Cash Customer';
                                    }
                                    $customer->phone =$order->customer_phone;
                                    $customer->save();
    
                                }else{
                                    $customer= Customer::findOne($is_customer['id']);
                                    if($order->customer_name!=''){
                                        $customer->name= $order->customer_name;
                                        $customer->update();
                                    }
    
                                }
                                //Create Customer By mangit
                                $order_id       = $order->id;
                                $order_inv[]    = $order->invoice_no;

                                if($data['payment_type'] == Yii::$app->params['payment_type']['cash'])
                                {
                                    $max_receipt_inv = 1;
                                    $max_receipt_invoice = Query::queryOne('SELECT MAX(invoice_no) as max FROM `break_down_receipt`'); 
                                    if ($max_receipt_invoice['max'] != null) {
                                        $max_receipt_inv += $max_receipt_invoice['max'];
                                    }

                                    $break_down                     = new BreakDownReceipt();
                                    $break_down->invoice_no         = $max_receipt_inv;
                                    $break_down->order_id           = $order->id;
                                    $break_down->customer_name      = $order->customer_name;
                                    $break_down->sub_total             = $order->sub_total;
                                    $break_down->service_charge_rate   = $order->service_charge_rate;
                                    $break_down->service_charge_amount = $order->service_charge_amount;
                                    $break_down->discount_rate         = $order->discount_rate;
                                    $break_down->discount_amount       = $order->discount_amount;
                                    $break_down->total                 = $order->total;
                                    $break_down->received_amount       = $order->received_amount;
                                    $break_down->change_amount         = $order->change_amount;
                                    $break_down->payment_type          = $order->payment_type;
                                    $break_down->type               = Yii::$app->params['break_down_payment_type']['cash_receipt'];
                                    $break_down->created_on         = date('Y-m-d H:i:s');
                                    $break_down->created_by         = Yii::$app->session['eHhupx5UpkLZoXRP_cR1ozEVjY14zWOC0_user']->id;
                                    $break_down->save();
                                }
                                
                                $batch      = [];
                                $stock_item   = [];
                                foreach($items as $item):
                                    $batch[] = [$order->id, $item['item_id'], $item['quantity'], $item['price'], $item['type']];

                                    if($item['type'] == Yii::$app->params['item_type']['regular']) {
                                        $stock_item[$item['item_id']] = $item['quantity'];
                                    }
                                endforeach;

                                Query::batchInsert('order_items', array('order_id', 'item_id', 'quantity', 'price', 'type'), $batch);

                                HStock::addStockOut($stock_item);

                                $data   = [];
                                $data1 = Query::queryOneSecure("SELECT o.*, u.name as user_name 
                                                            FROM `order` AS o
                                                            LEFT JOIN `user` AS u
                                                                ON u.id = o.created_by
                                                            WHERE o.id = :id",[':id'=>$order_id]);
                                $data2 = Query::queryAllSecure("SELECT oi.*, m.price, m.name, m.is_discountable, si.name as special_item_name, si.price as special_item_price  
                                                    FROM `order_items` as oi
                                                    LEFT JOIN `menu_item` as m ON m.id = oi.item_id
                                                    LEFT JOIN special_order_items as si ON si.id = oi.item_id
                                                    WHERE oi.order_id = :id",[':id'=>$order_id]); 

                                $data['order'] = $data1;
                                $data['items'] = $data2;
                                $printer = HPrinter::getPrinters("'bill'");
                                $this->PrintBill($printer['bill'], $data, $order_type);
                            }
                        } 
                    }
                }

                if( $_POST['occupy_id'] != null){
                    if( $_POST['occupy_id'] != null){
                        HOccupy::setOccupied($_POST['occupy_id']);
                    }
                    
                    $occupy = Occupy::find()->WHERE(['id' => $_POST['occupy_id']])->one();
                    if($occupy != null){
                        $occupy->status = 0;
                        $occupy->end_time = date('Y-m-d H:i:s');
                        if ($occupy->update()) {
                            $table = TableDetails::findOne($_POST['table_id']);
                            if ($table != null) {
                                $table->status = 0;
                                if ($table->update()) {
                                    if(Yii::$app->session['eHhupx5UpkLZoXRP_cR1ozEVjY14zWOC0_user']->role != Yii::$app->params['user_role']['superadmin']) {
                                        $log = array(
                                            'action' => "Table '<b>" . $table->table_name . "</b>' has been closed ",
                                            'type' => "table"
                                        );
                                        Notify::auditLog($log);
                                    }
                                    Sync::set_table_data($table->id, 'close');
                                }
                            }
                        }
                    }

                    $field = 'occupy_id';
                    $value = $_POST['occupy_id'];

                    if(Yii::$app->session['eHhupx5UpkLZoXRP_cR1ozEVjY14zWOC0_user']->role != Yii::$app->params['user_role']['superadmin']) {
                        $log = array(
                            'action' => "Cash payment for table order has been made for the amount of Rs. " . $grand_total,
                            'type' => "billing"
                        );
                        Notify::auditLog($log);
                    }
                }
                elseif( $_POST['retail_id'] != null){
                    $retail = Retail::find()->WHERE(['id' => $_POST['retail_id']])->one();
                    if($retail != null){
                        if($retail->status == 0){
                            $retail->status = 1;
                        }else{
                            $retail->status = 0;
                        }
                        $retail->update();
                    }
                    $field = 'retail_id';
                    $value = $_POST['retail_id'];
                    if(Yii::$app->session['eHhupx5UpkLZoXRP_cR1ozEVjY14zWOC0_user']->role != Yii::$app->params['user_role']['superadmin']) {
                        $log = array(
                            'action' => "Cash payment for retail order has been made for the amount of Rs. " . $grand_total,
                            'type' => "billing"
                        );
                        Notify::auditLog($log);
                    }
                }
                elseif( $_POST['take_away_id'] != null){
                    $take_away = TakeAway::find()->WHERE(['id' => $_POST['take_away_id']])->one();
                    if($take_away != null){
                        if($take_away->status == 0){
                            $take_away->status = 1;
                        }else{
                            $take_away->status = 0;
                        }
                        $take_away->update();
                    }
                    $field = 'take_away_id';
                    $value = $_POST['take_away_id'];
                    if(Yii::$app->session['eHhupx5UpkLZoXRP_cR1ozEVjY14zWOC0_user']->role != Yii::$app->params['user_role']['superadmin']) {
                        $log = array(
                            'action' => "Cash payment for take away order has been made for the amount of Rs. " . $grand_total,
                            'type' => "billing"
                        );
                        Notify::auditLog($log);
                    }
                }
                elseif( $_POST['pick_up_id'] != null){
                    $pick_up = PickUp::find()->WHERE(['id' => $_POST['pick_up_id']])->one();
                    if($pick_up != null){
                        if($pick_up->status == 0){
                            $pick_up->status = 1;
                        }else{
                            $pick_up->status = 0;
                        }
                        $pick_up->update();
                    }
                    $field = 'pick_up_id';
                    $value = $_POST['pick_up_id'];
                    if(Yii::$app->session['eHhupx5UpkLZoXRP_cR1ozEVjY14zWOC0_user']->role != Yii::$app->params['user_role']['superadmin']) {
                        $log = array(
                            'action' => "Cash payment for pick up order has been made for the amount of Rs. " . $grand_total,
                            'type' => "billing"
                        );
                        Notify::auditLog($log);
                    }
                }

                Query::executeSecure('DELETE FROM `temp_items` WHERE '.$field.' = :value',[':value'=>$value]);

                Query::executeSecure('UPDATE `kot` SET kitchen_status = 1 , `status` = CASE
                                                                            WHEN status = '.Yii::$app->params['kot_status']['show'].' THEN 
                                                                                '.Yii::$app->params['kot_status']['hide'].'
                                                                            ELSE '.Yii::$app->params['kot_status']['return'].'
                                                                            END ,
                                    order_id = '. $order_id .' , '.$field.' = 0 WHERE '.$field.' = :value',[':value'=>$value]);
                
                Query::executeSecure("UPDATE `break_down_receipt` SET order_id = ". $order_id ." , ".$field." = 0 WHERE ".$field." = :value",[':value'=>$value]);

                echo json_encode(['status' => true,
                                'operator_name' => Yii::$app->session['eHhupx5UpkLZoXRP_cR1ozEVjY14zWOC0_user']->name,
                                'invoice' => $order_inv
                            ]); die;
            }

            Yii::$app->session['discount'] = false;
            Yii::$app->session['master-password'] = false;
            echo json_encode(FALSE); die;
        }
    } 

    public function actionPrintTemporaryBill() 
    {   
        $latest = Misc::getLatestDate();
        if($latest != '' &&  date('Y-m-d') < $latest['latest_date'] ) { 
            echo json_encode(false); die;
        } else {
            if (Yii::$app->request->isAjax && isset($_POST) && isset($_POST['items']) && $_POST['items'] != '') {

                $printer = HPrinter::getPrinters("'bill'");
                
                if($printer != null) {
                    $handle = printer_open($printer['bill']);
                    if(!$handle || $handle == NULL)
                    {
                        echo json_encode(false); die;
                    }
                    else
                    {
                        $items = $_POST['items']; 
                        if ($items != null) {
                            $table_name = '';
                            if(isset($_POST['table_id']) && $_POST['table_id'] != null) {
                                $table = Query::queryOne("SELECT table_name FROM `table_details` WHERE id = " . $_POST['table_id']);
                                if($table != null) {
                                    $table_name = $table['table_name'];
                                }
                            }

                            $sub_total = 0;
                            foreach($items as $item):
                                $qty = $item['quantity'];
                                $price = $item['price'];

                                $sub_total += $qty * $price;
                            endforeach;

                            $user = User::findOne(Yii::$app->session['eHhupx5UpkLZoXRP_cR1ozEVjY14zWOC0_user']->id);

                            $total = $sub_total;

                            $discount_rate = 0;
                            $discount_amount = 0;
                            if($_POST['total_discount_amount'] == 0){
                                if (Yii::$app->session['discount'] == true && isset($_POST['discount']) && $_POST['discount'] != '' && $_POST['discount'] > 0) {
                                
                                    $upto = (Yii::$app->session['master-password'] == true) ? 100 : $user->discount_upto;
                                    
                                    if ($_POST['discount'] <= $upto) {
                                        $discount_rate = $_POST['discount'];
                                        $discount_amount = Misc::round_up(( $discount_rate / 100 ) * $total, 2);
                                        $total = $total - $discount_amount;
                                    } 
                                }
                            }else {
                                $discount_amount    = $_POST['total_discount_amount'];
                                $discount_rate      = Misc::round_up(( $discount_amount / $total ) * 100, 2);
                                $total = $total - $discount_amount;
                            }

                            if($_POST['customer_pax'] != null) {
                                $new_customer_pax = $_POST['customer_pax'];
                            }elseif (array_key_exists('new_customer_pax', $_POST)) {
                                $new_customer_pax = $_POST['new_customer_pax'];
                            }else{
                                $new_customer_pax = 0;
                            }

                            if( $_POST['occupy_id'] != null){
                                $settings = HSettings::getBasic("'service-charge-rate'");
                                $service_charge_rate = ($settings['service-charge-rate'] != null) ? $settings['service-charge-rate'] : 0;
                                $service_charge_amount = 0;
                                if($settings['service-charge-rate-is-active'] != 0){
                                    $service_charge_amount = ( $service_charge_rate * $total ) / 100; 
                                    $total = $total + $service_charge_amount;
                                }

                                $occupy = Occupy::find()->WHERE(['id' => $_POST['occupy_id']])->one();
                                $occupy->customer_pax = $new_customer_pax;
                                $occupy->update();
                            }
                            elseif( $_POST['retail_id'] != null){
                                $settings = HSettings::getBasic("'retail-service-charge-rate'");
                                $service_charge_rate = ($settings['retail-service-charge-rate'] != null) ? $settings['retail-service-charge-rate'] : 0;
                                $service_charge_amount = 0;
                                if($settings['retail-service-charge-rate-is-active'] != 0){
                                    $service_charge_amount = ( $service_charge_rate * $total ) / 100; 
                                    $total = $total + $service_charge_amount;
                                }
                            }
                            elseif( $_POST['take_away_id'] != null){
                                $settings = HSettings::getBasic("'take-away-service-charge-rate'");
                                $service_charge_rate = ($settings['take-away-service-charge-rate'] != null) ? $settings['take-away-service-charge-rate'] : 0;
                                $service_charge_amount = 0;
                                if($settings['take-away-service-charge-rate-is-active'] != 0){
                                    $service_charge_amount = ( $service_charge_rate * $total ) / 100; 
                                    $total = $total + $service_charge_amount;
                                }
                            }
                            elseif( $_POST['pick_up_id'] != null){
                                $settings = HSettings::getBasic("'pick-up-service-charge-rate'");
                                $service_charge_rate = ($settings['pick-up-service-charge-rate'] != null) ? $settings['pick-up-service-charge-rate'] : 0;
                                $service_charge_amount = 0;
                                if($settings['pick-up-service-charge-rate-is-active'] != 0){
                                    $service_charge_amount = ( $service_charge_rate * $total ) / 100; 
                                    $total = $total + $service_charge_amount;
                                }
                            }
                            elseif( $_POST['delivery_id'] != null){
                                $settings = HSettings::getBasic("'delivery-service-charge-rate'");
                                $service_charge_rate = ($settings['delivery-service-charge-rate'] != null) ? $settings['delivery-service-charge-rate'] : 0;
                                $service_charge_amount = 0;
                                if($settings['delivery-service-charge-rate-is-active'] != 0){
                                    $service_charge_amount = ( $service_charge_rate * $total ) / 100; 
                                    $total = $total + $service_charge_amount;
                                }
                            }  

                            $temp_total     = Misc::round_up($total, 2);
                            $grand_total    = round($temp_total);
                            $round_value    = round(($grand_total - $temp_total) , 2);

                            printer_start_doc($handle, "Temorary Bill Print");
                            printer_start_page($handle);

                            $font = printer_create_font("Arial", 17, 8, PRINTER_FW_THIN, false, false, false, 0);
                            printer_select_font($handle, $font);

                            $x = 10;
                            printer_draw_text($handle, "DATE", 7, $x);
                            printer_draw_text($handle, ":", 80, $x);
                            printer_draw_text($handle, date('Y-m-d H:i:s'), 90, $x);
                            $x=$x+20;
                            printer_draw_text($handle, "NAME", 7, $x);
                            printer_draw_text($handle, ":", 80, $x);
                            printer_draw_text($handle, ($_POST['customer_name'] != null) ? $_POST['customer_name'] : 'CASH CUSTOMER', 90, $x);
                            $x=$x+20;
                            printer_draw_text($handle, "TABLE", 7, $x);
                            printer_draw_text($handle, ":", 80, $x);
                            printer_draw_text($handle, $table_name , 90, $x);
                            $x=$x+20;

                            printer_draw_text($handle, "- - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -", 7, $x); 
                            $x=$x+20;

                            printer_draw_text($handle, "SN.", 7, $x);
                            printer_draw_text($handle, "PARTICULARS", 45, $x);
                            printer_draw_text($handle, "QTY.", 250, $x);
                            printer_draw_text($handle, "Rate", 290, $x);
                            printer_draw_text($handle, "Amount", 330, $x);
                            $x=$x+20;
                            printer_draw_text($handle, "- - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -", 100, $x);
                            $x=$x+20;

                            $i=0;
                            foreach($items as $item) :
                                $i++;
                                printer_draw_text($handle, $i, 7, $x);

                                if(strlen($item['item']) > 26) {
                                    printer_draw_text($handle, substr($item['item'],0,26), 45, $x);
                                }else {
                                    printer_draw_text($handle, $item['item'], 26, $x);
                                }

                                printer_draw_text($handle, $item['quantity'], 250, $x);
                                printer_draw_text($handle, $item['price'], 290, $x);
                                printer_draw_text($handle, $item['quantity']*$item['price'], 330, $x);
                                $x=$x+20;
                            endforeach;

                            $sub_total          = $sub_total;
                            $discount_amount    = $discount_amount;
                            $gross_amount       = $sub_total - $discount_amount;
                            $service_charge     = $service_charge_amount;
                            $net_amount         = $gross_amount + $service_charge_amount;
                            $round_value        = $round_value;
                            $net_total_amount   = $total;

                            printer_draw_text($handle, "- - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -", 7, $x);
                            $x=$x+20;

                            printer_draw_text($handle, "Sub Total", 7, $x);
                            printer_draw_text($handle, ":", 250, $x);
                            printer_draw_text($handle, "Rs. ".$sub_total, 260, $x);
                            $x=$x+20;

                            printer_draw_text($handle, "Discount    ".$_POST['discount']." %", 7, $x);
                            printer_draw_text($handle, ":", 250, $x);
                            printer_draw_text($handle, "Rs. ".$discount_amount, 260, $x);
                            $x=$x+20;

                            printer_draw_text($handle, "Service Charge  ".$service_charge_rate."%", 7, $x);
                            printer_draw_text($handle, ":", 250, $x);
                            printer_draw_text($handle, "Rs. ".$service_charge, 260, $x);
                            $x=$x+20;

                            printer_draw_text($handle, "Total Amount", 7, $x);
                            printer_draw_text($handle, ":", 250, $x);
                            printer_draw_text($handle, "Rs. ".$net_amount, 260, $x);
                            $x=$x+20;

                            printer_draw_text($handle, "- - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -", 7, $x);
                            $x=$x+20;

                            $amount_in_word = "Rupees ".Misc::convertNumberToWords($net_total_amount). " Only";
                            if(strlen($amount_in_word) > 48) {
                                printer_draw_text($handle, substr($amount_in_word,0,48), 7, $x);
                                $x=$x+20; 
                                printer_draw_text($handle, substr($amount_in_word,48,48), 7, $x);
                                $x=$x+20; 
                            }else {
                                printer_draw_text($handle, $amount_in_word , 7, $x);  
                                $x=$x+20; 
                            }
                            
                            printer_draw_text($handle, "- - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -", 7, $x);
                            $x=$x+20;
            
                            printer_delete_font($font);

                            printer_end_page($handle);
                            printer_end_doc($handle);
                            printer_close($handle);

                            echo json_encode(true); die;
                        }
                    }
                }
            }
            echo json_encode(FALSE); die;
        }
    } 

    public static function PrintBill($printer, $data, $order_type) 
    {
        return true;
        die;
        if($printer != null && $data != null) {
            $handle = printer_open($printer);
            if(!$handle || $handle == NULL)
            {
                return false;
            }
            else
            {
                $settings = HSettings::getBasic("'name-in-bill', 'address-in-bill', 'phone-no-in-bill', 'pan-no-in-bill', 'thank-you-note-in-bill'");

                printer_start_doc($handle, "Truffle Bill Print");
                printer_start_page($handle);

                $font = printer_create_font("Arial", 17, 8, PRINTER_FW_THIN, false, false, false, 0);
                printer_select_font($handle, $font);

                $x = 10;
                printer_draw_text($handle, $settings['name-in-bill'], 100, $x);
                $x=$x+20;
                printer_draw_text($handle, $settings['address-in-bill'], 100, $x);
                $x=$x+20;
                printer_draw_text($handle, "Phone  :".$settings['phone-no-in-bill'], 100, $x);
                $x=$x+20;
                printer_draw_text($handle, "Pan no : ".$settings['pan-no-in-bill'], 100, $x);
                $x=$x+30;

                printer_draw_text($handle, "INVOICE", 150, $x);
                $x=$x+30;

                $from_date  = (date('m-d') < "07-16") ? (date('Y')-1) : date('Y');
                $to_date    = (date('m-d') > "07-15") ? (date('Y')+1) : date('Y');

                printer_draw_text($handle, "BILL NO", 7, $x);
                printer_draw_text($handle, ":", 170, $x);
                printer_draw_text($handle, $data['order']['invoice_no'], 180, $x);
                $x=$x+20;
                printer_draw_text($handle, "DATE", 7, $x);
                printer_draw_text($handle, ":", 170, $x);
                printer_draw_text($handle, date('Y-m-d H:i:s'), 180, $x);
                $x=$x+20;
                printer_draw_text($handle, "Customer Name", 7, $x);
                printer_draw_text($handle, ":", 170, $x);
                printer_draw_text($handle, $data['order']['customer_name'], 180, $x);
                $x=$x+20;

                printer_draw_text($handle, "Customer Address", 7, $x);
                printer_draw_text($handle, ":", 170, $x);
                printer_draw_text($handle, $data['order']['customer_address'], 180, $x);
                $x=$x+20;

                printer_draw_text($handle, "Customer Pan No", 7, $x);
                printer_draw_text($handle, ":", 170, $x);
                printer_draw_text($handle, ($data['order']['customer_pan'] != 0) ? $data['order']['customer_pan'] : '', 180, $x);
                $x=$x+20;

                printer_draw_text($handle, "- - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -", 7, $x); 
                $x=$x+20;
                printer_draw_text($handle, "SN.", 7, $x);
                printer_draw_text($handle, "PARTICULARS", 45, $x);
                printer_draw_text($handle, "QTY.", 250, $x);
                printer_draw_text($handle, "Rate", 290, $x);
                printer_draw_text($handle, "Amount", 330, $x);
                $x=$x+20;
                printer_draw_text($handle, "- - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -", 100, $x);
                $x=$x+20;

                $i=0;
                foreach($data['items'] as $item) :
                    $i++;
                    printer_draw_text($handle, $i, 7, $x);

                    if($item['type'] == Yii::$app->params['item_type']['regular']) {
                        $item_name  = $item['name'];
                        $item_price = $item['price'];
                    }else{
                        $item_name  = 'Special-Item('.$item['special_item_name'].')';
                        $item_price = $item['special_item_price'];
                    }

                    if(strlen($item_name) > 26) {
                        printer_draw_text($handle, substr($item_name,0,26), 45, $x);
                    }else {
                        printer_draw_text($handle, $item_name, 26, $x);
                    }

                    printer_draw_text($handle, $item['quantity'], 250, $x);
                    printer_draw_text($handle, $item_price, 290, $x);
                    printer_draw_text($handle, $item['quantity']*$item_price, 330, $x);
                    $x=$x+20;
                endforeach;

                $sub_total          = $data['order']['sub_total'];
                $discount_amount    = $data['order']['discount_amount'];
                $gross_amount       = $data['order']['sub_total'] - $data['order']['discount_amount'];
                $service_charge     = $data['order']['service_charge_amount'];
                $net_amount         = $gross_amount + $service_charge;
                $round_value        = $data['order']['round_value'];
                $net_total_amount   = $data['order']['total'];
                $paid_amount        = $data['order']['received_amount'];
                $change_amount      = $data['order']['change_amount'];

                printer_draw_text($handle, "- - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -", 7, $x);
                $x=$x+20;

                printer_draw_text($handle, "Sub Total", 7, $x);
                printer_draw_text($handle, ":", 250, $x);
                printer_draw_text($handle, "Rs. ".$sub_total, 260, $x);
                $x=$x+20;

                printer_draw_text($handle, "Discount    ".$data['order']['discount_rate']." %", 7, $x);
                printer_draw_text($handle, ":", 250, $x);
                printer_draw_text($handle, "Rs. ".$discount_amount, 260, $x);
                $x=$x+20;

                printer_draw_text($handle, "Gross Amount", 7, $x);
                printer_draw_text($handle, ":", 250, $x);
                printer_draw_text($handle, "Rs. ".$gross_amount, 260, $x);
                $x=$x+20;

                printer_draw_text($handle, "Service Charge  ".$data['order']['service_charge_rate']."%", 7, $x);
                printer_draw_text($handle, ":", 250, $x);
                printer_draw_text($handle, "Rs. ".$service_charge, 260, $x);
                $x=$x+20;

                printer_draw_text($handle, "Net Amount", 7, $x);
                printer_draw_text($handle, ":", 250, $x);
                printer_draw_text($handle, "Rs. ".$net_amount, 260, $x);
                $x=$x+20;

                printer_draw_text($handle, "Round Amount", 7, $x);
                printer_draw_text($handle, ":", 250, $x);
                printer_draw_text($handle, "Rs. ".$round_value, 260, $x);
                $x=$x+20;

                printer_draw_text($handle, "Net Total Amount", 7, $x);
                printer_draw_text($handle, ":", 250, $x);
                printer_draw_text($handle, "Rs. ".$net_total_amount, 260, $x);
                $x=$x+20;

                printer_draw_text($handle, "Paid Amount", 7, $x);
                printer_draw_text($handle, ":", 250, $x);
                printer_draw_text($handle, "Rs. ".$paid_amount, 260, $x);
                $x=$x+20;

                printer_draw_text($handle, "Change Amount", 7, $x);
                printer_draw_text($handle, ":", 250, $x);
                printer_draw_text($handle, "Rs. ".$change_amount, 260, $x);
                $x=$x+20;

                printer_draw_text($handle, "- - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -", 7, $x);
                $x=$x+20;

                $amount_in_word = "Rupees ".Misc::convertNumberToWords($net_total_amount). " Only";
                if(strlen($amount_in_word) > 46) {
                    printer_draw_text($handle, substr($amount_in_word,0,46), 7, $x);
                    $x=$x+20; 
                    printer_draw_text($handle, substr($amount_in_word,46,46), 7, $x);
                    $x=$x+20; 
                }else {
                    printer_draw_text($handle, $amount_in_word , 7, $x);  
                    $x=$x+20; 
                }
                
                printer_draw_text($handle, "- - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -", 7, $x);
                $x=$x+20;

                if(strlen($settings['thank-you-note-in-bill']) > 46) {
                    printer_draw_text($handle, substr($settings['thank-you-note-in-bill'],0,46), 7, $x);
                    $x=$x+20; 
                    printer_draw_text($handle, substr($settings['thank-you-note-in-bill'],46,46), 7, $x);
                    $x=$x+20; 
                }else {
                    printer_draw_text($handle, $settings['thank-you-note-in-bill'] , 7, $x);  
                    $x=$x+20; 
                }

                printer_draw_text($handle, "- - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -", 7, $x);
                $x=$x+20;

                printer_draw_text($handle, "Printed BY   : ".$data['order']['user_name'], 7, $x); 
                $x=$x+20;

                printer_draw_text($handle, "Date & Time : ".date('Y-m-d H:i:s'), 7, $x);  
                $x=$x+20;

                printer_delete_font($font);

                printer_end_page($handle);
                printer_end_doc($handle);
                printer_close($handle);

                return true;
            }
        }
        else{
            return false;
        }
    }

    public static function PrintDuplicateBill($printer, $data) 
    {
        return true;
        die;
        if($printer != null && $data != null) {
            $handle = printer_open($printer);
            if(!$handle || $handle == NULL)
            {
                return false;
            }
            else
            {

                $settings = HSettings::getBasic("'name-in-bill', 'address-in-bill', 'phone-no-in-bill', 'pan-no-in-bill', 'thank-you-note-in-bill'");

                printer_start_doc($handle, "Truffle Bill Print");
                printer_start_page($handle);

                $font = printer_create_font("Arial", 17, 8, PRINTER_FW_THIN, false, false, false, 0);
                printer_select_font($handle, $font);

                $x = 10;
                
                printer_draw_text($handle, $settings['name-in-bill'], 100, $x);
                $x=$x+20;
                printer_draw_text($handle, $settings['address-in-bill'], 100, $x);
                $x=$x+20;
                printer_draw_text($handle, "Phone  :".$settings['phone-no-in-bill'], 100, $x);
                $x=$x+20;
                printer_draw_text($handle, "Pan no : ".$settings['pan-no-in-bill'], 100, $x);
                $x=$x+30;

                printer_draw_text($handle, "Copy of Invoice ".$data['order']['duplicate_bill_count'], 30, $x);
                $x=$x+30;

                $from_date  = (date('m-d') < "07-16") ? (date('Y')-1) : date('Y');
                $to_date    = (date('m-d') > "07-15") ? (date('Y')+1) : date('Y');

                printer_draw_text($handle, "BILL NO", 7, $x);
                printer_draw_text($handle, ":", 170, $x);
                printer_draw_text($handle, $data['order']['invoice_no'], 180, $x);
                $x=$x+20;

                printer_draw_text($handle, "DATE", 7, $x);
                printer_draw_text($handle, ":", 170, $x);
                printer_draw_text($handle, date('Y-m-d H:i:s'), 180, $x);
                $x=$x+20;

                printer_draw_text($handle, "Customer Name", 7, $x);
                printer_draw_text($handle, ":", 170, $x);
                printer_draw_text($handle, $data['order']['customer_name'], 180, $x);
                $x=$x+20;

                printer_draw_text($handle, "Customer Address", 7, $x);
                printer_draw_text($handle, ":", 170, $x);
                printer_draw_text($handle, $data['order']['customer_address'], 180, $x);
                $x=$x+20;

                printer_draw_text($handle, "Customer Pan No", 7, $x);
                printer_draw_text($handle, ":", 170, $x);
                printer_draw_text($handle, $data['order']['customer_pan'], 180, $x);
                $x=$x+20;

                printer_draw_text($handle, "- - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -", 7, $x); 
                $x=$x+20;
                printer_draw_text($handle, "SN.", 7, $x);
                printer_draw_text($handle, "PARTICULARS", 45, $x);
                printer_draw_text($handle, "QTY.", 250, $x);
                printer_draw_text($handle, "Rate", 290, $x);
                printer_draw_text($handle, "Amount", 330, $x);
                $x=$x+20;
                printer_draw_text($handle, "- - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -", 7, $x);
                $x=$x+20;

                $i=0;
                foreach($data['items'] as $item) :
                    $i++;
                    printer_draw_text($handle, $i, 7, $x);

                    if($item['type'] == Yii::$app->params['item_type']['regular']) {
                        $item_name  = $item['name'];
                        $item_price = $item['price'];
                    }else{
                        $item_name  = 'Special-Item('.$item['special_item_name'].')';
                        $item_price = $item['special_item_price'];
                    }

                    if(strlen($item_name) > 26) {
                        printer_draw_text($handle, substr($item_name,0,26), 45, $x);
                    }else {
                        printer_draw_text($handle, $item_name, 26, $x);
                    }

                    printer_draw_text($handle, $item['quantity'], 250, $x);
                    printer_draw_text($handle, $item_price, 290, $x);
                    printer_draw_text($handle, $item['quantity']*$item_price, 330, $x);
                    $x=$x+20;
                endforeach;

                $sub_total          = $data['order']['sub_total'];
                $discount_amount    = $data['order']['discount_amount'];
                $gross_amount       = $data['order']['sub_total'] - $data['order']['discount_amount'];
                $service_charge     = $data['order']['service_charge_amount'];
                $net_amount         = $gross_amount + $service_charge;
                $round_value        = $data['order']['round_value'];
                $net_total_amount   = $data['order']['total'];
                $paid_amount        = $data['order']['received_amount'];
                $change_amount      = $data['order']['change_amount'];

                printer_draw_text($handle, "- - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -", 7, $x);
                $x=$x+20;

                printer_draw_text($handle, "Sub Total", 7, $x);
                printer_draw_text($handle, ":", 250, $x);
                printer_draw_text($handle, "Rs. ".$sub_total, 260, $x);
                $x=$x+20;

                printer_draw_text($handle, "Discount   ".$data['order']['discount_rate']." %", 7, $x);
                printer_draw_text($handle, ":", 250, $x);
                printer_draw_text($handle, "Rs. ".$discount_amount, 260, $x);
                $x=$x+20;

                printer_draw_text($handle, "Gross Amount", 7, $x);
                printer_draw_text($handle, ":", 250, $x);
                printer_draw_text($handle, "Rs. ".$gross_amount, 260, $x);
                $x=$x+20;

                printer_draw_text($handle, "Service Charge  ".$data['order']['service_charge_rate']."%", 7, $x);
                printer_draw_text($handle, ":", 250, $x);
                printer_draw_text($handle, "Rs. ".$service_charge, 260, $x);
                $x=$x+20;

                printer_draw_text($handle, "Net Amount", 7, $x);
                printer_draw_text($handle, ":", 250, $x);
                printer_draw_text($handle, "Rs. ".$net_amount, 260, $x);
                $x=$x+20;

                printer_draw_text($handle, "Round Amount", 7, $x);
                printer_draw_text($handle, ":", 250, $x);
                printer_draw_text($handle, "Rs. ".$round_value, 260, $x);
                $x=$x+20;

                printer_draw_text($handle, "Net Total Amount", 7, $x);
                printer_draw_text($handle, ":", 250, $x);
                printer_draw_text($handle, "Rs. ".$net_total_amount, 260, $x);
                $x=$x+20;

                printer_draw_text($handle, "Paid Amount", 7, $x);
                printer_draw_text($handle, ":", 250, $x);
                printer_draw_text($handle, "Rs. ".$paid_amount, 260, $x);
                $x=$x+20;

                printer_draw_text($handle, "Change Amount", 7, $x);
                printer_draw_text($handle, ":", 250, $x);
                printer_draw_text($handle, "Rs. ".$change_amount, 260, $x);
                $x=$x+20;

                printer_draw_text($handle, "- - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -", 7, $x);
                $x=$x+20;

                $amount_in_word = "Rupees ".Misc::convertNumberToWords($net_total_amount). " Only";
                if(strlen($amount_in_word) > 46) {
                    printer_draw_text($handle, substr($amount_in_word,0,46), 7, $x);
                    $x=$x+20; 
                    printer_draw_text($handle, substr($amount_in_word,46,46), 7, $x);
                    $x=$x+20; 
                }else {
                    printer_draw_text($handle, $amount_in_word , 7, $x);  
                    $x=$x+20; 
                }
                
                printer_draw_text($handle, "- - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -", 7, $x);
                $x=$x+20;

                if(strlen($settings['thank-you-note-in-bill']) > 46) {
                    printer_draw_text($handle, substr($settings['thank-you-note-in-bill'],0,46), 7, $x);
                    $x=$x+20; 
                    printer_draw_text($handle, substr($settings['thank-you-note-in-bill'],46,46), 7, $x);
                    $x=$x+20; 
                }else {
                    printer_draw_text($handle, $settings['thank-you-note-in-bill'] , 7, $x);  
                    $x=$x+20; 
                }

                printer_draw_text($handle, "- - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -", 7, $x);
                $x=$x+20;

                printer_draw_text($handle, "Printed BY   : ".$data['order']['user_name'], 7, $x); 
                $x=$x+20; 

                printer_draw_text($handle, "Date & Time : ".date('Y-m-d H:i:s'), 7, $x);  
                $x=$x+20;

                printer_delete_font($font);

                printer_end_page($handle);
                printer_end_doc($handle);
                printer_close($handle);

                $duplicate = new DuplicateBill();
                $duplicate->order_id   = $data['order']['id'];
                $duplicate->is_printed = 1;
                $duplicate->created_on = date('Y-m-d H:i:s');
                $duplicate->created_by = Yii::$app->session['eHhupx5UpkLZoXRP_cR1ozEVjY14zWOC0_user']->id;
                $duplicate->save();

                return true;
            }
        }
        else{
            return false;
        }
    }

    public static function PrintCancelBill($printer, $data) 
    {
        return true;
        die;
        if($printer != null && $data != null) {
            $handle = printer_open($printer);
            if(!$handle || $handle == NULL)
            {
                return false;
            }
            else
            {
                $settings = HSettings::getBasic("'name-in-bill', 'address-in-bill', 'phone-no-in-bill', 'pan-no-in-bill', 'thank-you-note-in-bill'");

                printer_start_doc($handle, "Truffle Bill Print");
                printer_start_page($handle);

                $font = printer_create_font("Arial", 17, 8, PRINTER_FW_THIN, false, false, false, 0);
                printer_select_font($handle, $font);

                $x = 10;
                printer_draw_text($handle, $settings['name-in-bill'], 100, $x);
                $x=$x+20;
                printer_draw_text($handle, $settings['address-in-bill'], 100, $x);
                $x=$x+20;
                printer_draw_text($handle, "Phone  :".$settings['phone-no-in-bill'], 100, $x);
                $x=$x+20;
                printer_draw_text($handle, "Pan no : ".$settings['pan-no-in-bill'], 100, $x);
                $x=$x+30;

                printer_draw_text($handle, "CREDIT NOTE", 150, $x);
                $x=$x+30;

                $from_date  = (date('m-d') < "07-16") ? (date('Y')-1) : date('Y');
                $to_date    = (date('m-d') > "07-15") ? (date('Y')+1) : date('Y');

                printer_draw_text($handle, "RETURNED AGAINST", 7, $x);
                printer_draw_text($handle, ":", 190, $x);
                printer_draw_text($handle, $data['order']['cancel_against_inv'], 200, $x);
                $x=$x+30;

                printer_draw_text($handle, "RETURNED DATE", 7, $x);
                printer_draw_text($handle, ":", 170, $x);
                printer_draw_text($handle, date('Y-m-d H:i:s'), 180, $x);
                $x=$x+20;

                printer_draw_text($handle, "Customer Name", 7, $x);
                printer_draw_text($handle, ":", 170, $x);
                printer_draw_text($handle, $data['order']['customer_name'], 180, $x);
                $x=$x+20;

                printer_draw_text($handle, "Customer Address", 7, $x);
                printer_draw_text($handle, ":", 170, $x);
                printer_draw_text($handle, $data['order']['customer_address'], 180, $x);
                $x=$x+20;

                printer_draw_text($handle, "Customer Pan No", 7, $x);
                printer_draw_text($handle, ":", 170, $x);
                printer_draw_text($handle, ($data['order']['customer_pan'] != 0) ? $data['order']['customer_pan'] : '', 180, $x);
                $x=$x+20;

                printer_draw_text($handle, "- - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -", 7, $x); 
                $x=$x+20;
                printer_draw_text($handle, "SN.", 7, $x);
                printer_draw_text($handle, "PARTICULARS", 45, $x);
                printer_draw_text($handle, "QTY.", 250, $x);
                printer_draw_text($handle, "Rate", 290, $x);
                printer_draw_text($handle, "Amount", 330, $x);
                $x=$x+20;
                printer_draw_text($handle, "- - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -", 100, $x);
                $x=$x+20;

                $i=0;
                foreach($data['items'] as $item) :
                    $i++;
                    printer_draw_text($handle, $i, 7, $x);

                    if($item['type'] == Yii::$app->params['item_type']['regular']) {
                        $item_name  = $item['name'];
                        $item_price = $item['price'];
                    }else{
                        $item_name  = 'Special-Item('.$item['special_item_name'].')';
                        $item_price = $item['special_item_price'];
                    }

                    if(strlen($item_name) > 26) {
                        printer_draw_text($handle, substr($item_name,0,26), 45, $x);
                    }else {
                        printer_draw_text($handle, $item_name, 26, $x);
                    }

                    printer_draw_text($handle, $item['quantity'], 250, $x);
                    printer_draw_text($handle, $item_price, 290, $x);
                    printer_draw_text($handle, $item['quantity']*$item_price, 330, $x);
                    $x=$x+20;
                endforeach;

                $sub_total          = $data['order']['sub_total'];
                $discount_amount    = $data['order']['discount_amount'];
                $gross_amount       = $data['order']['sub_total'] - $data['order']['discount_amount'];
                $service_charge     = $data['order']['service_charge_amount'];
                $net_amount         = $gross_amount + $service_charge;
                $round_value        = $data['order']['round_value'];
                $net_total_amount   = $data['order']['total'];
                $paid_amount        = $data['order']['received_amount'];
                $change_amount      = $data['order']['change_amount'];

                printer_draw_text($handle, "- - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -", 7, $x);
                $x=$x+20;

                printer_draw_text($handle, "Sub Total", 7, $x);
                printer_draw_text($handle, ":", 250, $x);
                printer_draw_text($handle, "Rs. ".$sub_total, 260, $x);
                $x=$x+20;

                printer_draw_text($handle, "Discount    ".$data['order']['discount_rate']." %", 7, $x);
                printer_draw_text($handle, ":", 250, $x);
                printer_draw_text($handle, "Rs. ".$discount_amount, 260, $x);
                $x=$x+20;

                printer_draw_text($handle, "Gross Amount", 7, $x);
                printer_draw_text($handle, ":", 250, $x);
                printer_draw_text($handle, "Rs. ".$gross_amount, 260, $x);
                $x=$x+20;

                printer_draw_text($handle, "Service Charge  ".$data['order']['service_charge_rate']."%", 7, $x);
                printer_draw_text($handle, ":", 250, $x);
                printer_draw_text($handle, "Rs. ".$service_charge, 260, $x);
                $x=$x+20;

                printer_draw_text($handle, "Net Amount", 7, $x);
                printer_draw_text($handle, ":", 250, $x);
                printer_draw_text($handle, "Rs. ".$net_amount, 260, $x);
                $x=$x+20;

                printer_draw_text($handle, "Round Amount", 7, $x);
                printer_draw_text($handle, ":", 250, $x);
                printer_draw_text($handle, "Rs. ".$round_value, 260, $x);
                $x=$x+20;

                printer_draw_text($handle, "Net Total Amount", 7, $x);
                printer_draw_text($handle, ":", 250, $x);
                printer_draw_text($handle, "Rs. ".$net_total_amount, 260, $x);
                $x=$x+20;

                printer_draw_text($handle, "- - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -", 7, $x);
                $x=$x+20;

                if(strlen($data['order']['cancelled_reason']) > 46) {
                    printer_draw_text($handle, substr($data['order']['cancelled_reason'],0,46), 7, $x);
                    $x=$x+20; 
                    printer_draw_text($handle, substr($data['order']['cancelled_reason'],46,46), 7, $x);
                    $x=$x+20; 
                    printer_draw_text($handle, substr($data['order']['cancelled_reason'],92,46), 7, $x);
                    $x=$x+20; 
                }else {
                    printer_draw_text($handle, $data['order']['cancelled_reason'] , 7, $x);  
                    $x=$x+20; 
                }

                printer_draw_text($handle, "- - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -", 7, $x);
                $x=$x+20;

                printer_delete_font($font);

                printer_end_page($handle);
                printer_end_doc($handle);
                printer_close($handle);

                return true;
            }
        }
        else{
            return false;
        }
    }

    public static function PrintReceipt($printer, $data) 
    {   
        return true;
        die;
        if($printer != null && $data != null) {
            $handle = printer_open($printer);
            if(!$handle || $handle == NULL)
            {
                return false;
            }
            else
            {
                $settings = HSettings::getBasic("'name-in-bill', 'address-in-bill', 'phone-no-in-bill', 'pan-no-in-bill'");
                    
                printer_start_doc($handle, "Truffle Bill Print");
                printer_start_page($handle);

                $font = printer_create_font("Arial", 17, 8, PRINTER_FW_THIN, false, false, false, 0);
                printer_select_font($handle, $font);

                $x = 10;
                printer_draw_text($handle, "Receipt", 60, $x);
                $x=$x+20;
                printer_draw_text($handle, $settings['name-in-bill'], 45, $x);
                $x=$x+20;
                printer_draw_text($handle, $settings['address-in-bill'], 45, $x);
                $x=$x+20;
                printer_draw_text($handle, "Phone  : ".$settings['phone-no-in-bill'], 45, $x);
                $x=$x+20;
                printer_draw_text($handle, "Pan no : ".$settings['pan-no-in-bill'], 45, $x);
                $x=$x+30;

                $from_date  = (date('m-d') < "07-16") ? (date('Y')-1) : date('Y');
                $to_date    = (date('m-d') > "07-15") ? (date('Y')+1) : date('Y');

                printer_draw_text($handle, "RECEIPT NO", 10, $x);
                printer_draw_text($handle, ":", 130, $x);
                printer_draw_text($handle, $data['invoice_no'], 140, $x);
                $x=$x+20;

                printer_draw_text($handle, "DATE", 10, $x);
                printer_draw_text($handle, ":", 130, $x);
                printer_draw_text($handle, date('Y-m-d H:i:s'), 140, $x);
                $x=$x+20;

                printer_draw_text($handle, "Customer Name", 7, $x);
                printer_draw_text($handle, ":", 130, $x);
                printer_draw_text($handle, $data['customer_name'], 140, $x);
                $x=$x+20;

                printer_draw_text($handle, "- - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -", 10, $x);
                $x=$x+20;

                printer_draw_text($handle, "Cash received as partial payment", 20, $x);  
                $x=$x+20; 

                printer_draw_text($handle, "- - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -", 10, $x);
                $x=$x+20;

                printer_draw_text($handle, "Total Amount", 10, $x);
                printer_draw_text($handle, ":", 160, $x);
                printer_draw_text($handle, "Rs. ".$data['total'], 170, $x);
                $x=$x+20;

                printer_draw_text($handle, "Received Amount", 10, $x);
                printer_draw_text($handle, ":", 160, $x);
                printer_draw_text($handle, "Rs. ".$data['received_amount'], 170, $x);
                $x=$x+20;

                printer_draw_text($handle, "Change Amount", 10, $x);
                printer_draw_text($handle, ":", 160, $x);
                printer_draw_text($handle, "Rs. ".$data['change_amount'], 170, $x);
                $x=$x+20;

                printer_draw_text($handle, "- - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -", 10, $x);
                $x=$x+20;

                $amount_in_word = "Rupees ".Misc::convertNumberToWords($data['total']). " Only";
                if(strlen($amount_in_word) > 46) {
                    printer_draw_text($handle, substr($amount_in_word,0,46), 10, $x);
                    $x=$x+20; 
                    printer_draw_text($handle, substr($amount_in_word,46,46), 10, $x);
                    $x=$x+20; 
                }else {
                    printer_draw_text($handle, $amount_in_word , 10, $x);  
                    $x=$x+20; 
                }
                
                printer_draw_text($handle, "- - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -", 10, $x);
                $x=$x+20;

                printer_draw_text($handle, "Printed BY   : ".$data['user_name'], 10, $x); 
                $x=$x+20; 

                printer_draw_text($handle, "Date & Time : ".date('Y-m-d H:i:s'), 10, $x);  
                $x=$x+20;

                printer_draw_text($handle, "* This is a system generated receipt *", 20, $x);  
                $x=$x+20; 

                printer_delete_font($font);

                printer_end_page($handle);
                printer_end_doc($handle);
                printer_close($handle);

                return true;
            }
        }
        else{
            return false;
        }
    }

    public static function PrintDeliveryCharge($printer, $data) 
    {
        return true;
        die;
        if($printer != null && $data != null) {
            $handle = printer_open($printer);
            if(!$handle || $handle == NULL)
            {
                return false;
            }
            else
            {

                printer_start_doc($handle, "Truffle Bill Print");
                printer_start_page($handle);

                $font = printer_create_font("Arial", 17, 8, PRINTER_FW_THIN, false, false, false, 0);
                printer_select_font($handle, $font);

                $settings = HSettings::getBasic("'name-in-bill', 'address-in-bill', 'phone-no-in-bill', 'pan-no-in-bill', 'thank-you-note-in-bill'");

                $x = 10;

                printer_draw_text($handle, $settings['name-in-bill'], 100, $x);
                $x=$x+20;
                printer_draw_text($handle, $settings['address-in-bill'], 100, $x);
                $x=$x+20;
                printer_draw_text($handle, "Phone  :".$settings['phone-no-in-bill'], 100, $x);
                $x=$x+20;
                printer_draw_text($handle, "Pan no : ".$settings['pan-no-in-bill'], 100, $x);
                $x=$x+30;

                printer_draw_text($handle, "INVOICE", 150, $x);
                $x=$x+30;

                $from_date  = (date('m-d') < "07-16") ? (date('Y')-1) : date('Y');
                $to_date    = (date('m-d') > "07-15") ? (date('Y')+1) : date('Y');

                printer_draw_text($handle, "BILL NO", 7, $x);
                printer_draw_text($handle, ":", 170, $x);
                printer_draw_text($handle, $data['order']['invoice_no'], 180, $x);
                $x=$x+20;
                printer_draw_text($handle, "DATE", 7, $x);
                printer_draw_text($handle, ":", 170, $x);
                printer_draw_text($handle, date('Y-m-d H:i:s'), 180, $x);
                $x=$x+20;
                printer_draw_text($handle, "Customer Name", 7, $x);
                printer_draw_text($handle, ":", 170, $x);
                printer_draw_text($handle, $data['order']['customer_name'], 180, $x);
                $x=$x+20;

                printer_draw_text($handle, "Customer Address", 7, $x);
                printer_draw_text($handle, ":", 170, $x);
                printer_draw_text($handle, $data['order']['customer_address'], 180, $x);
                $x=$x+20;

                printer_draw_text($handle, "Customer Pan No", 7, $x);
                printer_draw_text($handle, ":", 170, $x);
                printer_draw_text($handle, ($data['order']['customer_pan'] != 0) ? $data['order']['customer_pan'] : '', 180, $x);
                $x=$x+20;

                printer_draw_text($handle, "- - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -", 7, $x); 
                $x=$x+20;
                printer_draw_text($handle, "SN.", 7, $x);
                printer_draw_text($handle, "PARTICULARS", 45, $x);
                printer_draw_text($handle, "Amount", 330, $x);
                $x=$x+20;
                printer_draw_text($handle, "- - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -", 7, $x);
                $x=$x+20;

                printer_draw_text($handle, "1", 7, $x);
                printer_draw_text($handle, "Delivery Charge Amount", 45, $x);
                printer_draw_text($handle, $data['total'], 330, $x);
                $x=$x+20;

                printer_draw_text($handle, "- - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -", 7, $x);
                $x=$x+20;

                printer_draw_text($handle, "Gross Amount", 7, $x);
                printer_draw_text($handle, ":", 45, $x);
                printer_draw_text($handle, "Rs. ".$data['total'], 330, $x);
                $x=$x+20;

                printer_draw_text($handle, "Net Amount", 7, $x);
                printer_draw_text($handle, ":", 45, $x);
                printer_draw_text($handle, "Rs. ".$data['total'], 330, $x);
                $x=$x+20;

                printer_draw_text($handle, "- - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -", 7, $x);
                $x=$x+20;

                $amount_in_word = "Rupees ".Misc::convertNumberToWords($data['total']). " Only";
                if(strlen($amount_in_word) > 46) {
                    printer_draw_text($handle, substr($amount_in_word,0,46), 7, $x);
                    $x=$x+20; 
                    printer_draw_text($handle, substr($amount_in_word,46,46), 7, $x);
                    $x=$x+20; 
                }else {
                    printer_draw_text($handle, $amount_in_word , 7, $x);  
                    $x=$x+20; 
                }
                
                printer_draw_text($handle, "- - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -", 7, $x);
                $x=$x+20;

                if(strlen($settings['thank-you-note-in-bill']) > 46) {
                    printer_draw_text($handle, substr($settings['thank-you-note-in-bill'],0,46), 7, $x);
                    $x=$x+20; 
                    printer_draw_text($handle, substr($settings['thank-you-note-in-bill'],46,46), 7, $x);
                    $x=$x+20; 
                }else {
                    printer_draw_text($handle, $settings['thank-you-note-in-bill'] , 7, $x);  
                    $x=$x+20; 
                }

                printer_draw_text($handle, "- - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -", 7, $x);
                $x=$x+20;

                printer_draw_text($handle, "Printed BY   : ".$data['user_name'], 7, $x); 
                $x=$x+20; 

                printer_draw_text($handle, "Date & Time : ".date('Y-m-d H:i:s'), 7, $x);  
                $x=$x+20;

                printer_delete_font($font);

                printer_end_page($handle);
                printer_end_doc($handle);
                printer_close($handle);

                return true;
            }
        }
        else{
            return false;
        }
    }

    public function actionBackup() 
    {
        return $this->render('db_backup_local');
    }
    public function actionManage(){
        $orders = Query::queryAll("SELECT *
                        FROM `order`
                        WHERE customer_phone != '' 
                        AND customer_name != 'Cash Customer'
                        AND customer_phone NOT IN(SELECT phone FROM `customer`)
                        GROUP BY customer_phone");
        echo "<pre>";
        foreach($orders as $row){
            $customer= new Customer();
            $customer->name =$row['customer_name'];
            $customer->phone= $row['customer_phone'];
            $customer->save();
            echo $customer->name;
            echo '<br>';
        }
        
        die;
    }
}
