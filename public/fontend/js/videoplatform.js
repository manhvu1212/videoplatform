
function onYouTubeIframeAPIReady() {   
    player = new YT.Player('div_iframe', {
        width: '60%',
        height: 550,     
        playerVars: { 
	      'rel': 0, 
	      'enablejsapi': 1 
	    }, 
        videoId:jQuery('#div_iframe').data('videoid')   
    });    
}

var VIDEOS = {

	quick_view:function(){
		jQuery('.quick-view').click(function(){
			jQuery('#video-modal .modal-content').html('<iframe style="width:100%;height:642px;" src="https://www.youtube.com/embed/'+jQuery(this).data('videoid')+'?modestbranding=1" frameborder="0" allowfullscreen></iframe>');
			//width:60%;height:500px;border-radius:0;top:10%;margin-left:0;left:50%;transform:translate(-50%,0);
			jQuery('#video-modal').css({'width':'60%','height':'642px','border-radius':'0','top':'10%','margin-left':'0','left':'50%','transform':'translate(-50%,0)'});

			jQuery('#video-modal').on('hidden.bs.modal',function(){
				jQuery('#video-modal').find('.modal-content').empty();
			});
		});
	},	

	image_slider:function(){

	//Carousel

      jQuery('#carousel').flexslider({
        animation: "slide",
        controlNav: false,
        //animationLoop: true,
        slideshow: false,
        itemWidth: 182,
        itemMargin: 0,
        asNavFor: '#slider'

      });
      
      jQuery('#slider').flexslider({
        animation: "slide",
        controlNav: false,
        //animationLoop: false,
        slideshow: false,
        sync: "#carousel",
        start: function(slider){

        }   ,
         after:function(slider){
        	var current = jQuery('.flex-active-slide .person-image').data('current');
        	a = jQuery('.flex-active-slide .person-image a');
        	a.click(function(){
        		window.location.href = a.attr('href');
        	});
        	console.log(a);
        	console.log(current);
        	player.seekTo(current);
        }    
      });

	}

}

$(document).ready(function(){   
    VIDEOS.quick_view();    
    VIDEOS.image_slider();
});

