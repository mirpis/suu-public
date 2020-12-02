<?php
echo '
<style type="text/css">
  <img class="sticky" src="https://jestwiecej.pl/wp-content/uploads/2019/04/logo-bw.png"
   alt="Logo" style="height: 100%;">
</style>
  <a href="'.\Config\Ustawienia::get('appUrl').'formularz-logowania/">Zaloguj</a>
  <a href="'.\Config\Ustawienia::get('appUrl').'formularz-rejestracji/">Zarejestruj</a>

    Witaj '.\Klasy\Sesja::get('imie').' '.\Klasy\Sesja::get('nazwisko').'
  <a href="'.\Config\Ustawienia::get('appUrl').'wylogowanie/">Wyloguj</a>
';

if (\Klasy\Sesja::get('id') !== null)
 {
    echo '
      <a href="'.\Config\Ustawienia::get('appURL').'prace-domowe-zadane/">Prace domowe zadane</a>
      <a href="'.\Config\Ustawienia::get('appURL').'moje-prace/">Moje prace</a>
      <a href="'.\Config\Ustawienia::get('appURL').'dodaj-rozwiazanie-formularz/">Dodaj rozwiązanie formularz</a>
      <a href="'.\Config\Ustawienia::get('appURL').'dodaj-rozwiazanie/">Dodaj rozwiązanie</a>

      <a href="'.\Config\Ustawienia::get('appURL').'lista-rozwazan/">Lista rozwiązań</a>
      <a href="'.\Config\Ustawienia::get('appURL').'lista-prac-domowych/">Lista prac domowych</a>
      <a href="'.\Config\Ustawienia::get('appURL').'nowa-praca-domowa-formularz/">Nowa praca domowa formularz</a>
      <a href="'.\Config\Ustawienia::get('appURL').'usun-prace-domowa/">Usuń pracę domową</a>
 ';
}
 ?>


<!-- <div class="col-md-12   text olive ">

    <h1 class="row ">

      <p class="h2 col-sm-4">SUU Szkoła Uzdrowienia i Uwolnienia</p>

      <div class="h2 col-sm-8  d-flex   justify-content-end">

           <ul class="nav  justify-content-end ">
                <li class="nav-item">
                  <a class="nav-link active" href="#">O nas</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="#">Kontakt</a>
                </li>

                <li class="nav-item">
                  <?php
                   // if (isset($_SESSION['id'])) {
                   ?>
                   <a class="nav-item nav-link active">Witaj <?php // echo $_SESSION['id']; ?></a>

                </li>
                <li class="nav-item">
                    <a class="nav-item nav-link active" href="<?php //echo APP_URL ?>wyloguj">Wyloguj</a>
                </li>
                <li class="nav-item">
                   <?php
                   //} else {
                   ?>
                     <a class="nav-item nav-link active" href="<?php //echo APP_URL ?>zaloguj">Zaloguj</a>
                </li>
                <li class="nav-item">
                     <a class="nav-item nav-link active" href="<?php //echo APP_URL ?>zarejestruj">Rejestracja</a>

                   <?php
                   //}
                   ?>
                </li>

           </ul>
      </div>
    </h1>

</div> -->




<!-- <div class="col-md-12">
 <img src="../img/74209251_2435958553308572_1469647597198114816_n.jpg" class="card-img" alt="Responsive image">
</div> -->
