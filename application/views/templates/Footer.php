<!-- <script language="javascript" src="<?= base_url('asset/js/fungsi.js') ?>"></script>
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
</footer> -->

<!-- </html> -->


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
<script src="<?= base_url('asset/js/scripts.js') ?>"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
<script src="<?= base_url('asset/js/demo/chart-area-demo.js') ?>"></script>
<script src="<?= base_url('asset/js/demo/chart-bar-demo.js') ?>"></script>
<script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
<script src="<?= base_url('asset/js/datatables-simple-demo.js') ?>"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
</body>

</html>
