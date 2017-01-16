<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Employee_c extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */

	function __construct(){
	parent:: __construct();
	$this->load->model('Employee_m');
	$this->load->library('session');
	//$this->load->helper('');
	}
	public function index()
	{
		
	}

	public function employee_data(){

		if($this->session->userdata('logged_in') == TRUE)
		{
		
		$employee_data['employeedata'] 	= $this->Employee_m->get_employeedata();
		$this->load->view("backoffice/employee/employee.php", $employee_data);

		}else{
			$this->load->view('backoffice/back_index.php');
		}
	
	}

		public function delete_employee($record_id){

		if($this->session->userdata('logged_in') == TRUE)
		{
			$e_result = $this->Employee_m->remove_employee($record_id);

				if ($e_result) {

					$employee_data['employeedata'] 	= $this->Employee_m->get_employeedata();
					$this->load->view("backoffice/employee/employee.php", $employee_data);
				}

		}else{
			$this->load->view('backoffice/back_index.php');
		}
		
	}
}
