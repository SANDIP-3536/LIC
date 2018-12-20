<div class="wrapper wrapper-content animated fadeInRight">
    <div class="row">
            <div class="col-lg-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>Update Policy Details</h5>
                        <!--    <span class="btn btn-success btn-xs pull-right close_new_policy"><i class="fa fa-times-circle" title="Close"></i></span> -->
                    </div>
                    <?php foreach($policy_details as $key) {?>
                    <div class="ibox-content">
                        <form method="post" class="form-horizontal" action="<?=site_url('Admin/policy_update')?>" enctype="multipart/form-data" id="add_policy">
                            <div class="form-group hidden">
                                <label class="col-sm-3 control-label">Policy ID</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" name="policy_id" onkeyup="caps(this)" placeholder="Policy ID" value="<?=$key['policy_id']?>">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label">Policy No</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" name="policy_number" onkeyup="caps(this)" placeholder="Policy Number" value="<?=$key['policy_number']?>">
                                </div>
                            </div>
                            <div class="form-group">
                            <label class="col-sm-3 control-label">Agent</label>
                                <div class="col-sm-8">
                                    <select class="form-control" name="policy_agent_id" required>
                                        <option value="<?=$key['agent_id']?>"><?=$key['agent_name']?></option><?php } ?>
                                         <?php foreach ($agent_details as $key) { ?>
                                            <option value="<?=$key['agent_id']?>"> <?=$key['agent_name']?></option>
                                          <?php } ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                            <label class="col-sm-3 control-label">Branch</label>
                                <div class="col-sm-8">
                                    <select class="form-control" name="policy_branch_id" required>
                                         <?php foreach($policy_details as $key) {?>
                                        <option value="<?=$key['branch_id']?>"> <?=$key['branch_name']?> (<?=$key['branch_code']?>)</option><?php } ?>
                                         <?php foreach ($branch_details as $key) { ?>
                                            <option value="<?=$key['branch_id']?>"> <?=$key['branch_name']?> (<?=$key['branch_code']?>)</option>
                                          <?php } ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                            <label class="col-sm-3 control-label">Client</label>
                                <div class="col-sm-8">
                                    <select class="form-control" name="policy_client_id" required>
                                        <?php foreach($policy_details as $key) {?>
                                         <option value="<?=$key['client_id']?>"><?=$key['client_prefix']?> <?=$key['client_first_name']?> <?=$key['client_middle_name']?> <?=$key['client_last_name']?></option><?php } ?>
                                         <?php foreach ($client_details as $key) { ?>
                                            <option value="<?=$key['client_id']?>"><?=$key['client_prefix']?> <?=$key['client_first_name']?> <?=$key['client_middle_name']?> <?=$key['client_last_name']?></option>
                                          <?php } ?>
                                    </select>
                                </div>
                            </div>
                            <?php foreach($policy_details as $key) {?>
                            <div class="form-group"><label class="col-sm-3 control-label">Policy Age</label>
                                <div class="col-sm-8"><input type="text" class="form-control" name="policy_age" onkeyup="caps(this)" placeholder="Policy Age" value="<?=$key['policy_age']?>"></div>
                            </div> 
                            <div class="form-group">
                            <label class="col-sm-3 control-label">Policy Age Proof</label>
                                <div class="col-sm-8">
                                    <select class="form-control" name="policy_age_proof">
                                        <option value="0">Select Proof</option>
                                        <option value="1">Adhar Card</option>
                                        <option value="2">Pan Card</option>
                                        <option value="3">Passport</option>
                                        <option value="4">School Living Certificate</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label">Policy Sum Assurance</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" name="policy_sum_assurance" onkeyup="caps(this)" placeholder="Policy Assurance" value="<?=$key['policy_sum_assurance']?>">
                                </div>
                            </div>  
                            <div class="form-group"><label class="col-sm-3 control-label">Policy Plan</label>
                                <div class="col-sm-8"><input type="text" class="form-control" name="policy_plan" onkeyup="caps(this)" placeholder="Policy Plan" value="<?=$key['policy_plan']?>"></div>
                            </div>   
                            <div class="form-group"><label class="col-sm-3 control-label">Policy Term</label>
                                <div class="col-sm-8"><input type="text" class="form-control" name="policy_term" onkeyup="caps(this)" placeholder="Policy Term" value="<?=$key['policy_term']?>"></div>
                            </div> 
                            <div class="form-group"><label class="col-sm-3 control-label">Policy PPT</label>
                                <div class="col-sm-8"><input type="text" class="form-control" name="policy_PPT" onkeyup="caps(this)" placeholder="Policy PPT" value="<?=$key['policy_PPT']?>"></div>
                            </div> 
                            <div class="form-group">
                            <label class="col-sm-3 control-label">Payment Mode</label>
                                <div class="col-sm-8">
                                    <select class="form-control" name="policy_mode_of_payment">
                                        <option value="0">Select Payment Mode</option>
                                        <option value="1">Yearly</option>
                                        <option value="2">Half Year</option>
                                        <option value="3">Quaterly</option>
                                        <option value="12">Monthly</option>
                                        <option value="4">Salary Saving Scheme</option>
                                        <option value="5">One Time</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group"><label class="col-sm-3 control-label">Policy Premium</label>
                                <div class="col-sm-8"><input type="text" class="form-control" name="policy_premium" onkeyup="caps(this)" placeholder="Policy Premium" value="<?=$key['policy_age']?>"></div>
                            </div>      
                            <div class="form-group"><label class="col-sm-3 control-label">Policy GST</label>
                                <div class="col-sm-8">
                                    <select class="form-control" name="policy_GST">
                                        <option value="1">Yes</option>
                                        <option value="0">No</option>
                                    </select>
                                </div>
                            </div> 
                            <div class="form-group " id="data_3">
                                <label class="col-sm-3 control-label">Policy DOC</label>
                                <div class="input-group date col-sm-7">
                                    <span class="input-group-addon">
                                        <i class="fa fa-calendar"></i>
                                    </span>
                                    <input type="text" class="form-control" value="<?=$key['policy_DOC']?>" onkeyup="caps(this)" placeholder="Policy Doc Date" name="policy_DOC">
                                </div>
                            </div>
                            <div class="form-group " id="data_3">
                                <label class="col-sm-3 control-label">Last Due</label>
                                <div class="input-group date col-sm-7">
                                    <span class="input-group-addon">
                                        <i class="fa fa-calendar"></i>
                                    </span>
                                    <input type="text" class="form-control" value="<?=$key['policy_last_due']?>" onkeyup="caps(this)" placeholder="Policy Last Due" name="policy_last_due">
                                </div>
                            </div>  
                            <div class="form-group " id="data_3">
                                <label class="col-sm-3 control-label">Policy Maturity Date</label>
                                <div class="input-group date col-sm-7">
                                    <span class="input-group-addon">
                                        <i class="fa fa-calendar"></i>
                                    </span>
                                    <input type="text" class="form-control" value="<?=$key['policy_maturity_date']?>" onkeyup="caps(this)" placeholder="Policy Maturity Date" name="policy_maturity_date">
                                </div>
                            </div>   
                            <div class="form-group"><label class="col-sm-3 control-label">Policy DAB</label>
                                <div class="col-sm-8"><input type="text" class="form-control" name="policy_DAB" onkeyup="caps(this)" placeholder="Policy DAB" value="<?=$key['policy_DAB']?>"></div>
                            </div>      
                            <div class="form-group"><label class="col-sm-3 control-label">Policy DAB Premium</label>
                                <div class="col-sm-8"><input type="text" class="form-control" name="policy_DAB_premium" onkeyup="caps(this)" placeholder="Policy DAB Premium" value="<?=$key['policy_DAB_premium']?>"></div>
                            </div>      
                            <div class="form-group"><label class="col-sm-3 control-label">Policy Extra Premium</label>
                                <div class="col-sm-8"><input type="text" class="form-control" name="policy_extra_premium" onkeyup="caps(this)" placeholder="Policy Extra Premium" value="<?=$key['policy_extra_premium']?>"></div>
                            </div>  
                            <div class="form-group " id="data_3">
                                <label class="col-sm-3 control-label">Prop Date</label>
                                <div class="input-group date col-sm-7">
                                    <span class="input-group-addon">
                                        <i class="fa fa-calendar"></i>
                                    </span>
                                    <input type="text" class="form-control" value="<?=$key['policy_prop_date']?>" onkeyup="caps(this)" placeholder="Prop Date" name="policy_prop_date">
                                </div>
                            </div>   
                            <div class="form-group"><label class="col-sm-3 control-label">Policy Class</label>
                                <div class="col-sm-8"><input type="text" class="form-control" name="policy_class" onkeyup="caps(this)" placeholder="Policy Class" value="<?=$key['policy_class']?>"></div>
                            </div>      
                            <div class="form-group"><label class="col-sm-3 control-label">Policy Qualification</label>
                                <div class="col-sm-8"><input type="text" class="form-control" name="policy_qualification" onkeyup="caps(this)" placeholder="Policy Qualification" value="<?=$key['policy_qualification']?>"></div>
                            </div>      
                            <div class="form-group"><label class="col-sm-3 control-label">Policy term rider</label>
                                <div class="col-sm-8"><input type="text" class="form-control" name="policy_term_rider" onkeyup="caps(this)" placeholder="Policy term rider" value="<?=$key['policy_term_rider']?>"></div>
                            </div>      
                            <div class="form-group"><label class="col-sm-3 control-label">Policy critical illness</label>
                                <div class="col-sm-8"><input type="text" class="form-control" name="policy_critical_illness" onkeyup="caps(this)" placeholder="Policy critical illness" value="<?=$key['policy_critical_illness']?>"></div>
                            </div>      
                            <div class="form-group"><label class="col-sm-3 control-label">Premium Waiver</label>
                                <div class="col-sm-8"><input type="text" class="form-control" name="policy_premium_waiver" onkeyup="caps(this)" placeholder="Premium Waiver" value="<?=$key['policy_premium_waiver']?>"></div>
                            </div>      
                            <div class="form-group"><label class="col-sm-3 control-label">Nominee Name</label>
                                <div class="col-sm-8"><input type="text" class="form-control" name="policy_nominee_name" onkeyup="caps(this)" placeholder="Nominee Name" value="<?=$key['policy_nominee_name']?>"></div>
                            </div>      
                            <div class="form-group"><label class="col-sm-3 control-label">Nominee Relation</label>
                                <div class="col-sm-8"><input type="text" class="form-control" name="policy_nominee_relation" onkeyup="caps(this)" placeholder="Nominee Relation" value="<?=$key['policy_nominee_relation']?>"></div>
                            </div>      
                            <div class="form-group"><label class="col-sm-3 control-label">Nominee Age</label>
                                <div class="col-sm-8"><input type="text" class="form-control" name="policy_nominee_age" onkeyup="caps(this)" placeholder="Nominee Age" value="<?=$key['policy_nominee_age']?>"></div>
                            </div>      
                            <div class="form-group"><label class="col-sm-3 control-label">Occupation</label>
                                <div class="col-sm-8"><input type="text" class="form-control" name="policy_occupation" onkeyup="caps(this)" placeholder="Occupation" value="<?=$key['policy_occupation']?>"></div>
                            </div>      
                            <div class="form-group"><label class="col-sm-3 control-label">Designation</label>
                                <div class="col-sm-8"><input type="text" class="form-control" name="policy_designation" onkeyup="caps(this)" placeholder="Designation" value="<?=$key['policy_designation']?>"></div>
                            </div>      
                            <div class="form-group"><label class="col-sm-3 control-label">Policy PAN No</label>
                                <div class="col-sm-8"><input type="text" class="form-control" name="policy_PAN_number" onkeyup="caps(this)" placeholder="Policy PAN Number" value="<?=$key['policy_PAN_number']?>"></div>
                            </div>      
                            <div class="form-group"><label class="col-sm-3 control-label">Policy Income</label>
                                <div class="col-sm-8"><input type="text" class="form-control" name="policy_income" onkeyup="caps(this)" placeholder="Policy Income" value="<?=$key['policy_income']?>"></div>
                            </div>     

                            <div class="form-group">
                            <label class="col-sm-3 control-label">Policy Status</label>
                                <div class="col-sm-8">
                                    <select class="form-control" name="policy_status">
                                        <option value="0">Select Status</option>
                                        <option value="1">Full Force</option>
                                        <option value="2">Matured</option>
                                        <option value="3">Death</option>
                                        <option value="4">Surrendor</option>
                                        <option value="5"></option>
                                        <option value="6"></option>
                                        <option value="7">Lapse</option>
                                        <option value="8">Other</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group"><label class="col-sm-3 control-label">Policy FU Premium</label>
                                <div class="col-sm-8"><input type="text" class="form-control" name="policy_FU_premium" onkeyup="caps(this)" placeholder="Policy FU Premium" value="<?=$key['policy_FU_premium']?>"></div>
                            </div>      
                            <div class="form-group">
                            <label class="col-sm-3 control-label">Policy Original Policy</label>
                                <div class="col-sm-8">
                                    <select class="form-control" name="policy_original_policy">
                                        <option value="1">Yes</option>
                                        <option value="0">No</option>
                                    </select>
                                </div>
                            </div>    
                            <div class="form-group"><label class="col-sm-3 control-label">Loan Amount</label>
                                <div class="col-sm-8"><input type="text" class="form-control" name="policy_loan_amt" onkeyup="caps(this)" placeholder="Loan Amount" value="<?=$key['policy_loan_amt']?>"></div>
                            </div>  
                            <div class="form-group " id="data_3">
                                <label class="col-sm-3 control-label">Loan Date</label>
                                <div class="input-group date col-sm-7">
                                    <span class="input-group-addon">
                                        <i class="fa fa-calendar"></i>
                                    </span>
                                    <input type="text" class="form-control" value="<?=$key['policy_loan_date']?>" onkeyup="caps(this)" placeholder="Loan Date" name="policy_loan_date">
                                </div>
                            </div>   
                            <div class="form-group"><label class="col-sm-3 control-label">NCO</label>
                                <div class="col-sm-8"><input type="text" class="form-control" name="policy_NCO" onkeyup="caps(this)" placeholder="NCO" value="<?=$key['policy_NCO']?>"></div>
                            </div>      
                            <div class="form-group">
                            <label class="col-sm-3 control-label">Pension Mode</label>
                                <div class="col-sm-8">
                                    <select class="form-control" name="policy_pension_mode">
                                        <option value="0">Select Pension Mode</option>
                                        <option value="1">Yearly</option>
                                        <option value="2">Half Yearly</option>
                                        <option value="3">Quaterly</option>
                                        <option value="12">Monthly</option>
                                    </select>
                                </div>
                            </div>    
                            <div class="form-group"><label class="col-sm-3 control-label">Pension Amount</label>
                                <div class="col-sm-8"><input type="text" class="form-control" name="policy_pension_amt" onkeyup="caps(this)" placeholder="Policy Amount" value="<?=$key['policy_pension_amt']?>"></div>
                            </div>      
                            <div class="form-group " id="data_3">
                                <label class="col-sm-3 control-label">Pension Start Date</label>
                                <div class="input-group date col-sm-7">
                                    <span class="input-group-addon">
                                        <i class="fa fa-calendar"></i>
                                    </span>
                                    <input type="text" class="form-control" value="<?=$key['policy_pension_start_date']?>" onkeyup="caps(this)" placeholder="Policy Start Date" name="policy_pension_start_date">
                                </div>
                            </div>
                            <div class="form-group"><label class="col-sm-3 control-label">Pension Assignment Trust</label>
                                <div class="col-sm-8"><input type="text" class="form-control" name="policy_assignment_trust" onkeyup="caps(this)" placeholder="Pension Assignment Trust" value="<?=$key['policy_assignment_trust']?>"></div>
                            </div>  
                            <div class="form-group"><label class="col-sm-3 control-label">Father Name</label>
                                <div class="col-sm-8"><input type="text" class="form-control" name="policy_father_name" onkeyup="caps(this)" placeholder="Father Name" value="<?=$key['policy_father_name']?>"></div>
                            </div>  
                            <div class="form-group"><label class="col-sm-3 control-label">Mother Name</label>
                                <div class="col-sm-8"><input type="text" class="form-control" name="policy_mother_name" onkeyup="caps(this)" placeholder="Mother Name" value="<?=$key['policy_mother_name']?>"></div>
                            </div>  
                            <div class="form-group"><label class="col-sm-3 control-label">Spouce Name</label>
                                <div class="col-sm-8"><input type="text" class="form-control" name="policy_spouce_name" onkeyup="caps(this)" placeholder="Spouce Name" value="<?=$key['policy_spouce_name']?>"></div>
                            </div>  
                            <div class="form-group"><label class="col-sm-3 control-label">Brother Name</label>
                                <div class="col-sm-8"><input type="text" class="form-control" name="policy_brother_name" onkeyup="caps(this)" placeholder="Brother Name" value="<?=$key['policy_brother_name']?>"></div>
                            </div>  
                            <div class="form-group"><label class="col-sm-3 control-label">Sister Name</label>
                                <div class="col-sm-8"><input type="text" class="form-control" name="policy_sister_name" onkeyup="caps(this)" placeholder="Sister Name" value="<?=$key['policy_sister_name']?>"></div>
                            </div>  
                            <div class="form-group"><label class="col-sm-3 control-label">Son Name</label>
                                <div class="col-sm-8"><input type="text" class="form-control" name="policy_son_name" onkeyup="caps(this)" placeholder="Son Name" value="<?=$key['policy_son_name']?>"></div>
                            </div> 
                            <div class="form-group"><label class="col-sm-3 control-label">Daughter Name</label>
                                <div class="col-sm-8"><input type="text" class="form-control" name="policy_doughter_name" onkeyup="caps(this)" placeholder="Daughter Name" value="<?=$key['policy_doughter_name']?>"></div>
                            </div> 
                            <div class="form-group"><label class="col-sm-3 control-label">Spouce Occupation</label>
                                <div class="col-sm-8"><input type="text" class="form-control" name="policy_spouce_occupation" onkeyup="caps(this)" placeholder="Spouce Occupation" value="<?=$key['policy_spouce_occupation']?>"></div>
                            </div> 
                            <div class="form-group"><label class="col-sm-3 control-label">Spouce Income</label>
                                <div class="col-sm-8"><input type="text" class="form-control" name="policy_spouce_income" onkeyup="caps(this)" placeholder="Spouce Income" value="<?=$key['policy_spouce_income']?>"></div>
                            </div> 
                            <div class="form-group " id="data_3">
                                <label class="col-sm-3 control-label">Date Of Birth</label>
                                <div class="input-group date col-sm-7">
                                    <span class="input-group-addon">
                                        <i class="fa fa-calendar"></i>
                                    </span>
                                    <input type="text" class="form-control" value="<?=$key['policy_DOB']?>" onkeyup="caps(this)" placeholder="Date of Birth" name="policy_DOB">
                                </div>
                            </div>  
                            <div class="form-group " id="data_3">
                                <label class="col-sm-3 control-label">Delivery Date</label>
                                <div class="input-group date col-sm-7">
                                    <span class="input-group-addon">
                                        <i class="fa fa-calendar"></i>
                                    </span>
                                    <input type="text" class="form-control" value="<?=$key['policy_delivery_date']?>" onkeyup="caps(this)" placeholder="Delivery Date" name="policy_delivery_date">
                                </div>
                            </div>  
                            <div class="form-group " id="data_3">
                                <label class="col-sm-3 control-label">MC Date</label>
                                <div class="input-group date col-sm-7">
                                    <span class="input-group-addon">
                                        <i class="fa fa-calendar"></i>
                                    </span>
                                    <input type="text" class="form-control" value="<?=$key['policy_MC_date']?>" onkeyup="caps(this)" placeholder="MC Date" name="policy_MC_date">
                                </div>
                            </div>  
                            <div class="form-group " id="data_3">
                                <label class="col-sm-3 control-label">LSCS Date</label>
                                <div class="input-group date col-sm-7">
                                    <span class="input-group-addon">
                                        <i class="fa fa-calendar"></i>
                                    </span>
                                    <input type="text" class="form-control" value="<?=$key['policy_LSCS_date']?>" onkeyup="caps(this)" placeholder="LSCS Date" name="policy_LSCS_date">
                                </div>
                            </div>  
                            <div class="form-group " id="data_3">
                                <label class="col-sm-3 control-label">MES Date</label>
                                <div class="input-group date col-sm-7">
                                    <span class="input-group-addon">
                                        <i class="fa fa-calendar"></i>
                                    </span>
                                    <input type="text" class="form-control" value="<?=$key['policy_MES_date']?>" onkeyup="caps(this)" placeholder="MES Date" name="policy_MES_date">
                                </div>
                            </div>  
                            <div class="form-group " id="data_3">
                                <label class="col-sm-3 control-label">Exaninat Date</label>
                                <div class="input-group date col-sm-7">
                                    <span class="input-group-addon">
                                        <i class="fa fa-calendar"></i>
                                    </span>
                                    <input type="text" class="form-control" value="<?=$key['policy_exaninat_date']?>" onkeyup="caps(this)" placeholder="Exaninat Date" name="policy_exaninat_date">
                                </div>
                            </div>  
                            <div class="form-group">
                                <div class="col-sm-12 col-sm-offset-4">
                                    <button class="btn btn-white" type="reset">Cancel</button>
                                    <button class="btn btn-primary" type="submit">Update</button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
</div>