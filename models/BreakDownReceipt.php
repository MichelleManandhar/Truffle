<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "break_down_receipt".
 *
 * @property integer $id
 * @property integer $invoice_no
 * @property integer $order_id
 * @property integer $occupy_id
 * @property integer $take_away_id
 * @property integer $delivery_id
 * @property string $customer_name
 * @property double $sub_total
 * @property double $discount_rate
 * @property double $discount_amount
 * @property double $service_charge_rate
 * @property double $service_charge_amount
 * @property double $taxable_amount
 * @property double $vat_rate
 * @property double $vat_amount
 * @property double $total
 * @property double $round_value
 * @property double $received_amount
 * @property double $change_amount
 * @property integer $paid_against
 * @property integer $is_credit_paid
 * @property string $cheque_no
 * @property integer $payment_type
 * @property integer $debtor_id
 * @property integer $type
 * @property string $created_on
 * @property integer $created_by
 */
class BreakDownReceipt extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'break_down_receipt';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['invoice_no', 'order_id', 'occupy_id', 'retail_id', 'take_away_id', 'pick_up_id', 'delivery_id', 'paid_against', 'is_credit_paid' , 'is_payment_return' , 'payment_type', 'debtor_payment_type', 'debtor_id', 'type', 'created_by'], 'integer'],
            [['sub_total', 'discount_rate', 'discount_amount', 'service_charge_rate', 'service_charge_amount', 'taxable_amount', 'vat_rate', 'vat_amount', 'total', 'round_value', 'received_amount', 'change_amount'], 'number'],
            [['created_on'], 'safe'],
            [['customer_name'], 'string', 'max' => 150],
            [['cheque_no'], 'string', 'max' => 50]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'invoice_no' => 'Invoice No',
            'order_id' => 'Order ID',
            'occupy_id' => 'Occupy ID',
            'retail_id' => 'Retail ID',
            'take_away_id' => 'Take Away ID',
            'pick_up_id' => 'Pick Up ID',
            'delivery_id' => 'Delivery ID',
            'customer_name' => 'Customer Name',
            'sub_total' => 'Sub Total',
            'discount_rate' => 'Discount Rate',
            'discount_amount' => 'Discount Amount',
            'service_charge_rate' => 'Service Charge Rate',
            'service_charge_amount' => 'Service Charge Amount',
            'taxable_amount' => 'Taxable Amount',
            'vat_rate' => 'Vat Rate',
            'vat_amount' => 'Vat Amount',
            'total' => 'Total',
            'round_value' => 'Round Value',
            'received_amount' => 'Received Amount',
            'change_amount' => 'Change Amount',
            'paid_against' => 'Paid Against',
            'is_credit_paid' => 'Is Credit Paid',
            'cheque_no' => 'Cheque No',
            'payment_type' => 'Payment Type',
            'debtor_id' => 'Debtor ID',
            'type' => 'Type',
            'created_on' => 'Created On',
            'created_by' => 'Created By',
        ];
    }
}
