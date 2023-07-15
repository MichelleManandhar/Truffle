$(document).on('click', '.read-invoice', function (e) {
    e.preventDefault(); 
    var invoice = $(this).data('invoice');
    var invoice_type    = $(this).data('invoice-type');
    $.ajax({
        url: baseUrl + '/reports/invoice',
        data: {invoice : invoice , type : invoice_type},
        type: 'POST',
        async: false,
        success: function (response) { 
            var data = $.parseJSON(response);
            
            if (data != false) { 
                var type = data.type;
                $('.hidden-order-id').val(data.order.id);
                var content = 
                            '<div class="row row-lg">'+
                                '<div class="col-sm-12 col-lg-12 col-md-12">'+
                                    '<div class="row row-lg">'+
                                        '<div class="col-lg-6 col-md-6 col-sm-6">';
                                            if(invoice_type == 'debtor_invoice') {
                                                content += '<h4>'+data.order.customer_name+'</h4>';
                                            }else {
                                                content += '<h4>Invoice No. : '+data.order.invoice_no+'</h4>';
                                            }
                            content += '</div>'+
                                        '<div class="col-lg-6 col-md-6 col-sm-6">'+
                                            '<p class="pull-right">Date: '+data.order.created_on+'</p>'+
                                        '</div>'+
                                    '</div>'+
                                '</div>';

                if(data.type == 'order') {
                    content += '<div class="col-sm-12 col-lg-12 col-md-12 margin-top-30">'+
                                    '<div class="row row-lg">'+
                                        '<div class="col-md-6">'+
                                           ' <p>Customer Name: <u>'+data.order.customer_name+'</u></p>'+
                                        '</div>'+
                                        '<div class="col-md-6">'+
                                            '<p>Customer Pan: <u>'+((data.order.customer_pan == 0) ? 'N/A' : data.order.customer_pan)+'</u></p>'+
                                        '</div>';
                                    if(data.order.type == order_type['table_order']) {
                                        content +=  '<div class="col-md-6">'+
                                                        '<p>Customer Pax: <u>'+((data.order.customer_pax == 0) ? 'N/A' : data.order.customer_pax)+'</u></p>'+
                                                    '</div>'+
                                                    '<div class="col-md-6">'+
                                                        '<p>Table Name: <u>'+((data.order.table_name == '') ? 'N/A' : data.order.table_name)+'</u></p>'+
                                                    '</div>';
                                    }
                            content += '</div>'+
                                    '</div>';
                }
                
                        content +=  
                                '<div class="col-sm-12 col-lg-12 col-md-12 margin-top-20">'+
                                    '<table class="table table-hover dataTable table-striped width-full with-export dtr-inline" >'+
                                        '<thead>'+
                                            '<tr>'+
                                                '<th width="27">#</th>'+
                                                '<th width="100">Particular</th>'+
                                                '<th width="50">Quantity</th>'+
                                               ' <th width="50">Price ('+currency+')</th>'+
                                                '<th width="100">Total ('+currency+')</th>'+
                                            '</tr>'+
                                        '</thead>'+
                                        '<tbody>';
                    
                j=0;
                for(i=0; i<data.data.length; i++) { 
                    j++;
                    total = parseInt(data.data[i].quantity) * parseFloat(data.data[i].price);
                    content += '<tr>'+
                                    '<td>'+j+'</td>';
                                    if(data.data[i].type == item_type['regular']) {
                                        content +=  '<td>'+data.data[i].menu_item+'</td>';
                                    }else{
                                        content +=  '<td>Special-Item('+data.data[i].special_item_name+')</td>';
                                    }
                        
                        content +=  '<td>'+data.data[i].quantity+'</td>'+
                                    '<td>'+numberFormat(data.data[i].price)+'</td>'+
                                    '<td>'+numberFormat(total)+'</td>'+
                                '</tr>';
                }

                content += '</tbody>'+
                        '</table>'+
                    '</div>'+
                    '<div class="col-sm-12 col-lg-12 col-md-12 margin-top-20">' +
                        '<div class="row row-lg">' +
                            '<div class="col-lg-12 col-md-12 col-sm-12">' +
                                '<div class="row row-lg">' +
                                    '<div class="col-lg-7 col-md-7 col-sm-7 col-lg-offset-5 col-md-offset-5 col-sm-offset-5">' +
                                        '<p>Sub Total : '+currency+numberFormat(data.order.sub_total)+'</p>' +
                                    '</div>' +
                                '</div>' +
                                /*((data.order.service_charge_rate > 0) ? 
                                ('<div class="row row-lg">' +
                                    '<div class="col-lg-5 col-md-5 col-sm-5">' +
                                        '<p>Service Charge Rate : ' + data.order.service_charge_rate + '%</p>' +
                                    '</div>' +
                                    '<div class="col-lg-7 col-md-7 col-sm-5">' +
                                        '<p>Service Charge Amount : '+currency+numberFormat(data.order.service_charge_amount)+'</p>'+
                                    '</div>' +
                                '</div>')
                                : '' ) +
                                ((data.order.discount_rate > 0) ? 
                                ('<div class="row row-lg">'+
                                    '<div class="col-lg-5 col-md-5 col-sm-5">'+
                                        '<p>Discount Rate : '+data.order.discount_rate+'%</p>'+
                                    '</div>'+
                                    '<div class="col-lg-7 col-md-7 col-sm-7">'+
                                        '<p>Discount Amount : '+currency+numberFormat(data.order.discount_amount)+'</p>'+
                                    '</div>'+
                                '</div>')
                                : '' );*/
                                ((data.order.discount_rate > 0) ? 
                                ('<div class="row row-lg">'+
                                    '<div class="col-lg-5 col-md-5 col-sm-5">'+
                                        '<p>Discount Rate : '+data.order.discount_rate+'%</p>'+
                                    '</div>'+
                                    '<div class="col-lg-7 col-md-7 col-sm-7">'+
                                        '<p>Discount Amount : '+currency+numberFormat(data.order.discount_amount)+'</p>'+
                                    '</div>'+
                                '</div>')
                                : '' )+
                                ((data.order.service_charge_rate > 0) ? 
                                ('<div class="row row-lg">' +
                                    '<div class="col-lg-5 col-md-5 col-sm-5">' +
                                        '<p>Service Charge Rate : ' + data.order.service_charge_rate + '%</p>' +
                                    '</div>' +
                                    '<div class="col-lg-7 col-md-7 col-sm-7">' +
                                        '<p>Service Charge Amount : '+currency+numberFormat(data.order.service_charge_amount)+'</p>'+
                                    '</div>' +
                                '</div>')
                                : '' );
                                    
                    content +=  /*'<div class="row row-lg">' +
                                    '<div class="col-lg-7 col-md-7 col-sm-7 col-lg-offset-5 col-md-offset-5 col-sm-offset-5">' +
                                        '<p>Taxable Amount : '+currency+numberFormat(data.order.taxable_amount)+'</p>' +
                                    '</div>' +
                                '</div>' +
                                '<div class="row row-lg">' +
                                    '<div class="col-lg-5 col-md-5 col-sm-5">' +
                                        '<p>Vat Rate : ' + data.order.vat_rate + '%</p>' +
                                    '</div>' +
                                    '<div class="col-lg-7 col-md-7 col-sm-7">' +
                                        '<p>Vat Amount : '+currency+numberFormat(data.order.vat_amount)+'</p>'+
                                    '</div>' +
                                '</div>'+*/
                                '<div class="row row-lg">'+
                                    '<div class="col-lg-7 col-md-7 col-sm-7 col-lg-offset-5 col-md-offset-5 col-sm-offset-5">' +
                                        '<p class="color-coffee">Total : '+currency+numberFormat(data.order.total)+'</p>'+
                                    '</div>';
                    if(!$('.modal-read-invoice .invoice-content').hasClass('vat')){
                        if(data.break_down.total != 0) {
                        content +=  '<div class="col-lg-7 col-md-7 col-sm-7 col-lg-offset-5 col-md-offset-5 col-sm-offset-5">' +
                                        '<p class="color-coffee"><button type="button" class="btn btn-success btn-xs view-partial-payment-detail">'+
                                            'Break Down Detail</button> '+currency+numberFormat(data.break_down.total)+'</p>'+
                                    '</div>'+
                                    '<div class="col-lg-7 col-md-7 col-sm-7 col-lg-offset-5 col-md-offset-5 col-sm-offset-5">' +
                                        '<p class="color-coffee">'+
                                            'Payable Total</button> : '+currency+numberFormat(data.order.payable_total)+'</p>'+
                                    '</div>';
                        }

                        content +=  '<div class="col-lg-7 col-md-7 col-sm-7 col-lg-offset-5 col-md-offset-5 col-sm-offset-5">' +
                                        '<p class="color-coffee">Received Amount : '+currency+numberFormat(data.order.received_amount)+'</p>'+
                                    '</div>'+
                                    '<div class="col-lg-7 col-md-7 col-sm-7 col-lg-offset-5 col-md-offset-5 col-sm-offset-5">' +
                                        '<p class="color-coffee">Change Amount : '+currency+numberFormat(data.order.change_amount)+'</p>'+
                                    '</div>';
                    }
                    content +=  '</div>'+
                            '</div>'+
                        '</div>'+
                    '</div>'+
                    '<div class="col-sm-12 col-lg-12 col-md-12 margin-top-30">'+
                        '<div class="row row-lg">'+
                            '<div class="col-md-12">'+
                                '<p>Sales by : <u class="caps">'+data.order.user_name+'</u></p>'+
                            '</div>'+
                        '</div>'+
                    '</div>'+
                '</div>';

                if(invoice_type != 'debtor_invoice') {
                    $('.modal-read-invoice .invoice-header').html('Report : INV-' + data.order.invoice_no);
                }else{
                    $('.modal-read-invoice .invoice-header').html('');
                }
                
                $('.modal-read-invoice .invoice-content').html(content);
                $('.modal-read-invoice').modal('show');

            }
            else {
               typeAlertRedirect('Error!', 'Could not fetch data at this time.', 'error', '');
            }
        }
    });
});

