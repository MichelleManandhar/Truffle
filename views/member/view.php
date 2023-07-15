<?php
/* @var $this yii\web\View */
$baseUrl = Yii::$app->request->baseUrl;

$this->title = Yii::$app->params['system'] . ' | Member';
?>

<div class="page-header padding-bottom-0">
    <h1 class="page-title">Detail of Member - <?php echo ucwords($member['name']); ?></h1>
    <div class="clearfix"></div>
</div>
<div class="page-content padding-30 padding-top-15 container-fluid">
    <div class="row">
        <div class=" col-sm-12 col-xlg-6 col-lg-6 col-md-6">
            <div class="panel">
                <div class="panel-body container-fluid">
                    <div class="row row-lg">
                        <div class="col-sm-12 col-md-6 col-lg-6">
                            <div class="margin-bottom-20">
                                <h5>Name</h5>
                                <?php echo ucwords($member['name']); ?>
                            </div>
                        </div>

                        <div class="col-sm-12 col-md-6 col-lg-6">
                            <div class="margin-bottom-20">
                                <h5>Phone</h5>
                                <?php echo $member['phone']; ?>
                            </div>
                        </div>
                    </div>

                    <div class="row row-lg">
                        <div class="col-sm-12 col-md-6 col-lg-6">
                            <div class="margin-bottom-20">
                                <h5>Email</h5>
                                <?php echo $member['email']; ?>
                            </div>
                        </div>

                        <div class="col-sm-12 col-md-6 col-lg-6">
                            <div class="margin-bottom-20">
                                <h5>Membership Number</h5>
                                <?php echo $member['membership_number']; ?>
                            </div>
                        </div>
                    </div>

                    <div class="row row-lg">
                        <div class="col-sm-6 col-md-6 col-lg-6">
                            <div class="margin-bottom-20">
                                <h5>Issued Date</h5>
                                <?php echo date('Y-m-d', strtotime($member['issued_date'])); ?>
                            </div>
                        </div>

                        <div class="col-sm-6 col-md-6 col-lg-6">
                            <div class="margin-bottom-20">
                                <h5>Valid Date</h5>
                                <?php echo date('Y-m-d', strtotime($member['valid_date'])); ?>
                            </div>
                        </div>
                    </div>

                    <div class="row row-lg">
                        <div class="col-sm-12 col-md-6 col-lg-6">
                            <div class="margin-bottom-20">
                                <h5>Membership Type</h5>
                                <?php echo ucwords(Yii::$app->params['membership_type_show'][$member['membership_type']]); ?>
                            </div>
                        </div>

                        <div class="col-sm-12 col-md-6 col-lg-6">
                            <div class="margin-bottom-20">
                                <?php ($member['is_active'] == 1) ? 'active' : 'inactive'; ?>
                            </div>
                        </div>
                    </div>
                </div>                
            </div>
        </div>

        <!-- <div class="col-sm-6 col-xlg-6 col-lg-6 col-md-6">
            <div class="panel">
                <div class="panel-heading">
                    <h3 class="panel-title">Discount Allowed to categories</h3>
                </div>
                <div class="panel-body container-fluid">
                    <div class="row row-lg">
                    <?php //if($member_discount != null) : $i=0;?>
                        <?php //foreach($member_discount as $mem_dis) : $i++; ?>
                            <div class="col-sm-6 col-md-6 col-lg-6">
                                <?php //echo ucwords($mem_dis['category']); ?>
                            </div>

                            <div class="col-sm-6 col-md-6 col-lg-6">
                                <?php //echo $mem_dis['discount_allowed'].'%'; ?>
                            </div>
                        <?php //endforeach; ?>
                    <?php //endif; ?>
                    </div>
                </div>                
            </div>
        </div> -->
    </div>
    <div class="clearfix"></div>
</div>
</form>