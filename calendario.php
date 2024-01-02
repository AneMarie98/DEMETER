<?php
    ini_set('display_errors',1);
    ini_set('display_startup_errors',1);
    setlocale(LC_ALL,'it_IT');

    require_once "functions/dbAccess.php";
    include "functions/functions.php";

    session_start();

    $paginaHTML=file_get_contents("templates/calendarioTemplate.html");

    if(isset($_SESSION["email"])){
        $profile=$_SESSION["firstname"];
        $profilelink="functions/logout.php";
    }
    else{
        $profile="Accedi";
        $profilelink="login.php";
    }
    $currentmonthyear=getCurrentMY();

    $startingB=date("w",strtotime(date("Y")."-".date("m")."-01"));
    for($i=1;$i<$startingB;$i++){
        $paginaHTML=str_replace("{box$i}","",$paginaHTML);
    }
    for($i=$startingB;$i<=date("t");$i++){
        $paginaHTML=replaceBox("box".$i,$i-$startingB+1,$paginaHTML);
    }
    for($i=date("t")+1;$i<=35;$i++){
        $paginaHTML=str_replace("{box$i}","",$paginaHTML);
    }

    $paginaHTML=str_replace("{profile}",$profile,$paginaHTML);
    $paginaHTML=str_replace("{profilelink}",$profilelink,$paginaHTML);
    $paginaHTML=str_replace("{month}",$currentmonthyear,$paginaHTML);
    echo $paginaHTML;