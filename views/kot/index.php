<?php
$baseUrl = Yii::$app->request->baseUrl;
$this->registerJsFile($baseUrl . '/assets/software/kitchen-kot.js');
$this->registerCssFile($baseUrl . '/assets/css/stickynote.css');
$this->title = Yii::$app->params['system'] . ' | Kitchen KOT';
$color_array = ['color-one', 'color-two', 'color-three', 'color-four', 'color-five'];
if (Yii::$app->session['session_device'] == 'mobile') {
	$check = 2;
	$height = '300px';
}
else if (Yii::$app->session['session_device'] == 'tablet') {
	$check = 3;
	$height = '400px';
}
else {
	$check = 5;
	$height = '600px';
}
?>
<div class="page-content padding-30 padding-top-15 container-fluid">
    <div class="row">
        <div class="col-sm-12 col-xlg-12 col-lg-12 col-md-12">
			<div class="stickynote">
				
				<?php if ($kots != null) : $j = 0; ?>
				<div class="sticky-masonry">
					<?php foreach($kots as $kot): ?> 
						<?php if(count($kot_items[$kot['id']]) > 0): ?>
						    <div class="sticky-item item-main table-<?php echo $kot['table_id'];?> <?php echo $kot['take_away_id'] > 0 ? 'take-away' : '';?> <?php echo $kot['delivery_id'] > 0 ? 'delivery' : '';?>">
						        <a href="javascript:void(0)" class="<?php echo $color_array[rand(0,4)];?>">
						      		<span class="remove-kot" data-id="<?php echo $kot['id'];?>"><i class="fa fa-remove"></i></span>
							        <h2>KOT : <?php echo $kot['display_number'];?></h2>
							        <div>
							        	<?php if ($kot['take_away_id'] > 0) : ?>
							        		<small>Take Away</small>
							        	<?php elseif ($kot['delivery_id'] > 0) : ?>
							        		<small>Delivery</small>
							        	<?php else : ?>
							        		<small><?php echo $kot['table_name'];?></small>
							        	<?php endif; ?>
							        	<small><?php echo $kot['created_on'];?></small>
						      			<small><?php echo $kot['name'];?></small>
							        </div>
								    <div class="<?php echo (count($kot_items[$kot['id']]) > 4) ? 'slimscroll-kot kot-position' : '';?>"> 
								        <?php $i=0; if (isset($kot_items[$kot['id']]) && $kot_items[$kot['id']] != null) : 
								        	foreach($kot_items[$kot['id']] as $item): $i++;?>
								        	<?php if ($item['quantity'] != $item['returned_quantity']) { ?>
									        	<div class="kot-item" style="display:flex; justify-content:space-between; align-items:baseline;">
									        		<div class="kot-parent">
										        		<div class="kot-img">
										        			<?php if ($item['image'] != '') {
	                                                            if (file_exists(Yii::$app->params['upload_path']['upload'] . $item['image'])) { ?>
	                                                            
	                                                            <img class="img-responsive" src="<?php echo Yii::$app->params['upload_load_path']['upload'] . $item['image'];?>">
	                                                            <?php }else{ ?>
	                                                            <img class="img-responsive" src="<?php echo Yii::$app->params['upload_load_path']['image'];?>no-image.png">
	                                                            <?php }
	                                                            } else { ?>
	                                                            <img class="img-responsive" src="<?php echo Yii::$app->params['upload_load_path']['image'];?>no-image.png">
	                                                            
                                                            <?php } ?>
										        		</div>
										        		<div class="kot-desc">
												        	<p class="item-<?php echo $item['item_id'].'-'.$item['type'];?>">
											        		<?php if($item['type'] == Yii::$app->params['item_type']['regular']) 
											        			{
											        				echo $i .'. '. $item['item_name']; 
											        			}
											        			else 
											        			{
											        				echo $i .'. '. $item['special_item_name'];
											        			} ?> &nbsp; 
											        		#<?php echo $item['quantity'];?> &nbsp;
											        		<?php echo ($item['returned_quantity'] > 0) ? '('.$item['returned_quantity'].' Cancelled)' : '';?> </p>
												        </div>
												        <div class="kot-remove">
												        	<span class="remove-kot-item" data-id="<?php echo $item['id'];?>"><i class="fa fa-trash"></i></span>
												        </div>
												    </div>
										        </div>
										       <?php } ?>
								        <?php endforeach; endif; ?>
						      		</div>
						      	</a>
						    </div>
						<?php endif; ?>
				    <?php endforeach; ?>

				</div>
				<?php endif; ?>
			</div>
			<a href="javascript:void(0);" class="btn btn-sm btn-round btn-info btn-float font-size-18">
				<?php foreach($kot_types as $kot_type): ?>
					<?php 
						if(!isset($_GET['type'])):
							echo "ALL"; break;
						elseif($_GET['type'] == $kot_type['slug']) : 
							echo ucwords($kot_type['name']); break;
						endif;
					?>
				<?php endforeach; ?>
			</a>
			<a href="#" data-toggle="modal" data-target=".modal-kot-type-sorting" class="btn btn-sm btn-round btn-success btn-float btn-float-2"><i class="fa fa-bars"></i></a>
			<a href="#" data-toggle="modal" data-target=".modal-kot-sorting" class="btn btn-sm btn-round btn-primary btn-float btn-float-3"><i class="fa fa-th-large"></i></a>
			<a href="#" class="btn btn-sm btn-round btn-danger btn-float-4 btn-float font-size-18 refresh-sorting"><i class="fa fa-refresh"></i></a>
        </div>
    </div>
