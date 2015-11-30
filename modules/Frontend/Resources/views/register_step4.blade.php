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
                <form action="/register-step5" method="post" id="register_step4">
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
                                        <h2>Step 4 of 7 : Designation of Representative</h2>
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
                                                <div class="img-exm bg-bo-sm">
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
                                    <div class="g-ao-kg-eg">
                                        <div class="pa-sub">
                                            If my account representative changes firms or broker-dealer aliations, my account representative will continue to have the
                                            same authority on my account. It is my account representative's responsibility to notify both the custodian and myself of any
                                            change in my account reperesentative's firm or broker-dealer aliation with the investments in my account.
                                        </div>
                                        <div class="pa-sub">
                                            If you are not designating a representative, you may <a>continue to the next step.</a>
                                        </div>
                                    </div>
                                    <div class="form-process">
                                        <div class="form-process-4">
                                            <label style="font-size: 16px;margin-bottom: 20px;margin-top: 7px;">Representative Information</label>
                                            <div class="wap-im-proce">
                                                <label>Broker-Dealer</label>
                                                <div class="row">
                                                    <div class="col sqs-col-9 span-9">
                                                        <div class="wap-im-proce">
                                                            <div class="row">
                                                                <div class="col sqs-col-8 span-8">
                                                                    <input placeholder="" name="Broker_Dealer" value="{{ isset($data['content4']['Broker_Dealer'])?$data['content4']['Broker_Dealer']:''}}" type="text" class="ip-po-ab">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="wap-im-proce">
                                                            <div class="row">
                                                                <div class="col sqs-col-4 span-4">
                                                                    <input placeholder="First Name" name="First_Name" type="text" class="ip-po-ab" value="{{ isset($data['content4']['First_Name'])?$data['content4']['First_Name']:''}}">
                                                                </div>
                                                                <div class="col sqs-col-4 span-4">
                                                                    <input placeholder="Last Name" name="Last_Name" value="{{ isset($data['content4']['Last_Name'])?$data['content4']['Last_Name']:''}}" type="text" class="ip-po-ab">
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="wap-im-proce">
                                                            <div class="row">
                                                                <div class="col sqs-col-12 span-12">
                                                                    <input placeholder="Address Line 1" name="Address_Line_1" value="{{ isset($data['content4']['Address_Line_1'])?$data['content4']['Address_Line_1']:''}}"  type="text" class="ip-po-ab">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="wap-im-proce">
                                                            <div class="row">
                                                                <div class="col sqs-col-12 span-12">
                                                                    <input placeholder="Address Line 2 (optional)" name="Address_Line_2" value="{{ isset($data['content4']['Address_Line_2'])?$data['content4']['Address_Line_2']:''}}" type="text" class="ip-po-ab">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="wap-im-proce">
                                                            <div class="row">
                                                                <div class="col sqs-col-6 span-6">
                                                                    <input placeholder="City" name="City" value="{{ isset($data['content4']['City'])?$data['content4']['City']:''}}" type="text" class="ip-po-ab">
                                                                </div>
                                                                <div class="col sqs-col-6 span-6">
                                                                    <input placeholder="State/Province" name="State" value="{{ isset($data['content4']['State'])?$data['content4']['State']:''}}" type="text" class="ip-po-ab">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="wap-im-proce">
                                                            <div class="row">
                                                                <div class="col sqs-col-6 span-6">
                                                                    <input placeholder="Zip/Postal Code" type="text"  name="zipcode" value="{{ isset($data['content4']['zipcode'])?$data['content4']['zipcode']:''}}"  class="ip-po-ab">
                                                                </div>
                                                                <div class="col sqs-col-6 span-6">
                                                                    <input placeholder="Country" type="text" name="Country" value="{{ isset($data['content4']['Country'])?$data['content4']['Country']:''}}" class="ip-po-ab">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="wap-im-proce">
                                                            <div class="row">
                                                                <div class="col sqs-col-6 span-6">
                                                                    <input placeholder="Home Phone" name="Home_Phone" value="{{ isset($data['content4']['Home_Phone'])?$data['content4']['Home_Phone']:''}}"  type="text" class="ip-po-ab">
                                                                </div>
                                                                <div class="col sqs-col-6 span-6">
                                                                    <input placeholder="Fax" name="Fax" value="{{ isset($data['content4']['Fax'])?$data['content4']['Fax']:''}}"  type="text" class="ip-po-ab">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="wap-im-proce">
                                                            <div class="row">
                                                                <div class="col sqs-col-12 span-12">
                                                                    <input placeholder="Email Address" name="Email_Address" value="{{ isset($data['content4']['Email_Address'])?$data['content4']['Email_Address']:''}}"  type="text" class="ip-po-ab">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="pa-sub">
                                            <b>Please check all that apply.</b> If neither statement below is marked, the representative above will only be allowed access to account statements and other information if he/she sets up online account access. If you wish to grant additional authority you
                                            must check either A or both A and B.
                                        </div>
                                        <div class="pa-12-no">
                                            <div class="wap-im-proce">
                                                <div class="row">
                                                    <div class="col sqs-col-12 span-12">
                                                        <div class="on-check-ful" style="margin-bottom: 0;margin-top: 10px;">
                                                            <div class="i-tem-check">
                                                                <label>
                                                                    <input type="checkbox" id="check-id-5" name="representative[]" value="A" {{ (isset($data['content4']['representative'][0]) && $data['content4']['representative'][0]=='A')?'checked':''}}>
                                                                    <label for="check-id-5" class="option">
                                                                        <div class="chec-poa-eb">
                                                                            A. Buy, sell, deliver and/or settle trades of any assets in accordance with your terms and conditions upon the written
                                                                            direction of my account representative. The custodian has the right to rely on any representation and/or warranties
                                                                            made by my account representative in connection with a sale or purchase on behalf of my account, including but
                                                                            not limited to, representations with regard to prohibited transactions and suitability requirements.
                                                                        </div>
                                                                    </label>
                                                                </label>
                                                            </div>
                                                            <div class="i-tem-check">
                                                                <label>
                                                                    <input type="checkbox" id="check-id-6" name="representative[]" value="B" {{ (isset($data['content4']['representative'][1]) && $data['content4']['representative'][1]=='B')?'checked':''}}>
                                                                    <label for="check-id-6" class="option">
                                                                        <div class="chec-poa-eb">
                                                                            B. Disperse funds to my account representative upon the written direction of my account representative.
                                                                        </div>
                                                                    </label>
                                                                </label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <hr style="border-bottom: 1px solid #e1e1e1;margin-bottom: 30px;"/>
                                    </div>
                                    <div class="pa-sub">
                                        <div class="but-a-open bg-op3">
                                            <a href="/register-step3">Back</a>
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