<?php
  include 'sesija.php';
  include 'konekcija.php';
  include 'domen/tip.php';
  include 'domen/trajanje.php';
  include 'domen/masaza.php';
  include 'domen/korisnik.php';

  if(isset($_GET['opcija'])){
      if($_GET['opcija'] == 'tip'){
          echo json_encode(Tip::vratiSve($db));
      }
      if($_GET['opcija'] == 'trajanje'){
          echo json_encode(Trajanje::vratiSve($db));
      }
      if($_GET['opcija'] == 'masaza'){
          echo json_encode(Masaza::vratiSve($db));
      }
      if($_GET['opcija'] == 'sort'){
          echo json_encode(Masaza::vratiSveSortirano($db,$_GET['sort']));
      }
  }

  if(isset($_POST['login'])){
      $username= trim($_POST['username']);
      $password= trim($_POST['password']);

      $uspesno = Korisnik::login($db,$username,$password);
      var_dump($uspesno);
      if($uspesno){
        header("Location:index.php");
      }else{
        header("Location:login.php");
      }
  }

 ?>
