<div class="container-fluid">

	<!-- Page Heading -->

	<h1 class="h3 mb-4 text-gray-800">Dashboard Pimpinan</h1>
	<img src="<?php echo base_url() ?>/assets/img/front.png" width="1650px" height="600px" class="img-fluid">

	<div class="row">

		<!-- Earnings (Monthly) Card Example -->
		<div class="col-xl-4 col-md-6 mb-4">
			<div class="card border-left-primary shadow h-100 py-2">
				<div class="card-body">
					<div class="row no-gutters align-items-center">
						<div class="col mr-2">
							<div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Jumlah Petugas</div>
							<div class="h5 mb-0 font-weight-bold text-gray-800"><?= $petugas ?></div>
						</div>
						<div class="col-auto">
							<i class="fas fa-users fa-2x text-gray-700"></i>
						</div>
					</div>
				</div>
			</div>
		</div>

		<div class="col-xl-4 col-md-6 mb-4">
			<a href="<?= base_url('pimpinan/aduanBaru')  ?>" class="card-link">
				<div class="card border-left-primary shadow h-100 py-2">
					<div class="card-body">
						<div class="row no-gutters align-items-center">
							<div class="col mr-2">
								<div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Aduan Baru</div>
								<div class="h5 mb-0 font-weight-bold text-gray-800"><?= $kirim ?></div>
							</div>
							<div class="col-auto">
								<i class="fas fa-envelope fa-2x text-gray-700"></i>
							</div>
						</div>
					</div>
				</div>
			</a>
		</div>

		<div class="col-xl-4 col-md-6 mb-4">
			<div class="card border-left-primary shadow h-100 py-2">
				<div class="card-body">
					<div class="row no-gutters align-items-center">
						<div class="col mr-2">
							<div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Aduan Dilihat</div>
							<div class="h5 mb-0 font-weight-bold text-gray-800"><?= $old ?></div>
						</div>
						<div class="col-auto">
							<i class="fas fa-envelope-open fa-2x text-gray-700"></i>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="col-xl-4 col-md-6 mb-4">
			<a href="<?= base_url('pimpinan/aduanSelesai') ?>" class="card-link">
				<div class="card border-left-primary shadow h-100 py-2">
					<div class="card-body">
						<div class="row no-gutters align-items-center">
							<div class="col mr-2">
								<div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Aduan Selesai</div>
								<div class="h5 mb-0 font-weight-bold text-gray-800"><?= $selesai ?></div>
							</div>
							<div class="col-auto">
								<i class="fas fa-check fa-2x text-gray-700"></i>
							</div>
						</div>
					</div>
				</div>
			</a>
		</div>

		<!-- <div class="col-xl-4 col-md-6 mb-4">
			<a href="<?= base_url('pimpinan/aduanDitolak')  ?>" class="card-link">
				<div class="card border-left-primary shadow h-100 py-2">
					<div class="card-body">
						<div class="row no-gutters align-items-center">
							<div class="col mr-2">
								<div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Aduan Ditolak</div>
								<div class="h5 mb-0 font-weight-bold text-gray-800"><?= $ditolak ?></div>
							</div>
							<div class="col-auto">
								<i class="fas fa-ban fa-2x text-gray-700"></i>
							</div>
						</div>
					</div>
				</div>
			</a>
		</div> -->

		<div class="col-xl-4 col-md-6 mb-4">
			<div class="card border-left-primary shadow h-100 py-2">
				<div class="card-body">
					<div class="row no-gutters align-items-center">
						<div class="col mr-2">
							<div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Total Aduan</div>
							<div class="h5 mb-0 font-weight-bold text-gray-800"><?= $semua ?></div>
						</div>
						<div class="col-auto">
							<i class="fas fa-chart-bar fa-2x text-gray-700"></i>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="col-xl-4 col-md-6 mb-4">
			<div class="card border-left-primary shadow h-100 py-2">
				<div class="card-body">
					<div class="row no-gutters align-items-center">
						<div class="col mr-2">
							<div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Aduan Ditolak Pimpinan</div>
							<div class="h5 mb-0 font-weight-bold text-gray-800"><?= $ditolak ?></div>
						</div>
						<div class="col-auto">
							<i class="fas fa-ban fa-2x text-gray-700"></i>
						</div>
					</div>
				</div>
			</div>
		</div>

	</div>

</div>