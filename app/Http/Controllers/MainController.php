<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

// Import de la classe obligatoire pour effectuer des requetes dans ma BDD
use Illuminate\Support\Facades\DB;

// Import des models (a voir après ;) ) 
use App\Model\App_users;
use App\Model\Quizzes;


class MainController extends Controller 
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }
    public function home(Request $request) {



        $listQuizzes = Quizzes::all();
        $app_users = App_users::all();

        // $authorList = App_users
        // ::join('quizzes', 'quizzes.app_users_id','=', 'app_users.id')
        // ->select('quizzes.*', 'app_users.firstname AS firstname', 'app_users.lastname AS lastname')
        // ->get();

        // return view('home', [
        //     'videogameList' =>$videogameList,

        // ]);

        // La sauvegarde des paramètres dans des variabels est inutile car nous avons fait une
        // complète des tables utilisées avec ::all();

        // $title = $request->input('title');
        // $description = $request->input('description');
        // $status = $request->input('status');
        // $authors = $request->input('app_users_id');
        // $authorFirstname = $request->input('firstname');
        // $authorLastname = $request->input('lastname');        

        // dump($app_users);

        return view('main/home',[
            'list_quizzes' => $listQuizzes,
            'app_users' => $app_users
        ]);
    }
}