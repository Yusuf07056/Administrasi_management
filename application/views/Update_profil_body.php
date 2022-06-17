<div id="layoutSidenav">
	<div id="layoutSidenav_content">
		<main>
			<div class="container-fluid px-4">
				<h1 class="mt-4">EDIT PROFIL</h1>
				<div class="card mb-4">
					<div class="card-body">
						<form action="<?= base_url('index.php/Welcome/edit_profil') ?>" method="post">
							<?php $view_akun = $registrasi->result_array();
							foreach ($view_akun as $reg_view) : ?>

								<div class="form-floating mb-3">
									<input class="form-control" id="inputFirstName" name="id_registrasi" type="hidden" value="<?= $reg_view['id_registrasi'] ?>" placeholder="Enter your first name" />
									<input class="form-control" id="inputFirstName" name="user_name" type="text" value="<?= $reg_view['user_name'] ?>" placeholder="Enter your first name" />
									<label for="inputFirstName">NAMA LENGKAP</label>
								</div>
								<div class="form-floating mb-3">
									<input class="form-control" id="inputEmail" name="email" type="email" value="<?= $reg_view['email'] ?>" placeholder="name@example.com" />
									<label for="inputEmail">EMAIL</label>
								</div>
								<div class="form-floating mb-3">
									<select class="form-control" name="role_id" id="role_id">
										<?php foreach ($list_role as $role_view) : ?>
											<option value="<?= $role_view['id_role']; ?>"><?= $role_view['role_name']; ?></option>
										<?php endforeach; ?>
									</select>
									<label for="inputEmail">ROLE</label>
								</div>
								<div class="form-floating mb-3">
									<select class="form-control" name="is_active" id="is_active">
										<option value="1">AKTIFKAN</option>
										<option value="2">BEKUKAN</option>
									</select>
									<label for="inputEmail">STATUS</label>
								</div>
								<div class="form-floating mb-3">
									<input class="form-control" id="inputPhone" name="no_telp" value="<?= $reg_view['no_telp'] ?>" type="text" placeholder="NOMER TELEPON" />
									<label for="inputLastName">NOMER TELEPON</label>
								</div>
								<div class="form-floating mb-3">
									<select class="form-control" name="gender" id="inputGender">
										<option value="PRIA">PRIA</option>
										<option value="WANITA">WANITA</option>
									</select>
									<label for="inputEmail">GENDER</label>
								</div>
								<div class="form-floating mb-3">
									<input class="form-control" id="inputLastName" name="tgl_lahir" type="date" value="<?= $reg_view['tgl_lahir'] ?>" placeholder="Enter your last name" />
									<label for="inputLastName">TANGGAL LAHIR</label>
								</div>
							<?php endforeach; ?>
							<div class="d-flex align-items-center justify-content-between mt-4 mb-4">
								<button class="btn btn-info">UPDATE</button>
							</div>
						</form>
					</div>
				</div>
			</div>
		</main>
	</div>
</div>
