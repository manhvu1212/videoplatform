var DOMAIN=location.protocol + "//" + location.hostname;
function confirmDelete(delUrl)
{
    if (confirm('Are you sure you want to delete ???')==true) 
    {
            document.location = delUrl;
    }
}
function BrowseServer(i)
{
    POPUPFILE.open(function(data){
        jQuery("#xFilePath"+i).val('/'+data.url);
    });

}

function BrowseServer_slide(i)
{
    POPUPFILE.open(function(data){
        jQuery("#xFilePath"+i).val('/'+data.url);
        jQuery("#image_url").attr('data','/'+data.url);
        jQuery("#image_url").attr('src',DOMAIN+'/'+data.url);
        jQuery('.img-container img').each(function(){
            jQuery(this).attr('src',DOMAIN+'/'+data.url);
        });
    });

}




jQuery(function(){
    jQuery('#checkall:checkbox').change(function () {
        if(jQuery(this).is(":checked"))
            jQuery('.checksub').prop('checked', true);
        else
            jQuery('.checksub').prop('checked', false);
    });
    jQuery('.checkall:checkbox').change(function () {
        if(jQuery(this).is(":checked"))
            jQuery('.checkone').prop('checked', true);
        else
            jQuery('.checkone').prop('checked', false);
        jQuery.uniform.update();
    });
    jQuery('#main-content').on('click','.a_crop',function(){
        i = jQuery(this).attr('data');
        url = jQuery('#xFilePath'+i).val();

        jQuery("#image_url").attr('data',url);
        jQuery("#image_url").attr('stt',i);
        jQuery("#image_url").attr('src',DOMAIN+url);
        jQuery('.img-container img').each(function(){
            jQuery(this).attr('src',DOMAIN+url);
        });
        POPUPCROP.open(function(){


        });

    });


});




