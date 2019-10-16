<?php
define('ROOT', dirname(__DIR__));

require ROOT . '/app/App.php';
App::load();


if(isset($_SESSION['user'])){
    if (isset ($_GET['p'])){
        $p = $_GET['p'];
    } else {
        $p = 'home';
    }
}else{
    $p='connexion';
}

ob_start();
if ($p === 'home'){
    require ROOT .'/pages/home.php';
} elseif ($p === 'table'){
    require ROOT .'/pages/single.php';
}elseif ($p === 'connexion'){
    require ROOT .'/pages/connexion.php';
}elseif ($p === 'add'){
    require ROOT .'/pages/add.php';
}elseif ($p === 'add.verification'){
    require ROOT .'/pages/add.verification.php';
}elseif ($p === 'delete'){
    require ROOT .'/pages/delete.php';
}elseif ($p === 'deconnexion'){
    require ROOT .'/pages/deconnexion.php';
}elseif ($p === 'surveillance'){
    require ROOT .'/pages/surveillance.php';
}
$content = ob_get_clean();


require ROOT .'/pages/templates/default.php';
