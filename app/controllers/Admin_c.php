<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_c extends CI_Controller {

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
	$this->load->model('Admin_m');
	$this->load->library('session');
	//$this->load->helper('');
	}

	public function index()
	{
		if($this->session->userdata('logged_in') == TRUE)
		{

		$data_navbar["admin_name"] = $this->session->userdata('admin_name');
		
		$this->load->view('backoffice/header.php');
		$this->load->view('backoffice/navbar.php',$data_navbar);

		$data = array('home' 			=> 'backoffice/home',
					  'admin'			=> 'backoffice/admin/admin',
					  'employee'		=> 'backoffice/employee/employee',
					  'record'			=> 'backoffice/record',
					  'new_admin'		=> 'backoffice/admin/new_admin',
					  'new_employee'	=> 'backoffice/employee/new_employee'
					 );

		$this->load->view('backoffice/dashboard.php', $data);
		$this->load->view('backoffice/footer.php');}
		else{
			$this->load->view('backoffice/back_index.php');
		}
	}

	public function admin_data(){

		if($this->session->userdata('logged_in') == TRUE)
		{
		
		$admin_data['admindata'] 	= $this->Admin_m->get_admindata();
		$this->load->view("backoffice/admin/admin.php", $admin_data);

		}else{
			$this->load->view('backoffice/back_index.php');
		}
	
	}

	public function login()
	{
		$username = $_POST['username'];
		$password = $_POST['password'];

		$q_login = $this->Admin_m->log_in($username,$password);

		if(!empty($q_login)){
			echo 'success';
			$admin_name = $q_login['firstname']." ".$q_login['lastname'];
			$session_data = array(
						'username' 		=> $username, 
						'admin_id' 		=> $q_login['id'],
						'admin_name'	=> $admin_name,
	 					'logged_in' 	=> TRUE);

			$this->session->set_userdata($session_data);
		}
	}

	public function add_admin(){

		if ($this->session->userdata('logged_in') == TRUE) {

		$data = array();

		$username = $_POST['username'];
		$password = $_POST['password'];
		$firstname = $_POST['firstname'];
		$lastname = $_POST['lastname'];

		$q_checkadmin = $this->Admin_m->admin_check($username);

			if ($q_checkadmin) {
				$data['check'] = true;
			}else{
				$data = array(
						'username'			=> $username,
						'password'			=> $password,
						'firstname'			=> $firstname,
						'lastname'			=> $lastname,
						'bDeleted'			=> 0,	
						);

				$a_result = $this->Admin_m->add_new_admin($data);
				if ($a_result) {
					$data['success'] = true;
				}else{
					$data['success'] = false;
				}

			}
			echo json_encode($data);
		}else{
			$this->load->view('backoffice/back_index.php');
		}
	}

	public function delete_admin($record_id){

		if($this->session->userdata('logged_in') == TRUE)
		{
			$a_result = $this->Admin_m->remove_admin($record_id);

				if ($a_result) {

					$admin_data['admindata'] 	= $this->Admin_m->get_admindata();
					$this->load->view("backoffice/admin/admin.php", $admin_data);
				}

		}else{
			$this->load->view('backoffice/back_index.php');
		}
		
	}

	public function logout()
	{
		$this->load->library('session');
		$array_items = array('username' => $username, 'password' => $password );
		$this->session->unset_userdata($array_items);
		$this->session->sess_destroy();

		redirect(base_url("index.php/Admin_c"));
	}
}
