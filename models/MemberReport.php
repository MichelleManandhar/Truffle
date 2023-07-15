<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "member_report".
 *
 * @property integer $id
 * @property integer $member_id
 * @property double $total_amount
 * @property integer $created_on
 */
class MemberReport extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'member_report';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['member_id', 'order_id'], 'integer'],
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
            'member_id' => 'Member ID',
            'created_on' => 'Created On',
        ];
    }
}
