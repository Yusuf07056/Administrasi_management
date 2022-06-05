<?php
class model_adm extends CI_Model
{
	public function get_registrasi()
	{
		# code...
		$query = $this->db->get('registrasi');
		return $query;
	}
	public function get_registrasi_by($id_registrasi)
	{
		# code...
		$query = $this->db->get_where('registrasi', ['id_registrasi' => $id_registrasi]);
		return $query;
	}
	public function get_barang_select($id)
	{
		return $this->db->get_where('tb_barang', ['id_barang' => $id])->result_array();
	}
	public function get_barangIN_select($id)
	{
		return $this->db->get_where('tb_barang_masuk', ['id_barang_in' => $id])->result_array();
	}
	public function get_supplier()
	{
		return $this->db->get('tb_supplier')->result_array();
	}
	public function get_role()
	{
		return $this->db->get('list_role')->result_array();
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
	public function delete_supplier($id_supplier)
	{
		# code...
		return $this->db->delete('tb_supplier', array('id_supplier' => $id_supplier));
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
	public function delete_tb_barang_in($id)
	{
		# code...
		return $this->db->delete('tb_barang_masuk', array('id_barang_in' => $id));
	}
	public function delete_tb_registrasi($id_registrasi)
	{
		# code...
		return $this->db->delete('registrasi', array('id_registrasi' => $id_registrasi));
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

	public function insert_registrasi($user, $email, $password, $role_id, $is_active, $no_telp, $gender, $tgl_lahir)
	{
		# code...
		$data = [
			'user_name' => htmlspecialchars($user),
			'email' => htmlspecialchars($email),
			'password' => password_hash($password, PASSWORD_DEFAULT),
			'role_id' => $role_id,
			'is_active' => $is_active,
			'no_telp' => $no_telp,
			'gender' => $gender,
			'tgl_lahir' => $tgl_lahir
		];
		$this->db->insert('registrasi', $data);
	}
	public function insert_registrasi_update($id_registrasi, $user, $email, $password, $role_id, $is_active, $no_telp, $gender, $tgl_lahir)
	{
		# code...
		$data = [
			'user_name' => htmlspecialchars($user),
			'email' => htmlspecialchars($email),
			'password' => password_hash($password, PASSWORD_DEFAULT),
			'role_id' => $role_id,
			'is_active' => $is_active,
			'no_telp' => $no_telp,
			'gender' => $gender,
			'tgl_lahir' => $tgl_lahir
		];
		$this->db->where('id_registrasi', $id_registrasi);
		$this->db->update('registrasi', $data);
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
	public function insert_supplier($nama_supplier, $no_telp, $alamat)
	{
		# code...
		$data = [
			'nama_supplier' => $nama_supplier,
			'no_telp' => $no_telp,
			'alamat' => $alamat
		];
		$this->db->insert('tb_supplier', $data);
	}
	public function insert_barang_IN($id_barang, $id_supplier, $detail_tanggal_masuk, $jumlah_masuk, $total)
	{
		# code...
		$data = [
			'id_barang' => $id_barang,
			'id_supplier' => $id_supplier,
			'detail_tanggal_masuk' => $detail_tanggal_masuk,
			'jumlah_masuk' => $jumlah_masuk,
			'akumulasi_barang' => $total,
		];
		$this->db->insert('tb_barang_masuk', $data);
	}
	public function insert_barang_out($id_barang_in,$id_supplier, $id_barang, $jumlah_keluar, $total, $tanggal_keluar, $bulan)
	{
		# code...
		$data = [
			'idbarang_in' => $id_barang_in,
			'id_supplier' => $id_supplier,
			'id_barang' => $id_barang,
			'jumlah_keluar' => $jumlah_keluar,
			'sisa_barang' => $total,
			'tanggal_keluar	' => $tanggal_keluar,
			'bulan' => $bulan
		];
		$this->db->insert('tb_barang_keluar', $data);
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
	public function join_tb_barang_masuk()
	{
		# code...
		$this->db->select('tb_barang_masuk.id_barang_in, tb_barang_masuk.detail_tanggal_masuk, tb_barang_masuk.id_barang, tb_barang_masuk.akumulasi_barang, tb_barang_masuk.jumlah_masuk, tb_barang.nama_barang,tb_barang.jumlah, tb_supplier.nama_supplier');
		$this->db->from('tb_barang_masuk')->join('tb_barang', 'tb_barang.id_barang = tb_barang_masuk.id_barang');
		$this->db->join('tb_supplier', 'tb_supplier.id_supplier = tb_barang_masuk.id_supplier');
		return $this->db->get()->result_array();
	}
	public function join_tb_barang_masuk_by($id_barang_in)
	{
		# code...
		$this->db->select('tb_barang_masuk.id_barang_in, tb_barang_masuk.detail_tanggal_masuk, tb_barang_masuk.id_barang, tb_barang_masuk.akumulasi_barang, tb_barang_masuk.jumlah_masuk, tb_barang.nama_barang,tb_barang.jumlah, tb_supplier.nama_supplier');
		$this->db->from('tb_barang_masuk')->join('tb_barang', 'tb_barang.id_barang = tb_barang_masuk.id_barang');
		$this->db->join('tb_supplier', 'tb_supplier.id_supplier = tb_barang_masuk.id_supplier');
		$this->db->where('tb_barang_masuk.id_barang_in', $id_barang_in);
		return $this->db->get()->result_array();
	}
	public function join_tb_barang_()
	{
		# code...
		$this->db->select('tb_barang_masuk.id_barang_in, tb_barang_masuk.detail_tanggal_masuk, tb_barang_masuk.jumlah_masuk, tb_barang.nama_barang,tb_barang.jumlah, tb_supplier.nama_supplier');
		$this->db->from('tb_barang_masuk')->join('tb_barang', 'tb_barang.id_barang = tb_barang_masuk.id_barang');
		$this->db->join('tb_supplier', 'tb_supplier.id_supplier = tb_barang_masuk.id_supplier');
		return $this->db->get()->result_array();
	}
	public function join_tb_barang_keluar()
	{
		# code...
		$this->db->select('tb_barang_keluar.id_barang_out,tb_barang.nama_barang, tb_barang_masuk.detail_tanggal_masuk, tb_barang_masuk.akumulasi_barang, tb_barang_keluar.jumlah_keluar, tb_barang_keluar.sisa_barang,tb_barang_keluar.tanggal_keluar');
		$this->db->from('tb_barang_keluar')->join('tb_barang', 'tb_barang.id_barang = tb_barang_keluar.id_barang');
		$this->db->join('tb_barang_masuk', 'tb_barang_keluar.idbarang_in = tb_barang_masuk.id_barang_in');
		return $this->db->get()->result_array();
	}
	public function join_tb_barang_keluar_by($bulan)
	{
		# code...
		$this->db->select('tb_barang_keluar.id_barang_out,tb_barang.nama_barang, tb_barang_masuk.detail_tanggal_masuk, tb_barang_masuk.akumulasi_barang, tb_barang_keluar.jumlah_keluar, tb_barang_keluar.sisa_barang,tb_barang_keluar.tanggal_keluar');
		$this->db->from('tb_barang_keluar')->join('tb_barang', 'tb_barang.id_barang = tb_barang_keluar.id_barang');
		$this->db->join('tb_barang_masuk', 'tb_barang_keluar.idbarang_in = tb_barang_masuk.id_barang_in');
		$this->db->where('tb_barang_keluar.bulan', $bulan);
		return $this->db->get()->result_array();
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
