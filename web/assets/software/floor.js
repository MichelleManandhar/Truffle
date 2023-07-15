
$(document).one('submit', '.add-floor-form', function (e) {
 	e.preventDefault();

 	$.ajax({
 		type : 'POST',
 		url  : $(this).attr('action'),
 		data : $(this).serialize(),
 		async: false,
 		success: function (response) {
 			var res = $.parseJSON(response);
 			if(res != false) {
 				typeAlertRedirect('Success!', 'New Section has been added', 'success', '');
 			}
 			else {
 				typeAlertRedirect('Error!', 'Sorry ! Something went wrong... Cannot add section at this moment', 'error', '');
 			}
 		}
 	});

 	$('.btn-section').prop('disabled', true);
});