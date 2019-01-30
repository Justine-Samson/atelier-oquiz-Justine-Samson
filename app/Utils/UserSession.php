<?php
namespace App\Utils;

use App\Model\App_users;

abstract class UserSession {

    const SESSION_USER_NAME = 'currentUser';

    const NO_ROLE_DEFINED = 0;
    const ROLE_ADMIN = 7;

    public static function connect(App_users $user){
        $_SESSION[self::SESSION_USER_NAME] = $user;

        return true;
        
    }

    
    public static function disconnect(){
        unset($_SESSION[self::SESSION_USER_NAME]);

        return true;
    }

    
    public static function isConnected(){
        return isset($_SESSION[self::SESSION_USER_NAME]);
    }

    
    public static function getUser(){
        if(self::isConnected()){

            return $_SESSION[self::SESSION_USER_NAME];
        }

        return false;
        var_dump($_SESSION);
    }

    public static function getRoleId(){
        
        if(self::isConnected()){

            return self::getUser()->role_id;
        }

        return self::NO_ROLE_DEFINED;
    }

    public static function isAdmin(){
        
        return (self::getRoleId() == self::ROLE_ADMIN);
    }
}