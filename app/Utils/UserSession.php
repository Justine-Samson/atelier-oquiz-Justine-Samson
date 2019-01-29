<?php
namespace App\Utils;

use App\Model\App_users;

abstract class UserSession {

    const SESSION_USER_NAME = 'currentUser';

    const NO_ROLE_DEFINED = 0;
    const ROLE_ADMIN = 7;

    //Je connecte mon utilisateur 
    // Je "type hint" ma variable d'entrée pour être certaine que j'aurais toujours un objet de tyoe User(issue de mon model),  dans $user 

    public static function connect(App_users $user){
        $_SESSION[self::SESSION_USER_NAME] = $user;

        return true;
        
    }

    //je deconnecte mon utilisateur
    public static function disconnect(){
        unset($_SESSION[self::SESSION_USER_NAME]);

        return true;
    }

    //je verifie si mon utilisateur a bien été connecté
    public static function isConnected(){
        return isset($_SESSION[self::SESSION_USER_NAME]);
    }

    //je récupère mon utilisateur si je suis connectée
    public static function getUser(){
        //si mon utilisateur est connecté c'est que je peux le recuperer
        if(self::isConnected()){

            return $_SESSION[self::SESSION_USER_NAME];
        }

        return false;
        var_dump($_SESSION);
    }

    //je récupère l'id du role de mon utilisateur
    public static function getRoleId(){
        
        if(self::isConnected()){

            return self::getUser()->role_id;
        }

        return self::NO_ROLE_DEFINED;
    }

    //je vérifie si mon utilisateur est administateur ou non
    public static function isAdmin(){
        
        return (self::getRoleId() == self::ROLE_ADMIN);
    }
}