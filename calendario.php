<?php
    ini_set('display_errors',1);
    ini_set('display_startup_errors',1);
    setlocale(LC_ALL,'it_IT');

    require_once "functions/dbAccess.php";
    include "functions/functions.php";

    session_start();
    if(!isset($_SESSION["monthCal"])){$_SESSION["monthCal"]=0;} /*Rivedere!!!! Rimane sempre sullo stesso mese se chiudo la pagina. Provare a fare il calendario in JS*/

    $paginaHTML=file_get_contents("templates/calendarioTemplate.html");

    if(isset($_SESSION["email"])){
        $profile=$_SESSION["firstname"];
        $profilelink="functions/logout.php";
    }
    else{
        $profile="Accedi";
        $profilelink="login.php";
    }

    $currentmonth=date_create(date("Y-m"));
    date_add($currentmonth,date_interval_create_from_date_string($_SESSION["monthCal"]." month"));
    $currentmonth=date_format($currentmonth,"Y-m");
    $currentmonthyear=getCurrentMY($currentmonth);
    
    $startingB=date("w",strtotime($currentmonth."-01"));
    if($startingB==0){$startingB+=7;}
    for($i=1;$i<$startingB;$i++){
        $paginaHTML=str_replace("{box$i}","",$paginaHTML);
    }
    for($i=$startingB;$i<=date("t",strtotime($currentmonth))+$startingB-1;$i++){
        $paginaHTML=replaceBox("box".$i,$i-$startingB+1,$paginaHTML);
    }
    for($i=date("t",strtotime($currentmonth))+$startingB;$i<=42;$i++){
        $paginaHTML=str_replace("{box$i}","",$paginaHTML);
    }

    $paginaHTML=str_replace("{profile}",$profile,$paginaHTML);
    $paginaHTML=str_replace("{profilelink}",$profilelink,$paginaHTML);
    $paginaHTML=str_replace("{month}",$currentmonthyear,$paginaHTML);
    echo $paginaHTML;