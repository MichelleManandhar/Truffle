<?php 
$baseUrl = Yii::$app->request->baseUrl;
$this->registerCssFile($baseUrl . '/assets/plugins/bootstrap-select/bootstrap-select.min081a.css?v2.0.0');
$this->registerJsFile($baseUrl . '/assets/plugins/bootstrap-select/bootstrap-select.min.js');
$this->registerJsFile($baseUrl . '/assets/plugins/components/bootstrap-select.min.js');

$this->registerJsFile($baseUrl . '/assets/software/user.js');

$this->title = Yii::$app->params['system'] . " | Users";
?>

<form method="post" action="<?php echo $baseUrl; ?>/user/add"  name="newUser" data-tablename="user" data-action="add" method="post" class="form-horizontal user-form">
<input type="hidden" name="<?php echo Yii::$app->request->csrfParam; ?>" value="<?php echo Yii::$app->request->csrfToken; ?>">
		 				
<div class="page-header padding-bottom-0">
    <h1 class="page-title">Create New User</h1>
    <div class="page-header-actions margin-top-10">
        <button type="submit" class="btn btn-icon btn-success btn-round btn-big margin-left-100 pull-right" data-toggle="tooltip" data-original-title="Save" data-placement="left">
            <i class="icon fa-save" aria-hidden="true"></i>
        </button>   
    </div>
    <div class="clearfix"></div>
</div>
<div class="page-content padding-30 padding-top-15 container-fluid">
	<div class="panel">
	    <div class="panel-body container-fluid">
	        <div class="row row-lg">
	            <div class="col-lg-12">
	            	<div class="col-sm-12">
	 					<div class="row row-lg">
			 				<div class="col-sm-12 col-md-6 col-lg-6">
			                    <div class="form-group">
			                    	<label class="control-label" for="">Display Name</label>
				 					<input class="form-control" type="text" name="name" placeholder="Enter Display Name">
				 				</div>
				 				<div class="form-group">
				 					<label class="control-label" for="">Username</label>
				 					<input class="form-control" type="text" name="username" placeholder="Enter Username">
				 				</div>
				 				<div class="form-group">
				 					<label class="control-label" for="">Password</label>
				 					<input class="form-control" type="password" id="password" name="password" placeholder="Enter Password">
				 				</div>
				 				<div class="form-group">
				 					<label class="control-label" for="">Confirm Password</label>
				 					<input class="form-control" type="password" name="repassword" placeholder="Enter Confirm Password">
				 				</div>
				 				<div class="form-group">
				 					<label class="control-label" for="">Pin Code</label>
				 					<input class="form-control" type="number" maxlength="4" name="pin_code" placeholder="Enter Pin Code">
				 				</div>
				 				<div class="form-group">
				 					<label class="control-label" for="">User Role</label>
				 					<select class="form-control show-tick bs-select-hidden" name="role" data-plugin="selectpicker">
			 							<option value="">--Select Role--</option>
			 							
			 							<?php if (isset(Yii::$app->params['role_user']) && Yii::$app->params['role_user'] != null) : 
			 								foreach(Yii::$app->params['role_user'] as $role) :
			 									if ($role != 'superadmin') :
			 							?>
			 							<option value="<?php echo $role; ?>"><?php echo strtoupper($role); ?></option>
			 							<?php endif; endforeach; endif; ?>
			 						</select>
				 				</div>
							</div>
							<div class="col-sm-12 col-md-6 col-lg-6">
				 				<div class="form-group">
				 					<label class="control-label" for="">Mobile</label>
				 					<input class="form-control" type="text" name="mobile" placeholder="Enter mobile">
				 				</div>
				 				<div class="form-group">
				 					<label class="control-label" for="">Position</label>
				 					<input class="form-control" type="text" name="position" placeholder="Enter position">
				 				</div>		
				 				<div class="form-group">
				 					<label class="control-label" for="">Email</label>
				 					<input class="form-control" type="text" name="email" placeholder="Enter E-mail">
				 				</div>
				 				<div class="form-group">
				 					<label class="control-label" for="">Address</label>
				 					<textarea class="form-control" rows="5" name="address" placeholder="Enter address"></textarea>
				 				</div>
				 				<div class="form-group">
				 					<label class="control-label" for="">Employee Discount (upto %)</label>
				 					<input class="form-control" type="number" name="discount_upto" placeholder="Enter Employee Discount">
				 				</div>
				 			</div>
				 		</div>
			 		</div>        
	            </div>
	        </div>
	    </div>
	</div>
</div>
</form>