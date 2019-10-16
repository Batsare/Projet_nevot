<?php
echo '<div class="text-center"><nav aria-label="Page navigation">
       <ul class="pagination">';

// Je teste si nous sommes sur une page compris entre 1 et 3
// Si c'est le cas je n'affiche pas la navigation vers les pages inférieure à 1
if($pageActuelle <=3){
    if($pageActuelle !=1 ){
        echo'<li><a href="index.php?p=table&choix='.$choix.'&page=1" aria-label="Previous">
        <span aria-hidden="true">&laquo;</span>
      </a></li>';
        echo'<li><a href="index.php?p=table&choix='.$choix.'&page='.($pageActuelle - 1).'" aria-label="Previous">
        <span aria-hidden="true">&lt;</span>
      </a></li>';
    }
    for($i=$pageActuelle-1; $i<=$pageActuelle+1; $i++) //On fait notre boucle
    {
        //On va faire notre condition
        if($i==$pageActuelle) //Si il s'agit de la page actuelle...
        {
            echo ' <li class="active"><a href="index.php?p=table&choix='.$choix.'&page='.$i.'">'.$i.'</a></li> ';
        }
        else //Sinon...
        {
            echo ' <li><a href="index.php?p=table&choix='.$choix.'&page='.$i.'">'.$i.'</a></li> ';
        }
    }
    echo'<li><a href="index.php?p=table&choix='.$choix.'&page='.($pageActuelle + 1).'" aria-label="Previous">
        <span aria-hidden="true">&gt;</span>
      </a></li>';
    echo'<li><a href="index.php?p=table&choix='.$choix.'&page='.$nombreDePages.'" aria-label="Previous">
        <span aria-hidden="true">&raquo;</span>
      </a></li>';

}else
    // Je teste si nous sommes sur une page compris entre la dernière page et 4 pages avant
    // Si c'est le cas je n'affiche pas la navigation vers les pages supérieur à la dernière page
    if($pageActuelle >= $nombreDePages - 1){

        echo'<li><a href="index.php?p=table&choix='.$choix.'&page=1" aria-label="Previous">
        <span aria-hidden="true">&laquo;</span>
      </a></li>';
        echo'<li><a href="index.php?p=table&choix='.$choix.'&page='.($pageActuelle - 1).'" aria-label="Previous">
        <span aria-hidden="true">&lt;</span>
      </a></li>';

        $j = $pageActuelle- 1;
        for($i=$pageActuelle-1; $i<=$nombreDePages; $i++) //On fait notre boucle
        {

            //On va faire notre condition
            if($j==$pageActuelle) //Si il s'agit de la page actuelle...
            {
                echo ' <li class="active"><a href="index.php?p=table&choix='.$choix.'&page='.$j.'">'.$j.'</a></li> ';
            }
            else //Sinon...
            {
                echo ' <li><a href="index.php?p=table&choix='.$choix.'&page='.$j.'">'.$j.'</a></li> ';
            }
            ++$j;
        }
        if($pageActuelle != $nombreDePages){
            echo'<li><a href="index.php?p=table&choix='.$choix.'&page='.($pageActuelle + 1).'" aria-label="Previous">
        <span aria-hidden="true">&gt;</span>
      </a></li>';
            echo'<li><a href="index.php?p=table&choix='.$choix.'&page='.$nombreDePages.'" aria-label="Previous">
        <span aria-hidden="true">&raquo;</span>
      </a></li>';
        }

    }
    //Si les deux conditions précédente ne sont pas bonne
    else{
        $j = $pageActuelle - 1;

        echo'<li><a href="index.php?p=table&choix='.$choix.'&page=1" aria-label="Previous">
        <span aria-hidden="true">&laquo;</span>
      </a></li>';
        echo'<li><a href="index.php?p=table&choix='.$choix.'&page='.($pageActuelle - 1).'" aria-label="Previous">
        <span aria-hidden="true">&lt;</span>
      </a></li>';

        for($i=$pageActuelle-1; $i<=$pageActuelle+1; $i++) //On fait notre boucle
        {

            //On va faire notre condition
            if($j==$pageActuelle) //Si il s'agit de la page actuelle...
            {
                echo ' <li class="active"><a href="index.php?p=table&choix='.$choix.'&page='.$j.'">'.$j.'</a></li> ';
            }
            else //Sinon...
            {
                echo ' <li><a href="index.php?p=table&choix='.$choix.'&page='.$j.'">'.$j.'</a></li> ';
            }
            ++$j;
        }

        echo'<li><a href="index.php?p=table&choix='.$choix.'&page='.($pageActuelle + 1).'" aria-label="Previous">
        <span aria-hidden="true">&gt;</span>
      </a></li>';
        echo'<li><a href="index.php?p=table&choix='.$choix.'&page='.$nombreDePages.'" aria-label="Previous">
        <span aria-hidden="true">&raquo;</span>
      </a></li>';
    }


echo '</ul>
</nav></div>';
?>
