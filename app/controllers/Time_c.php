<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Time_c extends CI_Controller {

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
	$this->load->model('Time_m');
	$this->load->library('session');
	//$this->load->helper('');
	}
	public function index()
	{
		
	}

	public function record_data(){

		if($this->session->userdata('logged_in') == TRUE)
		{
		
		$time_data['timedata'] 	= $this->Time_m->get_timedata();
		$this->load->view("backoffice/record", $time_data);

		}else{
			$this->load->view('backoffice/back_index.php');
		}
	
	}

	public function delete_record($record_id){

		if($this->session->userdata('logged_in') == TRUE)
		{
			$r_result = $this->Time_m->remove_record($record_id);

				if ($r_result) {

					$time_data['timedata'] 	= $this->Time_m->get_timedata();
					$this->load->view("backoffice/record", $time_data);
				}

		}else{
			$this->load->view('backoffice/back_index.php');
		}
		
	}
}
