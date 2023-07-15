$(function () {
    $('.scroll-height-400').slimScroll({
        start: $('.slimscrollstart-position-400'),
        height: '400px',
        alwaysVisible: true
    });
    $('.scroll-height-350').slimScroll({
        start: $('.slimscrollstart-position-350'),
        height: '350',
        alwaysVisible: true
    });
    $('.scroll-height-450').slimScroll({
        start: $('.slimscrollstart-position-450'),
        height: '450px',
        alwaysVisible: true
    });
    $('.scroll-height-200').slimScroll({
        start: $('.slimscrollstart-position-200'),
        height: '200px',
        alwaysVisible: true
    });
    $('.scroll-height-250').slimScroll({
        start: $('.slimscrollstart-position-250'),
        height: '250px',
        alwaysVisible: true
    });
    $('.scroll-height-55').slimScroll({
        start: $('.slimscrollstart-position-55'),
        height: '55px',
        alwaysVisible: true
    });
    $('.scroll-height-500').slimScroll({
        start: $('.slimscrollstart-position'),
        height: '500px',
        color: 'black',
        alwaysVisible: true
    });
    $('.scroll-height-675').slimScroll({
        start: $('.slimscrollstart-position'),
        height: '675px',
        color: 'black',
        alwaysVisible: true
    });
});

$(document).on('click', '.select-bill', function () {
    $('.select-bill').prop('checked', false);
    $(this).prop('checked', true);
});

