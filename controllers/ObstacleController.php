<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ObstacleController
 *
 * @author gaurav maharjan
 */

namespace app\controllers;

use Yii;
use yii\web\Controller;
use yii\web\HttpException;

use app\components\Misc;
use app\components\Query;
use app\components\Sync;
use app\components\Notify;
use app\components\UniqueUser;
use app\components\HelperSettings as HSettings;

use app\models\Obstacles;


class ObstacleController extends Controller
{
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
		if ($action->id == 'error')
			$this->layout = 'error';

		$group[] = Yii::$app->params['user_role']['superadmin'];
		if (isset($this->to_group)) {
			foreach ($this->to_group as $to):
				$group[] = Yii::$app->params['user_role'][$to];
			endforeach;
		}

		Yii::$app->controller->enableCsrfValidation = false; /*true this for all actions except for the ones inside the modal.*/

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

	public function actionCreate()
	{
		$latest = Misc::getLatestDate();
        if( $latest != '' && date('Y-m-d') < $latest['latest_date'] ) { 
            echo json_encode(false); die;
        } else {
			if(UniqueUser::checkUniqueLogin() == false) {
		        $max=0;
		        $max_obstacles = Query::queryOne('SELECT MAX(id) as max FROM `obstacles`');
		        if ($max_obstacles['max'] != null) {
		           $max = $max_obstacles['max'] + 1;
		        }
		        else {
					$max=1;        	
		        }

				if (Yii::$app->request->isAjax) {
		            $obstacle = new Obstacles();
					$obstacle->obstacle_name 	= "Obstacle - " . $max;
					$obstacle->floor 			= (isset($_POST['floor']) && $_POST['floor'] != null) ? $_POST['floor'] : 1;
					$obstacle->x_pos 			= (isset($_POST['x_pos']) && $_POST['x_pos'] != null) ? $_POST['x_pos'] : 0;
					$obstacle->y_pos 			= (isset($_POST['y_pos']) && $_POST['y_pos'] != null) ? $_POST['y_pos'] : 0;
					$obstacle->height 			= (isset($_POST['height']) && $_POST['height'] != null) ? $_POST['height'] : 100;
					$obstacle->width 			= (isset($_POST['width']) && $_POST['width'] != null) ? $_POST['width'] : 100;

					if ($obstacle->save()) {

						$log = array(
			                'action' => "New obstacle has been created named -" . $obstacle->obstacle_name ." on the floor no. " . $obstacle->floor,
			                'type' => "table"
			            );
			            Notify::auditLog($log);

						Sync::set_obstacle_data($obstacle->id, 'create');
						echo json_encode(array(
							'id' 			=> $obstacle->id,
							'floor' 		=> $obstacle->floor,
							'height'		=> $obstacle->height,
							'width' 		=> $obstacle->width,
							'obstacle_name'	=> $obstacle->obstacle_name
						)); die;
					}
				}
				echo json_encode(FALSE);die;
			}else{
				echo json_encode(array('status' => 'logout'));die;
			}
		}
	}

	public function actionUpdate()
	{
		$latest = Misc::getLatestDate();
        if( $latest != '' && date('Y-m-d') < $latest['latest_date'] ) { 
            echo json_encode(false); die;
        } else {
			if(UniqueUser::checkUniqueLogin() == false) {
				if (Yii::$app->request->isAjax) {
					$obstacle = Obstacles::findOne($_POST['id']);
					if ($obstacle != null) {
						$obstacle->x_pos 	= (isset($_POST['x_pos']) && $_POST['x_pos'] != null) ? $_POST['x_pos'] : $obstacle->x_pos;
						$obstacle->y_pos 	= (isset($_POST['y_pos']) && $_POST['y_pos'] != null) ? $_POST['y_pos'] : $obstacle->y_pos;
						$obstacle->height 	= (isset($_POST['height']) && $_POST['height'] != null) ? $_POST['height'] : $obstacle->height;
						$obstacle->width 	= (isset($_POST['width']) && $_POST['width'] != null) ? $_POST['width'] : $obstacle->width;
						if ($obstacle->update()) {
							Sync::set_obstacle_data($obstacle->id, 'update');
							echo json_encode(array('id' => $obstacle->id)); die;
						}
					}
				}
				echo json_encode(FALSE);die;
			}else{
				echo json_encode(array('status' => 'logout'));die;
			}
		}
	}

	public function actionUpdateObstacleName()
	{
		$latest = Misc::getLatestDate();
        if( $latest != '' && date('Y-m-d') < $latest['latest_date'] ) { 
            echo json_encode(false); die;
        } else {
			if(UniqueUser::checkUniqueLogin() == false) {
				if (Yii::$app->request->isAjax) {
					if (isset($_POST['id']) && $_POST['id'] > 0) {
						$obstacle = Obstacles::findOne($_POST['id']);
						if ($obstacle != null && isset($_POST['obstacle_name']) && $_POST['obstacle_name'] != null) {
							$name = htmlspecialchars(trim($_POST['obstacle_name']), ENT_QUOTES);
							if ($obstacle->obstacle_name != $name) {
								$obstacle->obstacle_name = $name;						
								if ($obstacle->update()) {
									
									$log = array(
						                'action' => "Obstacle name has been updated",
						                'type' => "table"
						            );
						            Notify::auditLog($log);

									Sync::set_obstacle_data($obstacle->id, 'update');
									echo json_encode(array(
										'id' => $obstacle->id,
										'obstacle_name' => $obstacle->obstacle_name
									)); die;
								}
							}
							else {
								echo json_encode(array(
									'id' => $_POST['id'],
									'obstacle_name' => $_POST['obstacle_name']
								)); die;
							}
						}
					}
				}
				echo json_encode(FALSE);die;
			}else{
				echo json_encode(array('status' => 'logout'));die;
			}
		}
	}

