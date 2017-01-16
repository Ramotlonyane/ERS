<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Employee_m extends CI_Model {

       public function get_employeedata(){

    	$this->db->select('id, persal_number, firstname, lastname, department, directorate, component');
		$this->db->from('employee');
		$this->db->where('bDeleted', 0);

		$query = $this->db->get();
    	return $query->result();
    }

    public function add_new_employee($employee_data)
	{
		$this->db->insert('employee', $employee_data);

		if($this->db->affected_rows() > 0)
			{
    			return true; // to the controller
			}
			else{
				return false;
			}
    }

    public function remove_employee($id)
	{
		$this->db->where('id', $id);
		if ($this->db->update('employee',array('bDeleted'=>1))) {
			return true;
		}else{
			return false;
		}
	}

}