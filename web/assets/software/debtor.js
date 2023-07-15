
$(document).on('click', '.create-new-debtor', function () {
    $('.modal-add-debtors').modal('show');
});

$(document).one('submit', '.admin-add-debtor', function (e) {
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
                typeAlertRedirect('Success', 'Debtor has been added', 'success', baseUrl+'/debtor/list');
            }
            else{
                typeAlert('Error!', 'Something went wrong', 'warning');
            }
        }
    });
});

$(document).on('submit', '.add-debtor', function (e) {
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
                $('.modal-debtors-list').modal('hide');
                $('.debtor-txt').val(res.debtor_name);
                $('.hidden-debtor-id').val(res.debtor_id);
                $this[0].reset();;
            }
            else{
                typeAlert('Error!', 'Something went wrong', 'warning');
            }
        }
    });
});

$(document).on('blur', '.debtor-txt', function (e) {
    e.preventDefault();
    var $this = $(this);
    var debtor_id = $this.parents('.form-group').find('.hidden-debtor-id').val();
    $.ajax({
        type : 'POST',
        url  : baseUrl + '/debtor/find-credit',
        data : {debtor_id : debtor_id},
        async:false,
        success: function (response) {
            var res = $.parseJSON(response);
            if(res != false){
                var credit_amount = res.debtor.credit_amount;
                $this.parents('.debtor-payment').find('.credit-remaining').val(parseFloat(credit_amount).toFixed(2));
            }
        }
    });
});

$(document).on('blur', '.paid-amount', function (e) {
    e.preventDefault();
    var $this = $(this);
    var paid_amount = $this.val();
    var credit_remaining = $this.parents('.debtor-payment').find('.credit-remaining').val();
    if(parseInt(credit_remaining) < paid_amount){
        basicAlert('Your credit amount is less than paid amount' , '' , 'info');
    }
});

$(document).on('click', '.cash-payment', function (e) {
    $('.number-cheque').hide();
    $('.hidden-payment-type').val('0');
});

$(document).on('click', '.card-payment', function (e) {
    $('.number-cheque').hide();
    $('.hidden-payment-type').val('2');
});

$(document).on('click', '.cheque-payment', function (e) {
    $('.number-cheque').show();
    $('.hidden-payment-type').val('1');
});

$(document).on('click', '.credit-order', function (e) {
    e.preventDefault();
    var $this = $(this);

    if ($this.parents('.print-bill').find('.debtor-txt').val() == '') {
        basicAlert('Debtor need to be selected.', '', 'info');
        return false;
    }
    var new_customer_pax = 0;
    if ($this.parents('.print-bill').length) {
        var $order = $('.order-desk');
        var new_customer_pax = 0;
        if($order.find('.customer-pax').length > 0 && $order.find('.customer-pax').val() == '') {
            var $exchange = $('.modal-exchange');
            $exchange.modal('hide');

            bootbox.prompt({
                title: "<h2 class="+'text-center'+">Pax cannot be empty</h2> <p class="+'text-center'+">Please enter pax here</p>",
                inputType: 'number',
                buttons: {
                    confirm: {
                        label: 'Yes, Proceed.',
                        className: 'btn-primary'
                    },
                    cancel: {
                        label: 'Cancel',
                        className: 'btn-default'
                    }
                },
                callback: function (result) {
                    $('.bootbox-input-number').parents('.bootbox-form').find('.error').remove();
                    if (result === null) {
                        $('div').remove('.custom-bootbox-overlay');
                        $('.bootbox-prompt').modal('hide');
                        return false;
                    }  
                    if (result === false) {
                        return false;
                    }      
                    if (result === "") {  
                        $('.bootbox-input-number').after("<span class='error'>You need to enter pax to proceed! <i class='icon fa-remove remove-error'></i></span>");
                        return false   
                    } 
                    new_customer_pax = result;

                    makeCreditOrder($this, new_customer_pax);
                }
            });

            $('.bootbox-input-number').attr('placeholder', 'Please enter pax');
            $('.bootbox').before('<div class="custom-bootbox-overlay"></div>');
        }else{
            if($('.member-id').val() != '') {
                $.ajax({
                    type: 'POST',
                    url : baseUrl+'/member/set-threshold-exceeded',
                    data: {member:$('.member-id').val(), current_paid_amount : $('.main-total').val()},
                    async:false,
                    success:function (response) {
                        var data = $.parseJSON(response);
                        if(data) {
                            if(data.threshold_end_amount_exceeded > 0) {
                                toastr.info("Threshold End Amount has been exceeded", 'Alert! ');
                            }
                            else if(data.threshold_amount_exceeded > 0) {
                                toastr.info("Threshold Amount has been exceeded", 'Alert! ');
                            }
                        }
                    }
                });
                setTimeout(function(){ 
                    makeCreditOrder($this, new_customer_pax);
                }, 3000);
            }
            else {
                makeCreditOrder($this, new_customer_pax);
            }
        }
    }

    if ($this.parents('.item-wise-payment-desk').length) {

        if ($('.item-wise-payment-desk').find('.main-total').val() == 0) {
            basicAlert('Cannot pay empty bill.', '', 'info');
            return false;
        }

        if (Math.round($('.remaining-total').val()) == Math.round($('.item-wise-payment-desk').find('.main-total').val())) {
            basicAlert('Cannot make full payment here.', '', 'info');
            return false;
        }

        if ($('.item-wise-payment-desk').find('.debtor-txt').val() == '') {
            basicAlert('Debtor need to be selected.', '', 'info');
            return false;
        }
        $('.item-wise-payment-modal').modal('hide');

        var amount_required = $this.parents('.item-wise-payment-desk').find('.main-total').val();
        var debtor_name     = $this.parents('.item-wise-payment-desk').find('.debtor-txt').val();
        var debtor_id       = $this.parents('.item-wise-payment-desk').find('.hidden-debtor-id').val();
        var form            = $('.item-wise-payment-desk').serialize() + '&debtor_id=' + debtor_id + '&amount_required=' + amount_required + '&type=item_wise_payment';

        $.ajax({
            type : 'POST',
            url  : baseUrl + '/debtor/item-wise-credit',
            data : form,
            async: true,
            success: function (response) {
                var data = $.parseJSON(response);
                if(data != false) {
                    if(data.status == 'empty_order') {
                        basicAlert(data.msg , '' , 'info');
                    }
                    else if(data.status == 'no_debtor') {
                        basicAlert(data.msg , '' , 'info');
                    }
                    else{
                        typeAlertRedirect('Success!', 'Item wise credit made successfully.', 'success', '');
                    }
                }
                else {
                   typeAlertRedirect('Error!', 'Could not place the order at this time. Please try again.', 'error', '');
                }
            }
        });
    } 
});

