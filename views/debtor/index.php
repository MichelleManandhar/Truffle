<?php
$baseUrl = Yii::$app->request->baseUrl;

$temp = explode(":",Yii::$app->session['fiscal_year']);
$starting_fiscal_year_from_date = $temp[0];
$starting_fiscal_year_to_date   = $temp[1];

/*$this->registerJsFile($baseUrl . '/assets/software/dash.js');*/
$this->registerCssFile($baseUrl . '/assets/plugins/x-editable/css/bootstrap-editable.css');
$this->registerJsFile($baseUrl . '/assets/plugins/x-editable/js/bootstrap-editable.min.js');
$this->registerJsFile($baseUrl . '/assets/plugins/typeahead-js/bootstrap3-typeahead.min.js');

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
$this->registerJsFile($baseUrl . '/assets/software/debtor.js');

$this->title = Yii::$app->params['system'] . ' | Debtors List';
?>
<div class="page-header padding-bottom-0">
    <h1 class="page-title">Debtor list</h1>
    <?php
        if ((date('Y-m-d') >= $starting_fiscal_year_from_date) 
                && ( date('Y-m-d') < date('Y-m-d', strtotime($starting_fiscal_year_to_date. ' + 11 days'))) )
        {
    ?>
        <div class="page-header-actions margin-top-10">
            <a href="#" class="btn btn-icon btn-primary btn-round btn-big create-new-debtor margin-left-100" data-toggle="tooltip" data-original-title="Create New" data-placement="left">
                <i class="icon wb-plus" aria-hidden="true"></i>
            </a> 

            <?php if ($debtors != null) : ?>
                <a href="<?php echo $baseUrl.'/debtor/export-debtor-list' ?>" class="btn btn-icon btn-primary btn-round btn-big download-debtor-list" data-toggle="tooltip" data-original-title="Download Debtor List Here" data-placement="left" download>
                    <i class="icon fa-download" aria-hidden="true"></i>
                </a>
            <?php endif; ?> 
        </div>
    <?php } ?>

    <div class="clearfix"></div>
