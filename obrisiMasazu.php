<?php
include 'sesija.php';
include 'konekcija.php';
include 'domen/tip.php';
include 'domen/trajanje.php';
include 'domen/masaza.php';

  Masaza::obrisi($db,$_GET['id']);

  header("Location: index.php");


 ?>
