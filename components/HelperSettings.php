<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of settings
 *
 * @author gaurav maharjan
 */

namespace app\components;

use Yii;
use yii\base\Component;
use app\components\Query;
use app\components\Misc;
use app\components\Notify;
use app\models\Settings as Settings;

class HelperSettings extends Component {

    public static function addSetting($data) 
    {
        $model = new Settings(); 
        $model->field_name      = isset($data['field_name']) ? htmlspecialchars(trim($data['field_name']), ENT_QUOTES) : '';
        $model->value           = isset($data['value']) ? htmlspecialchars(trim($data['value']), ENT_QUOTES) : '';
        $model->is_active       = isset($data['is_active']) ? htmlspecialchars(trim($data['is_active']), ENT_QUOTES) : 0;
        $model->is_permanent    = isset($data['is_permanent']) ? htmlspecialchars(trim($data['is_permanent']), ENT_QUOTES) : 0;
        $model->created_on      = date('Y-m-d H:i:s');

        if($model->save()) {
            if(Yii::$app->session['eHhupx5UpkLZoXRP_cR1ozEVjY14zWOC0_user']->role != Yii::$app->params['user_role']['superadmin']) {
                $log = array(
                    'action' => "New setting has been added of field name = " . $model->field_name . " and value = " . $model->value,
                    'type' => "setting"
                );
                Notify::auditLog($log);
            }
            return $model;
        }else{
            return false;
        }
    }

    public static function editSetting($data, $id) 
    {
        $model = Settings::findOne($id);
        $model->field_name      = isset($data['field_name']) ? htmlspecialchars(trim($data['field_name']), ENT_QUOTES) : '';
        $model->value           = isset($data['value']) ? htmlspecialchars(trim($data['value']), ENT_QUOTES) : '';
        $model->is_active       = isset($data['is_active']) ? htmlspecialchars(trim($data['is_active']), ENT_QUOTES) : 0;
        $model->is_permanent    = isset($data['is_permanent']) ? htmlspecialchars(trim($data['is_permanent']), ENT_QUOTES) : 0;
        $model->created_on      = date('Y-m-d H:i:s');

        if($model->save()) {
            if($model->slug == 'currency') {
                Yii::$app->session['currency'] = $model->value;
            }
            if(Yii::$app->session['eHhupx5UpkLZoXRP_cR1ozEVjY14zWOC0_user']->role != Yii::$app->params['user_role']['superadmin']) {
                $log = array(
                    'action' => "Setting has been updated from " . $model->field_name . " and value = " . $model->value,
                    'type' => "setting"
                );
                Notify::auditLog($log);
            }
        }else{
            return false;
        }
    }

    public static function editableSetting($value, $id, $field, $old_value) 
    {
        $model = Settings::findOne($id);
        $model->$field = trim($value);

        if($model->save()) {
            if($model->slug == 'currency') {
                Yii::$app->session['currency'] = $model->value;
            }
            if(Yii::$app->session['eHhupx5UpkLZoXRP_cR1ozEVjY14zWOC0_user']->role != Yii::$app->params['user_role']['superadmin']) {
                $log = array(
                    'action' => "Setting has been updated from " . $old_value . " to " . $value,
                    'type' => "setting"
                );
                Notify::auditLog($log);
            }
            return $model;
        }else{
            return false;
        }
    }

    public static function editSettingFromSlug($value, $slug, $field) 
    {
        $model = Settings::find()->where(['slug' => $slug])->one(); 
        $model->$field = trim($value); 
        if($model->slug == 'currency') {
            Yii::$app->session['currency'] = $model->value;
        }
        return $model->update() ? $model : FALSE;
    }

    public static function getSettings($fields='') 
    {
        $select = Misc::if_exists($fields) ? implode(', ', $fields) : '*';
        $data = Query::queryAll("SELECT $select FROM `settings`");
        return Misc::exists($data, FALSE);
    }

    public static function getSetting($field, $value) 
    {
        $data = Query::queryOneSecure("SELECT * FROM `settings` WHERE `$field` = :value",[':value'=>$value]);
        return Misc::exists($data, FALSE);
    }

    public static function checkSetting($value, $id, $field) 
    {
        $condition = $id > 0 ? " AND `id` != $id" : ""; 
        $data = Query::queryOneSecure("SELECT * FROM `settings` WHERE `$field` = :value $condition",[':value'=>$value]);
        return Misc::exists($data, FALSE);
    }

    public static function deleteSetting($id)
    {
        $model = Settings::findOne($id);
        if ($model->is_permanent == 0) {
            return $model->delete() ? TRUE : FALSE;
        }
        return FALSE;
    }

    public static function getBasic($values)
    {
        $settings = '';

        $data = Query::queryAll("SELECT * FROM `settings` WHERE `slug` IN ($values)");
        foreach($data as $row):
            $settings[$row['slug']] = trim($row['value']);
            $settings[$row['slug'] . '-is-active'] = $row['is_active'];
        endforeach;
        return Misc::exists($settings, FALSE);
    }
}