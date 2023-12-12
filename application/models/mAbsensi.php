<?php
defined('BASEPATH') or exit('No direct script access allowed');

class mAbsensi extends CI_Model
{
	public function select($id_karyawan)
	{
		$this->db->select('*');
		$this->db->from('absensi');
		$this->db->join('karyawan', 'absensi.id_karyawan = karyawan.id_karyawan', 'left');
		$this->db->where('karyawan.id_karyawan', $id_karyawan);

		return $this->db->get()->result();
	}
	public function insert($data)
	{
		$this->db->insert('absensi', $data);
	}
	public function update($id, $data)
	{
		$this->db->where('id_absensi', $id);
		$this->db->update('absensi', $data);
	}
	public function delete($id)
	{
		$this->db->where('id_absensi', $id);
		$this->db->delete('absensi');
	}
}

/* End of file mAbsensi.php */
