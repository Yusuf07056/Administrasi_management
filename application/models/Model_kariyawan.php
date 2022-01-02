<?php
class model_kariyawan extends CI_Model
{
	public function get_registrasi()
	{
		# code...
		$query = $this->db->get('registrasi');
		return $query;
	}

	public function get_postingan()
	{
		# code...
		return $this->db->get('post_information')->result_array();
	}
	public function get_postingan_by($keyword)
	{
		# code...
		return $this->db->get_where('post_information', ['keyword' => $keyword])->result_array();
	}
	public function get_postingan_id($id_post)
	{
		# code...
		return $this->db->get_where('post_information', ['id_post' => $id_post])->result_array();
	}

	public function get_profil($email)
	{
		return $this->db->get_where('registrasi', ['email' => $email]);
	}

	public function get_jobdesk()
	{
		# code...
		return $this->db->get('tb_jobdesk')->result_array();
	}

	public function get_jobappointmet()
	{
		# code...
		return $this->db->get('job_appointment')->result_array();
	}

	public function get_jobappointmet_by($id_regis)
	{
		# code...
		return $this->db->get_where('job_appointment', ['id_regis' => $id_regis])->result_array();
	}

	public function insert_registrasi($user, $email, $password, $no_telp, $gender, $tgl_lahir)
	{
		# code...
		$data = [
			'user_name' => htmlspecialchars($user),
			'email' => htmlspecialchars($email),
			'password' => password_hash($password, PASSWORD_DEFAULT),
			'role_id' => 2,
			'is_active' => 1,
			'no_telp' => $no_telp,
			'gender' => $gender,
			'tgl_lahir' => $tgl_lahir
		];
		$this->db->insert('registrasi', $data);
	}
	public function cek_email($email, $password)
	{
		# code...
		$registrasi = $this->db->get_where('registrasi', ['email' => $email])->row_array();
		if ($registrasi) {
			# code...
			if ($registrasi['is_active'] == 1 && password_verify($password, $registrasi['password'])) {
				# code...
				$data = [
					'id_registrasi' => $registrasi['id_registrasi'],
					'email' => $registrasi['email'],
					'role_id' => $registrasi['role_id'],
				];

				$this->session->set_userdata($data);

				if ($registrasi['role_id'] == 2) {
					redirect(base_url('index.php/Kariyawan_ctrl/main_page'));
				} elseif ($registrasi['role_id'] == 1) {
					redirect(base_url('index.php/Welcome/dashboard'));
				} else {
					redirect(base_url('index.php/Kariyawan_ctrl/'));
				}
			} else {
				# code...
				$this->session->set_flashdata('massage', 'LOGIN GAGAL');
			}
		} else {
			# code...
			$this->session->set_flashdata('massage', 'LOGIN GAGAL');
		}
		return $registrasi;
	}


	public function input_appointment($id_regis, $jobdesk, $company_id, $porto)
	{
		# code...
		$data = [
			'id_regis' => $id_regis,
			'job_desk' => $jobdesk,
			'perusahaan_id' => $company_id,
			'porto' => $porto
		];
		$this->db->insert('job_appointment', $data);
	}
	public function join_appointment_by($id_regis)
	{
		# code...
		$this->db->select('job_appointment.id_pelamar, registrasi.user_name, registrasi.id_registrasi, job_appointment.job_desk, tb_perusahaan.nama_perusahaan, job_appointment.porto');
		$this->db->from('job_appointment')->join('registrasi', 'job_appointment.id_regis = registrasi.id_registrasi');
		$this->db->join('tb_perusahaan', 'job_appointment.perusahaan_id = tb_perusahaan.id_perusahaan');
		$this->db->where('registrasi.id_registrasi', $id_regis);
		return $this->db->get()->result_array();
	}
}
