<?php

class Data_Diri extends CI_Controller
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

    // public function index()
    // {
    // }

    public function index()
    {
        $data['pendidikan'] = $this->ModelPerangkat->get_data('pendidikan')->result();
        $data['jabatan'] = $this->ModelPerangkat->get_data('jabatan')->result();
        $this->form_validation->set_rules('nama', 'Nama', 'required');
        $this->form_validation->set_rules('nik', 'NIK', 'required|min_length[16]|max_length[16]', [
            'min_length'     => 'NIK harus 16 digit.',
            'max_length'     => 'NIK harus 16 digit.'
        ]);
        $this->form_validation->set_rules('tempat_lahir', 'Tempat Lahir', 'required');
        $this->form_validation->set_message('required', 'Mohon diisi.');
        $this->form_validation->set_error_delimiters('<div class="mt-1 mx-2"><small class="text-danger">', '</small></div>');


        if ($this->form_validation->run() != false) {

            $config['upload_path']         = './photo';
            $config['allowed_types']     = 'jpg|jpeg|png|tiff';
            $config['max_size']            =     2048;
            $config['file_name']        =     'pegawai-' . date('ymd') . '-' . substr(md5(rand()), 0, 10);

            $this->load->library('upload', $config);

            if ($this->upload->do_upload('photo')) {
                if ($this->input->post('old_photo') != 'default.png') {
                    unlink('./photo/' . $this->input->post('old_photo', TRUE));
                }
                $photo = $this->upload->data('file_name');
            } else {
                $photo = $this->input->post('old_photo');
            }

            $data = [
                'id_perangkat' => $this->input->post('id'),
                'nama_perangkat' => $this->input->post('nama'),
                'gelar_depan' => $this->input->post('gelar_depan'),
                'gelar_belakang' => $this->input->post('gelar_belakang'),
                'nik' => $this->input->post('nik'),
                'tempat_lahir' => $this->input->post('tempat_lahir'),
                'tgl_lahir' => $this->input->post('tanggal_lahir'),
                'jenis_kelamin' => $this->input->post('jenis_kelamin'),
                'pendidikan' => $this->input->post('pendidikan'),
                'agama' => $this->input->post('agama'),
                'no_pengangkatan' => $this->input->post('no_pengangkatan'),
                'tgl_pengangkatan' => $this->input->post('tgl_pengangkatan'),
                'no_pengangkatan' => $this->input->post('no_pengangkatan'),
                'no_pemberhentian' => $this->input->post('no_pemberhentian'),
                'tgl_pemberhentian' => $this->input->post('tgl_pemberhentian'),
                'jabatan' => $this->input->post('jabatan'),
                'no_pengangkatan' => $this->input->post('no_pengangkatan'),
                'masa_jabatan' => $this->input->post('masa_jabatan'),
                'status' => $this->input->post('status'),
                'verifikasi_data' => $this->input->post('verifikasi_data'),
                'photo' => $photo,
            ];

            $this->ModelPerangkat->update_data('perangkat_desa', $data, ['id_perangkat' => $this->input->post('id')]);
            $this->session->set_flashdata('message', '<div class="alert alert-success" id="alert-success" role="alert">Data berhasil diubah.</div>');
            redirect('perangkat/Dashboard');
        } else {
            $data['title'] = "Update Data Diri";
            $id = $this->session->userdata('id_perangkat');
            $data['perangkat'] = $this->db->query("SELECT * FROM perangkat_desa WHERE id_perangkat='$id'")->result();

            $this->load->view('template_perangkat/header', $data);
            $this->load->view('template_perangkat/sidebar');
            $this->load->view('perangkat/ubah_data_diri');
            $this->load->view('template_perangkat/footer');
        }
    }
}
