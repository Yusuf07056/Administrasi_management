<div id="layoutAuthentication">
	<div id="layoutAuthentication_content">
		<main>
			<div class="container">
				<div class="row justify-content-center">
					<div class="col-lg-5">
						<div class="card shadow-lg border-0 rounded-lg mt-5">
							<div class="card-header">
								<h3 class="text-center font-weight-light my-4">Login</h3>
							</div>
							<div class="card-body">
								<form action="<?= base_url('index.php/Welcome/') ?>" method="post">
									<div class="form-floating mb-3">
										<input class="form-control" id="inputEmail" type="email" name="email" placeholder="name@example.com">
										<!-- <input class="form-control" id="inputEmail" type="email" placeholder="name@example.com" /> -->
										<label for="inputEmail">Email address</label>
									</div>
									<div class="form-floating mb-3">
										<input class="form-control" id="inputPassword" type="password" placeholder="Password" name="password">
										<!-- <input class="form-control" id="inputPassword" type="password" placeholder="Password" /> -->
										<label for="inputPassword">Password</label>
									</div>
									<div class="d-flex align-items-center justify-content-between mt-4 mb-0">
										<button class="btn btn-info">Login</button>
									</div>
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
		</main>
	</div>
</div>
