<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "fiscal_year".
 *
 * @property integer $id
 * @property string $start_date
 * @property string $end_date
 * @property string $created_on
 */
class FiscalYear extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'fiscal_year';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['start_date'], 'required'],
            [['start_date', 'end_date', 'is_active'], 'safe']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'start_date' => 'Start Date',
            'end_date' => 'End Date',
            'is_active' => 'Is Active',
        ];
    }
}
