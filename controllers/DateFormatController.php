<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;
use yii\web\HttpException;

use app\components\Misc;

class DateFormatController extends Controller {

    public $to_group = array('admin', 'staff','floor_supervisor');


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

    public function actionIndex()
    {
        if(Yii::$app->request->isAjax && isset($_POST) && $_POST['date_type'] != null) {

            if($_POST['date_type'] == 'nepali') {
                Yii::$app->session->set('date_format', 'nepali');
            }
            elseif($_POST['date_type'] == 'english') {
                Yii::$app->session->set('date_format', 'english');
            }
            echo json_encode(array('status' => true,
                                    'date_type' => $_POST['date_type'])); die;
        }
        echo json_encode(false); die;
    }
}