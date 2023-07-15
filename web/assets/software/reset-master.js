$(document).on('click', '.master-reset', function (e) {
	e.preventDefault();
	$.ajax({
		url : baseUrl + '/common/master-reset',
		async: false,
		success: function (response) {
			location.reload();
		}
	});
});