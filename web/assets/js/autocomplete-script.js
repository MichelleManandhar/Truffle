
var $thisList; var $auto;

$(document).on('click', '.btn-auto-list', function (e) {
    $thisList = $(this);
});

$(document).on('click', '.auto', function (e) {
    e.stopPropagation();
    e.preventDefault();
    $auto = $(this);
});

/***************************************************************************************************************************/
$('.modal-right-all-ledger-master-auto-list').on('shown.bs.modal', function () {
    var source = autoSource(baseUrl+'/ledger/get-all-ledger-master-for-autocomplete');

    if (source != null) {
        var a='';
        for (i = 0; i < source.length; i++) {
            a += '<tr data-id="' + source[i].id + '" data-name="' + source[i].name + '">' +
                    '<td>' + (i + 1) + '</td>' +
                    '<td><a href="#" class="select-all-ledger-master">' + source[i].name + '</a></td>' +
                    '</tr>';
        }

        $('.all-ledger-master-list-table tbody').html(a);
        initDataTable();
    }
});

$(document).on('click', '.select-all-ledger-master', function (e) {
    e.stopPropagation();
    e.preventDefault();

    $thisList.parents('.auto-parent').find('.all-ledger-master-autocomplete').val($(this).parents('tr').data('name'));
    $thisList.parents('.auto-parent').find('.auto-i').val($(this).parents('tr').data('id'));

    $('.modal-right-all-ledger-master-auto-list').modal('hide');
});

/***************************************************************************************************************************/
$('.modal-right-all-ledger-master-no-tax-auto-list').on('shown.bs.modal', function () {
    var source = autoSource(baseUrl+'/ledger/get-all-ledger-master-no-tax-for-autocomplete');

    if (source != null) {
        var a='';
        for (i = 0; i < source.length; i++) {
            a += '<tr data-id="' + source[i].id + '" data-name="' + source[i].name + '">' +
                    '<td>' + (i + 1) + '</td>' +
                    '<td><a href="#" class="select-all-ledger-master-no-tax">' + source[i].name + '</a></td>' +
                    '</tr>';
        }

        $('.all-ledger-master-no-tax-list-table tbody').html(a);
        initDataTable();
    }
});

$(document).on('click', '.select-all-ledger-master-no-tax', function (e) {
    e.stopPropagation();
    e.preventDefault();

    $thisList.parents('.auto-parent').find('.all-ledger-master-no-tax-autocomplete').val($(this).parents('tr').data('name'));
    $thisList.parents('.auto-parent').find('.auto-i').val($(this).parents('tr').data('id'));

    $('.modal-right-all-ledger-master-no-tax-auto-list').modal('hide');
});

/***************************************************************************************************************************/
$('.modal-right-all-ledger-auto-list').on('shown.bs.modal', function () {
    var source = autoSource(baseUrl+'/ledger/get-all-ledger-for-autocomplete');

    if (source != null) {
        var a='';
        for (i = 0; i < source.length; i++) {
            a += '<tr data-id="' + source[i].id + '" data-name="' + source[i].name + '">' +
                    '<td>' + (i + 1) + '</td>' +
                    '<td><a href="#" class="select-all-ledger">' + source[i].name + '</a></td>' +
                    '</tr>';
        }

        $('.all-ledger-list-table tbody').html(a);
        initDataTable();
    }
});

$(document).on('click', '.select-all-ledger', function (e) {
    e.stopPropagation();
    e.preventDefault();

    $thisList.parents('.auto-parent').find('.all-ledger-autocomplete').val($(this).parents('tr').data('name'));
    $thisList.parents('.auto-parent').find('.auto-i').val($(this).parents('tr').data('id'));

    $('.modal-right-all-ledger-auto-list').modal('hide');
});

/***************************************************************************************************************************/
$('.modal-right-custom-ledger-auto-list').on('shown.bs.modal', function () {
    var source = autoSource(baseUrl+'/ledger/get-custom-ledger-for-autocomplete');

    if (source != null) {
        var a='';
        for (i = 0; i < source.length; i++) {
            a += '<tr data-id="' + source[i].id + '" data-name="' + source[i].name + '">' +
                    '<td>' + (i + 1) + '</td>' +
                    '<td><a href="#" class="select-custom-ledger">' + source[i].name + '</a></td>' +
                    '</tr>';
        }

        $('.custom-ledger-list-table tbody').html(a);
        initDataTable();
    }
});

