<div id="layoutSidenav">
	<div id="layoutSidenav_content">
		<main>
			<div class="container-fluid px-4">
				<h1 class="mt-4">Update</h1>
				<div class="card mb-4">
					<div class="card-body">
						<form action="<?= base_url('index.php/Welcome/update_barang_join') ?>" method="post">
							<div class="form-floating mb-3">
								<select class="form-control" name="id_barang" id="supplier">
									<?php foreach ($tb_barang as $barang_view) : ?>
										<option value="<?= $barang_view['id_barang']; ?>"><?= $barang_view['nama_barang']; ?></option>
									<?php endforeach; ?>
								</select>
								<label for="inputEmail">NAMA BARANG</label>
							</div>
							<?php foreach ($tb_barang_keluar as $barang_keluar_view) : ?>
								<div class="form-floating mb-3">
									<input class="form-control" id="inputEmail" type="text" name="id_barang_in" value="<?= $barang_keluar_view['id_barang_out'] ?>" hidden>
								</div>
								<div class="form-floating mb-3">
									<input class="form-control" id="inputEmail" type="date" name="jenis" value="<?= $barang_keluar_view['detail_tanggal_masuk'] ?>">
									<!-- <input class="form-control" id="inputEmail" type="email" placeholder="name@example.com" /> -->
									<label for="inputEmail">TANGGAL</label>
								</div>
								<div class="form-floating mb-3">
									<input class="form-control" id="inputEmail" type="text" name="jumlah_masuk" value="<?= $barang_keluar_view['jumlah_masuk'] ?>">
									<!-- <input class="form-control" id="inputEmail" type="email" placeholder="name@example.com" /> -->
									<label for="inputEmail">JUMLAH BARANG</label>
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
