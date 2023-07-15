<?php
$baseUrl = Yii::$app->request->baseUrl;

$this->title = Yii::$app->params['system'] . ' | User Manual & Help File';
?>

<div class="page-header padding-bottom-0">
    <h2 class="text-center font-weight-600">User Manual & Help File</h2>
    <div class="clearfix"></div>
</div>

<div class="page-content padding-30 container-fluid">
    <div class="row row-lg margin-bottom-20">
        <div class="col-lg-12 col-md-12 col-sm-12">
        	<?php echo $document['value']; ?>
        </div>
    </div>
</div>