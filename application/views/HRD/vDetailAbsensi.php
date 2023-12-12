<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<section class="content-header">
		<div class="container-fluid">
			<div class="row mb-2">
				<div class="col-sm-6">
					<h1>Data Absensi Karyawan</h1>
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
				<div class="col-8  ">
					<button type="button" class="btn btn-default mb-3" data-toggle="modal" data-target="#modal-default">
						<i class="fas fa-user-tie"></i> Tambah Absensi Karyawan
					</button>
					<div class="card">
						<div class="card-header">
							<h3 class="card-title">Informasi Absensi Karyawan</h3>
						</div>
						<!-- /.card-header -->
						<div class="card-body">
							<table id="example1" class="table table-bordered table-striped">
								<thead>
									<tr>
										<th class="text-center">No</th>
										<th class="text-center">Tanggal Absensi</th>
										<th class="text-center">Status</th>
										<th class="text-center">Time</th>
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
											<td class="text-center"><?= $value->tgl_absensi ?></td>
											<td class="text-center"><?php
																	if ($value->status_absensi == '1') {
																	?>
													<span class="badge bg-success">Hadir</span>
												<?php
																	} else if ($value->status_absensi == '2') {
												?>
													<span class="badge bg-danger">Tidak Hadir</span>
												<?php
																	} else {
												?>
													<span class="badge bg-warning">Telat</span>
												<?php
																	}
												?>
											</td>
											<td class="text-center"><?= $value->time ?></td>

											<td class="text-center">
												<div class="btn-group">
													<a href="<?= base_url('HRD/cAbsensi/delete/' . $value->id_absensi) ?>" class="btn btn-danger"><i class="fas fa-trash"></i></a>
													<button type="button" data-toggle="modal" data-target="#edit<?= $value->id_absensi ?>" class="btn btn-warning"><i class="fas fa-edit"></i></button>
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
										<th class="text-center">Tanggal Absensi</th>
										<th class="text-center">Status</th>
										<th class="text-center">Time</th>
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

<div class="modal fade" id="modal-default">
	<div class="modal-dialog">
		<?php echo form_open_multipart('HRD/cAbsensi/create/' . $id_karyawan); ?>
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title">Tambah Data Absensi Karyawan</h4>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<div class="form-group">
					<label for="exampleInputEmail1">Tanggal Absensi</label>
					<input type="date" name="tgl" value="<?= date('Y-m-d') ?>" class="form-control" id="exampleInputEmail1" required>
				</div>
				<div class="form-group">
					<label for="exampleInputEmail1">Status Absensi</label>
					<select class="form-control" name="status" required>
						<option value="">--Pilih Absensi---</option>
						<option value="1">Hadir</option>
						<option value="2">Tidak Hadir</option>
						<option value="3">Telat</option>
					</select>
				</div>
			</div>
			<div class="modal-footer justify-content-between">
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				<button type="submit" class="btn btn-primary">Save changes</button>
			</div>
		</div>
		</form>
		<!-- /.modal-content -->
	</div>
	<!-- /.modal-dialog -->
</div>
<!-- /.modal -->
<?php
foreach ($karyawan as $key => $value) {
?>
	<div class="modal fade" id="edit<?= $value->id_karyawan ?>">
		<div class="modal-dialog">
			<?php echo form_open_multipart('HRD/cAbsensi/update/' . $value->id_karyawan); ?>
			<div class="modal-content">
				<div class="modal-header">
					<h4 class="modal-title">Update Data Karyawan</h4>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<div class="form-group">
						<label for="exampleInputEmail1">Tanggal Absensi</label>
						<input type="date" name="tgl" value="<?= $value->tgl_absensi ?>" class="form-control" id="exampleInputEmail1" required>
					</div>
					<div class="form-group">
						<label for="exampleInputEmail1">Status Absensi</label>
						<select class="form-control" name="status" required>
							<option value="">--Pilih Absensi---</option>
							<option value="1" <?php if ($value->status_absensi == '1') {
													echo 'selected';
												} ?>>Hadir</option>
							<option value="2" <?php if ($value->status_absensi == '2') {
													echo 'selected';
												} ?>>Tidak Hadir</option>
							<option value="3" <?php if ($value->status_absensi == '3') {
													echo 'selected';
												} ?>>Telat</option>
						</select>
					</div>
				</div>
				<div class="modal-footer justify-content-between">
					<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
					<button type="submit" class="btn btn-primary">Save changes</button>
				</div>
			</div>
			</form>
			<!-- /.modal-content -->
		</div>
		<!-- /.modal-dialog -->
	</div>
	<!-- /.modal -->
<?php
}
?>