$(document).on('click', '.add-new-bill', function (e) {
	e.preventDefault();
    var count = parseInt($('.hidden-bill-count').val());
    var retail_id 	= $('.hidden-retail-id').val(); 
	var take_away_id 	= $('.hidden-take-away-id').val(); 
	var pick_up_id 		= $('.hidden-pick-up-id').val();
	var occupy_id 		= $('.hidden-occupy-id').val();

	$.ajax({
		type : 'POST',
		url  : baseUrl + '/order/get-data',
		data : {occupy_id : occupy_id , retail_id : retail_id , take_away_id : take_away_id , pick_up_id : pick_up_id},
		async: false,
		success: function (response) {
			var data = $.parseJSON(response);
			var content = 	'<div class="wrapper-content multiple-bill multiple-bill-'+(count+1)+'" data-bill="'+(count+1)+'">' +
								'<div class="panel panel-bordered"> ' +
									'<div class="panel-heading">' +
										'<div class="row">' +
											'<div class="col-lg-10 col-md-10 col-sm-10 col-xs-10 margin-top-10">' +
												'<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">' +
													'<div class="form-group form-material margin-bottom-3 custom-form">' +
														'<input type="number" class="form-control empty-this customer-phone" placeholder="Customer Phone" data-bill="'+(count+1)+'" id="customer-phone-'+(count+1)+'"  name="data['+(count+1)+'][customer_phone]" autocomplete="off" />' +
													'</div>' +
												'</div>' + 
											
												'<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">' +
									                '<div class="form-group form-material margin-bottom-3 custom-form">' +
									                  	'<input type="text" class="form-control empty-this customer-name" placeholder="Customer Name" id="customer-name-'+(count+1)+'" name="data['+(count+1)+'][customer_name]" autocomplete="off" />' +
									                '</div>' +
								                '</div>' +
								                '<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">' +
									                '<div class="form-group form-material margin-bottom-3 custom-form">' +
									                  	'<input type="number" class="form-control empty-this customer-pan" placeholder="PAN" name="data['+(count+1)+'][customer_pan]"/>' +
									                '</div>' +
								                '</div>' +
								                '<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">' +
									                '<div class="form-group form-material margin-bottom-10 custom-form">' +
									                  	'<input type="text" class="form-control empty-this customer-address" placeholder="Address" name="data['+(count+1)+'][customer_address]" autocomplete="off" />' +
									                '</div>' +
								                '</div>' +
								            '</div>' +
								            '<div class="col-lg-2 col-md-2 col-sm-2 col-xs-2">' +
								            	'<span class="margin-left-30"><i class="icon fa-remove remove-bill"></i></span>'+
								            	'<div class="checkbox-custom checkbox-primary">' +
		                                            '<input type="checkbox" id="inputChecked3" name="" class="select-bill select-bill-'+(count+1)+'" data-bill="'+(count+1)+'">' +
		                                            '<label for="inputChecked3"></label>' +
		                                        '</div>' +
								            '</div>' +
								        '</div>' +
						            '</div>' +
									'<div class="panel-body padding-left-10 padding-right-10"> ' +
					                  	'<div class="scroll-height-200 slimscrollstart-position-200">' +
							              	'<div class="example table-responsive margin-0">' +
								                '<table class="table fixed">' +
								                    '<thead>' +
									                    '<tr>' +
									                        '<th>Name</th>' +
									                        '<th>Price</th>' +
									                        '<th class="th-qty-width">Quantity</th>' +
									                        '<th>Total</th>' +
									                        '<th></th>' +
									                    '</tr>' +
								                    '</thead>' +

								                    '<tbody class="order-list">' +
								                    	'<col width="160px"/>' +
													    '<col width="50px"/>' +
													    '<col width="110px"/>' +
													    '<col width="70px"/>' +
													    '<col width="30px"/>' +
									                    
									                '</tbody>' +
								                '</table>' +
					                		'</div>' +
					                	'</div>' +
									'</div> ' +

				            		'<div class="panel-footer">'+
						            	'<div class="row">'+
						            		'<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">'+
							            		'<div class="mrg-top-15">'+
								            		'<div class="row">'+
								            			'<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6"><span class="font-weight-500 span-margin-left-0">Sub Total</span>'+
								            			'</div>'+
								            			'<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">'+
								            				'<span class="margin-left-35 btn-l991 sub-total zero-price span-margin-left-0">'+
								            				'</span>'+
							            				'</div>'+
							            			'</div>' +

							            			'<div class="row discount-form" style="display:none;">'+
								            			'<div class="padding-top-5">'+
									            			'<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">'+
									            				'<div class="row">'+
									            					'<div class="col-lg-4 col-md-12 col-sm-12 col-xs-12">'+
									            						'<span class="font-weight-500 span-margin-left-0">Discount</span>'+
									            					'</div>'+
									            					'<div class="col-lg-8 col-md-12 col-sm-12 col-xs-12">'+
									            						'<span class="custom-touchspin">'+
									            							'<input type="number" class="form-control discount zero-this" name="data['+(count+1)+'][discount]" data-plugin="TouchSpin" data-min="0" data-max="90" data-stepinterval="50" data-maxboostedstep="90" value="0" data-step="5" />'+
									            						'</span>'+
									            					'</div>'+
									            				'</div>'+
									            			'</div>'+
									            			'<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">'+
									            				'<div class="form-group margin-left-35 margin-bottom-5">'+
										            				'<div class="input-group">'+
										            					'<span class="input-group-btn">'+
										                                    '<a class="btn btn-default">'+currency+'</a>'+
										                                '</span>'+
										                                '<input type="number" name="data['+(count+1)+'][discount_amount]" class="form-control discount-amount" value="0">'+
									                                '</div>'+
								                                '</div>'+
									            			'</div>'+
								            			'</div>'+
								            		'</div>';
							            			
							            			if(data.service_charge_rate != 0  && data.service_charge_rate_is_active != 0){
							            				content += '<div class="row">'+
												            			'<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6"><span class="font-weight-500 span-margin-left-0">Service Charge('+data.service_charge_rate+'%)</span>'+
												            			'</div>'+
												            			'<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">'+
												            				'<span class="margin-left-35 btn-l991 service-charge-amount zero-price span-margin-left-0">'+
												            				'</span>'+
											            				'</div>'+
											            			'</div>';
							            			}

								        content +=	'<div class="grey-divider span-margin-left-0"></div>'+

								            		'<div class="row">'+
								            			'<div class="padding-top-5">'+
									            			'<div class="col-lg-6 col-md-3 col-sm-6 col-xs-6"><span class="font-weight-500 color-coffee span-margin-left-0">Grand Total</span></div>'+
									            			'<div class="col-lg-5 col-md-9 col-sm-6 col-xs-6 col-md-offset-1">'+
										            			'<span class="btn-l991 color-coffee grand-total zero-price span-margin-left-0">'+
										            			'</span>'+
																'<span class="round-value">'+
																'</span>'+
																'<input type="hidden" class="amount-required" name="data['+(count+1)+'][amount_required]">' +
									            			'</div>'+
								            			'</div>'+
								            		'</div>'+
								            		'<div class="grey-divider span-margin-left-0"></div>'+
								            		'<div class="row received-amount-parent">' +
								            			'<div class="padding-top-5">' +
								            				'<div class="col-lg-6 col-md-3 col-sm-6 col-xs-6"><span class="font-weight-500 color-coffee span-margin-left-0">Reveived Amount</span></div>' +
								            				'<div class="col-lg-6 col-md-9 col-sm-6 col-xs-6">' +
											            		'<div class="form-group received-amount">' +
											                        '<input type="number" placeholder="Received Amount" required class="form-control amount-received" name="data['+(count+1)+'][received_amount]" min="0">' +
											                    '</div>' +
											                '</div>' +
										                '</div>' +
								            		'</div>' +

								            		'<div class="row tip-amount-parent">' +
								            			'<div class="padding-top-5">' +
								            				'<div class="col-lg-6 col-md-3 col-sm-6 col-xs-6"><span class="font-weight-500 color-coffee span-margin-left-0">Tip Amount</span></div>' +
								            				'<div class="col-lg-6 col-md-9 col-sm-6 col-xs-6">' +
										                        '<div class="form-group tip-amount">' +
											                        '<input type="number" name="data['+(count+1)+'][tip_amount]" placeholder="Tip Amount" class="form-control amount-tip" min="0">' +
											                    '</div>' +
											                '</div>' +
										                '</div>' +
								            		'</div>' +

								            		'<div class="row change-amount-parent">' +
								            			'<div class="padding-top-5">' +
								            				'<div class="col-lg-6 col-md-3 col-sm-6 col-xs-6"><span class="font-weight-500 color-coffee span-margin-left-0">Change Amount</span></div>' +
								            				'<div class="col-lg-6 col-md-9 col-sm-6 col-xs-6">' +
											            		'<div class="form-group change-amount">' +
											                        '<input type="number" name="data['+(count+1)+'][change_amount]" readonly placeholder="Change Amount" class="form-control amount-change" min="0">' +
											                    '</div>' +
											                '</div>' +
										                '</div>' +
								            		'</div>' +

								            		'<div class="row">' +
								            			'<div class="padding-top-5">' +
								            				'<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6"><span class="font-weight-500 color-coffee span-margin-left-0">Payment Type</span></div>' +
								            				'<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">' +
								            					'<div class="form-group">' +
											                     	'<div class="col-sm-9">' +
											                       		'<div class="radio-custom radio-default radio-inline">' +
											                          		'<input type="radio" id="cash-payment-'+(count+1)+'" class="cash-payment-'+(count+1)+' cash-payment" name="data['+(count+1)+'][payment_type]" value="'+payment_type['cash']+'" checked>' +
												                  			'<label for="cash-payment-'+(count+1)+'">Cash</label>' +
											                        	'</div>' +
											                        	'<div class="radio-custom radio-default radio-inline">' +
											                          		'<input type="radio" id="card-payment-'+(count+1)+'" class="card-payment-'+(count+1)+' card-payment" name="data['+(count+1)+'][payment_type]" value="'+payment_type['card']+'">' +
												                  			'<label for="card-payment-'+(count+1)+'">Card</label>' +
											                        	'</div>' +
											                      	'</div>' +
											                    '</div>' +
											               ' </div>' +
										                '</div>' +
								            		'</div>' +
								            		'<input type="hidden" class="service-charge-rate" value="'+data.service_charge_rate+'">'+
								            		'<input type="hidden" class="max-inv" value="">'+
								            		'<input type="hidden" class="main-total zero-this" name="data['+(count+1)+'][total]" value="0">'+
							            		'</div>'+
							            	'</div>	'+
						            		'<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">' +
						            			'<div class="pull-left margin-top-30 btn-l991">' +
						            				'<p class="font-weight-500 max-inv-text">Invoice no: '+ (parseInt($('.hidden-latest-receipt-no').val()) + 1) +'</p>' +
						            			'</div>' +
							            		'<div class="custom-button margin-top-10 pull-right btn-l991">' +
							            			'<button class="btn btn-number_format btn-warning btn-lg apply-discount not discount-btn" type="button" data-allow="false">' +
							            				'<i class="icon fa-ticket font-size-24"></i>' +
							            			'</button>' +
							            		'</div>' +
							            	'</div>' +
						            	'</div>' +
						            '</div>' +
								'</div>' +
							'</div>';
			
			$('.multiple-bill-'+count).after(content);
			$('.hidden-latest-receipt-no').val(parseInt($('.hidden-latest-receipt-no').val())+1);
			$('.quantity').TouchSpin();
            $('.scroll-height-200').slimScroll({
		        start: $('.slimscrollstart-position-200'),
		        height: '200px',
		        alwaysVisible: true
		    });
            $('.hidden-bill-count').val(count+1);
            $('.add-new-bill').hide();
            $(".discount").TouchSpin();
		}
	});
});

