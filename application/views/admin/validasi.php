<!-- Begin Page Content -->
<div class="container-fluid">

	<!-- Page Heading -->
	<h1 class="h3 mb-4 text-gray-800">Data Validasi</h1>
	<?= $this->session->flashdata('message');  ?>
	<div class="card shadow">
		<div class="card-header bg-primary border-bottom-warning text-right py-4">

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
							<th scope="col">Kelas</th>
							<th scope="col">Tanggal Bayar</th>
							<th scope="col">Tanggal Ujian</th>
							<th scope="col">Jam Ujian</th>
							<th scope="col">Kode Transaksi Pembayaran</th>
							<th scope="col">Bukti Bayar</th>
							<th scope="col">Status</th>
							<th scope="col">Aksi</th>
						</tr>
					</thead>
					<tbody>
						<?php $i = 1 ?>
						<?php foreach ($validasi as $vl) : ?>
							<tr>
								<th scope="row"><?= $i++ ?></th>
								<td><?= $vl['nama']; ?></td>
								<td><?= $vl['no_identitas']; ?></td>
								<td><?= $vl['nama_kelas']; ?></td>
								<td><?= date('d-M-Y', strtotime($vl['tanggal_bayar'])); ?></td>
								<td><?= date('d-M-Y', strtotime($vl['tanggal_ujian'])); ?></td>
								<td><?= date('H:i', strtotime($vl['tanggal_ujian'])); ?> WIB</td>
								<td><?= $vl['no_slip']; ?></td>
								<td><a href="#" type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal<?= $vl['id'];  ?>"><i class="fas fa-eye"></i></a></td>

								<!-- Modal -->
								<div class="modal fade" id="exampleModal<?= $vl['id'];  ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
									<div class="modal-dialog modal-dialog-centered">
										<div class="modal-content">
											<div class="modal-header">
												<h5 class="modal-title" id="exampleModalLabel">Bukti Bayar</h5>
												<button type="button" class="close" data-dismiss="modal" aria-label="Close">
													<span aria-hidden="true">&times;</span>
												</button>
											</div>
											<div class="modal-body">
												<img src="<?= base_url('assets/img/slip/') . $vl['bukti_bayar'];  ?>" class="img-thumbnail">
											</div>
											<div class="modal-footer">
												<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
											</div>
										</div>
									</div>
								</div>
								<?php if ($vl['status'] == "Terverifikasi") : ?>
									<td><span class="badge badge-success"><?= $vl['status']; ?></span></td>
								<?php else : ?>
									<td><span class="badge badge-danger"><?= $vl['status']; ?></span></td>
								<?php endif; ?>

								<td>
									<a class=" badge badge-success mr-1 " href="<?= base_url('admin/validasiAksi/' . $vl['id']) ?>">
										<svg width="2.5em" height="2.5em" viewBox="0 0 16 16" class="bi bi-check" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
											<path fill-rule="evenodd" d="M10.97 4.97a.75.75 0 0 1 1.071 1.05l-3.992 4.99a.75.75 0 0 1-1.08.02L4.324 8.384a.75.75 0 1 1 1.06-1.06l2.094 2.093 3.473-4.425a.236.236 0 0 1 .02-.022z" />
										</svg>
									</a>
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
