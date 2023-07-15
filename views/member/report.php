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
$this->registerCssFile($baseUrl . '/assets/plugins/bootstrap-datepicker/bootstrap-datepicker.min081a.css');

$this->registerJsFile($baseUrl . '/assets/plugins/bootstrap-select/bootstrap-select.min.js');
$this->registerJsFile($baseUrl . '/assets/plugins/components/bootstrap-select.min.js');
$this->registerJsFile($baseUrl . '/assets/plugins/bootstrap-datepicker/bootstrap-datepicker.min.js');

$this->registerJsFile($baseUrl . '/assets/software/member-report.js');
$this->registerJsFile($baseUrl . '/assets/software/invoice.js');

$this->title = Yii::$app->params['system'] . ' | Member';
?>

<div class="page-header padding-bottom-0">
    <h1 class="page-title">Discount Report of Member - <?php if($member != null) echo ucwords($member['name']); ?></h1>
    <div class="clearfix"></div>
</div>
<div class="page-content padding-30 padding-top-15 container-fluid">
    <div class="row row-lg margin-bottom-20">
        <div class="col-lg-12 col-md-12 col-sm-12 pull-right">
            <div class="text-right mob-nepali-date">
                <input class="datepicker date-from" readonly placeholder="from date" style="border: 1px solid #ccc; padding: 6px 4px;" type="text" value="<?php echo isset($_GET['from']) ? $_GET['from'] : '';?>"> 
                <input class="datepicker date-to" readonly placeholder="to date" style="border: 1px solid #ccc; padding: 6px 4px;" type="text" value="<?php echo isset($_GET['to']) ? $_GET['to'] : '';?>"> <a class="btn btn-primary sort-by-go" href="#">GO</a>
            </div>
        </div>
    </div>

    <div class="row">
        <div class=" col-sm-12 col-xlg-12 col-lg-12 col-md-12">
            <div class="panel">
                <div class="panel-body container-fluid">
                    <div class="row row-lg">
                        <div class="col-sm-12 col-lg-12 col-md-12">
                            <table class="table table-hover table-striped width-full dtr-inline dataTable with-export" >
                                <thead>
                                    <tr>
                                        <th width="100">Date</th>
                                        <th width="50">Invoice No.</th>
                                        <th width="100">Category Name</th>
                                        <th width="100">Sub Total Amount</th>
                                        <th width="20">Discount Rate (%)</th>
                                        <th width="20">Discount Amount</th>
                                    </tr>
                                </thead>
                                
                                <tbody>
                                    <?php
                                        $total_sub_total = 0;
                                        $total_discount_rate = 0;
                                        $total_discount_amount = 0; 
                                        
                                        if($member_report != null) : $i=0; ?>
                                        <?php foreach($member_report as $row) : $i++; 
                                            $total_sub_total += $row['total'];
                                            $total_discount_rate += $row['discount_rate'];
                                            $total_discount_amount += $row['discount_amount'];
                                        ?>
                                            <tr>
                                                <td width="100"><?php echo $row['created_on']; ?></td>
                                                <td>
                                                    <a class="btn btn-primary btn-xs read-invoice" href="<?php echo $baseUrl;?>/reports/invoice/<?php echo $row['invoice_no'];?>" data-invoice="<?php echo $row['invoice_no'];?>" data-invoice-type="order_invoice"><?php echo $row['invoice_no'];?></a>
                                                </td>
                                                <td width="100"><?php echo $row['category']; ?></td>
                                                <td width="100"><?php echo $row['total']; ?></td>
                                                <td width="20"><?php echo $row['discount_rate']; ?></td>
                                                <td width="20"><?php echo $row['discount_amount']; ?></td>
                                            </tr>
                                        <?php endforeach; ?>
                                    <?php endif; ?>
                                </tbody>

                                <tfoot>
                                    <tr>
                                        <th width="100"></th>
                                        <th width="50"></th>
                                        <th width="100">Total</th>
                                        <th width="100"><?php echo $total_sub_total;?></th>
                                        <th width="20"><?php echo $total_discount_rate;?></th>
                                        <th width="20"><?php echo $total_discount_amount; ?></th>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="clearfix"></div>
</div>
</form>

<div class="modal modal-aside fade horizontal right modal-read-invoice" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-header theme-bg-color">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title color-white invoice-header"></h4>
            </div>

            <div class="modal-body invoice-content vat"></div>
        </div>
    </div>
</div>

<script>
    var item_type = <?php echo json_encode(Yii::$app->params['item_type']); ?>;
    var order_type  = <?php echo json_encode(Yii::$app->params['order_type']); ?>;
</script>