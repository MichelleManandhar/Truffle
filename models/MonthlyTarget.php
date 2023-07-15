<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "monthly_target".
 *
 * @property integer $id
 * @property string $month
 * @property string $full_date
 * @property double $target
 * @property string $created_on
 * @property integer $created_by
 * @property string $last_edited_on
 * @property integer $last_edited_by
 */
class MonthlyTarget extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'monthly_target';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['full_date', 'created_on', 'last_edited_on'], 'safe'],
            [['target'], 'number'],
            [['created_by', 'last_edited_by'], 'integer'],
            [['month'], 'string', 'max' => 25]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'month' => 'Month',
            'full_date' => 'Full Date',
            'target' => 'Target',
            'created_on' => 'Created On',
            'created_by' => 'Created By',
            'last_edited_on' => 'Last Edited On',
            'last_edited_by' => 'Last Edited By',
        ];
    }
}
