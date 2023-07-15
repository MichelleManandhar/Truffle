<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "member_discount".
 *
 * @property integer $id
 * @property integer $member_id
 * @property integer $category_id
 * @property double $discount_allowed
 */
class MemberDiscount extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'member_discount';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['member_id', 'category_id', 'discount_allowed'], 'required'],
            [['member_id', 'category_id'], 'integer'],
            [['discount_allowed'], 'number']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'member_id' => 'Member ID',
            'category_id' => 'Category ID',
            'discount_allowed' => 'Discount Allowed',
        ];
    }
}
