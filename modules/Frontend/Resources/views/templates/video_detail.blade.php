@extends('layouts.frontend.master')
@section('content')

    <section class="banner img-less">

    	<div class="container">

        	<div id="slider" class="flexslider">

              <ul class="slides no-img">

                <li>

                    <img src="/assets/frontend/images/banner1.png" alt="">

                    <div class="caption resize">

                    	<h2>Lorem ipsum dolor</h2>

                        <h4>behind the scenes</h4>

                    </div>

                    </li>

                    <li>

                    <img src="/assets/frontend/images/banner2.png" alt="">

                    <div class="caption resize">

                    	<h2>sadipscing elitr</h2>

                        <h4>behind the scenes</h4>

                    </div>

                    </li>

                    <li>
                    
                    <img src="/assets/frontend/images/banner3.png" alt="">

                    <div class="caption resize">

                    	<h2>justo duo</h2>

                        <h4>behind the scenes</h4>

                    </div>

                    </li>

                    <li>

                    <img src="/assets/frontend/images/banner4.png" alt="">

                    <div class="caption resize">

                    	<h2>dolores et ea</h2>

                        <h4>behind the scenes</h4>

                    </div>

                    </li>

                <li>

                    <img src="/assets/frontend/images/banner1.png" alt="">

                    <div class="caption resize">

                    	<h2>invidunt ut</h2>

                        <h4>behind the scenes</h4>

                    </div>

                    </li>

                    <li>

                    <img src="/assets/frontend/images/banner2.png" alt="">

                    <div class="caption resize">

                    	<h2>Lorem ipsum dolor</h2>

                        <h4>behind the scenes</h4>

                    </div>

                    </li>

                    <li>

                    <img src="/assets/frontend/images/banner3.png" alt="">

                    <div class="caption resize">

                    	<h2>labore et</h2>

                        <h4>behind the scenes</h4>

                    </div>

                    </li>

                    <li>

                    <img src="/assets/frontend/images/banner4.png" alt="">

                    <div class="caption resize">

                    	<h2>Stet clita kasd</h2>

                        <h4>behind the scenes</h4>

                    </div>

                    </li>

                <li>

                    <img src="/assets/frontend/images/banner1.png" alt="">

                    <div class="caption resize">

                    	<h2>accusam et justo</h2>

                        <h4>behind the scenes</h4>

                    </div>

                    </li>

                    <li>

                    <img src="/assets/frontend/images/banner2.png" alt="">

                    <div class="caption resize">

                    	<h2>Stet clita kasd</h2>

                        <h4>behind the scenes</h4>

                    </div>

                    </li>

                    <li>

                    <img src="/assets/frontend/images/banner3.png" alt="">

                    <div class="caption resize">

                    	<h2>magna aliquyam</h2>

                        <h4>behind the scenes</h4>

                    </div>

                    </li>

                    <li>

                    <img src="/assets/frontend/images/banner4.png" alt="">

                    <div class="caption resize">

                    	<h2>sed diam voluptua</h2>

                        <h4>behind the scenes</h4>

                    </div>

                    </li>

              </ul>

        </div>

        <div id="carousel" class="flexslider">

          <ul class="slides">

           		<li>

  	    	    <img src="/assets/frontend/images/banner-thumb.png" alt="">

                <div class="caption">

                	<a href="#">Diam voluptua</a>

                </div>

  	    		</li>

  	    		<li>

  	    	    <img src="/assets/frontend/images/banner-thumb2.png" alt="">

                <div class="caption">

                	<a href="#">Sed diam</a>

                </div>

  	    		</li>

  	    		<li>

  	    	    <img src="/assets/frontend/images/banner-thumb3.png" alt="">

                <div class="caption">

                	<a href="#">Sadipscing elitr</a>

                </div>

  	    		</li>

  	    		<li>

  	    	    <img src="/assets/frontend/images/banner-thumb4.png" alt="">

                <div class="caption">

                	<a href="#">Lorem ipsum</a>

                </div>

  	    		</li>

            	<li>

  	    	    <img src="/assets/frontend/images/banner-thumb.png" alt="">

                <div class="caption">

                	<a href="#">Dolor sit amet</a>

                </div>

  	    		</li>

  	    		<li>

  	    	    <img src="/assets/frontend/images/banner-thumb2.png" alt="">

                <div class="caption">

                	<a href="#">Takimata sanctus</a>

                </div>

  	    		</li>

  	    		<li>

  	    	    <img src="/assets/frontend/images/banner-thumb3.png" alt="">

                <div class="caption">

                	<a href="#">Accusam et</a>

                </div>

  	    		</li>

  	    		<li>

  	    	    <img src="/assets/frontend/images/banner-thumb4.png" alt="">

                <div class="caption">

                	<a href="#">Diam voluptua</a>

                </div>

  	    		</li>

            	<li>

  	    	    <img src="/assets/frontend/images/banner-thumb.png" alt="">

                <div class="caption">

                	<a href="#">At vero eoset</a>

                </div>

  	    		</li>

  	    		<li>

  	    	    <img src="/assets/frontend/images/banner-thumb2.png" alt="">

                <div class="caption">

                	<a href="#">Takimata sanctus</a>

                </div>

  	    		</li>

  	    		<li>

  	    	    <img src="/assets/frontend/images/banner-thumb3.png" alt="">

                <div class="caption">

                	<a href="#">Lorem ipsum</a>

                </div>

  	    		</li>

  	    		<li>

  	    	    <img src="/assets/frontend/images/banner-thumb4.png" alt="">

                <div class="caption">

                	<a href="#">Ipsum dolor</a>

                </div>

  	    		</li>

          </ul>

        </div>

        </div>

    </section>

    <!--BANNER END-->

    <!--FEATURED VIDEOS SECTION START-->

    <section class="container">

    	<div class="video-detail">

        	
        		<iframe width="560" height="315" src="https://www.youtube.com/embed/{{$video_id}}?vq=hd720" frameborder="0" allowfullscreen></iframe>
       

        </div>

    	<div class="row">

        	<div class="span8">

            	<header class="header-style">

                    <h2 class="h-style">Video Detial</h2>

                    <a href="#"><i class="fa fa-comment-o"></i>33 Comments</a>

                    <a href="#"><i class="fa fa-clock-o"></i>Sep 16, 2013</a>

                </header>

                <!--BLOG POST START-->

                <article class="blog-post">

                	<div class="widget-bg">

                        <figure>

                            <div class="text">

                                <h2>Will IronMan-3 proved to be a block buster sequel?</h2>

                                <p>Dolor donec sagittis sapien. Ante aptent feugiat adipisicing. Duis interdum olor donec sagittis sapien. Ante aptent feugiat adipisicing Duis interdum olor donec sagittis sapien. Ante aptent feugiat adipisicing. Duis interdum olor donec sagittis sapien. Ante aptent feugiat adipisicing.Dolor donec sagittis sapien. Ante aptent feugiat adipisicing. Duis interdum olor donec sagittis sapien. Ante aptent feugiat adipisicing Duis interdum olor donec sagittis sapien. Ante aptent feugiat adipisicing. Duis interdum olor donec sagittis sapien. Ante aptent feugiat adipisicing. Duis interdum...</p>

                                <p>Dolor donec sagittis sapien. Ante aptent feugiat adipisicing. Duis interdum olor donec sagittis sapien. Ante aptent feugiat adipisicing Duis interdum olor donec sagittis sapien. Ante aptent feugiat adipisicing. Duis interdum olor donec sagittis sapien. Ante aptent feugiat adipisicing. Duis interdum</p>

                            </div>

                        </figure>

                    </div>

                </article>

                <!--BLOG POST END-->

                <article class="small-thumbs">

                    <header class="header-style">

                        <h2 class="h-style">you may also like</h2>

                    </header>

                    <div class="widget-bg">

                        <ul class="mycarousel jcarousel-skin-tango videos">

                            <!--LIST ITEMS START-->
                            @foreach($relate_videos as $video)
                            <?php 
                            	$title= $video->snippet->title;
                            	$thumb = $video->snippet->thumbnails->high->url;

                             ?>
                            <li>

                            <figure>

                                <div class="thumb" style="float:none;">

                                    <a href="/v={{$video->id->videoId}}">
                                        <img src="{{$thumb}}" alt="">

                                        <div class="play">

                                            <img src="/assets/frontend/images/play2.png" alt="">

                                        </div>

                                    </a>

                                </div>
                                
                                <figcaption>

                                    <p>{{strlen($title)<20?$title:substr($title,0,18). '...'}}</p>

                                    <p class="color">27 may 2013</p>

                                </figcaption>

                            </figure>

                            </li>

                            @endforeach
                        </ul>

                    </div>

                </article>

                <!--COMMENTS SECTION START-->

                <article>

                	<div id="fb-root"></div>
                    <script>(function(d, s, id) {
                      var js, fjs = d.getElementsByTagName(s)[0];
                      if (d.getElementById(id)) return;
                      js = d.createElement(s); js.id = id;
                      js.src = "//connect.facebook.net/us_US/sdk.js#xfbml=1&version=v2.5&appId=1477153512585236";
                      fjs.parentNode.insertBefore(js, fjs);
                    }(document, 'script', 'facebook-jssdk'));</script>
                   <div data-width="100%" class="fb-comments" data-href="http://videoplatform.dev/v={{$video->id->videoId}}" data-numposts="5"></div>
                </article>

                <!--COMMENTS SECTION END-->

                <article>

                	<div class="widget-bg">

                        <div class="form">

                            <div class="heading">

                                <h3>Leave us a reply</h3>

                            </div>

                           <ul class="row-fluid">
                            
                            	<li class="span4"><input name="" type="text" class="input-block-level" placeholder="Name" ></li>
                                
                                <li class="span4"><input name="" type="text" class="input-block-level" placeholder="E-mail" ></li>
                                
                                <li class="span4"><input name="" type="text" class="input-block-level" placeholder="Website" ></li>
                            	
                            </ul>
                            
                            <textarea name="" cols="" rows="" placeholder="Comments"></textarea>

                            <button class="form-btn hover-style">Submit</button>

                        </div>

                    </div>

                </article>

                <!--PAGINATION EBD-->

            </div>

            <!--SIDEBAR START-->

            <aside class="span4">

            	@include('frontend::templates.aside')

            </aside>

            <!--SIDEBAR END-->

        </div>

    </section>

    <!--FEATURED VIDEOS SECTION END-->

    <!--TWEET SECTION START-->

    <section class="container tweets resize">

    	<i class="fa fa-twitter"></i>

        <h4>chirp chirp</h4>

        <p>Are you a morning person or is the night time the right time? Interesting perspectives on the forum - <a href="#" class="tweet-link">http://t.co/tdEHlbZf</a> <span class="tweet-date">Nov 04, 2013</span></p>

    </section>   
@stop