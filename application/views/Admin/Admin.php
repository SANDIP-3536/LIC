<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	function __construct() {
        parent::__construct();
        // $data = $this->session->userdata('super_admin');
    }

	public function index()
	{
		$this->load->view('Admin/header');
		$this->load->view('Admin/dash');
		$this->load->view('Admin/footer');
	}
// ====================================================================================

	public function branch_details()
	{
		$data['branch'] = $this->Admin_model->get_data('branch');
		$this->load->view('Admin/header');
		$this->load->view('Branch/branch_details',$data);
		$this->load->view('Admin/footer');
	}

	public function add_branch()
	{
		$this->load->view('Admin/header');
		$this->load->view('Branch/dash');
		$this->load->view('Admin/footer');
	}

	public function add_new_branch()
	{
		$data['branch_name']=$this->input->post('branch_name');
		$data['branch_code']=$this->input->post('branch_code');
		$this->Admin_model->add_new('branch',$data);
		
		redirect('Admin/branch_details');
	}

	function edit_branch()
	{
		$data['branch_id']=$this->input->post('branch_id');
		$data['branch_name']=$this->input->post('branch_name');
		$data['branch_code']=$this->input->post('branch_code');

		$this->Admin_model->edit_branch($data);
		redirect('Admin/branch_details');
	}

	function delete_branch()
	{
		$data['branch_id']=$this->input->post('branch_id');

		$this->Admin_model->delete_branch($data);
		redirect('Admin/branch_details');
	}


// ====================================================================================

	public function agent_details()
	{
		$data['agent'] = $this->Admin_model->get_data('agent');

		$this->load->view('Admin/header');
		$this->load->view('Agent/agent_details',$data);
		$this->load->view('Admin/footer');
	}

	public function add_agent()
	{
		$this->load->view('Admin/header');
		$this->load->view('Agent/dash');
		$this->load->view('Admin/footer');
	}

	public function add_new_agent()
	{
		$data['agent_name']=$this->input->post('agent_name');
		$data['agent_code']=$this->input->post('agent_code');
		
		$this->Admin_model->add_new('agent',$data);
		
		redirect('Admin/agent_details');
	}

	function edit_agent()
	{
		$data['agent_id']=$this->input->post('agent_id');
		$data['agent_name']=$this->input->post('agent_name');
		$data['agent_code']=$this->input->post('agent_code');

		$this->Admin_model->edit_agent($data);
		redirect('Admin/agent_details');
	}

	function delete_agent()
	{
		$data['agent_id']=$this->input->post('agent_id');

		$this->Admin_model->delete_agent($data);
		redirect('Admin/agent_details');
	}

// ====================================================================================

	public function client_details()
	{
		$data['branch'] = $this->Admin_model->get_data('client');

		$this->load->view('Admin/header');
		$this->load->view('Client/client_details',$data);
		$this->load->view('Admin/footer');
	}

	public function add_client()
	{
		$this->load->view('Admin/header');
		$this->load->view('Client/dash');
		$this->load->view('Admin/footer');
	}

	public function add_new_client()
	{
		$client['client_prefix'] = $this->input->post('client_prefix');
		$client['client_first_name'] = $this->input->post('client_first_name');
		$client['client_middle_name'] = $this->input->post('client_middle_name');
		$client['client_address'] = $this->input->post('client_address');
		$client['client_area'] = $this->input->post('client_area');
		$client['client_PAN'] = $this->input->post('client_PAN');
		$client['client_aadhar'] = $this->input->post('client_aadhar');
		$client['client_DOB'] = $this->input->post('client_DOB');
		$client['client_birth_place'] = $this->input->post('client_birth_place');
		$client['client_DOA'] = $this->input->post('client_DOA');
		$client['client_maiden_last_name'] = $this->input->post('client_maiden_last_name');
		$client['client_maiden_first_name'] = $this->input->post('client_maiden_first_name');
		$client['client_maiden_middle_name'] = $this->input->post('client_maiden_middle_name');
		$client['client_gender'] = $this->input->post('client_gender');
		$client['client_blood_group'] = $this->input->post('client_blood_group');
		$client['client_family_acc_no'] = $this->input->post('client_family_acc_no');
		$client['client_father_last_name'] = $this->input->post('client_father_name');
		$client['client_mobile'] = $this->input->post('client_mobile');
		$client['client_phone'] = $this->input->post('client_phone');
		$client['client_email_id'] = $this->input->post('client_email_id');
		// print_r($client);die();
		$data = $this->db->insert('client',$client);
		redirect('Admin/client_details');
	}
// ====================================================================================
	public function policy_details()
	{
		$this->load->view('Admin/header');
		$this->load->view('Policy/policy_details');
		$this->load->view('Admin/footer');
	}

	public function comission_details()
	{
		$this->load->view('Admin/header');
		$this->load->view('Comission/dash');
		$this->load->view('Admin/footer');
	}

	public function report_details()
	{
		$this->load->view('Admin/header');
		$this->load->view('Report/dash');
		$this->load->view('Admin/footer');
	}

	
}
