<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "foc".
 *
 * @property integer $id
 * @property string $customer_name
 * @property string $customer_pan
 * @property string $customer_address
 * @property integer $customer_pax
 * @property integer $table_id
 * @property integer $floor_id
 * @property string $created_on
 * @property integer $created_by
 */
class Foc extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'foc';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['foc_no', 'customer_pax', 'table_id', 'floor_id', 'created_by'], 'integer'],
            [['created_on'], 'safe'],
            [['customer_name', 'customer_address'], 'string', 'max' => 150],
            [['customer_pan'], 'string', 'max' => 15]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'foc_no' => 'Foc No',
            'customer_name' => 'Customer Name',
            'customer_pan' => 'Customer Pan',
            'customer_address' => 'Customer Address',
            'customer_pax' => 'Customer Pax',
            'table_id' => 'Table ID',
            'floor_id' => 'Floor ID',
            'created_on' => 'Created On',
            'created_by' => 'Created By',
        ];
    }
}
