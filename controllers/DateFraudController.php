<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;
use yii\web\Controller;
use yii\web\HttpException;

class DateFraudController extends Controller
{
	public $to_group = array('admin', 'staff','floor_supervisor');

	public function behaviors()
    {
        return [];
    }

    public function beforeAction($action) 
    { 
        $this->layout ='error';

        $group[] = Yii::$app->params['user_role']['superadmin'];
        if (isset($this->to_group)) {
            foreach($this->to_group as $to):
                $group[] = Yii::$app->params['user_role'][$to];
            endforeach;
        }

        return parent::beforeAction($action);
    }

    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ]
        ];
    }

	public function actionIndex() 
    {   
        return $this->render('index');
    }

}