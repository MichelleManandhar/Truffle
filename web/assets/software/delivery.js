
$(function () {
    $('.scroll-height-400').slimScroll({
        start: $('.slimscrollstart-position-400'),
        height: '400px',
        alwaysVisible: true
    });
    $('.scroll-height-350').slimScroll({
        start: $('.slimscrollstart-position-350'),
        height: '350px',
        alwaysVisible: true
    });
    $('.scroll-height-450').slimScroll({
        start: $('.slimscrollstart-position-450'),
        height: '450px',
        alwaysVisible: true
    });
    $('.scroll-height-500').slimScroll({
        start: $('.slimscrollstart-position-500'),
        height: '500px',
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

    $('.scroll-height-600').slimScroll({
        start: $('.slimscrollstart-position'),
        height: '705px',
        color: '#fff',
        alwaysVisible: true,
        size: '8px',
        touchScrollStep : 200,
        distance : '0px',
    });
});

$(document).one('submit', '.delivery-form', function (e) {
    e.preventDefault();
    $.ajax({
        type: 'POST',
        url : $('.delivery-form').attr('action'),
        data: $('.delivery-form').serialize(),
        async: false,
        success: function (response) {
            var res = $.parseJSON(response);
            if(res.status == 'logout') {
                window.location.href = baseUrl + '/site/logout';
            }else {
                if(res != false){
                    window.location.href = baseUrl + '/' + delivery_version + '/?did='+res.delivery_id;
                }else {
                    typeAlert('Error!', 'Something went wrong.', 'error'); 
                }
            }
        }
    });

    $('.btn-delivery').prop('disabled', true);
});

$(document).on('click' , '.close-delivery-modal-btn' , function (e) {
    e.preventDefault();
    $('.form-group').each(function () { $(this).removeClass('has-error'); });
    $('.help-block').each(function () { $(this).remove(); });
    $('.delivery-now').find('.delivery-form')[0].reset();
    $('.delivery-now').modal('toggle');
});

$(document).on('click', '.btn-delivery-list', function () {
    $.ajax({
        type : 'POST',
        url  : baseUrl + '/delivery/list',
        async: false,
        success: function (response) {
            var res = $.parseJSON(response);
            if(res != false){
                var delivery_list_content = "";
                var selected_count = 0;
                $.each(res.delivery, function (i,val) {
                    selected_count++;
                    var customer_pan = (val.customer_pan != '0') ? val.customer_pan : "N/A";
                    var customer_address = (val.customer_address != '') ? val.customer_address : "N/A";

                    delivery_list_content += 
                                            '<tr class="delivery" data-delivery_id="'+val.id+'">'+
                                                '<td class="sn">' + selected_count + '</td>'+
                                                '<td>' + val.customer_name + '</td>'+
                                                '<td>' + val.customer_phone + '</td>'+
                                                '<td>' + customer_pan + '</td>'+
                                                '<td>' + customer_address + '</td>'+
                                                '<td>' + val.created_on + '</td>'+
                                                '<td>';
                                                if(val.status == 0) {
                                                    delivery_list_content += '<a href="'+ baseUrl +'/' + delivery_version + '/?did='+val.id+'"><button type="button" class="btn btn-xs btn-info view-delivery">View</button></a>'+
                                                                            '<button type="button" class="btn btn-xs btn-danger cancel-delivery">Cancel Order</button>';
                                                }else {
                                                    delivery_list_content += '<button type="button" class="btn btn-xs btn-info btn-confirm-delivery">Confirm Delivery</button>'+
                                                                            '<button type="button" class="btn btn-xs btn-danger btn-cancel-ordered-delivery">Cancel Delivery</button>';
                                                }
                            

                       delivery_list_content += '</td>'+
                                            '</tr>';
                });
                $('.delivery-list-content').html(delivery_list_content);
                $('.delivery-list').modal('show');
                $('.delivery-tables-data').dataTable();
            }
        }
    });
});

$(document).on('click', '.btn-confirm-delivery', function () {
    var $this = $(this);
    var delivery_id = $this.parents('.delivery').data('delivery_id');
    $.ajax({
        type : 'POST',
        url  : baseUrl + '/delivery/confirm',
        data :{delivery_id : delivery_id},
        async: false,
        success: function (response) {
            var res = $.parseJSON(response);
            if(res != false){
                $this.parents('.delivery').remove();
                rearrangeDeliverySN();
            }else{
                typeAlertRedirect('Error!', 'Could not cancel the order at this time. Please try again.', 'error', '');
            }
        }
    });
});

$(document).on('click', '.btn-cancel-ordered-delivery', function () {
    var $this = $(this);
    var delivery_id = $this.parents('.delivery').data('delivery_id');
    $.ajax({
        type : 'POST',
        url  : baseUrl + '/delivery/cancel-ordered',
        data :{delivery_id : delivery_id},
        async: false,
        success: function (response) {
            var res = $.parseJSON(response);
            if(res != false){
                $this.parents('.delivery').remove();
                rearrangeDeliverySN();
            }else{
                typeAlertRedirect('Error!', 'Could not cancel the order at this time. Please try again.', 'error', '');
            }
        }
    });
});

$(document).on('click', '.cancel-delivery', function () {
    var $this = $(this);
    var delivery_id = $this.parents('.delivery').data('delivery_id');
    bootbox.prompt({
        title: "<h2 class="+'text-center'+">Cancle Order</h2> <p class="+'text-center'+">Please enter your password to proceed ?</p>",
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
                $('.bootbox-prompt').modal('toggle');
                return false;
            }  
            if (result === false) {
                return false;
            }      
            if (result === "") {  
                $('.bootbox-input-password').after("<span class='error'>You need to provide your password to proceed! <i class='icon fa-remove remove-error'></i></span>");
                return false   
            } 
            $.ajax({
                url: baseUrl+'/common/check-cancel-password',
                data: {password: result},
                type: 'POST',
                async: false,
                success: function (response) { 
                    var data = $.parseJSON(response); 
                    if (data != false) {
                        $.ajax({
                            type : 'POST',
                            url  : baseUrl + '/delivery/cancel',
                            data :{delivery_id : delivery_id},
                            async: false,
                            success: function (response) {
                                var res = $.parseJSON(response);
                                if(res != false){
                                    $this.parents('.delivery').remove();
                                    rearrangeDeliverySN();
                                }else{
                                    typeAlertRedirect('Error!', 'Could not cancel the order at this time. Please try again.', 'error', '');
                                }
                            }
                        });
                    }
                    else {
                        typeAlert('Error', 'Sorry, Your Password did not match.', 'error');
                    }
                }
            });  
        }
    });
});

