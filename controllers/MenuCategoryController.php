<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of MenuCategoryController
 *
 * @author gaurav maharjan
 */

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\HttpException;

use app\components\Misc;
use app\components\Query;
use app\components\Notify;
use app\components\HelperMenuCategory as HMenuCat;

class MenuCategoryController extends Controller {

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
        $bill_types = Query::queryAll("SELECT id, name FROM `printers` WHERE name != 'bill'");
        return $this->render('index', array('categories' => HMenuCat::getMenuCategories() , 'bill_types' => $bill_types));
    }

    public function actionAdd() 
    {
        $latest = Misc::getLatestDate();
        if($latest != '' &&  date('Y-m-d') < $latest['latest_date'] ) { 
            echo json_encode(false); die;
        }else {
            $temp = explode(":",Yii::$app->session['fiscal_year']);
            $starting_fiscal_year_from_date = $temp[0];
            $starting_fiscal_year_to_date   = $temp[1];

            if ((date('Y-m-d') < $starting_fiscal_year_from_date) 
                    || ( date('Y-m-d') > date('Y-m-d', strtotime($starting_fiscal_year_to_date. ' + 11 days'))) )
            {
                throw new HttpException(404, 'Page not found.');
            } else {
                if (Yii::$app->request->isAjax) {
                    echo json_encode(HMenuCat::addMenuCategory($_POST)); die;
                }
                echo json_encode(FALSE); die;
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
                                'msg' => 'Sorry! Could not update menu item at this time.'
                                )); die;
        }else {
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
                    /*check for uniqueness before updating*/
                    if (!HMenuCat::checkMenuCategory(htmlspecialchars(trim($_POST['value']), ENT_QUOTES), $_POST['pk'], $_POST['name'])) {
                        if (HMenuCat::editableMenuCategory(htmlspecialchars(trim($_POST['value']), ENT_QUOTES), $_POST['pk'], $_POST['name'])) {
                            echo json_encode(array(
                                            'status' => 'success', 
                                            'display_value' => $_POST['value'], 
                                            'msg' => 'Your Menu Category value has been updated.'
                                            )); die;
                        }
                    } else {
                        echo json_encode(array(
                                        'status' => 'error', 
                                        'display_value' => $_POST['old_value'], 
                                        'msg' => 'Menu Category already exists in the system. Menu Category needs to be a unique one.'
                                        )); die;
                    }
                }
                echo json_encode(array(
                                'status' => 'error', 
                                'display_value' => $_POST['old_value'],
                                'msg' => 'Sorry! Could not update menu item at this time.'
                                )); die;
            }
        }
    }

    public function actionEditableSelect() 
    {
        $latest = Misc::getLatestDate();
        if($latest != '' &&  date('Y-m-d') < $latest['latest_date'] ) { 
            echo json_encode(array(
                                'status' => 'error', 
                                'display_value' => $_POST['old_value'],
                                'msg' => 'Sorry! Could not update menu item at this time.'
                                )); die;
        }else {
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
                    if (HMenuCat::editableMenuCategory(htmlspecialchars(trim($_POST['value']), ENT_QUOTES), $_POST['pk'], $_POST['name'])) {
                        echo json_encode(array(
                                        'status' => 'success', 
                                        'display_value' => $_POST['value'], 
                                        'msg' => 'Your Menu Category value has been updated.'
                                        )); die;
                    }
                }
                echo json_encode(array(
                                'status' => 'error', 
                                'display_value' => $_POST['old_value'],
                                'msg' => 'Sorry! Could not update menu item at this time.'
                                )); die;
            }
        }
    }

    public function actionCheck() 
    { 
        if (Misc::if_exists($_POST['category']) && Yii::$app->request->isAjax) {
            echo json_encode(!HMenuCat::checkMenuCategory(htmlspecialchars(trim($_POST['category']), ENT_QUOTES), 0, 'category')); die;
        }
        echo json_encode(FALSE); die;
    }

    public function actionGet() 
    {
        if (Yii::$app->request->isAjax) {
            if ($data = HMenuCat::getMenuCategory('slug', htmlspecialchars(trim($_POST['category']), ENT_QUOTES))) {
                echo json_encode($data); die;
            }
        }
        echo json_encode(FALSE); die;
    }

    public function actionGetCategoryByMenuItem() 
    {
        if (Yii::$app->request->isAjax && isset($_POST) && $_POST['item_ids'] != '') {
            if ($data = HMenuCat::getMenuCategoryByMenuItem($_POST['item_ids'])) {
                echo json_encode($data); die;
            }
        }
        echo json_encode(FALSE); die;
    }

    public function actionSorting() 
    {
        $latest = Misc::getLatestDate();
        if($latest != '' &&  date('Y-m-d') < $latest['latest_date'] ) { 
            return $this->redirect(Yii::$app->request->baseUrl . '/date-fraud/');
        }else {
            return $this->render('sorting', array('categories' => HMenuCat::getMenuCategories()));
        }
    }

    public function actionManageOrder()
    {
        $latest = Misc::getLatestDate();
        if($latest != '' &&  date('Y-m-d') < $latest['latest_date'] ) { 
            echo json_encode(false); die;
        }else {
            $temp = explode(":",Yii::$app->session['fiscal_year']);
            $starting_fiscal_year_from_date = $temp[0];
            $starting_fiscal_year_to_date   = $temp[1];
            if ((date('Y-m-d') < $starting_fiscal_year_from_date) 
                    || ( date('Y-m-d') > date('Y-m-d', strtotime($starting_fiscal_year_to_date. ' + 11 days'))) )
            {
                echo json_encode(false); die;
            } else {
                if (Yii::$app->request->isAjax) {
                    if (HMenuCat::manageOrder($_GET['categories'])) {
                        $log = array(
                            'action' => "Menu category order has been updated",
                            'type' => "menu"
                        );
                        Notify::auditLog($log);

                        echo json_encode(TRUE); die;
                    }
                }
                echo json_encode(FALSE); die;
            }
        }
    }
}
