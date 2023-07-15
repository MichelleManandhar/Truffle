<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "design_invoice".
 *
 * @property integer $id
 * @property integer $show_company_name
 * @property integer $show_address
 * @property integer $show_phone
 * @property integer $show_reg_no
 * @property integer $show_pan_no
 * @property integer $show_amount_text
 * @property integer $show_greeting_note
 * @property integer $show_operator_name
 * @property string $last_edited_on
 * @property integer $last_edited_by
 */
class DesignInvoice extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'design_invoice';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['show_customer_name', 'show_pan_no', 'show_amount_text', 'show_greeting_note', 'show_operator_name', 'last_edited_on', 'last_edited_by'], 'required'],
            [['show_customer_name', 'show_pan_no', 'show_amount_text', 'show_greeting_note', 'show_operator_name', 'last_edited_by'], 'integer'],
            [['width'], 'number'],
            [['last_edited_on'], 'safe']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'show_customer_name' => 'Show Customer Name',
            'show_pan_no' => 'Show Pan No',
            'show_amount_text' => 'Show Amount Text',
            'show_greeting_note' => 'Show Greeting Note',
            'show_operator_name' => 'Show Operator Name',
            'last_edited_on' => 'Last Edited On',
            'last_edited_by' => 'Last Edited By',
        ];
    }
}
