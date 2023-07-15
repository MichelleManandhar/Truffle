/*
 * author : gaurav maharjan
 */

function uploads() {
    $(function () {
        $input = $(".image-upload");
        $input.fileinput({
            maxFileSize: 6400, // in kb
            uploadUrl: baseUrl+"/common/upload-files/", // server upload action
            uploadAsync: true,
            allowedFileExtensions: ['jpg', 'png', 'gif', 'jpeg', 'xlsx'],
            maxFileCount: 1,
            showUpload: true,
            dropZoneEnabled: true,
            uploadExtraData: {'_csrf': $('meta[name=csrf-token]').prop('content')}
        });

        // CATCH RESPONSE
        $input.on('fileuploaderror', function(event, data, previewId, index) {
            var form = data.form, files = data.files, extra = data.extra, 
            response = data.response, reader = data.reader;
            // console.log(data.response.upload_error);
        });

        $input.on('fileuploaded', function(event, data, previewId, index) { 
            var form = data.form, files = data.files, extra = data.extra, 
            response = data.response, reader = data.reader;
            $(this).parents('.image-parent').find('.image-val').val(response.filename);
        });
    });
}

function profile_uploads() {
    $(function () {
        $input = $(".profile-image-upload");
        $input.fileinput({
            maxFileSize: 6400, // in kb
            uploadUrl: baseUrl+"/common/profile-upload-files/", // server upload action
            uploadAsync: true,
            allowedFileExtensions: ['jpg', 'png', 'gif', 'jpeg'],
            maxFileCount: 1,
            showUpload: true,
            dropZoneEnabled: true,
            uploadExtraData: {'_csrf': $('meta[name=csrf-token]').prop('content')}
        });

        // CATCH RESPONSE
        $input.on('fileuploaderror', function(event, data, previewId, index) {
            var form = data.form, files = data.files, extra = data.extra,
                response = data.response, reader = data.reader;
            // console.log(data.response.upload_error);
        });

        $input.on('fileuploaded', function(event, data, previewId, index) {
            var form = data.form, files = data.files, extra = data.extra,
                response = data.response, reader = data.reader;
            $(this).parents('.image-parent').find('.profile-image-val').val(response.filename);
        });
    });
}

function uploadExcelFile() {
    $(function () {
        $input = $(".excel-upload");
        $input.fileinput({
            maxFileSize: 6400, // in kb
            uploadUrl: baseUrl+"/common/upload-excel-file/", // server upload action
            uploadAsync: true,
            allowedFileExtensions: ['xlsx'],
            maxFileCount: 1,
            showUpload: true,
            dropZoneEnabled: true,
            uploadExtraData: {'_csrf': $('meta[name=csrf-token]').prop('content')}
        });

        // CATCH RESPONSE
        $input.on('fileuploaderror', function(event, data, previewId, index) {
            var form = data.form, files = data.files, extra = data.extra, 
            response = data.response, reader = data.reader;
            // console.log(data.response.upload_error);
        });

        $input.on('fileuploaded', function(event, data, previewId, index) { 
            var form = data.form, files = data.files, extra = data.extra, 
            response = data.response, reader = data.reader;
            var content = '';
            $.each(response.data, function (i , val) { 
                var category = val.category;

                content += '<div class="panel">'+
                                '<div class="panel-heading padding-left-30 padding-top-5"><h4><input type="hidden" name="menu['+category+']">' + category + '</h4></div>'+
                                '<div class="panel-body container-fluid">'+
                                    '<div class="row row-lg">'+
                                        '<div class="col-sm-12 col-lg-12 col-md-12">'+
                                            '<table class="table table-hover table-striped width-full dtr-inline dataTable with-editable" >'+
                                                '<thead>'+
                                                   '<tr>'+
                                                        '<th width="5"></th>'+
                                                        '<th width="100">Name</th>'+
                                                        '<th width="100">Price</th>'+
                                                        '<th width="150">Description</th>'+
                                                        '<th width="150">Status</th>'+
                                                    '</tr>'+
                                                '</thead>'+
                                                '<tbody>';
                var x = 0;
                $.each(val.items , function (i , val) {
                    if(val[3] == 'same') {
                        content +=  '<tr class="cursor-not-allowed">'+
                                        '<td>'+
                                            '<div class="checkbox-custom checkbox-primary">'+
                                                '<input type="checkbox" id="inputChecked" name="menu['+category+']['+x+'][select]" disabled>'+
                                                '<label for="inputChecked"></label>'+
                                            '</div>'+
                                        '</td>'+
                                        '<td><input type="hidden" name="menu['+category+']['+x+'][name]" value="'+val[0]+'">'+val[0]+'</td>'+
                                        '<td><input type="hidden" name="menu['+category+']['+x+'][price]" value="'+val[1]+'">'+val[1]+'</td>'+
                                        '<td><input type="hidden" name="menu['+category+']['+x+'][description]" value="'+val[2]+'">'+val[2]+'</td>'+
                                        '<td> <b>Duplicate entry not allowed</b> </td>'+
                                    '</tr>';  
                    }
                    else {
                        content +=  '<tr>'+
                                        '<td>'+
                                            '<div class="checkbox-custom checkbox-primary">'+
                                                '<input type="checkbox" id="inputChecked" name="menu['+category+']['+x+'][select]" checked>'+
                                                '<label for="inputChecked"></label>'+
                                            '</div>'+
                                        '</td>'+
                                        '<td><input type="hidden" name="menu['+category+']['+x+'][name]" value="'+val[0]+'">'+val[0]+'</td>'+
                                        '<td><input type="hidden" name="menu['+category+']['+x+'][price]" value="'+val[1]+'">'+val[1]+'</td>'+
                                        '<td><input type="hidden" name="menu['+category+']['+x+'][description]" value="'+val[2]+'">'+val[2]+'</td>'+
                                        '<td> <b>Allowed</b> </td>'+
                                    '</tr>'; 
                    }
                    x++;
                });

                                    content += '</tbody>'+
                                            '</table>'+
                                        '</div>'+
                                    '</div>'+
                                '</div>'+
                            '</div>';
            });

            $('.show-menu-items').html(content);

            $(this).parents('.excel-parent').find('.excel-file-val').val(response.return.filename);
        });
    });
}

