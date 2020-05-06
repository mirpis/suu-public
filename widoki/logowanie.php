<?php include './widoki/glowny.php'; ?>

<div class="container d-flex justify-content-center flex-column mt-5  p-5 col-md-4 border rounded">

  <h3>Zaloguj się</h3>
  <form class="" action="<?php echo APP_URL ?>zaloguj-sie" method="post">
    <div class="form-group">
      <label for="login">Podaj login</label>
      <input id="login" class="form-control" type="text" name="login" placeholder="Login" />
    </div>
    <div class="form-group">
      <label for="password">Podaj hasło</label>
      <input id="password" class="form-control" type="password" name="haslo" placeholder="Hasło" />
    </div>
    <div class="form-group">
      <div class="form-check">
        <input type="checkbox" class="form-check-input" id="dropdownCheck">
        <label class="form-check-label" for="dropdownCheck">
          Pamiętaj mnie
        </label>
      </div>
    </div>
    <button class="btn btn-outline-light w-100" type="submit" name="button">Prześlij</button>
    <a class="btn btn-outline-warning w-100 mt-3" href="<?php echo APP_URL ?>">Powrót do strony głównej</a>
  </form>
</div>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

	<script src="js/bootstrap.min.js"></script>
<?php //include './widoki/stopka.php'; ?>
