<?php
include 'sesija.php';
include 'konekcija.php';
include 'domen/tip.php';
include 'domen/trajanje.php';
include 'domen/masaza.php';


  $id = trim($_POST['id']);
  $cena = trim($_POST['cena']);

  Masaza::izmeni($db,$cena,$id);

  header("Location: index.php");

 ?>
