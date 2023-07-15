
$(document).on('submit', '.printers', function (e) {
    e.preventDefault();
    $this = $(this);
    $.ajax({
        type : "POST",
        url  : $this.attr('action'),
        data : $this.serialize(),
        async: false,
        success: function (response) {
            var res = $.parseJSON(response);
            if(res != false){
                typeAlertRedirect('Success', 'Printer has been assigned', 'success', baseUrl+'/printer/');
            }
            else{
                typeAlert('Error!', 'Something went wrong', 'warning');
            }
        }
    });
});

$(document).on('click', '.refresh', function (e) {
    e.preventDefault();
    $this = $(this);
    $.ajax({
        type : "POST",
        url  : baseUrl + '/printer/generate-printer-list',
        data : $this.serialize(),
        async: false,
        success: function (response) {
            var res = $.parseJSON(response);
            if(res != false){
                typeAlertRedirect('Success', 'Printers has been loaded', 'success', baseUrl+'/printer/');
            }
            else{
                typeAlert('Error!', 'Sorry your printers were not loaded', 'warning');
            }
        }
    });
});