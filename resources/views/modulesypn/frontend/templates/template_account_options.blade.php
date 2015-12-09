@extends('layouts.frontend.master')
@section('content')
<div class="content-wap">
    <div class="con-page-sub">
        <div class="container">
            <div class="row sqs-row">
                <div class="col sqs-col-9 span-9">
                    <div class="column">
                        <a href="#">Home</a> > <a href="/page-services">Services</a> > <b> <?php echo $data['title']?></b>
                    </div>
                    <div class="row sqs-row">
                        <div class="col sqs-col-12 span-12">
                            <div class="cont-ri-sub-page">
                                <div class="pa-sub">
                                    <h2><?php echo $data['title']?></h2>
                                    <div style="margin-bottom: 10px">
                                        <?php echo $data['summary']?>
                                    </div>
                                </div>
                                <div class="item-pag-gb">
                                   <?php echo $data['content']?>
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