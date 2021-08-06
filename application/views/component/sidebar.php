<div class="banner">
<img src="<?= base_url('assets/images/banner.png') ?>" width="100%">
</div>

<div class="marque">
<marquee behavior="scroll" scrollamount="5" class="text-white d-flex align-items-center" height="40px"
	style="background-color: #F7C302;">Sistem Informasi Manajemen Kepegawaian(SIMPEG) - Balai Pengelola Alih Teknologi Pertanian</marquee>
</div>

<!-- Page Wrapper -->
<div id="wrapper">

<!-- Sidebar -->
<ul class="navbar-nav border-right sidebar sidebar-light accordion" id="accordionSidebar">

	<!-- Sidebar - Brand -->
	<a class="sidebar-brand d-flex align-items-center justify-content-center mt-5" href="<?= base_url('beranda') ?>">
		<div class="sidebar-brand-icon">
			<img src="<?= base_url('assets/images/logo.png') ?>" class="rounded-circle" width="60%" alt="">
		</div>
	</a>

	<!-- Nav Item - Dashboard -->
	<li class="nav-item mt-5">
		<a class="nav-link" href="<?= base_url('beranda') ?>">
		<i class="fas fa-fw fa-home text-success"></i>
		<span class="text-dark">Beranda</span></a>
	</li>

	<!-- Nav Item - Pages Collapse Menu -->
	<?php if ($user['role'] == 'admin') : ?>

	<li class="nav-item">
		<a class="nav-link" href="#" data-toggle="collapse" data-target="#collapsePages" aria-expanded="true"
			aria-controls="collapsePages">
			<i class="fas fa-fw fa-folder text-success"></i>
			<span class="text-dark">Data Master</span>
		</a>
		<div id="collapsePages" class="collapse show" aria-labelledby="headingPages"
			data-parent="#accordionSidebar">
			<div class="bg-white py-2 collapse-inner rounded">
				<a class="collapse-item" href="<?= base_url('data_user') ?>"><i class="fas fa-fw fa-users text-success mr-2"></i>
					<span class="text-dark">Data Pegawai</span>
				</a>
				<a class="collapse-item" href="<?= base_url('data_arsip_pegawai') ?>"><i class="fas fa-fw fa-folder-open text-success mr-2"></i>
					<span class="text-dark">Data Arsip Pegawai</span>
				</a>
			</div>
		</div>
	</li>

	<?php endif; ?>

	<!-- Divider -->
	<hr class="sidebar-divider d-none d-md-block">

	<!-- Sidebar Toggler (Sidebar) -->
	<div class="text-center text-white d-none d-md-inline">
		<button class="rounded-circle border-0 bg-success text-white" id="sidebarToggle"></button>
	</div>

</ul>

<!-- End of Sidebar -->

<!-- Content Wrapper -->
<div id="content-wrapper" class="d-flex flex-column">
	<div class="py-3 px-3 text-white" style="background-color: #4CAA73;">
		Selamat Datang <?= $user['nama_lengkap']; ?>
	</div>

	<!-- Main Content -->
	<div id="content" class="bg-white">

	<form action="<?= base_url('Auth/logout') ?>" method="POST">
		<button type="submit" class="btn btn-danger float-right mr-3 mt-3 logout"><i class="fas fa-fw fa-sign-out-alt mr-2"></i>Keluar</button>
	</form>

	<!-- Topbar -->
	<nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top">

		<!-- Sidebar Toggle (Topbar) -->
		<button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
			<i class="fa fa-bars text-success"></i>
		</button>
	</nav>
	
	<!-- End of Topbar -->
