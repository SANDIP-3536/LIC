<!DOCTYPE html>
<html>

<head>
     <link rel="shortcut icon" type="image/png" href="<?=base_url()?>assets/img/logo1.jpg"/>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>LIC Corp</title>

    <link href="<?=base_url()?>assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?=base_url()?>assets/font-awesome/css/font-awesome.css" rel="stylesheet">
    <link href="<?=base_url()?>assets/css/plugins/iCheck/custom.css" rel="stylesheet">
    <link href="<?=base_url()?>assets/css/plugins/dataTables/datatables.min.css" rel="stylesheet">
    <link href="<?=base_url()?>assets/css/plugins/datapicker/datepicker3.css" rel="stylesheet">
    <link href="<?=base_url()?>assets/css/plugins/select2/select2.min.css" rel="stylesheet">
    <link href="<?=base_url()?>assets/css/plugins/sweetalert/sweetalert.css" rel="stylesheet">
    <link href="<?=base_url()?>assets/css/animate.css" rel="stylesheet">
    <link href="<?=base_url()?>assets/css/style.css" rel="stylesheet">


</head>

<body class="top-navigation">

    <div id="wrapper">
        <div id="page-wrapper" class="gray-bg">
        <div class="row border-bottom white-bg">
        <nav class="navbar navbar-static-top" role="navigation">
            <div class="navbar-header" >
              <!--   <button aria-controls="navbar" aria-expanded="false" data-target="#navbar" data-toggle="collapse" class="navbar-toggle collapsed" type="button">
                    <i class="fa fa-reorder"></i>
                </button> -->
                <!-- <a href="" class="navbar-brand" style="background-color: #33618c;" > -->
                    <img src="<?=base_url()?>assets/img/logo1.jpg" alt="LIC Corp" style="height: 50px;margin-top: 0;">

                <!-- </a> -->
            </div>
            <div class="navbar-collapse collapse" id="navbar">
                <ul class="nav navbar-nav">
                   <!--  <li id="dashboard">
                        <a aria-expanded="true" role="button" href="<?=site_url('Admin')?>">Dashboard</a>
                    </li> -->
                    <li id="branch">
                    <a href="<?=site_url('Admin/branch_details')?>">Branch</a>
                    </li>
                    <li id="agent">
                    <a href="<?=site_url('Admin/agent_details')?>">Agent</a>
                    </li>
                    <li id="client">
                        <a href="<?=site_url('Admin/client_details')?>">Client</a>
                    </li>
                    <li id="family">
                        <a href="<?=site_url('Admin/family_details')?>">Family Account</a>
                    </li>
                    <li id="policy">
                        <a href="<?=site_url('Admin/policy_details')?>">Policy</a>
                    </li>
                    <li id="poli_report">
                        <a href="<?=site_url('Admin/report_details')?>">Policy Reports</a>
                    </li>
                    <li id="comission">
                        <a href="<?=site_url('Admin/comission_details')?>">Comission</a>
                    </li>
                    <li id="comi_report">
                        <a href="<?=site_url('Admin/comission_report_details')?>">Comission Reports</a>
                    </li>
                </ul>
                <ul class="nav navbar-top-links navbar-right">
                    <li>
                        <a href="<?=site_url('Authentication/logout')?>">
                            <i class="fa fa-sign-out"></i> Log out
                        </a>
                    </li>
                </ul>
            </div>
        </nav>
        </div>


