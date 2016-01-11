@extends('system::layouts.master')
@section('style')

@stop

{{--main--}}
@section('content')
    <div class="col-lg-12">
        <section class="panel">
            <header class="panel-heading">
                Add user
            </header>
            <div class="panel-body">
                <form class="form-horizontal" id="form-user" method="post"
                      action="<?php echo url("/manager/users/store"); ?>">
                    <input type="hidden" name="_token" id="_token" value="{{ csrf_token() }}">

                    <div class="col-lg-6">
                        <input type="hidden" id="id" name="id" value="{{isset($data['id'])?((string)$data['id']):''}}">

                        <div class="form-group">
                            <label for="email" class="col-lg-2 col-sm-2 control-label">Email<span
                                        class="required-field">*</span></label>

                            <div class="col-lg-6">
                                <input type="email" required style="width: 300px" class="form-control" name="email"
                                       id="email" value="{{isset($data['email'])?$data['email']:''}}">
                            </div>
                        </div>
                        <div class="form-group wp-password ">
                            <label for="password" class="col-lg-2 col-sm-2 control-label">Password<span
                                        class="required-field">*</span></label>

                            <div class="col-lg-6">
                                <input type="password"
                                       {{isset($data['id']) && $data['id']!=''?'':'required'}} id="password"
                                       autocomplete="off" name="password" style="width: 300px" class="form-control">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="retype_password" class="col-lg-2 col-sm-2 control-label">Retype-password<span
                                        class="required-field">*</span></label>

                            <div class="col-lg-6">
                                <input type="password"
                                       {{isset($data['id']) && $data['id']!=''?'':'required'}} style="width: 300px"
                                       class="form-control" name="retype_password" id="retype_password">

                                <div class="passwordconfirm" style="display: none">Passwords match: <span
                                            class="ok">no</span></div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="first_name" class="col-lg-2 col-sm-2 control-label">First name<span
                                        class="required-field">*</span></label>

                            <div class="col-lg-6">
                                <input type="text" style="width: 300px" class="form-control" name="first_name"
                                       id="first_name" value="{{isset($data['first_name'])?$data['first_name']:''}}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="last_name" class="col-lg-2 col-sm-2 control-label">Last name<span
                                        class="required-field">*</span></label>

                            <div class="col-lg-6">
                                <input type="text" style="width: 300px" class="form-control" name="last_name"
                                       id="last_name" value="{{isset($data['last_name'])?$data['last_name']:''}}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-lg-2 col-sm-2 control-label">&nbsp;</label>

                            <div class="col-lg-6">
                                <button type="submit" id="sbmituser" class="btn btn-success"><i class="fa fa-save"></i>
                                    Save
                                </button>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label class="col-sm-3 control-label col-lg-3" for="inputSuccess">Roles</label>

                            <div class="col-lg-6">
                                @foreach($groups as $v)
                                    <div class="checkbox">
                                        <label>
                                            <input type="checkbox" name="groups[]"
                                                   {{(isset($data['groups']) && in_array($v['id'],$data['groups']))?'checked="checked"':''}}  value="{{$v['id']}}">
                                            {{$v['name']}}
                                        </label>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </section>
    </div>
@stop

@section('script')
    <script src="/js/pwstrength.js"></script>
    <script src="/js/admin/users.js"></script>
@stop