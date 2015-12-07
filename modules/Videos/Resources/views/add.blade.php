@extends('system::layouts.master')
@section('style')
    <link rel="stylesheet" type="text/css" href="/js/select2/select2.css" />
    <link rel="stylesheet" type="text/css" href="/css/admin/home.css" />
    <link rel="stylesheet" type="text/css" href="/css/admin/videosplatform.css">
@stop
@section('script')
    <script src="/js/tinymce/tinymce.min.js" ></script>
    <script src="/js/select2/select2.js"></script>
    <script src="/js/jquery.tmpl.min.js" ></script>
    <script type="text/javascript" src="/assets/global/plugins/jquery-validation/js/jquery.validate.min.js"></script>
    <script src="/assets/admin/pages/scripts/form-validation.js"></script>
    <script type="text/javascript" src="/assets/global/plugins/jquery-validation/js/additional-methods.min.js"></script>
    <script src="https://www.youtube.com/iframe_api"></script>
    <script src="/js/admin/videosplatform.js"></script>
    <?php
    $setting=Utility::setting();
    $setting1=Utility::setting('file_settings');
        if(isset($setting1->content)){
            $setting1=json_decode($setting1->content);
        }
    ?>
    <script>
        var SETTINGS = <?php echo isset($setting->content)?$setting->content:''?>;
        var UPLOAD = { size:<?php echo $setting1->maximum_size*1024*1024 ;?>, ext:"<?php echo $setting1->extension ?>"}
    </script>
@stop
@section('content')
    <ul class="page-breadcrumb breadcrumb">
        <li>
            <a href="/dashboard">Home</a>
            <i class="fa fa-circle"></i>
        </li>
        <li>
            <a href="#">Add new</a>
        </li>
    </ul>
    <div class="row">
        <div class="col-md-12">
            <div class="portlet box blue">
                <div class="portlet-title">
                    <div class="caption">
                        <i class="fa fa-gift"></i> Videos
                    </div>
                    <div class="tools">
                        <a href="javascript:;" class="collapse" data-original-title="" title="">
                        </a>
                        <a href="#portlet-config" data-toggle="modal" class="config" data-original-title="" title="">
                        </a>
                        <a href="javascript:;" class="reload" data-original-title="" title="">
                        </a>
                        <a href="javascript:;" class="remove" data-original-title="" title="">
                        </a>
                    </div>
                </div>
                <div class="portlet-body form">
                    <form method="POST" id="form-add-video" class="form-horizontal">
                        <input id="_token" type="hidden" name="_token" value="{{ csrf_token() }}">
                        <input id="_id" name="_id" type="hidden" value="">                        
                        <div class="row"  style="padding-top:20px;">
                            <div class="col-md-9">                              
                                <div class="form-group">
                                    <label class="col-md-3 control-label">Titles<span class="required"> *</span></label>
                                    <div class="col-md-9"><input type="text" name="title_video" id="title_video" class="form-control" value="{{(isset($video)&&isset($video->title))?$video->title:''}}"></div>
                                </div>

                                <div class="form-group">
                                     <label class="col-md-3 control-label">Videos Url<span class="required"> *</span></label>
                                     <div class="col-md-8"><input type="text" name="url_video" id="url_video" class="form-control" value="{{(isset($video)&&isset($video->idVideo))?$video->idVideo:''}}"></div>
                                     <div class="col-md-1" style="text-align:right;"><button id="btn-reload" onclick="VIDEOS.reload_iframe($('#url_video').val())" type="button" class="btn btn-default"><i class="fa fa-refresh"></i></button></div>
                                </div> 

                                <div class="form-group">                                  
                                    <div class="col-md-offset-3 col-md-9" id="div_iframe">

                                        <iframe width="560" height="315" src="https://www.youtube.com/embed/eyFP5s403jY" frameborder="0" allowfullscreen></iframe>
                                   
                                    </div>
                                </div> 

                                <div class="form-group">
                                    <label class="col-md-3 control-label">Description</label>
                                    <div class="col-md-9"><textarea name="content" class="form-control content_post" style="height:300px;" id="content">{{(isset($video)&&isset($video->description))?$video->description:''}}</textarea></div>
                                </div> 

                                <div class="form-actions">
                                    <div>
                                        <div class="col-md-offset-3 col-md-9">
                                            <button type="submit" class="btn green" id="submit">Submit</button>
                                            <button type="button" class="btn default">Cancel</button>
                                        </div>
                                    </div>
                                </div>  

                            </div>
                            <div class="col-md-3">                               
                                <div class="input-group" style="padding:0px 15px !important;">
                                    <input type="hidden" id="imageid" name="imageid" >
                                    <input type="text" class="form-control" readonly id = "imageurl" name="imageurl" value="{{isset($img->url)?$img->url:''}}">
                                    <div class="input-group-addon" onclick="VIDEOS.upload_image(this)" >Upload</div>
                                </div>
                                <div class="list-img" id="list-img">
                                                                      
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