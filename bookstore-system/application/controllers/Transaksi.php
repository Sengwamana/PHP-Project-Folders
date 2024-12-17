<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Transaksi extends CI_Controller {

		public function __construct()
		{
			parent::__construct();
			$this->load->model('m_transaksi','trans');
			$this->load->model('m_buku','buku');
		}
	public function index()
	{
		$data['transaksi']=$this->trans->tm_transaksi();
		$data['tampil_buku']=$this->buku->tampil_buku();
		$data['konten']="v_transaksi";
		$this->load->view('template', $data, FALSE);
	}

	public function addcart($id)
	{
		$cek_stok=$this->trans->cek($id);
		if ( $cek_stok == 0){
			$this->session->set_flashdata('message', 'Out of stock');
			redirect('transaksi','refresh');
		}
		$detail=$this->buku->detail($id);
		$data=array(
				'id' => $detail->kode_buku,
				'qty' => 1,
				'price' => $detail->harga,
				'name' => $detail->judul_buku,
				'options' => array('genre'=>$detail->nama_kategori)
			);
		$this->cart->insert($data);
		redirect('transaksi');
	}

	public function simpan()
	{
		if ($this->input->post('update')) {
			 for ($i=0; $i < count($this->input->post('rowid')); $i++) { 
			 	$data=array(
			 			'rowid' => $this->input->post('rowid')[$i],
			 			'qty' => $this->input->post('qty')[$i]
			 		);
			 	$this->cart->update($data);
			 }
			 redirect('transaksi');
		} elseif ($this->input->post('bayar')) {
			$this->form_validation->set_rules('kode_user', 'user', 'trim|required');
			$this->form_validation->set_rules('nama_pembeli', 'nama_pembeli', 'trim|required');
			if ($this->form_validation->run() == TRUE) {
				$id=$this->trans->simpan_cart_db();
				if ($id) {
					$data['transaksi']=$this->trans->detail_nota($id);
					$this->load->view('cetak_nota', $data, FALSE);
				}
			} else {
				$this->session->set_flashdata('message', 'Name of Cashier, Customer must be filled!!!');
				redirect('transaksi');
			}
		}
	}
	public function hapus_cart($id)
	{
		$data=array(
				'rowid'=>$id,
				'qty'=>0
			);
		$this->cart->update($data);
		redirect('transaksi');
	}
	public function clearcart()
	{
		$this->cart->destroy();
		redirect('transaksi');
	}

}

/* End of file Transaksi.php */
/* Location: ./application/controllers/Transaksi.php */