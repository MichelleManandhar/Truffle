<?php
$baseUrl = Yii::$app->request->baseUrl;

$this->registerCssFile($baseUrl . '/assets/plugins/x-editable/css/bootstrap-editable.css');
$this->registerJsFile($baseUrl . '/assets/plugins/x-editable/js/bootstrap-editable.min.js');

$this->registerJsFile($baseUrl . '/assets/plugins/slick-carousel/slick.min.js');
$this->registerCssFile($baseUrl . '/assets/plugins/slick-carousel/slick.min081a.css');
$this->registerJsFile($baseUrl . '/assets/plugins/slick-carousel/carousel.min.js');

$this->registerCssFile($baseUrl . '/assets/css/workplace.css');
$this->registerCssFile($baseUrl . '/assets/css/order-v1.css');

$this->registerJsFile($baseUrl . '/assets/software/order.js');
$this->registerJsFile($baseUrl . '/assets/software/take-away.js');

$this->registerJsFile($baseUrl . '/assets/plugins/typeahead-js/bootstrap3-typeahead.min.js');
$this->registerJsFile($baseUrl . '/assets/js/users.min.js');
$this->registerJsFile($baseUrl . '/assets/software/debtor.js');
$this->registerJsFile($baseUrl . '/assets/software/debtor-auto-list.js');

$this->registerJsFile($baseUrl . '/assets/software/print-bill.js');

$this->title = Yii::$app->params['system'] . ' | Take Away Desk';

$csrf_name 	= Yii::$app->request->csrfParam;
$csrf_token = Yii::$app->request->csrfToken;

?>

