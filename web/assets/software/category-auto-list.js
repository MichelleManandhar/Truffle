function allCategoryList() {   /*for auto complete*/
    var $input = $('.category-txt');
    var ahead = $input.typeahead({
        source: function (query, process) { 
            var source = autoSource(baseUrl+'/member/get-category-list'); 
            return process(source);
        },
        minLength: 1,
        autoSelect: true,
        afterSelect: function (data) {
            var status = true;
            $('.selected-category-list').each(function() {
                if( $(this).data('category-id') == data.category_id ) {
                    basicAlert('Category already selected','','info');
                    status = false;
                }
            });

            if(status) {
                var count = $('.selected-category').find('.selected-category-list').length+1;
                var content =   '<div class="selected-category-list form-horizontal" data-category-id="'+$(this).data('category-id')+'">' +
                                    '<div class="form-group">' +
                                        '<div class="col-md-4 col-sm-4 col-lg-4 control-label">' +
                                            '<input type="hidden" name="category['+count+'][category_id]" value="'+$(this).data('category-id')+'">' +
                                            '<input name="category['+count+'][name]" type="text" class="form-control" value="'+$(this).data('category-name')+'" readonly>' +
                                        '</div>' +
                                        '<div class="col-md-5 col-sm-5 col-lg-5">' +
                                            '<div class="input-group margin-top-6">' +
                                                '<input name="category['+count+'][discount]" type="number" class="form-control" min="0" max="90" placeholder="Enter Discount Allowed in Percent">' +
                                                '<span class="input-group-addon">%</span>' +
                                            '</div>' +
                                        '</div>' +
                                        '<div class="col-md-3 col-sm-3 col-lg-3 padding-left-0">' +
                                            '<button class="remove-category-button btn btn-round btn-danger icon fa-remove margin-top-6" type="button"></button>'+
                                        '</div>' +
                                    '</div>' +
                                '</div>';
                $('.selected-categories').append(content);
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

allCategoryList();

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
$(document).on('click', '.show-category-list-btn', function () {
    var source = autoSource(baseUrl+'/member/get-category-list');
    console.log(source);
    if (source != null) {
        var a = '';
        for (i = 0; i < source.length; i++) {
            a += '<tr>' +
                    '<td>' + (i + 1) + '</td>'+
                    '<td>'+
                        '<a href="#" class="select-register" data-category-id="' + source[i].category_id + '" data-category-name="' + source[i].category + '" >' + upperFirst(source[i].category) + '</a>'+
                    '</td>'+
                '</tr>';
        }
        
        $table = $('.category-list');
        $table.dataTable().fnDestroy();
        $table.find('tbody').html(a);
        $table.dataTable({ "bDestroy": true });
        
        $('.modal-category-list').modal('show');
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
    $('.selected-category-list').each(function() {
        if( $(this).data('category-id') == $this.data('category-id') ) {
            basicAlert('Category already selected','','info');
            status = false;
        }
    });

    if(status) {
        var count = $('.selected-categories').find('.selected-category-list').length+1;
        var content =   '<div class="selected-category-list form-horizontal" data-category-id="'+$(this).data('category-id')+'">' +
                            '<div class="form-group">' +
                                '<div class="col-md-4 col-sm-4 col-lg-4 control-label">' +
                                    '<input type="hidden" name="category['+count+'][category_id]" value="'+$(this).data('category-id')+'">' +
                                    '<input name="category['+count+'][name]" type="text" class="form-control" value="'+$(this).data('category-name')+'" readonly>' +
                                '</div>' +
                                '<div class="col-md-5 col-sm-5 col-lg-5">' +
                                    '<div class="input-group margin-top-6">' +
                                        '<input name="category['+count+'][discount]" type="number" class="form-control" min="0" max="90" placeholder="Enter Discount Allowed in Percent">' +
                                        '<span class="input-group-addon">%</span>' +
                                    '</div>' +
                                '</div>' +
                                '<div class="col-md-3 col-sm-3 col-lg-3 padding-left-0">' +
                                    '<button class="remove-category-button btn btn-round btn-danger icon fa-remove margin-top-6" type="button"></button>'+
                                '</div>' +
                            '</div>' +
                        '</div>';
        $('.selected-categories').append(content);

        $('.modal-category-list').modal('hide');
    }
});

$(document).on('click', '.remove-category-button', function (e) {
    e.preventDefault();
    $(this).parents('.selected-category-list').remove();
});