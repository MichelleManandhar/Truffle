<?php
/* @var $this yii\web\View */
$baseUrl = Yii::$app->request->baseUrl;
$this->registerJsFile($baseUrl . '/assets/plugins/switchery/switchery.min.js');
$this->registerJsFile($baseUrl . '/assets/plugins/components/switchery.min.js');

$this->registerJsFile($baseUrl . '/assets/plugins/bootstrap-select/bootstrap-select.min.js');
$this->registerCssFile($baseUrl . '/assets/plugins/bootstrap-select/bootstrap-select.min081a.css');

$this->registerJsFile($baseUrl . '/assets/plugins/slick-carousel/slick.min.js');
$this->registerCssFile($baseUrl . '/assets/plugins/slick-carousel/slick.min081a.css');
$this->registerJsFile($baseUrl . '/assets/plugins/slick-carousel/carousel.min.js');
$this->registerJsFile($baseUrl . '/assets/plugins/typeahead-js/bootstrap3-typeahead.min.js');

$this->registerJsFile($baseUrl . '/assets/plugins/fileinput/fileinput.js');
$this->registerCssFile($baseUrl . '/assets/plugins/fileinput/fileinput.css');

$this->registerJsFile($baseUrl . '/assets/software/menu-item-select.js');
$this->registerJsFile($baseUrl . '/assets/software/menu-item.js');
$this->registerJsFile($baseUrl . '/assets/js/users.min.js');

$this->registerJsFile($baseUrl . '/assets/software/product-auto-list.js');

$this->title = Yii::$app->params['system'] . ' | Menu Item';
?>

<form action="<?php echo $baseUrl;?>/menu-item/add" name="newMenuItem" data-tablename="menu-item" method="post" class="form-horizontal menu-item">
<input type="hidden" name="<?php echo Yii::$app->request->csrfParam; ?>" value="<?php echo Yii::$app->request->csrfToken; ?>" />

<div class="page-header padding-bottom-0">
    <h1 class="page-title">Create New Menu Item</h1>
    <div class="page-header-actions margin-top-10">
        <button type="submit" class="btn btn-icon btn-success btn-round btn-big pull-right" data-toggle="tooltip" data-original-title="Save" data-placement="left">
            <i class="icon fa-save" aria-hidden="true"></i>
        </button>    
    </div>
    <div class="clearfix"></div>
</div>
<div class="page-content padding-30 padding-top-15 container-fluid">
    <div class="row">
        <div class=" col-sm-12 col-xlg-4 col-lg-4 col-md-6">
            <div class="panel">
                <div class="panel-body container-fluid">
                    <div class="row row-lg">
                        <div class="col-sm-12 col-lg-12">
                            <div class="form-group">
                                <h5>Item Name</h5>
                                <input name="name" type="text" class="form-control" placeholder="Enter Item Name">
                            </div>
                        </div>
                    </div>
                    <div class="row row-lg">
                        <div class="col-sm-12 col-lg-12">
                            <div class="form-group">
                                <h5>Category</h5>
                                <select name="category_id" class="form-control select-category">
                                    <option value="">Select a Category</option>
                                    <?php if($categories != null):
                                        foreach ($categories as $category): ?>
                                            <option data-category-type="<?php echo $category['type']; ?>" value="<?php echo $category['id']; ?>"><?php echo $category['category']; ?></option>
                                    <?php endforeach; endif; ?>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row row-lg">
                        <div class="col-sm-12 col-lg-12">
                            <div class="form-group">
                                <h5>Item Price (Rs)</h5>
                                <input name="price" type="text" class="form-control" placeholder="Enter Item Price">
                            </div>
                        </div>
                    </div>
                    <div class="row row-lg">
                        <div class="col-sm-12 col-lg-12">
                            <div class="form-group">
                                <h5>Description</h5>
                                <textarea name="description" class="form-control" rows="5" placeholder="Enter Item Description"></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="row row-lg">
                        <div class="col-sm-12 col-md-6 col-lg-6">
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

                        <div class="col-sm-12 col-md-6 col-lg-6">
                            <div class="form-group">
                                <div class="col-sm-6">
                                    <label for="" class="">Discountable</label>
                                </div>
                                <div class="col-sm-6">
                                    <input type="checkbox" class="" name="is_discountable" data-plugin="switchery" data-color="#62a8ea" value="<?= Yii::$app->params['is_discountable']['yes']?> " checked />
                                </div>
                                <div class="clearfix"></div>
                            </div>
                        </div>
                    </div>
                </div>                
            </div>
        </div>
        <div class="col-sm-12 col-xlg-4 col-lg-4 col-md-6 custom-col">
            <div class="panel">
                <div class="panel-heading">
                    <h3 class="panel-title">Upload Image <small class="theme-color">(file size must been less that 5MB)</small> </h3>
                </div>
                <div class="panel-body container-fluid">
                    <div class="row row-lg">
                        <div class="col-sm-12 col-lg-12 col-md-12 image-parent">
                            <input type="file" name="image_file" class="image-upload" accept="image/*" multiple>
                            <input type="hidden" name="image" class="image-val">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class=" col-sm-12 col-xlg-4 col-lg-4 col-md-6 container-ingredient">
            <div class="panel">
                <div class="panel-body container-fluid">
                    <div class="form-group product-name">        
                        <div class="input-group auto-parent">
                            <input type="text" placeholder="Select Product Item To Be Used" class="form-control product-txt sub-input-group auto-show" data-placement="left" data-toggle="tooltip" data-original-title="Select Product Item To Be Used" autocomplete="off">

                            <span class="input-group-btn">
                                <a class="btn btn-primary btn-auto-list show-product-list-btn"><i class="icon fa-question" ></i></a>
                            </span>
                        </div>

                        <div class="margin-top-30">
                            <div class="selected-product-items scroll-height-350 slimscrollstart-position">
                            </div>
                        </div>
                    </div>
                </div>                
            </div>
        </div>
    </div>
    <div class="clearfix"></div>
</div>
</form>

<!-- modal -->
    <div class="modal modal-aside fade horizontal right modal-product-list" aria-hidden="false" role="dialog" tabindex="-1">
        <div class="modal-dialog modal-md">
            <div class="modal-content">
                <div class="modal-header theme-bg-color">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                    <h4 class="modal-title color-white">Product lists</h4>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-sm-12 col-lg-12 col-md-12">
                            <table class="table table-hover table-striped product-list">
                                <thead>
                                    <tr>
                                        <th width="15">#</th>
                                        <th width="100">Product Name</th>
                                        <th width="100">Quantity Type</th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th width="15">#</th>
                                        <th width="100">Product Name</th>
                                        <th width="100">Quantity Type</th>
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
    var stock_item_quantity_type = <?php echo json_encode(Yii::$app->params['stock_item_quantity_type_show']); ?>;
    /*var category_type_stock = <?php echo Yii::$app->params['category_type']['stock']; ?>;*/
</script>