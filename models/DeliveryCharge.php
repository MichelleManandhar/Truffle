<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "delivery_charge".
 *
 * @property integer $id
 * @property double $amount
 * @property double $vat_rate
 * @property double $vat_amount
 * @property double $total_amount
 * @property integer $order_id
 * @property string $created_on
 * @property integer $created_by
 */
class DeliveryCharge extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'delivery_charge';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['amount', 'vat_rate', 'vat_amount', 'total_amount'], 'number'],
            [['order_id', 'created_by'], 'integer'],
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
            'amount' => 'Amount',
            'vat_rate' => 'Vat Rate',
            'vat_amount' => 'Vat Amount',
            'total_amount' => 'Total Amount',
            'order_id' => 'Order ID',
            'created_on' => 'Created On',
            'created_by' => 'Created By',
        ];
    }
}
