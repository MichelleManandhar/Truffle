<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of PrinterController
 *
 * @author gaurav maharjan
 */

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\HttpException;

use app\components\Misc;
use app\components\Query;

use app\models\Printers;
use app\models\PrinterLists;

class PrinterController extends Controller
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

        if (!isset(Yii::$app->session['eHhupx5UpkLZoXRP_cR1ozEVjY14zWOC0_user']) || Yii::$app->user->isGuest || !in_array(Yii::$app->session['eHhupx5UpkLZoXRP_cR1ozEVjY14zWOC0_user']->role, $group))  {
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

    /*this code is for backup which uses php function for printer list and save in tbl seperately*/
    /*public function actionIndexForAnotherType()
    {
        $print = Query::queryAll("SELECT * FROM `printers`");
        $printers = Query::queryAll("SELECT * FROM `printer_list`");
        return $this->render('index', array('printers'=>$printers,'print'=>$print));
    }

    public function actionGeneratePrinterListForAnotherType()
    {
        $temp = explode(":",Yii::$app->session['fiscal_year']);
        $starting_fiscal_year_from_date = $temp[0];
        $starting_fiscal_year_to_date   = $temp[1];

        if ((date('Y-m-d') < $starting_fiscal_year_from_date) 
                || ( date('Y-m-d') > date('Y-m-d', strtotime($starting_fiscal_year_to_date. ' + 11 days'))) )
        {
            echo json_encode(false); die;
        } else {
            if (Yii::$app->request->isAjax) {
                $printer_list = printer_list(PRINTER_ENUM_LOCAL);

                if ($printer_list != null) {
                    $batch = '';
                    Query::execute('TRUNCATE TABLE `printer_list`');
                    foreach($printer_list as $printer) {
                        $batch[] = [$printer['NAME']];
                    }

                    if ($batch != null) {
                        Query::batchInsert('printer_list', array('name'), $batch);
                    }
                }
                echo json_encode(TRUE); exit;
            }

            echo json_encode(FALSE); die;
        }
    }*/

    /*this code is for backup which uses shell command for printer list*/
    /*public function actionIndex()
    {
        $print = Query::queryAll("SELECT * FROM `printers`");
        $host = strtoupper( exec('hostname') );
        $power_shell_script_path = Yii::$app->params['upload_path']['shell']; 
        $data = substr(Misc::clean(file_get_contents($power_shell_script_path . "printers.txt")), 19);

        $printers = '';
        $printer_data = explode($host, $data);
        if ($printer_data != null && is_array($printer_data)) {
            foreach($printer_data as $list):
                $printers[] = trim($list);
            endforeach;
            array_pop($printers);
        }

        return $this->render('index', array('printers'=>$printers,'print'=>$print));
    }

    public function actionGeneratePrinterList()
    {
        $temp = explode(":",Yii::$app->session['fiscal_year']);
        $starting_fiscal_year_from_date = $temp[0];
        $starting_fiscal_year_to_date   = $temp[1];

        if ((date('Y-m-d') < $starting_fiscal_year_from_date) 
                || ( date('Y-m-d') > date('Y-m-d', strtotime($starting_fiscal_year_to_date. ' + 11 days'))) )
        {
            echo json_encode(false); die;
        } else {
            if (Yii::$app->request->isAjax) {
                $power_shell_script_path = Yii::$app->params['upload_path']['shell']; 
                file_put_contents($power_shell_script_path . "printers.txt", "");
                $power_shell_path = Yii::$app->params['shell_drive'] . ":\\Windows\\System32\\WindowsPowerShell\\v1.0\\powershell.exe";
                $power_shell_script_file = "printer_list.ps1";
                $command = $power_shell_path . ' -ExecutionPolicy RemoteSigned ' . $power_shell_script_path . $power_shell_script_file;
                exec($command);
                echo json_encode(TRUE); exit;
            }

            echo json_encode(FALSE); die;
        }
    }*/

    /*this code is for backup which uses shell command for printer list and save in tbl in one field*/
    public function actionIndex()
    {
        $print = Query::queryAll("SELECT * FROM `printers`");
        $all_printer_list = Query::queryOne("SELECT * FROM `printer_lists`");
        $printers = [];
        if($all_printer_list != null) {
            $temp_printer_list = json_decode($all_printer_list['name']);
        
            foreach ($temp_printer_list as $row) {
                $printers[]['name'] = $row->NAME;
            } 
        }
        
        return $this->render('index', array('printers'=>$printers,'print'=>$print));
    }

    public function actionGeneratePrinterList()
    {
        $temp = explode(":",Yii::$app->session['fiscal_year']);
        $starting_fiscal_year_from_date = $temp[0];
        $starting_fiscal_year_to_date   = $temp[1];

        if ((date('Y-m-d') < $starting_fiscal_year_from_date) 
                || ( date('Y-m-d') > date('Y-m-d', strtotime($starting_fiscal_year_to_date. ' + 11 days'))) )
        {
            echo json_encode(false); die;
        } else {
            if (Yii::$app->request->isAjax) {
                $printer_list = printer_list(PRINTER_ENUM_LOCAL);
                
                if($printer_list != null) {
                    Query::execute('TRUNCATE TABLE `printer_lists`');

                    $printer = new PrinterLists();
                    $printer->name = json_encode($printer_list);
                    if($printer->save()) {
                        echo json_encode(true); die;
                    }
                }
            }

            echo json_encode(FALSE); die;
        }
    }

    public function actionAddPrinters()
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
                if (Yii::$app->request->isAjax && isset($_POST) && $_POST != null) {
                    $printer_add = new Printers();
                    $printer_add->name = isset($_POST['name']) ? htmlspecialchars(trim($_POST['name']), ENT_QUOTES) : '';
                    $printer_add->printer_name 	 = isset($_POST['printer_name']) ? htmlspecialchars(trim($_POST['printer_name']), ENT_QUOTES) : '';
                    if ($printer_add->save()) {
                        echo json_encode(TRUE); die;
                    }
                }
                echo json_encode(FALSE); die;
            }
        }
    }

    public static function editablePrinter($value, $id, $field)
    {
        $model = Printers::findOne($id);
        $model->$field = $value;
        return $model->update() ? $model : FALSE;
    }

    public function actionEditablePrinter()
    {
        $latest = Misc::getLatestDate();
        if( $latest != '' && date('Y-m-d') < $latest['latest_date'] ) { 
            echo json_encode(array(
                    'status' => 'error',
                    'display_value' => $_POST['old_value'],
                    'msg' => 'Sorry! Could not update printer at this time.'
                )); die;
        } else {
            $temp = explode(":",Yii::$app->session['fiscal_year']);
            $starting_fiscal_year_from_date = $temp[0];
            $starting_fiscal_year_to_date   = $temp[1];

            if ((date('Y-m-d') < $starting_fiscal_year_from_date) 
                    || ( date('Y-m-d') > date('Y-m-d', strtotime($starting_fiscal_year_to_date. ' + 11 days'))) )
            {
                echo json_encode(array(
                                        'status' => 'error',
                                        'display_value' => $_POST['old_value'],
                                        'msg' => 'Sorry! Please return to current fiscal year to change data'
                                    )); die;
            } else {
                if (Yii::$app->request->isAjax) {
                    if ($this->editablePrinter(htmlspecialchars(trim($_POST['value']), ENT_QUOTES), $_POST['pk'], $_POST['name'])) {
                        echo json_encode(array(
                            'status' => 'success',
                            'display_value' => $_POST['value'],
                            'msg' => 'Your printer has been updated.'
                        )); die;
                    }
                }
                echo json_encode(array(
                    'status' => 'error',
                    'display_value' => $_POST['old_value'],
                    'msg' => 'Sorry! Could not update printer at this time.'
                )); die;
            }
        }
    }

    public function actionCheckName(){
        $old_printer = Printers::find()->WHERE(['name' => htmlspecialchars(trim($_POST['name']), ENT_QUOTES)])->all();
        if ($old_printer != null) {
            echo json_encode(FALSE);die;
        }
        echo json_encode(TRUE);die;
    }
}