<div class="page-content container-fluid">
	<form action="<?php echo $baseUrl;?>/order/make" class="order-desk" method="post" >
		<input type="hidden" name="<?php echo $csrf_name; ?>" value="<?php echo $csrf_token; ?>" />
		<input type="hidden" name="occupy_id" class="hidden-occupy-id" value="" />
		<input type="hidden" name="delivery_id" class="hidden-delivery-id" value="" />
		<input type="hidden" name="take_away_id" class="hidden-take-away-id" value="<?php echo $take_away['id']; ?>" />
		<input type="hidden" name="pick_up_id" class="hidden-pick-up-id" value="" />
		<input type="hidden" name="delivery_id" class="hidden-delivery-id" value="" />
		<input type="hidden" name="payment_type" class="hidden-payment-type" value="0" />
		<input type="hidden" name="table_id" class="hidden-table-id" value="" />
		<input type="hidden" name="floor_id" class="hidden-floor-id" value="" />
		<input type="hidden" name="customer_pax" class="hidden-customer-pax" value="" />
		<input type="hidden" name="change_amount" class="hidden-change-amount" value="0" />
		<input type="hidden" name="received_amount" class="hidden-received-amount" value="0" />

		<div class="row">
			<div class="col-lg-4 col-md-4 col-sm-5 col-xs-12 padding-0">
				<div class="panel panel-bordered">
					<div class="panel-heading">
						<div class="row">
							<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
				              	<div class="container-fluid">
					              	<form autocomplete="off">
					              		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
							                <div class="form-group form-material margin-bottom-10 custom-form">
							                  	<input type="text" class="form-control send-data empty-this customer-name" name="customer_name" placeholder="Name" autocomplete="off" value="<?php if($take_away['customer_name'] != null){echo $take_away['customer_name'];} ?>" />
							                </div>
						                </div>
						                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
							                <div class="form-group form-material margin-bottom-10 custom-form">
							                  	<input type="number" class="form-control send-data empty-this customer-pan" name="customer_phone" placeholder="Phone" value="<?php if($take_away['customer_phone'] != 0){echo $take_away['customer_phone'];} ?>" />
							                </div>
						                </div>
						                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
							                <div class="form-group form-material margin-bottom-10 custom-form">
							                  	<input type="number" class="form-control send-data empty-this customer-pan" name="customer_pan" placeholder="Pan" value="<?php if($take_away['customer_pan'] != 0){echo $take_away['customer_pan'];} ?>" />
							                </div>
						                </div>
						                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
							                <div class="form-group form-material margin-bottom-10 custom-form">
							                  	<input type="text" class="form-control send-data empty-this customer-address" name="customer_address" placeholder="Address" autocomplete="off" value="<?php if($take_away['customer_address'] != null){echo $take_away['customer_address'];} ?>" />
							                </div>
						                </div>
						            </form>
					            </div>
				            </div>
				        </div>
		            </div>
		            <div class="panel-body">
		            	<div class="nav-tabs-horizontal">
		                  	<ul class="nav nav-tabs list-tab nav-justified" data-plugin="nav-tabs" role="tablist">
			                    <li class="active" role="presentation"><a data-toggle="tab" href="#order-list" aria-controls="exampleTabsTwo"
			                      role="tab">Order list</a></li>
			                    <li role="presentation"><a data-toggle="tab" href="#kot-list" aria-controls="exampleTabsThree"
			                      role="tab">KOT list</a></li>
			                    <li role="presentation"><a data-toggle="tab" href="#all-list" aria-controls="exampleTabsOne"
			                      role="tab">Billing List</a></li>
		                  	</ul>
		                    <div class="tab-content padding-top-20">
			                    <div class="tab-pane active" id="order-list" role="tabpanel">
			                      	<div class="scroll-height-400 slimscrollstart-position">
						              	<div class="example table-responsive margin-0">
							              	<form action="<?php echo $baseUrl;?>/kot/send" class="send-kot-form" method="post" >
												<input type="hidden" name="<?php echo Yii::$app->request->csrfParam; ?>" value="<?php echo Yii::$app->request->csrfToken; ?>" />
												<input type="hidden" name="occupy_id" class="hidden-occupy-id" value="" />
												<input type="hidden" name="delivery_id" class="hidden-delivery-id" value="" />
												<input type="hidden" name="pick_up_id" class="hidden-pick-up-id" value="" />
												<input type="hidden" name="take_away_id" class="hidden-take-away-id" value="<?php echo $take_away['id']; ?>" />
												<input type="hidden" name="table_id" class="hidden-table-id" value="" />
												<input type="hidden" name="floor_id" class="hidden-floor-id" value="" />

								                <table class="table">
								                    <thead>
									                    <tr>
									                        <th>Name</th>
									                        <th class="th-qty-width">Quantity</th>
									                    </tr>
								                    </thead>
								                    <tbody class="temp-order-list">
						                    		<?php 
								                    if($temp_order_list != null):
								                    	$selected_count = 0; $total = 0;
									                    foreach ($temp_order_list as $order_list): $selected_count++; 
									                    ?>
								                    	<?php if($order_list['type'] != Yii::$app->params['item_type']['special']) : ?>
									                    	<tr class="listed-item <?php echo $order_list['slug']; ?>" data-list="order_list" data-item="<?php echo $order_list['slug']; ?>" data-price="<?php echo $order_list['price'] ?>" >
									                            <input type="hidden" name="items[<?php echo $selected_count; ?>][item]" class="item" value="<?php echo $order_list['slug']; ?>">
									                            <input type="hidden" name="items[<?php echo $selected_count; ?>][item_id]" class="item-id" value="<?php echo $order_list['item_id']; ?>">
									                            <input type="hidden" name="temp_order_list_id" class="temp-order-list-id" value="<?php echo $order_list['id']; ?>">
									                            <input type="hidden" name="items[<?php echo $selected_count; ?>][price]" class="hidden-price" value="<?php echo $order_list['price']; ?>" >
									                            <input type="hidden" name="items[<?php echo $selected_count; ?>][type]" class="hidden-type" value="<?php echo $order_list['type']; ?>" >

									                         	<td><?php echo $order_list['name'] ?></td>
									                            <td>
									                                <input type="number" class="form-control custom-input quantity" name="items[<?php echo $selected_count; ?>][quantity]" data-plugin="TouchSpin" data-min="1" data-max="1000" data-stepinterval="50" data-maxboostedstep="10000000" value="<?php echo $order_list['quantity']; ?>" />
									                            </td>
									                            <td class="padding-right-0 padding-left-0"><button class="btn close-btn pull-right remove-item" type="button"><i class="fa fa-close"></i></button></td>
								                            </tr>
								                        <?php else: ?>
								                        	<tr class="listed-item <?php echo $order_list['special_item_id']; ?>" data-list="order_list" data-item="<?php echo $order_list['special_item_id']; ?>" data-price="<?php echo $order_list['price'] ?>" >
									                            <input type="hidden" name="items[<?php echo $selected_count; ?>][item]" class="item" value="<?php echo $order_list['special_item_id']; ?>">
									                            <input type="hidden" name="items[<?php echo $selected_count; ?>][item_id]" class="item-id" value="<?php echo $order_list['special_item_id']; ?>">
									                            <input type="hidden" name="temp_order_list_id" class="temp-order-list-id" value="<?php echo $order_list['id']; ?>">
									                            <input type="hidden" name="items[<?php echo $selected_count; ?>][price]" class="hidden-price" value="<?php echo $order_list['special_item_price']; ?>" >
									                            <input type="hidden" name="items[<?php echo $selected_count; ?>][type]" class="hidden-type" value="<?php echo $order_list['type']; ?>" >

									                         	<td>Special-Item(<?php echo $order_list['special_item_name'] ?>)</td>
									                            <td>
									                                <input type="number" class="form-control custom-input quantity" name="items[<?php echo $selected_count; ?>][quantity]" data-plugin="TouchSpin" data-min="1" data-max="1000" data-stepinterval="50" data-maxboostedstep="10000000" value="<?php echo $order_list['quantity']; ?>" />
									                            </td>
									                            <td class="padding-right-0 padding-left-0"><button class="btn close-btn pull-right remove-item" type="button"><i class="fa fa-close"></i></button></td>
								                            </tr>
								                        <?php endif; ?>
									                    	<!-- <tr class="listed-item <?php echo $order_list['slug']; ?>" data-list="order_list" data-item="<?php echo $order_list['slug']; ?>" data-price="<?php echo $order_list['price'] ?>" >
									                            <input type="hidden" name="items[<?php echo $selected_count; ?>][item]" class="item" value="<?php echo $order_list['slug']; ?>">
									                            <input type="hidden" name="temp_order_list_id" class="temp-order-list-id" value="<?php echo $order_list['id']; ?>">
									                            <input type="hidden" name="items[<?php echo $selected_count; ?>][price]" class="hidden-price" value="<?php echo $order_list['price']; ?>" >

									                         	<td><?php echo $order_list['name'] ?></td>
									                            <td>
									                                <input type="number" class="form-control custom-input quantity" name="items[<?php echo $selected_count; ?>][quantity]" data-plugin="TouchSpin" data-min="1" data-max="1000" data-stepinterval="50" data-maxboostedstep="10000000" value="<?php echo $order_list['quantity']; ?>" />
									                            </td>
									                            <td class="padding-right-0 padding-left-0"><button class="btn close-btn pull-right remove-item" type="button"><i class="fa fa-close"></i></button></td>
								                            </tr> -->
								                    <?php endforeach; endif;?>
								                    </tbody>
								                </table>
							                </form>
				                		</div>
				                	</div>
				                	<div class="grey-divider"></div>

				                	<button type="button" class="btn btn-success btn-outline margin-top-10 get-special-menu-item">Special Order</button>

				                	<button type="button" data-loading-text="Sending..." class="btn btn-primary btn-outline send-kot margin-top-10 pull-right">Send KOT</button>
			                    </div>

			                    <div class="tab-pane" id="kot-list" role="tabpanel">
			                      	<div class="scroll-height-450 slimscrollstart-position-450">
						              	<div class="example table-responsive margin-0">
							              	<div class="all-kot-list">
							              		<?php $has_data = false;
							              			if($kot != null):
							              			foreach ($kot as $k): 
							                			if($k['status'] == Yii::$app->params['kot_status']['return']) :  $has_data = true; 
							                			endif;

							                			if($k['status'] == 0) : ?>
										              		<h5 class="padding-left-5">
										              			<span class="pull-left">
										              				KOT : <?php echo $k['display_number']; ?>
										              			</span>
										              			<span class="pull-right font-size-12 small"><?php echo $k['created_on']; ?></span>
										              		</h5>
										              		<table class="table">
										              			<thead class="kot-list-head">
												                    <tr>
												                        <th>Name</th>
												                        <th class="th-qty-width">Quantity</th>
												                    </tr>
											                    </thead>
											              		<?php foreach($k->kotItemRelation as $kot_item): ?>
											              		<?php if($kot_item['type'] == Yii::$app->params['item_type']['regular']) : ?>
												                    <tbody class="kot-list-body">
												                    	<tr>
													                        <td><?php echo $kot_item['item']['name']; ?></td>
													                        <td>
													                        	<?php echo $kot_item['quantity']; ?>
													                        	<?php echo ($kot_item['returned_quantity'] != 0) ? '('.$kot_item['returned_quantity'].' cancelled)' : ''; ?>
													                        </td>
												                    	</tr>
												                    </tbody>
												                <?php else: ?>
												                	<tbody class="kot-list-body">
												                    	<tr>
													                        <td>Special-Item(<?php echo $kot_item['specialItem']['name']; ?>)</td>
													                        <td>
													                        	<?php echo $kot_item['quantity']; ?>
													                        	<?php echo ($kot_item['returned_quantity'] != 0) ? '('.$kot_item['returned_quantity'].' cancelled)' : ''; ?>
													                        </td>
												                    	</tr>
												                    </tbody>
												                <?php endif; ?>

										              			<?php endforeach; ?>
									              			</table>
								              			<?php endif; ?>
							              		<?php endforeach; else : ?>
										                <div class="no-item">
										                	<p>No items available.</p>
										                </div>
							            		<?php endif; ?>
							              	</div>
				                		</div>
				                	</div>

				                	<div class="pull-right" <?php echo ($kot == null)? 'style:"display:none;"' : ''; ?> >
				                		<?php if($has_data == true) : ?>
				                			<button type="button" class="btn btn-success returned-kot-list" data-toggle="modal" data-target=".modal-returned-kot-list">View Returned KOT</button>
				                		<?php endif; ?>

				                		<button type="button" class="btn btn-primary return-kot" data-toggle="modal" data-target=".modal-return-kot">Return KOT</button>
				                	</div>
			                    </div>

			                    <div class="tab-pane" id="all-list" role="tabpanel">
			                      	<div class="scroll-height-200 slimscrollstart-position-200">
						              	<div class="example table-responsive margin-0">
							                <table class="table">
							                    <thead>
								                    <tr>
								                        <th>Name</th>
								                        <th>Price</th>
								                        <th class="th-qty-width">Quantity</th>
								                        <th>Total</th>
								                    </tr>
							                    </thead>

							                    <tbody class="order-list">
							                    <?php 
							                    if($temp_items != null):
							                    	$selected_count = 0; $total = 0;
								                    foreach ($temp_items as $temp_item): $selected_count++; 
								                    	?>
								                        <?php if($temp_item['type'] == Yii::$app->params['item_type']['regular']) : 
								                        	$total 	= $total + $temp_item['price'] * $temp_item['quantity']; 
								                        	?>
								                    			<tr class="listed-item <?php echo $temp_item['slug']; ?>" data-list="all_list" data-item="<?php echo $temp_item['slug']; ?>" data-price="<?php echo $temp_item['price'] ?>">
										                            <input type="hidden" name="items[<?php echo $selected_count; ?>][item]" class="item" value="<?php echo $temp_item['item_id']; ?>">
										                            <input type="hidden" name="items[<?php echo $selected_count; ?>][item_id]" class="item-id" value="<?php echo $temp_item['item_id']; ?>">
										                            <input type="hidden" name="items[<?php echo $selected_count; ?>][price]" class="item-price" value="<?php echo $temp_item['price']; ?>">
										                            <input type="hidden" class="total-val" value="<?php echo $temp_item['price']*$temp_item['quantity']; ?>">
										                            <input type="hidden" class="temp-item-id" value="<?php echo $temp_item['id']; ?>">
					                                                <input type="hidden" name="items[<?php echo $selected_count; ?>][type]" class="hidden-type" value="<?php echo $temp_item['type']; ?>" >

										                         	<td><?php echo $temp_item['name'] ?></td>
										                            <td><?php echo $temp_item['price'] ?></td>
										                            <td>
										                                <input type="number" readonly class="form-control quantity custom-quantity-input" name="items[<?php echo $selected_count; ?>][quantity]" value="<?php echo $temp_item['quantity']; ?>" />
										                            </td>
										                            <td><span class="total"><?php echo $temp_item['price']*$temp_item['quantity']; ?></span></td>
									                            </tr>
									                    <?php else: ?>
									                    	<?php $total = $total + $temp_item['special_item_price'] * $temp_item['quantity'];  ?>
								                    			<tr class="listed-item <?php echo $temp_item['special_item_id']; ?>" data-list="all_list" data-item="<?php echo $temp_item['special_item_id']; ?>" data-price="<?php echo $temp_item['special_item_price'] ?>">
										                            <input type="hidden" name="items[<?php echo $selected_count; ?>][item]" class="item" value="<?php echo $temp_item['special_item_id']; ?>">
										                            <input type="hidden" name="items[<?php echo $selected_count; ?>][item_id]" class="item-id" value="<?php echo $temp_item['special_item_id']; ?>">
										                            <input type="hidden" name="items[<?php echo $selected_count; ?>][price]" class="item-price" value="<?php echo $temp_item['special_item_price']; ?>">
										                            <input type="hidden" class="total-val" value="<?php echo $temp_item['special_item_price']*$temp_item['quantity']; ?>">
										                            <input type="hidden" class="temp-item-id" value="<?php echo $temp_item['id']; ?>">
					                                                <input type="hidden" name="items[<?php echo $selected_count; ?>][type]" class="hidden-type" value="<?php echo $temp_item['type']; ?>" >

										                         	<td>Special-Item(<?php echo $temp_item['special_item_name'] ?>)</td>
										                            <td><?php echo $temp_item['special_item_price'] ?></td>
										                            <td>
										                                <input type="number" readonly class="form-control quantity custom-quantity-input" name="items[<?php echo $selected_count; ?>][quantity]" value="<?php echo $temp_item['quantity']; ?>" />
										                            </td>
										                            <td><span class="total"><?php echo $temp_item['price']*$temp_item['quantity']; ?></span></td>
									                            </tr>
									                    <?php endif; ?>
								                <?php endforeach; endif;?>
							                    </tbody>
							                </table>
				                		</div>
				                	</div>

				                	<div class="panel-footer">

				                		<?php 
				                			/*these commented codes are required if service charge is calculated before discount*/
				                			/*
					                			$discount_given_percent = 0;
					                			if($temp_items != null && $total > 0):
					                				$sub_total 				= $total;
					                				$service_charge_amount 	= ($service_charge_rate / 100) * $sub_total;
					                				$gross_amount 			= $sub_total + $service_charge_amount;

					                				$discount_given_percent = round((($break_down_total['discount_amount'] / $gross_amount) * 100) , 2);

						                			$taxable_amount 		= $gross_amount - $break_down_total['discount_amount'];
					                				$vat_amount 			= ($taxable_amount * $vat_rate) / 100;

					                				$grand_total 		= $taxable_amount + $vat_amount; $break_down_total['discount_amount'];
					                			endif;
				                			*/
				                			/*up to these commented codes are required if service charge is calculated before discount*/

				                			/*these commented codes are required if discount is calculated before service charge*/
				                			$discount_given_percent = 0;
				                			if($temp_items != null && $total > 0):
				                				$sub_total 				= $total;
				                				$discount_given_percent = round((($break_down_total['discount_amount'] / $sub_total) * 100) , 2);
				                				$gross_amount 			= $sub_total - $break_down_total['discount_amount'];

				                				$service_charge_amount 	= ($service_charge_rate / 100) * $gross_amount;

				                				$taxable_amount 		= $gross_amount + $service_charge_amount;
				                				$vat_amount 			= ($taxable_amount * $vat_rate) / 100;

				                				$grand_total 		= $taxable_amount + $vat_amount;
				                			endif;
				                			/*up to these commented codes are required if discount is calculated before service charge */
				                		?>

						            	<div class="row">
						            		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
							            		<div class="mrg-top-15">
								            		<div class="row">
								            			<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6"><span class="font-weight-500 span-margin-left-0">Sub Total</span>
								            			</div>
								            			<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
								            				<span class="margin-left-35 btn-l991 sub-total zero-price span-margin-left-0">
								            					<?php if($temp_items != null): ?> Rs. <?php echo number_format($sub_total , 2 ); ?> 
								            					<?php else: ?>
								            						Rs. 0
								            					<?php endif; ?>
								            				</span>
							            				</div>

							            				<!-- Break Down Information -->
								            			<input type="hidden" class="break-down-sub-total zero-this" name="break_down_sub_total" value="<?php echo ($break_down_total['sub_total'] != 0) ? round($break_down_total['sub_total'] , 2) : 0; ?>">
								            			<!-- Break Down Information -->
							            			</div>

							            			<!-- these commented codes are required if discount is calculated before discount service charge  -->
							            			<div class="row discount-form" style="display:none;">
								            			<div class="padding-top-5">
									            			<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
									            				<div class="row">
									            					<div class="col-lg-4 col-md-12 col-sm-12 col-xs-12">
									            						<span class="font-weight-500 span-margin-left-0">Discount</span>
									            					</div>
									            					<div class="col-lg-8 col-md-12 col-sm-12 col-xs-12">
									            						<span class="custom-touchspin">
									            							<input type="number" class="form-control discount zero-this" name="discount" data-plugin="TouchSpin" data-min="0" data-max="0" data-stepinterval="50" data-maxboostedstep="10000000" value="0" data-step="5" />
									            						</span>
									            					</div>
									            				</div>
									            			</div>
									            			<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
									            				<div class="form-group margin-bottom-5">
										            				<div class="input-group">
										            					<span class="input-group-btn">
										                                    <a class="btn btn-default">Rs.</a>
										                                </span>
										                                <input type="number" name="discount_amount" class="form-control discount-amount" value="0">
									                                </div>
								                                </div>
									            			</div>
								            			</div>
								            		</div>

								            		<div class="discount-amount-exist">
									            		<?php 
									            			if ($break_down_total['discount_amount'] != 0) : ?>
											            		<div class="row">
											            			<div class="padding-top-5">
												            			<div class="col-lg-6 col-md-4 col-sm-6 col-xs-6"><span class="font-weight-500 span-margin-left-0">
												            			Total Discount allowed
												            			</span></div>
												            			<div class="col-lg-6 col-md-4 col-sm-6 col-xs-6"><span class="margin-left-35 total-discount-amount-view zero-price span-margin-left-0">
												            				Rs. <?php echo number_format($break_down_total['discount_amount'], 2); ?>
												            			</span></div>
											            			</div>
											            		</div>
									            		<?php endif; ?>
								            		</div>
								            		<input type="hidden" class="total-discount-amount zero-this" name="total_discount_amount" value="<?php echo ($break_down_total['discount_amount'] != 0) ? round($break_down_total['discount_amount'] , 2) : 0; ?>">
							            			<?php if($service_charge_rate != 0  && $service_charge_rate_is_active != 0): ?>
							            				<div class="row">
									            			<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6"><span class="font-weight-500 span-margin-left-0">Service Charge(<?php echo $service_charge_rate; ?>%)</span>
									            			</div>
									            			<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
									            				<span class="margin-left-35 btn-l991 service-charge-amount zero-price span-margin-left-0">
									            					<?php if($temp_items != null): ?> Rs. <?php echo number_format($service_charge_amount , 2); ?> 
									            					<?php else: ?>
									            						Rs. 0
									            					<?php endif; ?>
									            				</span>
								            				</div>
								            			</div>

								            			<!-- Break Down Information -->
								            			<input type="hidden" class="break-down-service-charge-total zero-this" name="break_down_sub_total" value="<?php echo ($break_down_total['service_charge_amount'] != 0) ? round($break_down_total['service_charge_amount'] , 2) : 0; ?>">
								            			<!-- Break Down Information -->
							            			<?php endif; ?>
								            		<!-- upto these commented codes are required if discountis calculated before service charge  -->


							            			<!-- these commented codes are required if service charge is calculated before discount -->
							            			<!-- 
								            			<?php if($service_charge_rate != 0  && $service_charge_rate_is_active != 0): ?>
								            				<div class="row">
										            			<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6"><span class="font-weight-500 span-margin-left-0">Service Charge(<?php echo $service_charge_rate; ?>%)</span>
										            			</div>
										            			<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
										            				<span class="margin-left-35 btn-l991 service-charge-amount zero-price span-margin-left-0">
										            					<?php if($temp_items != null): ?> Rs. <?php echo number_format($service_charge_amount , 2); ?> 
										            					<?php else: ?>
										            						Rs. 0
										            					<?php endif; ?>
										            				</span>
									            				</div>
									            			</div>

									            			<input type="hidden" class="break-down-service-charge-total zero-this" name="break_down_sub_total" value="<?php echo ($break_down_total['service_charge_amount'] != 0) ? round($break_down_total['service_charge_amount'] , 2) : 0; ?>">
								            			<?php endif; ?>

									            		<div class="row discount-form" style="display:none;">
									            			<div class="padding-top-5">
										            			<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
										            				<div class="row">
										            					<div class="col-lg-4 col-md-12 col-sm-12 col-xs-12">
										            						<span class="font-weight-500 span-margin-left-0">Discount</span>
										            					</div>
										            					<div class="col-lg-8 col-md-12 col-sm-12 col-xs-12">
										            						<span class="custom-touchspin">
										            							<input type="number" class="form-control discount zero-this" name="discount" data-plugin="TouchSpin" data-min="0" data-max="0" data-stepinterval="50" data-maxboostedstep="10000000" value="0" data-step="5" />
										            						</span>
										            					</div>
										            				</div>
										            			</div>
										            			<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
										            				<div class="form-group margin-bottom-5">
											            				<div class="input-group">
											            					<span class="input-group-btn">
											                                    <a class="btn btn-default">Rs.</a>
											                                </span>
											                                <input type="number" name="discount_amount" class="form-control discount-amount" value="0">
										                                </div>
									                                </div>
										            			</div>
									            			</div>
									            		</div>

									            		<div class="discount-amount-exist">
										            		<?php 
										            			if ($break_down_total['discount_amount'] != 0) : ?>
												            		<div class="row">
												            			<div class="padding-top-5">
													            			<div class="col-lg-6 col-md-4 col-sm-6 col-xs-6"><span class="font-weight-500 span-margin-left-0">
													            			Total Discount allowed
													            			</span></div>
													            			<div class="col-lg-6 col-md-4 col-sm-6 col-xs-6"><span class="margin-left-35 total-discount-amount-view zero-price span-margin-left-0">
													            				Rs. <?php echo number_format($break_down_total['discount_amount'], 2); ?>
													            			</span></div>
												            			</div>
												            		</div>
										            		<?php endif; ?>
									            		</div>
									            		<input type="hidden" class="total-discount-amount zero-this" name="total_discount_amount" value="<?php echo ($break_down_total['discount_amount'] != 0) ? round($break_down_total['discount_amount'] , 2) : 0; ?>">
								            		-->
								            		<!-- upto these commented codes are required if service charge is calculated before discount -->

								            		<div class="row">
								            			<div class="padding-top-5">
									            			<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6"><span class="font-weight-500 span-margin-left-0">Taxable Amount</span></div>
									            			<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6"><span class="margin-left-35 btn-l991 taxable-total zero-price span-margin-left-0">
									            				<?php if($temp_items != null): ?> Rs. <?php echo number_format($taxable_amount , 2 ); ?> 
								            					<?php else: ?>
								            						Rs. 0
								            					<?php endif; ?>
									            			</span></div>

									            			<!-- Break Down Information -->
									            			<input type="hidden" class="break-down-taxable-total zero-this" name="break_down_taxable_total" value="<?php echo round($break_down_total['taxable_amount'] , 2); ?>">
									            			<!-- Break Down Information -->
								            			</div>
								            		</div>

								            		<div class="row">
								            			<div class="padding-top-5">
									            			<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6"><span class="font-weight-500 span-margin-left-0">VAT Amount (<?php echo $vat_rate; ?>%)</span></div>
									            			<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6"><span class="margin-left-35 btn-l991 vat-total zero-price span-margin-left-0">
									            				<?php if($temp_items != null): ?> Rs. <?php echo number_format($vat_amount , 2 ); ?> 
								            					<?php else: ?>
								            						Rs. 0
								            					<?php endif; ?>
									            			</span></div>
								            			</div>

								            			<!-- Break Down Information -->
									            		<input type="hidden" class="break-down-vat-total zero-this" name="break_down_sub_total" value="<?php echo ($break_down_total['vat_amount'] != 0) ? round($break_down_total['vat_amount'] , 2) : 0; ?>">
									            		<!-- Break Down Information -->
								            		</div>

								            		<div class="grey-divider span-margin-left-0"></div>

								            		<!-- grand total calculation -->
								            		<?php if($temp_items != null): 

															$total 			= round($grand_total);
															$round_value 	= round(($total - $grand_total) , 2);
					            						?>
					            					<?php else: 
					            							$grand_total = 0;
					            							$round_value = 0;
					            						 endif; ?>
								            		<div class="row">
								            			<div class="padding-top-5">
									            			<div class="col-lg-6 col-md-5 col-sm-6 col-xs-6"><span class="font-weight-500 color-coffee span-margin-left-0">Grand Total</span></div>
									            			<div class="col-lg-5 col-md-7 col-sm-6 col-xs-6">
										            			<span class="btn-l991 color-coffee grand-total zero-price span-margin-left-0">
										            			Rs. <?php echo ($grand_total > 0) ? number_format($total) : 0; ?>
										            			</span>
																<span class="round-value">
																	(<?php echo $round_value; ?>)
																</span>
									            			</div>
								            			</div>
								            		</div>

								            		<div class="grey-divider span-margin-left-0"></div>
								            		
								            		<div class="break-down-paid-amount">
								            			<?php 
								            			if ($break_down_total['total'] != 0) : ?>
										            		<div class="row">
										            			<div class="padding-top-5">
											            			<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
												            			<button type="button" class="btn btn-success btn-xs view-partial-payment-detail" data-dismiss="modal">
	                                               		 				Total Paid Amount</button>
											            			</div>
											            			<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6"><span class="margin-left-35 btn-l991 color-coffee break-down-amount zero-price span-margin-left-0">
										            				Rs. <?php echo number_format($break_down_total['total'], 2); ?>
											            			</span></div>
										            			</div>
										            		</div>
								            			<?php endif; ?>

								            			<input type="hidden" class="total-paid-amount zero-this" name="total_paid" value="<?php echo round($break_down_total['total']); ?>">
								            		</div>

								            		<input type="hidden" class="vat-rate" value="<?php echo $vat_rate; ?>">
								            		<input type="hidden" class="service-charge-rate" value="<?php echo ($service_charge_rate_is_active != 0) ? $service_charge_rate : '0'; ?>">
								            		<input type="hidden" class="max-inv" value="<?php echo $max_inv;?>">
								            		<input type="hidden" class="main-total zero-this" name="total" value="0">

								            		
							            		</div>
							            	</div>	

							            	<div class="remaining-payment-exist">
						            			<?php if ($break_down_total['total'] != 0 && $temp_items != null) { ?>
						            					<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 margin-top-5"><span class="font-weight-500 color-coffee span-margin-left-0">Remaining Payment</span></div>
								            			<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 margin-top-5"><span class="margin-left-35 btn-l991 color-coffee remaining-payment zero-price span-margin-left-0">
								            				Rs. <?php echo number_format( round($grand_total - $break_down_total['total']), 2 ) ?>
								            			</span></div>
					            				<?php } ?>

					            				<input type="hidden" class="remaining-total zero-this" name="remaining_total" value="<?php echo round($grand_total - $break_down_total['total']); ?>">
						            		</div>	 				            
					            			
						            		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
						            			<div class="pull-left margin-top-30 btn-l991">
						            				<p class="font-weight-500 max-inv-text">Invoice no: <?php echo $max_inv;?></p>
						            			</div>
							            		<div class="custom-button margin-top-10 pull-right btn-l991">
							            			<button class="btn btn-number_format btn-warning btn-lg apply-discount not discount-btn" type="button" data-allow="false">
							            				<i class="icon fa-ticket font-size-24"></i>
							            			</button>

								            		<button class="btn btn-number_format btn-primary btn-lg order-this" type="button">
								            			<i class="icon fa-dollar font-size-20"></i>
								            		</button>

								            		<a href="<?php echo $baseUrl;?>/take-away/split-bill/?tid=<?php echo $take_away['id']; ?>" class="btn btn-primary btn-lg split-bill" type="button">
								            			<i class="icon fa-strikethrough font-size-20 margin-top-6"></i>
								            		</a>
							            		</div>
							            	</div>
						            	</div>
						            </div>
			                    </div>
		                    </div>
            			</div>
	            	</div>
				</div>
			</div>

			<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12 padding-0">
				<div class="panel panel-bordered margin-top-15-panel transparent">
					<div class="panel-body">
		            	<div class="menu-container scroll-height-600 slimscrollstart-position">
			            	<?php if ($categories != null) : $i=0;
					            	foreach($categories as $category) : $i++;
					            		$key = $category['id'];
					            	?>
						            	<div class="row">
						            		<div class="menu-margin-top-5">
							            		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 margin-bottom-20-sm">
							            			<p class="menu-category <?php echo ($i != 1) ? 'margin-left-15' : ''; ?>">
							            				<?php echo ucwords($category['category']);?> <?php echo '(' . ((isset($items[$key]) && $items[$key] != null) ? count($items[$key]) : 0) . ')';?>

							            				<?php if($i == 1 && isset($table) && $table['name'] != null) : ?>
							            					<span class="pull-right"><strong>Table name:</strong> <?php echo ucwords($table['name']); ?></span>
							            				<?php endif; ?>
							            				
							            			</p>
							            			
									                <div class="slider-menu <?php echo ($i != 1) ? 'custom-margin-slider' : ''; ?> <?php echo ($category['display_order'] == 1) ? 'double-menu' : '' ;?>" >
									                <?php if (isset($items[$key]) && $items[$key] != null) : 
											                $i=0;
											                foreach($items[$key] as $item) : $i++;
										                	if ($item['image'] != '') {
							                					if (file_exists(Yii::$app->params['upload_path']['upload'] . $item['image'])) {
							                							
						                							$image = Yii::$app->params['upload_load_path']['upload'] . $item['image'];
					                							}else{
					                								$image = Yii::$app->params['upload_load_path']['image'] . 'no-image.png';
					                							}
							                				}
							                				else {
							                					$image = Yii::$app->params['upload_load_path']['image'] . 'no-image.png';
							                				}
											                ?>
											                <?php if ($category['display_order'] == 1):?>
												                	<?php if ($i==1) : ?>
													                    <div>
														                	<?php endif;?>
														                        <div class="list-item select-item" data-item="<?php echo $item['slug'];?>" 
														                		data-name="<?php echo ucwords($item['name']);?>" data-price="<?php echo $item['price'];?>">
														                      		<div class="image-container">
														                      			<img class="image-full-width" src="<?php echo $image;?>" alt="<?php echo $item['name'];?>">
														                      		</div>
														                      		<div class="item-content" data-plugin="webuiPopover"
													                  				data-trigger="hover" data-placement="right" data-delay-show="300"
													                  				data-delay-hide="200" data-title="Description" data-content="<?php echo ($item['description'] != '' && $item['description'] != 'null') ? $item['description'] : '';?>">
														                      			<div class="item-content-overlay">
															                      			<p><?php echo ucwords($item['name']);?></p>
															                      			<p>Rs. <?php echo $item['price'];?></p>
															                      			<div class="clearfix"></div>
														                      			</div>
														                      		</div>	
														                      		<div class="clearfix"></div>
														                        </div>
														                    <?php if ($i==2) :  $i=0;?>
													                    </div>
												                	<?php endif;?>
											                <?php else: ?>
																<div>
											                        <div class="list-item select-item" data-item="<?php echo $item['slug'];?>" 
											                		data-name="<?php echo ucwords($item['name']);?>" data-price="<?php echo $item['price'];?>">
											                      		<div class="image-container">
											                      			<img class="image-full-width" src="<?php echo $image;?>" alt="<?php echo $item['name'];?>">
											                      		</div>
											                      		<div class="item-content" data-plugin="webuiPopover"
											                  				data-trigger="hover" data-placement="right" data-delay-show="300"
											                  				data-delay-hide="200" data-title="Description" data-content="<?php echo ($item['description'] != '' && $item['description'] != 'null') ? $item['description'] : '';?>">
											                      			<div class="item-content-overlay">
												                      			<p><?php echo ucwords($item['name']);?></p>
												                      			<p>Rs. <?php echo $item['price'];?></p>
												                      			<div class="clearfix"></div>
											                      			</div>
											                      		</div>	
											                      		<div class="clearfix"></div>
											                        </div>
											                    </div>
											                <?php endif; ?>
										                <?php endforeach; else : ?>
											                <div>
											                	<p>No items available.</p>
											                </div>
											            <?php endif; ?>
									                </div>
									            </div>
								            </div>
						            	</div>
							<?php endforeach; endif; ?>
						</div>
		            </div>
				</div>
			</div>
		</div>
	</form>
