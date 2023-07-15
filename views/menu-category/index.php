<?php
/* @var $this yii\web\View */
$baseUrl = Yii::$app->request->baseUrl;
$temp = explode(":",Yii::$app->session['fiscal_year']);
$starting_fiscal_year_from_date = $temp[0];
$starting_fiscal_year_to_date   = $temp[1];

$this->registerCssFile($baseUrl . '/assets/plugins/x-editable/css/bootstrap-editable.css');
$this->registerJsFile($baseUrl . '/assets/plugins/x-editable/js/bootstrap-editable.min.js');
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

$this->registerJsFile($baseUrl . '/assets/plugins/switchery/switchery.min.js');
$this->registerJsFile($baseUrl . '/assets/plugins/components/switchery.min.js');

$this->registerJsFile($baseUrl . '/assets/software/menu-category.js');

$this->title = Yii::$app->params['system'] . ' | Menu Category';
?>

<div class="page-header padding-bottom-0">
    <h1 class="page-title">Menu Category</h1>
    <div class="page-header-actions margin-top-10">
        <?php
            if ((date('Y-m-d') >= $starting_fiscal_year_from_date) 
                    && ( date('Y-m-d') < date('Y-m-d', strtotime($starting_fiscal_year_to_date. ' + 11 days'))) )
            {
        ?>
            <a href="<?php echo $baseUrl;?>/menu-category/sorting" class="btn btn-icon btn-success btn-round btn-big pull-right" data-toggle="tooltip" data-original-title="Manage Order" data-placement="left">
                <i class="icon wb-sort-asc" aria-hidden="true"></i>
            </a>   
        <?php } ?>    
    </div>
    <div class="clearfix"></div>
