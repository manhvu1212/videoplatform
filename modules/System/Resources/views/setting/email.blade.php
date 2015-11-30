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
                    <form method="post" id="form-smtp-setting" class = "form-horizontal" >
                        <input type = "hidden" id="_id" name="_id" value="{{isset($id)?$id:''}}" >
                        <input type="hidden" id="type" name="type" value="smtp_settings" >
                        <input id="_token" type="hidden" name="_token" value="{{csrf_token()}}" >

                        <div class="form-group">
                            <label for="host" class="col-lg-2 col-sm-2 control-label" >{{ trans('system.host')}}</label>
                            <div class="col-lg-6">
                                <input type="text" value="{{isset($data->host)?$data->host:''}}" name="host" id="host" style="width: 300px" class="form-control" >
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="host" class="col-lg-2 col-sm-2 control-label" >{{ trans('system.port')}}</label>
                            <div class="col-lg-6">
                                <input type="text" value="{{isset($data->port)?$data->port:''}}" name="port" id="host"  style="width: 300px" class="form-control" >
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="from[address]" class="col-lg-2 col-sm-2 control-label" >{{ trans('system.from_email')}}</label>
                            <div class="col-lg-6">
                                <input type="email" value="{{isset($data->from->address)?$data->from->address:''}}" name="from[address]" id="from[address]"  style="width: 300px" class="form-control" >
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="from[name]" class="col-lg-2 col-sm-2 control-label" >{{ trans('system.from_name')}}</label>
                            <div class="col-lg-6">
                                <input type="text" value="{{isset($data->from->name)?$data->from->name:''}}" name="from[name]" id="from[name]"  style="width: 300px" class="form-control" >
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="encryption" class="col-lg-2 col-sm-2 control-label" >{{ trans('system.encryption')}}</label>
                            <div class="col-lg-6">
                                <select id="encryption" name="encryption" style="width: 300px" class="form-control" >
                                    <option value="" >None</option>
                                    <option value="ssl" {{isset($data->encryption) && $data->encryption == 'ssl' ?'selected="selected"':''}} >ssl</option>
                                    <option value="tsl" {{isset($data->encryption) && $data->encryption == 'tsl' ?'selected="selected"':''}} >tsl</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="username" class="col-lg-2 col-sm-2 control-label" >{{ trans('system.username')}}</label>
                            <div class="col-lg-6">
                                <input type="text" value="{{isset($data->username)?$data->username:''}}" name="username" id="username"  style="width: 300px" class="form-control" >
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="username" class="col-lg-2 col-sm-2 control-label" >{{ trans('system.password')}}</label>
                            <div class="col-lg-6">
                                <input type="password"  name="password" id="password"  style="width: 300px" class="form-control" >
                            </div>
                        </div>
                        <hr>
                        <div class="form-group">
                            <label for="username" class="col-lg-2 col-sm-2 control-label" >{{ trans('system.email_contact')}}</label>
                            <div class="col-lg-6">
                                <input type="text" value="{{isset($data->email_contact)?$data->email_contact:''}}" name="email_contact" id="email_contact"  style="width: 300px" class="form-control" >
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="username" class="col-lg-2 col-sm-2 control-label" >{{ trans('system.address_contact')}}</label>
                            <div class="col-lg-6">
                                <input type="text" value="{{isset($data->address_contact)?$data->address_contact:''}}" name="address_contact" id="address_contact"  style="width: 300px" class="form-control" >
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="username" class="col-lg-2 col-sm-2 control-label" >{{ trans('system.Fax')}}</label>
                            <div class="col-lg-6">
                                <input type="text" value="{{isset($data->fax)?$data->fax:''}}" name="fax" id="fax"  style="width: 300px" class="form-control" >
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="username" class="col-lg-2 col-sm-2 control-label" >{{ trans('system.Main_Phone')}}</label>
                            <div class="col-lg-6">
                                <input type="text" value="{{isset($data->phone_contact)?$data->phone_contact:''}}" name="phone_contact" id="phone_contact"  style="width: 300px" class="form-control" >
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="username" class="col-lg-2 col-sm-2 control-label" >{{ trans('system.Customer Service:')}}</label>
                            <div class="col-lg-6">
                                <input type="text" value="{{isset($data->phone_contact1)?$data->phone_contact1:''}}" name="phone_contact1" id="phone_contact1"  style="width: 300px" class="form-control" >
                            </div>
                        </div>

                        <hr>
                        <div class="form-group">
                            <label for="username" class="col-lg-2 col-sm-2 control-label" >{{ trans('system.name_docusign')}}</label>
                            <div class="col-lg-6">
                                <input type="text" value="{{isset($data->name_docusign)?$data->name_docusign:''}}" name="name_docusign" id="name_docusign"  style="width: 300px" class="form-control" >
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="username" class="col-lg-2 col-sm-2 control-label" >{{ trans('system.email_docusign')}}</label>
                            <div class="col-lg-6">
                                <input type="text" value="{{isset($data->email_docusign)?$data->email_docusign:''}}" name="email_docusign" id="email_docusign"  style="width: 300px" class="form-control" >
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="username" class="col-lg-2 col-sm-2 control-label" >{{ trans('system.password_docusign')}}</label>
                            <div class="col-lg-6">
                                <input type="password" value="{{isset($data->password_docusign)?$data->password_docusign:''}}" name="password_docusign" id="password_docusign"  style="width: 300px" class="form-control" >
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="username" class="col-lg-2 col-sm-2 control-label" >{{ trans('system.key_docusign')}}</label>
                            <div class="col-lg-6">
                                <input type="text" value="{{isset($data->key_docusign)?$data->key_docusign:''}}" name="key_docusign" id="key_docusign"  style="width: 300px" class="form-control" >
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-lg-2 col-sm-2 control-label">&nbsp;</label>
                            <div class="col-lg-6">
                                <button type="button" id="sbmit_smtp_setting" class="btn btn-success"><i class="fa fa-save"></i> {{trans('system.save')}} </button>
                            </div>
                        </div>
                    </form>
                </div>


            </section>
           </div>
    </div>
@stop
@section('script')
    <script src="<?php echo Config::get('app.domain'); ?>/js/admin/settings.js" ></script>
@stop