
/*for sorting floor/section*/
var $sort = $( "#sortable-floor");
$sort.sortable();
$sort.on('sortupdate', function() {
    var height_offset = 60; /*parseFloat($('.site-navbar').css('height'));*/
    var addition_height_offset = 5; 
    /*var ratio = parseFloat($area.css('height')) + height_offset;*/
    /*var top   = unit_fix(parseFloat($drag.css('top')) + (ratio * (parseInt(data.floor)-1) + addition_height_offset), 'top');*/
    
    $.ajax({ 
        data: $(this).sortable('serialize')+'&screen_height='+$(window).height()+'&height_offset='+height_offset+'&addition_height_offset='+addition_height_offset,
        url : $(this).data('url'),
        type: 'GET',
        async: false,
        success : function (response) {
            var data = $.parseJSON(response);
            if (data == true) { 
                $('#sorting-msg').html('<span class="label label-outline label-success font-size-15">Section ordered</span>');
            } else {
                $('#sorting-msg').html('<span class="label label-outline label-danger font-size-15">Sorry, could not update the section order.</span>');
            }
            $('#sorting-msg span').fadeIn(3000).delay(1500).fadeOut("slow");
        },
        error : function (response) {
            $('#sorting-msg').html('<span class="label label-outline label-danger font-size-15">Error, Something went wrong.</span>');
            $('#sorting-msg span').fadeIn(3000).delay(1500).fadeOut("slow");
        }
    });
});
$sort.trigger('sortupdate');
$sort.disableSelection();

function unit_fix(pixel, type) {
    if (type == 'width' || type == 'left') {
        var main = $( window ).width();
    }
    else if (type == 'height' || type == 'top') {
        var main = $( window ).height();
    }
    else {
        return false;
    }
    return ( parseFloat(pixel)  * 100 ) / main;
}