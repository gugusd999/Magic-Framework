<?php 

/**
 * 
 */
class Str
{
	public function enc($string='')
	{
		// Store a string into the variable which 
		// need to be Encrypted 
		$simple_string = json_encode($string); 
		  
		// Display the original string 
		// Store the cipher method 
		$ciphering = "AES-128-CTR"; 
		  
		// Use OpenSSl Encryption method 
		$iv_length = openssl_cipher_iv_length($ciphering); 
		$options = 0; 
		  
		// Non-NULL Initialization Vector for encryption 
		$encryption_iv = '1234567891011121'; 
		  
		// Store the encryption key 
		$encryption_key = "gugusencryption"; 
		  
		// Use openssl_encrypt() function to encrypt the data 
		$encryption = openssl_encrypt($simple_string, $ciphering, 
		            $encryption_key, $options, $encryption_iv); 
		  
		// Display the encrypted string 
		return bin2hex($encryption); 
	}


	public function dec($string='')
	{
		if ($string != NULL) {
			// Store a string into the variable which 
			// need to be Encrypted 
			$encryption = hex2bin($string); 

			// Display the original string 
			// Store the cipher method 
			$ciphering = "AES-128-CTR"; 
			  
			// Use OpenSSl Encryption method 
			$iv_length = openssl_cipher_iv_length($ciphering); 
			$options = 0; 
			// Non-NULL Initialization Vector for decryption 
			$decryption_iv = '1234567891011121'; 
			// Store the decryption key 
			$decryption_key = "gugusencryption"; 
			// Use openssl_decrypt() function to decrypt the data 
			$decryption=openssl_decrypt ($encryption, $ciphering,  
			        $decryption_key, $options, $decryption_iv); 
			// Display the decrypted string 
			return json_decode($decryption, true); 
		}else{
			return "";			
		}
	}


	public function cek($a='', $b = null)
	{
		$data = Session::get('datasementara');
		if(isset($data[$a])){
			if ($b != null) {
				if (isset($data[$a][$b])) {
					return $data[$a][$b];
				}else{
					return "";
				}
			}else{
				return $data[$a];
			}
		}else{
			return "";
		}	
	}

}
