<?php
    if($_SESSION['user'] != 'admin'){
        echo '<p class="bg-danger">Accès interdit ! Vous allez être redirigé vers la page d\'accueil.</p>';
        header( "refresh:5;url=index.php?p=home");
        die();
    }
    if(!isset($_GET['d'])){
        $_GET['d'] = 'maintenance';
    }
?>



<div class="col-sm-3 col-md-2 sidebar">
    <h3 class="page-header">Menu</h3>
      <ul class="nav nav-sidebar">
          <?php if($_GET['d'] === 'maintenance'){
              echo '<li class="active"><a href="index.php?p=surveillance&d=maintenance">Maintenance des tables<span class="sr-only">(current)</span></a></li>';
          }else{
              echo '<li><a href="index.php?p=surveillance&d=maintenance">Maintenance des tables</a></li>';
          }?>
          <?php if($_GET['d'] === 'status'){
              echo '<li class="active"><a href="index.php?p=surveillance&d=status">Status MySql<span class="sr-only">(current)</span></a></li>';
          }else{
              echo '<li><a href="index.php?p=surveillance&d=status">Status MySql</a></li>';
          }?>
      </ul>
</div>

<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
    <?php
    if(isset($_POST['repair'])){
        echo App::getInstance()->getTable('surveillance')->repairTable($_POST['repair']);
    }
    if($_GET['d'] === 'maintenance'){
        echo '<h1 class="page-header">Surveillance : maintenance</h1>';
        echo App::getInstance()->getTable('surveillance')->showTable();
    }elseif($_GET['d'] === 'status'){
        echo '<h1 class="page-header">Surveillance : status MySql</h1>';
        echo App::getInstance()->getTable('surveillance')->showStatus();
    }
    ?>

</div>