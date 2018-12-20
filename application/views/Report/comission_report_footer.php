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
         <?php if ($LIC == 'comi_report'){?>
            $('#comi_report').addClass('active');
            document.title = "LIC Corp | Comission Report"
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
            placeholder: "Select Agent",
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
            if (report_for == 1) {
                $('#surname_wise_list_table').removeClass();
                $('#surname_wise_list_table').addClass('table-responsive hidden');
                $('#policy_number_wise_list_table').removeClass();
                $('#policy_number_wise_list_table').addClass('table-responsive');
                 $('#month_wise_agent_list').removeClass();
                $('#month_wise_agent_list').addClass('form-group hidden');
                $('#month_wise_agent_list_table').removeClass();
                $('#month_wise_agent_list_table').addClass('table-responsive hidden');
                 $('#month_wise_pre_agent_list').removeClass();
                $('#month_wise_pre_agent_list').addClass('form-group hidden');
                $('#month_wise_pre_agent_list_table').removeClass();
                $('#month_wise_pre_agent_list_table').addClass('table-responsive hidden');
                $.post('<?=site_url('Admin/comission_report_policy_number_wise')?>',{},function(data){
                    console.log(data);
                    policy_number_wise_report.clear();
                    $.each(data,function(k,v){
                        policy_number_wise_report.row.add(v);
                    })
                    policy_number_wise_report.draw();
                },'json');
            }else if(report_for == 2){
                $('#surname_wise_list_table').removeClass();
                $('#surname_wise_list_table').addClass('table-responsive');
                $('#policy_number_wise_list_table').removeClass();
                $('#policy_number_wise_list_table').addClass('table-responsive hidden');
                 $('#month_wise_agent_list').removeClass();
                $('#month_wise_agent_list').addClass('form-group hidden');
                $('#month_wise_agent_list_table').removeClass();
                $('#month_wise_agent_list_table').addClass('table-responsive hidden');
                 $('#month_wise_pre_agent_list').removeClass();
                $('#month_wise_pre_agent_list').addClass('form-group hidden');
                $('#month_wise_pre_agent_list_table').removeClass();
                $('#month_wise_pre_agent_list_table').addClass('table-responsive hidden');
                $.post('<?=site_url('Admin/comission_report_surname_wise')?>',{},function(data){
                    console.log(data);
                    surname_wise_report.clear();
                    $.each(data,function(k,v){
                        surname_wise_report.row.add(v);
                    })
                    surname_wise_report.draw();
                },'json');
            }else if(report_for == 3){
                $('#month_wise_agent_list').removeClass();
                $('#month_wise_agent_list').addClass('form-group');
                $('#month_wise_agent_list_table').removeClass();
                $('#month_wise_agent_list_table').addClass('table-responsive');
                $('#surname_wise_list_table').removeClass();
                $('#surname_wise_list_table').addClass('table-responsive hidden');
                $('#policy_number_wise_list_table').removeClass();
                $('#policy_number_wise_list_table').addClass('table-responsive hidden');
                $('#month_wise_pre_agent_list').removeClass();
                $('#month_wise_pre_agent_list').addClass('form-group hidden');
                $('#month_wise_pre_agent_list_table').removeClass();
                $('#month_wise_pre_agent_list_table').addClass('table-responsive hidden');
            }else if(report_for == 4){
                $('#month_wise_pre_agent_list').removeClass();
                $('#month_wise_pre_agent_list').addClass('form-group');
                $('#month_wise_pre_agent_list_table').removeClass();
                $('#month_wise_pre_agent_list_table').addClass('table-responsive');
                $('#month_wise_agent_list').removeClass();
                $('#month_wise_agent_list').addClass('form-group hidden');
                $('#month_wise_agent_list_table').removeClass();
                $('#month_wise_agent_list_table').addClass('table-responsive hidden');
                $('#surname_wise_list_table').removeClass();
                $('#surname_wise_list_table').addClass('table-responsive hidden');
                $('#policy_number_wise_list_table').removeClass();
                $('#policy_number_wise_list_table').addClass('table-responsive hidden');
                $.post('<?=site_url('Admin/report_DOB_wise')?>',{},function(data){
                    console.log(data);
                    DOB_wise_report.clear();
                    $.each(data,function(k,v){
                        DOB_wise_report.row.add(v);
                    })
                    DOB_wise_report.draw();
                },'json');
            }else{
                $('#surname_wise_list_table').removeClass();
                $('#surname_wise_list_table').addClass('table-responsive hidden');
                $('#policy_number_wise_list_table').removeClass();
                $('#policy_number_wise_list_table').addClass('table-responsive hidden');
                $('#month_wise_agent_list').removeClass();
                $('#month_wise_agent_list').addClass('form-group hidden');
                $('#month_wise_agent_list_table').removeClass();
                $('#month_wise_agent_list_table').addClass('table-responsive hidden');
                $('#month_wise_pre_agent_list').removeClass();
                $('#month_wise_pre_agent_list').addClass('form-group hidden');
                $('#month_wise_pre_agent_list_table').removeClass();
                $('#month_wise_pre_agent_list_table').addClass('table-responsive hidden');
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
                          $(win.document.body).find( 'thead' ).prepend('<tr><td colspan="12" style="font-size:24px;text-align:center;border:none !important;">Comission Policy Number Wise List </td></center></tr>')
                        },
                    },
                    {"extend": 'excel', title: 'Comission Policy Number Wise List'},
                    {"extend": 'pdf', title: 'Comission Policy Number Wise List'},
                ],
                "aoColumns": [
                    {
                        "title": "Name",
                        "data": "name",
                    },
                    {
                        "title": "Policy No.",
                        "data": "comission_policy_number"
                    },
                    {
                        "title": "Acc",
                        "data": "client_family_acc_no"
                    },
                    {
                        "title": "Com.Date",
                        "data": "CD"
                    },
                    {
                        "title": "Due Date",
                        "data": "CDD",
                    },
                    {
                        "title": "Mode",
                        "data": "mode_of_payment"
                    },
                    {
                        "title": "Prem",
                        "data": "comission_premium"
                    },
                    {
                        "title": "Com. %",
                        "data": "comission_percentage"
                    },
                    {
                        "title": "Com. Amount",
                        "data": "comission_amount"
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

            $('#policy_sort_by_agent').on( 'keyup', function () {
                policy_number_wise_report
                    .columns( 10 )
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
                          $(win.document.body).find( 'thead' ).prepend('<tr><td colspan="12" style="font-size:24px;text-align:center;border:none !important;">Comission Surname Wise List </td></center></tr>')
                        },
                    },
                    {"extend": 'excel', title: 'Comission Surname Wise List'},
                    {"extend": 'pdf', title: 'Comission Surname Wise List'},
                ],
                "columns": [
                    {
                        "title": "Name",
                        "data": "name",
                    },
                    {
                        "title": "Policy No.",
                        "data": "comission_policy_number"
                    },
                    {
                        "title": "Acc",
                        "data": "client_family_acc_no"
                    },
                    {
                        "title": "Com.Date",
                        "data": "CD"
                    },
                    {
                        "title": "Due Date",
                        "data": "CDD",
                    },
                    {
                        "title": "Mode",
                        "data": "mode_of_payment"
                    },
                    {
                        "title": "Prem",
                        "data": "comission_premium"
                    },
                    {
                        "title": "Com. %",
                        "data": "comission_percentage"
                    },
                    {
                        "title": "Com. Amount",
                        "data": "comission_amount"
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

            $('#surname_sort_by_agent').on( 'keyup', function () {
                surname_wise_report
                    .columns( 10 )
                    .search( this.value )
                    .draw();
            } );

//========================================== Month wise All Agent Report =========================================================
            var month = '';
            $(document).on('click','.show_month_wise_agent_list',function(){
                month = $('#month_selection').val();
                // alert(month_start);
                $.post('<?=site_url('Admin/month_wise_agent_report')?>',{month:month},function(data){
                    console.log(data);
                    month_wise_agent_list.clear();
                    $.each(data,function(k,v){
                        month_wise_agent_list.row.add(v);
                    })
                    month_wise_agent_list.draw();
                },'json');
            });
            var month_wise_agent_list = $('.dataTables-example3').DataTable({
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
                          $(win.document.body).find( 'thead' ).prepend('<tr><td colspan="12" style="font-size:24px;text-align:center;border:none !important;">Monthly Agent List for ' + month+ '</td></center></tr>')
                        },
                    },
                    {"extend": 'excel', title: 'Month Wise Agent List'},
                    {"extend": 'pdf', title: 'Month Wise Agent List'},
                ],
                "columns": [
                    {
                        "title": "Com.Date",
                        "data": "c_date"
                    },
                    {
                        "title": "A",
                        "data": "agent_short_code"
                    },
                    {
                        "title": "Policy No.",
                        "data": "comission_policy_number"
                    },
                    {
                        "title": "Prem",
                        "data": "comission_premium"
                    },
                    {
                        "title": "Due Date",
                        "data": "due_date",
                    },
                    {
                        "title": "Com. %",
                        "data": "comission_percentage"
                    },
                    {
                        "title": "Com. Amount",
                        "data": "amount"
                    },
                    {
                        "title": "Mode",
                        "data": "mode_of_payment"
                    }
                ],
                "language": {
                    "emptyTable": "<img src='http://trackmee.syntech.co.in/trackmee/assets/img/No-record-found.png'> "
                },  
            });

