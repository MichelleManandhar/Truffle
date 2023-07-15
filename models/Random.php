<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "random".
 *
 * @property integer $id
 * @property string $field_name
 * @property integer $value
 */
class Random extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'random';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['field_name', 'value'], 'string']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'field_name' => 'Field Name',
            'value' => 'Value',
        ];
    }
}
