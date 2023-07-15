$(document).one('submit', '.add-purchase', function (e) {
    e.preventDefault();
    $.ajax({
        type : 'POST',
        url  : $(this).attr('action'),
        data : $(this).serialize(),
        async: false,
        success: function (response) {
            var data = $.parseJSON(response);
            if(data) {
                typeAlertRedirect('Success', 'Purchase has been made successfully','success', '');
            }else {
                typeAlert('Sorry', 'Something went wrong !!!','error');
            }
        }
    });

    $('.btn-submit-purchase').prop('disabled', true);
});