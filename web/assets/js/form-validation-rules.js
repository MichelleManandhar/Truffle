
 /*author : gaurav maharjan
 */

/* ============================= Validation Rules for all Forms  ============================= */
    $.validator.addMethod("ifChecked", function (value, element) { 
        $(element).closest('.form-group').find('.help-block').remove(); 
        return ($(element).parents('.ifChecked-parent').find(".onlyOne").is(':checked') && (value == null || value == '')) ? false : true;
    }, 'This field is required.');

    $.validator.addMethod("ifNotChecked", function (value, element) { 
        $(element).closest('.form-group').find('.help-block').remove();
        return (!$(element).parents('.ifNotChecked-parent').find(".onlyOne").is(':checked') && (value == null || value == '')) ? false : true;
    }, 'This field is required.');

    $.validator.addMethod("atleastone", function (value, element, param) { ; 
        $(element).closest('.form-group').find('.help-block').remove();
        return ($(".atleastone:checkbox:checked").length > 0) ? true : false;
    }, "You must select at least one!");

    jQuery.validator.addClassRules({
        'ifChecked-required': {
            ifChecked: true
        },
        'ifNotChecked-required': {
            ifNotChecked: true
        },
        'atleastone': {
            atleastone: true
        }
    });

    jQuery.validator.addMethod("greaterThan", function(value, element, params) {
        if ($(params[0]).val() != '') {    
            if (!/Invalid|NaN/.test(new Date(value))) {
                return new Date(value) >= new Date($(params[0]).val());
            }    
            return isNaN(value) && isNaN($(params[0]).val()) || (Number(value) > Number($(params[0]).val()));
        };
        return true; 
    },'Must be greater than {1}.');


/********************************************************************************/
    var blank_msg = { };
    var blank_rule = { };
/********************************************************************************/

    var password_rules = {
                        old_password:{
                            required:true
                        },
                        new_password: {
                            required: true
                        },
                        re_password: {
                            required: true,
                            equalTo:'.new-password'
                        }
                    };

    var password_msgs = { 
                        re_password : { 
                            equalTo : "Retype password didn't match with new password."
                        }
                    };

    $('.change-password-form').validate({
        errorElement: "span", // contain the error msg in a small tag
        errorClass: 'help-block',
        // render error placement for each input type
        errorPlacement: function (error, element) { 
                    
            element.parent().find('.help-block').remove();

             // for chosen elements, need to insert the error after the chosen container
            if (element.attr("type") == "radio" || element.attr("type") == "checkbox") {
                error.insertAfter($(element).closest('.form-group').children('div').children().last());
            } 
            else {
                element.after(error.clone());
                // for other inputs, just perform default behavior
            } 
        },
        highlight: function (element) {
            $(element).closest('.help-block').removeClass('valid');
            $(element).closest('.form-group').removeClass('has-success').addClass('has-error');
            // add the Bootstrap error class to the control group
        },
        unhighlight: function (element) { // revert the change done by hightlight
            $(element).closest('.form-group').removeClass('has-error').addClass('has-success');
            // set error class to the control group
        },
        success: function (label, element) { 
            label.addClass('help-block valid');
            // mark the current input as valid
            $(element).closest('.form-group').removeClass('has-error').addClass('has-success');
        },
        rules: password_rules,
        messages : password_msgs
    });

