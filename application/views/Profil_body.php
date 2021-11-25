<div class="content">
	<h2 style="text-align:center">User Profile Card</h2>

	<div class="card">
		<?php
		foreach ($registrasi->result_array() as $profil) :
		?>
			<img src="<?= base_url('asset/image/kakkichan2.jpg') ?>" alt="John" style="width:100%">
			<h1><?= $profil['user_name'] ?></h1>
			<p class="title"><?= $profil['email'] ?></p>
			<p>Harvard University</p>
			<p><?= $profil['role_id'] ?></p>
		<?php endforeach; ?>
		<div style="margin: 24px 0;">
			<a href="#"><i class="fa fa-dribbble"></i></a>
			<a href="#"><i class="fa fa-twitter"></i></a>
			<a href="#"><i class="fa fa-linkedin"></i></a>
			<a href="#"><i class="fa fa-facebook"></i></a>
		</div>
		<p><button>edit</button></p>
	</div>
</div>
