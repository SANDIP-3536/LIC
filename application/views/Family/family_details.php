        <div class="wrapper wrapper-content animated fadeInRight">
            <div class="row">
                <div class="col-lg-5">
                    <div class="ibox float-e-margins">
                        <div class="ibox-title">
                            <h5>Add Family Details</h5>
                        </div>
                        <div class="ibox-content">
                            <form method="post" class="form-horizontal" id="familyDetails" action="<?=site_url('Admin/add_family_details')?>" enctype="multipart/form-data">
                                <div class="form-group">
                                    <label class="col-sm-3 control-label"> Head Name</label>
                                    <div class="col-sm-7">
                                        <input type="text" class="form-control" name="family_head_name" onkeyup="caps(this)">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-3 control-label"> Account Number</label>
                                    <div class="col-sm-7">
                                        <input type="text" class="form-control" name="family_acc_number" onkeyup="caps(this)">
                                    </div>
                                </div>
                                <div class="hr-line-dashed"></div>
                                <div class="form-group">
                                    <div class="col-lg-6" style="text-align:right;">
                                        <button class="btn btn-primary" type="submit">Add Details</button>
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
                            <h5>All Family Details</h5>
                        </div>
                        <div class="ibox-content">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover dataTables-example" >
                                    <thead>
                                        <tr>
                                            <th>Account Number</th>
                                            <th>Head Name</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                      <?php $i = 1;foreach ($family as $key) {                                       ?>
                                        <tr>
                                            <td><?=$key['family_acc_number']; ?></td>
                                            <td><?=$key['family_head_name']; ?></td>
                                            <td>
                                                 <button class="btn btn-primary btn-xs" data-toggle="modal" id ="<?=$key['family_id'].'-'.$key['family_head_name'].'-'.$key['family_acc_number']?>" data-target="#editFamily"><i class="fa fa-pencil"></i></button>&nbsp &nbsp
                                                <button class="btn btn-danger btn-xs" data-toggle="modal" id ='<?=$key['family_id']; ?>' data-target="#deleteFamily"><i class="fa fa-times"></i></button>
                                            </td>
                                        </tr>
                                        <?php $i++; } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div id="editFamily" class="modal fade" role="dialog">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title">Edit Family Details</h4>
                        </div>
                        <div class="modal-body">
                            <form method="post" class="form-horizontal" id="update_familyDetails" action="<?=site_url('Admin/edit_family')?>" enctype="multipart/form-data">
                                <div class="form-group hidden">
                                    <label class="col-sm-3 control-label">Family ID</label>
                                    <div class="col-sm-7">
                                        <input type="text" class="form-control family_id_edit" name="family_id_edit">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-3 control-label">Family Head Name</label>
                                    <div class="col-sm-7">
                                        <input type="text" class="form-control family_head_name_edit" name="family_head_name_edit" onkeyup="caps(this)">
                                    </div>
                                </div>
                                <div class="form-group">
                                <label class="col-sm-3 control-label">Family Account Number</label>
                                    <div class="col-sm-7">
                                        <input type="text" class="form-control family_acc_number_edit" name="family_acc_number_edit" onkeyup="caps(this)"> 
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
            <div id="deleteFamily" class="modal fade" role="dialog">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title">Delete Family Details</h4>
                        </div>
                        <div class="modal-body">
                            <form method="post" class="form-horizontal" action="<?=site_url('Admin/delete_family_details')?>" enctype="multipart/form-data">
                               <div class="form-group hidden">
                                    <label class="col-sm-3 control-label">Family ID</label>
                                    <div class="col-sm-7">
                                        <input type="text" class="form-control family_id_delete" name="family_id">
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