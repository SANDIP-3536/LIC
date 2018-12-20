        <div class="footer" style="position:fixed !important;">
            <div class="pull-right">
                <strong><?php echo date('Y-m-d'); ?></strong>
            </div>
            <div>
                <strong>Copyright</strong> <a href="https://www.syntech.co.in">Syntech Solutions </a> &copy; 2017-2018
            </div>
        </div>

        </div>
        </div>



    <!-- Mainly scripts -->
    <script src="<?=base_url()?>assets/js/jquery-2.1.1.js"></script>
    <script src="<?=base_url()?>assets/js/bootstrap.min.js"></script>
    <script src="<?=base_url()?>assets/js/plugins/metisMenu/jquery.metisMenu.js"></script>
    <script src="<?=base_url()?>assets/js/plugins/slimscroll/jquery.slimscroll.min.js"></script>
    <script src="<?=base_url()?>assets/js/plugins/dataTables/datatables.min.js"></script>

    <!-- Custom and plugin javascript -->
    <script src="<?=base_url()?>assets/js/inspinia.js"></script>
    <script src="<?=base_url()?>assets/js/plugins/pace/pace.min.js"></script>
    <script src="<?=base_url()?>assets/js/plugins/iCheck/icheck.min.js"></script>
   <!-- Data picker -->
   <script src="<?=base_url()?>assets/js/plugins/datapicker/bootstrap-datepicker.js"></script>

    <!-- Flot -->
    <script src="<?=base_url()?>assets/js/plugins/flot/jquery.flot.js"></script>
    <script src="<?=base_url()?>assets/js/plugins/flot/jquery.flot.tooltip.min.js"></script>
    <script src="<?=base_url()?>assets/js/plugins/flot/jquery.flot.resize.js"></script>
    
    <!-- Sweet Alert -->
    <script src="<?=base_url()?>assets/js/plugins/sweetalert/sweetalert.min.js"></script>

    <!-- Select2 -->
    <script src="<?=base_url()?>assets/js/plugins/select2/select2.full.min.js"></script>
    <!-- validation -->
    <script src="<?= base_url();?>assets/js/plugins/validate/jquery.validate.min.js"></script>
    <script src="<?= base_url();?>assets/js/plugins/validate/additional-methods.min.js"></script>
    
    <script>
         <?php if ($LIC == 'poli_report'){?>
            $('#poli_report').addClass('active');
            document.title = "LIC Corp | Policy Report"
        <?php }?>

        $(document).ready(function () {
            $('.i-checks').iCheck({
                checkboxClass: 'icheckbox_square-green',
                radioClass: 'iradio_square-green',
            });

            <?php if(isset($flash['active']) && $flash['active'] == 1) {?>
                swal({
                    title: "<?=$flash['title']?>",
                    text: "<?=$flash['text']?>",
                    type: "<?=$flash['type']?>"
                });
            <?php } ?> 
        });

        var today = new Date();
        $('.datepicker').datepicker({
            format: 'dd-mm-yyyy',
            autoclose:true,
            // endDate: "today",
            // maxDate: today
        }).on('changeDate', function (ev) {
            $(this).datepicker('hide');
        });

        $('#data_2 .input-group.date').datepicker({
            startView: 1,
            todayBtn: "linked",
            keyboardNavigation: false,
            forceParse: false,
            autoclose: true,
            format: "dd-mm-yyyy"
        });

        $('#data_4 .input-group.date').datepicker({
            minViewMode: 1,
            keyboardNavigation: false,
            forceParse: false,
            autoclose: true,
            todayHighlight: true,
             // format: "dd-mm-yyyy"    
             format: "M-yyyy"
        });

        $(".select2_demo_1").select2({
            placeholder: "Select a Family Account Number",
            allowClear: true,
        });

        $(".select2_demo_2").select2({
            placeholder: "Select Client",
            allowClear: true,
        });

        $.validator.setDefaults({
            submitHandler: function (form) {
                form.submit();
            }
        });

        function caps(element){
            element.value = element.value.toUpperCase();
        }

        var start_due = '';
        var end_due = '';
        $(document).on('change','#report_for',function(){
            var report_for = $(this).val();
            // alert(report_for);
            if (report_for == 1) {
                $('#SB_DUE_wise_list').removeClass();
                $('#SB_DUE_wise_list').addClass('form-group hidden');
                $('#document_wise_list').removeClass();
                $('#document_wise_list').addClass('form-group hidden');
                $('#family_ac_office_wise_list').removeClass();
                $('#family_ac_office_wise_list').addClass('form-group hidden');
                $('#family_ac_office_wise_list_table').removeClass();
                $('#family_ac_office_wise_list_table').addClass('table-responsive hidden');  
                $('#surname_wise_list_table').removeClass();
                $('#surname_wise_list_table').addClass('table-responsive hidden');
                $('#policy_number_wise_list_table').removeClass();
                $('#policy_number_wise_list_table').addClass('table-responsive');
                $('#monthly_wise_due_list').removeClass();
                $('#monthly_wise_due_list').addClass('form-group hidden');
                $('#monthly_wise_due_list_table').removeClass();
                $('#monthly_wise_due_list_table').addClass('table-responsive hidden');  
                $('#family_ac_wise_due_list').removeClass();
                $('#family_ac_wise_due_list').addClass('form-group hidden');  
                $('#family_ac_wise_due_list_table').removeClass();
                $('#family_ac_wise_due_list_table').addClass('table-responsive hidden');
                $('#sex_wise_list').removeClass();
                $('#sex_wise_list').addClass('form-group hidden');
                $('#sex_wise_list_table').removeClass();
                $('#sex_wise_list_table').addClass('table-responsive hidden');
                $('#DOB_wise_list_table').removeClass();
                $('#DOB_wise_list_table').addClass('table-responsive hidden'); 
                $('#PTP_wise_list_table').removeClass();
                $('#PTP_wise_list_table').addClass('table-responsive hidden'); 
                $('#MOP_wise_list').removeClass();
                $('#MOP_wise_list').addClass('form-group hidden');
                $('#MOP_wise_due_list_table').removeClass();
                $('#MOP_wise_due_list_table').addClass('table-responsive hidden');
                $('#PS_wise_list').removeClass();
                $('#PS_wise_list').addClass('form-group hidden');
                $('#PS_wise_due_list_table').removeClass();
                $('#PS_wise_due_list_table').addClass('table-responsive hidden'); 
                $('#branch_wise_due_list_table').removeClass();
                $('#branch_wise_due_list_table').addClass('table-responsive hidden');
                $('#agent_wise_due_list_table').removeClass();
                $('#agent_wise_due_list_table').addClass('table-responsive hidden');
                $('#DOC_wise_list_table').removeClass();
                $('#DOC_wise_list_table').addClass('table-responsive hidden');
                $('#no_nominee_wise_list_table').removeClass();
                $('#no_nominee_wise_list_table').addClass('table-responsive hidden');
                 $('#medical_client_wise_list').removeClass();
                $('#medical_client_wise_list').addClass('form-group hidden');
                $('#medical_wise_list_table').removeClass();
                $('#medical_wise_list_table').addClass('table-responsive hidden');
                $('#FAMILY_CASH_LIST').removeClass();
                $('#FAMILY_CASH_LIST').addClass('form-group hidden');
                $('#family_cash_wise_list_table').removeClass();
                $('#family_cash_wise_list_table').addClass('table-responsive hidden');
                $('#SB_due_wise_list_table').removeClass();
                $('#SB_due_wise_list_table').addClass('table-responsive hidden'); 
                $('#report_end_date').removeClass();
                $('#report_start_date').removeClass();
                $('#report_start_date').addClass('col-sm-3 hidden');
                $('#report_end_date').addClass('col-sm-3 hidden');
                $('#family_ac_wise_list').removeClass();
                $('#family_ac_wise_list').addClass('form-group hidden');
                $('#family_ac_wise_list_table').removeClass();
                $('#family_ac_wise_list_table').addClass('table-responsive hidden');
                 $('#family_birthday_wise_list_table').removeClass();
                $('#family_birthday_wise_list_table').addClass('form-group hidden');
                $('#client_address_wise_list_table').removeClass();
                $('#client_address_wise_list_table').addClass('form-group hidden');
                $('#client_surname_wise_list_table').removeClass();
                $('#client_surname_wise_list_table').addClass('form-group hidden');
                $('#client_cash_wise_list_table').removeClass();
                $('#client_cash_wise_list_table').addClass('form-group hidden');
                $('#client_cash_wise_list').removeClass();
                $('#client_cash_wise_list').addClass('form-group hidden');
                $('#client_surname_wise_list').removeClass();
                $('#client_surname_wise_list').addClass('form-group hidden');
                $('#family_DOB_wise_list').removeClass();
                $('#family_DOB_wise_list').addClass('form-group hidden');
                $('#document_wise_list_table').removeClass();
                $('#document_wise_list_table').addClass('form-group hidden');
                $('#family_loan_wise_list').removeClass();
                $('#family_loan_wise_list').addClass('form-group hidden');
                $('#family_loan_wise_list_table').removeClass();
                $('#family_loan_wise_list_table').addClass('table-responsive hidden');
                $('#family_pension_wise_list').removeClass();
                $('#family_pension_wise_list').addClass('form-group hidden');
                $('#family_pension_wise_list_table').removeClass();
                $('#family_pension_wise_list_table').addClass('table-responsive hidden');
                $.post('<?=site_url('Admin/report_policy_number_wise')?>',{},function(data){
                    console.log(data);
                    policy_number_wise_report.clear();
                    $.each(data,function(k,v){
                        policy_number_wise_report.row.add(v);
                    })
                    policy_number_wise_report.draw();
                },'json');
            }else if(report_for == 2){
                $('#SB_DUE_wise_list').removeClass();
                $('#SB_DUE_wise_list').addClass('form-group hidden');
                $('#document_wise_list').removeClass();
                $('#document_wise_list').addClass('form-group hidden');
                $('#family_ac_office_wise_list').removeClass();
                $('#family_ac_office_wise_list').addClass('form-group hidden');
                $('#family_ac_office_wise_list_table').removeClass();
                $('#family_ac_office_wise_list_table').addClass('table-responsive hidden');  
                $('#family_loan_wise_list').removeClass();
                $('#family_loan_wise_list').addClass('form-group hidden');
                $('#family_loan_wise_list_table').removeClass();
                $('#family_loan_wise_list_table').addClass('table-responsive hidden');
                $('#family_pension_wise_list').removeClass();
                $('#family_pension_wise_list').addClass('form-group hidden');
                $('#family_pension_wise_list_table').removeClass();
                $('#family_pension_wise_list_table').addClass('table-responsive hidden');
                $('#surname_wise_list_table').removeClass();
                $('#surname_wise_list_table').addClass('table-responsive');
                $('#sex_wise_list').removeClass();
                $('#sex_wise_list').addClass('form-group hidden');
                $('#sex_wise_list_table').removeClass();
                $('#sex_wise_list_table').addClass('table-responsive hidden');
                $('#policy_number_wise_list_table').removeClass();
                $('#policy_number_wise_list_table').addClass('table-responsive hidden');
                $('#monthly_wise_due_list').removeClass();
                $('#monthly_wise_due_list').addClass('form-group hidden');
                $('#monthly_wise_due_list_table').removeClass();
                $('#monthly_wise_due_list_table').addClass('table-responsive hidden');  
                $('#family_ac_wise_due_list').removeClass();
                $('#family_ac_wise_due_list').addClass('form-group hidden');  
                $('#family_ac_wise_due_list_table').removeClass();
                $('#family_ac_wise_due_list_table').addClass('table-responsive hidden');
                $('#DOB_wise_list_table').removeClass();
                $('#DOB_wise_list_table').addClass('table-responsive hidden'); 
                $('#PTP_wise_list_table').removeClass();
                $('#PTP_wise_list_table').addClass('table-responsive hidden'); 
                $('#MOP_wise_list').removeClass();
                $('#MOP_wise_list').addClass('form-group hidden');
                $('#MOP_wise_due_list_table').removeClass();
                $('#MOP_wise_due_list_table').addClass('table-responsive hidden');
                $('#PS_wise_list').removeClass();
                $('#PS_wise_list').addClass('form-group hidden');
                $('#PS_wise_due_list_table').removeClass();
                $('#PS_wise_due_list_table').addClass('table-responsive hidden'); 
                $('#branch_wise_due_list_table').removeClass();
                $('#branch_wise_due_list_table').addClass('table-responsive hidden');
                $('#agent_wise_due_list_table').removeClass();
                $('#agent_wise_due_list_table').addClass('table-responsive hidden');
                $('#DOC_wise_list_table').removeClass();
                $('#DOC_wise_list_table').addClass('table-responsive hidden');
                $('#no_nominee_wise_list_table').removeClass();
                $('#no_nominee_wise_list_table').addClass('table-responsive hidden');
                 $('#medical_client_wise_list').removeClass();
                $('#medical_client_wise_list').addClass('form-group hidden');
                $('#medical_wise_list_table').removeClass();
                $('#medical_wise_list_table').addClass('table-responsive hidden');
                $('#FAMILY_CASH_LIST').removeClass();
                $('#FAMILY_CASH_LIST').addClass('form-group hidden');
                $('#family_cash_wise_list_table').removeClass();
                $('#family_cash_wise_list_table').addClass('table-responsive hidden');
                $('#SB_due_wise_list_table').removeClass();
                $('#SB_due_wise_list_table').addClass('table-responsive hidden'); 
                $('#report_end_date').removeClass();
                $('#report_start_date').removeClass();
                $('#report_start_date').addClass('col-sm-3 hidden');
                $('#report_end_date').addClass('col-sm-3 hidden');
                $('#family_ac_wise_list').removeClass();
                $('#family_ac_wise_list').addClass('form-group hidden');
                $('#family_ac_wise_list_table').removeClass();
                $('#family_ac_wise_list_table').addClass('table-responsive hidden');
                 $('#family_birthday_wise_list_table').removeClass();
                $('#family_birthday_wise_list_table').addClass('form-group hidden');
                $('#client_address_wise_list_table').removeClass();
                $('#client_address_wise_list_table').addClass('form-group hidden');
                $('#client_surname_wise_list_table').removeClass();
                $('#client_surname_wise_list_table').addClass('form-group hidden');
                $('#client_cash_wise_list_table').removeClass();
                $('#client_cash_wise_list_table').addClass('form-group hidden');
                $('#client_cash_wise_list').removeClass();
                $('#client_cash_wise_list').addClass('form-group hidden');
                $('#client_surname_wise_list').removeClass();
                $('#client_surname_wise_list').addClass('form-group hidden');
                $('#family_DOB_wise_list').removeClass();
                $('#family_DOB_wise_list').addClass('form-group hidden');
                $('#document_wise_list_table').removeClass();
                $('#document_wise_list_table').addClass('form-group hidden');
                $.post('<?=site_url('Admin/report_surname_wise')?>',{},function(data){
                    console.log(data);
                    surname_wise_report.clear();
                    $.each(data,function(k,v){
                        surname_wise_report.row.add(v);
                    })
                    surname_wise_report.draw();
                },'json');
            }else if(report_for == 3){
                $('#SB_DUE_wise_list').removeClass();
                $('#SB_DUE_wise_list').addClass('form-group hidden');
                $('#document_wise_list').removeClass();
                $('#document_wise_list').addClass('form-group hidden');
                $('#family_ac_office_wise_list').removeClass();
                $('#family_ac_office_wise_list').addClass('form-group hidden');
                $('#family_ac_office_wise_list_table').removeClass();
                $('#family_ac_office_wise_list_table').addClass('table-responsive hidden');  
                $('#family_loan_wise_list').removeClass();
                $('#family_loan_wise_list').addClass('form-group hidden');
                $('#family_loan_wise_list_table').removeClass();
                $('#family_loan_wise_list_table').addClass('table-responsive hidden');
                $('#family_pension_wise_list').removeClass();
                $('#family_pension_wise_list').addClass('form-group hidden');
                $('#family_pension_wise_list_table').removeClass();
                $('#family_pension_wise_list_table').addClass('table-responsive hidden');
                $('#sex_wise_list').removeClass();
                $('#sex_wise_list').addClass('form-group');
                $('#sex_wise_list_table').removeClass();
                $('#sex_wise_list_table').addClass('table-responsive');
                $('#surname_wise_list_table').removeClass();
                $('#surname_wise_list_table').addClass('table-responsive hidden');
                $('#policy_number_wise_list_table').removeClass();
                $('#policy_number_wise_list_table').addClass('table-responsive hidden');
                $('#monthly_wise_due_list').removeClass();
                $('#monthly_wise_due_list').addClass('form-group hidden');
                $('#monthly_wise_due_list_table').removeClass();
                $('#monthly_wise_due_list_table').addClass('table-responsive hidden');  
                $('#family_ac_wise_due_list').removeClass();
                $('#family_ac_wise_due_list').addClass('form-group hidden');  
                $('#family_ac_wise_due_list_table').removeClass();
                $('#family_ac_wise_due_list_table').addClass('table-responsive hidden');
                $('#DOB_wise_list_table').removeClass();
                $('#DOB_wise_list_table').addClass('table-responsive hidden'); 
                $('#PTP_wise_list_table').removeClass();
                $('#PTP_wise_list_table').addClass('table-responsive hidden');
                $('#MOP_wise_list').removeClass();
                $('#MOP_wise_list').addClass('form-group hidden');
                $('#MOP_wise_due_list_table').removeClass();
                $('#MOP_wise_due_list_table').addClass('table-responsive hidden');
                $('#PS_wise_list').removeClass();
                $('#PS_wise_list').addClass('form-group hidden');
                $('#PS_wise_due_list_table').removeClass();
                $('#PS_wise_due_list_table').addClass('table-responsive hidden'); 
                $('#branch_wise_due_list_table').removeClass();
                $('#branch_wise_due_list_table').addClass('table-responsive hidden');
                $('#agent_wise_due_list_table').removeClass();
                $('#agent_wise_due_list_table').addClass('table-responsive hidden');
                $('#DOC_wise_list_table').removeClass();
                $('#DOC_wise_list_table').addClass('table-responsive hidden'); 
                $('#no_nominee_wise_list_table').removeClass();
                $('#no_nominee_wise_list_table').addClass('table-responsive hidden');
                 $('#medical_client_wise_list').removeClass();
                $('#medical_client_wise_list').addClass('form-group hidden');
                $('#medical_wise_list_table').removeClass();
                $('#medical_wise_list_table').addClass('table-responsive hidden');
                $('#FAMILY_CASH_LIST').removeClass();
                $('#FAMILY_CASH_LIST').addClass('form-group hidden');
                $('#family_cash_wise_list_table').removeClass();
                $('#family_cash_wise_list_table').addClass('table-responsive hidden');
                $('#SB_due_wise_list_table').removeClass();
                $('#SB_due_wise_list_table').addClass('table-responsive hidden'); 
                $('#report_end_date').removeClass();
                $('#report_start_date').removeClass();
                $('#report_start_date').addClass('col-sm-3 hidden');
                $('#report_end_date').addClass('col-sm-3 hidden');
                $('#family_ac_wise_list').removeClass();
                $('#family_ac_wise_list').addClass('form-group hidden');
                $('#family_ac_wise_list_table').removeClass();
                $('#family_ac_wise_list_table').addClass('table-responsive hidden');
                 $('#family_birthday_wise_list_table').removeClass();
                $('#family_birthday_wise_list_table').addClass('form-group hidden');
                $('#client_address_wise_list_table').removeClass();
                $('#client_address_wise_list_table').addClass('form-group hidden');
                $('#client_surname_wise_list_table').removeClass();
                $('#client_surname_wise_list_table').addClass('form-group hidden');
                $('#client_cash_wise_list_table').removeClass();
                $('#client_cash_wise_list_table').addClass('form-group hidden');
                $('#client_cash_wise_list').removeClass();
                $('#client_cash_wise_list').addClass('form-group hidden');
                $('#client_surname_wise_list').removeClass();
                $('#client_surname_wise_list').addClass('form-group hidden');
                $('#family_DOB_wise_list').removeClass();
                $('#family_DOB_wise_list').addClass('form-group hidden');
                $('#document_wise_list_table').removeClass();
                $('#document_wise_list_table').addClass('form-group hidden');
            }else if(report_for == 4){
                $('#SB_DUE_wise_list').removeClass();
                $('#SB_DUE_wise_list').addClass('form-group hidden');
                $('#document_wise_list').removeClass();
                $('#document_wise_list').addClass('form-group hidden');
                $('#family_ac_office_wise_list').removeClass();
                $('#family_ac_office_wise_list').addClass('form-group hidden');
                $('#family_ac_office_wise_list_table').removeClass();
                $('#family_ac_office_wise_list_table').addClass('table-responsive hidden');  
                $('#family_loan_wise_list').removeClass();
                $('#family_loan_wise_list').addClass('form-group hidden');
                $('#family_loan_wise_list_table').removeClass();
                $('#family_loan_wise_list_table').addClass('table-responsive hidden');
                $('#family_pension_wise_list').removeClass();
                $('#family_pension_wise_list').addClass('form-group hidden');
                $('#family_pension_wise_list_table').removeClass();
                $('#family_pension_wise_list_table').addClass('table-responsive hidden');
                $('#DOB_wise_list_table').removeClass();
                $('#DOB_wise_list_table').addClass('table-responsive'); 
                $('#surname_wise_list_table').removeClass();
                $('#surname_wise_list_table').addClass('table-responsive hidden');
                $('#sex_wise_list').removeClass();
                $('#sex_wise_list').addClass('form-group hidden');
                $('#sex_wise_list_table').removeClass();
                $('#sex_wise_list_table').addClass('table-responsive hidden');
                $('#policy_number_wise_list_table').removeClass();
                $('#policy_number_wise_list_table').addClass('table-responsive hidden');
                $('#monthly_wise_due_list').removeClass();
                $('#monthly_wise_due_list').addClass('form-group hidden');
                $('#monthly_wise_due_list_table').removeClass();
                $('#monthly_wise_due_list_table').addClass('table-responsive hidden');  
                $('#family_ac_wise_due_list').removeClass();
                $('#family_ac_wise_due_list').addClass('form-group hidden');  
                $('#family_ac_wise_due_list_table').removeClass();
                $('#family_ac_wise_due_list_table').addClass('table-responsive hidden');
                $('#PTP_wise_list_table').removeClass();
                $('#PTP_wise_list_table').addClass('table-responsive hidden'); 
                $('#MOP_wise_list').removeClass();
                $('#MOP_wise_list').addClass('form-group hidden');
                $('#MOP_wise_due_list_table').removeClass();
                $('#MOP_wise_due_list_table').addClass('table-responsive hidden');
                $('#PS_wise_list').removeClass();
                $('#PS_wise_list').addClass('form-group hidden');
                $('#PS_wise_due_list_table').removeClass();
                $('#PS_wise_due_list_table').addClass('table-responsive hidden'); 
                $('#branch_wise_due_list_table').removeClass();
                $('#branch_wise_due_list_table').addClass('table-responsive hidden');
                $('#agent_wise_due_list_table').removeClass();
                $('#agent_wise_due_list_table').addClass('table-responsive hidden');
                $('#DOC_wise_list_table').removeClass();
                $('#DOC_wise_list_table').addClass('table-responsive hidden');
                $('#no_nominee_wise_list_table').removeClass();
                $('#no_nominee_wise_list_table').addClass('table-responsive hidden');
                 $('#medical_client_wise_list').removeClass();
                $('#medical_client_wise_list').addClass('form-group hidden');
                $('#medical_wise_list_table').removeClass();
                $('#medical_wise_list_table').addClass('table-responsive hidden');
                $('#FAMILY_CASH_LIST').removeClass();
                $('#FAMILY_CASH_LIST').addClass('form-group hidden');
                $('#family_cash_wise_list_table').removeClass();
                $('#family_cash_wise_list_table').addClass('table-responsive hidden');
                $('#SB_due_wise_list_table').removeClass();
                $('#SB_due_wise_list_table').addClass('table-responsive hidden'); 
                 $('#report_end_date').removeClass();
                $('#report_start_date').removeClass();
                $('#report_start_date').addClass('col-sm-3 hidden');
                $('#report_end_date').addClass('col-sm-3 hidden');
                $('#family_ac_wise_list').removeClass();
                $('#family_ac_wise_list').addClass('form-group hidden');
                $('#family_ac_wise_list_table').removeClass();
                $('#family_ac_wise_list_table').addClass('table-responsive hidden');
                 $('#family_birthday_wise_list_table').removeClass();
                $('#family_birthday_wise_list_table').addClass('form-group hidden');
                $('#client_address_wise_list_table').removeClass();
                $('#client_address_wise_list_table').addClass('form-group hidden');
                $('#client_surname_wise_list_table').removeClass();
                $('#client_surname_wise_list_table').addClass('form-group hidden');
                $('#client_cash_wise_list_table').removeClass();
                $('#client_cash_wise_list_table').addClass('form-group hidden');
                $('#client_cash_wise_list').removeClass();
                $('#client_cash_wise_list').addClass('form-group hidden');
                $('#client_surname_wise_list').removeClass();
                $('#client_surname_wise_list').addClass('form-group hidden');
                $('#family_DOB_wise_list').removeClass();
                $('#family_DOB_wise_list').addClass('form-group hidden');
                $('#document_wise_list_table').removeClass();
                $('#document_wise_list_table').addClass('form-group hidden');
                $.post('<?=site_url('Admin/report_DOB_wise')?>',{},function(data){
                    console.log(data);
                    DOB_wise_report.clear();
                    $.each(data,function(k,v){
                        DOB_wise_report.row.add(v);
                    })
                    DOB_wise_report.draw();
                },'json');
            }else if(report_for == 5){
                $('#SB_DUE_wise_list').removeClass();
                $('#SB_DUE_wise_list').addClass('form-group hidden');
                $('#document_wise_list').removeClass();
                $('#document_wise_list').addClass('form-group hidden');
                $('#family_ac_office_wise_list').removeClass();
                $('#family_ac_office_wise_list').addClass('form-group hidden');
                $('#family_ac_office_wise_list_table').removeClass();
                $('#family_ac_office_wise_list_table').addClass('table-responsive hidden');  
                $('#family_loan_wise_list').removeClass();
                $('#family_loan_wise_list').addClass('form-group hidden');
                $('#family_loan_wise_list_table').removeClass();
                $('#family_loan_wise_list_table').addClass('table-responsive hidden');
                $('#family_pension_wise_list').removeClass();
                $('#family_pension_wise_list').addClass('form-group hidden');
                $('#family_pension_wise_list_table').removeClass();
                $('#family_pension_wise_list_table').addClass('table-responsive hidden');
                $('#PTP_wise_list_table').removeClass();
                $('#PTP_wise_list_table').addClass('table-responsive'); 
                $('#DOB_wise_list_table').removeClass();
                $('#DOB_wise_list_table').addClass('table-responsive hidden'); 
                $('#surname_wise_list_table').removeClass();
                $('#surname_wise_list_table').addClass('table-responsive hidden');
                $('#sex_wise_list').removeClass();
                $('#sex_wise_list').addClass('form-group hidden');
                $('#sex_wise_list_table').removeClass();
                $('#sex_wise_list_table').addClass('table-responsive hidden');
                $('#policy_number_wise_list_table').removeClass();
                $('#policy_number_wise_list_table').addClass('table-responsive hidden');
                $('#monthly_wise_due_list').removeClass();
                $('#monthly_wise_due_list').addClass('form-group hidden');
                $('#monthly_wise_due_list_table').removeClass();
                $('#monthly_wise_due_list_table').addClass('table-responsive hidden');  
                $('#family_ac_wise_due_list').removeClass();
                $('#family_ac_wise_due_list').addClass('form-group hidden');  
                $('#family_ac_wise_due_list_table').removeClass();
                $('#family_ac_wise_due_list_table').addClass('table-responsive hidden');
                $('#MOP_wise_list').removeClass();
                $('#MOP_wise_list').addClass('form-group hidden');
                $('#MOP_wise_due_list_table').removeClass();
                $('#MOP_wise_due_list_table').addClass('table-responsive hidden');
                $('#PS_wise_list').removeClass();
                $('#PS_wise_list').addClass('form-group hidden');
                $('#PS_wise_due_list_table').removeClass();
                $('#PS_wise_due_list_table').addClass('table-responsive hidden');
                $('#branch_wise_due_list_table').removeClass();
                $('#branch_wise_due_list_table').addClass('table-responsive hidden');
                $('#agent_wise_due_list_table').removeClass();
                $('#agent_wise_due_list_table').addClass('table-responsive hidden');
                $('#DOC_wise_list_table').removeClass();
                $('#DOC_wise_list_table').addClass('table-responsive hidden'); 
                $('#no_nominee_wise_list_table').removeClass();
                $('#no_nominee_wise_list_table').addClass('table-responsive hidden');
                 $('#medical_client_wise_list').removeClass();
                $('#medical_client_wise_list').addClass('form-group hidden');
                $('#medical_wise_list_table').removeClass();
                $('#medical_wise_list_table').addClass('table-responsive hidden');
                $('#FAMILY_CASH_LIST').removeClass();
                $('#FAMILY_CASH_LIST').addClass('form-group hidden');
                $('#family_cash_wise_list_table').removeClass();
                $('#family_cash_wise_list_table').addClass('table-responsive hidden');
                $('#SB_due_wise_list_table').removeClass();
                $('#SB_due_wise_list_table').addClass('table-responsive hidden'); 
                 $('#report_end_date').removeClass();
                $('#report_start_date').removeClass();
                $('#report_start_date').addClass('col-sm-3 hidden');
                $('#report_end_date').addClass('col-sm-3 hidden');
                $('#family_ac_wise_list').removeClass();
                $('#family_ac_wise_list').addClass('form-group hidden');
                $('#family_ac_wise_list_table').removeClass();
                $('#family_ac_wise_list_table').addClass('table-responsive hidden');
                 $('#family_birthday_wise_list_table').removeClass();
                $('#family_birthday_wise_list_table').addClass('form-group hidden');
                $('#client_address_wise_list_table').removeClass();
                $('#client_address_wise_list_table').addClass('form-group hidden');
                $('#client_surname_wise_list_table').removeClass();
                $('#client_surname_wise_list_table').addClass('form-group hidden');
                $('#client_cash_wise_list_table').removeClass();
                $('#client_cash_wise_list_table').addClass('form-group hidden');
                $('#client_cash_wise_list').removeClass();
                $('#client_cash_wise_list').addClass('form-group hidden');
                $('#client_surname_wise_list').removeClass();
                $('#client_surname_wise_list').addClass('form-group hidden');
                $('#family_DOB_wise_list').removeClass();
                $('#family_DOB_wise_list').addClass('form-group hidden');
                $('#document_wise_list_table').removeClass();
                $('#document_wise_list_table').addClass('form-group hidden');
                $.post('<?=site_url('Admin/report_plan_and_term_wise')?>',{},function(data){
                    console.log(data);
                    PTP_wise_report.clear();
                    $.each(data,function(k,v){
                        PTP_wise_report.row.add(v);
                    })
                    PTP_wise_report.draw();
                },'json');
            }else if(report_for == 6){
                $('#SB_DUE_wise_list').removeClass();
                $('#SB_DUE_wise_list').addClass('form-group hidden');
                $('#document_wise_list').removeClass();
                $('#document_wise_list').addClass('form-group hidden');
                $('#family_ac_office_wise_list').removeClass();
                $('#family_ac_office_wise_list').addClass('form-group hidden');
                $('#family_ac_office_wise_list_table').removeClass();
                $('#family_ac_office_wise_list_table').addClass('table-responsive hidden');  
                $('#family_loan_wise_list').removeClass();
                $('#family_loan_wise_list').addClass('form-group hidden');
                $('#family_loan_wise_list_table').removeClass();
                $('#family_loan_wise_list_table').addClass('table-responsive hidden');
                $('#family_pension_wise_list').removeClass();
                $('#family_pension_wise_list').addClass('form-group hidden');
                $('#family_pension_wise_list_table').removeClass();
                $('#family_pension_wise_list_table').addClass('table-responsive hidden');
                $('#monthly_wise_due_list').removeClass();
                $('#monthly_wise_due_list').addClass('form-group');
                $('#report_end_date').removeClass();
                $('#report_start_date').removeClass();
                $('#report_start_date').addClass('col-sm-3');
                $('#report_end_date').addClass('col-sm-3');
                $('#monthly_wise_due_list_table').removeClass();
                $('#monthly_wise_due_list_table').addClass('table-responsive');  
                $('#family_ac_wise_due_list').removeClass();
                $('#family_ac_wise_due_list').addClass('form-group hidden');  
                $('#family_ac_wise_due_list_table').removeClass();
                $('#family_ac_wise_due_list_table').addClass('table-responsive hidden'); 
                $('#policy_number_wise_list_table').removeClass();
                $('#policy_number_wise_list_table').addClass('table-responsive hidden'); 
                $('#surname_wise_list_table').removeClass();
                $('#surname_wise_list_table').addClass('table-responsive hidden');
                $('#sex_wise_list').removeClass();
                $('#sex_wise_list').addClass('form-group hidden');
                $('#sex_wise_list_table').removeClass();
                $('#sex_wise_list_table').addClass('table-responsive hidden');
                $('#DOB_wise_list_table').removeClass();
                $('#DOB_wise_list_table').addClass('table-responsive hidden'); 
                $('#PTP_wise_list_table').removeClass();
                $('#PTP_wise_list_table').addClass('table-responsive hidden'); 
                $('#MOP_wise_list').removeClass();
                $('#MOP_wise_list').addClass('form-group hidden');
                $('#MOP_wise_due_list_table').removeClass();
                $('#MOP_wise_due_list_table').addClass('table-responsive hidden');
                $('#PS_wise_list').removeClass();
                $('#PS_wise_list').addClass('form-group hidden');
                $('#PS_wise_due_list_table').removeClass();
                $('#PS_wise_due_list_table').addClass('table-responsive hidden'); 
                $('#branch_wise_due_list_table').removeClass();
                $('#branch_wise_due_list_table').addClass('table-responsive hidden');
                $('#agent_wise_due_list_table').removeClass();
                $('#agent_wise_due_list_table').addClass('table-responsive hidden');
                $('#DOC_wise_list_table').removeClass();
                $('#DOC_wise_list_table').addClass('table-responsive hidden');
                $('#no_nominee_wise_list_table').removeClass();
                $('#no_nominee_wise_list_table').addClass('table-responsive hidden');
                $('#medical_client_wise_list').removeClass();
                $('#medical_client_wise_list').addClass('form-group hidden');
                $('#medical_wise_list_table').removeClass();
                $('#medical_wise_list_table').addClass('table-responsive hidden');
                $('#FAMILY_CASH_LIST').removeClass();
                $('#FAMILY_CASH_LIST').addClass('form-group hidden');
                $('#family_cash_wise_list_table').removeClass();
                $('#family_cash_wise_list_table').addClass('table-responsive hidden');
                $('#SB_due_wise_list_table').removeClass();
                $('#SB_due_wise_list_table').addClass('table-responsive hidden'); 
                $('#family_ac_wise_list').removeClass();
                $('#family_ac_wise_list').addClass('form-group hidden');
                $('#family_ac_wise_list_table').removeClass();
                $('#family_ac_wise_list_table').addClass('table-responsive hidden');
                 $('#family_birthday_wise_list_table').removeClass();
                $('#family_birthday_wise_list_table').addClass('form-group hidden');
                $('#client_address_wise_list_table').removeClass();
                $('#client_address_wise_list_table').addClass('form-group hidden');
                $('#client_surname_wise_list_table').removeClass();
                $('#client_surname_wise_list_table').addClass('form-group hidden');
                $('#client_cash_wise_list_table').removeClass();
                $('#client_cash_wise_list_table').addClass('form-group hidden');
                $('#client_cash_wise_list').removeClass();
                $('#client_cash_wise_list').addClass('form-group hidden');
                $('#client_surname_wise_list').removeClass();
                $('#client_surname_wise_list').addClass('form-group hidden');
                $('#family_DOB_wise_list').removeClass();
                $('#family_DOB_wise_list').addClass('form-group hidden');
                $('#document_wise_list_table').removeClass();
                $('#document_wise_list_table').addClass('form-group hidden');
            }else if(report_for == 7){
                $('#SB_DUE_wise_list').removeClass();
                $('#SB_DUE_wise_list').addClass('form-group hidden');
                $('#document_wise_list').removeClass();
                $('#document_wise_list').addClass('form-group hidden');
                $('#family_ac_office_wise_list').removeClass();
                $('#family_ac_office_wise_list').addClass('form-group hidden');
                $('#family_ac_office_wise_list_table').removeClass();
                $('#family_ac_office_wise_list_table').addClass('table-responsive hidden');  
                $('#family_loan_wise_list').removeClass();
                $('#family_loan_wise_list').addClass('form-group hidden');
                $('#family_loan_wise_list_table').removeClass();
                $('#family_loan_wise_list_table').addClass('table-responsive hidden');
                $('#family_pension_wise_list').removeClass();
                $('#family_pension_wise_list').addClass('form-group hidden');
                $('#family_pension_wise_list_table').removeClass();
                $('#family_pension_wise_list_table').addClass('table-responsive hidden');
                $('#medical_client_wise_list').removeClass();
                $('#medical_client_wise_list').addClass('form-group');
                $('#medical_wise_list_table').removeClass();
                $('#medical_wise_list_table').addClass('table-responsive'); 
                $('#monthly_wise_due_list').removeClass();
                $('#monthly_wise_due_list').addClass('form-group hidden');
                $('#monthly_wise_due_list_table').removeClass();
                $('#monthly_wise_due_list_table').addClass('table-responsive hidden');  
                $('#family_ac_wise_due_list').removeClass();
                $('#family_ac_wise_due_list').addClass('form-group hidden');  
                $('#family_ac_wise_due_list_table').removeClass();
                $('#family_ac_wise_due_list_table').addClass('table-responsive hidden'); 
                $('#policy_number_wise_list_table').removeClass();
                $('#policy_number_wise_list_table').addClass('table-responsive hidden'); 
                $('#surname_wise_list_table').removeClass();
                $('#surname_wise_list_table').addClass('table-responsive hidden');
                $('#sex_wise_list').removeClass();
                $('#sex_wise_list').addClass('form-group hidden');
                $('#sex_wise_list_table').removeClass();
                $('#sex_wise_list_table').addClass('table-responsive hidden');
                $('#DOB_wise_list_table').removeClass();
                $('#DOB_wise_list_table').addClass('table-responsive hidden'); 
                $('#PTP_wise_list_table').removeClass();
                $('#PTP_wise_list_table').addClass('table-responsive hidden'); 
                $('#MOP_wise_list').removeClass();
                $('#MOP_wise_list').addClass('form-group hidden');
                $('#MOP_wise_due_list_table').removeClass();
                $('#MOP_wise_due_list_table').addClass('table-responsive hidden');
                $('#PS_wise_list').removeClass();
                $('#PS_wise_list').addClass('form-group hidden');
                $('#PS_wise_due_list_table').removeClass();
                $('#PS_wise_due_list_table').addClass('table-responsive hidden'); 
                $('#branch_wise_due_list_table').removeClass();
                $('#branch_wise_due_list_table').addClass('table-responsive hidden');
                $('#agent_wise_due_list_table').removeClass();
                $('#agent_wise_due_list_table').addClass('table-responsive hidden');
                $('#DOC_wise_list_table').removeClass();
                $('#DOC_wise_list_table').addClass('table-responsive hidden');
                $('#no_nominee_wise_list_table').removeClass();
                $('#no_nominee_wise_list_table').addClass('table-responsive hidden');
                $('#FAMILY_CASH_LIST').removeClass();
                $('#FAMILY_CASH_LIST').addClass('form-group hidden');
                $('#family_cash_wise_list_table').removeClass();
                $('#family_cash_wise_list_table').addClass('table-responsive hidden');
                $('#SB_due_wise_list_table').removeClass();
                $('#SB_due_wise_list_table').addClass('table-responsive hidden'); 
                $('#report_end_date').removeClass();
                $('#report_start_date').removeClass();
                $('#report_start_date').addClass('col-sm-3 hidden');
                $('#report_end_date').addClass('col-sm-3 hidden');
                $('#family_ac_wise_list').removeClass();
                $('#family_ac_wise_list').addClass('form-group hidden');
                $('#family_ac_wise_list_table').removeClass();
                $('#family_ac_wise_list_table').addClass('table-responsive hidden');
                 $('#family_birthday_wise_list_table').removeClass();
                $('#family_birthday_wise_list_table').addClass('form-group hidden');
                $('#client_address_wise_list_table').removeClass();
                $('#client_address_wise_list_table').addClass('form-group hidden');
                $('#client_surname_wise_list_table').removeClass();
                $('#client_surname_wise_list_table').addClass('form-group hidden');
                $('#client_cash_wise_list_table').removeClass();
                $('#client_cash_wise_list_table').addClass('form-group hidden');
                $('#client_cash_wise_list').removeClass();
                $('#client_cash_wise_list').addClass('form-group hidden');
                $('#client_surname_wise_list').removeClass();
                $('#client_surname_wise_list').addClass('form-group hidden');
                $('#family_DOB_wise_list').removeClass();
                $('#family_DOB_wise_list').addClass('form-group hidden');
                $('#document_wise_list_table').removeClass();
                $('#document_wise_list_table').addClass('form-group hidden');
            }else if(report_for == 8){
                $('#SB_DUE_wise_list').removeClass();
                $('#SB_DUE_wise_list').addClass('form-group hidden');
                $('#document_wise_list').removeClass();
                $('#document_wise_list').addClass('form-group hidden');
                $('#family_ac_office_wise_list').removeClass();
                $('#family_ac_office_wise_list').addClass('form-group hidden');
                $('#family_ac_office_wise_list_table').removeClass();
                $('#family_ac_office_wise_list_table').addClass('table-responsive hidden');  
                $('#family_loan_wise_list').removeClass();
                $('#family_loan_wise_list').addClass('form-group hidden');
                $('#family_loan_wise_list_table').removeClass();
                $('#family_loan_wise_list_table').addClass('table-responsive hidden');
                $('#family_pension_wise_list').removeClass();
                $('#family_pension_wise_list').addClass('form-group hidden');
                $('#family_pension_wise_list_table').removeClass();
                $('#family_pension_wise_list_table').addClass('table-responsive hidden');
                $('#MOP_wise_list').removeClass();
                $('#MOP_wise_list').addClass('form-group');
                $('#MOP_wise_due_list_table').removeClass();
                $('#MOP_wise_due_list_table').addClass('table-responsive');
                $('#monthly_wise_due_list').removeClass();
                $('#monthly_wise_due_list').addClass('form-group hidden');
                $('#monthly_wise_due_list_table').removeClass();
                $('#monthly_wise_due_list_table').addClass('table-responsive hidden');  
                $('#family_ac_wise_due_list').removeClass();
                $('#family_ac_wise_due_list').addClass('form-group hidden');  
                $('#family_ac_wise_due_list_table').removeClass();
                $('#family_ac_wise_due_list_table').addClass('table-responsive hidden'); 
                $('#policy_number_wise_list_table').removeClass();
                $('#policy_number_wise_list_table').addClass('table-responsive hidden'); 
                $('#surname_wise_list_table').removeClass();
                $('#surname_wise_list_table').addClass('table-responsive hidden');
                $('#sex_wise_list').removeClass();
                $('#sex_wise_list').addClass('form-group hidden');
                $('#sex_wise_list_table').removeClass();
                $('#sex_wise_list_table').addClass('table-responsive hidden');
                $('#DOB_wise_list_table').removeClass();
                $('#DOB_wise_list_table').addClass('table-responsive hidden'); 
                $('#PTP_wise_list_table').removeClass();
                $('#PTP_wise_list_table').addClass('table-responsive hidden');
                $('#PS_wise_list').removeClass();
                $('#PS_wise_list').addClass('form-group hidden');
                $('#PS_wise_due_list_table').removeClass();
                $('#PS_wise_due_list_table').addClass('table-responsive hidden'); 
                $('#branch_wise_due_list_table').removeClass();
                $('#branch_wise_due_list_table').addClass('table-responsive hidden');
                $('#agent_wise_due_list_table').removeClass();
                $('#agent_wise_due_list_table').addClass('table-responsive hidden');
                $('#DOC_wise_list_table').removeClass();
                $('#DOC_wise_list_table').addClass('table-responsive hidden');
                $('#no_nominee_wise_list_table').removeClass();
                $('#no_nominee_wise_list_table').addClass('table-responsive hidden');
                $('#medical_client_wise_list').removeClass();
                $('#medical_client_wise_list').addClass('form-group hidden');
                $('#medical_wise_list_table').removeClass();
                $('#medical_wise_list_table').addClass('table-responsive hidden');
                $('#FAMILY_CASH_LIST').removeClass();
                $('#FAMILY_CASH_LIST').addClass('form-group hidden');
                $('#family_cash_wise_list_table').removeClass();
                $('#family_cash_wise_list_table').addClass('table-responsive hidden');
                $('#SB_due_wise_list_table').removeClass();
                $('#SB_due_wise_list_table').addClass('table-responsive hidden');
                 $('#report_end_date').removeClass();
                $('#report_start_date').removeClass();
                $('#report_start_date').addClass('col-sm-3 hidden');
                $('#report_end_date').addClass('col-sm-3 hidden'); 
                $('#family_ac_wise_list').removeClass();
                $('#family_ac_wise_list').addClass('form-group hidden');
                $('#family_ac_wise_list_table').removeClass();
                $('#family_ac_wise_list_table').addClass('table-responsive hidden');
                 $('#family_birthday_wise_list_table').removeClass();
                $('#family_birthday_wise_list_table').addClass('form-group hidden');
                $('#client_address_wise_list_table').removeClass();
                $('#client_address_wise_list_table').addClass('form-group hidden');
                $('#client_surname_wise_list_table').removeClass();
                $('#client_surname_wise_list_table').addClass('form-group hidden');
                $('#client_cash_wise_list_table').removeClass();
                $('#client_cash_wise_list_table').addClass('form-group hidden');
                $('#client_cash_wise_list').removeClass();
                $('#client_cash_wise_list').addClass('form-group hidden');
                $('#client_surname_wise_list').removeClass();
                $('#client_surname_wise_list').addClass('form-group hidden');
                $('#family_DOB_wise_list').removeClass();
                $('#family_DOB_wise_list').addClass('form-group hidden');
                $('#document_wise_list_table').removeClass();
                $('#document_wise_list_table').addClass('form-group hidden');
            }else if(report_for == 9){
                $('#SB_DUE_wise_list').removeClass();
                $('#SB_DUE_wise_list').addClass('form-group');
                $('#document_wise_list').removeClass();
                $('#document_wise_list').addClass('form-group hidden');
                $('#family_ac_office_wise_list').removeClass();
                $('#family_ac_office_wise_list').addClass('form-group hidden');
                $('#family_ac_office_wise_list_table').removeClass();
                $('#family_ac_office_wise_list_table').addClass('table-responsive hidden');  
                $('#family_loan_wise_list').removeClass();
                $('#family_loan_wise_list').addClass('form-group hidden');
                $('#family_loan_wise_list_table').removeClass();
                $('#family_loan_wise_list_table').addClass('table-responsive hidden');
                $('#family_pension_wise_list').removeClass();
                $('#family_pension_wise_list').addClass('form-group hidden');
                $('#family_pension_wise_list_table').removeClass();
                $('#family_pension_wise_list_table').addClass('table-responsive hidden');
                $('#SB_due_wise_list_table').removeClass();
                $('#SB_due_wise_list_table').addClass('table-responsive'); 
                $('#PTP_wise_list_table').removeClass();
                $('#PTP_wise_list_table').addClass('table-responsive hidden'); 
                $('#DOB_wise_list_table').removeClass();
                $('#DOB_wise_list_table').addClass('table-responsive hidden'); 
                $('#surname_wise_list_table').removeClass();
                $('#surname_wise_list_table').addClass('table-responsive hidden');
                $('#sex_wise_list').removeClass();
                $('#sex_wise_list').addClass('form-group hidden');
                $('#sex_wise_list_table').removeClass();
                $('#sex_wise_list_table').addClass('table-responsive hidden');
                $('#policy_number_wise_list_table').removeClass();
                $('#policy_number_wise_list_table').addClass('table-responsive hidden');
                $('#monthly_wise_due_list').removeClass();
                $('#monthly_wise_due_list').addClass('form-group hidden');
                $('#monthly_wise_due_list_table').removeClass();
                $('#monthly_wise_due_list_table').addClass('table-responsive hidden');  
                $('#family_ac_wise_due_list').removeClass();
                $('#family_ac_wise_due_list').addClass('form-group hidden');  
                $('#family_ac_wise_due_list_table').removeClass();
                $('#family_ac_wise_due_list_table').addClass('table-responsive hidden');
                $('#MOP_wise_list').removeClass();
                $('#MOP_wise_list').addClass('form-group hidden');
                $('#MOP_wise_due_list_table').removeClass();
                $('#MOP_wise_due_list_table').addClass('table-responsive hidden');
                $('#PS_wise_list').removeClass();
                $('#PS_wise_list').addClass('form-group hidden');
                $('#PS_wise_due_list_table').removeClass();
                $('#PS_wise_due_list_table').addClass('table-responsive hidden');
                $('#branch_wise_due_list_table').removeClass();
                $('#branch_wise_due_list_table').addClass('table-responsive hidden');
                $('#agent_wise_due_list_table').removeClass();
                $('#agent_wise_due_list_table').addClass('table-responsive hidden');
                $('#DOC_wise_list_table').removeClass();
                $('#DOC_wise_list_table').addClass('table-responsive hidden'); 
                $('#no_nominee_wise_list_table').removeClass();
                $('#no_nominee_wise_list_table').addClass('table-responsive hidden');
                $('#medical_client_wise_list').removeClass();
                $('#medical_client_wise_list').addClass('form-group hidden');
                $('#medical_wise_list_table').removeClass();
                $('#medical_wise_list_table').addClass('table-responsive hidden');
                $('#FAMILY_CASH_LIST').removeClass();
                $('#FAMILY_CASH_LIST').addClass('form-group hidden');
                $('#family_cash_wise_list_table').removeClass();
                $('#family_cash_wise_list_table').addClass('table-responsive hidden');
                $('#report_end_date').removeClass();
                $('#report_start_date').removeClass();
                $('#report_start_date').addClass('col-sm-3');
                $('#report_end_date').addClass('col-sm-3');
                $('#family_ac_wise_list').removeClass();
                $('#family_ac_wise_list').addClass('form-group hidden');
                $('#family_ac_wise_list_table').removeClass();
                $('#family_ac_wise_list_table').addClass('table-responsive hidden');
                 $('#family_birthday_wise_list_table').removeClass();
                $('#family_birthday_wise_list_table').addClass('form-group hidden');
                $('#client_address_wise_list_table').removeClass();
                $('#client_address_wise_list_table').addClass('form-group hidden');
                $('#client_surname_wise_list_table').removeClass();
                $('#client_surname_wise_list_table').addClass('form-group hidden');
                $('#client_cash_wise_list_table').removeClass();
                $('#client_cash_wise_list_table').addClass('form-group hidden');
                $('#client_cash_wise_list').removeClass();
                $('#client_cash_wise_list').addClass('form-group hidden');
                $('#client_surname_wise_list').removeClass();
                $('#client_surname_wise_list').addClass('form-group hidden');
                $('#family_DOB_wise_list').removeClass();
                $('#family_DOB_wise_list').addClass('form-group hidden');
                $('#document_wise_list_table').removeClass();
                $('#document_wise_list_table').addClass('form-group hidden');
            }else if(report_for == 10){
                $('#SB_DUE_wise_list').removeClass();
                $('#SB_DUE_wise_list').addClass('form-group hidden');
                $('#document_wise_list').removeClass();
                $('#document_wise_list').addClass('form-group hidden');
                $('#document_wise_list_table').removeClass();
                $('#document_wise_list_table').addClass('table-responsive hidden');
                $('#family_ac_office_wise_list').removeClass();
                $('#family_ac_office_wise_list').addClass('form-group hidden');
                $('#family_ac_office_wise_list_table').removeClass();
                $('#family_ac_office_wise_list_table').addClass('table-responsive hidden');  
                $('#family_loan_wise_list').removeClass();
                $('#family_loan_wise_list').addClass('form-group hidden');
                $('#family_loan_wise_list_table').removeClass();
                $('#family_loan_wise_list_table').addClass('table-responsive hidden');
                $('#family_pension_wise_list').removeClass();
                $('#family_pension_wise_list').addClass('form-group hidden');
                $('#family_pension_wise_list_table').removeClass();
                $('#family_pension_wise_list_table').addClass('table-responsive hidden');
                $('#PS_wise_list').removeClass();
                $('#PS_wise_list').addClass('form-group');
                $('#PS_wise_due_list_table').removeClass();
                $('#PS_wise_due_list_table').addClass('table-responsive');
                $('#MOP_wise_list').removeClass();
                $('#MOP_wise_list').addClass('form-group hidden');
                $('#MOP_wise_due_list_table').removeClass();
                $('#MOP_wise_due_list_table').addClass('table-responsive hidden');
                $('#monthly_wise_due_list').removeClass();
                $('#monthly_wise_due_list').addClass('form-group hidden');
                $('#monthly_wise_due_list_table').removeClass();
                $('#monthly_wise_due_list_table').addClass('table-responsive hidden');  
                $('#family_ac_wise_due_list').removeClass();
                $('#family_ac_wise_due_list').addClass('form-group hidden');  
                $('#family_ac_wise_due_list_table').removeClass();
                $('#family_ac_wise_due_list_table').addClass('table-responsive hidden'); 
                $('#policy_number_wise_list_table').removeClass();
                $('#policy_number_wise_list_table').addClass('table-responsive hidden'); 
                $('#surname_wise_list_table').removeClass();
                $('#surname_wise_list_table').addClass('table-responsive hidden');
                $('#sex_wise_list').removeClass();
                $('#sex_wise_list').addClass('form-group hidden');
                $('#sex_wise_list_table').removeClass();
                $('#sex_wise_list_table').addClass('table-responsive hidden');
                $('#DOB_wise_list_table').removeClass();
                $('#DOB_wise_list_table').addClass('table-responsive hidden'); 
                $('#PTP_wise_list_table').removeClass();
                $('#PTP_wise_list_table').addClass('table-responsive hidden');
                $('#branch_wise_due_list_table').removeClass();
                $('#branch_wise_due_list_table').addClass('table-responsive hidden');
                $('#agent_wise_due_list_table').removeClass();
                $('#agent_wise_due_list_table').addClass('table-responsive hidden');
                $('#DOC_wise_list_table').removeClass();
                $('#DOC_wise_list_table').addClass('table-responsive hidden');
                $('#no_nominee_wise_list_table').removeClass();
                $('#no_nominee_wise_list_table').addClass('table-responsive hidden');
                $('#medical_client_wise_list').removeClass();
                $('#medical_client_wise_list').addClass('form-group hidden');
                $('#medical_wise_list_table').removeClass();
                $('#medical_wise_list_table').addClass('table-responsive hidden');
                $('#FAMILY_CASH_LIST').removeClass();
                $('#FAMILY_CASH_LIST').addClass('form-group hidden');
                $('#family_cash_wise_list_table').removeClass();
                $('#family_cash_wise_list_table').addClass('table-responsive hidden');
                $('#SB_due_wise_list_table').removeClass();
                $('#SB_due_wise_list_table').addClass('table-responsive hidden'); 
                $('#report_end_date').removeClass();
                $('#report_start_date').removeClass();
                $('#report_start_date').addClass('col-sm-3 hidden');
                $('#report_end_date').addClass('col-sm-3 hidden');
                $('#family_ac_wise_list').removeClass();
                $('#family_ac_wise_list').addClass('form-group hidden');
                $('#family_ac_wise_list_table').removeClass();
                $('#family_ac_wise_list_table').addClass('table-responsive hidden');
                 $('#family_birthday_wise_list_table').removeClass();
                $('#family_birthday_wise_list_table').addClass('form-group hidden');
                $('#client_address_wise_list_table').removeClass();
                $('#client_address_wise_list_table').addClass('form-group hidden');
                $('#client_surname_wise_list_table').removeClass();
                $('#client_surname_wise_list_table').addClass('form-group hidden');
                $('#client_cash_wise_list_table').removeClass();
                $('#client_cash_wise_list_table').addClass('form-group hidden');
                $('#client_cash_wise_list').removeClass();
                $('#client_cash_wise_list').addClass('form-group hidden');
                $('#client_surname_wise_list').removeClass();
                $('#client_surname_wise_list').addClass('form-group hidden');
                $('#family_DOB_wise_list').removeClass();
                $('#family_DOB_wise_list').addClass('form-group hidden');
            }else if(report_for == 11){
                $('#SB_DUE_wise_list').removeClass();
                $('#SB_DUE_wise_list').addClass('form-group hidden');
                $('#family_ac_office_wise_list').removeClass();
                $('#family_ac_office_wise_list').addClass('form-group hidden');
                $('#family_ac_office_wise_list_table').removeClass();
                $('#family_ac_office_wise_list_table').addClass('table-responsive hidden');  
                $('#family_loan_wise_list').removeClass();
                $('#family_loan_wise_list').addClass('form-group hidden');
                $('#family_loan_wise_list_table').removeClass();
                $('#family_loan_wise_list_table').addClass('table-responsive hidden');
                $('#family_pension_wise_list').removeClass();
                $('#family_pension_wise_list').addClass('form-group hidden');
                $('#family_pension_wise_list_table').removeClass();
                $('#family_pension_wise_list_table').addClass('table-responsive hidden');
                $('#document_wise_list_table').removeClass();
                $('#document_wise_list_table').addClass('table-responsive'); 
                $('#document_wise_list').removeClass();
                $('#document_wise_list').addClass('form-group');
                $('#client_surname_wise_list').removeClass();
                $('#client_surname_wise_list').addClass('form-group hidden');
                $('#family_DOB_wise_list').removeClass();
                $('#family_DOB_wise_list').addClass('form-group hidden');
                $('#client_cash_wise_list').removeClass();
                $('#client_cash_wise_list').addClass('form-group hidden');
                $('#family_birthday_wise_list_table').removeClass();
                $('#family_birthday_wise_list_table').addClass('form-group hidden');
                $('#client_address_wise_list_table').removeClass();
                $('#client_address_wise_list_table').addClass('form-group hidden');
                $('#client_surname_wise_list_table').removeClass();
                $('#client_surname_wise_list_table').addClass('form-group hidden');
                $('#client_cash_wise_list_table').removeClass();
                $('#client_cash_wise_list_table').addClass('form-group hidden');
                $('#family_ac_wise_due_list').removeClass();
                $('#family_ac_wise_due_list').addClass('form-group hidden');  
                $('#family_ac_wise_due_list_table').removeClass();
                $('#report_end_date').removeClass();
                $('#report_start_date').removeClass();
                $('#report_start_date').addClass('col-sm-3 hidden');
                $('#report_end_date').addClass('col-sm-3 hidden');
                $('#family_ac_wise_due_list_table').addClass('table-responsive hidden');               
                $('#monthly_wise_due_list').removeClass();
                $('#monthly_wise_due_list').addClass('form-group hidden');
                $('#monthly_wise_due_list_table').removeClass();
                $('#monthly_wise_due_list_table').addClass('table-responsive hidden');
                $('#policy_number_wise_list_table').removeClass();
                $('#policy_number_wise_list_table').addClass('table-responsive hidden'); 
                $('#surname_wise_list_table').removeClass();
                $('#surname_wise_list_table').addClass('table-responsive hidden');
                $('#sex_wise_list').removeClass();
                $('#sex_wise_list').addClass('form-group hidden');
                $('#sex_wise_list_table').removeClass();
                $('#sex_wise_list_table').addClass('table-responsive hidden');
                $('#DOB_wise_list_table').removeClass();
                $('#DOB_wise_list_table').addClass('table-responsive hidden'); 
                $('#PTP_wise_list_table').removeClass();
                $('#PTP_wise_list_table').addClass('table-responsive hidden'); 
                $('#MOP_wise_list').removeClass();
                $('#MOP_wise_list').addClass('form-group hidden');
                $('#MOP_wise_due_list_table').removeClass();
                $('#MOP_wise_due_list_table').addClass('table-responsive hidden');
                $('#PS_wise_list').removeClass();
                $('#PS_wise_list').addClass('form-group hidden');
                $('#PS_wise_due_list_table').removeClass();
                $('#PS_wise_due_list_table').addClass('table-responsive hidden');
                $('#branch_wise_due_list_table').removeClass();
                $('#branch_wise_due_list_table').addClass('table-responsive hidden');
                $('#agent_wise_due_list_table').removeClass();
                $('#agent_wise_due_list_table').addClass('table-responsive hidden'); 
                $('#DOC_wise_list_table').removeClass();
                $('#DOC_wise_list_table').addClass('table-responsive hidden'); 
                $('#no_nominee_wise_list_table').removeClass();
                $('#no_nominee_wise_list_table').addClass('table-responsive hidden');
                $('#medical_client_wise_list').removeClass();
                $('#medical_client_wise_list').addClass('form-group hidden');
                $('#medical_wise_list_table').removeClass();
                $('#medical_wise_list_table').addClass('table-responsive hidden');
                $('#SB_due_wise_list_table').removeClass();
                $('#SB_due_wise_list_table').addClass('table-responsive hidden'); 
                $('#family_ac_wise_list').removeClass();
                $('#family_ac_wise_list').addClass('form-group hidden');
                $('#family_ac_wise_list_table').removeClass();
                $('#family_ac_wise_list_table').addClass('table-responsive hidden');
            }else if(report_for == 12){
                $('#SB_DUE_wise_list').removeClass();
                $('#SB_DUE_wise_list').addClass('form-group hidden');
                $('#document_wise_list').removeClass();
                $('#document_wise_list').addClass('form-group hidden');
                $('#family_ac_office_wise_list').removeClass();
                $('#family_ac_office_wise_list').addClass('form-group hidden');
                $('#family_ac_office_wise_list_table').removeClass();
                $('#family_ac_office_wise_list_table').addClass('table-responsive hidden');  
                $('#family_loan_wise_list').removeClass();
                $('#family_loan_wise_list').addClass('form-group hidden');
                $('#family_loan_wise_list_table').removeClass();
                $('#family_loan_wise_list_table').addClass('table-responsive hidden');
                $('#family_pension_wise_list').removeClass();
                $('#family_pension_wise_list').addClass('form-group hidden');
                $('#family_pension_wise_list_table').removeClass();
                $('#family_pension_wise_list_table').addClass('table-responsive hidden');
                $('#family_ac_wise_list').removeClass();
                $('#family_ac_wise_list').addClass('form-group'); 
                $('#family_ac_wise_due_list').removeClass();
                $('#family_ac_wise_due_list').addClass('form-group hidden'); 
                $('#report_end_date').removeClass();
                $('#report_start_date').removeClass();
                $('#report_start_date').addClass('col-sm-3');
                $('#document_wise_list_table').removeClass();
                $('#document_wise_list_table').addClass('form-group hidden');
                $('#report_end_date').addClass('col-sm-3'); 
                $('#family_ac_wise_list_table').removeClass();
                $('#family_ac_wise_list_table').addClass('table-responsive');
                $('#family_ac_wise_due_list_table').removeClass();
                $('#family_ac_wise_due_list_table').addClass('table-responsive hidden');               
                $('#monthly_wise_due_list').removeClass();
                $('#monthly_wise_due_list').addClass('form-group hidden');
                $('#monthly_wise_due_list_table').removeClass();
                $('#monthly_wise_due_list_table').addClass('table-responsive hidden');
                $('#policy_number_wise_list_table').removeClass();
                $('#policy_number_wise_list_table').addClass('table-responsive hidden'); 
                $('#surname_wise_list_table').removeClass();
                $('#surname_wise_list_table').addClass('table-responsive hidden');
                $('#sex_wise_list').removeClass();
                $('#sex_wise_list').addClass('form-group hidden');
                $('#sex_wise_list_table').removeClass();
                $('#sex_wise_list_table').addClass('table-responsive hidden');
                $('#DOB_wise_list_table').removeClass();
                $('#DOB_wise_list_table').addClass('table-responsive hidden'); 
                $('#PTP_wise_list_table').removeClass();
                $('#PTP_wise_list_table').addClass('table-responsive hidden');
                $('#MOP_wise_list').removeClass();
                $('#MOP_wise_list').addClass('form-group hidden');
                $('#MOP_wise_due_list_table').removeClass();
                $('#MOP_wise_due_list_table').addClass('table-responsive hidden');
                $('#PS_wise_list').removeClass();
                $('#PS_wise_list').addClass('form-group hidden');
                $('#PS_wise_due_list_table').removeClass();
                $('#PS_wise_due_list_table').addClass('table-responsive hidden'); 
                $('#branch_wise_due_list_table').removeClass();
                $('#branch_wise_due_list_table').addClass('table-responsive hidden'); 
                $('#agent_wise_due_list_table').removeClass();
                $('#agent_wise_due_list_table').addClass('table-responsive hidden');
                $('#DOC_wise_list_table').removeClass();
                $('#DOC_wise_list_table').addClass('table-responsive hidden');
                $('#no_nominee_wise_list_table').removeClass();
                $('#no_nominee_wise_list_table').addClass('table-responsive hidden');
                $('#medical_client_wise_list').removeClass();
                $('#medical_client_wise_list').addClass('form-group hidden');
                $('#medical_wise_list_table').removeClass();
                $('#medical_wise_list_table').addClass('table-responsive hidden');
                $('#FAMILY_CASH_LIST').removeClass();
                $('#FAMILY_CASH_LIST').addClass('form-group hidden');
                $('#family_cash_wise_list_table').removeClass();
                $('#family_cash_wise_list_table').addClass('table-responsive hidden');
                $('#SB_due_wise_list_table').removeClass();
                $('#SB_due_wise_list_table').addClass('table-responsive hidden'); 
                 $('#family_birthday_wise_list_table').removeClass();
                $('#family_birthday_wise_list_table').addClass('form-group hidden');
                $('#client_address_wise_list_table').removeClass();
                $('#client_address_wise_list_table').addClass('form-group hidden');
                $('#client_surname_wise_list_table').removeClass();
                $('#client_surname_wise_list_table').addClass('form-group hidden');
                $('#client_cash_wise_list_table').removeClass();
                $('#client_cash_wise_list_table').addClass('form-group hidden');
                $('#client_cash_wise_list').removeClass();
                $('#client_cash_wise_list').addClass('form-group hidden');
                $('#client_surname_wise_list').removeClass();
                $('#client_surname_wise_list').addClass('form-group hidden');
                $('#family_DOB_wise_list').removeClass();
                $('#family_DOB_wise_list').addClass('form-group hidden');
				$('#report_end_date').removeClass();
                $('#report_start_date').removeClass();
                $('#report_start_date').addClass('col-sm-3 hidden');
                $('#report_end_date').addClass('col-sm-3 hidden');
            }else if(report_for == 13){
                $('#SB_DUE_wise_list').removeClass();
                $('#SB_DUE_wise_list').addClass('form-group hidden');
                $('#document_wise_list').removeClass();
                $('#document_wise_list').addClass('form-group hidden');
                $('#family_ac_office_wise_list').removeClass();
                $('#family_ac_office_wise_list').addClass('form-group hidden');
                $('#family_ac_office_wise_list_table').removeClass();
                $('#family_ac_office_wise_list_table').addClass('table-responsive hidden');  
                $('#family_loan_wise_list').removeClass();
                $('#family_loan_wise_list').addClass('form-group hidden');
                $('#family_loan_wise_list_table').removeClass();
                $('#family_loan_wise_list_table').addClass('table-responsive hidden');
                $('#family_pension_wise_list').removeClass();
                $('#family_pension_wise_list').addClass('form-group hidden');
                $('#family_pension_wise_list_table').removeClass();
                $('#family_pension_wise_list_table').addClass('table-responsive hidden');
                $('#family_ac_wise_due_list').removeClass();
                $('#family_ac_wise_due_list').addClass('form-group'); 
                $('#report_end_date').removeClass();
                $('#report_start_date').removeClass();
                $('#report_start_date').addClass('col-sm-3');
                $('#report_end_date').addClass('col-sm-3'); 
                $('#family_ac_wise_due_list_table').removeClass();
                $('#family_ac_wise_due_list_table').addClass('table-responsive');               
                $('#monthly_wise_due_list').removeClass();
                $('#monthly_wise_due_list').addClass('form-group hidden');
                $('#document_wise_list_table').removeClass();
                $('#document_wise_list_table').addClass('form-group hidden');
                $('#monthly_wise_due_list_table').removeClass();
                $('#monthly_wise_due_list_table').addClass('table-responsive hidden');
                $('#policy_number_wise_list_table').removeClass();
                $('#policy_number_wise_list_table').addClass('table-responsive hidden'); 
                $('#surname_wise_list_table').removeClass();
                $('#surname_wise_list_table').addClass('table-responsive hidden');
                $('#sex_wise_list').removeClass();
                $('#sex_wise_list').addClass('form-group hidden');
                $('#sex_wise_list_table').removeClass();
                $('#sex_wise_list_table').addClass('table-responsive hidden');
                $('#DOB_wise_list_table').removeClass();
                $('#DOB_wise_list_table').addClass('table-responsive hidden'); 
                $('#PTP_wise_list_table').removeClass();
                $('#PTP_wise_list_table').addClass('table-responsive hidden');
                $('#MOP_wise_list').removeClass();
                $('#MOP_wise_list').addClass('form-group hidden');
                $('#MOP_wise_due_list_table').removeClass();
                $('#MOP_wise_due_list_table').addClass('table-responsive hidden');
                $('#PS_wise_list').removeClass();
                $('#PS_wise_list').addClass('form-group hidden');
                $('#PS_wise_due_list_table').removeClass();
                $('#PS_wise_due_list_table').addClass('table-responsive hidden'); 
                $('#branch_wise_due_list_table').removeClass();
                $('#branch_wise_due_list_table').addClass('table-responsive hidden'); 
                $('#agent_wise_due_list_table').removeClass();
                $('#agent_wise_due_list_table').addClass('table-responsive hidden');
                $('#DOC_wise_list_table').removeClass();
                $('#DOC_wise_list_table').addClass('table-responsive hidden');
                $('#no_nominee_wise_list_table').removeClass();
                $('#no_nominee_wise_list_table').addClass('table-responsive hidden');
                $('#medical_client_wise_list').removeClass();
                $('#medical_client_wise_list').addClass('form-group hidden');
                $('#medical_wise_list_table').removeClass();
                $('#medical_wise_list_table').addClass('table-responsive hidden');
                $('#FAMILY_CASH_LIST').removeClass();
                $('#FAMILY_CASH_LIST').addClass('form-group hidden');
                $('#family_cash_wise_list_table').removeClass();
                $('#family_cash_wise_list_table').addClass('table-responsive hidden');
                $('#SB_due_wise_list_table').removeClass();
                $('#SB_due_wise_list_table').addClass('table-responsive hidden'); 
                $('#family_ac_wise_list').removeClass();
                $('#family_ac_wise_list').addClass('form-group hidden');
                $('#family_ac_wise_list_table').removeClass();
                $('#family_ac_wise_list_table').addClass('table-responsive hidden');
                 $('#family_birthday_wise_list_table').removeClass();
                $('#family_birthday_wise_list_table').addClass('form-group hidden');
                $('#client_address_wise_list_table').removeClass();
                $('#client_address_wise_list_table').addClass('form-group hidden');
                $('#client_surname_wise_list_table').removeClass();
                $('#client_surname_wise_list_table').addClass('form-group hidden');
                $('#client_cash_wise_list_table').removeClass();
                $('#client_cash_wise_list_table').addClass('form-group hidden');
                $('#client_cash_wise_list').removeClass();
                $('#client_cash_wise_list').addClass('form-group hidden');
                $('#client_surname_wise_list').removeClass();
                $('#client_surname_wise_list').addClass('form-group hidden');
                $('#family_DOB_wise_list').removeClass();
                $('#family_DOB_wise_list').addClass('form-group hidden');
            }else if(report_for == 14){
                $('#SB_DUE_wise_list').removeClass();
                $('#SB_DUE_wise_list').addClass('form-group hidden');
                $('#document_wise_list').removeClass();
                $('#document_wise_list').addClass('form-group hidden');
                $('#family_ac_office_wise_list').removeClass();
                $('#family_ac_office_wise_list').addClass('form-group hidden');
                $('#family_ac_office_wise_list_table').removeClass();
                $('#family_ac_office_wise_list_table').addClass('table-responsive hidden');  
                $('#family_loan_wise_list').removeClass();
                $('#family_loan_wise_list').addClass('form-group hidden');
                $('#family_loan_wise_list_table').removeClass();
                $('#family_loan_wise_list_table').addClass('table-responsive hidden');
                $('#family_pension_wise_list').removeClass();
                $('#family_pension_wise_list').addClass('form-group hidden');
                $('#family_pension_wise_list_table').removeClass();
                $('#family_pension_wise_list_table').addClass('table-responsive hidden');
                $('#branch_wise_due_list_table').removeClass();
                $('#branch_wise_due_list_table').addClass('table-responsive');
                $('#family_ac_wise_due_list').removeClass();
                $('#family_ac_wise_due_list').addClass('form-group hidden');  
                $('#family_ac_wise_due_list_table').removeClass();
                $('#family_ac_wise_due_list_table').addClass('table-responsive hidden');               
                $('#monthly_wise_due_list').removeClass();
                $('#monthly_wise_due_list').addClass('form-group hidden');
                $('#monthly_wise_due_list_table').removeClass();
                $('#monthly_wise_due_list_table').addClass('table-responsive hidden');
                $('#policy_number_wise_list_table').removeClass();
                $('#policy_number_wise_list_table').addClass('table-responsive hidden'); 
                $('#surname_wise_list_table').removeClass();
                $('#surname_wise_list_table').addClass('table-responsive hidden');
                $('#document_wise_list_table').removeClass();
                $('#document_wise_list_table').addClass('form-group hidden');
                $('#sex_wise_list').removeClass();
                $('#sex_wise_list').addClass('form-group hidden');
                $('#sex_wise_list_table').removeClass();
                $('#sex_wise_list_table').addClass('table-responsive hidden');
                $('#DOB_wise_list_table').removeClass();
                $('#DOB_wise_list_table').addClass('table-responsive hidden'); 
                $('#PTP_wise_list_table').removeClass();
                $('#PTP_wise_list_table').addClass('table-responsive hidden');
                $('#MOP_wise_list').removeClass();
                $('#MOP_wise_list').addClass('form-group hidden');
                $('#MOP_wise_due_list_table').removeClass();
                $('#MOP_wise_due_list_table').addClass('table-responsive hidden');
                $('#PS_wise_list').removeClass();
                $('#PS_wise_list').addClass('form-group hidden');
                $('#PS_wise_due_list_table').removeClass();
                $('#PS_wise_due_list_table').addClass('table-responsive hidden');
                $('#agent_wise_due_list_table').removeClass();
                $('#agent_wise_due_list_table').addClass('table-responsive hidden');
                $('#DOC_wise_list_table').removeClass();
                $('#DOC_wise_list_table').addClass('table-responsive hidden');
                $('#no_nominee_wise_list_table').removeClass();
                $('#no_nominee_wise_list_table').addClass('table-responsive hidden');
                $('#medical_client_wise_list').removeClass();
                $('#medical_client_wise_list').addClass('form-group hidden');
                $('#medical_wise_list_table').removeClass();
                $('#medical_wise_list_table').addClass('table-responsive hidden');
                $('#FAMILY_CASH_LIST').removeClass();
                $('#FAMILY_CASH_LIST').addClass('form-group hidden');
                $('#family_cash_wise_list_table').removeClass();
                $('#family_cash_wise_list_table').addClass('table-responsive hidden');
                $('#SB_due_wise_list_table').removeClass();
                $('#SB_due_wise_list_table').addClass('table-responsive hidden'); 
                $('#report_end_date').removeClass();
                $('#report_start_date').removeClass();
                $('#report_start_date').addClass('col-sm-3 hidden');
                $('#report_end_date').addClass('col-sm-3 hidden');
                $('#family_ac_wise_list').removeClass();
                $('#family_ac_wise_list').addClass('form-group hidden');
                $('#family_ac_wise_list_table').removeClass();
                $('#family_ac_wise_list_table').addClass('table-responsive hidden');
                 $('#family_birthday_wise_list_table').removeClass();
                $('#family_birthday_wise_list_table').addClass('form-group hidden');
                $('#client_address_wise_list_table').removeClass();
                $('#client_address_wise_list_table').addClass('form-group hidden');
                $('#client_surname_wise_list_table').removeClass();
                $('#client_surname_wise_list_table').addClass('form-group hidden');
                $('#client_cash_wise_list_table').removeClass();
                $('#client_cash_wise_list_table').addClass('form-group hidden');
                $('#client_cash_wise_list').removeClass();
                $('#client_cash_wise_list').addClass('form-group hidden');
                $('#client_surname_wise_list').removeClass();
                $('#client_surname_wise_list').addClass('form-group hidden');
                $('#family_DOB_wise_list').removeClass();
                $('#family_DOB_wise_list').addClass('form-group hidden');
                 $.post('<?=site_url('Admin/report_branch_wise')?>',{},function(data){
                    console.log(data);
                    branch_wise_report.clear();
                    $.each(data,function(k,v){
                        branch_wise_report.row.add(v);
                    })
                    branch_wise_report.draw();
                },'json');
            }else if(report_for == 15){
                $('#SB_DUE_wise_list').removeClass();
                $('#SB_DUE_wise_list').addClass('form-group hidden');
                $('#document_wise_list').removeClass();
                $('#document_wise_list').addClass('form-group hidden');
                $('#family_ac_office_wise_list').removeClass();
                $('#family_ac_office_wise_list').addClass('form-group hidden');
                $('#family_ac_office_wise_list_table').removeClass();
                $('#family_ac_office_wise_list_table').addClass('table-responsive hidden');  
                $('#agent_wise_due_list_table').removeClass();
                $('#agent_wise_due_list_table').addClass('table-responsive');
                $('#branch_wise_due_list_table').removeClass();
                $('#branch_wise_due_list_table').addClass('table-responsive hidden');
                $('#family_ac_wise_due_list').removeClass();
                $('#family_ac_wise_due_list').addClass('form-group hidden');  
                $('#family_ac_wise_due_list_table').removeClass();
                $('#family_ac_wise_due_list_table').addClass('table-responsive hidden');               
                $('#monthly_wise_due_list').removeClass();
                $('#monthly_wise_due_list').addClass('form-group hidden');
                $('#monthly_wise_due_list_table').removeClass();
                $('#monthly_wise_due_list_table').addClass('table-responsive hidden');
                $('#policy_number_wise_list_table').removeClass();
                $('#policy_number_wise_list_table').addClass('table-responsive hidden'); 
                $('#surname_wise_list_table').removeClass();
                $('#surname_wise_list_table').addClass('table-responsive hidden');
                $('#sex_wise_list').removeClass();
                $('#sex_wise_list').addClass('form-group hidden');
                $('#sex_wise_list_table').removeClass();
                $('#sex_wise_list_table').addClass('table-responsive hidden');
                $('#DOB_wise_list_table').removeClass();
                $('#DOB_wise_list_table').addClass('table-responsive hidden'); 
                $('#PTP_wise_list_table').removeClass();
                $('#PTP_wise_list_table').addClass('table-responsive hidden');
                $('#MOP_wise_list').removeClass();
                $('#MOP_wise_list').addClass('form-group hidden');
                $('#MOP_wise_due_list_table').removeClass();
                $('#MOP_wise_due_list_table').addClass('table-responsive hidden');
                $('#PS_wise_list').removeClass();
                $('#PS_wise_list').addClass('form-group hidden');
                $('#PS_wise_due_list_table').removeClass();
                $('#PS_wise_due_list_table').addClass('table-responsive hidden');
                $('#DOC_wise_list_table').removeClass();
                $('#DOC_wise_list_table').addClass('table-responsive hidden');
                $('#no_nominee_wise_list_table').removeClass();
                $('#no_nominee_wise_list_table').addClass('table-responsive hidden');
                $('#medical_client_wise_list').removeClass();
                $('#medical_client_wise_list').addClass('form-group hidden');
                $('#medical_wise_list_table').removeClass();
                $('#medical_wise_list_table').addClass('table-responsive hidden');
                $('#FAMILY_CASH_LIST').removeClass();
                $('#FAMILY_CASH_LIST').addClass('form-group hidden');
                $('#family_cash_wise_list_table').removeClass();
                $('#family_cash_wise_list_table').addClass('table-responsive hidden');
                $('#SB_due_wise_list_table').removeClass();
                $('#SB_due_wise_list_table').addClass('table-responsive hidden'); 
                 $('#report_end_date').removeClass();
                $('#report_start_date').removeClass();
                $('#report_start_date').addClass('col-sm-3 hidden');
                $('#report_end_date').addClass('col-sm-3 hidden');
                $('#family_ac_wise_list').removeClass();
                $('#family_ac_wise_list').addClass('form-group hidden');
                $('#family_ac_wise_list_table').removeClass();
                $('#family_ac_wise_list_table').addClass('table-responsive hidden');
                 $('#family_birthday_wise_list_table').removeClass();
                $('#family_birthday_wise_list_table').addClass('form-group hidden');
                $('#client_address_wise_list_table').removeClass();
                $('#client_address_wise_list_table').addClass('form-group hidden');
                $('#client_surname_wise_list_table').removeClass();
                $('#client_surname_wise_list_table').addClass('form-group hidden');
                $('#client_cash_wise_list_table').removeClass();
                $('#client_cash_wise_list_table').addClass('form-group hidden');
                $('#client_cash_wise_list').removeClass();
                $('#client_cash_wise_list').addClass('form-group hidden');
                $('#client_surname_wise_list').removeClass();
                $('#client_surname_wise_list').addClass('form-group hidden');
                $('#family_DOB_wise_list').removeClass();
                $('#family_DOB_wise_list').addClass('form-group hidden');
                $('#document_wise_list_table').removeClass();
                $('#document_wise_list_table').addClass('form-group hidden');
                 $('#family_loan_wise_list').removeClass();
                $('#family_loan_wise_list').addClass('form-group hidden');
                $('#family_loan_wise_list_table').removeClass();
                $('#family_loan_wise_list_table').addClass('table-responsive hidden');
                $('#family_pension_wise_list').removeClass();
                $('#family_pension_wise_list').addClass('form-group hidden');
                $('#family_pension_wise_list_table').removeClass();
                $('#family_pension_wise_list_table').addClass('table-responsive hidden');
                $.post('<?=site_url('Admin/report_agent_wise')?>',{},function(data){
                    console.log(data);
                    agent_wise_report.clear();
                    $.each(data,function(k,v){
                        agent_wise_report.row.add(v);
                    })
                    agent_wise_report.draw();
                },'json');
            }else if(report_for == 16){
                $('#SB_DUE_wise_list').removeClass();
                $('#SB_DUE_wise_list').addClass('form-group hidden');
                $('#document_wise_list').removeClass();
                $('#document_wise_list').addClass('form-group hidden');
                $('#family_ac_office_wise_list').removeClass();
                $('#family_ac_office_wise_list').addClass('form-group hidden');
                $('#family_ac_office_wise_list_table').removeClass();
                $('#family_ac_office_wise_list_table').addClass('table-responsive hidden');  
                $('#DOC_wise_list_table').removeClass();
                $('#DOC_wise_list_table').addClass('table-responsive'); 
                $('#agent_wise_due_list_table').removeClass();
                $('#agent_wise_due_list_table').addClass('table-responsive hidden');
                $('#branch_wise_due_list_table').removeClass();
                $('#branch_wise_due_list_table').addClass('table-responsive hidden');
                $('#family_ac_wise_due_list').removeClass();
                $('#family_ac_wise_due_list').addClass('form-group hidden');  
                $('#family_ac_wise_due_list_table').removeClass();
                $('#family_ac_wise_due_list_table').addClass('table-responsive hidden');               
                $('#monthly_wise_due_list').removeClass();
                $('#monthly_wise_due_list').addClass('form-group hidden');
                $('#monthly_wise_due_list_table').removeClass();
                $('#monthly_wise_due_list_table').addClass('table-responsive hidden');
                $('#policy_number_wise_list_table').removeClass();
                $('#policy_number_wise_list_table').addClass('table-responsive hidden'); 
                $('#surname_wise_list_table').removeClass();
                $('#surname_wise_list_table').addClass('table-responsive hidden');
                $('#sex_wise_list').removeClass();
                $('#sex_wise_list').addClass('form-group hidden');
                $('#sex_wise_list_table').removeClass();
                $('#sex_wise_list_table').addClass('table-responsive hidden');
                $('#DOB_wise_list_table').removeClass();
                $('#DOB_wise_list_table').addClass('table-responsive hidden'); 
                $('#PTP_wise_list_table').removeClass();
                $('#PTP_wise_list_table').addClass('table-responsive hidden');
                $('#MOP_wise_list').removeClass();
                $('#MOP_wise_list').addClass('form-group hidden');
                $('#MOP_wise_due_list_table').removeClass();
                $('#MOP_wise_due_list_table').addClass('table-responsive hidden');
                $('#PS_wise_list').removeClass();
                $('#PS_wise_list').addClass('form-group hidden');
                $('#PS_wise_due_list_table').removeClass();
                $('#PS_wise_due_list_table').addClass('table-responsive hidden');
                $('#no_nominee_wise_list_table').removeClass();
                $('#no_nominee_wise_list_table').addClass('table-responsive hidden');
                $('#medical_client_wise_list').removeClass();
                $('#medical_client_wise_list').addClass('form-group hidden');
                $('#medical_wise_list_table').removeClass();
                $('#medical_wise_list_table').addClass('table-responsive hidden');
                $('#FAMILY_CASH_LIST').removeClass();
                $('#FAMILY_CASH_LIST').addClass('form-group hidden');
                $('#family_cash_wise_list_table').removeClass();
                $('#family_cash_wise_list_table').addClass('table-responsive hidden');
                $('#SB_due_wise_list_table').removeClass();
                $('#SB_due_wise_list_table').addClass('table-responsive hidden'); 
                $('#report_end_date').removeClass();
                $('#report_start_date').removeClass();
                $('#report_start_date').addClass('col-sm-3 hidden');
                $('#report_end_date').addClass('col-sm-3 hidden');
                $('#family_ac_wise_list').removeClass();
                $('#family_ac_wise_list').addClass('form-group hidden');
                $('#family_ac_wise_list_table').removeClass();
                $('#family_ac_wise_list_table').addClass('table-responsive hidden');
                 $('#family_birthday_wise_list_table').removeClass();
                $('#family_birthday_wise_list_table').addClass('form-group hidden');
                $('#client_address_wise_list_table').removeClass();
                $('#client_address_wise_list_table').addClass('form-group hidden');
                $('#client_surname_wise_list_table').removeClass();
                $('#client_surname_wise_list_table').addClass('form-group hidden');
                $('#client_cash_wise_list_table').removeClass();
                $('#client_cash_wise_list_table').addClass('form-group hidden');
                $('#client_cash_wise_list').removeClass();
                $('#client_cash_wise_list').addClass('form-group hidden');
                $('#client_surname_wise_list').removeClass();
                $('#client_surname_wise_list').addClass('form-group hidden');
                $('#family_DOB_wise_list').removeClass();
                $('#family_DOB_wise_list').addClass('form-group hidden');
                $('#document_wise_list_table').removeClass();
                $('#document_wise_list_table').addClass('form-group hidden');
                 $('#family_loan_wise_list').removeClass();
                $('#family_loan_wise_list').addClass('form-group hidden');
                $('#family_loan_wise_list_table').removeClass();
                $('#family_loan_wise_list_table').addClass('table-responsive hidden');
                $('#family_pension_wise_list').removeClass();
                $('#family_pension_wise_list').addClass('form-group hidden');
                $('#family_pension_wise_list_table').removeClass();
                $('#family_pension_wise_list_table').addClass('table-responsive hidden');
                 $.post('<?=site_url('Admin/report_DOC_wise')?>',{},function(data){
                    console.log(data);
                    DOC_wise_report.clear();
                    $.each(data,function(k,v){
                        DOC_wise_report.row.add(v);
                    })
                    DOC_wise_report.draw();
                },'json');
            }else if(report_for == 17){
                $('#SB_DUE_wise_list').removeClass();
                $('#SB_DUE_wise_list').addClass('form-group hidden');
                $('#document_wise_list').removeClass();
                $('#document_wise_list').addClass('form-group hidden');
                $('#family_ac_office_wise_list').removeClass();
                $('#family_ac_office_wise_list').addClass('form-group hidden');
                $('#family_ac_office_wise_list_table').removeClass();
                $('#family_ac_office_wise_list_table').addClass('table-responsive hidden');  
                $('#no_nominee_wise_list_table').removeClass();
                $('#no_nominee_wise_list_table').addClass('table-responsive');
                $('#DOC_wise_list_table').removeClass();
                $('#DOC_wise_list_table').addClass('table-responsive hidden'); 
                $('#agent_wise_due_list_table').removeClass();
                $('#agent_wise_due_list_table').addClass('table-responsive hidden');
                $('#branch_wise_due_list_table').removeClass();
                $('#branch_wise_due_list_table').addClass('table-responsive hidden');
                $('#family_ac_wise_due_list').removeClass();
                $('#family_ac_wise_due_list').addClass('form-group hidden');  
                $('#family_ac_wise_due_list_table').removeClass();
                $('#family_ac_wise_due_list_table').addClass('table-responsive hidden');               
                $('#monthly_wise_due_list').removeClass();
                $('#monthly_wise_due_list').addClass('form-group hidden');
                $('#monthly_wise_due_list_table').removeClass();
                $('#monthly_wise_due_list_table').addClass('table-responsive hidden');
                $('#policy_number_wise_list_table').removeClass();
                $('#policy_number_wise_list_table').addClass('table-responsive hidden'); 
                $('#surname_wise_list_table').removeClass();
                $('#surname_wise_list_table').addClass('table-responsive hidden');
                $('#sex_wise_list').removeClass();
                $('#sex_wise_list').addClass('form-group hidden');
                $('#sex_wise_list_table').removeClass();
                $('#sex_wise_list_table').addClass('table-responsive hidden');
                $('#DOB_wise_list_table').removeClass();
                $('#DOB_wise_list_table').addClass('table-responsive hidden'); 
                $('#PTP_wise_list_table').removeClass();
                $('#PTP_wise_list_table').addClass('table-responsive hidden');
                $('#MOP_wise_list').removeClass();
                $('#MOP_wise_list').addClass('form-group hidden');
                $('#MOP_wise_due_list_table').removeClass();
                $('#MOP_wise_due_list_table').addClass('table-responsive hidden');
                $('#PS_wise_list').removeClass();
                $('#PS_wise_list').addClass('form-group hidden');
                $('#PS_wise_due_list_table').removeClass();
                $('#PS_wise_due_list_table').addClass('table-responsive hidden');
                $('#medical_client_wise_list').removeClass();
                $('#medical_client_wise_list').addClass('form-group hidden');
                $('#medical_wise_list_table').removeClass();
                $('#medical_wise_list_table').addClass('table-responsive hidden');
                $('#FAMILY_CASH_LIST').removeClass();
                $('#FAMILY_CASH_LIST').addClass('form-group hidden');
                $('#family_cash_wise_list_table').removeClass();
                $('#family_cash_wise_list_table').addClass('table-responsive hidden');
                $('#SB_due_wise_list_table').removeClass();
                $('#SB_due_wise_list_table').addClass('table-responsive hidden'); 
                 $('#report_end_date').removeClass();
                $('#report_start_date').removeClass();
                $('#report_start_date').addClass('col-sm-3 hidden');
                $('#report_end_date').addClass('col-sm-3 hidden');
                $('#family_ac_wise_list').removeClass();
                $('#family_ac_wise_list').addClass('form-group hidden');
                $('#family_ac_wise_list_table').removeClass();
                $('#family_ac_wise_list_table').addClass('table-responsive hidden');
                 $('#family_birthday_wise_list_table').removeClass();
                $('#family_birthday_wise_list_table').addClass('form-group hidden');
                $('#client_address_wise_list_table').removeClass();
                $('#client_address_wise_list_table').addClass('form-group hidden');
                $('#client_surname_wise_list_table').removeClass();
                $('#client_surname_wise_list_table').addClass('form-group hidden');
                $('#client_cash_wise_list_table').removeClass();
                $('#client_cash_wise_list_table').addClass('form-group hidden');
                $('#client_cash_wise_list').removeClass();
                $('#client_cash_wise_list').addClass('form-group hidden');
                $('#client_surname_wise_list').removeClass();
                $('#client_surname_wise_list').addClass('form-group hidden');
                $('#family_DOB_wise_list').removeClass();
                $('#family_DOB_wise_list').addClass('form-group hidden');
                $('#document_wise_list_table').removeClass();
                $('#document_wise_list_table').addClass('form-group hidden');
                 $('#family_loan_wise_list').removeClass();
                $('#family_loan_wise_list').addClass('form-group hidden');
                $('#family_loan_wise_list_table').removeClass();
                $('#family_loan_wise_list_table').addClass('table-responsive hidden');
                $('#family_pension_wise_list').removeClass();
                $('#family_pension_wise_list').addClass('form-group hidden');
                $('#family_pension_wise_list_table').removeClass();
                $('#family_pension_wise_list_table').addClass('table-responsive hidden');
                $.post('<?=site_url('Admin/report_with_no_nominee_wise')?>',{},function(data){
                    console.log(data);
                    no_nominee_wise_report.clear();
                    $.each(data,function(k,v){
                        no_nominee_wise_report.row.add(v);
                    })
                    no_nominee_wise_report.draw();
                },'json');
            }else if(report_for == 18){
                $('#SB_DUE_wise_list').removeClass();
                $('#SB_DUE_wise_list').addClass('form-group hidden');
                $('#document_wise_list').removeClass();
                $('#document_wise_list').addClass('form-group hidden');
                $('#family_ac_office_wise_list').removeClass();
                $('#family_ac_office_wise_list').addClass('form-group hidden');
                $('#family_ac_office_wise_list_table').removeClass();
                $('#family_ac_office_wise_list_table').addClass('table-responsive hidden');  
                $('#FAMILY_CASH_LIST').removeClass();
                $('#FAMILY_CASH_LIST').addClass('form-group');
                $('#report_end_date').removeClass();
                $('#report_start_date').removeClass();
                $('#report_start_date').addClass('col-sm-3');
                $('#report_end_date').addClass('col-sm-3');
                $('#family_cash_wise_list_table').removeClass();
                $('#family_cash_wise_list_table').addClass('table-responsive'); 
                $('#medical_client_wise_list').removeClass();
                $('#medical_client_wise_list').addClass('form-group hidden');
                $('#medical_wise_list_table').removeClass();
                $('#medical_wise_list_table').addClass('table-responsive hidden'); 
                $('#monthly_wise_due_list').removeClass();
                $('#monthly_wise_due_list').addClass('form-group hidden');
                $('#monthly_wise_due_list_table').removeClass();
                $('#monthly_wise_due_list_table').addClass('table-responsive hidden');  
                $('#family_ac_wise_due_list').removeClass();
                $('#family_ac_wise_due_list').addClass('form-group hidden');  
                $('#family_ac_wise_due_list_table').removeClass();
                $('#family_ac_wise_due_list_table').addClass('table-responsive hidden'); 
                $('#policy_number_wise_list_table').removeClass();
                $('#policy_number_wise_list_table').addClass('table-responsive hidden'); 
                $('#surname_wise_list_table').removeClass();
                $('#surname_wise_list_table').addClass('table-responsive hidden');
                $('#sex_wise_list').removeClass();
                $('#sex_wise_list').addClass('form-group hidden');
                $('#sex_wise_list_table').removeClass();
                $('#sex_wise_list_table').addClass('table-responsive hidden');
                $('#DOB_wise_list_table').removeClass();
                $('#DOB_wise_list_table').addClass('table-responsive hidden'); 
                $('#PTP_wise_list_table').removeClass();
                $('#PTP_wise_list_table').addClass('table-responsive hidden'); 
                $('#MOP_wise_list').removeClass();
                $('#MOP_wise_list').addClass('form-group hidden');
                $('#MOP_wise_due_list_table').removeClass();
                $('#MOP_wise_due_list_table').addClass('table-responsive hidden');
                $('#PS_wise_list').removeClass();
                $('#PS_wise_list').addClass('form-group hidden');
                $('#PS_wise_due_list_table').removeClass();
                $('#PS_wise_due_list_table').addClass('table-responsive hidden'); 
                $('#branch_wise_due_list_table').removeClass();
                $('#branch_wise_due_list_table').addClass('table-responsive hidden');
                $('#agent_wise_due_list_table').removeClass();
                $('#agent_wise_due_list_table').addClass('table-responsive hidden');
                $('#DOC_wise_list_table').removeClass();
                $('#DOC_wise_list_table').addClass('table-responsive hidden');
                $('#no_nominee_wise_list_table').removeClass();
                $('#no_nominee_wise_list_table').addClass('table-responsive hidden');
                $('#SB_due_wise_list_table').removeClass();
                $('#SB_due_wise_list_table').addClass('table-responsive hidden'); 
                $('#report_end_date').removeClass();
                $('#report_start_date').removeClass();
                $('#report_start_date').addClass('col-sm-3 hidden');
                $('#report_end_date').addClass('col-sm-3 hidden');
                $('#family_ac_wise_list').removeClass();
                $('#family_ac_wise_list').addClass('form-group hidden');
                $('#family_ac_wise_list_table').removeClass();
                $('#family_ac_wise_list_table').addClass('table-responsive hidden');
                 $('#family_birthday_wise_list_table').removeClass();
                $('#family_birthday_wise_list_table').addClass('form-group hidden');
                $('#client_address_wise_list_table').removeClass();
                $('#client_address_wise_list_table').addClass('form-group hidden');
                $('#client_surname_wise_list_table').removeClass();
                $('#client_surname_wise_list_table').addClass('form-group hidden');
                $('#client_cash_wise_list_table').removeClass();
                $('#client_cash_wise_list_table').addClass('form-group hidden');
                $('#client_cash_wise_list').removeClass();
                $('#client_cash_wise_list').addClass('form-group hidden');
                $('#client_surname_wise_list').removeClass();
                $('#client_surname_wise_list').addClass('form-group hidden');
                $('#family_DOB_wise_list').removeClass();
                $('#family_DOB_wise_list').addClass('form-group hidden');
                $('#document_wise_list_table').removeClass();
                $('#document_wise_list_table').addClass('form-group hidden');
                 $('#family_loan_wise_list').removeClass();
                $('#family_loan_wise_list').addClass('form-group hidden');
                $('#family_loan_wise_list_table').removeClass();
                $('#family_loan_wise_list_table').addClass('table-responsive hidden');
                $('#family_pension_wise_list').removeClass();
                $('#family_pension_wise_list').addClass('form-group hidden');
                $('#family_pension_wise_list_table').removeClass();
                $('#family_pension_wise_list_table').addClass('table-responsive hidden');
            }else if(report_for == 19){
                $('#SB_DUE_wise_list').removeClass();
                $('#SB_DUE_wise_list').addClass('form-group hidden');
                $('#document_wise_list').removeClass();
                $('#document_wise_list').addClass('form-group hidden');
                $('#family_ac_office_wise_list').removeClass();
                $('#family_ac_office_wise_list').addClass('form-group hidden');
                $('#family_ac_office_wise_list_table').removeClass();
                $('#family_ac_office_wise_list_table').addClass('table-responsive hidden');  
                $('#client_cash_wise_list_table').removeClass();
                $('#client_cash_wise_list_table').addClass('table-responsive');
                $('#client_cash_wise_list').removeClass();
                $('#client_cash_wise_list').addClass('form-group');
                $('#client_surname_wise_list_table').removeClass();
                $('#client_surname_wise_list_table').addClass('form-group hidden');
                $('#client_address_wise_list_table').removeClass();
                $('#client_address_wise_list_table').addClass('form-group hidden');
                $('#family_birthday_wise_list_table').removeClass();
                $('#family_birthday_wise_list_table').addClass('form-group hidden');
                $('#FAMILY_CASH_LIST').removeClass();
                $('#FAMILY_CASH_LIST').addClass('form-group hidden');
                $('#report_end_date').removeClass();
                $('#report_start_date').removeClass();
                $('#report_start_date').addClass('col-sm-3 hidden');
                $('#report_end_date').addClass('col-sm-3 hidden');
                $('#family_cash_wise_list_table').removeClass();
                $('#family_cash_wise_list_table').addClass('table-responsive hidden'); 
                $('#medical_client_wise_list').removeClass();
                $('#medical_client_wise_list').addClass('form-group hidden');
                $('#medical_wise_list_table').removeClass();
                $('#medical_wise_list_table').addClass('table-responsive hidden'); 
                $('#monthly_wise_due_list').removeClass();
                $('#monthly_wise_due_list').addClass('form-group hidden');
                $('#monthly_wise_due_list_table').removeClass();
                $('#monthly_wise_due_list_table').addClass('table-responsive hidden');  
                $('#family_ac_wise_due_list').removeClass();
                $('#family_ac_wise_due_list').addClass('form-group hidden');  
                $('#family_ac_wise_due_list_table').removeClass();
                $('#family_ac_wise_due_list_table').addClass('table-responsive hidden'); 
                $('#policy_number_wise_list_table').removeClass();
                $('#policy_number_wise_list_table').addClass('table-responsive hidden'); 
                $('#surname_wise_list_table').removeClass();
                $('#surname_wise_list_table').addClass('table-responsive hidden');
                $('#sex_wise_list').removeClass();
                $('#sex_wise_list').addClass('form-group hidden');
                $('#sex_wise_list_table').removeClass();
                $('#sex_wise_list_table').addClass('table-responsive hidden');
                $('#DOB_wise_list_table').removeClass();
                $('#DOB_wise_list_table').addClass('table-responsive hidden'); 
                $('#PTP_wise_list_table').removeClass();
                $('#PTP_wise_list_table').addClass('table-responsive hidden'); 
                $('#MOP_wise_list').removeClass();
                $('#MOP_wise_list').addClass('form-group hidden');
                $('#MOP_wise_due_list_table').removeClass();
                $('#MOP_wise_due_list_table').addClass('table-responsive hidden');
                $('#PS_wise_list').removeClass();
                $('#PS_wise_list').addClass('form-group hidden');
                $('#PS_wise_due_list_table').removeClass();
                $('#PS_wise_due_list_table').addClass('table-responsive hidden'); 
                $('#branch_wise_due_list_table').removeClass();
                $('#branch_wise_due_list_table').addClass('table-responsive hidden');
                $('#agent_wise_due_list_table').removeClass();
                $('#agent_wise_due_list_table').addClass('table-responsive hidden');
                $('#DOC_wise_list_table').removeClass();
                $('#DOC_wise_list_table').addClass('table-responsive hidden');
                $('#no_nominee_wise_list_table').removeClass();
                $('#no_nominee_wise_list_table').addClass('table-responsive hidden');
                $('#SB_due_wise_list_table').removeClass();
                $('#SB_due_wise_list_table').addClass('table-responsive hidden'); 
                $('#report_end_date').removeClass();
                $('#report_start_date').removeClass();
                $('#report_start_date').addClass('col-sm-3 hidden');
                $('#report_end_date').addClass('col-sm-3 hidden');
                $('#family_ac_wise_list').removeClass();
                $('#family_ac_wise_list').addClass('form-group hidden');
                $('#family_ac_wise_list_table').removeClass();
                $('#family_ac_wise_list_table').addClass('table-responsive hidden');
                $('#client_surname_wise_list').removeClass();
                $('#client_surname_wise_list').addClass('form-group hidden');
                $('#family_DOB_wise_list').removeClass();
                $('#family_DOB_wise_list').addClass('form-group hidden');
                $('#document_wise_list_table').removeClass();
                $('#document_wise_list_table').addClass('form-group hidden');
                 $('#family_loan_wise_list').removeClass();
                $('#family_loan_wise_list').addClass('form-group hidden');
                $('#family_loan_wise_list_table').removeClass();
                $('#family_loan_wise_list_table').addClass('table-responsive hidden');
                $('#family_pension_wise_list').removeClass();
                $('#family_pension_wise_list').addClass('form-group hidden');
                $('#family_pension_wise_list_table').removeClass();
                $('#family_pension_wise_list_table').addClass('table-responsive hidden');
            }else if(report_for == 20){
                $('#SB_DUE_wise_list').removeClass();
                $('#SB_DUE_wise_list').addClass('form-group hidden');
                $('#document_wise_list').removeClass();
                $('#document_wise_list').addClass('form-group hidden');
                $('#family_ac_office_wise_list').removeClass();
                $('#family_ac_office_wise_list').addClass('form-group hidden');
                $('#family_ac_office_wise_list_table').removeClass();
                $('#family_ac_office_wise_list_table').addClass('table-responsive hidden');  
                $('#client_surname_wise_list_table').removeClass();
                $('#client_surname_wise_list_table').addClass('table-responsive');
                $('#client_surname_wise_list').removeClass();
                $('#client_surname_wise_list').addClass('form-group');
                $('#client_cash_wise_list').removeClass();
                $('#client_cash_wise_list').addClass('form-group hidden');
                $('#client_cash_wise_list_table').removeClass();
                $('#client_cash_wise_list_table').addClass('form-group hidden');
                $('#client_address_wise_list_table').removeClass();
                $('#client_address_wise_list_table').addClass('form-group hidden');
                $('#family_birthday_wise_list_table').removeClass();
                $('#family_birthday_wise_list_table').addClass('form-group hidden');
                $('#FAMILY_CASH_LIST').removeClass();
                $('#FAMILY_CASH_LIST').addClass('form-group hidden');
                $('#report_end_date').removeClass();
                $('#report_start_date').removeClass();
                $('#report_start_date').addClass('col-sm-3 hidden');
                $('#report_end_date').addClass('col-sm-3 hidden');
                $('#family_cash_wise_list_table').removeClass();
                $('#family_cash_wise_list_table').addClass('table-responsive hidden'); 
                $('#medical_client_wise_list').removeClass();
                $('#medical_client_wise_list').addClass('form-group hidden');
                $('#medical_wise_list_table').removeClass();
                $('#medical_wise_list_table').addClass('table-responsive hidden'); 
                $('#monthly_wise_due_list').removeClass();
                $('#monthly_wise_due_list').addClass('form-group hidden');
                $('#monthly_wise_due_list_table').removeClass();
                $('#monthly_wise_due_list_table').addClass('table-responsive hidden');  
                $('#family_ac_wise_due_list').removeClass();
                $('#family_ac_wise_due_list').addClass('form-group hidden');  
                $('#family_ac_wise_due_list_table').removeClass();
                $('#family_ac_wise_due_list_table').addClass('table-responsive hidden'); 
                $('#policy_number_wise_list_table').removeClass();
                $('#policy_number_wise_list_table').addClass('table-responsive hidden'); 
                $('#surname_wise_list_table').removeClass();
                $('#surname_wise_list_table').addClass('table-responsive hidden');
                $('#sex_wise_list').removeClass();
                $('#sex_wise_list').addClass('form-group hidden');
                $('#sex_wise_list_table').removeClass();
                $('#sex_wise_list_table').addClass('table-responsive hidden');
                $('#DOB_wise_list_table').removeClass();
                $('#DOB_wise_list_table').addClass('table-responsive hidden'); 
                $('#PTP_wise_list_table').removeClass();
                $('#PTP_wise_list_table').addClass('table-responsive hidden'); 
                $('#MOP_wise_list').removeClass();
                $('#MOP_wise_list').addClass('form-group hidden');
                $('#MOP_wise_due_list_table').removeClass();
                $('#MOP_wise_due_list_table').addClass('table-responsive hidden');
                $('#PS_wise_list').removeClass();
                $('#PS_wise_list').addClass('form-group hidden');
                $('#PS_wise_due_list_table').removeClass();
                $('#PS_wise_due_list_table').addClass('table-responsive hidden'); 
                $('#branch_wise_due_list_table').removeClass();
                $('#branch_wise_due_list_table').addClass('table-responsive hidden');
                $('#agent_wise_due_list_table').removeClass();
                $('#agent_wise_due_list_table').addClass('table-responsive hidden');
                $('#DOC_wise_list_table').removeClass();
                $('#DOC_wise_list_table').addClass('table-responsive hidden');
                $('#no_nominee_wise_list_table').removeClass();
                $('#no_nominee_wise_list_table').addClass('table-responsive hidden');
                $('#SB_due_wise_list_table').removeClass();
                $('#SB_due_wise_list_table').addClass('table-responsive hidden'); 
                $('#report_end_date').removeClass();
                $('#report_start_date').removeClass();
                $('#report_start_date').addClass('col-sm-3 hidden');
                $('#report_end_date').addClass('col-sm-3 hidden');
                $('#family_ac_wise_list').removeClass();
                $('#family_ac_wise_list').addClass('form-group hidden');
                $('#family_ac_wise_list_table').removeClass();
                $('#family_ac_wise_list_table').addClass('table-responsive hidden');
                $('#client_cash_wise_list').removeClass();
                $('#client_cash_wise_list').addClass('form-group hidden');
                $('#family_DOB_wise_list').removeClass();
                $('#family_DOB_wise_list').addClass('form-group hidden');
                $('#document_wise_list_table').removeClass();
                $('#document_wise_list_table').addClass('form-group hidden');
                 $('#family_loan_wise_list').removeClass();
                $('#family_loan_wise_list').addClass('form-group hidden');
                $('#family_loan_wise_list_table').removeClass();
                $('#family_loan_wise_list_table').addClass('table-responsive hidden');
                $('#family_pension_wise_list').removeClass();
                $('#family_pension_wise_list').addClass('form-group hidden');
                $('#family_pension_wise_list_table').removeClass();
                $('#family_pension_wise_list_table').addClass('table-responsive hidden');
            }else if(report_for == 21){
                $('#SB_DUE_wise_list').removeClass();
                $('#SB_DUE_wise_list').addClass('form-group hidden');
                $('#document_wise_list').removeClass();
                $('#document_wise_list').addClass('form-group hidden');
                $('#family_ac_office_wise_list').removeClass();
                $('#family_ac_office_wise_list').addClass('form-group hidden');
                $('#family_ac_office_wise_list_table').removeClass();
                $('#family_ac_office_wise_list_table').addClass('table-responsive hidden');  
                $('#client_address_wise_list_table').removeClass();
                $('#client_address_wise_list_table').addClass('form-group');
                 $('#client_cash_wise_list').removeClass();
                $('#client_cash_wise_list').addClass('form-group hidden');
                $('#client_surname_wise_list_table').removeClass();
                $('#client_surname_wise_list_table').addClass('form-group hidden');
                $('#client_cash_wise_list_table').removeClass();
                $('#client_cash_wise_list_table').addClass('form-group hidden');
                $('#family_birthday_wise_list_table').removeClass();
                $('#family_birthday_wise_list_table').addClass('form-group hidden');
                $('#FAMILY_CASH_LIST').removeClass();
                $('#FAMILY_CASH_LIST').addClass('form-group hidden');
                $('#report_end_date').removeClass();
                $('#report_start_date').removeClass();
                $('#report_start_date').addClass('col-sm-3 hidden');
                $('#report_end_date').addClass('col-sm-3 hidden');
                $('#family_cash_wise_list_table').removeClass();
                $('#family_cash_wise_list_table').addClass('table-responsive hidden'); 
                $('#medical_client_wise_list').removeClass();
                $('#medical_client_wise_list').addClass('form-group hidden');
                $('#medical_wise_list_table').removeClass();
                $('#medical_wise_list_table').addClass('table-responsive hidden'); 
                $('#monthly_wise_due_list').removeClass();
                $('#monthly_wise_due_list').addClass('form-group hidden');
                $('#monthly_wise_due_list_table').removeClass();
                $('#monthly_wise_due_list_table').addClass('table-responsive hidden');  
                $('#family_ac_wise_due_list').removeClass();
                $('#family_ac_wise_due_list').addClass('form-group hidden');  
                $('#family_ac_wise_due_list_table').removeClass();
                $('#family_ac_wise_due_list_table').addClass('table-responsive hidden'); 
                $('#policy_number_wise_list_table').removeClass();
                $('#policy_number_wise_list_table').addClass('table-responsive hidden'); 
                $('#surname_wise_list_table').removeClass();
                $('#surname_wise_list_table').addClass('table-responsive hidden');
                $('#sex_wise_list').removeClass();
                $('#sex_wise_list').addClass('form-group hidden');
                $('#sex_wise_list_table').removeClass();
                $('#sex_wise_list_table').addClass('table-responsive hidden');
                $('#DOB_wise_list_table').removeClass();
                $('#DOB_wise_list_table').addClass('table-responsive hidden'); 
                $('#PTP_wise_list_table').removeClass();
                $('#PTP_wise_list_table').addClass('table-responsive hidden'); 
                $('#MOP_wise_list').removeClass();
                $('#MOP_wise_list').addClass('form-group hidden');
                $('#MOP_wise_due_list_table').removeClass();
                $('#MOP_wise_due_list_table').addClass('table-responsive hidden');
                $('#PS_wise_list').removeClass();
                $('#PS_wise_list').addClass('form-group hidden');
                $('#PS_wise_due_list_table').removeClass();
                $('#PS_wise_due_list_table').addClass('table-responsive hidden'); 
                $('#branch_wise_due_list_table').removeClass();
                $('#branch_wise_due_list_table').addClass('table-responsive hidden');
                $('#agent_wise_due_list_table').removeClass();
                $('#agent_wise_due_list_table').addClass('table-responsive hidden');
                $('#DOC_wise_list_table').removeClass();
                $('#DOC_wise_list_table').addClass('table-responsive hidden');
                $('#no_nominee_wise_list_table').removeClass();
                $('#no_nominee_wise_list_table').addClass('table-responsive hidden');
                $('#SB_due_wise_list_table').removeClass();
                $('#SB_due_wise_list_table').addClass('table-responsive hidden'); 
                $('#report_end_date').removeClass();
                $('#report_start_date').removeClass();
                $('#report_start_date').addClass('col-sm-3 hidden');
                $('#report_end_date').addClass('col-sm-3 hidden');
                $('#family_ac_wise_list').removeClass();
                $('#family_ac_wise_list').addClass('form-group hidden');
                $('#family_ac_wise_list_table').removeClass();
                $('#family_ac_wise_list_table').addClass('table-responsive hidden');
                $('#client_cash_wise_list').removeClass();
                $('#client_cash_wise_list').addClass('form-group hidden');
                $('#client_surname_wise_list').removeClass();
                $('#client_surname_wise_list').addClass('form-group hidden');
                $('#family_DOB_wise_list').removeClass();
                $('#family_DOB_wise_list').addClass('form-group hidden');
                $('#document_wise_list_table').removeClass();
                $('#document_wise_list_table').addClass('form-group hidden');
                 $('#family_loan_wise_list').removeClass();
                $('#family_loan_wise_list').addClass('form-group hidden');
                $('#family_loan_wise_list_table').removeClass();
                $('#family_loan_wise_list_table').addClass('table-responsive hidden');
                $('#family_pension_wise_list').removeClass();
                $('#family_pension_wise_list').addClass('form-group hidden');
                $('#family_pension_wise_list_table').removeClass();
                $('#family_pension_wise_list_table').addClass('table-responsive hidden');
                $.post('<?=site_url('Admin/report_with_client_address_wise')?>',{},function(data){
                    console.log(data);
                    client_address_wise_report.clear();
                    $.each(data,function(k,v){
                        client_address_wise_report.row.add(v);
                    })
                    client_address_wise_report.draw();
                },'json');
            }else if(report_for == 22){
                $('#SB_DUE_wise_list').removeClass();
                $('#SB_DUE_wise_list').addClass('form-group hidden');
                $('#document_wise_list').removeClass();
                $('#document_wise_list').addClass('form-group hidden');
                $('#family_ac_office_wise_list').removeClass();
                $('#family_ac_office_wise_list').addClass('form-group hidden');
                $('#family_ac_office_wise_list_table').removeClass();
                $('#family_ac_office_wise_list_table').addClass('table-responsive hidden');  
                $('#family_birthday_wise_list_table').removeClass();
                $('#family_birthday_wise_list_table').addClass('form-group');
                $('#client_surname_wise_list_table').removeClass();
                $('#client_surname_wise_list_table').addClass('form-group hidden');
                $('#client_cash_wise_list_table').removeClass();
                $('#client_cash_wise_list').removeClass();
                $('#client_cash_wise_list').addClass('form-group hidden');
                $('#client_cash_wise_list_table').addClass('form-group hidden');
                $('#client_address_wise_list_table').removeClass();
                $('#client_address_wise_list_table').addClass('form-group hidden');
                $('#FAMILY_CASH_LIST').removeClass();
                $('#FAMILY_CASH_LIST').addClass('form-group hidden');
                $('#report_end_date').removeClass();
                $('#report_start_date').removeClass();
                $('#report_start_date').addClass('col-sm-3 hidden');
                $('#report_end_date').addClass('col-sm-3 hidden');
                $('#family_cash_wise_list_table').removeClass();
                $('#family_cash_wise_list_table').addClass('table-responsive hidden'); 
                $('#medical_client_wise_list').removeClass();
                $('#medical_client_wise_list').addClass('form-group hidden');
                $('#medical_wise_list_table').removeClass();
                $('#medical_wise_list_table').addClass('table-responsive hidden'); 
                $('#monthly_wise_due_list').removeClass();
                $('#monthly_wise_due_list').addClass('form-group hidden');
                $('#monthly_wise_due_list_table').removeClass();
                $('#monthly_wise_due_list_table').addClass('table-responsive hidden');  
                $('#family_ac_wise_due_list').removeClass();
                $('#family_ac_wise_due_list').addClass('form-group hidden');  
                $('#family_ac_wise_due_list_table').removeClass();
                $('#family_ac_wise_due_list_table').addClass('table-responsive hidden'); 
                $('#policy_number_wise_list_table').removeClass();
                $('#policy_number_wise_list_table').addClass('table-responsive hidden'); 
                $('#surname_wise_list_table').removeClass();
                $('#surname_wise_list_table').addClass('table-responsive hidden');
                $('#sex_wise_list').removeClass();
                $('#sex_wise_list').addClass('form-group hidden');
                $('#sex_wise_list_table').removeClass();
                $('#sex_wise_list_table').addClass('table-responsive hidden');
                $('#DOB_wise_list_table').removeClass();
                $('#DOB_wise_list_table').addClass('table-responsive hidden'); 
                $('#PTP_wise_list_table').removeClass();
                $('#PTP_wise_list_table').addClass('table-responsive hidden'); 
                $('#MOP_wise_list').removeClass();
                $('#MOP_wise_list').addClass('form-group hidden');
                $('#MOP_wise_due_list_table').removeClass();
                $('#MOP_wise_due_list_table').addClass('table-responsive hidden');
                $('#PS_wise_list').removeClass();
                $('#PS_wise_list').addClass('form-group hidden');
                $('#PS_wise_due_list_table').removeClass();
                $('#PS_wise_due_list_table').addClass('table-responsive hidden'); 
                $('#branch_wise_due_list_table').removeClass();
                $('#branch_wise_due_list_table').addClass('table-responsive hidden');
                $('#agent_wise_due_list_table').removeClass();
                $('#agent_wise_due_list_table').addClass('table-responsive hidden');
                $('#DOC_wise_list_table').removeClass();
                $('#DOC_wise_list_table').addClass('table-responsive hidden');
                $('#no_nominee_wise_list_table').removeClass();
                $('#no_nominee_wise_list_table').addClass('table-responsive hidden');
                $('#SB_due_wise_list_table').removeClass();
                $('#SB_due_wise_list_table').addClass('table-responsive hidden'); 
                $('#report_end_date').removeClass();
                $('#report_start_date').removeClass();
                $('#report_start_date').addClass('col-sm-3 hidden');
                $('#report_end_date').addClass('col-sm-3 hidden');
                $('#family_ac_wise_list').removeClass();
                $('#family_ac_wise_list').addClass('form-group hidden');
                $('#family_ac_wise_list_table').removeClass();
                $('#family_ac_wise_list_table').addClass('table-responsive hidden');
                $('#client_cash_wise_list').removeClass();
                $('#client_cash_wise_list').addClass('form-group hidden');
                $('#client_surname_wise_list').removeClass();
                $('#client_surname_wise_list').addClass('form-group hidden');
                $('#family_DOB_wise_list').removeClass();
                $('#family_DOB_wise_list').addClass('form-group');
                $('#document_wise_list_table').removeClass();
                $('#document_wise_list_table').addClass('form-group hidden');
                 $('#family_loan_wise_list').removeClass();
                $('#family_loan_wise_list').addClass('form-group hidden');
                $('#family_loan_wise_list_table').removeClass();
                $('#family_loan_wise_list_table').addClass('table-responsive hidden');
                $('#family_pension_wise_list').removeClass();
                $('#family_pension_wise_list').addClass('form-group hidden');
                $('#family_pension_wise_list_table').removeClass();
                $('#family_pension_wise_list_table').addClass('table-responsive hidden');
            }else if(report_for == 23){
                $('#SB_DUE_wise_list').removeClass();
                $('#SB_DUE_wise_list').addClass('form-group hidden');
                $('#document_wise_list').removeClass();
                $('#document_wise_list').addClass('form-group hidden');
                $('#family_ac_office_wise_list').removeClass();
                $('#family_ac_office_wise_list').addClass('form-group hidden');
                $('#family_ac_office_wise_list_table').removeClass();
                $('#family_ac_office_wise_list_table').addClass('table-responsive hidden');  
                $('#family_loan_wise_list').removeClass();
                $('#family_loan_wise_list').addClass('form-group');
                $('#family_loan_wise_list_table').removeClass();
                $('#family_loan_wise_list_table').addClass('table-responsive');
                $('#family_pension_wise_list').removeClass();
                $('#family_pension_wise_list').addClass('form-group hidden');
                $('#family_pension_wise_list_table').removeClass();
                $('#family_pension_wise_list_table').addClass('table-responsive hidden');
                $('#client_surname_wise_list').removeClass();
                $('#client_surname_wise_list').addClass('form-group hidden');
                $('#family_DOB_wise_list').removeClass();
                $('#family_DOB_wise_list').addClass('form-group hidden');
                $('#client_cash_wise_list').removeClass();
                $('#client_cash_wise_list').addClass('form-group hidden');
                $('#family_birthday_wise_list_table').removeClass();
                $('#family_birthday_wise_list_table').addClass('form-group hidden');
                $('#client_address_wise_list_table').removeClass();
                $('#client_address_wise_list_table').addClass('form-group hidden');
                $('#client_surname_wise_list_table').removeClass();
                $('#client_surname_wise_list_table').addClass('form-group hidden');
                $('#client_cash_wise_list_table').removeClass();
                $('#client_cash_wise_list_table').addClass('form-group hidden');
                $('#family_ac_wise_due_list').removeClass();
                $('#family_ac_wise_due_list').addClass('form-group hidden');  
                $('#family_ac_wise_due_list_table').removeClass();
                $('#report_end_date').removeClass();
                $('#report_start_date').removeClass();
                $('#report_start_date').addClass('col-sm-3 hidden');
                $('#report_end_date').addClass('col-sm-3 hidden');
                $('#family_ac_wise_due_list_table').addClass('table-responsive hidden');               
                $('#monthly_wise_due_list').removeClass();
                $('#monthly_wise_due_list').addClass('form-group hidden');
                $('#monthly_wise_due_list_table').removeClass();
                $('#monthly_wise_due_list_table').addClass('table-responsive hidden');
                $('#policy_number_wise_list_table').removeClass();
                $('#policy_number_wise_list_table').addClass('table-responsive hidden'); 
                $('#surname_wise_list_table').removeClass();
                $('#surname_wise_list_table').addClass('table-responsive hidden');
                $('#sex_wise_list').removeClass();
                $('#sex_wise_list').addClass('form-group hidden');
                $('#sex_wise_list_table').removeClass();
                $('#sex_wise_list_table').addClass('table-responsive hidden');
                $('#DOB_wise_list_table').removeClass();
                $('#DOB_wise_list_table').addClass('table-responsive hidden'); 
                $('#PTP_wise_list_table').removeClass();
                $('#PTP_wise_list_table').addClass('table-responsive hidden'); 
                $('#MOP_wise_list').removeClass();
                $('#MOP_wise_list').addClass('form-group hidden');
                $('#MOP_wise_due_list_table').removeClass();
                $('#MOP_wise_due_list_table').addClass('table-responsive hidden');
                $('#PS_wise_list').removeClass();
                $('#PS_wise_list').addClass('form-group hidden');
                $('#PS_wise_due_list_table').removeClass();
                $('#PS_wise_due_list_table').addClass('table-responsive hidden');
                $('#branch_wise_due_list_table').removeClass();
                $('#branch_wise_due_list_table').addClass('table-responsive hidden');
                $('#agent_wise_due_list_table').removeClass();
                $('#agent_wise_due_list_table').addClass('table-responsive hidden'); 
                $('#DOC_wise_list_table').removeClass();
                $('#DOC_wise_list_table').addClass('table-responsive hidden'); 
                $('#no_nominee_wise_list_table').removeClass();
                $('#no_nominee_wise_list_table').addClass('table-responsive hidden');
                $('#medical_client_wise_list').removeClass();
                $('#medical_client_wise_list').addClass('form-group hidden');
                $('#medical_wise_list_table').removeClass();
                $('#medical_wise_list_table').addClass('table-responsive hidden');
                $('#SB_due_wise_list_table').removeClass();
                $('#SB_due_wise_list_table').addClass('table-responsive hidden'); 
                $('#family_ac_wise_list').removeClass();
                $('#family_ac_wise_list').addClass('form-group hidden');
                $('#family_ac_wise_list_table').removeClass();
                $('#family_ac_wise_list_table').addClass('table-responsive hidden');
                $('#document_wise_list_table').removeClass();
                $('#document_wise_list_table').addClass('form-group hidden');
            }else if(report_for == 24){
                $('#SB_DUE_wise_list').removeClass();
                $('#SB_DUE_wise_list').addClass('form-group hidden');
                $('#document_wise_list').removeClass();
                $('#document_wise_list').addClass('form-group hidden');
                $('#family_loan_wise_list').removeClass();
                $('#family_loan_wise_list').addClass('form-group hidden');
                $('#family_loan_wise_list_table').removeClass();
                $('#family_loan_wise_list_table').addClass('table-responsive hidden');
                $('#family_pension_wise_list').removeClass();
                $('#family_pension_wise_list').addClass('form-group');
                 $('#family_pension_wise_list_table').removeClass();
                $('#family_pension_wise_list_table').addClass('table-responsive');
                $('#client_surname_wise_list').removeClass();
                $('#client_surname_wise_list').addClass('form-group hidden');
                $('#family_DOB_wise_list').removeClass();
                $('#family_DOB_wise_list').addClass('form-group hidden');
                $('#client_cash_wise_list').removeClass();
                $('#client_cash_wise_list').addClass('form-group hidden');
                $('#family_birthday_wise_list_table').removeClass();
                $('#family_birthday_wise_list_table').addClass('form-group hidden');
                $('#client_address_wise_list_table').removeClass();
                $('#client_address_wise_list_table').addClass('form-group hidden');
                $('#client_surname_wise_list_table').removeClass();
                $('#client_surname_wise_list_table').addClass('form-group hidden');
                $('#client_cash_wise_list_table').removeClass();
                $('#client_cash_wise_list_table').addClass('form-group hidden');
                $('#family_ac_wise_due_list').removeClass();
                $('#family_ac_wise_due_list').addClass('form-group hidden');  
                $('#family_ac_wise_due_list_table').removeClass();
                $('#report_end_date').removeClass();
                $('#report_start_date').removeClass();
                $('#report_start_date').addClass('col-sm-3 hidden');
                $('#report_end_date').addClass('col-sm-3 hidden');
                $('#family_ac_wise_due_list_table').addClass('table-responsive hidden');               
                $('#monthly_wise_due_list').removeClass();
                $('#monthly_wise_due_list').addClass('form-group hidden');
                $('#monthly_wise_due_list_table').removeClass();
                $('#monthly_wise_due_list_table').addClass('table-responsive hidden');
                $('#policy_number_wise_list_table').removeClass();
                $('#policy_number_wise_list_table').addClass('table-responsive hidden'); 
                $('#surname_wise_list_table').removeClass();
                $('#surname_wise_list_table').addClass('table-responsive hidden');
                $('#sex_wise_list').removeClass();
                $('#sex_wise_list').addClass('form-group hidden');
                $('#sex_wise_list_table').removeClass();
                $('#sex_wise_list_table').addClass('table-responsive hidden');
                $('#DOB_wise_list_table').removeClass();
                $('#DOB_wise_list_table').addClass('table-responsive hidden'); 
                $('#PTP_wise_list_table').removeClass();
                $('#PTP_wise_list_table').addClass('table-responsive hidden'); 
                $('#MOP_wise_list').removeClass();
                $('#MOP_wise_list').addClass('form-group hidden');
                $('#MOP_wise_due_list_table').removeClass();
                $('#MOP_wise_due_list_table').addClass('table-responsive hidden');
                $('#PS_wise_list').removeClass();
                $('#PS_wise_list').addClass('form-group hidden');
                $('#PS_wise_due_list_table').removeClass();
                $('#PS_wise_due_list_table').addClass('table-responsive hidden');
                $('#branch_wise_due_list_table').removeClass();
                $('#branch_wise_due_list_table').addClass('table-responsive hidden');
                $('#agent_wise_due_list_table').removeClass();
                $('#agent_wise_due_list_table').addClass('table-responsive hidden'); 
                $('#DOC_wise_list_table').removeClass();
                $('#DOC_wise_list_table').addClass('table-responsive hidden'); 
                $('#no_nominee_wise_list_table').removeClass();
                $('#no_nominee_wise_list_table').addClass('table-responsive hidden');
                $('#medical_client_wise_list').removeClass();
                $('#medical_client_wise_list').addClass('form-group hidden');
                $('#medical_wise_list_table').removeClass();
                $('#medical_wise_list_table').addClass('table-responsive hidden');
                $('#SB_due_wise_list_table').removeClass();
                $('#SB_due_wise_list_table').addClass('table-responsive hidden'); 
                $('#family_ac_wise_list').removeClass();
                $('#family_ac_wise_list').addClass('form-group hidden');
                $('#family_ac_wise_list_table').removeClass();
                $('#family_ac_wise_list_table').addClass('table-responsive hidden');
                $('#document_wise_list_table').removeClass();
                $('#document_wise_list_table').addClass('form-group hidden');
                $('#family_ac_office_wise_list').removeClass();
                $('#family_ac_office_wise_list').addClass('form-group hidden');
                $('#family_ac_office_wise_list_table').removeClass();
                $('#family_ac_office_wise_list_table').addClass('table-responsive hidden');   
            }else if(report_for == 25){
                $('#SB_DUE_wise_list').removeClass();
                $('#SB_DUE_wise_list').addClass('form-group hidden');
                $('#document_wise_list').removeClass();
                $('#document_wise_list').addClass('form-group hidden');
                $('#family_loan_wise_list').removeClass();
                $('#family_loan_wise_list').addClass('form-group hidden');
                $('#family_loan_wise_list_table').removeClass();
                $('#family_loan_wise_list_table').addClass('table-responsive hidden');
                $('#family_pension_wise_list').removeClass();
                $('#family_pension_wise_list').addClass('form-group hidden');
                 $('#family_pension_wise_list_table').removeClass();
                $('#family_pension_wise_list_table').addClass('table-responsive hidden');
                $('#client_surname_wise_list').removeClass();
                $('#client_surname_wise_list').addClass('form-group hidden');
                $('#family_DOB_wise_list').removeClass();
                $('#family_DOB_wise_list').addClass('form-group hidden');
                $('#client_cash_wise_list').removeClass();
                $('#client_cash_wise_list').addClass('form-group hidden');
                $('#family_birthday_wise_list_table').removeClass();
                $('#family_birthday_wise_list_table').addClass('form-group hidden');
                $('#client_address_wise_list_table').removeClass();
                $('#client_address_wise_list_table').addClass('form-group hidden');
                $('#client_surname_wise_list_table').removeClass();
                $('#client_surname_wise_list_table').addClass('form-group hidden');
                $('#client_cash_wise_list_table').removeClass();
                $('#client_cash_wise_list_table').addClass('form-group hidden');
                $('#family_ac_wise_due_list').removeClass();
                $('#family_ac_wise_due_list').addClass('form-group hidden');  
                $('#family_ac_wise_due_list_table').removeClass();
                $('#report_end_date').removeClass();
                $('#report_start_date').removeClass();
                $('#report_start_date').addClass('col-sm-3 hidden');
                $('#report_end_date').addClass('col-sm-3 hidden');
                $('#family_ac_wise_due_list_table').addClass('table-responsive hidden');               
                $('#monthly_wise_due_list').removeClass();
                $('#monthly_wise_due_list').addClass('form-group hidden');
                $('#monthly_wise_due_list_table').removeClass();
                $('#monthly_wise_due_list_table').addClass('table-responsive hidden');
                $('#policy_number_wise_list_table').removeClass();
                $('#policy_number_wise_list_table').addClass('table-responsive hidden'); 
                $('#surname_wise_list_table').removeClass();
                $('#surname_wise_list_table').addClass('table-responsive hidden');
                $('#sex_wise_list').removeClass();
                $('#sex_wise_list').addClass('form-group hidden');
                $('#sex_wise_list_table').removeClass();
                $('#sex_wise_list_table').addClass('table-responsive hidden');
                $('#DOB_wise_list_table').removeClass();
                $('#DOB_wise_list_table').addClass('table-responsive hidden'); 
                $('#PTP_wise_list_table').removeClass();
                $('#PTP_wise_list_table').addClass('table-responsive hidden'); 
                $('#MOP_wise_list').removeClass();
                $('#MOP_wise_list').addClass('form-group hidden');
                $('#MOP_wise_due_list_table').removeClass();
                $('#MOP_wise_due_list_table').addClass('table-responsive hidden');
                $('#PS_wise_list').removeClass();
                $('#PS_wise_list').addClass('form-group hidden');
                $('#PS_wise_due_list_table').removeClass();
                $('#PS_wise_due_list_table').addClass('table-responsive hidden');
                $('#branch_wise_due_list_table').removeClass();
                $('#branch_wise_due_list_table').addClass('table-responsive hidden');
                $('#agent_wise_due_list_table').removeClass();
                $('#agent_wise_due_list_table').addClass('table-responsive hidden'); 
                $('#DOC_wise_list_table').removeClass();
                $('#DOC_wise_list_table').addClass('table-responsive hidden'); 
                $('#no_nominee_wise_list_table').removeClass();
                $('#no_nominee_wise_list_table').addClass('table-responsive hidden');
                $('#medical_client_wise_list').removeClass();
                $('#medical_client_wise_list').addClass('form-group hidden');
                $('#medical_wise_list_table').removeClass();
                $('#medical_wise_list_table').addClass('table-responsive hidden');
                $('#SB_due_wise_list_table').removeClass();
                $('#SB_due_wise_list_table').addClass('table-responsive hidden'); 
                $('#family_ac_wise_list').removeClass();
                $('#family_ac_wise_list').addClass('form-group hidden');
                $('#family_ac_wise_list_table').removeClass();
                $('#family_ac_wise_list_table').addClass('table-responsive hidden');
                $('#document_wise_list_table').removeClass();
                $('#document_wise_list_table').addClass('form-group hidden');
                $('#family_ac_office_wise_list').removeClass();
                $('#family_ac_office_wise_list').addClass('form-group');
                $('#family_ac_office_wise_list_table').removeClass();
                $('#family_ac_office_wise_list_table').addClass('table-responsive');   
            }else{
                $('#document_wise_list').removeClass();
                $('#document_wise_list').addClass('form-group hidden');
                $('#client_surname_wise_list').removeClass();
                $('#client_surname_wise_list').addClass('form-group hidden');
                $('#family_DOB_wise_list').removeClass();
                $('#family_DOB_wise_list').addClass('form-group hidden');
                $('#client_cash_wise_list').removeClass();
                $('#client_cash_wise_list').addClass('form-group hidden');
                $('#family_birthday_wise_list_table').removeClass();
                $('#family_birthday_wise_list_table').addClass('form-group hidden');
                $('#client_address_wise_list_table').removeClass();
                $('#client_address_wise_list_table').addClass('form-group hidden');
                $('#client_surname_wise_list_table').removeClass();
                $('#client_surname_wise_list_table').addClass('form-group hidden');
                $('#client_cash_wise_list_table').removeClass();
                $('#client_cash_wise_list_table').addClass('form-group hidden');
                $('#family_ac_wise_due_list').removeClass();
                $('#family_ac_wise_due_list').addClass('form-group hidden');  
                $('#family_ac_wise_due_list_table').removeClass();
                $('#report_end_date').removeClass();
                $('#report_start_date').removeClass();
                $('#report_start_date').addClass('col-sm-3 hidden');
                $('#report_end_date').addClass('col-sm-3 hidden');
                $('#family_ac_wise_due_list_table').addClass('table-responsive hidden');               
                $('#monthly_wise_due_list').removeClass();
                $('#monthly_wise_due_list').addClass('form-group hidden');
                $('#monthly_wise_due_list_table').removeClass();
                $('#monthly_wise_due_list_table').addClass('table-responsive hidden');
                $('#policy_number_wise_list_table').removeClass();
                $('#policy_number_wise_list_table').addClass('table-responsive hidden'); 
                $('#surname_wise_list_table').removeClass();
                $('#surname_wise_list_table').addClass('table-responsive hidden');
                $('#sex_wise_list').removeClass();
                $('#sex_wise_list').addClass('form-group hidden');
                $('#sex_wise_list_table').removeClass();
                $('#sex_wise_list_table').addClass('table-responsive hidden');
                $('#DOB_wise_list_table').removeClass();
                $('#DOB_wise_list_table').addClass('table-responsive hidden'); 
                $('#PTP_wise_list_table').removeClass();
                $('#PTP_wise_list_table').addClass('table-responsive hidden'); 
                $('#MOP_wise_list').removeClass();
                $('#MOP_wise_list').addClass('form-group hidden');
                $('#MOP_wise_due_list_table').removeClass();
                $('#MOP_wise_due_list_table').addClass('table-responsive hidden');
                $('#PS_wise_list').removeClass();
                $('#PS_wise_list').addClass('form-group hidden');
                $('#PS_wise_due_list_table').removeClass();
                $('#PS_wise_due_list_table').addClass('table-responsive hidden');
                $('#branch_wise_due_list_table').removeClass();
                $('#branch_wise_due_list_table').addClass('table-responsive hidden');
                $('#agent_wise_due_list_table').removeClass();
                $('#agent_wise_due_list_table').addClass('table-responsive hidden'); 
                $('#DOC_wise_list_table').removeClass();
                $('#DOC_wise_list_table').addClass('table-responsive hidden'); 
                $('#no_nominee_wise_list_table').removeClass();
                $('#no_nominee_wise_list_table').addClass('table-responsive hidden');
                $('#medical_client_wise_list').removeClass();
                $('#medical_client_wise_list').addClass('form-group hidden');
                $('#medical_wise_list_table').removeClass();
                $('#medical_wise_list_table').addClass('table-responsive hidden');
                $('#SB_due_wise_list_table').removeClass();
                $('#SB_due_wise_list_table').addClass('table-responsive hidden'); 
                $('#family_ac_wise_list').removeClass();
                $('#family_ac_wise_list').addClass('form-group hidden');
                $('#family_ac_wise_list_table').removeClass();
                $('#family_ac_wise_list_table').addClass('table-responsive hidden');
                $('#document_wise_list_table').removeClass();
                $('#document_wise_list_table').addClass('form-group hidden');
                $('#family_loan_wise_list').removeClass();
                $('#family_loan_wise_list').addClass('form-group hidden');
                $('#family_loan_wise_list_table').removeClass();
                $('#family_loan_wise_list_table').addClass('table-responsive hidden');
                $('#family_pension_wise_list').removeClass();
                $('#family_pension_wise_list').addClass('form-group hidden');
                $('#family_pension_wise_list_table').removeClass();
                $('#family_pension_wise_list_table').addClass('table-responsive hidden');
                $('#family_ac_office_wise_list').removeClass();
                $('#family_ac_office_wise_list').addClass('form-group hidden');
                $('#SB_DUE_wise_list').removeClass();
                $('#SB_DUE_wise_list').addClass('form-group hidden');
                $('#family_ac_office_wise_list_table').removeClass();
                $('#family_ac_office_wise_list_table').addClass('table-responsive hidden');
            }
        });

