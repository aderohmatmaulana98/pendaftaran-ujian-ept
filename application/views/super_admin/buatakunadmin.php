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
				<div class="card-header bg-primary border-bottom-warning text-right">
					<a href="<?= base_url('superadmin/formcreateadmin') ?>" class="btn btn-success">Tambah</a>
				</div>
				<div class="card-body">
					<div class="table-responsive">
						<table class="table table-hover" id="dataTable">
							<thead>
								<tr>
									<th scope="col">#</th>
									<th scope="col">Nama</th>
									<th scope="col">Email</th>
									<th scope="col">No Telepon</th>
									<th scope="col">Active</th>
									<th scope="col">Action</th>
								</tr>
							</thead>
							<tbody>
								<?php $i = 1 ?>
								<?php foreach ($akunAdmin as $au) : ?>
									<tr>
										<th scope="row"><?= $i ?></th>
										<td><?= $au['nama']; ?></td>
										<td><?= $au['email']; ?></td>
										<td><?= $au['no_hp']; ?></td>
										<td><?= $au['is_active']; ?></td>
										<td>
											<a class="badge badge-success" data-toggle="modal" data-target="#editAdmin<?= $au['id'] ?>" href="">Edit</a>

											<div class="modal fade" id="editAdmin<?= $au['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="editAdmin" aria-hidden="true">
												<div class="modal-dialog" role="document">
													<div class="modal-content">
														<div class="modal-header">
															<h5 class="modal-title" id="editSub">Edit Akun Admin</h5>
															<button type="button" class="close" data-diauiss="modal" aria-label="Close">
																<span aria-hidden="true">&times;</span>
															</button>
														</div>


														<form action="<?= base_url('superadmin/updateAdmin'); ?>" method="POST">
															<div class="modal-body">
																<div class="form-group">
																	<input type="hidden" id="id" name="id" value="<?= $au['id'] ?>">
																	<input type="text" class="form-control" id="nama" name="nama" value="<?= $au['nama'] ?>">
																</div>
																<div class="form-group">
																	<input type="text" class="form-control" id="email" name="email" value="<?= $au['email'] ?>" readonly>
																</div>
																<div class="form-group">
																	<input type="text" class="form-control" id="no_hp" name="no_hp" value="<?= $au['no_hp'] ?>">
																</div>
																<div class="form-group">
																	<div class="form-check">
																		<input class="form-check-input" type="checkbox" value="1" name="is_active" id="is_active" checked>
																		<label class="form-check-label" for="is_active">
																			Aktif ?
																		</label>
																	</div>
																</div>
															</div>
															<div class="modal-footer">
																<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
																<button type="submit" class="btn btn-primary">Update</button>
															</div>
														</form>

													</div>
												</div>
											</div>

											<a class=" badge badge-danger" onclick="javascript: return confirm('Anda yakin akan menghapus ini? ')" href="<?= base_url('superadmin/deleteAdmin/' . $au['id']) ?>">delete</a>
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
