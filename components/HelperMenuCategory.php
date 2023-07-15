<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of menu category
 *
 * @author gaurav maharjan
 */

namespace app\components;

use Yii;
use yii\base\Component;
use app\components\Query;
use app\components\Misc;
use app\components\Notify;
use app\models\MenuCategory as MenuCategory;

class HelperMenuCategory extends Component {

    public static function addMenuCategory($data) 
    {
        $order_data = Query::queryOne("SELECT MAX(display_order) as max FROM menu_category"); 
        if ($order_data != null) {
            $order = $order_data['max'] + 1;
        }
        else {
            $order = 1;
        }

        $model                  = new MenuCategory(); 
        $model->category        = isset($data['category']) ? htmlspecialchars(trim($data['category']), ENT_QUOTES) : '';
        $model->bill_type       = isset($data['category_bill_type']) ? htmlspecialchars(trim($data['category_bill_type']), ENT_QUOTES) : '';
        $model->is_active       = isset($data['is_active']) ? htmlspecialchars(trim($data['is_active']), ENT_QUOTES) : 0;
        $model->display_order   = $order;
        $model->created_on      = date('Y-m-d H:i:s');
        
        if($model->save()) {
            if(Yii::$app->session['eHhupx5UpkLZoXRP_cR1ozEVjY14zWOC0_user']->role != Yii::$app->params['user_role']['superadmin']) {
                $log = array(
                    'action' => "New menu category has been created named -" . $model->category,
                    'type' => "menu"
                );
                Notify::auditLog($log);
            }

            return $model;
        }else{
            return false;
        }
    }

    public static function editableMenuCategory($value, $id, $field) 
    {
        $model = MenuCategory::findOne($id);
        $model->$field = $value;
  
        if($model->save()) {
            if(Yii::$app->session['eHhupx5UpkLZoXRP_cR1ozEVjY14zWOC0_user']->role != Yii::$app->params['user_role']['superadmin']) {
                $log = array(
                    'action' => "Updated menu category",
                    'type' => "menu"
                );
                Notify::auditLog($log);
            }

            return $model;
        }else{
            return false;
        }
    }

    public static function getMenuCategories($fields='') 
    {
        $select = Misc::if_exists($fields) ? implode(', ', $fields) : '*';
        return Query::queryAll("SELECT m.$select, p.name as bill_type_name, p.id as bill_type FROM `menu_category` as m
                                LEFT JOIN `printers` as p 
                                ON p.id = m.bill_type
                                ORDER BY display_order ASC");
    }

    public static function getActiveMenuCategories($fields='') 
    {
        $select = Misc::if_exists($fields) ? implode(', ', $fields) : '*';
        return Query::queryAll("SELECT $select FROM `menu_category` WHERE is_active = 1 ORDER BY display_order ASC");
    }

    public static function getMenuCategory($field, $value) 
    {
        return Query::queryOneSecure("SELECT * FROM `menu_category` WHERE `$field` = :value",[':value'=>$value]);
    }

    public static function getMenuCategoryIdByName($value) 
    {
        return Query::queryOneSecure("SELECT id FROM `menu_category` WHERE `category` = :value",[':value'=>$value]);
    }

    public static function getMenuCategoryByMenuItem($item_ids) 
    {
        $items_id = implode("','",$item_ids);

        $categories = Query::queryAll("SELECT mc.id as category_id, mc.category as category_name , GROUP_CONCAT(mi.id SEPARATOR ',') as item_id
                                            FROM `menu_category` as mc 
                                            LEFT JOIN `menu_item` as mi 
                                                ON mi.category_id = mc.id 
                                            WHERE mi.id IN ('".$items_id."')
                                            GROUP BY mc.id
                                            ORDER BY mc.id");
        
        return $categories;
    }

    public static function checkMenuCategory($value, $id, $field) 
    {
        $condition = $id > 0 ? " AND `id` != $id" : ""; 
        $data = Query::queryOneSecure("SELECT * FROM `menu_category` WHERE `$field` = :value $condition",[':value'=>$value]);
        return Misc::exists($data, FALSE);
    }

    public static function manageOrder($data)
    {
        $i=1;
        foreach($data as $id) {
            $item = MenuCategory::findOne($id);
            if ($item) {
                $item->display_order=$i;
                $item->update();
            }
            $i++;
        }
        return TRUE;
    }
}