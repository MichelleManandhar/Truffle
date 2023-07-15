<?php
/* @var $this yii\web\View */
$baseUrl = Yii::$app->request->baseUrl;

/*for datatable*/
$this->registerCssFile($baseUrl . '/assets/plugins/table/css/jquery.dataTables.min.css');
$this->registerCssFile($baseUrl . '/assets/plugins/table/css/buttons.dataTables.min.css');

$this->registerJsFile($baseUrl . '/assets/plugins/table/js/jquery.dataTables.min.js');
$this->registerJsFile($baseUrl . '/assets/plugins/table/js/dataTables.buttons.min.js');
$this->registerJsFile($baseUrl . '/assets/plugins/table/js/buttons.flash.min.js');
$this->registerJsFile($baseUrl . '/assets/plugins/table/js/jszip.min.js');
$this->registerJsFile($baseUrl . '/assets/plugins/table/js/pdfmake.min.js');
$this->registerJsFile($baseUrl . '/assets/plugins/table/js/vfs_fonts.js');
$this->registerJsFile($baseUrl . '/assets/plugins/table/js/buttons.html5.min.js');
$this->registerJsFile($baseUrl . '/assets/plugins/table/js/buttons.print.min.js');

$this->registerJsFile($baseUrl . '/assets/js/users.min.js');
/*for datatable*/

$this->registerCssFile($baseUrl . '/assets/plugins/bootstrap-select/bootstrap-select.min081a.css?v2.0.0');

$this->registerJsFile($baseUrl . '/assets/plugins/bootstrap-select/bootstrap-select.min.js');
$this->registerJsFile($baseUrl . '/assets/plugins/components/bootstrap-select.min.js');

if( isset(Yii::$app->session['date_format']) && Yii::$app->session['date_format'] == 'nepali') {
    $this->registerCssFile($baseUrl . '/assets/plugins/nepalidatepicker/nepali.datepicker.v2.min.css');
    $this->registerJsFile($baseUrl . '/assets/plugins/nepalidatepicker/nepali.datepicker.v2.min.js');
    $this->registerJsFile($baseUrl . '/assets/software/reports.js'); 
    $this->registerJsFile($baseUrl . '/assets/software/nepali-date.js');
}else{
    $this->registerCssFile($baseUrl . '/assets/plugins/bootstrap-datepicker/bootstrap-datepicker.min081a.css');
    $this->registerJsFile($baseUrl . '/assets/plugins/bootstrap-datepicker/bootstrap-datepicker.min.js');
    $this->registerJsFile($baseUrl . '/assets/software/reports-with-english-date.js');
}

$this->registerJsFile($baseUrl . '/assets/software/foc.js');

$this->title = Yii::$app->params['system'] . ' | FOC History';
?>

<div class="page-header padding-bottom-0">
    <h1 class="page-title">FOC History</h1>
    <div class="clearfix"></div>
</div>

