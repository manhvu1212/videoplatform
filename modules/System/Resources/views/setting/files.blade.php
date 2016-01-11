@extends('system::layouts.master')

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
                    <form method="post" id="form-file-setting" class ="form-horizontal" >
                        <input type = "hidden" id="_id" name="_id" value="{{isset($id)?$id:''}}" >
                        <input type="hidden" id="type" name="type" value="file_settings" >
                        <input type="hidden" id="_token" name="_token" value="{{csrf_token()}}" >

                        <div class="form-group">
                            <label for="extension" class="col-lg-2 col-sm-2 control-label" >{{ trans('system.extension')}}</label>
                            <div class="col-lg-6">
                                <input type="text" value="{{isset($data->extension)?$data->extension:''}}" name="extension" id="extension"  style="width: 300px" class="form-control" >
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="maximum_size" class="col-lg-2 col-sm-2 control-label" >{{ trans('system.maximum_size')}}</label>
                            <div class="col-lg-6">
                                <input type="text" value="{{isset($data->maximum_size)?$data->maximum_size:''}}" name="maximum_size" id="maximum_size"  style="width: 300px" class="form-control" >
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-lg-2 col-sm-2 control-label">&nbsp;</label>
                            <div class="col-lg-6">
                                <button type="button" id="sbmitfile_setting" class="btn btn-success"><i class="fa fa-save"></i> {{trans('system.save')}} </button>
                            </div>
                        </div>
                    </form>
                </div>
            </section>
        </div>
    </div>
@stop

@section('script')
    <script src="/js/admin/settings.js" ></script>
@stop