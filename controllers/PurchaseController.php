<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;
use yii\web\HttpException;

use app\components\Misc;
use app\components\Notify;
use app\components\HelperProductManager as HProduct;
use app\components\HelperMenuCategory as HMenuCat;

use app\models\Purchase;
use app\models\StockEntries;

use app\components\Query;

class PurchaseController extends Controller {

    public $to_group = array('admin', 'staff','floor_supervisor');

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
        /*get the existing data to be shown*/
        $stock_items    = HProduct::getProducts();
        $purchase_items = Query::queryAll("SELECT p.*, si.name, u.name as user_name 
                                            FROM `purchase` as p
                                            LEFT JOIN `stock_items` as si 
                                                ON p.item_id = si.id
                                            LEFT JOIN `user` AS u
                                                ON u.id = p.created_by");
        return $this->render('index', array('stock_items'       => $stock_items,
                                            'purchase_items'    => $purchase_items));
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
                if (Yii::$app->request->isAjax){
                    if (isset($_POST)) {
                        $purchase = new Purchase();
                        $purchase->item_id     = ($_POST['item_id'] != null) ? $_POST['item_id'] : '0';
                        $purchase->quantity    = ($_POST['quantity'] != null) ? $_POST['quantity'] : '0';
                        $purchase->created_on  = date('Y-m-d H:i:s');
                        $purchase->created_by  = Yii::$app->session['eHhupx5UpkLZoXRP_cR1ozEVjY14zWOC0_user']->id;
                        if($purchase->save()){
                            $stock                = new StockEntries();
                            $stock->stock_item_id = ($_POST['item_id'] != null) ? $_POST['item_id'] : '0';
                            $stock->stock_in      = ($_POST['quantity'] != null) ? $_POST['quantity'] : '0';
                            $stock->created_on    = date('Y-m-d H:i:s');
                            $stock->created_by    = Yii::$app->session['eHhupx5UpkLZoXRP_cR1ozEVjY14zWOC0_user']->id;
                            $stock->save();

                            $product = Query::queryOne("SELECT name FROM `stock_items` WHERE id = " . $_POST['item_id']);
                            if($product != null) {
                                if(Yii::$app->session['eHhupx5UpkLZoXRP_cR1ozEVjY14zWOC0_user']->role != Yii::$app->params['user_role']['superadmin']) {
                                    $log = array(
                                        'action' => $_POST['quantity'] . " " . $product['name'] . " has been purchased",
                                        'type'   => "stock"
                                    );
                                    Notify::auditLog($log);
                                }
                            }
                            
                            echo json_encode(true); die;
                        }
                        echo json_encode(false); die;
                    }
                }
                throw new HttpException(404, 'Page not found.');
            }
        }
    }
}
