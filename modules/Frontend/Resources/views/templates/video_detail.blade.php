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
    	<div class="video-detail" id="div_iframe" data-videoid="{{$video_id}}" <?php if($pr) echo('style="width:75%;"');  ?>>        	
        </div>
        @if($pr)
        <div class="image-video" style="width:24%;height:498px;border:1px solid #ddd;float:right;overflow:auto;">
            @if(!empty($images))
            <ul>            
                @foreach($images as $img)
                <li>
                    <div class="person-image" data-current="{{$img['current']}}">
                        <img src="/upload/{{$img['url']}}">
                        <a href="{{isset($img['extern_url'])?$img['extern_url']:'#'}}">Route</a>
                    </div>
                </li>      
                @endforeach              
            </ul>
            @else
            <h3 style="text-align:center;">No images</h3>
            @endif
        </div>
        <style type="text/css">
                .image-video li{margin-top: 10px;}
                .person-image{cursor: pointer;position: relative;}
                .person-image a{position: absolute;top: 0;left: 0;}
        </style>
        @endif
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

                                    <a href="/v={{$video->id->videoId}}&pr=0">
                                        <img src="{{$thumb}}" alt="">

                                        <div class="play">

                                             <span class="quick-view" data-toggle="modal" data-target="#video-modal" data-videoid="{{$video->id->videoId}}"><img src="/assets/frontend/images/play.png" alt=""></span>

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
@section('script')
<script src="https://www.youtube.com/iframe_api"></script>
<script type="text/javascript" src="/fontend/js/videoplatform.js" ></script>
@stop