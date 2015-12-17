jQuery(document).ready(function($){	
	"use strict";
	
	//tabs
	if($('#myTab').length){
		$('#myTab a').click(function (e) {
			e.preventDefault();
			$(this).tab('show');
		});
	}
	
	//ToolTip
	if($("[data-toggle='tooltip']").length){
		$("[data-toggle='tooltip']").tooltip();
	}
	

	

	
	//Carousel
	if($(".mycarousel").length){
		$('.mycarousel').jcarousel({
			wrap: 'circular'
		});
	}
	
	//Gallery Script
	if($('.gallery_video').length){
		$(".gallery_video a[rel^='prettyPhoto']").prettyPhoto({
			animation_speed: 'slow',
			slideshow: 10000,
			hideflash: true
		});
	}
	window.onload=function(){
		$('.latest-vidios').each(
		function()
		{
			$(this).jScrollPane(
				{
					showArrows: $(this).is('.arrow')
				}
			);
			var api = $(this).data('jsp');
			var throttleTimeout;
			$(window).bind(
				'resize',
				function()
				{
					if (!throttleTimeout) {
						throttleTimeout = setTimeout(
							function()
							{
								api.reinitialise();
								throttleTimeout = null;
							},
							50
						);
					}
				}
			);
		}
	)
	}
	if($('#imageGallery').length){
		$("#imageGallery").lightSlider({
			slideMargin:0,
			slideMove:1,
			minSlide:1,
			maxSlide:1,
			pager:true,
			controls:true,
			prevHtml:'',
			nextHtml:'',
			keyPress:true,
			thumbWidth:167,
			thumbMargin:0,
			gallery:true,
			currentPagerPosition:'middle',
			useCSS:true,
			auto: false,
			pause: 2000,
			loop:true,
			easing: '',
			speed: 500,
			mode:"fade",
			swipeThreshold:10,
			onBeforeStart: function(){},
			onSliderLoad: function() {},
			onBeforeSlide:function(){},
			onAfterSlide:function(){},
			onBeforeNextSlide: function(){},
			onBeforePrevSlide: function(){}
		});
}
    });




document.createElement('header');
document.createElement('hgroup');
document.createElement('nav');
document.createElement('menu');
document.createElement('section');
document.createElement('article');
document.createElement('aside');
document.createElement('footer');