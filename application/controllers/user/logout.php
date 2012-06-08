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
class Logout extends CI_Controller {

	public function index()
	{
		// Destroys the session
		session_destroy();
		
		// Redirected back to Login Page
		redirect(base_url().'user/login', 'refresh');
	}
	
}

/* End of file logout.php */
/* Location: ./application/controllers/user/logout.php */