<?= view('layout/header') ?>

<!-- J'affiche ma liste d'erreurs  -->
<?php dump($error_list) ?>
<?php if (!empty($error_list)) : ?>
 
    <div class="alert alert-danger" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>

        <?php foreach ($error_list as $currentError) : ?>
            <?= $currentError ?><br>
        <?php endforeach; ?>

    </div>
<?php endif; ?>

<form action="" method="POST" >
  <div class="form-group">
    <label for="email">Adresse email</label>
    <input type="email" class="form-control" id="email" name="email" aria-describedby="emailHelp" placeholder="Entrez votre adresse email">
  </div>
  <div class="form-group">
    <label for="password">Mot de passe</label>
    <input type="password" class="form-control" id="password" name="password" placeholder="Mot de passe">
  </div>
  <button type="submit" class="btn btn-primary">Se connecter</button>
</form>

<a href="<?= route('signup'); ?>"> Pas encore de compte ? c'est ici </a>
<?= view('layout/footer') ?>
