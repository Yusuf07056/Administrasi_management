<table>
							<thead>
								<tr>
									<th>Nama barang</th>
									<th>Record stok</th>
									<th>TGL.masuk</th>
									<th>Record keluar</th>
									<th>TGL keluar</th>
									<th>sisa barang</th>
									<th>action</th>
								</tr>
							</thead>
							<tbody>
								<?php foreach ($join_barang_out_by as $join_barang_view) : ?>
									<tr>
										<td><?= $join_barang_view['nama_barang'] ?></td>
										<td><?= $join_barang_view['akumulasi_barang'] ?></td>
										<td><?= $join_barang_view['detail_tanggal_masuk'] ?></td>
										<td><?= $join_barang_view['jumlah_keluar'] ?></td>
										<td><?= $join_barang_view['tanggal_keluar'] ?></td>
										<td><?= $join_barang_view['sisa_barang'] ?></td>
										<td>
											<a href="<?= base_url('index.php/Welcome/delete_barang_join/') . $join_barang_view['id_barang_out'] ?>" class="btn btn-primary m-lg-2"><i class="fas fa-eraser"></i>DELETE</a>
											<a href="<?= base_url('index.php/Welcome/update_barang_in/') . $join_barang_view['id_barang_out'] ?>" class="btn btn-primary"><i class="fas fa-edit"></i>UPDATE</a>
										</td>
									</tr>
								<?php endforeach; ?>
							</tbody>
</table>