<?php class Korisnik {

		public $korisnikID = 0;
		public $imePrezime = '';
		public $email = '';
		public $brojTelefona = '';
		public $username = '';
		public $password = '';
		public $pristup = '';

		// log into database
		public static function login($db,$username,$password){
			$username = mysqli_real_escape_string($db,$username);
	    	$password = mysqli_real_escape_string($db,$password);
			//select that user
			$result = $db->query("SELECT * FROM korisnik where username='$username' and password='$password' LIMIT 1");
			//fetch object[user] so we can trigger session
			while($row = $result->fetch_assoc()) {
						array_push($_SESSION['ulogovaniKorisnik'],$row);
						return true;
	    	}

	    	return false;
		}

		//add new user
		// and store that values into these variables
		public static function registracija($db,$username,$password,$ime,$telefon,$email){
			$username = mysqli_real_escape_string($db,$username);
	    	$password = mysqli_real_escape_string($db,$password);
			$ime = mysqli_real_escape_string($db,$ime);
			$telefon = mysqli_real_escape_string($db,$telefon);
			$email = mysqli_real_escape_string($db,$email);
			//store response into variable
			$uspesno = $db->query("INSERT INTO korisnik(imePrezime,email,brojTelefona,username,password) VALUES ('$ime','$email','$telefon','$username','$password')");
			// if it's succesful, then we can log that user into our site
			if($uspesno) {
						Korisnik::login($db,$username,$password);
						return true;
	    	}

	    	return false;
		}

	} ?>
