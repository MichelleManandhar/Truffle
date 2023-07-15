<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "stock_items".
 *
 * @property integer $id
 * @property integer $category_id
 * @property string $name
 * @property double $quantity
 * @property integer $quantity_type
 * @property integer $is_active
 * @property string $created_on
 * @property integer $created_by
 */
class StockItems extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'stock_items';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['category_id', 'quantity_type', 'is_active', 'created_by'], 'integer'],
            [['name'], 'string'],
            [['quantity'], 'number'],
            [['created_on'], 'safe']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'category_id' => 'Category ID',
            'name' => 'Name',
            'quantity' => 'Quantity',
            'quantity_type' => 'Quantity Type',
            'is_active' => 'Is Active',
            'created_on' => 'Created On',
            'created_by' => 'Created By',
        ];
    }
}
