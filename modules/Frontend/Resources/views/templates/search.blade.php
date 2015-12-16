<?php 
	$prev = (isset($_GET['page'])&&$_GET['page']>0)?$_GET['page']-1:0;
	$next = isset($_GET['page'])?$_GET['page']+1:1;
 ?>
@extends('layouts.frontend.master')
@section('content')
 <section class="banner img-less">

    	<div class="container">

        @include('frontend::templates.top_slide')

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

	                        		<a href="/v={{$video->id->videoId}}&pr=0"><img src="{{$thumb}}" alt=""></a>

	                                <div class="play">

	                                   <span class="quick-view" data-toggle="modal" data-target="#video-modal" data-videoid="{{$video->id->videoId}}"><img src="/assets/frontend/images/play.png" alt=""></span>

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