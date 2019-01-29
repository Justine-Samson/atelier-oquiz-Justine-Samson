<?= view('layout/header') ?>

<?php foreach($error_list as $error): ?>

<div class="alert alert-danger" role="alert">
    <?= $error ?>
</div>

<?php endforeach; ?>

<form action="" method="POST" >
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

<a href="<?= route('signup'); ?>"> Pas encore de compte ? c'est ici </a>
<?= view('layout/footer') ?>
