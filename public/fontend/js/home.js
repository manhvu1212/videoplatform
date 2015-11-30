/**
 * Created by Admin on 10/26/2015.
 */
function getBaseURL () {
    return location.protocol + "//" + location.hostname;
}
var HOME = {
    a_faq_click:function(){
        jQuery('.a_faq').click(function(){
            jQuery('.show-faq').hide();
            jQuery(this).next().show('fast');
        })
    },
    validation_contact:function(){
        var form1 = $('#form-contact');
        form1.validate({
            errorElement: 'span', //default input error message container
            errorClass: 'help-block help-block-error', // default input error message class
            focusInvalid: false, // do not focus the last invalid input
            ignore: "",  // validate all fields including form hidden input
            messages: {
               select_multi: {
                    maxlength: jQuery.validator.format("Max {0} items allowed for selection"),
                    minlength: jQuery.validator.format("At least {0} items must be selected")
                }
            },
            rules: {
                name: {
                    minlength: 2,
                    required: true
                },
                email: {
                    email: true,
                    required: true
                },
                message: {
                    required: true
                },

            },
        });
    },
    login_signup_2:function(){

        jQuery('.register-step1').click(function(){
            if(jQuery('#check-id-1').is(":checked")){
                window.location.href = getBaseURL()+'/register-step1';
            }else {
                Alert('You must read the policy Mainstar and Terms of Use.','Mainstar', function () {
                })
            }
        });
    },
    showmenumobi:function () {
        jQuery(".cate-show-pa").click(function () {
            jQuery(".menu-mobile").slideToggle();
        });
        jQuery("#cb-mob-close").click(function () {
            jQuery(".menu-mobile").slideToggle();
        });
    },
    forms_docusign:function(){
      jQuery('.h4_title').click(function(){
          jQuery('.item-faq').hide();
            jQuery(this).next().show('fast');
      });
    },
}

jQuery(document).ready(function(){
    HOME.showmenumobi();
    HOME.a_faq_click();
    HOME.validation_contact();
    HOME.login_signup_2();
    HOME.forms_docusign();


});
function check_faq_search(){
    if(jQuery('#title').val()=='' || jQuery('#title').val()==null){
        return false;
        jQuery('#title').focus();
    }
    return true;
}