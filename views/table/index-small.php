
<?php

use app\components\HelperSettings as HSettings;

$baseUrl = Yii::$app->request->baseUrl;
$type_array  = Yii::$app->params['table-type'];
$color_array = Yii::$app->params['type-color'];
$positional  = Yii::$app->params['numbering'];
$version = Yii::$app->params['version'];
$take_away_version = Yii::$app->params['take_away_version'];
$pick_up_version = Yii::$app->params['pick_up_version'];
$delivery_version = Yii::$app->params['delivery_version'];

$csrf_name  = Yii::$app->request->csrfParam;
$csrf_value = Yii::$app->request->csrfToken;

$this->registerJsFile($baseUrl . '/assets/plugins/draggable/jquery.ui.core.js');
$this->registerJsFile($baseUrl . '/assets/plugins/draggable/jquery.ui.widget.js');
$this->registerJsFile($baseUrl . '/assets/plugins/draggable/jquery.ui.mouse.js');

$this->registerJsFile($baseUrl . '/assets/js/jquery-resizable.js');
$this->registerJsFile($baseUrl . '/assets/js/jquery.ui.touch-punch.min.js');
$this->registerJsFile($baseUrl . '/assets/js/jquery.fullPage.js');

$this->registerJsFile($baseUrl . '/assets/plugins/draggable/jquery.ui.draggable.js');
$this->registerJsFile($baseUrl . '/assets/plugins/draggable/jquery.ui.droppable.min.js');
$this->registerJsFile($baseUrl . '/assets/plugins/draggable/jquery-collision.min.js');
$this->registerJsFile($baseUrl . '/assets/plugins/draggable/jquery-ui-draggable-collision.min.js');
$this->registerJsFile($baseUrl . '/assets/plugins/bootstrap-timepicker/bootstrap-timepicker.js');
$this->registerJsFile($baseUrl . '/assets/plugins/bootstrap-datepicker/bootstrap-datepicker.min.js');
$this->registerJsFile($baseUrl . '/assets/plugins/simply-toast/simply-toast.min.js');

if(Yii::$app->session->hasFlash('notice')){ 
    $this->registerJsFile($baseUrl . '/assets/software/alert-notice.js');
}

$this->registerJsFile($baseUrl . '/assets/software/tips.js');
$this->registerJsFile($baseUrl . '/assets/software/drag.js');

$to_group = array('admin');
$group[] = Yii::$app->params['user_role']['superadmin'];
if (isset($to_group)) {
    foreach ($to_group as $to):
        $group[] = Yii::$app->params['user_role'][$to];
    endforeach;
}
if (in_array(Yii::$app->session['eHhupx5UpkLZoXRP_cR1ozEVjY14zWOC0_user']->role, $group)) {
   $this->registerJsFile($baseUrl . '/assets/software/admin_drag.js'); 
}

$this->registerJsFile($baseUrl . '/assets/software/mobile-tap-event.js');
$this->registerJsFile($baseUrl . '/assets/software/order-table.js');
$this->registerJsFile($baseUrl . '/assets/software/take-away.js');
$this->registerJsFile($baseUrl . '/assets/software/delivery.js');
$this->registerJsFile($baseUrl . '/assets/software/sync-table-by-server-sent-event.js');
$this->registerJsFile($baseUrl . '/assets/software/mobile-tap-event.js'); 

$this->registerCssFile($baseUrl . '/assets/plugins/bootstrap-timepicker/bootstrap-timepicker.css');
$this->registerCssFile($baseUrl . '/assets/plugins/bootstrap-datepicker/bootstrap-datepicker.min081a.css');
$this->registerCssFile($baseUrl . '/assets/css/restaurant.css');
$this->registerCssFile($baseUrl . '/assets/plugins/simply-toast/simply-toast.min.css');

$this->title = Yii::$app->params['system'] . ' | Table Structure';
?>
<input class="type-array" type="hidden" value='<?php echo json_encode(Yii::$app->params['type-color']); ?>'>

<input class="hidden-reload-action" type="hidden" value="0"> <!-- hidden field for reload action on merge sync -->
<input class="hidden-unmerge-reload" type="hidden" value="0"> <!-- hidden field for reload action on unmerge sync -->

<!-- table -->
<input class="hidden-table-name" type="hidden" value="New Table">
<input class="hidden-table-id" type="hidden" value="0">
<input class="hidden-floor-id" type="hidden" value="0">
<input class="hidden-status" type="hidden" value="0">
<input class="hidden-occupy-id" type="hidden" value="0">

