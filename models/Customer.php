<?php

namespace app\models;
use yii\behaviors\SluggableBehavior;
use Yii;

/**
 * This is the model class for table "occupy".
 *
 * @property integer $id
 * @property string $customer_name
 * @property integer $customer_pan
 * @property string $customer_address
 * @property integer $customer_pax
 * @property integer $table_id
 * @property integer $floor_id
 * @property string $start_date
 * @property string $start_time
 * @property string $end_time
 * @property string $created_on
 * @property integer $created_by
 * @property integer $occupy_type
 * @property integer $status
 * @property integer $is_foc
 * @property string $last_edited_on
 * @property integer $last_edited_by
 */
class Customer extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'customer';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['slug','name','phone'], 'required'],
              [['slug','name'], 'string', 'max' => 100],
                [['phone'], 'string', 'max' => 15],
                
        ];
    }


    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Customer Name',
            'phone' => 'Customer Phone',
            'slug' => 'Customer Slug',
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
