<?php
class model_adm extends CI_Model
{
	public function get_registrasi()
	{
		# code...
		$query = $this->db->get('registrasi');
		return $query;
	}
	public function insert_registrasi($data)
	{
		# code...
	}
}
