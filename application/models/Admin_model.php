<?php 

	/**
	* 
	*/	
	class Admin_model extends CI_model	{

		public function add_new($tablename,$data)
		{
			return $this->db->insert($tablename,$data);
		}

		function add_new_client($data)
		{
			$data = $this->db->insert('client',$data);
			return $this->db->query("select client_id from client order by client_id DESC limit 1")->result_array();
		}
		public function get_data($tablename)
		{
			return $this->db->get($tablename)->result_array();
		}

		function edit_branch($data)
		{
			return $this->db->set($data)->where('branch_id',$data['branch_id'])->update('branch',$data);
		}

		function delete_branch($data)
		{
			return $this->db->where('branch_id',$data['branch_id'])->delete('branch');
		}

		function edit_agent($data)
		{
			return $this->db->set($data)->where('agent_id',$data['agent_id'])->update('agent',$data);
		}

		function delete_agent($data)
		{
			return $this->db->where('agent_id',$data['agent_id'])->delete('agent');
		}

		function edit_client($data)
		{
			return $this->db->set($data)->where('client_id',$data['client_id'])->update('client',$data);
		}

		function delete_client($data)
		{
			// print_r($data);die();
			return $this->db->query("DELETE from client where client_id = ".$data['client_id']."");
			return $this->db->query("DELETE from document where doc_client_id = ".$data['client_id']."");
		}

		public function add_policy_details($data)
		{
			$this->db->insert('policy',$data);
		}
		public function get_client_details()
		{
			return $this->db->query('SELECT client_id,client_prefix,client_first_name,client_middle_name,client_last_name FROM `client`')->result_array();
		}
		public function get_branch_details()
		{
			return $this->db->query('SELECT * FROM `branch`')->result_array();
		}
		public function get_agent_details()
		{
			return $this->db->query('SELECT * FROM `agent` group by agent_short_code')->result_array();
		}
		public function policy_details()
		{
			return $this->db->query('SELECT * FROM policy left JOIN client ON policy_client_id = client_id')->result_array();
		}

		public function update_policy_details($policy_no)
		{
			return $this->db->query("SELECT  * from policy left join client on client_id = policy_client_id join agent on agent_id = policy_agent_id join branch on branch_id = policy_branch_id where policy_id =".$policy_no."")->result_array();
		}

		function policy_update($data)
		{
			return $this->db->set($data)->where('policy_id',$data['policy_id'])->update('policy',$data);
		}

		function delete_policy($data)
		{
			$this->db->where('policy_number',$data['policy_number'])->delete('policy');
			$this->db->where('PP_policy_id',$data['policy_number'])->delete('privious_policy');
			$this->db->where('SB_Due_policy_number',$data['policy_number'])->delete('sb_due');
			return;
		}

		function get_comission_details()
		{
			return $this->db->query("SELECT *,case when comission_date='9999-12-31' then ' ' when comission_date='1970-01-01' then ' ' else DATE_FORMAT(comission_date, '%d-%m-%Y') end as com_date FROM `comission` join client on comission_client_id = client_id join agent on agent_id = comission_agent_id")->result_array();
		}

		function edit_comission($data)
		{
			return $this->db->set($data)->where('comission_id',$data['comission_id'])->update('comission',$data);
		}

		function delete_comission($data)
		{
			return $this->db->where('comission_id',$data['comission_id'])->delete('comission');
		}

		function get_SB_due_details()
		{
			return $this->db->get('sb_due')->result_array();
		}

		function fetch_client_details_wise_id($client_id)
		{
			return $this->db->query("SELECT client.*,case when client_DOB='9999-12-31' then ' ' when client_DOB='1970-01-01' then ' ' else DATE_FORMAT(client_DOB, '%d-%m-%Y') end as DOB_date,case when client_DOA='9999-12-31' then ' ' when client_DOA='1970-01-01' then ' ' else DATE_FORMAT(client_DOA, '%d-%m-%Y') end as DOA_date from client where client_id = ".$client_id."")->result();
		}

		function fetch_policy_details_wise_id($policy_no)
		{
			return $this->db->query("SELECT * from policy join client on policy_client_id = client_id join agent on policy_agent_id = agent_short_code where policy_number = ".$policy_no."")->result_array();
		}

		function get_policy_number(){
			return $this->db->query("SELECT policy_number from policy")->result_array();
		}
		public function get_family_details()
		{
			return $this->db->query('SELECT * FROM `family`')->result_array();
		}
		function delete_family_details($data)
		{
			$this->db->where('family_id',$data['family_id'])->delete('family');
		}
		function edit_family($data)
		{
			return $this->db->set($data)->where('family_id',$data['family_id'])->update('family',$data);
		}
		function edit_policy($data)
		{
			return $this->db->set($data)->where('policy_id',$data['policy_id'])->update('policy',$data);
		}

	}
?>