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
        <div class="col-sm-12 col-xlg-12 col-lg-12 col-md-12">
            <div class="panel">
                <div class="panel-body container-fluid">
                    <div class="row row-lg">
                        <div class="col-sm-12 col-lg-12 col-md-12">
                            <div class="table-parent">
                                <table class="table table-hover table-striped width-full dtr-inline dataTable with-export" >
                                    <thead>
                                        <tr>
                                            <th>SN</th>
                                            <th>Member Name</th>
                                            <th>Total Paid Amount</th>
                                            <th>Threshold Remaining</th>
                                            <th>Threshold End Remaining</th>
                                            <th>Threshold Claimed</th>
                                            <th>Threshold End Claimed</th>
                                            <th>Threshold Unclaimed</th>
                                            <th>Threshold End Unclaimed</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>SN</th>
                                            <th>Member Name</th>
                                            <th>Total Paid Amount</th>
                                            <th>Threshold Remaining</th>
                                            <th>Threshold End Remaining</th>
                                            <th>Threshold Claimed</th>
                                            <th>Threshold End Claimed</th>
                                            <th>Threshold Unclaimed</th>
                                            <th>Threshold End Unclaimed</th>
                                            <th>Action</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                    	<?php if($threshold != null) : $i=0; ?>
                                    		<?php foreach($threshold as $thresh) : $i++; ?>
                                    			<tr data-member="<?php echo $thresh['member_id'] ?>" data-name="<?php echo ucwords($thresh['member_name']) ?>" data-threshold-unclaimed="<?php echo $thresh['threshold_count']-$thresh['threshold_claimed']; ?>" data-threshold-end-unclaimed="<?php echo $thresh['threshold_end_count']-$thresh['threshold_end_claimed']; ?>">
    	                                			<td><?php echo $i; ?></td>
    				                                <td><?php echo $thresh['member_name']; ?></td>
                                                    <td><?php echo $thresh['order_amount']; ?></td>
    				                                <td><?php echo $threshold_amount - $thresh['to_be_threshold_amount']; ?></td>
    				                                <td><?php echo $threshold_end_amount - $thresh['to_be_threshold_end_amount']; ?></td>
                                                    <td><?php echo $thresh['threshold_claimed']; ?></td>
                                                    <td><?php echo $thresh['threshold_end_claimed']; ?></td>
                                                    <td>
                                                        <?php echo $thresh['threshold_count']-$thresh['threshold_claimed']; ?>
                                                    </td>
                                                    <td>
                                                        <?php echo $thresh['threshold_end_count']-$thresh['threshold_end_claimed']; ?>
                                                    </td>
                                                    <td>
                                                        <button class="btn btn-xs btn-primary btn-claim-threshold-exceeded" data-threshold-type="start_threshold">Claim Threshold</button>
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

<div class="modal fade horizontal modal-claim-threshold-exceeded" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header theme-bg-color">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title color-white member-name"></h4>
            </div>

            <div class="modal-body show-threshold-claimable">
                <form action="<?php echo $baseUrl ?>/member/claim-remaining-threshold" class="form-claim-threshold-exceeded" method="post">
                    <input type="hidden" name="<?php echo Yii::$app->request->csrfParam; ?>" value="<?php echo Yii::$app->request->csrfToken; ?>" />
                    <input type="hidden" name="member" class="hidden-member">
                    <div class="form-group">
                        <div class="row">
                            <div class="col-lg-5 col-md-5 col-sm-5 col-xs-5">
                                <span class="font-weight-500 span-margin-left-0">First Threshold</span>
                            </div>
                            <div class="col-lg-7 col-md-7 col-sm-7 col-xs-7">
                                <span class="custom-touchspin">
                                    <input type="number" class="form-control first-threshold-claim" name="threshold_claim" data-plugin="TouchSpin" data-min="0" data-max="0" data-stepinterval="1" data-maxboostedstep="0" value="0" data-step="1" />
                                </span>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-lg-5 col-md-5 col-sm-5 col-xs-5">
                                <span class="font-weight-500 span-margin-left-0">End Threshold</span>
                            </div>
                            <div class="col-lg-7 col-md-7 col-sm-7 col-xs-7">
                                <span class="custom-touchspin">
                                    <input type="number" class="form-control end-threshold-claim" name="end_threshold_claim" data-plugin="TouchSpin" data-min="0" data-max="0" data-stepinterval="1" data-maxboostedstep="0" value="0" data-step="1" />
                                </span>
                            </div>
                        </div>
                    </div>
                    <hr>
                </form>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-primary btn-submit-threshold-claim">
                    Claim
                </button>
                <button type="button" class="btn btn-danger" data-dismiss="modal">
                    Cancel
                </button>
            </div>
        </div>
    </div>
</div>