//========================================== Policy Number wise Report =========================================================
            
            var policy_number_wise_report = $('.dataTables-example1').DataTable({
                "pageLength": 100,
                "responsive": true,
                // "bfilter":false,
                "ordering":false,
                "dom": '<"html5buttons"B>Tgitp',
                "buttons": [
                    // {extend: 'copy'},
                    {
                        "extend": 'print',
                       
                        title:'',
                        // footer:true,
                        customize: function ( win ) {
                          $(win.document.body).find( 'thead' ).prepend('<tr><td colspan="12" style="font-size:24px;text-align:center;border:none !important;">Policy Number Wise List </td></center></tr>')
                        },
                    },
                    {"extend": 'excel', title: 'Policy Number Wise List'},
                    {"extend": 'pdf', title: 'Policy Number Wise List'},
                ],
                "aoColumns": [
                    {
                        "title": "Name",
                        "data": "name",
                    },
                    {
                        "title": "A/C",
                        "data": "client_family_acc_no"
                    },
					{
                        "title": "S.A.",
                        "data": "S_A",
                    },
					{
                        "title": "P-T-PPT",
                        "data": "PTP"
                    },
					{
                        "title": "DOC",
                        "data": "DOC"
                    },
                    {
                        "title": "Policy No.",
                        "data": "policy_number"
                    },
					{
                        "title": "Mode",
                        "data": "mode_of_payment"
                    },
					{
                        "title": "Prem",
                        "data": "policy_premium"
                    },
					{
                        "title": "Br.",
                        "data": "branch_code"
                    },
					{
                        "title": "A",
                        "data": "agent_short_code"
                    },
                    {
                        "title": "DOB",
                        "data": "DOB"
                    },
					{
                        "title": "St",
                        "data": "mode_of_status"
                    },
                ],
                "language": {
                    "emptyTable": "<img src='http://trackmee.syntech.co.in/trackmee/assets/img/No-record-found.png'> "
                }, 
            });  

            $('#policy_sort_by_agent').on( 'keyup', function () {
                policy_number_wise_report
                    .columns( 9 )
                    .search( this.value )
                    .draw();
            } );