$(document).on('click', '.read-invoice-with-kot-return', function (e) {
    e.preventDefault(); 
    var invoice = $(this).data('invoice');
    var invoice_type    = $(this).data('invoice-type');
    $.ajax({
        url: baseUrl + '/reports/get-order-detail-with-kot-return',
        data: {invoice : invoice , type : invoice_type},
        type: 'POST',
        async: false,
        success: function (response) { 
            var data = $.parseJSON(response);
            console.log(data);
            if (data != false) { 
                var type = data.type;
                $('.hidden-order-id').val(data.order.id);
                var content = 
                            '<div class="row row-lg">'+
                                '<div class="col-sm-12 col-lg-12 col-md-12">'+
                                    '<div class="row row-lg">'+
                                        '<div class="col-lg-6 col-md-6 col-sm-6">';
                                            if(invoice_type == 'debtor_invoice') {
                                                content += '<h4>'+data.order.customer_name+'</h4>';
                                            }else {
                                                content += '<h4>Invoice No. : '+data.order.invoice_no+'</h4>';
                                            }
                            content += '</div>'+
                                        '<div class="col-lg-6 col-md-6 col-sm-6">'+
                                            '<p class="pull-right">Date: '+data.order.created_on+'</p>'+
                                        '</div>'+
                                    '</div>'+
                                '</div>';

                if(data.type == 'order') {
                    content += '<div class="col-sm-12 col-lg-12 col-md-12 margin-top-30">'+
                                    '<div class="row row-lg">'+
                                        '<div class="col-md-3">'+
                                            '<p>Customer Name: <u>'+data.order.customer_name+'</u></p>'+
                                        '</div>'+
                                        '<div class="col-md-3">'+
                                            '<p>Customer Pan: <u>'+((data.order.customer_pan == 0) ? 'N/A' : data.order.customer_pan)+'</u></p>'+
                                        '</div>';
                                    if(data.order.type == order_type['table_order']) {
                                        content +=  '<div class="col-md-3">'+
                                                        '<p>Customer Pax: <u>'+((data.order.customer_pax == 0) ? 'N/A' : data.order.customer_pax)+'</u></p>'+
                                                    '</div>'+
                                                    '<div class="col-md-3">'+
                                                        '<p>Table Name: <u>'+((data.order.table_name == '') ? 'N/A' : data.order.table_name)+'</u></p>'+
                                                    '</div>';
                                    }
                            content += '</div>'+
                                    '</div>';
                }
                
                content +=  
                        '<div class="col-sm-12 col-lg-12 col-md-12 margin-top-20">'+
                            '<table class="table table-hover dataTable table-striped width-full with-export dtr-inline">'+
                                '<thead>'+
                                    '<tr>'+
                                        '<th width="27">#</th>'+
                                        '<th width="100">Particular</th>'+
                                        '<th width="50">KOT No.</th>'+
                                        '<th width="50">Price</th>'+
                                        '<th width="50">Ordered Quantity</th>'+
                                        '<th width="200">Returned Quantity</th>'+
                                    '</tr>'+
                                '</thead>'+
                                '<tbody>';
            
                j=0;
                var sub_total_amount = 0;
                var total_quantity  = 0;

                var sub_total_returned_amount   = 0;
                var total_returned_quantity = 0;

                $.each(data.kot_items, function (i, kot_item) {
                    j++;
                    content +=  '<tr>'+
                                    '<td width="27">'+j+'</td>';
                                    if(kot_item.type == item_type['regular']) {
                                        content +=  '<td width="100">'+kot_item.menu_item+'</td>';
                                    }else{
                                        content +=  '<td width="100">Special-Item('+kot_item.special_item_name+')</td>';
                                    }

                                    content += '<td width="50">';
                                        $.each(data.kot_number[kot_item['item_id']], function (k, k_number) {
                                            content += k_number+'<br>';
                                        });
                                    content += '</td>';
                        
                        content +=  '<td width="50">'+kot_item.price+'</td>'+
                                    '<td width="50">'+kot_item.quantity+'</td>'+
                                    '<td width="200">'+
                                        '<div class="scroll-height-200 slimscrollstart-position-200">';

                                        total_quantity += kot_item.quantity;
                                        sub_total_amount += kot_item.price * kot_item.quantity;

                                        if(data.kot_return_items.hasOwnProperty(kot_item['item_id'])) {
                                            $.each(data.kot_return_items[kot_item['item_id']], function (r, r_qty) {
                                                content +=  '<button class="btn btn-default kot-return-popover width-full margin-bottom-10" data-content="'+r_qty['return_note']+'"'+
                                                            'data-trigger="hover" data-toggle="popover" data-original-title="Hover to trigger"' +
                                                            'tabindex="0" title="" type="button">'+
                                                                '<ul class="list-group-full custom-return-item-parent ">' +
                                                                    '<li>'+
                                                                        '<span class="font-weight-600 pull-left">'+r_qty['display_number']+'</span>'+
                                                                        '<span>Qty: '+r_qty['quantity']+'</span>'+
                                                                        '<span class="pull-right"><small>'+r_qty['created_on']+'</small></span>'+
                                                                    '</li>'+
                                                                '</ul>'+
                                                            '</button>';

                                                total_returned_quantity += parseInt(r_qty['quantity']);
                                                sub_total_returned_amount   += kot_item.price * parseInt(r_qty['quantity']);
                                            });
                                        }

                        content +=      '</div>'+
                                    '</td>'+ 
                                '</tr>';
                });

                var total_amount            = sub_total_amount;
                var total_returned_amount   = sub_total_returned_amount;

                var discount_percent            = data.order.discount_percent;
                var discount_amount             = 0;
                var discount_returned_amount    = 0;
                if(discount_percent > 0) {
                    discount_amount             = (discount_percent / 100) * total_amount;
                    discount_returned_amount    = (discount_percent / 100) * total_returned_amount;
                }
                total_amount            = total_amount - discount_amount;
                total_returned_amount   = total_returned_amount - discount_returned_amount;

                var service_charge_rate             = data.order.service_charge_rate;
                var service_charge_amount           = (service_charge_rate / 100) * total_amount;
                var service_charge_returned_amount  = (service_charge_rate / 100) * total_returned_amount;
                total_amount            = total_amount + service_charge_amount;
                total_returned_amount   = total_returned_amount + service_charge_returned_amount;

                content +=  '<tr>' +
                                '<td colspan="3"></td>'+
                                '<td><span class="font-weight-600">Ordered ('+currency+')</span></td>'+
                                '<td><span class="font-weight-600">Returned ('+currency+')</span></td>'+
                                '<td><span class="font-weight-600">Actual ('+currency+')</span></td>'+
                            '</tr>'+
                            '<tr>' +
                                '<td colspan="3">Sub Total : </td>'+
                                '<td>'+sub_total_amount+'</td>'+
                                '<td>'+
                                    sub_total_returned_amount+
                                '</td>'+
                                '<td>'+
                                    (sub_total_amount - sub_total_returned_amount)+
                                '</td>'+
                            '</tr>';

                            if(discount_percent > 0) {
                                content +=  '<tr>' +
                                                '<td colspan="3">Discount ('+discount_percent+' %) : </td>'+
                                                '<td>'+discount_amount+'</td>'+
                                                '<td>'+
                                                    discount_returned_amount+
                                                '</td>'+
                                                '<td>'+
                                                    (discount_amount - discount_returned_amount)+
                                                '</td>'+
                                            '</tr>';
                            }

                content +=  '<tr>' +
                                '<td colspan="3">Service Charge ('+service_charge_rate+' %) : </td>'+
                                '<td>'+service_charge_amount+'</td>'+
                                '<td>'+
                                    service_charge_returned_amount+
                                '</td>'+
                                '<td>'+
                                    (service_charge_amount - service_charge_returned_amount)+
                                '</td>'+
                            '</tr>'+
                            '<tr>' +
                                '<td colspan="3">Grand Total : </td>'+
                                '<td>'+total_amount+'</td>'+
                                '<td>'+
                                    total_returned_amount+
                                '</td>'+
                                '<td>'+
                                    (total_amount - total_returned_amount)+
                                '</td>'+
                            '</tr>';

                content += '</tbody>'+
                        '</table>'+
                    '</div>'+
                    '<div class="col-sm-12 col-lg-12 col-md-12 margin-top-30">'+
                        '<div class="row row-lg">'+
                            '<div class="col-md-12">'+
                                '<p>Sales by : <u class="caps">'+data.order.user_name+'</u></p>'+
                            '</div>'+
                        '</div>'+
                    '</div>'+
                '</div>';

                if(invoice_type != 'debtor_invoice') {
                    $('.modal-read-invoice-with-kot-return .invoice-header').html('Report : INV-' + data.order.invoice_no);
                }else{
                    $('.modal-read-invoice-with-kot-return .invoice-header').html('');
                }
                
                $('.modal-read-invoice-with-kot-return .invoice-content').html(content);

                $('.kot-return-popover').webuiPopover({placement:'left'});

                $('.scroll-height-200').slimScroll({
                    start: $('.slimscrollstart-position-200'),
                    height: '100px',
                    color: 'rgb(102, 102, 102)',
                    alwaysVisible: true,
                    size: '8px',
                    touchScrollStep : 200,
                    distance : '0px',
                });

                $('.modal-read-invoice-with-kot-return').modal('show');

            }
            else {
               typeAlertRedirect('Error!', 'Could not fetch data at this time.', 'error', '');
            }
        }
    });
});

