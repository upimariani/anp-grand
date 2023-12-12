<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-light-success elevation-4">
	<!-- Brand Logo -->
	<a href="index3.html" class="brand-link">
		<img src="<?= base_url('asset/logo.jpg') ?>" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
		<span class="brand-text font-weight-light">GRAND CORDELA</span>
	</a>

	<!-- Sidebar -->
	<div class="sidebar">
		<!-- Sidebar user panel (optional) -->
		<div class="user-panel mt-3 pb-3 mb-3 d-flex">
			<div class="image">
			</div>
			<div class="info">
				<a href="#" class="d-block">Selamat Datang, <br>HRD</a>
			</div>
		</div>

		<!-- Sidebar Menu -->
		<nav class="mt-2">
			<ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
				<!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
				<li class="nav-item">
					<a href="<?= base_url('HRD/cDashboard') ?>" class="nav-link   <?php if ($this->uri->segment(1) == 'HRD' && $this->uri->segment(2) == 'cDashboard') {
																						echo 'active';
																					}  ?>">
						<i class="nav-icon fas fa-tachometer-alt"></i>
						<p>Dashboard</p>
					</a>
				</li>


				<li class="nav-item">
					<a href="<?= base_url('HRD/cAbsensi') ?>" class="nav-link   <?php if ($this->uri->segment(1) == 'HRD' && $this->uri->segment(2) == 'cAbsensi') {
																					echo 'active';
																				}  ?>">
						<i class="nav-icon fas fa-clipboard-list"></i>
						<p>Absensi</p>
					</a>
				</li>


				<li class="nav-item">
					<a href="<?= base_url('HRD/cPelanggaran') ?>" class="nav-link   <?php if ($this->uri->segment(1) == 'HRD' && $this->uri->segment(2) == 'cPelanggaran') {
																						echo 'active';
																					}  ?>">
						<i class="nav-icon fas fa-exclamation"></i>
						<p>Pelanggan</p>
					</a>
				</li>
				<li class="nav-item">
					<a href="<?= base_url('HRD/cLemburan') ?>" class="nav-link   <?php if ($this->uri->segment(1) == 'HRD' && $this->uri->segment(2) == 'cLemburan') {
																						echo 'active';
																					}  ?>">
						<i class="nav-icon fas fa-clock"></i>
						<p>Jam Lemburan</p>
					</a>
				</li>

				<li class="nav-item">
					<a href="<?= base_url('cAuth/logout') ?>" class="nav-link">
						<i class="nav-icon fas fa-sign-out-alt"></i>
						<p>SignOut</p>
					</a>
				</li>

			</ul>
		</nav>
		<!-- /.sidebar-menu -->
	</div>
	<!-- /.sidebar -->
</aside>