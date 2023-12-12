<?php
defined('BASEPATH') or exit('No direct script access allowed');

class cAbsensi extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('mAbsensi');
		$this->load->model('mKaryawan');
	}

	public function index()
	{
		$data = array(
			'karyawan' => $this->mKaryawan->select()
		);
		$this->load->view('HRD/Layout/head');
		$this->load->view('HRD/Layout/aside');
		$this->load->view('HRD/vAbsensi', $data);
		$this->load->view('HRD/Layout/footer');
	}
	public function detail($id_karyawan)
	{
		$data = array(
			'id_karyawan' => $id_karyawan,
			'karyawan' => $this->mAbsensi->select($id_karyawan)
		);
		$this->load->view('HRD/Layout/head');
		$this->load->view('HRD/Layout/aside');
		$this->load->view('HRD/vDetailAbsensi', $data);
		$this->load->view('HRD/Layout/footer');
	}
	public function create($id)
	{
		$data = array(
			'id_karyawan' => $id,
			'tgl_absensi' => $this->input->post('tgl'),
			'status_absensi' => $this->input->post('status')
		);
		$this->mAbsensi->insert($data);
		$this->session->set_flashdata('success', 'Absensi Berhasil Ditambahkan!');
		redirect('HRD/cAbsensi/detail/' . $id);
	}
	public function delete($id)
	{
		$this->mAbsensi->delete($id);
		$this->session->set_flashdata('success', 'Absensi Berhasil Dihapus!');
		redirect('HRD/cAbsensi/detail/' . $id);
	}
	public function update($id)
	{
		$data = array(
			'id_karyawan' => $id,
			'tgl_absensi' => $this->input->post('tgl'),
			'status_absensi' => $this->input->post('status')
		);
		$this->mAbsensi->update($id, $data);
		$this->session->set_flashdata('success', 'Absensi Berhasil Diperbaharui!');
		redirect('HRD/cAbsensi/detail/' . $id);
	}
}

/* End of file cAbsensi.php */
