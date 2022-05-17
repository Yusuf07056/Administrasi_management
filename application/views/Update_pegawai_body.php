<div id="layoutSidenav">
	<div id="layoutSidenav_content">
		<main>
			<div class="container-fluid px-4">
				<h1 class="mt-4">Update</h1>
				<div class="card mb-4">
					<div class="card-body">
						<form action="<?= base_url('index.php/Welcome/insert_update_pegawai') ?>" method="post">
							<?php foreach ($registrasi->result_array() as $reg_view) : ?>
								<div class="form-floating mb-3">
									<input class="form-control" id="inputEmail" type="text" name="id_registrasi" value="<?= $reg_view['id_registrasi'] ?>" hidden>
									<input class="form-control" id="inputEmail" type="text" name="user_name" value="<?= $reg_view['user_name'] ?>">
									<!-- <input class="form-control" id="inputEmail" type="email" placeholder="name@example.com" /> -->
									<label for="inputEmail">NAMA PEGAWAI</label>
								</div>
								<div class="form-floating mb-3">
									<input class="form-control" id="inputEmail" type="text" name="email" value="<?= $reg_view['email'] ?>">
									<!-- <input class="form-control" id="inputEmail" type="email" placeholder="name@example.com" /> -->
									<label for="inputEmail">EMAIL</label>
								</div>
								<div class="form-floating mb-3">
									<input class="form-control" id="inputEmail" type="text" name="no_telp" value="<?= $reg_view['no_telp'] ?>">
									<!-- <input class="form-control" id="inputEmail" type="email" placeholder="name@example.com" /> -->
									<label for="inputEmail">NO.telpon</label>
								</div>
								<div class="form-floating mb-3">
									<input class="form-control" id="inputEmail" type="text" name="password1">
									<!-- <input class="form-control" id="inputEmail" type="email" placeholder="name@example.com" /> -->
									<label for="inputEmail">Password</label>
								</div>
								<div class="form-floating mb-3">
									<input class="form-control" id="inputEmail" type="text" name="password2">
									<!-- <input class="form-control" id="inputEmail" type="email" placeholder="name@example.com" /> -->
									<label for="inputEmail">Password confirm</label>
								</div>
								<div class="form-floating mb-3">
									<input class="form-control mb-2" id="inputEmail" type="text" value="<?= $reg_view['role_id'] ?>" disabled>
									<select class="form-control" name="role_id" id="role_id">
										<?php foreach ($list_role as $role_view) : ?>
											<option value="<?= $role_view['id_role']; ?>"><?= $role_view['role_name']; ?>(<?= $role_view['id_role']; ?>)</option>
										<?php endforeach; ?>
									</select>
									<label for="inputEmail">ROLE</label>
								</div>
								<div class="form-floating mb-3">
									<input class="form-control mb-2" id="inputEmail" type="text" value="<?= $reg_view['is_active'] ?>">
									<!-- <input class="form-control" id="inputEmail" type="email" placeholder="name@example.com" /> -->
									<select class="form-control" name="is_active" id="is_active">
										<option value="1">AKTIFKAN(1)</option>
										<option value="2">BEKUKAN(2)</option>
									</select>
									<label for="inputEmail">STATUS</label>
								</div>
								<div class="form-floating mb-3">
									<input class="form-control mb-2" id="inputEmail" type="text" value="<?= $reg_view['gender'] ?>" disabled>
									<!-- <input class="form-control" id="inputEmail" type="email" placeholder="name@example.com" /> -->
									<select class="form-control" name="gender" id="inputGender">
										<option value="PRIA">PRIA</option>
										<option value="WANITA">WANITA</option>
									</select>
									<label for="inputEmail">GENDER</label>
								</div>
								<div class="form-floating mb-3">
									<input class="form-control" id="inputEmail" type="date" name="tgl_lahir" value="<?= $reg_view['tgl_lahir'] ?>">
									<!-- <input class="form-control" id="inputEmail" type="email" placeholder="name@example.com" /> -->
									<label for="inputEmail">TGL.lahir</label>
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
