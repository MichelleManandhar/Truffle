<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\HttpException;

use app\components\Misc;
use app\components\Notify;
use app\components\Query;
use app\components\Pdf;
use app\components\UniqueUser;
use app\components\HelperPrinter as HPrinter;
use app\components\HelperSettings as HSettings;

use app\models\User;
use app\models\Kot;
use app\models\KotItems;
use app\models\TempItems;
use app\models\TempOrderList;
use app\models\Occupy;
use app\models\Retail;
use app\models\TakeAway;
use app\models\PickUp;
use app\models\Delivery;

class KotController extends Controller {
    public $to_group = array('admin', 'staff','floor_supervisor');

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

        if(UniqueUser::checkUniqueLogin() != false) {
            throw new HttpException(404,'Page Not Found');
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
        $mc_array=[];
        $menu_condition = '';
        $category_ids = '';
        if (isset($_GET['type']) && $_GET['type'] != '') {
            $menu_categories = Query::queryAllSecure("SELECT mc.id FROM `menu_category` as mc 
                                                LEFT JOIN `printers` as pr 
                                                    ON pr.id = mc.bill_type
                                                WHERE pr.slug = :type ",[':type' => htmlspecialchars($_GET['type'], ENT_QUOTES)]);
            
            if ($menu_categories != '') {
                foreach($menu_categories as $menu_category) :
                    $mc_array[] = $menu_category['id'];
                endforeach;

                if (!empty($mc_array)) {
                    $category_ids = implode(",", $mc_array);
                }
            }
        }

        $tables     = Query::queryAll("SELECT id, table_name, status FROM `table_details`");
        $menu_items = Query::queryAll("SELECT id, name FROM `menu_item` ORDER BY name");
        $kot_types  = Query::queryAll("SELECT slug, name FROM `printers` WHERE `slug` != 'bill' ORDER BY name");

        $kots = Query::queryAll("SELECT k.id, k.display_number, k.retail_id, k.take_away_id, k.pick_up_id, k.delivery_id, k.occupy_id, k.table_id, k.created_on, u.name, td.table_name 
                                FROM `kot` as k
                                LEFT JOIN user as u 
                                    ON u.id = k.created_by 
                                LEFT JOIN table_details as td
                                    ON td.id = k.table_id
                                WHERE k.kitchen_status = 0 AND k.return_against = 0 ORDER BY created_on ASC");
        
        $kot_items = '';
        $new_kot = '';
        if ($kots != null) {
            $kot_ids = '';
            foreach($kots as $key => $k):
                $kot_ids .= (($key == 0) ? '' : ', ') . $k['id'];
            endforeach;
            if($category_ids != null) {
                $kot_items_data = Query::queryAll("SELECT ki.*, si.id as special_item_id, si.name as special_item_name, si.remarks as special_item_remarks, mi.name as item_name, mi.id as item_id, mi.image 
                                                FROM `kot_items` as ki
                                                LEFT JOIN `menu_item` as mi
                                                    ON mi.id = ki.item_id
                                                LEFT JOIN `special_order_items` as si 
                                                    ON si.id = ki.item_id 
                                                WHERE ki.kot_id IN (".$kot_ids.")
                                                    AND ki.status = 0
                                                    AND mi.category_id IN ('".$category_ids."')
                                                    AND ki.quantity != ki.returned_quantity");
            }
            else {
                $kot_items_data = Query::queryAll("SELECT ki.*, si.id as special_item_id, si.name as special_item_name, si.remarks as special_item_remarks, mi.name as item_name, mi.id as item_id, mi.image 
                                                FROM `kot_items` as ki
                                                LEFT JOIN `menu_item` as mi
                                                    ON mi.id = ki.item_id
                                                LEFT JOIN `special_order_items` as si 
                                                    ON si.id = ki.item_id 
                                                WHERE ki.kot_id IN (".$kot_ids.")
                                                AND ki.status = 0
                                                AND ki.quantity != ki.returned_quantity");
            }

            $new_kot_ids = '';
            
            foreach($kot_items_data as $ki):
                $kot_items[$ki['kot_id']][] = $ki;
                $new_kot_ids[] = $ki['kot_id'];
            endforeach;

            if($new_kot_ids != null) {
                foreach($kots as $kot) {
                    if(in_array($kot['id'], $new_kot_ids)) {
                        $new_kot[] = $kot;
                    }
                }
            }
            
        }

        return $this->render('index' , array('kots' => $new_kot, 'kot_items' => $kot_items, 'tables' => $tables, 'menu_items' => $menu_items, 'kot_types' => $kot_types));
    }

    public function actionChangeKitchenStatus()
    {
        $latest = Misc::getLatestDate();
        if($latest != '' &&  date('Y-m-d') < $latest['latest_date'] ) { 
            echo json_encode(false); die;
        } else {
            if (Yii::$app->request->isAjax && isset($_POST['id']) && $_POST['id'] > 0) {
                $kot = Kot::findOne($_POST['id']);
                if ($kot != null) {
                    $kot->kitchen_status = 1;
                    if ($kot->update()) {
                        echo json_encode(TRUE); die;
                    }
                }
            }
            echo json_encode(TRUE); die;
        }
    }

    public function actionChangeKitchenItemStatus()
    {
        $latest = Misc::getLatestDate();
        if($latest != '' &&  date('Y-m-d') < $latest['latest_date'] ) { 
            echo json_encode(false); die;
        } else {
            if (Yii::$app->request->isAjax && isset($_POST['id']) && $_POST['id'] > 0) {
               
                $kotItems = KotItems::findOne($_POST['id']);
                if ($kotItems != null) {
                    $kotItems->status = 1;
                    if ($kotItems->update()) {
                        echo json_encode(TRUE); die;
                    }
                }
            }
            echo json_encode(TRUE); die;
        }
    }

    public function actionSend()
    {
        $latest = Misc::getLatestDate();
        if($latest != '' &&  date('Y-m-d') < $latest['latest_date'] ) { 
            echo json_encode(false); die;
        } else {
            if (Yii::$app->request->isAjax && isset($_POST['items']) && $_POST['items'] != null) {
                $retail_id      = ($_POST['retail_id'] != null) ? $_POST['retail_id'] : '0';
                $take_away_id   = ($_POST['take_away_id'] != null) ? $_POST['take_away_id'] : '0';
                $pick_up_id     = ($_POST['pick_up_id'] != null) ? $_POST['pick_up_id'] : '0';
                $occupy_id      = ($_POST['occupy_id'] != null) ? $_POST['occupy_id'] : '0';
                $delivery_id    = ($_POST['delivery_id'] != null) ? $_POST['delivery_id'] : '0';
                $items = $_POST['items']; 

                if ($items != null) {
                    $user = User::findOne(Yii::$app->session['eHhupx5UpkLZoXRP_cR1ozEVjY14zWOC0_user']->id);
                    
                    $kot = new Kot();

                    $time = Query::queryAll("SELECT display_number FROM kot WHERE 
                                            YEAR(created_on)  = " . date('Y') ." AND 
                                            MONTH(created_on) = " . date('m') . " AND 
                                            DAY(created_on)   = " . date('d') . " AND display_number != ''");
                    
                    if($time != null){
                        $num = 0;
                        foreach ($time as $x) {
                            $t = explode('-', $x['display_number']);
                            if($num < $t['1']){
                                $num = $t['1'];
                            }
                        }
                        $num++;
                        if($num == '1000'){
                            $num = 1;
                        }
                        $kot->display_number  = date('y').date('m').date('d')."-".$num;
                    }else{
                        $i=1;
                        $kot->display_number  = date('y').date('m').date('d')."-".$i++;
                    }
                    $kot->table_id        = ($_POST['table_id'] != null) ? $_POST['table_id'] : '0';
                    $kot->floor_id        = ($_POST['floor_id'] != null) ? $_POST['floor_id'] : '0';
                    $kot->occupy_id       = $occupy_id;
                    $kot->retail_id       = $retail_id;
                    $kot->take_away_id    = $take_away_id;
                    $kot->pick_up_id      = $pick_up_id;
                    $kot->delivery_id     = $delivery_id;
                    $kot->created_on      = date('Y-m-d H:i:s');
                    $kot->created_by      = Yii::$app->session['eHhupx5UpkLZoXRP_cR1ozEVjY14zWOC0_user']->id;
                    $kot->status          = 0;
                    if ($kot->save()) {

                        $kot_id     = $kot->id;
                        $kot_date   = $kot->created_on;
                        $kot_no     = $kot->display_number;
                        $batch_temp = [];

                        if($occupy_id != 0){

                            $log = array(
                                'action' => "Table order KOT number " . $kot->display_number . " has been send",
                                'type' => "order"
                            );
                            Notify::auditLog($log);

                            foreach($items as $item):
                                $batch[] = [$kot->id, $item['item_id'], $item['price'], $item['quantity'], $item['type'] ];

                                $tmp_item = TempItems::find()->WHERE(['occupy_id' => $occupy_id , 'item_id' => $item['item_id'], 'type' => $item['type']])->one();
                                if($tmp_item != null){
                                    $tmp_item['quantity'] = $tmp_item['quantity'] + $item['quantity'];
                                    $tmp_item->update();
                                }else{
                                    $batch_temp[] = [$occupy_id, $item['item_id'], $item['quantity'], $item['price'], $item['type']];
                                }
                            endforeach;

                            Query::batchInsert('kot_items', array('kot_id', 'item_id', 'price', 'quantity', 'type'), $batch);

                            if($batch_temp != null){
                                Query::batchInsert('temp_items', array('occupy_id', 'item_id', 'quantity', 'price', 'type'), $batch_temp);
                            }

                            $temp_items = Query::queryAllSecure("SELECT t.*, m.id as item_id, m.slug , m.price, m.name , m.is_discountable , si.id as special_item_id, si.name as special_item_name, si.price as special_item_price 
                                                    FROM temp_items as t
                                                    LEFT JOIN menu_item as m ON m.id = t.item_id
                                                    LEFT JOIN special_order_items as si ON si.id = t.item_id
                                                    WHERE t.occupy_id = :occupy_id",[':occupy_id'=>$occupy_id]);

                            $kot_category_data = Query::queryAllSecure("SELECT k.display_number, k.created_on, kt.quantity, kt.type as item_type, si.name as special_item_name, si.remarks as special_item_remarks, mi.name, mi.slug, mc.category, p.name as bill_type, p.printer_name, td.table_name, f.name as section_name, u.name as user_name
                                                        FROM kot as k
                                                        LEFT JOIN `kot_items` as kt ON kt.kot_id = k.id
                                                        LEFT JOIN `menu_item` as mi ON mi.id = kt.item_id 
                                                        LEFT JOIN `special_order_items` as si ON si.id = kt.item_id 
                                                        LEFT JOIN `menu_category` as mc ON (mi.category_id = mc.id AND kt.type = ".Yii::$app->params['item_type']['regular'].") OR (si.category_id = mc.id AND kt.type = ".Yii::$app->params['item_type']['special'].")
                                                        LEFT JOIN `printers` as p ON mc.bill_type = p.id
                                                        LEFT JOIN `table_details` as td ON k.table_id = td.id
                                                        LEFT JOIN `floor` as f ON k.floor_id = f.id
                                                        LEFT JOIN `user` AS u ON u.id = k.created_by
                                                        WHERE k.id = :kot_id
                                                            AND k.occupy_id = :occupy_id",
                                                            [':kot_id'=>$kot_id,
                                                            ':occupy_id'=>$occupy_id]);

                            $kot_category = '';
                            if ($kot_category_data != null) {
                                foreach($kot_category_data as $row) {
                                    $kot_category[$row['bill_type']][] = $row;
                                }
                            }

                            foreach ($kot_category as $category => $row) {
                                $data['table_name']     = $row[0]['table_name'];
                                $data['section_name']   = $row[0]['section_name'];
                                $data['kot_number']     = $row[0]['display_number'];
                                $data['user_name']      = $row[0]['user_name'];
                                $data['created_on']     = $row[0]['created_on'];
                                $data['items']          = $row;
                                $printer                = $row[0]['printer_name'];

                                $this->PrintKot($printer, $data, 'occupy');
                            }
                        }
                        if($retail_id != 0){
                            $log = array(
                                'action' => "Retail order KOT " . $kot->display_number . " has been send",
                                'type' => "order"
                            );
                            Notify::auditLog($log);

                            foreach($items as $item):
                                $batch[] = [$kot->id, $item['item_id'], $item['price'], $item['quantity'], $item['type']];

                                $tmp_item = TempItems::find()->WHERE(['retail_id' => $retail_id , 'item_id' => $item['item_id'], 'type' => $item['type']])->one();
                                if($tmp_item != null){
                                    $tmp_item['quantity'] = $tmp_item['quantity'] + $item['quantity'];
                                    $tmp_item->update();
                                }else{
                                    $batch_temp[] = [$retail_id, $item['item_id'], $item['quantity'], $item['price'], $item['type']];
                                }
                            endforeach;

                            Query::batchInsert('kot_items', array('kot_id', 'item_id', 'price', 'quantity', 'type'), $batch);

                            if($batch_temp != null){
                                Query::batchInsert('temp_items', array('retail_id', 'item_id', 'quantity', 'price', 'type'), $batch_temp);
                            }

                            $temp_items= Query::queryAllSecure("SELECT t.*, m.id as item_id, m.slug , m.price, m.name , m.is_discountable , si.id as special_item_id, si.name as special_item_name, si.price as special_item_price 
                                                    FROM temp_items as t
                                                    LEFT JOIN menu_item as m ON m.id = t.item_id
                                                    LEFT JOIN special_order_items as si ON si.id = t.item_id
                                                    WHERE t.retail_id = :retail_id",[':retail_id'=>$retail_id]);

                            $retail = Retail::find()->WHERE(['id' => $retail_id])->one();
                            if($retail != null){
                                if($retail->status == 1){
                                    $retail->status = 0;
                                }
                                $retail->update();
                            } 

                            $kot_category_data = Query::queryAllSecure("SELECT k.display_number, k.created_on, kt.quantity, kt.type as item_type, si.name as special_item_name, si.remarks as special_item_remarks, mi.name, mi.slug, mc.category, p.name as bill_type, p.printer_name, u.name as user_name
                                                            FROM kot as k
                                                            LEFT JOIN `kot_items` as kt ON kt.kot_id = k.id
                                                            LEFT JOIN `menu_item` as mi ON mi.id = kt.item_id 
                                                            LEFT JOIN `special_order_items` as si ON si.id = kt.item_id
                                                            LEFT JOIN `menu_category` as mc ON (mi.category_id = mc.id AND kt.type = ".Yii::$app->params['item_type']['regular'].") OR (si.category_id = mc.id AND kt.type = ".Yii::$app->params['item_type']['special'].")
                                                            LEFT JOIN `printers` as p ON mc.bill_type = p.id
                                                            LEFT JOIN `user` AS u ON u.id = k.created_by
                                                            WHERE k.id = :kot_id 
                                                                AND k.retail_id = :retail_id",
                                                                [':kot_id'=>$kot_id,':retail_id'=>$retail_id]);
                
                            $kot_category = '';
                            if ($kot_category_data != null) {
                                foreach($kot_category_data as $row) {
                                    $kot_category[$row['bill_type']][] = $row;
                                }
                            }

                            foreach ($kot_category as $category => $row) {
                                $data['table_name']     = '';
                                $data['section_name']   = '';
                                $data['kot_number']     = $row[0]['display_number'];
                                $data['user_name']      = $row[0]['user_name'];
                                $data['created_on']     = $row[0]['created_on'];
                                $data['items']          = $row;
                                $printer                = $row[0]['printer_name'];

                                $this->PrintKot($printer, $data, 'retail');
                            }
                        }
                        if($take_away_id != 0){

                            $log = array(
                                'action' => "Take away order KOT " . $kot->display_number . " has been send",
                                'type' => "order"
                            );
                            Notify::auditLog($log);

                           foreach($items as $item):
                                $batch[] = [$kot->id, $item['item_id'], $item['price'], $item['quantity'], $item['type']];

                                $tmp_item = TempItems::find()->WHERE(['take_away_id' => $take_away_id , 'item_id' => $item['item_id'], 'type' => $item['type']])->one();
                                if($tmp_item != null){
                                    $tmp_item['quantity'] = $tmp_item['quantity'] + $item['quantity'];
                                    $tmp_item->update();
                                }else{
                                    $batch_temp[] = [$take_away_id, $item['item_id'], $item['quantity'], $item['price'], $item['type']];
                                }
                            endforeach;

                            Query::batchInsert('kot_items', array('kot_id', 'item_id', 'price', 'quantity', 'type'), $batch);

                            if($batch_temp != null){
                                Query::batchInsert('temp_items', array('take_away_id', 'item_id', 'quantity', 'price', 'type'), $batch_temp);
                            }

                            $temp_items= Query::queryAllSecure("SELECT t.*, m.id as item_id, m.slug , m.price, m.name , m.is_discountable , si.id as special_item_id, si.name as special_item_name, si.price as special_item_price 
                                                    FROM temp_items as t
                                                    LEFT JOIN menu_item as m ON m.id = t.item_id
                                                    LEFT JOIN special_order_items as si ON si.id = t.item_id
                                                    WHERE t.take_away_id = :take_away_id",
                                                        [':take_away_id'=>$take_away_id]);

                            $take_away = TakeAway::find()->WHERE(['id' => $take_away_id])->one();
                            if($take_away != null){
                                if($take_away->status == 1){
                                    $take_away->status = 0;
                                }
                                $take_away->update();
                            } 

                            $kot_category_data = Query::queryAllSecure("SELECT k.display_number, k.created_on, kt.quantity, kt.type as item_type, si.name as special_item_name, si.remarks as special_item_remarks, mi.name, mi.slug, mc.category, p.name as bill_type, p.printer_name, u.name as user_name
                                                            FROM kot as k
                                                            LEFT JOIN `kot_items` as kt ON kt.kot_id = k.id
                                                            LEFT JOIN `menu_item` as mi ON mi.id = kt.item_id 
                                                            LEFT JOIN `special_order_items` as si ON si.id = kt.item_id
                                                            LEFT JOIN `menu_category` as mc ON (mi.category_id = mc.id AND kt.type = ".Yii::$app->params['item_type']['regular'].") OR (si.category_id = mc.id AND kt.type = ".Yii::$app->params['item_type']['special'].")
                                                            LEFT JOIN `printers` as p ON mc.bill_type = p.id
                                                            LEFT JOIN `user` AS u ON u.id = k.created_by
                                                            WHERE k.id = :kot_id 
                                                                AND k.take_away_id = :take_away_id", 
                                                                [':kot_id'=>$kot_id,
                                                                ':take_away_id'=>$take_away_id]);
                
                            $kot_category = '';
                            if ($kot_category_data != null) {
                                foreach($kot_category_data as $row) {
                                    $kot_category[$row['bill_type']][] = $row;
                                }
                            }

                            foreach ($kot_category as $category => $row) {
                                $data['table_name']     = '';
                                $data['section_name']   = '';
                                $data['kot_number']     = $row[0]['display_number'];
                                $data['user_name']      = $row[0]['user_name'];
                                $data['created_on']     = $row[0]['created_on'];
                                $data['items']          = $row;
                                $printer                = $row[0]['printer_name'];

                                $this->PrintKot($printer, $data, 'take_away');
                            }
                        }
                        if($pick_up_id != 0){

                            $log = array(
                                'action' => "Pick Up order KOT " . $kot->display_number . " has been send",
                                'type' => "order"
                            );
                            Notify::auditLog($log);

                           foreach($items as $item):
                                $batch[] = [$kot->id, $item['item_id'], $item['price'], $item['quantity'], $item['type']];

                                $tmp_item = TempItems::find()->WHERE(['pick_up_id' => $pick_up_id , 'item_id' => $item['item_id'], 'type' => $item['type']])->one();
                                if($tmp_item != null){
                                    $tmp_item['quantity'] = $tmp_item['quantity'] + $item['quantity'];
                                    $tmp_item->update();
                                }else{
                                    $batch_temp[] = [$pick_up_id, $item['item_id'], $item['quantity'], $item['price'], $item['type']];
                                }
                            endforeach;

                            Query::batchInsert('kot_items', array('kot_id', 'item_id', 'price', 'quantity', 'type'), $batch);

                            if($batch_temp != null){
                                Query::batchInsert('temp_items', array('pick_up_id', 'item_id', 'quantity', 'price', 'type'), $batch_temp);
                            }

                            $temp_items= Query::queryAllSecure("SELECT t.*, m.id as item_id, m.slug , m.price, m.name , m.is_discountable , si.id as special_item_id, si.name as special_item_name, si.price as special_item_price 
                                                    FROM temp_items as t
                                                    LEFT JOIN menu_item as m ON m.id = t.item_id
                                                    LEFT JOIN special_order_items as si ON si.id = t.item_id
                                                    WHERE t.pick_up_id = :pick_up_id",
                                                        [':pick_up_id'=>$pick_up_id]);

                            $pick_up = PickUp::find()->WHERE(['id' => $pick_up_id])->one();
                            if($pick_up != null){
                                if($pick_up->status == 1){
                                    $pick_up->status = 0;
                                }
                                $pick_up->update();
                            } 

                            $kot_category_data = Query::queryAllSecure("SELECT k.display_number, k.created_on, kt.quantity, kt.type as item_type, si.name as special_item_name, si.remarks as special_item_remarks, mi.name, mi.slug, mc.category, p.name as bill_type, p.printer_name, u.name as user_name
                                                            FROM kot as k
                                                            LEFT JOIN `kot_items` as kt ON kt.kot_id = k.id
                                                            LEFT JOIN `menu_item` as mi ON mi.id = kt.item_id 
                                                            LEFT JOIN `special_order_items` as si ON si.id = kt.item_id
                                                            LEFT JOIN `menu_category` as mc ON (mi.category_id = mc.id AND kt.type = ".Yii::$app->params['item_type']['regular'].") OR (si.category_id = mc.id AND kt.type = ".Yii::$app->params['item_type']['special'].")
                                                            LEFT JOIN `printers` as p ON mc.bill_type = p.id
                                                            LEFT JOIN `user` AS u ON u.id = k.created_by
                                                            WHERE k.id = :kot_id 
                                                                AND k.pick_up_id = :pick_up_id",
                                                                [':kot_id'=>$kot_id,
                                                                ':pick_up_id'=>$pick_up_id]);
                
                            $kot_category = '';
                            if ($kot_category_data != null) {
                                foreach($kot_category_data as $row) {
                                    $kot_category[$row['bill_type']][] = $row;
                                }
                            }

                            foreach ($kot_category as $category => $row) {
                                $data['table_name']     = '';
                                $data['section_name']   = '';
                                $data['kot_number']     = $row[0]['display_number'];
                                $data['user_name']      = $row[0]['user_name'];
                                $data['created_on']     = $row[0]['created_on'];
                                $data['items']          = $row;
                                $printer                = $row[0]['printer_name'];

                                $this->PrintKot($printer, $data, 'pick_up');
                            }
                        }
                        if($delivery_id != 0){

                            $log = array(
                                'action' => "Delivery order KOT " . $kot->display_number . " has been send",
                                'type' => "order"
                            );
                            Notify::auditLog($log);

                           foreach($items as $item):
                                $batch[] = [$kot->id, $item['item_id'], $item['price'], $item['quantity'], $item['type']];

                                $tmp_item = TempItems::find()->WHERE(['delivery_id' => $delivery_id , 'item_id' => $item['item_id'], 'type' => $item['type']])->one();
                                if($tmp_item != null){
                                    $tmp_item['quantity'] = $tmp_item['quantity'] + $item['quantity'];
                                    $tmp_item->update();
                                }else{
                                    $batch_temp[] = [$delivery_id, $item['item_id'], $item['quantity'], $item['price'], $item['type']];
                                }
                            endforeach;

                            Query::batchInsert('kot_items', array('kot_id', 'item_id', 'price', 'quantity', 'type'), $batch);

                            if($batch_temp != null){
                                Query::batchInsert('temp_items', array('delivery_id', 'item_id', 'quantity', 'price', 'type'), $batch_temp);
                            }

                            $temp_items= Query::queryAllSecure("SELECT t.*, m.id as item_id, m.slug , m.price, m.name , m.is_discountable , si.id as special_item_id, si.name as special_item_name, si.price as special_item_price 
                                                    FROM temp_items as t
                                                    LEFT JOIN menu_item as m ON m.id = t.item_id
                                                    LEFT JOIN special_order_items as si ON si.id = t.item_id
                                                    WHERE t.delivery_id = :delivery_id",
                                                        [':delivery_id'=>$delivery_id]);

                            $delivery = Delivery::find()->WHERE(['id' => $delivery_id])->one();
                            if($delivery != null){
                                if($delivery->status == 1){
                                    $delivery->status = 0;
                                }
                                $delivery->update();
                            } 

                            $kot_category_data = Query::queryAllSecure("SELECT k.display_number, k.created_on, kt.quantity, kt.type as item_type, si.name as special_item_name, si.remarks as special_item_remarks, mi.name, mi.slug, mc.category, p.name as bill_type, p.printer_name, u.name as user_name
                                                            FROM kot as k
                                                            LEFT JOIN `kot_items` as kt ON kt.kot_id = k.id
                                                            LEFT JOIN `menu_item` as mi ON mi.id = kt.item_id 
                                                            LEFT JOIN `special_order_items` as si ON si.id = kt.item_id
                                                            LEFT JOIN `menu_category` as mc ON (mi.category_id = mc.id AND kt.type = ".Yii::$app->params['item_type']['regular'].") OR (si.category_id = mc.id AND kt.type = ".Yii::$app->params['item_type']['special'].")
                                                            LEFT JOIN `printers` as p ON mc.bill_type = p.id
                                                            LEFT JOIN `user` AS u ON u.id = k.created_by
                                                            WHERE k.id = :kot_id 
                                                                AND k.delivery_id = :delivery_id",
                                                                [':kot_id'=>$kot_id,
                                                                ':delivery_id'=>$delivery_id]);
                
                            $kot_category = '';
                            if ($kot_category_data != null) {
                                foreach($kot_category_data as $row) {
                                    $kot_category[$row['bill_type']][] = $row;
                                }
                            }

                            foreach ($kot_category as $category => $row) {
                                $data['table_name']     = '';
                                $data['section_name']   = '';
                                $data['kot_number']     = $row[0]['display_number'];
                                $data['user_name']      = $row[0]['user_name'];
                                $data['created_on']     = $row[0]['created_on'];
                                $data['items']          = $row;
                                $printer                = $row[0]['printer_name'];

                                $this->PrintKot($printer, $data, 'delivery');
                            }
                        }

                        echo json_encode(array('status'             => 'true' ,
                                                'occupy_id'         => $occupy_id,
                                                'retail_id'         => $retail_id, 
                                                'take_away_id'      => $take_away_id, 
                                                'pick_up_id'        => $pick_up_id, 
                                                'delivery_id'       => $delivery_id,
                                                'kot_id'            => $kot_id,
                                                'kot_date'          => $kot_date,
                                                'kot_no'            => $kot_no,
                                                'temp_items'        => $temp_items,
                                                'kot_category'      => $kot_category,
                                                'kot_category_count'=> count($kot_category)
                                                )); die;
                    }
                } 
            }
            echo json_encode(false); die;
        }
    }

    public function actionReturn()
    {
        $latest = Misc::getLatestDate();
        if($latest != '' &&  date('Y-m-d') < $latest['latest_date'] ) { 
            echo json_encode(false); die;
        } else {
            if (Yii::$app->request->isAjax && isset($_POST['items']) && $_POST['items'] != null) {
                $retail_id      = ($_POST['retail_id'] != null) ? $_POST['retail_id'] : '0';
                $take_away_id   = ($_POST['take_away_id'] != null) ? $_POST['take_away_id'] : '0';
                $pick_up_id     = ($_POST['pick_up_id'] != null) ? $_POST['pick_up_id'] : '0';
                $occupy_id      = ($_POST['occupy_id'] != null) ? $_POST['occupy_id'] : '0';
                $delivery_id    = ($_POST['delivery_id'] != null) ? $_POST['delivery_id'] : '0';
                $items          = $_POST['items']; 
                $kot_category   = '';
                
                foreach($items as $key => $val):
                    $kot_id = $key;
                    $kot_temp = Query::queryOneSecure("SELECT display_number FROM `kot` WHERE id = :id",[':id'=>$kot_id]);

                    foreach($val as $item) :
                        if ($item['quantity'] > 0) {
                            $item_ids[]                 = $item['item'];
                            $item_qty[$item['item']]    = $item['quantity'];
                            $item_price[$item['item']]  = $item['price'];
                            $item_type[$item['item']]   = $item['type'];
                        }
                    endforeach;

                    if(isset($item_ids) && $item_ids != '') {
                        if ($item_ids != null) {
                            $user = User::findOne(Yii::$app->session['eHhupx5UpkLZoXRP_cR1ozEVjY14zWOC0_user']->id);
                            
                            $kot = new Kot();
                            $kot->table_id        = ($_POST['table_id'] != null) ? $_POST['table_id'] : '0';
                            $kot->floor_id        = ($_POST['floor_id'] != null) ? $_POST['floor_id'] : '0';
                            $kot->occupy_id       = $occupy_id;
                            $kot->retail_id    = $retail_id;
                            $kot->take_away_id    = $take_away_id;
                            $kot->pick_up_id      = $pick_up_id;
                            $kot->delivery_id     = $delivery_id;
                            $kot->created_on      = date('Y-m-d H:i:s');
                            $kot->created_by      = Yii::$app->session['eHhupx5UpkLZoXRP_cR1ozEVjY14zWOC0_user']->id;
                            $kot->status          = Yii::$app->params['kot_status']['return'];
                            $kot->return_against  = $kot_id;
                            $kot->return_against_display_number  = $kot_temp['display_number'];
                            $kot->return_note     = ($_POST['kot_return_note'] != null) ? htmlspecialchars(trim($_POST['kot_return_note']), ENT_QUOTES) : '';
                            if ($kot->save()) {

                                $return_kot_id  = $kot->id;
                                $kot_date       = $kot->created_on;
                                $batch_temp     = [];
                                $batch          = [];

                                if($occupy_id != 0){
                                    foreach($item_ids as $id):
                                        $batch[] = [ $kot->id, $id, $item_price[$id], $item_qty[$id], $item_type[$id] ];

                                        $tmp_item = TempItems::find()->WHERE(['occupy_id' => $occupy_id , 'item_id' => $id, 'type' => $item_type[$id]])->one();
                                        if($tmp_item != null){
                                            $tmp_item['quantity'] = $tmp_item['quantity'] - $item_qty[$id];
                                            if($tmp_item['quantity'] == 0 || $tmp_item['quantity'] < 0) {
                                                Query::executeSecure("DELETE FROM `temp_items` WHERE id = :id",[':id'=>$tmp_item['id']]);
                                            }else{
                                                $tmp_item->update();
                                            }
                                        }

                                        $tmp_kot_item = KotItems::find()->WHERE([ 'kot_id' => $kot_id , 'item_id' => $id, 'type' => $item_type[$id] ])->one();
                                        if($tmp_kot_item != null){
                                            $tmp_kot_item['returned_quantity'] = $tmp_kot_item['returned_quantity'] + $item_qty[$id];
                                            $tmp_kot_item->update();
                                        }
                                    endforeach;
                                    
                                    Query::batchInsert('kot_items', array('kot_id', 'item_id', 'price', 'quantity', 'type'), $batch);

                                    $kot_category_data = Query::queryAllSecure("SELECT k.*, kt.quantity, kt.type as item_type, si.name as special_item_name, si.remarks as special_item_remarks, mi.name, mi.slug, mc.category, p.name as bill_type, p.printer_name, td.table_name, f.name as section_name, u.name as user_name
                                                        FROM kot as k
                                                        LEFT JOIN `kot_items` as kt ON kt.kot_id = k.id
                                                        LEFT JOIN `menu_item` as mi ON mi.id = kt.item_id 
                                                        LEFT JOIN `special_order_items` as si ON si.id = kt.item_id 
                                                        LEFT JOIN `menu_category` as mc ON (mi.category_id = mc.id AND kt.type = ".Yii::$app->params['item_type']['regular'].") OR (si.category_id = mc.id AND kt.type = ".Yii::$app->params['item_type']['special'].")
                                                        LEFT JOIN `printers` as p ON mc.bill_type = p.id
                                                        LEFT JOIN `table_details` as td ON td.id = k.table_id
                                                        LEFT JOIN `floor` as f ON k.floor_id = f.id
                                                        LEFT JOIN `user` AS u ON u.id = k.created_by
                                                        WHERE k.id = :kot_id 
                                                            AND k.occupy_id = :occupy_id",
                                                            [':kot_id'=>$return_kot_id,
                                                            ':occupy_id'=>$occupy_id]);
                                 
                                    if ($kot_category_data != null) {
                                        foreach($kot_category_data as $row) {
                                            $kot_category[$row['bill_type']][$row['return_against_display_number']][] = $row;
                                        }
                                    }
                                }
                                if($retail_id != 0){
                                    foreach($item_ids as $id):
                                         $batch[] = [ $kot->id, $id, $item_price[$id], $item_qty[$id], $item_type[$id] ];
 
                                         $tmp_item = TempItems::find()->WHERE(['retail_id' => $retail_id , 'item_id' => $id, 'type' => $item_type[$id] ])->one();
 
                                         if($tmp_item != null){
                                             $tmp_item['quantity'] = $tmp_item['quantity'] - $item_qty[$id];
                                             if($tmp_item['quantity'] == 0 || $tmp_item['quantity'] < 0) {
                                                 Query::executeSecure("DELETE FROM `temp_items` WHERE id = :id",[':id'=>$tmp_item['id']]);
                                             }else{
                                                 $tmp_item->update();
                                             }
                                         }
 
                                         $tmp_kot_item = KotItems::find()->WHERE(['kot_id' => $kot_id , 'item_id' => $id, 'type' => $item_type[$id]])->one();
                                         if($tmp_kot_item != null){
                                             $tmp_kot_item['returned_quantity'] = $tmp_kot_item['returned_quantity'] + $item_qty[$id];
                                             $tmp_kot_item->update();
                                         }
                                     endforeach;
 
                                     Query::batchInsert('kot_items', array('kot_id', 'item_id', 'price', 'quantity', 'type'), $batch);
 
                                     $retail = Retail::find()->WHERE(['id' => $retail_id])->one();
                                     if($retail != null){
                                         if($retail->status == 1){
                                             $retail->status = 0;
                                         }
                                         $retail->update();
                                     } 
 
                                     $kot_category_data = Query::queryAllSecure("SELECT k.*, kt.quantity, kt.type as item_type, si.name as special_item_name, si.remarks as special_item_remarks, mi.name, mi.slug, mc.category, p.name as bill_type, p.printer_name, td.table_name, f.name as section_name, u.name as user_name
                                                         FROM kot as k
                                                         LEFT JOIN `kot_items` as kt ON kt.kot_id = k.id
                                                         LEFT JOIN `menu_item` as mi ON mi.id = kt.item_id 
                                                         LEFT JOIN `special_order_items` as si ON si.id = kt.item_id 
                                                         LEFT JOIN `menu_category` as mc ON (mi.category_id = mc.id AND kt.type = ".Yii::$app->params['item_type']['regular'].") OR (si.category_id = mc.id AND kt.type = ".Yii::$app->params['item_type']['special'].")
                                                         LEFT JOIN `printers` as p ON mc.bill_type = p.id
                                                         LEFT JOIN `table_details` as td ON k.table_id = td.id
                                                         LEFT JOIN `floor` as f ON k.floor_id = f.id
                                                         LEFT JOIN `user` AS u ON u.id = k.created_by
                                                         WHERE k.id = :kot_id 
                                                            AND k.retail_id = :retail_id",
                                                            [':kot_id'=>$return_kot_id,
                                                            ':retail_id'=>$retail_id]);
                                     
                                     if ($kot_category_data != null) {
                                         foreach($kot_category_data as $row) {
                                             $kot_category[$row['bill_type']][$row['return_against_display_number']][] = $row;
                                         }
                                     }
                                 }
                                if($take_away_id != 0){
                                   foreach($item_ids as $id):
                                        $batch[] = [ $kot->id, $id, $item_price[$id], $item_qty[$id], $item_type[$id] ];

                                        $tmp_item = TempItems::find()->WHERE(['take_away_id' => $take_away_id , 'item_id' => $id, 'type' => $item_type[$id] ])->one();

                                        if($tmp_item != null){
                                            $tmp_item['quantity'] = $tmp_item['quantity'] - $item_qty[$id];
                                            if($tmp_item['quantity'] == 0 || $tmp_item['quantity'] < 0) {
                                                Query::executeSecure("DELETE FROM `temp_items` WHERE id = :id",[':id'=>$tmp_item['id']]);
                                            }else{
                                                $tmp_item->update();
                                            }
                                        }

                                        $tmp_kot_item = KotItems::find()->WHERE(['kot_id' => $kot_id , 'item_id' => $id, 'type' => $item_type[$id]])->one();
                                        if($tmp_kot_item != null){
                                            $tmp_kot_item['returned_quantity'] = $tmp_kot_item['returned_quantity'] + $item_qty[$id];
                                            $tmp_kot_item->update();
                                        }
                                    endforeach;

                                    Query::batchInsert('kot_items', array('kot_id', 'item_id', 'price', 'quantity', 'type'), $batch);

                                    $take_away = TakeAway::find()->WHERE(['id' => $take_away_id])->one();
                                    if($take_away != null){
                                        if($take_away->status == 1){
                                            $take_away->status = 0;
                                        }
                                        $take_away->update();
                                    } 

                                    $kot_category_data = Query::queryAllSecure("SELECT k.*, kt.quantity, kt.type as item_type, si.name as special_item_name, si.remarks as special_item_remarks, mi.name, mi.slug, mc.category, p.name as bill_type, p.printer_name, td.table_name, f.name as section_name, u.name as user_name
                                                        FROM kot as k
                                                        LEFT JOIN `kot_items` as kt ON kt.kot_id = k.id
                                                        LEFT JOIN `menu_item` as mi ON mi.id = kt.item_id 
                                                        LEFT JOIN `special_order_items` as si ON si.id = kt.item_id 
                                                        LEFT JOIN `menu_category` as mc ON (mi.category_id = mc.id AND kt.type = ".Yii::$app->params['item_type']['regular'].") OR (si.category_id = mc.id AND kt.type = ".Yii::$app->params['item_type']['special'].")
                                                        LEFT JOIN `printers` as p ON mc.bill_type = p.id
                                                        LEFT JOIN `table_details` as td ON k.table_id = td.id
                                                        LEFT JOIN `floor` as f ON k.floor_id = f.id
                                                        LEFT JOIN `user` AS u ON u.id = k.created_by
                                                        WHERE k.id = :kot_id 
                                                            AND k.take_away_id = :take_away_id",
                                                            [':kot_id'=>$return_kot_id,
                                                            ':take_away_id'=>$take_away_id]);
                                    
                                    if ($kot_category_data != null) {
                                        foreach($kot_category_data as $row) {
                                            $kot_category[$row['bill_type']][$row['return_against_display_number']][] = $row;
                                        }
                                    }
                                }
                                if($pick_up_id != 0){
                                   foreach($item_ids as $id):
                                        $batch[] = [ $kot->id, $id, $item_price[$id], $item_qty[$id], $item_type[$id] ];

                                        $tmp_item = TempItems::find()->WHERE(['pick_up_id' => $pick_up_id , 'item_id' => $id, 'type' => $item_type[$id] ])->one();

                                        if($tmp_item != null){
                                            $tmp_item['quantity'] = $tmp_item['quantity'] - $item_qty[$id];
                                            if($tmp_item['quantity'] == 0 || $tmp_item['quantity'] < 0) {
                                                Query::executeSecure("DELETE FROM `temp_items` WHERE id = :id",[':id'=>$tmp_item['id']]);
                                            }else{
                                                $tmp_item->update();
                                            }
                                        }

                                        $tmp_kot_item = KotItems::find()->WHERE(['kot_id' => $kot_id , 'item_id' => $id, 'type' => $item_type[$id]])->one();
                                        if($tmp_kot_item != null){
                                            $tmp_kot_item['returned_quantity'] = $tmp_kot_item['returned_quantity'] + $item_qty[$id];
                                            $tmp_kot_item->update();
                                        }
                                    endforeach;

                                    Query::batchInsert('kot_items', array('kot_id', 'item_id', 'price', 'quantity', 'type'), $batch);

                                    $pick_up = PickUp::find()->WHERE(['id' => $pick_up_id])->one();
                                    if($pick_up != null){
                                        if($pick_up->status == 1){
                                            $pick_up->status = 0;
                                        }
                                        $pick_up->update();
                                    } 

                                    $kot_category_data = Query::queryAllSecure("SELECT k.*, kt.quantity, kt.type as item_type, si.name as special_item_name, si.remarks as special_item_remarks, mi.name, mi.slug, mc.category, p.name as bill_type, p.printer_name, td.table_name, f.name as section_name, u.name as user_name
                                                        FROM kot as k
                                                        LEFT JOIN `kot_items` as kt ON kt.kot_id = k.id
                                                        LEFT JOIN `menu_item` as mi ON mi.id = kt.item_id 
                                                        LEFT JOIN `special_order_items` as si ON si.id = kt.item_id 
                                                        LEFT JOIN `menu_category` as mc ON (mi.category_id = mc.id AND kt.type = ".Yii::$app->params['item_type']['regular'].") OR (si.category_id = mc.id AND kt.type = ".Yii::$app->params['item_type']['special'].")
                                                        LEFT JOIN `printers` as p ON mc.bill_type = p.id
                                                        LEFT JOIN `table_details` as td ON k.table_id = td.id
                                                        LEFT JOIN `floor` as f ON k.floor_id = f.id
                                                        LEFT JOIN `user` AS u ON u.id = k.created_by
                                                        WHERE k.id = :kot_id 
                                                            AND k.pick_up_id = :pick_up_id",
                                                            [':kot_id'=>$return_kot_id,
                                                            ':pick_up_id'=>$pick_up_id]);
                                    
                                    if ($kot_category_data != null) {
                                        foreach($kot_category_data as $row) {
                                            $kot_category[$row['bill_type']][$row['return_against_display_number']][] = $row;
                                        }
                                    }
                                }
                                if($delivery_id != 0){
                                   foreach($item_ids as $id):
                                        $batch[] = [ $kot->id, $id, $item_price[$id], $item_qty[$id], $item_type[$id] ];

                                        $tmp_item = TempItems::find()->WHERE(['delivery_id' => $delivery_id , 'item_id' => $id, 'type' => $item_type[$id] ])->one();
                                        if($tmp_item != null){
                                            $tmp_item['quantity'] = $tmp_item['quantity'] - $item_qty[$id];
                                            if($tmp_item['quantity'] == 0 || $tmp_item['quantity'] < 0) {
                                                Query::executeSecure("DELETE FROM `temp_items` WHERE id = :id",[':id'=>$tmp_item['id']]);
                                            }else{
                                                $tmp_item->update();
                                            }
                                        }

                                        $tmp_kot_item = KotItems::find()->WHERE(['kot_id' => $kot_id , 'item_id' => $id, 'type' => $item_type[$id]])->one();
                                        if($tmp_kot_item != null){
                                            $tmp_kot_item['returned_quantity'] = $tmp_kot_item['returned_quantity'] + $item_qty[$id];
                                            $tmp_kot_item->update();
                                        }
                                    endforeach;

                                    Query::batchInsert('kot_items', array('kot_id', 'item_id', 'price', 'quantity', 'type'), $batch);

                                    $delivery = Delivery::find()->WHERE(['id' => $delivery_id])->one();
                                    if($delivery != null){
                                        if($delivery->status == 1){
                                            $delivery->status = 0;
                                        }
                                        $delivery->update();
                                    } 

                                    $kot_category_data = Query::queryAllSecure("SELECT k.*, kt.quantity, kt.type as item_type, si.name as special_item_name, si.remarks as special_item_remarks, mi.name, mi.slug, mc.category, p.name as bill_type, p.printer_name, td.table_name, f.name as section_name, u.name as user_name
                                                        FROM kot as k
                                                        LEFT JOIN `kot_items` as kt ON kt.kot_id = k.id
                                                        LEFT JOIN `menu_item` as mi ON mi.id = kt.item_id 
                                                        LEFT JOIN `special_order_items` as si ON si.id = kt.item_id 
                                                        LEFT JOIN `menu_category` as mc ON (mi.category_id = mc.id AND kt.type = ".Yii::$app->params['item_type']['regular'].") OR (si.category_id = mc.id AND kt.type = ".Yii::$app->params['item_type']['special'].")
                                                        LEFT JOIN `printers` as p ON mc.bill_type = p.id
                                                        LEFT JOIN `table_details` as td ON k.table_id = td.id
                                                        LEFT JOIN `floor` as f ON k.floor_id = f.id
                                                        LEFT JOIN `user` AS u ON u.id = k.created_by
                                                        WHERE k.id = :kot_id 
                                                            AND k.delivery_id = :delivery_id",
                                                            [':kot_id'=>$return_kot_id,
                                                            ':delivery_id'=>$delivery_id]);
                        
                                    if ($kot_category_data != null) {
                                        foreach($kot_category_data as $row) {
                                            $kot_category[$row['bill_type']][$row['return_against_display_number']][] = $row;
                                        }
                                    }
                                }
                            }
                        } 
                        $item_ids       = [];
                        $item_qty       = [];
                        $item_type      = [];
                    }
                endforeach;

                if($kot_category != '') {
                    foreach ($kot_category as $category => $row) {
                        $data['content'] = $row;
                        if($occupy_id != 0){
                            $order_type = 'occupy';
                        }
                        if($retail_id != 0){
                            $order_type = 'retail';
                         }
                        if($take_away_id != 0){
                           $order_type = 'take_away';
                        }
                        if($pick_up_id != 0){
                           $order_type = 'pick_up';
                        }
                        if($delivery_id != 0){
                           $order_type = 'delivery';
                        }
                        foreach($row as $key => $val) {
                            $printer = $val[0]['printer_name'];
                            $data['return_note']    = $val[0]['return_note'];
                            $data['table_name']     = $val[0]['table_name'];
                            $data['section_name']   = $val[0]['section_name'];
                            break;
                        }
                        $this->PrintKotReturn($printer, $data, $order_type);
                    }

                    echo json_encode(array('status'             => 'true' ,
                                            'occupy_id'         => $occupy_id,
                                            'retail_id'         => $retail_id, 
                                            'take_away_id'      => $take_away_id, 
                                            'pick_up_id'        => $pick_up_id,
                                            'delivery_id'       => $delivery_id,
                                            'kot_category'      => $kot_category,
                                            'kot_category_count'=> count($kot_category)
                                            )); die;
                }
            }
            echo json_encode(false); die;
        }
    }

    public function actionDelete()
    {
        $latest = Misc::getLatestDate();
        if($latest != '' &&  date('Y-m-d') < $latest['latest_date'] ) { 
            echo json_encode(false); die;
        } else {
            if (Yii::$app->request->isAjax && isset($_POST) && $_POST['kotID'] != null) {

                Query::executeSecure("DELETE FROM kot WHERE id = :id",[':id'=>htmlspecialchars(trim($_POST['kotID']), ENT_QUOTES)]);
                Query::executeSecure("DELETE FROM kot_items WHERE kot_id = :kot_id",[':kot_id'=>htmlspecialchars(trim($_POST['kotID']), ENT_QUOTES)]);

                echo json_encode(true); die;
            }
            echo json_encode(false); die;
        }
    }

    public function actionGetKotList()
    {
        if(Yii::$app->request->isAjax && isset($_POST) && $_POST['occupy_id'] != null) {

            $kot = Query::queryAllSecure("SELECT * FROM `kot` WHERE occupy_id = :id",[':id'=>$_POST['occupy_id']]);

            echo json_encode(array('status' => true ,
                                    'kot'   => $kot)); die;
        }
        echo json_encode(false); die;
    }
    
    public static function PrintKot($printer, $data, $order_type) 
    {
        return true;
        die;
        if($printer != null && $data != null) {
            $handle = printer_open($printer);
            if(!$handle || $handle == NULL)
            {
                return false;
            }
            else
            {
                $settings = HSettings::getBasic("'name-in-bill'");

                printer_start_doc($handle, "Truffle Bill Print");
                printer_start_page($handle);

                $font = printer_create_font("Arial", 17, 8, PRINTER_FW_THIN, false, false, false, 0);
                printer_select_font($handle, $font);

                $x = 100;
                printer_draw_text($handle, $settings['name-in-bill'], 80, $x);
                $x=$x+40;

                if($order_type == 'occupy') {
                    printer_draw_text($handle, "Section", 10, $x);
                    printer_draw_text($handle, ":", 80, $x);
                    printer_draw_text($handle, $data['section_name'], 100, $x);
                    $x=$x+20;

                    printer_draw_text($handle, "Table", 10, $x);
                    printer_draw_text($handle, ":", 80, $x);
                    printer_draw_text($handle, $data['table_name'], 100, $x);
                    $x=$x+20;
                }

                printer_draw_text($handle, "KOT no", 10, $x);
                printer_draw_text($handle, ":", 80, $x);
                printer_draw_text($handle, $data['kot_number'], 100, $x);
                $x=$x+40;

                printer_draw_text($handle, "- - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -", 10, $x); 
                $x=$x+20;

                printer_draw_text($handle, "SN.", 10, $x);
                printer_draw_text($handle, "PARTICULARS", 45, $x);
                printer_draw_text($handle, "QTY.", 350, $x);
                $x=$x+20;
                printer_draw_text($handle, "- - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -", 10, $x);
                $x=$x+20;

                $i=0;
                
                foreach($data['items'] as $item) :
                    $i++;
                    printer_draw_text($handle, $i, 10, $x);

                    if($item['item_type'] == Yii::$app->params['item_type']['special']) {
                        $item_name = 'Special-item('.$item['special_item_name'].')';
                        $remarks = 'REMARKS : '.$item['special_item_remarks'].')';
                        if(strlen($item_name) > 30) {
                            printer_draw_text($handle, substr($item_name,0,30), 45, $x);
                        }else {
                            printer_draw_text($handle, $item_name, 30, $x);
                        }
                    }else {
                        $item_name = $item['name'];
                        if(strlen($item_name) > 30) {
                            printer_draw_text($handle, substr($item_name,0,30), 45, $x);
                        }else {
                            printer_draw_text($handle, $item_name, 30, $x);
                        }
                    }

                    printer_draw_text($handle, $item['quantity'], 350, $x);
                    $x=$x+20;

                    if($item['item_type'] == Yii::$app->params['item_type']['special']) {
                        $remarks = 'REMARKS : '.$item['special_item_remarks'].')';
                        if(strlen($remarks) > 30) {
                            printer_draw_text($handle, substr($remarks,0,30), 45, $x);
                            $x=$x+20;
                        }else {
                            printer_draw_text($handle, $remarks, 30, $x);
                            $x=$x+20;
                        }
                    }
                endforeach;
                
                printer_draw_text($handle, "- - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -", 10, $x);
                $x=$x+20;

                printer_draw_text($handle, "CREATED BY : ".$data['user_name'], 10, $x);   
                $x=$x+20;

                printer_draw_text($handle, "CREATED ON : ".$data['created_on'], 10, $x);
                $x=$x+20;

                printer_delete_font($font);

                printer_end_page($handle);
                printer_end_doc($handle);
                printer_close($handle);

                return true;
            }
        }
    }

    public static function PrintKotReturn($printer, $data, $order_type) 
    {
        if($printer != null && $data != null) {
            $handle = printer_open($printer);
            if(!$handle || $handle == NULL)
            {
                return false;
            }
            else
            {
                $settings = HSettings::getBasic("'name-in-bill'");

                printer_start_doc($handle, "Truffle Bill Print");
                printer_start_page($handle);

                $font = printer_create_font("Arial", 17, 8, PRINTER_FW_THIN, false, false, false, 0);
                printer_select_font($handle, $font);

                $x = 20;
                printer_draw_text($handle, $settings['name-in-bill'], 80, $x);
                $x=$x+20;

                printer_draw_text($handle, "KOT RETURN", 90, $x);
                $x=$x+20;

                if($order_type == 'occupy') {
                    printer_draw_text($handle, "Section", 10, $x);
                    printer_draw_text($handle, ":", 80, $x);
                    printer_draw_text($handle, $data['section_name'], 100, $x);
                    $x=$x+20;

                    printer_draw_text($handle, "Table", 10, $x);
                    printer_draw_text($handle, ":", 80, $x);
                    printer_draw_text($handle, $data['table_name'], 100, $x);
                    $x=$x+20;
                }

                printer_draw_text($handle, "- - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -", 10, $x); 
                $x=$x+20;

                foreach($data['content'] as $key => $row) {
                    printer_draw_text($handle, "KOT No.   :".$key, 10, $x);
                    $x=$x+20;

                    printer_draw_text($handle, "SN.", 10, $x);
                    printer_draw_text($handle, "Item Name", 45, $x);
                    printer_draw_text($handle, "QTY.", 350, $x);
                    $x=$x+20;

                    printer_draw_text($handle, "- - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -", 10, $x);
                    $x=$x+20;

                    $i=0;
                    foreach ($row as $item) {
                        $i++;
                        printer_draw_text($handle, $i, 10, $x);

                        if($item['item_type'] == Yii::$app->params['item_type']['special']) {
                            $item_name = 'Special-item('.$item['name'].')';
                            if(strlen($item_name) > 30) {
                                printer_draw_text($handle, substr($item_name,0,30), 45, $x);
                            }else {
                                printer_draw_text($handle, $item_name, 30, $x);
                            }
                        }else {
                            $item_name = $item['name'];
                            if(strlen($item_name) > 30) {
                                printer_draw_text($handle, substr($item_name,0,30), 45, $x);
                            }else {
                                printer_draw_text($handle, $item_name, 30, $x);
                            }
                        }

                        printer_draw_text($handle, $item['quantity'], 350, $x);
                        $x=$x+20;
                    }

                    printer_draw_text($handle, "- - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -", 10, $x);
                    $x=$x+20;
                }

                printer_draw_text($handle, "NOTE :", 10, $x);
                $x=$x+20;

                if(strlen($data['return_note']) > 52) {
                    for($i=0; $i <= strlen($data['return_note']); $i=$i+52) {
                        printer_draw_text($handle, substr($data['return_note'],$i,52), 10, $x);
                        $x=$x+20; 
                    } 
                }else {
                    printer_draw_text($handle, $data['return_note'] , 10, $x);  
                    $x=$x+20; 
                }

                printer_draw_text($handle, "- - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -", 10, $x);
                $x=$x+20;

                printer_draw_text($handle, "CREATED BY : ".Yii::$app->session['eHhupx5UpkLZoXRP_cR1ozEVjY14zWOC0_user']->username, 10, $x);   
                $x=$x+20;

                printer_draw_text($handle, "CREATED ON : ".date('Y-m-d H:i:s'), 10, $x);
                $x=$x+20;

                printer_delete_font($font);

                printer_end_page($handle);
                printer_end_doc($handle);
                printer_close($handle);

                return true;
            }
        }
    }
}