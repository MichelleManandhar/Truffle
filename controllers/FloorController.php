<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;
use yii\web\HttpException;

use app\components\Misc;
use app\components\Query;
use app\components\HelperFloor as HFloor;

use app\models\Floor;

class FloorController extends Controller {

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

        if(!isset(Yii::$app->session['fiscal_year'])) {
            throw new HttpException(404, 'Page not found.');
        }else {
            $temp = explode(":",Yii::$app->session['fiscal_year']);
            $starting_fiscal_year_from_date = $temp[0];
            $starting_fiscal_year_to_date   = $temp[1];

            if ((date('Y-m-d') < $starting_fiscal_year_from_date) 
                    || ( date('Y-m-d') > date('Y-m-d', strtotime($starting_fiscal_year_to_date. ' + 11 days'))) )
            {
                throw new HttpException(404, 'Page not found.');
            }
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
        $floors = Query::queryAll("SELECT * FROM `floor` ORDER BY display_order ASC");
        return $this->render('index', array('floors' => $floors));
    }

    public function actionAdd()
    {  
        $latest = Misc::getLatestDate();
        if($latest != '' && date('Y-m-d') < $latest['latest_date'] ) { 
            echo json_encode(false); die;
        }else {
            if (Yii::$app->request->isAjax ) {
                if(isset($_POST) && $_POST['floor_name'] != null) {
                    echo json_encode(HFloor::addFloor($_POST)); die;
                }
            }
            throw new HttpException(404, 'Page not found.');
        }
    }

    public function actionEditable() 
    {
        $latest = Misc::getLatestDate();
        if($latest!= '' && date('Y-m-d') < $latest['latest_date'] ) { 
            echo json_encode(array(
                            'status' => 'error', 
                            'display_value' => $_POST['old_value'],
                            'msg' => 'Sorry! Could not update Floor detail at this time.'
                            )); die;
        }else {
            if (Yii::$app->request->isAjax) {
                if (HFloor::editableFloor(htmlspecialchars(trim($_POST['value']), ENT_QUOTES), $_POST['pk'], $_POST['name'])) {
                    echo json_encode(array(
                                    'status' => 'success', 
                                    'display_value' => $_POST['value'], 
                                    'msg' => 'Floor detail has been updated.'
                                    )); die;
                }
            }
            echo json_encode(array(
                            'status' => 'error', 
                            'display_value' => $_POST['old_value'],
                            'msg' => 'Sorry! Could not update Floor detail at this time.'
                            )); die;
        }
    }

    public function actionSorting() 
    {
        $latest = Misc::getLatestDate();
        if($latest != '' && date('Y-m-d') < $latest['latest_date'] ) { 
            return $this->redirect(Yii::$app->request->baseUrl . '/date-fraud/');
        }else {
            $floors = Query::queryAll("SELECT * FROM `floor` WHERE status = 1 ORDER BY display_order ASC");
            return $this->render('sorting', array('floors' => $floors));
        }
    }

    public function actionManageOrder()
    {
        $latest = Misc::getLatestDate();
        if($latest != '' && date('Y-m-d') < $latest['latest_date'] ) { 
            echo json_encode(false); die;
        }else {
            if (Yii::$app->request->isAjax) {
                if (HFloor::manageOrder($_GET)) {
                    echo json_encode(TRUE); die;
                }
            }
            echo json_encode(FALSE); die;
        }
    }
}