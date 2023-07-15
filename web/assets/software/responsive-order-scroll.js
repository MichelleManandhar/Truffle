
$(function () {
    $('.scroll-height-420').slimScroll({
        start: $('.slimscrollstart-position'),
        height: '420px'
    });
    $('.scroll-height-530').slimScroll({
        start: $('.slimscrollstart-position'),
        height: '530px'
    });
});

$(document).ready(function() {

	if ($(window).width() > 2500){
		$('.scroll-height-420').slimScroll({
            start: $('.slimscrollstart-position'),
            height: '750px',
        });
        $('.scroll-height-580').slimScroll({
        start: $('.slimscrollstart-position'),
        height: '990px'
    	});
	}

});