$(document).on('click', '.remove-bill', function () {
	$(this).parents('.multiple-bill').find('.order-list .listed-item').each( function () {
		var $order_bill_item = $(this);
		var item = $(this).data('item');
		$('.ordered-item').each( function () {
			var $ordered_item = $(this);
			if( $ordered_item.data('item') == item ) {
				var quantity = parseInt($ordered_item.find('.hidden-remaining-quantity').val()) + parseInt($order_bill_item.find('.quantity').val());
				$ordered_item.find('.hidden-remaining-quantity').val(quantity);
				$ordered_item.find('.remaining-quantity').html(quantity);
			}
		});
	});
	var count = parseInt($('.hidden-bill-count').val());
	$(this).parents('.multiple-bill').remove();
	$('.hidden-bill-count').val(count-1);
	$('.add-new-bill').show();

	$('.select-bill-1').prop('checked', true);
});

$(document).on('click', '.cash-payment', function () {
	var $this = $(this);
    $this.parents('.multiple-bill').find('.received-amount-parent').show();
    $this.parents('.multiple-bill').find('.change-amount-parent').show();
    $this.parents('.multiple-bill').find('.tip-amount-parent').show();
});

$(document).on('click', '.card-payment', function () {
	var $this = $(this);
    $this.parents('.multiple-bill').find('.received-amount-parent').hide();
    $this.parents('.multiple-bill').find('.change-amount-parent').hide();
    $this.parents('.multiple-bill').find('.tip-amount-parent').hide();
});

