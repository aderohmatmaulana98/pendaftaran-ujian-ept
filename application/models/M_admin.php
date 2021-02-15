<?php defined('BASEPATH') or exit('No direct script access allowed');

class M_admin extends CI_Model
{
	public function edit_kelas()
	{

		$sql1 = "UPDATE kelas
				SET kelas.status_kelas = 'Penuh'
				WHERE kelas.sisa_kuota = 0";
		$data['kelas1'] = $this->db->query($sql1);
	}
	public function tutup()
	{
		$sql = "UPDATE kelas
				SET kelas.status_kelas = 'Tutup'
				WHERE kelas.tanggal_ujian <= NOW()";
		$data['kelas'] = $this->db->query($sql);
	}
	public function hapus_kelas($where)
	{
		$this->db->where($where);
		$this->db->delete('kelas');
	}
	public function getTarif()
	{
		$query = "SELECT `tarif`.*, `jenis_pendaftar`.`nama_jenis`
				FROM `tarif` JOIN `jenis_pendaftar`
				ON `tarif`.`id_jenis` = `jenis_pendaftar`.`id`
				";
		return $this->db->query($query)->result_array();
	}
	// public function edit_tarif($data, $where)
	// {
	// 	$this->db->where($where);
	// 	$this->db->update('tarif', $data);
	// }
	public function hapus_tarif($where)
	{
		$this->db->where($where);
		$this->db->delete('tarif');
	}
	public function hapusBayar($where)
	{
		$this->db->where($where);
		$this->db->delete('peserta');
	}
	public function hapus_jenisPendaftar($where)
	{
		$this->db->where($where);
		$this->db->delete('jenis_pendaftar');
	}
}
