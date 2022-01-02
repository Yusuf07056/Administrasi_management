<div class="container">



	<?php foreach ($post_information as $post) :
	?>
		<div class="galleryItem" id="myTable">
			<a href="#"><img src="<?= base_url('asset/image/') . $post['foto'] ?>" alt="" /></a>
			<a href="<?= base_url('index.php/Kariyawan_ctrl/detail_informasi/') . $post['id_post'] ?>"><?= $post['judul_post'] ?></a>
			<br>
			<a href="<?= base_url('index.php/Kariyawan_ctrl/job_job/') . $post['keyword'] ?>"><?= $post['keyword'] ?></a>
		</div>
	<?php endforeach; ?>

</div>
