<?php

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class Data_Perangkat extends CI_Controller
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
        $data['desa'] = $this->ModelPerangkat->get_data('desa')->result();
        $data['kecamatan'] = $this->ModelPerangkat->get_data('kecamatan')->result();
        $data['title'] = "Data Perangkat";
        $data['hak_akses'] = $this->ModelPerangkat->get_data('hak_akses')->result();

        $kecamatan       = $this->input->post('kecamatan');
        $desa              = $this->input->post('desa');
        $this->_rules();
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('template_dinpermasdes/header', $data);
            $this->load->view('template_dinpermasdes/sidebar');
            $this->load->view('dinpermasdes/perangkat/data_perangkat', $data);
            $this->load->view('template_dinpermasdes/footer');
        } else {
            // $data['perangkat'] = $this->db->query("SELECT * FROM kecamatan kc, desa ds, perangkat p WHERE kc.id_kecamatan = ds.id_kecamatan AND ds.id_desa = p.id_desa AND text(kecamatan) >= '$kecamatan' AND  text(desa) <= '$desa'")->result();
            $data['perangkat'] = $this->ModelPerangkat->get_perangkat($desa, $kecamatan)->result();

            $this->load->view('template_dinpermasdes/header', $data);
            $this->load->view('template_dinpermasdes/sidebar');
            $this->load->view('dinpermasdes/perangkat/tampil_dataPerangkat', $data);
            $this->load->view('template_dinpermasdes/footer');
        }
    }

    public function tambah_data()
    {
        $data['title'] = "Tambah Data Perangkat Desa";
        $data['jabatan'] = $this->ModelPerangkat->get_data('jabatan')->result();
        $data['pendidikan'] = $this->ModelPerangkat->get_data('pendidikan')->result();
        $data['hak_akses'] = $this->ModelPerangkat->get_data('hak_akses')->result();

        $this->load->view('template_dinpermasdes/header', $data);
        $this->load->view('template_dinpermasdes/sidebar');
        $this->load->view('dinpermasdes/perangkat/tambah_dataPerangkat', $data);
        $this->load->view('template_dinpermasdes/footer');
    }

    public function get_desa()
    {
        $id_kecamatan = $this->input->post('id_kecamatan');
        $data = $this->db->query('SELECT * FROM desa WHERE id_kecamatan = ' . $id_kecamatan)->result();
        echo json_encode($data);
    }

    public function _rules()
    {
        $this->form_validation->set_rules('kecamatan', 'Nama Kecamatan', 'required');
        $this->form_validation->set_rules('desa', 'Nama Desa', 'required');
        $this->form_validation->set_message('required', ' %s tidak boleh kosong.');
        $this->form_validation->set_error_delimiters('<div class="mt-1 mx-2"><small class="text-danger">', '</small></div>');
    }
}
