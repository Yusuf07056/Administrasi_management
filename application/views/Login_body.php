<div class="container">
	<div class="forms-container">
		<div class="signin-signup">
			<form action="#" class="sign-in-form">
				<h2 class="title">Sign in</h2>
				<div class="input-field">
					<i class="fas fa-user"></i>
					<input type="text" placeholder="Username" />
				</div>
				<div class="input-field">
					<i class="fas fa-lock"></i>
					<input type="password" placeholder="Password" />
				</div>
				<input type="submit" value="Login" class="btn solid" />
			</form>
			<form action="<?= base_url('index.php/Welcome/registrasi') ?>" method="post" class="sign-up-form">
				<h2 class="title">Sign up</h2>
				<div class="input-field">
					<i class="fas fa-user"></i>
					<input type="text" placeholder="Username" name="user_name" id="user_name" />
				</div>
				<div class="input-field">
					<i class="fas fa-envelope"></i>
					<input type="email" placeholder="Email" name="email" id="email" />
				</div>
				<div class="input-field">
					<i class="fas fa-lock"></i>
					<input type="password" placeholder="Password" name="password" id="password" />
				</div>
				<div class="input-field">
					<i class="fas fa-user"></i>
					<input type="text" placeholder="Phone number" name="no_telp" id="no_telp" />
				</div>

				<i class="fas fa-user"></i>
				<select class="input-field" name="Gender" id="gender">
					<option value="MALE">MALE</option>
					<option value="FEMALE">FEMALE</option>
				</select>

				<div class="input-field">
					<i class="fas fa-user"></i>
					<input type="text" placeholder="Age" name="user_name" />
				</div>
				<input type="submit" class="btn" value="Sign up" />

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
				<button class="btn transparent" id="sign-up-btn">
					Sign up
				</button>
			</div>
			<img src="<?= base_url('asset/image/log.svg') ?>" class="image" alt="" />
		</div>
		<div class="panel right-panel">
			<div class="content">
				<h3>SUDAH PUNYA AKUN ?</h3>
				<p>
					AYO SIGN IN DAN LUAPKAN KREATIFITAS MU BERSAMA KAMI DI SINI!
				</p>
				<button class="btn transparent" id="sign-in-btn">
					Sign in
				</button>
			</div>
			<img src="<?= base_url('asset/image/register.svg') ?>" class="image" alt="" />
		</div>
	</div>
</div>
