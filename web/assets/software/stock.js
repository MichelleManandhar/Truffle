$(document).on('keyup change', '.txt-stock-count', function (e) {
    var $this = $(this);
    var $parent = $this.parents('.adjustment-parent-tr');

    if($parent.find('.txt-stock-count').val() < 0) {
        $parent.find('.txt-stock-count').val('');
    }else{
        if($this.val() != '') {
            $parent.find('.txt-adjustment-remarks').prop('disabled', false);
            $parent.find('.btn-adjustment-stock').prop('disabled', false);

            $parent.find('.td-stock-adjustment').html($this.val() - $parent.find('.td-available-stock').html());
            $parent.find('.hidden-stock-adjustment').val($this.val() - $parent.find('.td-available-stock').html());
        }else{
            $parent.find('.txt-adjustment-remarks').prop('disabled', true);
            $parent.find('.btn-adjustment-stock').prop('disabled', true);
            $parent.find('.td-stock-adjustment').html('');
            $parent.find('.hidden-stock-adjustment').val('');
        }
    }
});

$(document).on('click','.btn-adjustment-stock', function (e) {
    e.preventDefault();
    
    var $this = $(this);
    var $parent = $this.parents('.adjustment-parent-tr');
    var product_id = $parent.data('id');
    var adjustment = $parent.find('.hidden-stock-adjustment').val();
    var remarks    = $parent.find('.txt-adjustment-remarks').val();
    
    if($parent.find('.txt-adjustment-remarks').val() == ''){
        basicAlert('Remarks is required','','info');
        return false;
    }
    else{
        $.ajax({
            type : 'POST',
            url  : baseUrl + '/stock/add-adjustment',
            data : {product_id : product_id, adjustment : adjustment, remarks : remarks},
            async: true,
            success: function (response) {
                var data = $.parseJSON(response);
                if(data != false) {
                    $parent.find('.txt-adjustment-remarks').val('');
                    $parent.find('.txt-adjustment-remarks').prop('disabled', true);
                    $parent.find('.btn-adjustment-stock').prop('disabled', true);
                    $parent.find('.td-stock-adjustment').html('');
                    $parent.find('.hidden-stock-adjustment').val('');
                    $parent.find('.txt-stock-count').val('');

                    typeAlertRedirect('Success', 'Stock has been adjusted', 'success', '');
                }
                else{
                    $parent.find('.txt-adjustment-remarks').val('');
                    $parent.find('.txt-adjustment-remarks').prop('disabled', true);
                    $parent.find('.btn-adjustment-stock').prop('disabled', true);
                    $parent.find('.td-stock-adjustment').html('');
                    $parent.find('.hidden-stock-adjustment').val('');
                    $parent.find('.txt-stock-count').val('');

                    typeAlert('Error', 'Cannot adjust stock at this moment', 'error');   
                }
            }
        });   
    }
});