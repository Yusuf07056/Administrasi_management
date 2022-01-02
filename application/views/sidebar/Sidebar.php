  <div class="sidebar">
  	<div class="logo-details">
  		<div class="logo_name">NUGI.CORP</div>
  		<i class='bx bx-menu' id="btn"></i>
  	</div>
  	<ul class="nav-list">
  		<li>
  			<i class='bx bx-search'></i>
  			<input type="text" placeholder="Search...">
  			<span class="tooltip">Search</span>
  		</li>
  		<li>
  			<a href="<?= base_url('index.php/Welcome/list_job_appointment') ?>">
  				<i class='bx bxs-dashboard bx-burst'></i>
  				<span class="links_name">Dashboard</span>
  			</a>
  			<span class="tooltip">Dashboard</span>
  		</li>
  		<li>
  			<a href="<?= base_url('index.php/Welcome/desk_job') ?>">
  				<i class='bx bx-plus-circle'></i>
  				<span class="links_name">Desk Job</span>
  			</a>
  			<span class="tooltip">Desk Job</span>
  		</li>
  		<li>
  			<a href="<?= base_url('index.php/Welcome/profil') ?>">
  				<i class='bx bxs-user'></i>
  				<span class="links_name">User</span>
  			</a>
  			<span class="tooltip">User</span>
  		</li>
  		<li>
  			<a href="<?= base_url('index.php/Welcome/list_job_appointment') ?>">
  				<i class='bx bxs-data'></i>
  				<span class="links_name">Data CV</span>
  			</a>
  			<span class="tooltip">Analytics</span>
  		</li>
  		<li>
  			<a href="<?= base_url('index.php/Welcome/create_post') ?>">
  				<i class='bx bxs-file-plus'></i>
  				<span class="links_name">Post Create</span>
  			</a>
  			<span class="tooltip">Files</span>
  		</li>

  		<li class="profile">
  			<div class="profile-details">
  				<img src="profile.jpg" alt="profileImg">
  				<div class="name_job">
  					<div class="name">IHSAN</div>
  					<div class="job">Web designer</div>
  				</div>
  			</div>
  			<form action="<?= base_url('index.php/Welcome/logout') ?>" method="post">
  				<button>
  					<i class='bx bx-log-out' id="log_out"></i>
  				</button>
  			</form>

  		</li>
  	</ul>
  </div>
