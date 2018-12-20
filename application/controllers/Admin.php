<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	function __construct() {
        parent::__construct();
        $data = $this->session->userdata('super_admin');
    }

	public function index()
	{
		$agent['LIC'] = 'dash';
		$this->load->view('Admin/header');
		$this->load->view('Admin/dash');
		$this->load->view('Admin/footer',$agent);
	}
// ================================== Branch Controller ==================================================

	public function branch_details()
	{
		$data['flash']['active'] = $this->session->flashdata('active');
    	$data['flash']['title'] = $this->session->flashdata('title');
    	$data['flash']['text'] = $this->session->flashdata('text');
    	$data['flash']['type'] = $this->session->flashdata('type');

		$data['branch'] = $this->Admin_model->get_data('branch');
		$agent['LIC'] = 'branch';
		$this->load->view('Admin/header');
		$this->load->view('Branch/branch_details',$data);
		$this->load->view('Admin/footer',$agent);
	}

	public function add_new_branch()
	{
		$data['branch_name']=$this->input->post('branch_name');
		$data['branch_code']=$this->input->post('branch_code');
		$cnt = $this->db->query("SELECT * from branch where branch_name = '".$data['branch_name']."' OR branch_code = '".$data['branch_code']."'")->num_rows();
		if($cnt != 0){
			$this->session->set_flashdata('active',1);
	        $this->session->set_flashdata('title',"Already Branch Register.");
	        $this->session->set_flashdata('text',"");
	        $this->session->set_flashdata('type',"warning");
			redirect('Admin/branch_details');
		}else{
			$this->Admin_model->add_new('branch',$data);
			
			$this->session->set_flashdata('active',1);
	        $this->session->set_flashdata('title',"Branch Register Successfully");
	        $this->session->set_flashdata('text',"");
	        $this->session->set_flashdata('type',"success");
			redirect('Admin/branch_details');
		}
	}

	function edit_branch()
	{
		$data['branch_id']=$this->input->post('branch_id');
		$data['branch_name']=$this->input->post('branch_name');
		$data['branch_code']=$this->input->post('branch_code');
		$cnt = $this->db->query("SELECT * from branch where branch_name = '".$data['branch_name']."' OR branch_code = '".$data['branch_code']."'")->num_rows();
		if($cnt != 0){
			$this->session->set_flashdata('active',1);
	        $this->session->set_flashdata('title',"Already Branch Register.");
	        $this->session->set_flashdata('text',"");
	        $this->session->set_flashdata('type',"warning");
			redirect('Admin/branch_details');
		}else{
			$this->Admin_model->edit_branch($data);
			$this->session->set_flashdata('active',1);
	        $this->session->set_flashdata('title',"Branch Details Updated Successfully");
	        $this->session->set_flashdata('text',"");
	        $this->session->set_flashdata('type',"success");
			redirect('Admin/branch_details');
		}
	}

	function delete_branch()
	{
		$data['branch_id']=$this->input->post('branch_id');

		$cnt = $this->db->query("SELECT * from policy where policy_branch_id = ".$data['branch_id']." group by policy_branch_id")->num_rows();
		if ($cnt != 0) {
			$this->session->set_flashdata('active',1);
            $this->session->set_flashdata('title',"Not Allowed to Delete.");
            $this->session->set_flashdata('text',"Branch assign to policy records.");
            $this->session->set_flashdata('type',"warning");
			redirect('Admin/branch_details');
		}else{
			$this->Admin_model->delete_branch($data);
			$this->session->set_flashdata('active',1);
            $this->session->set_flashdata('title',"Branch Successfully Delete.");
            $this->session->set_flashdata('text',"");
            $this->session->set_flashdata('type',"success");
			redirect('Admin/branch_details');
		}
	}


// ======================================= Agent Controller =============================================

	public function agent_details()
	{
		$data['flash']['active'] = $this->session->flashdata('active');
    	$data['flash']['title'] = $this->session->flashdata('title');
    	$data['flash']['text'] = $this->session->flashdata('text');
    	$data['flash']['type'] = $this->session->flashdata('type');

		$data['agent'] = $this->Admin_model->get_data('agent');
		$agent['LIC'] = 'agent';

		$this->load->view('Admin/header');
		$this->load->view('Agent/agent_details',$data);
		$this->load->view('Admin/footer',$agent);
	}

	public function add_new_agent()
	{
		$data['agent_name']=$this->input->post('agent_name');
		$data['agent_short_code']=$this->input->post('agent_short_code');
		$data['agent_code']=$this->input->post('agent_code');
		$cnt = $this->db->query("SELECT * from agent where agent_name = '".$data['agent_name']."' OR agent_code = '".$data['agent_code']."' OR agent_short_code = '".$data['agent_short_code']."'")->num_rows();
		if($cnt != 0){
			$this->session->set_flashdata('active',1);
	        $this->session->set_flashdata('title',"Already Agent Register.");
	        $this->session->set_flashdata('text',"");
	        $this->session->set_flashdata('type',"warning");
			redirect('Admin/agent_details');
		}else{
			$this->Admin_model->add_new('agent',$data);
			
			$this->session->set_flashdata('active',1);
	        $this->session->set_flashdata('title',"Agent Register Successfully");
	        $this->session->set_flashdata('text',"");
	        $this->session->set_flashdata('type',"success");
			redirect('Admin/agent_details');
		}
	}

	function edit_agent()
	{
		$data['agent_id']=$this->input->post('agent_id');
		$data['agent_name']=$this->input->post('agent_name');
		$data['agent_code']=$this->input->post('agent_code');
		$data['agent_short_code']=$this->input->post('agent_short_code');
		// $cnt = $this->db->query("SELECT * from agent where agent_short_code = '".$data['agent_short_code']."'")->num_rows();
		// if($cnt != 0){
		// 	$this->session->set_flashdata('active',1);
	 //        $this->session->set_flashdata('title',"Already Agent Code Register.");
	 //        $this->session->set_flashdata('text',"");
	 //        $this->session->set_flashdata('type',"warning");
		// 	redirect('Admin/agent_details');
		// }else{
			$this->Admin_model->edit_agent($data);
			$this->session->set_flashdata('active',1);
	        $this->session->set_flashdata('title',"Agent Details Updated Successfully");
	        $this->session->set_flashdata('text',"");
	        $this->session->set_flashdata('type',"success");
			redirect('Admin/agent_details');
		// }
	}

	function delete_agent()
	{
		$data['agent_id']=$this->input->post('agent_id');
		$cnt = $this->db->query("SELECT * from policy where policy_agent_id = ".$data['agent_id']." group by policy_agent_id")->num_rows();
		if ($cnt != 0) {
			$this->session->set_flashdata('active',1);
            $this->session->set_flashdata('title',"Not Allowed to Delete.");
            $this->session->set_flashdata('text',"Agent assign to policy records.");
            $this->session->set_flashdata('type',"warning");
			redirect('Admin/agent_details');
		}else{
			$this->Admin_model->delete_agent($data);
			$this->session->set_flashdata('active',1);
            $this->session->set_flashdata('title',"Agent Successfully Delete.");
            $this->session->set_flashdata('text',"");
            $this->session->set_flashdata('type',"success");
			redirect('Admin/agent_details');
		}
	}

// ========================================= Client Controller===========================================

	public function client_details()
	{
		$data['flash']['active'] = $this->session->flashdata('active');
    	$data['flash']['title'] = $this->session->flashdata('title');
    	$data['flash']['text'] = $this->session->flashdata('text');
    	$data['flash']['type'] = $this->session->flashdata('type');

		$data['branch'] = $this->Admin_model->get_data('client');
		$data['acc'] = $this->Admin_model->get_data('family');
		$agent['LIC'] = 'client';

		$this->load->view('Admin/header');
		$this->load->view('Client/client_details',$data);
		$this->load->view('Admin/footer',$agent);
	}

	public function add_client()
	{
		$this->load->view('Admin/header');
		$this->load->view('Client/dash');
		$this->load->view('Admin/footer');
	}

	public function add_new_client()
	{
		$data['client_prefix'] = $this->input->post('client_prefix');
		$data['client_last_name'] = $this->input->post('client_last_name');
		$data['client_first_name'] = $this->input->post('client_first_name');
		$data['client_middle_name'] = $this->input->post('client_middle_name');
		$data['client_residential_address'] = $this->input->post('client_residential_address');
		$data['client_office_address'] = $this->input->post('client_office_address');
		$data['client_area'] = $this->input->post('client_area');
		$data['client_PAN'] = $this->input->post('client_PAN');
		$data['client_aadhar'] = $this->input->post('client_aadhar');
		$client_DOB = $this->input->post('client_DOB');
		if(empty($client_DOB)){
			$data['client_DOB'] = '9999-12-31';
		}else{
			$data['client_DOB'] = date('Y-m-d',strtotime($client_DOB));
		}
		$data['client_birth_place'] = $this->input->post('client_birth_place');
		$client_DOA = $this->input->post('client_DOA');
		if(empty($client_DOA)){
			$data['client_DOA'] = '9999-12-31';
		}else{
			$data['client_DOA'] = date('Y-m-d',strtotime($client_DOA));
		}
		$data['client_maiden_name'] = $this->input->post('client_maiden_name');
		$data['client_gender'] = $this->input->post('client_gender');
		$data['client_blood_group'] = $this->input->post('client_blood_group');
		$data['client_family_acc_no'] = $this->input->post('client_family_acc_no');
		$data['client_father_name'] = $this->input->post('client_father_name');
		$data['client_pri_mobile_number'] = $this->input->post('client_pri_mobile_number');
		$data['client_sec_mobile_number'] = $this->input->post('client_sec_mobile_number');
		$data['client_pri_phone_number'] = $this->input->post('client_pri_phone_number');
		$data['client_sec_phone_number'] = $this->input->post('client_sec_phone_number');
		$data['client_pri_residential_number'] = $this->input->post('client_pri_residential_number');
		$data['client_sec_residential_number'] = $this->input->post('client_sec_residential_number');
		$data['client_email_id'] = $this->input->post('client_email_id');
		$data['client_bank_name'] = $this->input->post('client_bank_name');
		$data['client_bank_branch'] = $this->input->post('client_bank_branch');
		$data['client_bank_acc_type'] = $this->input->post('client_bank_acc_type');
		$data['client_bank_acc_no'] = $this->input->post('client_bank_acc_no');
		$data['client_bank_ifsc_code'] = $this->input->post('client_bank_ifsc_code');
		$data['client_bankmicr_no'] = $this->input->post('client_bankmicr_no');
		$data['client_bankmicr_no'] = $this->input->post('client_bankmicr_no');
		$data['client_bank_cheque_no'] = $this->input->post('client_bank_cheque_no');
		$cnt = $this->db->query("SELECT * from client where client_first_name = '".$data['client_first_name']."' and client_last_name ='".$data['client_last_name']."' and client_DOB ='".$data['client_DOB']."'")->num_rows();
		// print_r($cnt);die();
		if($cnt != 0){
			$this->session->set_flashdata('active',1);
	        $this->session->set_flashdata('title',"Client Already Register.");
	        $this->session->set_flashdata('text',"");
	        $this->session->set_flashdata('type',"warning");
			redirect('Admin/client_details');
		}
		else
		{
			$client= $this->Admin_model->add_new_client($data);

			$config = array(
				'upload_path' => 'document/',
				'upload_url' => base_url().'document/',
				'allowed_types' => 'jpg|jpeg|gif|png',
				'encrypt_name' => TRUE,
				);
			$this->load->library('upload', $config);

			$doc['doc_name'] = $this->input->post('doc_name[]');
			$doc['doc_image'] = $this->input->post('doc_image[]');
			$file_count = count($_FILES['doc_image']['name']);
			for ($i=0; $i < $file_count; $i++) { 
				$_FILES['userFile']['name'] = $_FILES['doc_image']['name'][$i];
				$path = $config['upload_url']."".$_FILES['userFile']['name'];
				$_FILES['userFile']['type'] = $_FILES['doc_image']['type'][$i];
				$_FILES['userFile']['tmp_name'] = $_FILES['doc_image']['tmp_name'][$i];
				$_FILES['userFile']['size'] = $_FILES['doc_image']['size'][$i];
				$this->upload->initialize($config);
				if ($this->upload->do_upload('userFile'))
				{
					$data = $this->upload->data();
					$uploadData[$i]['doc_name']= $doc['doc_name'][$i]; 
					$uploadData[$i]['doc_image']=$config['upload_url']."".$data['file_name'];
					$uploadData[$i]['doc_client_id']=$client[0]['client_id'];
					$this->Admin_model->add_new('document',$uploadData[$i]);
				}
			}
			$this->session->set_flashdata('active',1);
	        $this->session->set_flashdata('title',"Client Successfully Register.");
	        $this->session->set_flashdata('text',"");
	        $this->session->set_flashdata('type',"success");
			redirect('Admin/client_details');
		}
	}

	function add_new_documents()
	{
		$config = array(
			'upload_path' => 'document/',
			'upload_url' => base_url().'document/',
			'allowed_types' => 'jpg|jpeg|gif|png',
			'encrypt_name' => TRUE,
			);
		$this->load->library('upload', $config);

		$doc['doc_name'] = $this->input->post('doc_name[]');
		$doc['doc_client_id'] = $this->input->post('doc_client_id');
		$file_count = count($_FILES['doc_image']['name']);
		for ($i=0; $i < $file_count; $i++) { 
			$_FILES['userFile']['name'] = $_FILES['doc_image']['name'][$i];
			$path = $config['upload_url']."".$_FILES['userFile']['name'];
			$_FILES['userFile']['type'] = $_FILES['doc_image']['type'][$i];
			$_FILES['userFile']['tmp_name'] = $_FILES['doc_image']['tmp_name'][$i];
			$_FILES['userFile']['size'] = $_FILES['doc_image']['size'][$i];
			$this->upload->initialize($config);
			if ($this->upload->do_upload('userFile'))
			{
				$data = $this->upload->data();
				$uploadData[$i]['doc_name']= $doc['doc_name'][$i]; 
				$uploadData[$i]['doc_image']=$config['upload_url']."".$data['file_name'];
				$uploadData[$i]['doc_client_id']=$doc['doc_client_id'];
				$this->Admin_model->add_new('document',$uploadData[$i]);
			}
		}
		$this->session->set_flashdata('active',1);
        $this->session->set_flashdata('title',"Client Document Register.");
        $this->session->set_flashdata('text',"");
        $this->session->set_flashdata('type',"success");
		redirect('Admin/client_details');
	}

	function edit_client()
	{
		$data['client_id'] = $this->input->post('client_id');
		if(empty($this->input->post('client_family_acc_no_1'))){
			$data['client_family_acc_no'] = $this->input->post('client_family_acc_no');
		}else{
			$data['client_family_acc_no'] = $this->input->post('client_family_acc_no_1');
		}
		if(empty($this->input->post('client_prefix_1'))){
			$data['client_prefix'] = $this->input->post('client_prefix');
		}else{
			$data['client_prefix'] = $this->input->post('client_prefix_1');
		}
		$data['client_last_name'] = $this->input->post('client_last_name');
		$data['client_first_name'] = $this->input->post('client_first_name');
		$data['client_middle_name'] = $this->input->post('client_middle_name');
		$data['client_residential_address'] = $this->input->post('client_residential_address');
		$data['client_office_address'] = $this->input->post('client_office_address');
		$data['client_area'] = $this->input->post('client_area');
		$data['client_PAN'] = $this->input->post('client_PAN');
		$data['client_aadhar'] = $this->input->post('client_aadhar');
		$client_DOB = $this->input->post('client_DOB');
		if(empty($client_DOB)){
			$data['client_DOB'] = '9999-12-31';
		}else{
			$data['client_DOB'] = date('Y-m-d',strtotime($client_DOB));
		}
		$data['client_birth_place'] = $this->input->post('client_birth_place');
		$client_DOA = $this->input->post('client_DOA');
		if(empty($client_DOA)){
			$data['client_DOA'] = '9999-12-31';
		}else{
			$data['client_DOA'] = date('Y-m-d',strtotime($client_DOA));
		}
		$data['client_maiden_name'] = $this->input->post('client_maiden_name');
		if(empty($this->input->post('client_blood_group_1'))){
			$data['client_blood_group'] = $this->input->post('client_blood_group');
		}else{
			$data['client_blood_group'] = $this->input->post('client_blood_group_1');
		}
		$data['client_father_name'] = $this->input->post('client_father_name');
		$data['client_pri_mobile_number'] = $this->input->post('client_pri_mobile_number');
		$data['client_sec_mobile_number'] = $this->input->post('client_sec_mobile_number');
		$data['client_pri_phone_number'] = $this->input->post('client_pri_phone_number');
		$data['client_sec_phone_number'] = $this->input->post('client_sec_phone_number');
		$data['client_pri_residential_number'] = $this->input->post('client_pri_residential_number');
		$data['client_sec_residential_number'] = $this->input->post('client_sec_residential_number');
		$data['client_email_id'] = $this->input->post('client_email_id');
		$data['client_bank_name'] = $this->input->post('client_bank_name');
		$data['client_bank_branch'] = $this->input->post('client_bank_branch');
		if(empty($this->input->post('client_bank_acc_type_1'))){
			$data['client_bank_acc_type'] = $this->input->post('client_bank_acc_type');
		}else{
			$data['client_bank_acc_type'] = $this->input->post('client_bank_acc_type_1');
		}
		$data['client_bank_acc_no'] = $this->input->post('client_bank_acc_no');
		$data['client_bank_ifsc_code'] = $this->input->post('client_bank_ifsc_code');
		$data['client_bankmicr_no'] = $this->input->post('client_bankmicr_no');
		$data['client_bankmicr_no'] = $this->input->post('client_bankmicr_no');
		$data['client_bank_cheque_no'] = $this->input->post('client_bank_cheque_no');
		$this->Admin_model->edit_client($data);
		$this->session->set_flashdata('active',1);
        $this->session->set_flashdata('title',"Client Details Updated.");
        $this->session->set_flashdata('text',"");
        $this->session->set_flashdata('type',"success");
		redirect('Admin/client_details');
	}

	function delete_client()
	{
		$data['client_id']=$this->input->post('client_id');
		$this->Admin_model->delete_client($data);
		$this->session->set_flashdata('active',1);
        $this->session->set_flashdata('title',"Client Details Deleted.");
        $this->session->set_flashdata('text',"");
        $this->session->set_flashdata('type',"success");
		redirect('Admin/client_details');
	}

	function fetch_client_document_wise_id()
	{
		$client_id = $_POST['client_id'];
		$data = $this->db->query("SELECT * from document where doc_client_id = ".$client_id."")->result_array();
		echo json_encode($data);
	}
