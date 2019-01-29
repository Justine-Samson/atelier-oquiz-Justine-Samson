<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

// Import de la classe obligatoire pour effectuer des requetes dans ma BDD
use Illuminate\Support\Facades\DB;

// Import des models (a voir après ;) ) 
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
            //VALIDATION
            if(
                empty($email) || 
                filter_var($email, FILTER_VALIDATE_EMAIL) === false ||
                empty($password)
            ){
                $errorList[] = 'Identifiant ou mot de passe incorrect';
            }
            
            if(empty($errorList)){
                //je verifie grace a mon email si mon utilisateur a deja un email existant dans ma BDD
                //si tel est le cas , alors je ne PEUX m'authentifier 
                $user = App_users::where('email', '=', $email)->first();
                //si je recupere un user => j'ai deja quelqu'un pour cet email
                if($user){
                    //je compare grace a password verify si le mot de passe hashé en DB est equivalent a celui qui va etre hashé avec password verify.
                    // si les deux chaines sont ok alors c'est que le mot de passe est bien le bon
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
        /*
         je recupere les données de mon formulaire AVANT la methode POST
         En effet, dans mon cas j'ai  deux action a effectuer , afficher le formulaire et inscrire un utilisateur (POST).
         Dans le cadre d'une erreur de saiise dans mon formulaire, je souhaite
         afficher non seulement les erreur mais aussi les zones saisies par mon utilisateur afin qu'il puisse se corriger.
         De ce fait je dois recuperer dans tout les cas GET ou POST mes datas afin que ma vue ne plante pas (et meme si mes champs sont vide =W géré avec ->input())
        */
        $email = $request->input('email');
        $password = $request->input('password');
        $confirmPassword = $request->input('confirm-password');
        
        if($request->isMethod('post')){
            //NETTOYAGE
            //en prevention je supprime les espace avant et apres chaque champs pour eviter les fautes de frappe
            $email = trim($email);
            $password = trim($password);
            $confirmPassword = trim($confirmPassword);
            //VALIDATION
            if(empty($email)){
                $errorList[] = 'email vide';
            // je verifie si ma structure de mon email est correcte avec filter_var
            } else if (filter_var($email, FILTER_VALIDATE_EMAIL) === false){
                $errorList[] = 'format de l\'email incorrect';
            }
            if(empty($password)){
                $errorList[] = 'password vide';
            // je verifie si mon password n'est pas inférieur a 8 caracteres    
            }else if(strlen($password) < 8 ) {
                $errorList[] = 'password trop court, 8 caractères minimum attendu';
            }else if($confirmPassword != $password){
                $errorList[] = 'la confirmation du password ne correspond pas avec celui d\'origine';
            }
            
            //si j'ai aucune erreur dans mon tableau je peux continuer la procedure d'inscription
            if(empty($errorList)){
                //je verifie grace a mon email si mon utilisateur a deja un email existant dans ma BDD
                //si tel est le cas , alors je ne peux pas creer un nouvel utilisateur avec un email semblable
                $user = App_users::where('email', '=', $email)->first();
                //si je recupere un user => j'ai deja quelqu'un pour cet email
                if($user){
                    $errorList[] = 'Cet email existe déjà';
                } else {
                    $newUser = new App_users();
                    $newUser->email = $email;
                    //avant l'insertion en BDD , je hash mon mdp avec l'algorithme bcrypt prevu par defaut
                    $newUser->password = password_hash( $password, PASSWORD_DEFAULT);
                    //j'enregistre l'utilisateur
                    $newUser->save();
                    //suite à l'inscription de mon utilisateur je souhaite pouvoir m'authentifier et ne pas rester sur la page d'inscription
                    return redirect()->route('signin');
                }
            }
        }
        return view('user/signup', [
            'error_list' => $errorList,
            'email' => $email
        ]);
    }

    //deconnexion
    public function logout(){
        
        UserSession::disconnect();
        return redirect()->route('home');
    }
}