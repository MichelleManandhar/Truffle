<?php
$baseUrl = Yii::$app->request->baseUrl;
$this->registerJsFile($baseUrl . '/assets/plugins/fileinput/fileinput.js');
$this->registerCssFile($baseUrl . '/assets/plugins/fileinput/fileinput.css');

$this->registerJsFile($baseUrl . '/assets/software/user-profile.js');

$this->title = Yii::$app->params['system'] . ' | Profile Picture';
?>

<form action="<?php echo $baseUrl;?>/user/upload-picture" name="profile-picture" data-tablename="profile" method="post" class="form-horizontal profile-picture">
    <input type="hidden" name="<?php echo Yii::$app->request->csrfParam; ?>" value="<?php echo Yii::$app->request->csrfToken; ?>" />
    <input type="hidden" name="id" value="<?php echo $image['id'];?>" id="profile-id">
    <div class="page-header padding-bottom-0">
        <h1 class="page-title">Change Image for : <?php echo ucwords($image['name']);?></h1>
        <div class="page-header-actions margin-top-10 text-right">
            <button type="submit" class="btn btn-icon btn-success btn-round btn-big " data-toggle="tooltip" data-original-title="Save" data-placement="left">
                <i class="icon fa-save" aria-hidden="true"></i>
            </button>
        </div>
        <div class="clearfix"></div>
    </div>
    <div class="page-content padding-30 padding-top-15 container-fluid">
        <div class="row">
            <div class="col-lg-6 col-sm-6 col-md-4">
                <div class="panel image-parent">
                    <div class="panel-body container-fluid" style="height: 410px;">
                        <div class="row row-lg">
                            <div class="col-sm-12 col-lg-12">
                                <?php if (!empty($image['profile_picture'])) : ?>
                                    <div class="featured-image-wrapper">
                                        <a href="#" class="delete-image btn-image-remove" data-toggle="tooltip" data-original-title="Remove Image" data-placement="top">
                                            <i class="icon fa-close pointer-cursor"></i>
                                        </a>
                                        <div class="cover">
                                            <img class="width-full image-display" src="<?php echo Yii::$app->params['upload_load_path']['profile-picture'] . $image['profile_picture'];?>" style="height: 300px;">
                                        </div>
                                    </div>
                                <?php else : ?>
                                    <div class="avatar avatar-125 margin-bottom-20" style="margin-left: 113px;">
                                        <img src="<?php echo Yii::$app->params['upload_load_path']['image'] . '../images/user-profile-pic.jpg';?>" style="margin-top: 20px;">
                                    </div>
                                    <span class="label label-outline label-danger font-size-15" style="margin-left: 56px;">
                                You have not uploaded image yet!
                                    </span>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-sm-6 col-md-8">
                <div class="panel">
                    <div class="panel-heading">
                        <h3 class="panel-title">Upload Image <small class="theme-color">(file size must been less that 5MB)</small> </h3>
                    </div>
                    <div class="panel-body container-fluid">
                        <div class="row row-lg">
                            <div class="col-sm-12 col-lg-12 col-md-12 image-parent">
                                <input type="file" name="image_file" class="profile-image-upload" accept="image/*" multiple>
                                <input type="hidden" name="image" class="profile-image-val" value="<?php echo $image['profile_picture'];?>">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="clearfix"></div>
    </div>
</form>