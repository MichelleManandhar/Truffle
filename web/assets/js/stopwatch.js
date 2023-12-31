/*

JQUERY: STOPWATCH & COUNTDOWN

This is a basic stopwatch & countdown plugin to run with jquery. Start timer, pause it, stop it or reset it. Same behaviour with the countdown besides you need to input the countdown value in seconds first. At the end of the countdown a callback function is invoked.

Any questions, suggestions? marc.fuehnen(at)gmail.com

*/


    (function($){
    
        $.extend({
            
            APP : {                
                
                formatTimer : function(a) {
                    if (a < 10) {
                        a = '0' + a;
                    }                              
                    return a;
                },    
                
                startTimer : function(dir) { 
                    
                    var a;
                    
                    // save type
                    $.APP.dir = dir;
                    
                    // get current date
                    $.APP.d1 = new Date();
                    
                    switch($.APP.state) {
                            
                        case 'pause' :
                            
                            // resume timer
                            // get current timestamp (for calculations) and
                            // substract time difference between pause and now
                            $.APP.t1 = $.APP.d1.getTime() - $.APP.td;                            
                            
                        break;
                            
                        default :
                            
                            // get current timestamp (for calculations)
                            $.APP.t1 = $.APP.d1.getTime(); 
                            
                            // if countdown add ms based on seconds in textfield
                            if ($.APP.dir === 'cd') {
                                $.APP.t1 += parseInt($('#cd_seconds').val())*1000;
                            }    
                        
                        break;
                            
                    }                                   
                    
                    // reset state
                    $.APP.state = 'alive';   
                    
                    // start loop
                    $.APP.loopTimer();
                    
                },
                
                pauseTimer : function() {
                    
                    // save timestamp of pause
                    $.APP.dp = new Date();
                    $.APP.tp = $.APP.dp.getTime();
                    
                    // save elapsed time (until pause)
                    $.APP.td = $.APP.tp - $.APP.t1;
                    
                    // change button value
                    // $('#' + $.APP.dir + '_start').val('Resume');
                    
                    // set state
                    $.APP.state = 'pause';
                    // $('#' + $.APP.dir + '_status').html('Paused');
                    
                },
                
                stopTimer : function() {
                    
                    // set state
                    $.APP.state = 'stop';
                    
                },
                
                resetTimer : function() {

                    // reset display
                    $('.' + $.APP.dir + '_miliseconds,.' + $.APP.dir + '_seconds,.' + $.APP.dir + '_minutes,.' + $.APP.dir + '_hours').html('00');                 
                    
                    // set state
                    $.APP.state = 'reset';  
                    
                },
                
                endTimer : function(callback) {
                   
                    // change button value
                    $('#' + $.APP.dir + '_start').val('Restart');
                    
                    // set state
                    $.APP.state = 'end';
                    
                    // invoke callback
                    if (typeof callback === 'function') {
                        callback();
                    }    
                    
                },    
                
                loopTimer : function() {
                    
                    var td;
                    var d2,t2;
                    
                    var ms = 0;
                    var s  = 0;
                    var m  = 0;
                    var h  = 0;
                    
                    if ($.APP.state === 'alive') { 
                                
                        // get current date and convert it into 
                        // timestamp for calculations
                        d2 = new Date();
                        t2 = d2.getTime();   
                        
                        // calculate time difference between
                        // initial and current timestamp
                        if ($.APP.dir === 'sw') {
                            td = t2 - $.APP.t1;
                        // reversed if countdown
                        } else {
                            td = $.APP.t1 - t2;
                            if (td <= 0) {
                                // if time difference is 0 end countdown
                                $.APP.endTimer(function(){
                                    $.APP.resetTimer();
                                });
                            }    
                        }    
                        
                        // calculate milliseconds
                        ms = td%1000;
                        if (ms < 1) {
                            ms = 0;
                        } else {    
                            // calculate seconds
                            s = (td-ms)/1000;
                            if (s < 1) {
                                s = 0;
                            } else {
                                // calculate minutes   
                                var m = (s-(s%60))/60;
                                if (m < 1) {
                                    m = 0;
                                } else {
                                    // calculate hours
                                    var h = (m-(m%60))/60;
                                    if (h < 1) {
                                        h = 0;
                                    }                             
                                }    
                            }
                        }
                      
                        // substract elapsed minutes & hours
                        ms = Math.round(ms/100);
                        s  = s-(m*60);
                        m  = m-(h*60);                                
                        
                        // update display
                        $('.' + $.APP.dir + ' ._miliseconds').html($.APP.formatTimer(ms));
                        $('.' + $.APP.dir + ' ._seconds').html($.APP.formatTimer(s));
                        $('.' + $.APP.dir + ' ._minutes').html($.APP.formatTimer(m));
                        $('.' + $.APP.dir + ' ._hours').html($.APP.formatTimer(h));
                        
                        // loop
                        $.APP.t = setTimeout($.APP.loopTimer,1);
                    
                    } else {
                    
                        // kill loop
                        clearTimeout($.APP.t);
                        return true;
                    
                    }  
                    
                },

                startTimerWithStartData : function(dir, time) { 
                    
                    var a;
                    
                    // save type
                    $.APP.dir = dir;
                    
                    // get current date
                    $.APP.d1 = new Date(); 

                    $.APP.t1 = $.APP.d1.getTime();                                
                    
                    // reset state
                    $.APP.state = 'alive';   
                    
                    // start loop
                    $.APP.loopTimerWithStartData();
                    
                },

                loopTimerWithStartData : function() {
                    var td;
                    var d2,t2;
                    
                    var ms = 0;
                    var s  = 0;
                    var m  = 0;
                    var h  = 0;
                    
                    if ($.APP.state === 'alive') { 
                                
                        // get current date and convert it into 
                        // timestamp for calculations
                        d2 = new Date();
                        t2 = d2.getTime();   
                        
                        // calculate time difference between
                        // initial and current timestamp
                        if ($.APP.dir === 'sw') {
                            td = t2 - $.APP.t1;
                        }    
                        
                        // calculate milliseconds
                        ms = td%1000;
                        if (ms < 1) {
                            ms = 0;
                        } else {    
                            // calculate seconds
                            s = (td-ms)/1000;
                            if (s < 1) {
                                s = 0;
                            } else {
                                // calculate minutes   
                                var m = (s-(s%60))/60;
                                if (m < 1) {
                                    m = 0;
                                } else {
                                    // calculate hours
                                    var h = (m-(m%60))/60;
                                    if (h < 1) {
                                        h = 0;
                                    }                             
                                }    
                            }
                        }
                      
                        // substract elapsed minutes & hours
                        ms = Math.round(ms/100);
                        s  = s-(m*60);
                        m  = m-(h*60);                                
                        
                        // update display
                        $('.' + $.APP.dir + ' ._miliseconds').html($.APP.formatTimer(ms));
                        $('.' + $.APP.dir + ' ._seconds').html($.APP.formatTimer(s));
                        $('.' + $.APP.dir + ' ._minutes').html($.APP.formatTimer(m));
                        $('.' + $.APP.dir + ' ._hours').html($.APP.formatTimer(h));
                        
                        // loop
                        $.APP.t = setTimeout($.APP.loopTimer,1);
                    
                    } else {
                    
                        // kill loop
                        clearTimeout($.APP.t);
                        return true;
                    
                    }  
                    
                }
                    
            }    
        
        });             
                
    })(jQuery); 

 /*  
// script required    
$('#sw_start').on('click', function() {
    $.APP.startTimer('sw');
});    

$('#cd_start').on('click', function() {
    $.APP.startTimer('cd');
});           

$('#sw_stop,#cd_stop').on('click', function() {
    $.APP.stopTimer();
});

$('#sw_reset,#cd_reset').on('click', function() {
    $.APP.resetTimer();
});  

$('#sw_pause,#cd_pause').on('click', function() {
    $.APP.pauseTimer();
}); 
*/        
/*
// html required
<div class="sw">
<span class="_hours">00</span>:
<span class="_minutes">00</span>:
<span class="_seconds">00</span>:
<span class="_miliseconds">00</span>
<br/>
<br/>
<input type="button" value="Start" id="sw_start" />
<input type="button" value="Pause" id="sw_pause" />
<input type="button" value="Stop"  id="sw_stop" />
<input type="button" value="Reset" id="sw_reset" />
<br/>
<br/>
<span id="sw_status">Idle</span>
</div>
*/