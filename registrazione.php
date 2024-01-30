<?php
    ini_set('display_errors',1);
    ini_set('display_startup_errors',1);
    setlocale(LC_ALL,'it_IT');

    require_once "functions/dbAccess.php";
    require_once "functions/functions.php";

  
    session_start();
    $paginaHTML=file_get_contents("templates/registrazioneTemplate.html");

    if(!isset($_SESSION["email"])){
        $profile="Accedi";
        $profilelink="login.php";
        $paginaHTML=str_replace("{profile}",$profile,$paginaHTML);
        $paginaHTML=str_replace("{profilelink}",$profilelink,$paginaHTML);
        echo $paginaHTML;
    }else{
        header("Location: profilo.php");
    }