</div>

<!--  start of modal -->

<div class="modal fade modal-exchange" tabindex="-1" data-backdrop="static" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header theme-bg-color">
                <h4 class="modal-title color-white">Exchange
					<span class="inv-required pull-right"></span>
                </h4>
            </div>
            <div class="modal-body padding-top-15 padding-bottom-15 padding-right-30 padding-left-30">
            	<div class="row">
                	<form class="print-bill">
                		<input type="hidden" name="<?php echo $csrf_name; ?>" value="<?php echo $csrf_token; ?>" />
                		<input type="hidden" name="occupy_id" class="hidden-occupy-id" value="" />
                		<input type="hidden" name="delivery_id" class="hidden-delivery-id" value="" />
                		<input type="hidden" name="pick_up_id" class="hidden-pick-up-id" value="" />
                		<input type="hidden" name="take_away_id" class="hidden-take-away-id" value="<?php echo $take_away['id']; ?>" />
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-6 col-sm-6 col-lg-6">
                                	<div class="radio-custom radio-primary padding-left-40 margin-bottom-0">
					                  	<input type="radio" id="cash-payment" class="cash-payment" name="payment_type" value="<?php echo Yii::$app->params['payment_type']['cash']; ?>" checked>
					                  	<label for="cash-payment">Cash</label>
					                </div>
                                </div>
                                <div class="col-md-6 col-sm-6 col-lg-6">
                                     <button type="button" class="btn btn-info btn-xs item-wise-payment margin-top-10" data-dismiss="modal">
                                         <i class="icon fa-spoon"></i>Item Wise</button>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 col-sm-6 col-lg-6">
                                	<div class="radio-custom radio-primary padding-left-40 margin-bottom-0">
					                  	<input type="radio" id="credit-payment" class="credit-payment" name="payment_type" value="<?php echo Yii::$app->params['payment_type']['credit']; ?>">
					                  	<label for="credit-payment">Credit</label>
					                </div>
                                </div>
                                <div class="col-md-6 col-sm-6 col-lg-6">
                                    <button type="button" class="btn btn-success btn-xs advance-payment-btn margin-top-10" data-dismiss="modal">
                                        <i class="icon fa-user"></i>Advance</button>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 col-xs-6 col-sm-6 col-lg-6">
                                	<div class="radio-custom radio-primary padding-left-40 margin-bottom-0">
					                  	<input type="radio" id="card-payment" class="card-payment" name="payment_type" value="<?php echo Yii::$app->params['payment_type']['card']; ?>">
					                  	<label for="card-payment">Card</label>
					                </div>
                                </div>
                            </div>
                        </div>
	                    <div class="form-group">
	                        <label class="control-label">Bill Amount</label>
	                        <input type="number" readonly placeholder="Bill Amount" required class="form-control bill-amount empty-this" data-placement="left" data-toggle="tooltip" data-original-title="Bill Amount">
	                    </div>

	                    <div class="form-group bill-received-amount">
	                        <label class="control-label">Bill Received Amount</label>
	                        <input type="number" placeholder="Bill Received Amount" readonly required class="form-control already-received-amount" data-placement="left" data-toggle="tooltip" data-original-title="Bill Received Amount">
	                    </div>

	                    <div class="form-group required-amount">
	                        <label class="control-label">Payable Amount</label>
	                        <input type="number" placeholder="Payable Amount" readonly required class="form-control amount-required" data-placement="left" data-toggle="tooltip" data-original-title="Payable Amount">
	                    </div>

	                    <div class="form-group received-amount">
	                        <label class="control-label">Received Amount</label>
	                        <input type="number" placeholder="Received Amount" required class="form-control amount-received" data-placement="left" data-toggle="tooltip" data-original-title="Received Amount">
	                    </div>

                        <div class="form-group debtor-name" hidden="hidden">		
                            <label class="control-label">Debtor Name</label>
                            <div class="input-group auto-parent">
                                <input type="text" name="dr[from]" placeholder="Debtor Name" required class="form-control debtor-txt sub-input-group auto-show" data-placement="left" data-toggle="tooltip" data-original-title="Debtor Name">
                                <input type="hidden" name="dr[id]" class="auto-i hidden-debtor-id">

                                <span class="input-group-btn">
                                    <a class="btn btn-primary btn-auto-list" data-toggle="modal" data-target=".modal-debtors-list"><i class="icon fa-question" ></i></a>
                                </span>
                            </div>
                        </div>

                        <div class="form-group tip-amount">
	                        <label class="control-label">Tips Amount</label>
	                        <input type="number" placeholder="Tip Amount" class="form-control amount-tip" data-placement="left" data-toggle="tooltip" data-original-title="Tip Amount">
	                    </div>

	                    <div class="form-group change-amount">
	                        <label class="control-label">Change Amount</label>
	                        <input type="number" readonly placeholder="Change Amount" class="form-control amount-change" data-placement="left" data-toggle="tooltip" data-original-title="Change Amount">
	                    </div>
	                    
	                    <div class="form-group">
                            <button type="submit" data-type="save" class="btn btn-primary btn-xs pull-right margin-right-5 credit-order padding-top-5 padding-bottom-5 padding-left-10 padding-right-10" style="display:none"><i class="icon fa-save"></i> Print&Close</button>
	                    	<button type="submit" data-type="print" class="btn btn-primary btn-xs pull-right margin-right-5 make-order padding-top-5 padding-bottom-5 padding-left-10 padding-right-10"><i class="icon fa-print"></i> Print&Close</button>
	                    	<button type="button" class="btn btn-default btn-xs pull-right margin-right-5 padding-top-5 padding-bottom-5 padding-left-10 padding-right-10" data-dismiss="modal">Cancel</button>
	                    </div>
                    </form>
	            </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade modal-aside horizontal right modal-debtors-list custom-modal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog">
        <div class="modal-content">
            <div class="modal-header theme-bg-color">
                <button type="button" class="close close-debtor-list-modal-btn" aria-label="Close">
                    <span aria-hidden="true" class="color-white">&times;</span>
                </button>
                <h4 class="modal-title color-white">Debtors</h4>
            </div>
            <div class="modal-body">
			    <div class="row">
            		<div class="col-md-12 margin-bottom-10">
            			<form name="add_debtor" action="<?php echo $baseUrl; ?>/debtor/create-debtor" class="add-debtor" method="post">
            				<input type="hidden" name="<?php echo $csrf_name; ?>" value="<?php echo $csrf_token; ?>" />
            				<div class="row">
            					<div class="col-md-6 form-group">
            						<input type="text" name="debtor_name" class="form-control" data-placement="left" data-toggle="tooltip" data-original-title="Debtor Name" placeholder="Debtor Name">
            					</div>

            					<div class="col-md-6 form-group">
            						<input type="number" name="debtor_pan" class="form-control" data-placement="left" data-toggle="tooltip" data-original-title="Debtor PAN" placeholder="Debtor PAN">
            					</div>
            				</div>
            				<div class="row">
            					<div class="col-md-6 form-group">
            						<input type="number" name="debtor_phone" class="form-control" data-placement="left" data-toggle="tooltip" data-original-title="Debtor Phone" placeholder="Debtor Phone">
            					</div>

            					<div class="col-md-6 form-group">
            						<input type="text" name="debtor_address" class="form-control" data-placement="left" data-toggle="tooltip" data-original-title="Debtor Address" placeholder="Debtor Address">
            					</div>
            				</div>

            				<div class="row">
            					<div class="col-md-6 form-group">
            						<input type="number" name="debtor_opening_balance" class="form-control" data-placement="left" data-toggle="tooltip" data-original-title="Opening Balance" placeholder="Opening Balance">
            					</div>

            					<div class="col-md-6 form-group">
            						<button type="submit" class="btn btn-primary pull-right">Save</button>
            					</div>
            				</div>
            			</form>
            		</div>
            	</div>
				<hr>
                <div class="row row-lg">
                    <div class="col-sm-12 col-lg-12 col-md-12">
                        <table class="table table-hover dataTable table-striped with-editable-no-tools debtors-list">
		                    <thead>
		                        <tr>
		                            <th width="15">#</th>
		                            <th width="100">Debtors Name</th>
		                            <th width="100">Debtors Phone</th>
		                            <th width="100">Credit Remaining</th>
		                        </tr>
		                    </thead>
		                    <tfoot>
		                        <tr>
		                            <th width="15">#</th>
		                            <th width="100">Debtors Name</th>
		                            <th width="100">Debtors Phone</th>
		                            <th width="100">Credit Remaining</th>
		                        </tr>
		                    </tfoot>
		                    <tbody>
		                		<!-- here goes the debtors list -->
		                		<div class="no-debtor">
		                			No debtors available !!!
		                		</div>
		                    </tbody>
                		</table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- modal for special order -->
    <div class="modal fade modal-aside horizontal right modal-special-order" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
	    <div class="modal-dialog full-screen-modal-dialog">
	        <div class="modal-content full-screen-modal-content">
	            <div class="modal-header theme-bg-color">
	                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
	                    <span aria-hidden="true">&times;</span>
	                </button>
	                <h4 class="modal-title color-white">Special Orders</h4>
	            </div>
	            <div class="modal-body">
				    <div class="row">
	            		<div class="col-md-4 col-lg-4 col-sm-4">
							<h4>Selected Items</h4>
					        
					        <form class="special-order-list-form">
						        <div class="row">
						        	<div class="col-md-12 col-sm-12 col-lg-12">
					            		<div class="row">
					                        <div class="col-md-4 col-sm-4 col-lg-4">
					                            Item Name
					                        </div>
					                        <div class="col-md-3 col-sm-3 col-lg-3">
					                        	Quantity
					                        </div>
					                        <div class="col-md-3 col-sm-3 col-lg-3">
					                        	Price
					                        </div>
					                    </div>

					                    
					                    	<input type="hidden" name="<?php echo $csrf_name; ?>" value="<?php echo $csrf_token; ?>" />
						                    <div class="scroll-height-450 slimscrollstart-position-450 selected-special-item-list">

						            		</div>
					            		
						            </div>
						        </div>

						        <div class="pull-right">
						        	<button type="button" class="btn btn-primary send-selected-special-item-list">Send</button>
						        </div>
					        </form>
	            		</div>

	                    <div class="col-md-8 col-lg-8 col-sm-8 border-left-solid">
	                    	<div class="row">
	                    		<div class="col-md-12 col-lg-12 col-sm-12 col-xs-12 margin-bottom-10">
			            			<form name="add_special_order_item" action="<?php echo $baseUrl; ?>/order/add-special-item" class="add-special-order-item" method="post">

			            				<input type="hidden" name="<?php echo $csrf_name; ?>" value="<?php echo $csrf_token; ?>" />

			            				<div class="row">
			            					<div class="col-md-4 col-lg-4 col-sm-4 col-xs-12 form-group">
			            						<label for="" class="">Item Name</label>
			            						<input type="text" name="name" class="form-control" placeholder="Item Name">
			            					</div>

			            					<div class="col-md-4 col-lg-4 col-sm-4 col-xs-12 form-group">
			            						<label for="" class="">Price</label>
			            						<input type="number" name="price" class="form-control" placeholder="Item Price">
			            					</div>

			            					<div class="col-md-4 col-lg-4 col-sm-4 col-xs-12 form-group">
				                                <label for="" class="">Category</label>
				                                <select name="category_id" class="form-control select-category">
				                                    <option value="">Select a Category</option>
				                                    <?php if($all_category != null):
				                                        foreach ($all_category as $category): ?>
				                                            <option data-category-type="<?php echo $category['type']; ?>" value="<?php echo $category['id']; ?>"><?php echo $category['category']; ?></option>
				                                    <?php endforeach; endif; ?>
				                                </select>
				                            </div>
			            				</div>

			            				<div class="row">
			            					<div class="col-md-5 col-lg-5 col-sm-5 col-xs-5 form-group">
			            						<label for="" class="">Description</label>
				                                <textarea name="description" class="form-control" rows="3" placeholder="Enter Item Description"></textarea>
				                            </div>

				                            <div class="col-md-5 col-lg-5 col-sm-5 col-xs-5 form-group">
			            						<label for="" class="">Remarks</label>
				                                <textarea name="remarks" class="form-control" rows="3" placeholder="Enter Item remarks"></textarea>
				                            </div>

			            					<div class="col-md-2 form-group">
			            						<button type="submit" class="btn btn-primary pull-right margin-top-60">Save</button>
			            					</div>
			            				</div>
			            			</form>
			            		</div>
	                    	</div>
	                    	<hr>
	                    	<div class="row">
	                    		<div class="col-md-12 col-lg-12 col-sm-12 col-xs-12 scroll-x">
			                        <table class="table table-hover table-striped special-order-item-table">
					                    <thead>
					                        <tr>
					                            <th width="100">Name</th>
					                            <th width="100">Price</th>
					                            <th width="100">Category</th>
					                            <th width="100">Description</th>
					                            <th width="100">Remarks</th>
					                        </tr>
					                    </thead>
					                    <tfoot>
					                        <tr>
					                            <th width="100">Name</th>
					                            <th width="100">Price</th>
					                            <th width="100">Category</th>
					                            <th width="100">Description</th>
					                            <th width="100">Remarks</th>
					                        </tr>
					                    </tfoot>
					                    <tbody class="show-special-item-list">
					                    	
					                    </tbody>
			                		</table>
			                	</div>
		                	</div>
	                    </div>
	                </div>
	            </div>
	        </div>
	    </div>
	</div>
