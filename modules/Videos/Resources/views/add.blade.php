@extends('system::layouts.master')
@section('style')
    <link rel="stylesheet" type="text/css" href="/js/select2/select2.css" />
    <link rel="stylesheet" type="text/css" href="/css/admin/home.css" />
@stop
@section('script')
    <script src="/js/tinymce/tinymce.min.js" ></script>
    <script src="/js/select2/select2.js"></script>
    <script src="/js/admin/videosplatform.js"></script>
    <script src="/js/admin/posts.js" ></script>
    <script src="/js/jquery.tmpl.min.js" ></script>
    <script type="text/javascript" src="/assets/global/plugins/jquery-validation/js/jquery.validate.min.js"></script>
    <script src="/assets/admin/pages/scripts/form-validation.js"></script>
    <script type="text/javascript" src="/assets/global/plugins/jquery-validation/js/additional-methods.min.js"></script>
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
                    <form method="post" id="form-add" class="form-horizontal">
                        <input id="_token" type="hidden" name="_token" value="{{csrf_token()}}">
                        <input id="_id" name="_id" type="hidden">                        
                        <div class="form-group">
                            <div class="control-label col-md-3">{{trans('system.title')}}<span class="required">*</span></div>
                            <div class="col-md-4"><input type="text" class="form-control" id="title" name="title" value=""/></div>
                        </div>
                        <div class="form-group">
                           <label class="control-label col-md-3">Url Videos</label>
                           <div class="col-md-4">
                               <input type="text" class="form-control" id="url_videos" value="">
                           </div>  
                           <div class="col-md-2"><button type="button" class="btn btn-default"><i class="fa fa-refresh"></i></button></div>  
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3"></label>
                            <div class="col-md-4">
                                <iframe width="560" height="315" src="https://www.youtube.com/embed/p4ryw5vascY" frameborder="0" allowfullscreen></iframe>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">Description</label>
                            <div class="col-md-8">
                                <textarea name="description" style="height:300px;" id="description" class="form-control content_post"></textarea>
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
@stop