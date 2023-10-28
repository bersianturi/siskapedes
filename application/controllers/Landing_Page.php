<?php
class Landing_Page extends CI_Controller
{

	public function index()
	{

		$data['perangkat_per_jenis_kelamin'] = $this->ModelPerangkat->get_perangkat_per_jenis_kelamin();
		$data['perangkat_per_jabatan'] = $this->ModelPerangkat->get_perangkat_per_jabatan();
		$this->load->view('landing_page', $data);
	}
}
