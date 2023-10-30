<?php
class Landing_Page extends CI_Controller
{

	public function index()
	{

		$data['perangkat'] = $this->db->query("SELECT * FROM perangkat_desa")->num_rows();
		$data['perangkat_aktif'] = $this->db->query("SELECT * FROM perangkat_desa WHERE status='Aktif' AND hak_akses='4'")->num_rows();
		$data['perangkat_non_aktif'] = $this->db->query("SELECT * FROM perangkat_desa WHERE status='Non-Aktif' AND hak_akses='4'")->num_rows();
		$data['perangkat_per_jenis_kelamin'] = $this->ModelPerangkat->get_perangkat_per_jenis_kelamin();
		$data['perangkat_per_jabatan'] = $this->ModelPerangkat->get_perangkat_per_jabatan();
		$this->load->view('landing_page', $data);
	}
}