/* for kot item select*/
$(document).on('click', '.select-item', function (e) {
    e.preventDefault();
    var $that = $(this);
    var item  = $that.data('item');
    var delivery_id = $('.hidden-delivery-id').val();
    $.ajax({
        type: 'POST',
        url : baseUrl + '/delivery/temp-order-list',
        data: {item: item, delivery_id: delivery_id},
        async: false,
        success: function (response) {
            var res = $.parseJSON(response);
            if(res != false){
                var selected_count = $('.temp-order-list .listed-item').length;
            
                if ($('.temp-order-list .listed-item').hasClass(item)) {
                    $item = $('.temp-order-list .'+item);
                    var qty = $item.find('.quantity').val();
                    if (qty == '' || qty == null) {
                        qty = 0;
                    }
                    qty++;
                    $item.find('.quantity').val(qty);

                    $bill = $('.bill-kot-list .'+item);
                    $bill.find('.quantity').html(qty);
                }
                else {
                    selected_count++;
                    var name  = $that.data('name');

                    var order_list_content   =  '<tr class="listed-item '+item+'" data-list="order_list" data-item="'+item+'" data-price="'+ res.temp_order_list_price +'" >'+
                                                    '<input type="hidden" name="items['+(selected_count)+'][item]" class="item" value="'+item+'">'+
                                                    '<input type="hidden" name="items['+(selected_count)+'][item_id]" class="item-id" value="'+res.temp_order_list_item_id+'">'+
                                                    '<input type="hidden" name="temp_order_list_id" class="temp-order-list-id" value="'+res.temp_order_list_id+'">'+
                                                    '<input type="hidden" name="items['+(selected_count)+'][price]" class="hidden-price" value="'+res.temp_order_list_price+'" >'+
                                                    '<input type="hidden" name="items['+(selected_count)+'][type]" class="hidden-type" value="'+res.temp_order_list_type+'" >'+

                                                    '<td>'+name+'</td>'+
                                                    '<td>'+
                                                        '<input type="number" class="form-control custom-input quantity" name="items['+(selected_count)+'][quantity]" data-plugin="TouchSpin" data-min="1" data-max="1000" data-stepinterval="50" data-maxboostedstep="10000000" value="1" />'+
                                                    '</td>'+
                                                    '<td class="padding-right-0 padding-left-0"><button class="btn close-btn pull-right remove-item" type="button"><i class="fa fa-close"></i></button></td>'+
                                                '</tr>';

                    $('.temp-order-list').append(order_list_content);

                    $('.temp-order-list').find('.quantity').TouchSpin();

                    var orderbottomCoord = $('.scroll-height-400')[0].scrollHeight;
                    $('.scroll-height-400').slimScroll({scrollTo: orderbottomCoord});
                }

                $order = $('#calculation-container');
                $order.find('.nav-tabs li').removeClass('active');
                $order.find('.nav-tabs').find('a[href="#order-list"]').parents('li').addClass('active');

                $order.find('.tab-content .tab-pane').removeClass('active');
                $order.find('.tab-content').find('#order-list').addClass('active');
            }
        }    
    });
});

$(document).on('click', '.send-selected-special-item-list', function (e) {
    e.preventDefault();
    var delivery_id   = $('.hidden-delivery-id').val();
    var $form       = $('.special-order-list-form');
    $.ajax({
        type: 'POST',
        url : baseUrl + '/delivery/special-temp-order-list',
        data: $form.serialize() + '&delivery_id='+delivery_id,
        async: false,
        success: function (response) {
            var data = $.parseJSON(response);
            if(data != false){
                window.location.reload();
            }
        }    
    });
});

