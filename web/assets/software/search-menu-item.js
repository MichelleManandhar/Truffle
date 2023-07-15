$(document).on('keyup', '.search-menu-item', function () {
    $.ajax({
        type: 'POST',
        url : baseUrl + '/menu-item/search-menu-item',
        data: {search : $(this).val()},
        async: false,
        success: function (response) {
            var res = $.parseJSON(response);
            if(res.search != null) {
                $('.menu-item-list-panel').hide();
                $('.search-menu-item-list-panel').show();
                $('.search-menu-item-list-panel').addClass('scroll-height-600 slimscrollstart-position-600');
                var content = '';
                $.each(res.search, function (i,item) {

                    if($.trim(item['image']) != '') {
                        image = upload_load_path['upload'] + item['image'];
                    }else{
                        image = upload_load_path['image'] + 'no-image.png';
                    }

                    content +=  '<div class="col-md-6">' +
                                    '<div class="right-panel-content pointer select-item" data-item="'+item['slug']+'" ' +
                                    'data-name="'+item['name']+'" data-price="'+item['price']+'" data-image="'+image+'">' +
                                        '<div class="row">' +
                                            '<div class="col-lg-3 col-md-4 col-sm-5 col-xs-2">' +
                                                '<a href="javascript:void(0)" data-plugin="webuiPopover"' +
                                                'data-trigger="hover" data-placement="right" data-delay-show="300"' +
                                                'data-delay-hide="1000" data-title="Description" data-content="'+item['description']+'">' +
                                                    '<img class="order-img-size" src="'+image+'" alt="'+item['name']+'">' +
                                                '</a>' +
                                            '</div>' +
                                            '<div class="col-lg-6 col-md-4 col-sm-7 col-xs-7">' +
                                                '<span class="font-size-15">'+item['name']+'</span>' +
                                            '</div>' +
                                            '<div class="col-lg-3 col-md-4 col-sm-12 col-xs-3">  <div class="margin-top-5-price"><span class="font-weight-500 font-size-15">'+currency+item['price']+'</span></div>' +
                                            '</div>' +
                                        '</div>' +
                                    '</div>' +
                                '</div>';
                });

                $('.search-menu-item-list-panel').html(content);

                $('.scroll-height-600').slimScroll({
                    start: $('.slimscrollstart-position-600'),
                    height: '600px'
                });
            }
            else{
                $('.menu-item-list-panel').show();
                $('.search-menu-item-list-panel').hide();
                $(".scroll-height-600").slimScroll({destroy: true});
                $('.search-menu-item-list-panel').removeClass('scroll-height-600 slimscrollstart-position-600');
            }
        }
    });
});