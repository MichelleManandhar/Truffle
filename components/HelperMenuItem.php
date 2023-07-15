<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of menu item
 *
 * @author gaurav maharjan
 */

namespace app\components;

use Yii;
use yii\base\Component;
use app\components\Query;
use app\components\Misc;
use app\components\Notify;
use app\models\MenuItem as MenuItem;
use app\models\MenuItemPrice;
use app\models\MenuCategory as MenuCategory;
use app\models\MenuStockItems;


class HelperMenuItem extends Component {

    public static function addMenuItem($data) 
    {   
        $order_data = Query::queryOneSecure("SELECT MAX(display_order) as max FROM menu_item WHERE category_id = :id",[':id'=>htmlspecialchars($data['category_id'], ENT_QUOTES)]); 
        if ($order_data != null) {
            $order = $order_data['max'] + 1;
        }
        else {
            $order = 1;
        }

        $model                  = new MenuItem(); 
        $model->name            = isset($data['name']) ? htmlspecialchars(trim($data['name']), ENT_QUOTES) : '';
        $model->price           = isset($data['price']) ? htmlspecialchars(trim($data['price']), ENT_QUOTES) : 0;
        $model->category_id     = isset($data['category_id']) ? htmlspecialchars(trim($data['category_id']), ENT_QUOTES) : 0;
        $model->description     = isset($data['description']) ? htmlspecialchars(trim($data['description']), ENT_QUOTES) : '';
        $model->image           = isset($data['image']) ? htmlspecialchars(trim($data['image']), ENT_QUOTES) : '';
        $model->is_active       = isset($data['is_active']) ? htmlspecialchars(trim($data['is_active']), ENT_QUOTES) : 0;
        $model->is_discountable       = isset($data['is_discountable']) ? htmlspecialchars(trim($data['is_discountable']), ENT_QUOTES) : Yii::$app->params['is_discountable']['yes'];
        $model->display_order   = $order;
        $model->created_on      = date('Y-m-d H:i:s');
        $model->created_by      = Yii::$app->session['eHhupx5UpkLZoXRP_cR1ozEVjY14zWOC0_user']->id;
        $model->last_edited_on  = date('Y-m-d H:i:s');
        $model->last_edited_by  = Yii::$app->session['eHhupx5UpkLZoXRP_cR1ozEVjY14zWOC0_user']->id;

        if($model->save()) {
            if(array_key_exists("ingredient",$data) && $data['ingredient'] != '') {
                $batch = '';
                foreach($data['ingredient'] as $item) :
                    if($item['quantity'] != null && $item['quantity'] > 0) {
                        $batch[] = [$model->id, $item['id'], $item['quantity']];
                    }
                endforeach;

                if($batch != null) {
                    Query::batchInsert('menu_stock_items', array('menu_item_id', 'stock_item_id', 'used_quantity'), $batch);
                }
            }

            if(Yii::$app->session['eHhupx5UpkLZoXRP_cR1ozEVjY14zWOC0_user']->role != Yii::$app->params['user_role']['superadmin']) {
                $log = array(
                    'action' => "Menu item has been added",
                    'type' => "menu"
                );
                Notify::auditLog($log);
            }

            return $model;
        }else{
            return false;
        }
    }

    public static function editStockItem($data, $id) 
    {
        $model = MenuItem::findOne($id);

        $old_item_price = $model->price;

        $model->name            = isset($data['name']) ? htmlspecialchars(trim($data['name']), ENT_QUOTES) : '';
        $model->price           = isset($data['price']) ? htmlspecialchars(trim($data['price']), ENT_QUOTES) : 0;
        $model->category_id     = isset($data['category_id']) ? htmlspecialchars($data['category_id'], ENT_QUOTES) : 0;
        $model->description     = isset($data['description']) ? htmlspecialchars(trim($data['description']), ENT_QUOTES) : '';
        $model->is_active       = isset($data['is_active']) ? htmlspecialchars($data['is_active'], ENT_QUOTES) : 0;
        $model->is_discountable       = isset($data['is_discountable']) ? htmlspecialchars($data['is_discountable'], ENT_QUOTES) : Yii::$app->params['is_discountable']['yes'];
        $model->last_edited_on  = date('Y-m-d H:i:s');
        $model->last_edited_by  = Yii::$app->session['eHhupx5UpkLZoXRP_cR1ozEVjY14zWOC0_user']->id;

        if($model->update()) {

            if($old_item_price != $data['price']) {
                $menu_price = new MenuItemPrice();
                $menu_price->item_id        = $model->id;
                $menu_price->previous_price = $old_item_price;
                $menu_price->changed_price  = htmlspecialchars(trim($data['price']), ENT_QUOTES);
                $menu_price->created_on     = date('Y-m-d H:i:s');
                $menu_price->created_by     = Yii::$app->session['eHhupx5UpkLZoXRP_cR1ozEVjY14zWOC0_user']->id;
                $menu_price->save();
            }

            Query::execute("DELETE FROM menu_stock_items WHERE menu_item_id = " . $model->id );
            if(array_key_exists("ingredient",$data) && $data['ingredient'] != '') {

                $batch = '';
                foreach($data['ingredient'] as $item) :
                    if($item['quantity'] != null && $item['quantity'] > 0) {
                        $batch[] = [$model->id, $item['id'], $item['quantity']];
                    }
                endforeach;

                if($batch != null) {
                    Query::batchInsert('menu_stock_items', array('menu_item_id', 'stock_item_id', 'used_quantity'), $batch);
                }
            }

            return $model;
        }else{
            return false;
        }
    }