$(document).on('change keyup', '.amount-received', function () {
    var required = 0;
    var $this = $(this);
    var $print_bill = $(this).parents('.multiple-bill');

    if($print_bill.find('.amount-required').val() != 0) {
        $print_bill.find('.amount-tip').val(0);
        $print_bill.find('.hidden-tip-amount').val(0);
        required = $print_bill.find('.amount-required').val();
    }else{
        $this.val('');
    }
    
    if(required != 0) {
        var received = $this.val();
        var change   = Math.round(received-required);
        $print_bill.find('.amount-change').val(change);
        $print_bill.find('.hidden-received-amount').val(received);
        $print_bill.find('.hidden-change-amount').val(change);
    }
});

$(document).on('change' , '.amount-tip' , function (e) {
    e.preventDefault();
    var $this = $(this);

    if ($this.val() < 0) {
        $this.val(0);
        var tip = 0;
    }else {
        var tip = $this.val();
    }

    var $print_bill = $(this).parents('.multiple-bill');

    if($print_bill.find('.amount-required').val() == 0) {
        var prev_amount_change = $print_bill.find('.bill-amount').val() - $print_bill.find('.already-received-amount').val();
        var new_amount_change   = Math.abs(prev_amount_change) - tip;
        $print_bill.find('.amount-change').val((new_amount_change > 0) ? new_amount_change : 0);
        $print_bill.find('.hidden-tip-amount').val(tip);
    }else {
        var prev_amount_change = $print_bill.find('.amount-received').val() - $print_bill.find('.amount-required').val();
        var new_amount_change   = prev_amount_change - tip;
        $print_bill.find('.amount-change').val((new_amount_change > 0) ? new_amount_change : 0);
        $print_bill.find('.hidden-tip-amount').val(tip);
    }
});

