<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
	<title>Laporan Per kelas</title>
</head>

<body>
	<table style="width: 100%;">
		<tr>
			<td>
				<div style="text-align: center;" class="">
					<div align="left" width="40%">
						<img src="<?= base_url('/assets/img/logo-uty.png') ?>" height="120px" width="120px" alt="Gambar" style="position: absolute; margin-top: 1px;">

					</div>
					<div style="margin-top: 10px;">
						<h3 align="center"><b>Pusdiklat dan Sertifikasi Universitas Teknologi Yogyakarta</b></h3>
						<p>
							Jl. Siliwangi (Ringroad Utara) - Jombor, Sleman D.I. Yogyakarta - Indonesia 55285 <br>
							Telp. (0274) 623310 | fax. (0274)623306 | E-mail: info@uty.ac.id <br>
							Website: www.uty.ac.id | English Profesiensi Test 2020
						</p>
					</div>
				</div>
			</td>
		</tr>
	</table>
	<hr style=" border: 0; border-style: inset; border-top: 1px solid #000;">
	<table>
		<tr>
			<td><b>Kelas</b></td>
			<td>:</td>
			<td><?= $kl['nama_kelas'] ?></td>
		</tr>
		<tr>
			<td><b>Ruangan</b></td>
			<td>:</td>
			<td><?= $kl['nama_ruangan'] ?></td>
		</tr>
		<tr>
			<td><b>Tanggal Pelaksanaan</b></td>
			<td>:</td>
			<td><?= nama_hari(date('l', strtotime($kl["tanggal_ujian"]))) ?>, <?= $kl['tanggal_ujian'] ?></td>
		</tr>
	</table>
	<br>
	<div class="table-responsive">
		<table class="table table-bordered">
			<thead>
				<tr>
					<th scope="col">
						#
					</th>
					<th scope="col">Nama Lengkap</th>
					<th scope="col">No Identitas</th>
					<th scope="col">Jenis Pendaftar</th>
					<th scope="col">Program Studi</th>
					<th scope="col">Institusi</th>
				</tr>
			</thead>
			<tbody>
				<?php $i = 1 ?>
				<?php foreach ($lap_kel as $lk) : ?>
					<tr>
						<th scope="row"><?= $i++ ?></th>
						<td><?= $lk['nama']; ?></td>
						<td><?= $lk['no_identitas']; ?></td>
						<td><?= $lk['nama_jenis']; ?></td>
						<td><?= $lk['nama_prodi']; ?></td>
						<td><?= $lk['nama_institusi']; ?></td>
					</tr>
				<?php endforeach; ?>
			</tbody>
		</table>
	</div>
</body>

</html>
