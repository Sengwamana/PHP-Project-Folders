<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_kategori extends CI_Model {

	public function tampil_kategori()
	{
		$tm_kategori=$this->db->get('kategori_buku')->result();
		return $tm_kategori;
	}

	public function simpan_kat()
	{
		$object=array(
				'kode_kategori'=>$this->input->post('kode_kategori'),
				'nama_kategori'=>$this->input->post('nama_kategori')
			);
		return $this->db->insert('kategori_buku', $object);;
	}
	public function detail($a)
	{
		return $this->db->where('kode_kategori', $a)
						->get('kategori_buku')
						->row();
	}
	public function edit_kat()
	{
		$object=array(
				'kode_kategori'=>$this->input->post('kode_kategori'),
				'nama_kategori'=>$this->input->post('nama_kategori')
			);
		return $this->db->where('kode_kategori', $this->input->post('kode_kategori_lama'))->update('kategori_buku',$object);
	}

	public function hapus_kat($id='')
	{
		return $this->db->where('kode_kategori', $id)->delete('kategori_buku');
	}
}

/* End of file M_kategori.php */
/* Location: ./application/models/M_kategori.php */