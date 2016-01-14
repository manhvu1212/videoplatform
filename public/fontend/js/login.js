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

var SINGUP = {
    signup: function () {
        jQuery('#form_sign_up').validate({
            errorElement: 'span',
            errorClass: 'help-block help-block-error',
            rules: {
                first_name: {
                    required: true
                },
                last_name: {
                    required: true
                },
                email: {
                    email: true,
                    required: true
                },
                password: {
                    required: true
                },
                retype_password: {
                    required: true,
                    equalTo: '#password'
                }
            },
            submitHandler: function () {
                var data = jQuery('#form_sign_up').serialize();
                jQuery.ajax({
                    url: getBaseURL() + '/user/signup',
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
    SINGUP.signup();
});

