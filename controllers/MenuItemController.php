<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of MenuItemController
 *
 * @author gaurav maharjan
 */

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\HttpException;
use app\components\Notify;
use app\components\Misc;
use app\components\Query;
use app\components\HelperMenuItem as HMenu;
use app\components\HelperMenuCategory as HMenuCat;

class MenuItemController extends Controller {

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
        $categories='';
        $category = HMenuCat::getMenuCategories();
        foreach($category as $cat) : 
            $categories[] = ['value' => $cat['id'], 'text' => $cat['category']]; 
        endforeach;

        return $this->render('index', array(
            'items'      => HMenu::getMenuItems(),
            'categories' => $categories
        ));
    }

    public function actionCreate() 
    {
        $latest = Misc::getLatestDate();
        if($latest != '' &&  date('Y-m-d') < $latest['latest_date'] ) { 
            return $this->redirect(Yii::$app->request->baseUrl.'/date-fraud/');
        }else {
            $temp = explode(":",Yii::$app->session['fiscal_year']);
            $starting_fiscal_year_from_date = $temp[0];
            $starting_fiscal_year_to_date   = $temp[1];

            if ((date('Y-m-d') < $starting_fiscal_year_from_date) 
                    || ( date('Y-m-d') > date('Y-m-d', strtotime($starting_fiscal_year_to_date. ' + 11 days'))) )
            {
                throw new HttpException(404, 'Page not found.');
            } else {
                $categories = HMenuCat::getMenuCategories();
                return $this->render('create', array(
                    'categories' => $categories
                ));
            }
        }
    }

    public function actionUpdate($id) 
    {
        $latest = Misc::getLatestDate();
        if($latest != '' &&  date('Y-m-d') < $latest['latest_date'] ) { 
            return $this->redirect(Yii::$app->request->baseUrl.'/date-fraud/');
        }else {
            $temp = explode(":",Yii::$app->session['fiscal_year']);
            $starting_fiscal_year_from_date = $temp[0];
            $starting_fiscal_year_to_date   = $temp[1];

            if ((date('Y-m-d') < $starting_fiscal_year_from_date) 
                    || ( date('Y-m-d') > date('Y-m-d', strtotime($starting_fiscal_year_to_date. ' + 11 days'))) )
            {
                throw new HttpException(404, 'Page not found.');
            } else {
                $item = HMenu::getMenuItem('id', $id);
                if ($item != null) {
                    return $this->render('update', array('item' => $item));
                }
                else {
                    throw new HttpException(404, 'Page not found.');
                }
            }
        }
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
                echo json_encode(false); die;
            } else {
                if (Yii::$app->request->isAjax) {
                    echo json_encode(HMenu::addMenuItem($_POST)); die;
                }
                echo json_encode(FALSE); die;
            }
        }
    }

    public function actionViewStock($id)
    {
        $item = HMenu::getStock('id',htmlspecialchars($id,ENT_QUOTES));
        $recepie =Query::queryAll("SELECT s.name ,s.quantity_type,sm.used_quantity
                                    FROM stock_items as s 
                                    LEFT JOIN menu_stock_items as sm 
                                        ON s.id =sm.stock_item_id 
                                    WHERE `menu_item_id` = ".htmlspecialchars($item['id'], ENT_QUOTES));

        $menu_item_price = HMenu::getMenuItemsPrice($id);

        return $this->render('view-stock', array(
            'item' => $item,
            'item_price' => $menu_item_price,
            'recepie' => $recepie));
    }

    public function actionEditStock($id)
    {
        $latest = Misc::getLatestDate();
        if($latest != '' &&  date('Y-m-d') < $latest['latest_date'] ) { 
            return $this->redirect(Yii::$app->request->baseUrl . '/date-fraud/');
        }else {
            $temp = explode(":",Yii::$app->session['fiscal_year']);
            $starting_fiscal_year_from_date = $temp[0];
            $starting_fiscal_year_to_date   = $temp[1];

            if ((date('Y-m-d') < $starting_fiscal_year_from_date) 
                    || ( date('Y-m-d') > date('Y-m-d', strtotime($starting_fiscal_year_to_date. ' + 11 days'))) )
            {
                throw new HttpException(404, 'Page not found.');
            } else {
                $item = HMenu::getStock('id',$id);
                if($item != null) {
                    $recepie =Query::queryAll("SELECT s.id,s.name ,s.quantity_type,sm.used_quantity
                                            FROM stock_items as s 
                                            LEFT JOIN menu_stock_items as sm 
                                                ON s.id =sm.stock_item_id 
                                            WHERE `menu_item_id` = ".htmlspecialchars($item['id'], ENT_QUOTES));
                    return $this->render('edit-stock', array(
                         'item' => $item,
                         'recepie' => $recepie));
                }else{
                    throw new HttpException(404, 'Page not found.');
                }
            }
        }
        
    }

    public function actionStockEdit()
    {
        $latest = Misc::getLatestDate();
        if( $latest != '' && date('Y-m-d') < $latest['latest_date'] ) { 
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
                    echo json_encode(HMenu::editStockItem($_POST, $_POST['id'])); die;
                }
                echo json_encode(FALSE); die;
            }
        }
    }
    
    public function actionAddUploadedMenu() 
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
                if (Yii::$app->request->isAjax && isset($_POST) && $_POST['excel'] != null) {
                    echo json_encode(HMenu::addUploadedMenuItem($_POST)); die;
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
                    if ($_POST['name'] == 'name') {
                //check for uniqueness before updating
                if (!HMenu::checkMenuItem(htmlspecialchars(trim($_POST['value']), ENT_QUOTES), $_POST['pk'], $_POST['name'])) {
                    if (HMenu::editableMenuItem(htmlspecialchars(trim($_POST['value']), ENT_QUOTES), $_POST['pk'], $_POST['name'])) {
                        echo json_encode(array(
                                        'status' => 'success',
                                        'display_value' => $_POST['value'],
                                        'msg' => 'Your Menu Item value has been updated.'
                                        )); die;
                    }
                }
                else {
                    echo json_encode(array(
                                    'status' => 'error',
                                    'display_value' => $_POST['old_value'],
                                    'msg' => 'Menu Item already exists in the system. Menu Item needs to be a unique one.'
                                    )); die;
                }
            }
            elseif ($_POST['name'] == 'price') {
                if (HMenu::editableMenuItem(htmlspecialchars(trim($_POST['value']), ENT_QUOTES), $_POST['pk'], $_POST['name'])) {
                    $log = array(
                        'action' => 'Menu Item id '.$_POST['pk'].' price has been changed from '.$_POST['old_value'].' to '.$_POST['value'].'.',
                        'type' => "menu"
                    );
                    Notify::auditLog($log);
                    echo json_encode(array(
                                    'status' => 'success',
                                    'display_value' => $_POST['value'],
                                    'msg' => 'Menu Item id '.$_POST['pk'].' price has been changed from '.$_POST['old_value'].' to '.$_POST['value'].'.'
                                    )); die;
                }
            }
            else {
                if (HMenu::editableMenuItem(htmlspecialchars(trim($_POST['value']), ENT_QUOTES), $_POST['pk'], $_POST['name'])) {
                    echo json_encode(array(
                                    'status' => 'success',
                                    'display_value' => $_POST['value'],
                                    'msg' => 'Your Menu Item has been updated.'
                                    )); die;
                }
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

    public function actionEditImage() 
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
                    echo json_encode(HMenu::editImageMenuItem($_POST['id'], $_POST['image'])); die;
                }
                echo json_encode(FALSE); die;
            }
        }
    }

    public function actionDeleteImage() 
    {
        $latest = Misc::getLatestDate();
        if( $latest != '' && date('Y-m-d') < $latest['latest_date'] ) { 
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
                    echo json_encode(HMenu::deleteImageMenuItem($_POST['id'])); die;
                }
                echo json_encode(FALSE); die;
            }
        }
    }

    public function actionCheck() 
    { 
        if (Misc::if_exists($_POST['name']) && Yii::$app->request->isAjax) {
            if(array_key_exists('id', $_POST) && Misc::if_exists($_POST['id'])){
                echo json_encode(!HMenu::checkMenuItem(htmlspecialchars(trim($_POST['name']), ENT_QUOTES), $_POST['id'], 'name')); die;
            }else{
                echo json_encode(!HMenu::checkMenuItem(htmlspecialchars(trim($_POST['name']), ENT_QUOTES), 0, 'name')); die;
            }
        }
        echo json_encode(FALSE); die;
    }

    public function actionGet() 
    {
        if (Yii::$app->request->isAjax) {
            if ($data = HMenu::getMenuItem('slug', htmlspecialchars(trim($_POST['item']), ENT_QUOTES))) {
                echo json_encode($data); die;
            }
        }
        echo json_encode(FALSE); die;
    }

    public function actionSorting() 
    {
        $latest = Misc::getLatestDate();
        if( $latest != '' && date('Y-m-d') < $latest['latest_date'] ) { 
            return $this->redirect(Yii::$app->request->baseUrl . '/date-fraud/');
        } else {
            return $this->render('sorting', array('items' => HMenu::getMenuItems()));
        }
    }

    public function actionSortingByCategory($slug) 
    {
        $latest = Misc::getLatestDate();
        if( $latest != '' && date('Y-m-d') < $latest['latest_date'] ) { 
            return $this->redirect(Yii::$app->request->baseUrl . '/date-fraud/');
        }else {
            $temp = explode(":",Yii::$app->session['fiscal_year']);
            $starting_fiscal_year_from_date = $temp[0];
            $starting_fiscal_year_to_date   = $temp[1];

            if ((date('Y-m-d') < $starting_fiscal_year_from_date) 
                    || ( date('Y-m-d') > date('Y-m-d', strtotime($starting_fiscal_year_to_date. ' + 11 days'))) )
            {
                throw new HttpException(404, 'Page not found.');
            } else {
                if ($slug != null) {
                    $category = HMenuCat::getMenuCategory('slug', $slug);
                    if ($category != null) {
                        return $this->render('sorting_by', array(
                            'category' => $category['category'],
                            'items' => HMenu::getMenuItemsByCategory($category['id'])
                        ));
                    }
                }
                return $this->redirect(Yii::$app->request->baseUrl.'/menu-category/');
            }
        }
    }

    public function actionManageOrder()
    {
        $latest = Misc::getLatestDate();
        if( $latest != '' && date('Y-m-d') < $latest['latest_date'] ) { 
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
                    if (HMenu::manageOrder($_GET['item'])) {
                        echo json_encode(TRUE); die;
                    }
                }
                echo json_encode(FALSE); die;
            }
        }
    }

    public function actionUploadMenuItem()
    {
        $latest = Misc::getLatestDate();
        if( $latest != '' && date('Y-m-d') < $latest['latest_date'] ) { 
            return $this->redirect(Yii::$app->request->baseUrl . '/date-fraud/');
        }else {
            return $this->render('upload_menu');
        }
    }

    public function actionSearchMenuItem()
    {
        $temp = explode(":",Yii::$app->session['fiscal_year']);
        $starting_fiscal_year_from_date = $temp[0];
        $starting_fiscal_year_to_date   = $temp[1];

        if ((date('Y-m-d') < $starting_fiscal_year_from_date) 
                || ( date('Y-m-d') > date('Y-m-d', strtotime($starting_fiscal_year_to_date. ' + 11 days'))) )
        {
            echo json_encode(false); die;
        } else {
            if(Yii::$app->request->isAjax && isset($_POST) && $_POST['search'] != null) {
                $search = Query::queryAll("SELECT * FROM `menu_item` WHERE name LIKE '%".htmlspecialchars(trim($_POST['search']), ENT_QUOTES)."%' AND is_active = 1");

                echo json_encode(array('status' => true, 'search' => $search)); die;
            }
            echo json_encode(false); die;
        }
    }
}
