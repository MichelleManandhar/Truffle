<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;
use yii\web\HttpException;

use app\components\Misc;
use app\components\Query;
use app\components\HelperMenuCategory as HCategory;
use app\components\HelperSettings as HSettings;
use app\components\HelperMember as HMember;

use app\models\Member;
use app\models\MemberPrivillegeThreshold;

class MemberController extends Controller {

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
        $members = Query::queryAll("SELECT m.*, u.username 
                                    FROM `member` as m
                                    LEFT JOIN `user` as u 
                                        ON u.id = m.created_by");

        $settings = HSettings::getBasic("'member-birthday-reminder-day'");
        $birthday_count = Query::queryOne("SELECT COUNT(id) as count FROM `member` WHERE MONTH(date_of_birth) = ".date('m')." AND ((DAY(date_of_birth) - ".date('d').") <= ".$settings['member-birthday-reminder-day']." AND (DAY(date_of_birth) - ".date('d').") >= 0)");

        return $this->render('index', array('members' => $members, 
                                            'birthday_count'    => $birthday_count
                                        ));
    }

    public function actionMembershipDiscountSetting()
    {
        $categories = HCategory::getMenuCategories();
        $member_discount = Query::queryAll("SELECT md.discount_allowed, md.category_id, mc.category
                                                FROM `member_discount` as md
                                                LEFT JOIN `menu_category` as mc 
                                                    ON mc.id = md.category_id");
        return $this->render('discount-setting', array('categories' => $categories, 'member_discount' => $member_discount));
    }

    public function actionSetMembershipDiscount()
    {
        if(Yii::$app->request->isAjax && isset($_POST)) {
            if(array_key_exists("category",$_POST) && $_POST['category'] != '') {
                Query::execute("DELETE FROM `member_discount`");
                $batch = '';
                foreach($_POST['category'] as $cate) :
                    if($cate['discount'] != null && $cate['discount'] > 0) {
                        $batch[] = [$cate['category_id'], $cate['discount']];
                    }
                endforeach;

                if($batch != null) {
                    Query::batchInsert('member_discount', array('category_id', 'discount_allowed'), $batch);
                }

                echo json_encode(true); die;
            }
        }
        echo json_encode(false); die;
    }

    public function check($field, $value, $id)
    {
        $condition = $id > 0 ? " AND `id` != $id" : ""; 
        $type = Misc::clean_text($value);
        $data = Query::queryOne("SELECT id FROM `member` WHERE `$field` = '$value' $condition");
        return Misc::if_exists($data);
    }

    public function actionCheckMembershipNumber()
    {
        if (Yii::$app->request->isAjax && isset($_POST['membership_number'])) {
            if(array_key_exists('member_id', $_POST) && Misc::if_exists($_POST['member_id'])){
                echo json_encode(!$this->check('membership_number', $_POST['membership_number'], $_POST['member_id'])); die;
            }else{
                echo json_encode(!$this->check('membership_number', $_POST['membership_number'], 0)); die;
            }
        }
        echo json_encode(FALSE); die;
    }

    public function actionCheckMembershipPhone()
    {
        if (Yii::$app->request->isAjax && isset($_POST['phone'])) {
            if(array_key_exists('member_id', $_POST) && Misc::if_exists($_POST['member_id'])){
                echo json_encode(!$this->check('phone', $_POST['phone'], $_POST['member_id'])); die;
            }else{
                echo json_encode(!$this->check('phone', $_POST['phone'], 0)); die;
            }
        }
        echo json_encode(FALSE); die;
    }

    public function actionGetCategoryList()
    {
        if(Yii::$app->request->isAjax) {
            $categories = Query::queryAll("SELECT id as category_id, category FROM `menu_category`");
            echo json_encode($categories); die;
        }
        echo json_encode(false); die;
    }

    public function actionGetMemberDiscount()
    {
        if(Yii::$app->request->isAjax) {
            if(isset($_POST) && array_key_exists("membership_number",$_POST) && $_POST['membership_number'] != '') {

                $member = Query::queryOne("SELECT * FROM `member` WHERE (membership_number = '" . $_POST['membership_number'] . "' || phone = '" . $_POST['membership_number'] . "' ) AND ('".date('Y-m-d') ."' >= DATE(issued_date) AND '".date('Y-m-d') ."' <= DATE(valid_date))");

                if($member != null) {
                    $item_ids = implode("','",$_POST['item_ids']);

                    $member_discount = Query::queryAll("SELECT md.discount_allowed, md.category_id, mc.category
                                                    FROM `member_discount` as md
                                                    LEFT JOIN `menu_category` as mc 
                                                        ON mc.id = md.category_id");

                    $discount_allowed_category_ids = [];
                    foreach($member_discount as $mem_dis) {
                        $discount_allowed_category_ids[] = $mem_dis['category_id'];
                    }
                    if($discount_allowed_category_ids != '') {
                        $category_ids = implode("','",$discount_allowed_category_ids);

                        $discount_allowed_category_detail = Query::queryAll("SELECT mc.id as category_id, mc.category, mi.id as item_id , mi.price
                                                            FROM `menu_category` as mc 
                                                            LEFT JOIN `menu_item` as mi 
                                                                ON mi.category_id = mc.id 
                                                            WHERE mc.id IN ('".$category_ids."')
                                                                AND mi.id IN ('".$item_ids."')");
                        $category_detail = '';
                        $i=0;
                        foreach ($discount_allowed_category_detail as $dis) { $i++;
                            $category_detail[$i] = $dis;
                            foreach ($member_discount as $mem_dis) {
                                if($dis['category_id'] == $mem_dis['category_id']) {
                                    $category_detail[$i]['discount_allowed'] = $mem_dis['discount_allowed'];
                                } 
                            }
                        }

                        echo json_encode(array('member' => $member , 'category_detail' => $category_detail)); die;
                    }else {
                        echo json_encode(false); die;
                    }

                    echo json_encode(array('member' => $member , 'category_detail' => $category_detail)); die;
                }else{
                    echo json_encode(array('error' => 'not_valid','msg' => 'member number is not valid')); die;
                }
            }else {

                $member_discount = Query::queryAll("SELECT md.discount_allowed, md.category_id, mc.category
                                                FROM `member_discount` as md
                                                LEFT JOIN `menu_category` as mc 
                                                    ON mc.id = md.category_id");

                echo json_encode(array('member_discount' => $member_discount)); die;
            }
        }
        echo json_encode(false); die;
    }

    public function actionCreate()
    {
        $categories = HCategory::getMenuCategories();
        return $this->render('create', array('categories' => $categories));
    }

    public function actionAdd()
    {
        if(Yii::$app->request->isAjax && isset($_POST)) {
            $member = new Member();
            $member->name = ($_POST['name'] != null) ? htmlspecialchars(trim($_POST['name']), ENT_QUOTES) : '';
            $member->phone = ($_POST['phone'] != null) ? htmlspecialchars(trim($_POST['phone']), ENT_QUOTES) : '';
            $member->email = ($_POST['email'] != null) ? htmlspecialchars(trim($_POST['email']), ENT_QUOTES) : '';
            $member->membership_number = ($_POST['membership_number'] != null) ? htmlspecialchars(trim($_POST['membership_number']), ENT_QUOTES) : '';
            $member->membership_type = ($_POST['membership_type'] != null) ? htmlspecialchars(trim($_POST['membership_type']), ENT_QUOTES) : '';
            $member->membership_fee = ($_POST['membership_fee'] != null) ? htmlspecialchars(trim($_POST['membership_fee']), ENT_QUOTES) : 0;
            $member->date_of_birth = ($_POST['date_of_birth'] != null) ? date('Y-m-d', strtotime($_POST['date_of_birth'])) : '';
            $member->issued_date = ($_POST['issued_date'] != null) ? date('Y-m-d', strtotime($_POST['issued_date'])) : '';
            $member->valid_date = ($_POST['valid_date'] != null) ? date('Y-m-d', strtotime($_POST['valid_date'])) : '';
            $member->is_active = ($_POST['is_active'] != null) ? $_POST['is_active'] : '';
            $member->created_on = date('Y-m-d H:i:s');
            $member->created_by = Yii::$app->session['eHhupx5UpkLZoXRP_cR1ozEVjY14zWOC0_user']->id;
            if($member->save()) {
                echo json_encode(true); die;
            }else {
                echo json_encode(false); die;
            }
        }
        echo json_encode(false); die;
    }

    public function actionView($id)
    {
        $member = Query::queryOneSecure("SELECT * FROM `member` WHERE id = :id",[':id'=>htmlspecialchars($id, ENT_QUOTES)]);

        return $this->render('view', array('member' => $member));
    }

    public function actionEdit($id)
    {
        $member = Query::queryOneSecure("SELECT * FROM `member` WHERE id = :id",[':id'=>htmlspecialchars($id, ENT_QUOTES)]);
        
        return $this->render('edit', array('member' => $member));
    }

    public function actionUpdate()
    {
        if(Yii::$app->request->isAjax && isset($_POST)) {
            
            $member = Member::find()->WHERE(['id' => $_POST['member_id']])->One();

            $member->name = ($_POST['name'] != null) ? htmlspecialchars(trim($_POST['name']), ENT_QUOTES) : '';
            $member->phone = ($_POST['phone'] != null) ? htmlspecialchars(trim($_POST['phone']), ENT_QUOTES) : '';
            $member->email = ($_POST['email'] != null) ? htmlspecialchars(trim($_POST['email']), ENT_QUOTES) : '';
            $member->membership_number = ($_POST['membership_number'] != null) ? htmlspecialchars(trim($_POST['membership_number']), ENT_QUOTES) : '';
            $member->membership_type = ($_POST['membership_type'] != null) ? htmlspecialchars(trim($_POST['membership_type']), ENT_QUOTES) : '';
            $member->date_of_birth = ($_POST['date_of_birth'] != null) ? date('Y-m-d', strtotime($_POST['date_of_birth'])) : '';
            $member->issued_date = ($_POST['issued_date'] != null) ? date('Y-m-d', strtotime($_POST['issued_date'])) : '';
            $member->valid_date = ($_POST['valid_date'] != null) ? date('Y-m-d', strtotime($_POST['valid_date'])) : '';
            $member->is_active = ($_POST['is_active'] != null) ? $_POST['is_active'] : '';
            $member->created_on = date('Y-m-d H:i:s');
            $member->created_by = Yii::$app->session['eHhupx5UpkLZoXRP_cR1ozEVjY14zWOC0_user']->id;
            if($member->update()) {
                echo json_encode(true); die;
            }else {
                echo json_encode(false); die;
            }
        }
        echo json_encode(false); die;
    }

    public function actionReport($id)
    {
        $member = Query::queryOneSecure("SELECT m.*, u.username 
                                    FROM `member` as m
                                    LEFT JOIN `user` as u 
                                        ON u.id = m.created_by
                                    WHERE m.id = :id",[':id'=>htmlspecialchars($id, ENT_QUOTES)]);

        $condition = '';
        if (isset($_GET['from']) && $_GET['from'] != '') {
            $condition .= " AND DATE(mr.created_on) >= '".htmlspecialchars($_GET['from'], ENT_QUOTES)."'";
            if (isset($_GET['to']) && $_GET['to'] != '') {
                $condition .= " AND DATE(mr.created_on) <= '".htmlspecialchars($_GET['to'], ENT_QUOTES)."'";
            }else{
                $condition .= " AND DATE(mr.created_on) <= '". date('Y-m-d', strtotime('-30 days'))."'";
            }
        }
        else if ((!isset($_GET['from']) || $_GET['from'] != '') && isset($_GET['to']) && $_GET['to'] != '') {
            $condition .= " AND DATE(mr.created_on) <= '".htmlspecialchars($_GET['to'], ENT_QUOTES)."'";
        }

        $member_report = Query::queryAll("SELECT mr.member_id, moc.discount_rate, moc.discount_amount, moc.total, mc.id as category_id , mc.category , mr.created_on, o.invoice_no
                                            FROM `member_report` as mr 
                                            LEFT JOIN `member_order_category` as moc 
                                                ON mr.id = moc.member_report_id
                                            LEFT JOIN `menu_category` as mc 
                                                ON mc.id = moc.category_id
                                            LEFT JOIN `order` as o
                                                ON o.id = mr.order_id
                                            WHERE mr.member_id = $id 
                                            $condition
                                            ");

        return $this->render('report', array(
                                        'member' => $member , 
                                        'member_report' => $member_report
                                        ));
    }

    public function actionPrivillegeThreshold()
    {
        $threshold = Query::queryAll("SELECT mpt.*, u.username 
                                        FROM `member_privillege_threshold` as mpt
                                        LEFT JOIN `user` as u 
                                            ON u.id = mpt.created_by");
        return $this->render('view-privillege-threshold',array('threshold'=>$threshold));
    }

    public function actionSetPrivillegeThreshold() 
    {
        if(isset($_POST) && $_POST != null) {
            $old_threshold = MemberPrivillegeThreshold::find()->orderBy(['id' => SORT_DESC])->one();
            if($old_threshold != null) {
                $old_threshold->till_date = date('Y-m-d H:i:s');
                $old_threshold->update();
            }
            $threshold = new MemberPrivillegeThreshold();
            $threshold->amount = (isset($_POST['threshold_amount']) && $_POST['threshold_amount']) ? htmlspecialchars($_POST['threshold_amount'], ENT_QUOTES) : '0';
            $threshold->end_amount = (isset($_POST['threshold_end_amount']) && $_POST['threshold_end_amount']) ? htmlspecialchars($_POST['threshold_end_amount'], ENT_QUOTES) : '0';
            $threshold->created_on = date('Y-m-d H:i:s');
            $threshold->created_by = Yii::$app->session['eHhupx5UpkLZoXRP_cR1ozEVjY14zWOC0_user']->id;
            if($threshold->save()){
                return $this->redirect(Yii::$app->request->baseUrl.'/member/privillege-threshold');
            }
        }
        throw new HttpException(404,'Page Not Found');
    }

    public function actionViewThresholdData()
    {
        if(isset($_POST) && $_POST != null) {
            $return = HMember::getMemberThreshold($_POST['member']);
            $member = Query::queryOneSecure("SELECT id, threshold_claimed, threshold_end_claimed, current_threshold_exceeded, current_threshold_end_exceeded FROM `member` WHERE id = :id",[':id' => htmlspecialchars($_POST['member'], ENT_QUOTES)]);
            echo json_encode(array('member'             => $member,
                                    'threshold_count'   => $return['threshold_count'],
                                    'threshold_end_count' => $return['threshold_end_count'],
                                    'order_amount'      => $return['order_amount'],
                                    'threshold_amount'  => $return['threshold_amount'],
                                    'threshold_remaining_amount' => $return['threshold_remaining_amount'],
                                    'threshold_end_amount'  => $return['threshold_end_amount'],
                                    'threshold_end_remaining_amount' => $return['threshold_end_remaining_amount']
                                )); die;
        }
        throw new HttpException(404,'Page Not Found');
    }

    public function actionClaimThreshold($id)
    {
        if(isset($id) && $id != null) {
            $member = Member::findOne($id);
            if($member != null) {
                $member->current_threshold_exceeded = 0;
                $member->threshold_claimed = $member->threshold_claimed + 1;
                if($member->update()) {
                    return $this->redirect(Yii::$app->request->baseUrl.'/member');
                }
            }
        }
        throw new HttpException(404,'Page Not Found');
    }

    public function actionUnclaimThreshold($id)
    {
        if(isset($id) && $id != null) {
            $member = Member::findOne($id);
            if($member != null) {
                $member->current_threshold_exceeded = 0;
                if($member->update()) {
                    return $this->redirect(Yii::$app->request->baseUrl.'/member');
                }
            }
        }
        throw new HttpException(404,'Page Not Found');
    }

    public function actionClaimThresholdEnd($id)
    {
        if(isset($id) && $id != null) {
            $member = Member::findOne($id);
            if($member != null) {
                $member->current_threshold_end_exceeded = 0;
                $member->threshold_end_claimed = $member->threshold_end_claimed + 1;
                if($member->update()) {
                    return $this->redirect(Yii::$app->request->baseUrl.'/member');
                }
            }
        }
        throw new HttpException(404,'Page Not Found');
    }

    public function actionUnlaimThresholdEnd($id)
    {
        if(isset($id) && $id != null) {
            $member = Member::findOne($id);
            if($member != null) {
                $member->current_threshold_end_exceeded = 0;
                if($member->update()) {
                    return $this->redirect(Yii::$app->request->baseUrl.'/member');
                }
            }
        }
        throw new HttpException(404,'Page Not Found');
    }

    public function actionSetThresholdExceeded()
    {
        if(isset($_POST) && $_POST != null) {
            $return = HMember::getMemberThreshold($_POST['member']);
            $member = Member::findOne($_POST['member']);
            if($member != null && $return != false) {
                $threshold_amount_exceeded = 0;
                $threshold_end_amount_exceeded = 0;
                if($_POST['current_paid_amount'] >= $return['threshold_remaining_amount']) {
                    $threshold_amount_exceeded = 1;
                    $member->current_threshold_exceeded = 1;
                }
                if($_POST['current_paid_amount'] >= $return['threshold_end_remaining_amount']) {
                    $threshold_end_amount_exceeded = 1;
                    $member->current_threshold_end_exceeded = 1;
                }

                $member->update();

                echo json_encode(array('threshold_count' => $return['threshold_count'],
                                        'threshold_end_count' => $return['threshold_end_count'],
                                        'order_amount' => $return['order_amount'],
                                        'threshold_amount' => $return['threshold_amount'],
                                        'threshold_remaining_amount' => $return['threshold_remaining_amount'],
                                        'threshold_end_amount' => $return['threshold_end_amount'],
                                        'threshold_end_remaining_amount' => $return['threshold_end_remaining_amount'],
                                        'threshold_amount_exceeded' => $threshold_amount_exceeded,
                                        'threshold_end_amount_exceeded' => $threshold_end_amount_exceeded
                                    )); die;
            }
            echo json_encode(false); die;
        }
        throw new HttpException(404,'Page Not Found');
    }

    public function actionThresholdReport()
    {
        $latest_threshold = Query::queryOne("SELECT * FROM `member_privillege_threshold` ORDER BY id DESC");

        $members_threshold = Query::queryAll("SELECT m.id as member_id, m.name ,m.threshold_claimed, m.threshold_end_claimed , o.total as total, mpt.amount as threshold_amount, mpt.end_amount as threshold_end_amount 
                                    FROM `member` as m
                                    LEFT JOIN `order` as o
                                        ON o.member_id = m.id
                                    LEFT JOIN `member_privillege_threshold` as mpt
                                        ON mpt.id = o.privillege_threshold_id
                                    ORDER BY m.id, o.created_on");
        foreach($members_threshold as $threshold) {
            $new_threshold[$threshold['member_id']][] = $threshold; 
        }
        
        if($latest_threshold != null) {
            $threshold_amount = $latest_threshold['amount'];
            $threshold_end_amount = $latest_threshold['end_amount'];
        }else {
            $threshold_amount = 0;
            $threshold_end_amount = 0;
        }
        if($new_threshold != null) {
            foreach($new_threshold as $key => $th) {
                $data[$key]['member_id'] = $th[0]['member_id'];
                $data[$key]['member_name'] = $th[0]['name'];
                $data[$key]['threshold_claimed'] = $th[0]['threshold_claimed'];
                $data[$key]['threshold_end_claimed'] = $th[0]['threshold_end_claimed'];
                $data[$key]['order_amount'] = 0;
                $data[$key]['threshold_count'] = 0;
                $data[$key]['threshold_end_count'] = 0;
                $data[$key]['to_be_threshold_amount'] = 0;
                $data[$key]['to_be_threshold_end_amount'] = 0;
                foreach($th as $row) {
                    $data[$key]['order_amount'] += $row['total'];
                    $data[$key]['to_be_threshold_amount'] += $row['total'];
                    $data[$key]['to_be_threshold_end_amount'] += $row['total'];
                    if($data[$key]['to_be_threshold_amount'] > $row['threshold_amount']) {
                        $data[$key]['threshold_count'] += 1;
                        $data[$key]['to_be_threshold_amount'] = $data[$key]['to_be_threshold_amount'] - $row['threshold_amount'];
                    }
                    if($data[$key]['to_be_threshold_end_amount'] > $row['threshold_end_amount']) {
                        $data[$key]['threshold_end_count'] += 1;
                        $data[$key]['to_be_threshold_end_amount'] = $data[$key]['to_be_threshold_end_amount'] - $row['threshold_end_amount'];
                    }
                }
            }
        }
        return $this->render('threshold-report',array('threshold' => $data,
                                                        'threshold_amount' => $threshold_amount,
                                                        'threshold_end_amount' => $threshold_end_amount 
                                                    ));
    }

    public function actionClaimRemainingThreshold()
    {
        if(Yii::$app->request->isAjax && isset($_POST) && $_POST != null) {
            $member = Member::findOne(htmlspecialchars($_POST['member'], ENT_QUOTES));
            if($member != null) {
                $member->threshold_claimed = $member->threshold_claimed + (isset($_POST['threshold_claim']) ? htmlspecialchars($_POST['threshold_claim'],ENT_QUOTES) : 0);
                $member->threshold_end_claimed = $member->threshold_end_claimed + (isset($_POST['threshold_end_claim']) ? htmlspecialchars($_POST['threshold_end_claim'],ENT_QUOTES) : 0);
                if($member->update()) {
                    echo json_encode(true); die;
                }
            }
            echo json_encode(false); die;
        }
        throw new HttpException(404,'Page Not Found'); 
    }

    public function actionBirthdays()
    {
        if(Yii::$app->request->isAjax && isset($_POST) && $_POST != null) {
            $birthdays = Query::queryAll("SELECT id, name, date_of_birth FROM `member`");
            if($birthdays != null) {
                $settings = HSettings::getBasic("'member-birthday-reminder-day'");
                $birthday_count = Query::queryAll("SELECT id FROM `member` WHERE MONTH(date_of_birth) = ".date('m')." AND ((DAY(date_of_birth) - ".date('d').") <= ".$settings['member-birthday-reminder-day']." AND (DAY(date_of_birth) - ".date('d').") >= 0)");

                foreach($birthdays as $key => $bday) {
                    $new_birthday[$key] = $bday;
                    $new_birthday[$key]['birthday_coming'] = 0;
                    foreach($birthday_count as $bdaycount) {
                        if($bday['id'] == $bdaycount['id']){
                            $new_birthday[$key]['birthday_coming'] = 1;
                        }
                    }
                }
                echo json_encode(array('birthdays'=>$new_birthday, 'reminder_day'=>$settings)); die;
            }
            echo json_encode(false); die;
        }
        throw new HttpException(404,'Page Not Found');
    }
}