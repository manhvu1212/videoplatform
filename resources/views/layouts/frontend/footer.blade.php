<?php 
    $system_videos = Utility::getPersonalVideos();
    $popular_video = Utility::getPopularVideo();
     $taxo = Utility::get_video_cate();
    $views_videos   = $system_videos['views_videos'];

  
 ?>
 <footer class="footer">

        <section class="home">

            <div class="container">

                <a href="#" class="home">Home</a>

                <a href="#" class="top scroll-topp">Back to Top</a>

            </div>

        </section>

        <section class="container">

            <article class="v-gallery">

                <h5>FEATURED VIDEO GALLERY</h5>

                <ul class="mycarousel jcarousel-skin-tango row">

                    <!--LIST ITEMS START-->
                    @foreach($views_videos as $video)
                    <?php 
                        $title = $video->snippet->title; 
                        $thumb = $video->snippet->thumbnails->default->url;
                    ?>
                    <li class="span3">

                        <figure>

                            <div class="thumb">

                                <a href="/v={{$video->id}}&pr=1">
                                    <img src="{{$thumb}}" alt="">
                                </a>

                            </div>

                            <figcaption>

                                <p class="color">{{strlen($title)<30?$title:substr($title,0,29).' ...'}}</p>

                                <p>about 12 hours ago</p>

                            </figcaption>

                        </figure>

                    </li>
                    @endforeach

                </ul>

            </article>

             <article class="footer-widgets">

                <div class="row">

                <!--ABOUT US WIDGET START-->

                <div class=" span3 widget widget-aboutus">

                    <header class="header-style">

                        <h2 class="h-style"><img src="/assets/frontend/images/footer-logo.png" alt=""></h2>

                    </header>

                    <p>Viduze is a clean and responsive video theme. It has very rich contents in homepage. They can be grouped under category or post type. Every video item has representative image thumbnail. </p>

                    <p>Most amazing video magazine ever. [+]</p>

                    

                </div>

                <!--ABOUT US WIDGET END-->

                <!--GALLERY WIDGET START-->

                <div class=" span3 widget widget-papuler-video">

                    <header class="header-style">

                        <h2 class="h-style">Popular Videos</h2>

                    </header>

                    <ul>
                        @foreach($popular_video as $video)
                        <?php 
                        $title = $video->snippet->title; 
                        $thumb = $video->snippet->thumbnails->default->url;
                        ?>
                        <li>

                            <a href="/v={{$video->id}}&pr=0"><img style="width:70px;" src="{{$thumb}}" alt=""></a>

                        </li> 
                        @endforeach              

                    </ul>

                    

                </div>

                <!--GALLERY WIDGET END-->

                <!--CATEGORY WIDGET START-->

                <div class=" span3 widget categories-widget">

                    <header class="header-style">

                        <h2 class="h-style">Categoreis</h2>

                    </header>

                    <ul>
                        @foreach($taxo as $cate)
                             <li><a href="/t={{$cate->name}}&c={{$cate->description}}">{{$cate->name}}</a></li>
                         @endforeach
                    </ul>

                </div>

                <!--CATEGORY WIDGET END-->

                <!--TAGS WIDGET START-->

                <div class=" span3 widget tags-widget">

                    <header class="header-style">

                        <h2 class="h-style">tags</h2>

                    </header>

                    <ul>

                        <li><a href="/search?s_keywor=news">News</a></li>

                        <li><a href="#">Reviews</a></li>

                        <li><a href="#">Photos</a></li>

                        <li><a href="#">Video</a></li>

                        <li><a href="#">Blogs</a></li>

                        <li><a href="#">Festivals</a></li>

                        <li><a href="#">Artists</a></li>

                        <li><a href="#">News</a></li>

                        <li><a href="#">Reviews</a></li>

                        <li><a href="#">Photos</a></li>

                        <li><a href="#">Video</a></li>

                        <li><a href="#">Blogs</a></li>

                        <li><a href="#">Festivals</a></li>

                        <li><a href="#">Artists</a></li>

                    </ul>

                </div>

                <!--TAGS WIDGET END-->

                </div>

            </article>

            </article>

            <article class="copyrights">

                <p>Copyright © 2013 VIDEUZE. Designed by <a href="www.crunchpress.com">CrunchPress.com</a> </p>

            </article>

        </section>

        <section>
            <div id="video-modal" class="modal fade" role="dialog">
              <div class="modal-dialog">
                <div class="modal-content">                           
                </div>
              </div>
            </div>
        </section>

    </footer>   