$(document).on('click','.ordered-item', function (e) {
	e.preventDefault();
	if( $( "input:checked" ).length != 0 ) {
		var $this 	 = $(this);
		var unique_id = $(this).data('unique-id');
		var item  	 = $this.data('item');
		var item_id  = $this.data('item-id');
		var price  	 = $this.data('price');
		var quantity = $this.data('quantity');
		var name     = $this.data('item-name');
		var type     = $this.data('item-type');
		var discountable = $this.data('discountable');
		var parent 	 = $('.select-bill:checked').parents('.multiple-bill');
		var remaining_quantity = $('.ordered-item.' + unique_id).find('.hidden-remaining-quantity').val();

		if(remaining_quantity > 0) {
			if (parent.find('.order-list .listed-item').hasClass(unique_id)) {
			    $item = parent.find('.order-list .'+unique_id);
			    var qty = $item.find('.quantity').val();
			    if (qty == '' || qty == null) {
			        qty = 0;
			    }
			    qty++;

			    $item.find('.quantity').val(qty);
			    $item.find('.total-val').val(qty * price);
			    $item.find('.total').html(qty * price);

			    var $list  = parent.find('.order-list').find('.total-val');
				calculateTotal(parent , $list , 'discount_percent');
			}
			else {
				var selected_count = 0;
				parent.find('.listed-item').each(function () {
					selected_count++;
				});	

				if(type == item_type['regular']) {
                    content = '<tr class="listed-item '+unique_id+'" data-unique-id="'+unique_id+'" data-list="all_list" data-item="'+item+'" data-price="'+price+'" data-discountable="'+discountable+'">'+
                                        '<input type="hidden" name="data['+parent.data('bill')+'][items]['+(selected_count)+'][item]" class="item" value="'+item+'">'+
                                        '<input type="hidden" name="data['+parent.data('bill')+'][items]['+(selected_count)+'][item_id]" class="item-id" value="'+item_id+'">' +
                                        '<input type="hidden" name="data['+parent.data('bill')+'][items]['+(selected_count)+'][price]" class="item-price" value="'+price+'">' +
                                        '<input type="hidden" class="total-val" value="'+ price + '">'+
                                        '<input type="hidden" name="data['+parent.data('bill')+'][items]['+(selected_count)+'][type]" class="hidden-type" value="'+type+'" >' +
                                        '<input type="hidden" name="data['+parent.data('bill')+'][items]['+(selected_count)+'][discountable]" class="hidden-discountable" value="'+discountable+'" >' +
                                        '<td>'+name+'</td>'+
                                        '<td>'+price+'</td>'+
                                        '<td class="custom-quantity-parent">'+
                                            '<input type="number" readonly class="form-control custom-input quantity custom-quantity-input" name="data['+parent.data('bill')+'][items]['+(selected_count)+'][quantity]" data-plugin="TouchSpin" data-min="1" data-max="' + quantity + '" data-stepinterval="50" data-maxboostedstep="'+quantity+'" value="1" />'+
                                        '</td>'+
                                        '<td><span class="total">'+price+'</span></td>'+
                                        '<td class="padding-right-0 padding-left-0"><button class="btn close-btn pull-right multiple-bill-remove-item" type="button"><i class="fa fa-close"></i></button></td>'+
                                    '</tr>';
                }
                else{
                    content = '<tr class="listed-item '+unique_id+'" data-unique-id="'+unique_id+'" data-list="all_list" data-item="'+item+'" data-price="'+price+'">'+
                                    '<input type="hidden" name="data['+parent.data('bill')+'][items]['+(selected_count)+'][item]" class="item" value="'+item+'">'+
                                    '<input type="hidden" name="data['+parent.data('bill')+'][items]['+(selected_count)+'][item_id]" class="item-id" value="'+item_id+'">' +
                                    '<input type="hidden" name="data['+parent.data('bill')+'][items]['+(selected_count)+'][price]" class="item-price" value="'+price+'">' +
                                    '<input type="hidden" class="total-val" value="'+ price + '">'+
                                    '<input type="hidden" name="data['+parent.data('bill')+'][items]['+(selected_count)+'][type]" class="hidden-type" value="'+type+'" >' +
                                    '<td>Special-Item('+name+')</td>'+
                                    '<td>'+price+'</td>'+
                                    '<td class="custom-quantity-parent">'+
                                        '<input type="number" readonly class="form-control custom-input quantity custom-quantity-input" name="data['+parent.data('bill')+'][items]['+(selected_count)+'][quantity]" data-plugin="TouchSpin" data-min="1" data-max="' + quantity + '" data-stepinterval="50" data-maxboostedstep="'+quantity+'" value="1" />'+
                                    '</td>'+
                                    '<td><span class="total">'+price+'</span></td>'+
                                    '<td class="padding-right-0 padding-left-0"><button class="btn close-btn pull-right multiple-bill-remove-item" type="button"><i class="fa fa-close"></i></button></td>'+
                                '</tr>';
                }
		    	
		    	parent.find('.order-list').append(content);
		    	$('.quantity').TouchSpin();

				var $list  = parent.find('.order-list').find('.total-val');
				calculateTotal(parent , $list , 'discount_percent');
		    }
	    	
	    	if(remaining_quantity == '') {
	    		$('.ordered-item.' + unique_id).find('.remaining-quantity').html(quantity-1);
	    		$('.ordered-item.' + unique_id).find('.hidden-remaining-quantity').val(quantity-1);
	    	}else {
	    		$('.ordered-item.' + unique_id).find('.remaining-quantity').html(remaining_quantity-1);
	    		$('.ordered-item.' + unique_id).find('.hidden-remaining-quantity').val(remaining_quantity-1);
	    	}
    	}
    }
});