function makeCreditOrder($this, new_customer_pax) {
    //$('.print-loading-modal').modal('show');
    $('.modal-exchange').modal('hide');
    var action_type     = $this.data('type');
    var amount_required = $this.parents('.print-bill').find('.amount-required').val();
    var debtor_name     = $this.parents('.print-bill').find('.debtor-txt').val();
    var debtor_id       = $this.parents('.print-bill').find('.hidden-debtor-id').val();
    var form            = $('.order-desk').serialize() + '&debtor_id=' + debtor_id + '&amount_required=' + amount_required + '&new_customer_pax=' + new_customer_pax;

    $.ajax({
        type: 'POST',
        data: form,
        url: baseUrl + '/debtor/add-credit-amount',
        async: false,
        success: function (response) {
            var data = $.parseJSON(response);
            if(data != false) {
                //$('.print-loading-modal').modal('hide');

                if(data.status == 'empty_order') {
                    basicAlert(data.msg , '' , 'info');
                }
                else if(data.status == 'no_debtor') {
                    basicAlert(data.msg , '' , 'info');
                }
                else{
                    if (data.url == '' , data.key == '' , data.value == '') {
                        typeAlertRedirect('Success!', 'Item wise payment made successfully.', 'success', '');
                    }
                    else {
                        var url = data.url;
                        var key = data.key;
                        var value = data.value;

                        var next_max_inv = parseInt(data.invoice) + 1;
                        $('.max-inv').val(next_max_inv);
                        $('.max-inv-text').html('Invoice no.: '+next_max_inv);

                        var $form = $('.order-desk');
                        $('.empty-this').val('');
                        $form.find('.zero-this').val(0);
                        $form.find('.zero-price').html(currency+' 0');
                        $form.find('.round-value').html('(0)');
                        $form.find('.order-list').html('');

                        $('.discount-form .discount').val(0);
                        $('.discount').trigger("touchspin.updatesettings", {max: 0});
                        $('.discount-form .discount-amount').val(0);
                        $('.discount-form').hide();
                        $('.apply-discount').html('<i class="icon fa-ticket"></i>');
                        $('.apply-discount').addClass('not');

                        $('.modal-exchange').modal('hide');
                        
                        $('.all-kot-list').remove();

                        if(action_type == 'save_and_close'){
                            var id = $('.hidden-occupy-id').val();
                            var table = $('.hidden-table-id').val();

                            $.ajax({
                                url: baseUrl + '/table/close-table',
                                type: 'POST',
                                data: {id: id, table: table},
                                async: false,
                                success: function (response) {
                                    var data = $.parseJSON(response);
                                    $('.modal').modal('hide');
                                    if (data == true) {
                                        window.location.href = baseUrl + '/table';
                                    }
                                    else if (data.error != null) {
                                        typeAlert('Error!', data.error, 'warning'); return false;
                                    }
                                    else {
                                        typeAlert('Error!', 'Could not close the table at this moment. Please try again later.', 'warning'); return false;
                                    }
                                }
                            });
                        }else{
                            if(key == 'tid' || key == 'did') {
                                typeAlertRedirect('Success', 'Debtor amount updated', 'success', baseUrl+'/table'); 
                            }else{
                                typeAlertRedirect('Success', 'Debtor amount updated', 'success', baseUrl+'/'+ url +'/?'+ key +'='+ value); 
                            }
                        }      
                    }
                }
            }else{
                typeAlert('Error!', 'Something went wron... Cannot make order at this moment', 'warning');
            }

        }
    });
}

