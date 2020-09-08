<?php
include 'sesija.php';
include 'konekcija.php';
include 'domen/tip.php';
include 'domen/trajanje.php';
include 'domen/masaza.php';


  $naziv = trim($_POST['naziv']);
  $cena = trim($_POST['cena']);
  $tip = trim($_POST['tip']);
  $trajanje = trim($_POST['trajanje']);

  Masaza::sacuvaj($db,$naziv,$cena,$tip,$trajanje);

  header("Location: index.php");


 ?>
