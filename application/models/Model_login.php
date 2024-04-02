<?php 
/**
 * 
 */
class Model_login extends CI_Model
{
	
	public function cek_login()
	{
		
		$username = set_value('username');
		$password = set_value('password');
		$role = set_value('role');
		$result = $this->db->query("SELECT * FROM user WHERE username='$username' AND password=md5('$password')");
		if ($result->num_rows() > 0) {
			return $result->row();
		}else{
			return array();
		}
	}
}
 