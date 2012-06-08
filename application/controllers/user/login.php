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
class Login extends CI_Controller {

	public function index()
	{
		//Loading Models
		$this->load->model('login_auth');
		
		// Checks for Logged-in Status
		if($this->session->userdata('logged_in') == TRUE)
		{	
			redirect(base_url().'user/dashboard/', 'refresh');
		}
		
		$data['error'] = '';
			
		// Executed on User Login submission	
		if (($this->input->server('REQUEST_METHOD') == 'POST')) {
			
			// Calling Model Functions for Login authentication
			$login_verify = $this->login_auth->login_verify(trim($this->input->post('email_id')),trim($this->input->post('password')));
			
			if($login_verify == 2)
			{
				// Successfull Login 
				redirect(base_url().'user/dashboard', 'refresh');	
			}
			else
			{
				// Failed Login
				$data['login_error'] = "Login Failed!";
			}
				
		}
		
		// Loads view file - user/login
		$this->load->view('user/login',$data);
		
	}

}

/* End of file login.php */
/* Location: ./application/controllers/user/login.php */