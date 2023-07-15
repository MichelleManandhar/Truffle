<?php
/* @var $this yii\web\View */
$baseUrl = Yii::$app->request->baseUrl;
$temp = explode(":",Yii::$app->session['fiscal_year']);
$starting_fiscal_year_from_date = $temp[0];
$starting_fiscal_year_to_date   = $temp[1];

$this->registerJsFile($baseUrl . '/assets/js/users.min.js');
$this->registerJsFile($baseUrl . '/assets/plugins/switchery/switchery.min.js');
$this->registerJsFile($baseUrl . '/assets/plugins/components/switchery.min.js');
$this->registerJsFile($baseUrl . '/assets/plugins/x-editable/js/bootstrap-editable.min.js');

$this->registerJsFile($baseUrl . '/assets/software/printer-settings.js');

$this->title = Yii::$app->params['system'] . ' | Printer Settings';
?>
<div class="page-header padding-bottom-0">
    <div class="row">
        <div class="col-lg-6">
            <h1 class="page-title">Manage Printers for Different Category</h1>
        </div>
        <?php
            if ((date('Y-m-d') >= $starting_fiscal_year_from_date) 
                    && ( date('Y-m-d') < date('Y-m-d', strtotime($starting_fiscal_year_to_date. ' + 11 days'))) )
            { 
        ?>
            <div class="col-lg-6">
                <div class="page-header-actions margin-top-10">
                    <button class="btn btn-sm btn-info btn-icon refresh margin-left-0" data-toggle="tooltip" data-original-title="Click To Load Installed Printers On Your Windows" data-placement="left">
                    <i class="icon fa-refresh"></i> Refresh Installed Printer List </button>
                </div>
            </div>
        <?php } ?>
    </div>
    <div class="clearfix"></div>
</div>
<div class="page-content padding-30 container-fluid printer-page">
    <div class="row">
        <?php
            if ((date('Y-m-d') >= $starting_fiscal_year_from_date) 
                    && ( date('Y-m-d') < date('Y-m-d', strtotime($starting_fiscal_year_to_date. ' + 11 days'))) )
            { 
        ?>
            <div class=" col-sm-12 col-xlg-4 col-lg-4 col-md-6">
                <div class="panel">
                    <div class="panel-heading">
                        <h3 class="panel-title padding-left-15 padding-bottom-0">Printer Settings</h3>
                    </div>

                    <form action="<?php echo $baseUrl;?>/printer/add-printers" name="newPrinter" data-tablename="printers" method="post" class="form-horizontal printers">
                        <input type="hidden" name="<?php echo Yii::$app->request->csrfParam; ?>" value="<?php echo Yii::$app->request->csrfToken; ?>" />
                        <input type="hidden" name="id" value="0" id="edit-id" />

                        <div class="panel-body container-fluid">
                            <div class="row row-lg">
                                <div class="col-sm-12 col-lg-12">
                                    <div class="form-group">
                                        <h5>Type</h5>
                                        <input name="name" type="text" class="form-control" placeholder="Enter Printer Category">
                                    </div>
                                </div>
                            </div>
                            <div class="row row-lg">
                                <div class="col-sm-12 col-lg-12">
                                    <div class="form-group">
                                        <h5>Printer</h5>
                                        <select name="printer_name" class="form-control">
                                            <option value="">Select a Printer</option>
                                            <?php  if($printers != null):
                                                foreach ($printers as $pre): ?>
                                                    <option value="<?php echo $pre['name']; ?>"><?php echo $pre['name']; ?></option>
                                                <?php endforeach; endif; ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <button type="submit" class="btn btn-sm btn-primary btn-icon"><i class="icon fa-save"></i> Save </button>
                                <div class="clearfix"></div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        <?php } ?>
        <div class="col-sm-12 col-xlg-8 col-lg-8 col-md-6">
            <div class="panel">
                <div class="panel-body container-fluid">
                    <div class="row row-lg">
                        <div class="col-sm-12 col-lg-12 col-md-12">
                            <table class="table table-hover table-striped width-full dtr-inline dataTable with-editable-no-tools" >
                                <thead>
                                <tr>
                                    <th width="27">#</th>
                                    <th width="100">Name</th>
                                    <th width="150">Printer Name</th>
                                </tr>
                                </thead>
                                <tfoot>
                                <tr>
                                    <th width="27">#</th>
                                    <th width="100">Name</th>
                                    <th width="150">Printer Name</th>
                                </tr>
                                </tfoot>
                                <tbody>
                              <?php $printer_name_json = '';
                                    if ($printers != null) :
                                        foreach ($printers as $value) :
                                            $printer_name[] = ['value' => $value['name'], 'text' => strtoupper($value['name'])];
                                            /*$printer_name[] = ['value' => $value, 'text' => strtoupper($value)];*/
                                        endforeach;
                                        $printer_name_json = json_encode($printer_name);
                                    endif;
                                    if ($print != null) : $i=0;
                                        foreach($print as $pr) : ?>
                                        <tr data-id="<?php echo $pr['id'];?>">
                                            <td><?php echo ++$i;?></td>
                                            <td><?php echo $pr['name'];?></td>
                                            <?php
                                                if ((date('Y-m-d') >= $starting_fiscal_year_from_date) 
                                                        && ( date('Y-m-d') < date('Y-m-d', strtotime($starting_fiscal_year_to_date. ' + 11 days'))) )
                                                { 
                                            ?>
                                                <td>
                                                    <span class="editable-select-active" data-type="select" data-value="<?php echo $pr['printer_name']; ?>"
                                                          data-params="{old_value : '<?php echo  $pr['printer_name'];?>'}"
                                                          data-name="printer_name" data-pk="<?php echo $pr['id'];?>"
                                                          data-url="<?php echo $baseUrl; ?>/printer/editable-printer" data-placement="top" data-placeholder="Required"
                                                          data-original-title="Select Printer" data-source='<?php echo $printer_name_json ;?>'>
                                                    </span>
                                                </td>
                                            <?php } 
                                                else { ?>
                                                    <td>
                                                        <?php echo $pr['printer_name']; ?>
                                                    </td>
                                            <?php } ?>
                                        </tr>
                                    <?php endforeach; ?>
                                <?php endif;?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="clearfix"></div>
</div>

