<div id="layoutSidenav">
	<div id="layoutSidenav_content">
		<main>
			<div class="container-fluid px-4">
				<h1 class="mt-4">Update</h1>
				<div class="card mb-4">
					<div class="card-body">
						<form action="<?= base_url('index.php/Welcome/change_password') ?>" method="post">
							<?php foreach ($registrasi->result_array() as $reg_view) : ?>
								<div class="form-floating mb-3">
									<input class="form-control" id="inputEmail" type="hidden" name="id_registrasi" value="<?= $reg_view['id_registrasi']; ?>">
									<input class="form-control" id="inputEmail" type="text" name="password1">
									<!-- <input class="form-control" id="inputEmail" type="email" placeholder="name@example.com" /> -->
									<label for="inputEmail">Password</label>
								</div>
								<div class="form-floating mb-3">
									<input class="form-control" id="inputEmail" type="text" name="password2">
									<!-- <input class="form-control" id="inputEmail" type="email" placeholder="name@example.com" /> -->
									<label for="inputEmail">Password confirm</label>
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
