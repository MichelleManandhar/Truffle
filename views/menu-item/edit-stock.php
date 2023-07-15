<?php
/* @var $this yii\web\View */
$baseUrl = Yii::$app->request->baseUrl;
$this->registerJsFile($baseUrl . '/assets/plugins/switchery/switchery.min.js');
$this->registerJsFile($baseUrl . '/assets/plugins/components/switchery.min.js');

$this->registerJsFile($baseUrl . '/assets/plugins/slick-carousel/slick.min.js');
$this->registerCssFile($baseUrl . '/assets/plugins/slick-carousel/slick.min081a.css');
$this->registerJsFile($baseUrl . '/assets/plugins/slick-carousel/carousel.min.js');
$this->registerJsFile($baseUrl . '/assets/plugins/typeahead-js/bootstrap3-typeahead.min.js');

$this->registerJsFile($baseUrl . '/assets/software/menu-item-select.js');
$this->registerJsFile($baseUrl . '/assets/software/stock-edit.js');
$this->registerJsFile($baseUrl . '/assets/software/product-auto-list.js');
$this->registerJsFile($baseUrl . '/assets/js/users.min.js');

$this->title = Yii::$app->params['system'] . ' | Menu Item';
?>
<form action="<?php echo $baseUrl;?>/menu-item/stock-edit" name="editstockItem" data-tablename="edit-menu-item-form" method="post" class="form-horizontal edit-menu-item-form">
    <input type="hidden" name="<?php echo Yii::$app->request->csrfParam; ?>" value="<?php echo Yii::$app->request->csrfToken; ?>" />
    <input type="hidden" name="id" class="hidden-item-id" value="<?php echo $item['id'];?>">
    <div class="page-header padding-bottom-0">
        <h1 class="page-title">Edit stock</h1>
        <div class="page-header-actions margin-top-10">
            <button type="submit" class="btn btn-icon btn-success btn-round btn-big pull-right" data-toggle="tooltip" data-original-title="Save" data-placement="left">
            <i class="icon fa-save" aria-hidden="true"></i>
            </button>
        </div>
        <div class="clearfix"></div>
    </div>
    <div class="page-content padding-30 padding-top-15 container-fluid">
        <div class="row">
            <div class=" col-sm-12 col-xlg-6 col-lg-6 col-md-6">
                <div class="panel">
                    <div class="panel-body container-fluid">
                        <div class="row row-lg">
                            <div class="col-sm-12 col-lg-12">
                                <div class="form-group">
                                    <h5>Item Name</h5>
                                    <input name="name" type="text" class="form-control" placeholder="Enter Item Name" value="<?php echo $item['name'];?>">
                                </div>
                            </div>
                        </div>
                        <div class="row row-lg">
                            <div class="col-sm-12 col-lg-12">
                                <div class="form-group">
                                    <h5>Category</h5>
                                    <input type="hidden" name="category_id" value="<?php echo $item['category_id'];?>">
                                    <?php echo ucwords($item['category']); ?>
                                </div>
                            </div>
                        </div>
                        <div class="row row-lg">
                            <div class="col-sm-12 col-lg-12">
                                <div class="form-group">
                                    <h5>Item Price (Rs)</h5>
                                    <input name="price" type="text" class="form-control" placeholder="Enter Item Price" value="<?php echo $item['price'];?>">
                                </div>
                            </div>
                        </div>
                        <div class="row row-lg">
                            <div class="col-sm-12 col-lg-12">
                                <div class="form-group">
                                    <h5>Description</h5>
                                    <textarea name="description" class="form-control" rows="5" placeholder="Enter Item Description"><?php echo $item['description'];?></textarea>
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
                                        <input type="checkbox" data-plugin="switchery" data-color="#62a8ea" name="is_active" value="1" <?php echo ($item['is_active'] == 1) ? 'checked' : ''; ?> />
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
                                        <input type="checkbox" data-plugin="switchery" data-color="#62a8ea" name="is_discountable" value="<?php echo Yii::$app->params['is_discountable']['yes']?>" <?php echo ($item['is_discountable'] == Yii::$app->params['is_discountable']['yes']) ? 'checked' : ''; ?> />
                                    </div>
                                    <div class="clearfix"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class=" col-sm-12 col-xlg-6 col-lg-6 col-md-6 container-ingredient">
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
                                    <?php if($recepie != null): $i=0;
                                    foreach($recepie as $receipt): $i++
                                    ?>
                                    <div class="form-horizontal selected-item-list" data-id="<?php echo $receipt['id'];?>">
                                        <div class="form-group">
                                            <label for="quantity_type" class="col-lg-4 col-md-4 col-sm-4 control-label"><?php echo ucwords($receipt['name']);?></label>
                                             <input type="hidden" name="ingredient[<?php echo $i;?>][id]" value="<?php echo $receipt['id'];?>">
                                            <div class="col-lg-5 col-md-5 col-sm-5">
                                                <div class="input-group">
                                                    <input type="text" class="form-control round stock-quantity" placeholder="Quantity" value="<?php echo $receipt['used_quantity'];?>" name="ingredient[<?php echo $i;?>][quantity]">
                                                    <span class="input-group-addon">
                                                        <?php
                                                        echo Yii::$app->params['stock_item_quantity_type_show'][$receipt['quantity_type']];
                                                        ?>
                                                    </span>
                                                </div>
                                            </div>
                                            <div class="col-md-3 col-sm-3 col-lg-3 ">
                                                <button class=" btn btn-round btn-danger icon fa-remove remove-item-button" type="button"></button>
                                            </div>
                                        </div>
                                    </div>
                                    <?php endforeach; endif;?>
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
                        <!-- <table class="table table-hover dataTable table-striped no-tools product-list"> -->
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
var category_type_stock = <?php echo Yii::$app->params['category_type']['stock']; ?>;
</script>