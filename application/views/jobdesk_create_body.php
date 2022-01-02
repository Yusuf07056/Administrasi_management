<section class="home-section">
	<div class="text">BUAT JOB DESK</div>
	<button id="modal-btn" class="button">MAKE JOBDESK</button>
	<input type="text" placeholder="CARI...." name="SEARCH" id="myInput" onkeyup="cari()">
	<div id="my-modal" class="modal">
		<div class="modal-content">
			<div class="modal-header">
				<span class="close">&times;</span>
				<h2>POST</h2>
			</div>
			<div class="modal-body">
				<form action="<?= base_url('index.php/Welcome/input_jobdesk') ?>" method="post" enctype="multipart/form-data">
					<tr>
						<td>
							<p>NAMA JOB</p>
							<input class="inp_design" type="text" placeholder="JOB DESK" id="jobdesk" name="jobdesk" required>
						</td>
					</tr>
					<tr>
						<td>
							<br>
							<input class="inp_box" type="submit" value="CREATE">
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
					<th>ACTION</th>
				</tr>
			</thead>
			<?php foreach ($tb_jobdesk as $job) :
			?>
				<tbody id="myTable">
					<tr>
						<td><?= $job['jobdesk'] ?></td>
						<td>
							<a href="<?= base_url('index.php/Welcome/edit_jobdesk/') . $job['id'] ?>"><i class='bx bx-edit' style='color:#022148'>EDIT</i></a>

							<a href="<?= base_url('index.php/Welcome/delete_jobdesk/') . $job['id'] ?>"><i class='bx bxs-message-square-x' style='color:#dd0404'>DELETE</i></a>
						</td>
					</tr>
				</tbody>
			<?php endforeach; ?>

		</table>
	</div>
</section>
