<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "table_details".
 *
 * @property integer $id
 * @property integer $table_name
 * @property integer $floor
 * @property integer $status
 * @property string $start_time
 * @property string $end_time
 * @property integer $type
 * @property double $x_pos
 * @property double $y_pos
 * @property string $merge
 */
class TableDetails extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'table_details';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            //[['x_pos', 'y_pos'], 'required'],
            [['floor', 'status', 'type', 'order_id', 'is_deleted'], 'integer'],
            [['start_time', 'end_time'], 'safe'],
            //[['x_pos', 'y_pos'], 'number'],
            //[['merge'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'table_name' => 'Table Name',
            'floor' => 'Floor',
            'status' => 'Status',
            'start_time' => 'Start Time',
            'end_time' => 'End Time',
            'type' => 'Type',
            'x_pos' => 'X Pos',
            'y_pos' => 'Y Pos',
            'merge' => 'Merge',
            'is_deleted' => 'Is Deleted'
        ];
    }
}
