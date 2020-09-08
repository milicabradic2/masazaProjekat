<?php class Zakazivanje {

	public $zakazivanjeID = 0;
	public $masaza = '';
	public $vreme = 0;
	public $korisnik = 0;

	//unecemo novi termin tj zakazivanje masaze
	public static function sacuvaj($db,$masaza,$korisnik,$vreme){
		$masaza = mysqli_real_escape_string($db,$masaza);
    	$korisnik = mysqli_real_escape_string($db,$korisnik);
    	$vreme = mysqli_real_escape_string($db,$vreme);

		$result = $db->query("INSERT INTO zakazivanje (masazaID,korisnikID, vreme)
			VALUES ($masaza, $korisnik, '$vreme')");

		if ($result > 0) return true; else return false;
	}

} ?>
