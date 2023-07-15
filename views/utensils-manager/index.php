<?php
$baseUrl = Yii::$app->request->baseUrl;
$this->title = ucwords(Yii::$app->params['system']).' | Utensils Stock List';
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
$this->registerJsFile($baseUrl.'/assets/software/utensils-stock.js');
?>

<div class="page-header padding-bottom-0">
    <h1 class="page-title">Utensils Stock
    <?php
        $temp = explode(":",Yii::$app->session['fiscal_year']);
        $starting_fiscal_year_from_date = $temp[0];
        $starting_fiscal_year_to_date   = $temp[1];

        if ((date('Y-m-d') >= $starting_fiscal_year_from_date) 
                && ( date('Y-m-d') < date('Y-m-d', strtotime($starting_fiscal_year_to_date. ' + 11 days'))) ) { ?>
            <button type="button" class="btn btn-sm btn-primary pull-right btn-add-utensils-item margin-bottom-10" data-toggle="modal" data-target=".modal-add-utensils-item"><i class="icon fa-plus"></i> Add New Item</button>
    <?php } ?>
    </h1>
    <div class="clearfix"></div>
</div>

<div class="page-content container-fluid">
    <div class="panel">
        <div class="panel-body container-fluid">
            <div class="row row-lg">
                <div class="col-lg-12 col-sm-12 col-md-12">
                    <div class="nav-tabs-horizontal stock-tab">
                        <ul class="nav nav-tabs" role="tablist" data-plugin="nav-tabs">
                            <li class="active" role="presentation">
                                <a role="tab" href="#stock" data-toggle="tab" aria-expanded="true">Stock</a>
                            </li>
                            <?php
                                $temp = explode(":",Yii::$app->session['fiscal_year']);
                                $starting_fiscal_year_from_date = $temp[0];
                                $starting_fiscal_year_to_date   = $temp[1];

                                if ((date('Y-m-d') >= $starting_fiscal_year_from_date) 
                                        && ( date('Y-m-d') < date('Y-m-d', strtotime($starting_fiscal_year_to_date. ' + 11 days'))) )
                                {
                            ?>
                                <li class="" role="presentation">
                                    <a role="tab" href="#adjustment" data-toggle="tab" aria-expanded="true">Adjustment</a>
                                </li>
                            <?php } ?>
                        </ul>
                        <div class="tab-content">
                            <div id="stock" class="tab-pane margin-top-40 active" role="tabpanel">
                                <div class="table-parent">
                                    <table class="table table-hover dataTable table-striped width-full dtr-inline with-export table-bordered">
                                        <thead>
                                            <tr>
                                                <th width="27">S.N</th>
                                                <th width="100">Item Name</th>
                                                <th width="20">Opening Stock</th>
                                                <th width="20">Stock In</a></th>
                                                <th width="20">Stock Out</a></th>
                                                <th width="20">Net Stock</th>
                                                <th width="20">Adjustment</a></th>
                                                <th width="20">Available Stock</th>
                                                <th width="15">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php if($stock != null) : $i = 0;?>
                                                <?php foreach($stock as $row) : $i++;?>
                                                        <tr data-id="<?php echo $row['id'];?>">
                                                            <td width="27"><?php echo $i; ?></td>
                                                            <td width="100"><?php echo $row['name']; ?></td>
                                                            <td width="20"><?php echo $row['opening_stock']; ?></td>
                                                            <td width="20"><?php echo $row['stock_in']; ?></a></td>
                                                            <td width="20"><?php echo $row['stock_out']; ?></a></td>
                                                            <td width="20">
                                                                <?php echo $row['opening_stock'] + $row['stock_in'] - $row['stock_out']; ?>
                                                            </td>
                                                            <td width="20"><?php echo $row['adjustment']; ?></a></td>
                                                            <td width="20">
                                                                <?php echo $row['opening_stock'] + $row['stock_in'] - $row['stock_out'] + $row['adjustment']; ?>
                                                            </td>
                                                            <td width="15">
                                                                <a href="<?php echo $baseUrl; ?>/utensils-manager/view/<?php echo $row['id']; ?>">
                                                                <button class="btn btn-primary btn-xs">View Stock</button></a>
                                                            </td>
                                                        </tr>
                                                <?php endforeach; ?>
                                            <?php endif; ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>

                            <?php
                                $temp = explode(":",Yii::$app->session['fiscal_year']);
                                $starting_fiscal_year_from_date = $temp[0];
                                $starting_fiscal_year_to_date   = $temp[1];

                                if ((date('Y-m-d') >= $starting_fiscal_year_from_date) 
                                        && ( date('Y-m-d') < date('Y-m-d', strtotime($starting_fiscal_year_to_date. ' + 11 days'))) )
                                {
                            ?>
                                <div id="adjustment" class="tab-pane margin-top-40" role="tabpanel">
                                    <div class="row row-lg">
                                        <div class="col-lg-12 col-sm-12 col-md-12">
                                            <div class="table-parent" style="overflow-x: scroll;">
                                                <table class="table table-hover no-tools table-bordered width-full dtr-inline">
                                                    <thead>
                                                        <tr>
                                                            <th width="20">S.N</th>
                                                            <th width="80">Date</th>
                                                            <th width="100">Product Name</th>
                                                            <th width="20">Opening Stock</th>
                                                            <th width="20">Stock In</th>
                                                            <th width="20">Stock Out</th>
                                                            <th width="20">Total Adjusted</th>
                                                            <th width="20">Available Stock</th>
                                                            <th width="20">Stock Count</th>
                                                            <th width="20">Adjustment</th>
                                                            <th width="100">Remarks</th>
                                                            <th width="15">Action</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php if($stock != null): $i =0; 
                                                            $os = 0;
                                                            foreach($stock as $row): $i++; ?>
                                                            <tr class="adjustment-parent-tr" data-id="<?php echo $row['id']; ?>">
                                                                <td width="20"><?php echo $i; ?></td>

                                                                <td width="80" class="td-adjusted-date"><?php echo date('Y-m-d'); ?></td>

                                                                <td width="100" class="td-adjusted-product"><?php echo ucwords($row['name']); ?></td>

                                                                <td width="20"><?php echo $row['opening_stock']; ?></td>

                                                                <td width="20"><?php echo $row['stock_in'];
                                                                    ?>
                                                                </td>

                                                                <td width="20"><?php echo $row['stock_out'];
                                                                   ?>
                                                                </td>

                                                                <td width="20" class="total-adjusted-stock"><?php echo $row['adjustment']; ?></td>

                                                                <td width="20" class="td-available-stock">
                                                                    <?php echo $row['opening_stock'] + $row['stock_in'] - $row['stock_out'] + $row['adjustment']; ?>
                                                                </td>

                                                                <td width="20">
                                                                    <input name="stock_count" type="number" class="form-control txt-stock-count">
                                                                </td>

                                                                <td width="20" class="td-stock-adjustment">
                                                                </td>
                                                                <input type="hidden" name="stock_adjustment" class="hidden-stock-adjustment">

                                                                <td width="100"><textarea name="adjustment-remarks" class="form-control txt-adjustment-remarks" rows="3" disabled=""></textarea></td>

                                                                <td width="15"><button type="button" class="btn btn-xs btn-primary margin-top-20 btn-adjustment-stock" disabled="">Save</button></td>
                                                            </tr>
                                                        <?php endforeach; endif; ?>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade modal-add-utensils-item" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="myModalLabel">Add Utensils Item</h4>
        </div>
        
            <div class="modal-body">
                <div class="row">
                    <div class="form-group col-lg-5 col-md-5 col-sm-5">
                        <label class="control-label" for="inputBasicName">Name</label>
                        <input type="text" class="form-control new-utensils-item-name" id="inputBasicName" name="inputName" placeholder="Name" autocomplete="off">
                    </div>

                    <div class="form-group col-lg-5 col-md-5 col-sm-5">
                        <label class="control-label" for="inputBasicOpeningStock">Opening Stock</label>
                        <input type="number" class="form-control new-utensils-item-opening-stock" id="inputBasicOpeningStock" name="inputOpeningStock" placeholder="Opening Stock" autocomplete="off">
                    </div>

                    <div class="col-lg-2 col-md-2 col-sm-2">
                        <button type="button" class="btn btn-sm btn-primary btn-temp-add-utensils-item icon fa-plus margin-top-28"></button>
                    </div>
                </div>

                <hr>

        <form name="add_utensils_item" class="add-utensils-item" action="<?php echo $baseUrl.'/utensils-manager/add' ?>" method="post" autocomplete="off">

                <input type="hidden" name="<?php echo Yii::$app->request->csrfParam; ?>" value="<?php echo Yii::$app->request->csrfToken; ?>" />
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12">
                        <table class="table table-bordered table-added-utensils-list" hidden>
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Opening Stock</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody class="show-temp-utensils-item">
                                
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn  btn-sm btn-default" data-dismiss="modal">Close</button>
                <button type="submit" data-loading-text="Saving..."  class="btn btn-primary btn-sm btn-save-utensils-item">Save</button>
            </div>
        </form>
    </div>
  </div>
</div>

<script>
 var baseUrl = '<?php echo $baseUrl; ?>';
</script>
