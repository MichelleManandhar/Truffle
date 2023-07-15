<?php
use app\components\Cipher;
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

$this->title = Yii::$app->params['system'] . ' | Users';
?>
<?php 
$role_json='';
if (Yii::$app->params['role_user'] != null) :
    foreach(Yii::$app->params['role_user'] as $role):
        if ($role != 'superadmin')
            $rol[] = ['value' => $role, 'text' => strtoupper($role)];
    endforeach;
    $role_json = json_encode($rol);
endif;

$discount_json='';
$j = 5;
for($i=5; $i<=90; $i=$i+5) :
        $dis[] = ['value' => $i, 'text' => $i];
endfor;
$discount_json = json_encode($dis);
?>
<div class="page-header padding-bottom-0">
    <h1 class="page-title">Users List</h1>
    <div class="page-header-actions margin-top-10">
        <?php
            $temp = explode(":",Yii::$app->session['fiscal_year']);
            $starting_fiscal_year_from_date = $temp[0];
            $starting_fiscal_year_to_date   = $temp[1];

            if ((date('Y-m-d') >= $starting_fiscal_year_from_date) 
                    && ( date('Y-m-d') < date('Y-m-d', strtotime($starting_fiscal_year_to_date. ' + 11 days'))) )
            { 
        ?>
            <a href="<?php echo $baseUrl;?>/user/create" class="btn btn-icon btn-primary btn-round btn-big margin-left-100 pull-right" data-toggle="tooltip" data-original-title="Create New" data-placement="left">
                <i class="icon wb-plus" aria-hidden="true"></i>
            </a>   
        <?php } ?>

    </div>
    <div class="clearfix"></div>
