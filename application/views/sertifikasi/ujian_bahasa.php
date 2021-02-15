<!-- Begin Page Content -->
<div class="container-fluid">
	<!-- Page Heading -->
	<h1 class="h3 mb-4 text-gray-800"><?= $title ?></h1>

	<div class="alert alert-warning alert-dismissible fade show" role="alert">
		<strong>Perhatian !</strong> Silahkan pesan kelas terlebih dahulu.
		<button type="button" class="close" data-dismiss="alert" aria-label="Close">
			<span aria-hidden="true">&times;</span>
		</button>
	</div>

	<div>
		<?= $this->session->flashdata('message');  ?>
	</div>
	<div class="row">
		<div class="col-lg">
			<?php if (validation_errors()) : ?>
				<div class="alert alert-danger" role="alert">
					<?= validation_errors(); ?>
				</div>
			<?php endif; ?>
			<div class="col-sm-10 ">

			</div>
			<!-- DataTales Example -->
			<div class="card shadow">
				<div class="card-header bg-primary border-bottom-warning text-light">
					<div class="row">
						<div class="col-6">
							<h4>Pesan kelas</h4>
						</div>
						<div class="col-6 text-right ">
							<a href="<?= base_url('sertifikasi/daftar_kelas')  ?>" class="btn btn-success " id="boking">Booking Kelas</a>
						</div>
					</div>
				</div>
				<div class="card-body">
					<div class="table-responsive">
						<table class="table table-hover" id="dataTable">
							<thead>
								<tr>
									<th scope="col">#</th>
									<th scope="col">Kode Booking</th>
									<th scope="col">Kelas</th>
									<th scope="col">Tanggal Ujian</th>
									<th scope="col">Jam</th>
									<th scope="col">Tanggal Pesan</th>
									<th scope="col">Biaya</th>
									<th scope="col">Batas Waktu Konfirmasi</th>
									<th scope="col">Status Boking</th>
									<th scope="col">Aksi</th>
								</tr>
							</thead>
							<tbody>
								<?php $i = 1 ?>
								<?php foreach ($boking_kelas as $bk) : ?>
									<tr>
										<th scope="row"><?= $i++ ?></th>
										<td><?= $bk['id']; ?></td>
										<td><?= $bk['nama_kelas']; ?></td>
										<td><?= date('d-M-Y', strtotime($bk['tanggal_ujian'])); ?></td>
										<td><?= date('H:i', strtotime($bk['tanggal_ujian'])); ?></td>
										<td><?= date('d-M-Y', $bk['date_created']); ?></td>
										<td>Rp.<?= $bk['tarif']; ?>,00</td>
										<td>
											<div id="loaded">
												<input type="text" class="form-control" id="screen" readonly value="<?php
																													$besok = $bk['date_created'] + 86400;
																													$target = mktime(date('H', $besok), date('i', $besok), date('s', $besok), date('m', $besok), date('d', $besok), date('Y', $besok));
																													$hari_ini = time();
																													$rentang = ($target - $hari_ini);
																													$hari = (int) ($rentang / 86400);
																													$sisa = $rentang % 86400;
																													$jam  = (int)($sisa / 3600);
																													$sisa = $sisa  % 3600;
																													$menit = (int) ($sisa / 60);
																													$sisa  = $sisa  % 60;
																													$detik = (int)($sisa / 1);
																													$waktu = $jam . ':' . $menit . ':' . $detik;
																													if ($jam > 0 && !$bk['is_active'] == 0) {
																														print " $jam jam $menit menit $detik detik ";
																													} else if ($bk['is_active'] == 0) {
																														print "Terkonfirmasi";
																													} else {
																														echo ("waktu habis");
																													}

																													?>">

											</div>
										</td>
										<td><?= $bk['status_boking']; ?></td>
										<td>
											<?php if ($bk['is_active'] == 0) : ?>

												<a data-toggle="tooltip" data-placement="right" title="Berhasil Konfirmasi" class=" badge badge-secondary py-1" href="<?= base_url('sertifikasi/konfirmasi/' . $bk['id']) ?>" onclick="return false;">
													<svg width="2.0em" height="2.0em" viewBox="0 0 16 16" class="bi bi-hourglass-split" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
														<path fill-rule="evenodd" d="M2.5 15a.5.5 0 1 1 0-1h1v-1a4.5 4.5 0 0 1 2.557-4.06c.29-.139.443-.377.443-.59v-.7c0-.213-.154-.451-.443-.59A4.5 4.5 0 0 1 3.5 3V2h-1a.5.5 0 0 1 0-1h11a.5.5 0 0 1 0 1h-1v1a4.5 4.5 0 0 1-2.557 4.06c-.29.139-.443.377-.443.59v.7c0 .213.154.451.443.59A4.5 4.5 0 0 1 12.5 13v1h1a.5.5 0 0 1 0 1h-11zm2-13v1c0 .537.12 1.045.337 1.5h6.326c.216-.455.337-.963.337-1.5V2h-7zm3 6.35c0 .701-.478 1.236-1.011 1.492A3.5 3.5 0 0 0 4.5 13s.866-1.299 3-1.48V8.35zm1 0c0 .701.478 1.236 1.011 1.492A3.5 3.5 0 0 1 11.5 13s-.866-1.299-3-1.48V8.35z" />
													</svg>
												</a>
											<?php else : ?>
												<a class=" badge badge-primary" href="<?= base_url('sertifikasi/konfirmasi/' . $bk['id']) ?>" data-toggle="modal" data-target="#konfirmasiModal<?= $bk['id'] ?>">
													Konfirmasi
												</a>
											<?php endif; ?>
											<!-- Modal -->
											<div class="modal fade" id="konfirmasiModal<?= $bk['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="konfirmasiModalLabel" aria-hidden="true">
												<div class="modal-dialog">
													<div class="modal-content">
														<div class="modal-header">
															<h5 class="modal-title" id="konfirmasiModalLabel">Konfirmasi Pembayaran</h5>
															<button type="button" class="close" data-dismiss="modal" aria-label="Close">
																<span aria-hidden="true">&times;</span>
															</button>
														</div>
														<div class="modal-body">
															<form action="<?= base_url('sertifikasi/konfirmasi/') . $bk['id']; ?>" method="POST" enctype="multipart/form-data">

																<div class="form-group">
																	<label for="nama">Kode Booking</label>
																	<input type="text" class="form-control" id="id" name="id" value="<?= $bk['id']; ?>" readonly>
																</div>
																<div class="form-group">
																	<label for="nama">Nama Lengkap</label>
																	<input type="text" class="form-control" id="nama" value="<?= $akun_user['nama'];  ?>" name="nama" readonly>
																</div>
																<div class="form-group">
																	<label for="kelas">Kelas</label>
																	<input type="text" class="form-control" id="kelas" name="kelas" value="<?= $bk['nama_kelas'];  ?>" readonly>
																</div>
																<div class="form-group">
																	<label for="no_slip">Kode Transaksi Pembayaran</label>
																	<input type="text" class="form-control" id="no_slip" name="no_slip" required oninvalid="this.setCustomValidity('data tidak boleh kosong')" oninput="setCustomValidity('')">
																	<small>(Kode transaksi pembayaran harus sama dengan yang ada di bukti pembayaran!)</small>
																</div>
																<div class="form-group">
																	<label for="bukti_bayar">Bukti Pembayaran</label>
																	<div class="custom-file">
																		<input type="file" class="custom-file-input" id="bukti_bayar" name="bukti_bayar" required oninvalid="this.setCustomValidity('data tidak boleh kosong')" oninput="setCustomValidity('')">
																		<label class="custom-file-label" for="bukti_bayar">Choose file</label>
																	</div>
																</div>
														</div>
														<div class="modal-footer">
															<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
															<button type="submit" class="btn btn-primary">Konfirmasi</button>
														</div>
														</form>
													</div>
												</div>
											</div>
										</td>
									</tr>
								<?php endforeach; ?>
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- Button trigger modal -->
<!-- <script>
	window.onload = function() {
		if (!window.location.hash) {
			window.location = window.location + '#loaded';
			window.location.reload();
		}
	}
	// $(document).ready(function() {
	// 	$("#div_refresh").load("sertifikasi/ujian_bahasa");
	// 	setInterval(function() {
	// 		$("#div_refresh").load("sertifikasi/ujian_bahasa");
	// 	}, 1000);
	// });
</script> -->