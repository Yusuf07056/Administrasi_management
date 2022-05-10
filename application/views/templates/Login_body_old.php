<div class="container">
	<div class="forms-container">
		<div class="signin-signup">
			<form action="<?= base_url('index.php/Welcome/registrasi') ?>" method="post" class="sign-up-form">

				<h2 class="title">Sign up</h2>
				<div class="input-field">
					<i class="fas fa-user"></i>
					<input type="text" placeholder="Username" name="user_name" id="user_name">
				</div>
				<small class="alert"><?= form_error('user_name'); ?></small>
				<div class="input-field">
					<i class="fas fa-envelope"></i>
					<input type="email" placeholder="Email" name="email" id="email">
				</div>
				<small><?= form_error('email'); ?></small>
				<div class="input-field">
					<i class="fas fa-lock"></i>
					<input type="password" placeholder="Password" name="password1" id="password1">
				</div>
				<small><?= form_error('password1'); ?></small>
				<div class="input-field">
					<i class="fas fa-lock"></i>
					<input type="password" placeholder="confirm Password" name="password2" id="password2">
				</div>
				<small><?= form_error('password2'); ?></small>
				<div class="input-field">
					<i class="fas fa-user"></i>
					<input type="text" placeholder="Phone number" name="no_telp" id="no_telp">
				</div>
				<small><?= form_error('no_telp'); ?></small>

				<i class="fas fa-user"></i>
				<select class="input-field" name="gender" id="gender">
					<option value="MALE">MALE</option>
					<option value="FEMALE">FEMALE</option>
				</select>
				<small><?= form_error('gender'); ?></small>
				<div class="input-field">
					<i class="fas fa-user"></i>
					<input type="date" placeholder="Age" name="tgl_lahir" id="tgl_lahir">
				</div>
				<small><?= form_error('tgl_lahir'); ?></small>
				<!-- <div class="input-field">
					<i class="fas fa-user"></i>
					<label>
						UPLOAD FILE CV
						<input type="file" name="file_cv" id="file_cv">
					</label>
				</div> -->
				<!-- <small><?= form_error('file'); ?></small> -->
				<input type="submit" class="btn" value="Sign up" />

			</form>

			<form action="<?= base_url('index.php/Welcome/') ?>" method="post" class="sign-in-form">

				<h2 class="title">Sign in</h2>
				<?php
				if ($this->session->flashdata('message')) {
				?>
					<?=
					$this->session->flashdata('message');
					?>
				<?php
				} ?>
				<div class="input-field">
					<i class="fas fa-user"></i>
					<input type="text" placeholder="Email" name="email" id="email">
				</div>
				<div class="input-field">
					<i class="fas fa-lock"></i>
					<input type="password" placeholder="Password" name="password" id="password">
				</div>
				<input type="submit" value="Login" class="btn solid" />

			</form>

		</div>
	</div>

	<div class="panels-container">
		<div class="panel left-panel">

			<div class="content">
				<h3>INGIN DAFTAR ?</h3>
				<p>
					DAFTARKAN DIRIMU DAN LUAPKAN KREATIFITAS MU BERSAMA KAMI DI SINI!
				</p>

				<button class="btn transparent" id="sign-up-btn" onclick="first_show('utama')">
					Daftar
				</button>
				<form action="<?= base_url('index.php/welcome/') ?>" method="post">
					<button class="btn transparent" id="sign-up-btn">
						ULANG
					</button>
				</form>
			</div>
			<img src="<?= base_url('asset/image/log.svg') ?>" class="image" alt="" />

		</div>
		<div class="panel right-panel">

			<div class="content">
				<h3>SUDAH PUNYA AKUN ?</h3>
				<p>AYO SIGN IN DAN LUAPKAN KREATIFITAS MU BERSAMA KAMI DI SINI!</p>


				<button class="btn transparent" id="sign-in-btn">
					Login
				</button>

			</div>
			<img src="<?= base_url('asset/image/register.svg') ?>" class="image" alt="" />

		</div>
	</div>
</div>
<div id="layoutAuthentication">
	<div id="layoutAuthentication_content">
		<main>
			<div class="container">
				<div class="row justify-content-center">
					<div class="col-lg-5">
						<div class="card shadow-lg border-0 rounded-lg mt-5">
							<div class="card-header">
								<h3 class="text-center font-weight-light my-4">Login</h3>
							</div>
							<div class="card-body">
								<form action="<?= base_url('index.php/Welcome/') ?>" method="post">
									<div class="form-floating mb-3">
										<input class="form-control" id="inputEmail" type="email" name="email" placeholder="name@example.com">
										<!-- <input class="form-control" id="inputEmail" type="email" placeholder="name@example.com" /> -->
										<label for="inputEmail">Email address</label>
									</div>
									<div class="form-floating mb-3">
										<input class="form-control" id="inputPassword" type="password" placeholder="Password" name="password">
										<!-- <input class="form-control" id="inputPassword" type="password" placeholder="Password" /> -->
										<label for="inputPassword">Password</label>
									</div>
									<div class="form-check mb-3">
										<input class="form-check-input" id="inputRememberPassword" type="checkbox" value="" />
										<label class="form-check-label" for="inputRememberPassword">Remember Password</label>
									</div>
									<div class="d-flex align-items-center justify-content-between mt-4 mb-0">
										<a class="btn btn-primary" href="index.html">Login</a>
									</div>
								</form>
							</div>
							<div class="card-footer text-center py-3">
								<div class="small"><a href="register.html">Need an account? Sign up!</a></div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</main>
	</div>
</div>
