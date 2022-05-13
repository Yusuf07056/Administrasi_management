<div id="layoutSidenav">
	<div id="layoutSidenav_content">
		<main>
			<div class="container-fluid px-4">
				<h1 class="mt-4">Input supplier</h1>
				<div class="card mb-4">
					<div class="card-body">
						<form action="<?= base_url('index.php/Welcome/insert_supplier') ?>" method="post">
							<div class="form-floating mb-3">
								<input class="form-control" id="inputEmail" type="text" name="nama_supplier">
								<!-- <input class="form-control" id="inputEmail" type="email" placeholder="name@example.com" /> -->
								<label for="inputEmail">NAMA SUPPLIER</label>
							</div>
							<div class="form-floating mb-3">
								<input class="form-control" id="inputEmail" type="text" name="no_telp">
								<!-- <input class="form-control" id="inputEmail" type="email" placeholder="name@example.com" /> -->
								<label for="inputEmail">NO.TELP</label>
							</div>
							<div class="form-floating mb-3">
								<input class="form-control" id="inputEmail" type="text" name="alamat">
								<!-- <input class="form-control" id="inputEmail" type="email" placeholder="name@example.com" /> -->
								<label for="inputEmail">ALAMAT</label>
							</div>
							<div class="d-flex align-items-center justify-content-between mt-4 mb-3">
								<button class="btn btn-info">INPUT</button>
							</div>
						</form>
						<table id="datatablesSimple">
							<thead>
								<tr>
									<th>Nama supplier</th>
									<th>No.telp</th>
									<th>Alamat</th>
									<th>action</th>
								</tr>
							</thead>
							<tbody>
								<?php foreach ($tb_supplier as $view_supplier) : ?>
									<tr>
										<td><?= $view_supplier['nama_supplier'] ?></td>
										<td><?= $view_supplier['no_telp'] ?></td>
										<td><?= $view_supplier['alamat'] ?></td>
										<td>
											<a href="<?= base_url('index.php/Welcome/delete_supplier/') . $view_supplier['id_supplier'] ?>" class="btn btn-primary m-lg-2"><i class="fas fa-eraser"></i>DELETE</a>
											<a href="<?= base_url('index.php/Welcome/update_supplier/') . $view_supplier['id_supplier'] ?>" class="btn btn-primary"><i class="fas fa-edit"></i>UPDATE</a>
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
