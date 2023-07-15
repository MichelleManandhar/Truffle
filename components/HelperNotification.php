<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Helper for main page
 *
 * @author sugen
 */

namespace app\components;

use Yii;
use yii\base\Component;
use app\components\Query;
use app\components\Misc;
use app\components\HelperSettings as HSettings;

class HelperNotification extends Component {

    public static function getNotification() {
        $settings = HSettings::getBasic("'member-birthday-reminder-day'");
        $birthday_count = Query::queryOne("SELECT COUNT(id) as count FROM `member` WHERE MONTH(date_of_birth) = ".date('m')." AND ((DAY(date_of_birth) - ".date('d').") <= ".$settings['member-birthday-reminder-day']." AND (DAY(date_of_birth) - ".date('d').") >= 0)");
        $member_threshold_exceeded = Query::queryOne("SELECT COUNT(id) as count FROM `member` WHERE current_threshold_exceeded = 1");
        $member_threshold_end_exceeded = Query::queryOne("SELECT COUNT(id) as count FROM `member` WHERE current_threshold_end_exceeded = 1");

        return array('birthday_count'=>$birthday_count,
    				'member_threshold_exceeded'=>$member_threshold_exceeded,
    				'member_threshold_end_exceeded'=>$member_threshold_end_exceeded);
    }
}