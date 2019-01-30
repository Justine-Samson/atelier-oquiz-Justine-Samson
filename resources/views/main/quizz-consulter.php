<?php
use Illuminate\Support\Facades\DB;
use App\Model\Answers;
use App\Model\Questions;
use App\Utils\UserSession;

echo view('layout/header'); ?>

            <div class="row">
                <h2> <?= $quizz_display->title ?>
                    <span class="badge badge-pill badge-secondary">xx questions</span>
                </h2>
            </div>

            <div class="row">
                <h4> 
                    <?= $quizz_display->description ?>
                </h4>
            </div>

            <div class="row">
                <p>by <?= $quizz_display->author->firstname ?>
                <?= $quizz_display->author->lastname ?>
                </p>
            </div>
    
            <div class="row">

                <?php foreach($question as $currentQuestion): ?>
                    <div class="col-sm-3 offset-sm-1 border p-0">

                        <span class="badge badge-success float-right mt-2 mr-2">
                        <?php $level = $levels->firstWhere('id', $currentQuestion->levels_id);
                        echo $level->name;?></span>

                    <!-- Ici insérer le switch pour les levels  -->

                        <div class="p-3 background-grey">
                        <?= $currentQuestion->question ?>
                        <?php $answerId = $currentQuestion->id; ?>
                        </div>
                        <div class="p-3 question-answer-block">
                            <ul>
                            <?php $answer = Answers::where('questions_id', $answerId)->select('description')->inRandomOrder()->get(); ?>
                            <?php foreach($answer as $currentAnswer): ?>
                           
                                <li>
                                    <?= $currentAnswer->description ?>     
                                </li>
                                <?php endforeach ?> 
                            </ul> 
                        </div>
                    </div>
                <?php endforeach ?>
                
            </div>
         
        </main>
