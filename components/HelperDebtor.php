<?php

namespace app\components;

use Yii;
use yii\base\Component;
use app\components\Query;
use app\components\Misc;
use app\models\Debtors;

class HelperDebtor extends Component {
	public static function editableDebtor($value, $id, $field) {
        $model = Debtors::findOne($id);
        $model->$field = $value;
        $model->last_edited_on = date('Y-m-d H:i:s');
        return $model->update() ? $model : FALSE;
    }	

    public static function checkDebtor($value, $id, $field) 
    {
        $condition = $id > 0 ? " AND `id` != $id" : ""; 
        $data = Query::queryOne("SELECT * FROM `debtors` WHERE `$field` = '$value' $condition");
        return Misc::exists($data, FALSE);
    }
}