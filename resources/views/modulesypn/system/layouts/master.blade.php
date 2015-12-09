<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9 no-js"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en">


<!--<![endif]-->
<!-- BEGIN HEAD -->
<head>
    <meta charset="utf-8"/>
    <title>Metronic | Charts - Flotchart</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta content="width=device-width, initial-scale=1.0" name="viewport"/>
    <meta http-equiv="Content-type" content="text/html; charset=utf-8">
    <meta content="" name="description"/>
    <meta content="" name="author"/>
    <!-- BEGIN GLOBAL MANDATORY STYLES -->
    <link href="/assets/global/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css"/>
    <link href="/assets/global/plugins/simple-line-icons/simple-line-icons.min.css" rel="stylesheet" type="text/css"/>
    <link href="/assets/global/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
    <link href="/assets/global/plugins/uniform/css/uniform.default.css" rel="stylesheet" type="text/css"/>
    <link href="/assets/global/plugins/bootstrap-switch/css/bootstrap-switch.min.css" rel="stylesheet" type="text/css"/>
    <!-- END GLOBAL MANDATORY STYLES -->
    <!-- BEGIN THEME STYLES -->
    <link href="/assets/global/css/components.css" id="style_components" rel="stylesheet" type="text/css"/>
    <link href="/assets/global/css/plugins.css" rel="stylesheet" type="text/css"/>
    <link href="/assets/admin/layout/css/layout.css" rel="stylesheet" type="text/css"/>
    <link id="style_color" href="/assets/admin/layout/css/themes/darkblue.css" rel="stylesheet" type="text/css"/>
    <link href="/assets/admin/layout/css/custom.css" rel="stylesheet" type="text/css"/>
    <link href="/css/admin/home.css" rel="stylesheet" type="text/css"/>
    <link href="/js/ui-1.11.4/jquery-ui.css" rel="stylesheet">
    <!-- END THEME STYLES -->
    <link rel="shortcut icon" href="images/favicon.ico"/>
    <?php
    $setting=Utility::setting();
    $setting1=Utility::setting('file_settings');
        if(isset($setting1->content)){
            $setting1=json_decode($setting1->content);

        }
    ?>
    <script>
        <?php if(isset($setting1->content)){ ?>
        var SETTINGS = <?php echo $setting->content?>;
        var UPLOAD = { size:<?php echo $setting1->maximum_size*1024*1024 ;?>, ext:"<?php echo $setting1->extension ?>"}
        <?php } ?>
    </script>
    @yield('style')
    @yield('scriptheader')
</head>

<body class="page-header-fixed page-sidebar-closed-hide-logo ">
@include('system::layouts.header_sidebar')
<div class="clearfix">
</div>
<!-- BEGIN CONTAINER -->
<div class="page-container">
    @include('system::layouts.left_sidebar')
            <!-- BEGIN CONTENT -->
    <div class="page-content-wrapper">
        <div class="page-content">
            @if (Session::has('message'))
                <div class="alert alert-success fade in">
                    <button data-dismiss="alert" class="close close-sm" type="button">
                        <i class="fa fa-times"></i>
                    </button>
                    {{ Session::get('message') }}
                </div>
            @endif
            @yield('content')
        </div>
    </div>
    <!-- END CONTENT -->
</div>
<!-- END CONTAINER -->
<!-- BEGIN FOOTER -->
<div class="page-footer">
    <div class="page-footer-inner">
        2014 &copy; Metronic by keenthemes. <a href="http://themeforest.net/item/metronic-responsive-admin-dashboard-template/4021469?ref=keenthemes" title="Purchase Metronic just for 27$ and get lifetime updates for free" target="_blank">Purchase Metronic!</a>
    </div>
    <div class="scroll-to-top">
        <i class="icon-arrow-up"></i>
    </div>
</div>
<!--[if lt IE 9]>
<script src="/assets/global/plugins/respond.min.js"></script>
<script src="/assets/global/plugins/excanvas.min.js"></script>
<![endif]-->
<script src="/assets/global/plugins/jquery.min.js" type="text/javascript"></script>
<script src="/assets/global/plugins/jquery-migrate.min.js" type="text/javascript"></script>
<script src="/js/ui-1.11.4/jquery-ui.js"></script>
<script src="/assets/global/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
<script src="/assets/global/plugins/bootstrap-hover-dropdown/bootstrap-hover-dropdown.min.js" type="text/javascript"></script>
<script src="/assets/global/plugins/jquery-slimscroll/jquery.slimscroll.min.js" type="text/javascript"></script>
<script src="/assets/global/plugins/jquery.blockui.min.js" type="text/javascript"></script>
<script src="/assets/global/plugins/jquery.cokie.min.js" type="text/javascript"></script>

<script src="/assets/global/plugins/uniform/jquery.uniform.min.js" type="text/javascript"></script>

<script src="/assets/global/plugins/bootstrap-switch/js/bootstrap-switch.min.js" type="text/javascript"></script>
<script src="/assets/admin/pages/scripts/components-dropdowns.js" type="text/javascript"></script>
<script src="/assets/global/scripts/metronic.js" type="text/javascript"></script>
<script src="/assets/admin/layout/scripts/layout.js" type="text/javascript"></script>
<script src="/assets/admin/layout/scripts/quick-sidebar.js" type="text/javascript"></script>
<script src="/assets/admin/layout/scripts/demo.js" type="text/javascript"></script>
<script src="/assets/admin/pages/scripts/charts-amcharts.js"></script>
<script>
    jQuery(document).ready(function() {
        // initiate layout and plugins
        Metronic.init(); // init metronic core components
        Layout.init(); // init current layout
        Demo.init(); // init demo features
    });
</script>
<!--Core js-->
<script src="/js/admin/function.js"></script>
<script src="/js/admin/alerts.js"></script>
<!--[if lte IE 8]><![endif]-->
<script src="/js/bootstrap-switch.js"></script>
<!--common script init for all pages-->
<script src="/js/admin/system.js"></script>
<script src="/js/scripts.js"></script>
@yield('script')
        <!-- END PAGE LEVEL SCRIPTS -->
</body>
<!-- END BODY -->
</html>