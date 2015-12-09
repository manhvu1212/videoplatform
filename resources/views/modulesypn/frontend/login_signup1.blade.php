@extends('layouts.frontend.master1')
@section('content')
<div class="content-wap">
    <div class="con-page-sub">
        <div class="container">
            <div class="row sqs-row">
                <div class="col sqs-col-9 span-9">
                    <div class="column">
                        <a href="#">Open New Account</a> > <a href="<?php echo url("/Log-in-Sign-Up") ?>">Log in & Sign Up</a> > <b>Online <?php echo Session::get('type');?> Enrollment Form</b>
                    </div>
                    <div class="row sqs-row">
                        <div class="col sqs-col-12 span-12">
                            <div class="cont-ri-sub-page">
                                <div class="pa-sub">
                                    <h2>What You Will Need</h2>
                                </div>
                                <div class="pa-sub ul-pa-eb">
                                    <ul>
                                        <li>
                                            <i class="icon-be"></i>About 5-10 minutes to complete the form
                                        </li>
                                        <li>
                                            <i class="icon-be"></i>Your Social Security Number or your Individual Tax Identification Number
                                        </li>
                                        <li>
                                            <i class="icon-be"></i>Beneficiary’s Social Security Number
                                        </li>
                                        <li>
                                            <i class="icon-be"></i>Beneficiary’s Date of Birth
                                        </li>
                                        <?php $type= Session::get('type');
                                        if($type=='Traditional IRA'){
                                        ?>
                                        <li>
                                            <i class="icon-be"></i>Ability to print
                                        </li>
                                        <?php }?>
                                    </ul>
                                </div>
                                <div class="pa-sub">
                                    <div class="but-a-open">
                                        <a href="<?php echo url("/register") ?>">Get Started</a>
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