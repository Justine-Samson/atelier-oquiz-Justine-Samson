<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Model\Quizzes;
use App\Model\Questions;
use App\Model\Answers;
use App\Model\Levels;
use App\Utils\UserSession;


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
        $quizzQuestion = Questions::where('quizzes_id', $id)->get(); 

        return view('main/quizz-consulter',[
            'quizz_display' => $quizzId,
            'question' => $quizzQuestion,
            'levels' => $level,
            'answer' => $answer
        ]);
    }
}