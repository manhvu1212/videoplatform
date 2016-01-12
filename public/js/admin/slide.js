/**
 * Created by Admin on 11/01/2016.
 */
var SLIDES = {
    choose_image: function () {
        jQuery('.refresh-video').css('display', 'none');
        jQuery('#image_video_id').prop('readonly', 'readonly');
        jQuery('#thumb-preview').empty();
        jQuery('#thumbnail img').remove();
        POPUPFILE.open(function (data) {
            jQuery('#image_video_id').val(data.id);
            jQuery('#url').val(SETTINGS.domain_image + data.url);
            jQuery('#thumb-preview').append('<img src="' + SETTINGS.domain_image + data.url + '" class="img-responsive">');
            jQuery('#thumbnail input').val(SETTINGS.domain_image + data.url);
            jQuery('#thumbnail').append('<img src="'+ SETTINGS.domain_image + data.url +'" width="150">');
        });
    },
    choose_video: function () {
        jQuery('#thumb-preview').empty();
        jQuery('#thumbnail img').remove();
        jQuery('.refresh-video').css('display', 'table-cell');
        jQuery('#image_video_id').removeAttr('readonly');
    },
    refresh_video: function (idVideo) {
        jQuery('#thumb-preview').empty();
        jQuery('#thumb-preview').append('<iframe width="100%" height="350" src="https://www.youtube.com/embed/' + idVideo + '" frameborder="0" allowfullscreen></iframe>');
        jQuery('#image_video_id').prop('readonly', 'readonly');
        jQuery('#url').val('https://www.youtube.com/embed/' + idVideo);
        jQuery.ajax({
            url: "https://www.googleapis.com/youtube/v3/videos?id=" + idVideo + "&key=" + "AIzaSyDRkGu3QK0MABAn_zCDXaKcWi129wPkykc" + "&part=snippet",
            dataType: "jsonp",
            success: function (data) {
                jQuery('input[name=title]').val(data.items[0].snippet.title);
                jQuery('#thumbnail input').val(data.items[0].snippet.thumbnails.default.url);
                jQuery('#thumbnail').append('<img src="'+ data.items[0].snippet.thumbnails.default.url +'">');
            },
            error: function (jqXHR, textStatus, errorThrown) {
                alert(textStatus, +' | ' + errorThrown);
            }
        });
    },
    submit_form: function () {
        jQuery("#form-add-slide").submit(function (e) {
            e.preventDefault();
            var data = jQuery('#form-add-slide').serialize();
            jQuery.ajax({
                url: getBaseURL() + '/manager/slides/save',
                type: "post",
                data: data,
                dataType: 'json',
                success: function (data) {
                    console.log(data);
                }
            });
        });
    }
};

jQuery(document).ready(function () {
    SLIDES.submit_form();
});