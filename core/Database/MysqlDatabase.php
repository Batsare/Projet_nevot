<?php
namespace Core\Database;

use \PDO;

class MysqlDatabase extends Database{
    /**
     * @return mixed
     */
    private $db_name = 'projet_mmn';
    private $db_user;
    private $db_pass;
    private $db_host = 'localhost';
    private $pdo;

    public function __construct($db_name, $db_user, $db_pass, $db_host){
        $this->db_name = $db_name;
        $this->db_user = $db_user;
        $this->db_pass = $db_pass;
        $this->db_host = $db_host;
    }

    private function getPDO(){
        $pdo = new PDO('mysql:dbname=projet_mmn;host=localhost', $this->db_user, $this->db_pass);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $this->pdo = $pdo;
        return $pdo;
    }

    public function query($statement, $class_name = null, $one = false){
        $req = $this->getPDO()->query($statement);
        if($class_name === null){
            $req -> setFetchMode(PDO::FETCH_OBJ);
        }else{

            $req->setFetchMode(PDO::FETCH_CLASS, $class_name);
        }
        if($one){
            $datas = $req->fetch();
        }else{
            $datas = $req->fetchAll();

        }
        return $datas ;
    }


    public function exec($statement, $attributes){
        $req = $this->getPDO()->prepare($statement);
        //$test = $req->execute($attributes);

        try{
            $req->execute($attributes);
            //return  '<div><p>La suppresion s\'est déroulé avec succès</p></div>';
            return true;
        }catch (\Exception $e){
            //return  '<div><p>Erreur</p></div>';
            return false;
        }

    }

    public function prepare($statement, $attributes, $class_name, $one = false){
        $req = $this->getPDO()->prepare($statement);
        $req->execute($attributes);
        if($class_name === null){
            $req -> setFetchMode(PDO::FETCH_OBJ);
        }else{

            $req->setFetchMode(PDO::FETCH_CLASS, $class_name);
        }
        if($one){
            $datas = $req->fetch();
        }else{
            $datas = $req->fetchAll();

        }
        return $datas ;
    }
}