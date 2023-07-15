<?php
/* @var $this yii\web\View */
$baseUrl = Yii::$app->request->baseUrl;
$this->title = Yii::$app->params['system'] . ' | Item Details';

$this->registerJsFile($baseUrl . '/assets/plugins/slick-carousel/slick.min.js');
$this->registerCssFile($baseUrl . '/assets/plugins/slick-carousel/slick.min081a.css');
$this->registerJsFile($baseUrl . '/assets/plugins/slick-carousel/carousel.min.js');

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

?>
<div class="page-header padding-bottom-0">
    <h1 class="page-title">Item Details</h1>
    <div class="clearfix"></div>
</div>
<div class="page-content padding-30 padding-top-15 container-fluid">
    <div class="row">
        <div class=" col-sm-12 col-xlg-4 col-lg-4 col-md-4">
            <div class="panel">
                <div class="panel-body container-fluid">
                    <div class="row row-lg">
                        <div class="col-sm-12 col-lg-12">
                            <div class="form-group">
                                <h5>Item Name</h5>
                                <?php echo $item['name'];?>
                            </div>
                        </div>
                    </div>
                    <div class="row row-lg">
                        <div class="col-sm-12 col-lg-12">
                            <div class="form-group">
                                <h5>Category</h5>
                                <?php echo ucwords($item['category']); ?>
                            </div>
                        </div>
                    </div>
                    <div class="row row-lg">
                        <div class="col-sm-12 col-lg-12">
                            <div class="form-group">
                                <h5>Item Price (Rs)</h5>
                                <?php echo $item['price'];?>
                            </div>
                        </div>
                    </div>
                    <div class="row row-lg">
                        <div class="col-sm-12 col-lg-12">
                            <div class="form-group">
                                <h5>Description</h5>
                                <?php echo $item['description'];?>
                            </div>
                        </div>
                    </div>
                    <div class="row row-lg">
                        <div class="col-sm-12 col-lg-12">
                            <div class="form-group">
                                <h5>Status</h5>
                                <?php if ($item['is_active'] == 1): ?>
                                <span class="label label-success">Active</span>
                                <?php else : ?>
                                <span class="label label-danger">Inactive</span>
                                <?php endif; ?>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class=" col-sm-12 col-xlg-4 col-lg-4 col-md-4 container-ingredient">
            <div class="panel">
                <div class="panel-heading">
                    <h3 class="panel-title">Product Items Used</h3>
                </div>
                <div class="panel-body container-fluid">
                    <?php if($recepie != null): ?>
                        <?php foreach ($recepie as $receipt) :?>
                                <div class="row margin-bottom-20">
                                    <div class="col-md-5 col-sm-5 col-lg-5 control-label">
                                        <?php echo ucwords($receipt['name']);?>
                                    </div>
                                    <div class="col-md-5 col-sm-5 col-lg-5 input-group">
                                        <?php echo $receipt['used_quantity'];?>
                                        <?php
                                        echo Yii::$app->params['stock_item_quantity_type_show'][$receipt['quantity_type']];
                                        ?>
                                    </div>
                                </div>
                        <?php endforeach; ?>
                    <?php else:?>
                        <div class="row">
                            <div class="col-sm-12 col-md-12 col-lg-12">
                                No Ingredients Added At The Moment
                            </div>
                        </div>
                    <?php endif;?>
                </div>
            </div>
        </div>
        <div class="col-sm-12 col-xlg-4 col-lg-4 col-md-4 custom-col">
            <div class="panel">
                <div class="panel-heading">
                    <h3 class="panel-title">Image</h3>
                </div>
                <div class="panel-body container-fluid">
                    <div class="row row-lg">
                        <?php if ($item['image'] != '') {
                        if (file_exists(Yii::$app->params['upload_path']['upload'] . $item['image'])) { ?>
                        
                        <img class="img-responsive padding-20" src="<?php echo Yii::$app->params['upload_load_path']['upload'] . $item['image'];?>" alt="<?php echo $item['name'];?>">
                        <?php }else{ ?>
                        <img class="img-responsive padding-20" src="<?php echo Yii::$app->params['upload_load_path']['image'];?>no-image.png" alt="<?php echo $item['name'];?>">
                        <?php }
                        } else { ?>
                        <img class="img-responsive padding-20" src="<?php echo Yii::$app->params['upload_load_path']['image'];?>no-image.png" alt="<?php echo $item['name'];?>">
                        
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="panel">
        <div class="panel-heading">
          <h3 class="panel-title">Price Changed Detail of ' <?php echo $item['name'];?> '</h3>
        </div>

        <div class="panel-body">
            <div class="table-parent">
                <table class="table table-hover width-full dtr-inline dataTable with-export">
                    <thead>
                        <tr>
                          <th>Changed Date</th>
                          <th>Previous Price</th>
                          <th>Changed Price</th>
                          <th>Changed By</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            if($item_price != null) : 
                                foreach($item_price as $row) : ?>

                                    <tr>
                                        <td><?php echo $row['created_on']; ?></td>
                                        <td><?php echo $row['previous_price']; ?></td>
                                        <td><?php echo $row['changed_price']; ?></td>
                                        <td><?php echo $row['username']; ?></td>
                                    </tr>

                        <?php   endforeach; 
                            endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="clearfix"></div>
</div>