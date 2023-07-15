<?php
/* @var $this yii\web\View */
$baseUrl = Yii::$app->request->baseUrl;

$this->registerCssFile($baseUrl . '/assets/plugins/x-editable/css/bootstrap-editable.css');
$this->registerJsFile($baseUrl . '/assets/plugins/x-editable/js/bootstrap-editable.min.js');
$this->registerJsFile($baseUrl . '/assets/js/users.min.js');
$this->registerJsFile($baseUrl . '/assets/software/floor.js');

$this->title = Yii::$app->params['system'] . ' | Section Settings';
?>
<div class="page-header padding-bottom-0">
    <h1 class="page-title">Manage Section</h1>
    
    <!-- required if needed to sort the section ordering -->
    <!-- <div class="page-header-actions margin-top-10">
        <a href="<?php echo $baseUrl;?>/floor/sorting" class="btn btn-icon btn-success btn-round btn-big margin-left-100" data-toggle="tooltip" data-original-title="Manage Order" data-placement="left">
            <i class="icon wb-sort-asc" aria-hidden="true"></i>
        </a>      
    </div> -->

    <div class="clearfix"></div>
</div>
<div class="page-content padding-30 container-fluid printer-page">
    <div class="row">
        <div class="col-md-4">
            <div class="panel">
                <form action="<?php echo $baseUrl.'/floor/add' ?>" name="add_floor_form" method="post" class="form-horizontal add-floor-form">
                    <input type="hidden" name="<?php echo Yii::$app->request->csrfParam; ?>" value="<?php echo Yii::$app->request->csrfToken; ?>" />

                    <div class="panel-body container-fluid">
                        <div class="row row-lg">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <h5>Section Name</h5>
                                    <input name="floor_name" min="0" type="text" class="form-control" placeholder="Section Name">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <button type="submit" class="btn btn-sm btn-primary btn-icon btn-section"><i class="icon fa-save"></i> Save </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <div class="col-md-8">
            <div class="panel">
                <div class="panel-heading">
                    <h3 class="panel-title">Sections</h3>
                </div>

                <div class="panel-body">
                    <table class="table table-hover table-striped width-full dtr-inline dataTable with-editable-no-tools" >
                        <thead>
                            <tr>
                                <th width="27">#</th>
                                <th width="90">Section name</th>
                                <th width="60">Status</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th width="27">#</th>
                                <th width="90">Section name</th>
                                <th width="60">Status</th>
                            </tr>
                        </tfoot>
                        <tbody> 
                            <?php if ($floors != null) : $i=0;
                                foreach($floors as $floor) : ?>
                                <tr>
                                    <td><?php echo ++$i;?></td>
                                    <td>
                                        <span class="editable-text" data-type="text" 
                                            data-params="{old_value : '<?php echo $floor['name'];?>'}" 
                                            data-name="name" data-pk="<?php echo $floor['id'];?>" 
                                            data-url="<?php echo $baseUrl; ?>/floor/editable" data-placement="top" data-placeholder="Required" 
                                            data-original-title="Enter Item name">
                                            <?php echo ucwords($floor['name']);?>
                                        </span>
                                    </td>
                                    <td>
                                        <span class="editable-select-active" data-type="select" data-value="<?php echo $floor['status']; ?>"
                                            data-params="{old_value : '<?php echo $floor['status'];?>'}" 
                                            data-name="status" data-pk="<?php echo $floor['id'];?>" 
                                            data-url="<?php echo $baseUrl; ?>/floor/editable" data-placement="top" data-placeholder="Required" 
                                            data-original-title="Select Status" data-source="[{value: 1, text: 'Active'},{value: 0, text: 'Inactive'}]">
                                        </span>
                                    </td>
                                </tr>
                                <?php endforeach; 
                                endif;?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div class="clearfix"></div>
</div>