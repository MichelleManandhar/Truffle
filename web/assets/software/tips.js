$(document).on('submit' , '.add-tips' , function (e) {
	e.preventDefault();
	if( $(this).find('.tips-amount').val() < 0 ) {
		$(this).find('.tips-amount').val(0);
		basicAlert('Error!', 'Tip amount cannot be negative', 'error');
		return false;
	}
	$.ajax({
		type : 'POST',
		url  : baseUrl + '/order/add-tips',
		data : $(this).serialize(),
		async: false,
		success: function (response) {
			var data = $.parseJSON(response);
			if(data == true){
				$('.modal-tips').modal('hide');
				typeAlert('success!', 'Tips amount has been added', 'success', '');
			}else {
				$('.modal-tips').modal('hide');
				typeAlert('Something went wrong!', 'Cannot add tips amount at this moment', 'error', '');
			}
		}
	});
});

$('.modal-tips').on('hidden.bs.modal', function () { 
    $('.add-tips')[0].reset();
});

$(document).on('submit' , '.distribute-tips' , function (e) {
	e.preventDefault();
	if($('.tips-to-distribute').val() > $('.total-tips').val() - $('.total-distributed-tips').val()) {
		basicAlert('Cannot distribute excess tip amount', '', 'info');
		return false;
	}
	$.ajax({
		type : 'POST',
		url  : $(this).attr('action'),
		data : $(this).serialize(),
		async: false,
		success: function (response) {
			var data = $.parseJSON(response);
			if(data != false) {
				typeAlertRedirect('success!', 'Tips has been distributed', 'success', '');
			}
		}
	});
});