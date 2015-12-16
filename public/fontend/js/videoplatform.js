
function onYouTubeIframeAPIReady() {   
    player = new YT.Player('div_iframe', {
        width: 600,
        height: 500,  
         playerVars: { 
	      'rel': 0, 
	      'enablejsapi': 1 
	    }, 
        videoId:jQuery('#div_iframe').data('videoid')   
    });    
}

var VIDEOS = {
	person_image:function(){
		jQuery('.person-image').click(function(){
			player.seekTo(jQuery(this).data('current'));
		});
	},

	quick_view:function(){
		jQuery('.quick-view').click(function(){
			jQuery('#video-modal .modal-content').html('<iframe style="width:100%;height:500px;" src="https://www.youtube.com/embed/'+jQuery(this).data('videoid')+'" frameborder="0" allowfullscreen></iframe>');
			//width:60%;height:500px;border-radius:0;top:10%;margin-left:0;left:50%;transform:translate(-50%,0);
			jQuery('#video-modal').css({'width':'60%','height':'500px','border-radius':'0','top':'10%','margin-left':'0','left':'50%','transform':'translate(-50%,0)'});
		});
	},	
}

$(document).ready(function(){
	VIDEOS.person_image();
	VIDEOS.quick_view();	
});