$(document).on('submit' , '.debtor-make-payment' , function (e) {
    e.preventDefault();
    var $form = $('.debtor-make-payment');

    if($(this).find('.payment-amount').val() < 0 || $(this).find('.payment-amount').val() == 0 || $(this).find('.payment-amount').val() == '') {
        basicAlert('Enter amount to pay' , '' , 'info');
        return false;
    }
    if(($form.find('.total-remaining-amount').val() - $form.find('.payment-amount').val()) < 0) {
        basicAlert('No remaining amount to pay' , '' , 'info');
        return false;
    }
    //$('.print-loading-modal').modal('show');
    $.ajax({
        type : 'POST',
        url  : baseUrl + '/debtor/make-payment',
        data : $form.serialize(),
        async: true,
        success: function (response) {
            var data = $.parseJSON(response);
            var $debtor_payment_desk = $('.debtor-make-payment');
            var total_bill_amount = $debtor_payment_desk.find('.total-bill-amount').val();
            var total_paid_amount = parseFloat($debtor_payment_desk.find('.total-paid-amount').val()) + parseFloat(data.paid_amount);
            $debtor_payment_desk.find('.total-paid-amount').val(total_paid_amount);
            $debtor_payment_desk.find('.total-remaining-amount').val(total_bill_amount - total_paid_amount);
            $debtor_payment_desk.find('.payment-amount').val('');
            $('.cheque-number').val('');
            //$('.print-loading-modal').modal('hide');

            typeAlertRedirect('Success', 'Debtor amount paid', 'success','');

        }
    });
});

$(document).on('submit' , '.debtor-payment-return' , function (e) {
    e.preventDefault();
    var $form = $('.debtor-payment-return');

    if($(this).find('.total-amount-to-return').val() == 0 || $(this).find('.total-amount-to-return').val() == '') {
        basicAlert('No amount to be returned' , '' , 'info');
        return false;
    }
    if(($form.find('.total-amount-to-return').val() - $form.find('.returned-amount').val()) < 0) {
        basicAlert('Cannot return more amount' , '' , 'info');
        return false;
    }
    //$('.print-loading-modal').modal('show');
    $.ajax({
        type : 'POST',
        url  : baseUrl + '/debtor/payment-return',
        data : $form.serialize(),
        async: true,
        success: function (response) {
            var data = $.parseJSON(response);
            //$('.print-loading-modal').modal('hide');

            var $receipt = $('#receipt-content');
            $receipt.find('.receipt-date').html(data.date);
            $receipt.find('.receipt-number').html(data.receipt_no);
            $receipt.find('.debtor-name').html(data.debtor_name);
            $receipt.find('.receipt-message').html(' Payment return to M/S ');
            $receipt.find('.receipt-amount-in-word').html(toWordsEu(data.amount));
            $receipt.find('.cash').html('Cash/Card');

            $receipt.find('.receipt-total-amount').html(data.amount);
            Popup($receipt.html(),bill_config.width);

            typeAlertRedirect('Success', 'Payment return has been made successfully made', 'success', '');
        }
    });
});

$(document).on('click' , '.close-add-debtor-modal-btn' , function (e) {
    e.preventDefault();
    $('.form-group').each(function () { $(this).removeClass('has-error'); });
    $('.help-block').each(function () { $(this).remove(); });
    $('.form-group').each(function () { $(this).removeClass('has-success'); });
    $(this).parents('.modal-add-debtors').find('.admin-add-debtor')[0].reset();
    $(this).parents('.modal-add-debtors').modal('toggle');
});

$(document).on('click' , '.close-debtor-payment-modal-btn' , function (e) {
    e.preventDefault();
    $('.form-group').each(function () { $(this).removeClass('has-error'); });
    $('.form-group').each(function () { $(this).removeClass('has-success'); });
    $('.help-block').each(function () { $(this).remove(); });
    $(this).parents('.modal').find('.debtor-payment')[0].reset();
    $('.number-cheque').hide();
    $(this).parents('.modal').modal('toggle');
});

$('.modal-debtors-list').on('hidden.bs.modal', function () { 
    $('.add-debtor')[0].reset();
    $('.form-group').each(function () { $(this).removeClass('has-error'); });
    $('.form-group').each(function () { $(this).removeClass('has-success'); });
    $('.help-block').each(function () { $(this).remove(); });
});