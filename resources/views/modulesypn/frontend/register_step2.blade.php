@extends('layouts.frontend.master1')
@section('style')
    <link rel="stylesheet" type="text/css" href="/fontend/css/home.css" />
@stop
@section('script')
    <script type="text/javascript" src="/assets/global/plugins/jquery-validation/js/jquery.validate.js"></script>
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
                        <div class="row sqs-row">
                            <form action="/register-step3" method="post" id="register_step2" onsubmit="return REGISTER.check_submit_step2()">
                                <input id="_token" type="hidden" name="_token"  value="{{ csrf_token() }}"  >
                                <div class="col sqs-col-12 span-12">
                                    <div class="cont-ri-sub-page">
                                        <div class="pa-sub">
                                            <h2>Step 2 of 7 :    <?php $type= Session::get('type');
                                                if($type=='Traditional IRA') echo 'Funding Information'; else echo 'Contribution Information'?></h2>
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
                                                            <a href="javascript:void(0)"><?php if($type=='Traditional IRA') echo 'Funding'; else echo 'Contribution'?><br/>
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
                                        <?php if (Session::has('data')) {$data=Session::get('data');}?>
                                        <hr style="border-bottom: 1px solid #e1e1e1;margin-bottom: 30px;"/>
                                        <div class="form-process">
                                            <div class="form-process-2">
                                                <div class="row">
                                                    <div class="pa-12-no">
                                                        <div class="col sqs-col-12 span-12">
                                                            <div class="wap-im-proce spl-pa-forn">
                                                                <label class="label-b">Contribution</label>
                                                                <div class="row">
                                                                    <div class="col sqs-col-12 span-12">
                                                                        <div class="on-check-ful" style="margin-bottom: 0;margin-top: 10px;">
                                                                            <div class="i-tem-check">
                                                                                <label>
                                                                                    <input type="radio" id="check-id-2" class="checked_contribution" name="contribution" value="1" <?php if(isset($data['content2']['contribution']) && $data['content2']['contribution']==1) echo 'checked' ?>>
                                                                                    <label for="check-id-2" class="option">
                                                                                        <div class="chec-poa-eb">
                                                                                            <b> Contribution</b>
                                                                                        </div>
                                                                                    </label>
                                                                                </label>
                                                                            </div>
                                                                            <?php if(Session::get('type')=='SEP Plan') {?>
                                                                            <div class="i-tem-check">
                                                                                <label>
                                                                                    <input type="radio" id="check-id-3" class="checked_contribution" name="contribution" value="2" <?php if(isset($data['content2']['contribution']) && $data['content2']['contribution']==2) echo 'checked' ?>>
                                                                                    <label for="check-id-3" class="option">
                                                                                        <div class="chec-poa-eb">
                                                                                            <b>SEP Contribution</b>
                                                                                        </div>
                                                                                    </label>
                                                                                </label>
                                                                            </div>
                                                                            <?php }?>
                                                                            <div class="i-tem-check">
                                                                                <label>
                                                                                    <input type="radio" id="check-id-4" value="0" class="checked_contribution" name="contribution" <?php if(!isset($data['content2']['contribution']) ||(isset($data['content2']['contribution']) && $data['content2']['contribution']==0)) echo 'checked' ?>>
                                                                                    <label for="check-id-4" class="option">
                                                                                        <div class="chec-poa-eb">
                                                                                            <b>No Contribution (at this time)</b>
                                                                                        </div>
                                                                                    </label>
                                                                                </label>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="wap-im-proce spl-pa-forn">
                                                                <label class="label-b">Transfers / Rollovers</label>
                                                                <div class="row">
                                                                    <div class="col sqs-col-12 span-12">
                                                                        <div class="on-check-ful" style="margin-bottom: 0;margin-top: 10px;">
                                                                            <div class="i-tem-check">
                                                                                <label>
                                                                                    <input type="radio" id="check-id-5" value="1" class="check_transfer" name="transfer" <?php if(isset($data['content2']['transfer']) && $data['content2']['transfer']==1) echo 'checked' ?>>
                                                                                    <label for="check-id-5" class="option">
                                                                                        <div class="chec-poa-eb">
                                                                                            <b>Transfer</b>
                                                                                        </div>
                                                                                    </label>
                                                                                    <p class="p_pro p_pro1">The process of moving like IRAs between custodians</p>


                                                                                </label>
                                                                            </div>
                                                                            <div class="i-tem-check">
                                                                                <label>
                                                                                    <input type="radio" id="check-id-6" value="2" class="check_transfer" name="transfer" <?php if(isset($data['content2']['transfer']) && $data['content2']['transfer']==2) echo 'checked' ?>>
                                                                                    <label for="check-id-6" class="option">
                                                                                        <div class="chec-poa-eb">
                                                                                            <b>Direct Rollover</b>
                                                                                        </div>
                                                                                    </label>
                                                                                    <p class="p_pro p_pro2">The process of moving an employer retirement plan such as 401(K) or 403(B) plan directly to an IRA.</p>
                                                                                </label>
                                                                            </div>
                                                                            <div class="i-tem-check">
                                                                                <label>
                                                                                    <input type="radio" id="check-id-7" value="3" class="check_transfer" name="transfer" <?php if(isset($data['content2']['transfer']) && $data['content2']['transfer']==3) echo 'checked' ?>>
                                                                                    <label for="check-id-7" class="option">
                                                                                        <div class="chec-poa-eb">
                                                                                            <b>Indirect Rollover</b>
                                                                                        </div>
                                                                                    </label>
                                                                                </label>
                                                                                <p class="p_pro p_pro3">The process of taking a distribution received by the accountholder from an IRA or tax-deferred plan and then rolling it into another IRA within 60 days.</p>
                                                                            </div>
                                                                            <div class="i-tem-check">
                                                                                <label>
                                                                                    <input type="radio" id="check-id-8" value="4" class="check_transfer" name="transfer" <?php if(isset($data['content2']['transfer']) && $data['content2']['transfer']==4) echo 'checked' ?>>
                                                                                    <label for="check-id-8" class="option" >
                                                                                        <div class="chec-poa-eb">
                                                                                            <b>Recharacterization</b>
                                                                                        </div>
                                                                                    </label>
                                                                                </label>
                                                                                <p class="p_pro p_pro4">Is the process of correcting or undoing a contribution or conversion - deadlines do apply.</p>
                                                                            </div>
                                                                            <div class="i-tem-check">
                                                                                <label>
                                                                                    <input type="radio" id="check-id-9" value="0" class="check_transfer" <?php if(!isset($data['content2']['transfer']) ||(isset($data['content2']['transfer']) && $data['content2']['transfer']==0)) echo 'checked' ?> name="transfer">
                                                                                    <label for="check-id-9" class="option">
                                                                                        <div class="chec-poa-eb">
                                                                                            <b>No Transfer/Rollover</b>
                                                                                        </div>
                                                                                    </label>
                                                                                </label>
                                                                            </div>
                                                                            <p class="p_error" style="<?php if(!isset($data['content2']['transfer']) ||(isset($data['content2']['transfer']) && $data['content2']['transfer']!=0) || (isset($data['content2']['contribution']) && $data['content2']['contribution']!=0) ) echo 'display:none;' ?>">You must either make a contribution and/or do a transfer or rollover</p>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <hr style="border-bottom: 1px solid #e1e1e1;margin-bottom: 30px;"/>
                                                            <div class="contribution" style="<?php if(!isset($data['content2']['contribution']) ||(isset($data['content2']['contribution']) && $data['content2']['contribution']==0)) echo 'display:none' ?>">
                                                                <label class="contribution"><span class="s">*</span>Contribution</label>
                                                                <div class="on-check-ful  contribution_Regular" style="margin-bottom: 0;margin-top: 10px;<?php if(!isset($data['content2']['contribution']) ||(isset($data['content2']['contribution']) && $data['content2']['contribution']!=1)) echo 'display:none' ?>">
                                                                    <div class="i-tem-check contribution contribution1">
                                                                        <label>
                                                                            <input type="radio" id="check-id-30" name="spousal" value="Regular" class="radio radio30" data="30" <?php if(isset($data['content2']['spousal']) && $data['content2']['spousal']=='Regular') echo 'checked' ?>>
                                                                            <label for="check-id-30" class="option">
                                                                                <div class="chec-poa-eb">
                                                                                    <b>Regular</b>
                                                                                </div>
                                                                            </label>
                                                                        </label>
                                                                    </div>
                                                                    <div class="i-tem-check contribution contribution1">
                                                                        <label>
                                                                            <input type="radio" id="check-id-10" value="Spousal" name="spousal" class="radio radio30" data="30" <?php if(!isset($data['content2']['spousal']) ||(isset($data['content2']['spousal']) && $data['content2']['spousal']=='Spousal')) echo 'checked' ?>>
                                                                            <label for="check-id-10" class="option">
                                                                                <div class="chec-poa-eb">
                                                                                    <b>Spousal</b>
                                                                                </div>
                                                                            </label>
                                                                        </label>
                                                                    </div>
                                                                </div>
                                                                <div class="wap-im-proce contribution">
                                                                    <label>Amount</label>
                                                                    <div class="row">
                                                                        <div class="col sqs-col-12 span-12">
                                                                            <input name="amout" type="text" class="ip-po-ab amout validation <?php if(!isset($data['content2']['contribution']) ||(isset($data['content2']['contribution']) && $data['content2']['contribution']!=2)) echo 'ignore' ?>" value="{{ isset($data['content2']['amout'])?$data['content2']['amout']:''}}" />
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="wap-im-proce contribution contribution1" style="<?php if(isset($data['content2']['contribution']) && $data['content2']['contribution']==2) echo 'display:none' ?>">
                                                                    <label>For Tax Year</label>
                                                                    <div class="row">
                                                                        <div class="col sqs-col-12 span-12">
                                                                            <input name="for_tax_year" type="text" class="ip-po-ab" value="{{ isset($data['content2']['for_tax_year'])?$data['content2']['for_tax_year']:''}}" />
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <hr style="border-bottom: 1px solid #e1e1e1;margin-bottom: 30px;"/>
                                                            </div>

                                                            <!-- Div tranfers1 -->
                                                            <div class="transfer transfer1" style="<?php if(!isset($data['content2']['transfer']) ||(isset($data['content2']['transfer']) && $data['content2']['transfer']!=1 && $data['content2']['transfer']!=2)) echo 'display:none' ?>">
                                                                <label><span class="s">*</span>Transfer / Direct Rollovers <span class="small nobold">(Please select one)</span></label>
                                                                <div class="on-check-ful" style="margin-bottom: 0;margin-top: 10px;">
                                                                    <div class="i-tem-check">
                                                                        <label>
                                                                            <input type="radio" id="check-id-11" class="radio radio11" data="11" name="Partial" value="Full" <?php if(isset($data['content2']['Partial']) && $data['content2']['Partial']=='Full') echo 'checked' ?>>
                                                                            <label for="check-id-11" class="option">
                                                                                <div class="chec-poa-eb">
                                                                                    <b>Full</b>
                                                                                </div>
                                                                            </label>
                                                                        </label>
                                                                    </div>
                                                                    <div class="i-tem-check">
                                                                        <label>
                                                                            <input type="radio" id="check-id-12" value="Partial" class="radio radio11" data="11" name="Partial" <?php if(!isset($data['content2']['Partial']) ||(isset($data['content2']['Partial']) && $data['content2']['Partial']=='Partial')) echo 'checked' ?>>
                                                                            <label for="check-id-12" class="option">
                                                                                <div class="chec-poa-eb">
                                                                                    <b>Partial</b>
                                                                                </div>
                                                                            </label>
                                                                        </label>
                                                                    </div>
                                                                </div>
                                                                <hr style="border-bottom: 1px solid #e1e1e1;margin-bottom: 30px;"/>
                                                                <div class="transfer2">
                                                                    <label><span class="s">*</span>Your employer may require other forms to process your request</label>
                                                                    <div class="on-check-ful" style="margin-bottom: 0;margin-top: 10px;">
                                                                        <div class="i-tem-check">
                                                                            <label>
                                                                                <input type="radio" id="check-id-70" class="radio radio70" data="70" name="employer" value="401K" <?php if(!isset($data['content2']['employer']) || (isset($data['content2']['employer']) && $data['content2']['employer']=='401K')) echo 'checked' ?>>
                                                                                <label for="check-id-70" class="option">
                                                                                    <div class="chec-poa-eb">
                                                                                        401K*
                                                                                    </div>
                                                                                </label>
                                                                            </label>
                                                                        </div>
                                                                        <div class="i-tem-check">
                                                                            <label>
                                                                                <input type="radio" id="check-id-71" value="403B" class="radio radio70" data="70" name="employer" <?php if((isset($data['content2']['employer']) && $data['content2']['employer']=='403B')) echo 'checked' ?>>
                                                                                <label for="check-id-71" class="option">
                                                                                    <div class="chec-poa-eb title_bold">
                                                                                        403B*
                                                                                    </div>
                                                                                </label>
                                                                            </label>
                                                                        </div>
                                                                        <div class="i-tem-check">
                                                                            <label>
                                                                                <input type="radio" id="check-id-72" value="Profit Sharing Plan" class="radio radio70" data="70" name="employer" <?php if((isset($data['content2']['employer']) && $data['content2']['employer']=='Profit Sharing Plan')) echo 'checked' ?>>
                                                                                <label for="check-id-72" class="option">
                                                                                    <div class="chec-poa-eb">
                                                                                        Profit Sharing Plan*
                                                                                    </div>
                                                                                </label>
                                                                            </label>
                                                                        </div>
                                                                        <div class="i-tem-check">
                                                                            <label>
                                                                                <input type="radio" id="check-id-73" value="Other" class="radio radio70" data="70" name="employer" <?php if((isset($data['content2']['employer']) && $data['content2']['employer']=='Other')) echo 'checked' ?>>
                                                                                <label for="check-id-73" class="option">
                                                                                    <div class="chec-poa-eb">
                                                                                        Other*
                                                                                    </div>
                                                                                </label>
                                                                            </label>
                                                                        </div>
                                                                    </div>
                                                                    <hr style="border-bottom: 1px solid #e1e1e1;margin-bottom: 30px;"/>

                                                                </div>
                                                                <label><span class="s">*</span><span class="small nobold">(Please select one)</span></label>
                                                                <div class="on-check-ful" style="margin-bottom: 0;margin-top: 10px;">
                                                                    <div class="i-tem-check">
                                                                        <label>
                                                                            <input type="radio" id="check-id-13" name="Traditional" class="radio radio13" data="13" value="1" <?php if(isset($data['content2']['Traditional']) && $data['content2']['Traditional']==1) echo 'checked' ?>>
                                                                            <label for="check-id-13" class="option">
                                                                                <div class="chec-poa-eb">
                                                                                    <b>Traditional IRA to Traditional IRA (Custodian to Custodian)</b>
                                                                                </div>
                                                                            </label>
                                                                        </label>
                                                                    </div>
                                                                    <div class="i-tem-check ">
                                                                        <label>
                                                                            <input type="radio" id="check-id-14" value="0" class="radio radio13" data="13" name="Traditional" <?php if(!isset($data['content2']['Traditional']) ||(isset($data['content2']['Traditional']) && $data['content2']['Traditional']==0)) echo 'checked' ?>>
                                                                            <label for="check-id-14" class="option">
                                                                                <div class="chec-poa-eb">
                                                                                    <b>SIMPLE IRA to Traditional IRA (Custodian to Custodian) if eligible</b>
                                                                                </div>
                                                                            </label>
                                                                        </label>
                                                                    </div>
                                                                </div>
                                                                <hr style="border-bottom: 1px solid #e1e1e1;margin-bottom: 30px;"/>
                                                                <label><span class="s">*</span>Are any of these finds/assets from and Inherited Account?</label>
                                                                <div class="on-check-ful" style="margin-bottom: 0;margin-top: 10px;">
                                                                    <div class="i-tem-check">
                                                                        <label>
                                                                            <input type="radio" id="check-id-15" name="Inherited_Account" value="yes" class="radio radio15" data="15"  <?php if(isset($data['content2']['Inherited_Account']) && $data['content2']['Inherited_Account']=='yes') echo 'checked' ?>>
                                                                            <label for="check-id-15" class="option">
                                                                                <div class="chec-poa-eb">
                                                                                    <b>Yes</b>
                                                                                </div>
                                                                            </label>
                                                                        </label>
                                                                    </div>
                                                                    <div class="i-tem-check">
                                                                        <label>
                                                                            <input type="radio" id="check-id-16" value="no" name="Inherited_Account"  class="radio radio15" data="15" <?php if(!isset($data['content2']['Inherited_Account']) ||(isset($data['content2']['Inherited_Account']) && $data['content2']['Inherited_Account']=='no')) echo 'checked' ?>>
                                                                            <label for="check-id-16" class="option">
                                                                                <div class="chec-poa-eb">
                                                                                    <b>No</b>
                                                                                </div>
                                                                            </label>
                                                                        </label>
                                                                    </div>
                                                                </div>
                                                                <hr style="border-bottom: 1px solid #e1e1e1;margin-bottom: 30px;"/>
                                                                <label class="label-b"><span class="s">*</span>Current Trustee/Custodian</label>
                                                                <div class="wap-im-proce">
                                                                    <div class="row">
                                                                        <div class="col sqs-col-4 span-4">
                                                                            <span><b>Name</b></span>
                                                                            <input placeholder="" name="trustee_name" type="text" class="ip-po-ab validation <?php if(!isset($data['content2']['transfer']) ||(isset($data['content2']['transfer']) && $data['content2']['transfer']!=1)) echo 'ignore' ?>" value="{{ isset($data['content2']['trustee_name'])?$data['content2']['trustee_name']:''}}" />
                                                                        </div>
                                                                        <div class="col sqs-col-4 span-4">
                                                                            <span><b>Account Name</b></span>
                                                                            <input placeholder="" name="trustee_account_name" type="text" class="ip-po-ab validation <?php if(!isset($data['content2']['transfer']) ||(isset($data['content2']['transfer']) && $data['content2']['transfer']!=1)) echo 'ignore' ?>" value="{{ isset($data['content2']['trustee_account_name'])?$data['content2']['trustee_account_name']:''}}" />
                                                                        </div>
                                                                        <div class="col sqs-col-4 span-4">
                                                                            <span><b>Account Number</b></span>
                                                                            <input placeholder="" name="trustee_account_number" type="text" class="ip-po-ab validation <?php if(!isset($data['content2']['transfer']) ||(isset($data['content2']['transfer']) && $data['content2']['transfer']!=1)) echo 'ignore' ?>" value="{{ isset($data['content2']['trustee_account_number'])?$data['content2']['trustee_account_number']:''}}" />
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="wap-im-proce">
                                                                    <label style="font-size: 16px;margin-bottom: 20px;margin-top: 7px;"><span class="s">*</span>Address</label>
                                                                    <div class="row">
                                                                        <div class="col sqs-col-12 span-12">
                                                                            <input placeholder="Address Line 1" name="address_line1" type="text" class="ip-po-ab validation <?php if(!isset($data['content2']['transfer']) ||(isset($data['content2']['transfer']) && $data['content2']['transfer']!=1)) echo 'ignore' ?>" value="{{ isset($data['content2']['address_line1'])?$data['content2']['address_line1']:''}}" />
                                                                        </div>
                                                                        <div class="col sqs-col-12 span-12">
                                                                            <input placeholder="Address Line 2 (optional)" name="address_line2" type="text" class="ip-po-ab" value="{{ isset($data['content2']['address_line2'])?$data['content2']['address_line2']:''}}" />
                                                                        </div>
                                                                    </div>
                                                                    <div class="row">
                                                                        <div class="col sqs-col-6 span-6">
                                                                            <input placeholder="City" type="text" name="address_city" class="ip-po-ab validation <?php if(!isset($data['content2']['transfer']) ||(isset($data['content2']['transfer']) && $data['content2']['transfer']!=1)) echo 'ignore' ?>" value="{{ isset($data['content2']['address_city'])?$data['content2']['address_city']:''}}" />
                                                                        </div>
                                                                        <div class="col sqs-col-6 span-6">
                                                                            <input placeholder="State/Province" name="address_state" type="text" class="ip-po-ab validation <?php if(!isset($data['content2']['transfer']) ||(isset($data['content2']['transfer']) && $data['content2']['transfer']!=1)) echo 'ignore' ?>" value="{{ isset($data['content2']['address_state'])?$data['content2']['address_state']:''}}" />
                                                                        </div>
                                                                    </div>
                                                                    <div class="row">
                                                                        <div class="col sqs-col-6 span-6">
                                                                            <input placeholder="Zip/Postal Code" name="address_zip"  type="text" class="ip-po-ab validation <?php if(!isset($data['content2']['transfer']) ||(isset($data['content2']['transfer']) && $data['content2']['transfer']!=1)) echo 'ignore' ?>" value="{{ isset($data['content2']['address_zip'])?$data['content2']['address_zip']:''}}" />
                                                                        </div>
                                                                        <div class="col sqs-col-6 span-6">
                                                                            <input placeholder="Country" name="address_country" type="text" class="ip-po-ab validation <?php if(!isset($data['content2']['transfer']) ||(isset($data['content2']['transfer']) && $data['content2']['transfer']!=1)) echo 'ignore' ?>" value="{{ isset($data['content2']['address_country'])?$data['content2']['address_country']:''}}" />
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="wap-im-proce">
                                                                    <label>Contact Number</label>
                                                                    <div class="row">
                                                                        <div class="col sqs-col-4 span-4">
                                                                            <input placeholder="Phone Number" name="Contact_Number" type="text" class="ip-po-ab" value="{{ isset($data['content2']['Contact_Number'])?$data['content2']['Contact_Number']:''}}" />
                                                                        </div>

                                                                    </div>
                                                                </div>


                                                                <hr style="border-bottom: 1px solid #e1e1e1;margin-bottom: 30px;"/>
                                                                <label class="nobold">Mainstar Trust sends Tranfer an Rollover Request by regular US Postal Service. If you prefer an expedited service, please indi-cate the service and provide your billing number below.</label>
                                                                <div class="wap-im-proce">
                                                                    <div class="row">
                                                                        <div class="col sqs-col-4 span-4">
                                                                            <span><span class="s">*</span><b>Send By</b></span>
                                                                            <input placeholder="" name="Send_By" type="text" class="ip-po-ab validation <?php if(!isset($data['content2']['transfer']) ||(isset($data['content2']['transfer']) && $data['content2']['transfer']!=1)) echo 'ignore' ?>" value="{{ isset($data['content2']['Send_By'])?$data['content2']['Send_By']:''}}" />
                                                                        </div>
                                                                        <div class="col sqs-col-4 span-4">
                                                                            <span><span class="s">*</span><b>Type of Service</b></span>
                                                                            <input placeholder="" name="Type_of_Service" type="text" class="ip-po-ab validation <?php if(!isset($data['content2']['transfer']) ||(isset($data['content2']['transfer']) && $data['content2']['transfer']!=1)) echo 'ignore' ?>" value="{{ isset($data['content2']['Type_of_Service'])?$data['content2']['Type_of_Service']:''}}" />
                                                                        </div>
                                                                        <div class="col sqs-col-4 span-4">
                                                                            <span><span class="s">*</span><b>Billing Number</b></span>
                                                                            <input placeholder="" name="Billing_Number" type="text" class="ip-po-ab validation <?php if(!isset($data['content2']['transfer']) ||(isset($data['content2']['transfer']) && $data['content2']['transfer']!=1)) echo 'ignore' ?>" value="{{ isset($data['content2']['Billing_Number'])?$data['content2']['Billing_Number']:''}}" />
                                                                        </div>
                                                                    </div>
                                                                </div>


                                                                <hr style="border-bottom: 1px solid #e1e1e1;margin-bottom: 30px;"/>
                                                                <label class="nobold"><span class="s">*</span>I direct the transfer/rollover of this account to Mainstar Trust, custodian (Mainstar Trust). A copy of the account statement must be send to Mainstar Trust. The Transfer/Rollover is to be accomplished as follows.</label>
                                                                <div class="row" style="margin-left: 0px;">
                                                                    <div class="on-check-ful" style="margin-bottom: 0;margin-top: 10px;">
                                                                        <div class="i-tem-check">
                                                                            <label>
                                                                                <input type="radio" id="check-id-17" class="transfer_rollover radio radio17" data="17" name="transfer_rollover" value="1" <?php if(isset($data['content2']['transfer_rollover']) && $data['content2']['transfer_rollover']==1) echo 'checked' ?>>
                                                                                <label for="check-id-17" class="option">
                                                                                    <div class="chec-poa-eb">
                                                                                        <b>Liquidate all assets and transfer the proceeds</b>
                                                                                    </div>
                                                                                </label>
                                                                            </label>
                                                                        </div>
                                                                        <div class="row div_Liquidate" style="margin-left:40px;<?php if(!isset($data['content2']['transfer_rollover']) || (isset($data['content2']['transfer_rollover']) && $data['content2']['transfer_rollover']!=1)) echo 'display:none' ?>">
                                                                            <div class="i-tem-check">
                                                                                <label>
                                                                                    <input type="radio" id="check-id-18" class="radio radio18" data="18" name="Liquidate" value="Immediately" <?php if(!isset($data['content2']['Liquidate']) ||(isset($data['content2']['Liquidate']) && $data['content2']['Liquidate']=='Immediately')) echo 'checked' ?>>
                                                                                    <label for="check-id-18" class="option">
                                                                                        <div class="chec-poa-eb">
                                                                                            <b>Immediately (I am aware of and acknowledge the early withdrawal penalty for certain assets)</b>
                                                                                        </div>
                                                                                    </label>
                                                                                </label>
                                                                            </div>
                                                                            <div class="i-tem-check">
                                                                                <label>
                                                                                    <input type="radio" id="check-id-19" class="radio radio18" data="18" name="Liquidate" value="Maturity" <?php if(isset($data['content2']['Liquidate']) && $data['content2']['Liquidate']=='Maturity') echo 'checked' ?>>
                                                                                    <label for="check-id-19" class="option">
                                                                                        <div class="chec-poa-eb">
                                                                                            <b>At Maturity. Maturity Date(s):</b>
                                                                                        </div>
                                                                                    </label>
                                                                                </label>
                                                                            </div>
                                                                            <div class="row">
                                                                                <div class="col sqs-col-4 span-4">
                                                                                    <input  style="margin-left: 40px;margin-bottom: 10px" name="Liquidate_text" type="text" class="ip-po-ab" value="{{ isset($data['content2']['Liquidate_text'])?$data['content2']['Liquidate_text']:''}}" />
                                                                                </div>

                                                                            </div>
                                                                        </div>
                                                                        <div class="i-tem-check">
                                                                            <label>
                                                                                <input type="radio" id="check-id-20" value="2" name="transfer_rollover" class="transfer_rollover radio radio17" data="17" <?php if(isset($data['content2']['transfer_rollover']) && $data['content2']['transfer_rollover']==2) echo 'checked' ?>>
                                                                                <label for="check-id-20" class="option">
                                                                                    <div class="chec-poa-eb">
                                                                                        <b>Transfer available cash as indicated below</b>
                                                                                    </div>
                                                                                </label>
                                                                            </label>
                                                                        </div>

                                                                        <div class="row div_Transfer" style="margin-left:40px;<?php if(!isset($data['content2']['transfer_rollover']) || (isset($data['content2']['transfer_rollover']) && $data['content2']['transfer_rollover']!=2)) echo 'display:none' ?>">
                                                                            <div class="i-tem-check">
                                                                                <label>
                                                                                    <input type="radio" id="check-id-23" class="radio radio23" data="23" name="Transfer_available" value="All" <?php if(isset($data['content2']['Transfer_available']) && $data['content2']['Transfer_available']=='All') echo 'checked' ?>>
                                                                                    <label for="check-id-23" class="option">
                                                                                        <div class="chec-poa-eb">
                                                                                            All
                                                                                        </div>
                                                                                    </label>
                                                                                </label>
                                                                            </div>
                                                                            <div class="i-tem-check">
                                                                                <label>
                                                                                    <input type="radio" id="check-id-24" class="radio radio23" data="23" name="Transfer_available" value="Dollars" <?php if(!isset($data['content2']['Transfer_available']) || (isset($data['content2']['Transfer_available']) && $data['content2']['Transfer_available']=='Dollars')) echo 'checked' ?>>
                                                                                    <label for="check-id-24" class="option">
                                                                                        <div class="chec-poa-eb">
                                                                                            <div class="row">
                                                                                                <div class="col sqs-col-4 span-4" style="padding-left:0px;">
                                                                                                    <input style="margin-bottom: 10px" name="Transfer_available1" type="text" class="ip-po-ab" value="{{ isset($data['content2']['Transfer_available1'])?$data['content2']['Transfer_available1']:''}}" />
                                                                                                </div>
                                                                                                <span class="col sqs-col-2 span-2" style="padding-top: 7px">Dollars</span>
                                                                                            </div>
                                                                                        </div>
                                                                                    </label>
                                                                                </label>
                                                                            </div>

                                                                        </div>

                                                                        <div class="i-tem-check">
                                                                            <label>
                                                                                <input type="radio" id="check-id-21" value="3" name="transfer_rollover" class="transfer_rollover radio radio17" data="17" <?php if(isset($data['content2']['transfer_rollover']) && $data['content2']['transfer_rollover']==3) echo 'checked' ?>>
                                                                                <label for="check-id-21" class="option">
                                                                                    <div class="chec-poa-eb">
                                                                                        <b>Transfer assets</b>
                                                                                    </div>
                                                                                </label>
                                                                            </label>
                                                                        </div>
                                                                        <div class="row pa-xmg-eppp">
                                                                            <div class="i-tem-check div_Transfer_assets" style="<?php if(!isset($data['content2']['transfer_rollover']) || (isset($data['content2']['transfer_rollover']) && $data['content2']['transfer_rollover']!=3)) echo 'display:none' ?>">
                                                                                <label>
                                                                                    <input type="radio" id="check-id-25" class="radio radio25" data="25" name="Transfer_available" value="All" checked>
                                                                                    <label for="check-id-25" class="option">
                                                                                        <div class="chec-poa-eb">
                                                                                            As Indicated Below
                                                                                        </div>
                                                                                    </label>
                                                                                </label>
                                                                            </div>

                                                                            <div class="Specific_Instructions">
                                                                                <div class="i-tem-check">
                                                                                    <label>
                                                                                        <input type="radio" id="check-id-22" value="4" name="transfer_rollover" class="transfer_rollover radio radio17" data="17" <?php if(!isset($data['content2']['transfer_rollover']) || (isset($data['content2']['transfer_rollover']) && $data['content2']['transfer_rollover']==4)) echo 'checked' ?>>
                                                                                        <label for="check-id-22" class="option">
                                                                                            <div class="chec-poa-eb">
                                                                                                <b>Specific Instructions</b>
                                                                                            </div>
                                                                                        </label>
                                                                                    </label>
                                                                                </div>
                                                                                <div class="i-tem-check">
                                                                                    <div class="">
                                                                                        <div class="col sqs-col-6 span-6">
                                                                                            <div style="padding-left: 25px;">
                                                                                                <input style="width: 80%" name="transfer_rollover_specific" type="text" class="ip-po-ab" value="{{ isset($data['content2']['transfer_rollover_specific'])?$data['content2']['transfer_rollover_specific']:''}}" />
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <?php // for($i=1; $i<=6;$i++){?>
                                                                            <div class="row div_Transfer_assets" style="<?php if(!isset($data['content2']['transfer_rollover']) || (isset($data['content2']['transfer_rollover']) && $data['content2']['transfer_rollover']!=3)) echo 'display:none' ?>">
                                                                                <div class="i-tem-check">
                                                                                    <div class="flip-content">
                                                                                        <div class="row mp-mg-le" style="margin-bottom: 15px;">
                                                                                            <div class="col sqs-col-6 span-6" colspan="2">
                                                                                                &nbsp;
                                                                                            </div>
                                                                                            <div class="col sqs-col-5 span-5">
                                                                                                <div class="row">
                                                                                                    <div class="col sqs-col-6 span-6" colspan="2" style="text-align:center">
                                                                                                        Transfer Option</br>
                                                                                                        (Please select one)
                                                                                                    </div>
                                                                                                    <div class="col sqs-col-6 span-6" colspan="2" style="text-align:center">
                                                                                                        Dividend Option
                                                                                                        </br>(Please select one)
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="row mp-mg-le" style="margin-bottom: 15px;">
                                                                                            <div class="col sqs-col-6 span-6">
                                                                                                <div class="row">
                                                                                                    <div class="col sqs-col-5 span-5">
                                                                                                        #Unit, $ Amit or "All"
                                                                                                    </div>
                                                                                                    <div class="col sqs-col-7 span-7">
                                                                                                        Asset Description
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                                            <div class="col sqs-col-5 span-5">
                                                                                                <div class="row">
                                                                                                    <div class="col sqs-col-3 span-3">
                                                                                                        Liquidate
                                                                                                    </div>
                                                                                                    <div class="col sqs-col-3 span-3">
                                                                                                        In Kind
                                                                                                    </div>
                                                                                                    <div class="col sqs-col-3 span-3">
                                                                                                        Reinvest
                                                                                                    </div>
                                                                                                    <div class="col sqs-col-3 span-3">
                                                                                                        Cash
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                        <?php $dem=25; for($i=1;$i<=6;$i++) { $dem++;?>
                                                                                        <div class="row mp-mg-le">
                                                                                            <div class="col sqs-col-6 span-6">
                                                                                                <div class="row">
                                                                                                    <div class="col sqs-col-5 span-5">
                                                                                                        <label  ><input style="margin-bottom: 10px" name="Unit<?php echo $i?>" type="text" class="ip-po-ab" value="{{ isset($data['content2']['Unit'.$i])?$data['content2']['Unit'.$i]:''}}"  /></label>
                                                                                                    </div>
                                                                                                    <div class="col sqs-col-7 span-7">
                                                                                                        <label  ><input style="margin-bottom: 10px" name="Description<?php echo $i?>" type="text" class="ip-po-ab" value="{{ isset($data['content2']['Description'.$i])?$data['content2']['Description'.$i]:''}}" /></label>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                                            <div class="col sqs-col-5 span-5 mg-ap-qbi">
                                                                                                <div class="row">
                                                                                                    <div class="col sqs-col-6 span-6">
                                                                                                        <div class="row">
                                                                                                            <div class="col sqs-col-6 span-6 pg-bp-qa">

                                                                                                                <input type="radio" id="check-id-<?php echo $i+30?>" class="radio radio<?php echo $i+30?>" data="<?php echo $i+30?>" name="Liquidate<?php echo $i?>" value="1" <?php if(isset($data['content2']['Liquidate'.$i]) && $data['content2']['Liquidate'.$i]==1) echo 'checked' ?>>
                                                                                                                <label for="check-id-<?php echo $i+30?>" class="option"></label>
                                                                                                            </div>
                                                                                                            <div class="col sqs-col-6 span-6">

                                                                                                                <label  >
                                                                                                                    <input type="radio" id="check-id-<?php echo $i+40?>" class="radio radio<?php echo $i+30?>" data="<?php echo $i+30?>" name="Liquidate<?php echo $i?>" value="2" <?php if(isset($data['content2']['Liquidate'.$i]) && $data['content2']['Liquidate'.$i]==2) echo 'checked' ?>>
                                                                                                                    <label for="check-id-<?php echo $i+40?>" class="option"></label>
                                                                                                                </label>
                                                                                                            </div>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                    <div class="col sqs-col-6 span-6">
                                                                                                        <div class="row">
                                                                                                            <div class="col sqs-col-6 span-6">
                                                                                                                <label  >
                                                                                                                    <input type="radio" id="check-id-<?php echo $i+50?>" class="radio radio<?php echo $i+50?>" data="<?php echo $i+50?>" name="Reinvest<?php echo $i?>" value="1" <?php if(isset($data['content2']['Reinvest'.$i]) && $data['content2']['Reinvest'.$i]==1) echo 'checked' ?>>
                                                                                                                    <label for="check-id-<?php echo $i+50?>" class="option"></label>
                                                                                                                </label>
                                                                                                            </div>
                                                                                                            <div class="col sqs-col-6 span-6">
                                                                                                                <label  >
                                                                                                                    <input type="radio" id="check-id-<?php echo $i+60?>" class="radio radio<?php echo $i+50?>" data="<?php echo $i+50?>" name="Reinvest<?php echo $i?>" value="2" <?php if(isset($data['content2']['Reinvest'.$i]) && $data['content2']['Reinvest'.$i]==2) echo 'checked' ?>>
                                                                                                                    <label for="check-id-<?php echo $i+60?>" class="option"></label>
                                                                                                                </label>

                                                                                                            </div>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                        <?php }?>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <?php //} ?>
                                                                        </div>

                                                                    </div>
                                                                </div>
                                                                <hr style="border-bottom: 1px solid #e1e1e1;margin: 30px 0px;"/>
                                                            </div> <!-- End div tranfers1 -->
                                                            <!-- Div tranfers3 -->

                                                            <div class="transfer transfer3" style="<?php if(!isset($data['content2']['transfer']) ||(isset($data['content2']['transfer']) && $data['content2']['transfer']!=3)) echo 'display:none' ?>">
                                                                <label><span class="s">*</span>Indirect Rollover</label>
                                                                <div class="on-check-ful" style="margin-bottom: 0;margin-top: 10px;">
                                                                    <div class="i-tem-check">
                                                                        <label>
                                                                            <input type="radio" id="check-id-80" class="radio radio80" data="80" name="Indirect_Rollover" value="Full" <?php if(isset($data['content2']['Indirect_Rollover']) && $data['content2']['Indirect_Rollover']=='Full') echo 'checked' ?>>
                                                                            <label for="check-id-80" class="option">
                                                                                <div class="chec-poa-eb">
                                                                                    <b>Full</b>
                                                                                </div>
                                                                            </label>
                                                                        </label>
                                                                    </div>
                                                                    <div class="i-tem-check">
                                                                        <label>
                                                                            <input type="radio" id="check-id-81" value="Partial" class="radio radio80" data="80" name="Indirect_Rollover" <?php if(!isset($data['content2']['Indirect_Rollover']) ||(isset($data['content2']['Indirect_Rollover']) && $data['content2']['Indirect_Rollover']=='Partial')) echo 'checked' ?>>
                                                                            <label for="check-id-81" class="option">
                                                                                <div class="chec-poa-eb">
                                                                                    <b>Partial</b>
                                                                                </div>
                                                                            </label>
                                                                        </label>
                                                                    </div>

                                                                </div>
                                                                <hr style="border-bottom: 1px solid #e1e1e1;margin-bottom: 30px;"/>

                                                                <label><span class="s">*</span><span class="small nobold">If you age 70 1/2 or older, was the rollover contribution distributed from an IRA or employer-sponsored retirement plan in the preceding calendar year?</span></label>
                                                                <div class="on-check-ful" style="margin-bottom: 0;margin-top: 10px;">
                                                                    <div class="i-tem-check">
                                                                        <label>
                                                                            <input type="radio" id="check-id-82" class="radio radio82" data="82" name="you_age" value="yes" <?php if(isset($data['content2']['you_age']) && $data['content2']['you_age']=='yes') echo 'checked' ?>>
                                                                            <label for="check-id-82" class="option">
                                                                                <div class="chec-poa-eb title_bold">
                                                                                    Yes
                                                                                </div>
                                                                            </label>
                                                                        </label>
                                                                    </div>
                                                                    <div class="i-tem-check">
                                                                        <label>
                                                                            <input type="radio" id="check-id-83" value="no" class="radio radio82" data="82" name="you_age" <?php if(!isset($data['content2']['you_age']) ||(isset($data['content2']['you_age']) && $data['content2']['you_age']=='no')) echo 'checked' ?>>
                                                                            <label for="check-id-83" class="option">
                                                                                <div class="chec-poa-eb title_bold">
                                                                                    No
                                                                                </div>
                                                                            </label>
                                                                        </label>
                                                                    </div>
                                                                    <div class="i-tem-check">
                                                                        <label>
                                                                            <input type="radio" id="check-id-84" value="NA" class="radio radio82" data="82" name="you_age" <?php if((isset($data['content2']['you_age']) && $data['content2']['you_age']=='NA')) echo 'checked' ?>>
                                                                            <label for="check-id-84" class="option">
                                                                                <div class="chec-poa-eb title_bold">
                                                                                    N/A
                                                                                </div>
                                                                            </label>
                                                                        </label>
                                                                    </div>
                                                                    <span class="small">If <b>Yes</b>, the amount of the rollover contribution must be added to the preceding December 31 balance when calculating the required minimum distribution for the current year for this IRA.</span>
                                                                </div>
                                                                <hr style="border-bottom: 1px solid #e1e1e1;margin-bottom: 30px;"/>

                                                                <label class="label-b"><span class="s">*</span>Complete Option1 or Option 2 and the comfirmation section</label>
                                                                <div class="on-check-ful" style="margin-bottom: 0;margin-top: 10px;">
                                                                    <div class="i-tem-check">
                                                                        <label>
                                                                            <input type="radio" id="check-id-85" class="radio radio85 check_option check_option1" data="85" name="comfirmation" value="Option1" <?php if(isset($data['content2']['comfirmation']) && $data['content2']['comfirmation']=='Option1') echo 'checked' ?>>
                                                                            <label for="check-id-85" class="option">
                                                                                <div class="chec-poa-eb">
                                                                                    <b>Option1: IRA to IRA</b>
                                                                                </div>
                                                                            </label>
                                                                        </label>
                                                                    </div>
                                                                    <!-- Div sub option 1-->
                                                                    <div class="Option Option1" style="<?php if(!isset($data['content2']['comfirmation']) || (isset($data['content2']['comfirmation']) && $data['content2']['comfirmation']=='Option2')) echo 'display:none' ?>">
                                                                        <label class="small">(To be an eligible rollover, all must be answered NO or N/A)</label> </br>
  <span class="span_tb1" style="display: none;">
                                                                <label class="small" style="color:red">Please confirm this is an eligible indirect transfer. Your answers indicate this is not an eligible indirect transfer. Please confirm your answers are correct. Call 1-800-521-9897 if you have questions</label> </br></span>
                                                                        </br>
                                                                        <label class="small">Please indicate the type of IRA from where the Indirect rollover originates</label>
                                                                        <div class="i-tem-check">
                                                                            <label>
                                                                                <input type="radio" id="check-id-88" value="Traditional IRA" class="radio radio88" data="88" name="originates" <?php if(isset($data['content2']['originates']) && $data['content2']['originates']=='Traditional IRA') echo 'checked' ?>>
                                                                                <label for="check-id-88" class="option">
                                                                                    <div class="chec-poa-eb">
                                                                                        <b>Traditional IRA</b>
                                                                                    </div>
                                                                                </label>
                                                                            </label>
                                                                        </div>
                                                                        <div class="i-tem-check">
                                                                            <label>
                                                                                <input type="radio" id="check-id-89" value="Simple IRA" class="radio radio88" data="88" name="originates" <?php if(isset($data['content2']['originates']) && $data['content2']['originates']=='Simple IRA') echo 'checked' ?>>
                                                                                <label for="check-id-89" class="option">
                                                                                    <div class="chec-poa-eb">
                                                                                        <b>Simple IRA</b>
                                                                                    </div>
                                                                                </label>
                                                                            </label>
                                                                        </div>
                                                                        <label class="small"><b>1.Timeliness - 60 Days</b></label></br>
                                                                        <label class="small">Have more than 60 days elapsed since you received the distribution from the distributing IRA?</label>
                                                                        <div class="i-tem-check">
                                                                            <label>
                                                                                <input type="radio" id="check-id-90" value="Yes" class="radio radio90 radio_option11" data="90" name="Timeliness" <?php if(isset($data['content2']['Timeliness']) && $data['content2']['Timeliness']=='Yes') echo 'checked' ?>>
                                                                                <label for="check-id-90" class="option">
                                                                                    <div class="chec-poa-eb title_bold">
                                                                                        Yes
                                                                                    </div>
                                                                                </label>
                                                                            </label>
                                                                        </div>
                                                                        <div class="i-tem-check">
                                                                            <label>
                                                                                <input type="radio" id="check-id-91" value="No" class="radio radio90 radio_option11" data="90" name="Timeliness" <?php if(!isset($data['content2']['Timeliness']) || (isset($data['content2']['Timeliness']) && $data['content2']['Timeliness']=='No')) echo 'checked' ?>>
                                                                                <label for="check-id-91" class="option">
                                                                                    <div class="chec-poa-eb title_bold">
                                                                                        No
                                                                                    </div>
                                                                                </label>
                                                                            </label>
                                                                        </div>

                                                                        <label class="small"><b>2.RMD Rollover Restriction</b></label></br>
                                                                        <label class="small">Does the rollover contribution contain any required distribution amounts?</label>
                                                                        <div class="i-tem-check">
                                                                            <label>
                                                                                <input type="radio" id="check-id-92" value="Yes" class="radio radio92 radio_option12" data="92" name="Restriction" <?php if(isset($data['content2']['Restriction']) && $data['content2']['Restriction']=='Yes') echo 'checked' ?>>
                                                                                <label for="check-id-92" class="option">
                                                                                    <div class="chec-poa-eb title_bold">
                                                                                        Yes
                                                                                    </div>
                                                                                </label>
                                                                            </label>
                                                                        </div>
                                                                        <div class="i-tem-check">
                                                                            <label>
                                                                                <input type="radio" id="check-id-93" value="No" class="radio radio92 radio_option12" data="92" name="Restriction" <?php if(!isset($data['content2']['Restriction']) || (isset($data['content2']['Restriction']) && $data['content2']['Restriction']=='No')) echo 'checked' ?>>
                                                                                <label for="check-id-93" class="option">
                                                                                    <div class="chec-poa-eb title_bold">
                                                                                        No
                                                                                    </div>
                                                                                </label>
                                                                            </label>
                                                                        </div>

                                                                        <label class="small"><b>3.Twelve Month Restriction</b></label></br>
                                                                        <label class="small">Did you receive any other distribution from any IRA during the preceding 12 months which you also rolled over?</label>
                                                                        <div class="i-tem-check">
                                                                            <label>
                                                                                <input type="radio" id="check-id-94" value="Yes" class="radio radio94 radio_option13" data="94" name="distribution" <?php if(isset($data['content2']['distribution']) && $data['content2']['distribution']=='Yes') echo 'checked' ?>>
                                                                                <label for="check-id-94" class="option">
                                                                                    <div class="chec-poa-eb title_bold">
                                                                                        Yes
                                                                                    </div>
                                                                                </label>
                                                                            </label>
                                                                        </div>
                                                                        <div class="i-tem-check">
                                                                            <label>
                                                                                <input type="radio" id="check-id-95" value="No" class="radio radio94 radio_option13" data="94" name="distribution" <?php if(!isset($data['content2']['distribution']) || (isset($data['content2']['distribution']) && $data['content2']['distribution']=='No')) echo 'checked' ?>>
                                                                                <label for="check-id-95" class="option">
                                                                                    <div class="chec-poa-eb title_bold">
                                                                                        No
                                                                                    </div>
                                                                                </label>
                                                                            </label>
                                                                        </div>
                                                                        <label class="small"><b>4.Simple IRA Rollover Restriction</b></label></br>
                                                                        <label class="small">If a SIMPLE IRA is being rolled to a Traditional IRA, did you first begin participating in your employer's SIMPLE salary reduction arrandement less than two years ago?</label>
                                                                        <div class="i-tem-check">
                                                                            <label>
                                                                                <input type="radio" id="check-id-96" value="Yes" class="radio radio96 radio_option14" data="96" name="Simple_IRA_Rollover" <?php if(isset($data['content2']['Simple_IRA_Rollover']) && $data['content2']['Simple_IRA_Rollover']=='Yes') echo 'checked' ?>>
                                                                                <label for="check-id-96" class="option">
                                                                                    <div class="chec-poa-eb title_bold">
                                                                                        Yes
                                                                                    </div>
                                                                                </label>
                                                                            </label>
                                                                        </div>
                                                                        <div class="i-tem-check">
                                                                            <label>
                                                                                <input type="radio" id="check-id-97" value="No" class="radio radio96 radio_option14" data="96" name="Simple_IRA_Rollover" <?php if(!isset($data['content2']['Simple_IRA_Rollover']) || (isset($data['content2']['Simple_IRA_Rollover']) && $data['content2']['Simple_IRA_Rollover']=='No')) echo 'checked' ?>>
                                                                                <label for="check-id-97" class="option">
                                                                                    <div class="chec-poa-eb title_bold">
                                                                                        No
                                                                                    </div>
                                                                                </label>
                                                                            </label>
                                                                        </div>
                                                                    </div>
                                                                    <!-- End Div sub option 1-->
                                                                    <div class="i-tem-check">
                                                                        <label>
                                                                            <input type="radio" id="check-id-86" value="Option2" class="radio radio85 check_option check_option2" data="85" name="comfirmation" <?php if(isset($data['content2']['comfirmation']) && $data['content2']['comfirmation']=='Option2') echo 'checked' ?>>
                                                                            <label for="check-id-86" class="option">
                                                                                <div class="chec-poa-eb">
                                                                                    <b> Option2: Employer-Sponsored Retirement Plan to IRA</b>
                                                                                </div>
                                                                            </label>
                                                                        </label>
                                                                    </div>
                                                                    <!-- End Div sub option 2-->
                                                                    <div class="Option Option2" style="<?php if(!isset($data['content2']['comfirmation']) || (isset($data['content2']['comfirmation']) && $data['content2']['comfirmation']=='Option1')) echo 'display:none' ?>">
                                                                        <label class="small"><b>1.Eligible Preson</b> (Please select one)</label></br>
                                                                        <label class="small">Your status in the plan from which you received the funds or property intended for rollover in as follows</label>
                                                                        <div class="i-tem-check">
                                                                            <label>
                                                                                <input type="radio" id="check-id-98" value="Plan Participant" class="radio radio98" data="98" name="Eligible_Preson" <?php if(isset($data['content2']['Eligible_Preson']) && $data['content2']['Eligible_Preson']=='Plan Participant') echo 'checked' ?>>
                                                                                <label for="check-id-98" class="option">
                                                                                    <div class="chec-poa-eb">
                                                                                        <b>Plan Participant</b>
                                                                                    </div>
                                                                                </label>
                                                                            </label>
                                                                        </div>
                                                                        <div class="i-tem-check">
                                                                            <label>
                                                                                <input type="radio" id="check-id-99" value="Surviving Spouse Beneficiary" class="radio radio98" data="98" name="Eligible_Preson" <?php if(!isset($data['content2']['Eligible_Preson']) || (isset($data['content2']['Eligible_Preson']) && $data['content2']['Eligible_Preson']=='Surviving Spouse Beneficiary')) echo 'checked' ?>>
                                                                                <label for="check-id-99" class="option">
                                                                                    <div class="chec-poa-eb">
                                                                                        <b>Surviving Spouse Beneficiary</b>
                                                                                    </div>
                                                                                </label>
                                                                            </label>
                                                                        </div>
                                                                        <div class="i-tem-check">
                                                                            <label>
                                                                                <input type="radio" id="check-id-100" value="Alternate Payee of Qualified Domestic Ralations Order" class="radio radio98" data="98" name="Eligible_Preson" <?php if(isset($data['content2']['Eligible_Preson']) && $data['content2']['Eligible_Preson']=='Alternate Payee of Qualified Domestic Ralations Order') echo 'checked' ?>>
                                                                                <label for="check-id-100" class="option">
                                                                                    <div class="chec-poa-eb">
                                                                                        <b>Alternate Payee of Qualified Domestic Ralations Order</b>
                                                                                    </div>
                                                                                </label>
                                                                            </label>
                                                                        </div>

                                                                        <label class="small"><b>2.Eligible Plan </b>(Please select one)</label></br>
                                                                        <label class="small">You received the distribution you are rolling over from the following type of plan</label>
                                                                        <div class="i-tem-check">
                                                                            <label>
                                                                                <input type="radio" id="check-id-101" value="Qualified Retirement Plan (IRC See 401(A))" class="radio radio101" data="101" name="Eligible_Plan" <?php if(isset($data['content2']['Eligible_Plan']) && $data['content2']['Eligible_Plan']=='Qualified Retirement Plan (IRC See 401(A))') echo 'checked' ?>>
                                                                                <label for="check-id-101" class="option">
                                                                                    <div class="chec-poa-eb">
                                                                                        <b>Qualified Retirement Plan (IRC See 401(A))</b>
                                                                                    </div>
                                                                                </label>
                                                                            </label>
                                                                        </div>
                                                                        <div class="i-tem-check">
                                                                            <label>
                                                                                <input type="radio" id="check-id-102" value="Tax-Sheltered Annuity plan (IRC See 403(B))" class="radio radio101" data="101" name="Eligible_Plan" <?php if(isset($data['content2']['Eligible_Plan']) && $data['content2']['Eligible_Plan']=='Tax-Sheltered Annuity plan (IRC See 403(B))') echo 'checked' ?>>
                                                                                <label for="check-id-102" class="option">
                                                                                    <div class="chec-poa-eb">
                                                                                        <b>Tax-Sheltered Annuity plan (IRC See 403(B))</b>
                                                                                    </div>
                                                                                </label>
                                                                            </label>
                                                                        </div>
                                                                        <div class="i-tem-check">
                                                                            <label>
                                                                                <input type="radio" id="check-id-103" value="Annuity Plan (IRC See 403(A))" class="radio radio101" data="101" name="Eligible_Plan" <?php if(isset($data['content2']['Eligible_Plan']) && $data['content2']['Eligible_Plan']=='Annuity Plan (IRC See 403(A))') echo 'checked' ?>>
                                                                                <label for="check-id-103" class="option">
                                                                                    <div class="chec-poa-eb">
                                                                                        <b>Annuity Plan (IRC See 403(A))</b>
                                                                                    </div>
                                                                                </label>
                                                                            </label>
                                                                        </div>
                                                                        <div class="i-tem-check">
                                                                            <label>
                                                                                <input type="radio" id="check-id-104" value="Deferred Compensation Plan (IRC See 401(B)) maintained by a governmental employer." class="radio radio101" data="101" name="Eligible_Plan" <?php if(!isset($data['content2']['Eligible_Plan']) || (isset($data['content2']['Eligible_Plan']) && $data['content2']['Eligible_Plan']=='Deferred Compensation Plan (IRC See 401(B)) maintained by a governmental employer.')) echo 'checked' ?>>
                                                                                <label for="check-id-104" class="option">
                                                                                    <div class="chec-poa-eb">
                                                                                        <b>Deferred Compensation Plan (IRC See 401(B)) maintained by a governmental employer.</b>
                                                                                    </div>
                                                                                </label>
                                                                            </label>
                                                                        </div>


                                                                        <label class="small"><b>3.Eligible Rollover Deposit </b>(To be an eligible rollover, all must be answered NO.)</label></br>
                                                                <span class="span_tb2" style="display: none;">
                                                                <label class="small" style="color:red">Please confirm this is an eligible indirect transfer. Your answers indicate this is not an eligible indirect transfer. Please confirm your answers are correct. Call 1-800-521-9897 if you have questions</label> </br></span>
                                                                        <label class="small">You received the distribution you are rolling over from the following type of plan</label></br>
                                                                        <label class="small">Does the rollover contribution contain any amounts which constitule a required minimum distribution?</label>
                                                                        <div class="i-tem-check">
                                                                            <label>
                                                                                <input type="radio" id="check-id-105" value="Yes" class="radio radio105 radio_option21" data="105" name="minimum_distribution" <?php if(isset($data['content2']['minimum_distribution']) && $data['content2']['minimum_distribution']=='Yes') echo 'checked' ?>>
                                                                                <label for="check-id-105" class="option">
                                                                                    <div class="chec-poa-eb">
                                                                                        Yes
                                                                                    </div>
                                                                                </label>
                                                                            </label>
                                                                        </div>
                                                                        <div class="i-tem-check">
                                                                            <label>
                                                                                <input type="radio" id="check-id-106" value="No" class="radio radio105 radio_option21" data="105" name="minimum_distribution" <?php if(!isset($data['content2']['minimum_distribution']) || (isset($data['content2']['minimum_distribution']) && $data['content2']['minimum_distribution']=='No')) echo 'checked' ?>>
                                                                                <label for="check-id-106" class="option">
                                                                                    <div class="chec-poa-eb">
                                                                                        No
                                                                                    </div>
                                                                                </label>
                                                                            </label>
                                                                        </div>
                                                                        <label class="small">Is the distribution which is veing rolled over part of a series of substantially equal periodic payments?</label>
                                                                        <div class="i-tem-check">
                                                                            <label>
                                                                                <input type="radio" id="check-id-107" value="Yes" class="radio radio107 radio_option22" data="107" name="periodic_payments" <?php if(isset($data['content2']['periodic_payments']) && $data['content2']['periodic_payments']=='Yes') echo 'checked' ?>>
                                                                                <label for="check-id-107" class="option">
                                                                                    <div class="chec-poa-eb">
                                                                                        Yes
                                                                                    </div>
                                                                                </label>
                                                                            </label>
                                                                        </div>
                                                                        <div class="i-tem-check">
                                                                            <label>
                                                                                <input type="radio" id="check-id-108" value="No" class="radio radio107 radio_option22" data="107" name="periodic_payments" <?php if(!isset($data['content2']['periodic_payments']) || (isset($data['content2']['periodic_payments']) && $data['content2']['periodic_payments']=='No')) echo 'checked' ?>>
                                                                                <label for="check-id-108" class="option">
                                                                                    <div class="chec-poa-eb">
                                                                                        No
                                                                                    </div>
                                                                                </label>
                                                                            </label>
                                                                        </div>

                                                                        <label class="small">Does the rollover contribution contain any amounts which are eligible for the death benefit exclusion (i.e., death before August 21, 1996)?</label>
                                                                        <div class="i-tem-check">
                                                                            <label>
                                                                                <input type="radio" id="check-id-111" value="Yes" class="radio radio111 radio_option23" data="111" name="benefit" <?php if(isset($data['content2']['benefit']) && $data['content2']['benefit']=='Yes') echo 'checked' ?>>
                                                                                <label for="check-id-111" class="option">
                                                                                    <div class="chec-poa-eb">
                                                                                        Yes
                                                                                    </div>
                                                                                </label>
                                                                            </label>
                                                                        </div>
                                                                        <div class="i-tem-check">
                                                                            <label>
                                                                                <input type="radio" id="check-id-112" value="No" class="radio radio111 radio_option23" data="111" name="benefit" <?php if(!isset($data['content2']['benefit']) || (isset($data['content2']['benefit']) && $data['content2']['benefit']=='No')) echo 'checked' ?>>
                                                                                <label for="check-id-112" class="option">
                                                                                    <div class="chec-poa-eb">
                                                                                        No
                                                                                    </div>
                                                                                </label>
                                                                            </label>
                                                                        </div>

                                                                        <label class="small">Does the rollover contribution contain any nontaxable amounts attributable to the purchase of life insurance under the distributing plan (i.i,P.S. 58 costs)?</label>
                                                                        <div class="i-tem-check">
                                                                            <label>
                                                                                <input type="radio" id="check-id-109" value="Yes" class="radio radio109 radio_option24" data="109" name="nontaxable" <?php if(isset($data['content2']['nontaxable']) && $data['content2']['nontaxable']=='Yes') echo 'checked' ?>>
                                                                                <label for="check-id-109" class="option">
                                                                                    <div class="chec-poa-eb">
                                                                                        Yes
                                                                                    </div>
                                                                                </label>
                                                                            </label>
                                                                        </div>
                                                                        <div class="i-tem-check">
                                                                            <label>
                                                                                <input type="radio" id="check-id-110" value="No" class="radio radio109 radio_option24" data="109" name="nontaxable" <?php if(!isset($data['content2']['nontaxable']) || (isset($data['content2']['nontaxable']) && $data['content2']['nontaxable']=='No')) echo 'checked' ?>>
                                                                                <label for="check-id-110" class="option">
                                                                                    <div class="chec-poa-eb">
                                                                                        No
                                                                                    </div>
                                                                                </label>
                                                                            </label>
                                                                        </div>

                                                                        <label class="small">Does the rollover contribution include any funds or property other than the funds or property you ceceived from he distributing plan (and/or proceeds from the sale of distributed property)?</label>
                                                                        <div class="i-tem-check">
                                                                            <label>
                                                                                <input type="radio" id="check-id-113" value="Yes" class="radio radio113 radio_option25" data="113" name="funds" <?php if(isset($data['content2']['funds']) && $data['content2']['funds']=='Yes') echo 'checked' ?>>
                                                                                <label for="check-id-113" class="option">
                                                                                    <div class="chec-poa-eb">
                                                                                        Yes
                                                                                    </div>
                                                                                </label>
                                                                            </label>
                                                                        </div>
                                                                        <div class="i-tem-check">
                                                                            <label>
                                                                                <input type="radio" id="check-id-114" value="No" class="radio radio113 radio_option25" data="113" name="funds" <?php if(!isset($data['content2']['nontaxable']) || (isset($data['content2']['nontaxable']) && $data['content2']['nontaxable']=='No')) echo 'checked' ?>>
                                                                                <label for="check-id-114" class="option">
                                                                                    <div class="chec-poa-eb">
                                                                                        No
                                                                                    </div>
                                                                                </label>
                                                                            </label>
                                                                        </div>

                                                                        <label class="small">Does the rollover contribution include any amounts which constitute a distribution due to hardship?</label>
                                                                        <div class="i-tem-check">
                                                                            <label>
                                                                                <input type="radio" id="check-id-115" value="Yes" class="radio radio115 radio_option26" data="115" name="hardship" <?php if(isset($data['content2']['hardship']) && $data['content2']['hardship']=='Yes') echo 'checked' ?>>
                                                                                <label for="check-id-115" class="option">
                                                                                    <div class="chec-poa-eb">
                                                                                        Yes
                                                                                    </div>
                                                                                </label>
                                                                            </label>
                                                                        </div>
                                                                        <div class="i-tem-check">
                                                                            <label>
                                                                                <input type="radio" id="check-id-116" value="No" class="radio radio115 radio_option26" data="115" name="hardship" <?php if(!isset($data['content2']['hardship']) || (isset($data['content2']['hardship']) && $data['content2']['hardship']=='No')) echo 'checked' ?>>
                                                                                <label for="check-id-116" class="option">
                                                                                    <div class="chec-poa-eb">
                                                                                        No
                                                                                    </div>
                                                                                </label>
                                                                            </label>
                                                                        </div>

                                                                        <label class="small"><b>4.Timeliness </b></label></br>
                                                                        <label class="small">Have more than 60 days elapsed since you received the distribution from the distributing plan?</label>
                                                                        <div class="i-tem-check">
                                                                            <label>
                                                                                <input type="radio" id="check-id-117" value="Yes" class="radio radio117" data="117" name="distributing_plan" <?php if(isset($data['content2']['distributing_plan']) && $data['content2']['distributing_plan']=='Yes') echo 'checked' ?>>
                                                                                <label for="check-id-117" class="option">
                                                                                    <div class="chec-poa-eb">
                                                                                        Yes
                                                                                    </div>
                                                                                </label>
                                                                            </label>
                                                                        </div>
                                                                        <div class="i-tem-check">
                                                                            <label>
                                                                                <input type="radio" id="check-id-118" value="No" class="radio radio117" data="117" name="distributing_plan" <?php if(!isset($data['content2']['distributing_plan']) || (isset($data['content2']['distributing_plan']) && $data['content2']['distributing_plan']=='No')) echo 'checked' ?>>
                                                                                <label for="check-id-118" class="option">
                                                                                    <div class="chec-poa-eb">
                                                                                        No
                                                                                    </div>
                                                                                </label>
                                                                            </label>
                                                                        </div>

                                                                    </div><!-- End Div sub option 2-->

                                                                </div>
                                                                <hr style="border-bottom: 1px solid #e1e1e1;margin-bottom: 30px;"/>
                                                                <label class="label-b"><span class="s">*</span>Confirmation</label>
                                                                <div class="on-check-ful" style="margin-bottom: 0;margin-top: 10px;">
                                                                    <div class="i-tem-check">
                                                                        <label>
                                                                            <input type="checkbox" id="check-id-234" name="comfirmation1" value="comfirmation1" checked>
                                                                            <label for="check-id-234" class="option">
                                                                                <div class="chec-poa-eb">
                                                                                    I have read and understand the rollover rules and conditions stated in the section and i have met the requirements for making a rollover. Due to the important tax consequences of rolling over funds or property to an IRA. I have been and advised to see a tax professional. All information provided by me is true and correct and may be relied on by the Trustee or Custodian. I assume full responsibility for this rollover transaction and will no hold the Trustee or Custodian liable for any adverse consequences that may result. I hereby irrevocably desgnate this contribution of amount in dollars (Stated below) in cash and/or property as a rollover contribution.
                                                                                </div>
                                                                            </label>
                                                                        </label>
                                                                    </div>


                                                                    <div class="row">
                                                                        <div class="col sqs-col-4 span-4" style="margin-left: 40px;">
                                                                            <label class="title_bold"><span class="s">*</span>Amount of Contribution $</label>
                                                                        </div>

                                                                    </div>
                                                                    <div class="row">
                                                                        <div class="col sqs-col-4 span-4">
                                                                            <input  style="margin-left: 40px;margin-bottom: 10px" name="Amount_Contribution" type="text" class="ip-po-ab validation <?php if(!isset($data['content2']['transfer']) ||(isset($data['content2']['transfer']) && $data['content2']['transfer']!=3)) echo 'ignore' ?>" value="{{ isset($data['content2']['Amount_Contribution'])?$data['content2']['Amount_Contribution']:''}}" />
                                                                        </div>

                                                                    </div>
                                                                </div>
                                                                <hr style="border-bottom: 1px solid #e1e1e1;margin-bottom: 30px;"/>
                                                            </div>
                                                            <!-- End div tranfers3 -->
                                                            <!-- Div tranfers4 -->
                                                            <div class="transfer transfer4 wap-im-proce on-check-ful" style="<?php if(!isset($data['content2']['transfer']) ||(isset($data['content2']['transfer']) && $data['content2']['transfer']!=4)) echo 'display:none' ?>">
                                                                <label class="label_title"><span class="s">*</span>Recharacterization</label>
                                                                <label>Current IRA Trustee/Custodian</label>
                                                                <div class="row">
                                                                    <div class="col sqs-col-7 span-7">
                                                                        <input placeholder="Name" name="Recharacterization_name" type="text" class="ip-po-ab validation <?php if(!isset($data['content2']['transfer']) ||(isset($data['content2']['transfer']) && $data['content2']['transfer']!=4)) echo 'ignore' ?>" value="{{ isset($data['content2']['Recharacterization_name'])?$data['content2']['Recharacterization_name']:''}}" />
                                                                    </div>


                                                                </div>
                                                                <label><b>Address</b></label>

                                                                <div class="row">
                                                                    <div class="col sqs-col-7 span-7">
                                                                        <input placeholder="Address Line 1" name="Recharacterization_address" type="text" class="ip-po-ab validation <?php if(!isset($data['content2']['transfer']) ||(isset($data['content2']['transfer']) && $data['content2']['transfer']!=4)) echo 'ignore' ?>" value="{{ isset($data['content2']['Recharacterization_address'])?$data['content2']['Recharacterization_address']:''}}" />
                                                                    </div>

                                                                </div>
                                                                <div class="row">
                                                                    <div class="col sqs-col-7 span-7">
                                                                        <input placeholder="Address Line 2 (optional)" name="Recharacterization_address2" type="text" class="ip-po-ab" value="{{ isset($data['content2']['Recharacterization_address2'])?$data['content2']['Recharacterization_address2']:''}}" />
                                                                    </div>

                                                                </div>
                                                                <div class="row">
                                                                    <div class="col sqs-col-6 span-6">
                                                                        <input placeholder="City" type="text" name="Recharacterization_city" class="ip-po-ab validation <?php if(!isset($data['content2']['transfer']) ||(isset($data['content2']['transfer']) && $data['content2']['transfer']!=4)) echo 'ignore' ?>" value="{{ isset($data['content2']['Recharacterization_city'])?$data['content2']['Recharacterization_city']:''}}" />
                                                                    </div>
                                                                    <div class="col sqs-col-6 span-6">
                                                                        <input placeholder="State/Province" name="Recharacterization_state" type="text" class="ip-po-ab validation <?php if(!isset($data['content2']['transfer']) ||(isset($data['content2']['transfer']) && $data['content2']['transfer']!=4)) echo 'ignore' ?>" value="{{ isset($data['content2']['Recharacterization_state'])?$data['content2']['Recharacterization_state']:''}}" />
                                                                    </div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="col sqs-col-6 span-6">
                                                                        <input placeholder="Zip/Postal Code" name="Recharacterization_zip" type="text" class="ip-po-ab validation <?php if(!isset($data['content2']['transfer']) ||(isset($data['content2']['transfer']) && $data['content2']['transfer']!=4)) echo 'ignore' ?>" value="{{ isset($data['content2']['Recharacterization_zip'])?$data['content2']['Recharacterization_zip']:''}}" />
                                                                    </div>
                                                                    <div class="col sqs-col-6 span-6">
                                                                        <input placeholder="Country" name="Recharacterization_country"  type="text" class="ip-po-ab validation <?php if(!isset($data['content2']['transfer']) ||(isset($data['content2']['transfer']) && $data['content2']['transfer']!=4)) echo 'ignore' ?>" value="{{ isset($data['content2']['Recharacterization_country'])?$data['content2']['Recharacterization_country']:''}}" />
                                                                    </div>
                                                                </div>
                                                                <hr style="border-bottom: 1px solid #e1e1e1;margin-bottom: 30px;"/>

                                                                <label><span class="s">*</span><b>IRA Account Identification (Current IRA)</b></label>

                                                                <div class="row">
                                                                    <div class="col sqs-col-7 span-7">
                                                                        <input placeholder="Account Identification Number" name="Account_Identification_Number" type="text" class="ip-po-ab validation <?php if(!isset($data['content2']['transfer']) ||(isset($data['content2']['transfer']) && $data['content2']['transfer']!=4)) echo 'ignore' ?>" value="{{ isset($data['content2']['Account_Identification_Number'])?$data['content2']['Account_Identification_Number']:''}}" />
                                                                    </div>

                                                                </div>
                                                                <label><span class="s">*</span><b>Trustee's or Custodian's Phone Number</b></label>

                                                                <div class="row">
                                                                    <div class="col sqs-col-7 span-7">
                                                                        <input placeholder="Phone Number" name="Custodian_Phone_Number" type="text" class="ip-po-ab validation <?php if(!isset($data['content2']['transfer']) ||(isset($data['content2']['transfer']) && $data['content2']['transfer']!=4)) echo 'ignore' ?>" value="{{ isset($data['content2']['Custodian_Phone_Number'])?$data['content2']['Custodian_Phone_Number']:''}}" />
                                                                    </div>

                                                                </div>
                                                                <hr style="border-bottom: 1px solid #e1e1e1;margin-bottom: 30px;"/>
                                                                <label><span class="s">*</span><b>Type of Contribution (Current IRA)</b></label>
                                                                <label><b>Traditional IRA</b></label>
                                                                <div class="i-tem-check">
                                                                    <label>
                                                                        <input type="radio" id="check-id-119" value="Regular or Spousal" class="radio radio119 " data="119" name="Regular_or_Spousal" <?php if(!isset($data['content2']['Regular_or_Spousal']) || (isset($data['content2']['Regular_or_Spousal']) && $data['content2']['Regular_or_Spousal']=='Regular or Spousal')) echo 'checked' ?>>
                                                                        <label for="check-id-119" class="option">
                                                                            <div class="chec-poa-eb">
                                                                                <b>Regular or Spousal</b>
                                                                            </div>
                                                                        </label>
                                                                    </label>
                                                                </div>
                                                                <label><b>Roth IRA</b></label>
                                                                <div class="i-tem-check">
                                                                    <label>
                                                                        <input type="radio" id="check-id-120" value="Regular or Spousal" class="radio radio119" data="119" name="Roth_IRA" <?php if((isset($data['content2']['Roth_IRA']) && $data['content2']['Roth_IRA']=='Regular or Spousal')) echo 'checked' ?>>
                                                                        <label for="check-id-120" class="option">
                                                                            <div class="chec-poa-eb">
                                                                                <b>Regular or Spousal</b>
                                                                            </div>
                                                                        </label>
                                                                    </label>
                                                                </div>
                                                                <div class="i-tem-check">
                                                                    <label>
                                                                        <input type="radio" id="check-id-121" value="Conversion (from Traditional IRA)" class="radio radio119" data="119" name="Roth_IRA" <?php if((isset($data['content2']['Roth_IRA']) && $data['content2']['Roth_IRA']=='Conversion (from Traditional IRA)')) echo 'checked' ?>>
                                                                        <label for="check-id-121" class="option">
                                                                            <div class="chec-poa-eb">
                                                                                <b>Conversion (from Traditional IRA)</b>
                                                                            </div>
                                                                        </label>
                                                                    </label>
                                                                </div>

                                                                <div class="i-tem-check">
                                                                    <label>
                                                                        <input type="radio" id="check-id-122" value="Conversion (from Simple IRA)" class="radio radio119" data="119" name="Roth_IRA" <?php if((isset($data['content2']['Roth_IRA']) && $data['content2']['Roth_IRA']=='Conversion (from Simple IRA)')) echo 'checked' ?>>
                                                                        <label for="check-id-122" class="option">
                                                                            <div class="chec-poa-eb">
                                                                                <b>Conversion (from Simple IRA)</b>
                                                                            </div>
                                                                        </label>
                                                                    </label>
                                                                </div>

                                                                <hr style="border-bottom: 1px solid #e1e1e1;margin-bottom: 30px;"/>
                                                                <div class="wap-im-proce">
                                                                    <label><span class="s">*</span>Contribution/Conversion Date(Current IRA)</label> </br>
                                                                    <span>(mm/dd/yyyy)</span>
                                                                    <div class="row">
                                                                        <div class="col sqs-col-2 span-2">
                                                                            <input type="text" class="ip-po-ab validation <?php if(!isset($data['content2']['transfer']) ||(isset($data['content2']['transfer']) && $data['content2']['transfer']!=4)) echo 'ignore' ?>" maxlength="2" name="Conversion_month" value="{{ isset($data['content2']['Conversion_month'])?$data['content2']['Conversion_month']:''}}" />
                                                                        </div>
                                                                        <div class="col sqs-col-2 span-2">
                                                                            <input type="text" class="ip-po-ab validation <?php if(!isset($data['content2']['transfer']) ||(isset($data['content2']['transfer']) && $data['content2']['transfer']!=4)) echo 'ignore' ?>" maxlength="2" name="Conversion_Date" value="{{ isset($data['content2']['Conversion_Date'])?$data['content2']['Conversion_Date']:''}}" />
                                                                        </div>

                                                                        <div class="col sqs-col-3 span-3">
                                                                            <input type="text" class="ip-po-ab validation <?php if(!isset($data['content2']['transfer']) ||(isset($data['content2']['transfer']) && $data['content2']['transfer']!=4)) echo 'ignore' ?>"  maxlength="4" name="Conversion_year" value="{{ isset($data['content2']['Conversion_year'])?$data['content2']['Conversion_year']:''}}"/>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="wap-im-proce">
                                                                    <label><span class="s">*</span>Contribution For Tax Year (Current IRA)</label> </br>
                                                                    <span><i>Only application for reqular or spousal contributions</i></span>
                                                                    <div class="row">
                                                                        <div class="col sqs-col-2 span-2">
                                                                            <input type="text" class="ip-po-ab validation <?php if(!isset($data['content2']['transfer']) ||(isset($data['content2']['transfer']) && $data['content2']['transfer']!=4)) echo 'ignore' ?>" maxlength="4" name="Tax_Year" value="{{ isset($data['content2']['Tax_Year'])?$data['content2']['Tax_Year']:''}}" />
                                                                        </div>

                                                                    </div>
                                                                </div>

                                                                <div class="wap-im-proce">
                                                                    <label><span class="s">*</span>Recharacterization Instructions</label> </br>
                                                                    <span>Recharaterize the contribution/conversion amount of $</span>
                                                                    <div class="row">
                                                                        <div class="col sqs-col-4 span-4">
                                                                            <input type="text" class="ip-po-ab validation <?php if(!isset($data['content2']['transfer']) ||(isset($data['content2']['transfer']) && $data['content2']['transfer']!=4)) echo 'ignore' ?>"  name="Recharacterization_Instructions" value="{{ isset($data['content2']['Recharacterization_Instructions'])?$data['content2']['Recharacterization_Instructions']:''}}" />
                                                                        </div>

                                                                    </div>
                                                                    <span>Mainstart Trust will calculate the earnings or loss atributable to the contribution/conversion.</span> </br>
                                                                    <span>Total value to be recharacterized $.</span>
                                                                    <div class="row">
                                                                        <div class="col sqs-col-4 span-4">
                                                                            <input type="text" class="ip-po-ab"  name="calculate" value="{{ isset($data['content2']['calculate'])?$data['content2']['calculate']:''}}" />
                                                                        </div>

                                                                    </div>

                                                                </div>


                                                                <div class="wap-im-proce">
                                                                    <label>This recharacterization amount should be placed in a.</label>
                                                                    <div class="i-tem-check">
                                                                        <label>
                                                                            <input type="radio" id="check-id-123" value="Traditional IRA" class="radio radio123" data="123" name="recharacterization_amount" <?php if((isset($data['content2']['recharacterization_amount']) && $data['content2']['recharacterization_amount']=='Traditional IRA')) echo 'checked' ?>>
                                                                            <label for="check-id-123" class="option">
                                                                                <div class="chec-poa-eb title_bold">
                                                                                    Traditional IRA
                                                                                </div>
                                                                            </label>
                                                                        </label>
                                                                    </div>

                                                                    <div class="i-tem-check">
                                                                        <label>
                                                                            <input type="radio" id="check-id-124" value=" Roth IRA" class="radio radio123" data="123" name="recharacterization_amount" <?php if((isset($data['content2']['recharacterization_amount']) && $data['content2']['recharacterization_amount']==' Roth IRA')) echo 'checked' ?>>
                                                                            <label for="check-id-124" class="option">
                                                                                <div class="chec-poa-eb title_bold">
                                                                                    Roth IRA
                                                                                </div>
                                                                            </label>
                                                                        </label>
                                                                    </div>
                                                                    <span><b>Caution: </b> You may not deposit the funds into an existing Roth Conversion IRA which contains conversion contributions made during another calendar year. In addition, limits apply to the number of reconversions which can be made for tax purposes</span> </br>

                                                                </div>
                                                                <hr style="border-bottom: 1px solid #e1e1e1;margin-bottom: 30px;"/>

                                                                <div class="wap-im-proce">
                                                                    <label class="title_bold"><span class="s">*</span>Asset Liquidation Instructions.</label>
                                                                    <div class="i-tem-check">

                                                                        <div class="row">
                                                                            <div class="col sqs-col-4 span-4 title_bold">
                                                                                Asset Description
                                                                            </div>
                                                                            <div class="col sqs-col-2 span-2 title_bold">
                                                                                Quantily In</br>
                                                                                Current IRA
                                                                            </div>
                                                                            <div class="col sqs-col-2 span-2 title_bold">
                                                                                Quantily To Be</br>
                                                                                Recharaterized
                                                                            </div>
                                                                            <div class="col sqs-col-2 span-2 title_bold">
                                                                                Liquidate</br>
                                                                                Immediately
                                                                            </div>
                                                                            <div class="col sqs-col-2 span-2 title_bold">
                                                                                Recharaterized</br>
                                                                                In Kind
                                                                            </div>

                                                                        </div>

                                                                        <?php $dem=125; for($i=1;$i<=6;$i++) { $dem = $dem+2;;?>

                                                                        <div class="row">
                                                                            <div class="col sqs-col-4 span-4">
                                                                                <label  ><input style="margin-bottom: 10px" name="Asset_Description<?php echo $i?>" type="text" class="ip-po-ab" value="{{ isset($data['content2']['Asset_Description'.$i])?$data['content2']['Asset_Description'.$i]:''}}"  /></label>
                                                                            </div>
                                                                            <div class="col sqs-col-2 span-2">
                                                                                <label  ><input style="margin-bottom: 10px" name="Quantily_In<?php echo $i?>" type="text" class="ip-po-ab" value="{{ isset($data['content2']['Quantily_In'.$i])?$data['content2']['Quantily_In'.$i]:''}}" /></label>
                                                                            </div>
                                                                            <div class="col sqs-col-2 span-2">

                                                                                <label  ><input style="margin-bottom: 10px" name="Quantily_To_Be<?php echo $i?>" type="text" class="ip-po-ab" value="{{ isset($data['content2']['Quantily_To_Be'.$i])?$data['content2']['Quantily_To_Be'.$i]:''}}" /></label>

                                                                            </div>
                                                                            <div class="col sqs-col-2 span-2">

                                                                                <label  >
                                                                                    <input type="radio" id="check-id-<?php echo $dem?>" class="radio radio<?php echo $dem?>" data="<?php echo $dem?>" name="Liquidate<?php echo $i?>" value="1" <?php if(isset($data['content2']['Liquidate'.$i]) && $data['content2']['Liquidate'.$i]==1) echo 'checked' ?>>
                                                                                    <label for="check-id-<?php echo $dem?>" class="option"></label>
                                                                                </label>
                                                                            </div>
                                                                            <div class="col sqs-col-2 span-2">
                                                                                <label  >
                                                                                    <input type="radio" id="check-id-<?php echo $dem+1?>" class="radio radio<?php echo $dem?>" data="<?php echo $dem?>" name="Reinvest<?php echo $i?>" value="2" <?php if(isset($data['content2']['Reinvest'.$i]) && $data['content2']['Reinvest'.$i]==2) echo 'checked' ?>>
                                                                                    <label for="check-id-<?php echo $dem+1?>" class="option"></label>
                                                                                </label>
                                                                            </div>

                                                                        </div>
                                                                        <?php }?>
                                                                    </div>
                                                                </div>
                                                                <hr style="border-bottom: 1px solid #e1e1e1;margin-bottom: 30px;"/>
                                                                <label class="label-b"><span class="s">*</span>Confirmation</label>
                                                                <div class="on-check-ful" style="margin-bottom: 0;margin-top: 10px;">
                                                                    <div class="i-tem-check">
                                                                        <label>
                                                                            <input type="checkbox" id="check-id-2341" name="comfirmation2" value="comfirmation2" checked>
                                                                            <label for="check-id-2341" class="option">
                                                                                <div class="chec-poa-eb">
                                                                                    I have read and understand the rollover rules and conditions stated in the section and i have met the requirements for making a rollover. Due to the important tax consequences of rolling over funds or property to an IRA. I have been and advised to see a tax professional. All information provided by me is true and correct and may be relied on by the Trustee or Custodian. I assume full responsibility for this rollover transaction and will no hold the Trustee or Custodian liable for any adverse consequences that may result. I hereby irrevocably desgnate this contribution of amount in dollars (Stated below) in cash and/or property as a rollover contribution.
                                                                                </div>
                                                                            </label>
                                                                        </label>
                                                                    </div>


                                                                    <div class="row pa-xmg-eppp">
                                                                        <div class="col sqs-col-4 span-4" style="">
                                                                            <label><span class="s">*</span>Amount of Contribution $</label>
                                                                        </div>
                                                                    </div>
                                                                    <div class="row pa-xmg-eppp">
                                                                        <div class="col sqs-col-4 span-4">
                                                                            <div style="padding-left: 40px;">
                                                                                <input  style="margin-bottom: 10px" name="Amount_Contribution2" type="text" class="ip-po-ab validation <?php if(!isset($data['content2']['transfer']) ||(isset($data['content2']['transfer']) && $data['content2']['transfer']!=4)) echo 'ignore' ?>" value="{{ isset($data['content2']['Amount_Contribution2'])?$data['content2']['Amount_Contribution2']:''}}" />

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

                                        <div class="pa-sub">
                                            <div class="but-a-open bg-op3">
                                                <a href="/register-step1">Back</a>
                                            </div>
                                            <div class="but-a-open">
                                                <button class="submit_next submit_next2">Next</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
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