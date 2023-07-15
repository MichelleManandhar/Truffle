<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of CommonController
 *
 * @author gaurav maharjan
 */

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;

use app\components\Sync;
use app\components\Notify;
use app\components\Misc;
use app\components\Cipher;
use app\components\Pdf;
use app\components\HelperPrinter as HPrinter;
use app\components\HelperMenuItem as HMenu;
use app\components\HelperMenuCategory as HMenuCategory;
use app\models\User;
use app\models\Order;
use app\components\HelperSettings as HSettings;

/*ini_set('memory_limit','900M');
ini_set('max_execution_time','8000000');
set_time_limit(0);*/


class CommonController extends Controller {

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

    public function actionCheckPinCode()
    {
        $user = User::findOne(Yii::$app->session['eHhupx5UpkLZoXRP_cR1ozEVjY14zWOC0_user']->id);
        $settings = HSettings::getBasic("'master-password'");

        if (isset($_POST['pin']) && $_POST['pin'] == $settings['master-password']) {

            Yii::$app->session['master-password'] = true;
            Yii::$app->session['discount'] = true;
            echo json_encode(['max_discount' => 100]); die;
        }
        if ($user && isset($_POST['pin']) && (int) Cipher::decrypt($user->pin, $user->salt) == $_POST['pin']) {

            Yii::$app->session['discount'] = true;
            echo json_encode(['max_discount' => $user->discount_upto]); die;
        }
        echo json_encode(FALSE); die;
    }

    public function actionCheckCancelPassword()
    {       
        if (Yii::$app->request->isAjax) {
            $settings = HSettings::getBasic("'cancel-order-password'");
            if (isset($_POST['password']) && $_POST['password'] == $settings['cancel-order-password']) {
            echo json_encode(TRUE); die;
            }       
        }
        echo json_encode(FALSE); die;
    }

    public function actionChangePassword()
    {
        $latest = Misc::getLatestDate();
        if($latest != '' &&  date('Y-m-d') < $latest['latest_date'] ) { 
            echo json_encode(false); die;
        } else {
            if (Yii::$app->request->isAjax) {
                if (Misc::if_exists($_POST['old_password']) && Misc::if_exists($_POST['new_password']) && Misc::if_exists($_POST['re_password'])) {
                    $user = User::findOne(Yii::$app->session['eHhupx5UpkLZoXRP_cR1ozEVjY14zWOC0_user']->id);
                    if ($user != null && $user->validatePassword(htmlspecialchars(trim($_POST['old_password']), ENT_QUOTES))) {
                        
                        $user->setPassword(htmlspecialchars(trim($_POST['new_password']), ENT_QUOTES));
                        if ($user->update()) {
                            $log = array(
                                'action' => "Changed password of user -" . $user->name . "'" . $user->username . "'",
                                'type' => "user"
                            );
                            Notify::auditLog($log);

                            echo json_encode(true); die;
                        } 
                    }
                    echo json_encode(array('status' => 'error', 'msg' => 'Sorry! your old password did not match.')); die;
                }
            }
            echo json_encode(FALSE); die;
        }
    }

    public function actionChangePinCode()
    {
        $latest = Misc::getLatestDate();
        if($latest != '' &&  date('Y-m-d') < $latest['latest_date'] ) { 
            echo json_encode(false); die;
        } else {
            if (Yii::$app->request->isAjax) {
                if (Misc::if_exists($_POST['new_pin']) && Misc::if_exists($_POST['re_pin']) && Misc::if_exists($_POST['password'])) {
                    $user = User::findOne(Yii::$app->session['eHhupx5UpkLZoXRP_cR1ozEVjY14zWOC0_user']->id);
                    if ($user != null && $user->validatePassword(htmlspecialchars(trim($_POST['password']), ENT_QUOTES))) {
                        
                        if ($_POST['new_pin'] == $_POST['re_pin']) {
                            if (strlen($_POST['new_pin']) == 4) {

                                $salt = Misc::garbage(8); 
                                $pin_hash = Cipher::encrypt(htmlspecialchars(trim($_POST['new_pin']), ENT_QUOTES), $salt);

                                $user->pin  = $pin_hash;
                                $user->salt = $salt;
                                if ($user->update()) {

                                    $log = array(
                                        'action' => "Changed pin code of user -" . $user->name . "'" . $user->username . "'",
                                        'type' => "user"
                                    );
                                    Notify::auditLog($log);

                                    echo json_encode(true); die;
                                }
                            }
                        }
                    }
                    echo json_encode(array('status' => 'error', 'msg' => 'Sorry! your password did not match.')); die;
                }
            }
            echo json_encode(FALSE); die;
        }
    }

