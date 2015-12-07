var POST = {

    tinymceconfig:function(){
        try{
            tinymce.init({
                mode: 'specific_textareas',
                editor_selector : "content_post",
                theme_advanced_font_sizes: "10px,12px,13px,14px,16px,18px,20px",
                font_size_style_values : "10px,12px,13px,14px,16px,18px,20px",
                fontsize_formats: "8pt 10pt 12pt 14pt 18pt 24pt 36pt",
                remove_script_host : false,
                convert_urls : false,
                relative_urls : false,
                plugins: [
                    "advlist autolink lists link image charmap print preview anchor",
                    "searchreplace visualblocks code fullscreen",
                    "insertdatetime media table contextmenu paste",'files'
                ],
                toolbar: "files | insertfile undo redo  | fontsizeselect | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image"
            });
        }catch (e){}
    },
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
                    url:getBaseURL()+'/manager/posts/change_status',
                    type:'post',
                    dataType:'json',
                    data:{activated:state,_token:jQuery('#_token').val(),id:id},
                    success:function(data){

                    }

                })
            });
        }catch (e){}

    },
    change_frame:function(){
        try{
            jQuery(".switch_change_frame").bootstrapSwitch().on("switchChange.bootstrapSwitch", function (event, state) {
                var id = jQuery(this).attr('data-id');
                if(state == true){
                    state = 1;
                }else{
                    state = 0;
                }
                jQuery.ajax({
                    url:getBaseURL()+'/manager/form/change_frame',
                    type:'post',
                    dataType:'json',
                    data:{activated:state,_token:jQuery('#_token').val(),id:id},
                    success:function(data){

                    }

                })
            });
        }catch (e){}

    },

    change_check_id:function(){
        try{
            jQuery(".switch_change_check_id").bootstrapSwitch().on("switchChange.bootstrapSwitch", function (event, state) {
                var id = jQuery(this).attr('data-id');
                if(state == true){
                    state = 1;
                }else{
                    state = 0;
                }
                jQuery.ajax({
                    url:getBaseURL()+'/manager/form/change_check_id',
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
                        url:getBaseURL()+'/manager/posts/destroy',
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
                            url: getBaseURL()+'/manager/posts/destroy',
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

    upload_image: function (obj) {
        POPUPFILE.open(function(data){      
            console.log("upload file");       
            jQuery('#imageurl').val(data.url);
            jQuery('#imageid').val(data._id);
            jQuery('#div_img-dd').show();
            jQuery('.div_img-dd').html('<img src="'+SETTINGS.domain_image+'thumbs/200/200/'+data.url+'" class="img-dd" />');
        });
    },

    validation_form:function(){
        jQuery("#form-add").submit(function(e) {
            jQuery('#content').val(tinyMCE.get('content').getContent());
        });
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
                content: {
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
                    url:getBaseURL()+'/manager/posts/save',
                    data:data,
                    type:"post",
                    dataType:'json',
                    success:function(data){
                       // alert("success post data");
                        window.location.href=getBaseURL()+'/manager/'+data;
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
    POST.change_status();
    POST.delete();
    POST.deletemulti();
    POST.tinymceconfig();
    POST.validation_form();
    POST.initselect();
    POST.change_frame();
    POST.change_check_id();

});
