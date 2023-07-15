<?php

namespace app\components;

use Yii;
use yii\base\Component;
use app\models\Tips;


class HelperTips extends Component 
{

    public static function addTips($tip_amount)
    {
    	$tip                = new Tips();
        $tip->amount        = $tip_amount;
        $tip->type          = Yii::$app->params['tip']['received'];
        $tip->created_on    = date('Y-m-d H:i:s');
        $tip->created_by    = Yii::$app->session['eHhupx5UpkLZoXRP_cR1ozEVjY14zWOC0_user']->id;
        if( $tip->save() ) {
        	return true;
        }
    }

}