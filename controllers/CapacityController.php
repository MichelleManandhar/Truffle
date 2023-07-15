<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\HttpException;

use app\components\Misc;
use app\components\Query;
use app\components\HelperSettings as HSettings;
use app\models\Capacity;

class CapacityController extends Controller {

    public $to_group = array('admin');


    /**
     * @inheritdoc
     */
    public function behaviors() 
    {
        return [];
    }

    public function beforeAction($action) 
    { 
        if ($action->id=='error')
             $this->layout ='error';

        $group[] = Yii::$app->params['user_role']['superadmin'];
        if (isset($this->to_group)) {
            foreach($this->to_group as $to):
                $group[] = Yii::$app->params['user_role'][$to];
            endforeach;
        }

        if (!isset(Yii::$app->session['eHhupx5UpkLZoXRP_cR1ozEVjY14zWOC0_user']) || Yii::$app->user->isGuest || !in_array(Yii::$app->session['eHhupx5UpkLZoXRP_cR1ozEVjY14zWOC0_user']->role, $group)) { 
            throw new HttpException(404, 'Page not found.');
        }

        if(isset(Yii::$app->session['fiscal_year'])) {
            $temp = explode(":",Yii::$app->session['fiscal_year']);
            $starting_fiscal_year_from_date = $temp[0];
            $starting_fiscal_year_to_date   = $temp[1];

            if ((date('Y-m-d') < $starting_fiscal_year_from_date) 
                    || ( date('Y-m-d') > date('Y-m-d', strtotime($starting_fiscal_year_to_date. ' + 11 days'))) )
            {
                throw new HttpException(404, 'Page not found.');
            }
        }else {
            throw new HttpException(404, 'Page not found.');
        }
        
        return parent::beforeAction($action);
    }

    /**
     * @inheritdoc
     */
    public function actions() 
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
        ];
    }

    public function actionAdd() 
    {
        $latest = Misc::getLatestDate();
        if($latest != '' &&  date('Y-m-d') < $latest['latest_date'] ) { 
            echo json_encode(false); die;
        } else {
            if(Yii::$app->request->isAjax && isset($_POST['capacity']) && $_POST['capacity'] != null) {
                $recent_capacity = Query::queryOne("SELECT capacity FROM `capacity` ORDER BY id DESC LIMIT 1");
                
                if($recent_capacity['capacity'] != $_POST['capacity']) {
                    $capacity_tbl = new Capacity();
                    $capacity_tbl->capacity   = htmlspecialchars(trim($_POST['capacity']), ENT_QUOTES);
                    $capacity_tbl->created_on = date('Y-m-d H:i:s');
                    $capacity_tbl->created_by = Yii::$app->session['eHhupx5UpkLZoXRP_cR1ozEVjY14zWOC0_user']->id;
                    if($capacity_tbl->save()) {
                        echo json_encode(true); die;
                    }
                }
                echo json_encode(true); die;
            }
            echo json_encode(false); die;
        }
    }
}