<?php
class model_adm extends CI_Model
{
	public function get_registrasi()
	{
		# code...
		$query = $this->db->get('registrasi');
		return $query;
	}
	public function get_barang_select($id)
	{
		return $this->db->get_where('tb_barang', ['id_barang' => $id])->result_array();
	}
	public function get_supplier()
	{
		return $this->db->get('tb_supplier')->result_array();
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
	public function update_data_barang($id_barang, $nama_barang, $jenis, $jumlah, $harga)
	{
		# code...
		$data = array(
			'nama_barang' => $nama_barang,
			'jenis' => $jenis,
			'jumlah' => $jumlah,
			'harga' => $harga
		);

		$this->db->where('id_barang', $id_barang);
		$this->db->update('tb_barang', $data);
	}
	public function update_data_barang_by($id_barang, $jumlah)
	{
		# code...
		$data = array(
			'jumlah' => $jumlah
		);

		$this->db->where('id_barang', $id_barang);
		$this->db->update('tb_barang', $data);
	}
	public function cetak_data()
	{
		# code...
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
	public function delete_tb_barang($nama)
	{
		# code...
		return $this->db->delete('tb_barang', array('nama_barang' => $nama));
	}
	public function delete_verfikasi_pelamar($id)
	{
		# code...
		return $this->db->delete('verifikasi_lamaran', array('id_verifikasi' => $id));
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
	public function get_profil_all()
	{
		return $this->db->get('registrasi')->result_array();
	}
	public function get_job_appointment($id_regis)
	{
		return $this->db->get_where('job_appointment', ['id_regis' => $id_regis]);
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
	public function table_barang_view()
	{
		# code...
		return $this->db->get('tb_barang')->result_array();
	}

	public function insert_barang($nama_barang, $jenis, $jumlah, $harga)
	{
		# code...
		$data = [
			'nama_barang' => $nama_barang,
			'jenis' => $jenis,
			'jumlah' => $jumlah,
			'harga' => $harga
		];
		$this->db->insert('tb_barang', $data);
	}
	public function insert_barang_IN($id_barang, $id_supplier, $detail_tanggal_masuk, $jumlah_masuk)
	{
		# code...
		$data = [
			'id_barang' => $id_barang,
			'id_supplier' => $id_supplier,
			'detail_tanggal_masuk' => $detail_tanggal_masuk,
			'jumlah_masuk' => $jumlah_masuk
		];
		$this->db->insert('tb_barang_masuk', $data);
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
					'user_name' => $registrasi['user_name'],
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
		$this->db->select('job_appointment.id_pelamar, registrasi.user_name, registrasi.id_registrasi, job_appointment.job_desk, tb_perusahaan.nama_perusahaan, tb_perusahaan.id_perusahaan, job_appointment.porto');
		$this->db->from('job_appointment')->join('registrasi', 'job_appointment.id_regis = registrasi.id_registrasi');
		$this->db->join('tb_perusahaan', 'job_appointment.perusahaan_id = tb_perusahaan.id_perusahaan');
		return $this->db->get()->result_array();
	}
	public function insert_verifikasi($id_registrasi, $id_pelamar, $id_perusahaan, $status)
	{
		# code...
		$data = [
			'id_regis' => $id_registrasi,
			'id_lamaran' => $id_pelamar,
			'id_perusahaan' => $id_perusahaan,
			'status' => $status,
		];
		$this->db->insert('verifikasi_lamaran', $data);
	}
	public function join_verifikasi_by($id_regis)
	{
		# code...
		$this->db->select('verifikasi_lamaran.id_verifikasi,registrasi.user_name,registrasi.id_registrasi,tb_perusahaan.id_perusahaan,tb_perusahaan.nama_perusahaan,job_appointment.job_desk,verifikasi_lamaran.status');
		$this->db->from('verifikasi_lamaran')->join('registrasi', 'registrasi.id_registrasi = verifikasi_lamaran.id_regis');
		$this->db->join('job_appointment', 'ob_appointment.id_pelamar = verifikasi_lamaran.id_lamaran');
		$this->db->join('tb_perusahaan', 'tb_perusahaan.id_perusahaan = verifikasi_lamaran.id_perusahaan');
		$this->db->where('registrasi.id_registrasi', $id_regis);
		return $this->db->get()->result_array();
	}
	public function join_verifikasi()
	{
		# code...
		$this->db->select('verifikasi_lamaran.id_verifikasi,registrasi.user_name,registrasi.id_registrasi,tb_perusahaan.id_perusahaan,tb_perusahaan.nama_perusahaan,job_appointment.job_desk,verifikasi_lamaran.status');
		$this->db->from('verifikasi_lamaran')->join('registrasi', 'registrasi.id_registrasi = verifikasi_lamaran.id_regis');
		$this->db->join('job_appointment', 'job_appointment.id_pelamar = verifikasi_lamaran.id_lamaran');
		$this->db->join('tb_perusahaan', 'tb_perusahaan.id_perusahaan = verifikasi_lamaran.id_perusahaan');
		return $this->db->get()->result_array();
	}
}
