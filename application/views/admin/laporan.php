<!-- Begin Page Content -->
<div class="container-fluid">

	<!-- Page Heading -->
	<h1 class="h3 mb-4 text-gray-800"><?= $title ?></h1>

	<div class="card shadow">
		<div class="card-header bg-primary border-bottom-warning text-right">

			<a href="" class="btn btn-success py-1 my-0 border-dark" data-toggle="modal" data-target="#exampleModal">Print</a>

		</div>
		<div class="card-body">
			<div class="table-responsive">
				<table class="table table-hover" id="dataTable">
					<thead>
						<tr>
							<th scope="col">
								#
							</th>
							<th scope="col">Nama Lengkap</th>
							<th scope="col">No Identitas</th>
							<th scope="col">Jenis Pendaftar</th>
							<th scope="col">Prodi</th>
							<th scope="col">Institusi</th>
						</tr>
					</thead>
					<tbody>
						<?php $i = 1 ?>
						<?php foreach ($laporan as $lp) : ?>
							<tr>
								<th scope="row"><?= $i++ ?></th>
								<td><?= $lp['nama']; ?></td>
								<td><?= $lp['no_identitas']; ?></td>
								<td><?= $lp['nama_jenis']; ?></td>
								<td><?= $lp['nama_prodi']; ?></td>
								<td><?= $lp['nama_institusi']; ?></td>
							</tr>
						<?php endforeach; ?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>
</div>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Cetak Priodik</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<form action="<?= base_url('admin/laporan_priodik') ?>" method="post" enctype="multipart/form-data">

					<div class="modal-body">
						<div class="form-group row">
							<label for="awal" class="col-sm-4 col-form-label">Sejak Tanggal</label>
							<div class="col-sm-8">
								<input type="hidden" name="id" class="form-control">
								<input type="date" class="form-control" id="awal" name="awal" required>
								<?= form_error('awal', '<small class="text-danger pl-3">', '</small>'); ?>
							</div>
						</div>

						<div class="form-group row">
							<label for="akhir" class="col-sm-4 col-form-label">Hingga Tanggal</label>
							<div class="col-sm-8">
								<input type="date" class="form-control" id="akhir" name="akhir" required>
								<?= form_error('akhir', '<small class="text-danger pl-3">', '</small>'); ?>
							</div>
						</div>
					</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
				<button type="submit" class="btn btn-primary">Cetak</button>
			</div>
			</form>
		</div>
	</div>
</div>
