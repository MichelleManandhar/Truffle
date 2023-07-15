<?php
$baseUrl = Yii::$app->request->baseUrl;
$temp = explode(":",Yii::$app->session['fiscal_year']);
$starting_fiscal_year_from_date = $temp[0];
$starting_fiscal_year_to_date   = $temp[1];
$currency = strtoupper(Yii::$app->session['currency']);
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

$this->registerJsFile($baseUrl . '/assets/plugins/bootstrap-select/bootstrap-select.min.js');
$this->registerJsFile($baseUrl . '/assets/plugins/components/bootstrap-select.min.js');

$this->registerJsFile($baseUrl . '/assets/js/users.min.js');
/*for datatable*/
$this->registerJsFile($baseUrl . '/assets/software/invoice.js');
$this->registerJsFile($baseUrl . '/assets/software/print-bill.js');
$this->registerJsFile($baseUrl . '/assets/software/nepali-date.js');
$this->registerJsFile($baseUrl . '/assets/software/order-today.js');


$this->title = Yii::$app->params['system'] . ' | Today Transaction';
?>

<div class="page-header padding-bottom-0">
    <h1 class="page-title">Today's Transaction Summary</h1>
    <div class="clearfix"></div>
</div>

<div class="page-content padding-30 container-fluid">   
    <div class="row row-lg margin-bottom-20">
        <div class="col-lg-6 col-md-6 col-sm-3">
         
            <div class="row">
                <div class="col-lg-2 col-md-4 col-sm-5 col-xs-12">
                    <h5>Customer:</h5>  
                </div>
                <div class="col-lg-5 col-md-7 col-sm-7 col-xs-12">
                    <select class="form-control show-tick bs-select-hidden sort-by-client" data-plugin="selectpicker" data-live-search="true"  data-show-subtext="true">
                        <option value="all" selected>All</option>
                        
                        <?php
                            foreach($client as $row){
                        ?>
                            <option value="<?= $row['slug'];?>" <?php echo (isset($_GET['client']) && $_GET['client'] ==  $row['slug']) ? 'selected' : '';?>  data-subtext="<?=$row['phone'] ;?>"> <?= $row['name']; ?> </option>

                        <?php } ?>
                    </select>
                </div>
            </div>
        </div>
    
    </div>
    <div class="panel">                    
        <div class="panel-body">
            <div class="row row-lg">
                <div class="col-sm-12 col-lg-12 col-md-12">
                    <div class="table-parent">
                        <table class="table table-hover dataTable table-striped width-full with-export dtr-inline">
                            <thead>
                                <tr>
                                    <th width="27">#</th>
                                    <th width="50">Customer</th>
                                    <th width="50">Contact No</th>
                                    <th width="50">Invoice No.</th>
                                    <th width="50">Sub Total (<?= $currency ?>)</th>
                                    <th width="50">Discount %</th>
                                    <th width="50">Discount Amount (<?= $currency ?>)</th>
                                    <th width="50">Service Charge %</th>
                                    <th width="50">Service Charge Amount (<?= $currency ?>)</th>
                                    <th width="50">Total (<?= $currency ?>)</th>
                                    <th width="50">Round Value (<?= $currency ?>)</th>
                                    <th width="50">Total Cash (<?= $currency ?>)</th>
                                    <th width="50">Total Card (<?= $currency ?>)</th>
                                    <th width="50">Total Credit (<?= $currency ?>)</th>
                                    <th width="50">Total Retail (<?= $currency ?>)</th>
                                    <?php
                                        if ((date('Y-m-d') >= $starting_fiscal_year_from_date) 
                                                && ( date('Y-m-d') < date('Y-m-d', strtotime($starting_fiscal_year_to_date. ' + 11 days'))) )
                                        {
                                    ?>
                                        <th width="50">Print</th>
                                    <?php } ?>
                                    <th width="50">VAT/PAN No.</th>
                                    <th width="100">Date</th>
                                    <th width="50">Staff</th>
                                </tr>
                            </thead>
                            
                            <tbody class="date-conversion">
                                <?php 
                                $round_value    = 0;
                                $total          = 0;
                                $sub_total      = 0;
                                $discount_amount_total          = 0;
                                $service_charge_amount_total    = 0;
                                $cash_total     = 0;
                                $card_total     = 0;
                                $credit_total   = 0;
                                $total_retail   = 0;
                                if ($data != null) : $i=0;?>
                                    <?php 
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

                                        $sub_total += $row['sub_total'];
                                        $discount_amount_total += $row['discount_amount'];
                                        $service_charge_amount_total += $row['service_charge_amount'];
                                        $total += $row['total'];
                                        $round_value += $row['round_value'];
                                        ?>
                                        <tr>
                                            <td><?php echo ++$i;?></td>
                                            <td><?php echo $row['customer_name'];?></td>
                                            <td><?php echo $row['customer_phone'];?></td>

                                            <?php if($row['type'] == Yii::$app->params['order_type']['table_order']) : ?>
                                                <td><a class="btn btn-primary btn-xs read-invoice" href="<?php echo $baseUrl;?>/reports/invoice/<?php echo $row['invoice_no'];?>" data-invoice="<?php echo $row['invoice_no'];?>" data-invoice-type="order_invoice"><?php echo $row['invoice_no'];?></a></td>
                                            <?php elseif($row['type'] == Yii::$app->params['order_type']['retail']) : ?>
                                                <td><a class="btn btn-primary btn-xs read-invoice" href="<?php echo $baseUrl;?>/reports/invoice/<?php echo $row['invoice_no'];?>" data-invoice="<?php echo $row['invoice_no'];?>" data-invoice-type="order_invoice"><?php echo $row['invoice_no'];?></a></td>
                                            <?php elseif($row['type'] == Yii::$app->params['order_type']['take_away']) : ?>
                                                <td><a class="btn btn-primary btn-xs read-invoice" href="<?php echo $baseUrl;?>/reports/invoice/<?php echo $row['invoice_no'];?>" data-invoice="<?php echo $row['invoice_no'];?>" data-invoice-type="order_invoice"><?php echo $row['invoice_no'];?></a></td>
                                            <?php elseif($row['type'] == Yii::$app->params['order_type']['pick_up']) : ?>
                                                <td><a class="btn btn-primary btn-xs read-invoice" href="<?php echo $baseUrl;?>/reports/invoice/<?php echo $row['invoice_no'];?>" data-invoice="<?php echo $row['invoice_no'];?>" data-invoice-type="order_invoice"><?php echo $row['invoice_no'];?></a></td>
                                            <?php elseif($row['type'] == Yii::$app->params['order_type']['delivery']) : ?>
                                                <td><a class="btn btn-primary btn-xs read-invoice" href="<?php echo $baseUrl;?>/reports/invoice/<?php echo $row['invoice_no'];?>" data-invoice="<?php echo $row['invoice_no'];?>" data-invoice-type="order_invoice"><?php echo $row['invoice_no'];?></a></td>
                                            <?php elseif($row['type'] == Yii::$app->params['order_type']['delivery_charge']) : ?>
                                                <td><a class="btn btn-primary btn-xs read-delivery-charge-invoice" href="<?php echo $baseUrl;?>/reports/delivery-charge-invoice/<?php echo $row['invoice_no'];?>" data-invoice="<?php echo $row['invoice_no'];?>" ><?php echo $row['invoice_no'];?></a></td>
                                            <?php endif; ?>

                                            <td><?php echo $row['sub_total'];?></td>
                                            <td><?php echo $row['discount_rate'];?>%</td>
                                            <td><?php echo $row['discount_amount'];?></td>
                                            <td><?php echo $row['service_charge_rate'];?>%</td>
                                            <td><?php echo $row['service_charge_amount'];?></td>
                                            <td><?php echo $row['total'];?></td>
                                            <td><?php echo $row['round_value'];?></td>
                                            <td><?php 
                                                    if($row['cash_total'] == 0 && $row['card_total'] == 0 && $row['credit_total'] == 0) {
                                                        if($row['payment_type'] == Yii::$app->params['payment_type']['cash']) 
                                                        {
                                                            echo ($row['cash_total'] == 0) ? $row['total']: $row['cash_total'];
                                                        }else{
                                                            echo '0';
                                                        } 
                                                    } else {
                                                        echo $row['cash_total'];
                                                    }
                                                    ?>
                                            </td>
                                            <td><?php 
                                                    if($row['cash_total'] == 0 && $row['card_total'] == 0 && $row['credit_total'] == 0) {
                                                        if($row['payment_type'] == Yii::$app->params['payment_type']['card']) 
                                                        {
                                                            echo ($row['card_total'] == 0) ? $row['total'] : $row['card_total']; 
                                                        }else{
                                                            echo '0';
                                                        }
                                                    } else {
                                                        echo $row['card_total'];
                                                    }
                                                    ?>
                                            </td>
                                            <td><?php 
                                                    if($row['cash_total'] == 0 && $row['card_total'] == 0 && $row['credit_total'] == 0) {
                                                        if($row['payment_type'] == Yii::$app->params['payment_type']['credit']) 
                                                        {
                                                            echo ($row['credit_total'] == 0) ? $row['total'] : $row['credit_total'];
                                                        }else{
                                                            echo '0';
                                                        }
                                                    } else {
                                                        echo $row['credit_total'];
                                                    }
                                                    ?>
                                            </td>

                                            <?php if($row['type'] == Yii::$app->params['order_type']['retail']) : ?>
                                                <td><?php echo $row['total'];?></td>
                                                <?php $total_retail += $row['total'] ?>
                                            <?php else : ?>
                                                <td>0</td>
                                            <?php endif; ?>

                                            <?php
                                                if ((date('Y-m-d') >= $starting_fiscal_year_from_date) 
                                                        && ( date('Y-m-d') < date('Y-m-d', strtotime($starting_fiscal_year_to_date. ' + 11 days'))) )
                                                {
                                            ?>
                                                <td><button class="btn btn-danger btn-sm print-duplicate-bill" data-id="<?php echo $row['id'];?>" style="padding: 6px 8px;"><i class="icon fa-print"></i></button></td>
                                            <?php } ?>

                                            <td><?php echo ($row['customer_pan']==0) ? 'N/A' : $row['customer_pan'];?></td>

                                            <?php if( isset(Yii::$app->session['date_format']) && Yii::$app->session['date_format'] == 'nepali') { ?>
                                                <td>
                                                    <span class="to-BS" data-date="<?php echo date("Y-m-d", strtotime($row['created_on']));?>"></span>
                                                    <br>
                                                    <span><?php echo date("H:i:s", strtotime($row['created_on']));?></span>
                                                </td>
                                            <?php }
                                                else { ?>
                                                <td><?php echo date("Y-m-d", strtotime($row['created_on']));?>
                                                    <br>
                                                    <span><?php echo date("H:i:s", strtotime($row['created_on']));?></span></td>
                                            <?php } ?>

                                            <td><?php echo $row['user_name'];?></td>
                                        </tr>
                                    <?php endforeach; ?>
                                <?php endif;?>
                            </tbody>

                            <tfoot>
                                <tr>
                                    <th width="27"></th>
                                    <th width="50"></th>
                                    <th width="50" class="green-600">Total : </th>
                                    <th width="50" class="green-600"><?php echo $sub_total; ?></th>
                                    <th width="50"></th>
                                    <th width="50" class="green-600"><?php echo $discount_amount_total; ?></th>
                                    <th width="50"></th>
                                    <th width="50" class="green-600"><?php echo $service_charge_amount_total; ?></th>
                                    <th width="50" class="green-600"><?php echo $total; ?></th>
                                    <th width="50" class="green-600"><?php echo $round_value; ?></th>
                                    <th width="50" class="green-600"><?php echo $cash_total; ?></th>
                                    <th width="50" class="green-600"><?php echo $card_total; ?></th>
                                    <th width="50" class="green-600"><?php echo $credit_total; ?></th>
                                    <th width="50" class="green-600"><?php echo $total_retail ?></th>
                                    <?php
                                        if ((date('Y-m-d') >= $starting_fiscal_year_from_date) 
                                                && ( date('Y-m-d') < date('Y-m-d', strtotime($starting_fiscal_year_to_date. ' + 11 days'))) )
                                        {
                                    ?>
                                        <th width="50"></th>
                                    <?php } ?>
                                    <th width="50"></th>
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

    <div class="row">
        <div class="col-sm-12 col-xlg-12 col-lg-12 col-md-12">
            <div class="panel">                    
                <div class="panel-body">
                    <div class="row">
                        <div class="col-lg-2 col-md-2 col-sm-2">
                            <h4>Today's Total Cash</h4>
                            <div class="row row-lg">
                                <div class="col-sm-12 col-lg-12 col-md-12">
                                    <h4> <?= $currency ?> <?php echo $cash_total; ?></h4>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-1 col-md-1 col-sm-1">
                           <i class="icon fa-plus" aria-hidden="true"></i>
                        </div>

                        <div class="col-lg-2 col-md-2 col-sm-2">
                            <h4>Today's Total Card</h4>
                            <div class="row row-lg">
                                <div class="col-sm-12 col-lg-12 col-md-12">
                                    <h4> <?= $currency ?> <?php echo $card_total; ?></h4>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-1 col-md-1 col-sm-1">
                           <i class="icon fa-plus" aria-hidden="true"></i>
                        </div>

                        <div class="col-lg-2 col-md-2 col-sm-2">
                            <h4>Today's Total Credit</h4>
                            <div class="row row-lg">
                                <div class="col-sm-12 col-lg-12 col-md-12">
                                    <h4> <?= $currency ?> <?php echo $credit_total; ?></h4>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-1 col-md-1 col-sm-1">
                            <span>=</span>
                        </div>

                        <div class="col-lg-2 col-md-2 col-sm-2">
                            <h4>Today's Total Amount</h4>
                            <div class="row row-lg">
                                <div class="col-sm-12 col-lg-12 col-md-12">
                                    <h4> <?= $currency ?> <?php $sales_total = $cash_total + $card_total + $credit_total; echo ($sales_total != 0 ) ? $sales_total : '0' ; ?></h4>
                                </div>
                            </div>
                        </div>
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
    var item_type    = <?php echo json_encode(Yii::$app->params['item_type']); ?>;
    var order_type   = <?php echo json_encode(Yii::$app->params['order_type']); ?>;
    var currency     = '<?= $currency ?>';
    var bill_config = <?php echo json_encode(Yii::$app->session['bill_config']) ?>;
</script>