/********************************************************************************/

    var pin_rules = {
                        password:{
                            required:true
                        },
                        new_pin: {
                            required: true
                        },
                        re_pin: {
                            required: true,
                            equalTo:'.new-pin-code'
                        }
                    };

    var pin_msgs = { 
                        re_password : { 
                            equalTo : "Retype pin code didn't match with new pin code."
                        }
                    };

    $('.change-pin-code-form').validate({
        errorElement: "span", // contain the error msg in a small tag
        errorClass: 'help-block',
        // render error placement for each input type
        errorPlacement: function (error, element) { 
                    
            element.parent().find('.help-block').remove();

             // for chosen elements, need to insert the error after the chosen container
            if (element.attr("type") == "radio" || element.attr("type") == "checkbox") {
                error.insertAfter($(element).closest('.form-group').children('div').children().last());
            } 
            else {
                element.after(error.clone());
                // for other inputs, just perform default behavior
            } 
        },
        highlight: function (element) {
            $(element).closest('.help-block').removeClass('valid');
            $(element).closest('.form-group').removeClass('has-success').addClass('has-error');
            // add the Bootstrap error class to the control group
        },
        unhighlight: function (element) { // revert the change done by hightlight
            $(element).closest('.form-group').removeClass('has-error').addClass('has-success');
            // set error class to the control group
        },
        success: function (label, element) { 
            label.addClass('help-block valid');
            // mark the current input as valid
            $(element).closest('.form-group').removeClass('has-error').addClass('has-success');
        },
        rules: pin_rules,
        messages : pin_msgs
    });

    /********************************************************************************/
    var user_rules = {
                        name:{
                            required:true
                        },
                        username:{
                            required:true,
                            remote: {
                                url: baseUrl+"/user/check-username",
                                type: "post"
                            }
                        },
                        address:{
                            required:true
                        },
                        mobile:{
                            required:true,
                            number: true
                        },
                        position:{
                            required:true
                        },
                        email:{
                            required:true,
                            email:true,
                            remote:{
                                url: baseUrl+"/user/check-email",
                                type:"POST"
                            }
                        },
                        password:{
                            required:true
                        },
                        repassword:{
                            required:true,
                            equalTo:'#password'
                        },
                        role: {
                            required: true
                        },
                        company: {
                            required: true
                        },
                        discount_upto: {
                            max: 90
                        }
                    };

    var user_msgs = { 
                        username : { 
                            remote : 'Username already exists in the system.'
                        },
                        email : { 
                            remote : 'Email already exists in the system.'
                        } 
                    };

    $('.user-form').validate({
        errorElement: "span", // contain the error msg in a small tag
        errorClass: 'help-block',
        // render error placement for each input type
        errorPlacement: function (error, element) { 
                    
            element.parent().find('.help-block').remove();

             // for chosen elements, need to insert the error after the chosen container
            if (element.attr("type") == "radio" || element.attr("type") == "checkbox") {
                error.insertAfter($(element).closest('.form-group').children('div').children().last());
            } 
            else {
                element.after(error.clone());
                // for other inputs, just perform default behavior
            } 
        },
        highlight: function (element) {
            $(element).closest('.help-block').removeClass('valid');
            $(element).closest('.form-group').removeClass('has-success').addClass('has-error');
            // add the Bootstrap error class to the control group
        },
        unhighlight: function (element) { // revert the change done by hightlight
            $(element).closest('.form-group').removeClass('has-error').addClass('has-success');
            // set error class to the control group
        },
        success: function (label, element) { 
            label.addClass('help-block valid');
            // mark the current input as valid
            $(element).closest('.form-group').removeClass('has-error').addClass('has-success');
        },
        ignore: "",
        rules: user_rules,
        messages : user_msgs
    });

    /********************************************************************************/
    var setting_rules = {
                            field_name: {
                                required: true,
                                remote: {
                                    url: baseUrl+"/settings/check",
                                    type: "post"
                                }
                            },
                            value: {
                                required: true
                            }
                        };

    var setting_msgs = { field_name : { remote : 'Setting field name already exists in the system.'} };

    $('.settings').validate({
        errorElement: "span", // contain the error msg in a small tag
        errorClass: 'help-block',
        // render error placement for each input type
        errorPlacement: function (error, element) { 
                    
            element.parent().find('.help-block').remove();

             // for chosen elements, need to insert the error after the chosen container
            if (element.attr("type") == "radio" || element.attr("type") == "checkbox") {
                error.insertAfter($(element).closest('.form-group').children('div').children().last());
            } else if (element.hasClass("ckeditor")) {
                error.appendTo($(element).closest('.form-group'));
            } else {
                //error.insertAfter(element);
                element.after(error.clone());
                // for other inputs, just perform default behavior
            } 
        },
        highlight: function (element) {
            $(element).closest('.help-block').removeClass('valid');
            $(element).closest('.form-group').removeClass('has-success').addClass('has-error');
            // add the Bootstrap error class to the control group
        },
        unhighlight: function (element) { // revert the change done by hightlight
            $(element).closest('.form-group').removeClass('has-error').addClass('has-success');
            // set error class to the control group
        },
        success: function (label, element) { 
            label.addClass('help-block valid');
            // mark the current input as valid
            $(element).closest('.form-group').removeClass('has-error').addClass('has-success');
        },
        ignore: "",
        rules: setting_rules,
        messages : setting_msgs
    });

    /********************************************************************************/

    var menu_item_rules = {
                            name: {
                                required: true,
                                remote: {
                                    url: baseUrl+"/menu-item/check",
                                    type: "post"
                                }
                            },
                            price: {
                                required: true,
                                number: true
                            },
                            category_id: {
                                required: true
                            }
                        };

    var menu_item_msgs = { name : { remote : 'Item name already exists in the system.'} };

    $('.menu-item').validate({
        errorElement: "span", // contain the error msg in a small tag
        errorClass: 'help-block',
        // render error placement for each input type
        errorPlacement: function (error, element) { 
                    
            element.parent().find('.help-block').remove();

             // for chosen elements, need to insert the error after the chosen container
            if (element.attr("type") == "radio" || element.attr("type") == "checkbox") {
                error.insertAfter($(element).closest('.form-group').children('div').children().last());
            } else if (element.hasClass("ckeditor")) {
                error.appendTo($(element).closest('.form-group'));
            } else {
                //error.insertAfter(element);
                element.after(error.clone());
                // for other inputs, just perform default behavior
            } 
        },
        highlight: function (element) {
            $(element).closest('.help-block').removeClass('valid');
            $(element).closest('.form-group').removeClass('has-success').addClass('has-error');
            // add the Bootstrap error class to the control group
        },
        unhighlight: function (element) { // revert the change done by hightlight
            $(element).closest('.form-group').removeClass('has-error').addClass('has-success');
            // set error class to the control group
        },
        success: function (label, element) { 
            label.addClass('help-block valid');
            // mark the current input as valid
            $(element).closest('.form-group').removeClass('has-error').addClass('has-success');
        },
        ignore: "",
        rules: menu_item_rules,
        messages : menu_item_msgs
    });

    var special_item_rules = {
                            name: {
                                required: true,
                                remote: {
                                    url: baseUrl+"/menu-item/check",
                                    type: "post"
                                }
                            },
                            price: {
                                required: true,
                                number: true
                            },
                            category_id: {
                                required: true
                            },
                            remarks: {
                                required: true
                            }
                        };

    var special_item_msgs = { name : { remote : 'Item name already exists in the system.'} };

    $('.add-special-order-item').validate({
        errorElement: "span", // contain the error msg in a small tag
        errorClass: 'help-block',
        // render error placement for each input type
        errorPlacement: function (error, element) { 
                    
            element.parent().find('.help-block').remove();

             // for chosen elements, need to insert the error after the chosen container
            if (element.attr("type") == "radio" || element.attr("type") == "checkbox") {
                error.insertAfter($(element).closest('.form-group').children('div').children().last());
            } else if (element.hasClass("ckeditor")) {
                error.appendTo($(element).closest('.form-group'));
            } else {
                //error.insertAfter(element);
                element.after(error.clone());
                // for other inputs, just perform default behavior
            } 
        },
        highlight: function (element) {
            $(element).closest('.help-block').removeClass('valid');
            $(element).closest('.form-group').removeClass('has-success').addClass('has-error');
            // add the Bootstrap error class to the control group
        },
        unhighlight: function (element) { // revert the change done by hightlight
            $(element).closest('.form-group').removeClass('has-error').addClass('has-success');
            // set error class to the control group
        },
        success: function (label, element) { 
            label.addClass('help-block valid');
            // mark the current input as valid
            $(element).closest('.form-group').removeClass('has-error').addClass('has-success');
        },
        ignore: "",
        rules: special_item_rules,
        messages : special_item_msgs
    });

    /********************************************************************************/

    /********************************************************************************/

    var edit_id = $('.edit-menu-item-form').find('.hidden-item-id').val();
    var menu_item_edit_rules = {
                            name: {
                                required: true,
                                remote: {
                                    url: baseUrl+"/menu-item/check",
                                    type: "post",
                                    data: {id : edit_id}
                                }
                            },
                            price: {
                                required: true,
                                number: true
                            },
                            category_id: {
                                required: true
                            }
                        };

    var menu_item_edit_msgs = { name : { remote : 'Item name already exists in the system.'} };

    $('.edit-menu-item-form').validate({
        errorElement: "span", // contain the error msg in a small tag
        errorClass: 'help-block',
        // render error placement for each input type
        errorPlacement: function (error, element) { 
                    
            element.parent().find('.help-block').remove();

             // for chosen elements, need to insert the error after the chosen container
            if (element.attr("type") == "radio" || element.attr("type") == "checkbox") {
                error.insertAfter($(element).closest('.form-group').children('div').children().last());
            } else if (element.hasClass("ckeditor")) {
                error.appendTo($(element).closest('.form-group'));
            } else {
                //error.insertAfter(element);
                element.after(error.clone());
                // for other inputs, just perform default behavior
            } 
        },
        highlight: function (element) {
            $(element).closest('.help-block').removeClass('valid');
            $(element).closest('.form-group').removeClass('has-success').addClass('has-error');
            // add the Bootstrap error class to the control group
        },
        unhighlight: function (element) { // revert the change done by hightlight
            $(element).closest('.form-group').removeClass('has-error').addClass('has-success');
            // set error class to the control group
        },
        success: function (label, element) { 
            label.addClass('help-block valid');
            // mark the current input as valid
            $(element).closest('.form-group').removeClass('has-error').addClass('has-success');
        },
        ignore: "",
        rules: menu_item_edit_rules,
        messages : menu_item_edit_msgs
    });

    /********************************************************************************/

    var menu_category_rules = {
                            category: {
                                required: true,
                                remote: {
                                    url: baseUrl+"/menu-category/check",
                                    type: "post"
                                }
                            },
                            category_type: {
                                required: true
                            }
                        };

    var menu_category_msgs = { category : { remote : 'Category name already exists in the system.'} };

    $('.menu-category').validate({
        errorElement: "span", // contain the error msg in a small tag
        errorClass: 'help-block',
        // render error placement for each input type
        errorPlacement: function (error, element) { 
                    
            element.parent().find('.help-block').remove();

             // for chosen elements, need to insert the error after the chosen container
            if (element.attr("type") == "radio" || element.attr("type") == "checkbox") {
                error.insertAfter($(element).closest('.form-group').children('div').children().last());
            } else if (element.hasClass("ckeditor")) {
                error.appendTo($(element).closest('.form-group'));
            } else {
                //error.insertAfter(element);
                element.after(error.clone());
                // for other inputs, just perform default behavior
            } 
        },
        highlight: function (element) {
            $(element).closest('.help-block').removeClass('valid');
            $(element).closest('.form-group').removeClass('has-success').addClass('has-error');
            // add the Bootstrap error class to the control group
        },
        unhighlight: function (element) { // revert the change done by hightlight
            $(element).closest('.form-group').removeClass('has-error').addClass('has-success');
            // set error class to the control group
        },
        success: function (label, element) { 
            label.addClass('help-block valid');
            // mark the current input as valid
            $(element).closest('.form-group').removeClass('has-error').addClass('has-success');
        },
        ignore: "",
        rules: menu_category_rules,
        messages : menu_category_msgs
    });

    /********************************************************************************/

    jQuery.validator.addMethod('selectcheck', function (value) {
        return (value != '');
    }, "Table required");

    var book_rules = {
                        customer_name:{
                            required:true
                        },
                        /*floor:{
                            required:true,
                            number: true
                        },
                        selected_table:{
                            selectcheck:true
                        },*/
                        customer_phone:{
                            required:true,
                            number: true,
                            minlength: 7,
                            maxlength: 15
                        },
                        date:{
                            required:true,
                            date: true,
                            // greaterThan:["#today","Today"]
                        },
                        start_time:{
                            required:true
                        },
                        end_time:{
                            required:true
                           // greaterThan:["#start_time","Start Time"]
                        },
                        customer_pax: {
                            required: true,
                            number: true
                        }
                    };
    var book_msg  = {
        date:{
            greaterThan: "Can't choose date before today"
        }
    };

    $('.table-book-now').validate({
        errorElement: "span", // contain the error msg in a small tag
        errorClass: 'help-block',
        // render error placement for each input type
        errorPlacement: function (error, element) { 
                    
            element.parent().find('.help-block').remove();

             // for chosen elements, need to insert the error after the chosen container
            if (element.attr("type") == "radio" || element.attr("type") == "checkbox") {
                error.insertAfter($(element).closest('.form-group').children('div').children().last());
            }
            else {
                element.after(error.clone());
                // for other inputs, just perform default behavior
            } 
        },
        highlight: function (element) {
            $(element).closest('.help-block').removeClass('valid');
            $(element).closest('.form-group').removeClass('has-success').addClass('has-error');
            // add the Bootstrap error class to the control group
        },
        unhighlight: function (element) { // revert the change done by hightlight
            $(element).closest('.form-group').removeClass('has-error').addClass('has-success');
            // set error class to the control group
        },
        success: function (label, element) { 
            label.addClass('help-block valid');
            // mark the current input as valid
            $(element).closest('.form-group').removeClass('has-error').addClass('has-success');
        },
        ignore: "hidden",
        rules: book_rules,
        messages : book_msg
    });

    $('.booking-list-table-book-now').validate({
        errorElement: "span", // contain the error msg in a small tag
        errorClass: 'help-block',
        // render error placement for each input type
        errorPlacement: function (error, element) { 
                    
            element.parent().find('.help-block').remove();

             // for chosen elements, need to insert the error after the chosen container
            if (element.attr("type") == "radio" || element.attr("type") == "checkbox") {
                error.insertAfter($(element).closest('.form-group').children('div').children().last());
            } 
            else {
                element.after(error.clone());
                // for other inputs, just perform default behavior
            } 
        },
        highlight: function (element) {
            $(element).closest('.help-block').removeClass('valid');
            $(element).closest('.form-group').removeClass('has-success').addClass('has-error');
            // add the Bootstrap error class to the control group
        },
        unhighlight: function (element) { // revert the change done by hightlight
            $(element).closest('.form-group').removeClass('has-error').addClass('has-success');
            // set error class to the control group
        },
        success: function (label, element) { 
            label.addClass('help-block valid');
            // mark the current input as valid
            $(element).closest('.form-group').removeClass('has-error').addClass('has-success');
        },
        ignore: "",
        rules: book_rules,
        messages : book_msg
    });

    /********************************************************************************/

    var debtor_rules = {
            debtor_name:{
                required: true
            },
            debtor_phone:{
                required:true,
                number: true,
                minlength: 7,
                maxlength: 15
            },
            debtor_address:{
                required: true
            }
        };

    $('.add-debtor').validate({
        errorElement: "span", // contain the error msg in a small tag
        errorClass: 'help-block',
        // render error placement for each input type
        errorPlacement: function (error, element) { 
                    
            element.parent().find('.help-block').remove();

             // for chosen elements, need to insert the error after the chosen container
            if (element.attr("type") == "radio" || element.attr("type") == "checkbox") {
                error.insertAfter($(element).closest('.form-group').children('div').children().last());
            } 
            else {
                element.after(error.clone());
                // for other inputs, just perform default behavior
            } 
        },
        highlight: function (element) {
            $(element).closest('.help-block').removeClass('valid');
            $(element).closest('.form-group').removeClass('has-success').addClass('has-error');
            // add the Bootstrap error class to the control group
        },
        unhighlight: function (element) { // revert the change done by hightlight
            $(element).closest('.form-group').removeClass('has-error').addClass('has-success');
            // set error class to the control group
        },
        success: function (label, element) { 
            label.addClass('help-block valid');
            // mark the current input as valid
            $(element).closest('.form-group').removeClass('has-error').addClass('has-success');
        },
        ignore: "",
        rules: debtor_rules,
        messages : blank_msg
    });

    $('.admin-add-debtor').validate({
        errorElement: "span", // contain the error msg in a small tag
        errorClass: 'help-block',
        // render error placement for each input type
        errorPlacement: function (error, element) { 
                    
            element.parent().find('.help-block').remove();

             // for chosen elements, need to insert the error after the chosen container
            if (element.attr("type") == "radio" || element.attr("type") == "checkbox") {
                error.insertAfter($(element).closest('.form-group').children('div').children().last());
            } 
            else {
                element.after(error.clone());
                // for other inputs, just perform default behavior
            } 
        },
        highlight: function (element) {
            $(element).closest('.help-block').removeClass('valid');
            $(element).closest('.form-group').removeClass('has-success').addClass('has-error');
            // add the Bootstrap error class to the control group
        },
        unhighlight: function (element) { // revert the change done by hightlight
            $(element).closest('.form-group').removeClass('has-error').addClass('has-success');
            // set error class to the control group
        },
        success: function (label, element) { 
            label.addClass('help-block valid');
            // mark the current input as valid
            $(element).closest('.form-group').removeClass('has-error').addClass('has-success');
        },
        ignore: "",
        rules: debtor_rules,
        messages : blank_msg
    });

    /********************************************************************************/
    // var edit_id = $('.table-edit-id').val();
    function validate_table_name(edit_id) {
        var table_detail_edit_rules = {
                table_name:{
                    required: true,
                    remote: {
                        url: baseUrl+"/table/check-table-name",
                        type: "post",
                        data: {id : edit_id}
                    }
                },
                table_code:{
                    required: true,
                    remote: {
                        url: baseUrl+"/table/check-table-code",
                        type: "post",
                        data: {id : edit_id}
                    }
                }
            };

        var table_detail_edit_msgs = { 
            table_name : { remote : 'Table Name already exists in the system.'},
            table_code : { remote : 'Table Code already exists in the system.'} 
        };

        $('.update-table-details').validate({
            errorElement: "span", // contain the error msg in a small tag
            errorClass: 'help-block',
            // render error placement for each input type
            errorPlacement: function (error, element) { 
                        
                element.parent().find('.help-block').remove();

                 // for chosen elements, need to insert the error after the chosen container
                if (element.attr("type") == "radio" || element.attr("type") == "checkbox") {
                    error.insertAfter($(element).closest('.form-group').children('div').children().last());
                } 
                else {
                    element.after(error.clone());
                    // for other inputs, just perform default behavior
                } 
            },
            highlight: function (element) {
                $(element).closest('.help-block').removeClass('valid');
                $(element).closest('.form-group').removeClass('has-success').addClass('has-error');
                // add the Bootstrap error class to the control group
            },
            unhighlight: function (element) { // revert the change done by hightlight
                $(element).closest('.form-group').removeClass('has-error').addClass('has-success');
                // set error class to the control group
            },
            success: function (label, element) { 
                label.addClass('help-block valid');
                // mark the current input as valid
                $(element).closest('.form-group').removeClass('has-error').addClass('has-success');
            },
            ignore: "",
            rules: table_detail_edit_rules,
            messages : table_detail_edit_msgs
        });
    }

    function validate_obstacle_name(edit_id) {
        var obstacle_detail_edit_rules = {
                obstacle_name:{
                    required: true,
                    remote: {
                        url: baseUrl+"/obstacle/check-obstacle-name",
                        type: "post",
                        data: {id : edit_id}
                    }
                }
            };

        var obstacle_detail_edit_msgs = { obstacle_name : { remote : 'Obstacle Name already exists in the system.'} };

        $('.update-obstacle-details').validate({
            errorElement: "span", // contain the error msg in a small tag
            errorClass: 'help-block',
            // render error placement for each input type
            errorPlacement: function (error, element) { 
                        
                element.parent().find('.help-block').remove();

                 // for chosen elements, need to insert the error after the chosen container
                if (element.attr("type") == "radio" || element.attr("type") == "checkbox") {
                    error.insertAfter($(element).closest('.form-group').children('div').children().last());
                } 
                else {
                    element.after(error.clone());
                    // for other inputs, just perform default behavior
                } 
            },
            highlight: function (element) {
                $(element).closest('.help-block').removeClass('valid');
                $(element).closest('.form-group').removeClass('has-success').addClass('has-error');
                // add the Bootstrap error class to the control group
            },
            unhighlight: function (element) { // revert the change done by hightlight
                $(element).closest('.form-group').removeClass('has-error').addClass('has-success');
                // set error class to the control group
            },
            success: function (label, element) { 
                label.addClass('help-block valid');
                // mark the current input as valid
                $(element).closest('.form-group').removeClass('has-error').addClass('has-success');
            },
            ignore: "",
            rules: obstacle_detail_edit_rules,
            messages : obstacle_detail_edit_msgs
        });
    }

    /********************************************************************************/

    var move_booking = {
            floor:{
                required: true
            },
            table:{
                required: true
            }
        };

    $('.move-booking-details').validate({
        errorElement: "span", // contain the error msg in a small tag
        errorClass: 'help-block',
        // render error placement for each input type
        errorPlacement: function (error, element) { 
                    
            element.parent().find('.help-block').remove();

             // for chosen elements, need to insert the error after the chosen container
            if (element.attr("type") == "radio" || element.attr("type") == "checkbox") {
                error.insertAfter($(element).closest('.form-group').children('div').children().last());
            } 
            else {
                element.after(error.clone());
                // for other inputs, just perform default behavior
            } 
        },
        highlight: function (element) {
            $(element).closest('.help-block').removeClass('valid');
            $(element).closest('.form-group').removeClass('has-success').addClass('has-error');
            // add the Bootstrap error class to the control group
        },
        unhighlight: function (element) { // revert the change done by hightlight
            $(element).closest('.form-group').removeClass('has-error').addClass('has-success');
            // set error class to the control group
        },
        success: function (label, element) { 
            label.addClass('help-block valid');
            // mark the current input as valid
            $(element).closest('.form-group').removeClass('has-error').addClass('has-success');
        },
        ignore: "",
        rules: move_booking,
        messages : blank_msg
    });

    /********************************************************************************/

    var move_occupied = {
            floor:{
                required: true
            },
            table:{
                required: true
            }
        };

    $('.move-occupied-details').validate({
        errorElement: "span", // contain the error msg in a small tag
        errorClass: 'help-block',
        // render error placement for each input type
        errorPlacement: function (error, element) { 
                    
            element.parent().find('.help-block').remove();

             // for chosen elements, need to insert the error after the chosen container
            if (element.attr("type") == "radio" || element.attr("type") == "checkbox") {
                error.insertAfter($(element).closest('.form-group').children('div').children().last());
            } 
            else {
                element.after(error.clone());
                // for other inputs, just perform default behavior
            } 
        },
        highlight: function (element) {
            $(element).closest('.help-block').removeClass('valid');
            $(element).closest('.form-group').removeClass('has-success').addClass('has-error');
            // add the Bootstrap error class to the control group
        },
        unhighlight: function (element) { // revert the change done by hightlight
            $(element).closest('.form-group').removeClass('has-error').addClass('has-success');
            // set error class to the control group
        },
        success: function (label, element) { 
            label.addClass('help-block valid');
            // mark the current input as valid
            $(element).closest('.form-group').removeClass('has-error').addClass('has-success');
        },
        ignore: "",
        rules: move_occupied,
        messages : blank_msg
    });
    /********************************************************************************/

    /* pick up form validation */

    $('.pick-up-form').validate({
        errorElement: "span", // contain the error msg in a small tag
        errorClass: 'help-block',
        // render error placement for each input type
        errorPlacement: function (error, element) { 
                    
            element.parent().find('.help-block').remove();

             // for chosen elements, need to insert the error after the chosen container
            if (element.attr("type") == "radio" || element.attr("type") == "checkbox") {
                error.insertAfter($(element).closest('.form-group').children('div').children().last());
            } 
            else {
                element.after(error.clone());
                // for other inputs, just perform default behavior
            } 
        },
        highlight: function (element) {
            $(element).closest('.help-block').removeClass('valid');
            $(element).closest('.form-group').removeClass('has-success').addClass('has-error');
            // add the Bootstrap error class to the control group
        },
        unhighlight: function (element) { // revert the change done by hightlight
            $(element).closest('.form-group').removeClass('has-error').addClass('has-success');
            // set error class to the control group
        },
        success: function (label, element) { 
            label.addClass('help-block valid');
            // mark the current input as valid
            $(element).closest('.form-group').removeClass('has-error').addClass('has-success');
        },
        ignore: "",
        rules: {
            customer_name:{
                required: true
            },
            customer_phone:{
                required:true,
                number: true,
                minlength: 7,
                maxlength: 15
            },
            customer_pan:{
                number: true,
                minlength: 9,
                maxlength: 9
            }
        },
        messages : blank_msg
    });

    /* pick up form validation */

    $('.delivery-form').validate({
        errorElement: "span", // contain the error msg in a small tag
        errorClass: 'help-block',
        // render error placement for each input type
        errorPlacement: function (error, element) { 
                    
            element.parent().find('.help-block').remove();

             // for chosen elements, need to insert the error after the chosen container
            if (element.attr("type") == "radio" || element.attr("type") == "checkbox") {
                error.insertAfter($(element).closest('.form-group').children('div').children().last());
            } 
            else {
                element.after(error.clone());
                // for other inputs, just perform default behavior
            } 
        },
        highlight: function (element) {
            $(element).closest('.help-block').removeClass('valid');
            $(element).closest('.form-group').removeClass('has-success').addClass('has-error');
            // add the Bootstrap error class to the control group
        },
        unhighlight: function (element) { // revert the change done by hightlight
            $(element).closest('.form-group').removeClass('has-error').addClass('has-success');
            // set error class to the control group
        },
        success: function (label, element) { 
            label.addClass('help-block valid');
            // mark the current input as valid
            $(element).closest('.form-group').removeClass('has-error').addClass('has-success');
        },
        ignore: "",
        rules: {
            customer_name:{
                required: true
            },
            customer_address:{
                required: true
            },
            customer_phone:{
                required:true,
                number: true,
                minlength: 7,
                maxlength: 15
            },
            customer_pan:{
                number: true,
                minlength: 9,
                maxlength: 9
            }
        },
        messages : blank_msg
    });

    $('.debtor-payment').validate({
        errorElement: "span", // contain the error msg in a small tag
        errorClass: 'help-block',
        // render error placement for each input type
        errorPlacement: function (error, element) { 
                    
            element.parent().find('.help-block').remove();

             // for chosen elements, need to insert the error after the chosen container
            if (element.attr("type") == "radio" || element.attr("type") == "checkbox") {
                error.insertAfter($(element).closest('.form-group').children('div').children().last());
            }
            else if (element.hasClass('sub-input-group')) {
                element.parents('.input-group').after(error.clone());
            } 
            else {
                element.after(error.clone());
                // for other inputs, just perform default behavior
            } 
        },
        highlight: function (element) {
            $(element).closest('.help-block').removeClass('valid');
            $(element).closest('.form-group').removeClass('has-success').addClass('has-error');
            // add the Bootstrap error class to the control group
        },
        unhighlight: function (element) { // revert the change done by hightlight
            $(element).closest('.form-group').removeClass('has-error').addClass('has-success');
            // set error class to the control group
        },
        success: function (label, element) { 
            label.addClass('help-block valid');
            // mark the current input as valid
            $(element).closest('.form-group').removeClass('has-error').addClass('has-success');
        },
        ignore: ":hidden",
        rules:{
            debtor_name: "required",
            paid_amount: "required",
        },
        messages: blank_msg
    });

