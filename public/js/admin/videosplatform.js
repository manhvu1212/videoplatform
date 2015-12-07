var minutes =0;
var seconds =0;
function onYouTubeIframeAPIReady() {
    player = new YT.Player('div_iframe', {
        width: 600,
        height: 400,
        onReady:initialize
    });
}

function onPauseEvent(event){    
    if(event.data===2){
        current_time = Math.floor(player.getCurrentTime()); 
        minutes = Math.floor(current_time / 60);
        seconds = current_time % 60;        
    }
    else{

    }
}

function initialize(){
    if(jQuery('#title_video')!==''){
        jQuery('#btn-reload').click()
    }
}

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

     validation_form:function(){
        jQuery("#form-add-video").submit(function(e) {
            jQuery('#content').val(tinyMCE.get('content').getContent());
        });

        var form_add_video =  jQuery('#form-add-video');

        form_add_video.validate({
            errorElement: 'span', 
            errorClass: 'help-block help-block-error',
            rules:{   
                title_video:{
                    minlength:2,
                    required:true
                },
                url_video:{
                    minlength:11,
                    required:true
                },         
            },

            submitHandler:function(form){
                var data = jQuery('#form-add-video').serialize();
                jQuery.ajax({
                    url:getBaseURL()+'/manager/videos/save',
                    type:"post",
                    data:data,
                    dataType:'json',
                    success:function(data){
                        //window.location.href=getBaseURL()+'/manager/videos/';
                    }
                });
                return false;
            }            
        });

    },

    upload_image:function(obj){     
    	POPUPFILE.open(function(data){
            /*jQuery('#imageurl').val(data.url);
            jQuery('#imageid').val(data._id);
            jQuery('#div_img-dd').show();*/

            jQuery('#list-img').append('<div class="video-img-dd '+data.id+'">'
                +'<input type="hidden" name="image['+data.id+'][title]" value="'+data.title+'">'
                +'<input type="hidden" name="image['+data.id+'][id]" value="'+data.id+'">'
                +'<input type="hidden" name="image['+data.id+'][url]" value="'+data.url+'">'
                +'<input type="hidden" name="image['+data.id+'][time]" value="'+15+'">'
                +'<img src="'+SETTINGS.domain_image+'thumbs/200/200/'+data.url+'" height="100px" width="100px"><div class="img-caption"><h2>'
                +data.title+'</h2><h5>'
                +data.url+'</h5><span>Time: <b>'
                +minutes+'</b>:<b>'+seconds                
                +'</b></span></div></div>'             
                );
        });
    },   

    reload_iframe:function(idVideo){
        jQuery('#list-img').empty();
        player.loadVideoById(idVideo);
        player.addEventListener('onStateChange','onPauseEvent');

        jQuery.ajax({
            url: "https://www.googleapis.com/youtube/v3/videos?id=" + idVideo + "&key="+ "AIzaSyDRkGu3QK0MABAn_zCDXaKcWi129wPkykc"  + "&fields=items(snippet(title))&part=snippet",           
            dataType: "jsonp",
            success: function(data){                         
                jQuery('#title_video').val(data.items[0].snippet.title);

              },
            error: function(jqXHR, textStatus, errorThrown) {
                  alert (textStatus, + ' | ' + errorThrown);
              }
        });
    }

}

jQuery(document).ready(function(){   
	VIDEOS.tinymceconfig();    
    VIDEOS.validation_form();
});	