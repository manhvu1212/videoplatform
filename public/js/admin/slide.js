/**
 * Created by Admin on 11/01/2016.
 */
var SLIDES = {
    choose_image: function () {
        POPUPFILE.open(function (data) {
            jQuery('#image_video_id').val(data.id);
            jQuery('.refresh-video').css('display', 'none');
            jQuery('#image_video_id').prop('disabled', 'disabled');
            jQuery('#thumb-preview').empty();
            jQuery('#thumb-preview').append('<img src="' + SETTINGS.domain_image + data.url + '" class="img-responsive">');
        });
    },
    choose_video: function () {
        jQuery('.refresh-video').css('display', 'table-cell');
        jQuery('#image_video_id').removeAttr('disabled');
    },
    refresh_video: function (idVideo) {
        jQuery('#thumb-preview').empty();
        jQuery('#thumb-preview').append('<iframe width="100%" height="350" src="https://www.youtube.com/embed/' + idVideo + '" frameborder="0" allowfullscreen></iframe>');
    }
};

jQuery(document).ready(function () {

});