</div>
<div class="page-content padding-30 padding-top-15 container-fluid">
    <div class="row">
        <div class="col-sm-12 col-xlg-12 col-lg-12 col-md-12">
            <div class="panel panel-bordered">
                <div class="panel-body">
                    <div class="row row-lg">
                        <div class="col-sm-12 col-lg-12 col-md-12">
                            <table class="table table-hover table-striped dtr-inline dataTable with-editable">
                                <thead>
                                    <tr>
                                        <th width="15">#</th>
                                        <th width="100">Debtors Name</th>
                                        <th width="100">Debtors PAN</th>
                                        <th width="100">Debtors Phone</th>
                                        <th width="100">Debtors Address</th>
                                        <th width="100">Credit Remaining</th>
                                        <th width="10">Status</th>
                                        <th width="10">View</th>
                                        <?php
                                            if ((date('Y-m-d') >= $starting_fiscal_year_from_date) 
                                                    && ( date('Y-m-d') < date('Y-m-d', strtotime($starting_fiscal_year_to_date. ' + 11 days'))) )
                                            {
                                        ?>
                                            <th width="10">Pay</th>
                                        <?php } ?>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th width="15">#</th>
                                        <th width="100">Debtors Name</th>
                                        <th width="100">Debtors PAN</th>
                                        <th width="100">Debtors Phone</th>
                                        <th width="100">Debtors Address</th>
                                        <th width="100">Credit Remaining</th>
                                        <th width="10">Status</th>
                                        <th width="10">View</th>
                                        <?php
                                            if ((date('Y-m-d') >= $starting_fiscal_year_from_date) 
                                                    && ( date('Y-m-d') < date('Y-m-d', strtotime($starting_fiscal_year_to_date. ' + 11 days'))) )
                                            {
                                        ?>
                                            <th width="10">Pay</th>
                                        <?php } ?>
                                    </tr>
                                </tfoot>
                                <tbody class="all-debtors-list">    
                                    <?php if ($debtors != null) : $i=0; 
                                        if ((date('Y-m-d') >= $starting_fiscal_year_from_date) 
                                                && ( date('Y-m-d') < date('Y-m-d', strtotime($starting_fiscal_year_to_date. ' + 11 days'))) )
                                        { 
                                    ?>
                                            <?php foreach ($debtors as $debtor): $i++; ?>
                                                <tr data-id="<?php echo $debtor['id'];?>">
                                                    <td><?php echo $i; ?></td>
                                                    <td>
                                                        <span class="editable-text" data-type="text" 
                                                            data-params="{old_value : '<?php echo $debtor['name'];?>'}" 
                                                            data-name="name" data-pk="<?php echo $debtor['id'];?>" 
                                                            data-url="<?php echo $baseUrl; ?>/debtor/editable" data-placement="top" data-placeholder="Required" 
                                                            data-original-title="Enter Debtor name">
                                                            <?php echo ucwords($debtor['name']); ?>
                                                        </span>
                                                    </td>
                                                    <td>
                                                        <span class="editable-number" data-type="number" 
                                                            data-params="{old_value : '<?php echo $debtor['pan'];?>'}" 
                                                            data-name="pan" data-pk="<?php echo $debtor['id'];?>" 
                                                            data-url="<?php echo $baseUrl; ?>/debtor/editable" data-placement="top" data-placeholder="Required" 
                                                            data-original-title="Enter Debtor PAN">
                                                            <?php echo $debtor['pan'];?>
                                                        </span>
                                                    </td>
                                                    <td>
                                                        <span class="editable-number" data-type="number" 
                                                            data-params="{old_value : '<?php echo $debtor['phone'];?>'}" 
                                                            data-name="phone" data-pk="<?php echo $debtor['id'];?>" 
                                                            data-url="<?php echo $baseUrl; ?>/debtor/editable" data-placement="top" data-placeholder="Required" 
                                                            data-original-title="Enter Debtor Phone">
                                                            <?php echo $debtor['phone'];?>
                                                        </span>
                                                    </td>
                                                    <td>
                                                        <span class="editable-text" data-type="text" 
                                                            data-params="{old_value : '<?php echo $debtor['address'];?>'}" 
                                                            data-name="address" data-pk="<?php echo $debtor['id'];?>" 
                                                            data-url="<?php echo $baseUrl; ?>/debtor/editable" data-placement="top" data-placeholder="Required" 
                                                            data-original-title="Enter Debtor Address">
                                                            <?php echo ucwords($debtor['address']); ?>
                                                        </span>
                                                    </td>
                                                    <td>
                                                        <?php 
                                                            $credit_amount      = 0;
                                                            $paid_amount        = 0;
                                                            $return_amount      = 0;
                                                            $opening_balance    = $debtor['opening_balance'];

                                                            if(isset($credit_order[$debtor['id']])) {
                                                                $credit_amount += $credit_order[$debtor['id']]['total'];
                                                            }

                                                            if(isset($credit_break_down[$debtor['id']])) {
                                                                $credit_amount += $credit_break_down[$debtor['id']]['total'];
                                                            }

                                                            if(isset($debtor_paid[$debtor['id']])) {
                                                                $paid_amount += $debtor_paid[$debtor['id']]['total'];
                                                            }

                                                            if(isset($payment_return[$debtor['id']])) {
                                                                $return_amount += $payment_return[$debtor['id']]['total'];
                                                            }

                                                            echo round( ($credit_amount + $opening_balance + $return_amount - $paid_amount) , 2); ?>
                                                    </td>
                                                    <td>
                                                        <span class="editable-select-active" data-type="select" data-value="<?php echo $debtor['is_active']; ?>"
                                                            data-params="{old_value : '<?php echo $debtor['is_active'];?>'}" 
                                                            data-name="is_active" data-pk="<?php echo $debtor['id'];?>" 
                                                            data-url="<?php echo $baseUrl; ?>/debtor/editable" data-placement="top" data-placeholder="Required" 
                                                            data-original-title="Select Status" data-source="[{value: 1, text: 'Active'},{value: 0, text: 'Inactive'}]">
                                                        </span>
                                                    </td>
                                                    <td>
                                                        <a href="<?php echo Yii::$app->request->baseUrl?>/debtor/history/?id=<?php echo $debtor['id'];?>" class="btn btn-icon btn-primary btn-outline icon wb-eye"></a>
                                                    </td>
                                                    <td>
                                                        <a href="<?php echo Yii::$app->request->baseUrl?>/debtor/payable/?id=<?php echo $debtor['id'];?>" class="btn btn-icon btn-primary btn-outline icon fa-dollar"></a>
                                                    </td>
                                                </tr>
                                            <?php endforeach; ?>
                                    <?php
                                        } else {
                                            foreach ($debtors as $debtor): $i++; ?>
                                                <tr data-id="<?php echo $debtor['id'];?>">
                                                    <td><?php echo $i; ?></td>
                                                    <td>
                                                        <?php echo ucwords($debtor['name']); ?>
                                                    </td>
                                                    <td>
                                                        <?php echo $debtor['pan'];?>
                                                    </td>
                                                    <td>
                                                        <?php echo $debtor['phone'];?>
                                                    </td>
                                                    <td>
                                                        <?php echo ucwords($debtor['address']); ?>
                                                    </td>
                                                    <td>
                                                        <?php 
                                                            $credit_amount      = 0;
                                                            $paid_amount        = 0;
                                                            $return_amount      = 0;
                                                            $opening_balance    = $debtor['opening_balance'];

                                                            if(isset($credit_order[$debtor['id']])) {
                                                                $credit_amount += $credit_order[$debtor['id']]['total'];
                                                            }

                                                            if(isset($credit_break_down[$debtor['id']])) {
                                                                $credit_amount += $credit_break_down[$debtor['id']]['total'];
                                                            }

                                                            if(isset($debtor_paid[$debtor['id']])) {
                                                                $paid_amount += $debtor_paid[$debtor['id']]['total'];
                                                            }

                                                            if(isset($payment_return[$debtor['id']])) {
                                                                $return_amount += $payment_return[$debtor['id']]['total'];
                                                            }

                                                            echo round( ($credit_amount + $opening_balance + $return_amount - $paid_amount) , 2); ?>
                                                    </td>
                                                    <td>
                                                        <?php echo ($debtor['is_active'] == 1) ? 'Active' : 'Inactive';?>
                                                    </td>
                                                    <td>
                                                        <a href="<?php echo Yii::$app->request->baseUrl?>/debtor/history/?id=<?php echo $debtor['id'];?>" class="btn btn-icon btn-primary btn-outline icon wb-eye"></a>
                                                    </td>
                                                    <?php
                                                        $temp = explode(":",Yii::$app->session['fiscal_year']);
                                                        $starting_fiscal_year_from_date = $temp[0];
                                                        $starting_fiscal_year_to_date   = $temp[1];

                                                        if ((date('Y-m-d') >= $starting_fiscal_year_from_date) 
                                                                && ( date('Y-m-d') < date('Y-m-d', strtotime($starting_fiscal_year_to_date. ' + 11 days'))) )
                                                        {
                                                    ?>
                                                        <td>
                                                            <a href="<?php echo Yii::$app->request->baseUrl?>/debtor/payable/?id=<?php echo $debtor['id'];?>" class="btn btn-icon btn-primary btn-outline icon fa-dollar"></a>
                                                        </td>
                                                    <?php } ?>
                                                </tr>
                                            <?php endforeach;
                                        }
                                    ?>
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

