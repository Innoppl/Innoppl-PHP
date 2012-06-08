<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/** 
 * 
 * @version	 0.1
 * @package 	 User
 * @description  User Management
 * @Author	 Surendar M
 * @Organization Innoppl Inc.
 * @link 	 http://www.innoppl.com/
 */
class Edit extends CI_Controller {

	public function index($id = null)
	{
		
		//Loading Models
		$this->load->model('user');
		
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
		
		if($validity_chk):
			
			if(($user_role == "Super Admin") && ($user_id != 1)):
				
				// Creating Array dataset for View end
				$data['user_details'] = $this->user->get_user_details($user_id);
				$data['user_role'] = $this->user->find_role($user_id);
				$data['all_roles'] = $this->user->get_roles();
				
				// Checking User role for Doctor
				if($data['user_role'] == "Doctor"):
					$data['alias_data'] = $this->user->get_user_alias_details($user_id);
				endif;	
				
				// Loads view file - user/edit
				$this->load->view('user/edit',$data);
			
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
		if (($this->input->server('REQUEST_METHOD') == 'POST')) 
		{
			//Loading Models
			$this->load->model('user');
			
			// Handles the Post data
			$this->user->edit_user($this->input->post(),$id);
			$this->user->modify_role($this->input->post('role_select'),$id);
			redirect(base_url().'user/lists', 'refresh');
		}
		elseif(is_numeric($id))
		{			
			$this->index($id);
		}else
		{
			redirect(base_url().'user/lists', 'refresh');
		}
	}

}

/* End of file edit.php */
/* Location: ./application/controllers/user/edit.php */