/********************************************************************************/

var profile = {
    image:{
        required: true
    }
};

$('.profile-picture').validate({
    errorElement: "span", // contain the error msg in a small tag
    errorClass: 'help-block',
    // render error placement for each input type
    errorPlacement: function (error, element) {

        element.parent().find('.help-block').remove();

        // for chosen elements, need to insert the error after the chosen container
        if (element.attr("type") == "radio" || element.attr("type") == "checkbox") {
            error.insertAfter($(element).closest('.form-group').children('div').children().last());
        }
        else {
            element.after(error.clone());
            // for other inputs, just perform default behavior
        }
    },
    highlight: function (element) {
        $(element).closest('.help-block').removeClass('valid');
        $(element).closest('.form-group').removeClass('has-success').addClass('has-error');
        // add the Bootstrap error class to the control group
    },
    unhighlight: function (element) { // revert the change done by hightlight
        $(element).closest('.form-group').removeClass('has-error').addClass('has-success');
        // set error class to the control group
    },
    success: function (label, element) {
        label.addClass('help-block valid');
        // mark the current input as valid
        $(element).closest('.form-group').removeClass('has-error').addClass('has-success');
    },
    ignore: "",
    rules: profile,
    messages : blank_msg
});

 /********************************************************************************/

 var printer_rules = {
     name:{
         required: true,
         remote: {
             url: baseUrl+"/printer/check-name",
             type: "post"
         }
     },
     printer_name:{
         required: true
     }
 };

 var printer_msgs =  {
     name : {
         remote : 'Name already exists in the system.'
     }
 };

 $('.printers').validate({
     errorElement: "span", // contain the error msg in a small tag
     errorClass: 'help-block',
     // render error placement for each input type
     errorPlacement: function (error, element) {

         element.parent().find('.help-block').remove();

         // for chosen elements, need to insert the error after the chosen container
         if (element.attr("type") == "radio" || element.attr("type") == "checkbox") {
             error.insertAfter($(element).closest('.form-group').children('div').children().last());
         }
         else {
             element.after(error.clone());
             // for other inputs, just perform default behavior
         }
     },
     highlight: function (element) {
         $(element).closest('.help-block').removeClass('valid');
         $(element).closest('.form-group').removeClass('has-success').addClass('has-error');
         // add the Bootstrap error class to the control group
     },
     unhighlight: function (element) { // revert the change done by hightlight
         $(element).closest('.form-group').removeClass('has-error').addClass('has-success');
         // set error class to the control group
     },
     success: function (label, element) {
         label.addClass('help-block valid');
         // mark the current input as valid
         $(element).closest('.form-group').removeClass('has-error').addClass('has-success');
     },
     ignore: "",
     rules: printer_rules,
     messages : printer_msgs
 });

 /********************************************************************************/

 var advance_rules = {
    advance_paid:{
        required: true
    }
 };

 $('.advance-payment').validate({
     errorElement: "span", // contain the error msg in a small tag
     errorClass: 'help-block',
     // render error placement for each input type
     errorPlacement: function (error, element) {

         element.parent().find('.help-block').remove();

         // for chosen elements, need to insert the error after the chosen container
         if (element.attr("type") == "radio" || element.attr("type") == "checkbox") {
             error.insertAfter($(element).closest('.form-group').children('div').children().last());
         }
         else {
             element.after(error.clone());
             // for other inputs, just perform default behavior
         }
     },
     highlight: function (element) {
         $(element).closest('.help-block').removeClass('valid');
         $(element).closest('.form-group').removeClass('has-success').addClass('has-error');
         // add the Bootstrap error class to the control group
     },
     unhighlight: function (element) { // revert the change done by hightlight
         $(element).closest('.form-group').removeClass('has-error').addClass('has-success');
         // set error class to the control group
     },
     success: function (label, element) {
         label.addClass('help-block valid');
         // mark the current input as valid
         $(element).closest('.form-group').removeClass('has-error').addClass('has-success');
     },
     ignore: ":hidden",
     rules: advance_rules,
     messages : blank_msg
 });

 var delivery_charge_rules = {
    delivery_charge_amount:{
        required: true
    },
    vat_status:{
        required: true
    }
 };

 $('.delivery-charge-form').validate({
     errorElement: "span", // contain the error msg in a small tag
     errorClass: 'help-block',
     // render error placement for each input type
     errorPlacement: function (error, element) {

         element.parent().find('.help-block').remove();

         // for chosen elements, need to insert the error after the chosen container
         if (element.attr("type") == "radio" || element.attr("type") == "checkbox") {
             error.insertAfter($(element).closest('.form-group').children('div').children().last());
         }
         else {
             element.after(error.clone());
             // for other inputs, just perform default behavior
         }
     },
     highlight: function (element) {
         $(element).closest('.help-block').removeClass('valid');
         $(element).closest('.form-group').removeClass('has-success').addClass('has-error');
         // add the Bootstrap error class to the control group
     },
     unhighlight: function (element) { // revert the change done by hightlight
         $(element).closest('.form-group').removeClass('has-error').addClass('has-success');
         // set error class to the control group
     },
     success: function (label, element) {
         label.addClass('help-block valid');
         // mark the current input as valid
         $(element).closest('.form-group').removeClass('has-error').addClass('has-success');
     },
     ignore: ":hidden",
     rules: delivery_charge_rules,
     messages : blank_msg
 });

