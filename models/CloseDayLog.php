<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "close_day_log".
 *
 * @property integer $id
 * @property string $log_date
 * @property integer $created_by
 */
class CloseDayLog extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'close_day_log';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['log_date', 'created_by'], 'required'],
            [['log_date'], 'safe'],
            [['created_by'], 'integer']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'log_date' => 'Log Date',
            'created_by' => 'Created By',
        ];
    }
}
