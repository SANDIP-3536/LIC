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

            .dataTables-example21 tbody tr td:nth-child(2) {
                    white-space: normal !important;

            }
            .dataTables-example21 tbody tr td:nth-child(3) {
                    white-space: normal !important;

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
                .dataTables-example21 tbody tr td:nth-child(2) {
                    white-space: normal !important;
                }
                .dataTables-example21 tbody tr td:nth-child(3) {
                    white-space: normal !important;
                }
            } 

        </style>
        <div class="wrapper wrapper-content animated fadeInRight">
            <div class="row">
                <div class="col-lg-12">
                    <div class="ibox float-e-margins">
                        <div class="ibox-title">
                            <h5>Reports Details</h5>
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
                                                    <option value="3">03 - SEX WISE LIST</option>
                                                    <option value="4">04 - DATE OF BIRTH WISE LIST</option>
                                                    <option value="5">05 - PLAN & TERM WISE LIST</option>
                                                    <option value="6">06 - MONTHLY DUE LIST</option>
                                                    <option value="7">07 - MEDICAL HISTORY DETAILS</option>
                                                    <option value="8">08 - MODE OF PAYMENT WISE LIST</option>
                                                    <option value="9">09 - S.B. DUE DATE WISE LIST</option>
                                                    <option value="10">10 - POLICY STATUS WISE LIST</option>
                                                    <option value="11">11 - DOCUMENT LIST</option>
                                                    <option value="12">12 - FAMILY A/C WISE LIST</option>
                                                    <option value="13">13 - FAMILY A/C WISE DUE LIST</option>
                                                    <option value="14">14 - BRANCH WISE LIST</option>
                                                    <option value="15">15 - AGENT WISE LIST</option>
                                                    <option value="16">16 - DATE OF COMMESNCEMENT WISE LIST</option>
                                                    <option value="17">17 - LIST OF POLICIES WITH NO NOMINEE</option>
                                                    <option value="18">18 - FAMILY CASH FLOW</option>
													<option value="19">19 - CLIENT CASH FLOW</option>
													<option value="20">20 - CLIENT SURNAME WISE LIST</option>
													<option value="21">21 - CLIENT ADDRESS WISE LIST</option>
													<option value="22">22 - FAMILY BIRTH-DATE LIST</option>
													<option value="23">23 - FAMILY LOAN CHART</option>
                                                    <option value="24">24 - FAMILY PENSION CHART</option>
													<option value="25">25 - FAMILY A/C OFFICE LIST</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-3 hidden" id="report_start_date">
                                        <div class="col-sm-10">   
                                            <div class="form-group">
                                                <label class="control-label" style="padding-bottom:2%">&nbsp Start Date</label> 
                                                <input type="text" name="" class="form-control datepicker" id="start_date" value="01-04-2017">
                                            </div>
                                        </div>
                                    </div> 
                                    <div class="col-sm-3 hidden" id="report_end_date">
                                        <div class="col-sm-10">   
                                            <div class="form-group">
                                                <label class="control-label" style="padding-bottom:2%">&nbsp End Date</label> 
                                                <input type="text" name:"" class="form-control datepicker" id="end_date" value="31-03-2018">
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
                                <div class="form-group hidden" id="family_ac_wise_list">
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
                                                <select class="form-control select2_demo_1" name="" id="family_acc_no1"style="width:100%;">
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
                                                <input type="text" name="" class="form-control" id="family_acc_holder_name1">
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
                                                <span class="btn btn-success show_family_ac_wise_list">Show Report</span>
                                               <!-- <input type='button' class="btn btn-warning" value='Print Report' onclick='printDiv("example");'/> -->
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group hidden" id="family_ac_office_wise_list">
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
                                                <select class="form-control select2_demo_1" name="" id="family_acc_office_no"style="width:100%;">
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
                                                <input type="text" name="" class="form-control" id="family_acc_office_holder_name1">
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
                                                <span class="btn btn-success show_family_ac_office_wise_list">Show Report</span>
                                               <!-- <input type='button' class="btn btn-warning" value='Print Report' onclick='printDiv("example");'/> -->
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group hidden" id="monthly_wise_due_list">
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
                                                <span class="btn btn-success show_month_wise_due_list">Show Report</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group hidden" id="sex_wise_list">
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
                                                <label class="control-label" style="padding-bottom:2%">&nbsp Gender</label> 
                                                <select class="form-control" name="" id="gender"style="width:100%;">
                                                    <option value="Male">MALE</option>
                                                    <option value="Female">FEMALE</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                        <div class="col-sm-10">   
                                            <div class="form-group">
                                                <label class="control-label" style="padding-bottom:2%">&nbsp Sort By</label> 
                                                <select class="form-control" name="" id="sex_sort" style="width:100%;">
                                                    <option value="client_last_name">Client Surname</option>
                                                    <option value="policy_number">Policy Number</option>
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
                                                <span class="btn btn-success show_sex_list">Show Report</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group hidden" id="MOP_wise_list">
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
                                                <label class="control-label" style="padding-bottom:2%">&nbsp Mode Of Payment</label> 
                                                <select class="form-control" name="" id="payment_mode" style="width:100%;">
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
                                    </div>
                                    <div class="col-sm-3 hidden">
                                        <div class="col-sm-10">   
                                            <div class="form-group">
                                                <label class="control-label" style="padding-bottom:2%">&nbsp Payment Name</label> 
                                                <input type="text" id="payment_name" class="form-control">
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
                                                <span class="btn btn-success show_MOP_list">Show Report</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group hidden" id="PS_wise_list">
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
                                                <label class="control-label" style="padding-bottom:2%">&nbsp Policy Status</label> 
                                                <select class="form-control" id="policy_status">
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
                                    </div>
                                    <div class="col-sm-3 hidden">
                                        <div class="col-sm-10">   
                                            <div class="form-group">
                                                <label class="control-label" style="padding-bottom:2%">&nbsp Status Name</label> 
                                                <input type="text" id="payment_status_name" class="form-control">
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
                                                <span class="btn btn-success show_PS_list">Show Report</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group hidden" id="document_wise_list">
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
                                                <label class="control-label" style="padding-bottom:2%">&nbsp Original Policy Status</label> 
                                                <select class="form-control" id="doc_status">
                                                    <option>Select Status</option>
                                                    <option value="1">1 - Yes</option>
                                                    <option value="0">2 - No</option>
                                                    <option value="2">3 - Loan</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-3 hidden">
                                        <div class="col-sm-10">   
                                            <div class="form-group">
                                                <label class="control-label" style="padding-bottom:2%">&nbsp Status Name</label> 
                                                <input type="text" id="doc_status_name" class="form-control">
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
                                                <span class="btn btn-success show_doc_list">Show Report</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group hidden" id="SB_DUE_wise_list">
                                    <div class="col-sm-2">
                                        <div class="col-sm-10">   
                                            <div class="form-group">
                                                <label class="control-label" style="padding-bottom:2%"></label> 
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
                                                <span class="btn btn-success show_SB_DUE_list">Show Report</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group hidden" id="medical_client_wise_list">
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
                                                <label class="control-label" style="padding-bottom:2%">&nbsp Client</label> 
                                                <!-- <input type="text" name="" class="form-control" id="family_acc_no" value="68"> -->
                                                <select class="form-control select2_demo_2" name="" id="client_id"style="width:100%;">
                                                    <option></option>
                                                    <?php foreach ($client_details as $key) { ?>
                                                        <option value="<?=$key['client_id']?>"><?=$key['client_prefix']?> <?=$key['client_last_name']?> <?=$key['client_first_name']?> <?=$key['client_middle_name']?></option>
                                                      <?php } ?>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-3 hidden">
                                        <div class="col-sm-10">   
                                            <div class="form-group">
                                                <label class="control-label" style="padding-bottom:2%">&nbsp Client Name</label> 
                                                <input type="text" name="" class="form-control" id="client_name">
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
                                                <span class="btn btn-success show_medical_client_list">Show Report</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group hidden" id="FAMILY_CASH_LIST">
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
                                                <select class="form-control select2_demo_1" name="" id="family_cash_acc_no"style="width:100%;">
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
                                                <input type="text" name="" class="form-control" id="family_cash_acc_holder_name">
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
                                                <span class="btn btn-success show_family_cash_wise_list">Show Report</span>
                                               <!-- <input type='button' class="btn btn-warning" value='Print Report' onclick='printDiv("example");'/> -->
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group hidden" id="client_cash_wise_list">
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
                                                <label class="control-label" style="padding-bottom:2%">&nbsp Client</label> 
                                                <!-- <input type="text" name="" class="form-control" id="family_acc_no" value="68"> -->
                                                <select class="form-control select2_demo_2" name="" id="client_cash_id"style="width:100%;">
                                                    <option></option>
                                                    <?php foreach ($client_details as $key) { ?>
                                                        <option value="<?=$key['client_id']?>"><?=$key['client_prefix']?> <?=$key['client_last_name']?> <?=$key['client_first_name']?> <?=$key['client_middle_name']?></option>
                                                      <?php } ?>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-3 hidden">
                                        <div class="col-sm-10">   
                                            <div class="form-group">
                                                <label class="control-label" style="padding-bottom:2%">&nbsp Client Name</label> 
                                                <input type="text" name="" class="form-control" id="client_name1">
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
                                                <span class="btn btn-success show_client_cash_flow_wise_list">Show Report</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group hidden" id="client_surname_wise_list">
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
                                                <label class="control-label" style="padding-bottom:2%">&nbsp Client</label> 
                                                <!-- <input type="text" name="" class="form-control" id="family_acc_no" value="68"> -->
                                                <select class="form-control select2_demo_2" name="" id="client_surname_id"style="width:100%;">
                                                    <option></option>
                                                    <?php foreach ($client_details as $key) { ?>
                                                        <option value="<?=$key['client_id']?>"><?=$key['client_prefix']?> <?=$key['client_last_name']?> <?=$key['client_first_name']?> <?=$key['client_middle_name']?></option>
                                                      <?php } ?>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-3 hidden">
                                        <div class="col-sm-10">   
                                            <div class="form-group">
                                                <label class="control-label" style="padding-bottom:2%">&nbsp Client Name</label> 
                                                <input type="text" name="" class="form-control" id="client_name2">
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
                                                <span class="btn btn-success show_client_surname_wise_list">Show Report</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group hidden" id="family_DOB_wise_list">
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
                                                <select class="form-control select2_demo_1" name="" id="family_DOB_acc_no"style="width:100%;">
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
                                                <input type="text" name="" class="form-control" id="family_DOB_acc_holder_name">
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
                                                <span class="btn btn-success show_family_DOB_wise_list">Show Report</span>
                                               <!-- <input type='button' class="btn btn-warning" value='Print Report' onclick='printDiv("example");'/> -->
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group hidden" id="family_loan_wise_list">
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
                                                <select class="form-control select2_demo_1" name="" id="family_loan_acc_no"style="width:100%;">
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
                                                <input type="text" name="" class="form-control" id="family_loan_acc_holder_name">
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
                                                <span class="btn btn-success show_family_loan_wise_list">Show Report</span>
                                               <!-- <input type='button' class="btn btn-warning" value='Print Report' onclick='printDiv("example");'/> -->
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group hidden" id="family_pension_wise_list">
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
                                                <select class="form-control select2_demo_1" name="" id="family_pension_acc_no"style="width:100%;">
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
                                                <input type="text" name="" class="form-control" id="family_pension_acc_holder_name">
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
                                                <span class="btn btn-success show_family_pension_wise_list">Show Report</span>
                                               <!-- <input type='button' class="btn btn-warning" value='Print Report' onclick='printDiv("example");'/> -->
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                 <div class="form-group hidden" id="family_ac_office_wise_list">
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
                                                <select class="form-control select2_demo_1" name="" id="family_acc_office_no"style="width:100%;">
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
                                                <input type="text" name="" class="form-control" id="family_acc_office_holder_name">
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
                                                <span class="btn btn-success show_family_ac_office_wise_list">Show Report</span>
                                               <!-- <input type='button' class="btn btn-warning" value='Print Report' onclick='printDiv("example");'/> -->
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- <div class="hr-line-dashed"></div> -->
                            </form>
                            <div class="ibox float-e-margins">
                                <div class="ibox-content">
                                    <div class="table-responsive hidden" id="policy_number_wise_list_table">
                                        <div class="form-group">
                                            <div class="col-sm-2" style="padding-top: 0.7%;">
                                                <input type="text" class="form-control" id="policy_sort_by_agent" placeholder="Search Agent Wise">
                                            </div>
                                        </div>
                                        <table class="table table-striped table-bordered table-hover dataTables-example1" style="width:100%;">
                                        </table>
                                    </div>
                                    <div class="table-responsive hidden" id="surname_wise_list_table">
                                        <div class="form-group">
                                            <div class="col-sm-2" style="padding-top: 0.7%;">
                                                <input type="text" class="form-control" id="surname_sort_by_agent" placeholder="Search Agent Wise">
                                            </div>
                                        </div>
                                        <table class="table table-striped table-bordered table-hover dataTables-example2">
                                        </table>
                                    </div>
                                    <div class="table-responsive hidden" id="sex_wise_list_table">
                                        <div class="form-group">
                                            <div class="col-sm-2" style="padding-top: 0.7%;">
                                                <input type="text" class="form-control" id="sex_sort_by_agent" placeholder="Search Agent Wise">
                                            </div>
                                        </div>
                                        <table class="table table-striped table-bordered table-hover dataTables-example3">
                                        </table>
                                    </div>
                                    <div class="table-responsive hidden" id="DOB_wise_list_table">
                                        <div class="form-group">
                                            <div class="col-sm-2" style="padding-top: 0.7%;">
                                                <input type="text" class="form-control" id="DOB_sort_by_agent" placeholder="Search Agent Wise">
                                            </div>
                                        </div>
                                        <table class="table table-striped table-bordered table-hover dataTables-example4">
                                        </table>
                                    </div>
                                    <div class="table-responsive hidden" id="PTP_wise_list_table">
                                        <div class="form-group">
                                            <div class="col-sm-2" style="padding-top: 0.7%;">
                                                <input type="text" class="form-control" id="PPT_sort_by_agent" placeholder="Search Agent Wise">
                                            </div>
                                        </div>
                                        <table class="table table-striped table-bordered table-hover dataTables-example5">
                                        </table>
                                    </div>
                                    <div class="table-responsive hidden" id="monthly_wise_due_list_table">
                                        <table class="table table-striped table-bordered table-hover dataTables-example6">
                                        </table>
                                    </div>
                                    <div class="table-responsive hidden" id="medical_wise_list_table">
                                        <table class="table table-striped table-bordered table-hover dataTables-example7">
                                        </table>
                                    </div>
                                    <div class="table-responsive hidden" id="MOP_wise_due_list_table">
                                        <div class="form-group">
                                            <div class="col-sm-2" style="padding-top: 0.7%;">
                                                <input type="text" class="form-control" id="MOP_sort_by_agent" placeholder="Search Agent Wise">
                                            </div>
                                        </div>
                                        <table class="table table-striped table-bordered table-hover dataTables-example8">
                                        </table>
                                    </div> 
                                    <div class="table-responsive hidden" id="SB_due_wise_list_table">
                                        <div class="form-group">
                                            <div class="col-sm-2" style="padding-top: 0.7%;">
                                                <input type="text" class="form-control" id="SB_sort_by_agent" placeholder="Search Agent Wise">
                                            </div>
                                        </div>
                                        <table class="table table-striped table-bordered table-hover dataTables-example9">
                                        </table>
                                    </div>
                                    <div class="table-responsive hidden" id="PS_wise_due_list_table">
                                        <div class="form-group">
                                            <div class="col-sm-2" style="padding-top: 0.7%;">
                                                <input type="text" class="form-control" id="PS_sort_by_agent" placeholder="Search Agent Wise">
                                            </div>
                                        </div>
                                        <table class="table table-striped table-bordered table-hover dataTables-example10">
                                        </table>
                                    </div>
                                    <div class="table-responsive hidden" id="document_wise_list_table">
                                        <table class="table table-striped table-bordered table-hover dataTables-example11">
                                        </table>
                                    </div>
                                    <div class="table-responsive hidden" id="family_ac_wise_list_table">
                                        <table class="table table-striped table-bordered table-hover dataTables-example12">
                                        </table>
                                    </div>
                                    <div class="table-responsive hidden" id="family_ac_wise_due_list_table">
                                        <table class="table table-striped table-bordered table-hover dataTables-example13">
                                        </table>
                                    </div>
                                    <div class="table-responsive hidden" id="branch_wise_due_list_table">
                                        <div class="form-group">
                                            <div class="col-sm-2" style="padding-top: 0.7%;">
                                                <input type="text" class="form-control" id="branch_sort_by_agent" placeholder="Search Agent Wise">
                                            </div>
                                        </div>
                                        <table class="table table-striped table-bordered table-hover dataTables-example14">
                                        </table>
                                    </div>
                                    <div class="table-responsive hidden" id="agent_wise_due_list_table">
                                        <table class="table table-striped table-bordered table-hover dataTables-example15">
                                        </table>
                                    </div>
                                    <div class="table-responsive hidden" id="DOC_wise_list_table">
                                        <div class="form-group">
                                            <div class="col-sm-2" style="padding-top: 0.7%;">
                                                <input type="text" class="form-control" id="DOC_sort_by_agent" placeholder="Search Agent Wise">
                                            </div>
                                        </div>
                                        <table class="table table-striped table-bordered table-hover dataTables-example16">
                                        </table>
                                    </div>
                                    <div class="table-responsive hidden" id="no_nominee_wise_list_table">
                                        <div class="form-group">
                                            <div class="col-sm-2" style="padding-top: 0.7%;">
                                                <input type="text" class="form-control" id="NN_sort_by_agent" placeholder="Search Agent Wise">
                                            </div>
                                        </div>
                                        <table class="table table-striped table-bordered table-hover dataTables-example17">
                                        </table>
                                    </div>
                                    <div class="table-responsive hidden" id="family_cash_wise_list_table">
                                        <table class="table table-striped table-bordered table-hover dataTables-example18">
                                        </table>
                                    </div>
                                    <div class="table-responsive hidden" id="client_cash_wise_list_table">
                                        <table class="table table-striped table-bordered table-hover dataTables-example19" style="width:100%;">
                                        </table>
                                    </div>
                                    <div class="table-responsive hidden" id="client_surname_wise_list_table">
                                        <!-- <div class="form-group">
                                            <div class="col-sm-2" style="padding-top: 0.7%;">
                                                <input type="text" class="form-control" id="surname_sort_by_client" placeholder="Search Agent Wise">
                                            </div>
                                        </div> -->
                                        <table class="table table-striped table-bordered table-hover dataTables-example20" style="width:100%;">
                                        </table>
                                    </div>
                                    <div class="table-responsive hidden" id="client_address_wise_list_table">
                                        <!-- <div class="form-group">
                                            <div class="col-sm-2" style="padding-top: 0.7%;">
                                                <input type="text" class="form-control" id="address_sort_by_client" placeholder="Search Agent Wise">
                                            </div>
                                        </div> -->
                                        <table class="table table-striped table-bordered table-hover dataTables-example21" style="width:100%;">
                                        </table>
                                    </div>
                                    <div class="table-responsive hidden" id="family_birthday_wise_list_table">
                                        <table class="table table-striped table-bordered table-hover dataTables-example22" style="width:100%;">
                                        </table>
                                    </div>
                                    <div class="table-responsive hidden" id="family_loan_wise_list_table">
                                        <table class="table table-striped table-bordered table-hover dataTables-example23" style="width:100%;">
                                        </table>
                                    </div>
                                    <div class="table-responsive hidden" id="family_pension_wise_list_table">
                                        <table class="table table-striped table-bordered table-hover dataTables-example24" style="width:100%;">
                                        </table>
                                    </div>
                                    <div class="table-responsive hidden" id="family_ac_office_wise_list_table">
                                        <table class="table table-striped table-bordered table-hover dataTables-example25">
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>