<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		is_logged_in();
	}
	public function index()
	{
		$data['title'] = 'My Profile';
		$data['akun_user'] = $this->db->get_where(
			'akun_user',
			['email' => $this->session->userdata('email')]
		)->row_array();
		// $no_identitas = $this->input->post('riwayat');
		// $status = 'Terverifikasi';

		// $query = "SELECT  akun_user.`nama`,kelas.`nama_kelas`, kelas.`tanggal_ujian`
		// 	FROM akun_user, kelas, boking_kelas, peserta
		// 	WHERE akun_user.`id`= peserta.`id_akun_user`
		// 	AND kelas.`id`= boking_kelas.`id_kelas`
		// 	AND akun_user.`id`=boking_kelas.`id_akun_user`
		// 	AND peserta.`id_boking`=boking_kelas.`id`
		// 	AND akun_user.`no_identitas`= '$no_identitas'
		// 	AND peserta.`status`= '$status'";
		// $data['riwayat'] = $this->db->query($query)->result_array();

		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('user/index', $data);
		$this->load->view('templates/footer');
	}
	public function edit()
	{
		$data['title'] = 'Edit Profile';
		$data['akun_user'] = $this->db->get_where(
			'akun_user',
			['email' => $this->session->userdata('email')]
		)->row_array();

		$this->load->model('M_user');
		$data['jenis_pendaftar'] = $this->M_user->get_jenisPendaftar();
		$data['prodi'] = $this->M_user->get_prodi();
		$data['institusi'] = $this->M_user->get_institusi();

		$this->form_validation->set_rules('name', 'Nama Lengkap', 'required|trim');
		$this->form_validation->set_rules('no_identitas', 'Nomor identitas', 'required|trim');
		$this->form_validation->set_rules('tempat_lahir', 'Tempat lahir', 'required|trim');
		$this->form_validation->set_rules('tgl_lahir', 'Tanggal Lahir', 'required|trim');
		$this->form_validation->set_rules('jenis_kelamin', 'Jenis Kelamin', 'required|trim');
		$this->form_validation->set_rules('jenis_pendaftar', 'Jenis Pendaftar', 'required|trim');
		$this->form_validation->set_rules('no_hp', 'Nomor Telepon', 'required|trim');

		if ($this->form_validation->run() == false) {

			$this->load->view('templates/header', $data);
			$this->load->view('templates/sidebar', $data);
			$this->load->view('templates/topbar', $data);
			$this->load->view('user/edit', $data);
			$this->load->view('templates/footer');
		} else {
			$name = $this->input->post('name');
			$email = $this->input->post('email');

			$no_identitas = $this->input->post('no_identitas');
			$tempat_lahir = $this->input->post('tempat_lahir');
			$tgl_lahir = $this->input->post('tgl_lahir');
			$jenis_kelamin = $this->input->post('jenis_kelamin');
			$id_jenis = $this->input->post('jenis_pendaftar');
			$id_prodi = $this->input->post('prodi');
			$id_institusi = $this->input->post('institusi');
			$no_hp = $this->input->post('no_hp');

			//upload
			//cek jika ada gambar yang akan diupload
			$upload_image = $_FILES['foto_identitas']['name'];

			//ika ada gambar yang di upload

			if ($upload_image) {
				$config['upload_path']          = './assets/img/identitas';
				$config['allowed_types']        = 'gif|jpg|png';
				$config['max_size']             = 2048;

				$this->upload->initialize($config);

				if ($this->upload->do_upload('foto_identitas')) {
					$old_image = $data['akun_user']['foto_identitas'];
					if ($old_image != 'default.png') {
						unlink(FCPATH, '.assets/img/identitas/' . $old_image);
					}

					$new_image = $this->upload->data('file_name');
					$this->db->set('foto_identitas', $new_image);
				} else {
					$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">' . $this->upload->display_errors() . '</div>');
					redirect('user');
				}
			}

			//cek jika ada gambar yang akan diupload
			$upload_image1 = $_FILES['foto_profil']['name'];

			//ika ada gambar yang di upload

			if ($upload_image1) {
				$config['upload_path']          = './assets/img/profile';
				$config['allowed_types']        = 'gif|jpg|png';
				$config['max_size']             = 2048;

				$this->upload->initialize($config);

				if ($this->upload->do_upload('foto_profil')) {
					$old_image = $data['akun_user']['foto_profil'];
					if ($old_image != 'default.png') {
						unlink(FCPATH, '.assets/img/profile/' . $old_image);
					}

					$new_image = $this->upload->data('file_name');
					$this->db->set('foto_profil', $new_image);
				} else {
					$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">' . $this->upload->display_errors() . '</div>');
					redirect('user');
				}
			}

			$this->db->set('nama', $name);
			$this->db->set('no_identitas', $no_identitas);
			$this->db->set('tempat_lahir', $tempat_lahir);
			$this->db->set('tgl_lahir', $tgl_lahir);
			$this->db->set('jenis_kelamin', $jenis_kelamin);
			$this->db->set('id_jenis', $id_jenis);
			$this->db->set('id_prodi', $id_prodi);
			$this->db->set('id_institusi', $id_institusi);
			$this->db->set('no_hp', $no_hp);
			$this->db->where('email', $email);
			$this->db->update('akun_user');

			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
			Profile berhasil di ubah!
		  </div>');
			redirect('user');
		}
	}
	public function edit1()
	{
		$data['akun_user'] = $this->db->get_where(
			'akun_user',
			['email' => $this->session->userdata('email')]
		)->row_array();

		$email = $data['akun_user']['email'];
		$name = $this->input->post('nama');
		$tempat_lahir = $this->input->post('tempat_lahir');
		$tgl_lahir = $this->input->post('tgl_lahir');
		$no_identitas = $this->input->post('no_identitas');
		$jenis_kelamin = $this->input->post('jenis_kelamin');
		$no_hp = $this->input->post('no_hp');

		//cek jika ada gambar yang akan diupload
		$upload_image1 = $_FILES['foto_profil']['name'];

		//ika ada gambar yang di upload

		if ($upload_image1) {
			$config['upload_path']          = './assets/img/profile';
			$config['allowed_types']        = 'gif|jpg|png';
			$config['max_size']             = 2048;

			$this->upload->initialize($config);

			if ($this->upload->do_upload('foto_profil')) {
				$old_image = $data['akun_user']['foto_profil'];
				if ($old_image != 'default.png') {
					unlink(FCPATH, '.assets/img/profile/' . $old_image);
				}

				$new_image = $this->upload->data('file_name');
				$this->db->set('foto_profil', $new_image);
			} else {
				$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">' . $this->upload->display_errors() . '</div>');
				redirect('user');
			}
		}

		$this->db->set('nama', $name);
		$this->db->set('no_identitas', $no_identitas);
		$this->db->set('tempat_lahir', $tempat_lahir);
		$this->db->set('tgl_lahir', $tgl_lahir);
		$this->db->set('jenis_kelamin', $jenis_kelamin);
		$this->db->set('no_hp', $no_hp);
		$this->db->where('email', $email);
		$this->db->update('akun_user');

		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
			Profile berhasil di ubah!
		  </div>');
		redirect('user');
	}
	public function changePassword()
	{
		$data['title'] = 'Change Password';
		$data['akun_user'] = $this->db->get_where(
			'akun_user',
			['email' => $this->session->userdata('email')]
		)->row_array();

		$this->form_validation->set_rules('current_password', 'Password Saat Ini', 'required|trim');
		$this->form_validation->set_rules('new_password1', 'Password Baru', 'required|trim|min_length[6]|matches[new_password2]');
		$this->form_validation->set_rules('new_password2', 'Ulangi Password', 'required|trim|min_length[6]|matches[new_password1]');

		if ($this->form_validation->run() == false) {

			$this->load->view('templates/header', $data);
			$this->load->view('templates/sidebar', $data);
			$this->load->view('templates/topbar', $data);
			$this->load->view('user/changepassword', $data);
			$this->load->view('templates/footer');
		} else {
			$current_password = $this->input->post('current_password');
			$new_password = $this->input->post('new_password1');
			if (!password_verify($current_password, $data['akun_user']['password'])) {
				$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
			Password Saat Ini Salah !
		  </div>');
				redirect('user/changepassword');
			} else {
				if ($current_password == $new_password) {
					$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
			Password Jangan Sama Dengan Saat Ini !
		  </div>');
					redirect('user/changepassword');
				} else {
					$pasword_hash = password_hash($new_password, PASSWORD_DEFAULT);
					$this->db->set('password', $pasword_hash);
					$this->db->where('email', $this->session->userdata('email'));
					$this->db->update('akun_user');

					$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
			Password Telah Di Ubah !
		  </div>');
					redirect('user/changepassword');
				}
			}
		}
	}
}
