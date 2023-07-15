
function getIPs(callback){
    var ip_dups = {};

    /*compatibility for firefox and chrome*/
    var RTCPeerConnection = window.RTCPeerConnection
        || window.mozRTCPeerConnection
        || window.webkitRTCPeerConnection;
    var useWebKit = !!window.webkitRTCPeerConnection;

    /*bypass naive webrtc blocking using an iframe*/
    if(!RTCPeerConnection){
        var win = iframe.contentWindow;
        RTCPeerConnection = win.RTCPeerConnection
            || win.mozRTCPeerConnection
            || win.webkitRTCPeerConnection;
        useWebKit = !!win.webkitRTCPeerConnection;
    }

    /*minimal requirements for data connection*/
    var mediaConstraints = {
        optional: [{RtpDataChannels: true}]
    };

    var servers = {iceServers: [{urls: "stun:stun.services.mozilla.com"}]};

    /*construct a new RTCPeerConnection*/
    var pc = new RTCPeerConnection(servers, mediaConstraints);

    function handleCandidate(candidate){
        /*match just the IP address*/
        var ip_regex = /([0-9]{1,3}(\.[0-9]{1,3}){3}|[a-f0-9]{1,4}(:[a-f0-9]{1,4}){7})/
        var ip_addr_temp = ip_regex.exec(candidate); 
        if (ip_addr_temp != null) {
        	var ip_addr = ip_addr_temp[1];
        	/*remove duplicates*/
	        if(ip_dups[ip_addr] === undefined)
	            callback(ip_addr);

	        ip_dups[ip_addr] = true;
        }  
    }

    /*listen for candidate events*/
    pc.onicecandidate = function(ice){
        /*skip non-candidate events*/
        if(ice.candidate)
            handleCandidate(ice.candidate.candidate);
    };

    /*create a bogus data channel*/
    pc.createDataChannel("");

    /*create an offer sdp*/
    pc.createOffer(function(result){

        /*trigger the stun server request*/
        pc.setLocalDescription(result, function(){}, function(){});

    }, function(){});

    /*wait for a while to let everything done*/
    setTimeout(function(){
        /*read candidate info from local description*/
        var lines = pc.localDescription.sdp.split('\n');

        lines.forEach(function(line){
            if(line.indexOf('a=candidate:') === 0)
                handleCandidate(line);
        });
    }, 1000);
}

getIPs(function(ip){
 	setInterval(function(){
        sync_table(ip); 
        sync_obstacle(ip); 
    }, 15000);
});

function sync_table(ip) {
	$.getJSON(baseUrl+"/web/assets/json/table.json", function( data ) {
	  	$.each( data, function( key, val ) { 
	  		syncing_table(key, ip, val.ip, val.create);
		});
	});
} 

function syncing_table(id, ip, ips, create) {
	$.each( ips, function( key, val ) {
		if (key == ip && val == 0) { 
			do_sync_table(id, ip, create); 
			return false;
		}
	});
}

function do_sync_table(id, ip, create) { 
	var data = $.ajax({
		url  : baseUrl + '/table/sync-table',
		data : {id:id, ip:ip},
		type : 'POST',
		async : false,
		dataType : 'JSON',
		success : function (response) {
			return response;
		}
	}).responseJSON;  console.log(id, ip, data);

	if (data != false && data != null) {
		table = data.table;
		occupy = data.occupy;
		if (create == 1) {
            var occupy_id  = 0;
            var time = "00:00:00";
            var status_color = 'color-bg-empty';
            var merge = '';
            var status = '';
            if(table.merge != ''){
                merge = 'merge-head';
            }
            if(table.status != '') {
                status = 'merge-head';
            }
            var contents = '';

            contents +='<div id="table-'+table.id+'" class="drag-table-obstacle alert-notify drag-table drag-table-options '+status_color+' '+merge+' '+status+'"'+
            'data-type="'+table.type+'"'+
            'style="left:'+table.x_pos+'vw; top:'+table.y_pos+'vh; height:'+table.height+'vh; width:'+table.width+'vw;">'+
            '<p class="drag-header">'+
            '<span>'+table.table_name+'</span>'+
            '</p>';

            if(table.status == 1){
                 contents += '<p class="occupy-timer" data-time="'+time+'">'+
                            '<span class="_days"></span>'+
                            '<span class="_hours">00</span>'+
                            '<span class="_minutes">00</span>'+
                            '<span class="_seconds">00</span>'+
                            '</p>';
                        }
            /*if ($lock_table != false){
                contents = '<input class="tb-detail-height" type="hidden" value="'+table.height+'">'+
                '<input class="tb-detail-width" type="hidden" value="'+table.width+'">'+
                '<div class="win-size-grip win-size-grip-tb win-size-grip-tb-'+table.width+'"></div>';
            }*/

            contents += '<input class="tb-detail-name" type="hidden" value="'+table.table_name+'">'+
                            '<input class="tb-detail-table" type="hidden" value="'+table.id+'">'+
                                '<input class="tb-detail-floor" type="hidden" value="'+table.floor+'">'+
                                    '<input class="tb-detail-status" type="hidden" value="'+table.status+'">'+
                                        /*'<input class="tb-occupy" type="hidden" value="'+occupy_id+'">'+*/
                                            '<input class="tb-detail-merge" type="hidden" value="'+table.merge+'">'+
                                                '<input class="tb-detail-merge-head" type="hidden" value="'+0+'">'+
                                                '</div>';


            $('.drag-area-'+table.floor).append(contents);
            drag_table(table.floor);
            resizable_table(table.id);
            resizable_helper_table();

        }
		else {
			var $table = $('#table-'+id);
			var old_status = $table.find('.tb-detail-status').val();
			var old_merge = $table.find('.tb-detail-merge').val();

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
			$table.find('.tb-occupy').val(occupy.id);
			$table.find('.tb-detail-merge').val(table.merge);
			$table.find('.tb-detail-merge-head').val(0);  

			if (table.status == 1) {
				if (table.status != old_status) {
					var content = '<p class="occupy-timer" data-time="'+occupy.start_date + ' ' + occupy.start_time+'">'+
		                            '<span class="_days"></span>'+
		                            '<span class="_hours">00</span>:'+
		                            '<span class="_minutes">00</span>:'+
		                            '<span class="_seconds">00</span>'+
		                        '</p>';

		            $table.find('.drag-header').after(content).addClass('occupied-table color-bg-occupy');
		            
		            setTimeout(function () {
		            	startTimer($table.find('.occupy-timer'));
		            }, 1000);
		        }
			} 
			else {
				$table.find('.occupy-timer').remove();
			} 

			if (table.merge != old_merge && table.merge != '') {
				$table.addClass('merge-head');
				merge($table);
			}
			else {
				$table.removeClass('merge-head');
			}
		}
	}
}

