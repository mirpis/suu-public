<?php
include './widoki/glowny.php';
//include './widoki/menu-gora.php';
?>

<div class="d-flex flex-row flex-wrap">
  <!-- Nagłówek -->
  <div class="col-md-12 bg-white">
    <?php
      include './widoki/navbar.php';
     ?>
  </div>

  <!-- Menu -->
  <div class="col-md-3">
    <?php
      include './widoki/menu-boczne.php';
     ?>
  </div>

  <!-- Zdjęcia -->
  <!-- <div class="col-md-9 d-flex flex-row flex-wrap"> -->
    <!-- flex-row - WYŚWIETLAJ W WIERSZU -->
    <!-- flex-wrap - ZŁAM WIERSZ I PRZENIEŚ KOLEJNE ZDJĘCIA DO KOLEJNEGO WIERSZA-->
  <?php //foreach ($produkty as $produkt)
    //{?>
      <!-- <div class="col-md-3 p-1 mt-3 text-dark">
        <div class="card h-100">
          <img class="card-odt-top" src="<?php //echo APP_URL . 'odt/' . $produkt['link'] ?>" alt="Card OpenDocument tekstowy">
          <div class="card-body">
            <h4 class="card-title"><?php //echo $produkt['tytul'] ?></h4>

          </div>
        </div>
      </div>
    <?php //} ?>
  </div>
</div>


<?php
include './widoki/stopka.php';
?>
