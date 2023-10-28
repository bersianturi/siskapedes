<?php

class ModelPerangkat extends CI_model
{

	public function get_data($table)
	{
		return $this->db->get($table);
	}

	public function insert_data($data, $table)
	{
		$this->db->insert($table, $data);
	}

	public function update_data($table, $data, $where)
	{
		$this->db->update($table, $data, $where);
	}

	public function delete_data($whare, $table)
	{
		$this->db->where($whare);
		$this->db->delete($table);
	}

	public function verifikasi($whare, $table)
	{
		$this->db->where($whare);
		$this->db->delete($table);
	}
	public function insert_batch($table = null, $data = array())
	{
		$jumlah = count($data);
		if ($jumlah > 0) {
			$this->db->insert_batch($table, $data);
		}
	}

	public function cek_login()
	{
		$nik = set_value('nik');
		$password = set_value('password');

		$result = $this->db->where('nik', $nik)
			->where('password', md5($password))
			->limit(1)
			->get('perangkat_desa');
		if ($result->num_rows() > 0) {
			return $result->row();
		} else {
			return FALSE;
		}
	}

	public function get_desa()
	{
		return $this->db->query('SELECT desa.id_desa,desa.nama_desa,desa.alamat_desa, kecamatan.nama_kecamatan FROM desa INNER JOIN kecamatan on desa.id_kecamatan=kecamatan.id_kecamatan');
	}

	public function get_perangkat($desa, $kecamatan)
	{
		return $this->db->query('SELECT * FROM perangkat_desa INNER JOIN desa on perangkat_desa.id_desa=desa.id_desa WHERE desa.id_desa=' . $desa . ' and desa.id_kecamatan=' . $kecamatan);
	}

	public function get_perangkat_per_jenis_kelamin()
	{
		$query = "SELECT jenis_kelamin, COUNT(jenis_kelamin) as jumlah_perangkat FROM `perangkat_desa` GROUP BY jenis_kelamin;";
		$result = $this->db->query($query)->result();
		return $result;
	}

	public function get_perangkat_per_jabatan()
	{
		$query = "SELECT jabatan, COUNT(jabatan) as jumlah_perangkat FROM `perangkat_desa` GROUP BY jabatan;";
		$result = $this->db->query($query)->result();
		return $result;
	}
}
