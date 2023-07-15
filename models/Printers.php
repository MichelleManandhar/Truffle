<?php

namespace app\models;

use Yii;
use yii\behaviors\SluggableBehavior;

/**
 * This is the model class for table "printers".
 *
 * @property integer $id
 * @property string $name
 * @property string $slug
 * @property string $printer_name
 */
class Printers extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'printers';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            //[['name', 'slug', 'printer_name'], 'required'],
            [['name', 'slug', 'printer_name'], 'string']
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
            'slug' => 'Slug',
            'printer_name' => 'Printer Name',
        ];
    }

    public function behaviors()
    {
        return [
            [
                'class' => SluggableBehavior::className(),
                'attribute' => 'name',
                'slugAttribute' => 'slug',
                'ensureUnique' => true,
                'value' => function ($event) {
                    return str_replace(' ', '-', $this->name);
                }
            ],
        ];
    }

}
