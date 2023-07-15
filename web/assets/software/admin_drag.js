var width_offset = parseFloat($('.custom-page-aside').css('width'));  /* 260 is the left offset - depends on the page-aside width*/
var height_offset = 60; /*parseFloat($('.site-navbar').css('height'));*/
var addition_height_offset = 5; 
    /* for tables */

        function drag_table(floor) {
            $(".drag-table-"+floor).draggable({
                handle: ".drag-header",
                start: function( event, ui ) {
                    $(this).removeClass('drag-table-obstacle');
                },
                stop: function( event, ui ) {
                    $(this).addClass('drag-table-obstacle');
                    update_table($(this));
                },
                obstacle: ".drag-table-obstacle",
                preventCollision: true,
                containment: ".drag-area-"+floor
            });
        }

        function create_drag_table() {
            $(".create-drag-table").draggable({
                start: function( event, ui ) {
                    $(this).removeClass('drag-table-obstacle');
                },
                stop: function( event, ui ) {
                    $(this).addClass('drag-table-obstacle');

                    var $area = false;
                    var main_count = $('.drag-area').length;
                    for(i=1; i<=main_count; i++) {
                        if ( collision( $('.drag-area-'+i), $(ui.helper) ) ) {
                            $area = $('.drag-area-'+i); break;
                        }
                    }

                    if ($area != false) {
                        /*if (collision($area, $(ui.helper))) {*/
                            var check = false;
                            var count = $area.find('.drag-table-obstacle').length;

                            for(i=1; i<=count; i++) {
                                if ($area.find('.drag-table-obstacle:nth-child('+i+')').length == 1) {
                                    if ( collision( $area.find('.drag-table-obstacle:nth-child('+i+')'), $(ui.helper) ) ) {
                                        check = true; break;
                                    }
                                }
                            }

                            if (!check) { 
                                var data = create_table($(ui.helper), $area);

                                if (data != false) { 
                                    var $drag = $(ui.helper).clone(true);

                                    var ratio = parseFloat($area.css('height')) + height_offset;
                                    var top = unit_fix(parseFloat($drag.css('top')) + (ratio * (parseInt(data.floor)-1) + addition_height_offset), 'top'); 
                                    var left = unit_fix(parseFloat($drag.css('left')) - (width_offset / 2), 'left');

                                    $drag.appendTo($('.drag-area-'+data.floor))
                                            .addClass('drag-table-'+data.floor)
                                            .addClass('drag-table')
                                            .addClass('drag-table-options')
                                            .addClass('resize-table')
                                            .removeClass('create-drag-table')
                                            .removeClass('create-dragable')
                                            .attr('id', 'table-'+data.id)
                                            .css('top', top+'vh')
                                            .css('left', left+'vw');

                                    $drag.find('.demo-name').remove();
                                    $drag.find('.lock-system').remove();
                                    $drag.prepend('<p class="drag-header cursor-move"><span>' + data.table_name + '</span></p><div class="table-code-display">' + data.table_code + '</div>')
                                            .append('<div class="win-size-grip win-size-grip-tb win-size-grip-tb-'+data.id+'"></div><div class="table-modal-options table-modal-options-style"><i class="icon fa-cog"></i></div>');
                                
                                    $drag.find('.tb-detail-height').val(data.height);
                                    $drag.find('.tb-detail-width').val(data.width);
                                    $drag.find('.tb-detail-table').val(data.id);
                                    $drag.find('.tb-detail-name').val(data.table_name);
                                    $drag.find('.tb-detail-code').val(data.table_code);
                                    $drag.find('.tb-detail-floor').val(data.floor);
                                    $drag.find('.tb-detail-status').val(0);
                                    drag_table(data.floor);
                                    resizable_table(data.id);  
                                    resizable_helper_table();
                                } 
                            }
                        /*}*/
                    }
                },
                helper: 'clone',
                obstacle: ".drag-table-obstacle",
                preventCollision: true,
                containment: "body"
            });
        }

        function create_table($this, $area) {
            var type = $this.data('type');
            var floor = $area.data('floor'); 

            var ratio = parseFloat($area.css('height')) + height_offset;
            var x = unit_fix(parseFloat($this.css('left')) - (width_offset / 2), 'left');
            var y = unit_fix(parseFloat($this.css('top')) + (ratio * (parseInt(floor)-1)) + addition_height_offset, 'top');
            var height = unit_fix($this.css('height'), 'height');
            var width = unit_fix($this.css('width'), 'width');

            return $.ajax({
                url: baseUrl+'/table/create',
                type: 'POST',
                data: {
                    'x_pos' : x, 
                    'y_pos' : y,
                    'height': height,
                    'width' : width, 
                    'type'  : type, 
                    'floor' : floor
                },
                dataType: 'json',
                async : false,
                success: function (response) {   
                    $('.booking-list').find('.booking-list-table-book-now .select-table').append($("<option data-floor=" + '"' + response.floor + '"' + "</option>")
                    .attr("value",response.id).text(response.table_name.toUpperCase()));

                    return response;

                }
            }).responseJSON;
        }

        function update_table($this) {
            var id = $this.find('.tb-detail-table').val();
            var floor = $this.find('.tb-detail-floor').val();
            var $area = $this.parents('.drag-area'); 
            
            var x = unit_fix($this.css('left'), 'left');
            var y = unit_fix($this.css('top'), 'top');
            var height = unit_fix($this.css('height'), 'height');
            var width = unit_fix($this.css('width'), 'width');

            $.ajax({
                url: baseUrl+'/table/update',
                type: 'POST',
                data: {
                    'id': id,
                    'x_pos': x, 
                    'y_pos': y,
                    'height': height, 
                    'width' : width
                },
                async : false,
                success: function (response) {
                    var data = $.parseJSON(response);
                    if (data == false) { 
                        /*$this.remove();*/
                    }
                    else { 
                        $this.find('.tb-detail-height').val(height);
                        $this.find('.tb-detail-width').val(width);
                    }
                }
            });
        }

        function resizable_table(table) {
            $("#table-"+table).resizable({
                handleSelector: ".win-size-grip-tb-"+table
            });
        }

        function resizable_helper_table() {
            $(document).on('mouseout', '.win-size-grip-tb', function (e) { 
                var $area = $(this).parents('.drag-area');
                var $table = $(this).parents('.resize-table');
                
                var index = $table.index();
                var height = $table.find('.tb-detail-height').val();
                var width = $table.find('.tb-detail-width').val();

                update_table($table);
                if ( overflow($table, $area) ) {
                    $table.css('height', height+'vh').css('width', width+'vw');
                }
                /*
                if ( !overflow($table, $area) ) {
                    
                    var check = true;
                    var count = $area.find('.resize-table').length;

                    if (count > 1) {
                        for(i=0; i<count; i++) {
                            if (i != index) {
                                if ( collision( $area.find('.resize-table:eq('+i+')'), $table ) ) { 
                                    check = false; break;
                                }
                            }
                        }
                    }

                    if (check) {
                        update($table); 
                    }
                    else { 
                        $table.css('height', height+'px').css('width', width+'px');
                    }
                }
                else { 
                    $table.css('height', height+'px').css('width', width+'px');
                }
                */
            });
        }
        
        $('.resize-table').each( function (e) {
            resizable_table($(this).find('.tb-detail-table').val());
        });

        create_drag_table();
        resizable_helper_table();

    /* for tables */

    /* for obstacle */

        function drag_obstacle(floor) {
            $(".drag-obstacle-"+floor).draggable({
                handle: ".drag-header",
                start: function( event, ui ) {
                    $(this).removeClass('drag-table-obstacle');
                },
                stop: function( event, ui ) {
                    $(this).addClass('drag-table-obstacle');
                    update_obstacle($(this));
                },
                obstacle: ".drag-table-obstacle",
                preventCollision: true,
                containment: ".drag-area-"+floor
            });
        }

        function create_drag_obstacle() {
            $(".create-drag-obstacle").draggable({
                start: function( event, ui ) {
                    $(this).removeClass('drag-table-obstacle');
                },
                stop: function( event, ui ) {
                    $(this).addClass('drag-table-obstacle');

                    var $area = false;
                    var main_count = $('.drag-area').length;
                    for(i=1; i<=main_count; i++) {
                        if ( collision( $('.drag-area-'+i), $(ui.helper) ) ) {
                            $area = $('.drag-area-'+i); break;
                        }
                    }

                    if ($area != false) {
                        /*if (collision($area, $(ui.helper))) {*/
                            var check = false;
                            var count = $area.find('.drag-table-obstacle').length;

                            for(i=1; i<=count; i++) {
                                if ($area.find('.drag-table-obstacle:nth-child('+i+')').length == 1) {
                                    if ( collision( $area.find('.drag-table-obstacle:nth-child('+i+')'), $(ui.helper) ) ) {
                                        check = true; break;
                                    }
                                }
                            }

                            if (!check) { 
                                var data = create_obstacle($(ui.helper), $area);

                                if (data != false) { 
                                    var $drag = $(ui.helper).clone(true);

                                    var ratio = parseFloat($area.css('height')) + height_offset;
                                    var top = unit_fix(parseFloat($drag.css('top')) + (ratio * (parseInt(data.floor)-1)) + addition_height_offset, 'top');
                                    var left = unit_fix(parseFloat($drag.css('left')) - width_offset, 'left');

                                    $drag.appendTo($('.drag-area-'+data.floor))
                                            .addClass('drag-obstacle-'+data.floor)
                                            .addClass('drag-obstacle')
                                            .addClass('resize-obstacle')
                                            .addClass('block-area')
                                            .removeClass('create-drag-obstacle')
                                            .removeClass('create-dragable')
                                            .attr('id', 'obstacle-'+data.id)
                                            .css('top', top+'vh')
                                            .css('left', left+'vw');

                                    $drag.find('.demo-name').remove();
                                    $drag.find('.lock-system').remove();

                                    $drag.prepend('<p class="drag-header cursor-move"><span>' + data.obstacle_name + '</span></p>')
                                            .append('<div class="win-size-grip win-size-grip-ob win-size-grip-ob-'+data.id+'"></div>');
                                
                                    $drag.find('.ob-detail-height').val(data.height);
                                    $drag.find('.ob-detail-width').val(data.width);
                                    $drag.find('.ob-detail-obstacle').val(data.id);
                                    $drag.find('.ob-detail-floor').val(data.floor);
                                    drag_obstacle(data.floor);
                                    resizable_obstacle(data.id);  
                                    resizable_helper_obstacle();
                                } 
                            }
                        /*}*/
                    }
                },
                helper: 'clone',
                obstacle: ".drag-table-obstacle",
                preventCollision: true,
                containment: "body"
            });
        }

        function create_obstacle($this, $area) {
            var floor = $area.data('floor'); 

            var ratio = parseFloat($area.css('height')) + height_offset;
            var x = unit_fix(parseFloat($this.css('left')) - width_offset, 'left');
            var y = unit_fix(parseFloat($this.css('top')) + (ratio * (parseInt(floor)-1)) + addition_height_offset, 'top');
            var height = unit_fix($this.css('height'), 'height');
            var width = unit_fix($this.css('width'), 'width');

            return $.ajax({
                url: baseUrl+'/obstacle/create',
                type: 'POST',
                data: {
                    'x_pos' : x, 
                    'y_pos' : y,
                    'height': height,
                    'width' : width, 
                    'floor' : floor
                },
                dataType: 'json',
                async : false,
                success: function (response) {
                    return response;
                }
            }).responseJSON;
        }

        function update_obstacle($this) {
            var id = $this.find('.ob-detail-obstacle').val();
            var floor = $this.find('.ob-detail-floor').val();
            var $area = $this.parents('.drag-area'); 
            
            var x = unit_fix($this.css('left'), 'left');
            var y = unit_fix($this.css('top'), 'top');
            var height = unit_fix($this.css('height'), 'height');
            var width = unit_fix($this.css('width'), 'width');

            $.ajax({
                url: baseUrl+'/obstacle/update',
                type: 'POST',
                data: {
                    'id': id,
                    'x_pos': x, 
                    'y_pos': y,
                    'height': height, 
                    'width' : width
                },
                async : false,
                success: function (response) {
                    var data = $.parseJSON(response);
                    if (data == false) { 
                        /*$this.remove();*/
                    }
                    else { 
                        $this.find('.ob-detail-height').val(height);
                        $this.find('.ob-detail-width').val(width);
                    }
                }
            });
        }

        function resizable_obstacle(obstacle) {
            $("#obstacle-"+obstacle).resizable({
                handleSelector: ".win-size-grip-ob-"+obstacle
            });
        }

        function resizable_helper_obstacle() {
            $(document).on('mouseout', '.win-size-grip-ob', function (e) { 
                var $area = $(this).parents('.drag-area');
                var $obstacle = $(this).parents('.resize-obstacle');
                
                var index = $obstacle.index();
                var height = $obstacle.find('.ob-detail-height').val();
                var width = $obstacle.find('.ob-detail-width').val();

                update_obstacle($obstacle);
                if ( overflow($obstacle, $area) ) {
                    $obstacle.css('height', height+'vh').css('width', width+'vw');
                }
            });
        }
        
        $('.resize-obstacle').each( function (e) {
            resizable_obstacle($(this).find('.ob-detail-obstacle').val());
        });

        create_drag_obstacle();
        resizable_helper_obstacle();

    /* for obstacle */

    $(document).on('change', '#table-lock', function (e) {
        var $this = $(this);
        var value = 'lock';
        if ($this.is(':checked')) {
            value = 'unlock';
        }

        $.ajax({
            url: baseUrl + '/table/lock-table',
            type: 'POST',
            data: {value : value},
            async: false,
            success: function (response) {
                var data = $.parseJSON(response);
                if(data.status == 'logout') {
                    window.location.href = baseUrl + '/site/logout';
                }else {
                    window.location.reload();
                }
            }
        })
    });

    $(document).on('change', '#obstacle-lock', function (e) {
        var $this = $(this);
        var value = 'lock';
        if ($this.is(':checked')) {
            value = 'unlock';
        }

        $.ajax({
            url: baseUrl + '/table/lock-obstacle',
            type: 'POST',
            data: {value : value},
            async: false,
            success: function (response) {
                var data = $.parseJSON(response);
                if(data.status == 'logout') {
                    window.location.href = baseUrl + '/site/logout';
                }else {
                    window.location.reload();
                }
            }
        })
    });

    $('.section .drag-area').each( function (e) {
        var floor = $(this).data('floor');
        drag_table(floor);
        drag_obstacle(floor);
    });

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