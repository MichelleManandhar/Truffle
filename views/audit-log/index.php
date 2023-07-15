<?php
/* @var $this yii\web\View */
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

$this->title = Yii::$app->params['system'] . ' | Audit Log';
?>

<div class="page-header padding-bottom-0">
    <h1 class="page-title">Audit Log</h1>
    <div class="clearfix"></div>
</div>
<div class="page-content padding-30 container-fluid">
    <div class="panel">                    
        <div class="panel-body">
            <div class="nav-tabs-horizontal">
                <ul class="nav nav-tabs list-tab nav-justified" data-plugin="nav-tabs" role="tablist">
                    <li role="presentation" class="active"><a data-toggle="tab" href="#all-log" role="tab"> All </a></li>
                    <li role="presentation"><a data-toggle="tab" href="#user-log" role="tab"> User </a></li>
                    <li role="presentation"><a data-toggle="tab" href="#table-log" role="tab"> Table and Obstacle </a></li>
                    <li role="presentation"><a data-toggle="tab" href="#order-log" role="tab"> Order </a></li>
                    <li role="presentation"><a data-toggle="tab" href="#billing-log" role="tab"> Billing </a></li>
                    <li role="presentation"><a data-toggle="tab" href="#menu-log" role="tab"> Menu </a></li>
                    <li role="presentation"><a data-toggle="tab" href="#stock-log" role="tab"> Stock </a></li>
                    <li role="presentation"><a data-toggle="tab" href="#database-backup" role="tab"> Database Backup </a></li>
                </ul>
                <div class="tab-content margin-top-10">
                    <div class="tab-pane active" id="all-log" role="tabpanel">
                        <div class="row row-lg">
                            <div class="col-sm-12 col-lg-12 col-md-12">
                                <div class="table-parent">
                                    <table class="table table-hover dataTable table-striped width-full with-export dtr-inline">
                                        <thead>
                                            <tr>
                                                <th width="27">#</th>
                                                <th width="50">Action</th>
                                                <th width="50">Type</th>
                                                <th width="50">Created By</th>
                                                <th width="50">Created On</th>
                                            </tr>
                                        </thead>
                                        
                                        <tbody>
                                            <?php 
                                            if($log != null) : $i=0; 
                                                foreach ($log as $l) : $i++; 
                                                    if($l['type'] != 'invoice') : ?>
                                                        <tr>
                                                            <th width="27"><?php echo $i; ?></th>
                                                            <th width="50"><?php echo $l['action']; ?></th>
                                                            <th width="50"><?php echo $l['type']; ?></th>
                                                            <th width="50"><?php echo $l['name']; ?></th>
                                                            <th width="50"><?php echo $l['created_at']; ?></th>
                                                        </tr>
                                            <?php   endif;
                                                endforeach; 
                                            endif; ?>
                                        </tbody>

                                        <tfoot>
                                            <tr>
                                                <th width="27">#</th>
                                                <th width="50">Action</th>
                                                <th width="50">Type</th>
                                                <th width="50">Created By</th>
                                                <th width="50">Created On</th>
                                            </tr>
                                        </tfoot>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="tab-pane" id="user-log" role="tabpanel">
                        <div class="row row-lg">
                            <div class="col-sm-12 col-lg-12 col-md-12">
                                <div class="table-parent">
                                    <table class="table table-hover dataTable table-striped width-full with-export dtr-inline">
                                        <thead>
                                            <tr>
                                                <th width="27">#</th>
                                                <th width="50">Action</th>
                                                <th width="50">Type</th>
                                                <th width="50">Created By</th>
                                                <th width="50">Created On</th>
                                            </tr>
                                        </thead>
                                        
                                        <tbody>
                                            <?php 
                                            if($log != null) : $i=0; 
                                                foreach ($log as $l) : $i++;
                                                    if($l['type'] == 'user') : ?>

                                                        <tr>
                                                            <th width="27"><?php echo $i; ?></th>
                                                            <th width="50"><?php echo $l['action']; ?></th>
                                                            <th width="50"><?php echo $l['type']; ?></th>
                                                            <th width="50"><?php echo $l['name']; ?></th>
                                                            <th width="50"><?php echo $l['created_at']; ?></th>
                                                        </tr>

                                                    <?php endif;
                                                endforeach; 
                                            endif; ?>
                                        </tbody>

                                        <tfoot>
                                            <tr>
                                                <th width="27">#</th>
                                                <th width="50">Action</th>
                                                <th width="50">Type</th>
                                                <th width="50">Created By</th>
                                                <th width="50">Created On</th>
                                            </tr>
                                        </tfoot>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="tab-pane" id="table-log" role="tabpanel">
                        <div class="row row-lg">
                            <div class="col-sm-12 col-lg-12 col-md-12">
                                <div class="table-parent">
                                    <table class="table table-hover dataTable table-striped width-full with-export dtr-inline" >
                                        <thead>
                                            <tr>
                                                <th width="27">#</th>
                                                <th width="50">Action</th>
                                                <th width="50">Type</th>
                                                <th width="50">Created By</th>
                                                <th width="50">Created On</th>
                                            </tr>
                                        </thead>
                                        
                                        <tbody>
                                            <?php 
                                            if($log != null) : $i=0; 
                                                foreach ($log as $l) : $i++;
                                                    if($l['type'] == 'table') : ?>

                                                        <tr>
                                                            <th width="27"><?php echo $i; ?></th>
                                                            <th width="50"><?php echo $l['action']; ?></th>
                                                            <th width="50"><?php echo $l['type']; ?></th>
                                                            <th width="50"><?php echo $l['name']; ?></th>
                                                            <th width="50"><?php echo $l['created_at']; ?></th>
                                                        </tr>

                                                    <?php endif;
                                                endforeach; 
                                            endif; ?>
                                        </tbody>

                                        <tfoot>
                                            <tr>
                                                <th width="27">#</th>
                                                <th width="50">Action</th>
                                                <th width="50">Type</th>
                                                <th width="50">Created By</th>
                                                <th width="50">Created On</th>
                                            </tr>
                                        </tfoot>
                                    </table>
                                </div>
                            </div>
                        </div> 
                    </div>

                    <div class="tab-pane" id="order-log" role="tabpanel">
                        <div class="row row-lg">
                            <div class="col-sm-12 col-lg-12 col-md-12">
                                <div class="table-parent">
                                    <table class="table table-hover dataTable table-striped width-full with-export dtr-inline" >
                                        <thead>
                                            <tr>
                                                <th width="27">#</th>
                                                <th width="50">Action</th>
                                                <th width="50">Type</th>
                                                <th width="50">Created By</th>
                                                <th width="50">Created On</th>
                                            </tr>
                                        </thead>
                                        
                                        <tbody>
                                            <?php 
                                            if($log != null) : $i=0; 
                                                foreach ($log as $l) : $i++;
                                                    if($l['type'] == 'order') : ?>

                                                        <tr>
                                                            <th width="27"><?php echo $i; ?></th>
                                                            <th width="50"><?php echo $l['action']; ?></th>
                                                            <th width="50"><?php echo $l['type']; ?></th>
                                                            <th width="50"><?php echo $l['name']; ?></th>
                                                            <th width="50"><?php echo $l['created_at']; ?></th>
                                                        </tr>

                                                    <?php endif;
                                                endforeach; 
                                            endif; ?>
                                        </tbody>

                                        <tfoot>
                                            <tr>
                                                <th width="27">#</th>
                                                <th width="50">Action</th>
                                                <th width="50">Type</th>
                                                <th width="50">Created By</th>
                                                <th width="50">Created On</th>
                                            </tr>
                                        </tfoot>
                                    </table>
                                </div>
                            </div>
                        </div> 
                    </div>

                    <div class="tab-pane" id="billing-log" role="tabpanel">
                        <div class="row row-lg">
                            <div class="col-sm-12 col-lg-12 col-md-12">
                                <div class="table-parent">
                                    <table class="table table-hover dataTable table-striped width-full with-export dtr-inline" >
                                        <thead>
                                            <tr>
                                                <th width="27">#</th>
                                                <th width="50">Action</th>
                                                <th width="50">Type</th>
                                                <th width="50">Created By</th>
                                                <th width="50">Created On</th>
                                            </tr>
                                        </thead>
                                        
                                        <tbody>
                                            <?php 
                                            if($log != null) : $i=0; 
                                                foreach ($log as $l) : $i++;
                                                    if($l['type'] == 'billing') : ?>

                                                        <tr>
                                                            <th width="27"><?php echo $i; ?></th>
                                                            <th width="50"><?php echo $l['action']; ?></th>
                                                            <th width="50"><?php echo $l['type']; ?></th>
                                                            <th width="50"><?php echo $l['name']; ?></th>
                                                            <th width="50"><?php echo $l['created_at']; ?></th>
                                                        </tr>

                                                    <?php endif;
                                                endforeach; 
                                            endif; ?>
                                        </tbody>

                                        <tfoot>
                                            <tr>
                                                <th width="27">#</th>
                                                <th width="50">Action</th>
                                                <th width="50">Type</th>
                                                <th width="50">Created By</th>
                                                <th width="50">Created On</th>
                                            </tr>
                                        </tfoot>
                                    </table>
                                </div>
                            </div>
                        </div> 
                    </div>

                    <div class="tab-pane" id="menu-log" role="tabpanel">
                        <div class="row row-lg">
                            <div class="col-sm-12 col-lg-12 col-md-12">
                                <div class="table-parent">
                                    <table class="table table-hover dataTable table-striped width-full with-export dtr-inline">
                                        <thead>
                                            <tr>
                                                <th width="27">#</th>
                                                <th width="50">Action</th>
                                                <th width="50">Type</th>
                                                <th width="50">Created By</th>
                                                <th width="50">Created On</th>
                                            </tr>
                                        </thead>
                                        
                                        <tbody>
                                           <?php 
                                            if($log != null) : $i=0; 
                                                foreach ($log as $l) : $i++;
                                                    if($l['type'] == 'menu') : ?>
                                                        <tr>
                                                            <th width="27"><?php echo $i; ?></th>
                                                            <th width="50"><?php echo $l['action']; ?></th>
                                                            <th width="50"><?php echo $l['type']; ?></th>
                                                            <th width="50"><?php echo $l['name']; ?></th>
                                                            <th width="50"><?php echo $l['created_at']; ?></th>
                                                        </tr>

                                                    <?php endif;
                                                endforeach; 
                                            endif; ?>
                                        </tbody>

                                        <tfoot>
                                            <tr>
                                                <th width="27">#</th>
                                                <th width="50">Action</th>
                                                <th width="50">Type</th>
                                                <th width="50">Created By</th>
                                                <th width="50">Created On</th>
                                            </tr>
                                        </tfoot>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="tab-pane" id="stock-log" role="tabpanel">
                        <div class="row row-lg">
                            <div class="col-sm-12 col-lg-12 col-md-12">
                                <div class="table-parent">
                                    <table class="table table-hover dataTable table-striped width-full with-export dtr-inline">
                                        <thead>
                                            <tr>
                                                <th width="27">#</th>
                                                <th width="50">Action</th>
                                                <th width="50">Type</th>
                                                <th width="50">Created By</th>
                                                <th width="50">Created On</th>
                                            </tr>
                                        </thead>
                                        
                                        <tbody>
                                           <?php 
                                            if($log != null) : $i=0; 
                                                foreach ($log as $l) : $i++;
                                                    if($l['type'] == 'stock') : ?>
                                                        <tr>
                                                            <th width="27"><?php echo $i; ?></th>
                                                            <th width="50"><?php echo $l['action']; ?></th>
                                                            <th width="50"><?php echo $l['type']; ?></th>
                                                            <th width="50"><?php echo $l['name']; ?></th>
                                                            <th width="50"><?php echo $l['created_at']; ?></th>
                                                        </tr>

                                                    <?php endif;
                                                endforeach; 
                                            endif; ?>
                                        </tbody>

                                        <tfoot>
                                            <tr>
                                                <th width="27">#</th>
                                                <th width="50">Action</th>
                                                <th width="50">Type</th>
                                                <th width="50">Created By</th>
                                                <th width="50">Created On</th>
                                            </tr>
                                        </tfoot>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="tab-pane" id="database-backup" role="tabpanel">
                        <div class="row row-lg">
                            <div class="col-sm-12 col-lg-12 col-md-12">
                                <div class="table-parent">
                                    <table class="table table-hover dataTable table-striped width-full with-export dtr-inline">
                                        <thead>
                                            <tr>
                                                <th width="27">#</th>
                                                <th width="50">Action</th>
                                                <th width="50">Type</th>
                                                <th width="50">Created By</th>
                                                <th width="50">Created On</th>
                                            </tr>
                                        </thead>
                                        
                                        <tbody>
                                           <?php 
                                            if($log != null) : $i=0; 
                                                foreach ($log as $l) : $i++;
                                                    if($l['type'] == 'database') : ?>
                                                        <tr>
                                                            <th width="27"><?php echo $i; ?></th>
                                                            <th width="50"><?php echo $l['action']; ?></th>
                                                            <th width="50"><?php echo $l['type']; ?></th>
                                                            <th width="50"><?php echo $l['name']; ?></th>
                                                            <th width="50"><?php echo $l['created_at']; ?></th>
                                                        </tr>

                                                    <?php endif;
                                                endforeach; 
                                            endif; ?>
                                        </tbody>

                                        <tfoot>
                                            <tr>
                                                <th width="27">#</th>
                                                <th width="50">Action</th>
                                                <th width="50">Type</th>
                                                <th width="50">Created By</th>
                                                <th width="50">Created On</th>
                                            </tr>
                                        </tfoot>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>  
    </div>
</div>