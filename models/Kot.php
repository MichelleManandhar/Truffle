<?php

namespace app\models;

use Yii;

use app\models\KotItems;

/**
 * This is the model class for table "kot".
 *
 * @property integer $id
 * @property string $display_number
 * @property integer $table_id
 * @property integer $floor_id
 * @property integer $occupy_id
 * @property integer $take_away_id
 * @property integer $order_id
 * @property integer $foc_id
 * @property string $created_on
 * @property integer $created_by
 * @property integer $status
 */
class Kot extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'kot';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['table_id', 'floor_id', 'occupy_id', 'retail_id', 'take_away_id', 'pick_up_id', 'delivery_id' , 'order_id', 'foc_id', 'created_by', 'status', 'kitchen_status', 'return_against'], 'integer'],
            [['created_on'], 'safe'],
            [['return_note'], 'string'],
            [['display_number', 'return_against_display_number'], 'string', 'max' => 100]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'display_number' => 'Display Number',
            'table_id' => 'Table ID',
            'floor_id' => 'Floor ID',
            'occupy_id' => 'Occupy ID',
            'retail_id' => 'Retail ID',
            'take_away_id' => 'Take Away ID',
            'pick_up_id' => 'Pick Up ID',
            'order_id' => 'Order ID',
            'foc_id' => 'Foc ID',
            'created_on' => 'Created On',
            'created_by' => 'Created By',
            'status' => 'Status',
            'kitchen_status' => 'Kitchen Status',
            'return_against' => 'Return Against',
            'return_against_display_number' => 'Return Against Display Number',
        ];
    }
    
    public function getKotItemRelation()
    {
        return $this->hasMany(KotItems::className(), ['kot_id' => 'id']);
    }
}
