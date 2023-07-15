<?php $baseUrl = Yii::$app->request->baseUrl;
    $this->title = ucwords(Yii::$app->params['system']).' |  Stock View';

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

    $this->registerJsFile($baseUrl . '/assets/js/users.min.js');
?>

<div class="page-content container-fluid">
    <div class="panel">
        <div class="panel-body container-fluid">
            <div class="row row-lg">
                <div class="col-lg-12">
               
                    <div class="">
                        <div class="row">
                            <div class="col-lg-6 col-md-4 col-sm-12">
                                <h4>UTENSILS STOCK : <?php echo ucwords( ($item!= null) ? $item['name'] : ''); ?></h4>
                            </div>

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
                        <hr>
                        <div class="row margin-top-10">
                            <div class="col-md-12">
                                <table class="table table-hover dataTable table-striped width-full dtr-inline table-bordered">
                                    <thead>
                                        <tr>
                                            <th width="100">Date</th>
                                            <th width="150">Particular</th>
                                            <th width="20">Stock In</th>
                                            <th width="20">Stock Out</th>
                                            <th width="20">Adjustment</th>
                                            <th width="30">Remarks</th>
                                            <th width="30">Total</th>
                                        </tr>
                                    </thead>
                                    <tbody class="date-conversion">
                                        <?php 
                                            $total      = 0; 
                                            $stock_in   = 0; 
                                            $stock_out  = 0; 
                                            $adjusted_quantity = 0; 
                                        ?>
                                        <?php if($opening_stock != null && $opening_stock['total'] != '') : ?>
                                            <tr>
                                                <td width="100">
                                                    <?php echo date('Y-m-d'); ?>    
                                                </td>
                                                <td width="150">
                                                    Opening Stock
                                                </td>
                                                <td width="20">
                                                    <?php 
                                                        echo $opening_stock['total'];
                                                        $total      += $opening_stock['total']; 
                                                        $stock_in   += $opening_stock['total'];
                                                    ?>
                                                </td>
                                                <td width="20">0</td>
                                                <td width="20">0</td>
                                                <td width="30">
                                                </td>
                                                <td width="30"><?php echo $total; ?></td>
                                            </tr>
                                        <?php endif; ?>
                                        <?php if($stock != null) : ?>
                                            <?php foreach ($stock as $row) : ?>
                                                <tr>
                                                    <?php if( isset(Yii::$app->session['date_format']) && Yii::$app->session['date_format'] == 'nepali') { ?>
                                                        <td width="100" class="to-BS" data-date="<?php echo date("Y-m-d", strtotime($row['created_on']));?>"></td>
                                                    <?php }
                                                        else { ?>
                                                        <td width="100"><?php echo date("Y-m-d", strtotime($row['created_on']));?></td>
                                                    <?php } ?>
                                                    
                                                    <td width="150">
                                                        <?php if($row['is_os'] == Yii::$app->params['is_opening_stock']['yes']) : ?>
                                                            Opening Stock
                                                        <?php elseif($row['stock_in'] > 0) : ?>
                                                            Purchase
                                                        <?php elseif($row['stock_out'] > 0): ?>
                                                            Sales
                                                        <?php elseif($row['adjusted_quantity'] > 0): ?>
                                                            Adjustment
                                                        <?php endif; ?>
                                                    </td>
                                                    <td width="20">
                                                        <?php 
                                                            echo $row['stock_in'];
                                                            $total      += $row['stock_in']; 
                                                            $stock_in   += $row['stock_in'];
                                                        ?>
                                                    </td>
                                                    <td width="20">
                                                        <?php 
                                                            echo $row['stock_out'];
                                                            $total      -= $row['stock_out'];
                                                            $stock_out  += $row['stock_out'];
                                                        ?>
                                                    </td>
                                                    <td width="20">
                                                        <?php 
                                                            echo $row['adjusted_quantity']; 
                                                            $total += $row['adjusted_quantity'];
                                                            $adjusted_quantity += $row['adjusted_quantity'];
                                                        ?>
                                                    </td>
                                                    <td width="30">
                                                        <?php echo ($row['remarks'] != null) ? $row['remarks'] : ''; ?>
                                                    </td>
                                                    <td width="30"><?php echo $total; ?></td>
                                                </tr>
                                            <?php endforeach; ?>
                                        <?php endif; ?>
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th width="100"></th>
                                            <th width="150">Total</th>
                                            <th width="20"><?php echo $stock_in; ?></th>
                                            <th width="20"><?php echo $stock_out; ?></th>
                                            <th width="20"><?php echo $adjusted_quantity; ?></th>
                                            <th width="30"></th>
                                            <th width="30"><?php echo $total; ?></th>
                                        </tr>
                                    </tfoot>
                                </table>
                                <p class="margin-top-10"><strong>Stock Available: <?php echo $total; ?> </strong></p>
                            </div>
                        </div> 
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
