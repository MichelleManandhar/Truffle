<?php

namespace app\components;

use Yii;
use yii\base\Component;


class HelperMember extends Component {

    public static function getMemberThreshold($member_id) 
    {   
        $latest_threshold = Query::queryOne("SELECT * FROM `member_privillege_threshold` ORDER BY id DESC");
        $member_threshold = Query::queryAllSecure("SELECT m.id as member_id, o.total as total, mpt.amount as threshold_amount, mpt.end_amount as threshold_end_amount 
                                    FROM `member` as m
                                    LEFT JOIN `order` as o
                                        ON o.member_id = m.id
                                    LEFT JOIN `member_privillege_threshold` as mpt
                                        ON mpt.id = o.privillege_threshold_id
                                    WHERE m.id = :id
                                    ORDER BY m.id, o.created_on",[':id' => htmlspecialchars($member_id,ENT_QUOTES)]);
        if($member_threshold != null) {
            if($latest_threshold != null) {
                $threshold_amount = $latest_threshold['amount'];
                $threshold_end_amount = $latest_threshold['end_amount'];
            }else {
                $threshold_amount = 0;
                $threshold_end_amount = 0;
            }
            $order_amount = 0;
            $threshold_count = 0;
            $threshold_end_count = 0;
            $to_be_threshold_amount = 0;
            $to_be_threshold_end_amount = 0;
            if($member_threshold != null) {
                foreach($member_threshold as $row) {
                    $order_amount += $row['total'];
                    $to_be_threshold_amount += $row['total'];
                    $to_be_threshold_end_amount += $row['total'];
                    if($to_be_threshold_end_amount > $row['threshold_end_amount']) {
                        $threshold_end_count += 1;
                        $to_be_threshold_end_amount = $to_be_threshold_end_amount - $row['threshold_end_amount'];
                    }elseif($to_be_threshold_amount > $row['threshold_amount']) {
                        $threshold_count += 1;
                        $to_be_threshold_amount = $to_be_threshold_amount - $row['threshold_amount'];
                    }
                    
                }
            }
            return array('threshold_count' => $threshold_count,
                            'threshold_end_count' => $threshold_end_count,
                            'order_amount' => $order_amount,
                            'threshold_amount' => $threshold_amount,
                            'threshold_remaining_amount' => ($threshold_amount-$to_be_threshold_amount),
                            'threshold_end_amount' => $threshold_end_amount,
                            'threshold_end_remaining_amount' => ($threshold_end_amount-$to_be_threshold_end_amount)
                        );
        }
        return false;
    }
}