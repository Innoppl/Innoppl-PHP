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
class Add extends CI_Controller {

	public function index($id = null)
	{
		//Loading Models
		$this->load->model('user');
		
		// Fetches value from session
		$user_role = $this->session->userdata('role');
		$data['first_name'] = ucfirst($this->session->userdata('first_name'));
		$data['last_name'] = ucfirst($this->session->userdata('last_name'));
		$data['role'] = ucfirst($this->session->userdata('role'));
		
		//Default Views Call Block
		$this->load->view('includes/header',$data);
		$this->load->view('includes/sidebar');
		
		
		if (($this->input->server('REQUEST_METHOD') == 'POST')):
		
			// submits the user inputted value
			$this->user->add_user($this->input->post());			
			redirect(base_url().'user/lists', 'refresh');
		
		elseif($user_role == "Super Admin"):
			
			// Executed on Admin login
			// Creating Array dataset for View end
			$data['users_roles'] = $this->user->get_roles();
			
			// Loads view file - user/add
			$this->load->view('user/add',$data);
		else:
		
			// Executed for Non-admin role users
			redirect(base_url().'user/dashboard','refresh');
		endif;
		
		//Call to Footer View
		$this->load->view('includes/footer');
	}

}

/* End of file add.php */
/* Location: ./application/controllers/user/add.php */