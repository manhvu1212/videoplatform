@extends('layouts.frontend.master')
@section('content')
    <div class="content-wap">
        <div class="con-page-sub">
            <div class="container">
                <div class="row sqs-row">
                    <div class="col sqs-col-9 span-9">
                        <div class="column">
                            <a href="#">Home</a> > <b><?php echo $data['title']?></b>
                        </div>
                        <div class="row sqs-row">
                            <div class="col sqs-col-5 span-5">
                                <div class="img-page-sub">
                                    <?php $img=json_decode($data['image']);?>
                                    <?php if(isset($img->url) && $img->url!='') {?>
                                    <img style="width: 100%" src="<?php echo DOMAIN_IMG.$img->url ?>" />
                                    <?php } ?>
                                </div>
                                <div class="sub-tile-page">
                                    <?php echo $data['summary']?>
                                </div>
                            </div>
                            <div class="col sqs-col-7 span-7">

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