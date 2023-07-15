<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of settings
 *
 * @author gaurav maharjan
 */

namespace app\components;

use Yii;
use yii\base\Component;
use app\components\Query;
use app\components\Misc;
use app\models\Printers as Printers;

class HelperPrinter extends Component {

	public static function getPrinters($values)
    {	
        $printers = '';
        $data = Query::queryAll("SELECT * FROM `printers` WHERE `slug` IN ($values)");
        foreach($data as $row):
            $printers[$row['slug']] = trim($row['printer_name']);
        endforeach;
        return Misc::exists($printers, FALSE);
    }

    public static function getKotPrinters($values)
    {	
        $printers = '';
        $data = Query::queryAll("SELECT * FROM `printers` WHERE `slug` NOT IN ($values)");
        foreach($data as $row):
            $printers[$row['name']] = trim($row['printer_name']);
        endforeach;
        return Misc::exists($printers, FALSE);
    }

    public static function getKotBillType($values)
    {	
        $data = Query::queryAll("SELECT name FROM `printers` WHERE `slug` NOT IN ($values)");
        return Misc::exists($data, FALSE);
    }

    public static function getOthersPrinters($values)
    {	
        $printers = '';
        $data = Query::queryAll("SELECT * FROM `printers` WHERE `slug` NOT IN ($values)");
        foreach($data as $row):
            $printers[$row['slug']] = trim($row['printer_name']);
        endforeach;
        return Misc::exists($printers, FALSE);
    }

    public static function getCountOthersPrinters($values)
    {	
        $data = Query::queryOne("SELECT count(id) as total_other_print_type FROM `printers` WHERE `slug` NOT IN ($values)");
        return Misc::exists($data, FALSE);
    }

}