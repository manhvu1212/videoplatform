@extends('layouts.frontend.master')
@section('content')
    <div class="content-wap">
        <div class="con-page-sub">
            <div class="container">
                <div class="row sqs-row">
                    <div class="col sqs-col-9 span-9">
                        <div class="column">
                            <a href="<?php echo DOMAIN?>">Home</a> <?php if($data['alias']=='investor-education') {?> &gt; <a href="/page-news-and-updates">Resources</a> <?php } ?> &gt;  <b><?php echo $data['title']?></b>
                        </div>
                        <div class="row sqs-row">
                            <div class="col sqs-col-12 span-12">
                                <div class="cont-ri-sub-page">
                                    <div class="img-page-se">
                                        <?php $img=json_decode($data['image']);?>
                                        <?php if(isset($img->url) && $img->url!='') {?>
                                        <img style="width: 100%" src="<?php echo DOMAIN_IMG.$img->url ?>" />
                                        <?php } ?>
                                    </div>
                                    <div class="pa-sub">
                                        <h2><?php echo $data['title']?></h2>
                                        <div style="margin-bottom: 10px">
                                            <?php echo $data['summary']?>
                                        </div>
                                    </div>
                                    <?php echo $data['content']?>
                                </div>
                            </div>
                        </div>
                    </div>
                    @include('layouts.frontend.right-sidebar')
                </div>
            </div>
        </div>
    </div>
@stop
@section('script')
@stop