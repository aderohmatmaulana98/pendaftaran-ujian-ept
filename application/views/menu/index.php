<!-- Begin Page Content -->
<div class="container-fluid">

	<!-- Page Heading -->
	<h1 class="h3 mb-4 text-gray-800"><?= $title ?></h1>


	<!-- /.container-fluid -->
	<div class="row">
		<div class="col-lg">
			<?= form_error('menu', '<div class="alert alert-danger" role="alert">', '</div>')  ?>
			<?= $this->session->flashdata('message');  ?>

			<div class="card shadow">
				<div class="card-header bg-primary border-bottom-warning text-right">
					<a href="" class="btn btn-success" data-toggle="modal" data-target="#newMenuModal">Tambah Menu</a>
				</div>
				<div class="card-body">
					<div class="table-responsive">
						<table class="table table-hover" id="dataTable">
							<thead>
								<tr>
									<th scope="col">#</th>
									<th scope="col">Menu</th>
									<th scope="col">Action</th>
								</tr>
							</thead>
							<tbody>
								<?php $i = 1 ?>
								<?php foreach ($menu as $m) : ?>
									<tr>
										<th scope="row"><?= $i ?></th>
										<td><?= $m['menu']; ?></td>
										<td>
											<!-- Edit -->
											<a data-toggle="modal" data-target="#editMenu<?= $m['id']; ?>" class="badge badge-success" href="">Edit</a>


											<!-- Modal -->
											<div class="modal fade" id="editMenu<?= $m['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="editMenuLabel" aria-hidden="true">
												<div class="modal-dialog">
													<div class="modal-content">
														<div class="modal-header">
															<h5 class="modal-title" id="editMenuLabel">Modal title</h5>
															<button type="button" class="close" data-dismiss="modal" aria-label="Close">
																<span aria-hidden="true">&times;</span>
															</button>
														</div>
														<form action="<?= base_url('menu/editMenu'); ?>" method="POST">
															<div class="modal-body">
																<div class="form-group">
																	<input type="text" class="form-control" id="menu" name="menu" value="<?= $m['menu'] ?>">
																	<input type="hidden" id="id" name="id" value="<?= $m['id'] ?>">
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

											<!-- Hapus -->
											<a class="badge badge-danger" onclick="javascript: return confirm('Anda yakin akan menghapus ini? ')" href="<?= base_url('menu/hapus/' . $m['id']) ?>">Delete</a>
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
<div class="modal fade" id="newMenuModal" tabindex="-1" role="dialog" aria-labelledby="newMenuModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="newMenuModalLabel">Modal title</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<!-- form -->
				<form class="user" action="<?php base_url('menu'); ?>" method="POST">
					<div class="form-group">
						<input type="text" class="form-control form-control-user" id="menu" name="menu" placeholder="Nama Menu">
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
