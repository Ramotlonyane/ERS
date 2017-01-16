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

        public function get_admindata(){

    	$this->db->select('id, firstname, lastname');
		$this->db->from('admin');
		$this->db->where('bDeleted', 0);

		$query = $this->db->get();
    	return $query->result();
    }

}