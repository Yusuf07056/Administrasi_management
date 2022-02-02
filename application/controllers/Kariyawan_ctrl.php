<?php
// defined('BASEPATH') or exit('No direct script access allowed');
class Kariyawan_ctrl extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->model('model_kariyawan');
		$this->load->library('Pdf_report');
	}
	public function index()
	{
		$title['title'] = 'HOME';
		$email = $this->session->userdata('email');
		$data_postingan['post_information'] =  $this->model_kariyawan->get_postingan();
		$data['registrasi'] = $this->model_kariyawan->get_profil($email);
		if (empty($this->session->userdata('email')) && empty($this->session->userdata('role_id'))) {
			$this->load->view('templates/Header_user', $title);
			$this->load->view('sidebar/navbar');
			$this->load->view('home_user_body', $data_postingan);
			$this->load->view('templates/Footer_user');
		} elseif ($this->session->userdata('email') && $this->session->userdata('role_id')) {
			$this->load->view('templates/Header_user', $title);
			$this->load->view('sidebar/navbar');
			$this->load->view('home_user_body', $data_postingan);
			$this->load->view('templates/Footer_user');
		} elseif ($this->session->userdata('email') && $this->session->userdata('role_id')) {
			redirect(base_url('index.php/Welcome/'));
		}
	}
	public function login_karyawan()
	{
		# code...
		$data['registrasi'] = $this->db->get_where('registrasi', ['email' => $this->session->userdata('email')])->row_array();
		$this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email', [
			'required' => 'email required'
		]);
		$this->form_validation->set_rules('password', 'Password', 'required|trim', [
			'required' => 'password required'
		]);
		if ($this->session->userdata('email') && $this->session->userdata('role_id')) {
			$role_id = $this->session->userdata('role_id');
			if ($role_id == 1) {
				redirect(base_url('index.php/Welcome/dashboard'));
			} else {
				redirect(base_url('index.php/Kariyawan_ctrl/main_page'));
			}
		} elseif ($this->form_validation->run() == FALSE) {
			$this->load->view('templates/Header_LG');
			$this->load->view('Login_body_kariyawan');
			$this->load->view('templates/Footer_LG');
		} else {
			$this->login();
		}
	}
	public function registrasi()
	{
		// # code...
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
			$no_telp = $this->input->post('no_telp');
			$gender = $this->input->post('gender');
			$tgl_lahir = $this->input->post('tgl_lahir');
			$this->model_kariyawan->insert_registrasi($user, $email, $password, $no_telp, $gender, $tgl_lahir);
			redirect(base_url('index.php/Welcome'));
		}
		// for ($i = 1; $i <= 10; $i++) {
		// 	$user = ['ihsan' . $i, true];
		// 	$email = ['ihsan' . $i . '@gmail.com', true];
		// 	$password = ['password12' . $i];
		// 	$no_telp = '081221122112';
		// 	$gender = 'MALE';
		// 	$tgl_lahir = '2000-03-18';
		// 	$this->model_kariyawan->insert_registrasi($user, $email, $password, $no_telp, $gender, $tgl_lahir);
		// }
	}

	public function post_lamaran()
	{

		$data['porto'] = '';
		$porto = $_FILES['portofolio']['name'];
		$config['upload_path'] = './asset/document';
		$config['allowed_types'] = 'pdf';
		$this->load->library('upload', $config);
		if (!$this->upload->do_upload('portofolio')) {
			$error = array('error' => $this->upload->display_errors());
			echo "<div>" . $error['error'] . "</div>";
		} else {
			$id_regis = $this->input->post('id_regis');
			$company_id = $this->input->post('company_id');
			$jobdesk = $this->input->post('jobdesk');
			$porto = $this->upload->data('file_name');
			$this->model_kariyawan->input_appointment($id_regis, $jobdesk, $company_id, $porto);
			redirect(base_url('index.php/Welcome/create_post'));
		}
	}

	public function login()
	{
		# code...
		$email = $this->input->post('email');
		$password = $this->input->post('password');
		$this->model_kariyawan->cek_email($email, $password);
	}
	public function upload_cv()
	{
		$this->load->view('templates/Header');
		$this->load->view('sidebar/Sidebar');
		$this->load->view('Upload_body');
		$this->load->view('templates/Footer');
	}

	public function job_job($keyword)
	{
		# code...
		$email = $this->session->userdata('email');
		$data['registrasi'] = $this->model_kariyawan->get_profil($email);
		$data['tb_jobdesk'] = $this->model_kariyawan->get_jobdesk();
		$data['post_information'] = $this->model_kariyawan->get_postingan_by($keyword);
		$title['title'] = 'job appointment';
		$this->load->view('templates/Header_form', $title);
		$this->load->view('daftar_body', $data);
		$this->load->view('templates/Footer_form');
	}
	public function detail_informasi($id_Post)
	{
		# code...
		$email = $this->session->userdata('email');
		$data['registrasi'] = $this->model_kariyawan->get_profil($email);
		$data['tb_jobdesk'] = $this->model_kariyawan->get_jobdesk();
		$data['post_information'] = $this->model_kariyawan->get_postingan_id($id_Post);
		$title['title'] = 'job appointment';
		$this->load->view('templates/Header_form', $title);
		$this->load->view('daftar_body', $data);
		$this->load->view('templates/Footer_form');
	}
	public function main_page()
	{
		# code...
		$email = $this->session->userdata('email');
		$data['registrasi'] = $this->model_kariyawan->get_profil($email);
		$title['title'] = 'PROFILE';
		if ($this->session->userdata('email') && $this->session->userdata('role_id')) {
			$data['email'] = $this->session->userdata('email');
			$this->load->view('templates/Header_user', $title);
			$this->load->view('sidebar/navbar');
			$this->load->view('Profil_body', $data);
			$this->load->view('templates/Footer_user');
		} elseif (empty($this->session->userdata('email')) && empty($this->session->userdata('role_id'))) {
			# code...
			redirect(base_url('index.php/Kariyawan_ctrl/'));
		}
	}
	public function lihat_list_lamaran($id_registrasi)
	{
		# code...
		$data['join_appointment'] = $this->model_kariyawan->join_appointment_by($id_registrasi);
		$data['join_verifikasi'] = $this->model_kariyawan->join_verifikasi_by($id_registrasi);
		$title['title'] = 'HISTORY';
		if ($this->session->userdata('email') && $this->session->userdata('role_id')) {
			$this->load->view('templates/Header_user', $title);
			$this->load->view('sidebar/navbar');
			$this->load->view('lamaran_list_body', $data);
			$this->load->view('templates/Footer_user');
		} elseif (empty($this->session->userdata('email')) && empty($this->session->userdata('role_id'))) {
			# code...
			redirect(base_url('index.php/Kariyawan_ctrl/'));
		}
	}
	public function unduh_file($porto)
	{
		# code...
		force_download("asset/document/$porto", NULL);
	}
	public function information()
	{
		# code...
		$id = $this->session->userdata('id_registrasi');
		$data['job_appointment'] = $this->model_kariyawan->get_jobappointmet_by($id);
		$data['post_information'] = $this->model_kariyawan->get_postingan();
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
	function pdf_generate($id_registrasi)
	{
		$data['join_verifikasi'] = $this->model_kariyawan->join_verifikasi_by($id_registrasi);
		$this->load->view('PDF_PRINT', $data);
	}
}
