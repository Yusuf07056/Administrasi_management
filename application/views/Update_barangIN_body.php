<div id="layoutSidenav">
	<div id="layoutSidenav_content">
		<main>
			<div class="container-fluid px-4">
				<h1 class="mt-4">Update</h1>
				<div class="card mb-4">
					<div class="card-body">
						<form action="<?= base_url('index.php/Welcome/update_barang_masuk') ?>" method="post">
							<?php foreach ($tb_barang as $barang_view) : ?>
								<div class="form-floating mb-3">
									<input class="form-control" id="inputEmail" type="text" name="id_barang" value="<?= $barang_view['id_barang'] ?>" hidden>
									<input class="form-control" id="inputEmail" type="text" name="nama_barang" value="<?= $barang_view['nama_barang'] ?>" disabled>
									<!-- <input class="form-control" id="inputEmail" type="email" placeholder="name@example.com" /> -->
									<label for="inputEmail">NAMA BARANG</label>
								</div>
								<div class="form-floating mb-3">
									<input class="form-control" id="inputEmail" type="text" name="jenis" value="<?= $barang_view['jenis'] ?>" disabled>
									<!-- <input class="form-control" id="inputEmail" type="email" placeholder="name@example.com" /> -->
									<label for="inputEmail">JENIS BARANG </label>
								</div>
								<div class="form-floating mb-3">
									<input class="form-control" id="inputEmail" type="text" name="jumlah_stok" value="<?= $barang_view['jumlah'] ?>" hidden>
									<input class="form-control" id="inputEmail" type="text" name="jumlah_stok" value="<?= $barang_view['jumlah'] ?>" disabled>
									<!-- <input class="form-control" id="inputEmail" type="email" placeholder="name@example.com" /> -->
									<label for="inputEmail">JUMLAH STOK</label>
								</div>
							<?php endforeach; ?>
							<?php foreach ($tb_barang_masuk as $barang_masuk_view) : ?>
								<div class="form-floating mb-3">
									<input class="form-control" id="inputEmail" type="text" name="id_barang_in" value="<?= $barang_masuk_view['id_barang_in'] ?>" hidden>
								</div>
								<div class="form-floating mb-3">
									<input class="form-control" id="inputEmail" type="date" name="jenis" value="<?= $barang_masuk_view['detail_tanggal_masuk'] ?>">
									<!-- <input class="form-control" id="inputEmail" type="email" placeholder="name@example.com" /> -->
									<label for="inputEmail">TANGGAL</label>
								</div>
								<div class="form-floating mb-3">
									<input class="form-control" id="inputEmail" type="text" name="jumlah_masuk" value="<?= $barang_masuk_view['jumlah_masuk'] ?>">
									<!-- <input class="form-control" id="inputEmail" type="email" placeholder="name@example.com" /> -->
									<label for="inputEmail">JUMLAH BARANG MASUK</label>
								</div>
							<?php endforeach; ?>
							<div class="d-flex align-items-center justify-content-between mt-4 mb-0">
								<button class="btn btn-info">UPDATE</button>
							</div>
						</form>
					</div>
				</div>
			</div>
		</main>
	</div>
</div>
