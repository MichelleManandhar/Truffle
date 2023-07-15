/*tapend event for single touch*/
$(document).on('dblclick', '.drag-table-options', function (e) {
    e.preventDefault();
    var $this = $(this);
    var occupy  = $(this).find('.tb-occupy').val(); 
    var status  = $this.find('.tb-detail-status').val();
    if (status == 1) {
        window.location.href = baseUrl+'/' + version + '/?occid='+occupy;
    }
});

$(document).on('submit', '.goto-table-form', function (e) {
    e.preventDefault();
    var form = $(this);
    if(form.valid()) {
        $.ajax({
            url: baseUrl + '/table/goto-table-order',
            data: $(this).serialize(),
            type: 'POST',
            async: false,
            success: function (response) { 
                var data = $.parseJSON(response);
                if(data.status == 'logout') {
                    window.location.href = baseUrl + '/site/logout';
                }
                else if (data.status == 'success') { 
                    window.location.href = baseUrl+'/' + version + '/?occid='+data.value;
                } 
                else if (data.status == 'failed') {
                    typeAlert('Warning', 'This table has not been occuppied yet.', 'warning');
                }
                else {
                    typeAlert('Error', 'Something went wrong. Please try again.', 'error');
                }
            }
        });
    }
});

var tapped=false
$(document).on('touchstart', '.drag-table-options', function (e) {
    var $this = $(this);
    if(!tapped){ /*if tap is not set, set up single tap*/
        tapped=setTimeout(function(){
            tapped=null
          /*insert things you want to do when single tapped*/
        },300);   /*wait 300ms then run single click code*/
    } else {    /*tapped within 300ms of last tap. double tap*/
        clearTimeout(tapped); /*stop single tap callback*/
        tapped=null;
        
        var occupy  = $(this).find('.tb-occupy').val(); 
        var status  = $this.find('.tb-detail-status').val();
        if (status == 1) {
            window.location.href = baseUrl+'/' + version + '/?occid='+occupy;
        }
    }
});