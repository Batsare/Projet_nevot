<?php

if(isset($_POST['tri'])){
    $tri = $_POST['tri'];
}else{
    $tri = $test[0];
}

if(isset($_POST['ordre'])){
    $ordre = $_POST['ordre'];
}else{
    $ordre = 'ASC';
}