<!-- modal for special order -->

<!--item wise payment-->
<div class="modal modal-aside fade horizontal right advance-payment-modal" aria-hidden="false" role="dialog" tabindex="-1" data-backdrop="static">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <form action="<?php echo $baseUrl;?>/order/advance-payment" name="advance" data-tablename="advance" data-action="edit" method="post" class="form-horizontal advance-payment">

            	<input type="hidden" name="<?php echo $csrf_name; ?>" value="<?php echo $csrf_token; ?>" />
            	
            	<input type="hidden" name="occupy_id" class="hidden-occupy-id" value="" />
            	<input type="hidden" name="delivery_id" class="hidden-delivery-id" value="" />
            	<input type="hidden" name="pick_up_id" class="hidden-pick-up-id" value="" />
				<input type="hidden" name="take_away_id" class="hidden-take-away-id" value="<?php echo $take_away['id']; ?>" />
				<input type="hidden" name="payment_type" class="hidden-payment-type" value="0" />
				<input type="hidden" name="table_id" class="hidden-table-id" value="" />
				<input type="hidden" name="floor_id" class="hidden-floor-id" value="" />
				<input type="hidden" name="change_amount" class="hidden-change-amount" value="0" />
				<input type="hidden" name="received_amount" class="hidden-received-amount" value="0" />

                <div class="modal-header theme-bg-color">
                    <h4 class="modal-title color-white">Advance Payment</h4>
                </div>

                <div class="modal-body">

                    <div class="col-sm-12">
                        <div class="form-group non-debtor-name">
                        	<label class="control-label">Customer Name</label>
                            <input type="text" name="customer_name" placeholder="Name" class="form-control customer-name" data-placement="left" data-toggle="tooltip" data-original-title="Customer Name">
                        </div>
                    </div>

	                <div class="col-sm-12">
            			<div class="form-group debtor-name" hidden="hidden">
            				<label class="control-label">Debtor Name</label>	
                            <div class="input-group auto-parent">
                                <input type="text" name="dr[from]" placeholder="Debtor Name" class="form-control debtor-txt sub-input-group auto-show" data-placement="left" data-toggle="tooltip" data-original-title="Debtor Name">
                                <input type="hidden" name="dr[id]" class="auto-i hidden-debtor-id">

                                <span class="input-group-btn">
                                    <a class="btn btn-primary btn-auto-list" data-toggle="modal" data-target=".modal-debtors-list"><i class="icon fa-question" ></i></a>
                                </span>
                            </div>
                        </div>
            		</div>
        		
                    <div class="col-sm-12">
                        <div class="form-group">
                        	<label class="control-label">Bill Amount</label>
                            <input type="number" name="total_amount_grand" readonly placeholder="Bill Amount" class="form-control total-amount-grand" data-placement="left" data-toggle="tooltip" data-original-title="Bill Amount">
                        </div>
                    </div>

		            <div class="col-sm-12">
	                    <div class="form-group">
	                    	<label class="control-label">Advance paid Amount</label>
	                        <input type="number" name="advance_paid" placeholder="Advance" class="form-control advance-paid" data-placement="left" data-toggle="tooltip" data-original-title="Advance Payment">
	                    </div>
	                </div>

		            <div class="col-sm-12">
	                    <div class="form-group received-amount">
	                    	<label class="control-label">Received Amount</label>
	                        <input type="number" placeholder="Received" class="form-control amount-received" data-placement="left" data-toggle="tooltip" data-original-title="Received Amount">
	                    </div>
	                </div>

	                <div class="col-sm-12">
                        <div class="form-group change-amount">
                        	<label class="control-label">Change</label>
	                        <input type="number" readonly placeholder="Change" class="form-control amount-change" data-placement="left" data-toggle="tooltip" data-original-title="Change">
	                    </div>
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary pay-advance">Pay</button>
                    <button class="btn btn-primary credit-order" type="button" style="display: none;">Pay</button>
                    <button type="button" class="btn btn-default" data-dismiss="modal">Discard</button>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="modal modal-aside fade horizontal right item-wise-payment-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
	        <form action="<?php echo $baseUrl;?>/order/item-wise-payment" class="item-wise-payment-desk" method="post" >
	        	<input type="hidden" name="<?php echo $csrf_name; ?>" value="<?php echo $csrf_token; ?>" />
	          	<input type="hidden" name="occupy_id" class="hidden-occupy-id" value="" />
	          	<input type="hidden" name="delivery_id" class="hidden-delivery-id" value="" />
	          	<input type="hidden" name="pick_up_id" class="hidden-pick-up-id" value="" />
				<input type="hidden" name="take_away_id" class="hidden-take-away-id" value="<?php echo $take_away['id']; ?>" />
				<input type="hidden" name="payment_type" class="hidden-payment-type" value="0" />
				<input type="hidden" name="table_id" class="hidden-table-id" value="" />
				<input type="hidden" name="floor_id" class="hidden-floor-id" value="" />
				<input type="hidden" name="change_amount" class="hidden-change-amount" value="0" />
				<input type="hidden" name="received_amount" class="hidden-received-amount" value="0" />
				<input type="hidden" name="tip_amount" class="hidden-tip-amount" value="0" />

	            <div class="modal-header theme-bg-color">
	                <h4 class="modal-title color-white">Item Wise Payment
						<span class="inv-required pull-right"></span>
	                </h4>
	            </div>
	            
	            <div class="modal-body">

	            	<div class="row non-debtor-name">
			            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			                <div class="form-group form-material margin-bottom-3 custom-form">
			                  	<input type="text" class="form-control empty-this customer-name" placeholder="Customer Name" name="customer_name" autocomplete="off" />
			                </div>
		                </div>
	                </div>

	                <div class="row">
		                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
	            			<div class="padding-top-5 debtor-name form-group form-material margin-bottom-3 custom-form"" hidden="hidden">
		            			<span class="margin-left-50 btn-l991 color-coffee span-margin-left-0">
		            				<div class="input-group auto-parent">
		                                <input type="text" name="dr[from]" placeholder="Debtor Name" required class="form-control debtor-txt sub-input-group auto-show" data-placement="left" data-toggle="tooltip" data-original-title="Debtor Name">
		                                <input type="hidden" name="dr[id]" class="auto-i hidden-debtor-id">

		                                <span class="input-group-btn">
		                                    <a class="btn btn-primary btn-auto-list" data-toggle="modal" data-target=".modal-debtors-list"><i class="icon fa-question" ></i></a>
		                                </span>
	                                </div>	
		            			</span>
	            			</div>
	            		</div>
            		</div>

	            	<div class="row">
		                <div class="col-md-12"> 
	                      	<div class="scroll-height-250 slimscrollstart-position-250">
				              	<div class="example table-responsive margin-0">
					                <table class="table">
					                    <thead>
						                    <tr>
						                        <th>Name</th>
						                        <th>Price</th>
						                        <th class="th-qty-width">Quantity</th>
						                        <th>Total</th>
						                    </tr>
					                    </thead>

					                    <tbody class="item-wise-list">
					                    
					                    </tbody>
					                </table>
		                		</div>
		                	</div>
		                </div>
		            </div>
		            <div class="grey-divider margin-bottom-5"></div>
		            <div class="row">
	            		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		            		<div class="mrg-top-15">
			            		<div class="row">
			            			<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6"><span class="font-weight-500 span-margin-left-0">Sub Total</span>
			            			</div>
			            			<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
			            				<span class="margin-left-50 btn-l991 sub-total zero-price span-margin-left-0">
			            					
			            				</span>
		            				</div>
		            			</div>
		            			
		            			<!-- codes required if service charge is calculated before discount -->
		            			<!-- <?php if($service_charge_rate != 0  && $service_charge_rate_is_active != 0): ?>
		            				<div class="row">
				            			<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6"><span class="font-weight-500 span-margin-left-0">Service Charge(<?php echo $service_charge_rate; ?>%)</span>
				            			</div>
				            			<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
				            				<span class="margin-left-50 btn-l991 service-charge-amount zero-price span-margin-left-0">
				            					
				            				</span>
			            				</div>
			            			</div>
		            			<?php endif; ?>
		            			
			            		<div class="row discount-form" style="display:none;">
			            			<div class="padding-top-5">
				            			<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
				            				<div class="row">
				            					<div class="col-lg-6 col-md-12 col-sm-12 col-xs-12">
				            						<span class="font-weight-500 span-margin-left-0">Discount</span>
				            					</div>
				            					<div class="col-lg-6 col-md-12 col-sm-12 col-xs-12">
				            						<span class="custom-touchspin">
				            							<input type="number" class="form-control discount zero-this" name="discount" data-plugin="TouchSpin" data-min="0" data-max="0" data-stepinterval="50" data-maxboostedstep="10000000" value="0" data-step="5" />
				            						</span>
				            					</div>
				            				</div>
				            			</div>
				            			<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
				            				<div class="form-group margin-left-50 margin-bottom-5">
					            				<div class="input-group">
					            					<span class="input-group-btn">
					                                    <a class="btn btn-default">Rs.</a>
					                                </span>
					                                <input type="number" name="discount_amount" data-placement="left" class="form-control discount-amount" value="0">
				                                </div>
			                                </div>
			            				</div>
			            			</div>
			            		</div> -->
			            		<!-- codes required if service charge is calculated before discount -->

			            		<!-- codes required if discount is calculated before service charge -->
			            		<div class="row discount-form" style="display:none;">
			            			<div class="padding-top-5">
				            			<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
				            				<div class="row">
				            					<div class="col-lg-6 col-md-12 col-sm-12 col-xs-12">
				            						<span class="font-weight-500 span-margin-left-0">Discount</span>
				            					</div>
				            					<div class="col-lg-6 col-md-12 col-sm-12 col-xs-12">
				            						<span class="custom-touchspin">
				            							<input type="number" class="form-control discount zero-this" name="discount" data-plugin="TouchSpin" data-min="0" data-max="0" data-stepinterval="50" data-maxboostedstep="10000000" value="0" data-step="5" />
				            						</span>
				            					</div>
				            				</div>
				            			</div>
				            			<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
				            				<div class="form-group margin-left-50 margin-bottom-5">
					            				<div class="input-group">
					            					<span class="input-group-btn">
					                                    <a class="btn btn-default">Rs.</a>
					                                </span>
					                                <input type="number" name="discount_amount" data-placement="left" class="form-control discount-amount" value="0">
				                                </div>
			                                </div>
			            				</div>
			            			</div>
			            		</div>
			            		
			            		<?php if($service_charge_rate != 0  && $service_charge_rate_is_active != 0): ?>
		            				<div class="row">
				            			<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6"><span class="font-weight-500 span-margin-left-0">Service Charge(<?php echo $service_charge_rate; ?>%)</span>
				            			</div>
				            			<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
				            				<span class="margin-left-50 btn-l991 service-charge-amount zero-price span-margin-left-0">
				            					
				            				</span>
			            				</div>
			            			</div>
		            			<?php endif; ?>
			            		<!-- codes required if discount is calculated before service charge -->

			            		<div class="row">
			            			<div class="padding-top-5">
				            			<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6"><span class="font-weight-500 span-margin-left-0">Taxable Amount</span></div>
				            			<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6"><span class="margin-left-50 btn-l991 taxable-total zero-price span-margin-left-0">
				            				
				            			</span></div>
			            			</div>
			            		</div>

			            		<div class="row">
			            			<div class="padding-top-5">
				            			<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6"><span class="font-weight-500 span-margin-left-0">VAT Amount (<?php echo $vat_rate; ?>%)</span></div>
				            			<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6"><span class="margin-left-50 btn-l991 vat-total zero-price span-margin-left-0">
				            				
				            			</span></div>
			            			</div>
			            		</div>

			            		<div class="grey-divider span-margin-left-0"></div>

			            		<div class="row">
			            			<div class="padding-top-5">
				            			<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6"><span class="font-weight-500 color-coffee span-margin-left-0">Grand Total</span></div>
				            			<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6"><span class="margin-left-50 btn-l991 color-coffee grand-total zero-price span-margin-left-0"> </span>
				            			<span class="round-value zero-price"> </span></div>
			            			</div>
			            		</div>

			            		<div class="row">
			            			<div class="padding-top-5 form-group received-amount">
				            			<div class="col-lg-7 col-md-6 col-sm-6 col-xs-6"><span class="font-weight-500 color-coffee span-margin-left-0">Received Amount</span></div>
				            			<div class="col-lg-5 col-md-6 col-sm-6 col-xs-6">
				            				<input type="number" placeholder="Received Amount" required class="form-control amount-received" data-placement="left" data-toggle="tooltip" data-original-title="Received Amount" value="0">
				            			</div>
			            			</div>
			            		</div>

			            		<div class="row">
			            			<div class="padding-top-5 form-group change-amount">
				            			<div class="col-lg-7 col-md-6 col-sm-6 col-xs-6"><span class="font-weight-500 color-coffee span-margin-left-0">Change Amount</span></div>
				            			<div class="col-lg-5 col-md-6 col-sm-6 col-xs-6">
				            				<input type="number" readonly placeholder="Change Amount" required class="form-control amount-change" data-placement="left" data-toggle="tooltip" data-original-title="Change Amount" value="0">
				            			</div>
			            			</div>
			            		</div>

			            		<div class="row">
			            			<div class="padding-top-5 form-group tip-amount">
				            			<div class="col-lg-7 col-md-6 col-sm-6 col-xs-6"><span class="font-weight-500 color-coffee span-margin-left-0">Tip Amount</span></div>
				            			<div class="col-lg-5 col-md-6 col-sm-6 col-xs-6">
				            				<input type="number" placeholder="Tip Amount" class="form-control amount-tip" data-placement="left" data-toggle="tooltip" data-original-title="Tip Amount" value="0">
				            			</div>
			            			</div>
			            		</div>

			            		<input type="hidden" class="vat-rate" value="<?php echo $vat_rate; ?>">
			            		<input type="hidden" class="service-charge-rate" value="<?php echo ($service_charge_rate_is_active != 0) ? $service_charge_rate : '0'; ?>">
			            		<input type="hidden" class="max-inv" value="<?php echo $max_inv;?>">
			            		<input type="hidden" class="main-total zero-this" name="total" value="0">
		            		</div>
		            	</div>

		            	<div class="item-wise-cash-btn">
		            		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		            			<div class="pull-left margin-top-30">
		            				<p class="font-weight-500 max-inv-text">Receipt no: <?php echo $max_inv_break_down;?></p>
		            			</div>
			            		<div class="margin-top-10 pull-right">
			            			<div class="custom-button margin-top-10 pull-right btn-l991">
				            			<button class="btn btn-number_format btn-warning btn-lg apply-discount not discount-btn" type="button" data-allow="false">
				            				<i class="icon fa-ticket font-size-24"></i>
				            			</button>

					            		<button class="btn btn-number_format btn-primary btn-lg make-item-wise-payment" type="button">
					            			<i class="icon fa-dollar font-size-20"></i>
					            		</button>

					            		<button class="btn btn-primary btn-lg remove-item-wise-payment-modal" type="button">
					            			<i class="icon fa-remove font-size-20"></i>
					            		</button>
				            		</div>
			            		</div>
			            	</div>
		            	</div>

		            	<div class="item-wise-credit-btn" style="display: none;">
		            		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
			            		<div class="margin-top-10 pull-right">
			            			<div class="custom-button margin-top-10 pull-right btn-l991">
				            			<button class="btn btn-warning btn-lg apply-discount not discount-btn" type="button" data-allow="false">
				            				<i class="icon fa-ticket font-size-24"></i>
				            			</button>
					            		<button class="btn btn-primary btn-lg credit-order" type="button">
					            			<i class="icon fa-save font-size-20"></i>
					            		</button>
					            		<button class="btn btn-primary btn-lg remove-item-wise-payment-modal" type="button">
					            			<i class="icon fa-remove font-size-20"></i>
					            		</button>
				            		</div>
			            		</div>
			            	</div>
		            	</div>
	            	</div>
	            </div>
            </form>
        </div>
    </div>
