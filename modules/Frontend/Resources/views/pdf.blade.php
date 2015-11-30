<!DOCTYPE html>
<!-- saved from url=(0022)http://gg.novario.net/ -->
<html lang="en"><script type="text/javascript">window["_gaUserPrefs"] = { ioo : function() { return true; } }</script><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <title>Main Star</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <style type="text/css">
        .recentcomments a{display:inline !important;padding:0 !important;margin:0 !important;}
    .pa-sub h2{
        color:red;
    }
        .i-a-b-st6 {
            margin-bottom: 20px;
        }
        .i-a-b-st6 {
            font-size: 25px;
            font-weight: bold;
        }
        .pa-st-m6 {
            margin-bottom: 20px;
        }
        .sqs-col-4 {
            float: left;
        }
        .item-st6-az {
            font-size: 16px;
            color: #91C46C;
            text-align: right;
        }
        .item-st6-az-rig {
            font-size: 16px;
            text-align: left;
        }
        a {
            color: #32a7ac;
        }
        .i-a-b-st6 {
            margin-bottom: 20px;
        }
        .i-a-b-st6 {
            font-size: 25px;
            font-weight: bold;
        }
        .form-process {
            padding-left: 0px;
        }
        td {
            width: 300px;
            padding-right: 30px;
        }
    </style>
