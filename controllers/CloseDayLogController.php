<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;
use yii\web\HttpException;

use app\components\Misc;
use app\components\Pdf;
use app\components\Query;
use app\components\HelperSettings as HSettings;
use app\components\Email;

use app\models\CloseDayLog;

class CloseDayLogController extends Controller {

    public $to_group = array('admin', 'staff','floor_supervisor');

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

        if(isset(Yii::$app->session['fiscal_year'])) {
            $temp = explode(":",Yii::$app->session['fiscal_year']);
            $starting_fiscal_year_from_date = $temp[0];
            $starting_fiscal_year_to_date   = $temp[1];

            if ((date('Y-m-d') < $starting_fiscal_year_from_date) 
                    || ( date('Y-m-d') > date('Y-m-d', strtotime($starting_fiscal_year_to_date. ' + 11 days'))) )
            {
                throw new HttpException(404, 'Page not found.');
            }
        }else {
            throw new HttpException(404, 'Page not found.');
        }

        return parent::beforeAction($action);
    }

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
        $log = Query::queryall("SELECT cdl.* , u.name FROM `close_day_log` as cdl
                                LEFT JOIN user as u ON u.id = cdl.created_by");
        return $this->render('index' , array('log' => $log));
    }

    public function actionSendReport()
    {   
        $latest = Misc::getLatestDate();
        if($latest != '' &&  date('Y-m-d') < $latest['latest_date'] ) { 
            echo json_encode(false); die;
        } else {
            $send_emails = '';
            $emails = HSettings::getBasic("'send-report-email-1', 'send-report-email-2', 'send-report-email-3'");

            if($emails['send-report-email-1'] != null && $emails['send-report-email-1-is-active'] != '0') {
                $send_emails['first'] = $emails['send-report-email-1'];
            }
            if($emails['send-report-email-2'] != null && $emails['send-report-email-2-is-active'] != '0') {
                $send_emails['second'] = $emails['send-report-email-2'];
            }
            if($emails['send-report-email-3'] != null && $emails['send-report-email-3-is-active'] != '0') {
                $send_emails['third'] = $emails['send-report-email-3'];
            }
            
            if ($send_emails != '') {   
                $html = $this->generateReport();
                echo $html; die;
                if (Email::sendReport($send_emails, $html)) {
                    $log             = new CloseDayLog();
                    $log->log_date   = date('Y-m-d H:i:s');
                    $log->created_by = Yii::$app->session['eHhupx5UpkLZoXRP_cR1ozEVjY14zWOC0_user']->id;
                    $log->save();

                    echo json_encode(TRUE); die;
                }
            }
            
            echo json_encode(FALSE); die;
        }
    }

    public function generateReport()
    {
        $date = date('Y-m-d');
        $log  = CloseDayLog::find()->orderBy(['id' => SORT_DESC])->one();
        if ($log != null) {
            $previous = date('Y-m-d', strtotime($log->log_date));
        }
        else {
            $previous = date('Y-m-d', strtotime('-5 days'));
        }

        $settings   = HSettings::getBasic("'name-in-bill'");

        $separator  = '<tr><td style="padding:10px 0;"></td></tr>';
        $content    = '<html><head><title>Truffle Report</title></head>
                        <body style="font-family: open sans, sans-serif; font-size: 12px;">'.
                        '<table border="0" style="margin: 0 auto; width: 500px;"><tbody>'
                        .'<tr><td style="text-align: center; text-transform: uppercase;">Truffle Close Day Report</td></tr>'
                        .'<tr><td style="text-align: center; text-transform: uppercase;">'
                            .$settings['name-in-bill']
                        .'</td></tr></tbody></table>';
        
        $now = time();
        $your_date = strtotime($previous);
        $datediff = $now - $your_date;

        $diff = floor($datediff / (60 * 60 * 24));
        if($diff > 5) {
            $previous = date('Y-m-d', strtotime('-6 days'));
        }

        $date1 = $previous;
        $date2 = date('Y-m-d');

        $f1 = strtotime($date1);
        $f2 = strtotime(substr($date1, 0, 10));

        $temp_fiscal_year = Query::queryOne("SELECT * FROM `fiscal_year` ORDER BY id DESC");

        while($f2 <= strtotime($date2)) {
            $used_date = date('Y-m-d',$f1);
            $condition2 = "DATE(created_on) = '".$used_date."'";
            $condition3 = "DATE(o.created_on) = '".$used_date."'";
            $condition4 = "DATE(f.created_on) = '".$used_date."'";

            /*  sales target  */
            $todays_sales_target = Query::queryOne("SELECT (target / day(last_day(full_date))) as target FROM `monthly_target` WHERE month = '". date('F',$f1) ."'");

            $todays_sales  = Query::queryOne("SELECT ROUND(SUM(sub_total),2) as total_amount FROM `order` WHERE ".$condition2." AND is_cancel = 0"); 

            if ($todays_sales['total_amount'] == null) {
                $todays_sales['percentage'] = 0;
            }
            else {
                $todays_sales['percentage'] = 100;
            }
            if ($todays_sales['total_amount'] != null && $todays_sales_target != null) {
                $todays_sales['percentage'] = round(( $todays_sales['total_amount'] / $todays_sales_target['target'] ) * 100, 2);
            }
            /*  sales target  */

            $no_of_customer  = Query::queryOne("SELECT SUM(customer_pax) as total FROM `occupy` WHERE " . $condition2);
            $total_sales     = Query::queryOne("SELECT ROUND(SUM(sub_total),2) as total FROM `order` WHERE " . $condition2 . " AND is_cancel = 0");
            
            if ($total_sales['total'] != null && $no_of_customer['total'] != null && $no_of_customer['total'] > 0) {
                $avg_sales_per_person   = round( $total_sales['total'] / $no_of_customer['total'], 2 );
            }
            else {
                $no_of_customer['total'] = 0;
                $avg_sales_per_person   = round( $total_sales['total'], 2 );
            }

            /**
            Todays sales Target
            **/

            /**
            Total cash in
            **/
            $todays_cash_sales  =   Query::queryOne("SELECT ROUND(SUM(bd.total - bd.service_charge_amount),2) as total 
                                                FROM `order` as o
                                                LEFT JOIN `break_down_receipt` as bd
                                                    ON bd.order_id = o.id
                                                WHERE ".$condition3.
                                                    " AND o.is_cancel = 0
                                                        AND bd.payment_type = " . Yii::$app->params['payment_type']['cash'] . 
                                                    " AND ( bd.type = " . Yii::$app->params['break_down_payment_type']['cash_receipt'].
                                                    " OR bd.type = " . Yii::$app->params['break_down_payment_type']['item_wise'].
                                                    " OR bd.type = " . Yii::$app->params['break_down_payment_type']['advance'].
                                                    ")
                                                ");

            $todays_cash_sales_service_charge   = Query::queryOne("SELECT ROUND(SUM(bd.service_charge_amount),2) as total FROM `order` as o
                                                    LEFT JOIN `break_down_receipt` as bd
                                                        ON bd.order_id = o.id 
                                                    WHERE ".$condition3.
                                                    " AND o.is_cancel = 0
                                                        AND bd.payment_type = " . Yii::$app->params['payment_type']['cash'] . 
                                                    " AND ( bd.type = " . Yii::$app->params['break_down_payment_type']['cash_receipt'].
                                                    " OR bd.type = " . Yii::$app->params['break_down_payment_type']['item_wise'].
                                                    " OR bd.type = " . Yii::$app->params['break_down_payment_type']['advance'].
                                                    ")
                                                ");

            $todays_credit_paid     = Query::queryOne("SELECT ROUND(SUM(total),2) as total FROM `break_down_receipt` 
                                                    WHERE ".$condition2.
                                                    " AND is_credit_paid = " . Yii::$app->params['is_credit_paid']['yes'].
                                                    " AND debtor_payment_type = " . Yii::$app->params['debtor_payment_type']['cash']);

            $todays_payment_return  = Query::queryOne("SELECT ROUND(SUM(total),2) as total FROM `break_down_receipt` 
                                                    WHERE ".$condition2.
                                                    " AND is_payment_return = " . Yii::$app->params['is_payment_return']['yes']);
            
            $todays_tips_received   = Query::queryOne("SELECT ROUND(SUM(amount),2) as total FROM `tips` 
                                                    WHERE ".$condition2.
                                                    " AND type = " . Yii::$app->params['tip']['received']);

            $todays_delivery_charge = Query::queryOne("SELECT ROUND(SUM(total),2) as total FROM `order` 
                                                    WHERE ".$condition2." AND type = " . Yii::$app->params['order_type']['delivery_charge'].
                                                    " AND payment_type = " . Yii::$app->params['payment_type']['cash']);
            
            $todays_cash_in = $todays_cash_sales['total'] + $todays_cash_sales_service_charge['total'] + $todays_delivery_charge['total'] + $todays_tips_received['total'] + $todays_credit_paid['total'] - $todays_payment_return['total'];

            /**
            Total cash in
            **/

            $total_credit_paid_card = Query::queryOne("SELECT ROUND(SUM(total),2) as total FROM `break_down_receipt` 
                                                    WHERE ".$condition2.
                                                    " AND is_credit_paid = " . Yii::$app->params['is_credit_paid']['yes'].
                                                    " AND debtor_payment_type = " . Yii::$app->params['debtor_payment_type']['card']);

            /**
            Sales Detail
            **/

            $gross_sales  = Query::queryAll("SELECT SUM(oi.quantity) as total_quantity, SUM(oi.quantity * oi.price) as total_amount, SUM(o.discount_amount) as discount_amount, oi.type, mi.name as item_name, o.payment_type
                                            FROM `order` as o
                                            LEFT JOIN `order_items` as oi
                                                ON oi.order_id = o.id
                                            LEFT JOIN `menu_item` as mi 
                                                ON mi.id = oi.item_id 
                                             WHERE ".$condition3.
                                            " AND o.is_cancel = 0
                                            GROUP BY oi.item_id, oi.type ORDER BY total_amount DESC"); 

            $product_wise_sales = Query::queryAll("SELECT sum(total_quantity) as total_quantity, item_name
                                                from
                                                (
                                                    SELECT SUM(oi.quantity) as total_quantity, oi.item_id, mi.name as item_name
                                                    FROM `order` as o
                                                    LEFT JOIN `order_items` as oi
                                                        ON oi.order_id = o.id
                                                    LEFT JOIN `menu_item` as mi 
                                                        ON mi.id = oi.item_id
                                                    WHERE " .$condition3.
                                                    " AND o.is_cancel = 0
                                                    AND oi.type = " .Yii::$app->params['item_type']['regular']. "
                                                    GROUP BY oi.item_id

                                                    UNION ALL

                                                    SELECT SUM(fi.quantity) as total_quantity, fi.item_id, mi.name as item_name
                                                    FROM `foc` as f
                                                    LEFT JOIN `foc_items` as fi
                                                        ON fi.foc_id = f.id
                                                    LEFT JOIN `menu_item` as mi 
                                                        ON mi.id = fi.item_id
                                                    WHERE ".$condition4."
                                                    GROUP BY fi.item_id
                                                ) t
                                                group by item_id ORDER BY total_quantity DESC");

            $product_wise_sales_special_item = Query::queryOne("
                                                    SELECT SUM(oi.quantity) as total_quantity
                                                    FROM `order` as o
                                                    LEFT JOIN `order_items` as oi
                                                        ON oi.order_id = o.id
                                                    WHERE ".$condition3.
                                                    " AND o.is_cancel = 0
                                                    AND oi.type = " .Yii::$app->params['item_type']['special']);

            /**
            Sales Detail
            **/

            /**
            Debtor Detail
            **/

            $debtors = Query::queryAll("SELECT id, name, credit_amount, opening_balance, return_amount, paid_amount FROM debtors");
            
            $temp_debtor_paid   = Query::queryAll("SELECT bd.debtor_id, SUM(bd.total) as total
                                            FROM `break_down_receipt` as bd 
                                            LEFT JOIN `debtors` as d 
                                                ON d.id = bd.debtor_id
                                            WHERE DATE(bd.created_on) <= '".$used_date."' 
                                                    AND bd.is_credit_paid = " . Yii::$app->params['is_credit_paid']['yes']. "
                                                    AND '".$temp_fiscal_year['end_date']."' >= DATE(bd.created_on)");

            $debtor_paid        = array_column($temp_debtor_paid, null, 'debtor_id');
            
            $temp_credit_order  = Query::queryAll("SELECT o.debtor_id, SUM(o.total) as total
                                            FROM `order` AS o
                                            LEFT JOIN `debtors` as d 
                                                ON d.id = o.debtor_id
                                            WHERE DATE(o.created_on) <= '".$used_date."' 
                                                    AND o.is_cancel = 0
                                                    AND '".$temp_fiscal_year['end_date']."' >= DATE(o.created_on)");

            $credit_order       = array_column($temp_credit_order, null, 'debtor_id');

            $temp_credit_break_down = Query::queryAll("SELECT bd.debtor_id, SUM(bd.total) as total
                                            FROM `break_down_receipt` AS bd
                                            LEFT JOIN `order` AS o 
                                                ON o.id = bd.order_id 
                                            LEFT JOIN `debtors` as d 
                                                ON d.id = bd.debtor_id
                                            WHERE DATE(bd.created_on) <= '".$used_date."'
                                                AND o.is_cancel = 0 
                                                AND (bd.type = ".Yii::$app->params['break_down_payment_type']['item_wise']."
                                                    OR bd.type = ".Yii::$app->params['break_down_payment_type']['advance'].")
                                                AND '".$temp_fiscal_year['end_date']."' >= DATE(bd.created_on)");

            $credit_break_down       = array_column($temp_credit_break_down, null, 'debtor_id');

            $temp_debtor_payment_return = Query::queryAll("SELECT bd.debtor_id, SUM(bd.total) as total
                                            FROM `break_down_receipt` as bd 
                                            LEFT JOIN `debtors` as d 
                                                ON d.id = bd.debtor_id
                                            WHERE DATE(bd.created_on) <= '".$used_date."' 
                                                    AND bd.is_payment_return = " . Yii::$app->params['is_payment_return']['yes']."
                                                    AND '".$temp_fiscal_year['end_date']."' >= DATE(bd.created_on)");

            $debtor_payment_return       = array_column($temp_debtor_payment_return, null, 'debtor_id');

            $debtor_data = '';
            /*if($debtors != '') {
                $i = 0;
                foreach($debtors as $debtor) {
                    $debtor_data[$i]['name']              = $debtor['name'];
                    if($debtor['credit_amount'] <= 0 && $debtor['return_amount'] <= 0 && $debtor['paid_amount'] <= 0) {
                        $debtor_data[$i]['opening_balance']   = $debtor['opening_balance'];
                    }else {
                        $debtor_data[$i]['opening_balance']   = 0;
                    }
                    $debtor_data[$i]['credit_amount']     = 0;
                    $debtor_data[$i]['paid_amount']       = 0;
                    $debtor_data[$i]['return_amount']     = 0;

                    if( $credit_order != '' ) {
                        if($debtor_data[$i]['opening_balance'] > 0) {
                            $debtor_data[$i]['opening_balance']   = 0;
                        }
                        foreach( $credit_order as $credit ) {
                            if( $debtor['id'] == $credit['debtor_id'] ) {
                                $debtor_data[$i]['credit_amount'] += $credit['total'];
                            }
                        }
                    }
                    if( $credit_break_down != '' ) {
                        if($debtor_data[$i]['opening_balance'] > 0) {
                            $debtor_data[$i]['opening_balance']   = 0;
                        }
                        foreach( $credit_break_down as $credit_bd ) {
                            if( $debtor['id'] == $credit_bd['debtor_id'] ) {
                                $debtor_data[$i]['credit_amount'] += $credit_bd['total'];
                            }
                        }
                    }
                    if( $debtor_paid != '' ) {
                        foreach( $debtor_paid as $paid ) {
                            if( $debtor['id'] == $paid['debtor_id'] ) {
                                $debtor_data[$i]['paid_amount'] += $paid['total'];
                            }
                        }
                    }
                    if( $debtor_payment_return != '' ) {
                        foreach( $debtor_payment_return as $return ) {
                            if( $debtor['id'] == $return['debtor_id'] ) {
                                $debtor_data[$i]['return_amount'] += $return['total'];
                            }
                        }
                    }
                    $i++;
                }
            }*/

            if($debtors != '') {
                $i = 0;
                foreach($debtors as $debtor) {
                    $debtor_data[$i]['name']              = $debtor['name'];
                    $debtor_data[$i]['opening_balance']   = $debtor['opening_balance'];
                    $debtor_data[$i]['credit_amount']     = 0;
                    $debtor_data[$i]['paid_amount']       = 0;
                    $debtor_data[$i]['return_amount']     = 0;

                    if( isset($credit_order[$debtor['id']]) ) {
                        $debtor_data[$i]['credit_amount']   += $credit_order[$debtor['id']]['total'];
                    }
                    if( isset($credit_break_down[$debtor['id']]) ) {
                        $debtor_data[$i]['credit_amount']   += $credit_break_down[$debtor['id']]['total'];
                    }
                    if( isset($debtor_paid[$debtor['id']]) ) {
                        $debtor_data[$i]['paid_amount']     += $debtor_paid[$debtor['id']]['total'];
                    }
                    if( isset($debtor_payment_return[$debtor['id']]) ) {
                        $debtor_data[$i]['return_amount']   += $debtor_payment_return[$debtor['id']]['total'];
                    }
                    $i++;
                }
            }

            /**
            Debtor Detail
            **/

            /**
            Report Templating
            **/

            $content .= 
                        '<table border="0" style="margin: 0 auto; width: 500px;"><tbody>'
                        .$separator
                        .'<tr><td style="text-align:left; border-top: 1px dashed #DCDCDC; border-bottom: 1px dashed #DCDCDC; font-weight: 400; padding:10px 0;">Date : '.date('l, jS M, Y', $f1).'</td></tr>'. $separator
                        .'<tr><td><table cellpadding="1" cellspacing="1" style="width: 100%; line-height: 20px;"><tbody><tr><th colspan="2" style="text-align:left; font-weight: 400;"><span style="text-decoration:underline;">Todays Sales target</span></th>';
                                
            $content .= '<th colspan="3" style="text-align:left; font-weight: 400;">: '.$todays_sales['percentage'].'%</th>'; 
            /*first section*/
            
            $content .= '</tr>' . $separator . '<tr><th colspan="2" style="text-align:left; font-weight: 400;"><span style="text-decoration:underline;">Total Customer</span></th>'
                        .'<th colspan="3" style="text-align:left; font-weight: 400;">: '.$no_of_customer['total'].'</th>'
                        .'</tr>' . $separator . '<tr><th colspan="2" style="text-align:left; font-weight: 400;"><span style="text-decoration:underline;">Average Sales Per Customer</span></th>'
                        .'<th colspan="3" style="text-align:left; font-weight: 400;">: Rs. '.$avg_sales_per_person.'</th>'
                        .'</tr>' . $separator . '<tr><th colspan="2" style="text-align:left; font-weight: 400;"><span style="text-decoration:underline;">Total Cash In</span></th>'
                        .'<th colspan="3" style="text-align:left; font-weight: 400;"></th></tr><tr><th colspan="2" style="text-align:left; font-weight: 400;">Cash Sales</th>'
                        .'<th colspan="3" style="text-align:left; font-weight: 300;">: Rs. '.(($todays_cash_sales['total'] != null) ? $todays_cash_sales['total'] : 0).'</th>'
                        .'</tr><tr><th colspan="2" style="text-align:left; font-weight: 400;">Service Charge</th>'
                        .'<th colspan="3" style="text-align:left; font-weight: 300;">: Rs. '.(($todays_cash_sales_service_charge['total'] != null) ? $todays_cash_sales_service_charge['total'] : 0).'</th>'
                        .'</tr><tr><th colspan="2" style="text-align:left; font-weight: 400;">Delivery Charge</th>'
                        .'<th colspan="3" style="text-align:left; font-weight: 300;">: Rs. '.(($todays_delivery_charge['total'] != null) ? $todays_delivery_charge['total'] : 0).'</th>'
                        .'<th colspan="3" style="text-align:left; font-weight: 400;"></th></tr><tr><th colspan="2" style="text-align:left; font-weight: 400;">Tip Received</th>'
                        .'<th colspan="3" style="text-align:left; font-weight: 300;">: Rs. '.(($todays_tips_received['total'] != null) ? $todays_tips_received['total'] : 0).'</th>'
                        .'</tr><tr><th colspan="2" style="text-align:left; font-weight: 400;">Credit Received</th>'
                        .'<th colspan="3" style="text-align:left; font-weight: 300;">: Rs. '.(($todays_credit_paid['total'] != null) ? $todays_credit_paid['total'] : 0).'</th>'
                        .'</tr><tr><th colspan="2" style="text-align:left; font-weight: 400;">Payment Return</th>'
                        .'<th colspan="3" style="text-align:left; font-weight: 300;">: Rs. '.(($todays_payment_return['total'] != null) ? $todays_payment_return['total'] : 0).'</th>'
                        .'</tr><tr><th colspan="2" style="border-top: 1px solid #DCDCDC; text-align:left; font-weight: 400;">Cash In</th>'
                        .'<th colspan="3" style="border-top: 1px solid #DCDCDC; text-align:left; font-weight: 300;">: Rs. '.(($todays_cash_in != null) ? $todays_cash_in : 0).'</th>'
                        .'</tr>' . $separator . '<tr style="border-top: 1px solid #DCDCDC;"><th colspan="2" style="text-align:left; font-weight: 400;"><span style="text-decoration:underline;">Total Credit Received(Card)</span></th><th colspan="3" style="text-align:left; font-weight: 400;">: Rs. '.(($total_credit_paid_card['total'] != null) ? $total_credit_paid_card['total'] : 0).'</th></tr></tbody></table></td></tr>' . $separator . '<tr><td style=""><span style="text-decoration:underline;">Sales Detail:</span></td></tr>'.$separator
                        .'<tr><td><table cellpadding="2" cellspacing="0" border="1" style="width: 100%; line-height: 20px;"><tbody><tr><th colspan="4" style="text-align:left; font-weight: 400; padding:10px 8px;">Gross Sales Detail:</th></tr><tr><th style="text-align:left; font-weight: 400; padding:5px 8px;">S.N.</th><th style="text-align:left; font-weight: 400; padding:5px 8px;">Item Name</th><th style="text-align:center; font-weight: 400; padding:5px 8px;">Qty</th><th style="text-align:right; font-weight: 400; padding:5px 8px;">Total Amount</th></tr>';
             
            $gross_total = 0;
            $gross_cash  = 0;
            $gross_credit = 0;   
            $gross_card = 0; 
            $discount_total = 0;              
            if ($gross_sales != null) { 
                $i = 0;
                $gross_sales_special_item_total_amount = 0;
                $gross_sales_special_item_total_quantity = 0; 
                foreach($gross_sales as $gross) { $i++;
                    if($gross['type'] == Yii::$app->params['item_type']['regular']) {
                        $content .= '<tr><th style="text-align:left; font-weight: 400; padding:5px 8px;">'.$i.'</th>'
                                    .'<th style="text-align:left; font-weight: 400; padding:5px 8px;">'.$gross['item_name'].'</th>'
                                    .'<th style="text-align:center; font-weight: 400; padding:5px 8px;">'.$gross['total_quantity'].'</th>'
                                    .'<th style="text-align:right; font-weight: 400; padding:5px 8px;">'.$gross['total_amount'].'</th></tr>';
                        
                        $gross_total += $gross['total_amount'];
                        $discount_total += $gross['discount_amount'];
                        if ($gross['payment_type'] == Yii::$app->params['payment_type']['cash']) {
                            $gross_cash += $gross['total_amount'];
                        }
                        elseif($gross['payment_type'] == Yii::$app->params['payment_type']['credit']) {
                            $gross_credit += $gross['total_amount'];
                        }
                        elseif($gross['payment_type'] == Yii::$app->params['payment_type']['card']) {
                            $gross_card += $gross['total_amount'];
                        }
                    }
                    else { 
                        $gross_sales_special_item_total_amount += $gross['total_amount'];
                        $gross_sales_special_item_total_quantity += $gross['total_quantity'];
                    }
                }
                if($gross_sales_special_item_total_amount > 0) {
                    $content .= '<tr><th style="text-align:left; font-weight: 400; padding:5px 8px;">'.++$i.'</th>'
                                    .'<th style="text-align:left; font-weight: 400; padding:5px 8px;">Special Items</th>'
                                    .'<th style="text-align:center; font-weight: 400; padding:5px 8px;">'.$gross_sales_special_item_total_quantity.'</th>'
                                    .'<th style="text-align:right; font-weight: 400; padding:5px 8px;">'.$gross_sales_special_item_total_amount.'</th></tr>';
                        
                    $gross_total += $gross['total_amount'];
                    if ($gross['payment_type'] == Yii::$app->params['payment_type']['cash']) {
                        $gross_cash += $gross['total_amount'];
                    }
                    elseif($gross['payment_type'] == Yii::$app->params['payment_type']['credit']) {
                        $gross_credit += $gross['total_amount'];
                    }
                    elseif($gross['payment_type'] == Yii::$app->params['payment_type']['card']) {
                        $gross_card += $gross['total_amount'];
                    }
                }
            }
            else {
                $content .= '<tr><th colspan="4" style="text-align:left; font-weight: 400; padding:5px 8px;">No Data Available</th></tr>';
            } 

            $content .= '<tr><th colspan="3" style="text-align:right; font-weight: 400; padding:5px 8px;">Discount Amount</th>'
                        .'<th style="text-align:left; font-weight: 400; padding:5px 8px;">Rs. '.$discount_total.'</th></tr>'
                        .'<tr><th colspan="3" style="text-align:right; font-weight: 400; padding:5px 8px;">Gross Sales before discount</th>'
                        .'<th style="text-align:left; font-weight: 400; padding:5px 8px;">Rs. '.$gross_total.'</th>'
                        .'</tr><tr><th colspan="3" style="text-align:right; font-weight: 400; padding:5px 8px;">Total Cash</th>'
                        .'<th style="text-align:left; font-weight: 400; padding:5px 8px;">Rs. '.$gross_cash.'</th>'
                        .'</tr><tr><th colspan="3" style="text-align:right; font-weight: 400; padding:5px 8px;">Total Credit</th>'
                        .'<th style="text-align:left; font-weight: 400; padding:5px 8px;">Rs. '.$gross_credit.'</th>'
                        .'</tr><tr><th colspan="3" style="text-align:right; font-weight: 400; padding:5px 8px;">Total Card</th>'
                        .'<th style="text-align:left; font-weight: 400; padding:5px 8px;">Rs. '.$gross_card.'</th>'
                        .'</tr></tbody></table></td></tr>'.$separator.'<tr><td><table cellpadding="2" cellspacing="0" border="1" style="width: 100%; line-height: 20px;"><tbody><tr><th colspan="3" style="text-align:left; font-weight: 400; padding:10px 8px;">Product-wise Sales:</th></tr><tr><th style="text-align:left; font-weight: 400; padding:5px 8px;">S.N.</th><th style="text-align:left; font-weight: 400; padding:5px 8px;">Item Name</th><th style="text-align:center; font-weight: 400; padding:5px 8px;">Qty</th></tr>';                            
            
            if ($product_wise_sales != null) {
                $i = 0; 
                foreach($product_wise_sales as $prod) { $i++;
                    $content .= '<tr><th style="text-align:left; font-weight: 400; padding:5px 8px;">'.$i.'</th>'
                                .'<th style="text-align:left; font-weight: 400; padding:5px 8px;">'.$prod['item_name'].'</th>'
                                .'<th style="text-align:center; font-weight: 400; padding:5px 8px;">'.$prod['total_quantity'].'</th></tr>';
                }

                if($product_wise_sales_special_item != null && $product_wise_sales_special_item['total_quantity'] > 0) {
                    $content .= '<tr><th style="text-align:left; font-weight: 400; padding:5px 8px;">'.++$i.'</th>'
                                .'<th style="text-align:left; font-weight: 400; padding:5px 8px;">Special Items</th>'
                                .'<th style="text-align:center; font-weight: 400; padding:5px 8px;">'.$product_wise_sales_special_item['total_quantity'].'</th></tr>';
                }
            }
            else {
                $content .= '<tr><th colspan="3" style="text-align:left; font-weight: 400; padding:5px 8px;">No Data Available</th></tr>';
            }                    

            $content .= '</tbody></table></td></tr>'.$separator.'<tr><td style=""><span style="text-decoration:underline;">Debtor Detail:</span></td></tr>'.$separator.'<tr><td><table cellpadding="2" cellspacing="0" border="1" style="width: 100%; line-height: 20px;"><tbody><tr><th style="text-align:left; font-weight: 400; padding:5px 8px;">S.N.</th><th style="text-align:left; font-weight: 400; padding:5px 8px;">Debtor Name</th><th style="text-align:center; font-weight: 400; padding:5px 8px;">Qty</th></tr>';
                 
            if ($debtor_data != null) { 
                $i = 0; 
                foreach($debtor_data as $deb) { $i++;
                    $content .= '<tr><th style="text-align:left; font-weight: 400; padding:5px 8px;">'.$i.'</th>'
                                .'<th style="text-align:left; font-weight: 400; padding:5px 8px;">'.$deb['name'].'</th>'
                                .'<th style="text-align:center; font-weight: 400; padding:5px 8px;">Rs. '.round( ($deb['credit_amount'] + $deb['opening_balance'] + $deb['return_amount'] - $deb['paid_amount']) , 2).'</th></tr>';
                }
            }
            else {
                $content .= '<tr><th colspan="3" style="text-align:left; font-weight: 400; padding:5px 8px;">No Data Available</th></tr>';
            }             
                                
            $content .= '</tbody></table></td></tr>'.$separator.'</tbody></table>';

            /**
            Report Templating
            **/

            $f1 = strtotime(date('Y-m-d', $f2) .' +1 day');
            $f2 = strtotime(date('Y-m-d', $f2) .' +1 day');
        }
        
        $content .= '<table border="0" style="margin: 0 auto; width: 500px;"><tbody>'.
                    '<tr><td style="padding:15px 0;">SUBMITTED BY : '.
                        Yii::$app->session['eHhupx5UpkLZoXRP_cR1ozEVjY14zWOC0_user']->name.
                    '</td></tr></tbody></table></body></html>';
        return $content; die;
        //Pdf::create_report('Truffle', $content, 'F');        
    }

    public function actionTest()
    {
        return $this->render('test');
    }
}
/*
<tr><td style="padding:10px 0;"></td></tr><tr style="border-top: 1px solid #DCDCDC;"><td><table cellpadding="1" cellspacing="1" style="width: 100%; line-height: 20px;"><tbody><tr><th colspan="2" style="text-align:left; font-weight: 400;"><span style="text-decoration:underline;">Total Credit Paid Amount Ttl </span></th><th colspan="3" style="text-align:left; font-weight: 400;">: Rs. 0</th></tr><tr><td style="padding:10px 0;"></td></tr></tbody></table></td></tr>
*/