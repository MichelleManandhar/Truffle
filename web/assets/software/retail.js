$(function() {
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
        touchScrollStep: 200,
        distance: '0px',
    });
});

/*this code is required if pick up is created from form*/
/*$(document).on('submit', '.retail-form', function (e) {
    e.preventDefault();
    $.ajax({
        type: 'POST',
        url : $('.retail-form').attr('action'),
        data: $('.retail-form').serialize(),
        async: false,
        success: function (response) {
            var res = $.parseJSON(response);
            if(res.status == 'logout') {
                window.location.href = baseUrl + '/site/logout';
            }else {
                if(res != false){
                    window.location.href = baseUrl + '/' + retail_version + '/?rid='+res.retail_id;
                }
            }
        }
    });
});*/

$(document).one('click', '.btn-retail', function(e) {
    e.preventDefault();
    $.ajax({
        type: 'POST',
        url: baseUrl + '/table/retail-now',
        async: false,
        success: function(response) {
            var res = $.parseJSON(response);
            if (res.status == 'logout') {
                window.location.href = baseUrl + '/site/logout';
            } else {
                if (res != false) {
                    window.location.href = baseUrl + '/' + retail_version + '/?rid=' + res.retail_id;
                }
            }
        }
    });

    $('.btn-retail').prop('disabled', true);
});

$(document).on('click', '.close-retail-modal-btn', function(e) {
    e.preventDefault();
    $('.form-group').each(function() { $(this).removeClass('has-error'); });
    $('.help-block').each(function() { $(this).remove(); });
    $('.retail-now').find('.retail-form')[0].reset();
    $('.retail-now').modal('toggle');
});

$(document).on('click', '.btn-retail-list', function() {
    $.ajax({
        type: 'POST',
        url: baseUrl + '/retail/list',
        async: false,
        success: function(response) {
            var res = $.parseJSON(response);
            if (res != false) {
                var retail_list_content = "";
                var selected_count = 0;
                $.each(res.retail, function(i, val) {
                    selected_count++;
                    var customer_pan = (val.customer_pan != '0') ? val.customer_pan : "N/A";
                    var customer_address = (val.customer_address != '') ? val.customer_address : "N/A";
                    retail_list_content +=
                        '<tr class="retail" data-retail_id="' + val.id + '">' +
                        '<td class="sn">' + selected_count + '</td>' +
                        '<td>' + val.customer_name + '</td>' +
                        '<td>' + val.customer_phone + '</td>' +
                        '<td>' + customer_pan + '</td>' +
                        '<td>' + customer_address + '</td>' +
                        '<td>' + val.created_on + '</td>' +
                        '<td>';
                    if (val.status == 0) {
                        retail_list_content += '<a href="' + baseUrl + '/' + retail_version + '/?rid=' + val.id + '"><button type="button" class="btn btn-xs btn-info view-retail">View</button></a>' +
                            '<button type="button" class="btn btn-xs btn-danger cancel-retail">Cancel Order</button>';
                    } else {
                        retail_list_content += '<button type="button" class="btn btn-xs btn-info btn-confirm-retail">Confirm Retail</button>' +
                            '<button type="button" class="btn btn-xs btn-danger btn-cancel-ordered-retail">Cancel Retail</button>';
                    }

                    retail_list_content += '</td>' +
                        '</tr>';
                });
                $('.retail-list-content').html(retail_list_content);
                $('.retail-list').modal('show');
                $('.retail-tables-data').dataTable();
            }
        }
    });
});

$(document).on('click', '.btn-confirm-retail', function() {
    var $this = $(this);
    var retail_id = $this.parents('.retail').data('retail_id');
    $.ajax({
        type: 'POST',
        url: baseUrl + '/retail/confirm',
        data: { retail_id: retail_id },
        async: false,
        success: function(response) {
            var res = $.parseJSON(response);
            if (res != false) {
                $this.parents('.retail').remove();
                rearrangeDeliverySN();
            } else {
                typeAlertRedirect('Error!', 'Could not cancel the order at this time. Please try again.', 'error', '');
            }
        }
    });
});

