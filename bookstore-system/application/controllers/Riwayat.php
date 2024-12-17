<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Riwayat extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		//Do your magic here
		$this->load->model('M_Riwayat');
	}

	public function index()
	{
		$data['tampil_riwayat']=$this->M_Riwayat->tampil_riwayat();
		$data['konten']="v_riwayat";
		$this->load->view('template', $data, FALSE);		
	}

}

/* End of file Riwayat.php */
/* Location: ./application/controllers/Riwayat.php */