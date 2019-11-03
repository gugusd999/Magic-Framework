<?php 

class pengecekan extends Magic
{
	public function login_cek($username)
	{
		$cekdata = $this->count_query("SELECT * FROM user_siswa where username = '$username'");
		if ($cekdata > 0) {
			return "tersedia";
		}else{
			return "tidak tersedia";
		}
	}

	public function login($username, $password)
	{
		$cekdata = $this->count_query("SELECT * FROM user_siswa where username = '$username' AND password = '$password'");
		if ($cekdata > 0) {
			return "tersedia";
		}else{
			return "tidak tersedia";
		}
	}
}