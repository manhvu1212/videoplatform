var current_time = 0, minutes = 0, seconds = 0;

function onYouTubeIframeAPIReady() {
    if (jQuery('#url_video').val() !== '') {
        player = new YT.Player('div_iframe', {
            width: 600,
            height: 400,
            videoId: jQuery('#url_video').val(),
            events: {
                onStateChange: function (event) {
                    if (event.data == YT.PlayerState.PAUSED) {
                        current_time = Math.floor(player.getCurrentTime());
                        minutes = Math.floor(current_time / 60);
                        seconds = current_time % 60;
                    }
                }
            }
        });
    }
    else {
        player = new YT.Player('div_iframe', {
            width: 600,
            height: 400

        });
    }
}

function onPauseEvent(event) {
    if (event.data === 2) {
        current_time = Math.floor(player.getCurrentTime());
        minutes = Math.floor(current_time / 60);
        seconds = current_time % 60;
    }
    else {

    }
}

var VIDEOS = {

    tinymceconfig: function () {
        try {
            tinymce.init({
                mode: 'specific_textareas',
                editor_selector: "content_post",
                theme_advanced_font_sizes: "10px,12px,13px,14px,16px,18px,20px",
                font_size_style_values: "10px,12px,13px,14px,16px,18px,20px",
                fontsize_formats: "8pt 10pt 12pt 14pt 18pt 24pt 36pt",
                remove_script_host: false,
                convert_urls: false,
                relative_urls: false,
                plugins: [
                    "advlist autolink lists link image charmap print preview anchor",
                    "searchreplace visualblocks code fullscreen",
                    "insertdatetime media table contextmenu paste", 'files'
                ],
                toolbar: "files | insertfile undo redo  | fontsizeselect | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image"
            });
        } catch (e) {
        }
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
                    url: getBaseURL() + '/manager/videos/change_status',
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
                        url: getBaseURL() + '/manager/videos/destroy',
                        type: 'post',
                        data: {aids: aids, _token: _token},
                        success: function (data) {
                            window.location.reload()
                        }
                    })
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
                })
                Confirm('Are you sure you want to delete?', '', function (r) {
                    if (r) {
                        jQuery.ajax({
                            url: getBaseURL() + '/manager/videos/destroy',
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
    },


    validation_form: function () {
        jQuery("#form-add-video").submit(function (e) {
            jQuery('#content').val(tinyMCE.get('content').getContent());
        });

        var form_add_video = jQuery('#form-add-video');

        form_add_video.validate({
            errorElement: 'span',
            errorClass: 'help-block help-block-error',
            rules: {
                title_video: {
                    minlength: 2,
                    required: true
                },
                url_video: {
                    minlength: 11,
                    required: true
                },
            },

            submitHandler: function (form) {
                var data = jQuery('#form-add-video').serialize();
                jQuery.ajax({
                    url: getBaseURL() + '/manager/videos/save',
                    type: "post",
                    data: data,
                    dataType: 'json',
                    success: function (data) {
                        window.location.href = getBaseURL() + '/manager/videos/';
                    }
                });
                return false;
            }
        });

    },

    upload_image: function (obj) {
        POPUPFILE.open(function (data) {
            jQuery('#list-img').append('<div class="video-img-dd ' + data.id + '">'
                + '<input type="hidden" name="image[' + current_time + '][id]" value="' + data.id + '">'
                + '<input type="hidden" name="image[' + current_time + '][minutes]" value="' + minutes + '">'
                + '<input type="hidden" name="image[' + current_time + '][seconds]" value="' + seconds + '">'
                + '<img src="' + SETTINGS.domain_image + 'thumbs/200/200/' + data.url + '" height="100px" width="100px"><div class="img-caption"><h2>'
                + data.title + '</h2>'
                + '<input type="text" class="form-control" name="image[' + current_time + '][extern_url]"><span>Time: <b>'
                + minutes + '</b>:<b>' + seconds
                + '</b></span></div>'
                + '<div class="caption-action"><span class="delete-image"><i class="fa fa-trash-o"></i></span></div>'
                + '</div>'
            );

            VIDEOS.delete_image();
        });
    },

    show_add_link: function () {
        $('#link').val("");
        jQuery('#modal-add-link').modal('show');
    },

    add_link: function () {
        var url = $('#link').val();
        if (url !== "") {
            jQuery.ajax({
                url: url,
                success: function (data) {
                    alert(data);
                }
            });
        }
    },

    reload_iframe: function (idVideo) {
        jQuery('#list-img').empty();
        player.loadVideoById(idVideo);
        player.addEventListener('onStateChange', 'onPauseEvent');

        jQuery.ajax({
            url: "https://www.googleapis.com/youtube/v3/videos?id=" + idVideo + "&key=" + "AIzaSyDRkGu3QK0MABAn_zCDXaKcWi129wPkykc" + "&fields=items(snippet(title))&part=snippet",
            dataType: "jsonp",
            success: function (data) {
                jQuery('#title_video').val(data.items[0].snippet.title);

            },
            error: function (jqXHR, textStatus, errorThrown) {
                alert(textStatus, +' | ' + errorThrown);
            }
        });
    },

    delete_image: function () {
        jQuery('.delete-image').click(function () {
            wrapper = jQuery(this).parents('.video-img-dd');
            wrapper.remove();
        });
    }

}

jQuery(document).ready(function () {
    VIDEOS.tinymceconfig();
    VIDEOS.change_status();
    VIDEOS.validation_form();
    VIDEOS.delete();
    VIDEOS.deletemulti();
    VIDEOS.delete_image();
});	