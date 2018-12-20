
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

            <?php if($LIC == 'agent'){?>
                $('#agent').addClass('active');
                document.title = "LIC Corp | Agent Details"
            <?php } elseif ($LIC == 'branch'){?>
                $('#branch').addClass('active');
                document.title = "LIC Corp | Branch Details"
            <?php } elseif ($LIC == 'client'){?>
                $('#client').addClass('active');
                document.title = "LIC Corp | Client Details"
            <?php } elseif ($LIC == 'policy'){?>
                $('#policy').addClass('active');
                document.title = "LIC Corp | Policy Details"
            <?php } elseif ($LIC == 'comission'){?>
                $('#comission').addClass('active');
                document.title = "LIC Corp | Comisssion Details"
            <?php } elseif ($LIC == 'dash'){?>
                $('#dashboard').addClass('active');
                document.title = "LIC Corp | Dashboard"
            <?php } elseif ($LIC == 'family'){?>
                $('#family').addClass('active');
                document.title = "LIC Corp | Family Details"
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

            $.validator.setDefaults({
                submitHandler: function (form) {
                    form.submit();
                }
            });

            $('.datepicker1').datepicker({
                format: 'yyyy-mm-dd',
                autoclose:true,
            });

            function caps(element){
                element.value = element.value.toUpperCase();
            }
//======================== Branch Footer code===========================================
            $('#editBranch').on('show.bs.modal', function(e) {
                var id = e.relatedTarget.id;
                var branch_details = id.split('-');   

                $('.branch_id_edit').val(branch_details[0]);
                $('.branch_name_edit').val(branch_details[1]);
                $('.branch_code_edit').val(branch_details[2]);
            });

            $('#deleteBranch').on('show.bs.modal', function(e) {
                var id = e.relatedTarget.id;
                $.post('<?=site_url('Admin/branch_verification')?>',{branch_id:id},function(data){
                    console.log();
                });
                $('.branch_id_delete').val(id);
            });

            $(document).on('click','.add_new_branch_policy',function(){
                window.location.href = "<?php  echo site_url('Admin/branch_details'); ?>";
            });

//======================== Agent Footer code===========================================
            $('#editAgent').on('show.bs.modal', function(e) {
                var id = e.relatedTarget.id;
                var agent_details = id.split('-');   

                $('.agent_id_edit').val(agent_details[0]);
                $('.agent_name_edit').val(agent_details[1]);
                $('.agent_short_code_edit').val(agent_details[2]);
                $('.agent_code_edit').val(agent_details[3]);
            });

            $('#deleteAgent').on('show.bs.modal', function(e) {
                var id = e.relatedTarget.id;
                $('.agent_id_delete').val(id);
            });

            $(document).on('click','.add_new_agent_policy',function(){
                window.location.href = "<?php  echo site_url('Admin/agent_details'); ?>";
            });

//======================== Client Footer code===========================================
            $(document).on('click','.new_client_reg',function(){
                $('#client_deatilssss').removeClass();
                $('#new_client_registerss').removeClass();
                $('#client_deatilssss').addClass('col-sm-7');
                $('#new_client_registerss').addClass('col-sm-5');
                $('#new_client_registerss').show();
                $('#register_client_details').removeClass();
                $('#register_client_details').addClass('col-lg-5 hidden');
                $('.new_client_reg').hide();
            });
            $(document).on('click','.close_new_client',function(){
                $('#client_deatilssss').removeClass();
                $('#client_deatilssss').addClass('col-sm-12');
                $('#new_client_registerss').hide();
                $('.new_client_reg').show();
                $('#register_client_details').removeClass();
                $('#register_client_details').addClass('col-lg-5 hidden');
                 window.location.href = "<?php  echo site_url('Admin/client_details'); ?>";
            });

            // $('#editClient').on('show.bs.modal', function(e) {
            //     var id = e.relatedTarget.id;
            //     var client_details = id.split('*');   

            //     $('.client_id_edit').val(client_details[0]);
            //     $('.client_prefix_edit').append('<option value='+client_details[1]+'>'+client_details[1]+'</option>');
            //     $('.client_last_name_edit').val(client_details[2]);
            //     $('.client_first_name_edit').val(client_details[3]);
            //     $('.client_middle_name_edit').val(client_details[4]);
            //     $('.client_address_edit').val(client_details[5]);
            //     $('.client_area_edit').val(client_details[6]);
            //     $('.client_PAN_edit').val(client_details[7]);
            //     $('.client_aadhar_edit').val(client_details[8]);
            //     $('.client_DOB_edit').val(client_details[9]);
            //     $('.client_birth_place_edit').val(client_details[10]);
            //     $('.client_DOA_edit').val(client_details[11]);
            //     $('.client_maiden_first_name_edit').val(client_details[12]);
            //     $('.client_maiden_middle_name_edit').val(client_details[13]);
            //     $('.client_maiden_last_name_edit').val(client_details[14]);
            //     $('.client_gender_edit').val(client_details[15]);
            //     $('.client_blood_group_edit').val(client_details[16]);
            //     $('.client_familly_acc_no_edit').val(client_details[17]);
            //     $('.client_father_name_edit').val(client_details[18]);
            //     $('.client_pri_mobile_number_edit').val(client_details[19]);
            //     $('.client_sec_mobile_number_edit').val(client_details[20]);
            //     $('.client_pri_phone_number_edit').val(client_details[21]);
            //     $('.client_sec_phone_number_edit').val(client_details[22]);
            //     $('.client_pri_residential_number_edit').val(client_details[23]);
            //     $('.client_sec_residential_number_edit').val(client_details[24]);
            //     $('.client_email_id_edit').val(client_details[25]);
            // });

            $('#deleteClient').on('show.bs.modal', function(e) {
                var id = e.relatedTarget.id;
                $('.client_id_delete').val(id);
            });

            $(document).on('click','.add_new_client_policy',function(){
                // var student_id = $(this).find('.student_details_profile').text();
                window.location.href = "<?php  echo site_url('Admin/client_details'); ?>";
            }); 

            $(document).on('click','.add_new_client_family_account',function(){
                // var student_id = $(this).find('.student_details_profile').text();
                window.location.href = "<?php  echo site_url('Admin/family_details'); ?>";
            });

            $(document).on('change','#client_prefix',function(){
                var prefix = $(this).val();
                if(prefix == 'Mrs.'){
                    $('#MLN').removeClass();
                    $('#MLN').addClass('form-group');
                    $('#MFN').removeClass();
                    $('#MFN').addClass('form-group');
                    $('#MMN').removeClass();
                    $('#MMN').addClass('form-group');
                }
                else{
                    $('#MLN').removeClass();
                    $('#MLN').addClass('form-group hidden');
                    $('#MFN').removeClass();
                    $('#MFN').addClass('form-group hidden');
                    $('#MMN').removeClass();
                    $('#MMN').addClass('form-group hidden');
                }
            });

            $('.add_doc').click(function(){
                var filecount = 1;
                var new_doc = '<tr>'+
                        '<th>'+
                        '<select name="doc_name[]" class="form-control doc_name" id="" style="border:none;" required>'+
                            '<option value="Adhar_Card">Adhar Card</option><option value="Pan_Card">Pan Card</option><option value="School_Leaving">School Leaving</option><option value="Passport">Passport</option>'+
                            '<option value="Marriege_Certificate">Marriege Certificate</option><option value="Light_Bill">Light Bill</option><option value="Ration_Card">Ration Card</option><option value="Voting_Card">Voting Card</option>'+
                        '</select></th>'+
                        '<th>'+
                        '<input type="file" name="doc_image[]" class="form-control" accept="image/gif,image/png,image/jpeg" multiple="" required style="border:none;">'+
                        '</th>'+
                    '</tr>';
                $('.doc_stock').append(new_doc);
                filecount++;    
            });

            $(document).on('click','.edit_new_client_family_account_family',function(){
                $('#edit_client_family_acc_no').removeClass();
                $('#edit_new_client_family_account_family').removeClass();
                $('#edit_client_family_acc_no').addClass('col-sm-8 hidden');
                $('#edit_new_client_family_account_family').addClass('col-sm-1 hidden');
                $('#list_of_family_account').removeClass();
                $('#add_new_client_family_account').removeClass();
                $('#list_of_family_account').addClass('col-sm-8');
                $('#add_new_client_family_account').addClass('col-sm-1');
            });
            $(document).on('click','.edit_client_blood_group_button',function(){
                $('#client_blood_group_edit').removeClass();
                $('#client_blood_group_edit').addClass('col-sm-8 hidden');
                $('#list_of_blood_group').removeClass();
                $('#list_of_blood_group').addClass('col-sm-8'); 
                $('#edit_client_blood_group_button').removeClass();
                $('#edit_client_blood_group_button').addClass('col-sm-1 hidden');
            });
            $(document).on('click','.edit_client_bank_acc_type_button',function(){
                $('#edit_client_bank_acc_type').removeClass();
                $('#edit_client_bank_acc_type').addClass('col-sm-8 hidden');
                $('#client_bank_acc_type').removeClass();
                $('#client_bank_acc_type').addClass('col-sm-8'); 
                $('#edit_client_bank_acc_type_button').removeClass();
                $('#edit_client_bank_acc_type_button').addClass('col-sm-1 hidden');
            }); 
            $(document).on('click','.edit_client_prefix_button',function(){
                $('#prefix_client').removeClass();
                $('#prefix_client').addClass('col-sm-8 hidden');
                $('#prefix_client_1').removeClass();
                $('#prefix_client_1').addClass('col-sm-8'); 
                $('#edit_client_prefix_button').removeClass();
                $('#edit_client_prefix_button').addClass('col-sm-1 hidden');
            });

            $(document).on('click','.clientttt_fetch',function(){
                $('.client_document_detailsss').empty();
                var client_id = $(this).find('.client_id_details_fetch').text();
                // alert(client_id);
                $.post('<?=site_url('Admin/fetch_client_details_wise_id')?>',{client_id:client_id},function(data){
                    console.log(data);
                    $.each(data,function(k,v){
                        $(".client_view_name").text(v.client_prefix+''+v.client_last_name+' '+v.client_first_name+' '+v.client_middle_name);
                        $(".client_view_residential_address").text(v.client_residential_address);
                        $(".client_view_office_address").text(v.client_office_address);
                        $(".client_view_area").text(v.client_area);
                        $(".client_view_PAN_number").text(v.client_PAN);
                        $(".client_view_adhar_number").text(v.client_aadhar);
                        $(".client_view_DOB").text(v.DOB_date);
                        $(".client_view_birth_place").text(v.client_birth_place);
                        $(".client_view_DOA").text(v.DOA_date);
                        $(".client_view_maiden_name").text(v.client_maiden_name);
                        $(".client_view_gender").text(v.client_gender);
                        $(".client_view_blood_group").text(v.client_blood_group);
                        $(".client_view_family_account_number").text(v.client_family_acc_no);
                        $(".client_view_father_name").text(v.client_father_name);
                        $(".client_view_pri_mobile_number").text(v.client_pri_mobile_number);
                        $(".client_view_sec_mobile_number").text(v.client_sec_mobile_number);
                        $(".client_view_pri_phone_number").text(v.client_pri_phone_number);
                        $(".client_view_sec_phone_number").text(v.client_sec_phone_number);
                        $(".client_view_res_pri_phone_number").text(v.client_pri_residential_number);
                        $(".client_view_res_sec_phone_number").text(v.client_sec_residential_number);
                        $(".client_view_email_id").text(v.client_email_id);
                        $(".view_client_bank_name").text(v.client_bank_name);
                        $(".view_client_bank_branch").text(v.client_bank_branch);
                        $(".view_client_bank_acc_type").text(v.client_bank_acc_type);   
                        $(".view_client_bank_acc_no").text(v.client_bank_acc_no);
                        $(".view_client_bank_ifsc_code").text(v.client_bank_ifsc_code);
                        $(".view_client_bankmicr_no").text(v.client_bankmicr_no);
                        $(".view_client_bank_cheque_no").text(v.client_bank_cheque_no);

                        $('.doc_client_id').val(v.client_id);
                        $('.client_id_delete_record').val(v.client_id);
                        $('.client_id_edit').val(v.client_id);
                        $('.client_prefix_edit').val(v.client_prefix);
                        $('.client_last_name_edit').val(v.client_last_name);
                        $('.client_first_name_edit').val(v.client_first_name);
                        $('.client_middle_name_edit').val(v.client_middle_name);
                        $('.edit_client_family_acc_no').val(v.client_family_acc_no);
                        $('.client_residential_address_edit').val(v.client_residential_address);
                        $('.client_office_address_edit').val(v.client_office_address);
                        $('.client_area_edit').val(v.client_area);
                        $('.client_PAN_edit').val(v.client_PAN);
                        $('.client_aadhar_edit').val(v.client_aadhar);
                        $('.client_DOB_edit').val(v.DOB_date);
                        $('.client_birth_place_edit').val(v.client_birth_place);
                        $('.client_DOA_edit').val(v.DOA_date);
                        $('.client_maiden_first_name_edit').val(v.client_maiden_name);
                        $('.client_blood_group_edit').val(v.client_blood_group);
                        $('.client_familly_acc_no_edit').val(v.client_family_acc_no);
                        $('.client_father_name_edit').val(v.client_father_name);
                        $('.client_pri_mobile_number_edit').val(v.client_pri_mobile_number);
                        $('.client_sec_mobile_number_edit').val(v.client_sec_mobile_number);
                        $('.client_pri_phone_number_edit').val(v.client_pri_phone_number);
                        $('.client_sec_phone_number_edit').val(v.client_sec_phone_number);
                        $('.client_pri_residential_number_edit').val(v.client_pri_residential_number);
                        $('.client_sec_residential_number_edit').val(v.client_sec_residential_number);
                        $('.client_email_id_edit').val(v.client_email_id);
                        $('.edit_client_bank_name').val(v.client_bank_name);
                        $('.edit_client_bank_branch').val(v.client_bank_branch);
                        $('.edit_client_bank_acc_type').val(v.client_bank_acc_type);
                        $('.edit_client_bank_acc_no').val(v.client_bank_acc_no);
                        $('.edit_client_bank_ifsc_code').val(v.client_bank_ifsc_code);
                        $('.edit_client_bankmicr_no').val(v.client_bankmicr_no);
                        $('.edit_client_bank_cheque_no').val(v.client_bank_cheque_no);
                    });
                },'json');
                
                $.post('<?=site_url('Admin/fetch_client_document_wise_id')?>',{client_id:client_id},function(data){
                    console.log(data);
                    $.each(data,function(k,v){
                        $('.client_document_detailsss').append('<tr><td>'+v.doc_name+'</td><td><a href="'+v.doc_image+'" traget="_blank" download ><i class="fa fa-download fa-2x"></i></a> &nbsp <a href="'+v.doc_image+'" traget="_blank" ><i class="fa fa-print fa-2x"></i></a></td></tr>');
                    });
                },'json');

                
                $('#client_deatilssss').removeClass();
                $('#register_client_details').removeClass();
                $('#client_deatilssss').addClass('col-sm-7');
                $('#register_client_details').addClass('col-sm-5');
                $('#new_client_registerss').removeClass();
                $('#new_client_registerss').addClass('col-lg-5 hidden')
                // $('#new_client_registerss').show();
                // $('.new_client_reg').hide();
            });

            $(document).on('click','.close_register_client_details',function(){
                $('#client_deatilssss').removeClass();
                $('#client_deatilssss').addClass('col-sm-12');
                $('#register_client_details').removeClass();
                $('#register_client_details').addClass('col-lg-5 hidden');
                $('.new_client_reg').show();
                window.location.href = "<?php  echo site_url('Admin/client_details'); ?>";
            });

            $(document).on('click','.update_register_client_details',function(){
                $('#edit_details_client').removeClass();
                $('#details_of_client').addClass('hidden');
            })

//======================= Policy Footer Code =============================================           
           
           $(document).on('click','.new_policy_reg',function(){
                $('#policy_deatilssss').removeClass();
                $('#new_policy_registerss').removeClass();
                $('#register_policy_details').removeClass();
                $('#policy_deatilssss').addClass('col-sm-7');
                $('#new_policy_registerss').addClass('col-sm-5');
                $('#register_policy_details').addClass('col-sm-5 hidden');
                $('#new_policy_registerss').show();
                $('.new_policy_reg').hide();
                $('#register_policy_update_details').removeClass();
                $('#register_policy_update_details').addClass('col-sm-5 hidden');
            });
            $(document).on('click','.close_new_policy',function(){
                $('#policy_deatilssss').removeClass();
                $('#policy_deatilssss').addClass('col-sm-12');
                $('#new_policy_registerss').hide();
                $('.new_policy_reg').show();
                 window.location.href = "<?php  echo site_url('Admin/policy_details'); ?>";
            });

            $('#editComission').on('show.bs.modal', function(e) {
                var id = e.relatedTarget.id;
                var comission_details = id.split('*');   

                $('.comission_id_edit').val(comission_details[0]);
                $('.comission_date_edit').val(comission_details[1]);
                $('.comission_policy_number_edit').val(comission_details[2]);
                $('.comission_premium_edit').val(comission_details[3]);
                $('.comission_due_date_edit').val(comission_details[4]);
                $('.comission_percentage_edit').val(comission_details[5]);
                $('.comission_amount_edit').val(comission_details[6]);
            });

            $('#deleteComission').on('show.bs.modal', function(e) {
                var id = e.relatedTarget.id;
                $('.comission_id_delete').val(id);
            });

            $(document).on('change','#policy_number',function(){
                var policy_number = $(this).val();
                $.post('<?=site_url('Admin/already_policy_number_check')?>',{policy_number:policy_number}, function(res){
                    console.log(res);
                    if(res == 0){
                        $('.policy_number_verification').hide();
                        $('.policy_number_verification').text('');
                    }
                    else{
                        $('.policy_number_verification').show();
                        // $('.policy_number_verification').removeClass();
                        // $('.policy_number_verification').addClass('policy_number_verification');
                        $('.policy_number_verification').text('Policy Number Alredy Exits.');
                    }
                },'json');
            })

            $(document).on('change','#policy_payment_mode,#policy_payment_mode1,#DOC_date,#policy_PPT',function(){
                $('#policy_last_due_date').empty();
                $('#policy_last_due_date1').empty();
                var payment = $('#policy_payment_mode').val();
                if(payment == 0){
                    var payment_mode = $('#policy_payment_mode1').val();
                    var doc2 = $('#DOC_date1').val();
                    var PPT = $('#policy_PPT1').val();
                }else{
                    var payment_mode = $('#policy_payment_mode').val();
                    var doc2 = $('#DOC_date').val();
                    var PPT = $('#policy_PPT').val();
                }
                var date = doc2.split('-');
                var doc10 = date[1] + '/' + date[0] + '/' + date[2];
                var doc = new Date(doc10);
                var PPT_month=parseInt(PPT)*parseInt(12);
                var doc1 = new Date(doc);
                var last_year = doc1.setMonth(doc1.getMonth() - 12 + PPT_month);
                // alert(doc1);
                if (payment_mode == 1) {
                    var doc1 = new Date(doc);
                    var last_year = doc1.setMonth(doc1.getMonth() - 12 + PPT_month);
                    var new_date = doc1.getDate() + "-" + parseInt(doc1.getMonth()+1) + "-" + doc1.getFullYear();
                    if(payment == 0){
                        $('#policy_last_due_date1').val(new_date);
                    }else{
                        $('#policy_last_due_date').val(new_date);
                    }
                }else if(payment_mode == 2){
                    var doc1 = new Date(doc);
                    var last_year = doc1.setMonth(doc1.getMonth() - 6 + PPT_month);
                    var new_date = doc1.getDate() + "-" + parseInt(doc1.getMonth()+1) + "-" + doc1.getFullYear();
                    if(payment == 0){
                        $('#policy_last_due_date1').val(new_date);
                    }else{
                        $('#policy_last_due_date').val(new_date);
                    }
                }else if(payment_mode == 3){
                    var doc1 = new Date(doc);
                    var last_year = doc1.setMonth(doc1.getMonth() - 3 + PPT_month);
                    var new_date = doc1.getDate() + "-" + parseInt(doc1.getMonth()+1) + "-" + doc1.getFullYear();
                    if(payment == 0){
                        $('#policy_last_due_date1').val(new_date);
                    }else{
                        $('#policy_last_due_date').val(new_date);
                    }
                }else if(payment_mode == 12){
                    var doc1 = new Date(doc);
                    doc1.setMonth(doc1.getMonth() - 1 + PPT_month);
                    var new_date = doc1.getDate() + "-" + parseInt(doc1.getMonth()+1) + "-" + doc1.getFullYear();
                     if(payment == 0){
                        $('#policy_last_due_date1').val(new_date);
                    }else{
                        $('#policy_last_due_date').val(new_date);
                    }
                }else if(payment_mode == 4){
                    var doc1 = new Date(doc);
                    doc1.setMonth(doc1.getMonth() - 1 + PPT_month);
                    var new_date = doc1.getDate() + "-" + parseInt(doc1.getMonth()+1) + "-" + doc1.getFullYear();
                    if(payment == 0){
                        $('#policy_last_due_date1').val(new_date);
                    }else{
                        $('#policy_last_due_date').val(new_date);
                    }
                }else if(payment_mode == 5){
                    
                    if(payment == 0){
                        $('#policy_last_due_date1').val(doc2);
                    }else{
                        $('#policy_last_due_date').val(doc2);
                    }
                }
            })

            $(document).on('change','.policy_class_details',function(){
                var policy_class = $(this).val();
                if(policy_class == 'MED'){
                    $('#doctor_name').removeClass();
                    $('#doctor_name').addClass('form-group');
                    $('#medical_date').removeClass();
                    $('#medical_date').addClass('form-group');
                    $('#BP').removeClass();
                    $('#BP').addClass('form-group');
                    $('#vaccin').removeClass();
                    $('#vaccin').addClass('form-group');
                    $('#pulse').removeClass();
                    $('#pulse').addClass('form-group');
                    $('#spect').removeClass();
                    $('#spect').addClass('form-group');
                    $('#operation').removeClass();
                    $('#operation').addClass('form-group');
                    $('#special_report').removeClass();
                    $('#special_report').addClass('form-group'); 
                    $('#teeth').removeClass();
                    $('#teeth').addClass('form-group');
                }
                else{
                    $('#doctor_name').removeClass();
                    $('#doctor_name').addClass('form-group hidden');
                    $('#medical_date').removeClass();
                    $('#medical_date').addClass('form-group hidden');
                    $('#BP').removeClass();
                    $('#BP').addClass('form-group hidden');
                    $('#vaccin').removeClass();
                    $('#vaccin').addClass('form-group hidden');
                    $('#pulse').removeClass();
                    $('#pulse').addClass('form-group hidden');
                    $('#spect').removeClass();
                    $('#spect').addClass('form-group hidden');
                    $('#operation').removeClass();
                    $('#operation').addClass('form-group hidden');
                    $('#special_report').removeClass();
                    $('#special_report').addClass('form-group hidden');
                }
            });
            $(document).on('change','#policy_original_policy,.edit_policy_original_policy',function(){
                var loan = $(this).val();
                if(loan == 2){
                    $('#loan_amount').removeClass();
                    $('#loan_amount').addClass('form-group');
                    $('#loan_date').removeClass();
                    $('#loan_date').addClass('form-group loan_date'); 
                    $('#loan_details').removeClass();
                    $('#loan_details').addClass('ibox-title');
                }
                else{
                    $('#loan_amount').removeClass();
                    $('#loan_amount').addClass('form-group hidden');
                    $('#loan_date').removeClass();
                    $('#loan_date').addClass('form-group hidden');
                    $('#loan_details').removeClass();
                    $('#loan_details').addClass('ibox-title hidden');
                }
            });

            $('.add_previous_policy').click(function(){
                var PP_details = '<tr id="org">'+
                        '<th id="PP_name">'+
                        '<select name="PP_name[]" class="form-control PP_name" style="border:none;" required>'+
                            '<option value="Self">Self</option><option value="Father">Father</option><option value="Mother">Mother</option><option value="Sister">Sister</option>'+
                            '<option value="Brother">Brother</option><option value="Husband">Husband</option>'+
                        '</th>'+
                        '<th id="PP_number">'+
                        '<input type="text" name="PP_number[]" class="form-control" style="border:none;" required>'+
                        '</th>'+
                    '</tr>';
                $('.previous_policy_stock').append(PP_details);    
            });

            $('.add_SB').click(function(){
                var SB_details = '<tr id="org">'+
                        '<th id="SB_Due_date">'+
                        '<input type="text" name="SB_Due_date[]" class="form-control SB_Due_date" style="border:none;" required>'+
                        '</th>'+
                        '<th id="SB_amount">'+
                        '<input type="text" name="SB_Due_amount[]" class="form-control" style="border:none;" required>'+
                        '</th>'+
                        '<th id="SB_age">'+
                        '<input type="text" name="SB_Due_age[]" class="form-control" style="border:none;" required>'+
                        '</th>'+
                    '</tr>';
                $('.SB_stock').append(SB_details);    
            });

            $('.add_new_SB').click(function(){
                var SB_details = '<tr id="org">'+
                        '<th id="SB_Due_date">'+
                        '<input type="text" name="SB_Due_date[]" class="form-control SB_Due_date" style="border:none;" required>'+
                        '</th>'+
                        '<th id="SB_amount">'+
                        '<input type="text" name="SB_Due_amount[]" class="form-control" style="border:none;" required>'+
                        '</th>'+
                        '<th id="SB_age">'+
                        '<input type="text" name="SB_Due_age[]" class="form-control" style="border:none;" required>'+
                        '</th>'+
                    '</tr>';
                $('.new_SB_Due').append(SB_details);    
            });

            $(document).on('change','#policy_client_details',function(){
                $(".policy_PAN_number").empty();
                $(".PP_details").empty();
                var client_id = $(this).val();
                $.post('<?=site_url('Admin/fetch_client_details_wise_id')?>',{client_id:client_id},function(data){
                    console.log(data);
                    $.each(data,function(k,v){
                        $(".policy_PAN_number").val(v.client_PAN);
                    });
                },'json');
            })

            $(document).on('click','.edit_new_age_proff',function(){
                $('#edit_age_proff').removeClass();
                $('#edit_age_proff').addClass('col-sm-8 hidden');
                $('#edit_new_age_proff').removeClass();
                $('#edit_new_age_proff').addClass('col-sm-1 hidden');
                $('#list_edit_age_proff').removeClass();
                $('#list_edit_age_proff').addClass('col-sm-8');
            });

            $(document).on('click','.edit_new_mode_of_payment',function(){
                $('#edit_mode_of_payemnt').removeClass();
                $('#edit_mode_of_payemnt').addClass('col-sm-8 hidden');
                $('#edit_new_mode_of_payment').removeClass();
                $('#edit_new_mode_of_payment').addClass('col-sm-1 hidden');
                $('#list_edit_mode_of_payemnt').removeClass();
                $('#list_edit_mode_of_payemnt').addClass('col-sm-8');
            });
            $(document).on('click','.edit_new_GST',function(){
                $('#edit_GST').removeClass();
                $('#edit_GST').addClass('col-sm-8 hidden');
                $('#edit_new_GST').removeClass();
                $('#edit_new_GST').addClass('col-sm-1 hidden');
                $('#list_edit_GST').removeClass();
                $('#list_edit_GST').addClass('col-sm-8');
            });

            $(document).on('click','.edit_new_class',function(){
                $('#edit_class').removeClass();
                $('#edit_class').addClass('col-sm-8 hidden');
                $('#edit_new_class').removeClass();
                $('#edit_new_class').addClass('col-sm-1 hidden');
                $('#list_edit_class').removeClass();
                $('#list_edit_class').addClass('col-sm-8');
            });

            $(document).on('click','.edit_new_status',function(){
                $('#edit_status').removeClass();
                $('#edit_status').addClass('col-sm-8 hidden');
                $('#edit_new_status').removeClass();
                $('#edit_new_status').addClass('col-sm-1 hidden');
                $('#list_edit_status').removeClass();
                $('#list_edit_status').addClass('col-sm-8');
            });

            $(document).on('click','.edit_new_original_policy',function(){
                $('#edit_original_policy').removeClass();
                $('#edit_original_policy').addClass('col-sm-8 hidden');
                $('#edit_new_original_policy').removeClass();
                $('#edit_new_original_policy').addClass('col-sm-1 hidden');
                $('#list_edit_original_policy').removeClass();
                $('#list_edit_original_policy').addClass('col-sm-8');
            });

            $(document).on('click','.edit_new_pension_mode',function(){
                $('#edit_pension_mode').removeClass();
                $('#edit_pension_mode').addClass('col-sm-8 hidden');
                $('#edit_new_pension_mode').removeClass();
                $('#edit_new_pension_mode').addClass('col-sm-1 hidden');
                $('#list_edit_pension_mode').removeClass();
                $('#list_edit_pension_mode').addClass('col-sm-8');
            });

             $(document).on('click','.edit_new_name_agent',function(){
                $('#edit_name_agent').removeClass();
                $('#edit_name_agent').addClass('col-sm-8 hidden');
                $('#edit_new_name_agent').removeClass();
                $('#edit_new_name_agent').addClass('col-sm-1 hidden');
                $('#list_edit_name_agent').removeClass();
                $('#list_edit_name_agent').addClass('col-sm-8');
            });

            $(document).on('click','.edit_new_name_branch',function(){
                $('#edit_name_branch').removeClass();
                $('#edit_name_branch').addClass('col-sm-8 hidden');
                $('#edit_new_name_branch').removeClass();
                $('#edit_new_name_branch').addClass('col-sm-1 hidden');
                $('#list_edit_name_branch').removeClass();
                $('#list_edit_name_branch').addClass('col-sm-8');
            });

            $(document).on('click','.Policyssss',function(){
                $(".SB_details").empty();
                $(".PP_details").empty();
                $(".update_SB_Due").empty();
                var policy_number = $(this).find('.Client_Policy_Number').text();
                $('.policy_id_delete').val(policy_number);
                $.post('<?=site_url('Admin/Policy_no_wise_details')?>',{policy_number:policy_number},function(data){
                    console.log(data);
                    $.each(data,function(k,v){
                        $('.policy_view_agent_name').text(v.agent_name);
                        $('.policy_view_branch_name').text(v.branch_name);
                        $('.policy_view_client_name').text(v.client_prefix+' '+v.client_last_name+' '+v.client_first_name+' '+v.client_middle_name);
                        $('.policy_view_policy_number').text(v.policy_number);
                        $('.policy_view_age').text(v.policy_age);
                        $('.policy_view_age_proof').text(v.mode_of_proof);
                        $('.policy_view_sum_assured').text(v.policy_sum_assurance);
                        $('.policy_view_plan').text(v.policy_plan);
                        $('.policy_view_term').text(v.policy_term);
                        $('.policy_view_PPT').text(v.policy_PPT);
                        $('.policy_view_payment_mode').text(v.mode_of_payment);
                        $('.policy_view_DOC').text(v.DOC_date);
                        $('.policy_view_premium').text(v.policy_premium);
                        $('.policy_view_GST').text(v.mode_of_GST);
                        $('.policy_view_due_date').text(v.last_due_date);
                        $('.policy_view_maturity_date').val(v.maturity_date);
                        $('.policy_view_DAB').text(v.policy_DAB);
                        $('.policy_view_DAB_premium').text(v.policy_DAB_premium);
                        $('.policy_view_extra_premium').text(v.policy_extra_premium);
                        $('.policy_view_prop_date').text(v.prop_date);
                        $('.policy_view_class').text(v.policy_class);
                        $('.policy_view_qualification').text(v.policy_qualification);
                        $('.policy_view_term_rider').text(v.policy_term_rider);
                        $('.policy_view_critical_illness').text(v.policy_critical_illness);
                        $('.policy_view_premium_waiver').text(v.policy_premium_waiver);
                        $('.policy_view_GRN_add').text(v.policy_grn_add);
                        $('.policy_view_status').text(v.mode_of_status);
                        $('.policy_view_FU_premium').text(v.FU_premium_date);
                        $('.policy_view_original_policy').text(v.mode_of_original_policy);
                        $('.policy_view_NCO').text(v.policy_NCO);
                        $('.policy_view_income').text(v.policy_income);
                        $('.policy_view_loan_amount').text(v.policy_loan_amt);
                        $('.policy_view_loan_date').text(v.loan_date);
                        $('.policy_view_name').text(v.policy_nominee_name);
                        $('.policy_view_relation').text(v.policy_nominee_relation);
                        $('.policy_view_nominee_age').text(v.policy_nominee_age);
                        $('.policy_view_occupation').text(v.policy_occupation);
                        $('.policy_view_designation').text(v.policy_designation);
                        $('.policy_view_pension_mode').text(v.mode_of_pension);
                        $('.policy_view_pension_amount').text(v.policy_pension_amt);
                        $('.policy_view_start_date').text(v.pension_start_date);
                        $('.policy_view_assign_trust').text(v.policy_assignment_trust);
                        $('.policy_view_remark').text(v.policy_remark);
                        $('.policy_view_father_name').text(v.policy_father_name);
                        $('.policy_view_mother_name').text(v.policy_mother_name);
                        $('.policy_view_brother_name').text(v.policy_brother_name);
                        $('.policy_view_sister_name').text(v.policy_sister_name);
                        $('.policy_view_son_name').text(v.policy_son_name);
                        $('.policy_view_daughter_name').text(v.policy_doughter_name);
                        $('.policy_view_spouse_name').text(v.policy_spouce_name);
                        $('.policy_view_spouse_occupation').text(v.policy_spouce_occupation);
                        $('.policy_view_spouse_income').text(v.policy_spouce_income);
                        $('.policy_view_doctor_name').text(v.policy_doctor_name);
                        $('.policy_view_medical_date').text(v.medical_date);
                        $('.policy_view_identification_mark').text(v.policy_identification_mark);
                        $('.policy_view_height').text(v.policy_height);
                        $('.policy_view_weight').text(v.policy_weight);
                        $('.policy_view_ABD').text(v.policy_ABD);
                        $('.policy_view_chest').text(v.policy_chest);
                        $('.policy_view_BP').text(v.policy_BP);
                        $('.policy_view_pulse').text(v.policy_pulse);
                        $('.policy_view_vaccin').text(v.policy_vaccin);
                        $('.policy_view_spect').text(v.policy_spect);
                        $('.policy_view_operation').text(v.policy_operation);
                        $('.policy_view_special_report').text(v.policy_spl_reports);

                        $('.new_SB_client_id').val(v.policy_client_id);
                        $('.new_SB_policy_number').val(v.policy_number);
                        $('.policy_view_policy_id_edit').val(v.policy_id);
                        $('.policy_view_agent_name_edit').val(v.agent_name);
                        $('.policy_view_branch_name_edit').val(v.branch_name);
                        $('.policy_view_client_prefix_edit').val(v.client_prefix);
                        $('.policy_view_client_first_name_edit').val(v.client_first_name);
                        $('.policy_view_client_middle_name_edit').val(v.client_middle_name);
                        $('.policy_view_client_last_name_edit').val(v.client_last_name);
                        $('.policy_view_policy_number_edit').val(v.policy_number);
                        $('.policy_view_age_edit').val(v.policy_age);
                        $('.policy_view_age_proof_edit').val(v.mode_of_proof);
                        $('.policy_view_sum_assured_edit').val(v.policy_sum_assurance);
                        $('.policy_view_plan_edit').val(v.policy_plan);
                        $('.policy_view_term_edit').val(v.policy_term);
                        $('.policy_view_PPT_edit').val(v.policy_PPT);
                        $('.policy_view_payment_mode_edit').val(v.mode_of_payment);
                        $('.policy_view_DOC_edit').val(v.DOC_date);
                        $('.policy_view_premium_edit').val(v.policy_premium);
                        $('.policy_view_GST_edit').val(v.mode_of_GST);
                        $('.policy_view_due_date_edit').val(v.last_due_date);
                        $('.policy_view_maturity_date_edit').val(v.maturity_date);
                        $('.policy_view_DAB_edit').val(v.policy_DAB);
                        $('.policy_view_DAB_premium_edit').val(v.policy_DAB_premium);
                        $('.policy_view_extra_premium_edit').val(v.policy_extra_premium);
                        $('.policy_view_prop_date_edit').val(v.prop_date);
                        $('.policy_view_class_edit').val(v.policy_class);
                        $('.policy_view_qualification_edit').val(v.policy_qualification);
                        $('.policy_view_term_rider_edit').val(v.policy_term_rider);
                        $('.policy_view_critical_illness_edit').val(v.policy_critical_illness);
                        $('.policy_view_premium_waiver_edit').val(v.policy_premium_waiver);
                        $('.policy_view_GRN_add_edit').val(v.policy_grn_add);
                        $('.policy_view_status_edit').val(v.mode_of_status);
                        $('.policy_view_FU_premium_edit').val(v.FU_premium_date);
                        $('.policy_view_original_policy_edit').val(v.mode_of_original_policy);
                        $('.policy_view_NCO_edit').val(v.policy_NCO);
                        $('.policy_view_income_edit').val(v.policy_income);
                        $('.policy_view_loan_amount_edit').val(v.policy_loan_amt);
                        $('.policy_view_loan_date_edit').val(v.loan_date);
                        $('.policy_view_name_edit').val(v.policy_nominee_name);
                        $('.policy_view_relation_edit').val(v.policy_nominee_relation);
                        $('.policy_view_nominee_age_edit').val(v.policy_nominee_age);
                        $('.policy_view_occupation_edit').val(v.policy_occupation);
                        $('.policy_view_designation_edit').val(v.policy_designation);
                        $('.policy_view_pension_mode_edit').val(v.mode_of_pension);
                        $('.policy_view_pension_amount_edit').val(v.policy_pension_amt);
                        $('.policy_view_start_date_edit').val(v.pension_start_date);
                        $('.policy_view_assign_trust_edit').val(v.policy_assignment_trust);
                        $('.policy_view_remark_edit').val(v.policy_remark);
                        $('.policy_view_father_name_edit').val(v.policy_father_name);
                        $('.policy_view_mother_name_edit').val(v.policy_mother_name);
                        $('.policy_view_brother_name_edit').val(v.policy_brother_name);
                        $('.policy_view_sister_name_edit').val(v.policy_sister_name);
                        $('.policy_view_son_name_edit').val(v.policy_son_name);
                        $('.policy_view_daughter_name_edit').val(v.policy_doughter_name);
                        $('.policy_view_spouse_name_edit').val(v.policy_spouce_name);
                        $('.policy_view_spouse_occupation_edit').val(v.policy_spouce_occupation);
                        $('.policy_view_spouse_income_edit').val(v.policy_spouce_income);
                        $('.policy_view_doctor_name_edit').val(v.policy_doctor_name);
                        $('.policy_view_medical_date_edit').val(v.medical_date);
                        $('.policy_view_identification_mark_edit').val(v.policy_identification_mark);
                        $('.policy_view_height_edit').val(v.policy_height);
                        $('.policy_view_weight_edit').val(v.policy_weight);
                        $('.policy_view_ABD_edit').val(v.policy_ABD);
                        $('.policy_view_chest_edit').val(v.policy_chest);
                        $('.policy_view_teeth_edit').val(v.policy_teeth);
                        $('.policy_view_BP_edit').val(v.policy_BP);
                        $('.policy_view_pulse_edit').val(v.policy_pulse);
                        $('.policy_view_vaccin_edit').val(v.policy_vaccin);
                        $('.policy_view_spect_edit').val(v.policy_spect);
                        $('.policy_view_spect_type_edit').val(v.policy_spect_type);
                        $('.policy_view_spect_left_edit').val(v.policy_spect_left);
                        $('.policy_view_spect_right_edit').val(v.policy_spect_right);
                        $('.policy_view_operation_edit').val(v.policy_operation);
                        $('.policy_view_special_report_edit').val(v.policy_spl_reports);
                    });
                },'json');
                $.post('<?=site_url('Admin/Policy_no_SB_Due_details')?>',{policy_number:policy_number},function(data){
                    console.log(data);
                    $.each(data,function(k,v){
                        $(".SB_details").append('<tr><td>'+v.SB_date+'</td><td>'+v.SB_due_amount+'</td><td>'+v.SB_due_age+'</td></tr>');
                        $(".update_SB_Due").append('<tr id="org">'+
                            '<th class="hidden" id="SB_Due_id">'+
                            '<input type="text" name="SB_Due_id[]" class="form-control SB_Due_id" style="border:none;" value="'+v.SB_due_id+'" required>'+
                            '</th>'+
                            '<th id="SB_Due_date">'+
                            '<input type="text" name="SB_Due_date[]" class="form-control SB_Due_date" style="border:none;" value="'+v.SB_date+'" required>'+
                            '</th>'+
                            '<th id="SB_amount">'+
                            '<input type="text" name="SB_Due_amount[]" class="form-control" style="border:none;" value="'+v.SB_due_amount+'" required>'+
                            '</th>'+
                            '<th id="SB_age">'+
                            '<input type="text" name="SB_Due_age[]" class="form-control" style="border:none;" value="'+v.SB_due_age+'" required>'+
                            '</th>'+
                        '</tr>');
                    });
                },'json');

                $.post('<?=site_url('Admin/Policy_no_PP_details')?>',{policy_number:policy_number},function(data){
                    console.log(data);
                    $.each(data,function(k,v){
                        $(".PP_details").append('<tr><td>'+v.PP_name+'</td><td>'+v.PP_number+'</td></tr>');
                    });
                },'json');

                $('#policy_deatilssss').removeClass();
                $('#register_policy_details').removeClass();
                $('#policy_deatilssss').addClass('col-sm-7');
                $('#register_policy_details').addClass('col-sm-5');
                $('#new_policy_registerss').removeClass();
                $('#new_policy_registerss').addClass('col-lg-5 hidden');
                $('#register_policy_update_details').removeClass();
                $('#register_policy_update_details').addClass('col-sm-5 hidden');
                 $('.new_policy_reg').show();
            });

            $(document).on('click','.close_new_policy_details',function(){
                $('#policy_deatilssss').removeClass();
                $('#register_policy_details').removeClass();
                $('#policy_deatilssss').addClass('col-sm-12');
                $('#register_policy_details').addClass('col-sm-5 hidden');
                $('#new_policy_registerss').removeClass();
                $('#new_policy_registerss').addClass('col-lg-5 hidden');
                $('#register_policy_update_details').removeClass();
                $('#register_policy_update_details').addClass('col-sm-5 hidden');
                 window.location.href = "<?php  echo site_url('Admin/policy_details'); ?>";
            });

            $(document).on('change','#policy_spect_insert',function(){
                var spect = $(this).val();
                // alert(spect);
                if(spect == 'Yes'){
                    $('#spect_type').removeClass();
                    $('#spect_type').addClass('form-group');
                }else{
                    $('#spect_type').removeClass();
                    $('#spect_type').addClass('form-group hidden');
                    $('#spect_no_left').removeClass();
                    $('#spect_no_right').removeClass();
                    $('#spect_no_left').addClass('form-group hidden');
                    $('#spect_no_right').addClass('form-group hidden');
                }
            });

            $(document).on('change','#policy_spect_type_insert',function(){
                var spect = $(this).val();
                if(spect == 'Far'){
                    $('#spect_no_left').removeClass();
                    $('#spect_no_right').removeClass();
                    $('#spect_no_left').addClass('form-group');
                    $('#spect_no_right').addClass('form-group');
                }else{
                    $('#spect_no_left').removeClass();
                    $('#spect_no_right').removeClass();
                    $('#spect_no_left').addClass('form-group hidden');
                    $('#spect_no_right').addClass('form-group hidden');
                }
            });

            $(document).on('click','.update_policy_details',function(){
                $('#register_policy_update_details').removeClass();
                $('#register_policy_update_details').addClass('col-sm-5');
                $('#register_policy_details').removeClass();
                $('#register_policy_details').addClass('col-sm-5 hidden');
                $('#new_policy_registerss').removeClass();
                $('#new_policy_registerss').addClass('col-sm-5 hidden');
                
            });



//========================================== Comission Footer ====================================================

            $(document).on('click','.new_comission_reg',function(){
                $('#comission_deatilssss').removeClass();
                $('#new_comission_registerss').removeClass();
                $('#comission_deatilssss').addClass('col-sm-7');
                $('#new_comission_registerss').addClass('col-sm-5');
                $('#new_comission_registerss').show();
                $('.new_comission_reg').hide();
            });
            $(document).on('click','.close_new_comission',function(){
                $('#comission_deatilssss').removeClass();
                $('#comission_deatilssss').addClass('col-sm-12');
                $('#new_comission_registerss').hide();
                $('.new_comission_reg').show();
            });

            $(document).on('change','#comission_policy_number',function(){
                $(".comission_agent_id").empty();
                $(".comission_client_id").empty();
                $(".comission_policy_number").empty();
                $(".comission_premium").empty();
                $(".comission_mode_of_payment").empty();
                var policy_number = $(this).val();
                // alert(policy_number);
                $.post('<?=site_url('Admin/fetch_policy_details_wise_id')?>',{policy_number:policy_number},function(data){
                    console.log(data);
                    $.each(data,function(k,v){
                        $(".comission_agent_id").append('<option value="'+v.agent_id+'">'+v.agent_name+'</option');
                        $(".comission_client_id").append('<option value="'+v.client_id+'">'+v.client_prefix+' '+v.client_last_name+' '+v.client_first_name+' '+v.client_middle_name+'</option');
                        $(".comission_policy_number").val(v.policy_number);
                        $(".comission_premium").val(v.policy_premium);
                        $(".comission_mode_of_payment").val(v.policy_mode_of_payment);
                    });
                },'json')
            });

            $(document).on('change','.comission_percentage,#comission_policy_number',function(){
                $('.comission_amount').empty();
                var per =  $(this).val();
                var premium = $('.comission_premium').val();

                var comission_amount = (parseFloat(per)/100)*parseFloat(premium);
                
                $('.comission_amount').val(comission_amount);
            });

//========================================== Family Footer ====================================================

            $('#deleteFamily').on('show.bs.modal', function(e) {
                var id = e.relatedTarget.id;
                $('.family_id_delete').val(id);
            }); 

            $('#editFamily').on('show.bs.modal', function(e) {
                var id = e.relatedTarget.id;
                var family_details = id.split('-');   

                $('.family_id_edit').val(family_details[0]);
                $('.family_head_name_edit').val(family_details[1]);
                $('.family_acc_number_edit').val(family_details[2]);
            });
        </script>

    <script>
        $(document).ready(function(){
            $('.dataTables-example').DataTable({
                pageLength: 10,
                responsive: true,
                dom: '<"html5buttons"B>lTfgitp',
                buttons: [
                    // {extend: 'copy'},
                    // {extend: 'csv'},
                    {extend: 'excel', title: 'ExampleFile'},
                    {extend: 'pdf', title: 'ExampleFile'},
                ]

            });  

            $("#agentDetails").validate({
            rules: {
               agent_name: {
                    required: true,
                    pattern:/^[a-zA-Z\s]*$/,
                     maxlength:100            
                },
                agent_code: {
                    required:true,
                    pattern:/^[a-zA-Z0-9\s]*$/, 
                    maxlength:10                
                },
                agent_short_code: {
                    required:true,
                    pattern:/^[a-zA-Z0-9\s]*$/, 
                    maxlength:10                
                }
            },
            messages: {
                agent_name: {
                    required: "Please enter agent Name.",
                    pattern: "Please Don't Enter special Symbols."
                },
                agent_code: {
                    required: "Please enter agent code.",
                    pattern: "Please Don't Enter special Symbols."
                },
                agent_short_code: {
                    required: "Please enter agent short code.",
                    pattern: "Please Don't Enter special Symbols."
                }
            }
        });
        $("#update_agentDetails").validate({
            rules: {
               agent_name: {
                    required: true,
                    pattern:/^[a-zA-Z\s]*$/,
                     maxlength:100            
                },
                agent_code: {
                    required:true,
                    pattern:/^[a-zA-Z0-9\s]*$/, 
                    maxlength:10                
                },
                agent_short_code: {
                    required:true,
                    pattern:/^[a-zA-Z0-9\s]*$/, 
                    maxlength:10                
                }
            },
            messages: {
                agent_name: {
                    required: "Please enter agent Name.",
                    pattern: "Please Don't Enter special Symbols."
                },
                agent_code: {
                    required: "Please enter agent code.",
                    pattern: "Please Don't Enter special Symbols."
                },
                agent_short_code: {
                    required: "Please enter agent short code.",
                    pattern: "Please Don't Enter special Symbols."
                }
            }
        }); 

        $("#branchDetails").validate({
            rules: {
                branch_name: {
                    required: true,
                    pattern:/^[a-zA-Z0-9\s]*$/,
                    maxlength:40          
                },
                branch_code: {
                    required:true,
                    pattern:/^[a-zA-Z0-9\s]*$/,
                    maxlength:10                 
                }
            },
            messages: {
                branch_name: {
                    required: "Please enter branch Name.",
                    pattern: "Please Don't Enter special Symbols."
                },
                branch_code: {
                    required: "Please enter branch code.",
                    pattern: "Please Don't Enter special Symbols."
                }
            }
        });

        $("#update_branchDetails").validate({
            rules: {
                branch_name: {
                    required: true,
                    pattern:/^[a-zA-Z0-9\s]*$/          
                },
                branch_code: {
                    required:true,
                    pattern:/^[a-zA-Z0-9\s]*$/                 
                }
            },
            messages: {
                branch_name: {
                    required: "Please enter branch Name.",
                    pattern: "Please Don't Enter special Symbols."
                },
                branch_code: {
                    required: "Please enter branch code.",
                    pattern: "Please Don't Enter special Symbols."
                }
            }
        });    

        $("#clientDetails").validate({
            rules: {
                client_prefix: {
                    required: true         
                },
                client_last_name: {
                    required: true,
                    pattern:/^[a-zA-Z\s]*$/          
                },
                client_first_name: {
                    required: true,
                    pattern:/^[a-zA-Z\s]*$/          
                },
                client_middle_name: {
                    pattern:/^[a-zA-Z0-9\s]*$/           
                },
                client_address: {
                    required:true         
                },
                client_PAN: {
                     // pattern:/^[A-Z]{5}[0-9]{4}[A-Z]{1}$/          
                },
                client_aadhar: {
                    minlength:14,
                    maxlength:14           
                },
                client_DOB: {
                    required:true                
                },
                client_gender: {
                    required: true         
                },
                client_blood_group: {         
                },
                client_familly_acc_no: {  
                    required:true
                    // min:1     
                },
                client_pri_mobile_number: {
                    // digits:true,
                    minlength:10,
                    maxlength:11          
                },
                client_sec_mobile_number: {
                    // digits:true,
                    minlength:10,
                    maxlength:11          
                },
                client_pri_phone_number: { 
                    minlength:10,
                    maxlength:15        
                }, 
                client_sec_phone_number: { 
                    minlength:10,
                    maxlength:15        
                }, 
                client_pri_residential_number: {
                    minlength:10,
                    maxlength:15        
                },
                client_sec_residential_number: { 
                    minlength:10,
                    maxlength:15        
                },
                client_email_id: {
                    pattern:/^[+a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/              
                }
            },
            messages: {
                client_aadhar: {
                    required: "Please enter Client Adhar.",
                    digits: "Please Enter Digits.",
                    minlength:"Please Enter only 12 digits",
                    maxlength:"Please Enter only 12 digits"
                },
                client_pri_mobile_number: {
                    // digits: "Please Enter Digits.",
                    minlength:"Please Enter only 11 digits",
                    maxlength:"Please Enter only 10 digits"
                },
                client_sec_mobile_number: {
                    // digits: "Please Enter Digits.",
                    minlength:"Please Enter only 10 digits",
                    maxlength:"Please Enter only 10 digits"
                },
                client_pri_phone_number: {
                    minlength:"Please Enter only 11 digits",
                    maxlength:"Please Enter only 11 digits"
                },
                client_sec_phone_number: {
                    // digits: "Please Enter Digits.",
                    minlength:"Please Enter only 11 digits",
                    maxlength:"Please Enter only 11 digits"
                },
                client_pri_residential_number: {
                    // digits: "Please Enter Digits.",
                    minlength:"Please Enter only 11 digits",
                    maxlength:"Please Enter only 11 digits"
                },
                client_sec_residential_number: {
                    // digits: "Please Enter Digits.",
                    minlength:"Please Enter only 11 digits",
                    maxlength:"Please Enter only 11 digits"
                },
                client_PAN: {
                    required: "Please enter Client Adhar.",
                    pattern:"Please enter valid pattern."

                },
                client_family_acc_no: {
                    required: "Please Select family Account."
                },
                // client_PAN: {
                //     required: "Please enter  Name.",
                //     pattern: "Please Don't Enter special Symbols."
                // },
                // agent_name: {
                //     required: "Please enter agent Name.",
                //     pattern: "Please Don't Enter special Symbols."
                // },
                // agent_name: {
                //     required: "Please enter agent Name.",
                //     pattern: "Please Don't Enter special Symbols."
                // },
                // agent_name: {
                //     required: "Please enter agent Name.",
                //     pattern: "Please Don't Enter special Symbols."
                // },
                // agent_name: {
                //     required: "Please enter agent Name.",
                //     pattern: "Please Don't Enter special Symbols."
                // },
                // agent_name: {
                //     required: "Please enter agent Name.",
                //     pattern: "Please Don't Enter special Symbols."
                // },
                // agent_name: {
                //     required: "Please enter agent Name.",
                //     pattern: "Please Don't Enter special Symbols."
                // },
                // agent_name: {
                //     required: "Please enter agent Name.",
                //     pattern: "Please Don't Enter special Symbols."
                // },
                // agent_name: {
                //     required: "Please enter agent Name.",
                //     pattern: "Please Don't Enter special Symbols."
                // },
                // agent_name: {
                //     required: "Please enter agent Name.",
                //     pattern: "Please Don't Enter special Symbols."
                // },
                // agent_code: {
                //     required: "Please enter agent code.",
                //     pattern: "Please Don't Enter special Symbols."
                // }
            }
        });  


        $("#update_clientDetails").validate({
            rules: {
                client_prefix: {
                    required: true         
                },
                client_last_name: {
                    required: true,
                    pattern:/^[a-zA-Z\s]*$/          
                },
                client_first_name: {
                    required: true,
                    pattern:/^[a-zA-Z\s]*$/          
                },
                client_middle_name: {
                    pattern:/^[a-zA-Z0-9\s]*$/           
                },
                client_address: {
                    required:true         
                },
                client_PAN: {
                     // pattern:/^[A-Z]{5}[0-9]{4}[A-Z]{1}$/          
                },
                client_aadhar: {
                    minlength:14,
                    maxlength:14           
                },
                client_DOB: {
                    required:true                
                },
                client_maiden_middle_name: {          
                },
                client_gender: {
                    required: true         
                },
                client_blood_group: {         
                },
                client_familly_acc_no: {         
                },
                client_pri_mobile_number: {
                    // digits:true,
                    minlength:10,
                    maxlength:11          
                },
                client_sec_mobile_number: {
                    // digits:true,
                    minlength:10,
                    maxlength:11          
                },
                client_pri_phone_number: { 
                    minlength:10,
                    maxlength:15        
                }, 
                client_sec_phone_number: { 
                    minlength:10,
                    maxlength:15        
                }, 
                client_pri_residential_number: {
                    minlength:10,
                    maxlength:15        
                },
                client_sec_residential_number: { 
                    minlength:10,
                    maxlength:15        
                },
                client_email_id: {
                    pattern:/^[+a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/              
                }
            },
            messages: {
                client_aadhar: {
                    required: "Please enter Client Adhar.",
                    digits: "Please Enter Digits.",
                    minlength:"Please Enter only 12 digits",
                    maxlength:"Please Enter only 12 digits"
                },
                client_pri_mobile_number: {
                    digits: "Please Enter Digits.",
                    minlength:"Please Enter only 10 digits",
                    maxlength:"Please Enter only 10 digits"
                },
                client_sec_mobile_number: {
                    digits: "Please Enter Digits.",
                    minlength:"Please Enter only 10 digits",
                    maxlength:"Please Enter only 10 digits"
                },
                client_pri_phone_number: {
                    digits: "Please Enter Digits.",
                    minlength:"Please Enter only 11 digits",
                    maxlength:"Please Enter only 11 digits"
                },
                client_sec_phone_number: {
                    digits: "Please Enter Digits.",
                    minlength:"Please Enter only 11 digits",
                    maxlength:"Please Enter only 11 digits"
                },
                client_pri_residential_number: {
                    digits: "Please Enter Digits.",
                    minlength:"Please Enter only 11 digits",
                    maxlength:"Please Enter only 11 digits"
                },
                client_sec_residential_number: {
                    digits: "Please Enter Digits.",
                    minlength:"Please Enter only 11 digits",
                    maxlength:"Please Enter only 11 digits"
                },
                client_PAN: {
                    required: "Please enter Client Adhar.",
                    pattern:"Please enter valid pattern."

                },
                // client_PAN: {
                //     required: "Please enter  Name.",
                //     pattern: "Please Don't Enter special Symbols."
                // },
                // agent_name: {
                //     required: "Please enter agent Name.",
                //     pattern: "Please Don't Enter special Symbols."
                // },
                // agent_name: {
                //     required: "Please enter agent Name.",
                //     pattern: "Please Don't Enter special Symbols."
                // },
                // agent_name: {
                //     required: "Please enter agent Name.",
                //     pattern: "Please Don't Enter special Symbols."
                // },
                // agent_name: {
                //     required: "Please enter agent Name.",
                //     pattern: "Please Don't Enter special Symbols."
                // },
                // agent_name: {
                //     required: "Please enter agent Name.",
                //     pattern: "Please Don't Enter special Symbols."
                // },
                // agent_name: {
                //     required: "Please enter agent Name.",
                //     pattern: "Please Don't Enter special Symbols."
                // },
                // agent_name: {
                //     required: "Please enter agent Name.",
                //     pattern: "Please Don't Enter special Symbols."
                // },
                // agent_name: {
                //     required: "Please enter agent Name.",
                //     pattern: "Please Don't Enter special Symbols."
                // },
                // agent_name: {
                //     required: "Please enter agent Name.",
                //     pattern: "Please Don't Enter special Symbols."
                // },
                // agent_code: {
                //     required: "Please enter agent code.",
                //     pattern: "Please Don't Enter special Symbols."
                // }
            }
        });

         $("#add_policy").validate({
            rules: {
                policy_agent_id: {
                    required: true     
                },
                policy_branch_id: {
                    required: true     
                },
                policy_client_id: {
                    required: true     
                },
                policy_number: {
                    required: true     
                },
                policy_age: {
                    required: true,
                    number:true     
                },
                policy_age_proof: {
                    required: true,
                    min:1    
                },
                policy_plan: {
                    required: true,
                    digits:true     
                },
                policy_DOC: {
                    required: true     
                },
                policy_term: {
                    required: true,
                     digits:true      
                },
                policy_PPT: {
                    required: true,
                    digits:true     
                },
                policy_mode_of_payment: {
                    required: true,
                    min:1     
                },
                policy_premium: {
                    required: true,
                    number:true     
                },
                policy_GST: {
                    required: true     
                },
                // policy_last_due: {
                //     required: true     
                // },
                policy_maturity_date: {
                    required: true     
                },
                
                policy_class: {
                    required: true     
                },
                policy_age_proof: {
                    required: true     
                },
                policy_status: {
                    required: true     
                },
                policy_original_policy: {
                    required: true     
                }
                // policy_nominee_name: {
                //     required: true     
                // },
                // policy_nominee_relation: {
                //     required: true     
                // },
                // policy_nominee_age: {
                //     required: true     
                // },
                // policy_occupation: {
                //     required: true     
                // },
                // policy_designation: {
                //     required: true     
                // },
            },
            messages: {
               
            }
        });

        $("#comissionDetails").validate({
            rules: {
                comission_date: {
                    required: true          
                },
                comission_policy_number: {
                    required: true          
                },
                comission_agent_id: {
                    required: true          
                },
                comission_client_id: {
                    required: true          
                },
                comission_premium: {
                    required: true          
                },
                comission_due_date: {
                    required: true          
                },
                comission_percentage: {
                    required: true,
                    maxlength:2          
                },
                comission_amount: {
                    required:true                
                }
            },
            messages: {
                comission_percentage: {
                    maxlength:"Please enter no more than 100%."          
                }
            }
        }); 

        $("#familyDetails").validate({
            rules: {
                family_head_name: {
                    required: true,
                    pattern:/^[a-zA-Z\s]*$/,
                    maxlength:100          
                },
                family_acc_number: {
                    required:true,
                    pattern:/^[a-zA-Z0-9\s]*$/,
                    maxlength:50           
                }
            },
            messages: {
                family_head_name: {
                    required: "Please enter Family Head Name.",
                    pattern: "Please Don't Enter special Symbols."
                },
                family_acc_number: {
                    required: "Please enter Family Account Number.",
                    pattern: "Please Don't Enter special Symbols."
                }
            }
        });   

        // $("[name^=doc_image]").each(function () {
        //     $(this).rules("add", {
        //         required: true,
        //     });
        // });


            $('#data_1 .input-group.date').datepicker({
                todayBtn: "linked",
                keyboardNavigation: false,
                forceParse: false,
                calendarWeeks: true,
                autoclose: true,
                format: "dd-mm-yyyy"
            });

            $('#data_2 .input-group.date').datepicker({
                startView: 1,
                todayBtn: "linked",
                keyboardNavigation: false,
                forceParse: false,
                autoclose: true,
                format: "dd-mm-yyyy"
            });

            $('#data_3 .input-group.date').datepicker({
                startView: 2,
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
                format: "dd-mm-yyyy"
            });

            $('#data_5 .input-daterange').datepicker({
                keyboardNavigation: false,
                forceParse: false,
                autoclose: true,
                format: "dd-mm-yyyy"
            });

            $(".select2_demo_3").select2({
                placeholder: "Select a Client",
                allowClear: true,
            });

            $(".select2_demo_4").select2({
                placeholder: "Select a Policy Number",
                allowClear: true,
            });

            $(".select2_demo_1").select2({
                placeholder: "Select a Family Account Number",
                allowClear: true,
            });
        });
    </script>