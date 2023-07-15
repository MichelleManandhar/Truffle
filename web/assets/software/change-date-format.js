$(document).on('click', '.change-date-format', function () {
    $.ajax({
        type : 'POST',
        url  : baseUrl + '/date-format',
        data : {date_type : $(this).data('date-type')},
        async: false,
        success: function (response) {
            var res = $.parseJSON(response);
            if(res != false) {
                location.reload();
            }
        }
    });
});