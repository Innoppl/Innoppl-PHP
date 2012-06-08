<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/** 
 * Eagle Hospitals B-End
 * 
 * @version	0.1
 * @package CodeIgniter Framework
 * @Module User_Managment
 * @Author	Surendar M
 * @Organization Innoppl Inc
 * @link http://www.innoppl.com/
 */
class Settings extends CI_Controller {

	public function index($id = null)
	{
		//Loading Models
		$this->load->model('user');
		$this->load->model('hospital');
		
		$user_role = $this->session->userdata('role');
		$user_id = (int)$this->session->userdata('uid');
		
		// Fetches value from session
		// Creating Array dataset for View end	
		$data['first_name'] = ucfirst($this->session->userdata('first_name'));
		$data['last_name'] = ucfirst($this->session->userdata('last_name'));
		$data['role'] = ucfirst($this->session->userdata('role'));
		//Default Views Call Block
		$this->load->view('includes/header',$data);
		$this->load->view('includes/sidebar');
		
		// Creating Array dataset for View end
		$data['user_details'] = $this->user->get_user_details($user_id);
		// Loads view file - user/settings
		$this->load->view('user/settings',$data);
		
		//Call to Footer View
		$this->load->view('includes/footer');
	}
	
	function change_pwd()
	{
		//Loading Models
		$this->load->model('user');
		$this->load->model('hospital');
		
		//Loading Libraries
		$this->load->library('form_validation');
		
		$user_role = $this->session->userdata('role');
		$user_id = (int)$this->session->userdata('uid');
		
		// Fetches value from session
		// Creating Array dataset for View end
		$data['first_name'] = ucfirst($this->session->userdata('first_name'));
		$data['last_name'] = ucfirst($this->session->userdata('last_name'));
		$data['role'] = ucfirst($this->session->userdata('role'));
		//Default Views Call Block
		$this->load->view('includes/header',$data);
		$this->load->view('includes/sidebar');
		
		$data['warning_msg']=NULL;
		
		if (($this->input->server('REQUEST_METHOD') == 'POST')):
			
			// User entered password is matched with DB stored User password	
			$old_pass_verify = $this->user->get_pass_verified(md5($this->input->post('old_pwd')),$user_id);
		
			if($old_pass_verify):
				
				if($this->input->post('password') != $this->input->post('passconf')):
				
					// Failed to match new passwords
					$data['warning_msg']="New Passwords does not match";
					$this->load->view('user/change_pwd',$data);
				
				else:
				
					// Changes the password
					$this->user->update_password(md5($this->input->post('password')),$user_id);
					redirect(base_url().'user/settings', 'refresh');
				endif;
				
			else:
				
				// Failed to match with DB stored Password
				$data['warning_msg']="Old password does not match";
				$this->load->view('user/change_pwd',$data);
			
			endif;
			
		else:
			
			// Loads view file - user/change_pwd
			$this->load->view('user/change_pwd',$data);
		endif;
		
		//Call to Footer View
		$this->load->view('includes/footer');
	}
	
	function profile_edit()
	{
		//Loading Models
		$this->load->model('user');
		$this->load->model('hospital');
		
		$user_role = $this->session->userdata('role');
		$user_id = (int)$this->session->userdata('uid');
		
		// Fetches value from session
		// Creating Array dataset for View end	
		$data['first_name'] = ucfirst($this->session->userdata('first_name'));
		$data['last_name'] = ucfirst($this->session->userdata('last_name'));
		$data['role'] = ucfirst($this->session->userdata('role'));
		//Default Views Call Block
		$this->load->view('includes/header',$data);
		$this->load->view('includes/sidebar');
		 
		if (($this->input->server('REQUEST_METHOD') == 'POST')):  
			
			// Calling Model Functions
			$this->user->profile_edit_user($this->input->post(),$user_id);
			
			redirect(base_url().'user/settings', 'refresh');
		else:
		
			// Calling Model Functions
			$data['user_details'] = $this->user->get_user_details($user_id);
			
			// Loads view file - user/profile_edit
			$this->load->view('user/profile_edit',$data);
		endif;
		
		//Call to Footer View
		$this->load->view('includes/footer');
	}
	
	// Remapping Function Call permitting override behaviour
	public function _remap($value)
	{
		
		if($value == "index"):
			$this->index();
		elseif($value == "change_pwd"):
			$this->change_pwd();
		elseif($value == "profile_edit"):
			$this->profile_edit();
		else:
			redirect(base_url().'user/lists', 'refresh');
		endif;
		
	}
	
}

/* End of file settings.php */
/* Location: ./application/controllers/user/settings.php */