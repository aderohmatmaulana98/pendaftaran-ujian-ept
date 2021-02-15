<!-- Masthead-->
<header class="musthead">
	<div class="container h-100">
		<div class="row h-100 align-items-center justify-content-center text-center">

		</div>
	</div>
</header>
<!-- form registration -->
<section class="regist">
	<div class="container">
		<div class="card shadow2 pb-3 px-4 card-regis">
			<div class="row">
				<div class="col-md-12">
					<div class="mt-3 mb-5 px-5">
						<h5 class="text-capitalize text-center text-registration">
							Registration form
						</h5>
						<?= $this->session->flashdata('message');  ?>
						<hr class="divider2 ">
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-md-4">
					<div class="container px-2 py-3">

						<form class="user" method="POST" action="<?= base_url('auth/registration') ?>" enctype="multipart/form-data">

							<div class="form-group">
								<label for="nama">Nama lengkap<span class="text-danger">*</span></label>
								<input type="text" class="form-control form-regis" id="nama" value="<?= set_value('nama') ?>" name="nama" aria-describedby="emailHelp">
								<?= form_error('nama', '<small class="text-danger pl-3">', '</small>'); ?>
							</div>
							<div class="form-group">
								<label for="no_identitas">No identitas<span class="text-danger">*</span></label>
								<input type="number" class="form-control form-regis" name="no_identitas" value="<?= set_value('no_identitas') ?>" id="no_identitas" aria-describedby="emailHelp">
								<?= form_error('no_identitas', '<small class="text-danger pl-3">', '</small>'); ?>
							</div>
							<div class="form-group">
								<label for="tempat_lahir">Tempat lahir<span class="text-danger">*</span></label>
								<input type="text" class="form-control" name="tempat_lahir" value="<?= set_value('tempat_lahir') ?>" id="tempat_lahir">
								<?= form_error('tempat_lahir', '<small class="text-danger pl-3">', '</small>'); ?>
							</div>

							<div class="form-group">
								<label for="tgl_lahir">Tanggal lahir<span class="text-danger">*</span></label>
								<input type="date" class="form-control" name="tgl_lahir" value="<?= set_value('tgl_lahir') ?>" id="tgl_lahir">
								<?= form_error('tgl_lahir', '<small class="text-danger pl-3">', '</small>'); ?>
							</div>

					</div>
				</div>

				<div class="col-md-4">
					<div class="container px-2 py-3">

						<div class="form-group">
							<label for="jenis_kelamin">Jenis Kelamin <span class="text-danger">*</span></label>
							<select class="form-control" name="jenis_kelamin" id="jenis_kelamin" value="<?= set_value('jenis_kelamin') ?>">
								<option value="" selected disabled>---Jenis kelamin---</option>
								<option value="Pria" <?php echo  set_select('jenis_kelamin', 'Pria'); ?>>Pria</option>
								<option value="Wanita" <?php echo  set_select('jenis_kelamin', 'Wanita'); ?>>Wanita</option>
							</select>
							<?= form_error('jenis_kelamin', '<small class="text-danger pl-3">', '</small>'); ?>
						</div>

						<div class="form-group">
							<label for="jenis_pendaftar">Kategori<span class="text-danger">*</span></label>
							<select class="form-control" id="jenis_pendaftar" value="<?= set_value('jenis_pendaftar') ?>" oninput="CekInput()" name="jenis_pendaftar">
								<option value="" selected disabled>---Pilih Kategori Pendaftar---</option>
								<?php foreach ($jenis_pendaftar as $jp) :  ?>
									<option value="<?= $jp['id']  ?>" <?php echo  set_select('jenis_pendaftar', $jp['id']); ?>><?= $jp['nama_jenis']  ?></option>
								<?php endforeach ?>
							</select>
							<?= form_error('jenis_pendaftar', '<small class="text-danger pl-3">', '</small>'); ?>
						</div>

						<span class="" id="cek2">
							<div class="form-group">
								<label for="prodi">Prodi<span class="text-danger">*</span></label>
								<select class="form-control" id="prodi" value="<?= set_value('prodi') ?>" name="prodi">
									<option id="tes" value="">---Pilih Prodi---</option>
									<?php foreach ($prodi as $p) :  ?>
										<option value="<?= $p['id'] ?>" <?php echo  set_select('prodi', $p['id']); ?>><?= $p['nama_prodi']  ?></option>
									<?php endforeach ?>
								</select>
								<?= form_error('prodi', '<small class="text-danger pl-3">', '</small>'); ?>
							</div>
						</span>

						<div class="form-group">
							<label for="institusi">Institusi<span class="text-danger">*</span></label>
							<select class="form-control" name="institusi" value="<?= set_value('institusi') ?>" id="institusi">
								<option value="" selected disabled>---Pilih Institusi---</option>
								<?php foreach ($institusi as $i) :  ?>
									<option value="<?= $i['id'] ?>" <?php echo  set_select('institusi', $i['id']); ?>><?= $i['nama_institusi']  ?></option>
								<?php endforeach ?>
							</select>
							<?= form_error('institusi', '<small class="text-danger pl-3">', '</small>'); ?>
						</div>

					</div>
				</div>


				<div class="col-md-4">
					<div class="container px-2 py-3">

						<div class="form-group">
							<label for="no_hp">Nomor HP (WA)<span class="text-danger">*</span></label>
							<input type="text" class="form-control form-regis" id="no_hp" value="<?= set_value('no_hp') ?>" name="no_hp" aria-describedby="emailHelp">
							<?= form_error('no_hp', '<small class="text-danger pl-3">', '</small>'); ?>
						</div>

						<div class="form-group">
							<label for="email">Email aktif<span class="text-danger">*</span></label>
							<input type="text" class="form-control form-regis" id="email" value="<?= set_value('email') ?>" name="email" aria-describedby="emailHelp">
							<?= form_error('email', '<small class="text-danger pl-3">', '</small>'); ?>
						</div>

						<div class="form-group">
							<label for="password1">Password</label>
							<input type="password" class="form-control" name="password1" id="password1">
							<?= form_error('password1', '<small class="text-danger pl-3">', '</small>'); ?>
						</div>


						<div class="form-group">
							<label for="password2">Konfirmasi Password</label>
							<input type="password" class="form-control" name="password2" id="password2">
							<?= form_error('password2', '<small class="text-danger pl-3">', '</small>'); ?>
						</div>
					</div>
				</div>
				<div class="form-group col-lg">
					<div class="custom-file">
						<input type="file" class="custom-file-input" id="foto_profil" name="foto_profil" accept=".jpg, .jpeg, .png" required oninvalid="this.setCustomValidity('data tidak boleh kosong')" oninput="setCustomValidity('')">

						<label class="custom-file-label" for="foto_profil">Upload pas foto</label>
						<small>Format foto jpg, jpeg dan png ukuran kurang dari 2 MB</small>
						<?= form_error('foto_profil', '<small class="text-danger pl-3">', '</small>'); ?>

					</div>
				</div>
			</div>
		</div>
		<div class="row">
			<button type="submit" class="btn btn-regis btn-block ml-3 mr-3">REGISTER</button>
		</div>
	</div>
	</div>

	</form>
	</div>
	</div>
	</div>
	</div>
</section>

<script>
	function CekInput() {
		a = $("select#jenis_pendaftar option").filter(":selected").val();
		console.log(a);
		if (a == 1) {
			$("span#cek2").attr("class", "");
		} else if (a == 2) {
			$("span#cek2").attr("class", "");
		} else if (a == 3) {
			$("span#cek2").attr("class", "");
		} else {
			$("span#cek2").attr("class", "disable-select");
			$("option#tes").attr("value", 32);
			$("select#prodi").val() = 32;
		}
	}
</script>
