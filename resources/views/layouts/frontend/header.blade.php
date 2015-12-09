<?php
$user = Utility::getUser();
$setting = Utility::setting();
$setting=json_decode($setting->content);
?>
<?php
$user = Utility::getUser();
$setting = Utility::setting();
$setting=json_decode($setting->content);

?>
<header class="border-color">

        <div class="container">

            <div class="logo">

            <img src="/assets/frontend/images/logo.png" alt="VIDEO MAGAZINE">

            </div>

                <div class="navbar main-navigation">

                    <div class="sigin">

                        <a href="#signin" role="button" data-toggle="modal">Sign In</a>

                        <a  href="#signup" role="button" data-toggle="modal">Sign Up</a>

                    </div>

                  <nav class="navbar-inner">

                      <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">

                        <span class="icon-bar"></span>

                        <span class="icon-bar"></span>

                        <span class="icon-bar"></span>

                      </a>

                      <div class="nav-collapse">

                         <ul class="nav">

                            <li><a href="index.html">Home</a></li>

                            <li><a href="about-us.html">About Us</a></li>

                            <li><a href="#">Pages</a>

                                <ul>

                                    <li><a href="search-result.html">Search Result</a></li>

                                    <li><a href="404.html">Error 404</a></li>

                                </ul>

                            </li>

                            <li><a href="#">Buddy Press</a>

                                <ul>

                                    <li><a href="buddy-press.html">BuddyPress</a></li>

                                    <li><a href="buddy-press-active.html">BuddyPress Active</a></li>

                                    <li><a href="buddy-press-member.html">BuddyPress Active Members</a></li>

                                </ul>

                            </li>

                            <li><a href="#">Videos</a>

                                <ul>

                                    <li><a href="brows-videos.html">Brows Video</a></li>

                                    <li><a href="video-detail.html">Video Detail</a></li>

                                    <li><a href="archives.html">Archives</a></li>

                                </ul>

                            </li>

                            <li><a href="#">Blog</a>

                                <ul>

                                    <li><a href="blog.html">Blog</a></li>

                                    <li><a href="blog-detail.html">Blog Detail</a></li>

                                </ul>

                            </li>

                            <li><a href="categories.html">Categories</a></li>

                            <li><a href="contact-us.html">Contact us</a></li>

                        </ul>

                      </div>

                  </nav>

                </div>

        </div>

    </header>