function submitForm(form) { 
    var formData = $(form).serialize();

    $.ajax({
        url: $(form).attr('action'),
        data: formData,
        type: 'POST',
        async: false,
        success: function (response) {
            var data = $.parseJSON(response);
            if(data != false) { 
                if (data.status == 'undefined') {
                    $(form)[0].reset(); 
                }
                
                if ($(form).data('tablename') == 'user') { 
                    if ($(form).data('action') == 'add') {
                        if(data.status == 'error') {
                            typeAlertRedirect('Error', data.msg , 'error', baseUrl+'/user/');
                        }else {
                            typeAlertRedirect('Success', 'You have successfully created new user.', 'success', baseUrl+'/user/');
                        }
                    } 
                }
                else if($(form).data('tablename') == 'settings'){
                    typeAlertRedirect('Success', 'Settings Data has been saved Successfully.', 'success', '');
                }
                  else if($(form).data('tablename') == 'edit-menu-item-form'){
                    typeAlertRedirect('Success', 'Data has been Updated Successfully.', 'success',  baseUrl+'/menu-item/');
                }
                else if($(form).data('tablename') == 'menu-item'){
                    typeAlertRedirect('Success', 'Menu Data has been saved Successfully.', 'success',  baseUrl+'/menu-item/');
                }
                else if($(form).data('tablename') == 'menu-category'){
                    typeAlertRedirect('Success', 'Menu Category Data has been saved Successfully.', 'success', '');
                }
                else {
                    typeAlert('Success', 'Data has been saved Successfully.', 'success');
                    $(form)[0].reset(); 
                    return false;
                }  
            }
            else {
                if ($(form).data('tablename') == '') {
                    typeAlert('Error!', 'Sorry, Could not update the data at this time. Please try again.', 'warning');
                }
                else {
                    typeAlert('Error!', 'Sorry, Could not save the data at this time. Please try again.', 'warning');
                }
            }
        }
    });
}

