<?php
$choix = $_GET['choix'];


//$total = App\Table\Single::getTotal($choix);
$instance_app = App::getInstance();

$total = $instance_app->getTable('Single')->getTotal($choix);
$columns_name = $instance_app->getTable('Single')->getNameColumns($choix);


//var_dump($columns);


foreach ($columns_name as $key => $value){
    $test[$key] = $columns_name[$key]->Field;
}
//var_dump($test);
require ROOT . '/pages/single.tri.php';

$messagesParPage = 20 ;
$nombreDePages=ceil($total/$messagesParPage);


if(isset($_GET['page'])) // Si la variable $_GET['page'] existe...
{
    $pageActuelle=intval($_GET['page']);

    if($pageActuelle>$nombreDePages) // Si la valeur de $pageActuelle (le numéro de la page) est plus grande que $nombreDePages...
    {
        $pageActuelle=$nombreDePages;
    }
}
else // Sinon
{
    $pageActuelle=1; // La page actuelle est la n°1
}
$premiereEntree=($pageActuelle-1)*$messagesParPage; // On calcul la première entrée à lire
$retourMessage = $instance_app->getTable('Single')->getValeurPageActuelle($premiereEntree, $messagesParPage, $choix, $tri, $ordre);

?>
<div class="col-sm-3 col-md-2 sidebar">
    <div class="row">
        <h4 class="page-header">Sélectionner votre table :</h4>
    <form method='GET'>
    <div class="form-group">
        <input type="hidden" name="p" value="table">
        <select class="form-control" name='choix'>
            <?php foreach(App::getInstance()->getTable('Info')->all() as $value): ?>
                <option value='<?=$value->Tables_in_projet_mmn?>' ><?=$value->Tables_in_projet_mmn;?></option>
            <?php endforeach; ?>
        </select>
    </div>
    <input class="btn btn-default col-md-4"  type='submit' value='Envoyer'>
    </div>
    </form>
    <div class="row">
        <h4 class="page-header">Méthode de tri :</h4>
    <form method='POST'>
        <div class="form-group">
            <input type="hidden" name="p" value="table">
            <input type="hidden" name="choix" value="<?= $choix ?>">
            <select class="form-control" name='tri'>
                <?php foreach ($columns_name as $key => $value): ?>
                    <option value='<?=$columns_name[$key]->Field;?>' ><?=$columns_name[$key]->Field;?></option>
                <?php endforeach; ?>
            </select>
            <label class="radio-inline">
                <input type="radio" name="ordre" id="inlineRadio1" value="ASC"> Ascendant
            </label>
            <label class="radio-inline">
                <input type="radio" name="ordre" id="inlineRadio2" value="DESC"> Descendant
            </label>

        </div>
        <input class="btn btn-default col-md-4 "  type='submit' value='Trier'/>
    </form>

    </div>
    <div class="row">
        <h4 class="page-header">Ajout de données :</h4>
        <a class="btn btn-default" href="index.php?p=add&choix=<?= $choix ?>" role="button">Ajouter</a>
    </div>
    </div>






<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
    <h1 class="page-header">Information des tables</h1>
<form id="delete" method="post" action="index.php?p=delete">
    <input id="choixTable" type="hidden" name="table" value="<?= $choix ?>">
<div class="table-responsive" >

    <table class="table table-bordered">

        <tr>
                <th>Sélection</th>
                <?php foreach ($columns_name as $key => $value): ?>
                    <th><?=$columns_name[$key]->Field;?></th>
            <?php endforeach;?>
        </tr>
        <?php foreach($retourMessage as $key => $value){ ?>
            <tr>
                <td><input class="checkboxTable" type="checkbox" value="<?= $retourMessage[$key]->$test[0] ?>" name="id[]"></td>

                <?php for($i = 0 ; $i < sizeof($columns_name); ++$i ): ?>

                    <td><?php echo $retourMessage[$key]->$test[$i];?></td>
                <?php endfor;?>
            </tr>
        <?php  }?>

    </table>

</div>
    <input class="btn btn-default" type="submit" value="Supprimer">
</form>
    <?php require ROOT .'/pages/single.pagination.php'; ?>
</div>

