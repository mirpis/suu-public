

  <?php
  include './widoki/glowny.php';
  ?>

<div class="container-fluid">

    <div class="d-flex flex-row flex-wrap">
      <!-- Menu -->
      <div class="col-md-12 bg-danger">
        <?php
        include './widoki/navbar.php';
        ?>
      </div>
           <!-- Menu boczne -->
      <div class="flex-md-fill">
        <!-- <div class="col-md-2 d-flex flex-row flex-wrap"> -->
          <?php
          include './widoki/menu-boczne.php';
          ?>
        <!-- </div> -->
      </div>   
          <!-- Zdjęcia -->

          <!-- flex-row - WYŚWIETLAJ W WIERSZU -->
          <!-- flex-wrap - ZŁAM WIERSZ I PRZENIEŚ KOLEJNE ZDJĘCIA DO KOLEJNEGO WIERSZA-->
      <div class="flex-md-fill">
        <!-- <div class="col-md-10 d-flex flex-row flex-wrap"> -->
          <div class="body">
            <picture>
              <source srcset="" type="image/svg+xml">
              <img src="./img/suu2.jpg" class="img-fluid img=thumbnail" alt="suu"></img>
            </picture>
            <!-- <img src="./img/suu2.jpg" class="img-fluid" alt="suu" width="2960" height="1145"> -->
            <p>Zajęcia szkołu SUU odbywają się w każda Sobotę w godzinach od 10:00 d0 19:00.</p>
         </div>
        <!-- </div> -->
      </div>
    </div>
</div>

  <?php
  include './widoki/stopka.php';
  ?>
