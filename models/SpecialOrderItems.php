<?php

namespace app\models;

use Yii;
use app\models\MenuCategory;

/**
 * This is the model class for table "special_order_items".
 *
 * @property integer $id
 * @property string $name
 * @property double $price
 * @property string $description
 * @property integer $category_id
 * @property string $image
 * @property string $created_on
 * @property integer $created_by
 */
class SpecialOrderItems extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'special_order_items';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['price'], 'number'],
            [['description', 'remarks'], 'string'],
            [['category_id', 'created_by'], 'integer'],
            [['created_on'], 'safe'],
            [['name', 'image'], 'string', 'max' => 255]
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
            'price' => 'Price',
            'description' => 'Description',
            'category_id' => 'Category ID',
            'image' => 'Image',
            'created_on' => 'Created On',
            'created_by' => 'Created By',
        ];
    }

    public function getCategory()
    {
        return $this->hasOne(MenuCategory::className(), ['id' => 'category_id']);
    }
}