$(document).on('click', '.read-delivery-charge-invoice', function (e) {
    e.preventDefault(); 
    var invoice     = $(this).data('invoice');
    $.ajax({
        url: baseUrl + '/reports/delivery-charge-invoice',
        data: {invoice : invoice},
        type: 'POST',
        async: false,
        success: function (response) { 
            var data = $.parseJSON(response);
            if (data != false) { 

                var content = '<div class="row row-lg">'+
                                '<div class="col-sm-12 col-lg-12 col-md-12">'+
                                    '<div class="row row-lg">'+
                                        '<div class="col-lg-6 col-md-6 col-sm-6">'+
                                            '<h4>Invoice No.: '+data.order.invoice_no+'</h4>'+
                                        '</div>'+
                                        '<div class="col-lg-6 col-md-6 col-sm-6">'+
                                            '<p class="pull-right">Date: '+data.order.created_on+'</p>'+
                                        '</div>'+
                                    '</div>'+
                                '</div>'+
                                '<div class="col-sm-12 col-lg-12 col-md-12 margin-top-30">'+
                                    '<div class="row row-lg">'+
                                        '<div class="col-lg-6 col-md-6 col-sm-6">'+
                                           ' <p>Customer Name: <u>'+data.order.customer_name+'</u></p>'+
                                        '</div>'+
                                        '<div class="col-lg-6 col-md-6 col-sm-6">'+
                                            '<p>Customer Pan: <u>'+((data.order.customer_pan == 0) ? 'N/A' : data.order.customer_pan)+'</u></p>'+
                                        '</div>'+
                                    '</div>'+
                                '</div>'+
                                '<div class="col-sm-12 col-lg-12 col-md-12 margin-top-30">'+
                                    '<div class="row row-lg">'+
                                        '<div class="col-lg-12 col-md-12 col-sm-12">'+
                                            '<p>Delivery charge paid for the : <u class="caps">Invoice no.'+data.order.delivery_charge_against_inv+'</u></p>'+
                                        '</div>'+
                                    '</div>'+
                                '</div>'+
                                '<div class="col-sm-12 col-lg-12 col-md-12 margin-top-20">'+
                                    '<div class="row row-lg">'+
                                        '<div class="col-lg-7 col-md-7 col-sm-7 col-lg-offset-5 col-md-offset-5 col-sm-offset-5">'+
                                            '<p class="color-coffee">Total <span class="margin-left-70">:</span> '+currency+numberFormat(data.order.total)+'</p>'+
                                        '</div>'+
                                    '</div>'+
                                '</div>'+
                                '<div class="col-sm-12 col-lg-12 col-md-12 margin-top-30">'+
                                    '<div class="row row-lg">'+
                                        '<div class="col-lg-12 col-md-12 col-sm-12">'+
                                            '<p>Sales by : <u class="caps">'+data.order.user_name+'</u></p>'+
                                        '</div>'+
                                    '</div>'+
                                '</div>'+
                            '</div>';
                
                $('.modal-read-invoice .invoice-header').html('Report : INV-' + data.order.invoice_no);
                $('.modal-read-invoice .invoice-content').html(content);
                $('.modal-read-invoice').modal('show');
            }
            else {
               typeAlertRedirect('Error!', 'Could not fetch data at this time.', 'error', '');
            }
        }
    });
});

