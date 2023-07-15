<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "order_items".
 *
 * @property integer $id
 * @property integer $item_id
 * @property integer $quantity
 * @property double $price
 */
class OrderItems extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'order_items';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['item_id', 'quantity','type'], 'integer'],
            [['price'], 'number']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'item_id' => 'Item ID',
            'quantity' => 'Quantity',
            'price' => 'Price',
        ];
    }

    public function getOrderItem()
    {
        return $this->hasOne(MenuItem::className(), ['id' => 'item_id']);
    }

    public function getSpecialOrderItem()
    {
        return $this->hasOne(SpecialOrderItems::className(), ['id' => 'item_id']);
    }
}