$(document).on('click', '.select-custom-ledger', function (e) {
    e.stopPropagation();
    e.preventDefault();

    $thisList.parents('.auto-parent').find('.custom-ledger-autocomplete').val($(this).parents('tr').data('name'));
    $thisList.parents('.auto-parent').find('.auto-i').val($(this).parents('tr').data('id'));

    $('.modal-right-custom-ledger-auto-list').modal('hide');
});

/***************************************************************************************************************************/
$('.modal-right-register-auto-list').on('shown.bs.modal', function () {
    var source = autoSource(baseUrl+'/ledger/get-register-for-autocomplete'); 

    if (source != null) {
        var a='';
        for (i = 0; i < source.length; i++) {
            a += '<tr data-id="' + source[i].id + '" data-name="' + source[i].name + '">' +
                    '<td>' + (i + 1) + '</td>' +
                    '<td><a href="#" class="select-register">' + source[i].name + '</a></td>' +
                    '</tr>';
        }

        $('.register-list-table tbody').html(a);
        initDataTable();
    }
});

$(document).on('click', '.select-register', function (e) {
    e.stopPropagation();
    e.preventDefault();

    $thisList.parents('.auto-parent').find('.register-autocomplete').val($(this).parents('tr').data('name'));
    $thisList.parents('.auto-parent').find('.auto-i').val($(this).parents('tr').data('id'));

    $('.modal-right-register-auto-list').modal('hide');
});

/***************************************************************************************************************************/
$('.modal-right-cash-ledger-auto-list').on('shown.bs.modal', function () {
    var source = autoSource(baseUrl+'/ledger/get-cash-ledger-for-autocomplete');

    if (source != null) {
        var a='';
        for (i = 0; i < source.length; i++) {
            a += '<tr data-id="' + source[i].id + '" data-name="' + source[i].name + '">' +
                    '<td>' + (i + 1) + '</td>' +
                    '<td><a href="#" class="select-cash-ledger">' + source[i].name + '</a></td>' +
                    '</tr>';
        }

        $('.cash-ledger-list-table tbody').html(a);
        initDataTable();
    }
});

$(document).on('click', '.select-cash-ledger', function (e) {
    e.stopPropagation();
    e.preventDefault();

    $thisList.parents('.auto-parent').find('.cash-ledger-autocomplete').val($(this).parents('tr').data('name'));
    $thisList.parents('.auto-parent').find('.auto-i').val($(this).parents('tr').data('id'));

    $('.modal-right-cash-ledger-auto-list').modal('hide');
});

/***************************************************************************************************************************/
$('.modal-right-bank-ledger-auto-list').on('shown.bs.modal', function () {
    var source = autoSource(baseUrl+'/ledger/get-bank-ledger-for-autocomplete');

    if (source != null) {
        var a='';
        for (i = 0; i < source.length; i++) {
            a += '<tr data-id="' + source[i].id + '" data-name="' + source[i].name + '">' +
                    '<td>' + (i + 1) + '</td>' +
                    '<td><a href="#" class="select-bank-ledger">' + source[i].name + '</a></td>' +
                    '</tr>';
        }

        $('.bank-ledger-list-table tbody').html(a);
        initDataTable();
    }
});

$(document).on('click', '.select-bank-ledger', function (e) {
    e.stopPropagation();
    e.preventDefault();

    $thisList.parents('.auto-parent').find('.bank-ledger-autocomplete').val($(this).parents('tr').data('name'));
    $thisList.parents('.auto-parent').find('.auto-i').val($(this).parents('tr').data('id'));

    $('.modal-right-bank-ledger-auto-list').modal('hide');
});

