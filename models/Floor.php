<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "floor".
 *
 * @property integer $id
 * @property string $name
 * @property string $created_on
 * @property integer $created_by
 */
class Floor extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'floor';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['created_on'], 'safe'],
            [['created_by', 'status', 'display_order'], 'integer'],
            [['name'], 'string', 'max' => 100]
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
            'created_on' => 'Created On',
            'created_by' => 'Created By',
        ];
    }
}
