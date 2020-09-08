<?php
  include 'sesija.php';
  include 'konekcija.php';
  include 'domen/zakazivanje.php';

  $poruka = "";
  if(isset($_POST['sacuvaj'])){
    $masaza= trim($_POST['masaza']);
    $vreme= trim($_POST['vreme']);
    echo $vreme;
    $korisnik= $_SESSION['ulogovaniKorisnik'][0]['korisnikID'] ;

    if($masaza == '' || $vreme == '' ){
        $poruka = '<div class="alert alert-danger" role="alert">Polja ne smeju biti prazna</div>';
    }else{

      $uspesno = Zakazivanje::sacuvaj($db,$masaza,$korisnik,$vreme);
    //  var_dump($uspesno);
      if($uspesno){
        $poruka = '<div class="alert alert-success" role="alert">Uspesno zakazivanje masaze</div>';
      }else{
        $poruka = '<div class="alert alert-danger" role="alert">Neuspesno zakazivanje masaze</div>';
      }
    }
  }

 ?>
<!DOCTYPE html>
 <html >
	<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Masaže</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="" />
	<meta name="keywords" content="" />
	<meta name="author" content="" />


	<link rel="shortcut icon" href="favicon.ico">

	<link href='https://fonts.googleapis.com/css?family=Roboto:400,100,300,700,900' rel='stylesheet' type='text/css'>
	<link href="https://fonts.googleapis.com/css?family=Roboto+Slab:300,400,700" rel="stylesheet">

	<link rel="stylesheet" href="css/animate.css">
	<link rel="stylesheet" href="css/icomoon.css">
  <!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
  <link rel="stylesheet" href="css/superfish.css">
	<link rel="stylesheet" href="css/style.css">
  <link rel="stylesheet" href="css/bootstrap-datetimepicker.min.css">


	<script src="js/modernizr-2.6.2.min.js"></script>

	</head>
	<body>
		<div id="glavni-wrapper">
		<div id="glavni-page">
		<div id="glavni-header">

      <?php include 'header.php'; ?>

		<div id="glavni-work-section">
			<div class="container">
          <h1 class="naslov text-center"> Zakaži </h1>
          <form method="POST" action="">

            <label for="tip">Masaže</label>
            <select class="form-control"name="masaza" id="masaza">
            </select>
            <label for="vreme">Datum i vreme</label>
            <div class='input-group date' id='dateTime'>

                <input type='text' name="vreme" id="vreme" class="form-control" />
                <span class="input-group-addon">
                    <span class="glyphicon glyphicon-calendar">
                    </span>
                </span>
            </div>
            <label for="dugme"></label>
            <input type="submit" class="form-control btn-primary" name="sacuvaj" id="dugme" value="Sacuvaj">
          </form>
          <?php echo($poruka); ?>
			</div>
		</div>
		<?php include 'footer.php'; ?>


	</div>

	</div>



	<script src="js/jquery.min.js"></script>
	<script src="js/jquery.easing.1.3.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
	<script src="js/jquery.waypoints.min.js"></script>
	<script src="js/hoverIntent.js"></script>
	<script src="js/superfish.js"></script>
	<script src="js/main.js"></script>
  <script src="js/moment.js"></script>
  <script src="js/bootstrap-datetimepicker.min.js"></script>
  <script type="text/javascript">
        $(function () {
            $('#dateTime').datetimepicker({
                format: 'YYYY-MM-DD HH:mm:ss',
                daysOfWeekDisabled: [0, 6]
            });
        });
    </script>
  <script>
    function popuniMasaze(){
      var zahtev = $.ajax({
          url: "kontroler.php",
          method: "GET",
          data: { opcija : 'masaza' }
          });

        zahtev.done(function( json ) {
          var nalepi='';


          $.each($.parseJSON(json), function(idx, obj) {
                  nalepi += '<option value="'+obj.masazaID+'">'+obj.nazivMasaze+"-"+obj.tip.nazivTipa+'</option>';
              });
          $("#masaza").html(nalepi);

        });

    }

  </script>
  <script>
    popuniMasaze();
  </script>

	</body>
</html>
