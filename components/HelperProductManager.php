<?php

namespace app\components;

use Yii;
use yii\base\Component;
use app\components\Query;
use app\components\Misc;
use app\components\Notify;
use app\models\StockItems;
use app\models\StockEntries;

class HelperProductManager extends Component {
    
    public static function addProduct($data) 
    {   
        $model                  = new StockItems(); 
        $model->category_id     = isset($data['category']) ? htmlspecialchars(trim($data['category']), ENT_QUOTES) : 0;
        $model->name            = isset($data['name']) ? htmlspecialchars(trim($data['name']), ENT_QUOTES) : '';
        $model->quantity        = isset($data['quantity']) ? htmlspecialchars(trim($data['quantity']), ENT_QUOTES) : 0;
        $model->quantity_type   = isset($data['quantity_type']) ? htmlspecialchars(trim($data['quantity_type']), ENT_QUOTES) : 0;
        $model->is_active       = isset($data['is_active']) ? htmlspecialchars(trim($data['is_active']), ENT_QUOTES) : 0;
        $model->created_on      = date('Y-m-d H:i:s');
        $model->created_by      = Yii::$app->session['eHhupx5UpkLZoXRP_cR1ozEVjY14zWOC0_user']->id;

        if($model->save()) {

            $stock                = new StockEntries();
            $stock->stock_item_id = $model->id;
            $stock->stock_in      = ($data['quantity'] != null) ? htmlspecialchars(trim($data['quantity']), ENT_QUOTES) : '0';
            $stock->is_os         = Yii::$app->params['is_opening_stock']['yes'];
            $stock->created_on    = date('Y-m-d H:i:s');
            $stock->created_by    = Yii::$app->session['eHhupx5UpkLZoXRP_cR1ozEVjY14zWOC0_user']->id;
            $stock->save();

            if(Yii::$app->session['eHhupx5UpkLZoXRP_cR1ozEVjY14zWOC0_user']->role != Yii::$app->params['user_role']['superadmin']) {
                $log = array(
                    'action' => "Product named -".ucwords($model->name)." has been added",
                    'type' => "misc"
                );
                Notify::auditLog($log);
            }

            $data = Query::queryOne("SELECT st.*, mc.category as category_name 
                                    FROM `stock_items` AS st
                                    LEFT JOIN `menu_category` as mc
                                        ON mc.id = st.category_id 
                                    WHERE st.id = ".$model->id);
            return $data;
        }else{
            return false;
        }
    }

    public static function editableProduct($value, $id, $field) 
    {
        $model = StockItems::findOne($id);
        $model->$field = $value;
        
        if($model->update()) {
            if($field == 'quantity') {
                $stock  = StockEntries::find()
                            ->WHERE(['stock_item_id' => $id, 'is_os' => Yii::$app->params['is_opening_stock']['yes']])
                            ->one();
                if($stock != null) {
                    $stock->stock_in    = $value;
                    $stock->update();
                }
            }

            if(Yii::$app->session['eHhupx5UpkLZoXRP_cR1ozEVjY14zWOC0_user']->role != Yii::$app->params['user_role']['superadmin']) {
                $log = array(
                    'action' => "Product has been updated",
                    'type' => "misc"
                );
                Notify::auditLog($log);
            }

            return $model;
        }else{
            return false;
        }
    }

    public static function getProducts() 
    {
        return Query::queryAll("SELECT st.*, mc.category as category_name 
                                    FROM `stock_items` AS st
                                    LEFT JOIN `menu_category` as mc
                                        ON mc.id = st.category_id");
    }

    public static function getActiveProducts($fields='') 
    {
        $select = Misc::if_exists($fields) ? implode(', ', $fields) : 'st.*';
        return Query::queryAll("SELECT st.*, mc.category as category_name 
                                    FROM `stock_items` AS st
                                    LEFT JOIN `menu_category` as mc
                                        ON mc.id = st.category_id
                                    WHERE st.is_active = 1 AND mc.is_active = 1");
    }

    public static function getProductsList() 
    {
        return Query::queryAll("SELECT * FROM `stock_items` WHERE is_active = 1");
    }

    public static function checkProduct($value, $id, $field) 
    {
        $condition = $id > 0 ? " AND `id` != $id" : ""; 
        $data = Query::queryOneSecure("SELECT * FROM `stock_items` WHERE `$field` = :value $condition",[':value'=>$value]);
        return Misc::exists($data, FALSE);
    }
}