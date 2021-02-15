<?php defined('BASEPATH') or exit('No direct script access allowed');

class M_user extends CI_Model
{
	public function get_jenisPendaftar()
	{
		$query = $this->db->get('jenis_pendaftar');
		return $query->result_array();
	}
	public function get_prodi()
	{
		$query = $this->db->get('prodi');
		return $query->result_array();
	}
	public function get_institusi()
	{
		$query = $this->db->get('institusi');
		return $query->result_array();
	}
}
