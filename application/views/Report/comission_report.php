        <style type="text/css">

            th{
                
            }
            td{
                white-space: nowrap !important;
            }
            table tbody tr:last-child td {
               /*font-size: 16px;*/
               border-right:none;
               font-weight: bold;
            }
            @media print{
                 th{
                    text-align: center;
                }
                td{
                    white-space: nowrap !important;
                    font-size : 16px;
                }
                dt-title{
                    text-align: center;
                }
                table tbody tr:last-child td {
                   /*border:none !important;*/
                   font-weight: bold;
                }
                table {
                   border-top:none !important;
                   border-bottom:none !important;
                   border-right:none !important;
                   border-left:none !important;
                }
            } 

        </style>
        <div class="wrapper wrapper-content animated fadeInRight">
            <div class="row">
                <div class="col-lg-12">
                    <div class="ibox float-e-margins">
                        <div class="ibox-title">
                            <h5>Comission Reports Details</h5>
                        </div>
                     
                        <div class="ibox-content">
                            <form method="post" class="form-horizontal" id="reportDetails" enctype="multipart/form-data">
                                <div class="form-group">
                                    <div class="col-sm-2">
                                        <div class="col-sm-10">   
                                            <div class="form-group">
                                                <label class="control-label" style="padding-bottom:2%"></label> 
                                            </div>
                                        </div>
                                    </div> 
                                    <div class="col-sm-3">
                                        <div class="col-sm-10">   
                                            <div class="form-group">
                                                <label class="control-label" style="padding-bottom:2%">&nbsp Report For</label> 
                                                <select class="form-control " name="report_for" style="border-radius:3px;" id="report_for">
                                                    <option value="0">Please Select Report</option>
                                                    <option value="1">01 - POLICY NUMBER WISE LIST</option>
                                                    <option value="2">02 - SURNAME WISE LIST</option>
                                                    <option value="3">03 - MONTH WISE ALL AGENT</option>
                                                    <option value="4">04 - MONTH WISE PERTICULAR AGENT</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group hidden" id="family_ac_wise_due_list">
                                    <div class="col-sm-2">
                                        <div class="col-sm-10">   
                                            <div class="form-group">
                                                <label class="control-label" style="padding-bottom:2%"></label> 
                                            </div>
                                        </div>
                                    </div> 
                                    <div class="col-sm-3">
                                        <div class="col-sm-10">   
                                            <div class="form-group">
                                                <label class="control-label" style="padding-bottom:2%">&nbsp Account Number</label> 
                                                <!-- <input type="text" name="" class="form-control" id="family_acc_no" value="68"> -->
                                                <select class="form-control select2_demo_1" name="" id="family_acc_no"style="width:100%;">
                                                    <option></option>
                                                    <?php foreach ($acc as $key) { ?>
                                                        <option value="<?=$key['family_acc_number']?>"><?=$key['family_acc_number']?></option>
                                                      <?php } ?>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-3 hidden">
                                        <div class="col-sm-10">   
                                            <div class="form-group">
                                                <label class="control-label" style="padding-bottom:2%">&nbsp Account Holder</label> 
                                                <input type="text" name="" class="form-control" id="family_acc_holder_name">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-2">
                                        <div class="col-sm-10">   
                                            <div class="form-group">
                                                <label class="control-label" style="padding-bottom:2%"></label> 
                                            </div>
                                        </div>
                                    </div> 
                                    <div class="col-sm-3">   
                                        <div class="col-sm-10" style="padding-top:8%;">   
                                            <div class="form-group">
                                                <span class="btn btn-success show_family_ac_wise_due_list">Show Report</span>
                                               <!-- <input type='button' class="btn btn-warning" value='Print Report' onclick='printDiv("example");'/> -->
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group hidden" id="month_wise_agent_list">
                                    <div class="col-sm-2">
                                        <div class="col-sm-10">   
                                            <div class="form-group">
                                                <label class="control-label" style="padding-bottom:2%"></label> 
                                            </div>
                                        </div>
                                    </div> 
                                    <div class="col-sm-3">
                                        <div class="form-group" id="data_4">
                                            <div class="col-sm-10">
                                                <label class="font-noraml"><b>Month select</b></label>
                                                <div class="input-group date">
                                                    <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                                                    <input type="text" class="form-control" name="" id="month_selection">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-2">
                                        <div class="col-sm-10">   
                                            <div class="form-group">
                                                <label class="control-label" style="padding-bottom:2%"></label> 
                                            </div>
                                        </div>
                                    </div> 
                                    <div class="col-sm-3">   
                                        <div class="col-sm-10" style="padding-top:8%;">   
                                            <div class="form-group">
                                                <span class="btn btn-success show_month_wise_agent_list">Show Report</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group hidden" id="month_wise_pre_agent_list">
                                    <div class="col-sm-2">
                                        <div class="col-sm-10">   
                                            <div class="form-group">
                                                <label class="control-label" style="padding-bottom:2%"></label> 
                                            </div>
                                        </div>
                                    </div> 
                                    <div class="col-sm-3">
                                        <div class="form-group" id="data_4">
                                            <div class="col-sm-10">
                                                <label class="font-noraml"><b>Month select</b></label>
                                                <div class="input-group date">
                                                    <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                                                    <input type="text" class="form-control" name="" id="month_selection1">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                        <div class="col-sm-10">   
                                            <div class="form-group">
                                                <label class="control-label" style="padding-bottom:2%">&nbsp Agent Short Code</label> 
                                                <!-- <input type="text" name="" class="form-control" id="family_acc_no" value="68"> -->
                                                <select class="form-control select2_demo_1" name="" id="agent_short_code"style="width:100%;">
                                                    <option></option>
                                                    <?php foreach ($agent as $key) { ?>
                                                        <option value="<?=$key['agent_id']?>"><?=$key['agent_short_code']?></option>
                                                      <?php } ?>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-2">
                                        <div class="col-sm-10">   
                                            <div class="form-group">
                                                <label class="control-label" style="padding-bottom:2%"></label> 
                                            </div>
                                        </div>
                                    </div> 
                                    <div class="col-sm-3">   
                                        <div class="col-sm-10">   
                                            <div class="form-group">
                                                <span class="btn btn-success show_month_wise_pre_agent_list">Show Report</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                            <div class="ibox float-e-margins">
                                <div class="ibox-content">
                                    <div class="table-responsive hidden" id="policy_number_wise_list_table">
                                        <table class="table table-striped table-bordered table-hover dataTables-example1" style="width:100%;">
                                        </table>
                                    </div>
                                    <div class="table-responsive hidden" id="surname_wise_list_table">
                                        <table class="table table-striped table-bordered table-hover dataTables-example2">
                                        </table>
                                    </div>
                                    <div class="table-responsive hidden" id="month_wise_agent_list_table">
                                        <table class="table table-striped table-bordered table-hover dataTables-example3">
                                        </table>
                                    </div>
                                    <div class="table-responsive hidden" id="month_wise_pre_agent_list_table">
                                        <table class="table table-striped table-bordered table-hover dataTables-example4">
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>