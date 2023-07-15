<?php

namespace app\models;

use Yii;
use yii\behaviors\SluggableBehavior;

/**
 * This is the model class for table "settings".
 *
 * @property integer $id
 * @property string $field_name
 * @property string $value
 * @property string $slug
 * @property string $created_on
 */
class Settings extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'settings';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['field_name', 'value', 'created_on'], 'required'],
            [['value'], 'string'],
            [['created_on'], 'safe'],
            [['field_name'], 'string', 'max' => 255],
            [['slug'], 'string', 'max' => 100]
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
            'slug' => 'Slug',
            'created_on' => 'Created On',
        ];
    }

    public function behaviors()
    {
        return [
            [
                'class' => SluggableBehavior::className(),
                'attribute' => 'field_name',
                'slugAttribute' => 'slug',
                'ensureUnique' => true,
                'value' => function ($event) {
                    return str_replace(' ', '-', $this->field_name);
                }
            ],
        ];
    }
}
