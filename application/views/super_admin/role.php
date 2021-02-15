<!-- Begin Page Content -->
<div class="container-fluid">

	<!-- Page Heading -->
	<h1 class="h3 mb-4 text-gray-800"><?= $title ?></h1>


	<!-- /.container-fluid -->
	<div class="row">
		<div class="col-lg">
			<?= form_error('role', '<div class="alert alert-danger" role="alert">', '</div>')  ?>
			<?= $this->session->flashdata('message');  ?>

			<div class="card shadow">
				<div class="card-header bg-primary border-bottom-warning text-right">
					<a href="" class="btn btn-success" data-toggle="modal" data-target="#newRoleModal">Tambah Role</a>
				</div>
				<div class="card-body">
					<div class="table-responsive">
						<table class="table table-hover" id="dataTable">
							<thead>
								<tr>
									<th scope="col">#</th>
									<th scope="col">Role</th>
									<th scope="col">Action</th>
								</tr>
							</thead>
							<tbody>
								<?php $i = 1 ?>
								<?php foreach ($role as $r) : ?>
									<tr>
										<th scope="row"><?= $i ?></th>
										<td><?= $r['role']; ?></td>
										<td>
											<a class="badge badge-warning" href="<?= base_url('superadmin/roleaccess/') . $r['id'];  ?>">Access</a>

											<!-- Edit -->
											<a class="badge badge-success" data-target="#editRole<?= $r['id']; ?>" data-toggle="modal" href="">Edit</a>

											<!-- Modal -->
											<div class="modal fade" id="editRole<?= $r['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="editRoleLabel" aria-hidden="true">
												<div class="modal-dialog">
													<div class="modal-content">
														<div class="modal-header">
															<h5 class="modal-title" id="editMenuLabel">Modal title</h5>
															<button type="button" class="close" data-dismiss="modal" aria-label="Close">
																<span aria-hidden="true">&times;</span>
															</button>
														</div>
														<form action="<?= base_url('superadmin/updateRole'); ?>" method="POST">
															<div class="modal-body">
																<div class="form-group">
																	<input type="text" class="form-control" id="role" name="role" value="<?= $r['role'] ?>">
																	<input type="hidden" id="id" name="id" value="<?= $r['id'] ?>">
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

											<a class="badge badge-danger" onclick="javascript: return confirm('Anda yakin akan menghapus ini? ')" href="<?= base_url('superadmin/deleteRole/' . $r['id']) ?>">Delete</a>
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

<!-- Modal -->
<div class="modal fade" id="newRoleModal" tabindex="-1" role="dialog" aria-labelledby="newRoleModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="newRoleModalLabel">Tambah Role</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<!-- form -->
				<form class="user" action="<?php base_url('superadmin/role'); ?>" method="POST">
					<div class="form-group">
						<input type="text" class="form-control form-control-user" id="role" name="role" placeholder="Nama Role">
					</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
				<button type="submit" class="btn btn-primary ">Tambahkan</button>
			</div>
			</form>
			<!-- endform -->
		</div>
	</div>
</div>