	public function actionCheckObstacleName() 
    {
    	$latest = Misc::getLatestDate();
        if( $latest != '' && date('Y-m-d') < $latest['latest_date'] ) { 
            echo json_encode(false); die;
        } else {
	    	if(UniqueUser::checkUniqueLogin() == false) {
		    	if (Yii::$app->request->isAjax) {
		    		if (isset($_POST['id']) && $_POST['id'] != null && isset($_POST['obstacle_name'])) {
		    			$id = $_POST['id'];
		    			$value = htmlspecialchars(trim($_POST['obstacle_name']), ENT_QUOTES);
				        $condition = $id > 0 ? " AND `id` != $id" : ""; 
				        $data = Query::queryOne("SELECT `id` FROM `obstacles` WHERE `obstacle_name` = '$value' $condition");
				        if ($data == null) {
				        	echo json_encode(TRUE);die;
				        }
				    }
			    }
		        echo json_encode(FALSE);die;
		    }else{
				echo json_encode(array('status' => 'logout'));die;
			}
		}
    }

	public function actionDelete()
	{
		$latest = Misc::getLatestDate();
        if($latest != '' &&  date('Y-m-d') < $latest['latest_date'] ) { 
            echo json_encode(false); die;
        } else {
			if(UniqueUser::checkUniqueLogin() == false) {
				if (Yii::$app->request->isAjax) {
					$settings = HSettings::getBasic("'lock-obstacle'");
					if($settings['lock-obstacle'] != null && $settings['lock-obstacle'] != 'yes') {
						$obstacle = Obstacles::findOne($_POST['id']);
						if ($obstacle != null) {
							if ($obstacle->delete()) {

								$log = array(
					                'action' => "Obstacle has been deleted",
					                'type' => "table"
					            );
					            Notify::auditLog($log);

								Sync::set_obstacle_data($obstacle->id, 'remove');
								echo json_encode(TRUE); die;
							}
						}
					}else{
						echo json_encode(array('error' => 'Cannot remove obstacle when they are locked')); die;
					}
				}
				echo json_encode(FALSE);die;
			}else{
				echo json_encode(array('status' => 'logout'));die;
			}
		}
	}
	
	public function actionRunSyncObstacleMain() 
	{
		header('Content-Type: text/event-stream');
        header('Cache-Control: no-cache');
        echo "retry: 1000\n"; /*default is 3 seconds.*/

        $json_file = Yii::getAlias("@webroot/assets/json/obstacle.json");
		$json_array = json_decode(file_get_contents($json_file), true);	
		//$ip = Sync::get_client_ip();
		$ip = Yii::$app->session['eHhupx5UpkLZoXRP_cR1ozEVjY14zWOC0_user']->encrypt;
		if (isset($json_array['bool'][$ip]) && $json_array['bool'][$ip] == "1") {
			$json_array['bool'][$ip] = "0";
			$fp = fopen($json_file, 'w');
            fwrite($fp, json_encode($json_array));
            fclose($fp);

            echo "data: YES\n\n"; flush(); exit;
		}
		echo "data: NO\n\n"; flush(); exit;
	}

	public function actionRunSyncObstacle() 
	{
		header('Content-Type: text/event-stream');
        header('Cache-Control: no-cache');
        echo "retry: 1000\n"; /*default is 3 seconds.*/

        if (isset($_GET['table']) && $_GET['table'] != null 
        	&& isset($_GET['action']) && $_GET['action'] != null) {

	        $id = $_GET['table'];
			$action = $_GET['action'];

	        $json_file = Yii::getAlias("@webroot/assets/json/obstacle.json");
			$json_array = json_decode(file_get_contents($json_file), true);	
			//$ip = Sync::get_client_ip();
            $ip = Yii::$app->session['eHhupx5UpkLZoXRP_cR1ozEVjY14zWOC0_user']->encrypt;
			if (isset($json_array['data'][$id][$ip][$action]) && $json_array['data'][$id][$ip][$action] == "1") {

				if ($action == 'remove') {
					$json_array['data'] = array_diff_key($json_array['data'], array_flip([$id]));

					$fp = fopen($json_file, 'w');
		            fwrite($fp, json_encode($json_array));
		            fclose($fp);

					echo "event: shutDown\n";
					echo "data: YES\n\n"; flush(); exit;
				}

				$data = Query::queryOneSecure("SELECT * FROM `obstacles` WHERE id = :id",[':id'=>htmlspecialchars($id, ENT_QUOTES)]);

				if ($data != null) {
					$json_array['data'][$id][$ip][$action] = "0";

					$fp = fopen($json_file, 'w');
		            fwrite($fp, json_encode($json_array));
		            fclose($fp);

					$return = ''; $i = 0; $yes = true;
					foreach($data as $key => $value):
						$i++;
						if (count($data) == $i) $yes = false;
						$return .=  '"' . $key . '" : ' . '"' . $value . '"' . (($yes) ? ', ' : '');
					endforeach;

					if ($action == 'create') { echo "event: createObstacle\n"; }
					else if ($action == 'update') { echo "event: updateObstacle\n"; }
		         	echo 'data: {' . $return . '}' . "\n\n"; flush();
			  	}
			}
		}	
	  	echo "event: shutDown\n";
		echo "data: YES\n\n"; flush(); exit;
	}
}