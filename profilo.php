<?php
    ini_set('display_errors',1);
    ini_set('display_startup_errors',1);
    setlocale(LC_ALL,'it_IT');

    require_once "functions/dbAccess.php";

    session_start();

    $paginaHTML=file_get_contents("templates/profiloTemplate.html");
    $nome= "";
    $cognome = "";
    $mail = "";


    if(isset($_SESSION["email"]) && !isset($_SESSION["admin"])){
        $mail = $_SESSION["email"];
        $profile=$_SESSION["firstname"];
        $profilelink="profilo.php";

    $db=new DB\DBAccess;
    $connOk=$db->openDBConnection();
    
    [$nome, $cognome, $mail] = $db->getAuthUserInfo($_SESSION["username"]);



    $paginaHTML=str_replace("{profile}",$profile,$paginaHTML);
    $paginaHTML=str_replace("{profilelink}",$profilelink,$paginaHTML);
    $paginaHTML=str_replace("{name}",$nome,$paginaHTML);
    $paginaHTML=str_replace("{surname}",$cognome,$paginaHTML);
    $paginaHTML=str_replace("{email}",$mail,$paginaHTML);

    echo $paginaHTML;
    }
    else{
        header("Location: login.php");
        
    }

    