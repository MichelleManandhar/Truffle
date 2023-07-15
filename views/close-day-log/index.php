<?php
$baseUrl = Yii::$app->request->baseUrl;
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
$this->title = Yii::$app->params['system'] . ' | Close Day Log';
?>

<div class="page-header padding-bottom-0">
    <h1 class="page-title">Close Day Log</h1>
    <div class="clearfix"></div>
</div>

<div class="page-content padding-30 container-fluid">

    <div class="panel">                    
        <div class="panel-body">
            <div class="row row-lg">
                <div class="col-sm-12 col-lg-12 col-md-12">
                    <div class="table-parent">
                        <table class="table table-hover dataTable table-striped width-full with-export dtr-inline">
                            <thead>
                                <tr>
                                    <th width="27">#</th>
                                    <th width="50">Logged Date</th>
                                    <th width="50">Created By</th>
                                </tr>
                            </thead>
                            
                            <tbody>
                                <?php 
                                if($log != null) : $i=0; 
                                    foreach ($log as $l) : $i++; ?>
                                    <tr>
                                        <th width="27"><?php echo $i; ?></th>
                                        <th width="50"><?php echo $l['log_date']; ?></th>
                                        <th width="50"><?php echo $l['name']; ?></th>
                                    </tr>
                                <?php endforeach; endif; ?>
                            </tbody>

                            <tfoot>
                                <tr>
                                    <th width="27">#</th>
                                    <th width="50">Logged Date</th>
                                    <th width="50">Created By</th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>  
    </div>
</div>