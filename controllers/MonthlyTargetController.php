<?php
namespace app\controllers;

use Yii;
use yii\web\Controller;
use yii\web\HttpException;

use app\components\Query;
use app\components\Misc;

use app\models\MonthlyTarget;

class MonthlyTargetController extends Controller {

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
		$data = Query::queryall("SELECT mt.month, mt.target, mt.last_edited_on, mt.id, u.name 
                                FROM `monthly_target` as mt
								LEFT JOIN user as u ON u.id = mt.last_edited_by ORDER BY mt.id");
		return $this->render('index' , array('data' => $data));
	}

    public function actionEditable() 
    {
        $latest = Misc::getLatestDate();
        if( $latest != '' && date('Y-m-d') < $latest['latest_date'] ) { 
            echo json_encode(array(
                            'status' => 'error', 
                            'display_value' => $_POST['old_value'],
                            'msg' => 'Sorry! Could not update monthly target at this time.'
                            )); die;
        } else {
            if (Yii::$app->request->isAjax && isset($_POST['pk']) && $_POST['pk'] > 0) {
                if ($target = MonthlyTarget::findOne($_POST['pk'])) {
                    $date = date('Y-m-d H:i:s');
                    $target->target         = htmlspecialchars(trim($_POST['value']), ENT_QUOTES);
                    $target->last_edited_on = $date;
                    $target->last_edited_by = Yii::$app->session['eHhupx5UpkLZoXRP_cR1ozEVjY14zWOC0_user']->id;
                    if ($target->update()) {
                        echo json_encode(array(
                                        'status' => 'success', 
                                        'display_value' => $_POST['value'], 
                                        'msg' => 'Your monthly target has been updated.',
                                        'target' => true,
                                        'edited_on' => date('D, jS M, Y', strtotime($date)),
                                        'edited_by' => Yii::$app->session['eHhupx5UpkLZoXRP_cR1ozEVjY14zWOC0_user']->name
                                        )); die;
                    }
                }
            }
            echo json_encode(array(
                            'status' => 'error', 
                            'display_value' => $_POST['old_value'],
                            'msg' => 'Sorry! Could not update monthly target at this time.'
                            )); die;
        }
    }
}