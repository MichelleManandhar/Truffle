<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;
use yii\web\HttpException;

use app\components\Misc;
use app\components\Query;

use app\models\StockEntries;

class StockController extends Controller {

    public $to_group = array('admin');

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
        $condition = '';  
        $temp = explode(":",Yii::$app->session['fiscal_year']);
        $starting_fiscal_year_from_date = $temp[0];
        $starting_fiscal_year_to_date   = $temp[1];

        $_GET['from']   = (isset($_GET['from'])) ? $_GET['from'] : $starting_fiscal_year_from_date;
        $_GET['to']     = (isset($_GET['to'])) ? $_GET['to'] : $starting_fiscal_year_to_date;
        
        if (isset($_GET['from']) && $_GET['from'] != '') {
            $condition .= " WHERE DATE(si.created_on) >= '".htmlspecialchars($_GET['from'], ENT_QUOTES)."'";
            if (isset($_GET['to']) && $_GET['to'] != '') {
                $condition .= " AND DATE(si.created_on) <= '".htmlspecialchars($_GET['to'], ENT_QUOTES)."'";
            }
        }
        else if ((!isset($_GET['from']) || $_GET['from'] != '') && isset($_GET['to']) && $_GET['to'] != '') {
            $condition .= " WHERE DATE(si.created_on) <= '".htmlspecialchars($_GET['to'], ENT_QUOTES)."'";
        }

        $products = Query::queryAll("SELECT * FROM `stock_items` WHERE is_active = 1");

        $opening_stock = '';
        if (isset($_GET['from']) && $_GET['from'] != '') 
        {
            $temp_opening_stock  =  Query::queryAll("SELECT stock_item_id, SUM(stock_in - stock_out + adjusted_quantity) as total
                                                FROM `stock_entries`
                                                WHERE DATE(created_on) < '".$_GET['from']."'
                                                GROUP BY stock_item_id");

            $opening_stock = array_column($temp_opening_stock, 'total', 'stock_item_id');
        }

        $stock = Query::queryAll("SELECT se.*, si.name FROM `stock_entries` as se
                                    LEFT JOIN `stock_items` as si
                                        ON si.id = se.stock_item_id $condition");
        
        $stock_in       = '';
        $stock_out      = '';
        $new_data       = [];
        $i = 0;
        if($products != null && $stock != null) {
            foreach ($products as $prod) {
                $new_data[$prod['id']]   = $prod;
                if(isset($opening_stock[$prod['id']])) {
                    $new_data[$prod['id']]['opening_stock']  = $opening_stock[$prod['id']];
                }
                $new_data[$prod['id']]['stock_in']       = 0;
                $new_data[$prod['id']]['stock_out']      = 0;
                $new_data[$prod['id']]['adjustment']     = 0;
                foreach ($stock as $s) {

                    if($prod['id'] == $s['stock_item_id']) {
                        if($s['is_os'] == Yii::$app->params['is_opening_stock']['yes']) {
                            $new_data[$prod['id']]['opening_stock']  = $s['stock_in'];
                        }
                        
                        $new_data[$prod['id']]['stock_in']       += ($s['is_os'] == Yii::$app->params['is_opening_stock']['no']) ? $s['stock_in'] : 0;
                        $new_data[$prod['id']]['stock_out']      += $s['stock_out'];
                        $new_data[$prod['id']]['adjustment']     += $s['adjusted_quantity'];
                    }
                }
                $i++;
            }
        }

        return $this->render('index', array('stock' => $new_data));
    }

    public function actionAddAdjustment() 
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
            }else {
                if(Yii::$app->request->isAjax && isset($_POST)) {
                    $stock_entries = new StockEntries();
                    $stock_entries->stock_item_id   = (isset($_POST['product_id']) && $_POST['product_id'] != '') ? htmlspecialchars(trim($_POST['product_id']), ENT_QUOTES) : '0';
                    $stock_entries->adjusted_quantity = (isset($_POST['adjustment']) && $_POST['adjustment'] != '') ? htmlspecialchars(trim($_POST['adjustment']), ENT_QUOTES) : '0';
                    $stock_entries->adjusted_date   = date('Y-m-d H:i:s');
                    $stock_entries->remarks         = (isset($_POST['remarks']) && $_POST['remarks'] != '') ? htmlspecialchars(trim($_POST['remarks']), ENT_QUOTES) : '';
                    $stock_entries->created_on      = date('Y-m-d H:i:s');
                    $stock_entries->created_by      = Yii::$app->session['eHhupx5UpkLZoXRP_cR1ozEVjY14zWOC0_user']->id;

                    if($stock_entries->save()) {
                        echo json_encode(true); die;
                    }
                }
                else json_encode(false); die;
            }
        }
    }

    public function actionView()
    {
        if(isset($_GET) && isset($_GET['id']) && $_GET['id'] != null) {
            $condition = " WHERE se.stock_item_id = ". htmlspecialchars($_GET['id'], ENT_QUOTES);
            if (isset($_GET['from']) && $_GET['from'] != '') 
            {
                $condition .= " AND DATE(se.created_on) >= '".htmlspecialchars($_GET['from'], ENT_QUOTES)."'";
                if (isset($_GET['to']) && $_GET['to'] != '') 
                {
                    $condition .= " AND DATE(se.created_on) <= '".htmlspecialchars($_GET['to'], ENT_QUOTES)."'";
                }
            }
            else if ((!isset($_GET['from']) || $_GET['from'] != '') && isset($_GET['to']) && $_GET['to'] != '') 
            {
                $condition .= " AND DATE(se.created_on) <= '".htmlspecialchars($_GET['to'], ENT_QUOTES)."'";
            }
            else
            {
                $condition .= " AND DATE(se.created_on) = '".date('Y-m-d')."'";
            }

            $product = Query::queryOneSecure("SELECT * FROM `stock_items` WHERE id = :id",[':id'=>htmlspecialchars($_GET['id'], ENT_QUOTES)]);

            if (isset($_GET['from']) && $_GET['from'] != '') 
            {
                $opening_stock  =  Query::queryOneSecure("SELECT SUM(stock_in - stock_out + adjusted_quantity) as total
                                                    FROM `stock_entries`
                                                    WHERE stock_item_id = :id
                                                    AND DATE(created_on) < :from",[':id'=>htmlspecialchars($_GET['id'], ENT_QUOTES),':from'=>"'".$_GET['from']."'"]);
            }
            else
            {
                $opening_stock  =  '';/*Query::queryOneSecure("SELECT SUM(stock_in - stock_out + adjusted_quantity) as total
                                                    FROM `stock_entries`
                                                    WHERE stock_item_id = :id
                                                    AND DATE(created_on) < '" . date('Y-m-d') ."'"
                                                    ,[':id'=>htmlspecialchars($_GET['id'], ENT_QUOTES)]);*/
            }

            $stock  = Query::queryAll("SELECT se.*, si.name FROM `stock_entries` as se
                                        LEFT JOIN `stock_items` as si
                                            ON si.id = se.stock_item_id". $condition);
            
            return $this->render('view', array('product' => $product , 
                                                'stock' => $stock, 
                                                'opening_stock' => $opening_stock));
        }
        else{
            throw new HttpException(404, 'Page not found.'); 
        }
    }
}
