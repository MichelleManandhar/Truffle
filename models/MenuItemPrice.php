<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "menu_item_price".
 *
 * @property integer $id
 * @property integer $item_id
 * @property double $previous_price
 * @property double $changed_price
 * @property string $created_on
 * @property integer $created_by
 */
class MenuItemPrice extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'menu_item_price';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['item_id', 'previous_price', 'changed_price', 'created_on', 'created_by'], 'required'],
            [['item_id', 'created_by'], 'integer'],
            [['previous_price', 'changed_price'], 'number'],
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
            'item_id' => 'Item ID',
            'previous_price' => 'Previous Price',
            'changed_price' => 'Changed Price',
            'created_on' => 'Created On',
            'created_by' => 'Created By',
        ];
    }
}
