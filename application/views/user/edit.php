<!-- Begin Page Content -->
<div class="container-fluid">

	<!-- Page Heading -->
	<h1 class="h3 mb-4 text-gray-800"><?= $title ?></h1>

	<div class="row">
		<div class="col-lg-8">
			<form class="user" id="form1" method="POST" action="<?= base_url('user/edit') ?>" enctype="multipart/form-data">
				<div class="form-group row">
					<label for="email" class="col-sm-2 col-form-label">Email</label>
					<div class="col-sm-10">
						<input type="text" class="form-control" value="<?= $akun_user['email'];   ?>" name="email" id="email" readonly>
					</div>
				</div>
				<div class="form-group row">
					<label for="name" class="col-sm-2 col-form-label">Nama Lengkap</label>
					<div class="col-sm-10">
						<input type="text" value="<?= $akun_user['nama'];   ?>" class="form-control" name="name" id="name">
						<?= form_error('name', '<small class="text-danger pl-3">', '</small>'); ?>
					</div>
				</div>

				<div class="form-group row">
					<label for="no_identitas" class="col-sm-2 col-form-label">No Identitas</label>
					<div class="col-sm-10">
						<input type="text" class="form-control" id="no_identitas" name="no_identitas" value="<?= $akun_user['no_identitas']; ?>" placeholder="Nomor identitas">
						<?= form_error('no_identitas', '<small class="text-danger pl-3">', '</small>'); ?>
					</div>
				</div>
				<div class="form-group row">
					<label for="tempat_lahir" class="col-sm-2 col-form-label">Tempat Lahir</label>
					<div class="col-sm-10">
						<input type="text" class="form-control" id="tempat_lahir" name="tempat_lahir" value="<?= $akun_user['tempat_lahir'];   ?>" placeholder="Tempat Lahir">
						<?= form_error('tempat_lahir', '<small class="text-danger pl-3">', '</small>'); ?>
					</div>
				</div>
				<div class="form-group row">
					<label for="tgl_lahir" class="col-sm-2 col-form-label">Tanggal Lahir</label>
					<div class="col-sm-10">
						<input type="date" class="form-control" id="tgl_lahir" name="tgl_lahir" value="<?= $akun_user['tgl_lahir'];   ?>" placeholder="Tanggal Lahir">
						<?= form_error('tgl_lahir', '<small class="text-danger pl-3">', '</small>'); ?>
					</div>
				</div>
				<div class="form-group row">
					<label for="jenis_kelamin" class="col-sm-2 col-form-label">Jenis Kelamin</label>
					<div class="col-sm-10">
						<select class="custom-select" id="jenis_kelamin" name="jenis_kelamin">

							<?php
							if (!$akun_user['jenis_kelamin']) : ?>
								<option value="" selected disabled>---Pilih Jenis Kelamin---</option>
								<option value="Pria">Pria</option>
								<option value="Wanita">Wanita</option>
							<?php elseif ($akun_user['jenis_kelamin'] == 'Pria') : ?>
								<option value="" disabled>---Pilih Jenis Kelamin---</option>
								<option selected value="Pria">Pria</option>
								<option value="Wanita">Wanita</option>
							<?php elseif ($akun_user['jenis_kelamin'] == 'Wanita') : ?>
								<option value="" disabled>---Pilih Jenis Kelamin---</option>
								<option value="Pria">Pria</option>
								<option selected value="Wanita">Wanita</option>
							<?php endif; ?>
						</select>
						<?= form_error('jenis_kelamin', '<small class="text-danger pl-3">', '</small>'); ?>
					</div>
				</div>
				<div class="form-group row">
					<label for="jenis_pendaftar" class="col-sm-2 col-form-label">Jenis Pendaftar</label>
					<div class="col-sm-10">
						<select class="custom-select" id="jenis_pendaftar" name="jenis_pendaftar">
							<option value="" selected disabled>---Pilih Jenis Pendaftar---</option>
							<?php foreach ($jenis_pendaftar as $jp) :  ?>
								<option value="<?= $jp['id']  ?>"><?= $jp['nama_jenis']  ?></option>
							<?php endforeach ?>
						</select>
						<?= form_error('jenis_pendaftar', '<small class="text-danger pl-3">', '</small>'); ?>
					</div>
				</div>
				<div class="form-group row">
					<label for="prodi" class="col-sm-2 col-form-label">Prodi</label>
					<div class="col-sm-10">
						<select class="custom-select " id="prodi" name="prodi">
							<option value="" selected disabled>---Pilih Prodi---</option>
							<?php foreach ($prodi as $p) :  ?>
								<option value="<?= $p['id'] ?>"><?= $p['nama_prodi']  ?></option>
							<?php endforeach ?>
						</select>
					</div>
				</div>
				<div class="form-group row">
					<label for="institusi" class="col-sm-2 col-form-label">Institusi</label>
					<div class="col-sm-10">
						<select class="custom-select" id="institusi" name="institusi">
							<option value="" selected disabled>---Pilih Institusi---</option>
							<?php foreach ($institusi as $i) :  ?>
								<option value="<?= $i['id'] ?>"><?= $i['nama_institusi']  ?></option>
							<?php endforeach ?>
						</select>
					</div>
				</div>
				<div class="form-group row">
					<label for="no_hp" class="col-sm-2 col-form-label">No Telepon</label>
					<div class="col-sm-10">
						<input type="text" class="form-control" id="no_hp" name="no_hp" value="<?= $akun_user['no_hp'];   ?>" placeholder="Nomor Telepon">
						<?= form_error('no_hp', '<small class="text-danger pl-3">', '</small>'); ?>
					</div>
				</div>
				<div class="form-group row">
					<div class="col-sm-2">Foto Identitas</div>
					<div class="col-sm-10">
						<div class="row">
							<div class="col-sm-3">
								<img src="<?= base_url('assets/img/identitas/') . $akun_user['foto_identitas'];  ?>" class="img-thumbnail">
							</div>
							<div class="col-sm-9">
								<div class="custom-file">
									<input type="file" class="custom-file-input" id="foto_identitas" name="foto_identitas">
									<label class="custom-file-label" for="foto_identitas">Choose file</label>
									<?= form_error('foto_identitas', '<small class="text-danger pl-3">', '</small>'); ?>
								</div>
							</div>
						</div>
					</div>
				</div>

				<div class="form-group row">
					<div class="col-sm-2">Foto Profil</div>
					<div class="col-sm-10">
						<div class="row">
							<div class="col-sm-3">
								<img src="<?= base_url('assets/img/profile/') . $akun_user['foto_profil'];  ?>" class="img-thumbnail">
							</div>
							<div class="col-sm-9">
								<div class="custom-file">
									<input type="file" class="custom-file-input" id="foto_profil" name="foto_profil">
									<label class="custom-file-label" for="foto_profile">Choose file</label>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="form-group row justify-content-end">
					<div class="col-sm-10">
						<button type="submit" class="btn btn-lg btn-primary">Edit</button>
					</div>
				</div>
			</form>
		</div>
	</div>

</div>
</div>
<!-- End of Main Content -->

<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script>
	$(function() {
		$("#institusi").change(function() {
			var matikan = $("#institusi option:selected").text();
			if (matikan != "Unversitas Teknolgi Yogyakarta") {
				$('select[id="prodi"]').attr('disabled', false);
			} else {
				$('select[id="prodi"]').attr('disabled', true);
			}
		})
	})
</script>
