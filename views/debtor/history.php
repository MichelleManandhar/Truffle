<?php
/* @var $this yii\web\View */
$baseUrl = Yii::$app->request->baseUrl;
$currency = strtoupper(Yii::$app->session['currency']);
$temp = explode(":",Yii::$app->session['fiscal_year']);
$starting_fiscal_year_from_date = $temp[0];
$starting_fiscal_year_to_date   = $temp[1];
$bill_config = Yii::$app->session['bill_config'];
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

$this->registerJsFile($baseUrl . '/assets/software/print-bill.js');

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

$this->registerJsFile($baseUrl . '/assets/software/invoice.js');

$this->title = Yii::$app->params['system'] . ' | History';
?>

<div class="page-header padding-bottom-0">
    <h1 class="page-title">History -<?php echo ucwords($debtor['name']) ?></h1>

    <div class="clearfix"></div>
</div>
<div class="page-content padding-top-15 container-fluid">

    <?php if( isset(Yii::$app->session['date_format']) && Yii::$app->session['date_format'] == 'nepali') { ?>
        <!-- view for nepali date  -->
        <div class="row margin-bottom-20">
            <div class="col-lg-12">
                <div class="nepali-bs-date form-inline text-right">
                    <div class="form-group">
                        <label class="control-label">
                            <div class="input-group">
                                <input class="form-control" readonly placeholder="FROM (BS)" type="text" id="nepaliDate9" autocomplete="off">
                                <input name="from_english" type="hidden" id="hiddennepaliDate9" class="date-from" />
                                <span class="input-group-btn for-datepicker"><i class="fa fa-clock-o"></i></span>
                            </div>
                        </label>
                    </div>
                    <div class="form-group">
                        <label class="control-label">
                            <div class="input-group">
                                <input class="form-control" readonly placeholder="TO (BS)" type="text" id="nepaliDate8" autocomplete="off">
                                <input name="to_english" type="hidden" id="hiddennepaliDate8" class="date-to" />
                                <span class="input-group-btn for-datepicker"><i class="fa fa-clock-o"></i></span>
                            </div>
                        </label>
                    </div>
                    <a href="#" class="btn btn-primary sort-by-id" type="submit" >GO</a>
                </div>
            </div>
        </div>
        <!-- view for nepali date  -->
    <?php }
        else { ?>
        <!-- view for english date  -->
        <div class="row row-lg margin-bottom-20">
            <div class="col-sm-12 col-lg-12 col-md-12">
                <div class="pull-right">
                    <input type="text" class="datepicker date-from" readonly placeholder="from date" value="<?php echo (isset($_GET['from']) && $_GET['from'] != null) ? $_GET['from'] : '';?>" style="border: 1px solid #ccc; padding: 6px 4px;">
                    <input type="text" class="datepicker date-to" readonly placeholder="to date" value="<?php echo (isset($_GET['to']) && $_GET['to'] != null) ? $_GET['to'] : '';?>" style="border: 1px solid #ccc; padding: 6px 4px;">
                    <a href="#" class="btn btn-primary sort-by-id">GO</a>
                </div>
            </div>
        </div>
        <!-- view for english date  -->
    <?php } ?>

    <div class="panel">                    
        <div class="panel-body">
            <div class="row">
                <div class="col-lg-12">
                    <div class="nav-tabs-horizontal">
                        <ul class="nav nav-tabs list-tab nav-justified" data-plugin="nav-tabs" role="tablist">
                            <li class="active" role="presentation"><a data-toggle="tab" href="#payment-history" aria-controls="exampleTabsTwo"
                              role="tab">Payment History</a></li>
                            <li role="presentation"><a data-toggle="tab" href="#credit-order-history" aria-controls="exampleTabsOne"
                              role="tab">Credit Order History</a></li>
                            <li role="presentation"><a data-toggle="tab" href="#credit-break-down-history" aria-controls="exampleTabsOne"
                              role="tab">Credit Break Down History</a></li>
                        </ul>
                        <div class="tab-content margin-top-10">
                            <div class="tab-pane active" id="payment-history" role="tabpanel">
                                <div class="row row-lg">
                                    <div class="col-sm-12 col-lg-12 col-md-12">
                                        <div class="table-parent">
                                            <table class="table table-hover dataTable table-striped width-full with-export dtr-inline">
                                                <thead>
                                                    <tr>
                                                        <th width="100">Receipt No</th>
                                                        <th width="100">Amount Paid</th>
                                                        <th width="100">Paid On</th>
                                                        <th width="100">Payment Type</th>
                                                        <?php 
                                                            if ((date('Y-m-d') >= $starting_fiscal_year_from_date) 
                                                                    && ( date('Y-m-d') < date('Y-m-d', strtotime($starting_fiscal_year_to_date. ' + 11 days'))) )
                                                            { 
                                                        ?>
                                                            <th width="100">Print</th>
                                                        <?php } ?>
                                                    </tr>
                                                </thead>
                                                <tfoot>
                                                    <tr>
                                                        <th width="100">Receipt No</th>
                                                        <th width="100">Amount Paid</th>
                                                        <th width="100">Paid On</th>
                                                        <th width="100">Payment Type</th>
                                                        <?php
                                                            if ((date('Y-m-d') >= $starting_fiscal_year_from_date) 
                                                                    && ( date('Y-m-d') < date('Y-m-d', strtotime($starting_fiscal_year_to_date. ' + 11 days'))) )
                                                            { 
                                                        ?>
                                                            <th width="100">Print</th>
                                                        <?php } ?>
                                                    </tr>
                                                </tfoot>
                                                <tbody> 
                                                    <?php if($debtor_paid != null) :
                                                        foreach ($debtor_paid as $payment) : ?>
                                                            <tr>
                                                                <td width="100"><?php echo $payment['invoice_no']; ?></td>
                                                                <td width="100"><?php echo round($payment['total'] , 2); ?></td>
                                                                <td width="100"><?php echo $payment['created_on']; ?></td>
                                                                <?php if($payment['debtor_payment_type'] == Yii::$app->params['debtor_payment_type']['cash']): ?>
                                                                    <td width="100">Cash</td>
                                                                <?php elseif($payment['debtor_payment_type'] == Yii::$app->params['debtor_payment_type']['card']): ?>
                                                                    <td width="100">Card</td>
                                                                <?php elseif($payment['debtor_payment_type'] == Yii::$app->params['debtor_payment_type']['cheque']): ?>
                                                                    <td width="100">Cheque (No. <?= $payment['cheque_no'] ?>)</td>
                                                                <?php endif; ?>
                                                                <?php 
                                                                    if ((date('Y-m-d') >= $starting_fiscal_year_from_date) 
                                                                            && ( date('Y-m-d') < date('Y-m-d', strtotime($starting_fiscal_year_to_date. ' + 11 days'))) )
                                                                    { 
                                                                ?>
                                                                    <td width="100">
                                                                        <button class="btn btn-danger btn-sm print-duplicate-receipt" style="padding: 6px 8px;" data-id="<?php echo $payment['id'];?>"><i class="icon fa-print"></i></button>
                                                                    </td>
                                                                <?php } ?>
                                                            </tr>
                                                    <?php endforeach; endif;?>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="tab-pane" id="credit-order-history" role="tabpanel">
                                <div class="row row-lg">
                                    <div class="col-sm-12 col-lg-12 col-md-12">
                                        <div class="table-parent" style="overflow-x: scroll;">
                                            <table class="table table-hover dataTable table-striped width-full with-export dtr-inline">
                                                <thead>
                                                    <tr>
                                                        <th width="27">#</th>
                                                        <th width="50">Date</th>
                                                        <th width="50">Customer</th>
                                                        <th width="50">Invoice No.</th>
                                                        <th width="50">Discount %</th>
                                                        <th width="50">Discount Amount (<?= $currency ?>)</th>
                                                        <th width="50">Service Charge %</th>
                                                        <th width="50">Service Charge Amount (<?= $currency ?>)</th>
                                                        <th width="50">Total (<?= $currency ?>)</th>
                                                        <th width="50">Staff</th>
                                                    </tr>
                                                </thead>
                                                
                                                <tbody class="date-conversion">
                                                    <?php 
                                                    $total      = 0;
                                                    $sub_total  = 0;
                                                    $cash_total      = 0;
                                                    if ($credit_order != null) : $i=0;
                                                        foreach($credit_order as $row) : 
                                                            if ($row['payment_type'] == Yii::$app->params['payment_type']['credit']) :
                                                                $cash_total += $row['total'];
                                                                $sub_total += $row['sub_total'];
                                                                ?>
                                                                <tr>
                                                                    <td><?php echo ++$i;?></td>

                                                                    <?php if( isset(Yii::$app->session['date_format']) && Yii::$app->session['date_format'] == 'nepali') { ?>
                                                                        <td class="to-BS" data-date="<?php echo date("Y-m-d", strtotime($row['created_on']));?>"></td>
                                                                    <?php }
                                                                        else { ?>
                                                                        <td><?php echo date("Y-m-d", strtotime($row['created_on']));?></td>
                                                                    <?php } ?>

                                                                    <td><?php echo $row['customer_name'];?></td>
                                                                    <td><a class="btn btn-primary btn-xs read-invoice" href="<?php echo $baseUrl;?>/reports/invoice/<?php echo $row['invoice_no'];?>" data-invoice="<?php echo $row['invoice_no'];?>" data-invoice-type="order_invoice"><?php echo $row['invoice_no'];?></a></td>
                                                                    <td><?php echo $row['discount_rate'];?>%</td>
                                                                    <td><?php echo $row['discount_amount'];?></td>
                                                                    <td><?php echo $row['service_charge_rate'];?>%</td>
                                                                    <td><?php echo $row['service_charge_amount'];?></td>
                                                                    <td><?php echo $row['total'];?></td>
                                                                    <td><?php echo $row['user_name'];?></td>
                                                                </tr>
                                                        <?php endif; endforeach; ?>
                                                    <?php endif;?>
                                                </tbody>

                                                <tfoot>
                                                    <tr>
                                                        <th width="27"></th>
                                                        <th width="50"></th>
                                                        <th width="50"></th>
                                                        <th width="50"></th>
                                                        <th width="50"></th>
                                                        <th width="50"></th>
                                                        <th width="50"></th>
                                                        <th width="50">Total Credit</th>
                                                        <th width="50"><?php echo $cash_total; ?></th>
                                                        <th width="50"></th>
                                                    </tr>
                                                </tfoot>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="tab-pane" id="credit-break-down-history" role="tabpanel">
                                <div class="row row-lg">
                                    <div class="col-sm-12 col-lg-12 col-md-12">
                                        <div class="table-parent" style="overflow-x: scroll;">
                                            <table class="table table-hover dataTable table-striped width-full with-export dtr-inline" >
                                                <thead>
                                                    <tr>
                                                        <th width="27">#</th>
                                                        <th width="50">Date</th>
                                                        <th width="50">Customer</th>
                                                        <th width="50">Invoice No.</th>
                                                        <th width="50">Discount %</th>
                                                        <th width="50">Discount Amount (<?= $currency ?>)</th>
                                                        <th width="50">Service Charge %</th>
                                                        <th width="50">Service Charge Amount (<?= $currency ?>)</th>
                                                        <th width="50">Total (<?= $currency ?>)</th>
                                                        <th width="50">Staff</th>
                                                        <th width="50">Action</th>
                                                    </tr>
                                                </thead>
                                                
                                                <tbody class="date-conversion">
                                                    <?php 
                                                    $total          = 0;
                                                    $sub_total      = 0;
                                                    $credit_total   = 0;
                                                    if ($credit_break_down != null) : $i=0;
                                                        foreach($credit_break_down as $row) : 
                                                            if ($row['payment_type'] == Yii::$app->params['payment_type']['credit']) :
                                                                $credit_total += $row['total'];
                                                                $sub_total += $row['sub_total'];
                                                                ?>
                                                                <tr>
                                                                    <td><?php echo ++$i;?></td>

                                                                    <?php if( isset(Yii::$app->session['date_format']) && Yii::$app->session['date_format'] == 'nepali') { ?>
                                                                        <td class="to-BS" data-date="<?php echo date("Y-m-d", strtotime($row['created_on']));?>"></td>
                                                                    <?php }
                                                                        else { ?>
                                                                        <td><?php echo date("Y-m-d", strtotime($row['created_on']));?></td>
                                                                    <?php } ?>
                                                                    
                                                                    <td><?php echo $row['customer_name'];?></td>
                                                                    <td><a class="btn btn-primary btn-xs read-invoice" href="<?php echo $baseUrl;?>/reports/invoice/<?php echo $row['main_invoice'];?>" data-invoice="<?php echo $row['main_invoice'];?>" data-invoice-type="order_invoice"><?php echo $row['main_invoice'];?></a></td>
                                                                    <td><?php echo $row['discount_rate'];?>%</td>
                                                                    <td><?php echo $row['discount_amount'];?></td>
                                                                    <td><?php echo $row['service_charge_rate'];?>%</td>
                                                                    <td><?php echo $row['service_charge_amount'];?></td>
                                                                    <td><?php echo $row['total'];?></td>
                                                                    <td><?php echo $row['user_name'];?></td>
                                                                    <td>
                                                                        <a class="btn btn-primary btn-xs read-invoice" href="<?php echo $baseUrl;?>/reports/invoice/<?php echo $row['invoice_no'];?>" data-invoice="<?php echo $row['invoice_no'];?>" data-invoice-type="debtor_invoice">View Detail</a>
                                                                    </td>
                                                                </tr>
                                                        <?php endif; endforeach; ?>
                                                    <?php endif;?>
                                                </tbody>

                                                <tfoot>
                                                    <tr>
                                                        <th width="27"></th>
                                                        <th width="50"></th>
                                                        <th width="50"></th>
                                                        <th width="50"></th>
                                                        <th width="50"></th>
                                                        <th width="50"></th>
                                                        <th width="50"></th>
                                                        <th width="50">Total Credit</th>
                                                        <th width="50"><?php echo $credit_total; ?></th>
                                                        <th width="100"></th>
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
                </div>
            </div>
        </div>
    </div>
</div>

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

            <div class="modal-body invoice-content"> </div>
        </div>
    </div>
</div>

<!-- printing loading modal -->
<div class="modal fade print-loading-modal" tabindex="-1" data-backdrop="static" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm" style="position: absolute;top: 35%;left: 38%;">
        <div class="modal-content">
            <div class="print-overlay">
                <i class="fa fa-print"></i>
                <!-- <h4>printing . . . .</h4> -->
                <div class="print-text"></div>
            </div>
        </div>
    </div>
</div>
<!-- printing loading modal -->

<script>
    var break_down_type_advance     = '<?php echo Yii::$app->params['break_down_payment_type']['advance']; ?>';
    var payment_type = <?php echo json_encode(Yii::$app->params['payment_type']); ?>;
    var item_type = <?php echo json_encode(Yii::$app->params['item_type']); ?>;
    var order_type      = <?php echo json_encode(Yii::$app->params['order_type']); ?>;
    var currency = '<?php echo $currency ?>';
    var bill_config = <?php echo json_encode(Yii::$app->session['bill_config']) ?>;
</script>