        <div class="wrapper wrapper-content animated fadeInRight">
            <div class="row">
                <div class="col-lg-5">
                    <div class="ibox float-e-margins">
                        <div class="ibox-title">
                            <h5>Add Family Account</h5>
                        </div>
                     
                        <div class="ibox-content">
                            <form method="post" class="form-horizontal" id="branchDetails" action="<?=site_url('Admin/add_new_branch')?>" enctype="multipart/form-data">
                                <div class="form-group"><label class="col-sm-3 control-label">Branch Name</label>
                                    <div class="col-sm-7">
                                        <input type="text" class="form-control" name="branch_name" onkeyup="caps(this)">
                                    </div>
                                </div>
                                <div class="form-group">
                                <label class="col-sm-3 control-label">Branch Code</label>
                                    <div class="col-sm-7">
                                        <input type="text" class="form-control" name="branch_code" onkeyup="caps(this)"> 
                                    </div>
                                </div>
                                <div class="hr-line-dashed"></div>
                                <div class="form-group">
                                    <div class="col-lg-6" style="text-align:right;">
                                        <button class="btn btn-primary" type="submit">Add Branch</button>
                                    </div>
                                    <div class="col-lg-6">
                                        <button class="btn btn-success" type="reset">Reset</button>
                                    </div>
                                </div>
                            </form>

                        </div>
                    </div>
                </div>
                <div class="col-lg-7">
                    <div class="ibox float-e-margins">
                        <div class="ibox-title">
                    <!-- <a class="btn btn-danger btn-xs pull-right" href="<?=site_url('Admin/add_branch')?>"><b>Add New Branch</b></a> -->
                            <h5>All Branch Details</h5>
                        </div>
                     
                        <div class="ibox-content">
                        <div class="table-responsive">
                        <table class="table table-striped table-bordered table-hover dataTables-example" >
                        <thead>
                        <tr>
                            <th>Sr no</th>
                            <th>Branch Name</th>
                            <th>Branch Code</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                      <?php $i = 1;foreach ($branch as $key) {
                       ?>
                        <tr class="branch">
                            <td><?=$i++; ?></td>
                            <td><?=$key['branch_name']; ?></td>
                            <td><?=$key['branch_code']; ?></td>
                            <td>
                                <button class="btn btn-primary btn-xs" data-toggle="modal" id ="<?=$key['branch_id'].'-'.$key['branch_name'].'-'.$key['branch_code']?>" data-target="#editBranch"><i class="fa fa-pencil"></i></button>&nbsp &nbsp
                                <button class="btn btn-danger btn-xs" data-toggle="modal" id ='<?=$key['branch_id']; ?>' data-target="#deleteBranch"><i class="fa fa-times"></i></button>
                            </td>
                        </tr>
                        <?php } ?>
                        </tbody>
                        </table>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
            <div id="editBranch" class="modal fade" role="dialog">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title">Edit Branch Details</h4>
                        </div>
                        <div class="modal-body">
                            <form method="post" class="form-horizontal" id="update_branchDetails" action="<?=site_url('Admin/edit_branch')?>" enctype="multipart/form-data">
                                <div class="form-group hidden">
                                    <label class="col-sm-3 control-label">Branch ID</label>
                                    <div class="col-sm-7">
                                        <input type="text" class="form-control branch_id_edit" name="branch_id">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-3 control-label">Branch Name</label>
                                    <div class="col-sm-7">
                                        <input type="text" class="form-control branch_name_edit" name="branch_name" onkeyup="caps(this)">
                                    </div>
                                </div>
                                <div class="form-group">
                                <label class="col-sm-3 control-label">Branch Code</label>
                                    <div class="col-sm-7">
                                        <input type="text" class="form-control branch_code_edit" name="branch_code" onkeyup="caps(this)"> 
                                    </div>
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
            <div id="deleteBranch" class="modal fade" role="dialog">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title">Delete Branch Details</h4>
                        </div>
                        <div class="modal-body">
                            <form method="post" class="form-horizontal" action="<?=site_url('Admin/delete_branch')?>" enctype="multipart/form-data">
                               <div class="form-group hidden">
                                    <label class="col-sm-3 control-label">Branch ID</label>
                                    <div class="col-sm-7">
                                        <input type="text" class="form-control branch_id_delete" name="branch_id">
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