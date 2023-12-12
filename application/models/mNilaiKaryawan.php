<?php
defined('BASEPATH') or exit('No direct script access allowed');

class mNilaiKaryawan extends CI_Model
{
	public function nilai()
	{
		$this->db->select('*');
		$this->db->from('analisis');
		$this->db->join('karyawan', 'analisis.id_karyawan = karyawan.id_karyawan', 'left');
		$this->db->where('karyawan.id_karyawan', $this->session->userdata('id_karyawan'));
		return $this->db->get()->row();
	}
}

/* End of file mNilaiKaryawan.php */
