<?php
	class Authentication_model extends CI_model	{

		public function login($data)
		{
			
			$login = $this->db->where('user_username',$data['credential_username'])->where('user_password',$data['credential_password'])->get('user')->result_array();
			
			
			if(empty($login)){
				return 1;
			}	
			else{	
				// print_r($login);die();
				$data1['user_id'] = $login[0]['user_id'];
				$data1['user_username'] = $login[0]['user_username'];
				$data1['user_first_name'] = $login[0]['user_first_name'];
				$data1['iser_middle_name'] = $login[0]['iser_middle_name'];
				$data1['user_last_name'] = $login[0]['user_last_name'];
				$data1['user_mobile_name'] = $login[0]['user_mobile_name'];

				$this->session->set_userdata('super_admin',$data1);
				// print_r($data1);die();
				redirect('admin');	
			}

		}

		public function admin_registration($data)
		{
			$this->db->insert('users',$data);
		}

		public function user_check($data)
		{
			$user_cnt = $this->db->query('SELECT * FROM `credential` WHERE credential_username = "'.$data['credential_username'].'"')->result_array();
			if($user_cnt[0]['credential_user_type'] != 7 ){
				$acc_type = $this->db->query('SELECT * FROM `employee` WHERE employee_profile_id = "'.$user_cnt[0]['credential_profile_id'].'"')->result_array();
				if($acc_type[0]['employee_expiry_date'] != '9999-12-31'){
					return 5;
				}
				$user_details['email_id'] = $acc_type[0]['employee_email_id'];
				$user_details['mobile_number'] = $acc_type[0]['employee_pri_mobile_number'];
				return $user_details;	
			}
			if($user_cnt[0]['credential_user_type'] == 7 ){
				$acc_type7 = $this->db->query('SELECT * FROM `parent` WHERE parent_profile_id = "'.$user_cnt[0]['credential_profile_id'].'"')->result_array();
					if($acc_type7[0]['parent_expiry_date'] != '9999-12-31'){
						return 5;
					}
					$user_details['email_id'] = $acc_type7[0]['parent_email_id'];
					$user_details['mobile_number'] = $acc_type7[0]['parent_mobile_number'];
					return $user_details;
				}
			return 5;
		}

		public function update($data1)					
		{
			$this->db->set($data1)->where('credential_username', $data1['credential_username'])->update("credential", $data1);	
		}

		public function otp_check($data)
		{
			$otp_check = $this->db->where('credential_username', $data['credential_username'])->where('otp', $data['otp'])->get('credential')->num_rows();
			if($otp_check == 0){
				return 6;
			}
		}

		public function update_pass($data1)					
		{
			$this->db->set($data1)->where('credential_username', $data1['credential_username'])->update("credential", $data1);
		}
		
		function sms($no,$msg)
		{
		    $no = "91".$no;
		    $ch=curl_init();
		    $message = $msg;
		    $message = urlencode($message);
			curl_setopt($ch,CURLOPT_URL,"http://smsapi.24x7sms.com/api_2.0/SendSMS.aspx?APIKEY=28QHnbg118a&MobileNo=".$no."&SenderID=SYNTEC&Message=".$message."&ServiceName=TEMPLATE_BASED");
		    curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
		    $output =curl_exec($ch);
		    curl_close($ch);

		    return true;
		}

	}
?>