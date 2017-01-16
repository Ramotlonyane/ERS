<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Time_m extends CI_Model {

    public function get_timedata(){

    	$this->db->select('id, persal_number, employee_name, time_in, time_out, date_in, date_out');
		$this->db->from('time');
		$this->db->where('bDeleted', 0);

		$query = $this->db->get();
    	return $query->result();
    }
    public function remove_record($id)
	{
		$this->db->where('id', $id);
		if ($this->db->update('time',array('bDeleted'=>1))) {
			return true;
		}else{
			return false;
		}
	}

}