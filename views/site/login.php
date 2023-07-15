<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$baseUrl = Yii::$app->request->baseUrl;
$this->title = Yii::$app->params['system'] . ' | Login';

if (Yii::$app->session->hasFlash('recovery_database')): ?>
    <div class="alert alert-success alert-dismissable custom-recovery-database-alert">
        <button aria-hidden="true" data-dismiss="alert" class="close custom-recovery-database-alert-btn" type="button">×</button>
        <?php echo Yii::$app->session->getFlash('recovery_database'); ?>
    </div>
<?php 
  endif; 
?>

<p class="font-size-30 small-no-display">WELCOME TO TRUFFLE</p>
<?php if (Yii::$app->session->hasFlash('login_error')) : ?>
  <div class="alert alert-alt alert-danger alert-dismissible" role="alert">
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">×</span>
      </button>
    <p class="alert-link"><i class="icon fa-bomb"></i> Invalid Username/Password.</p>
  </div>
<?php endif; ?>

<?php $form = ActiveForm::begin(['id' => 'login-form']); ?>
  <div class="form-group">
    <label class="sr-only" for="inputEmail">Username</label>
    <?= $form->field($model, 'username')->textInput(['placeholder' => 'Your Username', 'autocomplete' => 'off']) ?>
  </div>
  <div class="form-group">
    <label class="sr-only" for="inputPassword">Password</label>
    <?= $form->field($model, 'password')->passwordInput(['placeholder' => 'Your Password']) ?>
  </div>

  <?php if($fiscal_year != null) : ?>
    <div class="form-group">
        <label>Fiscal Year</label>
        <select name="fiscal_year" class="form-control">
          <?php 
              foreach( $fiscal_year as $f_year ) 
              {
                echo "<option value='".$f_year['start_date'].":".$f_year['end_date']."' >". $f_year['start_date'] . " To " . $f_year['end_date'] ."</option>";
              }
          ?>
        </select>
    </div>
  <?php endif; ?>
  <input type="hidden" name="ip" class="current-ip">

  <div class="row">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-6">
      <?= Html::submitButton('Log In', ['class' => 'btn btn-primary btn-block login-btn', 'name' => 'login-button']) ?>
    </div>

    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-6">
      <a href="javascript:location.href = 'http://closekiosk';" class="btn btn-danger btn-block exit-btn margin-top-20 margin-left-0 exit-margin-top-0">Exit</a>
    </div>
  </div>

<?php ActiveForm::end(); ?>            