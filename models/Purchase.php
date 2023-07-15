<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "purchase".
 *
 * @property integer $id
 * @property integer $item_id
 * @property double $quantity
 * @property string $created_on
 * @property integer $created_by
 */
class Purchase extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'purchase';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['item_id', 'created_by'], 'integer'],
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
            'item_id' => 'Item ID',
            'quantity' => 'Quantity',
            'created_on' => 'Created On',
            'created_by' => 'Created By',
        ];
    }
}
