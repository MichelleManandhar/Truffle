<?php

namespace app\components;

use Yii;
use yii\base\Component;
use app\components\Query;
use app\components\Misc;
use app\components\Notify;
use app\models\StockItems as StockItems;

class HelperStock extends Component {
    
    public static function addStockOut($item) 
    {   
        /*to add in the stock entry for stock out*/
        $item_ids = '';
        foreach ($item as $key => $value) {
            $item_ids[] = $key;
        }

        $menu_stock_items = Query::queryAll('SELECT stock_item_id, used_quantity, menu_item_id
                                                FROM `menu_stock_items` 
                                                WHERE `menu_item_id` IN (' . implode(',', $item_ids) . ')');
        if($menu_stock_items != null) :
            foreach($menu_stock_items as $menu_stock_item):
                $batch_stock[] = [$menu_stock_item['stock_item_id'], $item[$menu_stock_item['menu_item_id']] * $menu_stock_item['used_quantity'], date('Y-m-d H:i:s'), Yii::$app->session['eHhupx5UpkLZoXRP_cR1ozEVjY14zWOC0_user']->id];

                $product = Query::queryOne("SELECT name FROM `stock_items` WHERE id = " . $menu_stock_item['stock_item_id']);
                if($product != null) {
                    if(Yii::$app->session['eHhupx5UpkLZoXRP_cR1ozEVjY14zWOC0_user']->role != Yii::$app->params['user_role']['superadmin']) {
                        $log = array(
                            'action' => $item[$menu_stock_item['menu_item_id']] * $menu_stock_item['used_quantity'] . " - " . $product['name'] . " has been sold",
                            'type'   => "stock"
                        );
                        Notify::auditLog($log);
                    }
                }
            endforeach;

            Query::batchInsert('stock_entries', array('stock_item_id', 'stock_out', 'created_on', 'created_by'), $batch_stock);
        endif;
        /*to add in the stock entry for stock out*/
    }
}