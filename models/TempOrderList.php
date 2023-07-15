<?php

namespace app\models;

use Yii;
use app\models\MenuItem;

/**
 * This is the model class for table "temp_order_list".
 *
 * @property integer $id
 * @property integer $occupy_id
 * @property integer $item_id
 * @property integer $quantity
 */
class TempOrderList extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'temp_order_list';
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
            'item_id' => 'Item ID',
            'quantity' => 'Quantity',
        ];
    }

     public function getTempOrderListItemRelation()
    {
        return $this->hasOne(MenuItem::className(), ['id' => 'item_id']);
    }
}