$(document).on('click', '.send-kot', function (e) {
    e.preventDefault();
    var $that = $(this);
    var form = $('.send-kot-form');
    if(form.find('.temp-order-list').html().trim() == ''){
        basicAlert('Cannot send empty KOT.', '', 'info');
        return false;
    }
    /*else {
        //$('.print-loading-modal').modal('show');
    }*/

    $that.button('loading');

    $.ajax({
        type : 'POST',
        url  : baseUrl + '/kot/send',
        data : $(form).serialize(),
        async: true,
        success: function (response) {
            var data = $.parseJSON(response); 
            if (data != false) {
                var kot_id = data.kot_id;
                var file = {};
                var count=0; 
                $.each(data.kot_category, function (key , category) {
                    count++;
                    
                    if (data.kot_category_count == count) {
                        $('.return-kot').show();
                        $('.no-item').hide();

                        $('.temp-order-list .listed-item').remove();
                        var delivery_id = data.delivery_id;
                        var selected_count = 0;
                        
                        if(data.temp_items != null){
                            var order_content = '';
                            var bill_content = '';
                            $('.order-list').html('');
                            $('.bill-order-list').html('');
                            $.each(data.temp_items, function (i,val) {
                                selected_count++;
                                if(val.type == item_type['regular']) {
                                    order_content += '<tr class="listed-item '+val.slug+'" data-list="all_list" data-item="'+val.slug+'" data-price="'+val.price+'" data-item-id="'+val.item_id+'"  data-type="regular" data-discountable="'+val.is_discountable+'">'+
                                                        '<input type="hidden" name="items['+(selected_count)+'][item]" class="item" value="'+val.name+'">'+
                                                        '<input type="hidden" name="items['+(selected_count)+'][item_id]" class="item-id" value="'+val.item_id+'">' +
                                                        '<input type="hidden" name="items['+(selected_count)+'][price]" class="item-price" value="'+val.price+'">' +
                                                        '<input type="hidden" class="total-val" value="'+ val.price*val.quantity + '">'+
                                                        '<input type="hidden" class="temp-item-id" value="'+val.id+'">'+
                                                        '<input type="hidden" name="items['+(selected_count)+'][type]" class="hidden-type" value="'+val.type+'" >' +
                                                        '<input type="hidden" name="items['+(selected_count)+'][discountable]" class="item-discountable" value="'+val.is_discountable+'">' +
                                                        '<td>'+val.name+'</td>'+
                                                        '<td>'+val.price+'</td>'+
                                                        '<td>'+
                                                            '<input type="number" readonly class="form-control custom-input quantity custom-quantity-input" name="items['+(selected_count)+'][quantity]" data-plugin="TouchSpin" data-min="0" data-max="' + val.quantity + '" data-stepinterval="50" data-maxboostedstep="10000000" value="'+ val.quantity +'" />'+
                                                        '</td>'+
                                                        '<td><span class="total">'+val.price*val.quantity+'</span></td>'+
                                                    '</tr>';
                                }
                                else{
                                    order_content += '<tr class="listed-item '+val.special_item_id+'" data-list="all_list" data-item="'+val.special_item_id+'" data-price="'+val.special_item_price+'" data-type="special">'+
                                                    '<input type="hidden" name="items['+(selected_count)+'][item]" class="item" value="'+val.special_item_name+'">'+
                                                    '<input type="hidden" name="items['+(selected_count)+'][item_id]" class="item-id" value="'+val.special_item_id+'">' +
                                                    '<input type="hidden" name="items['+(selected_count)+'][price]" class="item-price" value="'+val.special_item_price+'">' +
                                                    '<input type="hidden" class="total-val" value="'+ val.special_item_price*val.quantity + '">'+
                                                    '<input type="hidden" class="temp-item-id" value="'+val.id+'">'+
                                                    '<input type="hidden" name="items['+(selected_count)+'][type]" class="hidden-type" value="'+val.type+'" >' +
                                                    '<td>Special-Item('+val.special_item_name+')</td>'+
                                                    '<td>'+val.special_item_price+'</td>'+
                                                    '<td>'+
                                                        '<input type="number" readonly class="form-control custom-input quantity custom-quantity-input" name="items['+(selected_count)+'][quantity]" data-plugin="TouchSpin" data-min="0" data-max="' + val.quantity + '" data-stepinterval="50" data-maxboostedstep="10000000" value="'+ val.quantity +'" />'+
                                                    '</td>'+
                                                    '<td><span class="total">'+val.special_item_price*val.quantity+'</span></td>'+
                                                '</tr>';
                                }

                            });

                            $('.order-list').append(order_content);

                            if(!$('.if-foc').hasClass('yes')) {
                                var $order = $('.order-desk');
                                var $list  = $('.order-list').find('.total-val');
                                calculateTotal($order , $list);
                            }

                        }

                        $.ajax({
                            type : 'POST',
                            url  : baseUrl + '/delivery/delete-temp-order-list',
                            data : {delivery_id : delivery_id , kot_id : kot_id},
                            async: false,
                            success: function (response) {
                                var res = $.parseJSON(response);
                                if(res != false){
                                    /*//$('.print-loading-modal').modal('hide');*/
                                    var recent_kot = 
                                                '<h5 class="padding-left-5">'+ 
                                                    '<span class="pull-left">KOT : ' + res.kot['display_number'] + '</span>'+
                                                    '<span class="pull-right font-size-12 small">'+res.kot['created_on']+'</span>'+
                                                '</h5>'+                                            
                                                '<table class="table">'+
                                                   ' <thead class="kot-list-head">'+
                                                        '<tr>'+
                                                            '<th>Name</th>'+
                                                            '<th class="th-qty-width">Quantity</th>'+
                                                        '</tr>'+
                                                    '</thead>'+
                                                    '<tbody class="kot-list-body">';
                                    $.each(res.kot['item'] , function (i,val) {
                                       recent_kot += 
                                                    '<tr>'+
                                                        '<td>' + val.name + '</td>'+
                                                        '<td>' + val.quantity + '</td>'+
                                                    '</tr>';
                                    })
                                    recent_kot += '<tbody>'+
                                                '</table>';

                                    var recent_kot_for_return_modal = 
                                                '<h5 class="padding-left-5">'+ 
                                                    '<span class="pull-left">KOT : ' + res.kot['display_number'] + '</span>'+
                                                    '<span class="pull-right font-size-12 small">'+res.kot['created_on']+'</span>'+
                                                '</h5>'+                                            
                                                '<table class="table">'+
                                                   ' <thead class="kot-list-head">'+
                                                        '<tr>'+
                                                            '<th>Name</th>'+
                                                            '<th class="th-qty-width">Quantity</th>'+
                                                        '</tr>'+
                                                    '</thead>'+
                                                    '<tbody class="kot-list-body">';
                                    $.each(res.kot['item'] , function (i,val) {
                                       recent_kot_for_return_modal += 
                                                        '<tr class="return-kot-item-'+val.kot_item_id+'" data-item="'+val.item_id+'">' +
                                                            '<input type="hidden" name="items['+res.kot['id']+']['+(i+1)+'][kot_item_id]" class="hidden-kot-item-id" value="' + val.kot_item_id + '" >' +
                                                            '<input type="hidden" name="items['+res.kot['id']+']['+(i+1)+'][item]" class="item" value="'+val.item_id+'">' +
                                                            '<input type="hidden" name="items['+res.kot['id']+']['+(i+1)+'][price]" class="item-price" value="'+val.price+'">' +
                                                            '<input type="hidden" name="items['+res.kot['id']+']['+(i+1)+'][type]" class="hidden-item-type" value="' + val.type + '" >' +
                                                            '<td>' + val.name + '</td>' +
                                                            '<td>' +
                                                                '<input type="number" class="form-control custom-input return-quantity" name="items['+res.kot['id']+']['+(i+1)+'][quantity]" data-plugin="TouchSpin" data-min="0" data-max="'+val.quantity+'" data-stepinterval="50" data-maxboostedstep="'+val.quantity+'" value="0" />' +
                                                            '</td>' +
                                                        '</tr>';
                                    });
                                    recent_kot_for_return_modal += '<tbody>'+
                                                '</table>';

                                    $('.all-kot-list').append(recent_kot);
                                    $('.current-kot-list').append(recent_kot_for_return_modal);
                                    $('.return-quantity').TouchSpin();
                                }  
                            }
                        });
                    }
                });
                $that.button('reset');

                $order = $('#calculation-container');
                $order.find('.nav-tabs li').removeClass('active');
                $order.find('.nav-tabs').find('a[href="#all-list"]').parents('li').addClass('active');

                $order.find('.tab-content .tab-pane').removeClass('active');
                $order.find('.tab-content').find('#all-list').addClass('active');
            }
            else {
                $that.button('reset');
                /*//$('.print-loading-modal').modal('hide');*/
                basicAlert('Could not send kot at this time.', '', 'error');
            }        
        }
    });
});

