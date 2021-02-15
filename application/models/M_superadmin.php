<?php defined('BASEPATH') or exit('No direct script access allowed');

class m_superadmin extends CI_Model
{
	public function getAdmin()
	{
		$query = $this->db->get_where('akun_user', ['role_id' => 2]);
		return $query->result_array();
	}
	public function input_data($table, $data)
	{
		$this->db->insert($table, $data);
	}

	public function addRole($data)
	{
		$this->db->insert('user_role', $data);
	}

	public function updateRole($data, $where)
	{
		$this->db->where($where);
		$this->db->update('user_role', $data);
	}

	public function deleteRole($where)
	{
		$this->db->delete('user_role', $where);
	}
	public function deleteAkunAdmin($where)
	{
		$this->db->delete('akun_user', $where);
	}
}
