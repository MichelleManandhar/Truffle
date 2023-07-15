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
$this->registerJsFile($baseUrl . '/assets/software/member-index.js');
$this->registerJsFile($baseUrl . '/assets/software/member-privillege-threshold.js');

$this->title = Yii::$app->params['system'] . ' | Member';
?>
<div class="page-header padding-bottom-0">
    <h1 class="page-title">Membership</h1>
    <div class="page-header-actions margin-top-10">
        <?php
            if ((date('Y-m-d') >= $starting_fiscal_year_from_date) 
                    && ( date('Y-m-d') < date('Y-m-d', strtotime($starting_fiscal_year_to_date. ' + 11 days'))) )
            {
        ?>
            <?php if($birthday_count['count'] > 0): ?>
                <a class="btn btn-icon btn-success btn-round btn-big pull-right view-member-birthday" data-toggle="dropdown" href="javascript:void(0)" title="Notifications" aria-expanded="true" data-animation="scale-up" role="button">                
                    <i class="icon fa-birthday-cake" aria-hidden="true"></i>
                    <span class="badge badge-danger up"><?= $birthday_count['count'] ?></span>
                </a>
            <?php else: ?>
                <a href="javascript:void(0)" class="btn btn-icon btn-success btn-round btn-big pull-right view-member-birthday" data-toggle="tooltip" data-original-title="View Members Birthday" data-placement="left">
                    <i class="icon fa-birthday-cake" aria-hidden="true"></i>
                </a>
            <?php endif; ?>

            <a href="<?php echo $baseUrl;?>/member/threshold-report" class="btn btn-icon btn-info btn-round btn-big pull-right" data-toggle="tooltip" data-original-title="View Privillege Threshold Report" data-placement="left">
                <i class="icon fa-line-chart" aria-hidden="true"></i>
            </a>

            <a href="<?php echo $baseUrl;?>/member/privillege-threshold" class="btn btn-icon btn-info btn-round btn-big pull-right" data-toggle="tooltip" data-original-title="Privillege Threshold" data-placement="left">
                <i class="icon fa-joomla" aria-hidden="true"></i>
            </a>

            <a href="<?php echo $baseUrl;?>/member/membership-discount-setting" class="btn btn-icon btn-danger btn-round btn-big pull-right" data-toggle="tooltip" data-original-title="Discount Setting" data-placement="left">
                <i class="icon fa-cogs" aria-hidden="true"></i>
            </a>

            <a href="<?php echo $baseUrl;?>/member/create" class="btn btn-icon btn-primary btn-round btn-big pull-right" data-toggle="tooltip" data-original-title="Create New" data-placement="left">
                <i class="icon wb-plus" aria-hidden="true"></i>
            </a>
        <?php } ?>

    </div>
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
                                            <th width="27">S.N</th>
    		                                <th width="100">Member Name</th>
    		                                <th width="20">Phone No.</th>
    		                                <th width="20">Email</th>
    		                                <th width="20">Membership No.</th>
    		                                <th width="20">Membership Type</th>
                                            <th width="20">Membership Fee</th>
    		                                <th width="20">Issued On</th>
    		                                <th width="20">Valid Till</th>
    		                                <th width="15">Created On</th>
    		                                <th width="15">Created By</th>
                                            <th width="10">Action</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                    <tr>
                                        <th width="27">S.N</th>
    	                                <th width="100">Member Name</th>
    	                                <th width="20">Phone No.</th>
    	                                <th width="20">Email</th>
    	                                <th width="20">Membership No.</th>
    	                                <th width="20">Membership Type</th>
                                        <th width="20">Membership Fee</th>
    	                                <th width="20">Issued On</th>
    	                                <th width="20">Valid Till</th>
    	                                <th width="15">Created On</th>
    	                                <th width="15">Created By</th>
                                        <th width="10">Action</th>
                                    </tr>
                                    </tfoot>
                                    <tbody>
                                    	<?php if($members != null) : $i=0; ?>
                                    		<?php foreach($members as $member) : $i++; ?>
                                    			<tr>
    	                                			<td width="27"><?php echo $i; ?></td>
    				                                <td width="100"><?php echo $member['name']; ?></td>
    				                                <td width="20"><?php echo $member['phone']; ?></td>
    				                                <td width="20"><?php echo $member['email']; ?></td>
    				                                <td width="20"><?php echo $member['membership_number']; ?></td>
    				                                <td width="20"><?php echo Yii::$app->params['membership_type_show'][$member['membership_type']]; ?></td>
                                                    <td width="20"><?php echo $member['membership_fee']; ?></td>
    				                                <td width="20"><?php echo date('Y-m-d', strtotime($member['issued_date'])); ?></td>
    				                                <td width="20"><?php echo date('Y-m-d', strtotime($member['valid_date'])); ?></td>
    				                                <td width="15"><?php echo $member['created_on']; ?></td>
    				                                <td width="15"><?php echo $member['username']; ?></td>
                                                    <td width="10">
                                                        <div class="table-row-controls">
                                                            <?php if($member['current_threshold_exceeded'] == 1 || $member['current_threshold_end_exceeded'] == 1) : ?>
                                                                <a href="javascript:void(0)" class="block view-threshold-data" data-toggle="tooltip" data-original-title="View Threshold Report" data-placement="left" data-member="<?= $member['id'] ?>" data-member-name="<?= $member['name'] ?>">
                                                                    <i class="icon fa-book" aria-hidden="true"></i>
                                                                    <span class="badge badge-success up"><i class="icon fa-info-circle"></i></span>
                                                                </a>
                                                            <?php else: ?>
                                                                <a href="javascript:void(0)" class="block view-threshold-data" data-toggle="tooltip" data-original-title="View Threshold Report" data-placement="left" data-member="<?= $member['id'] ?>" data-member-name="<?= $member['name'] ?>">
                                                                    <i class="icon fa-book" aria-hidden="true"></i>
                                                                </a>
                                                            <?php endif; ?>

                                                            <a href="<?php echo $baseUrl.'/member/report/'.$member['id'] ?>" class="block" data-toggle="tooltip" data-original-title="View Discount Report" data-placement="left">
                                                                <i class="icon wb-book" aria-hidden="true"></i>
                                                            </a>

                                                            <a href="<?php echo $baseUrl.'/member/edit/'.$member['id'] ?>" class="block" data-toggle="tooltip" data-original-title="Edit" data-placement="left">
                                                                <i class="icon ti-pencil" aria-hidden="true"></i>
                                                            </a>
                                                        </div>
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

