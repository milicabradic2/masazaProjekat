<?php
    session_start();
    if(!isset($_SESSION['ulogovaniKorisnik'])){
        $_SESSION['ulogovaniKorisnik'] = [];
    }
 ?>
