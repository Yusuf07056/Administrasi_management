<div class="header">
	<h2>LINKED.BY</h2>
	<p>CARI LAPANGAN KERJA MU.</p>
</div>

<div id="navbar">
	<a class="active" href="<?= base_url('index.php/Kariyawan_ctrl/') ?>"><i class="fa fa-fw fa-home"></i> Home</a>
	<!-- <a href="<?= base_url('') ?>"><i class="fa fa-fw fa-search"></i> Search</a> -->
	<?php if ($this->session->userdata('email')) { ?>
		<a href="<?= base_url('index.php/Kariyawan_ctrl/main_page') ?>"><i class="fa fa-fw fa-user"></i> Profile</a>
		<a href="<?= base_url('index.php/Welcome/logout') ?>"><i class="fa fa-sign-in"></i> Logout</a>
	<?php } else { ?>
		<a href="<?= base_url('index.php/Kariyawan_ctrl/login_karyawan') ?>"><i class="fa fa-sign-in"></i> Login</a>
	<?php } ?>
	<input type="text" id="myInput" onkeyup="cari()" placeholder="Search for Keyword.." title="Keywordnya Apa?">
</div>
