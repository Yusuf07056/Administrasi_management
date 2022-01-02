<section class="home-section">
	<input type="text" placeholder="CARI...." name="SEARCH" id="myInput" onkeyup="cari()">
	<div class="text">DATA PELAMAR</div>
	<table>
		<thead>

			<tr>
				<!-- <th>id pendaftar</th> -->
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
					<!-- <td><?= $job['id_pelamar']; ?></td> -->
					<td><?= $job['user_name']; ?></td>
					<td><?= $job['job_desk']; ?></td>
					<td><?= $job['nama_perusahaan']; ?></td>
					<td><?= $job['porto']; ?></td>
					<td>
						<a href="<?= base_url('') . $job['id_registrasi'] ?>">UPDATE</a>
						||
						<a href="<?= base_url('') . $job['id_registrasi'] ?>">DELETE</a>
						||
						<a href="<?= base_url('index.php/Kariyawan_ctrl/unduh_file/') . $job['porto'] ?>">DOWNLOAD</a>
					</td>
				</tr>
			</tbody>
		<?php endforeach; ?>
	</table>
</section>
