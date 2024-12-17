<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Buku extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('m_buku','buku');
	}
	public function index()
	{
		$this->load->library('pagination');
		$jumlah_data = $this->buku->jumlah_data();
		$data['tampil_buku']=$this->buku->tampil_buku();
		$data['kategori']=$this->buku->data_kategori();
		$data['konten']="v_buku";

		$data['total_rows'] = $jumlah_data;
		$data['per_page'] = 1;
		$from = $this->uri->segment(3);
		$this->pagination->initialize($data);		
		$data['user'] = $this->buku->tampil_buku($data['per_page'],$from);

		$this->load->view('template', $data, FALSE);
	}
	public function tambah()
	{
		$this->form_validation->set_rules('judul_buku', 'judul_buku', 'trim|required');
		$this->form_validation->set_rules('tahun', 'tahun', 'trim|required');
		$this->form_validation->set_rules('harga', 'harga', 'trim|required');
		$this->form_validation->set_rules('kategori', 'kategori', 'trim|required');
		$this->form_validation->set_rules('penerbit', 'penerbit', 'trim|required');
		$this->form_validation->set_rules('stok', 'stok', 'trim|required');
		if ($this->form_validation->run() == TRUE) {
			$config['upload_path'] = './assets/gambar/';
			$config['allowed_types'] = 'gif|jpg|png|jpeg';
			if ($_FILES['gambar']['name']!="") {
			$this->load->library('upload', $config);
			
			if ( ! $this->upload->do_upload('gambar')){
				$this->session->set_flashdata('message', $this->upload->display_errors());
				redirect('buku','refresh');
			}
			else{
				if ($this->buku->simpan_buku($this->upload->data('file_name'))) {
					$this->session->set_flashdata('message', 'Adding success');
				} else {
					$this->session->set_flashdata('message', 'Failed to Add');
				}
				redirect('buku','refresh');
			}
		} else {
			if ($this->buku->simpan_buku('')) {
				$this->session->set_flashdata('message', 'Adding success');
			} else {
				$this->session->set_flashdata('message', 'Failed to Add');
			}
			redirect('buku','refresh');
		}
	} else {
		$this->session->set_flashdata('message', validation_errors());
		redirect('buku','refresh');
	}
}

	public function edit_buku($id)
	{
		$data=$this->buku->detail($id);
		echo json_encode($data);
	}

	public function buku_update()
	{
		if ($this->input->post('simpan')) {
			if ($_FILES['gambar']['name']=="") {
				if ($this->buku->buku_update_no_foto()) {
					$this->session->set_flashdata('message', 'Details has been updated!');
					redirect('buku');
				} else {
					$this->session->set_flashdata('message', 'Failed to update');
					redirect('buku');
				}
			} else {
				$config['upload_path'] = './assets/gambar/';
				$config['allowed_types'] = 'gif|jpg|png|jpeg';
				$config['max_size']  = '100000000';
				
				$this->load->library('upload', $config);
				
				if ( ! $this->upload->do_upload('gambar')){
					$this->session->set_flashdata('message', 'failed to upload');
					redirect('buku');
				}
				else{
					if ($this->buku->buku_update_dengan_foto($this->upload->data("file_name"))) {
						$this->session->set_flashdata('message', 'Updated successfully!');
						redirect('buku');
					} else {
						$this->session->set_flashdata('message', 'Failed to update');
						redirect('buku');
					}
				}
			}
		}
	}

	public function hapus($kode_buku='')
	{
		if ($this->buku->hapus_buku($kode_buku)) {
			$this->session->set_flashdata('message', 'Successfully Deleted!');
			redirect('buku','refresh');
		} else {
			$this->session->set_flashdata('message', 'Delete Failed');
			redirect('buku','refresh');
		}
	}

}

/* End of file Buku.php */
/* Location: ./application/controllers/Buku.php */