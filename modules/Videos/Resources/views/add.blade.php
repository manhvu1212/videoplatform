@extends('system::layouts.master')
@section('style')
    {{--<link rel="stylesheet" type="text/css" href="/js/select2/select2.css"/>--}}
    <link rel="stylesheet" type="text/css" href="/css/admin/home.css"/>
    <link rel="stylesheet" type="text/css" href="/css/admin/videosplatform.css">
@stop
@section('script')
    <script src="/js/tinymce/tinymce.min.js"></script>
    {{--<script src="/js/select2/select2.js"></script>--}}
    <script src="/js/jquery.tmpl.min.js"></script>
    <script type="text/javascript" src="/assets/global/plugins/jquery-validation/js/jquery.validate.min.js"></script>
    <script src="/assets/admin/pages/scripts/form-validation.js"></script>
    <script type="text/javascript" src="/assets/global/plugins/jquery-validation/js/additional-methods.min.js"></script>
    <script src="https://www.youtube.com/iframe_api"></script>
    <script src="/js/admin/videosplatform.js"></script>
    <?php
    $setting = Utility::setting();
    $setting1 = Utility::setting('file_settings');
    if (isset($setting1->content)) {
        $setting1 = json_decode($setting1->content);
    }
    ?>
    <script>
        var SETTINGS = "<?php isset($setting->content) ? $setting->content : '' ?>";
        var UPLOAD = {
            size: "<?php echo $setting1->maximum_size*1024*1024 ;?>",
            ext: "<?php echo $setting1->extension ?>"
        }
    </script>
@stop
@section('content')
    <div class="row">
        <div class="col-sm-12">
            <ul class="breadcrumb">
                <li><a href="/dashboard"><i class="fa fa-home"></i> Dashboard</a></li>
                <li><a href="/manager/videos">Video</a></li>
                <li class="active">{{isset($video) ? 'Edit' : 'Add'}}</li>
            </ul>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="portlet box blue">
                <div class="portlet-title">
                    <div class="caption"><i class="fa fa-video-camera"></i>Video</div>
                </div>
                <div class="portlet-body form">
                    <form method="POST" id="form-add-video" class="form-horizontal">
                        <input id="_token" type="hidden" name="_token" value="{{ csrf_token() }}">
                        <input id="_id" name="_id" type="hidden" value="{{isset($video->_id) ? $video->_id : ''}}">

                        <div class="row" style="padding-top:20px;">
                            <div class="col-md-8">
                                <div class="form-group">
                                    <label class="col-md-2 control-label">
                                        {{trans('system.title')}}
                                        <span class="required"> *</span>
                                    </label>

                                    <div class="col-md-10">
                                        <input type="text" name="title_video" id="title_video" class="form-control"
                                               value="{{(isset($video) && isset($video->title)) ? $video->title : ''}}">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-md-2 control-label">
                                        {{trans('system.video_id')}}
                                        <span class="required"> *</span>
                                    </label>

                                    <div class="col-md-8">
                                        <input type="text" name="url_video" id="url_video" class="form-control"
                                               value="{{(isset($video) && isset($video->idVideo)) ? $video->idVideo : ''}}">
                                    </div>
                                    <div class="col-md-2" style="text-align:right;">
                                        <button id="btn-reload" onclick="VIDEOS.reload_iframe($('#url_video').val())"
                                                type="button" class="btn btn-default"><i class="fa fa-refresh"></i>
                                        </button>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-md-offset-2 col-md-10" id="div_iframe"></div>
                                </div>

                                <div class="form-group">
                                    <label class="col-md-2 control-label">{{trans('system.description')}}</label>

                                    <div class="col-md-10">
                                        <textarea name="content" class="form-control content_post" style="height:300px;"
                                                  id="content">{{(isset($video) && isset($video->description)) ? $video->description : ''}}</textarea>
                                    </div>
                                </div>


                            </div>
                            <div class="col-md-4">
                                <div class="input-group" style="padding:0px 15px !important;">
                                    <input type="hidden" id="imageid" name="imageid">
                                    <button type="button" class="btn green" onclick="VIDEOS.upload_image(this)">
                                        Upload
                                    </button>
                                    &nbsp;
                                    <button type="button" class="btn green" onclick="VIDEOS.show_modal_link(this)">
                                        Add Link
                                    </button>
                                </div>
                                <div class="list-img" id="list-img">
                                    @if(isset($video->images) && $video->images != '')
                                        @foreach($video->images as $k=>$image)
                                            <div class="video-img-dd">
                                                <input type="hidden" name="image[{{$k}}][id]" value="{{$image->id}}">
                                                <input type="hidden" name="image[{{$k}}][minutes]"
                                                       value="{{$image->minutes}}">
                                                <input type="hidden" name="image[{{$k}}][seconds]"
                                                       value="{{$image->seconds}}">
                                                <img src="/upload/{{$image->url}}" height="100px" width="100px"
                                                     id="{{$image->id}}">

                                                <div class='img-caption'>
                                                    <h2>{{$image->title}}</h2>
                                                    <input type="text" class="form-control"
                                                           name="image[{{$k}}][extern_url]"
                                                           value="{{isset($image->extern_url) ? $image->extern_url : ''}}">
                                                    <span>Time:
                                                        <b>
                                                            {{isset($image->minutes) ? $image->minutes : ''}}
                                                            :
                                                            {{isset($image->seconds) ? $image->seconds : ''}}
                                                        </b>
                                                    </span>
                                                </div>
                                                <div class="caption-action">
                                                    <span class="delete-image"><i class="fa fa-trash-o"></i></span>
                                                </div>
                                            </div>
                                        @endforeach
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="form-actions">
                            <div class="row">
                                <div class="col-md-offset-3 col-md-9">
                                    <button type="submit" class="btn green" id="submit">Submit</button>
                                    <button type="button" class="btn default">Cancel</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- modal -->
    <div aria-hidden="true" aria-labelledby="modal-add-link" role="dialog" tabindex="-1" id="modal-add-link"
         class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
                    <h4 class="modal-title">Add Link</h4>
                </div>
                <div class="modal-body">
                    <form action="" method="post" id="form-add-link">
                        <input id="_token" name="_token" type="hidden" value="{{ csrf_token() }}">
                        <input id="link" name="link" type="url" class="form-control" placeholder="Url">
                        <span class="help-block help-block-error" style="display: none;">Url not right.</span>
                        <img src="/images/loading.gif" class="img-responsive loading" src="/images/loading.gif"
                             height="40px" width="40px" style="display: none; margin: 10px auto;">

                        <div class="list-img bind-link"></div>
                    </form>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="button" onclick="VIDEOS.add_link_done()" class="btn btn-primary">Add</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {!! Utility::files() !!}
@stop