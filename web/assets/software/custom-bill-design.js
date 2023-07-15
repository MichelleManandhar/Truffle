$(document).on('click', '.convert-bill-design', function (e) {
	e.preventDefault();
	var name = $('#company-name-val').val(),
	address = $('#company-address-val').val(),
	phone = $('#company-phone-val').val(),
	reg_no = $('#company-reg-no-val').val(),
	greeting = $('#bill-greeting-note-val').val(),
	bool_greeting = $('#bill-greeting-note').is(':checked');
	
	if (name == '') {
		typeAlert('Warning', 'Please enter your company name in the bill.', 'warning'); return false;
	}
	else if (address == '') {
		typeAlert('Warning', 'Please enter your company address in the bill.', 'warning'); return false;
	}
	else if (phone == '') {
		typeAlert('Warning', 'Please enter your company phone no. in the bill.', 'warning'); return false;
	}
	else if (reg_no == '') {
		typeAlert('Warning', 'Please enter your company registration no. in the bill.', 'warning'); return false;
	}
	else if (bool_greeting && greeting == '') {
		typeAlert('Warning', 'Please enter a greeting note in the bill.', 'warning'); return false;
	}

	$('.company-name-text').html(name),
	$('.company-address-text').html(address),
	$('.company-phone-text').html(phone),
	$('.company-reg-no-text').html(reg_no);
	if (bool_greeting) {
		$('#bill-greeting-note-html').show().find('td span').html(greeting);
	}
	else {
		$('#bill-greeting-note-html').hide().find('td span').html('');
	}

	$('#bill-customer-name').is(':checked') ? $('#bill-customer-name-html').show() : $('#bill-customer-name-html').hide();
	$('#bill-customer-pan').is(':checked') ? $('#bill-customer-pan-html').show() : $('#bill-customer-pan-html').hide();
	$('#bill-amount-in-words').is(':checked') ? $('#bill-amount-in-words-html').show() : $('#bill-amount-in-words-html').hide();
	$('#bill-operator-name').is(':checked') ? $('#bill-operator-name-html').show() : $('#bill-operator-name-html').hide();
	$('#output-design-container').show();
	$('.save-bill-design').show();
});

$(document).on('click','.save-bill-design',function (e) {
	e.preventDefault();
	var form_data = $('.bill-design-form').serialize()+'&width='+$('#test-sample').width();
	$.ajax({
		type : 'POST',
		url  : baseUrl + '/design/save-design',
		data : form_data,
		async: false,
		success: function (response) {
			var res = $.parseJSON(response);
			if(res) {
				typeAlertRedirect('Success', 'Bill design has been saved' , 'success', '');
			}else {
				typeAlertRedirect('Error', 'Something went wrong' , 'error', '');
			}
		}
	});
});

$('select').selectpicker('refresh');

$(document).on('change', '.select-paper-size', function (e) {
	e.preventDefault();
	var size = $(this).val();
	if (size == '0') {
		resize_bill_container();
	}
	else {
		remove_resize_bill_container();
		if (size != '-1') {
			$('#test-sample').css('width', size);
		}
	}
})

$(document).on('click', '.bill-test-print', function (e) {
	e.preventDefault();
	var size = $('.select-paper-size').val();
	if (size == '-1') {
		typeAlert('Warning', 'Please select the paper type for bill print.', 'warning'); return false;
	}
	else if (size == '0') {
		size = parseInt($('#test-sample').css('width'));
	}
	var data = $('#test-sample').html();
	Popup(data, size);
})

function dragMoveListener (event) {
    var target = event.target,
        x = (parseFloat(target.getAttribute('data-x')) || 0) + event.dx,
        y = (parseFloat(target.getAttribute('data-y')) || 0); // + event.dy;
    target.style.webkitTransform = target.style.transform = 'translate(' + x + 'px, ' + y + 'px)';
    target.setAttribute('data-x', x);
    //target.setAttribute('data-y', y);
}
window.dragMoveListener = dragMoveListener;

function resize_bill_container() {
	interact('#test-sample')
	  	.draggable({
		    onmove: window.dragMoveListener,
		    restrict: {
		      	restriction: 'parent',
		      	elementRect: { top: 0, left: 0, bottom: 0, right: 1 }
		    },
	  	})
	  	.resizable({
	    	edges: { left: true, right: true, bottom: false, top: false },
		    restrictEdges: {
		      	outer: 'parent',
		      	endOnly: true,
		    },
	    	inertia: true,
	  	})
	  	.on('resizemove', function (event) {
		    var target = event.target,
		        x = (parseFloat(target.getAttribute('data-x')) || 0),
		        y = (parseFloat(target.getAttribute('data-y')) || 0);

		    if (event.rect.width >= 300 && event.rect.width <= 800) {
		    	target.style.width  = event.rect.width + 'px';
		    }

		    x += event.deltaRect.left;
		    y += event.deltaRect.top;

		    target.style.webkitTransform = target.style.transform = 'translate(' + x + 'px,' + y + 'px)';

		    target.setAttribute('data-x', x);
		    target.setAttribute('data-y', y);
	  	});
}

function remove_resize_bill_container() {
	interact('#test-sample').unset();
}

function Popup(data, size) 
{
    var mywindow = window.open('', 'Automated Bill Print', 'height=600,width=600');
    mywindow.document.write('<html><head><title>Automated Bill Print</title>');
    mywindow.document.write('</head><body style="font-size: 14px; font-weight:200;"><div style="margin:0 auto; width:'+size+'">');
    mywindow.document.write(data);
    mywindow.document.write('</div></body></html>');

    mywindow.document.close();
    mywindow.focus(); 
    mywindow.print();
    mywindow.close();
}