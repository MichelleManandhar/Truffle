<?php
/* @var $this yii\web\View */
$baseUrl = Yii::$app->request->baseUrl;
$this->registerJsFile($baseUrl . '/assets/plugins/fileinput/fileinput.js');
$this->registerCssFile($baseUrl . '/assets/plugins/fileinput/fileinput.css');

$this->registerJsFile($baseUrl . '/assets/software/menu-item.js');

$this->title = Yii::$app->params['system'] . ' | Menu Item';
?>

<form action="<?php echo $baseUrl;?>/menu-item/edit-image" name="newMenuItem" data-tablename="menu-item" method="post" class="form-horizontal menu-item-edit-image">
<input type="hidden" name="<?php echo Yii::$app->request->csrfParam; ?>" value="<?php echo Yii::$app->request->csrfToken; ?>" />
<input type="hidden" name="id" value="<?php echo $item['id'];?>" id="menu-item-id">
<div class="page-header padding-bottom-0">
    <h1 class="page-title">Change Image for : <?php echo ucwords($item['name']);?></h1>
    <div class="page-header-actions margin-top-10">
        <button type="submit" class="btn btn-icon btn-success btn-round btn-big " data-toggle="tooltip" data-original-title="Save" data-placement="left">
            <i class="icon fa-save" aria-hidden="true"></i>
        </button>         
        <!-- <a href="<?php echo $baseUrl;?>/menu-item/" class="btn btn-icon btn-warning btn-round btn-big " data-toggle="tooltip" data-original-title="Go Back" data-placement="left">
            <i class="icon fa-arrow-left" aria-hidden="true"></i>
        </a> -->
    </div>
    <div class="clearfix"></div>
</div>
<div class="page-content padding-30 padding-top-15 container-fluid">
    <div class="row">
        <div class="col-sm-12 col-md-4">
            <div class="panel image-parent">
                <div class="panel-body container-fluid">
                    <div class="row row-lg">
                        <div class="col-sm-12 col-lg-12">
                        <?php if (!empty($item['image']) && file_exists(Yii::$app->params['upload_path']['upload'] . $item['image'])) : ?>
                            <div class="featured-image-wrapper">
                                <a href="#" class="menu-item-delete-image btn-image-remove" data-toggle="tooltip" data-original-title="Remove Image" data-placement="top">
                                    <i class="icon fa-close pointer-cursor"></i>
                                </a>
                                <div class="cover">
                                    <img class="width-full image-display" src="<?php echo Yii::$app->params['upload_load_path']['upload'] . $item['image'];?>">
                                </div>
                            </div>
                        <?php else : ?>
                            <span class="label label-outline label-danger font-size-15">
                                You have not uploaded image yet!
                            </span>
                        <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-12 col-md-8">
            <div class="panel">
                <div class="panel-heading">
                    <h3 class="panel-title">Upload Image <small class="theme-color">(file size must been less that 5MB)</small> </h3>
                </div>
                <div class="panel-body container-fluid">
                    <div class="row row-lg">
                        <div class="col-sm-12 col-lg-12 col-md-12 image-parent">
                            <input type="file" name="image_file" class="image-upload" accept="image/*" multiple>
                            <input type="hidden" name="image" class="image-val" value="<?php echo $item['image'];?>">             
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="clearfix"></div>
</div>
</form>