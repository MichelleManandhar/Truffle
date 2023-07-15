<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "utensils_stock_items".
 *
 * @property integer $id
 * @property string $name
 * @property integer $quantity
 * @property integer $is_active
 * @property string $created_on
 * @property integer $created_by
 */
class UtensilsStockItems extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'utensils_stock_items';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['quantity', 'is_active', 'created_by'], 'integer'],
            [['created_on'], 'safe'],
            [['name'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'quantity' => 'Quantity',
            'is_active' => 'Is Active',
            'created_on' => 'Created On',
            'created_by' => 'Created By',
        ];
    }
}
