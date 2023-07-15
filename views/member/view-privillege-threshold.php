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

$this->registerJsFile($baseUrl . '/assets/software/member-privillege-threshold.js');

$this->title = Yii::$app->params['system'] . ' | Member';
?>
<div class="page-header padding-bottom-0">
    <h1 class="page-title">Privillege Threshold</h1>
    <div class="clearfix"></div>
</div>
<div class="page-content padding-30 padding-top-15 container-fluid">
    <div class="row">
        <div class="col-sm-12 col-xlg-5 col-lg-5 col-md-5">
            <div class="panel panel-bordered">
                <div class="panel-heading">
                    <h3 class="panel-title">Set Privillege Threshold</h3>
                </div>
                <div class="panel-body container-fluid">
                    <form action="<?= $baseUrl ?>/member/set-privillege-threshold" class="privillege-threshold-form" name="privillege_threshold_form" method="post" autocomplete="off">
                        <input type="hidden" name="<?php echo Yii::$app->request->csrfParam; ?>" value="<?php echo Yii::$app->request->csrfToken; ?>" />
                        <div class="row">
                          <div class="form-group col-sm-6">
                            <label class="control-label" for="inputBasicFirstName">Threshold Amount</label>
                            <input type="number" class="form-control threshold-amount" id="inputBasicFirstName" name="threshold_amount" placeholder="Threshold Amount" autocomplete="off">
                          </div>
                          <div class="form-group col-sm-6">
                            <label class="control-label" for="inputBasicLastName">Threshold End Amount</label>
                            <input type="number" class="form-control threshold-end-amount" id="inputBasicLastName" name="threshold_end_amount" placeholder="Threshold End Amount" autocomplete="off">
                          </div>
                        </div>
                        <div class="form-group">
                          <button type="submit" class="btn btn-primary pull-right">Save</button>
                        </div>
                      </form>
                </div>
            </div>
        </div>

        <div class="col-sm-12 col-xlg-7 col-lg-7 col-md-7">
            <div class="panel">
                <div class="panel-body container-fluid">
                    <div class="row row-lg">
                        <div class="col-sm-12 col-lg-12 col-md-12">
                            <div class="table-parent">
                                <table class="table table-hover table-striped width-full dtr-inline dataTable with-export" >
                                    <thead>
                                        <tr>
                                            <th width="27">S.N</th>
    		                                <th width="50">Threshold Amount</th>
                                            <th width="50">Threshold End Amount</th>
    		                                <th width="20">Created On</th>
                                            <th width="30">Till Date</th>
    		                                <th width="20">Created By</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th width="27">S.N</th>
                                            <th width="50">Threshold Amount</th>
                                            <th width="50">Threshold End Amount</th>
                                            <th width="20">Created On</th>
                                            <th width="30">Till Date</th>
                                            <th width="20">Created By</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                    	<?php if($threshold != null) : $i=0; ?>
                                    		<?php foreach($threshold as $thresh) : $i++; ?>
                                    			<tr>
    	                                			<td width="27"><?php echo $i; ?></td>
    				                                <td width="50"><?php echo $thresh['amount']; ?></td>
                                                    <td width="50"><?php echo $thresh['end_amount']; ?></td>
    				                                <td width="20"><?php echo $thresh['created_on']; ?></td>
                                                    <td width="30">
                                                        <?php 
                                                            if($thresh['till_date'] != '0000-00-00 00:00:00') {
                                                                echo $thresh['till_date']; 
                                                            }else {
                                                                echo '-';
                                                            }
                                                        ?>
                                                    </td>
    				                                <td width="20"><?php echo $thresh['username']; ?></td>
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