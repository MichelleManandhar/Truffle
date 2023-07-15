<?php
/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
$baseUrl = Yii::$app->request->baseUrl;
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
    <head>
        <meta charset="<?= Yii::$app->charset ?>">
        <?= Html::csrfMetaTags() ?>
        <link rel="icon" type="image/png" href="<?php echo $baseUrl; ?>/images/fav.ico">
        <title><?= Html::encode($this->title) ?></title>
        <?php $this->head() ?>
        <link rel="shortcut icon" sizes="192x192" href="<?php echo $baseUrl; ?>/assets/images/launcher-icon-4x.png">
        <link rel="icon" sizes="128x128" href="<?php echo $baseUrl; ?>/assets/images/launcher-icon-128x128.png">
        <link rel="apple-touch-icon" sizes="128x128" href="<?php echo $baseUrl; ?>/assets/images/launcher-icon-128x128.png">
        <link rel="apple-touch-icon-precomposed" sizes="128x128" href="<?php echo $baseUrl; ?>/assets/images/launcher-icon-128x128.png">
        <link rel="manifest" href="<?php echo $baseUrl; ?>/assets/json/manifest.json">
        <meta name="mobile-web-app-capable" content="yes">
        <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0">

        <link href='http://fonts.googleapis.com/css?family=Source+Sans+Pro:200,300,400,600,700,900,200italic,300italic,400italic,600italic,700italic,900italic' rel='stylesheet' type='text/css'>
        <link href='http://fonts.googleapis.com/css?family=Raleway:400,100,200,300,500,600,700,800,900' rel='stylesheet' type='text/css'>
        <link href='http://fonts.googleapis.com/css?family=Lato:400,900,700,300,100' rel='stylesheet' type='text/css'>
		<link href="<?php echo $baseUrl; ?>/assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <link href="<?php echo $baseUrl; ?>/assets/css/BootstrapXL.css" rel="stylesheet">
		<link href="<?php echo $baseUrl; ?>/assets/css/error-code.css" rel="stylesheet">
    </head>
    <body class="top-bar-header">
    <?php $this->beginBody() ?>

        <div id="wrapper">
			<?= $content ?>
		</div>

	<?php $this->endBody() ?>
    </body>
</html>
<?php $this->endPage() ?>