@extends('layouts.frontend.master')
@section('style')
    <link rel="stylesheet" type="text/css" href="/fontend/css/home.css" />
@stop
@section('content')
<div class="content-wap">
    <div class="con-page-sub">
        <div class="container">
            <div class="row sqs-row">
                <iframe sandbox="allow-same-origin allow-scripts allow-forms allow-top-navigation allow-popups" id="signingIframe" src="<?php echo $response->url?>"></iframe>
            </div>
        </div>
    </div>
</div>
@stop
@section('script')
    <script src="/fontend/js/home.js" ></script>
@stop