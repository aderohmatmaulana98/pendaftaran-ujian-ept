<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Menu extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		is_logged_in();
	}
	public function index()
	{
		$data['title'] = 'Menu Management';
		$data['akun_user'] = $this->db->get_where(
			'akun_user',
			['email' => $this->session->userdata('email')]
		)->row_array();
		$this->load->model('m_menu');
		$data['menu'] = $this->m_menu->tampilMenu();

		$this->form_validation->set_rules('menu', 'Menu', 'required');

		if ($this->form_validation->run() == false) {

			$this->load->view('templates/header', $data);
			$this->load->view('templates/sidebar', $data);
			$this->load->view('templates/topbar', $data);
			$this->load->view('menu/index', $data);
			$this->load->view('templates/footer');
		} else {
			$this->db->insert('user_menu', ['menu' => $this->input->post('menu')]);
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> Menu berhasil ditambahan ! </div>');
			redirect('menu');
		}
	}
	public function submenu()
	{
		$data['title'] = 'Submenu Management';
		$data['akun_user'] = $this->db->get_where('akun_user', ['email' => $this->session->userdata('email')])->row_array();
		$this->load->model('m_menu');
		$data['subMenu'] = $this->m_menu->getSubMenu();
		$data['menu'] = $this->db->get('user_menu')->result_array();

		$this->form_validation->set_rules('title', 'Title', 'required');
		$this->form_validation->set_rules('menu_id', 'Menu', 'required');
		$this->form_validation->set_rules('url', 'Url', 'required');
		$this->form_validation->set_rules('icon', 'Icon', 'required');

		if ($this->form_validation->run() == false) {
			$this->load->view('templates/header', $data);
			$this->load->view('templates/sidebar', $data);
			$this->load->view('templates/topbar', $data);
			$this->load->view('menu/submenu', $data);
			$this->load->view('templates/footer');
		} else {
			$this->db->insert('user_sub_menu', [
				'title' => $this->input->post('title'),
				'menu_id' => $this->input->post('menu_id'),
				'url' => $this->input->post('url'),
				'icon' => $this->input->post('icon'),
				'is_active' => $this->input->post('is_active')

			]);
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> SubMenu berhasil ditambahan ! </div>');
			redirect('menu/submenu');
		}
	}
	public function editMenu()
	{
		$menu = $this->input->post('menu');
		$id = $this->input->post('id');

		$data = ['menu' => $menu];
		$where = ['id' => $id];

		$this->load->model('m_menu');

		$this->m_menu->update_data($where, $data);

		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
					menu berhasil di ubah !
					  </div>');
		redirect('menu');
	}

	public function hapus($id)
	{
		$where = ['id' => $id];
		$this->load->model('m_menu');
		$this->m_menu->hapus_data($where, 'user_menu');
		redirect('menu');
	}

	public function editSub()
	{
		$this->load->model('m_menu');
		$data['editSub'] = $this->m_menu->getSubMenu();
		$title = $this->input->post('title');
		$id = $this->input->post('id');
		$menu_id = $this->input->post('menu_id');
		$url = $this->input->post('url');
		$icon = $this->input->post('icon');
		$is_active = $this->input->post('is_active');


		$data = [
			'title' => $title,
			'menu_id' => $menu_id,
			'url' => $url,
			'icon' => $icon,
			'is_active' => $is_active
		];
		$where = ['id' => $id];

		$this->m_menu->editSub($where, $data);

		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
					Submenu berhasil di ubah !
					  </div>');
		redirect('menu/submenu');
	}

	public function hapus_sub($id)
	{
		$this->load->model('m_menu');
		$where = ['id' => $id];
		$this->m_menu->hapus_sub($where, 'user_sub_menu');
		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
					Submenu berhasil dihapus !
					  </div>');
		redirect('menu/submenu');
	}
}
