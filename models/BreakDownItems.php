<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "break_down_items".
 *
 * @property integer $id
 * @property integer $break_down_receipt_id
 * @property integer $item_id
 * @property integer $quantity
 * @property double $price
 */
class BreakDownItems extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'break_down_items';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            //[['break_down_receipt_id', 'item_id', 'quantity', 'price'], 'required'],
            [['break_down_receipt_id', 'item_id', 'quantity', 'type'], 'integer'],
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
            'break_down_receipt_id' => 'Break Down Receipt ID',
            'item_id' => 'Item ID',
            'quantity' => 'Quantity',
            'price' => 'Price',
        ];
    }
}
