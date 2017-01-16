<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin_m extends CI_Model {

	public function log_in($username,$password){

    	$this->db->select('id, firstname, lastname, username, password');
		$this->db->from('admin');
		$this->db->where('username', $username);
		$this->db->where('password', $password);
		$this->db->where('bDeleted', 0);

		$query = $this->db->get();

		return $result = $query->row_array();
		
    }

    public function admin_check($username){

    	$this->db->select('username, lastname');
		$this->db->from('admin');
		$this->db->where('username', $username);
		$this->db->where('bDeleted', 0);

		$result = $this->db->get();

		if ($result->num_rows() > 0) {
			return true;
		} else {
			return false;
		}
    }

    public function add_new_admin($admin_data)
	{
		$this->db->insert('admin', $admin_data);

		if($this->db->affected_rows() > 0)
			{
    			return true; // to the controller
			}
			else{
				return false;
			}
    }

    public function get_admindata(){

    	$this->db->select('id, firstname, lastname');
		$this->db->from('admin');
		$this->db->where('bDeleted', 0);

		$query = $this->db->get();
    	return $query->result();
    }

    public function remove_admin($id)
	{
		$this->db->where('id', $id);
		if ($this->db->update('admin',array('bDeleted'=>1))) {
			return true;
		}else{
			return false;
		}
	}

}