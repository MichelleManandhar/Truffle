   
    /* for table */

    $(document).on('submit', '.update-table-details', function (e) {
        e.preventDefault();
        var form = $(this);

        if(form.valid()) {
            $.ajax({
                url: baseUrl + '/table/update-table-name',
                data: $(this).serialize(),
                type: 'POST',
                async: false,
                success: function (response) { 
                    var data = $.parseJSON(response);
                    if(('status' in data) && data.status == 'logout') {
                        window.location.href = baseUrl + '/site/logout';
                    }else {
                        if (data != false) { 
                            $(form)[0].reset();
                            $('.modal').modal('hide');

                            var $table = $('#table-'+data.id);
                            $table.find('.drag-header').html(data.table_name);
                            $table.find('.tb-detail-name').val(data.table_name);
                            $table.find('.table-code-display').html(data.table_code);
                            $table.find('.tb-detail-code').val(data.table_code);
                        } 
                        else {
                            typeAlert('Error', 'Could not edit table name at this time.', 'error');
                        }
                    }
                }
            });
        }     
    });

    $(document).on('click', '.table-option .remove', function (e) {
        e.preventDefault();
        var id = $('.hidden-table-id').val();
        msgText     = 'Do you want to delete this table?';
        errorMsg    = 'Sorry, Could not delete the table at this time. Please try again.';
        swal({
            title: 'Are You Sure?',
            text: msgText,
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: "rgb(190, 92, 73)",
            confirmButtonText: 'Yes, Delete it.',
            closeOnConfirm: false
        },
        function() {
            $.ajax({
                url: baseUrl + '/table/delete',
                type: 'POST',
                data: {id: id},
                async: false,
                success: function (response) {
                    var data = $.parseJSON(response);
                    if(data.status == 'logout') {
                        window.location.href = baseUrl + '/site/logout';
                    }else {
                        if (data == true) {
                            var $table = $('#table-'+id);
                            var head_id = $table.find('.tb-detail-table').val(); 
                            $('.table-option').modal('hide');
                            // clean_merge_head($table, head_id, true);

                            setTimeout(function () {
                                $('#table-'+id).remove();
                            }, 1000);
                            $(".ct option[value='X']").remove();
                            $('.booking-list').find('.booking-list-table-book-now .select-table option[value='+id+']').remove();
                            swal.close();
                        }
                        else if (data.error != null) {
                            typeAlert('Error!', data.error, 'warning'); return false;
                        }
                        else {
                            typeAlert('Error!', errorMsg, 'warning'); return false;
                        }
                    }
                }
            });
        });
    });

    $(document).on('click', '.table-option .edit', function (e) {
        e.preventDefault();
        var id = $('.hidden-table-id').val();
        var name = $('.hidden-table-name').val();
        var code = $('.hidden-table-code').val();
        $('.update-table').find('input[name=id]').val(id);
        $('.update-table').find('.table-name').val(name);
        $('.update-table').find('.table-code').val(code);
        $('.update-table').find('.table-name').focus();
        $('.update-table').modal('show');
        $('.table-option').modal('hide');

        validate_table_name(id);
    });

    $(document).on('click', '.table-option .btn-book-now', function (e) {
        e.preventDefault();
        var $book = $('.book-now');
        $book.find('.book-table-name').val($('.hidden-table-name').val());
        $book.find('.book-table').val($('.hidden-table-id').val());
        $book.find('.book-floor').val($('.hidden-floor-id').val());  
        $book.find('.opt-book-with-table').show();
        $book.find('.opt-book-without-table').hide();
        $book.modal('show'); 
    });

    $(document).one('click', '.table-option .btn-occupy', function (e) {

        e.preventDefault();
        var table = $('.hidden-table-id').val();
        var floor = $('.hidden-floor-id').val();
        var d = new Date();
        var started_time = d.getTime();
        setInterval(function () {
            started_time = started_time+1;
            $(".drag-table").val(started_time);
        }, 1000);
        if ( table > 0 && floor > 0 ) {
            $.ajax({
                url: baseUrl + '/table/occupy-now',
                data: {table:table, floor:floor},
                type: 'POST',
                async: false,
                success: function (response) {
                    var data = $.parseJSON(response);
                    if(data.status == 'logout') {
                        window.location.href = baseUrl + '/site/logout';
                    }else {
                        if (data != false) {
                            window.location.href = baseUrl + '/' + version + '/?occid=' + data.id;
                        }
                        else {
                            typeAlert('Error', 'Could not occupy the table at this time.', 'error');
                        }
                    }
                }
            });
        }
    });
    
    $(document).on('submit', '.table-book-now', function (e) {
        e.preventDefault();
        var form = $(this);
        if($(form).find('.book-table').val() != '') {
            var table = $(form).find('.book-table').val();
        }else if($(form).find('.select-table').find(":selected").val() != '') {
            var table = $(form).find('.select-table').find(":selected").val();
        }else {
            var table = '';
        }
        var floor = $(form).find('.book-floor').val();
        if (form.valid()) {
            var check = $.ajax({
                url: baseUrl + '/table/check-overlap-for-booking',
                data: form.serialize(),
                type: 'POST',
                dataType: 'json',
                async: false,
                success: function (response) { 
                    return response;
                }
            }).responseJSON; 
            
            if (check == false) {
                $.ajax({
                    url: baseUrl + '/table/book-now',
                    data: form.serialize(),
                    type: 'POST',
                    async: false,
                    success: function (response) { 
                        var data = $.parseJSON(response);
                        $(form)[0].reset();
                        if(data.status == 'logout') {
                            window.location.href = baseUrl + '/site/logout';
                        }else {
                            if (data != false) { 
                                if(table != '') {
                                    typeAlert('Booked', 'Table-' + table + ' of Floor No-' + floor + ' is booked now.', 'success');
                                }else {
                                    typeAlert('Booked', 'Booking has been made successfully.', 'success');
                                }
                                
                                $('.modal').modal('hide');
                            } 
                            else {
                                typeAlert('Error', 'Could not book table at this time.', 'error');
                            }
                        }
                    }
                });
            }
            else {
                typeAlert('Error', 'Booking Overlapped. Please check the booking list of this table to comfirm.', 'error');
            }
        }     
    });

    $('.book-now').on('hidden.bs.modal', function () { 
        $('.table-book-now')[0].reset();
        $('.form-group').each(function () { $(this).removeClass('has-error'); });
        $('.form-group').each(function () { $(this).removeClass('has-success'); });
        $('.help-block').each(function () { $(this).remove(); });
    });

    $(document).on('change' , '.select-table' , function () {
       var table    = $(this).find('option:selected');
       var floor    = table.data('floor');
       var table_id = table.val();
       var $this    = $(this);

       if($this.parents('.booking-list-table-book-now').length > 0) {
            $this.parents('.booking-list-table-book-now').find('.book-floor').val(floor);
            $this.parents('.booking-list-table-book-now').find('.book-table').val(table_id);
       }else if($this.parents('.table-book-now').length > 0) {
            $this.parents('.table-book-now').find('.book-floor').val(floor);
       }
    });

    $('.booking-list').on('shown.bs.modal', function () { 
        $('.date-picker').datepicker({
            format:  "yyyy-m-d",
            autoclose: true,
            todayHighlight: true,
            enableOnReadonly : true
        }).datepicker('setDate', new Date());

        $('.time-picker').timepicker({
                                    'disableTextInput'  : true, 
                                    'defaultTime'       : 'value',
                                });

        var $this = $(this);
        $this.find('.booked-tables-data tbody').html('');
        
        var data = $.ajax({
            url : baseUrl + '/table/get-booked-tables',
            type : 'POST',
            dataType : 'json',
            async : false,
            success : function (response) {
                return response;
            } 
        }).responseJSON;

        var content = ''; 
        if (data != null) {
            books = data.books;
            table_data = data.table_data;
            if (books != null) {
                for(i=0; i<books.length; i++) { 
                    var start_time = new Date(books[i].start_date + ' ' + books[i].start_time);
                    var end_time = new Date(books[i].start_date + ' ' + books[i].end_time);

                    content += '<tr data-table="'+books[i].table_id+'" data-id="'+books[i].id+'">'+
                                    '<td class="table-indexing">'+(i+1)+'</td>'+
                                    '<td>';
                                        (books[i].table_name != null) ? content += books[i].table_name : content += 'N/A';
                        content +=  '</td>'+
                                    '<td>'+books[i].floor_id+'</td>'+
                                    '<td>'+books[i].customer_name+'</td>'+
                                    '<td>'+books[i].customer_phone+'</td>'+
                                    '<td>'+books[i].customer_pax+'</td>'+
                                    '<td>'+books[i].start_date+'</td>'+
                                    '<td>'+formatAMPM(start_time)+'</td>'+
                                    '<td>'+formatAMPM(end_time)+'</td>'+
                                    '<td>'+
                                        '<button type="button" class="btn btn-xs btn-info margin-right-2 btn-occupy-booking">Occupy</button>'+
                                        '<button type="button" class="btn btn-xs btn-success margin-right-2 btn-edit-booking">Edit</button>'+
                                        '<button type="button" class="btn btn-xs btn-warning margin-right-2 btn-move-booking">Move</button>'+
                                        '<button type="button" class="btn btn-xs btn-danger btn-cancel-booking">Cancel</button>'+
                                    '</td>'+
                                '</tr>'; 
                }

                var table = '<option value="">Select Table</option>';
                if(table_data != null) {
                    for(i=0; i<table_data.length; i++) { 
                        table += "<option data-floor=" + table_data[i]['floor'] + " value=" + table_data[i]['id'] + ">" + table_data[i]['table_name'] + "</option>";
                    }
                }
            }
            $this.find('.booking-list-table-book-now select-table').html(table);
            $this.find('.booked-tables-data tbody').html(content);
            $this.find('table.booked-tables-data').dataTable();
        }
    });

    $(document).on('click', '.table-modal-options', function (e) {
        e.preventDefault();
        var $this = $(this).parents('.drag-table-options');
        var status  = $this.find('.tb-detail-status').val(); 
        var table   = $this.find('.tb-detail-table').val();
        var floor   = $this.find('.tb-detail-floor').val();
        var name    = $this.find('.tb-detail-name').val();
        var code    = $this.find('.tb-detail-code').val();
        var occupy  = $this.find('.tb-occupy').val();

        $('.hidden-table-name').val(name);
        $('.hidden-table-code').val(code);
        $('.hidden-table-id').val(table);
        $('.hidden-floor-id').val(floor);
        $('.hidden-status').val(status);
        $('.hidden-occupy-id').val(occupy);

        if ($this.hasClass('merge-table')) {
            $('.btn-unmerge-table').show();
            $('.btn-merge-table').hide();
            $('.btn-occupy').hide();
            $('.btn-move-table').hide();
            $('.btn-close-table').hide();
            $('.btn-view-table').hide().prop('href', '');
        }
        else {
            $('.btn-merge-table').show();
            $('.btn-unmerge-table').hide();

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
        }

        $('.table-option').modal('show');
    });

    $(document).on('submit', '.merge-table-details', function (e) {
        e.preventDefault();
        var form = $(this);

        if(form.valid()) {
            $.ajax({
                url: baseUrl + '/table/merge-table',
                type: 'POST',
                data: $(form).serialize(),
                async: false,
                success: function (response) { 
                    var data = $.parseJSON(response);
                    if(data.status == 'logout') {
                        window.location.href = baseUrl + '/site/logout';
                    } else {
                        if (data.status == 'success') {
                            $('#table-'+data.merge_head).find('.tb-detail-merge').val(data.merge);
                            process_merge_effect_one(data.merge_head, data.merge_head_name, data.merge);
                            $('.merge-table-modal').modal('hide');
                        }
                        else if (data.status == 'error') { 
                            typeAlert('Error!', data.error, 'warning'); return false;
                        }
                        else {
                            typeAlertRedirect('Warning', 'Something went wrong. Please try again later.', 'warning', ''); return false;
                        }
                    }
                }
            });
        }     
    });

    $(document).on('click', '.table-option .btn-unmerge-table', function (e) {
        e.preventDefault();
        var merge_body = $('.hidden-table-id').val(),
        merge_head = $('#table-'+merge_body).find('.tb-detail-merge-head').val();

        if(merge_head > 0 && merge_body > 0) {
            $.ajax({
                url: baseUrl + '/table/unmerge-table',
                type: 'POST',
                data: {table_id: merge_head, id: merge_body},
                async: false,
                success: function (response) { 
                    var data = $.parseJSON(response);
                    if(data.status == 'logout') {
                        window.location.href = baseUrl + '/site/logout';
                    } else {
                        if (data.status == 'success') {
                            $('#table-'+data.merge_head).find('.tb-detail-merge').val(data.merge);
                            process_unmerge_effect_one(merge_body);
                            $('.table-option').modal('hide');
                        }
                        else {
                            typeAlertRedirect('Warning', 'Something went wrong. Please try again later.', 'warning', ''); return false;
                        }
                    }
                }
            });
        }
        
    });

    $('.booking-list').on('hidden.bs.modal', function () { 
        if($('.hidden-reload-action').val() == 1) {
            location.reload();
        }else{
            $('.booking-list-table-book-now')[0].reset();
            $('.form-group').each(function () { $(this).removeClass('has-error'); });
            $('.form-group').each(function () { $(this).removeClass('has-success'); });
            $('.help-block').each(function () { $(this).remove(); });
        }
        $(this).find('.time-picker').timepicker("hideWidget");
    });

    $(document).on('click', '.cancel-booking', function (e) {
        e.preventDefault();
        $('.booking-list-table-book-now')[0].reset();
        $('.form-group').each(function () { $(this).removeClass('has-error'); });
        $('.form-group').each(function () { $(this).removeClass('has-success'); });
        $('.help-block').each(function () { $(this).remove(); });
        $('.booking-list').modal('hide');
    });

    $(document).on('submit', '.booking-list-table-book-now', function (e) {
        e.preventDefault();
        var form = $(this);
        var table = $(form).find('.book-table').val();
        var floor = $(form).find('.book-floor').val();

        if (form.valid()) {
            var check = $.ajax({
                url: baseUrl + '/table/check-overlap-for-booking',
                data: $(this).serialize(),
                type: 'POST',
                dataType: 'json',
                async: false,
                success: function (response) { 
                    return response;
                }
            }).responseJSON; 
            
            if (check == false) {
                $.ajax({
                    url: baseUrl + '/table/book-now',
                    data: $(this).serialize(),
                    type: 'POST',
                    async: false,
                    success: function (response) { 
                        var data = $.parseJSON(response);
                        $(form)[0].reset();
                        if(data.status == 'logout') {
                            window.location.href = baseUrl + '/site/logout';
                        }else {
                            if (data != false) { 
                                typeAlert('Booked', 'Booking has been successfully made.', 'success');
                                $('.modal').modal('hide');
                            } 
                            else {
                                typeAlert('Error', 'Could not book table at this time.', 'error');
                            }
                        }
                    }
                });
            }
            else {
                typeAlert('Error', 'Booking Overlapped. Please check the booking list of this table to comfirm.', 'error');
            }
        }     
    });

    $(document).on('click', '.btn-cancel-booking', function (e) {
        e.preventDefault();
        var $this = $(this);
        var id = $this.parents('tr').data('id');
        msgText     = 'Do you want to cancel the booking of this table?';
        errorMsg    = 'Sorry, Could not cancel the booking of this table at this time. Please try again.';
        swal({
            title: 'Are You Sure?',
            text: msgText,
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: "rgb(190, 92, 73)",
            confirmButtonText: 'Yes, Cancel it.',
            closeOnConfirm: false
        },
        function() {
            $.ajax({
                url: baseUrl + '/table/cancel-booking',
                type: 'POST',
                data: {id: id},
                async: false,
                success: function (response) {
                    var data = $.parseJSON(response);
                    if(data.status == 'logout') {
                        window.location.href = baseUrl + '/site/logout';
                    }else {
                        if (data.status == true) {
                            $this.parents('tr').remove();
                            correct_indexing();
                            if($('#table-'+data.table_id).hasClass('already-notified')){
                                $('#table-'+data.table_id).removeClass('already-notified');
                                $('#table-'+data.table_id).find('p.notice-text').remove(); 
                            }
                            swal.close();
                        }
                        else {
                            typeAlert('Error!', errorMsg, 'warning'); return false;
                        }
                    }
                }
            });
        });
    });

    $(document).on('click', '.btn-edit-booking', function (e) {
        e.preventDefault();
        var $this = $(this);
        populateBookedTable($this); 
        $('.modal').modal('hide'); 
        $('.book-now').modal('show');   
    });

    $(document).one('click', '.btn-occupy-booking', function (e) {
        e.preventDefault(); 
        var $this = $(this);
        var id = $this.parents('tr').data('id');
        msgText     = 'Do you want to occupy this booking for the table?';
        errorMsg    = 'Sorry, Could not occupy the booking of this table at this time. Please try again.';
        swal({
            title: 'Are You Sure?',
            text: msgText,
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: "rgb(190, 92, 73)",
            confirmButtonText: 'Yes, Occupy it.',
            closeOnConfirm: false
        },
        function() {
            $.ajax({
                url: baseUrl + '/table/occupy-booking',
                type: 'POST',
                data: {id: id},
                async: false,
                success: function (response) {
                    var data = $.parseJSON(response);
                    if(data.status == 'logout') {
                        window.location.href = baseUrl + '/site/logout';
                    }else {
                        if (data != false && data.error == null) {
                            $('.modal').modal('hide');
                            window.location.href = baseUrl + '/' + version + '/?occid=' + data.id;
                        }
                        else if (data.error != null) {
                            typeAlert('Error!', data.error, 'warning'); return false;
                        }
                        else {
                            typeAlert('Error!', errorMsg, 'warning'); return false;
                        }
                    }
                }
            });
        });
    });

    $(document).on('click', '.btn-move-booking', function (e) {
        e.preventDefault(); 
        var $this = $(this);
        
        swal({
            title: 'Are You Sure?',
            text: 'Do you want to move this booking for the table?',
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: "rgb(190, 92, 73)",
            confirmButtonText: 'Yes, Move it.',
            closeOnConfirm: true
        },
        function() {
            var $move = $('.move-booking');
            $move.find('.from-table-id').val($this.parents('tr').data('id'));
            $('.modal').modal('hide'); 
            $move.modal('show');
        });
    });

    $(document).on('click', '.btn-close-table', function (e) {
        e.preventDefault(); 
        var $this = $(this);
        
        swal({
            title: 'Are You Sure?',
            text: 'Do you want to close the table?',
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: "rgb(190, 92, 73)",
            confirmButtonText: 'Yes, Close it.',
            closeOnConfirm: false
        },
        function() {
            var id = $('.hidden-occupy-id').val();
            var table = $('.hidden-table-id').val();

            $.ajax({
                url: baseUrl + '/table/close-table',
                type: 'POST',
                data: {id: id, table: table},
                async: false,
                success: function (response) {
                    var data = $.parseJSON(response);
                    $('.modal').modal('hide');
                    if(data.status == 'logout') {
                        window.location.href = baseUrl + '/site/logout';
                    }else {
                        if (data == true) {
                            swal.close();
                            $table = $('#table-'+table);
                            $table.find('.tb-detail-status').val(0);
                            $table.find('.tb-occupy').val(0);
                            $table.addClass('color-bg-empty').removeClass('color-bg-occupy');
                            $table.find('.occupy-timer').remove();
                            $table.find('.occupy-table-pax').remove();
                        }
                        else if (data.error != null) {
                            typeAlert('Error!', data.error, 'warning'); return false;
                        }
                        else {
                            typeAlert('Error!', 'Could not close the table at this moment. Please try again later.', 'warning'); return false;
                        }
                    }
                }
            });
        });
    });

    $(document).on('change', '.select-floor-to-move', function (e) {
        e.preventDefault();
        var $this = $(this);
        var floor = $this.val();
        $this.parents('.move-main').find('.select-table-option').html('');

        if ( floor > 0 ) {
            $.ajax({
                url: baseUrl + '/table/get-floor-tables',
                data: {floor:floor},
                type: 'POST',
                async: false,
                success: function (response) { 
                    var data = $.parseJSON(response);
                    var content = '<select name="table" class="form-control show-tick bs-select-hidden select-table-to-move" data-plugin="selectpicker">';
                    content += '<option value="">Select A Table</option>'; 
                    if (data != false) {
                          tables = data.tables;
                        for(i=0; i< tables.length; i++) {
                            content += '<option value="' + tables[i].id + '">' + tables[i].table_name + '</option>';
                        }
                    } else {
                        typeAlert('Warning','There are no tables in this floor', 'warning');
                         $('.move-booking').modal('hide');
                    }
                    
                    content += '</select>';

                    $this.parents('.move-main').find('.select-table-option').html(content);
                    $('select').selectpicker('refresh');
                }
            });  
        } 
    });

    $(document).on('submit', '.move-booking-details', function (e) {
        e.preventDefault();
        var form = $(this);
        if(form.valid()) {
            var check = $.ajax({
                url: baseUrl + '/table/check-overlap-for-move-booking',
                data: $(this).serialize(),
                type: 'POST',
                dataType: 'json',
                async: false,
                success: function (response) {
                    return response;
                }
            }).responseJSON; 
            
            if (check == false) {
                $.ajax({
                    url: baseUrl + '/table/move-booking',
                    data: $(this).serialize(),
                    type: 'POST',
                    async: false,
                    success: function (response) { 
                        var data = $.parseJSON(response);
                        $(form)[0].reset();
                        if(data.status == 'logout') {
                            window.location.href = baseUrl + '/site/logout';
                        }else {
                            if (data != false) { 
                                $('.modal').modal('hide');
                                typeAlert('Moved', 'Booking successfully moved.', 'success');
                            } 
                            else {
                                typeAlert('Error', 'Sorry, could not move the booked table at this time, please try again later.', 'error');
                            }
                        }
                    }
                });
            }
            else if(check.error != null) {
                typeAlert('Error', check.error, 'error');
            }
            else {
                typeAlert('Error', 'Sorry, could not move the booked table at this time, please try again later.', 'error');
            }
        }     
    });

    $(document).on('submit', '.move-occupied-details', function (e) {
        e.preventDefault();
        var form = $(this);
        if (form.valid()) {
            var check = $.ajax({
                url: baseUrl + '/table/check-overlap-for-move-occupied',
                data: $(this).serialize(),
                type: 'POST',
                dataType: 'json',
                async: false,
                success: function (response) { 
                    return response;
                }
            }).responseJSON; 
            
            if (check == false) {
                var table = $(form).find('.select-table-to-move').val();
                var data = $.ajax({
                    url: baseUrl + '/table/check-occupancy',
                    data: { table : table },
                    type: 'POST',
                    dataType : 'json',
                    async: false,
                    success: function (response) { 
                        return response;
                    }
                }).responseJSON;

                if (data != null && data != false) {
                    typeAlert('Error', 'The table is currently occupied.', 'error');
                }
                else {
                    moveOccupied(form);
                }
            }
            else if(check.error != null) {
                typeAlert('Error', check.error, 'error');
            }
            else {
                typeAlert('Error', 'Sorry, could not move the occupied table at this time, please try again later.', 'error');
            }
        }     
    });

    $('.book-now').on('shown.bs.modal', function () { 
        $('.date-picker').datepicker({
            format:  "yyyy-m-d",
            autoclose: true,
            todayHighlight: true,
            enableOnReadonly : true
        }).datepicker('setDate', new Date());

        $('.time-picker').timepicker({'disableTextInput': false, 'defaultTime': 'value'});  
    });

    $('.booking-list-for-one').on('shown.bs.modal', function () { 
        var $this = $(this);
        var id = $('.hidden-table-id').val();
        var name = $('.hidden-table-name').val();

        $this.find('.booked-table-data tbody').html('');
        $this.find('.title-for-one').html('<stront>'+name+'</strong>');

        var data = $.ajax({
            url : baseUrl + '/table/get-booked-tables-for-one',
            type : 'POST',
            data : {id : id},
            dataType : 'json',
            async : false,
            success : function (response) {
                return response;
            } 
        }).responseJSON;

        var content = ''; 
        if (data != null) {
            books = data.books;
            if (books != null) {
                for(i=0; i<books.length; i++) { 
                    var start_time = new Date(books[i].start_date + ' ' + books[i].start_time);
                    var end_time = new Date(books[i].start_date + ' ' + books[i].end_time);

                    content += '<tr data-table="'+books[i].table_id+'" data-floor="'+books[i].floor_id+'" data-id="'+books[i].id+'">'+
                                    '<td class="table-indexing">'+(i+1)+'</td>'+
                                    '<td>'+books[i].customer_name+'</td>'+
                                    '<td>'+books[i].customer_phone+'</td>'+
                                    '<td>'+books[i].customer_pax+'</td>'+
                                    '<td>'+books[i].start_date+'</td>'+
                                    '<td>'+formatAMPM(start_time)+'</td>'+
                                    '<td>'+formatAMPM(end_time)+'</td>'+
                                    '<td>'+
                                        '<button type="button" class="btn btn-xs btn-info margin-right-2 btn-occupy-booking">Occupy</button>'+
                                        '<button type="button" class="btn btn-xs btn-success margin-right-2 btn-edit-booking">Edit</button>'+
                                        '<button type="button" class="btn btn-xs btn-warning margin-right-2 btn-move-booking">Move</button>'+
                                        '<button type="button" class="btn btn-xs btn-danger btn-cancel-booking">Cancel</button>'+
                                    '</td>'+
                                '</tr>'; 
                }
            }
            $this.find('.booked-table-data tbody').html(content);
            $this.find('table.booked-table-data').dataTable();
        }  
    });

    $('.move-booking').on('shown.bs.modal', function () { 
        var $this = $(this);
        $this.parents('.move-main').find('.select-table-option').html('');
        $this.find('form')[0].reset();
        $this.find('.select-table-to-move').selectpicker('refresh');
    });

    $('.move-occupied').on('shown.bs.modal', function () { 
        var $this = $(this);
        $this.parents('.move-main').find('.select-table-option').html('');
        $this.find('form')[0].reset();
        $this.find('.from-occupy-id').val($('.hidden-occupy-id').val());
        $this.find('.select-floor-to-move').selectpicker('refresh');
        $this.find('.select-table-to-move').selectpicker('refresh');
    });

    $('.merge-table-modal').on('shown.bs.modal', function () { 
        var $this = $(this);
        var id = $('.hidden-table-id').val();
        $this.find('form')[0].reset();
        $this.find('.select-merge-table').html('');
        $this.find('.merge-head-table-name').val($('.hidden-table-name').val());
        $this.find('.merge-head-table-id').val(id);
        $this.find('.floor-id').val($('.hidden-floor-id').val());
        if (table_array != null) {
            var content = '<select name="ids[]" class="form-control show-tick select-merge-body-table" data-plugin="selectpicker" data-live-search="true" data-liveSearchNormalize="true" data-header="Select Tables to merge" data-size="4" multiple>';
            var count = 0;
            $.each(table_array, function (i, data) {
                $table = $('#table-'+data.id);
                if (parseInt(data.floor) == parseInt($('.hidden-floor-id').val()) && parseInt(data.id) != parseInt(id) 
                    && !$table.hasClass('merge-head') && !$table.hasClass('occupied-table') && !$table.hasClass('merge-table'))
                    content += '<option data-tokens="'+data.name+'" value="'+data.id+'">'+data.name+'</option>';

                if (i == count) {
                    $this.find('.select-merge-table').html(content);
                }
                count++;
            })
        }
        content += '</select>'; 
        setTimeout(function() {
            $this.find('.select-merge-body-table').selectpicker('refresh');
        }, 100)
    });

    function process_unmerge_effect_one(merge_body) {
        var $table = $('#table-'+merge_body); 
        $table.removeClass('merge-table').find('.tb-detail-merge-head').val(0);
        $table.find('.drag-header').find('.merge-body-text').remove();
    }

    function process_merge_effect_one(merge_head, merge_head_name, merge_body) {
        $('#table-'+merge_head).addClass('merge-head');
        $.each(JSON.parse(merge_body), function (i, data) {
            var $table = $('#table-'+parseInt(data)); 
            $table.not('.merge-head').addClass('merge-table');
            $table.not('.merge-head').find('.tb-detail-merge-head').val(merge_head);
            $table.not('.merge-head').find('.drag-header').find('.merge-body-text').remove();
            $table.not('.merge-head').find('.drag-header span').after('<span class="merge-body-text"><small> (Merge To: ' + merge_head_name + ')</small></span>');
        })
    }

    function process_merge_effect() {
        $('.merge-head').each(function (i, data) {
            var $table = $(this);
            process_merge_effect_one($table.find('.tb-detail-table').val(), $table.find('.drag-header').find('span').text(), $table.find('.tb-detail-merge').val())
        })
    }

    process_merge_effect();

    function runOccupyTimer() {
        $('.occupy-timer').each(function (i, val) {
            var $this = $(this);
            setInterval(function () {
                startTimer($this);
            }, 1000);
        });
    }

    function populateBookedTable($this) {
        var $book = $('.book-now');
        $book.find('form').find('input').val(''); 
        var id  = $this.parents('tr').data('id'); 
        
        $.ajax({
            url : baseUrl + '/table/get-booked-table',
            type : 'POST',
            data : {id : id},
            async : false,
            success : function (response) {
                var data = $.parseJSON(response);
                if (data != false) {
                    var start_time = new Date(data.book.start_date + ' ' + data.book.start_time);
                    var end_time = new Date(data.book.start_date + ' ' + data.book.end_time);
                    $book.find('input[name=id]').val(data.book.id);
                    $book.find('input[name=customer_name]').val(data.book.customer_name);
                    $book.find('input[name=customer_phone]').val(data.book.customer_phone);
                    $book.find('input[name=customer_pax]').val(data.book.customer_pax);
                    $book.find('input[name=table_name]').val(data.book.table_name);

                    var table = '<option value="">Select Table</option>';
                    if(data.table_data != null) {
                        for(i=0; i<data.table_data.length; i++) { 
                            table += "<option data-floor='" + data.table_data[i]['floor'] + "' value='" + data.table_data[i]['id'] + "'";
                                if(data.table_data[i]['id'] == data.book.table_id) {
                                    table += " selected";
                                }
                            table += ">" + data.table_data[i]['table_name'] + "</option>";
                        }
                    }
                    $book.find('.select-table').html(table);

                    $book.find('input[name=floor]').val(data.book.floor_id);

                    $book.find('input[name=date]').val(data.book.start_date);
                    $book.find('input[name=start_time]').val(formatAMPM(start_time));
                    $book.find('input[name=end_time]').val(formatAMPM(end_time));

                    $book.find('.opt-book-with-table').hide();
                    $book.find('.opt-book-without-table').show();
                }
                else {
                    typeAlert('Error', 'Something Went Wrong! Please try again later.', 'error');
                }
            }
        });
    }

    function moveOccupied($this) {
        $.ajax({
            url: baseUrl + '/table/move-occupied',
            data: $this.serialize(),
            type: 'POST',
            async: false,
            success: function (response) { 
                var data = $.parseJSON(response);
                $this[0].reset();
                if(data.status == 'logout') {
                    window.location.href = baseUrl + '/site/logout';
                }else {
                    if (data != false) { 
                        $('.modal').modal('hide');
                        typeAlert('Moved', 'Occupied Table successfully moved.', 'success');

                        var $old_tb = $('#table-'+data.old_table);
                        $old_tb.find('.tb-detail-status').val(0);
                        $old_tb.find('.tb-occupy').val(0);
                        $old_tb.addClass('color-bg-empty').removeClass('color-bg-occupy').removeClass('occupied-table');
                        var timer = $old_tb.find('.occupy-timer').clone();
                        $old_tb.find('.occupy-timer').remove();

                        var pax = $old_tb.find('.occupy-table-pax').clone();
                        $old_tb.find('.occupy-table-pax').remove();

                        var $new_tb = $('#table-'+data.new_table);
                        $new_tb.find('.tb-detail-status').val(1);
                        $new_tb.find('.tb-occupy').val(data.id);
                        $new_tb.addClass('color-bg-occupy').removeClass('color-bg-empty').removeClass('merge-head');
                        $new_tb.find('.drag-header').after(timer);
                        $new_tb.find('.occupy-timer').after(pax);

                        runOccupyTimer();

                        location.reload();
                    } 
                    else {
                        typeAlert('Error', 'Could not move occupied at this time.', 'error');
                    }
                }
            }
        });
    }

    function correct_indexing() {
        $('table.correct-indexing').find('tbody tr .table-indexing').each( function (i, val) {
            $(this).html(i+1);
        });
    }

    function startTimer($this) {
        var time = $this.data('time');
        var date = new Date(time);
        var now = new Date();
        var td = now.getTime() - date.getTime(); 

        var ms = 0;
        var s = 0;
        var m = 0;
        var h = 0;
        var d = 0;
        
        /*calculate milliseconds*/
        ms = td%1000;
        if (ms < 1) {
            ms = 0;
        } else {    
            /* calculate seconds*/
            s = (td-ms)/1000;
            if (s < 1) {
                s = 0;
            } else {
                /* calculate minutes   */
                var m = (s-(s%60))/60;
                if (m < 1) {
                    m = 0;
                } else {
                    /* calculate hours*/
                    var h = (m-(m%60))/60;
                    if (h < 1) {
                        h = 0;
                    } else {
                        /* calculate days*/
                        var d = (h-(h%24))/24;
                        if (d < 1) {
                            d = 0;
                        }
                    }                             
                }    
            }
        }
      
        /* substract elapsed minutes & hours*/
        /* ms = Math.round(ms/100);*/
        s  = s-(m*60);
        m  = m-(h*60); 
        h  = h-(d*24);                             
        
        /* update display*/
        $this.find('._seconds').html(formatTimer(s));
        $this.find('._minutes').html(formatTimer(m));
        $this.find('._hours').html(formatTimer(h));
        if (d>0) {
            $this.find('._days').html(formatTimer(d) + ':');
        }
    }

    function formatTimer(a) {
        return (a < 10) ? '0' + a : a;
    }

    runOccupyTimer();

    /* for table */

    /* for obstacle */
    $(document).on('dblclick', '.drag-obstacle', function (e) {
        e.preventDefault();
        var $this = $(this);
        
        var obstacle = $this.find('.ob-detail-obstacle').val();
        var floor    = $this.find('.ob-detail-floor').val();
        var name     = $this.find('.ob-detail-name').val();

        $('.hidden-obstacle-name').val(name);
        $('.hidden-obstacle-id').val(obstacle);
        $('.hidden-obstacle-floor-id').val(floor);

        $('.obstacle-option').modal('show');
    });

    var obstacle_tapped=false
    $(document).on('touchstart', '.drag-obstacle', function (e) {
        var $this = $(this);
        if(!obstacle_tapped){ /*if tap is not set, set up single tap*/
            obstacle_tapped=setTimeout(function(){
                obstacle_tapped=null
              /*insert things you want to do when single tapped*/
            },300);   /*wait 300ms then run single click code*/
        } else {    /*tapped within 300ms of last tap. double tap*/
            clearTimeout(obstacle_tapped); /*stop single tap callback*/
            obstacle_tapped=null;
            
            var $this = $(this);
        
            var obstacle = $this.find('.ob-detail-obstacle').val();
            var floor    = $this.find('.ob-detail-floor').val();
            var name     = $this.find('.ob-detail-name').val();

            $('.hidden-obstacle-name').val(name);
            $('.hidden-obstacle-id').val(obstacle);
            $('.hidden-obstacle-floor-id').val(floor);

            $('.obstacle-option').modal('show');
            /*insert things you want to do when double tapped*/
        }
    });

    $(document).on('click', '.obstacle-option .remove', function (e) {
        e.preventDefault();
        var id = $('.hidden-obstacle-id').val();
        msgText     = 'Do you want to delete this obstacle?';
        errorMsg    = 'Sorry, Could not delete the obstacle at this time. Please try again.';
        swal({
            title: 'Are You Sure?',
            text: msgText,
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: "rgb(190, 92, 73)",
            confirmButtonText: 'Yes, Delete it.',
            closeOnConfirm: true
        },
        function() {
            $.ajax({
                url: baseUrl + '/obstacle/delete',
                type: 'POST',
                data: {id: id},
                async: false,
                success: function (response) {
                    var data = $.parseJSON(response);
                    if(data.status == 'logout') {
                       window.location.href = baseUrl + '/site/logout';
                    }else {
                        if (data == true) {
                            $('#obstacle-'+id).remove();
                            $('.obstacle-option').modal('hide');
                        }
                        else if (data.error != null) {
                            typeAlert('Error!', data.error, 'warning'); return false;
                        }
                    }
                }
            });
        });
    });

    $(document).on('click', '.obstacle-option .edit', function (e) {
        e.preventDefault();
        var id = $('.hidden-obstacle-id').val();
        var name = $('.hidden-obstacle-name').val();
        $('.update-obstacle').find('input[name=id]').val(id);
        $('.update-obstacle').find('.obstacle-name').val(name);
        $('.update-obstacle').modal('show');
        $('.obstacle-option').modal('hide');

        validate_obstacle_name(id);
    });

    $(document).on('submit', '.update-obstacle-details', function (e) {
        e.preventDefault();
        var form = $(this);

        if(form.valid()) {
            $.ajax({
                url: baseUrl + '/obstacle/update-obstacle-name',
                data: $(this).serialize(),
                type: 'POST',
                async: false,
                success: function (response) { 
                    var data = $.parseJSON(response);
                    if(data.status == 'logout') {
                        window.location.href = baseUrl + '/site/logout';
                    }else {
                        if (data != false) { 
                            $(form)[0].reset();
                            $('.modal').modal('hide');

                            var $obstacle = $('#obstacle-'+data.id);
                            $obstacle.find('.drag-header').html(data.obstacle_name);
                            $obstacle.find('.ob-detail-name').val(data.obstacle_name);
                        } 
                        else {
                            typeAlert('Error', 'Could not edit obstacle name at this time.', 'error');
                        }
                    }
                }
            });
        }     
    });

    /* for obstacle */

    /* for modal hide */
    $('.book-now').on('hidden.bs.modal', function () { 
        if($('.hidden-reload-action').val() == 1) {
            location.reload();
        }else{
            $('.table-book-now')[0].reset();
            $('.form-group').each(function () { $(this).removeClass('has-error'); });
            $('.form-group').each(function () { $(this).removeClass('has-success'); });
            $('.help-block').each(function () { $(this).remove(); });
        }
        $(this).find('.time-picker').timepicker("hideWidget");
    });

    $('.take-away-now').on('hidden.bs.modal', function () { 
        $('.take-away-form')[0].reset();
        $('.form-group').each(function () { $(this).removeClass('has-error'); });
        $('.form-group').each(function () { $(this).removeClass('has-success'); });
        $('.help-block').each(function () { $(this).remove(); });
    });

    $('.modal-pick-up-now').on('hidden.bs.modal', function () { 
        $('.pick-up-form')[0].reset();
        $('.form-group').each(function () { $(this).removeClass('has-error'); });
        $('.form-group').each(function () { $(this).removeClass('has-success'); });
        $('.help-block').each(function () { $(this).remove(); });
    });

    $('.delivery-now').on('hidden.bs.modal', function () { 
        $('.delivery-form')[0].reset();
        $('.form-group').each(function () { $(this).removeClass('has-error'); });
        $('.form-group').each(function () { $(this).removeClass('has-success'); });
        $('.help-block').each(function () { $(this).remove(); });
    });
    /* for modal hide */
    
    if (typeof(EventSource) !== "undefined") {
        var sourceBooking = null;
        var mainSourceBooking = new EventSource(baseUrl+"/table/check-current-booking");
        mainSourceBooking.onmessage = function (event) { 
            if (event.data != null) { 
                var booking_list = JSON.parse(event.data);
                $('.notice-text').remove();
                if (booking_list.alert != null) {
                    $.each( booking_list.alert, function (i, val) {
                        var $table = $('#table-'+val.table_id);
                        $table.find('.notice-text').remove();
                        $table.append('<p class="notice-text color-red"><i class="icon fa-info-circle"></i></p>');

                        var merge_data = val.merge.split(",");
                        $.each( merge_data, function (j, mval) {
                            var $table = $('#table-'+mval);
                            $table.find('.notice-text').remove();
                            $table.append('<p class="notice-text color-red"><i class="icon fa-info-circle"></i></p>');
                        });
                    });
                }

                if (booking_list.notify != null) {
                    $.each( booking_list.notify, function (i, val) {
                        var $table = $('#table-'+val.table_id);
                        $table.find('.notice-text').remove();
                        $table.append('<p class="notice-text color-green"><i class="icon fa-info-circle"></i></p>');

                        var merge_data = val.merge.split(",");
                        $.each( merge_data, function (j, mval) {
                            var $table = $('#table-'+mval);
                             $table.find('.notice-text').remove();
                        $table.append('<p class="notice-text color-green"><i class="icon fa-info-circle"></i></p>');
                        });
                    });
                }
            }
            if (sourceBooking != null) sourceBooking.close();
        };

    } else {
        console.log('Sorry! No server-sent events support..');
    }

    $('.booking-list-for-one, .move-booking, .move-occupied, .update-table, .table-option, .take-away-now, .take-away-list, .retail-now, .retail-list, .modal-pick-up-now, .pick-up-list, .obstacle-option, .update-obstacle, .modal-tips').on('hidden.bs.modal', function () { 
        if($('.hidden-reload-action').val() == 1) {
            location.reload();
        }
    });