$(document).on('change keydown', '.quantity', function (e) {
 	e.preventDefault();
 	var parent 	 = $(this).parents('.listed-item');
 	var unique_id = parent.data('unique-id');
	var item  	 = parent.data('item');
	var price  	 = parent.data('price');
	var quantity = parent.data('quantity');
	var name     = parent.data('item-name');
	var total_quantity 		= parseInt($('.ordered-item.' + unique_id).data('quantity'));
	var remaining_quantity 	= $('.ordered-item.' + unique_id).find('.hidden-remaining-quantity').val();
	var selected_quantity = 0;

	var $order = $(this).parents('.multiple-bill');
    var $list  = $order.find('.order-list').find('.total-val');

	if(remaining_quantity > 0 || remaining_quantity <= total_quantity) {
		$('.listed-item.'+unique_id).each(function() {
		    selected_quantity += parseInt($(this).find('.quantity').val());
		});

		if((total_quantity - selected_quantity) >= 0) {
			increment(parent , price , item);
			$('.ordered-item.' + unique_id).find('.remaining-quantity').html(total_quantity - selected_quantity);
			$('.ordered-item.' + unique_id).find('.hidden-remaining-quantity').val(total_quantity - selected_quantity);
		}
		else{
			$(this).val($(this).val()-1);
			basicAlert('Quantity not remaining','','info');
			return false;
		}
	}

	calculateTotal($order , $list , 'discount_percent');
});

$(document).on('change keydown' , '.discount', function (e) {
    e.preventDefault();
    var $order = $(this).parents('.multiple-bill');
    var $list  = $order.find('.order-list').find('.total-val');
    calculateTotal($order , $list , 'discount_percent');
}); 

$(document).on('blur' , '.discount-amount', function (e) {
    e.preventDefault();
    var $order = $(this).parents('.multiple-bill');
    var $list  = $order.find('.order-list').find('.total-val');
    calculateTotal($order , $list , 'discount_amount');
}); 

