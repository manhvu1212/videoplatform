/**
 * Created by mrhoang on 07/08/2015.
 */
var USER = {
    openaddgroups:function(){
        jQuery('#btn-add-groups').click(function(){
            jQuery('#groups-users').modal('show');
        });
    },
    savegroup:function(){
        jQuery('#save-groups-users').click(function(){
            jQuery('#groups-users').modal('hide');
            jQuery.ajax({
                url:getBaseURL()+'/manager/users/groups/savegroups',
                data:jQuery('#add-groups').serialize(),
                dataType:'json',
                type:'post',
                success:function(data){
                    window.location.reload();
                }
            })
        })
    },
    opneneditgroup:function(){
        jQuery('.edit-groups').click(function(){
            jQuery('#groups-users').modal('show');
            var name = jQuery(this).attr('data-name');
            var id = jQuery(this).attr('data-id');
            jQuery('#add-groups #_id').val(id);
            jQuery('#add-groups #name').val(name);
        });
    },
    deletegroups:function(){
        jQuery('.delete-groups').click(function(){
            var id = jQuery(this).attr('data-id');
            var name = jQuery(this).attr('data-name');
            var aids = {0:id};
            Confirm('Are you sure you want to delete “'+name+'”?','Users',function(r){
                if(r){
                    jQuery.ajax({
                        url:getBaseURL()+'/manager/users/deletegroup',
                        type:'post',
                        dataType:'json',
                        data:{_token:jQuery('#_token').val(),aids:aids},
                        success:function(data){
                            window.location.reload();
                        }

                    })
                }

            });
        })
    },
    passworduser:function(){

        jQuery('#retype_password').keyup(function(){
            if(jQuery('#repassword').val() == ''){
                jQuery('.passwordconfirm').hide();
            }else{
                jQuery('.passwordconfirm').show();
            }
            if(jQuery('#retype_password').val() == jQuery('#password').val()){
                jQuery('.passwordconfirm > .ok').text('yes');
            }else{
                jQuery('.passwordconfirm > .ok').text('no');
            }
        })

        try{
            jQuery('#password').pwstrength()
        }catch (e){

        }
    },
    submituser:function(){
        jQuery('#form-user').submit(function () {
            if(jQuery.trim(jQuery('#email').val()) == ''){
                Alert('The email field is required.','Users',function(r){
                    jQuery('#email').focus();

                });
                return false;
            }
            if(jQuery('#form-user #id').val() == ''){
                if(jQuery.trim(jQuery('#password').val()) == ''){
                    Alert('The password field is required.','Users',function(r){
                        jQuery('#password').focus();

                    });
                    return false;
                }
                if(jQuery.trim(jQuery('#retype_password').val()) == ''){
                    Alert('The Re-type Password field is required.','Users',function(r){
                        jQuery('#password').focus();

                    });
                    return false;
                }
                if(jQuery('#retype_password').val() != jQuery('#password').val()){
                    Alert("These passwords don't match. Try again?",'Users',function(r){
                        jQuery('#retype_password').focus();

                    });
                    return false;
                }
            }
        })

    },
    deleteuser:function(){
        jQuery('.delete-user').click(function () {
            var id = jQuery(this).attr('data-id');
            var name = jQuery(this).attr('data-name');
            var aids = {0:id};
            Confirm('Are you sure you want to delete “'+name+'”?','Detete',function(r){
                if(r){
                    jQuery.ajax({
                        url:getBaseURL()+'/manager/users/destroy',
                        type:'post',
                        dataType:'json',
                        data:{_token:jQuery('#_token').val(),aids:aids},
                        success:function(data){
                            window.location.reload();
                        }

                    })
                }

            });
        })
    },
    user_deletemulti:function(){

        jQuery('.user-delete-multi').click(function(){
            var count = jQuery('.checkone:checked').length;
            var aids = {};
            if(count == 0){
                Alert('Plase select item for delete','Detete');
                return false;
            }else{
                var i = 0;
                jQuery('.checkone:checked').each(function(){
                    aids[i] = jQuery(this).val();
                    i++;
                })
                Confirm('Are you sure you want to delete?','Detete',function(r){
                    if(r){
                        jQuery.ajax({
                            url: getBaseURL()+'/manager/users/destroy',
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
    add_permission:function(){
        jQuery('#submit-permission').click(function(){
            if(jQuery.trim(jQuery('#form-permission #name').val()) == ''){
                Alert('The name field is required.','Permission',function(r){
                    jQuery('#form-permission  #name').focus();
                });
                return false;
            }
            jQuery.ajax({
                url:getBaseURL() + '/manager/users/storepermission',
                type:'post',
                dataType:'json',
                data:{_token:jQuery('#form-permission  input[name="_token"]').val(),name:jQuery('#form-permission  #name').val(),description:jQuery('#form-permission #description').val()},
                success: function (data) {
                    window.location.reload()
                }
            })
        });
    },
    savepermission:function(){
        jQuery('.save-permission').click(function(){
            var key = jQuery(this).attr('data-key');
            var id = jQuery(this).attr('data-id');
            var data ={};
            jQuery('.permission-'+id).each(function(){
                var group = jQuery(this).attr('data-group');
                if(jQuery(this).is(':checked')){
                    data[group] = 1;
                }else{
                    data[group] = 0;
                }
            })
            jQuery.ajax({
                url:getBaseURL()+'/manager/users/savegroupspermission',
                data:{_token:jQuery('#form-permission  input[name="_token"]').val(), key:key,data:data},
                type:'post',
                dataType:'json',
                success:function(data){
                    Alert('Permission saved','Permission');
                }
            });
        });
    },
    deleterole:function(){
        jQuery('.delete-roles').click(function(){
            var id = jQuery(this).attr('data-id');
            var name = jQuery(this).attr('data-name');
            Confirm('Are you sure you want to delete “'+name+'”?','Users',function(r) {
                if (r) {

                    jQuery.ajax({
                        url: getBaseURL() + '/manager/users/destroypermisstion',
                        data: {id: id, _token: jQuery('input[name="_token"]').val()},
                        type: 'post',
                        dataType: 'json',
                        success: function (data) {
                            window.location.reload();
                        }
                    })
                }
            });
        })
    },
    deletepermission:function(){
        jQuery('.delete-permission').click(function(){
            var name = jQuery(this).attr('data-name');
            var id = jQuery(this).attr('data-id');
            var aids = {0:id};
            Confirm('Are you sure you want to permanently delete “'+name+'”?','Users',function(r){
                if(r){
                    jQuery.ajax({
                        url:getBaseURL()+'/manager/users/deletepermission',
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
    changestatus_user:function(){
        try{
            jQuery(".switch-mini").bootstrapSwitch().on("switchChange.bootstrapSwitch", function (event, state) {
                var id = jQuery(this).attr('data-id');
                if(state == true){
                    state = 1;
                }else{
                    state = 0;
                }
                jQuery.ajax({
                    url:getBaseURL()+'/manager/users/changstatususer',
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
jQuery(document).ready(function(){
    USER.openaddgroups();
    USER.savegroup();
    USER.opneneditgroup();
    USER.deletegroups();
    USER.passworduser();
    USER.submituser();
    USER.deleteuser();
    USER.user_deletemulti();
    USER.add_permission();
    USER.savepermission();
    USER.deleterole();
    USER.deletepermission();
    USER.changestatus_user();
})