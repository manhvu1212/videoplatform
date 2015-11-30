/**
 * Created by Admin on 10/26/2015.
 */
var REGISTER = {

    validation_register_step1:function(){
        var form1 = $('#register_step1');
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
                first_name: {
                    minlength: 2,
                    required: true
                },
                last_name: {
                    minlength: 2,
                    required: true
                },
                email: {
                    email: true,
                    required: true
                },
                Social_Security_Number1: {
                    required: true,
                    number: true,
                    minlength: 3,
                    maxlength: 3,
                },
                Social_Security_Number2: {
                    required: true,
                    number: true,
                    minlength: 2,
                    maxlength: 2,
                },
                Social_Security_Number3: {
                    required: true,
                    number: true,
                    minlength: 4,
                    maxlength: 4,
                },
                month_birth: {
                    number: true,
                    required: true,
                },
                date_birth: {
                    number: true,
                    required: true
                },

                year_birth: {
                    number: true,
                    required: true,
                    minlength: 4,
                    maxlength: 4,
                },
                address_line1: {
                    required: true
                },
                address_city: {
                    required: true
                },
                address_state: {
                    required: true
                },
                address_zip: {
                    number: true,
                    required: true
                },
                address_country: {
                    required: true
                },
            },

            submitHandler: function (form) {
                emailRegExp = /^[_a-zA-Z0-9-]+(\.[_a-zA-Z0-9-]+)*@[a-zA-Z0-9-]+(\.[a-zA-Z0-9-]+)*(\.([a-zA-Z]){2,4})$/;
                var email = jQuery("#email").val();
                if(!emailRegExp.test(email)){
                    Alert('Incorrect email','Mainstar', function () {});
                    jQuery("#email").focus();
                    return false;
                }
                month = parseInt(jQuery('.month_birth').val());
                if(month<=0 || month>12){
                    jQuery('.month_birth').focus();
                    return false;
                }
                day = parseInt(jQuery('.date_birth').val());
                if(day<=0 || day>31){
                    jQuery('.date_birth').focus();
                    return false;
                }
                var currentTime = new Date();
                var year1 = currentTime.getFullYear()-15;
                year = parseInt(jQuery('.year_birth').val());
                if(year<=year1-150 || year>year1) {
                    jQuery('.year_birth').focus();
                    return false;
                }

                if(month==2 && day>28){
                    jQuery('.date_birth').focus();
                    return false;
                }

                return true;
            }
        });

    },
    validation_register_step2:function(){
        var form1 = $('#register_step2');
        form1.validate({
            errorElement: 'span', //default input error message container
            errorClass: 'help-block help-block-error', // default input error message class
            focusInvalid: false, // do not focus the last invalid input
            ignore: ".ignore", // validate all fields including form hidden input
            messages: {
                select_multi: {
                    maxlength: jQuery.validator.format("Max {0} items allowed for selection"),
                    minlength: jQuery.validator.format("At least {0} items must be selected")
                }
            },
         rules: {
                Send_By: {
                    minlength: 2,
                    required: true
                },
                Type_of_Service: {
                    minlength: 2,
                    required: true
                },
                Billing_Number: {
                    number: true,
                    required: true
                },
                 trustee_name:{
                     required: true
                 },
             trustee_account_name:{
                 required: true
             },
             amout:{required: true},
             trustee_account_number:{required: true},
             address_line1:{required: true},
             address_city:{required: true},
             address_state:{required: true},
             address_zip:{required: true},
             address_country:{required: true},
             Recharacterization_name:{required: true},
             Recharacterization_address:{required: true},
             Recharacterization_city:{required: true},
             Recharacterization_state:{required: true},
             Recharacterization_zip:{required: true},
             Recharacterization_country:{required: true},
             Account_Identification_Number:{required: true},
             Custodian_Phone_Number:{required: true},
             Amount_Contribution:{required: true},
             Amount_Contribution2:{required: true},
             Conversion_Date:{required: true,minlength: 2,maxlength: 2, number:true},
             Conversion_month:{required: true,minlength: 2,maxlength: 2, number:true},
             Conversion_year:{
                 required: true,
                 number:true,
                 minlength: 4,
                 maxlength: 4},
             Tax_Year:{required: true,number:true},
             Recharacterization_Instructions:{required: true},
            },
            submitHandler: function (form) {
                var a = jQuery('.check_option:checked').val();
                if(a=='Option1' && jQuery('.radio_option11:checked').val()=='No' && jQuery('.radio_option12:checked').val()=='No' && jQuery('.radio_option13:checked').val()=='No' && jQuery('.radio_option14:checked').val()=='No'){
                    jQuery('.span_tb1').show();
                    jQuery('.span_tb2').hide();
                    return false;
                }else if(a=='Option2' && jQuery('.radio_option21:checked').val()=='No' && jQuery('.radio_option22:checked').val()=='No' && jQuery('.radio_option23:checked').val()=='No' && jQuery('.radio_option24:checked').val()=='No' && jQuery('.radio_option25:checked').val()=='No' && jQuery('.radio_option26:checked').val()=='No'){
                    jQuery('.span_tb2').show();
                    jQuery('.span_tb1').hide();
                    return false;
                }

                if(jQuery('.check_transfer:checked').val()=='3'){
                    ok=0;
                    jQuery('.check_option').each(function(){
                        if(jQuery(this).is(':checked')) ok=1;
                    });
                    if(ok==0) {
                        Alert('Please check Option1 or Option 2 and the comfirmation section','Mainstar', function () {});
                        return false;
                    }
                }

                if(jQuery('.check_transfer:checked').val()=='3' && jQuery('#check-id-234').is(":checked")==false){
                    Alert('Please check Confirmation','Mainstar', function () {});
                    return false;
                }
                if(jQuery('.check_transfer:checked').val()=='4' && jQuery('#check-id-2341').is(":checked")==false){
                    Alert('Please check Confirmation','Mainstar', function () {});
                    return false;
                }
                return true;
            }
        });
    },
    validation_register_step3:function(){
        var form1 = $('#register_step3');
        form1.validate({
            errorElement: 'span', //default input error message container
            errorClass: 'help-block help-block-error', // default input error message class
            focusInvalid: false, // do not focus the last invalid input
            ignore: ".ignore", // validate all fields including form hidden input
            messages: {
                select_multi: {
                    maxlength: jQuery.validator.format("Max {0} items allowed for selection"),
                    minlength: jQuery.validator.format("At least {0} items must be selected")
                }
            },
            rules: {
                "share[]": {required: true, number:true, maxlength:3},
                "first_name[]": {required: true},
                "last_name[]": {required: true},
                "Social_Security_Number1[]": {required: true, number:true, minlength: 3, maxlength: 3},
                "Social_Security_Number2[]": {required: true, number:true, minlength: 2, maxlength: 2},
                "Social_Security_Number3[]": {required: true, number:true, minlength: 4, maxlength: 4},
                "month_birth[]": {required: true, number:true,maxlength: 2},
                "date_birth[]": {required: true, number:true,maxlength: 2},
                "year_birth[]": {required: true, number:true, minlength: 4,maxlength: 4},
                "address_line1[]": {required: true},
                "address_city[]": {required: true},
                "address_state[]": {required: true},
                "address_zip[]": {required: true},
                "address_country[]": {required: true},
                "truct_name[]": {required: true},

            },

            submitHandler: function (form) {
                ok=0;
                jQuery('.relationship').each(function(){

                    if(jQuery(this).val()=='') {
                        jQuery(this).focus();
                        ok=1
                    }

                });
                ok2=0;
                if(ok==1) return false;
                else{
                    var y =  parseInt(jQuery('#share_user').val());
                    if(y!=100)
                    {
                        jQuery('.pb-need-a').show();
                        jQuery('.share').focus();
                            ok2=1
                    }
                }
                if(ok2==1) return false;


                return true;
            }

        });
    },
    validation_register_step4:function(){
        var form1 = $('#register_step4');
        form1.validate({
            errorElement: 'span', //default input error message container
            errorClass: 'help-block help-block-error', // default input error message class
            focusInvalid: false, // do not focus the last invalid input
            ignore: ".ignore", // validate all fields including form hidden input
            messages: {
                select_multi: {
                    maxlength: jQuery.validator.format("Max {0} items allowed for selection"),
                    minlength: jQuery.validator.format("At least {0} items must be selected")
                }
            },
            rules: {
                zipcode: {number:true},
                Email_Address: {email:true},
            },
        });
    },

    register_step1:function(){
        //Close popup
        jQuery('.x_close').click(function(){
           jQuery('#div_pop').hide();
           jQuery('#background').hide();
        });
        //check_my_mailing
        jQuery('.my_mailing:checkbox').change(function () {
            if(jQuery(this).is(":checked"))
                jQuery('.div_mailing').show();
            else
                jQuery('.div_mailing').hide();
        });
        jQuery('.check_married').click(function(){
            jQuery('.check_married').prop('checked', false);
            jQuery(this).prop('checked', true);
        });
        //checked_contribution
        jQuery('.checked_contribution').click(function(){
            jQuery('.checked_contribution').prop('checked', false);
            jQuery(this).prop('checked', true);
            var stt = jQuery(this).val();
            if(stt==0) {
                jQuery('.contribution').hide();
                jQuery('.contribution_Regular').hide();
            }
            else if(stt==1) {
                jQuery('.contribution').show();
                jQuery('.contribution_Regular').show();

            }
            else{
                jQuery('.contribution').show();
                jQuery('.contribution1').hide();
                jQuery('.contribution_Regular').hide();
            }
            if(stt==2){
                jQuery('.amout').removeClass('ignore');
            }else{
                jQuery('.amout').addClass('ignore');
            }
            update_step2();
        });
        //Check_transfer
        jQuery('.check_transfer').click(function(){
            jQuery('.check_transfer').prop('checked', false);
            jQuery(this).prop('checked', true);

            var stt = jQuery(this).val();
            jQuery('.p_pro').hide();
            jQuery('.p_pro'+stt).show();
            if(stt==1 || stt==2){
                jQuery('.transfer').hide();
                jQuery('.transfer1').show();
                jQuery(".transfer1 .validation").each(function(){
                    jQuery(this).removeClass('ignore');
                });

            }
            else{

                jQuery('.transfer').hide();
                jQuery(".transfer1 .validation").each(function(){
                    jQuery(this).addClass('ignore');
                });
            }
            if(stt==2) jQuery('.transfer2').show();
            else jQuery('.transfer2').hide();

            if(stt==3){
                jQuery('.transfer3').show();
                jQuery(".transfer3 .validation").each(function(){
                    jQuery(this).removeClass('ignore');
                });
            }
            else {
                jQuery('.transfer3').hide();
                jQuery(".transfer3 .validation").each(function(){
                    jQuery(this).addClass('ignore');
                });
            }

            if(stt==4) {
                jQuery('.transfer4').show();
                jQuery(".transfer4 .validation").each(function(){
                    jQuery(this).removeClass('ignore');
                });
            }
            else {
                jQuery('.transfer4').hide();
                jQuery(".transfer4 .validation").each(function(){
                    jQuery(this).addClass('ignore');
                });
            }
            update_step2();
        });
        //transfer_rollover
        jQuery('.transfer_rollover').click(function(){
            jQuery('.transfer_rollover').prop('checked', false);
            jQuery(this).prop('checked', true);
            var stt = jQuery(this).val();
            if(stt==1){
                jQuery('.div_Liquidate').show();
            }
            else{
                jQuery('.div_Liquidate').hide();
            }

            if(stt==2){
                jQuery('.div_Transfer').show();
            }
            else jQuery('.div_Transfer').hide();
            if(stt==3){
                jQuery('.div_Transfer_assets').show();
            }
            else jQuery('.div_Transfer_assets').hide();

        });

    },
    register_step2:function(){
        jQuery('.check_option1').click(function(){
            jQuery('.Option2').hide();
            jQuery('.Option1').show();
        });
        jQuery('.check_option2').click(function(){
            jQuery('.Option1').hide();
            jQuery('.Option2').show();
        });

    },
    check_submit_step2 :function(){
        jQuery('.checked_contribution').each(function () {
            if(jQuery(this).is(":checked")){
                x= jQuery(this).val();
            }
        });
        jQuery('.check_transfer').each(function () {
            if(jQuery(this).is(":checked")){
                y= jQuery(this).val();
            }
        });
        if(x==0 && y==0){
            jQuery('.p_error').show();
                return false;

        }else{
            jQuery('.p_error').hide();
            return true;
        }
    },

    register_step3:function(){
        jQuery('#div_beneficiary').on('change','.relationship',function(){
            vl = jQuery(this).attr('data');
            stt = jQuery(this).val();

            if(stt=='Trust'){
                jQuery('.truct_name_'+vl).show();
                jQuery('.p_truste').show();
                jQuery('.Beneficiary_Name'+vl).hide();
                jQuery('.Beneficiary_Name'+vl+' .validation').each(function(){
                    jQuery(this).addClass('ignore');
                });
                jQuery('.truct_name_'+vl+' .validation').each(function(){
                    jQuery(this).removeClass('ignore');
                });

            }else if(stt=='Spouse' || stt=='Non-spousal') {
                jQuery('.p_truste').hide();
                jQuery('.Beneficiary_Name'+vl).show();
                jQuery('.Beneficiary_Name'+vl+' .validation').each(function(){
                    jQuery(this).removeClass('ignore');
                });
                jQuery('.truct_name_'+vl+' .validation').each(function(){
                    jQuery(this).addClass('ignore');
                });
            }else{
                jQuery('.truct_name_'+vl).hide();
                jQuery('.p_truste').hide();
                jQuery('.Beneficiary_Name'+vl).hide();
                jQuery('.Beneficiary_Name'+vl+' .validation').each(function(){
                    jQuery(this).addClass('ignore');
                });
                jQuery('.truct_name_'+vl+' .validation').each(function(){
                    jQuery(this).addClass('ignore');
                });
            }
        });
        jQuery('#div_beneficiary').on('click','.delete_beneficiary',function(){
            id = jQuery(this).attr('data');
            jQuery('.beneficiary_'+id).remove();
            stt = parseInt(jQuery('#Beneficiary_stt').val())-1;
            jQuery('#Beneficiary_stt').val(stt);
            update_share();
        });
        jQuery('#div_beneficiary').on('change','.share',function() {
            user = 0;
            var z = parseInt(jQuery(this).val());
            jQuery('#div_beneficiary .share').each(function () {
                user = user + parseInt(jQuery(this).val());
            });
            if (user > 100) {
                jQuery(this).focus();
                jQuery(this).val(100-(user-z));
                user=100;
            }
                jQuery('#share_user').val(user);
                jQuery('.user').html(user + '%');
                jQuery('.non-user').html(100 - user + '% Remaining');
                jQuery('.user').css('width', user + '%');

            if (user == 100) jQuery('.pb-need-a').hide();
            else jQuery('.pb-need-a').show();
        });

        jQuery('#add_beneficiary').click(function () {
            id = parseInt(jQuery('#Beneficiary').val())+1;
            stt = parseInt(jQuery('#Beneficiary_stt').val())+1;
            jQuery('#Beneficiary').val(id);
            jQuery('#Beneficiary_stt').val(stt);
            data = {
                id:id,stt:stt
            };
            jQuery('#row_create_template_beneficiary').tmpl( data ).appendTo( "#div_beneficiary");
        });

        //Change date
        jQuery('#div_beneficiary').on('change','.month_birth',function(){
            month = parseInt(jQuery(this).val());
            if(month<=0 || month>12){
                jQuery(this).focus();
                jQuery(this).val('12');
            }
            day1=parseInt(jQuery(this).parent().next().children().val());

            if(month==2 && day1>28){
                jQuery(this).parent().next().children().focus();
                jQuery(this).parent().next().children().val('28')
            }
        });
        jQuery('#div_beneficiary').on('change','.date_birth',function(){
            day = parseInt(jQuery(this).val());
            if(day<=0 || day>31){
                jQuery(this).focus();
                jQuery(this).val('31');
            }
            month=parseInt(jQuery(this).parent().prev().children().val());

            if(month==2 && day>28){
                jQuery(this).focus();
                jQuery(this).val('28');
            }
        });

        jQuery('#div_beneficiary').on('change','.year_birth',function(){
            var currentTime = new Date();
            var year1 = currentTime.getFullYear()-15;
            year = parseInt(jQuery(this).val());
            if(year<=year1-150 || year>year1) {
                jQuery(this).focus();
                jQuery(this).val(year1);
            }
        });

    },


    register_step4:function(){
        jQuery('.Invoice_Options').click(function(){
           if(jQuery(this).val()=='ACH') {
               jQuery('.div_ach').show();
           }
            else{
               jQuery('.div_ach').hide();
           }
        });
        jQuery('.Quarterly_Electronic').click(function(){
            if(jQuery(this).is(":checked"))
                jQuery('#div_check').show();
            else
                jQuery('#div_check').hide();
        });
    },
        check_register1:function(){
            if(strip_tags(jQuery('#first_name').val())==''){
                jQuery('#first_name').focus();
                return false;
            }
            else if(strip_tags(jQuery('#last_name').val())==''){
                jQuery('#last_name').focus();
                return false;
            }else if(strip_tags(jQuery('#address_country').val())==''){
                jQuery('#address_country').focus();
                return false;
            }else if(strip_tags(jQuery('#address_city').val())==''){
                jQuery('#address_city').focus();
                return false;
            }else if(strip_tags(jQuery('#address_state').val())==''){
                jQuery('#address_state').focus();
                return false;
            }else if(strip_tags(jQuery('#address_zip').val())==''){
                jQuery('#address_zip').focus();
                return false;
            }
            return true;
        },
    update_input:function(){
        jQuery('.container input').change(function(){
            b=strip_tags(jQuery(this).val());
            jQuery(this).val(b.trim());
        });
    }
}