    public static function addUploadedMenuItem($data) 
    {   
        foreach ($data['menu'] as $key => $value) {
            $category   = $key;
            $items      = $value;
            $category = MenuCategory::find()->WHERE(['category' => $category])->one();

            if($category != null) {

                $order_data = Query::queryOne("SELECT MAX(display_order) as max FROM menu_item WHERE category_id = " . $category->id); 
                if ($order_data != null) {
                    $order = $order_data['max'] + 1;
                }
                else {
                    $order = 1;
                }

                $batch = [];
                foreach ($items as $item) {
                    if (array_key_exists("select",$item))
                    {   
                        $slug = '';

                        $temp_item  = $item['name'];
                        $temp_array = explode(" ", $temp_item);
                        for($i=0; $i < count($temp_array); $i++) {
                            $slug .= $temp_array[$i];
                            if($i < (count($temp_array)-1) ) {
                                $slug .= '-';
                            }
                        }

                        $batch[] = [$item['name'], $slug , $item['price'], $item['description'], $category->id, $order, date('Y-m-d H:i:s'), Yii::$app->session['eHhupx5UpkLZoXRP_cR1ozEVjY14zWOC0_user']->id, date('Y-m-d H:i:s'), Yii::$app->session['eHhupx5UpkLZoXRP_cR1ozEVjY14zWOC0_user']->id, 1, 1];
                    }

                    $order++;
                }

                if($batch != null) {
                    Query::batchInsert('menu_item', array('name', 'slug' , 'price', 'description', 'category_id' , 'display_order', 'created_on', 'created_by', 'last_edited_on', 'last_edited_by', 'is_active', 'is_discountable'), $batch);
                }
            }
        }
        return true;
    }

    public static function editMenuItem($data, $id) 
    {
        $model = MenuItem::findOne($id);
        $model->name            = isset($data['name']) ? htmlspecialchars(trim($data['name']), ENT_QUOTES) : '';
        $model->price           = isset($data['price']) ? htmlspecialchars(trim($data['price']), ENT_QUOTES) : 0;
        $model->category_id     = isset($data['category_id']) ? htmlspecialchars(trim($data['category_id']), ENT_QUOTES) : 0;
        $model->description     = isset($data['description']) ? htmlspecialchars(trim($data['description']), ENT_QUOTES) : '';
        $model->is_active       = isset($data['is_active']) ? htmlspecialchars(trim($data['is_active']), ENT_QUOTES) : 0;
        $model->is_discountable       = isset($data['is_discountable']) ? htmlspecialchars(trim($data['is_discountable']), ENT_QUOTES) : Yii::$app->params['is_discountable']['yes'];
        $model->last_edited_on  = date('Y-m-d H:i:s');
        $model->last_edited_by  = Yii::$app->session['eHhupx5UpkLZoXRP_cR1ozEVjY14zWOC0_user']->id;

        if (isset($data['image'])) {
            $model->image = htmlspecialchars(trim($data['image']), ENT_QUOTES);
        }

        if($modal->update()) {
            return $modal;
        }else{
            return false;
        }
    }

