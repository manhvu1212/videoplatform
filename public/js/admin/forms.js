var FORM = {

    change_status:function(){
        try{
            jQuery(".switch-mini").bootstrapSwitch().on("switchChange.bootstrapSwitch", function (event, state) {
                var id = jQuery(this).attr('data-id');
                if(state == true){
                    state = 1;
                }else{
                    state = 0;
                }
                jQuery.ajax({
                    url:getBaseURL()+'/manager/form/change_status',
                    type:'post',
                    dataType:'json',
                    data:{activated:state,_token:jQuery('#_token').val(),id:id},
                    success:function(data){

                    }

                })
            });
        }catch (e){}

    },
    delete: function () {
        jQuery('.delete-item').click(function () {
            var name = jQuery(this).attr('data-name');
            var aids = new Array();
            aids[0] = jQuery(this).attr('data-id');
            var _token = jQuery('#_token').val();
            Confirm('Are you want to delete "'+name+'"','Message', function (r) {
                if(r){
                    jQuery.ajax({
                        url:getBaseURL()+'/manager/form/destroy',
                        type:'post',
                        data:{aids:aids,_token:_token},
                        success: function (data) {
                            window.location.reload()
                        }
                    })
                }
            })
        })
    },
    deletemulti: function () {
        jQuery('.product-delete-multi').click(function(){
            var count = jQuery('.checkone:checked').length;
            var aids = {};
            if(count == 0){
                Alert('Please select item for delete','');
                return false;
            }else{
                var i = 0;
                jQuery('.checkone:checked').each(function(){
                    aids[i] = jQuery(this).val();
                    i++;
                })
                Confirm('Are you sure you want to delete?','',function(r){
                    if(r){
                        jQuery.ajax({
                            url: getBaseURL()+'/manager/form/destroy',
                            data:{_token:jQuery('#_token').val(), aids:aids},
                            type:'POST',
                            dataType:'json',
                            success:function(data){
                                window.location.reload();
                            }
                        })
                    }

                });
            }
        });
    },

    validation_form:function(){
        var form1 = $('#form-add');
        var error1 = $('.alert-danger', form1);
        var success1 = $('.alert-success', form1);

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
                title: {
                    minlength: 2,
                    required: true
                },
                summary: {
                    required: true
                },


            },

            invalidHandler: function (event, validator) { //display error alert on form submit
                success1.hide();
                error1.show();
                Metronic.scrollTo(error1, -200);
            },

            highlight: function (element) { // hightlight error inputs
                $(element)
                    .closest('.form-group').addClass('has-error'); // set error class to the control group
            },

            unhighlight: function (element) { // revert the change done by hightlight
                $(element)
                    .closest('.form-group').removeClass('has-error'); // set error class to the control group
            },

            success: function (label) {
                label
                    .closest('.form-group').removeClass('has-error'); // set success class to the control group
            },

            submitHandler: function (form) {
                success1.show();
                error1.hide();
                var data = jQuery('#form-add').serialize();
                jQuery.ajax({
                    url:getBaseURL()+'/manager/form/save',
                    data:data,
                    type:"post",
                    dataType:'json',
                    success:function(data){
                       window.location.href=getBaseURL()+'/manager/form';
                    }
                });
                return false;
            }
        });

    },


    initselect: function () {
        try{
            jQuery("#select-category").select2();

        }catch (e){console.log(e)}
    },
}

jQuery(document).ready(function(){
    FORM.change_status();
    FORM.delete();
    FORM.deletemulti();
    FORM.validation_form();
    FORM.initselect();

});
