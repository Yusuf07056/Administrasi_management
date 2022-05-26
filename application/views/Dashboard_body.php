<div id="layoutSidenav">
	<div id="layoutSidenav_content">
		<main>
			<div class="container-fluid px-4">
				<h1 class="mt-4">Dashboard</h1>
				<ol class="breadcrumb mb-4">
					<li class="breadcrumb-item active">Dashboard</li>
				</ol>
				<div class="card mb-4">
					<div class="card-header">
						<i class="fas fa-table me-1"></i>
						TABEL BARANG
					</div>
					<div class="card-body">
						<table id="datatablesSimple">
							<thead>
								<tr>
									<th>Nama barang</th>
									<th>Jenis barang</th>
									<th>Jumlah</th>
									<th>Harga</th>
								</tr>
							</thead>
							<tbody>
								<?php foreach ($tb_barang as $barang_view) : ?>
									<tr>
										<td><?= $barang_view['nama_barang'] ?></td>
										<td><?= $barang_view['jenis'] ?></td>
										<td><?= $barang_view['jumlah'] ?></td>
										<td><?= $barang_view['harga'] ?></td>
									</tr>
								<?php endforeach; ?>
							</tbody>
						</table>
					</div>
				</div>
				<div class="card mb-4">
					<div class="card-header">
						<i class="fas fa-table me-1"></i>
						TABEL BARANG
					</div>
					<div class="card-body">
						<table class="dataTable-table" id="datatablesSimple">
							<thead>
								<tr>
									<th>Username</th>
									<th>Email</th>
									<th>Nomor telfon</th>
									<th>Gender</th>
									<th>Tanggal lahir</th>
								</tr>
							</thead>
							<tbody>
								<?php
								$view_akun = $registrasi->result_array();
								foreach ($view_akun as $reg_view) : ?>
									<tr>
										<td><?= $reg_view['user_name'] ?></td>
										<td><?= $reg_view['email'] ?></td>
										<td><?= $reg_view['no_telp'] ?></td>
										<td><?= $reg_view['gender'] ?></td>
										<td><?= $reg_view['tgl_lahir'] ?></td>
									</tr>
								<?php endforeach; ?>
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</main>
	</div>
</div>
