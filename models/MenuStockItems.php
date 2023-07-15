<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "menu_stock_items".
 *
 * @property integer $id
 * @property integer $menu_item_id
 * @property integer $stock_item_id
 * @property double $used_quantity
 */
class MenuStockItems extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'menu_stock_items';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['menu_item_id', 'stock_item_id'], 'integer'],
            [['used_quantity'], 'number']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'menu_item_id' => 'Menu Item ID',
            'stock_item_id' => 'Stock Item ID',
            'used_quantity' => 'Used Quantity',
        ];
    }
}
