<?php
/* @var $this yii\web\View */
$baseUrl = Yii::$app->request->baseUrl;
$this->registerJsFile($baseUrl . '/assets/js/jquery.old.min.js');
$this->registerJsFile($baseUrl . '/assets/js/jquery.ui.min.js');
$this->registerJsFile($baseUrl . '/assets/js/jquery.ui.touch-punch.min.js');

$this->registerJsFile($baseUrl . '/assets/software/floor-sort.js');

$this->title = Yii::$app->params['system'] . ' | Section Sort';
?>

<div class="page-header padding-bottom-0">
    <h1 class="page-title">Manage Display Order: <span id="sorting-msg"></span></h1>
  
    <div class="clearfix"></div>
</div>
<div class="page-content padding-30 padding-top-15 container-fluid">
    <div class="row">
        <div class="col-sm-12 col-xlg-6 col-lg-6 col-md-6">
            <div class="panel">
                <div class="panel-body container-fluid">
                    <div class="row row-lg">
                        <div class="col-sm-12 col-lg-12 col-md-12">
                            <ul id="sortable-floor" class="ui-sortable list-group list-group-gap" data-url="<?php echo $baseUrl;?>/floor/manage-order">
                                <?php if ($floors != null) :
                                        foreach($floors as $floor) : ?>
                                            <li class="list-group-item margin-top-5 pointer <?php echo ($floor['status'] ==0) ? 'bg-inactive-color' : 'bg-active-color';?>" id="floor-<?php echo $floor['id'];?>">
                                                <i class="icon fa-ellipsis-v margin-top-5" aria-hidden="true"></i>
                                                <span><?php echo ucwords($floor['name']);?></span>
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