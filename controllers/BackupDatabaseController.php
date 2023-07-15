<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;
use yii\web\Controller;

use yii\web\HttpException;

use app\components\Misc;
use app\components\Notify;

class BackupDatabaseController extends Controller
{
	public $to_group = array('admin', 'staff', 'floor_supervisor');

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

    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ]
        ];
    }

	public function actionBackup() 
    {   
        $latest = Misc::getLatestDate();
        if($latest != '' &&  date('Y-m-d') < $latest['latest_date'] ) { 
            return $this->redirect(Yii::$app->request->baseUrl . '/date-fraud/');
        } else {
            $db_log = array(
                'action' => "Database has been backuped by the user <b>" . ucfirst(Yii::$app->session['eHhupx5UpkLZoXRP_cR1ozEVjY14zWOC0_user']->username) . "</b>",
                'type' => "database"
            );
            Notify::auditLog($db_log);

            $data = 'Database has been backup By ' . ucfirst(Yii::$app->session['eHhupx5UpkLZoXRP_cR1ozEVjY14zWOC0_user']->username) . ' on ' . date('Y-m-d H:i:s');
            $file = 'backup.txt';
            if(!file_exists('log' . DIRECTORY_SEPARATOR . $file)) {
                $handle = fopen('log' . DIRECTORY_SEPARATOR . $file ,'wr');
                fwrite($handle,$data);
            } else {
                $handle = fopen('log' . DIRECTORY_SEPARATOR . $file ,'a');
                fwrite($handle, "\n". $data);
            }
            
            fclose($handle);
            
            return $this->render('manual_db_backup');
        }
    }

}