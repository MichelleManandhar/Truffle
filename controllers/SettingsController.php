<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of SettingsController
 *
 * @author gaurav maharjan
 */

namespace app\controllers;

use Yii;
use yii\web\Controller;
use app\components\Misc;
use yii\web\HttpException;
use app\components\HelperSettings as HSettings;

class SettingsController extends Controller {

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
        return $this->render('index', array('settings' => HSettings::getSettings()));
    }

    public function actionAdd() 
    {
        $latest = Misc::getLatestDate();
        if( $latest != '' && date('Y-m-d') < $latest['latest_date'] ) { 
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
                if (Yii::$app->request->isAjax) {
                    echo json_encode(HSettings::addSetting($_POST)); die;
                }
                echo json_encode(FALSE); die;
            }
        }
    }

    public function actionEditable() 
    {
        $latest = Misc::getLatestDate();
        if( $latest != '' && date('Y-m-d') < $latest['latest_date'] ) { 
            echo json_encode(array(
                                'status' => 'error', 
                                'display_value' => $_POST['old_value'],
                                'msg' => 'Sorry! Could not update settings value at this time.'
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
                if (Yii::$app->request->isAjax) {
                    if ($_POST['name'] == 'field_name') {
                        //check for uniqueness before updating
                        if (!HSettings::checkSetting(htmlspecialchars(trim($_POST['value']), ENT_QUOTES), $_POST['pk'], $_POST['name'])) {
                            if (HSettings::editableSetting(htmlspecialchars(trim($_POST['value']), ENT_QUOTES), $_POST['pk'], $_POST['name'], $_POST['old_value'])) {
                                echo json_encode(array(
                                                'status' => 'success', 
                                                'display_value' => $_POST['value'], 
                                                'msg' => 'Your settings value has been updated.'
                                                )); die;
                            }
                        } else {
                            echo json_encode(array(
                                            'status' => 'error', 
                                            'display_value' => $_POST['old_value'], 
                                            'msg' => 'Setting detail already exists in the system. This field value needs to be a unique one.'
                                            )); die;
                        }
                    } 
                    else {
                        if (HSettings::editableSetting(htmlspecialchars(trim($_POST['value']), ENT_QUOTES), $_POST['pk'], $_POST['name'], $_POST['old_value'])) {
                            echo json_encode(array(
                                            'status' => 'success', 
                                            'display_value' => $_POST['value'], 
                                            'msg' => 'Your settings value has been updated.'
                                            )); die;
                        }
                    }
                }
                echo json_encode(array(
                                'status' => 'error', 
                                'display_value' => $_POST['old_value'],
                                'msg' => 'Sorry! Could not update settings value at this time.'
                                )); die;
            }
        }
    }

    public function actionCheck() 
    { 
        if (Misc::if_exists($_POST['field_name']) && Yii::$app->request->isAjax) {
            echo json_encode(!HSettings::checkSetting($_POST['field_name'], 0, 'field_name')); die;
        }
        echo json_encode(FALSE); die;
    }

    public function actionDelete() 
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
                if (Yii::$app->request->isAjax) {
                    echo json_encode(HSettings::deleteSetting(htmlspecialchars(trim($_POST['id']), ENT_QUOTES))); die;
                }
                echo json_encode(FALSE); die;
            }
        }
    }

    public function actionGet() 
    {
        if (Yii::$app->request->isAjax) {
            if ($data = HSettings::getBasic($_POST['fields'])) {
                foreach($data as $key => $d) :
                    $settings[str_replace('-', '_', $key)] = $d;
                endforeach;
                echo json_encode($settings); die;
            }
        }
        echo json_encode(FALSE); die;
    }
}
