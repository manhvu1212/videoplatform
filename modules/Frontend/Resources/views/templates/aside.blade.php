<div class="side-bar">

                	<!--SEARCH WIDGET START-->

                	<div class="widget search-widget">

                    	<header class="header-style">

                            <h2 class="h-style">Search</h2>

                        </header>

                        <div class="widget-bg">

                           <form class="form-search">

                            <input type="text" class="input-medium search-query">

                            <button type="submit" class="hover-style">Search</button>

                            </form>

                        </div>

                    </div>

                    <!--SEARCH WIDGET END-->

                    <!--SOCIAL WIDGET START-->

                    <div class="widget social-widget">

                    	<header class="header-style">

                            <h2 class="h-style">STAY Connected</h2>

                        </header>

                        <div class="widget-bg">

                            <ul>

                                <li><a href="#" data-toggle="tooltip" title="Facebook"><img src="/assets/frontend/images/facebook.png"></a></li>

                                <li><a href="#" data-toggle="tooltip" title="Youtube"><img src="/assets/frontend/images/youtube.png"></a></li>

                                <li><a href="#" data-toggle="tooltip" title="Twitter"><img src="/assets/frontend/images/twitter.png"></a></li>

                                <li><a href="#" data-toggle="tooltip" title="Pintrest"><img src="/assets/frontend/images/pin.png"></a></li>

                                <li><a href="#" data-toggle="tooltip" title="RSS Feeds"><img src="/assets/frontend/images/rss.png"></a></li>

                                <li><a href="#" data-toggle="tooltip" title="Google Plus"><img src="/assets/frontend/images/g-plus.png"></a></li>

                            </ul>

                        </div>

                    </div>

                    <!--SOCIAL WIDGET END-->

                    <!--SOCIAL WIDGET START-->

                    <div class="widget tabs-widget">

                        <ul class="nav nav-tabs" id="myTab">

                            <li class="active"><a href="#recent">Recent</a></li>

                            <li><a href="#commented">Commented</a></li>

                            <li><a href="#papular">Papular</a></li>

                        </ul>

                        <div class="tab-content">

                            <div class="tab-pane active" id="recent">

                                <div class="small-thumbs">

                                    <ul>

                                         <!--LIST ITEMS START-->
                                         @foreach($personal_videos as $video)
                                         <?php 
                                         	$title = $video->snippet->title; 
                                         	$thumb = $video->snippet->thumbnails->default->url;
                                         	?>
                                        <li>

                                            <figure>

                                                <div class="thumb">

                                                    <a href="video-detail.html"><img src="{{$thumb}}" alt=""></a>

                                                    <div class="play">

                                                        <a rel="prettyPhoto" href="http://vimeo.com/7874398&width=700"><img src="/assets/frontend/images/play2.png" alt=""></a>

                                                    </div>

                                                </div>

                                                <figcaption>

                                                    <p>{{$title}}</p>

                                                    <p class="color">27 may 2013</p>

                                                </figcaption>

                                            </figure>

                                        </li>  
                                        @endforeach                                      

                                    </ul>

                                 </div>

                            </div>

                            <div class="tab-pane" id="commented">

                            	<div class="small-thumbs">

                                    <ul>

                                    	<!--LIST ITEMS START-->

                                        <li>

                                            <figure>

                                                <div class="thumb">

                                                    <a href="video-detail.html"><img src="/assets/frontend/images/small-thumb2.png" alt=""></a>

                                                    <div class="play">

                                                        <a rel="prettyPhoto" href="http://vimeo.com/7874398&width=700"><img src="/assets/frontend/images/play2.png" alt=""></a>

                                                    </div>

                                                </div>

                                                <figcaption>

                                                    <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accu architecto... </p>

                                                    <p class="color">27 may 2013</p>

                                                </figcaption>

                                            </figure>

                                        </li>

                                        <!--LIST ITEMS END-->

                                        <!--LIST ITEMS START-->

                                        <li>

                                            <figure>

                                                <div class="thumb">

                                                    <a href="video-detail.html"><img src="/assets/frontend/images/small-thumb.png" alt=""></a>

                                                    <div class="play">

                                                        <a rel="prettyPhoto" href="http://vimeo.com/7874398&width=700"><img src="/assets/frontend/images/play2.png" alt=""></a>

                                                    </div>

                                                </div>

                                                <figcaption>

                                                    <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accu architecto... </p>

                                                    <p class="color">27 may 2013</p>

                                                </figcaption>

                                            </figure>

                                        </li>

                                        <!--LIST ITEMS END-->

                                        <!--LIST ITEMS START-->

                                        <li>

                                            <figure>

                                                <div class="thumb">

                                                    <a href="video-detail.html"><img src="/assets/frontend/images/small-thumb4.png" alt=""></a>

                                                    <div class="play">

                                                        <a rel="prettyPhoto" href="http://vimeo.com/7874398&width=700"><img src="/assets/frontend/images/play2.png" alt=""></a>

                                                    </div>

                                                </div>

                                                <figcaption>

                                                    <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accu architecto... </p>

                                                    <p class="color">27 may 2013</p>

                                                </figcaption>

                                            </figure>

                                        </li>

                                        <!--LIST ITEMS END-->

                                        <!--LIST ITEMS START-->

                                        <li>

                                            <figure>

                                                <div class="thumb">

                                                    <a href="video-detail.html"><img src="/assets/frontend/images/small-thumb3.png" alt=""></a>

                                                    <div class="play">

                                                        <a rel="prettyPhoto" href="http://vimeo.com/7874398&width=700"><img src="/assets/frontend/images/play2.png" alt=""></a>

                                                    </div>

                                                </div>

                                                <figcaption>

                                                    <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accu architecto... </p>

                                                    <p class="color">27 may 2013</p>

                                                </figcaption>

                                            </figure>

                                        </li>

                                        <!--LIST ITEMS END-->

                                    </ul>

                                 </div>

                            </div>

                            <div class="tab-pane" id="papular">

                            	<div class="small-thumbs">

                                    <ul>

                                    	<!--LIST ITEMS START-->

                                        <li>

                                            <figure>

                                                <div class="thumb">

                                                    <a href="video-detail.html"><img src="/assets/frontend/images/small-thumb2.png" alt=""></a>

                                                    <div class="play">

                                                        <a rel="prettyPhoto" href="http://vimeo.com/7874398&width=700"><img src="/assets/frontend/images/play2.png" alt=""></a>

                                                    </div>

                                                </div>

                                                <figcaption>

                                                    <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accu architecto... </p>

                                                    <p class="color">27 may 2013</p>

                                                </figcaption>

                                            </figure>

                                        </li>

                                        <!--LIST ITEMS END-->

                                        <!--LIST ITEMS START-->

                                        <li>

                                            <figure>

                                                <div class="thumb">

                                                    <a href="video-detail.html"><img src="/assets/frontend/images/small-thumb.png" alt=""></a>

                                                    <div class="play">

                                                        <a rel="prettyPhoto" href="http://vimeo.com/7874398&width=700"><img src="/assets/frontend/images/play2.png" alt=""></a>

                                                    </div>

                                                </div>

                                                <figcaption>

                                                    <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accu architecto... </p>

                                                    <p class="color">27 may 2013</p>

                                                </figcaption>

                                            </figure>

                                        </li>

                                        <!--LIST ITEMS END-->

                                        <!--LIST ITEMS START-->

                                        <li>

                                            <figure>

                                                <div class="thumb">

                                                    <a href="video-detail.html"><img src="/assets/frontend/images/small-thumb4.png" alt=""></a>

                                                    <div class="play">

                                                        <a rel="prettyPhoto" href="http://vimeo.com/7874398&width=700"><img src="/assets/frontend/images/play2.png" alt=""></a>

                                                    </div>

                                                </div>

                                                <figcaption>

                                                    <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accu architecto... </p>

                                                    <p class="color">27 may 2013</p>

                                                </figcaption>

                                            </figure>

                                        </li>

                                        <!--LIST ITEMS END-->

                                        <!--LIST ITEMS START-->

                                        <li>

                                            <figure>

                                                <div class="thumb">

                                                    <a href="video-detail.html"><img src="/assets/frontend/images/small-thumb3.png" alt=""></a>

                                                    <div class="play">

                                                        <a rel="prettyPhoto" href="http://vimeo.com/7874398&width=700"><img src="/assets/frontend/images/play2.png" alt=""></a>

                                                    </div>

                                                </div>

                                                <figcaption>

                                                    <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accu architecto... </p>

                                                    <p class="color">27 may 2013</p>

                                                </figcaption>

                                            </figure>

                                        </li>

                                        <!--LIST ITEMS END-->

                                    </ul>

                                 </div>

                            </div>

                        </div>

                    </div>

                    <!--SOCIAL WIDGET END-->

                </div>