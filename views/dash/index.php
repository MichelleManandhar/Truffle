<?php
use app\components\Misc;
$baseUrl = Yii::$app->request->baseUrl;
$currency = strtoupper(Yii::$app->session['currency']);
$this->registerJsFile($baseUrl . '/assets/js/users.min.js');

$temp = explode(":",Yii::$app->session['fiscal_year']);
$starting_fiscal_year_from_date = $temp[0];
$starting_fiscal_year_to_date   = $temp[1];
$fiscal_year_start_year = $temp[0];
$fiscal_year_end_year   = $temp[1];
if ((date('Y-m-d') >= $starting_fiscal_year_from_date) 
        && ( date('Y-m-d') < $starting_fiscal_year_to_date) )
{ 
    $this->registerJsFile($baseUrl . '/assets/plugins/chart-js/Chart.min.js');
    $this->registerJsFile($baseUrl . '/assets/plugins/configs/config-colors.min.js');
    $this->registerJsFile($baseUrl . '/assets/plugins/chartjs/chartjs.min.js');
    $this->registerCssFile($baseUrl . '/assets/plugins/chartjs/chartjs.min081a.css?v2.0.0');
}

$this->registerCssFile($baseUrl . '/assets/plugins/simply-toast/simply-toast.min.css');
$this->registerJsFile($baseUrl . '/assets/plugins/simply-toast/simply-toast.min.js');
$this->registerJsFile($baseUrl . '/assets/software/invoice.js');
$this->registerJsFile($baseUrl . '/assets/software/dash.js');
if(Yii::$app->session->hasFlash('notice')){ 
    $this->registerJsFile($baseUrl . '/assets/software/alert-notice.js');
}

if (Yii::$app->session->hasFlash('close_day_alert')): ?>
    <div class="alert alert-danger alert-dismissable custom-close-day-alert">
        <button aria-hidden="true" data-dismiss="alert" class="close custom-close-day-alert-btn" type="button">×</button>
        <?php echo Yii::$app->session->getFlash('close_day_alert'); ?>
    </div>
<?php endif; 

$csrf_name  = Yii::$app->request->csrfParam;
$csrf_value = Yii::$app->request->csrfToken;
$this->title = Yii::$app->params['system'] . ' | Dashboard'; 
?>
<script>
    $('body').addClass('dashboard');
</script>

