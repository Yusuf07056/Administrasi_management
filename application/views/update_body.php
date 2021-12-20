<section class="home-section">
	<div class="text">POST INFORMATION</div>
	<br>
	<form action="<?= base_url('index.php/Welcome/insert_update') ?>" method="post" enctype="multipart/form-data">
		<table>
			<?php foreach ($post_information as $post) :
			?>

				<input type="hidden" name="id" id="id" value="<?= $post['id_post'] ?>">

				<tr>
					<td><input type="text" name="judul" id="judul" value="<?= $post['judul_post'] ?>"></td>
				</tr>
				<tr>
					<td><input type="text" name="keyword" id="keyword" value="<?= $post['keyword'] ?>"></td>
				</tr>
				<tr>
					<td>
						<textarea id="isi" name="isi" cols="30" rows="10" style="resize: none;" required><?= $post['isi_post'] ?></textarea>
					</td>
				</tr>
			<?php endforeach; ?>
			<tr>
				<td>
					<input class="upload_box" type="file" name="gambar" id="gambar" required>
				</td>
			</tr>
			<tr>
				<td>
					<select class="upload_box" name="status" id="status" required>
						<option value=1>PUBLIHS</option>
						<option value=2>DRAFT</option>
					</select>
				</td>
			</tr>
		</table>
		<input type="submit" value="UPDATE">
	</form>
</section>
