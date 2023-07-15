<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "order".
 *
 * @property integer $id
 * @property integer $occupy_id
 * @property string $invoice_no
 * @property integer $cancel_no
 * @property integer $duplicate_bill_count
 * @property string $customer_name
 * @property string $customer_pan
 * @property string $customer_address
 * @property integer $customer_pax
 * @property string $customer_phone
 * @property integer $table_id
 * @property integer $floor_id
 * @property double $sub_total
 * @property double $service_charge_rate
 * @property double $service_charge_amount
 * @property double $vat_rate
 * @property double $taxable_amount
 * @property double $vat_amount
 * @property double $discount_rate
 * @property double $discount_amount
 * @property double $total
 * @property double $round_value
 * @property double $payable_total
 * @property double $received_amount
 * @property double $change_amount
 * @property integer $payment_type
 * @property integer $debtor_id
 * @property string $created_on
 * @property integer $created_by
 * @property integer $type
 * @property integer $delivery_charge_against_inv
 * @property integer $is_printed
 * @property integer $is_active
 * @property integer $printed_by
 * @property integer $is_cancel
 * @property string $cancel_against_inv
 * @property string $cancelled_reason
 */
class Order extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'order';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['occupy_id', 'cancel_no', 'duplicate_bill_count', 'customer_pax', 'table_id', 'floor_id', 'payment_type', 'debtor_id', 'created_by', 'type', 'is_printed', 'is_active', 'printed_by', 'is_cancel', 'member_id', 'privillege_threshold_id'], 'integer'],
            [['sub_total', 'service_charge_rate', 'service_charge_amount', 'vat_rate', 'taxable_amount', 'vat_amount', 'discount_rate', 'discount_amount', 'total', 'round_value', 'payable_total', 'received_amount', 'change_amount'], 'number'],
            [['created_on'], 'safe'],
            [['cancelled_reason'], 'string'],
            [['invoice_no', 'delivery_charge_against_inv', 'cancel_against_inv'], 'string', 'max' => 255],
            [['customer_name', 'customer_address'], 'string', 'max' => 150],
            [['customer_pan', 'customer_phone'], 'string', 'max' => 15]
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
            'invoice_no' => 'Invoice No',
            'cancel_no' => 'Cancel No',
            'duplicate_bill_count' => 'Duplicate Bill Count',
            'customer_name' => 'Customer Name',
            'customer_pan' => 'Customer Pan',
            'customer_address' => 'Customer Address',
            'customer_pax' => 'Customer Pax',
            'customer_phone' => 'Customer Phone',
            'table_id' => 'Table ID',
            'floor_id' => 'Floor ID',
            'sub_total' => 'Sub Total',
            'service_charge_rate' => 'Service Charge Rate',
            'service_charge_amount' => 'Service Charge Amount',
            'vat_rate' => 'Vat Rate',
            'taxable_amount' => 'Taxable Amount',
            'vat_amount' => 'Vat Amount',
            'discount_rate' => 'Discount Rate',
            'discount_amount' => 'Discount Amount',
            'total' => 'Total',
            'round_value' => 'Round Value',
            'payable_total' => 'Payable Total',
            'received_amount' => 'Received Amount',
            'change_amount' => 'Change Amount',
            'payment_type' => 'Payment Type',
            'debtor_id' => 'Debtor ID',
            'created_on' => 'Created On',
            'created_by' => 'Created By',
            'type' => 'Type',
            'delivery_charge_against_inv' => 'Delivery Charge Against Inv',
            'is_printed' => 'Is Printed',
            'is_active' => 'Is Active',
            'printed_by' => 'Printed By',
            'is_cancel' => 'Is Cancel',
            'cancel_against_inv' => 'Cancel Against Inv',
            'cancelled_reason' => 'Cancelled Reason',
            'member_id' => 'Member Id',
            'privillege_threshold_id'   => 'Privillege Threshold Id',
        ];
    }
}
