<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
	<style>
		.tepi {
			border-style: solid;
		}

		.label {
			float: left;
			width: 200px;
			padding-right: 20px;
		}

		.input {
			float: left;
			padding-left: 0px;
			padding-right: 20px;
			width: calc(100% - 200px);
		}
	</style>
	<title>Kartu_ujian</title>
</head>

<body class="col-lg-7">
	<div class="mt-4 ">
		<table class="tepi" width="600px">
			<tr>
				<td width="1">
					<div class="mx-3">
						<img src="<?= base_url('/assets/img/logo-uty.png') ?>" height="90px" width="90px" alt="">
					</div>
				</td>
				<td>
					<div style="text-align: left;" class="">
						<h7 class=""><b>Pusdiklat dan Sertifikasi Universitas Teknologi Yogyakarta<b></h7>
						<p align="center" style="font-size: 9pt;">
							Jl. Siliwangi (Ringroad Utara) - Jombor, Sleman D.I. Yogyakarta - Indonesia 55285 |
							Telp. (0274) 623310 | fax. (0274)623306 | E-mail: info@uty.ac.id <br>
							Website: www.pusdiklat.uty.ac.id | English Profesiensi Test 2020
						</p>
					</div>
				</td>
			</tr>


		</table>
		<table border="2" class="tepi" width="600px">
			<tr>
				<td>
					<div style="text-align: left;" class="ml-3">
						<div class="ml-2">
							<h7><strong>DATA DIRI</strong> </h7>
						</div>
						<div style="line-height: 25px;">
							<table style="margin-left: 25px;">
								<tr>

									<td style="font-size: 9pt;"><b>No peserta</b></td>
									<td style="font-size: 9pt;">:</td>
									<td style="font-size: 9pt;"><?= $kartu_ujian['id']; ?></td>
									<td width="160px"></td>
									<td rowspan="4" style="padding-right: 7px;">
										<div class="ml-5">
											<span class="border-4">
												<img src="<?= base_url('assets/img/profile/') . $akun_user['foto_profil']; ?>" class="border border-dark" height="90px" width="60px">
											</span>
										</div>
									</td>
								</tr>
								<tr>
									<td style="font-size: 9pt;"><b>Nama peserta</b></td>
									<td>:</td>
									<td style="font-size: 9pt;"><?= $kartu_ujian['nama']; ?></td>
								</tr>
								<tr>
									<?php if ($kartu_ujian['id_jenis'] == 1 || $kartu_ujian['id_jenis'] == 2 || $kartu_ujian['id_jenis'] == 3) :  ?>
										<td style="font-size: 9pt;"><b>NPM</b></td>
										<td style="font-size: 9pt;">: </td>
										<td style="font-size: 9pt;"><?= $kartu_ujian['no_identitas']; ?></td>
									<?php else : ?>
										<td style="font-size: 9pt;"><b>No. Identitas</b></td>
										<td style="font-size: 9pt;">: </td>
										<td style="font-size: 9pt;"><?= $kartu_ujian['no_identitas']; ?></td>
									<?php endif; ?>
								</tr>
								<tr>
									<td style="font-size: 9pt;"><b>Tanggal Lahir</b></td>
									<td style="font-size: 9pt;">:</td>
									<td style="font-size: 9pt;"><?= date('d-m-Y', strtotime($kartu_ujian['tgl_lahir'])); ?></td>
								</tr>
								<tr>
									<td style="font-size: 9pt;"><b>No Telepon</b></td>
									<td style="font-size: 9pt;">:</td>
									<td style="font-size: 9pt;"><?= $kartu_ujian['no_hp']; ?></td>
								</tr>

							</table>

						</div>
					</div>
				</td>
			</tr>
		</table>
		<table border="2" class="tepi" style="border-top: 0px;" width="600px">
			<tr>
				<td>
					<div style="text-align: left;" class="ml-4">
						<div class="">
							<h7><strong>JADWAL UJIAN EPT</strong> </h7>
							<div style="line-height: normal;">
								<div style="line-height: 25px;">
									<table style="margin-left: 20px;">
										<tr>
											<td style="font-size: 9pt;"><b>Hari</b></td>
											<td style="font-size: 9pt;">:</td>
											<td style="font-size: 9pt;"><?= nama_hari(date('l', strtotime($kartu_ujian["tanggal_ujian"])));   ?></td>
										</tr>
										<tr>
											<td style="font-size: 9pt;"><b>Tanggal Ujian</b></td>
											<td style="font-size: 9pt;">:</td>
											<td style="font-size: 9pt;"><?= date('d-m-Y', strtotime($kartu_ujian["tanggal_ujian"]));   ?></td>
										</tr>
										<tr>
											<td style="font-size: 9pt;"><b>Jam</b></td>
											<td style="font-size: 9pt;">: </td>
											<td style="font-size: 9pt;"><?= date('H:i', strtotime($kartu_ujian["tanggal_ujian"])) . ' ' . "WIB";   ?></td>
										</tr>
									</table>
								</div>
								<h7><strong>LOKASI UJIAN EPT</strong> </h7>
								<div style="line-height: 25px;">
									<table style="margin-left: 20px;">
										<tr>
											<td style="font-size: 9pt;"><b>Lokasi</b></td>
											<td style="font-size: 9pt;">:</td>
											<td style="font-size: 9pt;"><?= $kartu_ujian['lokasi']; ?></td>
										</tr>
										<tr>
											<td style="font-size: 9pt;"><b>Ruangan</b></td>
											<td style="font-size: 9pt;">:</td>
											<td style="font-size: 9pt;"><?= $kartu_ujian['nama_ruangan']; ?></td>
										</tr>
									</table>

								</div>
							</div>

						</div>
					</div>
				</td>
			</tr>
		</table>
		<table border="2" class="tepi" width="600px" style="border-top: 0px;">
			<tr>
				<td>
					<div style="text-align: left;" class="col-md-15 ml-3">
						<div class="ml-2">
							<h7><strong>PERHATIAN</strong> </h7>
						</div>
						<div class="ml-0" style="line-height: normal;">
							<ul>
								<li style="font-size: 9pt;">
									Membawa KTM pada saat ujian
								</li>
								<li style="font-size: 9pt;">
									Sudah disediakan alat tulis
								</li>
								<li style="font-size: 9pt;">
									Tidak boleh terlambat dan Tidak boleh pindah jam tanpa ada pembritahuan
								</li>
								<li style="font-size: 9pt;">
									Sertifikat bisa diambil di tempat mendaftar 1 minggu setelah ujian
								</li>
								<li style="font-size: 9pt;">
									Peserta yang tidak terdaftar, dilarang ikut ujian
								</li>
							</ul>
						</div>
					</div>
				</td>
			</tr>
		</table>
	</div>
</body>

</html>