    public function actionCheckPassword()
    {
        if (Yii::$app->request->isAjax) {
            $user = User::findOne(Yii::$app->session['eHhupx5UpkLZoXRP_cR1ozEVjY14zWOC0_user']->id);
            if ($user->validatePassword(htmlspecialchars(trim($_POST['password']), ENT_QUOTES) )) {
                echo json_encode(TRUE); die;
            } else {
               echo json_encode(FALSE); die;
            }
        }
        echo json_encode(FALSE); die;
    }

    public function actionUploadFiles()
    {
        $latest = Misc::getLatestDate();
        if($latest != '' &&  date('Y-m-d') < $latest['latest_date'] ) { 
            echo json_encode(false); die;
        } else {
            if ($return = Misc::uploadFile($_FILES['image_file'], 'upload')) {
                echo json_encode($return); die;
            }
            echo json_encode(FALSE); die;
        }
    }

    public function actionUploadExcelFile()
    {   
        $latest = Misc::getLatestDate();
        if($latest != '' &&  date('Y-m-d') < $latest['latest_date'] ) { 
            echo json_encode(false); die;
        } else {
            if(isset($_FILES) && $_FILES != null) {
                if ($return = Misc::uploadFile($_FILES['excel_file'], 'menu')) {
                    $data = [];
                    $i=0;
                    foreach ($return['data'] as $upload_menu_items) { $i++;
                        $category   = HMenuCategory::getMenuCategoryIdByName($upload_menu_items['category']);
                        $db_menu_items  = HMenu::getMenuItemsByCategory($category['id']);
                        $j=0;
                        $data[$i]['category'] = $upload_menu_items['category'];
                        foreach ($upload_menu_items['items'] as $key => $upload_menu_item) { $j++;
                            $data[$i]['items'][$j][0] = $upload_menu_item[0];
                            $data[$i]['items'][$j][1] = $upload_menu_item[1];
                            $data[$i]['items'][$j][2] = $upload_menu_item[2]; 
                            $data[$i]['items'][$j][3] = ''; 
                            foreach($db_menu_items as $db_menu_item) {
                                if( strcasecmp(trim($upload_menu_item[0]) , trim($db_menu_item['name'])) == 0 ) {
                                    $data[$i]['items'][$j][3] = 'same'; 
                                }
                            }
                        }
                    }
                    echo json_encode(array('return' => $return , 'data' => $data)); die;
                }
            }
            echo json_encode(FALSE); die;
        }
    }

    public function actionProfileUploadFiles()
    {   
        $latest = Misc::getLatestDate();
        if($latest != '' &&  date('Y-m-d') < $latest['latest_date'] ) { 
            echo json_encode(false); die;
        } else {
            if ($return = Misc::uploadFile($_FILES['image_file'], 'profile-picture')) {
                echo json_encode($return); die;
            }
            echo json_encode(FALSE); die;
        }
    }

    public function actionMasterReset() /* -- other client devices must logout before using this function -- */
    {
        Misc::resetData('table', '{"bool":{},"data":{}}');
        Misc::resetData('obstacle', '{"bool":{},"data":{}}');
        $ip = Sync::get_client_ip();
        $json_array['login'][$ip] = "1";
        Misc::resetData('ip', json_encode($json_array));
    }
}
