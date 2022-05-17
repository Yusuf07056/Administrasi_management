<div id="layoutSidenav">
	<div id="layoutSidenav_content">
		<main>
			<div class="container-fluid px-4">
				<h1 class="mt-4">RECORD BARANG MASUK</h1>
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
									<th>Nama supplier</th>
									<th>Unit masuk</th>
									<th>TGL masuk</th>
									<th>action</th>
								</tr>
							</thead>
							<tbody>
								<?php foreach ($join_tb_barang_in as $join_barang_view) : ?>
									<tr>
										<td><?= $join_barang_view['nama_barang'] ?></td>
										<td><?= $join_barang_view['nama_supplier'] ?></td>
										<td><?= $join_barang_view['jumlah_masuk'] ?></td>
										<td><?= $join_barang_view['detail_tanggal_masuk'] ?></td>
										<td>
											<a href="<?= base_url('index.php/Welcome/delete_barang_join/') . $join_barang_view['id_barang_in'] ?>" class="btn btn-primary m-lg-2"><i class="fas fa-eraser"></i>DELETE</a>
											<a href="<?= base_url('index.php/Welcome/update_barang_in/') . $join_barang_view['id_barang_in'] ?>" class="btn btn-primary"><i class="fas fa-edit"></i>UPDATE</a>
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
