<!-- Begin Page Content -->
<div class="container-fluid">

	<!-- Page Heading -->
	<h1 class="h3 mb-4 text-gray-800"><?= $title ?></h1>

	<!-- /.container-fluid -->
	<div class="row">
		<div class="col-lg">
			<?php if (validation_errors()) : ?>
				<div class="alert alert-danger" role="alert">
					<?= validation_errors(); ?>
				</div>
			<?php endif; ?>
			<?= $this->session->flashdata('message');  ?>
			<div class="card shadow">
				<div class="card-header bg-primary border-bottom-warning">
					<div>
						<h6 class="text-white">Tampil berdasarkan status : </h6>
						<div class="text-right" style="width: 150px;">
							<form action="<?= base_url('admin/verifikasi_pembayaran1')  ?>" method="POST">
								<div class="input-group text-right">
									<select class="custom-select" id="status" name="status">
										<option selected>Pilih...</option>
										<option value="Buka">Buka</option>
										<option value="Tutup">Tutup</option>
										<option value="Semua">Semua</option>
									</select>
									<div class="input-group-append">
										<button class="btn btn-success my-0 py-0" type="submit" href="" role="button">
											<svg width="1em" height="2em" viewBox="0 0 16 16" class="bi bi-search" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
												<path fill-rule="evenodd" d="M10.442 10.442a1 1 0 0 1 1.415 0l3.85 3.85a1 1 0 0 1-1.414 1.415l-3.85-3.85a1 1 0 0 1 0-1.415z" />
												<path fill-rule="evenodd" d="M6.5 12a5.5 5.5 0 1 0 0-11 5.5 5.5 0 0 0 0 11zM13 6.5a6.5 6.5 0 1 1-13 0 6.5 6.5 0 0 1 13 0z" />
											</svg>
										</button>
									</div>
								</div>
							</form>
						</div>
					</div>
				</div>
				<div class="card-body">
					<div class="table-responsive">
						<table class="table table-hover" id="dataTable">
							<thead>
								<tr>
									<th scope="col">#</th>
									<th scope="col">Nama Kelas</th>
									<th scope="col">Nama Ruangan</th>
									<th scope="col">Lokasi</th>
									<th scope="col">Kuota</th>
									<th scope="col">Sisa Kuota</th>
									<th scope="col">Tanggal Ujian</th>
									<th scope="col">Jam</th>
									<th scope="col">Status Kelas</th>
									<th scope="col">Action</th>
								</tr>
							</thead>
							<tbody>
								<?php $i = 1 ?>
								<?php foreach ($verifikasi_pembayaran as $vp) : ?>
									<tr>
										<th scope="row"><?= $i ?></th>
										<td><?= $vp['nama_kelas']; ?></td>
										<td><?= $vp['nama_ruangan']; ?></td>
										<td><?= $vp['lokasi']; ?></td>
										<td><?= $vp['kuota']; ?></td>
										<td><?= $vp['sisa_kuota']; ?></td>
										<td><?= date('d-M-Y', strtotime($vp['tanggal_ujian'])); ?></td>
										<td><?= date('H:i', strtotime($vp['tanggal_ujian'])); ?> WIB</td>
										<?php if ($vp['status_kelas'] == 'Tutup') : ?>
											<td><span class="badge badge-danger"><?= $vp['status_kelas']; ?></span></td>
										<?php elseif ($vp['status_kelas'] == 'Buka') : ?>
											<td><span class="badge badge-success"><?= $vp['status_kelas']; ?></span></td>
										<?php else : ?>
											<td><span class="badge badge-warning"><?= $vp['status_kelas']; ?></span></td>
										<?php endif; ?>
										<td>
											<a href="<?= base_url('admin/data_peserta/' . $vp['id'] . '/' . $vp['nama_kelas']) ?>" type="button" class="btn btn-primary"><i class="fas fa-eye"></i></a>
										</td>
									</tr>
									<?php $i++; ?>
								<?php endforeach; ?>
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
</div>
<!-- End of Main Content -->