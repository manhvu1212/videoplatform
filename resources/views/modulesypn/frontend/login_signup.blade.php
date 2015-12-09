@extends('layouts.frontend.master1')
@section('content')
<div class="content-wap">
    <div class="con-page-sub">
        <div class="container">
            <div class="row sqs-row">
                <div class="col sqs-col-9 span-9">
                    <div class="column">
                        <a href="#">Open New Account</a> > <b> Log in & Sign Up</b>
                    </div>
                    <div class="row sqs-row">
                        <div class="col sqs-col-12 span-12">
                            <div class="cont-ri-sub-page">
                                <div class="pa-sub">
                                    <h2>New Account Application</h2>
                                    <div style="margin-bottom: 10px">
                                        Mainstar offers two convenient ways to open an account
                                    </div>
                                </div>
                                <div class="pa-sub pa-ul-bg">
                                    <ul>
                                        <li>
                                            To open an account by mail, please go to the Forms section of our website and download the applicable documents.
                                        </li>
                                        <li>
                                            To open an account online, please choose the account type below and proceed to the Online Application. Only the account options
                                            listed below can be established online. All other account options should be opened by mail.
                                        </li>
                                    </ul>
                                </div>
                                <div class="item-pag-gb">
                                    <div class="row sqs-row">
                                        <div class="col sqs-col-6">
                                            <div class="item-aci">

                                                <h4><a href="<?php echo url("/Log-in-Sign-Up/Traditional-IRA") ?>"><i class="icon-be"></i>Traditional IRA</a></h4>

                                                <div style="margin-bottom: 10px">
                                                    Make contributions with money you may be able to deduct on
                                                    your tax return. With a Traditional IRA, transactions in the
                                                    account are not subject to tax while still in the account. Upon
                                                    withdrawal, amounts are subject to federal income tax.
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col sqs-col-6">
                                            <div class="item-aci">
                                                <h4> <a href="<?php echo url("/Log-in-Sign-Up/Roth-IRA") ?>"><i class="icon-be"></i>Roth IRA </a></h4>
                                                <div style="margin-bottom: 10px">
                                                    Make contributions with money on which you’ve already paid
                                                    taxes. Money in your Roth IRA can potentially grow tax-free,
                                                    including tax-free withdrawals, provided that certain conditions
                                                    are met.
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row sqs-row">
                                        <div class="col sqs-col-6">
                                            <div class="item-aci">
                                                <h4> <a href="<?php echo url("/Log-in-Sign-Up/SEP-Plan") ?>"><i class="icon-be"></i>Simplified Employee Pension Plan</a></h4>
                                                <div style="margin-bottom: 10px">
                                                    A defined contribution plan, which allows employers to make
                                                    contributions to individual employee accounts (similar to IRAs).
                                                    Employees may also make pre-tax contributions to these
                                                    accounts.
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row sqs-row">
                                        <div class="col sqs-col-12">
                                            <div class="">
                                                <h4><b>Please sign and return any applicable forms to us at:</b></h4>
                                                <div style="margin-bottom: 10px">
                                                    Mainstar<br/>
                                                   <?php echo $setting->address_contact?>
                                                </div>
                                            </div>
                                        </div>
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