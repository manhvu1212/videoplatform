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
                <div class="col sqs-col-9 span-9">
                    <div class="column">
                        <a href="#">Open New Account</a> > <b> Process</b>
                    </div>
                    <form action="/register-step2" method="post" id="register_step1" onsubmit="return REGISTER.check_register1()">
                        <input id="_token" type="hidden" name="_token"  value="{{ csrf_token() }}"  >
                    <div class="row sqs-row">
                        <div class="col sqs-col-12 span-12">
                            <div class="cont-ri-sub-page">
                                <div class="pa-sub">
                                    <h2>Step 1 of 7 : Enter IRA Owner Information</h2>
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
                                            <div class="img-exm bg-bo-sm">
                                                <div class="img-exm-eg">
                                                    <a href="javascript:void(0)"><?php $type= Session::get('type');if($type=='Traditional IRA') echo 'Funding'; else echo 'Contribution'?><br/>
                                                        Information</a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col sqs-col-20 span-20">
                                            <div class="img-exm bg-bo-sm">
                                                <div class="img-exm-eg">
                                                    <a href="javascript:void(0)">Designation Of<br/>
                                                        Beneficiary</a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col sqs-col-20 span-20">
                                            <div class="img-exm bg-bo-sm">
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
                                <div class="ab-pa-db-inf">
                                    <div style="margin-bottom: 10px;font-family: MuseoSans-500;"><b>Personal Information</b></div>
                                    <a href="javascript:void(0)">*Required</a>
                                </div>

                                @if (Session::has('message'))
                                    <div class="alert alert-success fade in">
                                        <button data-dismiss="alert" class="close close-sm" type="button">
                                            <i class="fa fa-times"></i>
                                        </button>
                                        {{ Session::get('message') }}
                                    </div>
                                @endif
                                <?php if (Session::has('data')) {$data=Session::get('data');}?>
                                <div class="form-process">
                                    <div class="form-process-1">
                                        <div class="row">
                                            <div class="col sqs-col-9 span-9">
                                                <div class="wap-im-proce">
                                                    <label><span class="s">*</span>Your Name</label>
                                                    <div class="row">
                                                        <div class="col sqs-col-5 span-5">
                                                            <input placeholder="First Name" name="first_name"  id="first_name" value="{{isset($data['content1']['first_name'])?$data['content1']['first_name']:''}}" maxlength="100" type="text" class="ip-po-ab" />
                                                        </div>
                                                        <div class="col sqs-col-5 span-5">
                                                            <input placeholder="Last Name" name="last_name" id="last_name" value="{{isset($data['content1']['last_name'])?$data['content1']['last_name']:''}}" maxlength="100" type="text" class="ip-po-ab" />
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="wap-im-proce">
                                                    <label><span class="s">*</span>Social Security Number</label>
                                                    <div class="row">
                                                        <div class="col sqs-col-2 span-2">
                                                            <input type="text" class="ip-po-ab" name="Social_Security_Number1"  maxlength="3"  value="{{ isset($data['content1']['Social_Security_Number1'])?$data['content1']['Social_Security_Number1']:''}}" />
                                                        </div>
                                                        <div class="col sqs-col-2 span-2">
                                                            <input type="text" class="ip-po-ab" name="Social_Security_Number2" maxlength="2" value="{{isset($data['content1']['Social_Security_Number2'])?$data['content1']['Social_Security_Number2']:''}}" />
                                                        </div>
                                                        <div class="col sqs-col-3 span-3">
                                                            <input type="text" class="ip-po-ab" name="Social_Security_Number3" maxlength="4" value="{{ isset($data['content1']['Social_Security_Number3'])?$data['content1']['Social_Security_Number3']:''}}" />
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="wap-im-proce">
                                                    <label><span class="s">*</span>Date of Birth (mm/dd/yyyy)</label>
                                                    <div class="row">
                                                        <div class="col sqs-col-2 span-2">
                                                            <input type="text" class="ip-po-ab month_birth" maxlength="2" name="month_birth" value="{{ isset($data['content1']['month_birth'])?$data['content1']['month_birth']:''}}" />
                                                        </div>
                                                        <div class="col sqs-col-2 span-2">
                                                            <input type="text" class="ip-po-ab date_birth" maxlength="2" name="date_birth" value="{{ isset($data['content1']['date_birth'])?$data['content1']['date_birth']:''}}" />
                                                        </div>
                                                        <div class="col sqs-col-3 span-3">
                                                            <input type="text" class="ip-po-ab year_birth"  maxlength="4" name="year_birth" value="{{ isset($data['content1']['year_birth'])?$data['content1']['year_birth']:''}}"/>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="wap-im-proce">
                                                    <label class="label_title"><span class="s">*</span>Physical Address (No P.O. Boxes or mail drops)</label>
                                                    <div class="row">
                                                        <div class="col sqs-col-12 span-12">
                                                            <input placeholder="Address Line 1" name="address_line1" id="address_line1" type="text" class="ip-po-ab" value="{{ isset($data['content1']['address_line1'])?$data['content1']['address_line1']:''}}" />
                                                        </div>
                                                        <div class="col sqs-col-12 span-12">
                                                            <input placeholder="Address Line 2 (optional)" name="address_line2" id="address_line2" type="text" class="ip-po-ab" value="{{ isset($data['content1']['address_line2'])?$data['content1']['address_line2']:''}}" />
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col sqs-col-6 span-6">
                                                            <input placeholder="City" type="text" name="address_city" id="address_city" class="ip-po-ab" value="{{ isset($data['content1']['address_city'])?$data['content1']['address_city']:''}}" />
                                                        </div>
                                                        <div class="col sqs-col-6 span-6">
                                                            <input placeholder="State/Province" name="address_state"  id="address_state" type="text" class="ip-po-ab" value="{{ isset($data['content1']['address_state'])?$data['content1']['address_state']:''}}" />
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col sqs-col-6 span-6">
                                                            <input placeholder="Zip/Postal Code" name="address_zip" maxlength="15" id="address_zip" type="text" class="ip-po-ab" value="{{ isset($data['content1']['address_zip'])?$data['content1']['address_zip']:''}}" />
                                                        </div>
                                                        <div class="col sqs-col-6 span-6">
                                                            <input placeholder="Country" name="address_country" id="address_country" type="text" class="ip-po-ab" value="{{ isset($data['content1']['address_country'])?$data['content1']['address_country']:''}}" />
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col sqs-col-12 span-12">
                                                            <div class="on-check-ful" style="margin-bottom: 0;margin-top: 10px;">
                                                                <div class="i-tem-check">
                                                                    <label>
                                                                        <input class="my_mailing" name="check_my_mailing" type="checkbox" id="check-id-1" value="1" <?php if((isset($data['content1']['check_my_mailing']) && $data['content1']['check_my_mailing']==1)) echo 'checked'?>>
                                                                        <label for="check-id-1" class="option">
                                                                            <div class="chec-poa-eb">My mailing address is different from the street address
                                                                            </div>
                                                                        </label>
                                                                    </label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="div_mailing" style="<?php if(!isset($data['content1']['check_my_mailing']) || (isset($data['content1']['check_my_mailing']) && $data['content1']['check_my_mailing']==1))  echo'display: none'?>">
                                                        <label  class="label_title"><span class="s">*</span>Mailing Address</label>
                                                        <div class="row">
                                                            <div class="col sqs-col-12 span-12">
                                                                <input placeholder="Address Line 1" name="address1_line1" type="text" class="ip-po-ab" value="{{ isset($data['content1']['address1_line1'])?$data['content1']['address1_line1']:''}}" />
                                                            </div>
                                                            <div class="col sqs-col-12 span-12">
                                                                <input placeholder="Address Line 2 (optional)" name="address1_line2" type="text" class="ip-po-ab" value="{{ isset($data['content1']['address1_line2'])?$data['content1']['address1_line2']:''}}" />
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col sqs-col-6 span-6">
                                                                <input placeholder="City" type="text" name="address1_city" class="ip-po-ab" value="{{ isset($data['content1']['address1_city'])?$data['content1']['address1_city']:''}}" />
                                                            </div>
                                                            <div class="col sqs-col-6 span-6">
                                                                <input placeholder="State/Province" name="address1_state" type="text" class="ip-po-ab" value="{{ isset($data['content1']['address1_state'])?$data['content1']['address1_state']:''}}" />
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col sqs-col-6 span-6">
                                                                <input placeholder="Zip/Postal Code" name="address1_zip" maxlength="15" type="text" class="ip-po-ab" value="{{ isset($data['content1']['address1_zip'])?$data['content1']['address1_zip']:''}}" />
                                                            </div>
                                                            <div class="col sqs-col-6 span-6">
                                                                <input placeholder="Country" name="address1_country"  type="text" class="ip-po-ab" value="{{ isset($data['content1']['address1_country'])?$data['content1']['address1_country']:''}}" />
                                                            </div>
                                                        </div>

                                                    </div>

                                                    <label class="label_title"><span class="s">*</span>Contact Information</label>
                                                    <div class="row">
                                                        <div class="col sqs-col-6 span-6">
                                                            <input placeholder="Home Phone" name="home_phone" maxlength="20"  type="text" class="ip-po-ab" value="{{ isset($data['content1']['home_phone'])?$data['content1']['home_phone']:''}}" />
                                                        </div>
                                                        <div class="col sqs-col-6 span-6">
                                                            <input placeholder="Mobile Phone(optional)" name="mobile_phone"  maxlength="20"  type="text" class="ip-po-ab" value="{{ isset($data['content1']['mobile_phone'])?$data['content1']['mobile_phone']:''}}" />
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col sqs-col-6 span-6">
                                                            <input placeholder="Day Phone(optional)" name="day_phone" maxlength="20"  type="text" class="ip-po-ab" value="{{ isset($data['content1']['day_phone'])?$data['content1']['day_phone']:''}}" />
                                                        </div>
                                                        <div class="col sqs-col-6 span-6">
                                                            <input placeholder="Fax(optional)" type="text" name="fax" maxlength="20"  class="ip-po-ab" value="{{ isset($data['content1']['fax'])?$data['content1']['fax']:''}}" />
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col sqs-col-12 span-12">
                                                            <input placeholder="Email Address" name="email" maxlength="100"  id="email" type="email" class="ip-po-ab" value="{{isset($data['content1']['email'])?$data['content1']['email']:''}}" />
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="pa-12-no">
                                                <div class="col sqs-col-12 span-12">
                                                    <div class="wap-im-proce spl-pa-forn">
                                                        <label style="font-size: 16px;margin-bottom: 10px;margin-top: 7px;"><span class="s">*</span>Current Marital Status<span class="sm nobold" style="font-size:12px"> (Please select one)</span></label>
                                                        <div class="row">
                                                            <div class="col sqs-col-12 span-12">
                                                                <div class="on-check-ful" style="margin-bottom: 0;margin-top: 10px;">
                                                                    <div class="i-tem-check">
                                                                        <label>
                                                                            <input type="radio" id="check-id-2" value="0" class="check_married" name="married"  <?php if(!isset($data['content1']['married']) || (isset($data['content1']['married']) && $data['content1']['married']==0)) echo 'checked'; ?>>
                                                                            <label for="check-id-2" class="option">
                                                                                <div class="chec-poa-eb">
                                                                                    <b style="font-family: MuseoSans-500">I Am Not Married -</b> I understand that if I become married in the future, I should review and submit a new IRA Designation of
                                                                                    Beneficiary form.
                                                                                </div>
                                                                            </label>
                                                                        </label>
                                                                    </div>
                                                                    <div class="i-tem-check">
                                                                        <label>
                                                                            <input type="radio" id="check-id-3" value="1" class="check_married" name="married" <?php if(isset($data['content1']['married']) && $data['content1']['married']==1) echo 'checked'?>>
                                                                            <label for="check-id-3" class="option">
                                                                                <div class="chec-poa-eb">
                                                                                    <b style="font-family: MuseoSans-500">I Am Married -</b> I understand that if I become married in the future, I should review and submit a new IRA Designation of
                                                                                    Beneficiary form.
                                                                                </div>
                                                                            </label>
                                                                        </label>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <hr style="border-bottom: 1px solid #e1e1e1;margin-bottom: 30px;"/>
                                <div class="pa-sub">
                                    <div class="but-a-open bg-op3">
                                        <a href="/register">Back</a>
                                    </div>
                                    <div class="but-a-open">
                                        <button class="submit_next submit_next1">Next</button>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    </form>
                </div>

                @include('layouts.frontend.right-sidebar')
            </div>
        </div>
    </div>
</div>

<?php //if (!isset($data['content1'])) {?>
    <div id="div_pop">
        <div class="container">
            <div class="row">
                <div class="bg-akx-epp">
                    <div class="divm-ax">
                        <h2>Reminder <span class="x_close">&times;</span></h2>
                    </div>
                    <div class="divm-ax">Please confirm that any social security numbers have been input correctly. Incorrect or invalid social security numbers will delay the opening of your account.</div>
                    <hr style="margin: 20px 0">
                    <div class="bh-elx">
                        <div class="fo-xma-ell" style="margin-right: 20px;">
                            <div class="but-acon color3"><a class="x_close">Continue</a></div>
                        </div>
                        <div class="fo-xma-ell">
                            <div class="but-acon color7"><a href="/">Cancel</a></div>
                        </div>

                    </div>
                </div>
            </div>
        </div>

    </div>
    <div id="background">
    </div>
    <?php // } ?>
@stop
@section('script')
@stop

