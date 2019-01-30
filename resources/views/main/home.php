<?= view('layout/header') ?>

        <div class="row">
            <h2> Bienvenue sur O'Quiz </h2>
            <p>

            Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet.
            
            </p>
        </div>

        <div class="row">

        <?php foreach($list_quizzes as $currentQuiz): ?>
            <div class="col-sm-4">
                <h3 class="text-blue"><a href ="<?= route('quizz', ['id'=>$currentQuiz]) ?>"><?= $currentQuiz->title ?></a></h3>
                <h5><?= $currentQuiz->description ?></h5>
                <p> 
                    <?php
                       $author = $app_users->firstWhere('id', $currentQuiz->app_users_id);
                       echo $author->firstname .' '.$author->lastname;
                    ?>
                </p>
            </div>
        <?php endforeach ?>
        </div>
    </main>

<?= view('layout/footer') ?>
