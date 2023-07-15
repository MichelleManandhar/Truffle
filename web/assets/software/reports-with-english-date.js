
/* --- script for english date --- */
$('select').selectpicker('refresh');
$('.datepicker').datepicker({format: 'yyyy-mm-dd'});
// Change Here
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

    //Check Client
    var client = new URLSearchParams(window.location.search).get("client");
    if(client){
   
        go = go + '&client=' + client; 
    }
    window.location.href = go;
});

$(document).on('click', '.sort-by-id', function (e) {
    e.preventDefault(); 
    
    var url = document.URL;
    url = url.split("#"); 
    var split_url = url[0].split("?"); 
    var from = $(this).parent().find('.date-from').val();
    var to = $(this).parent().find('.date-to').val();
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
    //Check Client
    var client = new URLSearchParams(window.location.search).get("client");
    if(client){
   
        go = go + '&client=' + client; 
    }
    
    window.location.href = go;
});
$(document).on('changed.bs.select', '.sort-by-client', function (e) {
    // console.log(e)
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
    //Check Date
    var by = new URLSearchParams(window.location.search).get("by");

    var from = new URLSearchParams(window.location.search).get("from");
    var to = new URLSearchParams(window.location.search).get("to");
    if(by){
        go = go + '&by=' + by;
    }
    else if(from && to){
    
        go = go + '&from=' + from;
        go = go + '&to=' + to; 

    }
    window.location.href = go;
});

/* --- script for english date --- */