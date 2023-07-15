
$(function () {
    $('.scroll-height-280').slimScroll({
        start: $('.slimscrollstart-position-dashboard'),
        height: '280px'
    });
});

$(document).on('submit', '.add-capacity', function (e) {
 	e.preventDefault();
 	var capacity = $(this).find('.capacity').val();
 	$.ajax({
 		type : 'POST',
 		url  : baseUrl + '/capacity/add',
 		data : {capacity : capacity},
 		async: false,
 		success: function (response) {
 			var res = $.parseJSON(response);
 			if(res) {
 				typeAlertRedirect('Success!', 'New Capacity has been recorded', 'success', '');
 			}
 			else {
 				typeAlertRedirect('Error!', 'Sorry ! Something went wrong', 'error', '');
 			}
 		}
 	});
});

$(document).on('click', '.view-todays-sales-detail', function (e) {
 	e.preventDefault();
 	$.ajax({
 		type : 'POST',
 		url  : baseUrl + '/dash/view-todays-sales-detail',
 		async: false,
 		success: function (response) {
 			var res = $.parseJSON(response);
 			if(res != false) {
 				var content  	= '';
				
	            var sub_total  	= 0;
	            var discount_rate_total  		= 0;
	            var discount_amount_total  		= 0;
	            var service_charge_rate_total  	= 0;
	            var service_charge_amount_total = 0;
	            var cash_total 	= 0;
	            var card_total 	= 0;
	            var credit_total= 0;
	            var total      	= 0;
	            var i=0;

	            if(res.data != '') {
	            	
	            	$.each(res.data, function (i , val) { i++;
	            		sub_total 		+= parseInt(val.sub_total);
	            		discount_rate_total 		+= parseInt(val.discount_rate);
	            		discount_amount_total 		+= parseInt(val.discount_amount);
	            		service_charge_rate_total 	+= parseInt(val.service_charge_rate);
	            		service_charge_amount_total += parseInt(val.service_charge_amount);
	                    cash_total 		+= parseInt(val.cash_total); 
	                    card_total 		+= parseInt(val.card_total); 
	                    credit_total 	+= parseInt(val.credit_total);
	                    total 			+= parseInt(val.total);

	                    content += '<tr>'+
				                        '<td>'+i+'</td>' +
				                        '<td>' + val.customer_name + '</td>' +
				                        '<td>' + val.customer_pan + '</td>' +
				                        '<td><a class="read-invoice" href="' + baseUrl + '/reports/invoice/' + val.invoice_no + '" data-invoice="' + val.invoice_no + '" data-invoice-type="order_invoice">INV-' + val.invoice_no + '</a></td>' +
				                        '<td>'+ currency + ' ' + val.sub_total + '</td>' +
				                        '<td>'+ currency + ' ' + val.discount_rate + '</td>' +
				                        '<td>'+ currency + ' ' + val.discount_amount + '</td>' +
				                        '<td>'+ currency + ' ' + val.service_charge_rate + '</td>' +
				                        '<td>'+ currency + ' ' + val.service_charge_amount + '</td>' +
				                        '<td>'+ currency + ' ' + val.total + '</td>';

				                        if(val.cash_total == 0 && val.card_total == 0 && val.credit_total == 0) {
					                        if(val.payment_type == payment_type['cash']) 
	                                        {
	                                            content += '<td>' + currency;
	                                            content += (val.cash_total == 0) ? val.total : val.cash_total ;
	                                            content += '</td>';
	                                        }else{
	                                            content += '<td>'+currency+'0</td>';
	                                        }
	                                    } else {
                                            content += '<td>'+ currency +  val.cash_total +'</td>';
                                        }

                                        if(val.cash_total == 0 && val.card_total == 0 && val.credit_total == 0) {
	                                        if(val.payment_type == payment_type['card']) 
	                                        {
	                                            content += '<td>'+currency;
	                                            content += (val.card_total == 0) ? val.total : val.card_total ;
	                                            content += '</td>';
	                                        }else{
	                                            content += '<td>'+currency+'0</td>';
	                                        }
	                                    } else {
                                            content += '<td>'+currency+ val.card_total+'</td>';
                                        }  

                                        if(val.cash_total == 0 && val.card_total == 0 && val.credit_total == 0) {
	                                        if(val.payment_type == payment_type['credit']) 
	                                        {
	                                            content += '<td>'+currency;
	                                            content += (val.credit_total == 0) ? val.total : val.credit_total ;
	                                            content += '</td>';
	                                        }else{
	                                            content += '<td>'+currency+'0</td>';
	                                        }
	                                    } else {
                                            content += '<td>'+currency+val.credit_total+'</td>';
                                        } 

				             content += '<td>' + val.created_on + '</td>' +
				                        '<td>' + val.user_name + '</td>' +
				                    '</tr>';

				        if (i == res.data.length) {

				        	var $modal = $('.modal-todays-sales-detail');
				        	$modal.find('.td-sub-total').html(currency+" "+sub_total);
				        	$modal.find('.td-discount-amount-total').html(currency+" "+discount_amount_total);
				        	$modal.find('.td-service-charge-amount-total').html(currency+" "+service_charge_amount_total);
				        	$modal.find('.td-cash-total').html(currency+" "+cash_total);
				        	$modal.find('.td-card-total').html(currency+" "+card_total);
				        	$modal.find('.td-credit-total').html(currency+" "+credit_total);
				        	$modal.find('.td-total').html(currency+" "+total);

				        	$('.modal-todays-sales-detail').find('.todays-sales-data').html(content);
			                $table = $('.todays-sales-detail');
			                $table.find('tbody').html(content); 
			                initDataTableWithExport($table); 
			                $('.modal-todays-sales-detail').modal('show'); 
				        }
	                });
	            } else {
		        	content = 	'<tr>'+
			                        '<td colspan="9" class="text-center">No data are available</td>' +
			                    '</tr>';
			        $('.modal-todays-sales-detail').find('.todays-sales-data').html(content);
		            $('.modal-todays-sales-detail').modal('show'); 
		        }
 			} 
 		}
 	});
});