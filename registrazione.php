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
    }else if(isset($_POST["username"])){
        $db=new DB\DBAccess;
        $connOk=$db->openDBConnection();
        if($connOk){
            
            $username=cleanInput($_POST["username"], $db->getConnection());
            $password=cleanInput($_POST["password"], $db->getConnection());
            $email=cleanInput($_POST["email"], $db->getConnection());
            $nome=cleanInput($_POST["nome"], $db->getConnection());
            $cognome=cleanInput($_POST["cognome"], $db->getConnection());
            $dataNascita=cleanInput($_POST["dataNascita"], $db->getConnection());
            $residenza=cleanInput($_POST["residenza"], $db->getConnection());
            $telefono=cleanInput($_POST["telefono"], $db->getConnection());
            if($connOk){
                if( $db->insertUtente($username,$password,$email,$nome,$cognome)){
                    session_start();
                    $_SESSION["email"]=$email;
                    $_SESSION["firstname"]=$nome;
                    $_SESSION["lastname"]=$cognome;
                    $htmlToInsert .= "<p>Registrazione effettuata correttamente. Torna alla <a href=\"index.php\" lang=\"en\"> Home </a></p>";
                }
            }
            else{
                header("Location: 503.html");
            }
        }
    }else{
        header("Location: profilo.php");
    }