/***************************************************************************************************************************/
$('.modal-right-tax-ledger-auto-list').on('shown.bs.modal', function () {
    var source = autoSource(baseUrl+'/ledger/get-tax-ledger-for-autocomplete');

    if (source != null) {
        var a='';
        for (i = 0; i < source.length; i++) {
            a += '<tr data-id="' + source[i].id + '" data-name="' + source[i].name + '" data-percentage="' + source[i].percentage + '">' +
                    '<td>' + (i + 1) + '</td>' +
                    '<td><a href="#" class="select-tax-ledger">' + source[i].name + '</a></td>' +
                    '</tr>';
        }

        $('.tax-ledger-list-table tbody').html(a);
        initDataTable();
    }
});

$(document).on('click', '.select-tax-ledger', function (e) {
    e.stopPropagation();
    e.preventDefault();

    $thisList.parents('.auto-parent').find('.tax-ledger-autocomplete').val($(this).parents('tr').data('name'));
    $thisList.parents('.auto-parent').find('.auto-i').val($(this).parents('tr').data('id'));
    $thisList.parents('.auto-parent').find('.auto-percentage').val($(this).parents('tr').data('percentage'));

    $('.modal-right-tax-ledger-auto-list').modal('hide');
});

/***************************************************************************************************************************/
$('.modal-right-supplier-ledger-auto-list').on('shown.bs.modal', function () {
    var source = autoSource(baseUrl+'/ledger/get-supplier-ledger-for-autocomplete');

    if (source != null) {
        var a='';
        for (i = 0; i < source.length; i++) {
            a += '<tr data-id="' + source[i].id + '" data-name="' + source[i].name + '">' +
                    '<td>' + (i + 1) + '</td>' +
                    '<td><a href="#" class="select-supplier-ledger">' + source[i].name + '</a></td>' +
                    '</tr>';
        }

        $('.supplier-ledger-list-table tbody').html(a);
        initDataTable();
    }
});

$(document).on('click', '.select-supplier-ledger', function (e) {
    e.stopPropagation();
    e.preventDefault();

    $thisList.parents('.auto-parent').find('.supplier-ledger-autocomplete').val($(this).parents('tr').data('name'));
    $thisList.parents('.auto-parent').find('.auto-i').val($(this).parents('tr').data('id'));

    $('.modal-right-supplier-ledger-auto-list').modal('hide');
});

/***************************************************************************************************************************/
$('.modal-right-agent-ledger-auto-list').on('shown.bs.modal', function () {
    var source = autoSource(baseUrl+'/ledger/get-agent-ledger-for-autocomplete');

    if (source != null) {
        var a='';
        for (i = 0; i < source.length; i++) {
            a += '<tr data-id="' + source[i].id + '" data-name="' + source[i].name + '">' +
                    '<td>' + (i + 1) + '</td>' +
                    '<td><a href="#" class="select-agent-ledger">' + source[i].name + '</a></td>' +
                    '</tr>';
        }

        $('.agent-ledger-list-table tbody').html(a);
        initDataTable();
    }
});

$(document).on('click', '.select-agent-ledger', function (e) {
    e.stopPropagation();
    e.preventDefault();

    $thisList.parents('.auto-parent').find('.agent-ledger-autocomplete').val($(this).parents('tr').data('name'));
    $thisList.parents('.auto-parent').find('.auto-i').val($(this).parents('tr').data('id'));

    $('.modal-right-agent-ledger-auto-list').modal('hide');
});

/***************************************************************************************************************************/
$('.modal-right-creditor-ledger-auto-list').on('shown.bs.modal', function () {
    var source = autoSource(baseUrl+'/ledger/get-creditor-ledger-for-autocomplete');

    if (source != null) {
        var a='';
        for (i = 0; i < source.length; i++) {
            a += '<tr data-id="' + source[i].id + '" data-name="' + source[i].name + '">' +
                    '<td>' + (i + 1) + '</td>' +
                    '<td><a href="#" class="select-creditor-ledger">' + source[i].name + '</a></td>' +
                    '</tr>';
        }

        $('.creditor-ledger-list-table tbody').html(a);
        initDataTable();
    }
});

$(document).on('click', '.select-creditor-ledger', function (e) {
    e.stopPropagation();
    e.preventDefault();

    $thisList.parents('.auto-parent').find('.creditor-ledger-autocomplete').val($(this).parents('tr').data('name'));
    $thisList.parents('.auto-parent').find('.auto-i').val($(this).parents('tr').data('id'));

    $('.modal-right-creditor-ledger-auto-list').modal('hide');
});

