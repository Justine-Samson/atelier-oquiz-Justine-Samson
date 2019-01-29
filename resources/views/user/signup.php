<?= view('layout/header') ?>

<!-- j'affiche ma liste d'erreurs -->
<?php foreach($error_list as $error): ?>

    <div class="alert alert-danger" role="alert">
        <?= $error ?>
    </div>

<?php endforeach; ?>

<form action="" method="POST">

<div class="form-group">
  <label for="email">Adresse email</label>
  <!-- ATTENTION : ne pas oublier de rajouter l'attribut name sur chaque input -->
  <input type="text" class="form-control" id="email" name="email" value="<?= $email ?>" aria-describedby="emailHelp" placeholder="Enter email">
</div>

<div class="form-group">
  <label for="password">Mot de passe</label>
  <input type="password" class="form-control" id="password" name="password"  placeholder="Password">
</div>

<div class="form-group">
  <label for="confirm-password">Confirmation mot de passe</label>
  <input type="password" class="form-control" id="confirm-password" name="confirm-password" placeholder="Confirm password">
</div>

<button type="submit" class="btn btn-success">Inscription</button>
</form>

<?= view('layout/footer') ?>