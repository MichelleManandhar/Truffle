<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Cipher
 *
 * @author gaurav maharjan
 */

namespace app\components;

use Yii;
use yii\base\Component;

class Cipher extends Component {

	private static $mode = 'MCRYPT_BLOWFISH';
	private static $key = '%^xc(aI&&@QdSmX9#!70Sb2Yv^$)_D9+C41H';

	public static function encrypt($buffer, $salt)
	{
		$key 				= self::$key . $salt;
	    $iv                 = mcrypt_create_iv(mcrypt_get_iv_size(constant(self::$mode), MCRYPT_MODE_ECB), MCRYPT_RAND); 
	    $passcrypt  		= mcrypt_encrypt(constant(self::$mode), $key, $buffer, MCRYPT_MODE_ECB, $iv); 
	    $encode         	= base64_encode($passcrypt); 
	    return $encode; 
	}

	public static function decrypt($buffer, $salt)
	{
		$key 				= self::$key . $salt;
	    $decoded        	= base64_decode($buffer); 
	    $iv                 = mcrypt_create_iv(mcrypt_get_iv_size(constant(self::$mode), MCRYPT_MODE_ECB), MCRYPT_RAND); 
	    $decrypted  		= mcrypt_decrypt(constant(self::$mode), $key, $decoded, MCRYPT_MODE_ECB, $iv);
	    return $decrypted;
	}
}
?>