<?php
/* @var $this yii\web\View */
$baseUrl = Yii::$app->request->baseUrl;
$currency = strtoupper(Yii::$app->session['currency']);
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

$this->registerCssFile($baseUrl . '/assets/plugins/bootstrap-select/bootstrap-select.min081a.css?v2.0.0');
$this->registerCssFile($baseUrl . '/assets/plugins/bootstrap-datepicker/bootstrap-datepicker.min081a.css');

$this->registerJsFile($baseUrl . '/assets/plugins/bootstrap-select/bootstrap-select.min.js');
$this->registerJsFile($baseUrl . '/assets/plugins/components/bootstrap-select.min.js');
$this->registerJsFile($baseUrl . '/assets/plugins/bootstrap-datepicker/bootstrap-datepicker.min.js');

$this->registerJsFile($baseUrl . '/assets/software/category_summary.js');


use app\components\Misc;

$this->title = Yii::$app->params['system'] . ' | Category Wise Report';
$regular = Yii::$app->params['item_type']['regular'];
$special = Yii::$app->params['item_type']['special'];
?>

<div class="page-header padding-bottom-0">
    <h1 class="page-title">Category Wise Summary</h1>
    <div class="clearfix"></div>
</div>
<div class="page-content padding-30 container-fluid">
    <div class="row row-lg margin-bottom-20">
        <div class="col-lg-6 col-md-4 col-sm-4">
            <div class="row">
                <div class="col-lg-2 col-md-4 col-sm-4 col-xs-12">
                    <h5>Sort By:</h5>
                </div>
                <div class="col-lg-5 col-md-7 col-sm-8 col-xs-12">
                    <select class="form-control show-tick bs-select-hidden sort-by" data-plugin="selectpicker">
                    <option value="all" <?php echo (!isset($_GET['by']) || $_GET['by'] == 'all') ? 'selected' : '';?>>All</option>
                    <option value="today" <?php echo (isset($_GET['by']) && $_GET['by'] == 'today') ? 'selected' : '';?>>Show me today's transactions</option>
                    <option value="month" <?php echo (isset($_GET['by']) && $_GET['by'] == 'month') ? 'selected' : '';?>>Show me this month's transactions</option>
                    <option value="year" <?php echo (isset($_GET['by']) && $_GET['by'] == 'year') ? 'selected' : '';?>>Show me this year's transactions</option>
                </select>
                </div>
            </div>
        </div>
        <div class="col-lg-6 col-md-8 col-sm-8">
            <div class="text-right mob-nepali-date">
                <input class="datepicker date-from" readonly placeholder="from date" style="border: 1px solid #ccc; padding: 6px 4px;" type="text" value="<?php echo isset($_GET['from']) ? $_GET['from'] : '';?>"> 
                <input class="datepicker date-to" readonly placeholder="to date" style="border: 1px solid #ccc; padding: 6px 4px;" type="text" value="<?php echo isset($_GET['to']) ? $_GET['to'] : '';?>"> <a class="btn btn-primary sort-by-go" href="#">GO</a>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12 col-md-12 col-md-12 col-sm-12">
            <div class="nav-tabs-horizontal">
                <div class="panel">
                    <div class="panel-body">
                        <ul class="nav nav-tabs list-tab nav-justified" data-plugin="nav-tabs" role="tablist">
                            <?php if ($categories != null) : $i = 0; ?>
                                    <li class="category-nav active"  role="presentation" >
                                    <a aria-controls="exampleTabsTwo" data-toggle="tab" href="#all-list" role="tab">All</a>
                                    </li>
                                <?php foreach($categories as $category) : $i++; ?>
                                    <li class="category-nav"  role="presentation" >
                                    <a aria-controls="exampleTabsTwo" data-toggle="tab" href="#<?php echo $category['id'];?>" role="tab"><?php echo $category['category']; ?></a>
                                    </li>
                                <?php endforeach; endif;?>
                        </ul>
                        <div class="tab-content padding-top-20">
                            <?php if ($categories != null) : ?>
                                    <div class="tab-pane active" id="all-list" role="tabpanel">
                                        <div class="row row-lg">
                                            <div class="col-sm-12 col-lg-12 col-md-12">
                                                <div class="table-parent">
                                                    <table class="table table-hover dataTable table-striped width-full with-export dtr-inline">
                                                        <thead>
                                                                <tr>
                                                                    <th width="27">#</th>
                                                                    <th width="50">Menu Item</th>
                                                                    <th width="50">Quantity</th>
                                                                    <th width="50">Total (<?= $currency ?>)</th>
                                                                    <th width="50">Category Type</th>
                                                                </tr>
                                                        </thead>
                                                            <tbody>
                                                                <?php $total = 0; $i=0;
                                                                    $special_item_qty   = 0;
                                                                    $special_item_total = 0; 
                                                                foreach($categories as $category) :
                                                                    if (isset($cate_data[$category['id']][$regular])&& $cate_data[$category['id']][$regular] != null) :
                                                                        
                                                                        foreach($cate_data[$category['id']][$regular] as $row):
                                                                            $total += $row['total']; ?>
                                                                           <tr>
                                                                                <td><?php echo ++$i;?></td>
                                                                                <td><?php echo $row['name'];?></td>
                                                                                <td><?php echo $row['quantity']; ?></td>
                                                                                <td><?php echo  number_format($row['total'], 2, '.', ','); ?></td>
                                                                                <td><?php echo $category['category']; ?></td>
                                                                           </tr>
                                                                        <?php endforeach; ?>
                                                                    <?php endif;?>
                                                                    <?php if (isset($cate_data[$category['id']][$special])&& $cate_data[$category['id']][$special] != null) : 
                                                                        $special_item_qty += $cate_data[$category['id']][$special]['quantity'];
                                                                        $special_item_total += $cate_data[$category['id']][$special]['total'];
                                                                        $total += $cate_data[$category['id']][$special]['total'];
                                                                    endif; ?>
                                                                <?php endforeach; ?>
                                                                <?php if ($special_item_qty > 0) : ?>
                                                                        <tr class="color-blue">
                                                                            <td><?php echo ++$i;?></td>
                                                                            <td>Special Items</td>
                                                                            <td><?php echo $special_item_qty; ?></td>
                                                                            <td><?php echo  number_format($special_item_total, 2, '.', ','); ?></td>
                                                                            <td></td>
                                                                        </tr>
                                                                <?php endif; ?>
                                                            </tbody>
                                                            <tfoot>
                                                            <tr>
                                                                <th width="27"></th>
                                                                <th width="50"></th>
                                                                <th width="50">Total Amount</th>
                                                                <th width="50"><?= $currency ?><?php echo number_format($total, 2, '.', ','); ?></th>
                                                                <th width="50"></th>
                                                            </tr>
                                                            </tfoot>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <?php $i = 0; foreach($categories as $category) : $i++; ?>
                                    <div class="tab-pane" id="<?php echo $category['id'];?>" role="tabpanel">
                                        <div class="row row-lg">
                                            <div class="col-sm-12 col-lg-12 col-md-12">
                                                <div class="table-parent">
                                                    <table class="table table-hover dataTable table-striped width-full with-export dtr-inline">
                                                        <thead>
                                                                <tr>
                                                                    <th width="27">#</th>
                                                                    <th width="50">Menu Item</th>
                                                                    <th width="50">Quantity</th>
                                                                    <th width="50">Total (<?= $currency ?>)</th>
                                                                </tr>
                                                        </thead>
                                                            <tbody>
                                                            <?php $total = 0;
                                                            if (isset($cate_data[$category['id']][$regular])&& $cate_data[$category['id']][$regular] != null) :
                                                                $i=0;
                                                                foreach($cate_data[$category['id']][$regular] as $row):
                                                                    $total += $row['total']; ?>
                                                               <tr>
                                                                    <td><?php echo ++$i;?></td>
                                                                    <td><?php echo $row['name'];?></td>
                                                                    <td><?php echo $row['quantity']; ?></td>
                                                                    <td><?php echo  number_format($row['total'], 2, '.', ','); ?></td>

                                                               </tr>
                                                                <?php endforeach; ?>
                                                            <?php endif;?>
                                                            <?php if (isset($cate_data[$category['id']][$special])&& $cate_data[$category['id']][$special] != null) : ?>
                                                                    <tr class="color-blue">
                                                                        <td><?php echo ++$i;?></td>
                                                                        <td>Special Items</td>
                                                                        <td><?php echo $cate_data[$category['id']][$special]['quantity']; ?></td>
                                                                        <td><?php echo  number_format($cate_data[$category['id']][$special]['total'], 2, '.', ','); ?></td>
                                                                    </tr>
                                                            <?php endif; ?>
                                                            </tbody>
                                                            <tfoot>
                                                            <tr>
                                                                <th width="27"></th>
                                                                <th width="50"></th>
                                                                <th width="50">Total Amount</th>
                                                                <th width="50"><?= $currency ?><?php echo number_format($total, 2, '.', ','); ?></th>
                                                            </tr>
                                                            </tfoot>
                                                    </table>
                                                </div>
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
    <div class="clearfix"></div>
</div>



