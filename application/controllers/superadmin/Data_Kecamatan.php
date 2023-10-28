<?php

class Data_Kecamatan extends CI_Controller
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
            redirect('login');
        }
    }

    public function index()
    {
        $data['title'] = "Data Kecamatan";
        $data['kecamatan'] = $this->ModelPerangkat->get_data('kecamatan')->result();

        $this->load->view('template_superadmin/header', $data);
        $this->load->view('template_superadmin/sidebar');
        $this->load->view('superadmin/kecamatan/data_kecamatan', $data);
        $this->load->view('template_superadmin/footer');
    }

    public function tambah_data()
    {
        $data['title'] = "Tambah Data Kecamatan";
        $data['kecamatan'] = $this->ModelPerangkat->get_data('kecamatan')->result();

        $this->load->view('template_superadmin/header', $data);
        $this->load->view('template_superadmin/sidebar');
        $this->load->view('superadmin/kecamatan/tambah_dataKecamatan', $data);
        $this->load->view('template_superadmin/footer');
    }

    public function tambah_data_aksi()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->tambah_data();
        } else {
            $nama_kecamatan                = $this->input->post('nama_kecamatan');
            $alamat_kecamatan              = $this->input->post('alamat_kecamatan');

            $data = array(
                'nama_kecamatan'         => $nama_kecamatan,
                'alamat_kecamatan'       => $alamat_kecamatan,

            );

            $this->ModelPerangkat->insert_data($data, 'kecamatan');
            $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
				<strong>Data berhasil ditambahkan!</strong>
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
				<span aria-hidden="true">&times;</span>
				</button>
				</div>');
            redirect('superadmin/data_kecamatan');
        }
    }

    public function update_data()
    {
        $id = $this->uri->segment(4);
        $where = array('id_kecamatan' => $id);
        $data['title'] = "Update Data Kecamatan";
        $data['kecamatan'] = $this->ModelPerangkat->get_data('kecamatan')->result();
        $data['kecamatan'] = $this->db->query("SELECT * FROM kecamatan WHERE id_kecamatan='$id'")->result();

        $this->load->view('template_superadmin/header', $data);
        $this->load->view('template_superadmin/sidebar');
        $this->load->view('superadmin/kecamatan/update_dataKecamatan', $data);
        $this->load->view('template_superadmin/footer');
    }

    public function update_data_aksi()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            // $this->update_data();
            $id = $this->input->post('id_kecamatan');
            $where = array('id_kecamatan' => $id);
            $data['title'] = "Update Data Kecamatan";
            $data['kecamatan'] = $this->ModelPerangkat->get_data('kecamatan')->result();
            $data['kecamatan'] = $this->db->query("SELECT * FROM kecamatan WHERE id_kecamatan='$id'")->result();

            $this->load->view('template_superadmin/header', $data);
            $this->load->view('template_superadmin/sidebar');
            $this->load->view('superadmin/kecamatan/update_dataKecamatan', $data);
            $this->load->view('template_superadmin/footer');
        } else {
            $id                 = $this->input->post('id_kecamatan');
            $nama_kecamatan     = $this->input->post('nama_kecamatan');
            $alamat_kecamatan             = $this->input->post('alamat_kecamatan');

            $data = array(
                'id_kecamatan'       => $id,
                'nama_kecamatan'     => $nama_kecamatan,
                'alamat_kecamatan'   => $alamat_kecamatan,

            );

            $where = array(
                'id_kecamatan' => $id

            );

            $this->ModelPerangkat->update_data('kecamatan', $data, $where);
            $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
				<strong>Data berhasil diupdate!</strong>
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
				<span aria-hidden="true">&times;</span>
				</button>
				</div>');
            redirect('superadmin/data_kecamatan');
        }
    }

    public function _rules()
    {
        $this->form_validation->set_rules('nama_kecamatan', 'Nama Kecamatan', 'required');
        $this->form_validation->set_rules('alamat_kecamatan', 'Alamat', 'required');
    }

    public function delete_data($id)
    {
        $where = array('id_kecamatan' => $id);
        $this->ModelPerangkat->delete_data($where, 'kecamatan');
        $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
				<strong>Data berhasil dihapus!</strong>
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
				<span aria-hidden="true">&times;</span>
				</button>
				</div>');
        redirect('superadmin/data_kecamatan');
    }
}
