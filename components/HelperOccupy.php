<?php

namespace app\components;

use Yii;
use yii\base\Component;
use app\components\Query;
use app\components\Misc;
use app\components\Notify;

use app\models\Occupy;

class HelperOccupy extends Component {

    public static function setOccupied($occupy_id) 
    {
        if($occupy_id != null) {
            $occupy = Occupy::findOne($occupy_id);
            $occupy->is_occupied = Yii::$app->params['is_occupied']['yes'];
            if($occupy->save()) {
                return true;
            }
        }
        return false;
    }
}