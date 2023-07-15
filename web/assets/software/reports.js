
/* --- script for nepali date --- */

$(document).on('click', '.sort-by-go', function (e) {
    e.preventDefault(); 
    var url = document.URL;
    url = url.split("#"); 
    var split_url = url[0].split("?"); 
    var from = $(this).parents('.nepali-bs-date').find('.date-from').val();
    var to = $(this).parents('.nepali-bs-date').find('.date-to').val();
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

$(document).on('click', '.sort-by-id', function (e) {
    e.preventDefault(); 

    var url = document.URL;
    url = url.split("#"); 
    var split_url = url[0].split("?"); 
    var from = $(this).parents('.nepali-bs-date').find('.date-from').val();
    var to = $(this).parents('.nepali-bs-date').find('.date-to').val();
  
    if (from != '') {
        if (to != '') {
            var go = split_url[0] + '?' + split_url[1] + '&from=' + from + '&to=' + to;
        }
        else {
            var go = split_url[0] + '?' + split_url[1] + '&from=' + from;
        }
    }
    else if (to != '' && from == '')  {
        var go = split_url[0] + '?'+split_url[1]+'&to=' + to;
    }
    else {
        var go = split_url[0] + '?' + split_url[1];
    }
    window.location.href = go;
});

$(document).on('change', '.sort-by', function (e) {

    e.preventDefault(); 
    var url = document.URL;
    url = url.split("#"); 
    var split_url = url[0].split("?"); 
    if ($(this).val() != '') {
        var go = split_url[0] + '?by=' + $(this).val();
    }
    else {
        var go = split_url[0];
    }
    window.location.href = go;
});
$(document).on('change', '.sort-by-client', function (e) {
    console.log(e)
    e.preventDefault(); 
    var url = document.URL;
    url = url.split("#"); 
    var split_url = url[0].split("?"); 
    if ($(this).val() != '') {
        var go = split_url[0] + '?client=' + $(this).val();
    }
    else {
        var go = split_url[0];
    }
    window.location.href = go;
});

var getUrlParameter = function getUrlParameter(sParam) {
    var sPageURL = decodeURIComponent(window.location.search.substring(1)),
        sURLVariables = sPageURL.split('&'),
        sParameterName,
        i;

    for (i = 0; i < sURLVariables.length; i++) {
        sParameterName = sURLVariables[i].split('=');

        if (sParameterName[0] === sParam) {
            return sParameterName[1] === undefined ? true : sParameterName[1];
        }
    }
};
/* --- script for nepali date --- */