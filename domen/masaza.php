<?php class Masaza {

	public $masazaID = 0;
	public $nazivMasaze = '';
	public $osnovnaCena = 0;
	public $ukupnaCena = 0;
	public $tip = 0;
  public $trajanje = 0;



	// this method return masaze with all information that is related to it
	public static function vratiSve($db)
	{
		$result = $db->query('SELECT *,(m.osnovnaCena + tr.dodatakCeni) as suma FROM masaza m join tip t on m.tipID=t.tipID join trajanje tr on m.trajanjeID=tr.trajanjeID');

		$masaze = array();
		while($row = $result->fetch_assoc()) {
			//tip
			$tip = new Tip();
			$tip->tipID= $row['tipID'];
      		$tip->nazivTipa= $row['nazivTipa'];
			// trajanje
			$trajanje = new Trajanje();
			$trajanje->trajanjeID= $row['trajanjeID'];
			$trajanje->trajanje  = $row['trajanje'];
			$trajanje->dodatakCeni  = $row['dodatakCeni'];
			//masaza
			$masaza = new Masaza();
			$masaza->masazaID= $row['masazaID'];
			$masaza->nazivMasaze= $row['nazivMasaze'];
			$masaza->osnovnaCena= $row['osnovnaCena'];
      		$masaza->ukupnaCena = $row['suma'];
			$masaza->tip= $tip;
			$masaza->trajanje= $trajanje;
			array_push($masaze, $masaza);
    	}

    	return $masaze;
	}
	//sortiracemo prema sumi
	public static function vratiSveSortirano($db,$sort)
	{
		$result = $db->query('SELECT *,(m.osnovnaCena + tr.dodatakCeni) as suma FROM masaza m join tip t on m.tipID=t.tipID join trajanje tr on m.trajanjeID=tr.trajanjeID order by suma '.$sort);

		$masaze = array();
		while($row = $result->fetch_assoc()) {
			$tip = new Tip();
			$tip->tipID= $row['tipID'];
      		$tip->nazivTipa= $row['nazivTipa'];

			$trajanje = new Trajanje();
			$trajanje->trajanjeID= $row['trajanjeID'];
			$trajanje->trajanje  = $row['trajanje'];
			$trajanje->dodatakCeni  = $row['dodatakCeni'];

			$masaza = new Masaza();
			$masaza->masazaID= $row['masazaID'];
			$masaza->nazivMasaze= $row['nazivMasaze'];
			$masaza->osnovnaCena= $row['osnovnaCena'];
      $masaza->ukupnaCena = $row['suma'];
			$masaza->tip= $tip;
			$masaza->trajanje= $trajanje;
			array_push($masaze, $masaza);
    	}

    	return $masaze;
	}
	//Kreiranje nove masaze
	public static function sacuvaj($db,$naziv,$cena,$tip,$trajanje){
		$naziv = mysqli_real_escape_string($db,$naziv);
    	$cena = mysqli_real_escape_string($db,$cena);
    	$tip = mysqli_real_escape_string($db,$tip);
    	$trajanje = mysqli_real_escape_string($db,$trajanje);

		$result = $db->query("INSERT INTO masaza (nazivMasaze,osnovnaCena, tipID,trajanjeID)
			VALUES ('$naziv', '$cena', '$tip', '$trajanje')");

		if ($result > 0) return true; else return false;
	}
	// izmenicemo podatke masaze
	public static function izmeni($db,$cena,$id){
    	$cena = mysqli_real_escape_string($db,$cena);

    	$sql="UPDATE masaza SET osnovnaCena=".$cena." where masazaID=".$id;
		$result = $db->query($sql);

		return true;
	}
	//obrisacemo masazu
	public static function obrisi($db,$id){

		$result = $db->query("DELETE FROM masaza where masazaID=".$id);

		return true;
	}

} ?>
