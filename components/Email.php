<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Email functions
 *
 * @author gaurav maharjan
 */

namespace app\components;

use Yii;
use yii\base\Component;

class Email extends Component {

    public static function sendTo($email, $name, $subject, $msg)
    {
        $path = Yii::getAlias("@vendor/phpmailer/JPhpMailer.php");
        require_once($path); 

        $mail = new \JPhpMailer(); 

        //$mail->IsSMTP();          
        $mail->Host             = 'secure161.servconfig.com'; 
        $mail->Port             = 995;                                              //'465'/'995';  
        $mail->SMTPSecure       = 'tls';                                            //"ssl"/"tls";
        $mail->SMTPAuth         = true;  
        $mail->SMTPKeepAlive    = true; 
        $mail->SMTPDebug        = 0; 
        $mail->Mailer           = 'mail';                                           //"smtp"/"mail";   
        $mail->CharSet          = 'utf-8'; 
        $mail->ContentType      = 'text/html';                                     //'text/html';        

        $mail->From             = Yii::$app->params['email_config']['from'];
        $mail->FromName         = Yii::$app->params['email_config']['name']; 
        $mail->Username         = Yii::$app->params['email_config']['username']; 
        $mail->Password         = Yii::$app->params['email_config']['password'];       
        $mail->AltBody          = 'To view the message, please use an HTML compatible email viewer!!';
                   
        $mail->Subject = $subject;        
        $mail->MsgHTML($msg); 
        $mail->AddAddress($email, $name);           

        return $mail->send() ? TRUE :  FALSE; //$mail->ErrorInfo;
    }

    public static function sendReport($emails, $html)
    {
        $path = Yii::getAlias("@vendor/phpmailer/JPhpMailer.php");
        require_once($path); 

        $mail = new \JPhpMailer(); 

        // $mail->isSMTP(true);                     // Set mailer to use SMTP
        $mail->Host = 'smtp.gmail.com';             // Specify main and backup SMTP servers
        $mail->SMTPAuth = true;                     // Enable SMTP authentication
        $mail->SMTPSecure = 'tls';                  // Enable TLS encryption, `ssl` also accepted
        $mail->Port = 587;                          // TCP port to connect to
        
        // $mail->Username = Yii::$app->params['email_config']['username'];            // SMTP username
        // $mail->Password = Yii::$app->params['email_config']['password'];            // SMTP password
        $mail->setFrom(Yii::$app->params['email_config']['from'], Yii::$app->params['email_config']['name']);
         
        $mail->addReplyTo(Yii::$app->params['email_config']['from'], Yii::$app->params['email_config']['name']);
        
        if(array_key_exists('first', $emails)){
            $mail->addAddress($emails['first']); // Add a recipient
        }

        if(array_key_exists('second', $emails)){
            $mail->addCC($emails['second']); // Add a recipient
        }

        if(array_key_exists('third', $emails)){
            $mail->addCC($emails['third']); // Add a recipient
        }

        $mail->IsHTML(true);  // Set email format to HTML

        $bodyContent = 'Close day report for ' . date("l, d M, Y") . ' Submited By ' . ucwords(Yii::$app->session['eHhupx5UpkLZoXRP_cR1ozEVjY14zWOC0_user']->name);
        $bodyContent .= $html;

        $mail->Subject = 'Close Day Sales Report - ' . date('l, d M, Y');
        $mail->Body    = $bodyContent;

        if(!$mail->send()) {
            return false;
        } else {
            return true;
        }
    }
}