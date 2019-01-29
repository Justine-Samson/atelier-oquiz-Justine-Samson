<?= view('layout/header') ?>

<form>
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="email">Email</label>
      <input type="email" class="form-control" id="email">
    </div>
    <div class="form-group col-md-6">
      <label for="password">Mot de passe</label>
      <input type="password" class="form-control" id="password">
    </div>
  </div>
  <div class="form-group">
    <label for="firstname">Prénom</label>
    <input type="text" class="form-control" id="firstname">
  </div>
  <div class="form-group">
    <label for="lastname">Nom</label>
    <input type="text" class="form-control" id="lastname">
  </div>
  
  <button type="submit" class="btn btn-primary">S'inscrire</button>
</form>

<?= view('layout/footer') ?>