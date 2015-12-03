jQuery('#btn-reload').click(function(){
    player = new YT.Player('div_iframe', {
        width: 600,
        height: 400,
        videoId: jQuery('#url_video').val(),
        events: {           
            onStateChange:function(event){
                if (event.data == YT.PlayerState.PLAYING)
                    {  alert("Playing.."); }
                 else if (event.data == YT.PlayerState.PAUSED)
                    { alert ("Paused.."); }
            }
        }     
    }); 
});

var VIDEOS ={
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

    upload_image:function(obj){
    	POPUPFILE.open(function(data){
            jQuery('#imageurl').val(data.url);
            jQuery('#imageid').val(data._id);
            jQuery('#div_img-dd').show();
            jQuery('.div_img-dd').html('<img src="'+SETTINGS.domain_image+'thumbs/200/200/'+data.url+'" class="img-dd" />');

        });
    },   
}

jQuery(document).ready(function(){
	VIDEOS.tinymceconfig();
});	