@extends('layouts.frontend.master1')
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
                        <a href="#">Open New Account</a> > <a href="<?php echo url("/Log-in-Sign-Up") ?>/<?php echo str_replace(' ','-',Session::get('type'));?>">Log in & Sign Up</a> > <b> Online <?php echo Session::get('type');?> Enrollment Form</b>
                    </div>
                    <div class="row sqs-row">
                        <div class="col sqs-col-12 span-12">
                            <div class="cont-ri-sub-page">
                                <div class="pa-sub">
                                    <h2><?php echo $page['title']?></h2>
                                </div>
                                <div class="pa-sub">
                                    <?php echo $page['summary']?>
                                </div>
                                <div class="pa-sub">
                                    <div class="pa-sc-pri-us">
                                        <?php echo $page['content']?>
                                    </div>
                                    <?php $img = json_decode($page['image'])?>
                                    <div class="io-pab-us">
                                        <h4>Download a copy of this agreement in .PDF format by clicking <a href="<?php echo DOMAIN_IMG.$img->url?>">here</a>.</h4>
                                    </div>

                                    <div class="on-check-ful">
                                        <div class="i-tem-check">
                                            <label>
                                                <input type="checkbox" id="check-id-1" value="1">
                                                <label for="check-id-1" class="option">
                                                    <div class="chec-poa-eb">I have read the Mainstar Policy and Terms of Use. <a href="#">More Information</a>
                                                    </div>
                                                </label>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="pa-sub">
                                    <div class="but-a-open">
                                        <a class="register-step1">Continue</a>
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