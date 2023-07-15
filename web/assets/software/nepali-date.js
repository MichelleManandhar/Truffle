
$('.date-conversion .to-BS').each(function (i, val) {
    $(this).html(changedate(AD2BS($(this).data('date'))));
});

$('#nepaliDate9').nepaliDatePicker({
    ndpEnglishInput: 'englishDate',
    onChange: function () {
        $('#hiddennepaliDate9').val(changedate(BS2AD($('#nepaliDate9').val())));
    }
});
$('#nepaliDate8').nepaliDatePicker({
    ndpEnglishInput: 'englishDate',
    onChange: function () {
        $('#hiddennepaliDate8').val(changedate(BS2AD($('#nepaliDate8').val())));
    }
});

$('.show-nepali-date').each(function () {
    if($(this).data('init') != null) {
        $(this).val(changedate(AD2BS($(this).data('init'))));
    }
});

function changedatereverse(date) {
    return date.split("-").reverse().join("-");
}

function changedate(date) {
    return date.split("-").join("-");
}