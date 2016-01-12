@extends('system::layouts.master')

@section('style')
    <link rel="stylesheet" type="text/css" href="/js/select2/select2.css"/>
    <link rel="stylesheet" type="text/css" href="/css/admin/home.css"/>
@stop

@section('script')
    <script src="/js/admin/slide.js"></script>
    <?php
    $setting = Utility::setting('site_settings');
    if (isset($setting->content)) {
        $setting = json_decode($setting->content);
    }
    $setting1 = Utility::setting('file_settings');
    if (isset($setting1->content)) {
        $setting1 = json_decode($setting1->content);
    }
    ?>
    <script>
        var SETTINGS = {
            domain_image: "<?php echo $setting->domain_image ?>"
        };
        var UPLOAD = {
            size: parseInt("<?php echo $setting1->maximum_size*1024*1024 ;?>"),
            ext: "<?php echo $setting1->extension ?>"
        };
    </script>
@stop

@section('content')
    <div class="row">
        <div class="col-sm-12">
            <ul class="breadcrumb">
                <li><a href="/dashboard"><i class="fa fa-home"></i> Dashboard</a></li>
                <li><a href="/manager/slides">Slide</a></li>
                <li class="active">Add</li>
            </ul>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="portlet box blue">
                <div class="portlet-title">
                    <div class="caption"><i class="fa fa-slideshare"></i>Slide</div>

                </div>
                <div class="portlet-body form">
                    <form method="POST" id="form-add-slide" class="form-horizontal">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-body">
                                    <input id="_token" type="hidden" name="_token" value="{{ csrf_token() }}">
                                    <input id="_id" name="_id" type="hidden"
                                           value="{{isset($slide->_id) ? $slide->_id : ''}}">
                                    <input id="url" name="url" type="hidden" value="">

                                    <div class="form-group">
                                        <div class="text-center">
                                            <div class="btn-group btn-group-devided" data-toggle="buttons">
                                                <label class="btn btn-transparent red btn-outline btn-circle btn-sm"
                                                       onclick="SLIDES.choose_image()">
                                                    <input type="radio" name="options" value="image" class="toggle">IMAGE
                                                </label>
                                                <label class="btn btn-transparent red btn-outline btn-circle btn-sm"
                                                       onclick="SLIDES.choose_video()">
                                                    <input type="radio" name="options" value="video" class="toggle">VIDEO
                                                </label>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label>Video Id</label>

                                        <div class="input-group input-icon right">
                                            <span class="input-group-addon"><i class="fa fa-info"></i></span>
                                            <input id="image_video_id" class="input-error form-control"
                                                   type="text" name="image_video_id" readonly
                                                   value="">
                                            <span class="input-group-addon refresh-video display-hide"
                                                  style="cursor: pointer;"
                                                  onclick="SLIDES.refresh_video(jQuery('#image_video_id').val())">
                                                <i class="fa fa-refresh"></i>
                                            </span>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label>Title</label>

                                        <div class="input-group input-icon right">
                                            <span class="input-group-addon"><i class="fa fa-info"></i></span>
                                            <input class="input-error form-control" type="text" name="title"
                                                   value="">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label>Description</label>

                                        <div class="input-group input-icon right">
                                            <span class="input-group-addon"><i class="fa fa-info"></i></span>
                                            <input class="input-error form-control" type="text"
                                                   name="description" value="">
                                        </div>
                                    </div>

                                    <div class="form-group" id="thumbnail">
                                        <label>Thumbnail</label>

                                        <div class="input-group input-icon right">
                                            <input class="input-error form-control" type="hidden"
                                                   name="thumb" value="">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div id="thumb-preview" class="text-center"></div>
                            </div>
                        </div>


                        <div class="form-actions">
                            <div class="row">
                                <div class="col-md-12 text-center">
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

    {!! Utility::files() !!}
@stop

