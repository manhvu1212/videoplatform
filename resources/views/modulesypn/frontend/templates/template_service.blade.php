@extends('layouts.frontend.master')
@section('content')
    <div class="content-wap">
        <div class="con-page-sub">
            <div class="container">
                <div class="row sqs-row">
                    <div class="col sqs-col-9 span-9">
                        <div class="column">
                            <a href="<?php echo DOMAIN?>">Home</a> > <b><?php echo $data['title']?></b>
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
                                    <div class="ip-server-pad">
                                        <div class="row sqs-row">
                                            <div class="col sqs-col-6 span-6">
                                                <div class="bot-apk">
                                                    <a href="/page-account-options">
                                                        <i class="icon-hg"></i>Account Options
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="col sqs-col-6 span-6">
                                                <div class="bot-apk">
                                                    <a href="/page-asset-types">
                                                        <i class="icon-hg"></i>Asset Types
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
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