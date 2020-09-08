<?php

$curl = curl_init("http://localhost/masazaProjekat/vebServis/podaciZaGraf");
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
$jsonOdgovor = curl_exec($curl);
$podaci = json_decode($jsonOdgovor);
curl_close($curl);

echo($jsonOdgovor);

 ?>
