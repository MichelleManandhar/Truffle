<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tips".
 *
 * @property integer $id
 * @property double $amount
 * @property string $created_on
 * @property integer $created_by
 */
class Tips extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tips';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['amount','type'], 'number'],
            [['created_on'], 'safe'],
            [['created_by'], 'integer']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'amount' => 'Amount',
            'created_on' => 'Created On',
            'created_by' => 'Created By',
        ];
    }
}