<div class="default_notify clearfix"></div>
<div class="page-content container-fluid">
    <?php
        if ((date('Y-m-d') >= $starting_fiscal_year_from_date) 
                && ( date('Y-m-d') < $starting_fiscal_year_to_date) )
        { 
    ?>
        <div class="row" data-plugin="matchHeight" data-by-row="true">
            <div class="col-xlg-4 col-lg-4 col-md-4 col-sm-12">
                <!-- Panel Web Designer -->
                <div class="widget widget-shadow">
                    <div class="widget-content text-center bg-white padding-20">
                        <?php if (!empty($profile['profile_picture']) && file_exists(Yii::$app->params['upload_path']['profile-picture'] . $profile['profile_picture'])) : ?>
                            <div class="featured-image-wrapper">
                                <div class="avatar avatar-125 margin-bottom-20" style="width: 150px;height: 150px;">
                                    <a href="<?php echo $baseUrl;?>/user/profile-picture">
                                    <img class="image-display" style="height: 150px;" src="<?php echo Yii::$app->params['upload_load_path']['profile-picture'] . $profile['profile_picture'];?>">
                                    </a>
                                </div>
                            </div>
                        <?php else : ?>
                            <div class="avatar avatar-125 margin-bottom-20">
                                <a href="<?php echo $baseUrl;?>/user/profile-picture">
                                <img src="<?php echo Yii::$app->params['upload_load_path']['image'] . '../images/user-profile-pic.jpg';?>" alt="<?php echo $user['name'];?>"></a>
                            </div>
                        <?php endif; ?>
                        <p class="font-size-20 blue-grey-700"><?php echo ucwords($user['name']); ?></p>
                        <p><a class="btn btn-primary font-size-11" href="<?php echo $baseUrl . '/debtor/list'; ?>">DEBTOR LIST</a></p>
                        <p><a class="btn btn-primary font-size-11" href="<?php echo $baseUrl;?>/reports/history/?from=<?php echo date('Y-m-d', strtotime('-30 days')); ?>&to=<?php echo date('Y-m-d');?>">TRANSACTION HISTORY</a></p>
                        <p><a class="btn btn-primary capacity-modal-btn font-size-11" data-target=".modal-capacity" data-toggle="modal" href="#">CHANGE RESTAURANT CAPACITY</a></p>
                    </div>
                </div>
                <!-- End Panel Web Designer -->
            </div>
            <div class="col-xlg-8 col-lg-8 col-md-8 col-sm-12">
                <div class="widget widget-shadow">
                    <div class="widget-content padding-20">
                        <div class="col-sm-12 col-xs-12 padding-bottom-20">
                            <div class="row">
                                <div class="col-md-8 col-lg-8 col-sm-8">
                                    <h4 class="blue-grey-700 margin-0">WEEKLY SALES REPORT <?php echo ($weekly_sales_true_k) ? '(in Thousands)' : '';?></h4>
                                </div>

                                <div class="col-md-4 col-lg-4 col-sm-4">
                                    <span class="pull-right">
                                        <ul class="list-unstyled">
                                            <li class="margin-bottom-5">
                                                <i class="icon fa-square red-600 margin-right-5" aria-hidden="true"></i>                          Sales
                                            </li>
                                            <li class="margin-bottom-5">
                                                <i class="icon fa-square green-600 margin-right-5" aria-hidden="true"></i>                          Cash In
                                            </li>
                                        </ul>
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class="text-center">
                            <canvas id="weekly-sales" height="180" width="360"></canvas>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row" data-plugin="matchHeight" data-by-row="true">
            <div class="col-xlg-4 col-lg-4 col-md-4 col-sm-12" >
                <!-- Panel Overall Sales -->
                <div class="widget widget-shadow bg-green-600 white">
                    <div class="widget-content padding-30">
                        <div class="counter counter-lg counter-inverse text-left">
                            <div class="counter-label margin-bottom-20">
                                <div>OVERALL SALES (FISCAL YEAR) <?php echo ($fiscal_sales['percentage'] > 100) ? '<span class="target-crossed pull-right">Target Crossed +'.($fiscal_sales['percentage'] - 100).'%</span>' : (($fiscal_sales['percentage'] == 100) ? '<span class="target-crossed pull-right">Target Reached</span>' : '<span class="pull-right">'.$fiscal_sales['percentage'].'% </span>'); ?></div>
                                <div>16th July, <?php echo (date('m-d') <= "07-16") ? date('Y')-1 : date('Y');?> - 15th July, <?php echo (date('m-d') >= "07-15") ? date('Y')+1 : date('Y');?></div>
                            </div>
                            <div class="counter-number-group margin-bottom-15">
                                <span class="counter-number-related">Rs</span>
                                <span class="counter-number"><?php echo ($fiscal_sales['total_amount'] > 1000) ? number_format($fiscal_sales['total_amount'] / 1000, 2, '.', ',') . 'K' : number_format($fiscal_sales['total_amount'], 2, '.', ',');?></span>
                            </div>
                            <div class="counter-label">
                                <div class="progress progress-xs margin-bottom-10 bg-green-800">
                                    <div class="progress-bar progress-bar-info bg-white" style="width: <?php echo $fiscal_sales['percentage'];?>%" aria-valuemax="100"
                                         aria-valuemin="0" aria-valuenow="<?php echo $fiscal_sales['percentage'];?>" role="progressbar">
                                        <span class="sr-only"><?php echo $fiscal_sales['percentage'];?>%</span>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
                <!-- End Panel Overall Sales -->
            </div>
            <div class="col-xlg-4 col-lg-4 col-md-4 col-sm-12" >
                <!-- Panel Today's Sales -->
                <div class="widget widget-shadow bg-blue-600 white">
                    <div class="widget-content padding-30">
                        <div class="counter counter-lg counter-inverse text-left">
                            <div class="counter-label margin-bottom-20">
                                <div>THIS MONTH'S SALES <?php echo ($monthly_sales['percentage'] > 100) ? '<span class="target-crossed pull-right">Target Crossed +'.($monthly_sales['percentage'] - 100).'%</span>' : (($monthly_sales['percentage'] == 100) ? '<span class="target-crossed pull-right">Target Reached</span>' : '<span class="pull-right">'.$monthly_sales['percentage'].'% </span>'); ?></div>
                                <div><?php echo date('F') . ', ' . date('Y');?></div>
                            </div>
                            <div class="counter-number-group margin-bottom-10">
                                <span class="counter-number-related">Rs</span>
                                <span class="counter-number"><?php echo ($monthly_sales['total_amount'] > 1000) ? number_format($monthly_sales['total_amount'] / 1000, 2, '.', ',') . 'K' : number_format($monthly_sales['total_amount'], 2, '.', ',');?></span>
                            </div>
                            <div class="counter-label">
                                <div class="progress progress-xs margin-bottom-10 bg-blue-800">
                                    <div class="progress-bar progress-bar-info bg-white" style="width: <?php echo $monthly_sales['percentage'];?>%" aria-valuemax="100"
                                         aria-valuemin="0" aria-valuenow="<?php echo $monthly_sales['percentage'];?>" role="progressbar">
                                        <span class="sr-only"><?php echo $monthly_sales['percentage'];?>%</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End Panel Today's Sales -->
            </div>
            <div class="col-xlg-4 col-lg-4 col-md-4 col-sm-12" >
                <!-- Panel Overall Sales -->
                <div class="widget widget-shadow bg-red-600 white">
                    <div class="widget-content padding-30">
                        <div class="counter counter-lg counter-inverse text-left">
                            <div class="counter-label margin-bottom-20">
                                <div>TODAY'S SALES<?php echo (($todays_sales['percentage'] > 100) ? '<span class="target-crossed pull-right">Target Crossed +'.($todays_sales['percentage'] - 100).'%</span>' : (($todays_sales['percentage'] == 100) ? '<span class="target-crossed pull-right">Target Reached</span>' : '<span class="pull-right">'.$todays_sales['percentage'].'% </span>')); ?></div>
                                <div><?php echo date("l, jS F, Y"); ?></div>
                            </div>
                            <div class="counter-number-group margin-bottom-10">
                                <span class="counter-number-related">Rs</span>
                                <span class="counter-number"><?php echo ($todays_sales['total_amount'] > 1000) ? number_format($todays_sales['total_amount'] / 1000, 2, '.', ',') . 'K' : number_format($todays_sales['total_amount'], 2, '.', ',');?></span>
                            </div>
                            <div class="counter-label">
                                <div class="progress progress-xs margin-bottom-10 bg-red-800">
                                    <div class="progress-bar progress-bar-info bg-white" style="width: <?php echo $todays_sales['percentage'];?>%" aria-valuemax="100"
                                         aria-valuemin="0" aria-valuenow="<?php echo $todays_sales['percentage'];?>" role="progressbar">
                                        <span class="sr-only"><?php echo $todays_sales['percentage'];?>%</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End Panel Overall Sales -->
            </div>
        </div>
        <div class="row" data-plugin="matchHeight" data-by-row="true">
            <div class="col-xlg-4 col-lg-4 col-md-4 col-sm-12" >
                <div class="widget widget-shadow" id="widgetTable">
                    <div class="widget-body custom-widget-body">
                      <h4 class="widget-title">
                        <span class="text-truncate">Total Report</span>
                      </h4>
                    </div>
                    <table class="table margin-bottom-0">
                        <tbody>
                            <tr>
                              <td>Number of customer</td>
                              <td class="green-600"><?php echo ($no_of_customer['total'] > 0) ? $no_of_customer['total'] : 0; ?></td>
                            </tr>
                            <tr>
                              <td>Average table sales</td>
                              <td class="green-600"><?= $currency ?> <?php echo $avg_table_sales; ?></td>
                            </tr>
                            <tr>
                              <td>Average sales per person</td>
                              <td class="green-600"><?= $currency ?> <?php echo $avg_sales_per_person; ?></td>
                            </tr>
                        </tbody>
                    </table>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="widget margin-bottom-90 margin-top-90">
                                <div class="widget-content bg-white">
                                    <div class="counter counter-lg">
                                        <div class="counter-label text-uppercase">Average time per table</div>
                                        <div class="counter-number-group">
                                          <span class="counter-icon green-600">
                                            <i class="icon fa-clock-o"></i>
                                          </span>
                                          <span class="counter-number font-size-20"><?php echo ($avg_time_per_table['hours'] > 0) ? $avg_time_per_table['hours'] : 00; ?>hr
                                <?php echo ($avg_time_per_table['minutes'] > 0) ? $avg_time_per_table['minutes'] : 00; ?>min
                                <?php echo ($avg_time_per_table['seconds'] > 0) ? $avg_time_per_table['seconds'] : 00; ?>sec</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xlg-8 col-lg-8 col-md-8 col-sm-12" >
                <div class="widget widget-shadow" id="widgetTable">
                    <div class="widget-body custom-widget-body">
                        <h4 class="widget-title">
                            <span class="text-truncate">Today's Summary</span>
                        </h4>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <table class="table margin-bottom-0">
                              <tbody>
                                <tr>
                                    <td><button class="btn btn-primary btn-xs view-todays-sales-detail">Total Sales</button></td>
                                    <td class="green-600"><?= $currency ?> <?php echo ($todays_sales['total_amount'] != null)?$todays_sales['total_amount'] : 0; ?></td>
                                </tr>
                                <tr>
                                    <td><button class="btn btn-primary btn-xs" data-toggle="modal" data-target=".modal-casn-in-detail">Total Cash In</button></td>
                                    <td class="red-600"><?= $currency ?> <?php echo $todays_cash_in; ?></td>
                                </tr>
                                <tr>
                                    <td>Total no. of items sold</td>
                                    <td class="green-600"><?php echo ($todays_items_sold['total'] != null)?$todays_items_sold['total'] : 0; ?></td>
                                </tr>
                                <tr>
                                    <td>Best Seller</td>
                                    <td class="red-600"><?php echo ($todays_best_seller != null)?$todays_best_seller['item_name'] : 'N/A'; ?></td>
                                </tr>
                                <tr>
                                    <td>Total Retail Sales</td>
                                    <td class="green-600"><?= $currency ?> <?php echo ($todays_retail_sales['total'] != null)?$todays_retail_sales['total'] : 0; ?></td>
                                </tr>
                                <tr>
                                    <td>Total Take Away Sales</td>
                                    <td class="green-600"><?= $currency ?> <?php echo ($todays_take_away_sales['total'] != null)?$todays_take_away_sales['total'] : 0; ?></td>
                                </tr>
                                <tr>
                                    <td>Total Pick Up Sales</td>
                                    <td class="green-600"><?= $currency ?> <?php echo ($todays_pick_up_sales['total'] != null)?$todays_pick_up_sales['total'] : 0; ?></td>
                                </tr>
                              </tbody>
                            </table>
                        </div>
                        <div class="col-md-6">
                            <table class="table margin-bottom-0">
                              <tbody>
                                <tr>
                                    <td>Total Delivery Sales</td>
                                    <td class="green-600"><?= $currency ?> <?php echo ($todays_delivery_sales['total'] != null)?$todays_delivery_sales['total'] : 0; ?></td>
                                </tr>
                                <tr>
                                    <td>No. of Customer</td>
                                    <td class="red-600"><?php echo ($todays_no_of_customer['total'] != null)?$todays_no_of_customer['total'] : 0; ?></td>
                                </tr>
                                <tr>
                                    <td>No. of tables occupied</td>
                                    <td class="green-600"><?php echo ($todays_no_of_tables_occupied['total'] != null)?$todays_no_of_tables_occupied['total'] : 0; ?></td>
                                </tr>
                                <tr>
                                    <td>Credit Collection</td>
                                    <td class="red-600"><?= $currency ?> <?php echo ($todays_credit_paid['total'] != null)?$todays_credit_paid['total'] : 0; ?></td>
                                </tr>
                                <tr>
                                    <td>Total service charge</td>
                                    <td class="green-600"><?= $currency ?> <?php echo ($todays_service_charge['total'] != null)?$todays_service_charge['total'] : 0; ?></td>
                                </tr>
                              </tbody>
                            </table>
                        </div>
                        
                        <div class="col-md-12">
                            <div class="margin-top-10">
                                <div class="row">
                                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                        <div class="widget">
                                            <div class="widget-content bg-white">
                                                <div class="counter counter-md">
                                                    <div class="counter-label text-uppercase font-size-12">Booking conversion rate</div>
                                                    <div class="counter-number-group">
                                                      <span class="counter-icon green-600">
                                                        <i class="wb-stats-bars"></i>
                                                      </span>
                                                      <span class="counter-number font-size-20"><?php echo ($todays_booking_conversion_rate != null)?$todays_booking_conversion_rate : 0; ?> % </span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                        <div class="widget">
                                            <div class="widget-content bg-white">
                                                <div class="counter counter-md">
                                                    <div class="counter-label text-uppercase font-size-12">Average time per table</div>
                                                    <div class="counter-number-group">
                                                      <span class="counter-icon green-600">
                                                        <i class="icon fa fa-clock-o"></i>
                                                      </span>
                                                      <span class="counter-number font-size-20"><?php echo ($todays_avg_time_per_table['hours'] > 0) ? $todays_avg_time_per_table['hours'] : 00; ?>hr
                                                        <?php echo ($todays_avg_time_per_table['minutes'] > 0) ? $todays_avg_time_per_table['minutes'] : 00; ?>min
                                                        <?php echo ($todays_avg_time_per_table['seconds'] > 0) ? $todays_avg_time_per_table['seconds'] : 00; ?>sec</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                        <div class="widget">
                                            <div class="widget-content bg-white">
                                                <div class="counter counter-md">
                                                    <div class="counter-label text-uppercase font-size-12">Capacity Rate</div>
                                                    <div class="counter-number-group">
                                                        <span class="counter-icon green-600">
                                                            <i class="wb-stats-bars"></i>
                                                        </span>
                                                        <span class="counter-number font-size-20"><?php echo ($todays_capacity_rate['total'] > 0) ? round( $todays_capacity_rate['total'] , 2) : 0; ?> %
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row" data-plugin="matchHeight" data-by-row="true">
            <div class="col-xlg-8 col-lg-8 col-md-8 col-sm-12">
                <div class="widget widget-shadow">
                    <div class="widget-content padding-20">
                        <div class="col-sm-12 col-xs-12 padding-bottom-20">
                            <div class="col-md-8 col-lg-8 col-sm-8">
                                <h4 class="blue-grey-700 margin-0">MONTHWISE SALES REPORT <?php echo ($monthwise_sales_true_k) ? '(in Thousands)' : '';?></h4>
                            </div>

                            <div class="col-md-4 col-lg-4 col-sm-4">
                                <span class="pull-right">
                                     <ul class="list-unstyled">
                                        <li class="margin-bottom-5">
                                            <i class="icon fa-square red-600 margin-right-5" aria-hidden="true"></i>                          Sales
                                        </li>
                                        <li class="margin-bottom-5">
                                            <i class="icon fa-square green-600 margin-right-5" aria-hidden="true"></i>                          Cash In
                                        </li>
                                    </ul>
                                </span>
                            </div>
                        </div>
                        <div class="text-center">
                            <canvas id="monthwise-sales" height="185" width="360"></canvas>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xlg-4 col-lg-4 col-md-4 col-sm-12">
                <div class="widget widget-shadow table-responsive">
                    <h4 class="padding-10 margin-0">
                        <span class="text-truncate">Best Seller</span>
                    </h4>
                    <div class="nav-tabs-horizontal custom-nav-tab">
                        <ul class="nav nav-tabs nav-justified" data-plugin="nav-tabs" role="tablist">
                            <li class="active" role="presentation"><a data-toggle="tab" href="#best-seller-all"  aria-controls="best-seller-all" role="tab">All</a>
                            </li>
                            <li role="presentation"><a data-toggle="tab" href="#best-seller-today" aria-controls="best-seller-today"
                              role="tab">Today</a>
                            </li>
                            <li role="presentation"><a data-toggle="tab" href="#best-seller-this-month" aria-controls="best-seller-this-month"
                              role="tab">This Month</a>
                            </li>
                            <li role="presentation"><a data-toggle="tab" href="#best-seller-this-year" aria-controls="best-seller-this-year"
                              role="tab">This Year</a>
                            </li>
                            <li class="dropdown" role="presentation">
                                <a class="dropdown-toggle" data-toggle="dropdown" href="#" aria-expanded="false">
                                <span class="caret"></span>Menu </a>
                                <ul class="dropdown-menu" role="menu">
                                    <li class="active" role="presentation"><a data-toggle="tab" href="#best-seller-all" aria-controls="best-seller-all"
                                  role="tab">All</a></li>
                                    <li role="presentation"><a data-toggle="tab" href="#best-seller-today" aria-controls="best-seller-today"
                                  role="tab">Today</a></li>
                                    <li role="presentation"><a data-toggle="tab" href="#best-seller-this-month" aria-controls="best-seller-this-month"
                                  role="tab">This Month</a></li>
                                    <li role="presentation"><a data-toggle="tab" href="#best-seller-this-year" aria-controls="best-seller-this-year"
                                  role="tab">This Year</a></li>
                                </ul>
                            </li>
                        </ul>
                        <div class="tab-content padding-top-20">
                            <div class="tab-pane active" id="best-seller-all" role="tabpanel">
                                <div class="scroll-height-280 slimscrollstart-position-dashboard">
                                    <table class="table margin-bottom-0 scrollable table-hover table-striped">
                                        <thead>
                                            <tr>
                                                <th>S.N.</th>
                                                <th>Menu Item</th>
                                                <th><span class="pull-right">Count</span></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php if ($best_seller_all != null) : $i=0;
                                                foreach($best_seller_all as $best) : $i++;
                                            ?>
                                                <tr>
                                                    <td><?php echo $i; ?>.</td>
                                                    <td><?php echo ucwords($best['item_name']);?></td>
                                                    <td><span class="blue-600 pull-right"><?php echo number_format($best['total_quantity'], 0, '.', ',');?></span></td>
                                                </tr>
                                                <?php endforeach; ?>

                                                <?php if($best_special_item_seller_all != null) : ?>
                                                    <tr class="color-green">
                                                        <td><?php echo ++$i; ?>.</td>
                                                        <td>Special Items</td>
                                                        <td><span class="blue-600 pull-right"><?php echo number_format($best_special_item_seller_all['total_quantity'], 0, '.', ',');?></span></td>
                                                    </tr>
                                                <?php endif; ?>
                                            <?php else :?>
                                                <tr>
                                                    <td colspan="3">No data to display.</td>
                                                </tr>
                                            <?php endif; ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="tab-pane" id="best-seller-today" role="tabpanel">
                                <div class="scroll-height-280 slimscrollstart-position-dashboard">
                                    <table class="table margin-bottom-0 scrollable table-hover table-striped">
                                        <thead>
                                            <tr>
                                                <th>S.N.</th>
                                                <th>Menu Item</th>
                                                <th><span class="pull-right">Count</span></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php if ($best_seller_today != null) : $i=0;
                                                foreach($best_seller_today as $best) : $i++;
                                            ?>
                                                <tr>
                                                    <td><?php echo $i; ?>.</td>
                                                    <td><?php echo ucwords($best['item_name']);?></td>
                                                    <td><span class="blue-600 pull-right"><?php echo number_format($best['total_quantity'], 0, '.', ',');?></span></td>
                                                </tr>
                                                <?php endforeach; ?>

                                                <?php if($best_special_item_seller_today != null) : ?>
                                                    <tr class="color-green">
                                                        <td><?php echo ++$i; ?>.</td>
                                                        <td>Special Items</td>
                                                        <td><span class="blue-600 pull-right"><?php echo number_format($best_special_item_seller_today['total_quantity'], 0, '.', ',');?></span></td>
                                                    </tr>
                                                <?php endif; ?>
                                            <?php else :?>
                                            <tr>
                                                <td colspan="3">No data to display.</td>
                                            </tr>
                                            <?php endif; ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="tab-pane" id="best-seller-this-month" role="tabpanel">
                                <div class="scroll-height-280 slimscrollstart-position-dashboard">
                                    <table class="table margin-bottom-0 scrollable table-hover table-striped">
                                        <thead>
                                            <tr>
                                                <th>S.N.</th>
                                                <th>Menu Item</th>
                                                <th><span class="pull-right">Count</span></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php if ($best_seller_month != null) : $i=0;
                                                foreach($best_seller_month as $best) : $i++;
                                            ?>
                                                <tr>
                                                    <td><?php echo $i; ?>.</td>
                                                    <td><?php echo ucwords($best['item_name']);?></td>
                                                    <td><span class="blue-600 pull-right"><?php echo number_format($best['total_quantity'], 0, '.', ',');?></span></td>
                                                </tr>
                                                <?php endforeach; ?>

                                                <?php if($best_special_item_seller_month != null) : ?>
                                                    <tr class="color-green">
                                                        <td><?php echo ++$i; ?>.</td>
                                                        <td>Special Items</td>
                                                        <td><span class="blue-600 pull-right"><?php echo number_format($best_special_item_seller_month['total_quantity'], 0, '.', ',');?></span></td>
                                                    </tr>
                                                <?php endif; ?>
                                            <?php else :?>
                                            <tr>
                                                <td colspan="3">No data to display.</td>
                                            </tr>
                                            <?php endif; ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="tab-pane" id="best-seller-this-year" role="tabpanel">
                                <div class="scroll-height-280 slimscrollstart-position-dashboard">
                                    <table class="table margin-bottom-0 scrollable table-hover table-striped">
                                        <thead>
                                            <tr>
                                                <th>S.N.</th>
                                                <th>Menu Item</th>
                                                <th><span class="pull-right">Count</span></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php if ($best_seller_year != null) : $i=0;
                                                foreach($best_seller_year as $best) : $i++;
                                            ?>
                                                <tr>
                                                    <td><?php echo $i; ?>.</td>
                                                    <td><?php echo ucwords($best['item_name']);?></td>
                                                    <td><span class="blue-600 pull-right"><?php echo number_format($best['total_quantity'], 0, '.', ',');?></span></td>
                                                </tr>
                                                <?php endforeach; ?>

                                                <?php if($best_special_item_seller_year != null) : ?>
                                                    <tr class="color-green">
                                                        <td><?php echo ++$i; ?>.</td>
                                                        <td>Special Items</td>
                                                        <td><span class="blue-600 pull-right"><?php echo number_format($best_special_item_seller_year['total_quantity'], 0, '.', ',');?></span></td>
                                                    </tr>
                                                <?php endif; ?>
                                            <?php else :?>
                                            <tr>
                                                <td colspan="3">No data to display.</td>
                                            </tr>
                                            <?php endif; ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row" data-plugin="matchHeight" data-by-row="true">
            <div class="col-xlg-8 col-lg-8 col-md-8 col-sm-12">
                <div class="widget widget-shadow">
                    <div class="widget-content padding-20">
                        <div class="col-sm-12 col-xs-12 padding-bottom-20">
                            <h4 class="blue-grey-700 margin-0">Monthwise Capacity Rate ( in % )</h4>
                        </div>
                        <div class="text-center">
                            <canvas id="monthwise-capacity-rate" height="185" width="360"></canvas>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xlg-4 col-lg-4 col-md-4 col-sm-12">
                <div class="widget widget-shadow table-responsive">
                    <h4 class="padding-10 margin-0">
                        <span class="text-truncate">Item Wise Gross Sales</span>
                    </h4>
                    <div class="nav-tabs-horizontal custom-nav-tab">
                        <ul class="nav nav-tabs nav-justified" data-plugin="nav-tabs" role="tablist">
                            <li class="active" role="presentation"><a data-toggle="tab" href="#gross-seller-all"  aria-controls="gross-seller-all" role="tab">All</a>
                            </li>
                            <li role="presentation"><a data-toggle="tab" href="#gross-seller-today" aria-controls="gross-seller-today"
                              role="tab">Today</a>
                            </li>
                            <li role="presentation"><a data-toggle="tab" href="#gross-seller-this-month" aria-controls="gross-seller-this-month"
                              role="tab">This Month</a>
                            </li>
                            <li role="presentation"><a data-toggle="tab" href="#gross-seller-this-year" aria-controls="gross-seller-this-year"
                              role="tab">This Year</a>
                            </li>
                            <li class="dropdown" role="presentation">
                                <a class="dropdown-toggle" data-toggle="dropdown" href="#" aria-expanded="false">
                                <span class="caret"></span>Menu </a>
                                <ul class="dropdown-menu" role="menu">
                                    <li class="active" role="presentation"><a data-toggle="tab" href="#gross-seller-all" aria-controls="gross-seller-all"
                                  role="tab">All</a></li>
                                    <li role="presentation"><a data-toggle="tab" href="#gross-seller-today" aria-controls="gross-seller-today"
                                  role="tab">Today</a></li>
                                    <li role="presentation"><a data-toggle="tab" href="#gross-seller-this-month" aria-controls="gross-seller-this-month"
                                  role="tab">This Month</a></li>
                                    <li role="presentation"><a data-toggle="tab" href="#gross-seller-this-year" aria-controls="gross-seller-this-year"
                                  role="tab">This Year</a></li>
                                </ul>
                            </li>
                        </ul>
                        <div class="tab-content padding-top-20">
                            <div class="tab-pane active" id="gross-seller-all" role="tabpanel">
                                <div class="scroll-height-280 slimscrollstart-position-dashboard">
                                    <table class="table margin-bottom-0 scrollable table-hover table-striped">
                                        <thead>
                                            <tr>
                                                <th>S.N.</th>
                                                <th>Menu Item</th>
                                                <th><span class="pull-right">Amount</span></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php if ($gross_sales_all != null) : $i=0;
                                                $special_item_amount_all = 0;
                                                $total_all = 0;
                                                foreach($gross_sales_all as $gross) : $i++;
                                                    if($gross['total_amount'] != null) {
                                                    ?>
                                                        <?php if($gross['type'] != null && $gross['type'] == Yii::$app->params['item_type']['regular']) : 
                                                                $total_all += $gross['total_amount'];
                                                            ?>
                                                            <tr>
                                                                <td><?php echo $i; ?>.</td>
                                                                <td><?php echo ucwords($gross['item_name']);?></td>
                                                                <td>
                                                                    <span class="blue-600 pull-right"><?= $currency ?> <?php echo number_format($gross['total_amount'], 2, '.', ',');?></span>
                                                                </td>
                                                            </tr>
                                                        <?php else: 
                                                                $special_item_amount_all += $gross['total_amount'];
                                                            ?>
                                                        <?php endif; ?>
                                                    <?php } ?>
                                                <?php endforeach; ?>
                                                <?php if($special_item_amount_all > 0) : ?>
                                                    <?php $total_all += $special_item_amount_all; ?>
                                                    <tr class="color-green">
                                                        <td><?php echo ++$i; ?>.</td>
                                                        <td><?php echo 'Special Items';?></td>
                                                        <td><span class="pull-right"><?= $currency ?> <?php echo number_format($special_item_amount_all, 2, '.', ',');?></span></td>
                                                    </tr>
                                                <?php endif; ?>

                                                <tr>
                                                    <td></td>
                                                    <td><span class="pull-right">Sub Total   : </span></td>
                                                    <td><span class="blue-600 pull-right"><?= $currency ?> <?php echo number_format($total_all, 2, '.', ',');?></span></td>
                                                </tr>

                                                <tr class="color-red">
                                                    <td></td>
                                                    <td><span class="pull-right">Total Discount : </span></td>
                                                    <td><span class="pull-right"><?= $currency ?> <?php echo number_format($gross_sales_all_discount['discount_total'], 2, '.', ',');?></span></td>
                                                </tr>

                                                <tr>
                                                    <td></td>
                                                    <td><span class="pull-right">Total Sales   : </span></td>
                                                    <td><span class="blue-600 pull-right"><?= $currency ?> <?php echo number_format($total_all - $gross_sales_all_discount['discount_total'], 2, '.', ',');?></span></td>
                                                </tr>
                                            <?php else :?>
                                            <tr>
                                                <td colspan="3">No data to display.</td>
                                            </tr>
                                            <?php endif; ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="tab-pane" id="gross-seller-today" role="tabpanel">
                                <div class="scroll-height-280 slimscrollstart-position-dashboard">
                                    <table class="table margin-bottom-0 scrollable table-hover table-striped">
                                        <thead>
                                            <tr>
                                                <th>S.N.</th>
                                                <th>Menu Item</th>
                                                <th><span class="pull-right">Amount</span></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php if ($gross_sales_today != null) : $i=0;
                                                $special_item_amount_today = 0;
                                                $total_today = 0;
                                                foreach($gross_sales_today as $gross) : $i++;
                                                    if($gross['total_amount'] != null) {
                                                    ?>
                                                        <?php if($gross['type'] != null && $gross['type'] == Yii::$app->params['item_type']['regular']) : 
                                                                $total_today += $gross['total_amount'];
                                                            ?>
                                                            <tr>
                                                                <td><?php echo $i; ?>.</td>
                                                                <td><?php echo ucwords($gross['item_name']);?></td>
                                                                <td><span class="blue-600 pull-right"><?= $currency ?> <?php echo number_format($gross['total_amount'], 2, '.', ',');?></span></td>
                                                            </tr>
                                                        <?php else: 
                                                                $special_item_amount_today += $gross['total_amount'];
                                                            ?>
                                                        <?php endif; ?>
                                                    <?php } ?>
                                                <?php endforeach; ?>
                                                <?php if($special_item_amount_today > 0) : ?>
                                                    <?php $total_today += $special_item_amount_today; ?>
                                                    <tr class="color-green">
                                                        <td><?php echo ++$i; ?>.</td>
                                                        <td><?php echo 'Special Items';?></td>
                                                        <td><span class="pull-right"><?= $currency ?> <?php echo number_format($special_item_amount_today, 2, '.', ',');?></span></td>
                                                    </tr>
                                                <?php endif; ?>

                                                <tr>
                                                    <td></td>
                                                    <td><span class="pull-right">Sub Total   : </span></td>
                                                    <td><span class="blue-600 pull-right"><?= $currency ?> <?php echo number_format($total_today, 2, '.', ',');?></span></td>
                                                </tr>

                                                <tr class="color-red">
                                                    <td></td>
                                                    <td><span class="pull-right">Total Discount : </span></td>
                                                    <td><span class="pull-right"><?= $currency ?> <?php echo number_format($gross_sales_today_discount['discount_total'], 2, '.', ',');?></span></td>
                                                </tr>

                                                <tr>
                                                    <td></td>
                                                    <td><span class="pull-right">Total Sales   : </span></td>
                                                    <td><span class="blue-600 pull-right"><?= $currency ?> <?php echo number_format($total_today - $gross_sales_today_discount['discount_total'], 2, '.', ',');?></span></td>
                                                </tr>
                                            <?php else :?>
                                            <tr>
                                                <td colspan="3">No data to display.</td>
                                            </tr>
                                            <?php endif; ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="tab-pane" id="gross-seller-this-month" role="tabpanel">
                                <div class="scroll-height-280 slimscrollstart-position-dashboard">
                                    <table class="table margin-bottom-0 scrollable table-hover table-striped">
                                        <thead>
                                            <tr>
                                                <th>S.N.</th>
                                                <th>Menu Item</th>
                                                <th><span class="pull-right">Amount</span></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php if ($gross_sales_month != null) : $i=0;
                                                $special_item_amount_month = 0;
                                                $total_month = 0;
                                                foreach($gross_sales_month as $gross) : $i++;
                                                    if($gross['total_amount'] != null) {
                                                    ?>
                                                        <?php if($gross['type'] != null && $gross['type'] == Yii::$app->params['item_type']['regular']) : 
                                                                $total_month += $gross['total_amount'];
                                                            ?>
                                                            <tr>
                                                                <td><?php echo $i; ?>.</td>
                                                                <td><?php echo ucwords($gross['item_name']);?></td>
                                                                <td><span class="blue-600 pull-right"><?= $currency ?> <?php echo number_format($gross['total_amount'], 2, '.', ',');?></span></td>
                                                            </tr>
                                                        <?php else: 
                                                                $special_item_amount_month += $gross['total_amount'];
                                                            ?>
                                                        <?php endif; ?>
                                                    <?php } ?>
                                                <?php endforeach; ?>
                                                <?php if($special_item_amount_month > 0) : ?>
                                                    <?php $total_month += $special_item_amount_month; ?>
                                                    <tr class="color-green">
                                                        <td><?php echo ++$i; ?>.</td>
                                                        <td><?php echo 'Special Items';?></td>
                                                        <td><span class="pull-right"><?= $currency ?> <?php echo number_format($special_item_amount_month, 2, '.', ',');?></span></td>
                                                    </tr>
                                                <?php endif; ?>

                                                <tr>
                                                    <td></td>
                                                    <td><span class="pull-right">Sub Total   : </span></td>
                                                    <td><span class="blue-600 pull-right"><?= $currency ?> <?php echo number_format($total_month, 2, '.', ',');?></span></td>
                                                </tr>

                                                <tr class="color-red">
                                                    <td></td>
                                                    <td><span class="pull-right">Total Discount : </span></td>
                                                    <td><span class="pull-right"><?= $currency ?> <?php echo number_format($gross_sales_month_discount['discount_total'], 2, '.', ',');?></span></td>
                                                </tr>

                                                <tr>
                                                    <td></td>
                                                    <td><span class="pull-right">Total Sales   : </span></td>
                                                    <td><span class="blue-600 pull-right"><?= $currency ?> <?php echo number_format($total_month - $gross_sales_month_discount['discount_total'], 2, '.', ',');?></span></td>
                                                </tr>
                                            <?php else :?>
                                            <tr>
                                                <td colspan="3">No data to display.</td>
                                            </tr>
                                            <?php endif; ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="tab-pane" id="gross-seller-this-year" role="tabpanel">
                                <div class="scroll-height-280 slimscrollstart-position-dashboard">
                                    <table class="table margin-bottom-0 scrollable table-hover table-striped">
                                        <thead>
                                            <tr>
                                                <th>S.N.</th>
                                                <th>Menu Item</th>
                                                <th><span class="pull-right">Amount</span></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php if ($gross_sales_year != null) : $i=0;
                                                $special_item_amount_year = 0;
                                                $total_year = 0;
                                                foreach($gross_sales_year as $gross) : $i++;
                                                    if($gross['total_amount'] != null) {
                                                    ?>
                                                        <?php if($gross['type'] != null && $gross['type'] == Yii::$app->params['item_type']['regular']) : 
                                                                $total_year += $gross['total_amount'];
                                                            ?>
                                                            <tr>
                                                                <td><?php echo $i; ?>.</td>
                                                                <td><?php echo ucwords($gross['item_name']);?></td>
                                                                <td><span class="blue-600 pull-right"><?= $currency ?> <?php echo number_format($gross['total_amount'], 2, '.', ',');?></span></td>
                                                            </tr>
                                                        <?php else: 
                                                                $special_item_amount_year += $gross['total_amount'];
                                                            ?>
                                                        <?php endif; ?>
                                                    <?php } ?>
                                                <?php endforeach; ?>
                                                <?php if($special_item_amount_year > 0) : ?>
                                                    <?php $total_year += $special_item_amount_year; ?>
                                                    <tr class="color-green">
                                                        <td><?php echo ++$i; ?>.</td>
                                                        <td><?php echo 'Special Items';?></td>
                                                        <td><span class="pull-right"><?= $currency ?> <?php echo number_format($special_item_amount_year, 2, '.', ',');?></span></td>
                                                    </tr>
                                                <?php endif; ?>

                                                <tr>
                                                    <td></td>
                                                    <td><span class="pull-right">Sub Total   : </span></td>
                                                    <td><span class="blue-600 pull-right"><?= $currency ?> <?php echo number_format($total_year, 2, '.', ',');?></span></td>
                                                </tr>

                                                <tr class="color-red">
                                                    <td></td>
                                                    <td><span class="pull-right">Total Discount :</span> </td>
                                                    <td><span class="pull-right"><?= $currency ?> <?php echo number_format($gross_sales_year_discount['discount_total'], 2, '.', ',');?></span></td>
                                                </tr>

                                                <tr>
                                                    <td></td>
                                                    <td><span class="pull-right">Total Sales   : </span></td>
                                                    <td><span class="blue-600 pull-right"><?= $currency ?> <?php echo number_format($total_year - $gross_sales_year_discount['discount_total'], 2, '.', ',');?></span></td>
                                                </tr>
                                            <?php else :?>
                                            <tr>
                                                <td colspan="3">No data to display.</td>
                                            </tr>
                                            <?php endif; ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php }
        else { ?>
            <div class="row" data-plugin="matchHeight" data-by-row="true">
                <div class="col-xlg-4 col-lg-4 col-md-4 col-sm-12">
                    <!-- Panel Web Designer -->
                    <div class="widget widget-shadow">
                        <div class="widget-content text-center bg-white padding-20">
                            <?php if (!empty($profile['profile_picture']) && file_exists(Yii::$app->params['upload_path']['profile-picture'] . $profile['profile_picture'])) : ?>
                                <div class="featured-image-wrapper">
                                    <div class="avatar avatar-125 margin-bottom-20" style="width: 150px;height: 150px;">
                                        <a href="<?php echo $baseUrl;?>/user/profile-picture">
                                        <img class="image-display" style="height: 150px;" src="<?php echo Yii::$app->params['upload_load_path']['profile-picture'] . $profile['profile_picture'];?>">
                                        </a>
                                    </div>
                                </div>
                            <?php else : ?>
                                <div class="avatar avatar-125 margin-bottom-20">
                                    <a href="<?php echo $baseUrl;?>/user/profile-picture">
                                    <img src="<?php echo Yii::$app->params['upload_load_path']['image'] . '../images/user-profile-pic.jpg';?>" alt="<?php echo $user['name'];?>"></a>
                                </div>
                            <?php endif; ?>
                            <p class="font-size-20 blue-grey-700"><?php echo ucwords($user['name']); ?></p>
                            <p><a class="btn btn-primary font-size-11" href="<?php echo $baseUrl . '/debtor/list'; ?>">DEBTOR LIST</a></p>
                            <p><a class="btn btn-primary font-size-11" href="<?php echo $baseUrl;?>/reports/history/?from=<?php echo date('Y-m-d', strtotime('-30 days')); ?>&to=<?php echo date('Y-m-d');?>">TRANSACTION HISTORY</a></p>
                        </div>
                    </div>
                    <!-- End Panel Web Designer -->
                </div>

                <div class="col-xlg-4 col-lg-4 col-md-4 col-sm-12">
                    <div class="widget widget-shadow table-responsive">
                        <h4 class="padding-10 margin-0">
                            <span class="text-truncate">Best Seller</span>
                        </h4>
                        <div class="nav-tabs-horizontal custom-nav-tab">
                            <ul class="nav nav-tabs nav-justified" data-plugin="nav-tabs" role="tablist">
                                <li class="active" role="presentation"><a data-toggle="tab" href="#best-seller-this-year" aria-controls="best-seller-this-year"
                                  role="tab">Fiscal Year (<?php echo $fiscal_year_start_year.' to '.$fiscal_year_end_year; ?>)</a>
                                </li>
                            </ul>
                            <div class="tab-content padding-top-20">
                                <div class="tab-pane active" id="best-seller-this-year" role="tabpanel">
                                    <div class="scroll-height-280 slimscrollstart-position-dashboard">
                                        <table class="table margin-bottom-0 scrollable table-hover table-striped">
                                            <thead>
                                                <tr>
                                                    <th>S.N.</th>
                                                    <th>Menu Item</th>
                                                    <th><span class="pull-right">Count</span></th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php if ($best_seller_year != null) : $i=0;
                                                    foreach($best_seller_year as $best) : $i++;
                                                ?>
                                                    <tr>
                                                        <td><?php echo $i; ?>.</td>
                                                        <td><?php echo ucwords($best['item_name']);?></td>
                                                        <td><span class="blue-600 pull-right"><?php echo number_format($best['total_quantity'], 0, '.', ',');?></span></td>
                                                    </tr>
                                                    <?php endforeach; ?>

                                                    <?php if($best_special_item_seller_year != null) : ?>
                                                        <tr class="color-green">
                                                            <td><?php echo ++$i; ?>.</td>
                                                            <td>Special Items</td>
                                                            <td><span class="blue-600 pull-right"><?php echo number_format($best_special_item_seller_year['total_quantity'], 0, '.', ',');?></span></td>
                                                        </tr>
                                                    <?php endif; ?>
                                                <?php else :?>
                                                <tr>
                                                    <td colspan="3">No data to display.</td>
                                                </tr>
                                                <?php endif; ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-xlg-4 col-lg-4 col-md-4 col-sm-12">
                    <div class="widget widget-shadow table-responsive">
                        <h4 class="padding-10 margin-0">
                            <span class="text-truncate">Item Wise Gross Sales</span>
                        </h4>
                        <div class="nav-tabs-horizontal custom-nav-tab">
                            <ul class="nav nav-tabs nav-justified" data-plugin="nav-tabs" role="tablist">
                                <li class="active" role="presentation"><a data-toggle="tab" href="#gross-seller-this-year" aria-controls="gross-seller-this-year"
                                  role="tab">Fiscal Year (<?php echo $fiscal_year_start_year.' to '.$fiscal_year_end_year; ?>)</a>
                                </li>
                            </ul>
                            <div class="tab-content padding-top-20">
                                <div class="tab-pane active" id="gross-seller-this-year" role="tabpanel">
                                    <div class="scroll-height-280 slimscrollstart-position-dashboard">
                                        <table class="table margin-bottom-0 scrollable table-hover table-striped">
                                            <thead>
                                                <tr>
                                                    <th>S.N.</th>
                                                    <th>Menu Item</th>
                                                    <th><span class="pull-right">Amount</span></th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php if ($gross_sales_year != null) : $i=0;
                                                    $special_item_amount_year = 0;
                                                    $total_year = 0;
                                                    foreach($gross_sales_year as $gross) : $i++;
                                                ?>
                                                        <?php if($gross['type'] != null && $gross['type'] == Yii::$app->params['item_type']['regular']) : 
                                                                $total_year += $gross['total_amount'];
                                                            ?>
                                                            <tr>
                                                                <td><?php echo $i; ?>.</td>
                                                                <td><?php echo ucwords($gross['item_name']);?></td>
                                                                <td><span class="blue-600 pull-right"><?= $currency ?> <?php echo number_format($gross['total_amount'], 2, '.', ',');?></span></td>
                                                            </tr>
                                                        <?php else: 
                                                                $special_item_amount_year += $gross['total_amount'];
                                                            ?>
                                                        <?php endif; ?>
                                                    <?php endforeach; ?>
                                                    <?php if($special_item_amount_year > 0) : ?>
                                                        <?php $total_year += $special_item_amount_year; ?>
                                                        <tr class="color-green">
                                                            <td><?php echo ++$i; ?>.</td>
                                                            <td><?php echo 'Special Items';?></td>
                                                            <td><span class="pull-right"><?= $currency ?> <?php echo number_format($special_item_amount_year, 2, '.', ',');?></span></td>
                                                        </tr>
                                                    <?php endif; ?>

                                                    <tr>
                                                        <td></td>
                                                        <td><span class="pull-right">Sub Total   : </span></td>
                                                        <td><span class="blue-600 pull-right"><?= $currency ?> <?php echo number_format($total_year, 2, '.', ',');?></span></td>
                                                    </tr>

                                                    <tr class="color-red">
                                                        <td></td>
                                                        <td><span class="pull-right">Total Discount :</span> </td>
                                                        <td><span class="pull-right"><?= $currency ?> <?php echo number_format($gross_sales_year_discount['discount_total'], 2, '.', ',');?></span></td>
                                                    </tr>

                                                    <tr>
                                                        <td></td>
                                                        <td><span class="pull-right">Total Sales   : </span></td>
                                                        <td><span class="blue-600 pull-right"><?= $currency ?> <?php echo number_format($total_year - $gross_sales_year_discount['discount_total'], 2, '.', ',');?></span></td>
                                                    </tr>
                                                <?php else :?>
                                                <tr>
                                                    <td colspan="3">No data to display.</td>
                                                </tr>
                                                <?php endif; ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row" data-plugin="matchHeight" data-by-row="true">
                <div class="col-xlg-4 col-lg-4 col-md-4 col-sm-12" >
                    <div class="widget widget-shadow" id="widgetTable">
                        <div class="widget-body custom-widget-body">
                          <h4 class="widget-title">
                            <span class="text-truncate">Total Report</span>
                          </h4>
                        </div>
                        <table class="table margin-bottom-0">
                            <tbody>
                                <tr>
                                  <td>Number of customer</td>
                                  <td class="green-600"><?php echo ($no_of_customer['total'] > 0) ? $no_of_customer['total'] : 0; ?></td>
                                </tr>
                                <tr>
                                  <td>Average table sales</td>
                                  <td class="green-600"><?= $currency ?> <?php echo $avg_table_sales; ?></td>
                                </tr>
                                <tr>
                                  <td>Average sales per person</td>
                                  <td class="green-600"><?= $currency ?> <?php echo $avg_sales_per_person; ?></td>
                                </tr>
                            </tbody>
                        </table>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="widget margin-bottom-90 margin-top-90">
                                    <div class="widget-content bg-white">
                                        <div class="counter counter-lg">
                                            <div class="counter-label text-uppercase">Average time per table</div>
                                            <div class="counter-number-group">
                                              <span class="counter-icon green-600">
                                                <i class="icon fa-clock-o"></i>
                                              </span>
                                              <span class="counter-number font-size-20"><?php echo ($avg_time_per_table['hours'] > 0) ? $avg_time_per_table['hours'] : 00; ?>hr
                                    <?php echo ($avg_time_per_table['minutes'] > 0) ? $avg_time_per_table['minutes'] : 00; ?>min
                                    <?php echo ($avg_time_per_table['seconds'] > 0) ? $avg_time_per_table['seconds'] : 00; ?>sec</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xlg-8 col-lg-8 col-md-8 col-sm-12" >
                    <div class="widget widget-shadow" id="widgetTable">
                        <div class="widget-body custom-widget-body">
                            <h4 class="widget-title">
                                <span class="text-truncate">Today's Summary</span>
                            </h4>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <table class="table margin-bottom-0">
                                  <tbody>
                                    <tr>
                                        <td><button class="btn btn-primary btn-xs view-todays-sales-detail">Total Sales</button></td>
                                        <td class="green-600"><?= $currency ?> <?php echo ($todays_sales['total_amount'] != null)?$todays_sales['total_amount'] : 0; ?></td>
                                    </tr>
                                    <tr>
                                        <td><button class="btn btn-primary btn-xs" data-toggle="modal" data-target=".modal-casn-in-detail">Total Cash In</button></td>
                                        <td class="red-600"><?= $currency ?> <?php echo $todays_cash_in; ?></td>
                                    </tr>
                                    <tr>
                                        <td>Total no. of items sold</td>
                                        <td class="green-600"><?php echo ($todays_items_sold['total'] != null)?$todays_items_sold['total'] : 0; ?></td>
                                    </tr>
                                    <tr>
                                        <td>Best Seller</td>
                                        <td class="red-600"><?php echo ($todays_best_seller != null)?$todays_best_seller['item_name'] : 'N/A'; ?></td>
                                    </tr>
                                    <tr>
                                        <td>Total Take Away Sales</td>
                                        <td class="green-600"><?= $currency ?> <?php echo ($todays_take_away_sales['total'] != null)?$todays_take_away_sales['total'] : 0; ?></td>
                                    </tr>
                                    <tr>
                                        <td>Total Pick Up Sales</td>
                                        <td class="green-600"><?= $currency ?> <?php echo ($todays_pick_up_sales['total'] != null)?$todays_pick_up_sales['total'] : 0; ?></td>
                                    </tr>
                                  </tbody>
                                </table>
                            </div>
                            <div class="col-md-6">
                                <table class="table margin-bottom-0">
                                  <tbody>
                                    <tr>
                                        <td>Total Delivery Sales</td>
                                        <td class="green-600"><?= $currency ?> <?php echo ($todays_delivery_sales['total'] != null)?$todays_delivery_sales['total'] : 0; ?></td>
                                    </tr>
                                    <tr>
                                        <td>No. of Customer</td>
                                        <td class="red-600"><?php echo ($todays_no_of_customer['total'] != null)?$todays_no_of_customer['total'] : 0; ?></td>
                                    </tr>
                                    <tr>
                                        <td>No. of tables occupied</td>
                                        <td class="green-600"><?php echo ($todays_no_of_tables_occupied['total'] != null)?$todays_no_of_tables_occupied['total'] : 0; ?></td>
                                    </tr>
                                    <tr>
                                        <td>Credit Collection</td>
                                        <td class="red-600"><?= $currency ?> <?php echo ($todays_credit_paid['total'] != null)?$todays_credit_paid['total'] : 0; ?></td>
                                    </tr>
                                    <tr>
                                        <td>Total service charge</td>
                                        <td class="green-600"><?= $currency ?> <?php echo ($todays_service_charge['total'] != null)?$todays_service_charge['total'] : 0; ?></td>
                                    </tr>
                                  </tbody>
                                </table>
                            </div>
                            
                            <div class="col-md-12">
                                <div class="margin-top-10">
                                    <div class="row">
                                        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                            <div class="widget">
                                                <div class="widget-content bg-white">
                                                    <div class="counter counter-md">
                                                        <div class="counter-label text-uppercase font-size-12">Booking conversion rate</div>
                                                        <div class="counter-number-group">
                                                          <span class="counter-icon green-600">
                                                            <i class="wb-stats-bars"></i>
                                                          </span>
                                                          <span class="counter-number font-size-20"><?php echo ($todays_booking_conversion_rate != null)?$todays_booking_conversion_rate : 0; ?> % </span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                            <div class="widget">
                                                <div class="widget-content bg-white">
                                                    <div class="counter counter-md">
                                                        <div class="counter-label text-uppercase font-size-12">Average time per table</div>
                                                        <div class="counter-number-group">
                                                          <span class="counter-icon green-600">
                                                            <i class="icon fa fa-clock-o"></i>
                                                          </span>
                                                          <span class="counter-number font-size-20"><?php echo ($todays_avg_time_per_table['hours'] > 0) ? $todays_avg_time_per_table['hours'] : 00; ?>hr
                                                            <?php echo ($todays_avg_time_per_table['minutes'] > 0) ? $todays_avg_time_per_table['minutes'] : 00; ?>min
                                                            <?php echo ($todays_avg_time_per_table['seconds'] > 0) ? $todays_avg_time_per_table['seconds'] : 00; ?>sec</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                            <div class="widget">
                                                <div class="widget-content bg-white">
                                                    <div class="counter counter-md">
                                                        <div class="counter-label text-uppercase font-size-12">Capacity Rate</div>
                                                        <div class="counter-number-group">
                                                            <span class="counter-icon green-600">
                                                                <i class="wb-stats-bars"></i>
                                                            </span>
                                                            <span class="counter-number font-size-20"><?php echo ($todays_capacity_rate['total'] > 0) ? round( $todays_capacity_rate['total'] , 2) : 0; ?> %
                                                            </span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    <?php } ?>

