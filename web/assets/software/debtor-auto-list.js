function allDebtorsList() {   /*for auto complete*/
    var $input = $('.debtor-txt');
    var ahead = $input.typeahead({
        source: function (query, process) { 
            var source = autoSource(baseUrl+'/debtor/find-debtors'); 
            return process(source);
        },
        minLength: 1,
        autoSelect: true,
        afterSelect: function (item) {
            $input.parents('.auto-parent').find('.auto-i').val(item.id);
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
$('.modal-debtors-list').on('shown.bs.modal', function () {
    var source = autoSource(baseUrl+'/debtor/get-debtors-list');
    if (source != null) {
        var a='';
        for (i = 0; i < source['debtors'].length; i++) {
            a += '<tr data-id="' + source['debtors'][i].id + '" data-name="' + source['debtors'][i].name + '">' +
                    '<td>' + (i + 1) + '</td>';
            if(source['debtors'][i].is_active == 1){
                a += '<td><a href="#" class="select-register">' + source['debtors'][i].name + '</a></td>';
            }else{
                a += '<td class="not-allowed-debtor">' + source['debtors'][i].name + '</a></td>';
            }
            a += '<td>' + source['debtors'][i].phone + '</td>' +
                    '<td>' + Math.round(parseFloat(source['debtors'][i].credit_amount) + parseFloat(source['debtors'][i].opening_balance) + parseFloat(source['debtors'][i].return_amount)) + '</td>' +
                    '</tr>';
        }

        $table = $('.debtors-list');
        $table.dataTable().fnDestroy();
        $table.find('tbody').html(a);
        $table.dataTable({ "bDestroy": true });

        $('.no-debtor').hide();
    }
});

$(document).on('click', '.btn-auto-list', function (e) {
    $thisList = $(this);
});

/*to show the clicked name from modal*/
$(document).on('click', '.select-register', function (e) {
    e.stopPropagation();
    e.preventDefault();

    $thisList.parents('.auto-parent').find('.auto-show').val($(this).parents('tr').data('name'));
    $thisList.parents('.auto-parent').find('.auto-i').val($(this).parents('tr').data('id'));

    $('.modal-debtors-list').modal('hide');
});