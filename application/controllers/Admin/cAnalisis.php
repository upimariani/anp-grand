<?php
defined('BASEPATH') or exit('No direct script access allowed');

class cAnalisis extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('mAnalisis');
	}

	public function index()
	{
		$data = array(
			'analisis' => $this->mAnalisis->select(),
			'karyawan' => $this->mAnalisis->karyawan()
		);
		$this->load->view('Admin/Layout/head');
		$this->load->view('Admin/Layout/aside');
		$this->load->view('Admin/vAnalisis', $data);
		$this->load->view('Admin/Layout/footer');
	}
	public function create()
	{
		//bismillah perhitungan
		$karyawan = $this->input->post('karyawan');

		//variabel
		$absensi = $this->db->query("SELECT COUNT(id_absensi) as jml_absen FROM `absensi` WHERE id_karyawan='" . $karyawan . "' AND status_absensi='1'")->row(); //0
		$pelanggaran = $this->db->query("SELECT COUNT(id_kualitas) as jml_pelanggaran FROM `kualitas_kerja` WHERE id_karyawan='" . $karyawan . "'")->row(); //0
		$masa_kerja = $this->db->query("SELECT DATEDIFF('2023-12-11', tgl_mulai_kerja)/365 as tgl FROM karyawan WHERE id_karyawan='" . $karyawan . "'")->row();
		$lemburan = $this->db->query("SELECT SUM(jam_lembur) as jam_lembur FROM `lemburan` WHERE id_karyawan='" . $karyawan . "'")->row(); //NULL


		//absensi
		$percent_absen = ($absensi->jml_absen / 30) * 100;
		if ($percent_absen >= 80 && $percent_absen <= 100) {
			$v_absensi = 0.68148;
		} else if ($percent_absen >= 70 && $percent_absen < 80) {
			$v_absensi = 0.23566;
		} else if ($percent_absen < 70) {
			$v_absensi = 0.08286;
		}

		//pelanggaran
		if ($pelanggaran->jml_pelanggaran == 0) {
			$v_pelanggaran = 0.68148;
		} else if ($pelanggaran->jml_pelanggaran == 1) {
			$v_pelanggaran = 0.23566;
		} else if ($pelanggaran->jml_pelanggan >= 2) {
			$v_pelanggaran = 0.08286;
		}

		//masa kerja
		$m = $masa_kerja->tgl;
		if ($m >= 3) {
			$v_masa_kerja = 0.68148;
		} else if ($m > 1 && $m < 3) {
			$v_masa_kerja = 0.23566;
		} else if ($m <= 1) {
			$v_masa_kerja = 0.08286;
		}

		//lemburan
		$lembur = $lemburan->jam_lembur;
		if ($lembur == 'NULL') {
			$lemburan = $lemburan->jam_lembur;
		} else {
			$lemburan = 0;
		}
		if ($lembur >= 20) {
			$v_lembur = 0.68148;
		} else if ($lembur >= 11 && $lembur <= 19) {
			$v_lembur = 0.23566;
		} else if ($lembur <= 10) {
			$v_lembur = 0.08286;
		} else if ($lembur == 'NULL') {
			$v_lembur = 0.08286;
		}

		$hasil = round(($v_absensi * 0.324) + ($v_pelanggaran * 0.324) + ($v_masa_kerja * 0.082) + ($v_lembur * 0.102), 4);
		echo $hasil;

		$data = array(
			'id_karyawan' => $karyawan,
			'tgl_proses' => date('Y-m-d'),
			'absensi' => $absensi->jml_absen,
			'kualitas' => $pelanggaran->jml_pelanggaran,
			'lama_kerja' => $masa_kerja->tgl,
			'lemburan' => $lemburan,
			'hasil' => $hasil,
			'periode' => date('m')
		);
		$this->mAnalisis->insert($data);
		$this->session->set_flashdata('success', 'Analisis Karyawan Berhasil Disimpan!');
		redirect('Admin/cAnalisis');
	}
	public function delete($id)
	{
		$this->db->where('id_analisis', $id);
		$this->db->delete('analisis');
		$this->session->set_flashdata('success', 'Analisis Karyawan Berhasil Dihapus!');
		redirect('Admin/cAnalisis');
	}
}

/* End of file cAnalisis.php */
