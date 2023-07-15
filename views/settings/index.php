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
/*for datatable*/$this->registerJsFile($baseUrl . '/assets/plugins/switchery/switchery.min.js');
$this->registerJsFile($baseUrl . '/assets/plugins/components/switchery.min.js');
$this->registerJsFile($baseUrl . '/assets/plugins/x-editable/js/bootstrap-editable.min.js');

$this->registerJsFile($baseUrl . '/assets/software/settings.js');

$this->title = Yii::$app->params['system'] . ' | Settings';
?>

<div class="page-content padding-30 container-fluid setting-page">
    <div class="row">
        <?php
            if ((date('Y-m-d') >= $starting_fiscal_year_from_date) 
                    && ( date('Y-m-d') < date('Y-m-d', strtotime($starting_fiscal_year_to_date. ' + 11 days'))) )
            { 
        ?>
            <!-- <div class=" col-sm-12 col-xlg-4 col-lg-4 col-md-6">
                <div class="panel">
                    <div class="panel-heading">
                        <h3 class="panel-title padding-left-15 padding-bottom-0">Add New Settings</h3>
                    </div>

                    <form action="<?php echo $baseUrl;?>/settings/add" name="newSetting" data-tablename="settings" method="post" class="form-horizontal settings">
                    <input type="hidden" name="<?php echo Yii::$app->request->csrfParam; ?>" value="<?php echo Yii::$app->request->csrfToken; ?>" />
                    <input type="hidden" name="id" value="0" id="edit-id" />

                    <div class="panel-body container-fluid">
                        <div class="row row-lg">
                            <div class="col-sm-12 col-lg-12">
                                <div class="form-group">
                                    <h5>Field Name</h5>
                                    <input name="field_name" type="text" class="form-control" placeholder="Enter Field Name">
                                </div>
                            </div>
                        </div>
                        <div class="row row-lg">
                            <div class="col-sm-12 col-lg-12">
                                <div class="form-group">
                                    <h5>Value</h5>
                                    <textarea name="value" class="form-control" rows="5" placeholder="Enter Value"></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="row row-lg">
                            <div class="col-sm-12 col-lg-12">
                                <div class="form-group">
                                    <div class="col-sm-3">
                                        <label for="" class="">Active</label>
                                    </div>
                                    <div class="col-sm-9">
                                        <input type="checkbox" class="" name="is_active" data-plugin="switchery" data-color="#62a8ea" value="1" checked />
                                    </div>
                                    <div class="clearfix"></div>
                                </div>
                            </div>
                            <div class="col-sm-12 col-lg-12">
                                <div class="form-group">
                                    <div class="col-sm-3">
                                        <label for="" class="">Permanent</label>
                                    </div>
                                    <div class="col-sm-9">
                                        <input type="checkbox" class="" name="is_permanent" data-plugin="switchery" data-color="#62a8ea" value="1" checked />
                                    </div>
                                    <div class="clearfix"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="panel-footer">
                        <button type="submit" class="btn btn-sm btn-primary btn-icon margin-bottom-20 pull-right"><i class="icon fa-save"></i> Add Setting </button>
                        <div class="clearfix"></div>
                    </div>
                    </form>
                </div>
            </div> -->
        <?php } ?>

        <div class="col-sm-12 col-xlg-8 col-lg-8 col-md-6">
            <div class="panel">
                <div class="panel-heading">
                    <h3 class="panel-title">Settings</h3>
                </div>
                <div class="panel-body container-fluid">
                    <div class="row row-lg">
                        <div class="col-sm-12 col-lg-12 col-md-12">
                            <div class="table-parent">
                                <table class="table table-hover table-striped width-full dtr-inline dataTable with-editable" >
                                    <thead>
                                        <tr>
                                            <th width="27">#</th>
                                            <th width="100">Field Name</th>
                                            <th width="150">Value</th>
                                            <th width="60">Status</th>
                                            <th width="30"></th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th width="27">#</th>
                                            <th width="100">Field Name</th>
                                            <th width="150">Value</th>
                                            <th width="60">Status</th>
                                            <th width="30"></th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        <?php if ($settings != null) : $i=0;?>
                                            <?php
                                                if ((date('Y-m-d') >= $starting_fiscal_year_from_date) 
                                                        && ( date('Y-m-d') < date('Y-m-d', strtotime($starting_fiscal_year_to_date. ' + 11 days'))) )
                                                { 
                                            ?>
                                                <?php foreach($settings as $setting) : ?>
                                                <tr data-id="<?php echo $setting['id'];?>">
                                                    <td><?php echo ++$i;?></td>
                                                    <td><?php echo $setting['field_name'];?></td>
                                                    <td>
                                                        <?php if($setting['field_name'] == 'pan no in bill') : ?>
                                                            <span class="editable-pan-number" data-type="text" 
                                                            data-params="{old_value : '<?php echo $setting['value'];?>'}" 
                                                            data-name="value" data-pk="<?php echo $setting['id'];?>" 
                                                            data-url="<?php echo $baseUrl; ?>/settings/editable" data-placement="right" data-placeholder="Required" 
                                                            data-original-title="Enter Value"><?php echo trim($setting['value']);?></span>
                                                        <?php elseif($setting['field_name'] == 'service charge rate' || $setting['field_name'] == 'take away service charge rate' || $setting['field_name'] == 'delivery service charge rate' || $setting['field_name'] == 'pick up service charge rate' || $setting['field_name'] == 'retail service charge rate') : ?>
                                                            <span class="editable-number" data-type="text" 
                                                            data-params="{old_value : '<?php echo $setting['value'];?>'}" 
                                                            data-name="value" data-pk="<?php echo $setting['id'];?>" 
                                                            data-url="<?php echo $baseUrl; ?>/settings/editable" data-placement="right" data-placeholder="Required" 
                                                            data-original-title="Enter Value"><?php echo trim($setting['value']);?></span>
                                                        <?php else: ?>
                                                            <span class="editable-textarea" data-type="textarea" 
                                                            data-params="{old_value : '<?php echo $setting['value'];?>'}" 
                                                            data-name="value" data-pk="<?php echo $setting['id'];?>" 
                                                            data-url="<?php echo $baseUrl; ?>/settings/editable" data-placement="right" data-placeholder="Required" 
                                                            data-original-title="Enter Value"><?php echo trim($setting['value']);?></span>
                                                        <?php endif; ?>
                                                    </td>
                                                    <td>
                                                        <span class="editable-select-active" data-type="select" data-value="<?php echo $setting['is_active']; ?>"
                                                            data-params="{old_value : '<?php echo $setting['is_active'];?>'}" 
                                                            data-name="is_active" data-pk="<?php echo $setting['id'];?>" 
                                                            data-url="<?php echo $baseUrl; ?>/settings/editable" data-placement="top" data-placeholder="Required" 
                                                            data-original-title="Select Status" data-source="[{value: 1, text: 'Active'},{value: 0, text: 'Inactive'}]">
                                                        </span>
                                                    </td>
                                                    <td>
                                                        <?php if ($setting['is_permanent'] == 0) :?>
                                                        <div class="table-row-controls">
                                                            <a href="#" class="delete-setting block"> 
                                                                <i class="icon ti-close"></i>
                                                            </a>
                                                        </div>
                                                    <?php endif; ?>
                                                    </td>
                                                </tr>
                                                <?php endforeach; ?>
                                            <?php }
                                                else {
                                                    foreach($settings as $setting) : ?>
                                                        <tr data-id="<?php echo $setting['id'];?>">
                                                            <td><?php echo ++$i;?></td>
                                                            <td><?php echo $setting['field_name'];?></td>
                                                            <td>
                                                                <?php echo trim($setting['value']);?>
                                                            </td>
                                                            <td>
                                                                <?php echo ($setting['is_active'] == 1) ? 'Active' : 'Inactive';?>
                                                            </td>
                                                            <td>
                                                            </td>
                                                        </tr>
                                                    <?php endforeach;
                                                }
                                            ?>
                                        <?php endif;?>
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

