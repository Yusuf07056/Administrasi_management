<?php foreach ($post_information as $post) : ?>
	<h2><?= $post['judul_post'] ?></h2>
	<div class="tab">
		<button class="tablinks" onclick="openTab(event, 'Requirement')" id="Utama">Requirement</button>
	</div>
	<div id="Requirement" class="tabcontent">
		<div style="max-width:500px;margin:auto">
			<img src="<?= base_url('asset/image/') . $post['foto'] ?>" alt="" />
			<p>
				<?= $post['isi_post']; ?>
			</p>
		</div>
	<?php endforeach; ?>
	<div style="max-width:500px;margin:auto">
		<?php if ($this->session->userdata('email')) { ?>
			<form action="<?= base_url('index.php/Kariyawan_ctrl/post_lamaran') ?>" method="post" enctype="multipart/form-data">
				<?php foreach ($registrasi->result_array() as $regis) : ?>
					<input class="input-field" type="text" name="id_regis" id="id_regis" value="<?= $regis['id_registrasi']; ?>" hidden>
				<?php endforeach; ?>

				<input class="input-field" type="text" name="jobdesk" id="jobdesk" value="<?= $post['jobdesk']; ?>" hidden>
				<input class="input-field" type="text" name="company_id" id="company_id" value="<?= $post['company_id']; ?>" hidden>

				<h3>UPLOAD CONTOH KARYA MU</h3>
				<div class="input-container">
					<i class="fa fa-upload icon"></i>
					<input class="input-field" type="file" name="portofolio" id="portofolio" required>
					FORMAT PDF
				</div>


				<button type="submit" class="btn">KIRIM</button>
			</form>
		<?php } else { ?>
			<button class="btn"><a style="color: white;" href="<?= base_url('index.php/Kariyawan_ctrl/login_karyawan') ?>">UNTUK MELAMAR SILAHKAN REGISTRASI TERLEBIH DAHULU</a></button>
		<?php } ?>
	</div>
	</div>
