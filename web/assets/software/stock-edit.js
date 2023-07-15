$(function () {
    $('.scroll-height-600').slimScroll({
        start: $('.slimscrollstart-position'),
        height: '600px',
        color: '#000000',
        alwaysVisible: true,
        size: '8px',
        touchScrollStep : 200,
        distance : '0px',
    });

    $('.scroll-height-350').slimScroll({
        start: $('.slimscrollstart-position'),
        height: '350px',
        alwaysVisible: true
    });
});

$(document).on('submit', '.edit-menu-item-form', function (e) {
    e.preventDefault();
    var form = $(this);
    if(form.valid()) {
        submitForm(form);
    }     
});