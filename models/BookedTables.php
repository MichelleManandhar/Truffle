<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "booked_tables".
 *
 * @property integer $id
 * @property string $customer_name
 * @property string $customer_phone
 * @property integer $customer_pax
 * @property integer $table_id
 * @property integer $floor_id
 * @property string $start_date
 * @property string $start_time
 * @property string $created_on
 * @property integer $created_by
 * @property string $last_edited_on
 * @property integer $last_edited_by
 */
class BookedTables extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'booked_tables';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['customer_name', 'customer_phone', 'customer_pax', 'table_id', 'floor_id', 'start_date', 'start_time'], 'required'],
            [['customer_pax', 'table_id', 'floor_id', 'created_by', 'last_edited_by','status'], 'integer'],
            [['start_date', 'start_time', 'end_time', 'created_on', 'last_edited_on'], 'safe'],
            [['customer_name'], 'string', 'max' => 100],
            [['customer_phone'], 'string', 'max' => 15]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'customer_name' => 'Customer Name',
            'customer_phone' => 'Customer Phone',
            'customer_pax' => 'Customer Pax',
            'table_id' => 'Table ID',
            'floor_id' => 'Floor ID',
            'start_date' => 'Start Date',
            'start_time' => 'Start Time',
            'end_time' => 'End Time',
            'status' => 'Status',
            'created_on' => 'Created On',
            'created_by' => 'Created By',
            'last_edited_on' => 'Last Edited On',
            'last_edited_by' => 'Last Edited By',
        ];
    }
}
