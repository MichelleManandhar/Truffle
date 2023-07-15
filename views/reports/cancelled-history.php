<?php
$baseUrl = Yii::$app->request->baseUrl;
$currency = strtoupper(Yii::$app->session['currency']);
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

$this->registerJsFile($baseUrl . '/assets/software/print-bill.js');
$this->registerJsFile($baseUrl . '/assets/software/invoice.js');
$this->registerJsFile($baseUrl . '/assets/software/cancel-order.js');

$this->title = Yii::$app->params['system'] . ' | Sales Return History';
?>

<div class="page-header padding-bottom-0">
    <h1 class="page-title">Sales Return History</h1>
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
                    <input type="text" readonly class="datepicker date-from" placeholder="from date" value="<?php echo (isset($_GET['from']) && $_GET['from'] != null) ? $_GET['from'] : '' ;?>" style="border: 1px solid #ccc; padding: 6px 4px;">
                    <input type="text" readonly class="datepicker date-to" placeholder="to date" value="<?php echo (isset($_GET['to']) && $_GET['to'] != null) ? $_GET['to'] : '';?>" style="border: 1px solid #ccc; padding: 6px 4px;">
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
                                    <th width="50">Date</th>
                                    <th width="50">Customer</th>
                                    <th width="50">Invoice No.</th>
                                    <th width="50">Sub Total (<?= $currency ?>)</th>
                                    <th width="50">Discount %</th>
                                    <th width="50">Discount Amount (<?= $currency ?>)</th>
                                    <th width="50">Service Charge %</th>
                                    <th width="50">Service Charge Amount (<?= $currency ?>)</th>
                                    <th width="50">Total (<?= $currency ?>)</th>
                                    <th width="50">Total Cash (<?= $currency ?>)</th>
                                    <th width="50">Total Card (<?= $currency ?>)</th>
                                    <th width="50">Total Credit (<?= $currency ?>)</th>
                                    <th width="50">VAT/PAN No.</th>
                                    <th width="100">Reason</th>
                                    <th width="50">INV Type</th>
                                    <th width="50">Staff</th>
                                </tr>
                            </thead>
                            
                            <tbody class="date-conversion">
                                <?php 
                                $total      = 0;
                                $sub_total  = 0;
                                $discount_amount_total      = 0;
                                $service_charge_amount_total    = 0;
                                $cash_total = 0;
                                $card_total = 0;
                                $credit_total = 0;
                                if ($data != null) : $i=0;

                                    foreach($data as $row) :
                                        if($row['cash_total'] == 0 && $row['payment_type'] == Yii::$app->params['payment_type']['cash']) 
                                        {
                                            $cash_total += $row['total']; 
                                        }
                                        elseif($row['credit_total'] == 0 && $row['payment_type'] == Yii::$app->params['payment_type']['credit']) 
                                        {
                                            $credit_total += $row['total'];
                                        }
                                        elseif($row['card_total'] == 0 && $row['payment_type'] == Yii::$app->params['payment_type']['card']) 
                                        {
                                            $card_total += $row['total'];
                                        }
                                        else {
                                            $card_total += $row['card_total'];
                                            $cash_total += $row['cash_total']; 
                                            $credit_total += $row['credit_total'];
                                        }

                                        $sub_total              += $row['sub_total'];
                                        $discount_amount_total  += $row['discount_amount'];
                                        $service_charge_amount_total += $row['service_charge_amount'];
                                        $total += $row['total'];
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

                                            <?php if($row['type'] == Yii::$app->params['order_type']['table_order']) : ?>
                                                <td><a class="btn btn-primary btn-xs read-invoice" href="<?php echo $baseUrl;?>/reports/invoice/<?php echo $row['cancel_against_inv'];?>" data-invoice="<?php echo $row['cancel_against_inv'];?>" data-invoice-type="order_invoice"><?php echo $row['cancel_against_inv'];?></a></td>
                                            <?php elseif($row['type'] == Yii::$app->params['order_type']['retail']) : ?>
                                                <td><a class="btn btn-primary btn-xs read-invoice" href="<?php echo $baseUrl;?>/reports/invoice/<?php echo $row['cancel_against_inv'];?>" data-invoice="<?php echo $row['cancel_against_inv'];?>" data-invoice-type="order_invoice"><?php echo $row['cancel_against_inv'];?></a></td>
                                            <?php elseif($row['type'] == Yii::$app->params['order_type']['take_away']) : ?>
                                                <td><a class="btn btn-primary btn-xs read-invoice" href="<?php echo $baseUrl;?>/reports/invoice/<?php echo $row['cancel_against_inv'];?>" data-invoice="<?php echo $row['cancel_against_inv'];?>" data-invoice-type="order_invoice"><?php echo $row['cancel_against_inv'];?></a></td>
                                            <?php elseif($row['type'] == Yii::$app->params['order_type']['pick_up']) : ?>
                                                <td><a class="btn btn-primary btn-xs read-invoice" href="<?php echo $baseUrl;?>/reports/invoice/<?php echo $row['cancel_against_inv'];?>" data-invoice="<?php echo $row['cancel_against_inv'];?>" data-invoice-type="order_invoice"><?php echo $row['cancel_against_inv'];?></a></td>
                                            <?php elseif($row['type'] == Yii::$app->params['order_type']['delivery']) : ?>
                                                <td><a class="btn btn-primary btn-xs read-invoice" href="<?php echo $baseUrl;?>/reports/invoice/<?php echo $row['cancel_against_inv'];?>" data-invoice="<?php echo $row['cancel_against_inv'];?>" data-invoice-type="order_invoice"><?php echo $row['cancel_against_inv'];?></a></td>
                                            <?php elseif($row['type'] == Yii::$app->params['order_type']['delivery_charge']) : ?>
                                                <td><a class="btn btn-primary btn-xs read-delivery-charge-invoice" href="<?php echo $baseUrl;?>/reports/delivery-charge-invoice/<?php echo $row['cancel_against_inv'];?>" data-invoice="<?php echo $row['cancel_against_inv'];?>" ><?php echo $row['cancel_against_inv'];?></a></td>
                                            <?php endif; ?>

                                            <td><?php echo $row['sub_total'];?></td>
                                            <td><?php echo $row['discount_rate'];?>%</td>
                                            <td><?php echo $row['discount_amount'];?></td>
                                            <td><?php echo $row['service_charge_rate'];?>%</td>
                                            <td><?php echo $row['service_charge_amount'];?></td>
                                            <td><?php echo $row['total'];?></td>
                                            <td><?php echo $row['cash_total'];?></td>
                                            <td><?php echo $row['card_total'];?></td>
                                            <td><?php echo $row['credit_total'];?></td>
                                            <td><?php echo ($row['customer_pan']==0) ? 'N/A' : $row['customer_pan'];?></td>
                                            <td><?php echo $row['cancelled_reason'];?></td>

                                            <?php if($row['type'] == Yii::$app->params['order_type']['table_order']) : ?>
                                                <td>Table Inv</td>
                                            <?php elseif($row['type'] == Yii::$app->params['order_type']['retail']) : ?>
                                                <td>Retail Inv</td>
                                            <?php elseif($row['type'] == Yii::$app->params['order_type']['take_away']) : ?>
                                                <td>Take Away Inv</td>
                                            <?php elseif($row['type'] == Yii::$app->params['order_type']['pick_up']) : ?>
                                                <td>Pick Up Inv</td>
                                            <?php elseif($row['type'] == Yii::$app->params['order_type']['delivery']) : ?>
                                                <td>Delivery Inv</td>
                                            <?php elseif($row['type'] == Yii::$app->params['order_type']['delivery_charge']) : ?>
                                                <td>Delivery Charge Inv</td>
                                            <?php endif; ?>

                                            <td><?php echo $row['user_name'];?></td>
                                        </tr>
                                    <?php endforeach; ?>
                                <?php endif;?>
                            </tbody>

                            <tfoot>
                                <tr>
                                    <th width="27">#</th>
                                    <th width="50">Date</th>
                                    <th width="50">Customer</th>
                                    <th width="50">Total : </th>
                                    <th width="50"><?php echo $sub_total; ?></th>
                                    <th width="50"></th>
                                    <th width="50"><?php echo $discount_amount_total; ?></th>
                                    <th width="50"></th>
                                    <th width="50"><?php echo $service_charge_amount_total; ?></th>
                                    <th width="50"><?php echo $total; ?></th>
                                    <th width="50"><?php echo $cash_total; ?></th>
                                    <th width="50"><?php echo $card_total; ?></th>
                                    <th width="50"><?php echo $credit_total; ?></th>
                                    <th width="50"></th>
                                    <th width="100"></th>
                                    <th width="50"></th>
                                    <th width="50"></th>
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

<script>
    var break_down_type_advance     = '<?php echo Yii::$app->params['break_down_payment_type']['advance']; ?>';
    var payment_type = <?php echo json_encode(Yii::$app->params['payment_type']); ?>;
    var item_type = <?php echo json_encode(Yii::$app->params['item_type']); ?>;
    var order_type  = <?php echo json_encode(Yii::$app->params['order_type']); ?>;
    var currency    = '<?= $currency ?>';
</script>

