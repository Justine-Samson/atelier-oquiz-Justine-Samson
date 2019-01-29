<?php

namespace App\Http\Controllers;

//pour utiliser la classe view dans notre controller parent nous allons appeler la facade
use Illuminate\Support\Facades\View;

use Laravel\Lumen\Routing\Controller as BaseController;
use App\Utils\UserSession;

class Controller extends BaseController
{
    /* 
    *Je souhaite qu'à chaque controller j'ai ce passafe de paramètre à ma vue de prévus, je vais donc utiliser la fonction share de la classe View qui va me permettre d'effectuer ceci: 
    Comme mes controllers enfant appellent le controller parent, cela s'effectura automatiquement 
 */

    public function __construct()
    {
    // Ici toutes mes vues actuelles et futures auront accès à ces propriétés ci dessous
    View::share('isConnected', UserSession::isConnected());  
    View::share('currentUser', UserSession::getUser());  
    View::share('isAdmin', UserSession::isAdmin());
    }

    public function isUserAllowed()
    {
        //je test si mon utilisateur n'est pas connecté => redirection vers signin par exemple
        // pour rediriger avant  l'affichage de la view , je suis obligé de faire une redirection manuelle car sinon le return view() prendra le pas sur la redirection
        if(!UserSession::isConnected()){
            header('Location: /signin');
            exit(); //WARNING <--- ne marche pas sinon
        } elseif(!UserSession::isAdmin()) {
            abort(403, 'Accès non autorisé');
        }
    }
}
