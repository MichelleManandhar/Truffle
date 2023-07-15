<?php 
$baseUrl = Yii::$app->request->baseUrl;
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html class="no-js css-menubar" lang="en">

<meta http-equiv="content-type" content="text/html;charset=utf-8" />
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
  <meta name="description" content="bootstrap admin template">
  <meta name="author" content="">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
  <link rel="manifest" href="<?php echo $baseUrl; ?>/assets/json/manifest.json"> 
  <meta name="mobile-web-app-capable" content="yes">

  <title>Login | <?php echo Yii::$app->params['system'];?> - Restaurant Software</title>

  <link rel="apple-touch-icon" href="<?php echo Yii::$app->request->baseUrl?>/assets/images/apple-touch-icon.png">
  <link rel="shortcut icon" href="<?php echo Yii::$app->request->baseUrl?>/assets/images/fav-dark.png">

  <!-- Stylesheets -->
  <link rel="stylesheet" href="<?php echo Yii::$app->request->baseUrl?>/assets/css/bootstrap.min081a.css?v2.0.0">
  <link rel="stylesheet" href="<?php echo Yii::$app->request->baseUrl?>/assets/css/bootstrap-extend.min081a.css?v2.0.0">
  <link rel="stylesheet" href="<?php echo Yii::$app->request->baseUrl?>/assets/css/site.min081a.css?v2.0.0">

  <!-- Fonts -->
  <link rel='stylesheet' href='http://fonts.googleapis.com/css?family=Roboto:300,400,500,300italic'>
  <link rel="stylesheet" href="<?php echo Yii::$app->request->baseUrl?>/assets/fonts/web-icons/web-icons.min081a.css?v2.0.0">
  <link rel="stylesheet" href="<?php echo Yii::$app->request->baseUrl?>/assets/fonts/glyphicons/glyphicons.min081a.css">
  <link rel="stylesheet" href="<?php echo Yii::$app->request->baseUrl?>/assets/fonts/font-awesome/font-awesome.min081a.css"  type="text/css"/>
  <link rel="stylesheet" href="<?php echo Yii::$app->request->baseUrl?>/assets/fonts/themify/themify.min081a.css" rel="stylesheet" type="text/css"/>
  <link rel="stylesheet" type="text/css" href="<?php echo Yii::$app->request->baseUrl?>/assets/css/login-test.css"">
  <link rel="stylesheet" type="text/css" href="<?php echo Yii::$app->request->baseUrl?>/assets/css/responsive.css"">

  <link rel="stylesheet" type="text/css" href="<?php echo $baseUrl?>/assets/plugins/sweetalert/sweetalert.css">
  <link rel="stylesheet" type="text/css" href="<?php echo $baseUrl?>/assets/plugins/sweetalert/ie9.css" rel="stylesheet" media="screen">

  <!--[if lt IE 9]>
    <script src="type="text/javascript" src="<?php echo Yii::$app->request->baseUrl?>/global/vendor//html5shiv/html5shiv.min.js"></script>
    <![endif]-->

  <!--[if lt IE 10]>
    <script type="text/javascript" src="<?php echo Yii::$app->request->baseUrl?>/global/vendor/media-match/media.match.min.js"></script>
    <script type="text/javascript" src="<?php echo Yii::$app->request->baseUrl?>/global/vendor/respond/respond.min.js"></script>
    <![endif]-->

  <!-- Scripts -->
  <script type="text/javascript" src="<?php echo Yii::$app->request->baseUrl?>/assets/plugins/modernizr/modernizr.min.js"></script>
  <script type="text/javascript" src="<?php echo Yii::$app->request->baseUrl?>/assets/plugins/breakpoints/breakpoints.min.js"></script>
  <script>
    Breakpoints();
  </script>
  <?php $this->head() ?>
</head>
<body class="page-login-v2 layout-full page-dark">
  <?php $this->beginBody() ?>
  <!--[if lt IE 8]>
        <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
    <![endif]-->

  <div class="page animsition" data-animsition-in="fade-in" data-animsition-out="fade-out">
    <div class="page-content">
      <div class="page-brand-info">
        <div class="brand">
          <div class="sign">
            <img class="brand-img img-responsive" src="<?php echo Yii::$app->request->baseUrl?>/assets/images/truffle-logo2.png" alt="...">
          </div>
          
          <!-- <h2 class="brand-text font-size-40 margin-left-10"><?php echo Yii::$app->params['system']; ?></h2> -->
        </div>
        <div class="footer-div small-no-display">
          <img class="brand-img img-responsive" src="<?php echo Yii::$app->request->baseUrl?>/assets/images/logo-white.png" alt="...">
          <ul class="list-style-none">
            <li>www.klientsoft.com</li>
          </ul>
        </div>
      </div>

      <div class="page-login-main">
        
        <?= $content ?>

        <footer class="page-copyright" style="width: 300px;">
          <p><?php echo strtoupper(Yii::$app->params['system']); ?> Software BY KlientScape Software</p>
          <p class="big-no-display"><a href="http://klientsoft.com/">www.klientsoft.com</a></p>
          <p>&copy; <?php echo date('Y'); ?>. All RIGHT RESERVED.</p>
          <div class="social">
            <a class="btn btn-icon btn-round social-twitter" href="https://twitter.com/klientscape2015" target="_blank">
              <i class="icon fa-twitter" aria-hidden="true"></i>
            </a>
            <a class="btn btn-icon btn-round social-facebook" href="https://www.facebook.com/software.klientscape" target="_blank">
              <i class="icon fa-facebook" aria-hidden="true"></i>
            </a>
            <a class="btn btn-icon btn-round social-google-plus" href="https://plus.google.com/101304859001701811816" target="_blank">
              <i class="icon fa-google-plus" aria-hidden="true"></i>
            </a>
          </div>
          <div class="clearfix"></div>
        </footer>
      </div>

    </div>
  </div>
  
  <script type="text/javascript" src="<?php echo $baseUrl; ?>/assets/js/jquery-2.1.0.js"></script>
  <script type="text/javascript" src="<?php echo $baseUrl; ?>/assets/plugins/bootstrap/js/bootstrap.min.js"></script>
  <script src="<?php echo $baseUrl?>/assets/plugins/sweetalert/sweetalert.min.js"></script>

  <script type="text/javascript" src="<?php echo $baseUrl; ?>/assets/software/get-ip.js"></script>
  <script type="text/javascript" src="<?php echo $baseUrl; ?>/assets/software/recovery-database.js"></script>

  <script>
    var baseUrl = '<?php echo $baseUrl; ?>';
    //var password_for_db_recovery = '<?php //echo Yii::$app->params['password_for_db_recovery']; ?>';
  </script>
  <?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>