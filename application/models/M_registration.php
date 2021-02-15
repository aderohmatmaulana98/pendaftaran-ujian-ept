<?php defined('BASEPATH') or exit('No direct script access allowed');

class m_registration extends CI_Model
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
	public function input_data($data, $table, $user_token)
	{
		$this->db->insert($table, $data);
		$this->db->insert('user_token', $user_token);
	}
}
