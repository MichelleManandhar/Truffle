$(document).on('click', '.btn-triger-print', function (e) {
    e.preventDefault();
    $('.printing-modal').modal('show');
});

$(document).on('change keydown', '.quantity, .discount', function (e) {
    var $item = $(this).parents('.listed-item');
    
    if ($(this).parents('.order-desk').length) {
        if($('.member-id').val() != '') {
            $('.member-id').val('');
        }
        increment('order-list', $item.data('item'), $item.data('price'));
        var $order = $('.order-desk');
        var $list  = $('.order-list').find('.total-val');
        if(!$('.if-foc').hasClass('yes')) {
            calculateTotal($order , $list , 'discount_percent');
        }
    } 
    else if ($(this).parents('.item-wise-payment-desk').length) {
        increment('item-wise-list', $item.data('item'), $item.data('price'));
        var $order = $('.item-wise-payment-desk');
        var $list  = $('.item-wise-list').find('.total-val');
        $('.amount-received').val('0');
        $('.amount-change').val('0');
        $('.amount-tip').val('0');
        if(!$('.if-foc').hasClass('yes')) {
            calculateTotal($order , $list , 'discount_percent');
        }
    } 
});

$(document).on('blur' , '.discount-amount', function (e) {
    e.preventDefault();
    if ($(this).parents('.order-desk').length) {
        if($('.member-id').val() != '') {
            $('.member-id').val() = '';
        }
        var $order = $('.order-desk');
        var $list  = $('.order-list').find('.total-val');
        if(!$('.if-foc').hasClass('yes')) {
            calculateTotal($order , $list , 'discount_amount');
        }
    } 
    else if ($(this).parents('.item-wise-payment-desk').length) {
        var $order = $('.item-wise-payment-desk');
        var $list  = $('.item-wise-list').find('.total-val');
        $('.amount-received').val('0');
        $('.amount-change').val('0');
        $('.amount-tip').val('0');
        if(!$('.if-foc').hasClass('yes')) {
            calculateTotal($order , $list , 'discount_amount');
        }
    } 
}); 

$(document).on('click', '.apply-discount', function (e) {
    e.preventDefault();
    if ($(this).parents('.order-desk').length) {
        var $that           = $(this).parents('.order-desk').find('.apply-discount');
        var $discount_form  = $(this).parents('.order-desk').find('.discount-form');
        var $discount       = $(this).parents('.order-desk').find('.discount');
    }
    if ($(this).parents('.item-wise-payment-desk').length) {
        var $that           = $(this).parents('.item-wise-payment-desk').find('.apply-discount');
        var $discount_form  = $(this).parents('.item-wise-payment-desk').find('.discount-form');
        var $discount       = $(this).parents('.item-wise-payment-desk').find('.discount');
    } 

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
                            var html =  '<button class="btn btn-number_format btn-warning btn-lg apply-discount-type not margin-right-5" type="button" data-allow="false">' +
                                            '<i class="icon fa-tags font-size-24"></i>' +
                                        '</button>';

                            if($('.apply-discount-type').length == 0) {
                                $('.apply-discount').before(html);
                            }

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
        $('.member-id').val('');
        $('.discount-form').hide();
        $('.discount-form .discount').val(0);
        $('.discount').trigger("touchspin.updatesettings", {max: 0});
        $('.discount-form .discount-amount').val(0);
        $that.html('<i class="icon fa-exchange"></i>');
        $that.addClass('not');
        $('.apply-discount-type').remove();

        if ($(this).parents('.order-desk').length) {
            $order = $('.order-desk');
            $list  = $('.order-list').find('.total-val');
            if(!$('.if-foc').hasClass('yes')) {
                calculateTotal($order , $list , 'discount_amount');
            }
        }
        if ($(this).parents('.item-wise-payment-desk').length) {
            var $order = $('.item-wise-payment-desk');
            var $list  = $('.item-wise-list').find('.total-val');
            if(!$('.if-foc').hasClass('yes')) {
                calculateTotal($order , $list , 'discount_amount');
            }
        } 

        return false; 
    }
});

$(document).on('click', '.apply-discount-type', function (e) {
    $('.modal-choose-discount-type').modal('show');
});

