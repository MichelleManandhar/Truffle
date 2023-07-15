$(document).on('click', '.print-duplicate-bill', function (e) {
    e.preventDefault(); 
    var id = $(this).data('id');
    $.ajax({
        url: baseUrl + '/order/invoice',
        data: {id : id},
        type: 'POST',
        async: false,
        success: function (response) { 
            var data = $.parseJSON(response);
            if (data != false) { 
                typeAlertRedirect('Success', 'Duplicate bill has been printed', 'success', '');
            }
            else {
               typeAlertRedirect('Error!', 'Could not print bill at this time.', 'error', '');
            }
        }
    });
});

$(document).on('click', '.print-duplicate-receipt', function (e) {
    e.preventDefault(); 
    var id = $(this).data('id');
    $.ajax({
        url: baseUrl + '/debtor/receipt',
        data: {id : id},
        type: 'POST',
        async: false,
        success: function (response) { 
            var data = $.parseJSON(response);
            if (data != false) {           
                typeAlert('Success', 'Receipt has been printed', 'success');
            }
            else {
               typeAlertRedirect('Error!', 'Could not print receipt at this time.', 'error', '');
            }
        }
    });
});