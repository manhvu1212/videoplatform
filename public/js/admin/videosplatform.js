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
                }
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

    show_modal_link: function () {
        jQuery('#link').val('');
        jQuery('#modal-add-link').modal('show');
        jQuery('#link').removeAttr('disabled');
    },

    add_link: function () {
        var is_check_link = false;
        var t;
        jQuery('#link').on('input', function () {
            if (t) {
                clearTimeout(t);
                t = setTimeout(callBack, 1000);
            }
            else {
                t = setTimeout(callBack, 1000);
            }
            function callBack() {
                var url = jQuery('#link').val();
                if (/^(https?|s?ftp):\/\/(((([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(%[\da-f]{2})|[!\$&'\(\)\*\+,;=]|:)*@)?(((\d|[1-9]\d|1\d\d|2[0-4]\d|25[0-5])\.(\d|[1-9]\d|1\d\d|2[0-4]\d|25[0-5])\.(\d|[1-9]\d|1\d\d|2[0-4]\d|25[0-5])\.(\d|[1-9]\d|1\d\d|2[0-4]\d|25[0-5]))|((([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])*([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])))\.)+(([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])*([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])))\.?)(:\d*)?)(\/((([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(%[\da-f]{2})|[!\$&'\(\)\*\+,;=]|:|@)+(\/(([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(%[\da-f]{2})|[!\$&'\(\)\*\+,;=]|:|@)*)*)?)?(\?((([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(%[\da-f]{2})|[!\$&'\(\)\*\+,;=]|:|@)|[\uE000-\uF8FF]|\/|\?)*)?(#((([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(%[\da-f]{2})|[!\$&'\(\)\*\+,;=]|:|@)|\/|\?)*)?$/i.test(url)) {
                    jQuery('#form-add-link span').hide();
                    var data = jQuery('#form-add-link').serialize();
                    jQuery.ajax({
                        url: getBaseURL() + '/manager/videos/bind_link',
                        type: "post",
                        data: data,
                        dataType: 'json',
                        beforeSend: function () {
                            jQuery('#link').attr('disabled', 'disabled');
                            jQuery('.loading').show();
                        },
                        success: function (data) {
                            jQuery('.loading').hide();
                            if (data['url_exist']) {
                                var elm = '<div class="video-img-dd"> \
                                                <input type="hidden" name="image" value="'+ data['image'] +'"> \
                                                <img src="' + data['image'] + '" width="100px" height="100px"> \
                                                <div class="img-caption"> \
                                                    <input id="title-new-add" type="text" name="title" class="form-control input-lg" value="' + data['title'] + '" style="margin-bottom: 5px;">\
                                                    <input type="url" id="url-new-add" value="' + data['url'] + '" disabled class="form-control"> \
                                                    <span>Time: <b>' + minutes + ':' + seconds + '<b></span> \
                                                </div> \
                                            </div>';
                                jQuery('.bind-link').children().remove();
                                jQuery('.bind-link').append(elm);
                            } else {
                                jQuery('#link').removeAttr('disabled');
                                jQuery('#form-add-link span').show();
                            }
                        },
                        error: function () {
                            jQuery('#link').removeAttr('disabled');
                            jQuery('#form-add-link span').show();
                            jQuery('.loading').hide();
                        }
                    });
                } else {
                    jQuery('#form-add-link span').show();
                }
            }
        });
    },

    add_link_done: function () {
        var data = jQuery('#form-add-link').serialize();
        jQuery.ajax({
            url: getBaseURL() + '/manager/files/uploadimagefromurl',
            type: "post",
            data: data,
            dataType: 'json',
            success: function (data) {
                if(data['status'] == 1) {
                    var title = jQuery('#title-new-add').val();
                    var url = jQuery('#url-new-add').val();
                    jQuery('#list-img').append('<div class="video-img-dd ' + data.id + '"> \
                        <input type="hidden" name="image[' + current_time + '][id]" value="' + data.id + '"> \
                        <input type="hidden" name="image[' + current_time + '][minutes]" value="' + minutes + '"> \
                        <input type="hidden" name="image[' + current_time + '][seconds]" value="' + seconds + '"> \
                        <img src="' + SETTINGS.domain_image + 'files/' + data.url +'" height="100px" width="100px"> \
                        <div class="img-caption"> \
                            <h2>' + title + '</h2> \
                            <input type="text" class="form-control" name="image[' + current_time + '][extern_url]" value="' + url + '"> \
                            <span>Time: <b>' + minutes + '</b>:<b>' + seconds + '</b></span></div> \
                            <div class="caption-action"><span class="delete-image"><i class="fa fa-trash-o"></i></span></div> \
                        </div>'
                    );
                    VIDEOS.delete_image();
                    jQuery('#modal-add-link').modal('hide');
                }
            }
        });
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
    VIDEOS.add_link();
});	