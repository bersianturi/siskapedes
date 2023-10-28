<?php

class Data_Jabatan extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();

        if ($this->session->userdata('hak_akses') != '1') {
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
        $data['title'] = "Data Jabatan";
        $data['jabatan'] = $this->ModelPerangkat->get_data('jabatan')->result();

        $this->load->view('template_admin/header', $data);
        $this->load->view('template_admin/sidebar');
        $this->load->view('admin/jabatan/data_jabatan', $data);
        $this->load->view('template_admin/footer');
    }

    public function tambah_data()
    {
        $data['title'] = "Tambah Data Jabatan";
        $data['jabatan'] = $this->ModelPerangkat->get_data('jabatan')->result();

        $this->load->view('template_admin/header', $data);
        $this->load->view('template_admin/sidebar');
        $this->load->view('admin/jabatan/tambah_dataJabatan', $data);
        $this->load->view('template_admin/footer');
    }

    public function tambah_data_aksi()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->tambah_data();
        } else {
            $nama_jabatan                = $this->input->post('nama_jabatan');

            $data = array(
                'nama_jabatan'         => $nama_jabatan,
            );

            $this->ModelPerangkat->insert_data($data, 'jabatan');
            $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
				<strong>Data berhasil ditambahkan!</strong>
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
				<span aria-hidden="true">&times;</span>
				</button>
				</div>');
            redirect('admin/data_jabatan');
        }
    }

    public function update_data()
    {
        $id = $this->uri->segment(4);
        $where = array('id_jabatan' => $id);
        $data['title'] = "Update Data Jabatan";
        $data['jabatan'] = $this->ModelPerangkat->get_data('jabatan')->result();
        $data['jabatan'] = $this->db->query("SELECT * FROM jabatan WHERE id_jabatan='$id'")->result();

        $this->load->view('template_admin/header', $data);
        $this->load->view('template_admin/sidebar');
        $this->load->view('admin/jabatan/update_dataJabatan', $data);
        $this->load->view('template_admin/footer');
    }

    public function update_data_aksi()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            // $this->update_data();
            $id = $this->input->post('id_jabatan');
            $where = array('id_jabatan' => $id);
            $data['title'] = "Update Data Jabatan";
            $data['jabatan'] = $this->ModelPerangkat->get_data('jabatan')->result();
            $data['jabatan'] = $this->db->query("SELECT * FROM jabatan WHERE id_jabatan='$id'")->result();

            $this->load->view('template_admin/header', $data);
            $this->load->view('template_admin/sidebar');
            $this->load->view('admin/jabatan/update_dataJabatan', $data);
            $this->load->view('template_admin/footer');
        } else {
            $id                 = $this->input->post('id_jabatan');
            $nama_jabatan       = $this->input->post('nama_jabatan');

            $data = array(
                'id_jabatan'       => $id,
                'nama_jabatan'     => $nama_jabatan,

            );

            $where = array(
                'id_jabatan' => $id

            );

            $this->ModelPerangkat->update_data('jabatan', $data, $where);
            $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
				<strong>Data berhasil diupdate!</strong>
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
				<span aria-hidden="true">&times;</span>
				</button>
				</div>');
            redirect('admin/data_jabatan');
        }
    }

    public function _rules()
    {
        $this->form_validation->set_rules('nama_jabatan', 'Nama Jabatan', 'required');
    }

    public function delete_data($id)
    {
        $where = array('id_jabatan' => $id);
        $this->ModelPerangkat->delete_data($where, 'jabatan');
        $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
				<strong>Data berhasil dihapus!</strong>
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
				<span aria-hidden="true">&times;</span>
				</button>
				</div>');
        redirect('admin/data_jabatan');
    }
}
