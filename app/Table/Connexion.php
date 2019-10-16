<?php

namespace App\Table;

use App\App;


class Connexion{
    private $name = 'tplinux';
    private $user;
    private $pass;
    private $host = 'localhost';

    public static function verifConnexion($user, $pass, $name, $host){
        /*$pdo = new PDO('mysql:dbname='. $name .';host=localhost', $user, $pass);
        var_dump($pdo);*/
        echo "Coucou";
    }
}