<?php
/* @var $this yii\web\View */
$baseUrl = Yii::$app->request->baseUrl;
$this->registerJsFile($baseUrl . '/assets/js/jquery.old.min.js');
$this->registerJsFile($baseUrl . '/assets/js/jquery.ui.min.js');
$this->registerJsFile($baseUrl . '/assets/js/jquery.ui.touch-punch.min.js');

$this->registerJsFile($baseUrl . '/assets/software/sorting.js');

$this->title = Yii::$app->params['system'] . ' | Menu Item';
?>

<div class="page-header padding-bottom-0">
    <h1 class="page-title">Manage Dispaly Order : <span id="sorting-msg"></span></h1>
    <div class="page-header-actions margin-top-10">
        <a href="<?php echo $baseUrl;?>/menu-item/create" class="btn btn-icon btn-primary btn-round btn-big " data-toggle="tooltip" data-original-title="Create New" data-placement="left">
            <i class="icon wb-plus" aria-hidden="true"></i>
        </a>          
        <!-- <a href="<?php echo $baseUrl;?>/menu-item/" class="btn btn-icon btn-warning btn-round btn-big " data-toggle="tooltip" data-original-title="Go Back" data-placement="left">
            <i class="icon fa-arrow-left" aria-hidden="true"></i>
        </a> -->
    </div>
    <div class="clearfix"></div>
</div>
<div class="page-content padding-30 padding-top-15 container-fluid">
    <div class="row">
        <div class="col-sm-12 col-xlg-6 col-lg-6 col-md-6">
            <div class="panel">
                <div class="panel-body container-fluid">
                    <div class="row row-lg">
                        <div class="col-sm-12 col-lg-12 col-md-12">
                            <ul id="sortable" class="ui-sortable list-group list-group-gap" data-url="<?php echo $baseUrl;?>/menu-item/manage-order">
                                <?php if ($items != null) :
                                        foreach($items as $item) : ?>
                                    <li class="list-group-item bg-blue-grey-100 margin-top-5 pointer" id="item-<?php echo $item['id'];?>">
                                        <i class="icon fa-ellipsis-v margin-top-5" aria-hidden="true"></i>
                                        <span><?php echo ucwords($item['name']);?></span>
                                        <i class="icon wb-sort-vertical pull-right margin-top-5" aria-hidden="true"></i>
                                    </li>
                                    <?php endforeach; 
                                    endif;?>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="clearfix"></div>
</div>