//========================================== Surname wise Report =========================================================

            var surname_wise_report = $('.dataTables-example2').DataTable({
                "pageLength": 100,
                "responsive": true,
                "ordering":false,
                "dom": '<"html5buttons"B>Tgitp',
                "buttons": [
                    // {extend: 'copy'},
                    {
                        "extend": 'print',
                       
                        title:'',
                        // footer:true,
                        customize: function ( win ) {
                          $(win.document.body).find( 'thead' ).prepend('<tr><td colspan="12" style="font-size:24px;text-align:center;border:none !important;">Surname Wise List </td></center></tr>')
                        },
                    },
                    {"extend": 'excel', title: 'Surname Wise List'},
                    {"extend": 'pdf', title: 'Surname Wise List'},
                ],
                "columns": [
                    {
                        "title": "Name",
                        "data": "name",
                    },
                    {
                        "title": "A/C",
                        "data": "client_family_acc_no"
                    },
					{
                        "title": "S.A.",
                        "data": "S_A",
                    },
					{
                        "title": "P-T-PPT",
                        "data": "PTP"
                    },
					{
                        "title": "DOC",
                        "data": "DOC"
                    },
                    {
                        "title": "Policy No.",
                        "data": "policy_number"
                    },
					{
                        "title": "Mode",
                        "data": "mode_of_payment"
                    },
					{
                        "title": "Prem",
                        "data": "policy_premium"
                    },
					{
                        "title": "Br.",
                        "data": "branch_code"
                    },
					{
                        "title": "A",
                        "data": "agent_short_code"
                    },
                    {
                        "title": "DOB",
                        "data": "DOB"
                    },
					{
                        "title": "St",
                        "data": "mode_of_status"
                    },
                ],
                "language": {
                    "emptyTable": "<img src='http://trackmee.syntech.co.in/trackmee/assets/img/No-record-found.png'> "
                },  
            });

            $('#surname_sort_by_agent').on( 'keyup', function () {
                surname_wise_report
                    .columns( 9 )
                    .search( this.value )
                    .draw();
            } );

