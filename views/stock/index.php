<?php
$baseUrl = Yii::$app->request->baseUrl;
$this->title = ucwords(Yii::$app->params['system']).' | Stock List';
/*for datatable*/
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
$this->registerJsFile($baseUrl.'/assets/software/stock.js');
?>

<div class="page-content container-fluid">
    <div class="panel">
        <div class="panel-body container-fluid">
            <div class="row row-lg">
                <div class="col-lg-12 col-sm-12 col-md-12">
                    <div class="row">
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
                        <div class="row margin-top-20">
                            <?php if( isset(Yii::$app->session['date_format']) && Yii::$app->session['date_format'] == 'nepali') { ?>
                                <!-- view for nepali date  -->
                                <div class="col-lg-6 col-md-8 col-sm-12">
                                    <div class="nepali-bs-date form-inline text-right mob-nepali-date">
                                        <div class="form-group">
                                            <label class="control-label">
                                                <div class="input-group">
                                                    <input class="form-control show-nepali-date" placeholder="FROM (BS)" type="text" id="nepaliDate9" autocomplete="off" data-init="<?php echo (isset($_GET['from']) && $_GET['from'] != null) ? $_GET['from'] : '0';?>" readonly>
                                                    <input name="from_english" type="hidden" id="hiddennepaliDate9" class="date-from" value="<?php echo (isset($_GET['from']) && $_GET['from'] != null) ? $_GET['from'] : '0';?>" />
                                                    <span class="input-group-btn for-datepicker"><i class="fa fa-clock-o"></i></span>
                                                </div>
                                            </label>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label">
                                                <div class="input-group">
                                                    <input class="form-control show-nepali-date" placeholder="TO (BS)" type="text" id="nepaliDate8" autocomplete="off" data-init="<?php echo (isset($_GET['to']) && $_GET['to'] != null) ? $_GET['to'] : '0';?>" readonly>
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
                                <div class="pull-right">
                                    <input type="text" class="datepicker date-from" placeholder="from date" value="<?php echo (isset($_GET['from']) && $_GET['from'] != null) ? $_GET['from'] : '' ;?>" style="border: 1px solid #ccc; padding: 6px 4px;">
                                    <input type="text" class="datepicker date-to" placeholder="to date" value="<?php echo (isset($_GET['to']) && $_GET['to'] != null) ? $_GET['to'] : '';?>" style="border: 1px solid #ccc; padding: 6px 4px;">
                                    <a href="#" class="btn btn-primary sort-by-go">GO</a>
                                </div>
                                <!-- view for english date  -->
                            <?php } ?>
                        </div>
                        <div class="tab-content">
                            <div id="stock" class="tab-pane margin-top-40 active" role="tabpanel">
                                <div class="table-parent">
                                    <table class="table table-hover dataTable table-striped width-full dtr-inline with-export table-bordered">
                                        <thead>
                                            <tr>
                                                <th width="27">S.N</th>
                                                <th width="100">Product Name</th>
                                                <th width="20">Opening Stock</th>
                                                <th width="20">Purchase</a></th>
                                                <th width="20">Sales</a></th>
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
                                                                <a href="<?php echo $baseUrl; ?>/stock/view/<?php echo $row['id']; ?>">
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

<script>
 var baseUrl = '<?php echo $baseUrl; ?>';
</script>
