<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Front_model extends CI_Model {

	public function check($employee_id){

		$this->db->select('persal_number');
		$this->db->from('employee');
		$this->db->where('persal_number', $employee_id);
		$this->db->where('bDeleted', 0);

		$result = $this->db->get();
		return $result;
    }

    public function log_in($employee_id){

    	$this->db->select('persal_number, firstname, lastname');
		$this->db->from('employee');
		$this->db->where('persal_number', $employee_id);
		$this->db->where('bDeleted', 0);

		$query = $this->db->get();

		return $result = $query->row_array();
		
    }

    public function insert_time($time_values){

    	$this->db->insert('time', $time_values);

    	if($this->db->affected_rows() > 0)
			{
    			return true; // to the controller
			}
			else{
				return false;
			}
    }

    public function check_clock($employee_id){

    	$this->db->select('time_out');
    	$this->db->from('time');
    	$this->db->where('persal_number', $employee_id);
    	$this->db->where('time_out IS NULL');
    	$this->db->where('bDeleted', 0);

    	$query = $this->db->get();
    	return $query->result();
    }

    public function update_timeout($time_out,$employee_id, $date_out){

    	$this->db->where('persal_number', $employee_id);
    	$this->db->where('time_out IS NULL');
		if ($this->db->update('time',array('time_out'=>$time_out, 'date_out'=>$date_out))) {
			return true;
		}else{
			return false;
		}
    }

}