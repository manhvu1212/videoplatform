/**
 * Created by mrhoang on 4/8/15.
 */
var CATEGORY = {
    // TAXONOMY
    addtaxonomy: function () {
        jQuery('.add-vocabulary').click(function(){
            jQuery('#form-vocabulary #_id').val('');
            jQuery('#form-vocabulary #name').val('')
            jQuery('#form-vocabulary #description').val('')
        });
        jQuery('#submit-vocabulary').click(function(){

            if(jQuery.trim(jQuery('#form-vocabulary #name').val()) == ''){
                alert('The name field is required.','Taxonomy', function () {
                    jQuery('#form-vocabulary #name').focus();
                })
                return false;
            }
            jQuery('#vocabulary-term').modal('hide');

            jQuery.ajax({
                url:getBaseURL()+'/manager/taxonomy/save',
                data:jQuery('#form-vocabulary').serialize(),
                type:"post",
                dataType:'json',
                success:function(data){
                    window.location.reload()
                }

            })


        });
    },

    opentedit:function(){
        jQuery('.edit-vocabulary').click(function(){
            var id = jQuery(this).attr('data-id');
            jQuery.ajax({
                url:getBaseURL()+'/manager/taxonomy/get_taxonomy',
                type:'post',
                data:{id:id,_token:jQuery('#_token').val()},
                dataType:'json',
                success:function(data){
                    jQuery('#form-vocabulary #_id').val(data.id)
                    jQuery('#form-vocabulary #name').val(data.name)
                    jQuery('#form-vocabulary #description').val(data.description)
                }
            })
            jQuery('#CategoryModalLabel').modal()
        });
    },

    deletetaxonomy:function(){
        jQuery('.delete-vocabulary').click(function () {
            var name = jQuery(this).attr('data-name');
            var id = jQuery(this).attr('data-id');
            var aids = {0:id};
            Confirm('Are you sure you want to delete “'+name+'”?','Taxonomy',function(r){
                if(r){
                    jQuery.ajax({
                        url:getBaseURL()+'/manager/taxonomy/delete_taxonomy',
                        data:{aids:aids,_token:jQuery('#_token').val()},
                        type:'post',
                        dataType:'json',
                        success:function(data){
                            window.location.reload();
                        }
                    })
                }
            });
        });
    },

    delete_multi_taxonomy:function(){
        jQuery('.delete-all').click(function(){
            var count = jQuery('.checkone:checked').length;
            var aids = {};
            if(count == 0){
                Alert('Plase select item for delete','Taxonomy');
                return false;
            }else{
                var i = 0;
                jQuery('.checkone:checked').each(function(){
                    aids[i] = jQuery(this).val();
                    i++;
                })
                Confirm('Are you sure you want to delete?','Taxonomy',function(r){
                    if(r){
                        jQuery.ajax({
                            url: getBaseURL()+'/manager/taxonomy/delete_taxonomy',
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
//END TAXONOMY

// TAXONOMY ITEM
    add_taxonomyitem: function () {
        jQuery('.add-term').click(function(){
            jQuery('#form-vocabulary-term #_id').val('');
            jQuery('#form-vocabulary-term #name').val('')
            jQuery('#form-vocabulary-term #parent').val('')
        });
        jQuery('#submit-vocabulary-term').click(function(){
            if(jQuery.trim(jQuery('#form-vocabulary-term #name').val()) == ''){
                Alert('The name field is required.','Taxonomy', function () {
                    jQuery('#form-vocabulary #name').focus();
                })
                return false;
            }

            jQuery.ajax({
                url:getBaseURL()+'/manager/taxonomy/save_taxonomyitem',
                data:jQuery('#form-vocabulary-term').serialize(),
                type:"post",
                dataType:'json',
                success:function(data){
                    window.location.reload()
                }

            })


        });
    },
    open_taxonomyitem:function(){
        jQuery('.edit-vocabulary-term').click(function(){
            var id = jQuery(this).attr('data-id');
            jQuery.ajax({
                url:getBaseURL()+'/manager/taxonomy/get_taxonomyitem',
                type:'post',
                data:{id:id,_token:jQuery('#_token').val()},
                dataType:'json',
                success:function(data){
                    jQuery('#form-vocabulary-term #_id').val(data._id)
                    jQuery('#form-vocabulary-term #name').val(data.name)
                    jQuery('#form-vocabulary-term #parent-term').select2('val',data.parent)
                    jQuery('#form-vocabulary-term #description').val(data.description)
                    jQuery('#form-vocabulary-term #logoid').val(data.logo.id)
                    jQuery('#form-vocabulary-term #logourl').val(data.logo.url)
                }
            })
            jQuery('#vocabulary-term').modal()
        });
    },

    delete_taxonomyitem:function(){
        jQuery('.delete-vocabulary-term').click(function () {
            var name = jQuery(this).attr('data-name');
            var id = jQuery(this).attr('data-id');
            var aids = {0:id};
            Confirm('Are you sure you want to delete “'+name+'”?','Taxonomy',function(r){
                if(r){
                    jQuery.ajax({
                        url:getBaseURL()+'/manager/taxonomy/delete_taxonomyitem',
                        data:{aids:aids,_token:jQuery('#_token').val()},
                        type:'post',
                        dataType:'json',
                        success:function(data){
                            window.location.reload();
                        }
                    })
                }
            });
        });
    },

    delete_multi_taxonomyitem:function(){
        jQuery('.destroy_all_taxonomyitem').click(function(){
            var count = jQuery('.checkone:checked').length;
            var aids = {};
            if(count == 0){
                Alert('Plase select item for delete','Taxonomy');
                return false;
            }else{
                var i = 0;
                jQuery('.checkone:checked').each(function(){
                    aids[i] = jQuery(this).val();
                    i++;
                })
                Confirm('Are you sure you want to delete?','Taxonomy',function(r){
                    if(r){
                        jQuery.ajax({
                            url: getBaseURL()+'/manager/taxonomy/delete_taxonomyitem',
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

    uploadlogo: function (obj) {
        POPUPFILE.open(function(data){
            jQuery('#logourl').val(data.url);
            jQuery('#logoid').val(data._id);
        });
    },
// END TAXONOMY ITEM

}
jQuery(document).ready(function(){
    CATEGORY.opentedit();
    CATEGORY.addtaxonomy();
    CATEGORY.deletetaxonomy();
    CATEGORY.delete_multi_taxonomy();
    CATEGORY.open_taxonomyitem();
    CATEGORY.add_taxonomyitem();
    CATEGORY.delete_taxonomyitem();
    CATEGORY.delete_multi_taxonomyitem();
});