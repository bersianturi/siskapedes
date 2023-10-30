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

    public function tambah_data_aksi()
    {
        $this->form_validation->set_rules('nama_perangkat', 'Nama Lengkap', 'required');
        $this->form_validation->set_rules('nik', 'NIK', 'required');
        $this->form_validation->set_rules('tempat_lahir', 'Tempat Lahir', 'required');
        $this->form_validation->set_rules('tgl_lahir', 'Tanggal Lahir', 'required');
        $this->form_validation->set_rules('jenis_kelamin', 'Jenis Kelamin', 'required');
        $this->form_validation->set_rules('pendidikan', 'Pendidikan', 'required');
        $this->form_validation->set_rules('agama', 'Agama', 'required');
        $this->form_validation->set_rules('jabatan', 'Jabatan', 'required');
        $this->form_validation->set_rules('status', 'Status', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');
        $this->form_validation->set_rules('hak_akses', 'Hak Akses', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->tambah_data();
        } else {
            $nama                = $this->input->post('nama_perangkat');
            $gelar_depan        = $this->input->post('gelar_depan');
            $gelar_belakang        = $this->input->post('gelar_belakang');
            $nik                = $this->input->post('nik');
            $tempat_lahir        = $this->input->post('tempat_lahir');
            $tgl_lahir            = $this->input->post('tgl_lahir');
            $jenis_kelamin        = $this->input->post('jenis_kelamin');
            $agama                = $this->input->post('agama');
            $pendidikan            = $this->input->post('pendidikan');
            $pangkat            = $this->input->post('pangkat');
            $no_pengangkatan    = $this->input->post('no_pengangkatan');
            $tgl_pengangkatan    = $this->input->post('tgl_pengangkatan');
            $no_pemberhentian    = $this->input->post('no_pemberhentian');
            $tgl_pemberhentian    = $this->input->post('tgl_pemberhentian');
            $jabatan            = $this->input->post('jabatan');
            $masa_jabatan        = $this->input->post('masa_jabatan');
            $status                = $this->input->post('status');
            $password            = md5($this->input->post('password'));
            $hak_akses            = $this->input->post('hak_akses');

            $config['upload_path']         = './photo';
            $config['allowed_types']     = 'jpg|jpeg|png|tiff';
            $config['max_size']            =     2048;
            $config['file_name']        =     'pegawai-' . date('ymd') . '-' . substr(md5(rand()), 0, 10);

            $this->load->library('upload', $config);

            if ($this->upload->do_upload('photo')) {
                $photo = $this->upload->data('file_name');
            } else {
                $photo = 'default.png';
            }


            $data = array(
                'nama_perangkat'         => $nama,
                'gelar_depan'             => $gelar_depan,
                'gelar_belakang'         => $gelar_belakang,
                'nik'                     => $nik,
                'tempat_lahir'             => $tempat_lahir,
                'tgl_lahir'             => $tgl_lahir,
                'jenis_kelamin'            => $jenis_kelamin,
                'agama'                 => $agama,
                'pendidikan'             => $pendidikan,
                'pangkat'                 => $pangkat,
                'no_pengangkatan'         => $no_pengangkatan,
                'tgl_pengangkatan'         => $tgl_pengangkatan,
                'no_pemberhentian'         => $no_pemberhentian,
                'tgl_pemberhentian'     => $tgl_pemberhentian,
                'jabatan'                 => $jabatan,
                'masa_jabatan'             => $masa_jabatan,
                'status'                 => $status,
                'password'                 => $password,
                'hak_akses'             => $hak_akses,
                'photo'                 => $photo,
                'verifikasi_data' => 'disetujui'
            );

            $this->ModelPerangkat->insert_data($data, 'perangkat_desa');
            $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
				<strong>Data berhasil ditambahkan!</strong>
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
				<span aria-hidden="true">&times;</span>
				</button>
				</div>');
            redirect('dinpermasdes/data_perangkat');
        }
    }

    public function export()
    {
        $kecamatan = $this->input->get('kecamatan');
        $desa = $this->input->get('desa');
        $trx = $this->db->query("SELECT * FROM kecamatan kc, desa ds, perangkat p WHERE kc.id_kecamatan = ds.id_kecamatan AND ds.id_desa = p.id_desa AND text(kecamatan) >= '$kecamatan' AND  text(desa) <= '$desa'")->result();
        $spreadsheet = new Spreadsheet;

        $spreadsheet->setActiveSheetIndex(0)
            ->setCellValue('A1', 'No')
            ->setCellValue('B1', 'Nama Perangkat')
            ->setCellValue('C1', 'Gelar Depan')
            ->setCellValue('D1', 'Gelar Belakang')
            ->setCellValue('E1', 'NIK')
            ->setCellValue('F1', 'Tempat Lahir')
            ->setCellValue('G1', 'Tanggal Lahir')
            ->setCellValue('H1', 'Jenis Kelamin')
            ->setCellValue('I1', 'Agama')
            ->setCellValue('J1', 'Pendidikan')
            ->setCellValue('K1', 'Pangkat/Golongan')
            ->setCellValue('L1', 'Nomor Pengangkatan')
            ->setCellValue('M1', 'Tanggal Pengangkatan')
            ->setCellValue('N1', 'Nomor Pemberhentian')
            ->setCellValue('O1', 'Tanggal Pemberhentian')
            ->setCellValue('P1', 'Jabatan')
            ->setCellValue('Q1', 'Masa Jabatan')
            ->setCellValue('R1', 'Status');

        $row = 2;
        $nomor = 1;
        $perangkat = $this->ModelPerangkat->get_data('perangkat_desa')->result();

        foreach ($perangkat as $p) {
            $spreadsheet->setActiveSheetIndex(0)
                ->setCellValue('A' . $row, $nomor)
                ->setCellValue('B' . $row, $p->nama_perangkat)
                ->setCellValue('C' . $row, $p->gelar_depan)
                ->setCellValue('D' . $row, $p->gelar_belakang)
                ->setCellValue('E' . $row, $p->nik)
                ->setCellValue('F' . $row, $p->tempat_lahir)
                ->setCellValue('G' . $row, date('d-m-Y', strtotime($p->tgl_lahir)))
                ->setCellValue('H' . $row, $p->jenis_kelamin)
                ->setCellValue('I' . $row, $p->agama)
                ->setCellValue('J' . $row, $p->pendidikan)
                ->setCellValue('K' . $row, $p->pangkat)
                ->setCellValue('L' . $row, ($p->no_pengangkatan == '0') ? '' : $p->no_pengangkatan)
                ->setCellValue('M' . $row, ($p->tgl_pengangkatan == '0000-00-00') ? '' : date('d-m-Y', strtotime($p->tgl_pengangkatan)))
                ->setCellValue('N' . $row, ($p->no_pemberhentian == '0') ? '' : $p->no_pemberhentian)
                ->setCellValue('O' . $row, ($p->tgl_pemberhentian == '0000-00-00') ? '' : date('d-m-Y', strtotime($p->tgl_pemberhentian)))
                ->setCellValue('P' . $row, $p->jabatan)
                ->setCellValue('Q' . $row, $p->masa_jabatan)
                ->setCellValue('R' . $row, $p->status)
                ->getStyle('E')
                ->getNumberFormat()
                ->setFormatCode(PhpOffice\PhpSpreadsheet\Style\NumberFormat::FORMAT_NUMBER);
            $row++;
            $nomor++;
        }

        $writer = new Xlsx($spreadsheet);

        header('Content-Type: application/vnd.ms-excel');
        header('Content-Disposition: attachment;filename="Data Perangkat ' . date("j F Y") . '.xlsx"');
        header('Cache-Control: max-age=0');

        $writer->save('php://output');
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
