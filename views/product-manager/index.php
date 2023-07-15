<?php
/* @var $this yii\web\View */
$baseUrl = Yii::$app->request->baseUrl;
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

$this->registerJsFile($baseUrl . '/assets/plugins/switchery/switchery.min.js');
$this->registerJsFile($baseUrl . '/assets/plugins/components/switchery.min.js');

$this->registerJsFile($baseUrl . '/assets/plugins/icheck/icheck.min.js');
$this->registerJsFile($baseUrl . '/assets/plugins/components/icheck.min.js');

$this->registerCssFile($baseUrl . '/assets/plugins/icheck/icheck.min081a.css?v2.0.0');

$this->registerJsFile($baseUrl . '/assets/software/product.js');

$this->title = Yii::$app->params['system'] . ' | Products';
?>

<div class="page-header padding-bottom-0">
    <h1 class="page-title">Products Manager</h1>
    <div class="clearfix"></div>
</div>
<div class="page-content padding-30 padding-top-15 container-fluid">
    <div class="row">
        <?php
            $temp = explode(":",Yii::$app->session['fiscal_year']);
            $starting_fiscal_year_from_date = $temp[0];
            $starting_fiscal_year_to_date   = $temp[1];

            if ((date('Y-m-d') >= $starting_fiscal_year_from_date) 
                    && ( date('Y-m-d') < date('Y-m-d', strtotime($starting_fiscal_year_to_date. ' + 11 days'))) )
            {
        ?>
            <div class=" col-sm-12 col-xlg-4 col-lg-4 col-md-6">
                <div class="panel">
                    <div class="panel-body container-fluid">
                        <form action="<?php echo $baseUrl;?>/product-manager/add" name="newProduct" data-tablename="product" method="post" class="form-horizontal add-product">
                            <input type="hidden" name="<?php echo Yii::$app->request->csrfParam; ?>" value="<?php echo Yii::$app->request->csrfToken; ?>" />

                            <div class="row">
                                <div class="col-sm-12 col-lg-12 col-md-12">
                                    <div class="form-group">
                                        <label class="control-label" for="item-name">Product Name</label>
                                        <input name="name" type="text" class="form-control" id="item-name" placeholder="Enter Item Name">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12 col-lg-12 col-md-12">
                                    <div class="form-group">
                                        <label class="control-label" for="category">Category</label>
                                        <select name="category" class="form-control">
                                            <option value="">Select a Category</option>
                                            <?php if($categories != null): ?>
                                                <?php foreach ($categories as $category): ?>
                                                    <option value="<?php echo $category['id']; ?>"><?php echo $category['category']; ?></option>
                                                <?php endforeach; ?>
                                            <?php endif; ?>
                                        </select>
                                    </div>
                                </div>  
                            </div>
                            <div class="row">
                                <div class="col-sm-12 col-lg-12 col-md-12">
                                    <div class="form-group">
                                        <label class="control-label" for="inputBasicFirstName">Opening Stock</label>
                                        <input name="quantity" type="number" class="form-control" id="opening-stock" placeholder="Enter Quantity" min="0">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label">Quantity Type</label>
                                <div>
                                    <div class="radio-custom radio-default radio-inline">
                                        <input type="radio" id="radio1" name="quantity_type" value="<?php echo Yii::$app->params['stock_item_quantity_type']['ml']; ?>" checked>
                                        <label for="radio1">in ML</label>
                                    </div>

                                    <div class="radio-custom radio-default radio-inline">
                                        <input type="radio" id="radio2" name="quantity_type" value="<?php echo Yii::$app->params['stock_item_quantity_type']['piece']; ?>">
                                        <label for="radio2">in Piece</label>
                                    </div>

                                    <div class="radio-custom radio-default radio-inline">
                                        <input type="radio" id="radio3" name="quantity_type" value="<?php echo Yii::$app->params['stock_item_quantity_type']['gram']; ?>">
                                        <label for="radio3">in Gram</label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-12 col-lg-12 col-md-12">
                                    <label for="is-active">Active</label>
                                    <input type="checkbox" id="is-active" name="is_active" data-plugin="switchery" data-color="#62a8ea" value="1" checked />
                                </div>
                            </div>

                            <div class="row row-lg">
                                <div class="col-sm-12 col-lg-12">
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-sm btn-icon btn-success pull-right btn-submit-product" data-toggle="tooltip" data-original-title="Save" data-placement="left" data-loading-text="Sending...">
                                            <i class="icon fa-save" aria-hidden="true"></i> Save
                                        </button> 
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>                
                </div>
            </div>
        <?php } ?>

        <div class="col-sm-12 col-xlg-8 col-lg-8 col-md-6">
            <div class="panel">
                <div class="panel-body container-fluid">
                    <div class="row row-lg">
                        <div class="col-sm-12 col-lg-12 col-md-12">
                            <div class="table-parent">
                                <table class="table table-hover table-striped width-full dtr-inline dataTable with-editable" >
                                    <thead>
                                        <tr>
                                            <th width="27">#</th>
                                            <th width="100">Name</th>
                                            <th width="100">Category</th>
                                            <th width="100">Opening Stock</th>
                                            <th width="150">Quantity Type</th>
                                            <th width="60">Status</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th width="27">#</th>
                                            <th width="100">Name</th>
                                            <th width="100">Category</th>
                                            <th width="100">Opening Stock</th>
                                            <th width="150">Quantity Type</th>
                                            <th width="60">Status</th>
                                        </tr>
                                    </tfoot>
                                    <tbody class="show-products">     
                                        <?php if($stock_items != null) : $i = 0; ?>
                                            <?php
                                                $temp = explode(":",Yii::$app->session['fiscal_year']);
                                                $starting_fiscal_year_from_date = $temp[0];
                                                $starting_fiscal_year_to_date   = $temp[1];

                                                if ((date('Y-m-d') >= $starting_fiscal_year_from_date) 
                                                        && ( date('Y-m-d') < date('Y-m-d', strtotime($starting_fiscal_year_to_date. ' + 11 days'))) )
                                                {
                                            ?>
                                                <?php foreach($stock_items as $stock_item) : ?>
                                                    <tr data-id="<?php echo $stock_item['id'];?>">
                                                        <td><?php echo ++$i;?></td>
                                                        <td>
                                                            <span class="editable-text" data-type="text" 
                                                                data-params="{old_value : '<?php echo $stock_item['name'];?>'}" 
                                                                data-name="name" data-pk="<?php echo $stock_item['id'];?>" 
                                                                data-url="<?php echo $baseUrl; ?>/product-manager/editable" data-placement="top" data-placeholder="Required" 
                                                                data-original-title="Enter Item name">
                                                                <?php echo ucwords($stock_item['name']);?>
                                                            </span>
                                                        </td>
                                                        <td>
                                                            <?php echo $stock_item['category_name']; ?>
                                                        </td>
                                                        <td>
                                                            <?php echo $stock_item['quantity'];?>
                                                        </td>
                                                        <td>
                                                            <?php echo Yii::$app->params['stock_item_quantity_type_show'][$stock_item['quantity_type']]; ?>
                                                        </td>
                                                        <td>
                                                            <span class="editable-select-active" data-type="select" data-value="<?php echo $stock_item['is_active']; ?>"
                                                                data-params="{old_value : '<?php echo $stock_item['is_active'];?>'}" 
                                                                data-name="is_active" data-pk="<?php echo $stock_item['id'];?>" 
                                                                data-url="<?php echo $baseUrl; ?>/product-manager/editable" data-placement="top" data-placeholder="Required" 
                                                                data-original-title="Select Status" data-source="[{value: 1, text: 'Active'},{value: 0, text: 'Inactive'}]">
                                                            </span>
                                                        </td>
                                                    </tr>
                                                <?php endforeach; ?>
                                            <?php 
                                                }
                                                else { ?>
                                                <?php foreach($stock_items as $stock_item) : ?>
                                                    <tr data-id="<?php echo $stock_item['id'];?>">
                                                        <td><?php echo ++$i;?></td>
                                                        <td>
                                                            <?php echo ucwords($stock_item['name']);?>
                                                        </td>
                                                        <td>
                                                            <?php echo $stock_item['category_name']; ?>
                                                        </td>
                                                        <td>
                                                                <?php echo $stock_item['quantity'];?>
                                                            </span>
                                                        </td>
                                                        <td>
                                                            <?php echo Yii::$app->params['stock_item_quantity_type_show'][$stock_item['quantity_type']]; ?>
                                                        </td>
                                                        <td>
                                                            <?php echo ($stock_item['is_active'] == 1) ? 'Active' : 'Inactive';?>
                                                        </td>
                                                    </tr>
                                                <?php endforeach; ?>
                                            <?php 
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
    <div class="clearfix"></div>
</div>

<script>
    var baseUrl = '<?php echo $baseUrl; ?>';
    var stock_item_quantity_type = <?php echo json_encode(Yii::$app->params['stock_item_quantity_type_show']); ?>
</script>
