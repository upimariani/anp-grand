<?php
defined('BASEPATH') or exit('No direct script access allowed');

class mKaryawan extends CI_Model
{
	public function select()
	{
		$this->db->select('*');
		$this->db->from('karyawan');
		return $this->db->get()->result();
	}
	public function insert($data)
	{
		$this->db->insert('karyawan', $data);
	}
	public function update($id, $data)
	{
		$this->db->where('id_karyawan', $id);
		$this->db->update('karyawan', $data);
	}
	public function delete($id)
	{
		$this->db->where('id_karyawan', $id);
		$this->db->delete('karyawan');
	}
}

/* End of file mKaryawan.php */
