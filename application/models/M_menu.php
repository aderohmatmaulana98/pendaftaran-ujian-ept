<?php defined('BASEPATH') or exit('No direct script access allowed');

class m_menu extends CI_Model
{
	public function tampilMenu()
	{
		$query = $this->db->get('user_menu');
		return $query->result_array();
	}

	public function getSubMenu()
	{
		$query = "SELECT `user_sub_menu`.*, `user_menu`.`menu`
				FROM `user_sub_menu` JOIN `user_menu`
				ON `user_sub_menu`.`menu_id` = `user_menu`.`id`
				";
		return $this->db->query($query)->result_array();
	}

	public function update_data($where, $data)
	{
		$this->db->where($where);
		$this->db->update('user_menu', $data);
	}
	public function hapus_data($where)
	{
		$this->db->where($where);
		$this->db->delete('user_menu');
	}

	public function editSub($where, $data)
	{
		$this->db->where($where);
		$this->db->update('user_sub_menu', $data);
	}

	public function hapus_sub($where)
	{
		$this->db->where($where);
		$this->db->delete('user_sub_menu');
	}
}