</div>

<div class="modal fade modal-view-partial-payment-detail" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="top:50px;">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
          
            <div class="modal-header theme-bg-color">
                <h4 class="modal-title color-white">Partial Payment Details
					<span class="inv-required pull-right"></span>
                </h4>
            </div>
            
            <div class="modal-body">
	            <div class="scroll-height-450 slimscrollstart-position-450">
	            	<div class="partial-payment-list">
	            	
	            	</div>
	            </div>
            </div>
        </div>
    </div>
</div>
<!--item wise payment-->

<!-- modal for kot return -->
<div class="modal fade modal-return-kot" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-header theme-bg-color">
            	<button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true" class="color-white">&times;</span>
                </button>
                <h4 class="modal-title color-white">KOT Lists available for return
                </h4>
            </div>
            <div class="modal-body padding-top-15 padding-bottom-15 padding-right-30 padding-left-30">
	            <form class="kot-return-form" name="kot_return_form" action="<?php echo $baseUrl; ?>/kot/return" method="post">	
	            	<input type="hidden" name="<?php echo Yii::$app->request->csrfParam; ?>" value="<?php echo Yii::$app->request->csrfToken; ?>" />
					<input type="hidden" name="take_away_id" class="hidden-take-away-id" value="<?php echo $take_away['id']; ?>" />
					<input type="hidden" name="pick_up_id" class="hidden-pick-up-id" value="" />
					<input type="hidden" name="delivery_id" class="hidden-delivery-id" value="" />
					<input type="hidden" name="occupy_id" class="hidden-occupy-id" value="" />
					<input type="hidden" name="table_id" class="hidden-table-id" value=""/>
					<input type="hidden" name="floor_id" class="hidden-floor-id" value=""/>
	        		<div class="scroll-height-350 slimscrollstart-position-350 current-kot-list">
	              		<?php if($kot != null):
	              			foreach ($kot as $k): 
	              				if($k['return_against_display_number'] == '') : ?>
				              		<h5 class="padding-left-5">
				              			<span class="pull-left">KOT : <?php echo $k['display_number']; ?></span>
				              			<span class="pull-right font-size-12 small"><?php echo $k['created_on']; ?></span>
				              		</h5>
				              		<table class="table">
				              			<thead>
						                    <tr>
						                        <th>Name</th>
						                        <th class="th-qty-width">Quantity</th>
						                    </tr>
					                    </thead>
					                    <tbody>
					              			<?php $selected_count = 0; 
					              				foreach($k->kotItemRelation as $kot_item): 
					              					$selected_count++; ?>
					              				<?php if($kot_item['type'] == Yii::$app->params['item_type']['regular']) : ?>
							                    	<tr class="return-kot-item-<?php echo $kot_item['id']; ?>" data-item="<?php echo $kot_item['item_id']; ?>" data-price="<?php echo $kot_item['item']['price']; ?>">
							                    		<input type="hidden" name="items[<?php echo $k['id']; ?>][<?php echo $selected_count; ?>][kot_item_id]" class="hidden-kot-item-id" value="<?php echo $kot_item['id']; ?>" >
							                    		<input type="hidden" name="items[<?php echo $k['id']; ?>][<?php echo $selected_count; ?>][item]" class="item" value="<?php echo $kot_item['item_id']; ?>">
							                            <input type="hidden" name="items[<?php echo $k['id']; ?>][<?php echo $selected_count; ?>][price]" class="hidden-price" value="<?php echo $kot_item['item']['price']; ?>" >
							                            <input type="hidden" name="items[<?php echo $k['id']; ?>][<?php echo $selected_count; ?>][type]" class="hidden-item-type" value="<?php echo Yii::$app->params['item_type']['regular']; ?>" >

								                        <td><?php echo $kot_item['item']['name']; ?></td>
								                        <td>
								                        	<input type="number" class="form-control custom-input return-quantity" name="items[<?php echo $k['id']; ?>][<?php echo $selected_count; ?>][quantity]" data-plugin="TouchSpin" data-min="0" data-max="<?php echo $kot_item['quantity'] - $kot_item['returned_quantity']; ?>" data-stepinterval="50" data-maxboostedstep="<?php echo $kot_item['quantity'] - $kot_item['returned_quantity']; ?>" value="0" />
								                        </td>
							                    	</tr>
							                    <?php else: ?>
							                    	<tr class="return-kot-item-<?php echo $kot_item['id']; ?>" data-item="<?php echo $kot_item['item_id']; ?>" data-price="<?php echo $kot_item['specialItem']['price']; ?>">
							                    		<input type="hidden" name="items[<?php echo $k['id']; ?>][<?php echo $selected_count; ?>][kot_item_id]" class="hidden-kot-item-id" value="<?php echo $kot_item['id']; ?>" >
							                    		<input type="hidden" name="items[<?php echo $k['id']; ?>][<?php echo $selected_count; ?>][item]" class="item" value="<?php echo $kot_item['item_id']; ?>">
							                            <input type="hidden" name="items[<?php echo $k['id']; ?>][<?php echo $selected_count; ?>][price]" class="hidden-price" value="<?php echo $kot_item['specialItem']['price']; ?>" >
							                            <input type="hidden" name="items[<?php echo $k['id']; ?>][<?php echo $selected_count; ?>][type]" class="hidden-item-type" value="<?php echo Yii::$app->params['item_type']['special']; ?>" >

								                        <td>Special-Item(<?php echo $kot_item['specialItem']['name']; ?>)</td>
								                        <td>
								                        	<input type="number" class="form-control custom-input return-quantity" name="items[<?php echo $k['id']; ?>][<?php echo $selected_count; ?>][quantity]" data-plugin="TouchSpin" data-min="0" data-max="<?php echo $kot_item['quantity'] - $kot_item['returned_quantity']; ?>" data-stepinterval="50" data-maxboostedstep="<?php echo $kot_item['quantity'] - $kot_item['returned_quantity']; ?>" value="0" />
								                        </td>
							                    	</tr>
							                    <?php endif; ?>
				              				<?php endforeach; ?>
				              			</tbody>
			              			</table>
	              		<?php endif; endforeach; else : ?>
				                <div class="no-item">
				                	<p>No items available.</p>
				                </div>
	            		<?php endif; ?>
	        		</div>

	        		<div class="form-group">
	                	<label for="comment">Note</label>
	                	<textarea class="form-control" rows="3" id="kot-return-note" name="kot_return_note" class="kot-return-note"></textarea>
	                </div>

	                <div class="form-group">
                		<button type="button" data-loading-text="Sending..." class="btn btn-primary btn-xm submit-return-kot-btn margin-top-50">Send</button>
                	</div>
	            </form>
            </div>
        </div>
    </div>
