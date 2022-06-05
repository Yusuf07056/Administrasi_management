<?php


class Kariyawan_ctrl extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		$this->load->model('model_adm');
	}
	public function index()
	{
		$title['title'] = 'LOGIN';
		$data['registrasi'] = $this->db->get_where('registrasi', ['email' => $this->session->userdata('email')])->row_array();
		$this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email', [
			'required' => 'email required'
		]);
		$this->form_validation->set_rules('password', 'Password', 'required|trim', [
			'required' => 'password required'
		]);
		if ($this->session->userdata('email') && $this->session->userdata('role_id')) {
			# code...
			$role_id = $this->session->userdata('role_id');
			if ($role_id == 2) {
				# code...
				redirect(base_url('index.php/Welcome/dashboard'));
			} else {
				# code...
				redirect(base_url('index.php/Welcome/dashboard'));
			}
		} elseif ($this->form_validation->run() == FALSE) {
			# code...
			$this->load->view('templates/Header_LG', $title);
			$this->load->view('Login_body');
			$this->load->view('templates/Footer_LG');
		} else {
			# code...
			$this->login();
		}
	}
	public function profil()
	{
		$email = $this->session->userdata('email');
		$data['registrasi'] = $this->model_adm->get_profil_adm($email);
		if ($this->session->userdata('email') && $this->session->userdata('role_id')) {
			$this->load->view('templates/Header');
			$this->load->view('sidebar/Sidebar');
			$this->load->view('Profil_body', $data);
			$this->load->view('templates/Footer');
		} elseif ($this->session->userdata('email') && $this->session->userdata('role_id')) {
			# code...
			redirect(base_url('index.php/Welcome/'));
		}
	}
	public function desk_job()
	{
		$email = $this->session->userdata('email');
		$data['registrasi'] = $this->model_adm->get_profil_adm($email);
		$data['tb_jobdesk'] = $this->model_adm->get_jobdesk();
		if ($this->session->userdata('email') && $this->session->userdata('role_id')) {
			$this->load->view('templates/Header');
			$this->load->view('sidebar/Sidebar');
			$this->load->view('jobdesk_create_body', $data);
			$this->load->view('templates/Footer');
		} elseif ($this->session->userdata('email') && $this->session->userdata('role_id')) {
			# code...
			redirect(base_url('index.php/Welcome/'));
		}
	}
	public function input_jobdesk()
	{
		# code...
		$this->form_validation->set_rules('jobdesk', 'Jobdesk', 'required', ['required' => 'harus di isi']);
		$jobdesk = $this->input->post('jobdesk');

		if ($this->form_validation->run() == FALSE && empty($this->session->userdata('email')) && empty($this->session->userdata('role_id'))) {
			# code...
			redirect(base_url('index.php/Welcome/logout'));
		} else {
			# code...
			$this->model_adm->insert_jobdesk($jobdesk);
			redirect(base_url('index.php/Welcome/desk_job'));
		}
	}
	public function record_barang_masuk_()
	{
		$data['registrasi'] = $this->db->get_where('registrasi', ['email' => $this->session->userdata('email')])->row_array();
		$data['tb_barang'] = $this->model_adm->table_barang_view();
		$data['join_tb_barang_in'] = $this->model_adm->join_tb_barang_masuk();
		if ($this->session->userdata('email') && $this->session->userdata('role_id') == 1) {
			# code...
			$title['title'] = 'DASHBOARD';
			$this->load->view('templates/Header', $title);
			$this->load->view('sidebar/Sidebar');
			$this->load->view('Tb_barang_masuk_body', $data);
			$this->load->view('templates/Footer');
		} else {
			# code...
			redirect(base_url('index.php/Welcome'));
		}
	}
	public function record_barang_keluar_()
	{
		$data['registrasi'] = $this->db->get_where('registrasi', ['email' => $this->session->userdata('email')])->row_array();
		$data['tb_barang'] = $this->model_adm->table_barang_view();
		$data['join_tb_barang_out'] = $this->model_adm->join_tb_barang_keluar();
		if ($this->session->userdata('email') && $this->session->userdata('role_id') == 1) {
			# code...
			$title['title'] = 'DASHBOARD';
			$this->load->view('templates/Header', $title);
			$this->load->view('sidebar/Sidebar');
			$this->load->view('Tb_barang_keluar_body', $data);
			$this->load->view('templates/Footer');
		} else {
			# code...
			redirect(base_url('index.php/Welcome'));
		}
	}
	public function create_barang()
	{
		$data['registrasi'] = $this->db->get_where('registrasi', ['email' => $this->session->userdata('email')])->row_array();
		$data['tb_barang'] = $this->model_adm->table_barang_view();
		if ($this->session->userdata('email') && $this->session->userdata('role_id') == 1) {
			# code...
			$title['title'] = 'INPUT BARANG';
			$this->load->view('templates/Header', $title);
			$this->load->view('sidebar/Sidebar');
			$this->load->view('Form_inputBarang_body', $data);
			$this->load->view('templates/Footer');
		} else {
			# code...
			redirect(base_url('index.php/Welcome'));
		}
	}
	public function delete_barang($nama)
	{
		# code...
		$this->model_adm->delete_tb_barang($nama);
		redirect(base_url('index.php/Welcome'));
	}
	public function delete_reg($id_registrasi)
	{
		# code...
		$this->model_adm->delete_tb_registrasi($id_registrasi);
		redirect(base_url('index.php/Welcome'));
	}
	public function delete_barang_join($id)
	{
		# code...
		$this->model_adm->delete_tb_barang_in($id);
		redirect(base_url('index.php/Welcome/record_barang_masuk_'));
	}
	public function list_job_appointment()
	{
		$data['join_appointment'] = $this->model_adm->join_appointment_by();
		$data['join_verifikasi'] = $this->model_adm->join_verifikasi();
		$data['registrasi'] = $this->db->get_where('registrasi', ['email' => $this->session->userdata('email')])->row_array();
		$data_postingan['post_information'] =  $this->model_adm->get_postingan();
		if ($this->session->userdata('email') && $this->session->userdata('role_id') == 1) {
			# code...
			$this->load->view('templates/Header');
			$this->load->view('sidebar/Sidebar');
			$this->load->view('lamaran_list_adm', $data);
			$this->load->view('templates/Footer');
		} else {
			# code...
			redirect(base_url('index.php/Welcome'));
		}
	}

	public function konfirmasi_lamaran()
	{
		# code...
		$data['registrasi'] = $this->db->get_where('registrasi', ['email' => $this->session->userdata('email')])->row_array();
		$data_postingan['post_information'] =  $this->model_adm->get_postingan();
		if ($this->session->userdata('email') && $this->session->userdata('role_id') == 1) {
			# code...
			$id_pelamar = $this->input->post('id_pelamar');
			$id_registrasi = $this->input->post('id_registrasi');
			$id_perusahaan = $this->input->post('id_perusahaan');
			$status = $this->input->post('status');
			$this->model_adm->insert_verifikasi($id_registrasi, $id_pelamar, $id_perusahaan, $status);
			redirect(base_url('index.php/Welcome/list_job_appointment'));
		} else {
			# code...
			$error = array('error' => $this->upload->display_errors());
			echo "<div>" . $error['error'] . "</div>";
			// redirect(base_url('index.php/Welcome'));
		}
	}

	public function page_registration()
	{
		# code...
		$data['registrasi'] = $this->db->get_where('registrasi', ['email' => $this->session->userdata('email')])->row_array();
		$data['list_role'] = $this->model_adm->get_role();
		$data['registrasi'] = $this->model_adm->get_registrasi();
		$title['title'] = 'TAMBAH PEGAWAI';
		if ($this->session->userdata('email') && $this->session->userdata('role_id') == 1) {
			$this->load->view('templates/Header', $title);
			$this->load->view('sidebar/Sidebar');
			$this->load->view('Register_body', $data);
			$this->load->view('templates/Footer');
		} else {
			# code...
			redirect(base_url('index.php/Welcome'));
		}
	}
	public function update_page_registration($id_registrasi)
	{
		# code...
		$data['registrasi'] = $this->db->get_where('registrasi', ['email' => $this->session->userdata('email')])->row_array();
		$data['list_role'] = $this->model_adm->get_role();
		$data['registrasi'] = $this->model_adm->get_registrasi_by($id_registrasi);
		$title['title'] = "EDIT PEGAWAI";
		if ($this->session->userdata('email') && $this->session->userdata('role_id') == 1) {
			$this->load->view('templates/Header', $title);
			$this->load->view('sidebar/Sidebar');
			$this->load->view('Update_pegawai_body', $data);
			$this->load->view('templates/Footer');
		} else {
			# code...
			redirect(base_url('index.php/Welcome'));
		}
	}

	public function registrasi()
	{
		# code...
		$this->form_validation->set_rules('user_name', 'User name', 'trim|required', ['required' => 'User name harus di isi']);
		$this->form_validation->set_rules(
			'email',
			'email',
			'required|trim|valid_email|is_unique[registrasi.email]',
			[
				'required' => 'email harus di isi',
				'is_unique' => 'email sudah terdaftar'
			]
		);
		$this->form_validation->set_rules('password1', 'password', 'required|trim|min_length[8]|matches[password2]', [
			'required' => 'password harus di isi',
			'matches' => 'password tidak cocok!',
			'min_length' => 'PASSWORD TERLALU LEMAH'
		]);
		$this->form_validation->set_rules('password2', 'password', 'required|trim|matches[password1]', ['required' => 'password harus di isi']);
		$this->form_validation->set_rules('no_telp', 'phone number', 'required|trim', ['required' => 'nomer telepon harus di isi']);
		$this->form_validation->set_rules('gender', 'gender', 'required|trim', ['required' => 'gender harus di pilih']);
		$this->form_validation->set_rules('tgl_lahir', 'tanggal lahir', 'required|trim', ['required' => 'tanggal lahir harus di isi']);

		if ($this->form_validation->run() == FALSE) {
			$this->load->view('templates/Header_LG');
			$this->load->view('Login_body');
			$this->load->view('templates/Footer_LG');
		} else {
			$user = $this->input->post('user_name', true);
			$email = $this->input->post('email', true);
			$password = $this->input->post('password1');
			$role_id = $this->input->post('role_id');
			$is_active = $this->input->post('is_active');
			$no_telp = $this->input->post('no_telp');
			$gender = $this->input->post('gender');
			$tgl_lahir = $this->input->post('tgl_lahir');
			$this->model_adm->insert_registrasi($user, $email, $password, $role_id, $is_active, $no_telp, $gender, $tgl_lahir);
			redirect(base_url('index.php/Welcome'));
		}
	}
	public function insert_update_pegawai()
	{
		# code...
		$this->form_validation->set_rules('user_name', 'User name', 'trim|required', ['required' => 'User name harus di isi']);
		$this->form_validation->set_rules(
			'email',
			'email',
			'required|trim|valid_email|is_unique[registrasi.email]',
			[
				'required' => 'email harus di isi',
				'is_unique' => 'email sudah terdaftar'
			]
		);
		$this->form_validation->set_rules('password1', 'password', 'required|trim|min_length[8]|matches[password2]', [
			'required' => 'password harus di isi',
			'matches' => 'password tidak cocok!',
			'min_length' => 'PASSWORD TERLALU LEMAH'
		]);
		$this->form_validation->set_rules('password2', 'password', 'required|trim|matches[password1]', ['required' => 'password harus di isi']);
		$this->form_validation->set_rules('no_telp', 'phone number', 'required|trim', ['required' => 'nomer telepon harus di isi']);
		$this->form_validation->set_rules('gender', 'gender', 'required|trim', ['required' => 'gender harus di pilih']);
		$this->form_validation->set_rules('tgl_lahir', 'tanggal lahir', 'required|trim', ['required' => 'tanggal lahir harus di isi']);

		if ($this->form_validation->run() == FALSE) {
			$this->load->view('templates/Header_LG');
			$this->load->view('Login_body');
			$this->load->view('templates/Footer_LG');
		} else {
			$id_registrasi = $this->input->post('id_registrasi');
			$user = $this->input->post('user_name', true);
			$email = $this->input->post('email', true);
			$password = $this->input->post('password1');
			$role_id = $this->input->post('role_id');
			$is_active = $this->input->post('is_active');
			$no_telp = $this->input->post('no_telp');
			$gender = $this->input->post('gender');
			$tgl_lahir = $this->input->post('tgl_lahir');
			$this->model_adm->insert_registrasi_update($id_registrasi, $user, $email, $password, $role_id, $is_active, $no_telp, $gender, $tgl_lahir);
			redirect(base_url('index.php/Welcome'));
		}
	}
	public function login()
	{
		$email = $this->input->post('email');
		$password = $this->input->post('password');
		$this->model_adm->cek_email($email, $password);
	}
	public function logout()
	{
		# code...
		$this->session->unset_userdata('email');
		$this->session->unset_userdata('role_id');
		redirect(base_url('index.php/Welcome'));
	}
	public function input_barang()
	{

		$this->form_validation->set_rules('nama_barang', 'NAMA BARANG', 'required');
		$this->form_validation->set_rules('jenis', 'JENIS BARANG', 'required');
		$this->form_validation->set_rules('harga', 'HARGA BARANG', 'required');
		if ($this->form_validation->run() == false) {
			$error['errors'] = 'input ulang';
			echo "<div>" . $error . "</div>";
		} else {
			$nama_barang = $this->input->post('nama_barang');
			$jenis = $this->input->post('jenis');
			$jumlah = 0;
			$harga = $this->input->post('harga');
			$this->model_adm->insert_barang($nama_barang, $jenis, $jumlah, $harga);
			redirect(base_url('index.php/Welcome/tb_barang_page'));
		}
	}
	public function update_barang($id_barang)
	{
		# code...
		$title['title'] = 'update';
		$data['registrasi'] = $this->db->get_where('registrasi', ['email' => $this->session->userdata('email')])->row_array();
		$data['tb_barang'] = $this->model_adm->get_barang_select($id_barang);
		if ($this->session->userdata('email') && $this->session->userdata('role_id') == 1) {
			$this->load->view('templates/Header', $title);
			$this->load->view('sidebar/Sidebar');
			$this->load->view('Update_body', $data);
			$this->load->view('templates/Footer');
		}
	}
	public function update_barang_in($id_barang)
	{
		# code...
		$title['title'] = 'update';
		$data['registrasi'] = $this->db->get_where('registrasi', ['email' => $this->session->userdata('email')])->row_array();
		$data['tb_barang_masuk'] = $this->model_adm->get_barangIN_select($id_barang);
		$data['tb_barang'] = $this->model_adm->table_barang_view();
		$data['tb_supplier'] = $this->model_adm->get_supplier();
		if ($this->session->userdata('email') && $this->session->userdata('role_id') == 1) {
			$this->load->view('templates/Header', $title);
			$this->load->view('sidebar/Sidebar');
			$this->load->view('Update_barangIN_body', $data);
			$this->load->view('templates/Footer');
		}
	}

	public function input_barang_masuk($id_barang)
	{
		# code...
		$title['title'] = 'barang masuk';
		$data['registrasi'] = $this->db->get_where('registrasi', ['email' => $this->session->userdata('email')])->row_array();
		$data['tb_barang'] = $this->model_adm->get_barang_select($id_barang);
		$data['tb_supplier'] = $this->model_adm->get_supplier();
		if ($this->session->userdata('email') && $this->session->userdata('role_id') == 1) {
			$this->load->view('templates/Header', $title);
			$this->load->view('sidebar/Sidebar');
			$this->load->view('Barangmasuk_body', $data);
			$this->load->view('templates/Footer');
		}
	}

	public function input_barang_keluar($id_barang, $id_barang_in)
	{
		# code...
		$title['title'] = 'barang masuk';
		$data['registrasi'] = $this->db->get_where('registrasi', ['email' => $this->session->userdata('email')])->row_array();
		$data['tb_barang'] = $this->model_adm->get_barang_select($id_barang);
		$data['tb_supplier'] = $this->model_adm->get_supplier();
		$data['tb_record_barang_masuk'] = $this->model_adm->join_tb_barang_masuk_by($id_barang_in);
		if ($this->session->userdata('email') && $this->session->userdata('role_id') == 1) {
			$this->load->view('templates/Header', $title);
			$this->load->view('sidebar/Sidebar');
			$this->load->view('Barangkeluar_body', $data);
			$this->load->view('templates/Footer');
		}
	}

	public function tb_barang_page()
	{
		$data['registrasi'] = $this->db->get_where('registrasi', ['email' => $this->session->userdata('email')])->row_array();
		$data['tb_barang'] = $this->model_adm->table_barang_view();
		if ($this->session->userdata('email') && $this->session->userdata('role_id') == 1) {
			# code...
			$title['title'] = 'data barang';
			$this->load->view('templates/Header', $title);
			$this->load->view('sidebar/Sidebar');
			$this->load->view('Tb_barang_body', $data);
			$this->load->view('templates/Footer');
		} else {
			# code...
			redirect(base_url('index.php/Welcome'));
		}
	}
	public function supplier_page_()
	{
		$data['registrasi'] = $this->db->get_where('registrasi', ['email' => $this->session->userdata('email')])->row_array();
		$data['tb_supplier'] = $this->model_adm->get_supplier();
		if ($this->session->userdata('email') && $this->session->userdata('role_id') == 1) {
			# code...
			$title['title'] = 'supplier';
			$this->load->view('templates/Header', $title);
			$this->load->view('sidebar/Sidebar');
			$this->load->view('Supplier_page_body', $data);
			$this->load->view('templates/Footer');
		} else {
			# code...
			redirect(base_url('index.php/Welcome'));
		}
	}

	public function insert_update()
	{
		# code...
		$this->form_validation->set_rules('id_barang', 'id barang', 'required');
		$this->form_validation->set_rules('nama_barang', 'nama barang', 'required');
		$this->form_validation->set_rules('jenis', 'Jenis', 'required');
		$this->form_validation->set_rules('jumlah', 'Jumlah', 'required');
		$this->form_validation->set_rules('harga', 'Harga', 'required');

		if ($this->form_validation->run() == false) {
			# code...
			echo "upload gagal";
		} else {
			# code...
			$id_barang = $this->input->post('id_barang');
			$nama_barang = $this->input->post('nama_barang');
			$jenis = $this->input->post('jenis');
			$jumlah = $this->input->post('jumlah');
			$harga = $this->input->post('harga');
		}
		$this->model_adm->update_data_barang($id_barang, $nama_barang, $jenis, $jumlah, $harga);
		redirect(base_url('index.php/Welcome/'));
	}
	public function insert_supplier()
	{
		# code...
		$this->form_validation->set_rules('nama_supplier', 'nama barang', 'required');
		$this->form_validation->set_rules('no_telp', 'Jenis', 'required');
		$this->form_validation->set_rules('alamat', 'Jumlah', 'required');

		if ($this->form_validation->run() == false) {
			# code...
			echo "upload gagal";
		} else {
			# code...
			$nama_supplier = $this->input->post('nama_supplier');
			$no_telp = $this->input->post('no_telp');
			$alamat = $this->input->post('alamat');
		}
		$this->model_adm->insert_supplier($nama_supplier, $no_telp, $alamat);
		redirect(base_url('index.php/Welcome/supplier_page_'));
	}
	public function insert_barang_in()
	{
		# code...
		$this->form_validation->set_rules('id_barang', 'id barang', 'required');
		$this->form_validation->set_rules('id_supplier', 'supplier', 'required');
		$this->form_validation->set_rules('detail_tanggal_masuk', 'tanggal masuk', 'required');
		$this->form_validation->set_rules('jumlah_masuk', 'jumlah masuk', 'required');

		if ($this->form_validation->run() == false) {
			# code...
			echo "upload gagal";
		} else {
			# code...
			$id_barang = $this->input->post('id_barang');
			$id_supplier = $this->input->post('id_supplier');
			$detail_tanggal_masuk = $this->input->post('detail_tanggal_masuk');
			$jumlah = $this->input->post('jumlah_stok');
			$jumlah_masuk = $this->input->post('jumlah_masuk');
			$total = $jumlah + $jumlah_masuk;
		}
		$this->model_adm->insert_barang_IN($id_barang, $id_supplier, $detail_tanggal_masuk, $jumlah_masuk, $total);
		$this->model_adm->update_data_barang_by($id_barang, $total);
		redirect(base_url('index.php/Welcome/record_barang_masuk_'));
	}
	public function insert_barang_out()
	{
		# code...
		$this->form_validation->set_rules('id_barang', 'id barang', 'required');
		$this->form_validation->set_rules('id_supplier', 'supplier', 'required');
		$this->form_validation->set_rules('tanggal_keluar', 'tanggal keluar', 'required');
		$this->form_validation->set_rules('jumlah_keluar', 'jumlah keluar', 'required');
		$this->form_validation->set_rules('bulan', 'pilih bulan', 'required');

		if ($this->form_validation->run() == false) {
			# code...
			echo "upload gagal";
		} else {
			# code...
			$id_barang = $this->input->post('id_barang');
			$id_barang_in = $this->input->post('id_barang_in');
			$id_supplier = $this->input->post('id_supplier');
			$tanggal_keluar = $this->input->post('tanggal_keluar');
			$jumlah = $this->input->post('jumlah_stok');
			$jumlah_keluar = $this->input->post('jumlah_keluar');
			$total = $jumlah - $jumlah_keluar;
			$bulan = $this->input->post('bulan');
		}
		$this->model_adm->insert_barang_out($id_barang_in, $id_supplier, $id_barang, $jumlah_keluar, $total, $tanggal_keluar, $bulan);
		$this->model_adm->update_data_barang_by($id_barang, $total);
		redirect(base_url('index.php/Welcome/record_barang_masuk_'));
	}
	public function update_barang_join()
	{
		# code...
		$this->form_validation->set_rules('id_barang', 'id barang', 'required');
		$this->form_validation->set_rules('id_supplier', 'supplier', 'required');
		$this->form_validation->set_rules('detail_tanggal_masuk', 'Jumlah', 'required');
		$this->form_validation->set_rules('jumlah_masuk', 'Harga', 'required');

		if ($this->form_validation->run() == false) {
			# code...
			echo "upload gagal";
		} else {
			# code...
			$id_barang = $this->input->post('id_barang');
			$id_supplier = $this->input->post('id_supplier');
			$detail_tanggal_masuk = $this->input->post('detail_tanggal_masuk');
			$jumlah = $this->input->post('jumlah_stok');
			$jumlah_masuk = $this->input->post('jumlah_masuk');
			$total = $jumlah + $jumlah_masuk;
		}
		$this->model_adm->insert_barang_IN($id_barang, $id_supplier, $detail_tanggal_masuk, $jumlah_masuk);
		$this->model_adm->update_data_barang_by($id_barang, $total);
		redirect(base_url('index.php/Welcome/record_barang_masuk_'));
	}

	public function delete_post($id_post)
	{
		if ($this->session->userdata('email') && $this->session->userdata('role_id') == 1) {
			$this->model_adm->delete_method($id_post);
			redirect(base_url('index.php/Welcome/create_post'));
		} else {
			$this->logout();
		}
	}
	public function delete_supplier($id_supplier)
	{
		if ($this->session->userdata('email') && $this->session->userdata('role_id') == 1) {
			$this->model_adm->delete_supplier($id_supplier);
			redirect(base_url('index.php/Welcome/create_post'));
		} else {
			$this->logout();
		}
	}
	public function delete_jobdesk($id)
	{
		if ($this->session->userdata('email') && $this->session->userdata('role_id') == 1) {
			$this->model_adm->delete_jobdesk_method($id);
			redirect(base_url('index.php/Welcome/create_post'));
		} else {
			$this->logout();
		}
	}

	public function delete_verifikasi_data_pelamar($id)
	{
		if ($this->session->userdata('email') && $this->session->userdata('role_id') == 1) {
			$this->model_adm->delete_verfikasi_pelamar($id);
			redirect(base_url('index.php/Welcome/list_job_appointment'));
		} else {
			$this->logout();
		}
	}
	public function select_to_print()
	{
		if ($this->session->userdata('email') && $this->session->userdata('role_id') == 1) {
			$this->form_validation->set_rules('bulan', 'pilih bulan', 'required');
			if ($this->form_validation->run() == false) {
				# code...
				echo "gagal";
			} else {
				$bulan = $this->input->post('bulan');
				$data['join_barang_out_by'] = $this->model_adm->join_tb_barang_keluar_by($bulan);
				$this->load->view('print_body', $data);
			}
		} else {
			$this->logout();
		}
	}
}
