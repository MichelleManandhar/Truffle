$(document).on('click' , '.btn-recovery-database', function (e) {
	e.preventDefault();
	swal({
		title: "Recovery Database",
		text: "Enter Password to Recovery Database",
		type: "input",
		inputType: "password",
		showCancelButton: true,
		closeOnConfirm: false,
		animation: "slide-from-top",
		inputPlaceholder: "Enter Password Here!!!"
	},
	function(inputValue){
		if (inputValue === false) return false;
	  
		if (inputValue === "") {
	    	swal.showInputError("You need to write password!");
	    	return false;
		}

		$.ajax({
  			type : "POST",
  			url  : baseUrl + '/site/check-recovery-password',
  			data : {password : inputValue.trim()},
  			async: false,
  			success: function (response) {
  				var res = $.parseJSON(response);
  				if(res != false) {
  					if(res.status == 'wrong_password') {
  						swal.showInputError(res.msg);
	    				return false;
  					}
  					else{
  						$('.sa-confirm-button-container').append('<svg class="button-loader">'+
								                        '<circle cx="50%" cy="50%" r="8" class="path"/>'+
								                        '<circle cx="50%" cy="50%" r="8" class="fill"/>'+
								                    '</svg>');
	  		
				  		$('.sa-confirm-button-container').find('.confirm').prop('disabled', true);
				  		$('.sa-button-container').find('.cancel').prop('disabled', true);
				  		$('.sa-confirm-button-container').find('.button-loader').css('opacity', '1');

				  		window.location.href = baseUrl + '/site/recovery-database';
  					}
  				}
  			}
  		});
	});
});

$(document).on('click', '.sa-input-error', function () {
	$('.sa-error-container').removeClass('show').addClass('hide');
	$('.sa-input-error').removeClass('show').addClass('hide');
});