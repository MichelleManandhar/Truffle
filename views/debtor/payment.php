<?php
$baseUrl = Yii::$app->request->baseUrl;
$currency = strtoupper(Yii::$app->session['currency']);
$currency = strtoupper(Yii::$app->session['currency']);
$bill_config = Yii::$app->session['bill_config'];
/*$this->registerJsFile($baseUrl . '/assets/software/dash.js');*/
$this->registerJsFile($baseUrl . '/assets/js/users.min.js');
$this->registerJsFile($baseUrl . '/assets/software/debtor.js');
$this->registerJsFile($baseUrl . '/assets/software/reports.js');
$this->registerJsFile($baseUrl . '/assets/software/invoice.js');
$this->registerJsFile($baseUrl . '/assets/software/print-bill.js');
$this->title = Yii::$app->params['system'] . ' | Debtors Payment';

?>
<div class="page-header padding-bottom-0">
    <h1 class="page-title">Credit Records</h1>
    <div class="clearfix"></div>
</div>
<div class="page-content padding-30 padding-top-15 container-fluid">
    <div class="row">
        <div class="col-sm-6 col-xlg-6 col-lg-6 col-md-12">
            <div class="panel panel-bordered">
                <div class="panel-body">
                    <div class="row row-lg">
                        <div class="col-sm-12 col-lg-12 col-md-12">
                            <table class="table table-hover dataTable table-striped width-full with-export-no-sort dtr-inline">
                                <thead>
                                    <tr>
                                        <th width="300">Bill No</th>
                                        <th width="300">Bill Amount</th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th width="300">Bill No</th>
                                        <th width="300">Bill Amount</th>
                                    </tr>
                                </tfoot>
                                <tbody>    
                                    <?php $total_bill_amount = $debtor['opening_balance']; $i = 0;
                                        if($i == 0) { ?>
                                            <tr>
                                                <td width="300">Opening Balance</td>
                                                <td width="300"><?= $currency ?> <?php echo $opening_balance; ?></td>
                                            </tr>
                                        <?php }
                                        if($old_order_payable_detail != null) {
                                            foreach($old_order_payable_detail as $old_order_payable): $i++;
                                                $total_bill_amount = $total_bill_amount + $old_order_payable['payable_total'];
                                                ?>
                                            <?php endforeach;
                                        }

                                        if($order_payable_detail != null) {
                                            foreach($order_payable_detail as $order_payable): $i++;
                                                $total_bill_amount = $total_bill_amount + $order_payable['payable_total'];
                                                ?>
                                                <tr>
                                                    <td width="300">
                                                        <a class="read-invoice" href="<?php echo $baseUrl;?>/reports/invoice/<?php echo $order_payable['invoice_no'];?>" data-invoice="<?php echo $order_payable['invoice_no'];?>" data-invoice-type="order_invoice">Invoice-<?php echo $order_payable['invoice_no']; ?></a>
                                                    </td>
                                                    <td width="300"><?= $currency ?> <?php echo $order_payable['payable_total']; ?></td>
                                                </tr>
                                            <?php endforeach;
                                        }

                                        if($old_break_down_payable_detail != null) {
                                            foreach($old_break_down_payable_detail as $old_break_down_payable): $i++;
                                                $total_bill_amount = $total_bill_amount + $old_break_down_payable['total'];
                                                ?>
                                            <?php endforeach;
                                        }

                                        if($break_down_payable_detail != null) {
                                            foreach($break_down_payable_detail as $break_down_payable): $i++;
                                                $total_bill_amount = $total_bill_amount + $break_down_payable['total'];
                                                ?>
                                                <tr>
                                                    <td width="300">

                                                        <?php if($break_down_payable['payment_type'] == Yii::$app->params['payment_type']['credit']) { ?>
                                                             <a class="read-invoice" href="<?php echo $baseUrl;?>/reports/invoice/<?php echo $break_down_payable['invoice_no'];?>" data-invoice="<?php echo $break_down_payable['invoice_no'];?>" data-invoice-type="debtor_invoice">Cash Receipt-<?php echo $break_down_payable['invoice_no']; ?></a>
                                                        <?php }elseif($break_down_payable['is_payment_return'] == Yii::$app->params['is_payment_return']['yes']) { ?>
                                                                Return Receipt-<?php echo $break_down_payable['invoice_no']; ?>
                                                        <?php } ?>
                                                       
                                                    </td>
                                                    <td width="300"><?= $currency ?> <?php echo $break_down_payable['total']; ?></td>
                                                </tr>
                                            <?php endforeach;
                                        } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-sm-3 col-xlg-3 col-lg-3 col-md-6">
            <div class="panel panel-bordered">
                <div class="panel-body">
                    <div class="row row-lg">
                        <div class="col-sm-12 col-lg-12 col-md-12">
                            <form action="#" class="debtor-make-payment" method="post">
                                <input type="hidden" name="<?php echo Yii::$app->request->csrfParam; ?>" value="<?php echo Yii::$app->request->csrfToken; ?>" />
                                <input type="hidden" name="debtor_id" class="debtor-id" value="<?php echo $_GET['id']; ?>">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="control-label">Total Bill Amount</label>
                                        <input type="number" readonly name="total_bill_amount" class="form-control total-bill-amount" data-placement="left" value="<?php echo $total_bill_amount; ?>">
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="control-label">Total Paid Amount</label>
                                        <input type="number" readonly name="total_paid_amount" class="form-control total-paid-amount" data-placement="left" value="<?php echo $total_credit_paid['total'] + $old_total_credit_paid['total'] ?>">
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="control-label">Total Remaining Amount</label>
                                        <input type="number" readonly name="total_remaining_amount" class="form-control total-remaining-amount" data-placement="left" value="<?php echo $total_bill_amount - $total_credit_paid['total'] - $old_total_credit_paid['total'] ?>">
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="control-label">Payment Amount</label>
                                        <input type="number" name="payment_amount" class="form-control payment-amount" data-placement="left">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-12 radio debtor-payment-type">
                                            <div class="col-md-4">
                                                <div class="radio-custom radio-primary">
                                                    <input type="radio" id="cash-payment" class="cash-payment" name="debtor_payment_type" value="0" checked>
                                                    <label for="cash-payment">Cash</label>
                                                </div>
                                            </div>

                                            <div class="col-md-4">
                                                <div class="radio-custom radio-primary">
                                                    <input type="radio" id="card-payment" class="card-payment" name="debtor_payment_type" value="2">
                                                    <label for="card-payment">Card</label>
                                                </div>
                                            </div>
                                            
                                            <div class="col-md-4">
                                                <div class="radio-custom radio-primary">
                                                    <input type="radio" id="cheque-payment" class="cheque-payment" name="debtor_payment_type" value="1">
                                                    <label for="cheque-payment">Cheque</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group number-cheque" style="display: none;">
                                    <label class="control-label">Cheque No</label>
                                    <input type="number" name="cheque_number" placeholder="Cheque Number" class="form-control cheque-number" data-placement="left" data-toggle="tooltip" data-original-title="Cheque Number">
                                </div>

                                <div class="col-md-12">
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-primary">Pay</button>
                                    </div>
                                </div>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-sm-3 col-xlg-3 col-lg-3 col-md-6">
            <div class="panel panel-bordered">
                <div class="panel-body">
                    <div class="row row-lg">
                        <div class="col-sm-12 col-lg-12 col-md-12">
                            <form action="#" class="debtor-payment-return" method="post">
                                <input type="hidden" name="<?php echo Yii::$app->request->csrfParam; ?>" value="<?php echo Yii::$app->request->csrfToken; ?>" />
                                <input type="hidden" name="debtor_id" class="debtor-id" value="<?php echo $_GET['id']; ?>">
                                <?php 
                                    $amount_to_return = $total_bill_amount - (($total_credit_paid['total'] != 0) ? $total_credit_paid['total'] : 0); 
                                ?>

                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="control-label">Total Amount to Return</label>
                                        <input type="number" readonly name="total_amount_to_return" class="form-control total-amount-to-return" data-placement="left" value="<?php echo abs(($amount_to_return < 0) ? $amount_to_return : ''); ?>">
                                    </div>
                                </div>



                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="control-label">Return Amount</label>
                                        <input type="number" name="returned_amount" class="form-control returned-amount" data-placement="left" >
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-primary">Return</button>
                                    </div>
                                </div>

                            </form>
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

            <div class="modal-body invoice-content"></div>
        </div>
    </div>
</div>

<!-- printing loading modal -->
<div class="modal fade print-loading-modal" tabindex="-1" data-backdrop="static" data-keyboard="false" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
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
    var bill_config = <?php echo json_encode(Yii::$app->session['bill_config']) ?>;
</script>