$(document).on('change keyup', '.quantity', function () {
    var $this = $(this);
    if ($this.parents('.order-desk').length) {
        var temp_item   = $this.parents('.listed-item').find('.item').val();  
        var price       = $this.parents('.listed-item').data('price');
        var list_type   = $this.parents('.listed-item').data('list');
        var delivery_id= $('.hidden-delivery-id').val();
        var quantity    = $this.parents('.listed-item').find('.quantity').val();

        if(list_type == 'all_list'){
             $.ajax({
                type: 'POST',
                url : baseUrl + '/delivery/update-temp-order-quantity',
                data: {item : temp_item , price : price , delivery_id : delivery_id , quantity : quantity},
                async:false,
                success: function (response) {
                    var res = $.parseJSON(response);
                    if(res != false){
                        $this.parents('.listed-item').find('.quantity').val(res.quantity);
                        $('.bill-order-list').find('.'+temp_item+' .quantity').val(res.quantity);
                        $('.bill-kot-list').find('.'+temp_item+' .quantity').text(res.quantity);
                    }
                }
             });
        }else if(list_type == 'order_list'){
            var temp_order_list_id = $this.parents('.listed-item').find('.temp-order-list-id').val();
            $.ajax({
                type: 'POST',
                url : baseUrl + '/delivery/update-temp-order-list-quantity',
                data: {quantity : quantity, temp_order_list_id : temp_order_list_id},
                async:false,
                success: function (response) {
                    var res = $.parseJSON(response);
                    if(res != false){
                        $this.parents('.listed-item').find('.quantity').val(res.quantity);
                        $('.bill-kot-list').find('.'+temp_item+' .quantity').val(res.quantity);
                        $('.bill-kot-list').find('.'+temp_item+' .quantity').text(res.quantity);
                    }
                 }
            });
        }
    }
});

$(document).on('click', '.remove-item', function (e) {
    e.preventDefault();
    var $that = $(this);
    var item = $that.parents('.listed-item').data('item');
    var quantity = $that.parents('.listed-item').find('.quantity').val();
    var temp_order_list_id = $that.parents('.listed-item').find('.temp-order-list-id').val();
    if(temp_order_list_id != null){
        $.ajax({
            type: 'POST',
            url : baseUrl + '/delivery/remove-temp-order-list',
            data: {temp_order_list_id : temp_order_list_id , quantity : quantity , item : item},
            async:false,
            success: function (response) {
                var res = $.parseJSON(response);
                if(res != false){
                    $that.parents('.listed-item').remove();
                    if(res.quantity > 0){
                        $that.parents('.listed-item.'+item).find('.quantity').val(res.quantity);
                    }else{
                        $that.parents('.listed-item.'+item).remove();  
                    }
                }
            }
        });
    }

    $('.bill-order-list').find('.'+item).remove();
    var $order = $('.order-desk');
    var $list  = $('.order-list').find('.total-val');
    calculateTotal($order , $list);
    rearrangeSN();
});

