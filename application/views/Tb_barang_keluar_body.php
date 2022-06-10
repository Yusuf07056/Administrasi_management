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
												<a href="<?= base_url('index.php/Welcome/delete_barang_join/') . $join_barang_view['id_barang_out'] ?>" class="btn btn-primary m-lg-2"><i class="fas fa-eraser"></i>DELETE</a>
												<a href="<?= base_url('index.php/Welcome/update_barang_in/') . $join_barang_view['id_barang_out'] ?>" class="btn btn-primary"><i class="fas fa-edit"></i>UPDATE</a>
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
