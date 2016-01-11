@extends('layouts.frontend.master')
@section('style')
    <link rel="stylesheet" type="text/css" href="/fontend/css/home.css" />
@stop
@section('content')
<div class="content-wap">
    <div class="con-page-sub contact-for">
        <div class="container">
            <div class="row sqs-row">
                <div class="col sqs-col-9 span-9">
                    <div class="column">
                        <a href="#">Home</a> > <b>Contact</b>
                    </div>
                    <div class="row sqs-row">
                        <div class="col sqs-col-5 span-5">
                            <div class="img-page-sub">
                                <div class="img-page-se">
                                    <div class="contact-us">
                                        <h4>Mainstar Trust</h4>
                                        <div class="i-con-l">
                                            <?php echo $setting->address_contact?>
                                        </div>
                                        <div class="i-con-l">
                                            Main Phone<br/>
                                            <?php echo $setting->phone_contact?>
                                        </div>
                                        <div class="i-con-l">
                                            Fax<br/>
                                            <?php echo $setting->fax?>
                                        </div>
                                        <div class="i-con-l">
                                            Customer Service:<br/>
                                            <?php echo $setting->phone_contact1?><br/>
                                            <a href="mailto::<?php echo $setting->email_contact?>"> <?php echo $setting->email_contact?></a>
                                        </div>
                                    </div>
                                    <div class="star-con">
                                        <img src="assets/frontend/images/star.png">
                                    </div>
                                </div>
                            </div>
                            <div class="sub-con-page">
                                <h4>Live chat with us</h4>
                                <div class="live-co"><a href="#"><span class="online"></span> We are online</a></div>
                                <div class="ico-pae"></div>
                            </div>
                        </div>
                        <div class="col sqs-col-7 span-7">
                            <div class="cont-ri-sub-page">
                                <div class="pa-sub">
                                    <h2>Contact Us</h2>
                                    <div style="margin-bottom: 10px">
                                        Contact Mainstar Trust to learn more about our services.</br>
                                        Visit our Frequently Asked Questions sections for answers to common questions on investments, getting started with Mainstar, and retirement account options.
                                    </div>
                                </div>
                                <div class="pa-sub">
                                    @if (Session::has('message'))
                                        <div class="alert alert-success fade in">
                                            <button data-dismiss="alert" class="close close-sm" type="button">
                                                <i class="fa fa-times"></i>
                                            </button>
                                            {{ Session::get('message') }}
                                        </div>
                                    @endif
                                </div>
                                <div class="pa-sub-wcon">
                                    <h4>What can we help you with today?</h4>
                                </div>
                                <form action="/Contact" id="form-contact" method="post">
                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                    <div class="form-contact">
                                        <div class="inp-fo-con">
                                            <select id="contact-fo" class="contact-fo" name="helps">
                                                <option value="My Account"  selected="selected">My Account</option>
                                                <option value="In Progress">In Progress</option>
                                                <option value="Resolved">Resolved</option>
                                                <option value="Feedback">Feedback</option>
                                                <option value="Closed">Closed</option>
                                            </select>
                                        </div>
                                        <div class="inp-fo-con">
                                            <input name="name" id="name" type="text" placeholder="Name">
                                        </div>
                                        <div class="inp-fo-con">
                                            <input name="email" id="email" type="text" placeholder="Email Address">
                                        </div>
                                        <div class="inp-fo-con">
                                            <textarea cols="6" rows="4" id="message" name="message" class="Message" placeholder="Message"></textarea>
                                        </div>
                                        <div class="inp-fo-con">
                                            <button class="send-con">Send</button>
                                            <a href="javascript:void(0)" class="cancel-c">Cancel</a>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="ask-con">
                        <h4>Ask a department</h4>
                        <div class="row sqs-row">
                            <div class="col sqs-col-4 span-4">
                                <div class="ask-wap">
                                    Account Closings <br/>
                                    <a href="#">MainstarClosings@mainstartrust.com</a>
                                </div>
                                <div class="ask-wap">
                                    New Assets <br/>
                                    <a href="#">Assets@mainstartrust.com</a>
                                </div>
                                <div class="ask-wap">
                                    Asset Income <br/>
                                    <a href="#">MainstarIncome@mainstartrust.com</a>
                                </div>
                            </div>
                            <div class="col sqs-col-4 span-4">
                                <div class="ask-wap">
                                    Asset Valuation <br/>
                                    <a href="#">Valuations@mainstartrust.com</a>
                                </div>
                                <div class="ask-wap">
                                    Distributions <br/>
                                    <a href="#">MainstarDistributions@mainstartrust.com</a>
                                </div>
                                <div class="ask-wap">
                                    Purchases <br/>
                                    <a href="#">FTCOPurchases@mainstartrust.com</a>
                                </div>
                            </div>
                            <div class="col sqs-col-4 span-4">
                                <div class="ask-wap">
                                    Sales <br/>
                                    <a href="#">FTCOSales@mainstartrust.com</a>
                                </div>
                                <div class="ask-wap">
                                    Trust Reporter <br/>
                                    <a href="#">TrustReporter@mainstartrust.com</a>
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
    <script type="text/javascript" src="/assets/global/plugins/jquery-validation/js/jquery.validate.min.js"></script>
    <script type="text/javascript" src="/fontend/js/home.js"></script>
@stop