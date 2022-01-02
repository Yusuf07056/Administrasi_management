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
			<p><a href="<?= base_url('index.php/Kariyawan_ctrl/lihat_list_lamaran/') . $profil['id_registrasi'] ?>">LIST LAMARAN</a></p>
		<?php endforeach; ?>
		<a href="<?= base_url('index.php/Welcome/logout') ?>"><i class="fa fa-sign-in"></i> Logout</a>
		<p><button>edit</button></p>
	</div>
</div>
