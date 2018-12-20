        <div class="wrapper wrapper-content animated fadeInRight">
            <div class="row">
                <div class="col-lg-5">
                    <div class="ibox float-e-margins">
                        <div class="ibox-title">
                            <h5>Add Agent</h5>
                        </div>
                        <div class="ibox-content">
                            <form method="post" class="form-horizontal" id="agentDetails" action="<?=site_url('Admin/add_new_agent')?>" enctype="multipart/form-data">
                                <div class="form-group">
                                    <label class="col-sm-3 control-label">Agent Name</label>
                                    <div class="col-sm-7">
                                        <input type="text" class="form-control" name="agent_name">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-3 control-label">Agent Short Code</label>
                                    <div class="col-sm-7">
                                        <input type="text" class="form-control" name="agent_short_code">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-3 control-label">Agent Code</label>
                                    <div class="col-sm-7">
                                        <input type="text" class="form-control" name="agent_code">
                                    </div>
                                </div>
                                <div class="hr-line-dashed"></div>
                                <div class="form-group">
                                    <div class="col-lg-6" style="text-align:right;">
                                        <button class="btn btn-primary" type="submit">Add Agent</button>
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
                            <h5>All Agent Details</h5>
                        </div>
                        <div class="ibox-content">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover dataTables-example" >
                                    <thead>
                                        <tr>
                                            <th>Sr no</th>
                                            <th>Agent Name</th>
                                            <th>Short Code</th>
                                            <th>Agent Code</th>
                                            <th>Oprations</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                      <?php $i = 1;foreach ($branch as $key) {                                       ?>
                                        <tr class="gradeU">
                                            <td><?=$i++ ?></td>
                                            <td><?=$key['agent_name']; ?></td>
                                            <td><?=$key['agent_short_code']; ?></td>
                                            <td><?=$key['agent_code']; ?></td>
                                            <td>
                                                <button class="btn btn-primary btn-xs" data-toggle="modal" id ="<?=$key['agent_id'].'-'.$key['agent_name'].'-'.$key['agent_short_code'].'-'.$key['agent_code']?>" data-target="#editAgent"><i class="fa fa-pencil"></i></button>&nbsp &nbsp
                                                <button class="btn btn-danger btn-xs" data-toggle="modal" id ='<?=$key['agent_id']; ?>' data-target="#deleteAgent"><i class="fa fa-times"></i></button>
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
            <div id="editAgent" class="modal fade" role="dialog">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title">Edit Agent Details</h4>
                        </div>
                        <div class="modal-body">
                            <form method="post" class="form-horizontal" id="update_agentDetails" action="<?=site_url('Admin/edit_agent')?>" enctype="multipart/form-data">
                                <div class="form-group hidden">
                                    <label class="col-sm-3 control-label">Agent ID</label>
                                    <div class="col-sm-7">
                                        <input type="text" class="form-control agent_id_edit" name="agent_id">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-3 control-label">Agent Name</label>
                                    <div class="col-sm-7">
                                        <input type="text" class="form-control agent_name_edit" name="agent_name">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-3 control-label">Agent Short Code</label>
                                    <div class="col-sm-7">
                                        <input type="text" class="form-control agent_short_code_edit" name="agent_short_code">
                                    </div>
                                </div>
                                <div class="form-group">
                                <label class="col-sm-3 control-label">Agent Code</label>
                                    <div class="col-sm-7">
                                        <input type="text" class="form-control agent_code_edit" name="agent_code"> 
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
            <div id="deleteAgent" class="modal fade" role="dialog">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title">Delete Agent Details</h4>
                        </div>
                        <div class="modal-body">
                            <form method="post" class="form-horizontal" action="<?=site_url('Admin/delete_agent')?>" enctype="multipart/form-data">
                               <div class="form-group hidden">
                                    <label class="col-sm-3 control-label">Agent ID</label>
                                    <div class="col-sm-7">
                                        <input type="text" class="form-control agent_id_delete" name="agent_id">
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