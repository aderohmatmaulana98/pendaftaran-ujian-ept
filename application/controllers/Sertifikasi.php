<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Sertifikasi extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		is_logged_in();
		date_default_timezone_set('Asia/Jakarta');
		$this->load->model('M_sertifikasi');
		$this->M_sertifikasi->hapus_otomatis();
	}


	public function ujian_bahasa()
	{
		$data['title'] = 'Ujian Bahasa EPT';
		$data['akun_user'] = $this->db->get_where(
			'akun_user',
			['email' => $this->session->userdata('email')]
		)->row_array();

		$id_user = $data['akun_user']['id'];
		$query = "SELECT boking_kelas.*, akun_user.`nama`, akun_user.`no_identitas`, kelas.`nama_kelas`,tarif.`tarif`, kelas.`tanggal_ujian`
					FROM akun_user, boking_kelas, kelas, tarif
					WHERE boking_kelas.`id_akun_user` = akun_user.`id`
					AND boking_kelas.`id_kelas`=kelas.`id`
					AND akun_user.`id_jenis` = tarif.`id_jenis`
					AND boking_kelas.`id_tarif`= tarif.`id`	
					AND akun_user.`id` = $id_user
					GROUP BY boking_kelas.`id`";

		$data['boking_kelas']  = $this->db->query($query)->result_array();
		$id_user = $data['akun_user']['id'];
		$query = "SELECT peserta.*, akun_user.`nama`,akun_user.`no_identitas`, kelas.`nama_kelas`
		FROM peserta, akun_user, kelas, boking_kelas
		WHERE peserta.`id_akun_user`=akun_user.`id`
		AND peserta.`id_boking` = boking_kelas.`id`
		AND boking_kelas.`id_kelas` = kelas.`id`
		AND akun_user.`id` = $id_user
		GROUP BY peserta.`id`";

		$data['status_pendaftaran'] = $this->db->query($query)->result_array();

		$sql = "SELECT (boking_kelas.`tanggal_pesan`-NOW()) AS sisa_waktu
				FROM boking_kelas,akun_user
				WHERE boking_kelas.`id_akun_user`=akun_user.`id`
				AND akun_user.`id`=$id_user";
		$data['sisa_waktu'] = $this->db->query($sql)->row();
		if ($this->form_validation->run() == false) {
			$this->load->view('templates/header', $data);
			$this->load->view('templates/sidebar', $data);
			$this->load->view('templates/topbar', $data);
			$this->load->view('sertifikasi/ujian_bahasa', $data);
			$this->load->view('sertifikasi/status_pendaftaran', $data);
			$this->load->view('templates/footer');
		}
	}

	public function daftar_kelas()
	{
		$data['title'] = 'Daftar Kelas';
		$data['akun_user'] = $this->db->get_where(
			'akun_user',
			['email' => $this->session->userdata('email')]
		)->row_array();

		$sql = "UPDATE kelas
				SET kelas.status_kelas = 'Tutup'
				WHERE kelas.tanggal_ujian <= NOW()";
		$data['kelas1'] = $this->db->query($sql);

		$sql = "UPDATE kelas
				SET kelas.status_kelas = 'Penuh'
				WHERE kelas.sisa_kuota = 0";
		$data['kelas1'] = $this->db->query($sql);

		$id_akun_user = $data['akun_user']['id'];
		$query = "SELECT  kelas.*
					FROM kelas
					WHERE  kelas.`tanggal_ujian` >= NOW()
				GROUP BY   kelas.`id`";

		$data['kelas'] = $this->db->query($query)->result_array();


		$sql = "SELECT `akun_user`.id, kelas.`id` as id_kelas
		FROM akun_user, boking_kelas, kelas
		WHERE akun_user.`id`=boking_kelas.`id_akun_user`
		AND boking_kelas.`id_kelas`=kelas.`id`
		AND `akun_user`.`id`=$id_akun_user";
		$data['boking'] = $this->db->query($sql)->result_array();

		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('sertifikasi/daftar_kelas', $data);
		$this->load->view('templates/footer');
	}
	public function bo_kelas($id, $tanggal_ujian)
	{
		$data['akun_user'] = $this->db->get_where(
			'akun_user',
			['email' => $this->session->userdata('email')]
		)->row_array();
		$id_akun_user = $data['akun_user']['id'];
		$nama = $data['akun_user']['nama'];
		$email = $data['akun_user']['email'];

		$cek_pendaftaran = "SELECT COUNT(`akun_user`.id) AS jumlah
		FROM akun_user, boking_kelas, kelas
		WHERE akun_user.id= boking_kelas.`id_akun_user`
		AND boking_kelas.`id_kelas` = kelas.`id`
		AND akun_user.`id` = $id_akun_user
		AND kelas.`id` = $id";

		$pendaftaran = $this->db->query($cek_pendaftaran)->row();
		$pendaftaran = $pendaftaran->jumlah;

		$cek_tanggal_pendaftaran = "SELECT COUNT(`akun_user`.id) AS jumlah
		FROM akun_user, boking_kelas, kelas
		WHERE akun_user.id= boking_kelas.`id_akun_user`
		AND boking_kelas.`id_kelas` = kelas.`id`
		AND akun_user.`id` = $id_akun_user
		AND DATE(kelas.`tanggal_ujian`) = '$tanggal_ujian'";
		$tgl_ujian = $this->db->query($cek_tanggal_pendaftaran)->row();
		$tgl_ujian = $tgl_ujian->jumlah;

		if ($pendaftaran > 0) {
			$this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
			Anda telah terdaftar dikelasi ini sebelumnya.
			<button type="button" class="close" data-dismiss="alert" aria-label="Close">
				<span aria-hidden="true">&times;</span>
			</button>
		</div>');
			redirect('sertifikasi/ujian_bahasa');
		} else if ($tgl_ujian > 0) {
			$this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
			Tidak boleh pesan kelas ditanggal yang sama.
			<button type="button" class="close" data-dismiss="alert" aria-label="Close">
				<span aria-hidden="true">&times;</span>
			</button>
		</div>');
			redirect('sertifikasi/ujian_bahasa');
		} else {

			$query = "SELECT  tarif.`id`
					FROM akun_user, jenis_pendaftar, tarif
					WHERE  akun_user.`id_jenis`= jenis_pendaftar.`id`
					AND	jenis_pendaftar.`id`=tarif.`id_jenis`
					AND akun_user.`id`= $id_akun_user";
			$id_tarif = $this->db->query($query)->row();
			$id_kelas = $id;
			$id_tarif = $id_tarif->id;
			$tanggal_pesan = date("Y/m/d H:i:s");
			$status_boking = "Terboking";
			$is_active = 1;
			$date_created = time();

			$data = [
				'id_akun_user' => $id_akun_user,
				'id_kelas' => $id_kelas,
				'id_tarif' => $id_tarif,
				'tanggal_pesan' => $tanggal_pesan,
				'status_boking' => $status_boking,
				'is_active' => $is_active,
				'date_created' => $date_created
			];

			$sql = "SELECT sisa_kuota
					FROM kelas
					WHERE id=$id_kelas";
			$sisa = $this->db->query($sql)->row();
			$sisa = $sisa->sisa_kuota;
			$sisa = $sisa - 1;
			$habis = "Tutup";
			$query = "UPDATE kelas 
						SET kelas.`status_kelas` = '$habis' 
						WHERE kelas.`id` = $id_kelas";

			$this->db->insert('boking_kelas', $data);
			$this->_emailBayar($nama, $email);
			$this->hapus_otomatis($id_kelas);
			$this->db->set('sisa_kuota', $sisa)->where('id', $id_kelas)->update('kelas');
			if ($sisa < 1) {
				$this->db->query($query);
			}


			$this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">
			<strong>Kelas berhasil dipesan, Silahkan cek email anda. </strong> Pesanan akan dihapus jika tidak dikonfirmasi sesuai batas waktu konfirmasi.
			<button type="button" class="close" data-dismiss="alert" aria-label="Close">
				<span aria-hidden="true">&times;</span>
			</button>
		</div>');
			redirect("sertifikasi/ujian_bahasa");
		}
	}
	public function _emailBayar($nama, $email)
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
		$this->email->subject('Pemesanan kelas berhasil');
		$this->email->message('Hai ' . "$nama" . '<br><br><br>
			Selamat anda telah berhasil memesan kelas ujian bahasa inggris EPT <br><br>	
			Berikutnya silahkan melakukan pembayaran melalui nomor rekening dibawah ini: <br><br>
			
			Bank Jateng 1005003730 Yayasan Dharma Bakti IPTEK<br>
			Bank Bukopin 1000920041 Yayasan Dharma Bakti IPTEK<br>
			Bank Mandiri 1370002233662 Yayasan Dharma Bakti IPTEK<br>
			Bank BPD DIY 006111001274 Yayasan Dharma Bakti IPTEK <br><br>

			Setelah selesai membayar silahkan konfirmasi pada halaman ujian bahasa EPT atau klik link <a href="' . base_url() . 'sertifikasi/ujian_bahasa' . '">disini</a><br> 
			
			Terimaksih telah mendaftar  ujian bahasa inggris atau English Proficiensi Test<br><br>
			-Pusdiklat & Sertifikasi UTY');

		if ($this->email->send()) {
			return true;
		} else {
			echo $this->email->print_debugger();
		}
	}
	public function hapus_otomatis($id_kelas)
	{
		$data['akun_user'] = $this->db->get_where(
			'akun_user',
			['email' => $this->session->userdata('email')]
		)->row_array();
		$id_akun_user = $data['akun_user']['id'];
		$time = time();
		$lama = 86400;
		$sql = "SELECT sisa_kuota
					FROM kelas
					WHERE id=$id_kelas";
		$sisa = $this->db->query($sql)->row();
		$sisa = $sisa->sisa_kuota;
		$sisa = $sisa + 1;
		$hapus = "DELETE FROM boking_kelas
							WHERE ($time - boking_kelas.`date_created`) > $lama
							  AND boking_kelas.`id_akun_user` = $id_akun_user
							  AND boking_kelas.`is_active` = 1 ";

		$this->db->query($hapus);
		if ($hapus) {
			$this->db->set('sisa_kuota', $sisa)->where('id', $id_kelas)->update('kelas');
		}
	}
	public function konfirmasi($id)
	{
		$data['title'] = 'Daftar Kelas';
		$data['akun_user'] = $this->db->get_where(
			'akun_user',
			['email' => $this->session->userdata('email')]
		)->row_array();

		$nama = $data['akun_user']['nama'];
		$email = $data['akun_user']['email'];

		$this->form_validation->set_rules('nama', 'Nama', 'required');
		$this->form_validation->set_rules('kelas', 'Kelas', 'required');
		$this->form_validation->set_rules('no_slip', 'No Slip', 'required');
		$this->form_validation->set_rules('bukti_bayar', 'Bukti Bayar', 'required');
		$id_akun_user = $data['akun_user']['id'];
		$id_boking = $id;
		$no_slip = $this->input->post('no_slip');
		$bukti_bayar = $_FILES['bukti_bayar'];
		$query = "SELECT COUNT(*)
					FROM peserta
					WHERE peserta.`no_slip`='$no_slip'
					GROUP BY peserta.`id` ";
		$slip = $this->db->query($query)->row();

		// var_dump($tgl_konfir);
		// die;

		if ($slip > 0) {
			$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Kode transaksi sudah digunakan</div>');
			redirect('sertifikasi/ujian_bahasa');
		}
		if ($bukti_bayar = '') {
		} else {
			$config['allowed_types']        = 'gif|jpg|png|jpeg';
			$config['max_size'] = '2048';
			$config['upload_path'] = './assets/img/slip';
			$this->upload->initialize($config);

			if (!$this->upload->do_upload('bukti_bayar')) {
				$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Data Belum Lengkap, Harap upload foto slip pembayaran</div>');
				redirect('sertifikasi/ujian_bahasa');
			} else {
				$bukti_bayar = $this->upload->data('file_name');
			}
		}

		$data = [
			'id_akun_user' => $id_akun_user,
			'id_boking' => $id_boking,
			'no_slip' => $no_slip,
			'tanggal_bayar' => date("Y/m/d H:i:s"),
			'status' => 'Pending',
			'update_at' => time(),
			'bukti_bayar' => $bukti_bayar
		];
		$active = 0;
		$query = "UPDATE boking_kelas 
					SET boking_kelas.`is_active` = $active 
					WHERE boking_kelas.`id` = $id_boking";
		$this->db->insert('peserta', $data);
		$this->_kirimEmail($nama, $email);

		$this->db->query($query);
		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
			Pendaftaran berhasil dikonfirmasi, silahkan cek email untuk informasi selanjutnya !
		  </div>');
		redirect('sertifikasi/ujian_bahasa');
	}
	public function _kirimEmail($nama, $email)
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
			Selamat anda telah berhasil mendaftar ujian bahasa inggris EPT <br><br><br>			
			Berikutnya silahkan tunggu status pendaftaran anda diverifikasi oleh admin <br>jangan lupa cek email secara berkala <br> 			
			Terimaksih telah mendaftar  ujian bahasa inggris atau English Proficiensi Test<br><br>
			-Pusdiklat & Sertifikasi UTY');

		if ($this->email->send()) {
			return true;
		} else {
			echo $this->email->print_debugger();
		}
	}

	public function status_pendaftaran()
	{
		$data['title'] = 'Status Pendaftaran';
		$data['akun_user'] = $this->db->get_where(
			'akun_user',
			['email' => $this->session->userdata('email')]
		)->row_array();
		$id_user = $data['akun_user']['id'];
		$query = "SELECT peserta.*, akun_user.`nama`,akun_user.`no_identitas`, kelas.`nama_kelas`
		FROM peserta, akun_user, kelas, boking_kelas
		WHERE peserta.`id_akun_user`=akun_user.`id`
		AND peserta.`id_boking` = boking_kelas.`id`
		AND boking_kelas.`id_kelas` = kelas.`id`
		AND akun_user.`id` = $id_user
		GROUP BY peserta.`id`";

		$data['status_pendaftaran'] = $this->db->query($query)->result_array();

		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('sertifikasi/status_pendaftaran', $data);
		$this->load->view('templates/footer');
	}
	public function kartu_ujian($id)
	{
		$data['akun_user'] = $this->db->get_where(
			'akun_user',
			['email' => $this->session->userdata('email')]
		)->row_array();
		$id_peserta = $id;
		$id_akun_user = $data['akun_user']['id'];


		$query = "SELECT peserta.`id`, akun_user.`nama`,akun_user.`no_identitas`, akun_user.`foto_profil`, akun_user.`tgl_lahir`, kelas.`nama_ruangan`,kelas.`lokasi`, kelas.`tanggal_ujian`, akun_user.`id_jenis`, akun_user.`no_hp`
		FROM peserta, akun_user, kelas, boking_kelas
		WHERE peserta.`id_akun_user`=akun_user.`id`
		AND peserta.`id_boking`=boking_kelas.`id`
		AND boking_kelas.`id_kelas`=kelas.`id`
		AND akun_user.`id`= $id_akun_user
		AND peserta.`id` = $id_peserta";

		$data['kartu_ujian'] = $this->db->query($query)->row_array();
		$this->load->library('pdf');
		$this->pdf->setPaper('A4', 'potrait');
		$this->pdf->filename = "kartu_ujian.pdf";
		$this->pdf->load_view('sertifikasi/kartu_ujian', $data);
	}
	public function prosedur_pendaftaran()
	{
		$data['title'] = 'Prosedur Pendaftaran';
		$data['akun_user'] = $this->db->get_where(
			'akun_user',
			['email' => $this->session->userdata('email')]
		)->row_array();

		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('sertifikasi/prosedur_pendaftaran', $data);
		$this->load->view('templates/footer');
	}
	public function pengumuman()
	{
		$data['title'] = 'Pengumuman';
		$data['akun_user'] = $this->db->get_where(
			'akun_user',
			['email' => $this->session->userdata('email')]
		)->row_array();

		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('sertifikasi/pengumuman', $data);
		$this->load->view('templates/footer');
	}
}
