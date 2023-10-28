<?php

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class Data_Perangkat extends CI_Controller
{

	public function index()
	{
		$data['desa'] = $this->ModelPerangkat->get_data('desa')->result();
		$data['kecamatan'] = $this->ModelPerangkat->get_data('kecamatan')->result();
		$kecamatan       = $this->input->post('kecamatan');
		$desa     		 = $this->input->post('desa');
		$this->_rules();
		if ($this->form_validation->run() == FALSE) {
			$this->load->view('template_superadmin/header');
			$this->load->view('template_superadmin/sidebar');
			$this->load->view('superadmin/perangkat/data_perangkat', $data);
			$this->load->view('template_superadmin/footer');
		} else {
			// $data['perangkat'] = $this->db->query("SELECT * FROM kecamatan kc, desa ds, perangkat p WHERE kc.id_kecamatan = ds.id_kecamatan AND ds.id_desa = p.id_desa AND text(kecamatan) >= '$kecamatan' AND  text(desa) <= '$desa'")->result();
			$data['perangkat'] = $this->ModelPerangkat->get_perangkat($desa, $kecamatan)->result();

			$this->load->view('template_superadmin/header');
			$this->load->view('template_superadmin/sidebar');
			$this->load->view('superadmin/perangkat/tampil_dataPerangkat', $data);
			$this->load->view('template_superadmin/footer');
		}
	}

	public function export()
	{
		$kecamatan = $this->input->get('kecamatan');
		$desa = $this->input->get('desa');
		$trx = $this->db->query("SELECT desa.id_desa, desa.nama_desa, desa.id_kecamatan, kecamatan.nama_kecamatan FROM desa INNER JOIN kecamatan on desa.id_kecamatan = kecamatan.id_kecamatan")->result();
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

	public function _rules()
	{
		$this->form_validation->set_rules('kecamatan', 'Nama Kecamatan', 'required');
		$this->form_validation->set_rules('desa', 'Nama Desa', 'required');
		$this->form_validation->set_message('required', ' %s tidak boleh kosong.');
		$this->form_validation->set_error_delimiters('<div class="mt-1 mx-2"><small class="text-danger">', '</small></div>');
	}
}
