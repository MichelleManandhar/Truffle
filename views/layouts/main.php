<?php

/* @var $this \yii\web\View */
/* @var $content string */
$baseUrl = Yii::$app->request->baseUrl;
$category_type = Yii::$app->params['category_type'];
use yii\helpers\Html;
use app\components\HelperSettings as HSettings;
use app\components\HelperFloor as HFloor;
use app\components\HelperNotification as HNotification;

$to_group = array('admin');
$admin_group[] = Yii::$app->params['user_role']['superadmin'];
if (isset($to_group)) {
    foreach($to_group as $to):
        $admin_group[] = Yii::$app->params['user_role'][$to];
    endforeach;
}

$main_floor_data = HFloor::getMainFloor();
$main_floor = ($main_floor_data != null) ? $main_floor_data['name'] : '';

$temp = explode(":",Yii::$app->session['fiscal_year']);
$starting_fiscal_year_from_date = $temp[0];
$starting_fiscal_year_to_date   = $temp[1];

?>

<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>

    <link rel="apple-touch-icon" href="<?php echo $baseUrl?>/assets/images/fav.png">
    <link rel="shortcut icon" href="<?php echo $baseUrl?>/assets/images/fav.ico">

    <link rel="shortcut icon" sizes="192x192" href="<?php echo $baseUrl; ?>/assets/images/launcher-icon-4x.png">
    <link rel="icon" sizes="128x128" href="<?php echo $baseUrl; ?>/assets/images/launcher-icon-128x128.png">
    <link rel="apple-touch-icon" sizes="128x128" href="<?php echo $baseUrl; ?>/assets/images/launcher-icon-128x128.png">
    <link rel="apple-touch-icon-precomposed" sizes="128x128" href="<?php echo $baseUrl; ?>/assets/images/launcher-icon-128x128.png">
    <link rel="manifest" href="<?php echo $baseUrl; ?>/assets/json/manifest.json"> 
    <meta name="viewport" content="width=device-width">
    <meta name="mobile-web-app-capable" content="yes">

    <!-- Stylesheets -->
    <link rel="stylesheet" href="<?php echo $baseUrl?>/assets/css/bootstrap.min081a.css?v2.0.0">
    <link rel="stylesheet" href="<?php echo $baseUrl?>/assets/css/bootstrap-extend.min081a.css?v2.0.0">
    <link rel="stylesheet" href="<?php echo $baseUrl?>/assets/css/site.min081a.css?v2.0.0">
    <link rel="stylesheet" type="text/css" href="<?php echo $baseUrl?>/assets/plugins/table/css/dataTables.bootstrap.min081a.css">

    <link rel="stylesheet" href="<?php echo $baseUrl?>/assets/plugins/animsition/animsition.min081a.css?v2.0.0">
    <link rel="stylesheet" href="<?php echo $baseUrl?>/assets/plugins/asscrollable/asScrollable.min081a.css?v2.0.0">
    <link rel="stylesheet" href="<?php echo $baseUrl?>/assets/plugins/switchery/switchery.min081a.css?v2.0.0">
    <link rel="stylesheet" href="<?php echo $baseUrl?>/assets/plugins/slidepanel/slidePanel.min081a.css?v2.0.0">
    <link rel="stylesheet" href="<?php echo $baseUrl?>/assets/plugins/flag-icon-css/flag-icon.min081a.css?v2.0.0">

    <link rel="stylesheet" href="<?php echo $baseUrl?>/assets/plugins/datatables-bootstrap/dataTables.bootstrap.min081a.css?v2.0.0">
    <link rel="stylesheet" href="<?php echo $baseUrl?>/assets/plugins/datatables-fixedheader/dataTables.fixedHeader.min081a.css?v2.0.0">
    <link rel="stylesheet" href="<?php echo $baseUrl?>/assets/plugins/datatables-responsive/dataTables.responsive.min081a.css?v2.0.0">
    <link rel="stylesheet" href="<?php echo $baseUrl?>/assets/plugins/bootstrap-touchspin/bootstrap-touchspin.min081a.css?v2.0.0">
    <link rel="stylesheet" href="<?php echo $baseUrl?>/assets/plugins/webui-popover/webui-popover.min081a.css">

    <!-- Fonts -->
    <link rel="stylesheet" href="<?php echo $baseUrl?>/assets/fonts/web-icons/web-icons.min081a.css?v2.0.0">
    <link rel="stylesheet" href="<?php echo $baseUrl?>/assets/fonts/glyphicons/glyphicons.min081a.css">
    <link rel="stylesheet" href="<?php echo $baseUrl?>/assets/fonts/font-awesome/font-awesome.min081a.css"  type="text/css"/>
    <link rel="stylesheet" href="<?php echo $baseUrl?>/assets/fonts/themify/themify.min081a.css" rel="stylesheet" type="text/css"/>

    <link rel="stylesheet" type="text/css" href="<?php echo $baseUrl?>/assets/plugins/sweetalert/sweetalert.css">
    <link rel="stylesheet" type="text/css" href="<?php echo $baseUrl?>/assets/plugins/sweetalert/ie9.css" rel="stylesheet" media="screen">
    <link rel="stylesheet" type="text/css" href="<?php echo $baseUrl?>/assets/plugins/x-editable/css/bootstrap-editable.css">

    <link rel="stylesheet" type="text/css" href="<?php echo $baseUrl?>/assets/plugins/bootstrap-select/bootstrap-select.min081a.css">
    <link rel="stylesheet" type="text/css" href="<?php echo $baseUrl?>/assets/plugins/nepalidatepicker/nepali.datepicker.v2.min.css">

    <link href="<?php echo $baseUrl; ?>/assets/css/BootstrapXL.css" rel="stylesheet">

    <link rel="stylesheet" type="text/css" href="<?php echo $baseUrl?>/assets/css/aside-modal.css">
    <link rel="stylesheet" href="<?php echo $baseUrl?>/assets/css/themify.css">
    <link rel="stylesheet" href="<?php echo $baseUrl?>/assets/css/override.css">
    <link rel="stylesheet" href="<?php echo $baseUrl?>/assets/css/responsive.css">
    <link rel="stylesheet" href="<?php echo $baseUrl?>/assets/css/bootstrap-big-grid.css">
    <link rel="stylesheet" href="<?php echo $baseUrl?>/assets/plugins/toastr/toastr.min.css">

    <script type="text/javascript" src="<?php echo $baseUrl?>/assets/js/jquery-2.1.0.js"></script>
    <script type="text/javascript" src="<?php echo $baseUrl?>/assets/plugins/modernizr/modernizr.min.js"></script>
    <script type="text/javascript" src="<?php echo $baseUrl?>/assets/plugins/breakpoints/breakpoints.min.js"></script>
    <script>
        Breakpoints();
    </script>
    <?php $this->head() ?>