</div>
<!-- modal start-->
    <!-- Capacity -->
    <div class="modal fade modal-capacity margin-top-50" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-header theme-bg-color">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    <h4 class="modal-title color-white">New Capacity</h4>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12 margin-top-5">
                            <?php if($previous_capacity != null) { ?>
                                <span class="font-size-14">Previous Capacity</span> 
                                <span class="font-size-14 padding-left-10 padding-right-10">:</span> 
                                <span class="font-size-14"><?php echo $previous_capacity['capacity']; ?></span>
                            <?php } ?>
                        </div>
                    </div>

                    <div class="grey-divider margin-top-5"></div>

                    <form name="add_capacity" class="add-capacity">
                        <div class="form-group margin-top-15">

                            <input type="hidden" name="<?php echo $csrf_name; ?>" value="<?php echo $csrf_value; ?>" />

                            <div class="row">
                                <div class="col-md-5 margin-top-5">
                                    <label for="capacity" class="font-size-14">New Capacity</label>
                                </div>
                                <div class="col-md-7">
                                    <input type="number" class="form-control capacity" name="new capacity" placeholder="New Capacity">
                                </div>
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-12">
                                    <button type="submit" class="btn btn-primary btn-xs pull-right padding-top-5 padding-bottom-5 padding-left-10 padding-right-10"><i class="icon fa-print"></i>Save</button>
                                    <button type="button" class="btn btn-default btn-xs pull-right margin-right-5 padding-top-5 padding-bottom-5 padding-left-10 padding-right-10" data-dismiss="modal">Cancel</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Capacity -->

    <!-- Todays Cash In Detail Modal -->
    <div class="modal fade modal-casn-in-detail" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-header theme-bg-color">
                    <h4 class="modal-title color-white">Todays Cash In detail
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </h4>
                </div>
                <div class="modal-body padding-top-15 padding-bottom-15 padding-right-30 padding-left-30">
                    <div class="row margin-bottom-5">
                        <div class="col-md-12">
                            <span class="font-size-16">Cash sales</span> 
                            <span class="margin-left-40">:</span> 
                            <span><?= $currency ?> <?php echo ($todays_cash_sales['total'] != null) ? $todays_cash_sales['total'] : '0' ; ?></span>
                        </div>
                    </div>

                    <div class="row margin-bottom-5">
                        <div class="col-md-12">
                            <span class="font-size-16">Service Charge</span> 
                            <span class="margin-left-10">:</span> 
                            <span><?= $currency ?> <?php echo ($todays_cash_sales_service_charge['total'] != null) ? $todays_cash_sales_service_charge['total'] : '0'; ?></span>
                        </div>
                    </div>

                    <div class="row margin-bottom-5">
                        <div class="col-md-12">
                            <span class="font-size-16">Delivery Charge</span> 
                            <span class="margin-left-5">:</span> 
                            <span><?= $currency ?> <?php echo ($todays_delivery_charge['total'] != null) ? $todays_delivery_charge['total'] : '0'; ?></span>
                        </div>
                    </div>

                    <div class="row margin-bottom-5">
                        <div class="col-md-12">
                            <span class="font-size-16">Tips Received</span> 
                            <span class="margin-left-18">:</span> 
                            <span><?= $currency ?> <?php echo ($todays_tips_received['total'] != null) ? $todays_tips_received['total'] : '0'; ?></span>
                        </div>
                    </div>

                    <div class="row margin-bottom-5">
                        <div class="col-md-12">
                            <span class="font-size-16">Credit received</span> 
                            <span class="margin-left-10">:</span> 
                            <span><?= $currency ?> <?php echo ($todays_credit_paid['total'] != null) ? $todays_credit_paid['total'] : '0'; ?></span>
                        </div>
                    </div>

                    <div class="row margin-bottom-5">
                        <div class="col-md-12">
                            <span class="font-size-16">Payment return</span> 
                            <span class="margin-left-10">:</span> 
                            <span class="red-600"><?= $currency ?> (<?php echo ($todays_payment_return['total'] != null) ? $todays_payment_return['total'] : '0'; ?>)</span>
                        </div>
                    </div>

                    <div class="grey-divider margin-bottom-5"></div>

                    <div class="row">
                        <div class="col-md-12">
                            <span class="font-size-16">Cash in</span> 
                            <span class="margin-left-65">:</span> 
                            <span class="<?php echo ($todays_cash_in != null && $todays_cash_in < 0) ? 'red-600' : ''; ?>">
                                <?= $currency ?> 
                                <?php echo ($todays_cash_in != null && $todays_cash_in < 0) ? '(' : ''; ?>
                                <?php echo ($todays_cash_in != null) ? abs($todays_cash_in) : '0'; ?>
                                <?php echo ($todays_cash_in != null && $todays_cash_in < 0) ? ')' : ''; ?>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Todays Cash In Detail Modal -->

    <!-- Todays Sales Detail Modal -->
    <div class="modal fade modal-todays-sales-detail" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header theme-bg-color">
                    <h4 class="modal-title color-white">Todays Sales Detail
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </h4>
                </div>
                <div class="modal-body">
                    
                    <div class="row">
                        <div class="col-sm-12 col-lg-12 col-md-12 scroll-x">
                            <table class="table table-hover dataTable table-striped with-export-5 todays-sales-detail">
                                <thead>
                                    <tr>
                                        <th width="27">#</th>
                                        <th width="50">Customer</th>
                                        <th width="50">VAT/PAN No.</th>
                                        <th width="50">Invoice No.</th>
                                        <th width="50">Sub Total</th>
                                        <th width="50">Discount %</th>
                                        <th width="50">Discount Amount</th>
                                        <th width="50">Service Charge %</th>
                                        <th width="50">Service Charge Amount</th>
                                        <th width="50">Total</th>
                                        <th width="50">Total Cash</th>
                                        <th width="50">Total Card</th>
                                        <th width="50">Total Credit</th>
                                        <th width="150">Date</th>
                                        <th width="50">Staff</th>
                                    </tr>
                                </thead>
                                
                                <tbody class="todays-sales-data">
                                    
                                </tbody>

                                <tfoot>
                                    <tr>
                                        <th width="27"></th>
                                        <th width="50"></th>
                                        <th width="50"></th>
                                        <th width="50">Total : </th>
                                        <th width="50" class="td-sub-total"></th>
                                        <th width="50"></th>
                                        <th width="50" class="td-discount-amount-total"></th>
                                        <th width="50"></th>
                                        <th width="50" class="td-service-charge-amount-total"></th>
                                        <th width="50" class="td-total"></th>
                                        <th width="50" class="td-cash-total"></th>
                                        <th width="50" class="td-card-total"></th>
                                        <th width="50" class="td-credit-total"></th>
                                        <th width="150"></th>
                                        <th width="50"></th>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                        
                </div>
            </div>
        </div>
    </div>
    <!-- Todays Sales Detail Modal -->

    <div class="modal modal-aside fade horizontal modal-view-partial-payment-detail custom-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
              
                <div class="modal-header theme-bg-color">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <h4 class="modal-title color-white">Partial Payment Details
                        <span class="inv-required pull-right"></span>
                    </h4>
                </div>
                
                <div class="modal-body">
                    <div class="scroll-height-450 slimscrollstart-position-450">
                        <div class="partial-payment-list">
                        
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
     
    <div class="modal modal-aside horizontal left fade modal-read-break-down-invoice" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-md">
            <div class="modal-content">
                <div class="modal-header theme-bg-color">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <h4 class="modal-title color-white invoice-header"></h4>
                </div>

                <div class="modal-body invoice-content"></div>
            </div>
        </div>
    </div>

    <div class="modal modal-aside fade horizontal right modal-read-invoice" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-md">
            <div class="modal-content">
                <div class="modal-header theme-bg-color">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <h4 class="modal-title color-white invoice-header"></h4>
                </div>

                <input type="hidden" class="hidden-order-id">

                <div class="modal-body invoice-content"></div>
            </div>
        </div>
    </div>
