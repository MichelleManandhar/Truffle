<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of menu item
 *
 * @author gaurav maharjan
 */

namespace app\components;

use Yii;
use yii\base\Component;
use app\components\Notify;
use app\models\Floor;
use app\models\TableDetails;


class HelperFloor extends Component {

    public static function addFloor($data) 
    {   
        $order_data = Query::queryOne("SELECT MAX(display_order) as max FROM `floor`"); 
        if ($order_data != null) {
            $order = $order_data['max'] + 1;
        }
        else {
            $order = 1;
        }

        $model                  = new Floor(); 
        $model->name            = isset($data['floor_name']) ? htmlspecialchars(trim($data['floor_name']), ENT_QUOTES) : '';
        $model->display_order   = $order;
        $model->status          = 1;
        $model->created_on      = date('Y-m-d H:i:s');
        $model->created_by      = Yii::$app->session['eHhupx5UpkLZoXRP_cR1ozEVjY14zWOC0_user']->id;
       
        if($model->save()) {
            if(Yii::$app->session['eHhupx5UpkLZoXRP_cR1ozEVjY14zWOC0_user']->role != Yii::$app->params['user_role']['superadmin']) {
                $log = array(
                    'action' => "Floor has been added",
                    'type' => "table"
                );
                Notify::auditLog($log);
            }

            return true;
        }else{
            return false;
        }
    }

    public static function getMainFloor() 
    {
        $floor = Query::queryAll("SELECT * FROM `floor` WHERE status = 1 ORDER BY display_order ASC");
        if($floor != null) {
            return $floor[0];
        }else {
            return '';
        }
        
    }

    public static function editableFloor($value, $id, $field) 
    {
        $model = Floor::findOne($id);
        $model->$field = $value;
        
        if($model->update()) {
            if(Yii::$app->session['eHhupx5UpkLZoXRP_cR1ozEVjY14zWOC0_user']->role != Yii::$app->params['user_role']['superadmin']) {
                $log = array(
                    'action' => "Menu item has been updated",
                    'type' => "menu"
                );
                Notify::auditLog($log);
            }

            return $model;
        }else{
            return false;
        }
    }

    /* --- if required to sort the section ordering --- */
    public static function manageOrder($data)
    {
        $floors = Query::queryAll("SELECT id, display_order FROM `floor` ORDER BY display_order ASC");

        for ($i=0; $i < count($floors); $i++) {

            for ($j=0; $j < count($data['floor']); $j++) {
                
                if( $j == 0 ) {
                    $total_height = $data['screen_height'];
                }elseif( $j > 0 ) {
                    $total_height += $data['screen_height'];
                }
                if($floors[$i]['id'] == $data['floor'][$j] && $i != $j) {
                    if( $i > $j ) {
                        Query::execute("UPDATE `table_details` SET y_pos = y_pos-".$total_height." WHERE floor = ".$floors[$i]['id']);
                    } 
                    elseif( $i < $j ) {
                        Query::execute("UPDATE `table_details` SET y_pos = y_pos+".$total_height." WHERE floor = ".$floors[$i]['id']);
                    }
                }
            }
        }

        $z=1;
        foreach($data['floor'] as $id) {
            $floor = Floor::findOne($id);
            if ($floor) {
                $floor->display_order = $z;
                $floor->update();
            }
            $z++;
        }

        return TRUE;
    }
}