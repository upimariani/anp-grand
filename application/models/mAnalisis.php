<?php
defined('BASEPATH') or exit('No direct script access allowed');

class mAnalisis extends CI_Model
{
	public function select()
	{
		$this->db->select('*');
		$this->db->from('analisis');
		$this->db->join('karyawan', 'analisis.id_karyawan = karyawan.id_karyawan', 'left');
		$this->db->order_by('hasil', 'desc');


		return $this->db->get()->result();
	}
	public function karyawan()
	{
		$this->db->select('*, karyawan.id_karyawan');
		$this->db->from('karyawan');
		$this->db->join('analisis', 'karyawan.id_karyawan = analisis.id_karyawan', 'left');
		return $this->db->get()->result();
	}
	public function insert($data)
	{
		$this->db->insert('analisis', $data);
	}
}

/* End of file mAnalisis.php */