//========================================== Sex wise Report =========================================================
            var gender = '';
            var sex_sort = '';
            $(document).on('click','.show_sex_list',function(){
                gender = $('#gender').val();
                sex_sort = $('#sex_sort').val();
                $.post('<?=site_url('Admin/report_sex_wise')?>',{gender:gender,sex_sort:sex_sort},function(data){
                    console.log(data);
                    sex_wise_report.clear();
                    $.each(data,function(k,v){
                        sex_wise_report.row.add(v);
                    })
                    sex_wise_report.draw();
                },'json');
            });

            var sex_wise_report = $('.dataTables-example3').DataTable({
                "pageLength": 100,
                "responsive": true,
                "ordering":false,
                "dom": '<"html5buttons"B>Tgitp',
                "buttons": [
                    // {extend: 'copy'},
                    {
                        "extend": 'print',
                       
                        title:'',
                        // footer:true,
                        customize: function ( win ) {
                          $(win.document.body).find( 'thead' ).prepend('<tr><td colspan="12" style="font-size:24px;text-align:center;border:none !important;">Gender Wise List : '+gender+'</td></center></tr>')
                        },
                    },
                    {"extend": 'excel', title: 'Client SEX Wise List'},
                    {"extend": 'pdf', title: 'Client SEX Wise List'},
                ],
                "columns": [
                    {
                        "title": "Name",
                        "data": "name",
                    },
                    {
                        "title": "A/C",
                        "data": "client_family_acc_no"
                    },
					{
                        "title": "S.A.",
                        "data": "S_A",
                    },
					{
                        "title": "P-T-PPT",
                        "data": "PTP"
                    },
					{
                        "title": "DOC",
                        "data": "DOC"
                    },
                    {
                        "title": "Policy No.",
                        "data": "policy_number"
                    },
					{
                        "title": "Mode",
                        "data": "mode_of_payment"
                    },
					{
                        "title": "Prem",
                        "data": "policy_premium"
                    },
					{
                        "title": "Br.",
                        "data": "branch_code"
                    },
					{
                        "title": "A",
                        "data": "agent_short_code"
                    },
                    {
                        "title": "DOB",
                        "data": "DOB"
                    },
					{
                        "title": "St",
                        "data": "mode_of_status"
                    },
                ],
                "language": {
                    "emptyTable": "<img src='http://trackmee.syntech.co.in/trackmee/assets/img/No-record-found.png'> "
                },  
            });

            $('#sex_sort_by_agent').on( 'keyup', function () {
                sex_wise_report
                    .columns( 9 )
                    .search( this.value )
                    .draw();
            } );