    public static function editableMenuItem($value, $id, $field) 
    {
        $model = MenuItem::findOne($id);
        $old_price = $model->price;
        if ($field == 'category_id' && $model->category_id != $value) {
            $order_data = Query::queryOneSecure("SELECT MAX(display_order) as max FROM menu_item WHERE category_id = :value",[':value'=>$value]); 
            if ($order_data != null) {
                $order = $order_data['max'] + 1;
            }
            else {
                $order = 1;
            }
            $model->display_order = $order ;
        } 
        $model->$field = $value;
        $model->last_edited_on = date('Y-m-d H:i:s');
        $model->last_edited_by = Yii::$app->session['eHhupx5UpkLZoXRP_cR1ozEVjY14zWOC0_user']->id;
    
        if($model->update()) {
            if($field == 'price') {
                $menu_price = new MenuItemPrice();
                $menu_price->item_id        = $model->id;
                $menu_price->previous_price = $old_price;
                $menu_price->changed_price  = $value;
                $menu_price->created_on     = date('Y-m-d H:i:s');
                $menu_price->created_by     = Yii::$app->session['eHhupx5UpkLZoXRP_cR1ozEVjY14zWOC0_user']->id;
                $menu_price->save();
            }

            return $model;
        }else{
            return false;
        }
    }

    public static function getMenuItems($fields='') 
    {
        $select = Misc::if_exists($fields) ? implode(', ', $fields) : 'mi.*';
        return Query::queryAll("SELECT $select, mc.category, mc.type as category_type
                                FROM `menu_item` AS mi
                                LEFT JOIN `menu_category` AS mc
                                    ON mi.category_id = mc.id
                                ORDER BY display_order ASC");
    }

    public static function getMenuItemsPrice($id) 
    {
        $data =  Query::queryAllSecure("SELECT mp.* , u.username
                                    FROM `menu_item_price` as mp
                                    LEFT JOIN `user` as u
                                        ON u.id = mp.created_by
                                    WHERE item_id = :id",[':id'=>$id]);
        return ($data != null) ? $data : '';
    }

    public static function getStock($fields, $value) 
    {
        $data = Query::queryOneSecure("SELECT mi.id,mi.slug,mi.category_id,mi.name,mi.price,mi.description,mi.image,mi.is_active,mi.is_discountable,mc.category, mc.type 
                                as category_type
                                FROM `menu_item` AS mi
                                LEFT JOIN `menu_category` AS mc
                                    ON mi.category_id = mc.id
                                WHERE mi.`$fields` = :value",[':value'=>$value]);
        
        return Misc::exists($data, FALSE);
    }

    public static function getMenuItemsByCategory($id, $fields='') 
    {
        $condition = "";
        if ($id != null) {
            $condition = " WHERE mi.category_id = :id";
        }
        
        $select = Misc::if_exists($fields) ? implode(', ', $fields) : 'mi.*';
        return Query::queryAllSecure("SELECT $select, mc.category
                                FROM `menu_item` AS mi
                                LEFT JOIN `menu_category` AS mc
                                    ON mi.category_id = mc.id
                                $condition ORDER BY display_order ASC",[':id'=>$id]);
    }

    public static function getActiveMenuItems($fields='') 
    {
        $select = Misc::if_exists($fields) ? implode(', ', $fields) : 'mi.*';
        return Query::queryAll("SELECT $select, mc.category
                                FROM `menu_item` AS mi
                                LEFT JOIN `menu_category` AS mc
                                    ON mi.category_id = mc.id
                                WHERE mi.is_active = 1 AND mc.is_active = 1
                                ORDER BY display_order ASC");
    }

    public static function getMenuItem($field, $value) 
    {
        return Query::queryOneSecure("SELECT * FROM `menu_item` WHERE `$field` = :value",[':value'=>$value]);
    }

    public static function checkMenuItem($value, $id, $field) 
    {
        $condition = $id > 0 ? " AND `id` != $id" : ""; 
        $data = Query::queryOneSecure("SELECT * FROM `menu_item` WHERE `$field` = :value $condition",[':value'=>$value]);
        return Misc::exists($data, FALSE);
    }

    public static function editImageMenuItem($id, $image)
    {
        $model = MenuItem::findOne($id);
        if ($model != null) {
            $old_image = $model->image;
            $model->image = $image;
            if ($model->update()) {
                if($old_image != ''){
                    Misc::delete_file($old_image != '', 'upload');
                }
                return TRUE;
            }
        }
        return FALSE;
    }

    public static function deleteImageMenuItem($id)
    {
        $model = MenuItem::findOne($id);
        if ($model != null) {
            $image = $model->image;
            $model->image = '';
            if ($model->update()) {
                Misc::delete_file($image, 'upload');
                return TRUE;
            }
        }
        return FALSE;
    }

    public static function manageOrder($data)
    {
        $i=1;
        foreach($data as $id) {
            $item = MenuItem::findOne($id);
            if ($item) {
                $item->display_order=$i;
                $item->update();
            }
            $i++;
        }
        return TRUE;
    }
}