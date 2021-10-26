<?php
class model_kariyawan extends CI_Model
{
	public function get_registrasi()
	{
		# code...
		$query = $this->db->get('registrasi');
		return $query;
	}
	public function insert_registrasi($user, $email, $password, $no_telp, $gender, $umur)
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
			'umur' => $umur
		];
		$this->db->insert('registrasi', $data);
	}
}
