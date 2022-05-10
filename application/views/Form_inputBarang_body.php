<div id="layoutSidenav">
	<div id="layoutSidenav_content">
		<main>
			<div class="container-fluid px-4">
				<h1 class="mt-4">Input Data</h1>
				<ol class="breadcrumb mb-4">
					<li class="breadcrumb-item active">Dashboard</li>
				</ol>
				<div class="card mb-4">
					<div class="card-body">
						<form action="<?= base_url('index.php/Welcome/input_barang') ?>" method="post">
							<div class="form-floating mb-3">
								<input class="form-control" id="inputEmail" type="text" name="nama_barang">
								<!-- <input class="form-control" id="inputEmail" type="email" placeholder="name@example.com" /> -->
								<label for="inputEmail">NAMA BARANG</label>
							</div>
							<div class="form-floating mb-3">
								<input class="form-control" id="inputEmail" type="text" name="jenis">
								<!-- <input class="form-control" id="inputEmail" type="email" placeholder="name@example.com" /> -->
								<label for="inputEmail">JENIS BARANG </label>
							</div>
							<div class="form-floating mb-3">
								<input class="form-control" id="inputEmail" type="text" name="jumlah">
								<!-- <input class="form-control" id="inputEmail" type="email" placeholder="name@example.com" /> -->
								<label for="inputEmail">JUMLAH BARANG</label>
							</div>
							<div class="form-floating mb-3">
								<input class="form-control" id="inputEmail" type="text" name="harga">
								<!-- <input class="form-control" id="inputEmail" type="email" placeholder="name@example.com" /> -->
								<label for="inputEmail">HARGA BARANG</label>
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