$(document).on('click', '.apply-discount', function (e) {
    e.preventDefault();
    var $that           = $(this).parents('.multiple-bill').find('.apply-discount');
    var $discount_form  = $(this).parents('.multiple-bill').find('.discount-form');
    var $discount       = $(this).parents('.multiple-bill').find('.discount');

    if ($that.hasClass('not')) {
        bootbox.prompt({
            title: "<h2 class="+'text-center'+">Discount Approval</h2> <p class="+'text-center'+">Please enter your pin code to proceed ?</p>",
            inputType: 'password',
            buttons: {
                confirm: {
                    label: 'Yes, Proceed.',
                    className: 'btn-primary'
                },
                cancel: {
                    label: 'Cancel',
                    className: 'btn-default'
                }
            },
            callback: function (result) {
                $('.bootbox-input-password').parents('.bootbox-form').find('.error').remove();
                if (result === null) {
                    $('div').remove('.custom-bootbox-overlay');
                }  
                if (result === false) {
                    return false;
                }      
                if (result === "") {  
                    $('.bootbox-input-password').after("<span class='error'>You need to provide your pin code to proceed! <i class='icon fa-remove remove-error'></i></span>");
                    return false   
                } 
                $.ajax({
                    url: baseUrl+'/common/check-pin-code',
                    data: {pin: result},
                    type: 'POST',
                    async: false,
                    success: function (response) { 
                        var data = $.parseJSON(response); 
                        if (data != false) {
                            $('div').remove('.custom-bootbox-overlay');
                            $('.amount-received').val('0');
                            $('.amount-change').val('0');
                            $discount_form.show();
                            $discount.trigger("touchspin.updatesettings", {max: data.max_discount});
                            $that.html('<i class="icon fa-times"></i>');
                            $that.removeClass('not');
                            return false;
                        }
                        else {
                            $('div').remove('.custom-bootbox-overlay');
                            $('.bootbox-input-password').after("<span class='error'>Incorrect Pin Code <i class='icon fa-remove remove-error'></i></span>"); 
                            return false;  
                        }
                    }
                }); 
            }
        });

        $('.bootbox-input-password').attr('placeholder', 'Please enter your pin code');
        $('.bootbox').before('<div class="custom-bootbox-overlay"></div>');
    }
    else {
        $discount_form.hide();
        $discount.val(0);
        $discount.trigger("touchspin.updatesettings", {max: 0});
        $discount_form.find('.discount-amount').val(0);
        $that.html('<i class="icon fa-exchange"></i>');
        $that.addClass('not');

        var $order = $(this).parents('.multiple-bill');
    	var $list  = $order.find('.order-list').find('.total-val');
        calculateTotal($order , $list , 'discount_amount');

        return false; 
    }
});

$(document).on('click', '.multiple-bill-remove-item', function (e) {
	e.preventDefault();
	var parent 	 	= $(this).parents('.listed-item');
	var item  	 	= parent.data('item');
	var unique_id  	= parent.data('unique-id');
	var removed_quantity = parseInt(parent.find('.quantity').val());
	var old_quantity 	 = parseInt($('.ordered-item.' + unique_id).find('.hidden-remaining-quantity').val());
	$('.ordered-item.' + unique_id).find('.remaining-quantity').html(old_quantity + removed_quantity);
	$('.ordered-item.' + unique_id).find('.hidden-remaining-quantity').val(old_quantity + removed_quantity);

	var $order = $(this).parents('.multiple-bill');
    parent.remove();
    var $list  = $order.find('.order-list').find('.total-val');
	calculateTotal($order , $list , 'discount_percent');
});

$(document).on('click', '.make-multiple-order', function (e) {
    e.preventDefault();
    //$('.print-loading-modal').modal('show');
    var status = true;

    if($('.ordered-item').length == 0) {
    	basicAlert('Sorry, Cannot pay empty bill', '', 'info');
    	//$('.print-loading-modal').modal('hide');
    	status = false;
    }

    $('.ordered-item').each( function () {
    	if($(this).find('.hidden-remaining-quantity').val() > 0) {
    		basicAlert('Sorry, You have some remaining items to be selected', '', 'info');
    		//$('.print-loading-modal').modal('hide');
    		status = false;
    	}
    });

    if(status == true) {
    	var $form = $('.multiple-order-desk'); 
	    $.ajax({
	    	type : 'POST',
	        url  : $form.attr('action'),
	        data : $form.serialize(),
	        async: true,
	        success: function (response) { 
	            var data = $.parseJSON(response);
	            if(data != false) {
	            	//$('.print-loading-modal').modal('hide');
	            	typeAlertRedirect('Success', 'Bill has been successfully created', 'success', baseUrl+'/table');
	            }
	        }
	    });
    }
});

function increment($item ,price ,item) {
    var qty = $item.find('.quantity').val();
    var total = qty*price;
    $item.find('.total-val').val(total);
    $item.find('.total').html(total);
}

