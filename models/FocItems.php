<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "foc_items".
 *
 * @property integer $id
 * @property integer $foc_id
 * @property integer $item_id
 * @property integer $quantity
 * @property double $price
 */
class FocItems extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'foc_items';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['foc_id', 'item_id', 'quantity', 'type'], 'integer'],
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
            'foc_id' => 'Foc ID',
            'item_id' => 'Item ID',
            'quantity' => 'Quantity',
            'price' => 'Price',
        ];
    }
}