$(document).on('click', '.ask-delivery-charge-cash, .ask-delivery-charge-credit', function (e) {
    e.preventDefault();
    var $this = $(this);
    var pay_type = $(this).data('pay-type');

    if ($('.order-desk').find('.customer-address').val() == '') {
        basicAlert('Customer address cannot be empty on delivery order.', '', 'info');
        return false;
    }
    var form = $('.order-desk'); 
    if ($(form).find('.order-list .listed-item').length <= 0) {
        typeAlert('Error!', 'Can not make an empty order.', 'error'); 
        return false;
    }

    if(pay_type == 'credit') {
        if ($this.parents('.print-bill').find('.debtor-txt').val() == '') {
            basicAlert('Debtor need to be selected.', '', 'info');
            return false;
        }
    }
    
    swal({
        title: "Proceed!!!",
        text: "Do you want to apply delivery charge for this order",
        type: "info",
        showCancelButton: true,
        confirmButtonColor: "#DD6B55",
        confirmButtonText: "Yes",
        cancelButtonText: "Continue Bill Print",
        closeOnConfirm: true,
        closeOnCancel: false
    },
    function(isConfirm){
        if (isConfirm) {
            $('.modal-delivery-charge').modal('show');
        } else {
            swal({
                title: "Continue!!!",
                text: "Continue print bill",
                type: "info",
                showCancelButton: true,
                confirmButtonColor: "#DD6B55",
                confirmButtonText: "Print",
                cancelButtonText: "Cancel",
                closeOnConfirm: true,
                closeOnCancel: true
            },
            function(isConfirm){
                if (isConfirm) {
                    if(pay_type == 'cash') {
                        //$('.print-loading-modal').modal('show');
                        makeDeliveryOrder($this);
                    }else if(pay_type == 'credit') {
                        //$('.print-loading-modal').modal('show');
                        makeDeliveryCreditOrder($this);
                    }
                }
            });
        }
    });
});

$(document).on('click', '.make-cash-delivery-order, .make-credit-delivery-order', function (e) {
    $('.modal-delivery-charge').modal('hide');
    calculateDeliveryCharge();
    var $this = $(this);
    var pay_type = $(this).data('pay-type');
    if(pay_type == 'cash') {
        makeDeliveryOrderWithDeliveryCharge($this);
    }else if(pay_type == 'credit') {
        makeDeliveryCreditOrderWithDeliveryCharge($('.ask-delivery-charge-credit'));
    }
});

$(document). on('click', '.make-item-wise-credit', function (e) {
    e.preventDefault();

    if ($('.item-wise-payment-desk').find('.main-total').val() == 0) {
        basicAlert('Cannot pay empty bill.', '', 'info');
        return false;
    }

    if (Math.round($('.remaining-total').val()) == Math.round($('.item-wise-payment-desk').find('.main-total').val())) {
        basicAlert('Cannot make full payment here.', '', 'info');
        return false;
    }

    if ($('.item-wise-payment-desk').find('.debtor-txt').val() == '') {
        basicAlert('Debtor need to be selected.', '', 'info');
        return false;
    }
    $('.item-wise-payment-modal').modal('hide');

    var amount_required = $(this).parents('.item-wise-payment-desk').find('.main-total').val();
    var debtor_name     = $(this).parents('.item-wise-payment-desk').find('.debtor-txt').val();
    var debtor_id       = $(this).parents('.item-wise-payment-desk').find('.hidden-debtor-id').val();
    var form            = $('.item-wise-payment-desk').serialize() + '&debtor_id=' + debtor_id + '&amount_required=' + amount_required + '&type=item_wise_payment';

    $.ajax({
        type : 'POST',
        url  : baseUrl + '/debtor/item-wise-credit',
        data : form,
        async: true,
        success: function (response) {
            var data = $.parseJSON(response);
            if(data != false) {
                if(data.status == 'empty_order') {
                    basicAlert(data.msg , '' , 'info');
                }
                else if(data.status == 'no_debtor') {
                    basicAlert(data.msg , '' , 'info');
                }
                else{
                    typeAlertRedirect('Success!', 'Item wise credit made successfully.', 'success', '');
                }
            }
            else {
               typeAlertRedirect('Error!', 'Could not place the order at this time. Please try again.', 'error', '');
            }
        }
    });
});

$(document).on('blur', '.send-data', function () {
    var delivery_id = $('.hidden-delivery-id').val();
    var $this       = $(this);
    var field       = $this.attr('name');
    var value       = $this.val();
    $.ajax({
        type: 'POST',
        url : baseUrl + '/delivery/update-delivery',
        data: {delivery_id: delivery_id , field : field , value : value},
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
                    $('.customer-name').val(res.customer['name'])
                    swal.close();
                });
            }else{
                console.log('false');

            }
        }
    });
});

$(document).on('change','.delivery-customer-phone',function(){
    var $this       = $(this);
    var value       = $this.val();

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
                    $('.delivery-customer-name').val(res.customer['name'])
                    swal.close();
                });
            }else{
                console.log('false');

            }
        }
    });
})

