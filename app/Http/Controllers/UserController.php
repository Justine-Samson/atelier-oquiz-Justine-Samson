<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

// Import de la classe obligatoire pour effectuer des requetes dans ma BDD
use Illuminate\Support\Facades\DB;

// Import des models (a voir après ;) ) 
use App\Model\App_users;
use App\Model\Quizzes;

class UserController extends Controller {

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    public function signin() {
        return view('main/signin');        
    }

    public function signup() {
        return view('main/signup');
    }

    public function logout() {
        return view('main/logout');
    }
}