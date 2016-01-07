function getBaseURL () {
    return location.protocol + "//" + location.hostname + (location.port && ":" + location.port);
}
var FILES = {
    slugify:function(text){
        text=text.replace(/[^-a-zA-Z0-9,&\s]+/ig,'');
        text=text.replace(/-/gi,"_");
        text=text.replace(/\s/gi,"-");
        text=text.toLowerCase();
        return text;
    },
    upload_file: function () {
        jQuery('.upload-photos').click(function(){
            jQuery('#form-upload-photos').modal('show')
        });
        'use strict';
        jQuery('#form-upload-photos').on('hidden.bs.modal', function () {
            if(jQuery('.wp-progress').length > 0){
                window.location.reload();
            }
        });
        jQuery('#browser-file').click(function(){
            jQuery('#image').click();
        });
        var acceptFileTypes = new RegExp('(.|\/)('+UPLOAD.ext+')$','i');
        jQuery('#image').fileupload({
            url: getBaseURL()+'/manager/files/uploadimage',
            dataType: 'json',
            acceptFileTypes:acceptFileTypes,
            maxFileSize:UPLOAD.size,
            formData:{_token:jQuery('input[name="_token"]').val(),folder_id:jQuery('#folder_id').val()},
            done: function (e, data) {
                var id = FILES.slugify(data.files[0].name);
                if(data.result.error !=0){
                    jQuery('#'+id+' .progress-bar').text(data.result.message);
                }
            },
            add:function (e, data) {
                var jqXHR = data.submit();
                jQuery.each(data.files, function (index, file) {
                    var id = FILES.slugify(file.name);
                    var html = '<div class = "wp-progress" id="wp_'+id+'"><div class="progress progressupload " id="'+id+'"><div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="0" style="width: 0%;">'+file.name+'</div> </div> <span class="btncancel btncancel-'+id+'" data-index = "'+index+'" ><i class="glyphicon glyphicon-remove-circle" ></i></span> </div>';
                    jQuery('.list-process').append(html);
                    if(!acceptFileTypes.test(file.name) || data.originalFiles[0]['size'] > Number(UPLOAD.size) ){
                        jQuery('#'+id).text("File invalid");
                        jqXHR.abort();
                    }
                    jQuery('.btncancel-'+id).click(function(){
                        jqXHR.abort();
                        jQuery(this).parent().remove();
                    });
                });

            },

            progress: function (e, data) {
                var id = FILES.slugify(data.files[0].name);
                var progress = parseInt(data.loaded / data.total * 100, 10);
                jQuery('#'+id+' .progress-bar').css(
                    'width',
                    progress + '%'
                );
            }
        });
    },
    file_detail: function () {
        jQuery('.photos').click(function(){
            jQuery('#photo-detail').modal('show');
            var id = jQuery(this).attr('data-id');
            var token = jQuery('input[name="_token"]').val();
            jQuery.ajax({
                url:getBaseURL()+'/manager/files/getdetail',
                data:{id:id,_token:token},
                type:'post',
                dataType:'json',
                success:function(data){
                    if(data.extension == 'jpg' || data.extension == 'png' || data.extension == 'jpeg' || data.extension == 'gif'){
                        jQuery('#image_preview').attr('src',SETTINGS.domain_image+'thumbs/200/200/'+data.url);
                    }else{
                        switch(data.extension){
                            case 'pdf':
                                url = getBaseURL()+'/js/tinymce/plugins/files/icons/pdf.png';
                                break;
                            case 'doc':
                            case 'docx':
                                url = getBaseURL()+'/js/tinymce/plugins/files/icons/doc.png';
                                break;
                            case 'xsl':
                            case 'xlsx':
                                url = getBaseURL()+'/js/tinymce/plugins/files/icons/excel.png';
                                break;
                            default:
                                url = getBaseURL()+'/js/tinymce/plugins/files/icons/file.png';
                                break;
                        }
                        jQuery('#image_preview').attr('src',url);
                    }                    
                    jQuery('#input-photo-filename').val(data.name);
                    jQuery('#input-photo-title').val(data.title);
                    jQuery('#input-photo-link').val(data.url);
                    jQuery('#input-photo-server').val(data.server);
                    jQuery('#input-extension').val(data.extension);
                    jQuery('#input-photo-id').val(data._id);
                    jQuery('#photo-filename').text(data.name);
                    jQuery('#file-type').text(data.extension);
                }
            })
        });
    },
    update_media:function(){        
        jQuery('#update-media').click(function(){
            jQuery('#photo-detail').modal('hide');
            jQuery.ajax({
                url:getBaseURL()+'/manager/files/update',
                data:jQuery('#form-edit-file').serialize(),
                type:'post',
                dataType:'json',
                success: function (data) {
                    console.log(data);
                    jQuery('#list-img').append('<div class="video-img-dd"><img src="http://placehold.it/100x100"></div>');
                    window.location.reload()
                }
            })
        });
    },
    delete_media:function(){
        jQuery('#delete-media').click(function(){
            var r  = confirm('Are you sure you want to delete this photo');
            if(r){
                jQuery('#photo-detail').modal('hide');
                jQuery.ajax({
                    url:getBaseURL()+'/manager/files/destroyfile',
                    data:jQuery('#form-edit-file').serialize(),
                    type:'post',
                    dataType:'json',
                    success: function (data) {                        
                        window.location.reload()
                    }
                })
            }
        })
    },

    slect_file: function () {
        jQuery('#select-media').click(function(){            
            parent.FILESELECTED.id = jQuery('#input-photo-id').val();
            parent.FILESELECTED.name = jQuery('#input-photo-filename').val();
            parent.FILESELECTED.title = jQuery('#input-photo-title').val();
            parent.FILESELECTED.server  = jQuery('#input-photo-server').val();
            parent.FILESELECTED.url = jQuery('#input-photo-link').val();
            parent.FILESELECTED.extension = jQuery('#input-extension').val();
            parent.POPUPFILE.close();
            jQuery('#photo-detail').modal('hide');           
        })
    },
    newfolder:function(){
        jQuery('#create-newfolder').click(function(){
            jQuery.ajax({
                url:getBaseURL()+'/manager/files/savefolder',
                data:{_token:jQuery('#frform-newfolder input[name="_token"]').val(),name:jQuery('#folder_name').val(),id:jQuery('#_id').val()},
                type:'post',
                dataType:'json',
                success:function(data){
                    window.location.reload();
                }
            });

        });
    },
    contextMenuleft:function(){
        var itemsDisabled = {};
        jQuery.contextMenu({
            selector: '.files-left',
            items: {
                "edit": {
                    name: "Edit",
                    icon: "edit",
                    callback: function(key, options) {
                        jQuery('#_id').val(jQuery(this).attr('data-id'));
                        jQuery('#folder_name').val(jQuery(this).attr('data-name'));
                        jQuery('#form-newfolder').modal('show')
                    },
                    disabled: function(key, opt) {
                        return !!itemsDisabled[key];
                    }
                },
                "newfolder": {
                    name: "new folder",
                    icon: "copy",
                    callback: function(key, options) {
                        jQuery('#_id').val('');
                        jQuery('#folder_name').val('')
                        jQuery('#form-newfolder').modal('show')
                    }
                },
                "delete": {
                    name: "Delete",
                    icon: "delete",
                    callback: function(key, options) {
                        var id = jQuery(this).attr('data-id');
                        var r = confirm('Are you sure you want to delete this folder')
                        if(r){
                            jQuery.ajax({
                                url:getBaseURL()+'/manager/files/deletefolder',
                                data:{id:id,_token:jQuery('#frform-newfolder input[name="_token"]').val()},
                                type:'post',
                                dataType:'json',
                                success: function (data) {
                                    window.location.reload();
                                }
                            });
                        }
                    },
                    disabled: function(key, opt) {
                        return !!itemsDisabled[key];
                    }
                }
            }

        });
        itemsDisabled["edit"] = true;
        itemsDisabled["delete"] = true;


        var itemsDisableds = {};
        jQuery.contextMenu({
            selector: '.folder-right-click',
            items: {
                "edit": {
                    name: "Edit",
                    icon: "edit",
                    callback: function(key, options) {
                        jQuery('#_id').val(jQuery(this).attr('data-id'));
                        jQuery('#folder_name').val(jQuery(this).attr('data-name'));
                        jQuery('#form-newfolder').modal('show')
                    }
                },
                "newfolder": {
                    name: "new folder",
                    icon: "copy",
                    callback: function(key, options) {
                        jQuery('#_id').val('');
                        jQuery('#folder_name').val('')
                        jQuery('#form-newfolder').modal('show')
                    },
                    disabled: function(key, opt) {
                        return !!itemsDisableds[key];
                    }
                },
                "delete": {
                    name: "Delete",
                    icon: "delete",
                    callback: function(key, options) {
                        var id = jQuery(this).attr('data-id');
                        var r = confirm('Are you sure you want to delete this folder')
                        if(r){
                            jQuery.ajax({
                                url:getBaseURL()+'/manager/files/deletefolder',
                                data:{id:id,_token:jQuery('#frform-newfolder input[name="_token"]').val()},
                                type:'post',
                                dataType:'json',
                                success: function (data) {
                                    window.location.reload();
                                }
                            });
                        }
                    }
                }
            }

        });
        itemsDisableds["newfolder"] = true;

    }



}

jQuery(document).ready(function(){
    FILES.upload_file();
    FILES.update_media();
    FILES.file_detail();
    FILES.delete_media();
    FILES.slect_file();
    FILES.newfolder();
    FILES.contextMenuleft();
})