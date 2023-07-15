<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "duplicate_bill".
 *
 * @property integer $id
 * @property integer $order_id
 * @property integer $is_printed
 * @property integer $created_by
 * @property string $created_on
 */
class DuplicateBill extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'duplicate_bill';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['order_id', 'is_printed', 'created_by'], 'integer'],
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
            'order_id' => 'Order ID',
            'is_printed' => 'Is Printed',
            'created_by' => 'Created By',
            'created_on' => 'Created On',
        ];
    }
}
