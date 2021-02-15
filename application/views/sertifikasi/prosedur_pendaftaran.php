<!-- Begin Page Content -->
<div class="container-fluid">

	<!-- Page Heading -->
	<h1 class="h3 mb-4 text-gray-800"><?= $title ?></h1>
	<?= $this->session->flashdata('message');  ?>
	<div class="row">
		<div class="col-lg">
			<?php if (validation_errors()) : ?>
				<div class="alert alert-danger" role="alert">
					<?= validation_errors(); ?>
				</div>
			<?php endif; ?>
			<div class="col-sm-10 ">

			</div>
			<!-- DataTales Example -->
			<div class="card shadow">
				<div class="card-header bg-primary border-bottom-warning text-right py-4">

				</div>
				<div class="card-body">
					<div class="text-center">
						<img class="img-fluid max-width: 100%" src="<?= base_url('assets/img/alur_daftar.jpg') ?>" height="800px">
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

</div>
