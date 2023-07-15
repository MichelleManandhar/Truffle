
$(document).on('submit', '.menu-category', function (e) {
    e.preventDefault();
    var form = $(this);
    if(form.valid()) {
        submitForm(form);
    }     
});