/*function in which discount is calculated before service charge*/
function calculateTotal($order ,$list ,discount_type) { 

    var sub_total=0;
    var discountable_sub_total=0;
    $order.find('.sub-total').html(currency+' 0');
    $order.find('.service-charge-amount').html(currency+' 0');
    $order.find('.grand-total').html(currency+' 0');
    $order.find('.main-total').val(0);
    
    $list.each( function (i,val) { 
        if($(this).parents('tr').data('discountable') == item_discountable['yes']) {
            discountable_sub_total += parseFloat($(this).val());    
        }
        sub_total += parseFloat($(this).val());

        if (i == $list.length - 1) {
            $order.find('.sub-total').html(currency+' ' + numberFormat(sub_total));
            
            var discount_total = 0;
            var discount_percent = 0;
            if(discount_type == 'discount_percent'){
                $order.find('.discount-amount').val(0);
                var discount = $order.find('.discount').val();
                if (discount != null || discount != '' || discount != 'undefined') {
                    discount_total = ((((discount / 100) * discountable_sub_total) * 100) / 100).toFixed(2);
                    $order.find('.discount-amount').val(discount_total);

                    if ($order.is($('.order-desk'))) {
                        var discount_total = parseFloat(discount_total) + parseFloat($order.find('.total-discount-amount').val()); 
                        $order.find('.total-discount-amount-view').html(currency+' ' + numberFormat(discount_total));
                    }
                }  
            }else if(discount_type == 'discount_amount') {
                $order.find('.discount').val(0);
                var discount = $order.find('.discount-amount').val();

                if (discount != null && discount != '' && discount != 'undefined') {
                    if(discountable_sub_total != 0){
                        discount_percent = ((discount  / discountable_sub_total) * 100).toFixed(2);
                    }else{
                        discount_percent = 0
                    }                    
                    discount_total = discount;
                    if(discount_percent > 90) {
                        discount_percent = 0;
                        discount_total   = 0;
                        $order.find('.discount-amount').val(0);
                        basicAlert('Discount cannot exceed 90 percent', '', 'info'); 
                    }else{
                       $order.find('.discount').val(discount_percent); 
                    }

                    if ($order.is($('.order-desk'))) {
                        var discount_total = parseFloat(discount_total) + parseFloat($order.find('.total-discount-amount').val()); 
                        $order.find('.total-discount-amount-view').html(currency+' ' + numberFormat(discount_total));
                    }
                }
            }

            var gross_amount = sub_total - discount_total;

            var service_charge_total = 0;
            var service_charge_rate = parseFloat($order.find('.service-charge-rate').val());
            if (service_charge_rate != null || service_charge_rate != '' || service_charge_rate != 'undefined') {
                if(service_charge_rate != '0'){
                    service_charge_total = (((service_charge_rate / 100) * gross_amount) * 100) / 100;
                    $order.find('.service-charge-amount').html(currency+' ' + numberFormat(service_charge_total));
                }
            }

            var grand_total = 0;
            var total_amt   = 0;
            var round_value = 0;
            grand_total     = gross_amount + service_charge_total; 
            total_amt       = Math.round(grand_total).toFixed(2);
            round_value     = (total_amt - grand_total).toFixed(2);
            $order.find('.grand-total').html(currency+' ' + numberFormat(total_amt));
            $order.find('.round-value').html('(' + round_value + ')');

            $order.find('.main-total').val(Math.round(grand_total , 2));
        }
    });
}
/*function in which discount is calculated before service charge*/



$(document).on('change','.customer-phone',function(e){
	var $this       = $(this);
	var value       = $this.val();
	var bill_id		= $this.data('bill');

    $.ajax({
        type: 'POST',
        url : baseUrl + '/delivery/check-customer',
        data: { value : value},
        async: false,
        success: function (response) {
            var res = $.parseJSON(response);
            $this.val(res.data);
            if(res.exists=='true'){
     
                swal({
                    title: 'Such User already exists!',
                    text: 'Fill auto form?',
                    type: "info",
                    showCancelButton: true,
                    confirmButtonColor: "rgb(190, 92, 73)",
                    confirmButtonText: 'Yes',
                    closeOnConfirm: false
                },
                function() {
					var catcher = '#customer-name-'+bill_id
					$(catcher).val(res.customer['name']);
					
                  
                    swal.close();
                });
            }else{
                console.log('false');

			}

		
        }
    });
})
