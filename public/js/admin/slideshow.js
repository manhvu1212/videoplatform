var SLIDESHOW = {
    delete:function(){
        jQuery('.delete').click(function () {
            var name = jQuery(this).attr('data-name');
            var id = jQuery(this).attr('data-id');
            var aids = {0:id};
            Confirm('Are you sure you want to delete “'+name+'”?','Slideshow',function(r){
                if(r){
                    jQuery.ajax({
                        url:getBaseURL()+'/manager/slideshow/delete',
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

    delete_multi:function(){
        jQuery('.delete-all').click(function(){
            var count = jQuery('.checkone:checked').length;
            var aids = {};
            if(count == 0){
                Alert('Plase select item for delete','Slideshow');
                return false;
            }else{
                var i = 0;
                jQuery('.checkone:checked').each(function(){
                    aids[i] = jQuery(this).val();
                    i++;
                })
                Confirm('Are you sure you want to delete?','Slideshow',function(r){
                    if(r){
                        jQuery.ajax({
                            url: getBaseURL()+'/manager/slideshow/delete',
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
    changstatus:function(){
        try{
            jQuery(".switch-mini-product").bootstrapSwitch().on("switchChange.bootstrapSwitch", function (event, state) {
                var id = jQuery(this).attr('data-id');
                if(state == true){
                    state = 1;
                }else{
                    state = 0;
                }
                jQuery.ajax({
                    url:getBaseURL()+'/manager/slideshow/changstatus',
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
    SLIDESHOW.delete();
    SLIDESHOW.delete_multi();
    SLIDESHOW.changstatus();

});