<!-- Begin Page Content -->
<div class="container-fluid">

	<!-- Page Heading -->
	<h1 class="h3 mb-4 text-gray-800"><?= $title ?></h1>
	<?= $this->session->flashdata('message');  ?>
	<div class="row">
		<div class="col-sm">
			<!-- DataTales Example -->
			<div class="card shadow">
				<div class="card-header bg-primary border-bottom-warning text-right">

					<a href="<?= base_url('admin/laporan_perkelas/') . $nama_kelas ?>" class="btn btn-success py-1 my-0 border-dark">Print</a>

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
									<th scope="col">Kode Transaksi Pembayaran</th>
									<th scope="col">Tanggal Bayar</th>
									<th scope="col">Tanggal Pesan</th>
									<th scope="col">Bukti Bayar</th>
									<th scope="col">Status Pembayaran</th>
									<th scope="col">Aksi</th>
								</tr>
							</thead>
							<tbody>
								<?php $i = 1 ?>
								<?php foreach ($data_peserta as $dp) : ?>
									<tr>
										<th scope="row"><?= $i++ ?></th>
										<td><?= $dp['nama']; ?></td>
										<td><?= $dp['no_identitas']; ?></td>
										<td><?= $dp['nama_kelas']; ?></td>
										<td><?= $dp['no_slip']; ?></td>
										<td><?= $dp['tanggal_bayar']; ?></td>
										<td><?= $dp['tanggal_pesan']; ?></td>
										<td><a href="#" type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#exampleModal<?= $dp['id'];  ?>"><i class="fas fa-eye"></i></a></td>

										<!-- Modal -->
										<div class="modal fade" id="exampleModal<?= $dp['id'];  ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
											<div class="modal-dialog modal-dialog-centered">
												<div class="modal-content">
													<div class="modal-header">
														<h5 class="modal-title" id="exampleModalLabel">Bukti Bayar</h5>
														<button type="button" class="close" data-dismiss="modal" aria-label="Close">
															<span aria-hidden="true">&times;</span>
														</button>
													</div>
													<div class="modal-body">
														<img src="<?= base_url('assets/img/slip/') . $dp['bukti_bayar'];  ?>" class="img-thumbnail">
													</div>
													<div class="modal-footer">
														<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
													</div>
												</div>
											</div>
										</div>
										<?php if ($dp['status'] == "Terverifikasi") : ?>
											<td><span class="badge badge-success"><?= $dp['status']; ?></span></td>
										<?php else : ?>
											<td><span class="badge badge-danger"><?= $dp['status']; ?></span></td>
										<?php endif; ?>
										<td>
											<?php if ($dp['status'] == "Pending") : ?>
												<a class=" badge badge-success mr-1 " data-toggle="tooltip" data-placement="top" title="Validasi" href="<?= base_url('admin/verifikasi/' . $dp['id'] . '/' . $id_kelas . '/' . $nama_kelas) ?>">
													<svg width="2em" height="2em" viewBox="0 0 16 16" class="bi bi-check" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
														<path fill-rule="evenodd" d="M10.97 4.97a.75.75 0 0 1 1.071 1.05l-3.992 4.99a.75.75 0 0 1-1.08.02L4.324 8.384a.75.75 0 1 1 1.06-1.06l2.094 2.093 3.473-4.425a.236.236 0 0 1 .02-.022z" />
													</svg>
												</a>
											<?php else : ?>
												<a class=" badge badge-warning mr-1" data-toggle="tooltip" data-placement="top" title="Batalkan Validasi" href="<?= base_url('admin/batalkan/' . $dp['id'] . '/' . $id_kelas . '/' . $nama_kelas) ?>">
													<svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-x" viewBox="0 0 16 16">
														<path d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z" />
													</svg>
												</a>
											<?php endif; ?>
											<a class=" badge badge-danger mr-1" onclick="javascript: return confirm('Anda yakin akan menghapus ini? ')" data-toggle="tooltip" data-placement="top" title="Hapus" href="<?= base_url('admin/hapusPembayaran/' . $dp['id'] . '/' . $id_kelas . '/' . $nama_kelas) ?>">
												<svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
													<path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z" />
													<path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4L4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z" />
												</svg>
											</a>
										</td>

									<?php endforeach; ?>
									</tr>
							</tbody>
						</table>
					</div>
				</div>
			</div>
			<div align="center" class="mt-3">
				<a href="<?= base_url('admin/verifikasi_pembayaran')  ?>">
					<h5><i class="fas fa-long-arrow-alt-left"></i> Kembali</h5>
				</a>
			</div>
		</div>
	</div>
</div>

</div>