</head>
<body>
<div class="wrapper-full">
    <div class="content-wap">
    <div class="con-page-sub">
        <div class="container">
            <div class="row sqs-row">
                    <?php
                            $content1= json_decode($data['content1']);
                            $content2= json_decode($data['content2']);
                            $content3= json_decode($data['content3']);
                            $content4= json_decode($data['content4']);
                            $content5= json_decode($data['content5']);
                    ?>
                    <div class="col sqs-col-12 span-12">
                        <div class="row sqs-row">
                            <div class="col sqs-col-12 span-12">
                                <img src="http://mainstar.makedigitalgroup.com/assets/frontend/images/logo.png" />
                            </div>
                            <div class="col sqs-col-12 span-12">
                                <div class="cont-ri-sub-page">
                                    <div class="pa-sub">
                                        <h2>Profile PDF file</h2>
                                    </div>
                                    <hr style="border-bottom: 1px solid #e1e1e1;margin-bottom: 30px;"/>
                                    <div class="form-process">
                                        <div class="form-process-2">
                                            <div class="row">
                                                <div class="col sqs-col-12 span-12">
                                                    <div class="i-a-b-st6">Account information</div>
                                                </div>
                                                <div class="col sqs-col-12 span-12">
                                                    <table class="pa-st-m6">
                                                        <tr>
                                                            <td>
                                                                <div class="item-st6-az">
                                                                    Registration
                                                                </div>
                                                            </td>
                                                            <td>
                                                                <div class="item-st6-az-rig">
                                                                    <?php echo Session::get('type');?>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                    </table>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col sqs-col-12 span-12">
                                                    <div class="i-a-b-st6">IRA Owner Information</div>
                                                </div>
                                                <div class="col sqs-col-12 span-12">
                                                    <div class="row pa-st-m6">
                                                        <div class="col sqs-col-4 span-4">
                                                            <table class="pa-st-m6">
                                                                <tr>
                                                                    <td>
                                                                        <div class="item-st6-az">
                                                                            Owner Name<br/>
                                                                            Social Security Number<br/>
                                                                            Date of Birth
                                                                        </div>
                                                                    </td>
                                                                    <td>
                                                                        <div class="item-st6-az-rig">
                                                                            <?php echo $content1->first_name.' '.$content1->last_name?><br/>
                                                                            <?php echo $content1->Social_Security_Number1.'-'.$content1->Social_Security_Number2.'-'.$content1->Social_Security_Number3?><br/>
                                                                            <?php echo $content1->month_birth.'/'.$content1->date_birth.'/'.$content1->year_birth?>
                                                                        </div>
                                                                    </td>
                                                                </tr>
                                                            </table>
                                                        </div>
                                                    </div>
                                                    <div class="row pa-st-m6">
                                                        <table class="pa-st-m6">
                                                            <tr>
                                                                <td>
                                                                    <div class="item-st6-az">
                                                                        Contact
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div class="item-st6-az-rig">
                                                                        <?php echo $content1->home_phone?> <br/>
                                                                        <?php echo $content1->email?>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                        </table>
                                                    </div>
                                                    <div class="row pa-st-m6">
                                                        <table class="pa-st-m6">
                                                            <tr>
                                                                <td>
                                                                    <div class="item-st6-az">
                                                                        Street Address
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div class="item-st6-az-rig">
                                                                        <?php echo $content1->address_line1?> <br/>
                                                                        <?php echo $content1->address_city?>, <?php echo $content1->address_state?> <?php echo $content1->address_zip?> <br/>
                                                                        <?php echo $content1->address_country?>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                        </table>
                                                    </div>
                                                    <?php if(isset($content1->address1_line1) && $content1->address1_line1!='') {?>
                                                    <div class="row pa-st-m6">
                                                        <table class="pa-st-m6">
                                                            <tr>
                                                                <td>
                                                                    <div class="item-st6-az">
                                                                        Mailing Address
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div class="item-st6-az-rig">
                                                                        <?php echo $content1->address1_line1?> <br/>
                                                                        <?php echo $content1->address1_city?>, <?php echo $content1->address1_state?> <?php echo $content1->address1_zip?> <br/>
                                                                        <?php echo $content1->address1_country?>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                        </table>
                                                    </div>
                                                    <?php } ?>
                                                    <div class="row pa-st-m6">
                                                        <table class="pa-st-m6">
                                                            <tr>
                                                                <td>
                                                                    <div class="item-st6-az">
                                                                        Marital Status
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div class="item-st6-az-rig">
                                                                        <?php if($content1->married==0) echo 'Single'; else echo 'Married'; ?>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col sqs-col-12 span-12">
                                                    <div class="i-a-b-st6">Funding Information </div>
                                                </div>
                                                <div class="col sqs-col-12 span-12">
                                                    <div class="row pa-st-m6">
                                                        <table class="pa-st-m6">
                                                            <tr>
                                                                <td>
                                                                    <div class="item-st6-az">
                                                                        Contribution
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div class="item-st6-az-rig">
                                                                        <?php if($content2->contribution==1) echo 'Contribution'; elseif($content2->contribution==2) echo 'SEP Contribution'; else echo 'No Contribution (atthistime)'?>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                        </table>
                                                    </div>
                                                    <div class="row pa-st-m6">
                                                        <table class="pa-st-m6">
                                                            <tr>
                                                                <td>
                                                                    <div class="item-st6-az">
                                                                        Transfers/Rollovers
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div class="item-st6-az-rig">
                                                                        <?php if($content2->transfer==1) echo 'Transfer'; elseif($content2->transfer==2) echo 'Direct Rollover'; elseif($content2->transfer==3) echo 'Indirect Rollover'; elseif($content2->transfer==4) echo 'Recharacterization'; else echo 'No Transfer/Rollover'?>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col sqs-col-12 span-12">
                                                    <div class="i-a-b-st6">Designation of Beneficiary </div>
                                                </div>
                                                <?php

                                                for($i=0;$i<count($content3->share);$i++) { $a="Beneficiary$i";?>
                                                <div class="col sqs-col-12 span-12">
                                                    <div class="row pa-st-m6">
                                                        <table class="pa-st-m6">
                                                            <tr>
                                                                <td>
                                                                    <div class="item-st6-az">
                                                                        Beneficiary <?php echo $i+1?>
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div class="item-st6-az-rig">
                                                                        <?php echo $content3->$a?>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                        </table>
                                                    </div>
                                                    <div class="row pa-st-m6">
                                                        <table class="pa-st-m6">
                                                            <tr>
                                                                <td>
                                                                    <div class="item-st6-az">
                                                                        Relationship
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div class="item-st6-az-rig">
                                                                        <?php echo $content3->relationship[$i]?>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                        </table>
                                                    </div>
                                                    <div class="row pa-st-m6">
                                                        <table class="pa-st-m6">
                                                            <tr>
                                                                <td>
                                                                    <div class="item-st6-az">
                                                                        Shared Percentage
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div class="item-st6-az-rig">
                                                                        <?php echo $content3->share[$i]?>%
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                        </table>
                                                    </div>
                                                </div>
                                                <?php } ?>
                                            </div>
                                            <div class="row">
                                                <div class="col sqs-col-12 span-12">
                                                    <div class="i-a-b-st6">Designation of Representative </div>
                                                </div>
                                                <div class="col sqs-col-12 span-12">
                                                    <div class="row pa-st-m6">
                                                        <table class="pa-st-m6">
                                                            <tr>
                                                                <td>
                                                                    <div class="item-st6-az">
                                                                        Broker Dealer<br/>
                                                                        Representative Full Name
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div class="item-st6-az-rig">
                                                                        <?php echo $content4->Broker_Dealer?> <br/>
                                                                        <?php echo $content4->First_Name.' '.$content4->Last_Name?>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                        </table>
                                                    </div>
                                                    <div class="row pa-st-m6">
                                                        <table class="pa-st-m6">
                                                            <tr>
                                                                <td>
                                                                    <div class="item-st6-az">
                                                                        Street Address
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div class="item-st6-az-rig">
                                                                        <?php echo $content4->Address_Line_1?> <br/>
                                                                        <?php echo $content4->City?>, <?php echo $content4->State?> <?php echo $content4->zipcode?> <br/>
                                                                        <?php echo $content4->Country?>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                        </table>
                                                    </div>
                                                    <div class="row pa-st-m6">
                                                        <table class="pa-st-m6">
                                                            <tr>
                                                                <td>
                                                                    <div class="item-st6-az">
                                                                        Contact
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div class="item-st6-az-rig">
                                                                        <?php echo $content4->Home_Phone?> <br/>
                                                                        <?php echo $content4->Email_Address?>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col sqs-col-12 span-12">
                                                    <div class="i-a-b-st6">Account Options </div>
                                                </div>
                                                <div class="col sqs-col-12 span-12">
                                                    <div class="row pa-st-m6">
                                                        <table class="pa-st-m6">
                                                            <tr>
                                                                <td>
                                                                    <div class="item-st6-az">
                                                                        Invoice Option
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div class="item-st6-az-rig">
                                                                        <?php echo $content5->Invoice_Options?>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                        </table>
                                                    </div>
                                                    <div class="row pa-st-m6">
                                                        <table class="pa-st-m6">
                                                            <tr>
                                                                <td>
                                                                    <div class="item-st6-az">
                                                                        Statement Options
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div class="item-st6-az-rig">
                                                                        <?php echo $content5->Statement_Options?>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                        </table>
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
        </div>
    </div>
    </div>
    </div>
</body>
</html>