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
                <form action="/register-step7" method="post" id="register_step6">
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
                                        <h2>Step 6 of 7 : Review & Confirm</h2>
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
                                            <div class="pa-sub">
                                                Please review each section carefully and make changes using the edit links
                                            </div>
                                            <div class="row">
                                                <div class="col sqs-col-12 span-12">
                                                    <div class="i-a-b-st6">Account information</div>
                                                </div>
                                                <div class="col sqs-col-12 span-12">
                                                    <div class="row pa-st-m6">
                                                        <div class="col sqs-col-4 span-4">
                                                            <div class="item-st6-az">
                                                                Registration
                                                            </div>
                                                        </div>
                                                        <div class="col sqs-col-4 span-4">
                                                            <div class="item-st6-az-rig">
                                                                <?php echo Session::get('type');?>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col sqs-col-12 span-12">
                                                    <div class="i-a-b-st6">IRA Owner Information | <a href="/register-step1">Edit</a></div>
                                                </div>
                                                <div class="col sqs-col-12 span-12">
                                                    <div class="row pa-st-m6">
                                                        <div class="col sqs-col-4 span-4">
                                                            <div class="item-st6-az">
                                                                Owner Name<br/>
                                                                Social Security Number<br/>
                                                                Date of Birth
                                                            </div>
                                                        </div>
                                                        <div class="col sqs-col-4 span-4">
                                                            <div class="item-st6-az-rig">
                                                                <?php echo $data['content1']['first_name'].' '.$data['content1']['last_name']?><br/>
                                                                    <?php echo $data['content1']['Social_Security_Number1'].'-'.$data['content1']['Social_Security_Number2'].'-'.$data['content1']['Social_Security_Number3']?><br/>
                                                                    <?php echo $data['content1']['month_birth'].'/'.$data['content1']['date_birth'].'/'.$data['content1']['year_birth']?>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row pa-st-m6">
                                                        <div class="col sqs-col-4 span-4">
                                                            <div class="item-st6-az">
                                                                Contact
                                                            </div>
                                                        </div>
                                                        <div class="col sqs-col-4 span-4">
                                                            <div class="item-st6-az-rig">
                                                                <?php echo $data['content1']['home_phone']?> <br/>
                                                                    <?php echo $data['content1']['email']?>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row pa-st-m6">
                                                        <div class="col sqs-col-4 span-4">
                                                            <div class="item-st6-az">
                                                                Street Address
                                                            </div>
                                                        </div>
                                                        <div class="col sqs-col-4 span-4">
                                                            <div class="item-st6-az-rig">
                                                                <?php echo $data['content1']['address_line1']?> <br/>
                                                                    <?php echo $data['content1']['address_city']?>, <?php echo $data['content1']['address_state']?> <?php echo $data['content1']['address_zip']?> <br/>
                                                                    <?php echo $data['content1']['address_country']?>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <?php if(isset($data['content1']['address1_line1']) && $data['content1']['address1_line1']!='') {?>
                                                    <div class="row pa-st-m6">
                                                        <div class="col sqs-col-4 span-4">
                                                            <div class="item-st6-az">
                                                                Mailing Address
                                                            </div>
                                                        </div>
                                                        <div class="col sqs-col-4 span-4">
                                                            <div class="item-st6-az-rig">
                                                                <?php echo $data['content1']['address1_line1']?> <br/>
                                                                <?php echo $data['content1']['address1_city']?>, <?php echo $data['content1']['address1_state']?> <?php echo $data['content1']['address1_zip']?> <br/>
                                                                <?php echo $data['content1']['address1_country']?>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <?php } ?>
                                                    <div class="row pa-st-m6">
                                                        <div class="col sqs-col-4 span-4">
                                                            <div class="item-st6-az">
                                                                Marital Status
                                                            </div>
                                                        </div>
                                                        <div class="col sqs-col-4 span-4">
                                                            <div class="item-st6-az-rig">
                                                                <?php if($data['content1']['married']==0) echo 'Single'; else echo 'Married'; ?>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col sqs-col-12 span-12">
                                                    <div class="i-a-b-st6">Funding Information | <a href="/register-step2">Edit</a></div>
                                                </div>
                                                <div class="col sqs-col-12 span-12">
                                                    <div class="row pa-st-m6">
                                                        <div class="col sqs-col-4 span-4">
                                                            <div class="item-st6-az">
                                                                Contribution
                                                            </div>
                                                        </div>
                                                        <div class="col sqs-col-4 span-4">
                                                            <div class="item-st6-az-rig">
                                                                <?php if($data['content2']['contribution']==1) echo 'Contribution'; elseif($data['content2']['contribution']==2) echo 'SEP Contribution'; else echo 'No Contribution (atthistime)'?>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row pa-st-m6">
                                                        <div class="col sqs-col-4 span-4">
                                                            <div class="item-st6-az">
                                                                Transfers/Rollovers
                                                            </div>
                                                        </div>
                                                        <div class="col sqs-col-4 span-4">
                                                            <div class="item-st6-az-rig">
                                                                <?php if($data['content2']['transfer']==1) echo 'Transfer'; elseif($data['content2']['transfer']==2) echo 'Direct Rollover'; elseif($data['content2']['transfer']==3) echo 'Indirect Rollover'; elseif($data['content2']['transfer']==4) echo 'Recharacterization'; else echo 'No Transfer/Rollover'?>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col sqs-col-12 span-12">
                                                    <div class="i-a-b-st6">Designation of Beneficiary | <a href="/register-step3">Edit</a></div>
                                                </div>
                                                <?php

                                                for($i=0;$i<count($data['content3']['share']);$i++) {?>
                                                <div class="col sqs-col-12 span-12">
                                                    <div class="row pa-st-m6">
                                                        <div class="col sqs-col-4 span-4">
                                                            <div class="item-st6-az">
                                                                Beneficiary <?php echo $i+1?>
                                                            </div>
                                                        </div>
                                                        <div class="col sqs-col-4 span-4">
                                                            <div class="item-st6-az-rig">
                                                                <?php echo isset($data['content3']['Beneficiary'.$i])?$data['content3']['Beneficiary'.$i]:''?>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row pa-st-m6">
                                                        <div class="col sqs-col-4 span-4">
                                                            <div class="item-st6-az">
                                                                Relationship
                                                            </div>
                                                        </div>
                                                        <div class="col sqs-col-4 span-4">
                                                            <div class="item-st6-az-rig">
                                                                <?php echo isset($data['content3']['relationship'][$i])?$data['content3']['relationship'][$i]:''?>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row pa-st-m6">
                                                        <div class="col sqs-col-4 span-4">
                                                            <div class="item-st6-az">
                                                                Shared Percentage
                                                            </div>
                                                        </div>
                                                        <div class="col sqs-col-4 span-4">
                                                            <div class="item-st6-az-rig">
                                                                <?php echo isset($data['content3']['share'][$i])?$data['content3']['share'][$i]:''?>%
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <?php } ?>
                                            </div>
                                            <div class="row">
                                                <div class="col sqs-col-12 span-12">
                                                    <div class="i-a-b-st6">Designation of Representative | <a href="/register-step4">Edit</a></div>
                                                </div>
                                                <div class="col sqs-col-12 span-12">
                                                    <div class="row pa-st-m6">
                                                        <div class="col sqs-col-4 span-4">
                                                            <div class="item-st6-az">
                                                                Broker Dealer<br/>
                                                                Representative Full Name
                                                            </div>
                                                        </div>
                                                        <div class="col sqs-col-4 span-4">
                                                            <div class="item-st6-az-rig">
                                                                <?php echo $data['content4']['Broker_Dealer']?> <br/>
                                                                    <?php echo $data['content4']['First_Name'].' '.$data['content4']['Last_Name']?>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row pa-st-m6">
                                                        <div class="col sqs-col-4 span-4">
                                                            <div class="item-st6-az">
                                                                Street Address
                                                            </div>
                                                        </div>
                                                        <div class="col sqs-col-4 span-4">
                                                            <div class="item-st6-az-rig">
                                                                <?php echo $data['content4']['Address_Line_1']?> <br/>
                                                                <?php echo $data['content4']['City']?>, <?php echo $data['content4']['State']?> <?php echo $data['content4']['zipcode']?> <br/>
                                                                <?php echo $data['content4']['Country']?>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row pa-st-m6">
                                                        <div class="col sqs-col-4 span-4">
                                                            <div class="item-st6-az">
                                                                Contact
                                                            </div>
                                                        </div>
                                                        <div class="col sqs-col-4 span-4">
                                                            <div class="item-st6-az-rig">
                                                                <?php echo $data['content4']['Home_Phone']?> <br/>
                                                                    <?php echo $data['content4']['Email_Address']?>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col sqs-col-12 span-12">
                                                    <div class="i-a-b-st6">Account Options | <a href="/register-step5">Edit</a></div>
                                                </div>
                                                <div class="col sqs-col-12 span-12">
                                                    <div class="row pa-st-m6">
                                                        <div class="col sqs-col-4 span-4">
                                                            <div class="item-st6-az">
                                                                Invoice Option
                                                            </div>
                                                        </div>
                                                        <div class="col sqs-col-4 span-4">
                                                            <div class="item-st6-az-rig">
                                                                <?php echo $data['content5']['Invoice_Options']?>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row pa-st-m6">
                                                        <div class="col sqs-col-4 span-4">
                                                            <div class="item-st6-az">
                                                                Statement Options
                                                            </div>
                                                        </div>
                                                        <div class="col sqs-col-4 span-4">
                                                            <div class="item-st6-az-rig">
                                                                <?php echo $data['content5']['Statement_Options']?>
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
                                            <a href="/register-step5">Back</a>
                                        </div>
                                        <div class="but-a-open">
                                            <button class="submit_next">Confirm My Information</button>
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