</head>
<?php 
  $page_title = '';
  $contr = Yii::$app->controller->id;
  $action = Yii::$app->controller->action->id;

  $dash_active = '';
  $category_active = '';
  $item_active = '';
  $order_active = '';
  $reports_active = '';
  $history_active = '';
  $today_active = '';
  $settings_active = '';
  $users_active = '';
  $product_active = '';
  $category_report_active = '';
  $printer_settings_active = '';
  $profile_picture = '';
  $document_active = '';

  switch($contr) 
  {
    case 'dash' :
      $dash_active = 'menu-active';
    break;

    case 'menu-category' :
      $category_active = 'menu-active';
    break;

    case 'menu-item' :
      $item_active = 'menu-active';
    break;

    case 'order' :
      if ($action == 'today') {
        $today_active = 'menu-active';
      }
      else {
        $order_active = 'menu-active';
      }
    break;

    case 'reports' :
      if ($action == 'index') {
        $reports_active = 'menu-active';
      }
      else if ($action == 'history') {
        $history_active = 'menu-active';
      }
      else if ($action == 'category-summary') {
        $category_report_active = 'menu-active';
      }
    break;

    case 'settings' :
      $settings_active = 'menu-active';
    break;

    case 'printer' :
      $printer_settings_active = 'menu-active';
    break;

    case 'user' :
      if ($action == 'index') {
        $users_active = 'menu-active';
      } else {
        $profile_picture ='menu-active';
      }
    break;

    case 'document' :
      $document_active = 'menu-active';
    break;
  }
  $animsition = 'animsition';
  $right_click = false;
  $workplace = (($contr == 'order' || $contr == 'table' || $contr == 'take-away' || $contr == 'retail' || $contr == 'pick-up' || $contr == 'delivery') && ($action == 'index' || $action == 'version-two' || $action == 'version-three' || $action == 'index')) ? true : false;
  if (($contr == 'menu-item' || $contr == 'menu-category') && ($action == 'sorting' || $action = 'sorting-by-category')) {
      $animsition = '';
  }
  else if ($contr == 'order' || $contr = 'table') {
      $animsition = '';
      $right_click = true;
  }
