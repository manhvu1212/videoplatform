jQuery(window).load(function(){
    /* slider_items_length = jQuery('.slider .item').size();
     if(slider_items_length > 1){
     var slider_bullets = '<ul class="slideSelectors">';
     for(i=1; i<=slider_items_length; i++){
     if(i==1){selected_item = ' selected'}else{selected_item = ''}
     slider_bullets += '<li class="button-item' + selected_item + '" id="item' + i + '">' + i + '</li>'
     }
     slider_bullets += '</ul>';
     jQuery('.header-slider-container .iosSlider .prev').after(slider_bullets);
     } */

    //Slider Container Ratio
    var slider_container = jQuery('.header-slider-container');
    var slider_img =  jQuery('.header-slider-container .iosSlider .slider .item img:first');
    var sliderHeight = slider_img.height();
    if(slider_img.parent('a')){
        sliderHeight = slider_img.parent('a').outerHeight();
    }
    var ratio = Math.round((sliderHeight/slider_img.width())*100);
    slider_container.css({
        'padding-bottom': ratio + '%'
    });


    jQuery('.iosSlider').iosSlider({
        responsiveSlideWidth: true,
        snapToChildren: true,
        desktopClickDrag: true,
        infiniteSlider: true,
        /* navSlideSelector: '.slideSelectors .button-item', */
        navNextSelector: '.container .next',
        navPrevSelector: '.container .prev',
        startAtSlide: 2,
        onSlideComplete: slideComplete,
        onSliderLoaded: sliderLoaded,
        onSlideChange: slideChange,
        autoSlide: 1      , autoSlideTimer: 5000	  , autoSlideTransTimer: 750	  , desktopClickDrag: 1	  , infiniteSlider: 1    });


    function slideChange(args) {
        /* jQuery('.slideSelectors .button-item').removeClass('selected');
         jQuery('.slideSelectors .button-item:eq(' + (args.currentSlideNumber-1) + ')').addClass('selected'); */
    }

    function slideComplete(args) {

    }

    function sliderLoaded(args) {
        slideComplete(args);
        slideChange(args);
    }

});