<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">

<?php
if(!isset($_POST['id'])){
    echo "Vous n'avez pas sélectionner de lignes";

}else{
    $id_selected = $_POST['id'];
    $nomTable = $_POST['table'];

   echo App::getInstance()->getTable('Single')->delete($nomTable,$id_selected);
   header( "refresh:3;url=index.php?p=table&choix=". $nomTable );
}?>

</div>