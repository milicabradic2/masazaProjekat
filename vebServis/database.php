<?php
class Database {
	private $hostname = "localhost";
	private $username = "root";
	private $password = "";
	private $dbname = "projekatMasaze";
	private $dblink;
	private $result = true;
	private $records;
	private $affectedRows;

	//definasanje baze u phpmyadmin
	function __construct($dbname)
	{
		$this->$dbname = $dbname;
		$this->Connect();
	}

	public function getResult()
	{
		return $this->result;
	}

	function __destruct()
	{
		$this->dblink->close();
	}


	function Connect()
	{
		$this->dblink = new mysqli($this->hostname, $this->username, $this->password, $this->dbname);
		if($this->dblink->connect_errno)
		{
			printf("Konekcija neuspesna: %s\n",  $mysqli->connect_error);
			exit();
		}
		$this->dblink->set_charset("utf8");
	}
		
		function zakazi($pod) {
			$mysqli = new mysqli("localhost", "root", "", "projekatMasaze");

			$masaza = mysqli_real_escape_string($db,$masaza);
	    $korisnik = mysqli_real_escape_string($db,$korisnik);
	    $vreme = mysqli_real_escape_string($db,$vreme);

			$query = "INSERT INTO zakazivanje (masazaID,korisnikID, vreme) VALUES ($masaza, $korisnik, '$vreme')";

			if($mysqli->query($query))
			{
				$this ->result = true;
			}
			else
			{
				$this->result = false;
			}
			$mysqli->close();
		}

		
	function vratiZakazivanja() {
	  $mysqli = new mysqli("localhost", "root", "", "projekatMasaze");
	  $q = 'SELECT *,(m.osnovnaCena + tr.dodatakCeni) as suma from zakazivanje z join masaza m on z.masazaID = m.masazaID join tip t on m.tipID=t.tipID join trajanje tr on m.trajanjeID=tr.trajanjeID join korisnik k on z.korisnikID = k.korisnikID ';
	  $this ->result = $mysqli->query($q);
	  $mysqli->close();
	}

	function vratiZakazivanjaZaKorisnika($id) {
	  $mysqli = new mysqli("localhost", "root", "", "projekatMasaze");
	  $q = 'SELECT * from zakazivanje z join masaza m on z.masazaID = m.masazaID join tip t on m.tipID=t.tipID join trajanje tr on m.trajanjeID=tr.trajanjeID join korisnik k on z.korisnikID = k.korisnikID where k.korisnikID = '.$id;
	  $this ->result = $mysqli->query($q);
	  $mysqli->close();
	}
	function vratiPodatke() {
	  $mysqli = new mysqli("localhost", "root", "", "projekatMasaze");
	  $q = 'SELECT k.imePrezime, count(z.zakazivanjeID) as brojMasaza from korisnik k join zakazivanje z on k.korisnikID = z.korisnikID group by k.korisnikID';
	  $this ->result = $mysqli->query($q);
	  $mysqli->close();
	}



	function ExecuteQuery($query)
	{
		if($this->result = $this->dblink->query($query)){
			if (isset($this->result->num_rows)) $this->records         = $this->result->num_rows;
				if (isset($this->dblink->affected_rows)) $this->affected        = $this->dblink->affected_rows;
					return true;
		}
		else{
			return false;
		}
	}
}
?>
