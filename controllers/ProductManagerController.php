<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\HttpException;

use app\components\Misc;
use app\components\HelperProductManager as HProduct;
use app\components\HelperMenuCategory as HMenuCat;

use app\components\Query;

class ProductManagerController extends Controller {

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
        /*get the existing data to be shown*/
        $stock_items = HProduct::getProducts();
        $categories = HMenuCat::getMenuCategories();
        return $this->render('index', array('stock_items' => $stock_items,
                                            'categories' => $categories));
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
                echo json_encode(FALSE); die;
            }else {
                /*add data to db*/
                if (Yii::$app->request->isAjax) {
                    $data = HProduct::addProduct($_POST);
                    echo json_encode($data); die;
                }
                throw new HttpException(404, 'Page not found.');
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
                                'msg' => 'Sorry! Could not update product at this time.'
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
                                'msg' => 'Sorry! Please return to current fiscal year to change the data.'
                                )); die;
            }else {
                if (Yii::$app->request->isAjax) {
                    if ($_POST['name'] == 'name') {
                        /*check for uniqueness before updating*/
                        if (!HProduct::checkProduct(htmlspecialchars(trim($_POST['value']), ENT_QUOTES), $_POST['pk'], $_POST['name'])) {
                            if (HProduct::editableProduct(htmlspecialchars(trim($_POST['value']), ENT_QUOTES), $_POST['pk'], $_POST['name'])) {
                                echo json_encode(array(
                                                'status' => 'success', 
                                                'display_value' => $_POST['value'], 
                                                'msg' => 'Your Product value has been updated.'
                                                )); die;
                            }
                        } 
                        else {
                            echo json_encode(array(
                                            'status' => 'error', 
                                            'display_value' => $_POST['old_value'], 
                                            'msg' => 'Product name already exists in the system. Product name needs to be a unique one.'
                                            )); die;
                        }
                    } 
                    else {
                        if (HProduct::editableProduct(htmlspecialchars(trim($_POST['value']), ENT_QUOTES), $_POST['pk'], $_POST['name'])) {
                            echo json_encode(array(
                                            'status' => 'success', 
                                            'display_value' => $_POST['value'], 
                                            'msg' => 'Your Product has been updated.'
                                            )); die;
                        }
                    }
                }
                echo json_encode(array(
                                'status' => 'error', 
                                'display_value' => $_POST['old_value'],
                                'msg' => 'Sorry! Could not update product at this time.'
                                )); die;
            }
        }
    }

    public function actionCheck() 
    { 
        /*check if product name is unique*/
        if (Misc::if_exists($_POST['name']) && Yii::$app->request->isAjax) {
            echo json_encode(!HProduct::checkProduct(htmlspecialchars(trim($_POST['name']), ENT_QUOTES), 0, 'name')); die;
        }
        echo json_encode(FALSE); die;
    }

    public function actionGetProductsList()
    {
        if(Yii::$app->request->isAjax) {
            echo json_encode(HProduct::getProductsList()); die;
        }
        echo json_encode(false); die;
    }

    public function actionFindProducts() 
    {
        if(Yii::$app->request->isAjax){
            $products = Query::queryAll("SELECT id, name FROM `stock_items`"); 
            if($products != null){
                $data = [];
                foreach($products as $product) :
                    $data[] = array('id' => $product['id'], 'name' => $product['name']); 
                endforeach;
                echo json_encode($data); die;
            }
            echo json_encode(false); die;
        }
        echo json_encode(false); die;
    }
}
