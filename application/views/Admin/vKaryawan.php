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
					<button type="button" class="btn btn-default mb-3" data-toggle="modal" data-target="#modal-default">
						<i class="fas fa-user-tie"></i> Tambah Data Karyawan
					</button>
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
										<th class="text-center">Username</th>
										<th class="text-center">Password</th>
										<th class="text-center">Tanggal Mulai Kerja</th>
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
											<td class="text-center"><?= $value->username ?></td>
											<td class="text-center"><?= $value->password ?></td>
											<td class="text-center"><?= $value->tgl_mulai_kerja ?></td>

											<td class="text-center">
												<div class="btn-group">
													<a href="<?= base_url('Admin/cKaryawan/delete/' . $value->id_karyawan) ?>" class="btn btn-danger"><i class="fas fa-trash"></i></a>
													<button type="button" data-toggle="modal" data-target="#edit<?= $value->id_karyawan ?>" class="btn btn-warning"><i class="fas fa-edit"></i></button>
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
										<th class="text-center">Username</th>
										<th class="text-center">Password</th>
										<th class="text-center">Tanggal Mulai Kerja</th>
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
		<?php echo form_open_multipart('admin/cKaryawan/create'); ?>
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title">Tambah Data Karyawan</h4>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<div class="form-group">
					<label for="exampleInputEmail1">Nama Karyawan</label>
					<input type="text" name="nama" class="form-control" id="exampleInputEmail1" placeholder="Masukkan Nama Karyawan" required>
				</div>
				<div class="form-group">
					<label for="exampleInputEmail1">Jenis Kelamin</label>
					<select class="form-control" name="jk" required>
						<option value="">--Pilih Jenis Kelamin---</option>
						<option value="Perempuan">Perempuan</option>
						<option value="Laki - Laki">Laki - Laki</option>
					</select>
				</div>
				<div class="form-group">
					<label for="exampleInputEmail1">Alamat</label>
					<input type="text" name="alamat" class="form-control" id="exampleInputEmail1" placeholder="Masukkan Alamat" required>
				</div>
				<div class="form-group">
					<label for="exampleInputEmail1">No Telepon</label>
					<input type="text" name="no_hp" class="form-control" id="exampleInputEmail1" placeholder="Masukkan No Telepon" required>
				</div>
				<div class="form-group">
					<label for="exampleInputEmail1">Divisi</label>
					<input type="text" name="divisi" class="form-control" id="exampleInputEmail1" placeholder="Masukkan Divisi" required>
				</div>
				<div class="form-group">
					<label for="exampleInputEmail1">Jabatan</label>
					<input type="text" name="jabatan" class="form-control" id="exampleInputEmail1" placeholder="Masukkan Jabatan" required>
				</div>
				<div class="form-group">
					<label for="exampleInputEmail1">Username</label>
					<input type="text" name="username" class="form-control" id="exampleInputEmail1" placeholder="Masukkan Username" required>
				</div>
				<div class="form-group">
					<label for="exampleInputEmail1">Password</label>
					<input type="text" name="password" class="form-control" id="exampleInputEmail1" placeholder="Masukkan Password" required>
				</div>
				<div class="form-group">
					<label for="exampleInputEmail1">Tanggal Mulai Kerja</label>
					<input type="date" name="tgl" class="form-control" id="exampleInputEmail1" required>
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
			<?php echo form_open_multipart('admin/ckaryawan/update/' . $value->id_karyawan); ?>
			<div class="modal-content">
				<div class="modal-header">
					<h4 class="modal-title">Update Data Karyawan</h4>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<div class="form-group">
						<label for="exampleInputEmail1">Nama Karyawan</label>
						<input type="text" name="nama" value="<?= $value->nama_kar ?>" class="form-control" id="exampleInputEmail1" placeholder="Masukkan Nama Karyawan" required>
					</div>
					<div class="form-group">
						<label for="exampleInputEmail1">Jenis Kelamin</label>
						<select class="form-control" name="jk" required>
							<option value="">--Pilih Jenis Kelamin---</option>
							<option value="Perempuan" <?php if ($value->jk_kar == 'Perempuan') {
															echo 'selected';
														} ?>>Perempuan</option>
							<option value="Laki - Laki" <?php if ($value->jk_kar == 'Laki - Laki') {
															echo 'selected';
														} ?>>Laki - Laki</option>
						</select>
					</div>
					<div class="form-group">
						<label for="exampleInputEmail1">Alamat</label>
						<input type="text" name="alamat" value="<?= $value->alamat ?>" class="form-control" id="exampleInputEmail1" placeholder="Masukkan Alamat" required>
					</div>
					<div class="form-group">
						<label for="exampleInputEmail1">No Telepon</label>
						<input type="text" name="no_hp" value="<?= $value->no_hp ?>" class="form-control" id="exampleInputEmail1" placeholder="Masukkan No Telepon" required>
					</div>
					<div class="form-group">
						<label for="exampleInputEmail1">Divisi</label>
						<input type="text" name="divisi" value="<?= $value->divisi ?>" class="form-control" id="exampleInputEmail1" placeholder="Masukkan Divisi" required>
					</div>
					<div class="form-group">
						<label for="exampleInputEmail1">Jabatan</label>
						<input type="text" name="jabatan" value="<?= $value->jabatan ?>" class="form-control" id="exampleInputEmail1" placeholder="Masukkan Jabatan" required>
					</div>
					<div class="form-group">
						<label for="exampleInputEmail1">Username</label>
						<input type="text" name="username" value="<?= $value->username ?>" class="form-control" id="exampleInputEmail1" placeholder="Masukkan Username" required>
					</div>
					<div class="form-group">
						<label for="exampleInputEmail1">Password</label>
						<input type="text" name="password" value="<?= $value->password ?>" class="form-control" id="exampleInputEmail1" placeholder="Masukkan Password" required>
					</div>
					<div class="form-group">
						<label for="exampleInputEmail1">Tanggal Mulai Kerja</label>
						<input type="date" name="tgl" value="<?= $value->tgl_mulai_kerja ?>" class="form-control" id="exampleInputEmail1" required>
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