<?php 


class Ctrl_company extends CI_Controller
{

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
				redirect(base_url('index.php/Kariyawan_ctrl/feed_page'));
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
			$judul_post = $this->input->post('judul');
			$keyword = $this->input->post('keyword');
			$isi_post = $this->input->post('isi');
			$status_post = $this->input->post('status');
			$foto = $this->upload->data('file_name');
		}
		$this->model_adm->insert_postingan($judul_post, $keyword, $isi_post, $status_post, $foto);
		redirect(base_url('index.php/Welcome/create_post'));
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
}

