<?php

class Ganti_Password extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();

        if ($this->session->userdata('hak_akses') != '3') {
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
        $data['title'] = "Form Ganti Password";

        $this->load->view('template_perangkat/header', $data);
        $this->load->view('template_perangkat/sidebar');
        $this->load->view('perangkat/ganti_password', $data);
        $this->load->view('template_perangkat/footer');
    }

    public function ganti_password_aksi()
    {
        $passBaru = $this->input->post('passBaru');
        $ulangPass = $this->input->post('ulangPass');

        $this->form_validation->set_rules('passBaru', 'password baru', 'required|matches[ulangPass]');
        $this->form_validation->set_rules('passBaru', 'ulangi password baru', 'required');

        if ($this->form_validation->run() != FALSE) {
            $data = array('password' => md5($passBaru));
            $id = array('id_perangkat' => $this->session->userdata('id_perangkat'));
            $this->ModelPerangkat->update_data('perangkat_desa', $data, $id);
            $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
				<strong>Password berhasil diganti!</strong>
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
				<span aria-hidden="true">&times;</span>
				</button>
				</div>');
            redirect('login');
        } else {
            $data['title'] = "Form Ganti Password";

            $this->load->view('template_perangkat/header', $data);
            $this->load->view('template_perangkat/sidebar');
            $this->load->view('perangkat/ganti_password', $data);
            $this->load->view('template_perangkat/footer');
        }
    }
}
