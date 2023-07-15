<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\HttpException;

use app\components\Misc;
use app\components\Query;
use app\components\Notify;

use app\models\UtensilsStockItems;
use app\models\UtensilsStockEntries;

class UtensilsManagerController extends Controller {

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
        $items = Query::queryAll("SELECT * FROM `utensils_stock_items`");

        $stock  = Query::queryAll("SELECT se.*, si.name FROM `utensils_stock_entries` as se
                                    LEFT JOIN `utensils_stock_items` as si
                                        ON si.id = se.stock_item_id");
        
        $opening_stock  = '';
        $stock_in       = '';
        $stock_out      = '';
        $new_data       = [];
        $i = 0;
        if($items != null) {
            foreach ($items as $prod) {
                $new_data[$i]   = $prod;
                $new_data[$i]['opening_stock']  = 0;
                $new_data[$i]['stock_in']       = 0;
                $new_data[$i]['stock_out']      = 0;
                $new_data[$i]['adjustment']     = 0;
                foreach ($stock as $s) {
                    if($prod['id'] == $s['stock_item_id']) {
                        $new_data[$i]['opening_stock']  += ($s['is_os'] == Yii::$app->params['is_opening_stock']['yes']) ? $s['stock_in'] : 0;
                        $new_data[$i]['stock_in']       += ($s['is_os'] == Yii::$app->params['is_opening_stock']['no']) ? $s['stock_in'] : 0;
                        $new_data[$i]['stock_out']      += $s['stock_out'];
                        $new_data[$i]['adjustment']     += $s['adjusted_quantity'];
                    }
                }
                $i++;
            }
        }
        
        return $this->render('index', array('stock' => $new_data));
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
                /*add data to db*/
                if (Yii::$app->request->isAjax && isset($_POST['items']) && $_POST['items'] != null) {
                    foreach ($_POST['items'] as $item) {
                        $model                  = new UtensilsStockItems(); 
                        $model->name            = isset($item['name']) ? $item['name'] : '';
                        $model->quantity        = isset($item['opening_stock']) ? $item['opening_stock'] : 0;
                        $model->is_active       = isset($item['is_active']) ? $item['is_active'] : 0;
                        $model->created_on      = date('Y-m-d H:i:s');
                        $model->created_by      = Yii::$app->session['eHhupx5UpkLZoXRP_cR1ozEVjY14zWOC0_user']->id;

                        if($model->save()) {
                            $stock                = new UtensilsStockEntries();
                            $stock->stock_item_id = $model->id;
                            $stock->stock_in      = ($item['opening_stock'] != null) ? $item['opening_stock'] : '0';
                            $stock->is_os         = Yii::$app->params['is_opening_stock']['yes'];
                            $stock->created_on    = date('Y-m-d H:i:s');
                            $stock->created_by    = Yii::$app->session['eHhupx5UpkLZoXRP_cR1ozEVjY14zWOC0_user']->id;
                            $stock->save();

                            if(Yii::$app->session['eHhupx5UpkLZoXRP_cR1ozEVjY14zWOC0_user']->role != Yii::$app->params['user_role']['superadmin']) {
                                $log = array(
                                    'action' => "Utensils item named -".ucwords($model->name)." has been added",
                                    'type' => "misc"
                                );
                                Notify::auditLog($log);
                            }
                        }
                    }
                    echo json_encode(true); die;
                }
                echo json_encode(FALSE); die;
            }
        }
    }

    public function actionCheck() 
    { 
        /*check if utensils item name is unique*/
        if (Misc::if_exists($_POST['name']) && Yii::$app->request->isAjax) {

            $data = Query::queryOne("SELECT * FROM `utensils_stock_items` WHERE `name` = '".htmlspecialchars(trim($_POST['name']), ENT_QUOTES)."'");

            if($data != null) {
                echo json_encode(true); die;
            }
        }
        echo json_encode(FALSE); die;
    }

    public function actionAddStockAdjustment() 
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
                if(Yii::$app->request->isAjax && isset($_POST)) {
                    $stock_entries = new UtensilsStockEntries();
                    $stock_entries->stock_item_id   = (isset($_POST['item_id']) && $_POST['item_id'] != '') ? htmlspecialchars(trim($_POST['item_id']), ENT_QUOTES) : '0';
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
            $condition = " WHERE se.stock_item_id = ". $_GET['id'];
            if (isset($_GET['from']) && $_GET['from'] != '') 
            {
                $condition .= " AND DATE(se.created_on) >= '".$_GET['from']."'";
                if (isset($_GET['to']) && $_GET['to'] != '') 
                {
                    $condition .= " AND DATE(se.created_on) <= '".$_GET['to']."'";
                }
            }
            else if ((!isset($_GET['from']) || $_GET['from'] != '') && isset($_GET['to']) && $_GET['to'] != '') 
            {
                $condition .= " AND DATE(se.created_on) <= '".$_GET['to']."'";
            }
            else
            {
                $condition .= " AND DATE(se.created_on) = '".date('Y-m-d')."'";
            }

            $item = Query::queryOneSecure("SELECT * FROM `utensils_stock_items` WHERE id = :id",[':id'=>$_GET['id']]);

            if (isset($_GET['from']) && $_GET['from'] != '') 
            {
                $opening_stock  =  Query::queryOneSecure("SELECT SUM(stock_in - stock_out + adjusted_quantity) as total
                                                    FROM `utensils_stock_entries`
                                                    WHERE stock_item_id = :id
                                                    AND DATE(created_on) < :from",[':id'=>$_GET['id'],':from'=>"'".$_GET['from']."'"]);
            }
            else
            {
                $opening_stock  =  Query::queryOneSecure("SELECT SUM(stock_in - stock_out + adjusted_quantity) as total
                                                    FROM `utensils_stock_entries`
                                                    WHERE stock_item_id = :id
                                                    AND DATE(created_on) < :from",[':id'=>$_GET['id'],':from'=>"'" . date('Y-m-d') ."'"]);
            }

            $stock  = Query::queryAll("SELECT se.*, si.name FROM `utensils_stock_entries` as se
                                        LEFT JOIN `utensils_stock_items` as si
                                            ON si.id = se.stock_item_id". $condition);
            
            return $this->render('view', array('item' => $item , 
                                                'stock' => $stock, 
                                                'opening_stock' => $opening_stock));
        }
        else{
            throw new HttpException(404, 'Page not found.'); 
        }
    }
}
