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
					<a href="" class="btn btn-success" data-toggle="modal" data-target="#newSubMenuModal">Tambah Sub Menu</a>
				</div>
				<div class="card-body">
					<div class="table-responsive">
						<table class="table table-hover" id="dataTable">
							<thead>
								<tr>
									<th scope="col">#</th>
									<th scope="col">Title</th>
									<th scope="col">Menu</th>
									<th scope="col">URL</th>
									<th scope="col">Icon</th>
									<th scope="col">Active</th>
									<th scope="col">Action</th>
								</tr>
							</thead>
							<tbody>
								<?php $i = 1 ?>
								<?php foreach ($subMenu as $sm) : ?>
									<tr>
										<th scope="row"><?= $i ?></th>
										<td><?= $sm['title']; ?></td>
										<td><?= $sm['menu']; ?></td>
										<td><?= $sm['url']; ?></td>
										<td><?= $sm['icon']; ?></td>
										<td><?= $sm['is_active']; ?></td>
										<td>

											<!-- Edit -->
											<a class="badge badge-success" data-toggle="modal" data-target="#editSub<?= $sm['id'] ?>" href="">Edit</a>

											<div class="modal fade" id="editSub<?= $sm['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="edit_sub" aria-hidden="true">
												<div class="modal-dialog" role="document">
													<div class="modal-content">
														<div class="modal-header">
															<h5 class="modal-title" id="editSub">Edit Sub Menu</h5>
															<button type="button" class="close" data-dismiss="modal" aria-label="Close">
																<span aria-hidden="true">&times;</span>
															</button>
														</div>
														<form action="<?= base_url('menu/editSub'); ?>" method="POST">
															<div class="modal-body">
																<div class="form-group">
																	<input type="text" class="form-control" id="title" name="title" value="<?= $sm['title'] ?>">
																</div>
																<div class="form-group">
																	<select name="menu_id" id="menu_id" class="form-control">
																		<option value="<?= $sm['menu_id'] ?>" selected><?= $sm['menu']; ?></option>
																		<?php foreach ($menu as $m) : ?>
																			<option value="<?= $m['id']; ?>"><?= $m['menu']; ?></option>
																		<?php endforeach; ?>
																	</select>
																</div>
																<div class="form-group">
																	<input type="hidden" id="id" name="id" value="<?= $sm['id'] ?>">
																	<input type="text" class="form-control" id="url" name="url" value="<?= $sm['url'] ?>">
																</div>
																<div class="form-group">
																	<input type="text" class="form-control" id="icon" name="icon" value="<?= $sm['icon'] ?>">
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


											<!-- Hapus -->
											<a class=" badge badge-danger" onclick="javascript: return confirm('Anda yakin akan menghapus ini? ')" href="<?= base_url('menu/hapus_sub/' . $sm['id']) ?>">delete</a>
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
<div class="modal fade" id="newSubMenuModal" tabindex="-1" role="dialog" aria-labelledby="newSubMenuModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="newSubMenuModalLabel">Modal title</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<!-- form -->
				<form class="user" action="<?php base_url('menu/submenu'); ?>" method="POST">
					<div class="form-group">
						<input type="text" class="form-control" id="title" name="title" placeholder="Nama SubMenu">
					</div>
					<div class="form-group">
						<select name="menu_id" id="menu_id" class="form-control">
							<option value="">Select Menu</option>
							<?php foreach ($menu as $m) : ?>
								<option value="<?= $m['id'] ?>"><?= $m['menu'] ?></option>
							<?php endforeach; ?>
						</select>
					</div>
					<div class="form-group">
						<input type="text" class="form-control" id="url" name="url" placeholder="Url">
					</div>
					<div class="form-group">
						<input type="text" class="form-control" id="icon" name="icon" placeholder="Icon">
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
				<button type="submit" class="btn btn-primary ">Tambahkan</button>
			</div>
			</form>
			<!-- endform -->
		</div>
	</div>
</div>
