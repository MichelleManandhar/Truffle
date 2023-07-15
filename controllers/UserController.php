<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of UserController
 *
 * @author gaurav maharjan
 */

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\HttpException;

use app\components\Misc;
use app\components\Cipher;
use app\components\Query;
use app\components\Notify;

use app\models\User;

class UserController extends Controller
{

	public $to_group = array('admin');

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

        if (Yii::$app->user->isGuest || !in_array(Yii::$app->session['eHhupx5UpkLZoXRP_cR1ozEVjY14zWOC0_user']->role, $group)) {
            throw new HttpException(404, 'Page not found.');
        }

        if(!isset(Yii::$app->session['fiscal_year'])) {
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
    	$role 	   = Yii::$app->params['user_role']['superadmin'];
    	$users     = Query::queryAll("SELECT * FROM `user` WHERE `role` != '$role'");
        
        return $this->render('index', array('users' => $users));
    }

    public function actionCreate()
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
                throw new HttpException(404, 'Page not found.');
            } else {
    		  return $this->render('create');
            }
        }
	}

	public function actionAdd()
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
        		if (Yii::$app->request->isAjax) {
                    $count_users = Query::queryOne("SELECT count(id) as total_users FROM `user`");
                    
                    if($count_users != null && $count_users['total_users'] <= Yii::$app->params['allowed_number_of_users']) 
                    {
            			$salt = Misc::garbage(8); 
                        $pin_hash = Cipher::encrypt(htmlspecialchars(trim($_POST['pin_code']), ENT_QUOTES), $salt);

            			$user = new User();
            			$user->name 		 = htmlspecialchars(trim($_POST['name']), ENT_QUOTES);
            			$user->username 	 = htmlspecialchars(trim(strtolower($_POST['username'])), ENT_QUOTES);
            			$user->setPassword(htmlspecialchars(trim($_POST['password']), ENT_QUOTES));
            			$user->address 		 = htmlspecialchars(trim($_POST['address']), ENT_QUOTES);
            			$user->mobile 		 = htmlspecialchars(trim($_POST['mobile']), ENT_QUOTES);
            			$user->role 		 = Yii::$app->params['user_role'][strtolower($_POST['role'])];
            			$user->email 		 = htmlspecialchars(trim($_POST['email']), ENT_QUOTES);
            			$user->position 	 = htmlspecialchars(trim($_POST['position']), ENT_QUOTES);	
            			$user->pin 			 = $pin_hash;		
            			$user->salt 		 = $salt;	
            			$user->discount_upto = htmlspecialchars(trim($_POST['discount_upto']), ENT_QUOTES);	
            			$user->created_by 	 = Yii::$app->session['eHhupx5UpkLZoXRP_cR1ozEVjY14zWOC0_user']->id;
            			$user->created_at 	 = date('Y-m-d H:i:s');
            			$user->is_active 	 = 1;

            			if($user->save()){

            				if(Yii::$app->session['eHhupx5UpkLZoXRP_cR1ozEVjY14zWOC0_user']->role != Yii::$app->params['user_role']['superadmin']) {
                                if($user){
                                    $log = array(
                                        'action' => "User named - " . $user->name . "' with username - " . $user->username . 'has been created',
                                        'type' => "user"
                                    );
                                    Notify::auditLog($log);
                                }
                            }

            				echo json_encode(TRUE); die;
            			}
                    }
                    else {
                        echo json_encode(array('status' => 'error', 'msg' => 'More than '.Yii::$app->params['allowed_number_of_users'].' users cannot be created for this version of the software') ); die;
                    }
        		}
        		echo json_encode(FALSE); die;
            }
        }
	}

	public function actionEditable()
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
        		if (Yii::$app->request->isAjax) {
        			$user = User::findOne($_POST['pk']); 
        			if ($user != null) { 
        				if ($_POST['name'] == "role") {
        					$user->$_POST['name'] = Yii::$app->params['user_role'][strtolower($_POST['value'])];
        				}
        				else if ($_POST['name'] == "email" || $_POST['name'] == "username") {
        					if ($this->check($_POST['name'], $_POST['value'], $_POST['pk'])) {
        						echo json_encode(array(
        				                            'status' => 'error', 
        				                            'display_value' => $_POST['old_value'],
        				                            'msg' => 'Sorry! This field value must be unique.'
        				                            )); die;
        					}
        					$user->$_POST['name'] = htmlspecialchars(trim($_POST['value']), ENT_QUOTES); 
        				}
        				else {
        					$user->$_POST['name'] = htmlspecialchars(trim($_POST['value']), ENT_QUOTES); 
        				}
        				$user->updated_at 		  = date('Y-m-d H:i:s');
        				if ($user->update()) { 

        					if(Yii::$app->session['eHhupx5UpkLZoXRP_cR1ozEVjY14zWOC0_user']->role != Yii::$app->params['user_role']['superadmin']) {
                                $user = Query::queryOneSecure("SELECT name, username FROM user WHERE id = :id",[':id'=>htmlspecialchars(trim($_POST['pk']), ENT_QUOTES)]);
                                if($user){
                                    $log = array(
                                        'action' => "Updated user detail of -" . $user['name'] . "'" . $user['username'] . "' from '" . $_POST['old_value'] . "' to '" . $_POST['value'] . "'" ,
                                        'type' => "user"
                                    );
                                    Notify::auditLog($log);
                                }
                            }

        					echo json_encode(array(
        	                                    'status' => 'success', 
        	                                    'display_value' => $_POST['value'], 
        	                                    'msg' => 'User detail has been updated.'
        	                                    )); die;			
        				}
        			}
        			echo json_encode(array(
        	                            'status' => 'error', 
        	                            'display_value' => $_POST['old_value'],
        	                            'msg' => 'Sorry! Could not update user detail at this time.'
        	                            )); die;
        		}
        		echo json_encode(FALSE); die;
            }
        }
	}

	public function actionEditPassword()
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
        		if (Yii::$app->request->isAjax) {
        			$user = User::findOne(htmlspecialchars(trim($_POST['pk']), ENT_QUOTES)); 
        			if ($user != null) {
        				$user->setPassword(htmlspecialchars(trim($_POST['value']), ENT_QUOTES));
        				if ($user->update()) {

        					if(Yii::$app->session['eHhupx5UpkLZoXRP_cR1ozEVjY14zWOC0_user']->role != Yii::$app->params['user_role']['superadmin']) {
                                $user = Query::queryOneSecure("SELECT name, username FROM user WHERE id = :id",[':id'=>htmlspecialchars(trim($_POST['pk']), ENT_QUOTES)]);
                                if($user){
                                    $log = array(
                                        'action' => "Updated password of user -" . $user['name'] . "'" . $user['username'],
                                        'type' => "user"
                                    );
                                    Notify::auditLog($log);
                                }
                            }

        					echo json_encode(array(
        		                                    'status' => 'success', 
        		                                    'display_value' => 'Password', 
        		                                    'msg' => 'Password has been updated.'
        		                                    )); die;
        				}
        			}
        			echo json_encode(array(
                                        'status' => 'error', 
                                        'display_value' => 'Password',
                                        'msg' => 'Sorry! Could not update Password at this time.'
                                        )); die;
        		}
        		echo json_encode(FALSE); die;
            }
        }
	}

	public function actionEditPinCode()
	{
        $latest = Misc::getLatestDate();
        if($latest != '' &&  date('Y-m-d') < $latest['latest_date'] ) { 
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
        		if (Yii::$app->request->isAjax) {
        			$user = User::findOne(htmlspecialchars(trim($_POST['pk']), ENT_QUOTES)); 
        			if ($user != null) {
        				
        				$salt = Misc::garbage(8); 
                        $pin_hash = Cipher::encrypt(htmlspecialchars(trim($_POST['value']), ENT_QUOTES), $salt);

        				$user->pin  = $pin_hash;
        				$user->salt = $salt;

        				if ($user->update()) {

        					if(Yii::$app->session['eHhupx5UpkLZoXRP_cR1ozEVjY14zWOC0_user']->role != Yii::$app->params['user_role']['superadmin']) {
                                if($user){
                                    $log = array(
                                        'action' => "Updated pin code of user -" . $user->name . "'" . $user->username ,
                                        'type' => "user"
                                    );
                                    Notify::auditLog($log);
                                }
                            }

        					echo json_encode(array(
                                            'status' => 'success', 
                                            'display_value' => '####', 
                                            'msg' => 'Pin Code has been updated.'
                                            )); die;
        				}
        			}
        			echo json_encode(array(
                                'status' => 'error', 
                                'display_value' => '####',
                                'msg' => 'Sorry! Could not update Pin Code at this time.'
                                )); die;
        		}
        		echo json_encode(FALSE); die;
            }
        }
	}

	public function actionCheckEmail()
	{
		if (Yii::$app->request->isAjax && isset($_POST['email'])) {
			echo json_encode(!$this->check('email', htmlspecialchars(trim($_POST['email']), ENT_QUOTES), 0)); die;
		}
		echo json_encode(FALSE); die;
	}

	public function actionCheckUsername()
	{
		if (Yii::$app->request->isAjax && isset($_POST['username'])) {
			echo json_encode(!$this->check('username', htmlspecialchars(trim($_POST['username']), ENT_QUOTES), 0)); die;
		}
		echo json_encode(FALSE); die;
	}

	public function check($field, $value, $id)
    {
        $condition = $id > 0 ? " AND `id` != $id" : ""; 
        $type = Misc::clean_text($value);
        $data = Query::queryOne("SELECT id FROM `user` WHERE `$field` = '$value' $condition");
        return Misc::if_exists($data);
    }

    public function actionProfilePicture()
    {
        $user   = Yii::$app->session['eHhupx5UpkLZoXRP_cR1ozEVjY14zWOC0_user']->id;
        $image  = Query::queryOne("SELECT  id,name,profile_picture FROM `user` WHERE `id` = '$user'");
        return $this->render('profile-picture' , array('image' => $image));
    }

    public function actionUploadPicture()
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
                if (Yii::$app->request->isAjax) {
                    $image = Query::queryOneSecure("SELECT profile_picture FROM `user` WHERE  `id` =:id",[':id'=>$_POST['id']]);
                    $user = User::findOne(htmlspecialchars(trim($_POST['id']), ENT_QUOTES));
                    if ($image != null) {
                        $user->profile_picture = isset($_POST['image']) ? htmlspecialchars(trim($_POST['image']), ENT_QUOTES) : '';
                        $user->update();

                    } else {
                        $user->profile_picture = isset($_POST['image']) ? htmlspecialchars(trim($_POST['image']), ENT_QUOTES) : '';
                        $user->update();
                    }

                    if(Yii::$app->session['eHhupx5UpkLZoXRP_cR1ozEVjY14zWOC0_user']->role != Yii::$app->params['user_role']['superadmin']) {
                        $log = array(
                            'action' => "Uploaded profile picture of the user -" . $user->name . "'" . $user->username,
                            'type' => "user"
                        );
                        Notify::auditLog($log);
                    }

                    echo json_encode(TRUE);
                    die;
                }
                echo json_encode(FALSE); die;
            }
        }
    }

    public function actionDelete()
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
                if (Yii::$app->request->isAjax) {
                    $model = User::findOne(htmlspecialchars(trim($_POST['id']), ENT_QUOTES));
                	if ($model != null) {
                        $image = $model->profile_picture;
                        $model->profile_picture = '';
                        if ($model->update()) {
                            Misc::delete_file($image, 'profile-picture');

                            if(Yii::$app->session['eHhupx5UpkLZoXRP_cR1ozEVjY14zWOC0_user']->role != Yii::$app->params['user_role']['superadmin']) {
            	                $log = array(
            	                    'action' => "Deleted profile picture of the user -" . $model->name . "'" . $model->username,
            	                    'type' => "user"
            	                );
            	                Notify::auditLog($log);
            	            }
                            echo json_encode(TRUE);die;
                        }
                    }
                }
                echo json_encode(FALSE); die;
            }
        }
    }
}