<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB; 
use App\Model\App_users;
use App\Model\Quizzes;
use App\Utils\UserSession;

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

    public function signin(Request $request){
        $errorList = [];
        $email = $request->input('email');
        $password = $request->input('password');
        
        if($request->isMethod('post')){
            $email = trim($email);
            $password = trim($password);
            dump($email);
            dump($password);
            if(
                empty($email) || 
                filter_var($email, FILTER_VALIDATE_EMAIL) === false ||
                empty($password)
            ){
                $errorList[] = 'Identifiant ou mot de passe incorrect';
            }
            
            if(empty($errorList)){
                $user = App_users::where('email', '=', $email)->first();
                
                if($user){
                    if(password_verify($password, $user->password)){
                        UserSession::connect($user);
                        return redirect()->route('home');
                    }             
                } else {
                    $errorList[] = 'Identifiant ou mot de passe incorrect';  
                }
            }
        }

        return view('user/signin',[
            'error_list' => $errorList,
            'email' => $email
        ]);
    }



    public function signup(Request $request) {
        $errorList = [];
        $email = $request->input('email');
        $password = $request->input('password');
        $confirmPassword = $request->input('confirm-password');
        
        if($request->isMethod('post')){
            
            $email = trim($email);
            $password = trim($password);
            $confirmPassword = trim($confirmPassword);
            
            if(empty($email)){
                $errorList[] = 'email vide';
            } else if (filter_var($email, FILTER_VALIDATE_EMAIL) === false){
                $errorList[] = 'format de l\'email incorrect';
            }
            if(empty($password)){
                $errorList[] = 'password vide';    
            }else if(strlen($password) < 8 ) {
                $errorList[] = 'password trop court, 8 caractères minimum attendu';
            }else if($confirmPassword != $password){
                $errorList[] = 'la confirmation du password ne correspond pas avec celui d\'origine';
            }
            
            
            if(empty($errorList)){
                $user = App_users::where('email', '=', $email)->first();
                
                if($user){
                    $errorList[] = 'Cet email existe déjà';
                } else {

                    $newUser = new App_users();
                    $newUser->email = $email;
                    $newUser->password = password_hash( $password, PASSWORD_DEFAULT);
                    $newUser->save();
                    
                    return redirect()->route('signin');
                }
            }
        }
        return view('user/signup', [
            'error_list' => $errorList,
            'email' => $email
        ]);
    }


    public function logout(){
        
        UserSession::disconnect();
        return redirect()->route('home');
    }
}