<?php

namespace app\components;

use Yii;
use yii\base\Component;
use app\components\Query;
use app\models\AuditLog;

class Notify extends Component {

    public static  function auditLog($data) {
        $audit = new AuditLog();
        $audit->created_by = Yii::$app->session['eHhupx5UpkLZoXRP_cR1ozEVjY14zWOC0_user']->id;
        $audit->created_at = date('Y-m-d H:i:s');
        $audit->action = $data['action'];
        $audit->type = $data['type'];
        return $audit->save();
    }
}