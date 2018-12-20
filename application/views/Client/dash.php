


        
        <div class="wrapper wrapper-content animated fadeInRight">
            <div class="container">
            <div class="row">

                <div class="col-lg-12">
                 <a class="btn btn-danger btn-xs pull-right" href="<?=site_url('Admin/client_details')?>"><b>Show All Clients</b></a>
                    <div class="ibox float-e-margins">
                        <div class="ibox-title">
                            <h5>Add Client<small>  Fill all the mandatory fields.</small></h5>
                        </div>
                        <div class="ibox-content">
                            <form method="post" class="form-horizontal" action="<?=site_url('Admin/add_new_agent')?>" enctype="multipart/form-data">
                                <div class="form-group">

                                <label class="col-sm-1 control-label">Name</label>
                                    <div class="col-sm-2">
                                        <select class="form-control" name="account">
                                            <option>Mr.</option>
                                            <option>Mrs.</option>
                                            <option>Miss.</option>
                                        </select>
                                    </div>



                                    <div class="col-sm-9">
                                        <div class="row">
                                            <div class="col-md-4"><input type="text" placeholder="Lastname" class="form-control">
                                            <!-- <span class="help-block m-b-none">Lastname</span> -->
                                            </div>
                                            <div class="col-md-4"><input type="text" placeholder="Firstname" class="form-control">
                                            <!-- <span class="help-block m-b-none">Firstname</span> -->
                                            </div>
                                            <div class="col-md-4"><input type="text" placeholder="Middlename" class="form-control">
                                            <!-- <span class="help-block m-b-none">Middlename</span> -->
                                            </div>
                                        </div>
                                    </div>
                                    
                                </div>
                                
                                <!-- <div class="hr-line-dashed"></div> -->
                                <div class="form-group">
                                <label class="col-sm-1 control-label">Address</label>
                                    <div class="col-sm-6"><input type="text" class="form-control" name="agent_code" placeholder="Address">
                                    <!-- <span class="help-block m-b-none">Enter the branch code as per the area.</span> -->
                                    </div>

                                <label class="col-sm-2 control-label">Client Area</label>
                                    <div class="col-sm-3"><input type="text" class="form-control" name="agent_name" placeholder="Area"></div>
                                </div>       

                                <!-- <div class="hr-line-dashed"></div> -->
                                <div class="form-group">
                                    <label class="col-sm-1 control-label">PAN No</label>
                                    <div class="col-sm-5">
                                    <input type="text" class="form-control" name="agent_code" placeholder="PAN Number">
                                    </div>

                                    <label class="col-sm-1 control-label">Adhar No</label>
                                    <div class="col-sm-5">
                                    <input type="text" class="form-control" name="agent_code" placeholder="Adhar Number">
                                    </div>
                                </div>

                                <!-- <div class="hr-line-dashed"></div> -->
                                <div class="form-group">
                                <label class="col-sm-2">Date Of Birth</label>
                                    <div class="col-sm-2">
                                    <input type="text" class="form-control" name="agent_code" >
                                    </div>

                                <label class="col-sm-2 control-label">Birth Place</label>
                                    <div class="col-sm-2"><input type="text" class="form-control" name="agent_name"></div>

                                <label class="col-sm-2 control-label">Date of Anniversary</label>
                                    <div class="col-sm-2"><input type="text" class="form-control" name="agent_code">
                                    </div>
                                </div>


                                <div class="hr-line-dashed" style="background-color: red;"></div>
                                <div class="form-group"><label class="col-sm-2 control-label">Maiden Name</label>

                                    <div class="col-sm-10">
                                        <div class="row">
                                            <div class="col-md-3"><input type="text" placeholder="Firstname" class="form-control">
                                            <span class="help-block m-b-none">Firstname</span>
                                            </div>
                                            <div class="col-md-3"><input type="text" placeholder="Middlename" class="form-control">
                                            <span class="help-block m-b-none">Middlename</span></div>
                                            <div class="col-md-3"><input type="text" placeholder="Lastname" class="form-control"><span class="help-block m-b-none">Lastname</span></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="hr-line-dashed" style="background-color: red;"></div>

                                <div class="form-group">
                                    <label class="col-sm-2 control-label">Gender</label>
                                    <div class="i-checks">

                                        <label> 
                                        <span style="margin-right: 100px;"></span>
                                        <input type="radio"  checked="" value="option1" name="a"> <i></i> Male </label>
                                        <span style="margin-right: 100px;"></span>
                                        <label> <input type="radio" value="option2" name="a"> <i></i> Female </label>
                                        <span style="margin-right: 100px;"></span>
                                        <label> <input type="radio" value="option2" name="a"> <i></i> Other </label>
                                    </div>
                                </div>

                                <div class="form-group"><label class="col-sm-2 control-label">Blood Group</label>
                                    <div class="col-sm-5"><input type="text" class="form-control" name="agent_name"></div>
                                </div>

                                <div class="hr-line-dashed"></div>
                                <div class="form-group"><label class="col-sm-2 control-label">Family Account No</label>
                                    <div class="col-sm-5"><input type="text" class="form-control" name="agent_code"> <span class="help-block m-b-none">Enter the branch code as per the area.</span>
                                    </div>
                                </div> 
                                

                                <div class="form-group"><label class="col-sm-2 control-label">Father Name</label>

                                    <div class="col-sm-10">
                                        <div class="row">
                                            <div class="col-md-3"><input type="text" placeholder="Firstname" class="form-control">
                                            <span class="help-block m-b-none">Firstname</span>
                                            </div>
                                            <div class="col-md-3"><input type="text" placeholder="Middlename" class="form-control">
                                            <span class="help-block m-b-none">Middlename</span></div>
                                            <div class="col-md-3"><input type="text" placeholder="Lastname" class="form-control"><span class="help-block m-b-none">Lastname</span></div>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group"><label class="col-sm-2 control-label">Client Mobile Number</label>
                                    <div class="col-sm-5"><input type="text" class="form-control" name="agent_name" value="+91"></div>
                                </div>

                                <div class="hr-line-dashed"></div>
                                <div class="form-group"><label class="col-sm-2 control-label">Client Phone Number</label>
                                    <div class="col-sm-5"><input type="text" class="form-control" name="agent_code"> <span class="help-block m-b-none">Enter the branch code as per the area.</span>
                                    </div>
                                </div>    

                                <div class="form-group"><label class="col-sm-2 control-label">Client Email id</label>
                                    <div class="col-sm-5"><input type="text" class="form-control" name="agent_name"></div>
                                </div>
                                
                                <div class="hr-line-dashed"></div>
                                <div class="form-group">
                                    <div class="col-sm-4 col-sm-offset-2">
                                        <button class="btn btn-white" type="submit">Cancel</button>
                                        <button class="btn btn-primary" type="submit">Add Client</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            </div>

        </div>






