<!-- Begin Page Content -->
<div class="container-fluid">

	<!-- Page Heading -->
	<h1 class="h3 mb-4 text-gray-800"><?= $title ?></h1>
	<div class="row">
		<div class="col-lg-6">
			<!-- /.container-fluid -->
			<!-- form -->
			<?php echo form_open('superadmin/formcreateadmin'); ?>
			<div class="form-group">
				<input type="text" class="form-control" id="nama" name="nama" placeholder="Nama Lengkap">
				<?= form_error('nama', '<small class="text-danger pl-3">', '</small>'); ?>
			</div>
			<div class="form-group">
				<input type="text" class="form-control" id="email" name="email" placeholder="Email">
				<?= form_error('email', '<small class="text-danger pl-3">', '</small>'); ?>
			</div>
			<div class="form-group">
				<input type="password" class="form-control" id="password1" name="password1" placeholder="Password">
				<?= form_error('password1', '<small class="text-danger pl-3">', '</small>'); ?>
			</div>
			<div class="form-group">
				<input type="password" class="form-control" id="password2" name="password2" placeholder="Ulangi Password">
			</div>
			<div class="form-group">
				<input type="text" class="form-control" id="no_hp" name="no_hp" placeholder="No Telepon">
				<?= form_error('no_hp', '<small class="text-danger pl-3">', '</small>'); ?>
			</div>
			<div class="form-group">
				<div class="form-check">
					<input class="form-check-input" type="checkbox" value="1" name="is_active" id="is_active" checked>
					<label class="form-check-label" for="is_active">
						Aktif ?
					</label>
				</div>
			</div>
			<div class="">
				<a href="<?= base_url('superadmin/buatakunadmin') ?>" type="button" class="btn btn-secondary">Kembali</a>
				<button type="submit" class="btn btn-primary ">Tambahkan</button>
			</div>
			<?php echo form_close(); ?>
			<!-- endform -->
		</div>
	</div>
</div>
</div>
<!-- End of Main Content -->
