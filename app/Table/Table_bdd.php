<?php
namespace App\Table;

use App\App;

class Table_bdd{

    public static function getAllTable(){
        return App::getDb()->query('SHOW tables FROM tplinux',__CLASS__);
    }

    public static function getNameColumns($choix){
        return App::getDb()->query('SHOW COLUMNS FROM tplinux.'. $choix . ';', __CLASS__);
    }

    public static function getColumns($choix){
        return App::getDb()->query('SELECT * FROM ' . $choix . ' LIMIT 20;', __CLASS__);
    }

    public static function getTotal($choix){
        $retour_total = App::getDb()->query('SELECT COUNT(*) AS total FROM ' . $choix .';', __CLASS__ );
        return $retour_total[0]->total;
    }

    public static function getValeurPageActuelle($premiereEntree, $messagesParPage, $choix){
        return App::getDb()->query('SELECT * FROM '. $choix .' LIMIT '. $premiereEntree.', '. $messagesParPage.';', __CLASS__);

    }
}