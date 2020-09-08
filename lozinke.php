<?php
$curl = curl_init("http://www.passwordrandom.com/query?command=password&format=plain&count=3");
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
$jsonOdgovor = curl_exec($curl);
curl_close($curl);

echo($jsonOdgovor);

 ?>