$(document).on('submit', '.set-delivery-charge-form', function (e) {
    e.preventDefault();
    $.ajax({
        type : 'POST',
        url  : $(this).attr('action'),
        data : $(this).serialize(),
        async: false,
        success: function (response) {
            var res = $.parseJSON(response);
            if(res != false) {
                typeAlertRedirect('Success!!!', 'Delivery charge has been set successfully','success', '');
            }else {
                typeAlertRedirect('Error!!!', 'Something went wrong!!! Cannot set delivery charge','error', '');
            }
        }
    });
});

function rearrangeDeliverySN() {
    $('.delivery').find('.sn').each(function (i, val) {
        $(this).html(i+1);
    });
}

function calculateDeliveryCharge(order_id) {
    /*code for PAN version*/
    var delivery_charge_amount = $('.delivery-charge-amount').val();
    var $delivery_charge_form = $('.delivery-charge-form');
    $delivery_charge_form.find('.actual-delivery-charge-amount').val(delivery_charge_amount);
    /*code for PAN version*/
}

function makeDeliveryOrderWithDeliveryCharge($this) {
    var action_type = $this.data('type');
    var $order = $('.order-desk');
    var $list  = $('.order-list').find('.total-val');
    if(!$('.if-foc').hasClass('yes')) {
        calculateTotal($order , $list , 'discount_amount');
    }

    var change = $('.amount-change').val();
    if (change == null || change == '') {
        change = 0;
    }
    if (change < 0) {
        basicAlert('Received Amount can not be less than the Bill Amount.', '', 'info');
        return false;
    }

    //$('.print-loading-modal').modal('show');
    $('.modal-exchange').modal('hide');
    var $exchange       = $('.modal-exchange');
    var received_amount = $exchange.find('.amount-received').val();
    var change_amount   = $exchange.find('.amount-change').val();
    var tip_amount      = $exchange.find('.amount-tip').val();
    var $delivery_charge_form = $('.delivery-charge-form');
    var delivery_charge_amount      = $delivery_charge_form.find('.actual-delivery-charge-amount').val();
    var form_data       = $order.serialize() + '&change_amount=' + change_amount + '&received_amount=' + received_amount + '&tip_amount=' + tip_amount + '&delivery_charge_amount=' + delivery_charge_amount;

    var form = $('.order-desk');

    if ($(form).find('.order-list .listed-item').length > 0) {     
        /*if(form.valid()) {*/
            $.ajax({
                url  : $(form).attr('action'),
                data : form_data,
                type : 'POST',
                async: true,
                success: function (response) { 
                    var data = $.parseJSON(response);
                    var order_id = data.order_id;
                    $(form).find('.customer-name').val((data.customer_name != '') ? data.customer_name : "Cash Customer");
                    $(form).find('.customer-pan').val((data.customer_pan != '') ? data.customer_pan : "0");
                    $(form).find('.customer-address').val((data.customer_address != '') ? data.customer_address : "N/A");
                    $(form).find('.customer-pax').val((data.customer_pax != null) ? data.customer_pax : "0");
                    if (data != false) {  
                        
                        var next_max_inv = parseInt(data.invoice) + 1;
                        $('.max-inv').val(next_max_inv);
                        $('.max-inv-text').html('Invoice no.: '+next_max_inv);

                        $('.empty-this').val('');
                        $(form).find('.zero-this').val(0);
                        $(form).find('.zero-price').html(currency+' 0');
                        $(form).find('.round-value').html('(0)');
                        $(form).find('.order-list').html('');

                        $('.discount-form .discount').val(0);
                        $('.discount').trigger("touchspin.updatesettings", {max: 0});
                        $('.discount-form .discount-amount').val(0);
                        $('.discount-form').hide();
                        $('.apply-discount').html('<i class="icon fa-ticket"></i>');
                        $('.apply-discount').addClass('not');

                        $('.modal-exchange').modal('hide');
                        
                        $('.all-kot-list').remove();

                        window.location.href = baseUrl + '/table';
                    }
                    else {
                        //$('.print-loading-modal').modal('hide');
                       typeAlertRedirect('Error!', 'Could not place the order at this time. Please try again.', 'error', '');
                    }
                }
            });
        /*}*/ 
    }
    else {
        //$('.print-loading-modal').modal('hide');
        typeAlert('Error!', 'Can not make an empty order.', 'error'); 
        return false;
    } 
}