<div class="modal fade horizontal modal-view-threshold-data" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-header theme-bg-color">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title color-white member-name"></h4>
            </div>

            <div class="modal-body show-member-threshold-detail">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Total Paid Amount</th>
                            <th>Threshold Remaining(<span class="threshold-amount"></span>)</th>
                            <th>Threshold End Remaining(<span class="threshold-end-amount"></span>)</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>
                                <span class="paid-amount pull-right"></span>
                            </td>
                            <td>
                                <span class="threshold-remaining-amount pull-right"></span>
                            </td>
                            <td>
                                <span class="threshold-end-remaining-amount pull-right"></span>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2"><span class="pull-right">Total Threshold Claimed</span></td>
                            <td>
                                <span class="threshold-claimed pull-right"></span>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2"><span class="pull-right">Total Threshold End Claimed</span></td>
                            <td>
                                <span class="threshold-end-claimed pull-right"></span>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">
                    Close
                </button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade horizontal modal-view-member-birthday" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-header theme-bg-color">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title color-white">Members Birthday</h4>
            </div>

            <div class="modal-body">
                <table class="table table-hover dataTable table-striped with-export member-birthday-list">
                    <thead>
                        <tr>
                            <th>SN.</th>
                            <th>Name</th>
                            <th>Date Of Birth</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>SN.</th>
                            <th>Name</th>
                            <th>Date Of Birth</th>
                        </tr>
                    </tfoot>
                    <tbody class="show-member-birthday">
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>