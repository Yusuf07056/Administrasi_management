<?php
class model_adm extends CI_Model
{
	public function get_registrasi()
	{
		# code...
		$query = $this->db->get('registrasi');
		return $query;
	}
	public function get_post_select($id)
	{
		return $this->db->get_where('post_information', ['id_post' => $id])->result_array();
	}

	public function update_data($id, $judul_post, $keyword, $isi_post, $status_post, $foto)
	{
		# code...
		$data = array(
			'judul_post' => $judul_post,
			'keyword' => $keyword,
			'isi_post' => $isi_post,
			'status_post' => $status_post,
			'foto' => $foto
		);

		$this->db->where('id_post', $id);
		$this->db->update('post_information', $data);
	}
	public function get_company()
	{
		# code...
		return $this->db->get('tb_perusahaan')->result_array();
	}
	public function get_jobdesk()
	{
		# code...
		return $this->db->get('tb_jobdesk')->result_array();
	}
	public function delete_method($id_post)
	{
		# code...
		return $this->db->delete('post_information', array('id_post' => $id_post));
	}
	public function get_jobappointmet()
	{
		# code...
		return $this->db->get('job_appointment')->result_array();
	}
	public function delete_jobdesk_method($id)
	{
		# code...
		return $this->db->delete('tb_jobdesk', array('id' => $id));
	}
	public function update_method($id_post)
	{
		# code...
	}

	public function get_postingan()
	{
		# code...
		return $this->db->get('post_information')->result_array();
	}

	public function get_profil_adm($email)
	{
		return $this->db->get_where('registrasi', ['email' => $email]);
	}

	public function insert_registrasi($user, $email, $password, $no_telp, $gender, $tgl_lahir)
	{
		# code...
		$data = [
			'user_name' => htmlspecialchars($user),
			'email' => htmlspecialchars($email),
			'password' => password_hash($password, PASSWORD_DEFAULT),
			'role_id' => 1,
			'is_active' => 1,
			'no_telp' => $no_telp,
			'gender' => $gender,
			'tgl_lahir' => $tgl_lahir
		];
		$this->db->insert('registrasi', $data);
	}
	public function insert_jobdesk($jobdesk)
	{
		# code...
		$data = [
			'jobdesk' => $jobdesk
		];
		$this->db->insert('tb_jobdesk', $data);
	}

	public function insert_postingan($judul_post, $keyword, $isi_post, $status_post, $foto, $company_id, $jobdesk)
	{
		# code...
		$data = [
			'judul_post' => $judul_post,
			'keyword' => $keyword,
			'isi_post' => $isi_post,
			'status_post' => $status_post,
			'foto' => $foto,
			'company_id' => $company_id,
			'jobdesk' => $jobdesk
		];
		$this->db->insert('post_information', $data);
	}

	public function input_appointment($id_regis, $company_id, $jobdesk, $portofolio)
	{
		# code...
		$data = [
			'id_regis' => $id_regis,
			'company_id' => $company_id,
			'job_desk' => $jobdesk,
			'portofolio' => $portofolio
		];
		$this->db->insert('job_appointment', $data);
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
					'email' => $registrasi['email'],
					'role_id' => $registrasi['role_id'],
				];

				$this->session->set_userdata($data);

				if ($registrasi['role_id'] == 2) {
					redirect(base_url('index.php/Kariyawan_ctrl/'));
				} elseif ($registrasi['role_id'] == 1) {
					redirect(base_url('index.php/Welcome/dashboard'));
				} else {
					redirect(base_url('index.php/Kariyawan_ctrl/'));
				}
			} else {
				# code...
				$this->session->set_flashdata('massage', 'value');
			}
		} else {
			# code...
			$this->session->set_flashdata('massage', 'value');
		}
		return $registrasi;
	}
	public function join_appointment_by()
	{
		# code...
		$this->db->select('job_appointment.id_pelamar, registrasi.user_name, registrasi.id_registrasi, job_appointment.job_desk, tb_perusahaan.nama_perusahaan, job_appointment.porto');
		$this->db->from('job_appointment')->join('registrasi', 'job_appointment.id_regis = registrasi.id_registrasi');
		$this->db->join('tb_perusahaan', 'job_appointment.perusahaan_id = tb_perusahaan.id_perusahaan');
		return $this->db->get()->result_array();
	}
}
