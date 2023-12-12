<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<section class="content-header">
		<div class="container-fluid">
			<div class="row mb-2">
				<div class="col-sm-6">
					<h1>Data Lemburan Kerja Karyawan</h1>
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
					<button type="button" class="btn btn-default mb-3" data-toggle="modal" data-target="#modal-default">
						<i class="fas fa-clock"></i> Tambah Lemburan Karyawan
					</button>
					<div class="card">
						<div class="card-header">
							<h3 class="card-title">Informasi Lemburan Kerja Karyawan</h3>
						</div>
						<!-- /.card-header -->
						<div class="card-body">
							<table id="example1" class="table table-bordered table-striped">
								<thead>
									<tr>
										<th class="text-center">No</th>
										<th class="text-center">Nama Karyawan</th>
										<th class="text-center">Tanggal Lemburan</th>
										<th class="text-center">Jam Lemburan</th>
										<th class="text-center">Time</th>
										<th class="text-center">Action</th>
									</tr>
								</thead>
								<tbody>
									<?php
									$no = 1;
									foreach ($lemburan as $key => $value) {
									?>
										<tr>
											<td class="text-center"><?= $no++ ?></td>
											<td class="text-center"><?= $value->nama_kar ?></td>
											<td class="text-center"><?= $value->tgl_lembur ?></td>
											<td class="text-center"><?= $value->jam_lembur ?> jam</td>
											<td class="text-center"><?= $value->time ?></td>

											<td class="text-center">
												<div class="btn-group">
													<a href="<?= base_url('HRD/cLemburan/delete/' . $value->id_lemburan) ?>" class="btn btn-danger"><i class="fas fa-trash"></i></a>
													<button type="button" data-toggle="modal" data-target="#edit<?= $value->id_lemburan ?>" class="btn btn-warning"><i class="fas fa-edit"></i></button>
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
										<th class="text-center">Tanggal Lemburan</th>
										<th class="text-center">Jam Lemburan</th>
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
		<?php echo form_open_multipart('HRD/cLemburan/create'); ?>
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title">Tambah Data Lemburan Karyawan</h4>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<div class="form-group">
					<label for="exampleInputEmail1">Nama Karyawan</label>
					<select class="form-control" name="karyawan" required>
						<option value="">--Pilih Karyawan---</option>
						<?php
						foreach ($karyawan as $key => $value) {
						?>
							<option value="<?= $value->id_karyawan ?>"><?= $value->nama_kar ?></option>
						<?php
						}
						?>

					</select>
				</div>
				<div class="form-group">
					<label for="exampleInputEmail1">Tanggal Lemburan</label>
					<input type="date" name="tgl" value="<?= date('Y-m-d') ?>" class="form-control" id="exampleInputEmail1" required>
				</div>
				<div class="form-group">
					<label for="exampleInputEmail1">Jam Lemburan</label>
					<input type="number" class="form-control" name="jam" placeholder="Masukkan Jam Lemburan Karyawan">
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
foreach ($lemburan as $key => $value) {
?>
	<div class="modal fade" id="edit<?= $value->id_lemburan ?>">
		<div class="modal-dialog">
			<?php echo form_open_multipart('HRD/cLemburan/update/' . $value->id_lemburan); ?>
			<div class="modal-content">
				<div class="modal-header">
					<h4 class="modal-title">Update Data Lemburan Karyawan</h4>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<div class="form-group">
						<label for="exampleInputEmail1">Nama Karyawan</label>
						<select class="form-control" name="karyawan" required>
							<option value="">--Pilih Karyawan---</option>
							<?php
							foreach ($karyawan as $key => $item) {
							?>
								<option value="<?= $item->id_karyawan ?>" <?php if ($item->id_karyawan == $value->id_karyawan) {
																				echo 'selected';
																			} ?>><?= $item->nama_kar ?></option>
							<?php
							}
							?>

						</select>
					</div>
					<div class="form-group">
						<label for="exampleInputEmail1">Tanggal Lemburan</label>
						<input type="date" name="tgl" value="<?= $value->tgl_lembur ?>" class="form-control" id="exampleInputEmail1" required>
					</div>
					<div class="form-group">
						<label for="exampleInputEmail1">Jam Lemburan</label>
						<input type="number" class="form-control" value="<?= $value->jam_lembur ?>" name="jam" placeholder="Masukkan Jam Lemburan Karyawan">
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