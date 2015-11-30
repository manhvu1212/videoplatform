/**
 * Created by mrhoang on 09/08/2015.
 */
var PRODUCT = {
    formadd:function(){
        jQuery('#form-add-product').submit(function(){
            var name = jQuery('#name').val();
            var imgs  = 0;
            jQuery('.image-id').each(function(){
                if(jQuery(this).val() !=''){
                    imgs = imgs+ 1;
                }
            })
            var content = tinyMCE.get('content').getContent();
            if(name ==''){
                jQuery('#name').focus();
                jQuery('#name').css('border','1px solid red');
                return false;
            }
            if(imgs == 0){
                Alert('Images can not empty');
                return false;
            }
            if(content == 0){
                Alert('Content can not empty');
                return false;
            }
        });
    },
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
    selectimage:function(obj){
        POPUPFILE.open(function(data){
            jQuery(obj).parent().prev().val(data._id);
            jQuery(obj).parent().prev().prev().val(data.url);
        });
    },
    addmoreimage:function(){
        jQuery('.addmoreimage').click(function () {
            var html =  '<div class="input-group" style="width: 300px">' +
                        '<input type="text" class="form-control"  name="url[]" placeholder="Url">' +
                        '<input type="hidden" class="image-id" name="image_id[]" >' +
                        '<span class="input-group-btn">' +
                        '<button class="btn btn-default selectimage"  onclick="PRODUCT.selectimage(this);"   type="button">Browser</button><button class="btn btn-warning delete-image " onclick="PRODUCT.deleteimage(this)" ><i class="fa fa-trash-o " ></i></button>' +
                        '</span>' +
                        '</div>';
            jQuery('.images-list').append(html);

        })
    },
    changstatusproduct:function(){
        try{
            jQuery(".switch-mini-product").bootstrapSwitch().on("switchChange.bootstrapSwitch", function (event, state) {
                var id = jQuery(this).attr('data-id');
                if(state == true){
                    state = 1;
                }else{
                    state = 0;
                }
                jQuery.ajax({
                    url:getBaseURL()+'/manager/products/changstatusproduct',
                    type:'post',
                    dataType:'json',
                    data:{activated:state,_token:jQuery('#_token').val(),id:id},
                    success:function(data){

                    }

                })
            });
        }catch (e){}

    },
    changstatuspopular:function(){
        try{
            jQuery(".switch-mini-populer").bootstrapSwitch().on("switchChange.bootstrapSwitch", function (event, state) {
                var id = jQuery(this).attr('data-id');
                if(state == true){
                    state = 1;
                }else{
                    state = 0;
                }
                jQuery.ajax({
                    url:getBaseURL()+'/manager/products/changstatuspopular',
                    type:'post',
                    dataType:'json',
                    data:{activated:state,_token:jQuery('#_token').val(),id:id},
                    success:function(data){

                    }

                })
            });
        }catch (e){}

    },
    deleteimage:function(obj){
        jQuery(obj).parent().parent().remove();
    },
    initselect: function () {
        try{
            jQuery("#select-category").select2();
        }catch (e){console.log(e)}
    },
    addpricecomparision: function () {
        jQuery('.add-comparison').click(function () {
            jQuery('#comparison-price').modal('show');
        })
    },
    saveprice: function () {
        jQuery('#save-price').click(function () {
            jQuery.ajax({
                url:getBaseURL()+'/manager/products/saveprice',
                data:jQuery('#add-price').serialize(),
                type:'post',
                dataType:'json',
                success: function (data) {
                    window.location.reload();
                }

            })
        })
    },
    getcompany: function () {
        jQuery("#company").keyup(function(e){
            if(e.keyCode != 13) {
                jQuery('#company_id').val('')
            }
        });
        try{
            jQuery("#company").autocomplete({
                source : function(request, response) {
                    jQuery.ajax({
                        url : getBaseURL()+'/manager/products/getcompany',
                        dataType : "json",
                        type: 'POST',
                        data : {
                            featureClass : "P",
                            _token: jQuery('input[name="_token"]').val(),
                            style : "full",
                            limit : 12,
                            name : request.term
                        },
                        success : function(data) {
                            response(jQuery.map(data, function(item) {
                                return {
                                    label : item.name,
                                    value : item.name,
                                    id:item._id
                                }
                            }));
                        }
                    });
                },
                minLength : 1,
                select : function(event, ui) {
                    jQuery('#company_id').val(ui.item.id);
                },
                open : function() {
                    jQuery(this).removeClass("ui-corner-all").addClass("ui-corner-top");
                },
                close : function() {
                    jQuery(this).removeClass("ui-corner-top").addClass("ui-corner-all");
                }
            });
        }catch (e){
            console.log(e)
        }
    },
    editprice: function () {
        jQuery('.edit-price').click(function () {
            var id = jQuery(this).attr('data-id');
            jQuery.ajax({
                url:getBaseURL()+'/manager/products/getprice',
                data:{_token:jQuery('#_token').val(),id:id},
                type:'post',
                dataType:'json',
                success: function (data) {
                    jQuery('#add-price #_id').val(data._id);
                    jQuery('#add-price #title').val(data.title);
                    jQuery('#add-price #url').val(data.url);
                    jQuery('#add-price #price').val(data.price);
                    jQuery('#add-price #company_id').val(data.company_id);
                    jQuery('#add-price #company').val(data.company);
                }
            })
            jQuery('#comparison-price').modal('show');
        })
    },
    changstatusproductprice:function(){
        try{
            jQuery(".switch-mini-price").bootstrapSwitch().on("switchChange.bootstrapSwitch", function (event, state) {
                var id = jQuery(this).attr('data-id');
                if(state == true){
                    state = 1;
                }else{
                    state = 0;
                }
                jQuery.ajax({
                    url:getBaseURL()+'/manager/products/changstatusproductprice',
                    type:'post',
                    dataType:'json',
                    data:{activated:state,_token:jQuery('#_token').val(),id:id},
                    success:function(data){

                    }

                })
            });
        }catch (e){}

    },
    deleteproduct: function () {
        jQuery('.delete-product').click(function () {
            var name = jQuery(this).attr('data-name');
            var _id = jQuery(this).attr('data-id');
            var _token = jQuery('#_token').val();
            Confirm('Are you want to delete "'+name+'"','Message', function (r) {
                if(r){
                    jQuery.ajax({
                        url:getBaseURL()+'/manager/products/destroy',
                        type:'post',
                        data:{_id:_id,_token:_token},
                        success: function (data) {
                            window.location.reload()
                        }
                    })
                }
            })
        })
    },
    productdeletemulti: function () {
        jQuery('.product-delete-multi').click(function(){
            var count = jQuery('.checkone:checked').length;
            var aids = {};
            if(count == 0){
                Alert('Plase select item for delete','');
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
                            url: getBaseURL()+'/manager/products/deletemulti',
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
    deleteprice: function () {
        jQuery('.delete-price').click(function () {
            var name = jQuery(this).attr('data-name');
            var _id = jQuery(this).attr('data-id');
            var _token = jQuery('#_token').val();
            Confirm('Are you want to delete "'+name+'"','Message', function (r) {
                if(r){
                    jQuery.ajax({
                        url:getBaseURL()+'/manager/products/deleteprice',
                        type:'post',
                        data:{_id:_id,_token:_token},
                        success: function (data) {
                            window.location.reload()
                        }
                    })
                }
            })
        })
    },
    editname: function () {


        jQuery('.savenameproduct').click(function () {
            var id = jQuery(this).attr('data-id');
            var name = jQuery(this).prev().val();
            jQuery.ajax({
                url:getBaseURL()+'/manager/products/savename',
                data:{_token:jQuery('#_token').val(),id:id,name:name},
                type:'post',
                dataType:'json',
                success: function (data) {
                }
            })
        })

    }



}

jQuery(document).ready(function(){
    PRODUCT.formadd();
    PRODUCT.tinymceconfig();
    PRODUCT.addmoreimage();
    PRODUCT.changstatusproduct();
    PRODUCT.initselect();
    PRODUCT.addpricecomparision();
    PRODUCT.getcompany();
    PRODUCT.saveprice();
    PRODUCT.editprice();
    PRODUCT.changstatusproductprice();
    PRODUCT.deleteproduct();
    PRODUCT.deleteprice();
    PRODUCT.changstatuspopular();
    PRODUCT.editname();
    PRODUCT.productdeletemulti();
})