<input class="hidden-merge-vault" type="hidden" value="">
<input class="hidden-merge-vault-for-sync" type="hidden" value="">
<!-- table -->

<!-- obstacle -->
<input class="hidden-obstacle-name" type="hidden" value="New Obstacle">
<input class="hidden-obstacle-id" type="hidden" value="0">
<input class="hidden-obstacle-floor-id" type="hidden" value="0">
<!-- obstacle -->

<span class="custom-floor-information uppercase"><?php echo ($floors != null) ? $floors[0]['name'].(($floors[0]['status'] == 0) ? 'INACTIVE SECTION' : '') : '' ?></span>
<div class="parent-small-custom-page-aside">
    <div class="custom-page-aside page-aside">
        <div class="page-aside-switch">
            <i class="icon wb-chevron-left" aria-hidden="true"></i>
            <i class="icon wb-chevron-right" aria-hidden="true"></i>
        </div>
        <div class="page-aside-inner">
            <section class="custom-page-aside-section page-aside-section">
                <div class="collapse navbar-collapse btn-menu-group margin-top-10">
                    <div class="dropdown margin-bottom-10">
                        <button type="button" class="btn btn-md btn-primary dropdown-toggle custom-list full-width" id="exampleColorDropdown2" data-toggle="dropdown" aria-expanded="false">List
                          <span class="caret"></span>
                        </button>
                        <ul class="dropdown-menu dropdown-menu-primary full-width" aria-labelledby="" role="menu">
                            <li role="presentation">
                                <a href="javascript:void(0)" role="menuitem" class="btn-booking-list" data-target=".booking-list" data-toggle="modal" type="button"><i class="icon fa-book"></i>Booking List</a>
                            </li>
                            <li role="presentation">
                                <a href="javascript:void(0)" role="menuitem" class="btn-take-away-list"><i class="icon fa-book"></i>Take-Away List</a>
                            </li>
                            <li role="presentation">
                                <a href="javascript:void(0)" role="menuitem" class="btn-pick-up-list"><i class="icon fa-book"></i>Pick-Up List</a>
                            </li>
                            <li role="presentation">
                                <a href="javascript:void(0)" role="menuitem" class="btn-delivery-list"><i class="icon fa-automobile"></i>Delivery List</a>
                            </li>
                        </ul>
                    </div>
                    
                    <!-- this code is required if pick up is created from form -->
                    <!-- <button class="btn btn-info btn-take-away margin-bottom-10 full-width" data-target=".take-away-now" data-toggle="modal" type="button"><i class="icon fa-mail-forward"></i> Take-Away</button> -->
                    <button class="btn btn-info btn-take-away margin-bottom-10 full-width" type="button"><i class="icon fa-mail-forward"></i> Take-Away</button>

                    <button class="btn btn-info btn-pick-up margin-bottom-10 full-width" data-target=".pick-up-now" data-toggle="modal" type="button"><i class="icon fa-mail-forward"></i> Pick-Up </button>

                    <button class="btn btn-success btn-delivery margin-bottom-10 full-width" data-target=".delivery-now" data-toggle="modal" type="button"><i class="icon fa-automobile"></i> Delivery</button>
                    <button class="btn btn-default margin-bottom-0 full-width" data-target=".modal-tips" data-toggle="modal" type="button"><i class="icon fa-money"></i>Add Tips</button>
                </div>
                <hr>
                <h5 class="page-aside-title">Select Section</h5>

                <?php if ($floors != null) : ?>
                    <div class="scroll-for-floor-menu slimscrollstart-position">
                        <ul id="floor-menu">
                            <?php 
                            $j=1; $k=0;
                            $section_floor_data = '';
                            $section_color_data = '';

                            for($i=0; $i<count($floors); $i++) :

                                $opt = ($i == count($floors)) ? "'" : "', ";
                                $section_color_data .= "'" . $color_array[$j] . $opt;
                                $j = ($j >= 5) ? 1 : $j+1;

                                $floor_data = $floors[$i]['name'];
                                $section_floor_data .= "'" . $floor_data . $opt;
                            ?>
                                <li data-menuanchor="<?php echo $floor_data;?>"><a href="#<?php echo $floor_data;?>" class="floor-border-left-<?php echo $k;?>"><?php echo ucwords($floors[$i]['name']);?></a></li>
                            <?php 
                                $k = ($k >= 5) ? 1 : $k+1;
                                endfor; 
                            ?>
                        </ul>
                    </div>
                <?php endif; ?>
                <div class="clearfix"></div>
            </section>
        </div>
    </div>
