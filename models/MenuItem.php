<?php

namespace app\models;

use Yii;
use yii\behaviors\SluggableBehavior;
use app\models\MenuCategory;


/**
 * This is the model class for table "menu_item".
 *
 * @property integer $id
 * @property string $name
 * @property integer $category_id
 * @property double $price
 * @property string $description
 * @property string $image
 * @property string $slug
 * @property integer $display_order
 * @property string $created_on
 * @property integer $created_by
 * @property string $last_edited_on
 * @property integer $last_edited_by
 * @property integer $is_active
 */
class MenuItem extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'menu_item';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['category_id', 'display_order', 'created_by', 'last_edited_by', 'is_active', 'is_discountable'], 'integer'],
            [['price'], 'number'],
            [['description'], 'string'],
            [['created_on', 'last_edited_on'], 'safe'],
            [['name', 'slug'], 'string', 'max' => 100],
            [['image'], 'string', 'max' => 255],
            [['name'], 'unique'],
            [['name'], 'unique']
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
            'category_id' => 'Category ID',
            'price' => 'Price',
            'description' => 'Description',
            'image' => 'Image',
            'slug' => 'Slug',
            'display_order' => 'Display Order',
            'created_on' => 'Created On',
            'created_by' => 'Created By',
            'last_edited_on' => 'Last Edited On',
            'last_edited_by' => 'Last Edited By',
            'is_active' => 'Is Active',
            'is_discountable' => 'Is Discountable',
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
                    //return str_replace(' ', '-', $this->name);

                    /*Replaces all spaces with hyphens.*/
                    $string = preg_replace('/[^A-Za-z0-9\-]/', '', $this->name); 
                    
                    /*Removes special chars.*/
                    return str_replace(' ', '-', $string); 
                }
            ],
        ];
    }

    public function getCategory()
    {
        return $this->hasOne(MenuCategory::className(), ['id' => 'category_id']);
    }
}
