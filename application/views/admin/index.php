<!-- Begin Page Content -->
<div class="container-fluid">

	<!-- Page Heading -->
	<h1 class="h3 mb-4 text-gray-800"><?= $title ?></h1>

	<!-- /.container-fluid -->
	<!-- Content Row -->
	<div class="row">

		<!-- Earnings (Monthly) Card Example -->
		<div class="col-xl-3 col-md-6 mb-4">
			<div class="card border-left-primary shadow h-100 py-2">
				<div class="card-body">
					<div class="row no-gutters align-items-center">
						<div class="col mr-2">
							<div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Jumlah Peserta</div>
							<?php foreach ($jml_peserta as $jp) : ?>
								<div class="h5 mb-0 font-weight-bold text-gray-800"><?= $jp ?></div>
							<?php endforeach; ?>
						</div>
						<div class="col-auto">
							<i class="fas fa-calendar fa-2x text-gray-300"></i>
						</div>
					</div>
				</div>
			</div>
		</div>

		<!-- Earnings (Monthly) Card Example -->
		<div class="col-xl-3 col-md-6 mb-4">
			<div class="card border-left-success shadow h-100 py-2">
				<div class="card-body">
					<div class="row no-gutters align-items-center">
						<div class="col mr-2">
							<div class="text-xs font-weight-bold text-success text-uppercase mb-1">Kelas (Buka)</div>
							<?php foreach ($jml_kelas as $jk) : ?>
								<div class="h5 mb-0 font-weight-bold text-gray-800"><?= $jk  ?></div>
							<?php endforeach; ?>
						</div>
						<div class="col-auto">
							<i class="fas fa-door-open fa-2x text-gray-300"></i>
						</div>
					</div>
				</div>
			</div>
		</div>

		<!-- Earnings (Monthly) Card Example -->
		<div class="col-xl-3 col-md-6 mb-4">
			<div class="card border-left-info shadow h-100 py-2">
				<div class="card-body">
					<div class="row no-gutters align-items-center">
						<div class="col mr-2">
							<div class="text-xs font-weight-bold text-info text-uppercase mb-1">Belum Konfirmasi</div>
							<div class="row no-gutters align-items-center">
								<div class="col-auto">
									<?php foreach ($belum_konfirmasi as $bk) : ?>
										<div class="h5 mb-0 font-weight-bold text-gray-800"><?= $bk  ?></div>
									<?php endforeach; ?>
								</div>
							</div>
						</div>
						<div class="col-auto">
							<i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
						</div>
					</div>
				</div>
			</div>
		</div>

		<!-- Pending Requests Card Example -->
		<div class="col-xl-3 col-md-6 mb-4">
			<div class="card border-left-warning shadow h-100 py-2">
				<div class="card-body">
					<div class="row no-gutters align-items-center">
						<div class="col mr-2">
							<div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Status Pending</div>
							<?php foreach ($status_pending as $sp) : ?>
								<div class="h5 mb-0 font-weight-bold text-gray-800"><?= $sp ?></div>
							<?php endforeach; ?>
						</div>
						<div class="col-auto">
							<i class="fas fa-comments fa-2x text-gray-300"></i>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<!-- Content Row -->

</div>

</div>
<!-- /.container-fluid -->
<!-- End of Main Content -->
