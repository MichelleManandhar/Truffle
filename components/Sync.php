<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Sync
 *
 * @author gaurav maharjan
 */

namespace app\components;

use Yii;
use yii\base\Component;

class Sync extends Component {

	public static function set_bool($type)
	{
		$json_file = Yii::getAlias("@webroot/assets/json/".$type.".json");
		$json_array = json_decode(file_get_contents($json_file), true);
		$json_array['bool'] = "1";					

		$fp = fopen($json_file, 'w');
        fwrite($fp, json_encode($json_array));
        fclose($fp); 
	}

	public static function set_obstacle_data($id, $action)
	{
		$json_file = Yii::getAlias("@webroot/assets/json/obstacle.json");
		$json_array = json_decode(file_get_contents($json_file), true);	
	
		$current_ip = self::get_client_ip();	

		$ip_file = Yii::getAlias("@webroot/assets/json/ip.json");
		$ip_array = json_decode(file_get_contents($ip_file), true);	

		foreach($ip_array['login'] as $ip => $val) :
			if ($current_ip != $ip) {
				$json_array['bool'][$ip] = "1";
				$json_array['data'][$id][$ip][$action] = "1";
				if ($action == 'create') {
					$json_array['data'][$id][$ip]['update'] = "0";
					$json_array['data'][$id][$ip]['remove'] = "0";
				}
			}
		endforeach;

		$fp = fopen($json_file, 'w');
        fwrite($fp, json_encode($json_array));
        fclose($fp); 
	}

	public static function set_table_data($id, $action, $to='')
	{
		$json_file = Yii::getAlias("@webroot/assets/json/table.json");
		$json_array = json_decode(file_get_contents($json_file), true);

		$current_ip = self::get_client_ip();	

		$ip_file = Yii::getAlias("@webroot/assets/json/ip.json");
		$ip_array = json_decode(file_get_contents($ip_file), true);	

		foreach($ip_array['login'] as $ip => $val) :
			if ($current_ip != $ip) {
				$json_array['bool'][$ip] = "1";
				$json_array['data'][$id][$ip][$action] = "1";
				
				if ($action == 'create') {
					$json_array['data'][$id][$ip]['update'] = "0";
					$json_array['data'][$id][$ip]['remove'] = "0";
					$json_array['data'][$id][$ip]['occupy'] = "0";
					$json_array['data'][$id][$ip]['close'] = "0";
					$json_array['data'][$id][$ip]['move_occupy'] = "0";
					$json_array['data'][$id][$ip]['move_occupy_to'] = "0";
				}
				else if ($action == 'move_occupy') {
					$json_array['data'][$id][$ip]['move_occupy_to'] = $to;
				}
			}
		endforeach;	

		$fp = fopen($json_file, 'w');
        fwrite($fp, json_encode($json_array));
        fclose($fp); 
	}

	public static function set_table_unmerge_data()
	{
		$json_file = Yii::getAlias("@webroot/assets/json/unmerge-table.json");
		$json_array = json_decode(file_get_contents($json_file), true);

		$current_ip = self::get_client_ip();	

		$ip_file = Yii::getAlias("@webroot/assets/json/ip.json");
		$ip_array = json_decode(file_get_contents($ip_file), true);	

		foreach($ip_array['login'] as $ip => $val) :
			if ($current_ip != $ip) {
				$json_array['bool'][$ip] = "1";
			}
		endforeach;	

		$fp = fopen($json_file, 'w');
        fwrite($fp, json_encode($json_array));
        fclose($fp); 
	}

	public static function get_client_request_ip() 
	{
	    $ipaddress = '';
	    if (isset($_SERVER['HTTP_CLIENT_IP']))
	        $ipaddress = $_SERVER['HTTP_CLIENT_IP'];
	    else if(isset($_SERVER['HTTP_X_FORWARDED_FOR']))
	        $ipaddress = $_SERVER['HTTP_X_FORWARDED_FOR'];
	    else if(isset($_SERVER['HTTP_X_FORWARDED']))
	        $ipaddress = $_SERVER['HTTP_X_FORWARDED'];
	    else if(isset($_SERVER['HTTP_FORWARDED_FOR']))
	        $ipaddress = $_SERVER['HTTP_FORWARDED_FOR'];
	    else if(isset($_SERVER['HTTP_FORWARDED']))
	        $ipaddress = $_SERVER['HTTP_FORWARDED'];
	    else if(isset($_SERVER['REMOTE_ADDR']))
	        $ipaddress = $_SERVER['REMOTE_ADDR'];
	    else
	        $ipaddress = 'UNKNOWN';
	    return $ipaddress;
	}

	public static function get_client_ip()
	{
		$ip = self::get_client_request_ip();
		if ($ip == '::1') {
			$ip = gethostbyname(gethostname());
		}
		return $ip;
	}
}