$(document).on('click','.choose-discount-type-btn', function(){
    var $this = $(this);
    if ($this.parents('.modal-choose-discount-type').find('.membership-discount').prop('checked')) {
        $('.modal-membership-discount').find('.membership-number').val('');
        $('.modal-membership-discount').modal('show');
        $this.parents('.modal-choose-discount-type').modal('hide');
    }else if ($this.parents('.modal-choose-discount-type').find('.categorywise-discount').prop('checked')) {
        var data = getOrderedCategories();
        var content = '';
        var total_amount = 0;
        $.each(data.categories , function (i, category) {
            content +=   '<tr class="categorywise-list">' +
                            '<td width="100">' +
                                '<input type="text" class="form-control" name="categorywise_discount_category_name" value="'+category.category_name+'" readonly>' +
                            '</td>' +
                            '<td width="100">';
                                var item_total = 0;
                                var discountable_item_total = 0;
                                $.each(category.item_total , function (j, amount) {
                                    item_total = parseFloat(item_total) + amount;
                                });

                    content +=  '<input type="number" class="form-control categorywise-discount-item-total" name="categorywise_discount_item_total" value="'+item_total+'" readonly>' +
                                '<input type="hidden" class="form-control categorywise-discount-item-discountable-total" name="categorywise_discount_item_discountable_total" value="'+item_total+'" readonly>' +
                            '</td>' +
                            '<td width="10">' +
                                '<input type="number" class="form-control categorywise-discount-rate" name="categorywise_discount_rate" min="0" max="'+data.discount_upto+'" data-plugin="TouchSpin" data-min="0" data-max="'+data.discount_upto+'" data-stepinterval="50" data-maxboostedstep="'+data.discount_upto+'" value="0" data-step="1" />' +
                            '</td>' +
                            '<td width="100">' +
                                '<input type="number" class="form-control categorywise-discount-amount" name="categorywise_discount_amount" value="0" readonly>' +
                            '</td>' +
                        '</tr>';
            total_amount += item_total;
        });

        var special_order_item_total = 0;
        $(".order-list .listed-item").each(function() {
            if($(this).data('type') == 'special') {
                special_order_item_total += parseFloat($(this).find('.total-val').val());
            }
        }); 

        content +=  '<tr class="categorywise-list">' +
                        '<td width="100">' +
                            '<input type="text" class="form-control" name="categorywise_discount_category_name" value="Special Order Item" readonly>' +
                        '</td>' +
                        '<td width="100">'+
                            '<input type="number" class="form-control categorywise-discount-item-total" name="categorywise_discount_item_total" value="'+special_order_item_total+'" readonly>' +
                        '</td>' +
                        '<td width="10">' +
                            '<input type="number" class="form-control categorywise-discount-rate" name="categorywise_discount_rate" min="0" max="'+data.discount_upto+'" data-plugin="TouchSpin" data-min="0" data-max="'+data.discount_upto+'" data-stepinterval="50" data-maxboostedstep="'+data.discount_upto+'" value="0" data-step="1" />' +
                        '</td>' +
                        '<td width="100">' +
                            '<input type="number" class="form-control categorywise-discount-amount" name="categorywise_discount_amount" value="0" readonly>' +
                        '</td>' +
                    '</tr>';

        $('.category-list-to-give-discount').html(content);
        $('.modal-categorywise-discount').find('.categorywise-total-amount').val(total_amount + special_order_item_total);
        $('.modal-categorywise-discount').find('.categorywise-total-discount-rate').val(0);
        $('.modal-categorywise-discount').find('.categorywise-total-discount-amount').val(0);

        $('.categorywise-discount-rate').TouchSpin({
            min: 0,
            max: data.discount_upto,
            mousewheel: true,
            stepinterval: 50,
            maxboostedstep:data.discount_upto
        });

        $('.modal-categorywise-discount').modal('show');
        $this.parents('.modal-choose-discount-type').modal('hide');
    }
});

$(document).on('change keyup', '.categorywise-discount-rate', function () {
    var $parent = $(this).parents('.categorywise-list');
    $parent.find('.categorywise-discount-amount').val((( $parent.find('.categorywise-discount-rate').val() / 100 ) * $parent.find('.categorywise-discount-item-total').val()).toFixed(2) );
    var total_amt = 0;
    var total_discount_amount = 0;
    $('.categorywise-list').each(function () {
        total_amt += parseFloat($(this).find('.categorywise-discount-item-total').val());
        total_discount_amount += parseFloat($(this).find('.categorywise-discount-amount').val());
    });
    $('.modal-categorywise-discount').find('.categorywise-total-discount-rate').val((total_discount_amount * 100 / total_amt).toFixed(2));
    $('.modal-categorywise-discount').find('.categorywise-total-discount-amount').val(total_discount_amount);
});

$(document).on('click', '.btn-confirm-categorywise-discount', function () {
    $('.order-desk').find('.discount-amount').val(parseFloat($('.modal-categorywise-discount').find('.categorywise-total-discount-amount').val()));
    var $order = $('.order-desk');
    var $list  = $('.order-list').find('.total-val');
    calculateTotal($order , $list , 'discount_amount');
    $('.modal-categorywise-discount').modal('hide');
});

function getOrderedCategories()
{
    var items = [];
    var i = 0;
    $(".order-list .listed-item").each(function() {
        if($(this).data('type') == 'regular') {
            items[i] = { id : $(this).find('.item-id').val(), 
                        price : $(this).find('.item-price').val(), 
                        quantity: $(this).find('.quantity').val()
                        };
            i++;
        }
    }); 

    return $.ajax({
        type : 'POST',
        url  : baseUrl + '/order/calculate-categorywise-total',
        data : {items : items},
        async: false,
        dataType: "json",
        success: function(response) {
            return response;
        }
    }).responseJSON;
}

$(document).on('click', '.confirm-membership-discount', function () {
    var membership_number = $('.modal-membership-discount').find('.membership-number').val();
    var item_ids = [];
    var item_quantity = [];
    var i = 0;
    $(".order-list .listed-item").each(function() {
        if($(this).data('type') == 'regular') {
            item_ids[i] = $(this).find('.item-id').val();
            item_quantity[item_ids[i]] = $(this).find('.quantity').val();
            i++;
        }
    });    
    $.ajax({
        type : 'POST',
        url  : baseUrl + '/member/get-member-discount',
        data : {item_ids : item_ids , membership_number : membership_number},
        async: false,
        success: function(response) {
            var res = $.parseJSON(response);
            if(res != false && !("member" in res)) {
                basicAlert('Membership Number is not valid.', '', 'info');
            }else if(res != false && res.member == '') {
                basicAlert('Membership Number is not valid', '', 'info');
            }else if(res != false && res.error == 'not_valid') {
                basicAlert('Membership Number is not valid', '', 'info');
            }else {
                var discount_allowed_percent = 0;
                var amount_to_be_discounted  = 0;
                var total_discounted_amount  = 0;
                var category_wise_discount = 0;
                $.each(res.category_detail , function(i, category) {
                    $.each(item_quantity, function (item_id, quantity) {
                        if(item_id == category.item_id) {
                            discount_allowed_percent = parseInt(category.discount_allowed);
                            amount_to_be_discounted = parseInt(category.price) * quantity;
                            total_discounted_amount += (discount_allowed_percent / 100 )* amount_to_be_discounted;
                        }
                    });
                });
                $('.discount-form').find('.discount-amount').val(total_discounted_amount);
                $('.member-id').val(res.member.id);
                $('.customer-name').val(res.member.name);
            }
            var $order = $('.order-desk');
            var $list  = $('.order-list').find('.total-val');
            calculateTotal($order , $list , 'discount_amount');
            $('.modal-membership-discount').modal('hide');
        }
    });
});
    
$(document).on('click', '.remove-error', function (e) {
    e.preventDefault();
    $(this).parents('.error').remove();
});

$(window).keydown(function(event){
    if( (event.keyCode == 13)) { 
      event.preventDefault();
      return false;
    }
});