$(document).on('click', '.read-break-down-detail', function (e) {
    e.preventDefault(); 
    var invoice = $(this).data('invoice');
    $.ajax({
        url: baseUrl + '/reports/break-down-invoice-detail',
        data: {invoice : invoice},
        type: 'POST',
        async: false,
        success: function (response) { 
            var data = $.parseJSON(response);
            
            if (data != false) { 
                var type = data.type;
                $('.hidden-break-down-id').val(data.break_down.id);
                var content = 
                            '<div class="row row-lg">'+
                                '<div class="col-sm-12 col-lg-12 col-md-12">'+
                                    '<div class="row row-lg">'+
                                        '<div class="col-lg-6 col-md-6 col-sm-6">';
                                            if(data.payment_type == payment_type['cash']) {
                                                content += '<h4>Cash Receipt No : '+data.break_down.invoice_no+'</h4>';
                                            }else {
                                                content += '<h4>'+data.break_down.customer_name+'</h4>';
                                            }
                                            
                            content +=  '</div>'+
                                        '<div class="col-lg-6 col-md-6 col-sm-6">'+
                                            '<p class="pull-right">Date: '+data.break_down.created_on+'</p>'+
                                        '</div>'+
                                    '</div>'+
                                '</div>'+
                                '<div class="col-sm-12 col-lg-12 col-md-12 margin-top-30">'+
                                    '<div class="row row-lg">'+
                                        '<div class="col-lg-6 col-md-6 col-sm-6">'+
                                           ' <p>Customer Name: <u>'+data.break_down.customer_name+'</u></p>'+
                                        '</div>'+
                                        '<div class="col-lg-6 col-md-6 col-sm-6">'+
                                            '<p>Customer Pan: <u>'+((data.break_down.customer_pan == 0 || data.break_down.customer_pan == undefined) ? 'N/A' : data.break_down.customer_pan)+'</u></p>'+
                                        '</div>'+
                                    '</div>'+
                                '</div>'+
                                '<div class="col-sm-12 col-lg-12 col-md-12 margin-top-20">'+
                                    '<table class="table table-hover dataTable table-striped width-full with-export dtr-inline" >'+
                                        '<thead>'+
                                            '<tr>'+
                                                '<th width="27">#</th>'+
                                                '<th width="100">Particular</th>'+
                                                '<th width="50">Quantity</th>'+
                                               ' <th width="50">Price ('+currency+')</th>'+
                                                '<th width="100">Total ('+currency+')</th>'+
                                            '</tr>'+
                                        '</thead>'+
                                        '<tbody>';
                    
                            j=0;
                            for(i=0; i<data.data.length; i++) { 
                                j++;
                                total = parseInt(data.data[i].quantity) * parseFloat(data.data[i].price);
                              
                                content +=  '<tr>'+
                                                '<td>'+j+'</td>';
                                                if(data.data[i].type == item_type['regular']) {
                                                    content +=  '<td>'+data.data[i].menu_item+'</td>';
                                                }else{
                                                    content +=  '<td>Special-Item('+data.data[i].special_item_name+')</td>';
                                                }
                                    
                                    content +=  '<td>'+data.data[i].quantity+'</td>'+
                                                '<td>'+numberFormat(data.data[i].price)+'</td>'+
                                                '<td>'+numberFormat(total)+'</td>'+
                                            '</tr>';
                            }

                            content += '</tbody>'+
                                    '</table>'+
                                '</div>'+
                                '<div class="col-sm-12 col-lg-12 col-md-12 margin-top-20">' +
                                    '<div class="row row-lg">' +
                                        '<div class="col-md-12">' +
                                            '<div class="row row-lg">' +
                                                '<div class="col-lg-7 col-md-7 col-sm-7 col-lg-offset-5 col-md-offset-5 col-sm-offset-5">' +
                                                    '<p>Sub Total : '+currency+numberFormat(data.break_down.sub_total)+'</p>' +
                                                '</div>' +
                                            '</div>' +
                                            /*((data.break_down.service_charge_rate > 0) ? 
                                            ('<div class="row row-lg">' +
                                                '<div class="col-lg-5 col-md-5 col-sm-5">' +
                                                    '<p>Service Charge Rate : ' + data.break_down.service_charge_rate + '%</p>' +
                                                '</div>' +
                                                '<div class="col-lg-7 col-md-7 col-sm-7">' +
                                                    '<p>Service Charge Amount : '+currency+numberFormat(data.break_down.service_charge_amount)+'</p>'+
                                                '</div>' +
                                            '</div>')
                                            : '' ) +
                                            ((data.break_down.discount_rate > 0) ? 
                                            ('<div class="row row-lg">'+
                                                '<div class="col-lg-5 col-md-5 col-sm-5">'+
                                                    '<p>Discount Rate : '+data.break_down.discount_rate+'%</p>'+
                                                '</div>'+
                                                '<div class="col-lg-7 col-md-7 col-sm-7">'+
                                                    '<p>Discount Amount : '+currency+numberFormat(data.break_down.discount_amount)+'</p>'+
                                                '</div>'+
                                            '</div>')
                                            : '' );*/
                                            ((data.break_down.discount_rate > 0) ? 
                                            ('<div class="row row-lg">'+
                                                '<div class="col-lg-5 col-md-5 col-sm-5">'+
                                                    '<p>Discount Rate : '+data.break_down.discount_rate+'%</p>'+
                                                '</div>'+
                                                '<div class="col-lg-7 col-md-7 col-sm-7">'+
                                                    '<p>Discount Amount : '+currency+numberFormat(data.break_down.discount_amount)+'</p>'+
                                                '</div>'+
                                            '</div>')
                                            : '' )+
                                            ((data.break_down.service_charge_rate > 0) ? 
                                            ('<div class="row row-lg">' +
                                                '<div class="col-lg-5 col-md-5 col-sm-5">' +
                                                    '<p>Service Charge Rate : ' + data.break_down.service_charge_rate + '%</p>' +
                                                '</div>' +
                                                '<div class="col-lg-7 col-md-7 col-sm-7">' +
                                                    '<p>Service Charge Amount : '+currency+numberFormat(data.break_down.service_charge_amount)+'</p>'+
                                                '</div>' +
                                            '</div>')
                                            : '' );
                                                 
                                content +=  /*'<div class="row row-lg">' +
                                                '<div class="col-md-7 col-md-offset-5">' +
                                                    '<p>Taxable Amount : '+currency+numberFormat(data.break_down.taxable_amount)+'</p>' +
                                                '</div>' +
                                            '</div>' +
                                            '<div class="row row-lg">' +
                                                '<div class="col-lg-5 col-md-5 col-sm-5">' +
                                                    '<p>Vat Rate : ' + data.break_down.vat_rate + '%</p>' +
                                                '</div>' +
                                                '<div class="col-lg-7 col-md-7 col-sm-7">' +
                                                    '<p>Vat Amount : '+currency+numberFormat(data.break_down.vat_amount)+'</p>'+
                                                '</div>' +
                                            '</div>' +*/
                                            '<div class="row row-lg">'+
                                                '<div class="col-lg-7 col-md-7 col-sm-7 col-lg-offset-5 col-md-offset-5 col-sm-offset-5">'+
                                                    '<p class="color-coffee">Total : '+currency+numberFormat(data.break_down.total)+'</p>'+
                                                '</div>';
                                if(!$('.modal-read-invoice .invoice-content').hasClass('vat')){
                                    content +=  '<div class="col-lg-7 col-md-7 col-sm-7 col-lg-offset-5 col-md-offset-5 col-sm-offset-5">'+
                                                    '<p class="color-coffee">Received Amount : '+currency+numberFormat(data.break_down.received_amount)+'</p>'+
                                                '</div>'+
                                                '<div class="col-lg-7 col-md-7 col-sm-7 col-lg-offset-5 col-md-offset-5 col-sm-offset-5">'+
                                                    '<p class="color-coffee">Change Amount : '+currency+numberFormat(data.break_down.change_amount)+'</p>'+
                                                '</div>';
                                }
                                content +=  '</div>'+
                                        '</div>'+
                                    '</div>'+
                                '</div>'+
                                '<div class="col-sm-12 col-lg-12 col-md-12 margin-top-30">'+
                                    '<div class="row row-lg">'+
                                        '<div class="col-lg-12 col-md-12 col-sm-12">'+
                                            '<p>Sales by : <u class="caps">'+data.break_down.user_name+'</u></p>'+
                                        '</div>'+
                                    '</div>'+
                                '</div>'+
                            '</div>';
                
                if(data.payment_type == payment_type['cash']) {
                    $('.modal-read-break-down-invoice .invoice-header').html('Report : RECEIPT-' + data.break_down.invoice_no);
                }else{
                    $('.modal-read-invoice .invoice-header').html('');
                }
                
                $('.modal-read-break-down-invoice .invoice-content').html(content);
                $('.modal-read-break-down-invoice').modal('show');
                $('.modal-read-invoice').modal('hide');
            }
            else {
               typeAlertRedirect('Error!', 'Could not fetch data at this time.', 'error', '');
            }
        }
    });
});

