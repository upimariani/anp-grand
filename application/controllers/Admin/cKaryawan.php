<?php
defined('BASEPATH') or exit('No direct script access allowed');

class cKaryawan extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('mKaryawan');
	}

	public function index()
	{
		$data = array(
			'karyawan' => $this->mKaryawan->select()
		);
		$this->load->view('Admin/Layout/head');
		$this->load->view('Admin/Layout/aside');
		$this->load->view('Admin/vKaryawan', $data);
		$this->load->view('Admin/Layout/footer');
	}
	public function create()
	{
		$data = array(
			'id_user' => '1',
			'nama_kar' => $this->input->post('nama'),
			'jk_kar' => $this->input->post('jk'),
			'alamat' => $this->input->post('alamat'),
			'divisi' => $this->input->post('divisi'),
			'jabatan' => $this->input->post('jabatan'),
			'no_hp' => $this->input->post('no_hp'),
			'username' => $this->input->post('username'),
			'password' => $this->input->post('password'),
			'tgl_mulai_kerja' => $this->input->post('tgl')
		);
		$this->mKaryawan->insert($data);
		$this->session->set_flashdata('success', 'Data Karyawan Berhasil Disimpan!');
		redirect('Admin/cKaryawan');
	}
	public function update($id)
	{
		$data = array(
			'id_user' => '1',
			'nama_kar' => $this->input->post('nama'),
			'jk_kar' => $this->input->post('jk'),
			'alamat' => $this->input->post('alamat'),
			'divisi' => $this->input->post('divisi'),
			'jabatan' => $this->input->post('jabatan'),
			'no_hp' => $this->input->post('no_hp'),
			'username' => $this->input->post('username'),
			'password' => $this->input->post('password'),
			'tgl_mulai_kerja' => $this->input->post('tgl')
		);
		$this->mKaryawan->update($id, $data);
		$this->session->set_flashdata('success', 'Data Karyawan Berhasil Diperbaharui!');
		redirect('Admin/cKaryawan');
	}
	public function delete($id)
	{
		$this->mKaryawan->delete($id);
		$this->session->set_flashdata('success', 'Data Karyawan Berhasil Dihapus!');
		redirect('Admin/cKaryawan');
	}
}

/* End of file cKaryawan.php */
