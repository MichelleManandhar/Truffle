<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\HttpException;

use app\components\Misc;
use app\components\Query;
use app\components\HelperSettings as HSettings;
use app\models\User;

class DashController extends Controller {

    public $to_group = array('admin');


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
        /** First & Third Section **/
        
            $user = User::findOne(Yii::$app->session['eHhupx5UpkLZoXRP_cR1ozEVjY14zWOC0_user']->id); 
            
            /*weekly sales report*/
            $weekly_sales_data = [];
            if (date('t') == date('d')) {
                $weekly_sales_db  = Query::queryAll("SELECT SUM(sub_total - discount_amount) as total_amount, DATE_FORMAT(created_on, '%Y-%m-%d') as cr_date
                                            FROM `order` 
                                            WHERE created_on between date_sub(now(),INTERVAL 7 DAY) 
                                            AND CURDATE() AND is_cancel = 0 GROUP BY DAY(created_on) ORDER BY created_on"); 

                $last_weekly_sales_db  = Query::queryOne("SELECT SUM(sub_total - discount_amount) as total_amount, DATE_FORMAT(created_on, '%Y-%m-%d') as cr_date
                                            FROM `order` 
                                            WHERE DATE(created_on) = '".date('Y-m-d')."' AND is_cancel = 0"); 
                  
                if ($last_weekly_sales_db != null) {
                    $weekly_sales_data[$last_weekly_sales_db['cr_date']] = $last_weekly_sales_db['total_amount'];
                }     
            }
            else {
                $weekly_sales_db  = Query::queryAll("SELECT SUM(sub_total - discount_amount) as total_amount, DATE_FORMAT(created_on, '%Y-%m-%d') as cr_date
                                            FROM `order` 
                                            WHERE created_on between date_sub(now(),INTERVAL 7 DAY) 
                                            AND (CURDATE() + 1) AND is_cancel = 0 GROUP BY DAY(created_on) ORDER BY created_on"); 
            }

            $weekly_sales_true_k = false;
            if ($weekly_sales_db != null) {
                foreach($weekly_sales_db as $ws) {
                    $weekly_sales_data[$ws['cr_date']] = $ws['total_amount'];
                }

                if (max($weekly_sales_data) > 1000) {
                    $weekly_sales_true_k = true;
                }
            }

            $begin = new \DateTime( date('Y-m-d', strtotime('-6 days')) );
            $end = new \DateTime( date('Y-m-d', strtotime('+1 days')) );

            $interval = \DateInterval::createFromDateString('1 day');
            $period = new \DatePeriod($begin, $interval, $end);

            $weekly_sales = [];
            foreach ( $period as $dt ) {
                if (isset($weekly_sales_data[$dt->format( 'Y-m-d' )])) {
                    if ($weekly_sales_true_k) {
                        $weekly_sales[$dt->format( "l" )] = (float) round(($weekly_sales_data[$dt->format( 'Y-m-d' )] / 1000), 4);
                    }
                    else {
                        $weekly_sales[$dt->format( "l" )] = (float) round(($weekly_sales_data[$dt->format( 'Y-m-d' )]), 4);
                    }
                }
                else {
                    $weekly_sales[$dt->format( "l" )] = 0;
                }
                $week[] = '"' . $dt->format( "l" ) . '"'; 
            }

            $weekly_sales_labels = implode(', ', $week); 
            $weekly_sales_data = implode(', ', $weekly_sales);
            /*weekly sales report*/

            /*weekly cash in report*/
            $weekly_cash_in_data = [];
            if (date('t') == date('d')) {
                $weekly_payment_return  = Query::queryAll("SELECT ROUND(SUM(total),2) as total , DATE_FORMAT(created_on, '%Y-%m-%d') as cr_date
                                                    FROM `break_down_receipt` 
                                                    WHERE created_on between date_sub(now(),INTERVAL 7 DAY) 
                                                        AND CURDATE() 
                                                        AND is_payment_return = " . Yii::$app->params['is_payment_return']['yes'] . "
                                                    GROUP BY DAY(created_on) ORDER BY created_on");

                $weekly_cash_add = Query::queryAll("SELECT SUM(total) as total, cr_date
                                                from
                                                (
                                                    SELECT ROUND(SUM(bd.total),2) as total , DATE_FORMAT(o.created_on, '%Y-%m-%d') as cr_date  
                                                    FROM `order` as o
                                                    LEFT JOIN `break_down_receipt` as bd
                                                        ON bd.order_id = o.id
                                                    WHERE o.created_on between date_sub(now(),INTERVAL 7 DAY) 
                                                        AND CURDATE() 
                                                        AND o.is_cancel = 0
                                                        AND bd.payment_type = " . Yii::$app->params['payment_type']['cash'] . 
                                                        " AND ( bd.type = " . Yii::$app->params['break_down_payment_type']['cash_receipt'].
                                                        " OR bd.type = " . Yii::$app->params['break_down_payment_type']['item_wise'].
                                                        " OR bd.type = " . Yii::$app->params['break_down_payment_type']['advance'].
                                                        ")
                                                    GROUP BY DAY(o.created_on)

                                                    UNION ALL

                                                    SELECT ROUND(SUM(total),2) as total , DATE_FORMAT(created_on, '%Y-%m-%d') as cr_date 
                                                    FROM `order` 
                                                    WHERE created_on between date_sub(now(),INTERVAL 7 DAY) 
                                                        AND CURDATE() 
                                                        AND type = " . Yii::$app->params['order_type']['delivery_charge'].
                                                        " AND payment_type = " . Yii::$app->params['payment_type']['cash'] . "
                                                    GROUP BY DAY(created_on)

                                                    UNION ALL

                                                    SELECT ROUND(SUM(total),2) as total , DATE_FORMAT(created_on, '%Y-%m-%d') as cr_date
                                                    FROM `break_down_receipt` 
                                                    WHERE created_on between date_sub(now(),INTERVAL 7 DAY) 
                                                        AND CURDATE() 
                                                        AND is_credit_paid = " . Yii::$app->params['is_credit_paid']['yes'].
                                                        " AND debtor_payment_type = " . Yii::$app->params['debtor_payment_type']['cash'] . "
                                                    GROUP BY DAY(created_on)

                                                    UNION ALL 

                                                    SELECT ROUND(SUM(amount),2) as total , DATE_FORMAT(created_on, '%Y-%m-%d') as cr_date
                                                    FROM `tips` 
                                                    WHERE created_on between date_sub(now(),INTERVAL 7 DAY) 
                                                        AND CURDATE() 
                                                        AND type = " . Yii::$app->params['tip']['received'] . "
                                                    GROUP BY DAY(created_on)
                                                ) t
                                                GROUP BY cr_date ORDER BY cr_date
                                            ");

                $last_weekly_payment_return  = Query::queryOne("SELECT ROUND(SUM(total),2) as total , DATE_FORMAT(created_on, '%Y-%m-%d') as cr_date
                                                    FROM `break_down_receipt` 
                                                    WHERE DATE(created_on) = '".date('Y-m-d')."' 
                                                        AND is_payment_return = " . Yii::$app->params['is_payment_return']['yes'] . "
                                                    GROUP BY DAY(created_on) ORDER BY created_on");

                $last_weekly_cash_add = Query::queryOne("SELECT SUM(total) as total, cr_date
                                                from
                                                (
                                                    SELECT ROUND(SUM(bd.total),2) as total , DATE_FORMAT(o.created_on, '%Y-%m-%d') as cr_date  
                                                    FROM `order` as o
                                                    LEFT JOIN `break_down_receipt` as bd
                                                        ON bd.order_id = o.id
                                                    WHERE  DATE(o.created_on) = '".date('Y-m-d')."' 
                                                        AND o.is_cancel = 0
                                                        AND bd.payment_type = " . Yii::$app->params['payment_type']['cash'] . 
                                                        " AND ( bd.type = " . Yii::$app->params['break_down_payment_type']['cash_receipt'].
                                                        " OR bd.type = " . Yii::$app->params['break_down_payment_type']['item_wise'].
                                                        " OR bd.type = " . Yii::$app->params['break_down_payment_type']['advance'].
                                                        ")
                                                    GROUP BY DAY(o.created_on)

                                                    UNION ALL

                                                    SELECT ROUND(SUM(total),2) as total , DATE_FORMAT(created_on, '%Y-%m-%d') as cr_date 
                                                    FROM `order` 
                                                    WHERE  DATE(created_on) = '".date('Y-m-d')."' 
                                                        AND type = " . Yii::$app->params['order_type']['delivery_charge'].
                                                        " AND payment_type = " . Yii::$app->params['payment_type']['cash'] . "
                                                    GROUP BY DAY(created_on)

                                                    UNION ALL

                                                    SELECT ROUND(SUM(total),2) as total , DATE_FORMAT(created_on, '%Y-%m-%d') as cr_date
                                                    FROM `break_down_receipt` 
                                                    WHERE  DATE(created_on) = '".date('Y-m-d')."' 
                                                        AND is_credit_paid = " . Yii::$app->params['is_credit_paid']['yes'].
                                                        " AND debtor_payment_type = " . Yii::$app->params['debtor_payment_type']['cash'] . "
                                                    GROUP BY DAY(created_on)

                                                    UNION ALL 

                                                    SELECT ROUND(SUM(amount),2) as total , DATE_FORMAT(created_on, '%Y-%m-%d') as cr_date
                                                    FROM `tips` 
                                                    WHERE  DATE(created_on) = '".date('Y-m-d')."' 
                                                        AND type = " . Yii::$app->params['tip']['received'] . "
                                                    GROUP BY DAY(created_on)
                                                ) t
                                                GROUP BY cr_date ORDER BY cr_date
                                            ");
                  
                if ($last_weekly_cash_add != null) {
                    $weekly_cash_in_data[$last_weekly_cash_add['cr_date']] = $last_weekly_cash_add['total'];
                }  

                if ($last_weekly_payment_return != null) {
                    if(array_key_exists($last_weekly_payment_return['cr_date'], $weekly_cash_in_data)) {
                        $weekly_cash_in_data[$last_weekly_payment_return['cr_date']] -= $last_weekly_payment_return['total'];
                    }else {
                        $weekly_cash_in_data[$last_weekly_payment_return['cr_date']] = '-'.$last_weekly_payment_return['total'];
                    }
                }    
            }
            else {
                $weekly_payment_return  = Query::queryAll("SELECT ROUND(SUM(total),2) as total , DATE_FORMAT(created_on, '%Y-%m-%d') as cr_date
                                                        FROM `break_down_receipt` 
                                                        WHERE created_on between date_sub(now(),INTERVAL 7 DAY) 
                                                            AND (CURDATE() + 1) 
                                                            AND is_payment_return = " . Yii::$app->params['is_payment_return']['yes'] . "
                                                        GROUP BY DAY(created_on) ORDER BY created_on");

                $weekly_cash_add = Query::queryAll("SELECT SUM(total) as total, cr_date
                                                    from
                                                    (
                                                        SELECT ROUND(SUM(bd.total),2) as total , DATE_FORMAT(o.created_on, '%Y-%m-%d') as cr_date  
                                                        FROM `order` as o
                                                        LEFT JOIN `break_down_receipt` as bd
                                                            ON bd.order_id = o.id
                                                        WHERE o.created_on between date_sub(now(),INTERVAL 7 DAY) 
                                                            AND (CURDATE() + 1) 
                                                            AND o.is_cancel = 0
                                                            AND bd.payment_type = " . Yii::$app->params['payment_type']['cash'] . 
                                                            " AND ( bd.type = " . Yii::$app->params['break_down_payment_type']['cash_receipt'].
                                                            " OR bd.type = " . Yii::$app->params['break_down_payment_type']['item_wise'].
                                                            " OR bd.type = " . Yii::$app->params['break_down_payment_type']['advance'].
                                                            ")
                                                        GROUP BY DAY(o.created_on)

                                                        UNION ALL

                                                        SELECT ROUND(SUM(total),2) as total , DATE_FORMAT(created_on, '%Y-%m-%d') as cr_date 
                                                        FROM `order` 
                                                        WHERE created_on between date_sub(now(),INTERVAL 7 DAY) 
                                                            AND (CURDATE() + 1) 
                                                            AND type = " . Yii::$app->params['order_type']['delivery_charge'].
                                                            " AND payment_type = " . Yii::$app->params['payment_type']['cash'] . "
                                                        GROUP BY DAY(created_on)

                                                        UNION ALL

                                                        SELECT ROUND(SUM(total),2) as total , DATE_FORMAT(created_on, '%Y-%m-%d') as cr_date
                                                        FROM `break_down_receipt` 
                                                        WHERE created_on between date_sub(now(),INTERVAL 7 DAY) 
                                                            AND (CURDATE() + 1) 
                                                            AND is_credit_paid = " . Yii::$app->params['is_credit_paid']['yes'].
                                                            " AND debtor_payment_type = " . Yii::$app->params['debtor_payment_type']['cash'] . "
                                                        GROUP BY DAY(created_on)

                                                        UNION ALL 

                                                        SELECT ROUND(SUM(amount),2) as total , DATE_FORMAT(created_on, '%Y-%m-%d') as cr_date
                                                        FROM `tips` 
                                                        WHERE created_on between date_sub(now(),INTERVAL 7 DAY) 
                                                            AND (CURDATE() + 1) 
                                                            AND type = " . Yii::$app->params['tip']['received'] . "
                                                        GROUP BY DAY(created_on)
                                                    ) t
                                                    GROUP BY cr_date ORDER BY cr_date
                                                ");
            }

            $weekly_cash_in_true_k = false;
            if ($weekly_cash_add != null) {
                foreach($weekly_cash_add as $wc) {
                    $weekly_cash_in_data[$wc['cr_date']] = $wc['total'];
                } 
            }
            
            if ($weekly_payment_return != null) {
                foreach($weekly_payment_return as $wpr) {
                    if(array_key_exists($wpr['cr_date'], $weekly_cash_in_data)) {
                        $weekly_cash_in_data[$wpr['cr_date']] -= $wpr['total'];
                    }else {
                        $weekly_cash_in_data[$wpr['cr_date']] = '-'.$wpr['total'];
                    }
                } 
            }

            if ($weekly_cash_in_data != null && max($weekly_cash_in_data) > 1000) {
                $weekly_cash_in_true_k = true;
            }

            $begin = new \DateTime( date('Y-m-d', strtotime('-6 days')) );
            $end = new \DateTime( date('Y-m-d', strtotime('+1 days')) );

            $interval = \DateInterval::createFromDateString('1 day');
            $period = new \DatePeriod($begin, $interval, $end);

            $weekly_cash_in = [];
            foreach ( $period as $dt ) {
                if (isset($weekly_cash_in_data[$dt->format( 'Y-m-d' )])) {
                    if ($weekly_cash_in_true_k) {
                        $weekly_cash_in[$dt->format( "l" )] = (float) ($weekly_cash_in_data[$dt->format( 'Y-m-d' )] / 1000);
                    }
                    else {
                        $weekly_cash_in[$dt->format( "l" )] = (float) $weekly_cash_in_data[$dt->format( 'Y-m-d' )];
                    }
                }
                else {
                    $weekly_cash_in[$dt->format( "l" )] = 0;
                }
                $week[] = '"' . $dt->format( "l" ) . '"'; 
            }
            $weekly_cash_in_labels = implode(', ', $week); 
            $weekly_cash_in_data = implode(', ', $weekly_cash_in);

            /*weekly cash in report*/

            /*monthwise sales report*/
            if (date('t') == date('d')) {
                $monthwise_sales_db  = Query::queryAll("SELECT SUM(sub_total - discount_amount) as total_amount, DATE_FORMAT(created_on, '%Y-%m') as cr_date
                                            FROM `order` 
                                            WHERE created_on between date_sub(now(),INTERVAL 12 MONTH) 
                                            AND (CURDATE()) AND is_cancel = 0 GROUP BY MONTH(created_on)  ORDER BY created_on ");               
            }
            else {
                $monthwise_sales_db  = Query::queryAll("SELECT SUM(sub_total - discount_amount) as total_amount, DATE_FORMAT(created_on, '%Y-%m') as cr_date
                                            FROM `order` 
                                            WHERE created_on between date_sub(now(),INTERVAL 12 MONTH) 
                                            AND (CURDATE() + 1) AND is_cancel = 0 GROUP BY MONTH(created_on)  ORDER BY created_on ");
            }

            $monthwise_sales_true_k = false;
            if ($monthwise_sales_db != null) {
                foreach($monthwise_sales_db as $mws) {
                    $monthwise_sales_data[$mws['cr_date']] = $mws['total_amount'];
                }

                if (max($monthwise_sales_data) > 1000) {
                    $monthwise_sales_true_k = true;
                }
            }

            $begin = new \DateTime( date('Y-m', strtotime('-11 months')) . '-01' );
            $end = new \DateTime( date('Y-m-d')); //, strtotime('+1 months')) );

            $interval = \DateInterval::createFromDateString('1 month');
            $period = new \DatePeriod($begin, $interval, $end);

            $monthwise_sales = [];
            foreach ( $period as $dt ) {
                if (isset($monthwise_sales_data[$dt->format( 'Y-m' )])) {
                    if ($monthwise_sales_true_k) {
                        $monthwise_sales[$dt->format( "F" )] = (float) round(($monthwise_sales_data[$dt->format( 'Y-m' )] / 1000), 4 );
                        /*$monthwise_sales[$dt->format( "F" )] = (int) ($monthwise_sales_data[$dt->format( 'Y-m' )]);*/
                    }
                    else {
                        $monthwise_sales[$dt->format( "F" )] = (float) round(($monthwise_sales_data[$dt->format( 'Y-m' )]), 4 );
                    }
                }
                else {
                    $monthwise_sales[$dt->format( "F" )] = 0;
                }
                $monthwise[] = '"' . $dt->format( "F" ) . '"'; 
            }
            $monthwise_sales_labels = implode(', ', $monthwise); 
            $monthwise_sales_data = implode(', ', $monthwise_sales);
            /*monthwise sales report*/

            /*monthwise cash in report*/
            if (date('t') == date('d')) {
                $monthwise_payment_return  = Query::queryAll("SELECT ROUND(SUM(total),2) as total , DATE_FORMAT(created_on, '%Y-%m') as cr_date
                                                    FROM `break_down_receipt` 
                                                    WHERE created_on between date_sub(now(),INTERVAL 12 MONTH) 
                                                        AND CURDATE() 
                                                        AND is_payment_return = " . Yii::$app->params['is_payment_return']['yes'] . "
                                                    GROUP BY MONTH(created_on) ORDER BY created_on");

                $monthwise_cash_add = Query::queryAll("SELECT SUM(total) as total, cr_date
                                                from
                                                (
                                                    SELECT ROUND(SUM(bd.total),2) as total , DATE_FORMAT(o.created_on, '%Y-%m') as cr_date 
                                                    FROM `order` as o
                                                    LEFT JOIN `break_down_receipt` as bd
                                                        ON bd.order_id = o.id
                                                    WHERE o.created_on between date_sub(now(),INTERVAL 12 MONTH) 
                                                        AND CURDATE() 
                                                        AND o.is_cancel = 0
                                                        AND bd.payment_type = " . Yii::$app->params['payment_type']['cash'] . 
                                                        " AND ( bd.type = " . Yii::$app->params['break_down_payment_type']['cash_receipt'].
                                                        " OR bd.type = " . Yii::$app->params['break_down_payment_type']['item_wise'].
                                                        " OR bd.type = " . Yii::$app->params['break_down_payment_type']['advance'].
                                                        ")
                                                    GROUP BY MONTH(o.created_on)

                                                    UNION ALL

                                                    SELECT ROUND(SUM(total),2) as total , DATE_FORMAT(created_on, '%Y-%m') as cr_date 
                                                    FROM `order` 
                                                    WHERE created_on between date_sub(now(),INTERVAL 12 MONTH) 
                                                        AND CURDATE() 
                                                        AND type = " . Yii::$app->params['order_type']['delivery_charge'].
                                                        " AND payment_type = " . Yii::$app->params['payment_type']['cash'] . "
                                                    GROUP BY MONTH(created_on)

                                                    UNION ALL

                                                    SELECT ROUND(SUM(total),2) as total , DATE_FORMAT(created_on, '%Y-%m') as cr_date
                                                    FROM `break_down_receipt` 
                                                    WHERE created_on between date_sub(now(),INTERVAL 12 MONTH) 
                                                        AND CURDATE() 
                                                        AND is_credit_paid = " . Yii::$app->params['is_credit_paid']['yes'].
                                                        " AND debtor_payment_type = " . Yii::$app->params['debtor_payment_type']['cash'] . "
                                                    GROUP BY MONTH(created_on)

                                                    UNION ALL 

                                                    SELECT ROUND(SUM(amount),2) as total , DATE_FORMAT(created_on, '%Y-%m') as cr_date
                                                    FROM `tips` 
                                                    WHERE created_on between date_sub(now(),INTERVAL 12 MONTH) 
                                                        AND CURDATE()
                                                        AND type = " . Yii::$app->params['tip']['received'] . "
                                                    GROUP BY MONTH(created_on)
                                                ) t
                                                GROUP BY cr_date ORDER BY cr_date
                                            ");              
            }
            else {
                $monthwise_payment_return  = Query::queryAll("SELECT ROUND(SUM(total),2) as total , DATE_FORMAT(created_on, '%Y-%m') as cr_date
                                                    FROM `break_down_receipt` 
                                                    WHERE created_on between date_sub(now(),INTERVAL 12 MONTH) 
                                                        AND (CURDATE() + 1) 
                                                        AND is_payment_return = " . Yii::$app->params['is_payment_return']['yes'] . "
                                                    GROUP BY MONTH(created_on) ORDER BY created_on");

                $monthwise_cash_add = Query::queryAll("SELECT SUM(total) as total, cr_date
                                                from
                                                (
                                                    SELECT ROUND(SUM(bd.total),2) as total , DATE_FORMAT(o.created_on, '%Y-%m') as cr_date 
                                                    FROM `order` as o
                                                    LEFT JOIN `break_down_receipt` as bd
                                                        ON bd.order_id = o.id
                                                    WHERE o.created_on between date_sub(now(),INTERVAL 12 MONTH) 
                                                        AND (CURDATE() + 1) 
                                                        AND o.is_cancel = 0
                                                        AND bd.payment_type = " . Yii::$app->params['payment_type']['cash'] . 
                                                        " AND ( bd.type = " . Yii::$app->params['break_down_payment_type']['cash_receipt'].
                                                        " OR bd.type = " . Yii::$app->params['break_down_payment_type']['item_wise'].
                                                        " OR bd.type = " . Yii::$app->params['break_down_payment_type']['advance'].
                                                        ")
                                                    GROUP BY MONTH(o.created_on)

                                                    UNION ALL

                                                    SELECT ROUND(SUM(total),2) as total , DATE_FORMAT(created_on, '%Y-%m') as cr_date 
                                                    FROM `order` 
                                                    WHERE created_on between date_sub(now(),INTERVAL 12 MONTH) 
                                                        AND (CURDATE() + 1) 
                                                        AND type = " . Yii::$app->params['order_type']['delivery_charge'].
                                                        " AND payment_type = " . Yii::$app->params['payment_type']['cash'] . "
                                                    GROUP BY MONTH(created_on)

                                                    UNION ALL

                                                    SELECT ROUND(SUM(total),2) as total , DATE_FORMAT(created_on, '%Y-%m') as cr_date
                                                    FROM `break_down_receipt` 
                                                    WHERE created_on between date_sub(now(),INTERVAL 12 MONTH) 
                                                        AND (CURDATE() + 1) 
                                                        AND is_credit_paid = " . Yii::$app->params['is_credit_paid']['yes'].
                                                        " AND debtor_payment_type = " . Yii::$app->params['debtor_payment_type']['cash'] . "
                                                    GROUP BY MONTH(created_on)

                                                    UNION ALL 

                                                    SELECT ROUND(SUM(amount),2) as total , DATE_FORMAT(created_on, '%Y-%m') as cr_date
                                                    FROM `tips` 
                                                    WHERE created_on between date_sub(now(),INTERVAL 12 MONTH) 
                                                        AND (CURDATE() + 1) 
                                                        AND type = " . Yii::$app->params['tip']['received'] . "
                                                    GROUP BY MONTH(created_on)
                                                ) t
                                                GROUP BY cr_date ORDER BY cr_date
                                            ");
            }

            $monthwise_cash_in_true_k = false;
            $monthwise_cash_in_data = [];
            if ($monthwise_cash_add != null) {
                foreach($monthwise_cash_add as $month_cash_add) {
                    $monthwise_cash_in_data[$month_cash_add['cr_date']] = $month_cash_add['total'];
                } 
            }
            
            if ($monthwise_payment_return != null) {
                foreach($monthwise_payment_return as $month_payment_return) {
                    if(array_key_exists($month_payment_return['cr_date'], $monthwise_cash_in_data)) 
                    {
                        $monthwise_cash_in_data[$month_payment_return['cr_date']] -= $month_payment_return['total'];
                    }else 
                    {
                        $monthwise_cash_in_data[$month_payment_return['cr_date']] = '-'.$month_payment_return['total'];
                    }
                } 
            }

            if ($monthwise_cash_in_data != null && max($monthwise_cash_in_data) > 1000) {
                $monthwise_cash_in_true_k = true;
            }

            $begin = new \DateTime( date('Y-m', strtotime('-11 months')) . '-01' );
            $end = new \DateTime( date('Y-m-d')); //, strtotime('+1 months')) );

            $interval = \DateInterval::createFromDateString('1 month');
            $period = new \DatePeriod($begin, $interval, $end);

            $monthwise_cash_in = [];
            foreach ( $period as $dt ) {
                if (isset($monthwise_cash_in_data[$dt->format( 'Y-m' )])) {
                    if ($monthwise_cash_in_true_k) {
                        $monthwise_cash_in[$dt->format( "F" )] = (float) ($monthwise_cash_in_data[$dt->format( 'Y-m' )] / 1000);
                    }
                    else {
                        $monthwise_cash_in[$dt->format( "F" )] = (float) $monthwise_cash_in_data[$dt->format( 'Y-m' )];
                    }
                }
                else {
                    $monthwise_cash_in[$dt->format( "F" )] = 0;
                }
                $monthwise[] = '"' . $dt->format( "F" ) . '"'; 
            }
            $monthwise_cash_in_labels = implode(', ', $monthwise); 
            $monthwise_cash_in_data = implode(', ', $monthwise_cash_in);
            /*monthwise cash in report*/

        /** First & Third Section **/
        
        /** Fifth Section **/

            $fiscal_year_sales_target   = Query::queryOne("SELECT SUM(target) as target FROM `monthly_target`");
            $this_month_sales_target    = Query::queryOne("SELECT target FROM `monthly_target` WHERE month = '". date('F') ."'");

            $todays_sales_target = Query::queryOne("SELECT (target / day(last_day(full_date))) as target FROM `monthly_target` WHERE month = '". date('F') ."'");

            /*$from_date  = (date('m-d') <= "07-16") ? (date('Y')-1).'-7-16' : date('Y').'-7-16';
            $to_date    = (date('m-d') >= "07-15") ? (date('Y')+1).'-7-15' : date('Y').'-7-15';*/

            $temp = explode(":",Yii::$app->session['fiscal_year']);
            $from_date  = $temp[0];
            $to_date    = $temp[1];

            $fiscal_sales  = Query::queryOne("SELECT SUM(sub_total - discount_amount) as total_amount FROM `order` WHERE DATE(created_on) >= '".$from_date."' AND DATE(created_on) <= '".$to_date."' AND is_cancel = 0"); 

            $monthly_sales = Query::queryOne("SELECT SUM(sub_total - discount_amount) as total_amount FROM `order` WHERE YEAR(created_on) = '".date('Y')."' AND MONTH(created_on) = '".date('m')."' AND is_cancel = 0"); 

            $todays_sales  = Query::queryOne("SELECT ROUND(SUM(sub_total - discount_amount),2) as total_amount FROM `order` WHERE DATE(created_on) = '".date('Y-m-d')."' AND is_cancel = 0"); 
            if ($fiscal_sales['total_amount'] == null) {
                $fiscal_sales['percentage'] = 0;
            }
            else {
                $fiscal_sales['percentage'] = 100;
            }
            if ($fiscal_sales['total_amount'] != null && $fiscal_year_sales_target != null) {
                $fiscal_sales['percentage'] = round(( $fiscal_sales['total_amount'] / $fiscal_year_sales_target['target'] ) * 100, 2);
            }

            if ($monthly_sales['total_amount'] == null) {
                $monthly_sales['percentage'] = 0;
            }
            else {
                $monthly_sales['percentage'] = 100;
            }
            if ($monthly_sales['total_amount'] != null && $this_month_sales_target != null) {
                $monthly_sales['percentage'] = round(( $monthly_sales['total_amount'] / $this_month_sales_target['target'] ) * 100, 2);
            }

            if ($todays_sales['total_amount'] == null) {
                $todays_sales['percentage'] = 0;
            }
            else {
                $todays_sales['percentage'] = 100;
            }
            if ($todays_sales['total_amount'] != null && $todays_sales_target != null) {
                $todays_sales['percentage'] = round(( $todays_sales['total_amount'] / $todays_sales_target['target'] ) * 100, 2);
            }

        /** Fifth Section **/

        /** Sixth Section **/

            $best_seller_all = Query::queryAll("SELECT item_id,sum(total_quantity) as total_quantity, item_name
                                                from
                                                (
                                                    SELECT SUM(oi.quantity) as total_quantity, oi.item_id, mi.name as item_name
                                                    FROM `order` as o
                                                    LEFT JOIN `order_items` as oi
                                                        ON oi.order_id = o.id
                                                    LEFT JOIN `menu_item` as mi 
                                                        ON mi.id = oi.item_id
                                                    WHERE o.is_cancel = 0
                                                    AND oi.type = " .Yii::$app->params['item_type']['regular']. "
                                                    GROUP BY oi.item_id

                                                    UNION ALL

                                                    SELECT SUM(fi.quantity) as total_quantity, fi.item_id, mi.name as item_name
                                                    FROM `foc` as f
                                                    LEFT JOIN `foc_items` as fi
                                                        ON fi.foc_id = f.id
                                                    LEFT JOIN `menu_item` as mi 
                                                        ON mi.id = fi.item_id
                                                    WHERE fi.type = " .Yii::$app->params['item_type']['regular']. "
                                                    GROUP BY fi.item_id
                                                ) t
                                                group by item_id ORDER BY total_quantity DESC
                                            ");

            $best_special_item_seller_all = Query::queryOne("SELECT sum(total_quantity) as total_quantity, item_name
                                                from
                                                (
                                                    SELECT SUM(oi.quantity) as total_quantity, oi.item_id, mi.name as item_name
                                                    FROM `order` as o
                                                    LEFT JOIN `order_items` as oi
                                                        ON oi.order_id = o.id
                                                    LEFT JOIN `menu_item` as mi 
                                                        ON mi.id = oi.item_id
                                                    WHERE o.is_cancel = 0
                                                    AND oi.type = " .Yii::$app->params['item_type']['special']. "

                                                    UNION ALL

                                                    SELECT SUM(fi.quantity) as total_quantity, fi.item_id, mi.name as item_name
                                                    FROM `foc` as f
                                                    LEFT JOIN `foc_items` as fi
                                                        ON fi.foc_id = f.id
                                                    LEFT JOIN `menu_item` as mi 
                                                        ON mi.id = fi.item_id
                                                    WHERE fi.type = " .Yii::$app->params['item_type']['special']. "
                                                ) t
                                            ");
                                                /*Query::queryOne("
                                                    SELECT SUM(oi.quantity) as total_quantity
                                                    FROM `order` as o
                                                    LEFT JOIN `order_items` as oi
                                                        ON oi.order_id = o.id
                                                    WHERE o.is_cancel = 0
                                                    AND oi.type = " .Yii::$app->params['item_type']['special']);*/

            $best_seller_today = Query::queryAll("SELECT item_id,sum(total_quantity) as total_quantity, item_name
                                                from
                                                (
                                                    SELECT SUM(oi.quantity) as total_quantity, oi.item_id, mi.name as item_name
                                                    FROM `order` as o
                                                    LEFT JOIN `order_items` as oi
                                                        ON oi.order_id = o.id
                                                    LEFT JOIN `menu_item` as mi 
                                                        ON mi.id = oi.item_id
                                                    WHERE DATE(o.created_on) = '".date('Y-m-d')."'
                                                    AND o.is_cancel = 0
                                                    AND oi.type = " .Yii::$app->params['item_type']['regular']. "
                                                    GROUP BY oi.item_id

                                                    UNION ALL

                                                    SELECT SUM(fi.quantity) as total_quantity, fi.item_id, mi.name as item_name
                                                    FROM `foc` as f
                                                    LEFT JOIN `foc_items` as fi
                                                        ON fi.foc_id = f.id
                                                    LEFT JOIN `menu_item` as mi 
                                                        ON mi.id = fi.item_id
                                                    WHERE DATE(f.created_on) = '".date('Y-m-d')."'
                                                    AND fi.type = " .Yii::$app->params['item_type']['regular']. "
                                                    GROUP BY fi.item_id
                                                ) t
                                                group by item_id ORDER BY total_quantity DESC");

            $best_special_item_seller_today =  Query::queryOne("SELECT sum(total_quantity) as total_quantity, item_name
                                                from
                                                (
                                                    SELECT SUM(oi.quantity) as total_quantity, oi.item_id, mi.name as item_name
                                                    FROM `order` as o
                                                    LEFT JOIN `order_items` as oi
                                                        ON oi.order_id = o.id
                                                    LEFT JOIN `menu_item` as mi 
                                                        ON mi.id = oi.item_id
                                                    WHERE DATE(o.created_on) = '".date('Y-m-d')."'
                                                    AND o.is_cancel = 0
                                                    AND oi.type = " .Yii::$app->params['item_type']['special']. "

                                                    UNION ALL

                                                    SELECT SUM(fi.quantity) as total_quantity, fi.item_id, mi.name as item_name
                                                    FROM `foc` as f
                                                    LEFT JOIN `foc_items` as fi
                                                        ON fi.foc_id = f.id
                                                    LEFT JOIN `menu_item` as mi 
                                                        ON mi.id = fi.item_id
                                                    WHERE DATE(f.created_on) = '".date('Y-m-d')."'
                                                    AND fi.type = " .Yii::$app->params['item_type']['special']. "
                                                ) t");
                                                /*Query::queryOne("
                                                    SELECT SUM(oi.quantity) as total_quantity
                                                    FROM `order` as o
                                                    LEFT JOIN `order_items` as oi
                                                        ON oi.order_id = o.id
                                                    WHERE o.is_cancel = 0
                                                    AND DATE(o.created_on) = '".date('Y-m-d')."'
                                                    AND oi.type = " .Yii::$app->params['item_type']['special']);*/
                                                
            $best_seller_month = Query::queryAll("SELECT item_id,sum(total_quantity) as total_quantity, item_name
                                                from
                                                (
                                                    SELECT SUM(oi.quantity) as total_quantity, oi.item_id, mi.name as item_name
                                                    FROM `order` as o
                                                    LEFT JOIN `order_items` as oi
                                                        ON oi.order_id = o.id
                                                    LEFT JOIN `menu_item` as mi 
                                                        ON mi.id = oi.item_id
                                                    WHERE YEAR(o.created_on) = '".date('Y')."' AND MONTH(o.created_on) = '".date('m')."'
                                                    AND o.is_cancel = 0
                                                    AND oi.type = " .Yii::$app->params['item_type']['regular']. "
                                                    GROUP BY oi.item_id

                                                    UNION ALL

                                                    SELECT SUM(fi.quantity) as total_quantity, fi.item_id, mi.name as item_name
                                                    FROM `foc` as f
                                                    LEFT JOIN `foc_items` as fi
                                                        ON fi.foc_id = f.id
                                                    LEFT JOIN `menu_item` as mi 
                                                        ON mi.id = fi.item_id
                                                    WHERE YEAR(f.created_on) = '".date('Y')."' AND MONTH(f.created_on) = '".date('m')."'
                                                    AND fi.type = " .Yii::$app->params['item_type']['regular']. "
                                                    GROUP BY fi.item_id
                                                ) t
                                                group by item_id ORDER BY total_quantity DESC");

            $best_special_item_seller_month =   Query::queryOne("SELECT sum(total_quantity) as total_quantity, item_name
                                                from
                                                (
                                                    SELECT SUM(oi.quantity) as total_quantity, oi.item_id, mi.name as item_name
                                                    FROM `order` as o
                                                    LEFT JOIN `order_items` as oi
                                                        ON oi.order_id = o.id
                                                    LEFT JOIN `menu_item` as mi 
                                                        ON mi.id = oi.item_id
                                                    WHERE YEAR(o.created_on) = '".date('Y')."' AND MONTH(o.created_on) = '".date('m')."'
                                                    AND o.is_cancel = 0
                                                    AND oi.type = " .Yii::$app->params['item_type']['special']. "

                                                    UNION ALL

                                                    SELECT SUM(fi.quantity) as total_quantity, fi.item_id, mi.name as item_name
                                                    FROM `foc` as f
                                                    LEFT JOIN `foc_items` as fi
                                                        ON fi.foc_id = f.id
                                                    LEFT JOIN `menu_item` as mi 
                                                        ON mi.id = fi.item_id
                                                    WHERE YEAR(f.created_on) = '".date('Y')."' AND MONTH(f.created_on) = '".date('m')."'
                                                    AND fi.type = " .Yii::$app->params['item_type']['special']. "
                                                ) t");

                                                /*Query::queryOne("
                                                    SELECT SUM(oi.quantity) as total_quantity
                                                    FROM `order` as o
                                                    LEFT JOIN `order_items` as oi
                                                        ON oi.order_id = o.id
                                                    WHERE o.is_cancel = 0
                                                    AND YEAR(o.created_on) = '".date('Y')."' AND MONTH(o.created_on) = '".date('m')."'
                                                    AND oi.type = " .Yii::$app->params['item_type']['special']);*/

            $best_seller_year = Query::queryAll("SELECT item_id,sum(total_quantity) as total_quantity, item_name
                                                from
                                                (
                                                    SELECT SUM(oi.quantity) as total_quantity, oi.item_id, mi.name as item_name
                                                    FROM `order` as o
                                                    LEFT JOIN `order_items` as oi
                                                        ON oi.order_id = o.id
                                                    LEFT JOIN `menu_item` as mi 
                                                        ON mi.id = oi.item_id
                                                    WHERE DATE(o.created_on) >= '".$from_date."' AND DATE(o.created_on) <= '".$to_date."'
                                                    AND o.is_cancel = 0
                                                    AND oi.type = " .Yii::$app->params['item_type']['regular']. "
                                                    GROUP BY oi.item_id

                                                    UNION ALL

                                                    SELECT SUM(fi.quantity) as total_quantity, fi.item_id, mi.name as item_name
                                                    FROM `foc` as f
                                                    LEFT JOIN `foc_items` as fi
                                                        ON fi.foc_id = f.id
                                                    LEFT JOIN `menu_item` as mi 
                                                        ON mi.id = fi.item_id
                                                    WHERE DATE(f.created_on) >= '".$from_date."' AND DATE(f.created_on) <= '".$to_date."'
                                                    AND fi.type = " .Yii::$app->params['item_type']['regular']. "
                                                    GROUP BY fi.item_id
                                                ) t
                                                group by item_id ORDER BY total_quantity DESC");

            $best_special_item_seller_year  =   Query::queryOne("SELECT item_id,sum(total_quantity) as total_quantity, item_name
                                                from
                                                (
                                                    SELECT SUM(oi.quantity) as total_quantity, oi.item_id, mi.name as item_name
                                                    FROM `order` as o
                                                    LEFT JOIN `order_items` as oi
                                                        ON oi.order_id = o.id
                                                    LEFT JOIN `menu_item` as mi 
                                                        ON mi.id = oi.item_id
                                                    WHERE DATE(o.created_on) >= '".$from_date."' AND DATE(o.created_on) <= '".$to_date."'
                                                    AND o.is_cancel = 0
                                                    AND oi.type = " .Yii::$app->params['item_type']['special']. "

                                                    UNION ALL

                                                    SELECT SUM(fi.quantity) as total_quantity, fi.item_id, mi.name as item_name
                                                    FROM `foc` as f
                                                    LEFT JOIN `foc_items` as fi
                                                        ON fi.foc_id = f.id
                                                    LEFT JOIN `menu_item` as mi 
                                                        ON mi.id = fi.item_id
                                                    WHERE DATE(f.created_on) >= '".$from_date."' AND DATE(f.created_on) <= '".$to_date."'
                                                    AND fi.type = " .Yii::$app->params['item_type']['special']. "
                                                ) t");                                  
        /** Sixth Section **/

        /** Third Section **/

            $no_of_customer         = Query::queryOne("SELECT SUM(customer_pax) as total FROM `occupy`");
            $total_sales            = Query::queryOne("SELECT ROUND(SUM(sub_total - discount_amount),2) as total FROM `order` WHERE is_cancel = 0");
            $total_tables           = Query::queryOne("SELECT COUNT(id) as total FROM `table_details`");
            $profile                = Query::queryOne("SELECT profile_picture  FROM `user` WHERE id =".Yii::$app->session['eHhupx5UpkLZoXRP_cR1ozEVjY14zWOC0_user']->id);

            if ($total_sales != null && $total_tables != null && $total_tables['total'] > 0) {
                $avg_table_sales    = round( $total_sales['total'] / $total_tables['total'], 2 );
            }
            else {
                $avg_table_sales    = round($total_sales['total'], 2);
            }
            
            if ($total_sales != null && $no_of_customer != null && $no_of_customer['total'] > 0) {
                $avg_sales_per_person   = round( $total_sales['total'] / $no_of_customer['total'], 2 );
            }
            else {
                $avg_sales_per_person   = round( $total_sales['total'], 2 );
            }

            $total_seconds = Query::queryOne("SELECT SUM(TIME_TO_SEC(TIMEDIFF(end_date , start_date)) + TIME_TO_SEC(TIMEDIFF(end_time , start_time))) AS total FROM `occupy` WHERE status = 0 AND end_time != '00:00:00'");

            $total_no_of_occupy = Query::queryOne("SELECT COUNT(id) as total FROM `occupy` WHERE is_occupied = ".Yii::$app->params['is_occupied']['yes']);

            if( $total_seconds['total'] > 0 && $total_no_of_occupy['total'] > 0 ){
                $avg_seconds_per_table = round( $total_seconds['total'] / $total_no_of_occupy['total'] );
            }else {
                $avg_seconds_per_table = 0;
            }
            $hours                          = floor( ( $avg_seconds_per_table / 60 / 60) );
            $minutes                        = floor( ( $avg_seconds_per_table / 60 ) - ( $hours * 60 ) );
            $seconds                        = ( $avg_seconds_per_table ) - (($hours * 60 * 60 ) + ( $minutes * 60 ));
            $avg_time_per_table             = [];
            $avg_time_per_table['hours']    = $hours;
            $avg_time_per_table['minutes']  = $minutes;
            $avg_time_per_table['seconds']  = $seconds;

        /** Third Section **/

        /** Fourth Section **/

            $todays_cash_sales  =   Query::queryOne("SELECT ROUND(SUM(bd.total - bd.service_charge_amount),2) as total 
                                                FROM `order` as o
                                                LEFT JOIN `break_down_receipt` as bd
                                                    ON bd.order_id = o.id
                                                WHERE DATE(o.created_on) = '".date('Y-m-d').
                                                    "' AND o.is_cancel = 0
                                                        AND bd.payment_type = " . Yii::$app->params['payment_type']['cash'] . 
                                                    " AND ( bd.type = " . Yii::$app->params['break_down_payment_type']['cash_receipt'].
                                                    " OR bd.type = " . Yii::$app->params['break_down_payment_type']['item_wise'].
                                                    " OR bd.type = " . Yii::$app->params['break_down_payment_type']['advance'].
                                                    ")
                                                ");

            $todays_cash_sales_service_charge   = Query::queryOne("SELECT ROUND(SUM(bd.service_charge_amount),2) as total FROM `order` as o
                                                    LEFT JOIN `break_down_receipt` as bd
                                                        ON bd.order_id = o.id 
                                                    WHERE DATE(o.created_on) = '".date('Y-m-d').
                                                    "' AND o.is_cancel = 0
                                                        AND bd.payment_type = " . Yii::$app->params['payment_type']['cash'] . 
                                                    " AND ( bd.type = " . Yii::$app->params['break_down_payment_type']['cash_receipt'].
                                                    " OR bd.type = " . Yii::$app->params['break_down_payment_type']['item_wise'].
                                                    " OR bd.type = " . Yii::$app->params['break_down_payment_type']['advance'].
                                                    ")
                                                ");

            $todays_credit_paid     = Query::queryOne("SELECT ROUND(SUM(total),2) as total FROM `break_down_receipt` 
                                                    WHERE DATE(created_on) = '".date('Y-m-d').
                                                    "' AND is_credit_paid = " . Yii::$app->params['is_credit_paid']['yes'].
                                                    " AND debtor_payment_type = " . Yii::$app->params['debtor_payment_type']['cash']);

            $todays_payment_return  = Query::queryOne("SELECT ROUND(SUM(total),2) as total FROM `break_down_receipt` 
                                                    WHERE DATE(created_on) = '".date('Y-m-d').
                                                    "' AND is_payment_return = " . Yii::$app->params['is_payment_return']['yes']);
            
            $todays_tips_received   = Query::queryOne("SELECT ROUND(SUM(amount),2) as total FROM `tips` 
                                                    WHERE DATE(created_on) = '".date('Y-m-d').
                                                    "' AND type = " . Yii::$app->params['tip']['received']);

            $todays_delivery_charge = Query::queryOne("SELECT ROUND(SUM(sub_total),2) as total FROM `order` 
                                                    WHERE DATE(created_on) = '".date('Y-m-d')."' AND type = " . Yii::$app->params['order_type']['delivery_charge'].
                                                    " AND payment_type = " . Yii::$app->params['payment_type']['cash']);

            $todays_cash_in = $todays_cash_sales['total'] + $todays_cash_sales_service_charge['total'] + $todays_delivery_charge['total'] + $todays_tips_received['total'] + $todays_credit_paid['total'] - $todays_payment_return['total'];
            
            $todays_credit_sales    = Query::queryOne("SELECT ROUND(SUM(sub_total - discount_amount),2) as total FROM `order` 
                                                        WHERE DATE(created_on) = '".date('Y-m-d').
                                                        "'AND is_cancel = 0 AND payment_type = " . Yii::$app->params['payment_type']['credit']);
            
            $todays_retail_sales        = Query::queryOne("SELECT ROUND(SUM(sub_total - discount_amount),2) as total FROM `order` 
                                                        WHERE DATE(created_on) = '".date('Y-m-d').
                                                        "' AND is_cancel = 0 AND type = " . Yii::$app->params['order_type']['retail']); 
            
            $todays_take_away_sales      = Query::queryOne("SELECT ROUND(SUM(sub_total - discount_amount),2) as total FROM `order` 
                                                    WHERE DATE(created_on) = '".date('Y-m-d').
                                                    "' AND is_cancel = 0 AND payment_type = " . Yii::$app->params['order_type']['take_away']); 

            $todays_pick_up_sales       = Query::queryOne("SELECT ROUND(SUM(sub_total - discount_amount),2) as total FROM `order` 
                                                    WHERE DATE(created_on) = '".date('Y-m-d').
                                                    "' AND is_cancel = 0 AND type = " . Yii::$app->params['order_type']['pick_up']); 
            
            $todays_delivery_sales      = Query::queryOne("SELECT ROUND(SUM(sub_total - discount_amount),2) as total FROM `order` 
                                                    WHERE DATE(created_on) = '".date('Y-m-d').
                                                    "' AND is_cancel = 0 AND type = " . Yii::$app->params['order_type']['delivery']); 
            $todays_items_sold  =  Query::queryOne("SELECT SUM(total) as total
                                                        from
                                                        (
                                                            SELECT SUM(oi.quantity) as total 
                                                            FROM `order` as o 
                                                            LEFT JOIN `order_items` as oi 
                                                            ON o.id = oi.order_id 
                                                            WHERE DATE(o.created_on) = '" . date('Y-m-d') . "' AND o.is_cancel = 0

                                                            UNION ALL

                                                            SELECT SUM(fi.quantity) as total 
                                                            FROM `foc` as f 
                                                            LEFT JOIN `foc_items` as fi 
                                                            ON f.id = fi.foc_id 
                                                            WHERE DATE(f.created_on) = '" . date('Y-m-d') . "'
                                                        ) t");
            $todays_best_seller = '';
            if($best_seller_today != null) {
                $todays_best_seller = $best_seller_today[0];
            }

            $todays_no_of_customer          = Query::queryOne("SELECT SUM(customer_pax) as total FROM `occupy` 
                                                        WHERE DATE(created_on) = '".date('Y-m-d')."'");

            $todays_service_charge          = Query::queryOne("SELECT ROUND(SUM(service_charge_amount),2) as total FROM `order` 
                                                        WHERE DATE(created_on) = '".date('Y-m-d')."' AND is_cancel = 0");

            $todays_no_of_tables_occupied   = Query::queryOne("SELECT count(table_id) as total 
                                                        FROM `occupy`
                                                        WHERE is_occupied = ".Yii::$app->params['is_occupied']['yes']." AND DATE(created_on) = '".date('Y-m-d')."'
                                                        ");

            $todays_capacity_rate   = Query::queryOne("SELECT ((SUM(o.customer_pax) / c.capacity ) * 100) as total
                                        FROM `occupy` as o
                                        LEFT JOIN `capacity` as c ON c.id = o.capacity_id
                                        WHERE DATE(o.created_on) = '".date('Y-m-d')."'");

            $todays_booked_tables   = Query::queryOne("SELECT count(table_id) as total FROM `booked_tables` 
                                                        WHERE DATE(created_on) = '".date('Y-m-d')."'");

            $todays_booked_occupy   = Query::queryOne("SELECT count(table_id) as total FROM `occupy` 
                                                        WHERE DATE(created_on) = '".date('Y-m-d')."' AND occupy_type = " . Yii::$app->params['occupy_type']['booked']);
            
            if ($todays_booked_tables['total'] > 0 && $todays_booked_tables['total'] > null) {
                $todays_booking_conversion_rate = ( $todays_booked_occupy['total'] / $todays_booked_tables['total'] ) * 100;
            }else {
                $todays_booking_conversion_rate = 0;
            }

            $todays_total_seconds = Query::queryOne("SELECT SUM(TIME_TO_SEC(TIMEDIFF(end_time , start_time))) AS total FROM `occupy` WHERE status = 0 AND end_time != '00:00:00' AND DATE(created_on) = '" . date('Y-m-d') . "'");

            $todays_total_no_of_occupy = Query::queryOne("SELECT COUNT(id) as total FROM `occupy` WHERE DATE(created_on) = '" . date('Y-m-d') . "'");

            if( $todays_total_seconds['total'] > 0 && $todays_total_no_of_occupy['total'] > 0 && $total_no_of_occupy['total'] > 0 ){
                $todays_avg_seconds_per_table = round( $todays_total_seconds['total'] / $total_no_of_occupy['total'] );
            }else {
                $todays_avg_seconds_per_table = 0;
            }
            $todays_hours                          = floor( ( $todays_avg_seconds_per_table / 60 / 60) );
            $todays_minutes                        = floor( ( $todays_avg_seconds_per_table / 60 ) - ( $todays_hours * 60 ) );
            $todays_seconds                        = ( $todays_avg_seconds_per_table ) - (($todays_hours * 60 * 60 ) + ( $todays_minutes * 60 ));
            $todays_avg_time_per_table             = [];
            $todays_avg_time_per_table['hours']    = $todays_hours;
            $todays_avg_time_per_table['minutes']  = $todays_minutes;
            $todays_avg_time_per_table['seconds']  = $todays_seconds;
            
        /** Fourth Section **/

        /** seventh section **/

            $no_of_tables_occupied_week     = Query::queryOne("SELECT count(table_id) as total FROM `occupy` 
                                                        WHERE WEEK(created_on) = WEEK( current_date ) "); 
            $no_of_tables_occupied_month    = Query::queryOne("SELECT count(table_id) as total FROM `occupy` 
                                                        WHERE MONTH(created_on) = MONTH( current_date )");
            $no_of_tables_occupied_year     = Query::queryOne("SELECT count(table_id) as total FROM `occupy` 
                                                        WHERE YEAR(created_on) = YEAR( current_date )");

            if ($total_tables['total'] > 0 && $no_of_tables_occupied_week['total'] > 0) {
                $this_week_occupancy_rate   = round(( $no_of_tables_occupied_week['total'] / $total_tables['total'] ) * 100 , 2);
            }
            else {
                $this_week_occupancy_rate   = 0;
            }

            if ($total_tables['total'] > 0 && $no_of_tables_occupied_month['total'] > 0) {
                $this_month_occupancy_rate   = round(( $no_of_tables_occupied_month['total'] / $total_tables['total'] ) * 100 , 2);
            }
            else {
                $this_month_occupancy_rate  = 0;
            }

            if ($total_tables['total'] > 0 && $no_of_tables_occupied_year['total'] > 0) {
                $this_year_occupancy_rate   = round(( $no_of_tables_occupied_year['total'] / $total_tables['total'] ) * 100 , 2);
            }
            else {
                $this_year_occupancy_rate   = 0;
            }

        /** seventh section **/

        /** Eight Section **/
            $gross_sales_all    = Query::queryAll("SELECT SUM(oi.quantity * oi.price) as total_amount, oi.item_id, oi.type, mi.name as item_name
                                        FROM `order` as o
                                        LEFT JOIN `order_items` as oi
                                            ON oi.order_id = o.id
                                        LEFT JOIN `menu_item` as mi 
                                            ON mi.id = oi.item_id 
                                        WHERE o.is_cancel = 0
                                        GROUP BY oi.item_id, oi.type ORDER BY total_amount DESC"); 
            $gross_sales_all_discount = Query::queryOne("SELECT SUM(discount_amount) as discount_total 
                                                            FROM `order` WHERE is_cancel = 0");

            $gross_sales_today  = Query::queryAll("SELECT SUM(oi.quantity * oi.price) as total_amount, oi.item_id, oi.type, mi.name as item_name
                                            FROM `order` as o
                                            LEFT JOIN `order_items` as oi
                                                ON oi.order_id = o.id
                                            LEFT JOIN `menu_item` as mi 
                                                ON mi.id = oi.item_id 
                                            WHERE DATE(o.created_on) = '".date('Y-m-d')."'
                                            AND o.is_cancel = 0
                                            GROUP BY oi.item_id, oi.type ORDER BY total_amount DESC"); 

            $gross_sales_today_discount = Query::queryOne("SELECT SUM(discount_amount) as discount_total 
                                                            FROM `order` 
                                                            WHERE DATE(created_on) = '".date('Y-m-d')."' AND is_cancel = 0");

            $gross_sales_month  = Query::queryAll("SELECT SUM(oi.quantity * oi.price) as total_amount, oi.item_id, oi.type, mi.name as item_name
                                            FROM `order` as o
                                            LEFT JOIN `order_items` as oi
                                                ON oi.order_id = o.id
                                            LEFT JOIN `menu_item` as mi 
                                                ON mi.id = oi.item_id 
                                            WHERE YEAR(o.created_on) = '".date('Y')."' AND MONTH(o.created_on) = '".date('m')."'
                                            AND o.is_cancel = 0
                                            GROUP BY oi.item_id, oi.type ORDER BY total_amount DESC");

            $gross_sales_month_discount = Query::queryOne("SELECT SUM(discount_amount) as discount_total 
                                                            FROM `order` 
                                                            WHERE YEAR(created_on) = '".date('Y')."' AND MONTH(created_on) = '".date('m')."' AND is_cancel = 0"); 

            $gross_sales_year   = Query::queryAll("SELECT SUM(oi.quantity * oi.price) as total_amount, oi.item_id, oi.type, mi.name as item_name
                                            FROM `order` as o
                                            LEFT JOIN `order_items` as oi
                                                ON oi.order_id = o.id
                                            LEFT JOIN `menu_item` as mi 
                                                ON mi.id = oi.item_id 
                                            WHERE DATE(o.created_on) >= '".$from_date."' AND DATE(o.created_on) <= '".$to_date."'
                                            AND o.is_cancel = 0
                                            GROUP BY oi.item_id, oi.type ORDER BY total_amount DESC"); 

            $gross_sales_year_discount = Query::queryOne("SELECT SUM(discount_amount) as discount_total 
                                                            FROM `order` 
                                                            WHERE DATE(created_on) >= '".$from_date."' AND DATE(created_on) <= '".$to_date."'
                                                             AND is_cancel = 0"); 

            /* --- monthwise capacity rate --- */
            if (date('t') == date('d')) {
                $monthwise_capacity_db  = Query::queryAll("SELECT ((SUM(o.customer_pax) / (c.capacity * day(last_day(o.created_on))) ) * 100) as capacity_rate, 
                                            DATE_FORMAT(o.created_on, '%Y-%m') as cr_date
                                            FROM `occupy` as o
                                            LEFT JOIN `capacity` as c ON c.id = o.capacity_id
                                            WHERE o.created_on between date_sub(now(),INTERVAL 12 MONTH) 
                                            AND CURDATE() GROUP BY MONTH(o.created_on), o.capacity_id  ORDER BY o.created_on ");
            } else {
                $monthwise_capacity_db  = Query::queryAll("SELECT ((SUM(o.customer_pax) / (c.capacity * day(last_day(o.created_on))) ) * 100) as capacity_rate, 
                                            DATE_FORMAT(o.created_on, '%Y-%m') as cr_date
                                            FROM `occupy` as o
                                            LEFT JOIN `capacity` as c ON c.id = o.capacity_id
                                            WHERE o.created_on between date_sub(now(),INTERVAL 12 MONTH) 
                                            AND (CURDATE() + 1) GROUP BY MONTH(o.created_on), o.capacity_id  ORDER BY o.created_on ");
            }
            

            if ($monthwise_capacity_db != null) {
                $temp_date = '';
                $temp_capacity_rate = 0;
                $count = 1;
                foreach($monthwise_capacity_db as $mws) {
                    if($mws['cr_date'] == $temp_date) {
                        $temp_capacity_rate = $mws['capacity_rate'] + $temp_capacity_rate;
                        $count++;
                        $monthwise_capacity_data[$mws['cr_date']] = $temp_capacity_rate / $count;
                    }
                    else {
                        $temp_date = $mws['cr_date'];
                        $temp_capacity_rate = $mws['capacity_rate'];
                        $monthwise_capacity_data[$mws['cr_date']] = $mws['capacity_rate'];
                    }
                }
            }

            $begin = new \DateTime( date('Y-m', strtotime('-11 months')) . '-01' );
            $end = new \DateTime( date('Y-m-d')); //, strtotime('+1 months')) );

            $interval = \DateInterval::createFromDateString('1 month');
            $period = new \DatePeriod($begin, $interval, $end);

            $monthwise_capacity = [];
            foreach ( $period as $dt ) {
                if (isset($monthwise_capacity_data[$dt->format( 'Y-m' )])) {
                    $monthwise_capacity[$dt->format( "F" )] = round((float) $monthwise_capacity_data[$dt->format( 'Y-m' )] , 2);
                }
                else {
                    $monthwise_capacity[$dt->format( "F" )] = 0;
                }
                $monthwise_labels[] = '"' . $dt->format( "F" ) . '"'; 
            }
            $monthwise_capacity_labels = implode(', ', $monthwise_labels); 
            $monthwise_capacity_data = implode(', ', $monthwise_capacity);

            /* --- monthwise capacity rate --- */

        /** Eight Section **/

        $previous_capacity = Query::queryOne("SELECT id, capacity FROM `capacity` WHERE id IN (SELECT MAX(id) FROM `capacity`)");

        return $this->render('index', array(
            'user'                          => $user,
            'weekly_sales_data'             => $weekly_sales_data,
            'weekly_sales_labels'           => $weekly_sales_labels,
            'weekly_sales_true_k'           => $weekly_sales_true_k,
            'weekly_cash_in_data'           => $weekly_cash_in_data,
            'weekly_cash_in_labels'         => $weekly_cash_in_labels,
            'weekly_cash_in_true_k'         => $weekly_cash_in_true_k,
            'monthwise_sales_data'          => $monthwise_sales_data,
            'monthwise_sales_labels'        => $monthwise_sales_labels,
            'monthwise_sales_true_k'        => $monthwise_sales_true_k,
            'monthwise_cash_in_data'        => $monthwise_cash_in_data,
            'monthwise_cash_in_labels'      => $monthwise_cash_in_labels,
            'monthwise_cash_in_true_k'      => $monthwise_cash_in_true_k,
            'best_seller_all'               => $best_seller_all,
            'best_seller_today'             => $best_seller_today,
            'best_seller_month'             => $best_seller_month,
            'best_seller_year'              => $best_seller_year,
            'fiscal_sales'                  => $fiscal_sales,
            'monthly_sales'                 => $monthly_sales,
            'todays_sales'                  => $todays_sales,
            'todays_items_sold'             => $todays_items_sold,
            'todays_cash_sales'             => $todays_cash_sales,
            'todays_credit_sales'           => $todays_credit_sales,
            'todays_credit_paid'            => $todays_credit_paid, 
            'todays_payment_return'         => $todays_payment_return,
            'todays_delivery_charge'        => $todays_delivery_charge,
            'todays_tips_received'          => $todays_tips_received,
            'todays_cash_sales_service_charge' => $todays_cash_sales_service_charge,
            'todays_cash_in'                => number_format((float)$todays_cash_in, 2, '.', ''),
            'todays_retail_sales'           => $todays_retail_sales,
            'todays_take_away_sales'        => $todays_take_away_sales,
            'todays_pick_up_sales'          => $todays_pick_up_sales,
            'todays_delivery_sales'         => $todays_delivery_sales,
            'todays_best_seller'            => $todays_best_seller,
            'todays_no_of_customer'         => $todays_no_of_customer,
            'todays_service_charge'         => $todays_service_charge,
            'todays_no_of_tables_occupied'  => $todays_no_of_tables_occupied,
            'todays_capacity_rate'          => $todays_capacity_rate,
            'todays_booking_conversion_rate'=> $todays_booking_conversion_rate,
            'todays_avg_time_per_table'     => $todays_avg_time_per_table,
            'no_of_customer'                => $no_of_customer,
            'avg_table_sales'               => $avg_table_sales,
            'avg_sales_per_person'          => $avg_sales_per_person,
            'avg_time_per_table'            => $avg_time_per_table,
            'profile'                       => $profile,
            'this_week_occupancy_rate'      => $this_week_occupancy_rate,
            'this_month_occupancy_rate'     => $this_month_occupancy_rate,
            'this_year_occupancy_rate'      => $this_year_occupancy_rate,
            'gross_sales_all'               => $gross_sales_all,
            'gross_sales_all_discount'      => $gross_sales_all_discount, 
            'gross_sales_today'             => $gross_sales_today,
            'gross_sales_today_discount'    => $gross_sales_today_discount,
            'gross_sales_month'             => $gross_sales_month,
            'gross_sales_month_discount'    => $gross_sales_month_discount,
            'gross_sales_year'              => $gross_sales_year,
            'gross_sales_year_discount'     => $gross_sales_year_discount,
            'monthwise_capacity_labels'     => $monthwise_capacity_labels,
            'monthwise_capacity_data'       => $monthwise_capacity_data,
            'previous_capacity'             => $previous_capacity,
            'best_special_item_seller_all'  => $best_special_item_seller_all,
            'best_special_item_seller_today'=> $best_special_item_seller_today,
            'best_special_item_seller_month'=> $best_special_item_seller_month,
            'best_special_item_seller_year' => $best_special_item_seller_year
        ));
    }

    public function actionViewTodaysSalesDetail() 
    {
        if(Yii::$app->request->isAjax) {
            $settings = HSettings::getBasic("'name-in-bill', 'address-in-bill', 'phone-no-in-bill', 'pan-no-in-bill', 'thank-you-note-in-bill', 'service-charge-rate'");
                    
            $service_charge_rate = ($settings['service-charge-rate'] != null && $settings['service-charge-rate-is-active'] != '0') ? $settings['service-charge-rate'] : 0;
            $service_charge_rate_is_active = ($settings['service-charge-rate-is-active'] != null) ? $settings['service-charge-rate-is-active'] : 0;
            
            $data = Query::queryAll("SELECT o.*, u.name as user_name 
                                    FROM `order` AS o
                                    LEFT JOIN `user` AS u
                                        ON u.id = o.created_by
                                    WHERE DATE(o.created_on) = '" . date('Y-m-d') . "' AND o.is_cancel = 0");

            $new_data = '';
            if($data != null) {
                foreach ($data as $row) {
                    $id[] = $row['id'];
                }
                $ids = implode(',', $id);

                $break_down = Query::queryAll("SELECT order_id, total, payment_type FROM `break_down_receipt` WHERE order_id IN (" . $ids . ")");

                foreach ($data as $row) {
                    $row['cash_total']   = 0;
                    $row['card_total']   = 0;
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
                    }else {
                        if($row['payment_type'] == Yii::$app->params['payment_type']['cash']) {
                            $row['cash_total'] = $row['total'];
                        }
                        elseif($row['payment_type'] == Yii::$app->params['payment_type']['credit']) {
                            $row['credit_total'] = $row['total'];
                        }
                        elseif($row['payment_type'] == Yii::$app->params['payment_type']['card']) {
                            $row['card_total'] = $row['total'];
                        }
                    }

                    $new_data[] = $row;
                }
            }  

            echo json_encode(array('data'                           => $new_data,
                                    'settings'                      => $settings,
                                    'service_charge_rate'           => $service_charge_rate,
                                    'service_charge_rate_is_active' => $service_charge_rate_is_active
                                    )); die; 
        }
        echo json_encode(false); die;
    }
}
