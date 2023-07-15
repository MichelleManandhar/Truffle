<?php
$baseUrl = Yii::$app->request->baseUrl;

$this->registerJsFile($baseUrl . '/assets/js/init.js');

$this->registerCssFile($baseUrl . '/assets/css/jquery-ui.css');
$this->registerJsFile($baseUrl . '/assets/js/jquery-ui.js');
$this->registerJsFile($baseUrl . '/assets/software/fiscal-year.js');

$this->title = Yii::$app->params['system'] . ' | Fiscal Year';

?>

<form action="<?= $baseUrl ?>/fiscal-year/save-fiscal-year-end-date" name="save_fiscal_year_end_date" class="save-fiscal-year-end-date" method="post">
  <input type="hidden" name="<?php echo Yii::$app->request->csrfParam; ?>" value="<?php echo Yii::$app->request->csrfToken; ?>" />
  <input type="hidden" name="fiscal_year" value="<?= $fiscal_year['id'] ?>">
  <div class="form-group">
    <label for="fiscalYearStartDate">Start Date</label>
    <div class="input-group">
      <input type="text" id="fiscalYearStartDate" class="form-control fiscal-year-start-date" name="start_date" data-plugin="datepicker" value="<?= $fiscal_year['start_date'] ?>" readonly>
      <span class="input-group-addon">
        <i class="icon wb-calendar" aria-hidden="true"></i>
      </span>
    </div>
  </div>
  <div class="form-group">
    <label for="fiscalYearEndDate">End Date</label>
    <div class="input-group">
      <input type="text" id="fiscalYearEndDate" class="form-control date-picker fiscal-year-end-date" name="end_date" data-plugin="datepicker" data-multidate="true">
      <span class="input-group-addon">
        <i class="icon wb-calendar" aria-hidden="true"></i>
      </span>
    </div>
  </div>

  <div class="form-group">
    <button class="btn btn-primary width-full">Save</button>
  </div>
</form>    

<script type="text/javascript">
  var start_date = '<?= $fiscal_year['start_date'] ?>';
</script>     