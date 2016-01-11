/**
 * Created by Admin on 11/01/2016.
 */
var SLIDES = {
    choose_image: function() {
        POPUPFILE.open(function(data){
            jQuery('#thumb-preview').children().remove();
            jQuery('#thumb-preview').append('<input type="hidden" value="' + data.id + '" name="id"> \
                <img src="' + SETTINGS.domain_image + data.url + '" class="img-responsive"> \
                '
            );
        });
    }
};

jQuery(document).ready(function(){

});