/********************************************************************************/

var product_rules = {
                        name: {
                            required: true,
                            remote: {
                                url: baseUrl+"/product-manager/check",
                                type: "post"
                            }
                        },
                        quantity: {
                            number: true
                        },
                        quantity_type: {
                            required: true
                        }
                    };

var product_msgs = { name : { remote : 'Product name already exists in the system.'} };

$('.add-product').validate({
    errorElement: "span", // contain the error msg in a small tag
    errorClass: 'help-block',
    // render error placement for each input type
    errorPlacement: function (error, element) { 
                
        element.parent().find('.help-block').remove();

         // for chosen elements, need to insert the error after the chosen container
        if (element.attr("type") == "radio" || element.attr("type") == "checkbox") {
            error.insertAfter($(element).closest('.form-group').children('div').children().last());
        } else if (element.hasClass("ckeditor")) {
            error.appendTo($(element).closest('.form-group'));
        } else {
            //error.insertAfter(element);
            element.after(error.clone());
            // for other inputs, just perform default behavior
        } 
    },
    highlight: function (element) {
        $(element).closest('.help-block').removeClass('valid');
        $(element).closest('.form-group').removeClass('has-success').addClass('has-error');
        // add the Bootstrap error class to the control group
    },
    unhighlight: function (element) { // revert the change done by hightlight
        $(element).closest('.form-group').removeClass('has-error').addClass('has-success');
        // set error class to the control group
    },
    success: function (label, element) { 
        label.addClass('help-block valid');
        // mark the current input as valid
        $(element).closest('.form-group').removeClass('has-error').addClass('has-success');
    },
    ignore: "",
    rules: product_rules,
    messages : product_msgs
});

