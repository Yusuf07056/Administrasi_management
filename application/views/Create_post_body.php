<br>
<div class="container">
	<div class="title">POSTINGAN</div>
	<div class="content">
		<form action="<?= base_url('index.php/Welcome/input_post') ?>" method="post">
			<div class="user-details">
				<div class="input-box">
					<span class="details">JUDUL</span>
					<input type="text" placeholder="JUDUL" id="judul_post" name="judul_post" required>
				</div>
				<div class="input-box">
				</div>
				<div class="input-box">
					<span class="details">ISI</span>
					<textarea id="judul_post" name="judul_post" cols="30" rows="10" style="resize: none;"></textarea>
				</div>

			</div>
			<div class="gender-details">
				<input type="radio" name="status_post" value="1" id="dot-1">
				<input type="radio" name="status_post" id="dot-2">
				<span class="gender-title">STATUS</span>
				<div class="category">
					<label for="dot-1">
						<span class="dot one"></span>
						<span class="gender">PUBLIHS</span>
					</label>
					<label for="dot-2">
						<span class="dot two"></span>
						<span class="gender">DRAFT</span>
					</label>
				</div>
			</div>
			<div class="input-box">
				<span class="details">input gambar</span>
				<input type="file" name="gambar" id="gambar">
			</div>
			<div class="button">
				<input type="submit" value="Register">
			</div>
		</form>
	</div>
</div>
