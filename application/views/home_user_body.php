<div class="container">



	<?php foreach ($post_information as $post) :
	?>
		<div class="galleryItem" id="myTable">
			<a href="#"><img src="<?= base_url('asset/image/') . $post['foto'] ?>" alt="" /></a>
			<a href="<?= base_url('') . $post['judul_post'] ?>"><?= $post['judul_post'] ?></a>
			<br>
			<a href="<?= base_url('') . $post['keyword'] ?>"><?= $post['keyword'] ?></a>
		</div>
	<?php endforeach; ?>

</div>
