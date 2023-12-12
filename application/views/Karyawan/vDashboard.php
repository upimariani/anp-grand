<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<div class="content-header">
		<div class="container-fluid">
			<div class="row mb-2">
				<div class="col-sm-6">
					<h1 class="m-0 text-dark">Dashboard</h1>
				</div><!-- /.col -->
				<div class="col-sm-6">
					<ol class="breadcrumb float-sm-right">
						<li class="breadcrumb-item"><a href="#">Home</a></li>
						<li class="breadcrumb-item active">Dashboard</li>
					</ol>
				</div><!-- /.col -->
			</div><!-- /.row -->
		</div><!-- /.container-fluid -->
	</div>
	<!-- /.content-header -->

	<!-- Main content -->
	<section class="content">
		<div class="container-fluid">
			<?php
			if ($nilai) {
			?>
				<!-- Info boxes -->
				<div class="row">
					<div class="col-12 col-sm-6 col-md-3">
						<div class="info-box">
							<span class="info-box-icon bg-info elevation-1"><i class="fas fa-cog"></i></span>

							<div class="info-box-content">
								<span class="info-box-text">Absensi</span>
								<span class="info-box-number">
									<?= $nilai->absensi ?>
								</span>
							</div>
							<!-- /.info-box-content -->
						</div>
						<!-- /.info-box -->
					</div>
					<!-- /.col -->
					<div class="col-12 col-sm-6 col-md-3">
						<div class="info-box mb-3">
							<span class="info-box-icon bg-danger elevation-1"><i class="fas fa-thumbs-up"></i></span>

							<div class="info-box-content">
								<span class="info-box-text">Kualitas Kerja</span>
								<span class="info-box-number"> <?= $nilai->kualitas ?></span>
							</div>
							<!-- /.info-box-content -->
						</div>
						<!-- /.info-box -->
					</div>
					<!-- /.col -->

					<!-- fix for small devices only -->
					<div class="clearfix hidden-md-up"></div>

					<div class="col-12 col-sm-6 col-md-3">
						<div class="info-box mb-3">
							<span class="info-box-icon bg-success elevation-1"><i class="fas fa-calendar"></i></span>

							<div class="info-box-content">
								<span class="info-box-text">Lama Kerja</span>
								<span class="info-box-number"> <?= $nilai->lama_kerja ?></span>
							</div>
							<!-- /.info-box-content -->
						</div>
						<!-- /.info-box -->
					</div>
					<!-- /.col -->
					<div class="col-12 col-sm-6 col-md-3">
						<div class="info-box mb-3">
							<span class="info-box-icon bg-warning elevation-1"><i class="fas fa-clock"></i></span>

							<div class="info-box-content">
								<span class="info-box-text">Lemburan</span>
								<span class="info-box-number"> <?= $nilai->lemburan ?></span>
							</div>
							<!-- /.info-box-content -->
						</div>
						<!-- /.info-box -->
					</div>
					<!-- /.col -->
				</div>
				<!-- /.row -->



				<!-- Main row -->
				<div class="row">
					<!-- Left col -->
					<div class="col-md-8">
						<!-- MAP & BOX PANE -->


						<!-- TABLE: LATEST ORDERS -->
						<div class="card">
							<div class="card-header border-transparent">
								<h3 class="card-title">Informasi Hasil Analisis</h3>

								<div class="card-tools">
									<button type="button" class="btn btn-tool" data-card-widget="collapse">
										<i class="fas fa-minus"></i>
									</button>
									<button type="button" class="btn btn-tool" data-card-widget="remove">
										<i class="fas fa-times"></i>
									</button>
								</div>
							</div>
							<!-- /.card-header -->
							<div class="card-body">
								<div class="callout callout-info">
									<h5>Halo <strong><?= $nilai->nama_kar ?></strong>!</h5>
									<p>Anda memiliki hasil analisis sebesar <strong><?= $nilai->hasil ?></strong></p>
								</div>
								<!-- /.table-responsive -->
							</div>
							<!-- /.card-body -->
							<div class="card-footer clearfix">

							</div>
							<!-- /.card-footer -->
						</div>
						<!-- /.card -->
					</div>
					<!-- /.col -->

					<!-- /.col -->
				</div>
				<!-- /.row -->
			<?php
			} else {
			?>
				<div class="row">
					<!-- Left col -->
					<div class="col-md-8">
						<!-- MAP & BOX PANE -->


						<!-- TABLE: LATEST ORDERS -->
						<div class="card">
							<div class="card-header border-transparent">
								<h3 class="card-title">Informasi Hasil Analisis</h3>

								<div class="card-tools">
									<button type="button" class="btn btn-tool" data-card-widget="collapse">
										<i class="fas fa-minus"></i>
									</button>
									<button type="button" class="btn btn-tool" data-card-widget="remove">
										<i class="fas fa-times"></i>
									</button>
								</div>
							</div>
							<!-- /.card-header -->
							<div class="card-body">
								<div class="callout callout-danger">
									<h5>Halo!</h5>
									<p>Belum dilakukan analisis</strong></p>
								</div>
								<!-- /.table-responsive -->
							</div>
							<!-- /.card-body -->
							<div class="card-footer clearfix">

							</div>
							<!-- /.card-footer -->
						</div>
						<!-- /.card -->
					</div>
					<!-- /.col -->

					<!-- /.col -->
				</div>
			<?php
			}
			?>

		</div>
		<!--/. container-fluid -->
	</section>
	<!-- /.content -->
</div>
<!-- /.content-wrapper -->

<!-- Control Sidebar -->
<aside class="control-sidebar control-sidebar-dark">
	<!-- Control sidebar content goes here -->
</aside>
<!-- /.control-sidebar -->