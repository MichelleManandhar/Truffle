<?php
$baseUrl = Yii::$app->request->baseUrl;
$currency = strtoupper(Yii::$app->session['currency']);
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
$this->registerJsFile($baseUrl . '/assets/plugins/x-editable/js/bootstrap-editable.min.js');

$this->title = Yii::$app->params['system'] . ' | Monthly Target';
?>
<div class="page-content padding-30 container-fluid monthly-target-page">
    <div class="row">
        <div class="col-sm-12 col-xlg-8 col-lg-8 col-md-8">
            <div class="panel">
                <div class="panel-heading">
                    <h3 class="panel-title">Monthly Target</h3>
                </div>
                <div class="panel-body container-fluid">
                    <div class="row row-lg">
                        <div class="col-sm-12 col-lg-12 col-md-12">
                            <div class="table-parent">
                                <table class="table table-hover table-striped width-full dtr-inline dataTable with-editable-no-pagination" >
                                    <thead>
                                        <tr>
                                            <th width="20">#</th>
                                            <th width="100">Month</th>
                                            <th width="100">Target</th>
                                            <th width="60">Last Edited On</th>
                                            <th width="60">Last Edited By</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th width="20">#</th>
                                            <th width="100">Month</th>
                                            <th width="100">Target</th>
                                            <th width="60">Last Edited On</th>
                                            <th width="60">Last Edited By</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        <?php if ($data != null) : $i=0;?>
                                            <?php foreach($data as $row) : $i++;?>
                                            <tr data-id="<?php echo $row['id'];?>">
                                                <td><?php echo $i;?></td>
                                                <td><?php echo $row['month'];?></td>
                                                <td><?= $currency ?> 
                                                    <span class="editable-number" data-type="number" 
                                                        data-params="{old_value : '<?php echo $row['target'];?>'}" 
                                                        data-name="value" data-pk="<?php echo $row['id'];?>" 
                                                        data-url="<?php echo $baseUrl; ?>/monthly-target/editable" data-placement="right" data-placeholder="Required" 
                                                        data-original-title="Enter Value"><?php echo trim($row['target']);?></span>
                                                </td>
                                                <td class="edited-on"><?php echo date('D, jS M, Y', strtotime($row['last_edited_on']));?></td>
                                                <td class="edited-by"><?php echo $row['name'];?></td>
                                            </tr>
                                            <?php endforeach; ?>
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