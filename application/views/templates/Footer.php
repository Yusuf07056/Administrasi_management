<script language="javascript" src="<?= base_url('asset/js/fungsi.js') ?>"></script>
<script language="javascript" src="<?= base_url('asset/js/input.js') ?>"></script>
<script language="javascript">
	// Get DOM Elements
	const modal = document.querySelector('#my-modal');
	const modalBtn = document.querySelector('#modal-btn');
	const close = document.querySelector('.close');

	// Events
	modalBtn.addEventListener('click', openModal);
	close.addEventListener('click', closeModal);
	window.addEventListener('click', outsideClick);

	// Open
	function openModal() {
		modal.style.display = 'block';
	}

	// Close
	function closeModal() {
		modal.style.display = 'none';
	}

	// Close If Outside Click
	function outsideClick(e) {
		if (e.target == modal) {
			modal.style.display = 'none';
		}
	}
</script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</body>
<footer>
</footer>

</html>
