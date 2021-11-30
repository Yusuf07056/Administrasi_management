<!-- <form action="<?= base_url('index.php/Welcome/input_post') ?>" method="post">
	<tr>
		<td>
			<p>JUDUL</p>
			<input type="text" placeholder="JUDUL" id="judul_post" name="judul_post" required>
		</td>
	</tr>
	<tr>
		<td>
			<p>ISI</p>
			<textarea id="judul_post" name="judul_post" cols="30" rows="10" style="resize: none;"></textarea>
		</td>
	</tr>
	<tr>
		<td>
			<input type="file" name="gambar" id="gambar">
		</td>
	</tr>
	<tr>
		<td>
			<input type="submit" value="Register">
		</td>
	</tr>
</form> -->

<section class="home-section">
	<div class="text">POST INFORMATION</div>
	<br>
	<!-- Trigger/Open The Modal -->
	<button id="modal-btn" class="button">MAKE POST</button>
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
							<input class="inp_design" type="text" placeholder="JUDUL" id="judul" name="judul" required>
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
							<input class="upload_box" type="file" name="gambar" id="gambar" required>
						</td>
					</tr>
					<tr>
						<td>
							<br>
							<select class="upload_box" name="status" id="status" required>
								<option value=1>PUBLIHS</option>
								<option value=2>DRAFT</option>
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
			<tr>
				<th>ID POST</th>
				<th>JUDUL</th>
				<th>ACTION</th>
			</tr>
			<?php foreach ($post_information as $post) :
			?>
				<tr>
					<td><?= $post['id_post'] ?></td>
					<td><?= $post['judul_post'] ?></td>
					<td>
						<a href="<?= base_url('index.php/Welcome/update_post/') . $post['id_post'] ?>">EDIT</a>
						||
						<a href="<?= base_url('index.php/Welcome/delete_post/') . $post['id_post'] ?>">Delete</a>
					</td>
				</tr>
			<?php endforeach; ?>

		</table>
	</div>
</section>
