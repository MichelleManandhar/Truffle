
var $sort = $( "#sortable");
$sort.sortable();
$sort.on('sortupdate', function() {
    $.ajax({
        data: $(this).sortable('serialize'),
        url : $(this).data('url'),
        type: 'GET',
        async: false,
        success : function (response) {
            var data = $.parseJSON(response);
            if (data == true) { 
                $('#sorting-msg').html('<span class="label label-outline label-success font-size-15">Menu Successfully ordered</span>');
            } else {
                $('#sorting-msg').html('<span class="label label-outline label-danger font-size-15">Sorry, could not update the menu order.</span>');
            }
            $('#sorting-msg span').fadeIn(3000).delay(1500).fadeOut("slow");
        },
        error : function (response) {
            $('#sorting-msg').html('<span class="label label-outline label-danger font-size-15">Error, Something went wrong.</span>');
            $('#sorting-msg span').fadeIn(3000).delay(1500).fadeOut("slow");
        }
    });
});
$sort.trigger('sortupdate');
$sort.disableSelection();