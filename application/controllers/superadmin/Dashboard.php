<?php

class Dashboard extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();

        if ($this->session->userdata('hak_akses') != '4') {
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
        $data['jumlah_perangkat'] = $this->db->query("SELECT * FROM perangkat_desa")->num_rows();
        $data['jumlah_superadmin'] = $this->db->query("SELECT * FROM perangkat_desa WHERE hak_akses = '4'")->num_rows();
        $data['jumlah_desa'] = $this->db->query("SELECT * FROM kecamatan")->num_rows();
        $data['jumlah_kecamatan'] = $this->db->query("SELECT * FROM desa")->num_rows();
        $data['hak_akses'] = $this->ModelPerangkat->get_data('hak_akses')->result();
        $data['perangkat_per_jenis_kelamin'] = $this->ModelPerangkat->get_perangkat_per_jenis_kelamin();
        $data['perangkat_per_jabatan'] = $this->ModelPerangkat->get_perangkat_per_jabatan();

        $data['desa'] = $this->ModelPerangkat->get_data('desa')->result();
        $data['kecamatan'] = $this->ModelPerangkat->get_data('kecamatan')->result();

        $kecamatan       = $this->input->post('kecamatan');
        $desa              = $this->input->post('desa');

        $this->_rules();
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('template_superadmin/header', $data);
            $this->load->view('template_superadmin/sidebar');
            $this->load->view('superadmin/dashboard', $data);
            $this->load->view('superadmin/data_perangkat', $data);
            $this->load->view('template_superadmin/footer');
        } else {
            $data['perangkat'] = $this->ModelPerangkat->get_perangkat($desa, $kecamatan)->result();

            $this->load->view('template_superadmin/header', $data);
            $this->load->view('template_superadmin/sidebar', $data);
            $this->load->view('superadmin/dashboard', $data);
            $this->load->view('superadmin/tampil_dataperangkat', $data);
            $this->load->view('template_superadmin/footer');
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
