<?php

class user extends CI_Model
{

	function __construct()
	{
        parent::__construct();
    }
	
	// To Update User Password
	function update_password($pass, $uid)
	{
		$user_data = array(
			'pass' => $pass
		);
		$this->db->where('uid', $uid);
		$this->db->update('users', $user_data); 	
	}
	
	// To verify user login password
	function get_pass_verified($pass,$uid)
	{
		$this->db->select('pass');
		$this->db->from('users');
		$this->db->where('uid =', $uid);
		$query = $this->db->get();
		foreach($query->result() as $row)
		{
			if($row->pass == $pass):
				return true;
			else:
				return false;
			endif;
		}
	}
	
	// To fetch User roles
	function get_roles()
	{	
		$id = 1;
		$this->db->select('*');
		$this->db->from('role');
		$this->db->where('rid !=', $id);
		$query = $this->db->get();
		return $query->result_array();
	}
	
	// To change the role of User
	function modify_role($rid,$user_id)
	{
		$user_data = array(
			'rid' => $rid
		);
		$this->db->where('uid', $user_id);
		$this->db->update('users_roles', $user_data); 	
		
	}
	
	// To find user's role
	function find_role($user_id)
	{
		$query = $this->db->get_where('users_roles',array('uid' => $user_id));
		foreach($query->result_array() as $row)
		{
			$rid =  $row['rid'];
		}
		$query_next = $this->db->get_where('role',array('rid' => $rid));
		foreach($query_next->result_array() as $row)
		{
			$role =  $row['name'];
		}
		return $role;
	}
	
	// To validate the User's role
	function get_role_checked($role_id)
	{
		$query = $this->db->get_where('role',array('rid' => $role_id));
		return $query->num_rows();
	}
	
	// To fetch set of users along with pagination.
	function get_users($role_id, $limit = NULL, $offset = NULL)
	{
		$this->db->select('*');
		$this->db->from('users_profile');
		$this->db->join('users_roles', 'users_roles.uid = users_profile.uid');
		$this->db->where('users_roles.rid', $role_id); 
		$this->db->limit($limit, $offset);
		$query = $this->db->get();
		return $query->result_array();
	}
	
	// TO count the number of users in application
	function count_all_users($role_id)
	{	
		$this->db->select('*');
		$this->db->from('users_profile');
		$this->db->join('users_roles', 'users_roles.uid = users_profile.uid');
		$this->db->where('users_roles.rid', $role_id); 
		$query = $this->db->get();
		return $query->num_rows();
	}
	
	// To validate the user existence.
	function get_user_checked($user_id)
	{
		$query = $this->db->get_where('users',array('uid' => $user_id));
		return $query->num_rows();
	}
	
	// To validate the doctors existence
	function get_doctor_checked($user_id)
	{
		$role_id = 5;
		$this->db->select('*');
		$this->db->from('users_profile');
		$this->db->join('users_roles', 'users_roles.uid = users_profile.uid');
		$this->db->where('users_roles.rid', $role_id); 
		$this->db->where('users_profile.uid', $user_id); 
		$query = $this->db->get();
		return $query->num_rows();
	}
	
	// To fetch the details of User
	function get_user_details($user_id)
	{
		$this->db->select('*');
		$this->db->from('users_profile');
		$this->db->join('users', 'users.uid = users_profile.uid');
		$this->db->where('users.uid', $user_id); 
		$this->db->order_by("users_profile.first_name", "asc"); 
		$query = $this->db->get();
		return $query->result_array();
	}
	
	// To fetch the Alias name of Doctor
	function get_user_alias_details($user_id)
	{
		$query = $this->db->get_where("doctor_alias_name", array('uid' => $user_id));
		return $query->result_array();
	}
	
	// To edit user details	
	function edit_user($data,$user_id)
	{
		$user_data = array(
			'first_name' => $data['first_name'],
			'last_name' => $data['last_name'],
			'phone' => $data['phone']
		);
		$this->db->where('uid', $user_id);
		$this->db->update('users_profile', $user_data); 	
		$user_brief_data = array(
			'email' => $data['email_id']
		);
		$this->db->where('uid', $user_id);
		$this->db->update('users', $user_brief_data);
		$role_id = (int)$data['role_select'];
		if($role_id == 5):
			$alias_data = array(
				'first_name_one' => $data['first_name_one'],
				'last_name_one' => $data['last_name_one'],
				'first_name_two' => $data['first_name_two'],
				'last_name_two' => $data['last_name_two'],
				'first_name_three' => $data['first_name_three'],
				'last_name_three' => $data['last_name_three']
			);
			$this->db->where('uid', $user_id);
			$this->db->update('doctor_alias_name', $alias_data);
		endif;			
	}
	
	// To edit user's profile
	function profile_edit_user($data,$user_id)
	{
		$user_data = array(
			'first_name' => $data['first_name'],
			'last_name' => $data['last_name'],
			'phone' => $data['phone']
		);
		$this->db->where('uid', $user_id);
		$this->db->update('users_profile', $user_data); 	
		$user_brief_data = array(
			'email' => $data['email_id']
		);
		$this->db->where('uid', $user_id);
		$this->db->update('users', $user_brief_data);
		/*
		$role_id = (int)$data['role_select'];
		if($role_id == 5):
		$alias_data = array(
				'first_name_one' => $data['first_name_one'],
				'last_name_one' => $data['last_name_one'],
				'first_name_two' => $data['first_name_two'],
				'last_name_two' => $data['last_name_two'],
				'first_name_three' => $data['first_name_three'],
				'last_name_three' => $data['last_name_three']
			);
			$this->db->where('uid', $user_id);
			$this->db->update('doctor_alias_name', $alias_data);
		endif;			
		*/
	}
	
	// To add user to application.
	function add_user($data)
	{
		$password = "password";
		$user_brief_data = array(
			'email' => $data['email_id'],
			'pass' => md5($password),
			'status' => 1
		);
		$this->db->insert('users', $user_brief_data); 
		$uid = $this->db->insert_id();
		$user_data = array(
			'uid' => $uid,
			'first_name' => $data['first_name'],
			'last_name' => $data['last_name'],
			'phone' => $data['phone']
		);
		$this->db->insert('users_profile', $user_data); 
		$user_role_data = array(
			'uid' => $uid,
			'rid' => $data['role_select']
		);
		$this->db->insert('users_roles', $user_role_data);
		$role_id = (int)$data['role_select'];
		if($role_id == 5):
			$alias_data = array(
				'uid' => $uid,
				'first_name_one' => $data['first_name_one'],
				'last_name_one' => $data['last_name_one'],
				'first_name_two' => $data['first_name_two'],
				'last_name_two' => $data['last_name_two'],
				'first_name_three' => $data['first_name_three'],
				'last_name_three' => $data['last_name_three']
			);
			$this->db->insert('doctor_alias_name', $alias_data);	
		endif;
	}
	
}

/* End of file user.php */
/* Location: ./application/models/user.php */