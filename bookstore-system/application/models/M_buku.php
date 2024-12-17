<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_buku extends CI_Model {

	public function tampil_buku()
	{
		$tm_buku=$this->db->join('kategori_buku','kategori_buku.kode_kategori=buku.kode_kategori')
		->get('buku')->result();
		return $tm_buku;
	}
	public function jumlah_data(){
		return $this->db->get('buku')->num_rows();
	}
	public function data_kategori()
	{
		return $this->db->get('kategori_buku')->result();
	}
	public function simpan_buku($nama_file)
	{
		if ($nama_file=="") {
				$object=array(
						'judul_buku'=>$this->input->post('judul_buku'),
						'tahun'=>$this->input->post('tahun'),
						'harga'=>$this->input->post('harga'),
						'kode_kategori'=>$this->input->post('kategori'),
						'penerbit'=>$this->input->post('penerbit'),
						'penulis'=>$this->input->post('penulis'),
						'stok'=>$this->input->post('stok')

					);
			}	else {
				$object=array(
						'judul_buku'=>$this->input->post('judul_buku'),
						'tahun'=>$this->input->post('tahun'),
						'harga'=>$this->input->post('harga'),
						'kode_kategori'=>$this->input->post('kategori'),
						'gambar_buku'=>$nama_file,
						'penerbit'=>$this->input->post('penerbit'),
						'penulis'=>$this->input->post('penulis'),
						'stok'=>$this->input->post('stok'),

					);
			}
			return $this->db->insert('buku', $object);
		}

		public function detail($a)
		{
			$tm_buku=$this->db->join('kategori_buku', 'kategori_buku.kode_kategori=buku.kode_kategori')
			->where('kode_buku',$a)
			->get('buku')
			->row();
			return $tm_buku;
		}

		public function buku_update_no_foto()
		{
			$object=array(
					'judul_buku'=>$this->input->post('judul_buku'),
						'tahun'=>$this->input->post('tahun'),
						'harga'=>$this->input->post('harga'),
						'kode_kategori'=>$this->input->post('kategori'),
						'penerbit'=>$this->input->post('penerbit'),
						'penulis'=>$this->input->post('penulis'),
						'stok'=>$this->input->post('stok')
				);
			return $this->db->where('kode_buku', $this->input->post('kode_buku'))
							->update('buku',$object);

		}
		public function buku_update_dengan_foto($nama_foto='')
		{
			$object=array(
						'judul_buku'=>$this->input->post('judul_buku'),
						'tahun'=>$this->input->post('tahun'),
						'harga'=>$this->input->post('harga'),
						'kode_kategori'=>$this->input->post('kategori'),
						'gambar_buku'=>$nama_foto,
						'penerbit'=>$this->input->post('penerbit'),
						'penulis'=>$this->input->post('penulis'),
						'stok'=>$this->input->post('stok'),

					);
			return $this->db->where('kode_buku', $this->input->post('kode_buku'))
							->update('buku',$object);

		}
		public function hapus_buku($kode_buku='')
		{
			return $this->db->where('kode_buku', $kode_buku)->delete('buku');
		}

}

/* End of file M_buku.php */
/* Location: ./application/models/M_buku.php */