// ====================================== Policy Controller ==============================================
	public function policy_details()
	{
		$data['flash']['active'] = $this->session->flashdata('active');
    	$data['flash']['title'] = $this->session->flashdata('title');
    	$data['flash']['text'] = $this->session->flashdata('text');
    	$data['flash']['type'] = $this->session->flashdata('type');

		$data['policy_details'] = $this->Admin_model->policy_details();
		$data['client_details'] = $this->Admin_model->get_client_details();
		$data['branch_details'] = $this->Admin_model->get_branch_details();
		$data['agent_details'] = $this->Admin_model->get_agent_details();
		$agent['LIC'] = 'policy';
		$this->load->view('Admin/header');
		$this->load->view('Policy/policy_details',$data);
		$this->load->view('Admin/footer',$agent);
	}

	function add_policy_details()
	{
		$data['policy_number'] = $this->input->post('policy_number');
		$cnt = $this->db->query("SELECT * from policy where policy_number = ".$data['policy_number']."")->num_rows();
		if($cnt != 0){
			print_r('Policy Number Already Register.');die();
		}else{
		
			$data['policy_agent_id'] = $this->input->post('policy_agent_id');
			$data['policy_branch_id'] = $this->input->post('policy_branch_id');
			$data['policy_client_id'] = $this->input->post('policy_client_id');
			$data['policy_age'] = $this->input->post('policy_age');
			$data['policy_age_proof'] = $this->input->post('policy_age_proof');
			$data['policy_sum_assurance'] = $this->input->post('policy_sum_assurance');
			$data['policy_GST'] = $this->input->post('policy_GST');
			$data['policy_plan'] = $this->input->post('policy_plan');
			$policy_DOC = $this->input->post('policy_DOC');
			$data['policy_DOC'] = date('Y-m-d',strtotime($policy_DOC));
			$data['policy_term'] = $this->input->post('policy_term');
			$data['policy_PPT'] = $this->input->post('policy_PPT');
			$data['policy_mode_of_payment'] = $this->input->post('policy_mode_of_payment');
			$data['policy_premium'] = $this->input->post('policy_premium');
			$data['policy_grn_add'] = $this->input->post('policy_grn_add');
			$policy_last_due = $this->input->post('policy_last_due');
			if(empty($policy_last_due)){
				$data['policy_last_due'] = '9999-12-31';
			}else{
				$data['policy_last_due'] = date('Y-m-d',strtotime($policy_last_due));
			}
			$policy_maturity_date = $this->input->post('policy_maturity_date');
			if(empty($policy_maturity_date)){
				$data['policy_maturity_date'] = '9999-12-31';
			}else{
				$data['policy_maturity_date'] = date('Y-m-d',strtotime($policy_maturity_date));
			}
			$data['policy_DAB'] = $this->input->post('policy_DAB');
			$data['policy_DAB_premium'] = $this->input->post('policy_DAB_premium');
			$data['policy_extra_premium'] = $this->input->post('policy_extra_premium');
			$policy_prop_date = $this->input->post('policy_prop_date');
			if(empty($policy_prop_date)){
				$data['policy_prop_date'] = '9999-12-31';
			}else{
				$data['policy_prop_date'] = date('Y-m-d',strtotime($policy_prop_date));
			}
			$data['policy_class'] = $this->input->post('policy_class');
			$data['policy_qualification'] = $this->input->post('policy_qualification');
			$data['policy_term_rider'] = $this->input->post('policy_term_rider');
			$data['policy_critical_illness'] = $this->input->post('policy_critical_illness');
			$data['policy_premium_waiver'] = $this->input->post('policy_premium_waiver');
			$data['policy_nominee_name'] = $this->input->post('policy_nominee_name');
			$data['policy_nominee_relation'] = $this->input->post('policy_nominee_relation');
			$data['policy_nominee_age'] = $this->input->post('policy_nominee_age');
			$data['policy_occupation'] = $this->input->post('policy_occupation');
			$data['policy_designation'] = $this->input->post('policy_designation');
			$data['policy_income'] = $this->input->post('policy_income');
			$data['policy_status'] = $this->input->post('policy_status');
			$policy_FU_premium = $this->input->post('policy_FU_premium');
			if(empty($policy_FU_premium)){
				$data['policy_FU_premium'] = '9999-12-31';
			}else{
				$data['policy_FU_premium'] = date('Y-m-d',strtotime($policy_FU_premium));
			}
			$data['policy_original_policy'] = $this->input->post('policy_original_policy');
			$data['policy_loan_amt'] = $this->input->post('policy_loan_amt');
			$policy_loan_date = $this->input->post('policy_loan_date');
			if(empty($policy_loan_date)){
				$data['policy_loan_date'] = '9999-12-31';
			}else{
				$data['policy_loan_date'] = date('Y-m-d',strtotime($policy_loan_date));
			}
			$data['policy_NCO'] = $this->input->post('policy_NCO');
			$data['policy_pension_mode'] = $this->input->post('policy_pension_mode');
			$data['policy_pension_amt'] = $this->input->post('policy_pension_amt');
			$policy_pension_start_date = $this->input->post('policy_pension_start_date');
			if(empty($policy_pension_start_date)){
				$data['policy_pension_start_date'] = '9999-12-31';
			}else{
				$data['policy_pension_start_date'] = date('Y-m-d',strtotime($policy_pension_start_date));
			}
			$data['policy_assignment_trust'] = $this->input->post('policy_assignment_trust');
			$data['policy_remark'] = $this->input->post('policy_remark');
			$data['policy_father_name'] = $this->input->post('policy_father_name');
			$data['policy_mother_name'] = $this->input->post('policy_mother_name');
			$data['policy_spouce_name'] = $this->input->post('policy_spouce_name');
			$data['policy_brother_name'] = $this->input->post('policy_brother_name');
			$data['policy_sister_name'] = $this->input->post('policy_sister_name');
			$data['policy_son_name'] = $this->input->post('policy_son_name');
			$data['policy_doughter_name'] = $this->input->post('policy_doughter_name');
			$data['policy_spouce_occupation'] = $this->input->post('policy_spouce_occupation');
			$data['policy_spouce_income'] = $this->input->post('policy_spouce_income');
			$policy_DOB = $this->input->post('policy_DOB');
			if(empty($policy_DOB)){
				$data['policy_DOB'] = '9999-12-31';
			}else{
				$data['policy_DOB'] = date('Y-m-d',strtotime($policy_DOB));
			}
			$policy_delivery_date = $this->input->post('policy_delivery_date');
			if(empty($policy_delivery_date)){
				$data['policy_delivery_date'] = '9999-12-31';
			}else{
				$data['policy_delivery_date'] = date('Y-m-d',strtotime($policy_delivery_date));
			}
			$policy_MC_date = $this->input->post('policy_MC_date');
			if(empty($policy_MC_date)){
				$data['policy_MC_date'] = '9999-12-31';
			}else{
				$data['policy_MC_date'] = date('Y-m-d',strtotime($policy_MC_date));
			}
			$policy_LSCS_date = $this->input->post('policy_LSCS_date');
			if(empty($policy_LSCS_date)){
				$data['policy_LSCS_date'] = '9999-12-31';
			}else{
				$data['policy_LSCS_date'] = date('Y-m-d',strtotime($policy_LSCS_date));
			}
			$data['policy_doctor_name'] = $this->input->post('policy_doctor_name');
			$policy_MES_date = $this->input->post('policy_MES_date');
			if(empty($policy_MES_date)){
				$data['policy_MES_date'] = '9999-12-31';
			}else{
				$data['policy_MES_date'] = date('Y-m-d',strtotime($policy_MES_date));
			}
			$data['policy_identification_mark'] = $this->input->post('policy_identification_mark');
			$data['policy_height'] = $this->input->post('policy_height');
			$data['policy_weight'] = $this->input->post('policy_weight');
			$data['policy_ABD'] = $this->input->post('policy_ABD');
			$data['policy_chest'] = $this->input->post('policy_chest');
			$data['policy_teeth'] = $this->input->post('policy_teeth');
			$data['policy_BP'] = $this->input->post('policy_BP');
			$data['policy_vaccin'] = $this->input->post('policy_vaccin');
			$data['policy_pulse'] = $this->input->post('policy_pulse');
			$data['policy_spect'] = $this->input->post('policy_spect');
			$data['policy_spect_type'] = $this->input->post('policy_spect_type');
			$data['policy_spect_left'] = $this->input->post('policy_spect_left');
			$data['policy_spect_right'] = $this->input->post('policy_spect_right');
			$data['policy_operation'] = $this->input->post('policy_operation');
			$data['policy_spl_reports'] = $this->input->post('policy_spl_reports');
			
			$this->Admin_model->add_policy_details($data);
			
			$SB_data['SB_Due_date'] = $this->input->post('SB_Due_date[]');
			$SB_data['SB_Due_amount'] = $this->input->post('SB_Due_amount[]');
			$SB_data['SB_Due_age'] = $this->input->post('SB_Due_age[]');
			$SB_cnt = count($SB_data['SB_Due_date']);
			for ($i=0; $i < $SB_cnt; $i++) { 
				if(!empty($SB_data['SB_Due_date'][$i]) && !empty($SB_data['SB_Due_amount'][$i]) && $SB_data['SB_Due_age'][$i])
				{
				 	$SB['SB_Due_policy_number'] = $this->input->post('policy_number');
					$SB['SB_Due_client_id'] = $this->input->post('policy_client_id');
				 	$SB_Due_date = $SB_data['SB_Due_date'][$i];
				 	if(empty($SB_Due_date)){
						$SB['SB_Due_date'] = '9999-12-31';
					}else{
				 		$SB['SB_Due_date'] = date('Y-m-d',strtotime($SB_Due_date));
				 	}
				 	$SB['SB_Due_amount'] = $SB_data['SB_Due_amount'][$i];
				 	$SB['SB_Due_age'] = $SB_data['SB_Due_age'][$i];
				 	$this->Admin_model->add_new('sb_due',$SB);
				}
			}

			$PP_data['PP_name'] = $this->input->post('PP_name[]');
			$PP_data['PP_number'] = $this->input->post('PP_number[]');
			$PP_cnt = count($PP_data['PP_name']);
			for ($i=0; $i < $SB_cnt; $i++) { 
				if(!empty($PP_data['PP_name'][$i]) && !empty($PP_data['PP_number'][$i]))
				{
				 	$PP['PP_policy_id'] = $this->input->post('policy_number');
					$PP['PP_name'] = $PP_data['PP_name'][$i];
					$PP['PP_number'] = $PP_data['PP_number'][$i];
				 	$this->Admin_model->add_new('privious_policy',$PP);
				}
			}
			$this->session->set_flashdata('active',1);
	        $this->session->set_flashdata('title',"Policy Successfully Register.");
	        $this->session->set_flashdata('text',"");
	        $this->session->set_flashdata('type',"success");
			redirect('Admin/policy_details');
		}
	}

	function edit_policy()
	{
		$data['policy_id'] = $this->input->post('policy_id');
		$data['policy_number'] = $this->input->post('policy_number');
		if(empty($this->input->post('policy_agent_id_1'))){
		}else{
			$data['policy_agent_id'] = $this->input->post('policy_agent_id_1');
		}
		if(empty($this->input->post('policy_branch_id_1'))){
		}else{
			$data['policy_branch_id'] = $this->input->post('policy_branch_id_1');
		}
		$data['policy_age'] = $this->input->post('policy_age');
		if(empty($this->input->post('policy_age_proof_1'))){
		}else{
			$data['policy_age_proof'] = $this->input->post('policy_age_proof_1');
		}
		$data['policy_sum_assurance'] = $this->input->post('policy_sum_assurance');
		if(empty($this->input->post('policy_GST_1'))){
		}else{
			$data['policy_GST'] = $this->input->post('policy_GST_1');
		}
		$data['policy_plan'] = $this->input->post('policy_plan');
		$policy_DOC = $this->input->post('policy_DOC');
		$data['policy_DOC'] = date('Y-m-d',strtotime($policy_DOC));
		$data['policy_term'] = $this->input->post('policy_term');
		$data['policy_PPT'] = $this->input->post('policy_PPT');
		if(empty($this->input->post('policy_payment_mode_1'))){
		}else{
			$data['policy_mode_of_payment'] = $this->input->post('policy_payment_mode_1');
		}
		$data['policy_premium'] = $this->input->post('policy_premium');
		$data['policy_grn_add'] = $this->input->post('policy_grn_add');
		$policy_last_due = $this->input->post('policy_last_due');
		if(empty($policy_last_due)){
			$data['policy_last_due'] = '9999-12-31';
		}else{
			$data['policy_last_due'] = date('Y-m-d',strtotime($policy_last_due));
		}
		$policy_maturity_date = $this->input->post('policy_maturity_date');
		if(empty($policy_maturity_date)){
			$data['policy_maturity_date'] = '9999-12-31';
		}else{
			$data['policy_maturity_date'] = date('Y-m-d',strtotime($policy_maturity_date));
		}
		$data['policy_DAB'] = $this->input->post('policy_DAB');
		$data['policy_DAB_premium'] = $this->input->post('policy_DAB_premium');
		$data['policy_extra_premium'] = $this->input->post('policy_extra_premium');
		$policy_prop_date = $this->input->post('policy_prop_date');
		if(empty($policy_prop_date)){
			$data['policy_prop_date'] = '9999-12-31';
		}else{
			$data['policy_prop_date'] = date('Y-m-d',strtotime($policy_prop_date));
		}
		if(empty($this->input->post('policy_class_1'))){
		}else{
			$data['policy_class'] = $this->input->post('policy_class_1');
		}
		$data['policy_qualification'] = $this->input->post('policy_qualification');
		$data['policy_term_rider'] = $this->input->post('policy_term_rider');
		$data['policy_critical_illness'] = $this->input->post('policy_critical_illness');
		$data['policy_premium_waiver'] = $this->input->post('policy_premium_waiver');
		$data['policy_nominee_name'] = $this->input->post('policy_nominee_name');
		$data['policy_nominee_relation'] = $this->input->post('policy_nominee_relation');
		$data['policy_nominee_age'] = $this->input->post('policy_nominee_age');
		$data['policy_occupation'] = $this->input->post('policy_occupation');
		$data['policy_designation'] = $this->input->post('policy_designation');
		$data['policy_income'] = $this->input->post('policy_income');
		if(empty($this->input->post('policy_status_1'))){
		}else{
			$data['policy_status'] = $this->input->post('policy_status_1');
		}
		$policy_FU_premium = $this->input->post('policy_FU_premium');
		if(empty($policy_FU_premium)){
			$data['policy_FU_premium'] = '9999-12-31';
		}else{
			$data['policy_FU_premium'] = date('Y-m-d',strtotime($policy_FU_premium));
		}
		if(empty($this->input->post('policy_original_policy_1'))){
		}else{
			$data['policy_original_policy'] = $this->input->post('policy_original_policy_1');
		}
		$data['policy_loan_amt'] = $this->input->post('policy_loan_amt');
		$policy_loan_date = $this->input->post('policy_loan_date');
		if(empty($policy_loan_date)){
			$data['policy_loan_date'] = '9999-12-31';
		}else{
			$data['policy_loan_date'] = date('Y-m-d',strtotime($policy_loan_date));
		}
		$data['policy_NCO'] = $this->input->post('policy_NCO');
		if(empty($this->input->post('policy_pension_mode_1'))){
		}else{
			$data['policy_pension_mode'] = $this->input->post('policy_pension_mode_1');
		}
		$data['policy_pension_amt'] = $this->input->post('policy_pension_amt');
		$policy_pension_start_date = $this->input->post('policy_pension_start_date');
		if(empty($policy_pension_start_date)){
			$data['policy_pension_start_date'] = '9999-12-31';
		}else{
			$data['policy_pension_start_date'] = date('Y-m-d',strtotime($policy_pension_start_date));
		}
		$data['policy_assignment_trust'] = $this->input->post('policy_assignment_trust');
		$data['policy_remark'] = $this->input->post('policy_remark');
		$data['policy_father_name'] = $this->input->post('policy_father_name');
		$data['policy_mother_name'] = $this->input->post('policy_mother_name');
		$data['policy_spouce_name'] = $this->input->post('policy_spouce_name');
		$data['policy_brother_name'] = $this->input->post('policy_brother_name');
		$data['policy_sister_name'] = $this->input->post('policy_sister_name');
		$data['policy_son_name'] = $this->input->post('policy_son_name');
		$data['policy_doughter_name'] = $this->input->post('policy_doughter_name');
		$data['policy_spouce_occupation'] = $this->input->post('policy_spouce_occupation');
		$data['policy_spouce_income'] = $this->input->post('policy_spouce_income');
		$policy_DOB = $this->input->post('policy_DOB');
		if(empty($policy_DOB)){
			$data['policy_DOB'] = '9999-12-31';
		}else{
			$data['policy_DOB'] = date('Y-m-d',strtotime($policy_DOB));
		}
		$policy_delivery_date = $this->input->post('policy_delivery_date');
		if(empty($policy_delivery_date)){
			$data['policy_delivery_date'] = '9999-12-31';
		}else{
			$data['policy_delivery_date'] = date('Y-m-d',strtotime($policy_delivery_date));
		}
		$policy_MC_date = $this->input->post('policy_MC_date');
		if(empty($policy_MC_date)){
			$data['policy_MC_date'] = '9999-12-31';
		}else{
			$data['policy_MC_date'] = date('Y-m-d',strtotime($policy_MC_date));
		}
		$policy_LSCS_date = $this->input->post('policy_LSCS_date');
		if(empty($policy_LSCS_date)){
			$data['policy_LSCS_date'] = '9999-12-31';
		}else{
			$data['policy_LSCS_date'] = date('Y-m-d',strtotime($policy_LSCS_date));
		}
		$data['policy_doctor_name'] = $this->input->post('policy_doctor_name');
		$policy_MES_date = $this->input->post('policy_MES_date');
		if(empty($policy_MES_date)){
			$data['policy_MES_date'] = '9999-12-31';
		}else{
			$data['policy_MES_date'] = date('Y-m-d',strtotime($policy_MES_date));
		}
		$data['policy_identification_mark'] = $this->input->post('policy_identification_mark');
		$data['policy_height'] = $this->input->post('policy_height');
		$data['policy_weight'] = $this->input->post('policy_weight');
		$data['policy_ABD'] = $this->input->post('policy_ABD');
		$data['policy_chest'] = $this->input->post('policy_chest');
		$data['policy_teeth'] = $this->input->post('policy_teeth');
		$data['policy_BP'] = $this->input->post('policy_BP');
		$data['policy_vaccin'] = $this->input->post('policy_vaccin');
		$data['policy_pulse'] = $this->input->post('policy_pulse');
		$data['policy_spect'] = $this->input->post('policy_spect');
		$data['policy_spect_type'] = $this->input->post('policy_spect_type');
		$data['policy_spect_left'] = $this->input->post('policy_spect_left');
		$data['policy_spect_right'] = $this->input->post('policy_spect_right');
		$data['policy_operation'] = $this->input->post('policy_operation');
		$data['policy_spl_reports'] = $this->input->post('policy_spl_reports');
		$this->Admin_model->edit_policy($data);
		$this->session->set_flashdata('active',1);
        $this->session->set_flashdata('title',"Policy Details Updated Successfully");
        $this->session->set_flashdata('text',"");
        $this->session->set_flashdata('type',"success");
		redirect('Admin/policy_details');
	}

	function Policy_no_SB_Due_details()
	{
		$policy_number = $_POST['policy_number'];
		$data = $this->db->query("SELECT sb_due.*, DATE_FORMAT(SB_Due_date, '%d-%m-%Y') as SB_date FROM sb_due where SB_Due_policy_number = '".$policy_number."'")->result_array();
		echo json_encode($data);
	}

	function Policy_no_wise_details()
	{
		$policy_number = $_POST['policy_number'];
		$data = $this->db->query("SELECT 
		policy.*,
		agent.*,
		client.*,
		branch.*,
		case when policy_mode_of_payment ='1' then 'Yearly' when policy_mode_of_payment='2' then 'Half Yearly' when policy_mode_of_payment='3' then 'Quaterly' when policy_mode_of_payment='12' then 'Monthly' when policy_mode_of_payment='4' then 'Salary Saving Scheme' when policy_mode_of_payment='5' then 'One Time' else 'NA' end as mode_of_payment,
		case when policy_GST='1' then 'Yes' when policy_GST='0' then 'No' else 'NA' end as mode_of_GST,
		case when policy_status='1' then 'Full Force' when policy_status='2' then 'Matured' when policy_status='3' then 'Death' when policy_status='6' then 'Pacca Lopse Paidup' when policy_status='4' then 'Surrender' when policy_status='5' then 'Pacca Lopse No Paidup' when policy_status='7' then 'Lapse' when policy_status='8' then 'Other' else 'NA'end as mode_of_status,
		case when policy_original_policy='1' then 'Yes' when policy_original_policy='0' then 'No' when policy_original_policy='2' then 'Loan' else 'NA'end as mode_of_original_policy,
		case when policy_pension_mode='1' then 'Yearly' when policy_pension_mode='2' then 'Half Yearly' when policy_pension_mode='3' then 'Quaterly' when policy_pension_mode='12' then 'Monthly' else 'NA' end as mode_of_pension,
		case when policy_age_proof='1' then 'Adhar Card' when policy_age_proof='2' then 'Pan Card<' when policy_age_proof='3' then 'Passport' when policy_age_proof='4' then 'School Living Certificate' when policy_age_proof='5' then 'Birth Certificate' else 'NA' end as mode_of_proof,
		case when policy_DOC='9999-12-31' then ' ' when policy_DOC='1970-01-01' then ' ' else DATE_FORMAT(policy_DOC, '%d-%m-%Y') end  as DOC_date,
		case when policy_loan_date='9999-12-31' then ' ' when policy_loan_date='1970-01-01' then ' ' else DATE_FORMAT(policy_loan_date, '%d-%m-%Y') end  as loan_date,
		case when policy_last_due='9999-12-31' then ' ' when policy_last_due='1970-01-01' then ' ' else DATE_FORMAT(policy_last_due, '%d-%m-%Y') end  as last_due_date,
		case when policy_maturity_date='9999-12-31' then ' '  when policy_maturity_date='1970-01-01' then ' ' else DATE_FORMAT(policy_maturity_date, '%d-%m-%Y') end  as maturity_date,
		case when policy_prop_date='9999-12-31' then ' ' when policy_prop_date='1970-01-01' then ' ' else DATE_FORMAT(policy_prop_date, '%d-%m-%Y') end  as prop_date,
		case when policy_FU_premium='9999-12-31' then ' ' when policy_FU_premium='1970-01-01' then ' ' else DATE_FORMAT(policy_FU_premium, '%d-%m-%Y') end  as FU_premium_date,
		case when policy_pension_start_date='9999-12-31' then ' ' when policy_pension_start_date='1970-01-01' then ' ' else DATE_FORMAT(policy_pension_start_date, '%d-%m-%Y') end  as pension_start_date,
		case when policy_DOB='9999-12-31' then ' ' when policy_DOB='1970-01-01' then ' ' else DATE_FORMAT(policy_DOB, '%d-%m-%Y') end  as DOB,
		case when policy_MES_date='9999-12-31' then ' ' when policy_MES_date='1970-01-01' then ' ' else DATE_FORMAT(policy_MES_date, '%d-%m-%Y') end  as medical_date 
		FROM policy 
		join 
		agent on policy_agent_id = agent_id 
		join 
		client on client_id = policy_client_id 
		join 
		branch on branch_id = policy_branch_id
		where policy_number = '".$policy_number."'")->result_array();
		echo json_encode($data);
	}

	function Policy_no_PP_details()
	{
		$policy_number = $_POST['policy_number'];
		$data = $this->db->query("SELECT * FROM privious_policy where PP_policy_id = '".$policy_number."'")->result_array();
		echo json_encode($data);
	}

	function edit_SB_Due()
	{
		$data['SB_Due_id'] = $this->input->post('SB_Due_id[]');
		$data['SB_Due_date'] = $this->input->post('SB_Due_date[]');
		$data['SB_Due_amount'] = $this->input->post('SB_Due_amount[]');
		$data['SB_Due_age'] = $this->input->post('SB_Due_age[]');

		$cnt = count($data['SB_Due_id']);
		for ($i=0; $i < $cnt; $i++) { 
			$SB_edit['SB_due_id'] = $data['SB_Due_id'][$i];
			$SB_Due_date = $data['SB_Due_date'][$i];
			if(empty($SB_Due_date)){
				$SB_edit['SB_Due_date'] = '9999-12-31';
			}else{
		 		$SB_edit['SB_Due_date'] = date('Y-m-d',strtotime($SB_Due_date));
		 	}
			$SB_edit['SB_due_amount'] = $data['SB_Due_amount'][$i];
			$SB_edit['SB_due_age'] = $data['SB_Due_age'][$i];
			$this->db->set($SB_edit)->where('SB_due_id',$SB_edit['SB_due_id'])->update('sb_due');
		}

		$this->session->set_flashdata('active',1);
        $this->session->set_flashdata('title',"SB Due Details Updated Successfully");
        $this->session->set_flashdata('text',"");
        $this->session->set_flashdata('type',"success");
		redirect('Admin/policy_details');
	}

	function new_SB_Due()
	{
		print_r($this->input->post());
		$data['SB_Due_date'] = $this->input->post('SB_Due_date[]');
		$data['SB_Due_amount'] = $this->input->post('SB_Due_amount[]');
		$data['SB_Due_age'] = $this->input->post('SB_Due_age[]');
		$data['SB_Due_client_id'] = $this->input->post('client_id');
		$data['SB_Due_policy_number'] = $this->input->post('policy_number');

		$cnt = count($data['SB_Due_date']);
		for ($i=0; $i < $cnt; $i++) { 
			$SB_Due_date = $data['SB_Due_date'][$i];
			if(empty($SB_Due_date)){
				$SB_data['SB_Due_date'] = '9999-12-31';
			}else{
		 		$SB_data['SB_Due_date'] = date('Y-m-d',strtotime($SB_Due_date));
		 	}
			$SB_data['SB_due_amount'] = $data['SB_Due_amount'][$i];
			$SB_data['SB_due_age'] = $data['SB_Due_age'][$i];
			$SB_data['SB_Due_client_id'] = $data['SB_Due_client_id'];
			$SB_data['SB_Due_policy_number'] = $data['SB_Due_policy_number'];
			$this->db->insert('sb_due',$SB_data);
		}

		$this->session->set_flashdata('active',1);
        $this->session->set_flashdata('title',"SB Due Added Successfully");
        $this->session->set_flashdata('text',"");
        $this->session->set_flashdata('type',"success");
		redirect('Admin/policy_details');
	}

	function delete_policy()
	{
		$data['policy_number']=$this->input->post('policy_number');

		$this->Admin_model->delete_policy($data);
		$this->session->set_flashdata('active',1);
        $this->session->set_flashdata('title',"Policy Successfully Delete.");
        $this->session->set_flashdata('text',"");
        $this->session->set_flashdata('type',"success");
		redirect('Admin/policy_details');
	}

//=================================== Comission Details =========================

	public function comission_details()
	{
		$data['flash']['active'] = $this->session->flashdata('active');
    	$data['flash']['title'] = $this->session->flashdata('title');
    	$data['flash']['text'] = $this->session->flashdata('text');
    	$data['flash']['type'] = $this->session->flashdata('type');

		$data['comission_details'] = $this->Admin_model->get_comission_details();
		$data['client_details'] = $this->Admin_model->get_client_details();
		$data['policy_number'] = $this->Admin_model->get_policy_number();

		$agent['LIC'] = 'comission';
		$this->load->view('Admin/header');
		$this->load->view('Comission/comission_details',$data);
		$this->load->view('Admin/footer',$agent);
	}

	function add_comission_details()
	{
		$comission_date = $this->input->post('comission_date');
		if(empty($comission_date)){
				$data['comission_date'] = '9999-12-31';
		}else{
			$data['comission_date'] = date('Y-m-d',strtotime($comission_date));
		}
		$data['comission_policy_number'] = $this->input->post('comission_policy_number');
		$data['comission_agent_id'] = $this->input->post('comission_agent_id');
		$data['comission_client_id'] = $this->input->post('comission_client_id');
		$data['comission_premium'] = $this->input->post('comission_premium');
		$comission_due_date = $this->input->post('comission_due_date');
		if(empty($comission_due_date)){
				$data['comission_due_date'] = '9999-12-31';
		}else{
			$data['comission_due_date'] = date('Y-m-d', strtotime($comission_due_date));
		}
		$data['comission_percentage'] = $this->input->post('comission_percentage');
		$data['comission_amount'] = $this->input->post('comission_amount');
		$data['comission_mode_of_payment'] = $this->input->post('comission_mode_of_payment');
		$this->Admin_model->add_new('comission',$data);
		$this->session->set_flashdata('active',1);
        $this->session->set_flashdata('title',"Comission Successfully Register.");
        $this->session->set_flashdata('text',"");
        $this->session->set_flashdata('type',"success");
		redirect('Admin/comission_details');
	}

	function fetch_client_details_wise_id()
	{
		$client_id = $_POST['client_id'];
		$data = $this->Admin_model->fetch_client_details_wise_id($client_id);
		echo json_encode($data);
	}

	function fetch_policy_details_wise_id()
	{
		$policy_number = $_POST['policy_number'];
		$data = $this->Admin_model->fetch_policy_details_wise_id($policy_number);
		echo json_encode($data);
	}

	function already_policy_number_check()
	{
		$policy_number = $_POST['policy_number'];
		$data = $this->db->query("SELECT * from policy where policy_number = ".$policy_number."")->num_rows();
		echo json_encode($data);
	}

//================================================= Family Controller ===============================================
	public function family_details()
	{
		$data['flash']['active'] = $this->session->flashdata('active');
    	$data['flash']['title'] = $this->session->flashdata('title');
    	$data['flash']['text'] = $this->session->flashdata('text');
    	$data['flash']['type'] = $this->session->flashdata('type');
    	
		$data['family'] = $this->Admin_model->get_family_details();

		$agent['LIC'] = 'family';
		$this->load->view('Admin/header');
		$this->load->view('Family/family_details',$data);
		$this->load->view('Admin/footer',$agent);
	}
	public function add_family_details()
	{
		$data['family_head_name']=$this->input->post('family_head_name');
		$data['family_acc_number']=$this->input->post('family_acc_number');
		$cnt = $this->db->query("SELECT * from family where family_head_name = '".$data['family_head_name']."' and family_acc_number = '".$data['family_acc_number']."'")->num_rows();
		if($cnt != 0){
			$this->session->set_flashdata('active',1);
	        $this->session->set_flashdata('title',"Already Account Register.");
	        $this->session->set_flashdata('text',"");
	        $this->session->set_flashdata('type',"warning");
			redirect('Admin/family_details');
		}else{
			$this->Admin_model->add_new('family',$data);
			$this->session->set_flashdata('active',1);
	        $this->session->set_flashdata('title',"Family Account Successfully Register.");
	        $this->session->set_flashdata('text',"");
	        $this->session->set_flashdata('type',"success");
			redirect('Admin/family_details');
		}
	}
	function delete_family_details()
	{
		$data['family_id']=$this->input->post('family_id');
		$cnt = $this->db->query("SELECT * from family join client on family_acc_number = client_family_acc_no where family_id = '".$data['family_id']."'")->num_rows();
		if($cnt != 0){
			$this->session->set_flashdata('active',1);
	        $this->session->set_flashdata('title'," Not Allowed to Delete.");
	        $this->session->set_flashdata('text',"Account No assign to some Client.");
	        $this->session->set_flashdata('type',"warning");
			redirect('Admin/family_details');
		}else{
			$this->Admin_model->delete_family_details($data);
			$this->session->set_flashdata('active',1);
            $this->session->set_flashdata('title',"Family Details Successfully Delete.");
            $this->session->set_flashdata('text',"");
            $this->session->set_flashdata('type',"success");
			redirect('Admin/family_details');
		}
	}

	function edit_family()
	{
		$data['family_id']=$this->input->post('family_id_edit');
		$data['family_head_name']=$this->input->post('family_head_name_edit');
		$data['family_acc_number']=$this->input->post('family_acc_number_edit');
		$cnt = $this->db->query("SELECT * from family where family_head_name = '".$data['family_head_name']."' and family_acc_number = '".$data['family_acc_number']."'")->num_rows();
		if($cnt != 0){
			$this->session->set_flashdata('active',1);
	        $this->session->set_flashdata('title',"Already Account Register.");
	        $this->session->set_flashdata('text',"");
	        $this->session->set_flashdata('type',"warning");
			redirect('Admin/family_details');
		}else{
			$this->Admin_model->edit_family($data);
			$this->session->set_flashdata('active',1);
	        $this->session->set_flashdata('title',"Family Details Updated Successfully");
	        $this->session->set_flashdata('text',"");
	        $this->session->set_flashdata('type',"success");
			redirect('Admin/family_details');
		}
	}

	function family_account_details()
	{
		$acc_no = $_POST['acc_no'];
		$data = $this->db->query("SELECT * from family where family_acc_number = ".$acc_no."")->result();
		echo json_encode($data);
	}
	
//================================= Report Controller ============================================

	public function report_details()
	{
		$data['flash']['active'] = $this->session->flashdata('active');
    	$data['flash']['title'] = $this->session->flashdata('title');
    	$data['flash']['text'] = $this->session->flashdata('text');
    	$data['flash']['type'] = $this->session->flashdata('type');

		$data['client_details'] = $this->Admin_model->get_client_details();
		$data['acc'] = $this->Admin_model->get_data('family');

		$agent['LIC'] = 'poli_report';
		$this->load->view('Admin/header');
		$this->load->view('Report/report_details',$data);
		$this->load->view('Report/report_footer',$agent);
	}

	public function report_family_ac_wise_due_list()
	{
		$start_date = $_POST['start'];
		$start = date('Y-m-d', strtotime($start_date));
		$end_date = $_POST['end'];
		$end = date('Y-m-d', strtotime($end_date));
		$acc_no = $_POST['acc_no'];
			$data = $this->db->query("select * from (select * from (select due_date_year
			,name,S_A,plan_ppt,policy_DOC,policy_number,mode,premium
			,case when due_date='9999-12-31' then ' ' when due_date='1970-01-01' then ' ' else DATE_FORMAT(due_date, '%d/%m/%Y') end as due_date
			,branch_code,agent_short_code,client_DOB,date_of_payment
			from 
			(select * from (select
			case when due_date='9999-12-31' then '999912' when due_date='1970-01-01' then '999912' else DATE_FORMAT(due_date, '%Y%m') end as due_date_year
			,concat(TRIM(client_last_name),' ',TRIM(client_first_name),' ',TRIM(client_middle_name)) as name
			,policy_sum_assurance as S_A
			,concat(policy_plan,' - ',policy_ppt) as plan_ppt
			,case when policy_DOC='9999-12-31' then ' ' when policy_DOC='1970-01-01' then ' ' else DATE_FORMAT(policy_DOC, '%d/%m/%Y') end as policy_DOC
			,policy_number
			,mode
			,case when policy_GST='1' then concat(policy_premium,' +')
			else policy_premium end as premium
			,due_date
			,branch_code
			,agent_short_code
			,case when TIMESTAMPDIFF(month, policy_last_due,due_date)=0 then concat(DATE_FORMAT(client_DOB, '%d/%m/%Y'),'  **')
			else DATE_FORMAT(client_DOB, '%d/%m/%Y') end as client_DOB
			,' ' as date_of_payment
			from 
			(
				select policy.*
				,case when policy_mode_of_payment='1' then 'YLY' else 'SGL' end as mode
				,DATE_ADD(policy_DOC, INTERVAL TIMESTAMPDIFF(year, policy_DOC,'".$end."') year) as due_date
				from policy where policy_mode_of_payment in ('1','5')
			union
				select policy.*,'HLY' as mode
				,case when TIMESTAMPDIFF(month,'".$start."',DATE_ADD(policy_DOC, INTERVAL TIMESTAMPDIFF(year,policy_DOC,'".$end."') year)) >= 6 then DATE_ADD(DATE_ADD(policy_DOC, INTERVAL TIMESTAMPDIFF(year,policy_DOC,'".$end."') year),INTERVAL -6 month)
				else DATE_ADD(policy_DOC, INTERVAL TIMESTAMPDIFF(year,policy_DOC,'".$end."') year) end as due_date
				from policy where policy_mode_of_payment='2'
			union
				select policy.*,'HLY' as mode
				,case when TIMESTAMPDIFF(month,'".$start."',DATE_ADD(policy_DOC, INTERVAL TIMESTAMPDIFF(year, policy_DOC,'".$end."') year)) < 6 then DATE_ADD(DATE_ADD(policy_DOC, INTERVAL TIMESTAMPDIFF(year, policy_DOC,'".$end."') year),INTERVAL 6 month)
				else DATE_ADD(policy_DOC, INTERVAL TIMESTAMPDIFF(year, policy_DOC,'".$end."') year) end as due_date
				from policy where policy_mode_of_payment='2'
			union
				select policy.*,'QLY' as mode
				,DATE_ADD(DATE_ADD(policy_DOC, INTERVAL TIMESTAMPDIFF(year, policy_DOC,'".$end."') year),INTERVAL -TIMESTAMPDIFF(QUARTER,'".$start."',DATE_ADD(policy_DOC, INTERVAL TIMESTAMPDIFF(year,policy_DOC,'".$end."') year)) QUARTER)as due_date
				from policy where policy_mode_of_payment='3'
			union
				select policy.*,'QLY' as mode
				,DATE_ADD(DATE_ADD(policy_DOC, INTERVAL TIMESTAMPDIFF(year, policy_DOC,'".$end."') year),INTERVAL -TIMESTAMPDIFF(QUARTER,'".$start."',DATE_ADD(policy_DOC, INTERVAL TIMESTAMPDIFF(year,policy_DOC,'".$end."') year))+1 QUARTER)as due_date
				from policy where policy_mode_of_payment='3'
			union
				select policy.*,'QLY' as mode
				,DATE_ADD(DATE_ADD(policy_DOC, INTERVAL TIMESTAMPDIFF(year, policy_DOC,'".$end."') year),INTERVAL -TIMESTAMPDIFF(QUARTER,'".$start."',DATE_ADD(policy_DOC, INTERVAL TIMESTAMPDIFF(year,policy_DOC,'".$end."') year))+2 QUARTER)as due_date
				from policy where policy_mode_of_payment='3'
			union
				select policy.*,'QLY' as mode
				,DATE_ADD(DATE_ADD(policy_DOC, INTERVAL TIMESTAMPDIFF(year, policy_DOC,'".$end."') year),INTERVAL -TIMESTAMPDIFF(QUARTER,'".$start."',DATE_ADD(policy_DOC, INTERVAL TIMESTAMPDIFF(year,policy_DOC,'".$end."') year))+3 QUARTER)as due_date
				from policy where policy_mode_of_payment='3'
			union
				select policy.*,'MLY' as mode
				,DATE_ADD(DATE_ADD(policy_DOC, INTERVAL TIMESTAMPDIFF(year, policy_DOC,'".$end."') year),INTERVAL -TIMESTAMPDIFF(MONTH,'".$start."',DATE_ADD(policy_DOC, INTERVAL TIMESTAMPDIFF(year,policy_DOC,'".$end."') year)) MONTH)as due_date
				from policy where policy_mode_of_payment in ('12','4')
			union
				select policy.*,'MLY' as mode
				,DATE_ADD(DATE_ADD(policy_DOC, INTERVAL TIMESTAMPDIFF(year, policy_DOC,'".$end."') year),INTERVAL -TIMESTAMPDIFF(MONTH,'".$start."',DATE_ADD(policy_DOC, INTERVAL TIMESTAMPDIFF(year,policy_DOC,'".$end."') year))+1 MONTH)as due_date
				from policy where policy_mode_of_payment in ('12','4')
			union
				select policy.*,'MLY' as mode
				,DATE_ADD(DATE_ADD(policy_DOC, INTERVAL TIMESTAMPDIFF(year, policy_DOC,'".$end."') year),INTERVAL -TIMESTAMPDIFF(MONTH,'".$start."',DATE_ADD(policy_DOC, INTERVAL TIMESTAMPDIFF(year,policy_DOC,'".$end."') year))+2 MONTH)as due_date
				from policy where policy_mode_of_payment in ('12','4')
			union
				select policy.*,'MLY' as mode
				,DATE_ADD(DATE_ADD(policy_DOC, INTERVAL TIMESTAMPDIFF(year, policy_DOC,'".$end."') year),INTERVAL -TIMESTAMPDIFF(MONTH,'".$start."',DATE_ADD(policy_DOC, INTERVAL TIMESTAMPDIFF(year,policy_DOC,'".$end."') year))+3 MONTH)as due_date
				from policy where policy_mode_of_payment in ('12','4')
			union
				select policy.*,'MLY' as mode
				,DATE_ADD(DATE_ADD(policy_DOC, INTERVAL TIMESTAMPDIFF(year, policy_DOC,'".$end."') year),INTERVAL -TIMESTAMPDIFF(MONTH,'".$start."',DATE_ADD(policy_DOC, INTERVAL TIMESTAMPDIFF(year,policy_DOC,'".$end."') year))+4 MONTH)as due_date
				from policy where policy_mode_of_payment in ('12','4')
			union
				select policy.*,'MLY' as mode
				,DATE_ADD(DATE_ADD(policy_DOC, INTERVAL TIMESTAMPDIFF(year, policy_DOC,'".$end."') year),INTERVAL -TIMESTAMPDIFF(MONTH,'".$start."',DATE_ADD(policy_DOC, INTERVAL TIMESTAMPDIFF(year,policy_DOC,'".$end."') year))+5 MONTH)as due_date
				from policy where policy_mode_of_payment in ('12','4')
			union
				select policy.*,'MLY' as mode
				,DATE_ADD(DATE_ADD(policy_DOC, INTERVAL TIMESTAMPDIFF(year, policy_DOC,'".$end."') year),INTERVAL -TIMESTAMPDIFF(MONTH,'".$start."',DATE_ADD(policy_DOC, INTERVAL TIMESTAMPDIFF(year,policy_DOC,'".$end."') year))+6 MONTH)as due_date
				from policy where policy_mode_of_payment in ('12','4')
			union
				select policy.*,'MLY' as mode
				,DATE_ADD(DATE_ADD(policy_DOC, INTERVAL TIMESTAMPDIFF(year, policy_DOC,'".$end."') year),INTERVAL -TIMESTAMPDIFF(MONTH,'".$start."',DATE_ADD(policy_DOC, INTERVAL TIMESTAMPDIFF(year,policy_DOC,'".$end."') year))+7 MONTH)as due_date
				from policy where policy_mode_of_payment in ('12','4')
			union
				select policy.*,'MLY' as mode
				,DATE_ADD(DATE_ADD(policy_DOC, INTERVAL TIMESTAMPDIFF(year, policy_DOC,'".$end."') year),INTERVAL -TIMESTAMPDIFF(MONTH,'".$start."',DATE_ADD(policy_DOC, INTERVAL TIMESTAMPDIFF(year,policy_DOC,'".$end."') year))+8 MONTH)as due_date
				from policy where policy_mode_of_payment in ('12','4')
			union
				select policy.*,'MLY' as mode
				,DATE_ADD(DATE_ADD(policy_DOC, INTERVAL TIMESTAMPDIFF(year, policy_DOC,'".$end."') year),INTERVAL -TIMESTAMPDIFF(MONTH,'".$start."',DATE_ADD(policy_DOC, INTERVAL TIMESTAMPDIFF(year,policy_DOC,'".$end."') year))+9 MONTH)as due_date
				from policy where policy_mode_of_payment in ('12','4')
			union
				select policy.*,'MLY' as mode
				,DATE_ADD(DATE_ADD(policy_DOC, INTERVAL TIMESTAMPDIFF(year, policy_DOC,'".$end."') year),INTERVAL -TIMESTAMPDIFF(MONTH,'".$start."',DATE_ADD(policy_DOC, INTERVAL TIMESTAMPDIFF(year,policy_DOC,'".$end."') year))+10 MONTH)as due_date
				from policy where policy_mode_of_payment in ('12','4')
			union
				select policy.*,'MLY' as mode
				,DATE_ADD(DATE_ADD(policy_DOC, INTERVAL TIMESTAMPDIFF(year, policy_DOC,'".$end."') year),INTERVAL -TIMESTAMPDIFF(MONTH,'".$start."',DATE_ADD(policy_DOC, INTERVAL TIMESTAMPDIFF(year,policy_DOC,'".$end."') year))+11 MONTH)as due_date
				from policy where policy_mode_of_payment in ('12','4')
			)as data
			join client on policy_client_id=client_id
			join branch	on policy_branch_id=branch_id
			join agent on policy_agent_id=agent_id
			where ('".$start."' between policy_DOC and policy_last_due or '".$end."' between policy_DOC and policy_last_due or policy_DOC between '".$start."' and '".$end."' or policy_last_due between '".$start."' and '".$end."')
			and due_date between policy_DOC and policy_last_due and due_date between '".$start."' and '".$end."' and client_family_acc_no='".$acc_no."' and policy_status='1') as temp1
			
			union
			
			select * from (select
			case when due_date='9999-12-31' then '99991231' when due_date='1970-01-01' then '99991231' else DATE_FORMAT(due_date, '%Y%m31') end as due_date_year
			,' ' as name
			,' ' as S_A
			,' ' as plan_ppt
			,' ' as policy_DOC
			,' ' as policy_number
			,'Total' as mode
			,sum(policy_premium) as premium
			,' ' as due_date
			,' ' as branch_code
			,' ' as agent_short_code
			,' ' as client_DOB
			,' ' as date_of_payment
			from 
			(
				select policy.*
				,case when policy_mode_of_payment='1' then 'YLY' else 'SGL' end as mode
				,DATE_ADD(policy_DOC, INTERVAL TIMESTAMPDIFF(year, policy_DOC,'".$end."') year) as due_date
				from policy where policy_mode_of_payment in ('1','5')
			union
				select policy.*,'HLY' as mode
				,case when TIMESTAMPDIFF(month,'".$start."',DATE_ADD(policy_DOC, INTERVAL TIMESTAMPDIFF(year,policy_DOC,'".$end."') year)) >= 6 then DATE_ADD(DATE_ADD(policy_DOC, INTERVAL TIMESTAMPDIFF(year,policy_DOC,'".$end."') year),INTERVAL -6 month)
				else DATE_ADD(policy_DOC, INTERVAL TIMESTAMPDIFF(year,policy_DOC,'".$end."') year) end as due_date
				from policy where policy_mode_of_payment='2'
			union
				select policy.*,'HLY' as mode
				,case when TIMESTAMPDIFF(month,'".$start."',DATE_ADD(policy_DOC, INTERVAL TIMESTAMPDIFF(year, policy_DOC,'".$end."') year)) < 6 then DATE_ADD(DATE_ADD(policy_DOC, INTERVAL TIMESTAMPDIFF(year, policy_DOC,'".$end."') year),INTERVAL 6 month)
				else DATE_ADD(policy_DOC, INTERVAL TIMESTAMPDIFF(year, policy_DOC,'".$end."') year) end as due_date
				from policy where policy_mode_of_payment='2'
			union
				select policy.*,'QLY' as mode
				,DATE_ADD(DATE_ADD(policy_DOC, INTERVAL TIMESTAMPDIFF(year, policy_DOC,'".$end."') year),INTERVAL -TIMESTAMPDIFF(QUARTER,'".$start."',DATE_ADD(policy_DOC, INTERVAL TIMESTAMPDIFF(year,policy_DOC,'".$end."') year)) QUARTER)as due_date
				from policy where policy_mode_of_payment='3'
			union
				select policy.*,'QLY' as mode
				,DATE_ADD(DATE_ADD(policy_DOC, INTERVAL TIMESTAMPDIFF(year, policy_DOC,'".$end."') year),INTERVAL -TIMESTAMPDIFF(QUARTER,'".$start."',DATE_ADD(policy_DOC, INTERVAL TIMESTAMPDIFF(year,policy_DOC,'".$end."') year))+1 QUARTER)as due_date
				from policy where policy_mode_of_payment='3'
			union
				select policy.*,'QLY' as mode
				,DATE_ADD(DATE_ADD(policy_DOC, INTERVAL TIMESTAMPDIFF(year, policy_DOC,'".$end."') year),INTERVAL -TIMESTAMPDIFF(QUARTER,'".$start."',DATE_ADD(policy_DOC, INTERVAL TIMESTAMPDIFF(year,policy_DOC,'".$end."') year))+2 QUARTER)as due_date
				from policy where policy_mode_of_payment='3'
			union
				select policy.*,'QLY' as mode
				,DATE_ADD(DATE_ADD(policy_DOC, INTERVAL TIMESTAMPDIFF(year, policy_DOC,'".$end."') year),INTERVAL -TIMESTAMPDIFF(QUARTER,'".$start."',DATE_ADD(policy_DOC, INTERVAL TIMESTAMPDIFF(year,policy_DOC,'".$end."') year))+3 QUARTER)as due_date
				from policy where policy_mode_of_payment='3'
			union
				select policy.*,'MLY' as mode
				,DATE_ADD(DATE_ADD(policy_DOC, INTERVAL TIMESTAMPDIFF(year, policy_DOC,'".$end."') year),INTERVAL -TIMESTAMPDIFF(MONTH,'".$start."',DATE_ADD(policy_DOC, INTERVAL TIMESTAMPDIFF(year,policy_DOC,'".$end."') year)) MONTH)as due_date
				from policy where policy_mode_of_payment in ('12','4')
			union
				select policy.*,'MLY' as mode
				,DATE_ADD(DATE_ADD(policy_DOC, INTERVAL TIMESTAMPDIFF(year, policy_DOC,'".$end."') year),INTERVAL -TIMESTAMPDIFF(MONTH,'".$start."',DATE_ADD(policy_DOC, INTERVAL TIMESTAMPDIFF(year,policy_DOC,'".$end."') year))+1 MONTH)as due_date
				from policy where policy_mode_of_payment in ('12','4')
			union
				select policy.*,'MLY' as mode
				,DATE_ADD(DATE_ADD(policy_DOC, INTERVAL TIMESTAMPDIFF(year, policy_DOC,'".$end."') year),INTERVAL -TIMESTAMPDIFF(MONTH,'".$start."',DATE_ADD(policy_DOC, INTERVAL TIMESTAMPDIFF(year,policy_DOC,'".$end."') year))+2 MONTH)as due_date
				from policy where policy_mode_of_payment in ('12','4')
			union
				select policy.*,'MLY' as mode
				,DATE_ADD(DATE_ADD(policy_DOC, INTERVAL TIMESTAMPDIFF(year, policy_DOC,'".$end."') year),INTERVAL -TIMESTAMPDIFF(MONTH,'".$start."',DATE_ADD(policy_DOC, INTERVAL TIMESTAMPDIFF(year,policy_DOC,'".$end."') year))+3 MONTH)as due_date
				from policy where policy_mode_of_payment in ('12','4')
			union
				select policy.*,'MLY' as mode
				,DATE_ADD(DATE_ADD(policy_DOC, INTERVAL TIMESTAMPDIFF(year, policy_DOC,'".$end."') year),INTERVAL -TIMESTAMPDIFF(MONTH,'".$start."',DATE_ADD(policy_DOC, INTERVAL TIMESTAMPDIFF(year,policy_DOC,'".$end."') year))+4 MONTH)as due_date
				from policy where policy_mode_of_payment in ('12','4')
			union
				select policy.*,'MLY' as mode
				,DATE_ADD(DATE_ADD(policy_DOC, INTERVAL TIMESTAMPDIFF(year, policy_DOC,'".$end."') year),INTERVAL -TIMESTAMPDIFF(MONTH,'".$start."',DATE_ADD(policy_DOC, INTERVAL TIMESTAMPDIFF(year,policy_DOC,'".$end."') year))+5 MONTH)as due_date
				from policy where policy_mode_of_payment in ('12','4')
			union
				select policy.*,'MLY' as mode
				,DATE_ADD(DATE_ADD(policy_DOC, INTERVAL TIMESTAMPDIFF(year, policy_DOC,'".$end."') year),INTERVAL -TIMESTAMPDIFF(MONTH,'".$start."',DATE_ADD(policy_DOC, INTERVAL TIMESTAMPDIFF(year,policy_DOC,'".$end."') year))+6 MONTH)as due_date
				from policy where policy_mode_of_payment in ('12','4')
			union
				select policy.*,'MLY' as mode
				,DATE_ADD(DATE_ADD(policy_DOC, INTERVAL TIMESTAMPDIFF(year, policy_DOC,'".$end."') year),INTERVAL -TIMESTAMPDIFF(MONTH,'".$start."',DATE_ADD(policy_DOC, INTERVAL TIMESTAMPDIFF(year,policy_DOC,'".$end."') year))+7 MONTH)as due_date
				from policy where policy_mode_of_payment in ('12','4')
			union
				select policy.*,'MLY' as mode
				,DATE_ADD(DATE_ADD(policy_DOC, INTERVAL TIMESTAMPDIFF(year, policy_DOC,'".$end."') year),INTERVAL -TIMESTAMPDIFF(MONTH,'".$start."',DATE_ADD(policy_DOC, INTERVAL TIMESTAMPDIFF(year,policy_DOC,'".$end."') year))+8 MONTH)as due_date
				from policy where policy_mode_of_payment in ('12','4')
			union
				select policy.*,'MLY' as mode
				,DATE_ADD(DATE_ADD(policy_DOC, INTERVAL TIMESTAMPDIFF(year, policy_DOC,'".$end."') year),INTERVAL -TIMESTAMPDIFF(MONTH,'".$start."',DATE_ADD(policy_DOC, INTERVAL TIMESTAMPDIFF(year,policy_DOC,'".$end."') year))+9 MONTH)as due_date
				from policy where policy_mode_of_payment in ('12','4')
			union
				select policy.*,'MLY' as mode
				,DATE_ADD(DATE_ADD(policy_DOC, INTERVAL TIMESTAMPDIFF(year, policy_DOC,'".$end."') year),INTERVAL -TIMESTAMPDIFF(MONTH,'".$start."',DATE_ADD(policy_DOC, INTERVAL TIMESTAMPDIFF(year,policy_DOC,'".$end."') year))+10 MONTH)as due_date
				from policy where policy_mode_of_payment in ('12','4')
			union
				select policy.*,'MLY' as mode
				,DATE_ADD(DATE_ADD(policy_DOC, INTERVAL TIMESTAMPDIFF(year, policy_DOC,'".$end."') year),INTERVAL -TIMESTAMPDIFF(MONTH,'".$start."',DATE_ADD(policy_DOC, INTERVAL TIMESTAMPDIFF(year,policy_DOC,'".$end."') year))+11 MONTH)as due_date
				from policy where policy_mode_of_payment in ('12','4')
			)as data
			join client on policy_client_id=client_id
			join branch	on policy_branch_id=branch_id
			join agent on policy_agent_id=agent_id
			where ('".$start."' between policy_DOC and policy_last_due or '".$end."' between policy_DOC and policy_last_due or policy_DOC between '".$start."' and '".$end."' or policy_last_due between '".$start."' and '".$end."')
			and due_date between policy_DOC and policy_last_due and due_date between '".$start."' and '".$end."' and client_family_acc_no='".$acc_no."' and policy_status='1' group by due_date_year ) as temp2
			) as temp3 order by due_date_year,DATE_FORMAT(due_date, '%Y/%m/%d'),name,policy_number)as temp10) as parent
			union 
			select
			' ' as due_date_year
			,'Total Dues  : ' as name
			,count(policy_DOC) as S_A
			,' ' as plan_ppt
			,' ' as policy_DOC
			,'Total Prem. :' as policy_number
			,' ' as mode
			,sum(policy_premium) as premium
			,' ' as due_date
			,' ' as branch_code
			,' ' as agent_short_code
			,' ' as client_DOB
			,' ' as date_of_payment
			from (
				select policy.*
				,case when policy_mode_of_payment='1' then 'YLY' else 'SGL' end as mode
				,DATE_ADD(policy_DOC, INTERVAL TIMESTAMPDIFF(year, policy_DOC,'".$end."') year) as due_date
				from policy where policy_mode_of_payment in ('1','5')
			union
				select policy.*,'HLY' as mode
				,case when TIMESTAMPDIFF(month,'".$start."',DATE_ADD(policy_DOC, INTERVAL TIMESTAMPDIFF(year,policy_DOC,'".$end."') year)) >= 6 then DATE_ADD(DATE_ADD(policy_DOC, INTERVAL TIMESTAMPDIFF(year,policy_DOC,'".$end."') year),INTERVAL -6 month)
				else DATE_ADD(policy_DOC, INTERVAL TIMESTAMPDIFF(year,policy_DOC,'".$end."') year) end as due_date
				from policy where policy_mode_of_payment='2'
			union
				select policy.*,'HLY' as mode
				,case when TIMESTAMPDIFF(month,'".$start."',DATE_ADD(policy_DOC, INTERVAL TIMESTAMPDIFF(year, policy_DOC,'".$end."') year)) < 6 then DATE_ADD(DATE_ADD(policy_DOC, INTERVAL TIMESTAMPDIFF(year, policy_DOC,'".$end."') year),INTERVAL 6 month)
				else DATE_ADD(policy_DOC, INTERVAL TIMESTAMPDIFF(year, policy_DOC,'".$end."') year) end as due_date
				from policy where policy_mode_of_payment='2'
			union
				select policy.*,'QLY' as mode
				,DATE_ADD(DATE_ADD(policy_DOC, INTERVAL TIMESTAMPDIFF(year, policy_DOC,'".$end."') year),INTERVAL -TIMESTAMPDIFF(QUARTER,'".$start."',DATE_ADD(policy_DOC, INTERVAL TIMESTAMPDIFF(year,policy_DOC,'".$end."') year)) QUARTER)as due_date
				from policy where policy_mode_of_payment='3'
			union
				select policy.*,'QLY' as mode
				,DATE_ADD(DATE_ADD(policy_DOC, INTERVAL TIMESTAMPDIFF(year, policy_DOC,'".$end."') year),INTERVAL -TIMESTAMPDIFF(QUARTER,'".$start."',DATE_ADD(policy_DOC, INTERVAL TIMESTAMPDIFF(year,policy_DOC,'".$end."') year))+1 QUARTER)as due_date
				from policy where policy_mode_of_payment='3'
			union
				select policy.*,'QLY' as mode
				,DATE_ADD(DATE_ADD(policy_DOC, INTERVAL TIMESTAMPDIFF(year, policy_DOC,'".$end."') year),INTERVAL -TIMESTAMPDIFF(QUARTER,'".$start."',DATE_ADD(policy_DOC, INTERVAL TIMESTAMPDIFF(year,policy_DOC,'".$end."') year))+2 QUARTER)as due_date
				from policy where policy_mode_of_payment='3'
			union
				select policy.*,'QLY' as mode
				,DATE_ADD(DATE_ADD(policy_DOC, INTERVAL TIMESTAMPDIFF(year, policy_DOC,'".$end."') year),INTERVAL -TIMESTAMPDIFF(QUARTER,'".$start."',DATE_ADD(policy_DOC, INTERVAL TIMESTAMPDIFF(year,policy_DOC,'".$end."') year))+3 QUARTER)as due_date
				from policy where policy_mode_of_payment='3'
			union
				select policy.*,'MLY' as mode
				,DATE_ADD(DATE_ADD(policy_DOC, INTERVAL TIMESTAMPDIFF(year, policy_DOC,'".$end."') year),INTERVAL -TIMESTAMPDIFF(MONTH,'".$start."',DATE_ADD(policy_DOC, INTERVAL TIMESTAMPDIFF(year,policy_DOC,'".$end."') year)) MONTH)as due_date
				from policy where policy_mode_of_payment in ('12','4')
			union
				select policy.*,'MLY' as mode
				,DATE_ADD(DATE_ADD(policy_DOC, INTERVAL TIMESTAMPDIFF(year, policy_DOC,'".$end."') year),INTERVAL -TIMESTAMPDIFF(MONTH,'".$start."',DATE_ADD(policy_DOC, INTERVAL TIMESTAMPDIFF(year,policy_DOC,'".$end."') year))+1 MONTH)as due_date
				from policy where policy_mode_of_payment in ('12','4')
			union
				select policy.*,'MLY' as mode
				,DATE_ADD(DATE_ADD(policy_DOC, INTERVAL TIMESTAMPDIFF(year, policy_DOC,'".$end."') year),INTERVAL -TIMESTAMPDIFF(MONTH,'".$start."',DATE_ADD(policy_DOC, INTERVAL TIMESTAMPDIFF(year,policy_DOC,'".$end."') year))+2 MONTH)as due_date
				from policy where policy_mode_of_payment in ('12','4')
			union
				select policy.*,'MLY' as mode
				,DATE_ADD(DATE_ADD(policy_DOC, INTERVAL TIMESTAMPDIFF(year, policy_DOC,'".$end."') year),INTERVAL -TIMESTAMPDIFF(MONTH,'".$start."',DATE_ADD(policy_DOC, INTERVAL TIMESTAMPDIFF(year,policy_DOC,'".$end."') year))+3 MONTH)as due_date
				from policy where policy_mode_of_payment in ('12','4')
			union
				select policy.*,'MLY' as mode
				,DATE_ADD(DATE_ADD(policy_DOC, INTERVAL TIMESTAMPDIFF(year, policy_DOC,'".$end."') year),INTERVAL -TIMESTAMPDIFF(MONTH,'".$start."',DATE_ADD(policy_DOC, INTERVAL TIMESTAMPDIFF(year,policy_DOC,'".$end."') year))+4 MONTH)as due_date
				from policy where policy_mode_of_payment in ('12','4')
			union
				select policy.*,'MLY' as mode
				,DATE_ADD(DATE_ADD(policy_DOC, INTERVAL TIMESTAMPDIFF(year, policy_DOC,'".$end."') year),INTERVAL -TIMESTAMPDIFF(MONTH,'".$start."',DATE_ADD(policy_DOC, INTERVAL TIMESTAMPDIFF(year,policy_DOC,'".$end."') year))+5 MONTH)as due_date
				from policy where policy_mode_of_payment in ('12','4')
			union
				select policy.*,'MLY' as mode
				,DATE_ADD(DATE_ADD(policy_DOC, INTERVAL TIMESTAMPDIFF(year, policy_DOC,'".$end."') year),INTERVAL -TIMESTAMPDIFF(MONTH,'".$start."',DATE_ADD(policy_DOC, INTERVAL TIMESTAMPDIFF(year,policy_DOC,'".$end."') year))+6 MONTH)as due_date
				from policy where policy_mode_of_payment in ('12','4')
			union
				select policy.*,'MLY' as mode
				,DATE_ADD(DATE_ADD(policy_DOC, INTERVAL TIMESTAMPDIFF(year, policy_DOC,'".$end."') year),INTERVAL -TIMESTAMPDIFF(MONTH,'".$start."',DATE_ADD(policy_DOC, INTERVAL TIMESTAMPDIFF(year,policy_DOC,'".$end."') year))+7 MONTH)as due_date
				from policy where policy_mode_of_payment in ('12','4')
			union
				select policy.*,'MLY' as mode
				,DATE_ADD(DATE_ADD(policy_DOC, INTERVAL TIMESTAMPDIFF(year, policy_DOC,'".$end."') year),INTERVAL -TIMESTAMPDIFF(MONTH,'".$start."',DATE_ADD(policy_DOC, INTERVAL TIMESTAMPDIFF(year,policy_DOC,'".$end."') year))+8 MONTH)as due_date
				from policy where policy_mode_of_payment in ('12','4')
			union
				select policy.*,'MLY' as mode
				,DATE_ADD(DATE_ADD(policy_DOC, INTERVAL TIMESTAMPDIFF(year, policy_DOC,'".$end."') year),INTERVAL -TIMESTAMPDIFF(MONTH,'".$start."',DATE_ADD(policy_DOC, INTERVAL TIMESTAMPDIFF(year,policy_DOC,'".$end."') year))+9 MONTH)as due_date
				from policy where policy_mode_of_payment in ('12','4')
			union
				select policy.*,'MLY' as mode
				,DATE_ADD(DATE_ADD(policy_DOC, INTERVAL TIMESTAMPDIFF(year, policy_DOC,'".$end."') year),INTERVAL -TIMESTAMPDIFF(MONTH,'".$start."',DATE_ADD(policy_DOC, INTERVAL TIMESTAMPDIFF(year,policy_DOC,'".$end."') year))+10 MONTH)as due_date
				from policy where policy_mode_of_payment in ('12','4')
			union
				select policy.*,'MLY' as mode
				,DATE_ADD(DATE_ADD(policy_DOC, INTERVAL TIMESTAMPDIFF(year, policy_DOC,'".$end."') year),INTERVAL -TIMESTAMPDIFF(MONTH,'".$start."',DATE_ADD(policy_DOC, INTERVAL TIMESTAMPDIFF(year,policy_DOC,'".$end."') year))+11 MONTH)as due_date
				from policy where policy_mode_of_payment in ('12','4')
			)as data
			join client
			on policy_client_id=client_id
			where ('".$start."' between policy_DOC and policy_last_due or '".$end."' between policy_DOC and policy_last_due or policy_DOC between '".$start."' and '".$end."' or policy_last_due between '".$start."' and '".$end."')
			and due_date between policy_DOC and policy_last_due and due_date between '".$start."' and '".$end."' and client_family_acc_no='".$acc_no."' and policy_status='1'
			")->result_array();
		
		echo json_encode($data);
	}

	public function report_month_wise_due_list()
	{
		$start_date = $_POST['start'];
		$start = date('Y-m-d', strtotime($start_date));
		$end_date = $_POST['end'];
		$end = date('Y-m-d', strtotime($end_date));
		$month = $_POST['month'];
		$month_first_date=date('Y-m-01', strtotime($month));
		$month_last_date=date('Y-m-t', strtotime($month));
	
			$data = $this->db->query("select * from (select
				concat(TRIM(client_last_name),' ',TRIM(client_first_name),' ',TRIM(client_middle_name)) as name
				,policy_sum_assurance as S_A
				,client_family_acc_no
				,concat(policy_plan,' - ',policy_ppt) as plan_ppt
				,case when policy_DOC='9999-12-31' then ' ' when policy_DOC='1970-01-01' then ' ' else DATE_FORMAT(policy_DOC, '%d/%m/%Y') end as policy_DOC
				,policy_number
				,mode
				,case when policy_GST='1' then concat(policy_premium,' +')
				else policy_premium end as premium
				,case when due_date='9999-12-31' then ' ' when due_date='1970-01-01' then ' ' else DATE_FORMAT(due_date, '%d/%m/%Y') end as due_date
				,branch_code
				,agent_short_code
				,case when TIMESTAMPDIFF(month, policy_last_due,due_date)=0 then concat(DATE_FORMAT(client_DOB, '%d/%m/%Y'),'  **')
				else DATE_FORMAT(client_DOB, '%d/%m/%Y') end as client_DOB
				,' ' as date_of_payment
				from 
				(
					select policy.*
					,case when policy_mode_of_payment='1' then 'YLY' else 'SGL' end as mode
					,DATE_ADD(policy_DOC, INTERVAL TIMESTAMPDIFF(year, policy_DOC,'".$end."') year) as due_date
					from policy where policy_mode_of_payment in ('1','5')
				union
					select policy.*,'HLY' as mode
					,case when TIMESTAMPDIFF(month,'".$start."',DATE_ADD(policy_DOC, INTERVAL TIMESTAMPDIFF(year,policy_DOC,'".$end."') year)) >= 6 then DATE_ADD(DATE_ADD(policy_DOC, INTERVAL TIMESTAMPDIFF(year,policy_DOC,'".$end."') year),INTERVAL -6 month)
					else DATE_ADD(policy_DOC, INTERVAL TIMESTAMPDIFF(year,policy_DOC,'".$end."') year) end as due_date
					from policy where policy_mode_of_payment='2'
				union
					select policy.*,'HLY' as mode
					,case when TIMESTAMPDIFF(month,'".$start."',DATE_ADD(policy_DOC, INTERVAL TIMESTAMPDIFF(year, policy_DOC,'".$end."') year)) < 6 then DATE_ADD(DATE_ADD(policy_DOC, INTERVAL TIMESTAMPDIFF(year, policy_DOC,'".$end."') year),INTERVAL 6 month)
					else DATE_ADD(policy_DOC, INTERVAL TIMESTAMPDIFF(year, policy_DOC,'".$end."') year) end as due_date
					from policy where policy_mode_of_payment='2'
				union
					select policy.*,'QLY' as mode
					,DATE_ADD(DATE_ADD(policy_DOC, INTERVAL TIMESTAMPDIFF(year, policy_DOC,'".$end."') year),INTERVAL -TIMESTAMPDIFF(QUARTER,'".$start."',DATE_ADD(policy_DOC, INTERVAL TIMESTAMPDIFF(year,policy_DOC,'".$end."') year)) QUARTER)as due_date
					from policy where policy_mode_of_payment='3'
				union
					select policy.*,'QLY' as mode
					,DATE_ADD(DATE_ADD(policy_DOC, INTERVAL TIMESTAMPDIFF(year, policy_DOC,'".$end."') year),INTERVAL -TIMESTAMPDIFF(QUARTER,'".$start."',DATE_ADD(policy_DOC, INTERVAL TIMESTAMPDIFF(year,policy_DOC,'".$end."') year))+1 QUARTER)as due_date
					from policy where policy_mode_of_payment='3'
				union
					select policy.*,'QLY' as mode
					,DATE_ADD(DATE_ADD(policy_DOC, INTERVAL TIMESTAMPDIFF(year, policy_DOC,'".$end."') year),INTERVAL -TIMESTAMPDIFF(QUARTER,'".$start."',DATE_ADD(policy_DOC, INTERVAL TIMESTAMPDIFF(year,policy_DOC,'".$end."') year))+2 QUARTER)as due_date
					from policy where policy_mode_of_payment='3'
				union
					select policy.*,'QLY' as mode
					,DATE_ADD(DATE_ADD(policy_DOC, INTERVAL TIMESTAMPDIFF(year, policy_DOC,'".$end."') year),INTERVAL -TIMESTAMPDIFF(QUARTER,'".$start."',DATE_ADD(policy_DOC, INTERVAL TIMESTAMPDIFF(year,policy_DOC,'".$end."') year))+3 QUARTER)as due_date
					from policy where policy_mode_of_payment='3'
				union
					select policy.*,'MLY' as mode
					,DATE_ADD(DATE_ADD(policy_DOC, INTERVAL TIMESTAMPDIFF(year, policy_DOC,'".$end."') year),INTERVAL -TIMESTAMPDIFF(MONTH,'".$start."',DATE_ADD(policy_DOC, INTERVAL TIMESTAMPDIFF(year,policy_DOC,'".$end."') year)) MONTH)as due_date
					from policy where policy_mode_of_payment in ('12','4')
				union
					select policy.*,'MLY' as mode
					,DATE_ADD(DATE_ADD(policy_DOC, INTERVAL TIMESTAMPDIFF(year, policy_DOC,'".$end."') year),INTERVAL -TIMESTAMPDIFF(MONTH,'".$start."',DATE_ADD(policy_DOC, INTERVAL TIMESTAMPDIFF(year,policy_DOC,'".$end."') year))+1 MONTH)as due_date
					from policy where policy_mode_of_payment in ('12','4')
				union
					select policy.*,'MLY' as mode
					,DATE_ADD(DATE_ADD(policy_DOC, INTERVAL TIMESTAMPDIFF(year, policy_DOC,'".$end."') year),INTERVAL -TIMESTAMPDIFF(MONTH,'".$start."',DATE_ADD(policy_DOC, INTERVAL TIMESTAMPDIFF(year,policy_DOC,'".$end."') year))+2 MONTH)as due_date
					from policy where policy_mode_of_payment in ('12','4')
				union
					select policy.*,'MLY' as mode
					,DATE_ADD(DATE_ADD(policy_DOC, INTERVAL TIMESTAMPDIFF(year, policy_DOC,'".$end."') year),INTERVAL -TIMESTAMPDIFF(MONTH,'".$start."',DATE_ADD(policy_DOC, INTERVAL TIMESTAMPDIFF(year,policy_DOC,'".$end."') year))+3 MONTH)as due_date
					from policy where policy_mode_of_payment in ('12','4')
				union
					select policy.*,'MLY' as mode
					,DATE_ADD(DATE_ADD(policy_DOC, INTERVAL TIMESTAMPDIFF(year, policy_DOC,'".$end."') year),INTERVAL -TIMESTAMPDIFF(MONTH,'".$start."',DATE_ADD(policy_DOC, INTERVAL TIMESTAMPDIFF(year,policy_DOC,'".$end."') year))+4 MONTH)as due_date
					from policy where policy_mode_of_payment in ('12','4')
				union
					select policy.*,'MLY' as mode
					,DATE_ADD(DATE_ADD(policy_DOC, INTERVAL TIMESTAMPDIFF(year, policy_DOC,'".$end."') year),INTERVAL -TIMESTAMPDIFF(MONTH,'".$start."',DATE_ADD(policy_DOC, INTERVAL TIMESTAMPDIFF(year,policy_DOC,'".$end."') year))+5 MONTH)as due_date
					from policy where policy_mode_of_payment in ('12','4')
				union
					select policy.*,'MLY' as mode
					,DATE_ADD(DATE_ADD(policy_DOC, INTERVAL TIMESTAMPDIFF(year, policy_DOC,'".$end."') year),INTERVAL -TIMESTAMPDIFF(MONTH,'".$start."',DATE_ADD(policy_DOC, INTERVAL TIMESTAMPDIFF(year,policy_DOC,'".$end."') year))+6 MONTH)as due_date
					from policy where policy_mode_of_payment in ('12','4')
				union
					select policy.*,'MLY' as mode
					,DATE_ADD(DATE_ADD(policy_DOC, INTERVAL TIMESTAMPDIFF(year, policy_DOC,'".$end."') year),INTERVAL -TIMESTAMPDIFF(MONTH,'".$start."',DATE_ADD(policy_DOC, INTERVAL TIMESTAMPDIFF(year,policy_DOC,'".$end."') year))+7 MONTH)as due_date
					from policy where policy_mode_of_payment in ('12','4')
				union
					select policy.*,'MLY' as mode
					,DATE_ADD(DATE_ADD(policy_DOC, INTERVAL TIMESTAMPDIFF(year, policy_DOC,'".$end."') year),INTERVAL -TIMESTAMPDIFF(MONTH,'".$start."',DATE_ADD(policy_DOC, INTERVAL TIMESTAMPDIFF(year,policy_DOC,'".$end."') year))+8 MONTH)as due_date
					from policy where policy_mode_of_payment in ('12','4')
				union
					select policy.*,'MLY' as mode
					,DATE_ADD(DATE_ADD(policy_DOC, INTERVAL TIMESTAMPDIFF(year, policy_DOC,'".$end."') year),INTERVAL -TIMESTAMPDIFF(MONTH,'".$start."',DATE_ADD(policy_DOC, INTERVAL TIMESTAMPDIFF(year,policy_DOC,'".$end."') year))+9 MONTH)as due_date
					from policy where policy_mode_of_payment in ('12','4')
				union
					select policy.*,'MLY' as mode
					,DATE_ADD(DATE_ADD(policy_DOC, INTERVAL TIMESTAMPDIFF(year, policy_DOC,'".$end."') year),INTERVAL -TIMESTAMPDIFF(MONTH,'".$start."',DATE_ADD(policy_DOC, INTERVAL TIMESTAMPDIFF(year,policy_DOC,'".$end."') year))+10 MONTH)as due_date
					from policy where policy_mode_of_payment in ('12','4')
				union
					select policy.*,'MLY' as mode
					,DATE_ADD(DATE_ADD(policy_DOC, INTERVAL TIMESTAMPDIFF(year, policy_DOC,'".$end."') year),INTERVAL -TIMESTAMPDIFF(MONTH,'".$start."',DATE_ADD(policy_DOC, INTERVAL TIMESTAMPDIFF(year,policy_DOC,'".$end."') year))+11 MONTH)as due_date
					from policy where policy_mode_of_payment in ('12','4')
				)as data
				join client on policy_client_id=client_id
				join branch	on policy_branch_id=branch_id
				join agent on policy_agent_id=agent_id
				where ('".$start."' between policy_DOC and policy_last_due or '".$end."' between policy_DOC and policy_last_due or policy_DOC between '".$start."' and '".$end."' or policy_last_due between '".$start."' and '".$end."')
				and due_date between policy_DOC and policy_last_due and due_date between '".$month_first_date."' and '".$month_last_date."' and policy_status='1'
				order by  name,DATE_FORMAT(due_date, '%Y/%m/%d')) as parent
				union 
				select
				'Total Dues  : ' as name
				,' ' as S_A
				,count(policy_DOC) as client_family_acc_no
				,' ' as plan_ppt
				,' ' as policy_DOC
				,'Total Prem. :' as policy_number
				,' ' as mode
				,sum(policy_premium) as premium
				,' ' as due_date
				,' ' as branch_code
				,' ' as agent_short_code
				,' ' as client_DOB
				,' ' as date_of_payment
				from (
					select policy.*
					,case when policy_mode_of_payment='1' then 'YLY' else 'SGL' end as mode
					,DATE_ADD(policy_DOC, INTERVAL TIMESTAMPDIFF(year, policy_DOC,'".$end."') year) as due_date
					from policy where policy_mode_of_payment in ('1','5')
				union
					select policy.*,'HLY' as mode
					,case when TIMESTAMPDIFF(month,'".$start."',DATE_ADD(policy_DOC, INTERVAL TIMESTAMPDIFF(year,policy_DOC,'".$end."') year)) >= 6 then DATE_ADD(DATE_ADD(policy_DOC, INTERVAL TIMESTAMPDIFF(year,policy_DOC,'".$end."') year),INTERVAL -6 month)
					else DATE_ADD(policy_DOC, INTERVAL TIMESTAMPDIFF(year,policy_DOC,'".$end."') year) end as due_date
					from policy where policy_mode_of_payment='2'
				union
					select policy.*,'HLY' as mode
					,case when TIMESTAMPDIFF(month,'".$start."',DATE_ADD(policy_DOC, INTERVAL TIMESTAMPDIFF(year, policy_DOC,'".$end."') year)) < 6 then DATE_ADD(DATE_ADD(policy_DOC, INTERVAL TIMESTAMPDIFF(year, policy_DOC,'".$end."') year),INTERVAL 6 month)
					else DATE_ADD(policy_DOC, INTERVAL TIMESTAMPDIFF(year, policy_DOC,'".$end."') year) end as due_date
					from policy where policy_mode_of_payment='2'
				union
					select policy.*,'QLY' as mode
					,DATE_ADD(DATE_ADD(policy_DOC, INTERVAL TIMESTAMPDIFF(year, policy_DOC,'".$end."') year),INTERVAL -TIMESTAMPDIFF(QUARTER,'".$start."',DATE_ADD(policy_DOC, INTERVAL TIMESTAMPDIFF(year,policy_DOC,'".$end."') year)) QUARTER)as due_date
					from policy where policy_mode_of_payment='3'
				union
					select policy.*,'QLY' as mode
					,DATE_ADD(DATE_ADD(policy_DOC, INTERVAL TIMESTAMPDIFF(year, policy_DOC,'".$end."') year),INTERVAL -TIMESTAMPDIFF(QUARTER,'".$start."',DATE_ADD(policy_DOC, INTERVAL TIMESTAMPDIFF(year,policy_DOC,'".$end."') year))+1 QUARTER)as due_date
					from policy where policy_mode_of_payment='3'
				union
					select policy.*,'QLY' as mode
					,DATE_ADD(DATE_ADD(policy_DOC, INTERVAL TIMESTAMPDIFF(year, policy_DOC,'".$end."') year),INTERVAL -TIMESTAMPDIFF(QUARTER,'".$start."',DATE_ADD(policy_DOC, INTERVAL TIMESTAMPDIFF(year,policy_DOC,'".$end."') year))+2 QUARTER)as due_date
					from policy where policy_mode_of_payment='3'
				union
					select policy.*,'QLY' as mode
					,DATE_ADD(DATE_ADD(policy_DOC, INTERVAL TIMESTAMPDIFF(year, policy_DOC,'".$end."') year),INTERVAL -TIMESTAMPDIFF(QUARTER,'".$start."',DATE_ADD(policy_DOC, INTERVAL TIMESTAMPDIFF(year,policy_DOC,'".$end."') year))+3 QUARTER)as due_date
					from policy where policy_mode_of_payment='3'
				union
					select policy.*,'MLY' as mode
					,DATE_ADD(DATE_ADD(policy_DOC, INTERVAL TIMESTAMPDIFF(year, policy_DOC,'".$end."') year),INTERVAL -TIMESTAMPDIFF(MONTH,'".$start."',DATE_ADD(policy_DOC, INTERVAL TIMESTAMPDIFF(year,policy_DOC,'".$end."') year)) MONTH)as due_date
					from policy where policy_mode_of_payment in ('12','4')
				union
					select policy.*,'MLY' as mode
					,DATE_ADD(DATE_ADD(policy_DOC, INTERVAL TIMESTAMPDIFF(year, policy_DOC,'".$end."') year),INTERVAL -TIMESTAMPDIFF(MONTH,'".$start."',DATE_ADD(policy_DOC, INTERVAL TIMESTAMPDIFF(year,policy_DOC,'".$end."') year))+1 MONTH)as due_date
					from policy where policy_mode_of_payment in ('12','4')
				union
					select policy.*,'MLY' as mode
					,DATE_ADD(DATE_ADD(policy_DOC, INTERVAL TIMESTAMPDIFF(year, policy_DOC,'".$end."') year),INTERVAL -TIMESTAMPDIFF(MONTH,'".$start."',DATE_ADD(policy_DOC, INTERVAL TIMESTAMPDIFF(year,policy_DOC,'".$end."') year))+2 MONTH)as due_date
					from policy where policy_mode_of_payment in ('12','4')
				union
					select policy.*,'MLY' as mode
					,DATE_ADD(DATE_ADD(policy_DOC, INTERVAL TIMESTAMPDIFF(year, policy_DOC,'".$end."') year),INTERVAL -TIMESTAMPDIFF(MONTH,'".$start."',DATE_ADD(policy_DOC, INTERVAL TIMESTAMPDIFF(year,policy_DOC,'".$end."') year))+3 MONTH)as due_date
					from policy where policy_mode_of_payment in ('12','4')
				union
					select policy.*,'MLY' as mode
					,DATE_ADD(DATE_ADD(policy_DOC, INTERVAL TIMESTAMPDIFF(year, policy_DOC,'".$end."') year),INTERVAL -TIMESTAMPDIFF(MONTH,'".$start."',DATE_ADD(policy_DOC, INTERVAL TIMESTAMPDIFF(year,policy_DOC,'".$end."') year))+4 MONTH)as due_date
					from policy where policy_mode_of_payment in ('12','4')
				union
					select policy.*,'MLY' as mode
					,DATE_ADD(DATE_ADD(policy_DOC, INTERVAL TIMESTAMPDIFF(year, policy_DOC,'".$end."') year),INTERVAL -TIMESTAMPDIFF(MONTH,'".$start."',DATE_ADD(policy_DOC, INTERVAL TIMESTAMPDIFF(year,policy_DOC,'".$end."') year))+5 MONTH)as due_date
					from policy where policy_mode_of_payment in ('12','4')
				union
					select policy.*,'MLY' as mode
					,DATE_ADD(DATE_ADD(policy_DOC, INTERVAL TIMESTAMPDIFF(year, policy_DOC,'".$end."') year),INTERVAL -TIMESTAMPDIFF(MONTH,'".$start."',DATE_ADD(policy_DOC, INTERVAL TIMESTAMPDIFF(year,policy_DOC,'".$end."') year))+6 MONTH)as due_date
					from policy where policy_mode_of_payment in ('12','4')
				union
					select policy.*,'MLY' as mode
					,DATE_ADD(DATE_ADD(policy_DOC, INTERVAL TIMESTAMPDIFF(year, policy_DOC,'".$end."') year),INTERVAL -TIMESTAMPDIFF(MONTH,'".$start."',DATE_ADD(policy_DOC, INTERVAL TIMESTAMPDIFF(year,policy_DOC,'".$end."') year))+7 MONTH)as due_date
					from policy where policy_mode_of_payment in ('12','4')
				union
					select policy.*,'MLY' as mode
					,DATE_ADD(DATE_ADD(policy_DOC, INTERVAL TIMESTAMPDIFF(year, policy_DOC,'".$end."') year),INTERVAL -TIMESTAMPDIFF(MONTH,'".$start."',DATE_ADD(policy_DOC, INTERVAL TIMESTAMPDIFF(year,policy_DOC,'".$end."') year))+8 MONTH)as due_date
					from policy where policy_mode_of_payment in ('12','4')
				union
					select policy.*,'MLY' as mode
					,DATE_ADD(DATE_ADD(policy_DOC, INTERVAL TIMESTAMPDIFF(year, policy_DOC,'".$end."') year),INTERVAL -TIMESTAMPDIFF(MONTH,'".$start."',DATE_ADD(policy_DOC, INTERVAL TIMESTAMPDIFF(year,policy_DOC,'".$end."') year))+9 MONTH)as due_date
					from policy where policy_mode_of_payment in ('12','4')
				union
					select policy.*,'MLY' as mode
					,DATE_ADD(DATE_ADD(policy_DOC, INTERVAL TIMESTAMPDIFF(year, policy_DOC,'".$end."') year),INTERVAL -TIMESTAMPDIFF(MONTH,'".$start."',DATE_ADD(policy_DOC, INTERVAL TIMESTAMPDIFF(year,policy_DOC,'".$end."') year))+10 MONTH)as due_date
					from policy where policy_mode_of_payment in ('12','4')
				union
					select policy.*,'MLY' as mode
					,DATE_ADD(DATE_ADD(policy_DOC, INTERVAL TIMESTAMPDIFF(year, policy_DOC,'".$end."') year),INTERVAL -TIMESTAMPDIFF(MONTH,'".$start."',DATE_ADD(policy_DOC, INTERVAL TIMESTAMPDIFF(year,policy_DOC,'".$end."') year))+11 MONTH)as due_date
					from policy where policy_mode_of_payment in ('12','4')
				)as data
				join client
				on policy_client_id=client_id
				where ('".$start."' between policy_DOC and policy_last_due or '".$end."' between policy_DOC and policy_last_due or policy_DOC between '".$start."' and '".$end."' or policy_last_due between '".$start."' and '".$end."')
				and due_date between policy_DOC and policy_last_due and due_date between '".$month_first_date."' and '".$month_last_date."' and policy_status='1'

				")->result_array();
		echo json_encode($data);
	}

	function report_policy_number_wise()
	{
		$data = $this->db->query("select * from (SELECT 
			concat(client_last_name,' ',client_first_name,' ',client_middle_name) as name
			,case when client_DOB='9999-12-31' then ' ' when client_DOB='1970-01-01' then ' ' else DATE_FORMAT(client_DOB, '%d/%m/%Y') end as DOB
			,policy_number
			,policy_sum_assurance as S_A
			,concat(policy_plan,'-',policy_term,'-',policy_PPT) as PTP
			,case when policy_DOC='9999-12-31' then ' ' when policy_DOC='1970-01-01' then ' ' else DATE_FORMAT(policy_DOC, '%d/%m/%Y') end as DOC
			,case when policy_mode_of_payment ='1' then 'YLY' when policy_mode_of_payment='2' then 'HLY' when policy_mode_of_payment='3' then 'QLY' when policy_mode_of_payment='12' then 'MON' when policy_mode_of_payment='4' then 'SSS' when policy_mode_of_payment='5' then 'ONE' else 'NA' end as mode_of_payment
			,policy_premium
			,policy_status as mode_of_status
			,branch_code
			,agent_short_code
			,client_family_acc_no
			FROM policy
			join client on policy_client_id=client_id
			join branch	on policy_branch_id=branch_id
			join agent on policy_agent_id=agent_id
			order by policy_number+0) as data1 
			union
			select * from (SELECT 
			'Total : ' as name
			,' 'as DOB
			,' ' as policy_number
			,sum(policy_sum_assurance)as S_A
			,' ' as PTP
			,' '  as DOC
			,' ' as mode_of_payment
			,sum(case when policy_mode_of_payment ='1' then policy_premium*1 when policy_mode_of_payment='2' then policy_premium*2 when policy_mode_of_payment='3' then policy_premium*4 when policy_mode_of_payment='12' then policy_premium*12 when policy_mode_of_payment='4' then policy_premium*1 when policy_mode_of_payment='5' then policy_premium*1 end) as policy_premium
			,' ' as mode_of_status
			,' ' as branch_code
			,' ' as agent_short_code
			,count(policy_number) as client_family_acc_no
			FROM policy
			join client on policy_client_id=client_id
			join branch	on policy_branch_id=branch_id
			join agent on policy_agent_id=agent_id) as  data2")->result_array();
		echo  json_encode($data);
	}

	function report_surname_wise()
	{
		$data = $this->db->query("select * from (select * from (SELECT SUBSTRING(client_last_name, 1, 1) as first_char
			,concat(TRIM(client_last_name),'ZZ') as last_name
			,concat(TRIM(client_last_name),' ',TRIM(client_first_name),' ',TRIM(client_middle_name)) as name
			,case when policy_DOC='9999-12-31' then ' ' when policy_DOC='1970-01-01' then ' ' else DATE_FORMAT(policy_DOC, '%d/%m/%Y') end  as DOC
			,policy_number
			,policy_sum_assurance as S_A
			,concat(policy_plan,'-',policy_term,'-',policy_PPT) as PTP
			,case when client_DOB='9999-12-31' then ' ' when client_DOB='1970-01-01' then ' ' else DATE_FORMAT(client_DOB, '%d/%m/%Y') end as DOB
			,case when policy_mode_of_payment ='1' then 'YLY' when policy_mode_of_payment='2' then 'HLY' when policy_mode_of_payment='3' then 'QLY' when policy_mode_of_payment='12' then 'MON' when policy_mode_of_payment='4' then 'SSS' when policy_mode_of_payment='5' then 'ONE' else 'NA' end as mode_of_payment
			,policy_premium
			,policy_status as mode_of_status
			,branch_code
			,agent_short_code
			,client_family_acc_no
			FROM policy
			join client on policy_client_id=client_id
			join branch	on policy_branch_id=branch_id
			join agent on policy_agent_id=agent_id
			union 
			SELECT 
			SUBSTRING(client_last_name, 1, 1) as first_char
			,TRIM(client_last_name) as last_name
			,'-----   Sub-Total   -----' as name
			,' ' as DOC
			,' ' as policy_number
			,' ' as S_A
			,' ' as PTP
			,' ' as DOB
			,' ' as mode_of_payment
			,' ' as policy_premium
			,' ' as mode_of_status
			,' ' as branch_code
			,' ' as agent_short_code
			,count(policy_number) as client_family_acc_no
			FROM policy
			join client on policy_client_id=client_id
			join branch	on policy_branch_id=branch_id
			join agent on policy_agent_id=agent_id
			group by client_last_name) as data order by first_char Asc,last_name desc,name Asc) as data1 
			union
			select * from (SELECT 
			' ' as first_char
			,' ' as last_name
			,'Total : ' as name
			,' 'as DOB
			,' ' as policy_number
			,sum(policy_sum_assurance)as S_A
			,' ' as PTP
			,' '  as DOC
			,' ' as mode_of_payment
			,sum(case when policy_mode_of_payment ='1' then policy_premium*1 when policy_mode_of_payment='2' then policy_premium*2 when policy_mode_of_payment='3' then policy_premium*4 when policy_mode_of_payment='12' then policy_premium*12 when policy_mode_of_payment='4' then policy_premium*1 when policy_mode_of_payment='5' then policy_premium*1 end) as policy_premium
			,' ' as mode_of_status
			,' ' as branch_code
			,' ' as agent_short_code
			,count(policy_number) as client_family_acc_no
			FROM policy
			join client on policy_client_id=client_id
			join branch	on policy_branch_id=branch_id
			join agent on policy_agent_id=agent_id) as  data2")->result_array();
		echo  json_encode($data);
	}

	function report_sex_wise()
	{
		$gender = $_POST['gender'];
		$sex_sort = $_POST['sex_sort'];
		$data = $this->db->query("select * from (SELECT 
			concat(TRIM(client_last_name),' ',TRIM(client_first_name),' ',TRIM(client_middle_name)) as name
			,case when policy_DOC='9999-12-31' then ' ' when policy_DOC='1970-01-01' then ' ' else DATE_FORMAT(policy_DOC, '%d/%m/%Y') end as DOC
			,policy_number
			,policy_sum_assurance as S_A
			,concat(policy_plan,'-',policy_term,'-',policy_PPT) as PTP
			,case when client_DOB='9999-12-31' then ' ' when client_DOB='1970-01-01' then ' ' else DATE_FORMAT(client_DOB, '%d/%m/%Y') end as DOB
			,case when policy_mode_of_payment ='1' then 'YLY' when policy_mode_of_payment='2' then 'HLY' when policy_mode_of_payment='3' then 'QLY' when policy_mode_of_payment='12' then 'MON' when policy_mode_of_payment='4' then 'SSS' when policy_mode_of_payment='5' then 'ONE' else 'NA' end as mode_of_payment
			,policy_premium
			,policy_status as mode_of_status
			,branch_code
			,agent_short_code
			,client_family_acc_no
			FROM policy
			join client on policy_client_id=client_id
			join branch	on policy_branch_id=branch_id
			join agent on policy_agent_id=agent_id
			where client_gender = '".$gender."'
			order by ".$sex_sort.") as data1 
			union
			select * from (SELECT 
			'Total : ' as name
			,' 'as DOB
			,' ' as policy_number
			,sum(policy_sum_assurance)as S_A
			,' ' as PTP
			,' '  as DOC
			,' ' as mode_of_payment
			,sum(case when policy_mode_of_payment ='1' then policy_premium*1 when policy_mode_of_payment='2' then policy_premium*2 when policy_mode_of_payment='3' then policy_premium*4 when policy_mode_of_payment='12' then policy_premium*12 when policy_mode_of_payment='4' then policy_premium*1 when policy_mode_of_payment='5' then policy_premium*1 end) as policy_premium
			,' ' as mode_of_status
			,' ' as branch_code
			,' ' as agent_short_code
			,count(policy_number) as client_family_acc_no
			FROM policy
			join client on policy_client_id=client_id
			join branch	on policy_branch_id=branch_id
			join agent on policy_agent_id=agent_id
			where client_gender = '".$gender."') as  data2")->result_array();
		echo  json_encode($data);
	}

	function report_DOB_wise()
	{
		$data = $this->db->query("select * from (SELECT 
			concat(TRIM(client_last_name),' ',TRIM(client_first_name),' ',TRIM(client_middle_name)) as name
			,case when policy_DOC='9999-12-31' then ' ' when policy_DOC='1970-01-01' then ' ' else DATE_FORMAT(policy_DOC, '%d/%m/%Y') end as DOC
			,policy_number
			,policy_sum_assurance as S_A
			,concat(policy_plan,'-',policy_term,'-',policy_PPT) as PTP
			,case when client_DOB='9999-12-31' then ' ' when client_DOB='1970-01-01' then ' ' else DATE_FORMAT(client_DOB, '%d/%m/%Y') end as DOB
			,case when policy_mode_of_payment ='1' then 'YLY' when policy_mode_of_payment='2' then 'HLY' when policy_mode_of_payment='3' then 'QLY' when policy_mode_of_payment='12' then 'MON' when policy_mode_of_payment='4' then 'SSS' when policy_mode_of_payment='5' then 'ONE' else 'NA' end as mode_of_payment
			,policy_premium
			,policy_status as mode_of_status
			,branch_code
			,agent_short_code
			,client_family_acc_no
			FROM policy
			join client on policy_client_id=client_id
			join branch	on policy_branch_id=branch_id
			join agent on policy_agent_id=agent_id
			order by DATE_FORMAT(client_DOB, '%Y/%m/%d'),name) as data1 
			union
			select * from (SELECT 
			'Total : ' as name
			,' 'as DOB
			,' ' as policy_number
			,sum(policy_sum_assurance)as S_A
			,' ' as PTP
			,' '  as DOC
			,' ' as mode_of_payment
			,sum(case when policy_mode_of_payment ='1' then policy_premium*1 when policy_mode_of_payment='2' then policy_premium*2 when policy_mode_of_payment='3' then policy_premium*4 when policy_mode_of_payment='12' then policy_premium*12 when policy_mode_of_payment='4' then policy_premium*1 when policy_mode_of_payment='5' then policy_premium*1 end) as policy_premium
			,' ' as mode_of_status
			,' ' as branch_code
			,' ' as agent_short_code
			,count(policy_number) as client_family_acc_no
			FROM policy
			join client on policy_client_id=client_id
			join branch	on policy_branch_id=branch_id
			join agent on policy_agent_id=agent_id) as  data2")->result_array();
		echo  json_encode($data);
	}

	function report_plan_and_term_wise()
	{
		$data = $this->db->query("select * from (SELECT 
			concat(TRIM(client_last_name),' ',TRIM(client_first_name),' ',TRIM(client_middle_name)) as name
			,case when policy_DOC='9999-12-31' then ' ' when policy_DOC='1970-01-01' then ' ' else DATE_FORMAT(policy_DOC, '%d/%m/%Y') end as DOC
			,policy_number
			,policy_sum_assurance as S_A
			,concat(policy_plan,'-',policy_term,'-',policy_PPT) as PTP
			,case when client_DOB='9999-12-31' then ' ' when client_DOB='1970-01-01' then ' ' else DATE_FORMAT(client_DOB, '%d/%m/%Y') end as DOB
			,case when policy_mode_of_payment ='1' then 'YLY' when policy_mode_of_payment='2' then 'HLY' when policy_mode_of_payment='3' then 'QLY' when policy_mode_of_payment='12' then 'MON' when policy_mode_of_payment='4' then 'SSS' when policy_mode_of_payment='5' then 'ONE' else 'NA' end as mode_of_payment
			,policy_premium
			,policy_status as mode_of_status
			,branch_code
			,agent_short_code
			,client_family_acc_no
			FROM policy
			join client on policy_client_id=client_id
			join branch	on policy_branch_id=branch_id
			join agent on policy_agent_id=agent_id
			order by policy_plan+0,policy_term+0) as data1 
			union
			select * from (SELECT 
			'Total : ' as name
			,' 'as DOB
			,' ' as policy_number
			,sum(policy_sum_assurance)as S_A
			,' ' as PTP
			,' '  as DOC
			,' ' as mode_of_payment
			,sum(case when policy_mode_of_payment ='1' then policy_premium*1 when policy_mode_of_payment='2' then policy_premium*2 when policy_mode_of_payment='3' then policy_premium*4 when policy_mode_of_payment='12' then policy_premium*12 when policy_mode_of_payment='4' then policy_premium*1 when policy_mode_of_payment='5' then policy_premium*1 end) as policy_premium
			,' ' as mode_of_status
			,' ' as branch_code
			,' ' as agent_short_code
			,count(policy_number) as client_family_acc_no
			FROM policy
			join client on policy_client_id=client_id
			join branch	on policy_branch_id=branch_id
			join agent on policy_agent_id=agent_id) as  data2")->result_array();
		echo  json_encode($data);
	}
	function report_mode_of_payment_wise()
	{
		$mode = $_POST['mode'];	
		$data = $this->db->query("select * from (SELECT 
			concat(TRIM(client_last_name),' ',TRIM(client_first_name),' ',TRIM(client_middle_name)) as name
			,case when policy_DOC='9999-12-31' then ' ' when policy_DOC='1970-01-01' then ' ' else DATE_FORMAT(policy_DOC, '%d/%m/%Y') end as DOC
			,policy_number
			,policy_sum_assurance as S_A
			,concat(policy_plan,'-',policy_term,'-',policy_PPT) as PTP
			,case when client_DOB='9999-12-31' then ' ' when client_DOB='1970-01-01' then ' ' else DATE_FORMAT(client_DOB, '%d/%m/%Y') end as DOB
			,case when policy_mode_of_payment ='1' then 'YLY' when policy_mode_of_payment='2' then 'HLY' when policy_mode_of_payment='3' then 'QLY' when policy_mode_of_payment='12' then 'MON' when policy_mode_of_payment='4' then 'SSS' when policy_mode_of_payment='5' then 'ONE' else 'NA' end as mode_of_payment
			,policy_premium
			,policy_status as mode_of_status
			,branch_code
			,agent_short_code
			,client_family_acc_no
			FROM policy
			join client on policy_client_id=client_id
			join branch	on policy_branch_id=branch_id
			join agent on policy_agent_id=agent_id
			where policy_mode_of_payment = '".$mode."'
			order by name) as data1 
			union
			select * from (SELECT 
			'Total : ' as name
			,' 'as DOB
			,' ' as policy_number
			,sum(policy_sum_assurance)as S_A
			,' ' as PTP
			,' '  as DOC
			,' ' as mode_of_payment
			,sum(case when policy_mode_of_payment ='1' then policy_premium*1 when policy_mode_of_payment='2' then policy_premium*2 when policy_mode_of_payment='3' then policy_premium*4 when policy_mode_of_payment='12' then policy_premium*12 when policy_mode_of_payment='4' then policy_premium*1 when policy_mode_of_payment='5' then policy_premium*1 end) as policy_premium
			,' ' as mode_of_status
			,' ' as branch_code
			,' ' as agent_short_code
			,count(policy_number) as client_family_acc_no
			FROM policy
			join client on policy_client_id=client_id
			join branch	on policy_branch_id=branch_id
			join agent on policy_agent_id=agent_id
			where policy_mode_of_payment = '".$mode."') as  data2")->result_array();
		echo  json_encode($data);
	}
	
	function report_SB_due_date_wise()
	{
		$start_date = $_POST['start'];
		$start = date('Y-m-d', strtotime($start_date));
		$end_date = $_POST['end'];
		$end = date('Y-m-d', strtotime($end_date));
		$data = $this->db->query("select * from (SELECT 
			concat(client_last_name,' ',client_first_name,' ',client_middle_name) as name
			,client_family_acc_no
			,policy_sum_assurance as S_A
			,concat(policy_plan,'-',policy_term,'-',policy_PPT) as P_T_PPT
			,case when policy_DOC='9999-12-31' then ' ' when policy_DOC='1970-01-01' then ' ' else DATE_FORMAT(policy_DOC, '%d/%m/%Y') end as DOC
			,policy_number
			,case when policy_mode_of_payment ='1' then 'YLY' when policy_mode_of_payment='2' then 'HLY' when policy_mode_of_payment='3' then 'QLY' when policy_mode_of_payment='12' then 'MON' when policy_mode_of_payment='4' then 'SSS' when policy_mode_of_payment='5' then 'ONE' else 'NA' end as mode_of_payment			
			,DATE_FORMAT(policy_last_due, '%d/%m/%Y') as policy_last_due
			,DATE_FORMAT(policy_maturity_date, '%d/%m/%Y') as policy_maturity_date
			,branch_code
			,agent_short_code
			,DATE_FORMAT(SB_Due_date, '%d/%m/%Y') as SB_Due_date
			,SB_due_amount
			,' 'as remark
			FROM policy
			join client on policy_client_id=client_id
			join branch	on policy_branch_id=branch_id
			join agent on policy_agent_id=agent_id
			join sb_due on SB_Due_policy_number=policy_number
			where SB_Due_date between '".$start."' and '".$end."'
			order by name) as data1
			union
			select * from (SELECT 
			'Total' as name
			,count(policy_number) as client_family_acc_no
			,' ' as S_A
			,' ' as P_T_PPT
			,' ' as DOC
			,' ' as policy_number
			,' ' as mode_of_payment			
			,' ' as policy_last_due
			,' ' as policy_maturity_date
			,' ' as branch_code
			,' ' as agent_short_code
			,' ' as SB_Due_date
			,' ' as SB_due_amount
			,' ' as remark
			FROM policy
			join client on policy_client_id=client_id
			join branch	on policy_branch_id=branch_id
			join agent on policy_agent_id=agent_id
			join sb_due on SB_Due_policy_number=policy_number
			where SB_Due_date between '".$start."' and '".$end."') as data2")->result_array();
		echo  json_encode($data);
	}
	
	function report_policy_status_wise()
	{
		$policy_status = $_POST['status'];
		if($policy_status=='1' || $policy_status=='2' || $policy_status=='3' || $policy_status=='4'){
		$data = $this->db->query("select * from (SELECT 
			concat(TRIM(client_last_name),' ',TRIM(client_first_name),' ',TRIM(client_middle_name)) as name
			,case when policy_DOC='9999-12-31' then ' ' when policy_DOC='1970-01-01' then ' ' else DATE_FORMAT(policy_DOC, '%d/%m/%Y') end as DOC
			,policy_number
			,policy_sum_assurance as S_A
			,concat(policy_plan,'-',policy_term,'-',policy_PPT) as PTP
			,case when client_DOB='9999-12-31' then ' ' when client_DOB='1970-01-01' then ' ' else DATE_FORMAT(client_DOB, '%d/%m/%Y') end as DOB
			,case when policy_mode_of_payment ='1' then 'YLY' when policy_mode_of_payment='2' then 'HLY' when policy_mode_of_payment='3' then 'QLY' when policy_mode_of_payment='12' then 'MON' when policy_mode_of_payment='4' then 'SSS' when policy_mode_of_payment='5' then 'ONE' else 'NA' end as mode_of_payment
			,policy_premium
			,policy_status as mode_of_status
			,branch_code
			,agent_short_code
			,client_family_acc_no
			FROM policy
			join client on policy_client_id=client_id
			join branch	on policy_branch_id=branch_id
			join agent on policy_agent_id=agent_id
			where policy_status='".$policy_status."'
			order by name) as data1 
			union
			select * from (SELECT 
			'Total : ' as name
			,' 'as DOB
			,' ' as policy_number
			,sum(policy_sum_assurance)as S_A
			,' ' as PTP
			,' '  as DOC
			,' ' as mode_of_payment
			,sum(case when policy_mode_of_payment ='1' then policy_premium*1 when policy_mode_of_payment='2' then policy_premium*2 when policy_mode_of_payment='3' then policy_premium*4 when policy_mode_of_payment='12' then policy_premium*12 when policy_mode_of_payment='4' then policy_premium*1 when policy_mode_of_payment='5' then policy_premium*1 end) as policy_premium
			,' ' as mode_of_status
			,' ' as branch_code
			,' ' as agent_short_code
			,count(policy_number) as client_family_acc_no
			FROM policy
			join client on policy_client_id=client_id
			join branch	on policy_branch_id=branch_id
			join agent on policy_agent_id=agent_id
		where policy_status='".$policy_status."') as  data2")->result_array();
		}
		else
		{
			$data = $this->db->query("select * from (SELECT 
			concat(TRIM(client_last_name),' ',TRIM(client_first_name),' ',TRIM(client_middle_name)) as name
			,case when policy_DOC='9999-12-31' then ' ' when policy_DOC='1970-01-01' then ' ' else DATE_FORMAT(policy_DOC, '%d/%m/%Y') end as DOC
			,policy_number
			,policy_sum_assurance as S_A
			,concat(policy_plan,'-',policy_term,'-',policy_PPT) as PTP
			,case when 	policy_FU_premium='9999-12-31' then ' ' when 	policy_FU_premium='1970-01-01' then ' ' else DATE_FORMAT(	policy_FU_premium, '%d/%m/%Y') end as DOB
			,case when policy_mode_of_payment ='1' then 'YLY' when policy_mode_of_payment='2' then 'HLY' when policy_mode_of_payment='3' then 'QLY' when policy_mode_of_payment='12' then 'MON' when policy_mode_of_payment='4' then 'SSS' when policy_mode_of_payment='5' then 'ONE' else 'NA' end as mode_of_payment
			,policy_premium
			,policy_status as mode_of_status
			,branch_code
			,agent_short_code
			,client_family_acc_no
			FROM policy
			join client on policy_client_id=client_id
			join branch	on policy_branch_id=branch_id
			join agent on policy_agent_id=agent_id
			where policy_status='".$policy_status."'
			order by name) as data1 
			union
			select * from (SELECT 
			'Total : ' as name
			,' 'as DOB
			,' ' as policy_number
			,sum(policy_sum_assurance)as S_A
			,' ' as PTP
			,' '  as DOC
			,' ' as mode_of_payment
			,sum(case when policy_mode_of_payment ='1' then policy_premium*1 when policy_mode_of_payment='2' then policy_premium*2 when policy_mode_of_payment='3' then policy_premium*4 when policy_mode_of_payment='12' then policy_premium*12 when policy_mode_of_payment='4' then policy_premium*1 when policy_mode_of_payment='5' then policy_premium*1 end) as policy_premium
			,' ' as mode_of_status
			,' ' as branch_code
			,' ' as agent_short_code
			,count(policy_number) as client_family_acc_no
			FROM policy
			join client on policy_client_id=client_id
			join branch	on policy_branch_id=branch_id
			join agent on policy_agent_id=agent_id
		where policy_status='".$policy_status."') as  data2")->result_array();
		}
		echo  json_encode($data);
	}
	
	function report_doc_status_wise()
	{
		$doc_status = $_POST['doc_status'];
		$data = $this->db->query("select * from (SELECT 
			concat(TRIM(client_last_name),' ',TRIM(client_first_name),' ',TRIM(client_middle_name)) as name
			,case when policy_DOC='9999-12-31' then ' ' when policy_DOC='1970-01-01' then ' ' else DATE_FORMAT(policy_DOC, '%d/%m/%Y') end as DOC
			,policy_number
			,policy_sum_assurance as S_A
			,concat(policy_plan,'-',policy_term,'-',policy_PPT) as PTP
			,case when client_DOB='9999-12-31' then ' ' when client_DOB='1970-01-01' then ' ' else DATE_FORMAT(client_DOB, '%d/%m/%Y') end as DOB
			,case when policy_mode_of_payment ='1' then 'YLY' when policy_mode_of_payment='2' then 'HLY' when policy_mode_of_payment='3' then 'QLY' when policy_mode_of_payment='12' then 'MON' when policy_mode_of_payment='4' then 'SSS' when policy_mode_of_payment='5' then 'ONE' else 'NA' end as mode_of_payment
			,policy_premium
			,policy_status as mode_of_status
			,branch_code
			,agent_short_code
			,client_family_acc_no
			FROM policy
			join client on policy_client_id=client_id
			join branch	on policy_branch_id=branch_id
			join agent on policy_agent_id=agent_id
			where policy_original_policy='".$doc_status."'
			order by name) as data1 
			union
			select * from (SELECT 
			'Total : ' as name
			,' 'as DOB
			,' ' as policy_number
			,sum(policy_sum_assurance)as S_A
			,' ' as PTP
			,' '  as DOC
			,' ' as mode_of_payment
			,sum(case when policy_mode_of_payment ='1' then policy_premium*1 when policy_mode_of_payment='2' then policy_premium*2 when policy_mode_of_payment='3' then policy_premium*4 when policy_mode_of_payment='12' then policy_premium*12 when policy_mode_of_payment='4' then policy_premium*1 when policy_mode_of_payment='5' then policy_premium*1 end) as policy_premium
			,' ' as mode_of_status
			,' ' as branch_code
			,' ' as agent_short_code
			,count(policy_number) as client_family_acc_no
			FROM policy
			join client on policy_client_id=client_id
			join branch	on policy_branch_id=branch_id
			join agent on policy_agent_id=agent_id
			where policy_original_policy='".$doc_status."') as  data2")->result_array();
		echo  json_encode($data);
	}
	
	function report_branch_wise()
	{
		$data = $this->db->query("select * from (SELECT 
			concat(TRIM(client_last_name),' ',TRIM(client_first_name),' ',TRIM(client_middle_name)) as name
			,case when policy_DOC='9999-12-31' then ' ' when policy_DOC='1970-01-01' then ' ' else DATE_FORMAT(policy_DOC, '%d/%m/%Y') end as DOC
			,policy_number
			,policy_sum_assurance as S_A
			,concat(policy_plan,'-',policy_term,'-',policy_PPT) as PTP
			,case when client_DOB='9999-12-31' then ' ' when client_DOB='1970-01-01' then ' ' else DATE_FORMAT(client_DOB, '%d/%m/%Y') end as DOB
			,case when policy_mode_of_payment ='1' then 'YLY' when policy_mode_of_payment='2' then 'HLY' when policy_mode_of_payment='3' then 'QLY' when policy_mode_of_payment='12' then 'MON' when policy_mode_of_payment='4' then 'SSS' when policy_mode_of_payment='5' then 'ONE' else 'NA' end as mode_of_payment
			,policy_premium
			,policy_status as mode_of_status
			,branch_code
			,agent_short_code
			,client_family_acc_no
			FROM policy
			join client on policy_client_id=client_id
			join branch	on policy_branch_id=branch_id
			join agent on policy_agent_id=agent_id
			order by branch_code,name) as data1 
			union
			select * from (SELECT 
			'Total : ' as name
			,' 'as DOB
			,' ' as policy_number
			,sum(policy_sum_assurance)as S_A
			,' ' as PTP
			,' '  as DOC
			,' ' as mode_of_payment
			,sum(case when policy_mode_of_payment ='1' then policy_premium*1 when policy_mode_of_payment='2' then policy_premium*2 when policy_mode_of_payment='3' then policy_premium*4 when policy_mode_of_payment='12' then policy_premium*12 when policy_mode_of_payment='4' then policy_premium*1 when policy_mode_of_payment='5' then policy_premium*1 end) as policy_premium
			,' ' as mode_of_status
			,' ' as branch_code
			,' ' as agent_short_code
			,count(policy_number) as client_family_acc_no
			FROM policy
			join client on policy_client_id=client_id
			join branch	on policy_branch_id=branch_id
			join agent on policy_agent_id=agent_id) as  data2")->result_array();
		echo  json_encode($data);
	}
	
	function report_agent_wise()
	{
		$data = $this->db->query("select * from (SELECT 
			concat(TRIM(client_last_name),' ',TRIM(client_first_name),' ',TRIM(client_middle_name)) as name
			,case when policy_DOC='9999-12-31' then ' ' when policy_DOC='1970-01-01' then ' ' else DATE_FORMAT(policy_DOC, '%d/%m/%Y') end as DOC
			,policy_number
			,policy_sum_assurance as S_A
			,concat(policy_plan,'-',policy_term,'-',policy_PPT) as PTP
			,case when client_DOB='9999-12-31' then ' ' when client_DOB='1970-01-01' then ' ' else DATE_FORMAT(client_DOB, '%d/%m/%Y') end as DOB
			,case when policy_mode_of_payment ='1' then 'YLY' when policy_mode_of_payment='2' then 'HLY' when policy_mode_of_payment='3' then 'QLY' when policy_mode_of_payment='12' then 'MON' when policy_mode_of_payment='4' then 'SSS' when policy_mode_of_payment='5' then 'ONE' else 'NA' end as mode_of_payment
			,policy_premium
			,policy_status as mode_of_status
			,branch_code
			,agent_short_code
			,client_family_acc_no
			FROM policy
			join client on policy_client_id=client_id
			join branch	on policy_branch_id=branch_id
			join agent on policy_agent_id=agent_id
			order by agent_short_code,name) as data1 
			union
			select * from (SELECT 
			'Total : ' as name
			,' 'as DOB
			,' ' as policy_number
			,sum(policy_sum_assurance)as S_A
			,' ' as PTP
			,' '  as DOC
			,' ' as mode_of_payment
			,sum(case when policy_mode_of_payment ='1' then policy_premium*1 when policy_mode_of_payment='2' then policy_premium*2 when policy_mode_of_payment='3' then policy_premium*4 when policy_mode_of_payment='12' then policy_premium*12 when policy_mode_of_payment='4' then policy_premium*1 when policy_mode_of_payment='5' then policy_premium*1 end) as policy_premium
			,' ' as mode_of_status
			,' ' as branch_code
			,' ' as agent_short_code
			,count(policy_number) as client_family_acc_no
			FROM policy
			join client on policy_client_id=client_id
			join branch	on policy_branch_id=branch_id
			join agent on policy_agent_id=agent_id) as  data2")->result_array();
		echo  json_encode($data);
	}
	
	function report_with_no_nominee_wise()
	{
		$data = $this->db->query("select * from (SELECT 
			concat(TRIM(client_last_name),' ',TRIM(client_first_name),' ',TRIM(client_middle_name)) as name
			,case when policy_DOC='9999-12-31' then ' ' when policy_DOC='1970-01-01' then ' ' else DATE_FORMAT(policy_DOC, '%d/%m/%Y') end as DOC
			,policy_number
			,policy_sum_assurance as S_A
			,concat(policy_plan,'-',policy_term,'-',policy_PPT) as PTP
			,case when client_DOB='9999-12-31' then ' ' when client_DOB='1970-01-01' then ' ' else DATE_FORMAT(client_DOB, '%d/%m/%Y') end as DOB
			,case when policy_mode_of_payment ='1' then 'YLY' when policy_mode_of_payment='2' then 'HLY' when policy_mode_of_payment='3' then 'QLY' when policy_mode_of_payment='12' then 'MON' when policy_mode_of_payment='4' then 'SSS' when policy_mode_of_payment='5' then 'ONE' else 'NA' end as mode_of_payment
			,policy_premium
			,policy_status as mode_of_status
			,branch_code
			,agent_short_code
			,client_family_acc_no
			FROM policy
			join client on policy_client_id=client_id
			join branch	on policy_branch_id=branch_id
			join agent on policy_agent_id=agent_id
			where  policy_nominee_name IS NULL OR policy_nominee_name = ' '
			order by DATE_FORMAT(client_DOB, '%Y/%m/%d')) as data1 
			union
			select * from (SELECT 
			'Total : ' as name
			,' 'as DOB
			,' ' as policy_number
			,sum(policy_sum_assurance)as S_A
			,' ' as PTP
			,' '  as DOC
			,' ' as mode_of_payment
			,sum(case when policy_mode_of_payment ='1' then policy_premium*1 when policy_mode_of_payment='2' then policy_premium*2 when policy_mode_of_payment='3' then policy_premium*4 when policy_mode_of_payment='12' then policy_premium*12 when policy_mode_of_payment='4' then policy_premium*1 when policy_mode_of_payment='5' then policy_premium*1 end) as policy_premium
			,' ' as mode_of_status
			,' ' as branch_code
			,' ' as agent_short_code
			,count(policy_number) as client_family_acc_no
			FROM policy
			join client on policy_client_id=client_id
			join branch	on policy_branch_id=branch_id
			join agent on policy_agent_id=agent_id
			where  policy_nominee_name IS NULL OR policy_nominee_name = ' ') as  data2")->result_array();
		echo  json_encode($data);
	}
	
	function report_DOC_wise()
	{
		$data = $this->db->query("select name
,case when DOC='9999-12-31' then ' ' when DOC='1970-01-01' then ' ' else DATE_FORMAT(DOC, '%d/%m/%Y') end as DOC,policy_number,S_A,PTP,DOB,mode_of_payment,policy_premium,mode_of_status,branch_code,agent_short_code,client_family_acc_no	
from (SELECT 
case when policy_DOC='9999-12-31' then '9999' when policy_DOC='1970-01-01' then '9999' else DATE_FORMAT(policy_DOC, '%Y') end as DOC_year
,case when policy_DOC='9999-12-31' then '9999' when policy_DOC='1970-01-01' then '9999' else DATE_FORMAT(policy_DOC, '%Y') end as DOC_year_month
,concat(TRIM(client_last_name),' ',TRIM(client_first_name),' ',TRIM(client_middle_name)) as name
,policy_DOC as  DOC
,policy_number
,policy_sum_assurance as S_A
,concat(policy_plan,'-',policy_term,'-',policy_PPT) as PTP
,case when client_DOB='9999-12-31' then ' ' when client_DOB='1970-01-01' then ' ' else DATE_FORMAT(client_DOB, '%d/%m/%Y') end as DOB
,case when policy_mode_of_payment ='1' then 'YLY' when policy_mode_of_payment='2' then 'HLY' when policy_mode_of_payment='3' then 'QLY' when policy_mode_of_payment='12' then 'MON' when policy_mode_of_payment='4' then 'SSS' when policy_mode_of_payment='5' then 'ONE' else 'NA' end as mode_of_payment
,policy_premium
,policy_status as mode_of_status
,branch_code
,agent_short_code
,client_family_acc_no
FROM policy
join client on policy_client_id=client_id
join branch	on policy_branch_id=branch_id
join agent on policy_agent_id=agent_id
   union
select * from(SELECT 
case when policy_DOC='9999-12-31' then '9999' when policy_DOC='1970-01-01' then '9999' else DATE_FORMAT(policy_DOC, '%Y') end as DOC_year
,case when policy_DOC='9999-12-31' then '9999/12' when policy_DOC='1970-01-01' then '9999/12' else DATE_FORMAT(policy_DOC, '%Y/%m') end as DOC_year_month
,'-----   Sub-Total   -----' as name
,' ' as DOC
,' ' as policy_number
,sum(policy_sum_assurance)as S_A
,' ' as PTP
,' ' as DOB
,' ' as mode_of_payment
,sum(case when policy_mode_of_payment ='1' then policy_premium*1 when policy_mode_of_payment='2' then policy_premium*2 when policy_mode_of_payment='3' then policy_premium*4 when policy_mode_of_payment='12' then policy_premium*12 when policy_mode_of_payment='4' then policy_premium*1 when policy_mode_of_payment='5' then policy_premium*1 end) as policy_premium
,' ' as mode_of_status
,' ' as branch_code
,' ' as agent_short_code
,count(policy_number) as client_family_acc_no
FROM policy
join client on policy_client_id=client_id
join branch	on policy_branch_id=branch_id
join agent on policy_agent_id=agent_id
group by DOC_year) data order by DOC_year,DOC_year_month,DATE_FORMAT(DOC, '%Y/%m/%d'),name ) as data1 
			union all
			select * from (SELECT 
			'Total : ' as name
			,' '  as DOC
			,' ' as policy_number
			,sum(policy_sum_assurance)as S_A
			,' ' as PTP
			,' ' as DOB
			,' ' as mode_of_payment
			,sum(case when policy_mode_of_payment ='1' then policy_premium*1 when policy_mode_of_payment='2' then policy_premium*2 when policy_mode_of_payment='3' then policy_premium*4 when policy_mode_of_payment='12' then policy_premium*12 when policy_mode_of_payment='4' then policy_premium*1 when policy_mode_of_payment='5' then policy_premium*1 end) as policy_premium
			,' ' as mode_of_status
			,' ' as branch_code
			,' ' as agent_short_code
			,count(policy_number) as client_family_acc_no
			FROM policy
			join client on policy_client_id=client_id
			join branch	on policy_branch_id=branch_id
			join agent on policy_agent_id=agent_id) as  data2
			")->result_array();
		echo  json_encode($data);
	}
	
	function report_family_cash_flow_wise()
	{
		$acc_no = $_POST['acc_no'];	
		$data = $this->db->query("			select SB_Due_date_year,case when SB_Due_date = '9999/12/31' then ' ' else DATE_FORMAT(SB_Due_date, '%d/%m/%Y') end as SB_Due_date
			,SB_due_amount
			,SB_due_age
			,name
			,policy_number
			,S_A
			,P_T_PPT
			,DOC
			,policy_premium
			,blank
			,mode_of_payment
			from (select * from (select * from (SELECT 
			case when SB_Due_date is null then '9999' else  DATE_FORMAT(SB_Due_date, '%Y') end as SB_Due_date_year 
			,case when SB_Due_date='9999-12-31' then ' ' when SB_Due_date='1970-01-01' then ' ' when SB_Due_date is null then ' ' else  DATE_FORMAT(SB_Due_date, '%Y/%m/%d') end as SB_Due_date
			,SB_due_amount
			,SB_due_age
			,concat(client_last_name,' ',client_first_name,' ',client_middle_name) as name
			,policy_number
			,policy_sum_assurance as S_A
			,concat(policy_plan,'-',policy_term,'-',policy_PPT) as P_T_PPT
			,case when policy_DOC='9999-12-31' then ' ' when policy_DOC='1970-01-01' then ' ' else DATE_FORMAT(policy_DOC, '%d/%m/%Y') end as DOC
			,policy_premium
			,' ' as blank
			,case when policy_mode_of_payment ='1' then 'YLY' when policy_mode_of_payment='2' then 'HLY' when policy_mode_of_payment='3' then 'QLY' when policy_mode_of_payment='12' then 'MON' when policy_mode_of_payment='4' then 'SSS' when policy_mode_of_payment='5' then 'ONE' else 'NA' end as mode_of_payment			
			FROM policy
			join client on policy_client_id=client_id
			join sb_due on SB_Due_policy_number=policy_number
			where client_family_acc_no='".$acc_no."') as temp1
			union
			select * from (SELECT 
			case when SB_Due_date is null then '999912' else  concat(DATE_FORMAT(SB_Due_date, '%Y'),12) end as SB_Due_date_year 
			,'9999/12/31' as SB_Due_date
			,sum(SB_due_amount) as SB_due_amount
			,' 'as SB_due_age
			,'Total' as name
			,count(policy_number) as policy_number
			,' ' as S_A
			,' ' as P_T_PPT
			,' ' as DOC
			,' ' as policy_premium
			,' ' as blank
			,' ' as mode_of_payment			
			FROM policy
			join client on policy_client_id=client_id
			join sb_due on SB_Due_policy_number=policy_number
			where client_family_acc_no='".$acc_no."'
			group by SB_Due_date_year) as temp2) as temp3 order by SB_Due_date_year,DATE_FORMAT(SB_Due_date, '%Y/%m/%d')) as data1
			union
			select * from (SELECT 
			' ' as SB_Due_date_year
			,'-  Total  -' as SB_Due_date 
			,sum(SB_due_amount)
			,' ' as SB_due_age
			,' ' as name
			,' ' as policy_number
			,' ' as S_A
			,' ' as P_T_PPT
			,' ' as DOC
			,' ' as policy_premium
			,' ' as blank
			,' 'as mode_of_payment			
			FROM policy
			join client on policy_client_id=client_id
			join sb_due on SB_Due_policy_number=policy_number
			where client_family_acc_no='".$acc_no."') as data2
			
			")->result_array();
		echo  json_encode($data);
	}
	
	function report_medicle_history_wise()
	{
		$client_id = $_POST['client_id'];	
		$data = $this->db->query("select * from (SELECT 
			policy_number
			,case when policy_DOC='9999-12-31' then ' ' when policy_DOC='1970-01-01' then ' ' else DATE_FORMAT(policy_DOC, '%d/%m/%Y') end as DOC
			,case when policy_mode_of_payment ='1' then 'YLY' when policy_mode_of_payment='2' then 'HLY' when policy_mode_of_payment='3' then 'QLY' when policy_mode_of_payment='12' then 'MON' when policy_mode_of_payment='4' then 'SSS' when policy_mode_of_payment='5' then 'ONE' else 'NA' end as mode_of_payment			
			,policy_sum_assurance
			,policy_class
			,policy_doctor_name
			,case when policy_MES_date='9999-12-31' then ' ' when policy_MES_date='1970-01-01' then ' ' else DATE_FORMAT(policy_MES_date, '%d/%m/%Y') end as MED
			,policy_identification_mark
			,policy_height
			,policy_weight
			,policy_ABD
			,policy_chest
			,policy_teeth
			,policy_BP
			,policy_vaccin
			,policy_pulse
			,policy_spect
			,policy_spect_type
			,policy_spect_left
			,policy_spect_right
			,policy_spl_reports
			,policy_operation
			FROM policy
			join client on policy_client_id=client_id
			where client_id='".$client_id."'
			order by policy_number)as data1
			union
			select * from (SELECT 
			'Total' as policy_number
			,count(policy_number) as DOC
			,' ' as mode_of_payment			
			,' ' as policy_sum_assurance
			,' ' as policy_class
			,' ' as policy_doctor_name
			,' ' as MED
			,' ' as policy_identification_mark
			,' ' as policy_height
			,' ' as policy_weight
			,' ' as policy_ABD
			,' ' as policy_chest
			,' ' as policy_teeth
			,' ' as policy_BP
			,' ' as policy_vaccin
			,' ' as policy_pulse
			,' ' as policy_spect
			,' ' as policy_spect_type
			,' ' as policy_spect_left
			,' ' as policy_spect_right
			,' ' as policy_spl_reports
			,' ' as policy_operation
			FROM policy
			join client on policy_client_id=client_id
			where client_id='".$client_id."')as data2
			")->result_array();
		echo  json_encode($data);
	}

	function report_family_ac_wise_list()
	{
		$acc_no = $_POST['acc_no'];
		$data = $this->db->query("			select * from (select * from (
			select * from(SELECT 
			concat(TRIM(client_last_name),' ',TRIM(client_first_name),' ',TRIM(client_middle_name)) as initial_name
			,concat(TRIM(client_last_name),' ',TRIM(client_first_name),' ',TRIM(client_middle_name)) as name
			,case when client_DOB='9999-12-31' then ' ' when client_DOB='1970-01-01' then ' ' else DATE_FORMAT(client_DOB, '%d/%m/%Y') end as DOB
			,policy_sum_assurance as S_A
			,concat(policy_plan,'-',policy_term,'-',policy_PPT) as PTP
			,case when policy_DOC='9999-12-31' then ' ' when policy_DOC='1970-01-01' then ' ' else  DATE_FORMAT(policy_DOC, '%d/%m/%Y') end as DOC
			,policy_number
			,case when policy_mode_of_payment ='1' then 'YLY' when policy_mode_of_payment='2' then 'HLY' when policy_mode_of_payment='3' then 'QLY' when policy_mode_of_payment='12' then 'MON' when policy_mode_of_payment='4' then 'SSS' when policy_mode_of_payment='5' then 'ONE' else 'NA' end as mode_of_payment
			,policy_premium
			,case when policy_last_due='9999-12-31' then ' ' when policy_last_due='1970-01-01' then ' ' else DATE_FORMAT(policy_last_due, '%d/%m/%Y') end as last_due
			,case when policy_maturity_date='9999-12-31' then ' ' when policy_maturity_date='1970-01-01' then ' ' else DATE_FORMAT(policy_maturity_date, '%d/%m/%Y') end as maturity_date
			,policy_nominee_name
			,policy_nominee_relation
			,case when policy_FU_premium='9999-12-31' then ' ' when policy_FU_premium='1970-01-01' then ' ' else DATE_FORMAT(policy_FU_premium, '%d/%m/%Y') end as FUP
			,policy_NCO
			,policy_pension_amt
			,case when policy_pension_start_date='9999-12-31' then ' ' when policy_pension_start_date='1970-01-01' then ' ' else DATE_FORMAT(policy_pension_start_date, '%d/%m/%Y') end as pension_date
			,policy_loan_amt
			,branch_code
			FROM policy
			join client on policy_client_id=client_id
			join branch	on policy_branch_id=branch_id
			where client_family_acc_no=".$acc_no."	) data
			union
			select * from(SELECT 
			concat(TRIM(client_last_name),' ',TRIM(client_first_name),' ',TRIM(client_middle_name),'ZZZZ') as initial_name
			,'Total' as name
			,count(policy_number) as DOB
			,sum(policy_sum_assurance) as S_A
			,' ' as PTP
			,' ' as DOC
			,' ' as policy_number
			,' ' as mode_of_payment
			,' ' as policy_premium
			,' ' as last_due
			,' ' as maturity_date
			,' ' as policy_nominee_name
			,' ' as policy_nominee_relation
			,' ' as FUP
			,' ' as policy_NCO
			,' ' as policy_pension_amt
			,' ' as pension_date
			,' ' as policy_loan_amt
			,' ' as branch_code
			FROM policy
			join client on policy_client_id=client_id
			join branch	on policy_branch_id=branch_id
			where client_family_acc_no=".$acc_no."	
			group by initial_name) as dataa) as temp order by initial_name,policy_number )as data1
			union
			select * from (SELECT 
			' ' as initial_name
			,'Total' as name
			,count(policy_number) as DOB
			,sum(policy_sum_assurance) as S_A
			,' ' as PTP
			,' ' as DOC
			,' ' as policy_number
			,' ' as mode_of_payment
			,' ' as policy_premium
			,' ' as last_due
			,' ' as maturity_date
			,' ' as policy_nominee_name
			,' ' as policy_nominee_relation
			,' ' as FUP
			,' ' as policy_NCO
			,' ' as policy_pension_amt
			,' ' as pension_date
			,' ' as policy_loan_amt
			,' ' as branch_code
			FROM policy
			join client on policy_client_id=client_id
			join branch	on policy_branch_id=branch_id
			where client_family_acc_no=".$acc_no."
			order by name) as data2")->result_array();
		echo json_encode($data);
	}

	function report_client_cash_flow_wise()
	{
		$client_id = $_POST['client_id'];
		$data = $this->db->query("select * from (SELECT 
			case when SB_Due_date='9999-12-31' then ' ' when SB_Due_date='1970-01-01' then ' ' else  DATE_FORMAT(SB_Due_date, '%d/%m/%Y') end as SB_Due_date 
			,SB_due_amount
			,SB_due_age
			,concat(client_last_name,' ',client_first_name,' ',client_middle_name) as name
			,policy_number
			,policy_sum_assurance as S_A
			,concat(policy_plan,'-',policy_term,'-',policy_PPT) as P_T_PPT
			,case when policy_DOC='9999-12-31' then ' ' when policy_DOC='1970-01-01' then ' ' else  DATE_FORMAT(policy_DOC, '%d/%m/%Y') end as DOC
			,policy_premium
			,' ' as blank
			,case when policy_mode_of_payment ='1' then 'YLY' when policy_mode_of_payment='2' then 'HLY' when policy_mode_of_payment='3' then 'QLY' when policy_mode_of_payment='12' then 'MON' when policy_mode_of_payment='4' then 'SSS' when policy_mode_of_payment='5' then 'ONE' else 'NA' end as mode_of_payment			
			FROM policy
			join client on policy_client_id=client_id
			join sb_due on SB_Due_policy_number=policy_number
			where client_id='".$client_id."'
			order by DATE_FORMAT(SB_Due_date, '%Y/%m/%d')) as data1
			union
			select * from (SELECT 
			'Total : ' as SB_Due_date 
			,sum(SB_due_amount)
			,' ' as SB_due_age
			,' ' as name
			,' ' as policy_number
			,sum(policy_sum_assurance) as S_A
			,' ' as P_T_PPT
			,' ' as DOC
			,sum(policy_premium) as policy_premium
			,' ' as blank
			,' 'as mode_of_payment			
			FROM policy
			join client on policy_client_id=client_id
			join sb_due on SB_Due_policy_number=policy_number
			where client_id='".$client_id."') as data2")->result_array();
		echo json_encode($data);
	}

	function report_client_surname_wise()
	{
		$client_id = $_POST['client_id'];
		$data = $this->db->query("select * from (SELECT 
			concat(client_last_name,' ',client_first_name,' ',client_middle_name) as name
			,case when client_DOB='9999-12-31' then ' ' when client_DOB='1970-01-01' then ' ' else DATE_FORMAT(client_DOB, '%d/%m/%Y') end as DOB
			,policy_number
			,policy_sum_assurance as S_A
			,concat(policy_plan,'-',policy_term,'-',policy_PPT) as PTP
			,case when policy_DOC='9999-12-31' then ' ' when policy_DOC='1970-01-01' then ' ' else DATE_FORMAT(policy_DOC, '%d/%m/%Y')  end as DOC
			,case when policy_mode_of_payment ='1' then 'YLY' when policy_mode_of_payment='2' then 'HLY' when policy_mode_of_payment='3' then 'QLY' when policy_mode_of_payment='12' then 'MON' when policy_mode_of_payment='4' then 'SSS' when policy_mode_of_payment='5' then 'ONE' else 'NA' end as mode_of_payment
			,policy_premium
			,policy_status as mode_of_status
			,branch_code
			,agent_short_code
			,client_family_acc_no
			FROM policy
			join client on policy_client_id=client_id
			join branch	on policy_branch_id=branch_id
			join agent on policy_agent_id=agent_id
			where client_id='".$client_id."'
			order by name) as data1 
			union
			select * from (SELECT 
			'Total : ' as name
			,' 'as DOB
			,' ' as policy_number
			,sum(policy_sum_assurance)as S_A
			,' ' as PTP
			,' '  as DOC
			,' ' as mode_of_payment
			,sum(case when policy_mode_of_payment ='1' then policy_premium*1 when policy_mode_of_payment='2' then policy_premium*2 when policy_mode_of_payment='3' then policy_premium*4 when policy_mode_of_payment='12' then policy_premium*12 when policy_mode_of_payment='4' then policy_premium*1 when policy_mode_of_payment='5' then policy_premium*1 end) as policy_premium
			,' ' as mode_of_status
			,' ' as branch_code
			,' ' as agent_short_code
			,count(policy_number) as client_family_acc_no
			FROM policy
			join client on policy_client_id=client_id
			join branch	on policy_branch_id=branch_id
			join agent on policy_agent_id=agent_id
			where client_id='".$client_id."') as  data2")->result_array();
		echo json_encode($data);
	}

	function report_with_client_address_wise()
	{
		$data = $this->db->query("select * from (SELECT 
			concat(client_last_name,' ',client_first_name,' ',client_middle_name) as name
			,client_residential_address
			,client_office_address
			,client_area
			,client_pri_mobile_number
			,client_sec_mobile_number
			from client
			order by name) as data1
			union
			select * from (SELECT 
			'Total' as name
			,count(client_first_name) as client_residential_address
			,' ' as client_office_address
			,' ' as client_area
			,' ' as client_pri_mobile_number
			,' ' as client_sec_mobile_number
			from client
			)as data2")->result_array();
		echo json_encode($data);
	}

	function report_family_DOB_wise_report()
	{
		$acc_no = $_POST['acc_no'];
		$data = $this->db->query("select * from (SELECT 
			concat(client_last_name,' ',client_first_name,' ',client_middle_name) as name
			,case when client_DOB='9999-12-31' then ' ' when client_DOB='1970-01-01' then ' ' else  DATE_FORMAT(client_DOB, '%d/%m/%Y') end as DOB
			,case when client_DOA='9999-12-31' then ' ' when client_DOA='1970-01-01' then ' ' else  DATE_FORMAT(client_DOA, '%d/%m/%Y') end as DOA
			,client_blood_group
			from client
			where client_family_acc_no=".$acc_no."
			order by name) as data1
			union
			select * from (SELECT 
			'Total' as name
			,count(client_first_name) as DOB
			,' ' as DOA
			,' ' as client_blood_group
			from client
			where client_family_acc_no=".$acc_no."
			)as data2
			")->result_array();
		echo json_encode($data);
	}

	function report_family_loan_wise_report()
	{
		$acc_no = $_POST['acc_no'];
		$data = $this->db->query("select * from (select
			concat(client_last_name,' ',client_first_name,' ',client_middle_name) as name
			,policy_number
			,policy_sum_assurance as S_A
			,concat(policy_plan,'-',policy_term,'-',policy_PPT) as PTP
			,case when policy_DOC='9999-12-31' then ' ' when policy_DOC='1970-01-01' then ' ' else DATE_FORMAT(policy_DOC, '%d/%m/%Y') end as DOC
			,case when policy_mode_of_payment ='1' then 'YLY' when policy_mode_of_payment='2' then 'HLY' when policy_mode_of_payment='3' then 'QLY' when policy_mode_of_payment='12' then 'MON' when policy_mode_of_payment='4' then 'SSS' when policy_mode_of_payment='5' then 'ONE' else 'NA' end as mode_of_payment
			,policy_premium
			,case when policy_last_due='9999-12-31' then ' ' when policy_last_due='1970-01-01' then ' ' else DATE_FORMAT(policy_last_due, '%d/%m/%Y') end as due_date
			,policy_loan_amt
			,case when policy_maturity_date='9999-12-31' then ' ' when policy_maturity_date='1970-01-01' then ' ' else DATE_FORMAT(policy_maturity_date, '%d/%m/%Y') end as maturity_date 
			,' ' as remark 
			from policy
			join client on policy_client_id=client_id
			where client_family_acc_no=".$acc_no." and policy_loan_amt>0
			order by name) as data1
			union
			select * from (select
			'Total' as name
			,count(policy_number) as policy_number
			,' 'as S_A
			,' ' as PTP
			,' ' as DOC
			,' ' as mode_of_payment
			,' ' as policy_premium
			,' ' as due_date
			,' ' as policy_loan_amt
			,' ' as maturity_date 
			,' ' as remark 
			from policy
			join client on policy_client_id=client_id
			where client_family_acc_no=".$acc_no." and policy_loan_amt>0) as data2
			")->result_array();
		echo json_encode($data);
	}

	function report_family_pension_wise_report()
	{
		$acc_no = $_POST['acc_no'];
		$data = $this->db->query("select * from (select
			concat(client_last_name,' ',client_first_name,' ',client_middle_name) as name
			,policy_number
			,policy_sum_assurance as S_A
			,concat(policy_plan,'-',policy_term,'-',policy_PPT) as PTP
			,case when policy_DOC='9999-12-31' then ' ' when policy_DOC='1970-01-01' then ' ' else DATE_FORMAT(policy_DOC, '%d/%m/%Y') end as DOC
			,case when policy_mode_of_payment ='1' then 'YLY' when policy_mode_of_payment='2' then 'HLY' when policy_mode_of_payment='3' then 'QLY' when policy_mode_of_payment='12' then 'MON' when policy_mode_of_payment='4' then 'SSS' when policy_mode_of_payment='5' then 'ONE' else 'NA' end as mode_of_payment
			,policy_premium
			,case when policy_last_due='9999-12-31' then ' ' when policy_last_due='1970-01-01' then ' ' else DATE_FORMAT(policy_last_due, '%d/%m/%Y') end as due_date
			,policy_NCO
			,case when policy_pension_mode ='1' then 'YLY' when policy_pension_mode='2' then 'HLY' when policy_pension_mode='3' then 'QLY' when policy_pension_mode='12' then 'MON' else 'NA' end as mode_of_pension
			,policy_pension_amt
			,case when policy_pension_start_date='9999-12-31' then ' ' when policy_pension_start_date='1970-01-01' then ' ' else DATE_FORMAT(policy_pension_start_date, '%d/%m/%Y') end as pension_start_date 
			from policy
			join client on policy_client_id=client_id
			where client_family_acc_no=".$acc_no." and policy_pension_amt>0
			order by name) as data1
			union
			select * from (select
			'Total' as name
			,count(policy_number) as policy_number
			,' 'as S_A
			,' ' as PTP
			,' ' as DOC
			,' ' as mode_of_payment
			,' ' as policy_premium
			,' ' as due_date
			,' ' as policy_NCO
			,' ' as mode_of_pension 
			,' ' as policy_pension_amt
			,' ' as pension_start_date
			from policy
			join client on policy_client_id=client_id
			where client_family_acc_no=".$acc_no." and policy_pension_amt>0) as data2
			")->result_array();
		echo json_encode($data);
	}

	function report_family_ac_office_wise_report()
	{
		$acc_no = $_POST['acc_no'];
		$data = $this->db->query("select * from (SELECT 
			concat(client_last_name,' ',client_first_name) as name
			,case when client_DOB='9999-12-31' then ' ' when client_DOB='1970-01-01' then ' ' else DATE_FORMAT(client_DOB, '%d/%m/%Y') end as DOB
			,policy_sum_assurance as S_A
			,concat(policy_plan,'-',policy_term,'-',policy_PPT) as PTP
			,case when policy_DOC='9999-12-31' then ' ' when policy_DOC='1970-01-01' then ' ' else DATE_FORMAT(policy_DOC, '%d/%m/%Y') end  as DOC
			,policy_number
			,case when policy_mode_of_payment='1' then 'YLY' when policy_mode_of_payment='2' then 'HLY' when policy_mode_of_payment='3' then 'QLY' when policy_mode_of_payment='12' then 'MON' when policy_mode_of_payment='4' then 'SSS' when policy_mode_of_payment='5' then 'ONE' else 'NA' end as mode_of_payment
			,policy_premium
			,case when policy_last_due='9999-12-31' then ' ' when policy_last_due='1970-01-01' then ' ' else DATE_FORMAT(policy_last_due, '%d/%m/%Y') end  as last_due
			,case when policy_maturity_date='9999-12-31' then ' ' when policy_maturity_date='1970-01-01' then ' ' else DATE_FORMAT(policy_maturity_date, '%d/%m/%Y') end  as maturity_date
			,policy_nominee_name
			,policy_class
			,case when policy_FU_premium='9999-12-31' then ' ' when policy_FU_premium='1970-01-01' then ' ' else DATE_FORMAT(policy_FU_premium, '%d/%m/%Y') end  as FUP
			,case when 	policy_original_policy='1' then 'P' when 	policy_original_policy='2' then 'L' when 	policy_original_policy='0' then 'A' end as doc_status	
			,branch_code
			,agent_short_code
			,policy_status
			FROM policy
			join client on policy_client_id=client_id
			join branch	on policy_branch_id=branch_id
			join agent on policy_agent_id=agent_id
			where client_family_acc_no=".$acc_no."
			order by name) as data1
			union
			select * from (SELECT 
			'Total' as name
			,count(policy_number) as DOB
			,' ' as S_A
			,' ' as PTP
			,' ' as DOC
			,' ' as policy_number
			,' ' as mode_of_payment
			,' ' as policy_premium
			,' ' as last_due
			,' ' as maturity_date
			,' ' as policy_nominee_name
			,' ' as policy_class
			,' ' as FUP
			,' ' as doc_status
			,' ' as branch_code
			,' ' as agent_short_code
			,' ' as policy_status
			FROM policy
			join client on policy_client_id=client_id
			join branch	on policy_branch_id=branch_id
			join agent on policy_agent_id=agent_id
			where client_family_acc_no=".$acc_no."
			order by name) as data2")->result_array();
		echo json_encode($data);
	}

	function client_details_for_medical_report()
	{
		$client_id = $_POST['client_id'];
		$data = $this->db->query("select concat(client_last_name,' ',client_first_name,' ',client_middle_name) as name from client where client_id = ".$client_id."")->result_array();
		echo json_encode($data);
	}


//================================= Comission Report Controller ============================================

	public function comission_report_details()
	{
		$data['flash']['active'] = $this->session->flashdata('active');
    	$data['flash']['title'] = $this->session->flashdata('title');
    	$data['flash']['text'] = $this->session->flashdata('text');
    	$data['flash']['type'] = $this->session->flashdata('type');

		// $data['comission_details'] = $this->Admin_model->get_comission_details();
		$data['client_details'] = $this->Admin_model->get_client_details();
		// $data['policy_number'] = $this->Admin_model->get_policy_number();
		$data['acc'] = $this->Admin_model->get_data('family');
		$data['agent'] = $this->Admin_model->get_data('agent');

		$agent['LIC'] = 'comi_report';
		$this->load->view('Admin/header');
		$this->load->view('Report/comission_report',$data);
		$this->load->view('Report/comission_report_footer',$agent);
	}

	function comission_report_policy_number_wise()
	{
		$data = $this->db->query("select * from (SELECT 
			concat(client_last_name,' ',client_first_name,' ',client_middle_name) as name
			,client_family_acc_no
			,case when comission_date='9999-12-31' then ' ' when comission_date='1970-01-01' then ' ' else DATE_FORMAT(comission_date, '%d-%m-%Y') end as CD
			,case when comission_due_date='9999-12-31' then ' ' when comission_due_date='1970-01-01' then ' ' else DATE_FORMAT(comission_due_date, '%d-%m-%Y') end as CDD
			,comission_policy_number
			,case when comission_mode_of_payment ='1' then 'YLY' when comission_mode_of_payment='2' then 'HLY' when comission_mode_of_payment='3' then 'QLY' when comission_mode_of_payment='12' then 'MON' when comission_mode_of_payment='4' then 'SSS' when comission_mode_of_payment='5' then 'ONE' else 'NA' end as mode_of_payment			
			,comission_premium
			,agent_short_code
			,comission_percentage
			,comission_amount
			FROM comission
			join client on comission_client_id=client_id
			join agent on comission_agent_id=agent_id
			order by comission_policy_number) as data
			union
			select 
			' ' as name
			,' ' as client_family_acc_no
			,' ' as CD
			,' ' as CDD
			,'Total Amt.' as comission_policy_number
			,' ' as mode_of_payment
			,' ' as comission_premium
			,' ' as agent_short_code
			,' ' as comission_percentage
			,ROUND(sum(comission_amount),3) as comission_amount
			from comission
			join client on comission_client_id=client_id
			join agent on comission_agent_id=agent_id
			order by comission_policy_number")->result_array();
		echo json_encode($data);
	}

	function comission_report_surname_wise()
	{
		$data = $this->db->query("SELECT 
			concat(client_last_name,' ',client_first_name,' ',client_middle_name) as name
			,client_family_acc_no
			,case when comission_date='9999-12-31' then ' ' when comission_date='1970-01-01' then ' ' else DATE_FORMAT(comission_date, '%d-%m-%Y') end as CD
			,case when comission_due_date='9999-12-31' then ' ' when comission_due_date='1970-01-01' then ' ' else DATE_FORMAT(comission_due_date, '%d-%m-%Y') end as CDD
			,comission_policy_number
			,case when comission_mode_of_payment ='1' then 'YLY' when comission_mode_of_payment='2' then 'HLY' when comission_mode_of_payment='3' then 'QLY' when comission_mode_of_payment='12' then 'MON' when comission_mode_of_payment='4' then 'SSS' when comission_mode_of_payment='5' then 'ONE' else 'NA' end as mode_of_payment			
			,comission_premium
			,agent_short_code
			,comission_percentage
			,comission_amount
			FROM comission
			join client on comission_client_id=client_id
			join agent on comission_agent_id=agent_id
			order by client_last_name")->result_array();
		echo json_encode($data);
	}

	function month_wise_agent_report()
	{
		$month = $_POST['month'];
		$month_first_date=date('Y-m-01', strtotime($month));
		$month_last_date=date('Y-m-t', strtotime($month));
		$data = $this->db->query("select * from (select 
			case when comission_date='9999-12-31' then ' ' when comission_date='1970-01-01' then ' ' else DATE_FORMAT(comission_date, '%d/%m/%Y') end as c_date
			,agent_short_code
			,comission_policy_number
			,comission_premium 
			,case when comission_due_date='9999-12-31' then ' ' when comission_due_date='1970-01-01' then ' ' else DATE_FORMAT(comission_due_date, '%d/%m/%Y') end as due_date
			,comission_percentage
			,ROUND(comission_amount,3) as amount
			,case when comission_mode_of_payment ='1' then 'YLY' when comission_mode_of_payment='2' then 'HLY' when comission_mode_of_payment='3' then 'QLY' when comission_mode_of_payment='12' then 'MON' when comission_mode_of_payment='4' then 'SSS' when comission_mode_of_payment='5' then 'ONE' else 'NA' end as mode_of_payment
			from comission
			join agent on comission_agent_id=agent_id
			where comission_date between '".$month_first_date."' and '".$month_last_date."'
			order by comission_policy_number) as data
			union
			select 
			' ' as c_date
			,' ' as agent_short_code
			,'Total Amt.' as comission_policy_number
			,' ' as comission_premium
			,' ' as due_date
			,' ' as comission_percentage
			,ROUND(sum(comission_amount),3) as amount
			,' ' as mode_of_payment
			from comission
			join agent on comission_agent_id=agent_id
			where comission_date between '".$month_first_date."' and '".$month_last_date."'")->result_array();
		echo json_encode($data);
	}

	function month_wise_pre_agent_report()
	{
		$agent_code = $_POST['agent_code'];
		$month = $_POST['month'];
		$month_first_date=date('Y-m-01', strtotime($month));
		$month_last_date=date('Y-m-t', strtotime($month));
		$data = $this->db->query("select * from (select 
			case when comission_date='9999-12-31' then ' ' when comission_date='1970-01-01' then ' ' else DATE_FORMAT(comission_date, '%d/%m/%Y') end as c_date
			,agent_short_code
			,comission_policy_number
			,comission_premium 
			,case when comission_due_date='9999-12-31' then ' ' when comission_due_date='1970-01-01' then ' ' else DATE_FORMAT(comission_due_date, '%d/%m/%Y') end as due_date
			,comission_percentage
			,ROUND(comission_amount,3) as amount
			,case when comission_mode_of_payment ='1' then 'YLY' when comission_mode_of_payment='2' then 'HLY' when comission_mode_of_payment='3' then 'QLY' when comission_mode_of_payment='12' then 'MON' when comission_mode_of_payment='4' then 'SSS' when comission_mode_of_payment='5' then 'ONE' else 'NA' end as mode_of_payment
			from comission
			join agent on comission_agent_id=agent_id
			where comission_agent_id = ".$agent_code." and comission_date between '".$month_first_date."' and '".$month_last_date."'
			order by comission_policy_number) as data
			union
			select 
			' ' as c_date
			,' ' as agent_short_code
			,'Total Amt.' as comission_policy_number
			,' ' as comission_premium
			,' ' as due_date
			,' ' as comission_percentage
			,ROUND(sum(comission_amount),3) as amount
			,' ' as mode_of_payment
			from comission
			join agent on comission_agent_id=agent_id
			where comission_agent_id = ".$agent_code." and comission_date between '".$month_first_date."' and '".$month_last_date."'")->result_array();
		echo json_encode($data);
	}
	
}
