<!-- Content Wrapper -->
<div id="content-wrapper" class="d-flex flex-column">

	<!-- Main Content -->
	<div id="content">

		<!-- Topbar -->
		<nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

			<!-- Sidebar Toggle (Topbar) -->
			<button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
				<i class="fa fa-bars"></i>
			</button>
			<?php
			$notif = "SELECT akun_user.`nama`, akun_user.`no_identitas`, kelas.`nama_kelas`, peserta.`no_slip`, peserta.`tanggal_bayar`, peserta.`status`, peserta.`bukti_bayar`
						FROM akun_user, kelas, peserta, boking_kelas
						WHERE akun_user.`id` = peserta.`id_akun_user`
						AND kelas.`id` = boking_kelas.`id_kelas`
						AND `boking_kelas`.`id`=peserta.`id_boking`
						AND peserta.`status`='Pending'";

			$notifikasi = $this->db->query($notif)->result_array();

			$alert = "SELECT COUNT(*) FROM peserta WHERE peserta.`status`='Pending'";

			$alert1 = $this->db->query($alert)->row_array();
			?>
			<!-- Topbar Navbar -->
			<ul class="navbar-nav ml-auto">

				<li class="nav-item dropdown no-arrow mx-1">
					<a class="nav-link dropdown-toggle" href="<?= base_url('admin/validasi') ?>" id="alertsDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
						<i class="fas fa-bell fa-fw"></i>
						<!-- Counter - Alerts -->
						<?php foreach ($alert1 as $al) : ?>
							<span class="badge badge-danger badge-counter"><?= $al ?></span>
						<?php endforeach; ?>
					</a>


					<!-- Dropdown - Alerts -->
					<div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="alertsDropdown">
						<h6 class="dropdown-header">
							Notifikasi
						</h6>
						<?php foreach ($notifikasi as $noti) :  ?>
							<a class="dropdown-item d-flex align-items-center" href="#">
								<div class="mr-3">
									<div class="icon-circle bg-primary">
										<i class="fas fa-file-alt text-white"></i>
									</div>
								</div>

								<div>
									<div class="small text-gray-500"><?= date('F d, Y - H:i', strtotime($noti['tanggal_bayar']));  ?></div>
									<span class=""><?= $noti['nama'];  ?> telah melakukan konfirmasi pembayaran</span>
								</div>
							</a>
						<?php endforeach; ?>
						<a class="dropdown-item text-center small text-gray-500" href="<?= base_url('admin/validasi') ?>">Lihat semua data validasi</a>
					</div>

				</li>

				<!-- Nav Item - Messages -->

				<div class="topbar-divider d-none d-sm-block"></div>
				<!-- Notifikasi -->
				<!-- Nav Item - Alerts -->

				<!-- Nav Item - User Information -->
				<li class="nav-item dropdown no-arrow">
					<a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
						<span class="mr-2 d-none d-lg-inline text-gray-600 small"><?= $akun_user['nama']; ?></span>
						<img src="<?= base_url('assets/img/profile/') . $akun_user['foto_profil']; ?>" class="rounded-circle" width="60px" height="60px">
					</a>
					<!-- Dropdown - User Information -->
					<div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
						<a class="dropdown-item" href="<?= base_url('user') ?>">
							<i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
							Profile
						</a>
						<div class="dropdown-divider"></div>
						<a class="dropdown-item" href="<?= base_url('auth/logout') ?>" data-toggle="modal" data-target="#logoutModal">
							<i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
							Logout
						</a>
					</div>
				</li>

			</ul>

		</nav>
		<!-- End of Topbar -->
