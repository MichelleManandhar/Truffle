$(document).on('change','.threshold-end-amount', function (e) {
    e.preventDefault();
    if($('.privillege-threshold-form').find('.threshold-amount').val() == '') {
        basicAlert('Info','Please enter threshold amount first');
        $('.privillege-threshold-form').find('.threshold-end-amount').val('');
        return false;
    }else if(parseFloat($('.privillege-threshold-form').find('.threshold-amount').val()) >= parseFloat($('.privillege-threshold-form').find('.threshold-end-amount').val())) {
        basicAlert('Info','The end amount must be greated than threshold amount');
        $('.privillege-threshold-form').find('.threshold-end-amount').val('');
        return false;
    }
});

$(document).on('click','.view-threshold-data', function (e) {
    e.preventDefault();
    var $this = $(this);
    $.ajax({
        type : 'POST',
        url  : baseUrl+'/member/view-threshold-data',
        data : {member : $this.data('member')},
        async: false,
        success:function (response) {
            var res = $.parseJSON(response);
            var threshold_unclaimed     = res.threshold_count-res.member.threshold_claimed;
            var threshold_end_unclaimed = res.threshold_count-res.member.threshold_claimed;
            $('.modal-view-threshold-data').find('.paid-amount').html(res.order_amount);
            $('.modal-view-threshold-data').find('.threshold-remaining-amount').html(res.threshold_remaining_amount);
            $('.modal-view-threshold-data').find('.threshold-end-remaining-amount').html(res.threshold_end_remaining_amount);
            $('.modal-view-threshold-data').find('.threshold-claimed').html(res.member.threshold_claimed);
            $('.modal-view-threshold-data').find('.threshold-end-claimed').html(res.member.threshold_end_claimed);
            $('.modal-view-threshold-data').find('.threshold-amount').html(res.threshold_amount);
            $('.modal-view-threshold-data').find('.threshold-end-amount').html(res.threshold_end_amount);
            $('.modal-view-threshold-data').find('.member-name').html($this.data('member-name'));

            if(res.member.current_threshold_exceeded == 1 || res.member.current_threshold_end_exceeded == 1) {
                var content = '<table class="table table-bordered latest-threshold-exceeded-table">'+
                                '<tbody>';
                                    if(res.member.current_threshold_exceeded == 1) {
                                        content +=  '<tr class="show-latest-threshold-amount-exceeded">' +
                                                        '<td>' +
                                                            'Latest Threshold Amount ('+res.threshold_amount+') exceeded' +
                                                        '</td>' +
                                                        '<td>' +
                                                            '<a href="'+baseUrl+'/member/claim-threshold/'+res.member.id+'" class="btn btn-xs btn-primary claim-threshold-amount margin-right-10">Claim</a>' +
                                                            '<a href="'+baseUrl+'/member/unclaim-threshold/'+res.member.id+'" class="btn btn-xs btn-danger unclaim-threshold-amount">Ignore</a>' +
                                                        '</td>' +
                                                    '</tr>';
                                    }
                                    if(res.member.current_threshold_end_exceeded == 1) {
                                        content +=  '<tr class="show-latest-threshold-end-amount-exceeded">' +
                                                        '<td>' +
                                                            'Latest Threshold End Amount ('+res.threshold_end_amount+') exceeded' +
                                                        '</td>' +
                                                        '<td>' +
                                                            '<a href="'+baseUrl+'/member/claim-threshold-end/'+res.member.id+'" class="btn btn-xs btn-primary claim-threshold-end-amount margin-right-10">Claim</a>' +
                                                            '<a href="'+baseUrl+'/member/unclaim-threshold-end/'+res.member.id+'" class="btn btn-xs btn-danger unclaim-threshold-end-amount">Ignore</a>' +
                                                        '</td>' +
                                                    '</tr>';
                                    }
                    content +=  '</tbody>'+
                            '</table>';

                $('.modal-view-threshold-data').find('.show-member-threshold-detail').append(content);
                
            }
            $('.modal-view-threshold-data').modal('show');
        }
    });
});

$(document).on('click','.btn-claim-threshold-exceeded',function(e){
    e.preventDefault();
    var $this   = $(this);
    var $modal  = $('.modal-claim-threshold-exceeded');

    $modal.find('.first-threshold-claim').trigger("touchspin.updatesettings", {max: $this.parents('tr').data('threshold-unclaimed')});
    $modal.find('.first-threshold-end-claim').trigger("touchspin.updatesettings", {max: $this.parents('tr').data('threshold-end-unclaimed')});
    $modal.find('.hidden-member').val($this.parents('tr').data('member'));
    $modal.find('.member-name').html($this.parents('tr').data('name'));
    $modal.modal('show');
});

$(document).on('click','.btn-submit-threshold-claim', function (e) {
    e.preventDefault();
    var $form = $('.form-claim-threshold-exceeded');
    $.ajax({
        type : 'POST',
        url  : $form.attr('action'),
        data : $form.serialize(),
        async: false,
        success: function (response) {
            var res = $.parseJSON(response);
            if(res) {
                typeAlertRedirect('Success','Threshold claimed successfully','success','');
            }else {
                typeAlert('Error','Sorry! Threshold cannot be claimed at this moment','error');
                $('.modal-claim-threshold-exceeded').modal('hide');
            }
        }
    });
});