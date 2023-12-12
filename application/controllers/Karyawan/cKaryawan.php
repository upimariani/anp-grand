<?php
defined('BASEPATH') or exit('No direct script access allowed');

class cKaryawan extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('mNilaiKaryawan');
	}

	public function index()
	{
		$data = array(
			'nilai' => $this->mNilaiKaryawan->nilai()
		);
		$this->load->view('Karyawan/Layout/head');
		$this->load->view('Karyawan/Layout/aside');
		$this->load->view('Karyawan/vDashboard', $data);
		$this->load->view('Karyawan/Layout/footer');
	}
}

/* End of file cKaryawan.php */
