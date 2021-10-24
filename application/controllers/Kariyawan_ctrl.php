<?php
class Kariyawan_ctrl extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->model('Model_kariyawan');
	}
	public function index()
	{
		# code...
		$this->load->view('templates/Header_LG');
		$this->load->view('Login_body');
		$this->load->view('templates/Footer_LG');
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
		$data['file_cv'] = '';
		$file_cv = $_FILES['file']['name'];
		$config['upload_path'] = './asset/document/';
		$config['allowed_types'] = 'doc|docx';

		$this->load->library('upload', $config);

		if (!$this->upload->do_upload('file') || $this->form_validation->run() == false) {
			# code...
			$this->load->view('templates/Header_LG');
			$this->load->view('Login_body');
			$this->load->view('templates/Footer_LG');
		} elseif ($this->form_validation->run() == TRUE) {
			# code...
			$user_name = $this->input->post('user_name');
			$email = $this->input->post('email');
			$password = $this->input->post('password');
			$role_id = '1';
			$is_active = '1';
			$no_telp = $this->input->post('no_telp');
			$gender = $this->input->post('gender');
			$umur = $this->input->post('umur');
			$file_cv = $this->input->post('file_cv');
			$data = [
				'user_name' => $user_name,
				'email' => $email,
				'password' => $password,
				'role_id' => $role_id,
				'is_active' => $is_active,
				'no_telp' => $no_telp,
				'gender' => $gender,
				'umur' => $umur,
				'file_cv' => $file_cv
			];
			$this->model;
		} else {
			# code...
		}
	}
}
