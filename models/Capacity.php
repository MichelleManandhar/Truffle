<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "capacity".
 *
 * @property integer $id
 * @property integer $capacity
 * @property string $created_on
 * @property integer $created_by
 */
class Capacity extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'capacity';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['capacity', 'created_by'], 'integer'],
            [['created_on'], 'safe']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'capacity' => 'Capacity',
            'created_on' => 'Created On',
            'created_by' => 'Created By',
        ];
    }
}
