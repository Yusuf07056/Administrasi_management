<div class="container">
	<div class="forms-container">
		<div class="signin-signup">
			<form action="<?= base_url('index.php/Kariyawan_ctrl/registrasi') ?>" method="post" class="sign-up-form">

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