//========================================== DOB wise Report =========================================================

            var DOB_wise_report = $('.dataTables-example4').DataTable({
                "pageLength": 100,
                "responsive": true,
                "ordering":false,
                "dom": '<"html5buttons"B>Tgitp',
                "buttons": [
                    // {extend: 'copy'},
                    {
                        "extend": 'print',
                       
                        title:'',
                        // footer:true,
                        customize: function ( win ) {
                          $(win.document.body).find( 'thead' ).prepend('<tr><td colspan="12" style="font-size:24px;text-align:center;border:none !important;">Date Of Birth Wise List </td></center></tr>')
                        },
                    },
                    {"extend": 'excel', title: 'Date Of Birth Wise List'},
                    {"extend": 'pdf', title: 'Date Of Birth Wise List'},
                ],
                "columns": [
                    {
                        "title": "Name",
                        "data": "name",
                    },
                    {
                        "title": "A/C",
                        "data": "client_family_acc_no"
                    },
					{
                        "title": "S.A.",
                        "data": "S_A",
                    },
					{
                        "title": "P-T-PPT",
                        "data": "PTP"
                    },
					{
                        "title": "DOC",
                        "data": "DOC"
                    },
                    {
                        "title": "Policy No.",
                        "data": "policy_number"
                    },
					{
                        "title": "Mode",
                        "data": "mode_of_payment"
                    },
					{
                        "title": "Prem",
                        "data": "policy_premium"
                    },
					{
                        "title": "Br.",
                        "data": "branch_code"
                    },
					{
                        "title": "A",
                        "data": "agent_short_code"
                    },
                    {
                        "title": "DOB",
                        "data": "DOB"
                    },
					{
                        "title": "St",
                        "data": "mode_of_status"
                    },
                ],
                "language": {
                    "emptyTable": "<img src='http://trackmee.syntech.co.in/trackmee/assets/img/No-record-found.png'> "
                },  
            });

            $('#DOB_sort_by_agent').on( 'keyup', function () {
                DOB_wise_report
                    .columns( 9 )
                    .search( this.value )
                    .draw();
            } );