/***************************************************************************************************************************/

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

function allLedgerMasterAuto() {   

    var $input = $('.all-ledger-master-autocomplete');
    var ahead = $input.typeahead({
                    source: function (query, process) { 
                        var source = autoSource(baseUrl+'/ledger/get-all-ledger-master-for-autocomplete');
                        return process(source);
                    },
                    minLength: 1,
                    autoSelect: true,
                    afterSelect: function (item) {
                        $auto.parents('.auto-parent').find('.auto-i').val(item.id);
                    }
                }).on("change", function () {
                    $(this).parents('.auto-parent').find('.auto-i').val('');
                }).on("blur", function () {
                    if ($(this).parents('.auto-parent').find('.auto-i').val() === '') {
                        $(this).val('');
                    }
                }); 
}

function allLedgerMasterNoTaxAuto() {   

    var $input = $('.all-ledger-master-no-tax-autocomplete');
    var ahead = $input.typeahead({
                    source: function (query, process) { 
                        var source = autoSource(baseUrl+'/ledger/get-all-ledger-master-no-tax-for-autocomplete');
                        return process(source);
                    },
                    minLength: 1,
                    autoSelect: true,
                    afterSelect: function (item) {
                        $auto.parents('.auto-parent').find('.auto-i').val(item.id);
                    }
                }).on("change", function () {
                    $(this).parents('.auto-parent').find('.auto-i').val('');
                }).on("blur", function () {
                    if ($(this).parents('.auto-parent').find('.auto-i').val() === '') {
                        $(this).val('');
                    }
                }); 
}

function allLedgerAuto() {   

    var $input = $('.all-ledger-autocomplete');
    var ahead = $input.typeahead({
                    source: function (query, process) {
                        var source = autoSource(baseUrl+'/ledger/get-all-ledger-for-autocomplete');
                        return process(source);
                    }, 
                    minLength: 1,
                    autoSelect: true,
                    afterSelect: function (item) {
                        $auto.parents('.auto-parent').find('.auto-i').val(item.id);
                    }
                }).on("change", function () {
                    $(this).parents('.auto-parent').find('.auto-i').val('');
                }).on("blur", function () {
                    if ($(this).parents('.auto-parent').find('.auto-i').val() === '') {
                        $(this).val('');
                    }
                });
}

function customLedgerAuto() {   

    var $input = $('.custom-ledger-autocomplete');
    var ahead = $input.typeahead({
                    source: function (query, process) {
                        var source = autoSource(baseUrl+'/ledger/get-custom-ledger-for-autocomplete');
                        return process(source);
                    },
                    minLength: 1,
                    autoSelect: true,
                    afterSelect: function (item) {
                        $auto.parents('.auto-parent').find('.auto-i').val(item.id);
                    }
                }).on("change", function () {
                    $(this).parents('.auto-parent').find('.auto-i').val('');
                }).on("blur", function () {
                    if ($(this).parents('.auto-parent').find('.auto-i').val() === '') {
                        $(this).val('');
                    }
                });
}

function registerAuto() { 

    var $input = $('.register-autocomplete');
    var ahead = $input.typeahead({
                    source: function (query, process) {
                        var source = autoSource(baseUrl+'/ledger/get-register-for-autocomplete'); 
                        return process(source);
                    },
                    minLength: 1,
                    autoSelect: true,
                    afterSelect: function (item) {
                        $auto.parents('.auto-parent').find('.auto-i').val(item.id);
                    }
                }).on("change", function () {
                    $(this).parents('.auto-parent').find('.auto-i').val('');
                }).on("blur", function () {
                    if ($(this).parents('.auto-parent').find('.auto-i').val() === '') {
                        $(this).val('');
                    }
                });
}

function cashLedgerAuto() {   

    var $input = $('.cash-ledger-autocomplete');
    var ahead = $input.typeahead({
                    source: function (query, process) {
                        var source = autoSource(baseUrl+'/ledger/get-cash-ledger-for-autocomplete');
                        return process(source);
                    },
                    minLength: 1,
                    autoSelect: true,
                    afterSelect: function (item) {
                        $auto.parents('.auto-parent').find('.auto-i').val(item.id);
                    }
                }).on("change", function () {
                    $(this).parents('.auto-parent').find('.auto-i').val('');
                }).on("blur", function () {
                    if ($(this).parents('.auto-parent').find('.auto-i').val() === '') {
                        $(this).val('');
                    }
                });
}

