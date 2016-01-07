/**
 * Created by mrhoang on 4/1/15.
 */
function getBaseURL () {
    return location.protocol + "//" + location.hostname + (location.port && ":" + location.port);
}

var SYSTEM = {
    datepicker:function(){
       try{
           jQuery('#datefrom').datepicker({
               format:'yyyy-mm-dd',
               autoclose: true
           });
           jQuery('#dateto').datepicker({
               format:'yyyy-mm-dd',
               autoclose: true
           });
       }catch (e){}
    },
    slugify:function(text){
        text=text.replace(/[^-a-zA-Z0-9,&\s]+/ig,'');
        text=text.replace(/-/gi,"_");
        text=text.replace(/\s/gi,"-");
        text=text.toLowerCase();
        return text;
    },
    checkall: function () {
        jQuery('.checkall').click(function(){
            if(jQuery(this).is(':checked')){
                jQuery('.checkone').prop('checked',true);
            }else{

                jQuery('.checkone').prop('checked',false)
            }
        })
    },
    localtion_deletemulti:function(){
        jQuery('.delete-multi').click(function(){
            var count = jQuery('.checkone:checked').length;
            var aids = {};
            if(count == 0){
                Alert('Plase select item for delete','Tastable');
                return false;
            }else{
                var i = 0;
                jQuery('.checkone:checked').each(function(){
                    aids[i] = jQuery(this).val();
                    i++;
                })
                Confirm('Are you sure you want to delete?','Tastable',function(r){
                    if(r){
                        jQuery.ajax({
                            url: getBaseURL()+'/manager/location/destroy',
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
    slugify:function(text){
        text=text.replace(/[^-a-zA-Z0-9,&\s]+/ig,'');
        text=text.replace(/-/gi,"_");
        text=text.replace(/\s/gi,"-");
        text=text.toLowerCase();
        return text;
    },
    location_delete:function(){
        jQuery('.delete-location').click(function(){
            var name = jQuery(this).attr('data-name');
            var id = jQuery(this).attr('data-id');
            var aids = {0:id};
            Confirm('Are you sure you want to delete “'+name+'”?','Tastable',function(r){
                if(r){
                    jQuery.ajax({
                        url: getBaseURL()+'/manager/location/destroy',
                        data:{_token:jQuery('#_token').val(), aids:aids},
                        type:'POST',
                        dataType:'json',
                        success:function(data){
                            window.location.reload();
                        }
                    })
                }

            });
        });
    },
    location_validate_form:function(){
        jQuery('#sbmitlocaion').click(function(){
            if(jQuery.trim(jQuery('#name').val()) == ''){
                Alert('The name field is required.','Tastable',function(r){
                    jQuery('#name').focus();
                });
                return false;
            }
            if(jQuery('#parent').val() !='' && jQuery('#parent_id').val() == ''){
                Alert('The parent do not exist.','Tastable',function(r){
                    jQuery('#parent').val('');
                    jQuery('#parent').focus()
                });
                return false;
            }
            jQuery('#form-location').submit();
        });
    },
    location_autocomplate_parent:function(){
        try{
            jQuery("#parent").keyup(function(){
                jQuery('#parent_id').val('')
            });
            jQuery("#parent").autocomplete({
                source : function(request, response) {
                    jQuery.ajax({
                        url : getBaseURL()+'/manager/location/getlocationautocomplate',
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
                    jQuery('#parent_id').val(ui.item.id)
                },
                open : function() {
                    jQuery(this).removeClass("ui-corner-all").addClass("ui-corner-top");
                },
                close : function() {
                    jQuery(this).removeClass("ui-corner-top").addClass("ui-corner-all");
                }
            });
        }catch (e){}
    },
    open_files:function(){
        var w = (screen.width/100)*60;
        var h = (screen.height/100)*60;
        var left = (screen.width/2)-(w/2);
        var top = (screen.height/2)-(h/2);
        var url = getBaseURL()+'/manager/files';
        var title = 'Tastable.net';
        return  window.open(url, title, 'toolbar=no, location=no, directories=no, status=no, menubar=no, scrollbars=no, resizable=no, copyhistory=no, width='+w+', height='+h+', top='+top+', left='+left);
    }

}
jQuery(document).ready(function(){
    SYSTEM.location_autocomplate_parent();
    SYSTEM.location_validate_form();
    SYSTEM.location_delete();
    SYSTEM.checkall();
    SYSTEM.localtion_deletemulti();
    SYSTEM.datepicker();

});
