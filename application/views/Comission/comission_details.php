    <div class="wrapper wrapper-content animated fadeInRight">
        <div class="row">
            <div class="col-lg-6 hidden" id="new_comission_registerss">
                <div class="col-lg-12">
                    <div class="ibox float-e-margins">
                        <div class="ibox-title">
                            <h5>Add Comission</h5>
                            <span class="btn btn-success btn-xs pull-right close_new_comission"><i class="fa fa-times-circle" title="Close"></i></span>
                        </div>
                        <div class="ibox-content">
                            <form method="post" class="form-horizontal" id="comissionDetails" action="<?=site_url('Admin/add_comission_details')?>" enctype="multipart/form-data" id="add_policy">
                                <div class="form-group " id="data_2">
                                    <label class="col-sm-3 control-label">Comission Date</label>
                                    <div class="input-group date col-sm-7" style="margin-left:28%;">
                                        <span class="input-group-addon">
                                            <i class="fa fa-calendar"></i>
                                        </span>
                                        <input type="text" class="form-control"  placeholder="<?php echo date('d-m-Y');?>" name="comission_date">
                                    </div>
                                </div> 
                                <div class="form-group"><label class="col-sm-3 control-label">Policy No.</label>
                                    <div class="col-sm-8">
                                        <select class="form-control select2_demo_4" id="comission_policy_number" name="comission_policy_number" style="width:100%;" readonly>
                                            <option></option>
                                            <?php foreach ($policy_number as $key) { ?>
                                                <option value="<?=$key['policy_number']?>"><?=$key['policy_number']?></option>
                                              <?php } ?>
                                        </select>
                                    </div>
                                </div>
                               <div class="form-group">
                                <label class="col-sm-3 control-label">Agent</label>
                                    <div class="col-sm-8">
                                        <select class="form-control comission_agent_id" name="comission_agent_id">
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                <label class="col-sm-3 control-label">Client</label>
                                    <div class="col-sm-8">
                                        <select class="form-control comission_client_id" name="comission_client_id" required style="width:100%;">
                                            
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group"><label class="col-sm-3 control-label">Premium</label>
                                    <div class="col-sm-8"><input type="text" class="form-control comission_premium" name="comission_premium" placeholder="Policy Number" readonly></div>
                                </div>
                                <div class="form-group" id="data_2">
                                    <label class="col-sm-3 control-label">Due Date</label>
                                    <div class="input-group date col-sm-7" style="margin-left:28%;">
                                        <span class="input-group-addon">
                                            <i class="fa fa-calendar"></i>
                                        </span>
                                        <input type="text" class="form-control"  placeholder="<?php echo date('d-m-Y');?>" name="comission_due_date">
                                    </div>
                                </div>
                                <div class="form-group"><label class="col-sm-3 control-label">%</label>
                                    <div class="col-sm-8"><input type="text" class="form-control comission_percentage" name="comission_percentage" placeholder="Comission %"></div>
                                </div>
                                <div class="form-group"><label class="col-sm-3 control-label">Amount</label>
                                    <div class="col-sm-8"><input type="text" class="form-control comission_amount" name="comission_amount" placeholder="Comission Amount" readonly></div>
                                </div>
                                <div class="form-group hidden">
                                <label class="col-sm-3 control-label">Payment Mode</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control comission_mode_of_payment" name="comission_mode_of_payment">
                                    </div>
                                </div>    
                                <div class="form-group">
                                    <div class="col-sm-12 col-sm-offset-4">
                                        <button class="btn btn-white" type="reset">Reset</button>
                                        <button class="btn btn-primary" type="submit">Add Comission</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-12" id="comission_deatilssss">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>All Comission Details</h5>
                        <span class="btn btn-success btn-xs pull-right new_comission_reg"><i class="fa fa-plus" title="New Comission"></i></span>
                    </div>
                    <div class="ibox-content">
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered table-hover dataTables-example" >
                                <thead>
                                    <tr>
                                        <th>Sr no</th>
                                        <th>Comission Date</th>
                                        <th>Client Name</th>
                                        <th>Agent Name</th>
                                        <th>Policy No.</th>
                                        <th>Policy Premium.</th>
                                        <th>Comission %</th>
                                        <th>Comission Amount</th>
                                        <!-- <th>Action</th> -->
                                    </tr>
                                </thead>
                                <tbody>
                                <?php $i=1; foreach ($comission_details as $key) {  ?>
                                    <tr>
                                        <td><?php echo $i++; ?> </td>
                                        <td><?=$key['comission_date']; ?></td>
                                        <td><?=$key['client_first_name']." ".$key['client_middle_name']." ".$key['client_last_name']; ?></td>
                                        <td><?=$key['agent_name']; ?></td>
                                        <td><?=$key['comission_policy_number']; ?></td>
                                        <td><?=$key['comission_premium']; ?></td>
                                        <td><?=$key['comission_percentage']; ?></td>
                                        <td><?=$key['comission_amount']; ?></td>
                                        <!-- <td>
                                            <button class="btn btn-primary btn-xs" data-toggle="modal" id ='<?=$key['comission_id'].'*'.$key['comission_date'].'*'.$key['comission_policy_number'].'*'.$key['comission_premium'].'*'.$key['comission_due_date'].'*'.$key['comission_percentage'].'*'.$key['comission_amount']; ?>' data-target="#editComission"><i class="fa fa-pencil"></i></button>&nbsp &nbsp
                                            <button class="btn btn-danger btn-xs" data-toggle="modal" id ='<?=$key['comission_id']; ?>' data-target="#deleteComission"><i class="fa fa-times"></i></button>
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
        <div id="editComission" class="modal fade" role="dialog">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Edit Comission Details</h4>
                    </div>
                    <div class="modal-body">
                        <form method="post" class="form-horizontal" id="update_comissionDetails" action="<?=site_url('Admin/edit_comission')?>" enctype="multipart/form-data">
                            <div class="form-group hidden">
                                <label class="col-sm-3 control-label">Comission ID</label>
                                <div class="col-sm-7">
                                    <input type="text" class="form-control comission_id_edit" name="comission_id">
                                </div>
                            </div>
                            <div class="form-group " id="data_3">
                                <label class="col-sm-3 control-label">Comission Date</label>
                                <div class="input-group date col-sm-7">
                                    <span class="input-group-addon">
                                        <i class="fa fa-calendar"></i>
                                    </span>
                                    <input type="text" class="form-control comission_date_edit" value="<?php echo date('Y-m-d');?>" placeholder="Comission Date" name="comission_date">
                                </div>
                            </div> 
                            <!-- <div class="form-group"> -->
                            <!-- <label class="col-sm-3 control-label">Comission Agent</label>
                                <div class="col-sm-8">
                                    <select class="form-control" name="comission_agent_id" required>
                                        <option value="" disabled selected>Select Agent</option>
                                         <?php foreach ($agent_details as $key) { ?>
                                            <option value="<?=$key['agent_id']?>"> <?=$key['agent_name']?></option>
                                          <?php } ?>
                                    </select>
                                </div>
                            </div> -->
                            <!-- <div class="form-group">
                                <label class="col-sm-3 control-label">Comission Client</label>
                                <div class="col-sm-8">
                                    <select class="form-control comission_client_id_edit" name="comission_client_id" required>
                                         <option value="" disabled selected>Select Client</option>
                                         <?php foreach ($client_details as $key) { ?>
                                            <option value="<?=$key['client_id']?>"><?=$key['client_prefix']?> <?=$key['client_first_name']?> <?=$key['client_middle_name']?> <?=$key['client_last_name']?></option>
                                          <?php } ?>
                                    </select>
                                </div>
                            </div> -->
                            <div class="form-group">
                                <label class="col-sm-3 control-label">Policy No.</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control comission_policy_number_edit" name="comission_policy_number" placeholder="Policy Number">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label">Comission Premium</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control comission_premium_edit" name="comission_premium" placeholder="Policy Number">
                                </div>
                            </div>
                            <div class="form-group " id="data_3">
                                <label class="col-sm-3 control-label">Comission Due Date</label>
                                <div class="input-group date col-sm-7">
                                    <span class="input-group-addon">
                                        <i class="fa fa-calendar"></i>
                                    </span>
                                    <input type="text" class="form-control comission_due_date_edit" value="<?php echo date('Y-m-d');?>" placeholder="Comission Last Due" name="comission_due_date">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label">Comission %</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control comission_percentage_edit" name="comission_percentage" placeholder="Comission %">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label">Comission Amount</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control comission_amount_edit" name="comission_amount" placeholder="Comission Amount">
                                </div>
                            </div>
                            <!-- <div class="form-group">
                                <label class="col-sm-3 control-label">Payment Mode</label>
                                <div class="col-sm-8">
                                    <select class="form-control" name="comission_mode_of_payment">
                                        <option value="0">Select Payment Mode</option>
                                        <option value="1">Yearly</option>
                                        <option value="2">Half Year</option>
                                        <option value="3">Quaterly</option>
                                        <option value="12">Monthly</option>
                                        <option value="4">Salary Saving Scheme</option>
                                        <option value="5">One Time</option>
                                    </select>
                                </div>
                            </div> -->
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
        </div>
        <div id="deleteComission" class="modal fade" role="dialog">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Delete Comission Details</h4>
                    </div>
                    <div class="modal-body">
                        <form method="post" class="form-horizontal" action="<?=site_url('Admin/delete_comission')?>" enctype="multipart/form-data">
                           <div class="form-group hidden">
                                <label class="col-sm-3 control-label">Comission ID</label>
                                <div class="col-sm-7">
                                    <input type="text" class="form-control comission_id_delete" name="comission_id">
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
        <div class="col-lg-6" id="each_comission_details">
        </div>
    </div>