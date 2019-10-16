<?php

namespace App\Table;

use App\App;
use Core\Database\MysqlDatabase;
use PDO;


class ConnexionTable{
    private $name = 'projet_mmn';
    private $user = 'root';
    private $pass = 'Prowkib7';
    private $host = 'localhost';

    public function verifConnexion($login, $password){
        $pdo = new PDO('mysql:dbname='. $this->name .';host='. $this->host, $this->user, $this->pass);
        $req = $pdo->prepare('SELECT User FROM mysql.user WHERE User= :login and Password = PASSWORD(:password)');
        $req->execute(array(':login' => $login, ':password' => $password));
        $res = $req->fetch(PDO::FETCH_ASSOC);
        $data = $res['User'];

        if( $data === $login){

            return true;

        }else{
            echo '<div class="row"><div class="alert alert-danger alert-dismissible fade in" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">
                        ×</span>
                    </button>
                        <h4>Oh non ! Vous avez une erreur !</h4>
                        <p>Les identifiants que vous avez saisie sont incorrect ! Veuillez entrer des identifiants valide.</p>
                    </div></div>';
        }


    }
}?>

