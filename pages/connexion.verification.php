<?php

use Core\Config;

if(isset($_POST['login']) && isset($_POST['password'])){
    if(App::getInstance()->getTable('Connexion')->verifConnexion($_POST['login'],$_POST['password']) == true){
        $_SESSION['user'] = $_POST['login'];
        $_SESSION['password'] = $_POST['password'];

        header('Location: index.php?p=home');
    }
}