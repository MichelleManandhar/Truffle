<?php
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

$this->registerJsFile($baseUrl . '/assets/plugins/typeahead-js/bootstrap3-typeahead.min.js');

$this->registerJsFile($baseUrl . '/assets/software/purchase.js');
$this->registerJsFile($baseUrl . '/assets/software/product-auto-list-purchase.js');
$this->registerJsFile($baseUrl . '/assets/software/nepali-date.js');

$this->title = Yii::$app->params['system'] . ' | Purchase';
?>

<div class="page-header padding-bottom-0">
    <h1 class="page-title">Purchase Manager</h1>
    <div class="clearfix"></div>
</div>
<div class="page-content padding-30 padding-top-15 container-fluid">
    <div class="row">
        <?php
            $temp = explode(":",Yii::$app->session['fiscal_year']);
            $starting_fiscal_year_from_date = $temp[0];
            $starting_fiscal_year_to_date   = $temp[1];

            if ((date('Y-m-d') >= $starting_fiscal_year_from_date) 
                    && ( date('Y-m-d') < date('Y-m-d', strtotime($starting_fiscal_year_to_date. ' + 11 days'))) )
            {
        ?>
            <div class=" col-sm-12 col-xlg-4 col-lg-4 col-md-6">
                <div class="panel">
                    <div class="panel-body container-fluid">
                        <form action="<?php echo $baseUrl;?>/purchase/add" name="newPurchase" data-tablename="purchase" method="post" class="form-horizontal add-purchase">
                        <input type="hidden" name="<?php echo Yii::$app->request->csrfParam; ?>" value="<?php echo Yii::$app->request->csrfToken; ?>" />
                            <div class="form-group product-name">        
                                <label class="control-label">Product Name</label>
                                <div class="input-group auto-parent">
                                    <input type="text" name="name" placeholder="Product Name" required class="form-control product-txt sub-input-group auto-show" autocomplete="off">
                                    <input type="hidden" name="item_id" class="auto-i hidden-item-id">

                                    <span class="input-group-btn">
                                        <a class="btn btn-primary btn-auto-list show-product-list-btn"><i class="icon fa-question" ></i></a>
                                    </span>
                                </div>
                            </div>

                            <div class="row row-lg">
                                <div class="col-sm-12 col-lg-12">
                                    <div class="form-group">
                                        <h5>Quantity</h5>
                                        <input name="quantity" type="number" class="form-control" placeholder="Enter Quantity">
                                    </div>
                                </div>
                            </div>
                            <div class="row row-lg">
                                <div class="col-sm-12 col-lg-12">
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-sm btn-icon btn-success pull-right btn-submit-purchase" data-toggle="tooltip" data-original-title="Save" data-placement="left">
                                            <i class="icon fa-save" aria-hidden="true"></i> Save
                                        </button> 
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>                
                </div>
            </div>
        <?php } ?>

        <div class="col-sm-12 col-xlg-8 col-lg-8 col-md-6">
            <div class="panel">
                <div class="panel-body container-fluid">
                    <div class="row row-lg">
                        <div class="col-sm-12 col-lg-12 col-md-12">
                            <div class="table-parent">
                                <table class="table table-hover table-striped width-full dtr-inline dataTable with-export">
                                    <thead>
                                        <tr>
                                            <th width="27">#</th>
                                            <th width="100">Name</th>
                                            <th width="100">Quantity</th>
                                            <th width="100">Created On</th>
                                            <th width="100">Created By</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th width="27">#</th>
                                            <th width="100">Name</th>
                                            <th width="100">Quantity</th>
                                            <th width="100">Created On</th>
                                            <th width="100">Created By</th>
                                        </tr>
                                    </tfoot>
                                    <tbody class="date-conversion">     
                                        <?php if($purchase_items != null) : $i = 0; ?>
                                            <?php foreach($purchase_items as $purchase_item) : ?>
                                                <tr data-id="<?php echo $purchase_item['id'];?>">
                                                    <td><?php echo ++$i;?></td>
                                                    <td>
                                                        <?php echo ucwords($purchase_item['name']);?>
                                                    </td>
                                                    <td>
                                                        <?php echo $purchase_item['quantity'];?>
                                                    </td>

                                                    <?php if( isset(Yii::$app->session['date_format']) && Yii::$app->session['date_format'] == 'nepali') { ?>
                                                        <td class="to-BS" data-date="<?php echo date("Y-m-d", strtotime($purchase_item['created_on']));?>"></td>
                                                    <?php }
                                                        else { ?>
                                                        <td><?php echo date("Y-m-d", strtotime($purchase_item['created_on']));?></td>
                                                    <?php } ?>
                                                    
                                                    <td>
                                                        <?php echo $purchase_item['user_name'];?>
                                                    </td>
                                                </tr>
                                            <?php endforeach; ?>
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
    <div class="clearfix"></div>
</div>

<!-- modal -->
    <div class="modal modal-aside fade horizontal right modal-product-list" aria-hidden="false" role="dialog" tabindex="-1">
        <div class="modal-dialog modal-md">
            <div class="modal-content">
                <div class="modal-header theme-bg-color">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                    <h4 class="modal-title color-white">Product lists</h4>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-sm-12 col-lg-12 col-md-12">
                            <table class="table table-hover table-striped product-list">
                                <thead>
                                    <tr>
                                        <th width="15">#</th>
                                        <th width="100">Product Name</th>
                                        <th width="100">Quantity Type</th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th width="15">#</th>
                                        <th width="100">Product Name</th>
                                        <th width="100">Quantity Type</th>
                                    </tr>
                                </tfoot>
                                <tbody>

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<!-- modal -->

<script>
    var baseUrl = '<?php echo $baseUrl; ?>';
    var stock_item_quantity_type = <?php echo json_encode(Yii::$app->params['stock_item_quantity_type_show']); ?>
</script>
