<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;
use yii\web\HttpException;
use app\components\Query;
use app\models\AuditLog;

class AuditLogController extends Controller {

	public $to_group = array('admin');

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

	public function actionView() 
	{
		$log = Query::queryall("SELECT al.* , u.name FROM `audit_log` as al
								LEFT JOIN user as u ON u.id = al.created_by");
		return $this->render('index' , array('log' => $log));
	}
}