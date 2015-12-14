<?php 
	$prev = (isset($_GET['page'])&&$_GET['page']>0)?$_GET['page']-1:0;
	$next = isset($_GET['page'])?$_GET['page']+1:1;
 ?>
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

    	<div class="row">

        	<div class="span8">

            	<header class="header-style">

                    <h2 class="h-style">Search Result for: <span>Animation</span></h2>

                </header>

                <div class="widget-bg">

                    <article>

                    <ul class="videos">

                	<!--LIST ITEMS START-->
	                	@foreach($videos as $video)
	                	 <?php                      
	                            $title = $video->snippet->title;
	                            $thumb = $video->snippet->thumbnails->medium->url;                           
	                     ?>
	                    <li>

	                    	<figure>

	                        	<div class="thumb">

	                        		<a href="/v={{$video->id->videoId}}"><img src="{{$thumb}}" alt=""></a>

	                                <div class="play">

	                                    <a rel="prettyPhoto" href="http://vimeo.com/7874398&width=700"><img src="/assets/frontend/images/play.png" alt=""></a>

	                                </div>

	                            </div>

	                            <figcaption>

	                            	<h5>{{strlen($title)<30?$title:substr($title, 0,28). ' ...'}}</h5>

	                                <ul class="views">

	                                	<li>27 Sep, 2013</li>

	                                    <li><i class="fa fa-comments"></i>23</li>

	                                    <li><i class="fa fa-eye"></i>875</li>

	                                </ul>

	                            </figcaption>

	                        </figure>

	                    </li> 
	                   @endforeach
                	</ul>

                    </article>

                </div>

            </div>

            <!--SIDEBAR START-->

            <aside class="span4">

            	@include('frontend::templates.aside')

            </aside>

            <!--SIDEBAR END-->

        </div>

        <div> 
        	<a href="/search?s_keyword={{$_GET['s_keyword']}}&prev=1"><i class="fa fa-backward"></i></a>           
    		<a href="/search?s_keyword={{$_GET['s_keyword']}}&next=1"><i class="fa fa-forward"></i></a>
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