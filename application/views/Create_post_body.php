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
				<th>Firstname</th>
				<th>Lastname</th>
				<th>Savings</th>
			</tr>
			<tr>
				<td>Peter</td>
				<td>Griffin</td>
				<td>$100</td>
			</tr>
			<tr>
				<td>Lois</td>
				<td>Griffin</td>
				<td>$150</td>
			</tr>
			<tr>
				<td>Joe</td>
				<td>Swanson</td>
				<td>$300</td>
			</tr>
			<tr>
				<td>Cleveland</td>
				<td>Brown</td>
				<td>$250</td>
			</tr>
			<tr>
				<td>Peter</td>
				<td>Griffin</td>
				<td>$100</td>
			</tr>
			<tr>
				<td>Lois</td>
				<td>Griffin</td>
				<td>$150</td>
			</tr>
			<tr>
				<td>Joe</td>
				<td>Swanson</td>
				<td>$300</td>
			</tr>
			<tr>
				<td>Cleveland</td>
				<td>Brown</td>
				<td>$250</td>
			</tr>
			<tr>
				<td>Peter</td>
				<td>Griffin</td>
				<td>$100</td>
			</tr>
			<tr>
				<td>Lois</td>
				<td>Griffin</td>
				<td>$150</td>
			</tr>
			<tr>
				<td>Joe</td>
				<td>Swanson</td>
				<td>$300</td>
			</tr>
			<tr>
				<td>Cleveland</td>
				<td>Brown</td>
				<td>$250</td>
			</tr>
			<tr>
				<td>Peter</td>
				<td>Griffin</td>
				<td>$100</td>
			</tr>
			<tr>
				<td>Lois</td>
				<td>Griffin</td>
				<td>$150</td>
			</tr>
			<tr>
				<td>Joe</td>
				<td>Swanson</td>
				<td>$300</td>
			</tr>
			<tr>
				<td>Cleveland</td>
				<td>Brown</td>
				<td>$250</td>
			</tr>
			<tr>
				<td>Peter</td>
				<td>Griffin</td>
				<td>$100</td>
			</tr>
			<tr>
				<td>Lois</td>
				<td>Griffin</td>
				<td>$150</td>
			</tr>
			<tr>
				<td>Joe</td>
				<td>Swanson</td>
				<td>$300</td>
			</tr>
			<tr>
				<td>Cleveland</td>
				<td>Brown</td>
				<td>$250</td>
			</tr>
		</table>
	</div>
</section>
