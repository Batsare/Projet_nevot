<?php
namespace App\Table;

use App;
use Core\Table\Table;

class SurveillanceTable extends Table {

    public function showTable(){
        foreach(App::getInstance()->getTable('Info')->all() as $key => $value){
            $tables[$key] = $value->Tables_in_projet_mmn;
        }

        for($i=0; $i < sizeof($tables); ++$i){
            $res[$i] = $this->query('CHECK TABLE projet_mmn.'. $tables[$i] .';');
        }


        $html = '<div class="table-responsive" >
                    <table class="table table-bordered">
                        <tr>
                            <th>Table</th>
                            <th>Opération</th>
                            <th>Etat</th>
                            <th>Action</th>
                        </tr>';

        foreach ($res as $value){
            $html = $html . '<tr><form method=\'POST\'>
                                <input type="hidden" name="repair" value="'. $value[0]->Table .'">
                                <td>'. $value[0]->Table .'</td>
                                <td>'. $value[0]->Op .'</td>
                                <td>'. $value[0]->Msg_text .'</td>
                                <td><input class="btn btn-default"  type=\'submit\' value=\'Repair\'></td>
                            </form></tr>';
        }

        $html = $html . '</table>
                        </div>';


        return $html;
    }

    public function showStatus(){

            $res = $this->query('SHOW STATUS;');



        $html = '<div class="table-responsive" >
                    <table class="table table-bordered">
                        <tr>
                            <th>Nom de variable</th>
                            <th>Valeur</th>
                        </tr>';

        foreach ($res as $value){
            $html = $html . '<tr><td>'. $value->Variable_name .'</td>
                                <td>'. $value->Value .'</td>
                            </tr>';
        }

        $html = $html . '</table>
                        </div>';


        return $html    ;
    }

    public function repairTable($table){
        $res = $this->query('REPAIR TABLE '. $table);

        return '<div class="row"><div class="alert alert-success alert-dismissible fade in" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">
                        ×</span>
                    </button>
                        <h4>Votre table a été réparé.</h4>
                    </div></div>';
        //return $table;
    }
}