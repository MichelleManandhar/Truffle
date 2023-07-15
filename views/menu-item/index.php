<?php
/* @var $this yii\web\View */
$baseUrl = Yii::$app->request->baseUrl;
$temp = explode(":",Yii::$app->session['fiscal_year']);
$starting_fiscal_year_from_date = $temp[0];
$starting_fiscal_year_to_date   = $temp[1];
$currency = strtoupper(Yii::$app->session['currency']);

$this->registerCssFile($baseUrl . '/assets/plugins/x-editable/css/bootstrap-editable.css');
$this->registerJsFile($baseUrl . '/assets/plugins/x-editable/js/bootstrap-editable.min.js');
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

$this->title = Yii::$app->params['system'] . ' | Menu Item';
?>
<div class="page-header padding-bottom-0">
    <h1 class="page-title">Menu Item</h1>
    <div class="page-header-actions margin-top-10">
        <?php
            if ((date('Y-m-d') >= $starting_fiscal_year_from_date) 
                    && ( date('Y-m-d') < date('Y-m-d', strtotime($starting_fiscal_year_to_date. ' + 11 days'))) )
            {
        ?>
            <a href="<?php echo $baseUrl;?>/menu-item/upload-menu-item" class="btn btn-icon btn-primary btn-round btn-big margin-left-100" data-toggle="tooltip" data-original-title="Upload Menu Item" data-placement="left">
                <i class="icon fa-upload" aria-hidden="true"></i>
            </a>
            <a href="<?php echo $baseUrl;?>/menu-item/create" class="btn btn-icon btn-primary btn-round btn-big " data-toggle="tooltip" data-original-title="Create New" data-placement="left">
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
                                <table class="table table-hover table-striped width-full dtr-inline dataTable with-editable" >
                                    <thead>
                                        <tr>
                                            <th width="27">#</th>
                                            <th width="90">Image</th>
                                            <th width="100">Name</th>
                                            <th width="100">Category</th>
                                            <th width="100">Price (<?= $currency ?>)</th>
                                            <th width="150">Description</th>
                                            <th width="60">Status</th>
                                            <th width="60">Discountable</th>
                                            <th width="60">Action</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                    <tr>
                                        <th width="27">#</th>
                                        <th width="90">Image</th>
                                        <th width="100">Name</th>
                                        <th width="100">Category</th>
                                        <th width="100">Price (<?= $currency ?>)</th>
                                        <th width="150">Description</th>
                                        <th width="60">Status</th>
                                        <th width="60">Discountable</th>
                                        <th width="60">Action</th>
                                    </tr>
                                    </tfoot>
                                    <tbody>
                                        <?php if ($items != null) : $i=0;
                                            if ((date('Y-m-d') >= $starting_fiscal_year_from_date) 
                                                    && ( date('Y-m-d') < date('Y-m-d', strtotime($starting_fiscal_year_to_date. ' + 11 days'))) )
                                            {
                                                foreach($items as $item) : ?>
                                                <tr data-id="<?php echo $item['id'];?>">
                                                    <td><?php echo ++$i;?></td>
                                                    <td>
                                                        <a class="inline-block" href="javascript:void(0)" title="<?php echo $item['name'];?>">
                                                            <?php if ($item['image'] != '') {
                                                            if (file_exists(Yii::$app->params['upload_path']['upload'] . $item['image'])) { ?>
                                                            
                                                            <img width="140" class="img-responsive" src="<?php echo Yii::$app->params['upload_load_path']['upload'] . $item['image'];?>" alt="<?php echo $item['name'];?>">
                                                            <?php }else{ ?>
                                                            <img width="140" class="img-responsive" src="<?php echo Yii::$app->params['upload_load_path']['image'];?>no-image.png" alt="<?php echo $item['name'];?>">
                                                            <?php }
                                                            } else { ?>
                                                            <img width="140" class="img-responsive" src="<?php echo Yii::$app->params['upload_load_path']['image'];?>no-image.png" alt="<?php echo $item['name'];?>">
                                                            
                                                            <?php } ?>
                                                        </a>
                                                        <?php
                                                            if ((date('Y-m-d') >= $starting_fiscal_year_from_date) 
                                                                    && ( date('Y-m-d') < date('Y-m-d', strtotime($starting_fiscal_year_to_date. ' + 11 days'))) )
                                                            {
                                                        ?>
                                                            <span>
                                                                <a href="<?php echo $baseUrl;?>/menu-item/update/<?php echo $item['id'];?>" class="no-underline override-lightbox"><i class="icon fa-plus"></i> Change Images</a>
                                                            </span>
                                                        <?php } ?>
                                                    </td>
                                                    <td>
                                                        <span class="editable-text" data-type="text"
                                                            data-params="{old_value : '<?php echo $item['name'];?>'}"
                                                            data-name="name" data-pk="<?php echo $item['id'];?>"
                                                            data-url="<?php echo $baseUrl; ?>/menu-item/editable" data-placement="top" data-placeholder="Required"
                                                            data-original-title="Enter Item name">
                                                            <?php echo ucwords($item['name']);?>
                                                        </span>
                                                    </td>
                                                    <td>
                                                        <span class="editable-select-active" data-type="select" data-value="<?php echo $item['category_id']; ?>"
                                                            data-params="{old_value : '<?php echo $item['category_id'];?>'}"
                                                            data-name="category_id" data-pk="<?php echo $item['id'];?>"
                                                            data-url="<?php echo $baseUrl; ?>/menu-item/editable" data-placement="top" data-placeholder="Required"
                                                            data-original-title="Select Category" data-source='<?php echo json_encode($categories); ?>'>
                                                        </span>
                                                    </td>
                                                    <td>
                                                        <span class="editable-number" data-type="text"
                                                            data-params="{old_value : '<?php echo $item['price'];?>'}"
                                                            data-name="price" data-pk="<?php echo $item['id'];?>"
                                                            data-url="<?php echo $baseUrl; ?>/menu-item/editable" data-placement="top" data-placeholder="Required"
                                                            data-original-title="Enter Item Price">
                                                            <?php echo $item['price'];?>
                                                        </span>
                                                    </td>
                                                    <td>
                                                        <span class="editable-textarea" data-type="textarea"
                                                            data-params="{old_value : '<?php echo $item['description'];?>'}"
                                                            data-name="description" data-pk="<?php echo $item['id'];?>"
                                                            data-url="<?php echo $baseUrl; ?>/menu-item/editable" data-placement="left" data-placeholder="Required"
                                                        data-original-title="Enter Value"><?php echo trim($item['description']);?></span>
                                                    </td>
                                                    <td>
                                                        <span class="editable-select-active" data-type="select" data-value="<?php echo $item['is_active']; ?>"
                                                            data-params="{old_value : '<?php echo $item['is_active'];?>'}"
                                                            data-name="is_active" data-pk="<?php echo $item['id'];?>"
                                                            data-url="<?php echo $baseUrl; ?>/menu-item/editable" data-placement="top" data-placeholder="Required"
                                                            data-original-title="Select Status" data-source="[{value: 1, text: 'Active'},{value: 0, text: 'Inactive'}]">
                                                        </span>
                                                    </td>
                                                    <td>
                                                        <span class="editable-select-active" data-type="select" data-value="<?php echo $item['is_discountable']; ?>"
                                                            data-params="{old_value : '<?php echo $item['is_discountable'];?>'}"
                                                            data-name="is_discountable" data-pk="<?php echo $item['id'];?>"
                                                            data-url="<?php echo $baseUrl; ?>/menu-item/editable" data-placement="top" data-placeholder="Required"
                                                            data-original-title="Select Status" data-source="[{value: 0, text: 'Yes'},{value: 1, text: 'No'}]">
                                                        </span>
                                                    </td>
                                                    <td>
                                                        <div class="table-row-controls">
                                                            <a href="<?php echo $baseUrl . '/menu-item/view-stock/' . $item['id'];?>" class="block">
                                                                <i class="icon fa-eye"></i>
                                                            </a>
                                                            <?php
                                                                if ((date('Y-m-d') >= $starting_fiscal_year_from_date) 
                                                                        && ( date('Y-m-d') < date('Y-m-d', strtotime($starting_fiscal_year_to_date. ' + 11 days'))) )
                                                                {
                                                            ?>
                                                                <a href="<?php echo $baseUrl . '/menu-item/edit-stock/' . $item['id'];?>" class="edit-administrator block">
                                                                    <i class="icon ti-pencil"></i>
                                                                </a>
                                                            <?php } ?>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <?php endforeach;
                                            }else {
                                                foreach($items as $item) : ?>
                                                <tr data-id="<?php echo $item['id'];?>">
                                                    <td><?php echo ++$i;?></td>
                                                    <td>
                                                        <a class="inline-block" href="javascript:void(0)" title="<?php echo $item['name'];?>">
                                                            <?php if ($item['image'] != '') {
                                                            if (file_exists(Yii::$app->params['upload_path']['upload'] . $item['image'])) { ?>
                                                            
                                                            <img width="140" class="img-responsive" src="<?php echo Yii::$app->params['upload_load_path']['upload'] . $item['image'];?>" alt="<?php echo $item['name'];?>">
                                                            <?php }else{ ?>
                                                            <img width="140" class="img-responsive" src="<?php echo Yii::$app->params['upload_load_path']['image'];?>no-image.png" alt="<?php echo $item['name'];?>">
                                                            <?php }
                                                            } else { ?>
                                                            <img width="140" class="img-responsive" src="<?php echo Yii::$app->params['upload_load_path']['image'];?>no-image.png" alt="<?php echo $item['name'];?>">
                                                            
                                                            <?php } ?>
                                                        </a>
                                                    </td>
                                                    <td>
                                                        <?php echo ucwords($item['name']);?>
                                                    </td>
                                                    <td>
                                                        <?php echo $item['category'];?>
                                                    </td>
                                                    <td>
                                                        <?php echo $item['price'];?>
                                                    </td>
                                                    <td>
                                                        <?php echo trim($item['description']);?>
                                                    </td>
                                                    <td>
                                                        <?php echo ($item['is_active'] == 1) ? 'Active' : 'Inactive';?>
                                                    </td>
                                                    <td>
                                                        <?php echo ($item['is_discountable'] == Yii::$app->params['is_discountable']['yes']) ? 'Yes' : 'No';?>
                                                    </td>
                                                    <td>
                                                        <div class="table-row-controls">
                                                            <a href="<?php echo $baseUrl . '/menu-item/view-stock/' . $item['id'];?>" class="block">
                                                                <i class="icon fa-eye"></i>
                                                            </a>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <?php endforeach;
                                            }
                                        endif;?>
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