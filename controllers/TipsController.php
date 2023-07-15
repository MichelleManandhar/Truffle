<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\HttpException;

use app\components\Misc;
use app\components\Query;
use app\components\Notify;

use app\models\Tips;

class TipsController extends Controller {

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

        $condition = '';
        $from = '';
        if (isset($_GET['from']) && $_GET['from'] != '') {
            $from = $_GET['from'];
            $condition .= " WHERE DATE(created_on) >= '".$_GET['from']."'";
            if (isset($_GET['to']) && $_GET['to'] != '') {
                $condition .= " AND DATE(created_on) <= '".$_GET['to']."'";
            }
        }
        else if ((!isset($_GET['from']) || $_GET['from'] != '') && isset($_GET['to']) && $_GET['to'] != '') {
            $condition .= " WHERE DATE(created_on) <= '".$_GET['to']."'";
        }
        else {
            $condition = "";
        }

        $tips_received_before       = Query::queryOne("SELECT SUM(amount) as total 
                                        FROM `tips` WHERE DATE(created_on) < '".$from ."' AND type = ".Yii::$app->params['tip']['received']);
        $tips_distributed_before    = Query::queryOne("SELECT SUM(amount) as total
                                        FROM `tips` WHERE DATE(created_on) < '".$from."' AND type = ".Yii::$app->params['tip']['distributed']);

        $opening_balance    = (($tips_received_before['total'] != '') ? $tips_received_before['total'] : 0) - (($tips_distributed_before['total'] != '') ? $tips_distributed_before['total'] : 0);

        $tips               = Query::queryAll("SELECT SUM(amount) as total, created_on, type FROM `tips` " . $condition . " GROUP BY type, DATE(created_on) ORDER BY created_on");

        $total_tip_received     = Query::queryOne("SELECT SUM(amount) as total FROM `tips` WHERE type = ".Yii::$app->params['tip']['received']);
        $total_tip_distributed  = Query::queryOne("SELECT SUM(amount) as total FROM `tips` WHERE type = ".Yii::$app->params['tip']['distributed']);

        $tips_distributed = Query::queryAll("SELECT SUM(amount) as total , date(created_on) as created_on FROM `tips` WHERE type = ". Yii::$app->params['tip']['distributed'] . " GROUP BY date(created_on)");

        return $this->render('distribute' , array('tips'                    => $tips,
        											'tips_distributed' 		=> $tips_distributed,
                                                    'opening_balance'       => $opening_balance,
                                                    'opening_balance_date'  => $from,
                                                    'total_tip_received'    => $total_tip_received,
                                                    'total_tip_distributed' => $total_tip_distributed));
    }

    public function actionDistribute() 
    {
        $latest = Misc::getLatestDate();
        if( $latest != '' && date('Y-m-d') < $latest['latest_date'] ) { 
            echo json_encode(false); die;
        } else {
            $temp = explode(":",Yii::$app->session['fiscal_year']);
            $starting_fiscal_year_from_date = $temp[0];
            $starting_fiscal_year_to_date   = $temp[1];

            if ((date('Y-m-d') < $starting_fiscal_year_from_date) 
                    || ( date('Y-m-d') > date('Y-m-d', strtotime($starting_fiscal_year_to_date. ' + 11 days'))) )
            {
                echo json_encode(false); die;
            } else {
            	if(Yii::$app->request->isAjax && isset($_POST) && $_POST['tips_to_distribute'] != 0 && $_POST['tips_to_distribute'] != '') {
            		$tips 				= new Tips();
            		$tips->amount 		= $_POST['tips_to_distribute'];
            		$tips->type         = Yii::$app->params['tip']['distributed'];
            		$tips->created_on   = date('Y-m-d H:i:s');
                	$tips->created_by   = Yii::$app->session['eHhupx5UpkLZoXRP_cR1ozEVjY14zWOC0_user']->id;
            		if($tips->save()) {

                        if(Yii::$app->session['eHhupx5UpkLZoXRP_cR1ozEVjY14zWOC0_user']->role != Yii::$app->params['user_role']['superadmin']) {
                            $log = array(
                                'action' => "Tip amount " . $tips->amount . " has been distributed",
                                'type' => "tip"
                            );
                            Notify::auditLog($log);
                        }

            			echo json_encode(true); die;
            		}
            	}
            	echo json_encode(false); die;
            }
        }
    }
}