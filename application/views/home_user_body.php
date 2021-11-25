<div class="container">
	<?php foreach ($post_information as $post) :
	?>
		<div class="galleryItem">
			<a href="#"><img src="<?= base_url('asset/image/') . $post['foto'] ?>" alt="" /></a>
			<h3><?= $post['judul_post'] ?></h3>
			<p>Lorem ipsum dolor sit amet...</p>
		</div>
	<?php endforeach; ?>
</div>
