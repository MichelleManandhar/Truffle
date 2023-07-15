$(function () {
    $('.scroll-height-500').slimScroll({
        start: $('.slimscrollstart-position-500'),
        height: '500',
        alwaysVisible: true
    });
});

$('.datepicker').datepicker();

$(document).on('change', '.membership-type', function () {
    if($(this).val() == membership_type['paid']) {
        $('.parent-membership-fee').show();
    }else {
        $('.parent-membership-fee').find('.membership-fee').val('');
        $('.parent-membership-fee').hide();
    }
});

$(document).on('submit', '.member-form', function(e) {
    e.preventDefault();
    $.ajax({
        type    :'POST',
        url     : $(this).attr('action'),
        data    : $(this).serialize(),
        async   : false,
        success : function(response) {
            var res = $.parseJSON(response);
            if(res != false){
                typeAlertRedirect('Success', 'Data has been saved successfully' , 'success', baseUrl+'/member/');
            }else {
                typeAlert('Error', 'Cannot save data. Something went wrong', 'error');
            }
        }
    });
});

$(document).on('submit', '.member-edit-form', function(e) {
    e.preventDefault();
    $.ajax({
        type    :'POST',
        url     : $(this).attr('action'),
        data    : $(this).serialize(),
        async   : false,
        success : function(response) {
            var res = $.parseJSON(response);
            if(res != false){
                typeAlertRedirect('Success', 'Data has been updated successfully' , 'success', baseUrl+'/member/');
            }else {
                typeAlert('Error', 'Cannot update data. Something went wrong', 'error');
            }
        }
    });
});