@extends('layouts.frontend.master')
@section('style')
    <link rel="stylesheet" type="text/css" href="/fontend/css/home.css" />
@stop
@section('script')
    <script type="text/javascript" src="/assets/global/plugins/jquery-validation/js/jquery.validate.min.js"></script>
    <script src="/fontend/js/home.js" ></script>
@stop
@section('content')
<div class="content-wap">
    <div class="con-page-sub">
        <div class="container">
            <div class="row sqs-row">
                <div class="col sqs-col-9 span-9">
                    <div class="column">
                        <a href="/">Home</a> > <b> Forms</b>
                    </div>
                    <div class="row sqs-row">
                        <div class="col sqs-col-11 span-11">
                            <div class="cont-ri-sub-page">

                                <?php
                                foreach($mang as $row) {?>
                                    <div class="pa-sub">
                                        <h4 class="h4_title"><?php echo $row['name']?></h4>
                                        <div class="item-faq" style="display: none">
                                            <ul>
                                                <?php foreach($row['sub'] as $row1) {?>
                                                    <li>
                                                        <a href="/form/<?php echo $row1['alias']?>" class="a_faq"><?php echo $row1['title']?></a>
                                                    </li>
                                                <?php }?>
                                            </ul>
                                        </div>
                                    </div>
                                <?php }?>

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
    <script src="/fontend/js/home.js" ></script>
@stop