jQuery(document).ready(function(){
    REGISTER.validation_register_step1();
    REGISTER.validation_register_step2();
    REGISTER.validation_register_step3();
    REGISTER.validation_register_step4();
    REGISTER.register_step1();
    REGISTER.register_step2();
    REGISTER.register_step3();
    REGISTER.register_step4();
    REGISTER.update_input();


});
function update_share(){
    user=0;
    jQuery('#div_beneficiary .share').each(function () {
        user = user + parseInt(jQuery(this).val());
    });
    jQuery('#share_user').val(user);
    jQuery('.user').html(user + '%');
    jQuery('.non-user').html(100 - user + '% Remaining');
    jQuery('.user').css('width', user + '%');
};
function update_step2(){
    jQuery('.checked_contribution').each(function () {
        if(jQuery(this).is(":checked")){
            x= jQuery(this).val();
        }
    });
    jQuery('.check_transfer').each(function () {
        if(jQuery(this).is(":checked")){
            y= jQuery(this).val();
        }
    });
    if(x==0 && y==0){
        jQuery('.p_error').show();
    }else{
        jQuery('.p_error').hide();

    }
};
function strip_tags(input, allowed) {
    input=input.trim();
    allowed = (((allowed || '') + '')
        .toLowerCase()
        .match(/<[a-z][a-z0-9]*>/g) || [])
        .join(''); // making sure the allowed arg is a string containing only tags in lowercase (<a><b><c>)
    var tags = /<\/?([a-z][a-z0-9]*)\b[^>]*>/gi,
        commentsAndPhpTags = /<!--[\s\S]*?-->|<\?(?:php)?[\s\S]*?\?>/gi;
    return input.replace(commentsAndPhpTags, '')
        .replace(tags, function($0, $1) {
            return allowed.indexOf('<' + $1.toLowerCase() + '>') > -1 ? $0 : '';
        });
}
