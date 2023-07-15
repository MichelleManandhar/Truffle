$(document).on('click', '.cancel-order', function (e) {
    e.preventDefault();
    var order_id = $(this).data('id');
    swal({
        title: "Reason!",
        text: "Write reason for returning the bill",
        type: "input",
        showCancelButton: true,
        confirmButtonText: 'Confirm',
        closeOnConfirm: false,
        animation: "slide-from-top",
        inputPlaceholder: ""
    },
    function(inputValue){
        if (inputValue === false) return false;
      
        if (inputValue === "") {
            swal.showInputError("You need to write something!");
            return false
        }

        $.ajax({
            type : 'POST',
            url  : baseUrl + '/order/cancel-order',
            data : {order_id : order_id , reason : inputValue},
            async: false,
            success: function (response) {
                var data = $.parseJSON(response);
                if(data != false) {
                    typeAlertRedirect('Success!', 'Order has been cancelled', 'success', '');
                }else {
                    typeAlertRedirect('Error!', 'Something went wrong!! Order cannot be cancelled', 'error', '');
                }
            }
        });   
    });
});