<?php
include 'sesija.php';
include 'konekcija.php';
 ?>
<!DOCTYPE html>
 <html >
	<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Masaža</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="" />
	<meta name="keywords" content="" />
	<meta name="author" content="" />


	<link rel="shortcut icon" href="favicon.ico">

	<link href='https://fonts.googleapis.com/css?family=Roboto:400,100,300,700,900' rel='stylesheet' type='text/css'>
	<link href="https://fonts.googleapis.com/css?family=Roboto+Slab:300,400,700" rel="stylesheet">

	<link rel="stylesheet" href="css/animate.css">
	<link rel="stylesheet" href="css/icomoon.css">
	<link rel="stylesheet" href="css/bootstrap.css">
	<link rel="stylesheet" href="css/superfish.css">
	<link rel="stylesheet" href="css/style.css">


	<script src="js/modernizr-2.6.2.min.js"></script>

	</head>
	<body>
		<div id="glavni-wrapper">
		<div id="glavni-page">
		<div id="glavni-header">

      <?php include 'header.php'; ?>

		<div id="glavni-work-section">
			<div class="container">
          <h1 class="naslov text-center"> Login </h1>
          <form method="POST" action="kontroler.php">
            <label for="username">Username</label>
            <input type="text" class="form-control" placeholder="Unesite username" name="username" id="username">
            <label for="password">Password</label>
            <input type="password" class="form-control" placeholder="Unesite password" name="password" id="password">
            <label for="login"></label>
            <input type="submit" class="form-control btn-primary" name="login" id="login" value="Login">
          </form>
          <br>
            <a href="registracija.php" class="pull-right ">Niste korisnik - registrujte se</a>

			</div>
		</div>
		<?php include 'footer.php'; ?>


	</div>

	</div>



	<script src="js/jquery.min.js"></script>
	<script src="js/jquery.easing.1.3.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/jquery.waypoints.min.js"></script>
	<script src="js/hoverIntent.js"></script>
	<script src="js/superfish.js"></script>
	<script src="js/main.js"></script>
  <script>
    function popuniTip(){
      var zahtev = $.ajax({
          url: "kontroler.php",
          method: "GET",
          data: { opcija : 'tip' }
          });

        zahtev.done(function( json ) {
          var nalepi='';


          $.each($.parseJSON(json), function(idx, obj) {
                  nalepi += '<option value="'+obj.tipID+'">'+obj.nazivTipa+'</option>';
              });
          $("#tip").html(nalepi);

        });

    }

  </script>
  <script>
    function popuniTrajanje(){
      var zahtev = $.ajax({
          url: "kontroler.php",
          method: "GET",
          data: { opcija : 'trajanje' }
          });

        zahtev.done(function( json ) {
          var nalepi='';


          $.each($.parseJSON(json), function(idx, obj) {
                  nalepi+='<option value="'+obj.trajanjeID+'">'+obj.trajanje+'</option>';
              });
          $("#trajanje").html(nalepi);

        });

    }

  </script>
  <script>
    popuniTip();
    popuniTrajanje();
  </script>

	</body>
</html>
