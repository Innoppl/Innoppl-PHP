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
class Dashboard extends CI_Controller {

	public function index()
	{
		
		// Fetches value from session
		// Creating Array dataset for View end
		$data['first_name'] = ucfirst($this->session->userdata('first_name'));
		$data['last_name'] = ucfirst($this->session->userdata('last_name'));
		$data['role'] = ucfirst($this->session->userdata('role'));
		
		//Default Views Call Block
		$this->load->view('includes/header',$data);
		$this->load->view('includes/sidebar');
		$this->load->view('user/dashboard');
		$this->load->view('includes/footer');
		
	}
	
}

/* End of file dashboard.php */
/* Location: ./application/controllers/user/dashboard.php */