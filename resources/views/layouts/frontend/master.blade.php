<!DOCTYPE html>
<!-- saved from url=(0022)http://gg.novario.net/ -->
<html lang="en"><script type="text/javascript">window["_gaUserPrefs"] = { ioo : function() { return true; } }</script><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <title>Main Star</title>
    <link rel="shortcut icon" href="<?php echo Config::get('app.domain'); ?>assets/frontend/images/favico.png">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="<?php echo Config::get('app.domain'); ?>assets/frontend/misc/bootstrap/css/bootstrap.css" rel="stylesheet">
    <script type="text/javascript" src="<?php echo Config::get('app.domain'); ?>assets/frontend/js/jquery.min.js"></script>
    <script type="text/javascript" src="<?php echo Config::get('app.domain'); ?>assets/frontend/misc/bootstrap/bootstrap.min.js"></script>
    <link rel="stylesheet" id="dashicons-css" href="<?php echo Config::get('app.domain'); ?>assets/frontend/css/dashicons.min.css" type="text/css" media="all">
    <link rel="stylesheet" id="themename-css" href="<?php echo Config::get('app.domain'); ?>assets/frontend/css/style.css" type="text/css" media="all">
    <link rel="stylesheet" id="themename-cssss" href="https://fortawesome.github.io/Font-Awesome/assets/font-awesome/css/font-awesome.css" type="text/css" media="all">

    <link href="<?php echo Config::get('app.domain'); ?>fontend/css/alert.css" rel="stylesheet">
    <script type="text/javascript" src="<?php echo Config::get('app.domain'); ?>js/admin/alerts.js"></script>
    <style type="text/css">.recentcomments a{display:inline !important;padding:0 !important;margin:0 !important;}</style>
    <script type="text/javascript" src="/fontend/js/home.js" ></script>

    @yield('style')
</head>
<body>
<div class="wrapper-full">
    @include('layouts.frontend.header')
    @yield('content')
    <!--Footer-->
    @include('layouts.frontend.footer')

</div>
@yield('script')
</body>
</html>