</div>

<div class="modal modal-aside fade horizontal right modal-kot-sorting" aria-hidden="false" role="dialog" tabindex="-1">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header theme-bg-color" style="padding:9px 7px;">
				<button type="button" class="btn btn-default btn-success font-size-18 btn-sort" data-tab="table-one">
                    <span aria-hidden="true">Tables</span>
                </button>
                &nbsp;
                <button type="button" class="btn btn-default font-size-18 btn-sort" data-tab="menu-item-two">
                    <span aria-hidden="true">Menu Item</span>
                </button>
                <button type="button" class="btn btn-danger pull-right font-size-18" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">x</span>
                </button>
            </div>
            <div class="modal-body padding-0">
				<div class="sort-content">
				    <div class="sort-pane active" id="table-one">
					    <div class="list-group bg-blue-grey-100 bg-inherit slimscroll-sort sort-position">
					    	<a class="list-group-item sorting-by" href="javascript:void(0)" data-type="take-away" data-index="0">Take Away</a>
					    	<a class="list-group-item sorting-by" href="javascript:void(0)" data-type="delivery" data-index="0">Delivery</a>
							<?php if ($tables != null) : 
								foreach($tables as $table): ?>
								<a class="list-group-item sorting-by" href="javascript:void(0)" data-type="table" data-index="<?php echo $table['id'];?>"><?php echo $table['table_name'];?></a>
							<?php endforeach; endif; ?>
					    </div>
				    </div>
				    <div class="sort-pane" id="menu-item-two">
				      	<div class="list-group bg-blue-grey-100 bg-inherit slimscroll-sort sort-position">
						  	<?php if ($menu_items != null) : 
								foreach($menu_items as $item): ?>
								<a class="list-group-item sorting-by" href="javascript:void(0)" data-type="menu-item" data-index="<?php echo $item['id'];?>-0"><?php echo $item['name'];?></a>
							<?php endforeach; endif; ?>
						</div>
				    </div>
				</div>
                <div class="clearfix"></div>
            </div>
        </div>
    </div>
</div>

<div class="modal modal-aside fade horizontal right modal-kot-type-sorting" aria-hidden="false" role="dialog" tabindex="-1">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header theme-bg-color" style="padding:9px 7px;">
            	<h4 class="modal-title color-white">KOT TYPES
                <button type="button" class="btn btn-danger pull-right font-size-18" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">x</span>
                </button></h4>
            </div>
            <div class="modal-body padding-0">
				<div class="list-group bg-blue-grey-100 bg-inherit">
					<?php $current_url = Yii::$app->params['domain'] . 'kot/'; ?>
			    	<a class="list-group-item" href="<?= $current_url ?>">All KOTs</a>
			    	<?php if ($kot_types != '') { 
			    		foreach($kot_types as $ktype) :?>
			    		<a class="list-group-item" href="<?= $current_url . '?type=' . $ktype['slug'] ?>"><?= ucwords($ktype['name']) ?> KOTs</a>
			    	<?php endforeach; } ?>
				</div>
                <div class="clearfix"></div>
            </div>
        </div>
    </div>
</div>

<script>
	$(function () {
		$('.slimscroll-sort').slimScroll({
		    start: $('.sort-position'),
		    height: "<?php echo $height;?>",
		    alwaysVisible: 'true'
		});
	});
</script>