<section class="home-section" style="text-align: center;">
	<div class="text">PROFIL</div>
	<br>
	<div class="text">
		<form action="" method="post">
			<table>
				<thead>
					<tr>
						<th>
							<img src="<?= base_url('asset/image/kakkichan2.jpg') ?>" alt="" style="width:200px">
						</th>

					</tr>
					<tr>
						<?php
						foreach ($registrasi->result_array() as $profil) :
						?>
							<th>
								<span>NAMA <?= $profil['user_name'] ?> </span>
							</th>
					</tr>
					<tr>
						<th>
							<span>EMAIL <?= $profil['email'] ?> </span>
						</th>
					</tr>
					<tr>
						<th>
							<span>ID ROLE <?= $profil['role_id'] ?></span>
						</th>
					<?php endforeach; ?>
					</tr>
				</thead>
			</table>
			<input type="button" value="EDIT" class="btn_submit">
		</form>
	</div>
</section>