/********************************************************************************/

/********************************************************************************/

 var member_rules = {
    name:{
        required: true
    },
    phone:{
        required: true,
        maxlength:15,
        remote: {
            url: baseUrl+"/member/check-membership-phone",
            type: "post"
        }
    },
    email:{
        required:true,
        email:true
    },
    membership_number:{
        required:true,
        remote: {
            url: baseUrl+"/member/check-membership-number",
            type: "post"
        }
    },
    membership_type:{
        required:true
    },
    issued_date:{
        required:true,
        date:true
    },
    valid_date:{
        required:true,
        date:true
    }
 };

 var member_msg =  {
    phone:{
        remote: 'Phone Number already exists.'
    },
    email : {
        remote : 'Email address is not valid.'
    },
    membership_number : {
        remote : 'Membership number already exists.'
    }
 };

 $('.member-form').validate({
     errorElement: "span", // contain the error msg in a small tag
     errorClass: 'help-block',
     // render error placement for each input type
     errorPlacement: function (error, element) {

         element.parent().find('.help-block').remove();

         // for chosen elements, need to insert the error after the chosen container
         if (element.attr("type") == "radio" || element.attr("type") == "checkbox") {
             error.insertAfter($(element).closest('.form-group').children('div').children().last());
         }
         else {
             element.after(error.clone());
             // for other inputs, just perform default behavior
         }
     },
     highlight: function (element) {
         $(element).closest('.help-block').removeClass('valid');
         $(element).closest('.form-group').removeClass('has-success').addClass('has-error');
         // add the Bootstrap error class to the control group
     },
     unhighlight: function (element) { // revert the change done by hightlight
         $(element).closest('.form-group').removeClass('has-error').addClass('has-success');
         // set error class to the control group
     },
     success: function (label, element) {
         label.addClass('help-block valid');
         // mark the current input as valid
         $(element).closest('.form-group').removeClass('has-error').addClass('has-success');
     },
     ignore: "",
     rules: member_rules,
     messages : member_msg
 });

 /********************************************************************************/

