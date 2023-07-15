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

/* for kot item select*/
$(document).on('click', '.select-item', function (e) {
    e.preventDefault();
    var $that = $(this);
    var item  = $that.data('item');
    var price = $that.data('price');
    var occupy_id = $('.hidden-occupy-id').val();
    var item_count = $('.order-list .listed-item').length;
    $.ajax({
        type: 'POST',
        url : baseUrl + '/order/temp-order-list',
        data: {item: item, occupy_id: occupy_id},
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

                    $kot = $('.bill-kot-list .'+item);
                    $kot.find('.quantity').html(qty);
                }
                else {
                    selected_count++;
                    var name  = $that.data('name');

                    var order_list_content  =   '<tr class="listed-item '+item+'" data-list="order_list" data-item="'+item+'" data-price="'+ res.temp_order_list_price +'" >'+
                                                    '<input type="hidden" name="items['+(selected_count)+'][item]" class="item" value="'+res.temp_order_list_item_name+'">'+
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

$(document).on('submit', '.special-order-list-form', function (e) {
    e.preventDefault();
    var occupy_id   = $('.hidden-occupy-id').val();
    var $form       = $('.special-order-list-form');
    $.ajax({
        type: 'POST',
        url : baseUrl + '/order/special-temp-order-list',
        data: $form.serialize() + '&occupy_id='+occupy_id,
        async: false,
        success: function (response) {
            var data = $.parseJSON(response);
            if(data != false){
                $order = $('#calculation-container');
                $order.find('.nav-tabs li').removeClass('active');
                $order.find('.nav-tabs').find('a[href="#all-list"]').parents('li').addClass('active');

                $order.find('.tab-content .tab-pane').removeClass('active');
                $order.find('.tab-content').find('#all-list').addClass('active');
                window.location.reload();
            }
        }    
    });
});

$(document).on('click', '.send-kot', function (e) {
    e.preventDefault();
    e.stopPropagation();

    var $that = $(this); 
    var form = $('.send-kot-form');
    if(form.find('.temp-order-list').html().trim() == ''){
        basicAlert('Cannot send empty KOT.', '', 'info');
        return false;
    } 
    else {
        /*$('.print-loading-modal').modal('show');*/
    }

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
                        var occupy_id = data.occupy_id;
                        var selected_count = 0;
                        
                        if(data.temp_items != null){
                            var order_content = '';
                            $('.order-list').html('');
                            $.each(data.temp_items, function (i,val) {
                                selected_count++;
                                if(val.type == item_type['regular']) {
                                    order_content += '<tr class="listed-item '+val.slug+'" data-list="all_list" data-item="'+val.slug+'" data-price="'+val.price+'" data-item-id="'+val.item_id+'" data-type="regular" data-discountable="'+val.is_discountable+'">'+
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
                            url  : baseUrl + '/order/delete-temp-order-list',
                            data : {occupy_id : occupy_id , kot_id : kot_id},
                            async: false,
                            success: function (response) {
                                var res = $.parseJSON(response);
                                if(res != false){
                                    /*$('.print-loading-modal').modal('hide');*/
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
                                    });
                                    recent_kot += '<tbody>'+
                                                '</table>';

                                    var recent_kot_for_return_modal = 
                                                '<h5 class="padding-left-5">'+ 
                                                    '<span class="pull-left">KOT : ' + res.kot['display_number'] + '</span>'+
                                                    '<span class="pull-right font-size-12 small">'+res.kot['created_on']+'</span>'+
                                                '</h5>'+                                            
                                                '<table class="table">'+
                                                   ' <thead>'+
                                                        '<tr>'+
                                                            '<th>Name</th>'+
                                                            '<th class="th-qty-width">Quantity</th>'+
                                                        '</tr>'+
                                                    '</thead>'+
                                                    '<tbody>';
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
                /*$('.print-loading-modal').modal('hide');*/
                basicAlert('Could not send kot at this time.', '', 'error');
            }        
        }
    });
});
// Change HEre
$(document).on('blur', '.send-data', function () {
    var occupy_id = $('.hidden-occupy-id').val();
    var $this     = $(this);
    var field     = $this.attr('name');
    var value     = $this.val();
    $.ajax({
        type: 'POST',
        url : baseUrl + '/order/update-occupy',
        data: {occupy_id: occupy_id , field : field , value : value},
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

$(document).on('change keyup', '.quantity', function () {
    var $this = $(this);
    if ($this.parents('.order-desk').length) {
        var temp_item   = $this.parents('.listed-item').find('.item').val();  
        var price       = $this.parents('.listed-item').data('price');
        var list_type   = $this.parents('.listed-item').data('list');
        var occupy_id   = $('.hidden-occupy-id').val();
        var quantity    = $this.parents('.listed-item').find('.quantity').val();

        if(list_type == 'all_list'){
             $.ajax({
                type: 'POST',
                url : baseUrl + '/order/update-temp-order-quantity',
                data: {item : temp_item , price : price , occupy_id : occupy_id , quantity : quantity},
                async:false,
                success: function (response) {
                    var res = $.parseJSON(response);
                    if(res != false){
                        $this.parents('.listed-item').find('.quantity').val(res.quantity);
                    }
                }
             });
        }else if(list_type == 'order_list'){
            var temp_order_list_id = $this.parents('.listed-item').find('.temp-order-list-id').val();
            $.ajax({
                type: 'POST',
                url : baseUrl + '/order/update-temp-order-list-quantity',
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
            url : baseUrl + '/order/remove-temp-order-list',
            data: {temp_order_list_id : temp_order_list_id , quantity : quantity , item : item},
            async:false,
            success: function (response) {
                var res = $.parseJSON(response);
                if(res != false){
                    $that.parents('.listed-item').remove();
                    if(res.quantity > 0){
                        $('.listed-item.'+item).find('.quantity').val(res.quantity);
                    }else{
                        $that.parents('.listed-item.'+item).remove();  
                    }
                }
            }
        });
    }

    if(!$('.if-foc').hasClass('yes')) {
        var $order = $('.order-desk');
        var $list  = $('.order-list').find('.total-val');
        calculateTotal($order , $list);
    }

    rearrangeSN();
});

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
                    var count = 0; 
                    $.each(category , function (display_number , list) {
                        count++;
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