<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;
use yii\web\HttpException;
use app\models\FiscalYear;

use app\components\Misc;
use app\components\Query;

class FiscalYearController extends Controller
{
    public $to_group = array('admin');

    public function behaviors()
    {
        return [];
    }

    public function beforeAction($action) 
    {   
        $this->layout="login";
        if ($action->id=='error')
            $this->layout ='error';

        $group[] = Yii::$app->params['user_role']['superadmin'];
        if (isset($this->to_group)) {
            foreach($this->to_group as $to):
                $group[] = Yii::$app->params['user_role'][$to];
            endforeach;
        }

        if (Yii::$app->user->isGuest || !in_array(Yii::$app->session['eHhupx5UpkLZoXRP_cR1ozEVjY14zWOC0_user']->role, $group)) {
            throw new HttpException(404, 'Page not found.');
        }

        if(isset(Yii::$app->session['fiscal_year'])) {
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

    public function actionIndex()
    {  
        $fiscal_year = Query::queryOne("SELECT id,start_date FROM `fiscal_year` ORDER BY id ASC");
        if($fiscal_year != null) {
            return $this->render('set-fiscal-year-end-date', array('fiscal_year' => $fiscal_year));
        }
        throw new HttpException(404,'Page Not Found');   
    }

    public function actionSaveFiscalYearEndDate()
    {
        if(isset($_POST) && $_POST != null) {
            $fiscal_year = FiscalYear::findOne($_POST['fiscal_year']); 

            if($_POST['end_date'] <= date('Y-m-d',strtotime($fiscal_year->start_date.'+18 month -1 day'))) {
                $fiscal_year->end_date = (isset($_POST['end_date'])) ? htmlspecialchars($_POST['end_date'], ENT_QUOTES) : ''; 
                if($fiscal_year->update()) {
                    return $this->redirect(Yii::$app->request->baseUrl.'/site/logout');
                } 
            }
        }
        throw new HttpException(404,'Page Not Found');
    }
}