$(document).on('submit', '.add-special-order-item', function (e) {
    e.preventDefault();
    $.ajax({
        type  : 'POST',
        url   : $(this).attr('action'),
        data  : $(this).serialize(),
        async : false,
        success : function (response) {
            var data = $.parseJSON(response);
            if(data != false) {
                var content = '';
                var count = $('.show-special-item-list').find('.select-special-item').length;
                content +=  '<tr>' +
                                '<td width="100"><a href="#" class="select-special-item" data-item-id="'+data.special_item.id+'" data-name="'+data.special_item.name+'" data-price="'+data.special_item.price+'">'+data.special_item.name+'</a></td>' +
                                '<td width="100">'+
                                    '<span class="editable-number" data-type="number" ' +
                                        'data-params="{old_value : '+data.special_item.price+'}" ' +
                                        'data-name="price" data-pk="'+data.special_item.id+'" ' +
                                        'data-url="'+baseUrl+'/order/editable-special-item" data-placement="top" data-placeholder="Required" ' +
                                        'data-original-title="Enter Price">' +
                                        +data.special_item.price+
                                    '</span>' +
                                '</td>' +
                                '<td width="100">'+data.special_item.category+'</td>';
                    if(data.special_item.description.length > 200) {
                        content += '<td width="300">'+data.special_item.description.substring(0, 200)+'...</td>';
                    }else {
                        content += '<td width="300">'+data.special_item.description+'</td>';
                    }

                    if(data.special_item.remarks.length > 200) {
                        content += '<td width="100">'+data.special_item.remarks.substring(0, 200)+'...</td>';
                    }else {
                        content += '<td width="100">'+data.special_item.remarks+'</td>';
                    }
                    
                content +=  '</tr>';

                $table =  $('.modal-special-order').find('.special-order-item-table');
                $table.dataTable().fnDestroy();
                $table.find('tbody').append(content);
                $table.dataTable({ "bDestroy": true , "bLengthChange" : false, "pageLength": 5});

                initEditable();

                $('.add-special-order-item')[0].reset();

                $('.modal-special-order').modal('show');
            }
        }
    });
});

$(document).on('click', '.get-special-menu-item', function (e) {
    e.preventDefault();
    $.ajax({
        type  : 'POST',
        url   : baseUrl + '/order/get-special-item',
        async : false,
        success : function (response) {
            var data = $.parseJSON(response);
            if(data != false) {
                var content = '';
                $.each(data.special_items, function (i,val) {
                    if(i < 20) {
                        content +=  '<tr>' +
                                        '<td width="100"><a href="#" class="select-special-item" data-item-id="'+val.id+'" data-name="'+val.name+'" data-price="'+val.price+'">'+val.name+'</a></td>' +
                                        '<td width="100">'+
                                            '<span class="editable-number" data-type="text" ' +
                                                'data-params="{old_value : '+val.price+'}" ' +
                                                'data-name="price" data-pk="'+val.id+'" ' +
                                                'data-url="'+baseUrl+'/order/editable-special-item" data-placement="top" data-placeholder="Required" ' +
                                                'data-original-title="Enter Price">' +
                                                + val.price +
                                            '</span>' +
                                        '</td>' +
                                        '<td width="100">'+val.category+'</td>';
                            if(val.description.length > 200) {
                                content += '<td width="100">'+val.description.substring(0, 200)+'...</td>';
                            }else {
                                content += '<td width="100">'+val.description+'</td>';
                            }

                            if(val.remarks.length > 200) {
                                content += '<td width="100">'+val.remarks.substring(0, 200)+'...</td>';
                            }else {
                                content += '<td width="100">'+val.remarks+'</td>';
                            }
                            
                        content +=  '</tr>';
                    }
                });

                $table =  $('.modal-special-order').find('.special-order-item-table');
                $table.dataTable().fnDestroy();
                $table.find('tbody').html(content);
                $table.dataTable({ "bDestroy": true , 
                                    "bLengthChange" : false, 
                                    "pageLength": 5
                                    });

                $('.modal-special-order').modal('show');
                initEditable();
            }
        }
    });
});

$(document).on('click', '.select-special-item', function (e) {
    e.preventDefault();
    var $this = $(this);
    var status = false;
    var count = 0;
    $('.listed-special-item').each( function () {
        count++;
        if($this.data('item-id') == $(this).data('item-id')) {
            status = true;
            $(this).find('.special-item-quantity').val(parseFloat($(this).find('.special-item-quantity').val()) + 1);
        }
    });
    if(status == false) {
        var content =   '<div class="row margin-bottom-10 listed-special-item" data-item-id="'+$this.data('item-id')+'">'+
                            '<div class="col-md-4 col-sm-4 col-lg-4">' +
                                '<input type="hidden" class="special-item-id" name="item['+count+'][id]" value="'+$this.data('item-id')+'">' +
                                '<input type="hidden" class="special-item-name" name="item['+count+'][name]" value="'+$this.data('name')+'">' +
                                $this.data('name') + 
                            '</div>' +
                            '<div class="col-md-3 col-sm-3 col-lg-3">' +
                                '<input type="number" class="form-control special-item-quantity" name="item['+count+'][quantity]" value="1"/>'+
                            '</div>' +
                            '<div class="col-md-3 col-sm-3 col-lg-3">' +
                                '<input type="number" class="form-control special-item-price" name="item['+count+'][price]" value="'+$this.data('price') + '"/>'+                        
                            '</div>' +
                            '<div class="col-md-2 col-sm-2 col-lg-2">' +
                                '<button class="btn close-btn pull-right remove-special-item" type="button"><i class="fa fa-close"></i></button>' +
                            '</div>' +
                        '</div>';
        $('.selected-special-item-list').append(content);
    }
});

$(document).on('blur change', '.special-item-quantity, .special-item-price', function () {
    if( $(this).val() == '' ) {
        basicAlert('Cannot be empty', '' ,'info');
        $(this).val(1);
        return false;
    }

    if($(this).val() < 0) {
        basicAlert('Please enter positive value', '' ,'info');
        $(this).val(1);
        return false;
    }
});

