<div id="layoutSidenav">
	<div id="layoutSidenav_content">
		<main>
			<div class="container-fluid px-4">
				<h1 class="mt-4">Input barang keluar</h1>
				<div class="card mb-4">
					<div class="card-body">
						<form action="<?= base_url('index.php/Welcome/insert_barang_out') ?>" method="post">
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
									<input class="form-control" id="inputEmail" type="text" value="<?= $barang_view['jumlah'] ?>" disabled>
									<!-- <input class="form-control" id="inputEmail" type="email" placeholder="name@example.com" /> -->
									<label for="inputEmail">JUMLAH STOK</label>
								</div>

							<?php endforeach; ?>
							<div class="form-floating mb-3">
									<?php foreach ($tb_record_barang_masuk as $barang_masuk_view) : ?>
										<input class="form-control" id="inputEmail" type="text" name="id_barang_in" value="<?= $barang_masuk_view['id_barang_in']; ?>" hidden>
									<?php endforeach; ?>
									<label for="inputEmail">RECORD AKUMULASI BARANG</label>
								</div>
							<div class="form-floating mb-3">
								<select class="form-control" name="id_supplier" id="supplier">
									<?php foreach ($tb_supplier as $supplier_view) : ?>
										<option value="<?= $supplier_view['id_supplier']; ?>"><?= $supplier_view['nama_supplier']; ?></option>
									<?php endforeach; ?>
								</select>
								<label for="inputEmail">SUPPLIER</label>
							</div>
							<div class="form-floating mb-3">
								<input class="form-control" id="inputEmail" type="text" name="jumlah_keluar">
								<!-- <input class="form-control" id="inputEmail" type="email" placeholder="name@example.com" /> -->
								<label for="inputEmail">JUMLAH BARANG KELUAR</label>
							</div>
							<div class="form-floating mb-3">
								<input class="form-control" id="inputEmail" type="date" name="tanggal_keluar">
								<!-- <input class="form-control" id="inputEmail" type="email" placeholder="name@example.com" /> -->
								<label for="inputEmail">tanggal</label>
							</div>
							<select class="form-control mb-3" name="bulan" id="bulan">
								<option value="januari">januari</option>
								<option value="februari">februari</option>
								<option value="maret">maret</option>
								<option value="april">april</option>
								<option value="mei">mei</option>
								<option value="juni">juni</option>
								<option value="juli">juli</option>
								<option value="agustus">januari</option>
								<option value="september">januari</option>
								<option value="oktober">januari</option>
								<option value="november">januari</option>
								<option value="desember">januari</option>
							</select>
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
