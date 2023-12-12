<?php
defined('BASEPATH') or exit('No direct script access allowed');

class cDashboard extends CI_Controller
{

	public function index()
	{
		$this->load->view('HRD/Layout/head');
		$this->load->view('HRD/Layout/aside');
		$this->load->view('HRD/vDashboard');
		$this->load->view('HRD/Layout/footer');
	}
}

/* End of file cDashboard.php */
