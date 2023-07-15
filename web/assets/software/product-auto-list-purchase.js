function allDebtorsList() {   /*for auto complete*/
    var $input = $('.product-txt');
    var ahead = $input.typeahead({
        source: function (query, process) { 
            var source = autoSource(baseUrl+'/product-manager/get-products-list'); 
            return process(source);
        },
        minLength: 1,
        autoSelect: true,
        afterSelect: function (data) {
            $input.parents('.auto-parent').find('.auto-i').val(data.id);
        }
    }).on("change", function () {
        $input.parents('.auto-parent').find('.auto-i').val('');
    }).on("blur", function () {
        if ($input.parents('.auto-parent').find('.auto-i').val() === '') {
            $input.val('');
        }
    }); 
}

allDebtorsList();

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

    $thisList.parents('.auto-parent').find('.auto-show').val($(this).data('name'));
    $thisList.parents('.auto-parent').find('.auto-i').val($(this).data('id'));

    $('.modal-product-list').modal('hide');
});