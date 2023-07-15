
var tapped=false;
$(document).on('touchstart', '.table-tab', function (e) {
    var $this = $(this);
    if(!tapped){ /*if tap is not set, set up single tap*/
        tapped=setTimeout(function(){
            tapped=null

            var status  = $this.find('.tb-detail-status').val(); 
            var table   = $this.find('.tb-detail-table').val();
            var floor   = $this.find('.tb-detail-floor').val();
            var name    = $this.find('.tb-detail-name').val();
            var occupy  = $this.find('.tb-occupy').val();

            $('.hidden-table-name').val(name);
            $('.hidden-table-id').val(table);
            $('.hidden-floor-id').val(floor);
            $('.hidden-status').val(status);
            $('.hidden-occupy-id').val(occupy);

            if (status == 1) {
                $('.btn-occupy').hide();
                $('.btn-move-table').show();
                $('.btn-close-table').show();
                $('.btn-view-table').show().prop('href', baseUrl+'/' + version + '/?occid='+occupy);
            }
            else {
                $('.btn-occupy').show();
                $('.btn-move-table').hide();
                $('.btn-close-table').hide();
                $('.btn-view-table').hide().prop('href', '');
            }

            $('.table-option').modal('show');

          /*insert things you want to do when single tapped*/
        },300);   /*wait 300ms then run single click code*/
    } else {    /*tapped within 300ms of last tap. double tap*/
        clearTimeout(tapped); /*stop single tap callback*/
        tapped=null;
        /*insert things you want to do when double tapped*/
    }
});