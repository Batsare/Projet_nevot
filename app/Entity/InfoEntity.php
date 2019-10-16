<?php
namespace App\Entity;

use Core\Entity\Entity;

class InfoEntity extends Entity{
    public function getUrl(){
        return 'index.php?page=table&choix='. $this->Tables_in_tplinux;
    }

    public function getField(){
        $html = '<option value="'. $this->getUrl(). '" >' . $this->Tables_in_tplinux . '</option>';
        return $html;
}
}