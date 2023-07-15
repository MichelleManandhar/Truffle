<?php

namespace app\models;

use Yii;
use app\models\DebtorPayment;

/**
 * This is the model class for table "debtors".
 *
 * @property integer $id
 * @property string $customer_name
 * @property string $customer_pan
 * @property string $customer_phone
 * @property string $customer_address
 * @property double $credit_amount
 * @property string $last_edited_on
 * @property string $created_on
 * @property integer $is_active
 */
class Debtors extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'debtors';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['credit_amount' , 'opening_balance', 'paid_amount', 'return_amount'], 'number'],
            [['last_edited_on', 'created_on'], 'safe'],
            [['is_active'], 'integer'],
            [['name'], 'string', 'max' => 150],
            [['pan'], 'string', 'max' => 15],
            [['phone'], 'string', 'max' => 30],
            [['address'], 'string', 'max' => 100]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'pan' => 'Pan',
            'phone' => 'Phone',
            'address' => 'Address',
            'credit_amount' => 'Credit Amount',
            'last_edited_on' => 'Last Edited On',
            'created_on' => 'Created On',
            'is_active' => 'Is Active',
        ];
    }

    public function getDebtorPayment()
    {
        return $this->hasMany(DebtorPayment::className(), ['debtor_id' => 'id']);
    }
}
