<div id="layoutSidenav">
	<div id="layoutSidenav_content">
		<main>
			<div class="container-fluid px-4">
				<h1 class="mt-4">Input barang masuk</h1>
				<div class="card mb-4">
					<div class="card-body">
						<form action="<?= base_url('index.php/Welcome/insert_barang_in') ?>" method="post">
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
									<input class="form-control" id="inputEmail" type="text" name="jumlah_stok" value="<?= $barang_view['jumlah'] ?>" disabled>
									<!-- <input class="form-control" id="inputEmail" type="email" placeholder="name@example.com" /> -->
									<label for="inputEmail">JUMLAH STOK</label>
								</div>

							<?php endforeach; ?>
							<div class="form-floating mb-3">
								<select class="form-control" name="id_supplier" id="supplier">
									<?php foreach ($tb_supplier as $supplier_view) : ?>
										<option value="<?= $supplier_view['id_supplier']; ?>"><?= $supplier_view['nama_supplier']; ?></option>
									<?php endforeach; ?>
								</select>
								<label for="inputEmail">SUPPLIER</label>
							</div>
							<div class="form-floating mb-3">
								<input class="form-control" id="inputEmail" type="text" name="jumlah_masuk">
								<!-- <input class="form-control" id="inputEmail" type="email" placeholder="name@example.com" /> -->
								<label for="inputEmail">JUMLAH BARANG MASUK</label>
							</div>
							<div class="form-floating mb-3">
								<input class="form-control" id="inputEmail" type="date" name="detail_tanggal_masuk">
								<!-- <input class="form-control" id="inputEmail" type="email" placeholder="name@example.com" /> -->
								<label for="inputEmail">tanggal</label>
							</div>
							<div class="d-flex align-items-center justify-content-between mt-4 mb-0">
								<button class="btn btn-info">INPUT</button>
							</div>
						</form>

					</div>
				</div>
			</div>
		</main>
	</div>
</div>
