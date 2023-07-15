$(function () {
    $('.scroll-height-600').slimScroll({
        start: $('.slimscrollstart-position'),
        height: '600px',
        color: '#000000',
        alwaysVisible: true,
        size: '8px',
        touchScrollStep : 200,
        distance : '0px',
    });

    $('.scroll-height-350').slimScroll({
        start: $('.slimscrollstart-position'),
        height: '350px',
        alwaysVisible: true
    });
});

$(document).on('submit', '.menu-item', function (e) {
    e.preventDefault();
    var form = $(this);
    if(form.valid()) {
        submitForm(form);
    }     
});

$(document).on('submit', '.menu-item-edit-image', function (e) {
    e.preventDefault();
    var form = $(this);
    var image = $('.image-val').val();
    if (image == '' || image == null || image == 'undefined') {
    	typeAlert('Error!', 'You have not uploaded any image.', 'warning');
    	return false;
    }

    successMsg  = 'Image Successfully updated.';
    errorMsg    = 'Sorry, Could not update the image at this time. Please try again.';

    $.ajax({
        url: $(form).attr('action'),
        data: $(form).serialize(),
        type: 'POST',
        async: false,
        success: function (response) { 
            var data = $.parseJSON(response); 
            if(data != false){
                typeAlertRedirect('Success', successMsg, 'success', baseUrl+'/menu-item/');  
            }
            else{
                typeAlertRedirect('Error!', errorMsg, 'warning', '');
            }
        }
    });     
});

$(document).on('click', '.menu-item-delete-image', function (e) {
    e.preventDefault();
    var $this = $(this);
    var id = $('#menu-item-id').val();
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
            url: baseUrl+'/menu-item/delete-image',
            data: {id: id},
            type: 'POST',
            async: false,
            success: function (response) { 
                var data = $.parseJSON(response); 
                if(data != false){
                    typeAlert('Success', successMsg, 'success');  
                    $this.parents('.image-parent').remove();
                }
                else{
                    typeAlert('Error!', errorMsg, 'warning');
                }
            }
        });            
    });
});

uploads();

