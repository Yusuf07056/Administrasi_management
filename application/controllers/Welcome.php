<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Welcome extends CI_Controller
{

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	function __construct()
	{
		parent::__construct();
		$this->load->model('model_adm');
	}
	public function index()
	{
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
			if ($role_id == 1) {
				# code...
				redirect(base_url('index.php/Welcome/dashboard'));
			} elseif ($role_id == 2) {
				# code...
				redirect(base_url('index.php/Kariyawan_ctrl/main_page'));
			}
		} elseif ($this->form_validation->run() == FALSE) {
			# code...
			$this->load->view('templates/Header_LG');
			$this->load->view('Login_body');
			$this->load->view('templates/Footer_LG');
		} else {
			# code...
			$this->login();
		}
	}
	public function profil()
	{
		$this->load->view('templates/Header');
		$this->load->view('sidebar/Sidebar');
		$this->load->view('Profil_body');
		$this->load->view('templates/Footer');
	}
	public function dashboard()
	{
		$data['registrasi'] = $this->db->get_where('registrasi', ['email' => $this->session->userdata('email')])->row_array();
		if ($this->session->userdata('email') && $this->session->userdata('role_id') == 1) {
			# code...
			$this->load->view('templates/Header');
			$this->load->view('sidebar/Sidebar');
			$this->load->view('Dashboard_body');
			$this->load->view('templates/Footer');
		} else {
			# code...
			redirect(base_url('index.php/Welcome'));
		}
	}
	public function create_post()
	{
		$data['registrasi'] = $this->db->get_where('registrasi', ['email' => $this->session->userdata('email')])->row_array();
		if ($this->session->userdata('email') && $this->session->userdata('role_id') == 1) {
			# code...
			$this->load->view('templates/Header');
			$this->load->view('sidebar/Sidebar');
			$this->load->view('Create_post_body');
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
		$this->form_validation->set_rules('umur', 'umur', 'required|trim', ['required' => 'umur harus di isi']);

		if ($this->form_validation->run() == FALSE) {
			$this->load->view('templates/Header_LG');
			$this->load->view('Login_body');
			$this->load->view('templates/Footer_LG');
		} else {
			$user = $this->input->post('user_name', true);
			$email = $this->input->post('email', true);
			$password = $this->input->post('password1');
			$no_telp = $this->input->post('no_telp');
			$gender = $this->input->post('gender');
			$umur = $this->input->post('umur');
			$this->model_adm->insert_registrasi($user, $email, $password, $no_telp, $gender, $umur);
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
	public function input_post()
	{
		# code...
		// $data['registrasi'] = $this->db->get_where('registrasi', ['email' => $this->session->userdata('email')])->row_array();
		// $email = $this->session->userdata('email');
		// $role_id = $this->session->userdata('role_id');
		$this->form_validation->set_rules('judul', 'Judul', 'required');
		$this->form_validation->set_rules('isi', 'Isi', 'required');
		$this->form_validation->set_rules('status', 'Status', 'required');
		$data['foto'] = '';
		$foto = $_FILES['gambar']['name'];
		$config['upload_path'] = './asset/image';
		$config['allowed_types'] = 'jpg|png|jpeg';
		$this->load->library('upload', $config);
		if (!$this->upload->do_upload('gambar') || $this->form_validation->run() == false) {
			# code...
			echo "upload gagal";
		} else {
			# code...
			$judul_post = $this->input->post('judul');
			$isi_post = $this->input->post('isi');
			$status_post = $this->input->post('status');
			$foto = $this->upload->data('gambar');
			$data = [
				'judul_post' => $judul_post,
				'isi_post' => $isi_post,
				'status_post' => $status_post,
				'foto' => $foto
			];

			$this->db->insert('post_information', $data);
			// $this->model_adm->insert_postingan($judul_post, $isi_post, $foto, $status_post);
			redirect(base_url('index.php/Welcome/create_post'));
		}
	}
}