$(document).on('click', '.remove-special-item', function (e) {
    e.preventDefault();
    $(this).parents('.listed-special-item').remove();  
});

$('.modal-special-order').on('hidden.bs.modal', function () { 
    $('.add-special-order-item')[0].reset();
    $('.form-group').each(function () { $(this).removeClass('has-error'); });
    $('.form-group').each(function () { $(this).removeClass('has-success'); });
    $('.help-block').each(function () { $(this).remove(); });
});

$(document).on('click', '.print-temporary-bill', function (e) {
    e.preventDefault();
    $.ajax({
        type  : 'post',
        url   : baseUrl + '/order/print-temporary-bill',
        data  : $('.order-desk').serialize(),
        async : false,
        success: function (response) {
        }
    });
});

$(document).on('click', '.order-this', function (e) {
    e.preventDefault();
    var temp_order_list = '';
    temp_order_list = $('.temp-order-list').find('.listed-item').length;
    if(temp_order_list > 0){
        basicAlert('Some orders need to be send to KOT.', '', 'info');
        return false;
    }

    $order = $('.order-desk');
    $list  = $('.order-list').find('.total-val');
    if(!$('.if-foc').hasClass('yes')) {
        calculateTotal($order , $list , 'discount_amount');
    }

    if($order.find('.customer-pan').val() != '' && ( $order.find('.customer-pan').val().length > 9 || $order.find('.customer-pan').val().length < 9) ){
        basicAlert('Pan no. is not valid.', '', 'info');
        return false;
    }

    var remaining_total = $('.remaining-total').val();
    
    var inv = $('.max-inv').val();
    var $exchange = $('.modal-exchange');
    $exchange.find('.amount-change').val('');
    $exchange.find('.amount-received').val('');
    $exchange.find('.amount-tip').val('');

    $exchange.find('.inv-required').html('#'+inv);

    if($('.order-desk').find('.total-paid-amount').val() != 0){
        $exchange.find('.bill-amount').val( parseFloat(remaining_total) + parseFloat($('.order-desk').find('.total-paid-amount').val()));
        $exchange.find('.already-received-amount').val(Math.round($('.order-desk').find('.total-paid-amount').val()));
        $exchange.find('.amount-required').val(Math.round((remaining_total > 0) ? remaining_total : 0));
        $exchange.find('.amount-change').val(Math.round((remaining_total < 0) ? Math.abs(remaining_total) : 0));
        $exchange.find('.required-amount').show();
    }else{
        $exchange.find('.bill-amount').val($('.order-desk').find('.main-total').val());
        $exchange.find('.already-received-amount').val(0);
        $exchange.find('.amount-required').val(Math.round($('.order-desk').find('.main-total').val()));
    }
    
    $exchange.modal('show');
});

$(document).on('click', '.make-order', function (e) {
    e.preventDefault();
    var $this = $(this);
    var $order = $('.order-desk');
    var new_customer_pax = 0;
    if($order.find('.customer-pax').length > 0 && $order.find('.customer-pax').val() == '') {
        var $exchange = $('.modal-exchange');
        $exchange.modal('hide');

        bootbox.prompt({
            title: "<h2 class="+'text-center'+">Pax cannot be empty</h2> <p class="+'text-center'+">Please enter pax here</p>",
            inputType: 'number',
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
                $('.bootbox-input-number').parents('.bootbox-form').find('.error').remove();
                if (result === null) {
                    $('div').remove('.custom-bootbox-overlay');
                    $('.bootbox-prompt').modal('hide');
                    return false;
                }  
                if (result === false) {
                    return false;
                }      
                if (result === "") {  
                    $('.bootbox-input-number').after("<span class='error'>You need to enter pax to proceed! <i class='icon fa-remove remove-error'></i></span>");
                    return false   
                } 

                if($('.member-id').val() != '') {
                    $.ajax({
                        type: 'POST',
                        url : baseUrl+'/member/set-threshold-exceeded',
                        data: {member:$('.member-id').val(), current_paid_amount : $('.main-total').val()},
                        async:false,
                        success:function (response) {
                            var data = $.parseJSON(response);
                            if(data) {
                                if(data.threshold_end_amount_exceeded > 0) {
                                    toastr.info("Threshold End Amount has been exceeded", 'Alert! ');
                                }
                                else if(data.threshold_amount_exceeded > 0) {
                                    toastr.info("Threshold Amount has been exceeded", 'Alert! ');
                                }
                            }
                        }
                    });

                    setTimeout(function(){ 
                        new_customer_pax = result;
                        //$('.print-loading-modal').modal('show');
                        makeOrder($this, new_customer_pax);
                    }, 3000);
                }
                else {
                    new_customer_pax = result;
                    //$('.print-loading-modal').modal('show');
                    makeOrder($this, new_customer_pax);
                }
            }
        });

        $('.bootbox-input-number').attr('placeholder', 'Please enter pax');
        $('.bootbox').before('<div class="custom-bootbox-overlay"></div>');
        $this.button('reset');
    }else{
        if($('.member-id').val() != '') {
            $.ajax({
                type: 'POST',
                url : baseUrl+'/member/set-threshold-exceeded',
                data: {member:$('.member-id').val(), current_paid_amount : $('.main-total').val()},
                async:false,
                success:function (response) {
                    var data = $.parseJSON(response);
                    if(data) {
                        if(data.threshold_end_amount_exceeded > 0) {
                            toastr.info("Threshold End Amount has been exceeded", 'Alert! ');
                        }
                        else if(data.threshold_amount_exceeded > 0) {
                            toastr.info("Threshold Amount has been exceeded", 'Alert! ');
                        }
                    }
                }
            });

            setTimeout(function(){ 
                var $exchange = $('.modal-exchange');
                $exchange.modal('hide');
                //$('.print-loading-modal').modal('show');
                makeOrder($this, new_customer_pax);
            }, 3000);
        }
        else {
            var $exchange = $('.modal-exchange');
            $exchange.modal('hide');
            //$('.print-loading-modal').modal('show');
            makeOrder($this, new_customer_pax);
        }
    }
});

