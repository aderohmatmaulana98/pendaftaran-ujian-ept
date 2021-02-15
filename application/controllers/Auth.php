<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->model('m_registration');
	}
	public function index()
	{
		if ($this->session->userdata('email')) {
			redirect('user');
		}

		$data['title'] = 'Login Page';
		if ($this->session->userdata('email')) {
			redirect('user');
		}
		$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
		$this->form_validation->set_rules('password', 'Password', 'trim|required');
		if ($this->form_validation->run() == false) {
			$data['title'] = 'Login Page';
			$this->load->view('beranda/login_header');
			$this->load->view('beranda/login');
			$this->load->view('beranda/login_footer');
		} else {
			$this->_login();
		}
	}

	private function _login()
	{
		$email = $this->input->post('email');
		$password = $this->input->post('password');

		$akun_user = $this->db->get_where('akun_user', ['email' => $email])->row_array();
		//jika usernya ada
		if ($akun_user) {
			//jika usernya aktif
			if ($akun_user['is_active'] == 1) {
				//cek password
				if (password_verify($password, $akun_user['password'])) {
					$data = [
						'email' => $akun_user['email'],
						'role_id' => $akun_user['role_id']
					];
					$this->session->set_userdata($data);
					if ($akun_user['role_id'] == 1) {
						redirect('menu');
					} elseif ($akun_user['role_id'] == 2) {
						redirect('admin');
					} else {
						redirect('sertifikasi/ujian_bahasa');
					}
				} else {
					$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Password salah</div>');
					redirect('auth');
				}
			} else {
				$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Email belum aktif</div>');
				redirect('auth');
			}
		} else {
			$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">User tidak terdaftar</div>');
			redirect('auth');
		}
	}
	public function registration()
	{
		if ($this->session->userdata('email')) {
			redirect('user');
		}
		$this->load->model('M_registration');
		$data['jenis_pendaftar'] = $this->M_registration->get_jenisPendaftar();
		$data['prodi'] = $this->M_registration->get_prodi();
		$data['institusi'] = $this->M_registration->get_institusi();

		$this->form_validation->set_rules('nama', 'Nama Lengkap', 'required|trim');
		$this->form_validation->set_rules('no_identitas', 'No Identitas', 'required|trim|is_unique[akun_user.no_identitas]', [
			'is_unique' => 'No identitas sudah ada'
		]);
		$this->form_validation->set_rules('tempat_lahir', 'Tempat Lahir', 'required|trim');
		$this->form_validation->set_rules('tgl_lahir', 'Tanggal Lahir', 'required|trim');
		$this->form_validation->set_rules('no_hp', 'Nomor HP', 'required|trim');
		$this->form_validation->set_rules('jenis_kelamin', 'Jenis Kelamin', 'required|trim');
		$this->form_validation->set_rules('jenis_pendaftar', 'Kategori Pendaftar', 'required|trim');
		$this->form_validation->set_rules('prodi', 'Prodi', 'required|trim');
		$this->form_validation->set_rules('institusi', 'Institusi', 'required|trim');

		$this->form_validation->set_rules(
			'email',
			'Email',
			'required|trim|valid_email|is_unique[akun_user.email]',
			[
				'valid_email' => 'Email not valid'
			]
		);
		$this->form_validation->set_rules(
			'password1',
			'Password',
			'required|trim|min_length[6]|matches[password2]',
			[
				'matches' => 'Password tidak cocok!',
				'min_length' => 'Password minimal 6 karakter!'
			]
		);
		$this->form_validation->set_rules('password2', 'Konfirmasi password', 'required|trim|matches[password1]');

		if ($this->form_validation->run() == false) {

			$data['title'] = 'user registration';
			$this->load->view('beranda/beranda_header', $data);
			$this->load->view('beranda/registration', $data);
			$this->load->view('beranda/beranda_footer');
		} else {

			$nama = $this->input->post('nama');
			$no_identitas = $this->input->post('no_identitas');
			$tempat_lahir = $this->input->post('tempat_lahir');
			$tgl_lahir = $this->input->post('tgl_lahir');
			$no_hp = $this->input->post('no_hp');
			$jenis_kelamin = $this->input->post('jenis_kelamin');
			$jenis_pendaftar = $this->input->post('jenis_pendaftar');
			$prodi = $this->input->post('prodi');
			$institusi = $this->input->post('institusi');
			$email = $this->input->post('email');
			$password = password_hash($this->input->post('password1'), PASSWORD_DEFAULT);
			$role_id = 3;
			$is_active = 0;
			$date_created = time();
			$foto_profil = $_FILES['foto_profil'];


			if ($foto_profil = '') {
			} else {
				$config['allowed_types']        = 'gif|jpg|png|jpeg';
				$config['max_size'] = '2048';
				$config['upload_path'] = './assets/img/profile/';
				$this->upload->initialize($config);

				if (!$this->upload->do_upload('foto_profil')) {

					$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Data Belum Lengkap, Harap upload foto profile</div>');
					redirect('auth/registration');
				} else {

					$foto_profil = $this->upload->data('file_name');
				}
			}

			$data = [
				'nama' => $nama,
				'no_identitas' => $no_identitas,
				'tempat_lahir' => $tempat_lahir,
				'tgl_lahir' => $tgl_lahir,
				'no_hp' => $no_hp,
				'jenis_kelamin' => $jenis_kelamin,
				'id_jenis' => $jenis_pendaftar,
				'id_prodi' => $prodi,
				'id_institusi' => $institusi,
				'email' => $email,
				'password' => $password,
				'role_id' => $role_id,
				'is_active' => $is_active,
				'foto_profil' => $foto_profil,
				'date_created' => $date_created
			];


			//siapkan token
			$token = base64_encode(openssl_random_pseudo_bytes(32));
			$user_token = [
				'email' => $email,
				'token' => $token,
				'date_created' => time()
			];


			$this->m_registration->input_data($data, 'akun_user', $user_token);
			$this->_sendEmail($token, 'verify', $nama);
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
			Akun berhasil dibuat, silahkan cek email untuk aktivasi akun!
		  </div>');
			redirect('auth/index');
		}
	}

	private function _sendEmail($token, $type, $nama)
	{
		$config = [
			'protocol' => 'smtp',
			'smtp_host' => 'ssl://smtp.googlemail.com',
			'smtp_user' => 'aderohmatmaulana33@gmail.com',
			'smtp_pass' => '089612664228',
			'smtp_port' => 465,
			'mailtype' => 'html',
			'charset' => 'utf-8',
			'newline' => "\r\n"
		];

		$this->email->initialize($config);

		$this->email->from('aderohmatmaulana33@gmail.com', 'Ade Rohmat Maulana');
		$this->email->to($this->input->post('email'));
		if ($type == 'verify') {

			$this->email->subject('Verifikasi akun');
			$this->email->message('Hai ' . "$nama" . '<br><br><br>
			Selamat anda telah berhasil membuat akun di aplikasi pendaftaran ujian EPT <br><br><br>			
			Berikutnya silahkan verifikasi akunmu agar dapat login ke halaman web ujian bahasa inggris English Profeciensi Test (EPT) melalui link dibawah ini. <br> 
			Klik Link berikut untuk verifikasi akun : <a href="' . base_url() . 'auth/verify?email=' . $this->input->post('email') . '&token=' . urlencode($token) . '">Activate</a> </br><br><br><br>
			Terimaksih telah membuat akun untuk ujian bahasa inggris atau English Proficiensi Test<br><br>
			-Pusdiklat & Sertifikasi UTY');
		} else if ($type == 'forgot') {
			$this->email->subject('Reset Password');
			$this->email->message('Klik Link Berikut Untuk Reset Password : <a href="' . base_url() . 'auth/resetpassword?email=' . $this->input->post('email') . '&token=' . urlencode($token) . '">Reset Password</a>');
		}


		if ($this->email->send()) {
			return true;
		} else {
			echo $this->email->print_debugger();
			die;
		}
	}

	public function verify()
	{
		$email = $this->input->get('email');
		$token = $this->input->get('token');

		$akun_user = $this->db->get_where('akun_user', ['email' => $email])->row_array();

		if ($akun_user) {
			$user_token = $this->db->get_where('user_token', ['token' => $token])->row_array();

			if ($user_token) {
				if (time() - $user_token['date_created'] < (60 * 60 * 24)) {
					$this->db->set('is_active', 1);
					$this->db->where('email', $email);
					$this->db->update('akun_user');
					$this->db->delete('user_token', ['email' => $email]);

					$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">' . 'Email telah diaktivasi, Silahkan Login !
		 			 </div>');
					redirect('auth');
				} else {

					$this->db->delete('akun_user', ['email' => $email]);
					$this->db->delete('user_token', ['email' => $email]);


					$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
			Aktivasi akun gagal ! , Token Kadaluarsa
		  </div>');
					redirect('auth');
				}
			} else {
				$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
			Aktivasi akun gagal ! , Token Salah
		  </div>');
				redirect('auth');
			}
		} else {
			$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
			Aktivasi akun gagal ! , Email Salah
		  </div>');
			redirect('auth');
		}
	}


	public function logout()
	{
		$this->session->unset_userdata('email');
		$this->session->unset_userdata('role_id');

		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
			Logout Berhasil !
		  </div>');
		redirect('auth');
	}
	public function blocked()
	{
		$this->load->view('auth/blocked');
	}

	public function forgotPassword()
	{
		$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');

		if ($this->form_validation->run() == false) {

			$data['title'] = 'Forgot Password';
			$this->load->view('templates/auth_header', $data);
			$this->load->view('auth/forgot-password');
			$this->load->view('templates/auth_footer');
		} else {
			$email = $this->input->post('email');
			$akun_user = $this->db->get_where('akun_user', ['email' => $email, 'is_active' => 1])->row_array();

			if ($akun_user) {
				$token = base64_encode(openssl_random_pseudo_bytes(32));
				$user_token = [
					'email' => $email,
					'token' => $token,
					'date_created' => time()
				];

				$this->db->insert('user_token', $user_token);
				$this->_sendEmail($token, 'forgot', $email);

				$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
			Silahkan Cek Email Untuk Reset Password !
		  </div>');
				redirect('auth/forgotpassword');
			} else {
				$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
			Email Tidak Terdaftar Atau Tidak Aktif !
		  </div>');
				redirect('auth/forgotpassword');
			}
		}
	}

	public function resetPassword()
	{
		$email = $this->input->get('email');
		$token = $this->input->get('token');

		$akun_user = $this->db->get_where('akun_user', ['email' => $email])->row_array();
		if ($akun_user) {
			$user_token = $this->db->get_where('user_token', ['token' => $token])->row_array();

			if ($user_token) {
				$this->session->set_userdata('reset_email', $email);
				$this->changePassword();
			} else {
				$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
			Reset Password Gagal, Token Salah !
		  </div>');
				redirect('auth');
			}
		} else {
			$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
			Reset Password Gagal, Email Salah !
		  </div>');
			redirect('auth');
		}
	}

	public function changePassword()
	{
		if (!$this->session->userdata('reset_email')) {
			redirect('auth');
		}
		$this->form_validation->set_rules('password1', 'Password', 'trim|required|min_length[6]|matches[password2]');
		$this->form_validation->set_rules('password2', 'Password', 'trim|required|min_length[6]|matches[password1]');


		if ($this->form_validation->run() == false) {

			$data['title'] = 'Change Password';
			$this->load->view('templates/auth_header', $data);
			$this->load->view('auth/change-password');
			$this->load->view('templates/auth_footer');
		} else {
			$password = password_hash($this->input->post('password1'), PASSWORD_DEFAULT);
			$email = $this->session->userdata('reset_email');

			$this->db->set('password', $password);
			$this->db->where('email', $email);
			$this->db->update('akun_user');

			$this->session->unset_userdata('reset_email');
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
			Password Besrhasil Diubah Silahkan Login !
		  </div>');
			redirect('auth');
		}
	}
}
