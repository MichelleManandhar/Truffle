<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;
use yii\web\HttpException;
use app\models\User;
use app\models\LoginForm;
use app\models\Random;
use app\models\Debtors;
use app\models\CloseDayLog;
use app\models\FiscalYear;

use app\components\Misc;
use app\components\Query;
use app\components\Notify;
use app\components\HelperSettings as HSettings;

class SiteController extends Controller
{
    public function behaviors()
    {
        return [];
    }

    public function beforeAction($action) 
    {   
        $this->layout="login";
        if ($action->id=='error')
            $this->layout ='error';

        if ($this->action->id == 'check-recovery-password') {
            Yii::$app->controller->enableCsrfValidation = false;
        }
        
        return parent::beforeAction($action);
    }

    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ]
        ];
    }

    public function actionIndex()
    {
        $to_group = array('admin');
        
        $group[] = Yii::$app->params['user_role']['superadmin'];
        if (isset($to_group)) {
            foreach($to_group as $to):
                $group[] = Yii::$app->params['user_role'][$to];
            endforeach;
        }

        if (!\Yii::$app->user->isGuest && isset(Yii::$app->session['eHhupx5UpkLZoXRP_cR1ozEVjY14zWOC0_user'])) {

            $bill_config = Query::queryOne("SELECT show_customer_name, show_customer_address , show_pan_no, show_amount_text, show_greeting_note, show_operator_name, width FROM `design_invoice`");

            Yii::$app->session->set('bill_config', $bill_config);
            
            $fiscal_year = Query::queryOne("SELECT * FROM `fiscal_year` ORDER BY id ASC");
            if($fiscal_year == null) {
                $f_year = new FiscalYear();
                $f_year->start_date = date('Y-m-d H:i:s');
                $f_year->is_active  = 1;
                if($f_year->save()){
                    return $this->redirect(Yii::$app->request->baseUrl.'/fiscal-year');
                }else{
                    return $this->redirect(Yii::$app->request->baseUrl.'/site/login');
                }
            }elseif(strtotime($fiscal_year['end_date']) == strtotime('0000-00-00 00:00:00')) {
                return $this->redirect(Yii::$app->request->baseUrl.'/fiscal-year');
            }else {
                $temp_fiscal_year = Query::queryOne("SELECT * FROM `fiscal_year` ORDER BY id DESC");
                if(strtotime(date('Y-m-d')) > strtotime($temp_fiscal_year['end_date'])) {
                    $new_fiscal_year = new FiscalYear();
                    $new_fiscal_year->start_date = date('Y-m-d', strtotime($temp_fiscal_year['end_date']. ' +1 days'));
                    $new_fiscal_year->end_date = date('Y-m-d', strtotime($temp_fiscal_year['end_date']. ' +12 months'));
                    $new_fiscal_year->is_active = 1;
                    $new_fiscal_year->save();
                }

                if (in_array(Yii::$app->session['eHhupx5UpkLZoXRP_cR1ozEVjY14zWOC0_user']->role, $group)) {
                    return $this->redirect(Yii::$app->request->baseUrl.'/dash/');
                } else {
                    $temp = explode(":",Yii::$app->session['fiscal_year']);
                    $starting_fiscal_year_from_date = $temp[0];
                    $starting_fiscal_year_to_date   = $temp[1];

                    if ((date('Y-m-d') < $starting_fiscal_year_from_date) 
                            || ( date('Y-m-d') > date('Y-m-d', strtotime($starting_fiscal_year_to_date. ' + 11 days'))) )
                    {
                        return $this->redirect(Yii::$app->request->baseUrl.'/order/today/');
                    } else {
                        return $this->redirect(Yii::$app->request->baseUrl.'/table/');
                    }
                } 
            }
        }

        $model = new LoginForm();
        $all_fiscal_year = Query::queryAll("SELECT start_date, end_date, is_active FROM `fiscal_year` ORDER BY id DESC");
        if ( isset($_POST['LoginForm']) && $model->load(Yii::$app->request->post(), false) && $model->login()) {

            $settings = HSettings::getBasic("'currency'");
            Yii::$app->session->set('currency', $settings['currency']);

            $bill_config = Query::queryOne("SELECT show_customer_name, show_customer_address , show_pan_no, show_amount_text, show_greeting_note, show_operator_name, width FROM `design_invoice`");
            Yii::$app->session->set('bill_config', $bill_config);

            $latest = Misc::getLatestDate();
            if( $latest != '' && date('Y-m-d') < $latest['latest_date'] ) { 
                Yii::$app->user->logout();
                Yii::$app->session['eHhupx5UpkLZoXRP_cR1ozEVjY14zWOC0_user'] = null;
                Yii::$app->session['fiscal_year'] = null;

                return $this->redirect(Yii::$app->request->baseUrl.'/date-fraud/');
            } 
            else {
                if(isset($_POST['fiscal_year'])) {
                    Yii::$app->session->set('fiscal_year', $_POST['fiscal_year']);
                }

                if(Yii::$app->session['eHhupx5UpkLZoXRP_cR1ozEVjY14zWOC0_user']->role != Yii::$app->params['user_role']['admin']) {
                    $files = glob(Yii::$app->params['real_backup_db_path'].'*.*');
                    if($files != null) {
                        $files = array_combine($files, array_map('filectime', $files));
                        arsort($files);
                        $db_backuped_timestamps = array_values($files);
                        $latest_db_backuped_timestamp = $db_backuped_timestamps[0];
                        if( (date('d') - gmdate("d", $latest_db_backuped_timestamp)) > 2 ) { 
                            Yii::$app->session->setFlash('notice', "Database has not been backuped since a day!");
                        }
                    }
                }

                $log  = CloseDayLog::find()->orderBy(['id' => SORT_DESC])->one();
                if($log != null) {
                    $now = time();
                    $your_date = strtotime($log->log_date);
                    $datediff = $now - $your_date;

                    $diff = floor($datediff / (60 * 60 * 24));
                    if($diff > 3) {
                        Yii::$app->session->setFlash('close_day_alert', "Close day report has not been sent since ".$diff." Days. Please send the close day report");
                    }
                }

                $status = false;

                if(isset(Yii::$app->session['eHhupx5UpkLZoXRP_cR1ozEVjY14zWOC0_user'])) {
                    $user = User::find()->WHERE(['id' => Yii::$app->session['eHhupx5UpkLZoXRP_cR1ozEVjY14zWOC0_user']->id])->one();
                    if($user) {
                        $user->encrypt = md5(uniqid(rand(), true));
                        if($user->update()) {
                            $unique_user_identifier = $user->encrypt;
                            if(Yii::$app->session['eHhupx5UpkLZoXRP_cR1ozEVjY14zWOC0_user']->encrypt != '') {
                                Yii::$app->session['eHhupx5UpkLZoXRP_cR1ozEVjY14zWOC0_user']->encrypt = $user->encrypt;
                            }
                            $status = true;
                        }
                    }
                }

                if($status == true) {
                    //$ip = $_POST['ip'];
                    $ip = $unique_user_identifier;
                    $json_file = Yii::getAlias("@webroot/assets/json/ip.json");
                    $json_array = json_decode(file_get_contents($json_file), true); 
                    $json_array['login'][$ip] = "1";
                    
                    $fp = fopen($json_file, 'w');
                    fwrite($fp, json_encode($json_array));
                    fclose($fp);

                    if(Yii::$app->session['eHhupx5UpkLZoXRP_cR1ozEVjY14zWOC0_user']->role != Yii::$app->params['user_role']['superadmin']) {
                        $log = array(
                            'action' => "<b>" . ucfirst(Yii::$app->session['eHhupx5UpkLZoXRP_cR1ozEVjY14zWOC0_user']->username) . "</b> Logged onto the system",
                            'type' => "user"
                        );
                        Notify::auditLog($log);
                    }

                    $fiscal_year = Query::queryOne("SELECT * FROM `fiscal_year` ORDER BY id ASC");
                    if($fiscal_year == null) {
                        $f_year = new FiscalYear();
                        $f_year->start_date = date('Y-m-d H:i:s');
                        $f_year->is_active  = 1;
                        if($f_year->save()){
                            return $this->redirect(Yii::$app->request->baseUrl.'/fiscal-year');
                        }else{
                            return $this->redirect(Yii::$app->request->baseUrl.'/site/login');
                        }
                    }elseif(strtotime($fiscal_year['end_date']) == strtotime('0000-00-00 00:00:00')) {
                        return $this->redirect(Yii::$app->request->baseUrl.'/fiscal-year');
                    }else {
                        $temp_fiscal_year = Query::queryOne("SELECT * FROM `fiscal_year` ORDER BY id DESC");
                        if(strtotime(date('Y-m-d')) > strtotime($temp_fiscal_year['end_date'])) {
                            $new_fiscal_year = new FiscalYear();
                            $new_fiscal_year->start_date = date('Y-m-d', strtotime($temp_fiscal_year['end_date']. ' +1 days'));
                            $new_fiscal_year->end_date = date('Y-m-d', strtotime($temp_fiscal_year['end_date']. ' +12 months'));
                            $new_fiscal_year->is_active = 1;
                            if($new_fiscal_year->save()){
                                Yii::$app->session->set('fiscal_year', $new_fiscal_year->start_date.':'.$new_fiscal_year->end_date);

                                /*$total_payable = Query::queryAll("SELECT debtor_id , SUM(total) as total
                                                                    FROM `break_down_receipt` 
                                                                    WHERE payment_type = ". Yii::$app->params['payment_type']['credit'] .
                                                                    " AND ( '".$temp_fiscal_year['end_date']."' >= DATE(created_on) AND '".$temp_fiscal_year['start_date']."' <= DATE(created_on) ) 
                                                                    GROUP BY debtor_id");
                                
                                if($total_payable != null) {
                                    $total_credit_paid = Query::queryAll("SELECT debtor_id , SUM(total) as total FROM `break_down_receipt` 
                                                                    WHERE is_credit_paid = " . Yii::$app->params['is_credit_paid']['yes'] . 
                                                                    " AND ('".$temp_fiscal_year['end_date']."' >= DATE(created_on) AND '".$temp_fiscal_year['start_date']."' <= DATE(created_on)) 
                                                                    GROUP BY debtor_id");

                                    foreach ($total_payable as $payable) {
                                        if($total_credit_paid == null) {
                                            $debtor = Debtors::findOne($payable['debtor_id']);
                                            if($debtor) {
                                                $debtor->opening_balance = $debtor->opening_balance + $payable['total'];
                                                $debtor->credit_amount   = 0;
                                                $debtor->paid_amount     = 0;
                                                $debtor->update();
                                            }
                                        }
                                        else{
                                            foreach ($total_credit_paid as $credit_paid) {
                                                if($payable['debtor_id'] == $credit_paid['debtor_id']) {
                                                    $debtor = Debtors::findOne($payable['debtor_id']);
                                                    if($debtor) {
                                                        $debtor->opening_balance = $debtor->opening_balance + $payable['total'] - $credit_paid['total'];
                                                        $debtor->credit_amount  = 0;
                                                        $debtor->paid_amount    = 0;
                                                        $debtor->update();
                                                    }
                                                }
                                            }
                                        }
                                    }
                                }*/
                            }
                        }
                    }

                    $tablet_browser = 0;
                    $mobile_browser = 0;
                     
                    if (preg_match('/(tablet|ipad|playbook)|(android(?!.*(mobi|opera mini)))/i', strtolower($_SERVER['HTTP_USER_AGENT']))) {
                        $tablet_browser++;
                    }
                     
                    if (preg_match('/(up.browser|up.link|mmp|symbian|smartphone|midp|wap|phone|android|iemobile)/i', strtolower($_SERVER['HTTP_USER_AGENT']))) {
                        $mobile_browser++;
                    }
                     
                    if ((strpos(strtolower($_SERVER['HTTP_ACCEPT']),'application/vnd.wap.xhtml+xml') > 0) or ((isset($_SERVER['HTTP_X_WAP_PROFILE']) or isset($_SERVER['HTTP_PROFILE'])))) {
                        $mobile_browser++;
                    }
                     
                    $mobile_ua = strtolower(substr($_SERVER['HTTP_USER_AGENT'], 0, 4));
                    $mobile_agents = array(
                        'w3c ','acs-','alav','alca','amoi','audi','avan','benq','bird','blac',
                        'blaz','brew','cell','cldc','cmd-','dang','doco','eric','hipt','inno',
                        'ipaq','java','jigs','kddi','keji','leno','lg-c','lg-d','lg-g','lge-',
                        'maui','maxo','midp','mits','mmef','mobi','mot-','moto','mwbp','nec-',
                        'newt','noki','palm','pana','pant','phil','play','port','prox',
                        'qwap','sage','sams','sany','sch-','sec-','send','seri','sgh-','shar',
                        'sie-','siem','smal','smar','sony','sph-','symb','t-mo','teli','tim-',
                        'tosh','tsm-','upg1','upsi','vk-v','voda','wap-','wapa','wapi','wapp',
                        'wapr','webc','winw','winw','xda ','xda-');
                     
                    if (in_array($mobile_ua,$mobile_agents)) {
                        $mobile_browser++;
                    }
                     
                    if (strpos(strtolower($_SERVER['HTTP_USER_AGENT']),'opera mini') > 0) {
                        $mobile_browser++;
                        /*Check for tablets on opera mini alternative headers*/
                        $stock_ua = strtolower(isset($_SERVER['HTTP_X_OPERAMINI_PHONE_UA'])?$_SERVER['HTTP_X_OPERAMINI_PHONE_UA']:(isset($_SERVER['HTTP_DEVICE_STOCK_UA'])?$_SERVER['HTTP_DEVICE_STOCK_UA']:''));
                        if (preg_match('/(tablet|ipad|playbook)|(android(?!.*mobile))/i', $stock_ua)) {
                          $tablet_browser++;
                        }
                    }
                    
                    if ($tablet_browser > 0) {
                       Yii::$app->session->set('session_device', 'tablet');
                    }
                    else if ($mobile_browser > 0) {
                        Yii::$app->session->set('session_device', 'mobile');
                    }
                    else {
                        Yii::$app->session->set('session_device', 'desktop');
                    } 

                    if (in_array(Yii::$app->session['eHhupx5UpkLZoXRP_cR1ozEVjY14zWOC0_user']->role, $group)) {
                        return $this->redirect(Yii::$app->request->baseUrl.'/dash/');
                    } else {
                        $temp = explode(":",Yii::$app->session['fiscal_year']);
                        $starting_fiscal_year_from_date = $temp[0];
                        $starting_fiscal_year_to_date   = $temp[1];

                        if ((date('Y-m-d') < $starting_fiscal_year_from_date) 
                                || ( date('Y-m-d') > date('Y-m-d', strtotime($starting_fiscal_year_to_date. ' + 11 days'))) )
                        {
                            return $this->redirect(Yii::$app->request->baseUrl.'/order/today/');
                        } else {
                            if (Yii::$app->session['session_device'] == 'tablet') {
                               return $this->redirect(Yii::$app->request->baseUrl.'/table/');
                            }
                            else if (Yii::$app->session['session_device'] == 'mobile') {
                                return $this->redirect(Yii::$app->request->baseUrl.'/table/index-small');
                            }
                            elseif(Yii::$app->session['session_device'] == 'desktop') {
                                return $this->redirect(Yii::$app->request->baseUrl.'/table/');
                            } 
                        }
                    }
                }
            }
        }

        return $this->render('login', [
            'model' => $model,
            'fiscal_year' => $all_fiscal_year
        ]);
    }


    public function actionLogout()
    {  
        if(isset(Yii::$app->session['eHhupx5UpkLZoXRP_cR1ozEVjY14zWOC0_user'])){
            if(Yii::$app->session['eHhupx5UpkLZoXRP_cR1ozEVjY14zWOC0_user']->role != Yii::$app->params['user_role']['superadmin']) {
                $log = array(
                    'action' => "<b>" . ucfirst(Yii::$app->session['eHhupx5UpkLZoXRP_cR1ozEVjY14zWOC0_user']->username) . "</b> Logged out of the system",
                    'type' => "user"
                );
                Notify::auditLog($log);
            }
        }
        
        Yii::$app->user->logout();
        Yii::$app->session['eHhupx5UpkLZoXRP_cR1ozEVjY14zWOC0_user'] = null;
        Yii::$app->session['fiscal_year'] = null;
        return $this->redirect(Yii::$app->params['domain']);
    }

    public function actionProcessingLogout() 
    {   
        $db_log = array(
            'action' => "Database has been backuped by the user <b>" . ucfirst(Yii::$app->session['eHhupx5UpkLZoXRP_cR1ozEVjY14zWOC0_user']->username) . "</b>",
            'type' => "database"
        );
        Notify::auditLog($db_log);

        $data = 'Database has been backup By ' . ucfirst(Yii::$app->session['eHhupx5UpkLZoXRP_cR1ozEVjY14zWOC0_user']->username) . ' on ' . date('Y-m-d H:i:s');
        $file = 'backup.txt';
        if(!file_exists('log' . DIRECTORY_SEPARATOR . $file)) {
            $handle = fopen('log' . DIRECTORY_SEPARATOR . $file ,'wr');
            fwrite($handle,$data);
        } else {
            $handle = fopen('log' . DIRECTORY_SEPARATOR . $file ,'a');
            fwrite($handle, "\n". $data);
        }
        
        fclose($handle);
        
        return $this->render('db_backup_local');
    }
}