/********************************************************************************/
    var member_id = $('.member-edit-form').find('.hidden-member-id').val();                
    var member_edit_rules = {
        name:{
            required: true
        },
        phone:{
            required: true,
            maxlength:15,
            remote: {
                url: baseUrl+"/member/check-membership-phone",
                type: "post",
                data: {member_id : member_id}
            }
        },
        email:{
            required:true,
            email:true
        },
        membership_number:{
            required:true,
            remote: {
                url: baseUrl+"/member/check-membership-number",
                type: "post",
                data: {member_id : member_id}
            }
        },
        membership_type:{
            required:true
        },
        issued_date:{
            required:true,
            date:true
        },
        valid_date:{
            required:true,
            date:true
        }
    };

    var member_edit_msg =  {
        phone:{
            remote: 'Phone Number already exists'
        },
        email : {
            remote : 'Email address is not valid.'
        },
        membership_number : {
            remote : 'Membership number already exists.'
        }
    };

    $('.member-edit-form').validate({
        errorElement: "span", // contain the error msg in a small tag
        errorClass: 'help-block',
        // render error placement for each input type
        errorPlacement: function (error, element) {

            element.parent().find('.help-block').remove();

            // for chosen elements, need to insert the error after the chosen container
            if (element.attr("type") == "radio" || element.attr("type") == "checkbox") {
                error.insertAfter($(element).closest('.form-group').children('div').children().last());
            }
            else {
                element.after(error.clone());
                // for other inputs, just perform default behavior
            }
        },
        highlight: function (element) {
            $(element).closest('.help-block').removeClass('valid');
            $(element).closest('.form-group').removeClass('has-success').addClass('has-error');
            // add the Bootstrap error class to the control group
        },
        unhighlight: function (element) { // revert the change done by hightlight
            $(element).closest('.form-group').removeClass('has-error').addClass('has-success');
            // set error class to the control group
        },
        success: function (label, element) {
            label.addClass('help-block valid');
            // mark the current input as valid
            $(element).closest('.form-group').removeClass('has-error').addClass('has-success');
        },
        ignore: "",
        rules: member_edit_rules,
        messages : member_edit_msg
    });
