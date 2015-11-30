/**
 * Created by mrhoang on 16/08/2015.
 */
var COMPANY = {
    add: function () {
        jQuery('.add-company').click(function () {
            jQuery('#add-company').modal('show');
        })
    },
    addcategory: function () {
        jQuery('.add-category').click(function () {
            jQuery('#add-category').modal('show');
        })
    },
    uploadlogo: function (obj) {
            POPUPFILE.open(function(data){
                jQuery('#logourl').val(data.url);
                jQuery('#logoid').val(data._id);
            });
    },
    savecompany: function () {
        jQuery('#save-company').click(function () {
            jQuery.ajax({
                url:getBaseURL() + '/manager/company/storecompany',
                data:jQuery('#form-add-company').serialize(),
                type:'POST',
                dataType:'json',
                success: function (data) {
                    window.location.reload()
                }
            })
        })
    },
    editcompany: function () {
        jQuery('.edit-company').click(function () {
            jQuery('#add-company').modal('show');
            var name = jQuery(this).attr('data-name');
            var id = jQuery(this).attr('data-id');
            var website = jQuery(this).attr('data-website');
            var logourl = jQuery(this).attr('data-logourl');
            var logoid = jQuery(this).attr('data-logoid');
            jQuery('#form-add-company #name').val(name);
            jQuery('#form-add-company #logourl').val(logourl);
            jQuery('#form-add-company #logoid').val(logoid);
            jQuery('#form-add-company #website').val(website);
            jQuery('#form-add-company #_id').val(id);
        })
    },
    deletecompany: function () {
        jQuery('.delete-company').click(function () {
            var name = jQuery(this).attr('data-name');
            var _id = jQuery(this).attr('data-id');
            var _token = jQuery('#_token').val();
            Confirm('Are you want to delete "'+name+'"','Message', function (r) {
                if(r){
                    jQuery.ajax({
                        url:getBaseURL()+'/manager/company/destroy',
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
    addcontact: function () {
        jQuery('.add-contact').click(function () {
            jQuery('#add-contact').modal('show');
            var id = jQuery(this).attr('data-id');
            jQuery('#form-add-contact #contact-index').val('');
            jQuery('#form-add-contact  #contact').val('');
            jQuery('#form-add-contact  #_id').val(id);

        })
    },
    savecontact: function () {
        jQuery('#save-contact').click(function () {
            jQuery('#add-contact').modal('hide');
            jQuery.ajax({
                url:getBaseURL()+'/manager/company/savecontact',
                type:'post',
                data:jQuery('#form-add-contact').serialize(),
                success: function (data) {
                    window.location.reload()
                }
            })
        })
    },
    editcontact: function () {
        jQuery('.edit-contact').click(function () {
            jQuery('#add-contact').modal('show');
            var id = jQuery(this).attr('data-id');
            var index = jQuery(this).attr('data-index');
            var value = jQuery(this).attr('data-value');
            jQuery('#form-add-contact #contact-index').val(index);
            jQuery('#form-add-contact  #contact').val(value);
            jQuery('#form-add-contact  #_id').val(id);
        })
    },
    deleteattrvalue:function(){
        jQuery('.delete-contact').click(function(){
            var name = jQuery(this).attr('data-value');
            var id = jQuery(this).attr('data-id');
            var key = jQuery(this).attr('data-index');
            var token = jQuery('#_token').val();
            Confirm('Are you sure want to delete "' +name + '"', 'pricecheap',function(r){
                if(r){
                    jQuery.ajax({
                        url:getBaseURL()+'/manager/company/deletecontact',
                        data:{_id:id,key:key,_token:token},
                        type:'post',
                        dataType:'json',
                        success: function (data) {
                           window.location.reload()
                        }
                    })
                }
            });


        });
    },
    savecategory: function () {
        jQuery('#save-category').click(function () {
            jQuery.ajax({
                url:getBaseURL()+'/manager/company/savecategory',
                data:jQuery('#form-add-category').serialize(),
                type:'post',
                dataType:'json',
                success: function (data) {
                    window.location.reload()
                }
            })
        })
    },
    getcategory:function(){
        jQuery("#category").autocomplete({
            source : function(request, response) {
                jQuery.ajax({
                    url : getBaseURL()+'/manager/products/attributes/getcategory',
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
                jQuery('#category_id').val(ui.item.id);
            },
            open : function() {
                jQuery(this).removeClass("ui-corner-all").addClass("ui-corner-top");
            },
            close : function() {
                jQuery(this).removeClass("ui-corner-top").addClass("ui-corner-all");
            }
        });
    },
    editcate: function () {
        jQuery('.edit-catcompany').click(function () {
            jQuery('#add-category').modal('show');
            var name = jQuery(this).attr('data-name');
            var id = jQuery(this).attr('data-id');
            var category_id = jQuery(this).attr('data-catid');
            jQuery('#category').val(name);
            jQuery('#category_id').val(category_id);
            jQuery('#_id').val(id);
        })
    },
    deletecatcompany: function () {
        jQuery('.delete-catcompany').click(function () {
            var name = jQuery(this).attr('data-name');
            var _id = jQuery(this).attr('data-id');
            var _token = jQuery('#_token').val();
            Confirm('Are you want to delete "'+name+'"','Message', function (r) {
                if(r){
                    jQuery.ajax({
                        url:getBaseURL()+'/manager/company/destroycate',
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
    changstatusallcate:function(){
        try{
            jQuery(".is_all_cate").bootstrapSwitch().on("switchChange.bootstrapSwitch", function (event, state) {
                var id = jQuery(this).attr('data-id');
                if(state == true){
                    state = 1;
                }else{
                    state = 0;
                }
                jQuery.ajax({
                    url:getBaseURL()+'/manager/company/changstatusallcate',
                    type:'post',
                    dataType:'json',
                    data:{activated:state,_token:jQuery('#_token').val(),id:id},
                    success:function(data){

                    }

                })
            });
        }catch (e){}

    },
}
jQuery(document).ready(function () {
    COMPANY.add();
    COMPANY.savecompany();
    COMPANY.editcompany();
    COMPANY.deletecompany();
    COMPANY.addcontact();
    COMPANY.savecontact();
    COMPANY.editcontact();
    COMPANY.deleteattrvalue();
    COMPANY.addcategory();
    COMPANY.savecategory();
    COMPANY.getcategory();
    COMPANY.editcate();
    COMPANY.deletecatcompany();
    COMPANY.changstatusallcate();
})