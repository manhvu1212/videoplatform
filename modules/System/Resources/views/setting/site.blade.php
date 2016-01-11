@extends('system::layouts.master')
@section('style')
    <link rel="stylesheet" type="text/css" href="/css/admin/home.css" />
@stop
@section('content')
<div class="row">
        <div class="col-lg-12">
            <ul class="breadcrumb" >
                         <li><a href="/dashboard"><i class="fa fa-home"></i> Dashboard</a></li>
                         <li class="active"> {{trans('system.site_setting')}}</li>
            </ul>
            <section class="panel">
                <header class="panel-heading">
                    {{trans('system.site_setting')}}

                </header>

                <div class="panel-body">
                    <form method="post" id="form-site-setting" class ="form-horizontal" >
                    <input type="hidden" id="_token" name="_token" value="{{csrf_token()}}" >
                        <input type = "hidden" id="_id" name="_id" value="{{isset($id)?$id:''}}" >
                        <input type="hidden" id="type" name="type" value="site_settings" >

                        <div class="form-group">
                            <label for="site_title" class="col-lg-2 col-sm-2 control-label" >{{ trans('system.site_title')}}</label>
                            <div class="col-lg-6">
                                <input type="text" value="{{isset($data->site_title)?$data->site_title:''}}" name="site_title" id="site_title"  style="width: 300px" class="form-control" >
                            </div>

                        </div>
                        <div class="form-group">
                            <label for="site_slogan" class="col-lg-2 col-sm-2 control-label" >{{ trans('system.site_slogan')}}</label>
                            <div class="col-lg-6">
                                <input type="text" value="{{isset($data->site_slogan)?$data->site_slogan:''}}" name="site_slogan" id="site_slogan"  style="width: 300px" class="form-control" >
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="site_email" class="col-lg-2 col-sm-2 control-label" >{{ trans('system.site_email')}}</label>
                            <div class="col-lg-6">
                                <input type="text" value="{{isset($data->site_email)?$data->site_email:''}}" name="site_email" id="site_email"  style="width: 300px" class="form-control" >
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="meta_keyword" class="col-lg-2 col-sm-2 control-label" >{{ trans('system.meta_keyword')}}</label>
                            <div class="col-lg-6">
                                <input type="text" value="{{isset($data->meta_keyword)?$data->meta_keyword:''}}" name="meta_keyword" id="meta_keyword"  style="width: 300px" class="form-control" >
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="meta_description" class="col-lg-2 col-sm-2 control-label" >{{ trans('system.meta_description')}}</label>
                            <div class="col-lg-6">
                                <input type="text" value="{{isset($data->meta_description)?$data->meta_description:''}}" name="meta_description" id="meta_description"  style="width: 300px" class="form-control" >
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="meta_description" class="col-lg-2 col-sm-2 control-label" >Domain Images</label>
                            <div class="col-lg-6">
                                <input type="text" value="{{isset($data->domain_image)?$data->domain_image:''}}" name="domain_image" id="domain_image"  style="width: 300px" class="form-control" >
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="meta_description" class="col-lg-2 col-sm-2 control-label" >Logo</label>
                            <div class="col-lg-6 input-group" STYLE="padding-left:15px">
                                <input type="text" class="form-control" readonly id = "imageurl1" name="logo" value="{{isset($data->logo)?$data->logo:''}}">
                                <div class="input-group-addon" onclick="SETTING.upload_image(1)" >Upload</div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="meta_description" class="col-lg-2 col-sm-2 control-label" >Banner</label>
                            <div class="col-lg-6 input-group" STYLE="padding-left:15px">
                                <input type="text" class="form-control" readonly id = "imageurl2" name="banner" value="{{isset($data->banner)?$data->banner:''}}">
                                <div class="input-group-addon" onclick="SETTING.upload_image(2)" >Upload</div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-lg-2 col-sm-2 control-label">&nbsp;</label>
                            <div class="col-lg-6">
                                <button type="button" id="sbmit_site_setting" class="btn btn-success"><i class="fa fa-save"></i> {{trans('system.save')}} </button>
                            </div>
                        </div>
                    </form>
                </div>
            </section>
        </div>
    </div>
{!! Utility::files() !!}
@stop
@section('script')
    <script src="/js/admin/settings.js" ></script>
@stop