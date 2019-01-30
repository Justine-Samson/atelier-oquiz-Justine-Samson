<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Model\App_users;
use App\Model\Quizzes;
use App\Utils\UserSession;


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
    public function home(Request $request) 
    {
        $listQuizzes = Quizzes::all();
        $app_users = App_users::all();

    
        return view('main/home',[
            'list_quizzes' => $listQuizzes,
            'app_users' => $app_users
        ]);
    }

    public function profile() 
    {
        $email = UserSession::getUser()->email;
        $firstname = UserSession::getUser()->firstname;
        $lastname = UserSession::getUser()->lastname;

        return view('user/profile', [
            'email'=> $email,
            'firstname'=> $firstname,
            'lastname'=> $lastname,
        ]);
    }
}