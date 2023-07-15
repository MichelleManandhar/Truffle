/*
 * author : gaurav maharjan
 */

function navigateAway() {
    window.onbeforeunload = function () {
        if ($('#generalData').data('change') == '1') {
            return 'You have not saved your data yet. Do you wish to continue ? ';
        }
        else {
            return NULL;
        }
    };
}

function formatAMPM(date) {
    var hours = date.getHours();
    var minutes = date.getMinutes();
    var ampm = hours >= 12 ? 'PM' : 'AM';
    hours = hours % 12;
    hours = hours ? hours : 12; // the hour '0' should be '12'
    minutes = minutes < 10 ? '0'+minutes : minutes;
    var strTime = hours + ':' + minutes + ' ' + ampm;
    return strTime;
}

function changedate(date) {
    return date.split("-").join("-");
}

function numberFormat(val) {
    var num = Math.round(Number(val) * 100) / 100;
    var parts = val.toString().split(".");
    var tail = (parts[1] ? "." + ((parts[1].length > 2) ? Math.ceil(parseInt(parts[1].substr(0, 3)) / 10) : parts[1]) : ".00");
    return parts[0].replace(/\B(?=(\d{3})+(?!\d))/g, ",") + tail;
}

// Convert to words
var th = ['', 'thousand', 'million', 'billion', 'trillion'];
var dg = ['zero', 'one', 'two', 'three', 'four', 'five', 'six', 'seven', 'eight', 'nine'];
var tn = ['ten', 'eleven', 'twelve', 'thirteen', 'fourteen', 'fifteen', 'sixteen', 'seventeen', 'eighteen', 'nineteen'];
var tw = ['twenty', 'thirty', 'forty', 'fifty', 'sixty', 'seventy', 'eighty', 'ninety'];

function toWordsEu(s) {
    s = s.toString();
    s = s.replace(/[\, ]/g, '');
    if (s != parseFloat(s))
        return 'not a number';
    var x = s.indexOf('.');
    if (x == -1)
        x = s.length;
    if (x > 15)
        return 'too big';
    var n = s.split('');
    var str = '';
    var sk = 0;
    for (var i = 0; i < x; i++) {
        if ((x - i) % 3 == 2) {
            if (n[i] == '1') {
                str += tn[Number(n[i + 1])] + ' ';
                i++;
                sk = 1;
            } else if (n[i] != 0) {
                str += tw[n[i] - 2] + ' ';
                sk = 1;
            }
        } else if (n[i] != 0) {
            str += dg[n[i]] + ' ';
            if ((x - i) % 3 == 0)
                str += 'hundred ';
            sk = 1;
        }
        if ((x - i) % 3 == 1) {
            if (sk)
                str += th[(x - i - 1) / 3] + ' ';
            sk = 0;
        }
    }
    if (x != s.length) {
        var y = s.length;
        str += 'point ';
        for (var i = x + 1; i < y; i++)
            str += dg[n[i]] + ' ';
    }
    str = str.replace(/\s+/g, ' ');
    str = str.toLowerCase().replace(/\b[a-z]/g, function (letter) {
        return letter.toUpperCase();
    });
    return str + 'Only';
}
// End of Convert

function initooltips() {
    jQuery('.tooltips').tooltip({container: 'body'});
}

function validEmail(email) {
    var filter = /^\s*[\w\-\+_]+(\.[\w\-\+_]+)*\@[\w\-\+_]+\.[\w\-\+_]+(\.[\w\-\+_]+)*\s*$/;
    return String(email).search(filter) != -1;
}

function info(msgTitle, msgText) {
    swal({
        title: msgTitle,
        text: msgText,
        type: 'info',
        allowOutsideClick : true,
        showConfirmButton : false
    });
}

function success(msgTitle, msgText) {
    swal({
        title: msgTitle,
        text: msgText,
        type: 'success',
        allowOutsideClick : true,
        showConfirmButton : false
    });
}

function basicAlert(msgTitle, msgText) {
    swal({
        title: msgTitle,
        text: msgText,
        confirmButtonColor: "#007AFF"
    });
}

function typeAlert(msgTitle, msgText, msgType) {
    //type => "success" or "warning" or "info"
    swal({
        title: msgTitle,
        text: msgText,
        type: msgType,
        confirmButtonColor: "#007AFF"
    });
}

function typeAlertRedirect(msgTitle, msgText, msgType, url) {
    //type => "success" or "warning" or "info"
    swal({
        title: msgTitle,
        text: msgText,
        type: msgType,
        showCancelButton: false,
        confirmButtonColor: "#007AFF",
        confirmButtonText: "OK",
        closeOnConfirm: false
    }, function() {  
        if (url != '') {
            window.location.href = url;
        } else {
            window.location.reload();
        }
    });
}

