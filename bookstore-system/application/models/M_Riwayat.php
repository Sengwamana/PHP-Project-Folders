<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_Riwayat extends CI_Model {

	public function tampil_riwayat()
	{
		return $this->db->join('user','user.kode_user = transaksi.kode_user')
						->get('transaksi')
						->result();		
	}

}

/* End of file M_Riwayat.php */
/* Location: ./application/models/M_Riwayat.php */