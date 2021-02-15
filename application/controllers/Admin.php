<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		is_logged_in();
		date_default_timezone_set('Asia/Jakarta');
		$this->load->model('M_admin');
		$this->M_admin->edit_kelas();
		$this->M_admin->tutup();
	}

	public function index()
	{
		$data['title'] = 'Dashboard';
		$data['akun_user'] = $this->db->get_where(
			'akun_user',
			['email' => $this->session->userdata('email')]
		)->row_array();
		$jml_peserta = "SELECT COUNT(*)
						FROM peserta";
		$data['jml_peserta'] = $this->db->query($jml_peserta)->row();
		$jml_kelas = "SELECT COUNT(*)
						FROM kelas where kelas.status_kelas = 'Buka'";
		$data['jml_kelas'] = $this->db->query($jml_kelas)->row();
		$belum_konfirmasi = "SELECT COUNT(*)
								FROM boking_kelas
								WHERE is_active = 1";
		$data['belum_konfirmasi'] = $this->db->query($belum_konfirmasi)->row();
		$status_pending = "SELECT COUNT(*)
							FROM peserta
							WHERE peserta.`status`='Pending'";
		$data['status_pending'] = $this->db->query($status_pending)->row();


		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar_admin', $data);
		$this->load->view('admin/index', $data);
		$this->load->view('templates/footer', $data);
	}
	public function Kelas()
	{
		$data['title'] = 'Kelas';
		$data['akun_user'] = $this->db->get_where(
			'akun_user',
			['email' => $this->session->userdata('email')]
		)->row_array();
		$data['kelas'] = $this->db->get('kelas')->result_array();

		$this->form_validation->set_rules('nama_kelas', 'Nama Kelas', 'required');
		$this->form_validation->set_rules('nama_ruangan', 'Nama ruangan', 'required');
		$this->form_validation->set_rules('lokasi', 'Lokasi', 'required');
		$this->form_validation->set_rules('kuota', 'Kuota', 'required');
		$this->form_validation->set_rules('tanggal_ujian', 'Tanggal Ujian', 'required');
		$this->form_validation->set_rules('status_kelas', 'Status Kelas', 'required');

		if ($this->form_validation->run() == false) {
			$this->load->view('templates/header', $data);
			$this->load->view('templates/sidebar', $data);
			$this->load->view('templates/topbar_admin', $data);
			$this->load->view('admin/kelas', $data);
			$this->load->view('templates/footer');
		} else {
			$this->db->insert('kelas', [
				'nama_kelas' => $this->input->post('nama_kelas'),
				'nama_ruangan' => $this->input->post('nama_ruangan'),
				'lokasi' => $this->input->post('lokasi'),
				'kuota' => $this->input->post('kuota'),
				'sisa_kuota' => $this->input->post('kuota'),
				'tanggal_ujian' => $this->input->post('tanggal_ujian'),
				'status_kelas' => $this->input->post('status_kelas')

			]);
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> Kelas berhasil ditambahan ! </div>');
			redirect('admin/kelas');
		}
	}
	public function Edit_kelas()
	{
		$this->load->model('M_admin');

		$nama_kelas = $this->input->post('nama_kelas');
		$nama_ruangan = $this->input->post('nama_ruangan');
		$lokasi = $this->input->post('lokasi');
		$kuota = $this->input->post('kuota');
		$sisa_kuota = $this->input->post('sisa_kuota');
		$tanggal = $this->input->post('tanggal_ujian');
		$id = $this->input->post('id');
		$status_kelas = $this->input->post('status_kelas');


		$this->db->set('nama_kelas', $nama_kelas);
		$this->db->set('nama_ruangan', $nama_ruangan);
		$this->db->set('lokasi', $lokasi);
		$this->db->set('kuota', $kuota);
		$this->db->set('sisa_kuota', $sisa_kuota);
		$this->db->set('tanggal_ujian', $tanggal);
		$this->db->set('status_kelas', $status_kelas);
		$this->db->where('id', $id);

		$this->db->update('kelas');

		// $data['kelas'] = $this->db->get('kelas')->row_array();
		// $status = $data['kelas']['status_kelas'];
		// $tanggal_ujian = $data['kelas']['tanggal'];
		// $where = $data['kelas']['id'];
		$this->M_admin->edit_kelas();

		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
					Kelas berhasil di ubah !
					  </div>');
		redirect('admin/kelas');
	}

	public function Hapus_kelas($id)
	{
		$this->load->model('M_admin');
		$where = ['id' => $id];
		$this->M_admin->hapus_kelas($where, 'kelas');
		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
					Kelas berhasil dihapus !
					  </div>');
		redirect('admin/kelas');
	}
	public function Tarif()
	{
		$data['title'] = 'Biaya';
		$data['akun_user'] = $this->db->get_where(
			'akun_user',
			['email' => $this->session->userdata('email')]
		)->row_array();
		$data['jenis_pendaftar'] = $this->db->get('jenis_pendaftar')->result_array();
		$data['peserta'] = $this->db->get('peserta')->result_array();

		$query = "SELECT tarif.*,jenis_pendaftar.`nama_jenis` 
					FROM jenis_pendaftar, tarif 
					WHERE jenis_pendaftar.`id`=tarif.`id_jenis`
					ORDER BY tarif.`id_jenis` ASC";
		$data['tarif'] = $this->db->query($query)->result_array();
		// var_dump($data['tarif']);
		// die;

		$this->form_validation->set_rules('tarif', 'Tarif', 'required');
		$this->form_validation->set_rules('id_jenis', 'Jenis Pendaftar', 'required');

		if ($this->form_validation->run() == false) {
			$this->load->view('templates/header', $data);
			$this->load->view('templates/sidebar', $data);
			$this->load->view('templates/topbar_admin', $data);
			$this->load->view('admin/tarif', $data);
			$this->load->view('templates/footer');
		} else {
			$this->db->insert('tarif', [
				'tarif' => $this->input->post('tarif'),
				'id_jenis' => $this->input->post('id_jenis'),
			]);
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> Tarif berhasil ditambahan ! </div>');
			redirect('admin/tarif');
		}
	}
	public function Edit_tarif()
	{
		$this->load->model('M_admin');
		//$data['edit_tarif'] = $this->M_admin->getTarif();
		$tarif = $this->input->post('tarif');
		$id_jenis = $this->input->post('id_jenis');
		$id = $this->input->post('id');

		$data = [
			'tarif' => $tarif,
			'id_jenis' => $id_jenis
		];
		// var_dump($data);
		// die;
		$where = ['id' => $id];

		$this->db->where($where);
		$this->db->update('tarif', $data);

		//$this->M_admin->edit_tarif($where, $data);

		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
					Biaya berhasil di ubah !
					  </div>');
		redirect('admin/tarif');
	}
	public function Hapus_tarif($id)
	{
		$this->load->model('M_admin');
		$where = ['id' => $id];
		$this->M_admin->hapus_tarif($where, 'tarif');
		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
					Biaya berhasil dihapus !
					  </div>');
		redirect('admin/tarif');
	}
	public function Verifikasi_pembayaran()
	{
		$data['title'] = 'Verifikasi Pembayaran';
		$data['akun_user'] = $this->db->get_where(
			'akun_user',
			['email' => $this->session->userdata('email')]
		)->row_array();
		$query = "SELECT * FROM kelas
				ORDER BY kelas.`tanggal_ujian` ASC";
		$data['verifikasi_pembayaran'] = $this->db->query($query)->result_array();

		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar_admin', $data);
		$this->load->view('admin/verifikasi_pembayaran', $data);
		$this->load->view('templates/footer');
	}
	public function Verifikasi_pembayaran1()
	{
		$data['title'] = 'Verifikasi Pembayaran';
		$data['akun_user'] = $this->db->get_where(
			'akun_user',
			['email' => $this->session->userdata('email')]
		)->row_array();
		$buka = $this->input->post('status');
		if ($buka == 'Buka') {
			$query = "SELECT * FROM kelas
				WHERE kelas.`status_kelas` ='Buka'
				ORDER BY kelas.`tanggal_ujian` ASC";
		} else if ($buka == 'Tutup') {
			$query = "SELECT * FROM kelas
				WHERE kelas.`status_kelas` ='Tutup'
				ORDER BY kelas.`tanggal_ujian` ASC";
		} else {
			$query = "SELECT * FROM kelas
				ORDER BY kelas.`tanggal_ujian` ASC";
		}
		$data['verifikasi_pembayaran'] = $this->db->query($query)->result_array();

		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar_admin', $data);
		$this->load->view('admin/verifikasi_pembayaran', $data);
		$this->load->view('templates/footer');
	}
	public function Data_peserta($id, $nama_kelas)
	{
		// var_dump($id);
		// die;
		$data['title'] = 'Data Peserta';
		$data['akun_user'] = $this->db->get_where(
			'akun_user',
			['email' => $this->session->userdata('email')]
		)->row_array();
		$id_kelas = $id;
		$data['id_kelas'] = $id_kelas;

		$query = "SELECT peserta.*, akun_user.`nama`,akun_user.`no_identitas`,boking_kelas.tanggal_pesan, kelas.`nama_kelas`, boking_kelas.`id_kelas`
					FROM peserta, akun_user, kelas, boking_kelas
					WHERE peserta.`id_akun_user`=akun_user.`id`
					AND peserta.`id_boking` = boking_kelas.`id`
					AND boking_kelas.`id_kelas` = kelas.`id`
					AND boking_kelas.`id_kelas` = $id_kelas
				GROUP BY peserta.`id`";

		$data['data_peserta'] = $this->db->query($query)->result_array();
		$data['nama_kelas'] = $nama_kelas;

		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar_admin', $data);
		$this->load->view('admin/data_peserta', $data);
		$this->load->view('templates/footer');
	}
	public function Verifikasi($id, $id_kelas, $nama_kelas)
	{
		$data['akun_user'] = $this->db->get_where(
			'akun_user',
			['email' => $this->session->userdata('email')]
		)->row_array();

		$id_peserta = $id;
		$query = "SELECT peserta.`status`, akun_user.`nama`,peserta.`id`, akun_user.`email`, kelas.nama_kelas, kelas.tanggal_ujian, kelas.nama_ruangan, kelas.lokasi
					FROM peserta, akun_user, kelas, boking_kelas
					WHERE peserta.`id`=$id_peserta
					AND akun_user.`id`= peserta.`id_akun_user`
					AND `boking_kelas`.`id_kelas`=kelas.`id`
					AND peserta.`id_boking` = boking_kelas.`id`";
		$status['status'] = $this->db->query($query)->row_array();
		$sts = $status['status']['status'];
		$kd_peserta = $status['status']['id'];
		$nama = $status['status']['nama'];
		$email = $status['status']['email'];
		$kelas = $status['status']['nama_kelas'];
		$ruangan = $status['status']['nama_ruangan'];
		$tgl_ujian = $status['status']['tanggal_ujian'];
		$lokasi = $status['status']['lokasi'];


		$sts = "Terverifikasi";
		$waktu = time();

		$this->db->set('status', $sts);
		$this->db->set('update_at', $waktu);
		$this->db->where('id', $id_peserta);
		$this->db->update('peserta');
		$this->_emailVerifikasi($nama, $email, $kelas, $ruangan, $tgl_ujian, $lokasi, $kd_peserta);

		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
			Peserta Berhasil Di Verifikasi !
		  </div>');
		redirect("admin/data_peserta/$id_kelas/$nama_kelas/");
	}
	public function _emailVerifikasi($nama, $email, $kelas, $ruangan, $tgl_ujian, $lokasi, $kd_peserta)
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
		$this->email->to($email);
		$this->email->subject('Pendaftaran berhasil');
		$this->email->message('Hai ' . "$nama" . '<br><br><br>
			Selamat pembayaran anda telah di verifikasi <br><br><br>			
			Terdaftar pada kelas : ' . "$kelas" . ' <br>
			Lokasi ujian		 : ' . "$lokasi" . ' <br>
			Ruangan				 : ' . "$ruangan" . ' <br>
			Tanggal Ujian		 : ' . "$tgl_ujian" . '<br>	
			Kartu ujian bisa didownload dihalaman web ujian bahasa EPT atau klik link <a href="' . base_url() . 'sertifikasi/kartu_ujian/' . $kd_peserta . '">disini</a><br>
			Terimaksih telah mendaftar  ujian bahasa inggris atau English Proficiensi Test<br><br>
			-Pusdiklat & Sertifikasi UTY');

		if ($this->email->send()) {
			return true;
		} else {
			echo $this->email->print_debugger();
		}
	}
	public function Batalkan($id, $id_kelas, $nama_kelas)
	{
		$data['akun_user'] = $this->db->get_where(
			'akun_user',
			['email' => $this->session->userdata('email')]
		)->row_array();

		$id_peserta = $id;
		$query = "SELECT peserta.`status`
					FROM peserta
					WHERE peserta.`id`=$id_peserta";
		$status = $this->db->query($query)->row();
		$status = $status->status;
		$status = "Pending";
		$waktu = time();

		$this->db->set('status', $status);
		$this->db->set('update_at', $waktu);
		$this->db->where('id', $id_peserta);
		$this->db->update('peserta');

		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
			Verifikasi Dibatalkan !
		  </div>');
		redirect("admin/data_peserta/$id_kelas/$nama_kelas/");
	}
	public function Laporan_perkelas($nama_kelas)
	{
		$data['title'] = 'Laporan';
		$data['akun_user'] = $this->db->get_where(
			'akun_user',
			['email' => $this->session->userdata('email')]
		)->row_array();
		$kelas_nama = str_replace('%20', ' ', $nama_kelas);
		// var_dump($kelas_nama);
		// die;

		$query = "SELECT akun_user.`nama`, akun_user.`no_identitas`, jenis_pendaftar.`nama_jenis`, prodi.`nama_prodi`, institusi.`nama_institusi`, kelas.`nama_kelas`, kelas.`nama_ruangan`, kelas.`tanggal_ujian`
			FROM peserta, akun_user, jenis_pendaftar, prodi, institusi, kelas, boking_kelas
			WHERE akun_user.`id`= peserta.`id_akun_user`
			AND jenis_pendaftar.`id`=akun_user.`id_jenis`
			AND prodi.`id`= akun_user.`id_prodi`
			AND institusi.`id`= akun_user.`id_institusi`
			AND boking_kelas.`id_kelas` = kelas.`id`
			AND peserta.`id_boking` = boking_kelas.`id`
			AND kelas.`nama_kelas` = '$kelas_nama'
			AND peserta.`status` = 'Terverifikasi'";
		$data['lap_kel'] = $this->db->query($query)->result_array();

		$sql = "SELECT kelas.`nama_kelas`, kelas.`nama_ruangan`, kelas.`tanggal_ujian`
		FROM kelas
		WHERE kelas.`nama_kelas`= '$kelas_nama'";
		$data['kl'] = $this->db->query($sql)->row_array();


		$this->load->library('pdf');
		$this->pdf->setPaper('A4', 'landscape');
		$this->pdf->filename = "laporan_Per_Kelas.pdf";
		$this->pdf->load_view1('admin/lap_kel', $data);
	}
	public function Laporan()
	{
		$data['title'] = 'Laporan';
		$data['akun_user'] = $this->db->get_where(
			'akun_user',
			['email' => $this->session->userdata('email')]
		)->row_array();

		$query = "SELECT akun_user.`nama`, akun_user.`no_identitas`, jenis_pendaftar.`nama_jenis`, prodi.`nama_prodi`, institusi.`nama_institusi`
					FROM peserta, akun_user, jenis_pendaftar, prodi, institusi, kelas, boking_kelas
					WHERE akun_user.`id`= peserta.`id_akun_user`
					AND jenis_pendaftar.`id`=akun_user.`id_jenis`
					AND prodi.`id`= akun_user.`id_prodi`
					AND institusi.`id`= akun_user.`id_institusi`
					AND boking_kelas.`id_kelas` = kelas.`id`
					AND peserta.`id_boking` = boking_kelas.`id`
					AND peserta.`status` = 'Terverifikasi'
					ORDER BY prodi.`nama_prodi`";
		$data['laporan'] = $this->db->query($query)->result_array();


		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar_admin', $data);
		$this->load->view('admin/laporan', $data);
		$this->load->view('templates/footer');
	}
	public function Laporan_priodik()
	{
		$data['title'] = 'Laporan Priodik';
		$data['akun_user'] = $this->db->get_where(
			'akun_user',
			['email' => $this->session->userdata('email')]
		)->row_array();
		$awal  = $this->input->post('awal');
		$awal  = date('Y-m-d', strtotime($awal));
		$akhir = $this->input->post('akhir');
		$akhir = date('Y-m-d', strtotime($akhir));

		$query = "SELECT  akun_user.`nama`, akun_user.`no_identitas`, jenis_pendaftar.`nama_jenis`, prodi.`nama_prodi`, institusi.`nama_institusi`
					FROM peserta, akun_user, jenis_pendaftar, prodi, institusi, kelas, boking_kelas
					WHERE akun_user.`id`= peserta.`id_akun_user`
					AND jenis_pendaftar.`id`=akun_user.`id_jenis`
					AND prodi.`id`= akun_user.`id_prodi`
					AND institusi.`id`= akun_user.`id_institusi`
					AND boking_kelas.`id_kelas` = kelas.`id`
					AND peserta.`id_boking` = boking_kelas.`id`
					AND peserta.`status` = 'Terverifikasi'
					AND peserta.`tanggal_bayar` BETWEEN '$awal' AND '$akhir'
					ORDER BY prodi.`nama_prodi`";
		$data['laporan'] = $this->db->query($query)->result_array();

		$this->load->view('admin/laporan_priodik', $data);

		$this->load->library('pdf');
		$this->pdf->setPaper('A4', 'landscape');
		$this->pdf->filename = "laporan_Priodik.pdf";
		$this->pdf->load_view2('admin/laporan_priodik', $data);
	}

	public function validasi()
	{
		$data['title'] = 'Data validasi';
		$data['akun_user'] = $this->db->get_where(
			'akun_user',
			['email' => $this->session->userdata('email')]
		)->row_array();

		$query = "SELECT peserta.id, akun_user.`nama`, akun_user.`no_identitas`, kelas.`nama_kelas`,kelas.tanggal_ujian, peserta.`no_slip`, peserta.`tanggal_bayar`, peserta.`status`, peserta.`bukti_bayar`
		FROM akun_user, kelas, peserta, boking_kelas
		WHERE akun_user.`id` = peserta.`id_akun_user`
		AND kelas.`id` = boking_kelas.`id_kelas`
		AND `boking_kelas`.`id`=peserta.`id_boking`
		AND peserta.`status`='Pending'";
		$data['validasi'] = $this->db->query($query)->result_array();


		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar_admin', $data);
		$this->load->view('admin/validasi', $data);
		$this->load->view('templates/footer');
	}
	public function validasiAksi($id)
	{
		$data['title'] = 'Data validasi';
		$data['akun_user'] = $this->db->get_where(
			'akun_user',
			['email' => $this->session->userdata('email')]
		)->row_array();
		$id_peserta = $id;

		$query = "SELECT peserta.`status`, akun_user.`nama`,peserta.`id`, akun_user.`email`, kelas.nama_kelas, kelas.tanggal_ujian, kelas.nama_ruangan, kelas.lokasi
					FROM peserta, akun_user, kelas, boking_kelas
					WHERE peserta.`id`=$id_peserta
					AND akun_user.`id`= peserta.`id_akun_user`
					AND `boking_kelas`.`id_kelas`=kelas.`id`
					AND peserta.`id_boking` = boking_kelas.`id`";
		$status['status'] = $this->db->query($query)->row_array();
		$sts = $status['status']['status'];
		$kd_peserta = $status['status']['id'];
		$nama = $status['status']['nama'];
		$email = $status['status']['email'];
		$kelas = $status['status']['nama_kelas'];
		$ruangan = $status['status']['nama_ruangan'];
		$tgl_ujian = $status['status']['tanggal_ujian'];
		$lokasi = $status['status']['lokasi'];

		$query = "SELECT akun_user.`nama`, akun_user.`no_identitas`, kelas.`nama_kelas`,kelas.tanggal_ujian, peserta.`no_slip`, peserta.`tanggal_bayar`, peserta.`status`, peserta.`bukti_bayar`
		FROM akun_user, kelas, peserta, boking_kelas
		WHERE akun_user.`id` = peserta.`id_akun_user`
		AND kelas.`id` = boking_kelas.`id_kelas`
		AND `boking_kelas`.`id`=peserta.`id_boking`
		AND peserta.id = $id_peserta
		AND peserta.`status`='Pending'";
		$data['validasi'] = $this->db->query($query)->result_array();
		$sts = "Terverifikasi";
		$waktu = time();

		$this->db->set('status', $sts);
		$this->db->set('update_at', $waktu);
		$this->db->where('id', $id_peserta);
		$this->db->update('peserta');
		$this->_emailVerifikasi($nama, $email, $kelas, $ruangan, $tgl_ujian, $lokasi, $kd_peserta);

		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
			Peserta Berhasil Di Verifikasi !
		  </div>');
		redirect("admin/validasi");
	}
	public function hapusPembayaran($id, $id_kelas, $nama_kelas)
	{
		$this->load->model('M_admin');
		$where = ['id' => $id];
		$this->M_admin->hapusBayar($where, $id_kelas, $nama_kelas, 'peserta');
		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
					Peserta berhasil dihapus !
					  </div>');
		redirect("admin/data_peserta/$id_kelas/$nama_kelas/");
	}
	public function jenisPendaftar()
	{
		$data['title'] = 'Jenis Pendaftar';
		$data['akun_user'] = $this->db->get_where(
			'akun_user',
			['email' => $this->session->userdata('email')]
		)->row_array();

		$query = "SELECT * 
					FROM jenis_pendaftar ";
		$data['jenis_pendaftar'] = $this->db->query($query)->result_array();
		// var_dump($data['tarif']);
		// die;		
		$this->form_validation->set_rules('nama_jenis', 'Jenis Pendaftar', 'required');

		if ($this->form_validation->run() == false) {
			$this->load->view('templates/header', $data);
			$this->load->view('templates/sidebar', $data);
			$this->load->view('templates/topbar_admin', $data);
			$this->load->view('admin/jenis_pendaftar', $data);
			$this->load->view('templates/footer');
		} else {
			$this->db->insert('jenis_pendaftar', [
				'nama_jenis' => $this->input->post('nama_jenis')
			]);
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> Jenis Pendaftar berhasil ditambahan ! </div>');
			redirect('admin/jenisPendaftar');
		}
	}
	public function hapusjenisPendaftar($id)
	{
		$this->load->model('M_admin');
		$where = ['id' => $id];
		$this->M_admin->hapus_jenisPendaftar($where, 'jenis_pendaftar');
		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
					Jenis pendaftar berhasil dihapus !
					  </div>');
		redirect('admin/jenisPendaftar');
	}
	public function edit_jenisPendaftar()
	{
		$nama_jenis = $this->input->post('nama_jenis');
		$id = $this->input->post('id');

		$data = [
			'nama_jenis' => $nama_jenis
		];
		// var_dump($data);
		// die;
		$where = ['id' => $id];

		$this->db->where($where);
		$this->db->update('jenis_pendaftar', $data);

		//$this->M_admin->edit_tarif($where, $data);

		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
					Jenis pendaftar berhasil di ubah !
					  </div>');
		redirect('admin/jenisPendaftar');
	}
}
