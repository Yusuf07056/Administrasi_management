<section class="home-section">
	<input type="text" placeholder="CARI...." name="SEARCH" id="myInput" onkeyup="cari()">
	<div class="text">DATA PELAMAR</div>
	<table>
		<thead>

			<tr>
				<th>nama</th>
				<th>job desk</th>
				<th>nama perusahaan</th>
				<th>portofolio</th>
				<th>ACTION</th>
			</tr>
		</thead>
		<?php foreach ($join_appointment as $job) : ?>
			<tbody id="myTable">

				<tr>
					<form action="<?= base_url('index.php/Welcome/konfirmasi_lamaran') ?>" method="post">
						<input type="text" name="id_pelamar" value="<?= $job['id_pelamar']; ?>" hidden>
						<input type="text" name="id_registrasi" value="<?= $job['id_registrasi']; ?>" hidden>
						<input type="text" name="id_perusahaan" value="<?= $job['id_perusahaan']; ?>" hidden>
						<input type="text" name="status" value="TERIMA" hidden>
						<td><?= $job['user_name']; ?></td>
						<td><?= $job['job_desk']; ?></td>
						<td><?= $job['nama_perusahaan']; ?></td>
						<td><?= $job['porto']; ?></td>
						<td>
							<input type="submit" value="VERIFIKASI">
					</form>
					<a href="<?= base_url('index.php/Kariyawan_ctrl/unduh_file/') . $job['porto'] ?>">DOWNLOAD</a>
					</td>
				</tr>
			</tbody>
		<?php endforeach; ?>
	</table>
	<div class="text">DATA PELAMAR TERVERIFIKASI</div>
	<table>
		<thead>

			<tr>
				<th>nama</th>
				<th>job desk</th>
				<th>nama perusahaan</th>
				<th>ACTION</th>
			</tr>
		</thead>
		<?php foreach ($join_verifikasi as $verifikasi) : ?>
			<tbody id="myTable">

				<tr>
					<td><?= $verifikasi['user_name']; ?></td>
					<td><?= $verifikasi['job_desk']; ?></td>
					<td><?= $verifikasi['nama_perusahaan']; ?></td>
					<td>
						<a href="<?= base_url('index.php/Welcome/delete_verifikasi_data_pelamar/') . $verifikasi['id_verifikasi'] ?>">UPDATE</a>
						||
						<a href="<?= base_url('') . $verifikasi['id_registrasi'] ?>">DELETE</a>
					</td>
				</tr>
			</tbody>
		<?php endforeach; ?>
	</table>
</section>
