<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "audit_log".
 *
 * @property integer $id
 * @property integer $created_by
 * @property string $action
 * @property string $type
 * @property string $created_at
 */
class AuditLog extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'audit_log';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['created_by'], 'integer'],
            [['action'], 'string'],
            [['created_at'], 'safe'],
            [['type'], 'string', 'max' => 10]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'created_by' => 'Created By',
            'action' => 'Action',
            'type' => 'Type',
            'created_at' => 'Created At',
        ];
    }
}
