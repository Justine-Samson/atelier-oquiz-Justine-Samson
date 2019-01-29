<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

// Import de la classe obligatoire pour effectuer des requetes dans ma BDD
use Illuminate\Support\Facades\DB;

// Import des models (a voir après ;) ) 
use App\Model\Quizzes;
use App\Model\Questions;
use App\Model\Answers;
use App\Model\Levels;


class QuizController extends Controller {

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    public function quizz($id) {

        $listQuizzes = Quizzes::all();
        $quizzId = Quizzes::find($id);
        $level = Levels::all();
        $answer = Answers::all();

        /* Récupère les questions dont le "quizzes_id" correpond à l'id du quizz affiché */
        $quizzQuestion = Questions::where('quizzes_id', $id)->get(); 

        return view('main/quizz-consulter',[
            'quizz_display' => $quizzId,
            'question' => $quizzQuestion,
            'levels' => $level,
            'answer' => $answer
        ]);
    }
}