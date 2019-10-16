<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
    <h1 class="page-header">Connexion :</h1>
<form method="post" class="form-inline">
    <div class="form-group">
        <label for="login">Identifiant</label>
        <input type="text" class="form-control" id="login" name="login" placeholder="Identifiant">
    </div>
    <div class="form-group">
        <label for="exampleInputEmail2">Mot de passe</label>
        <input type="password" class="form-control" id="password" name="password" placeholder="Mot de passe">
    </div>
    <button type="submit" class="btn btn-default">Valider</button>

</form>
    <?php require ROOT. '/pages/connexion.verification.php' ?>
</div>