</div>
<div class="page-content padding-15 container-fluid">
    <div class="panel">
        <div class="padding-15">
            <div class="row row-lg margin-0">
                <div class="col-sm-12 padding-0">
                    <div class="table-parent">
                        <table class="table table-hover table-striped width-full dtr-inline dataTable with-editable" style="font-size: 12px;">
                            <thead>
                                <tr>
                                    <th width="50">Name</th>
                                    <th width="50">Username</th>
                                    <th width="30">Role</th>
                                    <th width="50">Email</th>
                                    <th width="50">Mobile</th>
                                    <th width="30">Address</th>
                                    <th width="30">Position</th>
                                    <?php
                                        if ((date('Y-m-d') >= $starting_fiscal_year_from_date) 
                                                && ( date('Y-m-d') < date('Y-m-d', strtotime($starting_fiscal_year_to_date. ' + 11 days'))) )
                                        { 
                                    ?>
                                        <th width="30">Password</th>
                                        <th width="30">Pin Code</th>
                                    <?php } ?>

                                    <th width="50">Employee Discount(upto)</th>
                                    <th width="30">Status</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th width="50">Name</th>
                                    <th width="50">Username</th>
                                    <th width="30">Role</th>
                                    <th width="50">Email</th>
                                    <th width="50">Mobile</th>
                                    <th width="30">Address</th>
                                    <th width="30">Position</th>
                                    <?php
                                        if ((date('Y-m-d') >= $starting_fiscal_year_from_date) 
                                                && ( date('Y-m-d') < date('Y-m-d', strtotime($starting_fiscal_year_to_date. ' + 11 days'))) )
                                        { 
                                    ?>
                                        <th width="30">Password</th>
                                        <th width="30">Pin Code</th>
                                    <?php } ?>

                                    <th width="50">Employee Discount(upto)</th>
                                    <th width="30">Status</th>
                                </tr>
                            </tfoot>
                            <tbody>
                                <?php if ($users != null) : $i=0;?>
                                    <?php
                                        if ((date('Y-m-d') >= $starting_fiscal_year_from_date) 
                                                && ( date('Y-m-d') < date('Y-m-d', strtotime($starting_fiscal_year_to_date. ' + 11 days'))) )
                                        { 
                                    ?>
                                        <?php foreach($users as $user) : 
                                            $pin = (int) Cipher::decrypt($user['pin'], $user['salt']);
                                        ?>
                                        <tr data-id="<?php echo $user['id'];?>">
                                            <td>
                                                <span class="editable-text" data-type="text" 
                                                    data-params="{old_value : '<?php echo $user['name'];?>'}" 
                                                    data-name="name" data-pk="<?php echo $user['id'];?>" 
                                                    data-url="<?php echo $baseUrl; ?>/user/editable" data-placement="top" 
                                                    data-placeholder="Required" 
                                                    data-original-title="Enter Display Name">
                                                    <?php echo $user['name'];?>
                                                </span>
                                            </td>
                                            <td>
                                                <span class="editable-text" data-type="text" 
                                                    data-params="{old_value : '<?php echo $user['username'];?>'}" 
                                                    data-name="username" data-pk="<?php echo $user['id'];?>" 
                                                    data-url="<?php echo $baseUrl; ?>/user/editable" data-placement="top" 
                                                    data-placeholder="Required" 
                                                    data-original-title="Enter Userame">
                                                    <?php echo $user['username'];?>
                                                </span>
                                            </td>
                                            <td>
                                                <span class="editable-select-active" data-type="select" 
                                                    data-value="<?php echo Yii::$app->params['role_user'][$user['role']] ?>"
                                                    data-params="{old_value : '<?php echo Yii::$app->params['role_user'][$user['role']]?>'}" 
                                                    data-name="role" data-pk="<?php echo $user['id'];?>" 
                                                    data-url="<?php echo $baseUrl; ?>/user/editable" data-placement="top" data-placeholder="Required" 
                                                    data-original-title="Select User Role" data-source='<?php echo $role_json;?>'>
                                                </span>
                                            </td>
                                            <td>
                                                <span class="editable-email" data-type="text" 
                                                    data-params="{old_value : '<?php echo $user['email'];?>'}" 
                                                    data-name="email" data-pk="<?php echo $user['id'];?>" 
                                                    data-url="<?php echo $baseUrl; ?>/user/editable" data-placement="top" 
                                                    data-placeholder="Required" 
                                                    data-original-title="Enter Email">
                                                    <?php echo $user['email'];?>
                                                </span>
                                            </td>
                                            <td>
                                                <span class="editable-number" data-type="text" 
                                                    data-params="{old_value : '<?php echo $user['mobile'];?>'}" 
                                                    data-name="mobile" data-pk="<?php echo $user['id'];?>" 
                                                    data-url="<?php echo $baseUrl; ?>/user/editable" data-placement="top" 
                                                    data-placeholder="Required" 
                                                    data-original-title="Enter Mobile no.">
                                                    <?php echo $user['mobile'];?>
                                                </span>
                                            </td>
                                            <td>
                                                <span class="editable-textarea" data-type="textarea" 
                                                    data-params="{old_value : '<?php echo $user['address'];?>'}" 
                                                    data-name="address" data-pk="<?php echo $user['id'];?>" 
                                                    data-url="<?php echo $baseUrl; ?>/user/editable" data-placement="top" 
                                                    data-placeholder="Required" 
                                                    data-original-title="Enter Address"><?php echo trim($user['address']);?></span>
                                            </td>
                                            <td>
                                                <span class="editable-text" data-type="text" 
                                                    data-params="{old_value : '<?php echo $user['position'];?>'}" 
                                                    data-name="position" data-pk="<?php echo $user['id'];?>" 
                                                    data-url="<?php echo $baseUrl; ?>/user/editable" data-placement="top" 
                                                    data-placeholder="Required" 
                                                    data-original-title="Enter Position">
                                                    <?php echo $user['position'];?>
                                                </span>
                                            </td>
                                            <td>
                                                <span class="editable-text" data-type="password" 
                                                    data-escape="false"
                                                    data-name="password" data-pk="<?php echo $user['id'];?>" 
                                                    data-url="<?php echo $baseUrl; ?>/user/edit-password" data-placement="top" 
                                                    data-placeholder="Required" 
                                                    data-original-title="Enter Password">
                                                    Password
                                                </span>
                                            </td>
                                            <td>
                                                <span class="editable-number" data-type="password" 
                                                    data-name="pin" data-pk="<?php echo $user['id'];?>" 
                                                    data-url="<?php echo $baseUrl; ?>/user/edit-pin-code" data-placement="top" 
                                                    data-placeholder="Required" 
                                                    data-original-title="Enter Pin Code no.">
                                                    ####
                                                </span>
                                            </td>
                                            <!-- <td>
                                                <span class="editable-number" data-type="text" 
                                                    data-params="{old_value : '<?php echo $user['discount_upto'];?>'}" 
                                                    data-name="discount_upto" data-pk="<?php echo $user['id'];?>" 
                                                    data-url="<?php echo $baseUrl; ?>/user/editable" data-placement="top" 
                                                    data-placeholder="Required" 
                                                    data-original-title="Enter Employee Discount (upto).">
                                                    <?php echo $user['discount_upto'];?>
                                                </span>%
                                            </td> -->
                                            <td>
                                                <span class="editable-select-active" data-type="select" data-value="<?php echo $user['discount_upto'];?>"
                                                    data-params="{old_value : '<?php echo $user['discount_upto'];?>'}" 
                                                    data-name="discount_upto" data-pk="<?php echo $user['id'];?>" 
                                                    data-url="<?php echo $baseUrl; ?>/user/editable" data-placement="top" 
                                                    data-placeholder="Required" 
                                                    data-original-title="Select Discount" data-source='<?php echo $discount_json;?>'>
                                                </span>%
                                            </td>
                                            <td>
                                                <span class="editable-select-active" data-type="select" data-value="<?php echo $user['is_active'];?>"
                                                    data-params="{old_value : '<?php echo $user['is_active'];?>'}" 
                                                    data-name="is_active" data-pk="<?php echo $user['id'];?>" 
                                                    data-url="<?php echo $baseUrl; ?>/user/editable" data-placement="top" 
                                                    data-placeholder="Required" 
                                                    data-original-title="Select Status" data-source="[{value: 1, text: 'Active'},{value: 0, text: 'Inactive'}]">
                                                </span>
                                            </td>
                                        </tr>
                                        <?php endforeach; ?>
                                    <?php } 
                                        else {
                                            foreach($users as $user) : 
                                                $pin = (int) Cipher::decrypt($user['pin'], $user['salt']);
                                            ?>
                                            <tr data-id="<?php echo $user['id'];?>">
                                                <td>
                                                    <?php echo $user['name'];?>
                                                </td>
                                                <td>
                                                    <?php echo $user['username'];?>
                                                </td>
                                                <td>
                                                    <?php echo Yii::$app->params['role_user'][$user['role']] ?>
                                                </td>
                                                <td>
                                                    <?php echo $user['email'];?>
                                                </td>
                                                <td>
                                                    <?php echo $user['mobile'];?>
                                                </td>
                                                <td>
                                                    <?php echo trim($user['address']);?>
                                                </td>
                                                <td>
                                                    <?php echo $user['position'];?>
                                                </td>
                                                <td>
                                                    <?php echo $user['discount_upto'];?>%
                                                </td>
                                                <td>
                                                    <?php echo ($user['is_active'] == 1) ? 'Active' : 'Inactive';?>
                                                </td>
                                            </tr>
                                            <?php endforeach;
                                        } ?>
                                <?php endif;?>
                            </tbody>
                        </table>
                    </div>
                    <div class="clearfix"></div>
                </div>
            </div>
         </div>
    </div>
</div>
