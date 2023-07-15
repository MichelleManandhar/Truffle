$('.date-picker').datepicker({
    dateFormat:  "yy-mm-d",
    autoclose: true,
    todayHighlight: true,
    enableOnReadonly : true,
    minDate: $('.fiscal-year-start-date').val(),
	maxDate: "+18M -1D"
});

$(document).on('change','.fiscal-year-end-date', function (e) {
	e.preventDefault();
	console.log($('.fiscal-year-end-date').val());
	console.log($('.fiscal-year-start-date').val());
	if($('.fiscal-year-end-date').val() < $('.fiscal-year-start-date').val()) {
		basicAlert('Info', 'End Date Cannot Be Before Start Date.');
		$('.fiscal-year-end-date').val('');
		return false;
	}
});