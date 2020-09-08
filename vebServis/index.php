<?php
require 'flight/Flight.php';
require 'jsonindent.php';


Flight::route('/', function(){
		die('Nepostojeca api ruta');
});

Flight::register('db', 'Database', array('projekatMasaze'));



Flight::route('GET /zakazivanja', function()
{
	header("Content-Type: application/json; charset=utf-8");
	$db = Flight::db();
	$db->vratiZakazivanja();

	$niz =  [];
	$i = 0;
	while ($red = $db->getResult()->fetch_object())
	{
		$niz[$i] = $red;
		$i += 1;
	}

	echo indent(json_encode($niz));
});

Flight::route('GET /zakazivanja/@id', function($id)
{
	header("Content-Type: application/json; charset=utf-8");
	$db = Flight::db();
	$db->vratiZakazivanjaZaKorisnika($id);

	$niz = [];
	$i = 0;
	while ($red = $db->getResult()->fetch_object())
	{
		$niz[$i] = $red;
		$i += 1;
	}

	echo indent(json_encode($niz));
});

Flight::route('GET /podaciZaGraf', function()
{
	header("Content-Type: application/json; charset=utf-8");
	$db = Flight::db();
	$db->vratiPodatke();

	$niz =   [];
	$i = 0;
	while ($red = $db->getResult()->fetch_object())
	{
		$niz[$i] = $red;
		$i += 1;
	}

	echo indent(json_encode($niz));
});

Flight::route('POST /zakazi', function()
{
	header("Content-Type: application/json; charset=utf-8");
	$db = Flight::db();
	$podaci = file_get_contents('php://input');
	$niz = json_decode($podaci,true);
	$db->zakazi($niz);
	if($db->getResult())
	{
		$response = "Uspesno zakazano";
	}
	else
	{
		$response = "Neuspesno zakazano";

	}

	echo indent(json_encode($response));

});


Flight::start();
?>
