/**
 * Created by Admin on 13/01/2016.
 */

var LOGIN = {
    login: function () {

        jQuery('#form_login').validate({
            errorElement: 'span',
            errorClass: 'help-block help-block-error',
            rules: {
                email: {
                    email: true,
                    required: true
                },
                password: {
                    required: true
                }
            },
            submitHandler: function () {
                var data = jQuery('#form_login').serialize();
                jQuery.ajax({
                    url: getBaseURL() + '/user/check_login',
                    type: "post",
                    data: data,
                    dataType: 'json',
                    success: function (data) {
                        if(data == 1) {
                            window.location.reload();
                        }
                    }
                });
            }
        });
    }
};

jQuery(document).ready(function () {
    LOGIN.login();
});

