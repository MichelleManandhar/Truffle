<?php
/* @var $this yii\web\View */
$baseUrl = Yii::$app->request->baseUrl;
$this->registerJsFile($baseUrl . '/assets/plugins/switchery/switchery.min.js');
$this->registerJsFile($baseUrl . '/assets/plugins/components/switchery.min.js');

$this->registerJsFile($baseUrl . '/assets/plugins/bootstrap-select/bootstrap-select.min.js');
$this->registerCssFile($baseUrl . '/assets/plugins/bootstrap-select/bootstrap-select.min081a.css');

$this->registerJsFile($baseUrl . '/assets/plugins/typeahead-js/bootstrap3-typeahead.min.js');

$this->registerCssFile($baseUrl . '/assets/plugins/bootstrap-datepicker/bootstrap-datepicker.min081a.css');
$this->registerJsFile($baseUrl . '/assets/plugins/bootstrap-datepicker/bootstrap-datepicker.min.js');

$this->registerJsFile($baseUrl . '/assets/software/category-auto-list.js');
$this->registerJsFile($baseUrl . '/assets/software/member.js');

$this->title = Yii::$app->params['system'] . ' | Member';
?>

<form action="<?php echo $baseUrl;?>/member/add" name="newMember" data-tablename="member" method="post" class="form-horizontal member-form">
<input type="hidden" name="<?php echo Yii::$app->request->csrfParam; ?>" value="<?php echo Yii::$app->request->csrfToken; ?>" />

<div class="page-header padding-bottom-0">
    <h1 class="page-title">Create New Member</h1>
    <div class="page-header-actions margin-top-10">
        <button type="submit" class="btn btn-icon btn-success btn-round btn-big pull-right" data-toggle="tooltip" data-original-title="Save" data-placement="left">
            <i class="icon fa-save" aria-hidden="true"></i>
        </button>    
    </div>
    <div class="clearfix"></div>
</div>
<div class="page-content padding-30 padding-top-15 container-fluid">
    <div class="row">
        <div class="col-sm-12 col-xlg-12 col-lg-12 col-md-12">
            <div class="panel">
                <div class="panel-body container-fluid">
                    <div class="row row-lg">
                        <div class="col-sm-12 col-md-4 col-lg-4">
                            <div class="form-group">
                                <h5>Name</h5>
                                <input name="name" type="text" class="form-control" placeholder="Enter Member Name">
                            </div>
                        </div>

                        <div class="col-sm-12 col-md-4 col-lg-4">
                            <div class="form-group">
                                <h5>Phone</h5>
                                <input name="phone" type="number" class="form-control" placeholder="Enter Member Phone Number">
                            </div>
                        </div>

                        <div class="col-sm-12 col-md-4 col-lg-4">
                            <div class="form-group">
                                <h5>Email</h5>
                                <input name="email" type="text" class="form-control" placeholder="Enter Member Email">
                            </div>
                        </div>
                    </div>

                    <div class="row row-lg">
                        <div class="col-sm-12 col-md-4 col-lg-4">
                            <div class="form-group">
                                <h5>Membership Number</h5>
                                <input name="membership_number" type="text" class="form-control" placeholder="Enter Membership Number">
                            </div>
                        </div>

                        <div class="col-sm-12 col-md-4 col-lg-4">
                            <div class="form-group">
                                <h5>Membership Type</h5>
                                <select name="membership_type" class="form-control membership-type">
                                    <option value="">Select a type</option>
                                    <?php 
                                        foreach (Yii::$app->params['membership_type'] as $key => $val): ?>
                                            <option data-membership-type="<?php echo $key; ?>" value="<?php echo $val; ?>"><?php echo $key; ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>

                        <div class="parent-membership-fee" style="display: none;">
                            <div class="col-sm-12 col-md-12 col-lg-12">
                                <div class="form-group">
                                    <h5>Membership Fee</h5>
                                    <input name="membership_fee" type="text" class="form-control membership-fee" placeholder="Enter Membership Fee">
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row row-lg">
                        <div class="col-sm-12 col-md-3 col-lg-3">
                            <div class="form-group">
                                <h5>Date Of Birth</h5>
                                <input name="date_of_birth" type="text" class="datepicker" placeholder="Date Of Birth" readonly style="border: 1px solid #ccc; padding: 6px 4px;">
                            </div>
                        </div>

                        <div class="col-sm-12 col-md-3 col-lg-3">
                            <div class="form-group">
                                <h5>Issued Date</h5>
                                <input name="issued_date" type="text" class="datepicker" placeholder="issued date" readonly style="border: 1px solid #ccc; padding: 6px 4px;">
                            </div>
                        </div>

                        <div class="col-sm-12 col-md-3 col-lg-3">
                            <div class="form-group">
                                <h5>Valid Date</h5>
                                <input name="valid_date" type="text" class="datepicker" placeholder="issued date" readonly style="border: 1px solid #ccc; padding: 6px 4px;">
                            </div>
                        </div>

                        <div class="col-sm-12 col-md-3 col-lg-3">
                            <div class="form-group margin-top-30">
                                <div class="col-sm-3">
                                    <label for="" class="">Active</label>
                                </div>
                                <div class="col-sm-9">
                                    <input type="checkbox" class="" name="is_active" data-plugin="switchery" data-color="#62a8ea" value="1" checked />
                                </div>
                                <div class="clearfix"></div>
                            </div>
                        </div>
                    </div>

                    <div class="row row-lg">
                        
                    </div>
                </div>                
            </div>
        </div>
    </div>
    <div class="clearfix"></div>
</div>
</form>

<!-- modal -->
    <div class="modal modal-aside fade horizontal right modal-category-list" aria-hidden="false" role="dialog" tabindex="-1">
        <div class="modal-dialog modal-md">
            <div class="modal-content">
                <div class="modal-header theme-bg-color">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                    <h4 class="modal-title color-white">Category lists</h4>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-sm-12 col-lg-12 col-md-12">
                            <table class="table table-hover table-striped category-list">
                                <thead>
                                    <tr>
                                        <th width="15">#</th>
                                        <th width="100">Category Name</th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th width="15">#</th>
                                        <th width="100">Category Name</th>
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
    var membership_type = <?php echo json_encode(Yii::$app->params['membership_type']); ?>
</script>