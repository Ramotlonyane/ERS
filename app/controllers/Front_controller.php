<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Front_controller extends CI_Controller {

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
	$this->load->model('Front_model');
	//$this->load->library('');
	//$this->load->helper('');
	}

	public function index()
	{
		$this->load->view('frontoffice/front_index.php');
	}

	public function login()
	{
		$data = array('timein' => false, 'timeout' => false);

		$employee_id = $_POST['employee'];
		$date_out 	= date("Y-m-d", strtotime("UTC+02:00"));

		$clock_result = $this->Front_model->check_clock($employee_id);

		if (!empty($clock_result)) {

			$time_out = date("H:i", strtotime("UTC+02:00"));
			if ($this->Front_model->update_timeout($time_out, $employee_id, $date_out)) {

				$q_employee = $this->Front_model->log_in($employee_id);

				$employee_name = $q_employee['firstname']." ".$q_employee['lastname'];

				$data['name'] = "<h3 class = 'text-muted'>".$employee_name." <label class = 'text-info'>at  ".date("h:i a", strtotime($time_out))."</label></h3>";
			}

		}else{

			$time_in = date("H:i", strtotime("UTC+02:00"));
			$date_in = date("Y-m-d", strtotime("UTC+02:00"));

			$q_employee = $this->Front_model->log_in($employee_id);

			$employee_name = $q_employee['firstname']." ".$q_employee['lastname'];

			$time_values = array('employee_name'	=> $employee_name, 
								 'persal_number'	=> $employee_id,
								 'time_in'			=> $time_in,
								 'bDeleted'			=> 0,
								 'date_in'			=> $date_in);

			if ($this->Front_model->insert_time($time_values)) {

				$data['timein'] = true;

				$data['name'] = "<h3 class = 'text-muted'>".$employee_name." <label class = 'text-info'>at  ".date("h:i a", strtotime($time_in))."</label></h3>";
			}

		}
		echo json_encode($data);	
	}


	public function check_employee_id()
	{
		$employee_id = $_POST['employee'];

		$q_employee = $this->Front_model->check($employee_id);

		$v_employee = $q_employee->num_rows();
		if($v_employee > 0){
			echo 'Success';
		}else{
			echo 'Error';
		}
	}
}