
<div class="col-md-12 bg-white text-white ">
  <img src="../img/74209251_2435958553308572_1469647597198114816_n.jpg" class="card-img" alt="Responsive image"> -->
 <div class="card-img-overlay max-width">
    <!-- <h5 class="card-title">Card title</h5> -->
    <!-- <h1 class="row app-title text-olive display-2">SUU
       <p class="h6 text-white col-sm-3">Szkoła Uzdrowienia i Uwolnienia</p>
    </h1> -->
   <div class="d-flex flex-row justify-content-end">
    <ul class="nav ">
      <li class="nav-item">
        <a class="nav-link active" href="#">O nas</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Kontakt</a>
      </li>
    <!-- <div class="d-flex flex-row"> -->

            <!-- <ul class="navbar-nav mr-auto"> -->
      <li class="nav-item">
        <?php
         if (isset($_SESSION['id'])) {
         ?>
          <a class="nav-item nav-link active">Witaj <?php echo $_SESSION['id']; ?></a>

        <div class="col-md-12 bg-white text-white ">
            <img src="../img/74209251_2435958553308572_1469647597198114816_n.jpg" class="card-img" alt="Responsive image"> -->
         <div class="card-img-overlay max-width">

            </li>
            <li class="nav-item">
                <a class="nav-item nav-link active" href="<?php echo APP_URL ?>wyloguj">Wyloguj</a>
            </li>

        </div>
       </div>

      <li class="nav-item">
         <?php
         } else {
         ?>
           <a class="nav-item nav-link active" href="<?php echo APP_URL ?>zaloguj">Zaloguj</a>
      </li>
      <li class="nav-item">
           <a class="nav-item nav-link active" href="<?php echo APP_URL ?>zarejestruj">Rejestracja</a>

         <?php
         }
       ?>
      </li>

    </ul>
   </div>

   <!-- <nav class="navbar navbar-expand-lg navbar-dark bg-danger py-3 sticky-top">

        <button class="navbar-toggler" type="button" data-toggle="collapse"
        data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
        aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button> -->

  <!-- <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav mr-auto d-flex justify-content-around"> -->
            <!-- <li class="nav-item">
              <a class="nav-link active" href="#">Start</a>
            </li>

            <li class="nav-item">
               <a class="nav-link active" href="#">Kontakt</a>
            </li>

            <li class="nav-item">
               <a class= "nav-link active" href="#">O nas</a>
            </li>
          </ul> -->

          <!-- <div class="d-flex flex-row">

                <ul class="navbar-nav mr-auto"> -->

                 <!-- <?php
                  //if (isset($_SESSION['id'])) {
                  ?>
                   <a class="nav-item nav-link active">Witaj <?php //echo $_SESSION['id']; ?></a>
                   <a class="nav-item nav-link active" href="<?php //echo APP_URL ?>wyloguj">Wyloguj</a>


                  <?php
                //} else {
                  ?>
                    <a class="nav-item nav-link active" href="<?php //echo APP_URL ?>zaloguj">Zaloguj</a>
                    <a class="nav-item nav-link active" href="<?php //echo APP_URL ?>zarejestruj">Rejestracja</a>
                  <?php
                //  }
                ?> -->
              <!-- </ul>
          </div> -->
        <!-- </div> -->
     <!-- </nav> -->
  </div>

</div>

<!-- <div class="col-md-12">
<img src="../img/74209251_2435958553308572_1469647597198114816_n.jpg" class="card-img" alt="Responsive image">
</div> -->
