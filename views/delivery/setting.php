<?php
$baseUrl = Yii::$app->request->baseUrl;

$this->registerJsFile($baseUrl . '/assets/software/delivery.js');

$this->title = Yii::$app->params['system'] . ' | Delivery Settings';
?>
<div class="page-header padding-bottom-0">
    <h1 class="page-title">Set Default Delivery Charge</h1>
    <div class="clearfix"></div>
</div>
<div class="page-content padding-30 container-fluid printer-page">
    <div class="row">
        <div class=" col-sm-12 col-xlg-4 col-lg-4 col-md-12">
            <div class="panel height-414">

                <form action="<?php echo $baseUrl;?>/delivery/set-delivery-charge" name="delivery_charge_form" method="post" class="form-horizontal set-delivery-charge-form">
                    <input type="hidden" name="<?php echo Yii::$app->request->csrfParam; ?>" value="<?php echo Yii::$app->request->csrfToken; ?>" />

                    <div class="panel-body container-fluid">
                        <div class="row row-lg">
                            <div class="col-md-7">
                                <div class="form-group">
                                    <h5>Delivery Charge Amount</h5>
                                    <input name="delivery_charge_amount" min="0" type="number" class="form-control" placeholder="Delivery Charge Amount" value="<?= $delivery_charge_amount['value'] ?>">
                                </div>
                            </div>
                            <div class="col-md-5">
                                <button type="submit" class="btn btn-sm btn-primary btn-icon margin-top-30"><i class="icon fa-save"></i> Save </button>
                                <div class="clearfix">
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="clearfix"></div>
</div>

