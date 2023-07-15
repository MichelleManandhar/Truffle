<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "occupy".
 *
 * @property integer $id
 * @property string $customer_name
 * @property integer $customer_pan
 * @property string $customer_address
 * @property integer $customer_pax
 * @property integer $table_id
 * @property integer $floor_id
 * @property string $start_date
 * @property string $start_time
 * @property string $end_time
 * @property string $created_on
 * @property integer $created_by
 * @property integer $occupy_type
 * @property integer $status
 * @property integer $is_foc
 * @property string $last_edited_on
 * @property integer $last_edited_by
 */
class Occupy extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'occupy';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['customer_pan', 'customer_pax', 'table_id', 'floor_id', 'created_by', 'occupy_type', 'status', 'is_foc', 'last_edited_by', 'capacity_id'], 'integer'],
            [['start_date', 'start_time', 'end_time', 'created_on', 'last_edited_on'], 'safe'],
            [['customer_name', 'customer_address'], 'string', 'max' => 100],
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
            'customer_pan' => 'Customer Pan',
            'customer_address' => 'Customer Address',
            'customer_pax' => 'Customer Pax',
            'table_id' => 'Table ID',
            'floor_id' => 'Floor ID',
            'start_date' => 'Start Date',
            'start_time' => 'Start Time',
            'end_time' => 'End Time',
            'created_on' => 'Created On',
            'created_by' => 'Created By',
            'occupy_type' => 'Occupy Type',
            'status' => 'Status',
            'is_foc' => 'Is Foc',
            'last_edited_on' => 'Last Edited On',
            'last_edited_by' => 'Last Edited By',
            'capacity_id' => 'CAPACITY ID',
        ];
    }
}
