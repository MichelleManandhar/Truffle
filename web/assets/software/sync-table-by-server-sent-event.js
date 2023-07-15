/* web server-sent event */
if (typeof(EventSource) !== "undefined") {

	var sourceObstacle = null;
	var mainSourceObstacle = new EventSource(baseUrl+"/obstacle/run-sync-obstacle-main");
    mainSourceObstacle.onmessage = function (event) { 
    	console.log(event.data);
    	if (event.data == "YES") {
    		run_loop_for_sync_obstacle();
    	}
    	if (sourceObstacle != null) sourceObstacle.close();
    };

    function run_loop_for_sync_obstacle() {
    	$.getJSON(baseUrl+"/web/assets/json/obstacle.json", function( data ) { 
            //getIPs(function(ip){
                //if (ip.match(/^(192\.168\.|169\.254\.|10\.|172\.(1[6-9]|2\d|3[01]))/)) {
        	        $.each( data.data, function( key, val ) { 
                        var id = key;
                        if (val != null) {
                            $.each( val, function( key, val ) {
                                //if (key == ip) {
                                if (key == unique_user_identifier) {
                    	            if (val.remove == 1) {
                    	                $('#obstacle-'+id).remove();
                    	                run_sync_obstacle(id, 'remove');
                    	            }
                    	            else {
                    	                if (val.create == 1) run_sync_obstacle(id, 'create');
                    	                if (val.update == 1) run_sync_obstacle(id, 'update');
                    	            }
                                    return false;
                                }
                	        });
                        }
                    });
                    return false;
                //}
            //});
	    });
    }
    
    function run_sync_obstacle(id, action) {
    	sourceObstacle = new EventSource(baseUrl+"/obstacle/run-sync-obstacle/?table="+id+"&action="+action);
        /* web server-sent event default */
        /*
        sourceObstacle.onmessage = function (event) {
        	console.log(event.data);
        };
        sourceObstacle.onopen = function (event) {
            console.log(event.data);
        };
        sourceObstacle.onerror = function (event) {
            console.log('Sorry! something went wrong. Please press ctrl + F5');
        };
        */
        
        /* web server-sent event custom event */
        sourceObstacle.addEventListener('createObstacle', function (event) {
            var obstacle = JSON.parse(event.data);
            $('#obstacle-'+obstacle.id).remove();
            var content ='<div id="obstacle-'+obstacle.id+'" '+
                        'class="drag-table-obstacle drag-obstacle color-bg-obstacle resize-obstacle drag-obstacle-'+obstacle.floor+'"'+
                        'style="left:'+obstacle.x_pos+'vw; top:'+obstacle.y_pos+'vh; height:'+obstacle.height+'vh; width:'+obstacle.width+'vw;">'+
                        '<p class="drag-header cursor-move"><span>'+obstacle.obstacle_name+'</span></p>'+
                        '<input class="ob-detail-name" type="hidden" value="'+obstacle.obstacle_name+'">'+
                        '<input class="ob-detail-height" type="hidden" value="'+obstacle.height+'">'+
                        '<input class="ob-detail-width" type="hidden" value="'+obstacle.width+'">'+
                        '<input class="ob-detail-obstacle" type="hidden" value="'+obstacle.id+'">'+
                        '<input class="ob-detail-floor" type="hidden" value="'+obstacle.floor+'">'+
                        '<div class="win-size-grip win-size-grip-ob win-size-grip-ob-'+obstacle.id+'"></div>'+
                        '</div>';

            $('.drag-area-'+obstacle.floor).append(content);
            drag_obstacle(obstacle.floor);
            resizable_obstacle(obstacle.id);
            resizable_helper_obstacle();
            sourceObstacle.close();
        }, true);
		/* web server-sent event custom event */
        sourceObstacle.addEventListener('updateObstacle', function (event) {
            if (event.data != false) {
                var obstacle = JSON.parse(event.data);
                var $obstacle = $('#obstacle-'+obstacle.id);
                $obstacle.css('height', obstacle.height + 'vh')
                        .css('width', obstacle.width + 'vw')
                        .css('left', obstacle.x_pos + 'vw')
                        .css('top', obstacle.y_pos + 'vh');

                $obstacle.find('.ob-detail-height').val(obstacle.height);
                $obstacle.find('.ob-detail-width').val(obstacle.width);
                $obstacle.find('.ob-detail-name').val(obstacle.obstacle_name);
                $obstacle.find('.ob-detail-obstacle').val(obstacle.id);
                $obstacle.find('.ob-detail-floor').val(obstacle.floor);
                $obstacle.find('.drag-header').html('<span>' + obstacle.obstacle_name + '</span>');
                sourceObstacle.close();
            }
        }, true);
        /* web server-sent event custom event */
        sourceObstacle.addEventListener('shutDown', function (event) {
        	if (event.data == 'YES') sourceObstacle.close();
        }, false);
        /* web server-sent event custom event for test only */
        sourceObstacle.addEventListener('test', function (event) {
        	console.log(event.data);
        }, false);
    }

    var sourceTable = null;
	var mainSourceTable = new EventSource(baseUrl+"/table/run-sync-table-main");
    mainSourceTable.onmessage = function (event) { 
    	console.log(event.data);
    	if (event.data == "YES") {
    		run_loop_for_sync_table();
    	}
    	if (sourceTable != null) sourceTable.close();
    };

    function run_loop_for_sync_table() {
    	$.getJSON(baseUrl+"/web/assets/json/table.json", function( data ) {
            //getIPs(function(ip){
                //if (ip.match(/^(192\.168\.|169\.254\.|10\.|172\.(1[6-9]|2\d|3[01]))/)) {
                    $.each( data.data, function( key, val ) { 
                        var id = key;
                        if (val != null) {
                            $.each( val, function ( key, val ) {
                                //if (key == ip) {
                                if (key == unique_user_identifier) {
                                    if (val.remove == 1) {
                                        $('#table-'+id).remove();
                                        run_sync_table(id, 'remove');
                                    }
                                    else if (val.close == 1) {
                                        run_sync_table(id, 'close');
                                    }
                                    else if (val.move_occupy == 1) {
                                        run_sync_table(id, 'move_occupy');
                                    }
                                    else if (val.occupy == 1) {
                                        run_sync_table(id, 'occupy');
                                    }
                                    else {
                                        if (val.create == 1) run_sync_table(id, 'create');
                                        if (val.update == 1) run_sync_table(id, 'update');
                                    }
                                    return false;
                                }
                            });
                        }
                    });
                    return false;
                //}
            //});
	    });
    }
    
    function run_sync_table(id, action) {
    	sourceTable = new EventSource(baseUrl+"/table/run-sync-table/?table="+id+"&action="+action);        
        /* web server-sent event custom event */
        sourceTable.addEventListener('createTable', function (event) {
            var table = JSON.parse(event.data);
            $('#table-'+table.id).remove();
            
            var merge = '';
            var status = '';
            var status_color = 'color-bg-empty';
            if (table.merge != '') merge = 'merge-head';
            if (table.status == 1) {
            	status = 'occupied-table';
                status_color = 'color-bg-occupy'; 
            }

            var content = '<div id="table-'+table.id+'" data-type="'+table.type+'"'+ 
				            'class="drag-table-obstacle alert-notify drag-table drag-table-options resize-table drag-table-'+table.floor+' '+status_color+' '+merge+' '+status+'"'+
				            'style="left:'+table.x_pos+'vw; top:'+table.y_pos+'vh; height:'+table.height+'vh; width:'+table.width+'vw;">'+
				            '<p class="drag-header cursor-move"><span>'+table.table_name+'</span></p>'+
                            '<div class="sync-timer"></div>';

            if (table.status == 1) {
                 content += '<p class="occupy-timer" data-time="00:00:00">'+
                            '<span class="_days"></span>'+
                            '<span class="_hours">00</span>'+
                            '<span class="_minutes">00</span>'+
                            '<span class="_seconds">00</span>'+
                            '</p>';
            }

            content += '<div class="win-size-grip win-size-grip-tb win-size-grip-tb-'+table.id+'"></div>'+
            			'<input class="tb-detail-name" type="hidden" value="'+table.table_name+'">'+
                        '<input class="tb-detail-table" type="hidden" value="'+table.id+'">'+
                        '<input class="tb-detail-floor" type="hidden" value="'+table.floor+'">'+
                        '<input class="tb-detail-status" type="hidden" value="'+table.status+'">'+
                        '<input class="tb-occupy" type="hidden" value="0">'+
                        '<input class="tb-detail-merge" type="hidden" value="'+table.merge+'">'+
                        '<input class="tb-detail-merge-head" type="hidden" value="0">'+
                        '</div>';

            $('.drag-area-'+table.floor).append(content);
            drag_table(table.floor);
            resizable_table(table.id);
            resizable_helper_table();
            /*sourceTable.close();*/
        }, true);
		/* web server-sent event custom event */
        sourceTable.addEventListener('updateTable', function (event) {
            if (event.data != false) {
                var table = JSON.parse(event.data);
                var $table = $('#table-'+table.id);
				$table.css('height', table.height + 'vh')
						.css('width', table.width + 'vw')
						.css('left', table.x_pos + 'vw')
						.css('top', table.y_pos + 'vh');

				$table.find('.tb-detail-height').val(table.height);
				$table.find('.tb-detail-width').val(table.width);
				$table.find('.tb-detail-name').val(table.table_name);
				$table.find('.tb-detail-table').val(table.id);
				$table.find('.tb-detail-floor').val(table.floor);
				$table.find('.tb-detail-status').val(table.status);
                $table.find('.drag-header').html('<span>'+table.table_name+'</span>');
                
                if(table.merge != '') {
                    var url = window.location.href;   
                    if(url.match(/table/g) == '') {
                        return false;
                    }
                    else if(url.match(/table/g) != '' 
                            && (($('.booking-list-for-one').data('bs.modal') || {isShown: false}).isShown) == false
                            && (($('.move-booking').data('bs.modal') || {isShown: false}).isShown) == false
                            && (($('.move-occupied').data('bs.modal') || {isShown: false}).isShown) == false
                            && (($('.update-table').data('bs.modal') || {isShown: false}).isShown) == false
                            && (($('.table-option').data('bs.modal') || {isShown: false}).isShown) == false
                            && (($('.take-away-now').data('bs.modal') || {isShown: false}).isShown) == false
                            && (($('.take-away-list').data('bs.modal') || {isShown: false}).isShown) == false
                            && (($('.obstacle-option').data('bs.modal') || {isShown: false}).isShown) == false
                            && (($('.update-obstacle').data('bs.modal') || {isShown: false}).isShown) == false
                            && (($('.modal-tips').data('bs.modal') || {isShown: false}).isShown) == false
                            && (($('.booking-list').data('bs.modal') || {isShown: false}).isShown) == false
                            && (($('.book-now').data('bs.modal') || {isShown: false}).isShown) == false ) 
                    {
                        location.reload();
                    }
                    else {
                        $('.hidden-reload-action').val(1);
                    }
                }

                if (global_unmerge_bool) {
                    location.reload();
                }
            }
        }, true);
		/* web server-sent event custom event */
        sourceTable.addEventListener('closeTable', function (event) {
            var table = JSON.parse(event.data);
            var $table = $('#table-'+table.id);
            $table.find('.tb-detail-status').val(0);
        	$table.find('.tb-occupy').val(0);
        	$table.addClass('color-bg-empty').removeClass('color-bg-occupy');
            $table.find('.occupy-timer').remove();
        }, true);
        /* web server-sent event custom event */
        sourceTable.addEventListener('occupyTable', function (event) {
            var table = JSON.parse(event.data);
            console.log(table);
            var $table = $('#table-'+table.table_id);
            $table.find('.tb-detail-status').val(1);
        	$table.find('.tb-occupy').val(table.id);
        	$table.addClass('color-bg-occupy').removeClass('color-bg-empty');

            var timer = '<p class="occupy-timer" data-time="' + table.start_date + ' ' + table.start_time + '">' +
                            '<span class="_days"></span>' +       
                            '<span class="_hours">00</span>:' +
                            '<span class="_minutes">00</span>:' +
                            '<span class="_seconds">00</span>' +
                        '</p>';

            $table.find('.sync-timer').html(timer);
            runOccupyTimer();
        }, true);
        /* web server-sent event custom event */
        sourceTable.addEventListener('moveOccupiedTable', function (event) {
            var table = JSON.parse(event.data);

            var $old_tb = $('#table-'+table.old_table);
            $old_tb.find('.tb-detail-status').val(0);
            $old_tb.find('.tb-occupy').val(0);
            $old_tb.addClass('color-bg-empty').removeClass('color-bg-occupy');
            var timer = $old_tb.find('.occupy-timer').clone();
            $old_tb.find('.occupy-timer').remove()

            var $new_tb = $('#table-'+table.new_table);
            $new_tb.find('.tb-detail-status').val(1);
            $new_tb.find('.tb-occupy').val(table.id);
            $new_tb.addClass('color-bg-occupy').removeClass('color-bg-empty');
            $new_tb.find('.drag-header').after(timer);
        }, true);
        /* web server-sent event custom event */
        sourceTable.addEventListener('shutDown', function (event) {
        	if (event.data == 'YES') sourceTable.close();
        }, false);
    }

    /* SSE for unmerge */
    var sourceMergeTable = null;
    var mainSourceMergeTable = new EventSource(baseUrl+"/table/run-sync-table-unmerge-main");
    mainSourceMergeTable.onmessage = function (event) { 
        console.log(event.data);
        if (event.data == "YES") {
            var url = window.location.href;   
            if(url.match(/table/g) == '') {
                return false;
            }
            else if(url.match(/table/g) != '' 
                    && (($('.booking-list-for-one').data('bs.modal') || {isShown: false}).isShown) == false
                    && (($('.move-booking').data('bs.modal') || {isShown: false}).isShown) == false
                    && (($('.move-occupied').data('bs.modal') || {isShown: false}).isShown) == false
                    && (($('.update-table').data('bs.modal') || {isShown: false}).isShown) == false
                    && (($('.table-option').data('bs.modal') || {isShown: false}).isShown) == false
                    && (($('.take-away-now').data('bs.modal') || {isShown: false}).isShown) == false
                    && (($('.take-away-list').data('bs.modal') || {isShown: false}).isShown) == false
                    && (($('.obstacle-option').data('bs.modal') || {isShown: false}).isShown) == false
                    && (($('.update-obstacle').data('bs.modal') || {isShown: false}).isShown) == false
                    && (($('.modal-tips').data('bs.modal') || {isShown: false}).isShown) == false
                    && (($('.booking-list').data('bs.modal') || {isShown: false}).isShown) == false
                    && (($('.book-now').data('bs.modal') || {isShown: false}).isShown) == false ) 
            {
                location.reload();
            }
            else {
                $('.hidden-reload-action').val(1);
            }
        }
        if (sourceMergeTable != null) sourceMergeTable.close();
    };
    /* SSE for unmerge */
    
} else {
    console.log('Sorry! No server-sent events support..');
}

/*
{"bool":{},"data":{}}
*/