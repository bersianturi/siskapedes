<?php

class Data_Desa extends CI_Controller
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
        $data['title'] = "Data Desa";
        $data['desa'] = $this->ModelPerangkat->get_desa()->result();
        // $data['kecamatan'] = $this->ModelPerangkat->get_data('kecamatan')->result();

        $this->load->view('template_superadmin/header', $data);
        $this->load->view('template_superadmin/sidebar');
        $this->load->view('superadmin/desa/data_desa', $data);
        $this->load->view('template_superadmin/footer');
    }

    public function tambah_data()
    {
        $data['title'] = "Tambah Data Desa";
        $data['desa'] = $this->ModelPerangkat->get_data('desa')->result();
        $data['kecamatan'] = $this->ModelPerangkat->get_data('kecamatan')->result();

        $this->load->view('template_superadmin/header', $data);
        $this->load->view('template_superadmin/sidebar');
        $this->load->view('superadmin/desa/tambah_dataDesa', $data);
        $this->load->view('template_superadmin/footer');
    }

    public function tambah_data_aksi()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->tambah_data();
        } else {
            $nama_desa                = $this->input->post('nama_desa');
            $alamat                   = $this->input->post('alamat_desa');
            $id_kecamatan             = $this->input->post('id_kecamatan');

            $data = array(
                'nama_desa'         => $nama_desa,
                'alamat_desa'       => $alamat,
                'id_kecamatan'      => $id_kecamatan

            );

            $this->ModelPerangkat->insert_data($data, 'desa');
            $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
				<strong>Data berhasil ditambahkan!</strong>
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
				<span aria-hidden="true">&times;</span>
				</button>
				</div>');
            redirect('superadmin/data_desa');
        }
    }

    public function update_data()
    {
        $id = $this->uri->segment(4);
        $where = array('id_desa' => $id);
        $data['title'] = "Update Data Desa";
        $data['desa'] = $this->ModelPerangkat->get_data('desa')->result();
        $data['desa'] = $this->db->query("SELECT * FROM desa WHERE id_desa='$id'")->result();
        $data['kecamatan'] = $this->ModelPerangkat->get_data('kecamatan')->result();

        $this->load->view('template_superadmin/header', $data);
        $this->load->view('template_superadmin/sidebar');
        $this->load->view('superadmin/desa/update_dataDesa', $data);
        $this->load->view('template_superadmin/footer');
    }

    public function update_data_aksi()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            // $this->update_data();
            $id = $this->input->post('id_desa');
            $where = array('id_desa' => $id);
            $data['title'] = "Update Data Desa";
            $data['desa'] = $this->ModelPerangkat->get_data('desa')->result();
            $data['desa'] = $this->db->query("SELECT * FROM desa WHERE id_desa='$id'")->result();
            $data['kecamatan'] = $this->ModelPerangkat->get_data('kecamatan')->result();

            $this->load->view('template_superadmin/header', $data);
            $this->load->view('template_superadmin/sidebar');
            $this->load->view('superadmin/desa/update_dataDesa', $data);
            $this->load->view('template_superadmin/footer');
        } else {
            $id                 = $this->input->post('id_desa');
            $nama_desa          = $this->input->post('nama_desa');
            $alamat             = $this->input->post('alamat_desa');
            $id_kecamatan       = $this->input->post('id_kecamatan');

            $data = array(
                'id_desa'       => $id,
                'nama_desa'     => $nama_desa,
                'alamat_desa'        => $alamat,
                'id_kecamatan'  => $id_kecamatan

            );

            $where = array(
                'id_desa' => $id

            );

            $this->ModelPerangkat->update_data('desa', $data, $where);
            $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
				<strong>Data berhasil diupdate!</strong>
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
				<span aria-hidden="true">&times;</span>
				</button>
				</div>');
            redirect('superadmin/data_desa');
        }
    }

    public function _rules()
    {
        $this->form_validation->set_rules('nama_desa', 'Nama Desa', 'required');
        $this->form_validation->set_rules('alamat_desa', 'Alamat', 'required');
        $this->form_validation->set_rules('id_kecamatan', 'id_kecamatan', 'required');
    }

    public function delete_data($id)
    {
        $where = array('id_desa' => $id);
        $this->ModelPerangkat->delete_data($where, 'desa');
        $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
				<strong>Data berhasil dihapus!</strong>
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
				<span aria-hidden="true">&times;</span>
				</button>
				</div>');
        redirect('superadmin/data_desa');
    }
}