function makeDeliveryCreditOrderWithDeliveryCharge($this) {
    if ($this.parents('.print-bill').find('.debtor-txt').val() == '') {
        basicAlert('Debtor need to be selected.', '', 'info');
        return false;
    }
    
    //$('.print-loading-modal').modal('show');
    $('.modal-exchange').modal('hide');
    var action_type     = $this.data('type');
    var amount_required = $this.parents('.print-bill').find('.amount-required').val();
    var debtor_name     = $this.parents('.print-bill').find('.debtor-txt').val();
    var debtor_id       = $this.parents('.print-bill').find('.hidden-debtor-id').val();
    var $delivery_charge_form = $('.delivery-charge-form');
    var delivery_charge_amount      = $delivery_charge_form.find('.actual-delivery-charge-amount').val();
    var form_data       = $('.order-desk').serialize() + '&debtor_id=' + debtor_id + '&amount_required=' + amount_required + '&delivery_charge_amount=' + delivery_charge_amount;

    var $form = $('.order-desk');
    if ($form.find('.order-list .listed-item').length > 0) {
        $.ajax({
            type: 'POST',
            data: form_data,
            url: baseUrl + '/debtor/add-credit-amount',
            async: true,
            success: function (response) {
                var data = $.parseJSON(response);
                if(data != false) {

                    if(data.status == 'empty_order') {
                        basicAlert(data.msg , '' , 'info');
                    }
                    else if(data.status == 'no_debtor') {
                        basicAlert(data.msg , '' , 'info');
                    }
                    else{
                        if (data.url == '' , data.key == '' , data.value == '') {
                            typeAlertRedirect('Success!', 'Item wise payment made successfully.', 'success', '');
                        }
                        else {
                            var url = data.url;
                            var key = data.key;
                            var value = data.value;
                            
                            var next_max_inv = parseInt(data.invoice) + 1;
                            $('.max-inv').val(next_max_inv);
                            $('.max-inv-text').html('Invoice no.: '+next_max_inv);

                            $('.empty-this').val('');
                            $form.find('.zero-this').val(0);
                            $form.find('.zero-price').html(currency+' 0');
                            $form.find('.round-value').html('(0)');
                            $form.find('.order-list').html('');

                            $('.discount-form .discount').val(0);
                            $('.discount').trigger("touchspin.updatesettings", {max: 0});
                            $('.discount-form .discount-amount').val(0);
                            $('.discount-form').hide();
                            $('.apply-discount').html('<i class="icon fa-ticket"></i>');
                            $('.apply-discount').addClass('not');

                            $('.modal-exchange').modal('hide');
                            
                            $('.all-kot-list').remove();

                            window.location.href = baseUrl + '/table';

                            //$('.print-loading-modal').modal('hide');         
                        }
                    }
                }else{
                    //$('.print-loading-modal').modal('hide');
                    typeAlert('Error!', 'Something went wron... Cannot make order at this moment', 'warning');
                }

            }
        });
    }
    else {
        //$('.print-loading-modal').modal('hide');
        typeAlert('Error!', 'Can not make an empty order.', 'error'); 
        return false;
    } 
}

function makeDeliveryOrder($this) {
    var action_type = $this.data('type');
    
    var $order = $('.order-desk');
    var $list  = $('.order-list').find('.total-val');
    if(!$('.if-foc').hasClass('yes')) {
        calculateTotal($order , $list , 'discount_amount');
    }

    var change = $('.amount-change').val();
    if (change == null || change == '') {
        change = 0;
    }
    if (change < 0) {
        basicAlert('Received Amount can not be less than the Bill Amount.', '', 'info');
        return false;
    }

    //$('.print-loading-modal').modal('show');
    $('.modal-exchange').modal('hide');
    var $exchange       = $('.modal-exchange');
    var received_amount = $exchange.find('.amount-received').val();
    var change_amount   = $exchange.find('.amount-change').val();
    var tip_amount      = $exchange.find('.amount-tip').val();
    var $delivery_charge_form = $('.delivery-charge-form');
    var delivery_charge_amount      = $delivery_charge_form.find('.actual-delivery-charge-amount').val();
    var form_data       = $order.serialize() + '&change_amount=' + change_amount + '&received_amount=' + received_amount + '&tip_amount=' + tip_amount  + '&delivery_charge_amount=' + delivery_charge_amount;

    var form = $('.order-desk');
    if ($(form).find('.order-list .listed-item').length > 0) {
        /*if(form.valid()) {*/
            $.ajax({
                url  : $(form).attr('action'),
                data : form_data,
                type : 'POST',
                async: true,
                success: function (response) { 
                    var data = $.parseJSON(response);
                    var order_id = data.order_id;
                    $(form).find('.customer-name').val((data.customer_name != '') ? data.customer_name : "Cash Customer");
                    $(form).find('.customer-pan').val((data.customer_pan != '') ? data.customer_pan : "0");
                    $(form).find('.customer-address').val((data.customer_address != '') ? data.customer_address : "N/A");
                    $(form).find('.customer-pax').val((data.customer_pax != null) ? data.customer_pax : "0");
                    if (data != false) {  
                        
                        var next_max_inv = parseInt(data.invoice) + 1;
                        $('.max-inv').val(next_max_inv);
                        $('.max-inv-text').html('Invoice no.: '+next_max_inv);

                        $('.empty-this').val('');
                        $(form).find('.zero-this').val(0);
                        $(form).find('.zero-price').html(currency+' 0');
                        $(form).find('.round-value').html('(0)');
                        $(form).find('.order-list').html('');

                        $('.discount-form .discount').val(0);
                        $('.discount').trigger("touchspin.updatesettings", {max: 0});
                        $('.discount-form .discount-amount').val(0);
                        $('.discount-form').hide();
                        $('.apply-discount').html('<i class="icon fa-ticket"></i>');
                        $('.apply-discount').addClass('not');

                        $('.modal-exchange').modal('hide');
                        
                        $('.all-kot-list').remove();

                        window.location.href = baseUrl + '/table';

                        //$('.print-loading-modal').modal('hide');
                    }
                    else {
                        //$('.print-loading-modal').modal('hide');
                       typeAlertRedirect('Error!', 'Could not place the order at this time. Please try again.', 'error', '');
                    }
                }
            });
        /*}*/ 
    }
    else {
        //$('.print-loading-modal').modal('hide');
        typeAlert('Error!', 'Can not make an empty order.', 'error'); 
        return false;
    }
}

