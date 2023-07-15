function allProductList() {   /*for auto complete*/
    var $input = $('.product-txt');
    var ahead = $input.typeahead({
        source: function (query, process) { 
            var source = autoSource(baseUrl+'/product-manager/get-products-list'); 
            return process(source);
        },
        minLength: 1,
        autoSelect: true,
        afterSelect: function (data) {
            var status = true;
            $('.selected-item-list').each(function() {
                if( $(this).data('id') == data.id ) {
                    basicAlert('Product already selected','','info');
                    status = false;
                }
            });

            if(status) {
                var count = $('.selected-product-items').find('.selected-item-list').length+1;
                var content =   '<div class="selected-item-list form-horizontal" data-id="'+data.id+'">' +
                                    '<div class="form-group">' +
                                        '<div class="col-md-4 col-sm-4 col-lg-4 control-label">' +
                                            upperFirst(data.name) +
                                            '<input type="hidden" name="ingredient['+count+'][id]" value="'+data.id+'">' +
                                        '</div>' +
                                        '<div class="col-md-5 col-sm-5 col-lg-5">' +
                                            '<div class="input-group">' +
                                                '<input type="number" class="form-control round stock-quantity" name="ingredient['+count+'][quantity]" placeholder="Quantity">'+
                                                '<span class="input-group-addon">'+stock_item_quantity_type[data.quantity_type]+'</span>' +
                                            '</div>' +
                                        '</div>' +
                                        '<div class="col-md-3 col-sm-3 col-lg-3 padding-left-0">' +
                                            '<button class="remove-item-button btn btn-round btn-danger icon fa-remove" type="button"></button>'+
                                        '</div>' +
                                    '</div>' +
                                '</div>';
                $('.selected-product-items').append(content);
            }
        }
    }).on("change", function () {
        $input.parents('.auto-parent').find('.auto-i').val('');
    }).on("blur", function () {
        if ($input.parents('.auto-parent').find('.auto-i').val() === '') {
            $input.val('');
        }
    }); 
}

allProductList();

/*for ajax call */
function autoSource(path) {
    return $.ajax({
        url: path,
        type: 'POST',
        async: false,
        dataType: "json",
        success: function (response) {
            return response;
        } 
    }).responseJSON; 
}

/*to show return data from ajax*/
$(document).on('click', '.show-product-list-btn', function () {
    var source = autoSource(baseUrl+'/product-manager/get-products-list');
    if (source != null) {
        var a = '';
        for (i = 0; i < source.length; i++) {
            a += '<tr>' +
                    '<td>' + (i + 1) + '</td>'+
                    '<td>'+
                        '<a href="#" class="select-register" data-id="' + source[i].id + '" data-name="' + source[i].name + '" data-quantity-type="' + source[i].quantity_type + '">' + upperFirst(source[i].name) + '</a>'+
                    '</td>'+
                    '<td>' +stock_item_quantity_type[source[i].quantity_type]+ '</td>' +
                '</tr>';
        }
        
        $table = $('.product-list');
        $table.dataTable().fnDestroy();
        $table.find('tbody').html(a);
        $table.dataTable({ "bDestroy": true });
        
        $('.modal-product-list').modal('show');
    }
});

$(document).on('click', '.btn-auto-list', function (e) {
    $thisList = $(this);
});

/*to show the clicked name from modal*/
$(document).on('click', '.select-register', function (e) {
    e.stopPropagation();
    e.preventDefault();
    var $this = $(this);
    var status = true;
    $('.selected-item-list').each(function() {
        if( $(this).data('id') == $this.data('id') ) {
            basicAlert('Product already selected','','info');
            status = false;
        }
    });

    if(status) {
        var count = $('.selected-product-items').find('.selected-item-list').length+1;
        var content =   '<div class="selected-item-list form-horizontal" data-id="'+$this.data('id')+'">' +
                            '<div class="form-group">' +
                                '<div class="col-md-4 col-sm-4 col-lg-4 control-label">' +
                                    upperFirst($this.data('name')) +
                                    '<input type="hidden" name="ingredient['+count+'][id]" value="'+$this.data('id')+'">' +
                                '</div>' +
                                '<div class="col-md-5 col-sm-5 col-lg-5">' +
                                    '<div class="input-group">' +
                                       '<input type="number" class="form-control round stock-quantity" name="ingredient['+count+'][quantity]" placeholder="Quantity">'+
                                        '<span class="input-group-addon">'+stock_item_quantity_type[$this.data('quantity-type')]+'</span>' +
                                    '</div>' +
                                '</div>' +
                                '<div class="col-md-3 col-sm-3 col-lg-3">' +
                                    '<button class="remove-item-button btn btn-round btn-danger icon fa-remove" type="button"></button>'+
                                '</div>' +
                            '</div>' +
                        '</div>';
        $('.selected-product-items').append(content);

        $('.modal-product-list').modal('hide');
    }
});

$(document).on('click', '.remove-item-button', function (e) {
    e.preventDefault();
    $(this).parents('.selected-item-list').find('.stock-quantity').val('');
    $(this).parents('.selected-item-list').remove();
});