//========================================== Plan And Term wise Report =========================================================

            var PTP_wise_report = $('.dataTables-example5').DataTable({
                "pageLength": 100,
                "responsive": true,
                "ordering":false,
                "dom": '<"html5buttons"B>Tgitp',
                "buttons": [
                    // {extend: 'copy'},
                    {
                        "extend": 'print',
                       
                        title:'',
                        // footer:true,
                        customize: function ( win ) {
                          $(win.document.body).find( 'thead' ).prepend('<tr><td colspan="12" style="font-size:24px;text-align:center;border:none !important;">Plan and Term Wise List </td></center></tr>')
                        },
                    },
                    {"extend": 'excel', title: 'Plan and Term Wise List'},
                    {"extend": 'pdf', title: 'Plan and Term Wise List'},
                ],
                "columns": [
                    {
                        "title": "Name",
                        "data": "name",
                    },
                    {
                        "title": "A/C",
                        "data": "client_family_acc_no"
                    },
					{
                        "title": "S.A.",
                        "data": "S_A",
                    },
					{
                        "title": "P-T-PPT",
                        "data": "PTP"
                    },
					{
                        "title": "DOC",
                        "data": "DOC"
                    },
                    {
                        "title": "Policy No.",
                        "data": "policy_number"
                    },
					{
                        "title": "Mode",
                        "data": "mode_of_payment"
                    },
					{
                        "title": "Prem",
                        "data": "policy_premium"
                    },
					{
                        "title": "Br.",
                        "data": "branch_code"
                    },
					{
                        "title": "A",
                        "data": "agent_short_code"
                    },
                    {
                        "title": "DOB",
                        "data": "DOB"
                    },
					{
                        "title": "St",
                        "data": "mode_of_status"
                    },
                ],
                "language": {
                    "emptyTable": "<img src='http://trackmee.syntech.co.in/trackmee/assets/img/No-record-found.png'> "
                },  
            });

            $('#PPT_sort_by_agent').on( 'keyup', function () {
                PTP_wise_report
                    .columns( 9 )
                    .search( this.value )
                    .draw();
            } );
//==================================== Monthly Due Report ==========================================================
            var month_start = '';
            var month_end = '';
            var month = '';
            $(document).on('click','.show_month_wise_due_list',function(){
                month_start = $('#start_date').val();
                month_end = $('#end_date').val();
                month = $('#month_selection').val();
                // alert(month);
                $.post('<?=site_url('Admin/report_month_wise_due_list')?>',{start:month_start,end:month_end,month:month},function(data){
                    console.log(data);
                    month_wise_due_list.clear();
                    $.each(data,function(k,v){
                        month_wise_due_list.row.add(v);
                    })
                    month_wise_due_list.draw();
                },'json');
            });
            var month_wise_due_list = $('.dataTables-example6').DataTable({
                "pageLength": 100,
                "responsive": true,
                "ordering":false,
                "dom": '<"html5buttons"B>lTfgitp',
                "buttons": [
                    // {extend: 'copy'},
                    {
                        "extend": 'print',
                       
                        title:'',
                        // footer:true,
                        customize: function ( win ) {
                          $(win.document.body).find( 'thead' ).prepend('<tr><td colspan="12" style="font-size:24px;text-align:center;border:none !important;">Monthly Due List for ' + month+ '</td></center></tr>')
                        },
                    },
                    {"extend": 'excel', title: 'Month Wise Due List'},
                    {"extend": 'pdf', title: 'Month Wise Due List'},
                ],
                "columns": [
                    {
                        "title": "Name",
                        "data": "name",
                    },
                    {
                        "title": "A/C",
                        "data": "client_family_acc_no"
                    },
                    {
                        "title": "S.A.",
                        "data": "S_A",
                    },
                    {
                        "title": "P-PPT",
                        "data": "plan_ppt"
                    },
                    {
                        "title": "DOC",
                        "data": "policy_DOC"
                    },
                    {
                        "title": "Policy No.",
                        "data": "policy_number"
                    },
                    {
                        "title": "Mode",
                        "data": "mode"
                    },
                    {
                        "title": "Prem",
                        "data": "premium",
                        // "className":"sum"
                    },
                    {
                        "title": "Due Date",
                        "data": "due_date"
                    },
                    {
                        "title": "Br.",
                        "data": "branch_code"
                    },
                    {
                        "title": "A",
                        "data": "agent_short_code"
                    }
                ],
                "language": {
                    "emptyTable": "<img src='http://trackmee.syntech.co.in/trackmee/assets/img/No-record-found.png'> "
                },  
            });

