<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "obstacles".
 *
 * @property integer $id
 * @property string $obstacle_name
 * @property integer $floor
 * @property double $x_pos
 * @property double $y_pos
 * @property double $height
 * @property double $width
 */
class Obstacles extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'obstacles';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            // [['x_pos', 'y_pos', 'height', 'width'], 'required'],
            [['floor'], 'integer'],
            [['x_pos', 'y_pos', 'height', 'width'], 'number'],
            [['obstacle_name'], 'string', 'max' => 150]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'obstacle_name' => 'Obstacle Name',
            'floor' => 'Floor',
            'x_pos' => 'X Pos',
            'y_pos' => 'Y Pos',
            'height' => 'Height',
            'width' => 'Width',
        ];
    }
}
