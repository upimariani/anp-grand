<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<section class="content-header">
		<div class="container-fluid">
			<div class="row mb-2">
				<div class="col-sm-6">
					<h1>Data Karyawan</h1>
				</div>
				<div class="col-sm-6">
					<ol class="breadcrumb float-sm-right">
						<li class="breadcrumb-item"><a href="#">Home</a></li>
						<li class="breadcrumb-item active">Karyawan</li>
					</ol>
				</div>
			</div>
		</div><!-- /.container-fluid -->
	</section>

	<!-- Main content -->
	<section class="content">
		<?php if ($this->session->userdata('success')) {
		?>
			<div class="alert alert-success alert-dismissible mt-3">
				<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
				<h5><i class="icon fas fa-check"></i> Alert!</h5>
				<?= $this->session->userdata('success') ?>
			</div>
		<?php
		} ?>
		<div class="container-fluid">
			<div class="row">
				<div class="col-12  ">

					<div class="card">
						<div class="card-header">
							<h3 class="card-title">Informasi Karyawan</h3>
						</div>
						<!-- /.card-header -->
						<div class="card-body">
							<table id="example1" class="table table-bordered table-striped">
								<thead>
									<tr>
										<th class="text-center">No</th>
										<th class="text-center">Nama Karyawan</th>
										<th class="text-center">Jenis Kelamin</th>
										<th class="text-center">Alamat</th>
										<th class="text-center">Divisi</th>
										<th class="text-center">Jabatan</th>
										<th class="text-center">No Telepon</th>
										<th class="text-center">Action</th>
									</tr>
								</thead>
								<tbody>
									<?php
									$no = 1;
									foreach ($karyawan as $key => $value) {
									?>
										<tr>
											<td class="text-center"><?= $no++ ?></td>
											<td class="text-center"><?= $value->nama_kar ?></td>
											<td class="text-center"><?= $value->jk_kar ?></td>
											<td class="text-center"><?= $value->alamat ?></td>
											<td class="text-center"><?= $value->divisi ?></td>
											<td class="text-center"><?= $value->jabatan ?></td>
											<td class="text-center"><?= $value->no_hp ?></td>

											<td class="text-center">
												<div class="btn-group">
													<a href="<?= base_url('HRD/cAbsensi/detail/' . $value->id_karyawan) ?>" class="btn btn-info"><i class="fas fa-barcode"></i></a>
												</div>
											</td>
										</tr>
									<?php
									}
									?>

								</tbody>

								<tfoot>
									<tr>
										<th class="text-center">No</th>
										<th class="text-center">Nama Karyawan</th>
										<th class="text-center">Jenis Kelamin</th>
										<th class="text-center">Alamat</th>
										<th class="text-center">Divisi</th>
										<th class="text-center">Jabatan</th>
										<th class="text-center">No Telepon</th>
										<th class="text-center">Action</th>
									</tr>
								</tfoot>
							</table>
						</div>
						<!-- /.card-body -->
					</div>
					<!-- /.card -->
				</div>
				<!-- /.col -->
			</div>
			<!-- /.row -->
		</div>
		<!-- /.container-fluid -->
	</section>
	<!-- /.content -->
</div>