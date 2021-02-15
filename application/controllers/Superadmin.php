<?php
defined('BASEPATH') or exit('No direct script access allowed');

class SuperAdmin extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		is_logged_in();
	}
	public function index()
	{
		$data['title'] = 'Dashboard';
		$data['akun_user'] = $this->db->get_where(
			'akun_user',
			['email' => $this->session->userdata('email')]
		)->row_array();

		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('super_admin/index', $data);
		$this->load->view('templates/footer');
	}
	public function role()
	{
		$data['title'] = 'Role';
		$data['akun_user'] = $this->db->get_where(
			'akun_user',
			['email' => $this->session->userdata('email')]
		)->row_array();

		$data['role'] = $this->db->get('user_role')->result_array();
		$this->form_validation->set_rules('role', 'Role', 'required');

		if ($this->form_validation->run() == false) {

			$this->load->view('templates/header', $data);
			$this->load->view('templates/sidebar', $data);
			$this->load->view('templates/topbar', $data);
			$this->load->view('super_admin/role', $data);
			$this->load->view('templates/footer');
		} else {
			$role = $this->input->post('role');
			$data = ['role' => $role];
			$this->load->model('m_superadmin');

			$this->m_superadmin->addRole($data);

			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
					Role berhasil ditambahkan !
					  </div>');
			redirect('superadmin/role');
		}
	}
	public function roleAccess($role_id)
	{
		$data['title'] = 'Role Access';
		$data['akun_user'] = $this->db->get_where(
			'akun_user',
			['email' => $this->session->userdata('email')]
		)->row_array();

		$data['role'] = $this->db->get_where('user_role', ['id' => $role_id])->row_array();
		$this->db->where('id !=', 1);
		$data['menu'] = $this->db->get('user_menu')->result_array();

		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('super_admin/role-access', $data);
		$this->load->view('templates/footer');
	}
	public function changeAccess()
	{
		$menu_id = $this->input->post('menuId');
		$role_id = $this->input->post('roleId');

		$data = [
			'role_id' => $role_id,
			'menu_id' => $menu_id
		];

		$result = $this->db->get_where('user_access_menu', $data);

		if ($result->num_rows() < 1) {
			$this->db->insert('user_access_menu', $data);
		} else {
			$this->db->delete('user_access_menu', $data);
		}
		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
			Akses Di ubah !
		  </div>');
	}

	public function buatAkunAdmin()
	{
		$data['title'] = 'Buat Akun Admin';
		$data['akun_user'] = $this->db->get_where(
			'akun_user',
			['email' => $this->session->userdata('email')]
		)->row_array();
		$this->load->model('m_superadmin');
		$data['akunAdmin'] = $this->m_superadmin->getAdmin();


		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('super_admin/buatakunadmin', $data);
		$this->load->view('templates/footer');
	}

	public function formCreateAdmin()
	{
		$data['title'] = 'Buat Akun Admin';
		$data['akun_user'] = $this->db->get_where(
			'akun_user',
			['email' => $this->session->userdata('email')]
		)->row_array();

		$this->form_validation->set_rules('nama', 'Nama', 'required|trim');
		$this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[akun_user.email]');
		$this->form_validation->set_rules(
			'password1',
			'Password',
			'required|trim|min_length[6]|matches[password2]',
			[
				'matches' => 'Password tidak cocok!',
				'min_length' => 'Pasword minimal 6 karakter!'
			]
		);
		$this->form_validation->set_rules('password2', 'Password', 'required|trim|matches[password1]');
		$this->form_validation->set_rules('no_hp', 'No Telepon', 'required|trim|is_unique[akun_user.no_hp]');

		if ($this->form_validation->run() == false) {
			$this->load->view('templates/header', $data);
			$this->load->view('templates/sidebar', $data);
			$this->load->view('templates/topbar', $data);
			$this->load->view('super_admin/form-create-admin', $data);
			$this->load->view('templates/footer');
		} else {
			$nama = $this->input->post('nama');
			$email = $this->input->post('email');
			$no_hp = $this->input->post('no_hp');
			$password = password_hash($this->input->post('password1'), PASSWORD_DEFAULT);
			$foto_profil = 'default.png';
			$role_id = 2;
			$is_active = $this->input->post('is_active');
			$date_created = time();

			$data = [
				'nama' => $nama,
				'email' => $email,
				'no_hp' => $no_hp,
				'password' => $password,
				'foto_profil' => $foto_profil,
				'role_id' => $role_id,
				'is_active' => $is_active,
				'date_created' => $date_created
			];

			$this->load->model('m_superadmin');
			$this->m_superadmin->input_data('akun_user', $data);

			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Akun Admin Berhasil Dibuat</div>');
			redirect('superadmin/buatakunadmin');
		}
	}
	public function updateAdmin()
	{
		$nama = $this->input->post('nama');
		$email = $this->input->post('email');
		$no_hp = $this->input->post('no_hp');
		$is_active = $this->input->post('is_active');
		$id = $this->input->post('id');

		$this->db->set('nama', $nama);
		$this->db->set('email', $email);
		$this->db->set('no_hp', $no_hp);
		$this->db->set('is_active', $is_active);
		$this->db->where('id', $id);

		$this->db->update('akun_user');


		// $this->db->where($where);
		// $this->db->update('user_role', $data);

		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
					Role berhasil di ubah !
					  </div>');
		redirect('superadmin/buatakunadmin');
	}
	public function deleteAdmin($id)
	{
		$where = ['id' => $id];
		$this->load->model('m_superadmin');
		$this->m_superadmin->deleteAkunAdmin($where);

		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
					Akun admin berhasil dihapus !
					  </div>');
		redirect('superadmin/buatakunadmin');
	}

	public function updateRole()
	{
		$role = $this->input->post('role');
		$id = $this->input->post('id');

		$data = ['role' => $role];
		$where = ['id' => $id];

		$this->load->model('m_superadmin');
		$this->m_superadmin->updateRole($data, $where);

		// $this->db->where($where);
		// $this->db->update('user_role', $data);

		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
					Role berhasil di ubah !
					  </div>');
		redirect('superadmin/role');
	}
	public function deleteRole($id)
	{
		$where = ['id' => $id];
		$this->load->model('m_superadmin');
		$this->m_superadmin->deleteRole($where);

		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
					Role berhasil dihapus !
					  </div>');
		redirect('superadmin/role');
	}
}
