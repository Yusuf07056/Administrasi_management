<div id="layoutSidenav">
	<div id="layoutSidenav_content">
		<main>
			<div class="container-fluid px-4">
				<h1 class="mt-4">Tambah Pegawai</h1>
				<div class="card mb-4">
					<div class="card-body">
						<form action="<?= base_url('index.php/Welcome/registrasi') ?>" method="post">
							<div class="form-floating mb-3">
								<input class="form-control" id="inputFirstName" name="user_name" type="text" placeholder="Enter your first name" />
								<label for="inputFirstName">NAMA LENGKAP</label>
							</div>
							<div class="form-floating mb-3">
								<input class="form-control" id="inputEmail" name="email" type="email" placeholder="name@example.com" />
								<label for="inputEmail">EMAIL</label>
							</div>
							<div class="form-floating mb-3">
								<input class="form-control" id="inputPassword" name="password1" type="password" placeholder="Create a password" />
								<label for="inputPassword">PASSWORD</label>
							</div>
							<div class="form-floating mb-3">
								<input class="form-control" id="inputPasswordConfirm" name="password2" type="password" placeholder="Confirm password" />
								<label for="inputPasswordConfirm">KONFIRMASI PASSWORD</label>
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
								<input class="form-control" id="inputPhone" name="no_telp" type="text" placeholder="NOMER TELEPON" />
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
								<input class="form-control" id="inputLastName" name="tgl_lahir" type="date" placeholder="Enter your last name" />
								<label for="inputLastName">TANGGAL LAHIR</label>
							</div>
							<div class="d-flex align-items-center justify-content-between mt-4 mb-4">
								<button class="btn btn-info">INPUT</button>
							</div>
						</form>
						<table id="datatablesSimple">
							<thead>
								<tr>
									<th>Username</th>
									<th>Email</th>
									<th>Nomor telfon</th>
									<th>role</th>
									<th>is_active</th>
									<th>Gender</th>
									<th>Tanggal lahir</th>
									<th>action</th>
								</tr>
							</thead>
							<tbody>
								<?php
								$view_akun = $registrasi->result_array();
								foreach ($view_akun as $reg_view) : ?>
									<tr>
										<td><?= $reg_view['user_name'] ?></td>
										<td><?= $reg_view['email'] ?></td>
										<td><?= $reg_view['no_telp'] ?></td>
										<td><?= $reg_view['role_id'] ?></td>
										<td><?= $reg_view['is_active'] ?></td>
										<td><?= $reg_view['gender'] ?></td>
										<td><?= $reg_view['tgl_lahir'] ?></td>
										<td>
											<a href="<?= base_url('index.php/Welcome/delete_reg/') . $reg_view['id_registrasi'] ?>" class="btn btn-primary m-lg-2"><i class="fas fa-eraser"></i>DELETE</a>
											<a href="<?= base_url('index.php/Welcome/update_page_registration/') . $reg_view['id_registrasi'] ?>" class="btn btn-primary"><i class="fas fa-edit"></i>EDIT</a>
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
