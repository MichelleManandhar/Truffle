<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "member_privillege_threshold".
 *
 * @property integer $id
 * @property integer $amount
 * @property integer $end_amount
 * @property string $created_on
 * @property integer $created_by
 */
class MemberPrivillegeThreshold extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'member_privillege_threshold';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['amount', 'end_amount', 'created_by'], 'integer'],
            [['created_on', 'till_date'], 'safe']
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
            'end_amount' => 'End Amount',
            'created_on' => 'Created On',
            'till_date' => 'Till Date',
            'created_by' => 'Created By',
        ];
    }
}
