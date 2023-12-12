<?php
defined('BASEPATH') or exit('No direct script access allowed');

class cLemburan extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('mLemburan');
		$this->load->model('mKaryawan');
	}

	public function index()
	{
		$data = array(
			'lemburan' => $this->mLemburan->select(),
			'karyawan' => $this->mKaryawan->select()
		);
		$this->load->view('HRD/Layout/head');
		$this->load->view('HRD/Layout/aside');
		$this->load->view('HRD/vLemburan', $data);
		$this->load->view('HRD/Layout/footer');
	}
	public function create()
	{
		$data = array(
			'id_karyawan' => $this->input->post('karyawan'),
			'jam_lembur' => $this->input->post('jam'),
			'tgl_lembur' => $this->input->post('tgl')
		);
		$this->mLemburan->insert($data);
		$this->session->set_flashdata('success', 'Lemburan Karyawan Berhasil Ditambahkan!');
		redirect('HRD/cLemburan');
	}
	public function delete($id)
	{
		$this->mLemburan->delete($id);
		$this->session->set_flashdata('success', 'Lemburan Karyawan Berhasil Dihapus!');
		redirect('HRD/cLemburan');
	}
	public function update($id)
	{
		$data = array(
			'id_karyawan' => $this->input->post('karyawan'),
			'jam_lembur' => $this->input->post('jam'),
			'tgl_lembur' => $this->input->post('tgl')
		);
		$this->mLemburan->update($id, $data);
		$this->session->set_flashdata('success', 'Lemburan Karyawan Berhasil Diperbaharui!');
		redirect('HRD/cLemburan');
	}
}

/* End of file cLemburan.php */
