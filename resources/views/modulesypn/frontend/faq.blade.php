@extends('layouts.frontend.master')
@section('style')
    <link rel="stylesheet" type="text/css" href="/fontend/css/home.css" />
@stop
@section('content')
<div class="content-wap">
    <div class="con-page-sub">
        <div class="container">
            <div class="row sqs-row">
                <div class="col sqs-col-9 span-9">
                    <div class="column">
                        <a href="/">Home</a> > <a href="#"> Working With Us</a> > <b> FAQ</b>
                    </div>
                    <div class="row sqs-row">
                        <div class="col sqs-col-11 span-11">
                            <div class="cont-ri-sub-page">
                                <div class="pa-sub pa-sub-poa">
                                    <h2>Frequently Asked Questions</h2>
                                </div>
                                <div class="pa-sub">
                                    <div class="sear-faq">
                                        <div class="in-se-but">
                                            <form method="get" action="/search-faq" onsubmit="return check_faq_search()">
                                                <input type="text" value="<?php echo $search?>" class="search-faq" id="title" name="title" placeholder="Search Questions" />
                                                <button class="but-sea-faq">
                                                    Search
                                                </button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <?php
                                if($search=='') {
                                foreach($mang as $row) {?>
                                    <div class="pa-sub">
                                        <h4><?php echo $row['name']?></h4>
                                        <div class="item-faq">
                                            <ul>
                                                <?php foreach($row['sub'] as $row1) {?>
                                                    <li>
                                                        <a class="a_faq"><?php echo $row1['title']?></a>
                                                        <div class="show-faq">
                                                            <?php echo $row1['content']?>
                                                        </div>
                                                    </li>
                                                <?php }?>
                                            </ul>
                                        </div>
                                    </div>
                                <?php }} else {?>
                                <div class="pa-sub">
                                    <h4>Results</h4>
                                    <div class="item-faq">
                                        <ul>
                                            <?php foreach($mang as $row1) {?>
                                            <li>
                                                <a class="a_faq"><?php echo $row1['title']?></a>
                                                <div class="show-faq">
                                                    <?php echo $row1['content']?>
                                                </div>
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
    <script type="text/javascript" src="/assets/global/plugins/jquery-validation/js/jquery.validate.min.js"></script>
    <script src="/fontend/js/home.js" ></script>
@stop