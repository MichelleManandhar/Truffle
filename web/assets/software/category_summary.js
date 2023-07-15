
/*$('select').selectpicker('refresh');*/
$('.datepicker').datepicker({format: 'yyyy-mm-dd'});

$(document).on('click', '.sort-by-go', function (e) {
    e.preventDefault();
    var url = document.URL;
    url = url.split("#");
    var split_url = url[0].split("?");
    var from = $(this).parent().find('.date-from').val();
    var to = $(this).parent().find('.date-to').val();
    if (from != '') {
        if (to != '') {
            var go = split_url[0] + '?from=' + from + '&to=' + to;
        }
        else {
            var go = split_url[0] + '?from=' + from;
        }
    }
    else if (to != '' && from == '')  {
        var go = split_url[0] + '?to=' + to;
    }
    else {
        var go = split_url[0];
    }
    window.location.href = go;
});

$(document).on('change', '.sort-by', function (e) {
    e.preventDefault();
    var url = document.URL;
    url = url.split("#");
    var split_url = url[0].split("?");
    if ($(this).val() != 'all') {
        var go = split_url[0] + '?by=' + $(this).val();
    }
    else {
        var go = split_url[0];
    }
    window.location.href = go;
});



/****************************************************************************************************/