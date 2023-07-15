
$(document).on('submit', '.profile-picture', function (e) {
    e.preventDefault();
    var form = $(this);
    var image = $('.profile-image-val').val();
    /*if (image == '' || image == null || image == 'undefined') {
        typeAlert('Error!', 'You have not uploaded any image.', 'warning');
        return false;
    }*/
  
    successMsg  = 'Image Successfully Uploaded.';
    errorMsg    = 'Sorry, Could not update the image at this time. Please try again.';

    $.ajax({
        url: $(form).attr('action'),
        data: $(form).serialize(),
        type: 'POST',
        async: false,
        success: function (response) {
            var data = $.parseJSON(response);
            if(data != false){
               typeAlertRedirect('Success', successMsg, 'success', baseUrl+'/dash/');
            }
            else{
                typeAlertRedirect('Error!', errorMsg, 'warning', '');
            }
        }
    });
});

$(document).on('click', '.delete-image', function (e) {
    e.preventDefault();
    var $this = $(this);
    var id = $('#profile-id').val();
    msgText     = 'Do you want to delete this Image?';
    successMsg  = 'Image Successfully deleted.';
    errorMsg    = 'Sorry, Could not delete the image at this time. Please try again.';

    swal({
        title: 'Are You Sure?',
        text: msgText,
        type: "warning",
        showCancelButton: true,
        confirmButtonColor: "rgb(190, 92, 73)",
        confirmButtonText: 'Yes, Delete it.',
        closeOnConfirm: false
    }, function() {
        $.ajax({
            url: baseUrl+'/user/delete',
            data: {id: id},
            type: 'POST',
            async: false,
            success: function (response) {
                var data = $.parseJSON(response);
                if(data != false){
                    typeAlert('Success', successMsg, 'success');
                    $('.profile-image-val').val('');
                    $this.parents('.image-parent').remove();
                }
                else{
                    typeAlert('Error!', errorMsg, 'warning');
                }
            }
        });
    });
});

profile_uploads();