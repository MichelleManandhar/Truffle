<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "stock_entries".
 *
 * @property integer $id
 * @property integer $stock_item_id
 * @property double $stock_in
 * @property double $stock_out
 * @property integer $is_os
 * @property double $adjusted_quantity
 * @property string $adjusted_date
 * @property string $remarks
 * @property string $created_on
 * @property integer $created_by
 */
class StockEntries extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'stock_entries';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['stock_item_id', 'is_os', 'created_by'], 'integer'],
            [['stock_in', 'stock_out', 'adjusted_quantity'], 'number'],
            [['adjusted_date', 'created_on'], 'safe'],
            [['remarks'], 'string']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'stock_item_id' => 'Stock Item ID',
            'stock_in' => 'Stock In',
            'stock_out' => 'Stock Out',
            'is_os' => 'Is Os',
            'adjusted_quantity' => 'Adjusted Quantity',
            'adjusted_date' => 'Adjusted Date',
            'remarks' => 'Remarks',
            'created_on' => 'Created On',
            'created_by' => 'Created By',
        ];
    }
}
