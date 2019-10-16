<?php

namespace App\Table;


use Core\Config;
use Core\Table\Table;
use App\App;

class SingleTable extends Table {

    public function getTotal($choix){
        $retour_total = $this->query('SELECT COUNT(*) AS total FROM ' . $choix .';', null, true);
        return $retour_total->total ;
    }

    public function getNameColumns($choix){
        $config = Config::getInstance(ROOT. '/config/config.php');
        return $this->query('SHOW COLUMNS FROM '. $config->get('db_name') .'.'. $choix . ';');
    }

    public function getColumns($choix, $tri, $ordre){
        return $this->query('SELECT * FROM ' . $choix . ' ORDER BY '. $tri .' '. $ordre .' LIMIT 20;');
    }

    public function getValeurPageActuelle($premiereEntree, $messagesParPage, $choix, $tri, $ordre){
        return  $this->query('SELECT * FROM '. $choix .' ORDER BY '. $tri .' '. $ordre .' LIMIT '. $premiereEntree.', '. $messagesParPage.';');

    }

    public function getLast($choix){
        $req = $this->query('SELECT MAX(id_'. strtolower($choix) .') from '. $choix .';',null, true);
        foreach ($req as $value){}
        return $value;
    }

    public function add($nomTable, $content, $choix){
        $config = Config::getInstance(ROOT. '/config/config.php');
        $column = '';
        $contentReq = '';
        $tabContent = [];

        for($i=0; $i<sizeof($nomTable); ++$i){
            if($i == sizeof($nomTable)-1){
                $column = $column . $nomTable[$i];
            }else{
                $column = $column . $nomTable[$i] . ', ';
            }

        }

        for($i=0; $i<sizeof($nomTable); ++$i){
            if($i == sizeof($nomTable)-1){
                $contentReq = $contentReq . '?';
            }else{
                $contentReq = $contentReq . '?, ';
            }

        }

        for($i=0; $i<sizeof($nomTable); ++$i){
            if($content[$i] === ''){
                $tabContent[$i] = '';
            }else{
                $tabContent[$i] = $content[$i];
            }

        }



       return $this->query('INSERT INTO '. $config->get('db_name') .'.' . $choix . '('. $column . ') VALUES (' . $contentReq . ');', $tabContent, true, true);

    }

    public function delete($nom_table,$id){

        for($i=0; $i < sizeof($id); ++$i){
            $config = Config::getInstance(ROOT. '/config/config.php');
            $req = $this->query("DELETE FROM ". $config->get('db_name') .".". $nom_table ." WHERE ". $nom_table .".id_". lcfirst($nom_table) ."= ". $id[$i] . ";",null,false,true);
            //echo "DELETE FROM ". $config->get('db_name') .".". $nom_table ." WHERE ". $nom_table .".id_". lcfirst($nom_table) ."= ". $id[$i] . ";";
        }
        if ($req === true){
            return  '<p class="bg-success">Vos données ont bien été supprimé.</p>';
        }else{
            return  '<p class="bg-danger">Une erreur est survenue lors de la suppression ! Vérifier que vous n\'essayez pas de supprimer des données qui liées via des clés étrangère.</p>';
        }
    }

    public function getForeignKey($table, $id){
            $test = str_replace("id_", "", $id);
            $test = ucfirst($test);
            $config = Config::getInstance(ROOT. '/config/config.php');

            $res = $this->query('SELECT MAX('. $id .') from '. $test .';',null, true);
            //$res = $this->query('SELECT '. $id . ' FROM '. $config->get('db_name') . '.' . $table . ';');
            $key = "MAX($id)";
            foreach ($res as $value){
                return 'Compris entre 1 et '. $value . '';
            }



    }
}