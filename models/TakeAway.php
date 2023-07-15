<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "take_away".
 *
 * @property integer $id
 * @property string $customer_name
 * @property integer $customer_pan
 * @property string $customer_address
 * @property string $customer_phone
 * @property string $created_on
 * @property integer $created_by
 * @property integer $status
 */
class TakeAway extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'take_away';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['customer_pan', 'created_by', 'status', 'is_confirmed'], 'integer'],
            [['created_on'], 'safe'],
            [['customer_name', 'customer_address'], 'string', 'max' => 150],
            [['customer_phone'], 'string', 'max' => 50]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'customer_name' => 'Customer Name',
            'customer_pan' => 'Customer Pan',
            'customer_address' => 'Customer Address',
            'customer_phone' => 'Customer Phone',
            'created_on' => 'Created On',
            'created_by' => 'Created By',
            'status' => 'Status',
        ];
    }
}
