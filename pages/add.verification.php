<?php

$nameTable = $_POST['nameTable'];
$choix = $_POST['choix'];
$content = [];

for($i=0;$i<sizeof($nameTable); ++$i){
    $content[$i] = $_POST[$nameTable[$i]];
}
//echo App::getInstance()->getTable('Single')->add($nameTable,$content, $choix);

if(App::getInstance()->getTable('Single')->add($nameTable,$content, $choix) == 1){
    echo 'Vos données ont bien été ajouté à la table';

    header( "refresh:3;url=index.php?p=table&choix=". $choix );
}