<div class="page-content padding-30 container-fluid">
    <div class="row row-lg margin-bottom-20">
        <div class="col-lg-6 col-md-4 col-sm-6">
            <div class="row">
                <div class="col-lg-2 col-md-4 col-sm-3 col-xs-12">
                    <h5>Sort By:</h5>
                </div>
                <div class="col-lg-5 col-md-7 col-sm-9 col-xs-12">
                    <select class="form-control show-tick bs-select-hidden sort-by" data-plugin="selectpicker">
                        <option value="" <?php echo (!isset($_GET['by']) || $_GET['by'] == '') ? 'selected' : '';?>>Choose one option</option>
                        <option value="all" <?php echo (isset($_GET['by']) && $_GET['by'] == 'all') ? 'selected' : '';?>>All</option>
                        <option value="today" <?php echo (isset($_GET['by']) && $_GET['by'] == 'today') ? 'selected' : '';?>>Show me today's transactions</option>
                        <option value="week" <?php echo (isset($_GET['by']) && $_GET['by'] == 'week') ? 'selected' : '';?>>Show me this week's transactions</option>
                        <option value="month" <?php echo (isset($_GET['by']) && $_GET['by'] == 'month') ? 'selected' : '';?>>Show me this month's transactions</option>
                        <option value="year" <?php echo (isset($_GET['by']) && $_GET['by'] == 'year') ? 'selected' : '';?>>Show me this year's transactions</option>
                    </select>
                </div>
            </div>      
        </div>

        <?php if( isset(Yii::$app->session['date_format']) && Yii::$app->session['date_format'] == 'nepali') { ?>
            <!-- view for nepali date  -->
            <div class="col-lg-6 col-md-6 col-sm-9">
                <div class="nepali-bs-date form-inline text-right mob-nepali-date">
                    <div class="form-group">
                        <label class="control-label">
                            <div class="input-group">
                                <input class="form-control show-nepali-date" readonly placeholder="FROM (BS)" type="text" id="nepaliDate9" autocomplete="off" data-init="<?php echo (isset($_GET['from']) && $_GET['from'] != null) ? $_GET['from'] : '0';?>">
                                <input name="from_english" type="hidden" id="hiddennepaliDate9" class="date-from" value="<?php echo (isset($_GET['from']) && $_GET['from'] != null) ? $_GET['from'] : '0';?>" />
                                <span class="input-group-btn for-datepicker"><i class="fa fa-clock-o"></i></span>
                            </div>
                        </label>
                    </div>
                    <div class="form-group">
                        <label class="control-label">
                            <div class="input-group">
                                <input class="form-control show-nepali-date" readonly placeholder="TO (BS)" type="text" id="nepaliDate8" autocomplete="off" data-init="<?php echo (isset($_GET['to']) && $_GET['to'] != null) ? $_GET['to'] : '0';?>">
                                <input name="to_english" type="hidden" id="hiddennepaliDate8" class="date-to" value="<?php echo (isset($_GET['to']) && $_GET['to'] != null) ? $_GET['to'] : '0';?>"/>
                                <span class="input-group-btn for-datepicker"><i class="fa fa-clock-o"></i></span>
                            </div>
                        </label>
                    </div>
                    <a href="#" class="btn btn-primary sort-by-go">GO</a>
                </div>
            </div>
            <!-- view for nepali date  -->
        <?php }
            else { ?>
            <!-- view for english date  -->
            <div class="col-lg-6 col-md-6">
                <div class="pull-right">
                    <input type="text" class="datepicker date-from" readonly placeholder="from date" value="<?php echo (isset($_GET['from']) && $_GET['from'] != null) ? $_GET['from'] : '' ;?>" style="border: 1px solid #ccc; padding: 6px 4px;">
                    <input type="text" class="datepicker date-to" readonly placeholder="to date" value="<?php echo (isset($_GET['to']) && $_GET['to'] != null) ? $_GET['to'] : '';?>" style="border: 1px solid #ccc; padding: 6px 4px;">
                    <a href="#" class="btn btn-primary sort-by-go">GO</a>
                </div>
            </div>
            <!-- view for english date  -->
        <?php } ?>
    </div>

    <div class="panel">                    
        <div class="panel-body padding-top-10">
            <div class="row row-lg">
                <div class="col-sm-12 col-lg-12 col-md-12">
                    <div class="table-parent">
                        <table class="table table-hover dataTable table-striped width-full with-export dtr-inline">
                            <thead>
                                <tr>
                                    <th width="27">#</th>
                                    <th width="100">Date</th>
                                    <th width="50">FOC No.</th>
                                    <th width="100">Customer Name</th>
                                    <th width="50">Pax</th>
                                    <th width="100">VAT/PAN No.</th>
                                    <th width="100">Address</th>
                                    <th width="50">Created By</th>
                                </tr>
                            </thead>
                            
                            <tbody class="date-conversion">
                                <?php 
                                if ($data != null) : $i=0;?>
                                    <?php 
                                    foreach($data as $row) :
                                        ?>
                                        <tr>
                                            <td><?php echo ++$i;?></td>

                                            <?php if( isset(Yii::$app->session['date_format']) && Yii::$app->session['date_format'] == 'nepali') { ?>
                                                <td class="to-BS" data-date="<?php echo date("Y-m-d", strtotime($row['created_on']));?>"></td>
                                            <?php }
                                                else { ?>
                                                <td><?php echo date("Y-m-d", strtotime($row['created_on']));?></td>
                                            <?php } ?>

                                            <td><a class="read-foc" href="<?php echo $baseUrl;?>/reports/foc-detail/<?php echo $row['foc_no'];?>" data-foc="<?php echo $row['foc_no'];?>">FOC-<?php echo $row['foc_no'];?></a></td>
                                            <td><?php echo $row['customer_name'];?></td>
                                            <td><?php echo $row['customer_pax'];?></td>
                                            <td><?php echo ($row['customer_pan'] == null) ? 'N/A' : $row['customer_pan'];?></td>
                                            <td><?php echo ($row['customer_address'] == null) ? 'N/A' : $row['customer_address'];?></td>
                                            <td><?php echo $row['user_name'];?></td>
                                        </tr>
                                    <?php endforeach; ?>
                                <?php endif;?>
                            </tbody>

                            <tfoot>
                                <tr>
                                    <th width="27">#</th>
                                    <th width="100">Date</th>
                                    <th width="50">FOC No.</th>
                                    <th width="100">Customer Name</th>
                                    <th width="50">Pax</th>
                                    <th width="100">VAT/PAN No.</th>
                                    <th width="100">Address</th>
                                    <th width="50">Created By</th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>  
    </div>

    <div class="clearfix"></div>
</div>

<div class="modal modal-aside fade horizontal right modal-read-foc" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-header theme-bg-color">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title color-white foc-header"></h4>
            </div>

            <input type="hidden" class="hidden-order-id">

            <div class="modal-body foc-content"></div>
        </div>
    </div>
</div>

<script>
    var item_type = <?php echo json_encode(Yii::$app->params['item_type']); ?>;
</script>