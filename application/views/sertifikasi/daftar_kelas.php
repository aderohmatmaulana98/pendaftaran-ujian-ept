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
	<div class="row">
		<div class="col-sm-9">
			<div class="card shadow">
				<div class="card-header bg-primary border-bottom-warning text-light py-4">
				</div>
				<!-- DataTales Example -->
				<div class="table-responsive">
					<table class="table table-hover">
						<thead>
							<tr>
								<th scope="col">
									#
								</th>
								<th scope="col">Kelas</th>
								<th scope="col">Ruangan</th>
								<th scope="col">Lokasi</th>
								<th scope="col">Tanggal Ujian</th>
								<th scope="col">Jam</th>
								<th scope="col">Kuota</th>
								<th scope="col">Sisa Kuota</th>
								<th scope="col">Status</th>
								<th scope="col">Aksi</th>
							</tr>
						</thead>
						<tbody>
							<?php $i = 1 ?>
							<?php foreach ($kelas as $k) : ?>
								<?php if ($k['status_kelas'] != 'Tutup') : ?>
									<tr>
										<th scope="row"><?= $i++ ?></th>
										<td><?= $k['nama_kelas']; ?></td>
										<td><?= $k['nama_ruangan']; ?></td>
										<td><?= $k['lokasi']; ?></td>
										<td><?= date('d-M-Y', strtotime($k['tanggal_ujian'])); ?></td>
										<td><?= date('H:i', strtotime($k['tanggal_ujian'])); ?></td>
										<td><?= $k['kuota']; ?></td>
										<td><?= $k['sisa_kuota']; ?></td>
										<td>
											<?php if ($k['status_kelas'] == 'Buka') : ?>
												<span class="badge badge-success"><?= $k['status_kelas']; ?></span>
											<?php else : ?>
												<span class="badge badge-warning"><?= $k['status_kelas']; ?></span>
											<?php endif; ?>

										</td>
										<!-- <td><?= date('d-m-Y', strtotime($boking->tanggal_ujian)) . "#" . date('d-m-Y', strtotime($k['tanggal_ujian'])) ?></td> -->

										<td>
											<?php if ($k['status_kelas'] == 'Buka') : ?>
												<a class=" badge badge-primary" onclick=" return confirm(' Tambahkan? ')" href="<?= base_url('sertifikasi/bo_kelas/' . $k['id'] . '/' . date('Y-m-d', strtotime($k['tanggal_ujian']))); ?>">Pilih</a>
											<?php else : ?>
												<a class=" badge badge-secondary" href="#">Pilih</a>
											<?php endif; ?>

										</td>


									<?php
								endif;
									?>
								<?php endforeach; ?>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>

</div>