function basicConfirm(msgTitle, msgText, btnText, successTitle, successMsg) {

    swal({
        title: msgTitle,
        text: msgText,
        type: "warning",
        showCancelButton: true,
        confirmButtonColor: "rgb(0, 122, 255)",
        confirmButtonText: btnText,
        closeOnConfirm: false
    }, function() { 
        swal(successTitle, successMsg, "success");
    });
}

function advConfirm(msgTitle, msgText, btnConfirmText, btnCancelText, successTitle, successMsg, cancelledTitle, cancelledMsg) {
    swal({   
        title: msgTitle,
        text: msgText,
        type: "warning",
        showCancelButton: true,
        confirmButtonColor: "#007AFF",
        confirmButtonText: btnConfirmText,  
        cancelButtonText: btnCancelText,   
        closeOnConfirm: false,   
        closeOnCancel: false 
    }, function(isConfirm){   
        if (isConfirm) {     
            swal(successTitle, successMsg, "success");  
        } else {     
            swal(cancelledTitle, cancelledMsg, "error");   
        } 
    });
}

function initEditable() { 
    //defaults
    $.fn.editable.defaults.mode = 'popover'; //inline
    $.fn.editable.defaults.error = function (response) { 
        var data = $.parseJSON(response);
        typeAlert('Error!', 'Sorry! Could not update the data at this time', 'warning');
    }
    
    $.fn.editable.defaults.display = function (value, response) { 
        if (response != null) {
            var data = $.parseJSON(response);
            $(this).html(data.display_value);
            //$(this).attr("data-params", "{old_value:'"+data.display_value+"'}"); // not working
            //$(this).parents('td').find('.editable-input').find('input').val('');
        }
    }
    
    $.fn.editable.defaults.success = function (response) { 
        var data = $.parseJSON(response);
        if (data.status == 'success') {
           
            // $(this).parents('td').find('.editable-input').find('input').val('');
            // typeAlert('Great', data.msg, 'success');
            
            if(data.special_item == true) {
                console.log($(this).parents('tr').find('.select-special-item').data('price'));
                $(this).parents('tr').find('.select-special-item').data('price', data.display_value);
                if($(this).parents('.modal-special-order').find('.selected-special-item-list .listed-special-item').length > 0) {
                    $(this).parents('.modal-special-order').find('.selected-special-item-list .listed-special-item').each( function () {
                        if($(this).data('item-id') == data.special_item_id) {
                            $(this).find('.special-item-price').val(data.display_value);
                        }
                    });
                }
            }

            if (data.target == true) {
                $(this).parents('tr').find('.edited-on').html(data.edited_on);
                $(this).parents('tr').find('.edited-by').html(data.edited_by);
            }
        }
        else {
            typeAlert('Error', data.msg, 'warning');
        }
    }

    $('.editable-text').editable({
        validate: function(value) {
           if ($.trim(value) == '') return 'This field is required';
        }
    });

    $('.editable-number').editable({
        //mode: 'inline',
        validate: function(value) {
           if ($.trim(value) == '') {return 'This field is required';}
           else if (isNaN($.trim(value))) {return 'Please enter valid number.';}
        }
    });

    $('.editable-pan-number').editable({
        //mode: 'inline',
        validate: function(value) {
           if ($.trim(value) == '') {return 'This field is required';}
           else if (isNaN($.trim(value))) {return 'Please enter valid number.';}
           else if($.trim(value).length > 9 || $.trim(value).length < 9 ) {return 'Pan number should be exact 9 digits.';}
        }
    });

    $('.editable-email').editable({
        //mode: 'inline',
        validate: function(value) { 
            var pattern = "/^\w+@[a-zA-Z_]+?\.[a-zA-Z]{2,3}$/";
            if ($.trim(value) == '') {return 'This field is required';}
            else if (!validEmail($.trim(value))) {return 'Please enter valid email.';}
        }
    });

    $('.editable-textarea').editable({
        type:  'textarea',
        showbuttons: 'bottom',
        validate: function(value) {
           if ($.trim(value) == '') { return 'This field is required'; }
        }
    });

    $('.editable-select-active').editable({
        display: function(value, sourceData) {
             var colors = {"": "gray", 1: "green", 2: "blue"},
                 elem = $.grep(sourceData, function(o){return o.value == value;});
                 
             if(elem.length) {    
                 $(this).text(elem[0].text).css("color", colors[value]); 
             } else {
                 $(this).empty(); 
             }
        }   
    });    
}

function not_available_for_demo() {
    swal({
        title: 'Sorry!',
        text: 'This feature is not available in demo version.',
        type: 'info',
        allowOutsideClick : true,
        showConfirmButton : true
    });
}

function upperFirst(str) {
    string = str.toLowerCase().replace(/\b[a-z]/g, function(letter) {
        return letter.toUpperCase();
    });

    return string;
}
