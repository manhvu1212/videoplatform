<?php
$url = Request::url();
$user = Sentry::getUser();

?>
        <!-- BEGIN SIDEBAR -->
<div class="page-sidebar-wrapper">
    <!-- DOC: Set data-auto-scroll="false" to disable the sidebar from auto scrolling/focusing -->
    <!-- DOC: Change data-auto-speed="200" to adjust the sub menu slide up/down speed -->
    <div class="page-sidebar navbar-collapse collapse">
        <!-- BEGIN SIDEBAR MENU -->
        <!-- DOC: Apply "page-sidebar-menu-light" class right after "page-sidebar-menu" to enable light sidebar menu style(without borders) -->
        <!-- DOC: Apply "page-sidebar-menu-hover-submenu" class right after "page-sidebar-menu" to enable hoverable(hover vs accordion) sub menu mode -->
        <!-- DOC: Apply "page-sidebar-menu-closed" class right after "page-sidebar-menu" to collapse("page-sidebar-closed" class must be applied to the body element) the sidebar sub menu mode -->
        <!-- DOC: Set data-auto-scroll="false" to disable the sidebar from auto scrolling/focusing -->
        <!-- DOC: Set data-keep-expand="true" to keep the submenues expanded -->
        <!-- DOC: Set data-auto-speed="200" to adjust the sub menu slide up/down speed -->
        <ul class="page-sidebar-menu " data-keep-expanded="false" data-auto-scroll="true" data-slide-speed="200">

            @if($user->hasAnyAccess(array('access-users')))
                <li class="<?php echo (Request::is('manager/users*')) ? 'active open' : '' ?>">
                    <a href="javascript:;">
                        <i class="icon-user"></i>
                        <span class="title">Users</span>
                        <span class="arrow "></span>
                    </a>
                    <ul class="sub-menu">
                        @if($user->hasAnyAccess(array('access-groups-users')))
                            <li><a href="/manager/users/groups">Groups</a></li>
                        @endif
                        <li><a href="/manager/users">List users</a></li>
                        <li><a href="/manager/users/edit">Add user</a></li>
                        @if($user->hasAnyAccess(array('access-permission')))
                            <li><a href="/manager/users/permission">Permission</a></li>
                        @endif
                    </ul>
                </li>
            @endif

            @if($user->hasAnyAccess(array('access-taxonomy')))
                <li class="<?php echo (Request::is('manager/taxonomy*')) ? 'active open' : '' ?>">
                    <a href="javascript:;">
                        <i class="icon-rocket"></i>
                        <span class="title">Category</span>
                        <span class="arrow "></span>
                    </a>
                    <ul class="sub-menu">
                        <li class="<?php echo (Request::is('manager/taxonomy*')) ? 'active' : '' ?>"><a
                                    href="/manager/taxonomy">List</a></li>
                        {{--<li><a href="/manager/products/catproduct/add">Add Catproduct</a></li>--}}
                    </ul>
                </li>
            @endif


            @if($user->hasAnyAccess(array('access-videos')))
                <li class="<?php echo (Request::is('manager/videos*')) ? 'active open' : '' ?>">
                    <a class="" href="javascript:;">
                        <i class="fa fa-video-camera"></i>
                        <span class="title">Videos</span>
                        <span class="arrow "></span>
                    </a>
                    <ul class="sub-menu">
                        <li class="<?php echo (Request::is('manager/videos')) ? 'active' : '' ?>"><a href="/manager/videos">List</a></li>
                        <li class="<?php echo (Request::is('manager/videos/add')) ? 'active' : '' ?>"><a href="/manager/videos/add">Add</a></li>
                    </ul>
                </li>
            @endif

            @if($user->hasAnyAccess(array('access-slides')))
                <li class="<?php echo (Request::is('manager/slides*')) ? 'active open' : '' ?>">
                    <a class="" href="javascript:;">
                        <i class="fa fa-slideshare"></i>
                        <span class="title">Slides</span>
                        <span class="arrow "></span>
                    </a>
                    <ul class="sub-menu">
                        <li class="<?php echo (Request::is('manager/slides')) ? 'active' : '' ?>"><a href="/manager/slides">List</a></li>
                        <li class="<?php echo (Request::is('manager/slides/add')) ? 'active' : '' ?>"><a href="/manager/slides/add">Add</a></li>
                    </ul>
                </li>
            @endif

            @if($user->hasAnyAccess(array('access-form')))
                <li class="<?php echo (Request::is('manager/form*')) ? 'active open' : '' ?>">
                    <a class="" href="javascript:;">
                        <i class="fa fa-book"></i>
                        <span class="title">Docusign Form</span>
                        <span class="arrow "></span>
                    </a>
                    <ul class="sub-menu">
                        <li><a href="/manager/form">List</a></li>
                        <li><a href="/manager/form/add ">Add</a></li>
                    </ul>
                </li>
            @endif
            @if($user->hasAnyAccess(array('access-registers')))
                <li class="<?php echo (Request::is('manager/registers*')) ? 'active open' : '' ?>">
                    <a class="" href="javascript:;">
                        <i class="fa fa-book"></i>
                        <span class="title">Registers</span>
                        <span class="arrow "></span>
                    </a>
                    <ul class="sub-menu">
                        <li><a href="/manager/registers">List</a></li>
                    </ul>
                </li>
            @endif

            @if($user->hasAnyAccess(array('access-settings')))
                <li lass="last ">
                    <a class="<?php echo (Request::is('manager/system/setting*')) ? 'active dcjq-parent' : '' ?>"
                       href="javascript:;">
                        <i class="icon-settings"></i>
                        <span class="title">Settings</span>
                        <span class="arrow "></span>
                    </a>
                    <ul class="sub-menu">
                        <li><a href="/manager/system/setting/email">Email</a></li>
                        <li><a href="/manager/system/setting/file">File</a></li>
                        <li><a href="/manager/system/setting/site">Site</a></li>
                    </ul>
                </li>
            @endif
        </ul>
        <!-- END SIDEBAR MENU -->
    </div>
</div>
<!-- END SIDEBAR -->

