<div id="layoutAuthentication">
	<div id="layoutAuthentication_content">
		<main>
			<div class="container">
				<div class="row justify-content-center">
					<div class="col-lg-7">
						<div class="card shadow-lg border-0 rounded-lg mt-5">
							<div class="card-header">
								<h3 class="text-center font-weight-light my-4">Create Account</h3>
							</div>
							<div class="card-body">
								<form action="<?= base_url('index.php/Welcome/registrasi') ?>" method="post">
									<div class="row mb-3">
										<div class="col-md-6">
											<div class="form-floating mb-3 mb-md-0">
												<input class="form-control" id="inputFirstName" name="user_name" type="text" placeholder="Enter your first name" />
												<label for="inputFirstName">NAMA LENGKAP</label>
											</div>
										</div>
										<div class="col-md-6">
											<div class="form-floating">
												<input class="form-control" id="inputLastName" name="tgl_lahir" type="date" placeholder="Enter your last name" />
												<label for="inputLastName">TANGGAL LAHIR</label>
											</div>
										</div>
									</div>
									<div class="form-floating mb-3">
										<input class="form-control" id="inputEmail" name="email" type="email" placeholder="name@example.com" />
										<label for="inputEmail">EMAIL</label>
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
									<div class="row mb-3">
										<div class="col-md-6">
											<div class="form-floating mb-3 mb-md-0">
												<input class="form-control" id="inputPassword" name="password1" type="password" placeholder="Create a password" />
												<label for="inputPassword">PASSWORD</label>
											</div>
										</div>
										<div class="col-md-6">
											<div class="form-floating mb-3 mb-md-0">
												<input class="form-control" id="inputPasswordConfirm" name="password2" type="password" placeholder="Confirm password" />
												<label for="inputPasswordConfirm">KONFIRMASI PASSWORD</label>
											</div>
										</div>
									</div>
									<div class="mt-4 mb-0">
										<div class="d-grid"><button class="btn btn-primary btn-block">TAMBAHKAN AKUN</button></div>
									</div>
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
		</main>
	</div>
	<div id="layoutAuthentication_footer">
		<footer class="py-4 bg-light mt-auto">
			<div class="container-fluid px-4">
				<div class="d-flex align-items-center justify-content-between small">
					<div class="text-muted">Copyright &copy; Your Website 2021</div>
					<div>
						<a href="#">Privacy Policy</a>
						&middot;
						<a href="#">Terms &amp; Conditions</a>
					</div>
				</div>
			</div>
		</footer>
	</div>
</div>
