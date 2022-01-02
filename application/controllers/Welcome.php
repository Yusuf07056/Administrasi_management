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
			} else {
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
		$data_postingan['tb_perusahaan'] = $this->model_adm->get_company();
		$data_postingan['tb_jobdesk'] = $this->model_adm->get_jobdesk();
		$data['registrasi'] = $this->db->get_where('registrasi', ['email' => $this->session->userdata('email')])->row_array();
		$data_postingan['post_information'] =  $this->model_adm->get_postingan();
		if ($this->session->userdata('email') && $this->session->userdata('role_id') == 1) {
			# code...
			$this->load->view('templates/Header');
			$this->load->view('sidebar/Sidebar');
			$this->load->view('Create_post_body', $data_postingan);
			$this->load->view('templates/Footer');
		} else {
			# code...
			redirect(base_url('index.php/Welcome'));
		}
	}
	public function list_job_appointment()
	{
		$data['join_appointment'] = $this->model_adm->join_appointment_by();
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
			$no_telp = $this->input->post('no_telp');
			$gender = $this->input->post('gender');
			$tgl_lahir = $this->input->post('tgl_lahir');
			$this->model_adm->insert_registrasi($user, $email, $password, $no_telp, $gender, $tgl_lahir);
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

		$this->form_validation->set_rules('judul', 'Judul post', 'required');
		$this->form_validation->set_rules('isi', 'Isi post', 'required');
		$this->form_validation->set_rules('status', 'Status post', 'required');
		$this->form_validation->set_rules('keyword', 'Keyword', 'required');
		$data['foto'] = '';
		$foto = $_FILES['gambar']['name'];
		$config['upload_path'] = './asset/image';
		$config['allowed_types'] = 'jpg|png|jpeg';
		$this->load->library('upload', $config);
		if (!$this->upload->do_upload('gambar') || $this->form_validation->run() == false) {
			$error = array('error' => $this->upload->display_errors());
			echo "<div>" . $error['error'] . "</div>";
		} else {
			$judul_post = $this->input->post('judul');
			$keyword = $this->input->post('keyword');
			$isi_post = $this->input->post('isi');
			$status_post = $this->input->post('status');
			$foto = $this->upload->data('file_name');
			$company_id = $this->input->post('company_id');
			$jobdesk = $this->input->post('jobdesk');
			$this->model_adm->insert_postingan($judul_post, $keyword, $isi_post, $status_post, $foto, $company_id, $jobdesk);
			redirect(base_url('index.php/Welcome/create_post'));
		}
	}
	public function update_page($id_post)
	{
		# code...
		$data['registrasi'] = $this->db->get_where('registrasi', ['email' => $this->session->userdata('email')])->row_array();
		$edit_post['post_information'] = $this->model_adm->get_post_select($id_post);
		if ($this->session->userdata('email') && $this->session->userdata('role_id') == 1) {
			$this->load->view('templates/Header');
			$this->load->view('sidebar/Sidebar');
			$this->load->view('Update_body', $edit_post);
			$this->load->view('templates/Footer');
		}
	}

	public function insert_update()
	{
		# code...
		$this->form_validation->set_rules('judul', 'Judul', 'required');
		$this->form_validation->set_rules('isi', 'Isi', 'required');
		$this->form_validation->set_rules('status', 'Status', 'required');
		$this->form_validation->set_rules('keyword', 'Keyword', 'required');
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
			$id = $this->input->post('id');
			$judul_post = $this->input->post('judul');
			$keyword = $this->input->post('keyword');
			$isi_post = $this->input->post('isi');
			$status_post = $this->input->post('status');
			$foto = $this->upload->data('file_name');
		}
		$this->model_adm->update_data($id, $judul_post, $keyword, $isi_post, $status_post, $foto);
		redirect(base_url('index.php/Welcome/create_post'));
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
	public function delete_jobdesk($id)
	{
		if ($this->session->userdata('email') && $this->session->userdata('role_id') == 1) {
			$this->model_adm->delete_jobdesk_method($id);
			redirect(base_url('index.php/Welcome/create_post'));
		} else {
			$this->logout();
		}
	}
}
