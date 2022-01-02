<section class="home-section">
	<div class="text">POST INFORMATION</div>
	<br>
	<!-- Trigger/Open The Modal -->
	<button id="modal-btn" class="button">MAKE POST</button>
	<input type="text" placeholder="CARI...." name="SEARCH" id="myInput" onkeyup="cari()">
	<div id="my-modal" class="modal">
		<div class="modal-content">
			<div class="modal-header">
				<span class="close">&times;</span>
				<h2>POST</h2>
			</div>
			<div class="modal-body">
				<form action="<?= base_url('index.php/Welcome/input_post') ?>" method="post" enctype="multipart/form-data">
					<tr>
						<td>
							<p>JUDUL</p>
							<input class="inp_design" type="text" placeholder="Judul" id="judul" name="judul" required>
						</td>
					</tr>
					<tr>
						<td>
							<p>KEYWORD</p>
							<input class="inp_design" type="text" placeholder="Keyword" id="keyword" name="keyword" required>
						</td>
					</tr>
					<tr>
						<td>
							<p>ISI</p>
							<textarea id="isi" name="isi" cols="30" rows="10" style="resize: none;" required></textarea>
						</td>
					</tr>
					<tr align="center">
						<td>
							<br>
							<input type="file" name="gambar" id="gambar" required>
						</td>
					</tr>

					<tr>
						<td>
							<br>
							<select class="upload_box" name="status" id="status" required>
								<option selected disabled value="">--STATUS--</option>
								<option value=1>PUBLIHS</option>
								<option value=2>DRAFT</option>
							</select>
						</td>
					</tr>

					<tr align="center">
						<td>
							<br>
							<select class="upload_box" name="company_id" id="company_id" required>
								<option selected disabled value="">--PERUSAHAAN--</option>
								<?php foreach ($tb_perusahaan as $perusahaan) : ?>
									<option value="<?= $perusahaan['id_perusahaan'] ?>"><?= $perusahaan['nama_perusahaan']; ?></option>
								<?php endforeach; ?>
							</select>
						</td>
					</tr>
					<tr align="center">
						<td>
							<br>
							<select class="upload_box" name="jobdesk" id="jobdesk" required>
								<option selected disabled value="">--JOBDESK--</option>
								<?php foreach ($tb_jobdesk as $job) : ?>
									<option value="<?= $job['jobdesk'] ?>"><?= $job['jobdesk']; ?></option>
								<?php endforeach; ?>
							</select>
						</td>
					</tr>
					<tr>
						<td>
							<br>
							<input class="inp_box" type="submit" value="POST">
						</td>
					</tr>
				</form>
			</div>
			<div class="modal-footer">
			</div>
		</div>
	</div>

	<div>
		<table>
			<thead>

				<tr>
					<th>JUDUL</th>
					<th>KEYWORD</th>
					<th>JOBDESK</th>
					<th>ACTION</th>
				</tr>
			</thead>
			<?php foreach ($post_information as $post) :
			?>
				<tbody id="myTable">

					<tr>
						<td><?= $post['judul_post'] ?></td>
						<td><?= $post['keyword'] ?></td>
						<td><?= $post['jobdesk'] ?></td>
						<td>
							<a href="<?= base_url('index.php/Welcome/update_page/') . $post['id_post'] ?>"><i class='bx bx-edit' style='color:#022148'>EDIT</i></a>

							<a href="<?= base_url('index.php/Welcome/delete_post/') . $post['id_post'] ?>"><i class='bx bxs-message-square-x' style='color:#dd0404'>DELETE</i></a>
						</td>
					</tr>
				</tbody>
			<?php endforeach; ?>

		</table>
	</div>
</section>
