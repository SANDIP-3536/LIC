        <div class="wrapper wrapper-content animated fadeInRight">
            <div class="row">
                <div class="col-lg-5 hidden" id="new_client_registerss">
                    <div class="col-lg-12">
                        <div class="ibox float-e-margins">
                            <div class="ibox-title">
                                <h5>Add Client</h5>
                                <span class="btn btn-success btn-xs pull-right close_new_client"><i class="fa fa-times-circle" title="Close"></i></span>
                            </div>
                            <div class="ibox-content">
                                <form method="post" class="form-horizontal" id="clientDetails"action="<?=site_url('Admin/add_new_client')?>" enctype="multipart/form-data">
                                    <div class="form-group">
                                        <label class="col-sm-3 control-label">Family Account No</label>
                                        <div class="col-sm-8">
                                            <select class="form-control select2_demo_1" name="client_family_acc_no" style="width:100%;">
                                                <option value=""></option>
                                                <?php foreach ($acc as $key) { ?>
                                                    <option value="<?=$key['family_acc_number']?>"><?=$key['family_acc_number']?></option>
                                                  <?php } ?>
                                            </select>
                                        </div>
                                        <div class="col-sm-1">
                                            <center>
                                                <span class="btn btn-success btn-xs pull-right add_new_client_family_account"><i class="fa fa-plus" title="Add New Account"></i></span>
                                            </center>
                                        </div>
                                    </div> 
                                    <div class="form-group">
                                        <label class="col-sm-3 control-label">Prefix</label>
                                        <div class="col-sm-8">
                                            <select class="form-control" id="client_prefix" name="client_prefix">
                                                <option value="Shri.">Shri.</option>
                                                <option value="Mr.">Mr.</option>
                                                <option value="Mrs.">Mrs.</option>
                                                <option value="Miss.">Miss.</option>
                                                <option value="Mast.">Mast.</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group"><label class="col-sm-3 control-label">Surname<span style="color:red;">*</span></label>
                                        <div class="col-sm-8"><input type="text" class="form-control" name="client_last_name" placeholder="Lastname" onkeyup="caps(this)"></div>
                                    </div>
                                    <div class="form-group"><label class="col-sm-3 control-label">First Name<span style="color:red;">*</span></label>
                                        <div class="col-sm-8"><input type="text" class="form-control" name="client_first_name" placeholder="Firstname" onkeyup="caps(this)"></div>
                                    </div>
                                    <div class="form-group"><label class="col-sm-3 control-label">Middle Name</label>
                                        <div class="col-sm-8"><input type="text" class="form-control" name="client_middle_name" placeholder="Middlename" onkeyup="caps(this)"></div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-3 control-label">Residential Address</label>
                                        <div class="col-sm-8">
                                            <textarea class="form-control" rows="2" cols="6" name="client_residential_address" placeholder="Address" onkeyup="caps(this)"></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-3 control-label"> Office Address</label>
                                        <div class="col-sm-8">
                                            <textarea class="form-control" rows="2" cols="6" name="client_office_address" placeholder="Address" onkeyup="caps(this)"></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group"><label class="col-sm-3 control-label">Client Area</label>
                                        <div class="col-sm-8"><input type="text" class="form-control" name="client_area" placeholder="Client Area" onkeyup="caps(this)"></div>
                                    </div> 
                                   <div class="form-group"><label class="col-sm-3 control-label">PAN Number</label>
                                        <div class="col-sm-8"><input type="text" class="form-control" name="client_PAN" placeholder="PAN Number" onkeyup="caps(this)"></div>
                                    </div> 
                                    <div class="form-group"><label class="col-sm-3 control-label">Adhar Number</label>
                                        <div class="col-sm-8"><input type="text" class="form-control" name="client_aadhar" placeholder="Adhar Number" onkeyup="caps(this)"></div>
                                    </div>      
                                    <div class="form-group " id="data_3">
                                        <label class="col-sm-3 control-label">Date of Birth<span style="color:red;">*</span></label>
                                        <div class="input-group date col-sm-7"  style="margin-left:28%;">
                                            <span class="input-group-addon">
                                                <i class="fa fa-calendar"></i>
                                            </span>
                                            <input type="text" class="form-control" placeholder="<?php echo date('d-m-Y');?>" name="client_DOB">
                                        </div>
                                    </div> 
                                    <div class="form-group">
                                        <label class="col-sm-3 control-label">Birth Place</label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control" name="client_birth_place" placeholder="Birth Place" onkeyup="caps(this)">
                                        </div>
                                    </div> 
                                    <div class="form-group " id="data_3">
                                        <label class="col-sm-3 control-label">Date of Anniversary</label>
                                        <div class="input-group date col-sm-7"  style="margin-left:28%;">
                                            <span class="input-group-addon">
                                                <i class="fa fa-calendar"></i>
                                            </span>
                                            <input type="text" class="form-control"  placeholder="<?php echo date('d-m-Y');?>" name="client_DOA" onkeyup="caps(this)">
                                        </div>
                                    </div> 
                                    <div class="form-group hidden" id="MLN">
                                        <label class="col-sm-3 control-label">Maiden Name</label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control" name="client_maiden_name" placeholder="Maiden Name" onkeyup="caps(this)">
                                        </div>
                                    </div>
                                    <!-- <div class="form-group hidden" id="MFN">
                                        <label class="col-sm-3 control-label">Maiden First Name</label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control" name="client_maiden_first_name" placeholder="Maiden Firstname" onkeyup="caps(this)">
                                        </div>
                                    </div>
                                    <div class="form-group hidden" id="MMN">
                                        <label class="col-sm-3 control-label">Maiden Middle Name</label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control" name="client_maiden_middle_name" placeholder="Maiden Middlename" onkeyup="caps(this)">
                                        </div>
                                    </div> -->
                                    <div class="form-group">
                                        <label class="col-sm-3 control-label">Gender</label>
                                        <div class="i-checks">
                                            <span style="margin-left: 10px;"></span>
                                            <label><input type="radio"  checked="" value="Male" name="client_gender"> <i></i> Male </label>
                                            <span style="margin-right: 10px;"></span>
                                            <label> <input type="radio" value="Female" name="client_gender"> <i></i> Female </label>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-3 control-label">Blood Group</label>
                                        <div class="col-sm-8">
                                           <select class="form-control" name="client_blood_group">
                                                <option>Select Blood Group</option>
                                                <option value="A+">A +ve</option>
                                                <option value="B+">B +ve</option>
                                                <option value="AB+">AB +ve</option>
                                                <option value="O+">O +ve</option>
                                                <option value="A-">A -ve</option>
                                                <option value="B-">B -ve</option>
                                                <option value="AB-">AB -ve</option>
                                                <option value="O-">O -ve</option>
                                           </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-3 control-label">Father Name</label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control" name="client_father_name" placeholder="Father Name" onkeyup="caps(this)">
                                        </div>
                                    </div>
                                    <!-- <div class="form-group">
                                        <label class="col-sm-3 control-label">Father Firstname</label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control" name="client_father_first_name" placeholder="Firstname">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-3 control-label">Father Middlename</label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control" name="client_father_middle_name" placeholder="Lastname">
                                        </div>
                                    </div> -->
                                    <div class="form-group">
                                        <label class="col-sm-3 control-label">Mobile No. 1.</label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control" name="client_pri_mobile_number" placeholder="Mobile Number" onkeyup="caps(this)">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-3 control-label"> 2.</label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control" name="client_sec_mobile_number" placeholder="Mobile Number" onkeyup="caps(this)">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-3 control-label">Phone No 1. (office/shop)</label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control" name="client_pri_phone_number" placeholder="Phone Number" onkeyup="caps(this)">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-3 control-label"> 2.</label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control" name="client_sec_phone_number" placeholder="Phone Number" onkeyup="caps(this)">
                                        </div>
                                    </div> 
                                    <div class="form-group">
                                        <label class="col-sm-3 control-label">Residential 1.</label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control" name="client_pri_residential_number" placeholder="Residential Phone Number" onkeyup="caps(this)">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-3 control-label"> 2.</label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control" name="client_sec_residential_number" placeholder="Residential Phone Number" onkeyup="caps(this)">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-3 control-label">Email id</label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control" name="client_email_id" placeholder="Email id">
                                        </div>
                                    </div>
                                    <div class="ibox-title" style="border:none;border-top:1px dashed;color:#1c84c6;">
                                        <h5>Bank Details</h5>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-3 control-label">Name</label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control" name="client_bank_name" placeholder="Bank Name" onkeyup="caps(this)">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-3 control-label">Branch</label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control" name="client_bank_branch" placeholder="Baranch Name" onkeyup="caps(this)">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-3 control-label">Account Type</label>
                                        <div class="col-sm-8">
                                            <select class="form-control" name="client_bank_acc_type">
                                                <option>Select Account Type</option>
                                                <option value="SAVING">SAVING</option>
                                                <option value="CURRENT">CURRENT</option>
                                                <option value="OD">OD</option>
                                                <option value="CC">CC</option>
                                                <option value="NRI">NRI</option>
                                                <option value="CASH-CREDIT">CASH-CREDIT</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-3 control-label">Account Number</label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control" name="client_bank_acc_no" placeholder="Account Number" onkeyup="caps(this)">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-3 control-label">IFSC Code</label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control" name="client_bank_ifsc_code" placeholder="IFSC Code" onkeyup="caps(this)">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-3 control-label">MICR Number</label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control" name="client_bankmicr_no" placeholder="MICR No" onkeyup="caps(this)">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-3 control-label">Cheque Number</label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control" name="client_bank_cheque_no" placeholder="Cheque Number" onkeyup="caps(this)">
                                        </div>
                                    </div>

                                    <div class="ibox-title" style="border:none;border-top:1px dashed;   ">
                                        <h5>Document Details</h5>
                                    </div>
                                    <div class="table-responsive">
                                        <table class="table table-bordered">
                                            <thead>
                                                <tr>
                                                    <th>Document Name</th>
                                                    <th>File</th>
                                                </tr>
                                            </thead>
                                            <tbody class="doc_stock">
                                                <tr>
                                                    <th>
                                                        <select name="doc_name[]" class="form-control doc_name" id="" style="border:none;" required>
                                                            <option value="Adhar_Card">Adhar Card</option>
                                                            <option value="Pan_Card">Pan Card</option>
                                                            <option value="School_Leaving">School Leaving</option>
                                                            <option value="Passport">Passport</option>
                                                            <option value="Marriege_Certificate">Marriege Certificate</option>
                                                            <option value="Light_Bill">Light Bill</option>
                                                            <option value="Ration_Card">Ration Card</option><option value="Voting_Card">Voting Card</option>
                                                        </select>
                                                    </th>
                                                    <th>
                                                        <input type="file" name="doc_image[]" class="form-control" accept="image/gif,image/png,image/jpeg" multiple="" style="border:none;">
                                                    </th>
                                                </tr>
                                            </tbody> 
                                        </table>
                                        <span class="add_doc pull-right" style="color:#67C6F1; font-size: 08px;"><i class="fa fa-plus fa-2x" aria-hidden="true"><u style="margin-left: 5px;"> <b>New</b></u></i></span>
                                    </div>
                                    <div class="hr-line-dashed"></div>
                                    <div class="form-group">
                                        <div class="col-sm-12 col-sm-offset-4">
                                            <button class="btn btn-white" type="submit">Cancel</button>
                                            <button class="btn btn-primary" type="submit">Add Client</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-5 hidden" id="register_client_details">
                    <div class="col-lg-12">
                        <div class="ibox float-e-margins">
                            <div class="ibox-title">
                                <div class="col-sm-6">
                                    <h5>Client Details</h5>
                                </div>
                                <div class="col-sm-6" style="text-align:right;padding:0px;">
                                    <span class="btn btn-success btn-xs update_register_client_details"><i class="fa fa-pencil" title="Edit"></i></span>
                                    <span class="btn btn-success btn-xs" data-toggle="modal" data-target="#deleteClient"><i class="fa fa-trash" title="Delete Client"></i></span>
                                    <span class="btn btn-success btn-xs close_register_client_details"><i class="fa fa-times-circle" title="Close"></i></span>
                                </div>
                            </div>
                            <div class="ibox-content">
                                <!-- <form method="post" class="form-horizontal"  enctype="multipart/form-data"> -->
                                <div id="details_of_client">
                                    <form class="form-horizontal" enctype="multipart/form-data">
                                        <div class="form-group">
                                            <label class="col-sm-3 control-label">Family Account No </label>
                                            <label class="col-sm-1 control-label">:</label>
                                            <div class="col-sm-8" style="padding-top:1%;">
                                                <span class="client_view_family_account_number"></span>
                                            </div>
                                        </div> 
                                        <div class="form-group">
                                            <label class="col-sm-3 control-label">Name </label>
                                            <label class="col-sm-1 control-label">:</label>
                                            <div class="col-sm-8" style="padding-top:1%;">
                                                <span class="client_view_name"></span>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-3 control-label">Residential Address</label>
                                            <label class="col-sm-1 control-label">:</label>
                                            <div class="col-sm-8" style="padding-top:1%;">
                                                <span class="client_view_residential_address"></span>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-3 control-label"> Office Address</label>
                                            <label class="col-sm-1 control-label">:</label>
                                            <div class="col-sm-8" style="padding-top:1%;">
                                                <span class="client_view_office_address"></span>
                                            </div>
                                        </div>
                                        <div class="form-group"><label class="col-sm-3 control-label">Client Area </label>
                                            <label class="col-sm-1 control-label">:</label>
                                            <div class="col-sm-8" style="padding-top:1%;">
                                                <span class="client_view_area"></span>
                                            </div>
                                        </div> 
                                        <div class="form-group"><label class="col-sm-3 control-label">PAN Number </label>
                                            <label class="col-sm-1 control-label">:</label>
                                            <div class="col-sm-8" style="padding-top:1%;">
                                                <span class="client_view_PAN_number"></span>
                                            </div>
                                        </div> 
                                        <div class="form-group"><label class="col-sm-3 control-label">Adhar Number </label>
                                            <label class="col-sm-1 control-label">:</label>
                                            <div class="col-sm-8" style="padding-top:1%;">
                                                <span class="client_view_adhar_number"></span>
                                            </div>
                                        </div>      
                                        <div class="form-group">
                                            <label class="col-sm-3 control-label">Date of Birth </label>
                                            <label class="col-sm-1 control-label">:</label>
                                            <div class="col-sm-8" style="padding-top:1%;">
                                                <span class="client_view_DOB"></span>
                                            </div>
                                        </div> 
                                        <div class="form-group">
                                            <label class="col-sm-3 control-label">Birth Place </label>
                                            <label class="col-sm-1 control-label">:</label>
                                            <div class="col-sm-8" style="padding-top:1%;">
                                                <span class="client_view_birth_place"></span>
                                            </div>
                                        </div> 
                                        <div class="form-group">
                                            <label class="col-sm-3 control-label">Date of Anniversary </label>
                                            <label class="col-sm-1 control-label">:</label>
                                             <div class="col-sm-8" style="padding-top:1%;">
                                                <span class="client_view_DOA"></span>
                                            </div>
                                        </div> 
                                        <div class="form-group">
                                            <label class="col-sm-3 control-label"> Maiden Name </label>
                                            <label class="col-sm-1 control-label">:</label>
                                            <div class="col-sm-8" style="padding-top:1%;">
                                                <span class="client_view_maiden_name">  </span>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-3 control-label">Gender </label>
                                            <label class="col-sm-1 control-label">:</label>
                                            <div class="col-sm-8" style="padding-top:1%;">
                                                <span class="client_view_gender"></span>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-3 control-label">Blood Group </label>
                                            <label class="col-sm-1 control-label">:</label>
                                            <div class="col-sm-8" style="padding-top:1%;">
                                                <span class="client_view_blood_group"></span>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-3 control-label">Father Name </label>
                                            <label class="col-sm-1 control-label">:</label>
                                            <div class="col-sm-8" style="padding-top:1%;">
                                                <span class="client_view_father_name"></span>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-3 control-label">Mobile No. 1</label>
                                            <label class="col-sm-1 control-label">:</label>
                                            <div class="col-sm-8" style="padding-top:1%;">
                                                <span class="client_view_pri_mobile_number"></span>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-3 control-label"> 2. </label>
                                            <label class="col-sm-1 control-label">:</label>
                                            <div class="col-sm-8" style="padding-top:1%;">
                                                <span class="client_view_sec_mobile_number"></span>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-3 control-label">Phone No 1. : (office/shop</label>
                                            <label class="col-sm-1 control-label">:</label>
                                            <div class="col-sm-8" style="padding-top:1%;">
                                                <span class="client_view_pri_phone_number"></span>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-3 control-label"> 2. </label>
                                            <label class="col-sm-1 control-label">:</label>
                                            <div class="col-sm-8" style="padding-top:1%;">
                                                <span class="client_view_sec_phone_number"></span>
                                            </div>
                                        </div> 
                                        <div class="form-group">
                                            <label class="col-sm-3 control-label">Residential 1. </label>
                                            <label class="col-sm-1 control-label">:</label>
                                            <div class="col-sm-8" style="padding-top:1%;">
                                                <span class="client_view_res_pri_phone_number"></span>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-3 control-label"> 2. </label>
                                            <label class="col-sm-1 control-label">:</label>
                                            <div class="col-sm-8" style="padding-top:1%;">
                                                <span class="client_view_res_sec_phone_number"></span>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-3 control-label">Email id </label>
                                            <label class="col-sm-1 control-label">:</label>
                                            <div class="col-sm-8" style="padding-top:1%;">
                                                <span class="client_view_email_id"></span>
                                            </div>
                                        </div>
                                        <div class="ibox-title" style="border:none;border-top:1px dashed;color:#1c84c6;">
                                            <h5>Bank Details</h5>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-3 control-label">Name</label>
                                            <label class="col-sm-1 control-label">:</label>
                                            <div class="col-sm-8" style="padding-top:1%;">
                                               <span class="view_client_bank_name"></span>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-3 control-label">Branch</label>
                                            <label class="col-sm-1 control-label">:</label>
                                            <div class="col-sm-8" style="padding-top:1%;">
                                                <span class="view_client_bank_branch"></span>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-3 control-label">Account Type</label>
                                            <label class="col-sm-1 control-label">:</label>
                                            <div class="col-sm-8" style="padding-top:1%;">
                                                 <span class="view_client_bank_acc_type"></span>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-3 control-label">Account Number</label>
                                            <label class="col-sm-1 control-label">:</label>
                                            <div class="col-sm-8" style="padding-top:1%;" style="">
                                                <span class="view_client_bank_acc_no"></span>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-3 control-label">IFSC Code</label>
                                            <label class="col-sm-1 control-label">:</label>
                                            <div class="col-sm-8" style="padding-top:1%;">
                                               <span class="view_client_bank_ifsc_code"></span>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-3 control-label">MICR Numbe </label>
                                            <label class="col-sm-1 control-label">:</label>
                                            <div class="col-sm-8" style="padding-top:1%;">
                                                <span class="view_client_bankmicr_no"></span>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-3 control-label">Cheque Number</label>
                                            <label class="col-sm-1 control-label">:</label>
                                            <div class="col-sm-8" style="padding-top:1%;">
                                                <span class="view_client_bank_cheque_no"></span>
                                            </div>
                                        </div>
                                        <div class="ibox-title" style="border:none;border-top:1px dashed;color:#1c84c6;">
                                            <h5>Document Details</h5>
                                            <span class="btn btn-success btn-xs pull-right" data-toggle="modal" data-target="#addClientDocument"><i class="fa fa-plus" title="Add New Document"></i></span>
                                        </div>
                                        <div class="table-responsive">
                                            <table class="table table-striped table-bordered table-hover">
                                                <thead>
                                                    <tr>
                                                        <th>Name</th>
                                                        <th>File</th>
                                                    </tr>
                                                </thead>
                                                <tbody class="client_document_detailsss">   
                                                    <!-- <tr>
                                                        <td><?=$key['doc_name']?></td>
                                                        <td><a href="<?=$key['doc_file']?>" download ><i class="fa fa-download fa-2x"></i></a></td>
                                                    </tr> -->
                                                </tbody>
                                            </table>
                                        </div>
                                    </form>
                                </div>
                            <div class="hidden" id="edit_details_client">
                                <form method="post" class="form-horizontal" id="update_clientDetails" action="<?=site_url('Admin/edit_client')?>" enctype="multipart/form-data">
                                    <div class="form-group hidden">
                                        <label class="col-sm-3 control-label">Client ID</label>
                                        <div class="col-sm-7">
                                            <input type="text" class="form-control client_id_edit" name="client_id">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-3 control-label">Family Account No</label>
                                        <div class="col-sm-8" id="edit_client_family_acc_no">
                                            <input type="text" class="form-control edit_client_family_acc_no" name="client_family_acc_no" readonly>
                                        </div>
                                        <div class="col-sm-8 hidden" id="list_of_family_account">
                                            <select class="form-control select2_demo_1" name="client_family_acc_no_1" style="width:100%;">
                                                <option></option>
                                                <?php foreach ($acc as $key) { ?>
                                                    <option value="<?=$key['family_acc_number']?>"><?=$key['family_acc_number']?></option>
                                                  <?php } ?>
                                            </select>
                                        </div>
                                        <div class="col-sm-1" id="edit_new_client_family_account_family">
                                            <center>
                                                <span class="btn btn-success btn-xs pull-right edit_new_client_family_account_family"><i class="fa fa-pencil" title="Add New Account"></i></span>
                                            </center>
                                        </div>
                                        <div class="col-sm-1 hidden" id="add_new_client_family_account ">
                                            <center>
                                                <span class="btn btn-success btn-xs pull-right add_new_client_family_account"><i class="fa fa-plus" title="Add New Account"></i></span>
                                            </center>
                                        </div>
                                    </div> 
                                    <div class="form-group">
                                        <label class="col-sm-3 control-label">Prefix</label>
                                        <div class="col-sm-8" id="prefix_client">
                                            <input type="text" class="form-control client_prefix_edit" name="client_prefix" readonly>
                                        </div>
                                        <div class="col-sm-8 hidden" id="prefix_client_1">
                                            <select class="form-control" id="client_prefix_1" name="client_prefix_1">
                                                <option></option>
                                                <option value="Shri.">Shri.</option>
                                                <option value="Mr.">Mr.</option>
                                                <option value="Mrs.">Mrs.</option>
                                                <option value="Miss.">Miss.</option>
                                                <option value="Mast.">Mast.</option>
                                            </select>
                                        </div>
                                        <div class="col-sm-1" id="edit_client_prefix_button">
                                            <center>
                                                <span class="btn btn-success btn-xs pull-right edit_client_prefix_button"><i class="fa fa-pencil" title=""></i></span>
                                            </center>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-3 control-label">Lastname</label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control client_last_name_edit" name="client_last_name" placeholder="Lastname" onkeyup="caps(this)">
                                        </div>
                                    </div>
                                    <div class="form-group"><label class="col-sm-3 control-label">Firstname</label>
                                        <div class="col-sm-8"><input type="text" class="form-control client_first_name_edit" name="client_first_name" placeholder="Firstname" onkeyup="caps(this)"></div>
                                    </div>
                                    <div class="form-group"><label class="col-sm-3 control-label">Middlename</label>
                                        <div class="col-sm-8"><input type="text" class="form-control client_middle_name_edit" name="client_middle_name" placeholder="Middlename" onkeyup="caps(this)"></div>
                                    </div>
                                    <div class="form-group"><label class="col-sm-3 control-label">Address</label>
                                        <div class="col-sm-8">
                                            <textarea rows="2" cols="6" class="form-control client_residential_address_edit" name="client_residential_address" placeholder="Residential Address" onkeyup="caps(this)"></textarea></div>
                                    </div>
                                    <div class="form-group"><label class="col-sm-3 control-label">Address</label>
                                        <div class="col-sm-8"><textarea rows="2" cols="6" class="form-control client_office_address_edit" name="client_office_address" placeholder="Office Address" onkeyup="caps(this)"></textarea></div>
                                    </div>
                                    <div class="form-group"><label class="col-sm-3 control-label">Client Area</label>
                                        <div class="col-sm-8"><input type="text" class="form-control client_area_edit" name="client_area" placeholder="Client Area" onkeyup="caps(this)"></div>
                                    </div> 
                                   <div class="form-group"><label class="col-sm-3 control-label">PAN Number</label>
                                        <div class="col-sm-8"><input type="text" class="form-control client_PAN_edit" name="client_PAN" placeholder="PAN Number" onkeyup="caps(this)"></div>
                                    </div> 
                                    <div class="form-group"><label class="col-sm-3 control-label">Adhar Number</label>
                                        <div class="col-sm-8"><input type="text" class="form-control client_aadhar_edit" name="client_aadhar" placeholder="Adhar Number" onkeyup="caps(this)"></div>
                                    </div>      
                                    <div class="form-group" id="data_3">
                                        <label class="col-sm-3 control-label">Date of Birth</label>
                                        <div class="input-group date col-sm-7">
                                            <span class="input-group-addon">
                                                <i class="fa fa-calendar"></i>
                                            </span>
                                            <input type="text" class="form-control client_DOB_edit" value="10/11/2013" placeholder="Date of Birth" name="client_DOB">
                                        </div>
                                    </div> 
                                    <div class="form-group">
                                        <label class="col-sm-3 control-label">Birth Place</label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control client_birth_place_edit" name="client_birth_place" placeholder="Birth Place" onkeyup="caps(this)">
                                        </div>
                                    </div> 
                                    <div class="form-group" id="data_3">
                                        <label class="col-sm-3 control-label">Date of Anniversary</label>
                                        <div class="input-group date col-sm-7">
                                            <span class="input-group-addon">
                                                <i class="fa fa-calendar"></i>
                                            </span>
                                            <input type="text" class="form-control client_DOA_edit" value="10/11/2013" placeholder="Date of Birth" name="client_DOA">
                                        </div>
                                    </div> 
                                    <!-- <div class="form-group">
                                        <label class="col-sm-3 control-label">Maiden Lastname</label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control client_maiden_last_name_edit" name="client_maiden_last_name" placeholder="Maiden Lastname" onkeyup="caps(this)">
                                        </div>
                                    </div> -->
                                    <div class="form-group">
                                        <label class="col-sm-3 control-label">Maiden Name</label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control client_maiden_first_name_edit" name="client_maiden_name" placeholder="Maiden Name" onkeyup="caps(this)">
                                        </div>
                                    </div>
                                    <!-- <div class="form-group">
                                        <label class="col-sm-3 control-label">Maiden Middlename</label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control client_maiden_middle_name_edit" name="client_maiden_middle_name" placeholder="Maiden Middlename" onkeyup="caps(this)">
                                        </div>
                                    </div> -->
                                    <!-- <div class="form-group">
                                        <label class="col-sm-3 control-label client_gender_edit">Gender</label>
                                        <div class="i-checks col-sm-8">
                                            <span style="margin-left: 10px;"></span>
                                            <label><input type="radio"  checked="" value="Male" name="client_gender"> <i></i> Male </label>
                                            <span style="margin-right: 10px;"></span>
                                            <label> <input type="radio" value="Female" name="client_gender"> <i></i> Female </label>
                                            <span style="margin-right: 10px;"></span>
                                            <label> <input type="radio" value="other" name="client_gender"> <i></i> Other </label>
                                        </div>
                                    </div> -->
                                    <div class="form-group">
                                        <label class="col-sm-3 control-label">Blood Group</label>
                                        <div class="col-sm-8" id="client_blood_group_edit">
                                            <input type="text" class="form-control client_blood_group_edit" name="client_blood_group" placeholder="Blood Group" readonly>
                                        </div>
                                        <div class="col-sm-8 hidden" id="list_of_blood_group">    
                                            <select class="form-control" name="client_blood_group_1">
                                                <option></option>
                                                <option value="A+">A +ve</option>
                                                <option value="B+">B +ve</option>
                                                <option value="AB+">AB +ve</option>
                                                <option value="O+">O +ve</option>
                                                <option value="A-">A -ve</option>
                                                <option value="B-">B -ve</option>
                                                <option value="AB-">AB -ve</option>
                                                <option value="O-">O -ve</option>
                                           </select>
                                        </div>
                                        <div class="col-sm-1" id="edit_client_blood_group_button">
                                            <center>
                                                <span class="btn btn-success btn-xs pull-right edit_client_blood_group_button"><i class="fa fa-pencil" title="Add New Account"></i></span>
                                            </center>
                                        </div>
                                    </div>
                                   <!--  <div class="form-group">
                                        <label class="col-sm-3 control-label">Family Account No</label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control client_familly_acc_no_edit" name="client_family_acc_no" placeholder="Family Account No" onkeyup="caps(this)">
                                        </div>
                                    </div> --> 
                                    <div class="form-group">
                                        <label class="col-sm-3 control-label">Father Lastname</label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control client_father_name_edit" name="client_father_name" placeholder="Father Name" onkeyup="caps(this)">
                                        </div>
                                    </div>
                                   <div class="form-group">
                                        <label class="col-sm-3 control-label">Mobile No. 1.</label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control client_pri_mobile_number_edit" name="client_pri_mobile_number" placeholder="Mobile Number" onkeyup="caps(this)">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-3 control-label"> 2.</label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control client_sec_mobile_number_edit" name="client_sec_mobile_number" placeholder="Mobile Number" onkeyup="caps(this)">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-3 control-label">Phone No 1. (office/shop)</label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control client_pri_phone_number_edit" name="client_pri_phone_number" placeholder="Phone Number" onkeyup="caps(this)">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-3 control-label"> 2.</label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control client_sec_phone_number_edit" name="client_sec_phone_number" placeholder="Phone Number" onkeyup="caps(this)">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-3 control-label">Residential 1.</label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control client_pri_residential_number_edit" name="client_pri_residential_number" placeholder="Residential Phone Number" onkeyup="caps(this)">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-3 control-label"> 2.</label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control client_sec_residential_number_edit" name="client_sec_residential_number" placeholder="Residential Phone Number" onkeyup="caps(this)">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-3 control-label">Email id</label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control client_email_id_edit" name="client_email_id" placeholder="Email id">
                                        </div>
                                    </div>
                                    <div class="ibox-title" style="border:none;border-top:1px dashed;color:#1c84c6;">
                                        <h5>Bank Details</h5>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-3 control-label">Name</label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control edit_client_bank_name" name="client_bank_name" placeholder="Bank Name" onkeyup="caps(this)">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-3 control-label">Branch</label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control edit_client_bank_branch" name="client_bank_branch" placeholder="Baranch Name" onkeyup="caps(this)">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-3 control-label">Account Type</label>
                                        <div class="col-sm-8" id="edit_client_bank_acc_type">
                                            <input type="text" class="form-control edit_client_bank_acc_type" name="client_bank_acc_type" readonly>
                                        </div>
                                        <div class="col-sm-8 hidden" id="client_bank_acc_type">
                                            <select class="form-control" name="client_bank_acc_type_1">
                                                <option></option>
                                                <option value="SAVING">SAVING</option>
                                                <option value="CURRENT">CURRENT</option>
                                                <option value="OD">OD</option>
                                                <option value="CC">CC</option>
                                                <option value="NRI">NRI</option>
                                                <option value="CASH-CREDIT">CASH-CREDIT</option>
                                            </select>
                                        </div>
                                        <div class="col-sm-1" id="edit_client_bank_acc_type_button">
                                            <center>
                                                <span class="btn btn-success btn-xs pull-right edit_client_bank_acc_type_button"><i class="fa fa-pencil" title="Add New Account"></i></span>
                                            </center>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-3 control-label">Account Number</label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control edit_client_bank_acc_no" name="client_bank_acc_no" placeholder="Account Number" onkeyup="caps(this)">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-3 control-label">IFSC Code</label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control edit_client_bank_ifsc_code" name="client_bank_ifsc_code" placeholder="IFSC Code" onkeyup="caps(this)">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-3 control-label">MICR Number</label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control edit_client_bankmicr_no" name="client_bankmicr_no" placeholder="MICR No" onkeyup="caps(this)">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-3 control-label">Cheque Number</label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control edit_client_bank_cheque_no" name="client_bank_cheque_no" placeholder="Cheque Number" onkeyup="caps(this)">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-lg-6" style="text-align:right;">
                                            <button class="btn btn-primary" type="submit">Update</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-12" id="client_deatilssss">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>All Client Details</h5>
                        <span class="btn btn-success btn-xs pull-right new_client_reg"><i class="fa fa-plus" title="New Client"></i></span>
                    </div>
                    <div class="ibox-content">
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered table-hover dataTables-example" >
                                <thead>
                                    <tr>
                                        <th>Sr.No</th>
                                        <th hidden>client_id</th>
                                        <th>Client Name</th>
                                        <th>Area</th>
                                        <th>Mobile No.</th>
                                        <th>Adhar Card Number</th>
                                        <th>PAN Card Number</th>
                                        <th>Family Account No.</th>
                                        <!-- <th>Action</th> -->
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i=1;foreach ($branch as $key) { ?>
                                        <tr class="clientttt_fetch">
                                            <td><?=$i++;?></td>
                                            <td class="client_id_details_fetch hidden"><?=$key['client_id']?></td>
                                            <td><?=$key['client_prefix']." ".$key['client_last_name']." ".$key['client_first_name']." ".$key['client_middle_name']; ?></td>
                                            <td><?=$key['client_area']; ?></td>
                                            <td><?=$key['client_pri_mobile_number']; ?></td>
                                            <td><?=$key['client_aadhar']; ?></td>
                                            <td><?=$key['client_PAN']; ?></td>
                                            <td><?=$key['client_family_acc_no']; ?></td>
                                            <!-- <td>
                                                <button class="btn btn-primary btn-xs" data-toggle="modal" id ="<?=$key['client_id'].'*'.$key['client_prefix'].'*'.$key['client_last_name'].'*'.$key['client_first_name'].'*'.$key['client_middle_name'].'*'.$key['client_address'].'*'.$key['client_area'].'*'.$key['client_PAN'].'*'.$key['client_aadhar'].'*'.$key['client_DOB'].'*'.$key['client_birth_place'].'*'.$key['client_DOA'].'*'.$key['client_maiden_first_name'].'*'.$key['client_maiden_middle_name'].'*'.$key['client_maiden_last_name'].'*'.$key['client_gender'].'*'.$key['client_blood_group'].'*'.$key['client_family_acc_no'].'*'.$key['client_father_name'].'*'.$key['client_pri_mobile_number'].'*'.$key['client_sec_mobile_number'].'*'.$key['client_pri_phone_number'].'*'.$key['client_sec_phone_number'].'*'.$key['client_pri_residential_number'].'*'.$key['client_sec_residential_number'].'*'.$key['client_email_id'];?>" data-target="#editClient"><i class="fa fa-pencil"></i></button>&nbsp &nbsp
                                                <button class="btn btn-danger btn-xs" data-toggle="modal" id ='<?=$key['client_id']; ?>' data-target="#deleteClient"><i class="fa fa-times"></i></button>
                                            </td> -->
                                        </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div id="addClientDocument" class="modal fade" role="dialog">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Add New Document's</h4>
                    </div>
                    <div class="modal-body">
                        <form method="post" class="form-horizontal" action="<?=site_url('Admin/add_new_documents')?>" enctype="multipart/form-data">
                            <div class="form-group hidden">
                                <label class="col-sm-3 control-label">Clinet_id</label>
                                <div class="col-sm-7">
                                    <input type="text" class="form-control doc_client_id" name="doc_client_id">
                                </div>
                            </div>
                            <div class="table-responsive">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Document Name</th>
                                            <th>File</th>
                                        </tr>
                                    </thead>
                                    <tbody class="doc_stock">
                                        <tr>
                                            <th>
                                                <select name="doc_name[]" class="form-control doc_name" id="" style="border:none;" required>
                                                    <option value="Adhar_Card">Adhar Card</option>
                                                    <option value="Pan_Card">Pan Card</option>
                                                    <option value="School_Leaving">School Leaving</option>
                                                    <option value="Passport">Passport</option>
                                                    <option value="Marriege_Certificate">Marriege Certificate</option>
                                                    <option value="Light_Bill">Light Bill</option>
                                                    <option value="Ration_Card">Ration Card</option><option value="Voting_Card">Voting Card</option>
                                                </select>
                                            </th>
                                            <th>
                                                <input type="file" name="doc_image[]" class="form-control" accept="image/gif,image/png,image/jpeg" multiple="" style="border:none;">
                                            </th>
                                        </tr>
                                    </tbody> 
                                </table>
                                <span class="add_doc pull-right" style="color:#67C6F1; font-size: 08px;"><i class="fa fa-plus fa-2x" aria-hidden="true"><u style="margin-left: 5px;"> <b>New</b></u></i></span>
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
    </div>
</div>
<div id="deleteClient" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Delete Client Details</h4>
            </div>
            <div class="modal-body">
                <form method="post" class="form-horizontal" action="<?=site_url('Admin/delete_client')?>" enctype="multipart/form-data">
                   <div class="form-group hidden">
                        <label class="col-sm-3 control-label">Client ID</label>
                        <div class="col-sm-7">
                            <input type="text" class="form-control client_id_delete_record" name="client_id">
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