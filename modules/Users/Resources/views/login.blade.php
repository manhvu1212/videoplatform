<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="ThemeBucket">
    <link rel="shortcut icon" href="/favicon.png">

    <title>@yield('title')</title>

    <!--Core CSS -->
    <link href="<?php echo Config::get('app.domain'); ?>/bs3/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo Config::get('app.domain'); ?>/css/bootstrap-reset.css" rel="stylesheet">
    <link href="<?php echo Config::get('app.domain'); ?>/font-awesome/css/font-awesome.css" rel="stylesheet" />

    <!-- Custom styles for this template -->
    <link href="<?php echo Config::get('app.domain'); ?>/css/style.css" rel="stylesheet">
    <link href="<?php echo Config::get('app.domain'); ?>/css/style-responsive.css" rel="stylesheet" />

    <!-- Just for debugging purposes. Don't actually copy this line! -->
    <!--[if lt IE 9]>
    <script src="<?php echo Config::get('app.domain'); ?>/js/ie8-responsive-file-warning.js"></script><![endif]-->

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
</head>

<body class="login-body">

<div class="container">
    @if (Session::has('message'))
        <div class="alert alert-success fade in">
            <button data-dismiss="alert" class="close close-sm" type="button">
                <i class="fa fa-times"></i>
            </button>
            {{ Session::get('message') }}
        </div>
    @endif

        <form action="<?php echo url("/user/loginsubmit") ?>" method="post" id = "form-login" class="form-signin">
        <input type="hidden" id="_token" name="_token" value="{{csrf_token()}}" >
        <h2 class="form-signin-heading">SINGIN NOW</h2>
        <div class="login-wrap">
            <div class="user-login-info">
                <input type="text" class="form-control" name="email" id="email" placeholder="{{trans('system.email')}}" autofocus>
                <input type="password" class="form-control" name="password" id="password" placeholder="Password">
            </div>
            <label class="checkbox">
                <input type="checkbox" name="rememberme" id="rememberme" value="1"> remember me
                <span class="pull-right">
                      <a data-toggle="modal" href="#forgot_passaword">forgot passaword?</a>
                  </span>
            </label>
            <button class="btn btn-lg btn-login btn-block" type="submit">Signin</button>
<!--            <div class="registration">-->
<!--                Don't have an account yet?-->
<!--                <a  href="--><?php //echo url("/register") ?><!--">-->
<!--                    Create an account-->
<!--                </a>-->
<!--            </div>-->

        </div>
        </form>
        <!-- Modal -->
        <div aria-hidden="true" aria-labelledby="forgot_passaword_lable" role="dialog" tabindex="-1" id="forgot_passaword" class="modal fade">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title">{{trans('system.forgot_passaword')}}?</h4>
                    </div>
                    <div class="modal-body">
                        <p>{{trans('system.enter_email_below')}}.</p>
                        <input type="text" name="email" id="email-forgot-password" placeholder="Email" autocomplete="off" class="form-control placeholder-no-fix">

                    </div>
                    <div class="modal-footer">
                        <button data-dismiss="modal" class="btn btn-default" type="button">{{trans('system.cancel')}}</button>
                        <button class="btn btn-success forgot-password-btn" type="button">{{trans('system.submit')}}</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- modal -->

</div>

<!-- Placed js at the end of the document so the pages load faster -->

<!--Core js-->
<script src="<?php echo Config::get('app.domain'); ?>/js/jquery.js"></script>
<script src="<?php echo Config::get('app.domain'); ?>/bs3/js/bootstrap.min.js"></script>
<!--<script src="--><?php //echo Config::get('app.domain'); ?><!--/js/alerts.js"></script>-->

</body>
</html>
