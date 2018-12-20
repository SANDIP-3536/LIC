<div class="wrapper wrapper-content animated fadeInRight">
    <div class="row">
        <div class="col-lg-6 hidden" id="new_policy_registerss">
            <div class="col-lg-12">
             <!-- <a class="btn btn-danger btn-xs pull-right" href="<?=site_url('Admin/client_details')?>"><b>Show All Clients</b></a> -->
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>Add Policy</h5>
                        <span class="btn btn-success btn-xs pull-right close_new_policy"><i class="fa fa-times-circle" title="Close"></i></span>
                    </div>
                    <div class="ibox-content">
                        <form method="post" class="form-horizontal" action="<?=site_url('Admin/add_policy_details')?>" enctype="multipart/form-data" id="add_policy">
                            <div class="form-group">
                                <label class="col-sm-3 control-label">Agent<span style="color:red;">*</span></label>
                                <div class="col-sm-8">
                                    <select class="form-control" name="policy_agent_id" required>
                                        <option value="" disabled selected>Select Agent</option>
                                        <?php foreach ($agent_details as $key) { ?>
                                            <option value="<?=$key['agent_id']?>"> <?=$key['agent_short_code']?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                                <div class="col-sm-1">
                                    <center>
                                        <span class="btn btn-success btn-xs pull-right add_new_branch_policy"><i class="fa fa-plus" title="Add New Agent"></i></span>
                                    </center>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label">Branch<span style="color:red;">*</span></label>
                                <div class="col-sm-8">
                                    <select class="form-control" name="policy_branch_id" required>
                                        <option value="" disabled selected>Select Branch</option>
                                         <?php foreach ($branch_details as $key) { ?>
                                            <option value="<?=$key['branch_id']?>"> <?=$key['branch_code']?></option>
                                          <?php } ?>
                                    </select>
                                </div>
                                <div class="col-sm-1">
                                    <center>
                                        <span class="btn btn-success btn-xs pull-right add_new_branch_policy"><i class="fa fa-plus" title="Add New Branch"></i></span>
                                    </center>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label">Client<span style="color:red;">*</span></label>
                                <div class="col-sm-8">
                                    <select class="select2_demo_3 form-control" name="policy_client_id" id="policy_client_details" style="width:100%;">
                                        <option></option>
                                        <?php foreach ($client_details as $key) { ?>
                                            <option value="<?=$key['client_id']?>"><?=$key['client_prefix']?> <?=$key['client_last_name']?> <?=$key['client_first_name']?> <?=$key['client_middle_name']?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                                <div class="col-sm-1">
                                    <center>
                                        <span class="btn btn-success btn-xs pull-right add_new_client_policy"><i class="fa fa-plus" title="Add New Client"></i></span>
                                    </center>
                                </div>
                            </div>
                            <div class="ibox-title" style="border:none;border-top:1px dashed;   color:#1c84c6;">
                                <h5>Policy Details</h5>
                            </div>
                            <div class="form-group"><label class="col-sm-3 control-label">Policy No<span style="color:red;">*</span></label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" name="policy_number" onkeyup="caps(this)" id="policy_number" placeholder="Policy Number">
                                    <label class="policy_number_verification" hidden="" style="color:#cc5965; padding-top: -10px;"></label>
                                </div>
                            </div>
                            <div class="form-group"><label class="col-sm-3 control-label">Age</label>
                                <div class="col-sm-8"><input type="text" class="form-control" name="policy_age" onkeyup="caps(this)"    placeholder="Age"></div>
                            </div> 
                            <div class="form-group">
                            <label class="col-sm-3 control-label">Age Proof<span style="color:red;">*</span></label>
                                <div class="col-sm-8">
                                    <select class="form-control" name="policy_age_proof">
                                        <option value="">Select Proof</option>
                                        <option value="1">Adhar Card</option>
                                        <option value="2">Pan Card</option>
                                        <option value="3">Passport</option>
                                        <option value="4">School Living Certificate</option>
                                        <option value="5">Birth Certificate</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group"><label class="col-sm-3 control-label">Sum Assured</label>
                                <div class="col-sm-8"><input type="text" class="form-control" name="policy_sum_assurance" onkeyup="caps(this)"  placeholder="Sum Assured"></div>
                            </div>  
                            <div class="form-group " id="data_3">
                                <label class="col-sm-3 control-label">DOC<span style="color:red;">*</span></label>
                                <div class="input-group date col-sm-7" style="margin-left:28%;">
                                    <span class="input-group-addon">
                                        <i class="fa fa-calendar"></i>
                                    </span>
                                    <input type="text" class="form-control" onkeyup="caps(this)"    placeholder="<?php echo date('d-m-Y');?>" name="policy_DOC" id="DOC_date">
                                </div>
                            </div>
                            <div class="form-group"><label class="col-sm-3 control-label">Plan<span style="color:red;">*</span></label>
                                <div class="col-sm-8"><input type="text" class="form-control" name="policy_plan" onkeyup="caps(this)"   placeholder="Policy Plan"></div>
                            </div>   
                            <div class="form-group"><label class="col-sm-3 control-label">Term<span style="color:red;">*</span></label>
                                <div class="col-sm-8"><input type="text" class="form-control" name="policy_term" onkeyup="caps(this)"   placeholder="Policy Term"></div>
                            </div> 
                            <div class="form-group"><label class="col-sm-3 control-label">PPT<span style="color:red;">*</span></label>
                                <div class="col-sm-8"><input type="text" class="form-control" id="policy_PPT" name="policy_PPT" onkeyup="caps(this)"    placeholder="Policy PPT" id="policy_PPT"></div>
                            </div>
                            <div class="form-group">
                            <label class="col-sm-3 control-label">Mode<span style="color:red;">*</span></label>
                                <div class="col-sm-8">
                                    <select class="form-control" name="policy_mode_of_payment" id="policy_payment_mode">
                                        <option value="0">Select Payment Mode</option>
                                        <option value="1">Yearly</option>
                                        <option value="2">Half Yearly</option>
                                        <option value="3">Quaterly</option>
                                        <option value="12">Monthly</option>
                                        <option value="4">Salary Saving Scheme</option>
                                        <option value="5">One Time</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group"><label class="col-sm-3 control-label">Premium<span style="color:red;">*</span></label>
                                <div class="col-sm-8"><input type="text" class="form-control" name="policy_premium" onkeyup="caps(this)"    placeholder="Policy Premium"></div>
                            </div>      
                            <div class="form-group"><label class="col-sm-3 control-label">GST</label>
                                <div class="col-sm-8">
                                    <select class="form-control" name="policy_GST">
                                        <option value="1">Yes</option>
                                        <option value="0">No</option>
                                    </select>
                                </div>
                            </div> 
                            <div class="form-group">
                                <label class="col-sm-3 control-label">Last Due</label>
                                <div class="input-group date col-sm-7" style="margin-left:28%;">
                                    <span class="input-group-addon">
                                        <i class="fa fa-calendar"></i>
                                    </span>
                                    <input type="text" class="form-control" onkeyup="caps(this)"    placeholder="<?php echo date('d-m-Y');?>" name="policy_last_due" id="policy_last_due_date" readonly>
                                </div>
                            </div>  
                            <div class="form-group " id="data_3">
                                <label class="col-sm-3 control-label">Maturity Date<span style="color:red;">*</span></label>
                                <div class="input-group date col-sm-7" style="margin-left:28%;">
                                    <span class="input-group-addon">
                                        <i class="fa fa-calendar"></i>
                                    </span>
                                    <input type="text" class="form-control" onkeyup="caps(this)"    placeholder="<?php echo date('d-m-Y');?>" name="policy_maturity_date">
                                </div>
                            </div>   
                            <div class="form-group"><label class="col-sm-3 control-label">DAB</label>
                                <div class="col-sm-8"><input type="text" class="form-control" name="policy_DAB" onkeyup="caps(this)"    placeholder="Policy DAB"></div>
                            </div>      
                            <div class="form-group"><label class="col-sm-3 control-label">DAB Premium</label>
                                <div class="col-sm-8"><input type="text" class="form-control" name="policy_DAB_premium" onkeyup="caps(this)"    placeholder="Policy DAB Premium"></div>
                            </div>      
                            <div class="form-group"><label class="col-sm-3 control-label">Extra Premium</label>
                                <div class="col-sm-8"><input type="text" class="form-control" name="policy_extra_premium" onkeyup="caps(this)"  placeholder="Policy Extra Premium"></div>
                            </div>  
                            <div class="form-group " id="data_3">
                                <label class="col-sm-3 control-label">Prop Date</label>
                                <div class="input-group date col-sm-7" style="margin-left:28%;">
                                    <span class="input-group-addon">
                                        <i class="fa fa-calendar"></i>
                                    </span>
                                    <input type="text" class="form-control" onkeyup="caps(this)"    placeholder="<?php echo date('d-m-Y');?>" name="policy_prop_date">
                                </div>
                            </div>   
                            <div class="form-group"><label class="col-sm-3 control-label">Class</label>
                                <div class="col-sm-8">
                                    <select class="form-control policy_class_details" name="policy_class">
                                        <option class="">Select Class</option>
                                        <option class="MED">MED</option>
                                        <option class="NM">NM</option>
                                        <option class="NMS">NMS</option>
                                        <option class="NMG">NMG</option>
                                    </select>
                                </div>
                            </div>      
                            <div class="form-group"><label class="col-sm-3 control-label">Qualification</label>
                                <div class="col-sm-8"><input type="text" class="form-control" name="policy_qualification" onkeyup="caps(this)"  placeholder="Qualification"></div>
                            </div>      
                            <div class="form-group"><label class="col-sm-3 control-label">term rider</label>
                                <div class="col-sm-8"><input type="text" class="form-control" name="policy_term_rider" onkeyup="caps(this)"     placeholder="term rider"></div>
                            </div>      
                            <div class="form-group"><label class="col-sm-3 control-label">critical illness</label>
                                <div class="col-sm-8"><input type="text" class="form-control" name="policy_critical_illness" onkeyup="caps(this)"   placeholder="critical illness"></div>
                            </div>      
                            <div class="form-group"><label class="col-sm-3 control-label">Premium Waiver</label>
                                <div class="col-sm-8"><input type="text" class="form-control" name="policy_premium_waiver" onkeyup="caps(this)"     placeholder="Premium Waiver"></div>
                            </div>
                             <div class="form-group"><label class="col-sm-3 control-label">GRN. Add.</label>
                                <div class="col-sm-8"><input type="text" class="form-control" name="policy_grn_add" onkeyup="caps(this)"     placeholder="GRN Add."></div>
                            </div>
                            <div class="form-group">
                            <label class="col-sm-3 control-label">Status</label>
                                <div class="col-sm-8">
                                    <select class="form-control" name="policy_status">
                                        <option value="0">Select Status</option>
                                        <option value="1">1 - Full Force</option>
                                        <option value="2">2 - Matured</option>
                                        <option value="3">3 - Death</option>
                                        <option value="4">4 - Surrender</option>
                                        <option value="5">5 - Pacca Lopse No Paidup</option>
                                        <option value="6">6 - Pacca Lopse Paidup</option>
                                        <option value="7">7 - Lapse</option>
                                        <option value="8">8 - Other</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group" id="data_3">
                                <label class="col-sm-3 control-label">FUP</label>
                                <div class="input-group date col-sm-7" style="margin-left:28%;">
                                    <span class="input-group-addon">
                                        <i class="fa fa-calendar"></i>
                                    </span>
                                    <input type="text" class="form-control"  placeholder="<?php echo date('d-m-Y');?>" name="policy_FU_premium">
                                </div>
                            </div>      
                            <div class="form-group">
                            <label class="col-sm-3 control-label">Original Policy</label>
                                <div class="col-sm-8">
                                    <select class="form-control" id="policy_original_policy" name="policy_original_policy">
                                        <option value="1">Yes</option>
                                        <option value="0">No</option>
                                        <option value="2">Loan</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group"><label class="col-sm-3 control-label">Income</label>
                                <div class="col-sm-8"><input type="text" class="form-control" name="policy_income" onkeyup="caps(this)"     placeholder="Income"></div>
                            </div>     
                            <div class="ibox-title" style="border:none;border-top:1px dashed;   color:#1c84c6;">
                                <h5>Nominee Details</h5>
                            </div>      
                            <div class="form-group"><label class="col-sm-3 control-label">Full Name</label>
                                <div class="col-sm-8"><input type="text" class="form-control" name="policy_nominee_name" onkeyup="caps(this)"   placeholder="Nominee Name"></div>
                            </div>      
                            <div class="form-group"><label class="col-sm-3 control-label">Relation</label>
                                <div class="col-sm-8"><input type="text" class="form-control" name="policy_nominee_relation" onkeyup="caps(this)"   placeholder="Nominee Relation"></div>
                            </div>      
                            <div class="form-group"><label class="col-sm-3 control-label">Age</label>
                                <div class="col-sm-8"><input type="text" class="form-control" name="policy_nominee_age" onkeyup="caps(this)"    placeholder="Nominee Age"></div>
                            </div>      
                            <div class="form-group"><label class="col-sm-3 control-label">Occupation</label>
                                <div class="col-sm-8"><input type="text" class="form-control" name="policy_occupation" onkeyup="caps(this)"     placeholder="Occupation"></div>
                            </div>      
                            <div class="form-group"><label class="col-sm-3 control-label">Designation</label>
                                <div class="col-sm-8"><input type="text" class="form-control" name="policy_designation" onkeyup="caps(this)"    placeholder="Designation"></div>
                            </div>      
                            
                            <div class="ibox-title hidden" id="loan_details" style="border:none;border-top:1px dashed;color:#1c84c6;">
                                <h5>Loan Details</h5>
                            </div>    
                            <div class="form-group hidden" id="loan_amount"><label class="col-sm-3 control-label">Loan Amount</label>
                                <div class="col-sm-8"><input type="text" class="form-control" name="policy_loan_amt" onkeyup="caps(this)"   placeholder="Loan Amount"></div>
                            </div>  
                            <div class="form-group hidden" id="loan_date">
                                <label class="col-sm-3 control-label">Loan Date</label>
                                <div class="input-group date col-sm-7" style="margin-left:28%;" id="data_3">
                                    <span class="input-group-addon">
                                        <i class="fa fa-calendar"></i>
                                    </span>
                                    <input type="text" class="form-control"  onkeyup="caps(this)"    placeholder="<?php echo date('d-m-Y');?>" name="policy_loan_date">
                                </div>
                            </div>   
                            <br>
                            <div class="ibox-title" id="loan_details" style="border:none;border-top:1px dashed;color:#1c84c6;">
                                <h5>Pension Details</h5>
                            </div>    
                            <div class="form-group">
                            <label class="col-sm-3 control-label">Mode</label>
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
                            <div class="form-group"><label class="col-sm-3 control-label">Amount</label>
                                <div class="col-sm-8"><input type="text" class="form-control" name="policy_pension_amt" onkeyup="caps(this)"    placeholder="Policy Amount"></div>
                            </div>      
                            <div class="form-group " id="data_3">
                                <label class="col-sm-3 control-label">Start Date</label>
                                <div class="input-group date col-sm-7" style="margin-left:28%;">
                                    <span class="input-group-addon">
                                        <i class="fa fa-calendar"></i>
                                    </span>
                                    <input type="text" class="form-control" onkeyup="caps(this)"    placeholder="<?php echo date('d-m-Y');?>" name="policy_pension_start_date">
                                </div>
                            </div>
                            <div class="form-group"><label class="col-sm-3 control-label">NCO/Give</label>
                                <div class="col-sm-8"><input type="text" class="form-control" name="policy_NCO" onkeyup="caps(this)"    placeholder="NCO"></div>
                            </div>
                            <div class="form-group"><label class="col-sm-3 control-label"> Assignment Trust</label>
                                <div class="col-sm-8"><input type="text" class="form-control" name="policy_assignment_trust" onkeyup="caps(this)"   placeholder="Pension Assignment Trust"></div>
                            </div>  
                            <div class="form-group"><label class="col-sm-3 control-label">Remark</label>
                                <div class="col-sm-8"><input type="text" class="form-control" name="policy_remark" onkeyup="caps(this)"     placeholder="Remark"></div>
                            </div>
                            <div class="ibox-title" id="loan_details" style="border:none;border-top:1px dashed;color:#1c84c6;">
                                <h5>Family Details</h5>
                            </div> 
                            <div class="form-group"><label class="col-sm-3 control-label">Father Name</label>
                                <div class="col-sm-8"><input type="text" class="form-control" name="policy_father_name" onkeyup="caps(this)"    placeholder="Father Name"></div>
                            </div>  
                            <div class="form-group"><label class="col-sm-3 control-label">Mother Name</label>
                                <div class="col-sm-8"><input type="text" class="form-control" name="policy_mother_name" onkeyup="caps(this)"    placeholder="Mother Name"></div>
                            </div>  
                            <div class="form-group"><label class="col-sm-3 control-label">Brother Name</label>
                                <div class="col-sm-8"><input type="text" class="form-control" name="policy_brother_name" onkeyup="caps(this)"   placeholder="Brother Name"></div>
                            </div>  
                            <div class="form-group"><label class="col-sm-3 control-label">Sister Name</label>
                                <div class="col-sm-8"><input type="text" class="form-control" name="policy_sister_name" onkeyup="caps(this)"    placeholder="Sister Name"></div>
                            </div>  
                            <div class="form-group"><label class="col-sm-3 control-label">Son Name</label>
                                <div class="col-sm-8"><input type="text" class="form-control" name="policy_son_name" onkeyup="caps(this)"   placeholder="Son Name"></div>
                            </div> 
                            <div class="form-group"><label class="col-sm-3 control-label">Daughter Name</label>
                                <div class="col-sm-8"><input type="text" class="form-control" name="policy_doughter_name" onkeyup="caps(this)"  placeholder="Daughter Name"></div>
                            </div> 
                            <div class="ibox-title" id="loan_details" style="border:none;border-top:1px dashed;color:#1c84c6;">
                                <h5>Spouse Details</h5>
                            </div>
                            <div class="form-group"><label class="col-sm-3 control-label">Name</label>
                                <div class="col-sm-8"><input type="text" class="form-control" name="policy_spouce_name" onkeyup="caps(this)"    placeholder="Spouce Name"></div>
                            </div>  
                            <div class="form-group"><label class="col-sm-3 control-label">Occupation</label>
                                <div class="col-sm-8"><input type="text" class="form-control" name="policy_spouce_occupation" onkeyup="caps(this)"  placeholder="Spouce Occupation"></div>
                            </div> 
                            <div class="form-group"><label class="col-sm-3 control-label">Income</label>
                                <div class="col-sm-8"><input type="text" class="form-control" name="policy_spouce_income" onkeyup="caps(this)"  placeholder="Spouce Income"></div>
                            </div> 
                            <div class="form-group" id="data_3">
                                <label class="col-sm-3 control-label">DOB</label>
                                <div class="input-group date col-sm-7" style="margin-left:28%;">
                                    <span class="input-group-addon">
                                        <i class="fa fa-calendar"></i>
                                    </span>
                                    <input type="text" class="form-control" onkeyup="caps(this)"    placeholder="<?php echo date('d-m-Y');?>" name="policy_DOB">
                                </div>
                            </div>  
                            <div class="form-group hidden" id="data_3">
                                <label class="col-sm-3 control-label">Delivery Date</label>
                                <div class="input-group date col-sm-7" style="margin-left:28%;">
                                    <span class="input-group-addon">
                                        <i class="fa fa-calendar"></i>
                                    </span>
                                    <input type="text" class="form-control" onkeyup="caps(this)"    placeholder="<?php echo date('d-m-Y');?>" name="policy_delivery_date">
                                </div>
                            </div>  
                            <div class="form-group hidden" id="data_3">
                                <label class="col-sm-3 control-label">MC Date</label>
                                <div class="input-group date col-sm-7" style="margin-left:28%;">
                                    <span class="input-group-addon">
                                        <i class="fa fa-calendar"></i>
                                    </span>
                                    <input type="text" class="form-control"  onkeyup="caps(this)"    placeholder="<?php echo date('d-m-Y');?>" name="policy_MC_date">
                                </div>
                            </div>  
                            <div class="form-group hidden " id="data_3">
                                <label class="col-sm-3 control-label">LSCS Date</label>
                                <div class="input-group date col-sm-7" style="margin-left:28%;">
                                    <span class="input-group-addon">
                                        <i class="fa fa-calendar"></i>
                                    </span>
                                    <input type="text" class="form-control"  onkeyup="caps(this)"    placeholder="<?php echo date('d-m-Y');?>" name="policy_LSCS_date">
                                </div>
                            </div>
                            <div class="ibox-title" id="loan_details" style="border:none;border-top:1px dashed;color:#1c84c6;">
                                <h5>Medical Details</h5>
                            </div>
                            <div class="form-group hidden" id="doctor_name"><label class="col-sm-3 control-label">Doctor Name</label>
                                <div class="col-sm-8"><input type="text" class="form-control" name="policy_doctor_name" onkeyup="caps(this)"    placeholder="Doctor Name"></div>
                            </div>   
                            <div class="form-group hidden" id="medical_date">
                                <label class="col-sm-3 control-label">Medical Date</label>
                                <div class="input-group date col-sm-7" style="margin-left:28%;">
                                    <span class="input-group-addon">
                                        <i class="fa fa-calendar"></i>
                                    </span>
                                    <input type="text" class="form-control" onkeyup="caps(this)"    placeholder="<?php echo date('d-m-Y');?>" name="policy_MES_date">
                                </div>
                            </div>
                            <div class="form-group"><label class="col-sm-3 control-label">Identification Mark</label>
                                <div class="col-sm-8"><input type="text" class="form-control" name="policy_identification_mark" onkeyup="caps(this)"    placeholder="Identification Mark"></div>
                            </div>
                            <div class="form-group"><label class="col-sm-3 control-label">Height</label>
                                <div class="col-sm-8"><input type="text" class="form-control" name="policy_height" onkeyup="caps(this)"     placeholder="Height"></div>
                            </div> 
                            <div class="form-group"><label class="col-sm-3 control-label">Weight</label>
                                <div class="col-sm-8"><input type="text" class="form-control" name="policy_weight" onkeyup="caps(this)"     placeholder="Weight"></div>
                            </div>
                            <div class="form-group"><label class="col-sm-3 control-label">ABD</label>
                                <div class="col-sm-8"><input type="text" class="form-control" name="policy_ABD" onkeyup="caps(this)"    placeholder="ABD"></div>
                            </div>
                            <div class="form-group"><label class="col-sm-3 control-label">Chest</label>
                                <div class="col-sm-8"><input type="text" class="form-control" name="policy_chest" onkeyup="caps(this)"  placeholder="100-105"></div>
                            </div>
                            <div class="form-group hidden" id="teeth"><label class="col-sm-3 control-label">Teeth</label>
                                <div class="col-sm-8"><input type="text" class="form-control" name="policy_teeth" onkeyup="caps(this)"  placeholder="Teeth"></div>
                            </div>
                            <div class="form-group hidden" id="BP"><label class="col-sm-3 control-label">BP</label>
                                <div class="col-sm-8"><input type="text" class="form-control" name="policy_BP" onkeyup="caps(this)"  placeholder="180-190"></div>
                            </div>
                            <div class="form-group hidden" id="pulse"><label class="col-sm-3 control-label">Pulse</label>
                                <div class="col-sm-8"><input type="text" class="form-control" name="policy_pulse" onkeyup="caps(this)"  placeholder="Pulse"></div>
                            </div>
                            <div class="form-group hidden" id="vaccin"><label class="col-sm-3 control-label">Vaccin</label>
                                <div class="col-sm-8"><input type="text" class="form-control" name="policy_vaccin" onkeyup="caps(this)"  placeholder="Vaccin"></div>
                            </div>
                            <div class="form-group hidden" id="spect"><label class="col-sm-3 control-label">Spect</label>
                                <div class="col-sm-8">
                                    <select class="form-control" name="policy_spect" id="policy_spect_insert">
                                        <option value="No">No</option>
                                        <option value="Yes">Yes</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group hidden" id="spect_type"><label class="col-sm-3 control-label">Spect Type</label>
                                <div class="col-sm-8">
                                    <select class="form-control" name="policy_spect_type" id="policy_spect_type_insert">
                                        <option value="">Select Spect Type</option>
                                        <option value="Near">Near</option>
                                        <option value="Far">Far</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group hidden" id="spect_no_left"><label class="col-sm-3 control-label">Spect No. Left</label>
                                <div class="col-sm-8"><input type="text" class="form-control" name="policy_spect_left"  placeholder="0.5"></div>
                            </div>
                            <div class="form-group hidden" id="spect_no_right"><label class="col-sm-3 control-label">Spect No. Right</label>
                                <div class="col-sm-8"><input type="text" class="form-control" name="policy_spect_right"  placeholder="0.5"></div>
                            </div>
                            <div class="form-group hidden" id="operation"><label class="col-sm-3 control-label">Operation</label>
                                <div class="col-sm-8"><textarea cols="6" type="text" class="form-control" name="policy_operation" onkeyup="caps(this)"  placeholder="Operation"></textarea></div>
                            </div>
                            <div class="form-group hidden" id="special_report"><label class="col-sm-3 control-label">Special Reports</label>
                                <div class="col-sm-8"><textarea cols="6" type="text" class="form-control" name="policy_spl_reports" onkeyup="caps(this)"    placeholder="Special Report"></textarea></div>
                            </div>
                            <div class="ibox-title" style="border:none;border-top:1px dashed;color:#1c84c6;">
                                <h5>Previous Policy Details</h5>
                            </div>
                            <div class="table-responsive">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>Policy Number</th>
                                        </tr>
                                    </thead>
                                    <tbody class="previous_policy_stock">

                                    </tbody> 
                                </table>
                                <span class="add_previous_policy pull-right" style="color:#67C6F1; font-size: 08px;"><i class="fa fa-plus fa-2x" aria-hidden="true"><u style="margin-left: 5px;"> <b>New</b></u></i></span>
                            </div>  <br>
                            <!-- <div class="form-group">
                            <label class="col-sm-3 control-label">Previous Policy</label>
                                <div class="col-sm-8">
                                    <select class="form-control" name="policy_previous_policy">
                                        <option value="No">No</option>
                                        <option value="Self">Self</option>
                                        <option value="Father">Father</option>
                                        <option value="Mother">Mother</option>
                                        <option value="Brother">Brother</option>
                                        <option value="Sister">Sister</option>
                                        <option value="Spouse">Spouse</option>
                                    </select>
                                </div>
                            </div> -->
                            <div class="ibox-title" style="border:none;border-top:1px dashed;color:#1c84c6;">
                                <h5>SB Due Details</h5>
                            </div>
                            <div class="table-responsive">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>SB Due Date</th>
                                            <th>Amount</th>
                                            <th>Age</th>
                                        </tr>
                                    </thead>
                                    <tbody class="SB_stock">

                                    </tbody> 
                                </table>
                                <span class="add_SB pull-right" style="color:#67C6F1; font-size: 08px;"><i class="fa fa-plus fa-2x" aria-hidden="true"><u style="margin-left: 5px;"> <b>New</b></u></i></span>
                            </div>   
                            <!-- <div class="form-group " id="data_3">
                                <label class="col-sm-3 control-label">Exaninat Date</label>
                                <div class="input-group date col-sm-7">
                                    <span class="input-group-addon">
                                        <i class="fa fa-calendar"></i>
                                    </span>
                                    <input type="text" class="form-control" value="<?php echo date('d-m-Y');?>" onkeyup="caps(this)"    placeholder="Exaninat Date" name="policy_exaninat_date">
                                </div>
                            </div>  --> 
                            <div class="form-group">
                                <div class="col-sm-12 col-sm-offset-4">
                                    <button class="btn btn-white" type="reset">Reset</button>
                                    <button class="btn btn-primary" type="submit">Add Policy</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-6 hidden" id="register_policy_details">
            <div class="col-lg-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <div class="col-lg-6">
                            <h5>Policy Details</h5>
                        </div>
                        <div class="col-lg-6" style="text-align:right;padding:0px;">
                            <span class="btn btn-success btn-xs update_policy_details"><i class="fa fa-pencil" title="Edit"></i></span>
                            <span class="btn btn-success btn-xs" data-toggle="modal" data-target="#deletePolicy"><i class="fa fa-trash" title="Delete Policy"></i></span>
                            <span class="btn btn-success btn-xs close_new_policy_details"><i class="fa fa-times-circle" title="Close"></i></span>
                        </div>
                    </div>
                    <div class="ibox-content">
                        <form class="form-horizontal" enctype="multipart/form-data">
                            <div class="form-group">
                                <label class="col-sm-3 control-label" style="text-align:left;">Agent Name  </label>
                                <div class="col-sm-1">:</div>
                                <div class="col-sm-8" style="padding-top:1%;">
                                    <span class="policy_view_agent_name"></span>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label" style="text-align:left;">branch Name </label>
                                <div class="col-sm-1">:</div>
                                <div class="col-sm-8" style="padding-top:1%;">
                                    <span class="policy_view_branch_name"></span>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label" style="text-align:left;">client Name  </label>
                                <div class="col-sm-1">:</div>
                                <div class="col-sm-8" style="padding-top:1%;">
                                    <span class="policy_view_client_name"></span>
                                </div>
                            </div>
                           <div class="ibox-title" style="border:none;border-top:1px dashed;   color:#1c84c6;">
                                <h5>Policy Details</h5>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label" style="text-align:left;" style="text-align:left;">Policy Number </label>
                                <div class="col-sm-1">:</div>
                                <div class="col-sm-8" style="padding-top:1%;">
                                    <span class="policy_view_policy_number"></span>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label" style="text-align:left;" style="text-align:left;">Age</label>
                                <div class="col-sm-1">:</div>
                                <div class="col-sm-8" style="padding-top:1%;">
                                    <span class="policy_view_age"></span>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label" style="text-align:left;">Age Proof</label>
                                <div class="col-sm-1">:</div>
                                <div class="col-sm-8" style="padding-top:1%;">
                                    <span class="policy_view_age_proof"></span>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label" style="text-align:left;">Sum Assured</label>
                                <div class="col-sm-1">:</div>
                                <div class="col-sm-8" style="padding-top:1%;">
                                    <span class="policy_view_sum_assured"></span>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label" style="text-align:left;">Plan</label>
                                <div class="col-sm-1">:</div>
                                <div class="col-sm-8" style="padding-top:1%;">
                                    <span class="policy_view_plan"></span>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label" style="text-align:left;">Term</label>
                                <div class="col-sm-1">:</div>
                                <div class="col-sm-8" style="padding-top:1%;">
                                    <span class="policy_view_term"></span>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label" style="text-align:left;">PPT</label>
                                <div class="col-sm-1">:</div>
                                <div class="col-sm-8" style="padding-top:1%;">
                                    <span class="policy_view_PPT"></span>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label" style="text-align:left;">Payment Mode</label>
                                <div class="col-sm-1">:</div>
                                <div class="col-sm-8" style="padding-top:1%;">
                                    <span class="policy_view_payment_mode"></span>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label" style="text-align:left;">DOC</label>
                                <div class="col-sm-1">:</div>
                                <div class="col-sm-8" style="padding-top:1%;">
                                    <span class="policy_view_DOC"></span>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label" style="text-align:left;">Premium</label>
                                <div class="col-sm-1">:</div>
                                <div class="col-sm-8" style="padding-top:1%;">
                                    <span class="policy_view_premium"></span>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label" style="text-align:left;">GST</label>
                                <div class="col-sm-1">:</div>
                                <div class="col-sm-8" style="padding-top:1%;">
                                    <span class="policy_view_GST"></span>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label" style="text-align:left;">Due Date</label>
                                <div class="col-sm-1">:</div>
                                <div class="col-sm-8" style="padding-top:1%;">
                                    <span class="policy_view_due_date"></span>
                                </div>
                            </div> 
                            <!-- <div class="form-group">
                                <label class="col-sm-3 control-label" style="text-align:left;">Maturity Date</label>
                                <div class="col-sm-1">:</div>
                                <div class="col-sm-8" style="padding-top:1%;">
                                    <span class="policy_view_maturity_date"></span>
                                </div>
                            </div> -->
                            <div class="form-group">
                                <label class="col-sm-3 control-label" style="text-align:left;">DAB</label>
                                <div class="col-sm-1">:</div>
                                <div class="col-sm-8" style="padding-top:1%;">
                                    <span class="policy_view_DAB"></span>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label" style="text-align:left;">DAB Premium</label>
                                <div class="col-sm-1">:</div>
                                <div class="col-sm-8" style="padding-top:1%;">
                                    <span class="policy_view_DAB_premium"></span>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label" style="text-align:left;">Extra Premium</label>
                                <div class="col-sm-1">:</div>
                                <div class="col-sm-8" style="padding-top:1%;">
                                    <span class="policy_view_extra_premium"></span>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label" style="text-align:left;">Prop Date</label>
                                <div class="col-sm-1">:</div>
                                <div class="col-sm-8" style="padding-top:1%;">
                                    <span class="policy_view_prop_date"></span>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label" style="text-align:left;">Class</label>
                                <div class="col-sm-1">:</div>
                                <div class="col-sm-8" style="padding-top:1%;">
                                    <span class="policy_view_class"></span>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label" style="text-align:left;">Qualification</label>
                                <div class="col-sm-1">:</div>
                                <div class="col-sm-8" style="padding-top:1%;">
                                    <span class="policy_view_qualification"></span>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label" style="text-align:left;">Term Rider</label>
                                <div class="col-sm-1">:</div>
                                <div class="col-sm-8" style="padding-top:1%;">
                                    <span class="policy_view_term_rider"></span>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label" style="text-align:left;">Critical illness</label>
                                <div class="col-sm-1">:</div>
                                <div class="col-sm-8" style="padding-top:1%;">
                                    <span class="policy_view_critical_illness"></span>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label" style="text-align:left;">Premium Waiver</label>
                                <div class="col-sm-1">:</div>
                                <div class="col-sm-8" style="padding-top:1%;">
                                    <span class="policy_view_premium_waiver"></span>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label" style="text-align:left;">GRN Add </label>
                                <div class="col-sm-1">:</div>
                                <div class="col-sm-8" style="padding-top:1%;">
                                    <span class="policy_view_GRN_add"></span>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label" style="text-align:left;">Status</label>
                                <div class="col-sm-1">:</div>
                                <div class="col-sm-8" style="padding-top:1%;">
                                    <span class="policy_view_status"></span>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label" style="text-align:left;">FU Premium</label>
                                <div class="col-sm-1">:</div>
                                <div class="col-sm-8" style="padding-top:1%;">
                                    <span class="policy_view_FU_premium"></span>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label" style="text-align:left;">Original Policy</label>
                                <div class="col-sm-1">:</div>
                                <div class="col-sm-8" style="padding-top:1%;">
                                    <span class="policy_view_original_policy"></span>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label" style="text-align:left;">NCO</label>
                                <div class="col-sm-1">:</div>
                                <div class="col-sm-8" style="padding-top:1%;">
                                    <span class="policy_view_NCO"></span>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label" style="text-align:left;">Income</label>
                                <div class="col-sm-1">:</div>
                                <div class="col-sm-8" style="padding-top:1%;">
                                    <span class="policy_view_income"></span>
                                </div>
                            </div>
                            <div class="ibox-title" style="border:none;border-top:1px dashed;   color:#1c84c6;">
                                <h5>Loan Details</h5>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label" style="text-align:left;">Amount</label>
                                <div class="col-sm-1">:</div>
                                <div class="col-sm-8" style="padding-top:1%;">
                                    <span class="policy_view_loan_amount"></span>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label" style="text-align:left;">Date</label>
                                <div class="col-sm-1">:</div>
                                <div class="col-sm-8" style="padding-top:1%;">
                                    <span class="policy_view_loan_date"></span>
                                </div>
                            </div>
                            <div class="ibox-title" style="border:none;border-top:1px dashed;   color:#1c84c6;">
                                <h5>Nominee Details</h5>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label" style="text-align:left;">Name</label>
                                <div class="col-sm-1">:</div>
                                <div class="col-sm-8" style="padding-top:1%;">
                                    <span class="policy_view_name"></span>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label" style="text-align:left;">Relation</label>
                                <div class="col-sm-1">:</div>
                                <div class="col-sm-8" style="padding-top:1%;">
                                    <span class="policy_view_relation"></span>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label" style="text-align:left;">Age</label>
                                <div class="col-sm-1">:</div>
                                <div class="col-sm-8" style="padding-top:1%;">
                                    <span class="policy_view_nominee_age"></span>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label" style="text-align:left;">Occupation</label>
                                <div class="col-sm-1">:</div>
                                <div class="col-sm-8" style="padding-top:1%;">
                                    <span class="policy_view_occupation"></span>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label" style="text-align:left;">Designation</label>
                                <div class="col-sm-1">:</div>
                                <div class="col-sm-8" style="padding-top:1%;">
                                    <span class="policy_view_designation"></span>
                                </div>
                            </div>
                            <div class="ibox-title" style="border:none;border-top:1px dashed;   color:#1c84c6;">
                                <h5>Pension Details</h5>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label" style="text-align:left;">Mode</label>
                                <div class="col-sm-1">:</div>
                                <div class="col-sm-8" style="padding-top:1%;">
                                    <span class="policy_view_pension_mode"></span>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label" style="text-align:left;">Amount</label>
                                <div class="col-sm-1">:</div>
                                <div class="col-sm-8" style="padding-top:1%;">
                                    <span class="policy_view_pension_amount"></span>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label" style="text-align:left;">Start Date</label>
                                <div class="col-sm-1">:</div>
                                <div class="col-sm-8" style="padding-top:1%;">
                                    <span class="policy_view_start_date"></span>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label" style="text-align:left;">Assign Trust</label>
                                <div class="col-sm-1">:</div>
                                <div class="col-sm-8" style="padding-top:1%;">
                                    <span class="policy_view_assign_trust"></span>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label" style="text-align:left;">Remark</label>
                                <div class="col-sm-1">:</div>
                                <div class="col-sm-8" style="padding-top:1%;">
                                    <span class="policy_view_remark"></span>
                                </div>
                            </div>
                            <div class="ibox-title" style="border:none;border-top:1px dashed;   color:#1c84c6;">
                                <h5>Family Details</h5>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label" style="text-align:left;">Father Name</label>
                                <div class="col-sm-1">:</div>
                                <div class="col-sm-8" style="padding-top:1%;">
                                    <span class="policy_view_father_name"></span>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label" style="text-align:left;">Mother Name</label>
                                <div class="col-sm-1">:</div>
                                <div class="col-sm-8" style="padding-top:1%;">
                                    <span class="policy_view_mother_name"></span>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label" style="text-align:left;">Brother Name</label>
                                <div class="col-sm-1">:</div>
                                <div class="col-sm-8" style="padding-top:1%;">
                                    <span class="policy_view_brother_name"></span>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label" style="text-align:left;">Sister Name</label>
                                <div class="col-sm-1">:</div>
                                <div class="col-sm-8" style="padding-top:1%;">
                                    <span class="policy_view_sister_name"></span>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label" style="text-align:left;">Son Name</label>
                                <div class="col-sm-1">:</div>
                                <div class="col-sm-8" style="padding-top:1%;">
                                    <span class="policy_view_son_name"></span>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label" style="text-align:left;">Daughter Name</label>
                                <div class="col-sm-1">:</div>
                                <div class="col-sm-8" style="padding-top:1%;">
                                    <span class="policy_view_daughter_name"></span>
                                </div>
                            </div>
                            <div class="ibox-title" style="border:none;border-top:1px dashed;   color:#1c84c6;">
                                <h5>Spouse Details</h5>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label" style="text-align:left;">Name</label>
                                <div class="col-sm-1">:</div>
                                <div class="col-sm-8" style="padding-top:1%;">
                                    <span class="policy_view_spouse_name"></span>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label" style="text-align:left;">Occupation</label>
                                <div class="col-sm-1">:</div>
                                <div class="col-sm-8" style="padding-top:1%;">
                                    <span class="policy_view_spouse_occupation"></span>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label" style="text-align:left;">Income</label>
                                <div class="col-sm-1">:</div>
                                <div class="col-sm-8" style="padding-top:1%;">
                                    <span class="policy_view_spouse_income"></span>
                                </div>
                            </div>
                            <div class="ibox-title" style="border:none;border-top:1px dashed;   color:#1c84c6;">
                                <h5>Medical Details</h5>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label" style="text-align:left;">Doctor Name</label>
                                <div class="col-sm-1">:</div>
                                <div class="col-sm-8" style="padding-top:1%;">
                                    <span class="policy_view_doctor_name"></span>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label" style="text-align:left;">Medical Date</label>
                                <div class="col-sm-1">:</div>
                                <div class="col-sm-8" style="padding-top:1%;">
                                    <span class="policy_view_medical_date"></span>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label" style="text-align:left;">Identification Mark</label>
                                <div class="col-sm-1">:</div>
                                <div class="col-sm-8" style="padding-top:1%;">
                                    <span class="policy_view_identification_mark"></span>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label" style="text-align:left;">Height</label>
                                <div class="col-sm-1">:</div>
                                <div class="col-sm-8" style="padding-top:1%;">
                                    <span class="policy_view_height"></span>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label" style="text-align:left;">Weight</label>
                                <div class="col-sm-1">:</div>
                                <div class="col-sm-8" style="padding-top:1%;">
                                    <span class="policy_view_weight"></span>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label" style="text-align:left;">ABD</label>
                                <div class="col-sm-1">:</div>
                                <div class="col-sm-8" style="padding-top:1%;">
                                    <span class="policy_view_ABD"></span>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label" style="text-align:left;">Chest</label>
                                <div class="col-sm-1">:</div>
                                <div class="col-sm-8" style="padding-top:1%;">
                                    <span class="policy_view_chest"></span>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label" style="text-align:left;">BP</label>
                                <div class="col-sm-1">:</div>
                                <div class="col-sm-8" style="padding-top:1%;">
                                    <span class="policy_view_BP"></span>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label" style="text-align:left;">Pulse</label>
                                <div class="col-sm-1">:</div>
                                <div class="col-sm-8" style="padding-top:1%;">
                                    <span class="policy_view_pulse"></span>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label" style="text-align:left;">Vaccin</label>
                                <div class="col-sm-1">:</div>
                                <div class="col-sm-8" style="padding-top:1%;">
                                    <span class="policy_view_vaccin"></span>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label" style="text-align:left;">Spect</label>
                                <div class="col-sm-1">:</div>
                                <div class="col-sm-8" style="padding-top:1%;">
                                    <span class="policy_view_spect"></span>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label" style="text-align:left;">Opration</label>
                                <div class="col-sm-1">:</div>
                                <div class="col-sm-8" style="padding-top:1%;">
                                    <span class="policy_view_operation"></span>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label" style="text-align:left;">Special Report</label>
                                <div class="col-sm-1">:</div>
                                <div class="col-sm-8" style="padding-top:1%;">
                                    <span class="policy_view_special_report"></span>
                                </div>
                            </div>
                        </form>
                        <div class="ibox-title" style="border:none;border-top:1px dashed;   color:#1c84c6;">
                            <h5>Previous Policy Details</h5>
                        </div>
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Policy Number</th>
                                    </tr>
                                </thead>
                                <tbody class="PP_details">

                                </tbody> 
                            </table>
                        </div>
                        <div class="ibox-title" style="border:none;border-top:1px dashed;   color:#1c84c6;">
                            <div class="col-sm-6">
                                <h5>SB Details</h5>
                            </div>
                             <div class="col-lg-6" style="text-align:right;padding:0px;">
                                <button class="btn btn-warning btn-xs" data-toggle="modal" data-target="#updateSB_Due"><i class="fa fa-pencil"></i></button>
                                <span class="btn btn-success btn-xs" data-toggle="modal" data-target="#addSBDue"><i class="fa fa-plus" title="Add SB_Due"></i></span>
                            </div>
                        </div>
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>SB Due Date</th>
                                        <th>Amount</th>
                                        <th>Age</th>
                                    </tr>
                                </thead>
                                <tbody class="SB_details">

                                </tbody> 
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-6 hidden" id="register_policy_update_details">
            <div class="col-lg-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <div class="col-lg-6">
                            <h5>Policy Details</h5>
                        </div>
                        <div class="col-lg-6" style="text-align:right;padding:0px;">
                            <span class="btn btn-success btn-xs pull-right close_new_policy_details"><i class="fa fa-times-circle" title="Close"></i></span>
                        </div>
                    </div>
                    <div class="ibox-content">
                        <form method="post" class="form-horizontal" id="update_policyDetails" action="<?=site_url('Admin/edit_policy')?>" enctype="multipart/form-data">
                            <div class="form-group hidden">
                                <label class="col-sm-3 control-label">Policy ID</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control policy_view_policy_id_edit" name="policy_id" onkeyup="caps(this)">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label">Agent</label>
                                <div class="col-sm-8" id="edit_name_agent">
                                    <input type="text" class="form-control policy_view_agent_name_edit" name="" readonly>
                                </div>
                                <div class="col-sm-8 hidden" id="list_edit_name_agent">
                                    <select class="form-control" name="policy_agent_id">
                                        <option value="">Select Agent</option>
                                        <?php foreach ($agent_details as $key) { ?>
                                            <option value="<?=$key['agent_id']?>"> <?=$key['agent_short_code']?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                                <div class="col-sm-1" id="edit_new_name_agent">
                                    <center>
                                        <span class="btn btn-success btn-xs pull-right edit_new_name_agent"><i class="fa fa-pencil" title=""></i></span>
                                    </center>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label">Branch</label>
                                <div class="col-sm-8" id="edit_name_branch">
                                    <input type="text" class="form-control policy_view_branch_name_edit" readonly>
                                </div>
                                <div class="col-sm-8 hidden" id="list_edit_name_branch">
                                    <select class="form-control" name="policy_branch_id">
                                        <option value="">Select Branch</option>
                                         <?php foreach ($branch_details as $key) { ?>
                                            <option value="<?=$key['branch_id']?>"> <?=$key['branch_code']?></option>
                                          <?php } ?>
                                    </select>
                                </div>
                                <div class="col-sm-1" id="edit_new_name_branch">
                                    <center>
                                        <span class="btn btn-success btn-xs pull-right edit_new_name_branch"><i class="fa fa-pencil" title=""></i></span>
                                    </center>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label">Policy Number</label>
                                <div class="col-sm-8"><input type="text" class="form-control policy_view_policy_number_edit" name="policy_number" onkeyup="caps(this)"></div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label">Age</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control policy_view_age_edit" name="policy_age" onkeyup="caps(this)">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label">Age Proof</label>
                                <div class="col-sm-8"  id="edit_age_proff">
                                    <input type="text" class="form-control policy_view_age_proof_edit" name="policy_age_proof" onkeyup="caps(this)" readonly>
                                </div>
                                <div class="col-sm-8 hidden"  id="list_edit_age_proff">
                                    <select class="form-control" name="policy_age_proof_1">
                                        <option></option>
                                        <option value="1">Adhar Card</option>
                                        <option value="2">Pan Card</option>
                                        <option value="3">Passport</option>
                                        <option value="4">School Living Certificate</option>
                                        <option value="5">Birth Certificate</option>
                                    </select>
                                </div>
                                <div class="col-sm-1" id="edit_new_age_proff">
                                    <center>
                                        <span class="btn btn-success btn-xs pull-right edit_new_age_proff"><i class="fa fa-pencil" title=""></i></span>
                                    </center>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label">Sum Assured</label>
                                <div class="col-sm-8"><input type="text" class="form-control policy_view_sum_assured_edit" name="policy_sum_assurance" onkeyup="caps(this)"></div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label">Plan</label>
                                <div class="col-sm-8"><input type="text" class="form-control policy_view_plan_edit" name="policy_plan" onkeyup="caps(this)"></div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label">Term</label>
                                <div class="col-sm-8"><input type="text" class="form-control policy_view_term_edit" name="policy_term" onkeyup="caps(this)"></div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label">PPT</label>
                                <div class="col-sm-8"><input type="text" class="form-control policy_view_PPT_edit" name="policy_PPT" id="policy_PPT1"></div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label">Payment Mode</label>
                                <div class="col-sm-8" id="edit_mode_of_payemnt">
                                    <input type="text" class="form-control policy_view_payment_mode_edit" name="policy_mode_of_payment" onkeyup="caps(this)" readonly>
                                </div>
                                <div class="col-sm-8 hidden" id="list_edit_mode_of_payemnt">
                                    <select class="form-control" name="policy_payment_mode_1" id="policy_payment_mode1">
                                        <option></option>
                                        <option value="1">Yearly</option>
                                        <option value="2">Half Yearly</option>
                                        <option value="3">Quaterly</option>
                                        <option value="12">Monthly</option>
                                        <option value="4">Salary Saving Scheme</option>
                                        <option value="5">One Time</option>
                                    </select>
                                </div>
                                <div class="col-sm-1" id="edit_new_mode_of_payment">
                                    <center>
                                        <span class="btn btn-success btn-xs pull-right edit_new_mode_of_payment"><i class="fa fa-pencil" title=""></i></span>
                                    </center>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label">DOC</label>
                                <div class="col-sm-8"><input type="text" class="form-control policy_view_DOC_edit" name="policy_DOC" id="DOC_date1"></div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label">Premium</label>
                                <div class="col-sm-8"><input type="text" class="form-control policy_view_premium_edit" name="policy_premium" onkeyup="caps(this)"></div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label">GST</label>
                                <div class="col-sm-8" id="edit_GST">
                                    <input type="text" class="form-control policy_view_GST_edit" name="policy_GST" onkeyup="caps(this)" readonly>
                                </div>
                                <div class="col-sm-8 hidden" id="list_edit_GST">
                                    <select class="form-control" name="policy_GST_1">
                                        <option></option>
                                        <option value="1">Yes</option>
                                        <option value="0">No</option>
                                    </select>
                                </div>
                                <div class="col-sm-1" id="edit_new_GST">
                                    <center>
                                        <span class="btn btn-success btn-xs pull-right edit_new_GST"><i class="fa fa-pencil" title=""></i></span>
                                    </center>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label">Due Date</label>
                                <div class="col-sm-8"><input type="text" class="form-control policy_view_due_date_edit" name="policy_last_due" id="policy_last_due_date1" readonly></div>
                            </div>
                             <div class="form-group">
                                <label class="col-sm-3 control-label">Maturity Date</label>
                                <div class="col-sm-8"><input type="text" class="form-control policy_view_maturity_date_edit" name="policy_maturity_date" id="policy_last_maturity_date1"></div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label">DAB</label>
                                <div class="col-sm-8"><input type="text" class="form-control policy_view_DAB_edit" name="policy_DAB" onkeyup="caps(this)"></div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label">DAB Premium</label>
                                <div class="col-sm-8"><input type="text" class="form-control policy_view_DAB_premium_edit" name="policy_DAB_premium" onkeyup="caps(this)"></div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label">Extra Premium</label>
                                <div class="col-sm-8"><input type="text" class="form-control policy_view_extra_premium_edit" name="policy_extra_premium" onkeyup="caps(this)"></div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label">Prop Date</label>
                                <div class="col-sm-8"><input type="text" class="form-control policy_view_prop_date_edit" name="policy_prop_date" onkeyup="caps(this)"></div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label">Class</label>
                                <div class="col-sm-8" id="edit_class">
                                    <input type="text" class="form-control policy_view_class_edit" name="policy_class" onkeyup="caps(this)" readonly>
                                </div>
                                <div class="col-sm-8 hidden" id="list_edit_class">
                                     <select class="form-control policy_class_details" name="policy_class_1">
                                        <option></option>
                                        <option class="MED">MED</option>
                                        <option class="NM">NM</option>
                                        <option class="NMS">NMS</option>
                                        <option class="NMG">NMG</option>
                                    </select>
                                </div>
                                <div class="col-sm-1" id="edit_new_class">
                                    <center>
                                        <span class="btn btn-success btn-xs pull-right edit_new_class"><i class="fa fa-pencil" title=""></i></span>
                                    </center>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label">Qualification</label>
                                <div class="col-sm-8"><input type="text" class="form-control policy_view_qualification_edit" name="policy_qualification" onkeyup="caps(this)"></div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label">Term Rider</label>
                                <div class="col-sm-8"><input type="text" class="form-control policy_view_term_rider_edit" name="policy_term_rider" onkeyup="caps(this)"></div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label">Critical illness</label>
                                <div class="col-sm-8"><input type="text" class="form-control policy_view_critical_illness_edit" name="policy_critical_illness" onkeyup="caps(this)"></div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label">Premium Waiver</label>
                                <div class="col-sm-8"><input type="text" class="form-control policy_view_premium_waiver_edit" name="policy_premium_waiver" onkeyup="caps(this)"></div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label">GRN Add</label>
                                <div class="col-sm-8"><input type="text" class="form-control policy_view_GRN_add_edit" name="policy_grn_add" onkeyup="caps(this)"></div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label">Status</label>
                                <div class="col-sm-8" id="edit_status">
                                    <input type="text" class="form-control policy_view_status_edit" name="policy_status" onkeyup="caps(this)" readonly>
                                </div>
                                <div class="col-sm-8 hidden" id="list_edit_status">
                                    <select class="form-control" name="policy_status_1">
                                        <option value="0">Select Status</option>
                                        <option value="1">1 - Full Force</option>
                                        <option value="2">2 - Matured</option>
                                        <option value="3">3 - Death</option>
                                        <option value="4">4 - Surrender</option>
                                        <option value="5">5 - Pacca Lopse No Paidup</option>
                                        <option value="6">6 - Pacca Lopse Paidup</option>
                                        <option value="7">7 - Lapse</option>
                                        <option value="8">8 - Other</option>
                                    </select>
                                </div>
                                <div class="col-sm-1" id="edit_new_status">
                                    <center>
                                        <span class="btn btn-success btn-xs pull-right edit_new_status"><i class="fa fa-pencil" title=""></i></span>
                                    </center>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label">FU Premium</label>
                                <div class="col-sm-8"><input type="text" class="form-control policy_view_FU_premium_edit" name="policy_FU_premium" onkeyup="caps(this)"></div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label">Original Policy</label>
                                <div class="col-sm-8" id="edit_original_policy">
                                    <input type="text" class="form-control policy_view_original_policy_edit" name="policy_original_policy" onkeyup="caps(this)" readonly>
                                </div>
                                <div class="col-sm-8 hidden" id="list_edit_original_policy">
                                    <select class="form-control edit_policy_original_policy" name="policy_original_policy_1">
                                        <option></option>
                                        <option value="1">Yes</option>
                                        <option value="0">No</option>
                                        <option value="2">Loan</option>
                                    </select>
                                </div>
                                <div class="col-sm-1" id="edit_new_original_policy">
                                    <center>
                                        <span class="btn btn-success btn-xs pull-right edit_new_original_policy"><i class="fa fa-pencil" title=""></i></span>
                                    </center>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label">NCO</label>
                                <div class="col-sm-8"><input type="text" class="form-control policy_view_NCO_edit" name="policy_NCO" onkeyup="caps(this)"></div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label">Income</label>
                                <div class="col-sm-8"><input type="text" class="form-control policy_view_income_edit" name="policy_income" onkeyup="caps(this)"></div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label">Mode</label>
                                <div class="col-sm-8" id="edit_pension_mode">
                                    <input type="text" class="form-control policy_view_pension_mode_edit" name="policy_pension_mode" onkeyup="caps(this)" readonly>
                                </div>
                                <div class="col-sm-8 hidden" id="list_edit_pension_mode">
                                    <select class="form-control" name="policy_pension_mode_1">
                                        <option></option>
                                         <option value="1">Yearly</option>
                                        <option value="2">Half Yearly</option>
                                        <option value="3">Quaterly</option>
                                        <option value="12">Monthly</option>
                                    </select>
                                </div>
                                <div class="col-sm-1" id="edit_new_pension_mode">
                                    <center>
                                        <span class="btn btn-success btn-xs pull-right edit_new_pension_mode"><i class="fa fa-pencil" title=""></i></span>
                                    </center>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label">Amount</label>
                                <div class="col-sm-8"><input type="text" class="form-control policy_view_loan_amount_edit" name="policy_loan_amt" onkeyup="caps(this)"></div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label">Date</label>
                                <div class="col-sm-8"><input type="text" class="form-control policy_view_loan_date_edit" name="policy_loan_date" onkeyup="caps(this)"></div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label">Name</label>
                                <div class="col-sm-8"><input type="text" class="form-control policy_view_name_edit" name="policy_nominee_name" onkeyup="caps(this)"></div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label">Relation</label>
                                <div class="col-sm-8"><input type="text" class="form-control policy_view_relation_edit" name="policy_nominee_relation" onkeyup="caps(this)"></div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label">Age</label>
                                <div class="col-sm-8"><input type="text" class="form-control policy_view_nominee_age_edit" name="policy_nominee_age" onkeyup="caps(this)"></div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label">Occupation</label>
                                <div class="col-sm-8"><input type="text" class="form-control policy_view_occupation_edit" name="policy_occupation" onkeyup="caps(this)"></div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label">Designation</label>
                                <div class="col-sm-8"><input type="text" class="form-control policy_view_designation_edit" name="policy_designation" onkeyup="caps(this)"></div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label">Mode</label>
                                <div class="col-sm-8"><input type="text" class="form-control policy_view_pension_mode_edit" name="policy_pension_mode" onkeyup="caps(this)"></div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label">Amount</label>
                                <div class="col-sm-8"><input type="text" class="form-control policy_view_pension_amount_edit" name="policy_pension_amt" onkeyup="caps(this)"></div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label">Start Date</label>
                                <div class="col-sm-8"><input type="text" class="form-control policy_view_start_date_edit" name="policy_pension_start_date" onkeyup="caps(this)"></div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label">Assign Trust</label>
                                <div class="col-sm-8"><input type="text" class="form-control policy_view_assign_trust_edit" name="policy_assignment_trust" onkeyup="caps(this)"></div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label">Remark</label>
                                <div class="col-sm-8"><input type="text" class="form-control policy_view_remark_edit" name="policy_remark" onkeyup="caps(this)"></div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label">Father Name</label>
                                <div class="col-sm-8"><input type="text" class="form-control policy_view_father_name_edit" name="policy_father_name" onkeyup="caps(this)"></div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label">Mother Name</label>
                                <div class="col-sm-8"><input type="text" class="form-control policy_view_mother_name_edit" name="policy_mother_name" onkeyup="caps(this)"></div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label">Brother Name</label>
                                <div class="col-sm-8"><input type="text" class="form-control policy_view_brother_name_edit" name="policy_brother_name" onkeyup="caps(this)"></div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label">Sister Name</label>
                                <div class="col-sm-8"><input type="text" class="form-control policy_view_sister_name_edit" name="policy_sister_name" onkeyup="caps(this)"></div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label">Son Name</label>
                                <div class="col-sm-8"><input type="text" class="form-control policy_view_son_name_edit" name="policy_son_name" onkeyup="caps(this)"></div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label">Daughter Name</label>
                                <div class="col-sm-8"><input type="text" class="form-control policy_view_daughter_name_edit" name="policy_doughter_name" onkeyup="caps(this)"></div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label">Name</label>
                                <div class="col-sm-8"><input type="text" class="form-control policy_view_spouse_name_edit" name="policy_spouce_name" onkeyup="caps(this)"></div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label">Occupation</label>
                                <div class="col-sm-8"><input type="text" class="form-control policy_view_spouse_occupation_edit" name="policy_spouce_occupation" onkeyup="caps(this)"></div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label">Income</label>
                                <div class="col-sm-8"><input type="text" class="form-control policy_view_spouse_income_edit" name="policy_spouce_income" onkeyup="caps(this)"></div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label">Doctor Name</label>
                                <div class="col-sm-8"><input type="text" class="form-control policy_view_doctor_name_edit" name="policy_doctor_name" onkeyup="caps(this)"></div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label">Medical Date</label>
                                <div class="col-sm-8"><input type="text" class="form-control policy_view_medical_date_edit" name="policy_MES_date" onkeyup="caps(this)"></div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label">Identification Mark</label>
                                <div class="col-sm-8"><input type="text" class="form-control policy_view_identification_mark_edit" name="policy_identification_mark" onkeyup="caps(this)"></div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label">Height</label>
                                <div class="col-sm-8"><input type="text" class="form-control policy_view_height_edit" name="policy_height" onkeyup="caps(this)"></div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label">Weight</label>
                                <div class="col-sm-8"><input type="text" class="form-control policy_view_weight_edit" name="policy_weight" onkeyup="caps(this)"></div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label">ABD</label>
                                <div class="col-sm-8"><input type="text" class="form-control policy_view_ABD_edit" name="policy_ABD" onkeyup="caps(this)"></div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label">Chest</label>
                                <div class="col-sm-8"><input type="text" class="form-control policy_view_chest_edit" name="policy_chest" onkeyup="caps(this)"></div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label">Teeth</label>
                                <div class="col-sm-8"><input type="text" class="form-control policy_view_teeth_edit" name="policy_teeth" onkeyup="caps(this)"></div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label">BP</label>
                                <div class="col-sm-8"><input type="text" class="form-control policy_view_BP_edit" name="policy_BP" onkeyup="caps(this)"></div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label">Pulse</label>
                                <div class="col-sm-8"><input type="text" class="form-control policy_view_pulse_edit" name="policy_pulse" onkeyup="caps(this)"></div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label">Vaccin</label>
                                <div class="col-sm-8"><input type="text" class="form-control policy_view_vaccin_edit" name="policy_vaccin" onkeyup="caps(this)"></div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label">Spect</label>
                                <div class="col-sm-8"><input type="text" class="form-control policy_view_spect_edit" name="policy_spect" onkeyup="caps(this)"></div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label">Spect Type</label>
                                <div class="col-sm-8"><input type="text" class="form-control policy_view_spect_type_edit" name="policy_spect_type" onkeyup="caps(this)" readonly></div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label">Spect Left</label>
                                <div class="col-sm-8"><input type="text" class="form-control policy_view_spect_left_edit" name="policy_spect_left" onkeyup="caps(this)"></div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label">Spect Right</label>
                                <div class="col-sm-8"><input type="text" class="form-control policy_view_spect_right_edit" name="policy_spect_right" onkeyup="caps(this)"></div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-3 control-label">Opration</label>
                                <div class="col-sm-8"><input type="text" class="form-control policy_view_operation_edit" name="policy_operation" onkeyup="caps(this)"></div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label">Special Report</label>
                                <div class="col-sm-8"><input type="text" class="form-control policy_view_special_report_edit" name="policy_spl_reports" onkeyup="caps(this)"></div>
                            </div>
                            <div class="form-group">
                                <div class="col-lg-6" style="text-align:right;">
                                    <button class="btn btn-primary" type="submit">Update</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-12" id="policy_deatilssss">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5>All Policy Details</h5>
                    <span class="btn btn-success btn-xs pull-right new_policy_reg"><i class="fa fa-plus" title="New Policy"></i></span>
                </div>
                <div class="ibox-content">
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered table-hover dataTables-example" >
                            <thead>
                                <tr>
                                    <!-- <th>Sr no</th> -->
                                    <th>Acc No.</th>
                                    <th>Client Name</th>
                                    <th>Policy No.</th>
                                    <th>Mobile</th>
                                    <!-- <th>Action</th> -->
                                </tr>
                            </thead>
                        <tbody>
                        <?php $i=1; foreach ($policy_details as $key) {  ?>
                        <tr class="Policyssss">
                            <!-- <td><?php echo $i; ?> </td> -->
                            <td><?=$key['client_family_acc_no']; ?></td>
                            <td><?=$key['client_prefix']." ".$key['client_first_name']." ".$key['client_middle_name']." ".$key['client_last_name']; ?></td>
                            <td class="Client_Policy_Number"><?=$key['policy_number']?></td>
                            <td><?=$key['client_pri_mobile_number']; ?></td>
                            <!-- <td>
                                <a href="<?=site_url('Admin/update_policy/' .$key['policy_id'])?>"><button class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i></button></a>&nbsp &nbsp
                                <button class="btn btn-danger btn-xs" data-toggle="modal" id ='<?=$key['policy_id']; ?>' data-target="#deletePolicy"><i class="fa fa-times"></i></button>
                            </td> -->
                        </tr>
                        <?php $i++; } ?>
                        </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div id="updateSB_Due" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Edit SB_Due Details</h4>
                </div>
                <div class="modal-body">
                    <form method="post" class="form-horizontal" id="update_agentDetails" action="<?=site_url('Admin/edit_SB_Due')?>" enctype="multipart/form-data">
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th class="hidden">ID</th>
                                        <th>SB_Due Date</th>
                                        <th>SB_Due Amount</th>
                                        <th>SB_Due Age</th>
                                    </tr>
                                </thead>
                                <tbody class="update_SB_Due">
                                </tbody>
                            </table>
                        </div>
                        <div class="hr-line-dashed"></div>
                        <div class="form-group">
                            <div class="col-lg-6" style="text-align:right;">
                                <button class="btn btn-primary" type="submit">Update</button>
                            </div>
                            <div class="col-lg-6">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div id="addSBDue" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">New SB_Due Details</h4>
                </div>
                <div class="modal-body">
                    <form method="post" class="form-horizontal" action="<?=site_url('Admin/new_SB_Due')?>" enctype="multipart/form-data">
                        <div class="form-group hidden">
                            <label class="col-sm-3 control-label">Client ID</label>
                            <div class="col-sm-7">
                                <input type="text" class="form-control new_SB_client_id" name="client_id">
                            </div>
                        </div>
                        <div class="form-group hidden">
                            <label class="col-sm-3 control-label">Policy Number</label>
                            <div class="col-sm-7">
                                <input type="text" class="form-control new_SB_policy_number" name="policy_number">
                            </div>
                        </div>
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <!-- <th class="hidden">ID</th> -->
                                        <th>SB_Due Date</th>
                                        <th>SB_Due Amount</th>
                                        <th>SB_Due Age</th>
                                    </tr>
                                </thead>
                                <tbody class="new_SB_Due">
                                </tbody>
                            </table>
                            <span class="add_new_SB pull-right" style="color:#67C6F1; font-size: 08px;"><i class="fa fa-plus fa-2x" aria-hidden="true"><u style="margin-left: 5px;"> <b>New</b></u></i></span>
                        </div>
                        <div class="hr-line-dashed"></div>
                        <div class="form-group">
                            <div class="col-lg-6" style="text-align:right;">
                                <button class="btn btn-primary" type="submit">Add</button>
                            </div>
                            <div class="col-lg-6">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div id="deletePolicy" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Delete Policy Details</h4>
                </div>
                <div class="modal-body">
                    <form method="post" class="form-horizontal" action="<?=site_url('Admin/delete_policy')?>" enctype="multipart/form-data">
                       <div class="form-group hidden">
                            <label class="col-sm-3 control-label">Policy ID</label>
                            <div class="col-sm-7">
                                <input type="text" class="form-control policy_id_delete" name="policy_number">
                            </div>
                        </div>
                        <center><h3>Do you really want to Delete?</h3></center>
                        <div class="hr-line-dashed"></div>
                        <div class="form-group">
                            <div class="col-lg-6" style="text-align:right;">
                                <button class="btn btn-primary" type="submit">Yes</button>
                            </div>
                            <div class="col-lg-6">
                                <button type="button" class="btn btn-default" data-dismiss="modal">No</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>