

$(document).on('submit', '.user-form', function (e) {
    e.preventDefault();
    var form = $(this);
    if(form.valid()) {
        submitForm(form);
    }     
});