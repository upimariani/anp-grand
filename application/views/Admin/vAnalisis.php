<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<section class="content-header">
		<div class="container-fluid">
			<div class="row mb-2">
				<div class="col-sm-6">
					<h1>Data Analisis Karyawan Terbaik</h1>
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
					<!-- <button type="button" class="btn btn-default mb-3" data-toggle="modal" data-target="#modal-default">
						<i class="fas fa-chart-bar"></i> Tambah Analisis Karyawan
					</button> -->
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
										<th class="text-center">Tanggal Proses</th>
										<th class="text-center">Absensi</th>
										<th class="text-center">Kualitas</th>
										<th class="text-center">Lama Kerja</th>
										<th class="text-center">Lemburan</th>
										<th class="text-center">Hasil</th>
									</tr>
								</thead>
								<tbody>
									<?php
									$no = 1;
									foreach ($analisis as $key => $value) {
									?>
										<tr>
											<td class="text-center"><?= $no++ ?></td>
											<td class="text-center"><?= $value->nama_kar ?></td>
											<td class="text-center"><?= $value->tgl_proses ?></td>
											<td class="text-center"><?= $value->absensi ?></td>
											<td class="text-center"><?= $value->kualitas ?></td>
											<td class="text-center"><?= $value->lama_kerja ?></td>
											<td class="text-center"><?= $value->lemburan ?></td>
											<td class="text-center"><?= $value->hasil ?></td>


										</tr>
									<?php
									}
									?>

								</tbody>

								<tfoot>
									<tr>
										<th class="text-center">No</th>
										<th class="text-center">Nama Karyawan</th>
										<th class="text-center">Tanggal Proses</th>
										<th class="text-center">Absensi</th>
										<th class="text-center">Kualitas</th>
										<th class="text-center">Lama Kerja</th>
										<th class="text-center">Lemburan</th>
										<th class="text-center">Hasil</th>
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
		<?php echo form_open_multipart('admin/cAnalisis/create'); ?>
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title">Data Karyawan</h4>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">

				<div class="form-group">
					<label for="exampleInputEmail1">Nama Karyawan</label>
					<select class="form-control" id="karyawan" name="karyawan" required>
						<option value="">--Pilih Nama Karyawan---</option>
						<?php
						foreach ($karyawan as $key => $value) {
							if ($value->hasil == NULL) {
						?>
								<option data-divisi="<?= $value->divisi ?>" data-jabatan="<?= $value->jabatan ?>" value="<?= $value->id_karyawan ?>"><?= $value->nama_kar ?> | Divisi. <?= $value->divisi ?></option>
						<?php
							}
						}
						?>
					</select>
				</div>
				<div class="form-group">
					<label for="exampleInputEmail1">Divisi</label>
					<input type="text" name="divisi" class="divisi form-control" id="exampleInputEmail1" placeholder="Masukkan Divisi" readonly>
				</div>
				<div class="form-group">
					<label for="exampleInputEmail1">Jabatan</label>
					<input type="text" name="jabatan" class="jabatan form-control" id="exampleInputEmail1" placeholder="Masukkan Jabatan" readonly>
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