</div>
<div class="parent-small-drag-area">
    <div class="page-main">
        <div class="page-content container-fluid padding-0" >
            <div id="fullpage">
                <?php if ($floors != null) : 
                    for($i=0; $i<count($floors); $i++) : 
                        $name = isset($floors[$i+1]) ? $floors[$i+1]['name'].(($floors[$i]['status']) ? 'INACTIVE SECTION' : '') : '';
                    ?> 
                <div class="section">
                    <div class="small-drag-area drag-area-<?php echo $i+1;?>" data-floor="<?php echo isset($floors[$i]) ? $floors[$i]['id'] : '';?>">
                        <div class="row padding-20 padding-top-0">
                        <?php 
                        if ($tables != null && isset($tables[$floors[$i]['id']]) && $tables[$floors[$i]['id']] != null) :
                            if($floors[$i]['status'] == 1) :
                                foreach($tables[$floors[$i]['id']] as $table) : 

                                    $occupy_id  = 0;
                                    $time       = "00:00:00";
                                    if ( $table['status'] == 1 ) {
                                        if (isset($occupies[$table['id']]) && $occupies[$table['id']] != null ) {
                                            $time       = $occupies[$table['id']]['start_date'] . ' ' . $occupies[$table['id']]['start_time'];
                                            $occupy_id  = $occupies[$table['id']]['id'];
                                        }
                                     
                                        $status_color = 'color-bg-occupy'; 
                                    }
                                    else {
                                        $status_color = 'color-bg-empty';
                                    }
                                ?>
                                    
                                    <div class="col-lg-4 col-xs-4 margin-top-10 padding-left-5 padding-right-5">
                                        <div id="table-<?php echo $table['id'];?>" class="table-tab table-block <?php echo $status_color;?> alert-notify
                                        <?php echo ($table['status'] == 1) ? ' occupied-table ' : '';?> ">
                                            <div class="text-center"><span><?php echo substr($table['table_name'], 0, 16);?></span></div>
                                            <div class="sync-timer">
                                                <?php if ($table['status'] == 1) : ?>
                                                    <p class="occupy-timer small-occupy-timer" data-time="<?php echo $time; ?>">
                                                        <span class="_days"></span>
                                                        <span class="_hours">00</span>:
                                                        <span class="_minutes">00</span>:
                                                        <span class="_seconds">00</span>
                                                    </p>
                                                <?php endif;?>
                                            </div>
                                            <input class="tb-detail-name" type="hidden" value="<?php echo $table['table_name'];?>">
                                            <input class="tb-detail-table" type="hidden" value="<?php echo $table['id'];?>">
                                            <input class="tb-detail-floor" type="hidden" value="<?php echo $table['floor'];?>">
                                            <input class="tb-detail-status" type="hidden" value="<?php echo $table['status'];?>">
                                            <input class="tb-occupy" type="hidden" value="<?php echo $occupy_id;?>">
                                            <input class="tb-detail-merge" type="hidden" value='<?php echo $table['merge'];?>'>
                                            <input class="tb-detail-merge-head" type="hidden" value='0'>
                                        </div>
                                    </div>
                                    
                                <?php endforeach; endif; ?>
                        <?php endif; ?>
                        </div>
                    </div>
                </div>
                <?php endfor;  endif; ?>
            </div>
        </div>
    </div>
</div>

