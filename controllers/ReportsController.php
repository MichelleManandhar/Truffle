<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ReportsController
 *
 * @author gaurav maharjan
 */

namespace app\controllers;

use Yii;
use yii\web\Controller;
use yii\web\HttpException;

use app\components\Misc;
use app\components\HelperXml;
use app\components\Query;
use app\components\Pdf;
use app\components\HelperSettings as HSettings;
use app\components\HelperFiles as HFiles;


class ReportsController extends Controller {

    public $to_group = array('admin', 'staff','floor_supervisor');

    public function behaviors() 
    {
        return [];
    }

    public function actions() 
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
        ];
    }

    public function beforeAction($action) 
    {
        if ($action->id == 'error')
            $this->layout = 'error';
        
        $group[] = Yii::$app->params['user_role']['superadmin'];
        if (isset($this->to_group)) {
            foreach($this->to_group as $to):
                $group[] = Yii::$app->params['user_role'][$to];
            endforeach;
        }

        if (Yii::$app->user->isGuest || !in_array(Yii::$app->session['eHhupx5UpkLZoXRP_cR1ozEVjY14zWOC0_user']->role, $group)) {
            throw new HttpException(404, 'Page not found.');
        }

        if(!isset(Yii::$app->session['fiscal_year'])) {
            throw new HttpException(404, 'Page not found.');
        }
        
        return parent::beforeAction($action);
    }

    public function actionPurchaseLedger() 
    {   
        $condition = '';
        $other = '';
        $from = '';
        $to  = '';
        if (isset($_GET['from']) && $_GET['from'] != '') {
            $from = htmlspecialchars($_GET['from'], ENT_QUOTES);
            $condition .= " WHERE DATE(o.created_on) >= '".htmlspecialchars($_GET['from'], ENT_QUOTES)."'";
            if (isset($_GET['to']) && $_GET['to'] != '') {
                $to  = htmlspecialchars($_GET['to'], ENT_QUOTES);
                $condition .= " AND DATE(o.created_on) <= '".htmlspecialchars($_GET['to'], ENT_QUOTES)."'";
            }
        }
        else if ((!isset($_GET['from']) || $_GET['from'] != '') && isset($_GET['to']) && $_GET['to'] != '') {
            $condition .= " WHERE DATE(o.created_on) <= '".htmlspecialchars($_GET['to'], ENT_QUOTES)."'";
        }
        else if (isset($_GET['by'])) {
            if ($_GET['by'] == 'month') {
                $condition .= " WHERE YEAR(o.created_on) = '".date('Y')."' AND MONTH(o.created_on) = '".date('m')."'";
                $other = date('Y-m');
            }
            else if ($_GET['by'] == 'today') {
                $condition .= " WHERE DATE(o.created_on) = '".date('Y-m-d')."'";
                  $other = date('Y-m-d');
            }
            else if ($_GET['by'] == 'year') {
                $temp = explode(":",Yii::$app->session['fiscal_year']);
                $starting_fiscal_year_from_date = $temp[0];
                $starting_fiscal_year_to_date   = $temp[1];
                $condition .= " WHERE (DATE(o.created_on) >= '".$temp[0]."' AND DATE(o.created_on) <= '".$temp[1]."'";
                $other = date('Y');
            }
        }
        
        $data   = '';

        $query = '';

        $xml_file = HFiles::downloadPurchaseLedgerXml($query);
        $txt_file = HFiles::downloadPurchaseLedgerTxt($query,$from,$to,$other);
        $csv_file = HFiles::downloadPurchaseLedgerCSV($query,$from,$to,$other);

        $settings = HSettings::getBasic("'name-in-bill', 'pan-no-in-bill'");

        return $this->render('purchase-ledger', array('data' => $data,
                                            'xml_file' => $xml_file,
                                            'txt_file' => $txt_file,
                                            'csv_file' => $csv_file,
                                            'settings'  => $settings));
    }

    public function actionInvoicePage($invoice='') 
    {   
        throw new HttpException(404, 'Page not found.'); 
        $data = ''; $order = '';
        if ($invoice != null) {
            $order = Query::queryOne("SELECT o.*, u.name as user_name 
                                    FROM `order` AS o
                                    LEFT JOIN `user` AS u
                                        ON u.id = o.created_by
                                    WHERE o.invoice_no = $invoice
                                    AND o.is_cancel = 0");
            if ($order) {
                $id = $order['id'];
                $data = Query::queryAll("SELECT oi.*, mi.name as menu_item
                                        FROM `order_items` AS oi
                                        LEFT JOIN `menu_item` AS mi
                                            ON mi.id = oi.item_id
                                        WHERE oi.order_id = $id"); 

                return $this->render('invoice', array(
                    'order' => $order,
                    'data'  => $data
                ));
            }
        }
        throw new HttpException(404, 'Page not found.'); 
    }

    public function actionInvoice() 
    {   
        $invoice = isset($_POST['invoice']) ? $_POST['invoice'] : null;
        $data = ''; $order = '';
        if ($invoice != null) {

            if($_POST['type'] == 'debtor_invoice'){
                $break_down = Query::queryOne("SELECT bd.*, u.name as user_name 
                                    FROM `break_down_receipt` AS bd
                                    LEFT JOIN `user` AS u
                                        ON u.id = bd.created_by
                                    WHERE bd.invoice_no = $invoice");
                if ($break_down) {
                    $id = $break_down['id'];
                    $data = Query::queryAll("SELECT bi.*, mi.name as menu_item, si.name as special_item_name
                                            FROM `break_down_items` AS bi
                                            LEFT JOIN `menu_item` AS mi
                                                ON mi.id = bi.item_id
                                            LEFT JOIN special_order_items as si ON si.id = bi.item_id
                                            WHERE bi.break_down_receipt_id = $id"); 

                    $break_down_receipt['total'] = 0;
                    echo json_encode(array( 'order' => $break_down, 'break_down' => $break_down_receipt, 'data'  => $data , 'type' => 'break_down')); die;
                }
            }
            elseif($_POST['type'] == 'order_invoice') {
                $order = Query::queryOne("SELECT o.*, u.name as user_name, t.table_name as table_name
                                    FROM `order` AS o
                                    LEFT JOIN `user` AS u
                                        ON u.id = o.created_by
                                    LEFT JOIN `table_details` as t
                                        ON t.id = o.table_id
                                    WHERE o.invoice_no = '".$invoice."'");
                if ($order) {
                    $id = $order['id'];
                    $data = Query::queryAll("SELECT oi.*, m.name as menu_item, si.name as special_item_name 
                                                FROM `order_items` as oi
                                                LEFT JOIN `menu_item` as m ON m.id = oi.item_id
                                                LEFT JOIN special_order_items as si ON si.id = oi.item_id
                                                WHERE oi.order_id = $id");

                    $break_down = Query::queryOne("SELECT SUM(total) as total
                                                    FROM `break_down_receipt`
                                                    WHERE order_id = $id 
                                                    AND id != 
                                                    (SELECT MAX(id) FROM `break_down_receipt`
                                                        WHERE order_id = $id )");
                    if($break_down['total'] == null){
                        $break_down['total'] = 0;
                    }

                    echo json_encode(array( 'order' => $order, 'break_down' => $break_down, 'data'  => $data , 'type' => 'order')); die;
                }
            }
        }
        echo json_encode(false); die;
    }

    public function actionDeliveryChargeInvoice() 
    {   
        $invoice = isset($_POST['invoice']) ? $_POST['invoice'] : null;
        $data = ''; $order = '';
        if ($invoice != null) {
            $order = Query::queryOne("SELECT o.*, u.name as user_name 
                                    FROM `order` AS o
                                    LEFT JOIN `user` AS u
                                        ON u.id = o.created_by
                                    WHERE o.invoice_no = '".$invoice."'");
            if ($order) {
                echo json_encode(array( 'order' => $order )); die;
            }
        }
        echo json_encode(false); die;
    }

    public function actionBreakDownInvoiceDetail() 
    {   
        $invoice = isset($_POST['invoice']) ? $_POST['invoice'] : null;
        if ($invoice != null) {
            $break_down = Query::queryOne("SELECT br.*, u.name as user_name 
                                FROM `break_down_receipt` AS br
                                LEFT JOIN `user` AS u
                                    ON u.id = br.created_by
                                WHERE br.invoice_no = $invoice");
            if ($break_down) {
                $id = $break_down['id'];
                $data = Query::queryAll("SELECT bi.*, mi.name as menu_item, si.name as special_item_name 
                                        FROM `break_down_items` AS bi
                                        LEFT JOIN `menu_item` AS mi
                                            ON mi.id = bi.item_id
                                        LEFT JOIN special_order_items as si ON si.id = bi.item_id
                                        WHERE bi.break_down_receipt_id = $id"); 
                
                echo json_encode(array( 'break_down' => $break_down, 'data'  => $data )); die;
            }
        }
        echo json_encode(false); die;
    }

    public function actionViewPartialPaymentDetail() 
    {   
        if (Yii::$app->request->isAjax && isset($_POST) && $_POST['order_id'] != null) {
            $id = $_POST['order_id'];
            $break_down = Query::queryAll('SELECT bd.*, d.name as debtor_name 
                                            FROM `break_down_receipt` as bd
                                            LEFT JOIN debtors as d ON d.id = bd.debtor_id
                                            WHERE bd.order_id = ' . $id .
                                            ' AND bd.id != (SELECT MAX(id) FROM `break_down_receipt`
                                                            WHERE order_id = ' . $id .' ) ORDER BY invoice_no');

            echo json_encode(array('status'         => true,
                                    'break_down'    => $break_down)); die;
        }
        echo json_encode(false); die;
    }
//Change HEre
    public function actionHistory() 
    {   
        $condition = ' WHERE o.is_cancel = 0';
        if (isset($_GET['from']) && $_GET['from'] != '') {
            $condition .= " AND DATE(o.created_on) >= '".htmlspecialchars($_GET['from'], ENT_QUOTES)."'";
            if (isset($_GET['to']) && $_GET['to'] != '') {
                $condition .= " AND DATE(o.created_on) <= '".htmlspecialchars($_GET['to'], ENT_QUOTES)."'";
            }else{
                $condition .= " AND DATE(o.created_on) <= '". date('Y-m-d', strtotime('-30 days'))."'";
            }
        }
        else if ((!isset($_GET['from']) || $_GET['from'] != '') && isset($_GET['to']) && $_GET['to'] != '') {
            $condition .= " AND DATE(o.created_on) <= '".htmlspecialchars($_GET['to'], ENT_QUOTES)."'";
        }
        else if (isset($_GET['by'])) {
            if ($_GET['by'] == 'week') {
                $condition .= " AND WEEK(o.created_on) = WEEK( current_date )";
            }
            elseif ($_GET['by'] == 'month') {
                $condition .= " AND YEAR(o.created_on) = '".date('Y')."' AND MONTH(o.created_on) = '".date('m')."'";
            }
            else if ($_GET['by'] == 'today') {
                $condition .= " AND DATE(o.created_on) = '".date('Y-m-d')."'";
            }
            else if ($_GET['by'] == 'year') {
                $temp = explode(":",Yii::$app->session['fiscal_year']);
                $starting_fiscal_year_from_date = $temp[0];
                $starting_fiscal_year_to_date   = $temp[1];
                $condition .= " AND (DATE(o.created_on) >= '".$temp[0]."' AND DATE(o.created_on) <= '".$temp[1]."')";
            }
        }

        if(isset($_GET['client']) && $_GET['client'] != ''){
            $client = Query::queryOne("SELECT * FROM customer WHERE slug = '".$_GET['client']."'");
            if($client){
                $condition .= " AND o.customer_phone = '".$client['phone']."'";

            }

        }

        $settings = HSettings::getBasic("'name-in-bill', 'address-in-bill', 'phone-no-in-bill', 'pan-no-in-bill', 'thank-you-note-in-bill', 'service-charge-rate'");
        

        $service_charge_rate = ($settings['service-charge-rate'] != null && $settings['service-charge-rate-is-active'] != '0') ? $settings['service-charge-rate'] : 0;
        $service_charge_rate_is_active = ($settings['service-charge-rate-is-active'] != null) ? $settings['service-charge-rate-is-active'] : 0;
        
        $data = Query::queryAll("SELECT o.*, oc.start_date, oc.start_time, oc.end_date, oc.end_time , u.name as user_name 
                                FROM `order` AS o
                                LEFT JOIN `user` AS u
                                    ON u.id = o.created_by
                                LEFT JOIN `occupy` as oc
                                    ON oc.id = o.occupy_id
                                $condition ORDER BY created_on DESC");
        $new_data = '';
        $new_duplicate = [];
        if($data != null) {
            foreach ($data as $row) {
                $id[] = $row['id'];
            }
            $ids = implode(',', $id);

            $duplicate = Query::queryAll("SELECT d.* , u.name as user_name 
                                            FROM `duplicate_bill` as d
                                            LEFT JOIN `user` AS u
                                                ON u.id = d.created_by
                                            WHERE d.order_id IN (" . $ids . ")" );

            foreach ($duplicate as $row) {
                $new_duplicate[$row['order_id']][] = $row;
            }
            
            $break_down = Query::queryAll("SELECT order_id, total, payment_type FROM `break_down_receipt` WHERE order_id IN (" . $ids . ")");

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
  
        $client=Query::queryAll("SELECT *  FROM `customer`");

        return $this->render('history', array('data'                        => $new_data,
                                            'duplicate'                     => $new_duplicate,
                                            'settings'                      => $settings,
                                            'service_charge_rate'           => $service_charge_rate,
                                            'service_charge_rate_is_active' => $service_charge_rate_is_active,
                                            'client'                        => $client
                                            ));
    }

    public function actionCancelledHistory() 
    {   
        $condition = ' WHERE o.is_cancel = 1 AND o.cancel_no != 0';
        if (isset($_GET['from']) && $_GET['from'] != '') {
            $condition .= " AND DATE(o.created_on) >= '".htmlspecialchars($_GET['from'], ENT_QUOTES)."'";
            if (isset($_GET['to']) && $_GET['to'] != '') {
                $condition .= " AND DATE(o.created_on) <= '".htmlspecialchars($_GET['to'], ENT_QUOTES)."'";
            }else{
                $condition .= " AND DATE(o.created_on) <= '". date('Y-m-d', strtotime('-30 days'))."'";
            }
        }
        else if ((!isset($_GET['from']) || $_GET['from'] != '') && isset($_GET['to']) && $_GET['to'] != '') {
            $condition .= " AND DATE(o.created_on) <= '".htmlspecialchars($_GET['to'], ENT_QUOTES)."'";
        }
        else if (isset($_GET['by'])) {
            if ($_GET['by'] == 'week') {
                $condition .= " AND WEEK(o.created_on) = WEEK( current_date )";
            }
            elseif ($_GET['by'] == 'month') {
                $condition .= " AND YEAR(o.created_on) = '".date('Y')."' AND MONTH(o.created_on) = '".date('m')."'";
            }
            else if ($_GET['by'] == 'today') {
                $condition .= " AND DATE(o.created_on) = '".date('Y-m-d')."'";
            }
            else if ($_GET['by'] == 'year') {
                $temp = explode(":",Yii::$app->session['fiscal_year']);
                $starting_fiscal_year_from_date = $temp[0];
                $starting_fiscal_year_to_date   = $temp[1];
                $condition .= " AND (DATE(o.created_on) >= '".$temp[0]."' AND DATE(o.created_on) <= '".$temp[1]."')";
            }
        }

        $settings = HSettings::getBasic("'name-in-bill', 'address-in-bill', 'phone-no-in-bill', 'pan-no-in-bill', 'thank-you-note-in-bill', 'service-charge-rate'");

        $service_charge_rate = ($settings['service-charge-rate'] != null && $settings['service-charge-rate-is-active'] != '0') ? $settings['service-charge-rate'] : 0;
        $service_charge_rate_is_active = ($settings['service-charge-rate-is-active'] != null) ? $settings['service-charge-rate-is-active'] : 0;
        
        $data = Query::queryAll("SELECT o.*, oc.start_date, oc.start_time, oc.end_date, oc.end_time , u.name as user_name 
                                FROM `order` AS o
                                LEFT JOIN `user` AS u
                                    ON u.id = o.created_by
                                LEFT JOIN `occupy` as oc
                                    ON oc.id = o.occupy_id
                                $condition ORDER BY created_on DESC");
        $new_data = '';
        if($data != null) {
            foreach ($data as $row) {
                $id[] = $row['id'];
            }
            $ids = implode(',', $id);

            $break_down = Query::queryAll("SELECT order_id, total, payment_type FROM `break_down_receipt` WHERE order_id IN (" . $ids . ")");

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

        return $this->render('cancelled-history', array('data'                          => $new_data,
                                                        'settings'                      => $settings,
                                                        'service_charge_rate'           => $service_charge_rate,
                                                        'service_charge_rate_is_active' => $service_charge_rate_is_active
                                                        ));
    }

    public function actionCategorySummary()
    {
        $condition = ' WHERE o.is_cancel = 0';
        if (isset($_GET['from']) && $_GET['from'] != '') {
            $condition .= " AND DATE(o.created_on) >= '".htmlspecialchars($_GET['from'], ENT_QUOTES)."'";
            if (isset($_GET['to']) && $_GET['to'] != '') {
                $condition .= " AND DATE(o.created_on) <= '".htmlspecialchars($_GET['to'], ENT_QUOTES)."'";
            }
        }
        else if ((!isset($_GET['from']) || $_GET['from'] != '') && isset($_GET['to']) && $_GET['to'] != '') {
            $condition .= " AND DATE(o.created_on) <= '".htmlspecialchars($_GET['to'], ENT_QUOTES)."'";
        }
        else if (isset($_GET['by'])) {
            if ($_GET['by'] == 'month') {
                $condition .= " AND YEAR(o.created_on) = '".date('Y')."' AND MONTH(o.created_on) = '".date('m')."'";
            }
            else if ($_GET['by'] == 'today') {
                $condition .= " AND DATE(o.created_on) = '".date('Y-m-d')."'";
            }
            else if ($_GET['by'] == 'year') {
                $temp = explode(":",Yii::$app->session['fiscal_year']);
                $starting_fiscal_year_from_date = $temp[0];
                $starting_fiscal_year_to_date   = $temp[1];
                $condition .= " AND (DATE(o.created_on) >= '".$temp[0]."' AND DATE(o.created_on) <= '".$temp[1]."')";
            }
        }
        $categories =Query::queryAll("SELECT id, category FROM `menu_category`");

        $data = Query::queryAll("SELECT oi.*, mi.category_id, mi.name, mi.id as mid, si.name as special_item_name, si.id as special_item_id, si.category_id as special_item_category_id
                                    FROM `order` AS o
                                    LEFT JOIN `order_items` AS oi
                                        ON oi.order_id =o.id
                                    LEFT JOIN `menu_item` AS mi
                                        ON mi.id=oi.item_id
                                    LEFT JOIN special_order_items as si 
                                        ON si.id = oi.item_id
                                    $condition ORDER BY o.created_on DESC");

        $cate_data='';
        $regular = Yii::$app->params['item_type']['regular'];
        $special = Yii::$app->params['item_type']['special'];
        if ($data !=null){
            foreach($data as $dat){
                if($dat['type'] == $regular) {
                    $qty    = $dat['quantity'];
                    $total  = $qty * $dat['price'];

                    if (isset($cate_data[$dat['category_id']][$regular][$dat['mid']]) && $cate_data[$dat['category_id']][$regular][$dat['mid']] != null) {
                        $qty += $cate_data[$dat['category_id']][$regular][$dat['mid']]['quantity'];
                        $total += $cate_data[$dat['category_id']][$regular][$dat['mid']]['total'];
                    }
                    $cate_data[$dat['category_id']][$regular][$dat['mid']] = ['quantity' => $qty, 'total' => $total, 'name' => $dat['name']];
                }
                else {
                    $qty    = $dat['quantity'];
                    $total  = $qty * $dat['price'];

                    if (isset($cate_data[$dat['special_item_category_id']][$special]) && $cate_data[$dat['special_item_category_id']][$special] != null) {
                        $qty += $cate_data[$dat['special_item_category_id']][$special]['quantity'];
                        $total += $cate_data[$dat['special_item_category_id']][$special]['total'];
                    }
                    $cate_data[$dat['special_item_category_id']][$special] = ['quantity' => $qty, 'total' => $total, 'name' => $dat['special_item_name']];
                }
                
            }
        }

        return $this->render('category_sum', array('data' => $data,'categories'=>$categories, 'cate_data'=>$cate_data));
    }

    public function actionFocHistory() 
    {
        $condition = '';
        if (isset($_GET['from']) && $_GET['from'] != '') {
            $condition .= " WHERE DATE(f.created_on) >= '".htmlspecialchars($_GET['from'], ENT_QUOTES)."'";
            if (isset($_GET['to']) && $_GET['to'] != '') {
                $condition .= " AND DATE(f.created_on) <= '".htmlspecialchars($_GET['to'], ENT_QUOTES)."'";
            }else{
                $condition .= " AND DATE(f.created_on) <= '". date('Y-m-d', strtotime('-30 days'))."'";
            }
        }
        else if ((!isset($_GET['from']) || $_GET['from'] != '') && isset($_GET['to']) && $_GET['to'] != '') {
            $condition .= " WHERE DATE(f.created_on) <= '".htmlspecialchars($_GET['to'], ENT_QUOTES)."'";
        }
        else if (isset($_GET['by'])) {
            if ($_GET['by'] == 'week') {
                $condition .= " WHERE WEEK(f.created_on) = WEEK( current_date )";
            }
            elseif ($_GET['by'] == 'month') {
                $condition .= " WHERE YEAR(f.created_on) = '".date('Y')."' AND MONTH(f.created_on) = '".date('m')."'";
            }
            else if ($_GET['by'] == 'today') {
                $condition .= " WHERE DATE(f.created_on) = '".date('Y-m-d')."'";
            }
            else if ($_GET['by'] == 'year') {
                $temp = explode(":",Yii::$app->session['fiscal_year']);
                $starting_fiscal_year_from_date = $temp[0];
                $starting_fiscal_year_to_date   = $temp[1];
                $condition .= " WHERE DATE(o.created_on) >= '".$temp[0]."' AND DATE(o.created_on) <= '".$temp[1]."'";
            }
        }
        else {
            $condition = "";
        }
        
        $data = Query::queryAll("SELECT f.*, u.name as user_name 
                                FROM `foc` AS f
                                LEFT JOIN `user` AS u
                                    ON u.id = f.created_by
                                $condition ORDER BY created_on DESC");

        return $this->render('foc_history', array('data' => $data ));
    }

    public function actionFocDetail() 
    {   
        $foc = isset($_POST['foc']) ? $_POST['foc'] : null;
        $data = ''; $order = '';
        if ($foc != null) {
            $foc = Query::queryOne("SELECT f.*, u.name as user_name 
                                FROM `foc` AS f
                                LEFT JOIN `user` AS u
                                    ON u.id = f.created_by
                                WHERE f.foc_no = $foc");
            if ($foc) {
                $id = $foc['id'];
                $data = Query::queryAll("SELECT fi.*, mi.name as menu_item, si.name as special_item_name 
                                        FROM `foc_items` AS fi
                                        LEFT JOIN `menu_item` AS mi
                                            ON mi.id = fi.item_id
                                        LEFT JOIN special_order_items as si 
                                            ON si.id = fi.item_id
                                        WHERE fi.foc_id = $id"); 
                echo json_encode(array( 'foc' => $foc, 'data'  => $data )); die;
            }
        }
        echo json_encode(false); die;
    }

    public function actionKotReturn()
    {
        $condition = ' WHERE o.is_cancel = 0';
        $common_condition = '';
        if (isset($_GET['from']) && $_GET['from'] != '') {
            $common_condition .= " DATE(o.created_on) >= '".htmlspecialchars($_GET['from'], ENT_QUOTES)."'";
            if (isset($_GET['to']) && $_GET['to'] != '') {
                $common_condition .= " AND DATE(o.created_on) <= '".htmlspecialchars($_GET['to'], ENT_QUOTES)."'";
            }else{
                $common_condition .= " AND DATE(o.created_on) <= '". date('Y-m-d', strtotime('-30 days'))."'";
            }
        }
        else if ((!isset($_GET['from']) || $_GET['from'] != '') && isset($_GET['to']) && $_GET['to'] != '') {
            $common_condition .= " DATE(o.created_on) <= '".htmlspecialchars($_GET['to'], ENT_QUOTES)."'";
        }
        else if (isset($_GET['by'])) {
            if ($_GET['by'] == 'week') {
                $common_condition .= " WEEK(o.created_on) = WEEK( current_date )";
            }
            elseif ($_GET['by'] == 'month') {
                $common_condition .= " YEAR(o.created_on) = '".date('Y')."' AND MONTH(o.created_on) = '".date('m')."'";
            }
            else if ($_GET['by'] == 'today') {
                $common_condition .= " DATE(o.created_on) = '".date('Y-m-d')."'";
            }
            else if ($_GET['by'] == 'year') {
                $temp = explode(":",Yii::$app->session['fiscal_year']);
                $starting_fiscal_year_from_date = $temp[0];
                $starting_fiscal_year_to_date   = $temp[1];
                $common_condition .= " (DATE(o.created_on) >= '".$temp[0]."' AND DATE(o.created_on) <= '".$temp[1]."')";
            }
        }

        $settings = HSettings::getBasic("'name-in-bill', 'address-in-bill', 'phone-no-in-bill', 'pan-no-in-bill', 'thank-you-note-in-bill', 'service-charge-rate', 'take-away-service-charge-rate', 'delivery-service-charge-rate', 'pick-up-service-charge-rate', 'retail-service-charge-rate'");

        $service_charge_rate = ($settings['service-charge-rate'] != null && $settings['service-charge-rate-is-active'] != '0') ? $settings['service-charge-rate'] : 0;
        $service_charge_rate_is_active = ($settings['service-charge-rate-is-active'] != null) ? $settings['service-charge-rate-is-active'] : 0;

        $take_away_service_charge_rate = ($settings['take-away-service-charge-rate'] != null && $settings['take-away-service-charge-rate-is-active'] != '0') ? $settings['take-away-service-charge-rate'] : 0;
        $take_away_service_charge_rate_is_active = ($settings['take-away-service-charge-rate-is-active'] != null) ? $settings['take-away-service-charge-rate-is-active'] : 0;

        $delivery_service_charge_rate = ($settings['delivery-service-charge-rate'] != null && $settings['delivery-service-charge-rate-is-active'] != '0') ? $settings['delivery-service-charge-rate'] : 0;
        $delivery_service_charge_rate_is_active = ($settings['delivery-service-charge-rate-is-active'] != null) ? $settings['delivery-service-charge-rate-is-active'] : 0;

        $pick_up_service_charge_rate = ($settings['pick-up-service-charge-rate'] != null && $settings['pick-up-service-charge-rate-is-active'] != '0') ? $settings['pick-up-service-charge-rate'] : 0;
        $pick_up_service_charge_rate_is_active = ($settings['pick-up-service-charge-rate-is-active'] != null) ? $settings['pick-up-service-charge-rate-is-active'] : 0;

        $retail_service_charge_rate = ($settings['retail-service-charge-rate'] != null && $settings['retail-service-charge-rate-is-active'] != '0') ? $settings['retail-service-charge-rate'] : 0;
        $retail_service_charge_rate_is_active = ($settings['retail-service-charge-rate-is-active'] != null) ? $settings['retail-service-charge-rate-is-active'] : 0;
        
        $data = Query::queryAll("SELECT DISTINCT(o.id), o.*, oc.start_date, oc.start_time, oc.end_date, oc.end_time , u.name as user_name 
                                FROM `order` AS o
                                LEFT JOIN `user` AS u
                                    ON u.id = o.created_by
                                LEFT JOIN `occupy` as oc
                                    ON oc.id = o.occupy_id
                                JOIN `kot` as k 
                                    ON k.order_id = o.id
                                        AND k.status = ".Yii::$app->params['kot_status']['return']." 
                                $condition AND $common_condition ORDER BY created_on DESC");

        /*occupy data*/
            $occupy_data = Query::queryAll("SELECT o.*, u.name as user_name
                                    FROM `occupy` AS o
                                    LEFT JOIN `user` AS u
                                        ON u.id = o.created_by
                                    JOIN `kot` as k 
                                        ON k.occupy_id = o.id
                                            AND k.status = ".Yii::$app->params['kot_status']['return']."
                                    WHERE $common_condition 
                                    GROUP BY o.id
                                    ORDER BY created_on DESC");
            $occupy_data_detail = '';
            if($occupy_data) {
                $occupy_data = array_column($occupy_data, null, 'id');
                $occupy_id = array_column($occupy_data, 'id');
                $occupy_ids = implode(',', $occupy_id);

                $occupy_data_detail = Query::queryAll("SELECT o.id, SUM(ki.price*ki.quantity) as sub_total
                                        FROM `occupy` AS o
                                        LEFT JOIN `user` AS u
                                            ON u.id = o.created_by
                                        JOIN `kot` as k 
                                            ON k.occupy_id = o.id
                                                AND k.status != ".Yii::$app->params['kot_status']['return']."
                                        JOIN `kot_items` as ki 
                                            ON ki.kot_id = k.id 
                                        WHERE $common_condition 
                                            AND o.id IN (".$occupy_ids.")
                                        GROUP BY o.id");

                $occupy_data_detail = array_column($occupy_data_detail, null, 'id');
            }
        /*occupy data*/

        /*take-away data*/
            $take_away_data = Query::queryAll("SELECT o.*, u.name as user_name
                                    FROM `take_away` AS o
                                    LEFT JOIN `user` AS u
                                        ON u.id = o.created_by
                                    JOIN `kot` as k 
                                        ON k.take_away_id = o.id
                                            AND k.status = ".Yii::$app->params['kot_status']['return']."
                                    WHERE $common_condition 
                                    GROUP BY o.id
                                    ORDER BY created_on DESC");

            $take_away_data_detail = '';
            if($take_away_data) {
                $take_away_data = array_column($take_away_data, null, 'id');
                $take_away_id = array_column($take_away_data, 'id');
                $take_away_ids = implode(',', $take_away_id);

                $take_away_data_detail = Query::queryAll("SELECT o.id, SUM(ki.price*ki.quantity) as sub_total
                                        FROM `take_away` AS o
                                        LEFT JOIN `user` AS u
                                            ON u.id = o.created_by
                                        JOIN `kot` as k 
                                            ON k.take_away_id = o.id
                                                AND k.status != ".Yii::$app->params['kot_status']['return']."
                                        JOIN `kot_items` as ki 
                                            ON ki.kot_id = k.id 
                                        WHERE $common_condition 
                                            AND o.id IN (".$take_away_ids.")
                                        GROUP BY o.id");

                $take_away_data_detail = array_column($take_away_data_detail, null, 'id');
            }
        /*take-away data*/

        /*pick-up data*/
            $pick_up_data = Query::queryAll("SELECT o.*, u.name as user_name
                                    FROM `pick_up` AS o
                                    LEFT JOIN `user` AS u
                                        ON u.id = o.created_by
                                    JOIN `kot` as k 
                                        ON k.pick_up_id = o.id
                                            AND k.status = ".Yii::$app->params['kot_status']['return']."
                                    WHERE $common_condition 
                                    GROUP BY o.id
                                    ORDER BY created_on DESC");

            $pick_up_data_detail = '';
            if($pick_up_data) {
                $pick_up_data = array_column($pick_up_data, null, 'id');
                $pick_up_id = array_column($pick_up_data, 'id');
                $pick_up_ids = implode(',', $pick_up_id);

                $pick_up_data_detail = Query::queryAll("SELECT o.id, SUM(ki.price*ki.quantity) as sub_total
                                        FROM `pick_up` AS o
                                        LEFT JOIN `user` AS u
                                            ON u.id = o.created_by
                                        JOIN `kot` as k 
                                            ON k.pick_up_id = o.id
                                                AND k.status != ".Yii::$app->params['kot_status']['return']."
                                        JOIN `kot_items` as ki 
                                            ON ki.kot_id = k.id 
                                        WHERE $common_condition 
                                            AND o.id IN (".$pick_up_ids.")
                                        GROUP BY o.id");

                $pick_up_data_detail = array_column($pick_up_data_detail, null, 'id');
            }
        /*pick-up data*/

        /*retail data*/
            $retail_data = Query::queryAll("SELECT o.*, u.name as user_name
                                    FROM `retail` AS o
                                    LEFT JOIN `user` AS u
                                        ON u.id = o.created_by
                                    JOIN `kot` as k 
                                        ON k.retail_id = o.id
                                            AND k.status = ".Yii::$app->params['kot_status']['return']."
                                    WHERE $common_condition 
                                    GROUP BY o.id
                                    ORDER BY created_on DESC");

            $retail_data_detail = '';
            if($retail_data) {
                $retail_data = array_column($retail_data, null, 'id');
                $retail_id = array_column($retail_data, 'id');
                $retail_ids = implode(',', $retail_id);

                $retail_data_detail = Query::queryAll("SELECT o.id, SUM(ki.price*ki.quantity) as sub_total
                                        FROM `retail` AS o
                                        LEFT JOIN `user` AS u
                                            ON u.id = o.created_by
                                        JOIN `kot` as k 
                                            ON k.retail_id = o.id
                                                AND k.status != ".Yii::$app->params['kot_status']['return']."
                                        JOIN `kot_items` as ki 
                                            ON ki.kot_id = k.id 
                                        WHERE $common_condition 
                                            AND o.id IN (".$retail_ids.")
                                        GROUP BY o.id");

                $retail_data_detail = array_column($retail_data_detail, null, 'id');
            }
        /*retail data*/

        /*delivery data*/
            $delivery_data = Query::queryAll("SELECT o.*, u.name as user_name
                                    FROM `delivery` AS o
                                    LEFT JOIN `user` AS u
                                        ON u.id = o.created_by
                                    JOIN `kot` as k 
                                        ON k.delivery_id = o.id
                                            AND k.status = ".Yii::$app->params['kot_status']['return']."
                                    WHERE $common_condition 
                                    GROUP BY o.id
                                    ORDER BY created_on DESC");

            $delivery_data_detail = '';
            if($delivery_data) {
                $delivery_data = array_column($delivery_data, null, 'id');
                $delivery_id = array_column($delivery_data, 'id');
                $delivery_ids = implode(',', $delivery_id);

                $delivery_data_detail = Query::queryAll("SELECT o.id, SUM(ki.price*ki.quantity) as sub_total
                                        FROM `delivery` AS o
                                        LEFT JOIN `user` AS u
                                            ON u.id = o.created_by
                                        JOIN `kot` as k 
                                            ON k.delivery_id = o.id
                                                AND k.status != ".Yii::$app->params['kot_status']['return']."
                                        JOIN `kot_items` as ki 
                                            ON ki.kot_id = k.id 
                                        WHERE $common_condition 
                                            AND o.id IN (".$delivery_ids.")
                                        GROUP BY o.id");

                $delivery_data_detail = array_column($delivery_data_detail, null, 'id');
            }
        /*delivery data*/

        $new_data = '';
        if($data != null) {
            $id = array_column($data, 'id');
            $ids = implode(',', $id);

            $break_down = Query::queryAll("SELECT order_id, total, payment_type FROM `break_down_receipt` WHERE order_id IN (" . $ids . ")");

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

        $new_occupy_data = '';
        if($occupy_data != null) {
            foreach ($occupy_data as $row) {
                $new_occupy_data[$row['id']] = $row;

                $service_charge_amount = 0;
                $total = $occupy_data_detail[$row['id']]['sub_total'];
                if($service_charge_rate_is_active != 0){
                    $service_charge_amount = ( $service_charge_rate * $total ) / 100; 
                    $total = $total + $service_charge_amount;
                }

                $new_occupy_data[$row['id']]['sub_total'] = $occupy_data_detail[$row['id']]['sub_total'];
                $new_occupy_data[$row['id']]['service_charge_rate'] = $service_charge_rate;
                $new_occupy_data[$row['id']]['service_charge_amount'] = $service_charge_amount;
                $new_occupy_data[$row['id']]['total'] = $total;
            }
        } 

        $new_take_away_data = '';
        if($take_away_data != null) {
            foreach ($take_away_data as $row) {
                $new_take_away_data[$row['id']] = $row;

                $service_charge_amount = 0;
                $total = $take_away_data_detail[$row['id']]['sub_total'];
                if($service_charge_rate_is_active != 0){
                    $service_charge_amount = ( $service_charge_rate * $total ) / 100; 
                    $total = $total + $service_charge_amount;
                }

                $new_take_away_data[$row['id']]['sub_total'] = $take_away_data_detail[$row['id']]['sub_total'];
                $new_take_away_data[$row['id']]['service_charge_rate'] = $service_charge_rate;
                $new_take_away_data[$row['id']]['service_charge_amount'] = $service_charge_amount;
                $new_take_away_data[$row['id']]['total'] = $total;
            }
        } 

        $new_pick_up_data = '';
        if($pick_up_data != null) {
            foreach ($pick_up_data as $row) {
                $new_pick_up_data[$row['id']] = $row;

                $service_charge_amount = 0;
                $total = $pick_up_data_detail[$row['id']]['sub_total'];
                if($service_charge_rate_is_active != 0){
                    $service_charge_amount = ( $service_charge_rate * $total ) / 100; 
                    $total = $total + $service_charge_amount;
                }

                $new_pick_up_data[$row['id']]['sub_total'] = $pick_up_data_detail[$row['id']]['sub_total'];
                $new_pick_up_data[$row['id']]['service_charge_rate'] = $service_charge_rate;
                $new_pick_up_data[$row['id']]['service_charge_amount'] = $service_charge_amount;
                $new_pick_up_data[$row['id']]['total'] = $total;
            }
        } 

        $new_retail_data = '';
        if($retail_data != null) {
            foreach ($retail_data as $row) {
                $new_retail_data[$row['id']] = $row;

                $service_charge_amount = 0;
                $total = $retail_data_detail[$row['id']]['sub_total'];
                if($service_charge_rate_is_active != 0){
                    $service_charge_amount = ( $service_charge_rate * $total ) / 100; 
                    $total = $total + $service_charge_amount;
                }

                $new_retail_data[$row['id']]['sub_total'] = $retail_data_detail[$row['id']]['sub_total'];
                $new_retail_data[$row['id']]['service_charge_rate'] = $service_charge_rate;
                $new_retail_data[$row['id']]['service_charge_amount'] = $service_charge_amount;
                $new_retail_data[$row['id']]['total'] = $total;
            }
        } 

        $new_delivery_data = '';
        if($delivery_data != null) {
            foreach ($delivery_data as $row) {
                $new_delivery_data[$row['id']] = $row;

                $service_charge_amount = 0;
                $total = $delivery_data_detail[$row['id']]['sub_total'];
                if($service_charge_rate_is_active != 0){
                    $service_charge_amount = ( $service_charge_rate * $total ) / 100; 
                    $total = $total + $service_charge_amount;
                }

                $new_delivery_data[$row['id']]['sub_total'] = $delivery_data_detail[$row['id']]['sub_total'];
                $new_delivery_data[$row['id']]['service_charge_rate'] = $service_charge_rate;
                $new_delivery_data[$row['id']]['service_charge_amount'] = $service_charge_amount;
                $new_delivery_data[$row['id']]['total'] = $total;
            }
        } 

        return $this->render('kot-return-history', array('data'             => $new_data,
                                                        'occupy_data'       => $new_occupy_data,
                                                        'take_away_data'    => $new_take_away_data,
                                                        'pick_up_data'      => $new_pick_up_data,
                                                        'retail_data'       => $new_retail_data,
                                                        'delivery_data'     => $new_delivery_data,
                                                        'settings'          => $settings,
                                                        'service_charge_rate' => $service_charge_rate,
                                                        'service_charge_rate_is_active' => $service_charge_rate_is_active,
                                                        'take_away_service_charge_rate' => $take_away_service_charge_rate,
                                                        'take_away_service_charge_rate_is_active' => $take_away_service_charge_rate_is_active,
                                                        'pick_up_service_charge_rate' => $pick_up_service_charge_rate,
                                                        'pick_up_service_charge_rate_is_active' => $pick_up_service_charge_rate_is_active,
                                                        'retail_service_charge_rate' => $retail_service_charge_rate,
                                                        'retail_service_charge_rate_is_active' => $retail_service_charge_rate_is_active,
                                                        'delivery_service_charge_rate' => $delivery_service_charge_rate,
                                                        'delivery_service_charge_rate_is_active' => $delivery_service_charge_rate_is_active
                                                        ));
    }

    public function actionGetOrderDetailWithKotReturn() 
    {   
        $invoice    = isset($_POST['invoice']) ? $_POST['invoice'] : null;
        $data       = ''; 
        $order      = '';
        $order_items = '';
        $occupy     = '';
        $take_away  = '';
        $pick_up    = '';
        $retail     = '';
        $delivery   = '';

        $field = '';
        $value = '';

        if ($_POST['type'] == 'order_invoice') {
            $order = Query::queryOne("SELECT o.*, u.name as user_name, t.table_name as table_name
                                FROM `order` AS o
                                LEFT JOIN `user` AS u
                                    ON u.id = o.created_by
                                LEFT JOIN `table_details` as t
                                    ON t.id = o.table_id
                                WHERE o.invoice_no = '".$invoice."'");
            if ($order) {
                $order_id = $order['id'];
                $field = 'order_id';
                $value = $order_id;

                $data['customer_name']  = $order['customer_name'];
                $data['customer_pan']   = $order['customer_pan'];
                $data['customer_pax']   = $order['customer_pax'];
                $data['invoice_no']     = $order['invoice_no'];
                $data['created_on']     = $order['created_on'];
                $data['type']           = $order['type'];
                $data['table_name']     = $order['table_name'];
                $data['user_name']      = $order['user_name'];
                $data['discount_percent']    = $order['discount_rate'];
                $data['service_charge_rate'] = $order['service_charge_rate'];
            }
        }else {
            if($_POST['type'] == 'occupy') {
                $occupy = Query::queryOne("SELECT o.id, o.customer_name, o.customer_pan, o.customer_pax, o.created_on, u.name as user_name, t.table_name as table_name
                                            FROM `occupy` as o
                                            LEFT JOIN `user` AS u
                                                ON u.id = o.created_by
                                            LEFT JOIN `table_details` as t
                                                ON t.id = o.table_id
                                            WHERE o.id = $invoice");

                if($occupy) {
                    $occupy_id = $occupy['id'];
                    $field = 'occupy_id';
                    $value = $occupy_id;

                    $data['customer_name']  = $occupy['customer_name'];
                    $data['customer_pan']   = $occupy['customer_pan'];
                    $data['customer_pax']   = $occupy['customer_pax'];
                    $data['invoice_no']     = '';
                    $data['created_on']     = $occupy['created_on'];
                    $data['type']           = Yii::$app->params['order_type']['table_order'];
                    $data['table_name']     = $occupy['table_name'];
                    $data['user_name']      = $occupy['user_name'];
                    $data['discount_percent']    = 0;

                    $settings = HSettings::getBasic("'service-charge-rate'");
        
                    $service_charge_rate = ($settings['service-charge-rate'] != null && $settings['service-charge-rate-is-active'] != '0') ? $settings['service-charge-rate'] : 0;

                    $data['service_charge_rate'] = $service_charge_rate;
                }
            }elseif($_POST['type'] == 'take_away') {
                $take_away = Query::queryOne("SELECT o.id, o.customer_name, o.customer_pan, o.created_on, u.name as user_name
                                            FROM `take_away` as o
                                            LEFT JOIN `user` AS u
                                                ON u.id = o.created_by
                                            WHERE o.id = $invoice");

                if($take_away) {
                    $take_away_id = $take_away['id'];
                    $field = 'take_away_id';
                    $value = $take_away_id;

                    $data['customer_name']  = $take_away['customer_name'];
                    $data['customer_pan']   = $take_away['customer_pan'];
                    $data['customer_pax']   = '';
                    $data['invoice_no']     = '';
                    $data['created_on']     = $take_away['created_on'];
                    $data['type']           = Yii::$app->params['order_type']['take_away'];
                    $data['table_name']     = '';
                    $data['user_name']      = $take_away['user_name'];
                    $data['discount_percent']    = 0;

                    $settings = HSettings::getBasic("'take-away-service-charge-rate'");
        
                    $service_charge_rate = ($settings['take-away-service-charge-rate'] != null && $settings['take-away-service-charge-rate-is-active'] != '0') ? $settings['take-away-service-charge-rate'] : 0;

                    $data['service_charge_rate'] = $service_charge_rate;
                }
            }elseif($_POST['type'] == 'pick_up') {
                $pick_up = Query::queryOne("SELECT o.id, o.customer_name, o.customer_pan, o.created_on, u.name as user_name
                                            FROM `pick_up` as o
                                            LEFT JOIN `user` AS u
                                                ON u.id = o.created_by
                                            WHERE o.id = $invoice");

                if($pick_up) {
                    $pick_up_id = $pick_up['id'];
                    $field = 'pick_up_id';
                    $value = $pick_up_id;

                    $data['customer_name']  = $pick_up['customer_name'];
                    $data['customer_pan']   = $pick_up['customer_pan'];
                    $data['customer_pax']   = '';
                    $data['invoice_no']     = '';
                    $data['created_on']     = $pick_up['created_on'];
                    $data['type']           = Yii::$app->params['order_type']['pick_up'];
                    $data['table_name']     = '';
                    $data['user_name']      = $pick_up['user_name'];
                    $data['discount_percent']    = 0;

                    $settings = HSettings::getBasic("'pick-up-service-charge-rate'");
        
                    $service_charge_rate = ($settings['pick-up-service-charge-rate'] != null && $settings['pick-up-service-charge-rate-is-active'] != '0') ? $settings['pick-up-service-charge-rate'] : 0;

                    $data['service_charge_rate'] = $service_charge_rate;
                }
            }elseif($_POST['type'] == 'retail') {
                $retail = Query::queryOne("SELECT o.id, o.customer_name, o.customer_pan, o.created_on, u.name as user_name
                                            FROM `retail` as o
                                            LEFT JOIN `user` AS u
                                                ON u.id = o.created_by
                                            WHERE o.id = $invoice");

                if($retail) {
                    $retail_id = $retail['id'];
                    $field = 'retail_id';
                    $value = $retail_id;

                    $data['customer_name']  = $retail['customer_name'];
                    $data['customer_pan']   = $retail['customer_pan'];
                    $data['customer_pax']   = '';
                    $data['invoice_no']     = '';
                    $data['created_on']     = $retail['created_on'];
                    $data['type']           = Yii::$app->params['order_type']['retail'];
                    $data['table_name']     = '';
                    $data['user_name']      = $retail['user_name'];
                    $data['discount_percent']    = 0;

                    $settings = HSettings::getBasic("'retail-service-charge-rate'");
        
                    $service_charge_rate = ($settings['retail-service-charge-rate'] != null && $settings['retail-service-charge-rate-is-active'] != '0') ? $settings['retail-service-charge-rate'] : 0;

                    $data['service_charge_rate'] = $service_charge_rate;
                }
            }elseif($_POST['type'] == 'delivery') {
                $delivery = Query::queryOne("SELECT o.id, o.customer_name, o.customer_pan, o.created_on, u.name as user_name
                                            FROM `delivery` as o
                                            LEFT JOIN `user` AS u
                                                ON u.id = o.created_by
                                            WHERE o.id = $invoice");

                if($delivery) {
                    $delivery_id = $delivery['id'];
                    $field = 'delivery_id';
                    $value = $delivery_id;

                    $data['customer_name']  = $delivery['customer_name'];
                    $data['customer_pan']   = $delivery['customer_pan'];
                    $data['customer_pax']   = '';
                    $data['invoice_no']     = '';
                    $data['created_on']     = $delivery['created_on'];
                    $data['type']           = Yii::$app->params['order_type']['delivery'];
                    $data['table_name']     = '';
                    $data['user_name']      = $delivery['user_name'];
                    $data['discount_percent']    = 0;

                    $settings = HSettings::getBasic("'delivery-service-charge-rate'");
        
                    $service_charge_rate = ($settings['delivery-service-charge-rate'] != null && $settings['delivery-service-charge-rate-is-active'] != '0') ? $settings['delivery-service-charge-rate'] : 0;

                    $data['service_charge_rate'] = $service_charge_rate;
                }
            }
        }

        if($order != '' || $occupy != ''  || $take_away != ''  || $pick_up != ''  || $retail != '' || $delivery != '') {
            $kot        = Query::queryAll("SELECT * FROM `kot` WHERE $field = $value AND status != ". Yii::$app->params['kot_status']['return']);

            $kot_return = Query::queryAll("SELECT * FROM `kot` WHERE $field = $value AND status = ". Yii::$app->params['kot_status']['return']);
            $kot_id     = [];
            $kot_return_id     = [];
            $new_kot    = [];
            $kot_number = [];

            foreach($kot as $k) {
                $kot_id[] = $k['id'];

                $id = $k['id'];

                foreach($kot_return as $kr) {
                    $kot_return_id[] = $kr['id'];
                }
            }

            $kot_ids = implode(',', $kot_id);
            $kot_return_ids = implode(',', $kot_return_id);

            $new_kot_items = [];
            if($kot_ids != '') {
                $kot_items = Query::queryAll("SELECT k.display_number, ki.*, m.name as menu_item, si.name as special_item_name 
                                            FROM `kot` as k
                                            LEFT JOIN `kot_items` as ki
                                                ON ki.kot_id = k.id
                                            LEFT JOIN `menu_item` as m 
                                                ON m.id = ki.item_id
                                            LEFT JOIN special_order_items as si 
                                                ON si.id = ki.item_id
                                            WHERE ki.kot_id IN ($kot_ids)");

                foreach($kot_items as $ki) {
                    $kot_number[$ki['item_id']][$ki['kot_id']] = $ki['display_number']; 
                    
                    $new_kot_items[$ki['item_id']]['item_id'] = $ki['item_id'];
                    $new_kot_items[$ki['item_id']]['price'] = $ki['price'];

                    if(!isset($new_kot_items[$ki['item_id']]['quantity'])) {
                        $new_kot_items[$ki['item_id']]['quantity'] = $ki['quantity'];
                    }else {
                        $new_kot_items[$ki['item_id']]['quantity'] += $ki['quantity'];
                    }

                    $new_kot_items[$ki['item_id']]['type'] = $ki['type'];
                    $new_kot_items[$ki['item_id']]['menu_item'] = $ki['menu_item'];
                    $new_kot_items[$ki['item_id']]['special_item_name'] = $ki['special_item_name'];
                }
            }

            $new_kot_return_items = [];
            if($kot_return_ids != '') {
                $kot_return_items = Query::queryAll("SELECT ki.*, m.name as menu_item, si.name as special_item_name, k.return_against_display_number as display_number, k.return_note, k.created_on
                                            FROM `kot` as k
                                            LEFT JOIN `kot_items` as ki
                                                ON ki.kot_id = k.id
                                            LEFT JOIN `menu_item` as m 
                                                ON m.id = ki.item_id
                                            LEFT JOIN special_order_items as si 
                                                ON si.id = ki.item_id
                                            WHERE ki.kot_id IN ($kot_return_ids)");

                foreach($kot_return_items as $ki) {
                    $new_kot_return_items[$ki['item_id']][$ki['kot_id']] = $ki;
                }
            }
        }

        echo json_encode(array('order'          => $data,
                                'order_items'   => $order_items,
                                'kot_number'    => $kot_number,
                                'kot_items'     => $new_kot_items,
                                'kot_return_items'  => $new_kot_return_items, 
                                'type'          => 'order'
                            )); die;
        echo json_encode(false); die;
    }

}