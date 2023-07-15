<?php
$baseUrl = Yii::$app->request->baseUrl;
$currency = strtoupper(Yii::$app->session['currency']);
$bill_config = Yii::$app->session['bill_config'];
$this->registerJsFile($baseUrl . '/assets/plugins/slick-carousel/slick.min.js');
$this->registerCssFile($baseUrl . '/assets/plugins/slick-carousel/slick.min081a.css');
$this->registerJsFile($baseUrl . '/assets/plugins/slick-carousel/carousel.min.js');
$this->registerJsFile($baseUrl . '/assets/software/print-bill.js');
$this->registerJsFile($baseUrl . '/assets/software/split-bill.js');

$this->registerCssFile($baseUrl . '/assets/css/workplace.css');

$this->title = Yii::$app->params['system'] . ' | Split Bill';

$csrf_name 	= Yii::$app->request->csrfParam;
$csrf_token = Yii::$app->request->csrfToken;
$first_inv 	= $max_inv;
$second_inv = $max_inv+1;
$third_inv  = $second_inv+1; 
?>

<div class="page-content container-fluid">
	<div class="row">
		<div class="col-md-12">
			<div class="pull-right">
				<button class="btn btn-round btn-number_format btn-primary make-multiple-order" type="submit"><i class="fa fa-print"></i><span class="padding-left-5">Print</span></button>
				<button type="button" class="btn btn-round btn-primary add-new-bill"><i class="icon fa-plus"></i><span class="padding-left-5">Add Bill</span></button>
			</div>
    	</div>
	</div>
	<div class="row">
		<div class="margin-top-10"></div>
		<div class="col-md-3 col-lg-3 col-xs-12">
			<div class="panel panel-bordered"> 
				<div class="panel-body padding-left-10 padding-right-10"> 
					<h4>Ordered Items List</h4>
					<div class="scroll-height-675 slimscrollstart-position">
		                <table class="table table-hover">
		                    <thead>
			                    <tr>
			                        <th>Name</th>
			                        <th class="th-qty-width">Quantity</th>
			                    </tr>
		                    </thead>

		                    <tbody>
			                    <?php 
			                    if($order_items != null):
			                    	$selected_count = 0;
				                    foreach ($order_items as $order_item): $selected_count++; 
				                    	?>
			                            <?php if($order_item['type'] == Yii::$app->params['item_type']['regular']) : ?>
			                    			<tr class="ordered-item <?php echo $order_item['id']; ?>" data-unique-id="<?php echo $order_item['id']; ?>" data-item="<?php echo $order_item['slug']; ?>" data-item-id="<?php echo $order_item['item_id']; ?>" data-item-name="<?php echo $order_item['name']; ?>" data-price="<?php echo $order_item['price'] ?>" data-quantity="<?php echo $order_item['quantity'] ?>" data-item-type="<?php echo $order_item['type'] ?>" data-discountable = "<?= $order_item['is_discountable'] ?>">
					                            <input type="hidden" name="items[<?php echo $selected_count; ?>][item]" class="item" value="<?php echo $order_item['slug']; ?>">
					                            <input type="hidden" name="items[<?php echo $selected_count; ?>][item_id]" class="item-id" value="<?php echo $order_item['item_id']; ?>">
					                            <input type="hidden" name="items[<?php echo $selected_count; ?>][price]" class="item-price" value="<?php echo $order_item['price']; ?>">
					                            <input type="hidden" class="total-val" value="<?php echo $order_item['price']*$order_item['quantity']; ?>">
					                            <input type="hidden" class="temp-item-id" value="<?php echo $order_item['id']; ?>">
					                            <input type="hidden" name="items[<?php echo $selected_count; ?>][type]" class="hidden-type" value="<?php echo $order_item['type']; ?>" >
					                            <input type="hidden" class="hidden-remaining-quantity" value="<?php echo $order_item['quantity']; ?>">
					                            <input type="hidden" name="items[<?php echo $selected_count; ?>][discountable]" class="hidden-item-discountable" value="<?= $order_item['is_discountable'] ?>">

					                         	<td width="200"><?php echo $order_item['name'] ?></td>
					                            <td width="100" class="text-center remaining-quantity"><?php echo $order_item['quantity']; ?>
					                            </td>
				                            </tr>
					                    <?php else: ?>
			                    			<tr class="ordered-item <?php echo $order_item['id']; ?>" data-unique-id="<?php echo $order_item['id']; ?>" data-item="<?php echo $order_item['special_item_id']; ?>" data-item-id="<?php echo $order_item['special_item_id']; ?>" data-item-name="<?php echo $order_item['special_item_name']; ?>" data-price="<?php echo $order_item['special_item_price'] ?>" data-quantity="<?php echo $order_item['quantity'] ?>" data-item-type="<?php echo $order_item['type'] ?>">
					                            <input type="hidden" name="items[<?php echo $selected_count; ?>][item]" class="item" value="<?php echo $order_item['special_item_id']; ?>">
					                            <input type="hidden" name="items[<?php echo $selected_count; ?>][item_id]" class="item-id" value="<?php echo $order_item['special_item_id']; ?>">
					                            <input type="hidden" name="items[<?php echo $selected_count; ?>][price]" class="item-price" value="<?php echo $order_item['special_item_price']; ?>">
					                            <input type="hidden" class="total-val" value="<?php echo $order_item['special_item_price']*$order_item['quantity']; ?>">
					                            <input type="hidden" class="temp-item-id" value="<?php echo $order_item['id']; ?>">
					                            <input type="hidden" name="items[<?php echo $selected_count; ?>][type]" class="hidden-type" value="<?php echo $order_item['type']; ?>" >
					                            <input type="hidden" class="hidden-remaining-quantity" value="<?php echo $order_item['quantity']; ?>">

					                         	<td width="200"><?php echo 'Special-Item('.$order_item['special_item_name'].')'; ?></td>
					                            <td width="100" class="text-center remaining-quantity"><?php echo $order_item['quantity']; ?>
					                            </td>
				                            </tr>
					                    <?php endif; ?>
				                <?php endforeach; endif;?>
		                    </tbody>
		                </table>
                	</div>
				</div> 
			</div>
		</div>

		<div class="col-md-9 col-lg-9 col-xs-12">
			<form action="<?php echo $baseUrl;?>/order/make-multiple" class="multiple-order-desk" method="post" >
				<input type="hidden" name="<?php echo $csrf_name; ?>" value="<?php echo $csrf_token; ?>" />

				<input type="hidden" name="hidden_bill_count" class="hidden-bill-count" value="2">
				<input type="hidden" name="hidden_latest_receipt_no" class="hidden-latest-receipt-no" value="<?php echo $second_inv; ?>">

				<input type="hidden" name="occupy_id" class="hidden-occupy-id" value="" />
				<input type="hidden" name="take_away_id" class="hidden-take-away-id" value="" />
				<input type="hidden" name="retail_id" class="hidden-retail-id" value="" />
				<input type="hidden" name="pick_up_id" class="hidden-pick-up-id" value="<?php echo $pick_up['id']; ?>" />
				<input type="hidden" name="delivery_id" class="hidden-delivery-id" value="" />
				<input type="hidden" name="payment_type" class="hidden-payment-type" value="0" />
				<input type="hidden" name="table_id" class="hidden-table-id" value="" />
				<input type="hidden" name="floor_id" class="hidden-floor-id" value="" />
				<input type="hidden" class="customer-pax" name="customer_pax" value="" />

	        	<div class="custom-wrapper">
	        		<div class="custom-scroll">
	        			<div class="wrapper-content multiple-bill multiple-bill-1" data-bill="1">
	        				<div class="panel panel-bordered"> 
								<div class="panel-heading">
									<div class="row">
										<div class="col-lg-10 col-md-10 col-sm-10 col-xs-10 margin-top-10">
												<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
													<div class="form-group form-material margin-bottom-3 custom-form">
														<input type="number" class="form-control empty-this customer-phone" placeholder="Customer Phone" id="customer-phone-1"  data-bill='1' name="data[1][customer_phone]" autocomplete="off" />
													</div>
												</div>
											  <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
								                <div class="form-group form-material margin-bottom-3 custom-form">
								                  	<input type="text" class="form-control empty-this customer-name" placeholder="Customer Name" id="customer-name-1" name="data[1][customer_name]" autocomplete="off" />
								                </div>
							                </div>
							                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
								                <div class="form-group form-material margin-bottom-3 custom-form">
								                  	<input type="number" class="form-control empty-this customer-pan" placeholder="PAN" name="data[1][customer_pan]"/>
								                </div>
							                </div>
							                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
								                <div class="form-group form-material margin-bottom-10 custom-form">
								                  	<input type="text" class="form-control empty-this customer-address" placeholder="Address" name="data[1][customer_address]" autocomplete="off" />
								                </div>
							                </div>
							            </div>
							            <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2">
							            	<div class="checkbox-custom checkbox-primary">
	                                            <input type="checkbox" id="inputChecked1" name="" class="select-bill select-bill-1" data-bill="1" checked>
	                                            <label for="inputChecked1"></label>
	                                        </div>
							            </div>
							        </div>
					            </div>

								<div class="panel-body padding-left-10 padding-right-10"> 
				                  	<div class="scroll-height-200 slimscrollstart-position-200">
						              	<div class="example table-responsive margin-0">
							                <table class="table">
							                    <thead>
								                    <tr>
								                        <th style="width: 200px;">Name</th>
								                        <th style="width: 50px;">Price</th>
								                        <th style="width: 150px;">Quantity</th>
								                        <th style="width: 50px;">Total</th>
								                        <th style="width: 30px;"></th>
								                    </tr>
							                    </thead>

							                    <tbody class="order-list">
								                    
								                </tbody>
							                </table>
				                		</div>
				                	</div>
								</div> 

								<div class="panel-footer">
					            	<div class="row">
					            		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
						            		<div class="mrg-top-15">
							            		<div class="row">
							            			<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6"><span class="font-weight-500 span-margin-left-0">Sub Total</span>
							            			</div>
							            			<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
							            				<span class="margin-left-35 btn-l991 sub-total zero-price span-margin-left-0">
							            				</span>
						            				</div>
						            			</div>

						            			<div class="row discount-form" style="display:none;">
							            			<div class="padding-top-5">
								            			<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
								            				<div class="row">
								            					<div class="col-lg-4 col-md-12 col-sm-12 col-xs-12">
								            						<span class="font-weight-500 span-margin-left-0">Discount</span>
								            					</div>
								            					<div class="col-lg-8 col-md-12 col-sm-12 col-xs-12">
								            						<span class="custom-touchspin">
								            							<input type="number" class="form-control discount zero-this" name="data[1][discount]" data-plugin="TouchSpin" data-min="0" data-max="90" data-stepinterval="50" data-maxboostedstep="90" value="0" data-step="5" />
								            						</span>
								            					</div>
								            				</div>
								            			</div>
								            			<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
								            				<div class="form-group margin-left-35 margin-bottom-5">
									            				<div class="input-group">
									            					<span class="input-group-btn">
									                                    <a class="btn btn-default"><?= $currency ?></a>
									                                </span>
									                                <input type="number" name="data[1][discount_amount]" class="form-control discount-amount" value="0">
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
								            				<span class="margin-left-35 btn-l991 service-charge-amount zero-price span-margin-left-0">
								            				</span>
							            				</div>
							            			</div>
						            			<?php endif; ?>

							            		<div class="grey-divider span-margin-left-0"></div>

							            		<div class="row">
							            			<div class="padding-top-5">
								            			<div class="col-lg-6 col-md-3 col-sm-6 col-xs-6"><span class="font-weight-500 color-coffee span-margin-left-0">Grand Total</span></div>
								            			<div class="col-lg-5 col-md-9 col-sm-6 col-xs-6 col-md-offset-1">
									            			<span class="btn-l991 color-coffee grand-total zero-price span-margin-left-0">
									            			</span>
															<span class="round-value">
															</span>
								            			</div>
								            			<input type="hidden" class="amount-required" name="data[1][amount_required]">
							            			</div>
							            		</div>

							            		<div class="grey-divider span-margin-left-0"></div>

							            		<div class="row received-amount-parent">
							            			<div class="padding-top-5">
							            				<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6"><span class="font-weight-500 color-coffee span-margin-left-0">Reveived Amount</span></div>
							            				<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
										            		<div class="form-group received-amount">
										                        <input type="number" placeholder="Received Amount" required class="form-control amount-received" name="data[1][received_amount]" min="0">
										                    </div>
										                </div>
									                </div>
							            		</div>

							            		<div class="row tip-amount-parent">
							            			<div class="padding-top-5">
							            				<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6"><span class="font-weight-500 color-coffee span-margin-left-0">Tip Amount</span></div>
							            				<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
									                        <div class="form-group tip-amount">
										                        <input type="number" name="data[1][tip_amount]" placeholder="Tip Amount" class="form-control amount-tip" min="0">
										                    </div>
										                </div>
									                </div>
							            		</div>

							            		<div class="row change-amount-parent">
							            			<div class="padding-top-5">
							            				<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6"><span class="font-weight-500 color-coffee span-margin-left-0">Change Amount</span></div>
							            				<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
										            		<div class="form-group change-amount">
										                        <input type="number" name="data[1][change_amount]" readonly placeholder="Change Amount" class="form-control amount-change" min="0">
										                    </div>
										                </div>
									                </div>
							            		</div>

							            		<div class="row">
							            			<div class="padding-top-5">
							            				<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6"><span class="font-weight-500 color-coffee span-margin-left-0">Payment Type</span></div>
							            				<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
							            					<div class="form-group">
										                     	<div class="col-sm-9">
										                       		<div class="radio-custom radio-default radio-inline">
										                          		<input type="radio" id="cash-payment-1" class="cash-payment-1 cash-payment" name="data[1][payment_type]" value="<?php echo Yii::$app->params['payment_type']['cash']; ?>" checked>
											                  			<label for="cash-payment-1">Cash</label>
										                        	</div>
										                        	<div class="radio-custom radio-default radio-inline">
										                          		<input type="radio" id="card-payment-1" class="card-payment-1 card-payment" name="data[1][payment_type]" value="<?php echo Yii::$app->params['payment_type']['card']; ?>">
											                  			<label for="card-payment-1">Card</label>
										                        	</div>
										                      	</div>
										                    </div>
										                </div>
									                </div>
							            		</div>

							            		<input type="hidden" class="service-charge-rate" value="<?php echo ($service_charge_rate_is_active != 0) ? $service_charge_rate : '0'; ?>">
							            		<input type="hidden" class="max-inv" value="<?php echo $first_inv;?>">
							            		<input type="hidden" class="main-total zero-this" name="data[1][total]" value="0">
							            		
						            		</div>
						            	</div>	

						            	
					            		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
					            			<div class="pull-left margin-top-30 btn-l991">
					            				<p class="font-weight-500 max-inv-text">Invoice no: <?php echo $first_inv;?></p>
					            			</div>
						            		<div class="custom-button margin-top-10 pull-right btn-l991">
						            			<button class="btn btn-number_format btn-warning btn-lg apply-discount not discount-btn" type="button" data-allow="false">
						            				<i class="icon fa-ticket font-size-24"></i>
						            			</button>
						            		</div>
						            	</div>
					            	</div>
					            </div>
							</div>
	        			</div>
	        			<div class="wrapper-content multiple-bill multiple-bill-2" data-bill="2">
	        				<div class="panel panel-bordered"> 
								<div class="panel-heading">
									<div class="row">
										<div class="col-lg-10 col-md-10 col-sm-10 col-xs-10 margin-top-10">
												<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
													<div class="form-group form-material margin-bottom-3 custom-form">
														<input type="number" class="form-control empty-this customer-phone" placeholder="Customer Phone" id="customer-phone-2"  data-bill='2' name="data[2][customer_phone]" autocomplete="off" />
													</div>
												</div>
											  <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
								                <div class="form-group form-material margin-bottom-3 custom-form">
								                  	<input type="text" class="form-control empty-this customer-name" placeholder="Customer Name" id="customer-name-2" name="data[2][customer_name]" autocomplete="off" />
								                </div>
							                </div>
							                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
								                <div class="form-group form-material margin-bottom-3 custom-form">
								                  	<input type="number" class="form-control empty-this customer-pan" placeholder="PAN" name="data[2][customer_pan]"/>
								                </div>
							                </div>
							                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
								                <div class="form-group form-material margin-bottom-10 custom-form">
								                  	<input type="text" class="form-control empty-this customer-address" placeholder="Address" name="data[2][customer_address]" autocomplete="off" />
								                </div>
							                </div>
							            </div>
							            <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2">
							            	<div class="checkbox-custom checkbox-primary">
	                                            <input type="checkbox" id="inputChecked2" name="" class="select-bill select-bill-2" data-bill="2">
	                                            <label for="inputChecked2"></label>
	                                        </div>
							            </div>
							        </div>
					            </div>

								<div class="panel-body padding-left-10 padding-right-10"> 
				                  	<div class="scroll-height-200 slimscrollstart-position-200">
						              	<div class="example table-responsive margin-0">
							                <table class="table">
							                    <thead>
								                    <tr>
								                        <th style="width: 200px;">Name</th>
								                        <th style="width: 50px;">Price</th>
								                        <th style="width: 150px;">Quantity</th>
								                        <th style="width: 50px;">Total</th>
								                        <th style="width: 30px;"></th>
								                    </tr>
							                    </thead>

							                    <tbody class="order-list">
								                    
							                    </tbody>
							                </table>
				                		</div>
				                	</div>
								</div> 

								<div class="panel-footer">
					            	<div class="row">
					            		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
						            		<div class="mrg-top-15">
							            		<div class="row">
							            			<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6"><span class="font-weight-500 span-margin-left-0">Sub Total</span>
							            			</div>
							            			<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
							            				<span class="margin-left-35 btn-l991 sub-total zero-price span-margin-left-0">
							            				</span>
						            				</div>
						            			</div>

						            			<div class="row discount-form" style="display:none;">
							            			<div class="padding-top-5">
								            			<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
								            				<div class="row">
								            					<div class="col-lg-4 col-md-12 col-sm-12 col-xs-12">
								            						<span class="font-weight-500 span-margin-left-0">Discount</span>
								            					</div>
								            					<div class="col-lg-8 col-md-12 col-sm-12 col-xs-12">
								            						<span class="custom-touchspin">
								            							<input type="number" class="form-control discount zero-this" name="data[2][discount]" data-plugin="TouchSpin" data-min="0" data-max="90" data-stepinterval="50" data-maxboostedstep="90" value="0" data-step="5" />
								            						</span>
								            					</div>
								            				</div>
								            			</div>
								            			<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
								            				<div class="form-group margin-left-35 margin-bottom-5">
									            				<div class="input-group">
									            					<span class="input-group-btn">
									                                    <a class="btn btn-default"><?= $currency ?></a>
									                                </span>
									                                <input type="number" name="data[2][discount_amount]" class="form-control discount-amount" value="0">
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
								            				<span class="margin-left-35 btn-l991 service-charge-amount zero-price span-margin-left-0">
								            				</span>
							            				</div>
							            			</div>
						            			<?php endif; ?>

							            		<div class="grey-divider span-margin-left-0"></div>

							            		<div class="row">
							            			<div class="padding-top-5">
								            			<div class="col-lg-6 col-md-3 col-sm-6 col-xs-6"><span class="font-weight-500 color-coffee span-margin-left-0">Grand Total</span></div>
								            			<div class="col-lg-5 col-md-9 col-sm-6 col-xs-6">
									            			<span class="btn-l991 color-coffee grand-total zero-price span-margin-left-0">
									            			</span>
															<span class="round-value">
															</span>
								            			</div>
								            			<input type="hidden" class="amount-required" name="data[2][amount_required]">
							            			</div>
							            		</div>

							            		<div class="grey-divider span-margin-left-0"></div>

							            		<div class="row received-amount-parent">
							            			<div class="padding-top-5">
							            				<div class="col-lg-6 col-md-3 col-sm-6 col-xs-6"><span class="font-weight-500 color-coffee span-margin-left-0">Reveived Amount</span></div>
							            				<div class="col-lg-6 col-md-9 col-sm-6 col-xs-6">
										            		<div class="form-group received-amount">
										                        <input type="number" placeholder="Received Amount" required class="form-control amount-received" name="data[2][received_amount]" min="0">
										                    </div>
										                </div>
									                </div>
							            		</div>

							            		<div class="row tip-amount-parent">
							            			<div class="padding-top-5">
							            				<div class="col-lg-6 col-md-3 col-sm-6 col-xs-6"><span class="font-weight-500 color-coffee span-margin-left-0">Tip Amount</span></div>
							            				<div class="col-lg-6 col-md-9 col-sm-6 col-xs-6">
									                        <div class="form-group tip-amount">
										                        <input type="number" name="data[2][tip_amount]" placeholder="Tip Amount" class="form-control amount-tip" min="0">
										                    </div>
										                </div>
									                </div>
							            		</div>

							            		<div class="row change-amount-parent">
							            			<div class="padding-top-5">
							            				<div class="col-lg-6 col-md-3 col-sm-6 col-xs-6"><span class="font-weight-500 color-coffee span-margin-left-0">Change Amount</span></div>
							            				<div class="col-lg-6 col-md-9 col-sm-6 col-xs-6">
										            		<div class="form-group change-amount">
										                        <input type="number" name="data[2][change_amount]" readonly placeholder="Change Amount" class="form-control amount-change">
										                    </div>
										                </div>
									                </div>
							            		</div>

							            		<div class="row">
							            			<div class="padding-top-5">
							            				<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6"><span class="font-weight-500 color-coffee span-margin-left-0">Payment Type</span></div>
							            				<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
							            					<div class="form-group">
										                     	<div class="col-sm-9">
										                       		<div class="radio-custom radio-default radio-inline">
										                          		<input type="radio" id="cash-payment-2" class="cash-payment-2 cash-payment" name="data[2][payment_type]" value="<?php echo Yii::$app->params['payment_type']['cash']; ?>" checked>
											                  			<label for="cash-payment-2">Cash</label>
										                        	</div>
										                        	<div class="radio-custom radio-default radio-inline">
										                          		<input type="radio" id="card-payment-2" class="card-payment-2 card-payment" name="data[2][payment_type]" value="<?php echo Yii::$app->params['payment_type']['card']; ?>">
											                  			<label for="card-payment-2">Card</label>
										                        	</div>
										                      	</div>
										                    </div>
										                </div>
									                </div>
							            		</div>

							            		<input type="hidden" class="service-charge-rate" value="<?php echo ($service_charge_rate_is_active != 0) ? $service_charge_rate : '0'; ?>">
							            		<input type="hidden" class="max-inv" value="<?php echo $second_inv;?>">
							            		<input type="hidden" class="main-total zero-this" name="data[2][total]" value="0">
							            		
						            		</div>
						            	</div>	
						            	
					            		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
					            			<div class="pull-left margin-top-30 btn-l991">
					            				<p class="font-weight-500 max-inv-text">Invoice no: <?php echo $second_inv;?></p>
					            			</div>
						            		<div class="custom-button margin-top-10 pull-right btn-l991">
						            			<button class="btn btn-number_format btn-warning btn-lg apply-discount not discount-btn" type="button" data-allow="false">
						            				<i class="icon fa-ticket font-size-24"></i>
						            			</button>
						            		</div>
						            	</div>
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

<script>
    var item_type 	 = <?php echo json_encode(Yii::$app->params['item_type']); ?>;
    var payment_type = <?php echo json_encode(Yii::$app->params['payment_type']); ?>;
    var currency 	 = '<?= $currency ?>';
    var item_discountable = <?php echo json_encode(Yii::$app->params['is_discountable']); ?>;
    var bill_config = <?php echo json_encode(Yii::$app->session['bill_config']) ?>;
</script>