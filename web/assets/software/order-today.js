
$(document).on('changed.bs.select','.sort-by-client',function(e){
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
})