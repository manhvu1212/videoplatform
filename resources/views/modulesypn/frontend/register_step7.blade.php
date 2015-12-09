@extends('layouts.frontend.master1')
@section('style')
    <link rel="stylesheet" type="text/css" href="/fontend/css/home.css" />
@stop
@section('script')
    <script type="text/javascript" src="/assets/global/plugins/jquery-validation/js/jquery.validate.min.js"></script>
    <script src="/fontend/js/register.js" ></script>
@stop
@section('content')
<div class="content-wap">
    <div class="con-page-sub">
        <div class="container">
            <div class="row sqs-row">
                <form action="/register-step8" method="post" id="register_step3">
                    <input id="_token" type="hidden" name="_token"  value="{{ csrf_token() }}"  >
                    <div class="col sqs-col-9 span-9">
                        <div class="column">
                            <a href="#">Open New Account</a> > <b> Process</b>
                        </div>
                        <div class="row sqs-row">
                            <div class="col sqs-col-12 span-12">
                                <div class="cont-ri-sub-page">
                                    <div class="pa-sub">
                                        <h2>Step 7 of 7 : Complete</h2>
                                    </div>
                                    <div class="page-st-mg">
                                        <div class="row sqs-row">
                                            <div class="col sqs-col-20 span-20">
                                                <div class="img-exm firstmm step-tab-1">
                                                    <div class="img-exm-eg">
                                                        <a href="javascript:void(0)">IRA Owner <br/> Information</a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col sqs-col-20 span-20">
                                                <div class="img-exm bg-bo-sm step-tab-cur">
                                                    <div class="img-exm-eg">
                                                        <a href="javascript:void(0)"><?php $type= Session::get('type'); if($type=='Traditional IRA') echo 'Funding'; else echo 'Contribution'?><br/>
                                                            Information</a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col sqs-col-20 span-20">
                                                <div class="img-exm bg-bo-sm step-tab-cur">
                                                    <div class="img-exm-eg">
                                                    <a href="javascript:void(0)">Designation Of<br/>
                                                        Beneficiary</a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col sqs-col-20 span-20">
                                                <div class="img-exm bg-bo-sm step-tab-cur">
                                                    <div class="img-exm-eg">
                                                        <a href="javascript:void(0)">Designation Of<br/>
                                                            Representative</a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col sqs-col-20 span-20">
                                                <div class="img-exm bg-bo-sm step-tab-cur">
                                                    <div class="img-exm-eg">
                                                        <a href="javascript:void(0)">Account<br/>
                                                            Options</a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col sqs-col-20 span-20">
                                                <div class="img-exm bg-bo-sm step-tab-cur">
                                                    <div class="img-exm-eg">
                                                        <a href="javascript:void(0)">Review &<br/>
                                                            Confirm</a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col sqs-col-20 span-20">
                                                <div class="img-exm bg-bo-sm lastsmm step-tab-cur">
                                                    <div class="img-exm-eg">
                                                        <a href="javascript:void(0)">Complete<br/>
                                                            Application</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <hr style="border-bottom: 1px solid #e1e1e1;margin-bottom: 30px;"/>
                                    <div class="form-process">
                                        <div class="form-process-2">
                                            <div class="pa-sub">
                                                Thank you for choosing Mainstar Trust as custodian for your self-directed IRA. Your new account number is <?php echo $objRegister['account_id']?>. Please
                                                use this number on any correspondence with us. We ask that you print and sign the documents shown below and mail them as
                                                soon as possible to the following address:
                                            </div>
                                            <div class="pa-sub">
                                                Mainstar Trust <br/>
                                                Attn: New Accounts<br/>
                                                <?php echo $setting->address_contact?>
                                            </div>
                                            <div class="pa-sub">
                                                We need the signed forms in order to take further instructions from you or your authorized representative on this account.
                                            </div>
                                            <div class="pa-sub">
                                                <a href="/create-pdf/<?php echo $objRegister['account_id']?>">View Completed Application</a>
                                            </div>
                                            <div class="pa-sub" style="font-family: MuseoSans-500;">
                                                NOTE: This link will build a large file containing several documents that may take up to a minute to display.
                                            </div>
                                            <div class="pa-sub">
                                                <a href="/docusign/<?php echo $objRegister['account_id']?>">Sign Document Electronically</a>
                                            </div>
                                            <hr style="border-bottom: 1px solid #e1e1e1;margin-bottom: 30px;"/>
                                        </div>
                                    </div>
                                 {{--   <div class="pa-sub">
                                        <div class="but-a-open bg-op3">
                                            <a href="">Back </a>
                                        </div>
                                        <div class="but-a-open">
                                            <a href="">Done</a>
                                        </div>
                                    </div>--}}
                                </div>
                            </div>
                        </div>
                    </div>


                </form>

             @include('layouts.frontend.right-sidebar')
            </div>
        </div>
    </div>
</div>
@stop
@section('script')
@stop