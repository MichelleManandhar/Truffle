<?php
/* @var $this yii\web\View */
$baseUrl = Yii::$app->request->baseUrl;

$this->registerJsFile($baseUrl . '/assets/plugins/fileinput/fileinput.js');
$this->registerCssFile($baseUrl . '/assets/plugins/fileinput/fileinput.css');

$this->registerJsFile($baseUrl . '/assets/software/menu-upload.js');

$this->title = Yii::$app->params['system'] . ' | Upload Menu Item';
?>

<div class="page-content padding-30 padding-top-15 container-fluid">

    <form action="<?php echo $baseUrl;?>/menu-item/add-uploaded-menu" name="newMenuItem" data-tablename="menu-item" method="post" class="form-horizontal menu-item">

        <input type="hidden" name="<?php echo Yii::$app->request->csrfParam; ?>" value="<?php echo Yii::$app->request->csrfToken; ?>" />

        <div class="row margin-bottom-10">
            <div class="col-md-12">
                <span class="pull-right">
                    <button type="submit" class="btn btn-icon btn-success btn-round btn-big" data-toggle="tooltip" data-original-title="Save" data-placement="left">
                        <i class="icon fa-save" aria-hidden="true"></i>
                    </button>
                </span> 
            </div>
        </div>

        <div class="row">

            <div class="col-sm-8 col-xlg-8 col-lg-8 col-md-8">
                <div class="panel">
                    <div class="panel-heading">
                        <h3 class="panel-title">Upload Excel File Here (<b>Menu Item</b>)</h3>
                    </div>
                    <div class="panel-body container-fluid">
                        <div class="row row-lg">
                            <div class="col-sm-12 col-lg-12 col-md-12 excel-parent">
                                <input type="file" name="excel_file" class="excel-upload">
                                <input type="hidden" name="excel" class="excel-file-val">
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-sm-4 col-xlg-4 col-lg-4 col-md-4">
                <div class="panel">
                    <div class="panel-body container-fluid">
                        <div class="row row-lg">
                            <div class="col-sm-12 col-lg-12 col-md-12">
                                <span class="bg-blue-grey-600 font-size-16">
                                    <p>    
                                        Sample of menu item database format. Please do not change the format of the file.
                                        The menu items should be filled category wise. Each spread sheet contains the menu items of a specific category. The name of each sheet should be exactly same as the name of the category that are saved before.
                                    </p>

                                    <p>    
                                        Please download this file first if you do not have the correct formatted excel file for menu items
                                    </p>
                                </span>
                                <span class="pull-right margin-right-10 margin-top-20">
                                    <a href="<?php echo Yii::$app->params['upload_load_path']['upload'].'menu-item-database.xlsx' ?>" type="button" class="btn btn-labeled social-facebook" data-toggle="tooltip" data-original-title="Download Here" data-placement="left" download>
                                        <span class="btn-label"><i class="icon fa-download" aria-hidden="true"></i></span>Download Sample file
                                    </a>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

        <div class="row">
            <div class="col-sm-12 col-xlg-12 col-lg-12 col-md-12 show-menu-items">
            
            </div>
        </div>

    </form>

    <div class="clearfix"></div>
</div>