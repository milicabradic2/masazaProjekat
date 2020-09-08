<?php class Trajanje {

		public $trajanjeID = 0;
		public $trajanje = '';
		public $dodatakCeni = 0;

		//svi podaci iz tabele trajanje
		public static function vratiSve($db){
			$result = $db->query('SELECT * FROM trajanje');

			$trajanja = array();

			while($row = $result->fetch_assoc()) {

				$trajanje = new Trajanje();
				$trajanje->trajanjeID= $row['trajanjeID'];
				$trajanje->trajanje  = $row['trajanje'];
				$trajanje->dodatakCeni  = $row['dodatakCeni'];


				array_push($trajanja, $trajanje);
	    	}

	    	return $trajanja;
		}

	} ?>
