<?php

namespace App\Model;
use Illuminate\Auth\Authenticatable;
use Laravel\Lumen\Auth\Authorizable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;
class App_users extends Model implements AuthenticatableContract, AuthorizableContract
{
    use Authenticatable, Authorizable;
    //je force le nom de la table en app_users afin d'eviter une resemblance trop proche  / ou de telescoper Mysql avec un nom reservé
    protected $table = 'app_users';
    //je desactive les colonnes attendues par defaut created_at , updated_at
    public $timestamps = false;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email',
    ];
    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [
        'password',
    ];

    public function quizzes()
    {
        //un utilisateur est relié potentiellement à 1 ou plusieurs quiz
        return $this->hasMany('App\Model\Quizzes','app_users_id');
    }
}