<!-- modal end -->
<script>
    var weekly_sales_data           = [<?php echo $weekly_sales_data;?>];
    var weekly_sales_labels         = [<?php echo $weekly_sales_labels;?>];
    var weekly_cash_in_data         = [<?php echo $weekly_cash_in_data;?>];
    var weekly_cash_in_labels       = [<?php echo $weekly_cash_in_labels;?>];
    var monthwise_sales_data        = [<?php echo $monthwise_sales_data;?>];
    var monthwise_sales_labels      = [<?php echo $monthwise_sales_labels;?>];
    var monthwise_cash_in_data      = [<?php echo $monthwise_cash_in_data;?>];
    var monthwise_cash_in_labels    = [<?php echo $monthwise_cash_in_labels;?>];
    var monthwise_capacity_labels   = [<?php echo $monthwise_capacity_labels ;?>]; 
    var monthwise_capacity_data     = [<?php echo $monthwise_capacity_data ;?>];
    var baseUrl                     = '<?php echo $baseUrl; ?>';
    var break_down_type_advance     = '<?php echo Yii::$app->params['break_down_payment_type']['advance']; ?>';
    var payment_type = <?php echo json_encode(Yii::$app->params['payment_type']); ?>;
    var item_type = <?php echo json_encode(Yii::$app->params['item_type']); ?>;
    var currency = '<?= $currency ?>';
</script>