<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">

    <h1 class="page-header">Sélection des tables :</h1>
    <form method='GET'>
    <div class="form-group col-md-8">
    <input type="hidden" name="p" value="table">
    <select class="form-control" name='choix'>
        <?php foreach(App::getInstance()->getTable('Info')->all() as $value): ?>
            <option value='<?=$value->Tables_in_projet_mmn?>' ><?=$value->Tables_in_projet_mmn;?></option>
        <?php endforeach; ?>
    </select>
    </div>
    <input class="btn btn-default col-md-2"  type='submit' value='Envoyer'>

</form>
</div>


