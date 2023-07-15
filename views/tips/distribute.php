<?php
/* @var $this yii\web\View */
$baseUrl = Yii::$app->request->baseUrl;
$temp = explode(":",Yii::$app->session['fiscal_year']);
$starting_fiscal_year_from_date = $temp[0];
$starting_fiscal_year_to_date   = $temp[1];

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

$this->registerJsFile($baseUrl . '/assets/software/tips.js');

$this->title = Yii::$app->params['system'] . ' | Distribute Tips';
?>
<script>
    var baseUrl = '<?php echo $baseUrl; ?>';
</script>

<div class="page-header padding-bottom-0">
    <div class="clearfix"></div>
</div>
<div class="page-content padding-30 padding-top-15 container-fluid">

    <div class="row row-lg margin-bottom-20">
        <div class="col-sm-12 col-lg-12 col-md-12">

            <?php if( isset(Yii::$app->session['date_format']) && Yii::$app->session['date_format'] == 'nepali') { ?>
                <!-- view for nepali date  -->
                <div class="nepali-bs-date form-inline text-right">
                    <div class="input-group">
                        <label class="control-label">
                            <div class="input-group">
                                <input class="form-control show-nepali-date" readonly placeholder="FROM (BS)" type="text" id="nepaliDate9" autocomplete="off" data-init="<?php echo (isset($_GET['from']) && $_GET['from'] != null) ? $_GET['from'] : '0';?>">
                                <input name="from_english" type="hidden" id="hiddennepaliDate9" class="date-from" value="<?php echo (isset($_GET['from']) && $_GET['from'] != null) ? $_GET['from'] : '0';?>" />
                                <span class="input-group-btn for-datepicker"><i class="fa fa-clock-o"></i></span>
                            </div>
                        </label>
                    </div>
                    <div class="input-group">
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
                <!-- view for nepali date  -->
            <?php }
                else { ?>
                <!-- view for english date  -->
                <div class="pull-right">
                    <input type="text" class="datepicker date-from" readonly placeholder="from date" value="<?php echo (isset($_GET['from']) && $_GET['from'] != null) ? $_GET['from'] : '' ;?>" style="border: 1px solid #ccc; padding: 6px 4px;">
                    <input type="text" class="datepicker date-to" readonly placeholder="to date" value="<?php echo (isset($_GET['to']) && $_GET['to'] != null) ? $_GET['to'] : '';?>" style="border: 1px solid #ccc; padding: 6px 4px;">
                    <a href="#" class="btn btn-primary sort-by-go">GO</a>
                </div>
                <!-- view for english date  -->
            <?php } ?>
        </div>
    </div>  

    <div class="row">
        <div class="col-lg-4 col-sm-12 col-md-6">
            <div class="panel">
                <div class="panel-title">
                   Tips Received 
                </div>                  
                <div class="panel-body padding-top-0">
                    <div class="table-parent">
                        <table class="table table-hover table-striped dtr-inline dataTable no-tools">
                            <thead>
                                <tr>
                                    <th width="50">Date</th>
                                    <th width="50">Amount</th>
                                    <th width="50">Balance</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th width="50">Date</th>
                                    <th width="50">Amount</th>
                                    <th width="50">Balance</th>
                                </tr>
                            </tfoot>
                            <tbody class="date-conversion"> 
                                <?php
                                    $balance = ($opening_balance != null) ? $opening_balance : 0 ;
                                    ?>
                                    <tr>
                                        <td width="50">Opening Balance</td>
                                        <td width="50"><?php echo ($opening_balance != null) ? $opening_balance : 0 ; ?></td>
                                        <td width="50"><?php echo ($opening_balance != null) ? $opening_balance : 0 ; ?></td>
                                    </tr>
                                <?php 
                                    if($tips != null){
                                        $total_tips_received    = 0;
                                        $total_tips_distributed = 0;
                                        foreach ($tips as $tip) : 
                                            if($tip['type'] == 0) {
                                                $balance = $balance + $tip['total'];
                                                $total_tips_received  += $tip['total']; ?>

                                                <tr>
                                                    <?php if( isset(Yii::$app->session['date_format']) && Yii::$app->session['date_format'] == 'nepali') { ?>
                                                        <td width="50" class="to-BS" data-date="<?php echo date("Y-m-d", strtotime($tip['created_on']));?>"></td>
                                                    <?php }
                                                        else { ?>
                                                        <td width="50"><?php echo date("Y-m-d", strtotime($tip['created_on']));?></td>
                                                    <?php } ?>

                                                    <td width="50"><?php echo $tip['total']; ?></td>
                                                    <td width="50"><?php echo $balance; ?></td>
                                                </tr>

                                        <?php
                                            }else {
                                                $balance = $balance - $tip['total'];
                                                $total_tips_distributed  += $tip['total']; ?>

                                                <tr>
                                                    <?php if( isset(Yii::$app->session['date_format']) && Yii::$app->session['date_format'] == 'nepali') { ?>
                                                        <td width="50" class="to-BS" data-date="<?php echo date("Y-m-d", strtotime($tip['created_on']));?>"></td>
                                                    <?php }
                                                        else { ?>
                                                        <td width="50"><?php echo date("Y-m-d", strtotime($tip['created_on']));?></td>
                                                    <?php } ?>

                                                    <td width="50" class="red-600">(<?php echo $tip['total']; ?>)</td>
                                                    <td width="50"><?php echo $balance; ?></td>
                                                </tr>
                                        <?php    
                                            }
                                            ?>
                                <?php endforeach;
                                    }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        
        <?php
            if ((date('Y-m-d') >= $starting_fiscal_year_from_date) 
                    && ( date('Y-m-d') < date('Y-m-d', strtotime($starting_fiscal_year_to_date. ' + 11 days'))) )
            { 
        ?>
            <div class="col-lg-4 col-sm-12 col-md-6"> 
                <div class="panel">
                    <div class="panel-title">
                       Distribute Tip Here
                    </div>             
                    <div class="panel-body padding-top-0">
                        <form method="post" class="distribute-tips" action="<?php echo $baseUrl .'/tips/distribute' ?>">
                            <input type="hidden" name="<?php echo Yii::$app->request->csrfParam; ?>" value="<?php echo Yii::$app->request->csrfToken; ?>" />

                            <div class="form-group">
                                <label for="total-tips">Total Tip</label>
                                <input type="number" name="total_tips" readonly class="form-control total-tips" value="<?php echo ($total_tip_received['total'] != null) ? $total_tip_received['total'] : '0'; ?>">
                            </div>

                            <div class="form-group">
                                <label for="total-distributed-tips">Total Distributed Tip</label>
                                <input type="number" name="total_distributed_tips" readonly class="form-control total-distributed-tips" value="<?php echo ($total_tip_distributed['total'] != null) ? $total_tip_distributed['total'] : '0'; ?>">
                            </div>

                            <div class="form-group">
                                <label for="total-distributed-tips">Total Remaining Tip</label>
                                <input type="number" name="total_remaining_tips" readonly class="form-control total-remaining-tips" value="<?php echo $total_tip_received['total'] - $total_tip_distributed['total']; ?>">
                            </div>

                            <div class="form-group">
                                <label for="tips-to-distribute">Distribute Tip Amount</label>
                                <input type="number" name="tips_to_distribute" class="form-control tips-to-distribute">
                            </div>

                            <div class="form-group">
                                <button type="submit" class="btn btn-primary btn-xs pull-right padding-top-5 padding-bottom-5 padding-left-10 padding-right-10"><i class="icon fa-money"></i>Distribute</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        <?php } ?>

        <div class="col-lg-4 col-sm-12 col-md-6">
            <div class="panel">  
                <div class="panel-title">
                    Tips Distributed
                </div>                  
                <div class="panel-body padding-top-0">
                    <div class="row row-lg">
                        <div class="col-sm-12 col-lg-12 col-md-12">
                            <div class="table-parent">
                                <table class="table table-hover table-striped dtr-inline dataTable no-tools">
                                    <thead>
                                        <tr>
                                            <th width="50">Date</th>
                                            <th width="50">Amount</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th width="50">Date</th>
                                            <th width="50">Amount</th>
                                        </tr>
                                    </tfoot>
                                    <tbody class="date-conversion"> 
                                        <?php
                                            if($tips_distributed != null){
                                                foreach ($tips_distributed as $tip_distributed) : ?>
                                                    <tr>
                                                        <?php if( isset(Yii::$app->session['date_format']) && Yii::$app->session['date_format'] == 'nepali') { ?>
                                                            <td width="50" class="to-BS" data-date="<?php echo date("Y-m-d", strtotime($tip_distributed['created_on']));?>"></td>
                                                        <?php }
                                                            else { ?>
                                                            <td width="50"><?php echo date("Y-m-d", strtotime($tip_distributed['created_on']));?></td>
                                                        <?php } ?>
                                                        <td width="50"><?php echo $tip_distributed['total']; ?></td>
                                                    </tr>
                                                <?php endforeach;
                                            }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>