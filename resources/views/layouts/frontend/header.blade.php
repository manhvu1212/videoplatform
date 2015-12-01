<?php
$user = Utility::getUser();
$setting = Utility::setting();
$setting=json_decode($setting->content);
?>
<div class="register-log">
    <div class="container">
        <div class="log-re">

            <div class="re-lg">
                <a class="log-a" href="<?php echo url("/Log-in-Sign-Up") ?>">Log in</a>
                <a class="reg-a" href="<?php echo url("/Log-in-Sign-Up") ?>">Open New Account</a>
            </div>

        </div>
    </div>
</div>
<div class="menu-mobile" style="display: none;">
    <a href="javascript:void(0)" id="cb-mob-close" class="cb-link">x</a>
    <nav class="main-nav">
        <ul id="menu-home-1" class="nav navbar-nav menuTopcus">
            <li class="menu-item menu-item-type-custom"><a href="<?php echo url("/page-self-directed-ira") ?>">Self-Directed IRA ypn</a>

            </li>
            <li class="menu-item menu-item-type-custom menu-item-object-custom menu-item-54"><a href="<?php echo url("/page-services") ?>">Services</a>
                <ul class="sub-menu-mkchds">
                    <li class="menu-item menu-item-type-custom"><a href="<?php echo url("/page-account-options") ?>">Account Options</a></li>
                    <li class="menu-item menu-item-type-custom"><a href="<?php echo url("/page-asset-types") ?>">Asset Types</a></li>
                </ul>
            </li>
            <li class="menu-item menu-item-type-custom menu-item-object-custom menu-item-54"><a href="<?php echo url("/page-news-and-updates") ?>">Resources</a>
                <ul class="sub-menu-mkchds">
                    <li class="menu-item menu-item-type-custom"><a href="<?php echo url("/page-news-and-updates") ?>">News</a></li>
                    <li class="menu-item menu-item-type-custom"><a href="<?php echo url("/page-investor-education") ?>">Investor Education</a></li>
                </ul>
            </li>
            <li class="menu-item menu-item-type-custom menu-item-object-custom menu-item-54"><a href="<?php echo url("/Faq") ?>">Working With Us</a></li>
            <li class="menu-item menu-item-type-custom menu-item-object-custom menu-item-54"><a href="<?php echo url("/Contact") ?>">Contact</a></li>
        </ul>
    </nav>
</div>
<div class="logo-menu-center">
    <div class="container">
        <div class="wap-lo-me">
            <div class="logo">
                <a href="/">
                    <img src="<?php echo Config::get('app.domain'); ?>upload/<?php echo $setting->logo?>" />
                </a>
                <a href="javascript:void(0)" class="cate-show-pa">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </a>
            </div>
            <div class="menu-center">
                <nav id="main-navigation" class="main-nav">
                    <ul id="menu-menu-top-1" class="nav navbar-nav menuTopcus">
                        <li class="menu-item menu-item-type-custom"><a href="<?php echo url("/page-self-directed-ira") ?>">Self-Directed IRA</a>

                        </li>
                        <li class="menu-item menu-item-type-custom menu-item-object-custom menu-item-54"><a href="<?php echo url("/page-services") ?>">Services</a>
                            <ul class="sub-menu">
                                <li class="menu-item menu-item-type-custom"><a href="<?php echo url("/page-account-options") ?>">Account Options</a></li>
                                <li class="menu-item menu-item-type-custom"><a href="<?php echo url("/page-asset-types") ?>">Asset Types</a></li>
                            </ul>
                        </li>
                        <li class="menu-item menu-item-type-custom menu-item-object-custom menu-item-54"><a href="<?php echo url("/page-news-and-updates") ?>">Resources</a>
                            <ul class="sub-menu">
                                <li class="menu-item menu-item-type-custom"><a href="<?php echo url("/page-news-and-updates") ?>">News</a></li>
                                <li class="menu-item menu-item-type-custom"><a href="<?php echo url("/page-investor-education") ?>">Investor Education</a></li>
5                            </ul>
                        </li>
                        <li class="menu-item menu-item-type-custom menu-item-object-custom menu-item-54"><a href="<?php echo url("/Faq") ?>">Working With Us</a></li>
                        <li class="menu-item menu-item-type-custom menu-item-object-custom menu-item-54"><a href="<?php echo url("/Contact") ?>">Contact</a></li>
                        <li class="menu-item menu-item-type-custom menu-item-object-custom menu-item-54"><a href="<?php echo url("/videos") ?>">Videos</a></li>
                    </ul>
                </nav>
            </div>
        </div>
        <div class="bor"></div>
    </div>
</div>