$(document).on('click', '.btn-cancel-ordered-retail', function() {
    var $this = $(this);
    var retail_id = $this.parents('.retail').data('retail_id');
    $.ajax({
        type: 'POST',
        url: baseUrl + '/retail/cancel-ordered',
        data: { retail_id: retail_id },
        async: false,
        success: function(response) {
            var res = $.parseJSON(response);
            if (res != false) {
                $this.parents('.retail').remove();
                rearrangeDeliverySN();
            } else {
                typeAlertRedirect('Error!', 'Could not cancel the order at this time. Please try again.', 'error', '');
            }
        }
    });
});

$(document).on('click', '.cancel-retail', function() {
    var $this = $(this);
    var retail_id = $this.parents('.retail').data('retail_id');
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
                            type: 'POST',
                            url: baseUrl + '/retail/cancel',
                            data: { retail_id: retail_id },
                            async: false,
                            success: function(response) {
                                var res = $.parseJSON(response);
                                if (res != false) {
                                    $this.parents('.retail').remove();
                                    rearrangeRetailSN();
                                } else {
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
$(document).on('click', '.select-item', function(e) {
    e.preventDefault();
    var $that = $(this);
    var item = $that.data('item');
    var retail_id = $('.hidden-retail-id').val();
    $.ajax({
        type: 'POST',
        url: baseUrl + '/retail/temp-order-list',
        data: { item: item, retail_id: retail_id },
        async: false,
        success: function(response) {
            var res = $.parseJSON(response);
            if (res != false) {
                var selected_count = $('.temp-order-list .listed-item').length;

                if ($('.temp-order-list .listed-item').hasClass(item)) {
                    $item = $('.temp-order-list .' + item);
                    var qty = $item.find('.quantity').val();
                    if (qty == '' || qty == null) {
                        qty = 0;
                    }
                    qty++;
                    $item.find('.quantity').val(qty);

                    $bill = $('.bill-kot-list .' + item);
                    $bill.find('.quantity').html(qty);
                } else {
                    selected_count++;
                    var name = $that.data('name');

                    var order_list_content = '<tr class="listed-item ' + item + '" data-list="order_list" data-item="' + item + '" data-price="' + res.temp_order_list_price + '" >' +
                        '<input type="hidden" name="items[' + (selected_count) + '][item]" class="item" value="' + item + '">' +
                        '<input type="hidden" name="items[' + (selected_count) + '][item_id]" class="item-id" value="' + res.temp_order_list_item_id + '">' +
                        '<input type="hidden" name="temp_order_list_id" class="temp-order-list-id" value="' + res.temp_order_list_id + '">' +
                        '<input type="hidden" name="items[' + (selected_count) + '][price]" class="hidden-price" value="' + res.temp_order_list_price + '" >' +
                        '<input type="hidden" name="items[' + (selected_count) + '][type]" class="hidden-type" value="' + res.temp_order_list_type + '" >' +

                        '<td>' + name + '</td>' +
                        '<td>' +
                        '<input type="number" class="form-control custom-input quantity" name="items[' + (selected_count) + '][quantity]" data-plugin="TouchSpin" data-min="1" data-max="1000" data-stepinterval="50" data-maxboostedstep="10000000" value="1" />' +
                        '</td>' +
                        '<td class="padding-right-0 padding-left-0"><button class="btn close-btn pull-right remove-item" type="button"><i class="fa fa-close"></i></button></td>' +
                        '</tr>';

                    $('.temp-order-list').append(order_list_content);

                    $('.temp-order-list').find('.quantity').TouchSpin();

                    var orderbottomCoord = $('.scroll-height-400')[0].scrollHeight;
                    $('.scroll-height-400').slimScroll({ scrollTo: orderbottomCoord });
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

$(document).on('click', '.send-selected-special-item-list', function(e) {
    e.preventDefault();
    var retail_id = $('.hidden-retail-id').val();
    var $form = $('.special-order-list-form');
    $.ajax({
        type: 'POST',
        url: baseUrl + '/retail/special-temp-order-list',
        data: $form.serialize() + '&retail_id=' + retail_id,
        async: false,
        success: function(response) {
            var data = $.parseJSON(response);
            if (data != false) {
                window.location.reload();
            }
        }
    });
});

$(document).on('click', '.send-kot', function(e) {
    e.preventDefault();
    e.stopPropagation();
    var $that = $(this);
    var form = $('.send-kot-form');
    if (form.find('.temp-order-list').html().trim() == '') {
        basicAlert('Cannot send empty KOT.', '', 'info');
        return false;
    } else {
        /*$('.print-loading-modal').modal('show');*/
    }

    $that.button('loading');

    $.ajax({
        type: 'POST',
        url: baseUrl + '/kot/send',
        data: $(form).serialize(),
        async: true,
        success: function(response) {
            var data = $.parseJSON(response);
            if (data != false) {
                var kot_id = data.kot_id;
                var file = {};
                var count = 0;
                $.each(data.kot_category, function(key, category) {
                    count++;

                    if (data.kot_category_count == count) {
                        $('.return-kot').show();
                        $('.no-item').hide();

                        $('.temp-order-list .listed-item').remove();
                        var retail_id = data.retail_id;
                        var selected_count = 0;

                        if (data.temp_items != null) {
                            var order_content = '';
                            var bill_content = '';
                            $('.order-list').html('');
                            $('.bill-order-list').html('');
                            $.each(data.temp_items, function(i, val) {
                                selected_count++;
                                if (val.type == item_type['regular']) {
                                    order_content += '<tr class="listed-item ' + val.slug + '" data-list="all_list" data-item="' + val.slug + '" data-price="' + val.price + '" data-item-id="' + val.item_id + '" data-type="regular" data-discountable="'+val.is_discountable+'">' +
                                        '<input type="hidden" name="items[' + (selected_count) + '][item]" class="item" value="' + val.name + '">' +
                                        '<input type="hidden" name="items[' + (selected_count) + '][item_id]" class="item-id" value="' + val.item_id + '">' +
                                        '<input type="hidden" name="items[' + (selected_count) + '][price]" class="item-price" value="' + val.price + '">' +
                                        '<input type="hidden" class="total-val" value="' + val.price * val.quantity + '">' +
                                        '<input type="hidden" class="temp-item-id" value="' + val.id + '">' +
                                        '<input type="hidden" name="items[' + (selected_count) + '][type]" class="hidden-type" value="' + val.type + '" >' +
                                        '<input type="hidden" name="items['+(selected_count)+'][discountable]" class="item-discountable" value="'+val.is_discountable+'">' +
                                        '<td>' + val.name + '</td>' +
                                        '<td>' + val.price + '</td>' +
                                        '<td>' +
                                        '<input type="number" readonly class="form-control custom-input quantity custom-quantity-input" name="items[' + (selected_count) + '][quantity]" data-plugin="TouchSpin" data-min="0" data-max="' + val.quantity + '" data-stepinterval="50" data-maxboostedstep="10000000" value="' + val.quantity + '" />' +
                                        '</td>' +
                                        '<td><span class="total">' + val.price * val.quantity + '</span></td>' +
                                        '</tr>';
                                } else {
                                    order_content += '<tr class="listed-item ' + val.special_item_id + '" data-list="all_list" data-item="' + val.special_item_id + '" data-price="' + val.special_item_price + '" data-type="special">' +
                                        '<input type="hidden" name="items[' + (selected_count) + '][item]" class="item" value="' + val.special_item_name + '">' +
                                        '<input type="hidden" name="items[' + (selected_count) + '][item_id]" class="item-id" value="' + val.special_item_id + '">' +
                                        '<input type="hidden" name="items[' + (selected_count) + '][price]" class="item-price" value="' + val.special_item_price + '">' +
                                        '<input type="hidden" class="total-val" value="' + val.special_item_price * val.quantity + '">' +
                                        '<input type="hidden" class="temp-item-id" value="' + val.id + '">' +
                                        '<input type="hidden" name="items[' + (selected_count) + '][type]" class="hidden-type" value="' + val.type + '" >' +
                                        '<td>Special-Item(' + val.special_item_name + ')</td>' +
                                        '<td>' + val.special_item_price + '</td>' +
                                        '<td>' +
                                        '<input type="number" readonly class="form-control custom-input quantity custom-quantity-input" name="items[' + (selected_count) + '][quantity]" data-plugin="TouchSpin" data-min="0" data-max="' + val.quantity + '" data-stepinterval="50" data-maxboostedstep="10000000" value="' + val.quantity + '" />' +
                                        '</td>' +
                                        '<td><span class="total">' + val.special_item_price * val.quantity + '</span></td>' +
                                        '</tr>';
                                }
                            });

                            $('.order-list').append(order_content);

                            if (!$('.if-foc').hasClass('yes')) {
                                var $order = $('.order-desk');
                                var $list = $('.order-list').find('.total-val');
                                calculateTotal($order, $list);
                            }
                        }

                        $.ajax({
                            type: 'POST',
                            url: baseUrl + '/retail/delete-temp-order-list',
                            data: { retail_id: retail_id, kot_id: kot_id },
                            async: false,
                            success: function(response) {
                                var res = $.parseJSON(response);
                                if (res != false) {
                                    /*$('.print-loading-modal').modal('hide');*/
                                    var recent_kot =
                                        '<h5 class="padding-left-5">' +
                                        '<span class="pull-left">KOT : ' + res.kot['display_number'] + '</span>' +
                                        '<span class="pull-right font-size-12 small">' + res.kot['created_on'] + '</span>' +
                                        '</h5>' +
                                        '<table class="table">' +
                                        ' <thead class="kot-list-head">' +
                                        '<tr>' +
                                        '<th>Name</th>' +
                                        '<th class="th-qty-width">Quantity</th>' +
                                        '</tr>' +
                                        '</thead>' +
                                        '<tbody class="kot-list-body">';
                                    $.each(res.kot['item'], function(i, val) {
                                        recent_kot +=
                                            '<tr>' +
                                            '<td>' + val.name + '</td>' +
                                            '<td>' + val.quantity + '</td>' +
                                            '</tr>';
                                    })
                                    recent_kot += '<tbody>' +
                                        '</table>';

                                    var recent_kot_for_return_modal =
                                        '<h5 class="padding-left-5">' +
                                        '<span class="pull-left">KOT : ' + res.kot['display_number'] + '</span>' +
                                        '<span class="pull-right font-size-12 small">' + res.kot['created_on'] + '</span>' +
                                        '</h5>' +
                                        '<table class="table">' +
                                        ' <thead>' +
                                        '<tr>' +
                                        '<th>Name</th>' +
                                        '<th class="th-qty-width">Quantity</th>' +
                                        '</tr>' +
                                        '</thead>' +
                                        '<tbody>';
                                    $.each(res.kot['item'], function(i, val) {
                                        recent_kot_for_return_modal +=
                                            '<tr class="return-kot-item-' + val.kot_item_id + '" data-item="' + val.item_id + '">' +
                                            '<input type="hidden" name="items[' + res.kot['id'] + '][' + (i + 1) + '][kot_item_id]" class="hidden-kot-item-id" value="' + val.kot_item_id + '" >' +
                                            '<input type="hidden" name="items[' + res.kot['id'] + '][' + (i + 1) + '][item]" class="item" value="' + val.item_id + '">' +
                                            '<input type="hidden" name="items[' + res.kot['id'] + '][' + (i + 1) + '][price]" class="item-price" value="'+val.price+'">' +
                                            '<input type="hidden" name="items[' + res.kot['id'] + '][' + (i + 1) + '][type]" class="hidden-item-type" value="' + val.type + '" >' +
                                            '<td>' + val.name + '</td>' +
                                            '<td>' +
                                            '<input type="number" class="form-control custom-input return-quantity" name="items[' + res.kot['id'] + '][' + (i + 1) + '][quantity]" data-plugin="TouchSpin" data-min="0" data-max="' + val.quantity + '" data-stepinterval="50" data-maxboostedstep="' + val.quantity + '" value="0" />' +
                                            '</td>' +
                                            '</tr>';
                                    });
                                    recent_kot_for_return_modal += '<tbody>' +
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
            } else {
                $that.button('reset');
                /*$('.print-loading-modal').modal('hide');*/
                basicAlert('Could not send kot at this time.', '', 'error');
            }
        }
    });
});

$(document).on('change', '.quantity', function() {
    var $this = $(this);
    if ($this.parents('.order-desk').length) {
        var temp_item = $this.parents('.listed-item').find('.item').val();
        var price = $this.parents('.listed-item').data('price');
        var list_type = $this.parents('.listed-item').data('list');
        var retail_id = $('.hidden-retail-id').val();
        var quantity = $this.parents('.listed-item').find('.quantity').val();

        if (list_type == 'all_list') {
            $.ajax({
                type: 'POST',
                url: baseUrl + '/retail/update-temp-order-quantity',
                data: { item: temp_item, price: price, retail_id: retail_id, quantity: quantity },
                async: false,
                success: function(response) {
                    var res = $.parseJSON(response);
                    if (res != false) {
                        $this.parents('.listed-item').find('.quantity').val(res.quantity);
                        $('.bill-order-list').find('.' + temp_item + ' .quantity').val(res.quantity);
                        $('.bill-kot-list').find('.' + temp_item + ' .quantity').text(res.quantity);
                    }
                }
            });
        } else if (list_type == 'order_list') {
            var temp_order_list_id = $this.parents('.listed-item').find('.temp-order-list-id').val();
            $.ajax({
                type: 'POST',
                url: baseUrl + '/retail/update-temp-order-list-quantity',
                data: { quantity: quantity, temp_order_list_id: temp_order_list_id },
                async: false,
                success: function(response) {
                    var res = $.parseJSON(response);
                    if (res != false) {
                        $this.parents('.listed-item').find('.quantity').val(res.quantity);
                        $('.bill-kot-list').find('.' + temp_item + ' .quantity').val(res.quantity);
                        $('.bill-kot-list').find('.' + temp_item + ' .quantity').text(res.quantity);
                    }
                }
            });
        }
    }
});

$(document).on('click', '.remove-item', function(e) {
    e.preventDefault();
    var $that = $(this);
    var item = $that.parents('.listed-item').data('item');
    var quantity = $that.parents('.listed-item').find('.quantity').val();
    var temp_order_list_id = $that.parents('.listed-item').find('.temp-order-list-id').val();
    if (temp_order_list_id != null) {
        $.ajax({
            type: 'POST',
            url: baseUrl + '/retail/remove-temp-order-list',
            data: { temp_order_list_id: temp_order_list_id, quantity: quantity, item: item },
            async: false,
            success: function(response) {
                var res = $.parseJSON(response);
                if (res != false) {
                    $that.parents('.listed-item').remove();
                    if (res.quantity > 0) {
                        $that.parents('.listed-item.' + item).find('.quantity').val(res.quantity);
                    } else {
                        $that.parents('.listed-item.' + item).remove();
                    }
                }
            }
        });
    }

    $('.bill-order-list').find('.' + item).remove();
    var $order = $('.order-desk');
    var $list = $('.order-list').find('.total-val');
    calculateTotal($order, $list);
    rearrangeSN();
});

$(document).on('blur', '.send-data', function() {
    var retail_id = $('.hidden-retail-id').val();
    var $this = $(this);
    var field = $this.attr('name');
    var value = $this.val();
    $.ajax({
        type: 'POST',
        url: baseUrl + '/retail/update-retail',
        data: { retail_id: retail_id, field: field, value: value },
        async: false,
        success: function(response) {
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

function rearrangeRetailSN() {
    $('.retail').find('.sn').each(function(i, val) {
        $(this).html(i + 1);
    });
}

$(document).on('click', '.submit-return-kot-btn', function(e) {
    e.preventDefault();

    var $btn = $(this);
    $btn.button('loading');

    var $form = $('.kot-return-form');
    $.ajax({
        type: 'POST',
        url: baseUrl + '/kot/return',
        data: $form.serialize(),
        async: false,
        success: function(response) {
            var data = $.parseJSON(response);
            if (data != false) {
                var kot_id = data.kot_id;
                var file = {};
                var count_main = 0;

                $.each(data.kot_category, function(key, category) {
                    count_main++;
                    var return_kot_content = '';
                    var key = key;

                    $.each(category, function(display_number, list) {
                        return_kot_content += '<tr>' +
                            '<td style="border-top: 1px dashed #DCDCDC;">' +
                            '<h5>' +
                            '<span class="pull-left small margin-bottom-5">KOT no: ' + display_number + '</span>' +
                            '</h5>' +
                            '<table cellpadding="0" cellspacing="0" style="width: 100%; line-height: 14px; font-size: 11px !important; font-family: "ms gothic", sans-serif !important; letter-spacing:1px !important; margin-bottom: 10px;">' +
                            '<thead>' +
                            '<tr>' +
                            '<th>Item Name</th>' +
                            '<th class="th-qty-width">Quantity</th>' +
                            '</tr>' +
                            '</thead>';

                        $.each(list, function(i, val) {
                            return_kot_content += '<tbody>' +
                                '<tr>' +
                                '<td>' + val.name + '</td>' +
                                '<td>' + val.quantity + '</td>' +
                                '</tr>' +
                                '</tbody>';
                        });

                        return_kot_content += '</table>' +
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
    $('.bill-order-list').find('.sn').each(function(i, val) {
        $(this).html(i + 1);
    });
}