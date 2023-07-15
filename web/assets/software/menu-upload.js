$(document).on('submit', '.menu-item', function (e) {
    e.preventDefault();
    var form = $(this);
    if(form.valid()) {
        submitForm(form);
    }     
});

uploadExcelFile();