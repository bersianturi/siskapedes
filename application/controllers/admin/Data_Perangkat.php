<?php

class Data_Perangkat extends CI_Controller
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
			redirect('login/logout');
		}
	}

	public function index()
	{
		$data['title'] = "Data Perangkat Desa";
		$data['pegawai'] = $this->ModelPerangkat->get_data('perangkat_desa')->result();

		$this->load->view('template_admin/header', $data);
		$this->load->view('template_admin/sidebar');
		$this->load->view('admin/perangkat/data_perangkat', $data);
		$this->load->view('template_admin/footer');
	}

	public function tambah_data()
	{
		$data['title'] = "Tambah Data Perangkat Desa";
		$data['jabatan'] = $this->ModelPerangkat->get_data('jabatan')->result();
		$data['pendidikan'] = $this->ModelPerangkat->get_data('pendidikan')->result();
		$data['hak_akses'] = $this->ModelPerangkat->get_data('hak_akses')->result();

		$this->load->view('template_admin/header', $data);
		$this->load->view('template_admin/sidebar');
		$this->load->view('admin/perangkat/tambah_dataPerangkat', $data);
		$this->load->view('template_admin/footer');
	}

	public function tambah_data_aksi()
	{
		$this->_rules();

		if ($this->form_validation->run() == FALSE) {
			$this->tambah_data();
		} else {
			$nama				= $this->input->post('nama_perangkat');
			$gelar_depan		= $this->input->post('gelar_depan');
			$gelar_belakang		= $this->input->post('gelar_belakang');
			$nik				= $this->input->post('nik');
			$tempat_lahir		= $this->input->post('tempat_lahir');
			$tgl_lahir			= $this->input->post('tgl_lahir');
			$jenis_kelamin		= $this->input->post('jenis_kelamin');
			$agama				= $this->input->post('agama');
			$pendidikan			= $this->input->post('pendidikan');
			$pangkat			= $this->input->post('pangkat');
			$no_pengangkatan	= $this->input->post('no_pengangkatan');
			$tgl_pengangkatan	= $this->input->post('tgl_pengangkatan');
			$no_pemberhentian	= $this->input->post('no_pemberhentian');
			$tgl_pemberhentian	= $this->input->post('tgl_pemberhentian');
			$jabatan			= $this->input->post('jabatan');
			$masa_jabatan		= $this->input->post('masa_jabatan');
			$status				= $this->input->post('status');
			$password			= md5($this->input->post('password'));
			$hak_akses			= $this->input->post('hak_akses');

			$config['upload_path'] 		= './photo';
			$config['allowed_types'] 	= 'jpg|jpeg|png|tiff';
			$config['max_size']			= 	2048;
			$config['file_name']		= 	'pegawai-' . date('ymd') . '-' . substr(md5(rand()), 0, 10);

			$this->load->library('upload', $config);

			if ($this->upload->do_upload('photo')) {
				$photo = $this->upload->data('file_name');
			} else {
				$photo = 'default.png';
			}

			$data = array(
				'nama_perangkat' 		=> $nama,
				'gelar_depan' 			=> $gelar_depan,
				'gelar_belakang' 		=> $gelar_belakang,
				'nik' 					=> $nik,
				'tempat_lahir' 			=> $tempat_lahir,
				'tgl_lahir' 			=> $tgl_lahir,
				'jenis_kelamin'			=> $jenis_kelamin,
				'agama' 				=> $agama,
				'pendidikan' 			=> $pendidikan,
				'pangkat' 				=> $pangkat,
				'no_pengangkatan' 		=> $no_pengangkatan,
				'tgl_pengangkatan' 		=> $tgl_pengangkatan,
				'no_pemberhentian' 		=> $no_pemberhentian,
				'tgl_pemberhentian' 	=> $tgl_pemberhentian,
				'jabatan' 				=> $jabatan,
				'masa_jabatan' 			=> $masa_jabatan,
				'status' 				=> $status,
				'password' 				=> $password,
				'hak_akses' 			=> $hak_akses,
				'photo' 				=> $photo,
				'verifikasi_data' => 'disetujui'
			);

			$this->ModelPerangkat->insert_data($data, 'perangkat_desa');
			$this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
				<strong>Data berhasil ditambahkan!</strong>
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
				<span aria-hidden="true">&times;</span>
				</button>
				</div>');
			redirect('admin/data_perangkat');
		}
	}

	public function update_data()
	{
		$id = $this->uri->segment(4);
		$where = array('id_perangkat' => $id);
		$data['title'] = "Update Data Perangkat";
		$data['perangkat'] = $this->ModelPerangkat->get_data('perangkat_desa')->result();
		$data['jabatan'] = $this->ModelPerangkat->get_data('jabatan')->result();
		$data['pendidikan'] = $this->ModelPerangkat->get_data('pendidikan')->result();
		$data['hak_akses'] = $this->ModelPerangkat->get_data('hak_akses')->result();

		$data['perangkat'] = $this->db->query("SELECT * FROM perangkat_desa WHERE id_perangkat='$id'")->result();

		$this->load->view('template_admin/header', $data);
		$this->load->view('template_admin/sidebar');
		$this->load->view('admin/perangkat/update_dataPerangkat', $data);
		$this->load->view('template_admin/footer');
	}

	public function update_data_aksi()
	{
		$this->_rules();

		if ($this->form_validation->run() == FALSE) {
			// $this->update_data();
			$id = $this->input->post('id_perangkat');
			$where = array('id_perangkat' => $id);
			$data['title'] = "Update Data Perangkat";
			$data['perangkat'] = $this->ModelPerangkat->get_data('perangkat_desa')->result();
			$data['perangkat'] = $this->db->query("SELECT * FROM perangkat_desa WHERE id_perangkat='$id'")->result();
			$data['jabatan'] = $this->ModelPerangkat->get_data('jabatan')->result();
			$data['hak_akses'] = $this->ModelPerangkat->get_data('hak_akses')->result();

			$this->load->view('template_admin/header', $data);
			$this->load->view('template_admin/sidebar');
			$this->load->view('admin/perangkat/update_dataPerangkat', $data);
			$this->load->view('template_admin/footer');
		} else {
			$id 				= $this->input->post('id_perangkat');
			$nama				= $this->input->post('nama_perangkat');
			$gelar_depan		= $this->input->post('gelar_depan');
			$gelar_belakang		= $this->input->post('gelar_belakang');
			$nik				= $this->input->post('nik');
			$tempat_lahir		= $this->input->post('tempat_lahir');
			$tgl_lahir			= $this->input->post('tgl_lahir');
			$jenis_kelamin		= $this->input->post('jenis_kelamin');
			$agama				= $this->input->post('agama');
			$pendidikan			= $this->input->post('pendidikan');
			$pangkat			= $this->input->post('pangkat');
			$no_pengangkatan	= $this->input->post('no_pengangkatan');
			$tgl_pengangkatan	= $this->input->post('tgl_pengangkatan');
			$no_pemberhentian	= $this->input->post('no_pemberhentian');
			$tgl_pemberhentian	= $this->input->post('tgl_pemberhentian');
			$jabatan			= $this->input->post('jabatan');
			$masa_jabatan		= $this->input->post('masa_jabatan');
			$status				= $this->input->post('status');
			$hak_akses			= $this->input->post('hak_akses');

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

			$data = array(
				'nama_perangkat' 		=> $nama,
				'gelar_depan' 			=> $gelar_depan,
				'gelar_belakang' 		=> $gelar_belakang,
				'nik' 					=> $nik,
				'tempat_lahir' 			=> $tempat_lahir,
				'tgl_lahir' 			=> $tgl_lahir,
				'jenis_kelamin'			=> $jenis_kelamin,
				'agama' 				=> $agama,
				'pendidikan' 			=> $pendidikan,
				'pangkat' 				=> $pangkat,
				'no_pengangkatan' 		=> $no_pengangkatan,
				'tgl_pengangkatan' 		=> $tgl_pengangkatan,
				'no_pemberhentian' 		=> $no_pemberhentian,
				'tgl_pemberhentian' 	=> $tgl_pemberhentian,
				'jabatan' 				=> $jabatan,
				'masa_jabatan' 			=> $masa_jabatan,
				'status' 				=> $status,
				'hak_akses' 			=> $hak_akses,
				'photo' 				=> $photo
			);

			$data_perangkat = array(
				'nama_perangkat' 		=> $nama,
				'gelar_depan' 			=> $gelar_depan,
				'gelar_belakang' 		=> $gelar_belakang,
				'nik' 					=> $nik,
				'tempat_lahir' 			=> $tempat_lahir,
				'tgl_lahir' 			=> $tgl_lahir,
				'jenis_kelamin'			=> $jenis_kelamin,
				'agama' 				=> $agama,
				'pendidikan' 			=> $pendidikan,
				'pangkat' 				=> $pangkat,
				'no_pengangkatan' 		=> $no_pengangkatan,
				'tgl_pengangkatan' 		=> $tgl_pengangkatan,
				'no_pemberhentian' 		=> $no_pemberhentian,
				'tgl_pemberhentian' 	=> $tgl_pemberhentian,
				'jabatan' 				=> $jabatan,
				'masa_jabatan' 			=> $masa_jabatan,
				'status' 				=> $status,
				'hak_akses' 			=> $hak_akses,
				'verifikasi_data'		=> "belum_disetujui",

				'photo' 				=> $photo
			);

			$where = array(
				'id_perangkat' => $id

			);

			if ($this->session->userdata('hak_akses') != '3') {
				$this->ModelPerangkat->update_data('perangkat_desa', $data_perangkat, $where);
			} else {
				$this->ModelPerangkat->update_data('perangkat_desa', $data, $where);
			}
			$this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
				<strong>Data berhasil diupdate!</strong>
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
				<span aria-hidden="true">&times;</span>
				</button>
				</div>');
			redirect('admin/data_perangkat');
		}
	}

	public function ganti_password()
	{
		$data['title'] = "Form Ganti Password";
		$data['id'] = $this->uri->segment(4);

		$this->load->view('template_admin/header', $data);
		$this->load->view('template_admin/sidebar');
		$this->load->view('admin/perangkat/ganti_password', $data);
		$this->load->view('template_admin/footer');
	}

	public function ganti_password_aksi()
	{
		$passBaru = $this->input->post('passBaru');
		$ulangPass = $this->input->post('ulangPass');

		$this->form_validation->set_rules('passBaru', 'password baru', 'required|matches[ulangPass]');
		$this->form_validation->set_rules('passBaru', 'ulangi password baru', 'required');

		if ($this->form_validation->run() != FALSE) {
			$data = array('password' => md5($passBaru));
			$id = array('id_perangkat' => $this->input->post('id'));
			$this->ModelPerangkat->update_data('perangkat_desa', $data, $id);
			$this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
				<strong>Password berhasil diganti!</strong>
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
				<span aria-hidden="true">&times;</span>
				</button>
				</div>');
			redirect('admin/data_perangkat');
		} else {
			$data['title'] = "Form Ganti Password";

			$this->load->view('template_admin/header', $data);
			$this->load->view('template_admin/sidebar');
			$this->load->view('admin/ganti_password', $data);
			$this->load->view('template_admin/footer');
		}
	}

	public function _rules()
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
	}

	public function delete_data($id)
	{
		$where = array('id_perangkat' => $id);
		$this->ModelPerangkat->delete_data($where, 'perangkat_desa');
		$this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
				<strong>Data berhasil dihapus!</strong>
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
				<span aria-hidden="true">&times;</span>
				</button>
				</div>');
		redirect('admin/data_perangkat');
	}

	public function verifikasi()
	{
		$id = $this->uri->segment(4);
		$where = array('id_perangkat' => $id);
		//$data['title'] = "Update Data Perangkat";
		$data['perangkat'] = $this->ModelPerangkat->get_data('perangkat_desa')->result();
		$data['perangkat'] = $this->Model_Perangkat->get_data('verifikasi_data')->result();
		//$data['jabatan'] = $this->ModelPerangkat->get_data('jabatan')->result();
		$data['perangkat'] = $this->db->query("SELECT * FROM perangkat_desa WHERE id_perangkat='$id'")->result();

		$this->load->view('template_admin/header', $data);
		$this->load->view('template_admin/sidebar');
		$this->load->view('admin/perangkat/data_perangkat', $data);
		$this->load->view('template_admin/footer');
	}

	public function update_verifikasi_disetujui()
	{
		$this->_rules();
		$id = $this->uri->segment(4);
		$verifikasi_data	= "disetujui";

		$data = array(
			'verifikasi_data' => $verifikasi_data,
		);

		$where = array(
			'id_perangkat' => $id

		);

		$this->ModelPerangkat->update_data('perangkat_desa', $data, $where);
		$this->session->set_flashdata('pesan', '<div class="alert alert-success fade show" role="alert">
			<strong>Data Telah Disetujui!</strong>
			</div>');
		redirect('admin/data_perangkat');
	}

	public function update_verifikasi_ditolak()
	{
		$this->_rules();
		$id = $this->uri->segment(4);
		$verifikasi_data	= "ditolak";

		$data = array(
			'verifikasi_data' => $verifikasi_data,
		);

		$where = array(
			'id_perangkat' => $id

		);

		$this->ModelPerangkat->update_data('perangkat_desa', $data, $where);
		$this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
			<strong>Data ditolak!</strong>
			</div>');
		redirect('admin/data_perangkat');
	}
}
