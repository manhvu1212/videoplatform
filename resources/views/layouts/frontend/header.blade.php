<?php
$user = Utility::getUser();
$setting = Utility::setting();
$setting = json_decode($setting->content);
$tax = Utility::get_video_cate();
?>

@if(!isset($user['id']))
    <div class="modal-open">
        <div id="signin" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
             aria-hidden="true">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h3 id="myModalLabel">Sign In</h3>
            </div>

            <div class="modal-body">
                <div class="login-widget">
                    <form id="form_login" method="post">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <input type="text" name="email" placeholder="Email">
                        <input type="password" name="password" placeholder="Password">
                        <button type="submit" class="form-btn hover-style">Login</button>
                    </form>
                </div>
            </div>

            <div class="modal-footer">
                <p>Enter your Username and Password</p>
            </div>
        </div>

        <!--SIGNIN BOX END-->

        <!--SIGNUP BOX START-->

        <div id="signup" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
             aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                        <h3 id="myModalLabel">Sign Up</h3>
                    </div>

                    <div class="modal-body">
                        <div class="login-widget">
                            <form method="post" id="form_sign_up">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <input type="text" name="firstname" placeholder="First name">
                                <input type="text" name="lastname" placeholder="Last name">
                                <input type="text" name="email" placeholder="Email">
                                <input type="password" id="password" name="password" placeholder="Password">
                                <input type="password" name="repassword" placeholder="Retype Password">
                                <button type="submit" class="form-btn hover-style">Sing Up</button>
                            </form>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <p>Fill the given fields for singing up</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endif

<header class="border-color">
    <div class="container">
        <div class="logo">
            <a href="/home"><img src="/assets/frontend/images/logo.png" alt="VIDEO MAGAZINE"></a>
        </div>
        <div class="navbar main-navigation">
            <div class="sigin">
                @if(!isset($user['id']))
                    <a href="#signin" role="button" data-toggle="modal">Sign In</a>
                    <a href="#signup" role="button" data-toggle="modal">Sign Up</a>
                @else
                    <p class="user-logged">
                        <span>Hello,</span> <span>{{$user['first_name']}}</span> <span>{{$user['last_name']}}</span>
                        <span><a href="/user/logout">Logout</a></span>
                    </p>
                @endif
            </div>
            <nav class="navbar-inner">
                <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </a>

                <div class="nav-collapse">
                    <ul class="nav">
                        @foreach($tax as $cate)
                            <li><a href="/t={{$cate->name}}&c={{$cate->description}}">{{$cate->name}}</a></li>
                        @endforeach
                    </ul>
                </div>
            </nav>
        </div>
    </div>
</header>