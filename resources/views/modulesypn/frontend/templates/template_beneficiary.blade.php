<script type="text/x-jquery-tmpl" id="row_create_template_beneficiary">
<div  class="beneficiary_${id}">
<hr style="border-bottom: 1px solid #e1e1e1;margin-bottom: 30px;">
    <div class="ite-step3">
            <div class="row">
                <div class="pa-12-no">
                    <div class="col sqs-col-12 span-12">
                        <div class="wap-im-proce spl-pa-forn step3-form">
                            <label>Beneficiary ${stt}</label>
                            <div class="row">
                                <div class="col sqs-col-12 span-12">
                                    <div class="on-check-ful" style="margin-bottom: 0;margin-top: 10px;">
                                        <div class="i-tem-check">
                                            <label>
                                                <input type="radio" id="check-id-5${id}" name="Beneficiary${id}" checked value="Primary">
                                                <label for="check-id-5${id}" class="option">
                                                    <div class="chec-poa-eb">
                                                        Primary
                                                    </div>
                                                </label>
                                            </label>
                                        </div>
                                        <div class="i-tem-check">
                                            <label>
                                                <input type="radio" id="check-id-6${id}" name="Beneficiary${id}" value="Contingent">
                                                <label for="check-id-6${id}" class="option">
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
                    <select class="relationship" data="${id}" name="relationship[]">
                        <option value="">Select One</option>
                        <option value="Spouse">Spouse</option>
                        <option value="Non-spousal">Non-spousal</option>
                        <option value="Trust" >Trust</option>
                        <option value="Estate" >Estate</option>
                    </select>
                </div>
            </div>
            <div class="row sqs-row truct_name truct_name_${id}" style="margin-bottom: 15px;display:none">
                <div class="col sqs-col-12 span-12">
                    <label>Trust Name (<span class="nobold">Please include legal name</span>)</label>
                </div>
                <div class="col sqs-col-5 span-5">
                    <input type="text" class="ip-po-ab" name="truct_name[]" validation ignore />
                </div>
            </div>
            <div class="row sqs-row" style="margin-bottom: 15px;">
                <div class="col sqs-col-12 span-12">
                    <label>Share %</label>
                </div>
                <div class="col sqs-col-5 span-5">
                    <input type="text" class="ip-po-ab validation share" value="0" name="share[]"  />
                </div>
            </div>
        </div>

    <div class="row sqs-row Beneficiary_Name Beneficiary_Name${id}" style="margin-bottom: 15px;display:none">
            <div class="col sqs-col-9 span-9">
                <div class="wap-im-proce">
                    <label><span class="s">*</span>Beneficiary Name</label>
                    <div class="row">
                        <div class="col sqs-col-5 span-5">
                            <input placeholder="First Name" name="first_name[]" value="" type="text" class="ip-po-ab validation ignore">
                        </div>
                        <div class="col sqs-col-5 span-5">
                            <input placeholder="Last Name" name="last_name[]" value="" type="text" class="ip-po-ab validation ignore">
                        </div>
                    </div>
                </div>
                <div class="wap-im-proce">
                    <label><span class="s">*</span>Social Security Number</label>
                    <div class="row">
                        <div class="col sqs-col-2 span-2">
                            <input type="text" class="ip-po-ab validation ignore"  name="Social_Security_Number1[]" value="">
                        </div>
                        <div class="col sqs-col-2 span-2">
                            <input type="text" class="ip-po-ab validation ignore" name="Social_Security_Number2[]" value="">
                        </div>
                        <div class="col sqs-col-3 span-3">
                            <input type="text" class="ip-po-ab validation ignore" name="Social_Security_Number3[]" value="">
                        </div>
                    </div>
                </div>
                <div class="wap-im-proce">
                    <label><span class="s">*</span>Date of Birth (mm/dd/yyyy)</label>
                    <div class="row">
                        <div class="col sqs-col-2 span-2">
                            <input type="text" class="ip-po-ab validation ignore month_birth" maxlength="2" name="month_birth[]" value="">
                        </div>
                        <div class="col sqs-col-2 span-2">
                            <input type="text" class="ip-po-ab validation ignore date_birth" maxlength="2" name="date_birth[]" value="">
                        </div>
                        <div class="col sqs-col-3 span-3">
                            <input type="text" class="ip-po-ab validation ignore year_birth" maxlength="4" name="year_birth[]" value="">
                        </div>
                    </div>
                </div>
                <div class="wap-im-proce">
                    <label style="font-size: 16px;margin-bottom: 20px;margin-top: 7px;"><span class="s">*</span>Physical Address (No P.O. Boxes or mail drops)</label>
                    <div class="row">
                        <div class="col sqs-col-12 span-12">
                            <input placeholder="Address Line 1" name="address_line1[]" type="text" class="ip-po-ab validation ignore" value="">
                        </div>
                        <div class="col sqs-col-12 span-12">
                            <input placeholder="Address Line 2 (optional)" name="address_line2[]" type="text" class="ip-po-ab validation ignore" value="">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col sqs-col-6 span-6">
                            <input placeholder="City" type="text" name="address_city[]" class="ip-po-ab validation ignore" value="">
                        </div>
                        <div class="col sqs-col-6 span-6">
                            <input placeholder="State/Province" name="address_state[]" type="text" class="ip-po-ab validation ignore" value="">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col sqs-col-6 span-6">
                            <input placeholder="Zip/Postal Code" name="address_zip[]" type="text" class="ip-po-ab validation ignore" value="">
                        </div>
                        <div class="col sqs-col-6 span-6">
                            <input placeholder="Country" name="address_country[]" type="text" class="ip-po-ab validation ignore" value="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row" style="margin-bottom: 15px">
                                            <div class="col sqs-col-12">
                                                <div class="po-ab-eg-add">
                                                    <a class="delete_beneficiary" data="${id}">- Delete Beneficiary</a>
                                                </div>
                                            </div>
                                        </div>
<hr style="border-bottom: 1px solid #e1e1e1;margin-bottom: 30px;">
 </div>
</script>