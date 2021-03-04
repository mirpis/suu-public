<?php

?> 

<nav class="navbar navbar-expand-lg navbar-dark bg-danger  sticky-top">

  <div class=" col-sm-6 col-md-12  container-fluid">
  
    
      <a class=" navbar-brand flex-row p-1" href="https://jestwiecej.pl/">
        <i><img class="normal p-3" src="./img/logo4.png" alt="Logo"></i>
      </a>

      <span class="h1 ml-5 navbar-text "><b>SUU</b></span>
      <span class="h1 ml-1 navbar-text "><b>Szkoła Uzdrowienia i Uwolnienia</b></span>

      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="h3 col-ms-6 collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav ml-auto mr-auto d-flex justify-content-center">

          <li class="nav-item  p-3">
            <a class="nav-link" href="#">Kontakt</a>
          </li>

          <li class="nav-item  p-3">
            <a class="nav-link" href="#">O nas</a>
          </li>
        </ul>

        

          <ul class="navbar-nav m-4 p-3 justify-content-end">

            <?php
            if(!isset($_SESSION['id'])){
            ?>
              <a class="nav-item nav-link" href="<?php echo APP_URL ?>formularz-logowania">Zaloguj</a>
              <a class="nav-item nav-link" href="<?php echo APP_URL ?>formularz-rejestracji">Rejestracja</a>
            <?php
            }
            ?>

            <?php
            if (isset($_SESSION['id'])) {
              
            ?>
              <a class="nav-item nav-link">Witaj: <?php echo $_SESSION['imie'] ?> <?php echo $_SESSION['nazwisko']; ?></a>
              <a class="nav-item nav-link" href="<?php echo APP_URL ?>wylogowanie">Wyloguj</a>

              <!-- <a class="nav-item nav-link" href="<?php echo APP_URL ?>prace-domowe-zadane/">Prace domowe zadane</a>
              <a class="nav-item nav-link" href="<?php echo APP_URL ?>moje-prace/">Moje prace</a>
              <a class="nav-item nav-link" href="<?php echo APP_URL ?>dodaj-rozwiazanie-formularz/">Dodaj rozwiązanie formularz</a>
              <a class="nav-item nav-link" href="<?php echo APP_URL ?>dodaj-rozwiazanie/">Dodaj rozwiązanie</a> -->

              <!-- <a class="nav-item nav-link" href="<?php echo APP_URL ?>lista-rozwazan/">Lista rozwiązań</a>
              <a class="nav-item nav-link" href="<?php echo APP_URL ?>lista-prac-domowych/">Lista prac domowych</a>
              <a class="nav-item nav-link" href="<?php echo APP_URL ?>nowa-praca-domowa-formularz/">Nowa praca domowa formularz</a>
              <a class="nav-item nav-link" href="<?php echo APP_URL ?>usun-prace-domowa/">Usuń pracę domową</a> -->

    
            <?php
            } else {
            ?>
            
            <?php
            }
            ?>
          </ul>
        
      </div>
    
  </div>

</nav>




<!-- <div class="col-md-12">
 <img src="../img/74209251_2435958553308572_1469647597198114816_n.jpg" class="card-img" alt="Responsive image">
</div> -->