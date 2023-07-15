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

<form action="<?php echo $baseUrl;?>/member/set-membership-discount" name="newMember" data-tablename="member" method="post" class="form-horizontal member-form">
<input type="hidden" name="<?php echo Yii::$app->request->csrfParam; ?>" value="<?php echo Yii::$app->request->csrfToken; ?>" />

<div class="page-header padding-bottom-0">
    <div class="page-header-actions margin-top-10">
        <button type="submit" class="btn btn-icon btn-success btn-round btn-big pull-right" data-toggle="tooltip" data-original-title="Save" data-placement="left">
            <i class="icon fa-save" aria-hidden="true"></i>
        </button>    
    </div>
    <div class="clearfix"></div>
</div>
<div class="page-content padding-30 padding-top-15 container-fluid">
    <div class="row">
        <div class="col-sm-12 col-xlg-6 col-lg-6 col-md-6">
            <div class="panel height-605">
                <div class="panel-heading">
                    <div class="row">
                        <div class="com-sm-12 col-md-6 col-lg-6">
                            <h3 class="panel-title">Assign Discount to categories</h3>
                        </div>
                        <div class="com-sm-12 col-md-6 col-lg-6">
                            <div class="category-name margin-top-10 padding-right-25">        
                                <div class="input-group auto-parent">
                                    <input type="text" placeholder="Select Category" class="form-control category-txt sub-input-group auto-show"  autocomplete="off">

                                    <span class="input-group-btn">
                                        <a class="btn btn-primary btn-auto-list show-category-list-btn"><i class="icon fa-question" ></i></a>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="panel-body container-fluid">
                    <div class="selected-categories scroll-height-500 slimscrollstart-position-500">
                        <?php if($member_discount != null) : $i=0;?>
                            <?php foreach($member_discount as $mem_dis) : $i++; ?>
                                <div class="selected-category-list form-horizontal" data-category-id="<?php echo $mem_dis['category_id']; ?>">
                                    <div class="form-group">
                                        <div class="col-md-4 col-sm-4 col-lg-4 control-label">
                                            <input type="hidden" name="category[<?php echo $i ?>][category_id]" value="<?php echo $mem_dis['category_id']; ?>">
                                            <input name="category[<?php echo $i; ?>][name]" type="text" class="form-control" value="<?php echo $mem_dis['category']; ?>" readonly>
                                        </div>
                                        <div class="col-md-5 col-sm-5 col-lg-5">
                                            <div class="input-group margin-top-6">
                                                <input name="category[<?php echo $i; ?>][discount]" type="number" class="form-control" min="0" max="90" placeholder="Enter Discount Allowed in Percent" value="<?php echo $mem_dis['discount_allowed']; ?>">
                                                <span class="input-group-addon">%</span>
                                            </div>
                                        </div>
                                        <div class="col-md-3 col-sm-3 col-lg-3 padding-left-0">
                                            <button class="remove-category-button btn btn-round btn-danger icon fa-remove margin-top-6" type="button"></button>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        <?php endif; ?>
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
</script>