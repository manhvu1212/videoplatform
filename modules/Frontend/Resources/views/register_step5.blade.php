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
                <form action="/register-step6" method="post" id="register_step5">
                    <input id="_token" type="hidden" name="_token"  value="{{ csrf_token() }}"  >
                    <?php if (Session::has('data')) {$data=Session::get('data');}
                    ?>
                    <div class="col sqs-col-9 span-9">
                        <div class="column">
                            <a href="#">Open New Account</a> > <b> Process</b>
                        </div>
                        <div class="row sqs-row">
                            <div class="col sqs-col-12 span-12">
                                <div class="cont-ri-sub-page">
                                    <div class="pa-sub">
                                        <h2>Step 5 of 7 : Account Options</h2>
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
                                                <div class="img-exm bg-bo-sm">
                                                    <div class="img-exm-eg">
                                                        <a href="javascript:void(0)">Review &<br/>
                                                            Confirm</a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col sqs-col-20 span-20">
                                                <div class="img-exm bg-bo-sm lastsmm">
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
                                            <div class="row">
                                                <div class="pa-12-no">
                                                    <div class="col sqs-col-12 span-12">
                                                        <div class="wap-im-proce spl-pa-forn">
                                                            <label style="font-size: 16px;margin-bottom: 10px;margin-top: 7px;">Invoice Options (<span class="nobold">Please select one</span>)</label>
                                                            <div class="row">
                                                                <div class="col sqs-col-12 span-12">
                                                                    <div class="on-check-ful" style="margin-bottom: 0;margin-top: 10px;">
                                                                        <div class="i-tem-check">
                                                                            <label>
                                                                                <input type="radio" id="check-id-2" class="Invoice_Options" value="Take money from my account" name="Invoice_Options" {{ (!isset($data['content5']['Invoice_Options']) || (isset($data['content5']['Invoice_Options']) && $data['content5']['Invoice_Options']=='Take money from my account'))?'checked':''}}>
                                                                                <label for="check-id-2" class="option">
                                                                                    <div class="chec-poa-eb title_bold">
                                                                                        Take money from my account
                                                                                    </div>
                                                                                </label>
                                                                            </label>
                                                                        </div>
                                                                        <div class="i-tem-check">
                                                                            <label>
                                                                                <input type="radio" id="check-id-3" class="Invoice_Options" name="Invoice_Options" value="Mail Invoice" {{ (isset($data['content5']['Invoice_Options']) && $data['content5']['Invoice_Options']=='Mail Invoice')?'checked':''}}>
                                                                                <label for="check-id-3" class="option">
                                                                                    <div class="chec-poa-eb title_bold">
                                                                                        Mail Invoice
                                                                                    </div>
                                                                                </label>
                                                                            </label>
                                                                        </div>
                                                                        <div class="i-tem-check">
                                                                            <label>
                                                                                <input type="radio" id="check-id-4" class="Invoice_Options" name="Invoice_Options" value="ACH" {{ (isset($data['content5']['Invoice_Options']) && $data['content5']['Invoice_Options']=='ACH')?'checked':''}}>
                                                                                <label for="check-id-4" class="option">
                                                                                    <div class="chec-poa-eb title_bold">
                                                                                        ACH - Debit Checking or Savings Account - $25.00 setup fee and $95 annual account fee to be included with Simplifier.
                                                                                    </div>
                                                                                </label>
                                                                            </label>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="w-se-nex-x5 div_ach" style="{{ (!isset($data['content5']['Invoice_Options']) ||(isset($data['content5']['Invoice_Options']) && $data['content5']['Invoice_Options']!='ACH'))?'display:none':''}}">
                                                                <div class="row">
                                                                    <div class="col sqs-col-12 span-12">
                                                                        <div class="o-amx-s5" style="color:#505050">
                                                                            For ACH - Debit Checking or Savings Account
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="col sqs-col-3 span-3">
                                                                        <div class="on-check-ful" style="margin-bottom: 0;margin-top: 10px;">
                                                                            <div class="i-tem-check">
                                                                                <label>
                                                                                    <input type="checkbox" id="check-id-14" name="Savings_Account" value="1" {{ (isset($data['content5']['Savings_Account']) && $data['content5']['Savings_Account']==1)?'checked':''}}>
                                                                                    <label for="check-id-14" class="option">
                                                                                        <div class="chec-poa-eb title_bold">
                                                                                            Savings Account
                                                                                        </div>
                                                                                    </label>
                                                                                </label>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col sqs-col-3 span-3">
                                                                        <div class="on-check-ful" style="margin-bottom: 0;margin-top: 10px;">
                                                                            <div class="i-tem-check">
                                                                                <label>
                                                                                    <input type="checkbox" id="check-id-15" name="Checking_Account" value="1" {{ (isset($data['content5']['Checking_Account']) && $data['content5']['Checking_Account']==1)?'checked':''}}>
                                                                                    <label for="check-id-15" class="option">
                                                                                        <div class="chec-poa-eb title_bold">
                                                                                            Checking Account
                                                                                        </div>
                                                                                    </label>
                                                                                </label>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="col sqs-col-7 span-7">
                                                                        <div class="in-st5-b">
                                                                            <label>Routing Number</label>
                                                                            <input type="text" name="Routing_Number" value="{{ isset($data['content5']['Routing_Number'])?$data['content5']['Routing_Number']:''}}" class="ip-po-ab" value="">
                                                                        </div>
                                                                        <div class="in-st5-b">
                                                                            <label>Account Number</label>
                                                                            <input type="text" name="Account_Number" value="{{ isset($data['content5']['Account_Number'])?$data['content5']['Account_Number']:''}}" class="ip-po-ab" value="">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="wap-im-proce spl-pa-forn">
                                                            <label style="font-size: 16px;margin-bottom: 10px;margin-top: 7px;">Statement Options</label>
                                                            <div class="row">
                                                                <div class="col sqs-col-12 span-12">
                                                                    <div class="on-check-ful" style="margin-bottom: 0;margin-top: 10px;">
                                                                        <div class="i-tem-check">
                                                                            <label>
                                                                                <input type="checkbox" id="check-id-5" value="Quarterly Electronic Statement" class="Quarterly_Electronic" name="Quarterly_Electronic" {{ (isset($data['content5']['Quarterly_Electronic']) && $data['content5']['Quarterly_Electronic']=='Quarterly Electronic Statement')?'checked':''}}>
                                                                                <label for="check-id-5" class="option">
                                                                                    <div class="chec-poa-eb ">
                                                                                        <span class="title_bold">Quarterly Electronic Statement? Select a paper statement (or none if you only want your statement sent electronically):</span>
                                                                                    </div>
                                                                                </label>
                                                                            </label>
                                                                        </div>
                                                                        <div class="i-tem-check">
                                                                            <label>
                                                                                <input type="radio" id="check-id-6" value="Annual Statement" name="Statement_Options" {{ (isset($data['content5']['Statement_Options']) && $data['content5']['Statement_Options']=='Annual Statement')?'checked':''}}>
                                                                                <label for="check-id-6" class="option">
                                                                                    <div class="chec-poa-eb">
                                                                                        <span class="title_bold">Annual Statement</span> ($5.00 Fee)
                                                                                    </div>
                                                                                </label>
                                                                            </label>
                                                                        </div>
                                                                        <div class="i-tem-check">
                                                                            <label>
                                                                                <input type="radio" id="check-id-7" name="Statement_Options" value=" Quarterly Statement" {{ (isset($data['content5']['Statement_Options']) && $data['content5']['Statement_Options']=='Quarterly Statement')?'checked':''}}>
                                                                                <label for="check-id-7" class="option">
                                                                                    <div class="chec-poa-eb ">
                                                                                        <span class="title_bold">Quarterly Statement</span> ($10.00 Fee)
                                                                                    </div>
                                                                                </label>
                                                                            </label>
                                                                        </div>
                                                                        <div class="i-tem-check">
                                                                            <label>
                                                                                <input type="radio" id="check-id-8" name="Statement_Options" value="Monthly Statement" {{ (isset($data['content5']['Statement_Options']) && $data['content5']['Statement_Options']=='Monthly Statement')?'checked':''}}>
                                                                                <label for="check-id-8" class="option">
                                                                                    <div class="chec-poa-eb ">
                                                                                       <span class="title_bold">Monthly Statement</span>  ($25.00 Fee)
                                                                                    </div>
                                                                                </label>
                                                                            </label>
                                                                        </div>
                                                                        <div class="i-tem-check">
                                                                            <label>
                                                                                <input type="radio" id="check-id-9" value="None" name="Statement_Options" {{ (!isset($data['content5']['Statement_Options']) || (isset($data['content5']['Statement_Options']) && $data['content5']['Statement_Options']=='None'))?'checked':''}}>
                                                                                <label for="check-id-9" class="option">
                                                                                    <div class="chec-poa-eb title_bold">
                                                                                        None
                                                                                    </div>
                                                                                </label>
                                                                            </label>
                                                                        </div>
                                                                    </div>
                                                                    <div class="pa-sub" style="margin-top: 20px;">
                                                                        Additional fees are assessed for paper statements. Please refer to the <a href="#">Fee Disclosure</a> for a list of all applicable fees.
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div id="div_check" style="{{ (!isset($data['content5']['Quarterly_Electronic']) || (isset($data['content5']['Quarterly_Electronic']) && $data['content5']['Quarterly_Electronic']==0))?'display:none':''}}">
                                                        <hr style="border-bottom: 1px solid #e1e1e1;margin-bottom: 30px;"/>
                                                        <div class="row">
                                                            <div class="pa-12-no">
                                                                <div class="col sqs-col-12 span-12">
                                                                    <div class="st5-t1">
                                                                        Electronic Statement/Online Account Access
                                                                    </div>
                                                                    <div class="st5-t2">
                                                                        Registered Representative Access
                                                                    </div>
                                                                    <div class="st5-t3">
                                                                        I understand that if I have previously granted a registered representative (or other person) trading authority or access to my account, that person is automatically authorized to view my account online as well.
                                                                    </div>
                                                                    <div class="on-check-ful" style="margin-bottom: 0;margin-top: 10px;">
                                                                        <div class="i-tem-check">
                                                                            <label>
                                                                                <input type="checkbox" id="check-id-234" name="Registered_Representative_Access" value="1" {{ (isset($data['content5']['Registered_Representative_Access']) && $data['content5']['Registered_Representative_Access']=='1')?'checked':''}}>
                                                                                <label for="check-id-234" class="option">
                                                                                    <div class="chec-poa-eb">
                                                                                        I have read and agree to the Terms of Service that governs the use of this site.
                                                                                    </div>
                                                                                </label>
                                                                            </label>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        </div>
                                                        <hr style="border-bottom: 1px solid #e1e1e1;margin-bottom: 40px;margin-top: 40px;"/>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="pa-sub">
                                        <div class="but-a-open bg-op3">
                                            <a href="/register-step4">Back</a>
                                        </div>
                                        <div class="but-a-open">
                                            <button class="submit_next">Next</button>
                                        </div>
                                    </div>
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