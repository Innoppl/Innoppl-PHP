<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/** 
 * 
 * @version	0.1
 * @package User
 * @description User Management
 * @Author	Surendar M
 * @Organization Innoppl Inc.
 * @link http://www.innoppl.com/
 */
class Assign extends CI_Controller {

	public function index($id = null)
	{
		
		//Loading Models
		$this->load->model('user');
		$this->load->model('hospital');
		
		$user_role = $this->session->userdata('role');
		$user_id = $id;
		
		if (($this->input->server('REQUEST_METHOD') == 'POST')):
			
			//No action to be carried - Buffered for future.
			//$this->user->add_user($this->input->post());
		
		elseif($user_role == "Super Admin"):
			
			// Executed on Admin login
			if(is_numeric($user_id)):
				$validity_chk = $this->user->get_user_checked($user_id);
			else:
				redirect(base_url().'user/lists','refresh');
			endif;
			
			// Fetches value from session
			// Creating Array dataset for View end
			$data['first_name'] = ucfirst($this->session->userdata('first_name'));
			$data['last_name'] = ucfirst($this->session->userdata('last_name'));
			$data['role'] = ucfirst($this->session->userdata('role'));
			$data['dashboard_uid'] = $user_id;
			
			//Default Views Call Block
			$this->load->view('includes/header',$data);
			$this->load->view('includes/sidebar');
			
			if($validity_chk):
				
				// To find User role
				$gvn_usr_role = $this->user->find_role($user_id);
				
				switch ($gvn_usr_role) {
					
					case 'Administrator':
						
						// Calling Model Functions
						$hospital_id = $this->hospital->get_admin_hospitals_ids($user_id);
						$all_hospitals_id = $this->hospital->get_all_hospitals_ids();
						$diff_hospitals = array_diff($all_hospitals_id,$hospital_id);
						
						// Creating Array dataset for View end
						$data['user_hospitals'] = $this->hospital->get_admin_hospitals($hospital_id);
						$data['other_hospitals'] = $this->hospital->get_admin_hospitals($diff_hospitals);
						
						// Loads view file - user/assign
						$this->load->view('user/assign',$data);
						
						break;
						
					// Executed for non-admin role users
					case 'Medical Director':
					case 'Hospital Admin':
					case 'Doctor':
						
						// Calling Model Functions
						$data['dashboard_uid'] = $user_id;
						$data['user_hospital_id'] = $this->hospital->get_user_hospitals_id($user_id);
						$user_hospital_details = $this->hospital->get_hospital_basedetail($data['user_hospital_id']);
						
						// Creating Array dataset for View end
						$data['user_hospital_name'] = $user_hospital_details['name'];
						$data['all_hospitals'] = $this->hospital->get_all_hospitals_userassign();
						
						// Loads view file - user/assign_user
						$this->load->view('user/assign_user',$data);
						
						break;
					
					default:
						break;
						
				}
			
			endif;
			
			//Call to Footer View
			$this->load->view('includes/footer');
		
		else:
			
			// Executed for non-admin role users
			redirect(base_url().'user/dashboard','refresh');
		
		endif;
	}
	
	// Remapping Function Call permitting override behaviour
	public function _remap($id)
	{
		if($id == 'user'):
		
			//Loading Models
			$this->load->model('hospital');
			
			// Handles the Post data
			$dashboard_uid = $this->input->post('dashboard_uid');
			$hid = $this->input->post('hospital_id');
			
			$verify_existence = $this->hospital->assigned_user_check($dashboard_uid);
			
			// Existence of Hospital is checked
			if($verify_existence > 0):
				$this->hospital->update_user_hospital_id($hid, $dashboard_uid);
				
			else:
				$this->hospital->insert_user_hospital_id($hid, $dashboard_uid);
			
			endif;
			
			redirect(base_url().'user/lists', 'refresh');
			
		elseif (($this->input->server('REQUEST_METHOD') == 'POST')):
			
			//Loading Models
			$this->load->model('user');
			$this->load->model('hospital');
			
			// Handles the Post data
			$dashboard_uid = $this->input->post('dashboard_uid');
			
			// Calling Model Functions
			$current_hid = $this->hospital->get_admin_hospitals_ids($dashboard_uid);
			$returned_hid = $this->input->post('target');
			
			$temp = array();
			
			if(is_array($returned_hid)):
			
				foreach($returned_hid as $row){
					$temp[] = (int)$row;
				}

			endif;
			
			$returned_hid = $temp;
			$removed_arr = array_diff($current_hid, $returned_hid);
			
			if(count($removed_arr)>0):
				
				foreach($removed_arr as $row)
				{
					$unassign = 0;
					$this->hospital->update_hospital_id($row, $unassign);
				}
				
			endif;
			
			$added_arr = array_diff($returned_hid, $current_hid);
			
			if(count($added_arr)>0):
				
				foreach($added_arr as $row)
				{
					
					$verify_existence = $this->hospital->assigned_check($row);
					
					if($verify_existence > 0):
						$this->hospital->update_hospital_id($row, $dashboard_uid);
					else:
						$this->hospital->insert_hospital_id($row, $dashboard_uid);
					endif;					
				
				}
				
			endif;
			
			redirect(base_url().'user/lists', 'refresh');
		
		elseif(is_numeric($id)):
					
			$this->index($id);
		
		else:
		
			redirect(base_url().'user/lists', 'refresh');
		
		endif;
		
	}

}

/* End of file assign.php */
/* Location: ./application/controllers/user/assign.php */