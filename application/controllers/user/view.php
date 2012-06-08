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
class View extends CI_Controller {

	public function index($id = null)
	{
		//Loading Models
		$this->load->model('user');
		$this->load->model('hospital');
		
		$user_role = $this->session->userdata('role');
		$user_id = (int)$id;
		
		$validity_chk = $this->user->get_user_checked($user_id);
		
		// Fetches value from session
		// Creating Array dataset for View end
		$data['first_name'] = ucfirst($this->session->userdata('first_name'));
		$data['last_name'] = ucfirst($this->session->userdata('last_name'));
		$data['role'] = ucfirst($this->session->userdata('role'));
		//Default Views Call Block
		$this->load->view('includes/header',$data);
		$this->load->view('includes/sidebar');
		
		if($user_role == "Medical Director"):
			
			$allowed = FALSE;	
			$md_hospital = $this->session->userdata('hospitals');
			
			$dashboard_role = $this->user->find_role($user_id);
			
			if($dashboard_role == "Hospital Admin" || $dashboard_role == "Doctor"):
			
			$dashboard_hospital = $this->hospital->get_user_hospitals_id($user_id);
			
				foreach($md_hospital as $row)
				{
					if($row == $dashboard_hospital):
						$allowed = TRUE;
					endif;
				}

			else:
			
				$allowed = False;
			
			endif;
			
		endif;		
		
		if($validity_chk):
			if(($user_role == "Super Admin" || $allowed == TRUE) && ($user_id != 1)):
				
				// Fetches the User Lists
				$data['user_details'] = $this->user->get_user_details($user_id);
				$this->load->view('user/view',$data);
			
			else:
				
				redirect(base_url().'user/dashboard','refresh');
			
			endif;
		
		else:
			redirect(base_url().'user/lists','refresh');
		endif;
		
		//Call to Footer View
		$this->load->view('includes/footer');
	}
	
	// Remapping Function Call permitting override behaviour
	public function _remap($id)
	{
		if(is_numeric($id))
		{			
			$this->index($id);
		}else
		{
			redirect(base_url().'user/lists', 'refresh');
		}
	}

}

/* End of file view.php */
/* Location: ./application/controllers/user/view.php */
