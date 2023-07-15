$(function () {
    $('.scroll-height-400').slimScroll({
        start: $('.slimscrollstart-position-400'),
        height: '400px',
        alwaysVisible: true
    });
});

$(document).on('click', '.btn-merge-bill', function () {
    var occupy_ids = [];
    var i=0;
    $('.drag-table').each(function () {
        if($(this).find('.tb-occupy').val() != 0) {
            occupy_ids[i] = $(this).find('.tb-occupy').val();
            i++;
        }
    });

    if(occupy_ids == '') {
        basicAlert('No tables has been occupied', '', 'info');
        return false;
    }

    $.ajax({
        type : 'POST',
        url  : baseUrl + '/table/get-occupied-tables',
        data : {occupy_ids : occupy_ids},
        async : false,
        success: function (respones) {
            var res = $.parseJSON(respones);
            var content = '';
            $.each(res, function (i, table) {
                content +=  '<div class="list-group-item blue-grey-500 table-list">' +
                                '<div class="checkbox-custom checkbox-primary">' +
                                '<input type="hidden" name="hidden_occupy_start_date" class="hidden-occupy-start-date" value="'+table.occupy_start_date+'">' +
                                '<input type="hidden" name="hidden_occupy_start_time" class="hidden-occupy-start-time" value="'+table.occupy_start_time+'">' +
                                    '<input type="hidden" name="hidden_occupy_id" class="hidden-occupy-id" value="'+table.occupy_id+'">' +
                                    '<input type="hidden" name="hidden_occupy_pax" class="hidden-occupy-pax" value="'+table.occupy_pax+'">' +
                                    '<input type="hidden" name="hidden_floor_id" class="hidden-floor-id" value="'+table.floor_id+'">' +
                                    '<input type="checkbox" id="inputChecked" name="checkbox[]" class="check-table" value="'+table.table_id+'">' +
                                    '<label for="inputChecked" class="padding-left-20">'+table.table_name.toUpperCase()+'</label>' +
                                '</div>' +
                            '</div>';
            });
            $('.modal-merge-bill').find('.show-occupied-tables-list').html(content);
            $('.modal-merge-bill').modal('show');
        }
    });
});

$(document).on('click', '.btn-confirm-merge-bill', function () {
    var merge = [];
    var i = 0;
    $('.modal-merge-bill').find('.show-occupied-tables-list .table-list').each(function () {
        if($(this).find('.check-table').prop('checked')) {
            merge[i] =  { 
                            occupy_id       : $(this).find('.hidden-occupy-id').val(),
                            start_date  : $(this).find('.hidden-occupy-start-date').val(), 
                            start_time  : $(this).find('.hidden-occupy-start-time').val(),  
                            occupy_pax  : $(this).find('.hidden-occupy-pax').val(),
                            floor_id        : $(this).find('.hidden-floor-id').val(),
                            table_id        : $(this).find('.check-table').val()
                        };
            i++;
        }
    });
    $.ajax({
        type : 'POST',
        url  : baseUrl + '/table/merge-bill',
        data : {merge : merge},
        async: false,
        success: function (response) {
            var res = $.parseJSON(response);
            console.log(res);
            if(res) {
                location.reload();
            }else {
                typeAlert('Error!', 'Something went wrong.', 'error'); 
            }
        }
    });
});