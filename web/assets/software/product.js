$(document).one('submit', '.add-product', function (e) {
    e.preventDefault();
    var $form = $(this);
    $.ajax({
        type : 'POST',
        url  : $form.attr('action'),
        data : $form.serialize(),
        async: true,
        success: function (response) {
            var data = $.parseJSON(response);
            if(data != false) {
                typeAlertRedirect('Success',' New Product has been added', 'success','');
            }else{
                typeAlert('Error','Sorry! data cannot be stored at this moment', 'error');
            }
        }
    });
    $('.btn-submit-product').prop('disabled', true);
});