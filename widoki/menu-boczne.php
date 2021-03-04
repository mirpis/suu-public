<!--Przypisanie elementów wyrównania w pionie:
.align-baseline, .align-top, .align-middle, .align-bottom,
.align-text-bottom, .align-text-top
Uwaga: zadziała tylko dla elementów mających ustawiony
display: inline, inline-block, inline-table lub komórek tabeli -->

 <!-- <div class="row"> -->
 <!-- <div class="cat-bottom"></div> -->
      

<!-- A vertical navbar -->
<div class="d-flex flex-column">
   <nav class="navbar bg-danger">
       <?php
         if (isset($_SESSION["id"])) {
       ?> 
      <ul class="navbar-nav">
         
         <span class="h1 ml-5 navbar-text  font-weight-bold mt-3"><b>Studenci</b></span>

         <li class="nav-item">
            <a class="nav-link active" href="<?php echo APP_URL ?>prace-domowe-zadane/">
               Prace domowe zadane</a>
         </li>
         <li class="nav-item">
            <a class="nav-link active" href="<?php echo APP_URL ?>moje-prace/" >
               Moje prace</a>
         </li>
         <li class="nav-item">
            <a class="nav-link active" href="<?php echo APP_URL ?>dodaj-rozwiazanie-formularz/">
               Dodaj rozwiązanie formularz</a>
         </li>
         <li class="nav-item">
            <a class="nav-link active" href="<?php echo APP_URL ?>dodaj-rozwiazanie/">
               Dodaj rozwiązanie</a>
         </li>
       
       <?php }?>

       <?php
       if (isset($_SESSION["id"])) { 
       ?>
         <span class="h1 ml-5 pt-5 navbar-text  font-weight-bold mt-3"><b>Wykładowca</b></span>
         
         <li class="nav-item">
            <a class="nav-link active" href="<?php echo APP_URL ?>lista-rozwazan/">
              Lista rozwiązań</a>
         </li>
         <li class="nav-item">
            <a class="nav-link active" href="<?php echo APP_URL ?>lista-prac-domowych/">
              Lista prac domowych</a>
         </li>
         <li class="nav-item">
            <a class="nav-link active" href="<?php echo APP_URL ?>nowa-praca-domowa-formularz/">
              Nowa praca domowa formularz</a>
         </li>
         <li class="nav-item">
            <a class="nav-link active" href="<?php echo APP_URL ?>usun-prace-domowa/">
              Usuń pracę domową</a>
         </li>
       <?php } ?> 
   </nav>
</div>