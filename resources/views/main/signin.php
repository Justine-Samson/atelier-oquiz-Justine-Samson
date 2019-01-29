<?= view('layout/header') ?>

<form>
  <div class="form-group">
    <label for="email">Adresse email</label>
    <input type="email" class="form-control" id="email" aria-describedby="emailHelp" placeholder="Entrez votre adresse email">
  </div>
  <div class="form-group">
    <label for="password">Mot de passe</label>
    <input type="password" class="form-control" id="password" placeholder="Mot de passe">
  </div>
  <button type="submit" class="btn btn-primary">Se connecter</button>
</form>

<?= view('layout/footer') ?>
