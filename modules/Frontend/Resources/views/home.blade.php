@extends('layouts.frontend.master')
@section('content')

    @if(sizeof($slides) > 0)
        <section class="banner">
            <div class="container">
                <div class="banner-inner">
                    <ul id="imageGallery">
                        @foreach($slides as $slide)
                            <li data-thumb="{{$slide->thumb}}">
                                @if($slide->type == "image")
                                    <img src="{{$slide->url}}" alt="">
                                @else
                                    <iframe src="{{$slide->url}}" height="281"
                                            frameborder="0"
                                            webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>
                                @endif
                                <div class="caption">
                                    <h2>{{$slide->title}}</h2>
                                    <h4>{{$slide->description}}</h4>
                                </div>
                            </li>
                        @endforeach
                    </ul>
                </div>

            </div>

        </section>
        @endif

                <!--TWEET SECTION START-->

        <section class="container">

            <div class="tweets resize">

                <i class="fa fa-twitter"></i>

                <h4>chirp chirp</h4>

                <p>Are you a morning person or is the night time the right time? Interesting perspectives on the forum -
                    <a
                            href="#" class="tweet-link">http://t.co/tdEHlbZf</a> <span
                            class="tweet-date">Nov 04, 2013</span></p>

            </div>

        </section>

        <!--TWEET SECTION END-->

        <!--LATEST VIDEOS SECTION START-->

        <section class="video-section container">

            <header>

                <div class="video-heading">

                    <h2>Latest Video</h2>

                </div>

            </header>

            <div class="latest-vidios">

                <!--VIDEO FIGURE START-->
                @foreach($populars as $k=>$video)
                    @if($k<3)
                        <figure class="video-container">

                            <a href="/v={{$video->id}}&pr=0"><img src="{{$video->snippet->thumbnails->high->url}}"
                                                                  alt=""></a>
                            <figcaption>

                                <h2>PRO AWARDS</h2>

                                <h3>Steve &amp; Alana for X-Men</h3>

                            </figcaption>
                        </figure>
                        @else <?php break; ?>
                        @endif
                        @endforeach
                                <!--VIDEO FIGURE END-->

            </div>

        </section>

        <!--LATEST VIDEOS SECTION START-->

        <!--FEATURED VIDEOS SECTION START-->

        <section class="container">

            <div class="row">

                <div class="span8">

                    <article>

                        <header class="header-style">

                            <h2 class="h-style">Featured Videos</h2>

                        </header>

                        <div class="widget-bg">

                            <ul class="mycarousel jcarousel-skin-tango videos">

                                <!--LIST ITEMS START-->
                                @foreach($ft_videos as $video)
                                    <?php $title = $video->snippet->title;  ?>
                                    <li>

                                        <figure>

                                            <div class="thumb">

                                                <a href="/v={{$video->id}}&pr=1"><img
                                                            src="{{$video->snippet->thumbnails->high->url}}" alt=""></a>

                                                <div class="play">

                                                <span class="quick-view" data-toggle="modal" data-target="#video-modal"
                                                      data-videoid="{{$video->id}}"><img
                                                            src="/assets/frontend/images/play.png" alt=""></span>

                                                </div>

                                            </div>

                                            <figcaption>

                                                <h5>{{strlen($title)<30?$title:substr($title,0,29).' ...'}}</h5>

                                                <ul class="views">

                                                    <li>
                                                        <i class="fa fa-comments"></i>{{$video->statistics->commentCount}}
                                                    </li>

                                                    <li><i class="fa fa-eye"></i>{{$video->statistics->viewCount}}</li>

                                                </ul>

                                            </figcaption>

                                        </figure>

                                    </li>
                                @endforeach

                            </ul>

                        </div>

                    </article>
                    @foreach($youtube_cate as $cate_videos)
                        <article>

                            <header class="header-style">

                                <h2 class="h-style">{{$cate_videos['name']}}</h2>

                            </header>


                            <div class="widget-bg">

                                <div class="small-thumbs">

                                    <ul>

                                        <!--LIST ITEMS START-->
                                        @foreach($cate_videos['list_videos'] as $video)
                                            <?php
                                            $title = $video->snippet->title;
                                            $thumb = $video->snippet->thumbnails->default->url;
                                            ?>
                                            <li>

                                                <figure>

                                                    <div class="thumb">

                                                        <a href="/v={{$video->id->videoId}}&pr=0"><img src="{{$thumb}}"></a>

                                                        <div class="play">

                                                        <span class="quick-view" data-toggle="modal"
                                                              data-target="#video-modal"
                                                              data-videoid="{{$video->id->videoId}}"><img
                                                                    src="/assets/frontend/images/play.png"
                                                                    alt=""></span>


                                                        </div>

                                                    </div>

                                                    <figcaption>

                                                        <p>{{strlen($title)<30?$title:substr($title,0,30).' ...'}}</p>

                                                    </figcaption>

                                                </figure>

                                            </li>
                                        @endforeach

                                    </ul>

                                </div>

                            </div>

                        </article>
                    @endforeach


                </div>

                <!--SIDEBAR START-->

                <aside class="span4">

                    @include('frontend::templates.aside')

                </aside>

                <!--SIDEBAR END-->

            </div>

        </section>

@stop
@section('script')
@stop