<nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
	<!-- Navbar Brand-->
	<a class="navbar-brand ps-3" href="<?= base_url('index.php/Welcome/dashboard') ?>">INVENTORY SYSTEM</a>
	<!-- Sidebar Toggle-->
	<button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>
	<!-- Navbar Search-->
	<form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">
		<div class="input-group">
			<input class="form-control" type="text" placeholder="Search for..." aria-label="Search for..." aria-describedby="btnNavbarSearch" />
			<button class="btn btn-primary" id="btnNavbarSearch" type="button"><i class="fas fa-search"></i></button>
		</div>
	</form>
	<!-- Navbar-->
	<ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
		<li class="nav-item dropdown">
			<a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
			<ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
				<li><a class="dropdown-item" href="#!">Settings</a></li>
				<li>
					<hr class="dropdown-divider" />
				</li>
				<li><a class="dropdown-item" href="<?= base_url('index.php/Welcome/logout') ?>">Logout</a></li>
			</ul>
		</li>
	</ul>
</nav>
<div id="layoutSidenav">
	<div id="layoutSidenav_nav">
		<nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
			<div class="sb-sidenav-menu">
				<?php if ($this->session->userdata('role_id') == 1) { ?>
					<div class="nav">
						<div class="sb-sidenav-menu-heading">MENU ADMIN</div>
						<a class="nav-link" href="<?= base_url('index.php/Welcome/dashboard') ?>">
							<div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
							Dashboard
						</a>
						<a class="nav-link" href="<?= base_url('index.php/Welcome/dashboard') ?>">
						</a>
						<div class="sb-sidenav-menu-heading">CRUD</div>
						<a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
							<div class="sb-nav-link-icon"><i class="fas fa-pen"></i></div>
							Input data
							<div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
						</a>
						<div class="collapse" id="collapseLayouts" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
							<nav class="sb-sidenav-menu-nested nav">
								<a class="nav-link" href="<?= base_url('index.php/welcome/page_registration') ?>">tabel pegawai</a>
								<a class="nav-link" href="<?= base_url('index.php/welcome/record_barang_masuk_') ?>">barang masuk</a>
								<a class="nav-link" href="<?= base_url('index.php/welcome/record_barang_keluar_') ?>">record barang keluar</a>
								<a class="nav-link" href="<?= base_url('index.php/welcome/tb_barang_page') ?>">tabel barang</a>
								<a class="nav-link" href="<?= base_url('index.php/welcome/supplier_page_') ?>">data supplier</a>
							</nav>
						</div>
					</div>
				<?php } else { ?>
					<div class="nav">
						<div class="sb-sidenav-menu-heading">MENU KARIYAWAN</div>
						<a class="nav-link" href="<?= base_url('index.php/welcome/record_barang_masuk_') ?>">barang masuk</a>
						<a class="nav-link" href="<?= base_url('index.php/welcome/record_barang_keluar_') ?>">record barang keluar</a>
						<a class="nav-link" href="<?= base_url('index.php/welcome/tb_barang_page') ?>">tabel barang</a>
						<a class="nav-link" href="<?= base_url('index.php/welcome/supplier_page_') ?>">data supplier</a>
					</div>
				<?php } ?>
			</div>
			<div class="sb-sidenav-footer">
				<div class="small">Logged in as:</div>
				<?= $this->session->userdata('user_name') ?>
			</div>
		</nav>
	</div>
</div>
