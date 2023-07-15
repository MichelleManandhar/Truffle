<?php

namespace app\models;

use Yii;
use app\models\Kot;
use app\models\MenuItem;

/**
 * This is the model class for table "kot_item".
 *
 * @property integer $id
 * @property integer $kot_id
 * @property integer $item_id
 * @property integer $quantity
 * @property integer $status
 */
class KotItems extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'kot_items';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['kot_id', 'item_id', 'quantity', 'returned_quantity','type'], 'integer']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'kot_id' => 'Kot ID',
            'item_id' => 'Item ID',
            'quantity' => 'Quantity',
            'returned_quantity' => 'Returned Quantity'
        ];
    }

    public function getItem()
    {
        return $this->hasOne(MenuItem::className(), ['id' => 'item_id']);
    }

    public function getSpecialItem()
    {
        return $this->hasOne(SpecialOrderItems::className(), ['id' => 'item_id']);
    }
}
