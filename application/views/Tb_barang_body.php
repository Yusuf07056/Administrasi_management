<div id="layoutSidenav">
	<div id="layoutSidenav_content">
		<main>
			<div class="container-fluid px-4">
				<h1 class="mt-4">Tabel barang</h1>
				<ol class="breadcrumb mb-4">
					<li class="breadcrumb-item active">Dashboard</li>
				</ol>
				<div class="card mb-4">
					<div class="card-header">
						<i class="fas fa-table me-1"></i>
						TABEL BARANG
					</div>
					<div class="card-body">
						<a class="btn btn-primary mb-2" href="<?= base_url('index.php/Welcome/create_barang') ?>">INPUT BARANG</a>
						<table id="datatablesSimple">
							<thead>
								<tr>
									<th>Nama barang</th>
									<th>Jenis barang</th>
									<th>Jumlah</th>
									<th>Harga</th>
									<th></th>
								</tr>
							</thead>
							<tbody>
								<?php foreach ($tb_barang as $barang_view) : ?>
									<tr>
										<td><?= $barang_view['nama_barang'] ?></td>
										<td><?= $barang_view['jenis'] ?></td>
										<td><?= $barang_view['jumlah'] ?></td>
										<td><?= $barang_view['harga'] ?></td>
										<td>
											<a href="<?= base_url('index.php/Welcome/input_barang_masuk/') . $barang_view['id_barang'] ?>" class="btn btn-primary"><i class="fas fa-pen"></i>INPUT BARANG MASUK</a>
											<?php if ($this->session->userdata('role_id') == 1) { ?>
												<a href="<?= base_url('index.php/Welcome/delete_barang/') . $barang_view['nama_barang'] ?>" class="btn btn-primary m-lg-2"><i class="fas fa-eraser"></i>DELETE</a>
												<a href="<?= base_url('index.php/Welcome/update_barang/') . $barang_view['id_barang'] ?>" class="btn btn-primary"><i class="fas fa-edit"></i>UPDATE</a>
											<?php } ?>
										</td>
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
