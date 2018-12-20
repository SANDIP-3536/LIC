


        
        <div class="wrapper wrapper-content animated fadeInRight">
            <div class="container">
            <div class="row">

                <div class="col-lg-12">
                 <a class="btn btn-danger btn-xs pull-right" href="<?=site_url('Admin/agent_details')?>"><b>Show All Agents</b></a>
                    <div class="ibox float-e-margins">
                        <div class="ibox-title">
                            <h5>Add New Agent Form<small>  Fill all the mandatory fields.</small></h5>
                        </div>
                        <div class="ibox-content">
                            <form method="post" class="form-horizontal" action="<?=site_url('Admin/add_new_agent')?>" enctype="multipart/form-data">

                                <div class="form-group"><label class="col-sm-2 control-label">Agent Name</label>
                                    <div class="col-sm-5"><input type="text" class="form-control" name="agent_name"></div>
                                </div>
                                
                                <div class="hr-line-dashed"></div>
                                <div class="form-group"><label class="col-sm-2 control-label">Agent Code</label>
                                    <div class="col-sm-5"><input type="text" class="form-control" name="agent_code"> <span class="help-block m-b-none">Enter the branch code as per the area.</span>
                                    </div>
                                </div>

                                <div class="hr-line-dashed"></div>
                                <div class="form-group">
                                    <div class="col-sm-4 col-sm-offset-2">
                                        <button class="btn btn-white" type="submit">Cancel</button>
                                        <button class="btn btn-primary" type="submit">Add Agent</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            </div>

        </div>






