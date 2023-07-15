    $('#fullpage').fullpage({
        sectionsColor: section_colors, 
        anchors: section_anchors,
        /*sectionsColor: ['#4BBFC3', '#7BAABE', 'tomato'],*/
        /*anchors: ['firstPage', 'secondPage', 'thirdPage'],*/
        menu: '#floor-menu',
        easingcss3: 'cubic-bezier(0.175, 0.885, 0.320, 1.275)'
    });
    
    $(function () {
        $('.scroll-for-floor-menu').slimScroll({
            start: $('.slimscrollstart-position'),
            /*height: '203px',*/
            height: '165px',
            color: '#57c7d4',
            size: '10px',
            distance: '6px',
            alwaysVisible: false,
            disableFadeOut: true,
            start: $('#floor-menu li.active')
        });

        if($(window).width() < 1000)
        {
           $('.scroll-for-left-menu').slimScroll({
            start: $('.slimscrollstart-position-left-menu'),
            height: '310px',
            color: '#57c7d4',
            size: '10px',
            distance: '6px',
            alwaysVisible: false,
            disableFadeOut: true
        });
        }
    });

    $(window).on('keydown', function (e) { 
        if ( (e.keyCode == 38) ) { 
            var index = $('#floor-menu li.active').index();
            var up = (index-1) * 40;
            scroll_up_menu(up);
        }
        else if ( (e.keyCode == 40 || e.keyCode == 32) ) {  /*32 -> spacebar*/
            var index = $('#floor-menu li.active').index();
            var down = (index+1) * 40;
            scroll_down_menu(down);
        }
    });

    $(window).on('mousewheel', function (e) {
        var index = $('#floor-menu li.active').index();
        if ( e.originalEvent.wheelDelta < 0 ) {
            scroll_up_menu(index * 40);
        }
        else {
            scroll_down_menu(index * 40);
        }
    });

    function scroll_up_menu(up) {
        $('.scroll-for-floor-menu').slimScroll({ scrollTo: up, animate: true });
    }

    function scroll_down_menu(down) { 
        $('.scroll-for-floor-menu').slimScroll({ scrollTo: down, animate: true });
    }

    function collision($div1, $div2) {
        var x1 = $div1.offset().left;
        var y1 = $div1.offset().top;
        var h1 = $div1.outerHeight(true);
        var w1 = $div1.outerWidth(true);
        var b1 = y1 + h1;
        var r1 = x1 + w1;

        var x2 = $div2.offset().left;
        var y2 = $div2.offset().top;
        var h2 = $div2.outerHeight(true);
        var w2 = $div2.outerWidth(true);
        var b2 = y2 + h2;
        var r2 = x2 + w2;

        if (b1 < y2 || y1 > b2 || r1 < x2 || x1 > r2) return false;
        return true;
    }

    function overflow($this, $parent) {
        var height = $(window).height();
        var width = $(window).width();
        var pBottom = height - $parent.offset().top - $parent.height();
        var pRight = width - $parent.offset().left - $parent.width();
        var cBottom = height - $this.offset().top - $this.height();
        var cRight = width - $this.offset().left - $this.width();
        if (pBottom > cBottom || pRight > cRight) {
            return true;/* your element have overflow*/
        } 
        else {
            return false; /*your element doesn't have overflow*/
        }
    }
    
    function kill_touch() {
      $.fn.fullpage.setAllowScrolling(false);
    }

    if ($('html').hasClass('touch')) kill_touch();