?>
<body class="dashboard site-navbar-small themify themify-coffee <?php echo ($workplace) ? 'workplace' : '';?>" id="body">
<?php $this->beginBody() ?>
  <?php
    $notification  = HNotification::getNotification(); 
  ?>
    <nav class="hidden-print site-navbar navbar navbar-default navbar-fixed-top navbar-mega navbar-inverse theme-bg-color" role="navigation">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle hamburger hamburger-close navbar-toggle-left hided"
          data-toggle="menubar">
            <span class="sr-only">Toggle navigation</span>
            <span class="hamburger-bar"></span>
          </button>
          <button type="button" class="navbar-toggle collapsed" data-target="#site-navbar-collapse"
          data-toggle="collapse">
            <i class="icon wb-more-horizontal" aria-hidden="true"></i>
          </button>
          <a class="navbar-brand navbar-brand-center" href="<?php echo (in_array(Yii::$app->session['eHhupx5UpkLZoXRP_cR1ozEVjY14zWOC0_user']->role, $admin_group)) ? $baseUrl.'/dash/' : $baseUrl.'/table/';?>">
            <img class="navbar-brand-logo navbar-brand-logo-normal" src="<?php echo $baseUrl?>/assets/images/truffle-logo-white.png"
            title="Remark">
            <img class="navbar-brand-logo navbar-brand-logo-special" src="<?php echo $baseUrl?>/assets/images/truffle-logo-white.png"
            title="Remark" style="display:none;">
          </a>
          <span class="by-ks">By Klientscape Software</span>
        </div>
        <div class="navbar-container container-fluid">
          <div class="collapse navbar-collapse navbar-collapse-toolbar" id="site-navbar-collapse">
            <ul class="nav navbar-toolbar navbar-right navbar-toolbar-right">

              <li class="dropdown margin-top-20">
                <span class="color-white"><?php echo date('Y-m-d'); ?></span>
                <span class="show-time color-white"></span>
              </li>

              <li class="dropdown">
                <?php 
                if (in_array(Yii::$app->session['eHhupx5UpkLZoXRP_cR1ozEVjY14zWOC0_user']->role, $admin_group) 
                          && strpos($_SERVER['REQUEST_URI'], 'dash') == false ) : ?>
                      <a class="fa fa-arrow-left" href="javascript:window.history.back(1);" role="button">
                        <span class="sr-only">Go Back</span>
                      </a>
                <?php elseif(!in_array(Yii::$app->session['eHhupx5UpkLZoXRP_cR1ozEVjY14zWOC0_user']->role, $admin_group) 
                          && strpos($_SERVER['REQUEST_URI'], 'table') == false ) : ?>
                          <a class="fa fa-arrow-left" href="javascript:window.history.back(1);" role="button">
                            <span class="sr-only">Go Back</span>
                          </a>
                <?php endif; ?>
              </li>

              <?php
                if ((date('Y-m-d') >= $starting_fiscal_year_from_date) 
                        && ( date('Y-m-d') < date('Y-m-d', strtotime($starting_fiscal_year_to_date. ' + 11 days'))) )
                { ?>
                <li class="dropdown">
                    <a href="<?php echo $baseUrl;?>/table/#<?php echo $main_floor;?>" role="button">
                        <i class="icon fa-cutlery" aria-hidden="true"></i>
                        <span class="badge badge-success"></span>
                    </a>
                </li>
              <?php } ?>

              <li class="dropdown">                
                <a data-toggle="dropdown" href="#" aria-expanded="false" data-animation="scale-up" role="button">
                  <i class="icon fa-tasks" aria-hidden="true"></i>
                </a>
                <ul class="dropdown-menu" role="menu">
                  <li role="presentation">
                    <a href="<?php echo $baseUrl;?>/order/today/" role="menuitem"><i class="icon wb-library" aria-hidden="true"></i> Today's Summary</a>
                  </li>
                  <li class="divider" role="presentation"></li>
                  <li role="presentation">
                    <a href="<?php echo $baseUrl;?>/menu-item/" role="menuitem"><i class="icon fa-list-ul" aria-hidden="true"></i> Menu Items</a>
                  </li>
                  <li class="divider" role="presentation"></li>
                  <li role="presentation">
                    <a href="<?php echo $baseUrl;?>/menu-category/" role="menuitem"><i class="icon fa-th-list" aria-hidden="true"></i> Menu Category</a>
                  </li>  
                  <li class="divider" role="presentation"></li>
                  <li role="presentation">
                    <a href="<?php echo $baseUrl;?>/purchase/" role="menuitem"><i class="icon fa-truck" aria-hidden="true"></i> Purchase</a>
                  </li>
                  <li class="divider" role="presentation"></li>
                  <li role="presentation">
                    <a href="<?php echo $baseUrl;?>/product-manager/" role="menuitem"><i class="icon fa-cart-arrow-down" aria-hidden="true"></i> Product Manager</a>
                  </li> 
                  <li class="divider" role="presentation"></li>
                  <li role="presentation">
                    <a href="<?php echo $baseUrl;?>/utensils-manager/" role="menuitem"><i class="icon fa fa-cutlery" aria-hidden="true"></i> Utensils Stock Manager</a>
                  </li> 
                  <li class="divider" role="presentation"></li>
                  <li role="presentation">
                    <a href="<?php echo $baseUrl;?>/debtor/list" role="menuitem"><i class="icon fa-group" aria-hidden="true"></i> Debtor List</a>
                  </li>

                  <?php if ((date('Y-m-d') >= $starting_fiscal_year_from_date) 
                            && ( date('Y-m-d') < date('Y-m-d', strtotime($starting_fiscal_year_to_date. ' + 11 days'))) ) { ?>
                      <li class="divider" role="presentation"></li>
                      <li role="presentation">
                        <a href="<?php echo $baseUrl;?>/kot/" role="menuitem"><i class="icon fa-building-o" aria-hidden="true"></i> Kot List</a>
                      </li>
                  <?php } ?>
                </ul>
              </li>
              <?php if (in_array(Yii::$app->session['eHhupx5UpkLZoXRP_cR1ozEVjY14zWOC0_user']->role, $admin_group)) : ?>
                <?php if ((date('Y-m-d') >= $starting_fiscal_year_from_date) 
                          && ( date('Y-m-d') < date('Y-m-d', strtotime($starting_fiscal_year_to_date. ' + 11 days'))) ) { ?>
                    <li class="dropdown">                
                      <a data-toggle="dropdown" href="#" aria-expanded="false" data-animation="scale-up" role="button">
                        <i class="icon fa-cog" aria-hidden="true"></i>
                      </a>
                      <ul class="dropdown-menu" role="menu">
                          <li role="presentation">
                              <a href="<?php echo $baseUrl;?>/printer/" role="menuitem"><i class="icon wb-print" aria-hidden="true"></i> Printer Settings</a>
                          </li>
                          <li class="divider" role="presentation"></li>
                          <li role="presentation">
                              <a href="<?php echo $baseUrl;?>/delivery/setting" role="menuitem"><i class="icon fa-cog" aria-hidden="true"></i> Delivery Settings</a>
                          </li>

                          <li class="divider" role="presentation"></li>
                          <li role="presentation">
                              <a href="<?php echo $baseUrl;?>/floor" role="menuitem"><i class="icon fa-server" aria-hidden="true"></i> Section Settings</a>
                          </li>

                          <li class="divider" role="presentation"></li>
                          <li role="presentation">
                              <a href="<?php echo $baseUrl;?>/member" role="menuitem"><i class="icon fa-group" aria-hidden="true"></i> Membership</a>
                          </li>
                          <li class="divider" role="presentation"></li>
                          <li role="presentation">
                            <a href="<?php echo $baseUrl;?>/settings/"><i class="icon fa-cog" aria-hidden="true"></i> Settings</a>
                          </li>
                          <li class="divider" role="presentation"></li>
                          <li role="presentation">
                            <a href="<?php echo $baseUrl;?>/close-day-log" role="close_day_log"><i class="icon fa-inbox" aria-hidden="true"></i> Close Day Log</a>
                          </li>
                          <li class="divider" role="presentation"></li>
                          <li role="presentation">
                            <a href="<?php echo $baseUrl;?>/audit-log/view" role="audit_log"><i class="icon fa-inbox" aria-hidden="true"></i> Audit Log</a>
                          </li>
                        </ul>
                      </li>
                <?php } ?>
              <?php endif;?>
              <?php if (in_array(Yii::$app->session['eHhupx5UpkLZoXRP_cR1ozEVjY14zWOC0_user']->role, $admin_group)) : ?>
              <li class="dropdown">                
                <a data-toggle="dropdown" href="#" aria-expanded="false" data-animation="scale-up" role="button">
                  <i class="icon wb-lock" aria-hidden="true"></i>
                </a>
                <ul class="dropdown-menu" role="menu">
                  <li role="presentation">
                    <a href="<?php echo $baseUrl;?>/user/" role="menuitem"><i class="icon fa-group" aria-hidden="true"></i> Users</a>
                  </li>
                  <li class="divider" role="presentation"></li>
                  <li role="presentation">
                      <a href="<?php echo $baseUrl;?>/reports/category-summary" role="menuitem"><i class="icon wb-order" aria-hidden="true"></i> Category Summary</a>
                  </li>

                  <li class="divider" role="presentation"></li>
                  <li role="presentation">
                    <a href="javascript:void(0)" role="menuitem" class="get-current-nepali-month-sales-sumary" data-date="<?php echo date('Y-m-d');?>"><i class="icon wb-book" aria-hidden="true"></i> Sales Summary</a>
                  </li>

                  <li class="divider" role="presentation"></li>
                  <li role="presentation">
                    <a href="javascript:void(0)" class="get-current-nepali-month-cancelled-history"><i class="icon fa-newspaper-o" aria-hidden="true"></i> Sales Return Summary</a>
                  </li>

                  <li class="divider" role="presentation"></li>
                  <li role="presentation">
                    <a href="javascript:void(0)" class="get-current-nepali-month-kot-return-history"><i class="icon fa-building-o" aria-hidden="true"></i> Kot Return History</a>
                  </li>

                  <li class="divider" role="presentation"></li>
                  <li role="presentation">
                    <a href="<?php echo $baseUrl;?>/stock/" role="menuitem"><i class="icon fa-bar-chart" aria-hidden="true"></i> Stock</a>
                  </li>

                  <li class="divider" role="presentation"></li>
                  <li role="presentation">
                    <a href="javascript:void(0)" class="get-current-nepali-month-foc-history" role="menuitem"><i class="icon wb-book" aria-hidden="true"></i> FOC History</a>
                  </li>  
                  <li class="divider" role="presentation"></li>
                  <li role="presentation">
                    <a href="javascript:void(0)" class="get-current-nepali-month-distribute-tip" role="tipsdistribute"><i class="icon fa-money" aria-hidden="true"></i> Distribute Tips</a>
                  </li>
                  <?php if ((date('Y-m-d') >= $starting_fiscal_year_from_date) 
                            && ( date('Y-m-d') < date('Y-m-d', strtotime($starting_fiscal_year_to_date. ' + 11 days'))) ) { ?>
                      <li class="divider" role="presentation"></li>
                      <li role="presentation">
                        <a href="<?php echo $baseUrl;?>/monthly-target/" role="monthly_target"><i class="icon fa-area-chart" aria-hidden="true"></i> Set Monthly Target</a>
                      </li>
                  <?php } ?>
                </ul>
              </li>
              <?php endif; ?>
              <li class="dropdown">
                <a data-toggle="dropdown" href="javascript:void(0)" title="Notifications" aria-expanded="true" data-animation="scale-up" role="button">
                  <i class="icon wb-bell" aria-hidden="true"></i>
                  <span class="badge badge-danger up"><?= $notification['birthday_count']['count'] + $notification['member_threshold_exceeded']['count'] + $notification['member_threshold_end_exceeded']['count'] ?></span>
                </a>
                <ul class="dropdown-menu dropdown-menu-right dropdown-menu-media" role="menu">
                  <li class="dropdown-menu-header" role="presentation">
                    <h5>NOTIFICATIONS</h5>
                    <span class="label label-round label-danger">New <?= $notification['birthday_count']['count'] + $notification['member_threshold_exceeded']['count'] + $notification['member_threshold_end_exceeded']['count'] ?></span>
                  </li>

                  <li class="list-group scrollable is-enabled scrollable-vertical" role="presentation">
                    <div data-role="container" class="scrollable-container">
                      <div data-role="content" class="scrollable-content">
                        <a class="list-group-item" href="<?= $baseUrl ?>/member" role="menuitem">
                          <div class="media">
                            <div class="media-left padding-right-10">
                              <i class="icon fa-birthday-cake bg-red-600 white icon-circle" aria-hidden="true"></i>
                            </div>
                            <div class="media-body">
                              <h6 class="media-heading"><?= $notification['birthday_count']['count'] ?> members birthday is coming</h6>
                            </div>
                          </div>
                        </a>

                        <a class="list-group-item" href="<?= $baseUrl ?>/member" role="menuitem">
                          <div class="media">
                            <div class="media-left padding-right-10">
                              <i class="icon fa-recycle bg-green-600 white icon-circle" aria-hidden="true"></i>
                            </div>
                            <div class="media-body">
                              <h6 class="media-heading"><?= $notification['member_threshold_exceeded']['count'] ?> members threshold amount has been exceeded</h6>
                            </div>
                          </div>
                        </a>
                      </div>

                      <a class="list-group-item" href="<?= $baseUrl ?>/member" role="menuitem">
                          <div class="media">
                            <div class="media-left padding-right-10">
                              <i class="icon fa-recycle bg-green-600 white icon-circle" aria-hidden="true"></i>
                            </div>
                            <div class="media-body">
                              <h6 class="media-heading"><?= $notification['member_threshold_end_exceeded']['count'] ?> members threshold end amount has been exceeded</h6>
                            </div>
                          </div>
                        </a>
                    </div>
                  </li>
                </ul>
              </li>
              <li class="dropdown">
                <a data-toggle="dropdown" href="javascript:void(0)" aria-expanded="false" data-animation="scale-up" role="button">
                  <i class="icon wb-user" aria-hidden="true"></i>
                </a>
                <ul class="dropdown-menu" role="menu">
                  <li role="presentation">
                    <a href="<?php echo (in_array(Yii::$app->session['eHhupx5UpkLZoXRP_cR1ozEVjY14zWOC0_user']->role, $admin_group)) ? $baseUrl.'/dash/' : 'javascript:void(0)';?>" role="menuitem" class="theme-bg-color color-white"><i class="icon fa-meh-o" aria-hidden="true"></i> <?php echo ucwords(Yii::$app->session['eHhupx5UpkLZoXRP_cR1ozEVjY14zWOC0_user']->name); ?></a>
                  </li>

                  <?php if (in_array(Yii::$app->session['eHhupx5UpkLZoXRP_cR1ozEVjY14zWOC0_user']->role, $admin_group)) : ?>

                    <?php
                      if ((date('Y-m-d') >= $starting_fiscal_year_from_date) 
                              && ( date('Y-m-d') < date('Y-m-d', strtotime($starting_fiscal_year_to_date. ' + 11 days'))) )
                      { ?>
                        <li class="divider" role="presentation"></li>
                        <li role="presentation">
                          <a href="<?php echo $baseUrl;?>/backup-database/backup" role="menuitem"><i class="icon fa-database" aria-hidden="true"></i> Backup Database</a>
                        </li> 

                        <li class="divider" role="presentation"></li>
                        <li role="presentation">
                            <a href="<?php echo $baseUrl;?>/user/profile-picture" role="menuitem"><i class="icon fa-photo" aria-hidden="true"></i> Upload Picture</a>
                        </li>
                    <?php } ?>
                  <?php endif;?>

                  <?php
                    if ((date('Y-m-d') >= $starting_fiscal_year_from_date) 
                            && ( date('Y-m-d') < date('Y-m-d', strtotime($starting_fiscal_year_to_date. ' + 11 days'))) )
                    { ?>
                      <li class="divider" role="presentation"></li>
                      <li role="presentation">
                        <a href="javascript:void(0)" role="menuitem" data-toggle="modal" data-target=".modal-change-password"><i class="icon wb-lock" aria-hidden="true"></i> Change Password</a>
                      </li>
                      <li class="divider" role="presentation"></li>
                      <li role="presentation">
                        <a href="javascript:void(0)" role="menuitem" data-toggle="modal" data-target=".modal-change-pin-code"><i class="icon wb-lock" aria-hidden="true"></i> Change Pin Code</a>
                      </li>
                  <?php } ?>
                  <li class="divider" role="presentation"></li>
                  <li role="presentation">
                      <a href="javascript:void(0)" class="master-reset" role="master_reset"><i class="icon fa-refresh" aria-hidden="true"></i> Refresh Software</a>
                  </li>

                  <li class="divider" role="presentation"></li>
                    <li role="presentation">
                        <a href="javascript:void(0)" class="change-date-format" role="change_date_format" data-date-type='<?php if( isset(Yii::$app->session['date_format']) ) {
                                  if(Yii::$app->session['date_format'] == 'english') {
                                    echo "nepali";
                                  }else {
                                    echo "english";
                                  }
                                }else {
                                  echo "nepali";
                                }
                          ?>'><i class="icon fa-refresh" aria-hidden="true"></i> 
                          <?php if( isset(Yii::$app->session['date_format']) ) {
                                  if(Yii::$app->session['date_format'] == 'english') {
                                    echo "Change To Nepali Date";
                                  }else {
                                    echo "Change To English Date";
                                  }
                                }else {
                                  echo "Change To Nepali Date";
                                }
                          ?>
                        </a>
                    </li>

                  <!-- <li class="divider" role="presentation"></li>
                  <li role="presentation">
                    <a href="<?php echo $baseUrl;?>/document/" role="menuitem"><i class="icon fa-file-pdf-o" aria-hidden="true"></i> View User Manual & Help File</a>
                  </li> -->

                  <li class="divider" role="presentation"></li>
                  <?php if (in_array(Yii::$app->session['eHhupx5UpkLZoXRP_cR1ozEVjY14zWOC0_user']->role, $admin_group)) { ?>
                    <li role="presentation">
                      <a href="<?php echo $baseUrl;?>/site/processing-logout/?ip=<?php echo Yii::$app->session['eHhupx5UpkLZoXRP_cR1ozEVjY14zWOC0_user']->encrypt ?>" class="app-logout" role="menuitem"><i class="icon wb-power" aria-hidden="true"></i> Logout</a>
                    </li>
                  <?php } else { ?>
                    <li role="presentation">
                      <a href="<?php echo $baseUrl;?>/site/logout" class="app-logout" role="menuitem"><i class="icon wb-power" aria-hidden="true"></i> Logout</a>
                    </li>
                  <?php } ?>
                </ul>
              </li>
            </ul>
          </div>
        </div>
    </nav> 

    <div class="site-menubar site-menubar-light">
      <div class="site-menubar-body">
        <div>
          <div>
            <ul class="site-menu">
              <li class="site-menu-category"><?php echo strtoupper(Yii::$app->params['system']);?></li>
              <?php if (in_array(Yii::$app->session['eHhupx5UpkLZoXRP_cR1ozEVjY14zWOC0_user']->role, $admin_group)) : ?>
                <li class="site-menu-item">
                  <a href="<?php echo $baseUrl;?>/dash/" class="<?php echo $dash_active;?>" dropdown-tag="false">
                    <i class="site-menu-icon wb-desktop" aria-hidden="true"></i>
                    <span class="site-menu-title">Dashboard</span>
                  </a>
                </li>
                <li class="site-menu-item">
                  <a href="<?php echo $baseUrl;?>/reports/category-summary" class="<?php echo $category_report_active;?>" dropdown-tag="false">
                    <i class="site-menu-icon wb-order" aria-hidden="true"></i>
                    <span class="site-menu-title">Category Summary</span>
                  </a>
                </li>

                <li class="site-menu-item">
                  <a href="#" class="<?php echo $history_active;?> get-current-nepali-month-sales-sumary" dropdown-tag="false">
                    <i class="site-menu-icon wb-book" aria-hidden="true"></i>
                    <span class="site-menu-title">Sales Summary</span>
                  </a>
                </li>
                <li class="site-menu-item">
                  <a href="javascript:void(0)" class="get-current-nepali-month-cancelled-history"><i class="site-menu-icon fa fa-newspaper-o" aria-hidden="true"></i> 
                    <span class="site-menu-title">Sales Return Summary</span>
                  </a>
                </li>
                <li class="site-menu-item">
                  <a href="javascript:void(0)" class="get-current-nepali-month-kot-return-history"><i class="site-menu-icon fa fa-newspaper-o" aria-hidden="true"></i> 
                    <span class="site-menu-title">Kot Return History</span>
                  </a>
                </li>
                <li class="site-menu-item">
                  <a href="<?php echo $baseUrl;?>/product-manager/"><i class="site-menu-icon fa-cart-arrow-down" aria-hidden="true"></i> 
                    <span class="site-menu-title"> Product Manager</span>
                  </a>
                </li>
                <li class="site-menu-item">
                  <a href="<?php echo $baseUrl;?>/utensils-manager/"><i class="site-menu-icon fa fa-cutlery" aria-hidden="true"></i> 
                    <span class="site-menu-title">Utensils Stock Manager</span>
                  </a>
                </li>
                <li class="site-menu-item">
                  <a href="<?php echo $baseUrl;?>/stock/" dropdown-tag="false">
                    <i class="site-menu-icon fa-bar-chart" aria-hidden="true"></i>
                    <span class="site-menu-title">Stock</span>
                  </a>
                </li>

                <?php
                  if ((date('Y-m-d') >= $starting_fiscal_year_from_date) 
                          && ( date('Y-m-d') < date('Y-m-d', strtotime($starting_fiscal_year_to_date. ' + 11 days'))) )
                  { ?>
                  <li class="site-menu-item">
                    <a href="<?php echo $baseUrl;?>/delivery/setting"><i class="site-menu-icon fa fa-cog" aria-hidden="true"></i> 
                      <span class="site-menu-title">Delivery Setting</span>
                    </a>
                  </li>

                  <li class="site-menu-item">
                    <a href="<?php echo $baseUrl;?>/member"><i class="site-menu-icon fa fa-group" aria-hidden="true"></i> 
                      <span class="site-menu-title">Membership</span>
                    </a>
                  </li>
                <?php } ?>
              <?php endif; ?>
              <li class="site-menu-item">
                <a href="<?php echo $baseUrl;?>/order/today" class="<?php echo $today_active;?>" dropdown-tag="false">
                  <i class="site-menu-icon wb-library" aria-hidden="true"></i>
                  <span class="site-menu-title">Today's Summary</span>
                </a>
              </li>

              <?php
                if ((date('Y-m-d') >= $starting_fiscal_year_from_date) 
                        && ( date('Y-m-d') < date('Y-m-d', strtotime($starting_fiscal_year_to_date. ' + 11 days'))) )
                { ?>
                  <li class="site-menu-item">
                    <a href="<?php echo $baseUrl;?>/table/" class="<?php echo $order_active;?>" dropdown-tag="false">
                      <i class="site-menu-icon fa-cutlery" aria-hidden="true"></i>
                      <span class="site-menu-title">Order Desk</span>
                    </a>
                  </li>
              <?php } ?>
              <li class="site-menu-item">
                <a href="<?php echo $baseUrl;?>/menu-item/" class="<?php echo $item_active;?>" dropdown-tag="false">
                  <i class="site-menu-icon fa-list-ul" aria-hidden="true"></i>
                  <span class="site-menu-title">Menu Items</span>
                </a>
              </li>
              <li class="site-menu-item">
                <a href="<?php echo $baseUrl;?>/menu-category/" class="<?php echo $category_active;?>" dropdown-tag="false">
                  <i class="site-menu-icon fa-th-list" aria-hidden="true"></i>
                  <span class="site-menu-title">Menu Category</span>
                </a>
              </li>
              <li class="site-menu-item">
                <a href="<?php echo $baseUrl;?>/purchase/" dropdown-tag="false">
                  <i class="site-menu-icon fa-truck" aria-hidden="true"></i>
                  <span class="site-menu-title">Purchase</span>
                </a>
              </li>

              <?php
                if ((date('Y-m-d') >= $starting_fiscal_year_from_date) 
                        && ( date('Y-m-d') < date('Y-m-d', strtotime($starting_fiscal_year_to_date. ' + 11 days'))) )
                { ?>
                  <li class="site-menu-item">
                    <a href="<?php echo $baseUrl;?>/kot/" dropdown-tag="false">
                      <i class="site-menu-icon fa-building-o" aria-hidden="true"></i>
                      <span class="site-menu-title">Kot List</span>
                    </a>
                  </li>
              <?php } ?>
              <?php if (in_array(Yii::$app->session['eHhupx5UpkLZoXRP_cR1ozEVjY14zWOC0_user']->role, $admin_group)) : ?>
              <li class="site-menu-item">
                <a href="#" class="get-current-nepali-month-distribute-tip" role="tipsdistribute"><i class="site-menu-icon fa fa-money" aria-hidden="true"></i> Distribute Tips</a>
              </li>
              <li class="site-menu-item">
                <a href="<?php echo $baseUrl;?>/audit-log" role="audit_log"><i class="site-menu-icon fa fa-money" aria-hidden="true"></i> Audit Log</a>
              </li>

              <?php
                if ((date('Y-m-d') >= $starting_fiscal_year_from_date) 
                        && ( date('Y-m-d') < date('Y-m-d', strtotime($starting_fiscal_year_to_date. ' + 11 days'))) )
                { ?>
                <li class="site-menu-item">
                  <a href="<?php echo $baseUrl;?>/monthly-target/" role="monthly_target"><i class="site-menu-icon fa fa-area-chart" aria-hidden="true"></i>Set Monthly Target</a>
                </li>
              <?php } ?>
              <li class="site-menu-item">
                <a href="<?php echo $baseUrl;?>/close-day-log" role="close_day_log"><i class="site-menu-icon icon fa-inbox" aria-hidden="true"></i> Close Day Log</a>
              </li>
              
              <li class="site-menu-item">
                <a href="<?php echo $baseUrl;?>/user/" class="<?php echo $users_active;?>" dropdown-tag="false">
                  <i class="site-menu-icon wb-users" aria-hidden="true"></i>
                  <span class="site-menu-title">Users</span>
                </a>
              </li>
              <li class="site-menu-item">
                <a href="<?php echo $baseUrl;?>/settings/" class="<?php echo $settings_active;?>" dropdown-tag="false">
                  <i class="site-menu-icon wb-settings" aria-hidden="true"></i>
                  <span class="site-menu-title">Settings</span>
                </a>
              </li>
            <?php endif;?>
            <?php if (in_array(Yii::$app->session['eHhupx5UpkLZoXRP_cR1ozEVjY14zWOC0_user']->role, $admin_group)) : ?>
                <?php
                  if ((date('Y-m-d') >= $starting_fiscal_year_from_date) 
                          && ( date('Y-m-d') < date('Y-m-d', strtotime($starting_fiscal_year_to_date. ' + 11 days'))) )
                  { ?>
                    <li class="site-menu-item">
                      <a href="<?php echo $baseUrl;?>/printer/" class="<?php echo $printer_settings_active;?>" dropdown-tag="false">
                        <i class="site-menu-icon wb-print" aria-hidden="true"></i>
                        <span class="site-menu-title">Printer Settings</span>
                      </a>
                    </li>
                <?php } ?>
            <?php endif; ?>
            <?php if (in_array(Yii::$app->session['eHhupx5UpkLZoXRP_cR1ozEVjY14zWOC0_user']->role, $admin_group)) : ?>
                <?php
                if ((date('Y-m-d') >= $starting_fiscal_year_from_date) 
                        && ( date('Y-m-d') < date('Y-m-d', strtotime($starting_fiscal_year_to_date. ' + 11 days'))) )
                { ?>
                  <li class="site-menu-item">
                    <a href="<?php echo $baseUrl;?>/user/profile-picture" class="<?php echo $profile_picture;?>" dropdown-tag="false">
                      <i class="site-menu-icon fa-photo" aria-hidden="true"></i>
                      <span class="site-menu-title">Upload Picture</span>
                    </a>
                  </li>
                <?php } ?>
            <?php endif;?>
              <?php
                if ((date('Y-m-d') >= $starting_fiscal_year_from_date) 
                        && ( date('Y-m-d') < date('Y-m-d', strtotime($starting_fiscal_year_to_date. ' + 11 days'))) )
                { ?>
                  <li class="site-menu-item">
                    <a href="javascript:void(0)" dropdown-tag="false">
                      <i class="site-menu-icon wb-rubber" aria-hidden="true"></i>
                      <span class="site-menu-title">Change Pin</span>
                    </a>
                  </li>
                  <li class="site-menu-item">
                    <a href="javascript:void(0)" dropdown-tag="false">
                      <i class="site-menu-icon wb-lock" aria-hidden="true"></i>
                      <span class="site-menu-title">Change Password</span>
                    </a>
                  </li>
              <?php } ?>
              <li class="site-menu-item">
                <a href="javascript:void(0)" class="master-reset" dropdown-tag="false">
                  <i class="site-menu-icon fa fa-refresh" aria-hidden="true"></i>
                  <span class="site-menu-title">Refresh Software</span>
                </a>
              </li>

              <!-- <li class="site-menu-item">
                <a href="<?php echo $baseUrl;?>/document/" dropdown-tag="false">
                  <i class="site-menu-icon fa fa-file-pdf-o" aria-hidden="true"></i>
                  <span class="site-menu-title">View User Manual & Help File</span>
                </a>
              </li> -->

              <?php if (in_array(Yii::$app->session['eHhupx5UpkLZoXRP_cR1ozEVjY14zWOC0_user']->role, $admin_group)) { ?>
                <li class="site-menu-item">
                  <a href="<?php echo $baseUrl;?>/site/processing-logout?ip=<?php echo Yii::$app->session['eHhupx5UpkLZoXRP_cR1ozEVjY14zWOC0_user']->encrypt ?>" class="app-logout" dropdown-tag="false">
                    <i class="site-menu-icon wb-power" aria-hidden="true"></i>
                    <span class="site-menu-title">Logout</span>
                  </a>
                </li>
              <?php } else {?>
                  <li class="site-menu-item">
                    <a href="<?php echo $baseUrl; ?>/site/logout" class="app-logout" dropdown-tag="false">
                      <i class="site-menu-icon wb-power" aria-hidden="true"></i>
                      <span class="site-menu-title">Logout</span>
                    </a>
                  </li>
              <?php } ?>
            </ul>
          </div>
        </div>
      </div>
    </div>
    
    <div class="page <?php echo $animsition;?>">
        <?= $content ?>
    </div>
    <div class="clearfix"></div>
    
    <?php if (!$workplace) : ?>
    <footer class="hidden-print site-footer">
        <div class="site-footer-legal">&copy; <?= date('Y') ?> <a href="">KlientScape Software</a></div>
    </footer>
    <?php endif; ?>

    <div class="modal modal-aside fade horizontal right modal-change-password" data-class="modal-change-password" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" data-backdrop="static" data-keyboard="false">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
              
              <form action="<?php echo $baseUrl;?>/dash/change-password" name="changePassword" data-tablename="changePassword" data-action="change" method="post" class="form-horizontal change-password-form">
                <input type="hidden" name="<?php echo Yii::$app->request->csrfParam; ?>" value="<?php echo Yii::$app->request->csrfToken; ?>" />

                <div class="modal-header theme-bg-color">
                    <h4 class="modal-title color-white">Change Your Password</h4>
                </div>
                
                <div class="modal-body">
                     <div class="col-sm-12"> 
                        <div class="form-group">
                            <label class="control-label">Old Password</label>
                            <input type="password" name="old_password" placeholder="Old Password" class="form-control" data-placement="left" data-toggle="tooltip" data-original-title="Old Password">
                        </div>
                        <div class="form-group">
                          <label class="control-label">New Password</label>
                            <input type="password" name="new_password" placeholder="New Password" class="form-control new-password" data-placement="left" data-toggle="tooltip" data-original-title="New Password">
                        </div>
                        <div class="form-group">
                            <label class="control-label">Retype Password</label>
                            <input type="password" name="re_password" placeholder="Retype Password" class="form-control" data-placement="left" data-toggle="tooltip" data-original-title="Retype Password">
                        </div>
                    </div>
                </div>
                
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Change</button>
                    <button type="button" class="btn btn-default" data-dismiss="modal">Discard</button>
                </div>
                </form>
            </div>
        </div>
    </div>

    <div class="modal modal-aside fade horizontal right modal-change-pin-code" data-class="modal-change-pin-code" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" data-backdrop="static" data-keyboard="false">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
              
              <form action="<?php echo $baseUrl;?>/dash/change-pin-code" name="changePinCode" data-tablename="changePinCode" data-action="change" method="post" class="form-horizontal change-pin-code-form">
                <input type="hidden" name="<?php echo Yii::$app->request->csrfParam; ?>" value="<?php echo Yii::$app->request->csrfToken; ?>" />

                <div class="modal-header theme-bg-color">
                    <h4 class="modal-title color-white">Change Your Pin Code</h4>
                </div>
                
                <div class="modal-body">
                     <div class="col-sm-12"> 
                        <div class="form-group">
                            <label class="control-label">Your Password</label>
                            <input type="password" name="password" placeholder="Password" class="form-control" data-placement="left" data-toggle="tooltip" data-original-title="Password">
                        </div>
                        <div class="form-group">
                          <label class="control-label">New Pin Code</label>
                            <input type="password" name="new_pin" maxlength="4" placeholder="New Pin Code" class="form-control new-pin-code" data-placement="left" data-toggle="tooltip" data-original-title="New Pin Code">
                        </div>
                        <div class="form-group">
                            <label class="control-label">Retype Pin Code</label>
                            <input type="password" name="re_pin" maxlength="4" placeholder="Retype Pin Code" class="form-control" data-placement="left" data-toggle="tooltip" data-original-title="Retype Pin Code">
                        </div>
                    </div>
                </div>
                
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Change</button>
                    <button type="button" class="btn btn-default" data-dismiss="modal">Discard</button>
                </div>
                </form>
            </div>
        </div>
    </div>

    <script type="text/javascript">
        var baseUrl = "<?php echo $baseUrl; ?>";
        
        $.ajaxSetup({
            data: {
                _csrf: $('meta[name=csrf-token]').prop('content')
            }
        });
    </script>

    <script src="<?php echo $baseUrl?>/assets/plugins/bootstrap/js/bootstrap.min.js"></script>
    
    <script src="<?php echo $baseUrl?>/assets/plugins/animsition/animsition.min.js"></script>
    <script src="<?php echo $baseUrl?>/assets/plugins/asscroll/jquery-asScroll.min.js"></script>
    <script src="<?php echo $baseUrl?>/assets/plugins/mousewheel/jquery.mousewheel.min.js"></script>
    <script src="<?php echo $baseUrl?>/assets/plugins/asscrollable/jquery.asScrollable.all.min.js"></script>
    <script src="<?php echo $baseUrl?>/assets/plugins/ashoverscroll/jquery-asHoverScroll.min.js"></script>

    <!-- Plugins -->
    <script src="<?php echo $baseUrl?>/assets/plugins/screenfull/screenfull.js"></script>
    <script src="<?php echo $baseUrl?>/assets/plugins/slidepanel/jquery-slidePanel.min.js"></script>
    <script src="<?php echo $baseUrl?>/assets/plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="<?php echo $baseUrl?>/assets/plugins/datatables-fixedheader/dataTables.fixedHeader.js"></script>
    <script src="<?php echo $baseUrl?>/assets/plugins/datatables-bootstrap/dataTables.bootstrap.min.js"></script>
    <script src="<?php echo $baseUrl?>/assets/plugins/datatables-responsive/dataTables.responsive.js"></script>
    <script src="<?php echo $baseUrl?>/assets/plugins/datatables-tabletools/dataTables.tableTools.js"></script>
    
    <!-- Scripts -->
    <script src="<?php echo $baseUrl?>/assets/js/core.min.js"></script>
    <script src="<?php echo $baseUrl?>/assets/js/site.min.js"></script>
    <script src="<?php echo $baseUrl?>/assets/js/app.min.js"></script>

    <script src="<?php echo $baseUrl?>/assets/plugins/sections/menu.min.js"></script>
    <script src="<?php echo $baseUrl?>/assets/plugins/sections/menubar.min.js"></script>

    <script src="<?php echo $baseUrl?>/assets/plugins/components/asscrollable.min.js"></script>
    <script src="<?php echo $baseUrl?>/assets/plugins/components/animsition.min.js"></script>
    <script src="<?php echo $baseUrl?>/assets/plugins/components/slidepanel.min.js"></script> 
    <script src="<?php echo $baseUrl?>/assets/plugins/autosize/autosize.min.js"></script>
    <script src="<?php echo $baseUrl?>/assets/plugins/components/datatables.min.js"></script>
    <script src="<?php echo $baseUrl?>/assets/plugins/webui-popover/jquery.webui-popover.min.js"></script>
    <script src="<?php echo $baseUrl?>/assets/plugins/nepalidatepicker/nepali.datepicker.v2.min.js"></script>
    <script src="<?php echo $baseUrl?>/assets/js/jquery.validate.min.js"></script>
    <script src="<?php echo $baseUrl?>/assets/plugins/sweetalert/sweetalert.min.js"></script>
    <script src="<?php echo $baseUrl?>/assets/plugins/bootbox/bootbox.min.js"></script>
    <script src="<?php echo $baseUrl; ?>/assets/plugins/bootstrap-select/bootstrap-select.min.js"></script>

    <script src="<?php echo $baseUrl?>/assets/js/material.min.js"></script>
    <script src="<?php echo $baseUrl?>/assets/js/bootstrap-touchspin.min.js"></script>
    <script src="<?php echo $baseUrl?>/assets/js/jquery.bootstrap-touchspin.min.js"></script>
    <script src="<?php echo $baseUrl?>/assets/js/webui-popover.min.js"></script>
    <script src="<?php echo $baseUrl?>/assets/js/responsive-tabs.min.js"></script>
    <script src="<?php echo $baseUrl?>/assets/js/tabs.min.js"></script>
    
    <script src="<?php echo $baseUrl; ?>/assets/js/jquery.slimscroll.js"></script>
    
    <script src="<?php echo $baseUrl?>/assets/js/form-validation-rules.js"></script>
    <script src="<?php echo $baseUrl?>/assets/js/init.js"></script>
    <script src="<?php echo $baseUrl?>/assets/js/functions.js"></script>
    <script src="<?php echo $baseUrl?>/assets/software/reset-master.js"></script>
    <script src="<?php echo $baseUrl?>/assets/plugins/toastr/toastr.min.js"></script>

    <!--<script type="text/javascript" src="<?php echo $baseUrl; ?>/assets/software/remove-ip.js"></script>-->
    <script type="text/javascript" src="<?php echo $baseUrl; ?>/assets/software/change-date-format.js"></script>

        <?php if ($right_click): ?>
        <ul class='custom-menu-right-click'>
            <li data-action = "reload">Reload</li>
            <li data-action = "back">Back</li>
        </ul>

        <script>
            /*right_click_menu();*/
        </script>
        <?php endif;?>
    
    <script>  

      (function(document, window, $) {
          'use strict';

          var Site = window.Site;
          $(document).ready(function() {
              Site.run();
          });
      })(document, window, jQuery);

      common_script();

      /* --- function to get the starting date of the current nepali month --- */
      var d = new Date();
      var curr_date = d.getDate();
      var curr_month = '0'+(d.getMonth()+1);
      var curr_year = d.getFullYear();
      var temp_date = curr_year+ "-" +curr_month + "-" +curr_date;

      var date = changedate(AD2BS(temp_date));
      var breakdown = date.split('-');
      breakdown[2] = '01';
      var curr_nepali_start_date = breakdown.join('-');
      var converted_start_date = changedate(BS2AD(curr_nepali_start_date));

      var fullDate = new Date();
      var twoDigitMonth = (fullDate.getMonth()+1) + "";
                          if(twoDigitMonth.length==1)  twoDigitMonth="0" +twoDigitMonth;

      var twoDigitDate = fullDate.getDate()+"";if(twoDigitDate.length==1) twoDigitDate="0" +twoDigitDate;
      var curr_eng_date = fullDate.getFullYear() + "-" + twoDigitMonth + "-" + twoDigitDate;

      $('.get-current-nepali-month-cancelled-history').attr('href', baseUrl+"/reports/cancelled-history/?from="+converted_start_date+"&to="+curr_eng_date);
      $('.get-current-nepali-month-kot-return-history').attr('href', baseUrl+"/reports/kot-return/?from="+converted_start_date+"&to="+curr_eng_date);
      $('.get-current-nepali-month-foc-history').attr('href', baseUrl+"/reports/foc-history/?from="+converted_start_date+"&to="+curr_eng_date);
      $('.get-current-nepali-month-sales-sumary').attr('href', baseUrl+"/reports/history/?from="+converted_start_date+"&to="+curr_eng_date);
      $('.get-current-nepali-month-distribute-tip').attr('href', baseUrl+"/tips/?from="+converted_start_date+"&to="+curr_eng_date);
      

      /* --- function to get the starting date of the current nepali month --- */

      var myVar = 0;
      function myTimer() {
          myVar = setInterval(function(){
            var d = new Date();
            $('.show-time').html(d.toLocaleTimeString());
          }, 1000);
      }

     myTimer();

      if(window.location.href.indexOf("table") > -1) {
        $('.by-ks').hide();
      }

      toastr.options = {
          closeButton: true,
          progressBar: true,
          showMethod: 'slideDown',
          timeOut: 4000
      };

    </script>

    <?php if(Yii::$app->session['session_device'] == 'mobile') :?>
          <script>
            $('.by-ks').hide();
          </script>
    <?php endif; ?>

    <?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>