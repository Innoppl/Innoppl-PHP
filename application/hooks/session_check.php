<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Session_check extends CI_Controller {

	public function index()
	{
		$ignore = array (
			'login',
			'logout',
			'error405',
			'noscript'
		);
	
		if(!in_array($this->uri->segment(2),$ignore))
		{
			
			//print_r($this->session->all_userdata()); exit;
			if($this->session->userdata('logged_in') != TRUE)
			{	
				redirect(base_url().'user/login/', 'refresh');
			}
		}
		
	}	
	
}