<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "temp_items".
 *
 * @property integer $id
 * @property integer $occupy_id
 * @property integer $item_id
 * @property integer $quantity
 * @property double $price
 */
class TempItems extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'temp_items';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['occupy_id', 'item_id', 'quantity','retail_id','take_away_id', 'pick_up_id','delivery_id','type'], 'integer'],
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
            'occupy_id' => 'Occupy ID',
            'retail_id' => 'Retail ID',
            'take_away_id' => 'Take Away ID',
            'pick_up_id' => 'Pick Up ID',
            'item_id' => 'Item ID',
            'quantity' => 'Quantity',
            'price' => 'Price',
        ];
    }
}