<div class="modal modal-aside fade horizontal right modal-add-debtors" aria-hidden="false" role="dialog" tabindex="-1" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <form name="add_debtor" action="<?php echo $baseUrl; ?>/debtor/create-debtor" class="admin-add-debtor" method="post">
            <input type="hidden" name="<?php echo Yii::$app->request->csrfParam; ?>" value="<?php echo Yii::$app->request->csrfToken; ?>" />
            <div class="modal-header theme-bg-color">
                <h4 class="modal-title color-white">Debtor</h4>
            </div>
            <div class="modal-body">
                <div class="col-sm-12">
                    <div class="form-group">
                        <input type="text" name="debtor_name" class="form-control" data-placement="left" data-toggle="tooltip" data-original-title="Debtor Name" placeholder="Debtor Name">
                    </div>

                    <div class="form-group">
                        <input type="number" name="debtor_phone" class="form-control" data-placement="left" data-toggle="tooltip" data-original-title="Debtor Phone" placeholder="Debtor Phone">
                    </div>

                    <div class="form-group">
                        <input type="text" name="debtor_address" class="form-control" data-placement="left" data-toggle="tooltip" data-original-title="Debtor Address" placeholder="Debtor Address">
                    </div>

                    <div class="form-group">
                        <input type="number" name="debtor_pan" class="form-control" data-placement="left" data-toggle="tooltip" data-original-title="Debtor PAN" placeholder="Debtor PAN">
                    </div>

                    <div class="form-group">
                        <input type="number" name="debtor_opening_balance" class="form-control" data-placement="left" data-toggle="tooltip" data-original-title="Opening Balance" placeholder="Opening Balance">
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary">Save</button>
                <button type="button" class="btn btn-default close-add-debtor-modal-btn">Discard</button>
            </div>
            </form>
        </div>
    </div>
</div>

<div class="modal fade modal-aside horizontal right modal-debtors-list no-reset custom-modal" tabindex="-1" role="dialog" data-backdrop="static" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog">
        <div class="modal-content">
            <div class="modal-header  theme-bg-color">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true" class="color-white">&times;</span>
                </button>
                <h4 class="modal-title color-white">Debtors</h4>
            </div>
            <div class="modal-body">
                <div class="row row-lg">
                    <div class="col-sm-12 col-lg-12 col-md-12">
                        <table class="table table-hover dataTable table-striped with-editable-no-tools debtors-list">
                            <thead>
                                <tr>
                                    <th width="15">#</th>
                                    <th width="100">Debtors Name</th>
                                    <th width="100">Debtors Phone</th>
                                    <th width="100">Credit Remaining</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th width="15">#</th>
                                    <th width="100">Debtors Name</th>
                                    <th width="100">Debtors Phone</th>
                                    <th width="100">Credit Remaining</th>
                                </tr>
                            </tfoot>
                            <tbody>                 
                                <!-- here goes the debtors list -->
                                <div class="no-debtor">
                                    No debtors available !!!
                                </div>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>