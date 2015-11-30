var REGISTER = {

    delete: function () {
        jQuery('.delete-item').click(function () {
            var name = jQuery(this).attr('data-name');
            var _id = jQuery(this).attr('data-id');
            var _token = jQuery('#_token').val();
            Confirm('Are you want to delete "'+name+'"','Message', function (r) {
                if(r){
                    jQuery.ajax({
                        url:getBaseURL()+'/manager/registers/destroy',
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
    deletemulti: function () {
        jQuery('.delete-multi').click(function(){
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
                            url: getBaseURL()+'/manager/registers/deletemulti',
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


}

jQuery(document).ready(function(){
    REGISTER.delete();
    REGISTER.deletemulti();

});
