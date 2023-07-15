<?php

namespace app\models;

use Yii;
use yii\behaviors\SluggableBehavior;

/**
 * This is the model class for table "menu_category".
 *
 * @property integer $id
 * @property string $category
 * @property string $slug
 * @property integer $is_active
 * @property integer $display_order
 * @property string $created_on
 */
class MenuCategory extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'menu_category';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['is_active', 'display_order', 'bill_type', 'type'], 'integer'],
            [['created_on'], 'safe'],
            [['category', 'slug'], 'string', 'max' => 150]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'category' => 'Category',
            'slug' => 'Slug',
            'is_active' => 'Is Active',
            'display_order' => 'Display Order',
            'created_on' => 'Created On',
        ];
    }

    public function behaviors()
    {
        return [
            [
                'class' => SluggableBehavior::className(),
                'attribute' => 'category',
                'slugAttribute' => 'slug',
                'ensureUnique' => true,
                'value' => function ($event) {
                    return str_replace(' ', '-', $this->category);
                }
            ],
        ];
    }
}
