<?php
/* @var $this yii\web\View */
/* @var $name string */
/* @var $message string */
/* @var $exception Exception */

use yii\helpers\Html;
$baseUrl = Yii::$app->request->baseUrl;
$this->registerCssFile($baseUrl . '/assets/css/error-code.css');
$this->title = "Sorry";
?>

<div class="container margin-top-70">
    <div class="col-md-offset-1 col-md-5 margin-top-5">
        <h3>The date of this system is past date according to the latest date in this software.</h3>
        <h3>Thus, further processing cannot be done.</h3>
        <h3>Please correct your system date.</h3>
        <br>
        <p>Please try the following page.</p>
        <a class="btn btn-sm btn-primary" href="<?php echo $baseUrl;?>" role="button">Home</a>
    </div>

    <div class="col-md-6">
        <img src="<?php echo $baseUrl;?>/assets/images/gif-spanner.gif">
    </div>
</div>