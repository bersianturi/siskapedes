<?php

class Dashboard extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();

        if ($this->session->userdata('hak_akses') != '2') {
            $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
				<strong>Anda Belum Login!</strong>
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
				<span aria-hidden="true">&times;</span>
				</button>
				</div>');
            redirect('login/logout');
        }
    }
    public function index()
    {
        $data['title'] = "Dashboard";
        $data['jumlah_admin'] = $this->db->query("SELECT * FROM perangkat_desa WHERE hak_akses = '1'")->num_rows();
        $data['jumlah_perangkat'] = $this->db->query("SELECT * FROM perangkat_desa WHERE hak_akses = '3'")->num_rows();
        $data['jumlah_superadmin'] = $this->db->query("SELECT * FROM perangkat_desa WHERE hak_akses = '4'")->num_rows();
        $data['desa'] = $this->ModelPerangkat->get_data('desa')->result();
        $data['kecamatan'] = $this->ModelPerangkat->get_data('kecamatan')->result();
        $data['hak_akses'] = $this->ModelPerangkat->get_data('hak_akses')->result();


        $kecamatan       = $this->input->post('kecamatan');
        $desa              = $this->input->post('desa');
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('template_dinpermasdes/header', $data);
            $this->load->view('template_dinpermasdes/sidebar');
            $this->load->view('dinpermasdes/dashboard', $data);
            $this->load->view('dinpermasdes/data_perangkat', $data);
            $this->load->view('template_dinpermasdes/footer');
        } else {
            // $data['perangkat'] = $this->db->query("SELECT * FROM kecamatan kc, desa ds, perangkat p WHERE kc.id_kecamatan = ds.id_kecamatan AND ds.id_desa = p.id_desa AND text(kecamatan) >= '$kecamatan' AND  text(desa) <= '$desa'")->result();
            $data['perangkat'] = $this->ModelPerangkat->get_perangkat($desa, $kecamatan)->result();

            $this->load->view('template_dinpermasdes/header', $data);
            $this->load->view('template_dinpermasdes/sidebar');
            $this->load->view('dinpermasdes/dashboard', $data);
            $this->load->view('dinpermasdes/tampil_dataPerangkat', $data);
            $this->load->view('template_dinpermasdes/footer');
        }
    }

    public function _rules()
    {
        $this->form_validation->set_rules('kecamatan', 'Nama Kecamatan', 'required');
        $this->form_validation->set_rules('desa', 'Nama Desa', 'required');
        $this->form_validation->set_message('required', ' %s tidak boleh kosong.');
        $this->form_validation->set_error_delimiters('<div class="mt-1 mx-2"><small class="text-danger">', '</small></div>');
    }
}
