<?php

namespace App\Table;

use Core\Config;
use Core\Table\Table;

class InfoTable extends Table {

    public function all(){
        $config = Config::getInstance(ROOT. '/config/config.php');
        return $this->query('SHOW tables FROM '. $config->get('db_name') .';');
    }

}