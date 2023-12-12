<?php
defined('BASEPATH') or exit('No direct script access allowed');

class mLemburan extends CI_Model
{
	public function select()
	{
		$this->db->select('*');
		$this->db->from('lemburan');
		$this->db->join('karyawan', 'lemburan.id_karyawan = karyawan.id_karyawan', 'left');
		return $this->db->get()->result();
	}
	public function insert($data)
	{
		$this->db->insert('lemburan', $data);
	}
	public function update($id, $data)
	{
		$this->db->where('id_lemburan', $id);
		$this->db->update('lemburan', $data);
	}
	public function delete($id)
	{
		$this->db->where('id_lemburan', $id);
		$this->db->delete('lemburan');
	}
}

/* End of file mLemburan.php */