function sync_obstacle(ip) {
	$.getJSON(baseUrl+"/web/assets/json/obstacle.json", function( data ) {
	  	$.each( data, function( key, val ) { 
	  		syncing_obstacle(key, ip, val.ip, val.create);
		});
	});
} 

function syncing_obstacle(id, ip, ips, create) {
	$.each( ips, function( key, val ) {
		if (key == ip && val == 0) { 
			do_sync_obstacle(id, ip, create); 
			return false;
		}
	});
}

function do_sync_obstacle(id, ip, create) { 
	var data = $.ajax({
		url : baseUrl + '/table/sync-obstacle',
		data : {id:id, ip:ip},
		type : 'POST',
		async : false,
		dataType : 'JSON',
		success : function (response) {
			return response;
		}
	}).responseJSON;  console.log(id, ip, data);

	if (data != false && data != null) {
		obstacle = data.obstacle;

		if (create == 1) {
            var content ='<div id="obstacle-'+obstacle.id+'" class="drag-table-obstacle drag-obstacle color-bg-obstacle'+
                ' resize-obstacle drag-obstacle-'+obstacle.floor+'"'+
                'style="left:'+obstacle.x_pos+'vw; top:'+obstacle.y_pos+'vh; height:'+obstacle.height+'vh; width:'+obstacle.width+'vw;">'+
                '<p class="drag-header">'+
                '<span>'+obstacle.obstacle_name+'</span>'+
                '</p>'+
                '<input class="ob-detail-name" type="hidden" value="'+obstacle.obstacle_name+'">'+
                '<input class="ob-detail-height" type="hidden" value="'+obstacle.height+'">'+
                '<input class="ob-detail-width" type="hidden" value="'+obstacle.width+'">'+
                '<input class="ob-detail-obstacle" type="hidden" value="'+obstacle.id+'">'+
                '<input class="ob-detail-floor" type="hidden" value="'+obstacle.floor+'">'+
                '<div class="win-size-grip win-size-grip-ob win-size-grip-ob-'+obstacle.id+'">' +
                '</div>'+
                '</div>';

            $('.drag-area-'+obstacle.floor).append(content);
            drag_obstacle(obstacle.floor);
            resizable_obstacle(obstacle.id);
            resizable_helper_obstacle();


        }
		else if (create == -1) {
			$('#obstacle-'+id).remove();
		}
		else {
			var $obstacle = $('#obstacle-'+id);
			$obstacle.css('height', obstacle.height + 'vh')
					.css('width', obstacle.width + 'vw')
					.css('left', obstacle.x_pos + 'vw')
					.css('top', obstacle.y_pos + 'vh');

			$obstacle.find('.ob-detail-height').val(obstacle.height);
			$obstacle.find('.ob-detail-width').val(obstacle.width);
			$obstacle.find('.ob-detail-name').val(obstacle.obstacle_name);
			$obstacle.find('.ob-detail-obstacle').val(obstacle.id);
			$obstacle.find('.ob-detail-floor').val(obstacle.floor); 
		}
	}
}