</div>

<div class="modal fade modal-returned-kot-list" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-header theme-bg-color">
            	<button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true" class="color-white">&times;</span>
                </button>
                <h4 class="modal-title color-white">Retured KOT Lists
                </h4>
            </div>
            <div class="modal-body padding-top-15 padding-bottom-15 padding-right-30 padding-left-30">
        		<div class="scroll-height-400 slimscrollstart-position-400">
              		<?php if($kot != null):
              			foreach ($kot as $k): 
              				if($k['status'] == Yii::$app->params['kot_status']['return']) : ?>
			              		<h5 class="padding-left-5">
			              			<span class="pull-left">Returned Against KOT : <?php echo $k['return_against_display_number']; ?></span>
			              		</h5>
			              		<table class="table">
			              			<thead>
					                    <tr>
					                        <th>Name</th>
					                        <th class="th-qty-width">Quantity</th>
					                    </tr>
				                    </thead>
				              		<?php $selected_count = 0; 
				              			foreach($k->kotItemRelation as $kot_item): 
				              				$selected_count++; ?>
						                    <tbody>
						                    	<?php if($kot_item['type'] == Yii::$app->params['item_type']['regular']) : ?>
							                    	<tr>
								                        <td><?php echo $kot_item['item']['name']; ?></td>
								                        <td>
								                        	<?php echo $kot_item['quantity']; ?>
								                        </td>
							                    	</tr>
							                    <?php else: ?>
							                    	<tr>
								                        <td>Special-Item(<?php echo $kot_item['specialItem']['name']; ?>)</td>
								                        <td>
								                        	<?php echo $kot_item['quantity']; ?>
								                        </td>
							                    	</tr>
							                    <?php endif; ?>
						                    </tbody>
			              			<?php endforeach; ?>
		              			</table>
              		<?php endif; endforeach; else : ?>
			                <div class="no-item">
			                	<p>No items available.</p>
			                </div>
            		<?php endif; ?>
        		</div>
            </div>
        </div>
    </div>
</div>
<!-- modal for kot return -->

<!-- printing loading modal -->
<div class="modal fade print-loading-modal" tabindex="-1" data-backdrop="static" data-keyboard="false" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm" style="position: absolute;top: 35%;left: 38%;">
        <div class="modal-content">
            <div class="print-overlay">
                <i class="fa fa-print"></i>
                <!-- <h4>printing . . . .</h4> -->
                <div class="print-text"></div>
            </div>
        </div>
    </div>
</div>
<!-- printing loading modal -->

<!-- end of modal -->

<script>
    var item_type = <?php echo json_encode(Yii::$app->params['item_type']); ?>
</script>