</div>
<div class="page-content padding-30 padding-top-15 container-fluid">
    <div class="row">
        <?php
            if ((date('Y-m-d') >= $starting_fiscal_year_from_date) 
                    && ( date('Y-m-d') < date('Y-m-d', strtotime($starting_fiscal_year_to_date. ' + 11 days'))) )
            {
        ?>
            <div class=" col-sm-12 col-xlg-5 col-lg-5 col-md-5">
                <div class="panel">
                    <form action="<?php echo $baseUrl;?>/menu-category/add" name="newMenuCategory" data-tablename="menu-category" method="post" class="form-horizontal menu-category">
                        <input type="hidden" name="<?php echo Yii::$app->request->csrfParam; ?>" value="<?php echo Yii::$app->request->csrfToken; ?>" />

                        <div class="panel-body container-fluid">
                            <div class="row row-lg">
                                <div class="col-sm-12 col-lg-12">
                                    <div class="form-group">
                                        <h5>Category Name</h5>
                                        <input name="category" type="text" class="form-control" placeholder="Enter Category Name">
                                    </div>
                                </div>
                            </div>

                            <div class="row row-lg">
                                <div class="col-sm-12 col-lg-12">
                                    <div class="form-group">
                                        <h5>Category Bill Type</h5>
                                        <select class="form-control" name="category_bill_type">
                                                <option value="">--Select Category Bill Type--</option>
                                                <?php 
                                                    if ($bill_types != null) :
                                                        foreach ($bill_types as $b_type) : ?>
                                                            <option value="<?php echo $b_type['id']; ?>"><?php echo strtoupper($b_type['name']); ?></option>
                                                    <?php endforeach;
                                                    endif; 
                                                ?>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="row row-lg">
                                <div class="col-sm-6 col-lg-6">
                                    <div class="form-group">
                                        <div class="col-sm-3">
                                            <label for="" class="">Active</label>
                                        </div>
                                        <div class="col-sm-9">
                                            <input type="checkbox" class="" name="is_active" data-plugin="switchery" data-color="#62a8ea" value="1" checked />
                                        </div>
                                        <div class="clearfix"></div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-sm btn-primary btn-icon pull-right"><i class="icon fa-save"></i> Add Category </button>
                                    </div>
                                </div>
                            </div> 
                        </div> 
                    </form>            
                </div>
            </div>
        <?php } ?>

        <div class="col-sm-12 col-xlg-7 col-lg-7 col-md-7">
            <div class="panel">
                <div class="panel-body container-fluid">
                    <div class="row row-lg">
                        <div class="col-sm-12 col-lg-12 col-md-12">
                            <div class="table-parent">
                                <table class="table table-hover table-striped width-full dtr-inline dataTable with-editable-no-tools" >
                                    <thead>
                                        <tr>
                                            <th width="27">#</th>
                                            <th width="60">Category</th>
                                            <th width="60">Bill Type</th>
                                            <th width="60">Status</th>
                                            <?php
                                                if ((date('Y-m-d') >= $starting_fiscal_year_from_date) 
                                                        && ( date('Y-m-d') < date('Y-m-d', strtotime($starting_fiscal_year_to_date. ' + 11 days'))) )
                                                {
                                            ?>
                                                <th width="60">Manage</th>
                                            <?php } ?>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th width="27">#</th>
                                            <th width="60">Category</th>
                                            <th width="60">Bill Type</th>
                                            <th width="60">Status</th>
                                            <?php
                                                if ((date('Y-m-d') >= $starting_fiscal_year_from_date) 
                                                        && ( date('Y-m-d') < date('Y-m-d', strtotime($starting_fiscal_year_to_date. ' + 11 days'))) )
                                                {
                                            ?>
                                                <th width="60">Manage</th>
                                            <?php } ?>
                                        </tr>
                                    </tfoot>
                                    <tbody> 

                                        <?php  
                                            $bill_type_json = json_encode([]);
                                            if ($bill_types != null) :
                                                foreach ($bill_types as $b_type) :
                                                    $bill_type[] = ['value' => $b_type['id'], 'text' => strtoupper($b_type['name'])];
                                                    $bill_type_json = json_encode($bill_type);
                                                endforeach;
                                            endif;

                                            if ($categories != null) : $i=0;
                                                if ((date('Y-m-d') >= $starting_fiscal_year_from_date) 
                                                        && ( date('Y-m-d') < date('Y-m-d', strtotime($starting_fiscal_year_to_date. ' + 11 days'))) )
                                                {
                                                    foreach($categories as $category) : ?>
                                                        <tr data-id="<?php echo $category['id'];?>">
                                                            <td><?php echo ++$i;?></td>
                                                            <td>
                                                                <span class="editable-text" data-type="text" 
                                                                    data-params="{old_value : '<?php echo $category['category'];?>'}" 
                                                                    data-name="category" data-pk="<?php echo $category['id'];?>" 
                                                                    data-url="<?php echo $baseUrl; ?>/menu-category/editable" data-placement="top" data-placeholder="Required" 
                                                                    data-original-title="Enter Category name">
                                                                    <?php echo ucwords($category['category']);?>
                                                                </span>
                                                            </td>
                                                            <td>
                                                                <span class="editable-select-active" data-type="select" data-value="<?php echo $category['bill_type']; ?>"
                                                                    data-params="{old_value : '<?php echo $category['bill_type'];?>'}" 
                                                                    data-name="bill_type" data-pk="<?php echo $category['id'];?>" 
                                                                    data-url="<?php echo $baseUrl; ?>/menu-category/editable-select" data-placement="top" data-placeholder="Required" 
                                                                    data-original-title="Select Bill Type" data-source='<?php echo $bill_type_json;?>'>
                                                                </span>

                                                            </td>
                                                            <td>
                                                                <span class="editable-select-active" data-type="select" data-value="<?php echo $category['is_active']; ?>"
                                                                    data-params="{old_value : '<?php echo $category['is_active'];?>'}" 
                                                                    data-name="is_active" data-pk="<?php echo $category['id'];?>" 
                                                                    data-url="<?php echo $baseUrl; ?>/menu-category/editable-select" data-placement="top" data-placeholder="Required" 
                                                                    data-original-title="Select Status" data-source="[{value: 1, text: 'Active'},{value: 0, text: 'Inactive'}]">
                                                                </span>
                                                            </td>

                                                            <td>
                                                                <a href="<?php echo $baseUrl;?>/menu-item/sorting-by-category/<?php echo $category['slug'];?>" class="" data-toggle="tooltip" data-original-title="Manage Order" data-placement="left">
                                                                    <i class="icon fa-edit color-green" aria-hidden="true"></i>
                                                                </a> 
                                                            </td>
                                                        </tr>
                                                    <?php endforeach; 
                                                }else {
                                                    foreach($categories as $category) : ?>
                                                        <tr data-id="<?php echo $category['id'];?>">
                                                            <td><?php echo ++$i;?></td>
                                                            <td>
                                                                <?php echo ucwords($category['category']);?>
                                                            </td>
                                                            <td>
                                                                <?php echo $category['bill_type_name'];?>
                                                            </td>
                                                            <td>
                                                                <?php echo ($category['is_active'] == 1) ? 'Active' : 'Inactive';?>
                                                            </td>
                                                        </tr>
                                                    <?php endforeach; 
                                                }
                                            endif;?>

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="clearfix"></div>
</div>