<!-- modal -->
    <!-- table -->
    <div class="modal modal-aside fade horizontal right booking-list" aria-hidden="false" role="dialog" tabindex="-1">
        <div class="modal-dialog modal-lg" style="width:81%;">
            <div class="modal-content">
                <div class="modal-header theme-bg-color">
                    <h4 class="modal-title color-white">Booking List
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </h4>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div style="overflow-x: scroll;">
                                <table class="table table-hover table-striped width-full dtr-inline dataTable with-export booked-tables-data correct-indexing">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Table</th>
                                            <th>Section</th>
                                            <th>Customer Name</th>
                                            <th>Customer Phone</th>
                                            <th>PAX</th>
                                            <th>Date</th>
                                            <th>Start Time</th>
                                            <th>End Time</th>
                                            <th>Options</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>#</th>
                                            <th>Table</th>
                                            <th>Section</th>
                                            <th>Customer Name</th>
                                            <th>Customer Phone</th>
                                            <th>PAX</th>
                                            <th>Date</th>
                                            <th>Start Time</th>
                                            <th>End Time</th>
                                            <th>Options</th>
                                        </tr>
                                    </tfoot>
                                    <tbody></tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-md-12">
                            <form action="<?php echo $baseUrl;?>/table/book-now" name="bookNow" data-tablename="bookNow" data-action="book" method="post" class="form-horizontal booking-list-table-book-now">

                                <input type="hidden" name="<?php echo $csrf_name; ?>" value="<?php echo $csrf_value; ?>" />
                                <input type="hidden" name="id" value="0">
                                <h4>Book Your Table</h4>    
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="col-md-3 padding-right-50">  
                                            <div class="form-group">
                                                <input type="text" name="customer_name" placeholder="Customer's Name" class="form-control" data-placement="left" data-toggle="tooltip" data-original-title="Customer's Name">
                                            </div>
                                        </div>         

                                        <div class="col-md-3 padding-right-50"> 
                                            <div class="form-group">
                                                <input type="number" name="customer_phone"  placeholder="Phone" class="form-control" data-placement="left" data-toggle="tooltip" data-original-title="Phone">
                                            </div>
                                        </div>
                                    
                                        <div class="col-md-3 padding-right-50"> 
                                            <div class="form-group">
                                                <input type="hidden" name="table" class="book-table" data-placement="left">
                                                <select class="form-control select-table" name="selected_table">
                                                    <option value="">Select Table</option>
                                                    <?php if (isset($table_data) && $table_data != null) :
                                                    foreach($table_data as $table) : ?>
                                                            <option data-floor="<?php echo $table['floor']; ?>" value="<?php echo $table['id']; ?>"><?php echo strtoupper($table['table_name']); ?></option>
                                                    <?php endforeach; endif; ?> 
                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-md-3 padding-right-50" hidden> 
                                            <div class="form-group">
                                                <input type="number" name="floor"  placeholder="Section No" class="form-control book-floor" data-placement="left" data-toggle="tooltip" data-original-title="Section No" readonly>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="col-md-3 padding-right-50"> 
                                            <div class="form-group">
                                                <input type="number" name="customer_pax"  placeholder="No of People" class="form-control" data-placement="left" data-toggle="tooltip" data-original-title="No of People">
                                            </div>
                                        </div>

                                        <div class="col-md-3 padding-right-50"> 
                                            <div class="form-group">
                                                <input type="text" name="date"  placeholder="Date" class="form-control date-picker" data-placement="left" data-toggle="tooltip" data-original-title="Booking Date">
                                                <input class="form-control today" type="hidden" name="today" id="today" value="<?php echo date("Y-m-d"); ?>">
                                            </div>
                                        </div>
                                    
                                        <div class="col-md-3 padding-right-50"> 
                                            <div class="form-group">
                                                <input type="text" name="start_time" id="start_time"  placeholder="Time" class="form-control time-picker" data-placement="left" data-toggle="tooltip" data-original-title="Start Time">
                                            </div>
                                        </div>

                                        <div class="col-md-3 padding-right-50"> 
                                            <div class="form-group">
                                                <input type="text" name="end_time"  id="end_time" placeholder="Time" class="form-control time-picker" data-placement="left" data-toggle="tooltip" data-original-title="End Time">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12"> 
                                        <div class="form-group pull-right padding-right-50">
                                            <button type="submit" class="btn btn-primary">Book Now</button>
                                            <button type="button" class="btn btn-danger cancel-booking">Cancel</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal modal-aside fade horizontal right booking-list-for-one" aria-hidden="false" role="dialog" tabindex="-1">
        <div class="modal-dialog modal-lg" style="width:81%;">
            <div class="modal-content">

                <div class="modal-header theme-bg-color">
                    <h4 class="modal-title color-white">Booking List for table : <span class="title-for-one"></span>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </h4>
                </div>
                <div class="modal-body">
                    <div style="overflow-x: scroll;">
                        <table class="table table-hover table-striped width-full dtr-inline dataTable with-export booked-table-data correct-indexing">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Customer Name</th>
                                    <th>Customer Phone</th>
                                    <th>PAX</th>
                                    <th>Date</th>
                                    <th>Start Time</th>
                                    <th>End Time</th>
                                    <th>Options</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th>#</th>
                                    <th>Customer Name</th>
                                    <th>Customer Phone</th>
                                    <th>PAX</th>
                                    <th>Date</th>
                                    <th>Start Time</th>
                                    <th>End Time</th>
                                    <th>Options</th>
                                </tr>
                            </tfoot>
                            <tbody></tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal modal-aside fade horizontal right move-booking" aria-hidden="false" role="dialog" tabindex="-1" data-backdrop="static">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <form action="<?php echo $baseUrl;?>/table/move-booking" name="moveBooking" data-tablename="moveBooking" data-action="move" method="post" class="form-horizontal move-booking-details">
                <input type="hidden" name="<?php echo $csrf_name; ?>" value="<?php echo $csrf_value; ?>" />
                <input type="hidden" name="id" value="0" class="from-table-id">
                <div class="modal-header theme-bg-color">
                    <h4 class="modal-title color-white">Move Booking</h4>
                </div>

                <div class="modal-body move-main">
                    <div class="col-sm-12">
                        <div class="form-group">
                            <select name="floor" class="form-control show-tick bs-select-hidden select-floor-to-move" data-plugin="selectpicker">
                                <option value="">Select A Section</option>
                                <?php if ($floors != null) : ?>
                                    <?php foreach($floors as $floor) : ?>  
                                        <option value="<?php echo $floor['id']; ?>"><?php echo ucwords($floor['name']);?></option>
                                <?php endforeach; endif; ?>
                            </select>                            
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <div class="form-group select-table-option"></div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Move</button>
                    <button type="button" class="btn btn-default" data-dismiss="modal">Discard</button>
                </div>
                </form>
            </div>
        </div>
    </div>

    <div class="modal modal-aside fade horizontal right move-occupied" aria-hidden="false" role="dialog" tabindex="-1" data-backdrop="static">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <form action="<?php echo $baseUrl;?>/table/move-occupied" name="moveOccupied" data-tablename="moveOccupied" data-action="move" method="post" class="form-horizontal move-occupied-details">
                <input type="hidden" name="<?php echo $csrf_name; ?>" value="<?php echo $csrf_value; ?>" />
                <input type="hidden" name="id" value="0" class="from-occupy-id">
                <div class="modal-header theme-bg-color">
                    <h4 class="modal-title color-white">Move Occupied</h4>
                </div>

                <div class="modal-body move-main">
                    <div class="col-sm-12">
                        <div class="form-group">
                            <select name="floor" class="form-control show-tick bs-select-hidden select-floor-to-move" data-plugin="selectpicker">
                                <option value="">Select A Section</option>
                                <?php if ($floors != null) : ?>
                                    <?php foreach($floors as $floor) : ?>  
                                        <option value="<?php echo $floor['id']; ?>"><?php echo ucwords($floor['name']);?></option>
                                <?php endforeach; endif; ?>
                            </select>                            
                        </div>
                    </div>

                    <div class="col-sm-12">
                        <div class="form-group select-table-option"></div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Move</button>
                    <button type="button" class="btn btn-default" data-dismiss="modal">Discard</button>
                </div>
                </form>
            </div>
        </div>
    </div>

    <div class="modal modal-aside fade horizontal right book-now" aria-hidden="false" role="dialog" tabindex="-1" data-backdrop="static">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <form action="<?php echo $baseUrl;?>/table/book-now" name="bookNow" data-tablename="bookNow" data-action="book" method="post" class="form-horizontal table-book-now">
                <input type="hidden" name="<?php echo $csrf_name; ?>" value="<?php echo $csrf_value; ?>" />
                <input type="hidden" name="id" value="0">
                <div class="modal-header theme-bg-color">
                    <h4 class="modal-title color-white">Book Your Table</h4>
                </div>

                <div class="modal-body">
                    <div class="col-sm-12">
                        <div class="form-group">
                            <input type="text" name="customer_name" placeholder="Customer's Name" class="form-control" data-placement="left" data-toggle="tooltip" data-original-title="Customer's Name">
                        </div>
                        <div class="form-group">
                            <input type="number" name="customer_phone"  placeholder="Phone" class="form-control" data-placement="left" data-toggle="tooltip" data-original-title="Phone">
                        </div>
                        <div class="form-group">
                            <input type="number" name="customer_pax"  placeholder="No of People" class="form-control" data-placement="left" data-toggle="tooltip" data-original-title="No of People">
                        </div>
                        <div class="form-group" hidden>
                            <input type="number" name="floor"  placeholder="Section No" class="form-control book-floor" data-placement="left" data-toggle="tooltip" data-original-title="Section No" readonly>
                        </div>
                        <div class="form-group opt-book-with-table">
                            <input type="hidden" name="table" class="book-table" data-placement="left">
                            <input type="text" name="table_name"  placeholder="Table Name" class="form-control book-table-name" data-placement="left" data-toggle="tooltip" data-original-title="Table Name" readonly>
                        </div>
                        <div class="form-group opt-book-without-table">
                            <select class="form-control select-table" name="selected_table">
                                <option value="">Select Table</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <input type="text" name="date"  placeholder="Date" class="form-control date-picker" data-placement="left" data-toggle="tooltip" data-original-title="Booking Date">
                            <input class="form-control today" type="hidden" name="today" id="today" value="<?php echo date("Y-m-d"); ?>">
                        </div>
                        <div class="form-group">
                            <input type="text" name="start_time" id="start_time"  placeholder="Time" class="form-control time-picker" data-placement="left" data-toggle="tooltip" data-original-title="Start Time">
                        </div>
                        <div class="form-group">
                            <input type="text" name="end_time"  id="end_time" placeholder="Time" class="form-control time-picker" data-placement="left" data-toggle="tooltip" data-original-title="End Time">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Book Now</button>
                    <button type="button" class="btn btn-default" data-dismiss="modal">Discard</button>
                </div>
                </form>
            </div>
        </div>
    </div>

    <div class="modal modal-aside fade horizontal right update-table" aria-hidden="false" role="dialog" tabindex="-1" data-backdrop="static">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <form action="<?php echo $baseUrl;?>/table/update-table-name" name="updateTable" data-tablename="updateTable" data-action="edit" method="post" class="form-horizontal update-table-details">
                <input type="hidden" name="<?php echo $csrf_name; ?>" value="<?php echo $csrf_value; ?>" />
                <input type="hidden" name="id" value="0" class="table-edit-id">
                <div class="modal-header theme-bg-color">
                    <h4 class="modal-title color-white">Edit Table Detail</h4>
                </div>

                <div class="modal-body">
                    <div class="col-sm-12">
                        <div class="form-group">
                            <input type="text" name="table_name" placeholder="Table Name" class="form-control table-name" data-placement="left" data-toggle="tooltip" data-original-title="Table Name">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Update</button>
                    <button type="button" class="btn btn-default" data-dismiss="modal">Discard</button>
                </div>
                </form>
            </div>
        </div>
    </div>

    <div class="modal fade table-option" aria-hidden="true" role="dialog" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">x</span>
                    </button>
                    <h4 class="modal-title" id="title">CHOOSE OPTION</h4>
                </div>
                <div class="modal-body">
                    
                    <button type="button" class="btn btn-primary btn-option btn-occupy" data-dismiss="modal">Occupy</button>

                    <button type="button" class="btn btn-primary btn-option btn-move-table" data-toggle="modal" data-target=".move-occupied" style="display:none;" data-dismiss="modal">Move</button>
                    
                    <a href="" class="btn btn-info btn-option btn-view-table" style="display:none;">View</a>

                    <button type="button" class="btn btn-danger btn-option btn-close-table" style="display:none;">Close</button>

                    <button type="button" class="btn btn-success btn-option btn-book-now" data-dismiss="modal">Book</button>
                    
                    <button type="button" class="btn btn-warning btn-option btn-manage-booking" data-toggle="modal" data-target=".booking-list-for-one" data-dismiss="modal">Manage Booking</button>

                </div>

                <?php if (in_array(Yii::$app->session['eHhupx5UpkLZoXRP_cR1ozEVjY14zWOC0_user']->role, $group)) : ?>
                    <div class="modal-footer foot">
                        
                        <a href="#" class="edit margin-right-20" >
                            <i class="icon wb-edit color-green" aria-hidden="true" data-placement="top" data-toggle="tooltip" data-original-title="Edit Table"></i>
                        </a>

                        <a href="#" class="remove" >
                            <i class="icon wb-trash color-red" aria-hidden="true" data-placement="top" data-toggle="tooltip" data-original-title="Remove Table"></i>
                        </a>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>

    <div class="modal modal-aside fade horizontal right pick-up-now" aria-hidden="false" role="dialog" tabindex="-1">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <form action="<?php echo $baseUrl;?>/table/pick-up-now" name="takeAwayForm" data-tablename="takeAwayForm" data-action="create" method="post" class="form-horizontal pick-up-form">
                <input type="hidden" name="<?php echo $csrf_name; ?>" value="<?php echo $csrf_value; ?>" />
                <div class="modal-header theme-bg-color">
                    <h4 class="modal-title color-white">Pick-Up</h4>
                </div>
                <div class="modal-body">
                    <div class="col-sm-12">
                        <div class="form-group">
                            <input type="text" name="customer_name" placeholder="Customer's Name" class="form-control" data-placement="left" data-toggle="tooltip" data-original-title="Customer's Name">
                        </div>
                        <div class="form-group">
                            <input type="number" name="customer_phone"  placeholder="Phone" class="form-control" data-placement="left" data-toggle="tooltip" data-original-title="Customer Phone">
                        </div>
                        <div class="form-group">
                            <input type="text" name="customer_pan"  placeholder="Customer's Pan" class="form-control" data-placement="left" data-toggle="tooltip" data-original-title="Customer's Pan">
                        </div>
                        <div class="form-group">
                            <textarea name="customer_address" placeholder="Customer's Address" class="form-control" data-placement="left" data-toggle="tooltip" data-original-title="Customer's Address"></textarea>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Save</button>
                    <button type="button" class="btn btn-default close-pick-up-modal-btn">Discard</button>
                </div>
                </form>
            </div>
        </div>
    </div>

    <div class="modal modal-aside fade horizontal right pick-up-list" aria-hidden="false" role="dialog" tabindex="-1">
        <div class="modal-dialog modal-lg" style="width:81%;">
            <div class="modal-content">

                <div class="modal-header theme-bg-color">
                    <h4 class="modal-title color-white">Pick-Up List
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </h4>
                </div>
                <div class="modal-body">
                    <div style="overflow-x: scroll;">
                        <table class="table table-hover table-striped dtr-inline dataTable with-export pick-up-tables-data correct-indexing">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Customer Name</th>
                                    <th>Customer Phone</th>
                                    <th>Customer Pan</th>
                                    <th>Address</th>
                                    <th>Date</th>
                                    <th>Options</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th>#</th>
                                    <th>Customer Name</th>
                                    <th>Customer Phone</th>
                                    <th>Customer Pan</th>
                                    <th>Address</th>
                                    <th>Date</th>
                                    <th>Options</th>
                                </tr>
                            </tfoot>
                            <tbody class="pick-up-list-content"></tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal modal-aside fade horizontal right take-away-list" aria-hidden="false" role="dialog" tabindex="-1">
        <div class="modal-dialog modal-lg" style="width:81%;">
            <div class="modal-content">

                <div class="modal-header theme-bg-color">
                    <h4 class="modal-title color-white">Take-Away List
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </h4>
                </div>
                <div class="modal-body">
                    <div style="overflow-x: scroll;">
                        <table class="table table-hover table-striped dtr-inline dataTable with-export take-away-tables-data correct-indexing">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Customer Name</th>
                                    <th>Customer Phone</th>
                                    <th>Customer Pan</th>
                                    <th>Address</th>
                                    <th>Date</th>
                                    <th>Options</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th>#</th>
                                    <th>Customer Name</th>
                                    <th>Customer Phone</th>
                                    <th>Customer Pan</th>
                                    <th>Address</th>
                                    <th>Date</th>
                                    <th>Options</th>
                                </tr>
                            </tfoot>
                            <tbody class="take-away-list-content"></tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal modal-aside fade horizontal right delivery-now" aria-hidden="false" role="dialog" tabindex="-1">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <form action="<?php echo $baseUrl;?>/table/delivery-now" name="deliveryForm" data-tablename="deliveryForm" data-action="create" method="post" class="form-horizontal delivery-form">
                <input type="hidden" name="<?php echo $csrf_name; ?>" value="<?php echo $csrf_value; ?>" />
                <div class="modal-header theme-bg-color">
                    <h4 class="modal-title color-white">Delivery</h4>
                </div>
                <div class="modal-body">
                    <div class="col-sm-12">
                        <div class="form-group">
                            <input type="text" name="customer_name" placeholder="Customer's Name" class="form-control" data-placement="left" data-toggle="tooltip" data-original-title="Customer's Name">
                        </div>
                        <div class="form-group">
                            <input type="number" name="customer_phone"  placeholder="Phone" class="form-control" data-placement="left" data-toggle="tooltip" data-original-title="Customer Phone">
                        </div>
                        <div class="form-group">
                            <input type="text" name="customer_pan"  placeholder="Customer's Pan" class="form-control" data-placement="left" data-toggle="tooltip" data-original-title="Customer's Pan">
                        </div>
                        <div class="form-group">
                            <textarea name="customer_address" placeholder="Customer's Address" class="form-control" data-placement="left" data-toggle="tooltip" data-original-title="Customer's Address"></textarea>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Save</button>
                    <button type="button" class="btn btn-default close-delivery-modal-btn">Discard</button>
                </div>
                </form>
            </div>
        </div>
    </div>

    <div class="modal modal-aside fade horizontal right delivery-list" aria-hidden="false" role="dialog" tabindex="-1">
        <div class="modal-dialog modal-lg" style="width:81%;">
            <div class="modal-content">

                <div class="modal-header theme-bg-color">
                    <h4 class="modal-title color-white">Delivery List
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </h4>
                </div>
                <div class="modal-body">
                    <div style="overflow-x: scroll;">
                        <table class="table table-hover table-striped dtr-inline dataTable with-export delivery-tables-data correct-indexing">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Customer Name</th>
                                    <th>Customer Phone</th>
                                    <th>Customer Pan</th>
                                    <th>Address</th>
                                    <th>Date</th>
                                    <th>Options</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th>#</th>
                                    <th>Customer Name</th>
                                    <th>Customer Phone</th>
                                    <th>Customer Pan</th>
                                    <th>Address</th>
                                    <th>Date</th>
                                    <th>Options</th>
                                </tr>
                            </tfoot>
                            <tbody class="delivery-list-content"></tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- table -->
    
    <!-- obstacle -->

    <?php if (in_array(Yii::$app->session['eHhupx5UpkLZoXRP_cR1ozEVjY14zWOC0_user']->role, $group)) : ?>
        <div class="modal fade obstacle-option" aria-hidden="true" role="dialog" tabindex="-1">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">x</span>
                        </button>
                        <h4 class="modal-title text-center">CHOOSE OPTION</h4>
                    </div>
                    <div class="modal-body">

                        <button type="button" class="edit btn btn-success btn-option">Edit</button>

                        <button type="button" class="remove btn btn-danger btn-option">Remove</button>
                        
                    </div>
                </div>
            </div>
        </div>
    <?php endif; ?>

    <div class="modal modal-aside fade horizontal right update-obstacle" aria-hidden="false" role="dialog" tabindex="-1">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <form action="<?php echo $baseUrl;?>/obstacle/update-obstacle-name" name="updateObstacle" data-tablename="updateObstacle" data-action="edit" method="post" class="form-horizontal update-obstacle-details">
                <input type="hidden" name="<?php echo $csrf_name; ?>" value="<?php echo $csrf_value; ?>" />
                <input type="hidden" name="id" value="0" class="obstacle-edit-id">
                <div class="modal-header theme-bg-color">
                    <h4 class="modal-title color-white">Edit Obstacle Detail</h4>
                </div>

                <div class="modal-body">
                    <div class="col-sm-12">
                        <div class="form-group">
                            <input type="text" name="obstacle_name" placeholder="Obstacle Name" class="form-control obstacle-name" data-placement="left" data-toggle="tooltip" data-original-title="Obstacle Name">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Update</button>
                    <button type="button" class="btn btn-default" data-dismiss="modal">Discard</button>
                </div>
                </form>
            </div>
        </div>
    </div>
    <!-- obstacle -->

    <!-- Tips -->
    <div class="modal fade modal-tips margin-top-50" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-header theme-bg-color">
                    <h4 class="modal-title color-white">Add Tips</h4>
                </div>
                <div class="modal-body">
                    <form name="add_tips" class="add-tips">
                        <div class="form-group">

                            <input type="hidden" name="<?php echo $csrf_name; ?>" value="<?php echo $csrf_value; ?>" />

                            <div class="row">
                                <div class="col-md-12">
                                    <label for="tips-amount">Tip Amount</label>
                                    <input type="number" class="form-control tips-amount" name="tip_amount" min="0">
                                </div>
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-12">
                                    <button type="submit" class="btn btn-primary btn-xs pull-right padding-top-5 padding-bottom-5 padding-left-10 padding-right-10">Add</button>
                                    <button type="button" class="btn btn-default btn-xs pull-right margin-right-5 padding-top-5 padding-bottom-5 padding-left-10 padding-right-10" data-dismiss="modal">Cancel</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Tips -->
<!-- modal -->
<script>
    
    var section_colors  = [<?php echo $section_color_data;?>];
    var section_anchors = [<?php echo $section_floor_data;?>];

    var version             = "<?php echo $version; ?>";
    var take_away_version   = "<?php echo $take_away_version; ?>";
    var pick_up_version     = "<?php echo $pick_up_version; ?>";
    var delivery_version    = "<?php echo $delivery_version; ?>";

    var global_unmerge_bool = false;
    var table_array = [];
    <?php if ($tables != null) : 
    foreach($tables as $key => $table) : 
        foreach($table as $tab) :?>
            var element = {};
            element.id = "<?= $tab['id'] ?>";
            element.floor = "<?= $key ?>";
            element.name = "<?= $tab['table_name'] ?>";
            table_array.push(element);
    <?php endforeach; endforeach; endif; ?>
    
    var unique_user_identifier = '<?php echo Yii::$app->session['eHhupx5UpkLZoXRP_cR1ozEVjY14zWOC0_user']->encrypt ?>'; 
</script>