function common_script() {

    $(document).on('submit', '.change-password-form', function (e) {
        e.preventDefault();
        var form = $(this);
        if(form.valid()) {
            $.ajax({
                url: baseUrl + '/common/change-password',
                data: $(this).serialize(),
                type: 'POST',
                async: false,
                success: function (response) { 
                    var data = $.parseJSON(response);
                    $(form)[0].reset();
                    if(data == true){ 
                        typeAlert('Success', 'Your password has successfully changed .', 'success');
                        $('.modal').modal('hide');
                    }else if(data.status == 'error') {
                       typeAlert('Error', data.msg, 'error');
                    }else {
                        typeAlert('Error', 'Your password could not be changed at this time.', 'error');
                    }
                }
            });
        }     
    });

    $(document).on('submit', '.change-pin-code-form', function (e) {
        e.preventDefault();
        var form = $(this);
        if(form.valid()) {
            $.ajax({
                url: baseUrl + '/common/change-pin-code',
                data: $(this).serialize(),
                type: 'POST',
                async: false,
                success: function (response) { 
                    var data = $.parseJSON(response);
                    $(form)[0].reset();
                    if(data == true){ 
                        typeAlert('Success', 'Your pin code has successfully changed .', 'success');
                        $('.modal').modal('hide');
                    }else if(data.status == 'error') {
                       typeAlert('Error', data.msg, 'error');
                    }else {
                        typeAlert('Error', 'Your pin code could not be changed at this time.', 'error');
                    }
                }
            });
        }     
    });

    $(".app-logout").click(function (e) {
        e.preventDefault();
        var href = $(this).attr('href')
        swal({
            title: "Are You Sure?",
            text: '<a href="'+href+'" class="only-logout btn btn-success font-size-18" >Logout</a> ' +
                  '<a href="'+href+'" class="close-day btn btn-info font-size-18" ><span>Close Day & Logout</span>'+
                    '<svg class="button-loader">'+
                        '<circle cx="50%" cy="50%" r="8" class="path"/>'+
                        '<circle cx="50%" cy="50%" r="8" class="fill"/>'+
                    '</svg>' +
                  '</a> ' +
                  '<a href="#" class="btn btn-danger cancel-logout font-size-18">Cancel</a> ',
            html: true,
            showConfirmButton: false
        });
    });

    $(document).on('click', ".close-day", function (e) {
        e.preventDefault();
        $this = $(this);
        $this.find('span').css('color', 'transparent');
        $this.find('.button-loader').css('opacity', '1').prop('disabled', true);
        
        $.ajax({
            url : baseUrl + '/close-day-log/send-report',
            type : 'POST',
            // async : false,
            success : function (response) {
                var data = $.parseJSON(response);
                if (data != true) {
                    basicAlert('Warning!', 'Could not send the close day report. Please try again.');
                }
                $('.only-logout').trigger('click');
                $this.find('span').css('color', '#fff');
                $this.find('.button-loader').css('opacity', '0').prop('disabled', false);
            }
        });        
    });

    $(document).on('click' , '.only-logout' , function (e) {
        e.preventDefault();
        //removeIP($(this).attr('href'));
        window.location.href = $(this).attr("href");
    });

    $(document).on('click', ".cancel-logout", function (e) {
        e.preventDefault();
        swal.close();
    });
}

function right_click_menu() {
    // Trigger action when the contexmenu is about to be shown
    $(document).bind("contextmenu", function (event) {

        // Avoid the real one
        event.preventDefault();

        // Show contextmenu
        $(".custom-menu-right-click").finish().toggle(100).

            // In the right position (the mouse)
            css({
                top: event.pageY + "px",
                left: event.pageX + "px"
            });
    });


    // If the document is clicked somewhere
    $(document).bind("mousedown", function (e) {

        // If the clicked element is not the menu
        if (!$(e.target).parents(".custom-menu-right-click").length > 0) {

            // Hide it
            $(".custom-menu-right-click").hide(100);
        }
    });


    // If the menu element is clicked
    $(".custom-menu-right-click li").click(function () {

        // This is the triggered action name
        switch ($(this).attr("data-action")) {

            // A case for each action. Your actions here
            case "reload":
                location.reload();
                break;
            case "back":
                history.go(-1);
                break;
        }

        // Hide it AFTER the action was triggered
        $(".custom-menu-right-click").hide(100);
    });
}

function get_current_date() {
    var fullDate = new Date();
    var twoDigitMonth = (fullDate.getMonth()+1) + "";
                      if(twoDigitMonth.length==1)  twoDigitMonth="0" +twoDigitMonth;

    var twoDigitDate = fullDate.getDate()+"";if(twoDigitDate.length==1) twoDigitDate="0" +twoDigitDate;
    var curr_date = fullDate.getFullYear() + "-" + twoDigitMonth + "-" + twoDigitDate + ' ' + fullDate.getHours() + ":" + fullDate.getMinutes() + ":" + fullDate.getSeconds() ;

    return curr_date;
}