//========================================= Family Account Medical Wise Due List REport ================================================
        var client_id = '';
        var client_name = '';
        $(document).on('change','#client_id',function(){
            $('#client_name').empty();
            client_id = $(this).val();
            $.post('<?=site_url('Admin/client_details_for_medical_report')?>',{client_id:client_id},function(data){
                console.log(data);
                $.each(data,function(k,v) {             
                    $('#client_name').val(v.name);
                })
            },'json');
        })

        $(document).on('click','.show_medical_client_list',function(){
            client_id = $('#client_id').val();
            client_name = $('#client_name').val();
            $.post('<?=site_url('Admin/report_medicle_history_wise')?>',{client_id:client_id},function(data){
                console.log(data);
                medical_history_report.clear();
                $.each(data,function(k,v){
                    medical_history_report.row.add(v);
                })
                medical_history_report.draw();
            },'json');
        });

        // var san = $(".dataTables-example").prepend('<tfoot><th></th><th></th><th></th><th></th><th></th><th></th><th></th><th></th><th></th><th></th><th></th><th></th></tfoot>');
        var medical_history_report = $('.dataTables-example7').DataTable({
                "pageLength": 100,
                "responsive": true,
                "ordering":false,
                "dom": '<"html5buttons"B>lTfgitp',
                "buttons": [
                    // {extend: 'copy'},
                    {
                        "extend": 'print',
                       
                        title:'',
                        // footer:true,
                        customize: function ( win ) {
                          $(win.document.body).find( 'thead' ).prepend('<tr><td colspan="14" style="font-size:24px;text-align:center;border:none !important;">'+client_name+'</td></center></tr><tr><td colspan="14" style="font-size:24px;text-align:center;border:none !important;">Medical History</td></center></tr>')
                        },
                    },
                    {"extend": 'excel', title: 'Medical History'},
                    {"extend": 'pdf', title: 'Medical History'},
                ],
                "columns": [
					{
                        "title": "Policy No.",
                        "data": "policy_number"
                    },
                    {
                        "title": "DOC",
                        "data": "DOC"
                    },
					{
                        "title": "S.A.",
                        "data": "policy_sum_assurance"
                    },
					{
                        "title": "class",
                        "data": "policy_class",
                    },
                    {
                        "title": "DR. Name",
                        "data": "policy_doctor_name"
                    },
                    {
                        "title": "MED Date.",
                        "data": "MED",
                    },
                    {
                        "title": "identi. Mark",
                        "data": "policy_identification_mark"
                    },
                    {
                        "title": "H",
                        "data": "policy_height"
                    },
                    {
                        "title": "W",
                        "data": "policy_weight"
                    },
                    {
                        "title": "A",
                        "data": "policy_ABD"
                    },
                    {
                        "title": "C",
                        "data": "policy_chest"
                    },
                    {
                        "title": "BP",
                        "data": "policy_BP"
                    },
                    {
                        "title": "P",
                        "data": "policy_pulse"
                    }, 
                    {
                        "title": "Spect",
                        "data": "policy_spect"
                    }, 
                    {
                        "title": "type",
                        "data": "policy_spect_type"
                    },
                    {
                        "title": "Operation",
                        "data": "policy_operation"
                    },
                    {
                        "title": "Spl. report",
                        "data": "policy_spl_reports"
                    }
                ],
                "language": {
                    "emptyTable": "<img src='http://trackmee.syntech.co.in/trackmee/assets/img/No-record-found.png'> "
                },  
            });  
   
//========================================== Mode Of Payment wise Report =========================================================

            var payment_name = '';
            var mode = '';
            $(document).on('change','#payment_mode',function(){
                $('#payment_name').empty();
                mode = $(this).val();
                if(mode == 1){
                    $('#payment_name').val('YEARLY (YLY)');
                }else if(mode == 2){
                    $('#payment_name').val('HALF YEARLY (HLY)');
                }else if(mode == 3){
                    $('#payment_name').val('QUATERLY (QLY)');
                }else if(mode == 12){
                    $('#payment_name').val('MONTHY (MON)');
                }else if(mode == 4){
                    $('#payment_name').val('SERVICE SAVING SCHEME (SSS)');
                }else{
                    $('#payment_name').val('ONE TIME (ONE)');
                }
            })

            $(document).on('click','.show_MOP_list',function(){
                mode = $('#payment_mode').val();
                payment_name = $('#payment_name').val();
                $.post('<?=site_url('Admin/report_mode_of_payment_wise')?>',{mode:mode},function(data){
                    console.log(data);
                    MOP_wise_report.clear();
                    $.each(data,function(k,v){
                        MOP_wise_report.row.add(v);
                    })
                    MOP_wise_report.draw();
                },'json');
            });

            var MOP_wise_report = $('.dataTables-example8').DataTable({
                "pageLength": 100,
                "responsive": true,
                "ordering":false,
                "dom": '<"html5buttons"B>Tgitp',
                "buttons": [
                    {
                        "extend": 'print',
                       
                        title:'',
                        // footer:true,
                        customize: function ( win ) {
                          $(win.document.body).find( 'thead' ).prepend('<tr><td colspan="12" style="font-size:24px;text-align:center;border:none !important;">'+payment_name+' Payment Wise List </td></center></tr>')
                        },
                    },
                    {"extend": 'excel', title: 'Mode Of Payment Wise List'},
                    {"extend": 'pdf', title: 'Mode Of Payment Wise List'},
                ],
                "columns": [
                    {
                        "title": "Name",
                        "data": "name",
                    },
                    {
                        "title": "A/C",
                        "data": "client_family_acc_no"
                    },
					{
                        "title": "S.A.",
                        "data": "S_A",
                    },
					{
                        "title": "P-T-PPT",
                        "data": "PTP"
                    },
					{
                        "title": "DOC",
                        "data": "DOC"
                    },
                    {
                        "title": "Policy No.",
                        "data": "policy_number"
                    },
					{
                        "title": "Mode",
                        "data": "mode_of_payment"
                    },
					{
                        "title": "Prem",
                        "data": "policy_premium"
                    },
					{
                        "title": "Br.",
                        "data": "branch_code"
                    },
					{
                        "title": "A",
                        "data": "agent_short_code"
                    },
                    {
                        "title": "DOB",
                        "data": "DOB"
                    },
					{
                        "title": "St",
                        "data": "mode_of_status"
                    },
                ],
                "language": {
                    "emptyTable": "<img src='http://trackmee.syntech.co.in/trackmee/assets/img/No-record-found.png'> "
                },  
            });

            $('#MOP_sort_by_agent').on( 'keyup', function () {
                MOP_wise_report
                    .columns( 9 )
                    .search( this.value )
                    .draw();
            } );

//========================================== SB Due wise Report =========================================================
        
        $(document).on('click','.show_SB_DUE_list',function(){
            start_due = $('#start_date').val();
            end_due = $('#end_date').val();
            // alert(start_due);
            $.post('<?=site_url('Admin/report_SB_due_date_wise')?>',{start:start_due,end:end_due},function(data){
                console.log(data);
                SB_DUE_wise_report.clear();
                $.each(data,function(k,v){
                    SB_DUE_wise_report.row.add(v);
                })
                SB_DUE_wise_report.draw();
            },'json');
        })

            var SB_DUE_wise_report = $('.dataTables-example9').DataTable({
                "pageLength": 100,
                "responsive": true,
                "ordering":false,
                "dom": '<"html5buttons"B>Tgitp',
                "buttons": [
                    // {extend: 'copy'},
                    {
                        "extend": 'print',
                       
                        title:'',
                        // footer:true,
                        customize: function ( win ) {
                          $(win.document.body).find( 'thead' ).prepend('<tr><td colspan="12" style="font-size:24px;text-align:center;border:none !important;">SB Due Wise List For '+start_due+' to '+end_due+' </td></center></tr>')
                        },
                    },
                    {"extend": 'excel', title: 'SB DUE Wise List'},
                    {"extend": 'pdf', title: 'SB DUE Wise List'},
                ],
                "columns": [
                   {
                        "title": "Name",
                        "data": "name",
                    },
					{
                        "title": "A/C",
                        "data": "client_family_acc_no",
                    },
					{
                        "title": "S.A.",
                        "data": "S_A",
                    },
                   
                     {
                        "title": "P-T-PPT",
                        "data": "P_T_PPT"
                    },
					{
                        "title": "DOC",
                        "data": "DOC"
                    },
					{
                        "title": "Policy No.",
                        "data": "policy_number"
                    },
                    {
                        "title": "Mode.",
                        "data": "mode_of_payment"
                    },
					{
                        "title": "Last Due",
                        "data": "policy_last_due"
                    },
                    {
                        "title": "Maturity Date",
                        "data": "policy_maturity_date"
                    },
                    {
                        "title": "Br.",
                        "data": "branch_code"
                    },
                    {
                        "title": "A",
                        "data": "agent_short_code"
                    },
					{
                        "title": "SB Due Date",
                        "data": "SB_Due_date"
                    },
                    {
                        "title": "Amt.",
                        "data": "SB_due_amount"
                    },
					{
                        "title": "Remark",
                        "data": "remark"
                    },
                    
                ],
                "language": {
                    "emptyTable": "<img src='http://trackmee.syntech.co.in/trackmee/assets/img/No-record-found.png'> "
                },  
            });

            $('#SB_sort_by_agent').on( 'keyup', function () {
                SB_DUE_wise_report
                    .columns( 10 )
                    .search( this.value )
                    .draw();
            } );
//========================================== Policy Status wise Report =========================================================

            var payment_status_name = '';
            var status = '';
            $(document).on('change','#policy_status',function(){
                $('#payment_name').empty();
                status = $(this).val();
                if(status == 1){
                    $('#payment_status_name').val('FULL FORCE');
                }else if(status == 2){
                    $('#payment_status_name').val('MATURED');
                }else if(status == 3){
                    $('#payment_status_name').val('DEATH');
                }else if(status == 4){
                    $('#payment_status_name').val('SURRENDER');
                }else if(status == 5){
                    $('#payment_status_name').val('PACCA LOPSE NO PAIDUP');
                }else if(status == 6){
                    $('#payment_status_name').val('PACCA LOPSE PAIDUP');
                }else if(status == 7){
                    $('#payment_status_name').val('LAPSE');
                }else{
                    $('#payment_status_name').val('OTHER');
                }
            })

            $(document).on('click','.show_PS_list',function(){
                status = $('#policy_status').val();
                payment_status_name = $('#payment_status_name').val();
                // alert(status);
                // alert(payment_status_name);
                $.post('<?=site_url('Admin/report_policy_status_wise')?>',{status:status},function(data){
                    console.log(data);
                    PS_wise_report.clear();
                    $.each(data,function(k,v){
                        PS_wise_report.row.add(v);
                    })
                    PS_wise_report.draw();
                },'json');
            });

            var PS_wise_report = $('.dataTables-example10').DataTable({
                "pageLength": 100,
                "responsive": true,
                "ordering":false,
                "dom": '<"html5buttons"B>Tgitp',
                "buttons": [
                    {
                        "extend": 'print',
                       
                        title:'',
                        // footer:true,
                        customize: function ( win ) {
                          $(win.document.body).find( 'thead' ).prepend('<tr><td colspan="12" style="font-size:24px;text-align:center;border:none !important;">'+payment_status_name+' STATUS WISE LIST </td></center></tr>')
                        },
                    },
                    {"extend": 'excel', title: 'Payment  Status Wise List'},
                    {"extend": 'pdf', title: 'Payment  Status Wise List'},
                ],
                "columns": [
                    {
                        "title": "Name",
                        "data": "name",
                    },
                    {
                        "title": "A/C",
                        "data": "client_family_acc_no"
                    },
					{
                        "title": "S.A.",
                        "data": "S_A",
                    },
					{
                        "title": "P-T-PPT",
                        "data": "PTP"
                    },
					{
                        "title": "DOC",
                        "data": "DOC"
                    },
                    {
                        "title": "Policy No.",
                        "data": "policy_number"
                    },
					{
                        "title": "Mode",
                        "data": "mode_of_payment"
                    },
					{
                        "title": "Prem",
                        "data": "policy_premium"
                    },
					{
                        "title": "Br.",
                        "data": "branch_code"
                    },
					{
                        "title": "A",
                        "data": "agent_short_code"
                    },
                    {
                        "title": "DOB/FUP",
                        "data": "DOB"
                    },
					{
                        "title": "St",
                        "data": "mode_of_status"
                    },
                ],
                "language": {
                    "emptyTable": "<img src='http://trackmee.syntech.co.in/trackmee/assets/img/No-record-found.png'> "
                },  
            });

            $('#PS_sort_by_agent').on( 'keyup', function () {
                PS_wise_report
                    .columns( 9 )
                    .search( this.value )
                    .draw();
            } );

//========================================== Document wise Report =========================================================
            $(document).on('click','.show_doc_list',function(){
                status = $('#doc_status').val();
                payment_status_name = $('#doc_status_name').val();
                $.post('<?=site_url('Admin/report_doc_status_wise')?>',{doc_status:status},function(data){
                    console.log(data);
                    Document_wise_report.clear();
                    $.each(data,function(k,v){
                        Document_wise_report.row.add(v);
                    })
                    Document_wise_report.draw();
                },'json');
            });

            var Document_wise_report = $('.dataTables-example11').DataTable({
                "pageLength": 100,
                "responsive": true,
                // "bfilter":false,
                "ordering":false,
                "dom": '<"html5buttons"B>Tgitp',
                "buttons": [
                    // {extend: 'copy'},
                    {
                        "extend": 'print',
                       
                        title:'',
                        // footer:true,
                        customize: function ( win ) {
                          $(win.document.body).find( 'thead' ).prepend('<tr><td colspan="12" style="font-size:24px;text-align:center;border:none !important;">Document Wise List </td></center></tr>')
                        },
                    },
                    {"extend": 'excel', title: 'Document Wise List'},
                    {"extend": 'pdf', title: 'Document Wise List'},
                ],
                "aoColumns": [
                    {
                        "title": "Name",
                        "data": "name",
                    },
                    {
                        "title": "A/C",
                        "data": "client_family_acc_no"
                    },
					{
                        "title": "S.A.",
                        "data": "S_A",
                    },
					{
                        "title": "P-T-PPT",
                        "data": "PTP"
                    },
					{
                        "title": "DOC",
                        "data": "DOC"
                    },
                    {
                        "title": "Policy No.",
                        "data": "policy_number"
                    },
					{
                        "title": "Mode",
                        "data": "mode_of_payment"
                    },
					{
                        "title": "Prem",
                        "data": "policy_premium"
                    },
					{
                        "title": "Br.",
                        "data": "branch_code"
                    },
					{
                        "title": "A",
                        "data": "agent_short_code"
                    },
                    {
                        "title": "DOB",
                        "data": "DOB"
                    },
					{
                        "title": "St",
                        "data": "mode_of_status"
                    },
                ],
                "language": {
                    "emptyTable": "<img src='http://trackmee.syntech.co.in/trackmee/assets/img/No-record-found.png'> "
                }, 
            });  

            $('#policy_sort_by_agent').on( 'keyup', function () {
                policy_number_wise_report
                    .columns( 9 )
                    .search( this.value )
                    .draw();
            } );
//========================================= Family Account Wise List REport ================================================
        var start = '';
        var end = '';
        var acc_no = '';
        var acc_holder = '';
        $(document).on('change','#family_acc_no1',function(){
            $('#family_acc_holder_name1').empty();
            acc_no = $(this).val();
            $.post('<?=site_url('Admin/family_account_details')?>',{acc_no:acc_no},function(data){
                console.log(data);
                $.each(data,function(k,v) {             
                    $('#family_acc_holder_name1').val(v.family_head_name);
                })
            },'json');
        })

        $(document).on('click','.show_family_ac_wise_list',function(){
            start = $('#start_date').val();
            end = $('#end_date').val();
            acc_no = $('#family_acc_no1').val();
            acc_holder = $('#family_acc_holder_name1').val();
            $.post('<?=site_url('Admin/report_family_ac_wise_list')?>',{acc_no:acc_no},function(data){
                console.log(data);
                family_ac_wise_list.clear();
                $.each(data,function(k,v){
                    family_ac_wise_list.row.add(v);
                })
                family_ac_wise_list.draw();
            },'json');
        });

        var family_ac_wise_list = $('.dataTables-example12').DataTable({
                "pageLength": 100,
                "responsive": true,
                "ordering":false,
                "dom": '<"html5buttons"B>lTfgitp',
                "buttons": [
                    // {extend: 'copy'},
                    {
                        "extend": 'print',
                       
                        title:'',
                        customize: function ( win ) {
                          $(win.document.body).find( 'thead' ).prepend('<tr><td colspan="10" style="font-size:30px;text-align:center;border:none !important;">'+acc_holder+' ('+ acc_no +')</td></tr><tr><td colspan="10" style="font-size:24px;text-align:center;border:none !important;">Family A/C Wise List</td></center></tr>')
                        },
                    },
                    {"extend": 'excel', title: 'Family A/C Wise List'},
                    {"extend": 'pdf', title: 'Family A/C Wise List'},
                ],
                "columns": [
                    {
                        "title": "Name",
                        "data": "name"
                    },
					{
                        "title": "DOB",
                        "data": "DOB"
                    },
					{
                        "title": "S.A.",
                        "data": "S_A",
                    },
					{
                        "title": "P-T-PPT",
                        "data": "PTP"
                    },
					{
                        "title": "DOC",
                        "data": "DOC"
                    },
                    {
                        "title": "Policy No.",
                        "data": "policy_number"
                    },
                    {
                        "title": "Mode",
                        "data": "mode_of_payment"
                    },
					{
                        "title": "Prem",
                        "data": "policy_premium"
                    },
					{
                        "title": "Last Due",
                        "data": "last_due"
                    },
					{
                        "title": "M.Date",
                        "data": "maturity_date"
                    },
                    {
                        "title": "Nominee's Name",
                        "data": "policy_nominee_name"
                    },
					{
                        "title": "Relation",
                        "data": "policy_nominee_relation"
                    },
					{
                        "title": "FUP",
                        "data": "FUP"
                    },
                    {
                        "title": "NCO",
                        "data": "policy_NCO"
                    },
                    {
                        "title": "Pen. Amt",
                        "data": "policy_pension_amt"
                    },
                    {
                        "title": "Pen. Date",
                        "data": "pension_date"
                    },
                    {
                        "title": "Loan",
                        "data": "policy_loan_amt"
                    },
					{
                        "title": "Br.",
                        "data": "branch_code"
                    }
                ],
                "language": {
                    "emptyTable": "<img src='http://trackmee.syntech.co.in/trackmee/assets/img/No-record-found.png'> "
                },  
            });
//========================================= Family Account Wise Due List REport ================================================
        var start = '';
        var end = '';
        var acc_no = '';
        var acc_holder = '';
        $(document).on('change','#family_acc_no',function(){
            $('#family_acc_holder_name').empty();
            acc_no = $(this).val();
            $.post('<?=site_url('Admin/family_account_details')?>',{acc_no:acc_no},function(data){
                console.log(data);
                $.each(data,function(k,v) {             
                    $('#family_acc_holder_name').val(v.family_head_name);
                })
            },'json');
        })

        $(document).on('click','.show_family_ac_wise_due_list',function(){
            start = $('#start_date').val();
            end = $('#end_date').val();
            acc_no = $('#family_acc_no').val();
            acc_holder = $('#family_acc_holder_name').val();
            // alert(acc_holder);
            $.post('<?=site_url('Admin/report_family_ac_wise_due_list')?>',{start:start,end:end,acc_no:acc_no},function(data){
                console.log(data);
                family_ac_wise_due_list.clear();
                $.each(data,function(k,v){
                    family_ac_wise_due_list.row.add(v);
                })
                family_ac_wise_due_list.draw();
            },'json');
        });

        // var san = $(".dataTables-example").prepend('<tfoot><th></th><th></th><th></th><th></th><th></th><th></th><th></th><th></th><th></th><th></th><th></th><th></th></tfoot>');
        var family_ac_wise_due_list = $('.dataTables-example13').DataTable({
                "pageLength": 100,
                "responsive": true,
                "ordering":false,
                "dom": '<"html5buttons"B>lTfgitp',
                "buttons": [
                    // {extend: 'copy'},
                    {
                        "extend": 'print',
                       
                        title:'',
                        // footer:true,
                        customize: function ( win ) {
                          $(win.document.body).find( 'thead' ).prepend('<tr><td colspan="12" style="font-size:30px;text-align:center;border:none !important;">'+acc_holder+' ('+ acc_no +')</td></tr><tr><td colspan="12" style="font-size:24px;text-align:center;border:none !important;">Family A/C Wise Due List for ' + start + ' to ' + end + '</td></center></tr>')
                        },
                    },
                    {"extend": 'excel', title: 'Family A/C Wise Due List'},
                    {"extend": 'pdf', title: 'Family A/C Wise Due List'},
                ],
                "columns": [
                    {
                        "title": "Name",
                        "data": "name",
                    },
                    {
                        "title": "S.A.",
                        "data": "S_A",
                    },
                    {
                        "title": "P-PPT",
                        "data": "plan_ppt"
                    },
                    {
                        "title": "DOC",
                        "data": "policy_DOC"
                    },
                    {
                        "title": "Policy No.",
                        "data": "policy_number"
                    },
                    {
                        "title": "Mode",
                        "data": "mode"
                    },
                    {
                        "title": "Prem",
                        "data": "premium",
                        // "className":"sum"
                    },
                    {
                        "title": "Due Date",
                        "data": "due_date"
                    },
                    {
                        "title": "Br.",
                        "data": "branch_code"
                    },
                    {
                        "title": "A",
                        "data": "agent_short_code"
                    },
                    {
                        "title": "DOB",
                        "data": "client_DOB"
                    },
                    {
                        "title": "Date",
                        "data": "date_of_payment",
                        "setDefaults":""
                    }
                ],
                // "footerCallback": function ( row, data, start, end, display ) { 
                //     var api = this.api(), data; // Remove the formatting to get integer data for summation 
                //     var intVal = function ( i ) { 
                //         return typeof i === 'string' ? i.replace(/[\$,]/g, '')*1 : typeof i === 'number' ? i : 0; 
                //     }; // Total over all pages 
                //     data = api.column( 6 ).data(); 
                //     total = data.length ? data.reduce( function (a, b) { return intVal(a) + intVal(b); } ) : 0; // Total over this page 
                //     data = api.column( 6 ).data(); 
                //     pageTotal = data.length ? data.reduce( function (a, b) { return intVal(a) + intVal(b); } ) : 0; 
                //     // Update footer 
                //     $( api.column( 0 ).footer() ).html( ' Total' );  
                //     $( api.column( 6 ).footer() ).html(total);  
                // },
                "language": {
                    "emptyTable": "<img src='http://trackmee.syntech.co.in/trackmee/assets/img/No-record-found.png'> "
                },  
            });
//========================================== Branch wise Report =========================================================

            var branch_wise_report = $('.dataTables-example14').DataTable({
                "pageLength": 100,
                "responsive": true,
                "ordering":false,
                "dom": '<"html5buttons"B>Tgitp',
                "buttons": [
                    // {extend: 'copy'},
                    {
                        "extend": 'print',
                       
                        title:'',
                        // footer:true,
                        customize: function ( win ) {
                          $(win.document.body).find( 'thead' ).prepend('<tr><td colspan="12" style="font-size:24px;text-align:center;border:none !important;">Branch Wise List </td></center></tr>')
                        },
                    },
                    {"extend": 'excel', title: 'Branch Wise List'},
                    {"extend": 'pdf', title: 'Branch Wise List'},
                ],
                "columns": [
                    {
                        "title": "Name",
                        "data": "name",
                    },
                    {
                        "title": "A/C",
                        "data": "client_family_acc_no"
                    },
					{
                        "title": "S.A.",
                        "data": "S_A",
                    },
					{
                        "title": "P-T-PPT",
                        "data": "PTP"
                    },
					{
                        "title": "DOC",
                        "data": "DOC"
                    },
                    {
                        "title": "Policy No.",
                        "data": "policy_number"
                    },
					{
                        "title": "Mode",
                        "data": "mode_of_payment"
                    },
					{
                        "title": "Prem",
                        "data": "policy_premium"
                    },
					{
                        "title": "Br.",
                        "data": "branch_code"
                    },
					{
                        "title": "A",
                        "data": "agent_short_code"
                    },
                    {
                        "title": "DOB",
                        "data": "DOB"
                    },
					{
                        "title": "St",
                        "data": "mode_of_status"
                    },
                ],
                "language": {
                    "emptyTable": "<img src='http://trackmee.syntech.co.in/trackmee/assets/img/No-record-found.png'> "
                },  
            });

            $('#branch_sort_by_agent').on( 'keyup', function () {
                branch_wise_report
                    .columns( 9 )
                    .search( this.value )
                    .draw();
            } );

//========================================== Agent wise Report =========================================================

            var agent_wise_report = $('.dataTables-example15').DataTable({
                "pageLength": 100,
                "responsive": true,
                "ordering":false,
                "dom": '<"html5buttons"B>lTfgitp',
                "buttons": [
                    // {extend: 'copy'},
                    {
                        "extend": 'print',
                       
                        title:'',
                        // footer:true,
                        customize: function ( win ) {
                          $(win.document.body).find( 'thead' ).prepend('<tr><td colspan="12" style="font-size:24px;text-align:center;border:none !important;">Agent Wise List </td></center></tr>')
                        },
                    },
                    {"extend": 'excel', title: 'Agent Wise List'},
                    {"extend": 'pdf', title: 'Agent Wise List'},
                ],
                "columns": [
                    {
                        "title": "Name",
                        "data": "name",
                    },
                    {
                        "title": "A/C",
                        "data": "client_family_acc_no"
                    },
					{
                        "title": "S.A.",
                        "data": "S_A",
                    },
					{
                        "title": "P-T-PPT",
                        "data": "PTP"
                    },
					{
                        "title": "DOC",
                        "data": "DOC"
                    },
                    {
                        "title": "Policy No.",
                        "data": "policy_number"
                    },
					{
                        "title": "Mode",
                        "data": "mode_of_payment"
                    },
					{
                        "title": "Prem",
                        "data": "policy_premium"
                    },
					{
                        "title": "Br.",
                        "data": "branch_code"
                    },
					{
                        "title": "A",
                        "data": "agent_short_code"
                    },
                    {
                        "title": "DOB",
                        "data": "DOB"
                    },
					{
                        "title": "St",
                        "data": "mode_of_status"
                    },
                ],
                "language": {
                    "emptyTable": "<img src='http://trackmee.syntech.co.in/trackmee/assets/img/No-record-found.png'> "
                },  
            });        
