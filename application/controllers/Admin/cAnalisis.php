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
		//bismillah perhitungan

		$karyawan = $this->db->query("SELECT * FROM `karyawan`")->result();
		foreach ($karyawan as $key => $value) {
			//variabel
			$absensi = $this->db->query("SELECT COUNT(id_absensi) as jml_absen FROM `absensi` WHERE id_karyawan='" . $value->id_karyawan . "' AND status_absensi='1'")->row(); //0
			$pelanggaran = $this->db->query("SELECT COUNT(id_kualitas) as jml_pelanggaran FROM `kualitas_kerja` WHERE id_karyawan='" . $value->id_karyawan . "'")->row(); //0
			$masa_kerja = $this->db->query("SELECT DATEDIFF('2023-12-11', tgl_mulai_kerja)/365 as tgl FROM karyawan WHERE id_karyawan='" . $value->id_karyawan . "'")->row();
			$lemburan = $this->db->query("SELECT SUM(jam_lembur) as jam_lembur FROM `lemburan` WHERE id_karyawan='" . $value->id_karyawan . "'")->row(); //NULL


			// //absensi
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
			} else if ($pelanggaran->jml_pelanggaran >= 2) {
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
			if ($lembur != NULL) {
				$lemburan = $lemburan->jam_lembur;
			} else {
				$lemburan = 0;
			}
			if ($lemburan >= 20) {
				$v_lembur = 0.68148;
			} else if ($lemburan >= 11 && $lemburan <= 19) {
				$v_lembur = 0.23566;
			} else if ($lemburan <= 10) {
				$v_lembur = 0.08286;
			}
			$hasil = round(($v_absensi * 0.324) + ($v_pelanggaran * 0.324) + ($v_masa_kerja * 0.082) + ($v_lembur * 0.102), 4);
			// echo $hasil;

			//cek data
			$cek_data = $this->db->query("SELECT * FROM `analisis` JOIN karyawan ON karyawan.id_karyawan=analisis.id_karyawan WHERE analisis.id_karyawan='" . $value->id_karyawan . "'")->row();

			$data = array(
				'id_karyawan' => $value->id_karyawan,
				'tgl_proses' => date('Y-m-d'),
				'absensi' => $absensi->jml_absen,
				'kualitas' => $pelanggaran->jml_pelanggaran,
				'lama_kerja' => $masa_kerja->tgl,
				'lemburan' => $lemburan,
				'hasil' => $hasil,
				'periode' => date('m')
			);

			if ($cek_data) {
				$this->db->where('id_karyawan', $value->id_karyawan);
				$this->db->update('analisis', $data);
			} else {
				$this->mAnalisis->insert($data);
			}
		}
		$data = array(
			'analisis' => $this->mAnalisis->select(),
			'karyawan' => $this->mAnalisis->karyawan()
		);
		$this->load->view('Admin/Layout/head');
		$this->load->view('Admin/Layout/aside');
		$this->load->view('Admin/vAnalisis', $data);
		$this->load->view('Admin/Layout/footer');
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
