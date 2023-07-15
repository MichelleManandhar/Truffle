<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "member_order_category".
 *
 * @property integer $id
 * @property integer $category_id
 * @property double $discount_rate
 * @property double $discount_amount
 * @property double $total
 * @property integer $member_report_id
 */
class MemberOrderCategory extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'member_order_category';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['category_id', 'member_report_id'], 'integer'],
            [['discount_rate', 'discount_amount', 'total'], 'number']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'category_id' => 'Category ID',
            'discount_rate' => 'Discount Rate',
            'discount_amount' => 'Discount Amount',
            'total' => 'Total',
            'member_report_id' => 'Member Report ID',
        ];
    }
}
