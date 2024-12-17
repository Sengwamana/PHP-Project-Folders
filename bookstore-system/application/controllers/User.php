<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('m_user','user');
	}
	public function index()
	{
		$data['tampil_user']=$this->user->tampil_user();
		$data['konten']="v_user";
		$this->load->view('template', $data);
		
	}
	public function tambah()
	{
		if ($this->input->post('simpan')) {
			if ($this->user->simpan_user()) {
				$this->session->set_flashdata('message', 'Used Added Successfully');
				redirect('user','refresh');
			} else {
				$this->session->set_flashdata('message', 'Failed to Add');
				redirect('user','refresh');
			}
		}
	}

	public function edit_user($id)
	{
		$data=$this->user->detail($id);
		echo json_encode($data);
	}
	public function user_update()
	{
		if ($this->input->post('edit')) {
			if ($this->user->edit_user()) {
				$this->session->set_flashdata('message', 'Successfully Updated');
				redirect('user','refresh');
			}
			else {
				$this->session->set_flashdata('message', 'Update Failed');
				redirect('user','refresh');
			}
		}
	}

	public function hapus($id='')
	{
		if ($this->user->hapus_user($id)) {
			$this->session->set_flashdata('message', 'Successfully Deleted');
			redirect('user','refresh');
		} else {
			$this->session->set_flashdata('message', 'Failed to delete');
			redirect('user','refresh');
		}
	}

}

/* End of file User.php */
/* Location: ./application/controllers/User.php */