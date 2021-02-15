<!-- Begin Page Content -->
<div class="container-fluid">


	<!-- Page Heading -->
	<h1 class="h3 mb-4 text-gray-800"><?= $title ?></h1>
	<div class="row">
		<div class="col-lg">
			<?= $this->session->flashdata('message'); ?>
		</div>
	</div>
	<div class="row">
		<div class="col-lg">
			<div class="card shadow mb-2">
				<div class="card-body">
					<a class="btn btn-primary" href="" data-toggle="modal" data-target="#exampleModal">Edit</a>

					<!-- Modal -->
					<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
						<div class="modal-dialog">
							<div class="modal-content">
								<div class="modal-header">
									<h5 class="modal-title" id="exampleModalLabel">Edit Profile</h5>
									<button type="button" class="close" data-dismiss="modal" aria-label="Close">
										<span aria-hidden="true">&times;</span>
									</button>
								</div>
								<div class="modal-body">

									<form action="<?= base_url('user/edit1')  ?>" method="POST" enctype="multipart/form-data">
										<div class="form-group">
											<label for="nama">Nama Lengkap</label>
											<input type="text" class="form-control" name="nama" id="nama" value="<?= $akun_user['nama']; ?>" required oninvalid="this.setCustomValidity('data tidak boleh kosong')" oninput="setCustomValidity('')">
										</div>
										<div class="form-group">
											<label for="tempat_lahir">Tempat Lahir</label>
											<input type="text" class="form-control" name="tempat_lahir" id="tempat_lahir" value="<?= $akun_user['tempat_lahir']; ?>" required oninvalid="this.setCustomValidity('data tidak boleh kosong')" oninput="setCustomValidity('')">
										</div>
										<div class="form-group">
											<label for="tgl_lahir">Tanggal Lahir</label>
											<input type="date" class="form-control" name="tgl_lahir" id="tgl_lahir" value="<?= $akun_user['tgl_lahir']; ?>" required oninvalid="this.setCustomValidity('data tidak boleh kosong')" oninput="setCustomValidity('')">
										</div>
										<div class="form-group">
											<label for="no_identitas">No identitas/NPM</label>
											<input type="number" class="form-control" name="no_identitas" id="no_identitas" value="<?= $akun_user['no_identitas']; ?>" required oninvalid="this.setCustomValidity('data tidak boleh kosong')" oninput="setCustomValidity('')">
										</div>
										<div class="form-group">
											<label for="jenis_kelamin">Jenis Kelamin</label>
											<input type="text" class="form-control" name="jenis_kelamin" id="jenis_kelamin" value="<?= $akun_user['jenis_kelamin']; ?>" required oninvalid="this.setCustomValidity('data tidak boleh kosong')" oninput="setCustomValidity('')">
										</div>
										<div class="form-group">
											<label for="no_hp">No handphone</label>
											<input type="text" class="form-control" name="no_hp" id="no_hp" value="<?= $akun_user['no_hp']; ?>" required oninvalid="this.setCustomValidity('data tidak boleh kosong')" oninput="setCustomValidity('')">
										</div>
										<div class="form-group">
											<div>Foto Profile</div>
											<div>
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
								</div>
								<div class="modal-footer">
									<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
									<button type="submit" class="btn btn-primary">Edit</button>
								</div>
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>

			<div class="card shadow mb-2">
				<div class="card-body">
					<div class="row">
						<div class="col-md-2 text-center">
							<h5>Foto Profile</h5>
							<img height="200px" width="60px" src="<?= base_url('assets/img/profile/') . $akun_user['foto_profil'] ?>" class="card-img" alt="...">
							<p class="card-text"><small class="text-muted">Dibuat Sejak <?= date('d F Y', $akun_user['date_created']);  ?></small></p>
						</div>
						<div class="col-md-8">
							<div class="row ml-6">
								<div class="col-md-6 text-center">
									<h5>Data Diri</h5>
								</div>
								<div class="col-md-6 text-center">
									<h5>Akun</h5>
								</div>
							</div>
							<div class="row">
								<div class="col-md-4">
									<div class="form-grup">
										<label for="nama1">Nama lengkap</label>
										<input type="text" class="form-control user" name="nama1" value="<?= $akun_user['nama']; ?>" readonly>
									</div>
									<div class="form-grup">
										<label for="tempat_lahir1">Tempat Lahir</label>
										<input type="text" class="form-control user" name="tempat_lahir1" value="<?= $akun_user['tempat_lahir']; ?>" readonly>
									</div>
									<div class="form-grup">
										<label for="tgl_lahir1">Tanggal Lahir</label>
										<input type="text" class="form-control user" name="tgl_lahir1" value="<?= date('d-m-Y', strtotime($akun_user['tgl_lahir'])); ?>" readonly>
									</div>
								</div>

								<div class="col-md-4">
									<div class="form-grup">
										<label for="no_identitas1">No Identitas/NPM</label>
										<input type="text" class="form-control user" name="no_identitas1" value="<?= $akun_user['no_identitas']; ?>" readonly>
									</div>
									<div class="form-grup">
										<label for="jenis_kelamin1">Jenis Kelamin</label>
										<input type="text" class="form-control user" name="jenis_kelamin1" value="<?= $akun_user['jenis_kelamin']; ?>" readonly>
									</div>
									<div class="form-grup">
										<label for="no_hp1">No Handphone</label>
										<input type="text" class="form-control user" name="no_hp1" value="<?= $akun_user['no_hp']; ?>" readonly>
									</div>
								</div>

								<div class="col-md-4">
									<div class="form-grup">
										<label for="email">Email</label>
										<input type="text" class="form-control user" name="email" value="<?= $akun_user['email']; ?>" readonly>
									</div>
								</div>
							</div>
						</div>
					</div>

				</div>
			</div>
		</div>
	</div>

</div>

</div>
<!-- End of Main Content -->