//========================================== DOC wise Report =========================================================
			var doc_status = '';
			$(document).on('change','#doc_status',function(){
				$('#family_acc_holder_name').empty();
				var doc_id = $(this).val();
				if(doc_id == 1){
					doc_status = "Available";
				}else if(doc_id == 0){
					doc_status = "Not Available";
				}else{
					doc_status = "Loan";
				}
			})
            var DOC_wise_report = $('.dataTables-example16').DataTable({
                "pageLength": 100,
                "responsive": true,
                "ordering":false,
                "dom": '<"html5buttons"B>Tgitp',
                "buttons": [
                    // {extend: 'copy'},
                    {
                        "extend": 'print',
                       
                        title:'',
                        // footer:true,
                        customize: function ( win ) {
                          $(win.document.body).find( 'thead' ).prepend('<tr><td colspan="12" style="font-size:24px;text-align:center;border:none !important;">DOC Wise List - Status : '+doc_status+'</td></center></tr>')
                        },
                    },
                    {"extend": 'excel', title: 'DOC Wise List'},
                    {"extend": 'pdf', title: 'DOC Wise List'},
                ],
                "columns": [
                    {
                        "title": "Name",
                        "data": "name",
                    },
                    {
                        "title": "A/C",
                        "data": "client_family_acc_no"
                    },
					{
                        "title": "S.A.",
                        "data": "S_A",
                    },
					{
                        "title": "P-T-PPT",
                        "data": "PTP"
                    },
					{
                        "title": "DOC",
                        "data": "DOC"
                    },
                    {
                        "title": "Policy No.",
                        "data": "policy_number"
                    },
					{
                        "title": "Mode",
                        "data": "mode_of_payment"
                    },
					{
                        "title": "Prem",
                        "data": "policy_premium"
                    },
					{
                        "title": "Br.",
                        "data": "branch_code"
                    },
					{
                        "title": "A",
                        "data": "agent_short_code"
                    },
                    {
                        "title": "DOB",
                        "data": "DOB"
                    },
					{
                        "title": "St",
                        "data": "mode_of_status"
                    },
                ],
                "language": {
                    "emptyTable": "<img src='http://trackmee.syntech.co.in/trackmee/assets/img/No-record-found.png'> "
                },  
            });

            $('#DOC_sort_by_agent').on( 'keyup', function () {
                DOC_wise_report
                    .columns( 9 )
                    .search( this.value )
                    .draw();
            } );

//========================================== NO NOMINEE wise Report =========================================================

            var no_nominee_wise_report = $('.dataTables-example17').DataTable({
                "pageLength": 100,
                "responsive": true,
                "ordering":false,
                "dom": '<"html5buttons"B>Tgitp',
                "buttons": [
                    // {extend: 'copy'},
                    {
                        "extend": 'print',
                       
                        title:'',
                        // footer:true,
                        customize: function ( win ) {
                          $(win.document.body).find( 'thead' ).prepend('<tr><td colspan="12" style="font-size:24px;text-align:center;border:none !important;">No Nominee Policy Wise List </td></center></tr>')
                        },
                    },
                    {"extend": 'excel', title: 'No Nominee Policy Wise List'},
                    {"extend": 'pdf', title: 'No Nominee Policy Wise List'},
                ],
                "columns": [
                    {
                        "title": "Name",
                        "data": "name",
                    },
                    {
                        "title": "A/C",
                        "data": "client_family_acc_no"
                    },
					{
                        "title": "S.A.",
                        "data": "S_A",
                    },
					{
                        "title": "P-T-PPT",
                        "data": "PTP"
                    },
					{
                        "title": "DOC",
                        "data": "DOC"
                    },
                    {
                        "title": "Policy No.",
                        "data": "policy_number"
                    },
					{
                        "title": "Mode",
                        "data": "mode_of_payment"
                    },
					{
                        "title": "Prem",
                        "data": "policy_premium"
                    },
					{
                        "title": "Br.",
                        "data": "branch_code"
                    },
					{
                        "title": "A",
                        "data": "agent_short_code"
                    },
                    {
                        "title": "DOB",
                        "data": "DOB"
                    },
					{
                        "title": "St",
                        "data": "mode_of_status"
                    },
                ],
                "language": {
                    "emptyTable": "<img src='http://trackmee.syntech.co.in/trackmee/assets/img/No-record-found.png'> "
                },  
            }); 

            $('#NN_sort_by_agent').on( 'keyup', function () {
                no_nominee_wise_report
                    .columns( 9 )
                    .search( this.value )
                    .draw();
            } );
//========================================= Family Cash Flow List REport ================================================
        var acc_no = '';
        var acc_holder = '';
        $(document).on('change','#family_cash_acc_no',function(){
            $('#family_cash_acc_holder_name').empty();
            acc_no = $(this).val();
            $.post('<?=site_url('Admin/family_account_details')?>',{acc_no:acc_no},function(data){
                console.log(data);
                $.each(data,function(k,v) {             
                    $('#family_cash_acc_holder_name').val(v.family_head_name);
                })
            },'json');
        })

        $(document).on('click','.show_family_cash_wise_list',function(){
            acc_no = $('#family_cash_acc_no').val();
            acc_holder = $('#family_cash_acc_holder_name').val();
            // alert(acc_holder);
            $.post('<?=site_url('Admin/report_family_cash_flow_wise')?>',{acc_no:acc_no},function(data){
                console.log(data);
                family_cash_flow_tt.clear();
                $.each(data,function(k,v){
                    family_cash_flow_tt.row.add(v);
                })
                family_cash_flow_tt.draw();
            },'json');
        });

        // var san = $(".dataTables-example").prepend('<tfoot><th></th><th></th><th></th><th></th><th></th><th></th><th></th><th></th><th></th><th></th><th></th><th></th></tfoot>');
        var family_cash_flow_tt = $('.dataTables-example18').DataTable({
                "pageLength": 100,
                "responsive": true,
                "ordering":false,
                "dom": '<"html5buttons"B>lTfgitp',
                "buttons": [
                    // {extend: 'copy'},
                    {
                        "extend": 'print',
                       
                        title:'',
                        // footer:true,
                        customize: function ( win ) {
                          $(win.document.body).find( 'thead' ).prepend('<tr><td colspan="11" style="font-size:30px;text-align:center;border:none !important;">'+acc_holder+' ('+ acc_no +')</td></tr><tr><td colspan="11" style="font-size:24px;text-align:center;border:none !important;">FAMILY CASH FLOW</td></center></tr>')
                        },
                    },
                    {"extend": 'excel', title: 'FAMILY CASH FLOW'},
                    {"extend": 'pdf', title: 'FAMILY CASH FLOW'},
                ],
                "columns": [
					{
                        "title": "SB Due Date",
                        "data": "SB_Due_date"
                    },
					{
                        "title": "SB Due Amt.",
                        "data": "SB_due_amount"
                    },
					{
                        "title": "___",
                        "data": "blank"
                    },
                    {
                        "title": "Name",
                        "data": "name",
                    },
                    {
                        "title": "Age",
                        "data": "SB_due_age",
                        // "className":"sum"
                    },
					{
                        "title": "Policy No.",
                        "data": "policy_number"
                    },
                     {
                        "title": "P-T-PPT",
                        "data": "P_T_PPT"
                    },
                    {
                        "title": "S.A.",
                        "data": "S_A",
                    },
					{
                        "title": "DOC",
                        "data": "DOC"
                    },
					{
                        "title": "prem.",
                        "data": "policy_premium"
                    },
                    {
                        "title": "M.",
                        "data": "mode_of_payment"
                    },

                ],
                "language": {
                    "emptyTable": "<img src='http://trackmee.syntech.co.in/trackmee/assets/img/No-record-found.png'> "
                },  
            });                   

        function printDiv(divName) {
           var printContents = document.getElementById(divName).innerHTML;     
           var originalContents = document.body.innerHTML;       
           document.body.innerHTML = printContents;      
           window.print();      
           document.body.innerHTML = originalContents;
        }
//========================================== CLIENT CASH wise Report =========================================================
        var client_id = '';
        var client_name = '';
        $(document).on('change','#client_cash_id',function(){
            $('#client_name1').empty();
            client_id = $(this).val();
            // alert(client_id);
            $.post('<?=site_url('Admin/client_details_for_medical_report')?>',{client_id:client_id},function(data){
                console.log(data);
                $.each(data,function(k,v) {             
                    $('#client_name1').val(v.name);
                })
            },'json');
        })

        $(document).on('click','.show_client_cash_flow_wise_list',function(){
            client_id = $('#client_cash_id').val();
            client_name = $('#client_name1').val();
            $.post('<?=site_url('Admin/report_client_cash_flow_wise')?>',{client_id:client_id},function(data){
                console.log(data);
                client_cash_wise_report.clear();
                $.each(data,function(k,v){
                    client_cash_wise_report.row.add(v);
                })
                client_cash_wise_report.draw();
            },'json');
        });
            
            var client_cash_wise_report = $('.dataTables-example19').DataTable({
                "pageLength": 100,
                "responsive": true,
                // "bfilter":false,
                "ordering":false,
                "dom": '<"html5buttons"B>Tgitp',
                "buttons": [
                    // {extend: 'copy'},
                    {
                        "extend": 'print',
                       
                        title:'',
                        // footer:true,
                        customize: function ( win ) {
                          $(win.document.body).find( 'thead' ).prepend('<tr><td colspan="12" style="font-size:24px;text-align:center;border:none !important;">'+client_name+' </td></tr><tr><td colspan="12" style="font-size:24px;text-align:center;border:none !important;"> CASH FLOW</td></tr>')
                        },
                    },
                    {"extend": 'excel', title: 'CLIENT CASH FLOW'},
                    {"extend": 'pdf', title: 'CLIENT CASH FLOW'},
                ],
                "aoColumns": [
					{
                        "title": "SB Due Date",
                        "data": "SB_Due_date"
                    },
					{
                        "title": "SB Due Amt.",
                        "data": "SB_due_amount"
                    },
					{
                        "title": "___",
                        "data": "blank"
                    },
                    {
                        "title": "Name",
                        "data": "name",
                    },
                    {
                        "title": "Age",
                        "data": "SB_due_age",
                        // "className":"sum"
                    },
					{
                        "title": "Policy No.",
                        "data": "policy_number"
                    },
                     {
                        "title": "P-T-PPT",
                        "data": "P_T_PPT"
                    },
                    {
                        "title": "S.A.",
                        "data": "S_A",
                    },
					{
                        "title": "DOC",
                        "data": "DOC"
                    },
					{
                        "title": "prem.",
                        "data": "policy_premium"
                    },
                    {
                        "title": "M.",
                        "data": "mode_of_payment"
                    },
                ],
                "language": {
                    "emptyTable": "<img src='http://trackmee.syntech.co.in/trackmee/assets/img/No-record-found.png'> "
                }, 
            });               

//========================================== CLIENT SURNAME wise Report =========================================================
            
        var client_id = '';
        var client_name = '';
        $(document).on('change','#client_surname_id',function(){
            $('#client_name2').empty();
            client_id = $(this).val();
            // alert(client_id);
            $.post('<?=site_url('Admin/client_details_for_medical_report')?>',{client_id:client_id},function(data){
                console.log(data);
                $.each(data,function(k,v) {             
                    $('#client_name2').val(v.name);
                })
            },'json');
        })

        $(document).on('click','.show_client_surname_wise_list',function(){
            client_id = $('#client_surname_id').val();
            client_name = $('#client_name2').val();
            $.post('<?=site_url('Admin/report_client_surname_wise')?>',{client_id:client_id},function(data){
                console.log(data);
                client_surname_wise_report.clear();
                $.each(data,function(k,v){
                    client_surname_wise_report.row.add(v);
                })
                client_surname_wise_report.draw();
            },'json');
        });

            var client_surname_wise_report = $('.dataTables-example20').DataTable({
                "pageLength": 100,
                "responsive": true,
                // "bfilter":false,
                "ordering":false,
                "dom": '<"html5buttons"B>Tgitp',
                "buttons": [
                    // {extend: 'copy'},
                    {
                        "extend": 'print',
                       
                        title:'',
                        // footer:true,
                        customize: function ( win ) {
                          $(win.document.body).find( 'thead' ).prepend('<tr><td colspan="12" style="font-size:24px;text-align:center;border:none !important;">'+client_name+'</td></tr><tr><td colspan="12" style="font-size:24px;text-align:center;border:none !important;">Surename wise List</td></tr>')
                        },
                    },
                    {"extend": 'excel', title: 'Client Surename wise List'},
                    {"extend": 'pdf', title: 'Client Surename wise List'},
                ],
                "aoColumns": [
                    {
                        "title": "Name",
                        "data": "name",
                    },
                    {
                        "title": "A/C",
                        "data": "client_family_acc_no"
                    },
					{
                        "title": "S.A.",
                        "data": "S_A",
                    },
					{
                        "title": "P-T-PPT",
                        "data": "PTP"
                    },
					{
                        "title": "DOC",
                        "data": "DOC"
                    },
                    {
                        "title": "Policy No.",
                        "data": "policy_number"
                    },
					{
                        "title": "Mode",
                        "data": "mode_of_payment"
                    },
					{
                        "title": "Prem",
                        "data": "policy_premium"
                    },
					{
                        "title": "Br.",
                        "data": "branch_code"
                    },
					{
                        "title": "A",
                        "data": "agent_short_code"
                    },
                    {
                        "title": "DOB",
                        "data": "DOB"
                    },
					{
                        "title": "St",
                        "data": "mode_of_status"
                    },
                ],
                "language": {
                    "emptyTable": "<img src='http://trackmee.syntech.co.in/trackmee/assets/img/No-record-found.png'> "
                }, 
            });  

            $('#client_surname_wise_report').on( 'keyup', function () {
                policy_number_wise_report
                    .columns( 9 )
                    .search( this.value )
                    .draw();
            } );
       
//========================================== CLIENT ADDRESS wise Report =========================================================
            
            var client_address_wise_report = $('.dataTables-example21').DataTable({
                "pageLength": 100,
                "responsive": true,
                // "bfilter":false,
                "ordering":false,
                "dom": '<"html5buttons"B>Tgitp',
                "buttons": [
                    // {extend: 'copy'},
                    {
                        "extend": 'print',
                       
                        title:'',
                        // footer:true,
                        customize: function ( win ) {
                          $(win.document.body).find( 'thead' ).prepend('<tr><td colspan="12" style="font-size:24px;text-align:center;border:none !important;">Client Address wise List</td></center></tr>')
                        },
                    },
                    {"extend": 'excel', title: 'Client Address wise List'},
                    {"extend": 'pdf', title: 'Client Address wise List'},
                ],
                "aoColumns": [
                    {
                        "title": "Name",
                        "data": "name",
                    },
                    {
                        "title": "Residential Address",
                        "data": "client_residential_address"
                    },
                    {
                        "title": "Office Address.",
                        "data": "client_office_address",
                    },
                    {
                        "title": "Area",
                        "data": "client_area"
                    },
                    {
                        "title": "Pri Mobile",
                        "data": "client_pri_mobile_number"
                    },
                    {
                        "title": "Sec Mobile",
                        "data": "client_sec_mobile_number"
                    }
                ],
                "language": {
                    "emptyTable": "<img src='http://trackmee.syntech.co.in/trackmee/assets/img/No-record-found.png'> "
                }, 
            });  

        
//========================================== FAMILY BIRTHDAY wise Report =========================================================
            
            var acc_no = '';
            var acc_holder = '';
            $(document).on('change','#family_DOB_acc_no',function(){
                $('#family_DOB_acc_holder_name').empty();
                acc_no = $(this).val();
                $.post('<?=site_url('Admin/family_account_details')?>',{acc_no:acc_no},function(data){
                    console.log(data);
                    $.each(data,function(k,v) {             
                        $('#family_DOB_acc_holder_name').val(v.family_head_name);
                    })
                },'json');
            })

            $(document).on('click','.show_family_DOB_wise_list',function(){
                acc_no = $('#family_DOB_acc_no').val();
                acc_holder = $('#family_DOB_acc_holder_name').val();
                $.post('<?=site_url('Admin/report_family_DOB_wise_report')?>',{acc_no:acc_no},function(data){
                    console.log(data);
                    family_DOB_wise_report.clear();
                    $.each(data,function(k,v){
                        family_DOB_wise_report.row.add(v);
                    })
                    family_DOB_wise_report.draw();
                },'json');
            });

            var family_DOB_wise_report = $('.dataTables-example22').DataTable({
                "pageLength": 100,
                "responsive": true,
                // "bfilter":false,
                "ordering":false,
                "dom": '<"html5buttons"B>Tgitp',
                "buttons": [
                    // {extend: 'copy'},
                    {
                        "extend": 'print',
                       
                        title:'',
                        // footer:true,
                        customize: function ( win ) {
                          $(win.document.body).find( 'thead' ).prepend('<tr><td colspan="12" style="font-size:24px;text-align:center;border:none !important;">'+acc_holder+'</td></tr><tr><td colspan="12" style="font-size:24px;text-align:center;border:none !important;"> Family Birthday wise List</td></tr>')
                        },
                    },
                    {"extend": 'excel', title: 'Family Birthday wise List'},
                    {"extend": 'pdf', title: 'Family Birthday wise List'},
                ],
                "aoColumns": [
                    {
                        "title": "Name",
                        "data": "name",
                    },
                    {
                        "title": "DOB",
                        "data": "DOB"
                    },
                    {
                        "title": "DOA",
                        "data": "DOA",
                    },
                    {
                        "title": "Blood Group",
                        "data": "client_blood_group"
                    }
                ],
                "language": {
                    "emptyTable": "<img src='http://trackmee.syntech.co.in/trackmee/assets/img/No-record-found.png'> "
                }, 
            });

//========================================== FAMILY Loan wise Report =========================================================
            
            var acc_no = '';
            var acc_holder = '';
            $(document).on('change','#family_loan_acc_no',function(){
                $('#family_loan_acc_holder_name').empty();
                acc_no = $(this).val();
                $.post('<?=site_url('Admin/family_account_details')?>',{acc_no:acc_no},function(data){
                    console.log(data);
                    $.each(data,function(k,v) {             
                        $('#family_loan_acc_holder_name').val(v.family_head_name);
                    })
                },'json');
            })

            $(document).on('click','.show_family_loan_wise_list',function(){
                acc_no = $('#family_loan_acc_no').val();
                acc_holder = $('#family_loan_acc_holder_name').val();
                $.post('<?=site_url('Admin/report_family_loan_wise_report')?>',{acc_no:acc_no},function(data){
                    console.log(data);
                    family_loan_wise_report.clear();
                    $.each(data,function(k,v){
                        family_loan_wise_report.row.add(v);
                    })
                    family_loan_wise_report.draw();
                },'json');
            });

            var family_loan_wise_report = $('.dataTables-example23').DataTable({
                "pageLength": 100,
                "responsive": true,
                // "bfilter":false,
                "ordering":false,
                "dom": '<"html5buttons"B>Tgitp',
                "buttons": [
                    // {extend: 'copy'},
                    {
                        "extend": 'print',
                       
                        title:'',
                        // footer:true,
                        customize: function ( win ) {
                          $(win.document.body).find( 'thead' ).prepend('<tr><td colspan="12" style="font-size:24px;text-align:center;border:none !important;">'+acc_holder+'</td></tr><tr><td colspan="12" style="font-size:24px;text-align:center;border:none !important;">'+acc_holder+'</td></tr>')
                        },
                    },
                    {"extend": 'excel', title: 'Family Loan Chart'},
                    {"extend": 'pdf', title: 'Family Loan Chart'},
                ],
                "aoColumns": [
                    {
                        "title": "Name",
                        "data": "name",
                    },
                    {
                        "title": "Policy No.",
                        "data": "policy_number"
                    },
                    {
                        "title": "S.A.",
                        "data": "S_A",
                    },
                    {
                        "title": "P-T-PPT",
                        "data": "PTP"
                    },
                    {
                        "title": "DOC",
                        "data": "DOC"
                    },
                    {
                        "title": "Mode",
                        "data": "mode_of_payment"
                    },
					 {
                        "title": "Prem.",
                        "data": "policy_premium"
                    },
                    {
                        "title": "Last Due",
                        "data": "due_date"
                    },
                    {
                        "title": "Loan Amt",
                        "data": "policy_loan_amt"
                    },
                    {
                        "title": "Maturity",
                        "data": "maturity_date"
                    },
                    {
                        "title": "Remark",
                        "data": "remark"
                    }
                ],
                "language": {
                    "emptyTable": "<img src='http://trackmee.syntech.co.in/trackmee/assets/img/No-record-found.png'> "
                }, 
            });  


//========================================== FAMILY Pension wise Report =========================================================
            
            var acc_no = '';
            var acc_holder = '';
            $(document).on('change','#family_pension_acc_no',function(){
                $('#family_pension_acc_holder_name').empty();
                acc_no = $(this).val();
                $.post('<?=site_url('Admin/family_account_details')?>',{acc_no:acc_no},function(data){
                    console.log(data);
                    $.each(data,function(k,v) {             
                        $('#family_pension_acc_holder_name').val(v.family_head_name);
                    })
                },'json');
            })

            $(document).on('click','.show_family_pension_wise_list',function(){
                acc_no = $('#family_pension_acc_no').val();
                acc_holder = $('#family_pension_acc_holder_name').val();
                $.post('<?=site_url('Admin/report_family_pension_wise_report')?>',{acc_no:acc_no},function(data){
                    console.log(data);
                    family_pension_wise_report.clear();
                    $.each(data,function(k,v){
                        family_pension_wise_report.row.add(v);
                    })
                    family_pension_wise_report.draw();
                },'json');
            });

            var family_pension_wise_report = $('.dataTables-example24').DataTable({
                "pageLength": 100,
                "responsive": true,
                // "bfilter":false,
                "ordering":false,
                "dom": '<"html5buttons"B>Tgitp',
                "buttons": [
                    // {extend: 'copy'},
                    {
                        "extend": 'print',
                       
                        title:'',
                        // footer:true,
                        customize: function ( win ) {
                          $(win.document.body).find( 'thead' ).prepend('<tr><td colspan="12" style="font-size:24px;text-align:center;border:none !important;">'+ acc_holder+'</td></tr><tr><td colspan="12" style="font-size:24px;text-align:center;border:none !important;">Family Pension Chart</td></tr>')
                        },
                    },
                    {"extend": 'excel', title: 'Family Pension Chart'},
                    {"extend": 'pdf', title: 'Family Pension Chart'},
                ],
                "aoColumns": [
                    {
                        "title": "Name",
                        "data": "name",
                    },
                    {
                        "title": "Policy No.",
                        "data": "policy_number"
                    },
                    {
                        "title": "S.A.",
                        "data": "S_A",
                    },
                    {
                        "title": "P-T-PPT",
                        "data": "PTP"
                    },
                    {
                        "title": "DOC",
                        "data": "DOC"
                    },
                    {
                        "title": "Mode",
                        "data": "mode_of_payment"
                    },
					 {
                        "title": "Prem.",
                        "data": "policy_premium"
                    },
                    {
                        "title": "Last Due",
                        "data": "due_date"
                    },
                    {
                        "title": "NCO",
                        "data": "policy_NCO"
                    },
                    {
                        "title": "Pens. Mode",
                        "data": "mode_of_pension"
                    },
                    {
                        "title": "Pens. Amt",
                        "data": "policy_pension_amt"
                    },
                    {
                        "title": "Pens. St. Dt.",
                        "data": "pension_start_date"
                    }
                ],
                "language": {
                    "emptyTable": "<img src='http://trackmee.syntech.co.in/trackmee/assets/img/No-record-found.png'> "
                }, 
            });  

//========================================== FAMILY acc office wise Report =========================================================
            
            var acc_no = '';
            var acc_holder = '';
            $(document).on('change','#family_acc_office_no',function(){
                $('#family_acc_office_holder_name').empty();
                acc_no = $(this).val();
                $.post('<?=site_url('Admin/family_account_details')?>',{acc_no:acc_no},function(data){
                    console.log(data);
                    $.each(data,function(k,v) {             
                        $('#family_acc_office_holder_name').val(v.family_head_name);
                    })
                },'json');
            })

            $(document).on('click','.show_family_ac_office_wise_list',function(){
                acc_no = $('#family_acc_office_no').val();
                acc_holder = $('#family_acc_office_holder_name').val();
                $.post('<?=site_url('Admin/report_family_ac_office_wise_report')?>',{acc_no:acc_no},function(data){
                    console.log(data);
                    family_ac_office_wise_report.clear();
                    $.each(data,function(k,v){
                        family_ac_office_wise_report.row.add(v);
                    })
                    family_ac_office_wise_report.draw();
                },'json');
            });

            var family_ac_office_wise_report = $('.dataTables-example25').DataTable({
                "pageLength": 100,
                "responsive": true,
                // "bfilter":false,
                "ordering":false,
                "dom": '<"html5buttons"B>Tgitp',
                "buttons": [
                    // {extend: 'copy'},
                    {
                        "extend": 'print',
                       
                        title:'',
                        // footer:true,
                        customize: function ( win ) {
                          $(win.document.body).find( 'thead' ).prepend('<tr><td colspan="12" style="font-size:24px;text-align:center;border:none !important;">'+acc_holder+' ('+acc_no+') </td></tr><tr><td colspan="12" style="font-size:24px;text-align:center;border:none !important;">Family A/C Office List </td></tr>')
                        },
                    },
                    {"extend": 'excel', title: ''+acc_holder+'('+acc_no+') family A/C List '},
                    {"extend": 'pdf', title: ''+acc_holder+'('+acc_no+') family A/C List '},
                ],
                "aoColumns": [
                    {
                        "title": "Name",
                        "data": "name"
                    },
					{
                        "title": "DOB",
                        "data": "DOB"
                    },
					{
                        "title": "S.A.",
                        "data": "S_A",
                    },
					{
                        "title": "P-T-PPT",
                        "data": "PTP"
                    },
					{
                        "title": "DOC",
                        "data": "DOC"
                    },
                    {
                        "title": "Policy No.",
                        "data": "policy_number"
                    },
                    {
                        "title": "Mode",
                        "data": "mode_of_payment"
                    },
					{
                        "title": "Prem",
                        "data": "policy_premium"
                    },
					{
                        "title": "DUE Date",
                        "data": "last_due"
                    },
					{
                        "title": "M.Date",
                        "data": "maturity_date"
                    },
					{
                        "title": "CLS",
                        "data": "policy_class"
                    },
                    {
                        "title": "Nominee's Name",
                        "data": "policy_nominee_name"
                    },
					{
                        "title": "FUP",
                        "data": "FUP"
                    },
					{
                        "title": "P",
                        "data": "doc_status"
                    },
					{
                        "title": "Br.",
                        "data": "branch_code"
                    },
					{
                        "title": "A",
                        "data": "agent_short_code"
                    },
                    {
                        "title": "S",
                        "data": "policy_status"
                    }
                ],
                "language": {
                    "emptyTable": "<img src='http://trackmee.syntech.co.in/trackmee/assets/img/No-record-found.png'> "
                }, 
            });  
    </script>