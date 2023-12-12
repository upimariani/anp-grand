<?php
defined('BASEPATH') or exit('No direct script access allowed');

class mPelanggaran extends CI_Model
{
	public function select()
	{
		$this->db->select('*');
		$this->db->from('kualitas_kerja');
		$this->db->join('karyawan', 'kualitas_kerja.id_karyawan = karyawan.id_karyawan', 'left');
		return $this->db->get()->result();
	}
	public function insert($data)
	{
		$this->db->insert('kualitas_kerja', $data);
	}
	public function update($id, $data)
	{
		$this->db->where('id_kualitas', $id);
		$this->db->update('kualitas_kerja', $data);
	}
	public function delete($id)
	{
		$this->db->where('id_kualitas', $id);
		$this->db->delete('kualitas_kerja');
	}
}

/* End of file mPelanggaran.php */
