<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of OrderController
 *
 * @author gaurav maharjan
 */

namespace app\controllers;

use Yii;
use yii\web\Controller;
use yii\web\HttpException;

use app\components\Sync;
use app\components\Misc;
use app\components\UniqueUser;
use app\components\Query;
use app\components\Notify;
use app\components\HelperMenuItem as HMenu;
use app\components\HelperMenuCategory as HMenuCat;
use app\components\HelperSettings as HSettings;
use app\models\User;
use app\models\TableDetails;
use app\models\BookedTables;
use app\models\Occupy;
use app\models\TempItems;
use app\models\Retail;
use app\models\TakeAway;
use app\models\PickUp;
use app\models\Delivery;

class TableController extends Controller
{
	public $to_group = array('admin', 'staff','floor_supervisor');

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
		if(UniqueUser::checkUniqueLogin() == false) {
			$table_data 	= Query::queryAll("SELECT * FROM `table_details` WHERE is_deleted = 0");
			$floors	 		= Query::queryAll("SELECT * FROM `floor` ORDER BY display_order ASC");
			$obstacle_data 	= Query::queryAll("SELECT * FROM obstacles");
			$occupy_data 	= Query::queryAll("SELECT id, table_id, start_date, start_time, customer_pax FROM occupy WHERE is_occupied = ". Yii::$app->params['is_occupied']['yes']);
			$tables = [];
			if ($table_data != null) {
				foreach($table_data as $tdata):
					$tables[$tdata['floor']][] = $tdata;
				endforeach;
			}
			
			$obstacles = [];
			if ($obstacle_data != null) {
				foreach($obstacle_data as $obdata):
					$obstacles[$obdata['floor']][] = $obdata;
				endforeach;
			}

			$occupies = [];
			if ($occupy_data != null) {
				foreach($occupy_data as $odata):
	                $occupies[$odata['table_id']] = $odata;
				endforeach;
			}

			$floor_count = 0;
			foreach ($floors as $floor) {
				$floor_count++;
			}

	        $settings = HSettings::getBasic("'lock-obstacle', 'lock-table'");
			$lock_obstacle = ($settings['lock-obstacle'] != null && $settings['lock-obstacle'] != 'yes') ? 1 : 0;
			$lock_table    = ($settings['lock-table'] != null && $settings['lock-table'] != 'yes') ? 1 : 0;

			// echo "<pre>"; print_r($tables); die;

			if(Yii::$app->session['session_device'] == "mobile") {
				return $this->render('index-small', array(
					'tables'   		=> $tables,
					'floors' 		=> $floors,
					'table_data'	=> $table_data,
					'obstacles' 	=> $obstacles,
					'occupies' 		=> $occupies,
					'lock_obstacle' => $lock_obstacle,
					'lock_table'    => $lock_table,
					'floor_count'	=> $floor_count
				));
			}
			else {
				return $this->render('index', array(
					'tables'   		=> $tables,
					'floors' 		=> $floors,
					'table_data'	=> $table_data,
					'obstacles' 	=> $obstacles,
					'occupies' 		=> $occupies,
					'lock_obstacle' => $lock_obstacle,
					'lock_table'    => $lock_table,
					'floor_count'	=> $floor_count
				));
			}
			
		}else{
			return $this->redirect(Yii::$app->request->baseUrl.'/site/logout');
		}
	}

	public function actionIndexSmall()
	{   
		if(UniqueUser::checkUniqueLogin() == false) {
			$table_data 	= Query::queryAll("SELECT * FROM table_details WHERE is_deleted = 0");
			$floors	 		= Query::queryAll("SELECT * FROM `floor` ORDER BY display_order ASC");
			$obstacle_data 	= Query::queryAll("SELECT * FROM obstacles");
			$occupy_data 	= Query::queryAll("SELECT id, table_id, start_date, start_time FROM occupy");
			$tables = [];
			if ($table_data != null) {
				foreach($table_data as $tdata):
					$tables[$tdata['floor']][] = $tdata;
				endforeach;
			}
			
			$obstacles = [];
			if ($obstacle_data != null) {
				foreach($obstacle_data as $obdata):
					$obstacles[$obdata['floor']][] = $obdata;
				endforeach;
			}

			$occupies = [];
			if ($occupy_data != null) {
				foreach($occupy_data as $odata):
	                $occupies[$odata['table_id']] = $odata;
				endforeach;
			}

			$floor_count = 0;
			foreach ($floors as $floor) {
				$floor_count++;
			}

	        $settings = HSettings::getBasic("'lock-obstacle', 'lock-table'");
			$lock_obstacle = ($settings['lock-obstacle'] != null && $settings['lock-obstacle'] != 'yes') ? 1 : 0;
			$lock_table    = ($settings['lock-table'] != null && $settings['lock-table'] != 'yes') ? 1 : 0;

			return $this->render('index-small', array(
				'tables'   		=> $tables,
				'floors' 		=> $floors,
				'table_data'	=> $table_data,
				'obstacles' 	=> $obstacles,
				'occupies' 		=> $occupies,
				'lock_obstacle' => $lock_obstacle,
				'lock_table'    => $lock_table,
				'floor_count'	=> $floor_count
			));
		}else{
			return $this->redirect(Yii::$app->request->baseUrl.'/site/logout');
		}
	}
	
	public function actionCreate()
	{	
		$latest = Misc::getLatestDate();
        if($latest != '' &&  date('Y-m-d') < $latest['latest_date'] ) { 
            echo json_encode(false); die;
        }else {
			if(UniqueUser::checkUniqueLogin() == false) {
		        $max=0;
		        $max_tables = Query::queryOne('SELECT MAX(id) as max FROM `table_details`');
		        if ($max_tables['max'] != null) {
		           $max = $max_tables['max'] + 1;
		        }
		        else {
					$max=1;        	
		        }

				if (Yii::$app->request->isAjax) {
		            $table = new TableDetails();
					$table->table_name 	= "Table - " . $max;
					$table->code 		= self::generateTableCode($max);
					$table->status 		= 0;
					$table->merge 		= '';
					$table->order_id 	= 0;
					$table->start_time 	= 0;
					$table->end_time 	= 0;
					$table->floor 		= (isset($_POST['floor']) && $_POST['floor'] != null) ? htmlspecialchars($_POST['floor'], ENT_QUOTES) : 1;
					$table->x_pos 		= (isset($_POST['x_pos']) && $_POST['x_pos'] != null) ? htmlspecialchars($_POST['x_pos'], ENT_QUOTES) : 0;
					$table->y_pos 		= (isset($_POST['y_pos']) && $_POST['y_pos'] != null) ? htmlspecialchars($_POST['y_pos'], ENT_QUOTES) : 0;
					$table->height 		= (isset($_POST['height']) && $_POST['height'] != null) ? htmlspecialchars($_POST['height'], ENT_QUOTES) : 100;
					$table->width 		= (isset($_POST['width']) && $_POST['width'] != null) ? htmlspecialchars($_POST['width'], ENT_QUOTES) : 100;
					$table->type  		= (isset($_POST['type']) && $_POST['type'] != null) ? htmlspecialchars($_POST['type'], ENT_QUOTES) : 0;
					
					if ($table->save()) {

						if(Yii::$app->session['eHhupx5UpkLZoXRP_cR1ozEVjY14zWOC0_user']->role != Yii::$app->params['user_role']['superadmin']) {
			                $log = array(
			                    'action' => "New table has been created named " . $table->table_name ,
			                    'type' => "table"
			                );
			                Notify::auditLog($log);
			            }

						Sync::set_table_data($table->id, 'create');
						echo json_encode(array(
							'status'	=> true,
							'id' 		=> $table->id,
							'floor' 	=> $table->floor,
							'height'	=> $table->height,
							'width' 	=> $table->width,
							'table_name'=> $table->table_name,
							'table_code'=> $table->code
						)); die;
					}
				}
				echo json_encode(FALSE);die;
			} else{
				echo json_encode(array('status' => 'logout'));die;
			}
		}
	}

	public function actionUpdate()
	{
		$latest = Misc::getLatestDate();
        if($latest != '' &&  date('Y-m-d') < $latest['latest_date'] ) { 
            echo json_encode(false); die;
        }else {
			if(UniqueUser::checkUniqueLogin() == false) {
				if (Yii::$app->request->isAjax && isset($_POST['id']) && $_POST['id'] != null) {
					$table = TableDetails::findOne(htmlspecialchars($_POST['id'], ENT_QUOTES));
					if ($table != null) {
						$table->x_pos 		= (isset($_POST['x_pos']) && $_POST['x_pos'] != null)  ? htmlspecialchars($_POST['x_pos'], ENT_QUOTES) : $table->x_pos;
						$table->y_pos 		= (isset($_POST['y_pos']) && $_POST['y_pos'] != null)  ? htmlspecialchars($_POST['y_pos'], ENT_QUOTES) : $table->y_pos;
						$table->height 		= (isset($_POST['height']) && $_POST['height'] != null) ? htmlspecialchars($_POST['height'], ENT_QUOTES) : $table->height;
						$table->width 		= (isset($_POST['width']) && $_POST['width'] != null) ? htmlspecialchars($_POST['width'], ENT_QUOTES) : $table->width;
						if ($table->update()) {
							Sync::set_table_data($table->id, 'update');
							echo json_encode(array('status' => true , 'id' => $table->id)); die;
						}
					}
				}
				echo json_encode(FALSE);die;
			}else{
				echo json_encode(array('status' => 'logout'));die;
			}
		}
	}

	public function actionUpdateTableName()
	{	
		$latest = Misc::getLatestDate();
        if($latest != '' &&  date('Y-m-d') < $latest['latest_date'] ) { 
            echo json_encode(false); die;
        }else {
			if(UniqueUser::checkUniqueLogin() == false) {
				if (Yii::$app->request->isAjax) {
					if (isset($_POST['id']) && $_POST['id'] > 0) {
						$table = TableDetails::findOne(htmlspecialchars($_POST['id'], ENT_QUOTES));
						if ($table != null && isset($_POST['table_name']) && $_POST['table_name'] != null) {
							$name = htmlspecialchars(trim($_POST['table_name']), ENT_QUOTES);
							$code = htmlspecialchars(trim($_POST['table_code']), ENT_QUOTES);
							if ($table->table_name != $name || $table->code != $code) {
								$table->table_name = $name;
								$table->code 	   = $code;
								
								if ($table->update()) {

									if(Yii::$app->session['eHhupx5UpkLZoXRP_cR1ozEVjY14zWOC0_user']->role != Yii::$app->params['user_role']['superadmin']) {
						                $log = array(
						                    'action' => "Table has been updated from " . $name ." to " . $table->table_name ,
						                    'type' => "table"
						                );
						                Notify::auditLog($log);
						            }

									Sync::set_table_data($table->id, 'update');
									echo json_encode(array(
										'status' => true,
										'id' => $table->id,
										'table_name' => $table->table_name,
										'table_code' => $table->code
									)); die;
								}
							}
							else {
								echo json_encode(array(
									'status' => true,
									'id' => $_POST['id'],
									'table_name' => $name,
									'table_code' => $code
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

	public function actionCheckTableName() 
    {	
    	if (Yii::$app->request->isAjax) {
    		if (isset($_POST['id']) && $_POST['id'] != null && isset($_POST['table_name'])) {
    			$id = htmlspecialchars($_POST['id'], ENT_QUOTES);
    			$value = htmlspecialchars(trim($_POST['table_name']), ENT_QUOTES);
		        $condition = $id > 0 ? " AND `id` != $id" : ""; 
		        $data = Query::queryOneSecure("SELECT `id` FROM `table_details` WHERE `table_name` = :value $condition",[':value'=>$value]);
		        if ($data == null) {
		        	echo json_encode(TRUE);die;
		        }
		    }
	    }
        echo json_encode(FALSE);die;
    }

    public function actionCheckTableCode() 
    {	
    	if (Yii::$app->request->isAjax) {
    		if (isset($_POST['id']) && $_POST['id'] != null && isset($_POST['table_code'])) {
    			$id = htmlspecialchars($_POST['id'], ENT_QUOTES);
    			$value = htmlspecialchars(trim($_POST['table_code']), ENT_QUOTES);
		        $condition = $id > 0 ? " AND `id` != $id" : ""; 
		        $data = Query::queryOneSecure("SELECT `id` FROM `table_details` WHERE `code` = :value $condition",[':value'=>$value]);
		        if ($data == null) {
		        	echo json_encode(TRUE);die;
		        }
		    }
	    }
        echo json_encode(FALSE);die;
    }

	public function actionDelete()
	{
		$latest = Misc::getLatestDate();
        if($latest != '' &&  date('Y-m-d') < $latest['latest_date'] ) { 
            echo json_encode(false); die;
        }else {
			if(UniqueUser::checkUniqueLogin() == false) {
				if (Yii::$app->request->isAjax) {
					$settings = HSettings::getBasic("'lock-table'");
					if($settings['lock-table'] != null && $settings['lock-table'] != 'yes') {
						$table = TableDetails::findOne(htmlspecialchars($_POST['id'], ENT_QUOTES));
						
						if ($table != null) {
							$name = $table->table_name;
							$book = Query::queryOne("SELECT * FROM `booked_tables` WHERE `table_id` = ".$table->id." AND status = 0");
							if ($book != null) {
								echo json_encode(array('error' => 'Please cancel the booking before deleting the table.')); die;
							}

							$occupy = Query::queryOne("SELECT * FROM `occupy` WHERE `table_id` = ".$table->id." AND status =  1 ");
							if ($occupy != null) {
								echo json_encode(array('error' => 'Please close the occupied table before deleting the table.')); die;
							}

							$table->is_deleted = 1;
							if($table->update()) {

								if(Yii::$app->session['eHhupx5UpkLZoXRP_cR1ozEVjY14zWOC0_user']->role != Yii::$app->params['user_role']['superadmin']) {
					                $log = array(
					                    'action' => "Table named '" . $name . "' has been deleted" ,
					                    'type' => "table"
					                );
					                Notify::auditLog($log);
					            }

								Sync::set_table_data($table->id, 'remove');
								echo json_encode(TRUE); die;
							}
						}
					}else{
						echo json_encode(array('error' => 'Cannot remove table when they are locked')); die;
					}
				}
				echo json_encode(FALSE);die;
			}else{
				echo json_encode(array('status' => 'logout'));die;
			}
		}
	}

	public function actionGetFloorTables()
	{
		if (Yii::$app->request->isAjax) {
			if (isset($_POST['floor']) && $_POST['floor'] > 0) {
				$merge_table_ids = Query::queryAllSecure("SELECT merge FROM `table_details` WHERE `floor` = :floor AND merge != '' AND is_deleted = 0",[':floor'=>htmlspecialchars($_POST['floor'], ENT_QUOTES)]);
				$table_id = [];
				$table_ids = [];
				if ($merge_table_ids != null) {
					foreach($merge_table_ids as $merge_table_id) {
						$table_id = array_merge($table_id, json_decode($merge_table_id['merge']));
					}
					$table_ids = implode(',',$table_id);
				}
				if($table_ids != null) {
					$tables = Query::queryAll("SELECT id, table_name FROM `table_details` WHERE `id` NOT IN ($table_ids)");
				}else {
					$tables = Query::queryAllSecure("SELECT id, table_name FROM `table_details` WHERE `floor` = :floor AND is_deleted = 0",[':floor'=>htmlspecialchars($_POST['floor'], ENT_QUOTES)]);
				}
				
				echo json_encode(array('tables' => $tables)); die;
			}
		}
		echo json_encode(FALSE); die;
	}	

	public function actionBookNow()
	{
		$latest = Misc::getLatestDate();
        if($latest != '' &&  date('Y-m-d') < $latest['latest_date'] ) { 
            echo json_encode(false); die;
        }else {
			if(UniqueUser::checkUniqueLogin() == false) {
				if (Yii::$app->request->isAjax) {
					if (strpos($_POST['start_time'],'AM') !== false && strpos($_POST['end_time'],'AM') !== false)  {
			            $start_time = htmlspecialchars($_POST['start_time'], ENT_QUOTES);
			            $end_time = htmlspecialchars($_POST['end_time'], ENT_QUOTES);
			        }
			        else {
		                $start_time = date("G:i:s", strtotime(htmlspecialchars($_POST['start_time'], ENT_QUOTES)));
		                $end_time = date("G:i:s", strtotime(htmlspecialchars($_POST['end_time'], ENT_QUOTES)));
			        }

			        $start_date = ($_POST['date'] != null)  ? htmlspecialchars($_POST['date'], ENT_QUOTES) : date('Y-m-d');
			        $datetime = date('Y-m-d H:i:s', strtotime($start_date . ' ' . $start_time));

					if (isset($_POST['id']) && $_POST['id'] > 0) {

						$table_id = 0;
						if($_POST['table'] != null) {
							$table_id 	= ($_POST['table'] != null)  ? htmlspecialchars($_POST['table'], ENT_QUOTES) : 0;
						}
						elseif($_POST['selected_table'] != null) {
							$table_id = ($_POST['selected_table'] != null)  ? htmlspecialchars($_POST['selected_table'], ENT_QUOTES) : 0;
						}
						$book = BookedTables::findOne(htmlspecialchars($_POST['id'], ENT_QUOTES));
						if ($book != null) {
							$book->customer_name 	= ($_POST['customer_name'] != null)  ? htmlspecialchars(trim($_POST['customer_name']), ENT_QUOTES) : '';
							$book->customer_phone 	= ($_POST['customer_phone'] != null)  ? htmlspecialchars(trim($_POST['customer_phone']), ENT_QUOTES) : '';
							$book->customer_pax 	= ($_POST['customer_pax'] != null)  ? htmlspecialchars(trim($_POST['customer_pax']), ENT_QUOTES) : 0;
							$book->table_id 		= $table_id;
							$book->floor_id 		= ($_POST['floor'] != null)  ? htmlspecialchars($_POST['floor'], ENT_QUOTES) : 0;
							$book->start_date 		= $start_date;
							$book->start_time 		= $start_time;
							$book->end_time 		= $end_time;
							$book->datetime 		= $datetime;
							$book->last_edited_on 	= date('Y-m-d H:i:s');
							$book->last_edited_by 	= Yii::$app->session['eHhupx5UpkLZoXRP_cR1ozEVjY14zWOC0_user']->id;

							if ($book->update()) {

								$table = TableDetails::find()->where(["id" => $book->table_id])->one();
								if($table != null) {
									if(Yii::$app->session['eHhupx5UpkLZoXRP_cR1ozEVjY14zWOC0_user']->role != Yii::$app->params['user_role']['superadmin']) {
						                $log = array(
						                    'action' => "Booking data for the table '<b>" . $table->table_name . "</b>' has been updated" ,
						                    'type' => "table"
						                );
						                Notify::auditLog($log);
						            }
								}

								echo json_encode(array('status' => true , 'id' => $book->id)); die;
							}
						}
					}
					else  {
						$book = new BookedTables();
						$book->customer_name 	= ($_POST['customer_name'] != null)  ? htmlspecialchars(trim($_POST['customer_name']), ENT_QUOTES) : '';
						$book->customer_phone 	= ($_POST['customer_phone'] != null)  ? htmlspecialchars(trim($_POST['customer_phone']), ENT_QUOTES) : '';
						$book->customer_pax		= ($_POST['customer_pax'] != null)  ? htmlspecialchars(trim($_POST['customer_pax']), ENT_QUOTES) : '';
						$book->table_id 		= ($_POST['table'] != null)  ? htmlspecialchars($_POST['table'], ENT_QUOTES) : 0;
						$book->floor_id 		= ($_POST['floor'] != null)  ? htmlspecialchars($_POST['floor'], ENT_QUOTES) : 0;
						$book->start_date 		= $start_date;
						$book->start_time 		= $start_time;
						$book->end_time 		= $end_time;
						$book->datetime 		= $datetime;
						$book->created_on 		= date('Y-m-d H:i:s');
						$book->created_by 		= Yii::$app->session['eHhupx5UpkLZoXRP_cR1ozEVjY14zWOC0_user']->id;
						$book->last_edited_on 	= date('Y-m-d H:i:s');
						$book->last_edited_by 	= Yii::$app->session['eHhupx5UpkLZoXRP_cR1ozEVjY14zWOC0_user']->id;

						if ($book->save()) {
							$table = TableDetails::find()->where(["id" => $book->table_id])->one();

							if(Yii::$app->session['eHhupx5UpkLZoXRP_cR1ozEVjY14zWOC0_user']->role != Yii::$app->params['user_role']['superadmin']) {
				                $log = array(
				                    'action' => "Booking has been made" ,
				                    'type' => "table"
				                );
				                Notify::auditLog($log);
				            }

							if ($table != null) {
								$table->start_time = date('Y-m-d H:i:s');
								$table->end_time = date('Y-m-d H:i:s');
								$table->update();
							}
							echo json_encode(array('status' => true , 'id' => $book->id)); die;
						}
					}
				}
				echo json_encode(FALSE); die;
			}else{
				echo json_encode(array('status' => 'logout'));die;
			}
		}
	}

	public function actionGetBookedTables()
	{
		if (Yii::$app->request->isAjax) {
			$books = Query::queryAll("SELECT bt.*, td.table_name 
										FROM `booked_tables` as bt
										LEFT JOIN `table_details` as td
											ON td.id = bt.table_id
										WHERE bt.status = 0
										AND td.is_deleted = 0
										ORDER BY bt.datetime ASC");
			if ($books != null) {
				$table_data 	= Query::queryAll("SELECT * FROM table_details WHERE is_deleted = 0");

				echo json_encode(array('books' => $books , 'table_data' => $table_data)); die;
			}
		}
		echo json_encode(FALSE); die;
	}

	public function actionGetBookedTablesForOne()
	{
		if (Yii::$app->request->isAjax) {
			if (isset($_POST['id']) && $_POST['id'] != null && $_POST['id'] > 0) {
				$id = htmlspecialchars($_POST['id'], ENT_QUOTES);
				$books = Query::queryAll("SELECT bt.*, td.table_name 
											FROM `booked_tables` as bt
											LEFT JOIN `table_details` as td
												ON td.id = bt.table_id
											WHERE bt.status = 0 AND bt.table_id = $id
											AND td.is_deleted = 0
											ORDER BY bt.datetime ASC");
				if ($books != null) {
					echo json_encode(array('books' => $books)); die;
				}
			}
		}
	}

	public function actionGetBookedTable()
	{
		if (Yii::$app->request->isAjax) {
			if (isset($_POST['id']) && $_POST['id'] != null && $_POST['id'] > 0) {
				$id = htmlspecialchars($_POST['id'], ENT_QUOTES);
				$book = Query::queryOneSecure("SELECT bt.*, td.table_name,f.name 
											FROM `booked_tables` as bt
											LEFT JOIN `table_details` as td
												ON td.id = bt.table_id
											LEFT JOIN `floor` as f
												ON f.id = td.floor
											WHERE bt.id = :id AND is_deleted = 0",[':id'=>$id]);

				if ($book != null) {
					$table_data 	= Query::queryAll("SELECT * FROM table_details WHERE is_deleted = 0");

					echo json_encode(array('book' => $book , 'table_data' => $table_data)); die;
				}
			}
		}
		echo json_encode(FALSE); die;
	}

	public function actionCancelBooking()
	{
		$latest = Misc::getLatestDate();
        if($latest != '' &&  date('Y-m-d') < $latest['latest_date'] ) { 
            echo json_encode(false); die;
        }else {
			if(UniqueUser::checkUniqueLogin() == false) {
				if (Yii::$app->request->isAjax) {
					$book = BookedTables::findOne(htmlspecialchars($_POST['id'], ENT_QUOTES));
					if ($book != null) {
						$book->status = 2;
						if ($book->update()) {
							$table = TableDetails::find()->where(["id" => $book->table_id])->one();

							if(Yii::$app->session['eHhupx5UpkLZoXRP_cR1ozEVjY14zWOC0_user']->role != Yii::$app->params['user_role']['superadmin']) {
				                $log = array(
				                    'action' => "Booking for the table '<b>" . $table->table_name . "</b>' has been cancelled" ,
				                    'type' => "table"
				                );
				                Notify::auditLog($log);
				            }

							echo json_encode(array("status" => true , "table_id" => $book->table_id)); die;
						}
					}
				}
				echo json_encode(FALSE); die;
			}else{
				echo json_encode(array('status' => 'logout'));die;
			}
		}
	}

	public function actionMoveBooking()
	{
		$latest = Misc::getLatestDate();
        if($latest != '' &&  date('Y-m-d') < $latest['latest_date'] ) { 
            echo json_encode(false); die;
        }else {
			if(UniqueUser::checkUniqueLogin() == false) {
				if (Yii::$app->request->isAjax) {
					if (isset($_POST['id']) && $_POST['id'] > 0 
						&& isset($_POST['table']) && $_POST['table'] > 0
						&& isset($_POST['floor']) && $_POST['floor'] > 0 ) {

						$book = BookedTables::findOne(htmlspecialchars($_POST['id'], ENT_QUOTES));
						
						if ($book != null) {
							$old_booked_table_id = $book->table_id;

							$id = $book->table_id;	
							$book->table_id = htmlspecialchars($_POST['table'], ENT_QUOTES);
							$book->floor_id = htmlspecialchars($_POST['floor'], ENT_QUOTES);
							$book->last_edited_on = date('Y-m-d H:i:s');
							$book->last_edited_by = Yii::$app->session['eHhupx5UpkLZoXRP_cR1ozEVjY14zWOC0_user']->id;

							if ($book->update()) {
								$table = TableDetails::find()->where(["id" => $book->table_id])->one();

								if(Yii::$app->session['eHhupx5UpkLZoXRP_cR1ozEVjY14zWOC0_user']->role != Yii::$app->params['user_role']['superadmin']) {
					                $log = array(
					                    'action' => "Booking has been moved to the table '<b>" . $table->table_name . "</b>'" ,
					                    'type' => "table"
					                );
					                Notify::auditLog($log);
					            }

								/*$table = TableDetails::findOne($old_booked_table_id);
								$table->status = 0;
								$table->update();*/
								echo json_encode(array('status' => true , 'id' => $book->id)); die;
							}
						}
					}
				}
				echo json_encode(FALSE); die;
			}else{
				echo json_encode(array('status' => 'logout'));die;
			}
		}
	}

	public function actionMoveOccupied()
	{
		$latest = Misc::getLatestDate();
        if($latest != '' &&  date('Y-m-d') < $latest['latest_date'] ) { 
            echo json_encode(false); die;
        }else {
			if(UniqueUser::checkUniqueLogin() == false) {
				if (Yii::$app->request->isAjax) {
					if (isset($_POST['id']) && $_POST['id'] > 0 
						&& isset($_POST['table']) && $_POST['table'] > 0
						&& isset($_POST['floor']) && $_POST['floor'] > 0 ) {

						$occupied = Occupy::findOne(htmlspecialchars($_POST['id'], ENT_QUOTES));
						
						if ($occupied != null) {
							$id = $occupied->table_id;	
							$occupied->table_id = htmlspecialchars($_POST['table'], ENT_QUOTES);
							$occupied->floor_id = htmlspecialchars($_POST['floor'], ENT_QUOTES);
							$occupied->last_edited_on = date('Y-m-d H:i:s');
							$occupied->last_edited_by = Yii::$app->session['eHhupx5UpkLZoXRP_cR1ozEVjY14zWOC0_user']->id;

							if ($occupied->update()) {
								$table = TableDetails::findOne($id);
								$table->status = 0;
								$table->update();

								$table = TableDetails::findOne($occupied->table_id);
								$table->status = 1;
								$table->update();

								if(Yii::$app->session['eHhupx5UpkLZoXRP_cR1ozEVjY14zWOC0_user']->role != Yii::$app->params['user_role']['superadmin']) {
					                $log = array(
					                    'action' => "Occupancy has been moved to the table '<b>" . $table->table_name . "</b>'" ,
					                    'type' => "table"
					                );
					                Notify::auditLog($log);
					            }

								Sync::set_table_data($id, 'move_occupy', $occupied->table_id);

								echo json_encode(array(
									'status' => true,
									'id' => $occupied->id, 
									'old_table' => $id, 
									'new_table' => $occupied->table_id
								)); die;
							}
						}
					}
				}
				echo json_encode(FALSE); die;
			}else{
				echo json_encode(array('status' => 'logout'));die;
			}
		}
	}

	public function actionCheckOccupancy()
	{
		if (Yii::$app->request->isAjax) {
			if (isset($_POST['table']) && $_POST['table'] > 0) {
				$table = TableDetails::findOne(htmlspecialchars($_POST['table'], ENT_QUOTES));
				if ($table != null && $table->status == 1) {
					echo json_encode(array('id' => $table->id, 'table_name' => $table->table_name)); die;
				}
			}
		}
		echo json_encode(FALSE); die;
	}

	public function actionGetOccupiedTables()
	{
		if(Yii::$app->request->isAjax && isset($_POST) && $_POST['occupy_ids'] != '') {
			$occupy_ids = implode("','",htmlspecialchars($_POST['occupy_ids'], ENT_QUOTES));
			$occupied_tables = Query::queryAll("SELECT o.id as occupy_id, o.customer_pax as occupy_pax , o.start_date as occupy_start_date, o.start_time as occupy_start_time , td.id as table_id, td.table_name, td.floor as floor_id
								FROM `occupy` as o
								LEFT JOIN `table_details` as td 
									ON td.id = o.table_id
								WHERE o.id IN ('".$occupy_ids."') AND is_deleted = 0");

			echo json_encode($occupied_tables); die;
		}
		echo json_encode(false); die;
	}

	public function actionMergeBill()
	{
		if(Yii::$app->request->isAjax && isset($_POST) && isset($_POST['merge']) && $_POST['merge'] != '') {

			$longest_occupy_id 	= 0;
			$longest_occupy_pax = 0;
			$longest_start_date = date('Y-m-d H:i:s');
			$longest_table_id 	= 0;
			$longest_floor_id 	= 0;
			foreach($_POST['merge'] as $row) {
				$date = $row['start_date'].' '.$row['start_time'];
				if( (time() - strtotime($date)) > (time() - strtotime($longest_start_date)) ) {
					$longest_occupy_id 	= $row['occupy_id'];
					$longest_occupy_pax = $row['occupy_pax'];
					$longest_start_date = $date;
					$longest_table_id 	= $row['table_id'];
					$longest_floor_id 	= $row['floor_id'];
				}
			}

			$new_data = [];
			$added_pax = 0;
			$i=0;
			foreach($_POST['merge'] as $row) {
				if($row['occupy_id'] != $longest_occupy_id) {
					$new_data[$i] = $row;
					$added_pax += $row['occupy_pax'];
					$i++;
				}
			}
			
			Query::executeSecure("UPDATE `occupy`
							SET customer_pax=".($longest_occupy_pax+$added_pax)."
							WHERE id= :id",[':id'=>$longest_occupy_id]);

			foreach($new_data as $row) {
				Query::executeSecure("UPDATE `occupy`
									SET status=0
									WHERE id= :id",[':id'=>$row['occupy_id']]);

				Query::executeSecure("UPDATE `table_details`
									SET status=0
									WHERE id= :id",[':id'=>$row['table_id']]);

				Query::executeSecure("UPDATE `temp_items`
									SET occupy_id=".$longest_occupy_id."
									WHERE occupy_id= :id",[':id'=>$row['occupy_id']]);

				Query::executeSecure("UPDATE `temp_order_list`
									SET occupy_id=".$longest_occupy_id."
									WHERE occupy_id= :id",[':id'=>$row['occupy_id']]);

				Query::executeSecure("UPDATE `kot`
									SET occupy_id=".$longest_occupy_id.",
										table_id=".$longest_table_id.",
										floor_id=".$longest_floor_id."
									WHERE occupy_id= :id",[':id'=>$row['occupy_id']]);

				Query::executeSecure("UPDATE `break_down_receipt`
									SET occupy_id=".$longest_occupy_id."
									WHERE occupy_id= :id",[':id'=>$row['occupy_id']]);
			}

			echo json_encode(true); die;
		}
		echo json_encode(false); die;
	}

	public function actionOccupyBooking()
	{
		$latest = Misc::getLatestDate();
        if($latest != '' &&  date('Y-m-d') < $latest['latest_date'] ) { 
            echo json_encode(false); die;
        }else {
			if(UniqueUser::checkUniqueLogin() == false) {
				if (Yii::$app->request->isAjax) {
					if (isset($_POST['id']) && $_POST['id'] > 0) {
						$book = BookedTables::findOne(htmlspecialchars($_POST['id'], ENT_QUOTES));
						if ($book != null) {
							$table = TableDetails::findOne($book->table_id);
							if($table != null || $table != '') {
								if ($table->status != 1) { /*check if the table is already occupied or not.*/
									$occupy = new Occupy();

									$latest_capacity = Query::queryOne("SELECT id FROM `capacity` ORDER BY id DESC LIMIT 1");

									$occupy->customer_name 	= $book->customer_name;
									/*$occupy->customer_phone = $book->customer_phone;*/
									$occupy->customer_pax 	= $book->customer_pax;
									$occupy->table_id 		= $book->table_id;
									$occupy->floor_id 		= $book->floor_id;
									$occupy->start_date 	= date('Y-m-d');
									$occupy->start_time 	= date('H:i:s');
									$occupy->occupy_type 	= Yii::$app->params['occupy_type']['booked'];
									$occupy->created_on 	= date('Y-m-d H:i:s');
									$occupy->created_by 	= Yii::$app->session['eHhupx5UpkLZoXRP_cR1ozEVjY14zWOC0_user']->id;
									$occupy->capacity_id 	= ($latest_capacity['id'] != null) ? $latest_capacity['id'] : 0;
									$occupy->is_occupied 	= Yii::$app->params['is_occupied']['yes'];

									if ($occupy->save()) {
										$book->status = 1;
										$book->update();

										$table->status = 1;
										$table->update();

										if(Yii::$app->session['eHhupx5UpkLZoXRP_cR1ozEVjY14zWOC0_user']->role != Yii::$app->params['user_role']['superadmin']) {
							                $log = array(
							                    'action' => "Booked table " . $table->table_name . " has been occupied ",
							                    'type' => "table"
							                );
							                Notify::auditLog($log);
							            }

										Sync::set_table_data($table->id, 'occupy');

										echo json_encode(array('status' => true , 'id' => $occupy->id)); die;
									}
									echo json_encode(false); die;
								}
								else {
									echo json_encode(array('error' => 'Please close the occupied table to proceed.')); die;
								}
							}
							else {
								echo json_encode(array('error' => 'You have not assigned any table for this booking.')); die;
							}
						}
					}
				}
				throw new HttpException(404, 'Page not found.');
			}else{
				echo json_encode(array('status' => 'logout'));die;
			}
		}
	}

	public function actionOccupyNow()
	{
		$latest = Misc::getLatestDate();
        if($latest != '' &&  date('Y-m-d') < $latest['latest_date'] ) { 
            echo json_encode(false); die;
        }else {
			if(UniqueUser::checkUniqueLogin() == false) {
				if (Yii::$app->request->isAjax) {
					if (isset($_POST['table']) && $_POST['table'] != null && $_POST['table'] > 0) {

						$latest_capacity = Query::queryOne("SELECT id FROM `capacity` ORDER BY id DESC LIMIT 1");

						$occupy = new Occupy();
						$occupy->table_id = (isset($_POST['table']) && $_POST['table'] != null) ? htmlspecialchars($_POST['table'], ENT_QUOTES) : 0;
						$occupy->floor_id = (isset($_POST['floor']) && $_POST['floor'] != null) ? htmlspecialchars($_POST['floor'], ENT_QUOTES) : 1;
						$occupy->start_date = date('Y-m-d');
						$occupy->start_time = date('H:i:s');
						$occupy->created_on = date('Y-m-d H:i:s');
						$occupy->created_by = Yii::$app->session['eHhupx5UpkLZoXRP_cR1ozEVjY14zWOC0_user']->id;
						$occupy->status = 1;
						
						$occupy->capacity_id 	= ($latest_capacity['id'] != null) ? $latest_capacity['id'] : 0;
						$occupy->is_occupied = Yii::$app->params['is_occupied']['yes'];

						if ($occupy->save()) {
							$table = TableDetails::findOne(htmlspecialchars($_POST['table'], ENT_QUOTES));
							if ($table != null) {
								$table->status = 1;
								if ($table->update()) {

									if(Yii::$app->session['eHhupx5UpkLZoXRP_cR1ozEVjY14zWOC0_user']->role != Yii::$app->params['user_role']['superadmin']) {
						                $log = array(
						                    'action' => "Table '<b>" . $table->table_name . "</b>' has been occupied ",
						                    'type' => "table"
						                );
						                Notify::auditLog($log);
						            }

									Sync::set_table_data($table->id, 'occupy');
									echo json_encode(array('status' => true , 'id' => $occupy->id)); die;
								}
							}
						}
						echo json_encode(false); die;
					}
				}
				throw new HttpException(404, 'Page not found.');
			}else{
				echo json_encode(array('status' => 'logout'));die;
			}
		}
	}

	public function actionCloseTable()
	{
		$latest = Misc::getLatestDate();
        if($latest != '' &&  date('Y-m-d') < $latest['latest_date'] ) { 
            echo json_encode(false); die;
        }else {
			if(UniqueUser::checkUniqueLogin() == false) {
				if (Yii::$app->request->isAjax) {
					if (isset($_POST['id']) && $_POST['id'] != null && $_POST['id'] > 0
						&& isset($_POST['table']) && $_POST['table'] != null && $_POST['table'] > 0) {
						$occupy = Occupy::findOne(htmlspecialchars($_POST['id'], ENT_QUOTES));

						$temp = TempItems::find()->where(['occupy_id' => htmlspecialchars($_POST['id'], ENT_QUOTES)])->all();

						if ($occupy != null) {
							if ($occupy->status == 1 && $temp == null) {
								
								$occupy->status = 0;
								$occupy->end_date = date('Y-m-d');
								$occupy->end_time = date('H:i:s');
								$occupy->is_occupied = Yii::$app->params['is_occupied']['no'];
								if ($occupy->update()) {
									$table = TableDetails::findOne(htmlspecialchars($_POST['table'], ENT_QUOTES));
									if ($table != null) {
										$table->status = 0;
										if ($table->update()) {

											if(Yii::$app->session['eHhupx5UpkLZoXRP_cR1ozEVjY14zWOC0_user']->role != Yii::$app->params['user_role']['superadmin']) {
								                $log = array(
								                    'action' => "Table '<b>" . $table->table_name . "</b>' has been closed ",
								                    'type' => "table"
								                );
								                Notify::auditLog($log);
								            }

											Sync::set_table_data($table->id, 'close');
											echo json_encode(TRUE); die;
										}
									}
								}
							}
							elseif ($occupy->status == 0 && $temp == null) {
								$occupy->end_date = date('Y-m-d');
								$occupy->end_time = date('H:i:s');
								$occupy->is_occupied = Yii::$app->params['is_occupied']['no'];
								if ($occupy->update()) {
									$table = TableDetails::findOne(htmlspecialchars($_POST['table'], ENT_QUOTES));
									if ($table != null) {
										$table->status = 0;
										if ($table->update()) {

											if(Yii::$app->session['eHhupx5UpkLZoXRP_cR1ozEVjY14zWOC0_user']->role != Yii::$app->params['user_role']['superadmin']) {
								                $log = array(
								                    'action' => "Table '<b>" . $table->table_name . "</b>' has been closed ",
								                    'type' => "table"
								                );
								                Notify::auditLog($log);
								            }

											Sync::set_table_data($table->id, 'close');
											echo json_encode(TRUE); die;
										}
									}
								}
							}
							echo json_encode(array('error' => 'Please close the bill before closing the table!')); die;
						}
					}
				}
				echo json_encode(FALSE); die;
			}else{
				echo json_encode(array('status' => 'logout'));die;
			}
		}
	}

    public function actionMergeTable()
    { 
    	if(UniqueUser::checkUniqueLogin() == false) {
	        if (Yii::$app->request->isAjax) {
	            if (isset($_POST['table_id']) && $_POST['table_id'] != null) {
	                $merge = TableDetails::findOne(htmlspecialchars($_POST['table_id'], ENT_QUOTES));
	                $data = $_POST['ids'];
	                if ($data != null) {
		                foreach ($data as $row) {
		                    $check = Query::queryAllSecure("SELECT id
													FROM `table_details`
													WHERE id = :id AND status = 1",[':id'=>htmlspecialchars($row, ENT_QUOTES)]);
		                }
		                if ($check != null) {
		                    echo json_encode(array('error' => 'The table is currently occupied and cannot be merged.', 'status' => 'error')); die;
		                } 
		                else{
			                if ($merge != null) {
			                    if ($merge->merge == json_encode($data)) {
			                    	Sync::set_table_data($merge->id, 'update');
			                    	Sync::set_table_unmerge_data();
			                        echo json_encode(array('merge' => $merge->merge, 'merge_head' =>$_POST['table_id'], 'merge_head_name' => $merge->table_name, 'status' => 'success')); die;
			                    }
			                    else if ($merge->merge == '' || $merge->merge == '[]') {
			                    	if (is_array($data)) {
				                    	if (in_array($_POST['table_id'], $data)) {
		                    				array_splice($data, array_search($_POST['table_id'], $data));
				                    	}
				                    }
				                    else if ($data == $_POST['table_id']) {
				                    	$data = '';
				                    }

			                    	$merge->merge = json_encode($data);
			                        if ($merge->update()) {
			                        	Sync::set_table_data($merge->id, 'update');
			                        	Sync::set_table_unmerge_data();
			                            echo json_encode(array('merge' => $merge->merge, 'merge_head' =>$_POST['table_id'], 'merge_head_name' => $merge->table_name, 'status' => 'success')); die;
			                        }
			                    } 
			                    else {
			                    	$merge->merge = Misc::add_array_into_json($merge->merge, $_POST['ids'], [$_POST['table_id']]);
			                        if ($merge->update()) {
			                        	Sync::set_table_data($merge->id, 'update');
			                        	Sync::set_table_unmerge_data();
			                            echo json_encode(array('merge' => $merge->merge, 'merge_head' =>$_POST['table_id'], 'merge_head_name' => $merge->table_name, 'status' => 'success')); die;
			                        }
			                    }
			                }
			            }
			        }
		        }
		    }
	        echo json_encode(array('status' => 'failed')); die;
	    }else{
	    	echo json_encode(array('status' => 'logout'));die;
		}
    }

    public function actionUnmergeTable()
    {
    	if(UniqueUser::checkUniqueLogin() == false) {
	        if (Yii::$app->request->isAjax) {
	            if (isset($_POST['table_id']) && $_POST['table_id'] != null) {
	                $merge = TableDetails::findOne(htmlspecialchars($_POST['table_id'], ENT_QUOTES));
	                if ($merge != null) {
	                    $id = htmlspecialchars($_POST['id'], ENT_QUOTES);
	                    if ($merge->merge != '' || $merge->merge != '[]') {
	                    	$data = json_decode($merge->merge);
	                        array_splice($data, array_search($id, $data), 1);

	                        $merge->merge = json_encode($data);
	                        if ($merge->update()) {
	                        	Sync::set_table_data($merge->id, 'update');
	                            echo json_encode(array('merge' => $merge->merge, 'status' => 'success')); die;
	                        }
	                    }
	                }
		        }
		    }
	        echo json_encode(array('status' => 'failed')); die;
	    }
	    else{
			echo json_encode(array('status' => 'logout'));die;
		}
    }

    /*
    public function actionMergeTableReplaceValue()
    {
    	if(UniqueUser::checkUniqueLogin() == false) {
	        if (Yii::$app->request->isAjax) {
	            if (isset($_POST['table_id']) && $_POST['table_id'] != null) {
	                $merge = TableDetails::findOne($_POST['table_id']);
	                if ($merge != null) {
	                    $data = $_POST['id'];
	                    if ($merge->merge == json_encode($data)) {
	                        echo json_encode(array('merge' => $merge->merge)); die;
	                    }
	                    else {
	                    	if (is_array($data)) {
		                    	if (in_array($_POST['table_id'], $data)) {
	                				array_splice($data, array_search($_POST['table_id'], $data));
	                				$merge->merge = json_encode($data);
		                    	}
		                    }
		                    else if ($data == $_POST['table_id']) {
		                    	$merge->merge = '';
		                    }
		                    else {
		                    	$merge->merge = '';
		                    }
	                    	
	                        if ($merge->update()) {
	                        	Sync::set_table_data($merge->id, 'update');
	                            echo json_encode(array('merge' => $merge->merge)); die;
	                        }
	                    }
	                }
		        }
		    }
	        echo json_encode(FALSE); die;
	    }else{
			echo json_encode(array('status' => 'logout'));die;
		}
    }

    public function actionMergeHeadClear()
    {
    	if(UniqueUser::checkUniqueLogin() == false) {
	        if (Yii::$app->request->isAjax) {
	            if (isset($_POST['table_id']) && $_POST['table_id'] != null) {
	                $merge = TableDetails::findOne($_POST['table_id']);
	                if ($merge) {
	                	$merge->merge = '';
	                    if ($merge->update()) {
	                    	Sync::set_table_data($merge->id, 'update');
	                        echo json_encode(TRUE); die;
	                    }
	                }
		        }
		    }
	        echo json_encode(FALSE); die;
	    }else{
			echo json_encode(array('status' => 'logout'));die;
		}
    }
    */

    public function actionCheckOverlapForBooking()
	{
		if (Yii::$app->request->isAjax) {

			$table_id = 0;

			if($_POST['table'] != null) {
				$table_id 	= ($_POST['table'] != null)  ? htmlspecialchars($_POST['table'], ENT_QUOTES) : '';
			}
			elseif($_POST['selected_table'] != null) {
				$table_id = ($_POST['selected_table'] != null)  ? htmlspecialchars($_POST['selected_table'], ENT_QUOTES) : '';
			}

			if ($table_id > 0) {
				if( isset($_POST['date']) && $_POST['date'] != null
					&& isset($_POST['start_time']) && $_POST['start_time'] != null
					&& isset($_POST['end_time']) && $_POST['end_time'] != null ) {

					$start_date = htmlspecialchars($_POST['date'], ENT_QUOTES);
					$start_time = date("G:i:s", strtotime(htmlspecialchars($_POST['start_time'], ENT_QUOTES)));
	                $end_time   = date("G:i:s", strtotime(htmlspecialchars($_POST['end_time'], ENT_QUOTES)));
					
					$check = Query::queryAll("SELECT id
								FROM `booked_tables` 
								WHERE DATE(start_date) = '".$start_date."' AND table_id = '".$table_id."' AND status = 0 
								AND ((start_time <= '".$start_time."' AND end_time >= '".$start_time."')
								OR (start_time <= '".$end_time."' AND end_time >= '".$end_time."')
								OR (start_time >= '".$start_time."' AND end_time <= '".$end_time."') )" );

					if ($check == null) {
						echo json_encode(FALSE); die;
					}
				}	
			}else{
				echo json_encode(FALSE); die;
			}
		}
		echo json_encode(TRUE); die;
	}

	public function actionCheckOverlapForMoveBooking()
	{
		if (Yii::$app->request->isAjax) {
			if (isset($_POST['id']) && $_POST['id'] > 0
				&& isset($_POST['table']) && $_POST['table'] > 0) {
				$book = BookedTables::findOne(htmlspecialchars($_POST['id'], ENT_QUOTES));
				if ($book != null) {
					$table		= htmlspecialchars($_POST['table'], ENT_QUOTES);
					$start_date = $book->start_date;
					$start_time = date("G:i:s", strtotime($book->start_time));
	                $end_time   = date("G:i:s", strtotime($book->end_time));

					$check = Query::queryAll("SELECT id
											FROM `booked_tables` 
											WHERE DATE(start_date) = '".$start_date."' AND table_id = '".$table."' AND status = 0 
											AND ((start_time <= '".$start_time."' AND end_time >= '".$start_time."')
											OR (start_time <= '".$end_time."' AND end_time >= '".$end_time."')
											OR (start_time >= '".$start_time."' AND end_time <= '".$end_time."') )" );

					if ($check == null) {
						echo json_encode(FALSE); die;
					}
				}
			}
		}
		echo json_encode(TRUE); die;
	}

	public function actionCheckOverlapForMoveOccupied() 
	{
		if (Yii::$app->request->isAjax) {
			if (isset($_POST['id']) && $_POST['id'] > 0
				&& isset($_POST['table']) && $_POST['table'] > 0) {
				$occupy = Occupy::findOne(htmlspecialchars($_POST['id'], ENT_QUOTES));
				if ($occupy != null) {
					$table = htmlspecialchars($_POST['table'], ENT_QUOTES);

					$check = Query::queryAllSecure("SELECT id
						FROM `table_details` 
						WHERE id = :table AND status = 1",[':table'=>$table] );
					if ($check != null) {
						echo json_encode(array('error' => 'The table is currently  occupied.')); die;
					}
					else {
						$start_date = date('Y-m-d');
						$start_time = date("G:i:s");

						$check = Query::queryAll("SELECT id
								FROM `booked_tables` 
								WHERE DATE(start_date) = '".$start_date."' AND table_id = '".$table."' AND status = 0  
								AND start_time <= '".$start_time."' AND end_time >= '".$start_time."'" );
						if ($check != null) {
							echo json_encode(array('error' => 'The table is currently booked. Please check the booking list of this table to comfirm.')); die;
						}
					
						echo json_encode(FALSE); die;
					}
				}
			}
		}
		echo json_encode(TRUE); die;
	}

	public function actionCheckCurrentBooking() 
	{
		header('Content-Type: text/event-stream');
        header('Cache-Control: no-cache');
        echo "retry: 30000\n";

		$start_date = date('Y-m-d');
		$start_time = date("G:i:s");
		$guess_time = date('G:i:s', strtotime("+15 minutes", strtotime($start_time)));
		
		$alert_data = Query::queryAll("SELECT b.table_id, b.id, t.merge
										FROM `booked_tables` as b 
										LEFT JOIN `table_details` as t ON t.id = b.table_id
										WHERE DATE(b.start_date) = '".$start_date."' AND b.status = 0 
										AND b.start_time <= '".$start_time."' AND b.end_time >= '".$start_time."'" );

		$alert = ''; $i = 0;  $yesI = true;
		if ($alert_data != null) {
			foreach($alert_data as $key1 => $value):  $i++;
				$j = 0; $yesJ = true;
				$alert .= '"' . $i . '" : {';
				foreach($value as $key2 => $val): $j++;
					if (count($value) == $j) $yesJ = false;
					if($key2 == "merge" && $val != '') {
						$merge_value = implode(',',json_decode($val));
						$alert .=  '"' . $key2 . '" : ' . '"' . $merge_value . '"' . (($yesJ) ? ', ' : '');
					}else{
						$alert .=  '"' . $key2 . '" : ' . '"' . $val . '"' . (($yesJ) ? ', ' : '');
					}
				endforeach;
				if (count($alert_data) == $i) $yesI = false;
				$alert .= '}' . (($yesI) ? ', ' : '');
			endforeach;
		}

		$condition = '';
		if ($alert_data != null) {
			foreach($alert_data as $adata):
				$ids[] = $adata['id']; 
			endforeach;

			if ($ids != null)  $condition = ' AND b.id NOT IN (' . implode(',', $ids) . ') ';
		}

		$notify_data = Query::queryAll("SELECT b.table_id, b.id, t.merge
										FROM `booked_tables` as b
										LEFT JOIN `table_details` as t ON t.id = b.table_id
										WHERE DATE(b.start_date) = '".$start_date."' AND b.status = 0 
										AND b.start_time <= '".$guess_time."' AND b.end_time >= '".$guess_time."'" . $condition);

		$notify = ''; $i = 0;  $yesI = true;
		if ($notify_data != null) {
			foreach($notify_data as $key1 => $value):  $i++;
				$j = 0; $yesJ = true;
				$notify .= '"' . $i . '" : {';
				foreach($value as $key2 => $val): $j++;
					if (count($value) == $j) $yesJ = false;
					if($key2 == "merge" && $val != '') {
						$merge_value = implode(',',json_decode($val));
						$notify .=  '"' . $key2 . '" : ' . '"' . $merge_value . '"' . (($yesJ) ? ', ' : '');
					}else{
						$notify .=  '"' . $key2 . '" : ' . '"' . $val . '"' . (($yesJ) ? ', ' : '');
					}
				endforeach;
				if (count($notify_data) == $i) $yesI = false;
				$notify .= '}' . (($yesI) ? ', ' : '');
			endforeach;
		}

		echo 'data: {"notify": {' . $notify . '}, "alert": {' . $alert . '}}' . "\n\n"; flush(); exit;
	}

	public function actionLockTable() 
	{
		if(UniqueUser::checkUniqueLogin() == false) {
			if (Yii::$app->request->isAjax) {
				if (isset($_POST['value']) && $_POST['value'] != null) {
					$value = ($_POST['value'] == 'lock') ? 'yes' : 'no';
					echo json_encode(HSettings::editSettingFromSlug($value, 'lock-table', 'value')); die;
				}
			}
			echo json_encode(FALSE); die;
		}else{
			echo json_encode(array('status' => 'logout'));die;
		}
	}

	public function actionLockObstacle() 
	{
		if(UniqueUser::checkUniqueLogin() == false) {
			if (Yii::$app->request->isAjax) {
				if (isset($_POST['value']) && $_POST['value'] != null) {
					$value = ($_POST['value'] == 'lock') ? 'yes' : 'no';
					echo json_encode(HSettings::editSettingFromSlug($value, 'lock-obstacle', 'value')); die;
				}
			}
			echo json_encode(FALSE); die;
		}else{
			echo json_encode(array('status' => 'logout'));die;
		}
	}

	public function actionRetailNow() 
	{
		$latest = Misc::getLatestDate();
        if($latest != '' &&  date('Y-m-d') < $latest['latest_date'] ) { 
            echo json_encode(false); die;
        }else {
			if(UniqueUser::checkUniqueLogin() == false) {
				if (Yii::$app->request->isAjax) {
					$retail = new Retail();
					$retail->created_on = date('Y-m-d H:i:s');
					$retail->created_by = Yii::$app->session['eHhupx5UpkLZoXRP_cR1ozEVjY14zWOC0_user']->id;
					if($retail->save()){
						$retail_id = $retail->id;
						echo json_encode(array('status' => 'true' , 'retail_id' => $retail_id)); die;
					}
				}
				throw new HttpException(404, 'Page not found.');
			}else{
				echo json_encode(array('status' => 'logout'));die;
			}
		}
	}

	public function actionTakeAwayNow() 
	{
		$latest = Misc::getLatestDate();
        if($latest != '' &&  date('Y-m-d') < $latest['latest_date'] ) { 
            echo json_encode(false); die;
        }else {
			if(UniqueUser::checkUniqueLogin() == false) {
				if (Yii::$app->request->isAjax) {
					$take_away = new TakeAway();
					/*$take_away->customer_name = (isset($_POST['customer_name']) && $_POST['customer_name'] != null) ? $_POST['customer_name'] : "Cash Customer";
					$take_away->customer_pan = (isset($_POST['customer_pan']) && $_POST['customer_pan'] != null) ? $_POST['customer_pan'] : '0';
					$take_away->customer_address = (isset($_POST['customer_address']) && $_POST['customer_address'] != null) ? $_POST['customer_address'] : "";
					$take_away->customer_phone = (isset($_POST['customer_phone']) && $_POST['customer_phone'] != null) ? $_POST['customer_phone'] : "";*/
					$take_away->created_on = date('Y-m-d H:i:s');
					$take_away->created_by = Yii::$app->session['eHhupx5UpkLZoXRP_cR1ozEVjY14zWOC0_user']->id;
					if($take_away->save()){
						$take_away_id = $take_away->id;
						echo json_encode(array('status' => 'true' , 'take_away_id' => $take_away_id)); die;
					}
				}
				throw new HttpException(404, 'Page not found.');
			}else{
				echo json_encode(array('status' => 'logout'));die;
			}
		}
	}
	// Change Here
	public function actionPickUpNow() 
	{
		$latest = Misc::getLatestDate();
        if($latest != '' &&  date('Y-m-d') < $latest['latest_date'] ) { 
            echo json_encode(false); die;
        }else {
			if(UniqueUser::checkUniqueLogin() == false) {
				if (Yii::$app->request->isAjax) {
					$pick_up = new PickUp();
					$pick_up->customer_name = (isset($_POST['pickup_customer_name']) && $_POST['pickup_customer_name'] != null) ? htmlspecialchars(trim($_POST['pickup_customer_name']), ENT_QUOTES) : "Cash Customer";
					$pick_up->customer_pan = (isset($_POST['customer_pan']) && $_POST['customer_pan'] != null) ? htmlspecialchars(trim($_POST['customer_pan']), ENT_QUOTES) : '0';
					$pick_up->customer_address = (isset($_POST['customer_address']) && $_POST['customer_address'] != null) ? htmlspecialchars(trim($_POST['customer_address']), ENT_QUOTES) : "";
					$pick_up->customer_phone = (isset($_POST['customer_phone']) && $_POST['customer_phone'] != null) ? htmlspecialchars(trim($_POST['customer_phone']), ENT_QUOTES) : "";
					$pick_up->created_on = date('Y-m-d H:i:s');
					$pick_up->created_by = Yii::$app->session['eHhupx5UpkLZoXRP_cR1ozEVjY14zWOC0_user']->id;
					if($pick_up->save()){
						$pick_up_id = $pick_up->id;
						echo json_encode(array('status' => 'true' , 'pick_up_id' => $pick_up_id)); die;
					}
				}
				throw new HttpException(404, 'Page not found.');
			}else{
				echo json_encode(array('status' => 'logout'));die;
			}
		}
	}

	public function actionDeliveryNow() 
	{
		$latest = Misc::getLatestDate();
        if($latest != '' &&  date('Y-m-d') < $latest['latest_date'] ) { 
            echo json_encode(false); die;
        }else {
			if(UniqueUser::checkUniqueLogin() == false) {
				if (Yii::$app->request->isAjax) {
					$delivery = new Delivery();
					$delivery->customer_name = (isset($_POST['customer_name']) && $_POST['customer_name'] != null) ? htmlspecialchars(trim($_POST['customer_name']), ENT_QUOTES) : "Cash Customer";
					$delivery->customer_pan = (isset($_POST['customer_pan']) && $_POST['customer_pan'] != null) ? htmlspecialchars(trim($_POST['customer_pan']), ENT_QUOTES) : '0';
					$delivery->customer_address = (isset($_POST['customer_address']) && $_POST['customer_address'] != null) ? htmlspecialchars(trim($_POST['customer_address']), ENT_QUOTES) : "";
					$delivery->customer_phone = (isset($_POST['customer_phone']) && $_POST['customer_phone'] != null) ? htmlspecialchars(trim($_POST['customer_phone']), ENT_QUOTES) : "";
					$delivery->created_on = date('Y-m-d H:i:s');
					$delivery->created_by = Yii::$app->session['eHhupx5UpkLZoXRP_cR1ozEVjY14zWOC0_user']->id;
					if($delivery->save()){
						$delivery_id = $delivery->id;
						echo json_encode(array('status' => 'true' , 'delivery_id' => $delivery_id)); die;
					}
				}
				throw new HttpException(404, 'Page not found.');
			}else{
				echo json_encode(array('status' => 'logout'));die;
			}
		}
	}

	public function actionGotoTableOrder() 
	{
		if(UniqueUser::checkUniqueLogin() == false) {
			if (Yii::$app->request->isAjax) {
				if (isset($_POST['goto']) && $_POST['goto'] != null) {
					if ($table = TableDetails::find()->where(['code' => htmlspecialchars($_POST['goto'], ENT_QUOTES)])->one()) {
						if ($occupy = Query::queryOne("SELECT id FROM `occupy` WHERE table_id = " . $table->id . " AND is_occupied = ".Yii::$app->params['is_occupied']['yes'])) {
							echo json_encode(array('status' => 'success', 'value' => $occupy['id'])); die;
						}
						echo json_encode(array('status' => 'failed')); die;
					}
				}
			}
			echo json_encode(array('status' => 'error')); die;
		}
		else{
			echo json_encode(array('status' => 'logout'));die;
		}
	}
	
	public function actionRunSyncTableMain() 
	{
		header('Content-Type: text/event-stream');
        header('Cache-Control: no-cache');
        echo "retry: 1000\n";

        $json_file = Yii::getAlias("@webroot/assets/json/table.json");
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

	public function actionRunSyncTable() 
	{	
		header('Content-Type: text/event-stream');
        header('Cache-Control: no-cache');
        echo "retry: 1000\n";

        if (isset($_GET['table']) && $_GET['table'] != null 
        	&& isset($_GET['action']) && $_GET['action'] != null) {

	        $id = $_GET['table'];
			$action = $_GET['action'];

	        $json_file = Yii::getAlias("@webroot/assets/json/table.json");
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
				else if ($action == 'close') {
					$json_array['data'][$id][$ip]['close'] = "0";

					$fp = fopen($json_file, 'w');
		            fwrite($fp, json_encode($json_array));
		            fclose($fp);

					echo "event: closeTable\n";
					echo 'data: {"id":"'.$id.'"}'."\n\n"; flush(); exit;
				}
				else if ($action == 'move_occupy') {
					$to = $json_array['data'][$id][$ip]['move_occupy_to'];
					$json_array['data'][$id][$ip]['move_occupy'] = "0";
					$json_array['data'][$id][$ip]['move_occupy_to'] = "0";

					$fp = fopen($json_file, 'w');
		            fwrite($fp, json_encode($json_array));
		            fclose($fp);

					echo "event: moveOccupiedTable\n";
					echo 'data: {"id":"'.$id.'", "to":"'.$to.'"}'."\n\n"; flush(); exit;
				}
				else if ($action == 'occupy') {
					$json_array['data'][$id][$ip]['occupy'] = "0";

					$fp = fopen($json_file, 'w');
		            fwrite($fp, json_encode($json_array));
		            fclose($fp);

		            $data = Query::queryOneSecure("SELECT id, table_id, start_date, start_time FROM `occupy` WHERE status = 1 AND table_id = :id",[':id'=>$id]);
		            if ($data != null) {
		            	$return = ''; $i = 0; $yes = true;
						foreach($data as $key => $value):
							$i++;
							if (count($data) == $i) $yes = false;
							$return .=  '"' . $key . '" : ' . '"' . $value . '"' . (($yes) ? ', ' : '');
						endforeach;

						echo "event: occupyTable\n";
						echo 'data: {' . $return . '}' . "\n\n"; flush(); exit;
					}
				}
				else {
					$data = Query::queryOneSecure("SELECT * FROM `table_details` WHERE id = :id",[':id'=>$id]);
					if ($data != null) {
						$json_array['data'][$id][$ip][$action] = "0";

						$fp = fopen($json_file, 'w');
			            fwrite($fp, json_encode($json_array));
			            fclose($fp);

						$return = ''; $i = 0; $yes = true;
						foreach($data as $key => $value):
							$i++;
							if (count($data) == $i) $yes = false;
							if($key == "merge" && $value != "") {
								$merge_value = implode(',',json_decode($value));
								$return .=  '"' . $key . '" : ' . '"' . $merge_value . '"' . (($yes) ? ', ' : '');
							}else {
								$return .=  '"' . $key . '" : ' . '"' . $value . '"' . (($yes) ? ', ' : '');
							}
						endforeach;

						if ($action == 'create') { echo "event: createTable\n"; }
						else if ($action == 'update') { echo "event: updateTable\n"; }
			         	echo 'data: {' . $return . '}' . "\n\n"; flush(); exit;
				  	}
				}
			}
		}	
	  	echo "event: shutDown\n";
		echo "data: YES\n\n"; flush(); exit;
	}

	public function actionUnmergeSync() 
    {
    	if(Yii::$app->request->isAjax) {
    		Sync::set_table_unmerge_data();
    	}
    }

    public function actionRunSyncTableUnmergeMain() 
	{
		header('Content-Type: text/event-stream');
        header('Cache-Control: no-cache');
        echo "retry: 1000\n"; /*default is 3 seconds.*/

        $json_file = Yii::getAlias("@webroot/assets/json/unmerge-table.json");
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

	public static function generateTableCode($max)
	{
		$i=1;
		$bool = true;
		$check = $max;
		do {
			$model = Query::queryOneSecure("SELECT id FROM table_details WHERE code = :code",[':code'=>$check]);
			if (!$model) {
				return $check;
			}
			$check = $max . '-' . $i; $i++;
		} while($bool);
	}
}