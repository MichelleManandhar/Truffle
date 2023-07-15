$('.modal-add-utensils-item').on('hidden.bs.modal', function (e) {
    $(this).find('.show-temp-utensils-item').html('');
    $(this).find('.table-added-utensils-list').hide();
});

var utensils_item_count = 0;

$(document).on('click' , '.btn-temp-add-utensils-item' , function () {
    var $name          = $('.modal-add-utensils-item').find('.new-utensils-item-name');
    var $opening_stock = $('.modal-add-utensils-item').find('.new-utensils-item-opening-stock');
    
    $.ajax({
        type : 'POST',
        url  : baseUrl + '/utensils-manager/check',
        data : {name : $name.val()},
        async:false,
        success: function (response) {
            var res = $.parseJSON(response);
            if(res == true) {
                basicAlert("Utensils Name must be unique", 'info');
            } 
            else {
                if($.trim($name.val()) != '') {
                    var status = true;
                    utensils_item_count = utensils_item_count + 1;

                    if(status == false) {
                        basicAlert("Utensils Name must be unique", 'info');
                    }else{
                        $('.table-added-utensils-list').show();
                        var content =   '<tr class="tr-added-utensils-item">' +
                                            '<td><input type="text" class="form-control td-added-utensils-item-name" name="items['+ utensils_item_count +'][name]" readonly value="' + $name.val() + '"></td>' +
                                            '<td>' +
                                                '<input type="number" class="form-control td-added-utensils-item-opening-stock" name="items['+ utensils_item_count +'][opening_stock]" value="'+ $opening_stock.val() +'">' +
                                                '<input type="hidden" class="form-control td-added-utensils-item-is-active" name="items['+ utensils_item_count +'][is_active]" value="1">' +
                                            '</td>' +
                                            '<td>' +
                                                '<button type="button" class="btn btn-sm btn-primary btn-temp-remove-utensils-item icon fa-remove"></button>' +
                                            '</td>' +
                                        '</tr>';

                        $('.show-temp-utensils-item').append(content);

                        $name.val('');
                        $opening_stock.val('');
                    }
                }
            }
        }
    });
});

$(document).on('click', '.btn-temp-remove-utensils-item', function () {
    $(this).parents('.tr-added-utensils-item').remove();
    /*var count = 0;
    $(".tr-added-utensils-item").each(function( index ) {
        $(this).find('.td-added-utensils-item-name input[name="items['+count+'][name]"]');
        $(this).find('.td-added-utensils-item-opening-stock input[name="items['+count+'][opening_stock]"]');
        $(this).find('.td-added-utensils-item-is-active input[name="items['+count+'][is_active]"]');
        count = count + 1;
        console.log($(this));
    });*/
});

$(document).on('submit', '.add-utensils-item', function (e) {
    e.preventDefault();
    $('.btn-save-utensils-item').button('loading');
    $.ajax({
        type : 'POST',
        url  : $(this).attr('action'),
        data : $(this).serialize(),
        async: true,
        success: function (response) {
            var res = $.parseJSON(response);
            if(res != false) {
                $('.modal-add-utensils-item').modal('hide');
                typeAlertRedirect('Success', 'Utensils items has been added successfully', 'success', '');
            }
            else{
                $('.btn-save-utensils-item').button('reset');
            }
        }
    });
});

$(document).on('keyup change', '.txt-stock-count', function (e) {
    var $this = $(this);
    var $parent = $this.parents('.adjustment-parent-tr');

    if($parent.find('.txt-stock-count').val() < 0) {
        $parent.find('.txt-stock-count').val('');
    }else{
        if($this.val() != '') {
            $parent.find('.txt-adjustment-remarks').prop('disabled', false);
            $parent.find('.btn-adjustment-stock').prop('disabled', false);

            $parent.find('.td-stock-adjustment').html($this.val() - $parent.find('.td-available-stock').html());
            $parent.find('.hidden-stock-adjustment').val($this.val() - $parent.find('.td-available-stock').html());
        }else{
            $parent.find('.txt-adjustment-remarks').prop('disabled', true);
            $parent.find('.btn-adjustment-stock').prop('disabled', true);
            $parent.find('.td-stock-adjustment').html('');
            $parent.find('.hidden-stock-adjustment').val('');
        }
    }
});

$(document).on('click','.btn-adjustment-stock', function (e) {
    e.preventDefault();
    var $this = $(this);
    var $parent = $this.parents('.adjustment-parent-tr');
    var item_id = $parent.data('id');
    var adjustment = $parent.find('.hidden-stock-adjustment').val();
    var remarks    = $parent.find('.txt-adjustment-remarks').val();
    
    if($parent.find('.txt-adjustment-remarks').val() == ''){
        basicAlert('Remarks is required','','info');
        return false;
    }
    else{
        $.ajax({
            type : 'POST',
            url  : baseUrl + '/utensils-manager/add-stock-adjustment',
            data : {item_id : item_id, adjustment : adjustment, remarks : remarks},
            async: false,
            success: function (response) {
                var data = $.parseJSON(response);
                if(data != false) {
                    $parent.find('.txt-adjustment-remarks').val('');
                    $parent.find('.txt-adjustment-remarks').prop('disabled', true);
                    $parent.find('.btn-adjustment-stock').prop('disabled', true);
                    $parent.find('.td-stock-adjustment').html('');
                    $parent.find('.hidden-stock-adjustment').val('');
                    $parent.find('.txt-stock-count').val('');
                    
                    typeAlertRedirect('Success', 'Utensils stock has been adjusted', 'success', '');
                }
                else{
                    $parent.find('.txt-adjustment-remarks').val('');
                    $parent.find('.txt-adjustment-remarks').prop('disabled', true);
                    $parent.find('.btn-adjustment-stock').prop('disabled', true);
                    $parent.find('.td-stock-adjustment').html('');
                    $parent.find('.hidden-stock-adjustment').val('');
                    $parent.find('.txt-stock-count').val('');

                    typeAlert('Error', 'Cannot adjust utensils stock at this moment', 'error');   
                }
            }
        });   
    }
});