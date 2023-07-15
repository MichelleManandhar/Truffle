<?php

namespace app\components;

use Yii;
use yii\base\Component;

use app\models\User;

class UniqueUser extends Component {

	public static function checkUniqueLogin ()
    {
        if(isset(Yii::$app->session['eHhupx5UpkLZoXRP_cR1ozEVjY14zWOC0_user'])) {

            $user = User::find()->WHERE(['id' => Yii::$app->session['eHhupx5UpkLZoXRP_cR1ozEVjY14zWOC0_user']->id])->one();
            if($user->encrypt != Yii::$app->session['eHhupx5UpkLZoXRP_cR1ozEVjY14zWOC0_user']->encrypt) {
                return true;
            }else{
                return false;
            }
            
        }else{
            return true;
        }
    }
    
}
?>