@extends('layouts.frontend.master1')
@section('style')
    <link rel="stylesheet" type="text/css" href="/fontend/css/home.css" />
@stop
@section('script')
    <script type="text/javascript" src="/assets/global/plugins/jquery-validation/js/jquery.validate.min.js"></script>
    <script src="/fontend/js/jquery.tmpl.min.js" ></script>
    <script src="/fontend/js/register.js" ></script>
@stop
@section('content')
    <?php echo $tpl_beneficiary?>

<div class="content-wap">
    <div class="con-page-sub">
        <div class="container">
            <div class="row sqs-row">
                <form action="/register-step4" method="post" id="register_step3">
                    <input id="_token" type="hidden" name="_token"  value="{{ csrf_token() }}"  >
                    <?php if (Session::has('data')) {$data=Session::get('data');}
                    ?>
                <div class="col sqs-col-9 span-9">
                    <div class="column">
                        <a href="#">Open New Account</a> > <b> Process</b>
                    </div>
                    <div class="row sqs-row">
                        <div class="col sqs-col-12 span-12">
                            <div class="cont-ri-sub-page ">
                                <div class="pa-sub">
                                    <h2>Step 3 of 7 : Designation of Beneficiary(ies)</h2>
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
                                <div class="g-ao-kg-eg">
                                    <div class="pa-sub">
                                        The following individual(s) or entity(ies) shall be my primary and/or contingent beneficiary(ies). <b>If neither primary nor contingent is indicated, the individual or entity will be deemed to be a primary beneficiary.</b> If more than one primary beneficiary is
                                        designated and no distribution percentages are indicated, the benficiaries will be deemed to own equal share percentages in
                                        the IRA. Multiple contingent beneficiaries with no share percentage indicated will also be deemed to share equally.
                                    </div>
                                    <div class="pa-sub">
                                        If any primary or contingent beneficiary dies before I do, his or her interest and the interest of his or her heirs shall terminate
                                        completely, and the percentage share of any remaining beneficiary(ies) shall be increased on a pro rata basis unless otherwise
                                        designated at the time the Beneficiaries were named. If no primary beneficiary(ies) survives me, the contingent beneficiary(ies)
                                        shall acquire the designated share of my IRA.
                                    </div>
                                    <div class="pa-sub">
                                        Please read this agreement ("Agreement") carefully before accessing or using the Mainstar Trust website at
                                        www.Mainstartrust.com (the "Site"). By accessing or using the Site, You agree to be bound by this Agreement.
                                    </div>
                                </div>
                                <div class="form-process">
                                    <div class="form-process-3">
                                        <?php if(isset($data['content3']['share'])) $count = count($data['content3']['share']); else $count=1;?>
                                        <input type="hidden" value="<?php echo $count-1;?>" id="Beneficiary">
                                        <input type="hidden" value="<?php echo $count;?>" id="Beneficiary_stt">
                                        <input type="hidden" value="<?php  if(isset($data['content3']['share'])) echo '100'; else echo '0'?>" id="share_user">
                                        <div id="div_beneficiary">
                                            <?php
                                            for($i=0;$i<$count;$i++){
                                            ?>
                                            <div class="row_beneficiary beneficiary_<?php echo $i?>">
                                            <div class="ite-step3">
                                                <div class="row">
                                                    <div class="pa-12-no">
                                                        <div class="col sqs-col-12 span-12">
                                                            <div class="wap-im-proce spl-pa-forn step3-form">
                                                                <label>Beneficiary <?php if($i>0) echo $i+1;?></label>
                                                                <div class="row">
                                                                    <div class="col sqs-col-12 span-12">
                                                                        <div class="on-check-ful" style="margin-bottom: 0;margin-top: 10px;">
                                                                            <div class="i-tem-check">
                                                                                <label>
                                                                                    <input type="radio" id="check-id-5<?php echo $i?>" name="Beneficiary<?php echo $i?>" value="Primary" <?php if(!isset($data['content3']['Beneficiary'.$i]) || (isset($data['content3']['Beneficiary'.$i]) && $data['content3']['Beneficiary'.$i]=='Primary')) echo 'checked' ?>>
                                                                                    <label for="check-id-5<?php echo $i?>" class="option">
                                                                                        <div class="chec-poa-eb">
                                                                                            Primary
                                                                                        </div>
                                                                                    </label>
                                                                                </label>
                                                                            </div>
                                                                            <div class="i-tem-check">
                                                                                <label>
                                                                                    <input type="radio" id="check-id-6<?php echo $i?>" name="Beneficiary<?php echo $i?>" value="Contingent" <?php if(isset($data['content3']['Beneficiary'.$i]) && $data['content3']['Beneficiary'.$i]=='Contingent') echo 'checked' ?>>
                                                                                    <label for="check-id-6<?php echo $i?>" class="option">
                                                                                        <div class="chec-poa-eb">
                                                                                            Contingent
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
                                                <div class="row sqs-row" style="margin-bottom: 15px;">
                                                    <div class="col sqs-col-12 span-12">
                                                        <label>Relationship:</label>
                                                    </div>
                                                    <div class="col sqs-col-5 span-5">
                                                        <select class="relationship" data="<?php echo $i?>" name="relationship[]">
                                                            <option value="">Select One</option>
                                                            <option value="Spouse" <?php if(isset($data['content3']['relationship'][$i]) && $data['content3']['relationship'][$i]=='Spouse') echo 'selected="selected"' ?>>Spouse</option>
                                                            <option value="Non-spousal" <?php if(isset($data['content3']['relationship'][$i]) && $data['content3']['relationship'][$i]=='Non-spousal') echo 'selected="selected"' ?>>Non-spousal</option>
                                                            <option value="Trust" <?php if(isset($data['content3']['relationship'][$i]) && $data['content3']['relationship'][$i]=='Trust') echo 'selected="selected"' ?>>Trust</option>
                                                            <option value="Estate" <?php if(isset($data['content3']['relationship'][$i]) && $data['content3']['relationship'][$i]=='Estate') echo 'selected="selected"' ?>>Estate</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="row sqs-row truct_name truct_name_<?php echo $i?>" style="margin-bottom: 15px;<?php if(!isset($data['content3']['relationship'][$i]) || (isset($data['content3']['relationship'][$i]) && $data['content3']['relationship'][$i]!='Trust' )) echo 'display:none"' ?>">
                                                    <div class="col sqs-col-12 span-12">
                                                        <label>Trust Name (<span class="nobold">Please include legal name of trust</span>)</label>
                                                    </div>
                                                    <div class="col sqs-col-5 span-5">
                                                        <input type="text" class="ip-po-ab validation <?php if(!isset($data['content3']['relationship']) ||(isset($data['content3']['relationship']) && $data['content3']['relationship']!='Spouse' && $data['content3']['relationship']!='Non-spousal')) echo 'ignore' ?>" name="truct_name[]" value="{{ isset($data['content3']['truct_name'][$i])?$data['content3']['truct_name'][$i]:''}}" />
                                                    </div>
                                                </div>
                                                <p class="p_truste" style="margin-bottom: 15px;color: #80A743;<?php if(!isset($data['content3']['relationship'][$i]) || (isset($data['content3']['relationship'][$i]) && $data['content3']['relationship'][$i]!='Trust' )) echo 'display:none"' ?>">Please mail in the first page and the Signature page of your Trust agreement</p>
                                                <div class="row sqs-row" style="margin-bottom: 15px;">
                                                    <div class="col sqs-col-12 span-12">
                                                        <label>Share %</label>
                                                    </div>
                                                    <div class="col sqs-col-5 span-5">
                                                        <input type="text" name="share[]" value="<?php if(isset($data['content3']['share'][$i])) echo $data['content3']['share'][$i];else echo '0'?>" maxlength="3" class="share ip-po-ab validation <?php if(!isset($data['content3']['share'][$i])) echo 'ignore' ?>"  />
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row sqs-row Beneficiary_Name Beneficiary_Name<?php echo $i?>" style="margin-bottom: 15px;<?php if(!isset($data['content3']['relationship'][$i]) || (isset($data['content3']['relationship'][$i]) && $data['content3']['relationship'][$i]!='Spouse' && $data['content3']['relationship'][$i]!='Non-spousal' )) echo 'display:none"' ?>">
                                                <div class="col sqs-col-9 span-9">
                                                    <div class="wap-im-proce">
                                                        <label><span class="s">*</span>Beneficiary Name</label>
                                                        <div class="row">
                                                            <div class="col sqs-col-5 span-5">
                                                                <input placeholder="First Name" name="first_name[]" value="{{ isset($data['content3']['first_name'][$i])?$data['content3']['first_name'][$i]:''}}" type="text" class="ip-po-ab validation <?php if(!isset($data['content3']['relationship']) ||(isset($data['content3']['relationship']) && $data['content3']['relationship']!='Trust' && $data['content3']['relationship']!='Estate')) echo 'ignore' ?>">
                                                            </div>
                                                            <div class="col sqs-col-5 span-5">
                                                                <input placeholder="Last Name" name="last_name[]" value="{{ isset($data['content3']['last_name'][$i])?$data['content3']['last_name'][$i]:''}}" type="text" class="ip-po-ab validation <?php if(!isset($data['content3']['relationship']) ||(isset($data['content3']['relationship']) && $data['content3']['relationship']!='Trust' && $data['content3']['relationship']!='Estate')) echo 'ignore' ?>">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="wap-im-proce">
                                                        <label><span class="s">*</span>Social Security Number</label>
                                                        <div class="row">
                                                            <div class="col sqs-col-2 span-2">
                                                                <input type="text" class="ip-po-ab validation <?php if(!isset($data['content3']['relationship']) ||(isset($data['content3']['relationship']) && $data['content3']['relationship']!='Trust' && $data['content3']['relationship']!='Estate')) echo 'ignore' ?> Social_Security_Number1"  maxlength="3" name="Social_Security_Number1[]" value="{{ isset($data['content3']['Social_Security_Number1'][$i])?$data['content3']['Social_Security_Number1'][$i]:''}}">
                                                            </div>
                                                            <div class="col sqs-col-2 span-2">
                                                                <input type="text" class="ip-po-ab validation <?php if(!isset($data['content3']['relationship']) ||(isset($data['content3']['relationship']) && $data['content3']['relationship']!='Trust' && $data['content3']['relationship']!='Estate')) echo 'ignore' ?> Social_Security_Number2"  maxlength="2" name="Social_Security_Number2[]" value="{{ isset($data['content3']['Social_Security_Number2'][$i])?$data['content3']['Social_Security_Number2'][$i]:''}}">
                                                            </div>
                                                            <div class="col sqs-col-3 span-3">
                                                                <input type="text" class="ip-po-ab validation <?php if(!isset($data['content3']['relationship']) ||(isset($data['content3']['relationship']) && $data['content3']['relationship']!='Trust' && $data['content3']['relationship']!='Estate')) echo 'ignore' ?> Social_Security_Number3"  maxlength="4" name="Social_Security_Number3[]" value="{{ isset($data['content3']['Social_Security_Number3'][$i])?$data['content3']['Social_Security_Number3'][$i]:''}}">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="wap-im-proce div_day" data="<?php echo $i+1?>">
                                                        <label><span class="s">*</span>Date of Birth (mm/dd/yyyy)</label>
                                                        <div class="row">
                                                            <div class="col sqs-col-2 span-2">
                                                                <input type="text" class="ip-po-ab validation <?php if(!isset($data['content3']['relationship']) ||(isset($data['content3']['relationship']) && $data['content3']['relationship']!='Trust' && $data['content3']['relationship']!='Estate')) echo 'ignore' ?> month_birth" maxlength="2" name="month_birth[]" value="{{ isset($data['content3']['month_birth'][$i])?$data['content3']['month_birth'][$i]:''}}">
                                                            </div>
                                                            <div class="col sqs-col-2 span-2">
                                                                <input type="text" class="ip-po-ab validation <?php if(!isset($data['content3']['relationship']) ||(isset($data['content3']['relationship']) && $data['content3']['relationship']!='Trust' && $data['content3']['relationship']!='Estate')) echo 'ignore' ?> date_birth" maxlength="2" name="date_birth[]" value="{{ isset($data['content3']['date_birth'][$i])?$data['content3']['date_birth'][$i]:''}}">
                                                            </div>
                                                            <div class="col sqs-col-3 span-3">
                                                                <input type="text" class="ip-po-ab validation <?php if(!isset($data['content3']['relationship']) ||(isset($data['content3']['relationship']) && $data['content3']['relationship']!='Trust' && $data['content3']['relationship']!='Estate')) echo 'ignore' ?> year_birth"  maxlength="4" name="year_birth[]" value="{{ isset($data['content3']['year_birth'][$i])?$data['content3']['year_birth'][$i]:''}}">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="wap-im-proce">
                                                        <label style="font-size: 16px;margin-bottom: 20px;margin-top: 7px;"><span class="s">*</span>Physical Address (No P.O. Boxes or mail drops)</label>
                                                        <div class="row">
                                                            <div class="col sqs-col-12 span-12">
                                                                <input placeholder="Address Line 1" name="address_line1[]" type="text" class="ip-po-ab validation <?php if(!isset($data['content3']['relationship']) ||(isset($data['content3']['relationship']) && $data['content3']['relationship']!='Trust' && $data['content3']['relationship']!='Estate')) echo 'ignore' ?>" value="{{ isset($data['content3']['address_line1'][$i])?$data['content3']['address_line1'][$i]:''}}">
                                                            </div>
                                                            <div class="col sqs-col-12 span-12">
                                                                <input placeholder="Address Line 2 (optional)" name="address_line2[]" type="text" class="ip-po-ab validation <?php if(!isset($data['content3']['relationship']) ||(isset($data['content3']['relationship']) && $data['content3']['relationship']!='Trust' && $data['content3']['relationship']!='Estate')) echo 'ignore' ?>" value="{{ isset($data['content3']['address_line2'][$i])?$data['content3']['address_line2'][$i]:''}}">
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col sqs-col-6 span-6">
                                                                <input placeholder="City" type="text" name="address_city[]" class="ip-po-ab validation <?php if(!isset($data['content3']['relationship']) ||(isset($data['content3']['relationship']) && $data['content3']['relationship']!='Trust' && $data['content3']['relationship']!='Estate')) echo 'ignore' ?>" value="{{ isset($data['content3']['address_city'][$i])?$data['content3']['address_city'][$i]:''}}">
                                                            </div>
                                                            <div class="col sqs-col-6 span-6">
                                                                <input placeholder="State/Province" name="address_state[]" type="text" class="ip-po-ab validation <?php if(!isset($data['content3']['relationship']) ||(isset($data['content3']['relationship']) && $data['content3']['relationship']!='Trust' && $data['content3']['relationship']!='Estate')) echo 'ignore' ?>" value="{{ isset($data['content3']['address_state'][$i])?$data['content3']['address_state'][$i]:''}}">
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col sqs-col-6 span-6">
                                                                <input placeholder="Zip/Postal Code" name="address_zip[]" maxlength="15" type="text" class="ip-po-ab validation <?php if(!isset($data['content3']['relationship']) ||(isset($data['content3']['relationship']) && $data['content3']['relationship']!='Trust' && $data['content3']['relationship']!='Estate')) echo 'ignore' ?>" value="{{ isset($data['content3']['address_zip'][$i])?$data['content3']['address_zip'][$i]:''}}">
                                                            </div>
                                                            <div class="col sqs-col-6 span-6">
                                                                <input placeholder="Country" name="address_country[]" type="text" class="ip-po-ab validation <?php if(!isset($data['content3']['relationship']) ||(isset($data['content3']['relationship']) && $data['content3']['relationship']!='Trust' && $data['content3']['relationship']!='Estate')) echo 'ignore' ?>" value="{{ isset($data['content3']['address_country'][$i])?$data['content3']['address_country'][$i]:''}}">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                                <?php if($i>0) {?>
                                                <div class="row" style="margin-bottom: 15px">
                                                    <div class="col sqs-col-12">
                                                        <div class="po-ab-eg-add">
                                                            <a class="delete_beneficiary" data="<?php echo $i?>">- Delete Beneficiary</a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <hr style="border-bottom: 1px solid #e1e1e1;margin-bottom: 30px;">
                                                <?php } ?>
                                            </div><!-- End row beneficiary -->
                                            <?php } ?>
                                        </div>
                                        <div class="row" style="margin-bottom: 15px">
                                            <div class="col sqs-col-12">
                                                <div class="po-ab-eg-add">
                                                    <a id="add_beneficiary">+ Add a Beneficiary</a>
                                                </div>
                                            </div>
                                        </div>
                                        <hr style="border-bottom: 1px solid #e1e1e1;margin-bottom: 30px;"/>
                                        <div class="row sqs-row" style="margin-bottom: 15px">
                                            <div class="col sqs-col-12 span-12 gp-em-xpa">
                                                <label>Current shared percentage:</label>
                                            </div>
                                            <div class="wp-amd-pt">
                                                <div class="col sqs-col-5 span-5">
                                                    <div class="ab-ep-al">
                                                        <span class="img-xng-st user" style="<?php  if(isset($data['content3']['share'])) echo 'width:100%'; else echo 'width: 0%;' ?>">
                                                           <?php  if(isset($data['content3']['share'])) echo '100%'; else echo '0%;' ?>
                                                        </span>
                                                    </div>
                                                </div>
                                                <div class="col sqs-col-2 span-2">
                                                    <label class="non-user"><?php  if(isset($data['content3']['share'])) echo '0% Remaining'; else echo '100% Remaining' ?></label>
                                                </div>
                                            </div>
                                            <div class="col sqs-col-12 span-12 pb-need-a" style="display: none">
                                                <label>Needs to equal 100%</label>
                                            </div>
                                        </div>
                                        <hr style="border-bottom: 1px solid #e1e1e1;margin-bottom: 30px;"/>
                                    </div>
                                    <div class="pa-sub">
                                        <div class="but-a-open bg-op3">
                                            <a href="/register-step2">Back</a>
                                        </div>
                                        <div class="but-a-open">
                                            <button class="submit_next submit_next3">Next</button>
                                        </div>
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