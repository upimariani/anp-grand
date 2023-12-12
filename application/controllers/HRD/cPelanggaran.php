<?php
defined('BASEPATH') or exit('No direct script access allowed');

class cPelanggaran extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('mPelanggaran');
		$this->load->model('mKaryawan');
	}

	public function index()
	{
		$data = array(
			'pelanggaran' => $this->mPelanggaran->select(),
			'karyawan' => $this->mKaryawan->select()
		);
		$this->load->view('HRD/Layout/head');
		$this->load->view('HRD/Layout/aside');
		$this->load->view('HRD/vPelanggaran', $data);
		$this->load->view('HRD/Layout/footer');
	}
	public function create()
	{
		$data = array(
			'id_karyawan' => $this->input->post('karyawan'),
			'tgl_sp' => $this->input->post('tgl'),
			'alasan_sp' => $this->input->post('alasan')
		);
		$this->mPelanggaran->insert($data);
		$this->session->set_flashdata('success', 'Pelanggaran Karyawan Berhasil Ditambahkan!');
		redirect('HRD/cPelanggaran');
	}
	public function delete($id)
	{
		$this->mPelanggaran->delete($id);
		$this->session->set_flashdata('success', 'Pelanggaran Karyawan Berhasil Dihapus!');
		redirect('HRD/cPelanggaran');
	}
	public function update($id)
	{
		$data = array(
			'id_karyawan' => $this->input->post('karyawan'),
			'tgl_sp' => $this->input->post('tgl'),
			'alasan_sp' => $this->input->post('alasan')
		);
		$this->mPelanggaran->update($id, $data);
		$this->session->set_flashdata('success', 'Pelanggaran Karyawan Berhasil Diperbaharui!');
		redirect('HRD/cPelanggaran');
	}
}

/* End of file cPelanggaran.php */
