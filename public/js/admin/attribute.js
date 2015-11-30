/**
 * Created by mrhoang on 09/08/2015.
 */
var ATTR_PRODUCT = {
    formadd:function(){
        jQuery('.add-attribute').click(function(){
            jQuery('#add-attribute #type').val('');
            jQuery('#add-attribute  #name').val('');
            jQuery('#add-attribute  #key').val('');
            jQuery('#add-attribute  #_id').val('');
            jQuery('#attribute-product').modal('show');
        });
    },
    saveattribute:function(){
        jQuery('#save-attribute').click(function(){
            jQuery('#attribute-product').modal('hide');
            jQuery.ajax({
                url:getBaseURL()+'/manager/products/attributes/store',
                data:jQuery('#add-attribute').serialize(),
                type:'post',
                dataType:'json',
                success:function(data){
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
                jQuery('#restaurant_id').val(ui.item.id);
            },
            open : function() {
                jQuery(this).removeClass("ui-corner-all").addClass("ui-corner-top");
            },
            close : function() {
                jQuery(this).removeClass("ui-corner-top").addClass("ui-corner-all");
            }
        });
    },
    edit:function(){
        jQuery('.edit-attribute').click(function(){
            jQuery('#attribute-product').modal('show');
            var type = jQuery(this).attr('data-type');
            var id = jQuery(this).attr('data-id');
            var name = jQuery(this).attr('data-name');
            var lable = jQuery(this).attr('data-lable');
            var key = jQuery(this).attr('data-key');
            jQuery('#add-attribute #type').val(type);
            jQuery('#add-attribute  #lable').val(lable);
            jQuery('#add-attribute  #name').val(name);
            jQuery('#add-attribute  #key').val(key);
            jQuery('#add-attribute  #_id').val(id);
        })
    },
    addvalueopen:function(){
        jQuery('.addvalue-attribute').click(function(){
            jQuery('#attribute-value').modal('show');
            var id  = jQuery(this).attr('data-id');
            jQuery('#add-attribute-value  #_id').val(id);

        })
    },
    addkeywordopen:function(){
        jQuery('.addkeyword-attribute').click(function(){
            console.log('sss');
            jQuery('#attribute-keyword').modal('show');
            var id  = jQuery(this).attr('data-id');
            jQuery('#add-attribute-keyword  #_id').val(id);

        })
    },
    savevalueattribute:function(){
        jQuery('#add-attribute-value  #save-attribute-value').click(function(){
            jQuery.ajax({
                url:getBaseURL()+'/manager/products/attributes/storevalue',
                data:jQuery('#add-attribute-value').serialize(),
                type:'post',
                dataType:'json',
                success:function(data){
                    window.location.reload()
                }
            })
        });
    },
    savekeywordattribute:function(){
        jQuery('#add-attribute-keyword  #save-attribute-keyword').click(function(){
            jQuery.ajax({
                url:getBaseURL()+'/manager/products/attributes/storekeyword',
                data:jQuery('#add-attribute-keyword').serialize(),
                type:'post',
                dataType:'json',
                success:function(data){
                    window.location.reload()
                }
            })
        });
    },
    editattrvalue:function(){
        jQuery('.edit-attribute-value').click(function(){
            jQuery('#attribute-value').modal('show');
            var id  = jQuery(this).attr('data-id');
            var name  = jQuery(this).attr('data-name');
            var key  = jQuery(this).attr('data-key');
            jQuery('#add-attribute-value  #_id').val(id);
            jQuery('#add-attribute-value  #key').val(key);
            jQuery('#add-attribute-value  #name').val(name);
        });
    },
    editattrkeyword:function(){
        jQuery('.edit-attribute-keyword').click(function(){
            jQuery('#attribute-keyword').modal('show');
            var id  = jQuery(this).attr('data-id');
            var name  = jQuery(this).attr('data-name');
            var key  = jQuery(this).attr('data-key');
            jQuery('#add-attribute-keyword  #_id').val(id);
            jQuery('#add-attribute-keyword  #key').val(key);
            jQuery('#add-attribute-keyword  #name').val(name);
        });
    },
    deleteattrvalue:function(){
        jQuery('.delete-attribute-value').click(function(){
            var name = jQuery(this).attr('data-name');
            var id = jQuery(this).attr('data-id');
            var key = jQuery(this).attr('data-key');
            var token = jQuery('#_token').val();
            Confirm('Are you sure want to delete "' +name + '"', 'pricecheap',function(r){
                if(r){
                    jQuery.ajax({
                        url:getBaseURL()+ '/manager/products/attributes/deleteattrvalue',
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
    deleteattrkeyword:function(){
        jQuery('.delete-attribute-keyword').click(function(){
            var name = jQuery(this).attr('data-name');
            var id = jQuery(this).attr('data-id');
            var key = jQuery(this).attr('data-key');
            var token = jQuery('#_token').val();
            Confirm('Are you sure want to delete "' +name + '"', 'pricecheap',function(r){
                if(r){
                    jQuery.ajax({
                        url:getBaseURL()+ '/manager/products/attributes/deleteattrkeyword',
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
    destroyattr:function(){
        jQuery('.delete-attribute').click(function(){
            var name = jQuery(this).attr('data-name');
            var id = jQuery(this).attr('data-id');
            var key = jQuery(this).attr('data-key');
            var token = jQuery('#_token').val();
            Confirm('Are you sure want to delete "' +name + '"', 'pricecheap',function(r){
                if(r){
                    jQuery.ajax({
                        url:getBaseURL()+ '/manager/products/attributes/destroy',
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
    selectattr: function () {
        try{
            jQuery('#category').multiSelect({
                selectableHeader: "<input type='text' class='form-control search-input' autocomplete='off' placeholder='search...'>",
                selectionHeader: "<input type='text' class='form-control search-input' autocomplete='off' placeholder='search...'>",
                afterInit: function (ms) {
                    var that = this,
                        $selectableSearch = that.$selectableUl.prev(),
                        $selectionSearch = that.$selectionUl.prev(),
                        selectableSearchString = '#' + that.$container.attr('id') + ' .ms-elem-selectable:not(.ms-selected)',
                        selectionSearchString = '#' + that.$container.attr('id') + ' .ms-elem-selection.ms-selected';

                    that.qs1 = $selectableSearch.quicksearch(selectableSearchString)
                        .on('keydown', function (e) {
                            if (e.which === 40) {
                                that.$selectableUl.focus();
                                return false;
                            }
                        });

                    that.qs2 = $selectionSearch.quicksearch(selectionSearchString)
                        .on('keydown', function (e) {
                            if (e.which == 40) {
                                that.$selectionUl.focus();
                                return false;
                            }
                        });
                },
                afterSelect: function () {
                    this.qs1.cache();
                    this.qs2.cache();
                },
                afterDeselect: function () {
                    this.qs1.cache();
                    this.qs2.cache();
                }
            });
        }catch (e){
            console.log(e)
        }
    }
}

jQuery(document).ready(function(){
    ATTR_PRODUCT.formadd();
    ATTR_PRODUCT.saveattribute();
    ATTR_PRODUCT.getcategory();
    ATTR_PRODUCT.edit();
    ATTR_PRODUCT.savevalueattribute();
    ATTR_PRODUCT.addvalueopen();
    ATTR_PRODUCT.editattrvalue();
    ATTR_PRODUCT.deleteattrvalue();
    ATTR_PRODUCT.destroyattr();
    ATTR_PRODUCT.selectattr();
    ATTR_PRODUCT.addkeywordopen();
    ATTR_PRODUCT.savekeywordattribute();
    ATTR_PRODUCT.deleteattrkeyword();
    ATTR_PRODUCT.editattrkeyword();
})