function makeDeliveryCreditOrder($this) {
    if ($this.parents('.print-bill').find('.debtor-txt').val() == '') {
        basicAlert('Debtor need to be selected.', '', 'info');
        return false;
    }

    //$('.print-loading-modal').modal('show');
    $('.modal-exchange').modal('hide');
    var action_type     = $this.data('type');
    var amount_required = $this.parents('.print-bill').find('.amount-required').val();
    var debtor_name     = $this.parents('.print-bill').find('.debtor-txt').val();
    var debtor_id       = $this.parents('.print-bill').find('.hidden-debtor-id').val();
    var $delivery_charge_form       = $('.delivery-charge-form');
    var delivery_charge_amount      = $delivery_charge_form.find('.actual-delivery-charge-amount').val();
    var form_data       = $('.order-desk').serialize() + '&debtor_id=' + debtor_id + '&amount_required=' + amount_required + '&delivery_charge_amount=' + delivery_charge_amount;

    var $form = $('.order-desk');
    if ($form.find('.order-list .listed-item').length > 0) {
        $.ajax({
            type: 'POST',
            data: form_data,
            url: baseUrl + '/debtor/add-credit-amount',
            async: true,
            success: function (response) {
                var data = $.parseJSON(response);
                if(data != false) {

                    if(data.status == 'empty_order') {
                        //$('.print-loading-modal').modal('hide');
                        basicAlert(data.msg , '' , 'info');
                    }
                    else if(data.status == 'no_debtor') {
                        //$('.print-loading-modal').modal('hide');
                        basicAlert(data.msg , '' , 'info');
                    }
                    else{
                        if (data.url == '' , data.key == '' , data.value == '') {
                            typeAlertRedirect('Success!', 'Item wise payment made successfully.', 'success', '');
                        }
                        else {
                            var url = data.url;
                            var key = data.key;
                            var value = data.value;
                            
                            var next_max_inv = parseInt(data.invoice) + 1;
                            $('.max-inv').val(next_max_inv);
                            $('.max-inv-text').html('Invoice no.: '+next_max_inv);

                            $('.empty-this').val('');
                            $form.find('.zero-this').val(0);
                            $form.find('.zero-price').html(currency+' 0');
                            $form.find('.round-value').html('(0)');
                            $form.find('.order-list').html('');

                            $('.discount-form .discount').val(0);
                            $('.discount').trigger("touchspin.updatesettings", {max: 0});
                            $('.discount-form .discount-amount').val(0);
                            $('.discount-form').hide();
                            $('.apply-discount').html('<i class="icon fa-ticket"></i>');
                            $('.apply-discount').addClass('not');

                            $('.modal-exchange').modal('hide');
                            
                            $('.all-kot-list').remove();

                            window.location.href = baseUrl + '/table';

                            //$('.print-loading-modal').modal('hide');        
                        }
                    }
                }else{
                    //$('.print-loading-modal').modal('hide');
                    typeAlert('Error!', 'Something went wron... Cannot make order at this moment', 'warning');
                }

            }
        });
    }
    else {
        //$('.print-loading-modal').modal('hide');
        typeAlert('Error!', 'Can not make an empty order.', 'error'); 
        return false;
    }
}

$(document).on('click', '.submit-return-kot-btn', function(e) {
    e.preventDefault();

    var $btn = $(this);
    $btn.button('loading');

    var $form = $('.kot-return-form');
    $.ajax({
        type : 'POST',
        url  : baseUrl + '/kot/return',
        data : $form.serialize(),
        async: false,
        success: function (response) {
            var data = $.parseJSON(response);
            if (data != false) {
                var kot_id = data.kot_id;
                var file = {};
                var count_main=0; 

                $.each(data.kot_category, function (key , category) {
                    count_main++;
                    var return_kot_content = '';
                    var key = key;

                    $.each(category , function (display_number , list) {
                        return_kot_content +=   '<tr>' +
                                                    '<td style="border-top: 1px dashed #DCDCDC;">' +
                                                        '<h5>' +
                                                            '<span class="pull-left small margin-bottom-5">KOT no: '+display_number+'</span>' +
                                                        '</h5>' +
                                                        '<table cellpadding="0" cellspacing="0" style="width: 100%; line-height: 14px; font-size: 11px !important; font-family: "ms gothic", sans-serif !important; letter-spacing:1px !important; margin-bottom: 10px;">' +
                                                            '<thead>' +
                                                                '<tr>' +
                                                                    '<th>Item Name</th>' +
                                                                    '<th class="th-qty-width">Quantity</th>' +
                                                                '</tr>' +
                                                            '</thead>';

                                $.each(list , function (i , val) {
                                     return_kot_content +=  '<tbody>' +
                                                                '<tr>' +
                                                                    '<td>'+ val.name +'</td>' +
                                                                    '<td>'+ val.quantity +'</td>' +
                                                                '</tr>' +
                                                            '</tbody>';
                                });

                                return_kot_content +=   '</table>' +
                                                    '</td>' +
                                                '</tr>';
                    });
                });

                $('.modal-return-kot').modal('hide');

                typeAlertRedirect('Success', 'Some kot has been send for cancellation', 'success', '');
            }
            $btn.button('reset');
        }
    });
});

function rearrangeSN() {
    $('.bill-order-list').find('.sn').each(function (i, val) {
        $(this).html(i+1);
    });
}