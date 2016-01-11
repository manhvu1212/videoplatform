@extends('system::layouts.master')

@section('script')
    <script src="/js/admin/users.js" ></script>
@stop

@section('content')
 <div class="row">
            <div class="col-md-12">
                <ul class="breadcrumb" >
                    <li><a href="/manager/dashboard"><i class="fa fa-home"></i> Dashboard</a></li>
                    <li class="active">{{'profile'}}</li>
                </ul>
                <section class="panel">
                    <header class="panel-heading tab-bg-dark-navy-blue">
                        <ul class="nav nav-tabs nav-justified ">
                            <li class="active">
                                <a data-toggle="tab" href="#contacts" class="contact-map">
                                    Contacts
                                </a>
                            </li>
                            <li>
                                <a data-toggle="tab" href="#settings">
                                    Settings
                                </a>
                            </li>
                            <li>
                                <a data-toggle="tab" href="#password">
                                    Change password
                                </a>
                            </li>
                        </ul>
                    </header>
                    <div class="panel-body">
                        <div class="tab-content tasi-tab">
                            <div id="contacts" class="tab-pane active">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="prf-contacts">
                                            <h2> <span><i class="fa fa-map-marker"></i></span> location</h2>
                                            <div class="location-info">
                                                @if($profile['addr1']!='')
                                                <p> {{$profile['addr1']}} </p>
                                                @endif
                                                @if($profile['addr2']!='')
                                                <p> {{$profile['addr2']}} </p>
                                                @endif
                                            </div>
                                            <h2> <span><i class="fa fa-phone"></i></span> contacts</h2>
                                            <div class="location-info">
                                                @if($profile['phone']!='')
                                                <p>Phone	: {{$profile['phone']}} <br></p>
                                                @endif
                                                @if($profile['cell']!='')
                                                   <p> Cell		: {{$profile['cell']}}</p>
                                                @endif
                                                @if($profile['email']!='')
                                                <p>Email		: {{$profile['email']}}<br></p>
                                                @endif
                                                @if($profile['skype'])
                                                 <p>   Skype		: {{$profile['skype']}}</p>
                                                @endif
                                                @if($profile['facebook']!='')
                                                <p>
                                                    Facebook	: {{$profile['facebook']}}<br></p>
                                                @endif
                                                @if($profile['twitter']!='')
                                                    <p>Twitter	: {{$profile['twitter']}}
                                                </p>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div id="settings" class="tab-pane ">
                                <form action="/user/myprofilestore" method="post" id="form-profile" class="form-horizontal" >
                                    <input type="hidden" name="_token" value="{{csrf_token()}}" >
                                <div class="position-center">
                                    <div class="prf-contacts sttng">
                                        <h2>  Personal Information</h2>
                                    </div>
                                        <div class="form-group">
                                            <label class="col-lg-2 control-label">Company</label>
                                            <div class="col-lg-6">
                                                <input type="text" placeholder=" " id="c-name" name="company" value="{{$profile['company']}}" class="form-control">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-lg-2 control-label">Lives In</label>
                                            <div class="col-lg-6">
                                                <input type="text" placeholder=" " id="lives-in" name="lives_in" value="{{$profile['lives_in']}}" class="form-control">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-lg-2 control-label">Country</label>
                                            <div class="col-lg-6">
                                                <input type="text" placeholder=" " id="country" name="country" value="{{$profile['country']}}" class="form-control">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-lg-2 control-label">Description</label>
                                            <div class="col-lg-10">
                                                <textarea rows="10" cols="30" class="form-control" id="description" name="description">{{$profile['description']}}</textarea>
                                            </div>
                                        </div>
                                    <div class="prf-contacts sttng">
                                        <h2> socail networks</h2>
                                    </div>
                                        <div class="form-group">
                                            <label class="col-lg-2 control-label">Facebook</label>
                                            <div class="col-lg-6">
                                                <input type="text" placeholder=" " id="fb-name" name="facebook" value="{{$profile['facebook']}}" class="form-control">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-lg-2 control-label">Twitter</label>
                                            <div class="col-lg-6">
                                                <input type="text" placeholder=" " id="twitter" name="twitter" value="{{$profile['twitter']}}" class="form-control">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-lg-2 control-label">Google plus</label>
                                            <div class="col-lg-6">
                                                <input type="text" placeholder=" " id="g-plus" name="google_plus" value="{{$profile['google_plus']}}" class="form-control">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-lg-2 control-label">Flicr</label>
                                            <div class="col-lg-6">
                                                <input type="text" placeholder=" " id="flicr" name="flicr" value="{{$profile['flicr']}}" class="form-control">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-lg-2 control-label">Youtube</label>
                                            <div class="col-lg-6">
                                                <input type="text" placeholder=" " id="youtube" name="youtube" value="{{$profile['youtube']}}" class="form-control">
                                            </div>
                                        </div>

                                    <div class="prf-contacts sttng">
                                        <h2>Contact</h2>
                                    </div>
                                        <div class="form-group">
                                            <label class="col-lg-2 control-label">Address 1</label>
                                            <div class="col-lg-6">
                                                <input type="text" placeholder=" " id="addr1" name="addr1" value="{{$profile['addr1']}}" class="form-control">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-lg-2 control-label">Address 2</label>
                                            <div class="col-lg-6">
                                                <input type="text" placeholder=" " id="addr2" name="addr2" value="{{$profile['addr2']}}" class="form-control">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-lg-2 control-label">Phone</label>
                                            <div class="col-lg-6">
                                                <input type="text" placeholder=" " id="phone" name="phone" value="{{$profile['phone']}}" class="form-control">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-lg-2 control-label">Cell</label>
                                            <div class="col-lg-6">
                                                <input type="text" placeholder=" " id="cell" name="cell" value="{{$profile['cell']}}" class="form-control">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-lg-2 control-label">Email</label>
                                            <div class="col-lg-6">
                                                <input type="text" placeholder=" " id="email" name="email" value="{{$profile['email']}}" class="form-control">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-lg-2 control-label">Skype</label>
                                            <div class="col-lg-6">
                                                <input type="text" placeholder=" " id="skype" name="skype" value="{{$profile['skype']}}" class="form-control">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <div class="col-lg-offset-2 col-lg-10">
                                                <button class="btn btn-primary" type="submit">Save</button>
                                            </div>
                                        </div>
                                </div>
                               </form>
                            </div>
                            <div id="password" class="tab-pane ">
                                <form action="/changpassword" method="post" id="form-change-password" class="form-horizontal" >
                                    <input type="hidden" name="_token" value="{{csrf_token()}}" >
                                    <div class="position-center">
                                    <div class="form-group">
                                        <label class="col-lg-2 control-label">{{trans('system.curent_password')}}</label>
                                        <div class="col-lg-6">
                                            <input type="password" placeholder=" " id="curent_password" name="curent_password" class="form-control">
                                            <p class="help-block" >{{ $errors->first('curent_password') }}</p>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-lg-2 control-label">{{trans('system.newpassword')}}</label>
                                        <div class="col-lg-6">
                                            <input type="password" placeholder=" " id="newpassword" name="newpassword" class="form-control">
                                            <p class="help-block" >{{ $errors->first('newpassword') }}</p>

                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-lg-2 control-label">{{trans('system.retype_password')}}</label>
                                        <div class="col-lg-6">
                                            <input type="password"  id="retype_password" name="retype_password" class="form-control">
                                            <p class="help-block" >{{ $errors->first('retype_password') }}</p>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="col-lg-offset-2 col-lg-10">
                                            <button class="btn btn-primary" type="submit">{{trans('system.submit')}}</button>
                                        </div>
                                    </div>
                                </div>
                             </form>

                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>

@stop
