<header id="glavni-header-section">
  <div class="container">
    <div class="nav-header">
      <a href="#" class="js-glavni-nav-toggle glavni-nav-toggle"><i></i></a>
      <h1 id="glavni-logo"><a href="index.php"><i class="icon-hand"></i>Masaža</a></h1>
      <nav id="glavni-menu-wrap" role="navigation">
        <ul class="sf-menu" id="glavni-primary-menu">
          <li>
            <a href="index.php">Početna</a>
          </li>
          <li>
            <a href="kontakt.php">Kontakt</a>
          </li>
          <?php
              if(!empty($_SESSION['ulogovaniKorisnik'])){
                if($_SESSION['ulogovaniKorisnik'][0]['pristup'] == '1'){
                  ?>
                    <li>
                      <a href="masazaDodavanje.php">Dodaj masazu</a>
                    </li>
                    <li>
                      <a href="administracija.php">Upravljanje masažama</a>
                    </li>
                  <?php
                }
                ?>
                <li>
                  <a href="zakazi.php">Zakaži masažu</a>
                </li>
                <li>
                  <a href="logout.php">Logout</a>
                </li>
                <?php
              }else{
                ?>

                <li>
                  <a href="login.php">Login</a>
                </li>
                <?php

              }

           ?>

        </ul>
      </nav>
    </div>
  </div>
</header>
</div>
<aside id="glavni-hero" class="js-fullheight">
<div class="container-fluid">
  <img src="images/pozadinaa.jpg" class="img img-responsive">
</div>
</aside>
