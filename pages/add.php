<?php
use Core\Config;

$choix = $_GET['choix'];
$foreignKey = Config::getInstance(ROOT. '/config/foreignKey.php');

?>

<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
    <h1 class="page-header">Ajouter des données :</h1>
<form id="addTable" method="Post" action="index.php?p=add.verification">
    <input type="hidden" name="choix" value="<?= $choix ?>" />
    <?php foreach(App::getInstance()->getTable('Single')->getNameColumns($choix) as $value) :?>
        <input type="hidden" name="nameTable[]" value="<?= $value->Field ?>" />

        <?php if ($value->Field === "id_". strtolower($choix) ){ ?>
            <div class="form-group">
                <label for="exampleInputName2"><?= $value->Field ?></label>
                <input type="text" class="form-control" name="<?= $value->Field ?>" placeholder="<?= App::getInstance()->getTable('Single')->getLast($choix) + 1 ?>" value="<?= App::getInstance()->getTable('Single')->getLast($choix) + 1 ?>">
            </div>

        <?php }else{ ?>
            <?php
                    if ($value->Field[0] === 'i' && $value->Field[1] === 'd') {?>
                        <div class="form-group">
                            <label for="exampleInputName2"><?= $value->Field ?></label>
                            <input type="text" name="<?= $value->Field ?>" class="form-control" placeholder="<?= App::getInstance()->getTable('Single')->getForeignKey($choix,$value->Field);?>">
                        </div>

                    <?php }else{ ?>
                        <div class="form-group">
                            <label for="exampleInputName2"><?= $value->Field ?></label>
                            <input type="text" name="<?= $value->Field ?>" class="form-control"  placeholder="">
                        </div>
                    <?php }
            }; ?>

        <?php endforeach; ?>
    <button type="submit" class="btn btn-default">Ajouter</button>
</form>
<a class="btn btn-default" onclick="history.go(-1)" role="button">Retour</a>
</div>