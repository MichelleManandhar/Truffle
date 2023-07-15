<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "member".
 *
 * @property integer $id
 * @property string $name
 * @property string $phone
 * @property string $email
 * @property string $membership_number
 * @property integer $membership_type
 * @property string $issued_date
 * @property string $valid_date
 * @property string $created_on
 * @property integer $created_by
 */
class Member extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'member';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['membership_type', 'is_active', 'threshold_claimed', 'threshold_end_claimed', 'current_threshold_exceeded', 'current_threshold_end_exceeded', 'created_by'], 'integer'],
            [['membership_fee'], 'number'],
            [['issued_date', 'valid_date', 'created_on', 'date_of_birth'], 'safe'],
            [['name', 'email'], 'string', 'max' => 255],
            [['phone'], 'string', 'max' => 20],
            [['membership_number'], 'string', 'max' => 100]
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
            'phone' => 'Phone',
            'email' => 'Email',
            'date_of_birth' => 'Date Of Birth',
            'membership_number' => 'Membership Number',
            'membership_type' => 'Membership Type',
            'membership_fee' => 'Membership Fee',
            'issued_date' => 'Issued Date',
            'valid_date' => 'Valid Date',
            'created_on' => 'Created On',
            'created_by' => 'Created By',
            'is_threshold_exceeded' => 'Is Threshold Exceeded',
            'is_threshold_end_exceeded' => 'Is Threshold End Exceeded',
        ];
    }
}
