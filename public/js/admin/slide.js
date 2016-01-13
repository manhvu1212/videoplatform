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
            jQuery('#thumbnail').append('<img src="' + SETTINGS.domain_image + data.url + '" width="150">');
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
                jQuery('#thumbnail input').val(data.items[0].snippet.thumbnails.medium.url);
                jQuery('#thumbnail').append('<img src="' + data.items[0].snippet.thumbnails.medium.url + '" width="150">');
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
                    window.location.href = getBaseURL() + '/manager/slides/';
                }
            });
        });
    },
    change_status: function () {
        try {
            jQuery(".switch-mini").bootstrapSwitch().on("switchChange.bootstrapSwitch", function (event, state) {
                var id = jQuery(this).attr('data-id');
                if (state == true) {
                    state = 1;
                } else {
                    state = 0;
                }
                jQuery.ajax({
                    url: getBaseURL() + '/manager/slides/change_status',
                    type: 'post',
                    dataType: 'json',
                    data: {activated: state, _token: jQuery('#_token').val(), id: id},
                    success: function (data) {
                    }
                })
            });
        } catch (e) {
        }
    },

    delete: function () {
        jQuery('.delete-item').click(function () {
            var name = jQuery(this).attr('data-name');
            var aids = new Array();
            aids[0] = jQuery(this).attr('data-id');
            var _token = jQuery('#_token').val();
            Confirm('Are you want to delete "' + name + '"', 'Message', function (r) {
                if (r) {
                    jQuery.ajax({
                        url: getBaseURL() + '/manager/slides/destroy',
                        type: 'post',
                        data: {aids: aids, _token: _token},
                        success: function (data) {
                            window.location.reload()
                        }
                    });
                }
            })
        })
    },

    deletemulti: function () {
        jQuery('.product-delete-multi').click(function () {
            var count = jQuery('.checkone:checked').length;
            var aids = {};
            if (count == 0) {
                Alert('Please select item for delete', '');
                return false;
            } else {
                var i = 0;
                jQuery('.checkone:checked').each(function () {
                    aids[i] = jQuery(this).val();
                    i++;
                });
                Confirm('Are you sure you want to delete?', '', function (r) {
                    if (r) {
                        jQuery.ajax({
                            url: getBaseURL() + '/manager/slides/destroy',
                            data: {_token: jQuery('#_token').val(), aids: aids},
                            type: 'POST',
                            dataType: 'json',
                            success: function (data) {
                                window.location.reload();
                            }
                        })
                    }

                });
            }
        });
    }
};

jQuery(document).ready(function () {
    SLIDES.submit_form();
    SLIDES.change_status();
    SLIDES.delete();
    SLIDES.deletemulti();
});