function makeOrder($this, new_customer_pax) {
    var action_type = $this.data('type');
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

    $('.modal-exchange').modal('hide');
    //$('.print-loading-modal').modal('show');
    
    var $exchange       = $('.modal-exchange');
    var received_amount = $exchange.find('.amount-received').val();
    var change_amount   = $exchange.find('.amount-change').val();
    var tip_amount      = $exchange.find('.amount-tip').val();

    var form = $('.order-desk'); 
    var form_data       = form.serialize() + '&change_amount=' + change_amount + '&received_amount=' + received_amount + '&tip_amount=' + tip_amount+ '&new_customer_pax=' + new_customer_pax;
    
    if ($(form).find('.order-list .listed-item').length > 0) {          
        /*if(form.valid()) {*/
            $.ajax({
                url  : $(form).attr('action'),
                data : form_data,
                type : 'POST',
                async: false,
                success: function (response) { 
                    var data = $.parseJSON(response);
                    var order_id = data.order_id;
                    var order_type = data.order_type;
                    $(form).find('.customer-name').val((data.customer_name != '') ? data.customer_name : "Cash Customer");
                    $(form).find('.customer-pan').val((data.customer_pan != '') ? data.customer_pan : "0");
                    $(form).find('.customer-address').val((data.customer_address != '') ? data.customer_address : "N/A");
                    $(form).find('.customer-pax').val((data.customer_pax != null) ? data.customer_pax : "0");
                    if (data != false) { 
                        selected_count=0;
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

                        if(action_type == 'print_and_close'){
                            var id = $('.hidden-occupy-id').val();
                            var table = $('.hidden-table-id').val();

                            $.ajax({
                                url: baseUrl + '/table/close-table',
                                type: 'POST',
                                data: {id: id, table: table},
                                async: false,
                                success: function (response) {
                                    var data = $.parseJSON(response);
                                    $('.modal').modal('hide');
                                    if (data == true) {
                                        window.location.href = baseUrl + '/table';
                                    }
                                    else if (data.error != null) {
                                        $('div').remove('.custom-bootbox-overlay');
                                        $('.bootbox-prompt').modal('hide');
                                        //$('.print-loading-modal').modal('hide');
                                        typeAlert('Error!', data.error, 'warning'); return false;
                                    }
                                    else {
                                        $('div').remove('.custom-bootbox-overlay');
                                        $('.bootbox-prompt').modal('hide');
                                        //$('.print-loading-modal').modal('hide');
                                        typeAlert('Error!', 'Could not close the table at this moment. Please try again later.', 'warning'); return false;
                                    }
                                }
                            });
                        }else{
                            //$('.print-loading-modal').modal('hide');
                            if(order_type == 'occupy') {
                                typeAlertRedirect('Success', 'Full payment made', 'success', '');
                            }else if(order_type == 'take_away' || order_type == 'retail' || order_type == 'pick_up' || order_type == 'delivery') {
                                typeAlertRedirect('Success', 'Full payment made', 'success', baseUrl+'/table');
                            }
                        }
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
        $('div').remove('.custom-bootbox-overlay');
        $('.bootbox-prompt').modal('hide');
        //$('.print-loading-modal').modal('hide');
        typeAlert('Error!', 'Can not make an empty order.', 'error'); 
        return false;
    }
}

$(document).on('change keyup', '.amount-received', function () {
    var required = 0;
    var $this = $(this);
    if ($this.parents('.print-bill').length) {
        if($('.print-bill').find('.amount-required').val() != 0) {
            $this.parents('.print-bill').find('.amount-tip').val(0);
            $this.parents('.print-bill').find('.hidden-tip-amount').val(0);
            required = $this.parents('.print-bill').find('.amount-required').val();
        }else{
            $this.val('');
        }
    }
    if ($this.parents('.item-wise-payment-desk').length) {
        $this.parents('.item-wise-payment-desk').find('.amount-tip').val(0);
        $this.parents('.item-wise-payment-desk').find('.hidden-tip-amount').val(0);
        required = $this.parents('.item-wise-payment-desk').find('.main-total').val();
    } 
    if ($this.parents('.advance-payment').length) {
        required = $this.parents('.advance-payment').find('.advance-paid').val();
    } 
    
    if(required != 0) {
        var received = $this.val();
        var change   = Math.round(received-required);
        $('.amount-change').val(change);
        $('.hidden-received-amount').val(received);
        $('.hidden-change-amount').val(change);
    }
});

$(document).on('click', '.cash-payment', function () {
    $('.received-amount').show();
    $('.change-amount').show();
    $('.tip-amount').show();
    $('.debtor-name').hide();
    $('.make-order').show();
    $('.credit-order').hide();
    $('.hidden-payment-type').val($(this).val());
    $('.item-wise-cash-btn').show();
    $('.item-wise-credit-btn').hide();
    $('.item-wise-payment').show();
    $('.non-debtor-name').show();
    $('.pay-advance').show();
    $('.advance-payment-btn').show();
    $('.ask-delivery-charge-cash').show();
    $('.ask-delivery-charge-credit').hide();
    $('.make-credit-delivery-order').hide();
    $('.make-cash-delivery-order').show();
});

$(document).on('click', '.card-payment', function () {
    $('.received-amount').hide();
    $('.change-amount').hide();
    $('.tip-amount').hide();
    $('.debtor-name').hide();
    $('.make-order').show();
    $('.credit-order').hide();
    $('.hidden-payment-type').val($(this).val());
    $('.item-wise-payment').hide();
    $('.non-debtor-name').show();
    $('.pay-advance').hide();
    $('.advance-payment-btn').hide();
    $('.ask-delivery-charge-cash').show();
    $('.ask-delivery-charge-credit').hide();
    $('.make-credit-delivery-order').hide();
    $('.make-cash-delivery-order').show();
});

$(document).on('click', '.credit-payment', function (e) {
    $('.received-amount').hide();
    $('.change-amount').hide();
    $('.tip-amount').hide();
    $('.debtor-name').show();
    $('.make-order').hide();
    $('.credit-order').show();
    $('.hidden-payment-type').val('1');
    $('.item-wise-credit-btn').show();
    $('.item-wise-cash-btn').hide();
    $('.item-wise-payment').show();
    $('.non-debtor-name').hide();
    $('.pay-advance').hide();
    $('.advance-payment-btn').hide();
    $('.ask-delivery-charge-credit').show();
    $('.ask-delivery-charge-cash').hide();
    $('.make-credit-delivery-order').show();
    $('.make-cash-delivery-order').hide();
});

$(document).on('click' , '.close-debtor-list-modal-btn' , function (e) {
    e.preventDefault();
    $('.close-debtor-list-modal-btn').parents('.modal-debtors-list').find('.add-debtor, .form-group').each(function () { $('.form-group').removeClass('has-error'); });
    $('.close-debtor-list-modal-btn').parents('.modal-debtors-list').find('.add-debtor, .help-block').each(function () { $('.help-block').remove(); });
    $('.modal-debtors-list').find('.add-debtor')[0].reset();
    $('.modal-debtors-list').modal('toggle');
});

$(document).on('click', '.advance-payment-btn', function (e) {
    $('.advance-payment-modal').modal('show');
    $('.modal-aside').find('.total-amount-grand').val(parseFloat($('.main-total').val()).toFixed(2));
});

$(document).on('keyup change', '.advance-paid', function (e) {
    e.preventDefault();
    $(this).parents('.advance-payment').find('.amount-received').val(0);
    $(this).parents('.advance-payment').find('.amount-change').val(0);
});

$(document).on('submit', '.advance-payment', function (e) {
    e.preventDefault();
    $('.pay-advance').prop('disabled', true);

    //$('.print-loading-modal').modal('show');
    $('.advance-payment-modal').modal('hide');
    $form = $(this);
    $.ajax({
        type : "POST",
        url  : $form.attr('action'),
        data : $form.serialize(),
        async: true,
        success: function (response) {
            var data = $.parseJSON(response);
            if(data != false){
                //$('.print-loading-modal').modal('hide');
                typeAlertRedirect('Success!', 'Advance Payment has been made for this order', 'success', '');
            }
            else{
                //$('.print-loading-modal').modal('hide');
                typeAlert('Error!', 'Something went wrong', 'warning');
            }
        }
    });
});

$('.advance-payment-modal').on('hidden.bs.modal', function () { 
    $('.advance-payment')[0].reset();
    $('.form-group').each(function () { $(this).removeClass('has-error'); });
    $('.form-group').each(function () { $(this).removeClass('has-success'); });
    $('.help-block').each(function () { $(this).remove(); });
});

$(document).on('click', '.item-wise-payment', function (e) {
    e.preventDefault();
    var occupy_id    = $('.hidden-occupy-id').val();
    var retail_id = $('.hidden-retail-id').val();
    var take_away_id = $('.hidden-take-away-id').val();
    var pick_up_id   = $('.hidden-pick-up-id').val();
    var delivery_id  = $('.hidden-delivery-id').val();
    $.ajax({
        type : "POST",
        url  : baseUrl + '/order/get-order-item',
        data : {occupy_id : occupy_id , take_away_id : take_away_id, retail_id : retail_id, pick_up_id : pick_up_id , delivery_id : delivery_id},
        async: false,
        success: function (response) {
            var data = $.parseJSON(response);
            if(data != false){
                var selected_count = 0;
                if(data.items != null){
                    var order_content = '';
                    $('.item-wise-list').html('');

                    $.each(data.items, function (i , val) {
                        var quantity = -1;

                        if(val.type == item_type['regular']) {
                            if(data.quantity[item_type['regular']] != undefined) {
                                $.each(data.quantity[item_type['regular']] , function (j , qty) {
                                    if(val.item_id == j){
                                        quantity = qty;
                                    }
                                });
                            }
                        }else{
                            if(data.quantity[item_type['special']] != undefined) {
                                $.each(data.quantity[item_type['special']] , function (j , qty) {
                                    if(val.item_id == j){
                                        quantity = qty;
                                    }
                                }); 
                            }
                        }
                        
                        var q = 0;
                        if(quantity == -1){
                            q = val.quantity;
                        }
                        else if(quantity == 0) {
                            q = 0;
                        }
                        else if(quantity > 0) {
                            q = quantity;
                        }
                        if(q != 0) {
                            selected_count++;
                            if(val.type == item_type['regular']) {
                                order_content += '<tr class="listed-item '+val.slug+'" data-list="all_list" data-item="'+val.slug+'" data-price="'+val.price+'" data-discountable="'+val.is_discountable+'">'+
                                                '<input type="hidden" name="items['+(selected_count)+'][item]" class="item" value="'+val.slug+'">'+
                                                '<input type="hidden" name="items['+(selected_count)+'][item_id]" class="item-id" value="'+val.item_id+'">' +
                                                '<input type="hidden" name="items['+(selected_count)+'][price]" class="item-price" value="'+val.price+'">' +
                                                '<input type="hidden" class="total-val" value="'+ val.price*q + '">'+
                                                '<input type="hidden" class="temp-item-id" value="'+val.id+'">'+
                                                '<input type="hidden" name="items['+(selected_count)+'][type]" class="hidden-type" value="'+val.type+'" >' +
                                                '<td>'+val.name+'</td>'+
                                                '<td>'+val.price+'</td>'+
                                                '<td>'+
                                                    '<input type="number" readonly class="form-control custom-input quantity custom-quantity-input" name="items['+(selected_count)+'][quantity]" data-plugin="TouchSpin" data-min="0" data-max="' + q + '" data-stepinterval="50" data-maxboostedstep="10000000" value="'+ q +'" />'+
                                                '</td>'+
                                                '<td><span class="total">'+val.price*q+'</span></td>'+
                                            '</tr>';
                            }
                            else{
                                order_content += '<tr class="listed-item '+val.special_item_id+'" data-list="all_list" data-item="'+val.special_item_id+'" data-price="'+val.special_item_price+'">'+
                                                '<input type="hidden" name="items['+(selected_count)+'][item]" class="item" value="'+val.special_item_id+'">'+
                                                '<input type="hidden" name="items['+(selected_count)+'][item_id]" class="item-id" value="'+val.special_item_id+'">' +
                                                '<input type="hidden" name="items['+(selected_count)+'][price]" class="item-price" value="'+val.special_item_price+'">' +
                                                '<input type="hidden" class="total-val" value="'+ val.special_item_price*q + '">'+
                                                '<input type="hidden" class="temp-item-id" value="'+val.id+'">'+
                                                '<input type="hidden" name="items['+(selected_count)+'][type]" class="hidden-type" value="'+val.type+'" >' +
                                                '<td>Special-Item('+val.special_item_name+')</td>'+
                                                '<td>'+val.special_item_price+'</td>'+
                                                '<td>'+
                                                    '<input type="number" readonly class="form-control custom-input quantity custom-quantity-input" name="items['+(selected_count)+'][quantity]" data-plugin="TouchSpin" data-min="0" data-max="' + q + '" data-stepinterval="50" data-maxboostedstep="10000000" value="'+ q +'" />'+
                                                '</td>'+
                                                '<td><span class="total">'+val.special_item_price*q+'</span></td>'+
                                            '</tr>';
                            } 
                        }
                    });

                    $('.item-wise-list').append(order_content);
                    $('.item-wise-payment-modal').find('.quantity').TouchSpin();

                    var $order = $('.item-wise-payment-desk');
                    var $list  = $('.item-wise-list').find('.total-val');
                    if(!$('.if-foc').hasClass('yes')) {
                        calculateTotal($order , $list , 'discount_amount');
                    }

                    $('.item-wise-payment-desk')[0].reset();
                    $('.item-wise-payment-modal').modal('show');
                }
            }
            else{
                basicAlert('No order has been made yet!', '', 'info');
            }
        }
    });
});

$(document). on('click', '.make-item-wise-payment', function (e) {
    e.preventDefault();
    $('.make-item-wise-payment').prop('disabled', true);
    
    var $order = $('.item-wise-payment-desk');
    var $list  = $('.item-wise-list').find('.total-val');
    if(!$('.if-foc').hasClass('yes')) {
        calculateTotal($order , $list , 'discount_amount');
    }

    if ($order.find('.main-total').val() == 0) {
        basicAlert('Cannot pay empty bill.', '', 'info');
        return false;
    }

    if (Math.round($('.remaining-total').val()) == Math.round($order.find('.main-total').val())) {
        basicAlert('Cannot make full payment here.', '', 'info');
        return false;
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
    $('.item-wise-payment-modal').modal('hide');

    var $form = $('.item-wise-payment-desk');

    if ($($form).find('.item-wise-list .listed-item').length > 0) {
        /*if($form.valid()) {*/
            $.ajax({
                type : 'POST',
                url  : $form.attr('action'),
                data : $form.serialize(),
                async: true,
                success: function (response) {
                    var data = $.parseJSON(response);
                    if(data != false) {
                        //$('.print-loading-modal').modal('hide');
                        typeAlertRedirect('Success!', 'Item wise payment made successfully.', 'success', '');
                    }
                    else {
                        //$('.print-loading-modal').modal('hide');
                       typeAlertRedirect('Error!', 'Could not place the order at this time. Please try again.', 'error', '');
                    }
                }
            });
        /*}*/
    }
});

$(document).on('click', '.view-partial-payment-detail', function (e) {
    e.preventDefault();
    var occupy_id    = $('.hidden-occupy-id').val();
    var retail_id   = $('.hidden-retail-id').val();
    var take_away_id = $('.hidden-take-away-id').val();
    var pick_up_id  = $('.hidden-pick-up-id').val();
    var delivery_id = $('.hidden-delivery-id').val();
    $.ajax({
        type : 'POST',
        url  : baseUrl + '/order/view-partial-payment-detail',
        data : {occupy_id : occupy_id , take_away_id : take_away_id , retail_id : retail_id , pick_up_id : pick_up_id , delivery_id : delivery_id},
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
                                                        '<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12"><span class="font-weight-500 span-margin-left-0">'+
                                                                'Cash Receipt No : ' + val.invoice_no +
                                                        '</span></div>'+
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
                                                        '<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12"><span class="font-weight-500 span-margin-left-0">'+
                                                                'Credit : ' + val.debtor_name +
                                                        '</span></div>'+
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
});

$(document).on('click', '.remove-item-wise-payment-modal', function (e) {
    e.preventDefault();
    $('.item-wise-payment-modal').modal('hide');
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

    if($this.parents('.item-wise-payment-desk').length) {
        var $item_wise_desk     = $('.item-wise-payment-desk');
        var prev_amount_change  = $item_wise_desk.find('.amount-received').val() - $item_wise_desk.find('.main-total').val();
        var new_amount_change   = prev_amount_change - tip;
        $item_wise_desk.find('.amount-change').val((new_amount_change > 0) ? new_amount_change : 0);
        $item_wise_desk.find('.hidden-tip-amount').val(tip);
    }
    else if ($this.parents('.print-bill').length) {
        var $print_bill = $('.print-bill');

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
    }
});

$(document).on('click', '.create-foc', function (e) {
    e.preventDefault();
    swal({
        title: 'Create FOC',
        text: 'Please enter your password to proceed ?',
        inputPlaceholder : 'Please enter your password',
        type: "input",
        inputType : 'password',
        showCancelButton: true,
        confirmButtonColor: "rgb(98,168,234)",
        confirmButtonText: 'Yes, Proceed.',
        closeOnConfirm: false
    }, 
    function(inputValue){   
        if (inputValue === false) return false;      
        if (inputValue === "") {     
            swal.showInputError("You need to provide your password to proceed!");     
            return false   
        } 
        $.ajax({
            url: baseUrl+'/order/check-foc-password',
            data: {password : inputValue},
            type: 'POST',
            async: false,
            success: function (response) { 
                var data = $.parseJSON(response); 
                if (data != false) {
                    swal.close();

                    var occupy_id = $('.hidden-occupy-id').val();
                    $.ajax({
                        type : 'POST',
                        url  : baseUrl + '/order/create-foc',
                        data : {occupy_id : occupy_id},
                        async: false,
                        success: function (response) {
                            var res = $.parseJSON(response);
                            if(res != false) {
                                $('.if-foc').addClass('yes');
                                $('.if-foc').hide(); 
                                $('.foc-cancel').show();
                                $('.foc-create').hide();
                                $('.show-foc-button').show();
                                var $change_scroll = $('#all-list').find('.change-scroll-height');
                                $change_scroll.removeClass('scroll-height-200');
                                $change_scroll.removeClass('slimscrollstart-position-200');
                                $change_scroll.addClass('scroll-height-400');
                                $change_scroll.addClass('slimscrollstart-position-400');

                                setTimeout(function(){ 
                                    $('.scroll-height-400').slimScroll({
                                        start: $('.slimscrollstart-position'),
                                        height: '400px',
                                        alwaysVisible: true
                                    });
                                }, 500);

                                typeAlert('Success!', 'FOC has been created for this occupancy', 'success');
                            }else{
                                typeAlert('Error!', 'Cannot create FOC for this occupancy! Since partial payment has been made for this', 'warning');
                            }
                        }
                    });
                    return false;
                }
                else {
                    swal.showInputError("Incorrect Password"); 
                    return false;  
                }
            }
        });           
    });
});

$(document).on('click', '.cancel-foc', function (e) {
    e.preventDefault();
    var occupy_id = $('.hidden-occupy-id').val();
    $.ajax({
        type : 'POST',
        url  : baseUrl + '/order/cancel-foc',
        data : {occupy_id : occupy_id},
        async: false,
        success: function (response) {
            var res = $.parseJSON(response);
            if(res != false) {
                $('.if-foc').removeClass('yes');
                $('.if-foc').show(); 
                $('.foc-create').show();
                $('.foc-cancel').hide();
                $('.show-foc-button').hide();
                var $change_scroll = $('#all-list').find('.change-scroll-height');
                $change_scroll.removeClass('scroll-height-400');
                $change_scroll.removeClass('slimscrollstart-position-400');
                $change_scroll.addClass('scroll-height-200');
                $change_scroll.addClass('slimscrollstart-position-200');

                setTimeout(function(){ 
                    $('.scroll-height-200').slimScroll({
                        start: $('.slimscrollstart-position'),
                        height: '200px',
                        alwaysVisible: true
                    });
                }, 500);

                typeAlert('Success!', 'FOC has been cancelled', 'success');
            }else{
                typeAlert('Error!', 'Cannot cancel FOC for this occupancy', 'warning');
            }
        }
    });
});

$(document).on('click', '.save-foc', function (e) {
    e.preventDefault();
    $.ajax({
        type : 'POST',
        url  : baseUrl + '/order/save-foc',
        data : $('.order-desk').serialize(),
        async: false,
        success: function (response) {
            var data = $.parseJSON(response);
            if(data != false) {
                typeAlertRedirect('Success!', 'FOC has been saved for this occupancy', 'success', '');
            }
        }
    });
});

$(document).on('click', '.split-bill', function (e) {
    e.preventDefault();
    var form            = $('.order-desk');

    if($('.order-desk').find('.break-down-paid-amount .total-paid-amount').val() > 0){
        basicAlert('Cannot split bill when partial payment has been made', '', 'info');
        return false;
    }

    if(form.find('.customer-pax').length > 0 && form.find('.customer-pax').val() == '') {
        form.find('.customer-pax').focus();
        basicAlert('Pax cannot be empty... Please enter pax', '', 'info');
        return false;
    }

    var occupy_id       = form.find('.hidden-occupy-id').val();
    var retail_id       = form.find('.hidden-retail-id').val();
    var take_away_id    = form.find('.hidden-take-away-id').val();
    var pick_up_id      = form.find('.hidden-pick-up-id').val();
    var delivery_id     = form.find('.hidden-delivery-id').val();
    
    if ($(form).find('.order-list .listed-item').length > 0) {
        if(occupy_id != '') {
            window.location.href = baseUrl +'/order/split-bill/?occid='+occupy_id;
        }
        else if(retail_id != ''){
            window.location.href = baseUrl +'/retail/split-bill/?rid='+retail_id;
        } 
        else if(take_away_id != ''){
            window.location.href = baseUrl +'/take-away/split-bill/?tid='+take_away_id;
        } 
        else if(pick_up_id != ''){
            window.location.href = baseUrl +'/pick-up/split-bill/?pid='+pick_up_id;
        }  
        else if(delivery_id != ''){
            window.location.href = baseUrl +'/delivery/split-bill/?did='+delivery_id;
        } 
    }else {
        typeAlert('Error', 'There are no items to create bill', 'error');
    }
});

$(document).on('click', '.sa-input-error', function () {
    $('.sa-error-container').removeClass('show').addClass('hide');
    $('.sa-input-error').removeClass('show').addClass('hide');
});

function increment(orderList, item, price) {
    $item = $('.' + orderList + ' .' + item);
   
    var qty = $item.find('.quantity').val();
    
    if (qty == '' || qty == null) {
        qty = 0;
    }
    var total = qty*price;
    $item.find('.total-val').val(total);
    $item.find('.total').html(total);
}

/*function in which discount is calculated before service charge*/
function calculateTotal($order , $list , discount_type) { 
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
                    if(discount_percent > discount_upto) {
                        discount_percent = 0;
                        discount_total   = 0;
                        $order.find('.discount-amount').val(0);
                        basicAlert('Discount cannot exceed '+discount_upto+' percent', '', 'info'); 
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
            
            var remaining_amount = 0;
            if ($order.is($('.order-desk'))) {
                var total_paid_amount   = $order.find('.total-paid-amount').val();
                if (total_paid_amount > 0) {
                    remaining_amount = Math.round(grand_total - total_paid_amount);
                    $order.find('.remaining-payment').html(currency+' ' + numberFormat(remaining_amount));
                    $order.find('.remaining-total').val(remaining_amount);
                }else{
                    $order.find('.remaining-total').val(total_amt);
                }
            }
        }
    });
}
/*function in which discount is calculated before service charge*/