$(document).on('click', '.view-partial-payment-detail', function (e) {
    e.preventDefault();
    var order_id = $('.hidden-order-id').val();
    $.ajax({
        type : 'POST',
        url  : baseUrl + '/reports/view-partial-payment-detail',
        data : {order_id : order_id},
        async: false,
        success : function (response) {
            var data = $.parseJSON(response);
            if(data != false){
                var payment_detail          = '';
                var cash_partial_detail     = '';
                var credit_partial_detail   = '';
                $.each(data.break_down, function (i,val) {
                    if (val.debtor_name == null) {
                        cash_partial_detail += '<div class="row">'+
                                                    '<div class="padding-top-5">'+
                                                        '<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12"><span class="font-weight-500 span-margin-left-0">';
                                                        if(val.type != break_down_type_advance) {
                                                            cash_partial_detail += 'Cash Receipt No : <a class="btn btn-success btn-xs read-break-down-detail" href="'+baseUrl+'/reports/break-down-invoice-detail/'+val.invoice_no+'" data-invoice="'+val.invoice_no+'" data-invoice-type="break_down">Receipt-'+val.invoice_no+'</a>';
                                                        }else {
                                                            cash_partial_detail += 'Cash Receipt No : Receipt-'+val.invoice_no;
                                                        }
                                                                
                                 cash_partial_detail += '</span></div>'+
                                                    '</div>'+
                                                '</div>' +
                                                '<div class="row">'+
                                                    '<div class="padding-top-5">'+
                                                        '<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">'+
                                                            currency+' ' +numberFormat(val.total) +
                                                        '</div>'+
                                                    '</div>'+
                                                '</div>' +
                                                '<div class="row padding-bottom-10">'+
                                                    '<div class="padding-top-5">'+
                                                        '<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12"><span class="font-weight-500 span-margin-left-0">'+
                                                                'Paid time : ' + val.created_on +
                                                        '</span></div>'+
                                                    '</div>'+
                                                '</div>' +
                                                '<div class="grey-divider span-margin-left-0"></div>';
                    }
                    else if (val.debtor_name != null) {
                        credit_partial_detail += '<div class="row">'+
                                                    '<div class="padding-top-5">'+
                                                        '<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12"><span class="font-weight-500 span-margin-left-0">';
                                                        if(val.type != break_down_type_advance) {
                                                            credit_partial_detail += 'Credit : <a class="btn btn-success btn-xs read-break-down-detail" href="'+baseUrl+'/reports/break-down-invoice-detail/'+val.invoice_no+'" data-invoice="'+val.invoice_no+'" data-invoice-type="break_down">'+val.debtor_name+'</a>';
                                                        }else {
                                                            credit_partial_detail += 'Credit : '+val.debtor_name;
                                                        }
                                                                
                                credit_partial_detail += '</span></div>'+
                                                    '</div>'+
                                                '</div>' +
                                                '<div class="row">'+
                                                    '<div class="padding-top-5">'+
                                                        '<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">'+
                                                            currency+' ' +numberFormat(val.total) +
                                                        '</div>'+
                                                    '</div>'+
                                                '</div>' +
                                                '<div class="row padding-bottom-10">'+
                                                    '<div class="padding-top-5">'+
                                                        '<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12"><span class="font-weight-500 span-margin-left-0">'+
                                                                'Paid time : ' + val.created_on +
                                                        '</span></div>'+
                                                    '</div>'+
                                                '</div>' +
                                                '<div class="grey-divider span-margin-left-0"></div>';
                    }
                });
                payment_detail = cash_partial_detail + credit_partial_detail;
                $('.partial-payment-list').html(payment_detail);
            }
        }
    });
    $('.modal-view-partial-payment-detail').modal('show');
    $('.modal-read-break-down-invoice').modal('hide');
    $('.modal-read-invoice').modal('hide');
});