function bankLedgerAuto() {   

    var $input = $('.bank-ledger-autocomplete');
    var ahead = $input.typeahead({
                    source: function (query, process) {
                        var source = autoSource(baseUrl+'/ledger/get-bank-ledger-for-autocomplete');
                        return process(source);
                    },
                    minLength: 1,
                    autoSelect: true,
                    afterSelect: function (item) {
                        $auto.parents('.auto-parent').find('.auto-i').val(item.id);
                    }
                }).on("change", function () {
                    $(this).parents('.auto-parent').find('.auto-i').val('');
                }).on("blur", function () {
                    if ($(this).parents('.auto-parent').find('.auto-i').val() === '') {
                        $(this).val('');
                    }
                }); 
}

function taxLedgerAuto() {   

    var $input = $('.tax-ledger-autocomplete');
    var ahead = $input.typeahead({
                                source: function (query, process) {
                                    var source = autoSource(baseUrl+'/ledger/get-tax-ledger-for-autocomplete');
                                    return process(source);
                                },
                                minLength: 1,
                                autoSelect: true,
                                afterSelect: function (item) {
                                    $auto.parents('.auto-parent').find('.auto-i').val(item.id);
                                    $auto.parents('.auto-parent').find('.auto-percentage').val(item.percentage);
                                }
                            }).on("change", function () {
                                $(this).parents('.auto-parent').find('.auto-i').val('');
                                $(this).parents('.auto-parent').find('.auto-percentage').val('');
                            }).on("blur", function () {
                                if ($(this).parents('.auto-parent').find('.auto-i').val() === '') {
                                    $(this).val('');
                                    $(this).parents('.auto-parent').find('.auto-percentage').val('');
                                }
                            });
}

function supplierLedgerAuto() {   

    var $input = $('.supplier-ledger-autocomplete');
    var ahead = $input.typeahead({
                    source: function (query, process) {
                        var source = autoSource(baseUrl+'/ledger/get-supplier-ledger-for-autocomplete');
                        return process(source);
                    }, 
                    minLength: 1,
                    autoSelect: true,
                    afterSelect: function (item) {
                        $auto.parents('.auto-parent').find('.auto-i').val(item.id);
                    }
                }).on("change", function () {
                    $(this).parents('.auto-parent').find('.auto-i').val('');
                }).on("blur", function () {
                    if ($(this).parents('.auto-parent').find('.auto-i').val() === '') {
                        $(this).val('');
                    }
                });  
}

function agentLedgerAuto() {   
    
    var $input = $('.agent-ledger-autocomplete');
    var ahead = $input.typeahead({
                    source: function (query, process) {
                        var source = autoSource(baseUrl+'/ledger/get-agent-ledger-for-autocomplete');
                        return process(source);
                    }, 
                    minLength: 1,
                    autoSelect: true,
                    afterSelect: function (item) {
                        $auto.parents('.auto-parent').find('.auto-i').val(item.id);
                    }
                }).on("change", function () {
                    $(this).parents('.auto-parent').find('.auto-i').val('');
                }).on("blur", function () {
                    if ($(this).parents('.auto-parent').find('.auto-i').val() === '') {
                        $(this).val('');
                    }
                });
}

function creditorLedgerAuto() {   

    var $input = $('.creditor-ledger-autocomplete');
    var ahead = $input.typeahead({
                    source: function (query, process) {
                        var source = autoSource(baseUrl+'/ledger/get-creditor-ledger-for-autocomplete');
                        return process(source);
                    }, 
                    minLength: 1,
                    autoSelect: true,
                    afterSelect: function (item) {
                        $auto.parents('.auto-parent').find('.auto-i').val(item.id);
                    }
                }).on("change", function () {
                    $(this).parents('.auto-parent').find('.auto-i').val('');
                }).on("blur", function () {                    
                    if ($(this).parents('.auto-parent').find('.auto-i').val() === '') {
                        $(this).val('');
                    }
                });
}