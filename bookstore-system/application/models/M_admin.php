<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_admin extends CI_Model {

	public function get_login()
	{
		$query = $this->db->where('username', $this->input->post('username'))
						->where('password', md5($this->input->post('password')))
						->get('user');

		if ( $query->num_rows()>0) {
				$array = $query->row();
				$data=array(
					'logged_in'=> TRUE,
					'username'=> $array->username,
					'password' => md5($array->password),
					'nama_user' => $array->nama_user,
					'level'=>$array->level
					);
				
				$this->session->set_userdata( $data );

			if ($this->db->affected_rows() > 0) {
				return TRUE;
			}else{
				return FALSE;
			}

		}	
	}

	public function get_register()
	{
		$regis = array(
            'username'  => $this->input->post('username'),
            'password'  => md5($this->input->post('password')),
			'nama_user'	=> $this->input->post('nama_user'),
			'level' 	=> $this->input->post('level'),
        );

        return $this->db->insert('user', $regis);
	}
}

/* End of file M_admin.php */
/* Location: ./application/models/M_admin.php */