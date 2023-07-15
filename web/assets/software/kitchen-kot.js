var kot_interval = null;    
function startKotInterval() {
    kot_interval = setInterval(function(){ location.reload(); }, 30000);
}
function stopKotInterval() {
    clearInterval(kot_interval);
}
startKotInterval();

$('.modal-kot-sorting, .modal-kot-type-sorting')
.on('shown.bs.modal', function (e) {
  	stopKotInterval();
})
.on('hidden.bs.modal', function(e) { 
    startKotInterval();
});

$('.slimscroll-kot').slimScroll({
    start: $('.kot-position'),
    height: '16em',
    alwaysVisible: 'true'
});

$('.btn-sort').click(function (e) {
	$('.btn-sort').removeClass('btn-success');
	$(this).addClass('btn-success');
	var active = $(this).data('tab');
	$('.sort-pane').removeClass('active');
	$('#'+active).addClass('active');
});

$(document).on('click', '.remove-kot', function (e) {
	e.preventDefault();
	var $this = $(this);

	msgText     = 'Do you want to remove this KOT?';
    errorMsg    = 'Sorry, Could not remove the KOT at this time. Please try again.';
    swal({
        title: 'Are You Sure?',
        text: msgText,
        type: "warning",
        showCancelButton: true,
        confirmButtonColor: "rgb(190, 92, 73)",
        confirmButtonText: 'Yes, Remove it.',
        closeOnConfirm: false
    },
    function() {
        swal.close();

        $.ajax({
    		url : baseUrl + '/kot/change-kitchen-status',
    		type: 'post',
    		data : {id: $this.data('id')},
    		success: function (response) {
    			var data = $.parseJSON(response);
    			if (data == true) {
    				$this.parents('.sticky-item').remove();
    			}
    			else {
    				typeAlert('Error!', errorMsg, 'warning');
    			}
    		}
    	});
    });
});

$(document).on('click', '.remove-kot-item', function (e) {
	e.preventDefault();
	var $this = $(this);

	msgText     = 'Do you want to remove this KOT Item?';
    errorMsg    = 'Sorry, Could not remove the KOT Item at this time. Please try again.';
    swal({
        title: 'Are You Sure?',
        text: msgText,
        type: "warning",
        showCancelButton: true,
        confirmButtonColor: "rgb(190, 92, 73)",
        confirmButtonText: 'Yes, Remove it.',
        closeOnConfirm: false
    },
    function() {
        swal.close();

        $.ajax({
    		url : baseUrl + '/kot/change-kitchen-item-status',
    		type: 'post',
    		data : {id: $this.data('id')},
    		success: function (response) {
    			var data = $.parseJSON(response);
    			if (data == true) {
    				$this.parents('.kot-item').remove();
    				window.location.reload();
    			}
    			else {
    				typeAlert('Error!', errorMsg, 'warning');
    			}
    		}
    	});
    });
});


$(document).on('click', '.sorting-by', function (e) {
	e.preventDefault();
	var $this = $(this);
	var $sticky = $('.stickynote .sticky-masonry');
	var type  = $this.data('type');
	var index = $this.data('index');

	switch(type) {
		case 'table':
			$sticky.find('.sticky-item').hide();
			$sticky.find('.sticky-item.table-'+index).show();
			break;

		case 'menu-item':
			$sticky.find('.sticky-item').hide();
			$sticky.find('p.item-'+index).parents('.item-main').show();
			break;

		case 'take-away':
			$sticky.find('.sticky-item').hide();
			$sticky.find('.sticky-item.take-away').show();
			break;

		case 'delivery':
			$sticky.find('.sticky-item').hide();
			$sticky.find('.sticky-item.delivery').show();
			break;
	}
	$('.modal').modal('hide');
});

$(document).on('click', '.refresh-sorting', function (e) {
	e.preventDefault();
	$('.stickynote .sticky-masonry').find('.sticky-item').show();
});