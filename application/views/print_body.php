<html>

<head>
	<style>
		#customers {
			font-family: Arial, Helvetica, sans-serif;
			border-collapse: collapse;
			width: 100%;
		}

		#customers td,
		#customers th {
			border: 1px solid #ddd;
			padding: 8px;
		}

		#customers tr:nth-child(even) {
			background-color: #f2f2f2;
		}

		#customers tr:hover {
			background-color: #ddd;
		}

		#customers th {
			padding-top: 12px;
			padding-bottom: 12px;
			text-align: left;
			background-color: #04AA6D;
			color: white;
		}
	</style>
</head>

<body>
	<h1>REKAM BARANG</h1>
	<table id="customers">
		<thead>
			<tr>
				<th>Nama barang</th>
				<th>Record stok</th>
				<th>TGL.masuk</th>
				<th>Record keluar</th>
				<th>TGL keluar</th>
				<th>sisa barang</th>
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
				</tr>
			<?php endforeach; ?>
		</tbody>
	</table>
</body>

</html>
