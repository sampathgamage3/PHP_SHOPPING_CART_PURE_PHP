jQuery('document').ready(function () {
    //browser resize
    jQuery(window).resize(function () {
       jQuery('body').css('max-width',jQuery(window).width());
        
    });
    jQuery("#loginform").validate({
        rules: {
            modlgn_username: {required: true},
            modlgn_passwd: {required: true}
        },
        messages: {
            modlgn_username: { required: "Please enter your Username"},
            modlgn_passwd: { required: "Please enter Password"}
        }
    });
    jQuery("#register_form").validate({
       rules: {
            reg_first_name: {required: true,minlength: 3},
            reg_last_name: {required: true,minlength: 3},
            reg_username: {required: true,minlength: 3},
            reg_password: {required: true,minlength: 3},
            reg_email: {required: true,email: true}
        },
        messages: {
            reg_first_name: { required: "Please enter your First name",minlength: "First Name must consist of at least 3 characters" },
            reg_last_name: { required: "Please enter your Last name",minlength: "Last Name must consist of at least 3 characters"},
            reg_username: { required: "Please enter Username",minlength: "Address must consist of at least 3 characters"},
            reg_password: { required: "Please enter Password",minlength: "Address must consist of at least 3 characters" },
            reg_email: "Please enter a valid email"
        }
    });
    
});