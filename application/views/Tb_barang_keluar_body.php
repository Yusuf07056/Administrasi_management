<div id="layoutSidenav">
	<div id="layoutSidenav_content">
		<main>
			<div class="container-fluid px-4">
				<h1 class="mt-4">RECORD BARANG KELUAR</h1>
				<div class="card mb-4">
					<div class="card-header">
						<i class="fas fa-table me-1"></i>
					</div>
					<div class="card-body">
						PRINT
						<form action="<?= base_url('index.php/Welcome/select_to_print/') ?>" method="post">
							<div class="form-floating mb-3">
								<select class="form-control" name="nama_barang" id="supplier">
									<?php foreach ($tb_barang as $barang_view) : ?>
										<option value="<?= $barang_view['nama_barang']; ?>"><?= $barang_view['nama_barang']; ?></option>
									<?php endforeach; ?>
								</select>
								<label for="inputEmail">NAMA BARANG</label>
							</div>
							tanggal mulai:
							<input type="date" class="form-control mb-3" name="bulan1">
							tanggal selesai :
							<input type="date" class="form-control mb-3" name="bulan2">
							<input type="submit" class="btn btn-primary mb-3" value="PRINT">
						</form>
						<table id="datatablesSimple">
							<thead>
								<tr>
									<th>Nama barang</th>
									<th>Record stok</th>
									<th>TGL.masuk</th>
									<th>Record keluar</th>
									<th>TGL keluar</th>
									<th>sisa barang</th>
									<th></th>
								</tr>
							</thead>
							<tbody>
								<?php foreach ($join_tb_barang_out as $join_barang_view) : ?>
									<tr>
										<td><?= $join_barang_view['nama_barang'] ?></td>
										<td><?= $join_barang_view['akumulasi_barang'] ?></td>
										<td><?= $join_barang_view['detail_tanggal_masuk'] ?></td>
										<td><?= $join_barang_view['jumlah_keluar'] ?></td>
										<td><?= $join_barang_view['tanggal_keluar'] ?></td>
										<td><?= $join_barang_view['sisa_barang'] ?></td>
										<td>
											<?php if ($this->session->userdata('role_id') == 1) { ?>
												<a href="<?= base_url('index.php/Welcome/delete_barang_out_join/') . $join_barang_view['id_barang_out'] ?>" class="btn btn-primary m-lg-2"><i class="fas fa-eraser"></i>DELETE</a>
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
