<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\HttpException;

use app\components\Misc;
use app\components\Notify;
use app\components\Query;
use app\components\UniqueUser;
use app\components\HelperDebtor as HDebtor;
use app\components\HelperPrinter as HPrinter;
use app\components\HelperSettings as HSettings;
use app\components\HelperStock as HStock;
use app\components\HelperOccupy as HOccupy;
use app\components\HelperMember as HMember;

use app\models\Debtors;
use app\models\DebtorPayment;
use app\models\Order;
use app\models\OrderItems;
use app\models\BreakDownReceipt;
use app\models\BreakDownItems;
use app\models\Occupy;
use app\models\Retail;
use app\models\TakeAway;
use app\models\PickUp;
use app\models\Delivery;
use app\models\DeliveryCharge;
use app\models\User;
use app\models\Member;
use app\models\MemberReport;

class DebtorController extends Controller {

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
        }

        if(UniqueUser::checkUniqueLogin() != false) {
            throw new HttpException(404,'Page Not Found');
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

    public function actionCreateDebtor() 
    {
        $latest = Misc::getLatestDate();
        if($latest != '' &&  date('Y-m-d') < $latest['latest_date'] ) { 
            echo json_encode(false); die;
        } else {
            $temp = explode(":",Yii::$app->session['fiscal_year']);
            $starting_fiscal_year_from_date = $temp[0];
            $starting_fiscal_year_to_date   = $temp[1];

            if ((date('Y-m-d') < $starting_fiscal_year_from_date) 
                    || ( date('Y-m-d') > date('Y-m-d', strtotime($starting_fiscal_year_to_date. ' + 11 days'))) )
            {
                echo json_encode(FALSE); die;
            }else {
                if(Yii::$app->request->isAjax && isset($_POST)){
                    $debtor = new Debtors();
                    $debtor->name           = (isset($_POST['debtor_name']) && $_POST['debtor_name'] != null) ? htmlspecialchars(trim($_POST['debtor_name']), ENT_QUOTES) : ''; 
                    $debtor->pan            = (isset($_POST['debtor_pan']) && $_POST['debtor_pan'] != null) ? htmlspecialchars(trim($_POST['debtor_pan']), ENT_QUOTES) : '0';
                    $debtor->phone          = (isset($_POST['debtor_phone']) && $_POST['debtor_phone'] != null) ? htmlspecialchars(trim($_POST['debtor_phone']), ENT_QUOTES) : '0';
                    $debtor->address        = (isset($_POST['debtor_address']) && $_POST['debtor_address'] != null) ? htmlspecialchars(trim($_POST['debtor_address']), ENT_QUOTES) : '';
                    $debtor->opening_balance = (isset($_POST['debtor_opening_balance']) && $_POST['debtor_opening_balance'] != null) ? htmlspecialchars(trim($_POST['debtor_opening_balance']), ENT_QUOTES) : 0;
                    $debtor->credit_amount  = 0;
                    $debtor->is_active      = 1;
                    $debtor->created_on     = date('Y-m-d H:i:s');
                    if($debtor->save()){
                        $id = $debtor->id;
                        $name = $debtor->name;

                        $log = array(
                            'action' => "New debtor named -" . $debtor->name . "' has been created",
                            'type' => "debtor"
                        );
                        Notify::auditLog($log);

                       echo json_encode(array('status' => 'true' , 'debtor_id' => $id , 'debtor_name' => $name)); die; 
                    }
                }
                throw new HttpException(404, 'Page not found.');
            }
        }
    }

	public function actionFindDebtors() 
    {
		if(Yii::$app->request->isAjax){
			$debtors = Query::queryAll("SELECT id, name FROM Debtors"); 
            if($debtors != null){
                $data = [];
                foreach($debtors as $deb) :
                    $data[] = array('id' => $deb['id'], 'name' => $deb['name']); 
                endforeach;
                echo json_encode($data); die;
            }
            echo json_encode(false); die;
		}
		echo json_encode(false); die;
	}

    public function actionGetDebtorsList() 
    {
        if(Yii::$app->request->isAjax){
            $debtors = Query::queryAll("SELECT * FROM Debtors");   
            echo json_encode(array('status' => 'true' , 'debtors' => $debtors)); die;
        }
        echo json_encode(false); die;
    }

    /*debtor list for admin*/
    public function actionList() 
    {
        /*code to fix the debtor data for hashtag*/
        /*$total_payable = Query::queryAll("SELECT debtor_id , SUM(total) as total
                                            FROM `break_down_receipt` 
                                            WHERE payment_type = ". Yii::$app->params['payment_type']['credit'] .
                                            " AND ( '2018-07-15' >= DATE(created_on) AND '2017-07-16' <= DATE(created_on) ) 
                                            GROUP BY debtor_id");
        
        if($total_payable != null) {
            foreach ($total_payable as $payable) {
                $debtor = Debtors::findOne($payable['debtor_id']);
                if($debtor) {
                    $debtor->opening_balance = $debtor->opening_balance - $payable['total'];
                    $debtor->credit_amount   = 0;
                    $debtor->paid_amount     = 0;
                    $debtor->update();
                }
            }
        }*/

        $debtors                = Query::queryAll("SELECT * FROM debtors"); 

        $temp_debtor_paid       = Query::queryAll("SELECT debtor_id, SUM(total) as total FROM `break_down_receipt` WHERE is_credit_paid = " . Yii::$app->params['is_credit_paid']['yes']." GROUP BY debtor_id");
        $debtor_paid            = array_column($temp_debtor_paid, null, 'debtor_id');
        
        $temp_credit_order      = Query::queryAll("SELECT debtor_id, SUM(payable_total) as total FROM `order` WHERE is_cancel = 0 GROUP BY debtor_id");
        $credit_order           = array_column($temp_credit_order, null, 'debtor_id');

        $temp_credit_break_down = Query::queryAll("SELECT bd.debtor_id, SUM(bd.total) as total
                                            FROM `break_down_receipt` AS bd
                                            LEFT JOIN `order` AS o ON o.id = bd.order_id 
                                            WHERE o.is_cancel = 0 
                                                AND (bd.type = ".Yii::$app->params['break_down_payment_type']['item_wise']."
                                                    OR bd.type = ".Yii::$app->params['break_down_payment_type']['advance'].")
                                            GROUP BY bd.debtor_id");
        $credit_break_down      = array_column($temp_credit_break_down, null, 'debtor_id');

        $temp_payment_return    = Query::queryAll("SELECT bd.debtor_id, SUM(bd.total) as total
                                            FROM `break_down_receipt` AS bd
                                            LEFT JOIN `order` AS o ON o.id = bd.order_id 
                                            WHERE bd.is_payment_return = ".Yii::$app->params['is_payment_return']['yes']."
                                            GROUP BY bd.debtor_id");
        $payment_return         = array_column($temp_payment_return, null, 'debtor_id');


        $settings = HSettings::getBasic("'name-in-bill', 'address-in-bill', 'phone-no-in-bill', 'pan-no-in-bill'");
        $user = User::findOne(Yii::$app->session['eHhupx5UpkLZoXRP_cR1ozEVjY14zWOC0_user']->id);
        return $this->render('index',array('debtors'    => $debtors , 
                                            'settings'  => $settings ,
                                            'user_name' => $user->name,
                                            'credit_order' => $credit_order,
                                            'credit_break_down' => $credit_break_down,
                                            'debtor_paid'   => $debtor_paid,
                                            'payment_return' => $payment_return
                                        ));    
    }

    public function actionAddCreditAmount()
    {   
        $latest = Misc::getLatestDate();
        if($latest != '' &&  date('Y-m-d') < $latest['latest_date'] ) { 
            echo json_encode(false); die;
        } else {
            if(Yii::$app->session['eHhupx5UpkLZoXRP_cR1ozEVjY14zWOC0_user']['role'] != Yii::$app->params['user_role']['floor_supervisor']) {
                $temp = explode(":",Yii::$app->session['fiscal_year']);
                $starting_fiscal_year_from_date = $temp[0];
                $starting_fiscal_year_to_date   = $temp[1];

                if ((date('Y-m-d') < $starting_fiscal_year_from_date) 
                        || ( date('Y-m-d') > date('Y-m-d', strtotime($starting_fiscal_year_to_date. ' + 11 days'))) )
                {
                    echo json_encode(FALSE); die;
                } else {
                    if (Yii::$app->request->isAjax && isset($_POST)) {
                        
                        if (isset($_POST['items']) && $_POST['items'] != '') {

                            if($_POST['amount_required'] == 0 && $_POST['amount_required'] == null){
                                echo json_encode(array('status' => 'empty_order', 'msg' => 'Cannot make an empty order')); die;
                            }
                            if($_POST['debtor_id'] == null){
                                echo json_encode(array('status' => 'no_debtor', 'msg' => 'Debtor need to be selected')); die;
                            }
                            if($_POST['amount_required'] != 0 && $_POST['amount_required'] != null){
                                $debtor = Debtors::find()->WHERE(['id' => $_POST['debtor_id']])->one();
                                $credit_amount = $debtor->credit_amount + $_POST['amount_required'];
                                $debtor->credit_amount = (isset($_POST['amount_required']) && $_POST['amount_required'] != null) ? $credit_amount : 0;
                                if($debtor->update()){
                                    $debtor_name = $debtor->name;

                                    $items = $_POST['items']; 
                                    
                                    if ($items != null) {

                                        if($_POST['customer_pax'] != null) {
                                            $new_customer_pax = $_POST['customer_pax'];
                                        }elseif (array_key_exists('new_customer_pax', $_POST)) {
                                            $new_customer_pax = $_POST['new_customer_pax'];
                                        }else{
                                            $new_customer_pax = 0;
                                        }

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
                                            $discount_amount    = $_POST['total_discount_amount'] + $_POST['discount_amount'];
                                            $discount_rate      = Misc::round_up(( $discount_amount / $discountable_sub_total ) * 100, 2);
                                            $total = $sub_total - $discount_amount;
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

                                        $temp_total     = Misc::round_up($total , 2);
                                        $grand_total    = round($temp_total);
                                        $round_value    = round(($grand_total - $temp_total) , 2);
                 
                                        $temp = explode(":",Yii::$app->session['fiscal_year']);
                                        $starting_fiscal_year_from_date = $temp[0];
                                        $starting_fiscal_year_to_date   = $temp[1];

                                        $inv_start = date('y',strtotime($starting_fiscal_year_to_date ));

                                        $max_inv = $inv_start.'-1';

                                        $max_invoice = Query::queryOne("SELECT MAX(CAST(SUBSTRING(invoice_no, 4, length(invoice_no)-3) AS UNSIGNED)) as max FROM `order` WHERE DATE(created_on) >= '".$starting_fiscal_year_from_date."' AND DATE(created_on) <= '".$starting_fiscal_year_to_date."'"); 
                                        
                                        if ($max_invoice['max'] != null) {
                                            $max_inv = $inv_start. '-' . ((string) ($max_invoice['max'] + 1));
                                        }

                                        $order                         = new Order();
                                        $order->id                     = time();
                                        $order->invoice_no             = $max_inv;
                                        $order->occupy_id              = ($_POST['occupy_id'] != null) ? $_POST['occupy_id'] : 0;
                                        $order->customer_name          = ($debtor_name != null) ? ucwords($debtor_name) : 'Credit Customer';
                                        $order->customer_pan           = ($_POST['customer_pan'] != null) ? htmlspecialchars(trim($_POST['customer_pan']), ENT_QUOTES) : '0';
                                        $order->customer_address       = (isset($_POST['customer_address']) && $_POST['customer_address'] != null) ? htmlspecialchars(trim($_POST['customer_address']), ENT_QUOTES) : '';
                                        $order->customer_pax            = $new_customer_pax;
                                        $order->customer_phone          = (array_key_exists('customer_phone', $_POST) && $_POST['customer_phone'] != null) ? htmlspecialchars(trim($_POST['customer_phone']), ENT_QUOTES) : '';
                                        $order->table_id               = ($_POST['table_id'] != null) ? $_POST['table_id'] : '0';
                                        $order->floor_id               = ($_POST['floor_id'] != null) ? $_POST['floor_id'] : '0';
                                        $order->sub_total              = $sub_total;
                                        $order->service_charge_rate    = $service_charge_rate;
                                        $order->service_charge_amount  = $service_charge_amount;
                                        $order->discount_rate          = $discount_rate;
                                        $order->discount_amount        = $discount_amount;
                                        $order->total                  = $grand_total;
                                        $order->round_value            = $round_value;
                                        $order->payable_total          = ($_POST['remaining_total'] != null) ? $_POST['remaining_total'] : 0;
                                        $order->received_amount        = 0;
                                        $order->change_amount          = 0;
                                        $order->payment_type           = $_POST['payment_type'];
                                        $order->debtor_id              = $_POST['debtor_id'];
                                        $order->created_on             = date('Y-m-d H:i:s');
                                        $order->created_by             = Yii::$app->session['eHhupx5UpkLZoXRP_cR1ozEVjY14zWOC0_user']->id;
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
                                        }

                                        if ($order->save()) {
                                            if( $_POST['occupy_id'] != null){
                                                HOccupy::setOccupied($_POST['occupy_id']);
                                            }

                                            $order_id     = $order->id;
                                            $order_inv    = $order->invoice_no;

                                            /*codes to save the membership discount details*/
                                            if($_POST['member_id'] != '') {
                                                $member = Query::queryOneSecure("SELECT * FROM `member` WHERE id = :id",[':id' => $_POST['member_id']]);

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
                                                    WHERE mc.id IN ('".$category_ids."') AND mi.id IN ('".$item_ids."')");

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

                                            /*to make debtor receipt of final payment*/
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
                                            $break_down->debtor_id             = $order->debtor_id;
                                            $break_down->type               = Yii::$app->params['break_down_payment_type']['credit_receipt'];
                                            $break_down->created_on         = date('Y-m-d H:i:s');
                                            $break_down->created_by         = Yii::$app->session['eHhupx5UpkLZoXRP_cR1ozEVjY14zWOC0_user']->id;
                                            $break_down->save();
                                            /*to make debtor receipt of final payment*/

                                            foreach($items as $item):
                                                $batch[] = [$order->id, $item['item_id'], $item['quantity'], $item['price'], $item['type']];
                                                if($item['type'] == Yii::$app->params['item_type']['regular']) {
                                                    $stock_item[$item['item_id']] = $item['quantity'];
                                                }
                                            endforeach;

                                            Query::batchInsert('order_items', array('order_id', 'item_id', 'quantity', 'price', 'type'), $batch);

                                            HStock::addStockOut($stock_item);

                                            Yii::$app->session['discount'] = false;
                                            Yii::$app->session['master-password'] = false;

                                            if($_POST['occupy_id'] != ''){
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
                                                            WHERE oi.order_id = :id",[':id' => $order_id]); 
                                                $data['order'] = $data1;
                                                $data['items'] = $data2;
                                                $printer = HPrinter::getPrinters("'bill'");
                                                $this->PrintBill($printer['bill'], $data, 'occupy');

                                                $occupy = Occupy::find()->WHERE(['id' => $_POST['occupy_id']])->one();
                                                if($occupy != null){
                                                    if($occupy->status == 0){
                                                        $occupy->status = 1;
                                                    }else{
                                                        $occupy->status = 0;
                                                    }
                                                    $occupy->update();
                                                }
                                                Query::executeSecure("DELETE FROM temp_items WHERE occupy_id = :occupy_id",[':occupy_id'=>htmlspecialchars($_POST['occupy_id'], ENT_QUOTES)]);

                                                Query::executeSecure('UPDATE kot SET kitchen_status = 1 , `status` = CASE
                                                                    WHEN status = '.Yii::$app->params['kot_status']['show'].' THEN 
                                                                        '.Yii::$app->params['kot_status']['hide'].'
                                                                    ELSE '.Yii::$app->params['kot_status']['return'].'
                                                                    END , 
                                                    order_id = '.$order_id.' , occupy_id = 0 WHERE occupy_id = :occupy_id', [':occupy_id'=>htmlspecialchars($_POST['occupy_id'], ENT_QUOTES)]);

                                                Query::executeSecure('UPDATE `break_down_receipt` SET order_id = '.$order_id.' , occupy_id = 0 WHERE occupy_id = :occupy_id', [':occupy_id'=> htmlspecialchars($_POST['occupy_id'], ENT_QUOTES)]);

                                                if(Yii::$app->session['eHhupx5UpkLZoXRP_cR1ozEVjY14zWOC0_user']->role != Yii::$app->params['user_role']['superadmin']) {
                                                    $log = array(
                                                        'action' => "Credit table order has been made for the amount of Rs. " . $grand_total . " on the debtor named -" . $debtor->name ,
                                                        'type' => "billing"
                                                    );
                                                    Notify::auditLog($log);
                                                }

                                                echo json_encode(array('status'             => 'true', 
                                                                        'url'               => Yii::$app->params['version'],
                                                                        'order_id'          => $order_id,
                                                                        'key'               => 'occid', 
                                                                        'value'             => $_POST['occupy_id'],
                                                                        'total'             => $grand_total, 
                                                                        'invoice'           => $max_inv, 
                                                                        'date'              => $order->created_on,
                                                                        'customer_name'     => $_POST['customer_name'],
                                                                        'customer_pan'      => $_POST['customer_pan'],
                                                                        'customer_address'  => isset($_POST['customer_address']) ? $_POST['customer_address']: '',
                                                                        'customer_pax'      => $_POST['customer_pax'],
                                                                        'operator_name'     => Yii::$app->session['eHhupx5UpkLZoXRP_cR1ozEVjY14zWOC0_user']->name)); die;
                                            }
                                            if ($_POST['retail_id'] != '') {
                                                $data   = [];
                                                $data1 = Query::queryOneSecure("SELECT o.*, u.name as user_name 
                                                                            FROM `order` AS o
                                                                            LEFT JOIN `user` AS u
                                                                                ON u.id = o.created_by
                                                                            WHERE o.id = :order_id",[':order_id'=>$order_id]);
                                                $data2 = Query::queryAllSecure("SELECT oi.*, m.price, m.name, m.is_discountable, si.name as special_item_name, si.price as special_item_price  
                                                            FROM `order_items` as oi
                                                            LEFT JOIN `menu_item` as m ON m.id = oi.item_id
                                                            LEFT JOIN special_order_items as si ON si.id = oi.item_id
                                                            WHERE oi.order_id = :order_id",[':order_id'=> $order_id]); 
                                                $data['order'] = $data1;
                                                $data['items'] = $data2;
                                                $printer = HPrinter::getPrinters("'bill'");
                                                $this->PrintBill($printer['bill'], $data, 'retail');

                                                $retail = Retail::find()->WHERE(['id' => $_POST['retail_id']])->one();
                                                if($retail != null){
                                                    if($retail->status == 0){
                                                        $retail->status = 1;
                                                    }else{
                                                        $retail->status = 0;
                                                    }
                                                    $retail->update();
                                                }
                                                Query::executeSecure("DELETE FROM temp_items WHERE retail_id = :retail_id",[':retail_id'=>htmlspecialchars($_POST['retail_id'], ENT_QUOTES)]);

                                                Query::executeSecure('UPDATE kot SET kitchen_status = 1 , `status` = CASE
                                                                    WHEN status = '.Yii::$app->params['kot_status']['show'].' THEN 
                                                                        '.Yii::$app->params['kot_status']['hide'].'
                                                                    ELSE '.Yii::$app->params['kot_status']['return'].'
                                                                    END , 
                                                    order_id = '.$order_id.' , retail_id = 0 WHERE retail_id = :retail_id',[':retail_id'=>htmlspecialchars($_POST['retail_id'], ENT_QUOTES)]);

                                                Query::executeSecure('UPDATE `break_down_receipt` SET order_id = '.$order_id.' , retail_id = 0 WHERE retail_id = :retail_id',[':retail_id'=>htmlspecialchars($_POST['retail_id'], ENT_QUOTES)]);
                                                if(Yii::$app->session['eHhupx5UpkLZoXRP_cR1ozEVjY14zWOC0_user']->role != Yii::$app->params['user_role']['superadmin']) {
                                                     $log = array(
                                                        'action' => "Credit retail order has been made for the amount of Rs." . $grand_total . " on the debtor named -" . $debtor->name ,
                                                        'type' => "billing"
                                                    );
                                                    Notify::auditLog($log);
                                                }

                                                echo json_encode(array('status'             => 'true', 
                                                                        'url'               => Yii::$app->params['retail_version'],
                                                                        'order_id'          => $order_id,
                                                                        'key'               => 'tid', 
                                                                        'value'             => $_POST['retail_id'],
                                                                        'total'             => $grand_total, 
                                                                        'invoice'           => $max_inv, 
                                                                        'date'              => $order->created_on,
                                                                        'customer_name'     => $_POST['customer_name'],
                                                                        'customer_pan'      => $_POST['customer_pan'],
                                                                        'customer_address'  => $_POST['customer_address'],
                                                                        'customer_pax'      => $_POST['customer_pax'],
                                                                        'operator_name'     => Yii::$app->session['eHhupx5UpkLZoXRP_cR1ozEVjY14zWOC0_user']->name)); die;
                                            }
                                            if ($_POST['take_away_id'] != '') {
                                                $data   = [];
                                                $data1 = Query::queryOneSecure("SELECT o.*, u.name as user_name 
                                                                            FROM `order` AS o
                                                                            LEFT JOIN `user` AS u
                                                                                ON u.id = o.created_by
                                                                            WHERE o.id = :order_id",[':order_id'=>$order_id]);
                                                $data2 = Query::queryAllSecure("SELECT oi.*, m.price, m.name, m.is_discountable, si.name as special_item_name, si.price as special_item_price  
                                                            FROM `order_items` as oi
                                                            LEFT JOIN `menu_item` as m ON m.id = oi.item_id
                                                            LEFT JOIN special_order_items as si ON si.id = oi.item_id
                                                            WHERE oi.order_id = :order_id",[':order_id'=>$order_id]); 
                                                $data['order'] = $data1;
                                                $data['items'] = $data2;
                                                $printer = HPrinter::getPrinters("'bill'");
                                                $this->PrintBill($printer['bill'], $data, 'take_away');

                                                $take_away = TakeAway::find()->WHERE(['id' => $_POST['take_away_id']])->one();
                                                if($take_away != null){
                                                    if($take_away->status == 0){
                                                        $take_away->status = 1;
                                                    }else{
                                                        $take_away->status = 0;
                                                    }
                                                    $take_away->update();
                                                }
                                                Query::executeSecure("DELETE FROM temp_items WHERE take_away_id = :take_away_id",[':take_away_id'=>htmlspecialchars($_POST['take_away_id'], ENT_QUOTES)]);

                                                Query::executeSecure('UPDATE kot SET kitchen_status = 1 , `status` = CASE
                                                                    WHEN status = '.Yii::$app->params['kot_status']['show'].' THEN 
                                                                        '.Yii::$app->params['kot_status']['hide'].'
                                                                    ELSE '.Yii::$app->params['kot_status']['return'].'
                                                                    END , 
                                                    order_id = '.$order_id.', take_away_id = 0 WHERE take_away_id = :take_away_id',[':take_away_id'=>htmlspecialchars($_POST['take_away_id'], ENT_QUOTES)]);

                                                Query::executeSecure('UPDATE `break_down_receipt` SET order_id = '.$order_id.' , take_away_id = 0 WHERE take_away_id = :take_away_id',[':take_away_id'=>htmlspecialchars($_POST['take_away_id'], ENT_QUOTES)]);
                                                if(Yii::$app->session['eHhupx5UpkLZoXRP_cR1ozEVjY14zWOC0_user']->role != Yii::$app->params['user_role']['superadmin']) {
                                                     $log = array(
                                                        'action' => "Credit take away order has been made for the amount of Rs." . $grand_total . " on the debtor named -" . $debtor->name ,
                                                        'type' => "billing"
                                                    );
                                                    Notify::auditLog($log);
                                                }

                                                echo json_encode(array('status'             => 'true', 
                                                                        'url'               => Yii::$app->params['take_away_version'],
                                                                        'order_id'          => $order_id,
                                                                        'key'               => 'tid', 
                                                                        'value'             => $_POST['take_away_id'],
                                                                        'total'             => $grand_total, 
                                                                        'invoice'           => $max_inv, 
                                                                        'date'              => $order->created_on,
                                                                        'customer_name'     => $_POST['customer_name'],
                                                                        'customer_pan'      => $_POST['customer_pan'],
                                                                        'customer_address'  => $_POST['customer_address'],
                                                                        'customer_pax'      => $_POST['customer_pax'],
                                                                        'operator_name'     => Yii::$app->session['eHhupx5UpkLZoXRP_cR1ozEVjY14zWOC0_user']->name)); die;
                                            }
                                            if ($_POST['pick_up_id'] != '') {
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
                                                            WHERE oi.order_id = :order_id",[':order_id'=>$order_id]); 
                                                $data['order'] = $data1;
                                                $data['items'] = $data2;
                                                $printer = HPrinter::getPrinters("'bill'");
                                                $this->PrintBill($printer['bill'], $data, 'pick_up');

                                                $pick_up = PickUp::find()->WHERE(['id' => $_POST['pick_up_id']])->one();
                                                if($pick_up != null){
                                                    if($pick_up->status == 0){
                                                        $pick_up->status = 1;
                                                    }else{
                                                        $pick_up->status = 0;
                                                    }
                                                    $pick_up->update();
                                                }
                                                Query::executeSecure("DELETE FROM temp_items WHERE pick_up_id = :pick_up_id",[':pick_up_id'=>htmlspecialchars($_POST['pick_up_id'], ENT_QUOTES)]);

                                                Query::executeSecure('UPDATE kot SET kitchen_status = 1 , `status` = CASE
                                                                    WHEN status = '.Yii::$app->params['kot_status']['show'].' THEN 
                                                                        '.Yii::$app->params['kot_status']['hide'].'
                                                                    ELSE '.Yii::$app->params['kot_status']['return'].'
                                                                    END , 
                                                    order_id = '.$order_id.' , pick_up_id = 0 WHERE pick_up_id = :pick_up_id',[':order_id'=>$order_id,':pick_up_id'=>htmlspecialchars($_POST['pick_up_id'], ENT_QUOTES)]);

                                                Query::executeSecure('UPDATE `break_down_receipt` SET order_id = '.$order_id.' , pick_up_id = 0 WHERE pick_up_id = :pick_up_id',[':pick_up_id'=>htmlspecialchars($_POST['pick_up_id'], ENT_QUOTES)]);
                                                if(Yii::$app->session['eHhupx5UpkLZoXRP_cR1ozEVjY14zWOC0_user']->role != Yii::$app->params['user_role']['superadmin']) {
                                                     $log = array(
                                                        'action' => "Credit pick up order has been made for the amount of Rs." . $grand_total . " on the debtor named -" . $debtor->name ,
                                                        'type' => "billing"
                                                    );
                                                    Notify::auditLog($log);
                                                }

                                                echo json_encode(array('status'             => 'true', 
                                                                        'url'               => Yii::$app->params['pick_up_version'],
                                                                        'order_id'          => $order_id,
                                                                        'key'               => 'tid', 
                                                                        'value'             => $_POST['pick_up_id'],
                                                                        'total'             => $grand_total, 
                                                                        'invoice'           => $max_inv, 
                                                                        'date'              => $order->created_on,
                                                                        'customer_name'     => $_POST['customer_name'],
                                                                        'customer_pan'      => $_POST['customer_pan'],
                                                                        'customer_address'  => $_POST['customer_address'],
                                                                        'customer_pax'      => $_POST['customer_pax'],
                                                                        'operator_name'     => Yii::$app->session['eHhupx5UpkLZoXRP_cR1ozEVjY14zWOC0_user']->name)); die;
                                            }

                                            $delivery_inv = '';
                                            $delivery_charge_amount = 0;
                                            if ($_POST['delivery_id'] != '') {
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
                                                            WHERE oi.order_id = :order_id",[':order_id'=>$order_id]); 
                                                $data['order'] = $data1;
                                                $data['items'] = $data2;
                                                $printer = HPrinter::getPrinters("'bill'");
                                                $this->PrintBill($printer['bill'], $data, 'delivery');

                                                $delivery = Delivery::find()->WHERE(['id' => $_POST['delivery_id']])->one();
                                                if($delivery != null){
                                                    if($delivery->status == 0){
                                                        $delivery->status = 1;
                                                    }else{
                                                        $delivery->status = 0;
                                                    }
                                                    $delivery->update();
                                                }
                                                Query::executeSecure("DELETE FROM temp_items WHERE delivery_id = :delivery_id",[':delivery_id'=>htmlspecialchars($_POST['delivery_id'], ENT_QUOTES)]);

                                                Query::executeSecure('UPDATE kot SET kitchen_status = 1 , `status` = CASE
                                                                    WHEN status = '.Yii::$app->params['kot_status']['show'].' THEN 
                                                                        '.Yii::$app->params['kot_status']['hide'].'
                                                                    ELSE '.Yii::$app->params['kot_status']['return'].'
                                                                    END , 
                                                    order_id = '.$order_id.' , delivery_id = 0 WHERE delivery_id = :delivery_id',[':delivery_id'=>htmlspecialchars($_POST['delivery_id'], ENT_QUOTES)]);

                                                Query::executeSecure('UPDATE `break_down_receipt` SET order_id = '.$order_id.' , delivery_id = 0 WHERE delivery_id = :delivery_id',[':delivery_id'=>htmlspecialchars($_POST['delivery_id'], ENT_QUOTES)]);

                                                if(Yii::$app->session['eHhupx5UpkLZoXRP_cR1ozEVjY14zWOC0_user']->role != Yii::$app->params['user_role']['superadmin']) {
                                                    $log = array(
                                                        'action' => "Credit delivery order has been made for the amount of Rs." . $grand_total . " on the debtor named -" . $debtor->name ,
                                                        'type' => "billing"
                                                    );
                                                    Notify::auditLog($log);
                                                }

                                                if($_POST['delivery_charge_amount'] != null) {

                                                    $temp = explode("-",$order_inv);
                                                    $delivery_inv = $temp[0] . '-' . ($temp[1] + 1);

                                                    $delivery_charge_amount = ($_POST['delivery_charge_amount'] != null) ? $_POST['delivery_charge_amount'] : 0;

                                                    $delivery_charge                         = new Order();
                                                    $delivery_charge->id                     = time();
                                                    $delivery_charge->invoice_no             = $delivery_inv;
                                                    $delivery_charge->customer_name          = ($debtor_name != null) ? ucwords($debtor_name) : 'Credit Customer';
                                                    $delivery_charge->customer_pan           = ($_POST['customer_pan'] != null) ? $_POST['customer_pan'] : '0';
                                                    $delivery_charge->customer_address       = ($_POST['customer_address'] != null) ? $_POST['customer_address'] : '';
                                                    $delivery_charge->customer_pax           = ($_POST['customer_pax'] != null) ? $_POST['customer_pax'] : '0';
                                                    $delivery_charge->table_id               = ($_POST['table_id'] != null) ? $_POST['table_id'] : '0';
                                                    $delivery_charge->floor_id               = ($_POST['floor_id'] != null) ? $_POST['floor_id'] : '0';
                                                    $delivery_charge->sub_total              = $delivery_charge_amount;
                                                    $delivery_charge->total                  = $delivery_charge_amount;
                                                    $delivery_charge->type                   = Yii::$app->params['order_type']['delivery_charge'];
                                                    $delivery_charge->delivery_charge_against_inv = $order_inv;
                                                    $delivery_charge->payment_type           = $_POST['payment_type'];
                                                    $delivery_charge->debtor_id              = $_POST['debtor_id'];
                                                    $delivery_charge->created_on             = date('Y-m-d H:i:s');
                                                    $delivery_charge->created_by             = Yii::$app->session['eHhupx5UpkLZoXRP_cR1ozEVjY14zWOC0_user']->id;

                                                    if( $delivery_charge->save() ) {
                                                        $delivery_charge_id = $delivery_charge->id;

                                                        $data = Query::queryOneSecure("SELECT o.*, u.name as user_name 
                                                                        FROM `order` AS o
                                                                        LEFT JOIN `user` AS u
                                                                            ON u.id = o.created_by
                                                                        WHERE o.id = :id",[':id'=>$delivery_charge_id]);
                                            
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
                                                        $break_down->pick_up_id         = 0;
                                                        $break_down->delivery_id        = 0;
                                                        $break_down->customer_name      = ($_POST['customer_name'] != null) ? ucwords($_POST['customer_name']) : '';
                                                        $break_down->total              = $delivery_charge_amount;
                                                        $break_down->received_amount    = $delivery_charge_amount;
                                                        $break_down->payment_type       = Yii::$app->params['payment_type']['credit'];
                                                        $break_down->type               = Yii::$app->params['break_down_payment_type']['delivery_charge_credit_receipt'];
                                                        $break_down->created_on         = date('Y-m-d H:i:s');
                                                        $break_down->created_by         = Yii::$app->session['eHhupx5UpkLZoXRP_cR1ozEVjY14zWOC0_user']->id;

                                                        $break_down->save();
                                                        
                                                        if(Yii::$app->session['eHhupx5UpkLZoXRP_cR1ozEVjY14zWOC0_user']->role != Yii::$app->params['user_role']['superadmin']) {
                                                            $log = array(
                                                                'action' => "Credit delivery charge has been made for the amount of Rs." . $delivery_charge_amount . " on the debtor named -" . $debtor->name ,
                                                                'type' => "billing"
                                                            );
                                                            Notify::auditLog($log);
                                                        }
                                                    }
                                                }

                                                echo json_encode(array('status'             => 'true', 
                                                                        'url'               => Yii::$app->params['delivery_version'],
                                                                        'order_id'          => $order_id,
                                                                        'key'               => 'did', 
                                                                        'value'             => $_POST['delivery_id'],
                                                                        'total'             => $grand_total, 
                                                                        'invoice'           => $max_inv, 
                                                                        'date'              => $order->created_on,
                                                                        'customer_name'     => $_POST['customer_name'],
                                                                        'customer_pan'      => $_POST['customer_pan'],
                                                                        'customer_address'  => $_POST['customer_address'],
                                                                        'customer_pax'      => $_POST['customer_pax'],
                                                                        'operator_name'     => Yii::$app->session['eHhupx5UpkLZoXRP_cR1ozEVjY14zWOC0_user']->name,
                                                                        'delivery_charge_inv' => $delivery_inv,
                                                                        'delivery_charge_amount' => $delivery_charge_amount)); die;
                                            }
                                        }
                                    }
                                }
                            }
                        }
                    }
                    echo json_encode(false); die;
                }
            }else {
                echo json_encode(FALSE); die;
            }
        }
    }

    public function actionItemWiseCredit() 
    {   
        $latest = Misc::getLatestDate();
        if($latest != '' &&  date('Y-m-d') < $latest['latest_date'] ) { 
            echo json_encode(false); die;
        } else {
            $temp = explode(":",Yii::$app->session['fiscal_year']);
            $starting_fiscal_year_from_date = $temp[0];
            $starting_fiscal_year_to_date   = $temp[1];

            if ((date('Y-m-d') < $starting_fiscal_year_from_date) 
                    || ( date('Y-m-d') > date('Y-m-d', strtotime($starting_fiscal_year_to_date. ' + 11 days'))) )
            {
                echo json_encode(FALSE); die;
            } else {
                if (Yii::$app->request->isAjax && isset($_POST) && $_POST['items'] != '' && $_POST['total'] != 0) {

                    if($_POST['amount_required'] == 0 && $_POST['amount_required'] == null){
                            echo json_encode(array('status' => 'empty_order', 'msg' => 'Cannot make an empty order')); die;
                    }
                    if($_POST['debtor_id'] == null){
                        echo json_encode(array('status' => 'no_debtor', 'msg' => 'Debtor need to be selected')); die;
                    }
                    if($_POST['amount_required'] != 0 && $_POST['amount_required'] != null){
                        $debtor = Debtors::find()->WHERE(['id' => $_POST['debtor_id']])->one();
                        $credit_amount = $debtor->credit_amount + $_POST['amount_required'];
                        $debtor->credit_amount = (isset($_POST['amount_required']) && $_POST['amount_required'] != null) ? $credit_amount : '';
                        if($debtor->update()){
                            $debtor_name = $debtor->name;

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
                                
                                $temp_total     = Misc::round_up($total , 2);
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
                                $break_down->customer_name          = ($debtor_name!= null) ? ucwords($debtor_name) : 'Credit Customer';
                                $break_down->sub_total              = $sub_total;
                                $break_down->service_charge_rate    = $service_charge_rate;
                                $break_down->service_charge_amount  = $service_charge_amount;
                                $break_down->discount_rate          = ($_POST['discount'] != null) ? $_POST['discount'] : 0;
                                $break_down->discount_amount        = ($_POST['discount_amount'] != null) ? $_POST['discount_amount'] : 0;
                                $break_down->total                  = $grand_total;
                                $break_down->round_value            = $round_value;
                                $break_down->received_amount        = 0;
                                $break_down->change_amount          = 0;
                                $break_down->payment_type           = ($_POST['payment_type'] != null) ? $_POST['payment_type'] : 0;
                                $break_down->debtor_id              = ($_POST['debtor_id'] != null) ? $_POST['debtor_id'] : 0;
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

                                    if( $_POST['occupy_id'] != null){
                                        $field = 'occupy_id';
                                        $value = $_POST['occupy_id'];

                                        if(Yii::$app->session['eHhupx5UpkLZoXRP_cR1ozEVjY14zWOC0_user']->role != Yii::$app->params['user_role']['superadmin']) {
                                            $log = array(
                                                'action' => "Credit item wise table order has been made for the amount of Rs. " . $grand_total . " on the debtor named -" . $debtor->name ,
                                                'type' => "billing"
                                            );
                                            Notify::auditLog($log);
                                        }
                                    }
                                    elseif( $_POST['retail_id'] != null){
                                        $field = 'retail_id';
                                        $value = $_POST['retail_id'];

                                        if(Yii::$app->session['eHhupx5UpkLZoXRP_cR1ozEVjY14zWOC0_user']->role != Yii::$app->params['user_role']['superadmin']) {
                                            $log = array(
                                                'action' => "Credit item wise retail order has been made for the amount of Rs. " . $grand_total . " on the debtor named -" . $debtor->name ,
                                                'type' => "billing"
                                            );
                                            Notify::auditLog($log);
                                        }
                                    }
                                    elseif( $_POST['take_away_id'] != null){
                                        $field = 'take_away_id';
                                        $value = $_POST['take_away_id'];

                                        if(Yii::$app->session['eHhupx5UpkLZoXRP_cR1ozEVjY14zWOC0_user']->role != Yii::$app->params['user_role']['superadmin']) {
                                            $log = array(
                                                'action' => "Credit item wise take away order has been made for the amount of Rs. " . $grand_total . " on the debtor named -" . $debtor->name ,
                                                'type' => "billing"
                                            );
                                            Notify::auditLog($log);
                                        }
                                    }
                                    elseif( $_POST['pick_up_id'] != null){
                                        $field = 'pick_up_id';
                                        $value = $_POST['pick_up_id'];

                                        if(Yii::$app->session['eHhupx5UpkLZoXRP_cR1ozEVjY14zWOC0_user']->role != Yii::$app->params['user_role']['superadmin']) {
                                            $log = array(
                                                'action' => "Credit item wise pick up order has been made for the amount of Rs. " . $grand_total . " on the debtor named -" . $debtor->name ,
                                                'type' => "billing"
                                            );
                                            Notify::auditLog($log);
                                        }
                                    }
                                    elseif( $_POST['delivery_id'] != null){
                                        $field = 'delivery_id';
                                        $value = $_POST['delivery_id'];

                                        if(Yii::$app->session['eHhupx5UpkLZoXRP_cR1ozEVjY14zWOC0_user']->role != Yii::$app->params['user_role']['superadmin']) {
                                            $log = array(
                                                'action' => "Credit delivery order has been made for the amount of Rs. " . $grand_total . " on the debtor named -" . $debtor->name ,
                                                'type' => "billing"
                                            );
                                            Notify::auditLog($log);
                                        }
                                    }

                                    $break_down_amount = Query::queryOne('SELECT sum(total) as total , sum(discount_amount) as total_discount FROM `break_down_receipt` WHERE ' . $field . ' = ' . $value);

                                    echo json_encode(true); die;
                                }
                            }
                        }
                    }
                }
                echo json_encode(false); die;
            }
        }
    }

    public function actionEditable() 
    {
        $latest = Misc::getLatestDate();
        if($latest != '' &&  date('Y-m-d') < $latest['latest_date'] ) { 
            echo json_encode(array(
                                'status' => 'error', 
                                'display_value' => $_POST['old_value'],
                                'msg' => 'Sorry! Could not update at this time.'
                                )); die;
        } else {
            $temp = explode(":",Yii::$app->session['fiscal_year']);
            $starting_fiscal_year_from_date = $temp[0];
            $starting_fiscal_year_to_date   = $temp[1];

            if ((date('Y-m-d') < $starting_fiscal_year_from_date) 
                    || ( date('Y-m-d') > date('Y-m-d', strtotime($starting_fiscal_year_to_date. ' + 11 days'))) )
            {
                echo json_encode(array(
                                'status' => 'error', 
                                'display_value' => $_POST['old_value'],
                                'msg' => 'Sorry! Please return to current fiscal year to change data'
                                )); die;
            } else {
                if (Yii::$app->request->isAjax && isset($_POST) && isset($_POST['name']) && $_POST['name'] != null) {
                    if (HDebtor::editableDebtor(htmlspecialchars(trim($_POST['value']), ENT_QUOTES), $_POST['pk'], $_POST['name'])) {
                        echo json_encode(array(
                                        'status' => 'success', 
                                        'display_value' => $_POST['value'], 
                                        'msg' => 'Value has been updated.'
                                        )); die;
                    }
                }
                echo json_encode(array(
                                'status' => 'error', 
                                'display_value' => $_POST['old_value'],
                                'msg' => 'Sorry! Could not update at this time.'
                                )); die;
            }
        }
    }

    public function actionFindCredit()
    {
        if(Yii::$app->request->isAjax && $_POST['debtor_id'] != null){
            $debtor = Query::queryOneSecure("SELECT credit_amount FROM debtors WHERE id = :id",[':id'=>$_POST['debtor_id']]);
            echo json_encode(array('status' => 'true' , 'debtor' => $debtor)); die;
        }
        echo json_encode(false); die;
    }

    public function actionCheckCreditAmount()
    {
        if(Yii::$app->request->isAjax && isset($_POST['debtor_id']) && $_POST['debtor_id'] != null){
            $debtor = Query::queryOneSecure("SELECT credit_amount FROM debtors WHERE id = :id",[':id'=>$_POST['debtor_id']]);
            echo json_encode(array('status' => 'true' , 'debtor' => $debtor)); die;
        }
        echo json_encode(false); die;
    }

    public function actionHistory()
    {
        if(isset($_GET['id'])){
            $condition              = '';
            $order_condition        = '';
            $break_down_condition   = '';
            if (isset($_GET['from']) && $_GET['from'] != '') {
                $condition .= " AND DATE(created_on) >= '".$_GET['from']."'";
                $order_condition .= " AND DATE(o.created_on) >= '".$_GET['from']."'";
                $break_down_condition .= " AND DATE(bd.created_on) >= '".$_GET['from']."'";
                if (isset($_GET['to']) && $_GET['to'] != '') {
                    $condition .= " AND DATE(created_on) <= '".$_GET['to']."'";
                    $order_condition .= " AND DATE(o.created_on) <= '".$_GET['to']."'";
                    $break_down_condition .= " AND DATE(bd.created_on) <= '".$_GET['to']."'";
                }
            }
            else if ((!isset($_GET['from']) || $_GET['from'] != '') && isset($_GET['to']) && $_GET['to'] != '') {
                $condition = " AND DATE(created_on) <= '".$_GET['to']."'";
                $order_condition = " AND DATE(o.created_on) <= '".$_GET['to']."'";
                $break_down_condition = " AND DATE(bd.created_on) <= '".$_GET['to']."'";
            }

            $debtor      = Query::queryOneSecure("SELECT id , name FROM `debtors` WHERE id = :id",[':id'=>htmlspecialchars(trim($_GET['id']), ENT_QUOTES)]);
            $debtor_paid = '';
            if($debtor){
                $debtor_paid = Query::queryAll("SELECT * FROM `break_down_receipt` WHERE debtor_id = " . $_GET['id'] . $condition . " AND is_credit_paid = " . Yii::$app->params['is_credit_paid']['yes']);
            }
            
            $credit_order = Query::queryAll("SELECT o.*, u.name as user_name 
                                            FROM `order` AS o
                                            LEFT JOIN `user` AS u
                                                ON u.id = o.created_by
                                            WHERE o.debtor_id = " . $_GET['id'] . $order_condition. 
                                            " AND o.is_cancel = 0 ORDER BY created_on DESC");

            $credit_break_down = Query::queryAll("SELECT bd.*, u.name as user_name, o.invoice_no as main_invoice
                                            FROM `break_down_receipt` AS bd
                                            LEFT JOIN `user` AS u ON u.id = bd.created_by
                                            LEFT JOIN `order` AS o ON o.id = bd.order_id 
                                            WHERE bd.debtor_id = " . $_GET['id'] . $break_down_condition . 
                                            " AND o.is_cancel = 0 
                                                AND (bd.type = ".Yii::$app->params['break_down_payment_type']['item_wise']."
                                                    OR bd.type = ".Yii::$app->params['break_down_payment_type']['advance'].")" );

            $settings = HSettings::getBasic("'name-in-bill', 'address-in-bill', 'phone-no-in-bill', 'pan-no-in-bill', 'thank-you-note-in-bill', 'service-charge-rate'");
                    
            $service_charge_rate = ($settings['service-charge-rate'] != null && $settings['service-charge-rate-is-active'] != '0') ? $settings['service-charge-rate'] : 0;
            $service_charge_rate_is_active = ($settings['service-charge-rate-is-active'] != null) ? $settings['service-charge-rate-is-active'] : 0;
            $user = User::findOne(Yii::$app->session['eHhupx5UpkLZoXRP_cR1ozEVjY14zWOC0_user']->id);

            return $this->render('history' , array('debtor'             => $debtor,
                                                    'debtor_paid'       => $debtor_paid ,
                                                    'credit_order'      => $credit_order, 
                                                    'credit_break_down' => $credit_break_down,
                                                    'settings'          => $settings , 
                                                    'user_name'         => $user->name));
        }
        throw new HttpException(404, 'Page not found.'); 
    }

    public function actionPayable()
    {
        if(isset($_GET['id'])){
            $temp = explode(":",Yii::$app->session['fiscal_year']);
            $starting_fiscal_year_from_date = $temp[0];
            $starting_fiscal_year_to_date   = $temp[1];

            $old_break_down_payable_detail = BreakDownReceipt::find()
                                        ->select('invoice_no , total, created_on, payment_type, is_payment_return')
                                        ->WHERE(['debtor_id' => $_GET['id'] , 
                                                    'payment_type' => Yii::$app->params['payment_type']['credit'],
                                                    'type' => Yii::$app->params['break_down_payment_type']['item_wise']])
                                        ->orWhere(['debtor_id' => $_GET['id'] , 
                                                    'is_payment_return' => Yii::$app->params['is_payment_return']['yes']])
                                        ->andWhere("DATE(created_on) < '".$starting_fiscal_year_from_date."'")
                                        ->orderBy([
                                                   'invoice_no' => SORT_ASC,
                                                ])
                                        ->all();

            $break_down_payable_detail = BreakDownReceipt::find()
                                        ->select('invoice_no , total, created_on, payment_type, is_payment_return')
                                        ->WHERE(['debtor_id' => $_GET['id'] , 
                                                    'payment_type' => Yii::$app->params['payment_type']['credit'],
                                                    'type' => Yii::$app->params['break_down_payment_type']['item_wise']])
                                        ->orWhere(['debtor_id' => $_GET['id'] , 
                                                    'is_payment_return' => Yii::$app->params['is_payment_return']['yes']])
                                        ->andWhere("DATE(created_on) >= '".$starting_fiscal_year_from_date."' AND DATE(created_on) <= '".$starting_fiscal_year_to_date."'")
                                        ->orderBy([
                                                   'invoice_no' => SORT_ASC,
                                                ])
                                        ->all();

            $old_order_payable_detail       = Order::find()
                                            ->select('invoice_no , payable_total, created_on')
                                            ->WHERE(['debtor_id' => $_GET['id'] , 
                                                        'payment_type' => Yii::$app->params['payment_type']['credit'],
                                                        'is_cancel' => 0])
                                            ->andWhere("DATE(created_on) < '".$starting_fiscal_year_from_date."'")
                                            ->orderBy([
                                                       'invoice_no' => SORT_ASC,
                                                    ])
                                            ->all();

            $order_payable_detail       = Order::find()
                                            ->select('invoice_no , payable_total, created_on')
                                            ->WHERE(['debtor_id' => $_GET['id'] , 
                                                        'payment_type' => Yii::$app->params['payment_type']['credit'],
                                                        'is_cancel' => 0])
                                            ->andWhere("DATE(created_on) >= '".$starting_fiscal_year_from_date."' AND DATE(created_on) <= '".$starting_fiscal_year_to_date."'")
                                            ->orderBy([
                                                       'invoice_no' => SORT_ASC,
                                                    ])
                                            ->all();
            
            $debtor    = Debtors::find()->select('opening_balance')->WHERE(['id' => $_GET['id']])->one();

            $old_total_credit_paid = Query::queryOneSecure("SELECT SUM(total) as total FROM `break_down_receipt`
                                                    WHERE debtor_id = :debtor_id
                                                        AND is_credit_paid = :is_credit_paid 
                                                        AND DATE(created_on) < :starting_fiscal_year_from_date",
                                                        [':debtor_id'=>htmlspecialchars(trim($_GET['id']), ENT_QUOTES),
                                                        ':is_credit_paid'=>Yii::$app->params['is_credit_paid']['yes'],
                                                        ':starting_fiscal_year_from_date'=>$starting_fiscal_year_from_date]);

            $opening_balance = $debtor['opening_balance'];
            if($old_order_payable_detail != null) {
                foreach($old_order_payable_detail as $old_order_payable):
                    $opening_balance = $opening_balance + $old_order_payable['payable_total'];
                endforeach;
            }

            if($old_break_down_payable_detail != null) {
                foreach($old_break_down_payable_detail as $old_break_down_payable):
                    $opening_balance = $opening_balance + $old_break_down_payable['total'];
                endforeach;
            }

            if($old_total_credit_paid != null) {
                $opening_balance = $opening_balance - $old_total_credit_paid['total'];
            }

            /*$total_credit_paid = Query::queryOneSecure('SELECT SUM(total) as total FROM `break_down_receipt`
                                                    WHERE debtor_id = :debtor_id
                                                        AND is_credit_paid = :is_credit_paid 
                                                        AND YEAR(created_on) = :year',
                                                        [':debtor_id'=>htmlspecialchars(trim($_GET['id']), ENT_QUOTES),
                                                        ':is_credit_paid'=>Yii::$app->params['is_credit_paid']['yes'],
                                                        ':year'=>date('Y')]);*/

            $total_credit_paid = Query::queryOneSecure("SELECT SUM(total) as total FROM `break_down_receipt`
                                                    WHERE debtor_id = :debtor_id
                                                        AND is_credit_paid = :is_credit_paid 
                                                        AND DATE(created_on) >= :starting_fiscal_year_from_date
                                                        AND DATE(created_on) <= :starting_fiscal_year_to_date",
                                                        [':debtor_id'=>htmlspecialchars(trim($_GET['id']), ENT_QUOTES),
                                                        ':is_credit_paid'=>Yii::$app->params['is_credit_paid']['yes'],
                                                        ':starting_fiscal_year_from_date'=>$starting_fiscal_year_from_date,
                                                        ':starting_fiscal_year_to_date'=>$starting_fiscal_year_to_date]);

            $settings = HSettings::getBasic("'name-in-bill', 'address-in-bill', 'phone-no-in-bill', 'pan-no-in-bill', 'thank-you-note-in-bill', 'service-charge-rate'");
                        
            $service_charge_rate = ($settings['service-charge-rate'] != null && $settings['service-charge-rate-is-active'] != '0') ? $settings['service-charge-rate'] : 0;
            $service_charge_rate_is_active = ($settings['service-charge-rate-is-active'] != null) ? $settings['service-charge-rate-is-active'] : 0;
            $user = User::findOne(Yii::$app->session['eHhupx5UpkLZoXRP_cR1ozEVjY14zWOC0_user']->id);

            return $this->render('payment' , array('break_down_payable_detail'      => $break_down_payable_detail, 
                                                    'order_payable_detail'          => $order_payable_detail,
                                                    'old_break_down_payable_detail' => $old_break_down_payable_detail, 
                                                    'old_order_payable_detail'      => $old_order_payable_detail,
                                                    'debtor'                        => $debtor,
                                                    'total_credit_paid'             => $total_credit_paid,
                                                    'old_total_credit_paid'         => $old_total_credit_paid,
                                                    'settings'                      => $settings , 
                                                    'user_name'                     => $user->name,
                                                    'opening_balance'               => $opening_balance
                                                ));
        }
        throw new HttpException(404, 'Page not found.');
    }

    public function actionMakePayment()
    {
        $latest = Misc::getLatestDate();
        if($latest != '' &&  date('Y-m-d') < $latest['latest_date'] ) { 
            echo json_encode(false); die;
        } else {
            $temp = explode(":",Yii::$app->session['fiscal_year']);
            $starting_fiscal_year_from_date = $temp[0];
            $starting_fiscal_year_to_date   = $temp[1];
            if ((date('Y-m-d') < $starting_fiscal_year_from_date) 
                    || ( date('Y-m-d') > date('Y-m-d', strtotime($starting_fiscal_year_to_date. ' + 11 days'))) )
            {
                echo json_encode(false); die;
            } else {
                if(Yii::$app->request->isAjax) {

                    $debtor = Debtors::findOne($_POST['debtor_id']);
                    if($debtor) {
                        /*if($debtor->credit_amount > $_POST['payment_amount'] || $debtor->credit_amount = $_POST['payment_amount']) {
                            $debtor->credit_amount  = $debtor->credit_amount - $_POST['payment_amount'];
                        }*/
                        $debtor->paid_amount = $debtor->paid_amount + $_POST['payment_amount'];
                            
                        if($debtor->update()) {
                            $max_inv = 1;
                            $max_invoice = Query::queryOne('SELECT MAX(invoice_no) as max FROM `break_down_receipt`'); 

                            if ($max_invoice['max'] != null) {
                                $max_inv += $max_invoice['max'];
                            }

                            $break_down_receipt                 = new BreakDownReceipt();
                            $break_down_receipt->invoice_no     = $max_inv;
                            $break_down_receipt->total          = $_POST['payment_amount'];
                            $break_down_receipt->debtor_id      = $_POST['debtor_id'];
                            $break_down_receipt->debtor_payment_type = $_POST['debtor_payment_type'];
                            $break_down_receipt->is_credit_paid = Yii::$app->params['is_credit_paid']['yes'];
                            if ($_POST['debtor_payment_type'] == Yii::$app->params['debtor_payment_type']['cheque']) {
                                $break_down_receipt->cheque_no  = ($_POST['cheque_number'] != '') ? $_POST['cheque_number'] : 0;
                            }
                            $break_down_receipt->created_on     = date('Y-m-d H:i:s');
                            $break_down_receipt->created_by     = Yii::$app->session['eHhupx5UpkLZoXRP_cR1ozEVjY14zWOC0_user']->id;
                            if($break_down_receipt->save()) {
                                $break_down_id = $break_down_receipt->id;
                                if(Yii::$app->session['eHhupx5UpkLZoXRP_cR1ozEVjY14zWOC0_user']->role != Yii::$app->params['user_role']['superadmin']) {
                                    $log = array(
                                        'action' => "Debtor named -" . $debtor->name . " paid the amount of Rs. " . $_POST['payment_amount'],
                                        'type' => "debtor"
                                    );
                                    Notify::auditLog($log);
                                }

                                $data = Query::queryOneSecure("SELECT bd.*, d.name as debtor_name, u.name as user_name 
                                                            FROM `break_down_receipt` as bd 
                                                            LEFT JOIN `debtors` as d ON d.id = bd.debtor_id
                                                            LEFT JOIN `user` AS u ON u.id = bd.created_by
                                                            WHERE bd.id = :id",[':id'=>$break_down_id]);
                                $printer = HPrinter::getPrinters("'bill'");
                                $this->PrintReceipt($printer['bill'], $data, 'payment');

                                echo json_encode(array('status' => true,
                                                        'receipt_no'    => $max_inv,
                                                        'debtor_name'   => $debtor->name,
                                                        'amount'   => $_POST['payment_amount'],
                                                        'cheque_no'     => ($_POST['cheque_number'] != '') ? $_POST['cheque_number'] : 0,
                                                        'date'          => $break_down_receipt->created_on)); die;
                            }
                        }
                    }
                }
                echo json_encode(false); die;
            }
        }
    }

    public function actionPaymentReturn()
    {
        $latest = Misc::getLatestDate();
        if($latest != '' &&  date('Y-m-d') < $latest['latest_date'] ) { 
            echo json_encode(false); die;
        } else {
            $temp = explode(":",Yii::$app->session['fiscal_year']);
            $starting_fiscal_year_from_date = $temp[0];
            $starting_fiscal_year_to_date   = $temp[1];
            if ((date('Y-m-d') < $starting_fiscal_year_from_date) 
                    || ( date('Y-m-d') > date('Y-m-d', strtotime($starting_fiscal_year_to_date. ' + 11 days'))) )
            {
                echo json_encode(false); die;
            } else {
                if(Yii::$app->request->isAjax && isset($_POST)) {
                    $debtor = Debtors::findOne($_POST['debtor_id']);
                    if($debtor) {
                        $debtor->return_amount = $debtor->return_amount + $_POST['returned_amount'];
                            
                        if($debtor->update()){
                            $max_inv = 1;
                            $max_invoice = Query::queryOne('SELECT MAX(invoice_no) as max FROM `break_down_receipt`'); 
                            if ($max_invoice['max'] != null) {
                                $max_inv += $max_invoice['max'];
                            }

                            $break_down_receipt                     = new BreakDownReceipt();
                            $break_down_receipt->invoice_no         = $max_inv;
                            $break_down_receipt->total              = $_POST['returned_amount'];
                            $break_down_receipt->debtor_id          = $_POST['debtor_id'];
                            $break_down_receipt->is_payment_return  = Yii::$app->params['is_payment_return']['yes'];
                            $break_down_receipt->created_on         = date('Y-m-d H:i:s');
                            $break_down_receipt->created_by         = Yii::$app->session['eHhupx5UpkLZoXRP_cR1ozEVjY14zWOC0_user']->id;
                            if($break_down_receipt->save()) {
                                $break_down_id = $break_down_receipt->id;
                                if(Yii::$app->session['eHhupx5UpkLZoXRP_cR1ozEVjY14zWOC0_user']->role != Yii::$app->params['user_role']['superadmin']) {
                                    $log = array(
                                        'action' => "Payment returned the amount of Rs. " . $_POST['returned_amount'] . "to debtor named -" . $debtor->name ,
                                        'type' => "debtor"
                                    );
                                    Notify::auditLog($log);
                                }

                                $data = Query::queryOneSecure("SELECT bd.*, d.name as debtor_name, u.name as user_name 
                                                            FROM `break_down_receipt` as bd 
                                                            LEFT JOIN `debtors` as d ON d.id = bd.debtor_id
                                                            LEFT JOIN `user` AS u ON u.id = bd.created_by
                                                            WHERE bd.id = :id",[':id'=>$break_down_id]);
                                $printer = HPrinter::getPrinters("'bill'");
                                $this->PrintReceipt($printer['bill'], $data, 'payment_return');

                                echo json_encode(array('status' => true,
                                                        'receipt_no'        => $max_inv,
                                                        'debtor_name'       => $debtor->name,
                                                        'amount'     => $_POST['returned_amount'],
                                                        'date'              => $break_down_receipt->created_on)); die;
                            }
                        }
                    }
                }
                echo json_encode(false); die;
            }
        }
    }

    public function actionExportDebtorList() 
    {
        $titles = array('Name', 'Pan', 'Phone', 'Address');
        $data = Query::queryAll("SELECT name, pan, phone, address FROM `debtors`");
        if($data) {
            Misc::exportXL($data, $titles);
        }
    }

    public function actionReceipt()
    {
        if(Yii::$app->request->isAjax){  
            $id = $_POST['id'];
            $date = date('Y-m-d H:i:s');   

            $receipt = Query::queryOneSecure("SELECT bd.*, d.name as debtor_name, u.name as user_name 
                                                    FROM `break_down_receipt` as bd 
                                                    LEFT JOIN `debtors` as d ON d.id = bd.debtor_id
                                                    LEFT JOIN `user` AS u ON u.id = bd.created_by
                                                    WHERE bd.id = :id",[':id'=>$id]);
            $printer = HPrinter::getPrinters("'bill'");
            $this->PrintReceipt($printer['bill'], $receipt, 'payment');

            echo json_encode(array('status'     => 'true' ,
                                    'receipt'    => $receipt,
                                    'date'      => $date)); die;
        }
        echo json_encode(false); die;
    }

    public function actionGetOpeningBalance()
    {
        if(Yii::$app->request->isAjax && isset($_POST)) {
            $prev_date = date('Y') - 1;
            $total_payable = Query::queryAll('SELECT debtor_id , SUM(total) as total
                                                FROM `break_down_receipt` 
                                                WHERE payment_type = '. Yii::$app->params['payment_type']['credit'] .
                                                ' AND YEAR(created_on) = ' . $prev_date .
                                                ' GROUP BY debtor_id');

            $total_credit_paid = Query::queryAll('SELECT debtor_id , SUM(total) as total FROM `break_down_receipt` 
                                                WHERE is_credit_paid = ' . Yii::$app->params['is_credit_paid']['yes'] . 
                                                ' AND YEAR(created_on) = ' . $prev_date . 
                                                ' GROUP BY debtor_id');
            foreach ($total_payable as $payable) {
                foreach ($total_credit_paid as $credit_paid) {
                    if($payable['debtor_id'] == $credit_paid['debtor_id']) {
                        $debtor = Debtors::findOne($credit_paid['debtor_id']);
                        $debtor->opening_balance = $debtor->opening_balance + $payable['total'] - $credit_paid['total'];
                        $debtor->update();
                    }
                }
            }
            echo json_encode(true); die;
        }
        echo json_encode(false); die;
    }

    public static function PrintBill($printer, $data, $order_type) 
    {
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

                $from_date  = (date('m-d') <= "07-16") ? (date('Y')-1) : date('Y');
                $to_date    = (date('m-d') >= "07-15") ? (date('Y')+1) : date('Y');

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

    public static function PrintReceipt($printer, $data, $receipt_type) 
    {   
        if($printer != null && $data != null) {
            $handle = printer_open($printer);
            if(!$handle || $handle == NULL)
            {
                return false;
            }
            else
            {
                printer_set_option($handle,PRINTER_ORIENTATION,PRINTER_ORIENTATION_LANDSCAPE);
                printer_set_option($handle,PRINTER_PAPER_FORMAT, PRINTER_FORMAT_CUSTOM);
                printer_set_option($handle,PRINTER_PAPER_WIDTH,80);
                printer_set_option($handle,PRINTER_PAPER_LENGTH,100);
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
                printer_draw_text($handle, "Phone  :".$settings['phone-no-in-bill'], 45, $x);
                $x=$x+20;
                printer_draw_text($handle, "Pan no : ".$settings['pan-no-in-bill'], 45, $x);
                $x=$x+30;

                $from_date  = (date('m-d') <= "07-16") ? (date('Y')-1) : date('Y');
                $to_date    = (date('m-d') >= "07-15") ? (date('Y')+1) : date('Y');

                printer_draw_text($handle, "RECEIPT NO", 7, $x);
                printer_draw_text($handle, ":", 100, $x);
                printer_draw_text($handle, $data['invoice_no'], 110, $x);
                $x=$x+20;

                printer_draw_text($handle, "DATE", 10, $x);
                printer_draw_text($handle, ":", 130, $x);
                printer_draw_text($handle, date('Y-m-d H:i:s'), 140, $x);
                $x=$x+20;

                printer_draw_text($handle, "Customer Name", 7, $x);
                printer_draw_text($handle, ":", 130, $x);
                printer_draw_text($handle, $data['customer_name'], 140, $x);
                $x=$x+20;

                printer_draw_text($handle, "- - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -", 7, $x);
                $x=$x+20;

                $amount_in_word = "Rupees ".Misc::convertNumberToWords($data['total']). " Only";

                $content = '';
                if($receipt_type == 'payment'){
                    $content  .= ' Received with thanks from M/S ';
                }elseif($receipt_type == 'payment_return') {
                    $content  .= ' Payment return to M/S ';
                }
                
                $content .= ucfirst($data['debtor_name']);
                $content .= ' The sum of ';
                $content .= $amount_in_word;
                $content .= " by ";
                if($data['cheque_no'] != '') {
                    $content .= "Cheque bearing No: ".$data['cheque_no'];
                }else{
                    $content .= "Cash/Card ";
                }

                for($i=0; $i <= strlen($content); $i=$i+46) {
                    printer_draw_text($handle, substr($content,$i,46), 10, $x);
                    $x=$x+20; 
                }
                
                printer_draw_text($handle, "Rs. ".$data['total'], 10, $x);  
                $x=$x+20; 
                
                printer_draw_text($handle, "- - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -", 7, $x);
                $x=$x+20;

                printer_draw_text($handle, "Printed BY   : ".$data['user_name'], 7, $x); 
                $x=$x+30;

                printer_draw_text($handle, "Date & Time : ".date('Y-m-d H:i:s'), 7, $x);  
                $x=$x+20;

                printer_draw_text($handle, "* This is a system generated receipt *", 7, $x);  
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
                
                printer_draw_text($handle, $settings['name-in-bill'], 45, $x);
                $x=$x+20;
                printer_draw_text($handle, $settings['address-in-bill'], 45, $x);
                $x=$x+20;
                printer_draw_text($handle, "Phone  :".$settings['phone-no-in-bill'], 45, $x);
                $x=$x+20;
                printer_draw_text($handle, "Pan no : ".$settings['pan-no-in-bill'], 45, $x);
                $x=$x+30;

                printer_draw_text($handle, "Invoice", 60, $x);
                $x=$x+30;

                $from_date  = (date('m-d') <= "07-16") ? (date('Y')-1) : date('Y');
                $to_date    = (date('m-d') >= "07-15") ? (date('Y')+1) : date('Y');

                printer_draw_text($handle, "BILL NO", 7, $x);
                printer_draw_text($handle, ":", 170, $x);
                printer_draw_text($handle, $data['invoice_no'], 180, $x);
                $x=$x+20;
                printer_draw_text($handle, "DATE", 7, $x);
                printer_draw_text($handle, ":", 170, $x);
                printer_draw_text($handle, date('Y-m-d H:i:s'), 180, $x);
                $x=$x+20;
                printer_draw_text($handle, "Customer Name", 7, $x);
                printer_draw_text($handle, ":", 170, $x);
                printer_draw_text($handle, $data['customer_name'], 180, $x);
                $x=$x+20;

                printer_draw_text($handle, "Customer Address", 7, $x);
                printer_draw_text($handle, ":", 170, $x);
                printer_draw_text($handle, $data['customer_address'], 180, $x);
                $x=$x+20;

                printer_draw_text($handle, "Customer Pan No", 7, $x);
                printer_draw_text($handle, ":", 170, $x);
                printer_draw_text($handle, $data['customer_pan'], 180, $x);
                $x=$x+20;

                printer_draw_text($handle, "- - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -", 7, $x); 
                $x=$x+20;
                printer_draw_text($handle, "SN.", 7, $x);
                printer_draw_text($handle, "PARTICULARS", 250, $x);
                printer_draw_text($handle, "Amount", 330, $x);
                $x=$x+20;
                printer_draw_text($handle, "- - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -", 7, $x);
                $x=$x+20;

                printer_draw_text($handle, "1", 7, $x);
                printer_draw_text($handle, "Delivery Charge Amount", 250, $x);
                printer_draw_text($handle, $data['total'], 330, $x);
                $x=$x+20;

                printer_draw_text($handle, "- - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -", 7, $x);
                $x=$x+20;

                printer_draw_text($handle, "Gross Amount", 7, $x);
                printer_draw_text($handle, ":", 250, $x);
                printer_draw_text($handle, "Rs. ".$data['total'], 330, $x);
                $x=$x+20;

                printer_draw_text($handle, "Net Amount", 7, $x);
                printer_draw_text($handle, ":", 250, $x);
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
}