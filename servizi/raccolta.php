<?php
    ini_set('display_errors',1);
    ini_set('display_startup_errors',1);
    setlocale(LC_ALL,'it_IT');

    require_once "../functions/dbAccess.php";

    session_start();

    $paginaHTML=file_get_contents("../templates/servizi/raccoltaTemplate.html");

    if(!isset($_SESSION["email"])){
        $profile="Accedi";
        $profilelink="login.php";

    }else{
        if(isset($_SESSION["admin"])){
            $profile="<span lang='en'>Dashboard</span>";
            $profilelink="dashboard.php";
           
            
        }else{
            $profile=$_SESSION["firstname"];
            $profilelink="profilo.php";
        }
       
    }


    $paginaHTML=str_replace("{profile}",$profile,$paginaHTML);
    $paginaHTML=str_replace("{profilelink}",$profilelink,$paginaHTML);
    echo $paginaHTML;