//========================================== DOB wise Report =========================================================

            var month = '';
            var agent_code = '';
            $(document).on('click','.show_month_wise_pre_agent_list',function(){
                month = $('#month_selection1').val();
                agent_code = $('#agent_short_code').val();
                // alert(month_start);
                $.post('<?=site_url('Admin/month_wise_pre_agent_report')?>',{month:month,agent_code:agent_code},function(data){
                    console.log(data);
                    month_wise_pre_agent_list.clear();
                    $.each(data,function(k,v){
                        month_wise_pre_agent_list.row.add(v);
                    })
                    month_wise_pre_agent_list.draw();
                },'json');
            });
            var month_wise_pre_agent_list = $('.dataTables-example4').DataTable({
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
                          $(win.document.body).find( 'thead' ).prepend('<tr><td colspan="12" style="font-size:24px;text-align:center;border:none !important;">Monthly Agent List for ' + month+ '</td></center></tr>')
                        },
                    },
                    {"extend": 'excel', title: 'Month Wise Agent List'},
                    {"extend": 'pdf', title: 'Month Wise Agent List'},
                ],
                "columns": [
                    {
                        "title": "Com.Date",
                        "data": "c_date"
                    },
                    {
                        "title": "A",
                        "data": "agent_short_code"
                    },
                    {
                        "title": "Policy No.",
                        "data": "comission_policy_number"
                    },
                    {
                        "title": "Prem",
                        "data": "comission_premium"
                    },
                    {
                        "title": "Due Date",
                        "data": "due_date",
                    },
                    {
                        "title": "Com. %",
                        "data": "comission_percentage"
                    },
                    {
                        "title": "Com. Amount",
                        "data": "amount"
                    },
                    {
                        "title": "Mode",
                        "data": "mode_of_payment"
                    }
                ],
                "language": {
                    "emptyTable": "<img src='http://trackmee.syntech.co.in/trackmee/assets/img/No-record-found.png'> "
                },  
            });

    </script>