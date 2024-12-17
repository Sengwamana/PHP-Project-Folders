<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		//Do your magic here
		$this->load->model('M_admin');
	}

	public function index()
	{
		if ($this->session->userdata('login') == FALSE) {
			$this->load->view('login');
		} else {
			redirect('Dashboard');
		}
		
	}
	public function proses_login()
	{
		if ($this->input->post('submit')) {
			$this->form_validation->set_rules('username', 'username', 'trim|required');
			$this->form_validation->set_rules('password', 'password', 'trim|required');
			if ($this->form_validation->run() == TRUE) {
				if ($this->M_admin->get_login() == TRUE) {
					redirect('dashboard');
				} else {
					$this->session->set_flashdata('message', 'Wrong Username and Password');
					redirect('admin/index');
				}
			} else {
				$this->session->set_flashdata('message', 'Username or Password must be filled!!');
				redirect('admin/index');
			} 
		}
	}

	public function register()
	{
		if ($this->session->userdata('login') == FALSE) {
			$this->load->view('register');
		} else {
			redirect('Dashboard');
		}
	}

	public function proses_register()
	{
		if ($this->input->post('submit')) {
			$this->form_validation->set_rules('username', 'username', 'trim|required');
			$this->form_validation->set_rules('password', 'password', 'trim|required');
			$this->form_validation->set_rules('nama_user', 'nama_user', 'trim|required');
			$this->form_validation->set_rules('level', 'level', 'trim|required');
			if ($this->form_validation->run() == TRUE) {
				if ($this->M_admin->get_register() == TRUE) {
					redirect('admin/index');
				} else {
					$this->session->set_flashdata('message', 'Wrong Username and Password');
					redirect('admin/register');
				}
			} else {
				$this->session->set_flashdata('message', 'Username or Password must be filled!!');
				redirect('admin/register');
			} 
		}
	}

	public function logout()
	{
		$this->session->sess_destroy();
		redirect('admin/index','refresh');
	}

}

/* End of file Admin.php */
/* Location: ./application/controllers/Admin.php */