@extends('layouts.frontend.master')
@section('content')
    <style>
        .bor{display:none !important;}
    </style>
<div class="content-wap">
    <div id="banner-area">
        <div class="bg-im-ah" style="background: url(<?php echo Config::get('app.domain'); ?>upload/<?php echo $setting->banner?>) no-repeat center center">
            <div class="plan-your">
                <div class="container">
                    <div class="pla-content">
                        <h2>Plan your retirement journey</h2>
                        <div class="plan-a">
                            <a class="bg-w" href="/page-services">What are my options?</a>
                            <a class="bg-i" href="#">I’m Ready</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="item-sub-wa">
        <div class="container">
            <div class="row sqs-row">
                <div class="col sqs-col-4 span-4">
                    <img src="<?php echo Config::get('app.domain'); ?>assets/frontend/images/get01.png" />
                    <div class="c-ge-sub">
                        <a class="a_home" href="/page-services">
                         <h4>Getting Started</h4>
                        </a>
                        <div class="ti-ge-me">
                            Getting started is easy. Learn more about the account options and asset types available through Mainstar Trust.
                        </div>
                    </div>
                </div>
                <div class="col sqs-col-4 span-4">
                    <img src="<?php echo Config::get('app.domain'); ?>assets/frontend/images/get02.png" />
                    <div class="c-ge-sub">
                        <a class="a_home" href="/page-self-directed-ira">
                            <h4>Self-Directed IRA</h4>
                        </a>
                        <div class="ti-ge-me">
                            For individuals looking for help navigating through investment waters, Mainstar is the trusted guide for alternative, cost-effective retirement solutions.
                        </div>
                    </div>
                </div>
                <div class="col sqs-col-4 span-4">
                    <img src="<?php echo Config::get('app.domain'); ?>assets/frontend/images/get03.png" />
                    <div class="c-ge-sub">
                            <h4>Trust Reporter Online Setup</h4>
                        <div class="ti-ge-me">
                            Complete our Online Setup for details on your account transactions and holdings.
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
@stop
@section('script')
@stop