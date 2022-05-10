<div id="layoutSidenav">
	<div id="layoutSidenav_content">
		<main>
			<div class="container-fluid px-4">
				<h1 class="mt-4">Update</h1>
				<div class="card mb-4">
					<div class="card-body">
						<form action="<?= base_url('index.php/Welcome/insert_update') ?>" method="post">
							<?php foreach ($tb_barang as $barang_view) : ?>
								<div class="form-floating mb-3">
									<input class="form-control" id="inputEmail" type="text" name="id_barang" value="<?= $barang_view['id_barang'] ?>" hidden>
									<input class="form-control" id="inputEmail" type="text" name="nama_barang" value="<?= $barang_view['nama_barang'] ?>">
									<!-- <input class="form-control" id="inputEmail" type="email" placeholder="name@example.com" /> -->
									<label for="inputEmail">NAMA BARANG</label>
								</div>
								<div class="form-floating mb-3">
									<input class="form-control" id="inputEmail" type="text" name="jenis" value="<?= $barang_view['jenis'] ?>">
									<!-- <input class="form-control" id="inputEmail" type="email" placeholder="name@example.com" /> -->
									<label for="inputEmail">JENIS BARANG </label>
								</div>
								<div class="form-floating mb-3">
									<input class="form-control" id="inputEmail" type="text" name="jumlah" value="<?= $barang_view['jumlah'] ?>">
									<!-- <input class="form-control" id="inputEmail" type="email" placeholder="name@example.com" /> -->
									<label for="inputEmail">JUMLAH BARANG</label>
								</div>
								<div class="form-floating mb-3">
									<input class="form-control" id="inputEmail" type="text" name="harga" value="<?= $barang_view['harga'] ?>">
									<!-- <input class="form-control" id="inputEmail" type="email" placeholder="name@example.com" /> -->
									<label for="inputEmail">HARGA BARANG</label>
								</div>
								<div class="d-flex align-items-center justify-content-between mt-4 mb-0">
									<button class="btn btn-info">UPDATE</button>
								</div>
						</form>
						<table class="dataTable-table mt-2" id="datatablesSimple">
							<thead>
								<tr>
									<th>Nama barang</th>
									<th>Jenis barang</th>
									<th>Jumlah</th>
									<th>Harga</th>
								</tr>
							</thead>
							<tbody>
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
			</div>
		</main>
	</div>
</div>
