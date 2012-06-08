<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/** 
 * 
 * @version		 0.1
 * @package 	 User
 * @description  User Management
 * @Author		 Surendar M
 * @Organization Innoppl Inc.
 * @link 		 http://www.innoppl.com/
 */
class Lists extends CI_Controller {

	public function index($id = null)
	{
		//Loading Models
		$this->load->model('user');
		$this->load->model('hospital');
		
		$user_role = $this->session->userdata('role');
		$this->user->get_roles();
		
		// Fetches value from session
		// Creating Array dataset for View end
		$data['first_name'] = ucfirst($this->session->userdata('first_name'));
		$data['last_name'] = ucfirst($this->session->userdata('last_name'));
		$data['role'] = ucfirst($this->session->userdata('role'));
		
		//Default Views Call Block
		$this->load->view('includes/header',$data);
		$this->load->view('includes/sidebar');
		
		if($user_role == "Super Admin"):
		
			// Creating Array dataset for View end
			$data['user_roles'] = $this->user->get_roles();	
			
			// Loads view file - user/select_role
			$this->load->view('user/select_role',$data);
		
		elseif($user_role == "Medical Director"):
			
			$user_id = $this->session->userdata('uid');
			
			// Defining Null Array Variables
			$data['assoc_users_ids'] = array();
			$data['assoc_user'] = array();
			
			// Calling Model Functions
			$hospital_id = $this->hospital->get_user_hospitals_id($user_id);
			$data['assoc_users_ids'] = $this->hospital->get_assoc_users_ids($hospital_id);
			
			if(count($data['assoc_users_ids'])>0):
				
				foreach($data['assoc_users_ids'] as $row)
				{
				
					$temp = $this->user->get_user_details($row);
				
					foreach($temp as $temp_val)
					{
						$temp_two['name'] = $temp_val['first_name'].' '.$temp_val['last_name'];
						$temp_two['uid'] = $temp_val['uid'];
						$temp_two['role'] = $this->user->find_role($temp_val['uid']);
					}
				
				$data['assoc_user'][] = $temp_two;	
				}
			
			endif;
			
			// Loads view file - user/md_users_list
			$this->load->view('user/md_users_list',$data);
		else:
			redirect(base_url().'user/dashboard','refresh');
		endif;
		
		//Call to Footer View
		$this->load->view('includes/footer');
	}
	
	public function role($id)
	{
		//Loading Models
		$this->load->model('user');
		$this->load->library('pagination');
		
		$role_id = $id;
		$user_role = $this->session->userdata('role');
		
		// Fetches value from session
		// Creating Array dataset for View end
			
		$data['first_name'] = ucfirst($this->session->userdata('first_name'));
		$data['last_name'] = ucfirst($this->session->userdata('last_name'));
		$data['role'] = ucfirst($this->session->userdata('role'));
		
		//Default Views Call Block
		$this->load->view('includes/header',$data);
		$this->load->view('includes/sidebar');
		
		// User role id is validated
		if(is_numeric($id)):
			$validity_chk = $this->user->get_role_checked($role_id);
		else:
			redirect(base_url().'user/lists/', 'refresh');
		endif;
		
		if($validity_chk):
			if(($user_role == "Super Admin") && ($role_id != 1)):
				$per_page = 10;
				$total = $this->user->count_all_users($role_id);
				$data['users_list'] = $this->user->get_users($role_id, $per_page, $this->uri->segment(5));
			
				// Pagination configuration settings	
				$base_url = site_url('user/lists/role/'.$this->uri->segment(4));
				$config['base_url'] = $base_url;
				$config['total_rows'] = $total;
				$config['per_page'] = $per_page;
				$config['uri_segment'] = '5';
				$config['full_tag_open'] = '<div style="float:right;padding:10px;"><p class="pagin">';
				$config['full_tag_close'] = '</p></div>';
				$config['prev_link'] = 'PREVIOUS';
				$config['next_link'] = 'NEXT';
				$config['first_link'] = 'FIRST';
				$config['last_link'] = 'Last';
				
				// Initializing Pagination configuration settings.
				$this->pagination->initialize($config); 
				$this->load->view('user/lists',$data);
			else:
				redirect(base_url().'user/dashboard/', 'refresh');
			endif;
		else:
			redirect(base_url().'user/lists/', 'refresh');
		endif;
		
		//Call to Footer View
		$this->load->view('includes/footer');
		
	}
	
}

/* End of file lists.php */
/* Location: ./application/controllers/user/lists.php */