/********************************************************************************/

/********************************************************************************/            
    var threshold_rules = {
        threshold_amount:{
            required: true
        },
        threshold_end_amount:{
            required: true
        }
    };

    $('.privillege-threshold-form').validate({
        errorElement: "span", // contain the error msg in a small tag
        errorClass: 'help-block',
        // render error placement for each input type
        errorPlacement: function (error, element) {

            element.parent().find('.help-block').remove();

            // for chosen elements, need to insert the error after the chosen container
            if (element.attr("type") == "radio" || element.attr("type") == "checkbox") {
                error.insertAfter($(element).closest('.form-group').children('div').children().last());
            }
            else {
                element.after(error.clone());
                // for other inputs, just perform default behavior
            }
        },
        highlight: function (element) {
            $(element).closest('.help-block').removeClass('valid');
            $(element).closest('.form-group').removeClass('has-success').addClass('has-error');
            // add the Bootstrap error class to the control group
        },
        unhighlight: function (element) { // revert the change done by hightlight
            $(element).closest('.form-group').removeClass('has-error').addClass('has-success');
            // set error class to the control group
        },
        success: function (label, element) {
            label.addClass('help-block valid');
            // mark the current input as valid
            $(element).closest('.form-group').removeClass('has-error').addClass('has-success');
        },
        ignore: "",
        rules: threshold_rules,
        messages : blank_msg
    });
/********************************************************************************/