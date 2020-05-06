<?php include './widoki/glowny.php';?>

<div class="container d-flex justify-content-center flex-column mt-5 p-5 col-md-4 border rouned">

  <h3>Zarejestruj się</h3>
  <form class="" action="<?php echo APP_URL ?>zarejestruj-sie" method="post">
     <div class="form-group">
       <label for="login">Login</label>
       <input type="text" name="login" id="login" class="form-control" />
     </div>

     <div class="form-group">
       <label for="email">Email</label>
       <input type="text" name="email" id="email" class="form-control" />
     </div>

     <div class="form-group">
       <label for="haslo1">Hasło</label>
       <input type="text" name="haslo1" id="haslo1" class="form-control" />
     </div>

     <div class="form-group">
       <label for="haslo2">Powtórz hasło</label>
       <input type="text" name="haslo2" id="haslo2" class="form-control" />
     </div>

     <div class="form-group">
       <label for="regulamin" class="d-flex flex-row">Akceptuję regulamin
         <input type="checkbox" name="regulamin" value="1" class="form-control" id="regulamin" />
       </label>
     </div>

     <button type="submit" class="btn btn-success">Zarejestruj się</button>

  </form>

</div>
